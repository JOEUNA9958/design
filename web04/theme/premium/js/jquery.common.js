$(function(){
    var hide_menu = false;
    var mouse_event = false;
    var oldX = oldY = 0;

    $(document).mousemove(function(e) {
        if(oldX == 0) {
            oldX = e.pageX;
            oldY = e.pageY;
        }

        if(oldX != e.pageX || oldY != e.pageY) {
            mouse_event = true;
        }
    });

    /******시작*******/
    let window_w //브라우저의 넓이
    let device_status //pc - mobile 현재 상태를 저장

    function device_chk(){
        window_w = $(window).width()
        if(window_w > 1024){
            device_status ='pc'
        }else{
            device_status ='mobile'
        }
        // console.log(device_status)
    }//function

    device_chk() //문서가 로딩될때
    $(window).resize(function(){ //브라우저가 리사이즈 할때마다 
        device_chk()
    })//window.resize


    /************ pc 메뉴 열기 : 시작 ***********
     * 
     * 1. #header에 menu_pc 클래스 추가 
     * 2. #header.menu_pc #gnb .gnb_wrap ul .gnb_1dli 에 over 클래스 추가 
    */
    $('#header #gnb .gnb_wrap ul .gnb_1dli').on('mouseenter focusin', function(){
        if(device_status == 'pc'){
            console.log('나온다')
            $('#header').addClass('menu_pc')
            $('#header #gnb .gnb_wrap ul .gnb_1dli').removeClass('over')
            $(this).addClass('over')
        }
    })
    $('#header').on('mouseleave', function(){
        if(device_status == 'pc'){
            $('#header').removeClass('menu_pc')
            $('#header #gnb .gnb_wrap ul .gnb_1dli').removeClass('over')
        }
    })

    $('.tnb  #tnb_sch').on('focusin', function(){
        if(device_status == 'pc'){
            $('#header').removeClass('menu_pc')
            $('#header #gnb .gnb_wrap ul .gnb_1dli').removeClass('over')
        }
    })
    
        /************ header 가 고정되면 class 추가 :: 시작 ***********/

        let scrolling

        function scroll_chk(){
            scrolling = $(window).scrollTop()
    
            if(scrolling > 0){
                $('#header').addClass('fixed')
            }else{
                $('#header').removeClass('fixed')
            }
        }
    
        scroll_chk() //함수 실행 (문서가 로딩 되었을때 1번)
        $(window).scroll(function(){
            scroll_chk() // 함수실행
        })
    
        /************ header 가 고정되면 class 추가 :: 종료 ***********/



    /************ pc 메뉴 열기 : 종료 ***********/


    /******** 모바일 2차 메뉴 열고 닫기 시작  *********
     * #header .gnb_wrap ul.depth1 .gnb_1dli .gnb_1da  를 클릭했을때
     * 1. 클릭 이벤트를삭제 (페이지 이동 막기 )
     * 1차 메뉴 li에 open 클래스를 추가하거나 삭제 
     * >> 열려있으면 닫고, 닫혀있으면 (다른애들을 모두 닫고 나만 열기)
     * /
     * 
    /****/

    $('#header .gnb_wrap ul.depth1 .gnb_1dli .gnb_1da').on('click', function(e){
        if(device_status == 'mobile'){
            e.preventDefault(); //a의 클릭 막기
            if($(this).parent().hasClass('open') == true){ // open이 있으면 (닫아야함)
                $(this).parent().removeClass('open')
            }else{ //open 이 없으면 (열기)
                $('#header .gnb_wrap ul.depth1 .gnb_1dli').removeClass('open')
                $(this).parent().addClass('open')
            }
        }
    })/* 모바일 2차 메뉴 열고 닫기 종료*/ 

    /******** 모바일 메뉴 열기 닫기 시작 *
     * header .gnb .gnb_open >> 클릭하면 열리고 header에 menu_mo 클래스 추가 
     * header .gnb .gnb_close >>클릭하면 닫힘 header에 menu_mo 클래스 삭제
     * 
     * **/

    $('#header #gnb .gnb_open').on('click', function(){
        $('#header').addClass('menu_mobile')
    })
    $('#header #gnb .gnb_close').on('click', function(){
        $('#header').removeClass('menu_mobile')
    }) /**모바일 메뉴 열기 닫기 종료 **/
})


/*******sub.js**모바일메뉴 나오게하기**/ 
$(document).ready(function(){
    $('.sub_head .lnb .lnb_open').on('click', function(){
        $('.sub_head .lnb').addClass('open')
    })
    $('.sub_head .lnb .lnb_close').on('click', function(){
        $('.sub_head .lnb').removeClass('open')
    }) /**모바일 메뉴 열기 닫기 종료 **/
})


 

function submenu_hide() {
    $("#hd").removeClass("hd_zindex");
    $(".gnb_1dli").removeClass("gnb_1dli_over gnb_1dli_over2 gnb_1dli_on");
}

function menu_rearrange(el)
{
    var width = $("#gnb_1dul").width();
    var left = w1 = w2 = 0;
    var idx = $(".gnb_1dli").index(el);
    var max_menu_count = 0;
    var $gnb_1dli;

    for(i=0; i<=idx; i++) {
        $gnb_1dli = $(".gnb_1dli:eq("+i+")");
        w1 = $gnb_1dli.outerWidth();

        if($gnb_1dli.find(".gnb_2dul").length)
            w2 = $gnb_1dli.find(".gnb_2dli > a").outerWidth(true);
        else
            w2 = w1;

        if((left + w2) > width) {
            if(max_menu_count == 0)
                max_menu_count = i + 1;
        }

        if(max_menu_count > 0 && (idx + 1) % max_menu_count == 0) {
            el.removeClass("gnb_1dli_over").addClass("gnb_1dli_over2");
            left = 0;
        } else {
            left += w1;
        }
    }
}