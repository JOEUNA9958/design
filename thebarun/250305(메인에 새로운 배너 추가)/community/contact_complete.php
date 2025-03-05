<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/community.css">', 0);
?>
<main class="main__contact-complete">
    <div class="completion-container">
        <div class="success-icon">
            <svg viewBox="0 0 80 80">
                <circle cx="40" cy="40" r="36" stroke="#2ecc71" stroke-width="6" fill="none" />
                <path class="checkmark" d="M23 40l12 12 22-22" stroke="#2ecc71" stroke-width="6" fill="none"
                    stroke-dasharray="100" stroke-dashoffset="100" />
            </svg>
        </div>

        <h1 class="title">문의가 접수되었습니다</h1>

        <p class="message">
            소중한 의견 감사합니다.<br>
            문의하신 내용을 신속하게 확인하고 답변 드리겠습니다.
        </p>

        <div class="sub-message">
            답변은 입력하신 이메일로 발송될 예정입니다.
        </div>

        <a href="<?php echo G5_URL ?>/index.php" class="home-button">
            <span class="home-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
            </span>
            메인으로 돌아가기
        </a>
    </div>
</main>

<script>
    // SVG 체크마크 애니메이션 리플레이를 위한 함수
    function replayAnimation() {
        const checkmark = document.querySelector('.checkmark');
        checkmark.style.animation = 'none';
        checkmark.offsetHeight; // 리플로우 강제
        checkmark.style.animation = null;
    }

    // 페이지 로드 시 애니메이션 시작
    document.addEventListener('DOMContentLoaded', replayAnimation);
</script>
<?php
include_once(G5_PATH . '/tail.php');