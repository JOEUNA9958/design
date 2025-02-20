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

// 폼 제출 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $author = $_POST['author'] ?? '';
    $is_secret = isset($_POST['is_secret']) ? 1 : 0;
    $status = $_POST['status'] ?? 'NEW';

    if (empty($title) || empty($content) || empty($author)) {
        echo "<script>alert('모든 필수 항목을 입력해주세요.');</script>";
    } else {
        try {
            $stmt = $db->prepare("UPDATE inquiry SET title = ?, content = ?, author = ?, is_secret = ?, status = ? WHERE id = ?");
            $stmt->execute([$title, $content, $author, $is_secret, $status, $id]);
            
            echo "<script>alert('수정되었습니다.'); location.href='inquiry.php';</script>";
            exit;
        } catch (Exception $e) {
            echo "<script>alert('오류가 발생했습니다.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의글 관리 - M&COS</title>
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

        .write-form {
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

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        textarea {
            height: 300px;
            resize: vertical;
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
            background: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        select {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">문의글 관리</h1>
            <a href="inquiry.php">목록으로</a>
        </div>

        <form class="write-form" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <div class="form-label">제목</div>
                <div class="form-control">
                    <input type="text" name="title" value="<?php echo htmlspecialchars($inquiry['title']); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">작성자</div>
                <div class="form-control">
                    <input type="text" name="author" value="<?php echo htmlspecialchars($inquiry['author']); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">상태</div>
                <div class="form-control">
                    <select name="status">
                        <option value="NEW" <?php echo $inquiry['status'] === 'NEW' ? 'selected' : ''; ?>>접수</option>
                        <option value="IN_PROGRESS" <?php echo $inquiry['status'] === 'IN_PROGRESS' ? 'selected' : ''; ?>>처리중</option>
                        <option value="COMPLETED" <?php echo $inquiry['status'] === 'COMPLETED' ? 'selected' : ''; ?>>답변완료</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">비밀글 설정</div>
                <div class="form-control">
                    <div class="checkbox-group">
                        <input type="checkbox" id="is_secret" name="is_secret" <?php echo $inquiry['is_secret'] ? 'checked' : ''; ?>>
                        <label for="is_secret">비밀글로 작성</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">내용</div>
                <div class="form-control">
                    <textarea name="content"><?php echo htmlspecialchars($inquiry['content']); ?></textarea>
                </div>
            </div>

            <div class="btn-group">
                <a href="inquiry.php" class="btn">취소</a>
                <button type="submit" class="btn">수정</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            const title = document.querySelector('[name="title"]').value;
            const content = document.querySelector('[name="content"]').value;
            const author = document.querySelector('[name="author"]').value;

            if (!title.trim()) {
                alert('제목을 입력해주세요.');
                return false;
            }
            if (!author.trim()) {
                alert('작성자를 입력해주세요.');
                return false;
            }
            if (!content.trim()) {
                alert('내용을 입력해주세요.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
