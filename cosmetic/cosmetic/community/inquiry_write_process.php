<!-- // community/inquiry_write_process.php -->
<?php
include '../inc/db.php';

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "INSERT INTO inquiries (name, password, email, phone, title, content) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([$name, $password, $email, $phone, $title, $content]);

header('Location: inquiry.php');

if(isset($_FILES['upload_file']) && $_FILES['upload_file']['name']) {
    $upload_dir = '../uploads/';
    $filename = date('YmdHis') . '_' . $_FILES['upload_file']['name'];
    $file_path = $upload_dir . $filename;
    
    if(move_uploaded_file($_FILES['upload_file']['tmp_name'], $file_path)) {
        $sql = "INSERT INTO inquiries (name, password, email, phone, title, content, file_name) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt->execute([$name, $password, $email, $phone, $title, $content, $filename]);
    }
 }
?>