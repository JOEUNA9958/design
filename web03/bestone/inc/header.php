<?php
//inc/header.php
?>

<link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css" />
<header class="header">
    <div class="header-inner">
        <h1 class="logo">
            <a href="/bestone/index.php"><img src="/bestone/images/logo_w.png" alt="BESTONEtech"></a>
        </h1>
        <nav class="gnb">
            <ul class="main-menu">
                <li class="menu-item" data-menu="company">
                    <a href="/bestone/company/index.php">회사소개</a>
                </li>
                <li class="menu-item" data-menu="business">
                    <a href="/bestone/business/about.php">비지니스</a>
                </li>
                <li class="menu-item" data-menu="portfolio">
                    <a href="/bestone/portfolio/oemodm.php">포트폴리오</a>
                </li>
                <li class="menu-item" data-menu="news">
                    <a href="/bestone/news/guide.php">새소식</a>
                </li>
                <li class="menu-item" data-menu="faq">
                    <a href="/bestone/faq/question.php">FAQ</a>
                </li>
            </ul>
        </nav>
        <!-- <div class="lang-switch">
            <a href="?lang=ko">KO</a>
            <span class="divider">/</span>
            <a href="?lang=en">EN</a>
        </div> -->
    </div>
    <div class="submenu-wrapper">
        <div class="submenu-inner">
            <div class="submenu-column">
                <a href="/bestone/company/index.php">회사소개</a>
                <a href="/bestone/company/ceo.php">CEO 인사말</a>
                <a href="/bestone/company/history.php">회사연혁</a>
                <a href="/bestone/company/map.php">찾아오는 길</a>
            </div>
            <div class="submenu-column">
                <a href="/bestone/business/about.php">프로세스</a>
                <a href="/bestone/business/business.php">사업분야</a>
                <a href="/bestone/business/certification.php">인증</a>
            </div>
            <div class="submenu-column">
                <a href="/bestone/portfolio/oemodm.php">OEM/ODM</a>
                <a href="/bestone/portfolio/brand.php">브랜드</a>
            </div>
            <div class="submenu-column">
                <a href="/bestone/news/guide.php">카탈로그</a>
                <a href="/bestone/news/gallery.php">참여전시회</a>
                <a href="/bestone/gallery/gallery.php">갤러리</a>
            </div>
            <div class="submenu-column">
                <a href="/bestone/faq/question.php">자주묻는 질문</a>
                <a href="/bestone/faq/inquiry.php">1:1 문의하기</a>
            </div>
        </div>
    </div>


<!-- 모바일 메뉴 버튼 -->
<div class="mobile-menu-btn">
    <span></span>
    <span></span>
    <span></span>
</div>

<!-- 모바일 메뉴 -->
<div class="mobile-menu">
    <div class="mobile-menu-header">
        <h1 class="logo">
            <a href="/bestone/index.php"><img src="/bestone/images/logo_w.png" alt="BESTONEtech"></a>
        </h1>
        <button class="mobile-close-btn">×</button> <!-- 여기에 X 버튼만 존재 -->
    </div>
    <ul class="mobile-main-menu">
        <li class="mobile-menu-item">
            <button type="button" class="mobile-menu-toggle">회사소개</button>
            <ul class="mobile-submenu">
                <li><a href="/bestone/company/index.php">회사소개</a></li>
                <li><a href="/bestone/company/ceo.php">CEO 인사말</a></li>
                <li><a href="/bestone/company/history.php">회사연혁</a></li>
                <li><a href="/bestone/company/map.php">찾아오는 길</a></li>
            </ul>
        </li>
        <li class="mobile-menu-item">
            <button type="button" class="mobile-menu-toggle">비지니스</button>
            <ul class="mobile-submenu">
                <li><a href="/bestone/business/about.php">프로세스</a></li>
                <li><a href="/bestone/business/business.php">사업분야</a></li>
                <li><a href="/bestone/business/certification.php">인증</a></li>
            </ul>
        </li>
        <li class="mobile-menu-item">
            <button type="button" class="mobile-menu-toggle">포트폴리오</button>
            <ul class="mobile-submenu">
                <li><a href="/bestone/portfolio/oemodm.php">OEM/ODM</a></li>
                <li><a href="/bestone/portfolio/brand.php">브랜드</a></li>
            </ul>
        </li>
        <li class="mobile-menu-item">
            <button type="button" class="mobile-menu-toggle">새소식</button>
            <ul class="mobile-submenu">
                <li><a href="/bestone/news/guide.php">카탈로그</a></li>
                <li><a href="/bestone/news/gallery.php">참여전시회</a></li>
            </ul>
        </li>
        <li class="mobile-menu-item">
            <button type="button" class="mobile-menu-toggle">FAQ</button>
            <ul class="mobile-submenu">
                <li><a href="/bestone/faq/question.php">자주묻는 질문</a></li>
                <li><a href="/bestone/faq/inquiry.php">1:1 문의하기</a></li>
            </ul>
        </li>
    </ul>
</div>


<!-- 모바일 메뉴 오버레이 -->
<div class="mobile-menu-overlay"></div>


    <div class="loading-overlay">
        <div class="loading-dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
</header>

<style>

/* 기본 스타일 */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Pretendard", -apple-system, BlinkMacSystemFont, system-ui, Roboto, "Helvetica Neue", "Segoe UI", "Apple SD Gothic Neo", "Noto Sans KR", "Malgun Gothic", sans-serif;
}

/* 링크 기본 스타일 */
a {
    text-decoration: none;
    color: inherit;
}

ul, li {
    list-style: none;
}

/* 헤더 기본 스타일 */
.header {
    position: fixed;
    width: 100%;
    height: 90px;
    left: 0;
    top: 0;
    background: #FFFFFF;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.08);
    z-index: 1000;
    transition: height 0.3s ease;
}

.header.scrolled {
    height: 70px;
}

.header-inner {
    position: relative;
    width: 100%;
    max-width: 1800px;
    height: 100%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #e5e5e5;
}

/* 로고 스타일 */
.logo {
    position: absolute;
    left: 16.6%;
    width: 148px;
    height: 28px;
    top: 31px;
    transition: top 0.3s ease;
}

.header.scrolled .logo {
    top: 21px;
}

.logo img {
    width: 20%;
}

/* GNB 메뉴 스타일 */
.gnb {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 613.84px;
    height: 90px;
    transition: height 0.3s ease;
}

.header.scrolled .gnb {
    height: 70px;
}

.main-menu {
    display: flex;
    height: 100%;
    align-items: center;
}

.menu-item {
    width: 122px;
    height: 90px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    transition: height 0.3s ease;
}

.menu-item:nth-child(3) {
    width: 136px;
}

.menu-item > a {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    font-weight: 400;
    font-size: 16px;
    color: #191919;
    letter-spacing: -0.6px;
    position: relative;
    padding: 0 20px;
}

.menu-item > a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #191919;
    opacity: 0;
    transition: opacity 0.3s;
}

.menu-item.active > a::after {
    opacity: 1;
}

/* 서브메뉴 스타일 */
.submenu-wrapper {
    position: absolute;
    top: 90px;
    left: 0;
    width: 100%;
    background: #fff;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
    border-bottom: 1px solid #e5e5e5;
}

.header.scrolled .submenu-wrapper {
    top: 70px;
}

.header:hover .submenu-wrapper {
    opacity: 1;
    visibility: visible;
}

.submenu-inner {
    width: 613.84px;
    padding: 25px 0;
    display: flex;
    justify-content: space-between;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
}

.submenu-column {
    width: 122px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.submenu-column:nth-child(3) {
    width: 136px;
}

.submenu-column a {
    font-size: 15px;
    color: #797979;
    transition: color 0.3s;
    white-space: nowrap;
}

.submenu-column a:hover {
    color: #191919;
}

/* 모바일 메뉴 버튼 - 기본적으로 숨김 */
.mobile-menu-btn {
    display: none;
}

/* 모바일 메뉴 - 기본적으로 숨김 */
.mobile-menu {
    display: none;
}

/* 모바일 메뉴 오버레이 - 기본적으로 숨김 */
.mobile-menu-overlay {
    display: none;
}

/* ============================== */
/* 📱 모바일 & 태블릿 전용 스타일 */
/* ============================== */
@media screen and (max-width: 1024px) {
    

    .main-page .mobile-menu-btn {
        display: block;
        position: absolute;
        left: 22%;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 24px;
        cursor: pointer;
        z-index: 1002;
    }

    .sub-page .mobile-menu-btn {
        display: block;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 24px;
        cursor: pointer;
        z-index: 1002;
    }

    .main-page .mobile-close-btn {right:0; top:30px !important; left: 22% !important; }

    .main-page .mobile-menu.active {right: 15% !important;}

    .sub-page .mobile-close-btn {top:1% !important;}

    .main-page .mobile-menu-item.active .mobile-submenu {width:240px !important;}


    /* 🚫 PC 메뉴 숨기기 */
    .gnb, 
    .submenu-wrapper {
        display: none;
    }

    /* 📌 헤더 */
    .header-inner {
        padding: 0 20px;
        justify-content: space-between;
        border-bottom: none;
    }

    .logo {
        position: relative;
        left: 0;
        top: 0;
        width: 120px;
    }

    /* 🍔 햄버거 버튼 */
    .mobile-menu-btn {
        display: block;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 24px;
        cursor: pointer;
        z-index: 1002;
    }

    .mobile-menu-btn span {
        display: block;
        position: absolute;
        width: 100%;
        height: 2px;
        background: #191919;
        transition: all 0.3s;
    }

    .mobile-menu-btn span:nth-child(1) { top: 0; }
    .mobile-menu-btn span:nth-child(2) { top: 50%; transform: translateY(-50%); }
    .mobile-menu-btn span:nth-child(3) { bottom: 0; }

    /* 🍔 햄버거 버튼 활성화 상태 */
    .mobile-menu-btn.active span:nth-child(1) {
        top: 50%;
        transform: translateY(-50%) rotate(45deg);
    }

    .mobile-menu-btn.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-btn.active span:nth-child(3) {
        bottom: 50%;
        transform: translateY(50%) rotate(-45deg);
    }

    /* 📜 모바일 메뉴 */
    .mobile-menu {
        display: block;
        position: fixed;
        top: 0;
        right: -100%;
        width: 80%;
        height: 100%;
        background: #fff;
        z-index: 1001;
        transition: right 0.3s ease-in-out;
        overflow-y: auto;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .mobile-menu.active {
        right: 0;
    }

    /* 📌 모바일 메뉴 헤더 */
    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    /* ❌ X 버튼 */
    .mobile-close-btn {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: none;
        border: none;
        font-size: 30px;
        color: #191919;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1002;
    }

    .mobile-menu-btn.active {
        display: none;
    }

    /* 📜 모바일 메뉴 아이템 */
    .mobile-main-menu {
        padding: 20px 0;
    }

    .mobile-menu-item {
        border-bottom: 1px solid #f5f5f5;
        padding: 10px 0;
    }

    /* ▶ 서브메뉴 버튼 */
    .mobile-menu-toggle {
        width: 100%;
        text-align: left;
        padding: 15px 10px;
        background: none;
        border: none;
        font-size: 16px;
        font-weight: 500;
        color: #191919;
        position: relative;
        cursor: pointer;
    }

    /* ▼ 화살표 */
    .mobile-menu-toggle::after {
        content: '▼';
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: #555;
        transition: transform 0.3s;
    }

    .mobile-menu-item.active .mobile-menu-toggle::after {
        transform: translateY(-50%) rotate(180deg);
    }

    /* 📜 서브메뉴 (기본적으로 숨김) */
    .mobile-submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        background: #f8f8f8;
        border-radius: 5px;
        margin-top: 5px;
        padding: 0;
    }

    /* ✅ 서브메뉴 활성화 시 보이기 */
    .mobile-menu-item.active .mobile-submenu {
        max-height: 300px;
        padding: 10px 0;
    }

    .mobile-submenu li a {
        display: block;
        padding: 12px 20px;
        font-size: 16px;
        color: #333;
    }

    .mobile-submenu li a:hover {
        background: #e5e5e5;
    }

    /* 🔲 모바일 메뉴 오버레이 */
    .mobile-menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .mobile-menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.header');
    const menuItems = document.querySelectorAll('.menu-item');
    const submenuColumns = document.querySelectorAll('.submenu-column');
    let activeIndex = -1;

    // 메인 메뉴와 서브메뉴의 인덱스를 일치시켜 처리
    function setActiveMenu(index) {
        menuItems.forEach((item, i) => {
            if (i === index) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
        activeIndex = index;
    }

    // 메인 메뉴 호버
    menuItems.forEach((item, index) => {
        item.addEventListener('mouseenter', () => {
            setActiveMenu(index);
        });
    });

    // 서브메뉴 영역 호버
    submenuColumns.forEach((column, index) => {
        column.addEventListener('mouseenter', () => {
            setActiveMenu(index);
        });
    });

    // 서브메뉴 각 항목 호버
    submenuColumns.forEach((column, index) => {
        const links = column.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('mouseenter', () => {
                setActiveMenu(index);
            });
        });
    });

    // 헤더 영역을 벗어날 때
    header.addEventListener('mouseleave', () => {
        menuItems.forEach(item => item.classList.remove('active'));
        activeIndex = -1;
    });
});

// 스크롤 이벤트 처리 추가
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 0) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const loadingOverlay = document.querySelector('.loading-overlay');
    
    // 모든 리소스가 로드되면 로딩 화면 숨기기
    window.addEventListener('load', function() {
        // 약간의 지연 후 로딩 화면 숨기기 (더 부드러운 전환을 위해)
        setTimeout(() => {
            loadingOverlay.classList.add('hide');
        }, 500);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    const path = window.location.pathname;

    // 메인 페이지일 경우 main-page 클래스 추가
    if (path === "/bestone/index.php") {
        body.classList.add("main-page");
    } else {
        body.classList.add("sub-page");
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileCloseBtn = document.querySelector('.mobile-close-btn');
    const mobileMenuToggles = document.querySelectorAll('.mobile-menu-toggle');
    const body = document.body;

    // 모바일 메뉴 열기
    function openMobileMenu() {
        mobileMenu.classList.add('active');
        mobileMenuBtn.classList.add('active');
        body.style.overflow = 'hidden';
    }

    // 모바일 메뉴 닫기
    function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        mobileMenuBtn.classList.remove('active');
        body.style.overflow = '';
    }

    // 햄버거 버튼 클릭 시 모바일 메뉴 열기
    mobileMenuBtn.addEventListener('click', openMobileMenu);

    // X 버튼 클릭 시 모바일 메뉴 닫기
    mobileCloseBtn.addEventListener('click', closeMobileMenu);

    // 서브메뉴 토글 기능 추가
    mobileMenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            const menuItem = this.parentElement;
            const isActive = menuItem.classList.contains('active');

            // 모든 서브메뉴 닫기
            document.querySelectorAll('.mobile-menu-item').forEach(item => {
                item.classList.remove('active');
            });

            // 현재 클릭한 서브메뉴만 열기
            if (!isActive) {
                menuItem.classList.add('active');
            }
        });
    });
});


</script>