<?php
mb_internal_encoding('UTF-8');
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
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>CONTACT</h2>
        <p>창상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item">
                <a href="./map.php">찾아오시는 길</a>
            </div>
            <div class="sub-visual-menu-item active">
                <a href="./inquiry.php">문의하기</a>
            </div>
        </div>
    </div>

    <div class="contact-view-content">
        <h3 class="contact-view-title">문의하기</h3>

        <div class="contact-view-header">
            <h4 class="contact-view-subject">
                <?php echo htmlspecialchars($inquiry['title']); ?>
                <?php 
                $status_class = '';
                $status_text = '';
                switch($inquiry['status']) {
                    case 'IN_PROGRESS':
                        $status_class = 'in-progress';
                        $status_text = '처리중';
                        break;
                    case 'COMPLETED':
                        $status_class = 'completed';
                        $status_text = '답변완료';
                        break;
                    default:
                        $status_class = 'in-progress';
                        $status_text = '처리중';
                }
                ?>
                <span class="contact-view-status <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
            </h4>
            <div class="contact-view-info">
                <div class="contact-view-info-left">
                    <span>작성자: <?php echo htmlspecialchars($inquiry['author']); ?></span>
                    <span>작성일: <?php echo date('Y-m-d H:i', strtotime($inquiry['created_at'])); ?></span>
                </div>
                <div class="contact-view-info-right">
                    조회수: <?php echo $inquiry['views']; ?>
                </div>
            </div>
        </div>

        <div class="contact-view-body">
            <?php echo nl2br(htmlspecialchars($inquiry['content'])); ?>
        </div>

        <?php if ($inquiry['status'] === 'COMPLETED' && $inquiry['answer']): ?>
        <div class="contact-view-answer">
            <div class="contact-view-answer-header">답변</div>
            <div class="contact-view-answer-body">
                <?php echo nl2br(htmlspecialchars($inquiry['answer'])); ?>
            </div>
            <div class="contact-view-answer-date">
                답변일: <?php echo date('Y-m-d H:i', strtotime($inquiry['answer_date'])); ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="contact-view-buttons">
            <a href="inquiry.php" class="contact-view-btn">목록</a>
            <button type="button" class="contact-view-btn" onclick="showPasswordModal(<?php echo $inquiry['id']; ?>, 'edit')">수정</button>
            <button type="button" class="contact-view-btn" onclick="showPasswordModal(<?php echo $inquiry['id']; ?>, 'delete')">삭제</button>
        </div>
    </div>

    <!-- 비밀번호 확인 모달 -->
    <div id="passwordModal" class="contact-view-modal">
        <div class="contact-view-modal-content">
            <h3>비밀번호 확인</h3>
            <input type="password" id="password" placeholder="비밀번호를 입력해주세요">
            <div class="contact-view-modal-buttons">
                <button type="button" class="contact-view-btn" onclick="closePasswordModal()">취소</button>
                <button type="button" class="contact-view-btn primary" onclick="verifyPassword()">확인</button>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        let currentAction = '';
        let currentId = '';

        function showPasswordModal(id, action) {
            currentAction = action;
            currentId = id;
            document.getElementById('passwordModal').style.display = 'block';
            document.getElementById('password').value = '';
            document.getElementById('password').focus();
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').style.display = 'none';
        }

        async function verifyPassword() {
            const password = document.getElementById('password').value;
            if (!password) {
                alert('비밀번호를 입력해주세요.');
                return;
            }

            try {
                const response = await fetch('verify_password.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${currentId}&password=${encodeURIComponent(password)}&action=${currentAction}`
                });
                
                const result = await response.json();
                
                if (result.success) {
                    closePasswordModal();
                    if (currentAction === 'delete') {
                        deleteInquiry();
                    } else if (currentAction === 'edit') {
                        location.href = `edit.php?id=${currentId}`;
                    }
                } else {
                    alert(result.message || '비밀번호가 일치하지 않습니다.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('오류가 발생했습니다.');
            }
        }

        async function deleteInquiry() {
            if (!confirm('정말 삭제하시겠습니까?')) return;

            try {
                const response = await fetch('delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${currentId}`
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('삭제되었습니다.');
                    location.href = 'inquiry.php';
                } else {
                    alert(result.message || '삭제 중 오류가 발생했습니다.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('오류가 발생했습니다.');
            }
        }
    </script>
</body>
</html>