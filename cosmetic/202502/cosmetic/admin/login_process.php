<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username == 'admin' && $password == 'admin963') {
   $_SESSION['admin'] = true;
   header('Location: index.php');
} else {
   echo "<script>alert('로그인 정보가 일치하지 않습니다.'); history.back();</script>";
}
?>