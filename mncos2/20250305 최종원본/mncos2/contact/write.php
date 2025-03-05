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

    <div class="contact-write-content">
        <h3 class="contact-write-title">문의하기</h3>

        <form class="contact-write-form" method="POST" onsubmit="return validateForm()">
            <div class="contact-write-group">
                <div class="contact-write-label">제목<span class="contact-write-required">*</span></div>
                <div class="contact-write-control">
                    <input type="text" name="title" maxlength="100">
                </div>
            </div>
            <div class="contact-write-group">
                <div class="contact-write-label">작성자<span class="contact-write-required">*</span></div>
                <div class="contact-write-control">
                    <input type="text" name="author" maxlength="50">
                </div>
            </div>
            <div class="contact-write-group">
                <div class="contact-write-label">비밀번호<span class="contact-write-required">*</span></div>
                <div class="contact-write-control">
                    <input type="password" name="password">
                    <p>* 문의글 조회시 필요합니다.</p>
                </div>
            </div>
            <div class="contact-write-group">
                <div class="contact-write-label">비밀글 설정</div>
                <div class="contact-write-control">
                    <div class="contact-write-checkbox">
                        <input type="checkbox" id="is_secret" name="is_secret">
                        <label for="is_secret">비밀글로 작성</label>
                    </div>
                </div>
            </div>
            <div class="contact-write-group">
                <div class="contact-write-label">내용<span class="contact-write-required">*</span></div>
                <div class="contact-write-control">
                    <textarea name="content"></textarea>
                </div>
            </div>

            <div class="contact-write-buttons">
                <a href="inquiry.php" class="contact-write-btn">취소</a>
                <button type="submit" class="contact-write-btn primary">등록</button>
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