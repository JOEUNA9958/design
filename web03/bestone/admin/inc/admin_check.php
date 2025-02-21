<?php
if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: /bestone/admin/login.php');
    exit;
}
?>