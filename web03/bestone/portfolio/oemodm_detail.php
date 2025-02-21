<?php
include $_SERVER['DOCUMENT_ROOT'].'/bestone/inc/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/bestone/inc/db_conn.php';

// 상품 ID 가져오기
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// 상품 정보 조회
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// 이전/다음 상품 ID 조회
$prev_sql = "SELECT id FROM products WHERE id < ? ORDER BY id DESC LIMIT 1";
$next_sql = "SELECT id FROM products WHERE id > ? ORDER BY id ASC LIMIT 1";

$stmt_prev = $conn->prepare($prev_sql);
$stmt_prev->bind_param("i", $id);
$stmt_prev->execute();
$prev_result = $stmt_prev->get_result();
$prev_id = $prev_result->fetch_assoc()['id'] ?? null;

$stmt_next = $conn->prepare($next_sql);
$stmt_next->bind_param("i", $id);
$stmt_next->execute();
$next_result = $stmt_next->get_result();
$next_id = $next_result->fetch_assoc()['id'] ?? null;
?>

<div class="sub-banner">
    <h2 class="banner-title">PORTFOLIO</h2>
</div>

<div class="container">
    <div class="detail-section">
        <div class="detail-table">
            <div class="detail-row">
                <div class="detail-label">카테고리</div>
                <div class="detail-content"><?php echo $product['category']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">제목</div>
                <div class="detail-content"><?php echo $product['title']; ?></div>
            </div>
            <div class="detail-content-area">
            <div class="detail-images">
                <?php
                // 메인 이미지 처리
                $image_url = $product['image_url'];
                if (strpos($image_url, '/bestone') !== 0) {
                    $image_url = '/bestone' . $image_url;
                }
                $image_url = str_replace('/bestone/bestone', '/bestone', $image_url);
                
                // 상세 이미지 처리
                $detail_image_url = $product['detail_image_url'];
                if ($detail_image_url && strpos($detail_image_url, '/bestone') !== 0) {
                    $detail_image_url = '/bestone' . $detail_image_url;
                }
                if ($detail_image_url) {
                    $detail_image_url = str_replace('/bestone/bestone', '/bestone', $detail_image_url);
                }
                ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" class="main-image">
                <?php if($detail_image_url) { ?>
                    <img src="<?php echo htmlspecialchars($detail_image_url); ?>" alt="제품 상세" class="desc-image">
                <?php } ?>
            </div>
            </div>
            
            <!-- 이전/다음 네비게이션 -->
            <div class="nav-buttons">
                <?php if($prev_id) { ?>
                    <a href="/bestone/portfolio/oemodm_detail.php?id=<?php echo $prev_id; ?>" class="nav-btn prev">이전</a>
                <?php } else { ?>
                    <button class="nav-btn prev" disabled>이전</button>
                <?php } ?>
                
                <?php if($next_id) { ?>
                    <a href="/bestone/portfolio/oemodm_detail.php?id=<?php echo $next_id; ?>" class="nav-btn next">다음</a>
                <?php } else { ?>
                    <button class="nav-btn next" disabled>다음</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<style>
.detail-section {
    padding: 80px 0;
}

.detail-table {
    width: 1280px;
    margin: 0 auto;
}

.detail-row {
    display: flex;
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
}

.detail-label {
    width: 200px;
    font-weight: 600;
}

.detail-content-area {
    padding: 40px 0;
}

.detail-images {
    text-align: center;
}

.detail-images img {
    max-width: 100%;
    margin-bottom: 30px;
}

.nav-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
}

.nav-btn {
    padding: 10px 30px;
    background: #191919;
    color: white;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.nav-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
}

@media screen and (max-width: 1024px) {
    .mobile-menu-btn {
        left: 90%;
    }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'].'/bestone/inc/footer.php'; ?>