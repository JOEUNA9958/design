<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
   $action = $_POST['action'] ?? '';
   
   switch($action) {
       case 'create':
       case 'update':
           $product_id = $_POST['product_id'] ?? '';
           $category = $_POST['category'] ?? '';
           $title = $_POST['title'] ?? '';
           
           // 이미지 업로드 처리
           $upload_dir = '../../uploads/products/';
           if(!is_dir($upload_dir)) {
               mkdir($upload_dir, 0777, true);
           }
           
           // 메인 이미지 처리
           $image_url = '';
           if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
               $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
               $filename = uniqid() . '.' . $ext;
               $filepath = $upload_dir . $filename;
               
               if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
                   $image_url = '/bestone/uploads/products/' . $filename;
               }
           }
           
           // 상세 이미지 처리
           $detail_image_url = '';
           if(isset($_FILES['detail_image']) && $_FILES['detail_image']['error'] === 0) {
               $ext = pathinfo($_FILES['detail_image']['name'], PATHINFO_EXTENSION);
               $filename = uniqid() . '_detail.' . $ext;
               $filepath = $upload_dir . $filename;
               
               if(move_uploaded_file($_FILES['detail_image']['tmp_name'], $filepath)) {
                   $detail_image_url = '/bestone/uploads/products/' . $filename;
               }
           }
           
           if($action === 'create') {
               $sql = "INSERT INTO products (category, title, image_url, detail_image_url) VALUES (?, ?, ?, ?)";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("ssss", $category, $title, $image_url, $detail_image_url);
           } else {
               // 기존 이미지 URL 유지 (새 이미지가 없는 경우)
               if(empty($image_url) || empty($detail_image_url)) {
                   $result = $conn->query("SELECT image_url, detail_image_url FROM products WHERE id = $product_id");
                   $current = $result->fetch_assoc();
                   if(empty($image_url)) $image_url = $current['image_url'];
                   if(empty($detail_image_url)) $detail_image_url = $current['detail_image_url'];
               }
               
               $sql = "UPDATE products SET category = ?, title = ?, image_url = ?, detail_image_url = ? WHERE id = ?";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("ssssi", $category, $title, $image_url, $detail_image_url, $product_id);
           }
           
           if($stmt->execute()) {
               $response['success'] = true;
               $response['message'] = $action === 'create' ? '상품이 등록되었습니다.' : '상품이 수정되었습니다.';
           }
           break;
           
       case 'delete':
           $product_id = $_POST['product_id'] ?? '';
           
           // 기존 이미지 파일 삭제
           $result = $conn->query("SELECT image_url, detail_image_url FROM products WHERE id = $product_id");
           if($row = $result->fetch_assoc()) {
               if(!empty($row['image_url'])) @unlink($_SERVER['DOCUMENT_ROOT'] . $row['image_url']);
               if(!empty($row['detail_image_url'])) @unlink($_SERVER['DOCUMENT_ROOT'] . $row['detail_image_url']);
           }
           
           $sql = "DELETE FROM products WHERE id = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("i", $product_id);
           
           if($stmt->execute()) {
               $response['success'] = true;
               $response['message'] = '상품이 삭제되었습니다.';
           }
           break;
   }
   
} catch(Exception $e) {
   $response['message'] = '오류가 발생했습니다: ' . $e->getMessage();
}

// AJAX 요청인 경우 JSON 응답
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // 여기서 종료하여 추가 출력 방지
} 
// 일반 폼 제출인 경우 리다이렉트
else {
    if($response['success']) {
        echo "<script>
            alert('".$response['message']."');
            location.href = '/bestone/admin/oemodm/list.php';
        </script>";
    } else {
        echo "<script>
            alert('".$response['message']."');
            history.back();
        </script>";
    }
}
?>