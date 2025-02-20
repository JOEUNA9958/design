<?php
include '../inc/header.php';
include '../inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$password = isset($_GET['password']) ? $_GET['password'] : '';

// 게시글 정보 조회
$sql = "SELECT * FROM gallery_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(!$post) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='gallery.php';</script>";
    exit;
}

// 비밀번호 확인
if(!password_verify($password, $post['password'])) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit;
}

// 이미지 파일 삭제
if($post['image_url'] && file_exists($_SERVER['DOCUMENT_ROOT'] . $post['image_url'])) {
    unlink($_SERVER['DOCUMENT_ROOT'] . $post['image_url']);
}

// 게시글 삭제 (댓글은 CASCADE로 자동 삭제됨)
$sql = "DELETE FROM gallery_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if($stmt->execute()) {
    echo "<script>alert('게시글이 삭제되었습니다.'); location.href='gallery.php';</script>";
} else {
    echo "<script>alert('삭제 중 오류가 발생했습니다.'); history.back();</script>";
}
?>