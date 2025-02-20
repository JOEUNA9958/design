<?php
include '../inc/db.php';

$id = $_GET['id'];
$password = $_GET['password'];

// 댓글 조회
$stmt = $db->prepare("SELECT * FROM gallery_comments WHERE id = ?");
$stmt->execute([$id]);
$comment = $stmt->fetch();

// 비밀번호 확인
if (!password_verify($password, $comment['password'])) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit;
}

// 수정 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $nickname = $_POST['nickname'];
    
    $stmt = $db->prepare("UPDATE gallery_comments SET content = ?, nickname = ? WHERE id = ?");
    if ($stmt->execute([$content, $nickname, $id])) {
        echo "<script>alert('수정되었습니다.'); location.href='view.php?id=" . $comment['gallery_id'] . "';</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글 수정</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .edit-wrap {
            max-width: 800px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .edit-form {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group textarea {
            width: 100%;
            height: 150px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }

        .btn-wrap {
            margin-top: 20px;
            text-align: center;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn-wrap button {
            padding: 12px 30px;
            border: none;
            background: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-wrap button:hover {
            background: #555;
        }

        .btn-wrap .cancel-btn {
            background: #666;
        }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="edit-wrap">
        <form class="edit-form" method="POST">
            <div class="form-group">
                <label>닉네임</label>
                <input type="text" name="nickname" value="<?php echo htmlspecialchars($comment['nickname']); ?>">
            </div>
            <div class="form-group">
                <label>내용</label>
                <textarea name="content" required><?php echo htmlspecialchars($comment['content']); ?></textarea>
            </div>
            <div class="btn-wrap">
                <button type="button" class="cancel-btn" onclick="history.back()">취소</button>
                <button type="submit">수정하기</button>
            </div>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>