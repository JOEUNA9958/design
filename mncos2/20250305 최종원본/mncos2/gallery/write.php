<?php include '../inc/db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>갤러리 글쓰기 - M&COS</title>
    
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

    <div class="gallery-write-wrap">
        <div class="gallery-write-title">
            <span>Gallery</span>
            <h2>갤러리 글쓰기</h2>
        </div>
        
        <form action="write_process.php" method="post" enctype="multipart/form-data" class="gallery-write-form">
            <table class="gallery-write-table">
                <tr>
                    <th>제목</th>
                    <td><input type="text" name="title" required></td>
                </tr>
                <tr>
                    <th>이미지</th>
                    <td><input type="file" name="image" accept="image/*" required></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><textarea name="content"></textarea></td>
                </tr>
                <tr>
                    <th>비밀번호</th>
                    <td><input type="password" name="password" required placeholder="삭제시 필요합니다"></td>
                </tr>
            </table>
            <div class="gallery-write-buttons">
                <button type="submit" class="gallery-write-btn submit">등록</button>
                <button type="button" class="gallery-write-btn cancel" onclick="history.back()">취소</button>
            </div>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>