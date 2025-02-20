<?php
require_once '../inc/db.php';
session_start();

// 이미 로그인된 경우 관리자 메인으로 리다이렉트
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    header('Location: /mncos2/admin/');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin963') {
        $_SESSION['is_admin'] = true;
        header('Location: /mncos2/admin/');
        exit;
    } else {
        $error = '아이디 또는 비밀번호가 일치하지 않습니다.';
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 로그인 - M&COS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 40px 20px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-title h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .login-form {
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #009FE3;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #0085BE;
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-title">
            <h2>관리자 로그인</h2>
        </div>
        
        <form class="login-form" method="POST" action="">
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="username">아이디</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="submit-btn">로그인</button>
        </form>
    </div>
</body>
</html>