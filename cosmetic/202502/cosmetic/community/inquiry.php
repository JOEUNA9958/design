<!-- // community/inquiry.php - 목록화면 -->
<?php
include '../inc/db.php';

// 페이징
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$per_page = 10;
$start = ($page-1) * $per_page;

// 목록 조회
$sql = "SELECT * FROM inquiries ORDER BY id DESC LIMIT $start, $per_page";
$stmt = $db->prepare($sql);
$stmt->execute();
$lists = $stmt->fetchAll();

// 전체 개수
$sql = "SELECT COUNT(*) as cnt FROM inquiries";
$stmt = $db->prepare($sql);
$stmt->execute();
$total = $stmt->fetch()['cnt'];
$total_page = ceil($total / $per_page);

$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 검색 쿼리 수정
$where = "";
if($keyword) {
   if($search_type == 'title') {
       $where = "WHERE title LIKE ?";
   } else {
       $where = "WHERE title LIKE ? OR content LIKE ?";
   }
}

// 목록 조회
$sql = "SELECT * FROM inquiries {$where} ORDER BY id DESC LIMIT $start, $per_page";
$stmt = $db->prepare($sql);
if($keyword) {
   if($search_type == 'title') {
       $stmt->execute(["%$keyword%"]);
   } else {
       $stmt->execute(["%$keyword%", "%$keyword%"]);
   }
} else {
   $stmt->execute();
}

$sql = "SELECT COUNT(*) as cnt FROM inquiries {$where}";
$stmt = $db->prepare($sql);
if($keyword) {
   if($search_type == 'title') {
       $stmt->execute(["%$keyword%"]);
   } else {
       $stmt->execute(["%$keyword%", "%$keyword%"]);
   }
} else {
   $stmt->execute();
}
$total = $stmt->fetch()['cnt'];
$total_page = ceil($total / $per_page);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Q&A</title>
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
       .qa-list {
           max-width: 1200px;
           margin: 50px auto;
           padding: 0 20px;
           height: 700px;
       }
       .qa-title {
            text-align: center;
            margin-top: 100px;
            margin-bottom: 100px;
        }
       .qa-title span {color: #666; font-size: 17px;}
       .qa-title h2 {font-size: 45px; margin-top: 10px;}
       
       .qa-table {
           width: 100%;
           border-collapse: collapse;
       }
       .qa-table th {
           background: #f8f8f8;
           padding: 15px;
           border-top: 2px solid #333;
           border-bottom: 1px solid #ddd;
       }
       .qa-table td {
           padding: 15px;
           border-bottom: 1px solid #ddd;
           text-align: center; 
       }
       
       .qa-search {
           display: flex;
           justify-content: center;
           gap: 5px;
           margin: 30px 0;
       }
       .qa-search select {
           padding: 8px;
           border: 1px solid #ddd;
       }
       .qa-search input {
           padding: 8px;
           border: 1px solid #ddd;
           width: 200px;
       }
       .qa-search button {
           padding: 8px 20px;
           background: #007a5c;
           color: #fff;
           border: none;
           cursor: pointer;
       }
       
       .write-btn {
           display: inline-block;
           padding: 10px 30px;
           background: #333;
           color: #fff;
           text-decoration: none;
           float: right;
       }
       
       .pagination {
           display: flex;
           justify-content: center;
           gap: 5px;
           margin-top: 30px;
       }
       .pagination a {
           padding: 5px 10px;
           border: 1px solid #ddd;
           text-decoration: none;
           color: #333;
       }
       .pagination a.active {
           background: #007a5c;
           color: #fff;
           border-color: #007a5c;
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


<div class="qa-list">
   <div class="qa-title">
       <span>Question & Answer</span>
       <h2>문의사항</h2>
   </div>
   
   <table class="qa-table">
       <thead>
           <tr>
               <th>번호</th>
               <th>제목</th>
               <th>날짜</th>
               <th>조회수</th>
           </tr>
       </thead>
       <tbody>
    <?php foreach($lists as $list): ?>
    <tr>
        <td><?php echo $list['id']; ?></td>
        <td><a href="inquiry_view.php?id=<?php echo $list['id']; ?>"><?php echo $list['title']; ?></a></td>
        <td><?php echo date('Y.m.d', strtotime($list['created_at'])); ?></td>
        <td><?php echo $list['views']; ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
   </table>

   <div class="qa-search">
    <select name="search_type">
        <option value="title" <?php echo $search_type=='title'?'selected':'';?>>제목</option>
        <option value="all" <?php echo $search_type=='all'?'selected':'';?>>제목+내용</option>
    </select>
    <input type="text" name="keyword" value="<?php echo $keyword;?>" placeholder="검색어를 입력하세요">
    <button onclick="search()">검색</button>
    </div>

   <a href="inquiry_write.php" class="write-btn">쓰기</a>

   <div class="pagination">
    <?php if($page > 1): ?>
        <a href="?page=1<?php echo $keyword?"&search_type={$search_type}&keyword={$keyword}":'';?>">처음</a>
        <a href="?page=<?php echo $page-1;?><?php echo $keyword?"&search_type={$search_type}&keyword={$keyword}":'';?>">이전</a>
    <?php endif; ?>
    
    <?php
    $start_page = max(1, $page - 2);
    $end_page = min($total_page, $page + 2);
    
    for($i = $start_page; $i <= $end_page; $i++): ?>
        <a href="?page=<?php echo $i;?><?php echo $keyword?"&search_type={$search_type}&keyword={$keyword}":'';?>" 
            <?php echo $i==$page?'class="active"':'';?>><?php echo $i;?></a>
    <?php endfor; ?>
    
    <?php if($page < $total_page): ?>
        <a href="?page=<?php echo $page+1;?><?php echo $keyword?"&search_type={$search_type}&keyword={$keyword}":'';?>">다음</a>
        <a href="?page=<?php echo $total_page;?><?php echo $keyword?"&search_type={$search_type}&keyword={$keyword}":'';?>">마지막</a>
    <?php endif; ?>
    </div>
</div>

<?php include '../inc/footer.php'; ?>
</body>
<script>
function search() {
   var type = document.querySelector('select[name="search_type"]').value;
   var keyword = document.querySelector('input[name="keyword"]').value;
   location.href = 'inquiry.php?search_type=' + type + '&keyword=' + keyword;
}
</script>

</html>