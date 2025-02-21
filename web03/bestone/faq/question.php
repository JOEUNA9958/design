<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>FAQ</h2>
            <div class="sub_menu">
            <a href="/bestone/faq/question.php" class="active">자주묻는 질문</a>
                <a href="/bestone/faq/inquiry.php">1:1 문의하기</a>
            </div>
        </div>
    </div>

<div class="faq-section">
    <h2 class="section-title">자주 묻는 질문</h2>
    
    <div class="faq-container">
        <!-- FAQ 아이템 1 -->
        <div class="faq-item">
            <button class="faq-button">
                <span class="question">OEM 가능할까요?</span>
                <span class="icon"></span>
            </button>
            <div class="faq-content">
                <p>네, 가능합니다.</p>
                <p>원하시는 제품의 용량, 제형, 형태 등 정보가 많을 수록 정확한 단가계산을 할 수 있습니다.</p>
                <p>참고할만한 제품의 링크 혹은 사진을 주시는 것도 좋습니다.</p>
                <p>EX)필링패드, 70매, 200ml, 원터치 용기</p>
                <p>https://smartstore.naver.com/coacos/products/4926839928</p>
            </div>
        </div>

        <!-- FAQ 아이템 2 -->
        <div class="faq-item">
            <button class="faq-button">
                <span class="question">포장 및 디자인까지 전부 맡길 수 있나요?</span>
                <span class="icon"></span>
            </button>
            <div class="faq-content">
                <p>네, 가능합니다. 패키지 디자인부터 제품 제작까지 올인원 서비스를 제공해드립니다.</p>
            </div>
        </div>

        <!-- 추가 FAQ 아이템들... -->
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
.faq-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 80px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 80px;
    padding-bottom: 150px;
}

.section-title {
    font-weight: 700;
    font-size: 39.70px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 100px;
}

.faq-container {
    width: 100%;
}

.faq-item {
    border-top: 1px solid #E5E5E5;
    background: #FFFFFF;
    border-radius: 5px 5px 0 0;
}

.faq-button {
    width: 100%;
    padding: 29px 28px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: none;
    background: none;
    cursor: pointer;
    text-align: left;
}

.question {
    font-weight: 600;
    font-size: 20.80px;
    line-height: 33px;
    letter-spacing: -0.44px;
    color: #191919;
}

.icon {
    position: relative;
    width: 20px;
    height: 20px;
}

.icon::before,
.icon::after {
    content: '';
    position: absolute;
    background: #191919;
}

.icon::before {
    width: 20px;
    height: 1px;
    top: 50%;
    transform: translateY(-50%);
}

.icon::after {
    width: 1px;
    height: 20px;
    left: 50%;
    transform: translateX(-50%);
    transition: transform 0.3s ease;
}

.faq-item.active .icon::after {
    transform: translateX(-50%) rotate(90deg);
}

.faq-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    padding: 0 28px;
}

.faq-content p {
    margin: 0;
    padding: 5px 0;
    font-size: 16px;
    line-height: 1.6;
    color: #393939;
}

.faq-item.active .faq-content {
    max-height: 500px;
    padding-bottom: 28px;
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
@media screen and (max-width: 1280px) {
    .faq-section {
        width: 100%;
        padding: 80px 24px 100px;
    }
    
    .section-title {
        font-size: 34px;
        margin-top: 60px;
    }
}

/* 작은 태블릿 반응형 */
@media screen and (max-width: 1024px) {
    /* 서브 배너 */
    .sub_banner {
        height: 400px;
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

    /* FAQ 섹션 */
    .section-title {
        font-size: 32px;
        margin-top: 40px;
        line-height: 1.3;
    }

    .faq-button {
        padding: 24px;
    }

    .question {
        font-size: 18px;
        line-height: 1.5;
        padding-right: 20px; /* 아이콘과의 간격 */
    }

    .faq-content {
        padding: 0 24px;
    }

    .faq-content p {
        font-size: 15px;
    }
}

/* 모바일 반응형 */
@media screen and (max-width: 768px) {
    .faq-section {
        padding: 60px 16px 80px;
        gap: 40px;
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
    }

    /* FAQ 섹션 */
    .section-title {
        font-size: 28px;
        margin-top: 30px;
    }

    .faq-button {
        padding: 20px 16px;
        min-height: 64px; /* 터치 영역 확보 */
    }

    .question {
        font-size: 16px;
        line-height: 1.4;
        padding-right: 16px;
    }

    .icon {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    .icon::before {
        width: 16px;
    }

    .icon::after {
        height: 16px;
    }

    .faq-content {
        padding: 0 16px;
    }

    .faq-content p {
        font-size: 14px;
        line-height: 1.5;
        padding: 4px 0;
    }

    .faq-item.active .faq-content {
        padding-bottom: 20px;
    }

    /* 문의하기 섹션 */
    .inquiry-section {
        height: auto;
    }

    .inquiry-container {
        padding: 40px 20px;
    }

    .inquiry-text {
        font-size: 20px;
        line-height: 1.4;
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
    .faq-section {
        padding: 40px 12px 60px;
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

    /* FAQ 섹션 */
    .section-title {
        font-size: 24px;
        margin-top: 20px;
    }

    .faq-button {
        padding: 16px 12px;
    }

    .question {
        font-size: 15px;
        padding-right: 12px;
    }

    .icon {
        width: 14px;
        height: 14px;
    }

    .icon::before {
        width: 14px;
    }

    .icon::after {
        height: 14px;
    }

    .faq-content {
        padding: 0 12px;
    }

    .faq-content p {
        font-size: 13px;
        line-height: 1.4;
    }

    .faq-item.active .faq-content {
        padding-bottom: 16px;
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
    .sub_banner {
        height: 250px;
    }

    .faq-section {
        padding-top: 40px;
    }

    .section-title {
        margin-top: 20px;
    }

    /* FAQ 컨텐츠 최적화 */
    .faq-button {
        padding: 16px;
    }

    .faq-content {
        padding: 0 16px;
    }

    .faq-item.active .faq-content {
        max-height: 300px; /* 가로 모드에서 스크롤 방지 */
        overflow-y: auto;
    }
}
</style>

<script>
document.querySelectorAll('.faq-button').forEach(button => {
    button.addEventListener('click', () => {
        const faqItem = button.parentElement;
        const wasActive = faqItem.classList.contains('active');
        
        // 모든 FAQ 아이템 닫기
        document.querySelectorAll('.faq-item').forEach(item => {
            item.classList.remove('active');
        });
        
        // 클릭한 아이템이 닫혀있었다면 열기
        if (!wasActive) {
            faqItem.classList.add('active');
        }
    });
});
</script>

<?php include '../inc/footer.php'; ?>