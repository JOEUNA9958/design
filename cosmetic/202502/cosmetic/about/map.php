<!-- ceo.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>오시는 길</title>
<style>
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
        gap: 1px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.1);
        z-index: 1;
        height: 80px;
    }


    .sub_menu a {
        flex: 1;
        text-align: center;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 49 37 / 23%);
        transition: all 0.3s ease;
        font-size: 20px;
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
        background: #003125;
    }

    .story-section1 {
        padding: 100px 0;
        max-width: 1810px;
        margin: 0 auto;
    }

    .location-container {
            width: 100%;
            max-width: 1920px;
            margin: 0 auto;
            position: relative;
            padding-bottom: 150px;
        }

        .location-header {
            width: 100%;
            text-align: center;
            padding: 100px 0 160px;
        }

        .location-subtitle {
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 16px;
            color: #757575;
            margin-bottom: 20px;
        }

        .location-title {
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 37.6562px;
            color: #424242;
            line-height: 64px;
        }

        .location-content {
            display: flex;
            width: 100%;
            max-width: 1920px;
        }

        .info-section {
            width: 700px;
            background: #F5F5F5;
            padding: 60px 40px;
            height: 500px;
            position: relative;
        }

        .info-section::before {
            width: 1px;
            height: 80%;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
        }

        /* 가로선 */
        .info-section::after {
            width: 80%;
            height: 1px;
            left: 10%;
            top: 50%;
            transform: translateY(-50%);
        }

        .info-section::before,
        .info-section::after {
            content: '';
            position: absolute;
            background: #ddd;
        }


        .company-info {
            display: none;
        }

        .company-label {
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 14px;
            color: #757575;
            margin-bottom: 10px;
        }

        .company-name {
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 53.6035px;
            color: #424242;
            line-height: 88px;
        }

        .contact-list {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .contact-item {
            position: absolute;
            width: 45%;
        }

        .item-top-left {
            top: 10%;
            left: 5%;
        }

        .item-top-right {
            top: 10%;
            right: 5%;
        }

        .item-bottom-left {
            bottom: 10%;
            left: 5%;
        }

        .item-bottom-right {
            bottom: 10%;
            right: 5%;
        }

        .contact-icon {
            width: 35px;
            height: auto;
        }

        /* 좌상단 */
        .contact-item:nth-child(1) {
            top: 13%;
            left: 5%;
        }

        /* 우상단 */
        .contact-item:nth-child(2) {
            top: 13%;
            right: -5%;
        }

        /* 좌하단 */
        .contact-item:nth-child(3) {
            bottom: 15%;
            right: 5%;
        }

        /* 우하단 */
        .contact-item:nth-child(4) {
            bottom: 15%;
            right: -5%;
        }

        .contact-content {
            flex: 1;
        }

        .contact-label {
            font-size: 20px;
            font-weight: 600;
            color: #424242;
            /* margin: 5px; */
            text-align: center;
            width: 150px;
            top: 20px;
            margin-top: -30px;
            padding-left: 20px;
        }

        .contact-text {
            font-size: 18px;
            color: #424242;
            line-height: 1.4;
            text-align: left;
            margin-top: 20px;
        }

        .map-section {
            width: 60%;
            position: relative;
            top: -80px;
        }

        .map-container {
            width: 100%;
            height: 100%;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        @media (max-width: 1200px) {
            .location-content {
                flex-direction: column;
            }

            .info-section {
                width: 100%;
                max-width: 100%;
            }
        }
</style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>About Us - 오시는 길</h2>
            <div class="sub_menu">
                <a href="/cosmetic/about/story.php">스토리</a>
                <a href="/cosmetic/about/ceo.php">CEO 인사말</a>
                <a href="/cosmetic/about/certification.php">인증서</a>
                <a href="/cosmetic/about/direct_inquiry.php">문의하기</a>
                <a href="/cosmetic/about/map.php" class="active">오시는 길</a>
            </div>
        </div>
    </div>

    <div class="location-container">
        <div class="location-header">
            <div class="location-subtitle">Location</div>
            <div class="location-title">오시는 길</div>
        </div>
        <div class="company-info">
                    <div class="company-label">D.Kin Cosmetic</div>
                    <div class="company-name">㈜디킨코스메틱</div>
                </div>
        <div class="location-content">
            <div class="info-section">
                
            <div class="contact-list">
            <!-- 왼쪽 상단 -->
            <div class="contact-item item-top-left">
                <img src="../images/about/location_place.png" alt="주소" class="contact-icon">
                <div class="contact-content">
                    <div class="contact-label">주소</div>
                    <div class="contact-text">인천광역시 남동구 능허대로 625번길 152(고잔동)</div>
                </div>
            </div>
            
            <!-- 오른쪽 상단 -->
            <div class="contact-item item-top-right">
                <img src="../images/about/location_call.png" alt="전화" class="contact-icon">
                <div class="contact-content">
                    <div class="contact-label">전화</div>
                    <div class="contact-text">032-123-4567</div>
                </div>
            </div>
            
            <!-- 왼쪽 하단 -->
            <div class="contact-item item-bottom-left">
                <img src="../images/about/location_mail.png" alt="이메일" class="contact-icon">
                <div class="contact-content">
                    <div class="contact-label">이메일</div>
                    <div class="contact-text">dkin@dkincos.com</div>
                </div>
            </div>
            
            <!-- 오른쪽 하단 -->
            <div class="contact-item item-bottom-right">
                <img src="../images/about/location_time.png" alt="영업시간" class="contact-icon">
                <div class="contact-content">
                    <div class="contact-label">영업시간</div>
                    <div class="contact-text">월 - 금 08:30~17:30</div>
                </div>
            </div>
        </div>
            </div>
            
            <div class="map-section">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.350045772222!2d126.69661149999999!3d37.4023435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b7b800000000%3A0x0!2z7J247LKc6rSR7Jet7IucIOuCqOuPmeq1rCDrhKXtjJTrjIDroZwgNjI17Jy166GcIOq4sA!5e0!3m2!1sko!2skr!4v1707110083044!5m2!1sko!2skr"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

<?php include '../inc/footer.php'; ?>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=YOUR_APP_KEY"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    var container = document.getElementById('map');
    var options = {
        center: new kakao.maps.LatLng(37.XXXX, 126.XXXX), // 회사 좌표
        level: 3
    };

    var map = new kakao.maps.Map(container, options);
    
    // 마커 추가
    var markerPosition = new kakao.maps.LatLng(37.XXXX, 126.XXXX);
    var marker = new kakao.maps.Marker({
        position: markerPosition
    });
    marker.setMap(map);
});
</script>
</body>
</html>