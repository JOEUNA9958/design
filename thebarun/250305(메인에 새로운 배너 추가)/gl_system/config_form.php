<?php
$sub_menu = "100100";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'r');

if ($is_admin != 'super') {
    alert('최고관리자만 접근 가능합니다.');
}

// https://github.com/gnuboard/gnuboard5/issues/296 이슈처리
$sql = " select * from {$g5['config_table']} limit 1";
$config = sql_fetch($sql);

if (!isset($config['cf_editor'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_editor` VARCHAR(255) NOT NULL DEFAULT '' AFTER `cf_captcha_mp3` ",
        true
    );
}

if (!isset($config['cf_googl_shorturl_apikey'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_googl_shorturl_apikey` VARCHAR(255) NOT NULL DEFAULT '' AFTER `cf_captcha_mp3` ",
        true
    );
}

if (!isset($config['cf_mobile_pages'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_mobile_pages` INT(11) NOT NULL DEFAULT '0' AFTER `cf_write_pages` ",
        true
    );
    sql_query(" UPDATE `{$g5['config_table']}` SET cf_mobile_pages = '5' ", true);
}

// uniqid 테이블이 없을 경우 생성
if (!sql_query(" DESC {$g5['uniqid_table']} ", false)) {
    sql_query(
        " CREATE TABLE IF NOT EXISTS `{$g5['uniqid_table']}` (
                  `uq_id` bigint(20) unsigned NOT NULL,
                  `uq_ip` varchar(255) NOT NULL,
                  PRIMARY KEY (`uq_id`)
                ) ",
        false
    );
}

if (!sql_query(" SELECT uq_ip from {$g5['uniqid_table']} limit 1 ", false)) {
    sql_query(" ALTER TABLE {$g5['uniqid_table']} ADD `uq_ip` VARCHAR(255) NOT NULL ");
}

// 임시저장 테이블이 없을 경우 생성
if (!sql_query(" DESC {$g5['autosave_table']} ", false)) {
    sql_query(
        " CREATE TABLE IF NOT EXISTS `{$g5['autosave_table']}` (
                  `as_id` int(11) NOT NULL AUTO_INCREMENT,
                  `mb_id` varchar(20) NOT NULL,
                  `as_uid` bigint(20) unsigned NOT NULL,
                  `as_subject` varchar(255) NOT NULL,
                  `as_content` text NOT NULL,
                  `as_datetime` datetime NOT NULL,
                  PRIMARY KEY (`as_id`),
                  UNIQUE KEY `as_uid` (`as_uid`),
                  KEY `mb_id` (`mb_id`)
                ) ",
        false
    );
}

if (!isset($config['cf_admin_email'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_admin_email` VARCHAR(255) NOT NULL AFTER `cf_admin` ",
        true
    );
}

if (!isset($config['cf_admin_email_name'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_admin_email_name` VARCHAR(255) NOT NULL AFTER `cf_admin_email` ",
        true
    );
}

if (!isset($config['cf_analytics'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_analytics` TEXT NOT NULL AFTER `cf_intercept_ip` ",
        true
    );
}

if (!isset($config['cf_add_meta'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_add_meta` TEXT NOT NULL AFTER `cf_analytics` ",
        true
    );
}

if (!isset($config['cf_syndi_token'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_syndi_token` VARCHAR(255) NOT NULL AFTER `cf_add_meta` ",
        true
    );
}

if (!isset($config['cf_syndi_except'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_syndi_except` TEXT NOT NULL AFTER `cf_syndi_token` ",
        true
    );
}

if (!isset($config['cf_optimize_date'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_optimize_date` date NOT NULL default '0000-00-00' AFTER `cf_popular_del` ",
        true
    );
}

// 짧은 URL 주소를 사용 여부 필드 추가
if (!isset($config['cf_bbs_rewrite'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_bbs_rewrite` tinyint(4) NOT NULL DEFAULT '0' AFTER `cf_link_target` ",
        true
    );
}

if (!isset($config['cf_cert_kg_cd'])) {
    $sql = "ALTER TABLE `{$g5['config_table']}`
            ADD COLUMN `cf_cert_kg_cd` VARCHAR(255) NOT NULL DEFAULT '' AFTER `cf_cert_simple`; ";
    sql_query($sql, false);
}

$g5['title'] = '환경설정';
require_once './admin.head.php';

$pg_anchor = '<ul class="anchor">
    <li><a href="#anc_cf_basic">기본환경</a></li>
    <li><a href="#anc_cf_portfolio">포트폴리오</a></li>
    <li><a href="#anc_cf_url">짧은주소</a></li>
    <li><a href="#anc_cf_board">게시판기본</a></li>
</ul>';

$userinfo = array('payment' => '');
?>

<form name="fconfigform" id="fconfigform" method="post" onsubmit="return fconfigform_submit(this);">
    <input type="hidden" name="token" value="" id="token">
    <input type="hidden" name="cf_write_pages" value="10" id="token">
    <input type="hidden" name="cf_mobile_pages" value="6" id="token">
    <input type="hidden" name="cf_movie_extension" value="asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3" id="token">
    <input type="hidden" name="cf_admin" value="<?php echo $config['cf_admin'] ?>" id="cf_admin">

    <section id="anc_cf_basic">
        <h2 class="h2_frm">홈페이지 기본환경 설정</h2>
        <?php echo $pg_anchor ?>

        <div class="tbl_frm01 tbl_wrap">
            <table>
                <caption>홈페이지 기본환경 설정</caption>
                <colgroup>
                    <col class="grid_4">
                    <col>
                    <col class="grid_4">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row"><label for="cf_title">홈페이지 제목<strong class="sound_only">필수</strong></label></th>
                        <td colspan="3"><input type="text" name="cf_title"
                                value="<?php echo get_sanitize_input($config['cf_title']); ?>" id="cf_title" required
                                class="required frm_input" size="40"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_admin_email">관리자 메일 주소<strong
                                    class="sound_only">필수</strong></label></th>
                        <td>
                            <?php echo help('초기 그누보드5 설치 시에 설정된 메일 주소입니다.') ?>
                            <input type="text" name="cf_admin_email"
                                value="<?php echo get_sanitize_input($config['cf_admin_email']); ?>" id="cf_admin_email"
                                required class="required email frm_input" size="40">
                            <?php if (function_exists('domain_mail_host') && $config['cf_admin_email'] && stripos($config['cf_admin_email'], domain_mail_host()) === false) { ?>
                                <?php echo help('문의하기 메일을 수신할 관리자 이메일을 입력합니다.') ?>
                            <?php } ?>
                        </td>
                        <th scope="row"><label for="cf_admin_email_name">문의하기 메일 발송이름<strong
                                    class="sound_only">필수</strong></label></th>
                        <td>
                            <?php echo help('관리자가 받는 용도로 사용하는 메일의 발송이름을 입력합니다. (문의하기 메일 수신 이름)') ?>
                            <input type="text" name="cf_admin_email_name"
                                value="<?php echo get_sanitize_input($config['cf_admin_email_name']); ?>"
                                id="cf_admin_email_name" required class="required frm_input" size="40">
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_smtp_secure">SMTP Secure<strong
                                    class="sound_only">필수</strong></label></th>
                        <td colspan="3">
                            <?php echo help('메일 발송에 사용할 SMTPSecure을 설정합니다. (tls/ssl)') ?>
                            <input type="text" name="cf_smtp_secure"
                                value="<?php echo get_sanitize_input($config['cf_smtp_secure']); ?>" id="cf_smtp_secure"
                                class="frm_input" size="40">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_smtp">SMTP<strong class="sound_only">필수</strong></label></th>
                        <td><?php echo help('메일 발송에 사용할 SMTP를 설정합니다. (구글의 경우, smtp.gmail.com)') ?>
                            <input type="text" name="cf_smtp"
                                value="<?php echo get_sanitize_input($config['cf_smtp']); ?>" id="cf_smtp"
                                class="frm_input" size="40">
                        </td>
                        <th scope="row"><label for="cf_smtp_port">SMTP Port<strong
                                    class="sound_only">필수</strong></label>
                        </th>
                        <td><?php echo help('메일 발송에 사용할 SMTP port를 설정합니다. (구글의 경우, 465)') ?>
                            <input type="text" name="cf_smtp_port"
                                value="<?php echo get_sanitize_input($config['cf_smtp_port']); ?>" id="cf_smtp_port"
                                class="frm_input" size="40">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_smtp_user">SMTP Email<strong
                                    class="sound_only">필수</strong></label>
                        </th>
                        <td><?php echo help('메일 발송에 사용할 SMTP 메일 주소를 설정합니다.') ?>
                            <input type="text" name="cf_smtp_user"
                                value="<?php echo get_sanitize_input($config['cf_smtp_user']); ?>" id="cf_smtp_user"
                                class="frm_input" size="40">
                        </td>
                        <th scope="row"><label for="cf_smtp_pw">SMTP Password<strong
                                    class="sound_only">필수</strong></label>
                        </th>
                        <td><?php echo help('메일 발송에 사용할 SMTP 비밀번호를 설정합니다.') ?>
                            <input type="password" name="cf_smtp_pw"
                                value="<?php echo get_sanitize_input($config['cf_smtp_pw']); ?>" id="cf_smtp_pw"
                                class="frm_input" size="40">
                        </td>
                    </tr>
                    <!-- <tr>
                        <th scope="row"><label for="cf_write_pages">페이지 표시 수<strong
                                    class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="cf_write_pages"
                                value="<?php echo (int) $config['cf_write_pages'] ?>" id="cf_write_pages" required
                                class="required numeric frm_input" size="3"> 페이지씩 표시</td>
                        <th scope="row"><label for="cf_mobile_pages">모바일 페이지 표시 수<strong
                                    class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="cf_mobile_pages"
                                value="<?php echo (int) $config['cf_mobile_pages'] ?>" id="cf_mobile_pages" required
                                class="required numeric frm_input" size="3"> 페이지씩 표시</td>
                    </tr> -->
                    <tr>
                        <th scope="row"><label for="cf_editor">에디터 선택</label></th>
                        <td colspan="3">
                            <?php echo help(G5_EDITOR_URL . ' 밑의 DHTML 에디터 폴더를 선택합니다.') ?>
                            <select name="cf_editor" id="cf_editor">
                                <?php
                                $arr = get_skin_dir('', G5_EDITOR_PATH);
                                for ($i = 0; $i < count($arr); $i++) {
                                    if ($i == 0) {
                                        echo "<option value=\"\">사용안함</option>";
                                    }
                                    echo "<option value=\"" . $arr[$i] . "\"" . get_selected($config['cf_editor'], $arr[$i]) . ">" . $arr[$i] . "</option>\n";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_possible_ip">접근가능 IP</label></th>
                        <td>
                            <?php echo help('입력된 IP의 컴퓨터만 접근할 수 있습니다.<br>123.123.+ 도 입력 가능. (엔터로 구분)') ?>
                            <textarea name="cf_possible_ip"
                                id="cf_possible_ip"><?php echo get_sanitize_input($config['cf_possible_ip']); ?></textarea>
                        </td>
                        <th scope="row"><label for="cf_intercept_ip">접근차단 IP</label></th>
                        <td>
                            <?php echo help('입력된 IP의 컴퓨터는 접근할 수 없음.<br>123.123.+ 도 입력 가능. (엔터로 구분)') ?>
                            <textarea name="cf_intercept_ip"
                                id="cf_intercept_ip"><?php echo get_sanitize_input($config['cf_intercept_ip']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_analytics">방문자분석 스크립트</label></th>
                        <td colspan="3">
                            <?php echo help('방문자분석 스크립트 코드를 입력합니다. 예) 구글 애널리틱스<br>관리자 페이지에서는 이 코드를 사용하지 않습니다.'); ?>
                            <textarea name="cf_analytics"
                                id="cf_analytics"><?php echo get_text($config['cf_analytics']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_add_meta">추가 메타태그</label></th>
                        <td colspan="3">
                            <?php echo help('추가로 사용하실 meta 태그를 입력합니다.<br>관리자 페이지에서는 이 코드를 사용하지 않습니다.'); ?>
                            <textarea name="cf_add_meta"
                                id="cf_add_meta"><?php echo get_text($config['cf_add_meta']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_syndi_token">네이버 신디케이션 연동키</label></th>
                        <td colspan="3">
                            <?php if (!function_exists('curl_init')) {
                                echo help('<b>경고) curl이 지원되지 않아 네이버 신디케이션을 사용할수 없습니다.</b>');
                            } ?>
                            <?php echo help('네이버 신디케이션 연동키(token)을 입력하면 네이버 신디케이션을 사용할 수 있습니다.<br>연동키는 <a href="http://webmastertool.naver.com/" target="_blank"><u>네이버 웹마스터도구</u></a> -> 네이버 신디케이션에서 발급할 수 있습니다.') ?>
                            <input type="text" name="cf_syndi_token"
                                value="<?php echo isset($config['cf_syndi_token']) ? get_sanitize_input($config['cf_syndi_token']) : ''; ?>"
                                id="cf_syndi_token" class="frm_input" size="70">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cf_syndi_except">네이버 신디케이션 제외게시판</label></th>
                        <td colspan="3">
                            <?php echo help('네이버 신디케이션 수집에서 제외할 게시판 아이디를 | 로 구분하여 입력하십시오. 예) notice|faq|gallery|portfolio') ?>
                            <input type="text" name="cf_syndi_except"
                                value="<?php echo isset($config['cf_syndi_except']) ? get_sanitize_input($config['cf_syndi_except']) : ''; ?>"
                                id="cf_syndi_except" class="frm_input" size="70">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


    <section id="anc_cf_portfolio">
        <h2 class="h2_frm">포트폴리오 설정</h2>
        <?php echo $pg_anchor ?>

        <div class="tbl_frm01 tbl_wrap">
            <table>
                <caption>포트폴리오 설정</caption>
                <colgroup>
                    <col class="grid_4">
                    <col>
                    <col class="grid_4">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row"><label for="cf_portfolio_password">접근 비밀번호</label></th>
                        <td>
                            <?php echo help('포트폴리오 게시판 접근시 필요 비밀번호. 관리자 로그인시 필요없음.') ?>
                            <input type="text" name="cf_portfolio_password"
                                value="<?php echo get_sanitize_input($config['cf_portfolio_password']); ?>"
                                id="cf_portfolio_password" class="frm_input" size="50">
                        </td>
                        <th scope="row"><label for="cf_portfolio_session_time">세션 유지시간</label></th>
                        <td>
                            <?php echo help('포트폴리오 게시판 접근시 유지할 시간(분단위). 다른 탭 갔다와도 유지되는 시간.') ?>
                            <input type="text" name="cf_portfolio_session_time"
                                value="<?php echo get_sanitize_input($config['cf_portfolio_session_time']); ?>"
                                id="cf_portfolio_session_time" class="frm_input" size="10">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <?php
    require_once '_rewrite_config_form.php';
    ?>

    <section id="anc_cf_board">
        <h2 class="h2_frm">게시판 기본 설정</h2>
        <?php echo $pg_anchor ?>

        <div class="tbl_frm01 tbl_wrap">
            <table>
                <caption>게시판 기본 설정</caption>
                <colgroup>
                    <col class="grid_4">
                    <col>
                    <col class="grid_4">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row"><label for="cf_image_extension">이미지 업로드 확장자</label></th>
                        <td colspan="3">
                            <?php echo help('게시판 글작성시 이미지 파일 업로드 가능 확장자. | 로 구분') ?>
                            <input type="text" name="cf_image_extension"
                                value="<?php echo get_sanitize_input($config['cf_image_extension']); ?>"
                                id="cf_image_extension" class="frm_input" size="70">
                        </td>
                    </tr>
                    <!-- <tr>
                        <th scope="row"><label for="cf_movie_extension">동영상 업로드 확장자</label></th>
                        <td colspan="3">
                            <?php echo help('게시판 글작성시 동영상 파일 업로드 가능 확장자. | 로 구분') ?>
                            <input type="text" name="cf_movie_extension"
                                value="<?php echo get_sanitize_input($config['cf_movie_extension']); ?>"
                                id="cf_movie_extension" class="frm_input" size="70">
                        </td>
                    </tr> -->
                    <tr>
                        <th scope="row"><label for="cf_filter">단어 필터링</label></th>
                        <td colspan="3">
                            <?php echo help('입력된 단어가 포함된 내용은 게시할 수 없습니다. 단어와 단어 사이는 ,로 구분합니다.') ?>
                            <textarea name="cf_filter" id="cf_filter"
                                rows="7"><?php echo get_sanitize_input($config['cf_filter']); ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="btn_fixed_top btn_confirm">
        <input type="submit" value="확인" class="btn_submit btn" accesskey="s">
    </div>

</form>

<script>
    function fconfigform_submit(f) {
        var current_user_ip = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
        var cf_intercept_ip_val = f.cf_intercept_ip.value;

        if (cf_intercept_ip_val && current_user_ip) {
            var cf_intercept_ips = cf_intercept_ip_val.split("\n");

            for (var i = 0; i < cf_intercept_ips.length; i++) {
                if (cf_intercept_ips[i].trim()) {
                    cf_intercept_ips[i] = cf_intercept_ips[i].replace(".", "\.");
                    cf_intercept_ips[i] = cf_intercept_ips[i].replace("+", "[0-9\.]+");

                    var re = new RegExp(cf_intercept_ips[i]);
                    if (re.test(current_user_ip)) {
                        alert("현재 접속 IP : " + current_user_ip + " 가 차단될수 있기 때문에, 다른 IP를 입력해 주세요.");
                        return false;
                    }
                }
            }
        }

        f.action = "./config_form_update.php";
        return true;
    }
</script>

<?php
if (stripos($config['cf_image_extension'], "webp") !== false) {
    if (!function_exists("imagewebp")) {
        echo '<script>' . PHP_EOL;
        echo 'alert("이 서버는 webp 이미지를 지원하고 있지 않습니다.\n이미지 업로드 확장자에서 webp 확장자를 제거해 주십시오.\n제거하지 않으면 이미지와 관련된 오류가 발생할 수 있습니다.");' . PHP_EOL;
        echo 'document.getElementById("cf_image_extension").focus();' . PHP_EOL;
        echo '</script>' . PHP_EOL;
    }
}

require_once './admin.tail.php';
