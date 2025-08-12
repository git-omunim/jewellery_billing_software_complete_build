<?php
/*
 * **************************************************************************************
 * @tutorial: Modal offer sms update File 
 * **************************************************************************************
 * 
 * Created on Mar 06, 2021 5:20:51 PM
 *
 * @FileName: omupdateoffersmstem.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
include 'ommpdpmsg.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';

$sessionOwnerId = $_SESSION[sessionOwnerId];
$staffId = $_SESSION['sessionStaffId'];
$userType = $_REQUEST['userType'];
$firmId = $_REQUEST['firmId'];
$interestList = $_REQUEST['interestList'];
$transactionType = $_REQUEST['transactionType'];
$userGroup = $_REQUEST['userGroup'];
$smsStaffId = $_REQUEST['smsStaffId'];
$city = $_REQUEST['city'];
$userGender = $_REQUEST['userGender'];
$smsTemplate = $_REQUEST['smsTemplate'];
$selectDate = $_REQUEST['selectDate'];

$smsTemplateQuery = "SELECT omly_value FROM omlayout WHERE omly_option = '$smsTemplate'";
$resSmsTemplateQuery = mysqli_query($conn, $smsTemplateQuery)or die("Error: " . mysqli_error($conn) . " with query " . $smsTemplateQuery);
$rowSmsTemplate = mysqli_fetch_array($resSmsTemplateQuery);
$setSmsTemplate = $rowSmsTemplate['omly_value'];
$insertUpdateQuery = "SELECT * FROM omdata WHERE omdata_user_id = '$userType' AND omdata_firm_id = '$firmId' AND omdata_panel = '$setSmsTemplate'";
$resInsertUpdateQuery = mysqli_query($conn, $insertUpdateQuery)or die("Error: " . mysqli_error($conn) . " with query " . $insertUpdateQuery);
$num_rows = mysqli_num_rows($resInsertUpdateQuery);

if($num_rows != 0) {
    $query = "UPDATE omdata SET omdata_panel = '$setSmsTemplate', omdata_option = '$interestList', omdata_value = '$transactionType', omdata_percentage = '$userGroup', omdata_input_field = '$selectDate', omdata_year = '$smsStaffId', omdata_month = '$userGender', omdata_status = '$city' WHERE omdata_firm_id = '$firmId' AND omdata_user_id = '$userType'";	
    if (!mysqli_query($conn, $query)) {
	die('Q: '.$query . '  Error: ' . mysqli_error($conn));
    }		
} else {
    $query = "INSERT INTO omdata(omdata_own_id, omdata_firm_id, omdata_user_id, omdata_panel, omdata_option, omdata_value, omdata_percentage, omdata_input_field, omdata_year, omdata_month, omdata_status) VALUES ('$sessionOwnerId', '$firmId', '$userType', '$setSmsTemplate', '$interestList', '$transactionType', '$userGroup', '$selectDate', '$smsStaffId', '$userGender', '$city')";

    if (!mysqli_query($conn, $query)) {
        die('Q: '.$query . '  Error: ' . mysqli_error($conn));
    }	
}
?>
