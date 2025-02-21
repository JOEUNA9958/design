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
$community_type = 'notice'; // skin 분리 목적

// wr_id 값이 있으면 글읽기
if ((isset($wr_id) && $wr_id) || (isset($wr_seo_title) && $wr_seo_title)) {
    // 글이 없을 경우 해당 게시판 목록으로 이동
    if (!isset($write['wr_id'])) {
        $msg = '글이 존재하지 않습니다.\\n\\n글이 삭제되었거나 이동된 경우입니다.';
        alert($msg, G5_COMMUNITY_URL . '/notice.php?bo_table=notice');
    }
    // 한번 읽은글은 브라우저를 닫기전까지는 카운트를 증가시키지 않음
    $ss_name = 'ss_view_' . $bo_table . '_' . $wr_id;
    if (!get_session($ss_name)) {
        sql_query(" update {$write_table} set wr_hit = wr_hit + 1 where wr_id = '{$wr_id}' ");

        set_session($ss_name, TRUE);
    }

    $g5['title'] = strip_tags(conv_subject($write['wr_subject'], 255)) . " > " . $g5['board_title'];
}

?>
<main class="main__community">
    <div class="community-title-container">
        <h2 class="community-title">공지사항</h2>
        <p class="community-subtitle">
            (상호명)의 공지사항을 확인하실 수 있습니다.
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