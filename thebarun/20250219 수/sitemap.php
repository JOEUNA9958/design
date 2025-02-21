<?php
include_once('./common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
  exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
?>

<main>
  <div class="sitemap-container">
    <h2 class="sitemap-title">사이트맵</h2>

    <div class="sitemap-grid">
      <!-- 회사소개 -->
      <div class="sitemap-section">
        <h3 class="section-title">회사소개</h3>
        <ul class="section-list">
          <li><a href="<?php echo G5_ABOUT_URL ?>/about.php">인사말</a></li>
          <li><a href="<?php echo G5_ABOUT_URL ?>/history.php">연혁</a></li>
          <li><a href="<?php echo G5_ABOUT_URL ?>/vision.php">비전</a></li>
          <li><a href="<?php echo G5_ABOUT_URL ?>/philosophy.php">경영이념</a></li>
        </ul>
      </div>

      <!-- 도메인 -->
      <div class="sitemap-section">
        <h3 class="section-title">도메인</h3>
        <ul class="section-list">
          <li><a href="<?php echo G5_DOMAIN_URL ?>/domain.php">도메인이란?</a></li>
          <li><a href="<?php echo G5_DOMAIN_URL ?>/topLevelDomain.php">국가 최상위 도메인</a></li>
          <li><a href="<?php echo G5_DOMAIN_URL ?>/countryDomain.php">국가 도메인</a></li>
        </ul>
      </div>

      <!-- 웹통합프로모션 -->
      <div class="sitemap-section">
        <h3 class="section-title">웹통합프로모션</h3>
        <ul class="section-list">
          <li><a href="<?php echo G5_URL ?>/promotion.php">웹통합프로모션</a></li>
        </ul>
      </div>

      <!-- 사업영역 -->
      <div class="sitemap-section">
        <h3 class="section-title">사업영역</h3>
        <ul class="section-list">
          <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section1">주요사업</a></li>
          <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section2">홈페이지</a></li>
          <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section3">모바일 웹</a></li>
          <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section4">온라인 마케팅</a></li>
          <li><a href="<?php echo G5_BUSINESS_URL ?>/business.php#section5">빅데이터</a></li>
        </ul>
      </div>

      <!-- 포트폴리오 -->
      <div class="sitemap-section">
        <h3 class="section-title">포트폴리오</h3>
        <ul class="section-list">
          <li><a href="<?php echo G5_URL ?>/portfolio.php?bo_table=portfolio">포트폴리오</a></li>
        </ul>
      </div>

      <!-- 고객센터 -->
      <div class="sitemap-section">
        <h3 class="section-title">고객센터</h3>
        <ul class="section-list">
          <li><a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/notice.php?bo_table=notice') ?>">공지사항</a></li>

          <li><a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/gallery.php?bo_table=gallery') ?>">갤러리</a></li>
          <li><a href="<?php echo short_url_clean(G5_COMMUNITY_URL . '/faq.php?bo_table=faq') ?>">자주 하시는 질문</a></li>
          <li><a href="<?php echo G5_COMMUNITY_URL ?>/contact.php">문의하기</a></li>
        </ul>
      </div>
    </div>
  </div>

</main>


<style>
  .sitemap-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
  }

  .sitemap-title {
    font-size: 32px;
    font-weight: bold;
    text-align: left;
    margin-bottom: 50px;
    color: #333;
  }

  .sitemap-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
  }

  .sitemap-section {
    min-width: 200px;
  }

  .section-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    padding-bottom: 15px;
    margin-bottom: 20px;
    border-bottom: 2px solid #3666AE;
  }

  .section-list {
    list-style: none;
    padding: 0;
  }

  .section-list li {
    margin-bottom: 12px;
  }

  .section-list a {
    color: #666;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
  }

  .section-list a:hover {
    color: #3666AE;
  }

  @media (max-width: 768px) {
    .sitemap-container {
      padding: 40px 20px;
    }

    .sitemap-title {
      font-size: 24px;
      margin-bottom: 30px;
    }

    .sitemap-grid {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .section-title {
      font-size: 18px;
    }

    .section-list a {
      font-size: 14px;
    }
  }
</style>
<?php
include_once(G5_PATH . '/tail.php');

