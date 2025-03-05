<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];

// 댓글 조회
$stmt = $db->prepare("SELECT * FROM gallery_comments WHERE id = ?");
$stmt->execute([$id]);
$comment = $stmt->fetch();

// 비밀번호 확인
if (!password_verify($password, $comment['password'])) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit;
}

// 수정 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $nickname = $_POST['nickname'];
    
    $stmt = $db->prepare("UPDATE gallery_comments SET content = ?, nickname = ? WHERE id = ?");
    if ($stmt->execute([$content, $nickname, $id])) {
        echo "<script>alert('수정되었습니다.'); location.href='view.php?id=" . $comment['gallery_id'] . "';</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글 수정 - M&COS</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>

    <div class="gallery-comment-edit-wrap">
        <form class="gallery-comment-edit-form" method="POST">
            <div class="gallery-comment-edit-group">
                <label>닉네임</label>
                <input type="text" name="nickname" value="<?php echo htmlspecialchars($comment['nickname']); ?>">
            </div>
            <div class="gallery-comment-edit-group">
                <label>내용</label>
                <textarea name="content" required><?php echo htmlspecialchars($comment['content']); ?></textarea>
            </div>
            <div class="gallery-comment-edit-buttons">
                <button type="button" class="gallery-comment-edit-btn cancel" onclick="history.back()">취소</button>
                <button type="submit" class="gallery-comment-edit-btn submit">수정하기</button>
            </div>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>