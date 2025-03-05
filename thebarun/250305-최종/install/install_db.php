<?php
@set_time_limit(0);
$gmnow = gmdate('D, d M Y H:i:s') . ' GMT';
header('Expires: 0'); // rfc2616 - Section 14.21
header('Last-Modified: ' . $gmnow);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0
@header('Content-Type: text/html; charset=utf-8');
@header('X-Robots-Tag: noindex');

$g5_path['path'] = '..';
include_once('../config.php');
include_once('../lib/common.lib.php');
include_once('./install.function.php');    // 인스톨 과정 함수 모음

include_once('../lib/hook.lib.php');    // hook 함수 파일
include_once('../lib/get_data.lib.php');
include_once('../lib/uri.lib.php');    // URL 함수 파일
include_once('../lib/cache.lib.php');

$title = G5_VERSION . " 설치 완료 3/3";
include_once('./install.inc.php');

$tmp_bo_table = array("notice", "faq", "gallery", "portfolio");


$mysql_host = isset($_POST['mysql_host']) ? safe_install_string_check($_POST['mysql_host']) : '';
$mysql_user = isset($_POST['mysql_user']) ? safe_install_string_check($_POST['mysql_user']) : '';
$mysql_pass = isset($_POST['mysql_pass']) ? safe_install_string_check($_POST['mysql_pass']) : '';
$mysql_db = isset($_POST['mysql_db']) ? safe_install_string_check($_POST['mysql_db']) : '';
$table_prefix = isset($_POST['table_prefix']) ? safe_install_string_check($_POST['table_prefix']) : '';
$admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : '';
$admin_pass = isset($_POST['admin_pass']) ? $_POST['admin_pass'] : '';
$admin_name = isset($_POST['admin_name']) ? $_POST['admin_name'] : '';
$admin_email = isset($_POST['admin_email']) ? $_POST['admin_email'] : '';

if (preg_match("/[^0-9a-z_]+/i", $table_prefix)) {
    die('<div class="ins_inner"><p>TABLE명 접두사는 영문자, 숫자, _ 만 입력하세요.</p><div class="inner_btn"><a href="./install_config.php">뒤로가기</a></div></div>');
}

if (preg_match("/[^0-9a-z_]+/i", $admin_id)) {
    die('<div class="ins_inner"><p>관리자 아이디는 영문자, 숫자, _ 만 입력하세요.</p><div class="inner_btn"><a href="./install_config.php">뒤로가기</a></div></div>');
}

$g5_install = isset($_POST['g5_install']) ? (int) $_POST['g5_install'] : 0;

$dblink = sql_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$dblink) {
    ?>

    <div class="ins_inner">
        <p>MySQL Host, User, Password 를 확인해 주십시오.</p>
        <div class="inner_btn"><a href="./install_config.php">뒤로가기</a></div>
    </div>

    <?php
    include_once('./install.inc2.php');
    exit;
}

$g5['connect_db'] = $dblink;
$select_db = sql_select_db($mysql_db, $dblink);
if (!$select_db) {
    ?>

    <div class="ins_inner">
        <p>MySQL DB 를 확인해 주십시오.</p>
        <div class="inner_btn"><a href="./install_config.php">뒤로가기</a></div>
    </div>

    <?php
    include_once('./install.inc2.php');
    exit;
}

$mysql_set_mode = 'false';
sql_set_charset(G5_DB_CHARSET, $dblink);
$result = sql_query(" SELECT @@sql_mode as mode ", true, $dblink);
$row = sql_fetch_array($result);
if ($row['mode']) {
    sql_query("SET SESSION sql_mode = ''", true, $dblink);
    $mysql_set_mode = 'true';
}
unset($result);
unset($row);
?>

<div class="ins_inner">
    <h2><?php echo G5_VERSION ?> 설치가 시작되었습니다.</h2>

    <ol>
        <?php
        $sql = "SHOW TABLES LIKE '{$table_prefix}config'";
        $is_install = sql_query($sql, false, $dblink)->num_rows > 0;

        // 그누보드5 재설치에 체크하였거나 그누보드5가 설치되어 있지 않다면
        if ($g5_install || $is_install === false) {
            // 테이블 생성 ------------------------------------
            $file = implode('', file('./gnuboard5.sql'));
            eval ("\$file = \"$file\";");

            $file = preg_replace('/^--.*$/m', '', $file);
            $file = preg_replace('/`g5_([^`]+`)/', '`' . $table_prefix . '$1', $file);
            $f = explode(';', $file);
            for ($i = 0; $i < count($f); $i++) {
                if (trim($f[$i]) == '') {
                    continue;
                }

                $sql = get_db_create_replace($f[$i]);
                sql_query($sql, true, $dblink);
            }
        }

        // 테이블 생성 ------------------------------------
        ?>

        <li>전체 테이블 생성 완료</li>

        <?php

        //-------------------------------------------------------------------------------------------------
// config 테이블 설정
        if ($g5_install || $is_install === false) {
            // 기본 이미지 확장자를 설정하고
            $image_extension = "gif|jpg|jpeg|png";
            // 서버에서 webp 를 지원하면 확장자를 추가한다.
            if (function_exists("imagewebp")) {
                $image_extension .= "|webp";
            }

            $sql = " insert into `{$table_prefix}config`
                set cf_title = '" . G5_VERSION . "',
                    cf_theme = 'basic',
                    cf_admin = '$admin_id',
                    cf_admin_email = '$admin_email',
                    cf_admin_email_name = '" . G5_VERSION . "',
                    cf_use_copy_log = '1',
                    cf_cut_name = '15',
                    cf_write_pages = '10',
                    cf_mobile_pages = '5',
                    cf_link_target = '_blank',
                    cf_delay_sec = '30',
                    cf_filter = '',
                    cf_possible_ip = '',
                    cf_intercept_ip = '',
                    cf_member_skin = 'basic',
                    cf_mobile_new_skin = 'basic',
                    cf_mobile_search_skin = 'basic',
                    cf_mobile_connect_skin = 'basic',
                    cf_mobile_member_skin = 'basic',
                    cf_mobile_faq_skin = 'basic',
                    cf_editor = 'cheditor5',
                    cf_captcha_mp3 = 'basic',
                    cf_register_level = '2',
                    cf_icon_level = '2',
                    cf_leave_day = '30',
                    cf_search_part = '10000',
                    cf_prohibit_id = 'admin,administrator,관리자,운영자,어드민,주인장,webmaster,웹마스터,sysop,시삽,시샵,manager,매니저,메니저,root,루트,su,guest,방문객',
                    cf_prohibit_email = '',
                    cf_new_del = '30',
                    cf_memo_del = '180',
                    cf_visit_del = '180',
                    cf_popular_del = '180',
                    cf_login_minutes = '10',
                    cf_image_extension = '{$image_extension}',
                    cf_flash_extension = 'swf',
                    cf_movie_extension = 'asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3',
                    cf_formmail_is_member = '1',
                    cf_page_rows = '15',
                    cf_mobile_page_rows = '15',
                    cf_cert_limit = '2',
                    cf_portfolio_password = 'goolab1234',
                    cf_portfolio_session_time = '10'
                    ";
            sql_query($sql, true, $dblink);

            // 관리자 회원가입
            $sql = " insert into `{$table_prefix}member`
                set mb_id = '$admin_id',
                     mb_password = '" . get_encrypt_string($admin_pass) . "',
                     mb_name = '$admin_name',
                     mb_nick = '$admin_name',
                     mb_email = '$admin_email',
                     mb_level = '10',
                     mb_mailling = '1',
                     mb_open = '1',
                     mb_nick_date = '" . G5_TIME_YMDHIS . "',
                     mb_email_certify = '" . G5_TIME_YMDHIS . "',
                     mb_datetime = '" . G5_TIME_YMDHIS . "',
                     mb_ip = '{$_SERVER['REMOTE_ADDR']}'
                     ";
            sql_query($sql, true, $dblink);

            // 그누보드, 영카트 통합으로 인하여 게시판그룹을 커뮤니티(community)로 생성 (NaviGator님,210624)
            // $tmp_gr_id = defined('G5_YOUNGCART_VER') ? 'shop' : 'community';
            // $tmp_gr_subject = defined('G5_YOUNGCART_VER') ? '쇼핑몰' : '커뮤니티';
            $tmp_gr_id = 'community';
            $tmp_gr_subject = '커뮤니티';

            // 게시판 그룹 생성
            sql_query(" insert into `{$table_prefix}group` set gr_id = '$tmp_gr_id', gr_subject = '$tmp_gr_subject' ", true, $dblink);

            // 게시판 생성(위의 $tmp_bo_table 순서와 동일하게)
            $tmp_bo_subject = array("공지사항", "자주 하시는 질문", "갤러리", "포트폴리오");
            for ($i = 0; $i < count($tmp_bo_table); $i++) {

                $bo_skin = ($tmp_bo_table[$i] === 'gallery') ? 'gallery' : 'basic';

                if (in_array($tmp_bo_table[$i], array('notice', 'faq'))) {
                    // 공지사항, 자주 하시는 질문은 10개씩
                    $bo_page_rows = 10;
                } else if (in_array($tmp_bo_table[$i], array('gallery', 'portfolio'))) {
                    // 갤러리, 포트폴리오는 6개씩
                    $bo_page_rows = 6;
                } else {
                    $bo_page_rows = 5;
                }

                $sql = " insert into `{$table_prefix}board`
                    set bo_table = '$tmp_bo_table[$i]',
                        gr_id = '$tmp_gr_id',
                        bo_subject = '$tmp_bo_subject[$i]',
                        bo_device           = 'both',
                        bo_admin            = '',
                        bo_use_file_content = '0',
                        bo_use_dhtml_editor = '1',
                        bo_use_name         = '0',
                        bo_use_list_view    = '0',
                        bo_use_list_content = '0',
                        bo_table_width      = '100',
                        bo_subject_len      = '60',
                        bo_mobile_subject_len      = '30',
                        bo_page_rows        = '$bo_page_rows',
                        bo_mobile_page_rows = '$bo_page_rows',
                        bo_image_width      = '835',
                        bo_skin             = '$bo_skin',
                        bo_mobile_skin      = '$bo_skin',
                        bo_include_head     = '_head.php',
                        bo_include_tail     = '_tail.php',
                        bo_insert_content   = '',
                        bo_gallery_cols     = '4',
                        bo_gallery_width    = '202',
                        bo_gallery_height   = '150',
                        bo_mobile_gallery_width = '125',
                        bo_mobile_gallery_height= '100',
                        bo_upload_count     = '2',
                        bo_upload_size      = '1048576',
                        bo_reply_order      = '1',
                        bo_use_search       = '0',
                        bo_order            = '0'
                        ";
                sql_query($sql, true, $dblink);

                // 게시판 테이블 생성
                $file = file("../" . G5_ADMIN_DIR . "/sql_write.sql");
                $file = get_db_create_replace($file);
                $sql = implode("\n", $file);

                $create_table = $table_prefix . 'write_' . $tmp_bo_table[$i];

                // sql_board.sql 파일의 테이블명을 변환
                $source = array("/__TABLE_NAME__/", "/;/");
                $target = array($create_table, "");
                $sql = preg_replace($source, $target, $sql);
                sql_query($sql, false, $dblink);
            }
        }

        ?>

        <li>DB설정 완료</li>

        <?php
        //-------------------------------------------------------------------------------------------------
        
        // TODO: 확인 후 삭제 필요
        // 디렉토리 생성
        $dir_arr = array(
            $data_path . '/cache',
            $data_path . '/editor',
            $data_path . '/file',
            $data_path . '/log',
            $data_path . '/member',
            $data_path . '/member_image',
            $data_path . '/session',
            $data_path . '/content',
            $data_path . '/faq',
            $data_path . '/tmp'
        );

        for ($i = 0; $i < count($dir_arr); $i++) {
            @mkdir($dir_arr[$i], G5_DIR_PERMISSION);
            @chmod($dir_arr[$i], G5_DIR_PERMISSION);
        }

        // 게시판 디렉토리 생성 (작은별님,211206)
        for ($i = 0; $i < count($tmp_bo_table); $i++) {
            $board_dir = $data_path . '/file/' . $tmp_bo_table[$i];
            @mkdir($board_dir, G5_DIR_PERMISSION);
            @chmod($board_dir, G5_DIR_PERMISSION);
        }

        ?>

        <li>데이터 디렉토리 생성 완료</li>

        <?php
        //-------------------------------------------------------------------------------------------------
        
        // DB 설정 파일 생성
        $file = '../' . G5_DATA_DIR . '/' . G5_DBCONFIG_FILE;
        $f = @fopen($file, 'a');

        // prefix에 맞춰서 테이블 정의
        fwrite($f, "<?php\n");
        fwrite($f, "if (!defined('_GNUBOARD_')) exit;\n");
        fwrite($f, "define('G5_MYSQL_HOST', '" . addcslashes($mysql_host, "\\'") . "');\n");
        fwrite($f, "define('G5_MYSQL_USER', '" . addcslashes($mysql_user, "\\'") . "');\n");
        fwrite($f, "define('G5_MYSQL_PASSWORD', '" . addcslashes($mysql_pass, "\\'") . "');\n");
        fwrite($f, "define('G5_MYSQL_DB', '" . addcslashes($mysql_db, "\\'") . "');\n");
        fwrite($f, "define('G5_MYSQL_SET_MODE', {$mysql_set_mode});\n\n");
        fwrite($f, "define('G5_TABLE_PREFIX', '{$table_prefix}');\n\n");
        fwrite($f, "define('G5_TOKEN_ENCRYPTION_KEY', '" . get_random_token_string(16) . "'); // 토큰 암호화에 사용할 키\n\n");
        fwrite($f, "\$g5['write_prefix'] = G5_TABLE_PREFIX.'write_'; // 게시판 테이블명 접두사\n\n");
        fwrite($f, "\$g5['config_table'] = G5_TABLE_PREFIX.'config'; // 기본환경 설정 테이블\n");
        fwrite($f, "\$g5['group_table'] = G5_TABLE_PREFIX.'group'; // 게시판 그룹 테이블\n");
        fwrite($f, "\$g5['board_table'] = G5_TABLE_PREFIX.'board'; // 게시판 설정 테이블\n");
        fwrite($f, "\$g5['board_file_table'] = G5_TABLE_PREFIX.'board_file'; // 게시판 첨부파일 테이블\n");
        fwrite($f, "\$g5['login_table'] = G5_TABLE_PREFIX.'login'; // 로그인 테이블 (접속자수)\n");
        fwrite($f, "\$g5['member_table'] = G5_TABLE_PREFIX.'member'; // 회원 테이블\n");
        fwrite($f, "\$g5['uniqid_table'] = G5_TABLE_PREFIX.'uniqid'; // 유니크한 값을 만드는 테이블\n");
        fwrite($f, "\$g5['autosave_table'] = G5_TABLE_PREFIX.'autosave'; // 게시글 작성시 일정시간마다 글을 임시 저장하는 테이블\n");
        fwrite($f, "\$g5['new_win_table'] = G5_TABLE_PREFIX.'new_win'; // 새창 테이블\n");

        fwrite($f, "?>");

        fclose($f);
        @chmod($file, G5_FILE_PERMISSION);
        ?>

        <li>DB설정 파일 생성 완료 (<?php echo $file ?>)</li>

        <?php
        // data 디렉토리 및 하위 디렉토리에서는 .htaccess .htpasswd .php .phtml .html .htm .inc .cgi .pl .phar 파일을 실행할수 없게함.
        $f = fopen($data_path . '/.htaccess', 'w');
        $str = <<<EOD
<FilesMatch "\.(htaccess|htpasswd|[Pp][Hh][Pp]|[Pp][Hh][Tt]|[Pp]?[Hh][Tt][Mm][Ll]?|[Ii][Nn][Cc]|[Cc][Gg][Ii]|[Pp][Ll]|[Pp][Hh][Aa][Rr])">
Order allow,deny
Deny from all
</FilesMatch>
RedirectMatch 403 /session/.*
EOD;
        fwrite($f, $str);
        fclose($f);

        //-------------------------------------------------------------------------------------------------
        ?>
    </ol>

    <p>축하합니다. <?php echo G5_VERSION ?> 설치가 완료되었습니다.</p>

</div>

<div class="ins_inner">

    <h2>환경설정 변경은 다음의 과정을 따르십시오.</h2>

    <ol>
        <li>메인화면으로 이동</li>
        <li>관리자 로그인</li>
        <li>관리자 모드 접속</li>
        <li>환경설정 메뉴의 기본환경설정 페이지로 이동</li>
    </ol>

    <div class="inner_btn">
        <a href="../index.php">새로운 그누보드5로 이동</a>
    </div>

</div>

<?php
include_once('./install.inc2.php');
