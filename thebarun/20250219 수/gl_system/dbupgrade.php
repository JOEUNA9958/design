<?php
$sub_menu = '100410';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = 'DB 업그레이드';
include_once('./admin.head.php');

$is_check = false;

//소셜 로그인 관련 필드 카카오 클라이언트 시크릿 추가
if (!isset($config['cf_kakao_client_secret'])) {
    sql_query("ALTER TABLE `{$g5['config_table']}`
                ADD `cf_kakao_client_secret` varchar(100) NOT NULL DEFAULT '' AFTER `cf_kakao_rest_key`
    ", true);

    $is_check = true;
}

// 게시판 짧은 주소
$sql = " select bo_table from {$g5['board_table']} ";
$result = sql_query($sql);

while ($row = sql_fetch_array($result)) {
    $write_table = $g5['write_prefix'] . $row['bo_table']; // 게시판 테이블 전체이름

    $sql = " SHOW COLUMNS FROM {$write_table} LIKE 'wr_seo_title' ";
    $row = sql_fetch($sql);

    if (!$row) {
        sql_query("ALTER TABLE `{$write_table}`
                    ADD `wr_seo_title` varchar(200) NOT NULL DEFAULT '' AFTER `wr_content`,
                    ADD INDEX `wr_seo_title` (`wr_seo_title`);
        ", false);

        $is_check = true;
    }
}

// 짧은 URL 주소를 사용 여부 필드 추가
if (!isset($config['cf_bbs_rewrite'])) {
    sql_query(" ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_bbs_rewrite` tinyint(4) NOT NULL DEFAULT '0' AFTER `cf_link_target` ", true);

    $is_check = true;
}

// 파일테이블에 추가 칼럼

$sql = " SHOW COLUMNS FROM `{$g5['board_file_table']}` LIKE 'bf_fileurl' ";
$row = sql_fetch($sql);

if (!$row) {
    sql_query(" ALTER TABLE `{$g5['board_file_table']}` 
                ADD COLUMN `bf_fileurl` VARCHAR(255) NOT NULL DEFAULT '' AFTER `bf_content`,
                ADD COLUMN `bf_thumburl` VARCHAR(255) NOT NULL DEFAULT '' AFTER `bf_fileurl`,
                ADD COLUMN `bf_storage` VARCHAR(50) NOT NULL DEFAULT '' AFTER `bf_thumburl`", true);

    $is_check = true;
}

// config 기본 테이블 auto id key 추가
if (!isset($config['cf_id'])) {
    sql_query(" ALTER TABLE `{$g5['config_table']}`
                    ADD COLUMN `cf_id` INT(11) NOT NULL AUTO_INCREMENT FIRST,
                    ADD PRIMARY KEY (`cf_id`); ", true);

    $is_check = true;
}

// login 테이블 auto id key 추가
$row = sql_fetch("select * from `{$g5['login_table']}` limit 1");
if (!isset($row['lo_id'])) {
    sql_query(" ALTER TABLE `{$g5['login_table']}`
                    ADD COLUMN `lo_id` INT(11) NOT NULL AUTO_INCREMENT FIRST,
                    DROP PRIMARY KEY,
                    ADD PRIMARY KEY (`lo_id`),
                    ADD UNIQUE KEY `lo_ip_unique` (`lo_ip`) ", true);

    $is_check = true;
}

$is_check = run_replace('admin_dbupgrade', $is_check);

$db_upgrade_msg = $is_check ? 'DB 업그레이드가 완료되었습니다.' : '더 이상 업그레이드 할 내용이 없습니다.<br>현재 DB 업그레이드가 완료된 상태입니다.';
?>

<div class="local_desc01 local_desc">
    <p>
        <?php echo $db_upgrade_msg; ?>
    </p>
</div>

<?php
include_once('./admin.tail.php');