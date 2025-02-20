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
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(!$post) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='list.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>갤러리 게시글 수정</title>
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
        .edit-form {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            height: 300px;
            resize: vertical;
        }
        .current-image {
            margin: 10px 0;
            max-width: 300px;
        }
        .current-image img {
            max-width: 100%;
            height: auto;
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
        .btn-secondary {
            background: #f5f5f5;
            color: #333;
        }
        .button-area {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>갤러리 게시글 수정</h1>
            <div>
                <a href="list.php" class="btn btn-secondary">목록</a>
                <a href="/admin/index.php" class="btn btn-secondary">대시보드</a>
            </div>
        </div>

        <form class="edit-form" method="POST" action="process.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label>제목</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
            </div>

            <div class="form-group">
                <label>작성자</label>
                <input type="text" value="<?php echo htmlspecialchars($post['author']); ?>" readonly>
            </div>

            <div class="form-group">
                <label>내용</label>
                <textarea name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>

            <div class="form-group">
                <label>현재 이미지</label>
                <?php if($post['image_url']): ?>
                <div class="current-image">
                    <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="현재 이미지">
                </div>
                <?php else: ?>
                <p>등록된 이미지가 없습니다.</p>
                <?php endif; ?>
                
                <label>새 이미지 (변경하지 않으려면 비워두세요)</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="button-area">
                <button type="button" onclick="history.back()" class="btn btn-secondary">취소</button>
                <button type="submit" class="btn btn-primary">수정하기</button>
            </div>
        </form>
    </div>

    <script>
    // 폼 전송 전 확인
    document.querySelector('.edit-form').addEventListener('submit', function(e) {
        if(!confirm('게시글을 수정하시겠습니까?')) {
            e.preventDefault();
        }
    });
    </script>
</body>
</html>