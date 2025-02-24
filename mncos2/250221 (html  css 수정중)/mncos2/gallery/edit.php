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
    <title>갤러리 수정</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* 최소 높이를 뷰포트 높이로 설정 */
    margin: 0;
}
.visual {
    position: relative;
    width: 100%;
    height: 450px;
    background: url('../images/company/company_bg.jpg') no-repeat center/cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.visual::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
}

.visual h2 {
    font-size: 48px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    position: relative;
    z-index: 1;
}

.visual p {
    font-size: 18px;
    margin-top: 20px;
    position: relative;
    z-index: 1;
}

.visual-menu {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 1;
}

.menu-item {
    flex: 1;
    max-width: 400px;
    border-right: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    transition: all 0.3s;
}

.menu-item:last-child {
    border-right: none;
}

.menu-item a {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s;
}

.menu-item:hover {
    background: #fff;
}

.menu-item:hover a {
    color: #000;
}

.menu-item.active {
    background: #fff;
}

.menu-item.active a {
    color: #000;
}
        .write-wrap {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }
        .write-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .write-title span {
            color: #666;
            font-size: 17px;
        }
        .write-title h2 {
            font-size: 45px;
            margin-top: 10px;
        }
        
        table {
            width: 100%;
            border-top: 2px solid #333;
            border-collapse: collapse;
        }
        th {
            width: 120px;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            background: #f8f8f8;
            text-align: left;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }
        .current-image {
            margin: 10px 0;
        }
        .current-image img {
            max-width: 200px;
            border-radius: 5px;
        }
        .btn-wrap {
            margin-top: 30px;
            text-align: center;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        button {
            padding: 10px 40px;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }
        .submit-btn {background: #007a5c;}
        .cancel-btn {background: #666;}

        /* Sub Banner Style */
        .sub_banner_wrap {
            width: 100%;
            position: relative;
        }
        .sub_banner {
            width: 100%;
            height: 500px;
            background-size: 120% auto;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: bannerMove 20s ease-in-out infinite;
            overflow: hidden;
        }
        @keyframes bannerMove {
            0% {background-position: center 0%;}
            50% {background-position: center 100%;}
            100% {background-position: center 0%;}
        }
        .sub_banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }
        .sub_banner h2 {
            color: #fff;
            font-size: 45px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        .sub_menu {
            display: flex;
            gap: 1px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        .sub_menu a {
            flex: 1;
            text-align: center;
            color: #fff;
            text-decoration: none;
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            font-size: 20px;
        }
        .sub_menu a:hover,
        .sub_menu a.active {
            background: #007a5d;
        }
        /* 반응형 스타일 */
@media (max-width: 1200px) {
    .write-wrap {
        max-width: 700px;
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .visual h2 {
        font-size: 36px;
    }

    .visual p {
        font-size: 16px;
    }

    .write-title {
        margin-bottom: 40px;
    }

    .write-title span {
        font-size: 16px;
    }

    .write-title h2 {
        font-size: 36px;
    }

    .current-image img {
        max-width: 180px;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    .write-wrap {
        margin: 40px auto;
        padding: 0 20px;
    }

    /* 테이블 반응형 처리 */
    table, tbody, tr, th, td {
        display: block;
        width: 100%;
    }

    th {
        padding: 10px;
        border-bottom: none;
        background: none;
        font-weight: bold;
    }

    td {
        padding: 10px 0 20px;
    }

    .current-image {
        margin: 15px 0;
    }

    .current-image p {
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="file"] {
        font-size: 14px;
    }

    textarea {
        height: 150px;
        font-size: 14px;
    }

    .btn-wrap {
        margin-top: 20px;
    }

    button {
        padding: 10px 30px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 300px;
    }

    .visual h2 {
        font-size: 28px;
    }

    .visual-menu {
        flex-wrap: wrap;
    }

    .menu-item {
        width: 50%;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .menu-item:nth-child(2n) {
        border-right: none;
    }

    .write-wrap {
        margin: 30px auto;
        padding: 0 15px;
    }

    .write-title span {
        font-size: 14px;
    }

    .write-title h2 {
        font-size: 24px;
    }

    th {
        padding: 8px 0;
        font-size: 14px;
    }

    td {
        padding: 8px 0 15px;
    }

    .current-image img {
        max-width: 100%;
    }

    input[type="text"],
    input[type="file"] {
        padding: 6px;
        font-size: 13px;
    }

    textarea {
        height: 120px;
        font-size: 13px;
    }

    .btn-wrap {
        flex-direction: column;
        gap: 8px;
    }

    button {
        width: 100%;
        padding: 10px 0;
        font-size: 13px;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual {
        height: 250px;
    }

    .visual h2 {
        font-size: 24px;
    }

    .menu-item a {
        font-size: 13px;
        height: 45px;
    }

    .write-title span {
        font-size: 13px;
    }

    .write-title h2 {
        font-size: 20px;
    }

    th {
        font-size: 13px;
    }

    input[type="text"],
    input[type="file"] {
        font-size: 12px;
    }

    td p {
        font-size: 12px;
    }

    textarea {
        height: 100px;
        font-size: 12px;
    }

    button {
        font-size: 12px;
        padding: 8px 0;
    }
}
    </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="visual">
    <h2>BOARD</h2>
    <p>창상 갤러리입니다.</p>
    <div class="visual-menu">
        <div class="menu-item">
            <a href="/mncos2/board/index.php">공지사항</a>
        </div>
        <div class="menu-item active">
            <a href="/mncos2/gallery/index.php">갤러리</a>
        </div>
    </div>
</div>

<div class="write-wrap">
    <div class="write-title">
        <span>Gallery</span>
        <h2>갤러리 수정</h2>
    </div>
    
    <form action="edit_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $view['id']; ?>">
        <input type="hidden" name="password" value="<?php echo $view['password']; ?>">
        <table>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" value="<?php echo htmlspecialchars($view['title']); ?>" required></td>
            </tr>
            <tr>
                <th>이미지</th>
                <td>
                    <div class="current-image">
                        <p>현재 이미지:</p>
                        <img src="../uploads/gallery/<?php echo $view['image_name']; ?>" alt="">
                    </div>
                    <input type="file" name="image" accept="image/*">
                    <p style="color: #666; font-size: 14px;">* 새로운 이미지를 선택하지 않으면 기존 이미지가 유지됩니다.</p>
                </td>
            </tr>
            <tr>
                <th>내용</th>
                <td><textarea name="content"><?php echo htmlspecialchars($view['content']); ?></textarea></td>
            </tr>
        </table>
        <div class="btn-wrap">
            <button type="submit" class="submit-btn">수정</button>
            <button type="button" class="cancel-btn" onclick="history.back()">취소</button>
        </div>
    </form>
</div>

<?php include '../inc/footer.php'; ?>
</body>
</html>