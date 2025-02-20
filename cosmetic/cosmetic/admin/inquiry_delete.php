<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];

// 첨부파일이 있다면 삭제
$sql = "SELECT file_name FROM inquiries WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$file = $stmt->fetch();

if($file && $file['file_name']) {
    $file_path = '../uploads/' . $file['file_name'];
    if(file_exists($file_path)) {
        unlink($file_path);
    }
}

// 게시글 삭제
$sql = "DELETE FROM inquiries WHERE id = ?";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$id]);

if($result) {
    echo "<script>alert('삭제되었습니다.'); location.href='inquiry_list.php';</script>";
} else {
    echo "<script>alert('삭제에 실패했습니다.'); history.back();</script>";
}
?>