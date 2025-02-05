/*
    main.js
    main에서만 작동되는 스크립트 저장 
*/
$(document).ready(function(){
    const visual_swiper = new Swiper('.visual .swiper', { /* 팝업을 감싼는 요소의 class명 */

        // autoplay: {  /* 팝업 자동 실행 */
        //     delay: 5000,
        //     disableOnInteraction: true,
        // },

        //effect: "fade", /* fade 효과 */
    
        loop: true,  /* 마지막 팝업에서 첫번째 팝업으로 자연스럽게 넘기기 */
    
    
        navigation: {  /* 이전, 다음 버튼 */
            nextEl: '.visual .btn_prev',  /* 다음 버튼의 클래스명 */
            prevEl: '.visual .btn_next',  
        },
    
    });
})//$(document).ready

