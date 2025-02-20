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
    }

    .sub_menu a {
        flex: 1;
        text-align: center;
        color: #fff;
        text-decoration: none;
        padding: 20px 0;
        background: rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
        font-size: 20px;
    }

    .sub_menu a:hover,
    .sub_menu a.active {
        background: #007a5d;
    }

    .story-section1 {
    padding: 80px 0;
}

.brand-wrap {
    width: 100%;
    max-width: 1920px;
    margin: 0 auto;
    padding-top: 100px;
}

.brand-item:nth-child(odd) {
    flex-direction: row-reverse;
    justify-content: flex-start;
}

.brand-item {
    display: flex;
    justify-content: flex-start;
    gap: 50px;
    margin-bottom: 100px;
}

.brand-img {
    width: 1015.33px;
    max-width: 1065.33px;
    height: 398.16px;
}
.brand-txt-wrap {
    width: 502.66px;
}

.brand-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.num {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 20px;
    line-height: 32px;
    color: #007A5D;
}

.line {
    width: 439.66px;
    height: 1px;
    background: linear-gradient(90deg, #99CABE 0%, rgba(0, 122, 93, 0) 100%);
    margin: 15px 0 30px;
}

.brand-txt-wrap h3 {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 50px;
    line-height: 64px;
    color: #424242;
    margin-bottom: 23.7px;
}

.brand-txt-wrap p {
    font-family: 'Roboto';
    font-weight: 400;
    font-size: 17.0156px;
    line-height: 29px;
    color: #424242;
}

.brand-title {
    text-align: center;
    margin-bottom: 80px;
}

.brand-title .small-text {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 16px;
    line-height: 26px;
    color: #757575;
    margin-bottom: 15px;
}

.brand-title h2 {
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 37.5px;
    line-height: 64px;
    color: #424242;
}

.brand-content {
    display: flex;
    align-items: center;
    gap: 50px;
}

.brand-text {
    flex: 1;
}

.brand-text .number {
    color: #007a5d;
    font-size: 18px;
    margin-bottom: 20px;
    display: block;
}

.brand-text h3 {
    font-size: 32px;
    margin-bottom: 30px;
    color: #333;
}

.brand-text p {
    font-size: 16px;
    line-height: 1.8;
    color: #666;
}

.brand-image {
    flex: 1;
}

.brand-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

@media (max-width: 992px) {
    .brand-content {
        flex-direction: column-reverse;
    }
    
    .brand-text {
        text-align: center;
    }
}
</style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>Brand</h2>
        </div>
</div>

<div class="brand-section1">
    <div class="brand-wrap">
        <div class="brand-title">
            <span class="small-text">Brand</span>
            <h2>브랜드 소개</h2>
        </div>
        <div class="brand-item">
            <div class="brand-img">
                <img src="../images/brand/brand3.jpg" alt="D.KIN COSMETIC Products">
            </div>
            <div class="brand-txt-wrap">
               <span class="num">01</span>
               <div class="line"></div>
               <h3>기업명 COSMETIC</h3>
               <p>(주)기업명은 2015년 10월 설립 이후 리그슈머코스로부터 시작해 2021년 9월 마젠코리아에서 (주)기업명으로 상호를 변경하며 고객의 요구에 부응할 수 있는 차선의 품질의 화장품을 위해 걸어온 OEM / ODM 회사입니다.</p>
           </div>
        </div>

        <div class="brand-item">
           <div class="brand-img">
                <img src="../images/brand/brand2.jpg" alt="기업명 COSMETIC Products">
            </div>
            <div class="brand-txt-wrap">
               <span class="num">02</span>
               <div class="line"></div>
               <h3>기업명 COSMETIC</h3>
               <p>(주)기업명은 2015년 10월 설립 이후 리그슈머코스로부터 시작해 2021년 9월 마젠코리아에서 (주)기업명으로 상호를 변경하며 고객의 요구에 부응할 수 있는 차선의 품질의 화장품을 위해 걸어온 OEM / ODM 회사입니다.</p>
           </div>
        </div>

        <div class="brand-item">
            <div class="brand-img">
                <img src="../images/brand/brand3.jpg" alt="기업명 COSMETIC Products">
            </div>
            <div class="brand-txt-wrap">
               <span class="num">03</span>
               <div class="line"></div>
               <h3>기업명 COSMETIC</h3>
               <p>(주)기업명은 2015년 10월 설립 이후 리그슈머코스로부터 시작해 2021년 9월 마젠코리아에서 (주)기업명으로 상호를 변경하며 고객의 요구에 부응할 수 있는 차선의 품질의 화장품을 위해 걸어온 OEM / ODM 회사입니다.</p>
           </div>
        </div>

    </div>
</div>

<?php include '../inc/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
   const brandTitle = document.querySelector('.brand-title');
   const brandItems = document.querySelectorAll('.brand-item');
   
   brandTitle.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
   
   brandItems.forEach((item, index) => {
       const img = item.querySelector('.brand-img');
       const txt = item.querySelector('.brand-txt-wrap');
       
       if(index % 2 === 0) {
           // 홀수 아이템
           img.style.cssText = 'opacity:0; transform:translateX(-50px); transition:all 1s ease;';
           txt.style.cssText = 'opacity:0; transform:translateX(50px); transition:all 1s ease;';
       } else {
           // 짝수 아이템
           img.style.cssText = 'opacity:0; transform:translateX(50px); transition:all 1s ease;';
           txt.style.cssText = 'opacity:0; transform:translateX(-50px); transition:all 1s ease;';
       }
   });

   function handleScroll() {
       const scrollY = window.scrollY;
       
       // 타이틀 애니메이션
       if(scrollY > brandTitle.offsetTop - window.innerHeight + 100) {
           brandTitle.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
       }
       
       // 아이템 애니메이션
       brandItems.forEach((item) => {
           if(scrollY > item.offsetTop - window.innerHeight + 100) {
               const img = item.querySelector('.brand-img');
               const txt = item.querySelector('.brand-txt-wrap');
               
               img.style.cssText = 'opacity:1; transform:translateX(0); transition:all 1s ease;';
               txt.style.cssText = 'opacity:1; transform:translateX(0); transition:all 1s ease;';
           }
       });
   }

   window.addEventListener('scroll', handleScroll);
   handleScroll();
});
</script>
</body>
</html>