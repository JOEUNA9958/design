<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}

$sql = "SELECT * FROM guide_posts $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>가이드라인 관리</title>
    <style>
        /* 스타일은 이전 관리자 페이지와 동일 */
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>가이드라인 관리</h1>
            <button onclick="openModal()" class="btn btn-primary">글 작성</button>
        </div>

        <div class="search-section">
            <input type="text" placeholder="제목 검색" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button onclick="searchPosts()" class="btn">검색</button>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>첨부파일</th>
                    <th>조회수</th>
                    <th>등록일</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo $row['file_path'] ? '있음' : '없음'; ?></td>
                    <td><?php echo $row['view_count']; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                    <td>
                        <button onclick="editPost(<?php echo $row['id']; ?>)" class="btn">수정</button>
                        <button onclick="deletePost(<?php echo $row['id']; ?>)" class="btn">삭제</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- 글 작성/수정 모달 -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle">글 작성</h2>
            <form id="postForm" method="POST" enctype="multipart/form-data" action="guide_process.php">
                <input type="hidden" name="action" id="formAction" value="create">
                <input type="hidden" name="post_id" id="postId" value="">
                
                <div class="form-group">
                    <label>제목</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="form-group">
                    <label>내용</label>
                    <textarea name="content" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>첨부파일 (PDF)</label>
                    <input type="file" name="attachment" accept=".pdf">
                </div>
                
                <button type="submit" class="btn btn-primary">저장</button>
                <button type="button" onclick="closeModal()" class="btn">취소</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript 코드는 이전과 유사하게 작성
    </script>
</body>
</html>