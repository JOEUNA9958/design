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
/* 기본 비주얼 스타일 */
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

/* 메뉴 스타일 */
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

.menu-item.active {
    background: #fff;
}

.menu-item.active a {
    color: #000;
}

/* 반응형 스타일 */
@media (max-width: 1200px) {
    .write-wrap {
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

    .menu-item {
        max-width: 300px;
    }

    .write-title {
        margin: 40px 0;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .visual h2 {
        font-size: 32px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    /* 테이블 반응형 처리 */
    table, tbody, tr, th, td {
        display: block;
        width: 100%;
    }

    th {
        padding: 10px 0;
        border-bottom: none;
        background: none;
    }

    td {
        padding: 5px 0 15px;
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

    .btn-wrap {
        flex-direction: column;
        gap: 8px;
    }

    button {
        width: 100%;
        padding: 12px 0;
    }
}

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

    input[type="text"],
    input[type="password"],
    input[type="file"],
    textarea {
        font-size: 12px;
    }

    button {
        font-size: 12px;
        padding: 10px 0;
    }
}
@media (max-width: 1200px) {
    form {
        padding: 0 40px;
    }
}

@media (max-width: 768px) {
    form {
        padding: 0 20px;
        margin: 30px auto;
    }
}

@media (max-width: 480px) {
    form {
        padding: 0 15px;
        margin: 20px auto;
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