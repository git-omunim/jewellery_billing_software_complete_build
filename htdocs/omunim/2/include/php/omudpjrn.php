<?php

/*
 * **************************************************************************************
 * @tutorial: Udhaar deposit jrnl
 * **************************************************************************************
 * 
 * Created on Mar 26, 2014 4:22:02 PM
 *
 * @FileName: omudpjrn.php
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
    $jrnlDesc = 'UDHAAR DEPOSIT MONEY';
} else if ($apiType == 'update') {
    $jrnlDesc = 'UDHHAR DEPOSIT UPDATED';
    parse_str(getTableValues("SELECT udhadepo_jrnl_id FROM udhaar_deposit WHERE udhadepo_own_id='$sessionOwnerId' and udhadepo_id='$udhadepo_id'"));
    $jrnlId = $udhadepo_jrnl_id;
}
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
$qSelCustDetails = "SELECT user_fname,user_lname FROM user where user_owner_id='$sessionOwnerId' and user_id='$custId'";
$resCustDetails = mysqli_query($conn,$qSelCustDetails);
$rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
$custFirstName = $rowCustDetails['user_fname'];
$custLastName = $rowCustDetails['user_lname'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
$selAccName = "SELECT acc_id,acc_main_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Cash in Hand'"; //6  //Right now rec amt in CASH
$resAccName = mysqli_query($conn,$selAccName);
$rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
$cashAccId = $rowAccName['acc_id'];
$cashAccName = $rowAccName['acc_main_acc'];

$selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Sundry Debtors'";
$resAccName = mysqli_query($conn,$selAccName);
$rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
$SundryDebAccId = $rowAccName['acc_id'];

$jrnlOwnId = $sessionOwnerId;
$jrnlJId = '';
$jrnlUserId = $custId;
$jrnlUserType = 'cust';
$jrnlTransId = $udhaarId; // Used to navigate
$jrnlTransType = 'Udhaar'; //Where we hv to navigate
$jrnlFirmId = $firmId;
$jrnlTTDr = $udhaarDepositAmount;
$jrnlDrAccId = $cashAccId;
$jrnlDrDesc = $cashAccName;
$jrnlTTCr = $udhaarDepositAmount;
$jrnlCrAccId = $SundryDebAccId;
$jrnlCrDesc = $custFirstName . ' ' . $custLastName;
//$jrnlDesc = 'Udhaar Deposit Money';
$jrnlOthInfo = '';
$jrnlDOB = $udhaarDepositDate;

include 'ommpjrnl.php';

if ($apiType == 'insert') {
//Start Code to Get Last Journal Id
    parse_str(getTableValues("SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc"));
    $jrnlId = $jrnl_id;
//End Code to Get Last Journal Id
}

$selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Unsecured Loans'"; //23
$resAccName = mysqli_query($conn,$selAccName);
$rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
$crAccId = $rowAccName['acc_id'];
$crAccName = $rowAccName['acc_user_acc'];

$selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Cash in Hand'"; //6
$resAccName = mysqli_query($conn,$selAccName);
$rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
$drAccId = $rowAccName['acc_id'];
$drAccName = $rowAccName['acc_user_acc'];

$jrtrJId = '';
$jrtrJrnlId = $jrnlId;
$jrtrOwnId = $sessionOwnerId;
$jrtrUserId = $custId;
$jrtrUserType = 'cust';
$jrtrTransId = $udhaarId;
$jrtrTransType = 'Udhaar';
$jrtrFirmId = $firmId;
$jrtrTransCRDR = 'DR';
$jrtrDrAmt = $udhaarDepositAmount;
$jrtrDrAccId = $drAccId; //Unsecured Loan
$jrtrDrDesc = $drAccName;
$jrtrCrAmt = $udhaarDepositAmount;
$jrtrCrAccId = $crAccId; //Girvi Payment Account Id
$jrtrCrDesc = $crAccName;
$jrtrDesc = 'UDHAAR DEPOSIT MONEY';
$jrtrOthInfo = '';
$jrtrDOB = $udhaarDepositDate;
include 'ommpjrtr.php';

if ($apiType == 'insert') {
    $query = "UPDATE udhaar_deposit SET 
            udhadepo_jrnl_id='$jrnlId'
            WHERE udhadepo_own_id='$sessionOwnerId' and udhadepo_id ='$udhaarDepId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>