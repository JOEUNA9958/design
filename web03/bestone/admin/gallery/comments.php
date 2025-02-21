<?php
session_start();
include '../../inc/admin_check.php';
include '../../inc/db_conn.php';

$post_id = isset($_GET['post_id']) ? (int)$_GET['post_id'] : 0;

// 게시글 정보 조회
$post_sql = "SELECT * FROM gallery_posts WHERE id = ?";
$stmt = $conn->prepare($post_sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if(!$post) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); history.back();</script>";
    exit;
}

// 댓글 목록 조회
$comment_sql = "SELECT * FROM gallery_comments WHERE post_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($comment_sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$comments = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>댓글 관리</title>
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
        .post-info {
            margin-bottom: 30px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 4px;
        }
        .post-info h3 {
            margin-bottom: 10px;
        }
        .comment-list {
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
            margin-bottom: 15px;
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
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-edit {
            background: #4CAF50;
            color: white;
        }
        .edit-form {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background: #f5f5f5;
            border-radius: 4px;
        }
        .edit-form textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            resize: vertical;
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
            <h1>댓글 관리</h1>
            <div class="btn-group">
                <a href="list.php" class="btn btn-primary">목록</a>
                <a href="/admin/index.php" class="btn">대시보드</a>
            </div>
        </div>

        <div class="post-info">
            <h3><?php echo htmlspecialchars($post['title']); ?></h3>
            <div class="comment-info">
                <span>작성자: <?php echo htmlspecialchars($post['author']); ?></span>
                <span>등록일: <?php echo date('Y-m-d H:i', strtotime($post['created_at'])); ?></span>
                <span>댓글수: <?php echo $post['comment_count']; ?></span>
            </div>
        </div>

        <div class="comment-list">
            <?php if($comments->num_rows > 0): ?>
                <?php while($comment = $comments->fetch_assoc()): ?>
                <div class="comment-item" id="comment-<?php echo $comment['id']; ?>">
                    <div class="comment-header">
                        <div class="comment-info">
                            <span class="author"><?php echo htmlspecialchars($comment['author']); ?></span>
                            <span class="date"><?php echo date('Y-m-d H:i', strtotime($comment['created_at'])); ?></span>
                        </div>
                        <div class="btn-group">
                            <button onclick="toggleEditForm(<?php echo $comment['id']; ?>)" class="btn btn-edit">수정</button>
                            <button onclick="deleteComment(<?php echo $comment['id']; ?>)" class="btn btn-danger">삭제</button>
                        </div>
                    </div>
                    <div class="comment-content" id="content-<?php echo $comment['id']; ?>">
                        <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                    </div>
                    <div class="edit-form" id="edit-form-<?php echo $comment['id']; ?>">
                        <textarea id="edit-content-<?php echo $comment['id']; ?>"><?php echo htmlspecialchars($comment['content']); ?></textarea>
                        <div class="btn-group">
                            <button onclick="updateComment(<?php echo $comment['id']; ?>)" class="btn btn-primary">저장</button>
                            <button onclick="toggleEditForm(<?php echo $comment['id']; ?>)" class="btn">취소</button>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-comments">등록된 댓글이 없습니다.</div>
            <?php endif; ?>
        </div>
    </div>

    <script>
    function toggleEditForm(id) {
        const editForm = document.getElementById(`edit-form-${id}`);
        const content = document.getElementById(`content-${id}`);
        
        if(editForm.style.display === 'block') {
            editForm.style.display = 'none';
            content.style.display = 'block';
        } else {
            editForm.style.display = 'block';
            content.style.display = 'none';
        }
    }

    function updateComment(id) {
        const content = document.getElementById(`edit-content-${id}`).value;
        
        fetch('process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=update_comment&id=${id}&content=${encodeURIComponent(content)}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                document.getElementById(`content-${id}`).innerHTML = content.replace(/\n/g, '<br>');
                toggleEditForm(id);
            } else {
                alert(data.message);
            }
        });
    }

    function deleteComment(id) {
        if(confirm('정말 삭제하시겠습니까?')) {
            fetch('process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=delete_comment&id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    document.getElementById(`comment-${id}`).remove();
                } else {
                    alert(data.message);
                }
            });
        }
    }
    </script>
</body>
</html>