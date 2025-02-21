<?php
include_once('./_common.php');

$response = array();


// 관리자 체크
if ($is_admin == 'super') {
    $response['authorized'] = true;
} else {
    // 세션 체크 및 시간 확인
    $auth_time = get_session('portfolio_authorized');
    $current_time = time();
    $time_limit = $config['cf_portfolio_session_time'] * 60;

    if ($auth_time && ($current_time - $auth_time) < $time_limit) {
        $response['authorized'] = true;
    } else {
        // 세션 제거
        set_session('portfolio_authorized', '');
        $response['authorized'] = false;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit;