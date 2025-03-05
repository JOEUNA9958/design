<?php
mb_internal_encoding('UTF-8');
header('Content-Type: text/html; charset=UTF-8');
require_once '../inc/db.php';

// 데이터베이스 연결 직후 문자셋 설정
$db->exec("SET NAMES utf8mb4");

session_start();

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
    if ($search_type == '내용') {
        $where .= " AND content LIKE '%" . $search_keyword . "%'";
    } else if ($search_type == '작성자') {
        $where .= " AND author LIKE '%" . $search_keyword . "%'";
    }
}

// 전체 게시물 수 조회
$stmt = $db->query("SELECT COUNT(*) as cnt FROM inquiry WHERE $where");
$row = $stmt->fetch();
$total_count = $row['cnt'];
$total_pages = ceil($total_count / $limit);

// 게시물 목록 조회
$stmt = $db->query("SELECT * FROM inquiry WHERE $where ORDER BY id DESC LIMIT $offset, $limit");
$inquiries = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의하기 - M&COS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin/>
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css"/>
    
    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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
           max-width: 200px;
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

        .status {
            display: inline-block;
            padding: 5px;
            border-radius: 3px;
            font-size: 12px;
        }

        .status.new { background: #eee; }
        .status.in-progress { background: #fff3cd; }
        .status.completed { background: #d4edda; }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin: 50px 0;
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
            padding: 8px 12px;
            border: 1px solid #ddd;
        }

        .search-box button {
            padding: 8px 20px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
       /* 콘텐츠 영역 */
       .map-content {
           max-width: 1200px;
           margin: 100px auto;
           padding: 0 20px;
       }

       .title {
           text-align: center;
           margin-bottom: 60px;
       }

       .title h2 {
           font-size: 42px;
           font-family: 'Montserrat', sans-serif;
           font-weight: 700;
           margin-bottom: 15px;
       }

       .title p {
           font-size: 16px;
           color: #666;
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

        .no-data {
            text-align: center;
            padding: 50px 0;
            color: #666;
        }

        .board-title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 80px;
        }
/* 반응형 스타일 */
@media (max-width: 1200px) {
    .board-content {
        padding: 0 40px;
    }
}

@media (max-width: 991px) {
    .board-title {
        font-size: 28px;
        margin-bottom: 40px;
    }

    .write-btn {
        padding: 10px 25px;
        font-size: 14px;
    }
}

@media (max-width: 768px) {
    .visual {
        height: 350px;
    }

    .visual h2 {
        font-size: 36px;
    }

    .visual p {
        font-size: 16px;
        padding: 0 20px;
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
    .board-table th:nth-child(4),
    .board-table th:nth-child(6),
    .board-table td:nth-child(4),
    .board-table td:nth-child(6) {
        display: none; /* 작성일, 조회수 칼럼 숨김 */
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
        font-size: 32px;
    }

    .visual p {
        font-size: 14px;
        padding: 0 15px;
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

    /* 테이블 모바일 최적화 */
    .board-table th:nth-child(1),
    .board-table th:nth-child(3),
    .board-table td:nth-child(1),
    .board-table td:nth-child(3) {
        display: none; /* 번호, 작성자 칼럼 추가 숨김 */
    }

    .board-table th,
    .board-table td {
        padding: 12px 8px;
        font-size: 13px;
    }

    .status {
        padding: 3px;
        font-size: 11px;
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
        font-size: 28px;
    }

    .visual p {
        font-size: 13px;
    }

    .menu-item a {
        font-size: 13px;
        padding: 0 5px;
    }

    .board-title {
        font-size: 22px;
    }

    .board-table th,
    .board-table td {
        padding: 10px 6px;
        font-size: 12px;
    }

    .pagination {
        gap: 15px;
    }

    .pagination a,
    .pagination span {
        font-size: 13px;
    }

    .write-btn {
        padding: 8px 20px;
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
       <h2>CONTACT</h2>
       <p>창상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
       <div class="visual-menu">
           <div class="menu-item active">
               <a href="./inquiry.php"><span>사이버 상담실</span></a>
           </div>
       </div>
   </div>

   <div class="board-content">
        <div class="path">
            HOME <span>></span> CONTACT <span>></span> 사이버 상담실
        </div>

       <h3 class="board-title"> 상담하기</h3>

        <a href="write.php" class="write-btn">상담글쓰기</a>

        <table class="board-table">
            <thead>
                <tr>
                    <th width="80">번호</th>
                    <th>제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="100">상태</th>
                    <th width="80">조회</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inquiries as $inquiry): ?>
                <tr>
                    <td><?php echo $inquiry['id']; ?></td>
                    <td class="title">
                        <a href="view.php?id=<?php echo $inquiry['id']; ?>">
                            <?php if ($inquiry['is_secret']): ?>
                                <i class="fas fa-lock"></i>
                            <?php endif; ?>
                            <?php echo htmlspecialchars($inquiry['title']); ?>
                        </a>
                    </td>
                    <td><?php echo $inquiry['author']; ?></td>
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
                <option value="내용" <?php echo $search_type === '내용' ? 'selected' : ''; ?>>내용</option>
                <option value="작성자" <?php echo $search_type === '작성자' ? 'selected' : ''; ?>>작성자</option>
            </select>
            <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button type="button" onclick="search()">찾기</button>
        </div>
    </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        function search() {
            const type = document.querySelector('[name="search_type"]').value;
            const keyword = document.querySelector('[name="search_keyword"]').value;
            
            if (keyword.trim() === '') {
                alert('검색어를 입력해주세요.');
                return;
            }
            
            location.href = `?search_type=${encodeURIComponent(type)}&search_keyword=${encodeURIComponent(keyword)}`;
        }

        // Enter 키로도 검색 가능하도록 추가
        document.querySelector('[name="search_keyword"]').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                search();
            }
        });
    </script>
</body>
</html>