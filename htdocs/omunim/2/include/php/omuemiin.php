<?php
/*
 * **************************************************************************************
 * @tutorial: udhaar emi insert
 * **************************************************************************************
 * 
 * Created on Nov 13, 2014 1:03:46 PM
 *
 * @FileName: omuemiin.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
require_once 'ommpincr.php';
?>
<?php

$ownerId = $_SESSION['sessionOwnerId'];
$udhaarSerialNum = trim($_GET['serialNo']);
$custId = trim($_GET['custId']);
$firmId = trim($_GET['firmId']);
$udhaarId = trim($_GET['udhaarId']);
$udhaarDOB = trim($_GET['udhaarDOB']);
$emiNo = trim($_GET['emiNo']);
$emiPaidDate = trim($_GET['emiPaidDate']);
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-03-12-2022************************
////**********************************************************************************************************************************
$queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'  order by omly_id desc LIMIT 0,1";
$engmonformat = mysqli_query($conn, $queryengmonformat);
$rowengmonformat = mysqli_fetch_array($engmonformat);
$englishMonthFormat = $rowengmonformat['omly_value'];
//
if ($englishMonthFormat == 'displayinword') {
     
        $emiPaidD = om_strtoupper($emiPaidDate);
    } else {
        
        $emiPaidD = date('d  m  Y', strtotime($emiPaidDate));
    }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-03-12-2022**************************
////**********************************************************************************************************************************
$emiAmt = trim($_GET['emiAmt']);
$emiStatus = trim($_GET['emiStatus']);
$uDepId = trim($_GET['uDepId']);
$uDepJrnlId = trim($_GET['uDepJrnlId']);
$udhaarEMIOcc = trim($_GET['emiOccur']);
$uEMIIntAmt = trim($_GET['uEMIIntAmt']);
$uEMIAmt = trim($_GET['uEMIAmt']);

$todayDate = om_strtoupper(date('d M Y'));
if ($emiStatus == 'Due') {
    $uDepStatus = 'EMI';
    $sslg_trans_sub = 'UDHAAR EMI PAID UPDATED';
    $udhaarDepositHistory = "$globalCurrency " . $emiAmt . " has been rollbacked on date " . $todayDate . ".<br/>";
}if ($emiStatus == 'Paid') {
    $uDepStatus = 'Updated';
    $sslg_trans_sub = 'UDHAAR EMI AMT PAID';
    $udhaarDepositHistory = "$globalCurrency " . $emiAmt . " has been paid on date " . $emiPaidD . ".<br/>";
}
$queryItem = "UPDATE udhaar_deposit SET
		udhadepo_upd_sts = '$uDepStatus',udhadepo_firm_id = '$firmId',udhadepo_DOB = '$udhaarDOB',udhadepo_history =  '$udhaarDepositHistory',
                udhadepo_EMI_paid_date = '$emiPaidDate', udhadepo_ent_dat = $currentDateTime,udhadepo_EMI_status = '$emiStatus' 
                WHERE udhadepo_id = '$uDepId' and udhadepo_EMI_no = '$emiNo'";

if (!mysqli_query($conn,$queryItem)) {
    die('Error: ' . mysqli_error($conn));
}
$qSelAllUdhaarDepMon = "SELECT udhadepo_jrnl_id FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_id = '$uDepId' and udhadepo_EMI_no = '$emiNo' and udhadepo_jrnl_id = '$uDepJrnlId'";
$resAllUdhaarDepMon = mysqli_query($conn,$qSelAllUdhaarDepMon);
$emiEntryPresent = mysqli_num_rows($resAllUdhaarDepMon);
if ($emiEntryPresent == 0) {
    $apiType = 'insert';
} else {
    $apiType = 'update';
    if ($emiStatus == 'Due') {
        $queryItem = "UPDATE udhaar_deposit SET
		udhadepo_jrnl_id = NULL
                WHERE udhadepo_id = '$uDepId' and udhadepo_EMI_no = '$emiNo'";
        if (!mysqli_query($conn,$queryItem)) {
            die('Error: ' . mysqli_error($conn));
        }
        $queryJournal = "DELETE FROM journal where jrnl_id='$uDepJrnlId'";
        if (!mysqli_query($conn,$queryJournal)) {
            die('Error: ' . mysqli_error($conn));
        }
        $queryJTrans = "DELETE FROM journal_trans where jrtr_jrnl_id='$uDepJrnlId'";
        if (!mysqli_query($conn,$queryJTrans)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
$sysLogTransId = $udhaarSerialNum;
$sysLogTransType = 'Udhaar';
$sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar EMI Paid Date: ' . $emiPaidDate . ',Udhaar Paid Amount: ' . formatInIndianStyle($emiAmt);
//$uEMIAmt = $emiAmt - $uEMIIntAmt; //added @OMMODTAG SHRI_03SEP15
include 'omuemijr.php';

$paidCounter = 0;
$qSelAllUdhaarDep = "SELECT udhadepo_EMI_status FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
$resAllUdhaarDep = mysqli_query($conn,$qSelAllUdhaarDep);
while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDep, MYSQLI_ASSOC)) {
    $emiStatus = $rowUdhaarDepMon['udhadepo_EMI_status'];
    if ($emiStatus == 'Paid') {
        $paidCounter++;
    }
}
if ($udhaarEMIOcc == $paidCounter) {
    $udhaarComm = '<b>Total Udhaar Amount Paid. Udhaar Clear on ' . $emiPaidDate . '</b>.<br/>';
    $query = "UPDATE udhaar SET
		udhaar_upd_sts='Deleted',udhaar_EMI_status='Paid',
		udhaar_comm='$udhaarComm'
		WHERE udhaar_own_id = '$ownerId' and udhaar_id = '$udhaarId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    $query = "UPDATE udhaar_deposit SET
		udhadepo_upd_sts='Deleted'
                WHERE udhadepo_own_id = '$ownerId' and udhadepo_udhaar_id = '$udhaarId'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    header("Location: $documentRoot/include/php/omuudetl.php?custId=$custId&firmId=$firmId&divMainMiddlePanel=Paid&showDivPanel=UdhaarEMI");
} else {
    header("Location: $documentRoot/include/php/omuudetl.php?custId=$custId&showDivPanel=UdhaarEMI");
}
?>