<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

// 상품 목록 조회
$sql = "SELECT * FROM brand_products ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>브랜드명 관리</title>
    <style>
        .product-list {
            width: 1280px;
            margin: 0 auto;
            padding: 40px 0;
        }
        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .add-btn {
            padding: 10px 20px;
            background: #191919;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .product-item {
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
        }
        .product-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
        }
        .product-title {
            font-weight: 600;
            margin-bottom: 10px;
        }
        .product-category {
            color: #666;
            font-size: 14px;
        }
        .product-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .btn {
            flex: 1;
            padding: 8px 0;
            text-align: center;
            border: none;
            cursor: pointer;
        }
        .btn-edit {
            background: #f5f5f5;
            color: #333;
        }
        .btn-delete {
            background: #ff6b6b;
            color: white;
        }
    </style>
</head>
<body>
    <div class="product-list">
        <div class="list-header">
            <h2>브랜드명 상품 관리</h2>
            <a href="form.php" class="add-btn">상품 등록</a>
        </div>

        <div class="product-grid">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="product-item">
                <div class="product-image">
                    <?php
                    $image_url = $row['image_url'];
                    if (strpos($image_url, '/bestone') !== 0) {
                        $image_url = '/bestone' . $image_url;
                    }
                    $image_url = str_replace('/bestone/bestone', '/bestone', $image_url);
                    ?>
                    <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                </div>
                <div class="product-info">
                    <div class="product-title"><?php echo htmlspecialchars($row['title']); ?></div>
                    <div class="product-category"><?php echo htmlspecialchars($row['category']); ?></div>
                    <div class="product-buttons">
                        <button type="button" onclick="location.href='form.php?id=<?php echo $row['id']; ?>'" class="btn btn-edit">수정</button>
                        <button type="button" onclick="deleteProduct(<?php echo $row['id']; ?>)" class="btn btn-delete">삭제</button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
    function deleteProduct(id) {
        if(confirm('정말 삭제하시겠습니까?')) {
            fetch('brand_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=delete&product_id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message || '삭제 실패');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('삭제 중 오류가 발생했습니다.');
            });
        }
    }
    </script>
</body>
</html>