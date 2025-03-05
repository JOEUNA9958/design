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

    <div class="contact-edit-content">
        <h3 class="contact-edit-title">문의글 수정</h3>

        <form class="contact-edit-form" method="POST" onsubmit="return validateForm()">
            <div class="contact-edit-group">
                <div class="contact-edit-label">제목<span class="contact-edit-required">*</span></div>
                <div class="contact-edit-control">
                    <input type="text" name="title" maxlength="100" value="<?php echo htmlspecialchars($inquiry['title']); ?>">
                </div>
            </div>
            <div class="contact-edit-group">
                <div class="contact-edit-label">작성자</div>
                <div class="contact-edit-control">
                    <input type="text" value="<?php echo htmlspecialchars($inquiry['author']); ?>" readonly>
                </div>
            </div>
            <div class="contact-edit-group">
                <div class="contact-edit-label">비밀글 설정</div>
                <div class="contact-edit-control">
                    <div class="contact-edit-checkbox">
                        <input type="checkbox" id="is_secret" name="is_secret" <?php echo $inquiry['is_secret'] ? 'checked' : ''; ?>>
                        <label for="is_secret">비밀글로 작성</label>
                    </div>
                </div>
            </div>
            <div class="contact-edit-group">
                <div class="contact-edit-label">내용<span class="contact-edit-required">*</span></div>
                <div class="contact-edit-control">
                    <textarea name="content"><?php echo htmlspecialchars($inquiry['content']); ?></textarea>
                </div>
            </div>

            <div class="contact-edit-buttons">
                <a href="view.php?id=<?php echo $id; ?>" class="contact-edit-btn">취소</a>
                <button type="submit" class="contact-edit-btn primary">수정</button>
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