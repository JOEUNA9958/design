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
<!-- } 하단 끝 -->
<?php if (!defined("_INDEX_")) { ?>
        </div><!--wrapper-->

        <!--############# 서브 페이지만 출력 START #######################-->


        <!--############# 서브 페이지만 출력 END #######################-->
<?php } ?>
</div><!--content-->
</div><!--container-->
<footer>
    <div class="f_top">
        <div class="wrapper">
            <ul class="f_nav">
                <li class="privacy"><a href="#n">개인정보처리방침 </a></li>
                <li><a href="#n">처음으로</a></li>
                <li><a href="#n">회사소개</a></li>
                <li><a href="#n">이용약관</a> </li>
                <li><a href="#n">문의하기</a></li>
                <li><a href="#n">고객센터</a></li>    
            </ul>
        </div>
    </div><!--f_top-->
    <div class="f_sub">
        <div class="wrapper">
                <div class="f_info">
                <address>주 소 : 충청북도 청주시 흥덕구 가경동 1483-5번지 4층</address>
                <span>Tel : 000-000-000</span>
                <span>Fax : 000-000-00600</span>
                <span>E-mail : nanyoung2582@daum.net</span>
            </div>   
            <div class="copyright">Copyright © 더바른코리아 All Rights Reserved. designed by freepik </div> 
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