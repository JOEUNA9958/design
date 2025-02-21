<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$response = ['success' => false, 'message' => '', 'post' => null];

try {
    $action = $_POST['action'] ?? $_GET['action'] ?? '';
    
    switch($action) {
        case 'create':
        case 'update':
            $post_id = $_POST['post_id'] ?? '';
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            
            // 파일 업로드 처리
            $file_name = '';
            $file_path = '';
            if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] === 0) {
                $upload_dir = '../../uploads/guide/';
                if(!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                $ext = strtolower(pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION));
                if($ext !== 'pdf') {
                    throw new Exception('PDF 파일만 업로드 가능합니다.');
                }
                
                $file_name = $_FILES['attachment']['name'];
                $unique_name = uniqid() . '.pdf';
                $file_path = '/bestone/uploads/guide/' . $unique_name;
                
                if(!move_uploaded_file($_FILES['attachment']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $file_path)) {
                    throw new Exception('파일 업로드에 실패했습니다.');
                }
            }
            
            if($action === 'create') {
                $sql = "INSERT INTO guide_posts (title, content, file_name, file_path) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $title, $content, $file_name, $file_path);
            } else {
                // 수정 시 파일이 새로 업로드된 경우에만 파일 정보 업데이트
                if(empty($file_name)) {
                    $sql = "UPDATE guide_posts SET title = ?, content = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssi", $title, $content, $post_id);
                } else {
                    // 기존 파일 삭제
                    $result = $conn->query("SELECT file_path FROM guide_posts WHERE id = $post_id");
                    if($row = $result->fetch_assoc()) {
                        if(!empty($row['file_path'])) {
                            @unlink($_SERVER['DOCUMENT_ROOT'] . $row['file_path']);
                        }
                    }
                    
                    $sql = "UPDATE guide_posts SET title = ?, content = ?, file_name = ?, file_path = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssi", $title, $content, $file_name, $file_path, $post_id);
                }
            }
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = $action === 'create' ? '글이 등록되었습니다.' : '글이 수정되었습니다.';
            }
            break;
            
        case 'delete':
            $post_id = $_POST['post_id'] ?? '';
            
            // 기존 파일 삭제
            $result = $conn->query("SELECT file_path FROM guide_posts WHERE id = $post_id");
            if($row = $result->fetch_assoc()) {
                if(!empty($row['file_path'])) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] . $row['file_path']);
                }
            }
            
            $sql = "DELETE FROM guide_posts WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $post_id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '글이 삭제되었습니다.';
            }
            break;
            
        case 'get':
            if(!empty($_GET['post_id'])) {
                $post_id = (int)$_GET['post_id'];
                $sql = "SELECT * FROM guide_posts WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $post_id);
                
                if($stmt->execute()) {
                    $result = $stmt->get_result();
                    if($post = $result->fetch_assoc()) {
                        $response['success'] = true;
                        $response['post'] = $post;
                    } else {
                        throw new Exception('게시글을 찾을 수 없습니다.');
                    }
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
    exit;
} elseif($action !== 'get') { // get 요청이 아닐 때만 리다이렉트
    if($response['success']) {
        echo "<script>
            alert('".$response['message']."');
            location.href = 'list.php';
        </script>";
    } else {
        echo "<script>
            alert('".$response['message']."');
            history.back();
        </script>";
    }
}
?>