<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/about.css">', 0);
?>
<main class="main__about" id="main-history">
    <!-- 이미지 -->
    <article class="title__about" id="title__history-img">
        <span class="text__title__about-en">회사 소개</span>
        <h1 class="text__title__about-ko">연혁</h1>
    </article>

    <!-- 브레드크럼 -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
            <li class="breadcrumb-item"><a href="<?php echo G5_ABOUT_URL ?>/about.php">회사소개</a></li>
            <li class="breadcrumb-item active" aria-current="page">연혁</li>
        </ol>
    </nav>

    <!-- 섹션 1 -->
    <section class="section">
        <!-- 내용 -->
        <div class="box_text-subtitle__history">
            <h3 class="text__subtitle__about-en">HISTORY</h3>
            <p>연혁</p>
            <div class="text__subtitle-wrapper">
                <div class="timeline-year">
                    <h3>2017<span class="dot">.</span></h3>
                </div>
                <h2 class="text__subtitle__about-ko">
                    우리의 여정: 과거의 발자취가 만들어낸 현재, <br />
                    그리고 미래로 이어지는 이정표
                </h2>
            </div>

        </div>
        <div></div>
    </section>

    <!-- 섹션 2 -->
    <section class="history-timeline">
        <div class="timeline-item">

            <div class="timeline-content">
                <strong class="timeline-content__title"><i>(상호명) 임직원은</i></strong>
                <p class="timeline-content__text">
                    2017년부터 한글 도메인 선점 및 기업용 홈페이지 제작, 모바일 웹 제작,<br />
                    호스팅, 한글 도메인 유지 보수, B2C 결제 연동, 한글 도메인 프로모션 경력이 있습니다.
                </p>
                <p class="timeline-content__text">
                    고객과 인터넷 마케팅 시장을 개척해오면서 쌓아온 경험과 노하우를 바탕으로 최적의 온라인 마케팅 전략을 도와드릴 것을 약속드립니다.
                </p>
            </div>
        </div>
    </section>
</main>

<?php
include_once(G5_PATH . '/tail.php');