<?php

/*
 * **************************************************************************************
 * @tutorial: File To change date of all transaction entries
 * **************************************************************************************
 * 
 * Created on Mar 20, 2013 2:28:07 PM
 *
 * @FileName: ortrdtch.php
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>
<?php

$transactionOwnerId = $_SESSION[sessionOwnerId];

$qSelAllTrans = "SELECT transaction_id,transaction_firm_id,transaction_amt,transaction_from_cr_acc_id,transaction_to_dr_acc_id,transaction_DOB
    FROM transaction where transaction_own_id='$_SESSION[sessionOwnerId]'";

$resAllTrans = mysqli_query($conn,$qSelAllTrans) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllTrans);

while ($rowAllTrans = mysqli_fetch_array($resAllTrans, MYSQLI_ASSOC)) {

    $transId = $rowAllTrans['transaction_id'];
    $transFirmId = $rowAllTrans['transaction_firm_id'];
    $transAmt = $rowAllTrans['transaction_amt'];

    $transFromAcc = $rowAllTrans['transaction_from_cr_acc_id'];
    $transToAcc = $rowAllTrans['transaction_to_dr_acc_id'];

    $transactionDOB = $rowAllTrans['transaction_DOB'];
    $transactionDOB = om_strtoupper(date("d M Y", strtotime($transactionDOB)));

    $queryUpdTrans = "UPDATE transaction SET
		transaction_DOB='$transactionDOB'
                WHERE transaction_id='$transId' and transaction_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn,$queryUpdTrans)) {
        die('Error: ' . mysqli_error($conn));
    }

    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry @AUTHOR:PRIYA29JAN13                            */
    /*     * ******************************************************************************************* */

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transToAcc'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$transFromAcc'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];

    $jrnlOwnId = $transactionOwnerId;
    $jrnlJId = '';
    $jrnlUserId = $transId;
    $jrnlUserType = 'Trans';
    $jrnlTransId = $transId; // Used to navigate
    $jrnlTransType = 'Trans'; //Where we hv to navigate
    $jrnlFirmId = $transFirmId;
    $jrnlTTDr = $transAmt;
    $jrnlDrAccId = $transToAcc;
    $jrnlDrDesc = $drAccName;
    $jrnlTTCr = $transAmt;
    $jrnlCrAccId = $transFromAcc;
    $jrnlCrDesc = $crAccName;
    $jrnlDesc = 'New Transaction Added';
    $jrnlOthInfo = '';
    $jrnlDOB = $transactionDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_since desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id
//    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='23'";
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $drAccName = $rowAccName['acc_user_acc'];
//
//    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviAccId'";
//    $resAccName = mysqli_query($conn,$selAccName);
//    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
//    $crAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $transactionOwnerId;
    $jrtrUserId = $transId;
    $jrtrUserType = 'Trans';
    $jrtrTransId = $transId;
    $jrtrTransType = 'Trans';
    $jrtrFirmId = $transFirmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $transAmt;
    $jrtrDrAccId = $transToAcc; //Secured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $transAmt;
    $jrtrCrAccId = $transFromAcc; //Girvi Payment Account Id
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = 'New Transaction Added';
    $jrtrOthInfo = '';
    $jrtrDOB = $transactionDOB;

    $apiType = 'insert';
    include 'ommpjrtr.php';
    //END CODE 

    $query = "UPDATE transaction SET 
            transaction_jrnl_id='$jrnlId'
            WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_id ='$transId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                         END CODE To Add Journal Entry @AUTHOR:PRIYA29JAN13                            */
    /*     * ******************************************************************************************* */
}
?>