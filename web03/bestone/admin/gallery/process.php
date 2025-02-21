<?php
session_start();
include '../../inc/admin_check.php';
include '../../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'update':
            $id = $_POST['id'] ?? 0;
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            
            if(empty($title) || empty($content)) {
                throw new Exception('제목과 내용을 모두 입력해주세요.');
            }
            
            // 새 이미지 업로드 처리
            $image_url = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $upload_dir = '../../uploads/gallery/';
                if(!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                
                if(!in_array($ext, $allowed_types)) {
                    throw new Exception('허용되지 않는 파일 형식입니다.');
                }
                
                $filename = uniqid() . '.' . $ext;
                $filepath = $upload_dir . $filename;
                
                if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
                    $image_url = '/uploads/gallery/' . $filename;
                    
                    // 기존 이미지 삭제
                    $old_image = $conn->query("SELECT image_url FROM gallery_posts WHERE id = $id")->fetch_assoc()['image_url'];
                    if($old_image && file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $old_image);
                    }
                }
            }
            
            // 이미지가 변경된 경우와 아닌 경우
            $sql = $image_url ? 
                "UPDATE gallery_posts SET title = ?, content = ?, image_url = ? WHERE id = ?" :
                "UPDATE gallery_posts SET title = ?, content = ? WHERE id = ?";
                
            $stmt = $conn->prepare($sql);
            
            if($image_url) {
                $stmt->bind_param("sssi", $title, $content, $image_url, $id);
            } else {
                $stmt->bind_param("ssi", $title, $content, $id);
            }
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '게시글이 수정되었습니다.';
            }
            break;
            
        case 'delete':
            $id = $_POST['id'] ?? 0;
            
            // 이미지 파일 삭제
            $result = $conn->query("SELECT image_url FROM gallery_posts WHERE id = $id");
            if($row = $result->fetch_assoc()) {
                if($row['image_url'] && file_exists($_SERVER['DOCUMENT_ROOT'] . $row['image_url'])) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $row['image_url']);
                }
            }
            
            // 게시글 삭제 (댓글은 CASCADE로 자동 삭제)
            $sql = "DELETE FROM gallery_posts WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '게시글이 삭제되었습니다.';
            }
            break;
            
        case 'delete_comment':
            $id = $_POST['id'] ?? 0;
            
            // 댓글 정보 조회 (게시글 댓글 수 업데이트를 위해)
            $result = $conn->query("SELECT post_id FROM gallery_comments WHERE id = $id");
            if($comment = $result->fetch_assoc()) {
                // 댓글 삭제
                $sql = "DELETE FROM gallery_comments WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                
                if($stmt->execute()) {
                    // 게시글의 댓글 수 업데이트
                    $conn->query("UPDATE gallery_posts SET comment_count = comment_count - 1 WHERE id = {$comment['post_id']}");
                    
                    $response['success'] = true;
                    $response['message'] = '댓글이 삭제되었습니다.';
                }
            }
            break;
            
        default:
            throw new Exception('잘못된 요청입니다.');
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

// AJAX 요청과 일반 요청 구분
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    if($response['success']) {
        if($action === 'update') {
            header('Location: view.php?id=' . $_POST['id']);
        } else {
            header('Location: list.php');
        }
    } else {
        echo "<script>alert('".$response['message']."'); history.back();</script>";
    }
}
?>