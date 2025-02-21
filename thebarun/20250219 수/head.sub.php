<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = microtime(true);

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
} else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array($g5['title'], $config['cf_title'])));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/' . G5_ADMIN_DIR . '/') || $is_admin == 'super')
    $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (G5_IS_MOBILE) {
        echo '<meta name="HandheldFriendly" content="true">' . PHP_EOL;
        echo '<meta name="format-detection" content="telephone=no">' . PHP_EOL;
    } else {
        echo '<meta http-equiv="imagetoolbar" content="no">' . PHP_EOL;
        echo '<meta http-equiv="X-UA-Compatible" content="IE=Edge">' . PHP_EOL;
    }

    if ($config['cf_add_meta'])
        echo $config['cf_add_meta'] . PHP_EOL;
    ?>
    <title><?php echo $g5_head_title; ?></title>
    <?php
    if (defined('G5_IS_ADMIN')) {
        echo '<link rel="stylesheet" href="' . run_replace('head_css_url', G5_ADMIN_URL . '/css/admin.css?ver=' . G5_CSS_VER, G5_URL) . '">' . PHP_EOL;
    } else {
        echo '<link rel="stylesheet" href="' . run_replace('head_css_url', G5_CSS_URL . '/default.css?ver=' . G5_CSS_VER, G5_URL) . '">' . PHP_EOL;
    }
    ?>
    <script>
        // 자바스크립트에서 사용하는 전역변수 선언
        var g5_url = "<?php echo G5_URL ?>";
        var g5_css_url = "<?php echo G5_CSS_URL ?>";
        var g5_community_url = "<?php echo G5_COMMUNITY_URL ?>";
        var g5_is_member = "<?php echo isset($is_member) ? $is_member : ''; ?>";
        var g5_is_admin = "<?php echo isset($is_admin) ? $is_admin : ''; ?>";
        var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
        var g5_bo_table = "<?php echo isset($bo_table) ? $bo_table : ''; ?>";
        var g5_sca = "<?php echo isset($sca) ? $sca : ''; ?>";
        var g5_editor = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor']) ? $config['cf_editor'] : ''; ?>";
        var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
        <?php if (defined('G5_IS_ADMIN')) { ?>
            var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
        <?php } ?>
    </script>
    <?php
    add_javascript('<script src="' . G5_JS_URL . '/jquery-1.12.4.min.js"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/jquery-migrate-1.4.1.min.js"></script>', 0);

    add_javascript('<script src="' . G5_JS_URL . '/jquery.menu.js?ver=' . G5_JS_VER . '"></script>', 0);


    // jQuery (만약 그누보드에 이미 포함되어 있지 않다면)
    add_javascript('<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/jquery-3.7.1.min.js"></script>', 0);

    add_javascript('<script src="' . G5_JS_URL . '/common.js?ver=' . G5_JS_VER . '"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/wrest.js?ver=' . G5_JS_VER . '"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/placeholders.min.js"></script>', 0);
    add_stylesheet('<link rel="stylesheet" href="' . G5_JS_URL . '/font-awesome/css/font-awesome.min.css">', 0);

    // Swiper CSS
    add_stylesheet('<link rel="stylesheet" href="' . G5_JS_URL . '/swiper/swiper-bundle.min.css">', 0);

    // Swiper JS
    add_javascript('<script src="' . G5_JS_URL . '/swiper/swiper-bundle.min.js"></script>', 0);


    add_stylesheet('<link rel="preconnect" href="https://fonts.googleapis.com">', 0);
    add_stylesheet('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>', 0);
    add_stylesheet('<link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo:wght@400;700;800&family=Noto+Sans+KR:wght@100;300;400;500;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">', 0);

    if (G5_IS_MOBILE) {
        add_javascript('<script src="' . G5_JS_URL . '/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
    }
    if (!defined('G5_IS_ADMIN'))
        echo $config['cf_add_script'];
    ?>
</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>