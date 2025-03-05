<?php
include '../inc/db.php';
session_start();
if(!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

$id = $_GET['id'];
$sql = "SELECT * FROM inquiries WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$view = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>문의 상세</title>
   <style>
       .admin-wrap {display: flex; min-height: 100vh;}
       .sidebar {width: 250px; background: #333; color: #fff;}
       .sidebar h1 {padding: 20px; border-bottom: 1px solid #444;}
       .sidebar ul {list-style: none; padding: 0; margin: 0;}
       .sidebar li a {display: block; padding: 15px 20px; color: #fff; text-decoration: none;}
       .sidebar li a:hover {background: #444;}
       
       .content {flex: 1; padding: 30px;}
       .view-wrap {border-top: 2px solid #333;}
       .view-title {padding: 20px; border-bottom: 1px solid #ddd;}
       .view-info {padding: 15px 20px; border-bottom: 1px solid #ddd; color: #666;}
       .view-content {padding: 30px 20px; min-height: 200px; border-bottom: 1px solid #ddd;}
       
       .answer-form {margin-top: 50px;}
       .answer-form textarea {
           width: 100%;
           height: 200px;
           padding: 15px;
           border: 1px solid #ddd;
           margin-bottom: 20px;
           resize: none;
           box-sizing: border-box;
       }
       .btn-wrap {text-align: right; margin-top: 20px;}
       .btn-wrap button {
           padding: 10px 30px;
           border: none;
           color: #fff;
           cursor: pointer;
           margin-left: 5px;
       }
       .answer-btn {background: #007a5c;}
       .list-btn {background: #666;}
       .del-btn {background: #cc0000;}

       /* 답변 영역 스타일 */
       .answer-area {
           margin-top: 50px;
           padding: 20px;
           background: #f8f8f8;
           border-radius: 5px;
       }
       .answer-area h3 {
           margin: 0 0 15px 0;
           color: #007a5c;
       }
       .answer-date {
           color: #666;
           font-size: 14px;
           margin-bottom: 15px;
       }
       .answer-content {
           line-height: 1.6;
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
       <h2>문의 상세</h2>
       
       <div class="view-wrap">
           <div class="view-title">
               <h3><?php echo htmlspecialchars($view['title']); ?></h3>
           </div>

           <div class="view-info">
               <span>작성자: <?php echo htmlspecialchars($view['name']); ?></span>
               <span> | </span>
               <span>작성일: <?php echo date('Y.m.d', strtotime($view['created_at'])); ?></span>
               <?php if($view['phone']): ?>
               <span> | </span>
               <span>연락처: <?php echo htmlspecialchars($view['phone']); ?></span>
               <?php endif; ?>
               <?php if($view['email']): ?>
               <span> | </span>
               <span>이메일: <?php echo htmlspecialchars($view['email']); ?></span>
               <?php endif; ?>
           </div>

           <div class="view-content">
               <?php echo nl2br(htmlspecialchars($view['content'])); ?>
           </div>

           <?php if($view['answer']): ?>
           <div class="answer-area">
               <h3>답변</h3>
               <div class="answer-date">
                   답변일: <?php echo date('Y.m.d H:i', strtotime($view['answer_date'])); ?>
               </div>
               <div class="answer-content">
                   <?php echo nl2br(htmlspecialchars($view['answer'])); ?>
               </div>
           </div>
           <?php endif; ?>

           <div class="answer-form">
               <form action="answer_process.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $id; ?>">
                   <textarea name="answer" placeholder="답변을 입력하세요"><?php echo htmlspecialchars($view['answer']); ?></textarea>
                   <div class="btn-wrap">
                       <button type="button" class="list-btn" onclick="location.href='inquiry_list.php'">목록</button>
                       <button type="button" class="del-btn" onclick="if(confirm('정말 삭제하시겠습니까?')) location.href='inquiry_delete.php?id=<?php echo $id; ?>'">삭제</button>
                       <button type="submit" class="answer-btn"><?php echo $view['answer'] ? '답변수정' : '답변등록'; ?></button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
</body>
</html>