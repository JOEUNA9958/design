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
            <strong>처음으로｜심리상담｜심리검사｜오시는길 <br> </strong>
            당진가족성통합상담센터 ｜ 대표자 : 신순옥 ｜  사업자등록번호:<span class="eng"> 311-82-05503</span><br>
            충남 당진시 채운동 서부로 67 운암빌딩 2층 ｜ 주소 : <span class="eng">31785</span>  ｜(<span class="eng">fc21@hanmail.net</span>)
        </div>
        <div class="footer-copyright eng">
             Copyright © 당진가족성통합상담센터 All Rights Reserved. 
            Some icons made by <a href="https://www.flaticon.com/kr/" title="Flaticon" target="_blank">Flaticon</a>
        </div>
    </div>
</footer>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, system-ui, Roboto, 'Helvetica Neue', 'Segoe UI', 'Apple SD Gothic Neo', 'Noto Sans KR', 'Malgun Gothic', sans-serif;
}

.eng {
    font-family: 'Montserrat', sans-serif;
}

.fixed-btns {
    position: fixed;
    bottom: 40px;
    right: 40px;
    z-index: 1001;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.inquiry-btn {
    width: 50px;
    height: 50px;
    background: #0066b3;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border-radius: 50%;
}

.inquiry-btn:hover {
    transform: translateY(-5px);
}

.top-btn {
    width: 50px;
    height: 50px;
    background: #fff;
    border: 1px solid #eee;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    border-radius: 50%;
}

.top-btn:hover {
    background: #f8f8f8;
}

.top-btn.visible {
    opacity: 1;
    visibility: visible;
}

footer {
    /* position: fixed; */
    bottom: 0;
    left: 0;
    width: 100%;
    height: 300px;
    background: #222;
    padding: 60px 40px;
    color: #999;
    z-index: 1000;
    /* visibility: hidden; */
    /* opacity: 0; */
    transition: all 0.3s ease;
    margin-top: 100px;
}

.footer-inner {
    max-width: 1400px;
    margin: 0 auto;
}

.footer-logo {
    margin-bottom: 30px;
}

.footer-info {
    font-size: 17px;
    line-height: 1.8;
    word-break: keep-all;
    font-weight: 400;
}
.footer-info strong {
    font-size: 20px;
    font-weight: 700;   
    color: rgba(255,255,255, 0.7);
}
.footer-info .eng {
    font-weight: 400;
}

.footer-copyright {
    margin-top: 20px;
    font-size: 12px;
    color: #666;
    font-weight: 400;
}

.footer-copyright br {
    display: none;
}

@media (max-width: 768px) {
    footer {
        height: auto;
        padding: 40px 20px;
    }

    .footer-info {
        font-size: 13px;
    }
    .footer-info strong {
        font-size: 13px; 
        color: rgba(255,255,255, 0.7);
    }

    .footer-copyright {
        font-size: 13px;
    }

    .footer-copyright br {
        display: block;
    }

    .fixed-btns {
        bottom: 20px;
        right: 20px;
    }
}

@media (max-width: 768px) {
    footer {
        position: relative; /* fixed에서 relative로 변경 */
        height: auto;
        padding: 40px 20px;
        visibility: visible !important; /* 강제로 보이게 설정 */
        opacity: 1 !important;
        margin-top: 50px;
    }

    .footer-inner {
        width: 100%;
    }

    .footer-logo img {
        height: 30px;  /* 로고 크기 조정 */
        width: auto;
    }

    .footer-info {
        font-size: 13px;  /* 글자 크기 줄임 */
        word-break: keep-all;
        line-height: 1.6;
    }

    .footer-copyright {
        font-size: 13px;
        line-height: 1.4;
        word-break: keep-all;
    }

    .fixed-btns {
        bottom: 20px;
        right: 20px;
        gap: 8px;  /* 간격 줄임 */
    }

    .inquiry-btn,
    .top-btn {
        width: 45px;  /* 크기 줄임 */
        height: 45px;
    }

    .inquiry-btn img,
    .top-btn img {
        width: 65px;  /* 이미지 크기 조정 */
        height: 65px;
        padding: 12px;  /* 내부 여백 추가 */
    }
}

@media (max-width: 480px) {
    footer {
        padding: 30px 15px;
        margin-top: 30px;
    }

    .fixed-btns {
        bottom: 15px;
        right: 15px;
    }

    .inquiry-btn,
    .top-btn {
        width: 40px;
        height: 40px;
    }

    .inquiry-btn img,
    .top-btn img {
        width: 65px;
        height: 65px;
        padding: 10px;
    }
}
</style>

<script>
// footer.php에서
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