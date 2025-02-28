<?php
session_start();
session_destroy();
header('Location: /mncos2/admin/login.php');
exit;
?>