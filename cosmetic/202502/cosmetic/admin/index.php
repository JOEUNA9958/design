<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

// 통계 데이터 가져오기
// 1. 문의
$sql = "SELECT COUNT(*) as cnt FROM inquiries";
$stmt = $db->prepare($sql);
$stmt->execute();
$inquiry_total = $stmt->fetch()['cnt'];

$sql = "SELECT COUNT(*) as cnt FROM inquiries WHERE status='waiting'";
$stmt = $db->prepare($sql);
$stmt->execute();
$inquiry_waiting = $stmt->fetch()['cnt'];

// 2. 갤러리
$sql = "SELECT COUNT(*) as cnt FROM gallery";
$stmt = $db->prepare($sql);
$stmt->execute();
$gallery_total = $stmt->fetch()['cnt'];

// 3. 공지사항
$sql = "SELECT COUNT(*) as cnt FROM notices";
$stmt = $db->prepare($sql);
$stmt->execute();
$notice_total = $stmt->fetch()['cnt'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>관리자</title>
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
       .sidebar li a:hover {background: #444;}
       
       .content {flex: 1; padding: 30px;}
       .dashboard {
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
           gap: 20px;
           margin-top: 30px;
       }
       .card {
           padding: 20px;
           border-radius: 5px;
           background: #fff;
           box-shadow: 0 2px 5px rgba(0,0,0,0.1);
       }
       .card h3 {margin: 0 0 15px 0;}
       .card p {font-size: 24px; margin: 0;}
       .recent-list {margin-top: 40px;}
       .recent-list table {
           width: 100%;
           border-collapse: collapse;
       }
       .recent-list th {
           background: #f8f8f8;
           padding: 12px;
           border-top: 2px solid #333;
       }
       .recent-list td {
           padding: 12px;
           border-bottom: 1px solid #ddd;
       }
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
       <h2>대시보드</h2>
       <div class="dashboard">
           <div class="card">
               <h3>문의</h3>
               <p>총 <?php echo $inquiry_total; ?>건</p>
               <small>답변대기: <?php echo $inquiry_waiting; ?>건</small>
           </div>
           <div class="card">
               <h3>갤러리</h3>
               <p><?php echo $gallery_total; ?>개</p>
           </div>
           <div class="card">
               <h3>공지사항</h3>
               <p><?php echo $notice_total; ?>개</p>
           </div>
       </div>

       <div class="recent-list">
           <h3>최근 문의</h3>
           <table>
               <thead>
                   <tr>
                       <th>제목</th>
                       <th>작성자</th>
                       <th>날짜</th>
                       <th>상태</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $sql = "SELECT * FROM inquiries ORDER BY id DESC LIMIT 5";
                   $stmt = $db->prepare($sql);
                   $stmt->execute();
                   while($row = $stmt->fetch()):
                   ?>
                   <tr>
                       <td><a href="inquiry_view.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
                       <td><?php echo $row['name']; ?></td>
                       <td><?php echo date('Y.m.d', strtotime($row['created_at'])); ?></td>
                       <td><?php echo $row['status']=='waiting' ? '대기' : '완료'; ?></td>
                   </tr>
                   <?php endwhile; ?>
               </tbody>
           </table>
       </div>
   </div>
</div>
</body>
</html>