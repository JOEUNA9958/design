<?php
$host = 'localhost';
$dbname = 'thebarun0808';
$username = 'thebarun0808';
$password = 'joeuna##0808';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8mb4");
    $db->exec("SET NAMES utf8mb4");
    $db->exec("SET CHARACTER SET utf8mb4");
    $db->exec("SET COLLATION_CONNECTION = 'utf8mb4_unicode_ci'");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// XSS 방지를 위한 함수
function escape_string($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 날짜 포맷 함수
function format_date($date) {
    return date('Y-m-d', strtotime($date));
}
?>