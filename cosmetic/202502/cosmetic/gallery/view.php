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
   <title>갤러리 보기</title>
   <style>
        body {
            display: block;
            margin: 0;
        }

        .sub_banner_wrap {
            width: 100%;
            position: relative;
        }

        .sub_banner {
            width: 100%;
            height: 500px;
            background-size: 120% auto;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: bannerMove 20s ease-in-out infinite;
            overflow: hidden;
        }

        @keyframes bannerMove {
            0% {
                background-position: center 0%;
            }
            50% {
                background-position: center 100%;
            }
            100% {
                background-position: center 0%;
            }
        }

        .sub_banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .sub_banner h2 {
            color: #fff;
            font-size: 45px;
            font-weight: 700;
            margin-bottom: -5px;
            position: relative;
            z-index: 1;
        }

        .sub_menu {
            display: flex;
            gap: 1px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .sub_menu a {
            flex: 1;
            text-align: center;
            color: #fff;
            text-decoration: none;
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            font-size: 20px;
        }

        .sub_menu a:hover,
        .sub_menu a.active {
            background: #007a5d;
        }

        .story-section1 {
            padding: 80px 0;
        }

        .view-wrap {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .view-title {
            padding: 20px;
            background: #f8f8f8;
            border-top: 2px solid #333;
            border-bottom: 1px solid #ddd;
        }

        .view-title h3 {
            margin: 0;
        }

        .view-info {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            color: #666;
        }

        .view-img {
            margin: 30px 0;
            text-align: center;
        }

        .view-img img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .view-content {
            padding: 30px 20px;
            line-height: 1.6;
        }

        .comment-form {
            margin: 50px 0 30px;
            background: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
        }

        .comment-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .comment-form input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 5px;
        }

        .comment-form button {
            padding: 8px 20px;
            background: #007a5c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .comment-list {
            border-top: 2px solid #333;
            margin-top: 50px;
        }

        .comment-item {
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .comment-info {
            margin-bottom: 10px;
        }

        .comment-info span {
            color: #666;
            font-size: 14px;
        }

        .comment-content {
            line-height: 1.6;
        }

        .btn-wrap {
            text-align: right;
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 5px;
        }

        .btn-wrap button {
            padding: 10px 25px;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }

        .list-btn {background: #666;}
        .edit-btn {background: #007a5c;}
        .del-btn {background: #cc0000;}

/* Modal Style */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 9999;
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 30px;
    width: 300px;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

.modal h3 {
    margin: 0 0 20px 0;
    font-size: 20px;
}

.modal input {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.modal button {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    font-size: 14px;
}

.modal .confirm-btn { 
    background: #007a5c; 
    color: #fff; 
}

.modal .cancel-btn { 
    background: #666; 
    color: #fff; 
}

        @media (max-width: 768px) {
            .view-wrap {
                padding: 0 15px;
            }
            .comment-form input {
                width: 100%;
                margin-bottom: 5px;
            }
        }
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
    <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
        <h2>Community</h2>
        <div class="sub_menu">
            <a href="/cosmetic/community/lookbook.php">룩북</a>
            <a href="/cosmetic/community/notice.php">공지사항</a>
            <a href="/cosmetic/community/inquiry.php">문의사항</a>
            <a href="/cosmetic/gallery/index.php" class="active">갤러리</a>
        </div>
    </div>
</div>

<div class="view-wrap">
    <div class="view-title">
        <h3><?php echo htmlspecialchars($view['title']); ?></h3>
    </div>

    <div class="view-info">
        <span>등록일: <?php echo date('Y.m.d', strtotime($view['created_at'])); ?></span>
        <span> | </span>
        <span>조회수: <?php echo $view['views']; ?></span>
    </div>
   
    <div class="view-img">
        <img src="../uploads/gallery/<?php echo htmlspecialchars($view['image_name']); ?>" alt="">
    </div>

    <div class="view-content">
        <?php echo nl2br(htmlspecialchars($view['content'])); ?>
    </div>

    <div class="btn-wrap">
        <button type="button" class="list-btn" onclick="location.href='index.php'">목록</button>
        <button type="button" class="edit-btn" onclick="openPasswordModal('edit')">수정</button>
        <button type="button" class="del-btn" onclick="openPasswordModal('delete')">삭제</button>
    </div>

    <div class="comment-form">
        <form action="comment_process.php" method="post">
            <input type="hidden" name="gallery_id" value="<?php echo $id; ?>">
            <input type="text" name="nickname" placeholder="닉네임(선택)">
            <input type="password" name="password" placeholder="비밀번호" required>
            <textarea name="content" placeholder="댓글을 입력하세요" required></textarea>
            <button type="submit">등록</button>
        </form>
    </div>
   
    <div class="comment-list">
        <?php foreach($comments as $comment): ?>
        <div class="comment-item">
            <div class="comment-info">
                <span><?php echo htmlspecialchars($comment['nickname'] ? $comment['nickname'] : '익명'); ?></span>
                <span><?php echo date('Y.m.d H:i', strtotime($comment['created_at'])); ?></span>
                <button onclick="commentAction(<?php echo $comment['id']; ?>, 'edit')">수정</button>
                <button onclick="commentAction(<?php echo $comment['id']; ?>, 'delete')">삭제</button>
            </div>
            <div class="comment-content" id="comment<?php echo $comment['id']; ?>">
                <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Password Modal -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <h3>비밀번호 확인</h3>
        <input type="password" id="password" placeholder="비밀번호를 입력하세요">
        <input type="hidden" id="action_type">
        <div>
            <button class="confirm-btn" onclick="verifyPassword()">확인</button>
            <button class="cancel-btn" onclick="closePasswordModal()">취소</button>
        </div>
    </div>
</div>

<!-- Comment Password Modal -->
<div id="commentPasswordModal" class="modal">
    <div class="modal-content">
        <h3>댓글 비밀번호 확인</h3>
        <input type="password" id="commentPassword" placeholder="비밀번호를 입력하세요">
        <input type="hidden" id="commentId">
        <input type="hidden" id="commentAction">
        <div>
            <button class="confirm-btn" onclick="verifyCommentPassword()">확인</button>
            <button class="cancel-btn" onclick="closeCommentPasswordModal()">취소</button>
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