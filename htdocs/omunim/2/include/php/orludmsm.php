<?php

/*
 * **************************************************************************************
 * @tutorial: Simply Deposit Money
 * **************************************************************************************
 *
 * Created on 15 Aug, 2012 8:36:23 PM
 *
 * @FileName: orludmsm.php
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

//changes in file @AUTHOR: SANDY22JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'ommpincr.php';
require_once 'system/omssopin.php';
//Get all the data
$loanOwnerId = $_SESSION['sessionOwnerId'];
if ($lenderId == '' or $lenderId == NULL || $loanId == '' || $loanId == NULL) {
    $loanOwnerId = $_SESSION['sessionOwnerId'];
    $lenderId = trim($_POST['lenderId']);
    $loanId = trim($_POST['loanId']);
    $loanDepositPrinAmount = trim($_POST['loanDepositPrinAmount']);
    $loanDepositIntAmount = trim($_POST['loanDepositIntAmount']);
    $totalPrincipalAmount = trim($_POST['totalPrincipalAmount']);
    $totalInterestAmount = trim($_POST['totalInterestAmount']);
    $DOBDay = trim($_POST['DOBDay']);
    $DOBMonth = trim($_POST['DOBMonth']);
    $DOBYear = trim($_POST['DOBYear']);
}
// Start To protect MySQL injection
$loanDepositPrinAmount = stripslashes($loanDepositPrinAmount);
$loanDepositIntAmount = stripslashes($loanDepositIntAmount);
$DOBDay = stripslashes($DOBDay);
$DOBMonth = stripslashes($DOBMonth);
$DOBYear = stripslashes($DOBYear);

$loanDepositPrinAmount = mysqli_real_escape_string($conn,$loanDepositPrinAmount);
$loanDepositIntAmount = mysqli_real_escape_string($conn,$loanDepositIntAmount);
$DOBDay = mysqli_real_escape_string($conn,$DOBDay);
$DOBMonth = mysqli_real_escape_string($conn,$DOBMonth);
$DOBYear = mysqli_real_escape_string($conn,$DOBYear);
// End To protect MySQL injection

$loanDepositDate = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;

$loanDepositDate = om_strtoupper(date("d M Y", strtotime($loanDepositDate)));

if ($loanDepositPrinAmount == '' || $loanDepositPrinAmount == NULL) {
    $loanDepositPrinAmount = 0;
}

if ($loanDepositIntAmount == '' || $loanDepositIntAmount == NULL) {
    $loanDepositIntAmount = 0;
}

$loanDepositAmount = $loanDepositPrinAmount + $loanDepositIntAmount;

$loanMonDepComm = "Deposit in Principal Amt = $globalCurrency <font color='blue'>$loanDepositPrinAmount</font> Deposit in Interest = $globalCurrency <font color='blue'>$loanDepositIntAmount</font>, TOTAL DEPOSIT AMT = $globalCurrency <font color='blue'> $loanDepositAmount</font>.  Deposited on date:<font color='blue'> $loanDepositDate</font> .<br />";
$loanMonDepComm .= '========================================================================================================================<br />';
// Start To protect MySQL injection
$loanMonDepComm = stripslashes($loanMonDepComm);
$loanMonDepComm = mysqli_real_escape_string($conn,$loanMonDepComm);
// End To protect MySQL injection

$loanMonDepStatus = 'Deposit';
//
//echo '$lenderId : '.$lenderId.'<br>';
//echo '$loanId : '.$loanId.'<br>';
//echo '$loanDepositPrinAmount : '.$loanDepositPrinAmount.'<br>';
//echo '$loanDepositIntAmount : '.$loanDepositIntAmount.'<br>';
//echo '$loanDepositDate : '.$loanDepositDate.'<br>';
//
if ($lenderId == '' or $lenderId == NULL or $loanId == '' or $loanId == NULL or $loanDepositAmount == '' or $loanDepositAmount == NULL or $loanDepositDate == '' or $loanDepositDate == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    exit();
} else {

    $query = "SELECT ml_firm_id,ml_ln_cr_dr,ml_pre_serial_num,ml_serial_num FROM ml_loan where ml_own_id='$loanOwnerId' and ml_id='$loanId'"; //change in query @AUTHOR: SANDY22JAN14
    $resQuery = mysqli_query($conn,$query) or die("Error: " . mysqli_error($conn) . " with query " . $query);
    $rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC);

    $loanFirmId = $rowQuery['ml_firm_id'];
    $crdrType = $rowQuery['ml_ln_cr_dr']; //@AUTHOR: SANDY22JAN14
    $preSerialNum = $rowQuery['ml_pre_serial_num'];
    $serialNum = $rowQuery['ml_serial_num'];
    /*     * *******Start code to add sys_log api @Author:PRIYA04JUL14******************** */
    $sslg_trans_sub = 'MONEYL LOAN DEPOSIT MONEY';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $loanFirmId;
    $sysLogTransId = $preSerialNum . $serialNum;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Dep Date: ' . $loanDepositDate . ', Dep Amt: ' . formatInIndianStyle($loanDepositPrinAmount) . ', Dep Int: ' .
            $loanDepositIntAmount . ', Type: SimplyDeposit';
    include 'omslgapi.php';
    $addSysLogInd = 'NO';
    /********End code to add sys_log api @Author:PRIYA04JUL14******************** */
    //get last deposit id 
    $selQry = "SELECT ml_trans_mondep_id FROM ml_transaction WHERE ml_trans_mondep_own_id='$loanOwnerId' and ml_trans_type='Deposit' order by ml_trans_ent_dat desc LIMIT 0,1";
    $resQuery = mysqli_query($conn,$selQry) or die("Error: " . mysqli_error($conn) . " with query " . $selQry);
    $rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC);

    $depositeTransactionId = $rowQuery['ml_trans_mondep_id'];
    if ($depositeTransactionId == '') {
        $depositeTransactionId = 1;
    } else {
        $depositeTransactionId = $depositeTransactionId + 1;
    }
    //change in query @AUTHOR: SANDY27NOV13
    /*********Start code to add crder type @Author:PRIYA17JUL14*********** */
    $query = "INSERT INTO ml_transaction (ml_trans_mondep_id,
		ml_trans_mondep_loan_id, ml_trans_mondep_lender_id, ml_trans_mondep_own_id, 
		ml_trans_mondep_prin_amt, ml_trans_mondep_int_amt, ml_trans_mondep_amt, ml_trans_mondep_date,ml_trans_upd_sts,ml_trans_mondep_comm,ml_trans_mondep_firm_id,ml_trans_type,
		ml_trans_ent_dat,ml_trans_cr_dr) 
		VALUES('$depositeTransactionId',
		'$loanId','$lenderId', '$loanOwnerId',
		'$loanDepositPrinAmount','$loanDepositIntAmount','$loanDepositAmount','$loanDepositDate',
                '$loanMonDepStatus', '$loanMonDepComm', '$loanFirmId','Deposit',
		$currentDateTime,'$crdrType')";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*********End code to add crder type @Author:PRIYA17JUL14*********** */
    //Start Code to get LAST INSERT ID
    $qSelGirviDepId = "SELECT ml_trans_id FROM ml_transaction where ml_trans_mondep_lender_id='$lenderId' and ml_trans_mondep_loan_id='$loanId' and ml_trans_mondep_own_id='$loanOwnerId' order by ml_trans_ent_dat desc";
    $resGirviDepId = mysqli_query($conn,$qSelGirviDepId);
    $rowGirviDepId = mysqli_fetch_array($resGirviDepId, MYSQLI_ASSOC);
    $loanDepId = $rowGirviDepId['ml_trans_id'];
    //End Code to get LAST INSERT ID
    //echo 'loanDepId::'.$loanDepId;
    $queryMonDep = "INSERT INTO ml_comments (
		ml_comm_ml_id, ml_comm_cust_id, ml_comm_own_id, ml_comm_ml_dep_id, 
		ml_comm_comm, ml_comm_upd_sts,
		ml_comm_ent_dat) 
		VALUES (
		'$loanId','$lenderId', '$loanOwnerId', '$loanDepId',
		'$loanMonDepComm','Added',
                $currentDateTime)";

    if (!mysqli_query($conn,$queryMonDep)) {
        die('Error: ' . mysqli_error($conn));
    }

    /*     * ******************************************************************************************* */
    /*                START CODE To Insert Deposit Money Journal Entry         */
    /*     * ******************************************************************************************* */
//    $qSelCustDetails = "SELECT ml_lender_fname,ml_lender_lname,ml_lender_address,ml_lender_city FROM ml_loan where ml_own_id='$loanOwnerId' and ml_lender_id='$lenderId'";
//    $resCustDetails = mysqli_query($conn,$qSelCustDetails);
//    $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
//
//    $lenderFirstName = $rowCustDetails['ml_lender_fname'];
//    $lenderLastName = $rowCustDetails['ml_lender_lname'];
//    

    // START CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-19MAR2019 
    parse_str(getTableValues("SELECT user_acc_id,user_type,user_fname,user_lname "
                           . "FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' "
                           . "and user_id='$lenderId'"));
    //
    $userName = $user_fname . ' ' . $user_lname;
    // 
    // END CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-19MAR2019 
    // 
    // Get details of money lender from supplier table
    //-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    $selMlDet = "SELECT user_acc_id FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$lenderId'";
    $resSelMlDet = mysqli_query($conn,$selMlDet);
    $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
    $lenderFirstName = $row['user_fname'];
    $lenderLastName = $row['user_lname'];
    $mlAccId = $row['user_acc_id'];
    //-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
   
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                . "and acc_id='$mlAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
    $drAccId = $mlAccId;

    $selAccName = "SELECT acc_user_acc,acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                . "and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
    $crAccId = $rowAccName['acc_id'];


//    $selAccName = "SELECT acc_id,acc_main_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'"; //6  //Right now rec amt in CASH
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $cashAccId = $rowAccName['acc_id'];
//    $cashAccName = $rowAccName['acc_main_acc'];
//
//    $selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Sundry Debtors'";
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $SundryDebAccId = $rowAccName['acc_id'];
    
    
    if ($crdrType == 'CR') {
        
        $jrnlOwnId = $loanOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $lenderId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransId = $loanId; // Used to navigate
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlFirmId = $loanFirmId;
        $jrnlTTDr = $loanDepositAmount;
        $jrnlDrAccId = $drAccId;
        $jrnlDrDesc = $drAccName;
        $jrnlTTCr = $loanDepositAmount;
        $jrnlCrAccId = $crAccId;
        $jrnlCrDesc = $crAccName;
        $jrnlDesc = 'Loan Deposit Money';
        $jrnlOthInfo = '';
        $jrnlDOB = $loanDepositDate;

        $apiType = 'insert';
        include 'ommpjrnl.php';
        
    } else {
        
        $jrnlOwnId = $loanOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $lenderId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransId = $loanId; // Used to navigate
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlFirmId = $loanFirmId;
        $jrnlTTDr = $loanDepositAmount;
        $jrnlDrAccId = $crAccId;
        $jrnlDrDesc = $crAccName;
        $jrnlTTCr = $loanDepositAmount;
        $jrnlCrAccId = $drAccId;
        $jrnlCrDesc = $drAccName;
        $jrnlDesc = 'Loan Deposit Money';
        $jrnlOthInfo = '';
        $jrnlDOB = $loanDepositDate;

        $apiType = 'insert';
        include 'ommpjrnl.php';
        
    }


    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id
    

//    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Secured Loans'"; //23
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $crAccId = $rowAccName['acc_id'];
//    $crAccName = $rowAccName['acc_user_acc'];
//
//    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'"; //6
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $drAccId = $rowAccName['acc_id'];
//    $drAccName = $rowAccName['acc_user_acc'];
    
    if ($crdrType == 'CR') {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $loanOwnerId;
        $jrtrUserId = $lenderId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $loanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $loanFirmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $loanDepositPrinAmount;
        $jrtrDrAccId = $drAccId; //Secured Loan
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $loanDepositPrinAmount;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Loan Principal Amt Deposit';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanDepositDate;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    } else {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $loanOwnerId;
        $jrtrUserId = $lenderId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $loanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $loanFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $loanDepositPrinAmount;
        $jrtrDrAccId = $crAccId; //Secured Loan
        $jrtrDrDesc = $crAccName;
        $jrtrCrAmt = $loanDepositPrinAmount;
        $jrtrCrAccId = $drAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $drAccName;
        $jrtrDesc = 'Loan Principal Amt Deposit';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanDepositDate;

        $apiType = 'insert';
        include 'ommpjrtr.php';
    }

    // START CODE FOR INTEREST DEPOSIT ENTRY CHANGE ACCOUNT (Direct Expenses) TO (Interest Paid) ON TRIAL BALANCE @PRIYANKA-19MAR2019
    // For Interest Amount
    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                . "and acc_firm_id='$loanFirmId' and acc_user_acc='Interest Paid'";
    //
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccId = $rowAccName['acc_id'];
    $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
    //
    // END CODE FOR INTEREST DEPOSIT ENTRY CHANGE ACCOUNT (Direct Expenses) TO (Interest Paid) ON TRIAL BALANCE @PRIYANKA-19MAR2019
    //
    if ($crdrType == 'CR') {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $loanOwnerId;
        $jrtrUserId = $lenderId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $loanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $loanFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $loanDepositIntAmount;
        $jrtrDrAccId = $drAccId; //Income
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $loanDepositIntAmount;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Loan Interest Amt Deposit';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanDepositDate;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    } else {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $loanOwnerId;
        $jrtrUserId = $lenderId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $loanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $loanFirmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $loanDepositIntAmount;
        $jrtrDrAccId = $crAccId; //Income
        $jrtrDrDesc = $crAccName;
        $jrtrCrAmt = $loanDepositIntAmount;
        $jrtrCrAccId = $drAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $drAccName;
        $jrtrDesc = 'Loan Interest Amt Deposit';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanDepositDate;

        $apiType = 'insert';
        include 'ommpjrtr.php';
    }

    //END CODE 
    $query = "UPDATE ml_transaction SET 
              ml_trans_mondep_jrnlid='$jrnlId'
              WHERE ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_id ='$loanDepId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    /****************************************************************************************** */
    /*                        END CODE To Insert Deposit Money Journal Entry      */
    /******************************************************************************************* */
    header("Location: $documentRoot/include/php/ormlupln.php?mlId=$lenderId&loanId=$loanId");
}
?>
