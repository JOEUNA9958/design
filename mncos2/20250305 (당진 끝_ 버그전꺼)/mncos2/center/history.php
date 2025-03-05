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

/*******************/  
 /* 연혁 페이지 스타일 */
.company-history-content {
    max-width: 1200px;
    margin: 100px auto;
    padding: 0 20px;
}

.company-history-title {
    text-align: center;
    margin-bottom: 100px;
}

.company-history-title h2 {
    font-size: 42px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    margin-bottom: 15px;
}

.company-history-title p {
    font-size: 16px;
    color: #666;
    word-break: keep-all;
}

.company-history-timeline {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
}

.company-history-timeline-section {
    position: relative;
}

.company-history-timeline-section::after {
    content: '';
    position: absolute;
    left: 30px;
    top: 0;
    bottom: 0;
    width: 1px;
    background: #ddd;
}

.company-history-year-wrap {
    position: relative;
    margin-bottom: 100px;
    padding-left: 60px;
}

.company-history-year-wrap::before {
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

.company-history-year-wrap::after {
    content: '';
    position: absolute;
    left: 24px;
    top: 12px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 1px solid #000;
}

.company-history-year {
    color: #1d1d1d;
    font-size: 25px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    margin-bottom: 50px;
    position: absolute;
    left: 22px;
    top: -68px;
}

.company-history-list {
    width: 100%;
    max-width: 600px;
}

.company-history-item {
    margin-bottom: 30px;
    width: 100%;
    text-align: left;
    color: #3d3d3d;
}

.company-history-date {
    color: #1d1d1d;
    font-size: 20px;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 10px;
}

.company-history-desc {
    color: #666;
    line-height: 1.6;
    font-size: 14px;
}
    
/* 반응형 스타일 */
@media (max-width: 1200px) {
    .company-history-content {
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .company-history-title {
        margin-bottom: 60px;
    }

    .company-history-title h2 {
        font-size: 36px;
    }
}

@media (max-width: 768px) {
    .company-history-content {
        margin: 60px auto;
        padding: 0 20px;
    }

    .company-history-title h2 {
        font-size: 32px;
    }

    .company-history-title p {
        font-size: 14px;
        padding: 0 20px;
    }

    .company-history-timeline {
        padding: 0;
    }

    .company-history-year {
        font-size: 24px;
        left: -2px;
        top: -10%;
    }
    .visual h2 {
        font-size: 25px;
    }

    .visual p {
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .company-history-content {
        margin: 40px auto;
    }

    .company-history-title {
        margin-bottom: 40px;
    }

    .company-history-title h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .company-history-year-wrap {
        padding-left: 40px;
        margin-bottom: 60px;
        margin-top: 25%;
    }

    .company-history-timeline-section::after {
        left: 20px;
    }

    .company-history-year-wrap::before {
        left: 17px;
    }

    .company-history-year-wrap::after {
        left: 15px;
    }

    .company-history-item {
        margin-bottom: 20px;
    }

    .company-history-date {
        font-size: 13px;
    }

    .company-history-desc {
        font-size: 13px;
    }
}

/* 최소 화면 크기 대응 */
@media (max-width: 359px) {
    .company-history-title h2 {
        font-size: 24px;
    }

    .company-history-year {
        font-size: 20px;
    }

    .company-history-year-wrap {
        padding-left: 35px;
    }

    .company-history-date {
        font-size: 12px;
    }

    .company-history-desc {
        font-size: 12px;
    }
}






</style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <?php include '../inc/cursor.php'; ?>

   <div class="visual">
       <h2>센터소개</h2>
       <p>저희 홈페이지를 방문해 주신 여러분을 환영합니다.</p>
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

    <div class="company-history-content">
        <div class="company-history-title">
            <h2>연혁</h2>
        </div>

        <div class="company-history-timeline">
                <div class="company-history-timeline-section">
                    <div class="company-history-year-wrap">
                        <div class="company-history-year">2024년~2024년</div>
                        <div class="company-history-list">
                            <div class="company-history-item">
                                <div class="company-history-date">2004년 9월 22일</div>
                                <div class="company-history-desc">당진가정폭력상담소 설치신고</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2005년 7월 5일</div>
                                <div class="company-history-desc">  대전보호관찰소 홍성지소 ‘특별범죄예방’기관위촉</div>
                            </div>
                             <div class="company-history-item">
                                <div class="company-history-date">2016년 3월 12일</div>
                                <div class="company-history-desc"> 한국예술심리치료교육원 설립</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2017년 10월 18일</div>
                                <div class="company-history-desc"> (사)당진가족성통합상담센터 설립</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2021년 6월</div>
                                <div class="company-history-desc"> 당진시성평등교육원 설립</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2022년 2월</div>
                                <div class="company-history-desc">법무부 대전보호관찰소 수강이수 집행협력기관 인증</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2022년 1월 10일</div>
                                <div class="company-history-desc">대전가정법원 서산지원 가사재판, 가사조정, 협의이혼 상담, 자녀양육 위촉</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2022년 3월 1일</div>
                                <div class="company-history-desc">법무부 보호관찰위원 위촉</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2022년 10월 20일</div>
                                <div class="company-history-desc">대전보호관찰소 서산지소 수강이수 집행 협력기관 협약</div>
                            </div>
                            <div class="company-history-item">
                                <div class="company-history-date">2024년 4월 1일</div>
                                <div class="company-history-desc">당진시노인장기요양기관 연합회 업무협약</div>
                            </div>
                        </div>
                    </div>
                </div>
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