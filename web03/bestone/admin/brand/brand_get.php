<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

$response = ['success' => false, 'data' => null, 'message' => ''];

try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if($id <= 0) {
        throw new Exception('유효하지 않은 상품 ID입니다.');
    }
    
    $sql = "SELECT * FROM brand_products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        $result = $stmt->get_result();
        
        if($row = $result->fetch_assoc()) {
            $response['success'] = true;
            $response['data'] = [
                'id' => $row['id'],
                'category' => $row['category'],
                'title' => $row['title'],
                'image_url' => $row['image_url'],
                'detail_image_url' => $row['detail_image_url'],
                'created_at' => $row['created_at']
            ];
        } else {
            throw new Exception('상품을 찾을 수 없습니다.');
        }
    } else {
        throw new Exception('데이터베이스 조회 중 오류가 발생했습니다.');
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>