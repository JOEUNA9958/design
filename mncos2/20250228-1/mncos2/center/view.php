<!DOCTYPE html>
<html lang="ko">
<head>
   <title>Portfolio</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <link rel="preconnect" href="//fonts.googleapis.com"/>
   <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
   <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
   
   <!-- Plugin CSS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <style>
        body {
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        overflow-y: auto;
        }

        .main-wrapper {
        position: relative;
        min-height: 100vh;
        padding-bottom: 300px; /* footer 높이만큼 */
        }

        footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 300px;
        background: #111;
        z-index: 1000;
        }

       * {
           margin: 0;
           padding: 0;
           box-sizing: border-box;
       }

       .visual {
           position: relative;
           width: 100%;
           height: 450px;
           background: url('../images/company/company_bg.jpg') no-repeat center/cover;
           display: flex;
           flex-direction: column;
           justify-content: center;
           align-items: center;
           text-align: center;
           color: #fff;
           margin: 0;
           padding: 0;
           margin-bottom: 150px;
       }

       .visual::before {
           content: '';
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: rgba(0,0,0,0.3);
       }

       .visual h2 {
           position: relative;
           font-size: 48px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           z-index: 1;
           margin: 0;
       }

       .visual p {
           position: relative;
           font-size: 18px;
           margin-top: 20px;
           z-index: 1;
       }

       .visual-menu {
           position: absolute;
           bottom: 0;
           left: 0;
           width: 100%;
           display: flex;
           justify-content: center;
           margin: 0;
           padding: 0;
       }

       .menu-item {
           background: rgba(255,255,255,0.1);
           flex: 1;
           max-width: 200px;
           border-right: 1px solid rgba(255,255,255,0.1);
           margin: 0;
       }

       .menu-item:last-child {
           border-right: none;
       }

       .menu-item a {
           display: flex;
           align-items: center;
           justify-content: center;
           height: 80px;
           color: #fff;
           text-decoration: none;
           font-size: 16px;
           text-align: center;
           margin: 0;
           padding: 0;
       }

       .menu-item a span {
           line-height: 1.4;
       }

       .menu-item.active {
           background: #0066b3;
       }

       .portfolio-container {
           min-height: auto;
           margin-bottom: 50px;
           max-width: 1200px;
           margin: 0 auto;
           padding: 40px 20px;
           height: auto;
       }

       .portfolio-container h1 {
           text-align: center;
           font-size: 48px;
           margin-bottom: 10px;
       }

       .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 60px;
        margin: 60px 0;
        }

        .portfolio-item {
        background: #fff;
        text-align: center;
        }

       .portfolio-item:hover {
           transform: translateY(-10px);
       }

        .portfolio-item img {
        width: 70%;
        height: auto;
        margin-bottom: 30px;
        }

        .portfolio-item h3 {
        font-size: 17px;
        margin-bottom: 15px;
        }

       .portfolio-item p {
           color: #666;
           line-height: 1.6;
           margin: 5px 0;
       }

       .portfolio-item .subtitle {
        color: #666;
        margin-bottom: 20px;
        font-size: 14px;
        }

       .pagination {
           display: flex;
           justify-content: center;
           gap: 5px;
       }

       .portfolio-item .desc {
        text-align: left;
        padding: 0 20px;
        }

        .portfolio-item .desc p {
        color: #666;
        position: relative;
        padding-left: 15px;
        font-size: 14px;
        }

        .portfolio-item .desc p:before {
        content: '-';
        position: absolute;
        left: 0;
        }

       .pagination a {
           padding: 8px 12px;
           border: 1px solid #ddd;
           text-decoration: none;
           color: #333;
       }

       .pagination a.active {
           background: #333;
           color: #fff;
       }

       .clients {
        max-width: 1200px;
        margin: 100px auto;
        text-align: center;
        padding: 0 20px;
        }

        .clients h2 {
        font-size: 48px;
        margin-bottom: 20px;
        }

        .clients p {
        color: #666;
        margin-bottom: 50px;
        }

        .clients-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0;
        }

        .client-col {
        display: flex;
        flex-direction: column;
        gap: 50px;
        padding: 0 30px;
        border-right: 1px solid #ddd;
        }


        .client-col:last-child {
        border-right: none;
        }

        .client-col img {
        width: 100%;
        height: auto;
        opacity: 0.5;
        transition: opacity 0.3s;
        }

        .client-col img:hover {
        opacity: 1;
        }

        .portfolio-title {
           text-align: center;
           margin: 100px 0 50px;
       }
       
       .portfolio-title h2 {
           font-size: 48px;
           margin-bottom: 180px;
           margin-top: 200px;
       }
       
       .portfolio-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        }

        .portfolio-count {
        color: #666;
        }

        .portfolio-sort {
        color: #666;
        }
       
       .portfolio-info p {
           color: #666;
       }

       #clients {
           background: #fff;
           display: flex;
           align-items: center;
           justify-content: center;
       }

       .clients-inner {
           width: 100%;
           max-width: 1400px;
           margin: 0 auto;
           text-align: center;
           padding: 0 40px;
       }

       .clients-grid {
           display: grid;
           grid-template-columns: repeat(4, 1fr);
           gap: 0;
           border-right: 1px solid #eee;
           margin: 0 auto;
           max-width: 1400px;
           overflow: hidden;
           width: 100%;
       }

       .client-col {
           display: flex;
           flex-direction: column;
           align-items: center;
           padding: 60px 50px;
           gap: 50px;
           border-left: 1px solid #eee;
       }

       .client-col img {
           max-width: 160px;
           height: auto;
           opacity: 0.3;
           transition: opacity 0.3s ease;
           filter: grayscale(100%);
       }

       .client-col img:hover {
           opacity: 1;
           filter: none;
       }
/* 반응형 스타일 */
@media (max-width: 1200px) {
    .portfolio-container,
    .portfolio-info {
        padding: 0 40px;
    }

    .portfolio-grid {
        gap: 40px;
    }
}

@media (max-width: 991px) {
    .portfolio-title h2 {
        font-size: 36px;
        margin: 100px 0 50px;
    }

    .portfolio-item img {
        width: 80%;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
        margin-bottom: 80px;
    }

    .visual h2 {
        font-size: 36px;
    }

    .visual p {
        font-size: 16px;
        padding: 0 20px;
    }

    .portfolio-title h2 {
        font-size: 32px;
        margin: 60px 0 40px;
    }

    .portfolio-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin: 40px 0;
    }

    .portfolio-info {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    .portfolio-item {
        padding: 15px;
    }

    .portfolio-item img {
        width: 90%;
        margin-bottom: 20px;
    }

    .portfolio-item h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .portfolio-item .subtitle {
        font-size: 13px;
    }

    .portfolio-item .desc p {
        font-size: 13px;
    }

    .pagination {
        margin-top: 40px;
    }

    .pagination a {
        padding: 6px 10px;
        font-size: 14px;
    }
    .main-wrapper {
        padding-bottom: 0; /* footer 높이 조정 */
    }
    
    footer {
        height: 200px; /* footer 높이 조정 */
    }

    .visual {
        height: 350px;
        margin-bottom: 80px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 300px;
        margin-bottom: 60px;
    }

    .visual h2 {
        font-size: 32px;
    }

    .visual p {
        font-size: 14px;
    }

    .portfolio-container {
        padding: 0 20px;
    }

    .portfolio-title h2 {
        font-size: 28px;
        margin: 40px 0 30px;
    }

    .portfolio-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .portfolio-item {
        max-width: 400px;
        margin: 0 auto;
    }

    .portfolio-item img {
        width: 100%;
    }

    .portfolio-item h3 {
        font-size: 15px;
        padding: 0 10px;
    }

    .portfolio-item .subtitle {
        font-size: 12px;
    }

    .portfolio-item .desc {
        padding: 0 15px;
    }

    .portfolio-item .desc p {
        font-size: 12px;
    }

    .pagination {
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }

    .pagination a {
        padding: 5px 8px;
        font-size: 13px;
    }
    
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual h2 {
        font-size: 28px;
    }

    .visual p {
        font-size: 13px;
    }

    .portfolio-title h2 {
        font-size: 24px;
    }

    .portfolio-item h3 {
        font-size: 14px;
    }

    .portfolio-item .desc p {
        font-size: 11px;
    }

    .pagination a {
        padding: 4px 6px;
        font-size: 12px;
    }
}

   </style>
</head>
<body>
  <?php include '../inc/header.php'; ?>
  <?php include '../inc/cursor.php'; ?>


<div class="main-wrapper">
    <div class="visual">
       <h2>센터둘러보기</h2>
       <p>당진</p>
       <div class="visual-menu">
           <div class="menu-item">
               <a href="/mncos2/center/ceo.php"><span>인사말</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/history.php"><span>연혁</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/about.php"><span>운영체계</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/about02.php"><span>주요추진사업</span></a>
           </div>
           <div class="menu-item ">
               <a href="/mncos2/center/law.php"><span>법률상담</span></a>
           </div>
           <div class="menu-item active">
               <a href="/mncos2/center/view.php"><span>센터둘러보기</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/sponsor.php"><span>후원안내</span></a>
           </div>
           <div class="menu-item">
               <a href="/mncos2/center/map.php"><span>오시는 길</span></a>
           </div>
        </div>
    </div>

  <!-- <div class="clients">
      <div class="clients-inner">
          <h2 data-aos="fade-up">CLIENTS</h2>
          <p class="clients-desc" data-aos="fade-up" data-aos-delay="100">엠앤코스와 함께하는 클라이언트입니다.</p>
          
          <div class="clients-grid" data-aos="fade-up" data-aos-delay="200">
            <div class="client-col">
                <img src="images/clients/2222.png" alt="2222">
                <img src="images/clients/vtcosmetics.png" alt="VT COSMETICS">
                <img src="images/clients/avrille.png" alt="Avrille">
                <img src="images/clients/liveforest.png" alt="LIVE FOREST">
                <img src="images/clients/mydahlia.png" alt="MyDahlia">
            </div>
            <div class="client-col">
                <img src="images/clients/medion.png" alt="MEDION">
                <img src="images/clients/obge.png" alt="OBgE">
                <img src="images/clients/bedight.png" alt="BEDIGHT">
                <img src="images/clients/marnell.png" alt="Marnell"> 
                <img src="images/clients/ownall.png" alt="Ownall">
            </div>
            <div class="client-col">
                <img src="images/clients/curicell.png" alt="CURICELL">
                <img src="images/clients/auau.png" alt="AUAU">
                <img src="images/clients/bocell.png" alt="BOCELL">
                <img src="images/clients/medilabo.png" alt="MEDILABO">
                <img src="images/clients/pibumi.png" alt="PIBUMI">
            </div>
            <div class="client-col">
                <img src="images/clients/housweet.png" alt="HOUSWEET">
                <img src="images/clients/hiar.png" alt="Hiar">
                <img src="images/clients/lilyeve.png" alt="lilyeve">
                <img src="images/clients/modubala.png" alt="modubala">
                <img src="images/clients/saengak.png" alt="Saengak">
            </div>
            </div>
      </div>
  </div> -->



<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 모바일 여부 확인
$is_mobile = false;
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$user_agent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($user_agent,0,4))) {
  $is_mobile = true;
}

// 모바일이면 3개, 데스크톱이면 9개 표시
$items_per_page = $is_mobile ? 3 : 9;
$offset = ($page - 1) * $items_per_page;

$portfolio_items = [
    [
        'title' => '브이티 시카 레티-에이 포어 클리어 스틱',
        'subtitle' => '레티놀 블랙헤드 밤',
        'image' => 'vt.jpg',
        'desc' => [
            '순수 99% 레티놀',
            '블랙헤드 클렌징 스틱',
            '심피본 브러시 내장 용기'
        ]
    ],
    [
        'title' => '아유아유 뷰룸 풋 스틱',
        'subtitle' => '간편한 스틱타입의 발관리 제품',
        'image' => 'vt.jpg', 
        'desc' => [
            '간편한 스틱타입',
            '발 냄새 케어',
            '발 각질 및 수분 관리'
        ]
    ],
    [
        'title' => '오브제 블랙헤드 스크럽 밤',
        'subtitle' => '올인원 블랙헤드 스틱',
        'image' => 'vt.jpg',
        'desc' => [
            '미세 생일가루 3단 멀티밤',
            '블랙헤드 및 노폐물 제거',
            '모공 수축 및 피부보습'
        ]
    ]
];

$total_items = count($portfolio_items);
$current_items = array_slice($portfolio_items, $offset, $items_per_page);
$total_pages = ceil($total_items / $items_per_page);
?>

    <div class="portfolio-title">
    <h2>PORTFOLIO</h2>
    </div>

    <div class="portfolio-info">
    <p>총 <?= $total_items ?>개의 상품이 있습니다.</p>
    <p class="portfolio-sort">신상품</p>
    </div>

  <div class="portfolio-container">
      <div class="portfolio-grid">
          <?php foreach($current_items as $item): ?>
          <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
            <img src="../images/portfolio/<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
              <h3><?= $item['title'] ?></h3>
              <p class="subtitle"><?= $item['subtitle'] ?></p>
              <div class="desc">
                  <?php foreach($item['desc'] as $desc): ?>
                      <p><?= $desc ?></p>
                  <?php endforeach; ?>
              </div>
          </div>
          <?php endforeach; ?>
      </div>

      <?php if($total_pages > 1): ?>
      <div class="pagination">
          <a href="?page=1">«</a>
          <a href="?page=<?= max(1, $page-1) ?>"><</a>
          
          <?php for($i = 1; $i <= $total_pages; $i++): ?>
              <a href="?page=<?= $i ?>" <?= $i === $page ? 'class="active"' : '' ?>><?= $i ?></a>
          <?php endfor; ?>
          
          <a href="?page=<?= min($total_pages, $page+1) ?>">></a>
          <a href="?page=<?= $total_pages ?>">»</a>
      </div>
      <?php endif; ?>
  </div>

  <?php include '../inc/footer.php'; ?>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
      AOS.init({
          duration: 1000,
          once: false,
          disable: 'mobile'
      });
  </script>
</body>
</html>