<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$product = null;

if($id) {
    $sql = "SELECT * FROM brand_products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>브랜드명 상품 <?php echo $id ? '수정' : '등록'; ?></title>
    <style>
        .form-container {
            width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        .form-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background: #191919;
            color: white;
        }
        .btn-secondary {
            background: #f5f5f5;
            color: #333;
        }
        .image-preview {
            margin-top: 10px;
            max-width: 300px;
        }
        .image-preview img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">브랜드명 상품 <?php echo $id ? '수정' : '등록'; ?></h2>
        
        <form id="productForm" method="POST" action="brand_process.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?php echo $id ? 'update' : 'create'; ?>">
            <?php if($id): ?>
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label class="form-label">카테고리</label>
                <select name="category" class="form-select" required>
                    <option value="skincare" <?php echo ($product && $product['category'] == 'skincare') ? 'selected' : ''; ?>>스킨케어</option>
                    <option value="bodycare" <?php echo ($product && $product['category'] == 'bodycare') ? 'selected' : ''; ?>>바디케어</option>
                    <option value="diy" <?php echo ($product && $product['category'] == 'diy') ? 'selected' : ''; ?>>DIY 뷰티</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">제목</label>
                <input type="text" name="title" class="form-control" value="<?php echo $product ? htmlspecialchars($product['title']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">메인 이미지</label>
                <input type="file" name="image" class="form-control" <?php echo $id ? '' : 'required'; ?> accept="image/*">
                <?php if($product && $product['image_url']): ?>
                <div class="image-preview">
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="현재 이미지">
                </div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label class="form-label">상세 이미지</label>
                <input type="file" name="detail_image" class="form-control" accept="image/*">
                <?php if($product && $product['detail_image_url']): ?>
                <div class="image-preview">
                    <img src="<?php echo htmlspecialchars($product['detail_image_url']); ?>" alt="현재 상세 이미지">
                </div>
                <?php endif; ?>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn btn-primary"><?php echo $id ? '수정' : '등록'; ?></button>
                <button type="button" onclick="location.href='list.php'" class="btn btn-secondary">취소</button>
            </div>
        </form>
    </div>
</body>
</html>