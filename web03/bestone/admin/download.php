<?php
include 'inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT file_name, file_path FROM guide_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$file = $result->fetch_assoc();

if($file && file_exists($_SERVER['DOCUMENT_ROOT'] . $file['file_path'])) {
    $filepath = $_SERVER['DOCUMENT_ROOT'] . $file['file_path'];
    $filename = $file['file_name'];
    
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($filepath));
    
    readfile($filepath);
    exit;
} else {
    echo "<script>alert('파일을 찾을 수 없습니다.'); history.back();</script>";
}
?>