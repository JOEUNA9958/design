<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>회사소개</h2>
            <div class="sub_menu">
            <a href="/bestone/company/index.php">회사소개</a>
                <a href="/bestone/company/ceo.php">CEO 인사말</a>
                <a href="/bestone/company/history.php" class="active">회사연혁</a>
                <a href="/bestone/company/map.php">찾아오는 길</a>
            </div>
        </div>
    </div>

<div class="container">
    <!-- 첫번째 섹션 -->
    <section class="history-section">
        <div class="history-container">
            <h2 class="history-title">History</h2>
        </div>
        
        <div class="history-bg">
            <div class="history-intro">
                <h3 class="intro-title">(주)베스트원테크 발자취</h3>
                <p class="intro-desc">(주)베스트원테크는 설립일로부터 지금까지, 고객사 여러분들과 함께 성장하고 있으며<br> 언제나 창의적인 시선과 도전으로 새로운 역사를 쓰고자 합니다.</p>
            </div>
        </div>
    </section>

    <!-- 두번째 섹션 - 연혁 리스트 -->
    <section class="history-list-section">
        <div class="history-timeline">
            <div class="year-block">
                <div class="year-row">
                    <h3 class="year">2025</h3>
                    <div class="history-items">
                        <div class="history-item">
                            <span class="month">01</span>
                            <p class="content">스프레이 관련 특허획득</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="year-block">
                <div class="year-row">
                    <h3 class="year">2024</h3>
                    <div class="history-items">
                        <div class="history-item">
                            <span class="month">11</span>
                            <p class="content">홍콩 코스모프로프 전시회 참가</p>
                        </div>
                        <div class="history-item">
                            <span class="month">10</span>
                            <p class="content">ISO 22716 취득</p>
                        </div>
                        <div class="history-item">
                            <span class="month">06</span>
                            <p class="content">쿠팡 뷰티어워드 우수브랜드 수상</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 나머지 연도 블록들도 같은 구조로 반복 -->
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

/* 연혁 섹션 스타일 */
.history-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 150px 0;
}

.history-container {
    width: 1280px;
    text-align: center;
}

.history-title {
    font-weight: 700;
    font-size: 38.8828px;
    line-height: 46px;
    letter-spacing: -0.84px;
    color: #191919;
    margin-bottom: 80px;
}

.history-bg {
    width: 100%;
    padding: 140px 0 84px;
    background-image: url('/bestone/images/company/history_bg.jpg');
    background-size: cover;
    background-position: center;
}

.history-intro {
    width: 1280px;
    margin: 0 auto;
}

.intro-title {
    font-weight: 600;
    font-size: 30px;
    line-height: 42px;
    letter-spacing: -0.72px;
    color: #FFFFFF;
    margin-bottom: 19.44px;
}

.intro-desc {
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    letter-spacing: -0.36px;
    color: rgba(255, 255, 255, 0.8);
}

/* 연혁 리스트 섹션 스타일 */
.history-list-section {
    padding: 48px 0;
    width: 1280px;
    margin: 0 auto;
}

.year-block {
    margin-bottom: 48px;
    border-bottom: 1px solid #E9E9E9;
    padding: 0 20px 48px;
}

.year-row {
    display: flex;
    align-items: flex-start;
}

.year {
    width: 182.66px;
    font-weight: 700;
    font-size: 32px;
    line-height: 38px;
    letter-spacing: 0.64px;
    color: #191919;
}

.history-items {
    flex: 1;
}

.history-item {
    display: flex;
    align-items: center;
    margin-bottom: 9.1px;
}

.month {
    width: 23px;
    text-align: left;
    font-weight: 700;
    font-size: 18px;
    line-height: 28px;
    color: #797979;
    margin-right: 36.39px;
}

.content {
    font-weight: 500;
    font-size: 16.875px;
    line-height: 28px;
    letter-spacing: -0.36px;
    color: #393939;
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

    /* 연혁 섹션 */
    .history-section {
        padding: 80px 24px;
    }

    .history-container {
        width: 100%;
    }

    .history-title {
        font-size: 32px;
        margin-bottom: 60px;
    }

    .history-bg {
        padding: 80px 24px;
    }

    .history-intro {
        width: 100%;
    }

    .intro-title {
        font-size: 26px;
        margin-bottom: 15px;
    }

    .intro-desc {
        font-size: 15px;
        br {
            display: none;
        }
    }

    /* 연혁 리스트 */
    .history-list-section {
        width: 100%;
        padding: 40px 24px;
    }

    .year-block {
        padding: 0 0 40px;
        margin-bottom: 40px;
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

    /* 연혁 섹션 */
    .history-section {
        padding: 60px 16px;
    }

    .history-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .history-bg {
        padding: 60px 16px;
    }

    .intro-title {
        font-size: 22px;
        line-height: 1.4;
    }

    .intro-desc {
        font-size: 14px;
        line-height: 1.6;
    }

    /* 연혁 리스트 */
    .history-list-section {
        padding: 30px 16px;
    }

    .year {
        width: 100px;
        font-size: 28px;
    }

    .month {
        width: 20px;
        font-size: 16px;
        margin-right: 20px;
    }

    .content {
        font-size: 15px;
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

    .intro-title {
        font-size: 20px;
    }

    .intro-desc {
        font-size: 13px;
    }

    .year {
        font-size: 24px;
    }

    .month {
        font-size: 14px;
        margin-right: 15px;
    }

    .content {
        font-size: 13px;
    }

    .inquiry-text {
        font-size: 18px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 필요한 스크립트 추가
});
</script>