<?php

/*
 * ***************************************************************
 * @tutorial: Whatsapp API
 * ***************************************************************
 * 
 * Created on 29 APRIL 2022 12:03:12 PM
 *
 * @FileName: omwpapi.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omecom_mvc
 * @version 1.0.0
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$staffId = $_SESSION['sessionStaffId'];
$sessionOwnerMobNo = $_SESSION['sessionOwnerMobNo'];
//
if ($staffId != '')
    $instanceId = $sessionOwnerId . '_' . $staffId;
else
    $instanceId = $sessionOwnerId;
//
if ($_SESSION['wa_instance_id'] != '') {
    //
    $wa_instance_id = $_SESSION['wa_instance_id'];
    //
} else {
    $querySecretKey = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$instanceId' and omly_option='whatsapp_secret_id_$instanceId'";
    //
    $resSecretKey = mysqli_query($conn, $querySecretKey);
    $rowSecretKey = mysqli_fetch_assoc($resSecretKey);
    $wa_instance_id = $rowSecretKey['omly_value'];
}
?>
<?php

//
//print_r($_SESSION);
//define("GB_OWNER_ID", "101540");
//define("GB_DB_LOGIN_ID", "light");
//define("GB_DB_SERVER", 'localhost');
//define("GB_DB_USER_NAME", 'root');
//define("GB_DB_PASSWORD", 'omrolrsr');
//define("GB_DB_NAME", 'loveras1_101540');
//define("GB_DB_PORT", '7188');
//
//$conn = new mysqli(GB_DB_SERVER, GB_DB_USER_NAME, GB_DB_PASSWORD, GB_DB_NAME, GB_DB_PORT);
//if ($conn->connect_error) {
//    die("Error in connecting with mysql : " . $conn->connect_error);
//}
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";

if ($_SESSION['sessionOwnIndStr'][33] != 'A') {
    //
    $response = 'No access for WA API';
    exit();
} else {
//
    $request_type = $_REQUEST['request_type'];
//
    if ($request_type == 'createInstance') {
        //
        $response = createInstance($conn, $instanceId);
        //echo $response;
    }
//
    if ($request_type == 'restartInstance') {
        //
        $response = restartInstance($conn, $wa_instance_id);
        //echo $response;
    }
//
    if ($request_type == 'terminateInstance') {
        //
        $response = terminateInstance($conn, $instanceId, $wa_instance_id);
        //echo $response;
    }
//
    if ($request_type == 'generateQrCode') {
        //
        $response = generateQrCode($conn, $wa_instance_id);
        echo $response;
    }
//
    if ($request_type == 'sendMessage') {
        //
        $mobileNum = $_REQUEST['mobile_num'];
        $message = $_REQUEST['message'];
        //
        $response_arr = send_wa_message($conn, $instanceId, $wa_instance_id, $mobileNum, $message, $imageUrl, $pdfUrl);

        if ($response_arr['error'] === false || $response_arr['error'] == '') {
            echo "success";
        } else {
            echo '<pre>';
            print_r($response_arr);
            echo '</pre>';
        }
    }
}

//
// Start Code to write the functions
//
//
//START CREATE INSTANCE
function createInstance($conn, $instanceId) {
    // create instance id
    $commonFieldArray = array(
        "instance_id" => "$instanceId"
    );
    //print_r($commonFieldArray);
//$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
    //print_r($post_fields_arr);
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/create_wa_api_instance');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
    $result_transaction = curl_exec($ch);
//    echo 'result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        print_r($error_msg);
    }

//    echo '<pre>';
//    print_r($result_transaction_arr);
//    echo '</pre>';

    curl_close($ch);
    //
    $secret_id = $result_transaction_arr['key'];

// $instance_id = $result_transaction_arr['instance_id'];

    if ($secret_id != '') {
        //
        $_SESSION['wa_instance_id'] = $secret_id;
        //
        $valueexists = "SELECT omly_value FROM omlayout WHERE omly_own_id='$instanceId' and omly_option='whatsapp_secret_id_$instanceId'";
        //echo $valueexists;
        $resvalueexists = mysqli_query($conn, $valueexists);
        $rowcount = mysqli_num_rows($resvalueexists);

        if ($rowcount <= 0) {
            //
            $insertkey_s = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value) VALUES('$instanceId','whatsapp_secret_id_$instanceId','$secret_id')";
            //
            if (!mysqli_query($conn, $insertkey_s)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
        } else {
            $updatekey_s = "UPDATE omlayout SET omly_value ='$secret_id' WHERE omly_option = 'whatsapp_secret_id_$instanceId' AND omly_own_id = '$instanceId' ";
            //
            if (!mysqli_query($conn, $updatekey_s)) {
                die('Error: ' . mysqli_error($conn));
            }
            // 
        }
        //generateQrCode($conn, $instanceId);
        //echo $result_transaction_arr['message'];
    } else {
        echo 'Please try again!';
    }
}

//
//START GENERATE QRCODE

function generateQrCode($conn, $wa_instance_id) {
    // Get QR Code
//    $querySecretKey = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$instanceId' and omly_option='whatsapp_secret_id_$instanceId'";
//    //echo $querySecretKey;
//    $resSecretKey = mysqli_query($conn, $querySecretKey);
//    $rowSecretKey = mysqli_fetch_assoc($resSecretKey);
//    $secretKey = $rowSecretKey['omly_value'];

    $commonFieldArray = array(
        "instance_id" => "$wa_instance_id"
    );
    //print_r($commonFieldArray);
//
//$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/get_wa_api_qr_code');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);

    $result_transaction = curl_exec($ch);
    //
    $result_transaction_arr = json_decode($result_transaction, true);
    //
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        print_r($error_msg);
    }
//    echo '<pre>';
//    print_r($result_transaction_arr);
//    echo '</pre>';

    curl_close($ch);

    echo $result_transaction_arr['qrcode'];
    //return $result_transaction_arr['qrcode'];
}

//generateQrCode(); 
//TERMINATE INSTANCE 
function terminateInstance($conn, $instanceId, $wa_instance_id) {

    $commonFieldArray = array(
        "instance_id" => "$wa_instance_id"
    );
    //print_r($commonFieldArray);
//$ mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/terminate_wa_api_instance');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
    $result_transaction = curl_exec($ch);
//    echo 'result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
//
//    echo '<pre>';
//    print_r($result_transaction_arr);
//    echo '</pre>';
//
    curl_close($ch);
    //
    //
    $deleteSecretKey = "DELETE FROM omlayout WHERE omly_own_id = '$instanceId' and omly_option='whatsapp_secret_id_$instanceId'";
    //
    if (!mysqli_query($conn, $deleteSecretKey)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    //
}

//terminateInstance();
//
// Refresh INSTANCE 
function restartInstance($conn, $instanceId) {

    $commonFieldArray = array(
        "instance_id" => "$instanceId"
    );
    //print_r($commonFieldArray);
//$ mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/restart_wa_api_instance');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
    $result_transaction = curl_exec($ch);
//    echo 'result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
//
//    echo '<pre>';
//    print_r($result_transaction_arr);
//    echo '</pre>';
//
    curl_close($ch);
}

//
// Start code to send message
function send_wa_message($conn, $instanceId, $wa_instance_id, $mobileNum, $message, $imageUrl, $pdfUrl) {
    //
    //
    //$message = stripslashes(urldecode($message));

    $commonFieldArray = array(
        "instance_id" => "$wa_instance_id",
        "instance_secret" => "$secretKey",
        "mobile_no" => "$mobileNum",
        "message" => "$message"
    );

//
    $post_fields_arr = json_encode($commonFieldArray);
//    echo '<pre>';
//    print_r($post_fields_arr);
//    echo '</pre>';
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/send_wa_api_msg');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
    $result_transaction = curl_exec($ch);
//    echo '<br/>result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
//
    curl_close($ch);
    return $result_transaction_arr;
//
}

// Start code to send message
function send_wa_pdf_file($conn, $instanceId, $wa_instance_id, $mobileNum, $message, $imageUrl, $pdfUrl) {
    //
    //
    //$message = stripslashes(urldecode($message));

    $commonFieldArray = array(
        "instance_id" => "$wa_instance_id",
        "instance_secret" => "$secretKey",
        "mobile_no" => "$mobileNum",
        "message" => "$message",
        "pdf" => "$pdfUrl"
    );

//
    $post_fields_arr = json_encode($commonFieldArray);
//    echo '<pre>';
//    print_r($post_fields_arr);
//    echo '</pre>';
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/send_wa_api_pdf_file');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
    $result_transaction = curl_exec($ch);
//    echo '<br/>result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
//
    curl_close($ch);
    return $result_transaction_arr;
//
}

?>