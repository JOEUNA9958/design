<?php
include '../inc/header.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 4; // 2x2 그리드
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}

// 전체 아이템 수 조회
$count_sql = "SELECT COUNT(*) as total FROM exhibitions $where_clause";
$total_result = $conn->query($count_sql);
$total_items = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// 전시회 목록 조회
$sql = "SELECT * FROM exhibitions $where_clause ORDER BY start_date DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>NEWS</h2>
            <div class="sub_menu">
            <a href="/bestone/news/guide.php">카탈로그</a>
                <a href="/bestone/news/gallery.php" class="active">참여전시회</a>
                <a href="/bestone/gallery/gallery.php">갤러리</a>
            </div>
        </div>
    </div>

<div class="gallery-section">
    <h2 class="section-title">참여전시회</h2>
    
    <!-- 검색 영역 -->
    <div class="search-area">
        <select class="search-select">
            <option>전시회 명</option>
        </select>
        <input type="text" class="search-input" value="<?php echo htmlspecialchars($search_keyword); ?>" placeholder="검색어를 입력하세요">
        <button type="button" class="search-btn">검색</button>
    </div>

    <!-- 갤러리 그리드 -->
    <div class="gallery-grid">
        <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
        ?>
            <a href="/bestone/news/gallery_view.php?id=<?php echo $row['id']; ?>" class="gallery-item">
            <div class="gallery-image">
                <?php
                $image_url = $row['image_url'];
                if (strpos($image_url, '/bestone') !== 0) {
                    $image_url = '/bestone' . $image_url;
                }
                $image_url = str_replace('/bestone/bestone', '/bestone', $image_url);
                ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
            </div>
                <div class="gallery-info">
                    <span class="date"><?php echo date('Y년 m월 d일', strtotime($row['start_date'])); ?> ~ 
                                     <?php echo date('Y년 m월 d일', strtotime($row['end_date'])); ?></span>
                    <h3 class="title"><?php echo htmlspecialchars($row['title']); ?></h3>
                </div>
            </a>
        <?php 
            }
        } else {
            echo '<div class="no-results">등록된 전시회가 없습니다.</div>';
        }
        ?>
    </div>

    <div class="pagination">
        <?php
        // 전체 페이지 수
        $total_pages = ceil($total_items / $items_per_page);
        
        // 표시할 페이지 범위 계산
        $page_group = ceil($current_page / 5);
        $start_page = (($page_group - 1) * 5) + 1;
        $end_page = min($start_page + 4, $total_pages);
        
        // 이전 페이지 그룹
        if($start_page > 1) {
            echo "<a href='?page=".($start_page-1)."&keyword=".urlencode($search_keyword)."' class='page-link prev'>이전</a>";
        }
        
        // 페이지 번호
        for($i = $start_page; $i <= $end_page; $i++) {
            $active_class = $current_page == $i ? 'active' : '';
            echo "<a href='?page=$i&keyword=".urlencode($search_keyword)."' class='page-link $active_class'>$i</a>";
        }
        
        // 다음 페이지 그룹
        if($end_page < $total_pages) {
            echo "<a href='?page=".($end_page+1)."&keyword=".urlencode($search_keyword)."' class='page-link next'>다음</a>";
        }
        ?>
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

.gallery-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 140px;
}

.section-title {
    font-weight: 700;
    font-size: 40px;
    text-align: center;
    color: #191919;
    margin-bottom: 80px;
}

/* 검색 영역 */
.search-area {
    display: flex;
    justify-content: flex-end;
    gap: 4px;
    margin-bottom: 40px;
}

.search-select {
    width: 200px;
    height: 52px;
    padding: 0 20px;
    border: 1px solid #E3E3E3;
    font-size: 15px;
}

.search-input {
    width: 300px;
    height: 52px;
    border: 1px solid #E3E3E3;
    padding: 0 20px;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 80px 32px;
    margin-bottom: 60px;
}

.search-btn {
    width: 52px;
    height: 52px;
    background: #fff;
    border: 1px solid #E3E3E3;
    cursor: pointer;
}

.gallery-item {
    text-decoration: none;
    overflow: hidden;
}

.gallery-image {
    width: 100%;
    height: 300px;
    overflow: hidden;
    margin-bottom: 20px;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-image img {
    transform: scale(1.1);
}

.gallery-info {
    padding: 20px 0;
}


.date {
    font-size: 14px;
    color: #666;
    margin-bottom: 8px;
}

.title {
    font-size: 18px;
    font-weight: 600;
    color: #191919;
}

/* 페이지네이션 */
.pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 40px;
    margin-bottom: 100px;
}

.page-link {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    color: #191919;
    text-decoration: none;
    border: 1px solid #E3E3E3;
}

.page-link.active {
    background: #191919;
    color: #fff;
    border-color: #191919;
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
    max-width: 1280px; /* 컨테이너 최대 너비 제한 */
    margin: 0 auto;
    height: auto; /* 고정 높이 제거 */
}

.inquiry-text {
    text-align: center;
    font-weight: 600;
    font-size: 25px;
    line-height: 40px;
    color: #FFFFFF;
    margin-bottom: 20px;
    height: auto; /* 고정 높이 제거 */
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


/* 큰 태블릿 반응형 */
@media screen and (max-width: 1280px) {
    .gallery-section {
        width: 100%;
        padding: 100px 24px 0;
    }

    .gallery-grid {
        gap: 60px 24px;
    }

    .gallery-image {
        height: 280px;
    }
}

/* 태블릿 반응형 */
@media screen and (max-width: 1024px) {
    /* 서브 배너 */
    .sub_banner {
        height: 400px;
        background-size: cover;
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

    /* 섹션 타이틀 */
    .section-title {
        font-size: 32px;
        margin-bottom: 60px;
    }

    /* 검색 영역 */
    .search-area {
        margin-bottom: 32px;
    }

    .search-select {
        width: 160px;
        height: 48px;
        padding: 0 15px;
        font-size: 14px;
    }

    .search-input {
        width: 260px;
        height: 48px;
        padding: 0 15px;
        font-size: 14px;
    }

    .search-btn {
        width: 48px;
        height: 48px;
    }

    /* 갤러리 그리드 */
    .gallery-grid {
        gap: 40px 20px;
    }

    .gallery-image {
        height: 240px;
    }

    .gallery-info {
        padding: 16px 0;
    }

    .date {
        font-size: 13px;
        margin-bottom: 6px;
    }

    .title {
        font-size: 16px;
    }
}

/* 모바일 반응형 */
@media screen and (max-width: 768px) {
    .gallery-section {
        padding: 80px 16px 0;
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
        padding: 0 10px;
    }

    /* 섹션 타이틀 */
    .section-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    /* 검색 영역 */
    .search-area {
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 30px;
    }

    .search-select {
        width: 100%;
        height: 44px;
    }

    .search-input {
        width: calc(100% - 52px);
        height: 44px;
    }

    .search-btn {
        width: 44px;
        height: 44px;
    }

    /* 갤러리 그리드 */
    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 32px;
        margin-bottom: 40px;
    }

    .gallery-image {
        height: 0;
        padding-bottom: 75%; /* 4:3 비율 유지 */
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

    /* 페이지네이션 */
    .pagination {
        margin: 30px 0 60px;
        gap: 4px;
    }

    .page-link {
        width: 28px;
        height: 28px;
        font-size: 13px;
    }

    .page-link.prev,
    .page-link.next {
        padding: 0 10px;
        font-size: 13px;
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
        line-height: 1.5;
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
    .gallery-section {
        padding: 60px 12px 0;
    }

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

    /* 섹션 타이틀 */
    .section-title {
        font-size: 24px;
        margin-bottom: 30px;
    }

    /* 검색 영역 */
    .search-select,
    .search-input,
    .search-btn {
        height: 40px;
        font-size: 13px;
    }

    /* 갤러리 아이템 */
    .gallery-grid {
        gap: 24px;
    }

    .gallery-info {
        padding: 10px 0;
    }

    .date {
        font-size: 12px;
        margin-bottom: 4px;
    }

    .title {
        font-size: 14px;
    }

    /* 페이지네이션 */
    .page-link {
        width: 26px;
        height: 26px;
        font-size: 12px;
    }

    /* 문의하기 섹션 */
    .inquiry-text {
        font-size: 18px;
    }

    .inquiry-btn {
        width: 120px;
        height: 40px;
    }

    .btn-text {
        font-size: 13px;
    }
}

/* 모바일 가로 모드 */
@media screen and (max-width: 915px) and (orientation: landscape) {
    .gallery-section {
        padding-top: 60px;
    }

    .sub_banner {
        height: 250px;
    }

    /* 갤러리 그리드를 가로모드에서 2열로 유지 */
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }

    .gallery-image {
        height: 200px;
        padding-bottom: 0;
    }

    /* 검색 영역 레이아웃 최적화 */
    .search-area {
        display: grid;
        grid-template-columns: 160px 1fr 48px;
        gap: 8px;
    }

    .search-select,
    .search-input,
    .search-btn {
        width: 100%;
    }
}
</style>

<?php include '../inc/footer.php'; ?>