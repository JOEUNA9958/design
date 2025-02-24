<?php
mb_internal_encoding('UTF-8');
require_once '../inc/db.php';
session_start();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!isset($_SESSION['verified_inquiry_' . $id . '_edit'])) {
    echo "<script>alert('비정상적인 접근입니다.'); location.href='inquiry.php';</script>";
    exit;
}

// 게시글 조회
$stmt = $db->prepare("SELECT * FROM inquiry WHERE id = ?");
$stmt->execute([$id]);
$inquiry = $stmt->fetch();

if (!$inquiry) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='inquiry.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $is_secret = isset($_POST['is_secret']) ? 1 : 0;

    if (empty($title) || empty($content)) {
        echo "<script>alert('모든 필수 항목을 입력해주세요.');</script>";
    } else {
        try {
            $stmt = $db->prepare("UPDATE inquiry SET title = ?, content = ?, is_secret = ? WHERE id = ?");
            $stmt->execute([$title, $content, $is_secret, $id]);
            
            unset($_SESSION['verified_inquiry_' . $id . '_edit']);
            echo "<script>alert('수정되었습니다.'); location.href='view.php?id=" . $id . "';</script>";
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
    <title>문의글 수정 - M&COS</title>
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

        .write-form {
            border-top: 1px solid #000;
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
        input[type="password"],
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

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 5px;
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

        .required {
            color: #dc3545;
            margin-left: 3px;
        }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="board-content">
        <h3 class="board-title">문의글 수정</h3>

        <form class="write-form" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <div class="form-label">제목<span class="required">*</span></div>
                <div class="form-control">
                    <input type="text" name="title" maxlength="100" value="<?php echo htmlspecialchars($inquiry['title']); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">작성자</div>
                <div class="form-control">
                    <input type="text" value="<?php echo htmlspecialchars($inquiry['author']); ?>" readonly>
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
                <div class="form-label">내용<span class="required">*</span></div>
                <div class="form-control">
                    <textarea name="content"><?php echo htmlspecialchars($inquiry['content']); ?></textarea>
                </div>
            </div>

            <div class="btn-group">
                <a href="view.php?id=<?php echo $id; ?>" class="btn">취소</a>
                <button type="submit" class="btn primary">수정</button>
            </div>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        function validateForm() {
            const title = document.querySelector('[name="title"]').value;
            const content = document.querySelector('[name="content"]').value;

            if (!title.trim()) {
                alert('제목을 입력해주세요.');
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