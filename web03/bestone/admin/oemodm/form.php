<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = null;

if($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
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
    <title>상품 <?php echo $id ? '수정' : '등록'; ?></title>
    <style>
        .product-form {
            width: 800px;
            margin: 40px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .preview-image {
            max-width: 300px;
            margin-top: 10px;
        }
        .preview-image img {
            width: 100%;
            height: auto;
        }
        .button-area {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn {
            padding: 10px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit {
            background: #191919;
            color: white;
        }
        .btn-cancel {
            background: #f5f5f5;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="product-form">
        <h2><?php echo $id ? '상품 수정' : '상품 등록'; ?></h2>
        
        <form method="POST" action="product_process.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?php echo $id ? 'update' : 'create'; ?>">
            <?php if($id): ?>
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <?php endif; ?>

            <div class="form-group">
                <label>카테고리</label>
                <select name="category" required>
                    <option value="">선택하세요</option>
                    <option value="mask" <?php echo ($product && $product['category'] == 'mask') ? 'selected' : ''; ?>>마스크/코팩</option>
                    <option value="diy" <?php echo ($product && $product['category'] == 'diy') ? 'selected' : ''; ?>>DIY BEAUTY</option>
                    <option value="skincare" <?php echo ($product && $product['category'] == 'skincare') ? 'selected' : ''; ?>>SKINCARE</option>
                </select>
            </div>

            <div class="form-group">
                <label>제품명</label>
                <input type="text" name="title" value="<?php echo $product ? htmlspecialchars($product['title']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label>메인 이미지</label>
                <input type="file" name="image" <?php echo $id ? '' : 'required'; ?> accept="image/*" onchange="previewImage(this, 'mainPreview')">
                <div class="preview-image" id="mainPreview">
                    <?php if($product && $product['image_url']): ?>
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="현재 이미지">
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label>상세 이미지</label>
                <input type="file" name="detail_image" <?php echo $id ? '' : 'required'; ?> accept="image/*" onchange="previewImage(this, 'detailPreview')">
                <div class="preview-image" id="detailPreview">
                    <?php if($product && $product['detail_image_url']): ?>
                    <img src="<?php echo htmlspecialchars($product['detail_image_url']); ?>" alt="현재 상세 이미지">
                    <?php endif; ?>
                </div>
            </div>

            <div class="button-area">
                <button type="button" onclick="history.back()" class="btn btn-cancel">취소</button>
                <button type="submit" class="btn btn-submit"><?php echo $id ? '수정' : '등록'; ?></button>
            </div>
        </form>
    </div>

    <script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        preview.innerHTML = '';
        
        if(input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
</html>