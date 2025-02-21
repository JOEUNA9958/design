<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

$thumb_width = 383;
$thumb_height = 250;

$is_portfolio = $bo_table == 'portfolio';
?>
<section class="community">
    <div class="community-container">
        <!-- 검색 영역(갤러리o, 포트폴리오x) -->
        <?php if (!$is_portfolio) { ?>
            <form name="fsearch" class="search-box" method="get">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sop" value="and">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">

                <input type="text" name="stx" placeholder="검색어를 입력해주세요." value="<?php echo stripslashes($stx) ?>"
                    maxlength="20" class="search-input" />
                <button type="submit" value="검색" class="search-btn">검색</button>
            </form>
        <?php } ?>
        <!-- 게시판 리스트 form 시작 -->
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

            <!-- 선택삭제 버튼 영역 -->
            <?php if (($is_admin == 'super' || (defined('$is_auth') && $is_auth)) && !G5_IS_MOBILE) { ?>
                <li id="selectDeleteBtn" style="display: none;">
                    <button type="submit" name="btn_submit" value="선택삭제" class="btn_admin_delete"
                        onclick="document.pressed=this.value">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제
                    </button>
                </li>
            <?php } ?>

            <section class="gallery">
                <div class="gallery-grid">
                    <?php for ($i = 0; $i < count($list); $i++) {
                        $a_tag_opt = 'href="' . $list[$i]['href'] . '"';
                        if ($is_portfolio) {
                            $link_1 = $list[$i]['link']['1'];
                            $a_tag_opt = $link_1 ? 'href="' . $link_1 . '" target="_blank"' : 'href="javascript:void(0);" onclick="showPortfolioAlert(event)"';
                        }
                        if ($is_admin) {
                            $update_href = short_url_clean(G5_COMMUNITY_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;' . $qstr);
                        }
                        ?>
                        <div class="gallery-card">
                            <?php if ($is_checkbox && !G5_IS_MOBILE) { ?>
                                <div class="wrapper__gallery-admin">
                                    <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>"
                                        id="chk_wr_id_<?php echo $i ?>" class="gallery-checkbox" onchange="toggleDeleteBtn()">
                                    <label for="chk_wr_id_<?php echo $i ?>">
                                        <span></span>
                                        <b class="sound_only"><?php echo $list[$i]['subject'] ?></b>
                                    </label>
                                    <button type="button" class="edit-btn edit-btn-gallery"
                                        id="edit-btn-gallery_<?php echo $i ?>"
                                        onclick="location.href='<?php echo $update_href ?>'">수정</button>
                                </div>
                            <?php } ?>
                            <a <?php echo $a_tag_opt ?>>
                                <div class="card-image">
                                    <?php
                                    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
                                    if ($thumb['src']) {
                                        $img = $thumb['src'];
                                    } else {
                                        $img = G5_IMG_URL . '/no_img.png';
                                        $thumb['alt'] = '이미지가 없습니다.';
                                    }
                                    $img_content = '<img src="' . $img . '" alt="' . $thumb['alt'] . '" >'; ?>
                                    <?php echo $img_content ?>
                                </div>
                                <div class="card-info">
                                    <h3 class="card-title"><?php echo $list[$i]['subject'] ?></h3>
                                    <p class="card-date"><?php echo date("y.m.d", strtotime($list[$i]['wr_datetime'])) ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <?php if (count($list) == 0) {
                    $text = $stx || ($page !== 1) ? '검색 결과가 없습니다.' : '게시물이 없습니다.';
                    echo '<h3 class="no_content">' . $text . '</h3>';
                } ?>

                <!-- 페이지네이션 -->
                <div class="pagination">
                    <?php echo $write_pages; ?>
                </div>
        </form><!-- 게시판 리스트 form 끝 -->
    </div>
    <?php if ($write_href && !G5_IS_MOBILE) { ?>
        <button class="btn_admin_write" onclick="location.href='<?php echo $write_href ?>'">
            <a href="javascript:void(0);" class="btn_b01 btn" title="글쓰기">
                <i class="fa fa-pencil" aria-hidden="true"></i><span>글쓰기</span>
            </a>
        </button>
    <?php } ?>
</section>


<script>
    function showPortfolioAlert(event) {
        if (event.target.type === 'checkbox') {
            return;
        }
        alert('포트폴리오 링크가 존재하지 않습니다.');
    }

    function goToLink(e, url) {
        // 체크박스 클릭 시 링크 이동 방지
        if (e.target.type === 'checkbox' || e.target.tagName === 'LABEL' || e.target.parentElement.tagName === 'LABEL') {
            return;
        }
        window.location.href = url;
    }
</script>

<?php if ($is_checkbox && !G5_IS_MOBILE) { ?>
    <script>
        function all_checked(sw) {
            var f = document.fboardlist;

            for (var i = 0; i < f.length; i++) {
                if (f.elements[i].name == "chk_wr_id[]")
                    f.elements[i].checked = sw;
            }
        }

        function fboardlist_submit(f) {
            var chk_count = 0;

            for (var i = 0; i < f.length; i++) {
                if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
                    chk_count++;
            }

            if (!chk_count) {
                alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
                return false;
            }

            if (document.pressed == "선택삭제") {
                if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다."))
                    return false;

                f.removeAttribute("target");
                f.action = g5_community_url + "/notice_list_update.php";
            }

            return true;
        }

        function toggleDeleteBtn() {
            // 체크된 체크박스 개수 확인
            const checkedBoxes = document.querySelectorAll('input[name="chk_wr_id[]"]:checked');
            const selectDeleteBtn = document.getElementById('selectDeleteBtn');

            // 하나라도 체크된 경우 버튼 표시, 아니면 숨김
            selectDeleteBtn.style.display = checkedBoxes.length > 0 ? 'block' : 'none';
        }

        // 페이지 로드 시 초기 상태 체크
        document.addEventListener('DOMContentLoaded', function () {
            toggleDeleteBtn();
        });
    </script>
<?php } ?>

<style>
    tr {
        cursor: pointer;
    }

    .td_chk {
        cursor: default;
    }
</style>