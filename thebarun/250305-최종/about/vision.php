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
    <article class="title__about" id="title__vision-img">
        <span class="text__title__about-en">회사 소개</span>
        <h1 class="text__title__about-ko">비전</h1>
    </article>

    <!-- 브레드크럼 -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
            <li class="breadcrumb-item"><a href="<?php echo G5_ABOUT_URL ?>/about.php">회사소개</a></li>
            <li class="breadcrumb-item active" aria-current="page">비전</li>
        </ol>
    </nav>

    <!-- 섹션 1 -->
    <section class="section">
        <!-- 내용 -->
        <div class="box_text-subtitle__about">
            <h3 class="text__subtitle__about-en">VISION</h3>
            <h2 class="text__subtitle__about-ko">
                우리의 비전은 단순한 목표가 아닌, <br />
                우리가 함께 만들어가는 미래의 청사진입니다.
            </h2>
        </div>
    </section>

    <!-- 섹션 2 -->
    <div class="vision-grid">
        <div class="vision-item">
            <p>
                국내·국외 최대 기업 포털 입지 강화 및 컨설팅·마케팅 시장에서 최고의 전문 기업으로 성장
            </p>
            <span class="number">1</span>
        </div>
        <div class="vision-item">
            <p>
                끊임없는 연구 개발과 투자 노력, 전문 기술력을 바탕으로 품질 관리를 통해 생산하고 제공
            </p>
            <span class="number">2</span>
        </div>
        <div class="vision-divider">
            <p>고객과 상생하고 함께 하는기업</p>
        </div>
        <div class="vision-item">
            <p>시스템 완성을 통한 감동 실현</p>
            <span class="number">3</span>
        </div>
        <div class="vision-item">
            <p>
                지속적인 사업 다각화와 품질 혁신 및 생산 능력 향상을 통해 산업 발전에 기여
            </p>
            <span class="number">4</span>
        </div>
    </div>
</main>

<?php
include_once(G5_PATH . '/tail.php');