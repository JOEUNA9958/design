<?php
include '../inc/db.php';

$id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE gallery SET views = views + 1 WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

// 글 조회
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>갤러리 보기 - M&COS</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>BOARD</h2>
        <p>창상 갤러리입니다.</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item">
                <a href="/mncos2/board/index.php">공지사항</a>
            </div>
            <div class="sub-visual-menu-item active">
                <a href="/mncos2/gallery/index.php">갤러리</a>
            </div>
        </div>
    </div>

    <div class="gallery-view-wrap">
        <div class="gallery-view-title">
            <h3><?php echo htmlspecialchars($view['title']); ?></h3>
        </div>

        <div class="gallery-view-info">
            <span>등록일: <?php echo date('Y.m.d', strtotime($view['created_at'])); ?></span>
            <span> | </span>
            <span>조회수: <?php echo $view['views']; ?></span>
        </div>
       
        <div class="gallery-view-img">
            <img src="../uploads/gallery/<?php echo htmlspecialchars($view['image_name']); ?>" alt="">
        </div>

        <div class="gallery-view-content">
            <?php echo nl2br(htmlspecialchars($view['content'])); ?>
        </div>

        <div class="gallery-view-buttons">
            <button type="button" class="gallery-view-btn list" onclick="location.href='index.php'">목록</button>
            <button type="button" class="gallery-view-btn edit" onclick="openPasswordModal('edit')">수정</button>
            <button type="button" class="gallery-view-btn delete" onclick="openPasswordModal('delete')">삭제</button>
        </div>

        <div class="gallery-view-comment-form">
            <form action="comment_process.php" method="post">
                <input type="hidden" name="gallery_id" value="<?php echo $id; ?>">
                <input type="text" name="nickname" placeholder="닉네임(선택)">
                <input type="password" name="password" placeholder="비밀번호" required>
                <textarea name="content" placeholder="댓글을 입력하세요" required></textarea>
                <button type="submit">등록</button>
            </form>
        </div>
       
        <div class="gallery-view-comment-list">
            <?php foreach($comments as $comment): ?>
            <div class="gallery-view-comment-item">
                <div class="gallery-view-comment-info">
                    <span><?php echo htmlspecialchars($comment['nickname'] ? $comment['nickname'] : '익명'); ?></span>
                    <span><?php echo date('Y.m.d H:i', strtotime($comment['created_at'])); ?></span>
                    <button onclick="commentAction(<?php echo $comment['id']; ?>, 'edit')">수정</button>
                    <button onclick="commentAction(<?php echo $comment['id']; ?>, 'delete')">삭제</button>
                </div>
                <div class="gallery-view-comment-content" id="comment<?php echo $comment['id']; ?>">
                    <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Password Modal -->
    <div id="passwordModal" class="gallery-view-modal">
        <div class="gallery-view-modal-content">
            <h3>비밀번호 확인</h3>
            <input type="password" id="password" placeholder="비밀번호를 입력하세요">
            <input type="hidden" id="action_type">
            <div class="gallery-view-modal-buttons">
                <button class="gallery-view-btn confirm" onclick="verifyPassword()">확인</button>
                <button class="gallery-view-btn cancel" onclick="closePasswordModal()">취소</button>
            </div>
        </div>
    </div>

    <!-- Comment Password Modal -->
    <div id="commentPasswordModal" class="gallery-view-modal">
        <div class="gallery-view-modal-content">
            <h3>댓글 비밀번호 확인</h3>
            <input type="password" id="commentPassword" placeholder="비밀번호를 입력하세요">
            <input type="hidden" id="commentId">
            <input type="hidden" id="commentAction">
            <div class="gallery-view-modal-buttons">
                <button class="gallery-view-btn confirm" onclick="verifyCommentPassword()">확인</button>
                <button class="gallery-view-btn cancel" onclick="closeCommentPasswordModal()">취소</button>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        function openPasswordModal(action) {
            document.getElementById('passwordModal').style.display = 'block';
            document.getElementById('action_type').value = action;
            document.getElementById('password').value = '';
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').style.display = 'none';
        }

        function openCommentPasswordModal(id, action) {
            document.getElementById('commentPasswordModal').style.display = 'block';
            document.getElementById('commentId').value = id;
            document.getElementById('commentAction').value = action;
            document.getElementById('commentPassword').value = '';
        }

        function closeCommentPasswordModal() {
            document.getElementById('commentPasswordModal').style.display = 'none';
        }

        function verifyPassword() {
            const password = document.getElementById('password').value;
            const action = document.getElementById('action_type').value;
            const postId = <?php echo $id; ?>;

            fetch('verify_password.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${postId}&password=${password}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    closePasswordModal();
                    if(action === 'edit') {
                        location.href = `edit.php?id=${postId}&password=${password}`;
                    } else if(action === 'delete') {
                        if(confirm('정말 삭제하시겠습니까?')) {
                            location.href = `delete.php?id=${postId}&password=${password}`;
                        }
                    }
                } else {
                    alert('비밀번호가 일치하지 않습니다.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('오류가 발생했습니다.');
            });
        }

        function verifyCommentPassword() {
            const password = document.getElementById('commentPassword').value;
            const id = document.getElementById('commentId').value;
            const action = document.getElementById('commentAction').value;

            fetch('verify_comment_password.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}&password=${password}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    closeCommentPasswordModal();
                    if(action === 'edit') {
                        location.href = `comment_edit.php?id=${id}&password=${password}`;
                    } else if(action === 'delete') {
                        if(confirm('정말 삭제하시겠습니까?')) {
                            location.href = `comment_delete.php?id=${id}&password=${password}`;
                        }
                    }
                } else {
                    alert('비밀번호가 일치하지 않습니다.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('오류가 발생했습니다.');
            });
        }

        function commentAction(id, action) {
            openCommentPasswordModal(id, action);
        }
    </script>
</body>
</html>