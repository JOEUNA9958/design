<?php
$sub_menu = "100110";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'w');

if ($is_admin != 'super') {
    alert('최고관리자만 접근 가능합니다.');
}

$mb = array();
$mb = get_member($member['mb_id']);

$captcha_js = ''; // 캡챠 js 변수 초기화

include_once(G5_CAPTCHA_PATH . '/captcha.lib.php');
$captcha_html = captcha_html();
$captcha_js = chk_captcha_js();

$g5['title'] = '관리자계정';
require_once './admin.head.php';
?>

<form name="fpassword" id="fpassword" action="./account_form_update.php" onsubmit="return fpassword_submit(this);"
    method="post" autocomplete="off">
    <!-- <input type="hidden" name="w" value="<?php echo $w ?>"> -->
    <input type="hidden" name="token" value="">

    <section id="anc_cf_admin">
        <h2 class="h2_frm">관리자 계정 설정</h2>

        <div class="tbl_frm01 tbl_wrap">
            <table>
                <caption>관리자 계정 설정</caption>
                <colgroup>
                    <col class="grid_4">
                    <col>
                    <col class="grid_4">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row"><label for="mb_id">아이디</label></th>
                        <td>
                            <input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="mb_id" readonly
                                class="frm_input">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mb_password">새 비밀번호</label></th>
                        <td>
                            <div>
                                <input type="password" name="mb_password" id="mb_password" class="frm_input required"
                                    required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mb_password_re">새 비밀번호 확인</label></th>
                        <td>
                            <input type="password" name="mb_password_re" id="mb_password_re" class="frm_input required"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mb_password_re">캡챠 확인</label></th>
                        <td>
                            <div id="mb_password_captcha_wrap">
                                <!-- 캡챠 영역 -->
                                <?php echo $captcha_html; ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div class="btn_fixed_top btn_confirm">
        <input type="submit" value="확인" class="btn_submit btn" accesskey="s">
    </div>

</form>

<script>
    function fpassword_submit(f) {
        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password.focus();
            return false;
        }

        // 캡챠 검증
        <?php echo $captcha_js; ?>

        return true;
    }

    jQuery(function ($) {
        var $captcha = $("#captcha");
        if ($captcha.length) {
            $captcha.css("float", "none");
            $("#captcha_key").css("float", "none");
        }
    });
</script>

<?php
require_once './admin.tail.php';
