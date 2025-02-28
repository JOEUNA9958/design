<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];

$sql = "SELECT * FROM gallery WHERE id=? AND password=?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);

if($stmt->rowCount() > 0) {
   $sql = "DELETE FROM gallery WHERE id=?";
   $stmt = $db->prepare($sql);
   $stmt->execute([$id]);
   header('Location: index.php');
} else {
   echo "<script>alert('비밀번호가 일치하지 않습니다');history.back();</script>";
}
?>