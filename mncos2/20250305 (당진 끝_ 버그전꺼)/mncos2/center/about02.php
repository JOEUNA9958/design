<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>주요추진사업</title>
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
        font-size: 25px;
    }

    .visual p {
        font-size: 13px;
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
        font-size: 25px;
    }

    .visual p {
        font-size: 13px;
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
       <h2>센터소개</h2>
       <p>저희 홈페이지를 방문해 주신 여러분을 환영합니다.</p>
       <div class="visual-menu">
           <div class="menu-item">
               <a href="/mncos2/center/ceo.php"><span>인사말</span></a>
           </div>
           <div class="menu-item ">
               <a href="/mncos2/center/history.php"><span>연혁</span></a>
           </div>
           <div class="menu-item  active">
               <a href="/mncos2/center/about.php"><span>운영체계</span></a>
           </div>
           <div class="menu-item active">
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

   <div class="company-content">
       <div class="content-title">
       <div class="content-main-section-title">
           <h2>주요추진사업</h2>
       </div>
       </div>

       <div class="value-grid">
           <div class="value-item" data-aos="fade-up">
               <div class="value-circle black">심리상담 프로그램</div>
               <h3 class="value-title">상담</h3>
               <p class="value-desc">전문 상담 프로그램을 선택해보세요</p>
           </div>
           <div class="value-item" data-aos="fade-up" data-aos-delay="100">
               <div class="value-circle white">심리검사 프로그램</div>
               <h3 class="value-title">검사</h3>
               <p class="value-desc">전문 검사 프로그램을 선택해보세요</p>
           </div>
           <div class="value-item" data-aos="fade-up" data-aos-delay="200">
               <div class="value-circle gray">프로그램</div>
               <h3 class="value-title">가정폭력,성폭력 전문상담원</h3>
               <p class="value-desc">상담 자격증과정, 성희롱 인식 개선교육</p>
           </div>
       </div>
   </div>

   <div class="process-content">
   <div class="process-inner">
    <div class="content-title">
        <h2> 당진가족성통합상담센터입니다.</h2>
        <p> 당진가족성통합상담센터 운영체계</p>
    </div>

    <div class="process-grid">
        <div class="process-item" data-aos="fade-up">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="제형 연구">
            </div>
            <div class="process-text">
                <h3>심리상담</h3>
                <ul>
                    <li>부부상담, 가족삼담, 개인심리상담,</li>
                    <li>아동심리상담, 집단상담, 트라우마상담</li>
                </ul>
            </div>
        </div>
        <div class="process-item" data-aos="fade-up" data-aos-delay="100">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="원료 및 부자재 선정">
            </div>
            <div class="process-text">
                <h3>심리검사</h3>
                <ul>
                    <li>MMPI, 임상심리평가, MBTI, HTP</li>
                    <li>정신진단검사, 결혼만족도 검사, 부부의사소통 검사</li>
                </ul>
            </div>
        </div>
        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="생산/품질 관리">
            </div>
            <div class="process-text">
                <h3>[프로그램(미래평생교육센터)]</h3>
                <ul>
                    <li>가정폭력·성폭력전문상담원</li>
                    <li>상담자격증과정</li>
                    <li>성희롱인식개선교육</li>
                </ul>
            </div>
        </div>
        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
            <div class="process-icon">
                <img src="../images/company/icon.png" alt="디자인 개발">
            </div>
            <div class="process-text">
                <h3>커뮤니티</h3>
                <ul>
                    <li>센터소식, 자유게시판</li>
                    <li>프로그램안내, 프로그램사진, 자료모음</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="section-content">
    <div class="left-section">
        <img src="/mncos2/images/company/center-img01.jpg" alt="상담">
        <div class="section-text">
            <h2>심리상담(부부상담)</h2>
            <p>부부는 서로 다른 성격과 문화적 배경을 가지고 결혼하게 된다. 부부가 서로 불일치하고 갈등하게 되는 것은 당연하고 불가피한 과정이다. 부부 불화의 원인은 갈등 그 자체가 아니라 갈등에 대처하고 소통하는 방식의 문제이다. </p>
            <a href="../contact/inquiry.php" class="more-btn">심리상담 전체보기<span>→</span></a>
        </div>
    </div>
    </div>

    <div class="section-content">
    <div class="left-section">
        <div class="section-text">
            <h2>심리검사<br>(성희롱인식개선교육)</h2>
            <p>조직문화 개선 교육 프로그램 운영,
            공공부문 성희롱 행위자 인식개선 교육</p>
            <a href="./history.php" class="more-btn">심리검사 전체보기 <span>→</span></a>
        </div>
        <img src="/mncos2/images/company/center-img02.jpg" alt="검사">
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