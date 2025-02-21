<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND (title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%' OR author LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%')";
}
if($status_filter) {
    $where_clause .= " AND status = '".mysqli_real_escape_string($conn, $status_filter)."'";
}

// 전체 갯수 조회
$count_sql = "SELECT COUNT(*) as total FROM inquiries $where_clause";
$total_result = $conn->query($count_sql);
$total_items = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// 문의 목록 조회
$sql = "SELECT * FROM inquiries $where_clause ORDER BY created_at DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의 관리</title>
    <style>
        .admin-container {
            width: 1280px;
            margin: 40px auto;
            padding: 20px;
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
        .status-filter {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .inquiry-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-top: 2px solid #191919;
        }
        .inquiry-table th,
        .inquiry-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        .inquiry-table th {
            background: #F9F9FB;
            font-weight: 600;
            font-size: 15px;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
        }
        .status-pending {
            background: #ff6b6b;
            color: white;
        }
        .status-completed {
            background: #51cf66;
            color: white;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary {
            background: #191919;
            color: white;
        }

        .search-section input {
            height: 40px;
            padding: 0 10px;
            border: 1px solid #ddd;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* 페이지네이션 */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 40px;
        }

        .pagination a {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
        }

        .pagination a.active {
            background: #191919;
            color: white;
            border-color: #191919;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>문의 관리</h1>
        </div>

        <div class="search-section">
            <input type="text" placeholder="검색어를 입력하세요" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button onclick="searchInquiries()" class="btn btn-primary">검색</button>
        </div>

        <div class="status-filter">
            <label class="radio-label">
                <input type="radio" name="status" value="" <?php echo $status_filter == '' ? 'checked' : ''; ?> onchange="filterByStatus(this.value)">
                전체
            </label>
            <label class="radio-label">
                <input type="radio" name="status" value="pending" <?php echo $status_filter == 'pending' ? 'checked' : ''; ?> onchange="filterByStatus(this.value)">
                미답변
            </label>
            <label class="radio-label">
                <input type="radio" name="status" value="completed" <?php echo $status_filter == 'completed' ? 'checked' : ''; ?> onchange="filterByStatus(this.value)">
                답변완료
            </label>
        </div>

        <table class="inquiry-table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>회사명</th>
                    <th>상태</th>
                    <th>등록일</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['author']); ?></td>
                    <td><?php echo htmlspecialchars($row['company']); ?></td>
                    <td>
                        <span class="status-badge status-<?php echo $row['status']; ?>">
                            <?php echo $row['status'] == 'pending' ? '미답변' : '답변완료'; ?>
                        </span>
                    </td>
                    <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                    <td>
                        <button onclick="location.href='inquiry_view.php?id=<?php echo $row['id']; ?>'" class="btn btn-primary">보기</button>
                        <button onclick="deleteInquiry(<?php echo $row['id']; ?>)" class="btn">삭제</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- 페이지네이션 -->
        <div class="pagination">
            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&keyword=<?php echo urlencode($search_keyword); ?>&status=<?php echo urlencode($status_filter); ?>" 
                   class="<?php echo $current_page == $i ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>

    <script>
    function searchInquiries() {
        const keyword = document.querySelector('input[type="text"]').value;
        const status = document.querySelector('input[name="status"]:checked').value;
        location.href = `?keyword=${encodeURIComponent(keyword)}&status=${status}`;
    }

    function filterByStatus(status) {
        const keyword = document.querySelector('input[type="text"]').value;
        location.href = `?keyword=${encodeURIComponent(keyword)}&status=${status}`;
    }

    function deleteInquiry(id) {
        if(confirm('정말 삭제하시겠습니까?')) {
            fetch('inquiry_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=delete&id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    location.reload();
                } else {
                    alert(data.message || '삭제 실패');
                }
            });
        }
    }
    </script>
</body>
</html>