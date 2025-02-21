<?php
include '../inc/db.php';

$gallery_id = $_POST['gallery_id'];
$nickname = $_POST['nickname'] ?: '익명';
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$content = $_POST['content'];

$stmt = $db->prepare("INSERT INTO gallery_comments (gallery_id, nickname, password, content) VALUES (?, ?, ?, ?)");
$result = $stmt->execute([$gallery_id, $nickname, $password, $content]);

if($result) {
    echo "<script>location.href='view.php?id=" . $gallery_id . "';</script>";
} else {
    echo "<script>alert('댓글 등록에 실패했습니다.'); history.back();</script>";
}