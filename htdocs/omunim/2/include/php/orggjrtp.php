<?php

/*
 * **************************************************************************************
 * @tutorial: File To Add Journal Entry For Existing Girvi
 * **************************************************************************************
 * 
 * Created on Mar 20, 2013 2:28:07 PM
 *
 * @FileName: orggjrtp.php
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

$qSelAllGirvi = "SELECT girv_cust_id,girv_id,girv_firm_id,girv_main_prin_amt,girv_prin_amt,girv_cust_fname,girv_cust_lname,
    girv_cr_acc_id,girv_DOB,girv_DOR,girv_total_amt,girv_paid_amt,girv_paid_int,girv_upd_sts 
    FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_upd_sts IN ('New','Updated','Released')";

$resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);

while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $girviOwnerId = $_SESSION[sessionOwnerId];
    $custId = $rowAllGirvi['girv_cust_id'];
    $girviId = $rowAllGirvi['girv_id'];
    $custFirstName = $rowAllGirvi['girv_cust_fname'];
    $custLastName = $rowAllGirvi['girv_cust_lname'];
    $girviFirmId = $rowAllGirvi['girv_firm_id'];
    $principalAmount = $rowAllGirvi['girv_main_prin_amt'];
    //$girviAccId = $rowAllGirvi['girv_cr_acc_id'];
    $girviDOB = $rowAllGirvi['girv_DOB'];
    $girviDOB = om_strtoupper(date("d M Y", strtotime($girviDOB)));
    $girviUpdSts = $rowAllGirvi['girv_upd_sts'];

    $girviDOR = $rowAllGirvi['girv_DOR'];
    $girviDOR = om_strtoupper(date("d M Y", strtotime($girviDOR)));
    $totalPrincipalAmount = $rowAllGirvi['girv_total_amt'];
    $amountPaid = $rowAllGirvi['girv_paid_amt'];
    $interestPaid = $rowAllGirvi['girv_paid_int'];

    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry After Add Girvi @AUTHOR:PRIYA20MAR13                            */
    /*     * ******************************************************************************************* */

    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Cash in Hand'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $girviAccId = $rowAccName['acc_id'];
    $accName = $rowAccName['acc_user_acc'];

    $query = "UPDATE girvi SET
        girv_cr_acc_id='$girviAccId' where girv_id='$girviId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }

    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Sundry Debtors'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $SundryDebAccId = $rowAccName['acc_id'];

    $jrnlOwnId = $girviOwnerId;
    $jrnlJId = '';
    $jrnlUserId = $custId;
    $jrnlUserType = 'cust';
    $jrnlTransId = $girviId; // Used to navigate
    $jrnlTransType = 'Girvi'; //Where we hv to navigate
    $jrnlFirmId = $girviFirmId;
    $jrnlTTDr = $principalAmount;
    $jrnlDrAccId = $SundryDebAccId;
    $jrnlDrDesc = $custFirstName . ' ' . $custLastName;
    $jrnlTTCr = $principalAmount;
    $jrnlCrAccId = $girviAccId;
    $jrnlCrDesc = $accName;
    $jrnlDesc = 'New Girvi Added';
    $jrnlOthInfo = '';
    $jrnlDOB = $girviDOB;

    $apiType = 'insert';
    include 'ommpjrnl.php';

    //Start Code to Get Last Journal Id
    $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //End Code to Get Last Journal Id


    $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Secured Loans'"; //23
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccId = $rowAccName['acc_id'];
    $drAccName = $rowAccName['acc_user_acc'];

    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$girviAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'];

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $girviOwnerId;
    $jrtrUserId = $custId;
    $jrtrUserType = 'cust';
    $jrtrTransId = $girviId;
    $jrtrTransType = 'Girvi';
    $jrtrFirmId = $girviFirmId;
    $jrtrTransCRDR = 'CR';
    $jrtrDrAmt = $principalAmount;
    $jrtrDrAccId = $drAccId; //Secured Loan
    $jrtrDrDesc = $drAccName;
    $jrtrCrAmt = $principalAmount;
    $jrtrCrAccId = $girviAccId; //Girvi Payment Account Id
    $jrtrCrDesc = $crAccName;
    $jrtrDesc = 'New Girvi Added';
    $jrtrOthInfo = '';
    $jrtrDOB = $girviDOB;

    $apiType = 'insert';
    include 'ommpjrtr.php';
    //END CODE 

    $query = "UPDATE girvi SET 
            girv_jrnlid='$jrnlId'
            WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_id ='$girviId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                         END CODE To Add Journal Entry After Add Girvi @AUTHOR:PRIYA20MAR13                            */
    /*     * ******************************************************************************************* */

    if ($girviUpdSts == 'Released') {
        /*         * ******************************************************************************************* */
        /*                       START CODE To Add Journal Entry After Relese Girvi @AUTHOR:PRIYA20MAR13                            */
        /*         * ******************************************************************************************* */
 //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->               
        $qSelCustDetails = "SELECT user_fname,user_lname FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
        $resCustDetails = mysqli_query($conn,$qSelCustDetails);
        $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);

        $custFirstName = $rowCustDetails['user_fname'];
        $custLastName = $rowCustDetails['user_lname'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
        $selAccName = "SELECT acc_id,acc_main_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Cash in Hand'"; //6  //Right now rec amt in CASH
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $cashAccId = $rowAccName['acc_id'];
        $cashAccName = $rowAccName['acc_main_acc'];

        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Sundry Debtors'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $SundryDebAccId = $rowAccName['acc_id'];

        $jrnlOwnId = $girviOwnerId;
        $jrnlJId = '';
        $jrnlUserId = $custId;
        $jrnlUserType = 'cust';
        $jrnlTransId = $girviId; // Used to navigate
        $jrnlTransType = 'Girvi'; //Where we hv to navigate
        $jrnlFirmId = $girviFirmId;
        $jrnlTTDr = $amountPaid;
        $jrnlDrAccId = $cashAccId;
        $jrnlDrDesc = $cashAccName;
        $jrnlTTCr = $amountPaid;
        $jrnlCrAccId = $SundryDebAccId;
        $jrnlCrDesc = $custFirstName . ' ' . $custLastName;
        $jrnlDesc = 'Loan Released';
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

        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Secured Loans'"; //23
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccId = $rowAccName['acc_id'];
        $crAccName = $rowAccName['acc_user_acc'];

        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Cash in Hand'"; //6
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccId = $rowAccName['acc_id'];
        $drAccName = $rowAccName['acc_user_acc'];

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $girviOwnerId;
        $jrtrUserId = $custId;
        $jrtrUserType = 'cust';
        $jrtrTransId = $girviId;
        $jrtrTransType = 'Girvi';
        $jrtrFirmId = $girviFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $totalPrincipalAmount;
        $jrtrDrAccId = $drAccId; //Secured Loan
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $totalPrincipalAmount;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Released Girvi Principal Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $girviDOR;

        $apiType = 'insert';
        include 'ommpjrtr.php';

        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Direct Incomes'"; //16
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccId = $rowAccName['acc_id'];
        $crAccName = $rowAccName['acc_user_acc'];

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $girviOwnerId;
        $jrtrUserId = $custId;
        $jrtrUserType = 'cust';
        $jrtrTransId = $girviId;
        $jrtrTransType = 'Girvi';
        $jrtrFirmId = $girviFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $interestPaid;
        $jrtrDrAccId = $drAccId; 
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $interestPaid;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Released Girvi Interest Amt';
        $jrtrOthInfo = '';
        $jrtrDOB = $girviDOR;

        $apiType = 'insert';
        include 'ommpjrtr.php';

        /*         * ******************************************************************************************* */
        /*                         END CODE To Add Journal Entry After Relese Girvi@AUTHOR:PRIYA20MAR13                            */
        /*         * ******************************************************************************************* */
    }//GirviDOR IF 
}//while
?>