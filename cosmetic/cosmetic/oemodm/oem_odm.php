<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>OEM/ODM</title>
   <script src="https://unpkg.com/scrollreveal"></script>
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
        .icon img {
            width: 20px;
            height: auto;
        }
       .manufacturing_wrap {
           max-width: 1400px;
           margin: 100px auto;
           padding: 0 20px;
       }
       
       .odm-title {
        position: relative;
        padding-left: 200px;
        margin-bottom: 60px;
    }
    .odm-title:before {
        content: '';
        position: absolute;
        left: 0;
        top: 20px;
        width: 150px;
        height: 1px;
        background: #ddd;
    }
    .odm-title h2 {
        font-size: 40px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .odm-title h2:after {
        content: '(Original Development Manufacturing)';
        font-size: 20px;
        color: #666;
        font-weight: normal;
    }

    .odm-title p {
        font-size: 18px;
        color: #666;
        word-break: keep-all;
    }
    .process-img {
        width: 100%;
        height: 300px;
        overflow: hidden;
        margin: 50px 0;
        text-align: center; /* 추가 */
    }

    .process-img img {
        width: 80%;
        height: 100%;
        object-fit: cover;
        margin: 0 auto; /* 추가 */
        display: block; /* 추가 */
    }

    .process_bg {
        background-color: #f8f8f8;
        padding: 100px 0;
        margin-top: -150px;
    }

    .process_wrap {
        max-width: 1400px;
        text-align: center;
        margin: 0 auto;
        padding: 0 20px;
    }
       .process_wrap h3 {
           font-size: 35px;
           margin-bottom: 50px;
       }
       
       .process_steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 100px 30px;
            margin-top: 50px;
        }
       
       .step {
           position: relative;
           text-align: center;
           opacity: 1;
       }
       .step span {
           display: block;
           color: #007a5c;
           font-size: 16px;
           margin-bottom: 15px;
       }
       
       .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 0 auto;
        }
       
        .process_wrap p {
            font-size: 18px; /* 1.8rem을 18px로 변경 */
            font-weight: 500;
            margin-top: 20px; /* 2rem을 20px로 변경 */
        }

/* ODM 섹션의 화살표 - 오른쪽 방향 */
/* ODM 섹션의 화살표 - 오른쪽 방향 */
.step.step1::after,
.step.step2::after,
.step.step3::after {
    content: '';
    position: absolute;
    top: 80px;
    right: -60px;
    width: 120px;
    height: 20px;
    background: url('../images/oemodm/odm_oem_arrow_right.png') no-repeat center/contain;
    z-index: 2;
}

/* ODM 섹션의 화살표 - 아래 방향 */
.step.step4::after {
    content: '';
    position: absolute;
    bottom: -90px;
    left: 50%;
    transform: translateX(-50%);
    width: 6px;
    height: 120px;
    background: url('../images/oemodm/odm_oem_arrow_bottom.png') no-repeat center/contain;
    z-index: 2;
}

/* ODM 섹션의 화살표 - 왼쪽 방향 */
.step.step5::after,
.step.step6::after,
.step.step7::after {
    content: '';
    position: absolute;
    top: 80px;
    left: -60px;
    width: 120px;
    height: 20px;
    background: url('../images/oemodm/odm_oem_arrow_left.png') no-repeat center/contain;
    z-index: 2;
}

/* OEM 섹션의 화살표만 */
.manufacturing_wrap:last-of-type .step.step1::after,
.manufacturing_wrap:last-of-type .step.step2::after,
.manufacturing_wrap:last-of-type .step.step3::after {
    content: '';
    position: absolute;
    top: 80px;
    right: -60px;
    width: 120px;
    height: 20px;
    background: url('../images/oemodm/odm_oem_arrow_right.png') no-repeat center/contain;
    z-index: 2;
}

       @media (max-width: 768px) {
           .process_steps {
               grid-template-columns: repeat(2, 1fr);
           }
       }
       html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    width: 100%;
}

.container {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.manufacturing_wrap {
    flex: 1;
    width: 100%;
}

.footer {
    width: 100%;
    background: #2B3856;
    margin-top: auto; /* 컨텐츠와 푸터 사이 공간을 자동으로 채움 */
}

.footer .inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 50px 20px;
}

.footer .logo {
    margin-bottom: 30px;
}

.footer .info {
    margin-bottom: 20px;
    line-height: 1.8;
    color: #fff;
}

.footer .copyright {
    color: rgba(255,255,255,0.7);
}
   </style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <div class="container">
       <div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>OEM/ODM</h2>
            <div class="sub_menu">
                <a href="/cosmetic/oemodm/oem_odm.php" class="active">OEM/ODM</a>
                <a href="/cosmetic/oemodm/product.php">개발품목</a>
                <a href="/cosmetic/oemodm/rnd.php">R&D</a>
            </div>
        </div>
    </div>

       <div class="manufacturing_wrap">
        <div class="odm-title">
            <h2>ODM</h2>
            <p>독자적인 연구개발 능력을 바탕으로 제품 개발 등 전 과정 서비스를 통해 완제품을 납품하는 방식</p>
        </div>

           <div class="process-img">
               <img src="../images/oemodm/oem_odm_img1.png" alt="ODM Process Background">
           </div>

           <div class="process_bg">
           <div class="process_wrap">
               <h3>ODM 생산 프로세스</h3>
               <div class="process_steps">
                   <div class="step step1">
                       <span>STEP 01</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="개별의뢰">
                       </div>
                       <p>개별의뢰</p>
                   </div>
                   <div class="step step2">
                       <span>STEP 02</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="고객상담">
                       </div>
                       <p>고객상담</p>
                   </div>
                   <div class="step step3">
                       <span>STEP 03</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="계약">
                       </div>
                       <p>계약</p>
                   </div>
                   <div class="step step4">
                       <span>STEP 04</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="제품 컨셉 및 컨셉전략 확정">
                       </div>
                       <p>제품 컨셉 및<br>컨셉전략 확정</p>
                   </div>
                   <div class="step step8">
                       <span>STEP 08</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="출하">
                       </div>
                       <p>출하</p>
                   </div>
                   <div class="step step7">
                       <span>STEP 07</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="생산 & 포장">
                       </div>
                       <p>생산 & 포장</p>
                   </div>
                   <div class="step step6">
                       <span>STEP 06</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="원료 투입제 감고">
                       </div>
                       <p>원료 투입제<br>감고</p>
                   </div>
                   <div class="step step5">
                       <span>STEP 05</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="제품 연구개발 및 디자인 확정">
                       </div>
                       <p>제품 연구개발 및<br>디자인 확정</p>
                   </div>
               </div>
            </div>
           </div>
       </div>

       <div class="manufacturing_wrap">
           <div class="odm-title">
               <h2>OEM</h2>
               <p>판매사의 요구사항에 적합한 내용물을 개발하고 부자재를 제공받아 중 · 포장을 해 완제품을 납품하는 방식</p>
           </div>

           <div class="process-img">
               <img src="../images/oemodm/oem_odm_img2.png" alt="OEM Process Background">
           </div>

           <div class="process_bg">
           <div class="process_wrap">
               <h3>OEM 생산 프로세스</h3>
               <div class="process_steps">
                   <div class="step step1">
                       <span>STEP 01</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="개별의뢰">
                       </div>
                       <p>개별의뢰</p>
                   </div>
                   <div class="step step2">
                       <span>STEP 02</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="고객상담">
                       </div>
                       <p>고객상담</p>
                   </div>
                   <div class="step step3">
                       <span>STEP 03</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="계약">
                       </div>
                       <p>계약</p>
                   </div>
                   <div class="step">
                       <span>STEP 04</span>
                       <div class="icon">
                           <img src="../images/oemodm/icon.png" alt="제품 컨셉 및 컨셉전략 확정">
                       </div>
                       <p>제품 검수 및<br>판매전략 확정</p>
                   </div>
               </div>
           </div>
        </div>
       </div>
   </div>
   <?php include '../inc/footer.php'; ?>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 애니메이션 기본 설정
    ScrollReveal().reveal('.step', {
        reset: false,  // 애니메이션 반복 제거
        distance: '30px',
        duration: 900,
        opacity: 1,    // 초기 opacity 1로 설정
        interval: 300
    });

    // 첫 번째 줄 (오른쪽으로)
    ScrollReveal().reveal('.step:nth-child(-n+4)', {
        origin: 'left',
        interval: 200
    });

    // 두 번째 줄 (왼쪽으로)
    ScrollReveal().reveal('.step:nth-child(n+5)', {
        origin: 'right',
        interval: 200,
        delay: 500
    });
});
</script>
</body>
</html>