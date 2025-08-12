<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: omttcttt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
require_once 'ommpincr.php';
?>
<?php

if ($todayDate == '' || $todayDate == NULL) {
    $todayDate = date("d M Y");
}
//
$totalTodayTransDR = 0;
$bankTotalTodayTransDR = 0;
$cardTotalTodayTransDR = 0;
$onlineTotalTodayTransDR = 0;
$totalTodayTransCR = 0;
$bankTotalTodayTransCR = 0;
$cardTotalTodayTransCR = 0;
$onlineTotalTodayTransCR = 0;
//
$totalTodayTransaction = 0;
if ($ddpanelName == 'dayBeforePanel') {
    //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %b %Y'))<$todayStrDate";
    $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
    if ($acc_cash_opening_strtodate != '')
        if ($acc_cash_opening_strtodate == $todayFromStrDate)
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %b %Y'))<$todayStrDate";
        else
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
    else
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %b %Y'))<$todayStrDate";
} else {
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
}
include 'omfrpsck.php';
//Start Code to get all Cash in Hand Account Ids
$qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc IN ('Cash in Hand','Bank Account','Card Payment','Online Payment') and acc_firm_id IN ($strFrmId)";
$resAccounts = mysqli_query($conn, $qSelAccount);
$strAccId = '0';
//Set String for Public Firms
while ($rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC)) {
    $strAccId = $strAccId . ",";
    $strAccId = $strAccId . "$rowAccounts[acc_id]";
}
//End Code to get all Cash in Hand Account Ids
//Get Total Transaction Amount from Transaction Table
$qSelectTotalTrans = "SELECT transaction_amt as total_transaction,transaction_from_cr_acc_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_from_cr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' $dateStr and transaction_firm_id IN ($strFrmId)";
$qResultTotalTrans = mysqli_query($conn, $qSelectTotalTrans);
while ($rowTotalTrans = mysqli_fetch_array($qResultTotalTrans, MYSQLI_ASSOC)) {
    $totalTodayTransaction -= $rowTotalTrans['total_transaction'];
    //
    $qSelAccount = "SELECT acc_main_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$rowTotalTrans[transaction_from_cr_acc_id]'";
    $resAccounts = mysqli_query($conn, $qSelAccount);
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $crAccountName = $rowAccounts['acc_main_acc'];
    //
    if ($crAccountName == 'Cash in Hand') {
        $totalTodayTransCR += $rowTotalTrans['total_transaction'];
    } else if ($crAccountName == 'Bank Account') {
        $bankTotalTodayTransCR += $rowTotalTrans['total_transaction'];
    } else if ($crAccountName == 'Card Payment') {
        $cardTotalTodayTransCR += $rowTotalTrans['total_transaction'];
    } else if ($crAccountName == 'Online Payment') {
        $onlineTotalTodayTransCR += $rowTotalTrans['total_transaction'];
    }
}
//
$qSelectTotalTrans = "SELECT transaction_amt as total_transaction,transaction_to_dr_acc_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_to_dr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' $dateStr and transaction_firm_id IN ($strFrmId)";
$qResultTotalTrans = mysqli_query($conn, $qSelectTotalTrans);
while ($rowTotalTrans = mysqli_fetch_array($qResultTotalTrans, MYSQLI_ASSOC)) {
    $totalTodayTransaction += $rowTotalTrans['total_transaction'];
    //
    $qSelAccount = "SELECT acc_main_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$rowTotalTrans[transaction_to_dr_acc_id]'";
    $resAccounts = mysqli_query($conn, $qSelAccount);
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $drAccountName = $rowAccounts['acc_main_acc'];
    //
    if ($drAccountName == 'Cash in Hand') {
        $totalTodayTransDR += $rowTotalTrans['total_transaction'];
    } else if ($drAccountName == 'Bank Account') {
        $bankTotalTodayTransDR += $rowTotalTrans['total_transaction'];
    } else if ($drAccountName == 'Card Payment') {
        $cardTotalTodayTransDR += $rowTotalTrans['total_transaction'];
    } else if ($drAccountName == 'Online Payment') {
        $onlineTotalTodayTransDR += $rowTotalTrans['total_transaction'];
    }
}
//
/* START CODE TO SHOW AMOUNT IN AND AMOUNT OUT OF DAILY TRANSACTION,@AUTHOR:HEMA-29JUN2020 */
if ($ddpanelName == 'dayBeforePanel') {
    $open_in_utin_cash_amt_rec += $totalTodayTransDR;
    $open_in_utin_pay_cheque_amt += $bankTotalTodayTransDR;
    $open_in_utin_pay_card_amt += $cardTotalTodayTransDR;
    $open_in_utin_online_pay_amt += $onlineTotalTodayTransDR;
    $open_out_utin_cash_amt_rec += $totalTodayTransCR;
    $open_out_utin_pay_cheque_amt += $bankTotalTodayTransCR;
    $open_out_utin_pay_card_amt += $cardTotalTodayTransCR;
    $open_out_utin_online_pay_amt += $onlineTotalTodayTransCR;
} else {
    $today_in_utin_cash_amt_rec += $totalTodayTransDR;
    $today_in_utin_pay_cheque_amt += $bankTotalTodayTransDR;
    $today_in_utin_pay_card_amt += $cardTotalTodayTransDR;
    $today_in_utin_online_pay_amt += $onlineTotalTodayTransDR;
    $today_out_utin_cash_amt_rec += $totalTodayTransCR;
    $today_out_utin_pay_cheque_amt += $bankTotalTodayTransCR;
    $today_out_utin_pay_card_amt += $cardTotalTodayTransCR;
    $today_out_utin_online_pay_amt += $onlineTotalTodayTransCR;
}
/* END CODE TO SHOW AMOUNT IN AND AMOUNT OUT OF DAILY TRANSACTION,@AUTHOR:HEMA-29JUN2020 */
?>
<?php

//if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
//    //Get Public Firms
//    $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
//    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
//    $strFrmId = '0';
//    //Set String for Public Firms
//    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
//        $strFrmId = $strFrmId . ",";
//        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
//    }
//    //Start Code to get all Cash in Hand Account Ids
//    if ($firmIdSelected != NULL) {
//        $qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc='Cash in Hand' and acc_firm_id='$firmIdSelected'";
//    } else {
//        $qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc='Cash in Hand' and acc_firm_id IN ($strFrmId)";
//    }
//    $resAccounts = mysqli_query($conn,$qSelAccount);
//    $strAccId = '0';
//    //Set String for Public Firms
//    while ($rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC)) {
//        $strAccId = $strAccId . ",";
//        $strAccId = $strAccId . "$rowAccounts[acc_id]";
//    }
//    //End Code to get all Cash in Hand Account Ids
//    //Get Total Transaction Amount from Transaction Table
//    if ($firmIdSelected != NULL) {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_from_cr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate' and transaction_firm_id='$firmIdSelected'";
//    } else {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_from_cr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate' and transaction_firm_id IN ($strFrmId)";
//    }
//    $qResultTotalTrans = mysqli_query($conn,$qSelectTotalTrans);
//    $rowTotalTrans = mysqli_fetch_array($qResultTotalTrans, MYSQLI_ASSOC);
//
//    $totalTodayTransaction -= $rowTotalTrans['total_transaction'];
//    $totalTodayTransCR += $rowTotalTrans['total_transaction'];
//
//    if ($firmIdSelected != NULL) {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_to_dr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate' and transaction_firm_id='$firmIdSelected'";
//    } else {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_to_dr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate' and transaction_firm_id IN ($strFrmId)";
//    }
//    $qResultTotalTrans = mysqli_query($conn,$qSelectTotalTrans);
//    $rowTotalTrans = mysqli_fetch_array($qResultTotalTrans, MYSQLI_ASSOC);
//
//    $totalTodayTransaction += $rowTotalTrans['total_transaction'];
//    $totalTodayTransDR += $rowTotalTrans['total_transaction'];
//    
?>
<?php

//} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
//
//    //Start Code to get all Cash in Hand Account Ids
//    if ($firmIdSelected != NULL) {
//        $qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc='Cash in Hand' and acc_firm_id='$firmIdSelected'";
//    } else {
//        $qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc='Cash in Hand'";
//    }
//    $resAccounts = mysqli_query($conn,$qSelAccount);
//
//    $strAccId = '0';
//
//    //Set String for Public Firms
//    while ($rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC)) {
//        $strAccId = $strAccId . ",";
//        $strAccId = $strAccId . "$rowAccounts[acc_id]";
//    }
//    //End Code to get all Cash in Hand Account Ids
//    //Get Total Transaction Amount from Transaction Table
//    if ($firmIdSelected != NULL) {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_from_cr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate' and transaction_firm_id='$firmIdSelected'";
//    } else {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_from_cr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate'";
//    }
//    $qResultTotalTrans = mysqli_query($conn,$qSelectTotalTrans);
//    $rowTotalTrans = mysqli_fetch_array($qResultTotalTrans, MYSQLI_ASSOC);
//
//    $totalTodayTransaction -= $rowTotalTrans['total_transaction'];
//    $totalTodayTransCR += $rowTotalTrans['total_transaction'];
//
//    if ($firmIdSelected != NULL) {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_to_dr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate' and transaction_firm_id='$firmIdSelected'";
//    } else {
//        $qSelectTotalTrans = "SELECT SUM(transaction_amt) as total_transaction FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_to_dr_acc_id IN ($strAccId) and transaction_cat='$transactionCat' and transaction_DOB='$todayDate'";
//    }
//    $qResultTotalTrans = mysqli_query($conn,$qSelectTotalTrans);
//    $rowTotalTrans = mysqli_fetch_array($qResultTotalTrans, MYSQLI_ASSOC);
//
//    $totalTodayTransaction += $rowTotalTrans['total_transaction'];
//    $totalTodayTransDR += $rowTotalTrans['total_transaction'];
//    
?>
