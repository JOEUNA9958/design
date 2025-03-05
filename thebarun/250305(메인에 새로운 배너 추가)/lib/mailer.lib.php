<?php
if (!defined('_GNUBOARD_'))
    exit;

include_once(G5_PHPMAILER_PATH . '/PHPMailerAutoload.php');

// 메일 보내기 (파일 여러개 첨부 가능)
// type : text=0, html=1, text+html=2
function mailer($fname, $fmail, $to, $subject, $content, $type = 0, $file = "", $cc = "", $bcc = "")
{
    global $config;
    global $g5;

    if ($type != 1)
        $content = nl2br($content);

    $result = run_replace('mailer', $fname, $fmail, $to, $subject, $content, $type, $file, $cc, $bcc);

    if (is_array($result) && isset($result['return'])) {
        return $result['return'];
    }

    $mail_send_result = false;

    try {
        $mail = new PHPMailer(); // defaults to using php "mail()"
        if ($config['cf_smtp']) {
            // $mail->IsSMTP(); // telling the class to use SMTP
            // $mail->Host = G5_SMTP; // SMTP server
            // if(defined('G5_SMTP_PORT') && G5_SMTP_PORT)
            //     $mail->Port = G5_SMTP_PORT;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = $config['cf_smtp_secure'];
            $mail->Host = $config['cf_smtp'];
            $mail->Port = $config['cf_smtp_port'];
            $mail->Username = $config['cf_smtp_user'];

            $decrypted_smtp_pw = decrypt_string($config['cf_smtp_pw'], $config['cf_smtp_key']);
            $mail->Password = $decrypted_smtp_pw;
        }
        $mail->CharSet = 'UTF-8';
        $mail->From = $fmail;
        $mail->FromName = $fname;
        $mail->Subject = $subject;
        $mail->AltBody = ""; // optional, comment out and test
        $mail->msgHTML($content);
        $mail->addAddress($to);
        if ($cc)
            $mail->addCC($cc);
        if ($bcc)
            $mail->addBCC($bcc);
        //print_r2($file); exit;
        if ($file != "") {
            foreach ($file as $f) {
                $mail->addAttachment($f['path'], $f['name']);
            }
        }

        $mail = run_replace('mail_options', $mail, $fname, $fmail, $to, $subject, $content, $type, $file, $cc, $bcc);

        $mail_send_result = $mail->send();

    } catch (Exception $e) {
    }

    run_event('mail_send_result', $mail_send_result, $mail, $to, $cc, $bcc);

    return $mail_send_result;
}

// 파일을 첨부함
function attach_file($filename, $tmp_name)
{
    // 서버에 업로드 되는 파일은 확장자를 주지 않는다. (보안 취약점)
    $dest_file = G5_DATA_PATH . '/tmp/' . str_replace('/', '_', $tmp_name);
    move_uploaded_file($tmp_name, $dest_file);
    $tmpfile = array("name" => $filename, "path" => $dest_file);
    return $tmpfile;
}