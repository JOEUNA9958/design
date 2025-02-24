<?php
require_once '../../inc/db.php';
session_start();

// 관리자 체크
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='/board/index.php';</script>";
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$notice = null;

// 수정 모드인 경우 데이터 조회
if ($id > 0) {
    $stmt = $db->prepare("SELECT * FROM notice WHERE id = ?");
    $stmt->execute([$id]);
    $notice = $stmt->fetch();

    if (!$notice) {
        echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='/board/index.php';</script>";
        exit;
    }
}

// 폼 제출 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if (empty($title) || empty($content)) {
        echo "<script>alert('제목과 내용을 모두 입력해주세요.');</script>";
    } else {
        try {
            if ($id > 0) {
                // 수정
                $stmt = $db->prepare("UPDATE notice SET title = ?, content = ?, updated_at = NOW() WHERE id = ?");
                $stmt->execute([$title, $content, $id]);
                echo "<script>alert('수정되었습니다.'); location.href='/mncos2/admin/board/list.php';</script>";
            } else {
                // 새글 작성
                $stmt = $db->prepare("INSERT INTO notice (title, content) VALUES (?, ?)");
                $stmt->execute([$title, $content]);
                echo "<script>alert('등록되었습니다.'); location.href='/mncos2/admin/board/list.php';</script>";
            }
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
    <title><?php echo $id ? '공지사항 수정' : '공지사항 작성'; ?> - M&COS</title>
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
            height: 400px;
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
            border: 1px solid #ddd;
            background: #fff;
            color: #333;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn:hover {
            background: #f8f8f8;
        }

        .btn.primary {
            background: #009FE3;
            color: #fff;
            border-color: #009FE3;
        }

        .btn.primary:hover {
            background: #0085BE;
        }
    </style>
</head>
<body>
    <?php include '../../inc/header.php'; ?>

    <div class="board-content">
        <h3 class="board-title"><?php echo $id ? '공지사항 수정' : '공지사항 작성'; ?></h3>

        <form class="write-form" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <div class="form-label">제목</div>
                <div class="form-control">
                    <input type="text" name="title" value="<?php echo $notice ? escape_string($notice['title']) : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">내용</div>
                <div class="form-control">
                    <textarea name="content"><?php echo $notice ? escape_string($notice['content']) : ''; ?></textarea>
                </div>
            </div>

            <div class="btn-group">
                <a href="/mncos2/admin/board/list.php" class="btn">취소</a>
                <button type="submit" class="btn primary"><?php echo $id ? '수정' : '등록'; ?></button>
            </div>
        </form>
    </div>

    <?php include '../../inc/footer.php'; ?>

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