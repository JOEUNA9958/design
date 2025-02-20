<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');
include_once(G5_LIB_PATH . '/mailer.lib.php'); // 메일러 라이브러리 추가

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/community.css">', 0);

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 필수 입력값 검증
    if (
        !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) ||
        !isset($_POST['company']) || !isset($_POST['message'])
    ) {
        alert('모든 필수 항목을 입력해주세요.');
        exit;
    }

    // 이메일 형식 검증
    if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['email'])) {
        alert('올바른 이메일 주소를 입력해주세요.');
        exit;
    }

    // 개인정보 수집 동의 확인
    if ($_POST['consent'] != '1') {
        alert('개인정보 수집 및 이용에 동의해주세요.');
        exit;
    }

    // XSS 방지를 위한 입력값 처리
    $name = clean_xss_tags($_POST['name']);
    $email = clean_xss_tags($_POST['email']);
    $phone = clean_xss_tags($_POST['phone']);
    $company = clean_xss_tags($_POST['company']);
    $message = strip_tags($_POST['message']);

    // 메일 내용 구성
    $subject = '[홈페이지 문의] ' . $name . '님의 문의가 접수되었습니다.';

    $content = '<div style="margin:30px auto;width:600px;border:10px solid #f7f7f7">';
    $content .= '<div style="border:1px solid #dedede">';
    $content .= '<h1 style="padding:30px 30px 0;background:#f7f7f7;color:#555;font-size:1.4em">';
    $content .= '홈페이지 문의 내용';
    $content .= '</h1>';
    $content .= '<span style="display:block;padding:10px 30px 30px;background:#f7f7f7;text-align:right">';
    $content .= '작성일 : ' . G5_TIME_YMDHIS;
    $content .= '</span>';
    $content .= '<div style="padding:30px">';
    $content .= '<h2 style="margin:0;padding:0 0 10px;font-size:1.2em">문의자 정보</h2>';
    $content .= '<table style="width:100%;border-collapse:collapse;border-top:1px solid #dedede">';
    $content .= '<tbody>';
    $content .= '<tr><th style="padding:15px;border-bottom:1px solid #dedede;background:#f7f7f7">이름</th><td style="padding:15px;border-bottom:1px solid #dedede">' . $name . '</td></tr>';
    $content .= '<tr><th style="padding:15px;border-bottom:1px solid #dedede;background:#f7f7f7">이메일</th><td style="padding:15px;border-bottom:1px solid #dedede">' . $email . '</td></tr>';
    $content .= '<tr><th style="padding:15px;border-bottom:1px solid #dedede;background:#f7f7f7">연락처</th><td style="padding:15px;border-bottom:1px solid #dedede">' . $phone . '</td></tr>';
    $content .= '<tr><th style="padding:15px;border-bottom:1px solid #dedede;background:#f7f7f7">회사명</th><td style="padding:15px;border-bottom:1px solid #dedede">' . $company . '</td></tr>';
    $content .= '</tbody>';
    $content .= '</table>';
    $content .= '<h2 style="margin:30px 0 0;padding:0 0 10px;font-size:1.2em">문의 내용</h2>';
    $content .= '<div style="padding:15px;border:1px solid #dedede;background:#f7f7f7;white-space:pre-wrap;word-break:break-all">';
    $content .= htmlspecialchars($message);
    $content .= '</div>';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '</div>';

    // 메일 발송
    $result = mailer($config['cf_admin_email_name'], $config['cf_smtp_user'], $config['cf_admin_email'], $subject, $content, 1);

    if ($result) {
        header('location: ' . G5_COMMUNITY_URL . '/contact_complete.php');
    } else {
        alert('문의 접수 중 오류가 발생했습니다. 다시 시도해주세요.');
    }
    exit;
}
?>
<main class="main__community">
    <div class="community-title-container">
        <h2 class="community-title">문의하기</h2>
        <p class="community-subtitle">
            궁금한 사항을 남겨주시면 빠른 시일 내에 답변드리겠습니다.
        </p>
    </div>

    <form class="contact-form" method="post" onsubmit="return submitForm(event)">
        <!-- 기본 정보 입력 필드 -->
        <div class="form-field">
            <label for="name">이름<span class="required">*</span></label>
            <input type="text" id="name" name="name" placeholder="이름을 입력해주세요." required />
        </div>

        <div class="form-field">
            <label for="email">이메일<span class="required">*</span></label>
            <input type="email" id="email" name="email" placeholder="이메일을 입력해주세요." required />
        </div>

        <div class="form-field">
            <label for="phone">연락처<span class="required">*</span></label>
            <input type="tel" id="phone" name="phone" placeholder="연락처를 입력해주세요." required />
        </div>

        <div class="form-field">
            <label for="company">회사명<span class="required">*</span></label>
            <input type="text" id="company" name="company" placeholder="회사명을 입력해주세요." required />
        </div>

        <!-- 문의내용 텍스트영역 -->
        <div class="form-field">
            <label for="message">문의내용<span class="required">*</span></label>
            <textarea id="message" name="message" placeholder="내용을 입력해주세요." required></textarea>
        </div>

        <!-- 개인정보 동의 체크박스 -->
        <div class="consent-check">
            <label class="checkbox-label">
                <input type="checkbox" id="consent" name="consent" value="1" />
                <span class="checkbox-custom"></span>
                <span class="label-text">개인정보 수집,이용 동의(필수)</span>
            </label>
            <p class="consent-description">
                문의하신 내용에 대한 원인 파악 및 원활한 상담을 위하여 개인 정보를
                수집합니다. 수집된 개인정보는 3년간 보관 후 폐기됩니다.
            </p>
        </div>

        <!-- 제출 버튼 -->
        <button type="submit" class="submit-btn">문의하기</button>
    </form>

    <!-- 전송 중 로딩 화면 -->
    <div class="loading-overlay">
        <div class="loader-container">
            <!-- 로딩 상태 -->
            <div id="loadingState">
                <div class="loader">
                    <div class="spinner"></div>
                    <svg class="envelope" viewBox="0 0 24 24" fill="none" stroke="#3498db" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                </div>
                <div class="status-message">
                    메일 전송 중입니다<span class="loading-dots">...</span>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    function validateForm() {
        // 필수 입력값 검증
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const company = document.getElementById('company').value.trim();
        const message = document.getElementById('message').value.trim();
        const consent = document.getElementById('consent').checked;

        if (!name || !email || !phone || !company || !message) {
            alert('모든 필수 항목을 입력해주세요.');
            return false;
        }

        if (!consent) {
            alert('개인정보 수집 및 이용에 동의해주세요.');
            return false;
        }

        // 이메일 형식 검증
        const emailRegex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i;
        if (!emailRegex.test(email)) {
            alert('올바른 이메일 주소를 입력해주세요.');
            return false;
        }

        return true;
    }

    function submitForm(event) {
        if (validateForm()) {
            // 폼 검증이 성공하면 로딩 오버레이 표시
            document.querySelector('.loading-overlay').style.display = 'flex';

            // 로딩 화면
            // 로딩 점들 애니메이션
            const loadingDots = document.querySelector('.loading-dots');
            let dots = 0;

            const intervalDots = setInterval(() => {
                if (loadingDots) {
                    dots = (dots + 1) % 4;
                    loadingDots.textContent = '.'.repeat(dots);
                } else {
                    clearInterval(intervalDots);
                }
            }, 500);
            return true;
        }
        return false;
    }

</script>

<?php
include_once(G5_PATH . '/tail.php');