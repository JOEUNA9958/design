<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];

// 비밀번호 확인
$sql = "SELECT * FROM inquiries WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);
$post = $stmt->fetch();

if(!$post) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 첨부파일이 있다면 삭제
if($post['file_name']) {
    $file_path = '../uploads/' . $post['file_name'];
    if(file_exists($file_path)) {
        unlink($file_path);
    }
}

// 게시글 삭제
$sql = "DELETE FROM inquiries WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$id, $password]);

if($result) {
    echo "<script>alert('삭제되었습니다.'); location.href='inquiry.php';</script>";
} else {
    echo "<script>alert('삭제에 실패했습니다.'); history.back();</script>";
}