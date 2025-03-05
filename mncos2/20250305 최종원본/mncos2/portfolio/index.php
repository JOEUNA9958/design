<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - M&COS</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>PORTFOLIO</h2>
        <p>엠앤코스의 다양한 포트폴리오를 소개합니다.</p>
    </div>

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

    <div class="portfolio-content">
        <div class="portfolio-title">
            <h2>PORTFOLIO</h2>
        </div>

        <div class="portfolio-info">
            <p>총 <?= $total_items ?>개의 상품이 있습니다.</p>
            <p class="portfolio-sort">신상품</p>
        </div>

        <div class="portfolio-grid">
            <?php foreach($current_items as $item): ?>
            <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                <img src="../images/portfolio/<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
                <h3><?= $item['title'] ?></h3>
                <p class="portfolio-subtitle"><?= $item['subtitle'] ?></p>
                <div class="portfolio-desc">
                    <?php foreach($item['desc'] as $desc): ?>
                        <p><?= $desc ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if($total_pages > 1): ?>
        <div class="portfolio-pagination">
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