<?php
include '../inc/header.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 12;  // 한 페이지당 12개 표시 (3x4 그리드)
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}

// 전체 게시글 수 조회
$count_sql = "SELECT COUNT(*) as total FROM gallery_posts $where_clause";
$total_result = $conn->query($count_sql);
$total_items = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// 게시글 목록 조회
$sql = "SELECT * FROM gallery_posts $where_clause ORDER BY created_at DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<div class="sub_banner_wrap">
    <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
        <h2>NEWS</h2>
        <div class="sub_menu">
            <a href="/bestone/news/guide.php">카탈로그</a>
            <a href="/bestone/news/gallery.php">참여전시회</a>
            <a href="/bestone/gallery/gallery.php" class="active">갤러리</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="gallery-section">
        <h2 class="section-title">갤러리</h2>
        
        <div class="gallery-header">
            <div class="search-area">
                <input type="text" class="search-input" value="<?php echo htmlspecialchars($search_keyword); ?>" placeholder="검색어를 입력하세요">
                <button type="button" class="search-btn">검색</button>
            </div>
            <a href="gallery_write.php" class="write-btn">글쓰기</a>
        </div>

        <div class="gallery-grid">
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                ?>
                    <a href="gallery_view.php?id=<?php echo $row['id']; ?>" class="gallery-item">
                        <div class="gallery-image">
                            <?php
                            // 이미지 URL 수정
                            $image_url = $row['image_url'];
                            if(strpos($image_url, '/bestone') !== 0) {
                                $image_url = '/bestone' . $image_url;
                            }
                            ?>
                            <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                        </div>
                        <div class="gallery-info">
                            <h3 class="title"><?php echo htmlspecialchars($row['title']); ?></h3>
                            <div class="meta">
                                <span class="author"><?php echo htmlspecialchars($row['author']); ?></span>
                                <span class="date"><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></span>
                                <!-- <span class="comments">댓글 <?php echo $row['comment_count']; ?></span> -->
                            </div>
                        </div>
                    </a>
                <?php 
                    }
                } else {
                    echo '<div class="no-results">등록된 게시글이 없습니다.</div>';
                }
                ?>
        </div>

        <div class="pagination">
            <?php
            // 이전 페이지
            if($current_page > 1) {
                echo "<a href='?page=".($current_page-1)."&keyword=".urlencode($search_keyword)."' class='page-link prev'>이전</a>";
            }
            
            // 페이지 번호
            for($i = 1; $i <= $total_pages; $i++) {
                $active_class = $current_page == $i ? 'active' : '';
                echo "<a href='?page=$i&keyword=".urlencode($search_keyword)."' class='page-link $active_class'>$i</a>";
            }
            
            // 다음 페이지
            if($current_page < $total_pages) {
                echo "<a href='?page=".($current_page+1)."&keyword=".urlencode($search_keyword)."' class='page-link next'>다음</a>";
            }
            ?>
        </div>
    </div>
</div>

<section class="inquiry-section">
    <div class="inquiry-container">
        <p class="inquiry-text">주문제작은 기획서를 포함하여<br> 문의주시면 더욱 상세한 답변이 가능합니다.</p>
        <a href="/bestone/faq/inquiry.php" class="inquiry-btn">
            <span class="btn-text">문의하기</span>
        </a>
    </div>
</section>

<style>
/* 서브 배너 */
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
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.1);
    z-index: 1;
    height: 60px;
}

.sub_menu a {
    flex: 1;
    text-align: center;
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgb(56 62 60 / 51%);
    transition: all 0.3s ease;
    font-size: 16px;
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
    background: #ffffff;
    color: #000;
}

.container {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
}

.gallery-section {
    padding: 80px 0;
}

.section-title {
    font-weight: 700;
    font-size: 39.21px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    margin-bottom: 80px;
}

.gallery-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.search-area {
    display: flex;
    gap: 4px;
    margin-left: auto;
    margin-right: 10px;
}

.search-input {
    width: 378px;
    height: 52px;
    border: 1px solid #E3E3E3;
    padding: 0 15px;
}

.search-btn,
.write-btn {
    height: 52px;
    background: #fff;
    color: #191919;
    border: 1px solid #E3E3E3;
    cursor: pointer;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 60px;
}

.gallery-item {
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
}

.gallery-image {
    width: 100%;
    height: 280px;
    overflow: hidden;
    margin-bottom: 15px;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.gallery-info {
    padding: 15px 0;
}

.title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #191919;
}

.meta {
    display: flex;
    gap: 15px;
    font-size: 14px;
    color: #666;
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 60px;
}

.page-link {
    width: 24px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: #191919;
    text-decoration: none;
}

.page-link.active {
    font-weight: 700;
}

.page-link.prev,
.page-link.next {
    width: auto;
    padding: 0 15px;
}

.inquiry-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
    gap: 20px;
    width: 100%;
    height: 280px;
    background-image: url('/bestone/images/main/banner2.jpg');
    background-size: cover;
    background-position: center;
}

.inquiry-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 64px 0;
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    height: auto;
}

.inquiry-text {
    text-align: center;
    font-weight: 600;
    font-size: 25px;
    line-height: 40px;
    color: #FFFFFF;
    margin-bottom: 20px;
    height: auto;
}

.inquiry-btn {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 14.5px 30px;
    width: 147px;
    height: 48px;
    background: #191919;
    border-radius: 24px;
    text-decoration: none;
}

.btn-text {
    font-weight: 500;
    font-size: 15px;
    line-height: 22px;
    display: flex;
    align-items: center;
    color: #FFFFFF;
}

/* 태블릿 반응형 */
@media screen and (max-width: 1280px) {
    .container {
        padding: 0 24px;
    }

    .gallery-section {
        padding: 60px 0;
    }

    .section-title {
        font-size: 34px;
        margin-bottom: 60px;
    }

    .gallery-grid {
        gap: 24px;
    }

    .gallery-image {
        height: 240px;
    }
}

/* 작은 태블릿 반응형 */
@media screen and (max-width: 1024px) {
    /* 서브 배너 */
    .sub_banner {
        height: 400px;
    }

    .sub_banner h2 {
        font-size: 36px;
    }

    .sub_menu {
        height: 50px;
    }

    .sub_menu a {
        font-size: 15px;
    }

    /* 갤러리 헤더 */
    .gallery-header {
        flex-direction: column;
        gap: 16px;
        margin-bottom: 30px;
    }

    .search-area {
        width: 100%;
        margin: 0;
    }

    .search-input {
        flex: 1;
        width: auto;
    }

    .search-btn,
    .write-btn {
        height: 48px;
        font-size: 14px;
    }

    /* 갤러리 그리드 */
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .gallery-image {
        height: 220px;
    }

    .title {
        font-size: 16px;
    }

    .meta {
        font-size: 13px;
    }
}

/* 모바일 반응형 */
@media screen and (max-width: 768px) {
    .container {
        padding: 0 16px;
    }

    /* 서브 배너 */
    .sub_banner {
        height: 300px;
    }

    .sub_banner h2 {
        font-size: 28px;
    }

    .sub_menu {
        height: 44px;
    }

    .sub_menu a {
        font-size: 14px;
    }

    /* 갤러리 섹션 */
    .gallery-section {
        padding: 40px 0;
    }

    .section-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    /* 검색 영역 */
    .search-area {
        flex-wrap: wrap;
    }

    .search-input {
        height: 44px;
        font-size: 14px;
    }

    .search-btn,
    .write-btn {
        height: 44px;
        padding: 0 15px;
    }

    /* 갤러리 그리드 */
    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }

    .gallery-image {
        height: 0;
        padding-bottom: 75%; /* 4:3 비율 */
        position: relative;
    }

    .gallery-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .gallery-info {
        padding: 12px 0;
    }

    .title {
        font-size: 15px;
        margin-bottom: 8px;
    }

    .meta {
        gap: 12px;
        font-size: 12px;
    }

    /* 페이지네이션 */
    .pagination {
        gap: 4px;
        margin-top: 40px;
    }

    .page-link {
        width: 28px;
        height: 28px;
        font-size: 14px;
    }

    .page-link.prev,
    .page-link.next {
        padding: 0 10px;
    }

    /* 문의하기 섹션 */
    .inquiry-section {
        height: auto;
    }

    .inquiry-container {
        padding: 40px 16px;
    }

    .inquiry-text {
        font-size: 20px;
        line-height: 1.4;
    }

    .inquiry-btn {
        width: 130px;
        height: 44px;
        padding: 12px 24px;
    }

    .btn-text {
        font-size: 14px;
    }
}

/* 작은 모바일 화면 */
@media screen and (max-width: 375px) {
    /* 서브메뉴 */
    .sub_menu {
        flex-wrap: wrap;
        height: auto;
    }

    .sub_menu a {
        width: 100%;
        height: 40px;
        font-size: 13px;
    }

    /* 갤러리 섹션 */
    .section-title {
        font-size: 24px;
        margin-bottom: 30px;
    }

    .search-input,
    .search-btn,
    .write-btn {
        height: 40px;
        font-size: 13px;
    }

    .gallery-info {
        padding: 10px 0;
    }

    .title {
        font-size: 14px;
    }

    .meta {
        font-size: 11px;
        gap: 10px;
    }

    /* 페이지네이션 */
    .page-link {
        width: 26px;
        height: 26px;
        font-size: 13px;
    }
}

/* 모바일 가로 모드 */
@media screen and (max-width: 915px) and (orientation: landscape) {
    .sub_banner {
        height: 250px;
    }

    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .gallery-image {
        height: 180px;
        padding-bottom: 0;
    }

    /* 검색 영역 최적화 */
    .gallery-header {
        flex-direction: row;
        align-items: center;
    }

    .search-area {
        flex: 1;
        max-width: 500px;
    }
}
</style>

<script>
document.querySelector('.search-btn').addEventListener('click', function() {
    const keyword = document.querySelector('.search-input').value;
    location.href = `?keyword=${encodeURIComponent(keyword)}`;
});

document.querySelector('.search-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        const keyword = this.value;
        location.href = `?keyword=${encodeURIComponent(keyword)}`;
    }
});
</script>

<?php include '../inc/footer.php'; ?>