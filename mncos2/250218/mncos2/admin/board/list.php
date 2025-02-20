<?php
require_once '../../inc/db.php';
session_start();

// 로그인 체크
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: /mncos2/admin/login.php');
    exit;
}

// 페이지네이션
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// 검색 조건
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

// 검색 쿼리 조건
$where = "1=1";
if ($search_keyword) {
    if ($search_type == '제목') {
        $where .= " AND title LIKE '%$search_keyword%'";
    }
}

// 전체 게시물 수 조회
$stmt = $db->query("SELECT COUNT(*) as cnt FROM notice WHERE $where");
$row = $stmt->fetch();
$total_count = $row['cnt'];
$total_pages = ceil($total_count / $limit);

// 게시물 목록 조회
$stmt = $db->query("SELECT * FROM notice WHERE $where ORDER BY id DESC LIMIT $offset, $limit");
$notices = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 관리 - M&COS</title>
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

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        }

        .btn-primary {
            background: #009FE3;
            color: #fff;
            border-color: #009FE3;
        }

        .board-table {
            width: 100%;
            border-top: 1px solid #000;
            border-collapse: collapse;
            margin-bottom: 30px;
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

        .board-table a {
            color: #333;
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
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">공지사항 관리</h1>
            <div class="admin-menu">
                <a href="/mncos2/admin/" class="btn">관리자 홈</a>
                <a href="/mncos2/admin/board/write.php" class="btn btn-primary">글쓰기</a>
            </div>
        </div>

        <table class="board-table">
            <thead>
                <tr>
                    <th width="80">번호</th>
                    <th>제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="80">조회</th>
                    <th width="100">관리</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notices as $notice): ?>
                <tr>
                    <td><?php echo $notice['id']; ?></td>
                    <td class="title">
                        <a href="/mncos2/board/view.php?id=<?php echo $notice['id']; ?>">
                            <?php echo htmlspecialchars($notice['title']); ?>
                        </a>
                    </td>
                    <td>관리자</td>
                    <td><?php echo date('Y-m-d', strtotime($notice['created_at'])); ?></td>
                    <td><?php echo $notice['views']; ?></td>
                    <td>
                        <a href="/mncos2/admin/board/write.php?id=<?php echo $notice['id']; ?>">수정</a>
                        <a href="javascript:void(0)" onclick="deleteNotice(<?php echo $notice['id']; ?>)">삭제</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page-1; ?>">&lt;</a>
            <?php endif; ?>
            
            <span><?php echo $page; ?></span>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page+1; ?>">&gt;</a>
            <?php endif; ?>
        </div>

        <div class="search-box">
            <select name="search_type">
                <option value="전체">전체</option>
                <option value="제목">제목</option>
            </select>
            <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button type="button" onclick="search()">찾기</button>
        </div>
    </div>

    <script>
    function deleteNotice(id) {
        if (confirm('정말 삭제하시겠습니까?')) {
            location.href = `/mncos2/admin/board/delete.php?id=${id}`;
        }
    }

    function search() {
        const type = document.querySelector('[name="search_type"]').value;
        const keyword = document.querySelector('[name="search_keyword"]').value;
        location.href = `?search_type=${type}&search_keyword=${keyword}`;
    }
    </script>
</body>
</html>