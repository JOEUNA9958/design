<?php
require_once '../../inc/db.php';
session_start();

// 관리자 체크
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='/mncos2/admin/login.php';</script>";
    exit;
}

// 페이지네이션
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// 검색 조건
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

// 검색 쿼리 조건
$where = "1=1";
if ($search_keyword) {
    if ($search_type == '제목') {
        $where .= " AND title LIKE '%$search_keyword%'";
    } else if ($search_type == '작성자') {
        $where .= " AND author LIKE '%$search_keyword%'";
    }
}
if ($status_filter) {
    $where .= " AND status = '$status_filter'";
}

// 전체 게시물 수 조회
$stmt = $db->query("SELECT COUNT(*) as cnt FROM inquiry WHERE $where");
$row = $stmt->fetch();
$total_count = $row['cnt'];
$total_pages = ceil($total_count / $limit);

// 게시물 목록 조회
$stmt = $db->query("SELECT * FROM inquiry WHERE $where ORDER BY id DESC LIMIT $offset, $limit");
$inquiries = $stmt->fetchAll();

// 상태별 통계
$stats = $db->query("SELECT status, COUNT(*) as cnt FROM inquiry GROUP BY status")->fetchAll();
$status_counts = array_column($stats, 'cnt', 'status');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의사항 관리 - M&COS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .admin-title {
            font-size: 24px;
        }

        .admin-menu {
            display: flex;
            gap: 20px;
        }

        .status-filter {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .status-item {
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 20px;
            cursor: pointer;
        }

        .status-item.active {
            background: #333;
            color: #fff;
            border-color: #333;
        }

        .status-count {
            margin-left: 5px;
            color: #666;
        }

        .board-table {
            width: 100%;
            border-top: 1px solid #000;
        }

        .board-table th,
        .board-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .board-table td.title {
            text-align: left;
        }

        .board-table td.title a {
            color: #333;
            text-decoration: none;
        }

        .board-table td.title i {
            color: #999;
            margin-right: 5px;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 12px;
        }

        .status.new { background: #eee; }
        .status.in-progress { background: #fff3cd; }
        .status.completed { background: #d4edda; }

        .answer-btn {
            padding: 5px 10px;
            background: #009FE3;
            color: #fff;
            border-radius: 3px;
            text-decoration: none;
            font-size: 12px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
        }

        .pagination a {
            color: #666;
            text-decoration: none;
        }

        .search-box {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 30px;
        }

        .search-box select,
        .search-box input {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .search-box button {
            padding: 8px 20px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">문의사항 관리</h1>
            <div class="admin-menu">
                <a href="/mncos2/admin/">관리자 홈</a>
                <a href="/mncos2/admin/logout.php">로그아웃</a>
            </div>
        </div>

        <div class="status-filter">
            <a href="?status=" class="status-item <?php echo $status_filter === '' ? 'active' : ''; ?>">
                전체 <span class="status-count"><?php echo $total_count; ?></span>
            </a>
            <a href="?status=NEW" class="status-item <?php echo $status_filter === 'NEW' ? 'active' : ''; ?>">
                접수 <span class="status-count"><?php echo $status_counts['NEW'] ?? 0; ?></span>
            </a>
            <a href="?status=IN_PROGRESS" class="status-item <?php echo $status_filter === 'IN_PROGRESS' ? 'active' : ''; ?>">
                처리중 <span class="status-count"><?php echo $status_counts['IN_PROGRESS'] ?? 0; ?></span>
            </a>
            <a href="?status=COMPLETED" class="status-item <?php echo $status_filter === 'COMPLETED' ? 'active' : ''; ?>">
                답변완료 <span class="status-count"><?php echo $status_counts['COMPLETED'] ?? 0; ?></span>
            </a>
        </div>

        <table class="board-table">
            <thead>
                <tr>
                    <th width="80">번호</th>
                    <th>제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="100">상태</th>
                    <th width="80">조회</th>
                    <th width="100">관리</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inquiries as $inquiry): ?>
                <tr>
                    <td><?php echo $inquiry['id']; ?></td>
                    <td class="title">
                        <a href="/mncos2/contact/view.php?id=<?php echo $inquiry['id']; ?>">
                            <?php if ($inquiry['is_secret']): ?>
                                <i class="fas fa-lock"></i>
                            <?php endif; ?>
                            <?php echo htmlspecialchars($inquiry['title']); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($inquiry['author']); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($inquiry['created_at'])); ?></td>
                    <td>
                        <?php 
                        $status_class = '';
                        $status_text = '';
                        switch($inquiry['status']) {
                            case 'NEW':
                                $status_class = 'new';
                                $status_text = '접수';
                                break;
                            case 'IN_PROGRESS':
                                $status_class = 'in-progress';
                                $status_text = '처리중';
                                break;
                            case 'COMPLETED':
                                $status_class = 'completed';
                                $status_text = '답변완료';
                                break;
                        }
                        ?>
                        <span class="status <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                    </td>
                    <td><?php echo $inquiry['views']; ?></td>
                    <td>
                        <a href="inquiry_answer.php?id=<?php echo $inquiry['id']; ?>" class="answer-btn">
                            <?php echo $inquiry['answer'] ? '답변수정' : '답변하기'; ?>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page-1; ?>&status=<?php echo $status_filter; ?>">&lt;</a>
            <?php endif; ?>
            
            <span><?php echo $page; ?></span>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page+1; ?>&status=<?php echo $status_filter; ?>">&gt;</a>
            <?php endif; ?>
        </div>

        <div class="search-box">
            <select name="search_type">
                <option value="전체" <?php echo $search_type === '전체' ? 'selected' : ''; ?>>전체</option>
                <option value="제목" <?php echo $search_type === '제목' ? 'selected' : ''; ?>>제목</option>
                <option value="작성자" <?php echo $search_type === '작성자' ? 'selected' : ''; ?>>작성자</option>
            </select>
            <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button type="button" onclick="search()">찾기</button>
        </div>
    </div>

    <script>
        function search() {
            const type = document.querySelector('[name="search_type"]').value;
            const keyword = document.querySelector('[name="search_keyword"]').value;
            location.href = `?search_type=${type}&search_keyword=${keyword}&status=<?php echo $status_filter; ?>`;
        }
    </script>
</body>
</html>