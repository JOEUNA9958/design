<?php
$sub_menu = "100100";
require_once './_common.php';

check_demo();

auth_check_menu($auth, $sub_menu, 'w');

if ($is_admin != 'super') {
    alert('최고관리자만 접근 가능합니다.');
}

$cf_title = isset($_POST['cf_title']) ? strip_tags(clean_xss_attributes($_POST['cf_title'])) : '';
$cf_admin = isset($_POST['cf_admin']) ? clean_xss_tags($_POST['cf_admin'], 1, 1) : '';

$mb = get_member($cf_admin);

if (!(isset($mb['mb_id']) && $mb['mb_id'])) {
    alert('최고관리자 회원아이디가 존재하지 않습니다.');
}

check_admin_token();

$check_keys = array('cf_cert_kcb_cd', 'cf_cert_kcp_cd', 'cf_editor', 'cf_recaptcha_site_key', 'cf_recaptcha_secret_key', 'cf_naver_clientid', 'cf_naver_secret', 'cf_google_clientid', 'cf_google_secret', 'cf_googl_shorturl_apikey', 'cf_kakao_rest_key', 'cf_kakao_client_secret', 'cf_kakao_js_apikey', 'cf_cert_kg_cd', 'cf_cert_kg_mid');

foreach ($check_keys as $key) {
    if (isset($_POST[$key]) && $_POST[$key]) {
        $_POST[$key] = preg_replace('/[^a-z0-9_\-\.]/i', '', $_POST[$key]);
    }
}

if (isset($_POST['cf_intercept_ip']) && $_POST['cf_intercept_ip']) {
    $pattern = explode("\n", trim($_POST['cf_intercept_ip']));
    for ($i = 0; $i < count($pattern); $i++) {
        $pattern[$i] = trim($pattern[$i]);
        if (empty($pattern[$i])) {
            continue;
        }

        $pattern[$i] = str_replace(".", "\.", $pattern[$i]);
        $pattern[$i] = str_replace("+", "[0-9\.]+", $pattern[$i]);
        $pat = "/^{$pattern[$i]}$/";

        if (preg_match($pat, $_SERVER['REMOTE_ADDR'])) {
            alert("현재 접속 IP : " . $_SERVER['REMOTE_ADDR'] . " 가 차단될수 있기 때문에, 다른 IP를 입력해 주세요.");
        }
    }
}

$check_keys = array(
    'cf_use_email_certify' => 'int',
    'cf_use_homepage' => 'int',
    'cf_req_homepage' => 'int',
    'cf_use_tel' => 'int',
    'cf_req_tel' => 'int',
    'cf_use_hp' => 'int',
    'cf_req_hp' => 'int',
    'cf_use_addr' => 'int',
    'cf_req_addr' => 'int',
    'cf_use_signature' => 'int',
    'cf_req_signature' => 'int',
    'cf_use_profile' => 'int',
    'cf_req_profile' => 'int',
    'cf_register_level' => 'int',
    'cf_icon_level' => 'int',
    'cf_use_recommend' => 'int',
    'cf_leave_day' => 'int',
    'cf_search_part' => 'int',
    'cf_email_wr_super_admin' => 'int',
    'cf_email_wr_group_admin' => 'int',
    'cf_email_wr_board_admin' => 'int',
    'cf_email_wr_write' => 'int',
    'cf_email_wr_comment_all' => 'int',
    'cf_email_mb_super_admin' => 'int',
    'cf_email_mb_member' => 'int',
    'cf_email_po_super_admin' => 'int',
    'cf_prohibit_id' => 'text',
    'cf_prohibit_email' => 'text',
    'cf_new_del' => 'int',
    'cf_memo_del' => 'int',
    'cf_visit_del' => 'int',
    'cf_popular_del' => 'int',
    'cf_login_minutes' => 'int',
    'cf_formmail_is_member' => 'int',
    'cf_page_rows' => 'int',
    'cf_mobile_page_rows' => 'int',
    'cf_cert_req' => 'int',
    'cf_cert_find' => 'int',
    'cf_cert_ipin' => 'char',
    'cf_cert_hp' => 'char',
    'cf_cert_simple' => 'char',
    'cf_admin_email' => 'char',
    'cf_admin_email_name' => 'char',
    'cf_add_script' => 'text',
    'cf_use_copy_log' => 'int',
    'cf_cut_name' => 'int',
    'cf_write_pages' => 'int',
    'cf_mobile_pages' => 'int',
    'cf_link_target' => 'char',
    'cf_delay_sec' => 'int',
    'cf_filter' => 'text',
    'cf_possible_ip' => 'text',
    'cf_analytics' => 'text',
    'cf_add_meta' => 'text',
    'cf_member_skin' => 'char',
    'cf_image_extension' => 'char',
    'cf_flash_extension' => 'char',
    'cf_movie_extension' => 'char',
    'cf_visit' => 'char',
    'cf_open_modify' => 'int',
    'cf_mobile_new_skin' => 'char',
    'cf_mobile_search_skin' => 'char',
    'cf_mobile_connect_skin' => 'char',
    'cf_mobile_faq_skin' => 'char',
    'cf_mobile_member_skin' => 'char',
    'cf_captcha_mp3' => 'char',
    'cf_cert_limit' => 'int',
    'cf_captcha' => 'char',
    'cf_syndi_token' => '',
    'cf_syndi_except' => '',
    'cf_smtp' => 'char',
    'cf_smtp_port' => 'char',
    'cf_smtp_user' => 'char',
    'cf_smtp_pw' => 'char',
    'cf_portfolio_password' => 'char',
    'cf_portfolio_session_time' => 'int'
);

foreach ($check_keys as $k => $v) {
    if ($v === 'int') {
        $_POST[$k] = isset($_POST[$k]) ? (int) $_POST[$k] : 0;
    } else {
        if (in_array($k, array('cf_analytics', 'cf_add_meta'))) {
            $_POST[$k] = isset($_POST[$k]) ? $_POST[$k] : '';
        } else {
            $_POST[$k] = isset($_POST[$k]) ? strip_tags(clean_xss_attributes($_POST[$k])) : '';
        }
    }
}

$encrypted_smtp_pw = encrypt_string($_POST['cf_smtp_pw'], $config['cf_smtp_key']);

$sql = " update {$g5['config_table']}
            set cf_title = '{$cf_title}',
                cf_admin = '{$cf_admin}',
                cf_admin_email = '{$_POST['cf_admin_email']}',
                cf_admin_email_name = '{$_POST['cf_admin_email_name']}',
                cf_write_pages = '{$_POST['cf_write_pages']}',
                cf_mobile_pages = '{$_POST['cf_mobile_pages']}',
                cf_filter = '{$_POST['cf_filter']}',
                cf_possible_ip = '" . trim($_POST['cf_possible_ip']) . "',
                cf_intercept_ip = '" . trim($_POST['cf_intercept_ip']) . "',
                cf_analytics = '{$_POST['cf_analytics']}',
                cf_add_meta = '{$_POST['cf_add_meta']}',
                cf_syndi_token = '{$_POST['cf_syndi_token']}',
                cf_syndi_except = '{$_POST['cf_syndi_except']}',
                cf_bbs_rewrite = '{$_POST['cf_bbs_rewrite']}',
                cf_bbs_rewrite = '{$_POST['cf_bbs_rewrite']}',
                cf_image_extension = '{$_POST['cf_image_extension']}',
                cf_movie_extension = '{$_POST['cf_movie_extension']}',
                cf_editor = '{$_POST['cf_editor']}',          
                cf_smtp_secure = '{$_POST['cf_smtp_secure']}',
                cf_smtp = '{$_POST['cf_smtp']}',
                cf_smtp_port = '{$_POST['cf_smtp_port']}',
                cf_smtp_user = '{$_POST['cf_smtp_user']}',
                cf_smtp_pw = '{$encrypted_smtp_pw}',
                cf_portfolio_password = '{$_POST['cf_portfolio_password']}',
                cf_portfolio_session_time = '{$_POST['cf_portfolio_session_time']}'
                ";
sql_query($sql);

//sql_query(" OPTIMIZE TABLE `$g5[config_table]` ");

if (isset($_POST['cf_bbs_rewrite'])) {
    g5_delete_all_cache();
}

run_event('admin_config_form_update');

update_rewrite_rules();

goto_url('./config_form.php');
