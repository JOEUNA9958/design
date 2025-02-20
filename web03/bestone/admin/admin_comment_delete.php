<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $comment_id = $_POST['comment_id'] ?? 0;
    
    if($comment_id <= 0) {
        throw new Exception('유효하지 않은 댓글 ID입니다.');
    }
    
    $sql = "DELETE FROM exhibition_comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);
    
    if($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = '댓글이 삭제되었습니다.';
    } else {
        throw new Exception('댓글 삭제 중 오류가 발생했습니다.');
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>