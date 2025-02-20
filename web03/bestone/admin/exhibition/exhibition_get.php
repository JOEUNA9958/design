<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

$response = ['success' => false, 'data' => null, 'message' => ''];

try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if($id <= 0) {
        throw new Exception('유효하지 않은 전시회 ID입니다.');
    }
    
    $sql = "SELECT * FROM exhibitions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        $result = $stmt->get_result();
        
        if($row = $result->fetch_assoc()) {
            $response['success'] = true;
            $response['data'] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'start_date' => $row['start_date'],
                'end_date' => $row['end_date'],
                'image_url' => $row['image_url'],
                'view_count' => $row['view_count'],
                'created_at' => $row['created_at']
            ];
        } else {
            throw new Exception('전시회를 찾을 수 없습니다.');
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