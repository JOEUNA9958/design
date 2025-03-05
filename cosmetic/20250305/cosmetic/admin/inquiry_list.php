<!-- // admin/inquiry_list.php -->
<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

// 목록 조회
$sql = "SELECT * FROM inquiries ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$lists = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>문의 관리</title>
   <style>
       .admin-wrap {display: flex; min-height: 100vh;}
       .sidebar {
           width: 250px;
           background: #333;
           color: #fff;
       }
       .sidebar h1 {padding: 20px; border-bottom: 1px solid #444;}
       .sidebar ul {list-style: none;}
       .sidebar li a {
           display: block;
           padding: 15px 20px;
           color: #fff;
           text-decoration: none;
       }
       .sidebar li a:hover {background: #444;}
       
       .content {flex: 1; padding: 30px;}
       table {
           width: 100%;
           border-top: 2px solid #333;
           border-collapse: collapse;
       }
       th {
           padding: 15px;
           background: #f8f8f8;
           border-bottom: 1px solid #ddd;
       }
       td {
           padding: 15px;
           border-bottom: 1px solid #ddd;
       }
       .answer-status {
           display: inline-block;
           padding: 5px 10px;
           border-radius: 3px;
           font-size: 12px;
           color: #fff;
       }
       .waiting {background: #cc0000;}
       .completed {background: #007a5c;}

       .del-btn {
            padding: 5px 15px;
            background: #cc0000;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .del-btn:hover {
            background: #aa0000;
        }
   </style>
</head>
<body>
<div class="admin-wrap">
   <div class="sidebar">
       <h1>관리자</h1>
       <ul>
           <li><a href="index.php">대시보드</a></li>
           <li><a href="inquiry_list.php">문의관리</a></li>
           <li><a href="logout.php">로그아웃</a></li>
       </ul>
   </div>

   <div class="content">
       <h2>문의 관리</h2>
       <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                    <th>상태</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lists as $list): ?>
                <tr>
                    <td><?php echo $list['id']; ?></td>
                    <td><a href="inquiry_view.php?id=<?php echo $list['id']; ?>"><?php echo htmlspecialchars($list['title']); ?></a></td>
                    <td><?php echo htmlspecialchars($list['name']); ?></td>
                    <td><?php echo date('Y.m.d', strtotime($list['created_at'])); ?></td>
                    <td><span class="answer-status <?php echo $list['status']; ?>"><?php echo $list['status']=='waiting' ? '답변대기' : '답변완료'; ?></span></td>
                    <td>
                        <button type="button" class="del-btn" onclick="deleteInquiry(<?php echo $list['id']; ?>)">삭제</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   </div>
</div>

<script>
function deleteInquiry(id) {
    if(confirm('정말 삭제하시겠습니까?')) {
        location.href = 'inquiry_delete.php?id=' + id;
    }
}
</script>
</body>
</html>