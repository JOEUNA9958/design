<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];

// 비밀번호 확인
$sql = "SELECT * FROM inquiries WHERE id = ? AND password = ?";
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
    <title>문의사항 수정</title>
    <style>
        .write-form {
            flex: 1;
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            width: 100%;
        }

        main {
            min-height: calc(100vh - 150px);
        }

        .qa-title {
            text-align: center; 
            margin-bottom: 50px;
        }
        .qa-title span {
            color: #666; 
            font-size: 17px;
        }
        .qa-title h2 {
            font-size: 45px; 
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-top: 2px solid #333;
            border-collapse: collapse;
        }
        th {
            width: 150px;
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
            width: 300px;
            padding: 8px;
            border: 1px solid #ddd;
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 8px;
            border: 1px solid #ddd;
            resize: none;
        }
        .btn-wrap {
            text-align: center;
            margin-top: 30px;
        }
        button {
            padding: 10px 40px;
            border: none;
            color: #fff;
            cursor: pointer;
            margin: 0 5px;
            font-size: 16px;
        }
        .submit-btn {background: #007a5c;}
        .cancel-btn {background: #666;}

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

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
            0% {
                background-position: center 0%;
            }
            50% {
                background-position: center 100%;
            }
            100% {
                background-position: center 0%;
            }
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
            margin-bottom: -5px;
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

        .story-section1 {
            padding: 80px 0;
        }

        .file-box {
            margin-top: 20px;
            padding: 15px 20px;
            background: #f8f8f8;
            border-bottom: 1px solid #ddd;
        }
        .file-box span {
            color: #666;
            margin-right: 10px;
        }
        .file-box input[type="file"] {
            padding: 5px 0;
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
            <a href="/cosmetic/community/inquiry.php" class="active">문의사항</a>
            <a href="/cosmetic/gallery/index.php">갤러리</a>
        </div>
    </div>
</div>

<div class="write-form">
    <div class="qa-title">
        <span>Question & Answer</span>
        <h2>Q&A</h2>
    </div>

    <form action="inquiry_edit_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $view['id']; ?>">
        <input type="hidden" name="password" value="<?php echo $view['password']; ?>">
        <table>
            <tr>
                <th>이름</th>
                <td><input type="text" name="name" value="<?php echo htmlspecialchars($view['name']); ?>" required></td>
            </tr>
            <tr>
                <th>이메일</th>
                <td><input type="text" name="email" value="<?php echo htmlspecialchars($view['email']); ?>"></td>
            </tr>
            <tr>
                <th>연락처</th>
                <td><input type="text" name="phone" value="<?php echo htmlspecialchars($view['phone']); ?>"></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" value="<?php echo htmlspecialchars($view['title']); ?>" required></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><textarea name="content" required><?php echo htmlspecialchars($view['content']); ?></textarea></td>
            </tr>
            <tr>
                <th>첨부파일</th>
                <td>
                    <?php if($view['file_name']): ?>
                        <div class="file-box">
                            <span>현재 파일:</span>
                            <?php echo htmlspecialchars($view['file_name']); ?>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="upload_file">
                </td>
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