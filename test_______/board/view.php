<?php
require_once '../inc/db.php';
session_start();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 조회수 증가
$db->query("UPDATE notice SET views = views + 1 WHERE id = $id");

// 게시글 조회
$stmt = $db->prepare("SELECT * FROM notice WHERE id = ?");
$stmt->execute([$id]);
$notice = $stmt->fetch();

// 게시글이 없는 경우
if (!$notice) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_string($notice['title']); ?> - M&COS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .visual {
            position: relative;
            width: 100%;
            height: 400px;
            background: url('../images/board/board_bg.jpg') no-repeat center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
        }

        .visual h2 {
            font-size: 72px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .visual p {
            font-size: 20px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .board-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
        }

        .board-title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 50px;
        }

        .view-header {
            border-top: 2px solid #000;
            border-bottom: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 30px;
        }

        .view-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .view-info {
            display: flex;
            justify-content: space-between;
            color: #666;
            font-size: 14px;
        }

        .view-info .left span {
            margin-right: 20px;
        }

        .view-content {
            min-height: 300px;
            padding: 20px;
            line-height: 1.8;
            margin-bottom: 50px;
        }

        .btn-group {
            text-align: center;
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 30px;
            border: 1px solid #ddd;
            background: #fff;
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn:hover {
            background: #f8f8f8;
        }

        .btn.primary {
            background: #009FE3;
            color: #fff;
            border-color: #009FE3;
        }

        .btn.primary:hover {
            background: #0085BE;
        }

        .btn.danger {
            background: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }

        .btn.danger:hover {
            background: #bb2d3b;
        }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <div class="visual">
        <h2>WE ARE INNOVATION</h2>
        <p>우리는 창상 고객님의 입장에서 생각하고 끊임없이 노력합니다.</p>
    </div>

    <div class="board-content">
        <h3 class="board-title">공지사항</h3>

        <div class="view-header">
            <h4 class="view-title"><?php echo escape_string($notice['title']); ?></h4>
            <div class="view-info">
                <div class="left">
                    <span>작성자: 관리자</span>
                    <span>작성일: <?php echo format_date($notice['created_at']); ?></span>
                </div>
                <div class="right">
                    <span>조회수: <?php echo $notice['views']; ?></span>
                </div>
            </div>
        </div>

        <div class="view-content">
            <?php echo nl2br(escape_string($notice['content'])); ?>
        </div>

        <div class="btn-group">
            <a href="index.php" class="btn">목록</a>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        function deleteNotice(id) {
            if (confirm('정말 삭제하시겠습니까?')) {
                location.href = `/admin/board/delete.php?id=${id}`;
            }
        }
    </script>
</body>
</html>