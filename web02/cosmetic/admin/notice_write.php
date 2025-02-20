<!-- // admin/notice_write.php -->
<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <title>공지사항 작성</title>
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
       table {width: 100%; border-collapse: collapse;}
       th {
           width: 120px;
           padding: 15px;
           background: #f8f8f8;
           border-top: 2px solid #333;
           border-bottom: 1px solid #ddd;
           text-align: left;
       }
       td {
           padding: 15px;
           border-bottom: 1px solid #ddd;
       }
       input[type="text"] {width: 100%; padding: 8px; border: 1px solid #ddd;}
       textarea {width: 100%; height: 300px; padding: 8px; border: 1px solid #ddd;}
       .btn-wrap {
           margin-top: 30px;
           text-align: center;
       }
       button {
           padding: 10px 40px;
           border: none;
           color: #fff;
           cursor: pointer;
       }
       .submit-btn {background: #007a5c;}
       .cancel-btn {background: #666;}
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
       <h2>공지사항 작성</h2>
       <form action="notice_write_process.php" method="post">
           <table>
               <tr>
                   <th>제목</th>
                   <td><input type="text" name="title" required></td>
               </tr>
               <tr>
                   <th>중요공지</th>
                   <td><input type="checkbox" name="is_important" value="1"> 중요공지로 등록</td>
               </tr>
               <tr>
                   <th>내용</th>
                   <td><textarea name="content" required></textarea></td>
               </tr>
           </table>
           <div class="btn-wrap">
               <button type="submit" class="submit-btn">등록</button>
               <button type="button" class="cancel-btn" onclick="history.back()">취소</button>
           </div>
       </form>
   </div>
</div>
</body>
</html>