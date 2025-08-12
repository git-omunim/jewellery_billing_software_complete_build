<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 25-Mar-2020 4:15:55 pm
 *
 * @FileName: omPhpMailer.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

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

/* Open the try/catch block. */
$custId = $_REQUEST['user_id'];
try {
//
    parse_str(getTableValues("SELECT user_fname,user_lname,user_email,user_firm_id FROM user WHERE user_id='$custId'"));
//
    $emailToName = ucfirst($user_fname) . ' ' . ucfirst($user_lname);
    $emailTo = $emailToName;
    //
//
    parse_str(getTableValues("SELECT firm_long_name,firm_smtp_server,firm_smtp_email,firm_smtp_pass,firm_smtp_port,firm_smtp_cc_email FROM firm WHERE firm_id='$user_firm_id'"));
//
    $emailFromName = $firm_long_name;
    $smtp_server = $firm_smtp_server;
    /* SMTP parameters. */
    $emailFrom = $firm_smtp_email;
    $emailPassword = $firm_smtp_pass;
    $smtpPort = $firm_smtp_port;
    $ccEmail = $firm_smtp_cc_email;
    //

    parse_str(getTableValues("SELECT acit_subject,acit_desc FROM actionitem WHERE acit_category='LOAN'"));
//    if ($emailSubject == '') {
    $emailBody = "# Dear Customer,
Your OTP for National Gold Loan is $otpCode. Please do not share this OTP.
Regards,
National Gold Loan
nationalgoldloan.com";
//     ;
    $emailSubject = $acit_subject;
  //
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
//
       $mailSentStatus = "Email sent successfully!";
//
    } else {
        if ($user_email == '')
            $mailSentStatus = 'User email address not valid or empty!';
        else if ($smtp_server == '')
            $mailSentStatus = 'Smtp server not valid or empty!';
        else if ($emailFrom == '')
            $mailSentStatus = 'Email from address not valid or empty!';
        else if ($emailPassword == '')
            $mailSentStatus = 'Email from password not valid or empty!';
        else if ($emailSubject == '')
            $mailSentStatus = 'Email subject not valid or empty!';
        else if ($emailBody == '')
           $mailSentStatus = 'Email body not valid or empty!';
    }
} catch (Exception $e) {
    $mailSentStatus = $e->errorMessage();
} catch (\Exception $e) {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    $mailSentStatus = $e->getMessage();
}
echo $mailSentStatus;
?>
