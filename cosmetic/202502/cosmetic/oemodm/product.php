<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>R&D</title>
  <style>
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
    .product-section {
        width: 100%;
        max-width: 1920px;
        margin: 0 auto;
    }

    .product-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 100px 0;
    }

    .product-subtitle {
        font-family: 'Roboto';
        font-weight: 600;
        font-size: 16px;
        line-height: 26px;
        color: #757575;
        margin-bottom: 20px;
    }

    .product-title {
        font-family: 'Roboto';
        font-weight: 600;
        font-size: 40px;
        line-height: 64px;
        color: #424242;
    }

    .product-content {
        position: relative;
        display: flex;
        padding: 0 360px 40px;
        isolation: isolate;
        height: 557px;
    }

    .product-bg {
        position: absolute;
        height: 362px;
        left: 0;
        right: 30%;
        bottom: 0;
        background: #CCE4DF;
        opacity: 0.3;
        z-index: 0;
    }

    .content-container {
        display: flex;
        width: 1200px;
        max-width: 1200px;
        z-index: 1;
    }

    .left-content {
        width: 801px;
        padding: 0 15px;
    }

    .main-image {
        width: 771px;
        height: 315px;
        margin-top: -64px;
        object-fit: cover;
    }

    .product-heading {
        font-family: 'Roboto';
        font-weight: 600;
        font-size: 80px;
        line-height: 128px;
        color: #003125;
        /* margin: 20px 0; */
        margin-top: -80px;
    }

    .product-desc {
        font-family: 'Roboto';
        font-weight: 400;
        font-size: 18px;
        line-height: 29px;
        color: #424242;
    }

    .right-content {
        width: 399px;
        position: relative;
    }

    .side-image {
        width: 369px;
        height: 467px;
        object-fit: cover;
    }

    .rotate-logo {
        position: absolute;
        width: 280px;
        height: 280px;
        right: -125px;
        bottom: 430px;
        animation: rotate 15s linear infinite;
        z-index: -1;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* 두 번째 섹션 스타일 */
    .product-detail-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin: 0 auto;
        position: relative;
        padding-bottom: 100px;
    }

.detail-bg-image {
    position: absolute;
    height: 579px;
    left: 0;
    width: 100%;
    right: 0;
    bottom: 50px;
    z-index: 0;
}

.detail-content {
    width: 1200px;
    max-width: 1200px;
    position: relative;
    z-index: 1;
}

.detail-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.detail-number {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 19.375px;
    line-height: 32px;
    color: #007A5D;
    margin-right: 20px;
}

.detail-title {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 40px;
    line-height: 64px;
    color: #003125;
}

.detail-image-wrap {
    position: relative;
    margin: 20px 0;
}

.detail-main-image {
    width: 1170px;
    height: 373px;
    object-fit: cover;
}

.side-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: absolute;
    right: -60px;
    bottom: -22px;
}

.side-number {
    font-family: 'Roboto';
    font-weight: 700;
    font-size: 13.89px;
    color: #757575;
    margin-bottom: 10px;
}

.side-divider {
    width: 1px;
    height: 64px;
    background: #E0E0E0;
    margin: 10px 0;
}

.side-text {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 14px;
    line-height: 22px;
    color: #757575;
    transform: rotate(-90deg);
    width: 59px;
}

.detail-desc {
    font-family: 'Roboto';
    font-weight: 400;
    font-size: 18px;
    line-height: 29px;
    color: #424242;
    margin: 20px 15px;
}

.circle-menu {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 50px;
}

.circle-item {
    width: 210px;
    height: 210px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #003125;
    border-radius: 50%;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
}

.circle-text {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 16px;
    line-height: 26px;
    color: #FFFFFF;
    text-align: center;
}
  </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>개발품목</h2>
            <div class="sub_menu">
                <a href="/cosmetic/oemodm/oem_odm.php">OEM/ODM</a>
                <a href="/cosmetic/oemodm/product.php" class="active">개발품목</a>
                <a href="/cosmetic/oemodm/rnd.php">R&D</a>
            </div>
        </div>
    </div>

    <div class="product-section">
        <div class="product-header">
            <div class="product-subtitle">Product</div>
            <div class="product-title">개발품목</div>
        </div>

        <div class="product-content">
            <div class="product-bg"></div>
            <div class="content-container">
                <div class="left-content">
                    <img src="../images/oemodm/left.jpg" alt="메인 이미지" class="main-image">
                    <h2 class="product-heading">Product</h2>
                    <p class="product-desc">㈜디킨코스메틱만의 경험과 노력으로 생산 가능한 품목입니다. 고객의 요구에 부응할 수 있는 최상의 품질로 고객사가 만족할 수 있는 소중한 제품을 만들겠습니다.</p>
                </div>
                <div class="right-content">
                    <img src="../images/oemodm/right.png" alt="사이드 이미지" class="side-image">
                    <img src="../images/main/point.png" alt="회전 로고" class="rotate-logo">
                </div>
            </div>
        </div>
    </div>

    <div class="product-detail-section">
    <img src="../images/about/story_img5.png" alt="배경 이미지" class="detail-bg-image">
    
    <div class="detail-content">
        <div class="detail-header">
            <span class="detail-number">01</span>
            <h2 class="detail-title">Hair Care</h2>
        </div>

        <div class="detail-image-wrap">
            <img src="../images/oemodm/section3-4.jpg" alt="헤어케어 제품" class="detail-main-image">
            <div class="side-content">
                <span class="side-number">01</span>
                <div class="side-divider"></div>
                <span class="side-text">Hair Care</span>
            </div>
        </div>

        <p class="detail-desc">
            전문 디자이너를 위한 프로페셔널 살롱 제품부터 기능성 화장품까지 고객이 필요한 제품군을 제공합니다.
        </p>

        <div class="circle-menu">
                <div class="circle-item">
                    <span class="circle-text">샴푸</span>
                </div>
                <div class="circle-item">
                    <span class="circle-text">헤어 컬러</span>
                </div>
                <div class="circle-item">
                    <span class="circle-text">크리닉</span>
                </div>
                <div class="circle-item">
                    <span class="circle-text">스타일링</span>
                </div>
                <div class="circle-item">
                    <span class="circle-text">펌제</span>
                </div>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 초기 상태 설정
    const elements = {
        mainImage: document.querySelector('.main-image'),
        sideImage: document.querySelector('.side-image'),
        productHeading: document.querySelector('.product-heading'),
        productDesc: document.querySelector('.product-desc'),
        detailHeader: document.querySelector('.detail-header'),
        detailMainImage: document.querySelector('.detail-main-image'),
        detailDesc: document.querySelector('.detail-desc'),
        circleItems: document.querySelectorAll('.circle-item')
    };

    // 초기 스타일 설정
    function setInitialStyles() {
        // 첫 번째 섹션 요소들
        elements.mainImage.style.cssText = 'opacity:0; transform:translateX(-100px); transition:all 1s ease;';
        elements.sideImage.style.cssText = 'opacity:0; transform:translateX(100px); transition:all 1s ease;';
        elements.productHeading.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
        elements.productDesc.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';

        // 두 번째 섹션 요소들
        elements.detailHeader.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
        elements.detailMainImage.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
        elements.detailDesc.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
        
        // 원형 메뉴 아이템들
        elements.circleItems.forEach(item => {
            item.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
        });
    }

    // 스크롤 애니메이션 처리
    function handleScroll() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;

        // 요소가 화면에 보이는지 확인하는 함수
        function isVisible(element) {
            if (!element) return false;
            const rect = element.getBoundingClientRect();
            return (rect.top <= windowHeight * 0.8);
        }

        // 첫 번째 섹션 애니메이션
        if (isVisible(elements.mainImage)) {
            elements.mainImage.style.cssText = 'opacity:1; transform:translateX(0); transition:all 1s ease;';
            setTimeout(() => {
                elements.sideImage.style.cssText = 'opacity:1; transform:translateX(0); transition:all 1s ease;';
            }, 300);
            setTimeout(() => {
                elements.productHeading.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
            }, 600);
            setTimeout(() => {
                elements.productDesc.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
            }, 900);
        }

        // 두 번째 섹션 애니메이션
        if (isVisible(elements.detailHeader)) {
            elements.detailHeader.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
            setTimeout(() => {
                elements.detailMainImage.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
            }, 300);
            setTimeout(() => {
                elements.detailDesc.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
            }, 600);

            // 원형 메뉴 순차 애니메이션
            elements.circleItems.forEach((item, index) => {
                setTimeout(() => {
                    item.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
                }, 900 + (index * 200));
            });
        }
    }

    // 초기 설정 적용
    setInitialStyles();

    // 스크롤 이벤트 리스너 등록
    window.addEventListener('scroll', handleScroll);
    
    // 초기 로드 시 한 번 실행
    setTimeout(handleScroll, 500);
});
</script>
</html>