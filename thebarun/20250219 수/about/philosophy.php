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
    <article class="title__about" id="title__philosophy-img">
        <span class="text__title__about-en">회사 소개</span>
        <h1 class="text__title__about-ko">경영 이념</h1>
    </article>

    <!-- 브레드크럼 -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
            <li class="breadcrumb-item"><a href="<?php echo G5_ABOUT_URL ?>/about.php">회사소개</a></li>
            <li class="breadcrumb-item active" aria-current="page">경영 이념</li>
        </ol>
    </nav>

    <!-- 섹션 1 -->
    <section class="section-about">
        <!-- 내용 -->
        <div class="box_text-subtitle__about">
            <h3 class="text__subtitle__about-en">BUSINESS PHILOSOPHY</h3>
            <h2 class="text__subtitle__about-ko">
                우리는 이러한 가치를 바탕으로 더 나은 미래를 향해 나아갑니다.
            </h2>
        </div>
    </section>

    <section class="philosophy-section">
        <div class="card-container">
            <!-- 카드 1 -->
            <div class="philosophy-card">
                <div class="card-image">
                    <img src="<?php echo G5_CSS_URL ?>/images/about/philosophy_1.png" alt="기업 가치의 극대화" />
                </div>
                <div class="card-content">
                    <h3>기업 가치의 극대화</h3>
                    <p>
                        기업가치와 국민경제, 통화, 고객과 주주, 임직원 등 구성원 모두에게 발전의 기회를 제공하도록 사회적 책임을 느끼는 기업이 되겠습니다.
                    </p>
                </div>
            </div>

            <!-- 카드 2 -->
            <div class="philosophy-card">
                <div class="card-image">
                    <img src="<?php echo G5_CSS_URL ?>/images/about/philosophy_2.png" alt="투명한 경영" />
                </div>
                <div class="card-content">
                    <h3>투명한 경영</h3>
                    <p>
                        새로운 가치를 창조하고 투명한 경영 활동을 고객이 신뢰하는 기업을 추구하겠습니다.
                    </p>
                </div>
            </div>

            <!-- 카드 3 -->
            <div class="philosophy-card">
                <div class="card-image">
                    <img src="<?php echo G5_CSS_URL ?>/images/about/philosophy_3.png" alt="인재 발굴과 육성" />
                </div>
                <div class="card-content">
                    <h3>인재 발굴과 육성</h3>
                    <p>
                        기업 최고의 자산은 인재이며, 지속적인 프로그램을 만들어내고, 인재의 발굴과 육성을 통해 기업 발전의 완성도를 높이고, 건설사가 요구하는 특화된 공간사업에서 경쟁력을
                        확보하고 있습니다.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include_once(G5_PATH . '/tail.php');