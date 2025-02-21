<?php
require_once '../inc/db.php';
session_start();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isPasswordVerified = isset($_SESSION['verified_inquiry_' . $id]);

// 게시글 조회
$stmt = $db->prepare("SELECT * FROM inquiry WHERE id = ?");
$stmt->execute([$id]);
$inquiry = $stmt->fetch();

if (!$inquiry) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='inquiry.php';</script>";
    exit;
}

// 비밀번호 체크
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if (password_verify($_POST['password'], $inquiry['password'])) {
        $_SESSION['verified_inquiry_' . $id] = true;
        $isPasswordVerified = true;
    } else {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    }
}

// 비밀글이고 비밀번호 확인이 안 된 경우
if ($inquiry['is_secret'] && !$isPasswordVerified && !isset($_SESSION['is_admin'])) {
    ?>
    <!DOCTYPE html>
    <html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>비밀글 확인 - M&COS</title>
        <style>
            .password-form {
                max-width: 400px;
                margin: 100px auto;
                padding: 40px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            .password-form h3 {
                margin-bottom: 20px;
                text-align: center;
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
            }
            .btn {
                width: 100%;
                padding: 10px;
                background: #333;
                color: #fff;
                border: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <?php include '../inc/header.php'; ?>
        <form class="password-form" method="POST">
            <h3>비밀글입니다</h3>
            <div class="form-group">
                <input type="password" name="password" placeholder="비밀번호를 입력해주세요">
            </div>
            <button type="submit" class="btn">확인</button>
        </form>
        <?php include '../inc/footer.php'; ?>
    </body>
    </html>
    <?php
    exit;
}

// 조회수 증가
if (!isset($_SESSION['viewed_inquiry_' . $id])) {
    $db->query("UPDATE inquiry SET views = views + 1 WHERE id = $id");
    $_SESSION['viewed_inquiry_' . $id] = true;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($inquiry['title']); ?> - M&COS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .board-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .board-title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 50px;
        }

        .view-header {
            border-top: 1px solid #000;
            border-bottom: 1px solid #ddd;
            padding: 20px;
        }

        .view-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .view-info {
            display: flex;
            justify-content: space-between;
            color: #666;
            font-size: 14px;
        }

        .view-content {
            padding: 40px 20px;
            min-height: 200px;
            border-bottom: 1px solid #ddd;
            line-height: 1.8;
            white-space: pre-wrap;
        }

        .answer-section {
            margin-top: 50px;
            border-top: 1px solid #ddd;
            padding-top: 30px;
        }

        .answer-header {
            font-size: 18px;
            margin-bottom: 20px;
            color: #009FE3;
        }

        .answer-content {
            background: #f8f8f8;
            padding: 30px;
            border-radius: 4px;
            white-space: pre-wrap;
        }

        .answer-date {
            margin-top: 10px;
            text-align: right;
            color: #666;
            font-size: 14px;
        }

        .btn-group {
            margin-top: 30px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 40px;
            background: #333;
            color: #fff;
            text-decoration: none;
            border: none;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 12px;
            margin-left: 10px;
        }

        .status.new { background: #eee; }
        .status.in-progress { background: #fff3cd; }
        .status.completed { background: #d4edda; }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="board-content">
        <h3 class="board-title">문의하기</h3>

        <div class="view-header">
            <h4 class="view-title">
                <?php echo htmlspecialchars($inquiry['title']); ?>
                <?php 
                $status_class = '';
                $status_text = '';
                switch($inquiry['status']) {
                    case 'NEW':
                        $status_class = 'new';
                        $status_text = '접수';
                        break;
                    case 'IN_PROGRESS':
                        $status_class = 'in-progress';
                        $status_text = '처리중';
                        break;
                    case 'COMPLETED':
                        $status_class = 'completed';
                        $status_text = '답변완료';
                        break;
                }
                ?>
                <span class="status <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
            </h4>
            <div class="view-info">
                <div class="left">
                    <span>작성자: <?php echo htmlspecialchars($inquiry['author']); ?></span>
                    <span style="margin-left: 20px">
                        작성일: <?php echo date('Y-m-d H:i', strtotime($inquiry['created_at'])); ?>
                    </span>
                </div>
                <div class="right">
                    조회수: <?php echo $inquiry['views']; ?>
                </div>
            </div>
        </div>

        <div class="view-content">
            <?php echo nl2br(htmlspecialchars($inquiry['content'])); ?>
        </div>

        <?php if ($inquiry['answer']): ?>
        <div class="answer-section">
            <div class="answer-header">답변</div>
            <div class="answer-content">
                <?php echo nl2br(htmlspecialchars($inquiry['answer'])); ?>
            </div>
            <div class="answer-date">
                답변일: <?php echo date('Y-m-d H:i', strtotime($inquiry['answer_date'])); ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="btn-group">
            <a href="inquiry.php" class="btn">목록</a>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>