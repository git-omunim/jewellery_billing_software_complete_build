<?php

/*
 * **************************************************************************************
 * @tutorial: File To change date of all udhaar entries
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

$qSelAllUdhaar = "SELECT udhaar_id,udhaar_cust_id,udhaar_firm_id,udhaar_amt,udhaar_cust_fname,udhaar_cust_lname,udhaar_DOB,udhaar_DOR
    FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]'";

$resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllUdhaar);

while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

    $udhaarId = $rowAllUdhaar['udhaar_id'];
    $udhaarFirmId = $rowAllUdhaar['udhaar_firm_id'];
    $udhaarMainAmount = $rowAllUdhaar['udhaar_amt'];
    $custFirstName = $rowAllUdhaar['udhaar_cust_fname'];
    $custLastName = $rowAllUdhaar['udhaar_cust_lname'];
    
    $custId = $rowAllUdhaar['udhaar_cust_id'];

    $udhaarDOB = $rowAllUdhaar['udhaar_DOB'];
    $udhaarDOB = om_strtoupper(date("d M Y", strtotime($udhaarDOB)));
    $udhaarDOR = $rowAllUdhaar['udhaar_DOR'];
    if ($udhaarDOR == NULL || $udhaarDOR == '01 JAN 1970') {
        $udhaarDOR = '';
    } else {
        $udhaarDOR = om_strtoupper(date("d M Y", strtotime($udhaarDOR)));
    }

    $queryUpdUdhaar = "UPDATE udhaar SET
		udhaar_DOB='$udhaarDOB',udhaar_DOR='$udhaarDOR'
                WHERE udhaar_id='$udhaarId' and udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_id='$custId'";

    if (!mysqli_query($conn,$queryUpdUdhaar)) {
        die('Error: ' . mysqli_error($conn));
    }

    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry @AUTHOR:PRIYA18AUG13                        */
    /*     * ******************************************************************************************* */
    $selAccName = "SELECT acc_user_acc,acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$udhaarFirmId' and acc_user_acc='Cash in Hand'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $accName = $rowAccName['acc_user_acc'];
    $udhaarAccId = $rowAccName['acc_id'];

    $selAccName = "SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$udhaarFirmId' and acc_user_acc='Sundry Debtors'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $SundryDebAccId = $rowAccName['acc_id'];

    $jrnlOwnId = $ownerId;
    $jrnlJId = '';
    $jrnlUserId = $custId;
    $jrnlUserType = 'cust';
    $jrnlTransId = $udhaarId; // Used to navigate
    $jrnlTransType = 'Udhaar'; //Where we hv to navigate
    $jrnlFirmId = $udhaarFirmId;
    $jrnlTTDr = $udhaarMainAmount;
    $jrnlDrAccId = $SundryDebAccId;
    $jrnlDrDesc = $custFirstName . ' ' . $custLastName;
    $jrnlTTCr = $udhaarMainAmount;
    $jrnlCrAccId = $udhaarAccId;
    $jrnlCrDesc = $accName;
    $jrnlDesc = 'New Udhaar Added';
    $jrnlOthInfo = '';
    $jrnlDOB = $udhaarDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_since desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id

    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$udhaarFirmId' and acc_user_acc='Unsecured Loans'"; //23
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccId = $rowAccName['acc_id'];
    $drAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$udhaarFirmId' and acc_user_acc='Cash in Hand'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $ownerId;
    $jrtrUserId = $custId;
    $jrtrUserType = 'cust';
    $jrtrTransId = $udhaarId;
    $jrtrTransType = 'Udhaar';
    $jrtrFirmId = $udhaarFirmId;
    $jrtrTransCRDR = 'CR';
    $jrtrDrAmt = $udhaarMainAmount;
    $jrtrDrAccId = $drAccId; //Unsecured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $udhaarMainAmount;
    $jrtrCrAccId = $udhaarAccId;
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = 'New Udhaar Added';
    $jrtrOthInfo = '';
    $jrtrDOB = $udhaarDOB;

    $apiType = 'insert';
    include 'ommpjrtr.php';

    $query = "UPDATE udhaar SET 
            udhaar_jrnl_id='$jrnlId'
            WHERE udhaar_own_id='$ownerId' and udhaar_id ='$udhaarId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                       END CODE To Add Journal Entry @AUTHOR:PRIYA18AUG13                          */
    /*     * ******************************************************************************************* */
}
?>