<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>
<!--aside 없애기-->

<hr>

<!-- 하단 시작 { -->


<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
<link rel="stylesheet" href="/theme/basic/css/main.css"> 
<!-- } 하단 끝 -->
<footer>
    <div class="f_top">
        <div class="wrapper">
            <ul class="f_nav">
                <li class="privacy"><a href="#n">개인정보처리방침 </a></li>
                <li><a href="#n">인사말</a></li>
                <li><a href="#n">오시는길</a></li>
                <li><a href="#n">노인장기요양보험</a> </li>
                <li><a href="#n">신청절차</a></li>
                <li><a href="#n">방문요양</a></li>    
            </ul>
        </div>
    </div><!--f_top-->
    <div class="f_sub">
        <div class="wrapper">
                <div class="f_info">
                <address>주 소 : 충청남도 공주시 먹자2길1 (1, 2층)</address>
                <span>Tel : 041-960-0064</span>
                <span>Fax : 041-960-0065</span>
                <span>E-mail : nanyoung2582@daum.net</span>
            </div>   
            <div class="copyright">Copyright © 하융노인요양센터 All Rights Reserved. designed by freepik </div> 
        </div>
    </div>
</footer>
<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");