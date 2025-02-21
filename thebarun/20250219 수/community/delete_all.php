<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

if (!$is_admin)
    alert('접근 권한이 없습니다.', G5_URL);

if (G5_IS_MOBILE)
    alert('PC에서만 삭제가 가능합니다.', get_pretty_url($bo_table));

$count_write = 0;
$count_comment = 0;

$tmp_array = array();
if ($wr_id) // 건별삭제
    $tmp_array[0] = $wr_id;
else // 일괄삭제
    $tmp_array = (isset($_POST['chk_wr_id']) && is_array($_POST['chk_wr_id'])) ? $_POST['chk_wr_id'] : array();

$chk_count = count($tmp_array);

if ($chk_count > $board['bo_page_rows'])
    alert('올바른 방법으로 이용해 주십시오.');

// 거꾸로 읽는 이유는 답변글부터 삭제가 되어야 하기 때문임
for ($i = $chk_count - 1; $i >= 0; $i--) {
    $write = sql_fetch(" select * from $write_table where wr_id = '$tmp_array[$i]' ");

    if ($is_admin == 'super') {// 최고관리자 통과
        ;
    } else if ($member['mb_id'] && $member['mb_id'] == $write['mb_id']) // 자신의 글이라면
    {
        ;
    } else
        continue;   // 나머지는 삭제 불가

    // 나라오름님 수정 : 원글과 코멘트수가 정상적으로 업데이트 되지 않는 오류를 잡아 주셨습니다.
    //$sql = " select wr_id, mb_id from {$write_table} order by wr_id ";
    $sql = " select wr_id, mb_id, wr_content from $write_table where wr_id = '{$write['wr_id']}' order by wr_id ";
    $result = sql_query($sql);
    while ($row = sql_fetch_array($result)) {
        // 업로드된 파일이 있다면
        $sql2 = " select * from {$g5['board_file_table']} where bo_table = '$bo_table' and wr_id = '{$row['wr_id']}' ";
        $result2 = sql_query($sql2);
        while ($row2 = sql_fetch_array($result2)) {
            // 파일삭제
            $delete_file = run_replace('delete_file_path', G5_DATA_PATH . '/file/' . $bo_table . '/' . str_replace('../', '', $row2['bf_file']), $row2);
            if (file_exists($delete_file)) {
                @unlink($delete_file);
            }

            // 썸네일삭제
            if (preg_match("/\.({$config['cf_image_extension']})$/i", $row2['bf_file'])) {
                delete_board_thumbnail($bo_table, $row2['bf_file']);
            }
        }

        // 에디터 썸네일 삭제
        delete_editor_thumbnail($row['wr_content']);

        // 파일테이블 행 삭제
        sql_query(" delete from {$g5['board_file_table']} where bo_table = '$bo_table' and wr_id = '{$row['wr_id']}' ");

        $count_write++;
    }

    // 게시글 삭제
    sql_query(" delete from $write_table where wr_id = '{$write['wr_id']}' ");

    /*
    // 공지사항 삭제
    $notice_array = explode(',', trim($board['bo_notice']));
    $bo_notice = "";
    for ($k=0; $k<count($notice_array); $k++)
        if ((int)$write['wr_id'] != (int)$notice_array[$k])
            $bo_notice .= $notice_array[$k].',';
    $bo_notice = trim($bo_notice);
    */
    $bo_notice = board_notice($board['bo_notice'], $write['wr_id']);
    sql_query(" update {$g5['board_table']} set bo_notice = '$bo_notice' where bo_table = '$bo_table' ");
    $board['bo_notice'] = $bo_notice;
}

// 글숫자 감소
if ($count_write > 0 || $count_comment > 0)
    sql_query(" update {$g5['board_table']} set bo_count_write = bo_count_write - '$count_write', bo_count_comment = bo_count_comment - '$count_comment' where bo_table = '$bo_table' ");

delete_cache_latest($bo_table);

run_event('community_delete_all', $tmp_array, $board);

$url = G5_COMMUNITY_URL . '/' . $bo_table . '.php?bo_table=' . $bo_table;
if ($bo_table === 'portfolio') {
    $url = G5_URL . '/' . $bo_table . '.php?bo_table=' . $bo_table;
}
goto_url(short_url_clean($url . '&amp;page=' . $page . $qstr));