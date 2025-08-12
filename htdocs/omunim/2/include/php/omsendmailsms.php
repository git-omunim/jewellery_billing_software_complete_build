<?php
include 'system/omsachsc.php';
include_once 'ommpfndv.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
if (!isset($_SESSION)) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//echo $_SERVER['DOCUMENT_ROOT'];
//die;
/* Exception class. */
require $_SERVER['DOCUMENT_ROOT'] . '/plugin/PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require $_SERVER['DOCUMENT_ROOT'] . '/plugin/PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require $_SERVER['DOCUMENT_ROOT'] . '/plugin/PHPMailer/src/SMTP.php';

/* ... */
/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);
parse_str(getTableValues("SELECT firm_long_name,firm_long_name,firm_smtp_server,firm_smtp_email,firm_smtp_pass,firm_smtp_port,firm_smtp_cc_email FROM firm WHERE firm_id='$user_firm_id'"));
//            
$emailFromName = $firm_long_name;
$smtp_server = $firm_smtp_server;
/* SMTP parameters. */
$emailFrom = $firm_smtp_email;
$emailPassword = $firm_smtp_pass;
$smtpPort = $firm_smtp_port;
$ccEmail = $firm_smtp_cc_email;
//
$emailSubject = $firm_long_name;
$emailBody = $msgText;
//echo '$emailFromName : ' . $emailFromName . '<br>';
//echo '$smtp_server : ' . $smtp_server . '<br>';
//echo '$emailFrom : ' . $emailFrom . '<br>';
//echo '$emailPassword : ' . $emailPassword . '<br>';
//echo '$smtpPort : ' . $smtpPort . '<br>';
//echo '$ccEmail : ' . $ccEmail . '<br>';
//echo '$emailSubject : ' . $emailSubject . '<br>';
//echo '$emailBody : ' . $emailBody . '<br>';
//echo '$user_email : ' . $user_email . '<br>';
if ($user_email != '' && $smtp_server != '' && $emailFrom != '' && $emailPassword != '' && $emailBody != '') {
    /* Tells PHPMailer to use SMTP. */
    $mail->isSMTP();

    /* SMTP server address. */
    $mail->Host = $smtp_server;

    /* Use SMTP authentication. */
    $mail->SMTPAuth = TRUE;

    /* Set the encryption system. */
    $mail->SMTPSecure = 'tls';

    /* SMTP authentication username. */
    $mail->Username = $emailFrom;

    /* SMTP authentication password. */
    $mail->Password = $emailPassword;

    /* Set the SMTP port. default 587 */
    $mail->Port = $smtpPort;

    if ($ccEmail != '')
        $mail->AddCC($ccEmail);
//
    /* Set the mail sender. */
    $mail->setFrom($emailFrom, $emailFromName);

    /* Add a recipient. */
    $mail->addAddress($user_email, $emailToName);
    /* Set the subject. */

    $mail->Subject = $emailSubject;

    /* Set the mail message body. */
    $mail->Body = $emailBody;

    $mail->isHTML(true);

    /* Finally send the mail. */
    $mail->send();
}
?>