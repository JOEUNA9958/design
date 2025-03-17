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
                    <h2>더바른코리아<br>
                    기억되는 프리미엄 향수</h2>
                    <p>프리미엄 등급 향료를 사용해<br>
                    은은한 향을 오랫동안 지속시켜 줍니다</p>
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
                    <p>좋은 제품만 연구 개발하여 보여드리겠습니다.</p>
                    <div class="list">
                        <div class="photo"><img src="img/contents_img/remember_img.jpg" alt="손"></div>
                        <div class="rem_tit">
                            <strong>오랫동안 향기롭게. </strong>
                            <span>Since 2000~</span> 
                            <p> 고객님들의 인상깊은 첫인상을 남겨드리기 위해 제품에 문제없도록 품질 관리에 신경쓰며 좋은 제품만 연구 개발하여 보여드리겠습니다.</p>
                            <div class="more">
                                <a href="#n">자세히보기</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--remember-->

        <div class="swiper-slide premium">
            <div class="pre_txt">
                <div class="wrapper">
                    <h2>프리미엄 향수</h2>
                    <p>오랫동안 향기롭게, 사람들이 기억하는 나의향기</p>
                    <div class="list">
                        <ul>
                            <li class="bg1">
                                <div class="photo"><img src="img/contents_img/premium01.jpg" alt="향수1"> </div>
                                <div class="pre_tit"> 
                                    <h3>회사소개</h3>
                                    <p>보다 낳은 서비스와 창조적인 향수</p>
                                    <div class="more">
                                        <a href="#n">자세히보기</a>
                                    </div>
                                </div>
                            </li>
                            <li class="bg2">
                                <div class="photo"><img src="img/contents_img/premium02.jpg" alt="향수2"></div>
                                <div class="pre_tit">
                                    <h3>포토폴리오</h3>
                                    <p>수제향수, 니치향수 </p>
                                    <div class="more">
                                        <a href="#n">자세히보기</a>
                                    </div>
                                </div>    
                            </li>
                            <li  class="bg3">
                                <div class="photo"><img src="img/contents_img/premium03.jpg" alt="향수"></div>
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
                    <p>향수의 모든 소식을 알려드립니다.</p>
                    <div class="list">
                        <ul>
                            <li class="box01">
                                <a href="#n">
                                    <h3>언제나 환영합니다.</h3>
                                    <p>문의사항은 고객센터온라인에 글을 남겨주세요.</p>
                                    <span>2024-02-15</span>
                                    <strong>전체보기</strong>
                                </a>    

                            </li>
                            <li  class="box02">
                                <a href="#n">
                                    <h3>홈페이지를 오픈했습니다.</h3>
                                    <p>다양한 이벤트가 많이있습니다.</p>
                                    <span>2024-012-15</span>
                                </a>  
                            </li>
                            <li  class="box03">
                                <a href="#n">
                                    <h3>향수 이벤트 오픈했습니다.</h3>
                                    <p>사람의 첫인상은 향기로 기억됩니다.</p>
                                    <span>2025-02-15</span>
                                </a>    
                            </li>
                        </ul>
                    </div>   <!--list--> 
                </div><!--wrapper-->
            </div>
        </div><!--notice-->
    </div><!--swiper-wrapper-->
    <div class="swiper-pagination"></div>
</div><!--swiper-->



    

<?php
include_once(G5_THEME_PATH.'/tail.php');