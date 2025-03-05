<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
?>
<main class="main__policy">
    <div class="policy-container">
        <!-- 이용약관 섹션 -->
        <div class="policy-section">
            <h1>이용약관</h1>

            <div class="policy-article">
                <h2>제1조 (목적)</h2>
                <p>이 약관은 회사가 제공하는 서비스의 이용조건 및 절차, 회사와 회원 간의 권리, 의무 및 책임사항 등을 규정함을 목적으로 합니다.</p>
            </div>

            <div class="policy-article">
                <h2>제2조 (정의)</h2>
                <ul>
                    <li>"서비스"란 회사가 제공하는 모든 서비스를 의미합니다.</li>
                    <li>"회원"이란 회사와 서비스 이용계약을 체결하고 회사가 제공하는 서비스를 이용하는 개인 또는 법인을 의미합니다.</li>
                    <li>"아이디(ID)"란 회원의 식별과 회원의 서비스 이용을 위하여 회원이 선정하고 회사가 승인하는 문자와 숫자의 조합을 의미합니다.</li>
                </ul>
            </div>

            <div class="policy-article">
                <h2>제3조 (약관의 효력 및 변경)</h2>
                <p>① 이 약관은 서비스를 이용하고자 하는 모든 회원에 대하여 그 효력을 발생합니다.</p>
                <p>② 회사는 약관의 규제에 관한 법률 등 관련법을 위배하지 않는 범위에서 이 약관을 개정할 수 있습니다.</p>
            </div>
        </div>

    </div>
</main>

<script>
</script>
<?php
include_once(G5_PATH . '/tail.php');