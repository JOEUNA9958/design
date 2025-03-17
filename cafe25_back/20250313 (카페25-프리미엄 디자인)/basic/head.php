<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<link rel="stylesheet" href="/theme/basic/js/Hayung_js/jquery-3.7.1.min.js"> 
<link rel="stylesheet" href="/theme/basic/js/Hayung_js/sub.js"> 
<link rel="stylesheet" href="/theme/basic/css/sub.css"> 
<link rel="stylesheet" href="/theme/basic/css/main.css"> 

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    <!--menu_pc
    menu_mobile
    fixed
    -->
    <div id="header">
        <h1 class="logo"  data-aos="fade-up"><a href="/"></a></h1>
        <nav id="gnb">
            <h2>메인메뉴</h2>
            <button class="gnb_open">메뉴열기</button>
            <div class="gnb_wrap"  data-aos="fade-up">
                <ul class="depth1">
                    <?php
                    $menu_datas = get_menu_db(0, true);
                    $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                    $i = 0;
                    foreach( $menu_datas as $row ){
                        if( empty($row) ) continue;
                        $add_class = (isset($row['sub']) && $row['sub']) ? '' : '';
                    ?>

                    <!-- pc버전은 over , mobile버전은 open-->
                    <li class="gnb_1dli  <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){

                            if( empty($row2) ) continue; 

                            if($k == 0)
                                echo '<span class="bg">하위분류</span><div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                        ?>
                            <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                        <?php
                        $k++;
                        }   //end foreach $row2

                        if($k > 0)
                            echo '</ul></div>'.PHP_EOL;
                        ?>
                    </li>
                    <?php
                    $i++;
                    }   //end foreach $row

                    if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                </ul>
            </div><!--gnb_wrap-->
            <button class="gnb_close">버튼닫기</button>
        </nav><!--gnb-->

        <div class="tnb"  data-aos="fade-up">
            <fieldset id="tnb_sch">
                <legend>사이트 내 전체검색</legend>
                <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                <input type="hidden" name="sop" value="and">
                <label for="sch_stx" class="sound_only">검색어 필수</label>
                <input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="검색">
                <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </form>

                <script>
                function fsearchbox_submit(f)
                {
                    var stx = f.stx.value.trim();
                    if (stx.length < 2) {
                        alert("검색어는 두글자 이상 입력하십시오.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                    var cnt = 0;
                    for (var i = 0; i < stx.length; i++) {
                        if (stx.charAt(i) == ' ')
                            cnt++;
                    }

                    if (cnt > 1) {
                        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }
                    f.stx.value = stx;

                    return true;
                }
                </script>
                
            </fieldset>
        </div>  <!--tnb-->                     
    </id><!--header-->                    

   
    <script>
    
    $(function(){
        $(".gnb_menu_btn").click(function(){
            $("#gnb_all, #gnb_all_bg").show();
        });
        $(".gnb_close_btn, #gnb_all_bg").click(function(){
            $("#gnb_all, #gnb_all_bg").hide();
        });
    });

    </script>
</div>
<!-- } 상단 끝 -->


<hr>


<?php
if (!defined('_INDEX_')) {
?>

<!--############ 서브페이지 상단 :: START #################-->


<?php
$depth1_menu_code = null;
$depth2_menu_code = null;
$depth1_menu_name = null;
$depth2_menu_name = null;
$depth2_html = null;
$menu_url = $_SERVER['REQUEST_URI'];
if(strpos($menu_url, 'search.php') === false){

    if($bo_table){
        $menu_url = '/bbs/board.php?bo_table='.$bo_table;
    }
    $menu = sql_query("select * from {$g5['menu_table']} where me_use = '1' and me_link like '%$menu_url' ", false);
    for ($i=0; $row=sql_fetch_array($menu); $i++) {
        if(strlen($row['me_code']) == 2){
            $depth1_menu_code = $row['me_code'];
        }else{
            $depth2_menu_code = $row['me_code'];
        }
    }
    if($depth1_menu_code == null){
        $depth1_menu_code = substr($depth2_menu_code, 0,2);
    }

    $menu = sql_query("select * from {$g5['menu_table']} where me_use = '1' and me_code = '$depth1_menu_code' ", false);
    for ($i=0; $row=sql_fetch_array($menu); $i++) {
        if(strlen($row['me_code']) == 2){
            $depth1_menu_code = $row['me_code'];
        }else{
            $depth2_menu_code = $row['me_code'];
        }
    }

    $sql2 = " select * from {$g5['menu_table']} where me_use = '1' and me_code like '$depth1_menu_code%' order by me_order, me_id ";
    $result2 = sql_query($sql2);
    $depth2_html = '<ul>';
    for ($k=0; $row2=sql_fetch_array($result2); $k++) {
        if($k > 0){
            if($row2['me_code'] == $depth2_menu_code){
                $depth2_html .= '<li class="active"><a href="'.$row2['me_link'].'">'.$row2['me_name'].'</a></li>';
                $depth2_menu_name = $row2['me_name'];
            }else{
                $depth2_html .= '<li><a href="'.$row2['me_link'].'">'.$row2['me_name'].'</a></li>';
            }
        }else{
            $depth1_menu_name = $row2['me_name'];
        }
    }
    $depth2_html .= '</ul>';
}else{
    $depth1_menu_name = '검색결과';
    $depth2_menu_name = '검색결과';
    $depth2_html = '<ul><li><a href="#n">검색결과</a></li></ul>';
}
?>


<!-- <? echo $depth1_menu_name ?> 1차메뉴명 -->
<!-- <? echo $depth2_menu_name ?> 2차메뉴명 -->
<!-- <? echo $depth2_html ?> 2차메뉴명 -->

<div class="sub_head">
    <div class="sub_visual bg<? echo $depth1_menu_code ?>">
            <!--  기관소개 bg1, 요양보험 bg20, 방문요양 bg30, 커뮤니티 bg40, 봉사활동 bg50   -->
        <div class="wrapper">
            <strong>방문요양센터</strong>
            <span><? echo $depth1_menu_name ?></span> <!--현재 1차메뉴명-->
        </div><!--wrapper-->
    </div><!--sub_visual--> 
    <nav class="lnb"> <!-- 모바일에서 메뉴가 열리면 open 클래스 추가 -->
        <div class="wrapper">
            <button class="lnb_open"> <? echo $depth2_menu_name ?></button>
            <? echo $depth2_html ?> <!-- 현재2차메뉴명-->
            <button class="lnb_close"> <? echo $depth2_menu_name ?></button>
        </div>
    </nav>
</div><!--container-->



<!--############ 서브페이지 상단 :: END #################-->
<?php
}
?>

<!-- 콘텐츠 시작 { -->
<div id="container">
    <div id="content">
        <?php if (!defined("_INDEX_")) { ?>
            <!--############ 서브페이지 페이지 제목 :: START #################-->
            <div class="wrapper">
                <h2 class="page_tit"><? echo $depth2_menu_name ?></h2>
            <!--############ 서브페이지 페이지 제목 :: START #################-->
        <?php } ?>
