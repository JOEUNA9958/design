<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OEM/ODM - M&COS</title>
    <style>
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
        width: 100vw;
        height: 400px;
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
        height: 80px;
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
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
            word-break: keep-all;
            line-height: 1.6;
        }

        .business-desc {
            font-size: 16px;
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
            height: 600px;
            margin-bottom: 50px;
        }

        .swiper-slide img {
            width: 100%;
            height: 85%;
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

        .service-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .service-title {
            text-align: center;
            margin-bottom: 80px;
        }

        .service-title h2 {
            font-size: 48px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .service-title p {
            font-size: 18px;
            color: #666;
            word-break: keep-all;
            line-height: 1.6;
        }

        .service-section {
            margin-bottom: 100px;
        }

        .service-section h3 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .service-desc {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 50px;
            word-break: keep-all;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }

        .process-item {
            text-align: center;
            padding: 30px 20px;
        }

        .process-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
        }

        .process-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .process-num {
            width: 24px;
            height: 24px;
            background: #000;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin: 0 auto 10px;
        }

        .process-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .process-text {
            font-size: 14px;
            color: #666;
            word-break: keep-all;
            line-height: 1.6;
        }

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
            transition: all 0.3s;
        }

        .side-button:hover {
            background: #0085BE;
        }

        @media (max-width: 1024px) {
            .process-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .process-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="visual">
    <h2>WORKS</h2>
    <p>엠앤코스는 다양한 품목들을 생산하고 있습니다.</p>
    <div class="visual-menu">
        <div class="menu-item">
            <a href="./business.php">사업분야</a>
        </div>
        <div class="menu-item active">
            <a href="./oem.php">OEM/ODM</a>
        </div>
    </div>
    </div>

<div class="service-content">
        <div class="service-title">
            <h2>OEM/ODM Service</h2>
            <p>엠앤코스의 개발 프로세스는 제형 개발부터 디자인, 완제품 공급까지 ONE-STOP SOLUTION 으로 제공됩니다.</p>
        </div>

        <div class="service-section">
            <h3>1. OEM (Original Equipment Manufacturing)</h3>
            <p class="service-desc">고객이 요구하는 제품과 상표명으로 완제품 및 반제품을 생산 공급하는 방식으로<br>개발계획을 전달받아 생산하여 주문자의 상표를 부착한 완제품을 납품하는 수탁생산 방식입니다.</p>
            
            <div class="process-grid">
                <div class="process-item">
                    <div class="process-icon">
                        <img src="../images/works/icon2.png" alt="시장조사" width="30px;">
                    </div>
                    <div class="process-num">01</div>
                    <div class="process-title">시장조사</div>
                    <div class="process-text">뷰티 트렌드를 선점하는 컨셉 구상</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="상담" width="30px;">
                    </div>
                    <div class="process-num">02</div>
                    <div class="process-title">상담</div>
                    <div class="process-text">본사 방문 또는 홈페이지, 전화상담을 통한 사전 정보 입수</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="제품기획 및 아이템 선택" width="30px;">
                    </div>
                    <div class="process-num">03</div>
                    <div class="process-title">제품기획 및 아이템 선택</div>
                    <div class="process-text">품목별 주원료/용기/상자 또는 패킹 부자재</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="연구개발" width="30px;">
                    </div>
                    <div class="process-num">04</div>
                    <div class="process-title">연구개발</div>
                    <div class="process-text">연구 및 자체평가 후 내용물 생물 평송 (동시진행 - 디자인 개발 확정)</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="샘플확정" width="30px;">
                    </div>
                    <div class="process-num">05</div>
                    <div class="process-title">샘플확정</div>
                    <div class="process-text">내용물품, 용기, 상자패킹 등 검적 확인</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="디자인 개발" width="30px;">
                    </div>
                    <div class="process-num">06</div>
                    <div class="process-title">디자인 개발</div>
                    <div class="process-text">생물 확정 및 내용물생산 (용기, 상자, 부자재 생산)</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="원 부자재 입고" width="30px;">
                    </div>
                    <div class="process-num">07</div>
                    <div class="process-title">원 부자재 입고</div>
                    <div class="process-text">내용물 생산 시 품질검사</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="생산" width="30px;">
                    </div>
                    <div class="process-num">08</div>
                    <div class="process-title">생산</div>
                    <div class="process-text">내용물충진 및 완제품 전반의 품질검사 및 식약처 허가등제</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="완제품 품질검사" width="30px;">
                    </div>
                    <div class="process-num">09</div>
                    <div class="process-title">완제품 품질검사</div>
                    <div class="process-text"></div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="납품" width="30px;">
                    </div>
                    <div class="process-num">10</div>
                    <div class="process-title">납품</div>
                    <div class="process-text"></div>
                </div>
            </div>
        </div>

        <div class="service-section">
            <h3>2. ODM (Original Development Manufacturing)</h3>
            <p class="service-desc">제조업자에서 제조한 제품에 주문자의 상표를 부착하여 납품하는 방식으로 제조업체의 독자적인 기술력과<br>노하우를 바탕으로 상품기획에서 개발, 생산, 품질관리 및 출고까지 전 과정에 대한 토탈서비스를 실현하는 시스템입니다.</p>
            
            <div class="process-grid">
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="시장조사" width="30px;">
                    </div>
                    <div class="process-num">01</div>
                    <div class="process-title">시장조사</div>
                    <div class="process-text">뷰티 트렌드를 선점하는 컨셉 구상</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="상담" width="30px;">
                    </div>
                    <div class="process-num">02</div>
                    <div class="process-title">상담</div>
                    <div class="process-text">본사 방문 또는 홈페이지, 전화상담을 통한 사전 정보 입수</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="제품기획 및 아이템 선택" width="30px;">
                    </div>
                    <div class="process-num">03</div>
                    <div class="process-title">제품기획 및 아이템 선택</div>
                    <div class="process-text">품목별 주원료/용기/상자 또는 패킹 부자재</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="디자인 개발" width="30px;">
                    </div>
                    <div class="process-num">04</div>
                    <div class="process-title">디자인 개발</div>
                    <div class="process-text">내용물품, 용기, 상자패킹 등 검적 확인</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="견적 및 판매전략" width="30px;">
                    </div>
                    <div class="process-num">05</div>
                    <div class="process-title">견적 및 판매전략</div>
                    <div class="process-text">발주금 50 퍼센트 / 납품 진금 50 퍼센트</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="반제품 품질검사" width="30px;">
                    </div>
                    <div class="process-num">06</div>
                    <div class="process-title">반제품 품질검사</div>
                    <div class="process-text">내용물 생산 시 품질검사</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="완제품 품질검사" width="30px;">
                    </div>
                    <div class="process-num">07</div>
                    <div class="process-title">완제품 품질검사</div>
                    <div class="process-text">내용물충진 및 완제품 전반의 품질검사 및 식약처 허가등제</div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                    <img src="../images/works/icon2.png" alt="납품" width="30px;>
                    </div>
                    <div class="process-num">08</div>
                    <div class="process-title">납품</div>
                    <div class="process-text">(운송비포함 견적가)</div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>
</html>