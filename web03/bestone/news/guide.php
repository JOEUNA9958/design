<?php
include '../inc/header.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 10;
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
$count_sql = "SELECT COUNT(*) as total FROM guide_posts $where_clause";
$total_result = $conn->query($count_sql);
$total_items = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// 게시글 목록 조회
$sql = "SELECT * FROM guide_posts $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>


<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>NEWS</h2>
            <div class="sub_menu">
            <a href="/bestone/news/guide.php" class="active">카탈로그</a>
                <a href="/bestone/news/gallery.php">참여전시회</a>
                <a href="/bestone/gallery/gallery.php">갤러리</a>
            </div>
        </div>
    </div>

<div class="container">
    <div class="guide-section">
        <h2 class="section-title">가이드라인</h2>
        
        <!-- 검색 영역 -->
        <div class="search-area">
            <select class="search-select">
                <option>제목</option>
            </select>
            <input type="text" class="search-input" value="<?php echo htmlspecialchars($search_keyword); ?>" placeholder="검색어를 입력하세요">
            <button type="button" class="search-btn">검색</button>
        </div>

        <!-- 게시글 목록 -->
        <div class="guide-table">
            <div class="table-header">
                <div class="col-number">번호</div>
                <div class="col-title">제목</div>
                <div class="col-date">작성일자</div>
            </div>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
            ?>
                <a href="/bestone/news/guide_view.php?id=<?php echo $row['id']; ?>" class="table-row">
                    <div class="col-number"><?php echo $row['id']; ?></div>
                    <div class="col-title">
                        <?php echo htmlspecialchars($row['title']); ?>
                        <?php if($row['file_path']): ?>
                            <span class="file-icon">📎</span>
                        <?php endif; ?>
                    </div>
                    <div class="col-date"><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></div>
                </a>
            <?php 
                }
            } else {
                echo '<div class="no-results">등록된 게시글이 없습니다.</div>';
            }
            ?>
        </div>

        <!-- 페이지네이션 -->
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                $active_class = $current_page == $i ? 'active' : '';
                echo "<a href='?page=$i&keyword=$search_keyword' class='page-link $active_class'>$i</a>";
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
.guide-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 80px;
}

.section-title {
    font-weight: 700;
    font-size: 40px;
    text-align: center;
    color: #191919;
    margin-bottom: 80px;
}

.search-area {
    display: flex;
    justify-content: flex-end;
    gap: 4px;
    margin-bottom: 40px;
}

.search-select {
    height: 52px;
    padding: 13px 21px;
    border: 1px solid #E3E3E3;
    font-size: 15.125px;
    width: 110px;
}

.search-input {
    width: 378px;
    height: 52px;
    border: 1px solid #E3E3E3;
    padding: 0 15px;
}

.search-btn {
    width: 50px;
    height: 52px;
    background: #fff;
    border: 1px solid #E3E3E3;
    cursor: pointer;
}

.guide-table {
    border-top: 1px solid #9C9C9C;
}

.table-header,
.table-row {
    display: flex;
    align-items: center;
    height: 71.5px;
    text-decoration: none;
    border-bottom: 1px solid #E3E3E3;
}

.table-header {
    font-weight: 600;
    font-size: 16.73px;
    color: #191919;
}

.table-row {
    font-weight: 400;
    font-size: 16.73px;
    color: #191919;
}

.col-number {
    width: 276.67px;
    text-align: center;
}

.col-title {
    width: 430.42px;
    padding: 0 12px;
}

.col-date {
    width: 572.91px;
    text-align: center;
}

.file-icon {
    margin-left: 5px;
    color: #3E78FF;
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


/* 테블릿 반응형 */
@media screen and (max-width: 1280px) {
    .container {
        width: 100%;
        padding: 0 24px;
    }

    .guide-section {
        width: 100%;
        padding-top: 60px;
    }

    /* 검색 영역 */
    .search-area {
        margin-bottom: 32px;
    }

    .search-input {
        width: 300px;
    }
}

/* 작은 태블릿 반응형 */
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
        width: 100%;
        margin-bottom: 30px;
    }

    .search-select {
        height: 48px;
        padding: 10px 15px;
        font-size: 14px;
    }

    .search-input {
        height: 48px;
        font-size: 14px;
    }

    .search-btn {
        height: 48px;
    }

    /* 테이블 헤더와 로우 */
    .table-header,
    .table-row {
        height: 65px;
    }

    .col-number {
        width: 20%;
    }

    .col-title {
        width: 50%;
    }

    .col-date {
        width: 30%;
    }

    .table-header {
        font-size: 15px;
    }

    .table-row {
        font-size: 15px;
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
        padding: 0 10px;
    }

    /* 가이드 섹션 */
    .guide-section {
        padding-top: 40px;
    }

    .section-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    /* 검색 영역 */
    .search-area {
        flex-wrap: wrap;
        gap: 8px;
    }

    .search-select {
        width: 100%;
        height: 44px;
    }

    .search-input {
        width: calc(100% - 52px); /* 검색 버튼 너비만큼 제외 */
        height: 44px;
    }

    .search-btn {
        width: 44px;
        height: 44px;
    }

    /* 테이블 스타일 변경 */
    .guide-table {
        border-top: 2px solid #191919;
    }

    .table-header {
        display: none; /* 모바일에서는 헤더 숨김 */
    }

    .table-row {
        flex-wrap: wrap;
        height: auto;
        padding: 15px 0;
        position: relative;
    }

    .col-number {
        width: auto;
        position: absolute;
        top: 15px;
        left: 0;
        font-size: 13px;
        color: #666;
    }

    .col-title {
        width: 100%;
        padding: 0 0 0 50px; /* 번호 영역만큼 패딩 */
        font-size: 15px;
        margin-bottom: 8px;
    }

    .col-date {
        width: 100%;
        text-align: left;
        padding-left: 50px;
        font-size: 13px;
        color: #666;
    }

    .file-icon {
        font-size: 14px;
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

    /* 섹션 타이틀 */
    .section-title {
        font-size: 24px;
        margin-bottom: 30px;
    }

    /* 검색 영역 */
    .search-select {
        height: 40px;
        font-size: 13px;
    }

    .search-input {
        height: 40px;
        font-size: 13px;
    }

    .search-btn {
        height: 40px;
    }

    /* 테이블 로우 */
    .table-row {
        padding: 12px 0;
    }

    .col-title {
        font-size: 14px;
        line-height: 1.4;
    }

    .col-date {
        font-size: 12px;
    }

    /* 문의하기 섹션 */
    .inquiry-section {
        height: auto;
    }

    .inquiry-container {
        padding: 40px 16px;
    }

    .inquiry-text {
        font-size: 18px;
        line-height: 1.5;
    }

    .inquiry-btn {
        width: 120px;
        height: 40px;
        padding: 10px 20px;
    }

    .btn-text {
        font-size: 13px;
    }

    /* 페이지네이션 */
    .page-link {
        width: 26px;
        height: 26px;
        font-size: 12px;
    }
}

/* 모바일 가로 모드 */
@media screen and (max-width: 915px) and (orientation: landscape) {
    .sub_banner {
        height: 250px;
    }

    .guide-section {
        padding-top: 30px;
    }

    .section-title {
        margin-bottom: 30px;
    }

    /* 검색 영역 레이아웃 최적화 */
    .search-area {
        display: grid;
        grid-template-columns: 120px 1fr 50px;
        gap: 8px;
    }

    .search-select,
    .search-input,
    .search-btn {
        width: 100%;
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