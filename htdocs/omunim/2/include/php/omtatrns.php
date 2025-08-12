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

$transactionOwnerId = $_SESSION['sessionOwnerId'];
$transPreVoucherNo = trim($_POST['transPreVoucherNo']);
$transPostVoucherNo = trim($_POST['transPostVoucherNo']);
$transSub = trim($_POST['transSub']);
$transAmt = trim($_POST['transAmt']);
$transFromAcc = trim($_POST['transFromAcc']);
$transToAcc = trim($_POST['transToAcc']);
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);
//$transactionType = trim($_POST['transactionType']);
$transactionCategory = trim($_POST['transactionCategory']);
$transFirmId = trim($_POST['transFirmId']);
$transCustId = trim($_POST['transCustId']);
$transactionDesc = trim($_POST['transactionDesc']);

// Start To protect MySQL injection
$transSub = stripslashes($transSub);
$transAmt = stripslashes($transAmt);
//$transactionType = stripslashes($transactionType);
$transactionCategory = stripslashes($transactionCategory);
$transFirmId = stripslashes($transFirmId);
$transCustId = stripslashes($transCustId);
$transactionDesc = stripslashes($transactionDesc);

$transSub = mysqli_real_escape_string($conn, $transSub);
$transAmt = mysqli_real_escape_string($conn, $transAmt);
//$transactionType = mysqli_real_escape_string($conn,$transactionType);
$transactionCategory = mysqli_real_escape_string($conn, $transactionCategory);
$transFirmId = mysqli_real_escape_string($conn, $transFirmId);
$transCustId = mysqli_real_escape_string($conn, $transCustId);
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
if ($transactionOwnerId != '' && $transactionOwnerId != NULL && $transSub != '' && $transSub != NULL && $transAmt != '' && $transAmt != NULL && $transactionCategory != '' && $transactionCategory != NULL && $transFirmId != '' && $transFirmId != NULL && $transFromAcc != '' && $transFromAcc != NULL && $transToAcc != '' && $transToAcc != NULL) {
//check for vch id already exist or not @AUTHOR: SANDY27JAN14
    $checkVchId = "SELECT transaction_pre_vch_id,transaction_post_vch_id FROM transaction WHERE transaction_own_id='$_SESSION[sessionOwnerId]'";
    $resCheckVchId = mysqli_query($conn, $checkVchId);
    while ($rowVchId = mysqli_fetch_array($resCheckVchId, MYSQLI_ASSOC)) {
        if (($rowVchId['transaction_pre_vch_id'] == om_strtoupper($transPreVoucherNo) || $rowVchId['transaction_pre_vch_id'] == strtolower($transPreVoucherNo)) && $rowVchId['transaction_post_vch_id'] == $transPostVoucherNo) {
            $error = "This Voucher Number is already exist!!!";
            header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=" . $error);
            exit(0);
        }
    }
//check for vch id already exist or not @AUTHOR: SANDY27JAN14
    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTrans = $rowAccounts['acc_user_acc'];

    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTrans = $strAccTrans . ' CR - ' . $rowAccounts['acc_user_acc'] . ' DR';

    $query = "INSERT INTO transaction (
		transaction_own_id,transaction_user_id,transaction_pre_vch_id,transaction_pre_vch_firm_id,transaction_post_vch_id,transaction_firm_id,
                transaction_amt,transaction_from_cr_acc_id,transaction_to_dr_acc_id,transaction_sub,
		transaction_type, transaction_cat,transaction_DOB,transaction_other_lang_DOB,transaction_desc,transaction_upd_sts,
		transaction_ent_dat) 
		VALUES (
		'$transactionOwnerId','$transCustId','$transPreVoucherNo','$transFirmId','$transPostVoucherNo','$transFirmId',
                '$transAmt','$transFromAcc','$transToAcc','$transSub',
		'$strAccTrans','$transactionCategory','$transactionDOB','$transactionOtherLangDOB','$transactionDesc','New',
		$currentDateTime)";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
    $sslg_trans_sub = 'NEW DAILY TRANSACTION ADDED';
    $sysLogTransType = 'Trans';
    $sysLogTransId = $transPreVoucherNo . $transPostVoucherNo;
    $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ',  Transaction Date: ' . $transactionDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmt) . ',Sub: ' . substr($transSub, 0, 16);
    /*     * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */
    $qSelTransId = "SELECT transaction_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' order by transaction_id desc LIMIT 0,1";
    $resTransId = mysqli_query($conn, $qSelTransId);
    $rowTransId = mysqli_fetch_array($resTransId, MYSQLI_ASSOC);
    $TransId = $rowTransId['transaction_id'];
    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry @AUTHOR:PRIYA29JAN13                            */
    /*     * ******************************************************************************************* */

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];

    $jrnlOwnId = $transactionOwnerId;
    $jrnlJId = '';
    $jrnlUserId = $TransId;
    $jrnlUserType = 'Trans';
    $jrnlTransId = $TransId; // Used to navigate
    $jrnlTransType = 'Trans'; //Where we hv to navigate
    $jrnlFirmId = $transFirmId;
    $jrnlTTDr = $transAmt;
    $jrnlDrAccId = $transToAcc;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $transAmt;
    $jrnlCrAccId = $transFromAcc;
    $jrnlCrDesc = $crAccName;
    $jrnlDesc = $transSub;
    $jrnlOthInfo = '';
    $jrnlDOB = $transactionDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
    // REPLACED JRNL_SINCE TO JRNL_ID @RATNAKAR 13FEB2018 
    $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id
//    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='23'";
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $drAccName = $rowAccName['acc_user_acc'];
//
//    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviAccId'";
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $crAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $transactionOwnerId;
    $jrtrUserId = $TransId;
    $jrtrUserType = 'Trans';
    $jrtrTransId = $TransId;
    $jrtrTransType = 'Trans';
    $jrtrFirmId = $transFirmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $transAmt;
    $jrtrDrAccId = $transToAcc; //Secured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $transAmt;
    $jrtrCrAccId = $transFromAcc; //Girvi Payment Account Id
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = $transSub;
    $jrtrOthInfo = '';
    $jrtrDOB = $transactionDOB;

    $apiType = 'insert';
    include 'ommpjrtr.php';
    //END CODE 

    $query = "UPDATE transaction SET 
            transaction_jrnl_id='$jrnlId'
            WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_id ='$TransId'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                         END CODE To Add Journal Entry @AUTHOR:PRIYA29JAN13                            */
    /*     * ******************************************************************************************* */
    if ($transCustId != '') {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionAdded&transactionCat=" . $transactionCategory . "&custId=" . $transCustId);
    } else {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionAdded&transactionCat=" . $transactionCategory);
    }
} else {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
}
?>