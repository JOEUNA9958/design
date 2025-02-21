<?php
session_start();
include '../inc/admin_check.php';
include '../inc/db_conn.php';

// 페이지네이션 설정
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// 검색 조건
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}

$sql = "SELECT * FROM exhibitions $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>전시회 관리</title>
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
            padding: 20px;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .search-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .btn {
            padding: 8px 16px;
            background: #191919;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #f5f5f5;
        }
        .thumbnail {
            width: 100px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>전시회 관리</h1>
            <button onclick="openModal()" class="btn">전시회 등록</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>이미지</th>
                    <th>전시회명</th>
                    <th>시작일</th>
                    <th>종료일</th>
                    <th>조회수</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="thumbnail"></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo $row['start_date']; ?></td>
                    <td><?php echo $row['end_date']; ?></td>
                    <td><?php echo $row['view_count']; ?></td>
                    <td>
                        <button onclick="editExhibition(<?php echo $row['id']; ?>)" class="btn">수정</button>
                        <button onclick="deleteExhibition(<?php echo $row['id']; ?>)" class="btn">삭제</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- 모달 -->
        <div id="exhibitionModal" class="modal" style="display: none;">
            <div class="modal-content">
                <h2 id="modalTitle">전시회 등록</h2>
                <form id="exhibitionForm" method="POST" enctype="multipart/form-data" action="exhibition_process.php">
                    <input type="hidden" name="action" id="formAction" value="create">
                    <input type="hidden" name="exhibition_id" id="exhibitionId" value="">
                    
                    <div class="form-group">
                        <label>전시회명</label>
                        <input type="text" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label>시작일</label>
                        <input type="date" name="start_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label>종료일</label>
                        <input type="date" name="end_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label>이미지</label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                    
                    <button type="submit" class="btn">저장</button>
                    <button type="button" onclick="closeModal()" class="btn">취소</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openModal(id = null) {
        document.getElementById('modalTitle').textContent = id ? '전시회 수정' : '전시회 등록';
        document.getElementById('formAction').value = id ? 'update' : 'create';
        document.getElementById('exhibitionId').value = id || '';
        document.getElementById('exhibitionModal').style.display = 'block';
        
        if(id) {
            // AJAX로 전시회 정보 가져오기
            fetch(`exhibition_get.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        const form = document.getElementById('exhibitionForm');
                        form.querySelector('input[name="title"]').value = data.data.title;
                        form.querySelector('input[name="start_date"]').value = data.data.start_date;
                        form.querySelector('input[name="end_date"]').value = data.data.end_date;
                    }
                });
        }
    }

    function closeModal() {
        document.getElementById('exhibitionModal').style.display = 'none';
        document.getElementById('exhibitionForm').reset();
    }

    function deleteExhibition(id) {
        if(confirm('정말 삭제하시겠습니까?')) {
            fetch('exhibition_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=delete&exhibition_id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    location.reload();
                } else {
                    alert(data.message || '삭제에 실패했습니다.');
                }
            });
        }
    }
    </script>
</body>
</html>