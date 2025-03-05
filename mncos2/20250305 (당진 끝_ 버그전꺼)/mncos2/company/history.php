<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>연혁 - M&COS</title>

    <!-- Plugin CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/mncos2/css/fonts.css">
    <link rel="stylesheet" href="/mncos2/css/default.css">
    <link rel="stylesheet" href="/mncos2/css/layout.css">
    <link rel="stylesheet" href="/mncos2/css/sub.css">
    <link rel="stylesheet" href="/mncos2/css/contents.css">
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="sub-page">
    <?php include '../inc/header.php'; ?>
    <?php include '../inc/cursor.php'; ?>

    <div class="sub-visual" style="background: url('../images/company/company_bg.jpg') no-repeat center/cover">
        <h2>COMPANY</h2>
        <p>고객사의 꿈과 비전을 함께 이루는 엠앤코스</p>
        <div class="sub-visual-menu">
            <div class="sub-visual-menu-item">
                <a href="../company/about.php"><span>회사소개</span></a>
            </div>
            <div class="sub-visual-menu-item active">
                <a href="../company/history.php"><span>연혁</span></a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="../company/ceo.php"><span>CEO<br>인사말</span></a>
            </div>
            <div class="sub-visual-menu-item">
                <a href="../company/certification.php"><span>인증서</span></a>
            </div>
        </div>
    </div>

    <div class="company-history-content">
        <div class="company-history-title">
            <h2>HISTORY</h2>
            <p>우수성을 향한 끊임없는 노력과 고객을 위한 최고의 제품을 만들기 위한 지속적인 추구</p>
        </div>
        
        <div class="company-history-timeline">
            <div class="company-history-timeline-section">
                <div class="company-history-year-wrap">
                    <div class="company-history-year">2024</div>
                    <div class="company-history-list">
                        <div class="company-history-item">
                            <div class="company-history-date">2024.09</div>
                            <div class="company-history-desc">탈모기능성 카페인 주정물 허가 (삼푸,엠플,토닉트리트먼트 등)</div>
                        </div>
                        <div class="company-history-item">
                            <div class="company-history-date">2024.09</div>
                            <div class="company-history-desc">탈모기능성 카페인 주정물 허가 (삼푸,엠플,토닉트리트먼트 등)</div>
                        </div>
                        <div class="company-history-item">
                            <div class="company-history-date">2024.08</div>
                            <div class="company-history-desc">원산지인증수출자 인증</div>
                        </div>
                        <div class="company-history-item">
                            <div class="company-history-date">2024.08</div>
                            <div class="company-history-desc">썬크림 spf50 pa++++ 허가</div>
                        </div>
                        <div class="company-history-item">
                            <div class="company-history-date">2024.04</div>
                            <div class="company-history-desc">에어로졸 (주름 및 미백 기능성 허가)</div>
                        </div>
                        <div class="company-history-item">
                            <div class="company-history-date">2024.03</div>
                            <div class="company-history-desc">미국 MOCRA 공장 등록</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 200
        });
    </script>
</body>
</html>