<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>  


<div class="main_swiper swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide visual">
            <div class="visual_txt">
                <div class="wrapper">
                    <h2>새로운 미래를 향한 <br>꿈을 이뤄나가는 더바른코리아 입니다.</h2>
                    <p>당신의 삶을 비추는 아름다움 회사입니다.</p>
                    <div class="more">
                        <a href="#n">자세히보기</a>
                    </div>
                </div>
            </div>
        </div><!--visual-->
        
        <div class="swiper-slide remember">
            <div class="rem_txt">
                <div class="wrapper">
                    <h2>사람의 첫인상은 향기로 기억됩니다.</h2>
                    <p>좋은 제품만 전문적으로 보여드리는 더바른코리아가 되겠습니다.</p>
                    <div class="list">
                        <a href="#n">
                            <div class="photo"><img src="img/contents_img/remember_img.jpg" alt="손"></div>
                        </a>
                        <div class="rem_tit">
                            <strong>홈페이지 전문회사 </strong>
                            <span>Since 2025~</span> 
                            <p> 고객과 함께 아름다운 미래로 비상하는 더바른코리아 입니다.</p>
                            <div class="more">
                                <a href="#n">자세히보기</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--remember-->

        <div class="swiper-slide premium">
            <div class="pre_txt" >
                <div class="wrapper">
                    <h2>프리미엄 더바른코리아</h2>
                    <p>더욱 친절하게, 전문적으로 도와드리겠습니다.</p>
                    <div class="list">
                        <ul>
                            <li class="bg1">
                                <a href="#n">
                                    <div class="photo"><img src="img/contents_img/premium01.jpg" alt="향수1"></div>
                                </a>    
                                <div class="pre_tit"> 
                                    <h3>회사소개</h3>
                                    <p>세계로 뻗어가는 더바른코리아</p>
                                    <div class="more">
                                        <a href="#n">자세히보기</a>
                                    </div>
                                </div>
                            </li>
                            <li class="bg2" >
                                <a href="#n">
                                    <div class="photo"><img src="img/contents_img/premium02.jpg" alt="향수2"></div>
                                </a>
                                <div class="pre_tit">
                                    <h3>포토폴리오</h3>
                                    <p>1000개가 넘는 포토폴리오 보유</p>
                                    <div class="more">
                                        <a href="#n">자세히보기</a>
                                    </div>
                                </div>    
                            </li>
                            <li  class="bg3">
                                <a href="#n">
                                    <div class="photo"><img src="img/contents_img/premium03.jpg" alt="향수"></div>
                                </a>    
                                <div class="pre_tit">
                                    <h3>고객센터</h3>
                                    <p>문의주시면 친절하게 답변해드립니다</p>
                                    <div class="more">
                                        <a href="#n">자세히보기</a>
                                    </div>
                                </div>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--premium-->

        <div class="swiper-slide notice">
            <div class="no_txt">
                <div class="wrapper">
                    <h2>NOTICE</h2>
                    <p> 모든 소식을 알려드립니다.</p>
                    <?php echo latest("notice", "csNotice", 3, 30); ?>
                </div><!--wrapper-->
            </div>
        </div><!--notice-->
    </div><!--swiper-wrapper-->
    <div class="swiper-pagination"></div>
</div><!--swiper-->



    

<?php
include_once(G5_THEME_PATH.'/tail.php');