<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

run_event('pre_head');

include_once(G5_PATH . '/head.sub.php');

// 메인 페이지 체크를 위한 더 정확한 방법
$isMain = false;

// 추가적인 체크를 위한 현재 페이지 경로
$pagename = basename($_SERVER["PHP_SELF"]);
// URL이 루트 디렉토리이거나 index.php인 경우도 체크
if ($pagename === 'index.php') {
    $isMain = true;
}
?>

<!-- 상단 시작 { -->
<!-- header -->
<header class="<?php echo $isMain ? 'is-main' : ''; ?>">
    <div class="logo">
        <a href="<?php echo G5_URL ?>/index.php">
            <img src="<?php echo G5_CSS_URL ?>/images/logo.svg" alt="로고" />
            <span class="logo-text">Logo</span>
        </a>
    </div>
    <!-- 모바일 nav -->
    <button class="mobile-menu-btn">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>
    <!-- pc nav -->
    <nav class="main-nav">

        <div class="nav-container">
            <ul class="main-menu">
                <li class="nav-item">
                    <a href="<?php echo G5_ABOUT_URL ?>/about.php" class="nav-link">회사소개<svg class="mobile-icon"
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#3c3c3c">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo G5_ABOUT_URL ?>/about.php">인사말</a></li>
                        <li><a href="<?php echo G5_ABOUT_URL ?>/history.php">연혁</a></li>
                        <li><a href="<?php echo G5_ABOUT_URL ?>/vision.php">비전</a></li>
                        <li><a href="<?php echo G5_ABOUT_URL ?>/philosophy.php">경영이념</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo G5_DOMAIN_URL ?>/domain.php" class="nav-link">도메인<svg class="mobile-icon"
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#3c3c3c">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo G5_DOMAIN_URL ?>/domain.php">도메인이란?</a></li>
                        <li>
                            <a href="<?php echo G5_DOMAIN_URL ?>/topLevelDomain.php">국가 최상위 도메인</a>
                        </li>
                        <li><a href="<?php echo G5_DOMAIN_URL ?>/countryDomain.php">국가 도메인</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo G5_URL ?>/promotion.php" class="nav-link">웹통합프로모션</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo G5_BUSINESS_URL ?>/business.php" class="nav-link">사업영역<svg class="mobile-icon"
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#3c3c3c">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1" class="nav-url">주요사업</a></li>
                        <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section2" class="nav-url">홈페이지</a></li>
                        <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section3" class="nav-url">모바일 웹</a></li>
                        <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section4" class="nav-url">온라인 마케팅</a>
                        </li>
                        <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section5" class="nav-url">빅데이터</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo short_url_clean(G5_URL . '/portfolio.php?bo_table=portfolio') ?>"
                        class="nav-link">포트폴리오</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/notice.php?bo_table=notice') ?>"
                        class="nav-link">고객센터<svg class="mobile-icon" xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#3c3c3c">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/notice.php?bo_table=notice') ?>">
                                공지사항
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/gallery.php?bo_table=gallery') ?>">
                                갤러리
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/faq.php?bo_table=faq') ?>">
                                자주 하시는
                                질문
                            </a>
                        </li>
                        <li><a href="<?php echo G5_COMMUNITY_URL ?>/contact.php">문의하기</a></li>
                    </ul>
                </li>
                <!-- 로그아웃 -->
                <?php if ($is_admin && !G5_IS_MOBILE) { ?>
                    <li class="nav-item">
                        <button type="button" class="logout-btn"
                            onclick="location.href='<?php echo G5_URL ?>/logout.php'">로그아웃</button>
                    </li>
                <?php } ?>

            </ul>
        </div>


        <div class="nav-right-mobile">
            <a href="<?php echo G5_URL ?>/sitemap.php" class="nav-right-item all-menu">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#3c3c3c">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg>
                전체메뉴
            </a>

            <a href="javascript:void(0);" class="nav-right-item language-menu">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#3c3c3c">
                    <path
                        d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-82q26-36 45-75t31-83H404q12 44 31 83t45 75Zm-104-16q-18-33-31.5-68.5T322-320H204q29 50 72.5 87t99.5 55Zm208 0q56-18 99.5-55t72.5-87H638q-9 38-22.5 73.5T584-178ZM170-400h136q-3-20-4.5-39.5T300-480q0-21 1.5-40.5T306-560H170q-5 20-7.5 39.5T160-480q0 21 2.5 40.5T170-400Zm216 0h188q3-20 4.5-39.5T580-480q0-21-1.5-40.5T574-560H386q-3 20-4.5 39.5T380-480q0 21 1.5 40.5T386-400Zm268 0h136q5-20 7.5-39.5T800-480q0-21-2.5-40.5T790-560H654q3 20 4.5 39.5T660-480q0 21-1.5 40.5T654-400Zm-16-240h118q-29-50-72.5-87T584-782q18 33 31.5 68.5T638-640Zm-234 0h152q-12-44-31-83t-45-75q-26 36-45 75t-31 83Zm-200 0h118q9-38 22.5-73.5T376-782q-56 18-99.5 55T204-640Z" />
                </svg>
                ENG
            </a>

            <a href="" class="nav-right-item search-menu">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#3c3c3c">
                    <path
                        d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
            </a>

        </div>

    </nav>

    <!-- 전체메뉴 -->
    <div class="nav-right">
        <a href="<?php echo G5_URL ?>/sitemap.php" class="nav-right-item all-menu">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg>
            전체메뉴
        </a>

        <a href="" class="nav-right-item language-menu">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path
                    d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-82q26-36 45-75t31-83H404q12 44 31 83t45 75Zm-104-16q-18-33-31.5-68.5T322-320H204q29 50 72.5 87t99.5 55Zm208 0q56-18 99.5-55t72.5-87H638q-9 38-22.5 73.5T584-178ZM170-400h136q-3-20-4.5-39.5T300-480q0-21 1.5-40.5T306-560H170q-5 20-7.5 39.5T160-480q0 21 2.5 40.5T170-400Zm216 0h188q3-20 4.5-39.5T580-480q0-21-1.5-40.5T574-560H386q-3 20-4.5 39.5T380-480q0 21 1.5 40.5T386-400Zm268 0h136q5-20 7.5-39.5T800-480q0-21-2.5-40.5T790-560H654q3 20 4.5 39.5T660-480q0 21-1.5 40.5T654-400Zm-16-240h118q-29-50-72.5-87T584-782q18 33 31.5 68.5T638-640Zm-234 0h152q-12-44-31-83t-45-75q-26 36-45 75t-31 83Zm-200 0h118q9-38 22.5-73.5T376-782q-56 18-99.5 55T204-640Z" />
            </svg>
            ENG
        </a>

        <a href="" class="nav-right-item search-menu">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path
                    d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
            </svg>
        </a>
    </div>


</header>
<!-- } 상단 끝 -->
<!-- 포트폴리오 비밀번호 확인 모달 추가 -->
<div id="portfolio-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <h3>비밀번호 확인</h3>
        <p>포트폴리오를 보시려면 비밀번호를 입력해주세요.</p>
        <input type="password" id="portfolio-password" placeholder="비밀번호를 입력하세요">
        <button class="confirm" onclick="checkPortfolioPassword()">확인</button>
        <button class="cancel" onclick="closePortfolioModal()">취소</button>
    </div>
</div>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transition: 0.3s ease-in-out;

    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 30px;
        border: 1px solid #888;
        width: 360px;
        text-align: center;
        border-radius: 8px;
        color: black !important;
    }

    @media (max-width: 768px) {
        .modal-content {
            width: 300px;
            padding: 20px;
        }
    }

    .modal-content h3 {
        font-size: 18px;
        color: #3c3c3c;
        margin-bottom: 8px;
    }

    .modal-content p {
        font-size: 13px;
        color: #3c3c3c;
        margin-bottom: 8px;
    }

    .modal-content input {
        width: 100%;
        padding: 14px;
        margin: 10px 0;
        box-sizing: border-box;
        border: 1px solid #e1dddd;
        border-radius: 4px;
        font-size: 13px;
    }

    .modal-content button {
        padding: 12px 30px;
        margin: 5px;
        cursor: pointer;
        border-style: none;
        border-radius: 4px;
        font-weight: bold;
    }

    .modal-content>.confirm {
        background: #285DCD;
        color: #fff;
    }

    .modal-content>.cancel {
        color: #3c3c3c;
    }
</style>

<script>
    // 현재 페이지가 portfolio.php인지 확인하는 함수
    function isPortfolioPage() {
        return window.location.pathname.includes('portfolio');
    }

    // 포트폴리오 링크 수정
    document.addEventListener('DOMContentLoaded', function () {
        const portfolioLink = document.querySelectorAll('a[href*="/portfolio"]');
        portfolioLink.forEach(link => {
            link.addEventListener('click', function (e) {
                // 현재 portfolio.php 페이지에 있다면 그냥 리로드
                if (isPortfolioPage()) {
                    return true;
                }

                e.preventDefault();
                // showPortfolioModal();
                checkPortfolioStatus();
            });
        });
    });

    // 포트폴리오 접근 권한 확인
    function checkPortfolioStatus() {
        fetch('<?php echo G5_URL ?>/check_portfolio_status.php')
            .then(response => response.json())
            .then(data => {
                if (data.authorized) {
                    window.location.href = '<?php echo short_url_clean(G5_URL . '/portfolio.php?bo_table=portfolio') ?>';
                } else {
                    showPortfolioModal();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('오류가 발생했습니다. 다시 시도해주세요.');
            });
    }

    function showPortfolioModal() {
        document.getElementById('portfolio-modal').style.display = 'block';
    }

    function closePortfolioModal() {
        document.getElementById('portfolio-modal').style.display = 'none';
        document.getElementById('portfolio-password').value = '';
    }

    function checkPortfolioPassword() {
        const password = document.getElementById('portfolio-password').value;

        // AJAX 요청
        fetch('<?php echo G5_URL ?>/check_portfolio_password.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'password=' + encodeURIComponent(password)
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '<?php echo G5_URL ?>/portfolio.php?bo_table=portfolio';
                } else {
                    alert('비밀번호가 일치하지 않습니다.');
                    document.getElementById('portfolio-password').value = '';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('오류가 발생했습니다. 다시 시도해주세요.');
            });
    }

    // ESC 키로 모달 닫기
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closePortfolioModal();
        }
    });

    // 페이지 로드 시 실행되는 함수
    function initBusinessScroll() {
        // business.php로 이동한 경우에만 실행
        if (window.location.pathname.includes('business.php')) {
            const hash = window.location.hash;
            if (hash) {
                setTimeout(() => {
                    const targetSection = document.querySelector(hash);
                    if (targetSection) {
                        targetSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }, 100);
            }
        }
    }

    // 네비게이션 링크 클릭 이벤트
    const navLinks = document.querySelectorAll('.nav-url');
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            const isBusinessPage = window.location.pathname.includes('business.php');

            // 모바일 환경(1279px 이하)에서 메뉴 닫기
            if (window.innerWidth <= 1279) {
                const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
                const mainNav = document.querySelector('.main-nav');

                mobileMenuBtn.classList.remove('active');
                mainNav.classList.remove('active');
                document.body.classList.remove('menu-open');
            }

            // business.php 페이지 내부에서의 클릭
            if (isBusinessPage) {
                e.preventDefault();
                const hash = href.split('#')[1];
                const targetSection = document.getElementById(hash);

                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    history.pushState(null, null, `#${hash}`);
                    updateActiveMenu(hash);
                }
            }
        });
    });

    // 활성 메뉴 업데이트 함수
    function updateActiveMenu(currentSection) {
        const navLinks = document.querySelectorAll('.nav-url');
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(`#${currentSection}`)) {
                link.classList.add('active');
            }
        });
    }

    // 스크롤 이벤트
    if (window.location.pathname.includes('business.php')) {
        window.addEventListener('scroll', function () {
            const sections = document.querySelectorAll('section[id]');

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;

                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    updateActiveMenu(section.id);
                }
            });
        });
    }

    // 페이지 로드와 popstate 이벤트에서 초기화 실행
    window.addEventListener('load', initBusinessScroll);
    window.addEventListener('popstate', initBusinessScroll);

    // 기존 스크립트는 유지하고 아래 코드 추가
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mainNav = document.querySelector('.main-nav');
        const navItems = document.querySelectorAll('.nav-item');
        const hasDropdown = document.querySelector('.dropdown-menu');

        // 햄버거 메뉴 토글
        mobileMenuBtn.addEventListener('click', function () {
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            if (hasDropdown) {
                navItems.forEach(item => item.classList.remove('active'));
            }
        });

        // 모바일에서 서브메뉴 토글
        if (window.innerWidth <= 768) {
            navItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                const hasDropdown = item.querySelector('.dropdown-menu');

                if (hasDropdown) {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        navItems.forEach(otherItem => {
                            if (otherItem !== item) {
                                otherItem.classList.remove('active');
                            }
                        });
                        item.classList.toggle('active');
                    });
                }
            });
        }

        // 리사이즈 시 모바일 메뉴 초기화
        window.addEventListener('resize', function () {
            if (window.innerWidth > 768) {
                mobileMenuBtn.classList.remove('active');
                mainNav.classList.remove('active');
                document.body.classList.remove('menu-open');
                navItems.forEach(item => item.classList.remove('active'));
            }
        });

        // 모바일 메뉴 외부 클릭 시 닫기
        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 768) {
                if (!e.target.closest('.main-nav') && !e.target.closest('.mobile-menu-btn')) {
                    mobileMenuBtn.classList.remove('active');
                    mainNav.classList.remove('active');
                    document.body.classList.remove('menu-open');
                }
            }
        });
    });

    // 모달 외부 클릭시 닫기
    window.onclick = function (e) {
        const modal = document.getElementById('portfolio-modal');
        if (e.target == modal) {
            closePortfolioModal();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const mainNav = document.querySelector('.main-nav');
        const header = document.querySelector('header');

        // hover 시작할 때
        mainNav.addEventListener('mouseenter', function () {
            header.classList.add('nav-hover');
        });

        // hover 끝날 때
        mainNav.addEventListener('mouseleave', function () {
            header.classList.remove('nav-hover');
        });
    });
</script>
<hr>

<!-- 콘텐츠 시작 { -->
<div>
    <?php if (!defined("_INDEX_")) { ?>
        <h2 id="container_title"><span
                title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span>
        </h2>
    <?php }

