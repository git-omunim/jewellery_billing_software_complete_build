<?php

/*
 * **************************************************************************
 * @tutorial: INTERAKT WHATSAPP MSG SENDING FILE @AUTHOR:PRABHAT-17MARCH2025
 * **************************************************************************
 *
 * Created on 17 MAR, 2025 05:48:00 PM
 * 
 * @FileName: omsendinvinteraktwhtasapp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.430
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


$api_path = 'https://xzyapi.omunim.in';
    $mapi_folder = '';
    $api_folder = '';

$apiKey = $InteraktWhatsappApiKey;

// Fetch User Mobile No
$queryUserMobileNo = "SELECT user_firm_id, user_mobile FROM user WHERE user_id = '$cust_id'";
$resUserMobileNo = mysqli_query($conn, $queryUserMobileNo);
$rowUserMobileNo = mysqli_fetch_array($resUserMobileNo);
$user_firm_id = $rowUserMobileNo['user_firm_id'];
$user_mobile = $rowUserMobileNo['user_mobile'];

// Fetch Firm Details
$queryFirm = "SELECT firm_long_name, firm_phone_details, firm_website FROM firm WHERE firm_id = '$user_firm_id'";
$resFirm = mysqli_query($conn, $queryFirm);
$rowFirm = mysqli_fetch_array($resFirm);

$firm_long_name = $rowFirm['firm_long_name'];
$firm_phone_details = $rowFirm['firm_phone_details'];
$firm_website = $rowFirm['firm_website'];

// Construct Message
$msg_text = "$firm_long_name \nInvoice Details: " . strtoupper($invoice_details) . 
    "\n\nThank you for shopping with us! Hope you love our jewellery products." . 
    "\n\nFor More Offers and Help Call us: $firm_phone_details";

if (!empty($firm_website)) {
    $msg_text .= "\n\nVisit our website: $firm_website";
}

// PDF URL
$pdfUrl = ($systemOnOrOff == 'ON') ? $local_file : "https://file.omunim.in/$owner_id/$cust_id/$invoice_details.pdf";

                // API Endpoint
                
                  $url = $api_path . "/message/interakt_document_message";
          
               

// Request Body
$request = array(
    
    "ecom_domain_name" => "omunim.com",
    "api_request_type"=> "OMAPP_AUTH",
    "ecom_own_id" => $_SESSION['sessionOwnerId'],
    "user_own_id"=> $_SESSION['sessionOwnerId'],
    "ecom_login_id" => $_SESSION['sessionUserId'],
    "system_onoff" => "ON",
    "GB_DB_HOST" => $_SESSION['sessionUserDBHost'],
    "user_login_id" => $_SESSION['sessionUserId'],
    "ecom_api_key" => "",
    "api_login_token" => $_SESSION['api_login_token'],
    "api_prod_key" => $_SESSION['sessionOwnProdId'],
    "api_request_id" => $_SESSION['api_request_id'],
    "api_folder" => "$api_folder",
    "mapi_folder" => "$mapi_folder",
    "remote_login" => "",
    "GB_DB_PORT" => "3306",
    "GB_DB_USER" => "",
    "USER_DB_HOST" => "",
    "USER_DB_PORT" => "",
    "USER_DB_USER" => "",
    "owner_login_id" => $_SESSION['sessionUserId'],
    "owner_user_password" => "",
    
    "countryCode" => "+91",
    "phoneNumber" => $user_mobile,
    "callbackData" => "Transaction",
    "apiKey" => $apiKey,
    "type" => "Template",
    "template" => array(
        "name" => "hug_ring",
        "languageCode" => "en",
        "headerValues" => array($pdfUrl),
        "fileName" => "Invoice.pdf",
    )
);

$post_fields_arr = json_encode($request);

$headers = array(
        "Content-Type: application/json"
    );

// Curl execution
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);
    

// Handle API Response
if ($response === false) {

    die("cURL Error: " . $curlError);
} else {
    $result_whatsapp_arr = json_decode($response, true);
    $whatsAppStatus = isset($result_whatsapp_arr['error']) && $result_whatsapp_arr['error'] ? 
        "Error in sending Invoice! " . $result_whatsapp_arr['message'] : 
        "Message Sent Successfully!";
}


?>
