<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
    exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
?>
<main class="main__policy">
    <main class="main__policy">
        <div class="policy-container">
            <!-- 개인정보처리방침 섹션 -->
            <div class="policy-section">
                <h1>개인정보처리방침</h1>

                <div class="policy-article">
                    <h2>1. 개인정보의 수집 및 이용 목적</h2>
                    <p>회사는 다음의 목적을 위하여 개인정보를 처리합니다. 처리하고 있는 개인정보는 다음의 목적 이외의 용도로는 이용되지 않으며, 이용 목적이 변경되는 경우에는 개인정보 보호법
                        제18조에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다.</p>
                    <ul>
                        <li>문의사항 응대 및 서비스 제공</li>
                        <li>신규 서비스 개발 및 마케팅에 활용</li>
                    </ul>
                </div>

                <div class="policy-article">
                    <h2>2. 수집하는 개인정보의 항목</h2>
                    <div class="table-container">
                        <table class="policy-table">
                            <thead>
                                <tr>
                                    <th class="policy-th">수집목적</th>
                                    <th class="policy-th">수집항목</th>
                                    <th class="policy-th">보유기간</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="policy-td">홈페이지 문의</td>
                                    <td class="policy-td">이름, 이메일, 연락처, 회사명</td>
                                    <td class="policy-td">3년</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="policy-article">
                    <h2>3. 개인정보의 파기절차 및 방법</h2>
                    <p>회사는 원칙적으로 개인정보 처리목적이 달성된 경우에는 지체없이 해당 개인정보를 파기합니다. 파기의 절차, 기한 및 방법은 다음과 같습니다.</p>
                </div>
            </div>
        </div>
    </main>

    <script>
    </script>
    <?php
    include_once(G5_PATH . '/tail.php');