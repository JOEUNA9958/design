<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'bestone';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>