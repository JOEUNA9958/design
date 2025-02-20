<?php
require_once '../inc/db.php';
session_start();

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $password = $_POST['password'] ?? '';
    $action = $_POST['action'] ?? '';

    if (!$id || !$password || !$action) {
        $response['message'] = '필수 정보가 누락되었습니다.';
        echo json_encode($response);
        exit;
    }

    $stmt = $db->prepare("SELECT password FROM inquiry WHERE id = ?");
    $stmt->execute([$id]);
    $inquiry = $stmt->fetch();

    if (!$inquiry) {
        $response['message'] = '존재하지 않는 게시글입니다.';
    } else if (password_verify($password, $inquiry['password'])) {
        $_SESSION['verified_inquiry_' . $id . '_' . $action] = true;
        $response['success'] = true;
    } else {
        $response['message'] = '비밀번호가 일치하지 않습니다.';
    }
}

echo json_encode($response);
?>