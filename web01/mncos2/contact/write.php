<?php
mb_internal_encoding('UTF-8');
require_once '../inc/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $author = $_POST['author'] ?? '';
    $password = $_POST['password'] ?? '';
    $is_secret = isset($_POST['is_secret']) ? 1 : 0;

    if (empty($title) || empty($content) || empty($author) || empty($password)) {
        echo "<script>alert('모든 필수 항목을 입력해주세요.');</script>";
    } else {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $db->prepare("INSERT INTO inquiry (title, content, author, password, is_secret) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $content, $author, $hashed_password, $is_secret]);
            
            echo "<script>alert('등록되었습니다.'); location.href='inquiry.php';</script>";
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
    <title>문의하기 - M&COS</title>
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

        .required {
            color: #dc3545;
            margin-left: 3px;
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

    .form-label {
        width: 150px;
        padding: 15px;
        font-size: 15px;
    }

    .form-control {
        padding: 15px;
    }

    input[type="text"],
    input[type="password"] {
        padding: 8px;
    }

    textarea {
        height: 250px;
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

    .form-group {
        flex-direction: column;
    }

    .form-label {
        width: 100%;
        padding: 12px 15px;
        font-size: 14px;
    }

    .form-control {
        padding: 15px;
    }

    input[type="text"],
    input[type="password"] {
        font-size: 14px;
    }

    textarea {
        height: 200px;
    }

    .btn-group {
        margin-top: 20px;
    }

    .btn {
        padding: 10px 30px;
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

    .form-label {
        padding: 10px;
        font-size: 13px;
    }

    .form-control {
        padding: 12px;
    }

    input[type="text"],
    input[type="password"] {
        padding: 8px;
        font-size: 13px;
    }

    .checkbox-group label {
        font-size: 13px;
    }

    textarea {
        height: 180px;
        font-size: 13px;
    }

    .form-control p {
        font-size: 12px;
        margin-top: 4px;
    }

    .btn-group {
        margin-top: 15px;
        gap: 8px;
    }

    .btn {
        padding: 8px 25px;
        font-size: 13px;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .board-title {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .form-label {
        padding: 8px;
        font-size: 12px;
    }

    .form-control {
        padding: 10px;
    }

    input[type="text"],
    input[type="password"] {
        padding: 6px;
        font-size: 12px;
    }

    .checkbox-group label {
        font-size: 12px;
    }

    textarea {
        height: 150px;
        font-size: 12px;
    }

    .form-control p {
        font-size: 11px;
    }

    .btn-group {
        flex-direction: column;
        gap: 6px;
    }

    .btn {
        width: 100%;
        padding: 8px 0;
        font-size: 12px;
    }
}
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="board-content">
        <h3 class="board-title">문의하기</h3>

        <form class="write-form" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <div class="form-label">제목<span class="required">*</span></div>
                <div class="form-control">
                    <input type="text" name="title" maxlength="100">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">작성자<span class="required">*</span></div>
                <div class="form-control">
                    <input type="text" name="author" maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">비밀번호<span class="required">*</span></div>
                <div class="form-control">
                    <input type="password" name="password">
                    <p style="font-size: 13px; color: #666; margin-top: 5px;">
                        * 문의글 조회시 필요합니다.
                    </p>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">비밀글 설정</div>
                <div class="form-control">
                    <div class="checkbox-group">
                        <input type="checkbox" id="is_secret" name="is_secret">
                        <label for="is_secret">비밀글로 작성</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label">내용<span class="required">*</span></div>
                <div class="form-control">
                    <textarea name="content"></textarea>
                </div>
            </div>

            <div class="btn-group">
                <a href="inquiry.php" class="btn">취소</a>
                <button type="submit" class="btn primary">등록</button>
            </div>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        function validateForm() {
            const title = document.querySelector('[name="title"]').value;
            const author = document.querySelector('[name="author"]').value;
            const password = document.querySelector('[name="password"]').value;
            const content = document.querySelector('[name="content"]').value;

            if (!title.trim()) {
                alert('제목을 입력해주세요.');
                return false;
            }
            if (!author.trim()) {
                alert('작성자를 입력해주세요.');
                return false;
            }
            if (!password.trim()) {
                alert('비밀번호를 입력해주세요.');
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