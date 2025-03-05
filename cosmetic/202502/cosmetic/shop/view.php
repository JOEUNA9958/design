<?php
$products = [
   // 스킨케어 상품
   'skin_1' => [
       'title' => '드바즈 MnC 모이스춰 인헨싱 토너',
       'subtitle' => 'DEBASE Marine Collagen & Cica Moisture Enhancing Toner',
       'category' => 'Skin Care',
       'image' => '../images/main/sec5_3.jpg',
       'volume' => '150ml',
       'expiry' => '별도표기',
       'country' => '대한민국',
       'details' => ['../images/shop/detail1.jpg']
   ],
   
//    'skin_2' => [
//        'title' => '드바즈 MnC 모이스춰 인헨싱 로션',
//        'subtitle' => 'DEBASE Marine Collagen & Cica Moisture Enhancing Lotion',
//        'category' => 'Skin Care',
//        'image' => '../images/main/sec5_3.jpg',
//        'volume' => '150ml',
//        'expiry' => '별도표기', 
//        'country' => '대한민국',
//        'details' => ['../images/shop/detail1.jpg']
//    ],

   // 헤어케어 상품
   'hair_1' => [
       'title' => '헤어케어 상품명',
       'subtitle' => 'DEBASE Premium Shampoo',
       'category' => 'Hair Care',
       'image' => '../images/shop/hair1.jpg',
       'volume' => '500ml',
       'expiry' => '별도표기',
       'country' => '대한민국',
       'details' => ['../images/shop/detail1.jpg']
   ],

   // 바디케어 상품 
   'body_1' => [
       'title' => '바디/핸드케어 상품명',
       'subtitle' => 'DEBASE Body Lotion',
       'category' => 'Body Care',
       'image' => '../images/shop/body1.jpg', 
       'volume' => '400ml',
       'expiry' => '별도표기',
       'country' => '대한민국',
       'details' => ['../images/shop/detail1.jpg']
   ]
];

$id = $_GET['id'] ?? 'skin_1';
$product = $products[$id] ?? $products['skin_1'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $product['title']; ?></title>
   <style>
       /* 기본 스타일 */
       body {
           display: block;
           margin: 0;
       }

       /* 서브 배너 스타일 */
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
           0% { background-position: center 0%; }
           50% { background-position: center 100%; }
           100% { background-position: center 0%; }
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

       /* 상품 상세 스타일 */
       .product-detail {
           max-width: 1200px;
           margin: 100px auto;
           padding: 0 15px;
       }

       .detail-wrap {
           display: flex;
           gap: 80px;
       }

       .product-images {
           width: 620px;
           position: relative;
       }

       .main-image {
           width: 100%;
           height: 450px;
           margin-bottom: 10px;
       }

       .main-image img {
           width: 90%;
           height: 100%;
           object-fit: cover;
       }

       .image-nav {
           display: flex;
           justify-content: center;
           gap: 15px;
           margin-top: 20px;
       }

       .image-dot {
           width: 8px;
           height: 8px;
           border-radius: 50%;
           background: #000;
           opacity: 0.2;
           cursor: pointer;
       }

       .image-dot.active {
           opacity: 1;
           background: #616161;
       }

       .product-info {
           width: 550px;
       }

       .category-label {
           display: inline-block;
           padding: 6px 11px;
           border: 1px solid #007A5D;
           color: #33957D;
           font-size: 15px;
           margin-bottom: 19px;
       }

       .product-title {
           font-size: 32px;
           color: #424242;
           margin-bottom: 9px;
           font-weight: 600;
       }

       .product-subtitle {
           font-size: 16px;
           color: #757575;
           margin-bottom: 31px;
       }

       .info-table {
           width: 100%;
           border-top: 1px solid #BDBDBD;
       }

       .info-table tr {
           height: 66px;
       }

       .info-table th {
           width: 180px;
           font-weight: 700;
           color: #757575;
           text-align: left;
           font-size: 15px;
       }

       .info-table td {
           color: #757575;
           font-size: 15px;
       }

       .detail-content {
           margin-top: 50px;
       }

       .detail-content img {
           width: 100%;
           height: auto;
           margin-bottom: 50px;
       }
   </style>
</head>
<body>
   <?php include '../inc/header.php'; ?>
   <div class="container">
       <div class="sub_banner_wrap">
           <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
               <h2>Shop</h2>
               <div class="sub_menu">
                   <a href="/cosmetic/shop/skin.php" class="active">기초케어</a>
                   <a href="/cosmetic/shop/hair.php">헤어케어</a>
                   <a href="/cosmetic/shop/body.php">바디/핸드케어</a>
               </div>
           </div>
       </div>

       <div class="product-detail">
           <div class="detail-wrap">
               <div class="product-images">
                   <div class="main-image">
                       <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
                   </div>
                   <div class="image-nav">
                       <?php foreach($product['details'] as $index => $detail): ?>
                           <span class="image-dot <?php echo $index === 0 ? 'active' : ''; ?>"></span>
                       <?php endforeach; ?>
                   </div>
               </div>

               <div class="product-info">
                   <span class="category-label"><?php echo $product['category']; ?></span>
                   <h1 class="product-title"><?php echo $product['title']; ?></h1>
                   <p class="product-subtitle"><?php echo $product['subtitle']; ?></p>

                   <table class="info-table">
                       <tr>
                           <th>용량</th>
                           <td><?php echo $product['volume']; ?></td>
                       </tr>
                       <tr>
                           <th>제조번호 및 사용기한</th>
                           <td><?php echo $product['expiry']; ?></td>
                       </tr>
                       <tr>
                           <th>제조국</th>
                           <td><?php echo $product['country']; ?></td>
                       </tr>
                   </table>
               </div>
           </div>

           <div class="detail-content">
               <?php foreach($product['details'] as $detail): ?>
                   <img src="<?php echo $detail; ?>" alt="상세 이미지">
               <?php endforeach; ?>
           </div>
       </div>
   </div>
   <?php include '../inc/footer.php'; ?>

   <script>
       const dots = document.querySelectorAll('.image-dot');
       const mainImage = document.querySelector('.main-image img');
       const images = <?php echo json_encode($product['details']); ?>;

       dots.forEach((dot, index) => {
           dot.addEventListener('click', () => {
               dots.forEach(d => d.classList.remove('active'));
               dot.classList.add('active');
               mainImage.src = images[index];
           });
       });
   </script>
</body>
</html>