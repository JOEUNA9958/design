<?php
require_once '../inc/db.php';
session_start();

// 로그인 체크
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: /mncos2/admin/login.php');
    exit;
}

// 공지사항 통계
$notice_count = $db->query("SELECT COUNT(*) FROM notice")->fetchColumn();
$recent_notices = $db->query("SELECT * FROM notice ORDER BY id DESC LIMIT 5")->fetchAll();

// 문의사항 통계
$inquiry_count = $db->query("SELECT COUNT(*) FROM inquiry")->fetchColumn();
$new_inquiry_count = $db->query("SELECT COUNT(*) FROM inquiry WHERE status = 'NEW'")->fetchColumn();
$recent_inquiries = $db->query("SELECT * FROM inquiry ORDER BY id DESC LIMIT 5")->fetchAll();

$gallery_count = $db->query("SELECT COUNT(*) FROM gallery")->fetchColumn();
$gallery_comment_count = $db->query("SELECT COUNT(*) FROM gallery_comments")->fetchColumn();
$recent_galleries = $db->query("SELECT * FROM gallery ORDER BY id DESC LIMIT 5")->fetchAll();

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 메인 - M&COS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .admin-title {
            font-size: 24px;
        }

        .admin-menu {
            display: flex;
            gap: 10px;
        }

        .menu-btn {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #ddd;
            background: #fff;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .menu-btn:hover {
            background: #f8f8f8;
        }

        .menu-btn.red {
            background: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }

        .menu-btn.red:hover {
            background: #c82333;
        }

        .admin-content {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .admin-card {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .admin-card.full {
            grid-column: span 2;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .stat-item {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .stat-item.highlight {
            color: #dc3545;
        }

        .recent-list {
            list-style: none;
        }

        .recent-list li {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .recent-list a {
            color: #333;
            text-decoration: none;
        }

        .recent-list a:hover {
            text-decoration: underline;
        }

        .recent-list .date {
            color: #666;
            font-size: 14px;
        }

        .new-badge {
            display: inline-block;
            padding: 2px 6px;
            background: #dc3545;
            color: #fff;
            font-size: 12px;
            border-radius: 3px;
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">관리자 페이지</h1>
            <div class="admin-menu">
                <a href="/mncos2/admin/board/list.php" class="menu-btn">공지사항</a>
                <a href="/mncos2/admin/board/inquiry.php" class="menu-btn">문의사항</a>
                <a href="/mncos2/admin/gallery_list.php" class="menu-btn">갤러리</a>
                <a href="/mncos2/admin/logout.php" class="menu-btn red">로그아웃</a>
            </div>
        </div>

        <div class="admin-content">
        <div class="admin-card">
            <h2 class="card-title">통계</h2>
            <div class="stat-item">전체 공지사항: <?php echo $notice_count; ?>개</div>
            <div class="stat-item">전체 문의사항: <?php echo $inquiry_count; ?>개</div>
            <div class="stat-item">전체 갤러리: <?php echo $gallery_count; ?>개</div>
            <div class="stat-item">갤러리 댓글: <?php echo $gallery_comment_count; ?>개</div>
            <div class="stat-item highlight">미답변 문의: <?php echo $new_inquiry_count; ?>개</div>
        </div>

            <div class="admin-card">
                <h2 class="card-title">최근 공지사항</h2>
                <ul class="recent-list">
                    <?php foreach ($recent_notices as $notice): ?>
                    <li>
                        <a href="/mncos2/board/view.php?id=<?php echo $notice['id']; ?>">
                            <?php echo htmlspecialchars($notice['title']); ?>
                        </a>
                        <span class="date"><?php echo date('Y-m-d', strtotime($notice['created_at'])); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="admin-card full">
                <h2 class="card-title">최근 문의사항</h2>
                <ul class="recent-list">
                    <?php foreach ($recent_inquiries as $inquiry): ?>
                    <li>
                        <div class="recent-title">
                            <a href="/mncos2/admin/board/inquiry_answer.php?id=<?php echo $inquiry['id']; ?>">
                                <?php echo htmlspecialchars($inquiry['title']); ?>
                                <?php if ($inquiry['status'] === 'NEW'): ?>
                                    <span class="new-badge">NEW</span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <span class="date">
                            <?php echo date('Y-m-d', strtotime($inquiry['created_at'])); ?>
                            <?php if ($inquiry['is_secret']): ?>
                                <i class="fas fa-lock"></i>
                            <?php endif; ?>
                        </span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="admin-card">
                <h2 class="card-title">최근 갤러리</h2>
                <ul class="recent-list">
                    <?php foreach ($recent_galleries as $gallery): ?>
                    <li>
                        <a href="/mncos2/admin/gallery_view.php?id=<?php echo $gallery['id']; ?>">
                            <?php echo htmlspecialchars($gallery['title']); ?>
                        </a>
                        <span class="date"><?php echo date('Y-m-d', strtotime($gallery['created_at'])); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</body>
</html>