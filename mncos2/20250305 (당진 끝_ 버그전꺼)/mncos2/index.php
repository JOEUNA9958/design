<!DOCTYPE html>
<html lang="ko">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.20/fullpage.scrollOverflow.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

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
ul , li {
    list-style: none;
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
   font-size: 45px;
   margin-bottom: 20px;
   font-family: 'Montserrat', sans-serif;
   font-weight: 700;
   color: #1d1d1d;
   text-align: center;
}

.section-desc,
.clients-desc,
.products-desc {
   font-size: 17px;
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
.products-inner .products-title {
    color: #1d1d1d;
    font-size: 45px;
}
/*****swiper 시작******/
.products-grid {
   display: flex;
   flex-wrap: wrap;
   overflow: hidden; /* 추가 */
   width: 100%; /* 추가 */
   position: relative;
}
.products_grid .swiper ul {
    display: flex;
}
.products_grid .swiper ul li {
    width: 320px;
}
.products_grid .swiper ul li a {
    display: block;
    padding: 326px 0 0 0;
    height: 450px;
    text-decoration: none;
    position: relative;
}
.products_grid .swiper ul li a::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 149px;
    background-color: rgba(0, 0, 0, 0.2); 
    backdrop-filter: blur(2px); 
}
.products_grid .swiper ul li a h3 {
    position: relative;
    z-index: 1;
    font-size: 45px ;
    font-weight: 700;
    margin: 0 0 10px 0;
    color: #fff;
    text-decoration: underline;
}

.products_grid .swiper ul li a .more {
    font-size: 17px;
    text-align: center;
    position: relative;
    color: #fff;
}
.products_grid .swiper ul li a .more::before {
    content: "";
    position: absolute;
    right: 99px;
    top: 0;
    width: 19px;
    height: 19px;
    background-image: url("data:image/svg+xml,%3Csvg width='19' height='19' viewBox='0 0 19 19' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8.59942 10.4H3.79736V8.59893H8.59942V3.79688H10.4005V8.59893H15.2025V10.4H10.4005V15.202H8.59942V10.4Z' fill='white'/%3E%3C/svg%3E%0A");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: contain;
}
.products_grid .swiper button {
    background-color: transparent;
    border: 0;
    margin: 40px 0 0 0;
    position: relative;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: contain;
    width: 50px;
    height: 50px;
    font-size: 0;
    line-height: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='52' height='52' viewBox='0 0 52 52' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M25.4733 17.7919L17.792 25.5378L25.5379 33.219L27.7389 30.9995L23.8067 27.1001L33.4496 27.0597L33.4363 23.8848L23.7934 23.9251L27.6928 19.993L25.4733 17.7919ZM25.4177 5.39746C28.1989 5.38582 30.8154 5.90262 33.267 6.94787C35.7186 7.99312 37.8532 9.41665 39.6708 11.2184C41.4885 13.0202 42.9305 15.142 43.997 17.5837C45.0631 20.0254 45.6019 22.6367 45.6136 25.4176C45.6252 28.1988 45.1084 30.8153 44.0632 33.2669C43.0179 35.7185 41.5944 37.8531 39.7926 39.6707C37.9908 41.4884 35.8691 42.9304 33.4274 43.9969C30.9857 45.063 28.3743 45.6018 25.5934 45.6135C22.8122 45.6251 20.1958 45.1083 17.7442 44.063C15.2926 43.0178 13.1579 41.5943 11.3403 39.7925C9.52265 37.9907 8.0806 35.8689 7.01416 33.4272C5.94808 30.9855 5.40921 28.3742 5.39757 25.5933C5.38593 22.8121 5.90273 20.1957 6.94798 17.7441C7.99323 15.2925 9.41675 13.1578 11.2185 11.3402C13.0203 9.52254 15.1421 8.0805 17.5838 7.01406C20.0255 5.94797 22.6368 5.40911 25.4177 5.39746ZM25.4347 8.5724C20.7075 8.59219 16.7104 10.2493 13.4434 13.5439C10.1763 16.8384 8.55272 20.8492 8.5725 25.5763C8.59229 30.3035 10.2494 34.3006 13.544 37.5676C16.8385 40.8347 20.8493 42.4583 25.5765 42.4385C30.3036 42.4187 34.3007 40.7616 37.5677 37.4671C40.8348 34.1726 42.4584 30.1617 42.4386 25.4346C42.4188 20.7074 40.7617 16.7103 37.4672 13.4433C34.1727 10.1762 30.1618 8.55261 25.4347 8.5724Z' fill='%231D1D1D'/%3E%3C/svg%3E%0A");
}
.products_grid .swiper button.products_next {
    background-image: url("data:image/svg+xml,%3Csvg width='53' height='52' viewBox='0 0 53 52' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M26.5925 33.6245L34.2187 25.8244L26.4186 18.1983L24.2333 20.4334L28.193 24.3048L18.5507 24.4135L18.5865 27.5883L28.2288 27.4796L24.3574 31.4393L26.5925 33.6245ZM26.736 46.0183C23.9549 46.0496 21.3349 45.5514 18.8759 44.5236C16.417 43.4957 14.2723 42.0874 12.4419 40.2985C10.6116 38.5097 9.15451 36.3982 8.07078 33.9641C6.9874 31.53 6.43004 28.9226 6.39868 26.1419C6.36731 23.3608 6.86555 20.7407 7.89339 18.2818C8.92123 15.8228 10.3296 13.6782 12.1184 11.8478C13.9073 10.0174 16.0188 8.56036 18.4528 7.47663C20.8869 6.39326 23.4943 5.83589 26.2751 5.80453C29.0562 5.77317 31.6762 6.2714 34.1352 7.29924C36.5941 8.32708 38.7388 9.73543 40.5692 11.5243C42.3995 13.3131 43.8566 15.4246 44.9403 17.8587C46.0237 20.2928 46.5811 22.9002 46.6124 25.6809C46.6438 28.462 46.1455 31.0821 45.1177 33.541C44.0899 36 42.6815 38.1446 40.8927 39.975C39.1038 41.8054 36.9923 43.2624 34.5583 44.3462C32.1242 45.4295 29.5168 45.9869 26.736 46.0183ZM26.6965 42.8435C31.4234 42.7902 35.4086 41.1048 38.6522 37.7872C41.8958 34.4696 43.491 30.4473 43.4377 25.7204C43.3844 20.9936 41.6989 17.0083 38.3813 13.7647C35.0637 10.5211 31.0415 8.92596 26.3146 8.97927C21.5877 9.03257 17.6025 10.718 14.3589 14.0356C11.1152 17.3532 9.5201 21.3755 9.57341 26.1024C9.62672 30.8292 11.3122 34.8145 14.6298 38.0581C17.9474 41.3017 21.9696 42.8968 26.6965 42.8435Z' fill='%231D1D1D'/%3E%3C/svg%3E%0A");
}


/* swiper 사진 넣기*/
.products_grid .swiper ul li.pro01  {
  background: url('/mncos2/images/counsel/counsel01.jpg') no-repeat center center /cover;
}
.products_grid .swiper ul li.pro02  {
  background: url('/mncos2/images/counsel/counsel02.jpg') no-repeat center center /cover; 
}
.products_grid .swiper ul li.pro03  {
  background: url('/mncos2/images/counsel/counsel03.jpg') no-repeat center center /cover; 
}
.products_grid .swiper ul li.pro04  {
  background: url('/mncos2/images/counsel/counsel04.jpg') no-repeat center center /cover; 
}
.products_grid .swiper ul li.pro05  {
  background: url('/mncos2/images/counsel/counsel05.jpg') no-repeat center center /cover; 
}
.products_grid .swiper ul li.pro06 {
  background: url('/mncos2/images/counsel/counsel06.jpg') no-repeat center center /cover;
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
    border: 2px solid #F8F3EF;
}

.portfolio-item {
   padding: 40px;
   text-align: center;
   height: 260px;
   border-right: 1px solid #F8F3EF ;
   border-bottom:  1px solid #F8F3EF;
}
.portfolio-item:last-child {
    border: 0;
}
.portfolio-item img {
   max-width: 100%;
   height: 40px;
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
   font-size: 17px;
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
    height: 823px;
    height: 100vh;
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
.fp-overflow {
    width: 100%;
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
    font-size: 17px;
   color: #3d3d3d;
   text-decoration: none;
}

.news-date {
   color: #999;
   font-size: 15px;
}


@media (max-width: 1300px) {
            .hero-title {
                font-size: 35px;
            }
            .hero-subtitle {
                font-size: 18px;
            }
}

/* Responsive Styles */
@media (max-width: 1024px) {
            .section h2 {
                font-size: 30px;
            }
            .hero-title {
                font-size: 30px;
            }
            .hero-subtitle {
                font-size: 15px;
            }
            .products-inner .products-title {
                font-size: 30px;
            }  
            .products_grid .swiper ul li {
                width: auto;
            } 
            .products_grid .swiper ul li a h3 {
                font-size: 30px ;
            }
            .products_grid .swiper ul li a .more::before {
                content: "";
                position: absolute;
                right: 55px;
                top: 0;
                width: 19px;
                height: 19px;
                background-image: url("data:image/svg+xml,%3Csvg width='19' height='19' viewBox='0 0 19 19' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8.59942 10.4H3.79736V8.59893H8.59942V3.79688H10.4005V8.59893H15.2025V10.4H10.4005V15.202H8.59942V10.4Z' fill='white'/%3E%3C/svg%3E%0A");
                background-position: center center;
                background-repeat: no-repeat;
                background-size: contain;
            }
            .portfolio-grid  {
                margin-top: 40px;
            }
            .portfolio-brand {
                font-size: 25px;
            }
            .history-title  {
                font-size: 30px;
            }

}

 /********모바일 시작**********/
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
                font-size: 25px;
            }
            .hero-subtitle {
                font-size: 13px;
            }
            .product-item {
                width: 100%;
                height: auto;
            }
            body .products-inner {
                display: block;
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
                display: block;
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
                text-align: center;
                justify-content: center;
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
            .products_grid .swiper ul li {
                width: auto;
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

            /**/
            .section h2 {
                font-size: 15px;
            }
            .hero-title {
                font-size: 20px;
            }
            .hero-subtitle {
                font-size: 13px;
            }
            .products-inner .products-title {
                font-size: 25px;
            }   
            .products_grid .swiper ul li a h3 {
                font-size: 25px ;
            }
            .products_grid .swiper ul li a .more {
                font-size: 13px;
            }
            .products_grid .swiper ul li a .more::before {
                display: none;
            }
            .portfolio-grid  {
                margin-top: 40px;
            }
            .portfolio-brand {
                font-size: 25px;
            }
            .portfolio-name {
                padding-top: 5px;
                font-size: 13px;
            }
            .portfolio-item {
                height: 195px;
            }
            .history-title  {
                font-size: 30px;
            }
            .history-subtitle {
                font-size: 13px;
                color: #ffffff;
            }
            .history-nav {
                padding: 100px 20px 0 20px;;
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
                color: #1D1D1D;
                text-decoration: none;
                font-size: 13px;
            }
            .news-item a {
                font-size: 13px;
            }
            .news-date {
                font-size: 13px;
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
                             초기대응, 전문적인 개입이 꼭 필요합니다.</h1>
                            <p class="hero-subtitle">3가지유형 : 수동적 피해자, 도발적 피해자, 피해자이면서 가해자입니다.</p>
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
                                <a href="#n">
                                    <h3>부부상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide pro02">
                                <a href="#n">
                                    <h3>가족상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide pro03">
                                <a href="#n">
                                    <h3>개인심리 상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide pro04">
                                <a href="#n">
                                    <h3>아동심리 상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide pro05">
                                <a href="#n">
                                    <h3>집단 상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                            <li class="swiper-slide pro06">
                                <a href="#n">
                                    <h3>트라우마 상담</h3>
                                    <div class="more">자세히보기</div>
                                </a>
                            </li> <!-- 팝업 요소들 (div로 해도 상관없음)-->
                        </ul>
                    <button class="products_prev">이전버튼</button>
                    <button class="products_next">다음버튼</button>
                    </div>
                </div>
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

  // products swiper
  const products_grid_swiper = new Swiper('.products_grid .swiper', { /* 팝업을 감싼는 요소의 class명 */
        slidesPerView: 2, /* 한번에 보일 팝업의 수 - 모바일 제일 작은 사이즈일때 */
        spaceBetween: 16, /* 팝업과 팝업 사이 여백 */
        breakpoints: {
            768: {    /* 768px 이상일때 적용 */
                slidesPerView: 4,    /*    'auto'   라고 쓰면 css에서 적용한 넓이값이 적용됨 */
                spaceBetween: 20,
            },
        },
        autoplay: { 
            delay: 5000,
            disableOnInteraction: true,
        },

        //effect: "fade", /* fade 효과 */

        loop: true,  /* 마지막 팝업에서 첫번째 팝업으로 자연스럽게 넘기기 */

        navigation: {  /* 이전, 다음 버튼 */
            nextEl: '.products_grid .products_prev',  /* 다음 버튼의 클래스명 */
            prevEl: '.products_grid .products_next',  
        },

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