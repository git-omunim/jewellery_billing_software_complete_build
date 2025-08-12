<?php

/*
 * **************************************************************************
 * @tutorial: UNIVERSAL WHATSAPP MSG SENDING FILE @AUTHOR:MADHUREE-22SEP2022
 * **************************************************************************
 *
 * Created on 22 SEP, 2022 05:48:00 PM
 * 
 * @FileName: omSendWhatsApp.php
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
$mobileNo = $_REQUEST['mobileNumber'];
$msg_text = $_REQUEST['msgText'];
$imageUrl = $_REQUEST['imageURL'];
$pdfUrl = $_REQUEST['pdfURL'];
//
if ($systemOnOrOff == 'ON') {
    $whatsappUrl = 'https://' . $_SERVER['HTTP_HOST'] . "/api/whatsapp/sendmsg";
} else {
    $whatsappUrl = $_SERVER['HTTP_HOST'] . "/api/whatsapp/sendmsg";
}
//
$todaysDate = strtoupper(date("d M Y"));
//
$commonFieldArray = array(
    "ecom_own_id" => $_SESSION['sessionOwnerId'],
    "ecom_login_id" => $_SESSION['sessionUserId'],
    "api_folder" => "ommind/omunim",
    "mapi_folder" => "api_source",
    "system_onoff" => $systemOnOrOff,
    "api_login_token" => $_SESSION['api_login_token'],
    "api_prod_key" => $_SESSION['sessionOwnProdId'],
    "api_request_id" => $_SESSION['api_request_id'],
    "remote_login" => $_SESSION['api_request_id'],
    //
    "USER_DB_HOST" => $_SESSION['sessionUserDBHost'],
    "USER_DB_PORT" => $_SESSION['sessionUserDBPort'],
    "USER_DB_USER" => $_SESSION['sessionUserDBPass'],
    //
    "user_own_id" => $_SESSION['sessionOwnerId'],
    "user_own_id" => $_SESSION['sessionOwnerId'],
    "user_login_id" => $_SESSION['sessionUserId'],
    "owner_user_staff_id" => $_SESSION['sessionStaffLgnId'],
    "owner_user_password" => $_SESSION['owner_user_password'],
    //
    "whatsappApiKey" => $crmWhatsappApiKey,
    "customer_mobile_no" => $mobileNo,
    "message_body" => $msg_text,
    "image" => $imageUrl,
    "pdf" => $pdfUrl
);
//
$post_fields_arr = json_encode($commonFieldArray);
//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $whatsappUrl);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
$result_whatsapp = curl_exec($ch);
$result_whatsapp_arr = json_decode($result_whatsapp, true);
curl_close($ch);
//
//echo '<pre>';
//print_r($result_whatsapp_arr);
//echo '</pre>';
//
$result = $result_whatsapp_arr['status'];
$errormsg = $result_whatsapp_arr['errormsg'];
$statuscode = $result_whatsapp_arr['statuscode'];
$requestid = $result_whatsapp_arr['requestid'];
//
//echo '$result : ' . $result . '<br>';
//echo '$errormsg : ' . $errormsg . '<br>';
//echo '$statuscode : ' . $statuscode . '<br>';
//echo '$requestid : ' . $requestid . '<br>';
//
?>