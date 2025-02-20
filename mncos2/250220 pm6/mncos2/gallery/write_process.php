<!-- // write_process.php -->
<?php
include '../inc/db.php';

$uploaddir = '../uploads/gallery/';
$filename = date('YmdHis').'_'.basename($_FILES['image']['name']);

if(move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.$filename)) {
   $sql = "INSERT INTO gallery (title, content, image_name, password) VALUES (?,?,?,?)";
   $stmt = $db->prepare($sql);
   $stmt->execute([$_POST['title'], $_POST['content'], $filename, $_POST['password']]);
}

header('Location: index.php');
?>