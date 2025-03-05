<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$is_important = isset($_POST['is_important']) ? 1 : 0;

$sql = "UPDATE notices SET title=?, content=?, is_important=? WHERE id=?";
$stmt = $db->prepare($sql);
$stmt->execute([$title, $content, $is_important, $id]);

header('Location: notice_list.php');
?>