<!-- // admin/gallery_list.php -->
<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$sql = "SELECT * FROM gallery ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$lists = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>갤러리 관리</title>
   <style>
       .admin-wrap {display: flex; min-height: 100vh;}
       .sidebar {width: 250px; background: #333; color: #fff;}
       .sidebar h1 {padding: 20px;}
       .sidebar ul {list-style: none;}
       .sidebar li a {display: block; padding: 15px 20px; color: #fff; text-decoration: none;}
       .content {flex: 1; padding: 30px;}
       table {width: 100%; border-collapse: collapse;}
       th {background: #f8f8f8; padding: 15px; border-top: 2px solid #333;}
       td {padding: 15px; border-bottom: 1px solid #ddd;}
   </style>
</head>
<body>
<div class="admin-wrap">
   <div class="sidebar">
       <h1>관리자</h1>
       <ul>
           <li><a href="index.php">대시보드</a></li>
           <li><a href="inquiry_list.php">문의관리</a></li>
           <li><a href="gallery_list.php">갤러리관리</a></li>
           <li><a href="logout.php">로그아웃</a></li>
       </ul>
   </div>

   <div class="content">
       <h2>갤러리 관리</h2>
       <table>
           <thead>
               <tr>
                   <th>번호</th>
                   <th>이미지</th>
                   <th>제목</th>
                   <th>등록일</th>
                   <th>조회수</th>
                   <th>댓글수</th>
                   <th>관리</th>
               </tr>
           </thead>
           <tbody>
               <?php foreach($lists as $item): ?>
               <tr>
                   <td><?php echo $item['id']; ?></td>
                   <td><img src="../uploads/gallery/<?php echo $item['image_name']; ?>" height="50"></td>
                   <td><?php echo $item['title']; ?></td>
                   <td><?php echo date('Y.m.d', strtotime($item['created_at'])); ?></td>
                   <td><?php echo $item['views']; ?></td>
                   <td>
                       <?php 
                       $sql = "SELECT COUNT(*) as cnt FROM gallery_comments WHERE gallery_id=?";
                       $stmt = $db->prepare($sql);
                       $stmt->execute([$item['id']]);
                       echo $stmt->fetch()['cnt'];
                       ?>
                   </td>
                   <td>
                       <button onclick="location.href='gallery_view.php?id=<?php echo $item['id']; ?>'">보기</button>
                       <button onclick="deleteGallery(<?php echo $item['id']; ?>)">삭제</button>
                   </td>
               </tr>
               <?php endforeach; ?>
           </tbody>
       </table>
   </div>
</div>

<script>
function deleteGallery(id) {
   if(confirm('정말 삭제하시겠습니까?')) {
       location.href = 'gallery_delete.php?id=' + id;
   }
}
</script>
</body>
</html>