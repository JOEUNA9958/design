<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'create':
        case 'update':
            $product_id = $_POST['product_id'] ?? '';
            $category = $_POST['category'] ?? '';
            $title = $_POST['title'] ?? '';
            
            // 이미지 업로드 처리
            $upload_dir = '../../uploads/brand/';
            if(!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            // 메인 이미지 처리
            $image_url = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $ext;
                $filepath = $upload_dir . $filename;
                
                if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
                    $image_url = '/bestone/uploads/brand/' . $filename;
                } else {
                    throw new Exception('메인 이미지 업로드에 실패했습니다.');
                }
            }
            
            // 상세 이미지 처리
            $detail_image_url = '';
            if(isset($_FILES['detail_image']) && $_FILES['detail_image']['error'] === 0) {
                $ext = pathinfo($_FILES['detail_image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '_detail.' . $ext;
                $filepath = $upload_dir . $filename;
                
                if(move_uploaded_file($_FILES['detail_image']['tmp_name'], $filepath)) {
                    $detail_image_url = '/bestone/uploads/brand/' . $filename;
                } else {
                    throw new Exception('상세 이미지 업로드에 실패했습니다.');
                }
            }
            
            if($action === 'create') {
                if(empty($image_url)) {
                    throw new Exception('메인 이미지는 필수입니다.');
                }
                
                $sql = "INSERT INTO brand_products (category, title, image_url, detail_image_url) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $category, $title, $image_url, $detail_image_url);
            } else {
                // 기존 이미지 정보 가져오기
                if(empty($image_url) || empty($detail_image_url)) {
                    $result = $conn->query("SELECT image_url, detail_image_url FROM brand_products WHERE id = $product_id");
                    $current = $result->fetch_assoc();
                    if(empty($image_url)) $image_url = $current['image_url'];
                    if(empty($detail_image_url)) $detail_image_url = $current['detail_image_url'];
                }
                
                $sql = "UPDATE brand_products SET category = ?, title = ?, image_url = ?, detail_image_url = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $category, $title, $image_url, $detail_image_url, $product_id);
            }
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = $action === 'create' ? '상품이 등록되었습니다.' : '상품이 수정되었습니다.';
                
                // 새로 생성된 상품의 ID 반환 (create의 경우)
                if($action === 'create') {
                    $response['product_id'] = $conn->insert_id;
                }
            } else {
                throw new Exception('데이터베이스 처리 중 오류가 발생했습니다.');
            }
            break;
            
        case 'delete':
            $product_id = $_POST['product_id'] ?? '';
            
            if(empty($product_id)) {
                throw new Exception('상품 ID가 필요합니다.');
            }
            
            // 기존 이미지 파일 삭제
            $result = $conn->query("SELECT image_url, detail_image_url FROM brand_products WHERE id = $product_id");
            if($row = $result->fetch_assoc()) {
                if(!empty($row['image_url'])) {
                    $file_path = $_SERVER['DOCUMENT_ROOT'] . $row['image_url'];
                    if(file_exists($file_path)) @unlink($file_path);
                }
                if(!empty($row['detail_image_url'])) {
                    $file_path = $_SERVER['DOCUMENT_ROOT'] . $row['detail_image_url'];
                    if(file_exists($file_path)) @unlink($file_path);
                }
            }
            
            $sql = "DELETE FROM brand_products WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $product_id);
            
            if($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = '상품이 삭제되었습니다.';
            } else {
                throw new Exception('삭제 처리 중 오류가 발생했습니다.');
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
    exit;
} else {
    // 일반 폼 제출인 경우 리다이렉트
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