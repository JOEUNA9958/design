<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH . '/thumbnail.lib.php');

?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- notice-detail.html -->
<section class="notice-detail">
    <!-- 삭제 버튼 영역 -->
    <?php if (($is_admin == 'super' || (defined('$is_auth') && $is_auth)) && !G5_IS_MOBILE) {
        $update_href = short_url_clean(G5_COMMUNITY_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $view['wr_id'] . '&amp;' . $qstr);
        ?>
        <div class="detail-admin">
            <button type="button" onclick="location.href='<?php echo $update_href ?>'" class="edit-btn">수정</button>
            <form name="fboardlist" id="fboardlist" action="<?php echo G5_COMMUNITY_URL; ?>/notice_list_update.php"
                onsubmit="return fboardlist_submit(this);" method="post">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                <input type="hidden" name="stx" value="<?php echo $stx ?>">
                <input type="hidden" name="spt" value="<?php echo $spt ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sst" value="<?php echo $sst ?>">
                <input type="hidden" name="sod" value="<?php echo $sod ?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <input type="hidden" name="sw" value="">
                <input type="hidden" name="chk_wr_id[]" value="<?php echo $view['wr_id'] ?>">

                <button type="submit" name="btn_submit" value="선택삭제" class="btn_faq_delete"
                    onclick="document.pressed=this.value">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> 삭제
                </button>
            </form>
        </div>
    <?php } ?>

    <div class="detail-container">
        <!-- 게시글 헤더 -->
        <div class="post-header">
            <h3 class="post-title"><?php echo cut_str(get_text($view['wr_subject']), 70); ?></h3>
            <span class="post-date"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></span>
        </div>

        <!-- 게시글 내용 -->
        <div class="post-content">
            <?php
            // 파일 출력
            $v_img_count = count($view['file']);
            if ($v_img_count) {
                echo "<div id=\"bo_v_img\">\n";

                foreach ($view['file'] as $view_file) {
                    echo get_file_thumbnail($view_file);
                }

                echo "</div>\n";
            }
            ?>

            <!-- 본문 내용 시작 { -->
            <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        </div>
    </div>
    <!-- 버튼 영역 -->
    <div class="button-area">
        <a href="<?php echo get_pretty_url($bo_table, '', $qstr) ?>" class="list-button">목록으로</a>
    </div>
</section>