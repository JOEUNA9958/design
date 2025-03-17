/*
    common.js
    header / footer 공통요소에 들어가는 스크립트 저장 
    모든 페이지에서 공통으로 작동되는 스크립트 저장
*/
// $(document).ready(function(){
//     let window_w //브라우저의 넓이
//     let device_status //pc - mobile 현재 상태를 저장

//     function device_chk(){
//         window_w = $(window).width()
//         if(window_w > 1024){
//             device_status ='pc'
//         }else{
//             device_status ='mobile'
//         }
//         // console.log(device_status)
//     }//function

//     device_chk() //문서가 로딩될때
//     $(window).resize(function(){ //브라우저가 리사이즈 할때마다 
//         device_chk()
//     })//window.resize

//     /************ pc 메뉴 열기 : 시작 ***********
//      * 
//      * 1. header에 menu_pc 클래스 추가 
//      * 2. header .gnb .gnb_wrap ul.depth1 > li에 over 클래스 추가 
//     */
//     $('header .gnb .gnb_wrap .depth1 > li').on('mouseenter focusin', function(){
//         if(device_status == 'pc'){
//             // console.log('나온')
//             $('header').addClass('menu_pc')
//             $('header .gnb .gnb_wrap .depth1 > li').removeClass('over')
//             $(this).addClass('over')
//         }
//     })
//     $('header').on('mouseleave', function(){
//         if(device_status == 'pc'){
//             $('header').removeClass('menu_pc')
//             $('header .gnb .gnb_wrap .depth1 > li').removeClass('over')
//         }
//     })
//     $('.tnb .search .inner .keyword').on('focusin', function(){
//         if(device_status == 'pc'){
//             $('header').removeClass('menu_pc')
//             $('header .gnb .gnb_wrap .depth1 > li').removeClass('over')
//         }
//     })
    
//     /************ pc 메뉴 열기 : 종료 ***********/


//     /************ header 가 고정되면 class 추가 :: 시작 ***********/

//     let scrolling

//     function scroll_chk(){
//         scrolling = $(window).scrollTop()

//         if(scrolling > 0){
//             $('header').addClass('fixed')
//         }else{
//             $('header').removeClass('fixed')
//         }
//     }

//     scroll_chk() //함수 실행 (문서가 로딩 되었을때 1번)
//     $(window).scroll(function(){
//         scroll_chk() // 함수실행
//     })

//     /************ header 가 고정되면 class 추가 :: 종료 ***********/


//     /******** 모바일 2차 메뉴 열고 닫기 시작  *********
//      * header .gnb .gnb_wrap ul.depth1 > li > a 를 클릭했을때
//      * 1. 클릭 이벤트를삭제 (페이지 이동 막기 )
//      * 1차 메뉴 li에 open 클래스를 추가하거나 삭제 
//      * >> 열려있으면 닫고, 닫혀있으면 (다른애들을 모두 닫고 나만 열기)
//      * /

//     /****/

//     $('header .gnb_wrap ul.depth1 > li > a').on('click', function(e){
//         if(device_status == 'mobile'){
//             e.preventDefault(); //a의 클릭 막기
//             if($(this).parent().hasClass('open') == true){ // open이 있으면 (닫아야함)
//                 $(this).parent().removeClass('open')
//             }else{ //open 이 없으면 (열기)
//                 $('header .gnb .gnb_wrap ul.depth1 > li').removeClass('open')
//                 $(this).parent().addClass('open')
//             }
//         }
//     })/* 모바일 2차 메뉴 열고 닫기 종료*/ 

//     /******** 모바일 메뉴 열기 닫기 시작 *
//      * header .gnb .gnb_open >> 클릭하면 열리고 header에 menu_mo 클래스 추가 
//      * header .gnb .gnb_close >>클릭하면 닫힘 header에 menu_mo 클래스 삭제
//      * 
//      * 
//      * **/

//     $('header .gnb .gnb_open').on('click', function(){
//         $('header').addClass('menu_mobile')
//     })
//     $('header .gnb .gnb_close').on('click', function(){
//         $('header').removeClass('menu_mobile')
//     }) /**모바일 메뉴 열기 닫기 종료 **/
// })