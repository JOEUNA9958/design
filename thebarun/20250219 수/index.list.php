<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

$list = array(
    array(),
    array()
);

$bo_table = 'faq';
$write_table = $g5['write_prefix'] . $bo_table;
$page_rows = $config['cf_main_list_count'];
$use_double_columns = $config['cf_use_double_columns'];

$sql_order = 'order by wr_num';

$sql = " select * from {$write_table} {$sql_order} limit 0, $page_rows ";

$result = sql_query($sql);

$i = 0;
$k = 0;

$board = get_board_db($bo_table, true);
$bo_page_rows = $board['bo_page_rows'];
if (isset($board['bo_table']) && $board['bo_table']) {
    set_cookie("ck_bo_table", $board['bo_table'], 86400 * 1);
    $gr_id = $board['gr_id'];
    // 게시판 테이블 전체이름
    $write_table = $g5['write_prefix'] . $bo_table;

    if (isset($wr_id) && $wr_id) {
        $write = get_write($write_table, $wr_id);
    }

    while ($row = sql_fetch_array($result)) {
        if ($config['cf_use_double_columns'] > 0 && $i >= (int) $page_rows / 2) {
            $k++;
            $i = 0;
        }
        $list[$k][$i] = get_list($row, $board, G5_IS_MOBILE ? $board['bo_mobile_subject_len'] : $board['bo_subject_len']);
        // 해당 게시물이 있는 페이지 번호
        $no = $list[$k][$i]['wr_id'];
        $sql_find_page_num = " select ceil(row_num / {$bo_page_rows}) as page_number
                                from (
                                    select row_number() over (order by wr_num) as row_num, wr_id
                                    from {$write_table}
                                ) as subquery
                                where wr_id = '{$no}'
                             ";
        $page_number = sql_fetch($sql_find_page_num)['page_number'];
        $list[$k][$i]['href'] = get_pretty_url($board['bo_table'], $no, 'page=' . $page_number);
        $list[$k][$i]['list_content'] = $list[$k][$i]['wr_content'];
        $i++;
    }
}