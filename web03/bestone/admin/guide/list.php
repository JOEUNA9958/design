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

// 기본 쿼리
$where_clause = "WHERE 1=1";
if($search_keyword) {
    $where_clause .= " AND title LIKE '%".mysqli_real_escape_string($conn, $search_keyword)."%'";
}

$sql = "SELECT * FROM guide_posts $where_clause ORDER BY id DESC LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>가이드라인 관리</title>
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
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background: #191919;
            color: white;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .admin-table th,
        .admin-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .admin-table th {
            background: #f5f5f5;
        }
        .search-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-section input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 500px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>가이드라인 관리</h1>
            <button onclick="openModal()" class="btn btn-primary">글 작성</button>
        </div>

        <div class="search-section">
            <input type="text" placeholder="제목 검색" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button onclick="searchPosts()" class="btn">검색</button>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>첨부파일</th>
                    <th>조회수</th>
                    <th>등록일</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo $row['file_path'] ? '있음' : '없음'; ?></td>
                    <td><?php echo $row['view_count']; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                    <td>
                        <button onclick="editPost(<?php echo $row['id']; ?>)" class="btn">수정</button>
                        <button onclick="deletePost(<?php echo $row['id']; ?>)" class="btn">삭제</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- 글 작성/수정 모달 -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle">글 작성</h2>
            <form id="postForm" method="POST" enctype="multipart/form-data" action="guide_process.php">
                <input type="hidden" name="action" id="formAction" value="create">
                <input type="hidden" name="post_id" id="postId" value="">
                
                <div class="form-group">
                    <label>제목</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="form-group">
                    <label>내용</label>
                    <textarea name="content" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>첨부파일 (PDF)</label>
                    <input type="file" name="attachment" accept=".pdf">
                </div>
                
                <button type="submit" class="btn btn-primary">저장</button>
                <button type="button" onclick="closeModal()" class="btn">취소</button>
            </form>
        </div>
    </div>

    <script>
    function openModal() {
        document.getElementById('postModal').style.display = 'block';
        document.getElementById('modalTitle').textContent = '글 작성';
        document.getElementById('formAction').value = 'create';
        document.getElementById('postId').value = '';
        document.getElementById('postForm').reset();
    }

    function closeModal() {
        document.getElementById('postModal').style.display = 'none';
    }
    function editPost(id) {
        // AJAX 요청 헤더 추가
        fetch(`guide_process.php?action=get&post_id=${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                document.getElementById('postModal').style.display = 'block';
                document.getElementById('modalTitle').textContent = '글 수정';
                document.getElementById('formAction').value = 'update';
                document.getElementById('postId').value = id;
                
                // 폼에 데이터 채우기
                document.querySelector('input[name="title"]').value = data.post.title;
                document.querySelector('textarea[name="content"]').value = data.post.content;
            } else {
                alert(data.message || '데이터를 불러오는데 실패했습니다.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('데이터를 불러오는데 실패했습니다.');
        });
    }

    function deletePost(id) {
        if(confirm('정말 삭제하시겠습니까?')) {
            fetch('guide_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=delete&post_id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message);
                }
            });
        }
    }

    function searchPosts() {
        const keyword = document.querySelector('.search-section input').value;
        location.href = `?keyword=${encodeURIComponent(keyword)}`;
    }
    </script>
</body>
</html>