<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/business.css">', 0);
?>
<main class="main__domain">
    <!-- 타이틀 -->
    <article class="title__business">
        <span class="text__title__business">사업영역</span>
        <h1 class="text__title__main-business">주요사업</h1>
    </article>

    <!-- 1. 주요 사업 섹션 -->
    <section class="main-business" id="section1">
        <!-- 브레드크럼 -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
                <li class="breadcrumb-item"><a href="<?php echo G5_BUSINESS_URL ?>/business.php">사업 영역</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    주요 사업
                </li>
            </ol>
        </nav>

        <h1 class="section-title">주요 사업</h1>

        <div class="business-grid">
            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section2">
                <div class="business-item">
                    <img src="<?php echo G5_CSS_URL ?>/images/icon/business/ic_business-1.svg" class="icon-pc"></img>
                    <span class="icon-text">홈페이지 제작</span>
                    <svg class="plus-ic" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#113873">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </div>
            </a>


            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section3">
                <div class="business-item">
                    <img src="<?php echo G5_CSS_URL ?>/images/icon/business/ic_business-2.svg" class="icon-pc"></img>
                    <span class="icon-text">모바일 웹</span>
                    <svg class="plus-ic" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#113873">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </div>
            </a>

            <a href="#">
                <div class="business-item">
                    <img src="<?php echo G5_CSS_URL ?>/images/icon/business/ic_business-3.svg" class="icon-pc"
                        id="icon-consulting"></img>
                    <span class="icon-text">컨설팅</span>
                    <svg class="plus-ic" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#113873">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </div>
            </a>

            <a href="#">
                <div class="business-item">
                    <img src="<?php echo G5_CSS_URL ?>/images/icon/business/ic_business-4.svg" class="icon-pc"></img>
                    <span class="icon-text">쇼핑몰</span>
                    <svg class="plus-ic" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#113873">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </div>
            </a>

            <a href="#">
                <div class="business-item">
                    <img src="<?php echo G5_CSS_URL ?>/images/icon/business/ic_business-5.svg" class="icon-pc"></img>
                    <span class="icon-text">호스팅</span>
                    <svg class="plus-ic" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#113873">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </div>
            </a>

            <a href="<?php echo G5_BUSINESS_URL ?>/business.php#section4">
                <div class="business-item">
                    <img src="<?php echo G5_CSS_URL ?>/images/icon/business/ic_business-6.svg" class="icon-pc"></img>
                    <span class="icon-text">통합마케팅</span>
                    <svg class="plus-ic" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#113873">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </div>
            </a>
        </div>
    </section>


    <!-- 2. 홈페이지 섹션 -->
    <section class="homepage-section" id="section2">
        <div class="homepage-header">
            <h2 class="section-title">홈페이지</h2>
            <p class="section-desc">
                전문성, 신뢰감, 안정성, 만족감에 포커스를 맞춰<br /> 고객사가 만족하는 웹프로모션 구축과 서비스를 위해
            </p>
        </div>

        <!-- 네트워크 이미지 섹션 -->
        <div class="network-image">
            <img src="<?php echo G5_CSS_URL ?>/images/business/business_homepage.jpg" alt="홈페이지 이미지" />
        </div>

        <!-- 프로세스 스텝 -->
        <div class="process-steps">
            <div class="step">
                <h3 class="step-number">01</h3>
                <p class="step-desc">
                    최상의 도메인을 제공하고 방문형 홈페이지를 기업에게 제공하여
                    우리나라 산업에 안정성과 소상공인, 중소기업 산업에 극대화
                </p>
            </div>

            <div class="step">
                <h3 class="step-number">02</h3>
                <p class="step-desc">
                    홈페이지 제작에 앞서 최초 분석단계에서 고객의 근본적인 비지니스를
                    파악
                </p>
            </div>

            <div class="step">
                <h3 class="step-number">03</h3>
                <p class="step-desc">
                    기본적인 수행 프로세스를 기반으로 프로젝트의 성격 및 환경에 최적화
                    될 수 있는 탄력적 수행 프로세스 수립
                </p>
            </div>

            <div class="step">
                <h3 class="step-number">04</h3>
                <p class="step-desc">
                    홈페이지 내용을 반복적으로 강조하고 현대적 이미지에 맞게 제공되며
                    정보, 데이터, 지식, 기업가치, 온라인 활성화를 활용하여 뛰어나고
                    높은 경쟁력을 얻을 수 있습니다.
                </p>
            </div>

            <div class="step">
                <h3 class="step-number">05</h3>
                <p class="step-desc">
                    개발자가 함께 진행하여 웹표준을 준수하여 크롬, 사파리, 오페라,
                    파이어 폭스, IE 등 웹브라우저에서 화면인식과 기능 작동이 제대로
                    되도록 제작됩니다.
                </p>
            </div>
        </div>
    </section>

    <!-- 배너 -->
    <section class="business-banner">
        <h2 class="business-banner-text">
            반응형 홈페이지를 제공하여 <br />
            고객의 이해와 고객의 눈높이에 맞게 <br />
            홈페이지 제작을 해 드립니다.
        </h2>

    </section>

    <!-- 3. 모바일 -->
    <section class="mobile-section" id="section3">
        <div class="mobile-content">
            <!-- 좌측 콘텐츠 -->
            <div class="mobile-left">
                <h2 class="section-title">모바일</h2>

                <p class="highlight-text">
                    스마트폰이 보급되는 시점을 기준으로 구분할 수 있습니다. 모바일 홈페이지 미사용으로 인해 사용자들이 외면하게 되고, 기업은 한 번 돌아선 사용자들의 마음을 잡지 못합니다
                </p>
                <img src="<?php echo G5_CSS_URL ?>/images/business/business_mobile.jpg" alt="모바일 작업 이미지"
                    class="mobile-image">
            </div>

            <!-- 우측 서비스 리스트 -->
            <div class="mobile-right">
                <div class="service-item">
                    <h3>모든 디바이스에 최적화된 디자인</h3>
                    <p>사용자의 편리함을 고려한 UI/UX 디자인으로 안드로이드, 아이폰 동일 모바일, 태블릿 등 기종에 어떠한 디바이스라도 최적화 하여 제작합니다.</p>
                </div>

                <div class="service-item">
                    <h3>모바일 홈페이지 통합 개발</h3>
                    <p>모바일 홈페이지만 있다면 모바일 홈페이지도 제공 하고 있습니다.</p>
                </div>

                <div class="service-item">
                    <h3>디스플레이 맞춤 고품질 서비스</h3>
                    <p>PC, 모바일 단말 등 검수하는 단말을 확인하고 검수 단말 디스플레이 크기에 맞는 고품질의 모바일웹을 제공하고 있습니다.</p>
                </div>

                <div class="service-item">
                    <h3>다중 인증 모바일 웹 구현</h3>
                    <p>다양한 인터페이스를 통한 인증방법 지원을 위한 모바일 웹 기반 보안/인증 표준기술 등이 핵심기술이 가능합니다.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. 온라인 마케팅 -->
    <section class="online-marketing" id="section4">
        <div class="marketing-content">
            <!-- 좌측 이미지 -->
            <div class="marketing-image">
                <img src="<?php echo G5_CSS_URL ?>/images/business/business_online-marketing.jpg" alt="디지털 마케팅 이미지">
            </div>

            <!-- 우측 콘텐츠 -->
            <div class="marketing-text">
                <h2 class="section-title">온라인 마케팅</h2>
                <p class="main-desc">고객과 소비자가 신뢰하는 온라인 마케팅입니다.</p>

                <ul class="marketing-list">
                    <li>그동안의 경력과 검색광고 경험을 바탕으로 고객과 맞춤형 검색광고를 진행 해드리고 있습니다.</li>
                    <li>소비자들이 검색을 통한 선택과 구매로 매출 향상 효과를 기대할 수 있습니다.</li>
                    <li>검색을 통해 소비자들이 기업을 확인하고 고객층을 다양하게 접촉할 수 있습니다.</li>
                    <li>도메인 연결, 검색, 한글 도메인 등록, 후기 작성을 통한 자연스러운 광고 역할, 바이럴 마케팅까지 하여 매출 상승을 체감합니다.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 5. 빅데이터 -->
    <section class="big-data" id="section5">
        <h2 class="section-title">빅데이터 분석</h2>

        <div class="data-cards">
            <!-- 첫 번째 카드 -->
            <div class="data-card">
                <div class="card-content">
                    <p class="card-text">
                        온라인(PC,모바일)에 노출되어<br>
                        홍보마케팅 서비스에 대한<br>
                        사용자 유입 및 홍보효과 분석
                    </p>
                </div>
                <div class="card-overlay"></div>
            </div>

            <!-- 두 번째 카드 -->
            <div class="data-card">
                <div class="card-content">
                    <p class="card-text">
                        네이버 파워링크<br>
                        부정클릭 방지 시스템
                    </p>
                </div>
                <div class="card-overlay"></div>
            </div>
        </div>

        <!-- 설명 텍스트 -->
        <div class="data-description">
            <p>
                SNS, 페이스북, 유튜브, 인스타그램, 트위터, 네이버 TV, 네이버 포스트, 블로그, 지식인, 바이럴 마케팅, 채널단 등 다양한 모바일 단말에서 URI 기반의 정보자원을 HTTP를
                이용하여
                주고받으며, XML 등의 마크업을 사용하는 기술을 사용합니다. 고객 유입 경로 홍보 효과 데이터 분석, 네이버 C-Rank, D.I.A 로직 분석을 하여 키워드 노출에 적합한 블로그 노출
                체크 등 광고 대비 효과를 극대화 시키고 안정성을 가지고 운영합니다.
            </p>
        </div>
    </section>
</main>

<?php
include_once(G5_PATH . '/tail.php');