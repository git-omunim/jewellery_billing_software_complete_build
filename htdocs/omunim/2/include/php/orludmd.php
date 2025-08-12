<?php
/*
 * **************************************************************************************
 * @tutorial: Loan deposit amount and modify the loan
 * **************************************************************************************
 *
 * Created on 19 Aug, 2012 3:01:44 AM
 *
 * @FileName: orludmd.php
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
//
//Get all the data
$loanOwnerId = $_SESSION['sessionOwnerId'];
$mlId = trim($_POST['lenderId']);
$lenderId = $mlId;
$loanId = trim($_POST['loanId']);
$newPrincipalAmount = trim($_POST['newPrincipalAmount']);
$loanDepositPrinAmount = trim($_POST['loanDepositPrinAmount']);
$prinAmount = $loanDepositPrinAmount;
$loanDepositIntAmount = trim($_POST['loanDepositIntAmount']);
$intAmount = $loanDepositIntAmount;
$loanRealIntAmount = trim($_POST['loanRealIntAmount']);
$loanDepositAmount = $loanDepositPrinAmount + $loanDepositIntAmount;
$loanDepositPrinAmount = $loanDepositPrinAmount + ($loanDepositIntAmount - $loanRealIntAmount);
$loanDepositIntAmount = $loanRealIntAmount;
$loanDepDiscountAmt = trim($_POST['depDiscountAmt']);
$loanDepositDate = trim($_POST['loanDepositDate']);
$newGirviDate = trim($_POST['newGirviDate']);
$loanComm = trim($_POST['loanComm']);
$loanIntOpt = trim($_POST['simpleOrCompIntOption']);
$loanIntCompoundedOpt = trim($_POST['loanCompoundedOption']);
$ROIType = trim($_POST['interestType']);
$gMonthIntOption = trim($_POST['monthlyInterestType']);
$loanDepositMonOpt = trim($_POST['loanDepositMonOpt']);

// Start To protect MySQL injection
$newPrincipalAmount = stripslashes($newPrincipalAmount);
$loanDepositDate = stripslashes($loanDepositDate);
$newGirviDate = stripslashes($newGirviDate);
$loanComm = stripslashes($loanComm);
$loanIntOpt = stripslashes($loanIntOpt);
$loanIntCompoundedOpt = stripslashes($loanIntCompoundedOpt);

$newPrincipalAmount = mysqli_real_escape_string($conn,$newPrincipalAmount);
$loanDepositDate = mysqli_real_escape_string($conn,$loanDepositDate);
$newGirviDate = mysqli_real_escape_string($conn,$newGirviDate);
$loanComm = mysqli_real_escape_string($conn,$loanComm);
$loanIntOpt = mysqli_real_escape_string($conn,$loanIntOpt);
$loanIntCompoundedOpt = mysqli_real_escape_string($conn,$loanIntCompoundedOpt);

$newGirviDate = date("d M Y", strtotime($newGirviDate));
// End To protect MySQL injection

if ($mlId == '' or $mlId == NULL or $loanId == '' or $loanId == NULL or $newPrincipalAmount == '' or $newPrincipalAmount == NULL or
        $newGirviDate == '' or $newGirviDate == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    $qUpdateGirvi = "UPDATE ml_loan SET ml_new_DOB='$newGirviDate', ml_prin_amt='$newPrincipalAmount'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn,$qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }

    $queryComm = "INSERT INTO ml_comments (
		ml_comm_ml_id,ml_comm_cust_id, ml_comm_own_id, 
		ml_comm_comm, ml_comm_upd_sts,
		ml_comm_ent_dat) 
		VALUES(
		'$loanId','$mlId', '$loanOwnerId',
		'$loanComm','Added',
                $currentDateTime)";

    if (!mysqli_query($conn,$queryComm)) {
        die('Error: ' . mysqli_error($conn));
    }

    /* Start Code to modify Addtional Principal Amount
      $qSelPricipal = "SELECT ml_prin_id,ml_prin_prin_amt,ml_prin_prin_roi,ml_prin_prin_DOB FROM l_principal where girv_prin_girv_id='$loanId' and girv_prin_cust_id='$custId' and girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts IN ('New','Updated')";
      $resPrincipal = mysqli_query($conn,$qSelPricipal);
      $totalPrincipalAmounts = mysqli_num_rows($resPrincipal); //Total Number of Principal Amounts

      while ($rowPrincipal = mysqli_fetch_array($resPrincipal, MYSQLI_ASSOC)) {

      $principalId = $rowPrincipal['girv_prin_id'];
      $princAmount = $rowPrincipal['girv_prin_prin_amt'];
      $prinAmtROI = $rowPrincipal['girv_prin_prin_roi'];

      include 'olggapcl.php';//change in filename @AUTHOR: SANDY20NOV13

      $qUpdateGirviPrincipal = "UPDATE loan_principal SET
      girv_prin_prin_DOR='$loanDepositDate',girv_prin_upd_sts='Adjust',
      girv_prin_total_time='$princTotalTimePeriod',girv_prin_paid_int='$principalTotalInterest',
      girv_prin_paid_amt='$principalTotalAmount',girv_prin_discount_amt='0'
      WHERE girv_prin_id='$principalId'";

      if (!mysqli_query($conn,$qUpdateGirviPrincipal)) {
      die('Error: ' . mysqli_error($conn));
      }
      }
      //End Code to modify Addtional Principal Amount */

    $qSelDepAmount = "SELECT ml_trans_id FROM ml_transaction where ml_trans_mondep_loan_id='$loanId' and ml_trans_mondep_lender_id='$mlId' and ml_trans_type='Deposit' and ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_upd_sts='Deposit'";
    $resDepAmount = mysqli_query($conn,$qSelDepAmount);
    $totalDepAmounts = mysqli_num_rows($resDepAmount); //Total Number of Deposit Amounts

    while ($rowDeposit = mysqli_fetch_array($resDepAmount, MYSQLI_ASSOC)) {

        $depositId = $rowDeposit['ml_trans_id'];

        $qUpdateGirviDeposit = "UPDATE ml_transaction SET
		ml_trans_mondep_DOR='$loanDepositDate',ml_trans_upd_sts='Adjust'
		WHERE ml_trans_id='$depositId'";

        if (!mysqli_query($conn,$qUpdateGirviDeposit)) {
            die('Error: ' . mysqli_error($conn));
        }
    }

    //
    //Insert deposit amount newly added and adjusted already with this transaction

    $query = "SELECT ml_firm_id ,ml_ln_cr_dr,ml_pre_serial_num,ml_serial_num FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId'";
    $resQuery = mysqli_query($conn,$query) or die("Error: " . mysqli_error($conn) . " with query " . $query);
    $rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC);

    $loanFirmId = $rowQuery['ml_firm_id'];
    $crdrType = $rowQuery['ml_ln_cr_dr'];   //@AUTHOR: SANDY22JAN14
    $preSerialNum = $rowQuery['ml_pre_serial_num'];
    $serialNum = $rowQuery['ml_serial_num'];
    /*     * *******Start code to add sys_log api @Author:PRIYA04JUL14******************** */
    $sslg_trans_sub = 'MONEYL LOAN DEPOSIT MONEY';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $loanFirmId;
    $sysLogTransId = $preSerialNum . $serialNum;
    if ($loanDepositMonOpt == 'CalculateNow')
        $loanDepositMonOpt = 'NEW GIRVI DATE CHANGE';
    else if ($loanDepositMonOpt == 'DepositFullInt')
        $loanDepositMonOpt = 'DEP FULL INT';
    else if ($loanDepositMonOpt == 'DepositIntWithDis')
        $loanDepositMonOpt = 'DEP INT WITH DIS';
    else if ($loanDepositMonOpt == 'DepositIntAdjInPrin')
        $loanDepositMonOpt = 'DEP INT ADJ IN PRIN';
    else if ($loanDepositMonOpt == 'DepositPrinIntLeft')
        $loanDepositMonOpt = 'DEP PRIN INT LEFT';
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Dep Date: ' . $loanDepositDate . ', Dep Amt: ' . formatInIndianStyle($prinAmount) . ', Dep Int: ' .
            $intAmount . ', Type: ' . $loanDepositMonOpt;
    include 'omslgapi.php';
    $addSysLogInd = 'NO';
    /*     * *******End code to add sys_log api @Author:PRIYA04JUL14******************** */
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
/*     * ********Start code to add crder type @Author:PRIYA17JUL14*********** */
    $query = "INSERT INTO ml_transaction (ml_trans_mondep_id,
		ml_trans_mondep_loan_id, ml_trans_mondep_lender_id, ml_trans_mondep_own_id, 
		ml_trans_mondep_prin_amt, ml_trans_mondep_int_amt, ml_trans_mondep_amt, ml_trans_mondep_date,ml_trans_mondep_DOR,
		ml_trans_upd_sts, ml_trans_mondep_firm_id,ml_trans_type,
		ml_trans_ent_dat,ml_trans_cr_dr) 
		VALUES (
		' $depositeTransactionId','$loanId','$mlId', '$loanOwnerId',
		'$loanDepositPrinAmount','$loanDepositIntAmount','$loanDepositAmount','$loanDepositDate','$loanDepositDate',
                'Adjust','$loanFirmId','Deposit',
		$currentDateTime,'$crdrType')";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
/*     * ********End code to add crder type @Author:PRIYA17JUL14*********** */
    /*     * ******************************************************************************************* */
    /*                START CODE To Insert Deposit Money Journal Entry//start to change code @AUTHOR: SANDY21JAN14          */
    /*     * ******************************************************************************************* */

    //$qSelCustDetails = "SELECT ml_lender_fname,ml_lender_lname,ml_lender_address,ml_lender_city FROM ml_loan where ml_own_id='$loanOwnerId' and ml_lender_id='$lenderId'";
    //$resCustDetails = mysqli_query($conn,$qSelCustDetails);
    //$rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
    // $lenderFirstName = $rowCustDetails['ml_lender_fname'];
    //$lenderLastName = $rowCustDetails['ml_lender_lname'];
    //$selAccName = "SELECT acc_id,acc_main_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Cash in Hand'"; //6  //Right now rec amt in CASH
    //$resAccName = mysqli_query($conn,$selAccName);
    // $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    // $cashAccId = $rowAccName['acc_id'];
    // $cashAccName = $rowAccName['acc_main_acc'];
    //$selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$loanFirmId' and acc_user_acc='Sundry Debtors'";
    //$resAccName = mysqli_query($conn,$selAccName);
    //$rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    //$SundryDebAccId = $rowAccName['acc_id'];
    //

    // START CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-19MAR2019 
    parse_str(getTableValues("SELECT user_acc_id,user_type,user_fname,user_lname "
                           . "FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' "
                           . "and user_id='$lenderId'"));
    //
    $userName = $user_fname . ' ' . $user_lname;
    // 
    // END CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-19MAR2019 
    
    
    //-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    $selMlDet = "SELECT user_acc_id FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$lenderId'";
    $resSelMlDet = mysqli_query($conn,$selMlDet);
    $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
    $lenderFirstName = $row['user_fname'];
    $lenderLastName = $row['user_lname'];
    $mlAccId = $row['user_acc_id'];
    //-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
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
    
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccId = $rowAccName['acc_id'];
    $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
    // END CODE FOR INTEREST DEPOSIT ENTRY CHANGE ACCOUNT (Direct Expenses) TO (Interest Paid) ON TRIAL BALANCE @PRIYANKA-19MAR2019
    
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

    if ($loanDepDiscountAmt > 0) {
        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and 
                       acc_firm_id='$loanFirmId' and acc_user_acc='Direct Incomes'"; 
        
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crDisAccId = $rowAccName['acc_id'];
        $crDisAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
        
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
            $jrtrDrAmt = $discountPaid;
            $jrtrDrAccId = $drAccId; //Income
            $jrtrDrDesc = $drAccName;
            $jrtrCrAmt = $discountPaid;
            $jrtrCrAccId = $crDisAccId; //loan Payment Account Id
            $jrtrCrDesc = $crDisAccName;
            $jrtrDesc = 'Released ML Loan Discount Amt';
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
            $jrtrDrAmt = $discountPaid;
            $jrtrDrAccId = $crDisAccId; //Income
            $jrtrDrDesc = $crDisAccName;
            $jrtrCrAmt = $discountPaid;
            $jrtrCrAccId = $drAccId; //loan Payment Account Id
            $jrtrCrDesc = $drAccName;
            $jrtrDesc = 'Released ML Loan Discount Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $loanDepositDate;

            $apiType = 'insert';
            include 'ommpjrtr.php';
        }
    }
    
    $qSelDepAmount = "SELECT ml_trans_id FROM ml_transaction where ml_trans_mondep_loan_id='$loanId' "
                   . "and ml_trans_mondep_lender_id='$mlId' and ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' "
                   . "and ml_trans_upd_sts='Deposit' order by ml_trans_ent_dat desc LIMIT 0,1";
    
    $resDepAmount = mysqli_query($conn,$qSelDepAmount);
    $lastIdDepAmounts = mysqli_num_rows($resDepAmount);
    $lastId = $lastIdDepAmounts['ml_trans_id'];

    $query = "UPDATE ml_transaction SET 
              ml_trans_mondep_jrnlid='$jrnlId'
              WHERE ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_id ='$lastId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }

    /******************************************************************************************** */
    /* END CODE To Insert Deposit Money Journal Entry //End to change code @AUTHOR: SANDY21JAN14    
    /******************************************************************************************** */
    header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId");
}