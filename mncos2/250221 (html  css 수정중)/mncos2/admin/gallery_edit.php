<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];
$sql = "SELECT * FROM gallery WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$view = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>갤러리 수정</title>
    <style>
        /* 스타일은 이전 코드와 동일 */
        .edit-form {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            width: 100%;
            height: 200px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }
        .current-image {
            margin: 10px 0;
        }
        .current-image img {
            max-width: 300px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="admin-wrap">
    <!-- 사이드바는 동일 -->
    
    <div class="content">
        <h2>갤러리 수정</h2>
        <form class="edit-form" action="gallery_edit_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label>제목</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($view['title']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>현재 이미지</label>
                <div class="current-image">
                    <img src="../uploads/gallery/<?php echo $view['image_name']; ?>">
                </div>
                <input type="file" name="image" accept="image/*">
                <small>* 새 이미지를 선택하지 않으면 기존 이미지가 유지됩니다.</small>
            </div>
            
            <div class="form-group">
                <label>내용</label>
                <textarea name="content"><?php echo htmlspecialchars($view['content']); ?></textarea>
            </div>
            
            <div class="btn-wrap">
                <button type="button" class="btn btn-list" onclick="history.back()">취소</button>
                <button type="submit" class="btn btn-edit">수정하기</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>