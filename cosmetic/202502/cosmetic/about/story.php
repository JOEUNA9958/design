<!-- story.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story - 기업명</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css" rel="stylesheet">
    <style>
    /* 기존 스타일은 유지 */
    body {
        display: block;
        margin: 0;
    }

    .sub_banner_wrap {
        width: 100%;
        position: relative;
    }

    .sub_banner {
        width: 100%;
        height: 500px;
        background-size: 120% auto;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        animation: bannerMove 20s ease-in-out infinite;
        overflow: hidden;
    }

    @keyframes bannerMove {
        0% {
            background-position: center 0%;
        }
        50% {
            background-position: center 100%;
        }
        100% {
            background-position: center 0%;
        }
    }


    .sub_banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .sub_banner h2 {
        color: #fff;
        font-size: 45px;
        font-weight: 700;
        margin-bottom: -5px;
        position: relative;
        z-index: 1;
    }

    .sub_menu {
        display: flex;
        gap: 1px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.1);
        z-index: 1;
        height: 80px;
    }


    .sub_menu a {
        flex: 1;
        text-align: center;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 49 37 / 23%);
        transition: all 0.3s ease;
        font-size: 20px;
        position: relative;
    }
    
    .sub_menu a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #fff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .sub_menu a:hover::after,
    .sub_menu a.active::after {
        width: 100%;
    }

    .sub_menu a:hover,
    .sub_menu a.active {
        background: #003125;
    }

    .story-section1 {
        padding: 100px 0;
        max-width: 1810px;
        margin: 0 auto;
    }

.img-wrap {
   position: relative;
   padding: 50px 15px 0 0;
   width: 100%;
}

.col-4,
.col-8 {
   position: absolute;
   top: 0;
}

.col-4 {
   left: 0;
   width: 350px;
   top: 150px;
}

.col-8 {
    right: 0;
    width: 595px;
    height: 300px;
    top: -7%;
}

.col-4 img,
.col-8 img {
   width: 100%;
   height: 100%;
   object-fit: cover;
}

.img1 {
    max-width: 300px;
}

.img2-container {
   margin: 0 auto;
   width: 801px;
   height: 448px;
   position: relative;
   z-index: 1;
}


.img2 {
   width: 100%;
   height: 100%;
   object-fit: cover;
}
.rotate {
    position: absolute;
    writing-mode: vertical-rl;
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 90px;
    line-height: 128px;
    color: #003125;
}

.text1 {
    left: -10%;
    top: -50px;
}

.text2 {
    right: -10%;
    bottom: 2px;
    /* transform: rotate(180deg); */
}

.img3 {
    max-width: 400px;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.intro-text {
    width: 1011px;
   margin: 50px auto 0;
   font-family: 'Roboto';
   font-weight: 400;
   font-size: 15px;
   line-height: 29px;
   text-align: center;
   color: #424242;
}

/* Animation classes */
.animate-in {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

.animate-in.visible {
    opacity: 1;
    transform: translateY(0);
}


.story-section2 {
    position: relative;
    padding: 120px 0 100px 0;
    background: url(../images/about/story_img5.png) no-repeat center;
    background-size: cover;
    color: white;
    height: 400px;
}

.bg-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.1);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.info-logo {
    text-align: center;
    margin-bottom: 60px;
}

.info-logo img {
    max-width: 300px;
}

.info-cards {
    display: flex;
    gap: 30px;
    justify-content: center;
    flex-wrap: wrap;
}

.info-card {
    background: rgba(0, 71, 48, 0.95);
    padding: 30px;
    border-radius: 0 50px 0 0;
    min-width: 280px;
    flex: 1;
    position: relative;
}

.info-card::after {
    position: absolute;
    content: "";
    width: calc(100% - 20px);
    height: calc(100% - 20px);
    top: 10px;
    left: 10px;
    border: 1px solid transparent;
    border-radius: 0 50px 0 0;
    background-image: linear-gradient(#003125, #003125), linear-gradient(to right, #cce4df 0%, rgba(204, 228, 223, 0.1) 100%);
    background-origin: border-box;
    background-clip: content-box, border-box;
    pointer-events: none;
    z-index: 1;
}

.info-card > * {
    position: relative;
    z-index: 2;
}

.info-card h3 {
    color: white;
    font-size: 24px;
    margin-bottom: 30px;
    font-weight: 500;
    position: relative;
    z-index: 2;
}

.info-row {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 20px;
    position: relative;
    z-index: 2;
}

.info-row .title {
    color: rgba(255, 255, 255, 0.7);
    min-width: 70px;
    font-size: 16px;
}

.info-row .content {
    color: white;
    font-size: 16px;
}

.info-row.address {
    display: block;
}

.info-row.address .content {
    line-height: 1.8;
}

.info-card h3 {
    color: white;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 500;
}

.info-row {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.info-row:last-child {
    margin-bottom: 0;
}

.info-row .title {
    color: rgba(255, 255, 255, 0.7);
    min-width: 80px;
}

.info-row .content {
    color: white;
}

.info-row.address {
    display: block;
}

.info-row.address .content {
    line-height: 1.6;
}

/* Animation */
.animate-in {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

.animate-in.visible {
    opacity: 1;
    transform: translateY(0);
}


.story-section3 {
            padding: 100px 0;
            background: #fff;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline-wrap {
            height: 400px;
        }
        
        .timeline {
            position: relative;
            display: block;
            margin: 50px auto;
            height: 4px;
            background: #007a5d;
            list-style: none;
            padding: 0;
        }

        .timeline::before,
        .timeline::after {
            content: "";
            position: absolute;
            top: -8px;
            display: block;
            width: 0;
            height: 0;
            border-radius: 10px;
            border: 10px solid #007a5d;
        }

        .timeline::before {
            left: -5px;
        }

        .timeline::after {
            right: -10px;
            border: 10px solid transparent;
            border-right: 0;
            border-left: 20px solid #007a5d;
            border-radius: 3px;
        }

        .timeline li {
            position: relative;
            display: inline-block;
            float: left;
            width: 25%;
            font-size: 16px;
            height: 50px;
        }

        .timeline .year {
            position: absolute;
            top: -47px;
            left: 36%;
            color: #000;
            font-weight: 500;
        }

        .timeline .point {
            content: "";
            top: -4px;
            left: 43%;
            display: block;
            width: 6px;
            height: 6px;
            border: 4px solid #007a5d;
            border-radius: 10px;
            background: #fff;
            position: absolute;
            transition: all 0.3s;
        }

        .timeline .description {
            background-color: #f4f4f4;
            padding: 20px;
            margin-top: 20px;
            position: relative;
            font-weight: normal;
            z-index: 1;
            color: #666;
            width: 250px;
            left: 0;
            font-size: 14px;
        }

        .timeline .description::before {
            content: '';
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid #f4f4f4;
            position: absolute;
            top: -8px;
            left: 43%;
        }

        .timeline li:hover {
            cursor: pointer;
        }

        .timeline li:hover .point {
            background: #007a5d;
            transform: scale(1.2);
        }

        .timeline li:hover .description {
            display: block;
        }

        .timeline .description .month {
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .timeline .description p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .title2 {
            font-size: 30px;
            font-weight: 600;
        }
        @media (max-width: 768px) {
   .sub_banner {
       height: 300px;
   }

   .sub_banner h2 {
       font-size: 32px;
   }

   .sub_menu {
       flex-wrap: wrap;
   }

   .sub_menu a {
       padding: 15px 0;
       font-size: 14px;
   }

   .story-section1 {
       padding: 50px 0;
   }

   .img2-container {
       max-width: 100%;
       padding: 0 20px;
   }

   .rotate {
       font-size: 36px;
   }

   .text1 {
       left: -10px;
   }

   .text2 {
       right: -10px;
   }

   .intro-text {
       font-size: 16px;
       padding: 0 20px;
   }

   .story-section2 {
       height: auto;
       padding: 50px 0;
   }

   .info-cards {
       flex-direction: column;
       gap: 20px;
   }

   .info-card {
       min-width: auto;
       padding: 20px;
   }

   .story-section3 {
       padding: 50px 20px;
   }

   .timeline-wrap {
       height: auto;
       padding: 30px 0;
       overflow-x: auto;
   }

   .title2 {
       font-size: 24px;
       margin-bottom: 60px;
   }

   .timeline {
       min-width: 768px;
   }

   .timeline .description {
       width: 200px;
       font-size: 13px;
   }
}

@media (max-width: 480px) {
   .sub_banner h2 {
       font-size: 28px;
   }

   .rotate {
       font-size: 30px;
   }
}
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>About Us - 스토리</h2>
            <div class="sub_menu">
                <a href="/cosmetic/about/story.php" class="active">스토리</a>
                <a href="/cosmetic/about/ceo.php">CEO 인사말</a>
                <a href="/cosmetic/about/certification.php">인증서</a>
                <a href="/cosmetic/about/direct_inquiry.php">문의하기</a>
                <a href="/cosmetic/about/map.php">오시는 길</a>
            </div>
        </div>
    </div>


    <div class="story-section1">
        <div class="img-wrap lg-pt-50">
            <div class="row align-items-end lg-gutters-25">
                <div class="lg-col-auto col-12 text-center animate-in" data-anim-delay="0" data-anim-type="fade-in-up">
                    <div class="img2-container">
                        <img src="../images/about/story_img2.png" alt="D.Kin Products" class="img2">
                        <div class="rotate text1">기업명</div>
                        <div class="rotate text2">Cosmetic</div>
                    </div>
                    
                    <div class="lg-hidden mt-30">
                        <div class="row gutters-10">
                            <div class="col-4">
                                <img src="../images/about/story_img1.png" alt="D.Kin Facilities">
                            </div>
                            <div class="col-8">
                                <img src="../images/about/story_img3.png" alt="D.Kin Lab" class="h-100">
                            </div>
                        </div>
                    </div>

                    <div class="mt-50 lg-mb-30">
                        <div class="intro-text">
                            저희 ㈜기업명은 2015년 10월 설립된 OEM, ODM 전문 회사로, 지난 10여년 동안 꾸준한 성장을 통해 지속적으로 발전해 왔습니다.<br>
                            또한, 국내와 글로벌 시장의 화장품 트렌드를 정확히 이해하고 신속 대응하여 앞으로도 고객의 니즈에 맞는
                            최고 품질의 화장품을 제공해 드리기<br class="lg-block"> 위해 최선을 다할 것을 약속드립니다. 감사합니다.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="story-section2">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="info-logo">
                <img src="../images/about/logo.png" alt="D.kin Cosmetic">
            </div>
            <div class="info-cards">
                <div class="info-card animate-in" data-anim-delay="300">
                    <h3>Manager</h3>
                    <div class="info-row">
                        <span class="title">CEO</span>
                        <span class="content">대 표 자</span>
                    </div>
                    <div class="info-row">
                        <span class="title">Director</span>
                        <span class="content">디 렉 터</span>
                    </div>
                </div>

                <div class="info-card animate-in" data-anim-delay="600">
                    <h3>Contact us</h3>
                    <div class="info-row">
                        <span class="title">Tel</span>
                        <span class="content">000-000-0000</span>
                    </div>
                    <div class="info-row">
                        <span class="title">Fax</span>
                        <span class="content">000-000-0000</span>
                    </div>
                </div>

                <div class="info-card animate-in" data-anim-delay="900">
                    <h3>Address</h3>
                    <div class="info-row address">
                        <span class="content">
                            152, Neungheodae-ro 625beon-gil,<br>
                            Namdong-gu, Incheon, Republic of Korea
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="story-section3">
        <div class="timeline-wrap">
            <h2 class="title2">회사연혁</h2>
            <ol class="timeline">
                <li>
                    <p class="year">2024</p>
                    <span class="point"></span>
                    <div class="description">
                        <p class="month">01월</p>
                        <p>신사옥 이전</p>
                        <p>피플앤코 OEM/ODM 계약</p>
                        <p class="month">04월</p>
                        <p>셀인샷 OEM/ODM 계약</p>
                        <p>다슈코리아 OEM/ODM 계약</p>
                        <p class="month">06월</p>
                        <p>weVegan 인증 획득</p>
                    </div>
                </li>
                <li>
                    <p class="year">2023</p>
                    <span class="point"></span>
                    <div class="description">
                        <p class="month">01월</p>
                        <p>아잉아나.변자년 OEM/ODM 계약</p>
                        <p class="month">03월</p>
                        <p>지로인터내셔널 OEM/ODM 계약</p>
                        <p class="month">07월</p>
                        <p>탈모 기능성 획득(헤어토닉)</p>
                        <p class="month">11월</p>
                        <p>테라프릭스(킨더휠) OEM/ODM 계약</p>
                    </div>
                </li>
                <li>
                    <p class="year">2022</p>
                    <span class="point"></span>
                    <div class="description">
                        <p class="month">06월</p>
                        <p>(주)아타 OEM/ODM 계약</p>
                        <p>(브랜드명 : 아타)</p>
                    </div>
                </li>
                <li>
                    <p class="year">2021</p>
                    <span class="point"></span>
                    <div class="description">
                        <p class="month">01월</p>
                        <p>큐오디코리아 OEM/ODM 계약</p>
                        <p>(브랜드명 : 에이르브)</p>
                        <p class="month">03월</p>
                        <p>기업부설연구소 인증 획득</p>
                        <p class="month">07월</p>
                        <p>EVE VEGAN 인증 획득</p>
                        <p class="month">11월</p>
                        <p>사명 변경 미셀코리아 → (주)디킨코스메틱</p>
                        <p class="month">12월</p>
                        <p>여드름 기능성 획득</p>
                    </div>
                </li>
            </ol>
        </div>
    </div>


    <?php include '../inc/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
<script>

document.addEventListener('DOMContentLoaded', () => {
   // 관찰할 요소들 선택
   const elements = {
       imgContainer: document.querySelector('.img2-container'),
       colEight: document.querySelector('.col-8'),
       colFour: document.querySelector('.col-4'),
       title: document.querySelector('.title2'),
       timeline: document.querySelector('.timeline')
   };

   // 관찰자 옵션
   const options = {
       root: null,
       rootMargin: '0px',
       threshold: 0.1
   };

   const observer = new IntersectionObserver((entries) => {
       entries.forEach(entry => {
           if (entry.isIntersecting) {
               // 요소별 등장 순서와 딜레이 설정
               const delays = {
                   'img2-container': 0,
                   'col-8': 300,
                   'col-4': 600,
                   'title2': 0,
                   'timeline': 300
               };

               // 요소가 가진 클래스명 찾기
               const elementClass = Array.from(entry.target.classList)[0];
               
               // 애니메이션 적용
               entry.target.style.cssText = `
                   animation: slideUp 1s ease forwards;
                   animation-delay: ${delays[elementClass]}ms;
               `;
               
               // 관찰 중단
               observer.unobserve(entry.target);
           }
       });
   }, options);

   // 스타일 추가
   const style = document.createElement('style');
   style.textContent = `
       .img2-container, .col-8, .col-4, .title2, .timeline {
           opacity: 0;
           transform: translateY(50px);
       }
       
       @keyframes slideUp {
           to {
               opacity: 1;
               transform: translateY(0);
           }
       }
   `;
   document.head.appendChild(style);

   // 요소 관찰 시작
   Object.values(elements).forEach(element => {
       if(element) observer.observe(element);
   });
});
// Animation on scroll
document.addEventListener('DOMContentLoaded', function() {
    const animateElements = document.querySelectorAll('.animate-in');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // Add delay if specified
                const delay = entry.target.dataset.animDelay || 0;
                if (delay > 0) {
                    entry.target.style.transitionDelay = `${delay}ms`;
                }
            }
        });
    }, {
        threshold: 0.1
    });
    
    animateElements.forEach(element => {
        observer.observe(element);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const timelineYears = document.querySelectorAll('.dk-timeline__year');
    const prevBtn = document.querySelector('.dk-timeline__btn--prev');
    const nextBtn = document.querySelector('.dk-timeline__btn--next');
    let currentIndex = 0;

    // 연도 클릭 이벤트
    timelineYears.forEach((year, index) => {
        year.addEventListener('click', () => {
            updateTimeline(index);
        });
    });

    // 네비게이션 버튼 이벤트
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + timelineYears.length) % timelineYears.length;
        updateTimeline(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % timelineYears.length;
        updateTimeline(currentIndex);
    });

    function updateTimeline(index) {
        timelineYears.forEach((year, i) => {
            year.classList.toggle('active', i === index);
        });
        
        // 여기에 컨텐츠 업데이트 로직 추가
    }
});

// Swiper 초기화
const historySwiper = new Swiper('.historySwiper', {
            slidesPerView: 1,
            speed: 500,
            allowTouchMove: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init: function() {
                    updateTimeline(this.activeIndex);
                },
                slideChange: function() {
                    updateTimeline(this.activeIndex);
                }
            }
});

function updateTimeline(index) {
            const points = document.querySelectorAll('.point');
            const years = document.querySelectorAll('.year');
            const line = document.querySelector('.line');
            const totalPoints = points.length - 1;
            
            points.forEach((point, i) => {
                point.classList.toggle('active', i === index);
            });
            
            years.forEach((year, i) => {
                year.classList.toggle('active', i === index);
            });
            
            const percentage = ((totalPoints - index) / totalPoints) * 100;
            line.style.width = `${percentage}%`;
}
</script>
</body>
</html>