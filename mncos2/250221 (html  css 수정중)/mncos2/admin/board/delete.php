<?php
require_once '../../inc/db.php';
session_start();

// 관리자 체크
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='/mncos2/board/index.php';</script>";
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    try {
        $stmt = $db->prepare("DELETE FROM notice WHERE id = ?");
        $stmt->execute([$id]);
        echo "<script>alert('삭제되었습니다.'); location.href='/mncos2/admin/board/list.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('오류가 발생했습니다.'); history.back();</script>";
    }
} else {
    echo "<script>alert('잘못된 접근입니다.'); location.href='/mncos2/admin/board/list.php';</script>";
}
?>