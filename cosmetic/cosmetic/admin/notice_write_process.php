<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$title = $_POST['title'];
$content = $_POST['content'];
$is_important = isset($_POST['is_important']) ? 1 : 0;

$sql = "INSERT INTO notices (title, content, is_important) VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([$title, $content, $is_important]);

header('Location: notice_list.php');
?>