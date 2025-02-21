<?php
include '../inc/db.php';

$id = $_POST['id'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$title = $_POST['title'];
$content = $_POST['content'];

// 비밀번호 확인
$sql = "SELECT * FROM inquiries WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);
$post = $stmt->fetch();

if(!$post) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 수정 처리
$sql = "UPDATE inquiries SET 
        name = ?,
        email = ?,
        phone = ?,
        title = ?,
        content = ?
        WHERE id = ? AND password = ?";

$stmt = $db->prepare($sql);
$result = $stmt->execute([$name, $email, $phone, $title, $content, $id, $password]);

if($result) {
    echo "<script>alert('수정되었습니다.'); location.href='inquiry_view.php?id=" . $id . "';</script>";
} else {
    echo "<script>alert('수정에 실패했습니다.'); history.back();</script>";
}