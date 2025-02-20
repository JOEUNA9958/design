<?php
include '../inc/header.php';
include '../inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$password = isset($_GET['password']) ? $_GET['password'] : '';

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

// 비밀번호 확인
if(!password_verify($password, $post['password'])) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit;
}
?>

<div class="sub-banner">
    <h2 class="banner-title">GALLERY</h2>
</div>

<div class="edit-section">
    <h2 class="section-title">글 수정</h2>

    <form class="edit-form" method="POST" action="gallery_process.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        
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
            <textarea name="content" rows="10" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        </div>

        <div class="form-group">
            <label>현재 이미지</label>
            <div class="current-image">
                <?php
                // 기존 이미지 URL이 /bestone으로 시작하지 않으면 추가
                $image_url = $post['image_url'];
                if(strpos($image_url, '/bestone') !== 0) {
                    $image_url = '/bestone' . $image_url;
                }
                ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="현재 이미지">
            </div>
            <label>새 이미지 (변경하지 않으려면 비워두세요)</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="button-area">
            <button type="button" onclick="history.back()" class="btn btn-cancel">취소</button>
            <button type="submit" class="btn btn-submit">수정하기</button>
        </div>
    </form>
</div>

<style>
.edit-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding: 80px 0;
}

.section-title {
    font-family: 'Poppins';
    font-size: 39.21px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 60px;
    color: #191919;
}

.edit-form {
    max-width: 800px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 30px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: #191919;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 15px;
}

input[readonly] {
    background: #f5f5f5;
}

.current-image {
    margin: 10px 0 20px;
    max-width: 300px;
}

.current-image img {
    width: 100%;
    height: auto;
}

.button-area {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
}

.btn {
    padding: 12px 30px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-cancel {
    background: #f5f5f5;
    color: #333;
}

.btn-submit {
    background: #191919;
    color: white;
}

.btn:hover {
    opacity: 0.9;
}
</style>

<?php include '../inc/footer.php'; ?>