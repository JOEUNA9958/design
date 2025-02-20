<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>회사소개</h2>
            <div class="sub_menu">
            <a href="/bestone/business/about.php">프로세스</a>
                <a href="/bestone/business/business.php" class="active">사업분야</a>
                <a href="/bestone/business/certification.php">인증</a>
            </div>
        </div>
    </div>


    <div class="business-wrapper">
        <div class="container">
            <section class="business-section">
                <h2 class="section-title">사업분야</h2>
                
                <div class="business-grid">
                    <!-- Card 1 -->
                    <div class="business-card">
                        <div class="card-image">
                            <img src="/bestone/images/business/1.jpg" alt="OEM / ODM">
                        </div>
                        <div class="number">01</div>
                        <div class="card-content">
                            <h3>OEM / ODM</h3>
                            <p>다○소, 미○ 등 대형 플랫폼에 OEM납품을 꾸준히 납품하고 있어, 다양한 커스터머의 니즈를 충족시킬 수 있습니다.</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="business-card">
                        <div class="card-image">
                            <img src="/bestone/images/business/1.jpg" alt="제품개발">
                        </div>
                        <div class="number">02</div>
                        <div class="card-content">
                            <h3>제품개발</h3>
                            <p>쉬운 사용과 가성비를 바탕으로 누구든 쉽고, 편하게 사용할 수 있는 제품을 개발합니다.</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="business-card">
                        <div class="card-image">
                            <img src="/bestone/images/business/1.jpg" alt="디자인 개발">
                        </div>
                        <div class="number">03</div>
                        <div class="card-content">
                            <h3>디자인 개발</h3>
                            <p>고객사의 의견을 반영한 트렌디하고 세련된 디자인을 개발합니다.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="products-section">
    <div class="container">
        <div class="products-container">
            <!-- Product 1 -->
            <div class="product-item">
                <div class="product-image">
                    <img src="/bestone/images/business/1.jpg" alt="스킨케어">
                </div>
                <div class="product-content">
                    <h3>스킨케어</h3>
                    <p>필링, 닥토 등 다양한 제품라인이 준비되어 있으며, 수십년의 노하우로 고객의 니즈를 만족시킵니다.</p>
                    <a href="#" class="more-button">
                        포트폴리오
                        <span class="arrow">→</span>
                    </a>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-item">
                <div class="product-image">
                    <img src="/bestone/images/business/1.jpg" alt="DIY 뷰티">
                </div>
                <div class="product-content">
                    <h3>DIY 뷰티</h3>
                    <p>DIY로 나만의 마스크팩, 필링패드를 만들어 압도적인 가성비로 고객의 니즈를 만족시킵니다.</p>
                    <a href="#" class="more-button">
                        포트폴리오
                        <span class="arrow">→</span>
                    </a>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-item">
                <div class="product-image">
                    <img src="/bestone/images/business/1.jpg" alt="배쓰밤">
                </div>
                <div class="product-content">
                    <h3>배쓰밤</h3>
                    <p>EWG 1~2등급 원료로 건강하고 안전한 원료를 사용하며, 피부에 부드럽게 퍼지는 향기로 고객의 니즈를 만족시킵니다.</p>
                    <a href="#" class="more-button">
                        포트폴리오
                        <span class="arrow">→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="inquiry-section">
    <div class="inquiry-container">
        <p class="inquiry-text">주문제작은 기획서를 포함하여<br> 문의주시면 더욱 상세한 답변이 가능합니다.</p>
        <a href="/bestone/faq/inquiry.php" class="inquiry-btn">
            <span class="btn-text">문의하기</span>
        </a>
    </div>
</section>
</div>

<?php
include '../inc/footer.php';
?>

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


/* 비즈니스 래퍼 */
.business-wrapper {
    padding: 100px 0;
    padding-top:  140px;
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* 첫 번째 섹션 */
.business-section {
    position: relative;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.section-title {
    text-align: center;
    font-size: 40px;
    font-weight: 700;
    margin-bottom: 80px;
    color: #191919;
}

.business-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.business-card {
    position: relative;
    background: #fff;
    border: 1px solid #DEE2E6;
    display: flex;
    flex-direction: column;
}

.number {
    position: absolute;
    font-weight: 900;
    font-size: 70px;
    line-height: 0.8;
    color: #393939;
    opacity: 0.1;
    left: -60%;
    right: 0;
    bottom: 25%;
    z-index: 1;
    text-align: center;
}

.card-image {
    width: 100%;
    height: 300px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-content {
    padding: 40px;
    background: transparent;
    position: relative;
    z-index: 2;
    min-height: 200px;
}

.card-content h3 {
    font-size: 22px;
    font-weight: 700;
    color: #191919;
    margin-bottom: 15px;
    margin-top: 30px;
}

.card-content p {
    font-size: 16px;
    line-height: 1.6;
    color: #393939;
}

.card-number {
    position: absolute;
    left: 40px;
    bottom: 40px;
    font-weight: 900;
    font-size: 90px;
    line-height: 76px;
    color: #9C9C9C;
    opacity: 0.25;
}

.card-title {
    font-weight: 700;
    font-size: 21.3125px;
    line-height: 26px;
    display: flex;
    align-items: center;
    letter-spacing: -0.44px;
    color: #191919;
    margin-bottom: 20px;
}

.card-desc {
    font-weight: 400;
    font-size: 15.9375px;
    line-height: 31px;
    display: flex;
    align-items: center;
    letter-spacing: -0.34px;
    color: #393939;
}

/* 두 번째 섹션 */
.products-section {
    padding: 100px 0;
    background: #F9F9FB;
}

.products-container {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.product-item {
    display: flex;
    gap: 40px;
    background: #fff;
}

.product-row {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    width: 1304px;
    height: 339.34px;
}

.product-image {
    width: 40%;
    height: 350px;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-content {
    width: 50%;
    padding: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}


.product-content h3 {
    font-size: 24px;
    font-weight: 700;
    color: #191919;
    margin-bottom: 20px;
}

.product-content p {
    font-size: 16px;
    line-height: 1.8;
    color: #797979;
    margin-bottom: 40px;
}

.content-wrapper {
    width: 736.66px;
    height: 148px;
    padding: 0 20px 0 64px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.content-wrapper h4 {
    font-weight: 700;
    font-size: 20.4531px;
    line-height: 29px;
    letter-spacing: -0.44px;
    color: #191919;
}

.content-wrapper p {
    font-weight: 500;
    font-size: 15.9375px;
    line-height: 31px;
    letter-spacing: -0.34px;
    color: #797979;
}

.more-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 15px;
    font-weight: 600;
    color: #191919;
    text-decoration: none;
}

.arrow {
    width: 24px;
    height: 24px;
    background: #3E78FF;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    transition: transform 0.3s ease; /* 변화를 부드럽게 */
}

/* 호버 효과 */
.more-button:hover .arrow {
    transform: scale(1.3); /* 30% 크기 증가 */
}

/* 화살표 텍스트도 같이 커지게 하려면 */
.arrow span {
    transition: transform 0.3s ease;
}

.more-button:hover .arrow span {
    transform: scale(1.3);
}

.button-text {
    font-weight: 600;
    font-size: 15px;
    line-height: 20px;
    letter-spacing: -0.32px;
    color: #191919;
}

.button-icon {
    width: 24px;
    height: 24px;
    background: #3E78FF;
    border-radius: 12px;
    position: relative;
    margin-left: 10px;
}

.icon-arrow {
    position: relative;
    width: 17.69px;
    height: 18px;
    display: block;
    background: #FFFFFF;
    transform: matrix(1, 0, 0, -1, 0, 0);
    margin: 3px auto;
}

@media (max-width: 1320px) {
    .container {
        padding: 120px 20px;
    }
    
    .business-grid {
        width: 100%;
        gap: 20px;
    }
    
    .business-card {
        width: calc(100% - 32px);
        max-width: 434.66px;
    }
    
    .products-container {
        padding: 0 20px;
    }
    
    .product-row {
        width: 100%;
    }
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

    /* 비즈니스 섹션 */
    .business-wrapper {
        padding: 80px 0;
        padding-top: 100px;
    }

    .section-title {
        font-size: 32px;
        margin-bottom: 60px;
    }

    /* 비즈니스 카드 */
    .business-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 0 20px;
    }

    .card-content {
        padding: 30px;
        min-height: 180px;
    }

    .card-content h3 {
        font-size: 20px;
        margin-top: 20px;
    }

    /* 제품 섹션 */
    .products-section {
        padding: 60px 0;
    }

    .products-container {
        gap: 30px;
        padding: 0 20px;
    }

    .product-item {
        gap: 30px;
    }

    .product-content {
        padding: 40px;
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

    /* 비즈니스 섹션 */
    .business-wrapper {
        padding: 60px 0;
        padding-top: 80px;
    }

    .section-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    /* 비즈니스 카드 */
    .business-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        padding: 0 16px;
    }

    .card-image {
        height: 250px;
    }

    .card-content {
        padding: 24px;
        min-height: auto;
    }

    .card-content h3 {
        font-size: 18px;
        margin-top: 15px;
        margin-bottom: 10px;
    }

    .card-content p {
        font-size: 14px;
    }

    .number {
        font-size: 50px;
        left: auto;
        right: 20px;
        bottom: 20px;
    }

    /* 제품 섹션 */
    .products-section {
        padding: 40px 0;
    }

    .products-container {
        gap: 20px;
        padding: 0 16px;
    }

    .product-item {
        flex-direction: column;
        gap: 0;
    }

    .product-image {
        width: 100%;
        height: 250px;
    }

    .product-content {
        width: 100%;
        padding: 24px;
    }

    .product-content h3 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .product-content p {
        font-size: 14px;
        margin-bottom: 20px;
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

    .section-title {
        font-size: 24px;
    }

    .card-image {
        height: 200px;
    }

    .card-content h3 {
        font-size: 16px;
    }

    .card-content p {
        font-size: 13px;
        line-height: 1.5;
    }

    .product-image {
        height: 200px;
    }

    .product-content h3 {
        font-size: 18px;
    }

    .product-content p {
        font-size: 13px;
    }

    .inquiry-text {
        font-size: 18px;
    }
}
</style>