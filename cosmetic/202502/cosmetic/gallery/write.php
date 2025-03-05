<?php include '../inc/db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>갤러리 글쓰기</title>
   <style>
       .sub_banner_wrap {
           width: 100%;
           position: relative;
       }

       .sub_banner {
           width: 100%;
           height: 400px;
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
           top: 0; left: 0; right: 0; bottom: 0;
           background: rgba(0, 0, 0, 0.3);
       }

       .sub_banner h2 {
           color: #fff;
           font-size: 40px;
           font-weight: 700;
           margin-bottom: 50px;
           position: relative;
           z-index: 1;
       }

       .write-wrap {max-width:800px; margin:50px auto; padding:0 20px;}
       .write-title {text-align:center; margin-bottom:50px;}
       .write-title span {color:#666; font-size:17px;}
       .write-title h2 {font-size:45px; margin-top:10px;}
       
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
       input[type="text"], input[type="password"] {
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
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
   <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
       <h2>Gallery</h2>
   </div>
</div>

<div class="write-wrap">
   <div class="write-title">
       <span>Gallery</span>
       <h2>갤러리 작성</h2>
   </div>
   
   <form action="write_process.php" method="post" enctype="multipart/form-data">
       <table>
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
       <div class="btn-wrap">
           <button type="submit" class="submit-btn">등록</button>
           <button type="button" class="cancel-btn" onclick="history.back()">취소</button>
       </div>
   </form>
</div>

<?php include '../inc/footer.php'; ?>
</body>
</html>