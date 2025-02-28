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

       /* 반응형 스타일 */
@media (max-width: 1200px) {
    .history-content {
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .history-title {
        margin-bottom: 60px;
    }

    .history-title h2 {
        font-size: 36px;
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
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    .history-content {
        margin: 60px auto;
        padding: 0 20px;
    }

    .history-title h2 {
        font-size: 32px;
    }

    .history-title p {
        font-size: 14px;
        padding: 0 20px;
    }

    .timeline-section {
        padding: 0;
    }

    .year {
        font-size: 24px;
        left: -20px;
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
        padding: 0 15px;
    }

    .visual-menu {
        flex-wrap: wrap;
    }

    .menu-item {
        width: 50%;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .menu-item:nth-child(2n) {
        border-right: none;
    }

    .history-content {
        margin: 40px auto;
    }

    .history-title {
        margin-bottom: 40px;
    }

    .history-title h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .year-wrap {
        padding-left: 40px;
        margin-bottom: 60px;
    }

    .timeline-section::after {
        left: 20px;
    }

    .year-wrap::before {
        left: 17px;
    }

    .year-wrap::after {
        left: 15px;
    }

    .history-item {
        margin-bottom: 20px;
    }

    .history-date {
        font-size: 13px;
    }

    .history-desc {
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
        padding: 0 5px;
    }

    .history-title h2 {
        font-size: 24px;
    }

    .year {
        font-size: 20px;
    }

    .year-wrap {
        padding-left: 35px;
    }

    .history-date {
        font-size: 12px;
    }

    .history-desc {
        font-size: 12px;
    }
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

<div class="history-content">
       <div class="history-title">
           <h2>HISTORY</h2>
           <p>우수성을 향한 끊임없는 노력과 고객을 위한 최고의 제품을 만들기 위한 지속적인 추구</p>
       </div>
       
<div class="timeline-wrap">
<div class="history-content">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 600">
  <!-- Vertical Line -->
  <line x1="500" y1="0" x2="500" y2="600" stroke="#ddd" stroke-width="1"/>
  
  <!-- Double Circle at the top -->
  <circle cx="500" cy="50" r="3" fill="#000"/>
  <circle cx="500" cy="50" r="5" fill="none" stroke="#000" stroke-width="1"/>
  
  <!-- Timeline Events -->
  <g transform="translate(0, 20)">
    <!-- 2024 -->
    <text x="450" y="40" text-anchor="end" font-family="sans-serif" font-size="30" font-weight="bold">2024</text>
    
    <!-- 2024.09 -->
    <text x="450" y="140" text-anchor="end" font-family="sans-serif" font-size="16" font-weight="bold">2024.09</text>
    <text x="450" y="170" text-anchor="end" font-family="sans-serif" font-size="14">탈모기능성 카페인 주정물 허가 (삼푸,엠플,토닉트리트먼트 등)</text>
    
    <!-- 2024.08 -->
    <text x="450" y="240" text-anchor="end" font-family="sans-serif" font-size="16" font-weight="bold">2024.08</text>
    <text x="450" y="270" text-anchor="end" font-family="sans-serif" font-size="14">원산지인증수출자 인증</text>
    
    <!-- 2024.08 -->
    <text x="450" y="340" text-anchor="end" font-family="sans-serif" font-size="16" font-weight="bold">2024.08</text>
    <text x="450" y="370" text-anchor="end" font-family="sans-serif" font-size="14">썬크림 spf50 pa++++ 허가</text>
    
    <!-- 2024.04 -->
    <text x="450" y="440" text-anchor="end" font-family="sans-serif" font-size="16" font-weight="bold">2024.04</text>
    <text x="450" y="470" text-anchor="end" font-family="sans-serif" font-size="14">에어로졸 (주름 및 미백 기능성 허가)</text>
    
    <!-- 2024.03 -->
    <text x="450" y="540" text-anchor="end" font-family="sans-serif" font-size="16" font-weight="bold">2024.03</text>
    <text x="450" y="570" text-anchor="end" font-family="sans-serif" font-size="14">미국 MOCRA 공장 등록</text>
  </g>
</svg>
</div>
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