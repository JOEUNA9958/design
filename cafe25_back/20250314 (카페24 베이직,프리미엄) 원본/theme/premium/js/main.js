/*
    main.js
    main에서만 작동되는 스크립트 저장 
*/
$(document).ready(function(){
    var swiper = new Swiper(".main_swiper", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 0,
        mousewheel: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });

})

