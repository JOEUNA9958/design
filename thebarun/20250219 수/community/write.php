<?php
include_once('../common.php');
include_once(G5_EDITOR_LIB);
include_once(G5_CAPTCHA_PATH . '/captcha.lib.php');

if (!$is_admin) {
    alert('글을 쓸 권한이 없습니다.', G5_URL);
}

if (!$board['bo_table']) {
    alert('존재하지 않는 게시판입니다.', G5_URL);
}

if (!$bo_table) {
    alert("bo_table 값이 넘어오지 않았습니다.\\nwrite.php?bo_table=code 와 같은 방식으로 넘겨 주세요.", G5_URL);
}

$notice_array = explode(',', trim($board['bo_notice']));

if (!($w == '' || $w == 'u' || $w == 'r')) {
    alert('w 값이 제대로 넘어오지 않았습니다.');
}

if ($w == 'u' || $w == 'r') {
    if (!$write['wr_id']) {
        alert("글이 존재하지 않습니다.\\n삭제되었거나 이동된 경우입니다.", G5_URL);
    }
}

run_event('community_write', $board, $wr_id, $w);

if ($w == '') {
    if ($wr_id) {
        alert('글쓰기에는 \$wr_id 값을 사용하지 않습니다.', G5_COMMUNITY_URL . '/notice.php?bo_table=' . $bo_table);
    }

    $title_msg = '글쓰기';
} else if ($w == 'u') {
    $title_msg = '글수정';
}

if (G5_IS_MOBILE) {
    alert('PC에서만 ' . $title_msg . '이 가능합니다.', get_pretty_url($bo_table));
}

// 글자수 제한 설정값
if ($is_admin || $board['bo_use_dhtml_editor']) {
    $write_min = $write_max = 0;
} else {
    $write_min = (int) $board['bo_write_min'];
    $write_max = (int) $board['bo_write_max'];
}

$g5['write_title'] = ((G5_IS_MOBILE && $board['bo_mobile_subject']) ? $board['bo_mobile_subject'] : $board['bo_subject']) . ' ' . $title_msg;

$is_html = true;

$is_secret = false;

$recv_email_checked = '';
if ($w == '' || strstr($write['wr_option'], 'mail'))
    $recv_email_checked = 'checked';

$is_name = false;
$is_password = false;
$is_email = false;
$is_homepage = false;
if ($is_guest || ($is_admin && $w == 'u' && $member['mb_id'] !== $write['mb_id'])) {
    $is_name = true;
    $is_password = true;
    $is_email = true;
    $is_homepage = true;
}

$is_category = false;
$category_option = '';

$is_link = true;
$is_file = true;

$is_file_content = false;
if ($board['bo_use_file_content']) {
    $is_file_content = true;
}

$file_count = (int) $board['bo_upload_count'];

$name = "";
$email = "";
$homepage = "";
if ($w == "" || $w == "r") {
    if ($is_member) {
        if (isset($write['wr_name'])) {
            $name = get_text(cut_str(stripslashes($write['wr_name']), 20));
        }
        $email = get_email_address($member['mb_email']);
        $homepage = get_text(stripslashes($member['mb_homepage']));
    }
}

$html_checked = "";
$html_value = "";
$secret_checked = "";

if ($w == '') {
    $password_required = 'required';
} else if ($w == 'u') {
    $password_required = '';

    if (!$is_admin) {
        if (!($is_member && $member['mb_id'] === $write['mb_id'])) {
            if (!check_password($wr_password, $write['wr_password'])) {
                $is_wrong = run_replace('invalid_password', false, 'write', $write);
                if (!$is_wrong)
                    alert('비밀번호가 틀립니다.');
            }
        }
    }

    $name = get_text(cut_str(stripslashes($write['wr_name']), 20));
    $email = get_email_address($write['wr_email']);
    $homepage = get_text(stripslashes($write['wr_homepage']));

    for ($i = 1; $i <= G5_LINK_COUNT; $i++) {
        $write['wr_link' . $i] = get_text($write['wr_link' . $i]);
        $link[$i] = $write['wr_link' . $i];
    }

    if (strstr($write['wr_option'], 'html1')) {
        $html_checked = 'checked';
        $html_value = 'html1';
    } else if (strstr($write['wr_option'], 'html2')) {
        $html_checked = 'checked';
        $html_value = 'html2';
    }

    if (strstr($write['wr_option'], 'secret')) {
        $secret_checked = 'checked';
    }

    $file = get_file($bo_table, $wr_id);
    if ($file_count < $file['count']) {
        $file_count = $file['count'];
    }

    for ($i = 0; $i < $file_count; $i++) {
        if (!isset($file[$i])) {
            $file[$i] = array('file' => null, 'source' => null, 'size' => null, 'bf_content' => null);
        }
    }

} else if ($w == 'r') {
    if (strstr($write['wr_option'], 'secret')) {
        $is_secret = true;
        $secret_checked = 'checked';
    }

    $password_required = "required";

    for ($i = 1; $i <= G5_LINK_COUNT; $i++) {
        $write['wr_link' . $i] = get_text($write['wr_link' . $i]);
    }
}

set_session('ss_bo_table', $bo_table);
set_session('ss_wr_id', $wr_id);

$subject = "";
if (isset($write['wr_subject'])) {
    $subject = str_replace("\"", "&#034;", get_text(cut_str($write['wr_subject'], 255), 0));
}

$content = '';
if ($w == '') {
    $content = html_purifier($board['bo_insert_content']);
} else if ($w == 'r') {
    if (!strstr($write['wr_option'], 'html')) {
        $content = "\n\n\n &gt; "
            . "\n &gt; "
            . "\n &gt; " . str_replace("\n", "\n> ", get_text($write['wr_content'], 0))
            . "\n &gt; "
            . "\n &gt; ";

    }
} else {
    $content = get_text($write['wr_content'], 0);
}

$upload_max_filesize = number_format($board['bo_upload_size']) . ' 바이트';

$width = $board['bo_table_width'];
if ($width <= 100)
    $width .= '%';
else
    $width .= 'px';

$captcha_html = '';
$captcha_js = '';
$is_use_captcha = ((($board['bo_use_captcha'] && $w !== 'u') || $is_guest) && !$is_admin) ? 1 : 0;

if ($is_use_captcha) {
    $captcha_html = captcha_html();
    $captcha_js = chk_captcha_js();
}

$is_dhtml_editor = false;
$is_dhtml_editor_use = false;
$editor_content_js = '';
if (!is_mobile() || defined('G5_IS_MOBILE_DHTML_USE') && G5_IS_MOBILE_DHTML_USE)
    $is_dhtml_editor_use = true;

// 모바일에서는 G5_IS_MOBILE_DHTML_USE 설정에 따라 DHTML 에디터 적용
if ($config['cf_editor'] && $is_dhtml_editor_use && $board['bo_use_dhtml_editor']) {
    $is_dhtml_editor = true;

    if ($w == 'u' && (!$is_member || !$is_admin || $write['mb_id'] !== $member['mb_id'])) {
        // kisa 취약점 제보 xss 필터 적용
        $content = get_text(html_purifier($write['wr_content']), 0);
    }

    if (is_file(G5_EDITOR_PATH . '/' . $config['cf_editor'] . '/autosave.editor.js'))
        $editor_content_js = '<script src="' . G5_EDITOR_URL . '/' . $config['cf_editor'] . '/autosave.editor.js"></script>' . PHP_EOL;
}
$editor_html = editor_html('wr_content', $content, $is_dhtml_editor);
$editor_js = '';
$editor_js .= get_editor_js('wr_content', $is_dhtml_editor);
$editor_js .= chk_editor_js('wr_content', $is_dhtml_editor);

// 임시 저장된 글 수
$autosave_count = autosave_count($member['mb_id']);

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);

include_once(G5_PATH . '/head.sub.php');
include_once(G5_PATH . '/head.php');

$action_url = https_url(G5_COMMUNITY_DIR) . "/write_update.php";

include_once('./write.skin.php');

include_once(G5_PATH . '/tail.php');
include_once(G5_PATH . '/tail.sub.php');
