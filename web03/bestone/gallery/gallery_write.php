<?php
include '../inc/header.php';
?>

<div class="sub-banner">
    <h2 class="banner-title">GALLERY</h2>
</div>

<div class="write-section">
    <h2 class="section-title">글쓰기</h2>

    <form class="write-form" method="POST" action="gallery_process.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="write">
        
        <div class="form-group">
            <label>제목</label>
            <input type="text" name="title" required>
        </div>
        
        <div class="form-row">
            <div class="form-group half">
                <label>작성자</label>
                <input type="text" name="author" required>
            </div>
            <div class="form-group half">
                <label>비밀번호</label>
                <input type="password" name="password" required>
            </div>
        </div>

        <div class="form-group">
            <label>내용</label>
            <textarea name="content" rows="10" required></textarea>
        </div>

        <div class="form-group">
            <label>이미지</label>
            <div class="image-upload-wrapper">
                <input type="file" name="image" id="imageUpload" accept="image/*" required>
                <div id="imagePreview" class="image-preview"></div>
            </div>
        </div>

        <div class="button-area">
            <button type="button" onclick="history.back()" class="btn btn-cancel">취소</button>
            <button type="submit" class="btn btn-submit">등록</button>
        </div>
    </form>
</div>

<style>
.write-section {
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

.write-form {
    max-width: 800px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 30px;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.form-group.half {
    flex: 1;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: #191919;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    height: 50px;
    padding: 0 15px;
    border: 1px solid #ddd;
    font-size: 15px;
}

textarea {
    width: 100%;
    padding: 15px;
    border: 1px solid #ddd;
    font-size: 15px;
    resize: vertical;
}

.image-upload-wrapper {
    position: relative;
}

.image-preview {
    width: 100%;
    height: 300px;
    margin-top: 10px;
    background: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.image-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.button-area {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 50px;
}

.btn {
    min-width: 120px;
    height: 50px;
    border: none;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
}

.btn-cancel {
    background: #f5f5f5;
    color: #333;
}

.btn-submit {
    background: #191919;
    color: white;
}
</style>

<script>
// 이미지 미리보기 기능
document.getElementById('imageUpload').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    const file = e.target.files[0];
    
    if(file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(img);
        }
        
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
});

// 폼 전송 전 유효성 검사
document.querySelector('.write-form').addEventListener('submit', function(e) {
    const password = document.querySelector('input[name="password"]').value;
    
    if(password.length < 4) {
        e.preventDefault();
        alert('비밀번호는 4자 이상이어야 합니다.');
    }
});
</script>

<?php include '../inc/footer.php'; ?>