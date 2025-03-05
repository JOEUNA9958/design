<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/community.css">', 0);

$g5['board_title'] = $board['bo_subject'];
$community_type = 'faq'; // skin 분리 목적
?>
<main class="main__community">
    <div class="community-title-container">
        <h2 class="community-title">자주 하시는 질문</h2>
        <p class="community-subtitle">궁금하신 정보를 확인하실 수 있습니다.</p>
    </div>
    <?php
    include_once(G5_COMMUNITY_PATH . '/list.php');
    ?>
</main>
<?php
include_once(G5_PATH . '/tail.php');