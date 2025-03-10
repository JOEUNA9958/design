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
<link rel="stylesheet" href="/theme/basic/css/swiper-bundle.min.css"> 

<script src="/theme/basic/js/Hayung_js/swiper-bundle.min.js"></script> <!--swiper-->
<script src="/theme/basic/js/Hayung_js/jquery-3.7.1.min.js"></script> <!-- 라이브러리-->
<script src="/theme/basic/js/Hayung_js/common.js"></script>
<script src="/theme/basic/js/Hayung_js/main.js"></script>
<link rel="stylesheet" href="/theme/basic/css/main.css"> 

<body>
    <div id="wrap">
        <div class="visual">
            <div class="popup">
                <div class="swiper"> 
                    <ul class="swiper-wrapper"> 
                        <li class="swiper-slide">
                            <div class="photo"><img src="/img/hayung/visual01.jpg" alt="사진"></div>
                            <div class="visual_txt">
                                <div class="wrapper">
                                    <h3>방문요양서비스를<br>
                                        전문적으로 하는<br>
                                        하융노인요양센터입니다.</h3>
                                    <p>방문요양센터만 하는 곳은 재가복지센터라고도 불리며, <br> 노인분들의 일상생활을 지원하는 서비스를 제공합니다. </p>
                                </div><!--wrapper-->
                            </div><!--visual_txt-->
                        </li> 
                        <li class="swiper-slide">
                            <div class="photo"><img src="/img/hayung/visual02.jpg" alt="사진"></div>
                            <div class="visual_txt">
                                <div class="wrapper">
                                    <h3>장기요양등급 신청이<br>
                                        어려우시면 무료로 등급 <br>
                                        신청을 도와드립니다</h3>
                                    <p>하융노인요양센터에서 상담부터 신청까지 상담사와 함께 하세요.</p>
                                </div><!--wrapper-->
                            </div><!--visual_txt-->
                        </li> 
                        <li class="swiper-slide">
                            <div class="photo"><img src="/img/hayung/visual03.jpg" alt="사진"></div>
                            <div class="visual_txt">
                                <div class="wrapper">
                                    <h3>하융노인방문<br>
                                        요양센터에서 제공하는<br>
                                        서비스는 다음과 같습니다.</h3>
                                    <p>가사도우미 서비스, 식사 및 건강상담, 일상생활 도움 서비스, 보호자 동반 등이 있습니다.</p>
                                </div><!--wrapper-->
                            </div><!--visual_txt-->
                        </li> 
                    </ul>
                    <button class="btn_prev">이전버튼</button>
                    <button class="btn_next">다음버튼</button>
                </div><!--swiper-->
            </div><!--popup-->
            <div class="link">
                <ul>
                    <li class="ico1">
                        <a href="/bbs/content.php?co_id=insurance" >
                            <h3>요양보험</h3>
                            <p>노인이 필요로 하는 돌봄 서비스를 제공하는 보험 제도</p>
                            <span>자세히보기</span>
                        </a>
                    </li>
                    <li class="ico2">
                        <a href="/bbs/content.php?co_id=recuperation">
                            <h3>방문요양</h3>
                            <p>집에서 요양보호사가 돌봄 서비스를 제공하는 활동</p>
                            <span>자세히보기</span>
                        </a>
                    </li> 
                </ul>
            </div><!--link-->
        </div><!--visual--> 
    </div>

    <div class="service">
            <div class="tit">
                <strong>National Health Insurance Act</strong>
                <h2>방문요양 <br>
                    서비스 안내</h2>
            </div><!--tit-->
            <div class="list">
                <ul>
                    <li>
                        <a href="/bbs/content.php?co_id=recuperation">
                            <div class="photo"><img src="/img/hayung/service01.jpg" alt="사진"></div>
                            <strong>신체활동 서비스</strong>
                        </a>
                    </li>
                    <li>
                        <a href="/bbs/content.php?co_id=recuperation">
                            <div class="photo"><img src="/img/hayung/service02.jpg" alt="사진"></div>
                            <strong>인지활동 서비스</strong>
                        </a>
                    </li>
                    <li>
                        <a href="/bbs/content.php?co_id=recuperation">
                            <div class="photo"><img src="/img/hayung/service03.jpg" alt="사진"></div>
                            <strong>정서지원 서비스</strong>
                        </a>
                    </li>
                </ul>
            </div><!--list-->
        </div><!--service-->

        <div class="communtiy">
            <div class="wrapper">
                <div class="tit">
                    <h2>노인장기요양 보험제도</h2>
                    <p>65세 이상 어르신 또는 65세 미만 노인성 질병을 가진 분이 거동이 현저히 불편하여 일상생활을 혼자서 수행하기 어려운 분들에게 제공되는 신체 및 가사 활동 지원 서비스를 제공하는 제도입니다.<br> <br>
                    <strong>하융노인요양센터에서 무료등급신청대행을 지원해드립니다.</strong></p>
                    <div class="btn_wrap">
                        <a href="/bbs/content.php?co_id=procedure ">신청절차</a>
                        <a href="/bbs/content.php?co_id=insurance">제도안내</a>
                    </div><!--btn_wrap-->
                </div><!--tit-->
                <div class="photo"><img src="/img/hayung/communtiy01.jpg" alt="사진"></div>
            </div><!--wrapper-->
        </div><!--communtiy-->
        <div class="gallery">  
            <div class="wrapper">
                <div class="tit">
                    <h2>하융노인요양센터 갤러리</h2>
                    <p>재가장기요양기관 방문요양</p>
                </div>
                <div class="list">
                    <div class="swiper"> 
                        <ul class="swiper-wrapper"> 
                            <li class="swiper-slide">
                                <a href="#n">
                                    <div class="photo"><img src="/img/hayung/gallery01.jpg" alt="사진"></div>
                                    <h3>장기요양 고시 및 노인인권감수성 교육</h3>
                                </a>
                            </li> 
                            <li class="swiper-slide">
                                <a href="#n">
                                    <div class="photo"><img src="/img/hayung/gallery02.jpg" alt="사진"></div>
                                    <h3>장기요양 고시 및 노인인권감수성 교육</h3>
                                </a>
                            </li> 
                            <li class="swiper-slide">
                                <a href="#n">
                                    <div class="photo"><img src="/img/hayung/gallery03.jpg" alt="사진"></div>
                                    <h3>장기요양 고시 및 노인인권감수성 교육</h3>
                                </a>
                            </li> 
                            <li class="swiper-slide">
                                <a href="#n">
                                    <div class="photo"><img src="/img/hayung/gallery04.jpg" alt="사진"></div>
                                    <h3>장기요양 고시 및 노인인권감수성 교육</h3>
                                </a>
                            </li> 
                            <li class="swiper-slide">
                                <a href="#n">
                                    <div class="photo"><img src="/img/hayung/gallery05.jpg" alt="사진"></div>
                                    <h3>장기요양 고시 및 노인인권감수성 교육</h3>
                                </a>
                            </li> 
                        </ul>
                    </div><!--swiper-->
                    <div class="paging"></div>
                </div>
            </div>
        </div><!--gallery-->

        <div class="inquire">
            <div class="wrapper">
                <div class="tit">
                    <h2>하융노인요양센터에 <br> 문의 하세요.</h2>
                    <p>부모님 마음에 맞는 요양보호사님을 찾아드릴게요.</p>
                </div>
                <div class="customer">
                    <h3>고객센터</h3>
                        <div class="tel">
                            <span>TEL</span>
                            <strong>041-960-0064</strong>
                        </div>
                        <div class="tel">
                            <span>FAX</span>
                            <strong>041-960-0065</strong>
                        </div>
                        <div class="time">· 평일 09:00~18:00 , 토,일요일 / 국공휴일 휴무</div>
                        <div class="btn_wrap">
                            <a href="/bbs/board.php?bo_table=online" class="online">온라인 문의</a>
                            <a href="/bbs/content.php?co_id=map" class="map">오시는 길</a>
                        </div>
                </div><!--customer-->
            </div><!--wrapper-->
        </div><!--inquire-->
</body>


<?php
include_once(G5_THEME_PATH.'/tail.php');