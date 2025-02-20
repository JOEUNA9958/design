<?php
session_start();
include '../../admin/inc/admin_check.php';
include '../../admin/inc/db_conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM inquiries WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$inquiry = $result->fetch_assoc();

if(!$inquiry) {
    header('Location: list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의 상세보기</title>
    <style>
        .admin-container {
            width: 1280px;
            margin: 40px auto;
            padding: 20px;
        }
        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            border-top: 2px solid #191919;
        }
        .detail-table th,
        .detail-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .detail-table th {
            width: 200px;
            background: #F9F9FB;
            text-align: center;
            font-weight: 600;
            font-size: 15px;
        }
        .detail-table td {
            padding: 15px 20px;
        }
        .content-area {
            min-height: 200px;
            white-space: pre-wrap;
        }
        .btn-area {
            text-align: center;
            margin-top: 40px;
        }
        .btn {
            min-width: 120px;
            padding: 10px 20px;
            border: none;
            background: #191919;
            color: white;
            cursor: pointer;
            font-size: 15px;
            margin: 0 5px;
        }
        .status-select {
            padding: 5px 10px;
            width: 150px;
        }
        .file-link {
            color: #1a0dab;
            text-decoration: none;
        }
        .file-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <table class="detail-table">
            <tr>
                <th>제목</th>
                <td><?php echo htmlspecialchars($inquiry['title']); ?></td>
            </tr>
            <tr>
                <th>회사명</th>
                <td><?php echo htmlspecialchars($inquiry['company']); ?></td>
            </tr>
            <tr>
                <th>작성자</th>
                <td><?php echo htmlspecialchars($inquiry['author']); ?></td>
            </tr>
            <tr>
                <th>연락처</th>
                <td><?php echo htmlspecialchars($inquiry['phone']); ?></td>
            </tr>
            <tr>
                <th>이메일</th>
                <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
            </tr>
            <tr>
                <th>문의 제품</th>
                <td><?php echo htmlspecialchars($inquiry['product_type']); ?></td>
            </tr>
            <tr>
                <th>용도</th>
                <td><?php echo htmlspecialchars($inquiry['purpose']); ?></td>
            </tr>
            <tr>
                <th>수량</th>
                <td><?php echo htmlspecialchars($inquiry['quantity']); ?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td class="content-area"><?php echo nl2br(htmlspecialchars($inquiry['content'])); ?></td>
            </tr>
            <?php if($inquiry['file_path']): ?>
            <tr>
                <th>첨부파일</th>
                <td>
                    <a href="<?php echo htmlspecialchars($inquiry['file_path']); ?>" class="file-link" target="_blank">
                        <?php echo htmlspecialchars($inquiry['file_name']); ?>
                    </a>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th>처리상태</th>
                <td>
                    <select id="statusSelect" class="status-select" onchange="updateStatus(<?php echo $id; ?>, this.value)">
                        <option value="pending" <?php echo $inquiry['status'] == 'pending' ? 'selected' : ''; ?>>미답변</option>
                        <option value="completed" <?php echo $inquiry['status'] == 'completed' ? 'selected' : ''; ?>>답변완료</option>
                    </select>
                </td>
            </tr>
        </table>

        <div class="btn-area">
            <button onclick="location.href='list.php'" class="btn">목록</button>
            <button onclick="deleteInquiry(<?php echo $id; ?>)" class="btn">삭제</button>
        </div>
    </div>

    <script>
    function updateStatus(id, status) {
        fetch('inquiry_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: `action=update_status&id=${id}&status=${status}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('상태가 업데이트되었습니다.');
            } else {
                alert(data.message || '상태 업데이트 실패');
            }
        });
    }

    function deleteInquiry(id) {
        if(confirm('정말 삭제하시겠습니까?')) {
            fetch('inquiry_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=delete&id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    location.href = 'list.php';
                } else {
                    alert(data.message || '삭제 실패');
                }
            });
        }
    }
    </script>
</body>
</html>