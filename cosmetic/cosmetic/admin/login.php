<!-- // admin/login.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>관리자 로그인</title>
   <style>
       .login-wrap {
           max-width: 400px;
           margin: 100px auto;
           padding: 50px;
           border: 1px solid #ddd;
           text-align: center;
       }
       h1 {margin-bottom: 30px}
       input {
           width: 100%;
           padding: 10px;
           margin-bottom: 10px;
           border: 1px solid #ddd;
       }
       button {
           width: 100%;
           padding: 12px;
           background: #333;
           color: #fff;
           border: none;
           cursor: pointer;
       }
   </style>
</head>
<body>
<div class="login-wrap">
   <h1>관리자 로그인</h1>
   <form action="login_process.php" method="post">
       <input type="text" name="username" placeholder="아이디" required>
       <input type="password" name="password" placeholder="비밀번호" required>
       <button type="submit">로그인</button>
   </form>
</div>
</body>
</html>