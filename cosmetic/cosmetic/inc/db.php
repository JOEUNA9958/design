<?php
$host = 'localhost';
<<<<<<< HEAD
$dbname = 'cosmetic';
$username = 'root';
$password = '';
=======
$dbname = 'dmsdk0808';
$username = 'dmsdk0808';
$password = 'joeuna###0808';
>>>>>>> 3e10a622e0b95e1faf1f95558c8ce9a5533d764d

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>