<?php
include_once('../common.php');

if (!$board['bo_table']) {
    alert('존재하지 않는 게시판입니다.', G5_URL);
}

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/community.css">', 0);

$g5['board_title'] = $board['bo_subject'];
$community_type = 'gallery'; // skin 분리 목적
?>
<main class="main__community">
    <div class="community-title-container">
        <h2 class="community-title">갤러리</h2>
        <p class="community-subtitle">
            (상호명)의 소식을 확인하실 수 있습니다.
        </p>
    </div>


    <?php
    if (isset($wr_id) && $wr_id) {
        // 게시물 아이디가 있다면 게시물 보기
        include_once(G5_COMMUNITY_PATH . '/view.php');
    } else {
        include_once(G5_COMMUNITY_PATH . '/list.php');
    }
    ?>

</main>


<?php
include_once(G5_PATH . '/tail.php');