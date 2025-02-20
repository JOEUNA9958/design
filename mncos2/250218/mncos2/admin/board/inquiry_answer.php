<?php
require_once '../../inc/db.php';
session_start();

// 관리자 체크
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='/mncos2/admin/login.php';</script>";
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 문의글 조회
$stmt = $db->prepare("SELECT * FROM inquiry WHERE id = ?");
$stmt->execute([$id]);
$inquiry = $stmt->fetch();

if (!$inquiry) {
    echo "<script>alert('존재하지 않는 문의글입니다.'); location.href='inquiry.php';</script>";
    exit;
}

// 답변 등록/수정
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = $_POST['answer'] ?? '';
    $status = $_POST['status'] ?? 'NEW';

    try {
        $stmt = $db->prepare("UPDATE inquiry SET answer = ?, answer_date = NOW(), status = ? WHERE id = ?");
        $stmt->execute([$answer, $status, $id]);
        echo "<script>alert('답변이 등록되었습니다.'); location.href='inquiry.php';</script>";
        exit;
    } catch (Exception $e) {
        echo "<script>alert('오류가 발생했습니다.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의글 답변 - M&COS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .admin-title {
            font-size: 24px;
        }

        .inquiry-section {
            background: #f8f8f8;
            padding: 30px;
            margin-bottom: 40px;
            border-radius: 4px;
        }

        .inquiry-title {
            font-size: 20px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .inquiry-info {
            margin-bottom: 20px;
            color: #666;
            font-size: 14px;
        }

        .inquiry-info span {
            margin-right: 20px;
        }

        .inquiry-content {
            white-space: pre-wrap;
            line-height: 1.6;
        }

        .answer-form {
            border-top: 2px solid #000;
        }

        .form-group {
            display: flex;
            border-bottom: 1px solid #ddd;
        }

        .form-label {
            width: 200px;
            padding: 20px;
            background: #f8f8f8;
            font-weight: bold;
        }

        .form-control {
            flex: 1;
            padding: 20px;
        }

        .status-select {
            padding: 8px;
            border: 1px solid #ddd;
        }

        textarea {
            width: 100%;
            height: 300px;
            padding: 15px;
            border: 1px solid #ddd;
            resize: vertical;
            font-size: 14px;
            line-height: 1.6;
        }

        .btn-group {
            margin-top: 30px;
            text-align: center;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 40px;
            border: 1px solid #ddd;
            background: #fff;
            color: #333;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #f8f8f8;
        }

        .btn.primary {
            background: #333;
            color: #fff;
            border-color: #333;
        }

        .btn.primary:hover {
            background: #444;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">문의글 답변</h1>
            <a href="/mncos2/admin/board/inquiry.php">목록으로</a>
        </div>

        <div class="inquiry-section">
            <h2 class="inquiry-title"><?php echo htmlspecialchars($inquiry['title']); ?></h2>
            <div class="inquiry-info">
                <span>작성자: <?php echo htmlspecialchars($inquiry['author']); ?></span>
                <span>작성일: <?php echo date('Y-m-d H:i', strtotime($inquiry['created_at'])); ?></span>
                <span>조회수: <?php echo $inquiry['views']; ?></span>
            </div>
            <div class="inquiry-content">
                <?php echo nl2br(htmlspecialchars($inquiry['content'])); ?>
            </div>
        </div>

        <form class="answer-form" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <div class="form-label">답변 상태</div>
                <div class="form-control">
                    <select name="status" class="status-select">
                        <option value="NEW" <?php echo $inquiry['status'] === 'NEW' ? 'selected' : ''; ?>>접수</option>
                        <option value="IN_PROGRESS" <?php echo $inquiry['status'] === 'IN_PROGRESS' ? 'selected' : ''; ?>>처리중</option>
                        <option value="COMPLETED" <?php echo $inquiry['status'] === 'COMPLETED' ? 'selected' : ''; ?>>답변완료</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">답변 내용</div>
                <div class="form-control">
                    <textarea name="answer"><?php echo $inquiry['answer']; ?></textarea>
                </div>
            </div>

            <div class="btn-group">
                <a href="inquiry.php" class="btn">취소</a>
                <button type="submit" class="btn primary">답변등록</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            const answer = document.querySelector('[name="answer"]').value;
            if (!answer.trim()) {
                alert('답변 내용을 입력해주세요.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>