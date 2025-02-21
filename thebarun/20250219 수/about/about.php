<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/about.css">', 0);
?>
<main class="main__about">
    <!-- 이미지 -->
    <article class="title__about" id="title__about-img">
        <span class="text__title__about-en" id="greeting">회사 소개</span>
        <h1 class="text__title__about-ko" id="greeting">인사말</h1>
    </article>

    <hr class="hr hr__about-1" />


    <!-- 브레드크럼 -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
            <li class="breadcrumb-item"><a href="<?php echo G5_ABOUT_URL ?>/about.php">회사소개</a></li>
            <li class="breadcrumb-item active" aria-current="page">인사말</li>
        </ol>
    </nav>

    <h1 class="ceo-message">
        <span>CEO's</span> MESSAGE
        <p>인사말</p>
    </h1>

    <!-- 섹션 1 -->
    <section class="section-about" id="section-greeting">
        <!-- 내용 -->
        <div class="about-greeting">
            <h2 class="about-greeting__title">
                <img class="icon-quote" id="quote-reverse" src="<?php echo G5_CSS_URL ?>/images/about/quote.svg"
                    alt="따옴표" />
                <br />
                열정과 신뢰의 기업, <br />
                <i>(상호명)</i>과 인연을 맺어주신 데 대해 <br />
                머리 숙여 감사의 인사를 올립니다.
                <img class="icon-quote" src="<?php echo G5_CSS_URL ?>/images/about/quote.svg" alt="따옴표" />
            </h2>
        </div>


        <div class="container__about-desc">
            <p class="about-desc-lg">
                <i>(상호명)</i>은 인터넷 마케팅 시장을 개척해오면서 쌓아온 경험과 노하우를 바탕으로 최적의 온라인 마케팅 전략을 제시하는 전문 기업으로 성장하였습니다.
            </p>
            <p class="about-desc">
                <i>(상호명)</i>은 웹 콘텐츠, 웹 프로모션에서 유지 관리 및 종합적인 웹 서비스 제공으로 고객의 편리성을 극대화하고 브랜드의 가치를 더욱 끌어올릴 수 있는 웹 서비스
                전문기업입니다. 사용자들이
                컴퓨터 시스템 또는 PC와 모바일에서 데이터 입력이나 동작을 제어하기 위하여 사용자가 컴퓨터나 프로그램과 의사소통을 하고, 쉽고 편리하게 한글 도메인을 사용할 수 있도록 하는 것이
                <i>(상호명)</i>의 목적입니다.
            </p>

            <p class="about-desc">
                인터넷 사용자 5천만 명, 초고속 인터넷 사용자 3천만 명 시대를 열며 인구 대비 인터넷 이용률 세계 1위를 달리고 있는 이때, 온라인 프로모션은
                이제 선택이
                아닌 필수로 인식되고 있습니다.
            </p>

            <p class="about-desc">
                언제나 서로를 예의 주시하며 따뜻한 마음으로 여러분과 나누는 <i>(상호명)</i>이 최선을 다한다는 약속을 드리겠습니다. 변화하는 네트워크 환경에 웹 프로모션으로 다가가 여러분 곁에
                머물게 될
                것입니다.
            </p>
        </div>
    </section>
</main>

<?php
include_once(G5_PATH . '/tail.php');