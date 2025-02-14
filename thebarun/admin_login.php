<?php
include_once('./common.php');

$g5['title'] = '로그인';
include_once('./head.sub.php');

$od_id = isset($_POST['od_id']) ? safe_replace_regex($_POST['od_id'], 'od_id') : '';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    goto_url(G5_ADMIN_URL);
}

$login_url = login_url(G5_ADMIN_URL);
$login_action_url = "./admin_login_check.php";

add_stylesheet('<link rel="stylesheet" href="' . $member_skin_url . '/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="mb_login" class="mbskin">
    <div class="mbskin_box">
        <h1><?php echo $g5['title'] ?></h1>
        <div class="mb_log_cate">
            <h2><span class="sound_only">관리자</span>로그인</h2>
        </div>
        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);"
            method="post">
            <input type="hidden" name="url" value="<?php echo $login_url ?>">

            <fieldset id="login_fs">
                <legend>관리자로그인</legend>
                <label for="login_id" class="sound_only">관리자아이디<strong class="sound_only"> 필수</strong></label>
                <input type="text" name="mb_id" id="login_id" required class="frm_input required" size="20"
                    maxLength="20" placeholder="아이디">
                <label for="login_pw" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
                <input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20"
                    maxLength="20" placeholder="비밀번호">
                <button type="submit" class="btn_submit">로그인</button>
            </fieldset>
        </form>
    </div>

</div>

<script>
    function flogin_submit(f) {
        if ($(document.body).triggerHandler('login_sumit', [f, 'flogin']) !== false) {
            return true;
        }
        return false;
    }
</script>
<!-- } 로그인 끝 -->

<?php
include_once('./tail.sub.php');