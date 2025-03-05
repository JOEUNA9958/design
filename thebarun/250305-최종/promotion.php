<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/promotion.css">', 0);
?>

<main>
    <!-- 이미지 -->
    <div class="promotion-title-container">
        <article class="title__promotion">
        </article>
    </div>

    <!-- 섹션 1 -->
    <section class="section">
        <!-- 브레드크럼 -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
                <li class="breadcrumb-item active" aria-current="<?php echo G5_URL ?>/promotion.php">웹 프로모션</li>
            </ol>
        </nav>
        <!-- 내용 -->
        <div class="promotion-title-wrapper">
            <p class="section-1-title__promotion-subtitle">
                <span>Web Promotion</span>
            </p>
            <h2 class="section-1-title__promotion-title">웹 프로모션</h2>
        </div>

        <div class="box-container">
            <div class="box__promotion fade-up delay-1">
                <p class="">선택이 아닌 필수 스마트폰<br />시대 모바일 웹</p>
            </div>
            <div class="box__promotion fade-up delay-2">
                <p class="">
                    내 사이트 방문을 위한 검색과 <br />
                    한글 도메인으로 사업 향상 
                </p>
            </div>
            <div class="box__promotion fade-up delay-3">
                <p class="">
                    기술력과 첨단장비가 결합한 <br />
                    웹프로모션 호스팅
                </p>
            </div>
            <div class="box__promotion fade-up delay-4">
                <p class="">
                    국내외 수출입을 위한 <br />
                    한글 도메인 + 영문 도메인 <br />
                    사용으로 사업 극대화 
                </p>
            </div>
        </div>
    </section>
    <!-- 섹션 2 -->
    <figure class="banner">
        <div class="banner-content">
            <h5>
                프로모션
            </h5>
            <h2>
                홈페이지제작 + 모바일웹 + QR코드 제작 + 웹호스팅 유지보수
            </h2>
            <p>
                스마트폰 접근이 원활한 모바일웹과 홈페이지의 접근성을 높혀
                통합으로 사용하실 수 있는 웹 프로모션입니다 .
            </p>
        </div>
    </figure>


    <!-- 섹션 3 -->
    <section class="section">
        <div class="container-promotion">
            <img src="<?php echo G5_CSS_URL ?>/images/promotion/promotion_1.png" .. />
            <div class="text-container-promotion">
                <h5>최상위 국가도메인-한글.한국</h5>
                <p>
                    글로벌 시대를 맞아 '영어'가 필수라고는 하지만, 우리의 언어는 여전히 '한글'이지 '영어'가 아닙니다. 그럼에도 우리가 하루에 반드시 이용하는 인터넷의 도메인 주소들은 영어로
                    되어 있습니다. 영어로 된 주소 이름이 암기하기 어려워서 외워두었다가 인터넷 창을 켜고 보니 .com, .co.kr, .net을 잊어버리는 경험을 많이들 하셨을 것입니다.
                </p>
                <br />
                <p>
                    우리나라 외에도 비영어권 국가인 중국, 이집트, 요르단, 러시아, 태국 등 총 21개국에서 자국어 국가도메인을 신청한 상태입니다. 공공기관, 대기업, 의료기관, 학교들은 이미 한글
                    국가도메인을 운영 중이며, 주요 기관들도 자사의 홈페이지를 한글로도 운영하고 있습니다. 이제 귀사도 한글 도메인의 소유권을 확보하여 자국어 국가도메인을 활용함으로써 더욱 편리하게
                    홈페이지에 접속할 수 있게 하고, 이를 통해 사업을 극대화하시기 바랍니다.
                </p>
            </div>
        </div>
    </section>

    <hr class="hr hr__promotion" />

    <!-- 섹션 4 -->
    <section>
        <section class="section">
            <div class="container-promotion">
                <img src="<?php echo G5_CSS_URL ?>/images/promotion/promotion_2.png" .. />
                <div class="text-container-promotion">
                    <h5>이제는 모바일 웹 시대</h5>
                    <p>
                        모바일 웹은 일반 PC 홈페이지와는 다르게 모바일 환경에 최적화된 규격의 홈페이지입니다. 모바일 웹 전용 페이지가 없으면 모바일로 검색 시 글자와 이미지가 깨지거나 잘
                        보이지 않는 등 여러 오류가 발생할 수 있습니다. 또한 원하는 정보를 쉽게 찾을 수 없는 경우가 생기기도 합니다. 하지만 모바일 웹을 구축하면 언제 어디서든 편리하게 원하는
                        정보를 얻을 수 있게 됩니다.
                    </p>
                    <br />
                    <p>
                        뉴스에서도 모바일 검색 수가 PC 검색 수를 넘어섰다는 보도가 있었습니다. 이는 모바일 웹 사용이 시간이 지날수록 증가하고 있다는 것을 보여주는 결과입니다. 온라인 마케팅이
                        발달하면서 모바일에 최적화되지 않은 페이지에서는 콘텐츠를 제대로 볼 수 없거나 정확한 정보 전달이 어려워졌습니다. 이제 모바일 홈페이지는 반드시 필요한 필수 요소가
                        되었으며, 업종에 관계없이 모든 기업이 활용할 수 있습니다.
                    </p>
                </div>
            </div>
        </section>
    </section>


    <hr class="hr hr__promotion" />

    <!-- 섹션 5 -->
    <section>
        <section class="section">
            <div class="container-promotion">
                <img src="<?php echo G5_CSS_URL ?>/images/promotion/promotion_3.png" .. />
                <div class="text-container-promotion">
                    <h5>빠르고 쉽게 정보를 얻을수 있는 QR코드 </h5>
                    <p>QR은 'Quick Response'의 약자로, '빠른 응답'을 얻을 수 있다는 의미입니다. 우리가 흔히 보는 바코드와 비슷한 형태이지만, 활용성이나 정보성 면에서 기존의
                        바코드보다 한층 더 발전된 코드 체계라고 볼 수 있습니다. 바코드가 특정 상품명이나 제조사 등의 제한된 정보만 기록할 수 있는 반면, QR코드는 인터넷 주소(URL)와
                        사진, 동영상 정보, 지도 정보, 명함 정보 등을 통합적으로 담을 수 있습니다.
                    </p>
                    <br />
                    <p>
                        QR코드는 다양한 사업 영역에서 활발하게 사용되고 있습니다. 국내 사용자의 80% 이상이 QR코드를 사용한 경험이 있는 것으로 알려져 있으며, 복원력에서도 일반 바코드보다
                        뛰어납니다. 이름 그대로 '빠른 응답'이 가능한 것이 특징입니다.</p>
                    </p>
                </div>
        </section>

        <hr class="hr hr__promotion" />

    </section>
</main>
<script>
    // DOM이 로드된 후 실행
    document.addEventListener('DOMContentLoaded', function () {
        // 관찰할 요소들 선택
        const fadeElements = document.querySelectorAll('.fade-up');

        // Intersection Observer 설정
        const options = {
            root: null, // viewport를 root로 사용
            rootMargin: '-50px', // viewport에서 50px 안쪽으로 여백을 둠
            threshold: 0.1 // 10%만 보여도 애니메이션 실행
        };

        // 관찰자 생성
        const observer = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target); // 한 번 실행 후 관찰 중단
                }
            });
        }, options);

        // 모든 요소 관찰 시작
        fadeElements.forEach(element => {
            observer.observe(element);
        });
    });
</script>
<?php
include_once(G5_PATH . '/tail.php');