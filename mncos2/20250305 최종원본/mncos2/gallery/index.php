<?php
include '../inc/db.php';

// 페이지네이션 설정
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 9; // 한 페이지에 보여줄 갤러리 수
$offset = ($page - 1) * $limit;

// 전체 게시물 수 조회
$stmt = $db->query("SELECT COUNT(*) as cnt FROM gallery");
$row = $stmt->fetch();
$total_count = $row['cnt'];
$total_pages = ceil($total_count / $limit);

// 게시물 목록 조회 (LIMIT 구문 수정)
$sql = "SELECT * FROM gallery ORDER BY id DESC LIMIT $offset, $limit";
$stmt = $db->query($sql);
$lists = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>갤러리 - M&COS</title>
    
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

    <div class="gallery-index-wrap">
        <div class="gallery-index-title">
            <span>Gallery</span>
            <h2>갤러리</h2>
        </div>
        <a href="write.php" class="gallery-index-write-btn">글쓰기</a>
        <div class="gallery-index-grid">
            <?php foreach($lists as $item): ?>
            <div class="gallery-index-item">
                <a href="view.php?id=<?php echo $item['id']; ?>">
                    <img src="../uploads/gallery/<?php echo $item['image_name']; ?>" alt="">
                    <div class="gallery-index-info">
                        <h3><?php echo $item['title']; ?></h3>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="gallery-index-pagination">
            <?php if($page > 1): ?>
                <a href="?page=1" class="gallery-index-page-item">처음</a>
                <a href="?page=<?php echo $page-1; ?>" class="gallery-index-page-item">이전</a>
            <?php endif; ?>
            
            <?php
            $start_page = max(1, $page - 2);
            $end_page = min($total_pages, $page + 2);
            
            for($i = $start_page; $i <= $end_page; $i++):
            ?>
                <a href="?page=<?php echo $i; ?>" class="gallery-index-page-item <?php echo $i == $page ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            
            <?php if($page < $total_pages): ?>
                <a href="?page=<?php echo $page+1; ?>" class="gallery-index-page-item">다음</a>
                <a href="?page=<?php echo $total_pages; ?>" class="gallery-index-page-item">마지막</a>
            <?php endif; ?>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>