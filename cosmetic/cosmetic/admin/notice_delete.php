<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];

$sql = "DELETE FROM notices WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

header('Location: notice_list.php');
?>