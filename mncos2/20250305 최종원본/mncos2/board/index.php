<?php
require_once '../inc/db.php';
session_start();

// 페이지네이션
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// 검색 조건
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

try {
    // 검색 쿼리 조건 설정
    $where = "1=1";
    if ($search_keyword) {
        if ($search_type == '내용') {
            $where .= " AND content LIKE :keyword";
        } else if ($search_type == '작성자') {
            $where .= " AND author LIKE :keyword";
        }
    }

    // 전체 게시물 수 조회 (검색 조건 적용)
    $count_stmt = $db->prepare("SELECT COUNT(*) FROM notice WHERE $where");
    if ($search_keyword) {
        $count_stmt->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    }
    $count_stmt->execute();
    $total_count = $count_stmt->fetchColumn();
    $total_pages = ceil($total_count / $limit);

    // 게시물 목록 조회 (검색 조건 적용)
    $stmt = $db->prepare("SELECT * FROM notice WHERE $where ORDER BY id DESC LIMIT :offset, :limit");
    if ($search_keyword) {
        $stmt->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    }
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $notices = [];
    $total_pages = 0;
    error_log("Database Error: " . $e->getMessage());
}

// 페이지가 총 페이지 수보다 크면 마지막 페이지로 리다이렉트
if ($page > $total_pages && $total_pages > 0) {
    header("Location: ?page=" . $total_pages);
    exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 - M&COS</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>BOARD</h2>
        <p>공지사항</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item active">
                <a href="/mncos2/board/index.php">공지사항</a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="/mncos2/gallery/index.php">갤러리</a>
            </div>
        </div>
    </div>

    <div class="board-content">
        <div class="board-path">
            HOME <span>></span> BOARD <span>></span> 공지사항
        </div>
        
        <h3 class="board-title">공지사항</h3>

        <table class="board-table">
            <thead>
                <tr>
                    <th width="80">번호</th>
                    <th>제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="80">조회</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notices as $notice): ?>
                <tr>
                    <td><?php echo $notice['id']; ?></td>
                    <td class="title">
                        <a href="view.php?id=<?php echo $notice['id']; ?>">
                            <?php echo escape_string($notice['title']); ?>
                        </a>
                    </td>
                    <td>E****</td>
                    <td><?php echo date('Y-m-d', strtotime($notice['created_at'])); ?></td>
                    <td><?php echo $notice['views']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="board-pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page-1; ?>">&lt;</a>
            <?php endif; ?>
            
            <span><?php echo $page; ?></span>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page+1; ?>">&gt;</a>
            <?php endif; ?>
        </div>

        <div class="board-search">
            <select name="search_type">
                <option value="내용" <?php echo $search_type == '내용' ? 'selected' : ''; ?>>내용</option>
                <option value="작성자" <?php echo $search_type == '작성자' ? 'selected' : ''; ?>>작성자</option>
            </select>
            <input type="text" name="search_keyword" value="<?php echo escape_string($search_keyword); ?>" placeholder="검색어를 입력하세요">
            <button type="button" onclick="search()">찾기</button>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
    function search() {
        const type = document.querySelector('[name="search_type"]').value;
        const keyword = document.querySelector('[name="search_keyword"]').value;
        location.href = `?search_type=${encodeURIComponent(type)}&search_keyword=${encodeURIComponent(keyword)}`;
    }
    </script>
</body>
</html>