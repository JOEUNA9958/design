<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');
include_once(G5_PATH . '/index.list.php');


add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/main.css">', 0);
?>

<!-- 메인 홈 화면 -->

<main class="main" style="scroll-snap-type: y mandatory;">

    <!-- side-menu -->

    <ul id="menu" style="display: block;">
        <li data-menuanchor="firstPage" class="active"><a href="#firstPage" title="메인 화면으로 스크롤 이동" class="">
                <div class="line"></div>
                <p><span>01</span>Main</p>
            </a></li>
        <li data-menuanchor="secondPage"><a href="#secondPage" title="재단사업 화면으로 스크롤 이동" class="">
                <div class="line"></div>
                <p><span>02</span>Domain</p>
            </a></li>
        <li data-menuanchor="thirdPage" class=""><a href="#thirdPage" title="알림마당 화면으로 스크롤 이동" class="">
                <div class="line"></div>
                <p><span>03</span>Business</p>
            </a></li>
        <li data-menuanchor="fourthPage" class=""><a href="#fourthPage" title="알림마당 화면으로 스크롤 이동" class="">
                <div class="line"></div>
                <p><span>04</span>News</p>
            </a></li>
    </ul>

    <aside class="side main">
        <div class="sideSearch">
            <a href="#"> <svg class="search-svg" xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path
                        d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>통합검색</a>
        </div>
        <div class="topBtn">
            <a class="moveFullpagesTop" href="#firstPage" title="상단으로 이동"><svg class="top-svg"
                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#ffffff">
                    <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
                </svg>TOP</a>
        </div>
    </aside>

    <!-- 섹션 1: Swiper -->
    <div class="swiper main-slider snap-section" id="firstPage">
        <div class="swiper-wrapper">
            <!-- 첫 번째 슬라이드 (영상) -->
            <div class="swiper-slide">
                <img src="<?php echo G5_CSS_URL ?>/images/main/main_bg_1.jpg" alt="슬라이드 2" class="slide-bg" />
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <div class="text-container">
                        <div class="text">
                            <h2 class="subtitle-en">Korea Internet &amp; Security Agency</h2>
                            <h3 class="slide-title">
                                [<span class="company-name" data-text="THE"></span>
                                <span class="typing" id="typing-text">
                                    THE</span>] <br>
                                국가도메인 실시간 등록 <br>
                                <b>이제는 쉽고 편한</b> 한글도메인으로
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 두 번째 슬라이드 (이미지) -->
            <div class="swiper-slide">
                <img src="<?php echo G5_CSS_URL ?>/images/main/main_bg_2.jpeg" alt="슬라이드 2" class="slide-bg" />
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <div class="text-container">
                        <div class="text">
                            <h2 class="subtitle-en">Korea Internet &amp; Security Agency</h2>
                            <h3 class="slide-title">
                                [<span class="company-name " data-text="THE"></span>
                                <span class="typing" id="typing-text">
                                    THE</span>]는 <br>
                                안전하고 신뢰할 수 있는 <br>
                                <b>국가도메인 미래사회</b>를 선도합니다.
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 세 번째 슬라이드 (이미지) -->
            <div class="swiper-slide">
                <img src="<?php echo G5_CSS_URL ?>/images/main/main_bg_3.jpg" alt="슬라이드 3" class="slide-bg" />
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <div class="text-container">
                        <div class="text">
                            <h2 class="subtitle-en">Korea Internet &amp; Security Agency</h2>
                            <h3 class="slide-title">
                                [<span class="company-name" data-text="THE"></span>
                                <span class="typing" id="typing-text">
                                    THE</span>]는 <br>
                                안전하고 신뢰할 수 있는 <br>
                                <b>디지털 미래사회</b>를 선도합니다.
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swiper 버튼을 커스텀 버튼으로 교체 -->
        <div class="swiper-button-container">
            <div class="swiper-button">
                <div class="wrapper__swiper-button">
                    <!-- 페이지네이션 -->
                    <div class="swiper-pagination"></div>
                    <div class="custom-navigation">
                        <div class="nav-fraction">
                            <span class="current">01</span>
                            <span class="separator">/</span>
                            <span class="total">03</span>
                        </div>
                        <div class="nav-controls">
                            <button class="nav-prev">
                                <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main_slider_btn_left.svg"
                                    alt="왼쪽 화살표 버튼" />
                            </button>
                            <button class="nav-pause">
                                <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main_slider_btn_pause.svg"
                                    alt="정지 버튼" />
                            </button>
                            <button class="nav-next">
                                <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main_slider_btn_right.svg"
                                    alt="오른쪽 화살표 버튼" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="banner-container">
            <div class="banner-wrapper">
                <article class="section5-banner">
                    <div class="section5-banner-wrapper">
                        <h2>사회공헌</h2>
                        <div class="banner_5">
                            <a class="section5-banner-link" href="<?php echo G5_URL ?>/promotion.php">
                            </a>
                        </div>
                    </div>
                    <div class="section5-banner-wrapper">
                        <h2>역량강화</h2>
                        <div class="banner_6">
                            <a class="section5-banner-link" href="<?php echo G5_URL ?>/promotion.php">
                            </a>
                        </div>
                    </div>
                </article>   

                <article class="banner">
                    <!-- 첫 번째 행 -->
                    <div class="banner_8 fade-in-element">
                        <a class="banner-link" href="<?php echo G5_DOMAIN_URL ?>/domain.php"></a>
                    </div>

                    <!-- 두 번째 행 -->
                    <div class="second-row">
                        <div class="banner_1 fade-in-element">
                            <a class="banner-link" href="<?php echo G5_DOMAIN_URL ?>/domain.php"></a>
                        </div>
                        <div class="banner_2 fade-in-element">
                            <a class="banner-link" href="<?php echo G5_DOMAIN_URL ?>/topLevelDomain.php"></a>
                        </div>
                        <div class="banner_3 fade-in-element">
                            <a class="banner-link" href="<?php echo G5_DOMAIN_URL ?>/countryDomain.php"></a>
                        </div>
                        <div class="banner_4 fade-in-element">
                            <a class="banner-link" href="<?php echo G5_DOMAIN_URL ?>/domain.php"></a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <!-- scroll -->
    <div class="scrollDown">
        <div class="border"><span class="moveYani"></span></div>
        <p>KOREA</p>
    </div>



    <!-- 섹션 2: 도메인 리스트 -->
    <section class="domain-showcase snap-section" id="secondPage">
        <div class="domain-header">
            <h2 class="domain-title fade-up delay-2">당신의 브랜드,</h2>
            <p class="domain-subtitle fade-up delay-3">우리의 한글 도메인으로 더 가까워집니다.</p>
        </div>

        <!-- 버튼 목록 -->
        <div class="domain-button-wrapper">
            <div class="domain-button-list">
                <button>공공기관</button>
                <button>기업</button>
                <button>의료</button>
                <button>음식</button>
                <button>교육</button>
                <button>기타</button>
            </div>

        </div>

        <div class="swiper-container marquee-wrapper">
            <!-- 첫 번째 줄 -->
            <div class="swiper marquee-swiper first-line" data-direction="right">
                <div class="swiper-wrapper-2">
                    <div class="swiper-slide-2">
                        <div class="url-list">
                            <a href="http://국민건강보험.한국" target="_blank" class="url-item">
                                <span class="url-name">국민건강보험.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">국민건강보험</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://교보문고.한국" target="_blank" class="url-item">
                                <span class="url-name">교보문고.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">교보문고</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://서울시청.한국" target="_blank" class="url-item">
                                <span class="url-name">서울시청.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">서울시청</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://신세계.한국" target="_blank" class="url-item">
                                <span class="url-name">신세계.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">신세계</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://초코파이.한국" target="_blank" class="url-item">
                                <span class="url-name">초코파이.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">오리온</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://완도전복.kr" target="_blank" class="url-item">
                                <span n class="url-name">완도전복.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">완도전복(주)</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://쿠팡.kr" target="_blank" class="url-item">
                                <span class="url-name">쿠팡.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">쿠팡</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://국세청.kr" target="_blank" class="url-item">
                                <span class="url-name">국세청.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">국세청</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://치약.kr" target="_blank" class="url-item">
                                <span class="url-name">치약.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">뷰센</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://문화방송.한국" target="_blank" class="url-item">
                                <span class="url-name">문화방송.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">MBC문화방송</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://매니지먼트.kr/" target="_blank" class="url-item">
                                <span class="url-name">매니지먼트.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">hs엔터테인먼트</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://검찰청.한국" target="_blank" class="url-item">
                                <span class="url-name">검찰청.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">검찰청</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://부산시청.한국" target="_blank" class="url-item">
                                <span class="url-name">부산시청.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">부산시청</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://국가도메인.kr" target="_blank" class="url-item">
                                <span class="url-name">국가도메인.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">아이디코리아</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://법무부.kr" target="_blank" class="url-item">
                                <span class="url-name">법무부.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">법무부</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://두산.kr" target="_blank" class="url-item">
                                <span class="url-name">두산.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">(주)두산</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 두 번째 줄 -->
            <div class="swiper marquee-swiper second-line" data-direction="left">
                <div class="swiper-wrapper-2">
                    <div class="swiper-slide-2">
                        <div class="url-list">
                            <a href="http://스타벅스.kr" target="_blank" class="url-item">
                                <span class="url-name">스타벅스.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">스타벅스</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://들기름.kr" target="_blank" class="url-item">
                                <span class="url-name">들기름.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">오일장영농조합법인</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://커피믹스.kr" target="_blank" class="url-item">
                                <span class="url-name">커피믹스.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">동서식품</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://생강.kr" target="_blank" class="url-item">
                                <span class="url-name">생강.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">인동종가</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://인삼.kr" target="_blank" class="url-item">
                                <span class="url-name">인삼.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">한국인삼공사</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://네이버.한국" target="_blank" class="url-item">
                                <span class="url-name">네이버.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">네이버</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://뚜레쥬르.kr" target="_blank" class="url-item">
                                <span class="url-name">뚜레쥬르.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">뚜레쥬르</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://국민연금.한국" target="_blank" class="url-item">
                                <span class="url-name">국민연금.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">국민연금공단</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://장기요양.kr" target="_blank" class="url-item">
                                <span class="url-name">장기요양.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">국민건강보험</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://국민카드.kr" target="_blank" class="url-item">
                                <span class="url-name">국민카드.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">국민카드</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://배추김치.kr" target="_blank" class="url-item">
                                <span class="url-name">배추김치.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">이남장금치</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://비누.한국" target="_blank" class="url-item">
                                <span class="url-name">비누.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">라이온코리아(주)</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://배즙.kr" target="_blank" class="url-item">
                                <span class="url-name">배즙.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">농업화사법인(주)더끌림
                                    </span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://수원시청.한국" target="_blank" class="url-item">
                                <span class="url-name">수원시청.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">수원시청</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://네이트.한국" target="_blank" class="url-item">
                                <span class="url-name">네이트.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">네이트온</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://기업은행.한국" target="_blank" class="url-item">
                                <span class="url-name">기업은행.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">기업은행</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://신세계.한국" target="_blank" class="url-item">
                                <span class="url-name">신세계.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">신세계</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://초코파이.한국" target="_blank" class="url-item">
                                <span class="url-name">초코파이.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">오리온</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <!-- 15 -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- 세 번째 줄 -->
            <div class="swiper marquee-swiper third-line" data-direction="right">
                <div class="swiper-wrapper-2">
                    <div class="swiper-slide-2">
                        <div class="url-list">
                            <a href="http://곱창이야기.한국" target="_blank" class="url-item">
                                <span class="url-name">곱창이야기.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">곱창이야기</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://햇반.kr" target="_blank" class="url-item">
                                <span class="url-name">햇반.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">cj제일제당</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://이마트.kr" target="_blank" class="url-item">
                                <span class="url-name">이마트.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">이마트</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://서울대병원.kr" target="_blank" class="url-item">
                                <span class="url-name">서울대병원.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">서울대병원</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://농협.한국" target="_blank" class="url-item">
                                <span class="url-name">농협.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">농협</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            </a>
                            <a href="http://네이트.한국" target="_blank" class="url-item">
                                <span class="url-name">네이트.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">네이트</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://창업지원센터.한국" target="_blank" class="url-item">
                                <span class="url-name">창업지원센터.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">동산기획</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://농협.한국" target="_blank" class="url-item">
                                <span class="url-name">농협.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">농협</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://찰보리.kr" target="_blank" class="url-item">
                                <span class="url-name">찰보리.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">이레우리밀</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://코로나19예방접종.kr" target="_blank" class="url-item">
                                <span class="url-name">코로나19예방접종.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">보건소</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://인터넷뱅킹.kr/" target="_blank" class="url-item">
                                <span class="url-name">인터넷뱅킹.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">우리은행</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://이사의달인.kr/" target="_blank" class="url-item">
                                <span class="url-name">이사의달인.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">김병만이사의달인</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://간장.kr/" target="_blank" class="url-item">
                                <span class="url-name">간장.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">샘표</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://예금.kr/" target="_blank" class="url-item">
                                <span class="url-name">예금.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">국민은행</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://순대.kr" target="_blank" class="url-item">
                                <span class="url-name">순대.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">병천순대</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://치과인테리어.kr" target="_blank" class="url-item">
                                <span class="url-name">치과인테리어.kr</span>
                                <div class="url-box">
                                    <span class="url-desc">오스템임플란트</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://신세계.한국" target="_blank" class="url-item">
                                <span class="url-name">신세계.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">신세계</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                            <a href="http://초코파이.한국" target="_blank" class="url-item">
                                <span class="url-name">초코파이.한국</span>
                                <div class="url-box">
                                    <span class="url-desc">오리온</span>
                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_main-3.svg" class="url-ic" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- 섹션 4:  -->
    <section class="snap-section" id="thirdPage">
        <div class="bg-image" id="bg-image-1"></div>
        <div class="bg-image" id="bg-image-2"></div>
        <div class="fp-tableCell" style="height: 922px;">
            <div data-bg="01" class="content main_business">
                <div class="inner">
                    <h2>Business</h2>
                    <h3>THE 사업</h3>
                    <article class="n01 on" data-num="01">
                        <div class="title">
                            <p class="num">
                                <span class="txt">01</span>
                                <span class="imgs"></span>
                            </p>
                            <p class="sbj">
                                Domain <b>도메인</b>
                            </p>
                        </div>
                        <div class="cont">
                            <div class="cyber_achive_slide">
                                <div
                                    class="sli_cyber swiper-container-3 swiper-container-initialized swiper-container-horizontal">
                                    <ul class="swiper-wrapper">
                                        <li class="cy_sl swiper-slide swiper-slide-3 isIntersecting3 swiper-slide-active"
                                            style="width: 443px;">
                                            <p class="bold">01. 도메인</p>
                                            <p class="txt">
                                                - 원하는 사이트에 방문하기 위해 인터넷 주소창에 입력하는 www. 주소<br>
                                                - 도메인을 보다 편리한 방식으로 사용하고자 하는 요구를 반영하여 한글 도메인이 등장<br>
                                            </p>
                                            <a href="<?php echo G5_DOMAIN_URL ?>/domain.php" class="more">자세히 보기</a>
                                        </li>
                                        <li class="cy_sl swiper-slide swiper-slide-3 swiper-slide-next"
                                            style="width: 443px;">
                                            <p class="bold">02. 국가 최상위 도메인</p>
                                            <p class="txt">
                                                - ISO-3166 국가코드 체계에 따라 세계 각국을 두 자리 영문약자로 표현한 약 190여 개의 국가도메인<br>
                                                - 한국의 경우 '.kr'과 '.한국'으로 구분되며, '.com', '.net' 등과 같은 국제 단체의 도메인 이름에
                                                배당된 고유
                                                부호를 최상위 도메인으로 취급
                                            </p>
                                            <a href="<?php echo G5_DOMAIN_URL ?>/topLevelDomain.php" class="more">자세히
                                                보기</a>
                                        </li>
                                        <li class="cy_sl swiper-slide swiper-slide-3" style="width: 443px;">
                                            <p class="bold">03. 국가 도메인</p>
                                            <p class="txt">
                                                - 한글 등을 입력하면
                                                영어 주소로 변환<br>
                                                - 포털 등을 거치지 않고
                                                해당 사이트로 곧바로 연결<br>
                                                - 일부 국가는 자국민이나
                                                자국 기업/단체에게만 도메인 등록 허용
                                            </p>
                                            <a href="<?php echo G5_DOMAIN_URL ?>/countryDomain.php" class="more">자세히
                                                보기</a>
                                        </li>
                                    </ul>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                                <div class="btns">
                                    <button type="button" class="ach_btn prev swiper-button-disabled" title="주요성과 이전"
                                        tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#fff">
                                            <path
                                                d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z" />
                                        </svg></button>
                                    <button type="button" class="ach_btn play" title="주요성과 재생"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#fff">
                                            <path d="M320-200v-560l440 280-440 280Z" />
                                        </svg></button>
                                    <button type="button" class="ach_btn next" title="주요성과 다음" tabindex="0"
                                        role="button" aria-label="Next slide" aria-disabled="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#fff">
                                            <path
                                                d="m560-240-56-58 142-142H160v-80h486L504-662l56-58 240 240-240 240Z" />
                                        </svg></button>
                                </div>

                                <script>
                                    // 주요성과 슬라이드
                                    var cyberSwiper = new Swiper(".sli_cyber", {
                                        loop: false,
                                        speed: 1000,
                                        autoplay: false,
                                        navigation: {
                                            nextEl: '.ach_btn.next',
                                            prevEl: '.ach_btn.prev',
                                        }
                                    });

                                    $('.ach_btn.play').on('click', function () {
                                        if ($(this).hasClass('on')) {
                                            //  '<span class="blind">재생</span>';
                                            var achBtnHtml = `
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                <path d="M320-200v-560l440 280-440 280Z" />
            </svg>
        `;
                                            $(this).removeClass('on');
                                            $(this).attr('title', '재생');
                                            $(this).html(achBtnHtml);
                                            cyberSwiper.autoplay.stop();
                                        } else {
                                            // var achBtnHtml = '<span class="blind">멈춤</span>';
                                            $(this).addClass('on');
                                            $(this).attr('title', '멈춤');
                                            var achBtnHtml = `
            <img src="${g5_css_url}/images/icon/main/ic_main_slider_btn_pause.svg" alt="정지 버튼" />
        `;
                                            $(this).html(achBtnHtml);

                                            cyberSwiper.autoplay.start();
                                        }
                                    })

                                </script>
                            </div>
                            <div class="platform_tab_wrap">
                                <div class="text">
                                    <p>
                                        <b>THE</b>
                                        <span>Knowledge platform</span>
                                    </p>
                                    <ul class="ma_platform_tab">
                                        <li>
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php" class="active">사업영역</a>
                                        </li>
                                        <li>
                                            <a
                                                href="<?php echo short_url_clean(G5_URL . '/portfolio.php?bo_table=portfolio') ?>">포트폴리오</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cover2">
                                    <img style="width: 200px; opacity: 0.7;"
                                        src="<?php echo G5_CSS_URL ?>/images/main/main_cover_2.png" alt="">
                                </div>
                            </div>
                            <script>
                                // 탭
                                $('.ma_platform_tab > li > a').on('click focusin', function () {
                                    $('.ma_platform_tab > li > a').removeClass('active');
                                    $(this).addClass('active')
                                })
                            </script>
                        </div>
                    </article>

                    <article class="n02" data-num="02">
                        <div class="title">
                            <p class="num">
                                <span class="txt">02</span>
                                <span class="imgs"></span>
                            </p>
                            <p class="sbj">
                                About <b>경영 이념과 비전</b>
                            </p>
                        </div>
                        <div class="cont">
                            <div class="half">
                                <a href="<?php echo G5_ABOUT_URL ?>/philosophy.php" class="haking_banner"
                                    target="_blank" rel="noopener noreferrer" title="새창열림"><img
                                        src="<?php echo G5_CSS_URL ?>/images/main/main_banner-2.jpg"
                                        alt="우리의 경영 이념"></a>
                            </div>
                            <div class="half">
                                <a href="<?php echo G5_ABOUT_URL ?>/vision.php" class="haking_banner" target="_blank"
                                    rel="noopener noreferrer" title="새창열림"><img
                                        src="<?php echo G5_CSS_URL ?>/images/main/main_banner-3.jpg" alt="우리의 비전"></a>
                            </div>
                        </div>
                    </article>

                    <article class="n03" data-num="03">
                        <div class="title">
                            <p class="num">
                                <span class="txt">03</span>
                                <span class="imgs"></span>
                            </p>
                            <p class="sbj">
                                Main Service <b>주요서비스</b>
                            </p>
                        </div>
                        <div class="cont">
                            <div class="testbed_slide">
                                <button type="button" class="tsBed_btn prev swiper-button-disabled" title="주요서비스 이전"
                                    tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                                        width="32px" fill="#3666AE">
                                        <path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z" />
                                    </svg></button>
                                <div
                                    class="test_slide swiper-container-3 swiper-container-initialized swiper-container-horizontal">
                                    <ul class="swiper-wrapper"
                                        style="transform: translate3d(0px, 0px, 0px); transition-duration: 1500ms;">
                                        <li class="first swiper-slide swiper-slide-active"
                                            style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1"
                                                target="_blank" rel="noopener noreferrer" title="새창열림">
                                                <span class="icon">
                                                    <img src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_globe.svg"
                                                        class="icon-pc"></img>
                                                </span>
                                                <p>홈페이지 제작</p>
                                            </a>
                                        </li>
                                        <li class="swiper-slide swiper-slide-next"
                                            style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1"
                                                target="_blank" rel="noopener noreferrer" title="새창열림">
                                                <span class="icon"> <img
                                                        src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_smartphone.svg"
                                                        class="icon-pc"></img>
                                                </span>
                                                <p>모바일 웹</p>
                                            </a>
                                        </li>
                                        <li class="swiper-slide" style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1"
                                                target="_blank" rel="noopener noreferrer" title="새창열림">
                                                <span class="icon"> <img
                                                        src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_smartphone.svg"
                                                        class="icon-pc"></img>
                                                </span>
                                                <p>컨설팅</p>
                                            </a>
                                        </li>
                                        <li class="swiper-slide" style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1"
                                                target="_blank" rel="noopener noreferrer" title="새창열림">
                                                <span class="icon"> <img
                                                        src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_shopping.svg"
                                                        class="icon-pc"></img>
                                                </span>
                                                <p>쇼핑몰</p>
                                            </a>
                                        </li>
                                        <li class="swiper-slide" style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1"
                                                target="_blank" rel="noopener noreferrer" title="새창열림">
                                                <span class="icon"> <img
                                                        src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_world.svg"
                                                        class="icon-pc"></img>
                                                </span>
                                                <p>호스팅</p>
                                            </a>
                                        </li>
                                        <li class="swiper-slide" style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1"
                                                target="_blank" rel="noopener noreferrer" title="새창열림">
                                                <span class="icon"> <img
                                                        src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_marketing.svg"
                                                        class="icon-pc"></img>
                                                </span>
                                                <p>통합 마케팅</p>
                                            </a>
                                        </li>
                                        <li class="swiper-slide" style="width: 146.167px; margin-right: 20px;">
                                            <a href="<?php echo G5_URL ?>/promotion.php" target="_blank"
                                                rel="noopener noreferrer" title="새창열림">
                                                <span class="icon"><img
                                                        src="<?php echo G5_CSS_URL ?>/images/icon/main/ic_promotion.svg"
                                                        alt=""></span>
                                                <p>웹통합 프로모션</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                                <button type="button" class="tsBed_btn next" title="주요서비스 다음" tabindex="0" role="button"
                                    aria-label="Next slide" aria-disabled="false"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                                        width="32px" fill="#3666AE">
                                        <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                                    </svg></button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>


    <!-- 배너 -->
    <section class="main-banner-2">
        <h2 class="main-banner-title">
            한글 도메인 도입이 고민되신다면
        </h2>
        <p class="main-banner-desc">
            무료 상담으로 한글 도메인 도입을 시작해보세요.
        </p>
        <button class="main-banner-button">
            <a href="<?php echo G5_COMMUNITY_URL ?>/contact.php">
                한글 도메인 도입 문의
            </a></button>
    </section>

    <!-- 섹션 5 -->
    <section class="snap-section section-5" id="fourthPage">
        <div class="section-5-container">

            <h3>News</h3>
            <h1>
                <a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/faq.php?bo_table=faq') ?>">
                    알림마당
                </a>
            </h1>
            <div class="section-5-content-container">
                <div class="board-container">
                    <div class="tab-menu">
                        <button class="tab-item">
                            <a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/faq.php?bo_table=faq') ?>">

                                전체보기
                            </a>
                        </button>
                    </div>
                    <div class="board-list-wrapper">
                        <!-- table 1 -->
                        <table class="board-list">
                            <?php
                            for ($i = 0; $i < count($list); $i++) {
                                ?>
                                <tbody>
                                    <?php
                                    for ($j = 0; $j < count($list[$i]); $j++) {
                                        $id = $list[$i][$j]['wr_id'];
                                        $href = $list[$i][$j]['href'];
                                        $title = $list[$i][$j]['subject'];
                                        ?>
                                        <tr>
                                            <td class="board-content">
                                                <span class="board-category">공지사항</span>
                                                <a href="<?php echo $href ?>" class="board-title"><?php echo $title ?></a>
                                            </td>
                                            <!-- <td class="board-date">2024.11.19</td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>

                        </table>
                    </div>
                </div>

                <div class="section5-banner-container">
                    <article class="section5-banner">
                        <div class="section5-banner-wrapper">
                            <h2>사회공헌</h2>
                            <div class="banner_5">
                                <a class="section5-banner-link" href="<?php echo G5_URL ?>/promotion.php">
                                </a>
                            </div>
                        </div>
                        <div class="section5-banner-wrapper">
                            <h2>역량강화</h2>
                            <div class="banner_6">
                                <a class="section5-banner-link" href="<?php echo G5_URL ?>/promotion.php">
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!-- footer를 main 안으로 가져오기 -->
        <?php include(G5_PATH . '/tail.php'); ?>
    </section>

    <footer>
    </footer>

    </div>
    </div>

    </div>
    <!-- } 콘텐츠 끝 -->
</main>


<script>
    "use strict";

    // 전역 앱 네임스페이스
    const App = {
        // 공통 설정
        config: {
            swiperDefaults: {
                preloadImages: false,
                lazy: {
                    loadPrevNext: true,
                    loadPrevNextAmount: 2
                },
                watchSlidesProgress: true,
                observer: true,
                observeParents: true,
                observeSlideChildren: true
            }
        },

        // 유틸리티
        utils: {
            // Throttle 함수: 지정된 시간 간격으로만 호출
            throttle(func, delay) {
                let lastCall = 0;
                return function (...args) {
                    const now = Date.now();
                    if (now - lastCall >= delay) {
                        lastCall = now;
                        func.apply(this, args);
                    }
                };
            },

            debounce(func, wait) {
                let timeout;
                return function (...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            },

            // 성능 최적화된 DOM 조작
            nodeCache: new Map(),
            getElement(selector) {
                if (!this.nodeCache.has(selector)) {
                    this.nodeCache.set(selector, document.querySelector(selector));
                }
                return this.nodeCache.get(selector);
            },

            getAllElements(selector) {
                if (!this.nodeCache.has(selector)) {
                    this.nodeCache.set(selector, document.querySelectorAll(selector));
                }
                return this.nodeCache.get(selector);
            }
        },

        // 이미지 관리
        imageManager: {
            preload(selector) {
                const images = App.utils.getAllElements(`${selector} img`);
                return Promise.all(Array.from(images).map(img => {
                    if (!img.dataset.src) return Promise.resolve();
                    return new Promise((resolve) => {
                        const tempImg = new Image();
                        tempImg.onload = () => {
                            img.src = img.dataset.src;
                            img.classList.add('swiper-lazy-loaded');
                            resolve();
                        };
                        tempImg.src = img.dataset.src;
                    });
                }));
            }
        },

        backgroundManager: {
            init() {
                const images = document.querySelectorAll('.bg-image');
                let currentIndex = 0;

                // 초기 상태 설정
                if (images.length > 0) {
                    // 모든 이미지 초기화
                    images.forEach(img => {
                        img.style.opacity = '0';
                        img.style.transition = 'opacity 0.5s ease-in-out';
                    });

                    // 첫 번째 이미지 표시
                    images[0].style.opacity = '1';

                    // 자동 전환 시작
                    setInterval(() => {
                        // 현재 이미지 페이드 아웃
                        images[currentIndex].style.opacity = '0';

                        // 다음 이미지 인덱스 계산
                        currentIndex = (currentIndex + 1) % images.length;

                        // 다음 이미지 페이드 인
                        images[currentIndex].style.opacity = '1';
                    }, 5000);
                }
            }
        },



        // 슬라이더 관리
        sliderManager: {
            instances: new Map(),

            // 테스트베드 슬라이더
            initTestBedSlider() {
                const testBedSwiper = new Swiper(".test_slide", {
                    ...App.config.swiperDefaults,
                    slidesPerView: 6,
                    spaceBetween: 20,
                    loop: false,
                    speed: 1500,
                    slidesPerGroup: 1,
                    loopFillGroupWithBlank: false,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,  // 사용자 상호작용 후에도 계속 재생
                        stopOnLastSlide: false    // 마지막 슬라이드에서 멈추지 않음
                    },
                    navigation: {
                        nextEl: '.tsBed_btn.next',
                        prevEl: '.tsBed_btn.prev',
                    },
                    breakpoints: {
                        900: { slidesPerView: 6, slidesPerGroup: 6 },
                        700: { slidesPerView: 2, slidesPerGroup: 2 },
                        220: { slidesPerView: 2, slidesPerGroup: 2 }
                    }
                });

                this.instances.set('testBed', testBedSwiper);
                this.initTestBedEvents(testBedSwiper);
            },

            initMainSlider() {
                // 먼저 모든 이미지를 미리 로드
                const preloadImages = () => {
                    const slides = document.querySelectorAll('.main-slider .swiper-slide img');
                    return Promise.all(Array.from(slides).map(img => {
                        if (!img.dataset.src) return Promise.resolve();
                        return new Promise((resolve) => {
                            const tempImg = new Image();
                            tempImg.onload = () => {
                                img.src = img.dataset.src;
                                img.classList.add('swiper-lazy-loaded');
                                resolve();
                            };
                            tempImg.src = img.dataset.src;
                        });
                    }));
                };

                // 이미지 로드 후 Swiper 초기화
                preloadImages().then(() => {
                    const mainSwiper = new Swiper('.main-slider', {
                        ...App.config.swiperDefaults,
                        loop: true,
                        speed: 1000,
                        effect: 'fade',
                        fadeEffect: { crossFade: true },
                        preloadImages: true,  // 이미지 미리 로드 활성화
                        lazy: false,  // lazy 로딩 비활성화
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: '.nav-next',
                            prevEl: '.nav-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        on: {
                            init: function () {
                                App.sliderManager.updateFraction(this);
                                App.animationManager.initializeTextAnimations();
                                App.sliderManager.initializeSliderControls(this);
                            },
                            slideChangeTransitionStart: function () {
                                App.animationManager.handleSlideTransitionStart(this);
                            },
                            slideChangeTransitionEnd: function () {
                                App.animationManager.handleSlideTransitionEnd(this);
                            }
                        }
                    });

                    return mainSwiper;
                });
            },

            // 슬라이더 컨트롤 초기화 함수
            initializeSliderControls(swiper) {
                const pauseButton = document.querySelector('.nav-pause');
                let isPlaying = true;

                // 일시정지 버튼 클릭 이벤트
                if (pauseButton) {
                    pauseButton.addEventListener('click', (e) => {
                        if (isPlaying) {
                            e.stopPropagation(); // 이벤트 전파 중단
                            swiper.autoplay.stop();
                            // 일시정지 아이콘을 재생 SVG로 변경
                            pauseButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                        <path d="M320-200v-560l440 280-440 280Z"></path>
                    </svg>`;
                        } else {
                            swiper.autoplay.start();
                            // 재생 아이콘을 일시정지 이미지로 변경
                            pauseButton.innerHTML = `<img src="${g5_css_url}/images/icon/main/ic_main_slider_btn_pause.svg" alt="정지 버튼" />`;
                        }

                        isPlaying = !isPlaying;
                    });
                }

                // 이전/다음 버튼 클릭 이벤트 재설정
                const prevButton = document.querySelector('.nav-prev');
                const nextButton = document.querySelector('.nav-next');

                if (prevButton) {
                    prevButton.addEventListener('click', () => {

                        swiper.slidePrev();
                    });
                }

                if (nextButton) {
                    nextButton.addEventListener('click', () => {
                        swiper.slideNext();
                    });
                }
            },
            initMarqueeSlider() {
                const marqueeDefaults = {
                    ...App.config.swiperDefaults,
                    wrapperClass: 'swiper-wrapper-2',
                    slideClass: 'swiper-slide-2',
                    slidesPerView: 'auto',
                    spaceBetween: 30,
                    loop: true,
                    allowTouchMove: false,
                    speed: 70000,
                    preloadImages: true,
                    lazy: false,
                    autoplay: {
                        delay: 0,
                        disableOnInteraction: false,
                        stopOnLastSlide: false
                    }
                };

                const marqueeInstances = new Map();

                const observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                const sectionId = entry.target.id;
                                history.replaceState(null, null, `#${sectionId}`);
                                updateActiveMenu(sectionId);
                            }
                        });
                    },
                    {
                        threshold: 0.6, // 감지 임계치 조정 (기본값: 0.5)
                        rootMargin: '0px 0px -40% 0px', // 하단 영역 조정
                    }
                );

                [
                    { className: '.first-line', reverseDirection: false },
                    { className: '.second-line', reverseDirection: true },
                    { className: '.third-line', reverseDirection: false }
                ].forEach(config => {
                    const element = App.utils.getElement(config.className);
                    if (!element) return;

                    // 슬라이드 복제 로직 추가
                    const wrapper = element.querySelector('.swiper-wrapper-2');
                    const slides = wrapper.querySelectorAll('.swiper-slide-2');

                    if (slides.length < 3) { // 최소 3개 이상 필요
                        const originalSlides = Array.from(slides);
                        while (wrapper.children.length < 6) { // 최소 6개까지 복제
                            originalSlides.forEach(slide => {
                                wrapper.appendChild(slide.cloneNode(true));
                            });
                        }
                    }

                    // 슬라이더 인스턴스 생성
                    const instance = new Swiper(config.className, {
                        ...marqueeDefaults,
                        autoplay: {
                            ...marqueeDefaults.autoplay,
                            reverseDirection: config.reverseDirection
                        },
                        loopAdditionalSlides: slides.length, // 복제된 슬라이드 수 고려
                        on: {
                            init: function () {
                                observer.observe(element);
                            }
                        }
                    });

                    marqueeInstances.set(element, instance);
                });
            },
            // 성능 모니터링 함수 (필요시 사용)
            monitorPerformance(swiper) {
                let lastTime = performance.now();

                swiper.on('setTranslate', () => {
                    const currentTime = performance.now();
                    const delta = currentTime - lastTime;

                    if (delta < 16.67) { // 60fps보다 빠른 경우
                        console.log('Performance issue detected:', delta.toFixed(2), 'ms');
                    }

                    lastTime = currentTime;
                });
            },

            // 이벤트 핸들러
            initTestBedEvents(swiper) {
                const testSlide = App.utils.getElement('.test_slide');
                if (!testSlide) return;

                testSlide.addEventListener('focusin', () => swiper.autoplay.stop());
                testSlide.addEventListener('focusout', () => swiper.autoplay.start());

                const slides = testSlide.querySelectorAll('.swiper-slide');
                slides.forEach((slide, i) => {
                    slide.addEventListener('focusin', () => {
                        const width = App.utils.getElement('.main_business .test_slide').offsetWidth;
                        if (width >= 700) {
                            swiper.slideTo(parseInt((i + 3) / 6) + 1, 1500, false);
                        }
                    });
                });
            },

            initHoverEvents() {
                $('.main_business article').on('mouseenter', function () {
                    mainBusiness($(this));
                })

                $('.main_business article a:first-of-type').on('focusin', function () {
                    mainBusinessFocus($(this));
                })

                function mainBusiness(id) {
                    $('.main_business article').removeClass('on')
                    id.addClass('on');

                    var number = id.attr('data-num');
                    $('.main_business').attr('data-bg', number);
                }

                function mainBusinessFocus(id) {
                    $('.main_business article').removeClass('on')
                    id.parents('article').addClass('on');

                    var number = id.parents('article').attr('data-num');
                    $('.main_business').attr('data-bg', number);
                }
            },

            updateFraction(swiper) {
                const current = App.utils.getElement('.current');
                const total = App.utils.getElement('.total');
                const separator = App.utils.getElement('.separator');

                if (!current || !total || !separator || !swiper?.slides) {
                    if (current) current.textContent = '01';
                    if (separator) separator.textContent = '/';
                    if (total) total.textContent = '03';
                    return;
                }

                current.textContent = String(swiper.realIndex + 1).padStart(2, '0');
                total.textContent = String(swiper.slides.length).padStart(2, '0');
            }
        },

        // 애니메이션 관리
        animationManager: {
            initializeTextAnimations() {
                App.utils.getAllElements('.text-animation').forEach(el => {
                    el.style.visibility = 'hidden';
                    el.style.opacity = '0';
                });
            },

            handleSlideTransitionStart(swiper) {
                App.utils.getAllElements('.text-animation').forEach(el => {
                    el.style.visibility = 'hidden';
                    el.style.opacity = '0';
                    el.style.animation = 'none';
                });
                App.sliderManager.updateFraction(swiper);
            },

            handleSlideTransitionEnd(swiper) {
                const activeSlide = swiper.slides[swiper.activeIndex];
                if (!activeSlide) return;

                activeSlide.querySelectorAll('.text-animation').forEach(el => {
                    el.style.visibility = 'visible';
                    el.style.animation = null;
                });
            },

            initFadeElements() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    rootMargin: '-50px',
                    threshold: 0.1
                });

                App.utils.getAllElements('.fade-up').forEach(element => observer.observe(element));
            },

            typeWriter(text, speed = 300) {
                const element = App.utils.getElement("#typing-text");
                if (!element) return;

                element.innerHTML = '';
                let i = 0;

                const type = () => {
                    if (i < text.length) {
                        element.innerHTML += text.charAt(i++);
                        setTimeout(type, speed);
                    }
                };

                type();
            }
        },

        // 메뉴 네비게이션
        navigationManager: {
            init() {
                const observer = new IntersectionObserver(
                    App.utils.debounce((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const sectionId = entry.target.id;
                                history.replaceState(null, null, `#${sectionId}`);
                                this.updateActiveMenu(sectionId);
                            }
                        });
                    }, 100), // 100ms 제한
                    { threshold: 0.5 }
                );

                App.utils.getAllElements('.snap-section').forEach(section => observer.observe(section));

                const menu = App.utils.getElement('#menu');
                if (menu) {
                    menu.addEventListener('click', this.handleMenuClick.bind(this));
                }

            },

            updateActiveMenu(sectionId) {
                document.body.setAttribute('data-current-section', sectionId);
                App.utils.getAllElements('#menu li[data-menuanchor]').forEach(item => {
                    item.classList.toggle('active', item.getAttribute('data-menuanchor') === sectionId);
                });
            },
            handleMenuClick(e) {
                const link = e.target.closest('a');
                if (!link) return;

                e.preventDefault();
                const targetId = link.getAttribute('href');
                if (!targetId) return;

                const targetSection = App.utils.getElement(targetId);
                if (!targetSection) return;

                // 스크롤 애니메이션 추가
                window.scrollTo({
                    top: targetSection.offsetTop,
                    behavior: 'smooth'
                });

                const sections = document.querySelectorAll('.snap-section');
                const targetIndex = Array.from(sections).indexOf(targetSection);

                if (targetIndex !== -1) {
                    this.updateActiveMenu(targetId.replace('#', ''));
                }
            }

        },

        // 초기화
        init() {
            console.time('AppInitialization');

            // 슬라이더 초기화
            this.sliderManager.initTestBedSlider();
            this.sliderManager.initHoverEvents();
            this.sliderManager.initMainSlider();
            this.sliderManager.initMarqueeSlider();
            this.backgroundManager.init();

            // 애니메이션 초기화
            this.animationManager.initFadeElements();
            this.animationManager.typeWriter("THE", 300);

            // 네비게이션 초기화
            this.navigationManager.init();

            console.timeEnd('AppInitialization');
        }
    };

    // 앱 실행
    document.addEventListener('DOMContentLoaded', () => App.init());
</script>