<?php
if (!defined('_GNUBOARD_'))
    exit;

// 짧은 주소 형식으로 만들어서 가져온다.
function get_pretty_url($folder, $no = '', $query_string = '', $action = '')
{
    global $g5, $config;

    $boards = get_board_names();
    $segments = array();
    $url = $add_query = '';

    if ($url = run_replace('get_pretty_url', $url, $folder, $no, $query_string, $action)) {
        return $url;
    }

    // use shortten url
    if ($config['cf_bbs_rewrite']) {

        $segments[0] = G5_URL;

        if (in_array($folder, $boards)) {     // 게시판

            $segments[1] = $folder;

            if ($no) {

                if ($config['cf_bbs_rewrite'] > 1) {

                    $get_write = get_write($g5['write_prefix'] . $folder, $no, true);

                    $segments[2] = (isset($get_write['wr_seo_title']) && $get_write['wr_seo_title']) ? urlencode($get_write['wr_seo_title']) . '/' : urlencode($no);

                } else {
                    $segments[2] = urlencode($no);
                }

            } else if ($action) {
                $segments[2] = urlencode($action);
            }

        } else {
            $segments[1] = $folder;
            if ($no) {
                $no_array = explode("=", $no);
                $no_value = end($no_array);
                $segments[2] = urlencode($no_value);
            }
        }

        if ($query_string) {
            // If the first character of the query string is '&', replace it with '?'.
            if (substr($query_string, 0, 1) == '&') {
                $add_query = preg_replace("/\&amp;/", "?", $query_string, 1);
            } else {
                $add_query = '?' . $query_string;
            }
        }

    } else { // don't use shortten url
        if (in_array($folder, array('notice', 'faq', 'gallery'))) {
            // 고객센터 항목 예외처리
            $url = G5_COMMUNITY_URL . '/' . $folder . '.php?bo_table=' . $folder;
            if ($no) {
                $url .= '&amp;wr_id=' . $no;
            }
            if ($query_string) {
                if (substr($query_string, 0, 1) !== '&') {
                    $url .= '&amp;';
                }

                $url .= $query_string;
            }
        } else if ($folder === 'portfolio') {
            // 포트폴리오 항목 예외처리
            $url = G5_URL . '/' . $folder . '.php?bo_table=' . $folder;
            if ($no) {
                $url .= '&amp;wr_id=' . $no;
            }
            if ($query_string) {
                if (substr($query_string, 0, 1) !== '&') {
                    $url .= '&amp;';
                }

                $url .= $query_string;
            }
            // 사실상 아래는 안타는 부분
            // } else if (in_array($folder, $boards)) {
            //     $url = G5_BBS_URL . '/board.php?bo_table=' . $folder;
            //     if ($no) {
            //         $url .= '&amp;wr_id=' . $no;
            //     }
            //     if ($query_string) {
            //         if (substr($query_string, 0, 1) !== '&') {
            //             $url .= '&amp;';
            //         }

            //         $url .= $query_string;
            //     }
        } else {
            $url = G5_URL . '/' . $folder . '.php';
            if ($no) {
                $url .= ($folder === 'content') ? '?co_id=' . $no : '?' . $no;
            }
            if ($query_string) {
                $url .= (!$no ? '?' : '&amp;') . $query_string;
            }
        }

        $segments[0] = $url;
    }

    return implode('/', $segments) . $add_query;
}

function short_url_clean($string_url, $add_qry = '')
{

    global $config, $g5;

    if (isset($config['cf_bbs_rewrite']) && $config['cf_bbs_rewrite']) {

        $string_url = str_replace('&amp;', '&', $string_url);
        $url = parse_url($string_url);
        $page_name = isset($url['path']) ? basename($url['path'], ".php") : '';

        $array_page_names = run_replace('url_clean_page_names', array('notice', 'faq', 'portfolio', 'gallery', 'write'));

        if (
            stripos(preg_replace('/^https?:/i', '', $string_url), preg_replace('/^https?:/i', '', G5_COMMUNITY_URL)) === false
            && stripos(preg_replace('/^https?:/i', '', $string_url), preg_replace('/^https?:/i', '', G5_URL . '/portfolio.php')) === false
            || !in_array($page_name, $array_page_names)
        ) {   //게시판(포트폴리오, 공지사항, 자주 하시는 질문, 갤러리)이 아니면 리턴
            return run_replace('false_short_url_clean', $string_url, $url, $page_name, $array_page_names);
        }

        $return_url = '';
        parse_str($url['query'], $vars);

        /*
        // 예) Array ( [scheme] => http [host] => sir.kr [path] => /bbs/board.php [query] => wr_id=1110870&bo_table=cm_free&cpage=1 [fragment] => c_1110946 )
        foreach($vars as $k => $v) { $page_name .= "/".$v; }
        */

        if ($page_name === 'write') {
            $vars['action'] = 'write';
            $allow_param_keys = array('bo_table' => '', 'action' => '');
        } else {
            $allow_param_keys = array('bo_table' => '', 'wr_id' => '');
        }

        $s = array();

        foreach ($allow_param_keys as $key => $v) {
            if (!isset($vars[$key]) || empty($vars[$key]))
                continue;

            $s[$key] = $vars[$key];
        }

        if ($config['cf_bbs_rewrite'] > 1 && in_array($page_name, ['notice', 'faq', 'portfolio', 'gallery']) && (isset($s['wr_id']) && $s['wr_id']) && (isset($s['bo_table']) && $s['bo_table'])) {
            $get_write = get_write(get_write_table_name($s['bo_table']), $s['wr_id'], true);

            if ($get_write['wr_seo_title']) {
                unset($s['wr_id']);
                $s['wr_seo_title'] = urlencode($get_write['wr_seo_title']) . '/';
            }
        }

        $fragment = isset($url['fragment']) ? '#' . $url['fragment'] : '';

        $host = G5_URL;

        if (isset($url['host'])) {

            $array_file_paths = run_replace('url_clean_page_paths', array('/' . G5_COMMUNITY_DIR . '/notice.php', '/' . G5_COMMUNITY_DIR . '/gallery.php', '/' . G5_COMMUNITY_DIR . '/faq.php', '/portfolio.php', '/' . G5_COMMUNITY_DIR . '/write.php'));

            $str_path = isset($url['path']) ? $url['path'] : '';
            $http = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
            $port = (isset($url['port']) && ($url['port'] !== 80 || $url['port'] !== 443)) ? ':' . $url['port'] : '';
            $host = $http . $url['host'] . $port . str_replace($array_file_paths, '', $str_path);
        }

        $add_param = '';

        if ($result = array_diff_key($vars, $allow_param_keys)) {
            $add_param = '?' . http_build_query($result, '', '&amp;');
        }

        if ($add_qry) {
            $add_param .= $add_param ? '&amp;' . $add_qry : '?' . $add_qry;
        }

        foreach ($s as $k => $v) {
            $return_url .= '/' . $v;
        }

        return $host . $return_url . $add_param . $fragment;
    }

    return $string_url;
}

function correct_goto_url($url)
{

    if (substr($url, -1) !== '/') {
        return $url . '/';
    }

    return $url;
}

function generate_seo_title($string, $wordLimit = G5_SEO_TITLE_WORD_CUT)
{
    $separator = '-';

    if ($wordLimit != 0) {
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }

    $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;' => '',
        '[^\w\d _-]' => '',
        '\s+' => $separator,
        '(' . $quoteSeparator . ')+' => $separator
    );

    $string = strip_tags($string);

    if (function_exists('mb_convert_encoding')) {
        $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
    }

    foreach ($trans as $key => $val) {
        $string = preg_replace('#' . $key . '#iu', $val, $string);
    }

    $string = strtolower($string);

    return trim(trim($string, $separator));
}

function exist_seo_url($type, $seo_title, $write_table, $sql_id = 0)
{
    global $g5;

    $exists_title = '';
    $sql_id = preg_replace('/[^a-z0-9_\-]/i', '', $sql_id);
    // 영카트 상품코드의 경우 - 하이픈이 들어가야 함

    if ($type === 'community') {
        $sql = "select wr_seo_title FROM {$write_table} WHERE wr_seo_title = '" . sql_real_escape_string($seo_title) . "' AND wr_id <> '$sql_id' limit 1";
        $row = sql_fetch($sql);

        $exists_title = isset($row['wr_seo_title']) ? $row['wr_seo_title'] : '';

    } else if ($type === 'content') {

        $sql = "select co_seo_title FROM {$write_table} WHERE co_seo_title = '" . sql_real_escape_string($seo_title) . "' AND co_id <> '$sql_id' limit 1";
        $row = sql_fetch($sql);

        $exists_title = isset($row['co_seo_title']) ? $row['co_seo_title'] : '';

    } else {
        return run_replace('exist_check_seo_title', $seo_title, $type, $write_table, $sql_id);
    }

    if ($exists_title)
        return 'is_exists';
    else
        return '';
}

function check_case_exist_title($data, $case = G5_COMMUNITY_DIR, $is_redirect = false)
{
    global $config, $g5, $board;

    if ((int) $config['cf_bbs_rewrite'] !== 2) {
        return;
    }

    $seo_title = '';
    $redirect_url = '';

    if ($case == G5_COMMUNITY_DIR && isset($data['wr_seo_title'])) {
        $db_table = $g5['write_prefix'] . $board['bo_table'];

        if (exist_seo_url($case, $data['wr_seo_title'], $db_table, $data['wr_id'])) {
            $seo_title = $data['wr_seo_title'] . '-' . $data['wr_id'];
            $sql = " update `{$db_table}` set wr_seo_title = '" . sql_real_escape_string($seo_title) . "' where wr_id = '{$data['wr_id']}' ";
            sql_query($sql, false);

            get_write($db_table, $data['wr_id'], false);
            $redirect_url = get_pretty_url($board['bo_table'], $data['wr_id']);
        }
    } else if (defined('G5_SHOP_DIR') && $case == G5_SHOP_DIR && isset($data['it_seo_title'])) {
        $db_table = $g5['g5_shop_item_table'];
    }

    if ($is_redirect && $seo_title && $redirect_url) {
        goto_url($redirect_url);
    }
}

function exist_seo_title_recursive($type, $seo_title, $write_table, $sql_id = 0)
{
    static $count = 0;

    $seo_title_add = ($count > 0) ? utf8_strcut($seo_title, 100000 - ($count + 1), '') . "-$count" : $seo_title;

    if (!exist_seo_url($type, $seo_title_add, $write_table, $sql_id)) {
        return $seo_title_add;
    }

    $count++;

    if ($count > 99998) {
        return $seo_title_add;
    }

    return exist_seo_title_recursive($type, $seo_title, $write_table, $sql_id);
}

function seo_title_update($db_table, $pk_id, $type = 'community')
{

    global $g5;

    $pk_id = (int) $pk_id;

    if ($type === 'community') {

        $write = get_write($db_table, $pk_id, true);
        if (!(isset($write['wr_seo_title']) && $write['wr_seo_title']) && (isset($write['wr_subject']) && $write['wr_subject'])) {
            $wr_seo_title = exist_seo_title_recursive('community', generate_seo_title($write['wr_subject']), $db_table, $pk_id);

            $sql = " update `{$db_table}` set wr_seo_title = '{$wr_seo_title}' where wr_id = '{$pk_id}' ";
            sql_query($sql);
        }
    }
}

function get_nginx_conf_rules($return_string = false)
{
    $get_path_url = parse_url(G5_URL);
    $base_path = isset($get_path_url['path']) ? $get_path_url['path'] . '/' : '/';

    $rules = array();
    $rules[] = '#### ' . G5_VERSION . ' nginx rules BEGIN #####';

    if ($add_rules = run_replace('add_nginx_conf_pre_rules', '', $get_path_url, $base_path, $return_string)) {
        $rules[] = $add_rules;
    }

    $rules[] = 'if (!-e $request_filename) {';

    if ($add_rules = run_replace('add_nginx_conf_rules', '', $get_path_url, $base_path, $return_string)) {
        $rules[] = $add_rules;
    }

    $rules[] = "rewrite ^{$base_path}(portfolio)$ {$base_path}portfolio.php?bo_table=$1&rewrite=1 break;";
    $rules[] = "rewrite ^{$base_path}([0-9a-zA-Z_]+)$ {$base_path}" . G5_COMMUNITY_DIR . "/$1.php?bo_table=$1&rewrite=1 break;";
    $rules[] = "rewrite ^{$base_path}([0-9a-zA-Z_]+)/write$ {$base_path}" . G5_COMMUNITY_DIR . "/write.php?bo_table=$1&rewrite=1 break;";
    $rules[] = "rewrite ^{$base_path}([0-9a-zA-Z_]+)/([^/]+)/$ {$base_path}" . G5_COMMUNITY_DIR . "/$1.php?bo_table=$1&wr_seo_title=$2&rewrite=1 break;";
    $rules[] = "rewrite ^{$base_path}([0-9a-zA-Z_]+)/([0-9]+)$ {$base_path}" . G5_COMMUNITY_DIR . "/$1.php?bo_table=$1&wr_id=$2&rewrite=1 break;";
    $rules[] = '}';
    $rules[] = '#### ' . G5_VERSION . ' nginx rules END #####';

    return $return_string ? implode("\n", $rules) : $rules;
}

function get_mod_rewrite_rules($return_string = false)
{
    $get_path_url = parse_url(G5_URL);
    $base_path = isset($get_path_url['path']) ? $get_path_url['path'] . '/' : '/';

    $rules = array();
    $rules[] = '#### 기본 보안 설정 ####';
    $rules[] = 'Options -Indexes';
    $rules[] = '#### ' . G5_VERSION . ' rewrite BEGIN #####';
    $rules[] = '<IfModule mod_rewrite.c>';
    $rules[] = 'RewriteEngine On';
    $rules[] = 'RewriteBase ' . $base_path;

    if ($add_rules = run_replace('add_mod_rewrite_pre_rules', '', $get_path_url, $base_path, $return_string)) {
        $rules[] = $add_rules;
    }

    $rules[] = '';
    $rules[] = '#### 파일과 디렉토리가 존재하는 경우 리다이렉션 하지 않음 ####';
    $rules[] = 'RewriteCond %{REQUEST_FILENAME} -f [OR]';
    $rules[] = 'RewriteCond %{REQUEST_FILENAME} -d';
    $rules[] = 'RewriteRule ^ - [L]';

    if ($add_rules = run_replace('add_mod_rewrite_rules', '', $get_path_url, $base_path, $return_string)) {
        $rules[] = $add_rules;
    }

    $rules[] = '';
    $rules[] = '#### 게시판 리다이렉트 규칙 추가 ####';
    $rules[] = "RewriteRule ^portfolio$ portfolio.php?bo_table=portfolio&rewrite=1 [QSA,L] ### 포트폴리오 ###";
    $rules[] = "RewriteRule ^([0-9a-zA-Z_]+)$ " . G5_COMMUNITY_DIR . "/$1.php?bo_table=$1&rewrite=1 [QSA,L] ### 공지사항, 갤러리, 자주 하시는 질문 ###";
    $rules[] = "RewriteRule ^([0-9a-zA-Z_]+)/write$ " . G5_COMMUNITY_DIR . "/write.php?bo_table=$1&rewrite=1 [QSA,L] ### 글쓰기 ###";
    $rules[] = "RewriteRule ^([0-9a-zA-Z_]+)/([^/]+)/$ " . G5_COMMUNITY_DIR . "/$1.php?bo_table=$1&wr_seo_title=$2&rewrite=1 [QSA,L]";
    $rules[] = "RewriteRule ^([0-9a-zA-Z_]+)/([0-9]+)$ " . G5_COMMUNITY_DIR . "/$1.php?bo_table=$1&wr_id=$2&rewrite=1 [QSA,L] ### 상세화면 ###";
    $rules[] = '</IfModule>';
    $rules[] = '#### ' . G5_VERSION . ' rewrite END #####';

    return $return_string ? implode("\n", $rules) : $rules;
}

function check_need_rewrite_rules()
{
    $is_apache = (stripos($_SERVER['SERVER_SOFTWARE'], 'apache') !== false);

    if ($is_apache) {
        $save_path = G5_PATH . '/.htaccess';

        if (!file_exists($save_path)) {
            return true;
        }

        $rules = get_mod_rewrite_rules();

        $bof_str = $rules[0];
        $eof_str = end($rules);

        $code = file_get_contents($save_path);

        if (strpos($code, $bof_str) === false || strpos($code, $eof_str) === false) {
            return true;
        }
    }

    return false;
}

function update_rewrite_rules()
{

    $is_apache = (stripos($_SERVER['SERVER_SOFTWARE'], 'apache') !== false);

    if (!$is_apache)
        return false;

    // $save_path = G5_PATH . '/.htaccess';

    // if ((!file_exists($save_path) && is_writable(G5_PATH)) || is_writable($save_path)) {

    //     $rules = get_mod_rewrite_rules();

    //     $bof_str = $rules[0];
    //     $eof_str = end($rules);

    //     if (file_exists($save_path)) {
    //         $code = file_get_contents($save_path);

    //         if ($code && strpos($code, $bof_str) !== false && strpos($code, $eof_str) !== false) {
    //             return true;
    //         }
    //     }

    //     $fp = fopen($save_path, "ab");
    //     flock($fp, LOCK_EX);

    //     $rewrite_str = implode("\n", $rules);

    //     fwrite($fp, "\n");
    //     fwrite($fp, $rewrite_str);
    //     fwrite($fp, "\n");

    //     flock($fp, LOCK_UN);
    //     fclose($fp);

    //     return true;
    // }
    $save_path = G5_PATH . '/.htaccess';
    $rules = get_mod_rewrite_rules();

    // 규칙이 비어있으면 처리하지 않음
    if (empty($rules))
        return false;

    $bof_str = $rules[0];
    $eof_str = end($rules);

    try {
        // 기존 파일 내용 읽기
        $current_content = '';
        if (file_exists($save_path)) {
            $current_content = file_get_contents($save_path);

            // 기존 규칙 삭제
            if ($current_content && strpos($current_content, $bof_str) !== false && strpos($current_content, $eof_str) !== false) {
                $pattern = '/' . preg_quote($bof_str, '/') . '.*?' . preg_quote($eof_str, '/') . '/s';
                $current_content = preg_replace($pattern, '', $current_content);
            }
        }

        // 새 규칙 작성
        $rewrite_str = implode("\n", $rules);

        // 파일 쓰기 (w+ 모드 사용)
        if ($fp = fopen($save_path, 'w+')) {
            flock($fp, LOCK_EX);

            // 기존 내용 + 새 규칙 쓰기
            $content = trim($current_content) . "\n\n" . $rewrite_str . "\n";
            $result = fwrite($fp, $content);

            flock($fp, LOCK_UN);
            fclose($fp);

            if ($result === false) {
                throw new Exception('Failed to write .htaccess file');
            }

            // 파일 권한 설정
            chmod($save_path, 0644);

            return true;
        }

    } catch (Exception $e) {
        // 에러 로깅 추가
        error_log('htaccess update failed: ' . $e->getMessage());
        return false;
    }

    return false;
}