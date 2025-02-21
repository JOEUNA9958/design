<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}
if($category_filter) {
    $where_clause .= " AND category = '".mysqli_real_escape_string($conn, $category_filter)."'";
}

$sql = "SELECT * FROM brand_products $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>브랜드 상품 관리</title>
    <!-- 스타일시트는 기존 admin_product.php와 동일 -->
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>브랜드 상품 관리</h1>
            <button onclick="openModal()" class="btn btn-primary">상품 등록</button>
        </div>

        <div class="filter-section">
            <select name="category" onchange="filterProducts(this.value)">
                <option value="">전체 카테고리</option>
                <option value="skincare">스킨케어</option>
                <option value="bodycare">바디케어</option>
                <option value="diy">DIY 뷰티</option>
            </select>
            <input type="text" placeholder="상품명 검색" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button onclick="searchProducts()" class="btn btn-primary">검색</button>
        </div>

        <!-- 테이블 구조와 자바스크립트는 기존 admin_product.php와 동일 -->
    </div>
</body>
</html>