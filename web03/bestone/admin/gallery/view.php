<?php
session_start();
include '../../inc/admin_check.php';
include '../../inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 게시글 정보 조회
$sql = "SELECT * FROM gallery_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if(!$post) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); history.back();</script>";
    exit;
}

// 조회수 증가
$conn->query("UPDATE gallery_posts SET view_count = view_count + 1 WHERE id = $id");

// 댓글 목록 조회
$comment_sql = "SELECT * FROM gallery_comments WHERE post_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($comment_sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$comments = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?> - 갤러리</title>
    <style>
        .admin-container {
            width: 1280px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .post-content {
            margin-bottom: 40px;
        }
        .post-header {
            margin-bottom: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 4px;
        }
        .post-info {
            display: flex;
            gap: 15px;
            color: #666;
            margin-top: 10px;
        }
        .post-image {
            margin: 20px 0;
            text-align: center;
        }
        .post-image img {
            max-width: 100%;
            height: auto;
        }
        .post-text {
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .comments-section {
            margin-top: 40px;
            border-top: 2px solid #191919;
        }
        .comment-item {
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }
        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .comment-info {
            display: flex;
            gap: 15px;
            color: #666;
        }
        .comment-content {
            line-height: 1.6;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background: #191919;
            color: white;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        .no-comments {
            padding: 30px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>갤러리 게시글</h1>
            <div class="btn-group">
                <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">수정</a>
                <a href="list.php" class="btn">목록</a>
                <a href="/admin/index.php" class="btn">대시보드</a>
            </div>
        </div>

        <div class="post-content">
            <div class="post-header">
                <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                <div class="post-info">
                    <span>작성자: <?php echo htmlspecialchars($post['author']); ?></span>
                    <span>등록일: <?php echo date('Y-m-d H:i', strtotime($post['created_at'])); ?></span>
                    <span>조회수: <?php echo $post['view_count']; ?></span>
                    <span>댓글수: <?php echo $post['comment_count']; ?></span>
                </div>
            </div>

            <?php if($post['image_url']): ?>
            <div class="post-image">
                <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="게시글 이미지">
            </div>
            <?php endif; ?>

            <div class="post-text">
                <?php echo nl2br(htmlspecialchars($post['content'])); ?>
            </div>
        </div>

        <div class="comments-section">
            <h3>댓글 목록</h3>
            <?php if($comments->num_rows > 0): ?>
                <?php while($comment = $comments->fetch_assoc()): ?>
                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-info">
                            <span class="author"><?php echo htmlspecialchars($comment['author']); ?></span>
                            <span class="date"><?php echo date('Y-m-d H:i', strtotime($comment['created_at'])); ?></span>
                        </div>
                    </div>
                    <div class="comment-content">
                        <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-comments">등록된 댓글이 없습니다.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>