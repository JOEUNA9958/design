<?php
include_once('./common.php');

$password = isset($_POST['password']) ? $_POST['password'] : '';
$correct_password = $config['cf_portfolio_password'];

$response = array();

if (hash_equals($correct_password, $password)) {
    // 세션에 현재 시간 저장
    set_session('portfolio_authorized', time());
    $response['success'] = true;
} else {
    $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;