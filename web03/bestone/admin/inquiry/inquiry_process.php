<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'update_status':
            $id = $_POST['id'] ?? 0;
            $status = $_POST['status'] ?? '';
            
            if(!in_array($status, ['pending', 'completed'])) {
                throw new Exception('잘못된 상태값입니다.');
            }
            
            $sql = "UPDATE inquiries SET status = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $status, $id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '상태가 업데이트되었습니다.';
            }
            break;
            
        case 'delete':
            $id = $_POST['id'] ?? 0;
            
            // 첨부파일이 있는 경우 파일 삭제
            $result = $conn->query("SELECT file_path FROM inquiries WHERE id = $id");
            if($row = $result->fetch_assoc()) {
                if(!empty($row['file_path'])) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] . $row['file_path']);
                }
            }
            
            $sql = "DELETE FROM inquiries WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '문의가 삭제되었습니다.';
            }
            break;
            
        default:
            throw new Exception('잘못된 요청입니다.');
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>