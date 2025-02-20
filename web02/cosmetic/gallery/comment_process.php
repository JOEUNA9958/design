<?php
include '../inc/db.php';

$sql = "INSERT INTO gallery_comments (gallery_id, nickname, password, content) VALUES (?,?,?,?)";
$stmt = $db->prepare($sql);
$stmt->execute([$_POST['gallery_id'], $_POST['nickname'], $_POST['password'], $_POST['content']]);

header('Location: view.php?id='.$_POST['gallery_id']);
?>