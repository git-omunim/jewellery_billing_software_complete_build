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
//
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
$transactionCategory = trim($_POST['transactionCategory']);
$transFirmId = trim($_POST['transFirmId']);
$transactionDesc = trim($_POST['transactionDesc']);
$jrnlId = trim($_POST['jrnlId']); //@AUTHOR: SANDY15JAN14
$TransId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['transId'])));

// Start To protect MySQL injection
$transSub = stripslashes($transSub);
$transAmt = stripslashes($transAmt);
$transactionCategory = stripslashes($transactionCategory);
$transFirmId = stripslashes($transFirmId);
$transactionDesc = stripslashes($transactionDesc);
$transSub = mysqli_real_escape_string($conn, $transSub);
$transAmt = mysqli_real_escape_string($conn, $transAmt);
$transactionCategory = mysqli_real_escape_string($conn, $transactionCategory);
$transFirmId = mysqli_real_escape_string($conn, $transFirmId);
$transactionDesc = mysqli_real_escape_string($conn, $transactionDesc);
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
if ($transactionOwnerId != '' && $transactionOwnerId != NULL && $transSub != '' && $transSub != NULL && $transAmt != '' && $transAmt != NULL &&
        $transactionCategory != '' && $transactionCategory != NULL && $transFirmId != '' && $transFirmId != NULL && $transFromAcc != '' && $transFromAcc != NULL &&
        $transToAcc != '' && $transToAcc != NULL) {

    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTrans = $rowAccounts['acc_user_acc'];

    $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc'";
    $resAccounts = mysqli_query($conn, $qSelAccount) or die(mysqli_error($conn));
    $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
    $strAccTrans = $strAccTrans . ' CR - ' . $rowAccounts['acc_user_acc'] . ' DR';

    $qSelTransSub = "SELECT transaction_sub,transaction_user_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' AND transaction_id='$TransId'";
    $resTransSub = mysqli_query($conn, $qSelTransSub);
    $rowTransSub = mysqli_fetch_array($resTransSub, MYSQLI_ASSOC);
    $transaction_sub_old = $rowTransSub['transaction_sub'];
    $transaction_user_id = $rowTransSub['transaction_user_id'];

    $qSelJournalEntry = "SELECT jrtr_desc FROM journal_trans where jrtr_own_id='$_SESSION[sessionOwnerId]' AND jrtr_trans_id='$TransId'";
    // REPLACED JRNL_SINCE TO JRNL_ID @RATNAKAR 13FEB2018 
    $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrtr_desc = $rowJournalEntry['jrtr_desc'];

//    if ($transaction_sub_old != $jrtr_desc)
//        $transaction_sub_old = $jrtr_desc;
    //
    $query = "UPDATE transaction SET
		transaction_own_id='$transactionOwnerId',transaction_firm_id='$transFirmId',
                transaction_amt='$transAmt',transaction_from_cr_acc_id='$transFromAcc',transaction_to_dr_acc_id='$transToAcc',transaction_sub='$transSub',
		transaction_type='$strAccTrans', transaction_cat='$transactionCategory',transaction_DOB='$transactionDOB',transaction_desc='$transactionDesc',transaction_upd_sts='Updated',
		transaction_ent_dat=$currentDateTime,transaction_other_lang_DOB='$transactionOtherLangDOB' 
		WHERE transaction_own_id='$transactionOwnerId' and transaction_pre_vch_id='$transPreVoucherNo'and transaction_pre_vch_firm_id='$transFirmId' and transaction_post_vch_id='$transPostVoucherNo'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
    $sslg_trans_sub = 'DAILY TRANSACTION UPDATED';
    $sysLogTransType = 'Trans';
    $sysLogTransId = $transPreVoucherNo . $transPostVoucherNo;
    $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ',  Transaction Date: ' . $transactionDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmt) . ',Sub: ' . substr($transSub, 0, 16);
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    /*     * ********Start code to comment this code @Author:PRIYA07APR15***************** */
//    $qSelTransId = "SELECT transaction_id FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]' order by transaction_ent_dat desc LIMIT 0,1";
//    $resTransId = mysqli_query($conn,$qSelTransId);
//    $rowTransId = mysqli_fetch_array($resTransId, MYSQLI_ASSOC);
//    $TransId = $rowTransId['transaction_id'];
    /*     * ********End code to comment this code @Author:PRIYA07APR15***************** */





    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];

    /*     * *Start to update jrnl entries @AUTHOR: SANDY15JAN14******** */
    $jrnlOwnId = $transactionOwnerId;
    $jrnlJId = $jrnlId;
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
    $jrnlDesc = $transaction_sub_old; //MESSAGE CHANGED @Author:PRIYA07APR15
    $jrnlDescUpd = $transSub;
    $jrnlOthInfo = '';
    $jrnlDOB = $transactionDOB;

    $apiType = 'update';
    include 'ommpjrnl.php';



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
    $jrtrDesc = $transaction_sub_old; //description changed @Author:SHRI04JUN15
    $jrtrDescUpd = $transSub;
    $jrtrOthInfo = '';
    $jrtrDOB = $transactionDOB;

    $apiType = 'update';
    include 'ommpjrtr.php';
    //END CODE 

    $query = "UPDATE transaction SET 
            transaction_jrnl_id='$jrnlId'
            WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_id ='$TransId'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *End to update jrnl entries @AUTHOR: SANDY15JAN14******** */
    /*     * ******************************************************************************************* */
    /*                         END CODE To Add Journal Entry @AUTHOR:PRIYA29JAN13                            */
    /*     * ******************************************************************************************* */
    if ($subPanelName == 'updateWithUserId') {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionUpdated&transactionCat=" . $transactionCategory . "&transUpPanel=oldTransaction" . "&custId=" . $transaction_user_id);
    } else {
        header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionUpdated&transactionCat=" . $transactionCategory . "&transUpPanel=oldTransaction");
    }
} else {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
}
?>
