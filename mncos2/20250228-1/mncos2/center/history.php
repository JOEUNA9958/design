<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>연혁</title>
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
       /*연혁*/
        #timeline {
            margin: 20px;
        }

        .event {
            background-color: #fff;
            border-left: 5px solid #01875F;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .event h2 {
            margin: 0;
            font-size: 1.5em;
        }
       
       /* 반응형 스타일 */
@media (max-width: 1200px) {

}

@media (max-width: 991px) {

}

@media (max-width: 768px) {
 
  
}

@media (max-width: 480px) {

}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {

}




</style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <?php include '../inc/cursor.php'; ?>

   <div class="visual">
       <h2>연혁</h2>
       <p>당진</p>
       <div class="visual-menu">
           <div class="menu-item">
               <a href="/mncos2/center/ceo.php"><span>인사말</span></a>
           </div>
           <div class="menu-item  active">
               <a href="/mncos2/center/history.php"><span>연혁</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/about.php"><span>운영체계</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/about02.php"><span>주요추진사업</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/law.php"><span>법률상담</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/view.php"><span>센터둘러보기</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/sponsor.php"><span>후원안내</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/map.php"><span>오시는 길</span></a>
            </div>
       </div>
    </div>

    <div class="history-content">
        <div class="history-title">
            <h2>HISTORY</h2>
            <p>우수성을 향한 끊임없는 노력과 고객을 위한 최고의 제품을 만들기 위한 지속적인 추구</p>
        </div>
    </div>
    <div id="timeline">
        <div class="event">
            <h2>2022년 3월 1일</h2>
            <p>법무부 보호관찰위원 위촉</p>
        </div>
        <div class="event">
            <h2>2022년 10월 20일</h2>
            <p>대전보호관찰소 서산지소 수강이수 집행 협력기관 협약</p>
        </div>
        <div class="event">
            <h2>2024년 4월 1일</h2>
            <p>당진시노인장기요양기관 연합회 업무협약</p>
        </div>
    </div>



   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
       AOS.init({
           duration: 1000,
           once: true,
           offset: 200
       });
   </script>

<?php include '../inc/footer.php'; ?>
</body>
</html>