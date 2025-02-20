<?php
session_start();
include '../../inc/admin_check.php';
include '../../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND (title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%' OR author LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%')";
}

// 전체 갯수 조회
$count_sql = "SELECT COUNT(*) as total FROM gallery_posts $where_clause";
$total_result = $conn->query($count_sql);
$total_items = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// 게시글 목록 조회
$sql = "SELECT * FROM gallery_posts $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>갤러리 관리</title>
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
            margin-bottom: 20px;
        }
        .search-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .gallery-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .gallery-table th,
        .gallery-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .gallery-table th {
            background: #f5f5f5;
        }
        .thumbnail {
            width: 100px;
            height: 100px;
            object-fit: cover;
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
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
        }
        .page-link.active {
            background: #191919;
            color: white;
            border-color: #191919;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .status-badge.high {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>갤러리 관리</h1>
            <a href="/admin/index.php" class="btn">대시보드</a>
        </div>

        <div class="search-section">
            <input type="text" placeholder="검색어를 입력하세요" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button onclick="searchGallery()" class="btn btn-primary">검색</button>
        </div>

        <table class="gallery-table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>이미지</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>댓글</th>
                    <th>조회수</th>
                    <th>등록일</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="thumbnail" 
                             onclick="window.open(this.src)" style="cursor:pointer">
                    </td>
                    <td>
                        <a href="/news/gallery_view.php?id=<?php echo $row['id']; ?>" target="_blank">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($row['author']); ?></td>
                    <td>
                        <?php if($row['comment_count'] > 0): ?>
                        <span class="status-badge <?php echo $row['comment_count'] >= 5 ? 'high' : ''; ?>">
                            <?php echo $row['comment_count']; ?>
                        </span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row['view_count']; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                    <td>
                        <button onclick="editPost(<?php echo $row['id']; ?>)" class="btn">수정</button>
                        <button onclick="deletePost(<?php echo $row['id']; ?>)" class="btn btn-danger">삭제</button>
                        <button onclick="viewComments(<?php echo $row['id']; ?>)" class="btn">댓글관리</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php
            for($i = 1; $i <= $total_pages; $i++) {
                $active_class = $current_page == $i ? 'active' : '';
                echo "<a href='?page=$i&keyword=$search_keyword' class='page-link $active_class'>$i</a>";
            }
            ?>
        </div>
    </div>

    <script>
    function searchGallery() {
        const keyword = document.querySelector('input[type="text"]').value;
        location.href = `?keyword=${encodeURIComponent(keyword)}`;
    }

    function editPost(id) {
        location.href = `edit.php?id=${id}`;
    }

    function deletePost(id) {
        if(confirm('정말 삭제하시겠습니까?\n삭제된 게시글은 복구할 수 없습니다.')) {
            fetch('process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=delete&id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            });
        }
    }

    function viewComments(id) {
        location.href = `comments.php?post_id=${id}`;
    }
    </script>
</body>
</html>