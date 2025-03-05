<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- Fonts -->
    <link rel="preconnect" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>인사말</title>
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
        font-size: 45px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        margin-bottom: 15px;
        }

        .content-title p {
        font-size: 16px;
        color: #666;
        }

        /**** 서브페이지 시작 ****/
        .ceo-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
            display: flex;
            gap: 60px;
            align-items: flex-start;
        }

       .history-title {
           text-align: center;
           margin-bottom: 100px;
       }
       .history-title h2 { /* 인사말 */ 
           font-size: 45px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           margin-bottom: 15px;
           color: #1d1d1d;
           margin: 100px 0 15px 0  ; /*********100px******** */
       }
       .ceo-content .ceo-image {
        width: auto;
        height: auto;
        }
       .history-title p { /* 저희홈페이지를*/
           font-size: 17px;
           color: #3d3d3d;
           word-break: keep-all;
           line-height: 1.4;
       }
       .ceo-content .ceo-text {
           font-size: 17px;
           color: #3d3d3d;
           line-height: 1.4;
       }

/* 반응형 스타일 */
@media (max-width: 1200px) {
    .ceo-content {
        gap: 40px;
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .history-title {
        margin-bottom: 60px;
    }

    .history-title h2 {
        font-size: 35px;
    }

    .ceo-content {
        gap: 30px;
    }

    .ceo-title h2 {
        font-size: 28px;
    }
    .ceo-content .ceo-text {
        font-size: 17px;
        color: #3d3d3d;
        line-height: 1.4;
    }
}

/*모바일 시작 */
@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .visual h2 {
        font-size: 25px;
    }

    .visual p {
        font-size: 13px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
        text-align: center;
    }

        /**** 서브페이지 시작 ****/
        .ceo-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
            display: block;
            gap: 30px;
        }

       .history-title {
           text-align: center;
           margin-bottom: 100px;
       }
       .history-title h2 { /* 인사말 */ 
           font-size: 25px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           margin-bottom: 15px;
           color: #1d1d1d;
           margin: 50px 0 5px 0  ; /*********100px******** */
       }
       .ceo-content .ceo-image {
        width: auto;
        height: auto;
        }
       .history-title p { /* 저희홈페이지를*/
           font-size: 13px;
           color: #3d3d3d;
           word-break: keep-all;
           line-height: 1.4;
       }
       .ceo-content .ceo-text {
        font-size: 13px;
        color: #3d3d3d;
        line-height: 1.4;
        margin: 20px 0 0 0;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual h2 {
        font-size: 25px;
    }

    .menu-item a {
        font-size: 13px;
        padding: 0 5px;
    }

    .history-title h2 {
        font-size: 20px;
    }
    .ceo-content .ceo-image {
        width: auto;
        height: auto;
    }
    .ceo-title h2 {
        font-size: 20px;
    }
    .ceo-content .ceo-text {
        font-size: 13px;
        color: #3d3d3d;
        line-height: 1.4;
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
           <div class="menu-item  active">
               <a href="/mncos2/center/ceo.php"><span>인사말</span></a>
           </div>
           <div class="menu-item">
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
           <h2>인사말</h2>
           <p></p>
       </div>

    <div class="ceo-content">
        <div class="ceo-image">
            <img src="../images/company/company_ceo.jpg" alt="인사말">
        </div>
        <div class="ceo-text">
            <p class="greeting">안녕하세요, 당진가족성통합상담센터입니다.</p>
            <p class="greeting">
                당진가족성통합상담센터는 부부상담, 트라우마치료, 가족상담을 전문적이고 차별화된 상담을 진행하고 있습니다. 
            </p>
            <p class="greeting">
                우리가 삶을 살아가는데 가장 중요한 것은 자신이 이 세상에 태어나서 살만한 가치와 권리가 있다고 믿는 것이 아닐까요? 이러한 믿음이 없는 사람들은 세상이 나를 받아들이지 않는다고 믿거나 세상이 믿을 만한 곳이 못된다고 믿거나 세상이 너무 두려워서 살아갈 자신이 없다고 믿게 됩니다.
            </p>
            <p class="greeting">
                오늘도 수많은 사람들이 갈등 해결을 위해 전문가의 도움을 요청하고 있습니다. 우리를 괴롭고 힘들게 하는 것은 무엇일까요? 그것은 삶의 조건과 상황이 아니라 자기 자신이 진정 누구인지 모른다는 사실입니다. 자신이 누구와도 비교할 수 없을 만큼 소중하고 가치 있는 존재라는 사실을 알고 있다면 상황이 어려워도 우리의 삶은 살아볼 만한 것이 되지 않을까요?

            </p>
            <p class="greeting">감사합니다.</p>
            <div class="signature">
                <p></p>
            </div>
        </div>
    </div>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>