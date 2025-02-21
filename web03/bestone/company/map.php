<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>회사소개</h2>
            <div class="sub_menu">
            <a href="/bestone/company/index.php">회사소개</a>
                <a href="/bestone/company/ceo.php">CEO 인사말</a>
                <a href="/bestone/company/history.php">회사연혁</a>
                <a href="/bestone/company/map.php" class="active">찾아오는 길</a>
            </div>
        </div>
    </div>


<div class="container">
    <section class="location-section">
        <h2 class="location-title">오시는 길</h2>
        
        <!-- 지도 영역 -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.563808799891!2d127.12345!3d37.12345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA3JzM0LjQiTiAxMjfCsDA3JzM0LjQiRQ!5e0!3m2!1sko!2skr!4v1620000000000!5m2!1sko!2skr" 
                width="1280" 
                height="720" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        
        <!-- 주소 정보 영역 -->
        <div class="info-container">
            <div class="info-box">
                <div class="info-row">
                    <dt>주소</dt>
                    <dd>경기도 화성시 세자로 396번길 40</dd>
                </div>
                <div class="info-row">
                    <dt>대표전화</dt>
                    <dd>031-293-8330</dd>
                </div>
                <div class="info-row">
                    <dt>팩스</dt>
                    <dd>031-293-8331</dd>
                </div>
            </div>
        </div>
    </section>

</div>

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
    width: 1280px;
    margin: 0 auto;
    padding: 150px 0;
}

/* 위치 섹션 스타일 */
.location-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.location-title {
    width: 151px;
    height: 47px;
    font-weight: 700;
    font-size: 39.5391px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    margin-bottom: 80px;
}

.map-container {
    width: 1280px;
    height: 720px;
    margin-bottom: 48px;
}

.map-area {
    width: 100%;
    height: 100%;
    background: #E5E3DF;
}

.info-container {
    width: 1280px;
    display: flex;
    justify-content: flex-start;
    padding: 0 52px;
}

.info-box {
    width: 392px;
}

.info-row {
    display: flex;
    margin-bottom: 10px;
}

.info-row dt {
    width: 80px;
    font-weight: 600;
    font-size: 14.875px;
    line-height: 19px;
    color: #191919;
    padding: 0 12px;
}

.info-row dd {
    width: 240px;
    font-weight: 400;
    font-size: 15.125px;
    line-height: 29px;
    color: #797979;
    padding: 0 12px;
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

    /* 컨테이너 */
    .container {
        width: 100%;
        padding: 80px 24px;
    }

    /* 위치 섹션 */
    .location-title {
        font-size: 32px;
        margin-bottom: 60px;
    }

    .map-container {
        width: 100%;
        height: 500px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
    }

    .info-container {
        width: 100%;
        padding: 0;
    }

    .info-box {
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

    /* 컨테이너 */
    .container {
        padding: 60px 16px;
    }

    /* 위치 섹션 */
    .location-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .map-container {
        height: 400px;
        margin-bottom: 32px;
    }

    .info-row {
        margin-bottom: 8px;
    }

    .info-row dt {
        width: 70px;
        font-size: 14px;
        padding: 0 8px;
    }

    .info-row dd {
        width: calc(100% - 70px);
        font-size: 14px;
        padding: 0 8px;
        line-height: 1.6;
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

    .map-container {
        height: 300px;
    }

    .info-row dt {
        width: 60px;
        font-size: 13px;
    }

    .info-row dd {
        width: calc(100% - 60px);
        font-size: 13px;
    }

    .inquiry-text {
        font-size: 18px;
    }
}
</style>