<?php
include '../inc/header.php';
include '../inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 조회수 증가
$conn->query("UPDATE exhibitions SET view_count = view_count + 1 WHERE id = $id");

// 전시회 정보 조회
$sql = "SELECT * FROM exhibitions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$exhibition = $result->fetch_assoc();

// 댓글 조회
$comment_sql = "SELECT * FROM exhibition_comments WHERE exhibition_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($comment_sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$comments = $stmt->get_result();
?>

<div class="view-section">
    <div class="view-container">
        <h2 class="section-title">참여전시회</h2>

        <div class="exhibition-table">
            <div class="table-row">
                <div class="row-label">전시회 명</div>
                <div class="row-content"><?php echo htmlspecialchars($exhibition['title']); ?></div>
            </div>

            <div class="table-row">
                <div class="row-label">전시회 시작일</div>
                <div class="row-content"><?php echo date('Y년 m월 d일', strtotime($exhibition['start_date'])); ?></div>
            </div>

            <div class="table-row">
                <div class="row-label">전시회 종료일</div>
                <div class="row-content"><?php echo date('Y년 m월 d일', strtotime($exhibition['end_date'])); ?></div>
            </div>

            <div class="table-row">
                <div class="row-label">조회수</div>
                <div class="row-content"><?php echo $exhibition['view_count']; ?></div>
            </div>

            <!-- 이미지 영역 -->
            <div class="content-image">
                <?php
                $image_url = $exhibition['image_url'];
                if (strpos($image_url, '/bestone') !== 0) {
                    $image_url = '/bestone' . $image_url;
                }
                $image_url = str_replace('/bestone/bestone', '/bestone', $image_url);
                ?>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($exhibition['title']); ?>">
            </div>
            </div>
        </div>

        <!-- 목록 버튼 -->
        <div class="button-area">
            <button type="button" onclick="location.href='/news/gallery'" class="list-btn">목록</button>
        </div>
    </div>
</div>

<style>
.view-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 140px;
}

.section-title {
    font-weight: 700;
    font-size: 40px;
    text-align: center;
    color: #191919;
    margin-bottom: 80px;
}

.exhibition-table {
    border-top: 2px solid #191919;
}

.table-row {
    display: flex;
    align-items: center;
    min-height: 65px;
    border-bottom: 1px solid #E5E5E5;
}

.row-label {
    width: 200px;
    padding: 20px;
    background: #F9F9FB;
    font-weight: 600;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #191919;
}


.row-content {
    flex: 1;
    padding: 20px;
    font-size: 15px;
    line-height: 1.5;
    display: flex;
    align-items: center;
    color: #191919;
}

.content-row {
    display: flex;
    justify-content: center;
    padding: 48px 0;
}

.content-image {
    padding: 60px 0;
    text-align: center;
    border-bottom: 1px solid #E5E5E5;
}

.content-image img {
    max-width: 800px;
    width: 100%;
    height: auto;
}

/* 댓글 영역 */
.comment-section {
    margin-top: 60px;
}

.comment-section h3 {
    font-weight: 600;
    font-size: 18px;
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
    padding: 10px;
    border: 1px solid #E5E5E5;
    width: 200px;
}

.comment-form textarea {
    width: 100%;
    height: 100px;
    padding: 15px;
    border: 1px solid #E5E5E5;
    margin-bottom: 10px;
    resize: none;
}

.comment-form button {
    padding: 10px 30px;
    background: #191919;
    color: white;
    border: none;
    cursor: pointer;
}

.comment-list {
    border-top: 1px solid #E3E3E3;
}

.comment-item {
    padding: 20px 0;
    border-bottom: 1px solid #E3E3E3;
}

.comment-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.comment-header .author {
    font-weight: 600;
    margin-right: 10px;
}

.comment-header .date {
    color: #9C9C9C;
    font-size: 14px;
}

.delete-btn {
    margin-left: auto;
    padding: 4px 8px;
    background: none;
    border: 1px solid #E3E3E3;
    cursor: pointer;
}

.comment-content {
    line-height: 1.6;
}

/* 버튼 영역 */
.button-area {
    margin-top: 40px;
    text-align: center;
}

.list-btn {
    min-width: 120px;
    height: 45px;
    background: #191919;
    color: #FFFFFF;
    border: none;
    cursor: pointer;
    font-size: 15px;
}

.sub-banner {
    width: 100%;
    height: 500px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    background: #191919;
}

.banner-title {
    color: #fff;
    font-size: 45px;
    font-weight: 700;
    position: relative;
    z-index: 1;
}

.sub-nav {
    background: #f5f5f5;
    padding: 20px 0;
    margin-bottom: 40px;
}

.nav-container {
    width: 1280px;
    margin: 0 auto;
}

.nav-list {
    display: flex;
    list-style: none;
    gap: 40px;
    margin: 0;
    padding: 0;
}

.nav-list a {
    text-decoration: none;
    color: #191919;
    font-size: 16px;
}

.nav-list li.active a {
    font-weight: 600;
}

/* 페이지네이션 */
.pagination {
    display: flex;
    justify-content: center;
    gap: 8.02px;
    margin-top: 60px;
    margin-bottom: 100px;
}

.page-link {
    width: 64px;
    height: 52px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins';
    font-size: 14.875px;
    line-height: 20px;
    text-decoration: none;
    letter-spacing: -0.32px;
    border: 2px solid #E3E3E3;
    color: #333333;
}

.page-link.active {
    background: #191919;
    color: #FFFFFF;
    border-color: #191919;
}

.page-link.prev,
.page-link.next {
    width: auto;
    padding: 0 15px;
}
</style>

<script>
function deleteComment(commentId) {
    const password = prompt('댓글 삭제를 위해 비밀번호를 입력하세요.');
    if (password) {
        fetch('comment_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=delete&comment_id=${commentId}&password=${password}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || '댓글 삭제에 실패했습니다.');
            }
        });
    }
}
</script>

<?php include '../inc/footer.php'; ?>