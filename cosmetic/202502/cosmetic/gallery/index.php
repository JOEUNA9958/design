<!-- // gallery/index.php -->
<?php
include '../inc/db.php';

$sql = "SELECT * FROM gallery ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$lists = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>갤러리</title>
  <style>

body {
        display: block;
        margin: 0;
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
        height: 80px;
    }


    .sub_menu a {
        flex: 1;
        text-align: center;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 49 37 / 23%);
        transition: all 0.3s ease;
        font-size: 20px;
        position: relative;
    }
    
    .sub_menu a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #fff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .sub_menu a:hover::after,
    .sub_menu a.active::after {
        width: 100%;
    }

    .sub_menu a:hover,
    .sub_menu a.active {
        background: #003125;
    }

    .story-section1 {
        padding: 100px 0;
        max-width: 1810px;
        margin: 0 auto;
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
           0% {background-position: center 0%;}
           50% {background-position: center 100%;}
           100% {background-position: center 0%;}
       }

       .gallery-wrap {max-width:1200px; margin:50px auto; padding:0 20px; height: 700px;}
       .gallery-title {
            text-align: center;
            margin-bottom: 100px;
            margin-top: 100px;
        }
       .gallery-title span {color:#666; font-size:17px;}
       .gallery-title h2 {font-size:45px; margin-top:10px;}
       
       .gallery-grid {
          display:grid;
          grid-template-columns:repeat(3, 1fr);
          gap:30px;
       }
       .gallery-item {
          border:1px solid #ddd;
          border-radius:10px;
          overflow:hidden;
          transition: transform 0.3s;
       }
       .gallery-item:hover {
          transform: translateY(-5px);
       }
       .gallery-item img {
          width:100%;
          height:300px;
          object-fit:cover;
       }
       .gallery-info {padding:15px;}
       .gallery-info h3 {margin:0 0 10px;}
       .write-btn {
          display:inline-block;
          padding:10px 30px;
          background:#007a5c;
          color:#fff;
          text-decoration:none;
          float:right;
          margin-bottom:30px;
          border-radius:5px;
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

<div class="gallery-wrap">
   <div class="gallery-title">
       <span>Gallery</span>
       <h2>갤러리</h2>
   </div>
   <a href="write.php" class="write-btn">글쓰기</a>
   <div class="gallery-grid">
       <?php foreach($lists as $item): ?>
       <div class="gallery-item">
           <a href="view.php?id=<?php echo $item['id']; ?>">
               <img src="../uploads/gallery/<?php echo $item['image_name']; ?>" alt="">
               <div class="gallery-info">
                   <h3><?php echo $item['title']; ?></h3>
               </div>
           </a>
       </div>
       <?php endforeach; ?>
   </div>
</div>

<?php include '../inc/footer.php'; ?>
</body>
</html>