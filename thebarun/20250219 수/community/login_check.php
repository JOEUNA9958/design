<?php
include_once('./_common.php');

$g5['title'] = "로그인 검사";

$mb_id = isset($_POST['mb_id']) ? trim($_POST['mb_id']) : '';
$mb_password = isset($_POST['mb_password']) ? trim($_POST['mb_password']) : '';

run_event('member_login_check_before', $mb_id);

if (!$mb_id || run_replace('check_empty_member_login_password', !$mb_password, $mb_id))
    alert('회원아이디나 비밀번호가 공백이면 안됩니다.');

$mb = get_member($mb_id);

//소셜 로그인추가 체크

$is_social_login = false;
$is_social_password_check = false;

$is_need_not_password = run_replace('login_check_need_not_password', $is_social_password_check, $mb_id, $mb_password, $mb, $is_social_login);

// $is_need_not_password 변수가 true 이면 패스워드를 체크하지 않습니다.
// 가입된 회원이 아니다. 비밀번호가 틀리다. 라는 메세지를 따로 보여주지 않는 이유는
// 회원아이디를 입력해 보고 맞으면 또 비밀번호를 입력해보는 경우를 방지하기 위해서입니다.
// 불법사용자의 경우 회원아이디가 틀린지, 비밀번호가 틀린지를 알기까지는 많은 시간이 소요되기 때문입니다.
if (!$is_need_not_password && (!(isset($mb['mb_id']) && $mb['mb_id']) || !login_password_check($mb, $mb_password, $mb['mb_password']))) {

    run_event('password_is_wrong', 'login', $mb);

    alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.');
}

// 차단된 아이디인가?
if ($mb['mb_intercept_date'] && $mb['mb_intercept_date'] <= date("Ymd", G5_SERVER_TIME)) {
    $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $mb['mb_intercept_date']);
    alert('회원님의 아이디는 접근이 금지되어 있습니다.\n처리일 : ' . $date);
}

// 탈퇴한 아이디인가?
if ($mb['mb_leave_date'] && $mb['mb_leave_date'] <= date("Ymd", G5_SERVER_TIME)) {
    $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $mb['mb_leave_date']);
    alert('탈퇴한 아이디이므로 접근하실 수 없습니다.\n탈퇴일 : ' . $date);
}

run_event('login_session_before', $mb, $is_social_login);

@include_once($member_skin_path . '/login_check.skin.php');

if (!(defined('SKIP_SESSION_REGENERATE_ID') && SKIP_SESSION_REGENERATE_ID)) {
    session_regenerate_id(false);
    if (function_exists('session_start_samesite')) {
        session_start_samesite();
    }
}

// 회원아이디 세션 생성
set_session('ss_mb_id', $mb['mb_id']);
// FLASH XSS 공격에 대응하기 위하여 회원의 고유키를 생성해 놓는다. 관리자에서 검사함
generate_mb_key($mb);

// 회원의 토큰키를 세션에 저장한다. /common.php 에서 해당 회원의 토큰값을 검사한다.
if (function_exists('update_auth_session_token'))
    update_auth_session_token($mb['mb_datetime']);

// 3.26
set_cookie('ck_mb_id', '', 0);
set_cookie('ck_auto', '', 0);


if ($url) {
    // url 체크
    check_url_host($url, '', G5_URL, true);

    $link = urldecode($url);
    // 2003-06-14 추가 (다른 변수들을 넘겨주기 위함)
    if (preg_match("/\?/", $link))
        $split = "&amp;";
    else
        $split = "?";

    // $_POST 배열변수에서 아래의 이름을 가지지 않은 것만 넘김
    $post_check_keys = array('mb_id', 'mb_password', 'x', 'y', 'url');

    $post_check_keys = run_replace('login_check_post_check_keys', $post_check_keys, $link, $is_social_login);

    foreach ($_POST as $key => $value) {
        if ($key && !in_array($key, $post_check_keys)) {
            $link .= "$split$key=$value";
            $split = "&amp;";
        }
    }

} else {
    $link = G5_URL;
}

run_event('member_login_check', $mb, $link, $is_social_login);

// 관리자로 로그인시 DATA 폴더의 쓰기 권한이 있는지 체크합니다. 쓰기 권한이 없으면 로그인을 못합니다.
if (is_admin($mb['mb_id']) && is_dir(G5_DATA_PATH . '/tmp/')) {
    $tmp_data_file = G5_DATA_PATH . '/tmp/tmp-write-test-' . time();
    $tmp_data_check = @fopen($tmp_data_file, 'w');
    if ($tmp_data_check) {
        if (!@fwrite($tmp_data_check, G5_URL)) {
            $tmp_data_check = false;
        }
    }
    if (is_resource($tmp_data_check))
        @fclose($tmp_data_check);
    @unlink($tmp_data_file);

    if (!$tmp_data_check) {
        alert("data 폴더에 쓰기권한이 없거나 또는 웹하드 용량이 없는 경우\\n로그인을 못할수도 있으니, 용량 체크 및 쓰기 권한을 확인해 주세요.", $link);
    }
}

goto_url($link);