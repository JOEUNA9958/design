<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
  exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/domain.css">', 0);
?>

<main>
  <div class="main__domain">
    <!-- 브레드크럼 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
        <li class="breadcrumb-item"><a href="<?php echo G5_DOMAIN_URL ?>/domain.php">도메인</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          국가 도메인
        </li>
      </ol>
    </nav>

    <!-- 이미지 -->
    <article class="title__country-domain">
      <span class="text__title__domain-en">Country Domain</span>
      <h1 class="text__title__domain-ko">국가 도메인</h1>
    </article>

    <!-- 수평선 -->
    <hr class="hr hr__domain" />

    <!-- 섹션 1 -->
    <section class="section-country-domain-1">
      <h2 class="header__section-country-domain-1">
        국가 도메인은 <br />
        인터넷에서 국가가 소유하는 인터넷 주소입니다.
      </h2>

      <div class="info-cards">
        <div class="info-card">
          한글 등을 입력하면 <br />영어 주소로 변환
        </div>
        <div class="info-card">
          포털 등을 거치지 않고 <br />
          해당 사이트로 곧바로 연결
        </div>
        <div class="info-card">
          일부 국가는 자국민이나 <br />
          자국 기업/단체에게만 도메인 등록 허용
        </div>
      </div>
    </section>
  </div>

  <div class="main__domain-2 ">
    <!-- 한국의 국가 도메인 섹션 -->
    <section class="domain-section">
      <h2 class="section-title">한국의 국가 도메인</h2>
      <div class="korean-domain">
        <div class="subsection-1">
          <h3 class="subsection-title">대한민국의 국가 도메인</h3>
          <div class="domain-boxes">
            <div class="domain-box">.kr</div>
            <div class="domain-box">.한국</div>
          </div>
        </div>
        <div class="subsection">
          <h3 class="subsection-title">특징</h3>
          <div class="domain-rules">
            <p>한글로 된 도메인 사용 가능</p>
            <p>한국 법의 보호를 받음</p>
            <p>원하는 한글 표현 뒤에 '.한국'을 붙여 홈페이지 주소로 사용</p>
          </div>
        </div>
      </div>
    </section>

    <section class="domain-section">
      <h2 class="section-title">국가 도메인의 장점</h2>
      <div class="features-grid">
        <div class="feature-card">
          <p>쉽고 편리한 사용</p>
          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-1.svg" />
          </div>
        </div>
        <div class="feature-card">
          <p>사이버 세상에서 대한민국의 위상 제고</p>

          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-2.svg" />
          </div>
        </div>
        <div class="feature-card">
          <p>한글의 우수성을 세계에 알리는 계기</p>

          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-3.svg" />
          </div>
        </div>
        <div class="feature-card">
          <p>한글 이용자의 도메인 사용 편의성 증진</p>

          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-4.svg" />
          </div>
        </div>
        <div class="feature-card">
          <p>한글 정보화에 기여</p>

          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-5.svg" />
          </div>
        </div>
        <div class="feature-card">
          <p>기억하기 쉬워 높은 마케팅 활용성</p>

          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-6.svg" />
          </div>
        </div>
      </div>
    </section>

    <section class="domain-section">
      <h2 class="section-title">국제 동향</h2>

      <div class="global-section">
        <div class="global-card">
          <p>각 나라별로 자국 언어를 국가 코드 최상위 도메인으로 신청</p>

          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-7.svg" />
          </div>
        </div>
        <div class="global-card">
          <p>
            전 세계 인터넷주소자원관리기관(ICANN)을 통해 다국어 최상위
            도메인 도입
          </p>
          <div class="feature-icon">
            <img src="<?php echo G5_CSS_URL ?>/images/icon/domain/ic_countryDomain-8.svg" />
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- 배너 -->
  <footer class="country-domain-banner">
    <h3 class="country-domain-banner__title">
      이제 안전한 한국 도메인을 사용하세요.
    </h3>
    <p class="country-domain-banner__desc">
      원하는 한글 표현 뒤에 .한국을 붙여 홈페이지 주소로 사용할 수 있습니다.
    </p>
  </footer>
</main>
<?php
include_once(G5_PATH . '/tail.php');