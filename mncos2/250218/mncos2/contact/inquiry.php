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
    if ($search_type == '제목') {
        $where .= " AND title LIKE '%$search_keyword%'";
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

    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

   <div class="visual">
       <h2>CONTACT</h2>
       <p>창상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
       <div class="visual-menu">
           <div class="menu-item">
               <a href="./map.php"><span>찾아오시는 길</span></a>
           </div>
           <div class="menu-item active">
               <a href="./inquiry.php"><span>문의하기</span></a>
           </div>
       </div>
   </div>

   <div class="board-content">
        <div class="path">
            HOME <span>></span> CONTACT <span>></span> 문의하기
        </div>

       <h3 class="board-title">문의하기</h3>

        <a href="write.php" class="write-btn">글쓰기</a>

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
                <option value="일주일">일주일</option>
                <option value="제목">제목</option>
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
            location.href = `?search_type=${type}&search_keyword=${keyword}`;
        }
    </script>
</body>
</html>