<?php
include_once('./_common.php');

define('_INDEX_', true);

// 관리자는 바로 접근 가능
if ($is_admin != 'super') {
    // 세션 체크 및 시간 확인
    $auth_time = get_session('portfolio_authorized');
    $current_time = time();
    $time_limit = $config['cf_portfolio_session_time'] * 60;

    if (!$auth_time || ($current_time - $auth_time) >= $time_limit) {
        // 세션 제거
        set_session('portfolio_authorized', '');
        alert('접근 권한이 없습니다.', G5_URL);
        exit;
    }

    // 접근 시간 업데이트
    set_session('portfolio_authorized', time());
}

if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/portfolio.css">', 0);

$g5['board_title'] = $board['bo_subject'];
$community_type = 'gallery'; // skin 분리 목적이나 gallery와 동일
?>

<main class="main__community">
    <!-- 내용 -->
    <div class="title__portfolio">
        <h3 class="text__title-en">Portfolio</h3>
        <h2 class="text__title-ko">포트폴리오</h2>
    </div>

    <?php
    include_once(G5_COMMUNITY_PATH . '/list.php');
    ?>
</main>

<?php
include_once(G5_PATH . '/tail.php');