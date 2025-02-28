<?php
include '../inc/db.php';

$id = $_POST['id'];
$password = $_POST['password'];
$title = $_POST['title'];
$content = $_POST['content'];

// 비밀번호 확인
$sql = "SELECT * FROM gallery WHERE id = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id, $password]);
$post = $stmt->fetch();

if(!$post) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 이미지 처리
$image_name = $post['image_name']; // 기본값으로 기존 이미지명 사용

if(isset($_FILES['image']) && $_FILES['image']['name']) {
    $uploaddir = '../uploads/gallery/';
    $filename = date('YmdHis').'_'.basename($_FILES['image']['name']);
    
    // 새 이미지 업로드
    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.$filename)) {
        // 기존 이미지 삭제
        if($post['image_name'] && file_exists($uploaddir.$post['image_name'])) {
            unlink($uploaddir.$post['image_name']);
        }
        $image_name = $filename;
    }
}

// DB 업데이트
$sql = "UPDATE gallery SET 
        title = ?,
        content = ?,
        image_name = ?
        WHERE id = ? AND password = ?";

$stmt = $db->prepare($sql);
$result = $stmt->execute([$title, $content, $image_name, $id, $password]);

if($result) {
    echo "<script>alert('수정되었습니다.'); location.href='view.php?id=" . $id . "';</script>";
} else {
    echo "<script>alert('수정에 실패했습니다.'); history.back();</script>";
}