<?php
include '../inc/db.php';

// POST 데이터 받기
$id = $_POST['id'];
$password = $_POST['password'];

// 댓글 정보 조회
$stmt = $db->prepare("SELECT * FROM gallery_comments WHERE id = ?");
$stmt->execute([$id]);
$comment = $stmt->fetch();

if (!$comment) {
    echo json_encode(['success' => false, 'message' => '댓글을 찾을 수 없습니다.']);
    exit;
}

// 비밀번호 검증
$result = password_verify($password, $comment['password']);

// 결과 반환
echo json_encode([
    'success' => $result,
    'message' => $result ? '비밀번호가 확인되었습니다.' : '비밀번호가 일치하지 않습니다.'
]);