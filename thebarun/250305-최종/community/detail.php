<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/community.css">', 0);
?>
<main class="main__community">
    <div class="community-title-container">
        <h2 class="community-title">공지사항</h2>
        <p class="community-subtitle">
            (상호명)의 공지사항을 확인하실 수 있습니다.
        </p>
    </div>
    <!-- notice-detail.html -->
    <section class="notice-detail">
        <div class="detail-container">
            <!-- 게시글 헤더 -->
            <div class="post-header">
                <h3 class="post-title">사이트 오픈 안내</h3>
                <span class="post-date">24.10.11</span>
            </div>

            <!-- 게시글 내용 -->
            <div class="post-content">
                <p>
                    안녕하세요. (상호명) 입니다.<br /><br />

                    저희 웹사이트가 새롭게 오픈하였습니다.<br />
                    더 나은 서비스를 제공하기 위해 최선을 다하겠습니다.<br /><br />

                    새로운 기능과 더 나은 사용자 경험을 제공하기 위해<br />
                    많은 변화와 개선이 있었습니다.<br /><br />

                    앞으로도 지속적인 업데이트와 개선을 통해<br />
                    더 나은 서비스를 제공하도록 하겠습니다.<br /><br />

                    감사합니다.
                </p>
            </div>
        </div>
        <!-- 버튼 영역 -->
        <div class="button-area">
            <a href="<?php echo G5_COMMUNITY_URL . '/' . $bo_table . '.php?bo_table=' . $bo_table ?>"
                class="list-button">목록으로</a>
        </div>
    </section>
</main>

<?php
include_once(G5_PATH . '/tail.php');