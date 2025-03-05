<?php
$current_page = basename($_SERVER['PHP_SELF']);

$menu_links = [
    '센터소개' => [
        '인사말' => '/mncos2/center/ceo.php',
        '연혁' => '/mncos2/center/history.php',
        '운영체계' => '/mncos2/center/about.php',
        '주요추진사업' => '/mncos2/center/about02.php',
        '법률상담' => '/mncos2/center/law.php',
        '센터둘러보기' => '/mncos2/center/view.php',
        '후원안내' => '/mncos2/center/sponsor.php',
        '오시는 길' => '/mncos2/center/map.php'
    ],
    '심리상담' => [
        '부부상담' => '/mncos2/advise/advise 01.php',
        '가족상담' => '/mncos2/advise/advise 02.php',
        '개인심리상담' => '/mncos2/advise/advise 03.php',
        '아동청소년상담' => '/mncos2/advise/advise 04.php',
        '정신역동 집단상담' => '/mncos2/advise/advise 05.php',
        '트라우마치료' => '/mncos2/advise/advise 06.php'
    ],
    '심리검사' => [
        'MMPI' => '/mncos2/examine/examine01.php',
        '임상심리평가' => '/mncos2/examine/examine02.php',
        'MBTI' => '/mncos2/examine/examine03.php',
        'HTP' => '/mncos2/examine/examine04.php',
        '정신진단검사' => '/mncos2/examine/examine05.php',
        '결혼만족도검사' => '/mncos2/examine/examine06.php',
        '부부의사소통검사' => '/mncos2/examine/examine07.php',
    ],
    '프로그램' => [
        '가정폭력·성폭력전문상담원' => '/mncos2/schedule/schedule01.php',
        '상담자격증 과정 ' => '/mncos2/schedule/schedule02.php',
        '성희롱 인식개선교육' => '/mncos2/schedule/schedule03.php'
    ],
    '사이버상담실' => [
        '사이버 상담실' => '/mncos2/contact/inquiry.php'
    ],
    '커뮤니티' => [
        '센터소식' => '/mncos2/online/online01.php',
        '자유게시판' => '/mncos2/online/online02.php',
        '프로그램안내' => '/mncos2/online/online03.php',
        '프로그램사진' => '/mncos2/online/online04.php',
        '자료모음' => '/mncos2/online/online05.php'
    ]
    
];

function isActiveMenu($page_name) {
    global $current_page;
    return (strpos($current_page, strtolower($page_name)) !== false) ? 'active' : '';
}
?>

<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">

   <link rel="preconnect" href="//fonts.googleapis.com"/>
   <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
   <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
   
   <!-- Plugin CSS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<header class="header">
    <a href="/mncos2/index.php" class="logo">
        <img src="/mncos2/images/common/logo.png" alt="M&COS" class="logo_black">
        <img src="/mncos2/images/common/logo_w.png" alt="M&COS" class="logo_white">
    </a>
    <nav>
        <ul class="nav-menu">
        <?php foreach($menu_links as $main_menu => $sub_menus): ?>
            <li class="nav-item">
                <?php if($main_menu === 'PORTFOLIO'): ?>
                    <!-- PORTFOLIO 메뉴는 직접 링크 -->
                    <a href="/mncos2/portfolio/index.php" class="nav-link <?php echo isActiveMenu($main_menu); ?>">
                        <?php echo $main_menu; ?>
                    </a>
                <?php else: ?>
                    <!-- 다른 메뉴들은 # 처리하여 클릭해도 이동하지 않음 -->
                    <a href="javascript:void(0);" class="nav-link <?php echo isActiveMenu($main_menu); ?>">
                        <?php echo $main_menu; ?>
                    </a>
                    <?php if(!empty($sub_menus)): ?>
                        <ul class="sub-menu">
                            <?php foreach($sub_menus as $name => $link): ?>
                                <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </nav>
    <div class="header-utils">
        <button type="button" class="all-menu-btn">
            <img src="/mncos2/images/common/ico_menu_w.svg" alt="전체메뉴" class="menu-icon-white">
            <img src="/mncos2/images/common/ico_menu.svg" alt="전체메뉴" class="menu-icon-black">
            <img src="/mncos2/images/common/ico_close.png" alt="닫기" class="close-icon">
        </button>
    </div>
</header>

<div class="full-menu">
    <div class="full-menu-content">
        <ul class="full-menu-list">
            <?php foreach($menu_links as $main_menu => $sub_menus): ?>
                <li class="full-menu-item">
                    <?php if($main_menu === 'PORTFOLIO'): ?>
                        <!-- PORTFOLIO 메뉴는 직접 링크로 처리 -->
                        <a href="/mncos2/portfolio/index.php" class="full-menu-title"><?php echo $main_menu; ?></a>
                    <?php else: ?>
                        <!-- 다른 메뉴들은 기존 방식대로 서브메뉴 포함 -->
                        <div class="menu-wrapper">
                            <a href="javascript:void(0);" class="full-menu-title"><?php echo $main_menu; ?></a>
                            <?php if(!empty($sub_menus)): ?>
                                <ul class="full-submenu">
                                    <?php foreach($sub_menus as $name => $link): ?>
                                        <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<style>
.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 90px;
    padding: 0 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    z-index: 1000;
}

.header.scrolled {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    height: 70px;
}

.header.scrolled .logo .logo_white {
    opacity: 0;
}

.header.scrolled .logo .logo_black {
    opacity: 1;
}

.header.scrolled .nav-link {
    color: #111;
}

.logo {
    height: 40px;
    position: relative;
}

.logo img {
    height: 100%;
    position: absolute;
    transition: opacity 0.3s ease;
}

.logo .logo_white {
    opacity: 1;
}

.logo .logo_black {
    opacity: 0;
}

nav {
    transition: all 0.3s ease;  /* 추가 */
}

.nav-menu {
    display: flex;
    gap: 50px;
    list-style: none;
}

.nav-link {
    position: relative;
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
}

.nav-item {
    position: relative;
    padding-bottom: 20px; /* 서브메뉴와의 간격을 패딩으로 확보 */
}


.sub-menu {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 100%; /* 상위 메뉴 바로 아래 위치 */
    left: 0; /* 왼쪽 정렬로 변경 */
    transform: translateY(10px); /* Y축으로만 변형 */
    min-width: 200px; /* 최소 너비 설정 */
    list-style: none;
    background: rgba(0,0,0,0.8);
    padding: 15px;
    margin-top: -10px; /* 상단 여백 조정 */
    transition: all 0.3s ease;
    border-radius: 5px;
    pointer-events: none;
    z-index: 998;
}

.nav-item .sub-menu {
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    pointer-events: none;
}

.nav-item:hover .sub-menu {
    visibility: visible;
    opacity: 1;
    pointer-events: auto; /* 호버 상태에서 이벤트 활성화 */
}

.sub-menu::before {
    content: '';
    position: absolute;
    top: -20px; /* nav-item의 padding-bottom과 동일한 값 */
    left: 0;
    width: 100%;
    height: 20px;
    background: transparent;
}

.sub-menu a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 10px 15px; /* 클릭 영역 확대 */
    font-size: 14px;
    transition: all 0.3s;
    white-space: nowrap;
}

.sub-menu li {
    padding: 0;
    margin: 0;
}

.sub-menu a:hover {
    color: #aaa;
    background: rgba(255,255,255,0.1); /* 호버 효과 추가 */
    border-radius: 3px;
}

.header-utils {
    display: flex;
    gap: 15px;
}

.search-btn,
.all-menu-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
}

.search-btn img,
.all-menu-btn img {
    width: 24px;
    height: 24px;
    transition: filter 0.3s ease;
}

.header.scrolled .search-btn img,
.header.scrolled .all-menu-btn img {
    filter: brightness(0);
}

.header.scrolled .all-menu-btn img {
    filter: brightness(0);
}

.all-menu-btn {
    position: relative;
    width: 24px;
    height: 24px;
    background: none;
    border: none;
    cursor: pointer;
}

.menu-icon-white {
    opacity: 1;
}

.menu-icon-black {
    opacity: 0;
}

.all-menu-btn img {
    position: absolute;
    top: 0;
    left: 0;
    transition: opacity 0.3s ease;
    width: 24px;
    height: 24px;
}

.menu-icon {
    opacity: 1;
}

.close-icon {
    opacity: 0;
}

.all-menu-btn.active .menu-icon {
    opacity: 0;
}

.all-menu-btn.active .close-icon {
    opacity: 1;
    filter: invert(1); /* X 아이콘을 흰색으로 변경 */
}

.header.menu-open .all-menu-btn .menu-icon-white,
.header.menu-open .all-menu-btn .menu-icon-black {
    opacity: 0;
}

.header.menu-open .all-menu-btn .close-icon {
    opacity: 1;
    filter: invert(1); /* X 아이콘을 흰색으로 변경 */
}

.header.scrolled .menu-icon-white {
    opacity: 0;
}

.all-menu-btn.active .menu-icon-white,
.all-menu-btn.active .menu-icon-black {
    opacity: 0;
}

.header.scrolled .menu-icon-black {
    opacity: 1;
}

.full-menu {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    transform: translateY(-20px);
    display: flex;
    align-items: center;
    justify-content: center;
}

.full-menu.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.full-menu-content {
    opacity: 0;
    transform: translateY(-20px);
    transition: all 0.3s ease;
}

.full-menu.active .full-menu-content {
    opacity: 1;
    transform: translateY(0);
}
.full-menu-list {
    list-style: none;
    text-align: center;
}

.full-menu-item {
    margin-bottom: 15px;
}

.menu-wrapper {
    display: inline-block;
}

.full-menu-title {
    color: #fff;
    font-size: 48px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    text-decoration: none;
    display: block;
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.full-menu-title:hover {
    color: #aaa;
}

.menu-wrapper:hover .full-submenu {
    max-height: 300px; /* 서브메뉴 최대 높이 */
    opacity: 1;
    margin-top: 15px;
}

.full-submenu {
    list-style: none;
    max-height: 0;
    overflow: hidden;
    transition: all 1.2s ease;
    opacity: 0;
}

.full-submenu li {
    margin: 10px 0;
    transform: translateY(-10px);
    transition: transform 0.3s ease;
}

.menu-wrapper:hover .full-submenu li {
    transform: translateY(0);
}

.full-submenu a {
    color: #fff;
    font-size: 18px;
    text-decoration: none;
    transition: color 0.3s ease;
    opacity: 0.8;
}

.header.menu-open {
    background: transparent;
    backdrop-filter: none;
}

.header.menu-open .logo,
.header.menu-open .nav-menu {
    opacity: 0;
    visibility: hidden;
}

.header.menu-open .all-menu-btn {
    position: fixed;
    right: 40px;
    top: 33px;
    z-index: 1001;
}

.full-submenu a:hover {
    color: #aaa;
    opacity: 1;
}
/* 모바일 메뉴 스타일 */
@media (max-width: 768px) {
    .header {
        background: transparent;
        backdrop-filter: none;
    }

    .header.scrolled {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
    }

    .header .logo .logo_white {
        opacity: 1;
    }

    .header .logo .logo_black {
        opacity: 0;
    }

    .header.scrolled .logo .logo_white {
        opacity: 0;
    }

    .header.scrolled .logo .logo_black {
        opacity: 1;
    }

    .header.scrolled .nav-link {
        color: #111;
    }

    .logo {
        height: 32px;
    }

    .header .nav-link {
        color: white;
    }

    .nav-menu {
        display: none; /* 모바일에서는 상단 메뉴 숨김 */
    }

    .full-menu-title {
        font-size: 32px;
    }

    .full-submenu {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .full-submenu a {
        font-size: 16px;
    }

    .full-menu-content {
        padding: 20px;
    }

    .full-menu-item {
        margin-bottom: 25px;
    }


    .menu-wrapper:hover .full-submenu {
        max-height: 300px !important;
        opacity: 1 !important;
        margin-top: 15px !important;
        transition: all 0.3s ease;
    }

    .menu-wrapper:hover .full-submenu li {
        transform: translateY(0);
    }

    .full-submenu li {
        margin: 8px 0;
    }
    .header.menu-open .all-menu-btn {
        right: 20px;
        top: 24px;
    }
    .menu-wrapper.hover .full-submenu,
    .menu-wrapper.active .full-submenu {
        max-height: 300px !important;
        opacity: 1 !important;
        margin-top: 15px !important;
    }
    .full-menu {
        transform: translateY(0);
    }
    
    .menu-wrapper .full-submenu {
        display: none;
        transition: none;
    }
    
    .menu-wrapper.active .full-submenu {
        display: block;
        max-height: none;
        opacity: 1;
        margin-top: 15px;
    }
    
    .full-menu-content {
        transform: none;
    }
    .nav-item {
        padding-bottom: 0;
    }
    .sub-menu {
        position: static;
        transform: none;
        margin-top: 10px;
        width: 100%;
        background: rgba(0,0,0,0.9);
    }
    
    .sub-menu::before {
        display: none;
    }
}

/* 작은 모바일 화면 */
@media (max-width: 480px) {
    .header {
        height: 60px;
        padding: 0 15px;
    }

    .logo {
        height: 28px;
    }

    .full-menu-title {
        font-size: 28px;
    }

    .full-submenu a {
        font-size: 14px;
    }

    .all-menu-btn img {
        width: 22px;
        height: 22px;
    }
    .header.menu-open .all-menu-btn {
        right: 15px;
        top: 19px;
    }
}
</style>

<script>
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const allMenuBtn = document.querySelector('.all-menu-btn');
    const fullMenu = document.querySelector('.full-menu');
    const header = document.querySelector('.header');
    const nav = document.querySelector('nav');
    
    // 메뉴 토글 기능
    allMenuBtn.addEventListener('click', () => {
        allMenuBtn.classList.toggle('active');
        fullMenu.classList.toggle('active');
        header.classList.toggle('menu-open');
        
        if (fullMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
            nav.style.opacity = '0';
            nav.style.visibility = 'hidden';
        } else {
            document.body.style.overflow = '';
            nav.style.opacity = '1';
            nav.style.visibility = 'visible';
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            }
        }
    });

    // 모바일 메뉴 터치/호버 이벤트 처리
    const menuTitles = document.querySelectorAll('.full-menu-title');
    menuTitles.forEach(title => {
        const wrapper = title.closest('.menu-wrapper');
        const subMenu = wrapper.querySelector('.full-submenu');

        if (subMenu) {
            title.addEventListener('click', (e) => {
                e.preventDefault(); // 링크 이동 방지
                
                // 다른 메뉴 닫기
                menuTitles.forEach(otherTitle => {
                    if (otherTitle !== title) {
                        otherTitle.closest('.menu-wrapper').classList.remove('active');
                    }
                });
                
                // 현재 메뉴 토글
                wrapper.classList.toggle('active');
            });

            // 터치 이벤트
            title.addEventListener('touchstart', () => {
                wrapper.classList.add('hover');
            });

            document.addEventListener('touchstart', (e) => {
                if (!wrapper.contains(e.target)) {
                    wrapper.classList.remove('hover');
                }
            });
        }
    });
});
</script>