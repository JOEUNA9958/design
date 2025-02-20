<?php
include '../inc/db_conn.php';

$response = ['success' => false, 'message' => ''];

try {
    // 필수 필드 검증
    $required_fields = ['title', 'company', 'author', 'phone', 'product_type', 'content'];
    foreach($required_fields as $field) {
        if(empty($_POST[$field])) {
            throw new Exception('모든 필수 항목을 입력해주세요.');
        }
    }

    // 개인정보 동의 확인
    if(!isset($_POST['privacy_agreed'])) {
        throw new Exception('개인정보 처리방침에 동의해주세요.');
    }

    // 파일 업로드 처리
    $file_name = '';
    $file_path = '';
    if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] === 0) {
        $upload_dir = '../uploads/inquiries/';
        if(!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $original_name = $_FILES['attachment']['name'];
        $file_name = $original_name;
        $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx'];
        
        if(!in_array($ext, $allowed_types)) {
            throw new Exception('허용되지 않는 파일 형식입니다.');
        }
        
        $unique_name = uniqid() . '.' . $ext;
        $file_path = '/bestone/uploads/inquiries/' . $unique_name;
        
        if(!move_uploaded_file($_FILES['attachment']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $file_path)) {
            throw new Exception('파일 업로드에 실패했습니다.');
        }
    }

    // DB 저장
    $sql = "INSERT INTO inquiries (
        title, company, author, phone, product_type, purpose, 
        quantity, email, content, file_name, file_path, privacy_agreed
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssss",
        $_POST['title'],
        $_POST['company'],
        $_POST['author'],
        $_POST['phone'],
        $_POST['product_type'],
        $_POST['purpose'],
        $_POST['quantity'],
        $_POST['email'],
        $_POST['content'],
        $file_name,
        $file_path
    );

    if($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = '문의가 접수되었습니다.';
    } else {
        throw new Exception('문의 저장에 실패했습니다.');
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
        echo "<script>alert('문의가 접수되었습니다.'); location.href='inquiry.php';</script>";
    } else {
        echo "<script>alert('".$response['message']."'); history.back();</script>";
    }
}
?>