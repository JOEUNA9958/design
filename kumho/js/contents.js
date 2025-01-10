/*
    contents.js
    각각의 콘텐츠 페이지에서 작동될 스크립트 저장 
*/
console.log(' contents.js 열림')
$(document).ready(function(){
    /*history_tab를 active 클래스 주거나 빼는 효과 (시작)*/
    /*contents.js는 모든 서브페이지에서 불림
     * >> 스크롤 할때마다 계산식을 써야 하는데 
     * >> 다른 모든 페이지에서 계산하면 안됨
     * >> 여기가 .cnt_history 가 있는지 물어보고 확인하고 계산함 
     * 
    */

    if($('.sub_contents').hasClass('cnt_history')){
        let area_name = $('.cnt_history') 
        let area_top = area_name.offset().top
        let area_h = area_name.height()
        let area_btm
        let scrolling

        function history_tab_show(){
            area_top = area_name.offset().top
            area_h = area_name.height()
            area_btm = area_top + area_h
            scrolling = $(window).scrollTop()
            if(scrolling > area_top){
                console.log('닿았어요')
            }
        }
        history_tab_show()

        $(window).resize(function(){ //리사이즈 될때마다 실행 
            history_tab_show()
        })//$(window).resize

        $(window).scroll(function(){
            history_tab_show()
        })
    }

    /*history_tab를 active 클래스 주거나 빼는 효과 (종료)*/

})//$(document).ready