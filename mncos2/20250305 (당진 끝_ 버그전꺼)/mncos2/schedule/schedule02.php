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
    <title>000</title>
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

        /**** 서브페이지 시작 ****/
        .ceo-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
            display: block;
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
       .history-title p { /* 저희홈페이지를*/
           font-size: 17px;
           color: #3d3d3d;
           word-break: keep-all;
           line-height: 1.4;
       }
       .ceo-content .ceo-text strong {
           display: block;
           font-size: 25px;
           font-weight: 700;
           line-height: 1.2;
           color: #1d1d1d;
           line-height: 1.2;
       }
       .ceo-content .ceo-text p {
        color: #3d3d3d;
        font-size: 17px;
        font-weight: 400;
        line-height: 1.4;
        padding: 10px 0 50px 0;
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
    .ceo-content .ceo-text strong {
           display: block;
           font-size: 25px;
           font-weight: 700;
           line-height: 1.2;
           color: #1d1d1d;
           line-height: 1.2;
       }
       .ceo-content .ceo-text p {
        color: #3d3d3d;
        font-size: 17px;
        font-weight: 400;
        line-height: 1.4;
       }
}

/*모바일 시작 */
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
       .history-title p { /* 저희홈페이지를*/
           font-size: 13px;
           color: #3d3d3d;
           word-break: keep-all;
           line-height: 1.4;
       }

       .ceo-content .ceo-text strong {
           display: block;
           font-size: 20px;
           font-weight: 700;
           line-height: 1.2;
           color: #1d1d1d;
           line-height: 1.2;
       }
       .ceo-content .ceo-text p {
        color: #3d3d3d;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.4;
        padding: 5px 0 30px 0;
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
    .ceo-content .ceo-text strong {
           display: block;
           font-size: 15px;
           font-weight: 700;
           line-height: 1.2;
           color: #1d1d1d;
           line-height: 1.2;
       }
       .ceo-content .ceo-text p {
        color: #3d3d3d;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.4;
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
            <div class="menu-item ">
                <a href="/mncos2/schedule/schedule01.php">가정폭력·성폭력전문상담원</a>
            </div>
            <div class="menu-item active">
                <a href="/mncos2/schedule/schedule02.php">상담자격증과정</a>
            </div>
            <div class="menu-item ">
                <a href="/mncos2/schedule/schedule03.php">성희롱인식개선교육</a>
            </div>
        </div>
    </div>

    <div class="history-content">
       <div class="history-title">
           <h2>상담자격증과정</h2>
           <p>미술심리치료사 과정, 가족상담사과정, 놀이치료사과정, 모래놀이치료사과정, 심리상담사과정</p>
       </div>

    <div class="ceo-content">
        <div class="ceo-text">
            <strong>미술심리치료사 과정</strong>
            <p class="greeting">
            강좌개요 : 사람의 정서적·사회적·정신적 부적응 문제를 치료하고자 하는 임상 상담의 한 분야로써 미술 활동을 통해 상징적으로 전달되는 내담자의 심리를 진단하여 심리치료에 활용하는 기법과 방법에 대해 학습하는 강좌입니다.<br>
            학습목표 : 인간의 표현·창작 활동 중에서 접할 수 있는 미술 활동을 매개로 심리치료에 활용하는 이론과 기법에 대해 학습하여 내담자의 심리를 이해하고 내담자에게 적절한 신체적 에너지를 발산하도록 하여 갈등 해소와 치료를 돕는 데 있습니다.
            </p>
        </div>
        <div class="ceo-text">
            <strong>가족상담사과정</strong>
            <p class="greeting">
            강좌개요 : 역기능적인 가족 간의 상황에서 어려움을 호소하는 가족의 역동성을 다양한 치료기법에 준하여 신속하게 파악하고 이들 가족의 역기능적인 상호작용 패턴을 강화하는 요인이 무엇인가를 찾아 그에 따른 적절한 치료기법의 활용으로 변화를 촉진하며, 가족 문제에 대한 각 구성원의 통찰을 도와 관계상의 어려움을 극복하게 함으로써 상실된 가족기능을 회복할 수 있도록 도움을 줄 수 있는 과정입니다.<br>
            학습목표: 가족치료에 있어서 치료자는 문제행동이란 개인만의 문제로 보지 않고 개인을 둘러싼 가족이라는 맥락 속에서 이해하고, 가족을 치료의 매개체로 활용하여 개인적인 결함모형에서 관계와 관계 사이의 역기능을 파악하여 대인관계적인 모형으로 개념을 변화시켜 내담자의 갈등 해소와 치료를 목표로 하는 데 있습니다.
        </div>
        <div class="ceo-text">
            <strong>놀이치료사과정</strong>
            <p class="greeting">
            놀이심리상담사란? : 놀이심리상담에 관한 전문적인 지식을 터득하고 놀이심리상담사의 종합적인 교육과정을 수행할 수 있으며, 놀이 매체를 통해서 심층적으로 내담자의 심리, 정서를 자유롭게 표현하도록 돕고 이를 통해 내담자의 의식의 전환을 촉진하여 심리·정서적 안정을 돕는 역할을 수행하는 전문가를 말합니다.<br>
            학습목표 : 놀이심리상담사 과정은 놀이가 지닌 치료적 힘을 활용하여 유아, 아동들이 겪는 심리적 부적응이나 발달적 어려움의 원인을 찾아내고 치료할 수 있도록 하는 전문가를 양성하는 과정입니다.<br>
            본과정은 놀이치료의 이론과 함께 현장에서 활용 가능한 다양한 기법, 놀이치료의 과정은 상세하게 설명하므로 현장에 나가서 치료사로 활동하기에 부족함이 없도록 구성하였습니다. 본 과정을 통하여 이론과 기법, 철학이 준비된 전문가로 준비될 수 있습니다.
        </div>
        <div class="ceo-text">
            <strong>모래놀이치료사과정</strong>
            <p class="greeting">
            모래놀이치료사란? : 모래놀이치료는 영국의 아동심리치료자인 MAGARET LOWENFELD가 자녀들과 마룻바닥에서 장난감을 놓고 놀이하는 모습을 보고 놀이치료의 한 형태로 시작한 심리치료 방법입니다.<br>
            아동의 놀이는 정서적, 사회적, 학습적인 의미를 가지고 언어와 인지에도 영향을 미친다고 보아 아동의 사고는 어른과 달리 감정, 감각, 관념, 기억 등이 얽혀있어 감각적인 기법이 필요하다고 보았습니다.<br>
            -모래놀이 치료는 모래 상자와 다양한 소품들을 가지고 내담자가 모래 상자를 꾸미거나 소품을 가져다 놓으면서 놀이 형식으로 진행하는 놀이치료의 한 방법입니다.<br>
            학습목표 : 모래놀이 상담 활동을 위한 이론과 지식 습득을 통해 심리적 문제가 발생한 내담자를 상담 및 지도하고, 모래놀이 상담 이론에 대한 이해를 통해 일상생활에서 스트레스를 받는 내담자를 지도 및 상담합니다.
        </div>
        <div class="ceo-text">
            <strong>심리상담사과정</strong>
            <p class="greeting">
            심리상담사란? : 심리상담사란 유아, 아동 및 청소년, 가정, 노인 등 사회에서 여러 가지 갈등과 문제로 인해 고통받는 사람들을 대상으로 심리학적 방법을 활용하여 치료해 줌으로써 건강하고 바른 생활을 할 수 있도록 돕는 업무를 담당하는 심리 상담 전문가를 말합니다.<br>
            학습목표 ; 상담의 이론과 실제를 겸비하여 성숙한 인간으로서의 자기와 전문적 상담사로 성장할 수 있도록 돕고, 상담사로서의 직무능력배양, 상담기법과 기술의 활용 방법 및 습득, 상담의 주요이론 습득을 통한 실전 능력 향상, 건강하고 성숙한 상담사로 성장할 수 있도록 양성하는 상담 전문가 과정입니다.
        </div>
    </div>


    <?php include '../inc/footer.php'; ?>
</body>
</html>