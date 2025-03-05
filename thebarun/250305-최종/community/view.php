<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

if (function_exists('check_case_exist_title'))
    check_case_exist_title($write, G5_COMMUNITY_DIR, true);

// 게시판에서 두단어 이상 검색 후 검색된 게시물에 코멘트를 남기면 나오던 오류 수정
$sop = strtolower($sop);
if ($sop != 'and' && $sop != 'or')
    $sop = 'and';

$sql_search = "";
// 검색이면
if ($sca || $stx || $stx === '0') {
    // where 문을 얻음
    $sql_search = get_sql_search($sca, $sfl, $stx, $sop);
    $search_href = get_pretty_url($bo_table, '', '&amp;page=' . $page . $qstr);
    $list_href = get_pretty_url($bo_table);
} else {
    $search_href = '';
    $list_href = get_pretty_url($bo_table, '', $qstr);
}

if (!$board['bo_use_list_view']) {
    if ($sql_search)
        $sql_search = " and " . $sql_search;

    // 윗글을 얻음
    $sql = " select wr_id, wr_subject, wr_datetime from {$write_table} where wr_num = '{$write['wr_num']}' {$sql_search} order by wr_num desc limit 1 ";
    $prev = sql_fetch($sql);
    // 위의 쿼리문으로 값을 얻지 못했다면
    if (!(isset($prev['wr_id']) && $prev['wr_id'])) {
        $sql = " select wr_id, wr_subject, wr_datetime from {$write_table} where wr_num < '{$write['wr_num']}' {$sql_search} order by wr_num desc limit 1 ";
        $prev = sql_fetch($sql);
    }

    // 아래글을 얻음
    $sql = " select wr_id, wr_subject, wr_datetime from {$write_table} where wr_num = '{$write['wr_num']}' {$sql_search} order by wr_num limit 1 ";
    $next = sql_fetch($sql);
    // 위의 쿼리문으로 값을 얻지 못했다면
    if (!(isset($next['wr_id']) && $next['wr_id'])) {
        $sql = " select wr_id, wr_subject, wr_datetime from {$write_table} where wr_num > '{$write['wr_num']}' {$sql_search} order by wr_num limit 1 ";
        $next = sql_fetch($sql);
    }
}

$view = get_view($write, $board);

if (strstr($sfl, 'subject'))
    $view['subject'] = search_font($stx, $view['subject']);

$html = 0;
if (strstr($view['wr_option'], 'html1'))
    $html = 1;
else if (strstr($view['wr_option'], 'html2'))
    $html = 2;

$view['content'] = conv_content($view['wr_content'], $html);
if (strstr($sfl, 'content'))
    $view['content'] = search_font($stx, $view['content']);

//$view['rich_content'] = preg_replace("/{이미지\:([0-9]+)[:]?([^}]*)}/ie", "view_image(\$view, '\\1', '\\2')", $view['content']);
function conv_rich_content($matches)
{
    global $view;
    return view_image($view, $matches[1], $matches[2]);
}
$view['rich_content'] = preg_replace_callback("/{이미지\:([0-9]+)[:]?([^}]*)}/i", "conv_rich_content", $view['content']);

$is_signature = false;
$signature = '';

include_once('./view.skin.php');