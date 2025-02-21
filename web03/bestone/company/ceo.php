<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>회사소개</h2>
            <div class="sub_menu">
            <a href="/bestone/company/index.php">회사소개</a>
                <a href="/bestone/company/ceo.php" class="active">CEO 인사말</a>
                <a href="/bestone/company/history.php">회사연혁</a>
                <a href="/bestone/company/map.php">찾아오는 길</a>
            </div>
        </div>
    </div>

<!-- <div class="company-content">
</div> -->

<div class="container">
    <section class="ceo-section">
        <h2 class="ceo-title">CEO 인사말</h2>
        
        <div class="ceo-content">
            <div class="ceo-image-wrap">
                <img src="/bestone/images/main/3-1.jpg" alt="CEO 이미지" class="ceo-image">
            </div>
            
            <div class="ceo-text-content">
                <h3 class="ceo-greeting">안녕하세요. (주)베스트원테크 대표이사 송태엽입니다.</h3>
                <p class="ceo-desc">(주)베스트원테크는 지속가능한 생산과 소비를 지향하고 있습니다.</p>
                <p class="ceo-desc">저희는 화장품 제조를 주력으로 하고 있으며, 저희의 목표는 일상속 지속 가능한 소재와 소비로 더 나은 방향성을 제시하고자 합니다.</p>
                <p class="ceo-desc">우리는 고객님들과 함께 지속적으로 동반 성장할 수 있는 경험을 기대하고 있습니다.</p>
                <p class="ceo-desc">빠른 속도로 변하는 트렌드를 따라잡고 그에 알맞는 기술로 만드는 제품은 고객사와 소비자를 모두 만족할 수 있는 제품을 만들고자 합니다.</p>
                <div class="ceo-signature">
                    <span class="signature-title">대표이사</span>
                    <span class="signature-name">송 태 엽</span>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>

    <section class="greeting-section">
    <div class="greeting-container">
        <div class="greeting-image">
            <img src="/bestone/images/company/ceo1.jpg" alt="인사말 커버 이미지">
        </div>
        
        <div class="greeting-content">
            <div class="greeting-text-wrap">
                <div class="greeting-text">
                    <p class="intro-text">안녕하세요? (주)베스트원테크의 코스메틱 개발팀입니다.</p>
                    
                    <p class="desc-text">아름다움은 건강한 피부에서부터 나온다고 생각하고 있습니다. 누구나 사용할 수 있는 스킨케어를 목적을 갖고 있으며 이를 바탕으로 피부건강에 대한 신뢰를 얻고자 합니다.</p>
                    
                    <p class="desc-text">저희는 높은 품질과 안전성을 기반으로 제품을 개발하며, 혁신적인 기술과 천연 성분을 조화롭게 결합하여 피부에 꼭 필요한 영양을 제공하고자하며. 더불어, 환경에 대한 책임을 다하고 지속 가능한 생산과 소비를 통해 더 나은 미래를 꿈꾸고 있습니다.</p>
                    
                    <p class="desc-text">매일매일 더욱 높아지는 아름다움을 추구하며, 여러분의 특별한 순간에 동반할 수 있도록 앞으로도 최선을 다하겠습니다.</p>
                    
                    <p class="outro-text">감사합니다.</p>
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
    margin: 0 auto;
}

.company-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 160px 320px 140px;
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

.ceo-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 160px 320px;
    width: 100%;
}

.ceo-title {
    height: 47px;
    font-weight: 700;
    font-size: 39px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    margin-bottom: 80px;
}

.ceo-content {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: center;
    padding: 0 0 80px;
    width: 1304px;
    height: 636px;
}

.ceo-image-wrap {
    display: flex;
    padding: 0 48px;
    width: 652px;
    height: 556px;
}

.ceo-image {
    width: 556px;
    height: 556px;
    object-fit: cover;
}

.ceo-text-content {
    width: 652px;
    height: 408.95px;
    position: relative;
    padding: 0 48px;
}

.ceo-greeting {
    width: 289px;
    height: 105px;
    font-weight: 600;
    font-size: 26.25px;
    line-height: 35px;
    letter-spacing: -0.32px;
    color: #191919;
    margin-bottom: 24px;
}

.ceo-desc {
    font-weight: 400;
    font-size: 15px;
    line-height: 26px;
    letter-spacing: -0.32px;
    color: #191919;
    margin-bottom: 14px;
}

.ceo-desc {font-size: 13px;}

.ceo-signature {
    position: absolute;
    bottom: 0;
    left: 48px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.signature-title {
    font-weight: 400;
    font-size: 16px;
    line-height: 26px;
    letter-spacing: -0.32px;
    color: #191919;
}

.signature-name {
    font-weight: 700;
    font-size: 23.25px;
    line-height: 38px;
    letter-spacing: 0.72px;
    color: #191919;
}

.section-divider {
    width: 1280px;
    height: 1px;
    background: #DBDBDB;
    margin: 0 auto;
}

.greeting-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 320px 120px;
    height: 1081.93px;
    width: 100%;
    margin-bottom: 150px;
}

.greeting-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
    gap: 46.99px;
    width: 1280px;
    max-width: 1280px;
    height: 961.93px;
}

.greeting-image {
    width: 1280px;
    max-width: 1280px;
    height: 590.77px;
}

.greeting-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    margin-top: 150px;
}

.greeting-content {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: flex-start;
    padding: 0;
    width: 1304px;
    height: 324.17px;
    margin-top: 150px;
}

.greeting-text-wrap {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 0 24px;
    gap: 14.9px;
    width: 652px;
    max-width: 1304px;
    height: 324.17px;
}

.greeting-text {
    display: flex;
    flex-direction: column;
    width: 604px;
}

.intro-text {
    font-weight: 400;
    font-size: 14.875px;
    line-height: 29px;
    letter-spacing: -0.32px;
    color: #191919;
    margin-bottom: 14.9px;
}

.desc-text {
    font-weight: 400;
    font-size: 15px;
    line-height: 29px;
    letter-spacing: -0.32px;
    color: #191919;
    margin-bottom: 14.9px;
}

.outro-text {
    font-weight: 400;
    font-size: 15.125px;
    line-height: 29px;
    letter-spacing: -0.32px;
    color: #191919;
}

/* 기본 폰트 설정 - 최상위에 위치시키기 */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Pretendard", -apple-system, BlinkMacSystemFont, system-ui, Roboto, "Helvetica Neue", "Segoe UI", "Apple SD Gothic Neo", "Noto Sans KR", "Malgun Gothic", sans-serif !important;
}

/* 태블릿 반응형 */
@media screen and (max-width: 1024px) {

    .mobile-menu-btn {left:90%;}
    .header {
        height: 110px;
    }

    /* 서브 배너 */
    .sub_banner {
        height: 400px;
        background-size: cover;
    }

    .sub_banner h2 {
        font-size: 36px;
        font-weight: 700;
    }

    .sub_menu {
        height: 50px;
    }

    .sub_menu a {
        font-size: 14px;
        font-weight: 500;
    }

    /* CEO 섹션 */
    .ceo-section {
        padding: 80px 24px;
    }

    .ceo-title {
        font-size: 32px;
        margin-bottom: 60px;
        font-weight: 700;
    }

    .ceo-content {
        width: 80%;
        height: auto;
        flex-direction: column;
        padding: 0;
    }

    .ceo-image-wrap {
        width: 100%;
        height: auto;
        padding: 0;
        margin-bottom: 40px;
    }

    .ceo-image {
        width: 100%;
        height: auto;
        aspect-ratio: 1/1;
    }

    .ceo-text-content {
        width: 100%;
        height: auto;
        padding: 0;
    }

    .ceo-greeting {
        width: 100%;
        height: auto;
        font-size: 24px;
        font-weight: 600;
    }

    .ceo-desc {
        font-weight: 400;
        line-height: 1.6;
    }

    .ceo-signature {
        position: relative;
        left: 0;
        margin-top: 40px;
    }

    /* 구분선 */
    .section-divider {
        width: 100%;
        margin: 60px 0;
    }

    /* 인사말 섹션 */
    .greeting-section {
        padding: 0 24px 80px;
        height: auto;
        margin-bottom: 80px;
    }

    .greeting-container {
        width: 80%;
        height: auto;
        gap: 40px;
    }

    .ceo-desc:first-of-type {font-size:14px;}

    .greeting-image {
        width: 100%;
        height: auto;
    }

    .greeting-image img {
        margin-top: 80px;
    }

    .greeting-content {
        width: 100%;
        height: auto;
        margin-top: 60px;
    }

    .greeting-text-wrap {
        width: 100%;
        height: auto;
        padding: 0;
    }

    .greeting-text {
        width: 100%;
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

    /* CEO 섹션 */
    .ceo-section {
        padding: 60px 16px;
    }

    .ceo-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .ceo-greeting {
        font-size: 15px;
        line-height: 1.4;
        margin-bottom: 20px;
    }

    .ceo-desc {
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 12px;
    }

    .ceo-signature {
        margin-top: 30px;
    }

    .signature-title {
        font-size: 14px;
    }

    .signature-name {
        font-size: 20px;
        font-weight: 700;
    }

    /* 인사말 섹션 */
    .greeting-section {
        padding: 0 16px 60px;
    }

    .greeting-image img {
        margin-top: 60px;
    }

    .intro-text,
    .desc-text,
    .outro-text {
        font-size: 20px;
        line-height: 1.6;
        margin-bottom: 12px;
        font-weight: 400;
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
        font-weight: 600;
    }

    .inquiry-btn {
        width: 120px;
        height: 40px;
        padding: 10px 20px;
    }

    .btn-text {
        font-size: 14px;
        font-weight: 500;
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

    .ceo-greeting {
        font-size: 18px;
    }

    .ceo-desc {
        font-size: 13px;
    }

    .signature-name {
        font-size: 18px;
    }

    .intro-text,
    .desc-text,
    .outro-text {
        font-size: 13px;
    }

    .inquiry-text {
        font-size: 18px;
    }
}
</style>