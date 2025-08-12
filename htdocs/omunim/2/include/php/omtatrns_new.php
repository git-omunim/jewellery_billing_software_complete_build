<?php /**
 * 
 * Created on Jul 26, 2011 1:01:51 PM
 *
 * @FileName: omtatrns.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
 */ ?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'ommpincr.php';
require_once 'system/omssopin.php';
require_once 'nepal/nepali-date.php';

//Start Code To Check Transaction Table Status
//$sql = 'DESC transaction;';
//
//mysqli_query($conn,$sql);
//
//if (mysqli_errno($conn) == 1146) {
//    include 'omtbtran.php';
//}
//End Code To Check Transaction Table Status

$noOfTransactions = $_POST['noOfTransactions'];
$transactionOwnerId = $_SESSION['sessionOwnerId'];
$transPreVoucherNo = trim($_POST['transPreVoucherNo']);
$transPostVoucherNo = trim($_POST['transPostVoucherNo']);
$transSub = trim($_POST['transSub']);
//$transAmt = trim($_POST['transAmt']);
//$transFromAcc = trim($_POST['transFromAcc']);
//$transToAcc = trim($_POST['transToAcc']);
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);
//$transactionType = trim($_POST['transactionType']);
$transactionCategory = trim($_POST['transactionCategory']);
$transFirmId = trim($_POST['transFirmId']);
$transCustId = trim($_POST['transCustId']);
$supplierVoucherNo = trim($_POST['supplierVoucherNo']);
//$transactionDesc = trim($_POST['transactionDesc']);
$transAmtCrTotal = $transAmtDrTotal = trim($_POST['transAmtCrTotal']);
//$transAmtDrTotal = trim($_POST['transAmtDrTotal']);
$transactionDesc = trim($_POST['txtEditorContent']);

$transDRMainAcc = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transToMainAcc'])));
$transCRMainAcc = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transFromMainAcc'])));

//echo '$transDRMainAcc:'.$transDRMainAcc.'<br/>'.'$transCRMainAcc:'.$transCRMainAcc;
if ($noOfTransactions != '') {
    for ($i = 1; $i <= $noOfTransactions; $i++) {
        $transAmtCr[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transAmtCr' . $i])));
        $transAmtDr[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transAmtDr' . $i])));
        $transFromAcc[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transFromAcc' . $i])));
        $transToAcc[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transToAcc' . $i])));
    }
}
//print_r($transAmtCrReq);
//print_r($transAmtDrReq);
//print_r($transFromAcc);
//print_r($transToAcc);
//exit();
// Start To protect MySQL injection
$transSub = stripslashes($transSub);
//$transAmt = stripslashes($transAmt);
//$transactionType = stripslashes($transactionType);
$transactionCategory = stripslashes($transactionCategory);
$transFirmId = stripslashes($transFirmId);
$transCustId = stripslashes($transCustId);
$supplierVoucherNo = stripslashes($supplierVoucherNo);
$transactionDesc = stripslashes($transactionDesc);

$transSub = mysqli_real_escape_string($conn, $transSub);
//$transAmt = mysqli_real_escape_string($conn,$transAmt);
//$transactionType = mysqli_real_escape_string($conn,$transactionType);
$transactionCategory = mysqli_real_escape_string($conn, $transactionCategory);
$transFirmId = mysqli_real_escape_string($conn, $transFirmId);
$transCustId = mysqli_real_escape_string($conn, $transCustId);
$supplierVoucherNo = mysqli_real_escape_string($conn, $supplierVoucherNo);
$transactionDesc = mysqli_real_escape_string($conn, $transactionDesc);
// End To protect MySQL injection
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
if ($nepaliDateIndicator == 'YES') {
    if ($DOBDay != '' && $DOBMonth != '' && $DOBYear != '') {
        $transactionOtherLangDOB = trim($DOBDay) . '-' . trim($DOBMonth) . '-' . trim($DOBYear);
        $nepali_date = new nepali_date();
        $english_date = $nepali_date->get_eng_date($DOBYear, $DOBMonth, $DOBDay);
        $transactionDOB = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
    } else {
        $transactionDOB = '';
    }
} else {
    $transactionDOB = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;
    $transactionOtherLangDOB = '';
}
//
if ($transactionOwnerId != '' && $transactionOwnerId != NULL && $transSub != '' && $transSub != NULL && $transactionCategory != '' && $transactionCategory != NULL && $transFirmId != '' && $transFirmId != NULL && $noOfTransactions != '' && $noOfTransactions != NULL && $transAmtCrTotal != '' && $transAmtCrTotal != NULL) {
//check for vch id already exist or not @AUTHOR: SANDY27JAN14
    $checkVchId = "SELECT transaction_pre_vch_id,transaction_post_vch_id FROM transaction WHERE transaction_own_id='$_SESSION[sessionOwnerId]'";
    $resCheckVchId = mysqli_query($conn, $checkVchId);
    while ($rowVchId = mysqli_fetch_array($resCheckVchId, MYSQLI_ASSOC)) {
        if (($rowVchId['transaction_pre_vch_id'] == om_strtoupper($transPreVoucherNo) || $rowVchId['transaction_pre_vch_id'] == strtolower($transPreVoucherNo)) && $rowVchId['transaction_post_vch_id'] == $transPostVoucherNo) {
            $error = "This Voucher Number is already exist!!!";
            header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=" . $error . "&firmId=" . $transFirmId);
            exit(0);
        }
    }

    // CODE TO GET ACCOUNT NAMES TO STORE IN COLUMN transaction_type
    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transCRMainAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTransMain = $rowAccounts['acc_user_acc'];

    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transDRMainAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTransMain = $strAccTransMain . ' CR - ' . $rowAccounts['acc_user_acc'] . ' DR';


    $query = "INSERT INTO transaction (
		transaction_own_id,transaction_user_id,transaction_pre_vch_id,transaction_pre_vch_firm_id,transaction_post_vch_id,transaction_firm_id,
                transaction_supp_vch_id,transaction_amt,transaction_sub, transaction_cat,transaction_DOB,transaction_other_lang_DOB,transaction_desc,transaction_type,transaction_upd_sts,
		transaction_from_cr_acc_id,transaction_to_dr_acc_id,transaction_ent_dat,transaction_panel) 
		VALUES (
		'$transactionOwnerId','$transCustId','$transPreVoucherNo','$transFirmId','$transPostVoucherNo','$transFirmId',
                '$supplierVoucherNo','$transAmtCrTotal','$transSub','$transactionCategory','$transactionDOB','$transactionOtherLangDOB','$transactionDesc','$strAccTransMain','New',
		'$transCRMainAcc','$transDRMainAcc',$currentDateTime,'NEW_TRANS_PANEL')";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    $staffId = $_SESSION['sessionStaffId'];
    $queryStaffDetails = "select user_fname,user_lname from user where user_id = '$staffId' and user_type = 'STAFF' and user_firm_id = '$transFirmId' and user_owner_id = '$_SESSION[sessionOwnerId]'";
    $resQueryStaffDetails = mysqli_query($conn,$queryStaffDetails);
    $rowQueryStaffDetails = mysqli_fetch_assoc($resQueryStaffDetails);
    $staffirstName = $rowQueryStaffDetails['user_fname'];
    $staffLname = $rowQueryStaffDetails['user_lname'];
    $staffName = $staffirstName.' '.$staffLname;
    /*     * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
    $sslg_trans_sub = 'NEW DAILY TRANSACTION ADDED';
    $sysLogTransType = 'Trans';
    $sysLogTransId = $transPreVoucherNo . $transPostVoucherNo;
    if($staffId != ''){
    $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ',  Transaction Date: ' . $transactionDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmtCrTotal) . ',Sub: ' . substr($transSub, 0, 16). ',Staff Name :' . $staffName;
    }else{
    $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ',  Transaction Date: ' . $transactionDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmtCrTotal) . ',Sub: ' . substr($transSub, 0, 16);
    }
    /*     * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */


    $qSelTransId = "SELECT transaction_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' order by transaction_id desc LIMIT 0,1";
    $resTransId = mysqli_query($conn, $qSelTransId);
    $rowTransId = mysqli_fetch_array($resTransId, MYSQLI_ASSOC);
    $TransId = $rowTransId['transaction_id'];

    /*     * **********************************************************************************************
     *  START CODE FOR JOURNAL ENTRY
     * ********************************************************************************************** */
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transDRMainAcc'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'];


    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transCRMainAcc'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];


    $jrnlOwnId = $transactionOwnerId;
    $jrnlJId = '';
    $jrnlUserType = 'Trans';
    $jrnlTransId = $TransId; // Used to navigate
    $jrnlTransType = 'Trans'; //Where we hv to navigate
    $jrnlFirmId = $transFirmId;
    $jrnlTTDr = $transAmtDrTotal;
    $jrnlDrAccId = $transDRMainAcc;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $transAmtCrTotal;
    $jrnlCrAccId = $transCRMainAcc;
    $jrnlCrDesc = $crAccName;
    $jrnlDesc = $transSub;
    $jrnlOthInfo = '';
    $jrnlDOB = $transactionDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //START CODE TO GET LAST JOURNAL ID
    $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
    // REPLACED JRNL_SINCE TO JRNL_ID @RATNAKAR 13FEB2018 
    $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];


    // CODE TO SET JOURNAL ID IN TRANSACTION TABLE
    $query = "UPDATE transaction SET 
            transaction_jrnl_id='$jrnlId'
            WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_id ='$TransId'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }


    /*     * **********************************************************************************************
     *  START CODE TO INSERT ENTRIES FOR ALL TRANSACTIONS
     * ********************************************************************************************** */
    for ($i = 1; $i <= $noOfTransactions; $i++) {
        if (($transAmtCr[$i] != '' && $transAmtCr[$i] != NULL && $transAmtCr[$i] != 0 && $transFromAcc[$i] != '' && $transFromAcc[$i] != NULL) || ($transAmtDr[$i] != '' && $transAmtDr[$i] != NULL && $transAmtDr[$i] != 0 && $transToAcc[$i] != '' && $transToAcc[$i] != NULL)) {

            // CODE TO GET ACCOUNT NAMES TO STORE IN COLUMN transaction_type
            $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc[$i]'";
            $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
            $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
            $strAccTrans = $rowAccounts['acc_user_acc'];

            $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc[$i]'";
            $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
            $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
            $strAccTrans = $strAccTrans . ' CR - ' . $rowAccounts['acc_user_acc'] . ' DR';


            // CODE TO GET INSERT TRANSACTION ENTRY
            $query = "INSERT INTO transaction (
		transaction_own_id,transaction_user_id,transaction_trans_id,transaction_firm_id,transaction_from_cr_acc_id,transaction_to_dr_acc_id,transaction_cr_amt,transaction_dr_amt,transaction_type,transaction_DOB,transaction_other_lang_DOB,transaction_upd_sts,transaction_ent_dat) 
		VALUES ('$transactionOwnerId','$transCustId','$TransId','$transFirmId','$transFromAcc[$i]','$transToAcc[$i]','$transAmtCr[$i]','$transAmtDr[$i]','$strAccTrans','$transactionDOB','$transactionOtherLangDOB','New',$currentDateTime)";

//        echo $query.'<br/>';

            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }

            // CODE TO GET CURRENT TRANSACTION ENTRY ID
            $qSelTransId = "SELECT transaction_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_trans_id='$TransId' order by transaction_id desc LIMIT 0,1";
            $resTransId = mysqli_query($conn, $qSelTransId);
            $rowTransId = mysqli_fetch_array($resTransId, MYSQLI_ASSOC);
            $transTransId = $rowTransId['transaction_id'];


            /*             * ******************************************************************************************* */
            /*                       START CODE TO ADD JOURNAL TRANS ENTRY                           */
            /*             * ******************************************************************************************* */

            $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc[$i]'";
            $resAccName = mysqli_query($conn, $selAccName);
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $drAccName = $rowAccName['acc_user_acc'];


            $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc[$i]'";
            $resAccName = mysqli_query($conn, $selAccName);
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $crAccName = $rowAccName['acc_user_acc'];

            // SET JRTR DESCRIPTION - USED ON JOURNAL TRANS ENTRY UPDATE
            $transDescCR = 'Sub Trans CR ' . $transTransId;
            $transDescDR = 'Sub Trans DR ' . $transTransId;

            if ($transAmtCr[$i] != '' && $transAmtCr[$i] != NULL && $transAmtCr[$i] != 0 && $transFromAcc[$i] != '' && $transFromAcc[$i] != NULL) {
                $jrtrJId = '';
                $jrtrJrnlId = $jrnlId;
                $jrtrOwnId = $transactionOwnerId;
                $jrtrUserType = 'Trans';
                $jrtrTransId = $transTransId;
                $jrtrTransType = 'Trans';
                $jrtrFirmId = $transFirmId;
                $jrtrTransCRDR = 'CR';
                $jrtrCrAmt = $transAmtCr[$i];
                $jrtrCrAccId = $transFromAcc[$i];
                $jrtrCrDesc = $crAccName;
                $jrtrDrAmt = NULL;
                $jrtrDrAccId = NULL;
                $jrtrDrDesc = NULL;
                $jrtrDesc = $transDescCR;
                $jrtrOthInfo = '';
                $jrtrDOB = $transactionDOB;

                $apiType = 'insert';
                include 'ommpjrtr.php';
            }
            if ($transAmtDr[$i] != '' && $transAmtDr[$i] != NULL && $transAmtDr[$i] != 0 && $transToAcc[$i] != '' && $transToAcc[$i] != NULL) {
                $jrtrJId = '';
                $jrtrJrnlId = $jrnlId;
                $jrtrOwnId = $transactionOwnerId;
                $jrtrUserType = 'Trans';
                $jrtrTransId = $transTransId;
                $jrtrTransType = 'Trans';
                $jrtrFirmId = $transFirmId;
                $jrtrTransCRDR = 'DR';
                $jrtrCrAmt = NULL;
                $jrtrCrAccId = NULL;
                $jrtrCrDesc = NULL;
                $jrtrDrAmt = $transAmtDr[$i];
                $jrtrDrAccId = $transToAcc[$i];
                $jrtrDrDesc = $drAccName;
                $jrtrDesc = $transDescDR;
                $jrtrOthInfo = '';
                $jrtrDOB = $transactionDOB;
                $addExpense = 'AddExpense';
                $apiType = 'insert';
                include 'ommpjrtr.php';
            }



            // CODE TO SET JOURNAL ID TO CURRENT TRANSACTION ENTRY
            $query = "UPDATE transaction SET 
            transaction_jrnl_id='$jrnlId'
            WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_id ='$transTransId'";

            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }

            /*             * ******************************************************************************************* */
            /*                         END CODE TO ADD JOURNAL TRANS ENTRY                         */
            /*             * ******************************************************************************************* */
        }
    }
    if ($transCustId != '') {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionAdded&transactionCat=" . $transactionCategory . "&custId=" . $transCustId . "&firmId=" . $transFirmId . "&addedTransactionPanel=NEW_TRANS_PANEL");
    } else {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionAdded&transactionCat=" . $transactionCategory . "&firmId=" . $transFirmId . "&addedTransactionPanel=NEW_TRANS_PANEL");
    }
} else {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
}
?>