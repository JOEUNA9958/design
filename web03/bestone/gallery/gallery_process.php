<?php
include '../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'check_password':
            $id = $_POST['id'] ?? 0;
            $password = $_POST['password'] ?? '';
            
            $sql = "SELECT password FROM gallery_posts WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $post = $result->fetch_assoc();
            
            if($post && password_verify($password, $post['password'])) {
                $response['success'] = true;
            } else {
                $response['message'] = '비밀번호가 일치하지 않습니다.';
            }
            break;

        case 'write':
            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $content = $_POST['content'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            // 이미지 업로드 처리
            $image_url = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $upload_dir = '../uploads/gallery/';
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
                    $image_url = '/bestone/uploads/gallery/' . $filename;  // 여기를 수정
                } else {
                    throw new Exception('파일 업로드에 실패했습니다.');
                }
            }
            
            $sql = "INSERT INTO gallery_posts (title, author, content, password, image_url) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $title, $author, $content, $password, $image_url);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '게시글이 등록되었습니다.';
                $response['id'] = $conn->insert_id;
            }
            break;
            
        case 'edit':
            $id = $_POST['id'] ?? 0;
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // 비밀번호 확인
            $check_sql = "SELECT * FROM gallery_posts WHERE id = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $post = $result->fetch_assoc();
            
            if(!$post || !password_verify($password, $post['password'])) {
                throw new Exception('비밀번호가 일치하지 않습니다.');
            }
            
            // 새 이미지 업로드 처리
            $image_url = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $upload_dir = '../uploads/gallery/';
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                
                if(!in_array($ext, $allowed_types)) {
                    throw new Exception('허용되지 않는 파일 형식입니다.');
                }
                
                $filename = uniqid() . '.' . $ext;
                $filepath = $upload_dir . $filename;
                
                if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
                    $image_url = '/bestone/uploads/gallery/' . $filename;  // 여기를 수정
                    
                    // 기존 이미지 삭제
                    if($post['image_url'] && file_exists($_SERVER['DOCUMENT_ROOT'] . $post['image_url'])) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $post['image_url']);
                    }
                }
            }
            
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
            $password = $_POST['password'] ?? '';
            
            // 비밀번호 확인
            $check_sql = "SELECT * FROM gallery_posts WHERE id = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $post = $result->fetch_assoc();
            
            if(!$post || !password_verify($password, $post['password'])) {
                throw new Exception('비밀번호가 일치하지 않습니다.');
            }
            
            // 이미지 파일 삭제
            if($post['image_url'] && file_exists($_SERVER['DOCUMENT_ROOT'] . $post['image_url'])) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $post['image_url']);
            }
            
            $sql = "DELETE FROM gallery_posts WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '게시글이 삭제되었습니다.';
            }
            break;
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    if($response['success']) {
        if($action === 'write' || $action === 'edit') {
            header('Location: gallery_view.php?id=' . ($response['id'] ?? $_POST['id']));
        } else {
            header('Location: gallery.php');
        }
    } else {
        echo "<script>alert('".$response['message']."'); history.back();</script>";
    }
}
?>