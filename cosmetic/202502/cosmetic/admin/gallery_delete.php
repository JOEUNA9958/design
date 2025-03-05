<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];

// 이미지 파일 삭제
$sql = "SELECT image_name FROM gallery WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$image = $stmt->fetch()['image_name'];

if($image) {
    $file_path = '../uploads/gallery/'.$image;
    if(file_exists($file_path)) {
        unlink($file_path);
    }
}

// DB에서 삭제
$sql = "DELETE FROM gallery WHERE id = ?";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$id]);

if($result) {
    echo "<script>alert('삭제되었습니다.'); location.href='gallery_list.php';</script>";
} else {
    echo "<script>alert('삭제에 실패했습니다.'); history.back();</script>";
}
?>