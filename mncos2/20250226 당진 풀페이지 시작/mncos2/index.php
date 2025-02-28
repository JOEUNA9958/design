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
   font-size: 45px;
   margin-bottom: 20px;
   font-weight: 700;
   font-family: 'Montserrat', sans-serif;
   letter-spacing: -0.02em;
}

.hero-subtitle {
   font-size: 17px;
   color: rgba(255,255,255,0.7)
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
   text-align: center;
   font-size: 35px;
   margin-bottom: 15px;
   font-weight: 500;
   transform: translateY(0);
   transition: transform 0.3s ease;
}

.product-item:hover .product-title,
.product-item:hover .product-desc {
    transform: translateY(-10px);
}

.more-btn {
   text-align: center;
   display: block;
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
   height: 40px;
   margin-bottom: 5px;
}

.portfolio-brand {
   font-size: 35px;
   font-weight: 700;
   text-align: center;
   color: #1d1d1d;
}

.portfolio-name {
   position: relative;
   padding-top: 10px;
   color: #3d3d3d;
   font-size: 15px;
}

.portfolio-name:before {
   content: '';
   position: absolute;
   top: 0;
   left: 50%;
   transform: translateX(-50%);
   width: 30px;
   height: 1px;
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
   font-size: 45px;
   margin-bottom: 20px;
   font-weight: 700;
   font-family: 'Montserrat', sans-serif;
   letter-spacing: -0.02em;
}

.fp-is-overflow .fp-overflow.fp-auto-height, .fp-is-overflow .fp-overflow.fp-auto-height-responsive, .fp-is-overflow>.fp-overflow {
    overflow-y: hidden;
}

.history-subtitle {
   font-size: 17px;
   color: rgba(255,255,255,0.7)
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
    background-color: #F8F3EF;
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
   font-size: 45px;
   font-family: 'Montserrat', sans-serif;
   font-weight: 700;
   color: #1d1d1d;
}

.news-subtitle {
   color: #3d3d3d;
   font-size: 18px;
}

.news-more {
    display: flex;
    align-items: center;
    color: #3d3d3d;
    text-decoration: none;
    font-size: 14px;
}


.news-more img {
    margin-left: 10px;
    height: 18px;
    object-fit: contain;  /* 이미지 비율 유지 */
}

.news-list {
   border-top: 1px solid #ccc;
}

.news-item {
   display: flex;
   justify-content: space-between;
   padding: 30px 0;
   border-bottom: 1px solid #ccc;
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
                            <h1 class="hero-title">오늘도 수많은 사람들이 갈등 해결을<br>
                            위해 전문가의 도움을 요청하고 있습니다 </h1>
                            <p class="hero-subtitle">전문적이고 차별화된 상담을 진행하고 있습니다.</p>
                        </div>
                    </div>
                </div>
                <div class="slide slide-2">
                    <div class="slide-content">
                        <div>
                            <h1 class="hero-title">따돌림 문제의 효과적인 해결을 위해서는<br> 
                             초기대응, 지속적인 관심 및 전문적인 개입이 꼭 필요합니다.</h1>
                            <p class="hero-subtitle">3가지유형 : 수동적 피해자, 도발적 피해자, 피해자이면서 가해자</p>
                        </div>
                    </div>
                </div>
                <div class="slide slide-3">
                    <div class="slide-content">
                        <div>
                            <h1 class="hero-title">심리적 혹은 신체적으로 감당하기 어려운 <br>
                            상황에 처했을 때 느끼는 불안과 위협의 감정</h1>
                            <p class="hero-subtitle">스트레스란 외부의 원하지 않는 자극에 대해 내 몸이 적응하려는 노력을 말합니다.</p>
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
                <h2 class="products-title" data-aos="fade-up">심리상담 프로그램</h2>
                <p class="products-desc" data-aos="fade-up" data-aos-delay="100">전문 상담 프로그램을 선택해보세요</p>
                
                <div class="products_grid">
                    <div class="swiper"> <!-- 팝업의 높이와 넓이를 css에서 줄 수 있는 요소-->
                        <ul class="swiper-wrapper"> <!-- 각 팝업 콘텐츠를 감싸는 요소-->
                            <li class="swiper-slide pro01" >
                                <a href>
                                    <h3 class="product-title">부부상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide">
                                <a>
                                    <h3 class="product-title">가족상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide">
                                <a>
                                    <h3 class="product-title">개인심리 상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide">
                                <a>
                                    <h3 class="product-title">트라우마 상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                        </ul>
                        <div class="swiper-pagination"></div>  <!-- 컨트롤 요소는 swiper 안에 배치-->
                        <button class="products_grid-button-prev"></button>
                        <button class="products_grid-button-next"></button>
                    </div>
                </div>




                <!-- <div class="products-grid">
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/counsel/counsel01.jpg" alt="스킨케어">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">부부상담</h3>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/counsel/counsel02.jpg" alt="패드 및 마스크팩">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">가족상담</h3>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/counsel/counsel03.jpg" alt="페이스 & 바디케어">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">개인심리 상담</h3>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-thumb">
                            <img src="images/counsel/counsel04.jpg" alt="헤어케어">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">트라우마 상담</h3>
                            <a href="/mncos2/portfolio/index.php" class="more-btn">자세히 보기<img src="images/common/arrow_right.png" alt="자세히보기"></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>

        <section class="section" id="portfolio">
            <div class="portfolio-inner">
                <h2 data-aos="fade-up">심리검사 프로그램</h2>
                
                <div class="portfolio-grid">
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt01.jpg" alt="VT">
                        <h3 class="portfolio-brand">MMPI</h3>
                        <p class="portfolio-name">다면적 인성 검사</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt02.jpg" alt="VT">
                        <h3 class="portfolio-brand">임상심리평가</h3>
                        <p class="portfolio-name">심리적 상태와 행동을 평가 </p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt03.jpg" alt="VT">   
                        <h3 class="portfolio-brand">MBTI</h3>
                        <p class="portfolio-name">16가지 성격유형검사</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt04.jpg" alt="VT">
                        <h3 class="portfolio-brand">HTP</h3>
                        <p class="portfolio-name">그림을 통한 심리 평가법</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt05.jpg" alt="VT">
                        <h3 class="portfolio-brand">정신진단검사</h3>
                        <p class="portfolio-name">정신 상태 평가</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt06.jpg" alt="VT">
                        <h3 class="portfolio-brand">결혼만족도 검사</h3>
                        <p class="portfolio-name">부부관계 개선을 도움</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt07.jpg" alt="VT">
                        <h3 class="portfolio-brand">부부의사소통 검사</h3>
                        <p class="portfolio-name"> 부부 대화 분석</p>
                    </div>
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/photo/vt08.jpg" alt="VT">
                        <h3 class="portfolio-brand">전문 심리검사</h3>
                        <p class="portfolio-name">프로그램을 선택해보세요</p>
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
                    <h1 class="history-title">미래평생교육센터<br>프로그램</h1>
                    <p class="history-subtitle">가정폭력˙폭력전문상담원, 상담자격증과정, 성희롱인식개선교육</p>
                </div>
            </div>
            <div class="history-content">
                <div>
                    <h1 class="history-title">미래평생교육센터<br>프로그램</h1>
                    <p class="history-subtitle">미술심리치료사 과정, 가족상담사과정, 조직문화 개선 교육 프로그램 운영</p>
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
                        <h2 class="news-title">사이버 상담실</h2>
                    </div>
                    <a href="/mncos2/board/index.php" class="news-more">상담실 바로가기<img src="images/common/arrow_right.png" alt="더보기"></a>
                </div>
                
                <div class="news-list" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-item">
                        <a href="#">더 자세한 상담내용은 상담실에 문의해주세요.</a>
                        <span class="news-date">2025-02-26</span>
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