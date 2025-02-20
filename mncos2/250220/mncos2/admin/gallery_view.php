<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];
$sql = "SELECT * FROM gallery WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$view = $stmt->fetch();

// 댓글 조회
$sql = "SELECT * FROM gallery_comments WHERE gallery_id = ? ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$comments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>갤러리 상세</title>
   <style>
    /* 기존 스타일 유지 */
    .admin-wrap {display: flex; min-height: 100vh;}
    .sidebar {width: 250px; background: #333; color: #fff;}
    .sidebar h1 {padding: 20px;}
    .sidebar ul {list-style: none; padding: 0; margin: 0;}
    .sidebar li a {display: block; padding: 15px 20px; color: #fff; text-decoration: none;}
    .sidebar li a:hover {background: #444;}
    .content {flex: 1; padding: 30px;}
    
    /* 추가 스타일 */
    .view-header {
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .view-header h2 {margin: 0;}
    .btn-wrap {
        display: flex;
        gap: 10px;
    }
    .btn {
        padding: 8px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: #fff;
    }
    .btn-list {background: #666;}
    .btn-edit {background: #007a5c;}
    .btn-delete {background: #cc0000;}
    
    .view-img {
        margin: 30px 0;
        text-align: center;
        padding: 20px;
        background: #f8f8f8;
        border-radius: 8px;
    }
    .view-img img {
        max-width: 100%;
        border-radius: 4px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .view-content {
        margin: 30px 0;
        min-height: 200px;
        line-height: 1.6;
    }
    
    .comment-list {
        margin-top: 50px;
        border-top: 2px solid #333;
    }
    .comment-list h3 {
        margin: 20px 0;
    }
    .comment-item {
        padding: 20px;
        border-bottom: 1px solid #ddd;
        background: #fff;
    }
    .comment-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .comment-info {
        color: #666;
    }
    .comment-actions button {
        padding: 5px 10px;
        border: none;
        background: #cc0000;
        color: #fff;
        border-radius: 3px;
        cursor: pointer;
    }
   </style>
</head>
<body>
<div class="admin-wrap">
   <div class="sidebar">
       <h1>관리자</h1>
       <ul>
           <li><a href="index.php">대시보드</a></li>
           <li><a href="inquiry_list.php">문의관리</a></li>
           <li><a href="gallery_list.php">갤러리관리</a></li>
           <li><a href="logout.php">로그아웃</a></li>
       </ul>
   </div>

   <div class="content">
       <h2><?php echo $view['title']; ?></h2>
       <div class="view-img">
           <img src="../uploads/gallery/<?php echo $view['image_name']; ?>">
       </div>
       <div class="view-content">
           <?php echo nl2br($view['content']); ?>
       </div>

       <div class="view-header">
            <h2><?php echo htmlspecialchars($view['title']); ?></h2>
            <div class="btn-wrap">
                <button class="btn btn-list" onclick="location.href='gallery_list.php'">목록</button>
                <button class="btn btn-edit" onclick="location.href='gallery_edit.php?id=<?php echo $id; ?>'">수정</button>
                <button class="btn btn-delete" onclick="deleteGallery(<?php echo $id; ?>)">삭제</button>
            </div>
        </div>

       <!-- 댓글 목록 -->
       <div class="comment-list">
            <h3>댓글 목록</h3>
            <?php foreach($comments as $comment): ?>
            <div class="comment-item">
                <div class="comment-header">
                    <div class="comment-info">
                        <strong><?php echo htmlspecialchars($comment['nickname'] ?: '익명'); ?></strong>
                        <span>(<?php echo date('Y.m.d H:i', strtotime($comment['created_at'])); ?>)</span>
                    </div>
                    <div class="comment-actions">
                        <button onclick="deleteComment(<?php echo $comment['id']; ?>)">삭제</button>
                    </div>
                </div>
                <div class="comment-content">
                    <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
   </div>
</div>

<script>
function deleteGallery(id) {
    if(confirm('정말 삭제하시겠습니까?')) {
        location.href = 'gallery_delete.php?id=' + id;
    }
}

function deleteComment(id) {
    if(confirm('댓글을 삭제하시겠습니까?')) {
        location.href = 'comment_delete.php?id=' + id;
    }
}
</script>
</body>
</html>