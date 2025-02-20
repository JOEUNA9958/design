<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header('Location: /bestone/admin/index.php');  // 경로 수정
    exit;
}

// 이미 로그인된 경우 대시보드로 리다이렉트
if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header('Location: /admin/index.php');
    exit;
}

// 로그인 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if($username === 'admin' && $password === 'admin963') {
        $_SESSION['admin'] = true;
        header('Location: /admin/index.php');
        exit;
    } else {
        $error = '아이디 또는 비밀번호가 올바르지 않습니다.';
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 로그인</title>
    <style>
        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f5f5f5;
        }
        .login-box {
            width: 400px;
            padding: 40px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #191919;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background: #191919;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error-msg {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1 class="login-title">관리자 로그인</h1>
            <?php if(isset($error)): ?>
                <p class="error-msg"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label>아이디</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>비밀번호</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="login-btn">로그인</button>
            </form>
        </div>
    </div>
</body>
</html>