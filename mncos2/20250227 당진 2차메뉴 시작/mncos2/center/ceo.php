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
    <title>CEO 인사말 - M&COS</title>
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
            font-size: 32px;
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
        font-size: 36px;
    }

    .ceo-content {
        gap: 30px;
    }

    .ceo-title h2 {
        font-size: 28px;
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
        text-align: center;
    }

    .history-content {
        margin: 60px auto;
    }

    .history-title h2 {
        font-size: 32px;
    }

    .history-title p {
        font-size: 14px;
        padding: 0 20px;
    }

    .ceo-content {
        flex-direction: column;
        padding: 0 20px;
        margin: 40px auto;
    }

    .ceo-text {
        flex: none;
        width: 100%;
    }

    .ceo-title {
        margin-bottom: 30px;
        text-align: center;
    }

    .eng-title {
        font-size: 28px;
        margin: 20px 0;
        text-align: center;
    }

    .greeting {
        font-size: 14px;
        margin-bottom: 15px;
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

    .menu-item a br {
        display: none;
    }

    .history-content {
        margin: 40px auto;
    }

    .history-title {
        margin-bottom: 30px;
    }

    .history-title h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .ceo-content {
        padding: 0 15px;
    }

    .ceo-title h2 {
        font-size: 24px;
    }

    .greeting {
        font-size: 13px;
        line-height: 1.6;
    }

    .signature {
        margin-top: 20px;
    }

    .signature p {
        font-size: 12px;
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

    .ceo-title h2 {
        font-size: 22px;
    }

    .greeting {
        font-size: 12px;
    }
}
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="visual">
       <h2>인사말</h2>
       <p>당진</p>
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
           <h2>CEO 인사말</h2>
           <p>고객사의 꿈과 비전을 함께 이루는 엠앤코스</p>
       </div>

    <div class="ceo-content">
        <div class="ceo-image">
            <img src="../images/company/company_ceo.jpg" alt="CEO">
        </div>
        <div class="ceo-text">
            <div class="ceo-title">
                <h2>TO LEAD<br>COSMETICS</h2>
            </div>
            <p class="greeting">안녕하세요, 엠앤코스의 CEO 문 자 입니다.</p>
            <p class="greeting">
                저희, 저희 엠앤코스를 사랑해주시고 아껴주시는 모든 고객 여러분께 진심으로 감사의 말씀을 드립니다. 저희 회사는 항상 아껴준 고객 여러분의 신뢰와 성원 덕분에 꾸준히 성장해왔습니다.
            </p>
            <p class="greeting">
                엠앤코스는 항상 최고의 품질과 혁신이야말로 가치를 증식으로 음차이고 있습니다. 우리의 목표는 단순히 제품을 만드는 것이 아니라, 고객의 삶에 긍정적인 변화를 가져다주는 것입니다. 이를 위해 우리는 최첨단 기술과 엄격한 품질 관리, 그리고 지속 가능한 정당을 통해 최고의 개발을 실천하고 있습니다.
            </p>
            <p class="greeting">
                회사와 사업은 끊임없이 변화하고 있습니다. 이러한 변화 속에서 지원되는 고객의 목소리에 귀 기울이며, 트렌드를 선도하고자 새로운 기술을 개선하기 위해 부단한이 노력하고 있습니다. 저희 계발이 고객 여러분의 여음디즘과 저는달을 높이는 데 기여할 수 있다면, 그것이 비로 지원의 가장 큰 보람입니다.
            </p>
            <p class="greeting">
                또한, 저희 엠앤코스는 사회적 책임을 다하는 기업으로서, 환경 보호와 사회 공헌 활동에도 적극적으로 참여하고 있습니다. 친환경 제품 개발과 지속 가능한 경영 방식을 통해 더나은 세상을 만들기 위한 노력도 게을리하지 않겠습니다.
            </p>
            <p class="greeting">
                앞으로도 저희 엠앤코스는 고객 여러분과 함께 성장하며, 항상 신뢰할 수 있는 파트너가 되기 위해 최선을 다할 것을 약속드립니다. 여러분의 지속적인 관심과 응원 부탁드립니다.
            </p>
            <p class="greeting">감사합니다.</p>
            <div class="signature">
                <p>CEO 문 자 림</p>
            </div>
        </div>
    </div>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>