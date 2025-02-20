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
    // 전체 게시물 수 조회
    $total_count = $db->query("SELECT COUNT(*) FROM notice")->fetchColumn();
    $total_pages = ceil($total_count / $limit);

    // 게시물 목록 조회 (prepared statement 사용)
    $stmt = $db->prepare("SELECT * FROM notice ORDER BY id DESC LIMIT :offset, :limit");
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // 오류 발생 시 빈 배열로 초기화
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
    
    <title>공지사항 - M&COS</title>
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
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="visual">
        <h2>WE ARE INNOVATION</h2>
        <p>우리는 창상 고객님의 입장에서 생각하고 끊임없이 노력합니다.</p>
    </div>

    <div class="board-content">
        <div class="path">
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
                <option value="전체">일주일</option>
                <option value="제목">제목</option>
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
            location.href = `?search_type=${type}&search_keyword=${keyword}`;
        }
    </script>
</body>
</html>