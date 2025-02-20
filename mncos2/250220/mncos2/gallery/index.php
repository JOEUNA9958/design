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
  <title>갤러리</title>
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

.board-content {
    max-width: 1000px;
    margin: 100px auto;
    padding: 0 20px;
}

.board-title {
    font-size: 32px;
    text-align: center;
    margin-bottom: 50px;
}

.write-btn {
    display: inline-block;
    padding: 12px 30px;
    background: #333;
    color: #fff;
    text-decoration: none;
    margin-bottom: 20px;
    float: right;
}
/* 갤러리 기본 레이아웃 */
.gallery-wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    flex: 1; /* 남은 공간을 gallery-wrap이 차지하도록 */
}

/* 갤러리 타이틀 스타일 */
.gallery-title {
    text-align: center;
    margin-bottom: 80px;
    margin-top: 80px;
}

.gallery-title span {
    display: block;
    color: #666;
    font-size: 18px;
    margin-bottom: 10px;
}

.gallery-title h2 {
    font-size: 32px;
    color: #333;
}

/* 글쓰기 버튼 */
.write-btn {
    display: inline-block;
    padding: 12px 30px;
    background: #333;
    color: #fff;
    text-decoration: none;
    margin-bottom: 30px;
    float: right;
    transition: background-color 0.3s;
}

.write-btn:hover {
    background: #555;
}

/* 갤러리 그리드 레이아웃 */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    clear: both;
    padding-top: 20px;
}

/* 갤러리 아이템 스타일 */
.gallery-item {
    border: 1px solid #ddd;
    overflow: hidden;
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.gallery-item a {
    text-decoration: none;
    color: inherit;
}

.gallery-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

.gallery-info {
    padding: 20px;
    background: #fff;
}

.gallery-info h3 {
    margin: 0;
    font-size: 16px;
    color: #333;
    font-weight: normal;
}

/* 페이지네이션 스타일 */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
    gap: 10px;
}

.page-item {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 10px;
    border: 1px solid #ddd;
    color: #666;
    text-decoration: none;
    transition: all 0.3s;
}

.page-item:hover {
    background: #f8f8f8;
    color: #333;
}

.page-item.active {
    background: #333;
    color: #fff;
    border-color: #333;
}
footer {
    width: 100%; /* 전체 너비 사용 */
    margin-top: auto; /* 하단에 고정 */
    background: #f8f8f8; /* 배경색 추가 */
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

@media (max-width: 768px) {
    .footer-content {
        padding: 30px 15px;
    }
}
/* 반응형 스타일 */
@media (max-width: 1200px) {
    .gallery-wrap {
        padding: 0 40px;
    }

    .gallery-grid {
        gap: 20px;
    }
}

@media (max-width: 991px) {
    .visual h2 {
        font-size: 36px;
    }

    .gallery-title {
        margin: 60px 0;
    }

    .gallery-title span {
        font-size: 16px;
    }

    .gallery-title h2 {
        font-size: 28px;
    }

    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .gallery-item img {
        height: 200px;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .visual h2 {
        font-size: 32px;
    }

    .visual p {
        font-size: 16px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    .gallery-wrap {
        padding: 0 20px;
    }

    .gallery-title {
        margin: 40px 0;
    }

    .gallery-title span {
        font-size: 15px;
    }

    .gallery-title h2 {
        font-size: 24px;
    }

    .write-btn {
        padding: 10px 20px;
        font-size: 14px;
    }

    .gallery-item img {
        height: 180px;
    }

    .gallery-info {
        padding: 15px;
    }

    .gallery-info h3 {
        font-size: 14px;
    }

    /* 페이지네이션 조정 */
    .pagination {
        gap: 5px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .page-item {
        min-width: 35px;
        height: 35px;
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 300px;
    }

    .visual h2 {
        font-size: 28px;
    }

    .visual p {
        font-size: 14px;
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

    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .gallery-item img {
        height: 220px;
    }

    .gallery-info h3 {
        font-size: 13px;
    }

    .page-item {
        min-width: 30px;
        height: 30px;
        font-size: 12px;
        padding: 0 8px;
    }

    /* 처음, 마지막 버튼 숨기기 */
    .page-item:first-child,
    .page-item:last-child {
        display: none;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual h2 {
        font-size: 24px;
    }

    .visual p {
        font-size: 13px;
    }

    .menu-item a {
        font-size: 13px;
        padding: 0 5px;
    }

    .gallery-title span {
        font-size: 13px;
    }

    .gallery-title h2 {
        font-size: 20px;
    }

    .gallery-item img {
        height: 200px;
    }

    .gallery-info {
        padding: 12px;
    }

    .gallery-info h3 {
        font-size: 12px;
    }

    .write-btn {
        padding: 8px 15px;
        font-size: 12px;
    }

    .page-item {
        min-width: 28px;
        height: 28px;
        font-size: 11px;
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

    <!-- 페이지네이션 추가 -->
    <div class="pagination">
        <?php if($page > 1): ?>
            <a href="?page=1" class="page-item">처음</a>
            <a href="?page=<?php echo $page-1; ?>" class="page-item">이전</a>
        <?php endif; ?>
        
        <?php
        $start_page = max(1, $page - 2);
        $end_page = min($total_pages, $page + 2);
        
        for($i = $start_page; $i <= $end_page; $i++):
        ?>
            <a href="?page=<?php echo $i; ?>" class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        
        <?php if($page < $total_pages): ?>
            <a href="?page=<?php echo $page+1; ?>" class="page-item">다음</a>
            <a href="?page=<?php echo $total_pages; ?>" class="page-item">마지막</a>
        <?php endif; ?>
    </div>
</div> <!-- gallery-wrap 닫는 태그 -->

<?php include '../inc/footer.php'; ?>
</body>
</html>