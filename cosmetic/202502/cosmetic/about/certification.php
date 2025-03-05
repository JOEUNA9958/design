<!-- certification.php -->
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>인증서</title>
<style>
    body {
        display: block;
        margin: 0;
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
        height: 80px;
    }


    .sub_menu a {
        flex: 1;
        text-align: center;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 49 37 / 23%);
        transition: all 0.3s ease;
        font-size: 20px;
        position: relative;
    }
    
    .sub_menu a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #fff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .sub_menu a:hover::after,
    .sub_menu a.active::after {
        width: 100%;
    }

    .sub_menu a:hover,
    .sub_menu a.active {
        background: #003125;
    }

    .story-section1 {
        padding: 100px 0;
        max-width: 1810px;
        margin: 0 auto;
    }

/* 인증서 섹션 */
.certificate_section {
    padding: 80px 0;
    background: #fff;
}

.certificate_wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* 검색 영역 */
.search_area {
    background: #f5f5f5;
    padding: 10px;
    margin-top: 50px;
    display: flex;
    justify-content: center;
}

.search_box {
    display: flex;
    gap: 10px;
    max-width: 600px;
    width: 100%;
}

.search_select {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    height: 45px;
    min-width: 120px;
}

.search_input {
    border: 1px solid #ddd;
    border-radius: 4px;
    flex: 1;
}

.search_button {
    padding: 0 30px;
    background: #007a5d;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    height: 45px;
}
/* 인증서 그리드 */
.cert_grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 50px;
}

.cert_item {
    text-align: center;
}

.cert_image {
    border: 1px solid #eee;
    padding: 20px;
    margin-bottom: 15px;
    background: #fff;
    transition: all 0.3s ease;
}

.cert_image:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.cert_image img {
    width: 100%;
    height: auto;
    display: block;
}

.cert_title {
    font-size: 16px;
    color: #333;
    margin-top: 15px;
}

/* 페이지네이션 */
.pagination {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-top: 50px;
}

.pagination a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ddd;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination a.active {
    background: #007a5d;
    color: #fff;
    border-color: #007a5d;
}

.pagination a:hover:not(.active) {
    background: #f5f5f5;
}

@media (max-width: 992px) {
    .cert_grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .cert_grid {
        grid-template-columns: 1fr;
    }

    .search_box {
        flex-wrap: wrap;
    }

    .search_input {
        width: 100%;
    }
}
</style>
</head>
<body>
<?php include '../inc/header.php'; ?>

<div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>About Us - 인증서</h2>
            <div class="sub_menu">
                <a href="/cosmetic/about/story.php">스토리</a>
                <a href="/cosmetic/about/ceo.php">CEO 인사말</a>
                <a href="/cosmetic/about/certification.php" class="active">인증서</a>
                <a href="/cosmetic/about/direct_inquiry.php">문의하기</a>
                <a href="/cosmetic/about/map.php">오시는 길</a>
            </div>
        </div>
    </div>

    <div class="ceo-header">
        <span class="ceo-header__eng"></span>
        <h2 class="ceo-header__title"></h2>
    </div>

<div class="certificate_section">
    <div class="certificate_wrap">

        <!-- 인증서 그리드 -->
        <div class="cert_grid">
            <div class="cert_item">
                <div class="cert_image">
                    <img src="../images/about/cert1.jpg" alt="기업부설연구소">
                </div>
                <p class="cert_title">기업부설연구소</p>
            </div>
            <!-- 나머지 인증서들 반복 -->
        </div>

        <!-- 페이지네이션 -->
        <div class="pagination">
            <a href="#" class="page_first">&lt;&lt;</a>
            <a href="#" class="page_prev">&lt;</a>
            <a href="#" class="page_num active">1</a>
            <a href="#" class="page_next">&gt;</a>
            <a href="#" class="page_last">&gt;&gt;</a>
        </div>

        <!-- 검색 영역 - 위치 이동 -->
        <div class="search_area">
            <div class="search_box">
                <select class="search_select">
                    <option>제목+내용</option>
                </select>
                <input type="text" class="search_input" placeholder="검색단어를 입력">
                <button type="button" class="search_button">검색</button>
            </div>
        </div>
    </div>
</div>


<?php include '../inc/footer.php'; ?>

<script>

</script>
</body>
</html>