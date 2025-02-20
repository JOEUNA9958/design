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
            cursor: pointer;
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

        /* 모달 스타일 */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 30px;
            border-radius: 4px;
            width: 90%;
            max-width: 400px;
            z-index: 10000;
        }

        .modal h3 {
            margin-bottom: 20px;
            font-size: 18px;
            text-align: center;
        }

        .modal input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .modal .btn {
            padding: 10px 20px;
        }

        .modal .btn.primary {
            background: #333;
        }
        /* 반응형 스타일 */
@media (max-width: 1200px) {
    .board-content {
        padding: 0 40px;
        margin: 80px auto;
    }
}

@media (max-width: 991px) {
    .board-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .view-title {
        font-size: 22px;
    }

    .view-header {
        padding: 15px;
    }

    .view-content {
        padding: 30px 15px;
    }

    .answer-section {
        margin-top: 40px;
        padding-top: 25px;
    }

    .answer-content {
        padding: 25px;
    }
}

@media (max-width: 768px) {
    .board-content {
        margin: 60px auto;
        padding: 0 20px;
    }

    .board-title {
        font-size: 24px;
        margin-bottom: 30px;
    }

    .view-title {
        font-size: 20px;
        margin-bottom: 12px;
    }

    .view-info {
        flex-direction: column;
        gap: 8px;
        font-size: 13px;
    }

    .view-info .right {
        text-align: left;
    }

    .view-content {
        padding: 25px 15px;
        font-size: 14px;
        line-height: 1.6;
    }

    .answer-header {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .answer-content {
        padding: 20px;
        font-size: 14px;
    }

    .btn-group {
        margin-top: 25px;
    }

    .btn {
        padding: 10px 30px;
        font-size: 14px;
    }

    /* 모달 조정 */
    .modal-content {
        padding: 25px;
    }

    .modal h3 {
        font-size: 16px;
    }

    .modal input {
        padding: 8px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .board-content {
        margin: 40px auto;
        padding: 0 15px;
    }

    .board-title {
        font-size: 22px;
        margin-bottom: 25px;
    }

    .view-title {
        font-size: 18px;
        line-height: 1.4;
    }

    .status {
        display: block;
        margin: 10px 0 0 0;
        font-size: 11px;
        width: fit-content;
    }

    .view-info {
        font-size: 12px;
    }

    .view-info span {
        display: block;
        margin: 5px 0;
    }

    .view-info span[style*="margin-left"] {
        margin-left: 0 !important;
    }

    .view-content {
        padding: 20px 12px;
        font-size: 13px;
    }

    .answer-content {
        padding: 15px;
        font-size: 13px;
    }

    .answer-date {
        font-size: 12px;
    }

    .btn-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .btn {
        width: 100%;
        padding: 10px 0;
        font-size: 13px;
    }

    /* 모달 조정 */
    .modal-content {
        padding: 20px;
        width: 85%;
    }

    .modal-buttons {
        flex-direction: column;
        gap: 8px;
    }

    .modal .btn {
        width: 100%;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .board-title {
        font-size: 20px;
    }

    .view-title {
        font-size: 16px;
    }

    .view-info {
        font-size: 11px;
    }

    .view-content {
        font-size: 12px;
        padding: 15px 10px;
    }

    .answer-header {
        font-size: 14px;
    }

    .answer-content {
        font-size: 12px;
        padding: 12px;
    }

    .answer-date {
        font-size: 11px;
    }

    .btn {
        font-size: 12px;
    }

    /* 모달 조정 */
    .modal-content {
        padding: 15px;
    }

    .modal h3 {
        font-size: 14px;
    }

    .modal input {
        padding: 6px;
        font-size: 12px;
    }
}
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

        <?php if ($inquiry['status'] === 'COMPLETED' && $inquiry['answer']): ?>
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
            <button type="button" class="btn" onclick="showPasswordModal(<?php echo $inquiry['id']; ?>, 'edit')">수정</button>
            <button type="button" class="btn" onclick="showPasswordModal(<?php echo $inquiry['id']; ?>, 'delete')">삭제</button>
        </div>
    </div>

    <!-- 비밀번호 확인 모달 -->
    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <h3>비밀번호 확인</h3>
            <input type="password" id="password" placeholder="비밀번호를 입력해주세요">
            <div class="modal-buttons">
                <button type="button" class="btn" onclick="closePasswordModal()">취소</button>
                <button type="button" class="btn primary" onclick="verifyPassword()">확인</button>
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