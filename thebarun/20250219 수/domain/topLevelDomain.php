<?php
include_once('../common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_'))
  exit; // 개별 페이지 접근 불가

include_once(G5_PATH . '/head.php');

add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_CSS_URL . '/domain.css">', 0);
?>


<main class="main__domain" id="top-level-domain">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo G5_URL ?>/index.php">홈</a></li>
      <li class="breadcrumb-item"><a href="<?php echo G5_DOMAIN_URL ?>/domain.php">도메인</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        국가 최상위 도메인
      </li>
    </ol>
  </nav>

  <!-- 이미지 -->
  <article class="title__top-domain">
    <span class="text__title__domain-en">Country Code Top-Level Domain</span>
    <h1 class="text__title__domain-ko">국가 최상위 도메인</h1>
  </article>

  <!-- 수평선 -->
  <hr class="hr hr__domain" />

  <!-- 섹션 1 -->
  <section class="section-top-domain-1">
    <h2 class="header__section-top-domain-1">국가 최상위 도메인</h2>
    <p class="desc__section-top-domain-1">
      국가최상위도메인(nTLD)은 ISO-3166 국가코드 체계에 따라 세계 각국을 두
      자리 영문약자로 표현한 약 190여 개의 국가도메인으로, ccTLD(Country
      Code Top Level Domain)라고도 합니다.
    </p>
    <p class="desc__section-top-domain-1">
      한국의 경우 '.kr'과 '.한국'으로 구분되며, '.com', '.net' 등과 같은
      국제 단체의 도메인 이름에 배당된 고유 부호를 최상위 도메인으로
      취급합니다. 과학기술정보방송통신위원회에 따르면, 공공기관은 150개의
      한글도메인을 '.kr'과 '.한국'으로 운영하고 있다고 밝혔습니다.
    </p>
    <p class="desc__section-top-domain-1">
      또한, 인터넷 주소창에 한글을 입력하면 이를 영문 주소로 자동 변환하여
      포털 등을 거치지 않고도 해당 사이트로 곧바로 연결해주는 원천기술을
      통해 새로운 도약을 준비하고 있습니다.
    </p>
  </section>

  <!-- 섹션 2: 표 -->
  <section class="tab-container">
    <ul class="tab-menu">
      <li class="tab-item active" data-tab="asia">아시아</li>
      <li class="tab-item" data-tab="europe">유럽</li>
      <li class="tab-item" data-tab="america">아메리카</li>
      <li class="tab-item" data-tab="africa">아프리카</li>
    </ul>

    <div class="tab-content">
      <!-- 아시아 -->
      <div class="table-container active" id="asia">
        <table>
          <thead>
            <tr>
              <th>국가</th>
              <th>국가코드</th>
              <th>ccTLD</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>대한민국</td>
              <td>KR</td>
              <td>.kr</td>
            </tr>
            <tr>
              <td>일본</td>
              <td>JP</td>
              <td>.jp</td>
            </tr>
            <tr>
              <td>중국</td>
              <td>CN</td>
              <td>.cn</td>
            </tr>
            <tr>
              <td>북한</td>
              <td>KP</td>
              <td>.kp</td>
            </tr>
            <tr>
              <td>홍콩</td>
              <td>HK</td>
              <td>.hk</td>
            </tr>
            <tr>
              <td>마카오</td>
              <td>MO</td>
              <td>.mo</td>
            </tr>
            <tr>
              <td>대만</td>
              <td>TW</td>
              <td>.tw</td>
            </tr>
            <tr>
              <td>몽골</td>
              <td>MN</td>
              <td>.mn</td>
            </tr>
            <tr>
              <td>베트남</td>
              <td>VN</td>
              <td>.vn</td>
            </tr>
            <tr>
              <td>태국</td>
              <td>TH</td>
              <td>.th</td>
            </tr>
            <tr>
              <td>캄보디아</td>
              <td>KH</td>
              <td>.kh</td>
            </tr>
            <tr>
              <td>라오스</td>
              <td>LA</td>
              <td>.la</td>
            </tr>
            <tr>
              <td>미얀마</td>
              <td>MM</td>
              <td>.mm</td>
            </tr>
            <tr>
              <td>말레이시아</td>
              <td>MY</td>
              <td>.my</td>
            </tr>
            <tr>
              <td>싱가포르</td>
              <td>SG</td>
              <td>.sg</td>
            </tr>
            <tr>
              <td>인도네시아</td>
              <td>ID</td>
              <td>.id</td>
            </tr>
            <tr>
              <td>필리핀</td>
              <td>PH</td>
              <td>.ph</td>
            </tr>
            <tr>
              <td>브루나이</td>
              <td>BN</td>
              <td>.bn</td>
            </tr>
            <tr>
              <td>동티모르</td>
              <td>TL</td>
              <td>.tl</td>
            </tr>
            <tr>
              <td>인도</td>
              <td>IN</td>
              <td>.in</td>
            </tr>
            <tr>
              <td>파키스탄</td>
              <td>PK</td>
              <td>.pk</td>
            </tr>
            <tr>
              <td>방글라데시</td>
              <td>BD</td>
              <td>.bd</td>
            </tr>
            <tr>
              <td>스리랑카</td>
              <td>LK</td>
              <td>.lk</td>
            </tr>
            <tr>
              <td>몰디브</td>
              <td>MV</td>
              <td>.mv</td>
            </tr>
            <tr>
              <td>네팔</td>
              <td>NP</td>
              <td>.np</td>
            </tr>
            <tr>
              <td>부탄</td>
              <td>BT</td>
              <td>.bt</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- 유럽 -->
      <div class="table-container" id="europe">
        <table>
          <thead>
            <tr>
              <th>국가</th>
              <th>국가코드</th>
              <th>ccTLD</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>영국</td>
              <td>GB</td>
              <td>.uk</td>
            </tr>
            <tr>
              <td>프랑스</td>
              <td>FR</td>
              <td>.fr</td>
            </tr>
            <tr>
              <td>독일</td>
              <td>DE</td>
              <td>.de</td>
            </tr>
            <tr>
              <td>이탈리아</td>
              <td>IT</td>
              <td>.it</td>
            </tr>
            <tr>
              <td>스페인</td>
              <td>ES</td>
              <td>.es</td>
            </tr>
            <tr>
              <td>포르투갈</td>
              <td>PT</td>
              <td>.pt</td>
            </tr>
            <tr>
              <td>네덜란드</td>
              <td>NL</td>
              <td>.nl</td>
            </tr>
            <tr>
              <td>벨기에</td>
              <td>BE</td>
              <td>.be</td>
            </tr>
            <tr>
              <td>스위스</td>
              <td>CH</td>
              <td>.ch</td>
            </tr>
            <tr>
              <td>오스트리아</td>
              <td>AT</td>
              <td>.at</td>
            </tr>
            <tr>
              <td>스웨덴</td>
              <td>SE</td>
              <td>.se</td>
            </tr>
            <tr>
              <td>노르웨이</td>
              <td>NO</td>
              <td>.no</td>
            </tr>
            <tr>
              <td>덴마크</td>
              <td>DK</td>
              <td>.dk</td>
            </tr>
            <tr>
              <td>핀란드</td>
              <td>FI</td>
              <td>.fi</td>
            </tr>
            <tr>
              <td>아이슬란드</td>
              <td>IS</td>
              <td>.is</td>
            </tr>
            <tr>
              <td>아일랜드</td>
              <td>IE</td>
              <td>.ie</td>
            </tr>
            <tr>
              <td>폴란드</td>
              <td>PL</td>
              <td>.pl</td>
            </tr>
            <tr>
              <td>체코</td>
              <td>CZ</td>
              <td>.cz</td>
            </tr>
            <tr>
              <td>슬로바키아</td>
              <td>SK</td>
              <td>.sk</td>
            </tr>
            <tr>
              <td>헝가리</td>
              <td>HU</td>
              <td>.hu</td>
            </tr>
            <tr>
              <td>루마니아</td>
              <td>RO</td>
              <td>.ro</td>
            </tr>
            <tr>
              <td>불가리아</td>
              <td>BG</td>
              <td>.bg</td>
            </tr>
            <tr>
              <td>그리스</td>
              <td>GR</td>
              <td>.gr</td>
            </tr>
            <tr>
              <td>러시아</td>
              <td>RU</td>
              <td>.ru</td>
            </tr>
            <tr>
              <td>우크라이나</td>
              <td>UA</td>
              <td>.ua</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- 아메리카 -->
      <div class="table-container" id="america">
        <table>
          <thead>
            <tr>
              <th>국가</th>
              <th>국가코드</th>
              <th>ccTLD</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>미국</td>
              <td>US</td>
              <td>.us</td>
            </tr>
            <tr>
              <td>캐나다</td>
              <td>CA</td>
              <td>.ca</td>
            </tr>
            <tr>
              <td>멕시코</td>
              <td>MX</td>
              <td>.mx</td>
            </tr>
            <tr>
              <td>브라질</td>
              <td>BR</td>
              <td>.br</td>
            </tr>
            <tr>
              <td>아르헨티나</td>
              <td>AR</td>
              <td>.ar</td>
            </tr>
            <tr>
              <td>칠레</td>
              <td>CL</td>
              <td>.cl</td>
            </tr>
            <tr>
              <td>콜롬비아</td>
              <td>CO</td>
              <td>.co</td>
            </tr>
            <tr>
              <td>페루</td>
              <td>PE</td>
              <td>.pe</td>
            </tr>
            <tr>
              <td>베네수엘라</td>
              <td>VE</td>
              <td>.ve</td>
            </tr>
            <tr>
              <td>에콰도르</td>
              <td>EC</td>
              <td>.ec</td>
            </tr>
            <tr>
              <td>볼리비아</td>
              <td>BO</td>
              <td>.bo</td>
            </tr>
            <tr>
              <td>파라과이</td>
              <td>PY</td>
              <td>.py</td>
            </tr>
            <tr>
              <td>우루과이</td>
              <td>UY</td>
              <td>.uy</td>
            </tr>
            <tr>
              <td>가이아나</td>
              <td>GY</td>
              <td>.gy</td>
            </tr>
            <tr>
              <td>수리남</td>
              <td>SR</td>
              <td>.sr</td>
            </tr>
            <tr>
              <td>쿠바</td>
              <td>CU</td>
              <td>.cu</td>
            </tr>
            <tr>
              <td>자메이카</td>
              <td>JM</td>
              <td>.jm</td>
            </tr>
            <tr>
              <td>바하마</td>
              <td>BS</td>
              <td>.bs</td>
            </tr>
            <tr>
              <td>도미니카 공화국</td>
              <td>DO</td>
              <td>.do</td>
            </tr>
            <tr>
              <td>파나마</td>
              <td>PA</td>
              <td>.pa</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- 아프리카 -->
      <div class="table-container" id="africa">
        <table>
          <thead>
            <tr>
              <th>국가</th>
              <th>국가코드</th>
              <th>ccTLD</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>이집트</td>
              <td>EG</td>
              <td>.eg</td>
            </tr>
            <tr>
              <td>남아프리카 공화국</td>
              <td>ZA</td>
              <td>.za</td>
            </tr>
            <tr>
              <td>나이지리아</td>
              <td>NG</td>
              <td>.ng</td>
            </tr>
            <tr>
              <td>케냐</td>
              <td>KE</td>
              <td>.ke</td>
            </tr>
            <tr>
              <td>에티오피아</td>
              <td>ET</td>
              <td>.et</td>
            </tr>
            <tr>
              <td>탄자니아</td>
              <td>TZ</td>
              <td>.tz</td>
            </tr>
            <tr>
              <td>모로코</td>
              <td>MA</td>
              <td>.ma</td>
            </tr>
            <tr>
              <td>알제리</td>
              <td>DZ</td>
              <td>.dz</td>
            </tr>
            <tr>
              <td>튀니지</td>
              <td>TN</td>
              <td>.tn</td>
            </tr>
            <tr>
              <td>리비아</td>
              <td>LY</td>
              <td>.ly</td>
            </tr>
            <tr>
              <td>수단</td>
              <td>SD</td>
              <td>.sd</td>
            </tr>
            <tr>
              <td>우간다</td>
              <td>UG</td>
              <td>.ug</td>
            </tr>
            <tr>
              <td>가나</td>
              <td>GH</td>
              <td>.gh</td>
            </tr>
            <tr>
              <td>앙골라</td>
              <td>AO</td>
              <td>.ao</td>
            </tr>
            <tr>
              <td>짐바브웨</td>
              <td>ZW</td>
              <td>.zw</td>
            </tr>
            <tr>
              <td>보츠와나</td>
              <td>BW</td>
              <td>.bw</td>
            </tr>
            <tr>
              <td>나미비아</td>
              <td>NA</td>
              <td>.na</td>
            </tr>
            <tr>
              <td>모잠비크</td>
              <td>MZ</td>
              <td>.mz</td>
            </tr>
            <tr>
              <td>마다가스카르</td>
              <td>MG</td>
              <td>.mg</td>
            </tr>
            <tr>
              <td>세네갈</td>
              <td>SN</td>
              <td>.sn</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
<script>
  $(document).ready(function () {
    // 탭 클릭 이벤트
    $('.tab-item').click(function () {
      const tabId = $(this).data('tab');

      // 탭 메뉴 활성화
      $('.tab-item').removeClass('active');
      $(this).addClass('active');

      // 테이블 전환
      $('.table-container').removeClass('active');
      $(`#${tabId}`).addClass('active');

      // 페이드 효과
      $('.table-container').css('opacity', '0');
      setTimeout(() => {
        $(`#${tabId}`).css('opacity', '1');
      }, 50);
    });

    // 테이블 정렬 기능 (선택사항)
    $('th').click(function () {
      const table = $(this).parents('table').eq(0);
      const rows = table
        .find('tr:gt(0)')
        .toArray()
        .sort(compareCells($(this).index()));
      this.asc = !this.asc;
      if (!this.asc) {
        rows.reverse();
      }
      for (let i = 0; i < rows.length; i++) {
        table.append(rows[i]);
      }
    });
  });

  // 테이블 정렬 함수
  function compareCells(index) {
    return function (a, b) {
      const valA = getCellValue(a, index);
      const valB = getCellValue(b, index);
      return $.isNumeric(valA) && $.isNumeric(valB)
        ? valA - valB
        : valA.toString().localeCompare(valB);
    };
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).text();
  }
</script>
<?php
include_once(G5_PATH . '/tail.php');