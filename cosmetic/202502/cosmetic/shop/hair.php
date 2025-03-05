<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>R&D</title>
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

    .shop-container {
        max-width: 1920px;
        margin: 0 auto;
        padding: 100px 15px 150px;
    }


.header {
    text-align: center;
    margin-bottom: 50px;
}

.header-small {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 16px;
    color: #757575;
    margin-bottom: 20px;
}

.header-title {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 37.5px;
    color: #424242;
    line-height: 60px;
    margin-bottom: 50px;
}

.product-count {
    font-size: 14px;
    color: #757575;
    text-align: left;
    margin: 20px 0;
    margin-bottom: 50px;
}

.product-grid {
   max-width: 1200px;
   margin: 0 auto;
   display: grid;
   grid-template-columns: repeat(3, 1fr);
   gap: 50px;
   margin-bottom: 80px;
   margin-top: 150px;
}

.product-item {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.8s ease;
}

.product-item.active {
    opacity: 1;
    transform: translateY(0);
}

.product-img img {
   width: 100%;
   height: 100%;
   object-fit: cover;
   transition: all 0.3s ease;
}

.product-img:hover img {
   transform: scale(1.1);
   opacity: 0.7;
}

.product-info {
    padding: 10px 0 30px;
}

.category {
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 16px;
    color: #33957D;
    margin-bottom: 5px;
}

.name {
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
    margin-bottom: 50px;
    margin-bottom: 80px;
    width: 1150px;
    margin-left: 350px;
}

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

.product-img {
   position: relative;
   width: 100%;
   height: 350px; 
   background: #ebf7ff;
   overflow: hidden;
}

.product-img::before {
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

.product-img::after {
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

.product-img:hover::before,
.product-img:hover::after {
   opacity: 1;
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

.product-img:hover .view-more {
   opacity: 1;
}

/* 타이틀 스타일 */
.shop-header {
    text-align: center;
    margin-bottom: 50px;
    margin-top: 80px;
}

.category-label {
    font-size: 16px;
    color: #757575;
    margin-bottom: 15px;
}

.category-title {
    font-size: 30px;
    color: #424242;
    font-weight: 500;
    margin-top: 0;
}
  </style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <div class="container">
   <div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>Shop</h2>
            <div class="sub_menu">
                <a href="/cosmetic/shop/skin.php">기초케어</a>
                <a href="/cosmetic/shop/hair.php" class="active">헤어케어</a>
                <a href="/cosmetic/shop/body.php">바디/핸드케어</a>
            </div>
        </div>
    </div>

    <!-- 타이틀 추가 -->
    <div class="shop-header">
        <div class="category-label">Hair Care</div>
        <h2 class="category-title">헤어케어</h2>
    </div>

    <div class="product-grid">
   <!-- 제품 1 -->
    <div class="product-item">
        <div class="product-img">
        <a href="/cosmetic/shop/view.php?id=1">
                <img src="../images/main/sec5_3.jpg" alt="드바즈 MnC 모이스춰 인헨싱 토너">
                <button class="view-more">View More</button>
            </a>
        </div>
        <div class="product-info">
            <div class="category">Hair Care</div>
            <div class="name">헤어제품명</div>
        </div>
    </div>

    <!-- 제품 2 -->
    <!-- <div class="product-item">
        <div class="product-img">

                <img src="../images/main/sec5_3.jpg" alt="드바즈 MnC 모이스춰 인헨싱 로션">
            </a>
        </div>
        <div class="product-info">
            <div class="category">Skin Care</div>
            <div class="name">드바즈 MnC 모이스춰 인헨싱 로션</div>
        </div>
    </div> -->

    <!-- 제품 3 -->
    <!-- <div class="product-item">
        <div class="product-img">

                <img src="../images/main/sec5_3.jpg" alt="드바즈 MnC 탄력 강화 크림">
            </a>
        </div>
        <div class="product-info">
            <div class="category">Skin Care</div>
            <div class="name">드바즈 MnC 탄력 강화 크림</div>
        </div>
    </div> -->

    <!-- 제품 4 -->
    <!-- <div class="product-item">
        <div class="product-img">

                <img src="../images/main/sec5_3.jpg" alt="드바즈 MnC 엔리치 세럼">
            </a>
        </div>
        <div class="product-info">
            <div class="category">Skin Care</div>
            <div class="name">드바즈 MnC 엔리치 세럼</div>
        </div>
    </div> -->
    </div>
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


   <?php include '../inc/footer.php'; ?>

   <script>
document.addEventListener('DOMContentLoaded', function() {
    const productItems = document.querySelectorAll('.product-item');
    
    function checkScroll() {
        productItems.forEach((item, index) => {
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
   </script>
</body>
</html>