<?php
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가




// 메인 페이지 체크를 위한 더 정확한 방법
$isBusiness = false;

// // 추가적인 체크를 위한 현재 페이지 경로
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filename = basename($currentPath);

// URL이 루트 디렉토리이거나 index.php인 경우도 체크
if ($filename === 'business.php') {
    $isBusiness = true;
}
?>

<hr>

<!-- 하단 시작 { -->
<!-- footer -->
<footer>
    <div class="footer-top">
        <div class="footer-inner footer-inner-top">
            <div>
                <a href="<?php echo G5_URL ?>/privacy.php">개인정보 처리방침</a>
                <span>|</span>
                <a href="<?php echo G5_URL ?>/terms.php">이용약관</a>
            </div>
            <div>
                <a href="<?php echo G5_URL ?>/sitemap.php">전체메뉴</a>
                <span>|</span>
                <a href="<?php echo G5_COMMUNITY_URL ?>/contact.php">문의하기</a>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-inner footer-inner-bottom">
            <div class="footer-bottom-left">
                <div class="container__footer-info">
                    <p class="footer-text">
                        대표이사 : 홍길동<br />
                        주소 : 서울 송파구 올림픽로 300 롯데월드몰 7층<br />

                    </p>
                    <p class="footer-text">

                        TEL : 02-3213-5000<br />
                        사업자 등록번호 : 123-45-67890<br />
                        E-mail : abc@gmail.com<br />
                    </p>
                </div>
                <div class="container__footer-text footer-text">
                    <p>
                        <span>Copyright © 2024 회사</span>

                        <span>All Rights Reserved</span>
                    </p>
                </div>
            </div>

            <div class="logo-footer">
                <a href="<?php echo G5_URL ?>/index.php">
                    <img src="<?php echo G5_CSS_URL ?>/images/logo.svg" alt="로고" />
                    <span class="logo-text">LOGO</span>
                </a>

            </div>
        </div>

    </div>

</footer>

<?php
if (G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
    $(function () {
        // 폰트 리사이즈 쿠키있으면 실행
        font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
    });
</script>

<?php
include_once(G5_PATH . "/tail.sub.php");