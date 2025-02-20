<?php
include '../inc/header.php';
?>
<body class="sub-page">
<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>회사소개</h2>
            <div class="sub_menu">
            <a href="/bestone/company/index.php" class="active">회사소개</a>
                <a href="/bestone/company/ceo.php">CEO 인사말</a>
                <a href="/bestone/company/history.php">회사연혁</a>
                <a href="/bestone/company/map.php">찾아오는 길</a>
            </div>
        </div>
    </div>

<div class="company-content">
    <h2 class="company-main-title">회사소개</h2>
    
    <div class="company-info-wrap">
        <div class="company-info-left">
            <img src="/bestone/images/company/index1.jpg" alt="회사소개 이미지">
        </div>
        <div class="company-info-right">
            <span class="company-tag">About us</span>
            <h3 class="company-subtitle">차별화된 제품 개발은 (주)베스트원테크 에서<br>고객의 니즈에 맞는 다양한 솔루션을 제안합니다.</h3>
            <p class="company-desc">수십년의 노하우를 녹여낸 기술력을 바탕으로<br> 고객사와 고객의 니즈를 동시에 만족시키겠습니다.</p>
            
            <div class="company-details">
                <dl class="company-detail-item">
                    <dt>회사명</dt>
                    <dd>(주)베스트원테크</dd>
                </dl>
                <div class="divider-line"></div>
                <dl class="company-detail-item">
                    <dt>소재지</dt>
                    <dd>경기도 화성시 세자로 396번길 40</dd>
                </dl>
                <div class="divider-line"></div>
                <dl class="company-detail-item">
                    <dt>대표이사</dt>
                    <dd>송태엽</dd>
                </dl>
                <div class="divider-line"></div>
                <dl class="company-detail-item">
                    <dt>주요사업</dt>
                    <dd>화장품</dd>
                </dl>
                <div class="divider-line"></div>
                <dl class="company-detail-item">
                    <dt>설립일</dt>
                    <dd>2005년 12월 01일</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<section class="core-value-section">
    <div class="core-container">
        <div class="core-header">
            <div class="core-title-wrap">
                <h5 class="core-tag">Core Value</h5>
            </div>
            <div class="core-subtitle-wrap">
                <h3 class="core-subtitle">(주)베스트원테크는 고객사에게<br> 2가지를 약속드립니다.</h3>
            </div>
        </div>
        
        <div class="core-content">
            <div class="core-item">
                <figure class="core-figure">
                    <div class="core-image">
                        <img src="/bestone/images/company/index2.jpg" alt="우수한 제품력">
                    </div>
                    <figcaption class="core-caption">
                        <div class="caption-content">
                            <div class="caption-tag-wrap">
                                <h5 class="caption-tag">Quality</h5>
                            </div>
                            <div class="caption-text-wrap">
                                <h4 class="caption-title">우수한 제품력</h4>
                                <div class="caption-desc">
                                    <p>수십년의 노하우를 녹여낸 기술력을 바탕으로 높은 퀄리티를 약속드립니다.</p>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            
            <div class="core-item">
                <figure class="core-figure">
                    <div class="core-image">
                        <img src="/bestone/images/company/index3.jpg" alt="고객니즈">
                    </div>
                    <figcaption class="core-caption">
                        <div class="caption-content">
                            <div class="caption-tag-wrap">
                                <h5 class="caption-tag">Needs</h5>
                            </div>
                            <div class="caption-text-wrap">
                                <h4 class="caption-title">고객니즈</h4>
                                <div class="caption-desc">
                                    <p>(주)베스트원테크는 원스톱 솔루션을 통하여 바이어와 소비자의 니즈에 맞는 OEM/ODM 을 제공합니다.</p>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </figure>
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
</body>

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

/* 컨테이너 */
.container {
    width: 1280px;
    margin: 0 auto;
    padding: 100px 0;
}

.company-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 160px 320px 140px;
}

.company-main-title {
    font-weight: 700;
    font-size: 39px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    margin-bottom: 80px;
}

.company-info-wrap {
    display: flex;
    gap: 48px;
    width: 1280px;
}

.company-info-left {
    width: 556px;
    height: 556px;
}

.company-info-left img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.company-info-right {
    padding: 0 48px;
    width: 652px;
}

.company-tag {
    font-weight: 700;
    font-size: 18.59px;
    line-height: 24px;
    letter-spacing: 0.4px;
    color: #3E78FF;
    display: block;
    margin-bottom: 20px;
}

.company-subtitle {
    font-weight: 700;
    font-size: 26.47px;
    line-height: 38px;
    letter-spacing: -0.56px;
    color: #191919;
    margin-bottom: 30px;
}

.company-desc {
    font-weight: 400;
    font-size: 15.94px;
    line-height: 27px;
    letter-spacing: -0.34px;
    color: #393939;
    margin-bottom: 60px;
}

.company-details {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.company-detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px 18px;
}

.company-detail-item dt {
    font-weight: 600;
    font-size: 16.73px;
    line-height: 27px;
    letter-spacing: -0.36px;
    color: #797979;
}

.company-detail-item dd {
    font-weight: 600;
    font-size: 16.87px;
    line-height: 27px;
    text-align: right;
    letter-spacing: -0.36px;
    color: #191919;
}

/* 추가된 구분선 스타일 */
.divider-line {
    width: 100%;
    height: 1px;
    background-color: #EEEEEE;
}

.core-value-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 320px 120px;
    height: 779.21px;
    left: 0;
    right: 0;
    top: 1502.19px;
}

.core-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
    gap: 0;
    width: 1280px;
    max-width: 1280px;
    height: 659.21px;
}

.core-header {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0 0 75px;
    gap: 18.8px;
    width: 1280px;
    height: 217.79px;
}

.core-title-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 587.66px 0 587.64px;
    width: 1280px;
    height: 44px;
}

.core-tag {
    width: 104.7px;
    height: 44px;
    font-weight: 800;
    font-size: 18.4375px;
    line-height: 22px;
    display: flex;
    align-items: center;
    text-align: center;
    color: #3E78FF;
}

.core-subtitle-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 461.12px;
    width: 1280px;
    height: 80px;
}

.core-subtitle {
    width: 357.77px;
    height: 80px;
    font-weight: 700;
    font-size: 27.8906px;
    line-height: 40px;
    display: flex;
    align-items: center;
    text-align: center;
    letter-spacing: -0.6px;
    color: #191919;
}

.core-content {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 1304px;
    height: 441.41px;
    margin-top: 50px;
}

.core-item {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0 12px;
    width: 652px;
    max-width: 1304px;
    height: 441.41px;
    flex-grow: 1;
}

.core-figure {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0;
    width: 628px;
    height: 441.41px;
}

.core-image {
    width: 628px;
    max-width: 628px;
    height: 327.5px;
    margin: -40px 0;
}

.core-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.core-caption {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 32px 12px;
    width: 628px;
    height: 153.91px;
    background: #FFFFFF;
}

.caption-content {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: flex-start;
    padding: 0;
    row-gap: 0;
    width: 604px;
    height: 89.91px;
}

.caption-tag-wrap {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0 12px;
    width: 80px;
    max-width: 524px;
    height: 89.91px;
}

.caption-tag {
    font-weight: 700;
    font-size: 12.4688px;
    line-height: 17px;
    display: flex;
    align-items: center;
    color: #3E78FF;
}

.caption-text-wrap {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0 12px;
    gap: 12.98px;
    width: 524px;
    max-width: 524px;
    height: 89.91px;
}

.caption-title {
    font-weight: 600;
    font-size: 18.75px;
    line-height: 26px;
    display: flex;
    align-items: center;
    letter-spacing: -0.4px;
    color: #191919;
}

.caption-desc {
    font-weight: 400;
    font-size: 15px;
    line-height: 25px;
    display: flex;
    align-items: center;
    letter-spacing: -0.32px;
    color: #393939;
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

    .mobile-menu-btn {left: 90% !important;}
    .core-image img {
        width: 150%;
        height: 120%;
        object-fit: cover;
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

    /* 컨텐츠 영역 */
    .company-content {
        padding: 80px 24px;
    }

    .company-main-title {
        font-size: 32px;
        margin-bottom: 60px;
    }

    .company-info-wrap {
        width: 100%;
        flex-direction: column;
        gap: 32px;
    }

    .company-info-left {
        width: 100%;
        height: auto;
        aspect-ratio: 1/1;
    }

    .company-info-right {
        width: 100%;
        padding: 0;
    }

    /* Core Value 섹션 */
    .core-value-section {
        padding: 0 24px 80px;
        height: auto;
    }

    .core-container {
        width: 100%;
        height: auto;
    }

    .core-header {
        width: 100%;
        height: auto;
        padding-bottom: 40px;
    }

    .core-title-wrap, .core-subtitle-wrap {
        width: 100%;
        padding: 0;
        align-items: center;
    }

    .core-content {
        width: 100%;
        height: auto;
        gap: 32px;
    }

    .core-item {
        width: 100%;
        padding: 0;
        height: auto;
    }

    .core-figure {
        width: 100%;
        height: auto;
    }

    .core-image {
        width: 100%;
        height: auto;
        margin: 0;
        aspect-ratio: 16/9;
    }

    .core-caption {
        width: 100%;
        height: auto;
    }

    .caption-content {
        width: 100%;
        height: auto;
    }

    .caption-text-wrap {
        width: 100%;
        height: auto;
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
        padding: 0 5px;
    }

    /* 컨텐츠 */
    .company-content {
        padding: 60px 16px;
    }

    .company-main-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .company-tag {
        font-size: 16px;
        margin-bottom: 16px;
    }

    .company-subtitle {
        font-size: 22px;
        line-height: 1.4;
        margin-bottom: 20px;
    }

    .company-desc {
        font-size: 14px;
        margin-bottom: 40px;
    }

    .company-detail-item {
        padding: 12px 16px;
    }

    .company-detail-item dt,
    .company-detail-item dd {
        font-size: 14px;
    }

    /* Core Value 섹션 */
    .core-tag {
        font-size: 16px;
    }

    .core-subtitle {
        font-size: 22px;
        line-height: 1.4;
        width: 100%;
        text-align: center;
    }

    .caption-title {
        font-size: 16px;
    }

    .caption-desc {
        font-size: 14px;
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
        width: 120px;
        height: 40px;
        padding: 10px 20px;
    }

    .btn-text {
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

    .company-subtitle {
        font-size: 20px;
    }

    .company-desc {
        font-size: 13px;
    }

    .company-detail-item dt,
    .company-detail-item dd {
        font-size: 13px;
    }

    .core-subtitle {
        font-size: 20px;
    }

    .inquiry-text {
        font-size: 18px;
    }
}
</style>