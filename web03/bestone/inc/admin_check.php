<?php
// inc/admin_check.php

// 세션이 시작되지 않았다면 시작
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 관리자 로그인 체크
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // 로그인되지 않은 경우 로그인 페이지로 리다이렉트
    header('Location: /admin/login.php');
    exit;
}
?>