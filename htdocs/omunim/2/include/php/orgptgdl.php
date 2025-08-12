<?php

/*
 * **************************************************************************************
 * @tutorial: Transferred Girvi Delete
 * **************************************************************************************
 * 
 * Created on May 22, 2013 6:08:02 PM
 *
 * @FileName: olggtrgl.php
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

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpincr.php'; //file added @Author:PRIYA11AUG14
?>
<?php

$ownerId = $_SESSION['sessionOwnerId'];
$girviTransId = $_POST['girviTransId'];
$girviId = $_POST['girviId']; //GET GIRVI ID @AUTHOR: SANDY04JAN14
if ($girviTransId == '') {
    $girviTransId = $_GET['girviTransId'];
}
if ($girviId == '') {
    $girviId = $_GET['girviId']; //GET GIRVI ID @AUTHOR: SANDY04JAN14
}
if ($girviSettleSts == ''){
    $girviSettleSts = $_GET['gtrans_act_sts'];
}
if ($girviUpdSts == ''){
    $girviUpdSts = $_GET['gtrans_upd_sts'];
}
$panelName = $_GET['panelName'];

//echo '$panelName=' . $panelName . '$girviTransId=' . $girviTransId;

$girviId = $_GET['girviId']; //GET GIRVI ID @AUTHOR: SANDY04JAN14

//Start to add code if girvi is linked with ml loan to delete that loan @AUTHOR: SANDY14JAN14
$getMlLinkedLoanId = "SELECT gtrans_trans_type,gtrans_trans_loan_id,gtrans_jrnlid,gtrans_pre_serial_num,gtrans_serial_num,gtrans_paid_amt,gtrans_DOB,gtrans_firm_id FROM girvi_transfer "
        . "WHERE gtrans_id='$girviTransId' and gtrans_own_id='$ownerId'";
$resMlLinkedLoanId = mysqli_query($conn,$getMlLinkedLoanId);
$rowMlLinkedLoanId = mysqli_fetch_array($resMlLinkedLoanId, MYSQLI_ASSOC);
$mlLoanId = $rowMlLinkedLoanId['gtrans_trans_loan_id'];
$gTransJrnlId = $rowMlLinkedLoanId['gtrans_jrnlid'];
$gTransPreSerialNo = $rowMlLinkedLoanId['gtrans_pre_serial_num'];
$gTransSerialNo = $rowMlLinkedLoanId['gtrans_serial_num'];
$gTransPaidAmt = $rowMlLinkedLoanId['gtrans_paid_amt'];
$gTransDOB = $rowMlLinkedLoanId['gtrans_DOB'];
$gTransFirmId = $rowMlLinkedLoanId['gtrans_firm_id'];
$girviSettleSts = $rowAllGirvi['gtrans_act_sts'];
$girviTransStatus = $rowAllGirvi['gtrans_upd_sts'];
/* * ****************Start code to add sys log var @Author:PRIYA12APR14*********************** */
$sslg_trans_sub = 'TRANSFER LOAN DELETED';
$sysLogTransType = 'transLoan';
$sslg_firm_id = $gTransFirmId;
$sysLogTransId = $gTransPreSerialNo . $gTransSerialNo;
$sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Trans Date: ' . $gTransDOB . ', Amt Paid: ' . formatInIndianStyle($gTransPaidAmt);
include 'omslgapi.php';
$addSysLogInd = 'NO';
/* * ****************End code to add sys log var @Author:PRIYA12APR14*********************** */
if ($rowMlLinkedLoanId['gtrans_trans_type'] == 'Linked') {
    /**     * Start to first delete journal entry of this loan @AUTHOR: SANDY21JAN14 */
///Start Code to Get All Journal Id or TransId
    $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' and jrnl_trans_id='$mlLoanId'and jrnl_trans_type='LOAN' and jrnl_user_type='MoneyLender'"; //CHANGE IN LINE @AUTHOR: SANDY25JAN14
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);

    while ($rowJournalEntry = mysqli_fetch_array($resJournalEntry)) {
        $jrnlId = $rowJournalEntry['jrnl_id'];
        $jrnlId = $jrnlId;
        $apiType = 'delete';
        include 'ommpjrnl.php';

        $jrtrJrnlId = $jrnlId;
        $apiType = 'delete';
        include 'ommpjrtr.php';
    }
    /*     * *End to first delete journal entry of this loan @AUTHOR: SANDY21JAN14 */

    //now delete ml loan
    $delMlLoan = "DELETE FROM ml_loan WHERE ml_own_id = '$ownerId' and ml_id = '$mlLoanId'";
    if (!mysqli_query($conn,$delMlLoan)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//End to add code if girvi is linked with ml loan to delete that loan @AUTHOR: SANDY14JAN14
/* * ************Start code to add code to delete transfer journal entry @Author:PRIYA24MAY14********************* */
$queryJournal = "DELETE FROM journal where jrnl_trans_id='$girviTransId' and jrnl_trans_type = 'transLoan'";
if (!mysqli_query($conn,$queryJournal)) {
    die('Error: ' . mysqli_error($conn));
}

$queryJournalTrans = "DELETE FROM journal_trans where jrtr_trans_id='$girviTransId' and jrtr_trans_type = 'transLoan'";
if (!mysqli_query($conn,$queryJournalTrans)) {
    die('Error: ' . mysqli_error($conn));
}
/* * ************End code to add code to delete transfer journal entry @Author:PRIYA24MAY14********************* */
 $query = "UPDATE girvi_transfer SET gtrans_act_sts = '' WHERE gtrans_own_id = '$ownerId' and gtrans_id = '$girviId'";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}

//Start to update status in girvi table by making girv_transfer_id='' @AUTHOR: SANDY04JAN14//CHANGE @AUTHOR: SANDY20JAN14
if ($prinType == 'PRN' || $prinType == '') {
    $upQuery = "UPDATE girvi SET girv_transfer_id=NULL,girv_trans_firm_id=NULL,girv_transfer_ml_id=NULL WHERE girv_own_id ='$ownerId' and girv_id ='$girviId'";
    if (!mysqli_query($conn,$upQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
}
if ($prinType == 'APRN' || $prinType == 'LoanAddPrinTrans') {
    $upQuery = "UPDATE girvi_principal SET girv_prin_transfer_id=NULL,girv_prin_trans_firmId= NULL,girv_prin_trans_ml_id =NULL WHERE girv_prin_own_id ='$ownerId' and girv_prin_id ='$girviId'";
    if (!mysqli_query($conn,$upQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
}
header("Location: $documentRoot/include/php/orgptgdv.php?gTransStatus=" . $gTransStatus . "&selTFirmId=" . $selTFirmId . "&sortKeyword=" . $sortKeyword .
        "&searchColumn=" . $searchColumn . "&searchValue=" . $searchValue . "&page=" . $page . "&getMessage=" . 'girviDeleted');
?>