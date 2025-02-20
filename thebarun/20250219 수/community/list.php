<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH . '/thumbnail.lib.php');

if (!$bo_table) {
    alert('잘못된 요청입니다.', G5_URL);
}

$sop = strtolower($sop);
if ($sop != 'and' && $sop != 'or')
    $sop = 'and';

// 분류 선택 또는 검색어가 있다면
$stx = trim($stx);
//검색인지 아닌지 구분하는 변수 초기화
$is_search_notice = false;

if ($sca || $stx || $stx === '0') {     //검색이면
    $is_search_notice = true;      //검색구분변수 true 지정
    $sql_search = get_sql_search($sca, $sfl, $stx, $sop);

    // 가장 작은 번호를 얻어서 변수에 저장 (하단의 페이징에서 사용)
    $sql = " select MIN(wr_num) as min_wr_num from {$write_table} ";
    $row = sql_fetch($sql);
    $min_spt = (int) $row['min_wr_num'];

    if (!$spt)
        $spt = $min_spt;

    $sql_search .= " and (wr_num between {$spt} and ({$spt} + {$config['cf_search_part']})) ";

    // 원글만 얻는다. (코멘트의 내용도 검색하기 위함)
    // 라엘님 제안 코드로 대체 http://sir.kr/g5_bug/2922
    $sql = " SELECT COUNT(DISTINCT `wr_id`) AS `cnt` FROM {$write_table} WHERE {$sql_search} ";
    $row = sql_fetch($sql);
    $total_count = $row['cnt'];
} else {
    $sql_search = "";

    $total_count = $board['bo_count_write'];
}

$page_rows = $board['bo_page_rows'];
$list_page_rows = $board['bo_page_rows'];

if ($page < 1) {
    $page = 1;
} // 페이지가 없으면 첫 페이지 (1 페이지)

// 년도 2자리
$today2 = G5_TIME_YMD;

$list = array();
$i = 0;
$notice_count = 0;
$notice_array = array();


$total_page = ceil($total_count / $page_rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

// 관리자라면 CheckBox 보임(+PC에서만 노출)
$is_checkbox = false;
if ($is_member && ($is_admin == 'super' || $group['gr_admin'] == $member['mb_id'] || $board['bo_admin'] == $member['mb_id']))
    $is_checkbox = true;

// 0 으로 나눌시 오류를 방지하기 위하여 값이 없으면 1 로 설정
$bo_gallery_cols = $board['bo_gallery_cols'] ? $board['bo_gallery_cols'] : 1;
$td_width = (int) (100 / $bo_gallery_cols);

$sst = "wr_num";   // search sort (검색 정렬 필드)
$sod = "";  // search order (검색 오름, 내림차순)
if ($sst) {
    $sql_order = " order by {$sst} {$sod} ";
}

if ($is_search_notice) {
    $sql = " select distinct wr_id from {$write_table} where {$sql_search} {$sql_order} limit {$from_record}, $page_rows ";
} else {
    $sql = " select * from {$write_table} ";
    if (!empty($notice_array))
        $sql .= " and wr_id not in (" . implode(', ', $notice_array) . ") ";
    $sql .= " {$sql_order} limit {$from_record}, $page_rows ";
}

// 페이지의 공지개수가 목록수 보다 작을 때만 실행
if ($page_rows > 0) {
    $result = sql_query($sql);

    $k = 0;

    while ($row = sql_fetch_array($result)) {
        // 검색일 경우 wr_id만 얻었으므로 다시 한행을 얻는다
        if ($is_search_notice)
            $row = sql_fetch(" select * from {$write_table} where wr_id = '{$row['wr_id'/** 'wr_parent'에서 바꿈 */]}' ");

        $list[$i] = get_list($row, $board, G5_IS_MOBILE ? $board['bo_mobile_subject_len'] : $board['bo_subject_len']);
        if (strstr($sfl, 'subject')) {
            $list[$i]['subject'] = search_font($stx, $list[$i]['subject']);
        }
        $list[$i]['is_notice'] = false;
        $list[$i]['list_content'] = $list[$i]['wr_content'];

        // 비밀글인 경우 리스트에서 내용이 출력되지 않게 글 내용을 지웁니다. 
        if (strstr($list[$i]['wr_option'], "secret")) {
            $list[$i]['wr_content'] = '';
        }

        $list_num = $total_count - ($page - 1) * $list_page_rows - $notice_count;
        $list[$i]['num'] = $list_num - $k;

        $i++;
        $k++;
    }
}

g5_latest_cache_data($board['bo_table'], $list);

$write_pages = get_paging($config['cf_write_pages'], $page, $total_page, get_pretty_url($bo_table, '', $qstr . '&amp;page='));

$list_href = '';
$prev_part_href = '';
$next_part_href = '';
if ($is_search_notice) {
    $list_href = get_pretty_url($bo_table);

    $patterns = array('#&amp;page=[0-9]*#', '#&amp;spt=[0-9\-]*#');

    //if ($prev_spt >= $min_spt)
    $prev_spt = $spt - $config['cf_search_part'];
    if (isset($min_spt) && $prev_spt >= $min_spt) {
        $qstr1 = preg_replace($patterns, '', $qstr);
        $prev_part_href = get_pretty_url($bo_table, 0, $qstr1 . '&amp;spt=' . $prev_spt . '&amp;page=1');
        $write_pages = page_insertbefore($write_pages, '<a href="' . $prev_part_href . '" class="pg_page pg_search pg_prev">이전검색</a>');
    }

    $next_spt = $spt + $config['cf_search_part'];
    if ($next_spt < 0) {
        $qstr1 = preg_replace($patterns, '', $qstr);
        $next_part_href = get_pretty_url($bo_table, 0, $qstr1 . '&amp;spt=' . $next_spt . '&amp;page=1');
        $write_pages = page_insertafter($write_pages, '<a href="' . $next_part_href . '" class="pg_page pg_search pg_next">다음검색</a>');
    }
}


$write_href = '';
if ($is_admin) {
    $write_href = short_url_clean(G5_COMMUNITY_URL . '/write.php?bo_table=' . $bo_table);
}

$nobr_begin = $nobr_end = "";
if (preg_match("/gecko|firefox/i", $_SERVER['HTTP_USER_AGENT'])) {
    $nobr_begin = '<nobr>';
    $nobr_end = '</nobr>';
}

$stx = get_text(stripslashes($stx));
include_once(G5_COMMUNITY_PATH . '/' . $community_type . '.skin.php');