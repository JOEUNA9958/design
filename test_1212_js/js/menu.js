$(document).ready(function(){

    /*
        pc 버전에서 메뉴(li)에 마우스를 오버하면
        1. header menu_pc 클래시 추가
        2. header .gnb .gnb_wrap ul.depth1 > li > 에 active클래스 추가

        >>이벤트 대상 (마우스 오버 대상) header .gnb .gnb_wrap ul.depth1 > li
    */
        $('header .gnb .gnb_wrap ul.depth1 > li').on('mouseenter' , function(){
            $('header').addClass('menu_pc')
            $('header .gnb .gnb_wrap ul.depth1 > li').removeClass('active')
            $(this).addClass('active')
        })

        $('header').on('mouseleave' , function(){
            $('header').removeClass('menu_pc')
            $('header .gnb .gnb_wrap ul.depth1 > li').removeClass('active')
        })
})