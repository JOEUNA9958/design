<?php
include '../inc/header.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 9;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$category_filter = isset($_GET['category']) ? $_GET['category'] : 'all';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}
if($category_filter && $category_filter != 'all') {
    $where_clause .= " AND category = '".mysqli_real_escape_string($conn, $category_filter)."'";
}

// 전체 아이템 수 조회
$count_sql = "SELECT COUNT(*) as total FROM products $where_clause";
$total_result = $conn->query($count_sql);
$total_items = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// 상품 목록 조회
$sql = "SELECT * FROM products $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>포트폴리오</h2>
            <div class="sub_menu">
            <a href="/bestone/portfolio/oemodm.php" class="active">OEM/ODM</a>
                <a href="/bestone/portfolio/brand.php">브랜드명</a>
            </div>
        </div>
    </div>

<div class="portfolio-section">
    <div class="title-section">
        <h2 class="section-title">OEM / ODM</h2>
    </div>
    
    <!-- 카테고리 필터 -->
    <div class="category-filter">
        <button class="filter-btn <?php echo $category_filter == 'all' ? 'active' : ''; ?>" data-category="all">전체</button>
        <button class="filter-btn <?php echo $category_filter == 'mask' ? 'active' : ''; ?>" data-category="mask">마스크/코팩</button>
        <button class="filter-btn <?php echo $category_filter == 'diy' ? 'active' : ''; ?>" data-category="diy">DIY BEAUTY</button>
        <button class="filter-btn <?php echo $category_filter == 'skincare' ? 'active' : ''; ?>" data-category="skincare">SKINCARE</button>
    </div>

    <!-- 검색 영역 -->
    <div class="search-row">
        <form class="search-field" method="GET" action="">
            <select class="search-select" name="search_type">
                <option value="title">제목</option>
            </select>
            <div style="position: relative;">
                <input type="text" class="search-input" name="keyword" value="<?php echo htmlspecialchars($search_keyword); ?>" placeholder="검색어를 입력하세요">
                <button type="submit" class="search-button">
                    <span class="sr-only">검색</span>
                    <span class="search-icon"></span>
                </button>
            </div>
        </form>
    </div>

    <!-- 제품 그리드 -->
    <div class="product-container">
    <div class="product-grid">
        <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                // 카테고리 매핑
                $category_names = [
                    'mask' => '마스크/코팩',
                    'diy' => 'DIY BEAUTY',
                    'skincare' => 'SKINCARE'
                ];
        ?>
            <a href="/bestone/portfolio/oemodm_detail.php?id=<?php echo $row['id']; ?>" class="product-item">
            <div class="product-image">
                <?php
                    $image_url = $row['image_url'];
                    // 경로가 /bestone으로 시작하지 않는 경우에만 추가
                    if (strpos($image_url, '/bestone') !== 0) {
                        $image_url = '/bestone' . $image_url;
                    }
                    // 중복된 경로 수정
                    $image_url = str_replace('/bestone/bestone', '/bestone', $image_url);
                ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
            </div>
                <div class="product-info">
                    <span class="category"><?php echo htmlspecialchars($category_names[$row['category']] ?? $row['category']); ?></span>
                    <h3 class="product-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                </div>
            </a>
        <?php 
            }
        } ?>
    </div>
    </div>

    <!-- 페이지네이션 -->
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            $active_class = $current_page == $i ? 'active' : '';
            echo "<a href='?page=$i&category=$category_filter&keyword=$search_keyword' class='page-link $active_class'>$i</a>";
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
/* 컨테이너 */
.container {
    width: 1280px;
    margin: 0 auto;
    padding: 100px 0;
}

/* 전체 섹션 */
.portfolio-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 140px;
}


/* 제목 섹션 */
.title-section {
    text-align: center;
    margin-bottom: 40px;
}

.section-title {
    font-weight: 700;
    font-size: 40px;
    line-height: 46px;
    letter-spacing: -0.84px;
    color: #191919;
}

/* 카테고리 필터 */
.category-filter {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 40px;
}

.filter-btn {
    height: 48px;
    padding: 13.5px 22px;
    border-radius: 24px;
    font-size: 16px;
    font-weight: 500;
    border: 2px solid #E3E3E3;
    background: transparent;
    color: #9C9C9C;
    cursor: pointer;
}
.filter-btn.active {
    background: #191919;
    border-color: #191919;
    color: #FFFFFF;
    font-weight: 700;
}

/* 검색 영역 */
.search-row {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 60px;
}

.search-field {
    display: flex;
    align-items: center;
    gap: 4px;
    position: relative;
}

.search-select {
    height: 52px;
    padding: 13px 21px;
    border: 1px solid #E3E3E3;
    font-size: 16px;
    color: #191919;
    width: 150px;
}

.search-input {
    width: 378px;
    height: 52px;
    border: 1px solid #E3E3E3;
    padding: 0 50px 0 15px; /* 오른쪽 패딩 증가 */
    font-size: 15px;
}

.search-button {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
    background-size: contain;
    background-repeat: no-repeat;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}

/* 제품 그리드 컨테이너 */
.product-container {
    width: 100%;
    margin-bottom: 60px; /* inquiry 섹션과의 간격 */
}
.product-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
}

/* 제품 아이템 */
.product-item {
    width: 402.66px;
    margin-bottom: 48px;
}

.product-image {
    width: 402.66px;
    height: 402.66px;
    overflow: hidden; /* 이미지가 컨테이너를 벗어나지 않도록 */
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease-in-out; /* 부드러운 전환 효과 */
}

.product-item:hover .product-image img {
    transform: scale(1.1); /* 호버 시 10% 확대 */
}

.product-info {
    padding: 27px 28px 28px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.category {
    font-family: 'Inter';
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #191919;
}

.product-title {
    font-family: 'Inter';
    font-weight: 600;
    font-size: 19px;
    line-height: 25px;
    letter-spacing: -0.38px;
    color: #191919;
}

/* 페이지네이션 */
.pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 60px;
}

.page-link {
    width: 24px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Inter';
    font-weight: 600;
    font-size: 16px;
    color: #191919;
    text-decoration: none;
}

.page-link.active {
    font-family: 'Poppins';
    font-weight: 700;
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

.no-results {
    width: 100%;
    text-align: center;
    padding: 100px 0;
    font-size: 18px;
    color: #666;
    grid-column: 1 / -1;
    background: #f9f9f9;
    border-radius: 8px;
}

/* 태블릿 반응형 */
@media screen and (max-width: 1024px) {
    .mobile-menu-btn {
        left: 90%;
    }

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
        font-size: 14px;
    }

    /* 포트폴리오 섹션 */
    .portfolio-section {
        width: 100%;
        padding: 80px 24px 0;
    }

    .section-title {
        font-size: 32px;
        margin-bottom: 40px;
    }

    /* 카테고리 필터 */
    .category-filter {
        gap: 8px;
        flex-wrap: wrap;
        padding: 0 16px;
    }

    .filter-btn {
        height: 44px;
        padding: 10px 18px;
        font-size: 14px;
    }

    /* 검색 영역 */
    .search-row {
        padding: 0 16px;
        margin-bottom: 40px;
    }

    .search-field {
        width: 100%;
    }

    .search-select {
        width: 120px;
        height: 48px;
        font-size: 14px;
    }

    .search-input {
        width: 100%;
        height: 48px;
        font-size: 14px;
    }

    /* 제품 그리드 */
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .product-item {
        width: 100%;
    }

    .product-image {
        width: 100%;
        height: auto;
        aspect-ratio: 1/1;
    }
}

/* 모바일 반응형 */
@media screen and (max-width: 768px) {
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
        font-size: 13px;
    }

    /* 포트폴리오 섹션 */
    .portfolio-section {
        padding: 60px 16px 0;
    }

    .section-title {
        font-size: 28px;
        margin-bottom: 30px;
    }

    /* 검색 영역 */
    .search-row {
        margin-bottom: 30px;
    }

    .search-field {
        flex-direction: column;
        gap: 8px;
    }

    .search-select {
        width: 100%;
    }

    /* 제품 그리드 */
    .product-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .product-info {
        padding: 20px 16px;
    }

    .category {
        font-size: 13px;
    }

    .product-title {
        font-size: 16px;
    }

    /* 페이지네이션 */
    .pagination {
        gap: 4px;
        margin-bottom: 40px;
    }

    .page-link {
        width: 20px;
        height: 28px;
        font-size: 14px;
    }
}

/* 작은 모바일 화면 */
@media screen and (max-width: 375px) {
    .sub_menu {
        flex-wrap: wrap;
        height: auto;
    }

    .sub_menu a {
        width: 50%;
        height: 44px;
        font-size: 12px;
    }

    .filter-btn {
        padding: 8px 14px;
        font-size: 13px;
    }

    .product-info {
        padding: 16px;
    }

    .category {
        font-size: 12px;
    }

    .product-title {
        font-size: 15px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.dataset.category;
            window.location.href = `?category=${category}&keyword=<?php echo urlencode($search_keyword); ?>`;
        });
    });
});
</script>

<?php
include '../inc/footer.php';
$conn->close();
?>