<!-- // community/notice_view.php (사용자용 공지사항 상세보기) -->
<?php
include '../inc/db.php';

$id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE notices SET views = views + 1 WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

// 상세 조회
$sql = "SELECT * FROM notices WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$view = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>공지사항</title>
   <style>
       .view-wrap {
           max-width: 1200px;
           margin: 50px auto;
           padding: 0 20px;
       }
       .qa-title {text-align:center; margin-bottom:50px;}
       .qa-title span {color:#666; font-size:17px;}
       .qa-title h2 {font-size:45px; margin-top:10px;}
       
       .notice-view {
           border-top: 2px solid #333;
       }
       .view-title {
           padding: 20px;
           background: #f8f8f8;
           border-bottom: 1px solid #ddd;
       }
       .view-title h3 {margin:0;}
       .view-info {
           padding: 15px 20px;
           border-bottom: 1px solid #ddd;
           color: #666;
       }
       .view-content {
           padding: 30px 20px;
           min-height: 300px;
           border-bottom: 1px solid #ddd;
       }
       .btn-wrap {
           margin-top: 30px;
           text-align: center;
       }
       .list-btn {
           display: inline-block;
           padding: 10px 40px;
           background: #333;
           color: #fff;
           text-decoration: none;
       }
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
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>Community</h2>
            <div class="sub_menu">
            <a href="/cosmetic/community/lookbook.php">룩북</a>
                <a href="/cosmetic/community/notice.php" class="active">공지사항</a>
                <a href="/cosmetic/community/inquiry.php">문의사항</a>
                <a href="/cosmetic/gallery/index.php">갤러리</a>
            </div>
        </div>
    </div>

<div class="view-wrap">
   <div class="qa-title">
       <span>Notice</span>
       <h2>공지사항</h2>
   </div>

   <div class="notice-view">
       <div class="view-title">
           <h3><?php echo $view['title']; ?></h3>
       </div>
       <div class="view-info">
           <span>등록일: <?php echo date('Y.m.d', strtotime($view['created_at'])); ?></span>
           <span> | </span>
           <span>조회수: <?php echo $view['views']; ?></span>
       </div>
       <div class="view-content">
           <?php echo nl2br($view['content']); ?>
       </div>
   </div>

   <div class="btn-wrap">
       <a href="notice.php" class="list-btn">목록</a>
   </div>
</div>

<?php include '../inc/footer.php'; ?>
</body>
</html>