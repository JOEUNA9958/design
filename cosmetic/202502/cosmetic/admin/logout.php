<?php
session_start();
session_destroy();
header('Location: login.php');
?>

// admin/answer_process.php
<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) exit;

$id = $_POST['id'];
$answer = $_POST['answer'];

$sql = "UPDATE inquiries SET answer = ?, answer_date = NOW(), status = 'completed' WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$answer, $id]);

header('Location: inquiry_list.php');
?>