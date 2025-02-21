<?php
include 'inc/header.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>베스트원테크</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Pretendard", -apple-system, BlinkMacSystemFont, system-ui, Roboto, "Helvetica Neue", "Segoe UI", "Apple SD Gothic Neo", "Noto Sans KR", "Malgun Gothic", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background: #fff;
        }

        .main-slider {
            width: 100%;
            height: 660px;
            position: relative;
            overflow: hidden;
            display: flex;
            margin-top: 80px;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .slide-content {
            width: 40%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 15%;
            background: var(--white-200);
        }

        .text-wrapper {
            max-width: 480px;
        }

        .title-small {
            font-size: 48px;
            font-weight: 300;
            color: #191919;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease;
        }

        .title-large {
            font-size: 48px;
            font-weight: 700;
            color: #191919;
            margin-bottom: 20px;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease 0.2s;
        }

        .description {
            font-size: 16px;
            line-height: 1.6;
            color: #191919;
            margin-bottom: 40px;
            transform: translateX(-50px);
            opacity: 0;
            transition: all 0.8s ease 0.4s;
        }

        .view-project {
            display: inline-flex;
            align-items: center;
            padding: 12px 25px;
            border: 1px solid #191919;
            border-radius: 30px;
            text-decoration: none;
            color: #191919;
            font-size: 14px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: none;
            transform: translateX(-50px);
            opacity: 0;
            transition: all 0.8s ease 0.6s;
        }

        .view-project:after {
            content: '→';
            margin-left: 10px;
        }

        .slide-image {
            width: 60%;
            height: 100%;
            overflow: hidden;
        }

        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide.active .title-small,
        .slide.active .title-large {
            transform: translateY(0);
            opacity: 1;
        }

        .slide.active .description,
        .slide.active .view-project {
            transform: translateX(0);
            opacity: 1;
        }

        .slider-nav {
            position: absolute;
            left: 28%;
            bottom: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            z-index: 10;
        }

        .slider-arrows {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-button {
            font-size: 28px;
            color: #797979;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .nav-button:hover {
            color: #191919;
        }


        .slide-counter {
            margin: 0 10px;  /* 좌우 여백 추가 */
        }

        .current-slide {
            font-size: 40px;
            font-weight: 600;
            color: #191919;
        }

        .total-slides {
            font-size: 16px;
            color: #797979;
            margin-left: 5px;
        }

/* 두 번째 섹션 스타일 */
.business-section {
    position: relative;
    width: 100%;
    padding: 200px 0 100px;
    background: #fff;
}

.business-inner {
    width: 1280px;
    margin: 0 auto;
    position: relative;
}

.business-title {
    font-weight: 600;
    font-size: 44px;
    line-height: 55px;
    letter-spacing: -1.8px;
    color: #191919;
    margin-bottom: 19px;
}

.business-subtitle {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #191919;
    margin-bottom: 50px;
}

.business-container {
    display: flex;
    justify-content: space-between;
    gap: 24px;
}

.business-item {
    width: calc(33.333% - 16px);
    display: flex;
    flex-direction: column;
}

.business-img {
    width: 100%;
    height: 143.72px;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 29.5px;
}

.business-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.business-item-title {
    font-weight: 400;
    font-size: 22px;
    line-height: 34px;
    letter-spacing: -0.8px;
    color: #191919;
    margin-bottom: 10px;
}

.business-item-desc {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #797979;
}

/* 세 번째 섹션 스타일 */
.design-section {
    position: relative;
    width: 100%;
    height: 1000px;
    padding: 0 320px;
    margin-top: 160px;
}

.design-bg {
    position: absolute;
    max-width: 1280px;
    height: 440px;
    left: 0%;
    right: 33.33%;
    top: 28px;
    background: #F9F9FB;
}

.design-inner {
    position: relative;
    width: 1280px;
    margin: 0 auto;
    z-index: 1;
}

.design-header {
    margin-bottom: 60px;
}

.design-title {
    font-weight: 600;
    font-size: 44px;
    line-height: 55px;
    letter-spacing: -1.8px;
    color: #191919;
    margin-bottom: 20px;
}

.design-subtitle {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #797979;
}

.design-content {
    display: flex;
    justify-content: flex-end;
    gap: 270px;
}

.design-item {
    display: flex;
    flex-direction: column;
    gap: 26px;
}

.design-item-large {
    width: 684.8px;
    margin-top: -100px;
}

.design-item-small {
    width: 345px;
    margin-top: 45px;
}

.design-img {
    width: 100%;
    border-radius: 8px;
    overflow: hidden;
}

.design-item-large .design-img {
    height: 464.86px;
}

.design-item-small .design-img {
    height: 420px;
}

.design-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.design-item-title {
    font-weight: 400;
    font-size: 30px;
    line-height: 38px;
    letter-spacing: -1.2px;
    color: #191919;
}

.design-item-desc {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #797979;
}

.divider {
    width: 1280px;
    height: 1px;
    margin: 0 auto;
    background: #DBDBDB;
}

.product-section {
    padding: 100px 0;
}

.product-inner {
    position: relative;
    display: flex;
    justify-content: space-between;
    margin-left: 320px;
    overflow: hidden; /* 추가 */
}

.product-header {
    width: 400x;
    position: relative; /* 추가 */
    z-index: 2; /* 추가 - 헤더가 항상 위에 보이도록 */
    background: #fff; /* 추가 - 헤더 배경 */
    flex-shrink: 0; /* 추가 - 너비 고정 */
}

.product-title {
    font-family: 'Inter';
    font-weight: 600;
    font-size: 44px;
    line-height: 55px;
    letter-spacing: -1.8px;
    color: #191919;
    margin-bottom: 20px;
}

.product-desc {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #191919;
    margin-bottom: 30px;
}

.product-link {
    font-size: 15px;
    color: #191919;
    cursor: pointer;
    margin-bottom: 40px;
}

.product-nav {
    display: flex;
    gap: 16px;
    margin-left: 10px;
    margin-top: 180px;
}

.product-nav button {
    width: 44px;
    height: 44px;
    border: 1px solid #E5E5E5;
    border-radius: 50%;
    background: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.product-nav button:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

.product-nav button:not(:disabled):hover {
    border-color: #191919;
}

.product-nav button:hover {
    border-color: #191919;
}

.product-slider-wrap {
    width: calc(100% - 256px); /* 헤더 영역과 간격 고려 */
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    overflow: hidden; /* 추가 */
}
.product-slider {
    width: fit-content; /* 추가 */
    display: flex;
    gap: 50px;
    justify-content: flex-end;
    transition: transform 0.5s ease;
}

.product-item {
    min-width: 220px; /* 270px에서 220px로 축소 */
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.product-img {
    width: 220px; /* 270px에서 220px로 축소 */
    height: 220px; /* 정사각형 비율 유지 */
    border-radius: 8px;
    overflow: hidden;
}

.product-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category {
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    letter-spacing: -0.6px;
    color: #191919;
}

.title {
    font-weight: 600;
    font-size: 18px;
    line-height: 22px;
    letter-spacing: -0.8px;
    color: #191919;
}

.link {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #191919;
    cursor: pointer;
}

.slider-progress {
    position: relative;
    width: 100%; /* 전체 길이로 확장 */
    height: 3px;
    margin-top: 50px;
    background: rgba(0, 0, 0, 0.1); /* 회색 배경 */
    left: 30px;
}
.progress-bg {
    position: absolute;
    height: 100%;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.progress-bar {
    position: absolute;
    width: 0; /* 초기값 */
    height: 100%;
    background: #393939;
    left: 0; /* 왼쪽에서 시작 */
    transition: width 0.5s ease;
}

.exhibition-section {
    padding: 160px 0;
}

.exhibition-inner {
    width: 1280px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
}

.exhibition-left {
    width: 434px;
    padding-right: 24px;
}

.exhibition-title {
    font-weight: 600;
    font-size: 44px;
    line-height: 55px;
    letter-spacing: -1.8px;
    color: #191919;
    margin-bottom: 20px;
}

.exhibition-desc {
    font-weight: 400;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: -0.6px;
    color: #191919;
    margin-bottom: 30px;
}

.exhibition-more {
    font-size: 15px;
    color: #797979;
    cursor: pointer;
    display: flex;
    align-items: center;
    margin-bottom: 100px;
}

.exhibition-more .arrow {
    width: 14px;
    height: 14px;
    margin-left: 10px;
    background: #797979;
    mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 14 14'%3E%3Cpath d='M1 7h12M13 7L7 1M13 7l-6 6'/%3E%3C/svg%3E") no-repeat center;
    -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 14 14'%3E%3Cpath d='M1 7h12M13 7L7 1M13 7l-6 6'/%3E%3C/svg%3E") no-repeat center;
}

.exhibition-nav {
    display: flex;
    gap: 10px;
    margin-top: 40px;
}

.nav-btn {
    width: 45px;
    height: 45px;
    border: 1px solid #191919;
    border-radius: 50%;
    background: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.3s ease;
}

.nav-btn.prev {
    opacity: 0.35;
}

.thumbnail-container {
    display: flex;
    gap: 10px;
}

.thumbnail {
    width: 125.44px;
    height: 78px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.thumbnail.active {
    opacity: 1;
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.exhibition-right {
    width: 845px;
}

.main-image {
    width: 100%;
    height: 420px;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
}

.main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-overlay {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8) 100%);
    opacity: 0.5;
}

.image-content {
    position: absolute;
    left: 40px;
    bottom: 40px;
    color: #F2F2F2;
}

.image-content h3 {
    font-weight: 600;
    font-size: 26.69px;
    line-height: 35px;
    letter-spacing: -1.2px;
    margin-bottom: 15px;
}

.image-content p {
    font-weight: 400;
    font-size: 13.59px;
    line-height: 23px;
    letter-spacing: -0.6px;
}

.main-section.contact {
    background: url('/bestone/images/main/banner1.jpg') no-repeat center;
    background-size: cover;
    background-attachment: fixed;
    height: 325px;
    position: relative;
}

.container-xl {
    width: 600px;
    padding: 70px 0;
    margin-left: 300px;
}

/* 타이틀 스타일 */
.font-title-xl-2w {
    font-weight: 600;
    font-size: 44px;
    line-height: 55px;
    letter-spacing: -1.8px;
    color: #F2F2F2;
}

/* 연락처 영역 */
.contact-txt {
    margin-top: 30px;
}

.font-contact-m-1 {
    font-weight: 400;
    font-size: 18px;
    line-height: 22px;
    letter-spacing: -0.6px;
    color: #FFFFFF;
    margin-bottom: 20px;
}

/* AOS 애니메이션 관련 스타일 */
[data-aos^=fade][data-aos^=fade] {
    opacity: 0;
    transition-property: opacity,transform;
}

[data-aos^=fade][data-aos^=fade].aos-animate {
    opacity: 1;
    transform: translateZ(0);
}

[data-aos=fade-up] {
    transform: translate3d(0,100px,0);
}

/* aos 딜레이 관련 */
[data-aos-delay="50"] {
    transition-delay: 50ms;
}

[data-aos-delay="100"] {
    transition-delay: 100ms;
}

[data-aos-delay="150"] {
    transition-delay: 150ms;
}

[data-aos-delay="200"] {
    transition-delay: 200ms;
}

[data-aos-delay="250"] {
    transition-delay: 250ms;
}

[data-aos-delay="300"] {
    transition-delay: 300ms;
}

.contact-wrapper {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    gap: 100px;
}

.contact-left, .contact-right {
    flex: 1;
}

.font-title-xl-2w {
    font-weight: 600;
    font-size: 44px;
    line-height: 55px;
    letter-spacing: -1.8px;
    color: #F2F2F2;
    margin-bottom: 30px;
}

.font-contact-m-1 {
    font-weight: 400;
    font-size: 18px;
    line-height: 22px;
    letter-spacing: -0.6px;
    color: #FFFFFF;
    margin-bottom: 20px;
}

/* 모바일 반응형 스타일 */
@media screen and (max-width: 768px) {
    /* 메인 슬라이더 */
    .main-slider {
        height: 500px;
        margin-top: 70px;
        flex-direction: column;
    }

    .slide {
        flex-direction: column-reverse;
    }

    .slide-content {
        width: 100%;
        padding: 24px;
        height: 60%;
    }

    .slide-image {
        width: 100%;
        height: 40%;
    }

    .text-wrapper {
        max-width: 100%;
    }

    .title-small, .title-large {
        font-size: 32px;
        word-break: keep-all;
    }

    .description {
        font-size: 14px;
        word-break: keep-all;
    }

    .slider-nav {
        display: none;
    }

    .slider-progress {display: none;}

    .exhibition-more {margin-bottom: 20px;}

    /* 비즈니스 섹션 */
    .business-section {
        padding: 60px 0;
    }

    .business-inner {
        width: 100%;
        padding: 0 24px;
    }

    .business-title {
        font-size: 32px;
        line-height: 1.3;
        word-break: keep-all;
    }

    .business-subtitle {
        font-size: 14px;
        margin-bottom: 32px;
        word-break: keep-all;
    }

    .business-container {
        flex-direction: column;
        gap: 32px;
    }

    .business-item {
        width: 100%;
    }

    .business-img {
        height: 200px;
    }

    /* 디자인 섹션 */
    .design-section {
        padding: 60px 24px;
        margin-top: 60px;
        height: auto;
    }

    .design-bg {
        display: none;
    }

    .design-inner {
        width: 100%;
    }

    .design-content {
        flex-direction: column;
        gap: 32px;
    }

    .design-item-large, .design-item-small {
        width: 100%;
        margin-top: 0;
    }

    .design-img {
        height: 250px;
    }

    .design-title {
        font-size: 32px;
        line-height: 1.3;
        word-break: keep-all;
    }

    /* 제품 섹션 */
    .product-section {
        padding: 60px 0;
    }

    .product-inner {
        margin-left: 0;
        flex-direction: column;
        padding: 0 24px;
    }

    .product-header {
        width: 100%;
        margin-bottom: 32px;
    }

    .product-title {
        font-size: 32px;
        line-height: 1.3;
    }

    .product-nav {
        margin-top: 24px;
    }

    .product-slider-wrap {
        width: 100%;
    }

    .product-item {
        min-width: 160px;
    }

    .product-img {
        width: 160px;
        height: 160px;
    }

    /* 전시회 섹션 */
    .exhibition-section {
        padding: 60px 0;
    }

    .exhibition-inner {
        width: 100%;
        padding: 0 24px;
        flex-direction: column;
        gap: 32px;
    }

    .exhibition-left {
        width: 100%;
        padding-right: 0;
    }

    .exhibition-right {
        width: 100%;
    }

    .main-image {
        height: 250px;
    }

    .exhibition-title {
        font-size: 32px;
        line-height: 1.3;
    }

    /* 연락처 섹션 */
    .main-section.contact {
        height: auto;
    }

    .container-xl {
        width: 100%;
        padding: 60px 24px;
        margin-left: 0;
    }

    .contact-wrapper {
        flex-direction: column;
        gap: 24px;
    }

    .font-title-xl-2w {
        font-size: 32px;
        line-height: 1.3;
    }
}

/* 더 작은 모바일 화면 대응 */
@media screen and (max-width: 375px) {
    .title-small, .title-large {
        font-size: 28px;
    }

    .description {
        font-size: 13px;
    }

    .product-item {
        min-width: 140px;
    }

    .product-img {
        width: 140px;
        height: 140px;
    }

    .business-img {
        height: 180px;
    }

    .design-img {
        height: 200px;
    }

    .main-image {
        height: 200px;
    }

    .thumbnail {
        width: 100px;
        height: 60px;
    }
}
    </style>
</head>
<body class="main-page">
    <div class="main-slider">
        <div class="slide active">
            <div class="slide-content">
                <div class="text-wrapper">
                    <h2 class="title-small">저자극 스킨케어</h2>
                    <h1 class="title-large">코스메틱 라인</h1>
                    <p class="description">비건·저자극 원료로</br> 매일 사용할 수 있는 스킨케어 제품을 개발합니다.</p>
                    <a href="/bestone/portfolio/oemodm.php" class="view-project">View Project</a>
                </div>
            </div>
            <div class="slide-image">
                <img src="images/main/slide1.jpg" alt="저자극 스킨케어">
            </div>
        </div>

        <div class="slide">
            <div class="slide-content">
                <div class="text-wrapper">
                    <h2 class="title-small">거품폭탄</h2>
                    <h1 class="title-large">버블&팝 배쓰밤</h1>
                    <p class="description">몽글몽글한 거품과 탄산으로</br> 사용성이 우수하고 재밌는 배쓰밤을 제공합니다.</p>
                    <a href="/bestone/portfolio/oemodm.php" class="view-project">View Project</a>
                </div>
            </div>
            <div class="slide-image">
                <img src="images/main/slide2.jpg" alt="거품폭탄">
            </div>
        </div>

        <div class="slide">
            <div class="slide-content">
                <div class="text-wrapper">
                    <h2 class="title-small">차별화된 제품개발은</h2>
                    <h1 class="title-large">(주)베스트원테크</h1>
                    <p class="description">고객사의 니즈에 맞는</br> 다양한 솔루션을 제공합니다.</p>
                    <a href="/bestone/portfolio/oemodm.php" class="view-project">View Project</a>
                </div>
            </div>
            <div class="slide-image">
                <img src="images/main/slide3.jpg" alt="베스트원테크">
            </div>
        </div>

        <div class="slider-nav">
            <span class="nav-button prev">&#8249;</span>
            <span class="slide-counter">
                <span class="current-slide">01</span>
                <span class="total-slides">/ 03</span>
            </span>
            <span class="nav-button next">&#8250;</span>
        </div>
    </div>

    <section class="business-section">
        <div class="business-inner">
            <h2 class="business-title">주력 사업분야</h2>
            <p class="business-subtitle">(주)베스트원테크의 모든 제품은 국내생산하여 안전하고 높은퀄리티를 보장합니다.</p>
            
            <div class="business-container">
                <div class="business-item">
                    <div class="business-img">
                        <img src="images/main/slide1.jpg" alt="필링, 토너패드">
                    </div>
                    <h3 class="business-item-title">필링, 토너패드 주문제작</h3>
                    <p class="business-item-desc">다양한 용기 및 안전하고 건강한 원료를 사용하여 자극적이지 않아 매일 사용하여도 부담이 없습니다.</p>
                </div>

                <div class="business-item">
                    <div class="business-img">
                        <img src="images/main/slide2.jpg" alt="코팩, 마스크팩">
                    </div>
                    <h3 class="business-item-title">코팩, 마스크팩 주문제작</h3>
                    <p class="business-item-desc">제품 디자인부터 액상충진까지 모두 가능하고, 다양한 재질의 시트, 패드로 원하는 사양의 팩 제조가 가능합니다.</p>
                </div>

                <div class="business-item">
                    <div class="business-img">
                        <img src="images/main/slide3.jpg" alt="배쓰밤">
                    </div>
                    <h3 class="business-item-title">배쓰밤 주문제작</h3>
                    <p class="business-item-desc">EWG 1~2등급 원료로 건강하고 안전한 원료를 사용하며, 피부에 부드럽게 퍼지는 향기와 함께, 일상에 지친 피부 스트레스 해소에도 도움을 줍니다.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="design-section">
        <div class="design-bg"></div>
        <div class="design-inner">
            <div class="design-header">
                <h2 class="design-title">당신이 원하는</br> 디자인으로</h2>
                <p class="design-subtitle">끊임없는 소통과 기발한 아이디어로</br> 트렌드에 맞는 세련된 디자인을 제작합니다.</p>
            </div>

            <div class="design-content">
            <div class="design-item design-item-small">
                    <div class="design-img">
                        <img src="images/main/3-2.jpg" alt="압도적인 가성비">
                    </div>
                    <h3 class="design-item-title">압도적인 가성비</h3>
                    <p class="design-item-desc">다른업체랑 비교하고 오셔도 됩니다.</br> 꾸준한 재의뢰는 이유가 있습니다.</p>
                </div>
                <div class="design-item design-item-large">
                    <div class="design-img">
                        <img src="images/main/3-1.jpg" alt="최고의 설비">
                    </div>
                    <h3 class="design-item-title">최고의 설비</h3>
                    <p class="design-item-desc">소량생산이 가능한 다양한 설비를 갖췄으며</br> 최고의 기계들로 압도적인 납기 퍼포먼스를 보여드립니다.</p>
                </div>

            </div>
        </div>
    </section>

    <div class="divider"></div>
    <section class="product-section">
        <div class="product-inner">
            <div class="product-header">
                <h2 class="product-title">제품 소식</h2>
                <p class="product-desc">(주)베스트원테크의 다양한제품을<br>만나보세요</p>
                <a href="/bestone/portfolio/brand.php" class="product-link">더보기 <span>></span></a>
                <div class="product-nav">
                    <button class="prev">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15 6l-6 6 6 6" stroke="#191919" fill="none" stroke-width="2"/>
                        </svg>
                    </button>
                    <button class="next">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M9 6l6 6-6 6" stroke="#191919" fill="none" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="product-slider-wrap">
                <div class="product-slider">
                    <div class="product-item">
                        <div class="product-img">
                            <img src="images/main/product1.jpg" alt="3단 토끼 코팩">
                        </div>
                        <span class="category">마스크 / 코팩</span>
                        <h3 class="title">3단 토끼 코팩</h3>
                        <p class="link">3단 토끼 코팩</p>
                    </div>
                    <div class="product-item">
                        <div class="product-img">
                            <img src="images/main/product1.jpg" alt="3단 토끼 코팩">
                        </div>
                        <span class="category">마스크 / 코팩</span>
                        <h3 class="title">3단 토끼 코팩</h3>
                        <p class="link">3단 토끼 코팩</p>
                    </div>
                    <div class="product-item">
                        <div class="product-img">
                            <img src="images/main/product1.jpg" alt="3단 토끼 코팩">
                        </div>
                        <span class="category">마스크 / 코팩</span>
                        <h3 class="title">3단 토끼 코팩</h3>
                        <p class="link">3단 토끼 코팩</p>
                    </div>
                    <div class="product-item">
                        <div class="product-img">
                            <img src="images/main/product1.jpg" alt="3단 토끼 코팩">
                        </div>
                        <span class="category">마스크 / 코팩</span>
                        <h3 class="title">3단 토끼 코팩</h3>
                        <p class="link">3단 토끼 코팩</p>
                    </div>
                    <div class="product-item">
                        <div class="product-img">
                            <img src="images/main/product1.jpg" alt="3단 토끼 코팩">
                        </div>
                        <span class="category">마스크 / 코팩</span>
                        <h3 class="title">3단 토끼 코팩</h3>
                        <p class="link">3단 토끼 코팩</p>
                    </div>
                    <div class="product-item">
                        <div class="product-img">
                            <img src="images/main/product1.jpg" alt="3단 토끼 코팩">
                        </div>
                        <span class="category">마스크 / 코팩</span>
                        <h3 class="title">3단 토끼 코팩</h3>
                        <p class="link">3단 토끼 코팩</p>
                    </div>
                </div>
                <div class="slider-progress">
                    <div class="progress-bg"></div>
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>
    </section>
    <div class="divider"></div>


    <section class="exhibition-section">
        <div class="exhibition-inner">
            <div class="exhibition-left">
                <h2 class="exhibition-title">참여 전시회</h2>
                <p class="exhibition-desc">(주)베스트원테크는 창의적인 영감과 다양한 의견을 듣기위해<br>다양한 나라의 전시회에 참가하고 있습니다.</p>
                <a href="/bestone/news/gallery.php" class="exhibition-more">
                    더보기 ><span class="arrow"></span>
                </a>
                <div class="thumbnail-container">
                    <div class="thumbnail active">
                        <img src="images/main/5-1.jpg" alt="Cosmoprof Asia">
                    </div>
                    <div class="thumbnail">
                        <img src="images/main/5-2.jpg" alt="Exhibition 2">
                    </div>
                    <div class="thumbnail">
                        <img src="images/main/5-3.jpg" alt="Exhibition 3">
                    </div>
                </div>
                <div class="exhibition-nav">
                    <button class="nav-btn prev">
                        <svg width="16" height="16" viewBox="0 0 16 16">
                            <path d="M10 4l-4 4 4 4" stroke="#191919" fill="none" stroke-width="1.5"/>
                        </svg>
                    </button>
                    <button class="nav-btn next">
                        <svg width="16" height="16" viewBox="0 0 16 16">
                            <path d="M6 4l4 4-4 4" stroke="#191919" fill="none" stroke-width="1.5"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="exhibition-right">
                <div class="main-image">
                    <img src="images/main/5-1.jpg" alt="2024 Cosmoprof Asia Hong Kong">
                    <div class="image-overlay"></div>
                    <div class="image-content">
                        <h3>2024 Cosmoprof Asia Hong Kong</h3>
                        <p>2024 Cosmoprof Asia Hong Kong</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="divider"></div>

    <section class="main-section contact">
        <div class="container-xl">
            <div class="font-title-xl-2w" data-aos="fade-up">고객센터</div>
            <div class="contact-wrapper">
                <div class="contact-left">
                    <p class="font-contact-m-1" data-aos="fade-up" data-aos-delay="50">Tel. 031-293-8330</p>
                    <p class="font-contact-m-1" data-aos="fade-up" data-aos-delay="150">Fax. 031-293-8331</p>
                    <p class="font-contact-m-1" data-aos="fade-up" data-aos-delay="250">E-mail. master@bestonetech.kr</p>
                </div>
                <div class="contact-right">
                    <p class="font-contact-m-1" data-aos="fade-up" data-aos-delay="100">월 - 금 09:00 AM - 05:00 PM</p>
                    <p class="font-contact-m-1" data-aos="fade-up" data-aos-delay="200">점심시간 12:30 PM - 01:30 PM</p>
                    <p class="font-contact-m-1" data-aos="fade-up" data-aos-delay="300">주말 · 공휴일 휴무</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'inc/footer.php';?>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            const prevBtn = document.querySelector('.prev');
            const nextBtn = document.querySelector('.next');
            const currentSlideNum = document.querySelector('.current-slide');
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach(slide => {
                    slide.classList.remove('active');
                });
                slides[index].classList.add('active');
                currentSlideNum.textContent = String(index + 1).padStart(2, '0');
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(currentIndex);
            }

            // 자동 슬라이드
            let slideInterval = setInterval(nextSlide, 5000);

            // 이벤트 리스너
            prevBtn.addEventListener('click', () => {
                clearInterval(slideInterval);
                prevSlide();
                slideInterval = setInterval(nextSlide, 5000);
            });

            nextBtn.addEventListener('click', () => {
                clearInterval(slideInterval);
                nextSlide();
                slideInterval = setInterval(nextSlide, 5000);
            });

            // 초기 슬라이드 설정
            showSlide(currentIndex);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.product-slider');
            const items = document.querySelectorAll('.product-item');
            // 여기를 수정! product-nav 안의 버튼들을 선택
            const prevBtn = document.querySelector('.product-nav .prev');
            const nextBtn = document.querySelector('.product-nav .next');
            const progressBar = document.querySelector('.progress-bar');
            const progressBg = document.querySelector('.slider-progress');
            
            let currentIndex = 0;
            const itemWidth = 220 + 50; // 아이템 너비 + gap
            const totalItems = items.length;
            const visibleItems = 4.5; // 보이는 아이템 수
            const maxIndex = totalItems - visibleItems;
            
            function updateSlider(index) {
                currentIndex = index;
                const translateX = -currentIndex * itemWidth;
                slider.style.transform = `translateX(${translateX}px)`;
                updateProgress();
                
                // 버튼 상태 업데이트
                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentIndex >= maxIndex;
            }
            
            function updateProgress() {
                const progress = (currentIndex / maxIndex) * 100;
                progressBar.style.width = `${progress}%`;
            }
            
            // 초기 상태 설정
            progressBar.style.width = '0%';
            updateSlider(0);
            
            // 이벤트 리스너 수정
            prevBtn.addEventListener('click', () => {
                console.log('prev clicked');  // 디버깅용
                if (currentIndex > 0) {
                    updateSlider(currentIndex - 1);
                }
            });
            
            nextBtn.addEventListener('click', () => {
                console.log('next clicked');  // 디버깅용
                if (currentIndex < maxIndex) {
                    updateSlider(currentIndex + 1);
                }
            });
            
            // 프로그레스바 클릭
            progressBg.addEventListener('click', (e) => {
                const rect = progressBg.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const percentage = x / rect.width;
                const newIndex = Math.round(percentage * maxIndex);
                updateSlider(Math.min(Math.max(0, newIndex), maxIndex));
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.querySelector('.main-image img');
            const mainTitle = document.querySelector('.image-content h3');
            const mainDesc = document.querySelector('.image-content p');
            const prevBtn = document.querySelector('.nav-btn.prev');
            const nextBtn = document.querySelector('.nav-btn.next');
            
            let currentIndex = 0;
            
            function updateImage(index) {
                // 현재 활성화된 썸네일 비활성화
                thumbnails.forEach(thumb => thumb.classList.remove('active'));
                
                // 새로운 썸네일 활성화
                thumbnails[index].classList.add('active');
                
                // 메인 이미지 업데이트
                mainImage.src = thumbnails[index].querySelector('img').src;
                
                // 현재 인덱스 저장
                currentIndex = index;
                
                // 내비게이션 버튼 상태 업데이트
                prevBtn.style.opacity = currentIndex === 0 ? '0.35' : '1';
                nextBtn.style.opacity = currentIndex === thumbnails.length - 1 ? '0.35' : '1';
            }
            
            // 썸네일 클릭 이벤트
            thumbnails.forEach((thumb, index) => {
                thumb.addEventListener('click', () => updateImage(index));
            });
            
            // 이전/다음 버튼 이벤트
            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    updateImage(currentIndex - 1);
                }
            });
            
            nextBtn.addEventListener('click', () => {
                if (currentIndex < thumbnails.length - 1) {
                    updateImage(currentIndex + 1);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('scroll', function() {
                const customerBg = document.querySelector('.bg-wrapper');
                const scrolled = window.pageYOffset;
                customerBg.style.transform = `translateY(${scrolled * 0.5}px)`;
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // AOS 초기화
            AOS.init({
                duration: 1000,
                once: true
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
    // 애니메이션을 위한 CSS 추가
    const style = document.createElement('style');
    style.textContent = `
        .animate-fade-down {
            opacity: 0;
            transform: translateY(-50px);
            transition: all 0.8s ease;
        }
        .animate-fade-up {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        .animate-fade-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }
        .animate-fade-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease;
        }
        .show {
            opacity: 1;
            transform: translate(0, 0);
        }
    `;
    document.head.appendChild(style);

    // 요소에 애니메이션 클래스 추가
    const elements = {
        '.business-title': 'animate-fade-down',
        '.business-subtitle': 'animate-fade-left',
        '.business-item': 'animate-fade-up',
        '.design-title': 'animate-fade-left',
        '.design-subtitle': 'animate-fade-up',
        '.design-item-large': 'animate-fade-left',
        '.design-item-small': 'animate-fade-right',
        '.product-title': 'animate-fade-left',
        '.product-desc': 'animate-fade-left',
        '.exhibition-title': 'animate-fade-left',
        '.exhibition-desc': 'animate-fade-left'
    };

    Object.entries(elements).forEach(([selector, animationClass]) => {
        const elements = document.querySelectorAll(selector);
        elements.forEach(el => {
            el.classList.add(animationClass);
        });
    });

    // Intersection Observer 설정
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // 화면에 들어올 때
                setTimeout(() => {
                    entry.target.classList.add('show');
                }, entry.target.dataset.delay || 0);
            } else {
                // 화면에서 나갈 때
                entry.target.classList.remove('show');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px'
    });

    // 각 요소에 딜레이 추가 및 Observer 시작
    let delay = 0;
    document.querySelectorAll('.business-item').forEach((item) => {
        item.dataset.delay = delay;
        delay += 200;
        observer.observe(item);
    });

    // 나머지 요소들 관찰 시작
    Object.keys(elements).forEach(selector => {
        document.querySelectorAll(selector).forEach(el => {
            observer.observe(el);
        });
    });
});
        
    </script>
</body>
</html>