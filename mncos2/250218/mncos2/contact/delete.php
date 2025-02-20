<?php
require_once '../inc/db.php';
session_start();

$id = $_POST['id'] ?? 0;

if (!isset($_SESSION['verified_inquiry_' . $id . '_delete'])) {
    echo json_encode(['success' => false, 'message' => '비밀번호 확인이 필요합니다.']);
    exit;
}

try {
    $stmt = $db->prepare("DELETE FROM inquiry WHERE id = ?");
    $stmt->execute([$id]);
    
    unset($_SESSION['verified_inquiry_' . $id . '_delete']);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => '삭제 중 오류가 발생했습니다.']);
}
?>