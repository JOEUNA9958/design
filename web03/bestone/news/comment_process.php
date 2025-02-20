<?php
include '../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? 'create';
    
    if ($action === 'create') {
        $exhibition_id = $_POST['exhibition_id'] ?? 0;
        $author = $_POST['author'] ?? '';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $content = $_POST['content'] ?? '';
        
        $sql = "INSERT INTO exhibition_comments (exhibition_id, author, password, content) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $exhibition_id, $author, $password, $content);
        
        if($stmt->execute()) {
            $response['success'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } elseif ($action === 'delete') {
        $comment_id = $_POST['comment_id'] ?? 0;
        $password = $_POST['password'] ?? '';
        
        // 비밀번호 확인
        $check_sql = "SELECT password FROM exhibition_comments WHERE id = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("i", $comment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $comment = $result->fetch_assoc();
        
        if($comment && password_verify($password, $comment['password'])) {
            $sql = "DELETE FROM exhibition_comments WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $comment_id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '댓글이 삭제되었습니다.';
            }
        } else {
            $response['message'] = '비밀번호가 일치하지 않습니다.';
        }
    }
} catch(Exception $e) {
    $response['message'] = '오류가 발생했습니다: ' . $e->getMessage();
}

if ($action === 'delete') {
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>