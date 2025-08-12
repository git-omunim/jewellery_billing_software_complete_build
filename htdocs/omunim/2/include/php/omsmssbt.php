<?php

/*
 * **************************************************************************************
 * @tutorial: Sent SMS by Template Id
 * **************************************************************************************
 * 
 * Created on Oct 15, 2014 12:41:20 PM
 *
 * @FileName: omsmssbt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
?>
<?php

$smsTemplateId = $_POST['smsTemplateId'];
$userId = $_POST['userId'];
$userType = $_POST['userType'];
$itemId = $_POST['itemId'];
$itemType = $_POST['itemType'];
$amount1 = $_POST['amount1'];
$amount2 = $_POST['amount2'];
$amount3 = $_POST['amount3'];
$amount4 = $_POST['amount4'];

if ($smsTemplateId == '') {
    $smsTemplateId = $_GET['smsTemplateId'];
    $userId = $_GET['userId'];
    $userType = $_GET['userType'];
    $itemId = $_GET['itemId'];
    $itemType = $_GET['itemType'];
}

if ($smsTemplateId != NULL || $smsTemplateId != '') {
    $qSelSmsTemp = "SELECT smtp_sub,smtp_text,smtp_type FROM sms_templates 
    where smtp_own_id='$_SESSION[sessionOwnerId]' and smtp_sub='$smsTemplateId'";
    $resSmsTemp = mysqli_query($conn,$qSelSmsTemp);
    $rowSmsTemp = mysqli_fetch_array($resSmsTemp, MYSQLI_ASSOC);
	$smtpSub = $rowSmsTemp['smtp_sub'];		// Added line for sms template sub @Author: Vishal 12APR21
    $smtpText = $rowSmsTemp['smtp_text'];
    $smtpType = $rowSmsTemp['smtp_type'];

    if ($userType == 'customer') {
        parse_str(getTableValues("SELECT cust_fname,cust_lname,cust_father_name,cust_city,cust_mobile FROM customer 
                where cust_owner_id='$_SESSION[sessionOwnerId]' and cust_id='$userId'"));
    }

    if ($itemType == 'loan') {
        parse_str(getTableValues("SELECT girv_firm_id,girv_pre_serial_num,girv_serial_num,girv_DOB,girv_main_prin_amt,girv_ROI 
                FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_id='$itemId'"));

        $qSelAllGirviItem = "SELECT girv_itm_metal_type,girv_itm_name,girv_itm_gross_weight,girv_itm_tunch_id FROM girvi_items 
        where girv_itm_girv_id='$itemId' and girv_itm_upd_sts!='Deleted'";
        $resAllGirviItem = mysqli_query($conn,$qSelAllGirviItem);
        while ($rowAllGirviItem = mysqli_fetch_array($resAllGirviItem, MYSQLI_ASSOC)) {
            $itemNameStr .= $rowAllGirviItem['girv_itm_name'] . ',';
            $itemTypeStr .= $rowAllGirviItem['girv_itm_metal_type'] . ',';
            $grossItemWeightStr .= $rowAllGirviItem['girv_itm_gross_weight'] . " " . $rowAllGirviItem['girv_itm_gross_weight_type'] . ',';
            $itemTunchStr .= $rowAllGirviItem['girv_itm_tunch_id'] . ',';
        }
        $itemNameStr = substr($itemNameStr, 0, -1);
        $itemTypeStr = substr($itemTypeStr, 0, -1);
        $grossItemWeightStr = substr($grossItemWeightStr, 0, -1);
        $itemTunchStr = substr($itemTunchStr, 0, -1);

        if ($amount1 != '' || $amount1 != NULL) {
            $totalPrincipalAmt = $amount1;
        }
        if ($amount2 != '' || $amount2 != NULL) {
            $totalIntAmt = $amount2;
        }
        if ($amount3 != '' || $amount3 != NULL) {
            $totalAmt = $amount3;
        }
        if ($amount4 != '' || $amount4 != NULL) {
            $amount = $amount4;
        }
    }

    parse_str(getTableValues("SELECT firm_long_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' and 
            firm_id='$girv_firm_id'"));

    $smtpText = str_replace("FIRM_SHOP_NAME", "$firm_long_name", $smtpText);

    $smtpText = str_replace("CUST_NAME", "$cust_fname", $smtpText);
    $smtpText = str_replace("CUST_MOBNO", "$cust_mobile", $smtpText);
    $smtpText = str_replace("CUST_CO_NAME", "$cust_father_name", $smtpText);
    $smtpText = str_replace("CUST_CITY", "$cust_city", $smtpText);

    $smtpText = str_replace("S_NO", "$girv_pre_serial_num $girv_serial_num", $smtpText);
    $smtpText = str_replace("LOAN_DATE", "$girv_DOB", $smtpText);
    $smtpText = str_replace("PRINCIPAL_AMT", "$girv_main_prin_amt", $smtpText);
    $smtpText = str_replace("INTEREST_RATE", "$girv_ROI", $smtpText);

    $smtpText = str_replace("METAL_TYPE", "$itemTypeStr", $smtpText);
    $smtpText = str_replace("ITEM_NAME", "$itemNameStr", $smtpText);
    $smtpText = str_replace("ITEM_WEIGHT", "$grossItemWeightStr", $smtpText);
    $smtpText = str_replace("ITEM_PURITY", "$itemTunchStr", $smtpText);

    $smtpText = str_replace("TOTAL_PRINCIPAL", "$totalPrincipalAmt", $smtpText);
    $smtpText = str_replace("TOTAL_INTEREST", "$totalIntAmt", $smtpText);
    $smtpText = str_replace("TOTAL_AMOUNT", "$totalAmt", $smtpText);
    $smtpText = str_replace("FINAL_AMOUNT", "$amount", $smtpText);

   echo  $smtpText = str_replace("TODAY_DATE", date('d M Y'), $smtpText);
exit;
    $mobileNo = trim($cust_mobile);
    if ($mobileNo != NULL && $mobileNo != '' && strlen($mobileNo) == 10) {
        // Start Code to include SMS API
        $messType = $smtpType;
        $mobileNo = $mobileNo;
        $msgText = $smtpText;
		$smsTemplateId = $smtpSub;	// Added variable for sms template sub @Author: Vishal 12APR21
        include 'omsmsapi.php';                     // $omSMSResult //Output FLASE SUCCESS FAIL //commented @Author:PRIYA19AUG13
        // End Code to include SMS API
    } else {
        $omSMSResult = 'INVALID MOBILE NO';
    }
    /*     * ******************************************************************************************* */
    /*                       END CODE TO SEND SMS USING SMS API                                                  */
    /*     * ******************************************************************************************* */
    $ownerId = $_SESSION[sessionOwnerId];
    $smsFirmId = $girv_firm_id;
    $userType = 'customers';
    $userId = $custId;
    $smsPerContList = NULL;
    $userCity = $cust_city;
    $smsTemplateId = $smsTemplateId;

    $query = "INSERT INTO 
            sms_log(smlg_own_id,smlg_firmid,smlg_userType,
            smlg_userId,smlg_contList,smlg_mobno,smlg_city,smlg_tempId,smlg_text,
            smlg_DOB,smlg_status,smlg_since)
            VALUES ('$ownerId','$smsFirmId','$userType',
                '$userId','$smsPerContList','$mobileNo','$userCity','$smsTemplateId','$smtpText',
                    '','$omSMSResult',$currentDateTime)";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    echo $omSMSResult;
}
?>
