<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>인증서 - M&COS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

       <!-- Fonts -->
    <link rel="preconnect" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .visual {
            position: relative;
            width: 100%;
            height: 450px;
            background: url('../images/company/company_bg.jpg') no-repeat center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
        }

        .visual h2 {
            font-size: 48px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .visual p {
            font-size: 18px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .certification-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .swiper {
            width: 100%;
            padding: 50px 0;
        }

        .swiper-slide {
            width: 300px;
            padding: 20px;
            background: #fff;
            border: 1px solid #eee;
            text-align: center;
        }

        .cert-image {
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .cert-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .cert-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .cert-org {
            font-size: 14px;
            color: #666;
        }

        .swiper-pagination {
            position: relative;
            margin-top: 30px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
        }

        .page-info {
            text-align: center;
            font-size: 16px;
            color: #666;
        }

        /* 스크롤 탑 버튼 */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #009FE3;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .scroll-top:hover {
            background: #0085BE;
        }

        .page-navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .nav-button {
            width: 40px;
            height: 40px;
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
        }

        .nav-button.prev::before {
            content: '<';
            font-size: 24px;
            color: #000;
        }

        .nav-button.next::before {
            content: '>';
            font-size: 24px;
            color: #000;
        }

        .page-info {
            font-size: 16px;
            color: #666;
        }

                /* 메뉴 영역 */
                .visual-menu {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        z-index: 1;
        }

        .menu-item {
        flex: 1;
        max-width: 200px;
        border-right: 1px solid rgba(255,255,255,0.2);
        background: rgba(255,255,255,0.1);
        transition: all 0.3s;
        }

        .menu-item:last-child {
        border-right: none;
        }

        .menu-item a {
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s;
        }

        .menu-item:hover {
        background: #fff;
        }

        .menu-item:hover a {
        color: #000;
        }

        .menu-item.active {
        background: #fff;
        }

        .menu-item.active a {
        color: #000;
        }

        .menu-item a span {
        line-height: 1.4;
        }

        /* 콘텐츠 영역 */
        .company-content {
        max-width: 1200px;
        margin: 100px auto;
        padding: 0 20px;
        text-align: center;
        }

        .content-title {
        text-align: center;
        margin-bottom: 60px;
        }

        .content-title h2 {
        font-size: 42px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        margin-bottom: 15px;
        }

        .content-title p {
        font-size: 16px;
        color: #666;
        }

        .ceo-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
            display: flex;
            gap: 60px;
            align-items: flex-start;
        }

        .ceo-image {
            flex: 1;
            position: relative;
        }

        .ceo-image img {
            width: 100%;
            height: auto;
        }

        .ceo-text {
            flex: 1;
        }

        .ceo-title {
            margin-bottom: 50px;
        }

        .ceo-title h2 {
            font-size: 38px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .ceo-title p {
            font-size: 18px;
            color: #666;
        }

        .eng-title {
            font-size: 36px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin: 30px 0;
        }

        .greeting {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.8;
            word-break: keep-all;
        }

        .greeting strong {
            color: #333;
        }

        .signature {
            margin-top: 30px;
            text-align: left;
            font-family: 'Montserrat', sans-serif;
        }

        .signature p {
            font-size: 13px;
            margin-bottom: 10px;
        }

        .history-content {
           max-width: 1200px;
           margin: 100px auto;
           padding: 0 20px;
       }

       .history-title {
           text-align: center;
           margin-bottom: 100px;
       }

       .history-title h2 {
           font-size: 42px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           margin-bottom: 15px;
       }

       .history-title p {
           font-size: 16px;
           color: #666;
           word-break: keep-all;
       }

       .timeline-section {
           position: relative;
           max-width: 800px;
           margin: 0 auto;
           padding: 0 20px;
       }

       .timeline-section::after {
           content: '';
           position: absolute;
           left: 30px;
           top: 0;
           bottom: 0;
           width: 1px;
           background: #ddd;
       }

       .year-wrap {
           position: relative;
           margin-bottom: 100px;
           padding-left: 60px;
       }

       .year-wrap::before {
           content: '';
           position: absolute;
           left: 27px;
           top: 15px;
           width: 6px;
           height: 6px;
           background: #000;
           border-radius: 50%;
           z-index: 1;
       }

       .year-wrap::after {
           content: '';
           position: absolute;
           left: 25px;
           top: 13px;
           width: 10px;
           height: 10px;
           border-radius: 50%;
           border: 1px solid #000;
       }

       .year {
           font-size: 28px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           margin-bottom: 50px;
           position: absolute;
           left: -30px;
           top: 0;
       }

       .history-list {
           width: 100%;
           max-width: 600px;
       }

       .history-item {
           margin-bottom: 30px;
           width: 100%;
           text-align: left;
       }

       .history-date {
           font-family: 'Montserrat', sans-serif;
           font-size: 14px;
           font-weight: bold;
           margin-bottom: 10px;
       }

       .history-desc {
           color: #666;
           line-height: 1.6;
           font-size: 14px;
       }
       @media (max-width: 768px) {
        .swiper-wrapper {
            display: flex;
            flex-direction: column !important;
            align-items: center;
            transform: none !important;  /* Swiper의 transform 효과 제거 */
        }

        .swiper-slide {
            width: 100% !important;
            margin: 10px 0 !important;
            text-align: center;
        }

        .cert-image img {
            max-width: 80%; /* 이미지 크기 조정 */
            height: auto;
        }

        .cert-title,
        .cert-org {
            font-size: 14px; /* 텍스트 크기 조정 */
        }
        .page-navigation {
            display: none;
            /* align-items: center; */
            /* justify-content: center; */
            /* gap: 20px; */
        }
       }

       
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="visual">
       <h2>COMPANY</h2>
       <p>고객사의 꿈과 비전을 함께 이루는 엠앤코스</p>
       <div class="visual-menu">
           <div class="menu-item">
               <a href="../company/about.php"><span>회사소개</span></a>
           </div>
           <div class="menu-item">
               <a href="../company/history.php"><span>연혁</span></a>
           </div>
           <div class="menu-item">
               <a href="../company/ceo.php"><span>CEO<br>인사말</span></a>
           </div>
           <div class="menu-item active">
               <a href="../company/certification.php"><span>인증서</span></a>
           </div>
       </div>
   </div>

    <div class="history-content">
    <div class="history-title">
    <h2>Certification</h2>
    <p>우수성을 향한 끊임없는 노력과 고객을 위한 최고의 제품을 만들기 위한 지속적인 추구</p>
    </div>

    <div class="certification-content">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="cert-image">
                        <img src="../images/company/cert1.jpg" alt="연구개발전담부서 인정서">
                    </div>
                    <div class="cert-title">연구개발전담부서 인정서</div>
                    <div class="cert-org">한국산업기술진흥협회</div>
                </div>
                <div class="swiper-slide">
                    <div class="cert-image">
                        <img src="../images/company/cert2.jpg" alt="ISO 9001:2015">
                    </div>
                    <div class="cert-title">ISO 9001:2015</div>
                    <div class="cert-org">NTREE</div>
                </div>
                <div class="swiper-slide">
                    <div class="cert-image">
                        <img src="../images/company/cert3.jpg" alt="ISO 14001:2015">
                    </div>
                    <div class="cert-title">ISO 14001:2015</div>
                    <div class="cert-org">NTREE</div>
                </div>
                <div class="swiper-slide">
                    <div class="cert-image">
                        <img src="../images/company/cert1.jpg" alt="중소기업 확인서">
                    </div>
                    <div class="cert-title">중소기업 확인서</div>
                    <div class="cert-org">중소벤처기업부</div>
                </div>
            </div>
        </div>
        <div class="page-navigation">
            <button class="nav-button prev" id="prevBtn"></button>
            <div class="page-info">
                <span class="current">01</span> / <span class="total">05</span>
            </div>
            <button class="nav-button next" id="nextBtn"></button>
        </div>
    </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper('.swiper', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.nav-button.next',
            prevEl: '.nav-button.prev',
        },
        on: {
            slideChange: function () {
                document.querySelector('.current').textContent = 
                    String(this.realIndex + 1).padStart(2, '0');
            }
        }
    });
    </script>