<?php
include '../inc/db.php';

$id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE inquiries SET views = views + 1 WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

// 상세 조회
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
   <title>문의 상세보기</title>
   <style>
        .view-wrap {
            flex: 1;
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            width: 100%;
        }

        main {
            min-height: calc(100vh - 150px);
        }
        .qa-title {text-align: center; margin-bottom: 50px;}
        .qa-title span {color: #666; font-size: 17px;}
        .qa-title h2 {font-size: 45px; margin-top: 10px;}

        .view-title {
            padding: 20px;
            border-top: 2px solid #333;
            border-bottom: 1px solid #ddd;
        }
        .view-info {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            color: #666;
        }
        .view-content {
            padding: 30px 20px;
            min-height: 200px;
            border-bottom: 1px solid #ddd;
        }
        
        .answer-box {
            margin-top: 50px;
            background: #f8f8f8;
            padding: 30px;
        }
        .answer-box h3 {
            margin: 0 0 20px;
            color: #007a5c;
        }

        .btn-wrap {
            margin-top: 30px;
            text-align: center;
        }
        .btn-wrap button {
            display: inline-block;
            padding: 10px 40px;
            border: none;
            color: #fff;
            cursor: pointer;
            margin: 0 5px;
            font-size: 16px;
        }
        .list-btn {background: #666;}
        .edit-btn {background: #007a5c;}
        .del-btn {background: #cc0000;}

        /* Modal Style */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
        }
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            width: 300px;
            text-align: center;
            border-radius: 5px;
        }
        .modal h3 {
            margin: 0 0 20px 0;
            font-size: 20px;
        }
        .modal input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .modal button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }
        .modal .confirm-btn { background: #007a5c; color: #fff; }
        .modal .cancel-btn { background: #666; color: #fff; }

        .file-box {
            margin-top: 20px;
            padding: 15px 20px;
            background: #f8f8f8;
            border-bottom: 1px solid #ddd;
        }
        .file-box span {
            color: #666;
            margin-right: 10px;
        }
        .file-box a {
            color: #007a5c;
            text-decoration: none;
        }
        .file-box a:hover {
            text-decoration: underline;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sub_banner_wrap {
            width: 100%;
            position: relative;
        }

        .sub_banner {
            width: 100%;
            height: 500px;
            background-size: 120% auto;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: bannerMove 20s ease-in-out infinite;
            overflow: hidden;
        }

        @keyframes bannerMove {
            0% {
                background-position: center 0%;
            }
            50% {
                background-position: center 100%;
            }
            100% {
                background-position: center 0%;
            }
        }

        .sub_banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .sub_banner h2 {
            color: #fff;
            font-size: 45px;
            font-weight: 700;
            margin-bottom: -5px;
            position: relative;
            z-index: 1;
        }

        .sub_menu {
            display: flex;
            gap: 1px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .sub_menu a {
            flex: 1;
            text-align: center;
            color: #fff;
            text-decoration: none;
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            font-size: 20px;
        }

        .sub_menu a:hover,
        .sub_menu a.active {
            background: #007a5d;
        }

        .story-section1 {
            padding: 80px 0;
        }
   </style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
    <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
        <h2>Community</h2>
        <div class="sub_menu">
            <a href="/cosmetic/community/lookbook.php">룩북</a>
            <a href="/cosmetic/community/notice.php">공지사항</a>
            <a href="/cosmetic/community/inquiry.php" class="active">문의사항</a>
            <a href="/cosmetic/gallery/index.php">갤러리</a>
        </div>
    </div>
</div>

<div class="view-wrap">
   <div class="qa-title">
       <span>Question & Answer</span>
       <h2>Q&A</h2>
   </div>

   <div class="view-title">
        <h3><?php echo htmlspecialchars($view['title']); ?></h3>
   </div>

   <div class="view-info">
        <span>작성자: <?php echo htmlspecialchars($view['name']); ?></span>
        <span> | </span>
        <span>작성일: <?php echo date('Y.m.d', strtotime($view['created_at'])); ?></span>
        <span> | </span>
        <span>조회수: <?php echo $view['views']; ?></span>
   </div>

   <div class="view-content">
        <?php echo nl2br(htmlspecialchars($view['content'])); ?>
   </div>

   <?php if($view['answer']): ?>
   <div class="answer-box">
        <h3>답변</h3>
        <p><?php echo nl2br(htmlspecialchars($view['answer'])); ?></p>
   </div>
   <?php endif; ?>

   <?php if($view['file_name']): ?>
   <div class="file-box">
        <span>첨부파일:</span>
        <a href="../uploads/<?php echo htmlspecialchars($view['file_name']); ?>" download>
            <?php echo htmlspecialchars($view['file_name']); ?>
        </a>
   </div>
   <?php endif; ?>

   <div class="btn-wrap">
        <button type="button" class="list-btn" onclick="location.href='inquiry.php'">목록</button>
        <button type="button" class="edit-btn" onclick="openPasswordModal('edit')">수정</button>
        <button type="button" class="del-btn" onclick="openPasswordModal('delete')">삭제</button>
   </div>
</div>

<!-- Password Modal -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <h3>비밀번호 확인</h3>
        <input type="password" id="password" placeholder="비밀번호를 입력하세요">
        <input type="hidden" id="action_type">
        <div>
            <button class="confirm-btn" onclick="verifyPassword()">확인</button>
            <button class="cancel-btn" onclick="closePasswordModal()">취소</button>
        </div>
    </div>
</div>

<?php include '../inc/footer.php'; ?>

<script>
function openPasswordModal(action) {
    document.getElementById('passwordModal').style.display = 'block';
    document.getElementById('action_type').value = action;
    document.getElementById('password').value = '';
}

function closePasswordModal() {
    document.getElementById('passwordModal').style.display = 'none';
}

function verifyPassword() {
    const password = document.getElementById('password').value;
    const action = document.getElementById('action_type').value;
    const postId = <?php echo $id; ?>;

    fetch('verify_password.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${postId}&password=${password}`
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            if(action === 'edit') {
                window.location.href = `inquiry_edit.php?id=${postId}&password=${password}`;
            } else if(action === 'delete') {
                if(confirm('정말 삭제하시겠습니까?')) {
                    window.location.href = `inquiry_delete.php?id=${postId}&password=${password}`;
                }
            }
        } else {
            alert('비밀번호가 일치하지 않습니다.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('오류가 발생했습니다.');
    });
}
</script>
</body>
</html>