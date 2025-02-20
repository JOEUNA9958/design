<!-- inc/footer.php -->
<footer class="footer">
    <div class="bh_wrap">
        <!-- 상단 메뉴 -->
        <div class="footer_top">
            <a href="/privacy" class="privacy_link">개인정보처리방침</a>
            <div class="top_menu">
                <a href="/cosmetic/about/story.php">About Us</a>
                <a href="/cosmetic/brand/index.php">Brand</a>
                <a href="/cosmetic/oemodm/oem_odm.php">OEM/ODM</a>
                <a href="/cosmetic/community/inquiry.php">Community</a>
            </div>
        </div>

        <!-- 하단 정보 -->
        <div class="footer_bottom">
            <div class="footer_logo">
                <img src="/cosmetic/images/main/logo.png" alt="Cosmetic">
            </div>
            <div class="company_info">
                <p class="info_title">INFO</p>
                <div class="info_content">
                    <p>상호명 : ㈜기업명<span class="bar">l</span>대표 : 대표자<span class="bar">l</span>TEL : 032-000-0000<span class="bar">l</span>FAX : 032-000-0000</p>
                    <p>EMAIL : example@example.com<span class="bar">l</span>사업자 등록번호 : 000-00-00000</p>
                    <p>주소 : 이곳은 주소를 기입해주세요.</p>
                </div>
                <p class="copyright">Copyright 2024. ㈜기업명 Co. All rights reserved.</p>
            </div>
        </div>
    </div>

    <div class="floating-btns">
   <button type="button" class="top-btn">
       <img src="/cosmetic/images/main/top.png" alt="상단이동">
   </button>
   <button type="button" class="inquiry-btn" onclick="location.href='/cosmetic/community/inquiry.php'">
       <img src="/cosmetic/images/main/inquiry.png" alt="문의하기">
   </button>
</div>
</footer>

<style>
body {
   font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, system-ui, Roboto, 'Helvetica Neue', 'Segoe UI', 'Apple SD Gothic Neo', 'Noto Sans KR', 'Malgun Gothic', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', sans-serif;
}
@font-face {
   font-family: 'Pretendard';
   src: url('https://cdn.jsdelivr.net/gh/Project-Noonnu/noonfonts_2107@1.1/Pretendard-Regular.woff') format('woff');
   font-weight: 400;
   font-style: normal;
}
.footer {
    background-color: #273d65;
    padding: 25px 0;
    color: #fff;
}

.bh_wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* 상단 메뉴 스타일 */
.footer_top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 30px;
}

.privacy_link {
    color: #fff;
    text-decoration: none;
}

.top_menu {
    display: flex;
    gap: 30px;
}

.top_menu a {
    color: #fff;
    text-decoration: none;
}

/* 하단 정보 스타일 */
.footer_bottom {
    display: flex;
    align-items: flex-start;
    gap: 50px;
}

.footer_logo img {
    height: 40px;
}

.company_info {
    flex: 1;
}

.info_title {
    color: #bbb;
    font-size: 14px;
    margin-bottom: 15px;
}

.info_content {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    line-height: 1.8;
}

.info_content p {
    margin-bottom: 5px;
}

.bar {
    display: inline-block;
    margin: 0 10px;
    color: rgba(255, 255, 255, 0.3);
}

.copyright {
    margin-top: 30px;
    color: rgba(255, 255, 255, 0.5);
    font-size: 14px;
}

.floating-btns {
   position: fixed;
   right: 30px;
   bottom: 30px;
   display: flex;
   flex-direction: column;
   gap: 10px;
   z-index: 100;
}

.floating-btns button {
   width: 70px;
   height: 70px;
   border-radius: 50%;
   border: none;
   background: #fff;
   box-shadow: 0 2px 10px rgba(0,0,0,0.1);
   cursor: pointer;
   transition: all 0.3s ease;
}

.floating-btns button:hover {
   transform: translateY(-5px);
}

.floating-btns img {
   width: 24px;
   height: 24px;
}

@media (max-width: 768px) {
   .footer {
       padding: 30px 0;
   }
   
   .bh_wrap {
       padding: 0 20px;
   }
   
   .footer_top {
       padding-bottom: 20px;
       margin-bottom: 20px;
   }
   
   .top_menu {
       display: grid;
       grid-template-columns: repeat(2, 1fr);
       gap: 15px;
       width: 100%;
   }
   
   .top_menu a {
       font-size: 14px;
   }
   
   .footer_bottom {
       gap: 30px;
   }
   
   .footer_logo img {
       height: 30px;
   }
   
   .info_content {
       font-size: 13px;
   }
   
   .info_content p {
       display: flex;
       flex-direction: column;
       gap: 5px;
   }
   
   .bar {
       display: none;
   }
   
   .copyright {
       margin-top: 20px;
       font-size: 12px;
   }

   .floating-btns {
       right: 15px;
       bottom: 15px;
   }

   .floating-btns button {
       width: 50px;
       height: 50px;
   }

   .floating-btns img {
       width: 20px;
       height: 20px;
   }
}

@media (max-width: 480px) {
   .footer_top {
       text-align: center;
   }

   .privacy_link {
       width: 100%;
       text-align: center;
       padding: 10px 0;
       border-bottom: 1px solid rgba(255,255,255,0.1);
       margin-bottom: 10px;
   }
   
   .top_menu {
       grid-template-columns: 1fr;
       text-align: center;
   }
}
</style>
<!-- footer 맨 아래에 추가 -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const topBtn = document.querySelector('.top-btn');
    const inquiryBtn = document.querySelector('.inquiry-btn');
    
    // 상단이동 버튼
    topBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // 문의하기 버튼
    inquiryBtn.addEventListener('click', function() {
        location.href = '/cosmetic/community/inquiry.php';
    });
    
    // 스크롤시 버튼 표시/숨김
    window.addEventListener('scroll', function() {
        if(window.scrollY > 200) {
            topBtn.style.opacity = '1';
        } else {
            topBtn.style.opacity = '0';
        }
    });
});
</script>