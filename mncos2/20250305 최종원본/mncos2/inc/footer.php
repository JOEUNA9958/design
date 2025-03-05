<!-- inc/footer.php -->
<div class="fixed-btns">
    <a href="/mncos2/contact/inquiry.php" class="inquiry-btn">
        <img src="/mncos2/images/common/ico_inquiry.png" alt="사업문의" width="55px;">
    </a>
    <button type="button" class="top-btn">
        <img src="/mncos2/images/common/ico_top.svg" alt="맨위로" width="50px;">
    </button>
</div>

<footer>
    <div class="footer-inner">
        <div class="footer-logo">
            <img src="/mncos2/images/common/logo.png" alt="M&COS" width="40x">
        </div>
        <div class="footer-info">
            고객센터 : <span class="eng">032-715-6318</span> ｜ 평일 (토,일 공휴일 휴무) 오전 9시 ~ 오후 6시<br>
            주식회사 엠앤코스 ｜ 대표자 : 문자환 ｜ 주소 : <span class="eng">21631</span> 인천 남동구 남동서로 268 주식회사 엠앤코스 ｜ 사업자등록번호:<span class="eng">141-81-48395</span><br>
            통신판매업 신고번호 : ｜ 개인정보관리책임자 : 문자환 (<span class="eng">mncos@naver.com</span>)
        </div>
        <div class="footer-copyright eng">
            Copyright by 주식회사 엠앤코스. All rights reserved. Designed by morenvy.
            Some icons made by <a href="https://www.flaticon.com/kr/" title="Flaticon" target="_blank">Flaticon</a>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const topBtn = document.querySelector('.top-btn');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 200) {
            topBtn.classList.add('visible');
        } else {
            topBtn.classList.remove('visible');
        }
    });
    
    topBtn.addEventListener('click', function() {
        if (window.innerWidth > 768 && fullpage_api) {
            fullpage_api.moveTo(1);
        } else {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    });
});
</script>