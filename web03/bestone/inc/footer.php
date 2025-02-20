<?php
//inc/footer.php
?>

<link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css" />
<footer id="footer">
    <div class="footer-inner">
        <div class="footer-left">
        <img src="/bestone/images/logo_w.png" style="width:20px; margin-bottom:30px;">
            <!-- <h1 class="ft-logo">BESTONEtech</h1>
            <p>(주)베스트원테크</p> -->
            <p>대표자 : 송태엽</p>
            <p>사업자 등록번호 : 124-86-39538</p>
            <p>사업장 주소 : 경기도 화성시 세자로 396번길 40</p>
        </div>
        <div class="ft-nav-wrap">
            <div class="ft-nav-box">
                <a href="/bestone/company/index.php" class="nav-title">회사소개</a>
                <div class="sub-links">
                    <a href="/bestone/company/index.php">회사소개</a>
                    <a href="/bestone/company/ceo.php">CEO 인사말</a>
                    <a href="/bestone/company/history.php">연혁</a>
                    <a href="/bestone/company/map.php">오시는 길</a>
                </div>
            </div>
            <div class="ft-nav-box">
                <a href="/bestone/business/about.php" class="nav-title">비지니스</a>
                <div class="sub-links">
                    <a href="/bestone/business/about.php">프로세스</a>
                    <a href="/bestone/business/business.php">사업분야</a>
                    <a href="/bestone/business/certification.php">인증</a>
                </div>
            </div>
            <div class="ft-nav-box">
                <a href="/bestone/portfolio/oemodm.php" class="nav-title">포트폴리오</a>
                <div class="sub-links">
                    <a href="/bestone/portfolio/oemodm.php">OEM/ODM</a>
                    <a href="/bestone/portfolio/brand.php">자사브랜드</a>
                </div>
            </div>
            <div class="ft-nav-box">
                <a href="/bestone/news/guide.php" class="nav-title">새소식</a>
                <div class="sub-links">
                    <a href="/bestone/news/guide.php">카탈로그</a>
                    <a href="/bestone/news/gallery.php">참여전시회</a>
                </div>
            </div>
            <div class="ft-nav-box">
                <a href="/bestone/faq/" class="nav-title">FAQ</a>
                <div class="sub-links">
                    <a href="/bestone/faq/question.php">자주묻는 질문</a>
                    <a href="/bestone/faq/inquiry.php">1:1 문의하기</a>
                </div>
            </div>
        </div>
        <div class="family-wrap">
            <select class="family-sites">
                <option selected>Family Sites</option>
                <option value="https://smartstore.naver.com/coacos">네이버 스토어</option>
            </select>
        </div>
    </div>
    <div class="ft-divider"></div>
    <div class="copyright">BESTONETECH Co., Ltd</div>
    <div id="quick-btns" class="show">
        <a href="#" id="top-btn">
            <i class="bi bi-arrow-up-short"></i>
        </a>
    </div>
</footer>

<style>

@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");

#footer {
    width: 1280px;
    margin: 160px auto 100px;
    position: relative;
    font-size: 13px;
}

.footer-inner {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

/* Left Section */
.footer-left {
    width: 271.23px;
}

.footer-left p {
    font-size: 13.67px;
    line-height: 14px;
    color: #797979;
    margin-bottom: 10px;
}

/* Navigation */
.ft-nav-wrap {
    display: flex;
    gap: 40px;
}

.ft-nav-box {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.nav-title {
    font-size: 15px;
    line-height: 19px;
    color: #393939;
    margin-bottom: 10px;
}

.sub-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.sub-links a {
    font-size: 14px;
    line-height: 14px;
    color: #797979;
}

/* Family Sites */
.family-wrap {
    width: 200px;
}

.family-sites {
    width: 100%;
    height: 35.5px;
    padding: 0 12px;
    font-size: 15px;
    line-height: 22px;
    color: #393939;
    border: none;
    border-bottom: 1px solid #343A40;
    background-color: #fff;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
    position: relative;
    padding-right: 30px; /* 화살표를 위한 여백 */
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath d='M2.5 4.5L6 8L9.5 4.5' stroke='%23343A40' stroke-width='1.5' fill='none'/%3E%3C/svg%3E");
    background-position: calc(100% - 12px) center;
    background-repeat: no-repeat;
}

/* Bottom Section */
.ft-divider {
    width: 100%;
    height: 1px;
    background: #DBDBDB;
    margin-bottom: 20px;
}

.copyright {
    font-size: 13px;
    line-height: 14px;
    text-align: end;
    color: #797979;
}

/* Quick Buttons */
#quick-btns {
    position: fixed;
    right: -100px; /* 시작 위치를 화면 밖으로 */
    bottom: 30px;
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); /* 부드러운 전환 효과 */
}

/* 스크롤 내리면 나타나도록 */
#quick-btns.show {
    right: 30px; /* 최종 위치 */
    opacity: 1;
    visibility: visible;
}

#quick-btns a {
    background: var(--white-100);
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 6px 12px -2px rgb(192 192 192 / 40%);
    text-align: center;
    color: var(--main);
    font-size: 32px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.bi::before, 
[class^="bi-"]::before, 
[class*=" bi-"]::before {
    display: inline-block;
    font-family: bootstrap-icons !important;
    font-style: normal;
    font-weight: normal !important;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    vertical-align: -.125em;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#quick-btns a:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 15px -2px rgb(192 192 192 / 60%);
}

.bi-arrow-up-short {
    font-size: 32px;
    line-height: 1;
}


/* 푸터 모바일 반응형 */
@media screen and (max-width: 1024px) {
    #footer {
        width: 100%;
        padding: 0 20px;
        margin: 80px auto 50px;
    }

    .footer-inner {
        flex-direction: column;
        gap: 40px;
    }

    .footer-left {
        width: 100%;
    }

    .ft-nav-wrap {
        flex-wrap: wrap;
        gap: 20px;
    }

    .ft-nav-box {
        width: calc(50% - 10px);
    }

    .family-wrap {
        width: 100%;
    }
}

@media screen and (max-width: 768px) {
    .footer-inner {
        gap: 30px;
    }

    .ft-nav-wrap {
        gap: 15px;
    }

    .ft-nav-box {
        width: 100%;
    }

    .nav-title {
        font-size: 14px;
    }

    .sub-links a {
        font-size: 13px;
    }
}

@media screen and (max-width: 480px) {
    #footer {
        margin: 60px auto 30px;
    }

    .copyright {
        text-align: center;
    }

    #quick-btns {
        right: 15px;
        bottom: 15px;
    }

    #quick-btns a {
        width: 44px;
        height: 44px;
        font-size: 24px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quickBtns = document.getElementById('quick-btns');
    const topBtn = document.getElementById('top-btn');

    function checkScroll() {
        if (window.scrollY > 200) {
            quickBtns.classList.add('show');
        } else {
            quickBtns.classList.remove('show');
        }
    }

    // 스크롤 이벤트
    window.addEventListener('scroll', checkScroll);

    // 페이지 로딩 후 초기 상태 체크
    checkScroll();

    // TOP 버튼 클릭 이벤트
    topBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Family Sites 선택 이벤트
    document.querySelector('.family-sites').addEventListener('change', function(e) {
        const url = e.target.value;
        if (url) window.open(url, '_blank');
    });
});

</script>