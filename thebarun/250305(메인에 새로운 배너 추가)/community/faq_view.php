<?php
include_once('../common.php');

if (function_exists('check_case_exist_title'))
    check_case_exist_title($write, G5_COMMUNITY_DIR, true);

if (!$bo_table || !$wr_id) {
    die('Invalid request');
}

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

echo $view['content'];