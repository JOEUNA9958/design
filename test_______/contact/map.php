<?php include '../inc/header.php'; ?>
<?php include '../inc/cursor.php'; ?>

<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>찾아오시는 길 - M&COS</title>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="preconnect" href="//fonts.googleapis.com"/>
   <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
   <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
   
   <!-- Plugin CSS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <style>
       /* 공통 스타일 */
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

       /* 콘텐츠 영역 */
       .map-content {
           max-width: 1200px;
           margin: 100px auto;
           padding: 0 20px;
       }

       .title {
           text-align: center;
           margin-bottom: 60px;
       }

       .title h2 {
           font-size: 42px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           margin-bottom: 15px;
       }

       .title p {
           font-size: 16px;
           color: #666;
       }

       .map {
           width: 100%;
           height: 500px;
           background: #f5f5f5;
       }

       .info {
           margin-top: 50px;
           text-align: center;
       }

       .address {
           margin-bottom: 20px;
       }

       .address .ko {
           font-size: 18px;
           font-weight: 500;
           margin-bottom: 10px;
       }

       .address .en {
           color: #666;
       }

       .subway {
           margin-bottom: 30px;
       }

       .subway .station {
           display: inline-block;
           padding: 5px 15px;
           background: #0066b3;
           color: #fff;
           border-radius: 20px;
           margin-right: 10px;
       }

       .contact p {
           margin-bottom: 10px;
       }

       .contact span {
           display: inline-block;
           margin: 0 15px;
       }

       .time {
           color: #666;
       }
   </style>
</head>
<body>
   <div class="visual">
       <h2>CONTACT</h2>
       <p>창상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
       <div class="visual-menu">
           <div class="menu-item active">
               <a href="./map.php"><span>찾아오시는 길</span></a>
           </div>
           <div class="menu-item">
               <a href="./inquiry.php"><span>문의하기</span></a>
           </div>
       </div>
   </div>

   <div class="map-content">
       <div class="title">
           <h2>WE ARE HERE</h2>
           <p>엠앤코스 찾아오시는 길</p>
       </div>

       <div class="map">
           <iframe 
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9661728346956!2d126.70123231531301!3d37.45012797981966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b7c1f1f0f0f0f%3A0x1f1f1f1f1f1f1f1f!2z7JWE7YGs7L2U7Iqk!5e0!3m2!1sko!2skr!4v1621234567890!5m2!1sko!2skr" 
               width="100%" 
               height="500" 
               style="border:0;" 
               allowfullscreen=""
               loading="lazy">
           </iframe>
       </div>

       <div class="info">
           <div class="address">
               <p class="ko">인천광역시 남동구 남동서로 268, 2층</p>
               <p class="en">2F, 268, Namdongseo-ro, Namdong-gu, Incheon, Republic of Korea (21631)</p>
           </div>
           <div class="subway">
               <p><span class="station">인천 1호선</span> 신연수역 2번출구 도보 10분거리 (약 800m)</p>
           </div>
           <div class="contact">
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
       AOS.init({
           duration: 1000,
           once: false,
           disable: 'mobile'
       });
   </script>
</body>
</html>