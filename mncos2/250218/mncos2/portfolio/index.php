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

       @media (max-width: 768px) {
           .clients-grid {
               grid-template-columns: repeat(2, 1fr);
           }
       }

       @media (max-width: 480px) {
           .clients-grid {
               grid-template-columns: 1fr;
           }
       }

        @media (max-width: 768px) {
        .clients-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        }

        @media (max-width: 480px) {
        .clients-grid {
            grid-template-columns: 1fr;
        }
        }

       @media (max-width: 768px) {
           .portfolio-grid {
               grid-template-columns: repeat(2, 1fr);
           }
       }

       @media (max-width: 480px) {
           .portfolio-grid {
               grid-template-columns: 1fr;
           }
       }
   </style>
</head>
<body>
  <?php include '../inc/header.php'; ?>
  <?php include '../inc/cursor.php'; ?>


<div class="main-wrapper">
  <div class="visual">
      <h2>PORTFOLIO</h2>
      <p>우리는 항상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
  </div>

  <div class="clients">
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
  </div>


  <?php
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $items_per_page = 9;
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