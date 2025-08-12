<?php

/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on 20 Mar, 2013 11:51:08 PM
 *
 * @FileName: orggjrtpadpr.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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

/* * ******************************************************************************************* */
/*                       START CODE To Add Journal Entry For Add Princpal @AUTHOR:PRIYA20MAR13                            */
/* * ******************************************************************************************* */
$qSelGirviPrin = "SELECT girv_prin_id,girv_prin_prin_DOB,girv_prin_prin_DOR,girv_prin_upd_sts,
    girv_prin_cust_id,girv_prin_girv_id,girv_prin_firm_id,girv_prin_prin_amt,girv_prin_paid_amt,girv_prin_paid_int
    FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts NOT IN ('Deleted')";
$resGirviPrin = mysqli_query($conn,$qSelGirviPrin) or die(mysqli_error($conn));

$girviOwnerId = $_SESSION[sessionOwnerId];

while ($rowGirviPrin = mysqli_fetch_array($resGirviPrin, MYSQLI_ASSOC)) {

    $girviPrinId = $rowGirviPrin['girv_prin_id'];
    $principalDOB = $rowGirviPrin['girv_prin_prin_DOB'];
    $principalDOB = om_strtoupper(date("d M Y", strtotime($principalDOB)));
    $principalDOR = $rowGirviPrin['girv_prin_prin_DOR'];
    $principalDOR = om_strtoupper(date("d M Y", strtotime($principalDOR)));
    $custId = $rowGirviPrin['girv_prin_cust_id'];
    $girviId = $rowGirviPrin['girv_prin_girv_id'];
    $girviFirmId = $rowGirviPrin['girv_prin_firm_id'];
    $principalAmount = $rowGirviPrin['girv_prin_prin_amt'];
    $totalPrinAmt = $rowGirviPrin['girv_prin_paid_amt'] - $rowGirviPrin['girv_prin_paid_int'];
    $totalPrinInt = $rowGirviPrin['girv_prin_paid_int'];
    $totalAmtPaid = $rowGirviPrin['girv_prin_paid_amt'];
    $girviPrinUpdSts = $rowGirviPrin['girv_prin_upd_sts'];

    if ($principalAmount != 0 && $principalAmount != NULL) {
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
        $qSelCustDetails = "SELECT user_fname,user_lname FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
        $resCustDetails = mysqli_query($conn,$qSelCustDetails) or die(mysqli_error($conn));
        $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);

        $custFirstName = $rowCustDetails['user_fname'];
        $custLastName = $rowCustDetails['user_lname'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
        $selAccName = "SELECT acc_id,acc_main_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Cash in Hand'"; //6
        $resAccName = mysqli_query($conn,$selAccName) or die(mysqli_error($conn));
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
        $jrnlTTDr = $principalAmount;
        $jrnlDrAccId = $SundryDebAccId;
        $jrnlDrDesc = $custFirstName . ' ' . $custLastName;
        $jrnlTTCr = $principalAmount;
        $jrnlCrAccId = $cashAccId;
        $jrnlCrDesc = $cashAccName;
        $jrnlDesc = 'Additional Prin Added';
        $jrnlOthInfo = '';
        $jrnlDOB = $principalDOB;

        $apiType = 'insert';
        include 'ommpjrnl.php';

//Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn,$qSelJournalEntry) or die(mysqli_error($conn));
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
//End Code to Get Last Journal Id


        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Secured Loans'"; //23
        $resAccName = mysqli_query($conn,$selAccName) or die(mysqli_error($conn));
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccId = $rowAccName['acc_id'];
        $drAccName = $rowAccName['acc_user_acc'];

        $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Cash in Hand'"; //6
        $resAccName = mysqli_query($conn,$selAccName) or die(mysqli_error($conn));
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccId = $rowAccName['acc_id'];
        $crAccName = $rowAccName['acc_user_acc'];

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $girviOwnerId;
        $jrtrUserId = $custId;
        $jrtrUserType = 'cust';
        $jrtrTransId = $girviPrinId;
        $jrtrTransType = 'Girvi';
        $jrtrFirmId = $girviFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $principalAmount;
        $jrtrDrAccId = $drAccId; //Secured Loan
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $principalAmount;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Additional Prin Added';
        $jrtrOthInfo = '';
        $jrtrDOB = $principalDOB;

        $apiType = 'insert';
        include 'ommpjrtr.php';
//END CODE 

        $query = "UPDATE girvi_principal SET 
            girv_prin_jrnlid='$jrnlId'
            WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_id ='$girviPrinId'";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }

        //echo '<br/>$principalDOR: ' . $principalDOR;    
        if ($girviPrinUpdSts == 'Released') {

//        $qSelCustDetails = "SELECT cust_fname,cust_lname,cust_add,cust_city,cust_pincode,cust_state,cust_country,cust_mobile FROM customer where cust_owner_id='$_SESSION[sessionOwnerId];' and cust_id='$custId'";
//        $resCustDetails = mysqli_query($conn,$qSelCustDetails);
//        $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
//
//        $custFirstName = $rowCustDetails['cust_fname'];
//        $custLastName = $rowCustDetails['cust_lname'];

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
            $jrnlTTDr = $totalAmtPaid;
            $jrnlDrAccId = $cashAccId;
            $jrnlDrDesc = $cashAccName;
            $jrnlTTCr = $totalAmtPaid;
            $jrnlCrAccId = $SundryDebAccId;
            $jrnlCrDesc = $custFirstName . ' ' . $custLastName;
            $jrnlDesc = 'Additional Prin Released';
            $jrnlOthInfo = '';
            $jrnlDOB = $principalDOR;

            $apiType = 'insert';
            include 'ommpjrnl.php';

            //Start Code to Get Last Journal Id
            $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
            $resJournalEntry = mysqli_query($conn,$qSelJournalEntry) or die(mysqli_error($conn));
            $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
            $jrnlId = $rowJournalEntry['jrnl_id'];
            //End Code to Get Last Journal Id

            $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Secured Loans'"; //23
            $resAccName = mysqli_query($conn,$selAccName) or die(mysqli_error($conn));
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $crAccId = $rowAccName['acc_id'];
            $crAccName = $rowAccName['acc_user_acc'];

            $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Cash in Hand'"; //6
            $resAccName = mysqli_query($conn,$selAccName) or die(mysqli_error($conn));
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $drAccId = $rowAccName['acc_id'];
            $drAccName = $rowAccName['acc_user_acc'];

            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $girviOwnerId;
            $jrtrUserId = $custId;
            $jrtrUserType = 'cust';
            $jrtrTransId = $girviPrinId;
            $jrtrTransType = 'Girvi';
            $jrtrFirmId = $girviFirmId;
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = $totalPrinAmt;
            $jrtrDrAccId = $drAccId; //Secured Loan
            $jrtrDrDesc = $drAccName;
            $jrtrCrAmt = $totalPrinAmt;
            $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
            $jrtrCrDesc = $crAccName;
            $jrtrDesc = 'Rel Add Prin Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $principalDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';

            $selAccName = "SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$girviFirmId' and acc_user_acc='Direct Incomes'"; //16
            $resAccName = mysqli_query($conn,$selAccName) or die(mysqli_error($conn));
            $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
            $crAccId = $rowAccName['acc_id'];
            $crAccName = $rowAccName['acc_user_acc'];

            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $girviOwnerId;
            $jrtrUserId = $custId;
            $jrtrUserType = 'cust';
            $jrtrTransId = $girviPrinId;
            $jrtrTransType = 'Girvi';
            $jrtrFirmId = $girviFirmId;
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = $totalPrinInt;
            $jrtrDrAccId = $drAccId; //Income
            $jrtrDrDesc = $drAccName;
            $jrtrCrAmt = $totalPrinInt;
            $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
            $jrtrCrDesc = $crAccName;
            $jrtrDesc = 'Rel Add Prin Amt';
            $jrtrOthInfo = '';
            $jrtrDOB = $principalDOR;

            $apiType = 'insert';
            include 'ommpjrtr.php';
        }
    }
}//while Add Princ
/* * ******************************************************************************************* */
/*                         END CODE To Add Journal Entry For Add Princpal @AUTHOR:PRIYA20MAR13                        */
/* * ******************************************************************************************* */
?>