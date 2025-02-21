<?php
include '../inc/header.php';
include '../inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 조회수 증가
$conn->query("UPDATE guide_posts SET view_count = view_count + 1 WHERE id = $id");

// 게시글 정보 조회
$sql = "SELECT * FROM guide_posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(!$post) {
    header('Location: /news/guide.php');
    exit;
}

// 이전/다음 글 조회
$prev_sql = "SELECT id, title FROM guide_posts WHERE id < ? ORDER BY id DESC LIMIT 1";
$next_sql = "SELECT id, title FROM guide_posts WHERE id > ? ORDER BY id ASC LIMIT 1";

$stmt_prev = $conn->prepare($prev_sql);
$stmt_prev->bind_param("i", $id);
$stmt_prev->execute();
$prev_post = $stmt_prev->get_result()->fetch_assoc();

$stmt_next = $conn->prepare($next_sql);
$stmt_next->bind_param("i", $id);
$stmt_next->execute();
$next_post = $stmt_next->get_result()->fetch_assoc();
?>

<div class="sub-banner">
    <h2 class="banner-title">NEWS</h2>
</div>

<div class="sub-nav">
    <div class="nav-container">
        <ul class="nav-list">
            <li class="active">
                <a href="/news/guide">가이드라인</a>
            </li>
            <li>
                <a href="/news/exhibition">전시회</a>
                <span class="divider"></span>
            </li>
        </ul>
    </div>
</div>

<div class="view-section">
    <div class="view-container">
        <h2 class="section-title">가이드라인</h2>
        
        <div class="post-table">
            <!-- 제목 행 -->
            <div class="table-row">
                <div class="row-label">제목</div>
                <div class="row-content">
                    <?php echo htmlspecialchars($post['title']); ?>
                </div>
            </div>
            
            <!-- 작성일자 행 -->
            <div class="table-row">
                <div class="row-label">작성일자</div>
                <div class="row-content">
                    <?php echo date('Y-m-d', strtotime($post['created_at'])); ?>
                </div>
            </div>

            <!-- 내용 행 -->
            <div class="table-row content-row">
                <div class="row-content full">
                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                </div>
            </div>
            
            <!-- 첨부파일 행 -->
            <?php if($post['file_path']): ?>
            <div class="table-row">
                <div class="row-label">첨부파일</div>
                <div class="row-content">
                    <div class="file-info">
                        <span class="file-name"><?php echo htmlspecialchars($post['file_name']); ?></span>
                        <a href="/bestone/download.php?id=<?php echo $post['id']; ?>" class="download-link">
                            <img src="/bestone/images/download.gif" alt="다운로드" class="download-icon">
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- 버튼 영역 -->
        <div class="button-area">
            <div class="btn-container">
            <button type="button" onclick="location.href='/bestone/news/guide.php'" class="list-btn">목록</button>
            </div>
        </div>
    </div>
</div>

<style>
.view-section {
    width: 1280px;
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 80px;
}

.section-title {
    font-weight: 700;
    font-size: 39.21px;
    line-height: 46px;
    text-align: center;
    letter-spacing: -0.84px;
    color: #191919;
    margin-bottom: 60px;
}

.post-table {
    border-top: 2px solid #191919;
}

.table-row {
    display: flex;
    min-height: 65px;
    border-bottom: 1px solid #ddd;
}

.row-label {
    width: 200px;
    background: #F9F9FB;
    padding: 20px;
    font-weight: 600;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.row-content {
    flex: 1;
    padding: 20px;
    font-size: 15px;
    line-height: 1.5;
    min-height: 65px;
    display: flex;
    align-items: center;
}
.content-row {
    padding: 47px 0;
}

.content-row .row-content {
    min-height: 200px;
    align-items: flex-start;
    line-height: 1.6;
}

.file-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.file-name {
    font-size: 15px;
}

.download-link {
    display: inline-block;
}
.download-icon {
    width: 20px;
    height: 20px;
    vertical-align: middle;
}

.button-area {
    margin-top: 40px;
    display: flex;
    justify-content: center;
}

.btn-container {
    display: flex;
    justify-content: center;
    padding: 0 12px;
}

.list-btn {
    min-width: 100px;
    height: 45px;
    background: #191919;
    color: #FFFFFF;
    border: none;
    cursor: pointer;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<?php include '../inc/footer.php'; ?>