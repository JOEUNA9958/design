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

    // var mapOptions = {
    //     center: new naver.maps.LatLng( 36.6131776281587, 127.444045313764),
    //     zoom: 14  
    // };
    // var map = new naver.maps.Map(document.querySelector(".cnt_way .map"), mapOptions);





    /*******마커 가져오기 ********/
    var map = new naver.maps.Map(document.querySelector(".cnt_way .map"), {
        center: new naver.maps.LatLng(36.6131776281587, 127.444045313764),
        zoom: 16
    });
    
    var marker = new naver.maps.Marker({
        position: new naver.maps.LatLng(36.6131776281587, 127.444045313764),
        map: map
    });


    /*******지도 위에 주소 만들기 ********/
    var HOME_PATH = window.HOME_PATH || '.';

    var cityhall = new naver.maps.LatLng(36.6131776281587, 127.444045313764),
    map = new naver.maps.Map(document.querySelector(".cnt_way .map"), {
        center: cityhall.destinationPoint(0, 500),
        zoom: 15
    }),
    marker = new naver.maps.Marker({
        map: map,
        position: cityhall
    });

    var contentString = [
        '<div class="iw_inner">',
        '   <h3>충청북도</h3>',
        '   <p>서원구 대림로 493 가경뜨란채 3단지<br />',
        '   </p>',
        '</div>'
    ].join('');

    var infowindow = new naver.maps.InfoWindow({
    content: contentString
    });

    naver.maps.Event.addListener(marker, "click", function(e) {
    if (infowindow.getMap()) {
        infowindow.close();
    } else {
        infowindow.open(map, marker);
    }
    });

    infowindow.open(map, marker);
})

