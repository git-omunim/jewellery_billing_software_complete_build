<?php

/*
 * **************************************************************************************
 * @tutorial: Release Transferred Grivi
 * **************************************************************************************
 * 
 * Created on Jul 5, 2012 5:58:21 PM
 *
 * @FileName: ormlrlpr.php
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

//change in file @AUTHOR: SANDY31JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';

$girviOwnerId = $_SESSION['sessionOwnerId'];
$prinType = trim($_POST['prinType']);
$loanId = trim($_POST['loanId']);
$mlId = trim($_POST['mlId']);

$transId = trim($_POST['transId']);
$totAmount = trim($_POST['totAmount']);
$amountPaid = trim($_POST['amountPaid']);
$interestPaid = trim($_POST['interestPaid']);
$discountPaid = trim($_POST['discountPaid']);
$relDD = trim($_POST['relDD']);
$relMM = trim($_POST['relMM']);
$relYY = trim($_POST['relYY']);
$timePeriod = trim($_POST['timePeriod']);

if ($discountPaid == '' or $discountPaid == NULL) {
    $discountPaid = 0;
}

$girvDOR = $relDD . ' ' . $relMM . ' ' . $relYY;

//Start to check it is linked or not If linked release ml_loan
$getLinkedLoanId = "SELECT * FROM girvi_transfer WHERE gtrans_own_id ='$girviOwnerId' and gtrans_id = '$transId'";
$resLiankedLoanId = mysqli_query($conn,$getLinkedLoanId);
$row = mysqli_fetch_array($resLiankedLoanId, MYSQLI_ASSOC);
$loanId = $row['gtrans_trans_loan_id'];
$girviMainId = $row['gtrans_girvi_id'];
$prinType = $row['gtrans_prin_typ'];
$prinId = $row['gtrans_prin_id'];

if ($row['gtrans_trans_type'] == 'Linked') {
    $query = "UPDATE ml_loan SET
		ml_upd_sts='Released',
		ml_DOR='$girvDOR',
                ml_total_time='$timePeriod',
                ml_total_amt='$totAmount',
                ml_paid_amt='$amountPaid',
                ml_paid_int='$interestPaid',
                ml_discount_amt='$discountPaid'
		WHERE ml_own_id ='$girviOwnerId' and ml_id ='$loanId'"; //CHANGE IN QUERY TO PASS GIRVI DOR DATE @AUTHOR: SANDY08JAN14

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry 
      /*         * ******************************************************************************************* */
    //get Ml id of this linked loan
    $getLinkedLoanMlId = "SELECT ml_firm_id FROM ml_loan WHERE ml_own_id ='$girviOwnerId' and ml_id ='$loanId'";
    $resLiankedLoanMlId = mysqli_query($conn,$getLinkedLoanMlId);
    $row = mysqli_fetch_array($resLiankedLoanMlId, MYSQLI_ASSOC);
    $mlId = $row ['ml_lender_id'];
    $loanFirmId = $row ['ml_firm_id'];

    //get details of money lender from supplier table
    $selMlDet = "SELECT user_acc_id FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$mlId'";
    $resSelMlDet = mysqli_query($conn,$selMlDet);
    $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
    $lenderFirstName = $row['user_fname'];
    $lenderLastName = $row['user_lname'];
    $mlAccId = $row['user_acc_id'];
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'];
    $drAccId = $mlAccId;

    $selAccName = "SELECT acc_user_acc,acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];
    $crAccId = $rowAccName['acc_id'];

    $jrnlOwnId = $girviOwnerId;
    $jrnlJId = '';
    $jrnlUserId = $mlId;
    $jrnlUserType = 'Money Lender';
    $jrnlTransId = $loanId; // Used to navigate
    $jrnlTransType = 'Loan'; //Where we hv to navigate
    $jrnlFirmId = $loanFirmId;
    $jrnlTTDr = $amountPaid;
    $jrnlDrAccId = $drAccId;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $amountPaid;
    $jrnlCrAccId = $crAccId;
    $jrnlCrDesc = $crAccName;
    $jrnlDesc = 'ML Loan Released';
    $jrnlOthInfo = '';
    $jrnlDOB = $girvDOR;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $girviOwnerId;
    $jrtrUserId = $mlId;
    $jrtrUserType = 'Money Lender';
    $jrtrTransId = $loanId;
    $jrtrTransType = 'Loan';
    $jrtrFirmId = $loanFirmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $totalPrincipalAmount;
    $jrtrDrAccId = $drAccId; //Secured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $totalPrincipalAmount;
    $jrtrCrAccId = $crAccId; //loan Payment Account Id
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = 'Released ML Loan Principal Amt';
    $jrtrOthInfo = '';
    $jrtrDOB = $girvDOR;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    //For Interest Amount
    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Direct Expenses'"; //16
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drIncomeAccId = $rowAccName['acc_id'];
    $drIncomeAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $girviOwnerId;
    $jrtrUserId = $mlId;
    $jrtrUserType = 'Money Lender';
    $jrtrTransId = $loanId;
    $jrtrTransType = 'Loan';
    $jrtrFirmId = $loanFirmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $interestPaid;
    $jrtrDrAccId = $drIncomeAccId; //Income
    $jrtrDrDesc = $drIncomeAccName;
    $jrtrCrAmt = $interestPaid;
    $jrtrCrAccId = $crAccId; //loan Payment Account Id
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = 'Released ML Loan Interest Amt';
    $jrtrOthInfo = '';
    $jrtrDOB = $girvDOR;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    if ($discountPaid > 0) {
        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and 
            acc_firm_id='$loanFirmId' and acc_user_acc='Direct Incomes'"; //16
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crDisAccId = $rowAccName['acc_id'];
        $crDisAccName = $rowAccName['acc_user_acc'];

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $girviOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'Money Lender';
        $jrtrTransId = $loanId;
        $jrtrTransType = 'Loan';
        $jrtrFirmId = $loanFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $discountPaid;
        $jrtrDrAccId = $drIncomeAccId; //Income
        $jrtrDrDesc = $drIncomeAccName;
        $jrtrCrAmt = $discountPaid;
        $jrtrCrAccId = $crDisAccId; //loan Payment Account Id
        $jrtrCrDesc = $crDisAccName;
        $jrtrDesc = 'Released ML Loan Discount Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $girvDOR;

        $apiType = 'insert';
        include 'ommpjrtr.php';
    }
    //END CODE  
    /*     * ******************************************************************************************* */
    /*                         END CODE To Add Journal Entry                         */
    /*     * ******************************************************************************************* */
}
//End to check it is linked or not If linked release ml_loan

$query = "UPDATE girvi_transfer SET
		gtrans_upd_sts='Released',
		gtrans_DOR='$girvDOR',
                gtrans_total_amt = '$totAmount',
                gtrans_paid_amt='$amountPaid',
                gtrans_paid_int='$interestPaid',
                gtrans_discount_amt='$discountPaid',gtrans_time_period='$timePeriod'
		WHERE gtrans_own_id = '$girviOwnerId' and gtrans_id = '$transId' and gtrans_upd_sts!='Released'";


if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
//update girvi table @AUTHOR: SANDY31JAN14
if ($prinType == 'MainPrin') {
    $updateGirvi = "UPDATE girvi SET girv_transfer_id=NULL,girv_transfer_ml_id=NULL WHERE girv_id='$girviMainId' and girv_own_id='$girviOwnerId'";
    if (!mysqli_query($conn,$updateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $updateGirvi = "UPDATE girvi_principal SET girv_prin_transfer_id=NULL,girv_prin_trans_ml_id =NULL WHERE girv_prin_id='$prinId' and girv_prin_own_id='$girviOwnerId'";
    if (!mysqli_query($conn,$updateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//update girvi table @AUTHOR: SANDY31JAN14
header("Location: " . $documentRoot . "/include/php/ormlupln.php?loanId=$loanId&mlId=$mlId"); //change in filename @AUTHOR: SANDY20NOV13

require_once 'omssclin.php';
?>