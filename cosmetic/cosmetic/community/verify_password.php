<?php
include '../inc/db.php';

$id = $_POST['id'];
$password = $_POST['password'];

// 비밀번호 확인
$sql = "SELECT * FROM inquiries WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);
$post = $stmt->fetch();

$response = ['success' => false];

if($post) {
    $response['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);