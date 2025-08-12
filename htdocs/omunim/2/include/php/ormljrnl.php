<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 11, 2014 9:38:01 AM
 *
 * @FileName: ormljrnl.php
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
//change in file @AUTHOR: SANDY6FEB14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
//
$sessionOwnerId = $_SESSION[sessionOwnerId];
$query = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'";
$resQuery = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn) . " with query " . $query);
//
while ($rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
    $mlId = $rowQuery['ml_lender_id'];
    $mlLoanId = $rowQuery['ml_id'];
    $mlDrAccId = $rowQuery['ml_acc_id'];
    $crDrType = $rowQuery['ml_ln_cr_dr'];
    $firmId = $rowQuery['ml_firm_id'];
    $principle = $rowQuery['ml_main_prin_amt'];
    $loanAddDob = $rowQuery['ml_DOB'];
    $mlLoanUpdSts = $rowQuery['ml_upd_sts'];
    $mlLoanCashAccId = $rowQuery['ml_cash_acc_id'];
    $mlLoanAccId = $rowQuery['ml_loan_acc_id'];
    $mlLoanIntAccId = $rowQuery['ml_int_acc_id'];
    $mlLoanDiscAccId = $rowQuery['ml_disc_acc_id'];
    //
    //-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    $selMlDet = "SELECT * FROM user WHERE user_id='$mlId' and user_category='Money Lender'";
    $resSelMlDet = mysqli_query($conn, $selMlDet);
    $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
    $mlAccId = $row['user_acc_id'];
    $custFirstName = $row['user_fname'];
    $custLastName = $row['user_lname'];
    
    // START CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
    $userName = $custFirstName . ' ' . $custLastName;

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlDrAccId'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS @PRIYANKA-29MAR2019 
    $drAccId = $mlDrAccId;

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS @PRIYANKA-29MAR2019 
    $crAccId = $mlAccId;
    
    if ($crDrType == 'CR') {
        
        $jrnlOwnId = $sessionOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $mlId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlTransId = $mlLoanId; // Used to navigate
        $jrnlFirmId = $firmId;
        $jrnlTTDr = $principle;
        $jrnlDrAccId = $drAccId;
        $jrnlDrDesc = $drAccName;
        $jrnlTTCr = $principle;
        $jrnlCrAccId = $crAccId;
        $jrnlCrDesc = $crAccName;
        $jrnlDesc = 'New Loan Added';
        $jrnlOthInfo = '';
        $jrnlDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrnl.php';

        //Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' "
                          . "order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);        
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $principle;
        $jrtrDrAccId = $drAccId; //Secured Loan
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $principle;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'New Loan Added';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    } else {
        
        $jrnlOwnId = $sessionOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $mlId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransId = $mlLoanId; // Used to navigate
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlFirmId = $firmId;
        $jrnlTTDr = $principle;
        $jrnlDrAccId = $crAccId;
        $jrnlDrDesc = $crAccName;
        $jrnlTTCr = $principle;
        $jrnlCrAccId = $drAccId;
        $jrnlCrDesc = $drAccName;
        $jrnlDesc = 'New Loan Added';
        $jrnlOthInfo = '';
        $jrnlDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrnl.php';

        //Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' "
                          . "order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id


        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $principle;
        $jrtrDrAccId = $crAccId; //Secured Loan
        $jrtrDrDesc = $crAccName;
        $jrtrCrAmt = $principle;
        $jrtrCrAccId = $drAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $drAccName;
        $jrtrDesc = 'New Loan Added';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    }
    //END CODE
    
    $query = "UPDATE ml_loan SET ml_jrnlid='$jrnlId'
              WHERE ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$mlLoanId'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }


    if ($mlLoanUpdSts == 'Released') {
        
        $principle = $rowQuery['ml_main_prin_amt'];
        $amountPaid = $rowQuery['ml_paid_amt'];
        $girvDOR = $rowQuery['ml_DOR'];
        $interestPaid = $rowQuery['ml_paid_int'];
        $discountPaid = $rowQuery['ml_discount_amt'];

        $selMlDet = "SELECT user_acc_id FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$mlId'";
        $resSelMlDet = mysqli_query($conn, $selMlDet);
        $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
        $lenderFirstName = $row['user_fname'];
        $lenderLastName = $row['user_lname'];
        $mlAccId = $row['user_acc_id'];
        
        // START CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
        $lenderName = $lenderFirstName . ' ' . $lenderLastName;

        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
        $drAccId = $mlAccId;

       
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanCashAccId'";
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
        $crAccId = $mlLoanCashAccId;

        if ($crDrType == 'CR') {
            
            $jrnlOwnId = $sessionOwnerId;
            $jrnlJId = '';
            $jrnlUserId = $mlId;
            $jrnlUserType = 'MoneyLender';
            $jrnlTransId = $mlLoanId; // Used to navigate
            $jrnlTransType = 'LOAN'; //Where we hv to navigate
            $jrnlFirmId = $firmId;
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
            
            $jrnlOwnId = $sessionOwnerId;
            $jrnlJId = '';
            $jrnlUserId = $mlId;
            $jrnlUserType = 'MoneyLender';
            $jrnlTransId = $mlLoanId; // Used to navigate
            $jrnlTransType = 'LOAN'; //Where we hv to navigate
            $jrnlFirmId = $firmId;
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
        $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id

        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'"; //23
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccId = $mlAccId;
        $drAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 

        if ($crDrType == 'CR') {
            
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $sessionOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $mlLoanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $firmId;
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = $principle; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
            $jrtrDrAccId = $drAccId; //Secured Loan
            $jrtrDrDesc = $drAccName;
            $jrtrCrAmt = $principle; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
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
            $jrtrOwnId = $sessionOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $mlLoanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $firmId;
            $jrtrTransCRDR = 'CR';
            $jrtrDrAmt = $principle; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
            $jrtrDrAccId = $crAccId; //Secured Loan
            $jrtrDrDesc = $crAccName;
            $jrtrCrAmt = $principle; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
            $jrtrCrAccId = $drAccId; //loan Payment Account Id
            $jrtrCrDesc = $drAccName;
            $jrtrDesc = 'Released ML Loan Principal Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $girvDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';
            
        }
        
        //For Interest Amount
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanIntAccId'"; //16
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drIncomeAccId = $mlLoanIntAccId;
        $drIncomeAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
        
        if ($crDrType == 'CR') {
            
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $sessionOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $mlLoanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $firmId;
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = $interestPaid + $discountPaid;
            $jrtrDrAccId = $drIncomeAccId; //Income
            $jrtrDrDesc = $drIncomeAccName;
            $jrtrCrAmt = $interestPaid + $discountPaid;
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
            $jrtrOwnId = $sessionOwnerId;
            $jrtrUserId = $mlId;
            $jrtrUserType = 'MoneyLender';
            $jrtrTransId = $mlLoanId;
            $jrtrTransType = 'LOAN';
            $jrtrFirmId = $firmId;
            $jrtrTransCRDR = 'CR';
            $jrtrDrAmt = $interestPaid + $discountPaid;
            $jrtrDrAccId = $crAccId; //Income
            $jrtrDrDesc = $crAccName;
            $jrtrCrAmt = $interestPaid + $discountPaid;
            $jrtrCrAccId = $drIncomeAccId; //loan Payment Account Id
            $jrtrCrDesc = $drIncomeAccName;
            $jrtrDesc = 'Released ML Loan Interest Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $girvDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';
            
        }
        
        if ($discountPaid > 0) {
            
            $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanDiscAccId'";
            $resAccName = mysqli_query($conn, $selAccName);
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $crDisAccId = $mlLoanDiscAccId;
            $crDisAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 

            if ($crDrType == 'CR') {
                
                $jrtrJId = '';
                $jrtrJrnlId = $jrnlId;
                $jrtrOwnId = $sessionOwnerId;
                $jrtrUserId = $mlId;
                $jrtrUserType = 'MoneyLender';
                $jrtrTransId = $mlLoanId;
                $jrtrTransType = 'LOAN';
                $jrtrFirmId = $firmId;
                $jrtrTransCRDR = 'DR';
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
                
            } else {
                
                $jrtrJId = '';
                $jrtrJrnlId = $jrnlId;
                $jrtrOwnId = $sessionOwnerId;
                $jrtrUserId = $mlId;
                $jrtrUserType = 'MoneyLender';
                $jrtrTransId = $mlLoanId;
                $jrtrTransType = 'LOAN';
                $jrtrFirmId = $firmId;
                $jrtrTransCRDR = 'CR';
                $jrtrDrAmt = $discountPaid;
                $jrtrDrAccId = $crDisAccId; //Income
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
        }
    }
    /********End code to add code @Author:PRIYA01APR14******************* */
}

$query = "SELECT * FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]'";
$resQuery = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn) . " with query " . $query);

while ($rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
    
    $mlId = $rowQuery['ml_trans_mondep_lender_id'];
    $mlLoanId = $rowQuery['ml_trans_mondep_loan_id'];
    $firmId = $rowQuery['ml_trans_mondep_firm_id'];
    $depositAmt = $rowQuery['ml_trans_mondep_amt'];
    $depositPrinAmt = $rowQuery['ml_trans_mondep_prin_amt'];
    $depositIntAmt = $rowQuery['ml_trans_mondep_int_amt'];
    $depositDOB = $rowQuery['ml_trans_mondep_date'];

    $selMlDet = "SELECT user_acc_id FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$mlId'";
    $resSelMlDet = mysqli_query($conn, $selMlDet);
    $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
    $lenderFirstName = $row['user_fname'];
    $lenderLastName = $row['user_lname'];
    $mlAccId = $row['user_acc_id'];
    
    // START CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
    $lenderName = $lenderFirstName . ' ' . $lenderLastName;
         
    $queryMlLoan = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$mlLoanId'";
    $resQueryMlLoan = mysqli_query($conn, $queryMlLoan) or die("Error: " . mysqli_error($conn) . " with query " . $queryMlLoan);
    $rowQueryMlLoan = mysqli_fetch_array($resQueryMlLoan, MYSQLI_ASSOC);

    $mlCrAccId = $rowQueryMlLoan['ml_acc_id'];
    $mlLoanAccId = $rowQueryMlLoan['ml_loan_acc_id'];
    $mlIntAccId = $rowQueryMlLoan['ml_int_acc_id'];
    //
    if ($mlLoanAccId == '') {
        $selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_user_acc='Secured Loans'";
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $mlLoanAccId = $rowAccName['acc_id'];
    }
    //
    if ($mlIntAccId == '') {
        $selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_user_acc='Interest Paid'";
        $resAccName = mysqli_query($conn, $selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $mlIntAccId = $rowAccName['acc_id'];
    }

    $crDrType = $rowQueryMlLoan['ml_ln_cr_dr'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 
    $drAccId = $mlAccId;

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlCrAccId'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 

    if ($crDrType == 'CR') {
        
        $jrnlOwnId = $sessionOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $mlId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransId = $mlLoanId; // Used to navigate
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlFirmId = $firmId;
        $jrnlTTDr = $depositAmt;
        $jrnlDrAccId = $drAccId;
        $jrnlDrDesc = $drAccName;
        $jrnlTTCr = $depositAmt;
        $jrnlCrAccId = $mlCrAccId;
        $jrnlCrDesc = $crAccName;
        $jrnlDesc = 'ML Loan Deposit';
        $jrnlOthInfo = '';
        $jrnlDOB = $depositDOB;

        $apiType = 'insert';
        include 'ommpjrnl.php';
        
    } else {
        
        $jrnlOwnId = $sessionOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $mlId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransId = $mlLoanId; // Used to navigate
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlFirmId = $firmId;
        $jrnlTTDr = $depositAmt;
        $jrnlDrAccId = $mlCrAccId;
        $jrnlDrDesc = $crAccName;
        $jrnlTTCr = $depositAmt;
        $jrnlCrAccId = $drAccId;
        $jrnlCrDesc = $drAccName;
        $jrnlDesc = 'ML Loan Deposit';
        $jrnlOthInfo = '';
        $jrnlDOB = $depositDOB;

        $apiType = 'insert';
        include 'ommpjrnl.php';
    }

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlLoanAccId'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $loanAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 

    if ($crDrType == 'CR') {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $depositPrinAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrDrAccId = $mlLoanAccId; //Secured Loan
        $jrtrDrDesc = $loanAccName;
        $jrtrCrAmt = $depositPrinAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrCrAccId = $mlCrAccId; //loan Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'ML Loan Deposit Principal Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $depositDOB;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    } else {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $depositPrinAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrDrAccId = $mlCrAccId; //Secured Loan
        $jrtrDrDesc = $crAccName;
        $jrtrCrAmt = $depositPrinAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrCrAccId = $mlLoanAccId; //loan Payment Account Id
        $jrtrCrDesc = $loanAccName;
        $jrtrDesc = 'ML Loan Deposit Principal Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $depositDOB;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    }

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlIntAccId'";
    $resAccName = mysqli_query($conn, $selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $intAccName = $rowAccName['acc_user_acc'] . ' (' . $lenderName . ')'; // ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-29MAR2019 

    if ($crDrType == 'CR') {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $depositIntAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrDrAccId = $mlIntAccId; //Secured Loan
        $jrtrDrDesc = $intAccName;
        $jrtrCrAmt = $depositIntAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrCrAccId = $mlCrAccId; //loan Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'ML Loan Deposit Int Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $depositDOB;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    } else {
        
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $depositIntAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrDrAccId = $mlCrAccId; //Secured Loan
        $jrtrDrDesc = $crAccName;
        $jrtrCrAmt = $depositIntAmt; //$totalPrincipalAmount changed to $principle @Author:PRIYA01APR14
        $jrtrCrAccId = $mlIntAccId; //loan Payment Account Id
        $jrtrCrDesc = $intAccName;
        $jrtrDesc = 'ML Loan Deposit Int Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $depositDOB;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    }
}
?>