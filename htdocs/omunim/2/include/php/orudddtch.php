<?php

/*
 * **************************************************************************************
 * @tutorial: File To change date of all udhaar_deposit entries and add journal entries
 * **************************************************************************************
 * 
 * Created on Mar 20, 2013 2:28:07 PM
 *
 * @FileName: orggdtch.php
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
$ownerId = $_SESSION[sessionOwnerId];

$qSelAllUdhaar = "SELECT udhadepo_id,udhadepo_cust_id,udhadepo_firm_id,udhadepo_amt,udhadepo_DOB
    FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]'";

$resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllUdhaar);

while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

    $udhaarDepId = $rowAllUdhaar['udhadepo_id'];
    $udhaarDepFirmId = $rowAllUdhaar['udhadepo_firm_id'];
    $udhaarDepMainAmount = $rowAllUdhaar['udhadepo_amt'];
    $custId = $rowAllUdhaar['udhadepo_cust_id'];

    $udhaarDepDOB = $rowAllUdhaar['udhadepo_DOB'];
    $udhaarDepDOB = om_strtoupper(date("d M Y", strtotime($udhaarDepDOB)));

    $queryUpdUdhaar = "UPDATE udhaar_deposit SET
		udhadepo_DOB='$udhaarDepDOB'
                WHERE udhadepo_id='$udhaarDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_cust_id='$custId'";

    if (!mysqli_query($conn,$queryUpdUdhaar)) {
        die('Error: ' . mysqli_error($conn));
    }

    /*     * ******************************************************************************************* */
    /*                START CODE To Insert Udhaar Deposit Money Journal Entry  @AUTHOR:PRIYA18AUG13           */
    /*     * ******************************************************************************************* */
  //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->          
    $qSelCustDetails = "SELECT user_fname,user_lname FROM user where user_owner_id='$ownerId' and user_id='$custId'";
    $resCustDetails = mysqli_query($conn,$qSelCustDetails);
    $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);

    $custFirstName = $rowCustDetails['user_fname'];
    $custLastName = $rowCustDetails['user_lname'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
    $selAccName = "SELECT acc_id,acc_main_acc FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$udhaarDepFirmId' and acc_user_acc='Cash in Hand'"; //6  //Right now rec amt in CASH
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $cashAccId = $rowAccName['acc_id'];
    $cashAccName = $rowAccName['acc_main_acc'];

    $selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$udhaarDepFirmId' and acc_user_acc='Sundry Debtors'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $SundryDebAccId = $rowAccName['acc_id'];

    $jrnlOwnId = $ownerId;
    $jrnlJId = '';
    $jrnlUserId = $custId;
    $jrnlUserType = 'cust';
    $jrnlTransId = $udhaarDepId; // Used to navigate
    $jrnlTransType = 'Udhaar'; //Where we hv to navigate
    $jrnlFirmId = $udhaarDepFirmId;
    $jrnlTTDr = $udhaarDepMainAmount;
    $jrnlDrAccId = $cashAccId;
    $jrnlDrDesc = $cashAccName;
    $jrnlTTCr = $udhaarDepMainAmount;
    $jrnlCrAccId = $SundryDebAccId;
    $jrnlCrDesc = $custFirstName . ' ' . $custLastName;
    $jrnlDesc = 'Udhaar Deposit Money';
    $jrnlOthInfo = '';
    $jrnlDOB = $udhaarDepDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_since desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id

    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$udhaarDepFirmId' and acc_user_acc='Unsecured Loans'"; //23
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccId = $rowAccName['acc_id'];
    $crAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$udhaarDepFirmId' and acc_user_acc='Cash in Hand'"; //6
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccId = $rowAccName['acc_id'];
    $drAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $ownerId;
    $jrtrUserId = $custId;
    $jrtrUserType = 'cust';
    $jrtrTransId = $udhaarDepId;
    $jrtrTransType = 'Udhaar';
    $jrtrFirmId = $udhaarDepFirmId;
    $jrtrTransCRDR = 'DR';
    $jrtrDrAmt = $udhaarDepMainAmount;
    $jrtrDrAccId = $drAccId; //Unsecured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $udhaarDepMainAmount;
    $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = 'Udhaar Deposit Money';
    $jrtrOthInfo = '';
    $jrtrDOB = $udhaarDepDOB;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    $query = "UPDATE udhaar_deposit SET 
            udhadepo_jrnl_id='$jrnlId'
            WHERE udhadepo_own_id='$ownerId' and udhadepo_id ='$udhaarDepId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }

    /*     * ******************************************************************************************* */
    /*                END CODE To Insert Udhaar Deposit Money Journal Entry  @AUTHOR:PRIYA18AUG13        */
    /*     * ******************************************************************************************* */
}
?>