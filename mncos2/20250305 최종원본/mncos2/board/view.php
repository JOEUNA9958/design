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
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/board/board_bg.jpg') no-repeat center/cover">
        <h2>BOARD</h2>
        <p>공지사항</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item active">
                <a href="/mncos2/board/index.php">공지사항</a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="/mncos2/gallery/index.php">갤러리</a>
            </div>
        </div>
    </div>

    <div class="board-view-content">
        <h3 class="board-view-title">공지사항</h3>

        <div class="board-view-header">
            <h4 class="board-view-subject"><?php echo escape_string($notice['title']); ?></h4>
            <div class="board-view-info">
                <div class="board-view-info-left">
                    <span>작성자: 관리자</span>
                    <span>작성일: <?php echo format_date($notice['created_at']); ?></span>
                </div>
                <div class="board-view-info-right">
                    <span>조회수: <?php echo $notice['views']; ?></span>
                </div>
            </div>
        </div>

        <div class="board-view-body">
            <?php echo nl2br(escape_string($notice['content'])); ?>
        </div>

        <div class="board-view-buttons">
            <a href="index.php" class="board-view-btn">목록</a>
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