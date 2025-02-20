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
    </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
    <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
        <h2>Community</h2>
        <div class="sub_menu">
            <a href="/cosmetic/community/lookbook.php">룩북</a>
            <a href="/cosmetic/community/notice.php">공지사항</a>
            <a href="/cosmetic/community/inquiry.php">문의사항</a>
            <a href="/cosmetic/gallery/index.php" class="active">갤러리</a>
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