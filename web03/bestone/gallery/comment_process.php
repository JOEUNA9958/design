<?php
include '../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'check_password':
            $id = $_POST['id'] ?? 0;
            $password = $_POST['password'] ?? '';
            
            $sql = "SELECT password FROM gallery_comments WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $comment = $result->fetch_assoc();
            
            if($comment && password_verify($password, $comment['password'])) {
                $response['success'] = true;
            } else {
                $response['message'] = '비밀번호가 일치하지 않습니다.';
            }
            break;

        case 'write':
            $post_id = $_POST['post_id'] ?? 0;
            $author = $_POST['author'] ?? '';
            $content = $_POST['content'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            if(empty($author) || empty($content)) {
                throw new Exception('작성자와 내용을 모두 입력해주세요.');
            }
            
            $sql = "INSERT INTO gallery_comments (post_id, author, content, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $post_id, $author, $content, $password);
            
            if($stmt->execute()) {
                // 댓글 수 업데이트
                $conn->query("UPDATE gallery_posts SET comment_count = comment_count + 1 WHERE id = $post_id");
                
                $response['success'] = true;
                $response['message'] = '댓글이 등록되었습니다.';
                $response['comment_id'] = $conn->insert_id;
            }
            break;
            
        case 'edit':
            $id = $_POST['id'] ?? 0;
            $content = $_POST['content'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if(empty($content)) {
                throw new Exception('댓글 내용을 입력해주세요.');
            }
            
            // 비밀번호 확인
            $check_sql = "SELECT password FROM gallery_comments WHERE id = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $comment = $result->fetch_assoc();
            
            if(!$comment || !password_verify($password, $comment['password'])) {
                throw new Exception('비밀번호가 일치하지 않습니다.');
            }
            
            $sql = "UPDATE gallery_comments SET content = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $content, $id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '댓글이 수정되었습니다.';
            }
            break;
            
        case 'delete':
            $id = $_POST['id'] ?? 0;
            $password = $_POST['password'] ?? '';
            
            // 비밀번호 확인
            $check_sql = "SELECT password, post_id FROM gallery_comments WHERE id = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $comment = $result->fetch_assoc();
            
            if(!$comment || !password_verify($password, $comment['password'])) {
                throw new Exception('비밀번호가 일치하지 않습니다.');
            }
            
            $sql = "DELETE FROM gallery_comments WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            
            if($stmt->execute()) {
                // 댓글 수 감소
                $conn->query("UPDATE gallery_posts SET comment_count = comment_count - 1 WHERE id = {$comment['post_id']}");
                
                $response['success'] = true;
                $response['message'] = '댓글이 삭제되었습니다.';
            }
            break;

        default:
            throw new Exception('잘못된 요청입니다.');
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

// AJAX 요청인 경우 JSON 응답
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // 일반 폼 제출인 경우 리다이렉트
    if($response['success']) {
        $redirect_url = 'gallery_view.php?id=' . ($_POST['post_id'] ?? $_POST['id']);
        header('Location: ' . $redirect_url);
    } else {
        echo "<script>alert('".$response['message']."'); history.back();</script>";
    }
}
?>