<?php

/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormlndel.php
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

//CHANGE IN FILE @AUTHOR: SANDY22JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'ommpincr.php';
//CHANGES IN FILE @AUTHOR: SANDY03JAN14
require_once 'system/omssopin.php';
$loanId = $_GET['loanId'];
$mlId = $_GET['mlId'];
$serialNum = $_GET['serialNum'];
$mlDOB = $_GET['loanDOB'];
$loanFirmId = $_GET['girviFirmId'];
$prinAmt = $_GET['prinAmt'];
?>
<?php

/* * ****************End code to add sys log var @Author:PRIYA07JUL14************* */
$sslg_trans_sub = 'MONEYLENDER LOAN DELETED';
$sysLogTransType = 'transLoan';
$sslg_firm_id = $loanFirmId;
$sysLogTransId = $serialNum;
$sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Date: ' . $mlDOB . ', Loan Amount: ' . formatInIndianStyle($prinAmt);
include 'omslgapi.php';
$addSysLogInd = 'NO';
/* * ****************End code to add sys log var @Author:PRIYA07JUL14*********************** */
/* * *Start to first delete journal entry of this loan @AUTHOR: SANDY20JAN14 */
///Start Code to Get All Journal Id or TransId
$qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' and jrnl_trans_id='$loanId' and jrnl_trans_type='LOAN' and jrnl_user_type='MoneyLender'";
$resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
//End Code to Get All Journal Id
while ($rowJournalEntry = mysqli_fetch_array($resJournalEntry)) {
    $jrnlId = $rowJournalEntry['jrnl_id'];
    $jrnlId = $jrnlId;
    $apiType = 'delete';
    include 'ommpjrnl.php';

    $jrtrJrnlId = $jrnlId;
    $apiType = 'delete';
    include 'ommpjrtr.php';
}
/* * *End to first delete journal entry of this loan @AUTHOR: SANDY20JAN14 */
//Delete all ml_transaction table entries
$delMlTransaction = "DELETE FROM ml_transaction WHERE ml_trans_mondep_lender_id='$mlId' and ml_trans_mondep_loan_id='$loanId' and ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn,$delMlTransaction)) {
    die('Error: ' . mysqli_error($conn));
}

//Delete ml_comments table entries
$delMlComments = "DELETE FROM ml_comments WHERE ml_comm_cust_id='$mlId' and ml_comm_ml_id='$loanId' and ml_comm_own_id='$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn,$delMlComments)) {
    die('Error: ' . mysqli_error($conn));
}

//delete loan from ml_loan table
$delQuery = "DELETE FROM ml_loan WHERE ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_id='$loanId'";
if (!mysqli_query($conn,$delQuery)) {
    die('Error: ' . mysqli_error($conn));
}


//UPDATE GIRVI AND ADDITIONAL PRIN related to above money lender loan @AUTHOR: SANDY04JAN14
$getAllPrinDet = "SELECT gtrans_prin_typ,gtrans_girvi_id,gtrans_prin_id FROM girvi_transfer WHERE gtrans_trans_loan_id='$loanId' and gtrans_own_id='$_SESSION[sessionOwnerId]'";
$resPrinDet = mysqli_query($conn,$getAllPrinDet);
while ($row = mysqli_fetch_array($resPrinDet, MYSQLI_ASSOC)) {
    if ($row['gtrans_prin_typ'] == 'MainPrin') {
        $girviId = $row['gtrans_girvi_id'];
        $upQuery = "UPDATE girvi SET girv_transfer_id='' WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_id='$girviId'";
        if (!mysqli_query($conn,$upQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
    } else {
        $prinId = $row['gtrans_prin_id'];
        $upQuery = "UPDATE girvi_principal SET girv_prin_transfer_id='' WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_id='$prinId'";
        if (!mysqli_query($conn,$upQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
//delete all girvi from girvi transfer table related to above money lender loan
$delQuery = "DELETE FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and  gtrans_trans_loan_id='$loanId'";
if (!mysqli_query($conn,$delQuery)) {
    die('Error: ' . mysqli_error($conn));
}



header("Location: " . $documentRoot . "/include/php/ormllndt.php?mlId=" . $mlId);
?>