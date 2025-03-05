<!-- // community/inquiry_password.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>비밀번호 확인</title>
   <style>
       .password-wrap {
           max-width: 500px;
           margin: 100px auto;
           padding: 50px;
           border: 1px solid #ddd;
           text-align: center;
       }
       h2 {margin-bottom: 30px;}
       input {
           width: 200px;
           padding: 10px;
           border: 1px solid #ddd;
       }
       button {
           display: block;
           width: 200px;
           padding: 10px;
           background: #007a5c;
           color: #fff;
           border: none;
           margin: 20px auto 0;
           cursor: pointer;
       }
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="password-wrap">
   <h2>비밀번호 확인</h2>
   <form action="check_password.php" method="post">
       <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
       <input type="hidden" name="action" value="<?php echo $_GET['action']; ?>">
       <input type="password" name="password" placeholder="비밀번호를 입력하세요" required>
       <button type="submit">확인</button>
   </form>
</div>

<?php include '../inc/footer.php'; ?>
</body>
</html>