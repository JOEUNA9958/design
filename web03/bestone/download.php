<?php
include 'inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 파일 정보 조회
$sql = "SELECT file_name, file_path FROM guide_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$file = $result->fetch_assoc();

if($file && !empty($file['file_path']) && !empty($file['file_name'])) {
    $file_path = $_SERVER['DOCUMENT_ROOT'] . $file['file_path'];
    
    if(file_exists($file_path)) {
        // 파일 다운로드 헤더 설정
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file['file_name'] . '"');
        header('Content-Length: ' . filesize($file_path));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Expires: 0');
        
        // 파일 출력
        readfile($file_path);
        exit;
    }
}

// 파일이 없는 경우
echo "<script>
    alert('파일을 찾을 수 없습니다.');
    history.back();
</script>";
?>