<?php

/*
 * **************************************************************************************
 * @tutorial: Udhaar Jrnl entry
 * **************************************************************************************
 * 
 * Created on Dec 19, 2013 7:16:21 PM
 *
 * @FileName: omudjrnl.php
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

$sessionOwnerId = $_SESSION[sessionOwnerId];
if ($apiType == 'insert') {
    $jrnlDesc = 'UDHAAR MONEY ADDED';
    //Start Code to get Last Inserted Udhaar Id
//    if ($udhaar_id == '') {
//        parse_str(getTableValues("SELECT utin_id FROM user_transaction_invoice where utin_user_id='$custId' and utin_owner_id='$sessionOwnerId' order by utin_id desc LIMIT 0,1"));
//    }
    $udhaarId = $udhaar_id;
    //End Code to get Last Inserted Udhaar Id
} else if ($apiType == 'update') {
    $jrnlDesc = 'UDHAAR UPDATED';
    parse_str(getTableValues("SELECT utin_jrnl_id FROM user_transaction_invoice WHERE utin_owner_id='$_SESSION[sessionOwnerId]' and utin_id='$udhaarId'"));
    $jrnlId = $utin_jrnl_id;
}
parse_str(getTableValues("SELECT acc_user_acc,acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_id='$udhaarPayAccId'"));
$udhaarAccName = $acc_user_acc;
$udhaarAccId = $acc_id;

parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_id='$udhaarDrAccId'"));
$SundryDebAccId = $acc_id;
$SundryDebAccName = $acc_user_acc;
//---------------------------------- Start code for change data from customer table to user table Author@:SANT14JAN16------------------------------------------------------------------------------------
if ($custFirstName == '') {
    parse_str(getTableValues("SELECT user_fname,user_lname FROM user WHERE user_id = '$custId'"));
    $custFirstName = $user_fname;
    $custLastName = $user_lname;
}
//---------------------------------- End code for change data from customer table to user table Author@:SANT14JAN16------------------------------------------------------------------------------------
$jrnlOwnId = $sessionOwnerId;
$jrnlJId = '';
$jrnlUserId = $custId;
$jrnlUserType = 'CUSTOMER';
$jrnlTransId = $udhaarId; // Used to navigate
$jrnlTransType = $udhaarType; //Where we hv to navigate
$jrnlFirmId = $firmId;
$jrnlTTDr = $payTotalAmtBal;
$jrnlGGWDr = NULL;
$jrnlGGWTPDr = NULL;
$jrnlGNWDr = NULL;
$jrnlGNWTPDr = NULL;
$jrnlGFWDr = NULL;
$jrnlGFWTPDr = NULL;
$jrnlSGWDr = NULL;
$jrnlSGWTPDr = NULL;
$jrnlSNWDr = NULL;
$jrnlSNWTPDr = NULL;
$jrnlSFWDr = NULL;
$jrnlSFWTPDr = NULL;
$jrnlDrAccId = $udhaarPayAccId;
$jrnlDrDesc = $SundryDebAccName. '(' . $custFirstName . " " . $custLastName . ')';
$jrnlTTCr = $payTotalAmtBal;
$jrnlCrAccId = $udhaarDrAccId;
$jrnlCrDesc = $udhaarAccName ;
$jrnlOthInfo = '';
$jrnlDOB = $itemAddDate;
include 'ommpjrnl.php';
if ($apiType == 'insert') {
    parse_str(getTableValues("SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc"));
    $jrnlId = $jrnl_id;
}
//parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_id='$udhaarDrAccId'"));
$drAccId = $udhaarDrAccId;
$drAccName = $SundryDebAccName ; //$acc_user_acc;
//parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_id='$udhaarPayAccId'"));
$crAccName = $udhaarAccName; //$acc_user_acc;
$crAccId = $udhaarPayAccId;

$jrtrJId = '';
$jrtrJrnlId = $jrnlId;
$jrtrOwnId = $sessionOwnerId;
$jrtrUserId = $custId;
$jrtrUserType = 'CUSTOMER';
$jrtrTransId = $udhaarId;
$jrtrTransType = $udhaarType;
$jrtrFirmId = $firmId;
$jrtrTransCRDR = 'CR';
$jrtrDrAmt = $payTotalAmtBal;
$jrtrGGWDr = NULL;
$jrtrGGWTPDr = NULL;
$jrtrGNWDr = NULL;
$jrtrGNWTPDr = NULL;
$jrtrGFWDr = NULL;
$jrtrGFWTPDr = NULL;
$jrtrSGWDr = NULL;
$jrtrSGWTPDr = NULL;
$jrtrSNWDr = NULL;
$jrtrSNWTPDr = NULL;
$jrtrSFWDr = NULL;
$jrtrSFWTPDr = NULL;
$jrtrDrAccId = $drAccId; //Unsecured Loan
$jrtrDrDesc = $drAccName;
$jrtrCrAmt = $payTotalAmtBal;
$jrtrCrAccId = $crAccId;
$jrtrCrDesc = $crAccName;
$jrtrDesc = 'UDHAAR MONEY ADDED';
$jrtrOthInfo = '';
$jrtrDOB = $itemAddDate;
include 'ommpjrtr.php';

if ($apiType == 'insert') {
    $query = "UPDATE user_transaction_invoice SET 
            utin_jrnl_id='$jrnlId'
            WHERE utin_owner_id='$sessionOwnerId' and utin_id ='$udhaarId'";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>