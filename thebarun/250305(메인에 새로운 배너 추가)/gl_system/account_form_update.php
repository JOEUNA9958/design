<?php
$sub_menu = "100110";
require_once './_common.php';
require_once G5_LIB_PATH . '/register.lib.php';

check_demo();

auth_check_menu($auth, $sub_menu, 'w');

check_admin_token();

$mb_id = isset($_POST['mb_id']) ? trim($_POST['mb_id']) : '';
$mb_password = isset($_POST['mb_password']) ? trim($_POST['mb_password']) : '';
$mb_password_re = isset($_POST['mb_password_re']) ? trim($_POST['mb_password_re']) : '';

// 관리자가 자동등록방지를 사용해야 할 경우
if (function_exists('get_admin_captcha_by') && get_admin_captcha_by()) {
    include_once(G5_CAPTCHA_PATH . '/captcha.lib.php');
    if (!chk_captcha()) {
        alert('자동등록방지 숫자가 틀렸습니다.');
    }
}

if ($mb_password != $mb_password_re) {
    alert('비밀번호가 같지 않습니다.');
}

$mb = get_member($mb_id);
if (!$mb['mb_id']) {
    alert('존재하지 않는 회원입니다.');
}

$sql = " update {$g5['member_table']}
            set mb_password = '" . get_encrypt_string($mb_password) . "'
            where mb_id = '{$mb_id}' ";
sql_query($sql);

if (function_exists('get_admin_captcha_by')) {
    get_admin_captcha_by('remove');
}

alert('비밀번호를 변경하였습니다.\n변경된 비밀번호로 로그인 하세요.', G5_URL . '/logout.php');