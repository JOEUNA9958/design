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
   <!-- Fonts -->
   <link rel="preconnect" href="//fonts.googleapis.com"/>
   <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
   <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
   
   <!-- Plugin CSS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <title>자료모음</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .visual {
            position: relative;
            width: 100%;
            height: 450px;
            background: url('../images/company/company_bg.jpg') no-repeat center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
        }


        .visual h2 {
           font-size: 48px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           position: relative;
           z-index: 1;
       }

       .visual p {
           font-size: 18px;
           margin-top: 20px;
           position: relative;
           z-index: 1;
       }

        .board-content {
            max-width: 1000px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .board-title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 80px;
        }

        /* 테이블 스타일 수정 */
        .board-table {
            width: 100%;
            border-top: 1px solid #000;
        }

        .board-table th,
        .board-table td {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
            font-weight: normal;
            color: #666;
        }

        .board-table th {
            font-weight: normal;
            color: #333;
        }

        .board-table td.title {
            text-align: left;
        }

        .board-table td.title a {
            color: #666;
            text-decoration: none;
        }

        .board-table td.title a:hover {
            text-decoration: underline;
        }

        /* 페이지네이션 스타일 수정 */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px 0 60px;
        }

        .pagination a,
        .pagination span {
            margin: 0 30px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        /* 검색 스타일 수정 */
        .search-box {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .search-box select,
        .search-box input {
            height: 40px;
            border: 1px solid #ddd;
            padding: 0 10px;
            min-width: 120px;
            color: #666;
        }

        .search-box button {
            width: 60px;
            height: 40px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .path span {
            margin: 0 5px;
        }

        .path {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 14px;
            margin: 30px 0 60px;
        }

        .path a {
            color: #666;
            text-decoration: none;
        }

        .board-title {
            text-align: center;
            font-size: 32px;
            margin-bottom: 60px;
        }

        .no-data {
            text-align: center;
            padding: 50px 0;
            color: #666;
        }
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: block;
    margin: 0;
}

.visual {
    position: relative;
    width: 100%;
    height: 450px;
    background: url('../images/company/company_bg.jpg') no-repeat center/cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.visual::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
}

.visual h2 {
    font-size: 48px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    position: relative;
    z-index: 1;
}

.visual p {
    font-size: 18px;
    margin-top: 20px;
    position: relative;
    z-index: 1;
}

.visual-menu {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 1;
}

.menu-item {
    flex: 1;
    max-width: 400px;
    border-right: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    transition: all 0.3s;
}

.menu-item:last-child {
    border-right: none;
}

.menu-item a {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s;
}

.menu-item:hover {
    background: #fff;
}

.menu-item:hover a {
    color: #000;
}

.menu-item.active {
    background: #fff;
}

.menu-item.active a {
    color: #000;
}

.board-content {
    max-width: 1000px;
    margin: 100px auto;
    padding: 0 20px;
}

.board-title {
    font-size: 32px;
    text-align: center;
    margin-bottom: 50px;
}

.write-btn {
    display: inline-block;
    padding: 12px 30px;
    background: #333;
    color: #fff;
    text-decoration: none;
    margin-bottom: 20px;
    float: right;
}
/* 반응형 스타일 */
@media (max-width: 1200px) {
    .board-content {
        padding: 0 40px;
        margin: 80px auto;
    }
}

@media (max-width: 991px) {
    .visual h2 {
        font-size: 36px;
    }

    .board-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .menu-item {
        max-width: 300px;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .visual h2 {
        font-size: 32px;
    }

    .visual p {
        font-size: 16px;
    }

    .menu-item {
        max-width: none;
    }

    .menu-item a {
        height: 50px;
        font-size: 14px;
    }

    .board-content {
        margin: 60px auto;
        padding: 0 20px;
    }

    .path {
        font-size: 13px;
        margin: 20px 0 40px;
    }

    /* 테이블 반응형 처리 */
    .board-table th:nth-child(3),
    .board-table th:nth-child(4),
    .board-table th:nth-child(5),
    .board-table td:nth-child(3),
    .board-table td:nth-child(4),
    .board-table td:nth-child(5) {
        display: none; /* 작성자, 작성일, 조회수 칼럼 숨김 */
    }

    .board-table th,
    .board-table td {
        padding: 15px 10px;
        font-size: 14px;
    }

    .board-table td.title {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .pagination {
        gap: 20px;
        margin: 30px 0;
    }

    .search-box {
        flex-wrap: wrap;
        gap: 8px;
    }

    .search-box select,
    .search-box input,
    .search-box button {
        font-size: 14px;
        height: 40px;
    }

    .search-box input {
        flex: 1;
        min-width: 200px;
    }
}

@media (max-width: 480px) {
    .visual {
        height: 300px;
    }

    .visual h2 {
        font-size: 28px;
    }

    .visual p {
        font-size: 14px;
    }

    .visual-menu {
        flex-wrap: wrap;
    }

    .menu-item {
        width: 50%;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .menu-item:nth-child(2n) {
        border-right: none;
    }

    .board-title {
        font-size: 24px;
        margin-bottom: 30px;
    }

    .board-table {
        border-top: none;
    }

    .board-table thead {
        display: none; /* 테이블 헤더 숨김 */
    }

    .board-table tbody tr {
        display: block;
        padding: 15px 0;
        border-bottom: 1px solid #ddd;
    }

    .board-table td {
        display: block;
        padding: 3px 0;
        border: none;
    }

    .board-table td:first-child {
        font-size: 12px;
        color: #999;
    }

    .board-table td.title {
        font-size: 15px;
        margin: 5px 0;
    }

    .search-box {
        flex-direction: column;
    }

    .search-box select,
    .search-box input,
    .search-box button {
        width: 100%;
        height: 36px;
    }
}

/* 최소 화면 크기 대응 (344px) */
@media (max-width: 359px) {
    .visual h2 {
        font-size: 24px;
    }

    .visual p {
        font-size: 13px;
    }

    .menu-item a {
        font-size: 13px;
        padding: 0 5px;
    }

    .board-title {
        font-size: 20px;
    }

    .board-table td.title {
        font-size: 14px;
    }

    .board-table td:first-child {
        font-size: 11px;
    }

    .pagination a,
    .pagination span {
        font-size: 13px;
    }

    .search-box select,
    .search-box input,
    .search-box button {
        height: 34px;
        font-size: 13px;
    }
}
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="visual">
        <h2>온라인문의</h2>
        <p>문의 주시면 친절하고 빠르게 답변해드리겠습니다.</p>
            <div class="visual-menu">
            <div class="menu-item ">
                <a href="/mncos2/online/online01.php">센터소식</a>
            </div>
            <div class="menu-item">
                <a href="/mncos2/online/online02.php">자유게시판</a>
            </div>
            <div class="menu-item">
                <a href="/mncos2/online/online03.php">프로그램 안내</a>
            </div>
            <div class="menu-item">
                <a href="/mncos2/online/online04.php">프로그램 사진</a>
            </div>
            <div class="menu-item active">
                <a href="/mncos2/online/online05.php">자료모음</a>
            </div>
        </div>
    </div>

    <div class="board-content">
        <div class="path">
            HOME <span>></span> 커뮤니티 <span>></span> 자료모음
        </div>
        
        <h3 class="board-title">자료모음</h3>

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
                    <td>관리자</td>
                    <td><?php echo date('Y-m-d', strtotime($notice['created_at'])); ?></td>
                    <td><?php echo $notice['views']; ?></td>
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