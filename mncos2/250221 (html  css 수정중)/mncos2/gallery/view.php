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
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* 최소 높이를 뷰포트 높이로 설정 */
    margin: 0;
}
.visual {
    position: relative;
    width: 100%;
    height: 450px;
    background: url('../images/company/company_bg.jpg') no-repeat center/cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.visual::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
}

.visual h2 {
    font-size: 48px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    position: relative;
    z-index: 1;
}

.visual p {
    font-size: 18px;
    margin-top: 20px;
    position: relative;
    z-index: 1;
}

.visual-menu {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 1;
}

.menu-item {
    flex: 1;
    max-width: 400px;
    border-right: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    transition: all 0.3s;
}

.menu-item:last-child {
    border-right: none;
}

.menu-item a {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s;
}

.menu-item:hover {
    background: #fff;
}

.menu-item:hover a {
    color: #000;
}

.menu-item.active {
    background: #fff;
}

.menu-item.active a {
    color: #000;
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

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: block;
    margin: 0;
}

.visual {
    position: relative;
    width: 100%;
    height: 450px;
    background: url('../images/company/company_bg.jpg') no-repeat center/cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.visual::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
}

.visual h2 {
    font-size: 48px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    position: relative;
    z-index: 1;
}

.visual p {
    font-size: 18px;
    margin-top: 20px;
    position: relative;
    z-index: 1;
}

.visual-menu {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 1;
}

.menu-item {
    flex: 1;
    max-width: 400px;
    border-right: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    transition: all 0.3s;
}

.menu-item:last-child {
    border-right: none;
}

.menu-item a {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s;
}

.menu-item:hover {
    background: #fff;
}

.menu-item:hover a {
    color: #000;
}

.menu-item.active {
    background: #fff;
}

.menu-item.active a {
    color: #000;
}

/* 버튼 공통 스타일 */
.write-btn,
.list-btn,
.edit-btn,
.del-btn,
.comment-form button,
.comment-info button {
    display: inline-block;
    padding: 12px 30px;
    background: #333;
    color: #fff;
    text-decoration: none;
    border: none;
    transition: background-color 0.3s;
    cursor: pointer;
}

.write-btn:hover,
.list-btn:hover,
.edit-btn:hover,
.del-btn:hover,
.comment-form button:hover,
.comment-info button:hover {
    background: #555;
}

/* 댓글 폼 버튼 */
.comment-form button {
    padding: 8px 20px;
}

/* 댓글 수정/삭제 버튼 */
.comment-info button {
    padding: 5px 10px;
    margin-left: 5px;
    font-size: 12px;
}

/* 하단 버튼 그룹 */
.btn-wrap {
    text-align: right;
    margin-top: 30px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

/* 모달 버튼 */
.modal button {
    padding: 12px 30px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.modal .confirm-btn,
.modal .cancel-btn {
    background: #333;
    color: #fff;
}

.modal .confirm-btn:hover,
.modal .cancel-btn:hover {
    background: #555;
}
/* 반응형 스타일 */
@media (max-width: 1200px) {
    .view-wrap {
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .visual h2 {
        font-size: 36px;
    }

    .visual p {
        font-size: 16px;
    }

    .menu-item {
        max-width: 300px;
    }

    .view-title h3 {
        font-size: 20px;
    }

    .view-img {
        margin: 20px 0;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    .view-wrap {
        margin: 30px auto;
        padding: 0 20px;
    }

    .view-title {
        padding: 15px;
    }

    .view-info {
        padding: 12px 15px;
        font-size: 13px;
    }

    .view-content {
        padding: 20px 15px;
        font-size: 14px;
    }

    /* 댓글 영역 */
    .comment-form {
        padding: 15px;
        margin: 30px 0 20px;
    }

    .comment-form input {
        width: 100%;
        margin-bottom: 10px;
    }

    .comment-item {
        padding: 15px;
    }

    .comment-info {
        font-size: 13px;
    }

    .comment-info button {
        padding: 4px 8px;
        font-size: 11px;
    }

    /* 버튼 영역 */
    .btn-wrap {
        margin-top: 20px;
        gap: 8px;
    }

    .btn-wrap button {
        padding: 8px 20px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 300px;
    }

    .visual h2 {
        font-size: 28px;
    }

    .visual-menu {
        flex-wrap: wrap;
    }

    .menu-item {
        width: 50%;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .menu-item:nth-child(2n) {
        border-right: none;
    }

    .view-wrap {
        margin: 20px auto;
        padding: 0 15px;
    }

    .view-title h3 {
        font-size: 18px;
    }

    .view-info span {
        display: block;
        margin: 3px 0;
    }

    .view-info span[style*="margin-left"] {
        margin-left: 0 !important;
    }

    /* 버튼을 세로로 배치 */
    .btn-wrap {
        flex-direction: column;
        gap: 6px;
    }

    .btn-wrap button {
        width: 100%;
        padding: 10px 0;
    }

    /* 모달 */
    .modal-content {
        width: 90%;
        padding: 20px;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual {
        height: 250px;
    }

    .visual h2 {
        font-size: 24px;
    }

    .menu-item a {
        font-size: 13px;
        height: 45px;
    }

    .view-title h3 {
        font-size: 16px;
    }

    .view-info,
    .view-content {
        font-size: 12px;
    }

    .comment-form textarea {
        height: 80px;
    }

    .comment-form input,
    .comment-form button {
        font-size: 12px;
    }

    .btn-wrap button {
        font-size: 12px;
        padding: 8px 0;
    }
}
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="visual">
    <h2>BOARD</h2>
    <p>창상 갤러리입니다.</p>
    <div class="visual-menu">
        <div class="menu-item">
            <a href="/mncos2/board/index.php">공지사항</a>
        </div>
        <div class="menu-item active">
            <a href="/mncos2/gallery/index.php">갤러리</a>
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