<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>찾아오시는 길 - M&COS</title>
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>CONTACT</h2>
        <p>창상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item active">
                <a href="./map.php">찾아오시는 길</a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="./inquiry.php">문의하기</a>
            </div>
        </div>
    </div>

    <div class="contact-map-content">
        <div class="contact-map-title">
            <h2>WE ARE HERE</h2>
            <p>엠앤코스 찾아오시는 길</p>
        </div>

        <div class="contact-map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9661728346956!2d126.70123231531301!3d37.45012797981966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b7c1f1f0f0f0f%3A0x1f1f1f1f1f1f1f1f!2z7JWE7YGs7L2U7Iqk!5e0!3m2!1sko!2skr!4v1621234567890!5m2!1sko!2skr">
            </iframe>
        </div>

        <div class="contact-map-info">
            <div class="contact-map-address">
                <p class="ko">인천광역시 남동구 남동서로 268, 2층</p>
                <p class="en">2F, 268, Namdongseo-ro, Namdong-gu, Incheon, Republic of Korea (21631)</p>
            </div>
            <div class="contact-map-subway">
                <p><span class="station">인천 1호선</span> 신연수역 2번출구 도보 10분거리 (약 800m)</p>
            </div>
            <div class="contact-map-details">
                <p>
                    <span>TEL : +82)32-715-6318</span>
                    <span>FAX : +82)32-715-6319</span>  
                    <span>MAIL : mncos@naver.com</span>
                </p>
                <p class="time">09:00 ~ 18:00 (점심 12:30 ~ 13:30) 토, 일, 공휴일 휴무</p>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // 헤더 스크롤 효과
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 0) {
                header.classList.add('white');
            } else {
                header.classList.remove('white');
            }
        });

        AOS.init({
            duration: 1000,
            once: false,
            disable: 'mobile'
        });
    </script>
</body>
</html>