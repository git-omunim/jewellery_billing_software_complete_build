<?php

/*
 * **************************************************************************************
 * @tutorial: Girvi transfer Journal
 * **************************************************************************************
 * 
 * Created on May 23, 2014 4:17:58 PM
 *
 * @FileName: orgtjrnl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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

if (($panelName == 'ReleaseTransLoanPanel' || $girviUpdSts == 'Released' || $jrnlPanel == 'LoanAddPrinTrans') && $girviDOR != NULL) {
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviLoanAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccId = $girviLoanAccId;
    $drAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviCashAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccId = $girviCashAccId;
    $crAccName = $rowAccName['acc_user_acc'];

    $jrnlOwnId = $_SESSION['sessionOwnerId'];
    $jrnlJId = '';
    $jrnlUserId = $custId;
    $jrnlUserType = 'cust';
    $jrnlTransId = $gtransId; // Used to navigate
    $jrnlTransType = 'transLoan'; //Where we hv to navigate
    $jrnlFirmId = $firmId;
    $jrnlTTDr = $amountPaid;
    $jrnlDrAccId = $drAccId;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $amountPaid;
    $jrnlCrAccId = $crAccId;
    $jrnlCrDesc = $crAccName;
//    if ($panelName == 'AddPrinReleasePanel')
    if ($jrnlPanel == 'LoanAddPrinTrans')
        $jrnlDesc = 'Additional Principal Released';
    else
        $jrnlDesc = 'Trans Loan Released';
    $jrnlOthInfo = '';
    $jrnlDOB = $girviDOR;

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
    $jrtrOwnId = $_SESSION['sessionOwnerId'];
    $jrtrUserId = $custId;
    $jrtrUserType = 'cust';
    $jrtrTransId = $gtransId;
    $jrtrTransType = 'transLoan';
    $jrtrFirmId = $firmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $totAmount;
    $jrtrDrAccId = $drAccId; //Secured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $totAmount;
    $jrtrCrAccId = $crAccId; //loan Payment Account Id
    $jrtrCrDesc = $crAccName;
    if ($panelName == 'AddPrinReleasePanel')
        $jrtrDesc = 'Add Princ Trans Principal Amt';
    else
        $jrtrDesc = 'Released Trans Loan Principal Amt';
    $jrtrOthInfo = '';
    $jrtrDOB = $girviDOR;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    //For Interest Amount
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviIntAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drIncomeAccId = $girviIntAccId;
    $drIncomeAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $_SESSION['sessionOwnerId'];
    $jrtrUserId = $custId;
    $jrtrUserType = 'cust';
    $jrtrTransId = $gtransId;
    $jrtrTransType = 'transLoan';
    $jrtrFirmId = $firmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $interestPaid;
    $jrtrDrAccId = $drIncomeAccId; //Income
    $jrtrDrDesc = $drIncomeAccName;
    $jrtrCrAmt = $interestPaid;
    $jrtrCrAccId = $crAccId; //loan Payment Account Id
    $jrtrCrDesc = $crAccName;
    if ($panelName == 'AddPrinReleasePanel')
        $jrtrDesc = 'Add Princ Trans Interest Amt';
    else
        $jrtrDesc = 'Released Trans Loan Interest Amt';
    $jrtrOthInfo = '';
    $jrtrDOB = $girviDOR;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    if ($discountPaid > 0) {
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviDiscAccId'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crDisAccId = $girviDiscAccId;
        $crDisAccName = $rowAccName['acc_user_acc'];

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $_SESSION['sessionOwnerId'];
        $jrtrUserId = $custId;
        $jrtrUserType = 'cust';
        $jrtrTransId = $gtransId;
        $jrtrTransType = 'transLoan';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $discountPaid;
        $jrtrDrAccId = $drIncomeAccId; //Income
        $jrtrDrDesc = $drIncomeAccName;
        $jrtrCrAmt = $discountPaid;
        $jrtrCrAccId = $crDisAccId; //loan Payment Account Id
        $jrtrCrDesc = $crDisAccName;
        if ($panelName == 'AddPrinReleasePanel')
            $jrtrDesc = 'Add Princ Trans Discount Amt';
        else
            $jrtrDesc = 'Released Trans Loan Discount Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $girviDOR;

        $apiType = 'insert';
        include 'ommpjrtr.php';
    }
}
if ($panelName == 'TransLoanPanel' || $girviUpdSts == 'Released' || $girviUpdSts == 'Transferred' || $jrnlPanel == 'LoanAddPrinTrans') {
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviTransferPayAcnt'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'];
    $drAccId = $girviTransferPayAcnt;

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviTransCrAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];
    $crAccId = $girviTransCrAccId;

    $jrnlOwnId = $girviOwnerId;
    $jrnlJId = '';
    $jrnlUserId = $custId;
    $jrnlUserType = 'cust';
    $jrnlTransId = $girviTransGriviId; // Used to navigate
    $jrnlTransType = 'transLoan'; //Where we hv to navigate
    $jrnlFirmId = $girviTransferFirmId;
    $jrnlTTDr = $principalAmount;
    $jrnlDrAccId = $drAccId;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $principalAmount;
    $jrnlCrAccId = $crAccId;
    $jrnlCrDesc = $crAccName;
    if ($jrnlPanel == 'LoanAddPrinTrans')
        $jrnlDesc = 'Additional Principal Transferred';
    else
        $jrnlDesc = 'Loan Transferred';
    $jrnlOthInfo = '';
    $jrnlDOB = $girviTransDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

//Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' order by jrnl_since desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
//End Code to Get Last Journal Id


    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $girviOwnerId;
    $jrtrUserId = "$custId";
    $jrtrUserType = 'cust';
    $jrtrTransId = "$girviTransGriviId";
    $jrtrTransType = 'transLoan';
    $jrtrFirmId = $girviTransferFirmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $principalAmount;
    $jrtrDrAccId = $drAccId; //Secured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $principalAmount;
    $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
    $jrtrCrDesc = $crAccName;
    if ($jrnlPanel == 'LoanAddPrinTrans')
        $jrtrDesc = 'Additional Principal Transferred';
    else
        $jrtrDesc = 'Loan Transferred';
    $jrtrOthInfo = '';
    $jrtrDOB = $girviTransDOB;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    $updateLoanJrnlId = "UPDATE girvi_transfer SET gtrans_jrnlid='$jrnlId' WHERE gtrans_id='$girviTransGriviId'";
    if (!mysqli_query($conn,$updateLoanJrnlId)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>