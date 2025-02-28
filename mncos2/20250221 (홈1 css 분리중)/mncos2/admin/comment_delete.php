<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];

// 갤러리 ID 먼저 가져오기 (삭제 후 돌아가기 위해)
$sql = "SELECT gallery_id FROM gallery_comments WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$gallery_id = $stmt->fetch()['gallery_id'];

// 댓글 삭제
$sql = "DELETE FROM gallery_comments WHERE id = ?";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$id]);

if($result) {
    header('Location: gallery_view.php?id='.$gallery_id);
} else {
    echo "<script>alert('삭제에 실패했습니다.'); history.back();</script>";
}
?>