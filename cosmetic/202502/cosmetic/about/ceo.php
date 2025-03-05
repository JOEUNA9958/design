<!-- ceo.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CEO 인사말</title>
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


.ceo-section1 {
    padding: 80px 0;
    max-width: 1200px;
    margin: 0 auto;
}

.ceo-header {
    text-align: center;
    margin-bottom: 60px;
}

.ceo-header__eng {
    display: block;
    font-size: 14px;
    color: #666;
    margin-bottom: 15px;
}

.ceo-header__title {
    font-size: 40px;
    font-weight: 600;
    color: #333;
}

.ceo-visual {
    position: relative;
    margin-top: 40px;
}

/* .ceo-visual__image {
    width: 100%;
    height: 500px;
    overflow: hidden;
} */

.ceo-visual__image {
   position: relative;
}

.ceo-visual__image::after {
   content: '';
   position: absolute;
   width: 250px;
   height: 250px;
   background: url('../images/main/point.png') no-repeat center/contain;
   right: -150px;
   top: -30%;
   transform: translateY(-50%);
   animation: rotate 15s linear infinite;
   z-index: -1;
}

@keyframes rotate {
   from { transform: rotate(0deg); }
   to { transform: rotate(360deg); }
}

.ceo-visual__image img {
    width: 100%;
    height: 80%;
    object-fit: cover;
}

.ceo-visual__text {
    position: absolute;
    left: 0;
    bottom: -80px;
    z-index: 1;
}

.greeting-text {
    font-size: 90px;
    font-weight: 700;
    color: #007a5d;
    line-height: 1;
    margin-bottom: 30px;
}

.greeting-desc {
    font-size: 15px;
    color: #333;
    line-height: 1.8;
    padding-left: 10px;
}

@media (max-width: 992px) {
    .ceo-section1 {
        padding: 60px 20px;
    }

    .ceo-visual__image {
        height: 400px;
    }

    .greeting-text {
        font-size: 60px;
    }

    .greeting-desc {
        font-size: 16px;
        br {
            display: none;
        }
    }
}

@media (max-width: 768px) {
    .ceo-header__title {
        font-size: 32px;
    }

    .ceo-visual__image {
        height: 300px;
    }

    .greeting-text {
        font-size: 40px;
    }

    .ceo-visual__text {
        position: relative;
        padding: 30px 0;
        bottom: 0;
    }
}

.ceo_sec2 {
    padding-top: 30px;
    padding-bottom: 150px;
    background: #fff;
    position: relative;
}

.ceo_content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    gap: 50px;
    padding-right: 20px;
}

.text_content {
    flex: 1;
    position: relative;
}

.text_content .text {
    font-size: 15px;
    line-height: 1.8;
    color: #333;
    margin-bottom: 40px;
}

.img_wrap {
    position: relative;
    width: calc(100% + 50vw);
    margin-left: -50vw;
    overflow: visible; /* overflow를 visible로 변경하여 border가 보이도록 */
}

.img_wrap::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    top: 15px;
    left: 15px;
    border: 1px solid;
    border-image-source: linear-gradient(119deg, rgba(0, 122, 93, 0) 0%, #007a5d 100%);
    border-image-slice: 1;
    pointer-events: none; /* 이미지 클릭 가능하도록 */
    z-index: 1;
}

.img_wrap img {
    width: 100%;
    height: 600px;
    object-fit: cover;
    display: block;
    position: relative;
}

.right_content {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 40px;
    margin-top: -80px;
}

.right_img {
    width: 100%;
    overflow: hidden;
}

.right_img img {
    width: 100%;
    object-fit: cover;
    display: block;
}

.right_text {
    font-size: 15px;
    line-height: 1.8;
    color: #333;
}
@media (max-width: 1200px) {
    .ceo_sec2 {
        padding: 60px 0;
    }

    .ceo_content {
        flex-direction: column;
        gap: 30px;
        padding: 0 20px;
    }

    .img_wrap {
        width: 100vw;
        margin-left: -20px;
    }

    .img_wrap img,
    .right_img {
        height: 400px;
    }

    /* border effect 조정 */
    .img_wrap::after {
        width: calc(100% - 30px);
        left: 30px;
    }
}

@media (max-width: 768px) {
    .text_content .text,
    .right_text {
        font-size: 15px;
    }

    .img_wrap img,
    .right_img {
        height: 300px;
    }
}
</style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>About Us - CEO</h2>
            <div class="sub_menu">
                <a href="/cosmetic/about/story.php">스토리</a>
                <a href="/cosmetic/about/ceo.php" class="active">CEO 인사말</a>
                <a href="/cosmetic/about/certification.php">인증서</a>
                <a href="/cosmetic/about/direct_inquiry.php">문의하기</a>
                <a href="/cosmetic/about/map.php">오시는 길</a>
            </div>
        </div>
    </div>

<div class="ceo-section1">
    <div class="ceo-header">
        <span class="ceo-header__eng"></span>
        <h2 class="ceo-header__title"></h2>
</div>

    <div class="ceo-visual">
        <div class="ceo-visual__image">
            <img src="../images/about/ceo_visual.png" alt="CEO Greeting">
        </div>
        <div class="ceo-visual__text">
            <h3 class="greeting-text">Greeting</h3>
            <p class="greeting-desc">
                저희 ㈜디킨코스메틱은 2015년 10월부터 화장품 OEM/ODM 전문기업으로<br>
                설립되어 고객의 요구에 부응하기 위해 최고 품질의 화장품을 연구하고 있습니다.
            </p>
        </div>
    </div>
</div>

<div class="ceo_sec2">
    <div class="ceo_content">
        <div class="text_content">
            <div class="img_wrap">
                <img src="../images/about/ceo_img2.png" alt="CEO 이미지">
            </div>
        </div>
        <div class="right_content">
            <div class="right_img">
                <img src="../images/about/ceo_img3.png" alt="화장품 이미지">
            </div>
            <div class="right_text">
                <p>
                    2020년부터 자체 브랜드 일라벨라와 드바즈를 시작으로 다양한 신제품을<br>
                    출시하고 있으며, 전 임직원이 한마음 한뜻으로 가족과 같은 마음으로 최고의<br>
                    화장품을 만들기 위해 최선을 다하고 있습니다.
                </p>
                <p>
                    앞으로도 급변하는 트렌드를 이해하고 고객이 안심하고 사용할 수 있는 최고<br>
                    품질의 화장품을 선보일 수 있도록 항상 최선을 다하겠습니다.
                </p>
            </div>
        </div>
    </div>
</div>
 <?php include '../inc/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '50px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                if (target.classList.contains('ceo-visual')) {
                    target.style.animation = 'slideUp 1s ease forwards';
                }
                if (target.classList.contains('right_content')) {
                    target.style.animation = 'slideLeft 1s ease forwards 0.3s';
                }
                if (target.classList.contains('img_wrap')) {
                    target.style.animation = 'slideRight 1s ease forwards 0.6s';
                }
                observer.unobserve(target);
            }
        });
    }, observerOptions);

    const style = document.createElement('style');
    style.textContent = `
        .ceo-visual, .right_content, .img_wrap {
            opacity: 0;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideLeft {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    `;
    document.head.appendChild(style);

    ['ceo-visual', 'right_content', 'img_wrap'].forEach(className => {
        const element = document.querySelector(`.${className}`);
        if(element) observer.observe(element);
    });
});
</script>
</body>
</html>