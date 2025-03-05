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

   .rnd_wrap {
       position: relative;
       max-width: 1200px;
       margin: 0 auto;
       padding: 100px 15px 150px;
   }

   .rnd_bg {
        position: absolute;
        height: 490px;
        left: -350px;
        bottom: 0px;
        background: #CCE4DF;
        opacity: 0.3;
        z-index: 0;
        width: 155.5%;
    }
   .rnd_content {
       position: relative;
       z-index: 1;
   }

   .rnd_title {
       text-align: center;
       margin-bottom: 50px;
   }

   .rnd_small_title {
       font-family: 'Roboto';
       font-weight: 600;
       font-size: 16px;
       line-height: 26px;
       color: #757575;
       margin-bottom: 10px;
   }

   .rnd_main_title {
       font-family: 'Roboto';
       font-weight: 600;
       font-size: 40px;
       line-height: 64px;
       color: #424242;
   }

   .rnd_item_wrap {
       display: flex;
   }

   .rnd_item_left {
       width: 384px;
   }

   .rnd_big_text {
       font-family: 'Roboto';
       font-weight: 500;
       font-size: 80px;
       line-height: 128px;
       color: #003125;
       margin-top: -48px;
   }

   .rnd_item_right {
       flex: 1;
       padding: 0 35px;
   }

   .rnd_img {
       width: 100%;
       height: 402px;
       object-fit: cover;
       margin-bottom: 28.8px;
       position: relative;
       z-index:1;
   }

   .rnd_text {
       font-family: 'Roboto';
       font-weight: 400;
       font-size: 17px;
       line-height: 29px;
       color: #424242;
       max-width: 717px;
   }

   .rnd_item_left img {
        width: 378px;
        height: 500px;
    }

    .rotate-container {
        position: relative;
        margin-bottom: 28.8px;
    }

    .rotate-point {
        width: 300px;
        height: 300px;
        position: absolute;
        left: 90%;
        transform: translate(-50%, -50%);
        animation: rotatePoint 20s linear infinite;
        z-index: -1;
    }

    @keyframes rotatePoint {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }
        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }
  </style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <div class="container">
   <div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>R&D</h2>
            <div class="sub_menu">
            <a href="/cosmetic/oemodm/oem_odm.php">OEM/ODM</a>
                <a href="/cosmetic/oemodm/product.php">개발품목</a>
                <a href="/cosmetic/oemodm/rnd.php" class="active">R&D</a>
            </div>
        </div>
    </div>

       <div class="rnd_wrap">
           <div class="rnd_bg"></div>
           <div class="rnd_content">
               <div class="rnd_title">
                   <div class="rnd_small_title">Research & Development</div>
                   <div class="rnd_main_title">R&D</div>
               </div>

               <div class="rnd_item_wrap">
                   <div class="rnd_item_left">
                       <div class="rnd_big_text">R&D</div>
                       <img src="../images/oemodm/rnd1.jpg" alt="R&D Image 1" />
                   </div>
                   <div class="rnd_item_right">
                       <img src="../images/oemodm/rnd2.jpg" alt="R&D Image 2" class="rnd_img"/>
                       <img src="../images/main/point.png" alt="Rotating Point" class="rotate-point">
                       <p class="rnd_text">
                           저희 회사의 자랑이자 핵심 부서인, 우수한 연구원들로 구성된 기업부설연구소는, 
                           수년간 다양한 화장품 연구를 통해 얻은 많은 경험을 바탕으로 고객사의 요구에 맞는 
                           최적합화된 화장품을 가장 빠른 시간 내에 제공해 드릴 수 있습니다.
                       </p>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php include '../inc/footer.php'; ?>

   <script>
   document.addEventListener('DOMContentLoaded', function() {
       const rndTitle = document.querySelector('.rnd_title');
       const rndLeft = document.querySelector('.rnd_item_left');
       const rndRight = document.querySelector('.rnd_item_right');

       // 초기 상태 설정
       rndTitle.style.cssText = 'opacity:0; transform:translateY(50px); transition:all 1s ease;';
       rndLeft.style.cssText = 'opacity:0; transform:translateX(-50px); transition:all 1s ease;';
       rndRight.style.cssText = 'opacity:0; transform:translateX(50px); transition:all 1s ease;';

       function handleScroll() {
           const scrollY = window.scrollY;
           const triggerPosition = window.innerHeight - 100;

           if(scrollY > rndTitle.offsetTop - triggerPosition) {
               rndTitle.style.cssText = 'opacity:1; transform:translateY(0); transition:all 1s ease;';
           }

           if(scrollY > rndLeft.offsetTop - triggerPosition) {
               rndLeft.style.cssText = 'opacity:1; transform:translateX(0); transition:all 1s ease;';
               setTimeout(() => {
                   rndRight.style.cssText = 'opacity:1; transform:translateX(0); transition:all 1s ease;';
               }, 300);
           }
       }

       window.addEventListener('scroll', handleScroll);
       setTimeout(handleScroll, 500);
   });
   </script>
</body>
</html>