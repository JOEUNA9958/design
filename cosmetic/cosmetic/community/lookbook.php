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
    .lookbook-container {
        max-width: 1920px;
        margin: 0 auto;
        padding: 100px 15px 150px;
    }

    .lookbook-header {
        text-align: center;
        margin-bottom: 50px;
        margin-top: 80px;
    }

    .lookbook-label {
        font-family: 'Roboto';
        font-weight: 600;
        font-size: 16px;
        color: #757575;
        margin-bottom: 15px;
    }

    .lookbook-title {
        font-size: 30px;
        color: #424242;
        font-weight: 500;
        margin-top: 0;
    }

    .lookbook-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 50px;
        margin-bottom: 80px;
        margin-top: 150px;
    }

    .lookbook-item {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease;
    }

    .lookbook-item.active {
        opacity: 1;
        transform: translateY(0);
    }

    .lookbook-img {
        position: relative;
        width: 100%;
        height: 350px;
        background: #ebf7ff;
        overflow: hidden;
    }

    .lookbook-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .lookbook-img::before {
        content: '';
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border: 1px solid #fff;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 1;
    }

    .lookbook-img::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.3);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .lookbook-img:hover::before,
    .lookbook-img:hover::after {
        opacity: 1;
    }

    .lookbook-img:hover img {
        transform: scale(1.1);
        opacity: 0.7;
    }

    .view-more {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 12px 25px;
        background: #fff;
        color: #424242;
        border: none;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 2;
        cursor: pointer;
    }

    .lookbook-img:hover .view-more {
        opacity: 1;
    }

    .lookbook-info {
        padding: 10px 0 30px;
    }

    .lookbook-category {
        font-family: 'Roboto';
        font-weight: 500;
        font-size: 16px;
        color: #33957D;
        margin-bottom: 5px;
    }

    .lookbook-name {
        font-family: 'Roboto';
        font-weight: 500;
        font-size: 19px;
        color: #424242;
        letter-spacing: -1px;
    }

    .search-form {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 14px;
        background: #F5F5F5;
        margin-bottom: 80px;
        width: 1150px;
        margin-left: 350px;
    }

    /* 검색 폼 스타일 */
    .search-form select,
    .search-form input,
    .search-form button {
        height: 40px;
        border: 1px solid #fff;
    }

    .search-form select {
        width: 160px;
        padding: 0 13px;
        margin-right: 5px;
    }

    .search-form input {
        width: 421px;
        padding: 0 13px;
        margin-right: 5px;
    }

    .search-form button {
        width: 74px;
        background: #007A5D;
        color: #fff;
        border: none;
    }

    /* 페이지네이션 스타일 */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 4px;
        margin-bottom: 100px;
    }

    .pagination button {
        width: 40px;
        height: 40px;
        background: #fff;
        border: none;
    }

    .pagination button.active {
        background: #007A5D;
        color: #fff;
    }

    /* 카테고리 메뉴 스타일 추가 */
.category-menu {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 50px;
}

.category-btn {
    padding: 15px 40px;
    font-family: 'Roboto';
    font-size: 16px;
    background: #fff;
    border: 1px solid #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
}

.category-btn.active {
    background: #fff;
    border-color: #007A5D;
    color: #007A5D;
}

.category-btn:hover {
    border-color: #007A5D;
    color: #007A5D;
}
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>Community</h2>
            <div class="sub_menu">
                <a href="/cosmetic/community/lookbook.php" class="active">룩북</a>
                <a href="/cosmetic/community/notice.php">공지사항</a>
                <a href="/cosmetic/community/inquiry.php">문의사항</a>
                <a href="/cosmetic/gallery/index.php">갤러리</a>
            </div>
        </div>
    </div>
    <div class="lookbook-container">
    <div class="lookbook-header">
        <div class="lookbook-label">Look Book</div>
        <h2 class="lookbook-title">룩북</h2>
    </div>

    <div class="category-menu">
    <button class="category-btn active">All</button>
    <button class="category-btn">Company Item</button>
    <button class="category-btn">OEM/ODM</button>
    </div>

    <div class="lookbook-grid">
        <!-- 룩북 아이템 1 -->
        <div class="lookbook-item">
            <div class="lookbook-img">
                <a href="/cosmetic/community/lookbook_view.php?id=1">
                    <img src="../images/shop/product1.jpg" alt="룩북 이미지 1">
                    <button class="view-more">View More</button>
                </a>
            </div>
            <div class="lookbook-info">
                <div class="lookbook-category">2024 S/S</div>
                <div class="lookbook-name">Natural Daily Look</div>
            </div>
        </div>
        <!-- 추가 룩북 아이템들... -->
    </div>

    <div class="search-form">
        <select>
            <option>제목+내용</option>
        </select>
        <input type="text" placeholder="검색단어 입력">
        <button>검색</button>
    </div>

    <div class="pagination">
        <button class="prev">&lt;</button>
        <button class="prev-all">&lt;&lt;</button>
        <button class="page active">1</button>
        <button class="next">&gt;</button>
        <button class="next-all">&gt;&gt;</button>
    </div>
</div>
<?php include '../inc/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const lookbookItems = document.querySelectorAll('.lookbook-item');
    
    function checkScroll() {
        lookbookItems.forEach((item, index) => {
            const itemTop = item.getBoundingClientRect().top;
            if (itemTop < window.innerHeight - 100) {
                setTimeout(() => {
                    item.classList.add('active');
                }, index * 200);
            }
        });
    }

    window.addEventListener('scroll', checkScroll);
    checkScroll();
});

// 카테고리 버튼 동작
const categoryBtns = document.querySelectorAll('.category-btn');

categoryBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        // 모든 버튼에서 active 클래스 제거
        categoryBtns.forEach(b => b.classList.remove('active'));
        // 클릭된 버튼에 active 클래스 추가
        this.classList.add('active');
    });
});
</script>
</body>
</html>