<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];

// 비밀번호 확인
$sql = "SELECT * FROM gallery WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);
$view = $stmt->fetch();

if(!$view) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>갤러리 수정 - M&COS</title>
    
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
        <h2>BOARD</h2>
        <p>창상 갤러리입니다.</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item">
                <a href="/mncos2/board/index.php">공지사항</a>
            </div>
            <div class="sub-visual-menu-item active">
                <a href="/mncos2/gallery/index.php">갤러리</a>
            </div>
        </div>
    </div>

    <div class="gallery-edit-wrap">
        <div class="gallery-edit-title">
            <span>Gallery</span>
            <h2>갤러리 수정</h2>
        </div>
        
        <form action="edit_process.php" method="post" enctype="multipart/form-data" class="gallery-edit-form">
            <input type="hidden" name="id" value="<?php echo $view['id']; ?>">
            <input type="hidden" name="password" value="<?php echo $view['password']; ?>">
            <table class="gallery-edit-table">
                <tr>
                    <th>제목</th>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($view['title']); ?>" required></td>
                </tr>
                <tr>
                    <th>이미지</th>
                    <td>
                        <div class="gallery-edit-current-image">
                            <p>현재 이미지:</p>
                            <img src="../uploads/gallery/<?php echo $view['image_name']; ?>" alt="">
                        </div>
                        <input type="file" name="image" accept="image/*">
                        <p class="gallery-edit-notice">* 새로운 이미지를 선택하지 않으면 기존 이미지가 유지됩니다.</p>
                    </td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><textarea name="content"><?php echo htmlspecialchars($view['content']); ?></textarea></td>
                </tr>
            </table>
            <div class="gallery-edit-buttons">
                <button type="submit" class="gallery-edit-btn submit">수정</button>
                <button type="button" class="gallery-edit-btn cancel" onclick="history.back()">취소</button>
            </div>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>