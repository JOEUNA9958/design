<?php include '../inc/header.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의하기 - D-KIN Cosmetic</title>
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

        .inquiry-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 100px 15px 150px;
            width: 1200px;
            margin: 0 auto;
        }

        .inquiry-title-section {
            width: 100%;
            text-align: center;
            margin-bottom: 50px;
        }

        .inquiry-small-title {
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 16px;
            color: #757575;
            margin-bottom: 10px;
        }

        .inquiry-main-title {
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 37.5px;
            color: #424242;
        }

        .inquiry-info {
            width: 90%;
            background: url('../images/main/main2.jpg');
            padding: 71px 50px;
            margin-bottom: 50px;
            color: #424242;
            text-align: end;
        }

        .inquiry-info h3 {
            font-size: 30.5px;
            margin-bottom: 20px;
        }

        .inquiry-info .divider {
            width: 45px;
            height: 2px;
            background: #9E9E9E;
            margin: 20px 0;
        }

        .inquiry-info p {
            font-size: 18.75px;
            color: #616161;
        }

        .form-container {
            width: 100%;
            max-width: 1170px;
        }

        .form-row {
            display: flex;
            margin-bottom: 20px;
            gap: 30px;
        }

        .form-group {
            flex: 1;
        }

        .form-label {
            display: block;
            font-family: 'Roboto';
            font-size: 17.5px;
            color: #424242;
            margin-bottom: 10px;
        }

        .form-label::after {
            content: ' *';
            color: #ff0000;
        }

        .form-input {
            width: 100%;
            height: 55px;
            padding: 17px 21px;
            border: 1px solid #C4C4C4;
            font-size: 16.875px;
        }

        .form-textarea {
            width: 100%;
            height: 200px;
            padding: 17px 21px;
            border: 1px solid #ddd;
            resize: none;
            font-family: inherit;
            font-size: 14px;
        }

        .file-upload {
            width: 100%;
            min-height: 40px;
            border: 1px solid #ddd;
            background: #f8f8f8;
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-upload input[type="file"] {
            height: 100%;
            width: auto;
            padding: 12px;
        }

        .file-upload span {
            color: #666;
            font-size: 14px;
        }

        .file-upload-btn {
            background: linear-gradient(180deg, #FFFFFF 0%, #E6E6E6 100%);
            border: 1px solid #BBBBBB;
            padding: 6px 12px;
            font-size: 11.25px;
            color: #333333;
        }

        .privacy-check {
            margin: 20px 0;
            text-align: unset;
        }

        .submit-btn {
            display: block;
            width: 200px;
            height: 55px;
            background: #00624A;
            color: #FFFFFF;
            border: none;
            font-weight: 700;
            font-size: 16.875px;
            margin: 50px auto 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sub_banner_wrap">
        <div class="sub_banner" style="background-image: url('../images/about/banner1.jpg');">
            <h2>About Us - 문의하기</h2>
            <div class="sub_menu">
                <a href="/cosmetic/about/story.php">스토리</a>
                <a href="/cosmetic/about/ceo.php">CEO 인사말</a>
                <a href="/cosmetic/about/certification.php">인증서</a>
                <a href="/cosmetic/about/direct_inquiry.php" class="active">문의하기</a>
                <a href="/cosmetic/about/map.php">오시는 길</a>
            </div>
        </div>
    </div>

    <div class="inquiry-container">
        <div class="inquiry-title-section">
            <div class="inquiry-small-title">Inquiry</div>
            <div class="inquiry-main-title">문의하기</div>
        </div>

        <div class="inquiry-info">
            <h3>㈜기업명에 더 궁금하신 점이 있으신가요?</h3>
            <div class="divider"></div>
            <p>문의를 남겨주시면 빠르고 친절하게 답변해드리겠습니다. 언제든지 편하게 문의주세요.</p>
        </div>

        <form action="../community/inquiry_write_process.php" method="post" enctype="multipart/form-data" class="form-container" onsubmit="return validateForm()">
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">성함</label>
                <input type="text" name="name" class="form-input" placeholder="성함을 입력해주세요." required>
            </div>
            <div class="form-group">
                <label class="form-label">비밀번호</label>
                <input type="password" name="password" class="form-input" placeholder="비밀번호를 입력해주세요." required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">연락처</label>
                <input type="tel" name="phone" class="form-input" placeholder="연락 받으실 번호를 입력해주세요." required>
            </div>
            <div class="form-group">
                <label class="form-label">제목</label>
                <input type="text" name="title" class="form-input" placeholder="제목을 입력해주세요." required>
            </div>
        </div>

            <div class="form-group">
                <label class="form-label" style="display: flex; align-items: center;">
                    이메일
                    <span style="color: #9E9E9E; font-size: 14px; margin-left: 5px;">(선택사항)</span>
                </label>
                <input type="email" name="email" class="form-input" placeholder="이메일 주소를 입력해주세요.">
            </div>

            <div class="form-group">
                <label class="form-label" style="margin-top:20px;">상담내용</label>
                <textarea name="content" class="form-textarea" required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label" style="display: flex; align-items: center; margin-top:20px;">
                    첨부파일
                </label>
                <div class="file-upload">
                    <input type="file" name="upload_file" id="upload_file">
                    <span>여기에 파일을 끌어 놓거나 왼쪽의 버튼을 클릭하세요.</span>
                </div>
            </div>

            <div class="privacy-check">
                <input type="checkbox" id="privacy" required>
                <label for="privacy">개인정보처리방침에 동의합니다.</label>
            </div>

            <button type="submit" class="submit-btn">문의하기</button>
        </form>
    </div>

    <?php include '../inc/footer.php'; ?>

    <script>
    function validateForm() {
        const name = document.querySelector('input[name="name"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        const content = document.querySelector('textarea[name="content"]').value;
        const privacy = document.getElementById('privacy').checked;

        if (!name || !phone || !content || !privacy) {
            alert('필수 항목을 모두 입력해주세요.');
            return false;
        }

        // 폼 제출 성공 시
        alert('문의가 완료되었습니다.');
        return true;
    }
    </script>
</body>
</html>