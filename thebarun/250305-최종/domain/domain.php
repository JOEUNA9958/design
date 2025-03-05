<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/domain.css">', 0);
?>
<main class="main__domain">
    <!-- 브레드크럼 -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
            <li class="breadcrumb-item"><a href="<?php echo G5_DOMAIN_URL ?>/domain.php">도메인</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                도메인이란?
            </li>
        </ol>
    </nav>

    <!-- 이미지 -->
    <article class="title__domain">
        <span class="text__title__domain-en">Domain</span>
        <h1 class="text__title__domain-ko">도메인</h1>
    </article>

    <!-- 수평선 -->
    <hr class="hr hr__domain" />

    <!-- 섹션 1 -->
    <section class="section">
        <div class="box-container__domain">
            <!-- box -->
            <div class="box__domain">
                <img src="<?php echo G5_CSS_URL ?>/images/icon/ic_domain-2.svg" alt="도메인 아이콘 1" />
                <h2 class="box__domain-h2">정의</h2>
                <p class="box__domain-des">
                    도메인이란 사람들이 원하는 사이트에 방문하기 위해 인터넷 주소창에
                    입력하는 WWW. 주소를 말합니다.
                </p>
            </div>

            <!-- box -->
            <div class="box__domain">
                <img src="<?php echo G5_CSS_URL ?>/images/icon/ic_domain-4.svg" alt="도메인 아이콘 2" />
                <h2 class="box__domain-h2">구조</h2>
                <p class="box__domain-des">
                    인터넷에서 도메인은 네트워크 주소들의 집합으로 구성되며, 이
                    도메인은 계층을 가집니다.
                </p>
            </div>

            <!-- box -->
            <div class="box__domain">
                <img src="<?php echo G5_CSS_URL ?>/images/icon/ic_domain-3.svg" alt="도메인 아이콘 3" />
                <h2 class="box__domain-h2">국가 코드 최상위 도메인</h2>
                <p class="box__domain-des">
                    국가 코드 최상위 도메인(Country Code Top-Level Domain, ccTLD)은
                    다음과 같은 특징을 가집니다.<br /><br />
                    - 국제적으로 나라 또는 특정 지역 그리고 국제 단체 등을 나타냅니다.<br />
                    - 인터넷의 도메인을 활용합니다.<br />
                    - 전 세계의 어떠한 컴퓨터와도 통신이 가능하게 해줍니다.
                </p>
            </div>

            <!-- box -->
            <div class="box__domain">
                <img src="<?php echo G5_CSS_URL ?>/images/icon/ic_domain-1.svg" alt="도메인 아이콘 4" />
                <h2 class="box__domain-h2">한글 도메인</h2>
                <p class="box__domain-des">
                    최근 도메인의 인식이 확산됨에 따라 도메인을 보다 편리한 방식으로
                    사용하고자 하는 요구를 반영하여 한글 도메인이 등장하게 되었습니다.
                </p>
            </div>
        </div>
    </section>
</main>
<?php
include_once(G5_PATH . '/tail.php');