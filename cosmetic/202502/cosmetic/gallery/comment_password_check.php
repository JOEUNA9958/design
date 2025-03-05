<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];
$action = $_GET['action'];

$sql = "SELECT * FROM gallery_comments WHERE id=? AND password=?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);

if($stmt->rowCount() > 0) {
    if($action == 'edit') {
        $comment = $stmt->fetch();
        header('Location: comment_edit.php?id='.$id);
    }
} else {
    echo "<script>alert('비밀번호가 일치하지 않습니다');history.back();</script>";
}
?>