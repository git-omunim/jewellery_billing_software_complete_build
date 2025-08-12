<?php

/*
 * **************************************************************************************
 * @tutorial: Delete Udhaar Deposit Amount
 * **************************************************************************************
 *
 * Created on 25 Jul, 2012 12:37:14 PM
 *
 * @FileName: omuddpam.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
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
//include 'system/omsachsc.php';
//require_once 'system/omsgeagb.php';
include 'system/omsachsc.php';
include 'ommpemac.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
include 'ommpsbac.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<?php

require_once 'ommpincr.php';
require_once 'system/omssopin.php';
$ownerId = $_SESSION['sessionOwnerId'];
$udhaarDepId = $_POST['udhaarDepId'];
$custId = $_POST['custId'];
$firmId = $_POST['firmId'];
$uDepJrnlId = $_POST['uDepJrnlId']; // $uDepJrnlId Added @Author:PRIYA18AUG13
$uDepAmt = $_POST['uDepAmt'];
$uDepDate = $_POST['uDepDate'];
$uSerialNum = $_POST['uSerialNum'];
if ($udhaarDepId == '') {
    $udhaarDepId = $_GET['udhaarDepId'];
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
    $uDepJrnlId = $_GET['uDepJrnlId']; // $uDepJrnlId Added @Author:PRIYA18AUG13
}
//
if ($udhaarPanelStatus == '' || $udhaarPanelStatus == NULL) {
    $udhaarPanelStatus = $_GET['udhaarStatus'];
}
if ($udhaarPanelStatus == '' || $udhaarPanelStatus == NULL) {
    $udhaarPanelStatus = $_POST['udhaarStatus'];
}
//
if ($udhaarDepId == '' || $udhaarDepId == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    /*     * ***************Start code to add sys log var @Author:PRIYA14APR14*********************** */
    parse_str(getTableValues("SELECT utin_id,utin_utin_id FROM user_transaction_invoice "
                    . "where utin_owner_id='$ownerId' and utin_user_id = '$custId' "
                    . "and utin_utin_id=(SELECT utin_utin_id FROM user_transaction_invoice "
                    . "where utin_id='$udhaarDepId') ORDER BY utin_id desc limit 0,1"));
//
//    if ($udhaarDepId == $utin_id) {
    $sslg_trans_sub = 'UDHAAR DEPOSIT DELETED';
    $sysLogTransType = 'Udhaar';
    $sysLogTransId = $uSerialNum;
    $sslg_firm_id = $firmId;
    $sslg_trans_comment = 'Udhaar Serial No: ' . $uSerialNum . ', Udhaar Deposit Date: ' . $uDepDate . ',Udhaar Deposit Amount: ' . formatInIndianStyle($uDepAmt);
    /*     * ***************End code to add sys log var @Author:PRIYA14APR14*********************** */
    //
    //Start Code To Check Udhaar Status
//    $qSelAllUdhaar = "SELECT utin_status FROM user_transaction_invoice where utin_owner_id='$ownerId' and utin_id='$udhaarId'";
//    $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar);
//    $rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC);
//    $udhaarStatus = $rowAllUdhaar['utin_status'];
//    //End Code To Check Udhaar Status
//    //
//    $qSelAllUdhaar1 = "SELECT * FROM user_transaction_invoice where utin_owner_id='$ownerId' and utin_id='$udhaarDepId'";
//
//    $resAllUdhaar1 = mysqli_query($conn, $qSelAllUdhaar1);
//
//    while ($row = mysqli_fetch_array($resAllUdhaar1)) {
//        $udhaarAmt = $row['utin_cash_amt_rec'];
//        $udhaarMainEntryId = $row['utin_utin_id'];
//        $udhaarDepositAmt = $row['utin_total_amt_deposit'];
//    }
//    $udhaarTotalDepAmount = ($rowUdhaarDepMon['utin_cash_amt_rec'] + $rowUdhaarDepMon['utin_pay_cheque_amt'] + ($rowUdhaarDepMon['utin_pay_card_amt'] + $rowUdhaarDepMon['utin_pay_trans_chrg']) + ($rowUdhaarDepMon['utin_online_pay_amt'] - $rowUdhaarDepMon['utin_pay_comm_paid']) + $rowUdhaarDepMon['utin_discount_amt']);
    //echo '$udhaarTotalDepAmount:'.$udhaarTotalDepAmount;exit();
    //
//        $qSelAllUdhaar2 = "SELECT * FROM user_transaction_invoice where utin_owner_id='$ownerId' and utin_id='$udhaarMainEntryId'";
//
//    $resAllUdhaar2 = mysqli_query($conn, $qSelAllUdhaar2);
////        $rowUdhaar = mysqli_fetch_row($resAllUdhaar);
//    while ($row = mysqli_fetch_array($resAllUdhaar2)) {
//        $udhaarCashRecAmount = $row['utin_cash_amt_rec'];
//        $udhaarCashBal = $row['utin_cash_balance'];
//        $udhaarMainDepositAmt = $row['utin_total_amt_deposit'];
//        $status = $row['utin_amt_pay_chk'];
//        $OnPurchaseID = $row['utin_utin_id'];
//    }
//
//    //
//
//    $udhaarCashBalance = $udhaarCashBal + $udhaarAmt;
//    $udhaarCashRecAmount = $udhaarCashRecAmount - $udhaarAmt;
//    $udhaarDAmt = $udhaarMainDepositAmt - $udhaarDepositAmt;
//
//    $OnPurchaseCon = '';
//    if ($OnPurchaseID != '')
//        $OnPurchaseCon = " OR utin_id='$OnPurchaseID'";
//
//    if ($status == 'checked') {
//        $query1 = "UPDATE user_transaction_invoice SET utin_cash_balance = '$udhaarCashBalance', "
//                . "utin_cash_amt_rec = '$udhaarCashRecAmount',utin_total_amt_deposit='$udhaarDAmt',"
//                . "utin_comm='',utin_amt_pay_chk=null ,utin_status='New' "
//                . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId] ' "
//                . "and utin_id = '$udhaarMainEntryId' $OnPurchaseCon";
//    } else {
//        $query1 = "UPDATE user_transaction_invoice SET "
//                . "utin_cash_balance = '$udhaarCashBalance',utin_comm='', "
//                . "utin_cash_amt_rec = '$udhaarCashRecAmount',"
//                . "utin_total_amt_deposit='$udhaarDAmt'"
//                . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId] ' "
//                . "and utin_id = '$udhaarMainEntryId' $OnPurchaseCon";
//    }
    //
    //
       
//        if (!mysqli_query($conn, $query1)) {
//        die("FileName: <br/>Query: $query1 <br/>Error:" . mysqli_error($conn));
//    }
    //

    $query = "DELETE FROM user_transaction_invoice WHERE utin_owner_id = '$ownerId' and utin_id = '$udhaarDepId'";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }

    update_deposit_money($utin_id, $utin_utin_id,'UDHAAR');

    /*     * ****************************************************************************************** */
    /*                         Start CODE To Delete Udhaar Journal Entry @AUTHOR:PRIYA18AUG13     */
    /*     * ****************************************************************************************** */
    //Start Code to Get All Journal Id for TransId
    $jrnlId = $uDepJrnlId;
    $apiType = 'delete';
    include 'ommpjrnl.php';
    //
    $jrtrJrnlId = $uDepJrnlId;
    $apiType = 'delete';
    include 'ommpjrtr.php';
    /*     * ****************************************************************************************** */
    /*                         End CODE To Delete Udhaar Journal Entry @AUTHOR:PRIYA18AUG13                 */
    /*     * ****************************************************************************************** */
    //
    //
//    } else {
//        $msg = "You can not delete this record before you delete ";
//    }
//    //******Start code for delete user_transaction enrtry:Author:SANT24MAR17
//    $query = "DELETE FROM user_transaction WHERE utrans_owner_id = '$ownerId' and utrans_utin_id = '$udhaarDepId'";
//    if (!mysqli_query($conn, $query)) {
//        die('Error: ' . mysqli_error($conn));
//    }
//    //******End code for delete user_transaction enrtry:Author:SANT24MAR17

    if ($udhaarPanelStatus == 'DeleteFromUdhaarPanel') {
        header("Location: " . $documentRoot . "/include/php/omuulstp.php");
    } else if ($udhaarPanelStatus == 'DeleteFromUdhaarAllDetails') {
        header("Location: " . $documentRoot . "/include/php/omuualdt.php");
    } else if ($udhaarStatus == 'Deleted') {
        header("Location: " . $documentRoot . "/include/php/omuudetl.php?custId=" . $custId . "&firmId=" . $firmId . "&divMainMiddlePanel=Deleted");
    } else {
        header("Location: " . $documentRoot . "/include/php/omuudetl.php?custId=" . $custId . "&firmId=" . $firmId);
    }
}