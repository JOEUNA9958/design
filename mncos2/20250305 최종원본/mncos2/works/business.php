<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사업분야 - M&COS</title>
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>WORKS</h2>
        <p>엠앤코스는 다양한 품목들을 생산하고 있습니다.</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item active">
                <a href="./business.php">사업분야</a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="./oem.php">OEM/ODM</a>
            </div>
        </div>
    </div>

    <div class="works-business-content">
        <div class="works-business-title">
            <h2>OUR WORKS</h2>
            <p>다양한 프로젝트와 풍부한 경험으로 좋은 화장품을 제조합니다</p>
        </div>

        <div class="works-business-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../images/works/works_ban01.jpg" alt="사업분야 1">
                        <!-- 모바일용 텍스트 -->
                        <div class="works-business-info mobile">
                            <h3>헤어케어</h3>
                            <p class="works-business-category">
                                탈모증상완화 기능성 삼푸, 트닉, 앰플, 스타일링 포마드, 토닉, 헤어팩
                            </p>
                            <p class="works-business-desc">
                                엠앤코스의 헤어케어 제품은 순상된 모발을 회복하고 건강하게 유지하는데 중점을 둡니다. 저희 제품 라인은 삼푸, 컨디셔너, 트리트먼트 등을 포함하여 다양한 모발 유형과 필요에 맞춘 맞춤형 솔루션을 제공합니다. 각 제품은 모발의 영양 공급과 보호를 위해 최적의 성분을 사용하여, 고객이 원하는 건강하고 아름다운 머릿결을 유지할 수 있도록 돕습니다.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="../images/works/works_ban05.jpg" alt="사업분야 2">
                        <!-- 모바일용 텍스트 -->
                        <div class="works-business-info mobile">
                            <h3>헤어케어2</h3>
                            <p class="works-business-category">
                                탈모증상완화 기능성 삼푸, 트닉, 앰플, 스타일링 포마드, 토닉, 헤어팩
                            </p>
                            <p class="works-business-desc">
                                엠앤코스의 헤어케어 제품은 순상된 모발을 회복하고 건강하게 유지하는데 중점을 둡니다. 저희 제품 라인은 삼푸, 컨디셔너, 트리트먼트 등을 포함하여 다양한 모발 유형과 필요에 맞춘 맞춤형 솔루션을 제공합니다. 각 제품은 모발의 영양 공급과 보호를 위해 최적의 성분을 사용하여, 고객이 원하는 건강하고 아름다운 머릿결을 유지할 수 있도록 돕습니다.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PC용 텍스트 영역 -->
        <div class="works-business-info pc"></div>

        <div class="works-business-navigation">
            <button class="works-business-nav-button prev">&lt;</button>
            <div class="works-business-page-info">
                <span class="current">01</span> / <span class="total">02</span>
            </div>
            <button class="works-business-nav-button next">&gt;</button>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        // Swiper 초기화 전에 모바일 체크
        function initSwiper() {
            if (window.innerWidth > 768) {
                const businessInfos = [
                    {
                        title: "헤어케어",
                        category: "탈모증상완화 기능성 삼푸, 트닉, 앰플, 스타일링 포마드, 토닉, 헤어팩",
                        desc: "엠앤코스의 헤어케어 제품은 순상된 모발을 회복하고 건강하게 유지하는데 중점을 둡니다..."
                    },
                    {
                        title: "헤어케어2",
                        category: "탈모증상완화 기능성 삼푸, 트닉, 앰플, 스타일링 포마드, 토닉, 헤어팩",
                        desc: "엠앤코스의 헤어케어 제품은 순상된 모발을 회복하고 건강하게 유지하는데 중점을 둡니다..."
                    },
                    // ... 나머지 슬라이드 정보들
                ];

                const swiper = new Swiper('.swiper', {
                    loop: true,
                    speed: 500,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: '.works-business-nav-button.next',
                        prevEl: '.works-business-nav-button.prev',
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    on: {
                        slideChange: function () {
                            const currentSlide = this.realIndex;
                            const info = businessInfos[currentSlide];
                            const pcInfo = document.querySelector('.works-business-info.pc');
                            
                            pcInfo.innerHTML = `
                                <h3>${info.title}</h3>
                                <p class="works-business-category">${info.category}</p>
                                <p class="works-business-desc">${info.desc}</p>
                            `;

                            document.querySelector('.current').textContent = 
                                String(currentSlide + 1).padStart(2, '0');
                        }
                    }
                });

                // 초기 텍스트 설정
                const pcInfo = document.querySelector('.works-business-info.pc');
                pcInfo.innerHTML = `
                    <h3>${businessInfos[0].title}</h3>
                    <p class="works-business-category">${businessInfos[0].category}</p>
                    <p class="works-business-desc">${businessInfos[0].desc}</p>
                `;
            }
        }

        // 초기 실행
        initSwiper();

        // 리사이즈 시 재실행
        window.addEventListener('resize', initSwiper);
    </script>
</body>
</html>