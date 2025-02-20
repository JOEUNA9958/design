<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>회사소개 - M&COS</title>
   <!-- Fonts -->
   <link rel="preconnect" href="//fonts.googleapis.com"/>
   <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
   <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
   
   <!-- Plugin CSS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
   width: 100vw;
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
   margin-bottom: 16px;
}

.content-title p {
   font-size: 16px;
   color: #666;
}

.value-grid {
   display: grid;
   grid-template-columns: repeat(3, 1fr);
   gap: 50px;
   margin-top: 80px;
}

.value-item {
   text-align: center;
}

.value-circle {
   width: 200px;
   height: 200px;
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   margin: 0 auto 30px;
   font-family: 'Montserrat', sans-serif;
   font-weight: 700;
   font-size: 24px;
   color: #fff;
}

.value-circle.black {
   background: #000;
}

.value-circle.white {
   background: transparent;
   border: 2px solid #000;
   color: #000;
}

.value-circle.gray {
   background: #f5f5f5;
   color: #000;
}

.value-title {
   font-size: 20px;
   font-weight: 700;
   margin-bottom: 15px;
}

.value-desc {
   color: #666;
   line-height: 1.6;
   word-break: keep-all;
}

.process-content {
   width: 100%;
   background: #f6f6f6;
   padding: 100px 0;
}

.process-inner {
   max-width: 1200px;
   margin: 0 auto;
   padding: 0 20px;
}

.process-grid {
   display: flex;
   flex-wrap: wrap;
}

.process-item {
   display: inline-flex;
   align-items: flex-start;
   width: calc(50% - 40px);
   height: 184px;
   margin: 0 40px 40px 0;
   padding: 40px;
   background: #fff;
}

.process-icon {
   width: 60px;
   height: 60px;
   margin-right: 30px;
   flex-shrink: 0;
}

.process-icon img {
   width: 100%;
   height: 100%;
   object-fit: contain;
}

.process-text {
   text-align: left;
}

.process-text h3 {
   font-size: 20px;
   font-weight: 700;
   margin-bottom: 15px;
}
.process-text ul {
    list-style: none;
}

.process-text li {
   position: relative;
   padding-left: 10px;
   color: #666;
   line-height: 1.6;
   margin-bottom: 8px;
   font-size: 15px;
}

.process-text li:before {
    content: '-';
    position: absolute;
    left: 0;
}

.section-content {
    width: 100%;
    display: flex;
    align-items: center;
    padding: 150px 0;
}

.left-section, .right-section {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 80px;
    padding: 0 20px;
}

.section-content.reverse .right-section {
    flex-direction: row-reverse;
}

.section-text {
    flex: 1;
}

.section-text h2 {
    font-size: 42px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 30px;
}

.section-text p {
    font-size: 16px;
    color: #666;
    line-height: 1.8;
    margin-bottom: 40px;
    word-break: keep-all;
}

.more-btn {
    display: inline-flex;
    align-items: center;
    color: #111;
    text-decoration: none;
    font-size: 15px;
}

.more-btn span {
    margin-left: 10px;
    transition: transform 0.3s;
}

.more-btn:hover span {
    transform: translateX(5px);
}

.section-content img {
    width: 50%;
    height: auto;
}

/* 반응형 스타일 */
@media (max-width: 1200px) {
    .left-section, .right-section {
        gap: 50px;
    }
}

@media (max-width: 991px) {
    .value-grid {
        gap: 30px;
    }

    .value-circle {
        width: 160px;
        height: 160px;
        font-size: 20px;
    }

    .process-item {
        width: calc(50% - 20px);
        margin: 0 20px 20px 0;
        padding: 30px;
    }
    
    .section-content {
        padding: 100px 0;
    }
}

@media (max-width: 768px) {
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

    .company-content {
        margin: 60px auto;
    }

    .content-title h2 {
        font-size: 32px;
    }

    .value-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .process-item {
        width: 100%;
        margin: 0 0 20px 0;
        height: auto;
    }

    .left-section, .right-section {
        flex-direction: column !important;
        gap: 40px;
    }

    .section-content img {
        width: 100%;
    }

    .section-text h2 {
        font-size: 32px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 350px;
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

    .company-content {
        margin: 40px auto;
        padding: 0 15px;
    }

    .content-title {
        margin-bottom: 40px;
    }

    .content-title h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .content-title p {
        font-size: 14px;
        word-break: keep-all;
    }

    .value-circle {
        width: 140px;
        height: 140px;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .value-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .process-content {
        padding: 50px 0;
    }

    .process-item {
        padding: 20px;
    }

    .process-icon {
        width: 40px;
        height: 40px;
        margin-right: 15px;
    }

    .process-text h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .process-text li {
        font-size: 13px;
    }

    .section-content {
        padding: 50px 0;
    }

    .section-text h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .section-text p {
        font-size: 14px;
        margin-bottom: 30px;
    }

    .more-btn {
        font-size: 14px;
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

    .content-title h2 {
        font-size: 24px;
    }

    .value-circle {
        width: 120px;
        height: 120px;
        font-size: 16px;
    }

    .process-item {
        padding: 15px;
    }

    .process-text li {
        font-size: 12px;
    }

    .section-text h2 {
        font-size: 24px;
    }
}
</style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <?php include '../inc/cursor.php'; ?>

   <div class="visual">
       <h2>COMPANY</h2>
       <p>고객사의 꿈과 비전을 함께 이루는 엠앤코스</p>
       <div class="visual-menu">
           <div class="menu-item active">
               <a href="../company/about.php"><span>회사소개</span></a>
           </div>
           <div class="menu-item">
               <a href="../company/history.php"><span>연혁</span></a>
           </div>
           <div class="menu-item">
               <a href="../company/ceo.php"><span>CEO<br>인사말</span></a>
           </div>
           <div class="menu-item">
               <a href="../company/certification.php"><span>인증서</span></a>
           </div>
       </div>
   </div>

   <div class="company-content">
       <div class="content-title">
       <div class="content-main-section-title">
           <h2>WE MAKE<br>EXPERIENCES</h2>
           <p>고객사가 원하는 제품이 나올 때 까지<br>신속한 대응을 바탕으로 최선을 다하겠습니다.</p>
       </div>
       </div>

       <div class="value-grid">
           <div class="value-item" data-aos="fade-up">
               <div class="value-circle black">CREATIVE</div>
               <h3 class="value-title">창의</h3>
               <p class="value-desc">넓은 시장에서 트렌드에 맞게<br>차별화된 품질을 제안합니다</p>
           </div>
           <div class="value-item" data-aos="fade-up" data-aos-delay="100">
               <div class="value-circle white">HONESTY</div>
               <h3 class="value-title">신뢰</h3>
               <p class="value-desc">합리적인 가격과<br>고객의 동반자로 최선을 다합니다.</p>
           </div>
           <div class="value-item" data-aos="fade-up" data-aos-delay="200">
               <div class="value-circle gray">QUALITY</div>
               <h3 class="value-title">품질</h3>
               <p class="value-desc">혁신기술과 안정적 품질관리로<br>최고의 품질을 약속합니다.</p>
           </div>
       </div>
   </div>

   <div class="process-content">
   <div class="process-inner">
    <div class="content-title">
        <h2>HOW WE WORKS?</h2>
        <p>단순하지만 명료한 프로세스로 고객을 지원합니다.</p>
    </div>

    <div class="process-grid">
        <div class="process-item" data-aos="fade-up">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="제형 연구">
            </div>
            <div class="process-text">
                <h3>제형 연구</h3>
                <ul>
                    <li>타사 제품 및 제형 연구 개발</li>
                    <li>샘플 준비 및 품평을 통해 최적의 제형 선정</li>
                </ul>
            </div>
        </div>
        <div class="process-item" data-aos="fade-up" data-aos-delay="100">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="원료 및 부자재 선정">
            </div>
            <div class="process-text">
                <h3>원료 및 부자재 선정</h3>
                <ul>
                    <li>컨셉에 맞는 원료/기능성원료 추천</li>
                    <li>제품 용기 및 기타 부자재 선정</li>
                    <li>제안/개발, 부자재 모든 과정을 직접 Control 합니다.</li>
                </ul>
            </div>
        </div>
        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="생산/품질 관리">
            </div>
            <div class="process-text">
                <h3>생산/품질 관리</h3>
                <ul>
                    <li>믿을 수 있는 공장에서 OEM, ODM 생산 진행</li>
                    <li>상산관리, 품질관리, 제품성적서 관리 지원</li>
                </ul>
            </div>
        </div>
        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="디자인 개발">
            </div>
            <div class="process-text">
                <h3>디자인 개발</h3>
                <ul>
                    <li>제품에 어울리는 패키지 재질 및 후가공 정밀 추천</li>
                    <li>인쇄업체 지정 및 DATA작업</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="section-content">
    <div class="left-section">
        <img src="../images/company/sec03-1.jpg" alt="혁신">
        <div class="section-text">
            <h2>WE ARE<br>INNOVATION</h2>
            <p>엠앤코스는 고객의 의견에 귀를 기울여 보다 빠른 피드백을 통해 차별화된 서비스와 제품을 제공하며, 자사만의 이익을 추구하기 보다 고객과 함께 성장하기를 원하는 회사로 차별화된 품질의 제품을 합리적인 가격으로 공급하여 업젖의 정보를 제공함으로써 고객과의 원활한 소통이 가능한 파트너가 되기 위해 노력하고 있습니다.</p>
            <a href="../contact/inquiry.php" class="more-btn">프로젝트 의뢰하기 <span>→</span></a>
        </div>
    </div>
    </div>

    <div class="section-content">
    <div class="left-section">
        <div class="section-text">
            <h2>CREATE A<br>OTHER<br>EXPERIENCE</h2>
            <p>지속적인 연구와 개발을 통해 고객의 니즈를 충족시킬 수 있는 기술력으로 최상의 제품을 제공하는 기업이 되겠습니다. 제품 개발과 기술력 뿐만 아니라 고객과의 신뢰를 최우선으로 하여 고객과 함께 미래를 준비하는 동반자가 되도록 최선을 다하겠습니다.</p>
            <a href="./history.php" class="more-btn">연혁 보러가기 <span>→</span></a>
        </div>
        <img src="../images/company/sec03-1.jpg" alt="경험">
    </div>
    </div>

   <?php include '../inc/footer.php'; ?>

   <script>
       AOS.init({
           duration: 1000,
           once: false,
           disable: 'mobile'
       });
   </script>
</body>
</html>