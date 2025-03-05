<?php
$current_page = basename($_SERVER['PHP_SELF']);

$menu_links = [
    'COMPANY' => [
        '회사소개' => '/mncos2/company/about.php',
        '연혁' => '/mncos2/company/history.php',
        'CEO 인사말' => '/mncos2/company/ceo.php',
        '인증서' => '/mncos2/company/certification.php'
    ],
    'WORKS' => [
        '사업분야' => '/mncos2/works/business.php',
        'OEM/ODM' => '/mncos2/works/oem.php'
    ],
    'PORTFOLIO' => '/mncos2/portfolio/index.php',
    'CONTACT' => [
        '찾아오시는 길' => '/mncos2/contact/map.php',
        '문의하기' => '/mncos2/contact/inquiry.php'
    ],
    'BOARD' => [
        '공지사항' => '/mncos2/board/index.php',
        '갤러리' => '/mncos2/gallery/index.php'
    ]
];

function isActiveMenu($page_name) {
    global $current_page;
    return (strpos($current_page, strtolower($page_name)) !== false) ? 'active' : '';
}
?>

<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
   
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<header class="header">
    <h1 class="logo">
        <a href="/mncos2/">
            <img src="/mncos2/images/common/logo_w.png" alt="M&COS" class="logo_white">
            <img src="/mncos2/images/common/logo.png" alt="M&COS" class="logo_black">
        </a>
    </h1>
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
            <?php 
            $index = 0;
            foreach($menu_links as $main_menu => $sub_menus): 
            ?>
                <li class="full-menu-item" style="--index: <?php echo $index; ?>">
                    <?php if($main_menu === 'PORTFOLIO'): ?>
                        <!-- PORTFOLIO 메뉴는 직접 링크로 처리 -->
                        <a href="/mncos2/portfolio/index.php" class="full-menu-title"><?php echo $main_menu; ?></a>
                    <?php else: ?>
                        <!-- 다른 메뉴들은 기존 방식대로 서브메뉴 포함 -->
                        <div class="menu-wrapper">
                            <a href="javascript:void(0);" class="full-menu-title"><?php echo $main_menu; ?></a>
                            <?php if(!empty($sub_menus)): ?>
                                <ul class="full-submenu">
                                    <?php 
                                    $index = 0;
                                    foreach($sub_menus as $name => $link): 
                                    ?>
                                        <li style="--index: <?php echo $index; ?>">
                                            <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
                                        </li>
                                    <?php 
                                    $index++;
                                    endforeach; 
                                    ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php 
            $index++;
            endforeach; 
            ?>
        </ul>
    </div>
</div>

<script>
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
        if(document.body.classList.contains('sub-page')) {
            header.classList.add('white');
        }
    } else {
        header.classList.remove('scrolled');
        header.classList.remove('white');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const allMenuBtn = document.querySelector('.all-menu-btn');
    const fullMenu = document.querySelector('.full-menu');
    const header = document.querySelector('.header');
    
    // 메뉴 토글 기능
    allMenuBtn.addEventListener('click', () => {
        allMenuBtn.classList.toggle('active');
        fullMenu.classList.toggle('active');
        header.classList.toggle('menu-open');
        
        if (fullMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
                if(document.body.classList.contains('sub-page')) {
                    header.classList.add('white');
                }
            }
        }
    });

    // 전체메뉴 서브메뉴 토글
    const menuWrappers = document.querySelectorAll('.menu-wrapper');
    menuWrappers.forEach(wrapper => {
        const title = wrapper.querySelector('.full-menu-title');
        const submenu = wrapper.querySelector('.full-submenu');
        
        if (title && submenu) {
            title.addEventListener('click', (e) => {
                e.preventDefault();
                wrapper.classList.toggle('active');
            });
        }
    });
});
</script>