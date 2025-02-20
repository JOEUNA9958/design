<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

// 기존 정보 조회
$sql = "SELECT image_name FROM gallery WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$old_data = $stmt->fetch();

// 이미지 처리
$image_name = $old_data['image_name']; // 기본값으로 기존 이미지명 사용

if(isset($_FILES['image']) && $_FILES['image']['name']) {
    $uploaddir = '../uploads/gallery/';
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = date('YmdHis') . '_' . uniqid() . '.' . $ext;
    
    // 새 이미지 업로드
    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . $filename)) {
        // 기존 이미지 삭제
        if($old_data['image_name'] && file_exists($uploaddir . $old_data['image_name'])) {
            unlink($uploaddir . $old_data['image_name']);
        }
        $image_name = $filename;
    }
}

// DB 업데이트
$sql = "UPDATE gallery SET 
        title = ?,
        content = ?,
        image_name = ?
        WHERE id = ?";

$stmt = $db->prepare($sql);
$result = $stmt->execute([$title, $content, $image_name, $id]);

if($result) {
    echo "<script>
        alert('수정되었습니다.');
        location.href='gallery_view.php?id=" . $id . "';
    </script>";
} else {
    echo "<script>
        alert('수정에 실패했습니다.');
        history.back();
    </script>";
}
?>