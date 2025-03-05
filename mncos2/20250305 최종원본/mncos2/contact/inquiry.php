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
    
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
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
        <h2>CONTACT</h2>
        <p>창상 고객님의 입장에서 생각하고 공헌하여 노력합니다.</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item">
                <a href="./map.php"><span>찾아오시는 길</span></a>
            </div>
            <div class="sub-visual-menu-item active">
                <a href="./inquiry.php"><span>문의하기</span></a>
            </div>
        </div>
    </div>

    <div class="contact-inquiry-content">
        <div class="contact-inquiry-path">
            HOME <span>></span> CONTACT <span>></span> 문의하기
        </div>

        <h3 class="contact-inquiry-title">문의하기</h3>

        <a href="write.php" class="contact-inquiry-write-btn">글쓰기</a>

        <table class="contact-inquiry-table">
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
                        <span class="contact-inquiry-status <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                    </td>
                    <td><?php echo $inquiry['views']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="contact-inquiry-pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page-1; ?>">&lt;</a>
            <?php endif; ?>
            
            <span><?php echo $page; ?></span>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page+1; ?>">&gt;</a>
            <?php endif; ?>
        </div>

        <div class="contact-inquiry-search">
            <select name="search_type">
                <option value="내용" <?php echo $search_type === '내용' ? 'selected' : ''; ?>>내용</option>
                <option value="작성자" <?php echo $search_type === '작성자' ? 'selected' : ''; ?>>작성자</option>
            </select>
            <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button type="button" onclick="search()">찾기</button>
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

        document.querySelector('[name="search_keyword"]').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                search();
            }
        });
    </script>
</body>
</html>