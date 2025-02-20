<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>회사소개</h2>
            <div class="sub_menu">
            <a href="/bestone/business/about.php" class="active">프로세스</a>
                <a href="/bestone/business/business.php">사업분야</a>
                <a href="/bestone/business/certification.php">인증</a>
            </div>
        </div>
    </div>


<div class="business-section">
    <h2 class="section-title">사업소개</h2>
    <div class="business-banner">
        <img src="/bestone/images/company/ceo1.jpg" alt="Business Background">
        <div class="banner-text">
            <p>수십년의 노하우로 안정성이 높고<br>이를 바탕으로 고객사 여러분들께 가장 적합한<br>솔루션을 제공하고자 합니다.</p>
        </div>
    </div>
    <div class="feature-grid">
        <!-- Feature 1 -->
            <div class="feature-item">
            <div class="feature-header">
                <h3 class="feature-title">경험에서 나오는 노하우</h3>
                <div class="feature-icon">
                    <div class="icon-circle">
                        <img src="/bestone/images/company/icon.png" alt="경험에서 나오는 노하우">
                    </div>
                </div>
            </div>
            <p class="feature-desc">미샤, 다이소 등 대형 플랫폼의 대량거래로부터 얻은 노하우를 바탕으로 고객사와 고객의 니즈를 동시에 충족 시킬 수 있습니다.</p>
        </div>

        <!-- Feature 2 -->
        <div class="feature-item">
        <div class="feature-header">
            <h3 class="feature-title">트렌디한 디자인</h3>
            <div class="feature-icon">
                <div class="icon-circle">
                    <img src="/bestone/images/company/icon.png" alt="트렌디한 디자인">
                </div>
            </div>
        </div>
        <p class="feature-desc">트렌디한 디자인을 다량 보유하고 있으며, 고객사의 다양한 베리에이션을 충족할 수 있는 기술로 만족을 약속드립니다.</p>
    </div>

    <!-- Feature 3 -->
    <div class="feature-item">
        <div class="feature-header">
            <h3 class="feature-title">실용성 및 쉬운 사용성</h3>
            <div class="feature-icon">
                <div class="icon-circle">
                    <img src="/bestone/images/company/icon.png" alt="실용성 및 쉬운 사용성">
                </div>
            </div>
        </div>
        <p class="feature-desc">쉽고 간편한 사용성으로 접근성이 높으며, 실용적인 사용성으로 구매자의 만족을 선사합니다.</p>
    </div>

    <section class="business-process">
        <div class="process-header">
            <h5 class="sub-title">Our Process</h5>
            <h3 class="main-title">OEM / ODM 프로세스</h3>
        </div>
        
        <div class="process-steps">
            <!-- Step 1 -->
            <div class="step-row">
                <div class="step-image">
                    <img src="/bestone/images/company/index3.jpg" alt="상담 요청 및 계약">
                </div>
                <div class="step-content">
                    <div class="step-number">01</div>
                    <h4>상담 요청 및 계약</h4>
                    <p>전화, 메일, 제작문의 등을 통하여 원하시는 제품사양을 협의하여 계약을 진행합니다.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step-row">
                <div class="step-content">
                    <div class="step-number">02</div>
                    <h4>디자인 확정 및 견본 확정</h4>
                    <p>제품 컨셉 및 디자인을 확정, 견본품을 제작하며, 제품에 이상없는지 검수합니다.</p>
                </div>
                <div class="step-image">
                    <img src="/bestone/images/company/index3.jpg" alt="디자인 확정 및 견본 확정">
                </div>
            </div>

            <!-- Step 3 -->
            <div class="step-row">
                <div class="step-image">
                    <img src="/bestone/images/company/index3.jpg" alt="제품 생산">
                </div>
                <div class="step-content">
                    <div class="step-number">03</div>
                    <h4>제품 생산</h4>
                    <p>본격적인 제품생산에 들어가며 납품준비를 합니다.</p>
                </div>
            </div>

            <div class="step-row">
                <div class="step-content">
                    <div class="step-number">04</div>
                    <h4>납품</h4>
                    <p>협의한 납품일에 맞춰 납기합니다.</p>
                </div>
                <div class="step-image">
                    <img src="/bestone/images/company/index3.jpg" alt="납품">
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

/* 새로운 스타일 추가 */

.business-section {
    padding-top: 150px;
    margin: 0 auto;
    width: 100%;
}

.section-title {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 50px;
}

.business-banner {
    position: relative;
    width: 100vw;
    height: 400px;
    margin-bottom: 80px;
    overflow: hidden;
}

.business-banner img {
    width: 80%;
    height: 100%;
    object-fit: cover;
    margin-left: 10%;
}

.banner-text {
    position: absolute;
    right: 10%;
    bottom: 0;
    background: rgba(62, 120, 255, 0.9);
    padding: 40px;
    max-width: 400px;
}

.banner-text p {
    color: #fff;
    font-size: 18px;
    line-height: 1.6;
    margin: 0;
}

.feature-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    justify-content: center;
    max-width: 1304px;
    margin: 0 auto;
    padding: 0 20px;
}

.feature-item {
    flex: 1;
    min-width: 380px;
    max-width: 410.67px;
    padding: 33px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    border: 1px solid #DEE2E6;
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.feature-icon {
    margin-bottom: 20px;
}

.icon-circle {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}


.icon-circle img {
    width: 24px;
    height: 24px;
    object-fit: contain;
}

.feature-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.feature-item h3 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
}

.feature-item p {
    font-size: 15px;
    line-height: 1.6;
    color: #666;
}

@media (max-width: 1024px) {
    .feature-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .feature-grid {
        grid-template-columns: 1fr;
    }
    
    .banner-text {
        max-width: 100%;
        position: relative;
        padding: 20px;
    }
    
    .business-banner {
        height: auto;
    }
}
.business-intro {
    position: relative;
    height: 1100.78px;
}

.content-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 120px 20px;
    gap: 80px;
    margin-top: 400px;  /* 배경 이미지 높이만큼 마진 추가 */
}

.business-intro .background-image {
    position: absolute;
    height: 400px;
    left: 0;
    right: 0;
    top: 0;
    background-image: url('/bestone/images/company/ceo1.jpg');
    z-index: -5;
    background-size: cover;
    background-position: center;
}

.business-intro .overlay-box {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 36px;
    max-width: 480px;
    height: 161px;
    left: 78.84%;
    right: 0;
    bottom: -0.45px;
    background: #3E78FF;
    opacity: 0.78;
}

.business-intro .overlay-box p {
    width: 308.92px;
    height: 89px;
    font-weight: 500;
    font-size: 16.875px;
    line-height: 30px;
    display: flex;
    align-items: center;
    letter-spacing: -0.36px;
    color: #FFFFFF;
}

.section-title {
    font-weight: 700;
    font-size: 39.2109px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
}

.feature-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    justify-content: center;
}

.feature-item {
    flex: 1;
    min-width: 380px;
    max-width: 410.67px;
    border: 1px solid #DEE2E6;
    padding: 33px;
    display: flex;
    flex-direction: column;
    gap: 32px;
}

.feature-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    width: 100%;
}

.feature-title {
    font-weight: 700;
    font-size: 20.625px;
    line-height: 28px;
    letter-spacing: -0.44px;
    color: #191919;
    margin: 0;
    flex: 1;
}


.feature-icon {
    width: 48px;
    height: 48px;
    margin-left: 15px;
    flex-shrink: 0;
}

.icon-wrapper {
    width: 48.02px;
    height: 48px;
    position: relative;
}

.feature-vector {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: #3E78FF;
}

.feature-desc {
    font-weight: 400;
    font-size: 15.9375px;
    line-height: 31px;
    letter-spacing: -0.34px;
    color: #393939;
    margin: 0;
}

.background-section {
    position: relative;
    height: 400px;
    width: 100%;
    background-image: url('/bestone/images/company/ceo1.jpg');
    background-size: cover;
    background-position: center;
    margin-top: 80px;
}

.overlay-text {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 36px;
    max-width: 480px;
    height: 161px;
    right: 0;
    bottom: 0;
    background: #3E78FF;
    opacity: 0.78;
}

.overlay-text p {
    width: 308.92px;
    height: 89px;
    font-style: normal;
    font-weight: 500;
    font-size: 16.875px;
    line-height: 30px;
    display: flex;
    align-items: center;
    letter-spacing: -0.36px;
    color: #FFFFFF;
}

.business-process {
    width: 1280px;
    max-width: 1280px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
    gap: 64px;
    margin: 0 auto;
    margin-bottom: 100px;
}

.process-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 19px;
    width: 100%;
    margin-bottom: 64px;
    margin-top: 120px;
}

.sub-title {
    font-weight: 800;
    font-size: 18.9062px;
    line-height: 22px;
    color: #3E78FF;
    text-align: center;
}

.main-title {
    font-weight: 700;
    font-size: 28.7109px;
    line-height: 40px;
    text-align: center;
    letter-spacing: -0.6px;
    color: #191919;
}

.process-steps {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 64px;
}

.step-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 48px;
    width: 100%;
}

.step-row.reverse {
    flex-direction: row-reverse;
}

.step-image {
    flex: 1;
    padding: 0 48px;
}

.step-image img {
    width: 556px;
    max-width: 100%;
    height: 434.94px;
    object-fit: cover;
}

.step-content {
    flex: 1;
    padding: 0 48px;
    position: relative;
}

.step-content.text-right {
    text-align: right;
}

.step-number {
    font-weight: 900;
    font-size: 90px;
    line-height: 180px;
    color: #9C9C9C;
    opacity: 0.3;
    position: absolute;
    bottom: 0;
}

.step-row.reverse .step-number {
    right: 48px;
}

.step-content h4 {
    font-weight: 700;
    font-size: 20.7969px;
    line-height: 24px;
    color: #191919;
    margin-bottom: 24px;
}

.step-content p {
    font-weight: 400;
    font-size: 15px;
    line-height: 28px;
    letter-spacing: -0.32px;
    color: #393939;
}

.cta-section {
    position: absolute;
    height: 300px;
    left: 0;
    right: 0;
    top: 3857.31px;
    background-image: url('/bestone/images/company/ceo1.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.cta-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 64.095px 691.55px 0.285px;
    width: 1920px;
    height: 167.38px;
}

.cta-text {
    width: 536.9px;
    height: 103px;
    font-style: normal;
    font-weight: 600;
    font-size: 30px;
    line-height: 51px;
    display: flex;
    align-items: center;
    text-align: center;
    color: #FFFFFF;
    margin-bottom: 20px;
}

.cta-button {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 14.5px 30px;
    width: 147px;
    height: 48px;
    background: #191919;
    border-radius: 24px;
    border: none;
    cursor: pointer;
}

.button-text {
    width: 87px;
    height: 23px;
    font-style: normal;
    font-weight: 500;
    font-size: 15px;
    line-height: 22px;
    display: flex;
    align-items: center;
    color: #FFFFFF;
}

@media (max-width: 1320px) {
    .feature-grid {
        padding: 0 20px;
    }
    
    .feature-item {
        min-width: 300px;
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
    padding: 64px 691.55px 0.285px;
    width: 1920px;
    height: 167.38px;
}

.inquiry-text {
    height: 103px;
    font-weight: 600;
    font-size: 25px;
    line-height: 40px;
    display: flex;
    align-items: center;
    text-align: center;
    color: #FFFFFF;
    margin-bottom: 20px;
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
    .business-section {
        padding-top: 80px;
        overflow-x: hidden; /* 가로 스크롤 방지 */
    }

    .section-title {
        font-size: 32px;
        margin-bottom: 40px;
    }

    .banner-text {
        position: relative;
        right: auto;
        bottom: auto;
        max-width: 100%;
        margin-top: -4px;
    }

    .business-banner img {
        width: 100%;
        margin-left: 0;
    }

    /* 피처 그리드 */
    .feature-item {
        min-width: calc(50% - 12px);
        padding: 24px;
    }

    /* 프로세스 섹션 */
    .business-process {
        width: 100%;
        padding: 0 24px;
    }

    .step-row {
        gap: 32px;
    }

    .step-image {
        padding: 0;
    }

    .step-image img {
        width: 100%;
        height: 350px;
    }

    .step-content {
        padding: 0 24px;
    }

    /* 문의하기 섹션 수정 */
    .inquiry-container {
        width: 100%;
        padding: 64px 24px;
        height: auto;
    }

    .inquiry-text {
        height: auto;
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
    }

    /* 비즈니스 섹션 */
    .business-section {
        padding-top: 60px;
    }

    .section-title {
        font-size: 28px;
        margin-bottom: 30px;
    }

    .business-banner {
        margin-bottom: 40px;
    }

    .banner-text p {
        font-size: 16px;
        line-height: 1.5;
    }

    /* 피처 아이템 */
    .feature-item {
        min-width: 100%;
        margin-bottom: 16px;
    }

    .feature-header {
        margin-bottom: 16px;
    }

    .feature-title {
        font-size: 18px;
    }

    .feature-desc {
        font-size: 14px;
        line-height: 1.6;
    }

    /* 프로세스 섹션 */
    .process-header {
        margin-top: 60px;
        margin-bottom: 30px;
    }

    .sub-title {
        font-size: 16px;
    }

    .main-title {
        font-size: 24px;
        line-height: 1.4;
    }

    .step-row {
        flex-direction: column;
    }

    .step-image img {
        height: 280px;
    }

    .step-content {
        padding: 0;
        text-align: center;
    }

    .step-number {
        font-size: 60px;
        position: relative;
        text-align: center;
        margin-bottom: 16px;
        line-height: 1;
    }

    .step-content h4 {
        font-size: 20px;
        margin-bottom: 12px;
    }

    .step-content p {
        font-size: 14px;
        line-height: 1.6;
    }

    /* 문의하기 섹션 수정 */
    .inquiry-container {
        padding: 40px 16px;
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

    .business-banner {
        height: 200px;
    }

    .banner-text p {
        font-size: 14px;
    }

    .feature-title {
        font-size: 16px;
    }

    .feature-desc {
        font-size: 13px;
    }

    .step-image img {
        height: 200px;
    }

    .step-number {
        font-size: 50px;
    }

    .step-content h4 {
        font-size: 18px;
    }

    .step-content p {
        font-size: 13px;
    }

    .inquiry-text {
        font-size: 18px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 추가적인 JavaScript 기능이 필요한 경우 여기에 구현
});
</script>

<?php
include '../inc/footer.php';
?>