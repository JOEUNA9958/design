<?php
include '../inc/header.php';
?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('/bestone/images/banner.png');">
            <h2>FAQ</h2>
            <div class="sub_menu">
            <a href="/bestone/faq/question.php">자주묻는 질문</a>
                <a href="/bestone/faq/inquiry.php" class="active">1:1 문의하기</a>
            </div>
        </div>
    </div>

<div class="inquiry-section">
    <h2 class="section-title">문의하기</h2>
    
    <div class="inquiry-desc">
        <h3>궁금한 사항이나 질문이 있으시다면, 문의를 남겨 주세요.</h3>
        <p>담당자가 확인 후 개별적으로 연락드리겠습니다.</p>
    </div>

    <form class="inquiry-form" method="POST" action="inquiry_process.php" enctype="multipart/form-data">
        <div class="form-grid">
            <!-- 왼쪽 컬럼 -->
            <div class="form-column">
                <div class="form-group">
                    <label>제목</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="form-group">
                    <label>성명</label>
                    <input type="text" name="author" required>
                </div>
                
                <div class="form-group">
                    <label>수량</label>
                    <input type="text" name="quantity">
                </div>
                
                <div class="form-group">
                    <label>기타 참고사항(용기 인쇄 / 디자인 여부)</label>
                    <textarea name="content" rows="8" required></textarea>
                </div>
            </div>

            <!-- 오른쪽 컬럼 -->
            <div class="form-column">
                <div class="form-group">
                    <label>회사명 (부서명)</label>
                    <input type="text" name="company" required>
                </div>
                
                <div class="form-group">
                    <label>연락처</label>
                    <input type="tel" name="phone" required>
                </div>
                
                <div class="form-group">
                    <label>이메일</label>
                    <input type="email" name="email">
                </div>
                
                <div class="form-group">
                    <label>파일첨부</label>
                    <input type="file" name="attachment">
                </div>
            </div>
        </div>

        <!-- 전체 너비 입력 필드 -->
        <div class="form-group full-width">
            <label>문의 제품</label>
            <select name="product_type" required>
                <option value="">선택해주세요</option>
                <option value="skincare">스킨케어</option>
                <option value="bodycare">바디케어</option>
                <option value="diy">DIY 뷰티</option>
            </select>
        </div>

        <div class="form-group full-width">
            <label>용도</label>
            <input type="text" name="purpose" required>
        </div>

        <!-- 개인정보 동의 -->
        <div class="privacy-agreement">
            <label>
                <input type="checkbox" name="privacy_agreed" required>
                <a href="/privacy-policy" target="_blank">개인정보처리방침</a>에 동의합니다.
            </label>
        </div>

        <!-- 제출 버튼 -->
        <div class="submit-button">
            <button type="submit">문의 접수</button>
        </div>
    </form>
</div>

<style>
    /* 서브 배너 */
body {
        display: block;
        margin: 0;
    }

    .sub_banner_wrap {
        width: 100%;
        position: relative;
    }

    .sub_banner {
        width: 100%;
        height: 500px;
        background-size: 120% auto;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        animation: bannerMove 20s ease-in-out infinite;
        overflow: hidden;
    }

    @keyframes bannerMove {
        0% {
            background-position: center 0%;
        }
        50% {
            background-position: center 100%;
        }
        100% {
            background-position: center 0%;
        }
    }


    .sub_banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .sub_banner h2 {
        color: #fff;
        font-size: 45px;
        font-weight: 700;
        margin-bottom: -5px;
        position: relative;
        z-index: 1;
    }

    .sub_menu {
        display: flex;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.1);
        z-index: 1;
        height: 60px;
    }


    .sub_menu a {
        flex: 1;
        text-align: center;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(56 62 60 / 51%);
        transition: all 0.3s ease;
        font-size: 16px;
        position: relative;
    }
    
    .sub_menu a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #fff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .sub_menu a:hover::after,
    .sub_menu a.active::after {
        width: 100%;
    }

    .sub_menu a:hover,
    .sub_menu a.active {
        background: #ffffff;
        color: #000;
    }

    .story-section1 {
        padding: 100px 0;
        max-width: 1810px;
        margin: 0 auto;
    }
      .sub_banner_wrap {
           width: 100%;
           position: relative;
       }
       .sub_banner {
            width: 100%;
            height: 500px;
            background-size: 120% auto;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: bannerMove 20s ease-in-out infinite;
            overflow: hidden;
        }
.inquiry-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 80px;
    height: 1344.23px;
    position: relative;
    margin-top: 140px;
}

.section-title {
    font-weight: 700;
    font-size: 39.21px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    padding: 0 569.08px;
    position: absolute;
    height: 47px;
    left: 0;
    right: 0;
    top: 0;
}

.inquiry-desc {
    position: absolute;
    height: 118px;
    left: 0;
    right: 0;
    top: 124.98px;
    text-align: center;
}

.inquiry-desc h3 {
    font-weight: 700;
    font-size: 28.36px;
    line-height: 40px;
    letter-spacing: -0.6px;
    color: #191919;
    margin-bottom: 15px;
}

.inquiry-desc p {
    font-weight: 500;
    font-size: 16.88px;
    line-height: 22px;
    letter-spacing: -0.36px;
    color: #393939;
}

.inquiry-form {
    position: absolute;
    height: 1036.36px;
    left: 0;
    right: 0;
    top: 307.88px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 32px;
}

.form-group {
    margin-bottom: 32px;
}

.form-group label {
    display: block;
    font-weight: 600;
    font-size: 14.88px;
    line-height: 18px;
    letter-spacing: -0.32px;
    color: #000000;
    margin-bottom: 12px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    height: 56px;
    background: #F2F2F2;
    border: none;
    padding: 0 16px;
    font-size: 15px;
}

.form-group textarea {
    height: 210px;
    padding: 16px;
    resize: none;
}

.full-width {
    grid-column: 1 / -1;
}

.privacy-agreement {
    margin: 20px 0;
    font-size: 14.88px;
}

.privacy-agreement a {
    color: #212529;
    text-decoration: underline;
}

.submit-button {
    text-align: center;
}

.submit-button button {
    width: 628px;
    height: 64px;
    background: #191919;
    color: #FFFFFF;
    border: none;
    font-weight: 600;
    font-size: 19.84px;
    letter-spacing: -0.4px;
    cursor: pointer;
}


/* 태블릿 반응형 */
@media screen and (max-width: 1280px) {
    .inquiry-section {
        width: 100%;
        height: auto;
        padding: 80px 24px;
        margin-top: 100px;
    }

    .section-title {
        position: static;
        padding: 0;
        margin-bottom: 60px;
    }

    .inquiry-desc {
        position: static;
        margin-bottom: 60px;
    }

    .inquiry-form {
        position: static;
    }

    .submit-button button {
        width: 100%;
        max-width: 500px;
    }
}

/* 작은 태블릿 반응형 */
@media screen and (max-width: 1024px) {
    /* 서브 배너 */
    .sub_banner {
        height: 400px;
    }

    .sub_banner h2 {
        font-size: 36px;
    }

    .sub_menu {
        height: 50px;
    }

    .sub_menu a {
        font-size: 15px;
    }

    /* 섹션 타이틀 */
    .section-title {
        font-size: 32px;
        margin-bottom: 40px;
    }

    .inquiry-desc h3 {
        font-size: 24px;
        line-height: 1.4;
    }

    .inquiry-desc p {
        font-size: 15px;
    }

    /* 폼 스타일 */
    .form-grid {
        gap: 24px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        height: 52px;
    }

    .submit-button button {
        height: 56px;
        font-size: 18px;
    }
}

/* 모바일 반응형 */
@media screen and (max-width: 768px) {
    .inquiry-section {
        padding: 60px 16px;
        margin-top: 80px;
    }

    /* 서브 배너 */
    .sub_banner {
        height: 300px;
    }

    .sub_banner h2 {
        font-size: 28px;
    }

    .sub_menu {
        height: 44px;
    }

    .sub_menu a {
        font-size: 14px;
    }

    /* 섹션 타이틀 */
    .section-title {
        font-size: 28px;
        margin-bottom: 30px;
    }

    .inquiry-desc {
        margin-bottom: 40px;
    }

    .inquiry-desc h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .inquiry-desc p {
        font-size: 14px;
    }

    /* 폼 레이아웃 변경 */
    .form-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 14px;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        height: 48px;
        font-size: 14px;
        padding: 0 12px;
    }

    .form-group textarea {
        height: 160px;
        padding: 12px;
    }

    .privacy-agreement {
        font-size: 13px;
        margin: 16px 0;
    }

    .submit-button button {
        height: 48px;
        font-size: 16px;
    }
}

/* 작은 모바일 화면 */
@media screen and (max-width: 375px) {
    .inquiry-section {
        padding: 40px 12px;
        margin-top: 60px;
    }

    /* 서브메뉴 */
    .sub_menu {
        flex-wrap: wrap;
        height: auto;
    }

    .sub_menu a {
        width: 100%;
        height: 40px;
        font-size: 13px;
    }

    /* 섹션 타이틀 */
    .section-title {
        font-size: 24px;
        margin-bottom: 24px;
    }

    .inquiry-desc h3 {
        font-size: 18px;
    }

    .inquiry-desc p {
        font-size: 13px;
    }

    /* 폼 요소 */
    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        font-size: 13px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        height: 44px;
        font-size: 13px;
    }

    .form-group textarea {
        height: 140px;
    }

    .submit-button button {
        height: 44px;
        font-size: 15px;
    }
}

/* 모바일 가로 모드 */
@media screen and (max-width: 915px) and (orientation: landscape) {
    .sub_banner {
        height: 250px;
    }

    .inquiry-section {
        padding-top: 40px;
    }

    /* 폼 레이아웃 최적화 */
    .form-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group textarea {
        height: 120px;
    }

    .submit-button button {
        max-width: 400px;
    }
}
</style>

<?php include '../inc/footer.php'; ?>