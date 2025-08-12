<?php

/* //TO RELEASE MONEY LENDERS LOAN @AUTHOR: SANDY27NOV13
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: ormlrlln.php
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
 */
?>
<?php

//CHANGES IN FILE @AUTHOR: SANDY25JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'ommpincr.php';
require_once 'system/omssopin.php';

$loanOwnerId = $_SESSION['sessionOwnerId'];
$mlId = trim($_POST['mlId']);
$loanId = trim($_POST['loanId']);
$pageNo = trim($_POST['pageNo']);
$timeVar = trim($_POST['timeVar']); //to access time var @AUTHOR: SANDY08JAN14
$totalPrincipalAmount = intval(trim($_POST['totalPrincipalAmount']));
$amountPaid = intval(trim($_POST['amountPaid']));
$interestPaid = intval(trim($_POST['interestPaid']));
$discountPaid = trim($_POST['discountPaid']);
$relDD = trim($_POST['relDD']);
$relMM = trim($_POST['relMM']);
$relYY = trim($_POST['relYY']);
$loanIntOpt = trim($_POST['simpleOrCompIntOption']);
$loanIntCompoundedOpt = trim($_POST['loanCompoundedOption']);
$ROIType = trim($_POST['interestType']);
$gMonthIntOption = trim($_POST['gMonthIntOption']);
$loanFirmId = trim($_POST['loanFirmId']);
$loanAccId = trim($_POST['loanAccId']);
$mainPrinAmt = trim($_POST['mainPrinAmt']); // var added @Author:PRIYA01APR14
$mlLoanAccId = trim($_POST['mlLoanAccId']);
$mlLoanCashAccId = trim($_POST['mlLoanCashAccId']);
$mlLoanIntAccId = trim($_POST['mlLoanIntAccId']);
$mlLoanDiscAccId = trim($_POST['mlLoanDiscAccId']);
//$loanComments = trim($_POST['loanComm']);
if ($pageNo == '') { //if page no is not set pass 1 @AUTHOR: 22JAN14
    $pageNo = 1;
}
if ($discountPaid == '' or $discountPaid == NULL) {
    $discountPaid = 0;
}
$girvDOR = $relDD . ' ' . $relMM . ' ' . $relYY;

if ($mlId == '' or $mlId == NULL or $loanId == '' or $loanId == NULL or $girvDOR == '' or $girvDOR == NULL) {

    header("Location: " . $documentRoot . "/omLoginPage.php");
} else {
    /*     * *******************Start to check loan is already released or not @AUTHOR: SANDY3OCT13******************** */
    $checkloanStatus = "SELECT ml_upd_sts,ml_loan_type,ml_ln_cr_dr,ml_pre_serial_num,ml_serial_num,ml_DOB FROM ml_loan WHERE ml_own_id = '$loanOwnerId' and "
            . "ml_lender_id ='$mlId' and ml_id ='$loanId'";
    $resCheckloanStatus = mysqli_query($conn,$checkloanStatus);
    $row = mysqli_fetch_array($resCheckloanStatus);
    $status = $row['ml_upd_sts'];
    $loanType = $row['ml_loan_type']; //access loantype @AUTHOR: SANDY15JAN14
    $crDrType = $row['ml_ln_cr_dr'];
    $preSerialNo = $row['ml_pre_serial_num'];
    $serialNo = $row['ml_serial_num'];
    $mlDOB = $row['ml_DOB'];
    /*     * *****************End to check loan is already released or not @AUTHOR: SANDY3OCT13******************** */
    /*     * ****************End code to add sys log var @Author:PRIYA07JUL14************* */
    $sslg_trans_sub = 'MONEYLENDER LOAN RELEASED';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $loanFirmId;
    $sysLogTransId = $preSerialNo . $serialNo;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Rel Date: ' . $mlDOB . ', Amount Paid: ' . formatInIndianStyle($amountPaid);
    include 'omslgapi.php';
    $addSysLogInd = 'NO';
    /*     * ****************End code to add sys log var @Author:PRIYA07JUL14*********************** */
//If status is not released release loan and make journal entry @AUTHOR: SANDY3OCT13
    if ($status != 'Released') {
        $query = "UPDATE ml_loan SET
		ml_upd_sts='Released',
		ml_DOR='$girvDOR',
                ml_total_time='$timeVar',
                ml_total_amt='$totalPrincipalAmount',
                ml_paid_amt='$amountPaid',
                ml_paid_int='$interestPaid',
                ml_discount_amt='$discountPaid',
                ml_cash_acc_id ='$mlLoanCashAccId',
                ml_loan_acc_id ='$mlLoanAccId',
                ml_int_acc_id ='$mlLoanIntAccId',
                ml_disc_acc_id ='$mlLoanDiscAccId'
		WHERE ml_own_id ='$loanOwnerId' and ml_lender_id ='$mlId' and ml_id ='$loanId'"; //CHANGE IN QUERY TO PASS GIRVI DOR DATE @AUTHOR: SANDY08JAN14

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
//Depending on loantype update girvi_transfer table @AUTHOR: SANDY15JAN14

        if ($loanType == 'Linked') {
            // echo 'hiii';
            $updateField = "UPDATE girvi_transfer SET gtrans_upd_sts='Released',gtrans_total_amt='$totalPrincipalAmount',gtrans_paid_int='$interestPaid',gtrans_discount_amt='$discountPaid',gtrans_paid_amt='$amountPaid',gtrans_DOR='$girvDOR',gtrans_time_period='$timeVar' WHERE gtrans_trans_loan_id='$loanId' and gtrans_own_id='$loanOwnerId'"; //CHANGE IN QUERY TO PASS GIRVI DOR DATE @AUTHOR: SANDY22JAN14
            if (!mysqli_query($conn,$updateField)) {
                die('Error: ' . mysqli_error($conn));
            }
        } else {
            //UPDATE girvi and additional principal status in girvi transfer table 
            $updateField = "UPDATE girvi_transfer SET gtrans_upd_sts='Released',gtrans_DOR='$girvDOR',gtrans_total_amt='$totalPrincipalAmount',gtrans_paid_int='$interestPaid',gtrans_discount_amt='$discountPaid',gtrans_paid_amt='$amountPaid',gtrans_time_period='$timeVar' WHERE gtrans_trans_loan_id='$loanId' and gtrans_own_id='$loanOwnerId' and gtrans_trans_type IS NULL"; //CHANGE IN QUERY TO PASS GIRVI DOR DATE @AUTHOR: SANDY04FEB14
            if (!mysqli_query($conn,$updateField)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //}
        $query = "UPDATE girvi SET
		girv_transfer_id=NULL,girv_trans_firm_id=NULL,girv_transfer_ml_id=NULL WHERE girv_own_id = '$loanOwnerId'"
                . " and girv_id = '$girviId'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //Depending on loantype update girvi_transfer table @AUTHOR: SANDY15JAN14
        /*         * ******************************************************************************************* */
        /*                       START CODE To Add Journal Entry 
          /*         * ******************************************************************************************* */
        //get details of money lender from supplier table
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
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

//        $selAccName = "SELECT acc_user_acc,acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'";
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanCashAccId'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccName = $rowAccName['acc_user_acc'];
        $crAccId = $mlLoanCashAccId;

        if ($crDrType == 'CR') {
            $jrnlOwnId = $loanOwnerId;
            $jrnlJId = '';
            $jrnlUserId = $mlId;
            $jrnlUserType = 'MoneyLender';
            $jrnlTransId = $loanId; // Used to navigate
            $jrnlTransType = 'LOAN'; //Where we hv to navigate
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
        } else {
            $jrnlOwnId = $loanOwnerId;
            $jrnlJId = '';
            $jrnlUserId = $mlId;
            $jrnlUserType = 'MoneyLender';
            $jrnlTransId = $loanId; // Used to navigate
            $jrnlTransType = 'LOAN'; //Where we hv to navigate
            $jrnlFirmId = $loanFirmId;
            $jrnlTTDr = $amountPaid;
            $jrnlDrAccId = $crAccId;
            $jrnlDrDesc = $crAccName;
            $jrnlTTCr = $amountPaid;
            $jrnlCrAccId = $drAccId;
            $jrnlCrDesc = $drAccName;
            $jrnlDesc = 'ML Loan Released';
            $jrnlOthInfo = '';
            $jrnlDOB = $girvDOR;

            $apiType = 'insert';
            include 'ommpjrnl.php';
        }
        //Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id
        //
    //
    //
//    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Secured Loans'"; //23
//        $resAccName = mysqli_query($conn,$selAccName);
//        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//        $crAccId = $rowAccName['acc_id'];
//        $crAccName = $rowAccName['acc_user_acc'];
//
//        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'"; //6
//        $resAccName = mysqli_query($conn,$selAccName);
//        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//        $drAccId = $rowAccName['acc_id'];
//        $drAccName = $rowAccName['acc_user_acc'];

        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanAccId'"; //23
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccId = $mlLoanAccId;
        $drAccName = $rowAccName['acc_user_acc'];
        if ($crDrType == 'CR') {
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $loanOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $loanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $loanFirmId;
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = $mainPrinAmt; //$totalPrincipalAmount changed to $mainPrinAmt @Author:PRIYA01APR14
            $jrtrDrAccId = $drAccId; //Secured Loan
            $jrtrDrDesc = $drAccName;
            $jrtrCrAmt = $mainPrinAmt; //$totalPrincipalAmount changed to $mainPrinAmt @Author:PRIYA01APR14
            $jrtrCrAccId = $crAccId; //loan Payment Account Id
            $jrtrCrDesc = $crAccName;
            $jrtrDesc = 'Released ML Loan Principal Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $girvDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';
        } else {
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $loanOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $loanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $loanFirmId;
            $jrtrTransCRDR = 'CR';
            $jrtrDrAmt = $mainPrinAmt; //$totalPrincipalAmount changed to $mainPrinAmt @Author:PRIYA01APR14
            $jrtrDrAccId = $crAccId; //Secured Loan
            $jrtrDrDesc = $crAccName;
            $jrtrCrAmt = $mainPrinAmt; //$totalPrincipalAmount changed to $mainPrinAmt @Author:PRIYA01APR14
            $jrtrCrAccId = $drAccId; //loan Payment Account Id
            $jrtrCrDesc = $drAccName;
            $jrtrDesc = 'Released ML Loan Principal Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $girvDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';
        }
        //For Interest Amount
//        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Direct Expenses'"; //16
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanIntAccId'"; //16
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drIncomeAccId = $mlLoanIntAccId;
        $drIncomeAccName = $rowAccName['acc_user_acc'];

        if ($crDrType == 'CR') {
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $loanOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $loanId;
            $jrtrTransType = 'LOAN';
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
        } else {
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $loanOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $loanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $loanFirmId;
            $jrtrTransCRDR = 'CR';
            $jrtrDrAmt = $interestPaid;
            $jrtrDrAccId = $crAccId; //Income
            $jrtrDrDesc = $crAccName;
            $jrtrCrAmt = $interestPaid;
            $jrtrCrAccId = $drIncomeAccId; //loan Payment Account Id
            $jrtrCrDesc = $drIncomeAccName;
            $jrtrDesc = 'Released ML Loan Interest Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $girvDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';
        }
        if ($discountPaid > 0) {
//            $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and 
//            acc_firm_id='$loanFirmId' and acc_user_acc='Direct Incomes'"; //16
            $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanDiscAccId'";
            $resAccName = mysqli_query($conn,$selAccName);
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $crDisAccId = $mlLoanDiscAccId;
            $crDisAccName = $rowAccName['acc_user_acc'];
            if ($crDrType == 'CR') {
                $jrtrJId = '';
                $jrtrJrnlId = $jrnlId;
                $jrtrOwnId = $loanOwnerId;
                $jrtrUserId = $mlId;
                $jrtrUserType = 'MoneyLender';
                $jrtrTransId = $loanId;
                $jrtrTransType = 'LOAN';
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
            } else {
                $jrtrJId = '';
                $jrtrJrnlId = $jrnlId;
                $jrtrOwnId = $loanOwnerId;
                $jrtrUserId = $mlId;
                $jrtrUserType = 'MoneyLender';
                $jrtrTransId = $loanId;
                $jrtrTransType = 'LOAN';
                $jrtrFirmId = $loanFirmId;
                $jrtrTransCRDR = 'CR';
                $jrtrDrAmt = $discountPaid;
                $jrtrDrAccId = $crDisAccId; //Income
                $jrtrDrDesc = $crDisAccName;
                $jrtrCrAmt = $discountPaid;
                $jrtrCrAccId = $drIncomeAccId; //loan Payment Account Id
                $jrtrCrDesc = $drIncomeAccName;
                $jrtrDesc = 'Released ML Loan Discount Amt';
                $jrtrOthInfo = '';
                $jrtrDOB = $girvDOR;

                $apiType = 'insert';
                include 'ommpjrtr.php';
            }
        }

        //END CODE  
        /*         * ******************************************************************************************* */
        /*                         END CODE To Add Journal Entry                         */
        /*         * ******************************************************************************************* */

        header("Location: " . $documentRoot . "/include/php/ormllndt.php?mlId=" . $mlId . "&page=" . $pageNo); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    } else {
        header("Location: " . $documentRoot . "/include/php/ormllndt.php?mlId=" . $mlId . "&page=" . $pageNo); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }
}
//require_once 'omssclin.php';
?>