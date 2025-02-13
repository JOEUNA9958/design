/*
    sub.js
    sub 레이아웃 요소 (공통요소)에서 작동되는 스크립트
*/

$(document).ready(function(){
    $('.container .lnb .lnb_open').on('click', function(){
        $('.container .lnb').addClass('open')
    })
    $('.container .lnb .lnb_close').on('click', function(){
        $('.container .lnb').removeClass('open')
    }) /**모바일 메뉴 열기 닫기 종료 **/
})

