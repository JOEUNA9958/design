<?php
include '../inc/header.php';
include '../inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 조회수 증가
$conn->query("UPDATE gallery_posts SET view_count = view_count + 1 WHERE id = $id");

// 게시글 정보 조회
$sql = "SELECT * FROM gallery_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(!$post) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='gallery.php';</script>";
    exit;
}

// 댓글 조회
$comment_sql = "SELECT * FROM gallery_comments WHERE post_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($comment_sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$comments = $stmt->get_result();
?>

<div class="sub-banner">
    <h2 class="banner-title">GALLERY</h2>
</div>

<div class="view-section">
    <div class="post-header">
        <h2 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h2>
        <div class="post-meta">
            <span class="author"><?php echo htmlspecialchars($post['author']); ?></span>
            <span class="date"><?php echo date('Y-m-d H:i', strtotime($post['created_at'])); ?></span>
            <span class="views">조회 <?php echo $post['view_count']; ?></span>
        </div>
    </div>

    <div class="post-content">
        <div class="post-image">
        <img src="<?php echo htmlspecialchars('/bestone' . $post['image_url']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
        </div>
        <div class="post-text">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </div>
    </div>

    <!-- 수정/삭제 버튼 -->
    <div class="button-area">
        <button type="button" onclick="location.href='gallery.php'" class="btn btn-list">목록</button>
        <div class="right-buttons">
            <button type="button" onclick="showPasswordModal('edit')" class="btn btn-edit">수정</button>
            <button type="button" onclick="showPasswordModal('delete')" class="btn btn-delete">삭제</button>
        </div>
    </div>
        </div>
    </div>
</div>

<!-- 비밀번호 확인 모달 -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <h3>비밀번호 확인</h3>
        <input type="password" id="password" placeholder="비밀번호를 입력하세요">
        <div class="modal-buttons">
            <button type="button" onclick="confirmPassword()">확인</button>
            <button type="button" onclick="closeModal()">취소</button>
        </div>
    </div>
</div>

<style>
.view-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding: 80px 0;
}

.post-header {
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
}

.post-title {
    font-size: 32px;
    font-weight: 700;
    color: #191919;
    margin-bottom: 15px;
}

.post-meta {
    display: flex;
    gap: 20px;
    color: #666;
}

.post-content {
    margin-bottom: 60px;
}

.post-image {
    width: 100%;
    margin-bottom: 40px;
    text-align: center;
}

.post-image img {
    max-width: 100%;
    height: auto;
}

.post-text {
    line-height: 1.8;
    color: #333;
}

.button-area {
    display: flex;
    justify-content: space-between;
    margin-bottom: 60px;
}

.btn {
    padding: 10px 30px;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.btn-list {
    background: #f5f5f5;
    color: #333;
}

.right-buttons {
    display: flex;
    gap: 10px;
}

.btn-edit {
    background: #191919;
    color: white;
}

.btn-delete {
    background: #ff6b6b;
    color: white;
}

/* 댓글 영역 */
.comment-section {
    border-top: 1px solid #ddd;
    padding-top: 40px;
}

.comment-section h3 {
    font-size: 20px;
    margin-bottom: 20px;
}

.comment-form {
    margin-bottom: 30px;
}

.form-row {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

.form-row input {
    height: 40px;
    padding: 0 15px;
    border: 1px solid #ddd;
}

.form-row textarea {
    flex: 1;
    height: 80px;
    padding: 15px;
    border: 1px solid #ddd;
    resize: none;
}

.form-row button {
    width: 100px;
    background: #191919;
    color: white;
    border: none;
    cursor: pointer;
}

.comment-item {
    padding: 20px 0;
    border-bottom: 1px solid #f5f5f5;
}

.comment-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.comment-author {
    font-weight: 600;
    margin-right: 10px;
}

.comment-date {
    color: #666;
    font-size: 14px;
}

.comment-buttons {
    margin-left: auto;
}

.btn-small {
    padding: 5px 10px;
    font-size: 12px;
    border: none;
    background: none;
    cursor: pointer;
    color: #666;
}

.comment-content {
    line-height: 1.6;
}

/* 모달 스타일 */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 30px;
    border-radius: 8px;
    width: 90%;
    max-width: 400px;
}

.modal-content h3 {
    margin-bottom: 20px;
    text-align: center;
}

.modal-content input {
    width: 100%;
    height: 40px;
    padding: 0 15px;
    border: 1px solid #ddd;
    margin-bottom: 20px;
}

.modal-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.modal-buttons button {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

.modal-buttons button:first-child {
    background: #191919;
    color: white;
}

.modal-buttons button:last-child {
    background: #f5f5f5;
    color: #333;
}
</style>

<script>
let currentAction = '';
let currentCommentId = null;

function showPasswordModal(action) {
    currentAction = action;
    currentCommentId = null;
    document.getElementById('passwordModal').style.display = 'block';
}

function showCommentPasswordModal(action, commentId) {
    currentAction = action;
    currentCommentId = commentId;
    document.getElementById('passwordModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('passwordModal').style.display = 'none';
    document.getElementById('password').value = '';
}

function confirmPassword() {
    const password = document.getElementById('password').value;
    const postId = <?php echo $id; ?>;
    
    if(currentCommentId) {
        // 댓글 수정/삭제
        if(currentAction === 'delete') {
            if(confirm('정말 삭제하시겠습니까?')) {
                // 비밀번호 확인 후 삭제
                fetch('comment_process.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: `action=check_password&id=${currentCommentId}&password=${encodeURIComponent(password)}`
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        // 비밀번호가 맞으면 삭제 실행
                        return fetch('comment_process.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: `action=delete&id=${currentCommentId}&password=${encodeURIComponent(password)}`
                        });
                    } else {
                        throw new Error('비밀번호가 일치하지 않습니다.');
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
            }
        } else {
            // 비밀번호 확인 후 수정 페이지로 이동
            fetch('comment_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=check_password&id=${currentCommentId}&password=${encodeURIComponent(password)}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    window.location.href = `comment_edit.php?id=${currentCommentId}&password=${encodeURIComponent(password)}`;
                } else {
                    alert('비밀번호가 일치하지 않습니다.');
                }
            })
            .catch(error => {
                alert('처리 중 오류가 발생했습니다.');
            });
        }
    } else {
        // 게시글 수정/삭제
        if(currentAction === 'delete') {
            if(confirm('정말 삭제하시겠습니까?')) {
                // 비밀번호 확인 후 삭제
                fetch('gallery_process.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: `action=check_password&id=${postId}&password=${encodeURIComponent(password)}`
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        return fetch('gallery_process.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: `action=delete&id=${postId}&password=${encodeURIComponent(password)}`
                        });
                    } else {
                        throw new Error('비밀번호가 일치하지 않습니다.');
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        window.location.href = 'gallery.php';
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
            }
        } else {
            // 비밀번호 확인 후 수정 페이지로 이동
            fetch('gallery_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=check_password&id=${postId}&password=${encodeURIComponent(password)}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    window.location.href = `gallery_edit.php?id=${postId}&password=${encodeURIComponent(password)}`;
                } else {
                    alert('비밀번호가 일치하지 않습니다.');
                }
            })
            .catch(error => {
                alert('처리 중 오류가 발생했습니다.');
            });
        }
    }
    
    closeModal();
}
// ESC 키로 모달 닫기
document.addEventListener('keydown', function(e) {
    if(e.key === 'Escape') {
        closeModal();
    }
});
</script>

<?php include '../inc/footer.php'; ?>