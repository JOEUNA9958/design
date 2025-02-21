<?php
// PHP 로직이 필요한 경우 여기에 작성
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="꾸준한 성장을 통해 세계로 뻗어나가는 ㈜기업명코스메틱 · 기초케어 · 헤어케어 · 바디/핸드케어">
    <title>기업명코스메틱</title>
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        /* Reset & Common Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans KR', sans-serif;
            line-height: 1.6;
        }
        
        /* Main Slider Styles */
        .slider_wrap {
            height: 650px;
            position: relative;
            overflow: hidden;
        }

        .swiper-main {
            width: 100%;
            height: 130%;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .slider_content_wrap {
            position: absolute;
            height: 342.8px;
            left: 360px;
            right: 360px;
            bottom: 100px;
            padding: 0;
        }

        .slider_content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .s_txt {
            animation: fadeInUp 1s ease;
        }

        .s_txt .line {
            position: absolute;
            width: 249px;
            height: 1px;
            left: 323.8px;
            top: calc(60% - 1px/2 - 157.01px);
            background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
            margin-left: 10px;
        }


        .s_txt h3 {
            position: relative;
            width: 561.51px;
            height: 112px;
            margin: 28.8px 0 0 15px;
            font-family: 'Roboto', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 60px;
            line-height: 112px;
            display: flex;
            align-items: center;
            color: #FFFFFF;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
        }

        .time_line {
            height: 1px;
            background: rgba(255, 255, 255, 0.3);
            margin-bottom: 15px;
        }

        .time_line .bar {
            height: 100%;
            background: #fff;
            width: var(--progress, 0%);
            transition: width 0.1s linear;
        }

        .controll {
            display: flex;
            align-items: center;
            color: #fff;
        }

        .quality-text {
            position: relative;
            width: 294px;
            height: 29px;
            font-family: 'Roboto', sans-serif;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 29px;
            display: flex;
            align-items: center;
            letter-spacing: 3.6px;
            color: #FFFFFF;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
        }

        .play_btn {
            cursor: pointer;
            margin-right: 20px;
        }

        /* Animation classes */
        .animate-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }

        .animate-in.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-in-right {
            transform: translateX(50px);
        }

        .fade-in-left {
            transform: translateX(-50px);
        }

        .swiper-wrapper {
            position: relative;
            width: 100%;
            height: 80%;
            z-index: 1;
            display: flex;
            transition-property: transform;
            box-sizing: content-box;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

/* First Part Section Style */
.first-part {
    width: 100%;
    padding: 100px 0;
    background: #fff;
    overflow: hidden;
}

.first-part-container {
    margin: 0 auto;
    padding: 0 15px;
}

.first-part-top {
    margin-bottom: 50px;
}

.first-part-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    position: relative;
}

.first-part-line-left,
.first-part-line-right {
    width: 293.44px;
    height: 1px;
    background: #99CABE;
    position: absolute;
}

.first-part-line-left {
    left: 0;
}

.first-part-line-right {
    right: 0;
}

.first-part-text h2 {
    font-family: 'Roboto', sans-serif;
    font-size: 100px;
    font-weight: 500;
    color: #616161;
    line-height: 1;
    white-space: nowrap;
}

.first-part-image {
    width: 453px;
    height: 110px;
    overflow: hidden;
}

.first-part-image img {
    width: 90%;
    height: 100%;
    object-fit: cover;
}

/* Animation */
.first-part-top {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 1s ease forwards;
}

.first-part-bottom {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 1s ease forwards 0.3s;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1200px) {
    .first-part-text h2 {
        font-size: 70px;
    }
    
    .first-part-image {
        width: 300px;
        height: 80px;
    }
    
    .first-part-line-left,
    .first-part-line-right {
        width: 150px;
    }
}

@media (max-width: 768px) {
    .first-part {
        padding: 50px 0;
    }
    
    .first-part-text h2 {
        font-size: 40px;
    }
    
    .first-part-image {
        width: 200px;
        height: 60px;
    }
    
    .first-part-line-left,
    .first-part-line-right {
        display: none;
    }
    
    .first-part-row {
        flex-direction: column;
        gap: 20px;
    }
}

/* Second Part Section Style */
.second-part {
    position: relative;
    padding: 0 250px 100px;
    width: 100%;
    max-width: 1920px;
    margin: 0 auto;
    z-index: 2;
}

.second-part::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 50%;  /* 아래 절반만 */
    background: #F9F9F9;
    z-index: -1;  /* 콘텐츠 뒤로 */
}

.second-part-container {
    width: 100%;
    max-width: 1420px;
    margin: 0 auto;
    position: relative;
}

/* Title Style */
.second-part-title {
    text-align: center;
    margin-bottom: 60px;
}

.title-line-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 25px;
    margin-bottom: 20px;
}

.title-line {
    width: 68px;
    height: 1px;
    background: #CCE4DF;
}

.title-text {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    letter-spacing: 3.2px;
    color: #007A5D;
}

.main-title {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size: 43px;
    line-height: 64px;
    text-align: center;
    color: #424242;
}

.main-title2 {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size: 37px;
    /* line-height: 64px; */
    text-align: center;
    color: #424242;
    text-align: justify;
    padding-top: 18px;
    width: 500px;
}

/* Content Style */
.second-part-content {
    display: flex;
    position: relative;
}

.content-item {
    flex: 1;
    position: relative;
    transition: transform 0.5s ease;
}


.content-img {
    position: relative;
    width: 473px;
    height: 386px;
    overflow: hidden;
}

.content-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.content-border {
    position: absolute;
    top: 2.59%;
    right: 2.11%;
    bottom: 2.59%;
    left: 2.11%;
    border: 1px solid rgba(255, 255, 255, 0.4);
    transition: all 0.5s ease;
}

.view-more {
    position: absolute;
    top: 50%;
    left: 120%;
    transform: translate(-50%, -50%);
    color: #FFFFFF;
    text-decoration: none;
    /* padding: 10px 30px; */
    /* border: 1px solid #FFFFFF; */
    opacity: 0;
    transition: all 0.5s ease;
    /* height: 40px; */
    width: 150px;
}

.view-more i {
    margin-left: 5px;
}

.content-item:hover {
    transform: translateY(-10px);
}

.content-item:hover .content-img img {
    transform: scale(1.05);
    filter: brightness(0.7);
}

.content-item:hover .content-border {
    top: 5%;
    right: 5%;
    bottom: 5%;
    left: 5%;
}

.content-item:hover .view-more {
    opacity: 1;
    transform: translateY(0);
}

.content-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0);
    transition: all 0.5s ease;
}

.content-item:hover .content-overlay {
    background: rgba(0, 0, 0, 0.3);
}

.content-text {
    position: absolute;
    left: 41px;
    bottom: 41px;
    color: #FFFFFF;
}

.eng-text {
    display: block;
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 26px;
    margin-bottom: 7px;
}

.content-text h4 {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 24px;
    line-height: 38px;
}

/* Point Image */
.point-img {
    position: absolute;
    width: 300px;
    height: 300px;
    right: -190px;
    top: 105px;
    z-index: -1;
    animation: rotatePoint 15s linear infinite;
}

@keyframes rotatePoint {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* 반응형 스타일 */
@media (max-width: 1440px) {
    .second-part {
        padding: 0 50px 100px;
    }
    
    .content-img {
        width: 100%;
        height: 300px;
    }
    .info-card-wrap::before,
    .info-card-wrap::after {
        display: none; /* 모바일에서는 구분선 숨김 */
    }
}

@media (max-width: 768px) {
    .second-part-content {
        flex-direction: column;
    }
    
    .content-img {
        height: 250px;
    }
    
    .point-img {
        width: 150px;
        height: 150px;
        right: -50px;
    }
    
    .main-title {
        font-size: 30px;
        line-height: 45px;
    }
}

/* Third Part Section Style */
.third-part {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 360px 100px;
    width: 100%;
    max-width: 1920px;
    height: 744.19px;
    isolation: isolate;
    z-index: 3;
}

.third-part-bg {
    position: absolute;
    height: 460.19px;
    left: 0;
    right: 0;
    top: 0;
    background: #F9F9F9;
    z-index: 0;
}

.third-part-container {
    width: 100%;
    max-width: 1200px;
    height: 644.19px;
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
}

/* Left Content */
.third-part-left {
    position: relative;
    width: 425px;
    padding: 15px;
}

.title-wrap {
    display: flex;
    align-items: center;
    gap: 25px;
}

.sub-title {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    letter-spacing: 3.2px;
    color: #007A5D;
}

.title-line {
    width: 68px;
    height: 1px;
    background: #CCE4DF;
}

.main-title {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size: 40px;
    line-height: 64px;
    color: #424242;
    margin-top: 45.6px;
}

.view-more-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 198px;
    height: 52px;
    background: #FFFFFF;
    border: 1px solid #99CABE;
    margin-top: 30px;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: #00624A;
    text-decoration: none;
    transition: all 0.3s ease;
}

.view-more-btn:hover {
    background: #00624A;
    color: #FFFFFF;
}

/* Right Content */
.third-part-right {
    position: relative;
    width: 706px;
}

.top-image {
    position: absolute;
    width: 706px;
    height: 473px;
    top: calc(50% - 473px/2 - 35.6px);
}

.top-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.bottom-image {
    position: absolute;
    width: 631px;
    height: 295px;
    left:-460px;
    top: calc(50% - 295px/2 + 174.6px);
}

.bottom-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.bottom-border {
    position: absolute;
    left: -3%;
    top: 10px;
    bottom: -1.55%;
    border: 1px solid #424242;
    width: 640px;
    height: 300px;
}

.side-text {
    position: absolute;
    width: 30px;
    height: 526px;
    right: -42px;
    font-family: 'Roboto', sans-serif;
    font-size: 60px;
    color: #5c8279;
    writing-mode: vertical-rl;
    transform: rotate(180deg);
}

/* 반응형 스타일 */
@media (max-width: 1440px) {
    .third-part {
        padding: 0 50px 100px;
    }
    
    .third-part-container {
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }
    
    .third-part-right {
        width: 100%;
    }
    
    .top-image,
    .bottom-image {
        position: relative;
        width: 100%;
        left: 0;
        top: 0;
    }
}

@media (max-width: 768px) {
    .main-title {
        font-size: 30px;
        line-height: 45px;
    }
    
    .side-text {
        display: none;
    }
}

        .section4 {
            padding: 50px 0;
            position: relative;
            margin-top: 100px;
        }

        .hover_content:last-child {
            margin-bottom: 0;
        }

        .bh-flex-row-r {
            flex-direction: row-reverse;
        }

        .sec4_left {
            width: 50%;
            padding: 50px;
            background-color: #003125;
            position: relative; /* inner line을 위한 position 설정 */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .sec4_left::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .sec4_right {
            width: 50%;
            position: relative;
            overflow: hidden;
        }

        .inner_text {
            color: #fff;
            position: relative; /* inner line 위에 표시되도록 */
            z-index: 1;
        }

        .inner_text h3 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .inner_text p {
            font-size: 15px;
            opacity: 0.8;
        }

        .sec4_img_wrap {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .sec4_img_wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .hover_overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .border_effect {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid #fff;
            opacity: 0;
            transition: all 0.5s ease;
        }

        .sec4_view_more {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-decoration: none;
            padding: 5px 25px;
            border: 1px solid #fff;
            opacity: 0;
            z-index: 2;
            transition: all 0.5s ease;
        }

        /* Hover Effects */
        .sec4_img_wrap:hover img {
            transform: scale(1.05);
            filter: blur(3px);
        }

        .sec4_img_wrap:hover .hover_overlay,
        .sec4_img_wrap:hover .sec4_view_more {
            opacity: 1;
        }

        .sec4_view_more:hover {
            background-color: #007a5d;
            border-color: #007a5d;
        }

        /* Fourth Part Section Style */
.fourth-part {
    width: 100%;
    max-width: 1920px;
    margin: 0 auto;
    padding: 0;
}

.fourth-part-container {
    width: 100%;
    margin: 0 auto;
}

.service-row {
    display: flex;
    width: 100%;
    height: 346px;
}

.service-row.reverse {
    flex-direction: row-reverse;
}

/* Text Content */
.service-text {
    position: relative;
    width: 50%;
    height: 100%;
    background: #003125;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 124.6px 270px;
    gap: 10px;
}

.service-text h3 {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 30px;
    line-height: 48px;
    color: #FFFFFF;
    text-align: center;
}

.service-text p {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 29px;
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
}

.text-border {
    position: absolute;
    width: calc(100% - 40px);
    height: calc(100% - 40px);
    left: 20px;
    top: 20px;
    border: 1px solid #FFFFFF;
}

/* Image Content */
.service-image {
    position: relative;
    width: 50%;
    height: 100%;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: all 0.5s ease;
}

.view-more4 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #FFFFFF;
    text-decoration: none;
    padding: 10px 30px;
    border: 1px solid #FFFFFF;
    opacity: 0;
    transition: all 0.5s ease;
    height: 40px;
    text-align: center;
}

/* Hover Effects */
.service-image:hover img {
    transform: scale(1.05);
}

.service-image:hover .image-overlay,
.service-image:hover .view-more {
    opacity: 1;
}

/* 반응형 */
@media (max-width: 1200px) {
    .service-text {
        padding: 60px 40px;
    }
}

@media (max-width: 768px) {
    .service-row,
    .service-row.reverse {
        flex-direction: column;
        height: auto;
    }

    .service-text,
    .service-image {
        width: 100%;
        height: 300px;
    }

    .service-text {
        padding: 40px 20px;
    }

    .service-text h3 {
        font-size: 24px;
        line-height: 36px;
    }

    .service-text p {
        font-size: 16px;
        line-height: 24px;
    }
}

        .connect_us_wrap {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .connect_title {
            text-align: center;
            margin-bottom: 60px;
        }

        .connect_subtitle {
            color: #007a5d;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        .connect_subtitle::before,
        .connect_subtitle::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 50px;
            height: 1px;
            background: #007a5d;
        }

        .connect_subtitle::before {
            right: calc(100% + 20px);
        }

        .connect_subtitle::after {
            left: calc(100% + 20px);
        }

        .connect_title h3 {
            font-size: 30px;
            line-height: 1.3;
            color: #333;
        }

        .connect_grid {
            display: flex;
            gap: 30px;
            position: relative;
            z-index: 1;
            margin-top: 50px;
        }

        .connect_grid_item {
            flex: 1;
            position: relative;
            overflow: hidden;   /* 추가: 흰색 박스가 넘치지 않도록 */
        }

        .connect_grid_item:hover {
            transform: translateY(-10px);
        }

        .connect_image {
            position: relative;
            height: 400px;    /* 높이 고정 */
        }

        .connect_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .connect_info {
            position: absolute;
            right: 0;
            bottom: -60px;
            background: #fff;
            padding: 30px;
            transition: all 0.5s ease;
        }


        .info_title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .info_desc {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        .info_link {
            display: inline-block;
            color: #007a5d;
            font-size: 14px;
            opacity: 0;    /* 초기에는 숨김 */
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .connect_grid_item:hover .connect_info {
            bottom: 0;    /* 호버 시 위로 올라옴 */
        }

        .connect_grid_item:hover .info_link {
            opacity: 1;
            transform: translateY(0);
        }

        .info_link:hover {
            color: #005c46;
        }

        .info_link i {
            margin-left: 5px;
            font-size: 18px;
        }

        .connect_watermark {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 150px;
            color: rgba(0, 0, 0, 0.03);
            white-space: nowrap;
            z-index: 0;
        }

        .s_txt p {
            position: relative;
            width: 460.39px;
            height: 32px;
            margin: 30px 0 0 15px;
            font-family: 'Roboto', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 17px;
            line-height: 32px;
            display: flex;
            align-items: center;
            color: #FFFFFF;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
        }

/* Last Part Section Style */
.last-part {
    width: 100%;
    max-width: 1920px;
    margin: 0 auto;
    padding: 0 360px;
    height: 899.59px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.last-part-container {
    width: 100%;
    max-width: 1200px;
    height: 100%;
    position: relative;
}

/* Title Area */
.title-area {
    text-align: center;
    padding-top: 100px;
}

.title-line-wrap {
    gap: 15px;
    margin-bottom: 20px;
    margin-left: 36px;
}

.title-line {
    width: 60px;
    height: 1px;
    background: #CCE4DF;
}

.sub-title {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    letter-spacing: 3.2px;
    color: #007A5D;
}

.main-title {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size: 40px;
    line-height: 64px;
    text-align: center;
    color: #424242;
    margin-top: 30px;
}

/* Info Cards */
.info-card-wrap {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin-top: 60px;
    position: relative;
}

.info-card-wrap::after {
    content: '';
    position: absolute;
    top: -340px;
    bottom: 0;
    width: 1px;
    background: #ddd;
    height: 890px;
    margin-left: 410px;
}

.info-card::before,
.info-card::after {
    content: '';
    position: absolute;
    top: -340px;
    bottom: 0;
    width: 1px;
    background: #ddd;
    height: 890px;
}

.info-card-wrap::before {
    left: calc(33.33% - 15px);
}

.info-card-wrap::after {
    left: calc(66.66% - 15px);
}

.info-card {
    width: 370px;
    position: relative;
    transition: transform 0.3s ease;
}

.card-img {
    width: 100%;
    height: 374px;
    overflow: hidden;
}

.card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.card-text {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 310px;
    background: #FFFFFF;
    padding: 30px 25px;
    height: 119.5px; /* 기본 높이 */
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    gap: 4.5px;
}

.view-more-link {
    display: flex;
    align-items: center;
    gap: 5px;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    color: #007A5D;
    margin-top: 15px;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
    text-decoration: none;
}

/* Hover Effects */
.info-card:hover .card-text {
    height: 171.4px; /* 호버 시 높이 증가 */
}

.info-card:hover .view-more-link {
    opacity: 1;
    transform: translateY(0);
}

.info-card:hover .view-more-link i {
    transform: translateX(5px);
}

.view-more-link i {
    color: #99CABE;
    font-size: 20px;
    transition: transform 0.3s ease;
}

.card-text h4 {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 20px;
    line-height: 32px;
    color: #424242;
    margin-bottom: 4.5px;
}

.card-text p {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 22px;
    color: #757575;
}

/* Bottom Image */
.bottom-text {
    position: absolute;
    width: 1425px;
    left: -113px;
    bottom: 0;
}

.bottom-img {
    width: 100%;
    height: 192px;
    object-fit: contain;
}

/* Hover Effects */
.info-card:hover {
    transform: translateY(-10px);
}

.info-card:hover .card-img img {
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 1440px) {
    .last-part {
        padding: 0 50px;
    }

    .info-card-wrap {
        flex-direction: column;
        align-items: center;
    }

    .info-card {
        width: 100%;
        max-width: 500px;
    }

    .bottom-text {
        width: 100%;
        left: 0;
    }
}

@media (max-width: 768px) {
    .last-part {
        height: auto;
        padding: 50px 20px;
    }

    .main-title {
        font-size: 30px;
        line-height: 45px;
    }

    .card-text {
        width: 90%;
    }
}
    </style>
</head>

<?php include './inc/header.php'; ?>
<body>
    <!-- Main Slider -->
    <div class="slider_wrap">
        <div class="swiper-main">
            <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image: url('images/main/main1.jpg')">
                    <div class="slider_content_wrap">
                        <div class="slider_content">
                            <div class="s_txt">
                                <div class="ds-f ai-c">
                                    <p class="quality-text">HIGH QUALITY COSMETIC</p>
                                    <div class="line"></div>
                                </div>
                                <h3>기업명 COSMETIC</h3>
                                <p>고객의 니즈에 맞는 화장품 연구, 개발에 심혈을 기울입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('images/main/main2.jpg')">
                    <div class="slider_content_wrap">
                        <div class="slider_content">
                            <div class="s_txt">
                                <div class="ds-f ai-c">
                                    <p class="quality-text">HIGH QUALITY COSMETIC</p>
                                    <div class="line"></div>
                                </div>
                                <h3>기업명 COSMETIC</h3>
                                <p>고객의 니즈에 맞는 화장품 연구, 개발에 심혈을 기울입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('images/main/main3.jpg')">
                    <div class="slider_content_wrap">
                        <div class="slider_content">
                            <div class="s_txt">
                                <div class="ds-f ai-c">
                                    <p class="quality-text">HIGH QUALITY COSMETIC</p>
                                    <div class="line"></div>
                                </div>
                                <h3>기업명 COSMETIC</h3>
                                <p>고객의 니즈에 맞는 화장품 연구, 개발에 심혈을 기울입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('images/main/main4.jpg')">
                    <div class="slider_content_wrap">
                        <div class="slider_content">
                            <div class="s_txt">
                                <div class="ds-f ai-c">
                                    <p class="quality-text">HIGH QUALITY COSMETIC</p>
                                    <div class="line"></div>
                                </div>
                                <h3>기업명 COSMETIC</h3>
                                <p>고객의 니즈에 맞는 화장품 연구, 개발에 심혈을 기울입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('images/main/main5.jpg')">
                    <div class="slider_content_wrap">
                        <div class="slider_content">
                            <div class="s_txt">
                                <div class="ds-f ai-c">
                                    <p class="quality-text">HIGH QUALITY COSMETIC</p>
                                    <div class="line"></div>
                                </div>
                                <h3>기업명 COSMETIC</h3>
                                <p>고객의 니즈에 맞는 화장품 연구, 개발에 심혈을 기울입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="time_line">
                <div class="bar"></div>
            </div>
            <div class="controll">
                <div class="play_btn">
                    <i class="ri-pause-line pause"></i>
                    <i class="ri-play-line play" style="display: none;"></i>
                </div>
                <div class="numbering">
                    <span class="current">1</span>
                    <span class="separator">/</span>
                    <span class="total">5</span>
                </div>
            </div>
    </div>


    <section id="first-part" class="first-part">
        <div class="first-part-container">
            <div class="first-part-top">
                <div class="first-part-row">
                    <span class="first-part-line-left"></span>
                    <div class="first-part-text">
                        <h2>HIGH</h2>
                    </div>
                    <div class="first-part-image">
                        <img src="images/main/main3.jpg" alt="이미지">
                    </div>
                    <div class="first-part-text">
                        <h2>QUALITY</h2>
                    </div>
                </div>
            </div>
            <div class="first-part-bottom">
                <div class="first-part-row">
                    <div class="first-part-text">
                        <h2>기업명 COSMETIC</h2>
                    </div>
                    <div class="first-part-image">
                        <img src="images/main/main4.jpg" alt="이미지">
                    </div>
                    <span class="first-part-line-right"></span>
                </div>
            </div>
        </div>
    </section>

    <section id="second-part" class="second-part">
        <div class="second-part-container second-part-item">
            <div class="second-part-title second-part-item">
                <div class="title-line-wrap second-part-item">
                    <span class="title-line second-part-item"></span>
                    <h2 class="title-text second-part-item">WORLD WIDE COSMETIC</h2>
                    <span class="title-line second-part-item"></span>
                </div>
                <h3 class="main-title">
                    꾸준한 성장을 통해<br>
                    세계로 뻗어나가는 ㈜기업명코스메틱
                </h3>
            </div>

            <div class="second-part-content">
                <div class="content-item">
                <div class="content-overlay"></div>
                    <div class="content-img">
                        <img src="images/main/care1.jpg" alt="기초케어">
                        <div class="content-border"></div>
                    </div>
                    <div class="content-text">
                        <span class="eng-text">Skin Care</span>
                        <h4>기초케어</h4>
                        <span class="view-more">View More <i class="ri-arrow-right-line"></i></span>
                    </div>
                </div>

                <div class="content-item">
                <div class="content-overlay"></div>
                    <div class="content-img">
                        <img src="images/main/care2.jpg" alt="헤어케어">
                        <div class="content-border"></div>
                    </div>
                    <div class="content-text">
                        <span class="eng-text">Hair Care</span>
                        <h4>헤어케어</h4>
                        <span class="view-more">View More <i class="ri-arrow-right-line"></i></span>
                    </div>
                </div>

                <div class="content-item">
                <div class="content-overlay"></div>
                    <div class="content-img">
                        <img src="images/main/care3.jpg" alt="바디/핸드케어">
                        <div class="content-border"></div>
                    </div>
                    <div class="content-text">
                        <span class="eng-text">Body/Hand Care</span>
                        <h4>바디/핸드케어</h4>
                        <span class="view-more">View More <i class="ri-arrow-right-line"></i></span>
                    </div>
                </div>
            </div>

            <img src="images/main/point.png" alt="point" class="point-img">
        </div>
    </section>

    <section id="third-part" class="third-part">
        <div class="third-part-bg"></div>
        <div class="third-part-container">
            <div class="third-part-left">
                <div class="title-wrap">
                    <p class="sub-title">WORLD WIDE COSMETIC</p>
                    <span class="title-line"></span>
                </div>
                <h3 class="main-title2">
                    소비자가 만족하는 제품을<br>
                    생산하기 위해<br>
                    끊임없이 노력합니다.
                </h3>
                <a href="#" class="view-more-btn">View More</a>
            </div>
            
            <div class="third-part-right">
                <div class="top-image">
                    <img src="images/main/lab1.jpg" alt="이미지">
                </div>
                <div class="bottom-image">
                    <img src="images/main/lab2.jpg" alt="이미지">
                    <div class="bottom-border"></div>
                </div>
                <div class="side-text">기업명 COSMETIC</div>
            </div>
        </div>
    </section>
    
    <section id="fourth-part" class="fourth-part">
        <div class="fourth-part-container">
            <div class="service-row">
                <div class="service-text">
                    <h3>OEM/ODM</h3>
                    <p>고객사가 만족할 수 있는 OEM/ODM 서비스를 제공합니다.</p>
                    <div class="text-border"></div>
                </div>
                <div class="service-image">
                    <img src="images/main/sec4_1.jpg" alt="OEM/ODM">
                    <div class="image-overlay"></div>
                    <a href="#" class="view-more view-more4">View More</a>
                </div>
            </div>

            <div class="service-row reverse">
            <div class="service-text">
                    <h3>개발 품목</h3>
                    <p>스킨, 헤어, 바디 등 최상 품질의 제품을 개발합니다.</p>
                    <div class="text-border"></div>
                </div>
                <div class="service-image">
                    <img src="images/main/sec4_2.jpg" alt="개발 품목">
                    <div class="image-overlay"></div>
                    <a href="#" class="view-more view-more4">View More</a>
                </div>
            </div>

            <div class="service-row">
                <div class="service-text">
                    <h3>R&D</h3>
                    <p>수년간 쌓아온 연구 경험으로 경쟁력있는 제품을 제공합니다.</p>
                    <div class="text-border"></div>
                </div>
                <div class="service-image">
                    <img src="images/main/sec4_1.jpg" alt="R&D">
                    <div class="image-overlay"></div>
                    <a href="#" class="view-more view-more4">View More</a>
                </div>
            </div>
        </div>
    </section>

    <section id="last-part" class="last-part">
        <div class="last-part-container">
            <div class="title-area">
                <div class="title-line-wrap last-part-item">
                    <span class="title-line"></span>
                    <p class="sub-title">WORLD WIDE COSMETIC</p>
                    <span class="title-line"></span>
                </div>
                <h3 class="main-title last-part-item">
                    ㈜기업명에<br>
                    더 궁금하신 점이 있으신가요?
                </h3>
            </div>

            <div class="info-card-wrap last-part-item">
                <div class="info-card">
                    <div class="card-img">
                        <img src="images/main/sec5_1.jpg" alt="브랜드">
                    </div>
                    <div class="card-text">
                        <h4>브랜드</h4>
                        <p>㈜기업명코스메틱의 브랜드를 소개합니다.</p>
                        <a href="#" class="view-more-link">
                            View More
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <div class="info-card last-part-item">
                    <div class="card-img">
                        <img src="images/main/sec5_2.jpg" alt="오시는 길">
                    </div>
                    <div class="card-text">
                        <h4>오시는 길</h4>
                        <p>㈜기업명코스메틱으로 오시는 길을 안내합니다.</p>
                        <a href="#" class="view-more-link">
                            View More
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <div class="info-card last-part-item">
                    <div class="card-img">
                        <img src="images/main/sec5_3.jpg" alt="문의하기">
                    </div>
                    <div class="card-text">
                        <h4>문의하기</h4>
                        <p>문의 주시면 친절하고 빠르게 답변드리겠습니다.</p>
                        <a href="#" class="view-more-link">
                            View More
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="bottom-text">
                <img src="images/main/sec5_img4.png" alt="기업명 COSMETIC" class="bottom-img">
            </div>
        </div>
    </section>

    <?php include './inc/footer.php'; ?>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>

document.addEventListener('DOMContentLoaded', () => {
   const observerOptions = {
       root: null,
       rootMargin: '0px',
       threshold: 0.2
   };

   const observer = new IntersectionObserver((entries) => {
       entries.forEach(entry => {
           if (entry.isIntersecting) {
               // 1. first-part-row
               if(entry.target.classList.contains('first-part-row')) {
                   entry.target.style.animation = 'slideInLeft 1s ease forwards';
               }
               
               // 2. first-part-bottom 
               if(entry.target.classList.contains('first-part-bottom')) {
                   entry.target.style.animation = 'slideInRight 1s ease forwards';
               }
               
               // 3. second-part elements
               if(entry.target.classList.contains('second-part-item')) {
                   entry.target.style.animation = 'slideInUp 1s ease forwards';
               }
               
               // 4,5,6. third-part elements
               if(entry.target.classList.contains('third-part-left')) {
                   entry.target.style.animation = 'slideInLeft 1s ease forwards';
               }
               if(entry.target.classList.contains('third-part-right')) {
                   entry.target.style.animation = 'slideInRight 1s ease forwards 0.5s';
               }
               if(entry.target.classList.contains('bottom-image')) {
                   entry.target.style.animation = 'slideInLeft 1s ease forwards 1s';
               }
               
               // 8. last-part elements
               if(entry.target.classList.contains('last-part-item')) {
                   entry.target.style.animation = 'slideInUp 1s ease forwards';
               }
           }
       });
   }, observerOptions);

   // Add animation classes 
   document.querySelectorAll('.first-part-row, .first-part-bottom, .second-part-item, .third-part-left, .third-part-right, .bottom-image, .last-part-item').forEach(el => {
       el.style.opacity = '0';
       observer.observe(el);
   });
});

// Animation keyframes
const styles = document.createElement('style');
styles.textContent = `
   @keyframes slideInLeft {
       from {
           opacity: 0;
           transform: translateX(-100px);
       }
       to {
           opacity: 1;
           transform: translateX(0);
       }
   }
   
   @keyframes slideInRight {
       from {
           opacity: 0;
           transform: translateX(100px);
       }
       to {
           opacity: 1;
           transform: translateX(0);
       }
   }
   
   @keyframes slideInUp {
       from {
           opacity: 0;
           transform: translateY(50px);
       }
       to {
           opacity: 1;
           transform: translateY(0);
       }
   }
   
   .service-text:hover + .service-image .view-more,
   .service-text:hover + .service-image .image-overlay {
       opacity: 1;
   }
`;
document.head.appendChild(styles);
        document.addEventListener('DOMContentLoaded', function() {
            // Header Scroll Effect
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.header_wrap');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Initialize Swiper
            const progressBar = document.querySelector(".bar");
            const swiperMain = new Swiper('.swiper-main', {
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                speed: 500,
                loop: true,
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        progressBar.style.setProperty("--progress", (1 - progress) * 100 + "%");
                    },
                    slideChange: function() {
                        updateSlideNumber(this.realIndex + 1);
                    }
                }
            });

            // Play/Pause Controls
            const playBtn = document.querySelector('.play_btn');
            const pauseIcon = document.querySelector('.pause');
            const playIcon = document.querySelector('.play');

            playBtn.addEventListener('click', function() {
                if (pauseIcon.style.display !== 'none') {
                    swiperMain.autoplay.stop();
                    pauseIcon.style.display = 'none';
                    playIcon.style.display = 'block';
                } else {
                    swiperMain.autoplay.start();
                    pauseIcon.style.display = 'block';
                    playIcon.style.display = 'none';
                }
            });

            // Update Slide Number
            function updateSlideNumber(current) {
                document.querySelector('.current').textContent = current;
            }

            // Set Total Slides
            document.querySelector('.total').textContent = 
                document.querySelectorAll('.swiper-slide:not(.swiper-slide-duplicate)').length;
        });

        // Intersection Observer for animations
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            const animateElements = document.querySelectorAll('.animate-in');
            animateElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>