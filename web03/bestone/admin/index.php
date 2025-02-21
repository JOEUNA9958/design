<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: /admin/login.php');
    exit;
}

include '../inc/db_conn.php';

// 통계 데이터 조회
$stats = [
    'oem_count' => 0,
    'brand_count' => 0,
    'exhibition_count' => 0,
    'notice_count' => 0,
    'inquiry_count' => 0,
    'recent_inquiries' => [],
    'popular_products' => []
];

// OEM/ODM 상품 수
$result = $conn->query("SELECT COUNT(*) as count FROM products");
if($result) {
    $stats['oem_count'] = $result->fetch_assoc()['count'];
}

// 브랜드 상품 수
$result = $conn->query("SELECT COUNT(*) as count FROM brand_products");
if($result) {
    $stats['brand_count'] = $result->fetch_assoc()['count'];
}

// 전시회 수
$result = $conn->query("SELECT COUNT(*) as count FROM exhibitions");
if($result) {
    $stats['exhibition_count'] = $result->fetch_assoc()['count'];
}

// 공지사항 수
$result = $conn->query("SELECT COUNT(*) as count FROM guide_posts");
if($result) {
    $stats['notice_count'] = $result->fetch_assoc()['count'];
}

// 미답변 문의 수
$result = $conn->query("SELECT COUNT(*) as count FROM inquiries WHERE status = 'pending'");
if($result) {
    $stats['inquiry_count'] = $result->fetch_assoc()['count'];
}

// 최근 문의 5개
$result = $conn->query("SELECT * FROM inquiries ORDER BY created_at DESC LIMIT 5");
if($result) {
    $stats['recent_inquiries'] = $result->fetch_all(MYSQLI_ASSOC);
}

// 조회수 높은 상품 5개
$result = $conn->query("SELECT * FROM products ORDER BY view_count DESC LIMIT 5");
if($result) {
    $stats['popular_products'] = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 대시보드</title>
    <style>
        .admin-container {
            width: 1280px;
            margin: 0 auto;
            padding: 20px;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        .stat-card {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #191919;
            margin-bottom: 10px;
        }
        .stat-label {
            color: #666;
            font-size: 14px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        .menu-item {
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #191919;
            transition: transform 0.2s;
        }
        .menu-item:hover {
            transform: translateY(-5px);
        }
        .menu-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .menu-desc {
            color: #666;
            font-size: 14px;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .summary-card {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .summary-title {
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .summary-list {
            list-style: none;
            padding: 0;
        }
        .summary-list li {
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            justify-content: space-between;
        }
        .logout-btn {
            padding: 8px 16px;
            background: #191919;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .menu-item {
            position: relative;
        }

        .badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #ff6b6b;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 40px 0;
        }

        .menu-item {
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #191919;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .menu-title {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .menu-desc {
            color: #666;
            font-size: 14px;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>관리자 대시보드</h1>
            <a href="/bestone/admin/logout.php" class="logout-btn">로그아웃</a>
        </div>
        
        <!-- 통계 -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['oem_count']; ?></div>
                <div class="stat-label">OEM/ODM 상품</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['brand_count']; ?></div>
                <div class="stat-label">브랜드 상품</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['exhibition_count']; ?></div>
                <div class="stat-label">전시회</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['notice_count']; ?></div>
                <div class="stat-label">공지사항</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['inquiry_count']; ?></div>
                <div class="stat-label">미답변 문의</div>
            </div>
        </div>
        
        <!-- 메뉴 그리드 -->
        <div class="menu-grid">
            <a href="/bestone/admin/oemodm/list.php" class="menu-item">  <!-- 경로 수정 -->
                <h2 class="menu-title">OEM/ODM 관리</h2>
                <p class="menu-desc">제품 등록 및 삭제, 수정</p>
            </a>
            
            <a href="/bestone/admin/brand/list.php" class="menu-item">  <!-- 경로 수정 -->
                <h2 class="menu-title">브랜드 관리</h2>
                <p class="menu-desc">브랜드 제품 등록 및 삭제, 수정</p>
            </a>
            
            <a href="/bestone/admin/guide/list.php" class="menu-item">  <!-- 경로 수정 -->
                <h2 class="menu-title">가이드라인</h2>
                <p class="menu-desc">공지사항 관리, 첨부파일</p>
            </a>
            
            <a href="/bestone/admin/exhibition/list.php" class="menu-item">  <!-- 경로 수정 -->
                <h2 class="menu-title">전시회</h2>
                <p class="menu-desc">갤러리 관리, 이미지 업로드</p>
            </a>
            
            <a href="/bestone/admin/inquiry/list.php" class="menu-item">  <!-- 경로 수정 -->
                <h2 class="menu-title">1:1 문의</h2>
                <p class="menu-desc">문의내역 확인 및 답변 <?php echo $stats['inquiry_count'] > 0 ? "<span class='badge'>{$stats['inquiry_count']}</span>" : ''; ?></p>
            </a>
        </div>
        
        <!-- 요약 정보 -->
        <div class="summary-grid">
            <div class="summary-card">
                <h3 class="summary-title">최근 문의</h3>
                <ul class="summary-list">
                    <?php foreach($stats['recent_inquiries'] as $inquiry): ?>
                    <li>
                        <span><?php echo htmlspecialchars($inquiry['title']); ?></span>
                        <span><?php echo date('Y-m-d', strtotime($inquiry['created_at'])); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="summary-card">
                <h3 class="summary-title">인기 상품</h3>
                <ul class="summary-list">
                    <?php foreach($stats['popular_products'] as $product): ?>
                    <li>
                        <span><?php echo htmlspecialchars($product['title']); ?></span>
                        <span>조회수 <?php echo $product['view_count']; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>