<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'create':
        case 'update':
            $exhibition_id = $_POST['exhibition_id'] ?? '';
            $title = $_POST['title'] ?? '';
            $start_date = $_POST['start_date'] ?? '';
            $end_date = $_POST['end_date'] ?? '';
            
            // 이미지 업로드 처리
            $image_url = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $upload_dir = '../../uploads/exhibitions/';
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
                    $image_url = '/bestone/uploads/exhibitions/' . $filename; // 경로 수정
                } else {
                    throw new Exception('파일 업로드에 실패했습니다.');
                }
            }
            
            if($action === 'create') {
                if(empty($image_url)) {
                    throw new Exception('이미지는 필수입니다.');
                }
                
                $sql = "INSERT INTO exhibitions (title, start_date, end_date, image_url) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $title, $start_date, $end_date, $image_url);
            } else {
                // 기존 이미지 정보 가져오기
                if(empty($image_url)) {
                    $result = $conn->query("SELECT image_url FROM exhibitions WHERE id = $exhibition_id");
                    $current = $result->fetch_assoc();
                    $image_url = $current['image_url'];
                } else {
                    // 기존 이미지 파일 삭제
                    $result = $conn->query("SELECT image_url FROM exhibitions WHERE id = $exhibition_id");
                    if($row = $result->fetch_assoc()) {
                        @unlink($_SERVER['DOCUMENT_ROOT'] . $row['image_url']);
                    }
                }
                
                $sql = "UPDATE exhibitions SET title = ?, start_date = ?, end_date = ?, image_url = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $title, $start_date, $end_date, $image_url, $exhibition_id);
            }
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = $action === 'create' ? '전시회가 등록되었습니다.' : '전시회가 수정되었습니다.';
            }
            break;
            
        case 'delete':
            $exhibition_id = $_POST['exhibition_id'] ?? '';
            
            // 기존 이미지 파일 삭제
            $result = $conn->query("SELECT image_url FROM exhibitions WHERE id = $exhibition_id");
            if($row = $result->fetch_assoc()) {
                @unlink($_SERVER['DOCUMENT_ROOT'] . $row['image_url']);
            }
            
            // 댓글 삭제 (cascade 설정이 없는 경우)
            $conn->query("DELETE FROM exhibition_comments WHERE exhibition_id = $exhibition_id");
            
            // 전시회 삭제
            $sql = "DELETE FROM exhibitions WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $exhibition_id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '전시회가 삭제되었습니다.';
            }
            break;
    }
    
} catch(Exception $e) {
    $response['message'] = $e->getMessage();
}

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // AJAX 요청인 경우
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // 일반 폼 제출인 경우
    if($response['success']) {
        header('Location: list.php');
    } else {
        echo "<script>alert('".$response['message']."'); history.back();</script>";
    }
}
?>