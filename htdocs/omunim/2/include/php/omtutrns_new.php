<?php /**
 * 
 * Created on Jul 26, 2011 1:01:51 PM
 *
 * @FileName: omtutrns.php
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
//$transactionOwnerId = $_SESSION['sessionOwnerId'];
//$transPreVoucherNo = trim($_POST['transPreVoucherNo']);
//$transPostVoucherNo = trim($_POST['transPostVoucherNo']);
//$transSub = trim($_POST['transSub']);
//$transAmt = trim($_POST['transAmt']);
//$transFromAcc = trim($_POST['transFromAcc']);
//$transToAcc = trim($_POST['transToAcc']);
//$DOBDay = trim($_POST['DOBDay']);
//$DOBMonth = trim($_POST['DOBMonth']);
//$DOBYear = trim($_POST['DOBYear']);
//$transactionCategory = trim($_POST['transactionCategory']);
//$transFirmId = trim($_POST['transFirmId']);
//$transactionDesc = trim($_POST['transactionDesc']);
//$jrnlId = trim($_POST['jrnlId']); //@AUTHOR: SANDY15JAN14
$TransId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transId'])));
//
//// Start To protect MySQL injection
//$transSub = stripslashes($transSub);
//$transAmt = stripslashes($transAmt);
//$transactionCategory = stripslashes($transactionCategory);
//$transFirmId = stripslashes($transFirmId);
//$transactionDesc = stripslashes($transactionDesc);
//$transSub = mysqli_real_escape_string($conn,$transSub);
//$transAmt = mysqli_real_escape_string($conn,$transAmt);
//$transactionCategory = mysqli_real_escape_string($conn,$transactionCategory);
//$transFirmId = mysqli_real_escape_string($conn,$transFirmId);
//$transactionDesc = mysqli_real_escape_string($conn,$transactionDesc);
//$transactionDOB = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;

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
//$transactionDesc = trim($_POST['transactionDesc']);
$transAmtCrTotal = trim($_POST['transAmtCrTotal']);
$transAmtDrTotal = trim($_POST['transAmtDrTotal']);
$transactionDesc = trim($_POST['txtEditorContent']);

$transDRMainAcc = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transToMainAcc'])));
$transCRMainAcc = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transFromMainAcc'])));

//echo '$transactionDesc:'.$transactionDesc;
if ($noOfTransactions != '') {
    for ($i = 1; $i <= $noOfTransactions; $i++) {
        $transIdArr[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transId' . $i])));
        $transAmtCr[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transAmtCr' . $i])));
        $transAmtDr[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transAmtDr' . $i])));
        $transFromAcc[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transFromAcc' . $i])));
        $transToAcc[$i] = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transToAcc' . $i])));
    }
}
//print_r($transIdArr);
// Start To protect MySQL injection
$transSub = stripslashes($transSub);
//$transAmt = stripslashes($transAmt);
//$transactionType = stripslashes($transactionType);
$transactionCategory = stripslashes($transactionCategory);
$transFirmId = stripslashes($transFirmId);
$transactionDesc = stripslashes($transactionDesc);

$transSub = mysqli_real_escape_string($conn, $transSub);
//$transAmt = mysqli_real_escape_string($conn,$transAmt);
//$transactionType = mysqli_real_escape_string($conn,$transactionType);
$transactionCategory = mysqli_real_escape_string($conn, $transactionCategory);
$transFirmId = mysqli_real_escape_string($conn, $transFirmId);
$transactionDesc = mysqli_real_escape_string($conn, $transactionDesc);
// End To protect MySQL injection
//
$subPanelName = $_REQUEST['subPanelName'];
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

    $qSelTransSub = "SELECT transaction_sub,transaction_user_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' AND transaction_id='$TransId'";
    $resTransSub = mysqli_query($conn, $qSelTransSub);
    $rowTransSub = mysqli_fetch_array($resTransSub, MYSQLI_ASSOC);
    $transaction_sub_old = $rowTransSub['transaction_sub'];
    $transaction_user_id = $rowTransSub['transaction_user_id'];

    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transCRMainAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTransMain = $rowAccounts['acc_user_acc'];

    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transDRMainAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTransMain = $strAccTransMain . ' CR - ' . $rowAccounts['acc_user_acc'] . ' DR';

    $query = "UPDATE transaction SET
		transaction_own_id='$transactionOwnerId',transaction_firm_id='$transFirmId',
                transaction_amt='$transAmtCrTotal',transaction_sub='$transSub',transaction_other_lang_DOB='$transactionOtherLangDOB',
		transaction_type='$strAccTransMain', transaction_cat='$transactionCategory',transaction_DOB='$transactionDOB',transaction_desc='$transactionDesc',transaction_upd_sts='Updated',
		transaction_ent_dat=$currentDateTime,transaction_from_cr_acc_id='$transCRMainAcc',transaction_to_dr_acc_id='$transDRMainAcc'
		WHERE transaction_own_id='$transactionOwnerId' and transaction_pre_vch_id='$transPreVoucherNo' and transaction_pre_vch_firm_id='$transFirmId' and transaction_post_vch_id='$transPostVoucherNo'";

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
    $sslg_trans_sub = 'DAILY TRANSACTION UPDATED';
    $sysLogTransType = 'Trans';
    $sysLogTransId = $transPreVoucherNo . $transPostVoucherNo;
    if($staffId != ''){
        $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ',  Transaction Date: ' . $transactionDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmtCrTotal) . ',Sub: ' . substr($transSub, 0, 16). ',Staff Name: ' . $staffName;
    
    }else{
    $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ',  Transaction Date: ' . $transactionDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmtCrTotal) . ',Sub: ' . substr($transSub, 0, 16);
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */

    $qSelJrnlId = "SELECT transaction_jrnl_id FROM transaction where transaction_id='$TransId'";
    $resJrnlId = mysqli_query($conn, $qSelJrnlId) or die(mysqli_error($conn));
    $rowJrnlId = mysqli_fetch_array($resJrnlId, MYSQLI_ASSOC);
    $jrnlId = $rowJrnlId['transaction_jrnl_id'];

//    echo '$qSelJrnlId:'.$qSelJrnlId.'<br/>';
//    echo '$jrnlId:'.$jrnlId.'<br/>';


    /*     * **********************************************************************************************
     *  START CODE FOR JOURNAL ENTRY UPDATE
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
    $jrnlJId = $jrnlId;
    $jrnlUserId = $TransId;
    $jrnlUserType = 'Trans';
    $jrnlTransId = $TransId;
    $jrnlTransType = 'Trans';
    $jrnlFirmId = $transFirmId;
    $jrnlTTDr = $transAmtDrTotal;
    $jrnlDrAccId = $transDRMainAcc;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $transAmtCrTotal;
    $jrnlCrAccId = $transCRMainAcc;
    $jrnlCrDesc = $crAccName;
    $jrnlDesc = $transaction_sub_old;
    $jrnlDescUpd = $transSub;
    $jrnlOthInfo = '';
    $jrnlDOB = $transactionDOB;

    $apiType = 'update';
    include 'ommpjrnl.php';
    /*     * **********************************************************************************************
     *  END CODE FOR JOURNAL ENTRY UPDATE
     * ********************************************************************************************** */


    for ($i = 1; $i <= $noOfTransactions; $i++) {
//        if (($transAmtCr[$i] != '' && $transAmtCr[$i] != NULL && $transAmtCr[$i] != 0 && $transFromAcc[$i] != '' && $transFromAcc[$i] != NULL) || ($transAmtDr[$i] != '' && $transAmtDr[$i] != NULL && $transAmtDr[$i] != 0 && $transToAcc[$i] != '' && $transToAcc[$i] != NULL)) {

        $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc[$i]'";
        $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
        $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
        $strAccTrans = $rowAccounts['acc_user_acc'];

        $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc[$i]'";
        $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
        $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
        $strAccTrans = $strAccTrans . ' CR - ' . $rowAccounts['acc_user_acc'] . ' DR';

        $transTransId = $transIdArr[$i];
        $query = "UPDATE transaction SET
		transaction_own_id='$transactionOwnerId',transaction_firm_id='$transFirmId',transaction_from_cr_acc_id='$transFromAcc[$i]',transaction_to_dr_acc_id='$transToAcc[$i]',"
                . "transaction_cr_amt='$transAmtCr[$i]',transaction_dr_amt='$transAmtDr[$i]',transaction_type='$strAccTrans',"
                . "transaction_upd_sts='Updated',transaction_ent_dat=$currentDateTime"
                . "WHERE transaction_own_id='$transactionOwnerId' and transaction_id='$transTransId'";


        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }

        /*         * ******************************************************************************************* */
        /*                       START CODE TO UPDATE JOURNAL TRANS ENTRY                           */
        /*         * ******************************************************************************************* */



        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc[$i]'";
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccName = $rowAccName['acc_user_acc'];

        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc[$i]'";
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccName = $rowAccName['acc_user_acc'];


//            if ($transAmtCr[$i] != '' && $transAmtCr[$i] != NULL && $transAmtCr[$i] != 0 && $transFromAcc[$i] != '' && $transFromAcc[$i] != NULL) {

        $qSelJournalEntryCR = "SELECT jrtr_desc FROM journal_trans where jrtr_own_id='$_SESSION[sessionOwnerId]' AND jrtr_trans_id='$transTransId' AND jrtr_tr_crdr='CR'";
        $resJournalEntryCR = mysqli_query($conn, $qSelJournalEntryCR);
        $rowJournalEntryCR = mysqli_fetch_array($resJournalEntryCR);
        $jrtr_desc_cr = $rowJournalEntryCR['jrtr_desc'];

//                echo $qSelJournalEntryCR.'<br/>';
//                echo '$jrtr_desc_cr:'.$jrtr_desc_cr.'<br/>';

        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $transactionOwnerId;
        $jrtrUserId = NULL;
        $jrtrUserType = 'Trans';
        $jrtrTransId = $transTransId;
        $jrtrTransType = 'Trans';
        $jrtrFirmId = $transFirmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = NULL;
        $jrtrDrAccId = NULL;
        $jrtrDrDesc = NULL;
        $jrtrCrAmt = $transAmtCr[$i];
        $jrtrCrAccId = $transFromAcc[$i];
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = $jrtr_desc_cr;
        $jrtrDescUpd = $jrtr_desc_cr;
        $jrtrOthInfo = '';
        $jrtrDOB = $transactionDOB;

        $apiType = 'update';
        include 'ommpjrtr.php';
//            }
//            if ($transAmtDr[$i] != '' && $transAmtDr[$i] != NULL && $transAmtDr[$i] != 0 && $transToAcc[$i] != '' && $transToAcc[$i] != NULL) {

        $qSelJournalEntryDR = "SELECT jrtr_desc FROM journal_trans where jrtr_own_id='$_SESSION[sessionOwnerId]' AND jrtr_trans_id='$transTransId' AND jrtr_tr_crdr='DR'";
        $resJournalEntryDR = mysqli_query($conn, $qSelJournalEntryDR);
        $rowJournalEntryDR = mysqli_fetch_array($resJournalEntryDR);
        $jrtr_desc_dr = $rowJournalEntryDR['jrtr_desc'];

//                echo $qSelJournalEntryDR.'<br/>';
//                echo '$jrtr_desc_cr:'.$jrtr_desc_dr.'<br/>';

        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $transactionOwnerId;
        $jrtrUserId = NULL;
        $jrtrUserType = 'Trans';
        $jrtrTransId = $transTransId;
        $jrtrTransType = 'Trans';
        $jrtrFirmId = $transFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $transAmtDr[$i];
        $jrtrDrAccId = $transToAcc[$i];
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = NULL;
        $jrtrCrAccId = NULL;
        $jrtrCrDesc = NULL;
        $jrtrDesc = $jrtr_desc_dr;
        $jrtrDescUpd = $jrtr_desc_dr;
        $jrtrOthInfo = '';
        $jrtrDOB = $transactionDOB;

        $apiType = 'update';
        $updateExpense = 'updateExpense';
        include 'ommpjrtr.php';
//            }
//          /*             * ******************************************************************************************* */
        /*                       END CODE TO UPDATE JOURNAL TRANS ENTRY                           */
        /*         * ******************************************************************************************* */
//
        $query = "UPDATE transaction SET 
            transaction_jrnl_id='$jrnlId'
            WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_id ='$transTransId'";

        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
//        }
    }
    if ($subPanelName == 'updateWithUserId') {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionUpdated&transactionCat=" . $transactionCategory . "&custId=" . $transaction_user_id . "&addedTransactionPanel=NEW_TRANS_PANEL");
    } else {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionUpdated&transactionCat=" . $transactionCategory . "&addedTransactionPanel=NEW_TRANS_PANEL");
    }
} else {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
}
?>
