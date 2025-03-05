<?php
include '../inc/db.php';

$id = $_POST['id'];
$password = $_POST['password'];
$action = $_POST['action'];

$sql = "SELECT * FROM inquiries WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);

if($stmt->rowCount() > 0) {
   if($action == 'edit') {
       header('Location: inquiry_edit.php?id='.$id);
   } else {
       header('Location: inquiry_delete.php?id='.$id);
   }
} else {
   echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
}
?>