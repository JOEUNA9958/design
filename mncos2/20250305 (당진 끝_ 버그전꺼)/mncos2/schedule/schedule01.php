<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부부상담</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <link rel="preconnect" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        /* 기본 리셋 */
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
        overflow-x: hidden;
        }

        /* 비주얼 영역 */
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
        max-width: 400px;
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

        .works-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .works-title {
            text-align: center;
            margin-bottom: 80px;
        }

        .works-title h2 {
            font-size: 48px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .works-title p {
            font-size: 18px;
            color: #666;
        }

        .business-image {
            width: 100%;
            height: 600px;
            margin-bottom: 50px;
        }

        .business-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .business-info {
            text-align: center;
        }

        .business-info h3 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .business-category {
            font-size: 15px;
            color: #666;
            margin-bottom: 40px;
            word-break: keep-all;
            line-height: 1.6;
        }

        .business-desc {
            font-size: 15px;
            color: #666;
            line-height: 1.8;
            word-break: keep-all;
            margin-bottom: 50px;
        }

        .page-navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-top: 60px;
        }

        .nav-button {
            font-size: 24px;
            color: #666;
            background: none;
            border: none;
            cursor: pointer;
        }

        .page-info {
            font-size: 16px;
            color: #666;
        }

        /* 사이드바 */
        .side-menu {
            position: fixed;
            right: 30px;
            bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .side-button {
            width: 50px;
            height: 50px;
            background: #009FE3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .side-button:hover {
            background: #0085BE;
        }

        .swiper {
            width: 100%;
            margin-bottom: 50px;
        }

        .swiper-slide img {
            width: 100%;
            height: 75%;
            object-fit: cover;
        }

        .business-content {
            text-align: center;
            margin: 40px auto;
            max-width: 800px;
        }

        .page-navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .nav-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #666;
        }

        .page-info {
            font-size: 16px;
            color: #666;
        }

        /* 반응형 스타일 */
@media (max-width: 1200px) {
    .works-content {
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .works-title h2 {
        font-size: 36px;
    }

    .works-title p {
        font-size: 16px;
    }

    .business-content h3 {
        font-size: 32px;
    }
    
    .swiper {
        margin-bottom: 30px;
        text-align: center;
    }

    .swiper-slide img {
        width: auto;
        height: auto;
    }
    
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .visual h2 {
        font-size: 36px;
    }

    .visual p {
        font-size: 16px;
        padding: 0 20px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    .works-content {
        margin: 60px auto;
        padding: 0 20px;
    }

    .works-title {
        margin-bottom: 40px;
    }

    .works-title h2 {
        font-size: 32px;
        margin-bottom: 15px;
    }

    .works-title p {
        font-size: 15px;
        padding: 0 20px;
    }

    .swiper {
        margin-bottom: 30px;
        text-align: center;
    }

    .swiper-slide img {
        width: auto;
        height: auto;
    }

    .business-content {
        padding: 0 15px;
    }

    .business-content h3 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .business-category {
        font-size: 14px;
        margin-bottom: 30px;
    }

    .business-desc {
        font-size: 14px;
        margin-bottom: 40px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 300px;
    }

    .visual h2 {
        font-size: 32px;
    }

    .visual p {
        font-size: 14px;
    }

    .visual-menu {
        flex-wrap: wrap;
    }

    .menu-item {
        width: 100%;
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .works-title h2 {
        font-size: 28px;
    }

    .works-title p {
        font-size: 14px;
    }

    .swiper-slide img {
        height: 250px;
    }

    .business-content h3 {
        font-size: 15px;
    }

    .business-category,
    .business-desc {
        font-size: 13px;
    }

    .page-navigation {
        gap: 15px;
    }

    .nav-button {
        font-size: 20px;
    }

    .page-info {
        font-size: 13px;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual h2 {
        font-size: 28px;
    }

    .menu-item a {
        font-size: 13px;
    }

    .works-title h2 {
        font-size: 15px;
    }

    .swiper-slide img {
        height: 200px;
    }

    .business-content h3 {
        font-size: 15px;
    }

    .business-category,
    .business-desc {
        font-size: 12px;
    }

    .nav-button {
        font-size: 18px;
    }

    .page-info {
        font-size: 13px;
    }
    
}
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="visual">
        <h2>프로그램</h2>
        <p></p>
        <div class="visual-menu">
            <div class="menu-item active">
                <a href="/mncos2/schedule/schedule01.php">가정폭력·성폭력전문상담원</a>
            </div>
            <div class="menu-item ">
                <a href="/mncos2/schedule/schedule02.php">상담자격증과정</a>
            </div>
            <div class="menu-item ">
                <a href="/mncos2/schedule/schedule03.php">성희롱인식개선교육</a>
            </div>
        </div>
    </div>

    <div class="works-content">
        <div class="works-title">
            <h2>가정폭력, 성폭력전문 상담원 </h2>
        </div>

        <!-- Swiper -->
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/mncos2/images/works/schedule01-img01.jpg" alt="가정폭력 전문상담원">
                </div>
                <div class="swiper-slide">
                    <img src="/mncos2/images/works/schedule01-img02.jpg" alt="성폭력 전문 상담원 양성교육">
                </div>
            </div>
        </div>

        <div class="business-content">
            <h3>가정폭력 전문상담원, 성폭력 전문 상담원 양성교육</h3>
        </div>

        <div class="page-navigation">
            <button class="nav-button prev">&lt;</button>
            <div class="page-info">
                <span class="current">02</span> / <span class="total">02</span>
            </div>
            <button class="nav-button next">&gt;</button>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.nav-button.next',
                prevEl: '.nav-button.prev',
            },
            on: {
                slideChange: function () {
                    const currentSlide = this.realIndex + 1;
                    document.querySelector('.current').textContent = 
                        String(currentSlide).padStart(2, '0');
                }
            }
        });

        // 총 슬라이드 수 표시
        document.querySelector('.total').textContent = 
            String(swiper.slides.length - 2).padStart(2, '0'); // loop 모드로 인한 보정
    </script>
</body>
</html>