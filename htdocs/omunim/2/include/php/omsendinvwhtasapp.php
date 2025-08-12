<?php

/*
 * **************************************************************************
 * @tutorial: UNIVERSAL WHATSAPP MSG SENDING FILE @AUTHOR:MADHUREE-22SEP2022
 * **************************************************************************
 *
 * Created on 22 SEP, 2022 05:48:00 PM
 * 
 * @FileName: omsendinvwhtasapp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.184
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 * Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON: 
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommprspc.php';
$accFileName = $currentFileName;
include 'ommpemac.php';
?>
<?php

//
$querycrmWhatsappApiKey = "SELECT omly_value FROM omlayout WHERE omly_option = 'crmWhatsappApiKey'";
$rescrmWhatsappApiKey = mysqli_query($conn, $querycrmWhatsappApiKey);
$rowcrmWhatsappApiKey = mysqli_fetch_array($rescrmWhatsappApiKey);
$crmWhatsappApiKey = $rowcrmWhatsappApiKey['omly_value'];
//
$queryUserMobileNo = "SELECT user_firm_id,user_mobile FROM user WHERE user_id = '$cust_id'";
$resUserMobileNo = mysqli_query($conn, $queryUserMobileNo);
$rowUserMobileNo = mysqli_fetch_array($resUserMobileNo);
$user_firm_id = $rowUserMobileNo['user_firm_id'];
$user_mobile = $rowUserMobileNo['user_mobile'];
//
if ($invoiceDate != '' && $slPrPreInvoiceNo != '' && $slPrInvoiceNo != '') {
    //
    $queryUtinFirmId = "SELECT utin_firm_id FROM user_transaction_invoice WHERE utin_date = '$invoiceDate' and utin_pre_invoice_no='$slPrPreInvoiceNo' and utin_invoice_no='$slPrInvoiceNo'";
//    echo '$queryUtinFirmId:' . $queryUtinFirmId;
//    die;
    $resUtinFirmId = mysqli_query($conn, $queryUtinFirmId);
    $rowUtinFirmId = mysqli_fetch_array($resUtinFirmId);
    $user_firm_id = $rowUtinFirmId['utin_firm_id'];
}
//
$queryFirm = "SELECT firm_long_name, firm_phone_details, firm_website FROM firm WHERE firm_id = '$user_firm_id'";
$resFirm = mysqli_query($conn, $queryFirm);
$rowFirm = mysqli_fetch_array($resFirm);
//
$firm_long_name = $rowFirm['firm_long_name'];
$firm_phone_details = $rowFirm['firm_phone_details'];
$firm_website = $rowFirm['firm_website'];
//
$custId = $cust_id;
$mobileNo = $user_mobile;
$msg_text = $firm_long_name . ' \nInvoice Details : ' . strtoupper($invoice_details)
        . '\n\nThank you for shopping with us! Hope you love our jewellery products.'
        . '\n\nFor More Offers and Help Call us: ' . $firm_phone_details;
if ($firm_website != '') {
    $msg_text = $msg_text . '\n\nVisit our website: ' . $firm_website;
}
$msg_text = urlencode($msg_text);
//
//if ($invmessageText) {
//    $msg_text = $invmessageText . strtoupper($invoice_details);
//} else {
//    $msg_text = 'Invoice Details :' . strtoupper($invoice_details);
//}
$imageUrl = '';
if ($systemOnOrOff == 'ON') {
    //
    $pdfUrl = $local_file;
} else {
    $pdfUrl = 'https://file.omunim.in/' . $owner_id . '/' . $cust_id . '/' . $invoice_details . '.pdf';
}
//
//echo '$pdfUrl : ' . $pdfUrl . '<br>';
//
include 'omwpapi.php';
$result_whatsapp_arr = send_wa_pdf_file($conn, $instanceId, $wa_instance_id, $mobileNo, $msg_text, $imageUrl, $pdfUrl);
//
//
//
//if ($systemOnOrOff == 'ON') {
//    $whatsappUrl = 'https://xzyapi.omunim.in/whatsapp/send_wa_api_msg';
//} else {
//    $whatsappUrl = 'https://xzyapi.omunim.in/whatsapp/send_wa_api_msg';
//}
////
//$commonFieldArray = array(
//    "ecom_own_id" => $_SESSION['sessionOwnerId'],
//    "ecom_login_id" => $_SESSION['sessionUserId'],
//    "api_folder" => "",
//    "mapi_folder" => "mapi",
//    "system_onoff" => $systemOnOrOff,
//    "api_login_token" => $_SESSION['api_login_token'],
//    "api_prod_key" => $_SESSION['sessionOwnProdId'],
//    "api_request_id" => $_SESSION['api_request_id'],
//    "remote_login" => $_SESSION['api_request_id'],
//    //
//    "USER_DB_HOST" => $_SESSION['sessionUserDBHost'],
//    "USER_DB_PORT" => $_SESSION['sessionUserDBPort'],
//    "USER_DB_USER" => $_SESSION['sessionUserDBPass'],
//    //
//    "user_own_id" => $_SESSION['sessionOwnerId'],
//    "user_own_id" => $_SESSION['sessionOwnerId'],
//    "user_login_id" => $_SESSION['sessionUserId'],
//    "owner_user_staff_id" => $_SESSION['sessionStaffLgnId'],
//    "owner_user_password" => $_SESSION['owner_user_password'],
//    //
//    "instance_id" => 'onlinemunim',
//    "instance_secret" => '1720747611218fa2a751d5b2e1b39f9b',
//    "mobile_no" => $mobileNo,
//    "message" => $msg_text,
//    "image" => $imageUrl,
//    "pdf" => $pdfUrl
//);
////
////echo print_r($commonFieldArray);die;
//$post_fields_arr = json_encode($commonFieldArray);
////
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $whatsappUrl);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//$result_whatsapp = curl_exec($ch);
//$result_whatsapp_arr = json_decode($result_whatsapp, true);
//curl_close($ch);
////
$result = $result_whatsapp_arr['error'];
$resultMessage = $result_whatsapp_arr['message'];
$errormsg = $result_whatsapp_arr['errormsg'];
$statuscode = $result_whatsapp_arr['statuscode'];
$requestid = $result_whatsapp_arr['requestid'];
//
//echo '<pre>';
//print_r($result_whatsapp_arr);
//echo '</pre>';
//echo '$result : ' . $result . '<br>';
//echo '$errormsg : ' . $errormsg . '<br>';
//echo '$statuscode : ' . $statuscode . '<br>';
//echo '$requestid : ' . $requestid . '<br>';
//die;
//
if ($result === false || $result == '') {
    $whatsAppStatus = 'Message Sent Successfully!';
} else if ($errormsg == 'Insufficiant balance') {
    $whatsAppStatus = 'Insufficiant whatsapp credit balance!';
} else {
    $whatsAppStatus = 'Error in sending Invoice! ' . $result;
}
//
?>