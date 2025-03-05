<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_POST['id'];
$answer = $_POST['answer'];

if(empty($answer)) {
    // 답변이 비어있으면 답변 삭제
    $sql = "UPDATE inquiries SET answer = NULL, answer_date = NULL, status = 'waiting' WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
} else {
    // 답변 등록/수정
    $sql = "UPDATE inquiries SET answer = ?, answer_date = NOW(), status = 'completed' WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$answer, $id]);
}

header('Location: inquiry_view.php?id=' . $id);
?>