<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>인증서 - M&COS</title>

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
        <h2>COMPANY</h2>
        <p>고객사의 꿈과 비전을 함께 이루는 엠앤코스</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item">
                <a href="../company/about.php"><span>회사소개</span></a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="../company/history.php"><span>연혁</span></a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="../company/ceo.php"><span>CEO<br>인사말</span></a>
            </div>
            <div class="sub-visual-menu-item active">
                <a href="../company/certification.php"><span>인증서</span></a>
            </div>
        </div>
    </div>

    <div class="company-certification-content">
        <div class="company-certification-title">
            <h2>Certification</h2>
            <p>우수성을 향한 끊임없는 노력과 고객을 위한 최고의 제품을 만들기 위한 지속적인 추구</p>
        </div>

        <div class="company-certification-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="company-certification-item">
                            <div class="company-certification-image">
                                <img src="../images/company/cert1.jpg" alt="연구개발전담부서 인정서">
                            </div>
                            <div class="company-certification-item-title">연구개발전담부서 인정서</div>
                            <div class="company-certification-item-org">한국산업기술진흥협회</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="company-certification-item">
                            <div class="company-certification-image">
                                <img src="../images/company/cert2.jpg" alt="ISO 9001:2015">
                            </div>
                            <div class="company-certification-item-title">ISO 9001:2015</div>
                            <div class="company-certification-item-org">NTREE</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="company-certification-item">
                            <div class="company-certification-image">
                                <img src="../images/company/cert3.jpg" alt="ISO 14001:2015">
                            </div>
                            <div class="company-certification-item-title">ISO 14001:2015</div>
                            <div class="company-certification-item-org">NTREE</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="company-certification-item">
                            <div class="company-certification-image">
                                <img src="../images/company/cert1.jpg" alt="중소기업 확인서">
                            </div>
                            <div class="company-certification-item-title">중소기업 확인서</div>
                            <div class="company-certification-item-org">중소벤처기업부</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company-certification-navigation">
                <button class="company-certification-nav-button prev" id="prevBtn"></button>
                <div class="company-certification-page-info">
                    <span class="current">01</span> / <span class="total">05</span>
                </div>
                <button class="company-certification-nav-button next" id="nextBtn"></button>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.company-certification-nav-button.next',
                prevEl: '.company-certification-nav-button.prev',
            },
            on: {
                slideChange: function () {
                    document.querySelector('.current').textContent = 
                        String(this.realIndex + 1).padStart(2, '0');
                }
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        });
    </script>
</body>
</html>