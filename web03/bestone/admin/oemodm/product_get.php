<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

$response = ['success' => false, 'data' => null];

try {
    $id = $_GET['id'] ?? 0;
    
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($row = $result->fetch_assoc()) {
        $response['success'] = true;
        $response['data'] = [
            'id' => $row['id'],
            'category' => $row['category'],
            'title' => $row['title'],
            'image_url' => $row['image_url'],
            'detail_image_url' => $row['detail_image_url']
        ];
    }
    
} catch(Exception $e) {
    $response['message'] = '오류가 발생했습니다: ' . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>