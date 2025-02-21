<!DOCTYPE html>
<html lang="ko">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.20/fullpage.scrollOverflow.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M&COS</title>
    <link rel="preconnect" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.20/fullpage.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<style>
/* Common */
* {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, system-ui, Roboto, sans-serif;
}

body {
   overflow: hidden;
}

.section {
    height: 100vh;
    position: relative;
    overflow: hidden;
}

/* 섹션 공통 스타일 */
.section h2,
.section-title,
.clients h2,
.products-title {
   font-size: 48px;
   margin-bottom: 20px;
   font-family: 'Montserrat', sans-serif;
   font-weight: 700;
   color: #111;
   text-align: center;
}

.section-desc,
.clients-desc,
.products-desc {
   font-size: 18px;
   color: #666;
   margin-bottom: 70px;
   text-align: center;
   word-break: keep-all;
   line-height: 1.6;
}

/* Section 1 - Slider */
#slider {
   background: #000;
}

.slider {
   position: relative;
   height: 100vh;
   overflow: hidden;
}

.slide {
   position: absolute;
   width: 100%;
   height: 100%;
   opacity: 0;
   transition: opacity 0.5s ease;
}

.slide.active {
   opacity: 1;
}

.slide::before {
   content: '';
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background: rgba(0, 0, 0, 0.3);
}

.slide-1 { background: url('images/main/slide1.jpg') center/cover no-repeat; }
.slide-2 { background: url('images/main/slide2.jpg') center/cover no-repeat; }
.slide-3 { background: url('images/main/slide3.jpg') center/cover no-repeat; }

.slide-content {
   position: relative;
   z-index: 1;
   color: white;
   height: 100%;
   display: flex;
   align-items: center;
   padding-left: 20%;
}

.hero-title {
   font-size: 64px;
   margin-bottom: 20px;
   font-weight: 700;
   font-family: 'Montserrat', sans-serif;
   letter-spacing: -0.02em;
}

.hero-subtitle {
   font-size: 24px;
   color: #ffffff;
}

.navigation {
   position: absolute;
   left: 0;
   right: 0;
   top: 50%;
   transform: translateY(-50%);
   display: flex;
   justify-content: space-between;
   padding: 0 80px;
   color: white;
   z-index: 2;
   font-family: 'Montserrat', sans-serif;
   font-size: 14px;
   font-weight: 500;
   pointer-events: none;
}

.prev, .next {
   position: relative;
   cursor: pointer;
   padding: 5px 0;
   pointer-events: all;
}

.prev::after, .next::after {
   content: '';
   position: absolute;
   bottom: 0;
   left: 0;
   width: 0;
   height: 1px;
   background: #fff;
   transition: width 0.3s ease;
}

.prev:hover::after, .next:hover::after {
   width: 100%;
}

.counter {
   position: absolute;
   bottom: 80px;
   right: 80px;
   color: white;
   font-size: 48px;
   z-index: 2;
   font-family: 'Montserrat', sans-serif;
   font-weight: 300;
}

/* Section 2 - Clients */
#clients {
   background: #fff;
   display: flex;
   align-items: center;
   justify-content: center;
}

.clients-inner {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 100px 40px;
    text-align: center;
}

.client-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    border-right: 1px solid #eee;
    margin: 0 auto;
    max-width: 1400px;
    width: 100%;
}

.client-column {
   display: flex;
   flex-direction: column;
   align-items: center;
   padding: 60px 50px;
   gap: 50px;
   border-left: 1px solid #eee;
}

.client-column img {
   max-width: 160px;
   height: auto;
   opacity: 0.3;
   transition: opacity 0.3s ease;
   filter: grayscale(100%);
}

.client-column img:hover {
   opacity: 1;
   filter: none;
}

/* Section 3 - Products */
#products {
   background: #fff;
   display: flex;
   align-items: center;
   justify-content: center;
   padding: 0 40px;
}

.products-inner {
   width: 100%;
   max-width: 1400px;
   margin: 0 auto;
   text-align: center;
}

.products-grid {
   display: flex;
   flex-wrap: wrap;
   overflow: hidden; /* 추가 */
   width: 100%; /* 추가 */
}

.product-item {
    width: 25%;
    position: relative;
    overflow: hidden;
    height: 450px;
}

.product-thumb {
   width: 100%;
   height: 100%;
   transition: transform 0.3s ease;
}

.product-thumb img {
   width: 100%;
   height: 100%;
   object-fit: cover;
}

.product-item:hover .product-thumb {
   transform: scale(1.1);
}

.product-content {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   color: white;
   padding: 40px;
   text-align: left;
   display: flex;
   flex-direction: column;
   justify-content: flex-end;
   transition: all 0.3s ease;
}

.product-item:hover .product-content {
   background: rgba(0,0,0,0.5);
}

.product-title {
   font-size: 24px;
   margin-bottom: 15px;
   font-weight: 500;
   transform: translateY(0);
   transition: transform 0.3s ease;
}

.product-desc {
   font-size: 14px;
   line-height: 1.6;
   margin-bottom: 20px;
}


.product-item:hover .product-title,
.product-item:hover .product-desc {
    transform: translateY(-10px);
}

.more-btn {
   display: inline-flex;
   align-items: center;
   color: #fff;
   text-decoration: none;
   font-size: 14px;
   transition: all 0.3s ease;
}

.more-btn img {
    margin-left: 10px;
    height: 18px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.more-btn:hover img {
   transform: translateX(5px);
}

/* Section 4 - Portfolio */
#portfolio {
   background: #fff;
   height: 100vh;
   display: flex;
   align-items: center;
}

.portfolio-inner {
   width: 100%;
   max-width: 1400px;
   margin: 0 auto;
   padding: 0 40px;
   text-align: center;
}

.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 30px;
    margin-top: 60px;
    position: relative;
    overflow: hidden; /* 추가 */
    width: 100%; /* 추가 */
}

.portfolio-item {
   padding: 40px;
   text-align: center;
   height: 260px;
}

.portfolio-item img {
   max-width: 100%;
   height: 120px;
   margin-bottom: 20px;
}

.portfolio-brand {
   font-size: 15px;
   font-weight: 700;
   text-align: center;
}

.portfolio-name {
   position: relative;
   padding-top: 15px;
   color: #666;
   font-size: 12px;
}

.portfolio-name:before {
   content: '';
   position: absolute;
   top: 0;
   left: 50%;
   transform: translateX(-50%);
   width: 30px;
   height: 1px;
   background: #999;
}

.portfolio-nav {
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   width: 100%;
   display: flex;
   justify-content: space-between;
   pointer-events: none;
   padding: 0 -20px;
}

.portfolio-prev,
.portfolio-next {
   width: 50px;
   height: 50px;
   background: rgba(0,0,0,0.3);
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: pointer;
   pointer-events: all;
   transition: all 0.3s ease;
}

.portfolio-prev:hover,
.portfolio-next:hover {
   background: rgba(0,0,0,0.5); 
}

/* Section 5 - History */
#history {
   background: url('images/main/img1.jpg') center/cover no-repeat;
   position: relative;
}

#history::before {
   content: '';
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background: rgba(0,0,0,0.3);
}

.history-content {
    position: relative;
    z-index: 1;
    color: white;
    height: 100%;
    display: none; /* 기본적으로 숨김 */
    align-items: center;
    padding-left: 20%;
}

.history-content:first-child {
    display: flex; /* 첫 번째 슬라이드만 표시 */
}

.history-title {
   font-size: 64px;
   margin-bottom: 20px;
   font-weight: 700;
   font-family: 'Montserrat', sans-serif;
   letter-spacing: -0.02em;
}

.fp-is-overflow .fp-overflow.fp-auto-height, .fp-is-overflow .fp-overflow.fp-auto-height-responsive, .fp-is-overflow>.fp-overflow {
    overflow-y: hidden;
}

.history-subtitle {
   font-size: 24px;
   color: #ffffff;
}

.history-nav {
   position: relative;
   z-index: 1;
   display: flex;
   justify-content: space-between;
   padding: 0 80px;
   position: absolute;
   width: 100%;
   top: 50%;
   transform: translateY(-50%);
}

.history-prev,
.history-next {
   color: #fff;
   font-family: 'Montserrat', sans-serif;
   font-size: 14px;
   cursor: pointer;
}

footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #fff;
    z-index: 100;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0.3s ease, opacity 0.3s ease;
}

/* Section 6 - News */
#news {
    background: #fff;
    display: flex;
    align-items: center;
    padding-bottom: 300px; /* 푸터 높이만큼 여백 추가 */
    height: auto;
    min-height: 100vh;
}

#fullpage {
    padding-bottom: 0;
}

.news-inner {
   width: 1200px;
   max-width: 1400px;
   margin: 0 auto;
   padding: 0 40px;
}

.news-header {
   display: flex;
   justify-content: space-between;
   align-items: center;
   margin-bottom: 80px;
}

.news-title {
   font-size: 48px;
   font-family: 'Montserrat', sans-serif;
   font-weight: 700;
}

.news-subtitle {
   color: #666;
   font-size: 18px;
}

.news-more {
    display: flex;
    align-items: center;
    color: #111;
    text-decoration: none;
    font-size: 14px;
}


.news-more img {
    margin-left: 10px;
    height: 18px;
    object-fit: contain;  /* 이미지 비율 유지 */
}

.news-list {
   border-top: 1px solid #eee;
}

.news-item {
   display: flex;
   justify-content: space-between;
   padding: 30px 0;
   border-bottom: 1px solid #eee;
}

.news-item a {
   color: #111;
   text-decoration: none;
}

.news-date {
   color: #999;
}

/* Responsive Styles */
@media (max-width: 1024px) {
            .hero-title {
                font-size: 40px;
            }
            .hero-subtitle {
                font-size: 18px;
            }
}

@media (max-width: 768px) {
            body {
                overflow: auto !important;
            }

            #news {
                padding-bottom: 0 !important; /* 패딩 제거 */
            }

            footer {
                position: relative; /* fixed에서 relative로 변경 */
                height: auto;
                padding: 40px 20px;
                visibility: visible !important; /* 강제로 보이게 설정 */
                opacity: 1 !important;
                margin-top: 50px;
            }

            #fullpage {
                height: auto !important;
                transform: none !important;
            }
            
            .section {
                height: auto !important;
                min-height: 100vh;
                padding: 0 !important; /* 패딩 제거 */
                position: relative !important;
                transform: none !important;
                top: auto !important;
                left: auto !important;
            }

            .fp-overflow {
                height: auto !important;
                overflow: visible !important;
            }

            .fp-section {
                height: auto !important;
            }

            .fp-slides, .fp-tableCell {
                height: auto !important;
                position: relative !important;
                transform: none !important;
            }

            .hero-title {
                font-size: 32px;
            }
            .hero-subtitle {
                font-size: 16px;
            }
            .product-item {
                width: 100%;
                height: auto;
            }
            .clients-inner, .products-inner {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .client-grid {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }
            .client-column {
                width: 45%;
                padding: 20px;
            }
            .portfolio-grid {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            #slider {
                background: none; /* 검은 배경 제거 */
            }
            .slider {
                height: 100vh; /* 전체 높이로 설정 */
                width: 100%; /* 전체 너비로 설정 */
            }

            .slide {
                width: 100%;
                height: 100vh;
            }

            .slide-content {
                padding-left: 20px; /* 모바일에서 패딩 조정 */
            }
            .navigation {
                position: absolute;
                left: 0;
                right: 0;
                top: 65%;
                transform: translateY(-50%);
                display: flex;
                justify-content: space-between;
                padding: 0 80px;
                color: white;
                z-index: 2;
                font-family: 'Montserrat', sans-serif;
                font-size: 14px;
                font-weight: 500;
                pointer-events: none;
            }
            .product-title {
                font-size: 15px;
                font-weight: 500;
                transform: translateY(0);
                transition: transform 0.3s ease;
                margin-bottom: 0;
            }
            .product-desc {
                font-size: 9px;
                line-height: 1.6;
                margin-bottom: 0;
            }

            .more-btn {
                display: inline-flex;
                align-items: center;
                color: #fff;
                text-decoration: none;
                font-size: 9px;
                transition: all 0.3s ease;
            }

            .product-content {
                position: absolute;
                top: 30px;
                left: 0;
                width: 100%;
                height: 100%;
                color: white;
                text-align: left;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                transition: all 0.3s ease;
            }
            .history-content {
                position: relative;
                z-index: 1;
                color: white;
                height: 100%;
                display: none;
                align-items: center;
                /* padding-left: 20%; */
            }

            .history-content {
                position: relative;
                z-index: 1;
                color: white;
                height: 100%;
                display: none;
                align-items: center;
                top: 300px;
            }

            .history-title {
                font-size: 25px;
                margin-bottom: 20px;
                font-weight: 700;
                font-family: 'Montserrat', sans-serif;
                letter-spacing: -0.02em;
            }
            .history-subtitle {
                font-size: 11px;
                color: #ffffff;
            }
            .history-prev, .history-next {
                color: #fff;
                font-family: 'Montserrat', sans-serif;
                font-size: 11px;
                cursor: pointer;
            }
            .news-more {
                display: flex;
                align-items: center;
                color: #111;
                text-decoration: none;
                font-size: 11px;
            }
        }

/* FullPage.js Controls */
.fp-controlArrow,
#fp-nav {
   display: none !important;
}

</style>
</head>
<body>
<?php include 'inc/header.php'; ?>
<?php include 'inc/cursor.php'; ?>

    <div id="fullpage">
        <section class="section" id="slider">
            <div class="slider">
                <div class="slide slide-1 active">
                    <div class="slide-content">
                        <div>
                            <h1 class="hero-title">ISO 9001/14001<br>22716 인증</h1>
                            <p class="hero-subtitle">CERTIFICATION NTREE ISO</p>
                        </div>
                    </div>
                </div>
                <div class="slide slide-2">
                    <div class="slide-content">
                        <div>
                            <h1 class="hero-title">M&COS<br>OEM/ODM</h1>
                            <p class="hero-subtitle">화장품 연구개발 전문기업</p>
                        </div>
                    </div>
                </div>
                <div class="slide slide-3">
                    <div class="slide-content">
                        <div>
                            <h1 class="hero-title">슬라이드 3<br>타이틀</h1>
                            <p class="hero-subtitle">서브타이틀 3</p>
                        </div>
                    </div>
                </div>
                <div class="navigation">
                    <span class="prev">PREV</span>
                    <span class="next">NEXT</span>
                </div>
                <!-- <div class="counter">0</div> -->
            </div>
        </section>

        <!-- <section class="section" id="clients">
            <div class="clients-inner">
                <h2 data-aos="fade-up">CLIENTS</h2>
                <p class="clients-desc" data-aos="fade-up" data-aos-delay="100">엠앤코스와 함께하는 클라이언트입니다.</p>
                
                <div class="client-grid" data-aos="fade-up" data-aos-delay="200">
                    <div class="client-column">
                        <img src="images/clients/2bsl.svg" alt="2BSL">
                        <img src="images/clients/vt.svg" alt="VT COSMETICS">
                        <img src="images/clients/avrilee.svg" alt="Avrille">
                        <img src="images/clients/live-forest.svg" alt="LIVE FOREST">
                        <img src="images/clients/mydahlia.svg" alt="MyDahlia">
                    </div>
                    <div class="client-column">
                        <img src="images/clients/medioh.svg" alt="MEDIOh">
                        <img src="images/clients/obge.svg" alt="OBgE">
                        <img src="images/clients/bedight.svg" alt="BEDIGHT">
                        <img src="images/clients/marnell.svg" alt="Marnell">
                        <img src="images/clients/ournall.svg" alt="Ournall">
                    </div>
                    <div class="client-column">
                        <img src="images/clients/curicell.svg" alt="CURICELL">
                        <img src="images/clients/anan.svg" alt="anan">
                        <img src="images/clients/bqcell.svg" alt="BQCELL">
                        <img src="images/clients/medilabo.svg" alt="MEDILABO">
                        <img src="images/clients/pibumi.svg" alt="PIBUMI">
                    </div>
                    <div class="client-column">
                        <img src="images/clients/housweet.svg" alt="HOUSWEET">
                        <img src="images/clients/hair.svg" alt="Hair">
                        <img src="images/clients/lilyeve.svg" alt="lilyeve">
                        <img src="images/clients/modubala.svg" alt="modubala">
                        <img src="images/clients/saengak.svg" alt="Saengak">
                    </div>
                </div>
            </div>
        </section> -->

        <section class="section" id="products">
            <div class="products-inner">
                <h2 class="products-title" data-aos="fade-up">Cosmetic Products</h2>
                <p class="products-desc" data-aos="fade-up" data-aos-delay="100">우리는 고객의 다양한 니즈를 충족시키기 위해 폭넓은 화장품 제품군을 제공합니다.</p>
                
                <div class="products-grid">
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/main/section3-1.jpg" alt="스킨케어">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">스킨케어</h3>
                            <p class="product-desc">기초화장품 및 기능성화장품<br>(스킨, 로션, 에센스, 크림, 앰플, 썬크림 spf50+ pa++++, 풋스틱, 멀티밤)</p>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/main/section3-2.jpg" alt="패드 및 마스크팩">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">패드 및 마스크팩</h3>
                            <p class="product-desc">고주파 패드 및 마스크팩 제조 및 생산</p>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/main/section3-3.jpg" alt="페이스 & 바디케어">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">페이스 & 바디케어</h3>
                            <p class="product-desc">퍼품 바디워시, 스크럽 바디워시,<br>여드름 기능성 바디워시, 폼클렌징, 필오프팩,<br>워시 오프 팩, 클렌징스틱, 파우더 워시</p>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/main/section3-4.jpg" alt="헤어케어">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">헤어케어</h3>
                            <p class="product-desc">탈모증상완화 기능성 샴푸, 토닉, 앰플,<br>스타일링 포마드, 토닉, 헤어팩, 헤어 트리트먼트,<br>퍼퓸 샴푸, 컬링 크림, 두피 스케일링 제품,<br>파우더샴푸</p>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="portfolio">
            <div class="portfolio-inner">
                <h2 data-aos="fade-up">Portfolio</h2>
                
                <div class="portfolio-grid">
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/portfolio/vt.jpg" alt="VT">
                        <h3 class="portfolio-brand">VT</h3>
                        <p class="portfolio-name">CICA RETI-A Pore Clear Stick</p>
                    </div>
                </div>

                <!-- <div class="portfolio-nav">
                    <button class="portfolio-prev">
                        <img src="images/common/arrow_left.svg" alt="이전">
                    </button>
                    <button class="portfolio-next">
                        <img src="images/common/arrow_right.svg" alt="다음">
                    </button>
                </div> -->
            </div>
        </section>

        <section class="section" id="history">
            <div class="history-content">
                <div>
                    <h1 class="history-title">WE MAKE<br>OUR HISTORY</h1>
                    <p class="history-subtitle">당신의 창업 성공 스토리, 엠앤코스가 함께합니다.</p>
                </div>
            </div>
            <div class="history-content">
                <div>
                    <h1 class="history-title">WE MAKE<br>OUR HISTORY</h1>
                    <p class="history-subtitle">당신의 창업 성공 스토리</p>
                </div>
            </div>
            <div class="history-nav">
                <span class="history-prev">PREV</span>
                <span class="history-next">NEXT</span>
            </div>
        </section>

        <section class="section" id="news">
            <div class="news-inner">
                <div class="news-header" data-aos="fade-up">
                    <div>
                        <h2 class="news-title">NEWS</h2>
                    </div>
                    <a href="/mncos2/board/index.php" class="news-more">공지사항 더 보기<img src="images/common/arrow_right.png" alt="더보기"></a>
                </div>
                
                <div class="news-list" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-item">
                        <a href="#">몰 오픈을 축하합니다.</a>
                        <span class="news-date">2017-12-21</span>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include 'inc/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.20/fullpage.min.js"></script>
<script>
// 모바일 체크 함수
function isMobile() {
  return window.innerWidth <= 768;
}

document.addEventListener("DOMContentLoaded", function () {
  let fp = null;
  
  function initFullPage() {
      if (!isMobile()) {
          // PC 버전
          fp = new fullpage('#fullpage', {
              autoScrolling: true,
              navigation: true,
              navigationPosition: 'right',
              css3: true,
              scrollingSpeed: 700,
              normalScrollElements: 'footer',
              scrollOverflow: true,
              fitToSection: true,
              scrollBar: false,
              touchSensitivity: 5,
              animateAnchor: true,
              easing: 'easeInOutCubic',
              easingcss3: 'ease',
              credits: false,
              afterLoad: function(origin, destination, direction) {
                  destination.item.querySelectorAll('[data-aos]').forEach(element => {
                      element.classList.add('aos-animate');
                  });
              },
              onLeave: function(origin, destination, direction) {
                  const header = document.querySelector('.header');
                  const footer = document.querySelector('footer');
                  const news = document.querySelector('#news');
                  const topBtn = document.querySelector('.top-btn');
                  
                  if (destination.index === 0) {
                      header.classList.remove('scrolled');
                  } else {
                      header.classList.add('scrolled');
                  }
                  
                  if (destination.index > 0) {
                      topBtn.classList.add('visible');
                  } else {
                      topBtn.classList.remove('visible');
                  }
                  
                  if (destination.index === document.querySelectorAll('.section').length - 1) {
                      footer.style.visibility = 'visible';
                      footer.style.opacity = '1';
                      news.style.height = 'calc(100vh - 300px)';
                  } else {
                      footer.style.visibility = 'hidden';
                      footer.style.opacity = '0';
                      news.style.height = '100vh';
                  }

                  origin.item.querySelectorAll('[data-aos]').forEach(element => {
                      element.classList.remove('aos-animate');
                  });
              }
          });
          document.body.style.overflow = 'hidden';
      } else {
          // 모바일 버전
          if (fp) {
              fullpage_api.destroy('all');
              fp = null;
          }
          document.body.style.overflow = 'auto';
          
          // 모바일에서 footer 및 top 버튼 설정
          const footer = document.querySelector('footer');
          const topBtn = document.querySelector('.top-btn');
          
          footer.style.visibility = 'visible';
          footer.style.opacity = '1';
          
          // 스크롤 이벤트 추가
          window.addEventListener('scroll', function() {
              const header = document.querySelector('.header');
              if (window.scrollY > 50) {
                  header.classList.add('scrolled');
                  topBtn.classList.add('visible');
              } else {
                  header.classList.remove('scrolled');
                  topBtn.classList.remove('visible');
              }
          });

          // top 버튼 클릭 이벤트
          topBtn.addEventListener('click', function() {
              window.scrollTo({
                  top: 0,
                  behavior: 'smooth'
              });
          });
      }
  }

  // 슬라이더 기능
  let currentSlide = 0;
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');

  function showSlide(index) {
      slides.forEach(slide => slide.classList.remove('active'));
      currentSlide = (index + slides.length) % slides.length;
      slides[currentSlide].classList.add('active');
  }

  function autoSlide() {
      showSlide(currentSlide + 1);
  }

  let slideInterval = setInterval(autoSlide, 5000);

  prevBtn.addEventListener('click', () => {
      clearInterval(slideInterval);
      showSlide(currentSlide - 1);
      slideInterval = setInterval(autoSlide, 5000);
  });

  nextBtn.addEventListener('click', () => {
      clearInterval(slideInterval);
      showSlide(currentSlide + 1);
      slideInterval = setInterval(autoSlide, 5000);
  });

  // History 슬라이더
  let historySlideIndex = 0;
  const historySlides = document.querySelectorAll('#history .history-content');
  const historyPrev = document.querySelector('.history-prev');
  const historyNext = document.querySelector('.history-next');

  function showHistorySlide(index) {
      historySlides.forEach(slide => slide.style.display = 'none');
      historySlideIndex = (index + historySlides.length) % historySlides.length;
      historySlides[historySlideIndex].style.display = 'flex';
  }

  historyPrev.addEventListener('click', () => showHistorySlide(historySlideIndex - 1));
  historyNext.addEventListener('click', () => showHistorySlide(historySlideIndex + 1));
  showHistorySlide(0);

  // AOS 초기화 
  AOS.init({
      duration: 1000,
      once: false,
      disable: 'mobile'
  });

  // 초기 실행
  initFullPage();

  // 리사이즈 시 실행
  window.addEventListener('resize', initFullPage);
});
</script>
</body>
</html>