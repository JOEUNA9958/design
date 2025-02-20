<!-- // community/notice.php (사용자용 공지사항 목록) -->
<?php
include '../inc/db.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>공지사항</title>
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
       .notice-wrap {
           max-width: 1200px;
           margin: 50px auto;
           padding: 0 20px;
           height: 700px;
       }
       .qa-title {
            text-align: center;
            margin-bottom: 80px;
            margin-top: 100px;
        }
       .qa-title span {color:#666; font-size:17px;}
       .qa-title h2 {font-size:45px; margin-top:10px;}
       
       .notice-table {
           width: 100%;
           border-collapse: collapse;
       }
       .notice-table th {
           padding: 15px;
           background: #f8f8f8;
           border-top: 2px solid #333;
       }
       .notice-table td {
           padding: 15px;
           border-bottom: 1px solid #ddd;
       }
       .important {
           display: inline-block;
           padding: 3px 8px;
           background: #cc0000;
           color: #fff;
           font-size: 12px;
           border-radius: 3px;
           margin-right: 5px;
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

<div class="notice-wrap">
   <div class="qa-title">
       <span>Notice</span>
       <h2>공지사항</h2>
   </div>

   <table class="notice-table">
       <thead>
           <tr>
               <th width="70">번호</th>
               <th>제목</th>
               <th width="100">조회수</th>
               <th width="100">등록일</th>
           </tr>
       </thead>
       <tbody>
           <?php
           $sql = "SELECT * FROM notices ORDER BY is_important DESC, id DESC";
           $stmt = $db->prepare($sql);
           $stmt->execute();
           while($row = $stmt->fetch()):
           ?>
           <tr>
               <td><?php echo $row['id']; ?></td>
               <td>
                   <?php if($row['is_important']): ?>
                   <span class="important">중요</span>
                   <?php endif; ?>
                   <a href="notice_view.php?id=<?php echo $row['id']; ?>">
                       <?php echo $row['title']; ?>
                   </a>
               </td>
               <td><?php echo $row['views']; ?></td>
               <td><?php echo date('Y.m.d', strtotime($row['created_at'])); ?></td>
           </tr>
           <?php endwhile; ?>
       </tbody>
   </table>
</div>

<?php include '../inc/footer.php'; ?>
</body>
</html>