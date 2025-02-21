<!-- // admin/notice_list.php (관리자용 공지사항 목록) -->
<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$sql = "SELECT * FROM notices ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$lists = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>공지사항 관리</title>
   <style>
       .admin-wrap {display: flex; min-height: 100vh;}
       .sidebar {width: 250px; background: #333; color: #fff;}
       .sidebar h1 {padding: 20px;}
       .sidebar ul {list-style: none; padding: 0;}
       .sidebar li a {
           display: block;
           padding: 15px 20px;
           color: #fff;
           text-decoration: none;
       }
       
       .content {flex: 1; padding: 30px;}
       .content-header {
           display: flex;
           justify-content: space-between;
           align-items: center;
           margin-bottom: 30px;
       }
       .write-btn {
           padding: 10px 30px;
           background: #007a5c;
           color: #fff;
           text-decoration: none;
       }
       
       table {
           width: 100%;
           border-collapse: collapse;
       }
       th {
           background: #f8f8f8;
           padding: 15px;
           border-top: 2px solid #333;
       }
       td {
           padding: 15px;
           border-bottom: 1px solid #ddd;
       }
       .btn-wrap button {
           padding: 5px 15px;
           border: none;
           color: #fff;
           cursor: pointer;
       }
       .edit-btn {background: #007a5c;}
       .del-btn {background: #cc0000;}
   </style>
</head>
<body>
<div class="admin-wrap">
   <div class="sidebar">
       <h1>관리자</h1>
       <ul>
           <li><a href="index.php">대시보드</a></li>
           <li><a href="notice_list.php">공지사항 관리</a></li>
           <li><a href="inquiry_list.php">문의관리</a></li>
           <li><a href="gallery_list.php">갤러리관리</a></li>
           <li><a href="logout.php">로그아웃</a></li>
       </ul>
   </div>

   <div class="content">
       <div class="content-header">
           <h2>공지사항 관리</h2>
           <a href="notice_write.php" class="write-btn">글쓰기</a>
       </div>

       <table>
           <thead>
               <tr>
                   <th>번호</th>
                   <th>제목</th>
                   <th>등록일</th>
                   <th>조회수</th>
                   <th>관리</th>
               </tr>
           </thead>
           <tbody>
               <?php foreach($lists as $item): ?>
               <tr>
                   <td><?php echo $item['id']; ?></td>
                   <td>
                       <?php if($item['is_important']): ?>
                       <span class="important">[중요]</span>
                       <?php endif; ?>
                       <?php echo $item['title']; ?>
                   </td>
                   <td><?php echo date('Y.m.d', strtotime($item['created_at'])); ?></td>
                   <td><?php echo $item['views']; ?></td>
                   <td class="btn-wrap">
                       <button class="edit-btn" onclick="location.href='notice_edit.php?id=<?php echo $item['id']; ?>'">수정</button>
                       <button class="del-btn" onclick="deleteNotice(<?php echo $item['id']; ?>)">삭제</button>
                   </td>
               </tr>
               <?php endforeach; ?>
           </tbody>
       </table>
   </div>
</div>

<script>
function deleteNotice(id) {
   if(confirm('정말 삭제하시겠습니까?')) {
       location.href = 'notice_delete.php?id=' + id;
   }
}
</script>
</body>
</html>