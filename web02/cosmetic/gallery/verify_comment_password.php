<?php
include '../inc/db.php';

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT * FROM gallery_comments WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);

$response = ['success' => false];

if($stmt->rowCount() > 0) {
    $response['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>