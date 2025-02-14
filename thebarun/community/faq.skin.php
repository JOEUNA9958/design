<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

?>
<section class="community">
    <div class="community-container">
        <!-- 검색 영역 -->
        <form name="fsearch" class="search-box" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sop" value="and">
            <input type="hidden" name="sfl" value="wr_subject||wr_content">

            <input type="text" name="stx" placeholder="검색어를 입력해주세요." value="<?php echo stripslashes($stx) ?>"
                maxlength="20" class="search-input" />
            <button type="submit" value="검색" class="search-btn">검색</button>
        </form>
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
                    <button type="submit" name="btn_submit" value="선택삭제" class="btn_faq_delete"
                        onclick="document.pressed=this.value">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제
                    </button>
                </li>
            <?php } ?>

            <section class="faq">
                <div class="wrapper__faq-list">
                    <div class="faq-list">
                        <?php
                        for ($i = 0; $i < count($list); $i++) {
                            $faq_id = $list[$i]['wr_id'];
                            $faq_question = $list[$i]['subject'];
                            $update_href = '';
                            if ($is_admin) {
                                $update_href = short_url_clean(G5_COMMUNITY_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;' . $qstr);
                            }
                            ?>
                            <div class="wrapper__question-content">
                                <?php if ($is_checkbox && !G5_IS_MOBILE) { ?>
                                    <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>"
                                        id="chk_wr_id_<?php echo $i ?>" class="gallery-checkbox" onchange="toggleDeleteBtn()">
                                    <label for="chk_wr_id_<?php echo $i ?>">
                                        <span></span>
                                        <b class="sound_only"><?php echo $faq_question ?></b>
                                    </label>
                                <?php } ?>
                                <div class="faq-item" data-faq-id="<?php echo $faq_id ?>">
                                    <button class="faq-question">
                                        <span><?php echo $faq_question ?></span>
                                        <span class="toggle-icon">+</span>
                                    </button>
                                    <div class="faq-answer">
                                        <p></p>
                                    </div>
                                </div>
                                <?php if ($is_admin && !G5_IS_MOBILE) { ?>
                                    <button type="button" onclick="location.href='<?php echo $update_href ?>'"
                                        class="edit-btn">수정</button>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (count($list) == 0) {
                            $text = $stx || ($page !== 1) ? '검색 결과가 없습니다.' : '등록된 FAQ가 없습니다.';
                            echo '<p class="no_content">' . $text . '</p>';
                        } ?>
                    </div>

                    <!-- 페이지네이션 -->
                    <div class="pagination">
                        <?php echo $write_pages; ?>
                    </div>
            </section>
        </form>
    </div>
    <!-- 게시판 리스트 form 끝 -->
    <?php if ($write_href && !G5_IS_MOBILE) { ?>
        <button class="btn_admin_write" onclick="location.href='<?php echo $write_href ?>'">
            <a href="javascript:void(0);" class="btn_b01 btn" title="글쓰기">
                <i class="fa fa-pencil" aria-hidden="true"></i><span>글쓰기</span>
            </a>
        </button>
    <?php } ?>
    </div>
</section>

<script>
    $(document).ready(function () {
        let loadedContents = new Map();

        // URL에서 id 파라미터와 pathname 체크
        const getFaqId = () => {
            const urlParams = new URLSearchParams(window.location.search);
            const paramId = urlParams.get('wr_id');
            if (paramId) return paramId;

            const pathMatch = window.location.pathname.match(/\/faq\/(\d+)$/);
            return pathMatch ? pathMatch[1] : null;
        };

        const targetId = getFaqId();

        // 특정 FAQ 자동 열기 함수
        const openFaq = async (faqId) => {
            const $faqItem = $(`.faq-item[data-faq-id="${faqId}"]`);
            if ($faqItem.length) {
                // 스크롤 이동
                $faqItem[0].scrollIntoView({ behavior: 'smooth' });

                // FAQ 열기
                const $question = $faqItem.find('.faq-question');
                $question.click();
            }
        };

        // id 파라미터가 있으면 해당 FAQ 열기
        if (targetId) {
            setTimeout(() => openFaq(targetId), 300);
        }

        $('.faq-question').click(async function (e) {
            // form 제출 방지 및 이벤트 전파 중단
            e.preventDefault();
            e.stopPropagation();

            const $faqItem = $(this).parent('.faq-item');
            const $answer = $(this).next('.faq-answer').find('p'); // p 태그를 직접 선택
            const faqId = $faqItem.data('faq-id');

            // 다른 모든 답변 닫기
            $('.faq-answer').not($(this).next('.faq-answer')).slideUp(300);
            $('.faq-item').not($faqItem).removeClass('active');

            // 클릭한 아이템 토글
            $faqItem.toggleClass('active');

            if ($faqItem.hasClass('active')) {
                // 이전에 불러온게 아니라면 데이터 호출
                if (!loadedContents.has(faqId)) {
                    try {
                        const queryString = '<?php echo urldecode(html_entity_decode($qstr)); ?>';
                        const response = await fetch(`${g5_community_url}/faq_view.php?bo_table=${g5_bo_table}&wr_id=${faqId}${queryString}`);

                        if (!response.ok) throw new Error('Network response was not ok');
                        const content = await response.text();
                        loadedContents.set(faqId, content);
                        $answer.html(content); // p 태그에 직접 내용 삽입
                    } catch (error) {
                        console.error('Error loading FAQ content:', error);
                        $answer.html('내용을 불러오는데 실패했습니다.');
                    }
                }
            }

            $(this).next('.faq-answer').slideToggle(300);
        });
    });
</script>
<?php if ($is_checkbox && !G5_IS_MOBILE) { ?>
    <script>
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