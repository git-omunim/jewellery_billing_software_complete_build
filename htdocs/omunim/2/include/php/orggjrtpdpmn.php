<?php

/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on 21 Mar, 2013 8:54:54 AM
 *
 * @FileName: orggjrtpdpmn.php
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
/*                START CODE To Insert Deposit Money Journal Entry  @AUTHOR:PRIYA01March13       */
/* * ******************************************************************************************* */
$qSelGirviDep = "SELECT girv_mondep_id,girv_mondep_cust_id,girv_mondep_girv_id,girv_mondep_firm_id,girv_mondep_amt,girv_mondep_date,girv_mondep_prin_amt,girv_mondep_int_amt 
    FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts NOT IN ('Deleted')";
$resGirviDep = mysqli_query($conn,$qSelGirviDep);

$girviOwnerId = $_SESSION[sessionOwnerId];

while ($rowGirviDep = mysqli_fetch_array($resGirviDep, MYSQLI_ASSOC)) {

    $girviDepId = $rowGirviDep['girv_mondep_id'];
    $custId = $rowGirviDep['girv_mondep_cust_id'];
    $girviDepGirviId = $rowGirviDep['girv_mondep_girv_id'];
    $girviFirmId = $rowGirviDep['girv_mondep_firm_id'];
    $girviDepositAmount = $rowGirviDep['girv_mondep_amt'];
    $girviDepositDate = $rowGirviDep['girv_mondep_date'];
    $girviDepositDate = om_strtoupper(date("d M Y", strtotime($girviDepositDate)));
    $girviDepositPrinAmount = $rowGirviDep['girv_mondep_prin_amt'];
    $girviDepositIntAmount = $rowGirviDep['girv_mondep_int_amt'];
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
    if ($girviDepositAmount != 0 && $girviDepositAmount != NULL) {
        $qSelCustDetails = "SELECT user_fname,user_lname 
        FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
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
        $jrnlTransId = $girviDepGirviId; // Used to navigate
        $jrnlTransType = 'Girvi'; //Where we hv to navigate
        $jrnlFirmId = $girviFirmId;
        $jrnlTTDr = $girviDepositAmount;
        $jrnlDrAccId = $cashAccId;
        $jrnlDrDesc = $cashAccName;
        $jrnlTTCr = $girviDepositAmount;
        $jrnlCrAccId = $SundryDebAccId;
        $jrnlCrDesc = $custFirstName . ' ' . $custLastName;
        $jrnlDesc = 'Girvi Deposit Money';
        $jrnlOthInfo = '';
        $jrnlDOB = $girviDepositDate;

        $apiType = 'insert';
        include 'ommpjrnl.php';

        //Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn,$qSelJournalEntry) or die(mysqli_error($conn));
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id
        //
    //
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
        $jrtrTransId = $girviDepId;
        $jrtrTransType = 'Girvi';
        $jrtrFirmId = $girviFirmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $girviDepositPrinAmount;
        $jrtrDrAccId = $drAccId; //Secured Loan
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $girviDepositPrinAmount;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Girvi Prin Amt Deposit';
        $jrtrOthInfo = '';
        $jrtrDOB = $girviDepositDate;

        $apiType = 'insert';
        include 'ommpjrtr.php';

        //For Interest Amount
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
        $jrtrTransId = $girviDepId;
        $jrtrTransType = 'Girvi';
        $jrtrFirmId = $girviFirmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $girviDepositIntAmount;
        $jrtrDrAccId = $drAccId; //Income
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $girviDepositIntAmount;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'Girvi Int Amt Deposit';
        $jrtrOthInfo = '';
        $jrtrDOB = $girviDepositDate;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        //END CODE 

        $query = "UPDATE girvi_money_deposit SET 
            girv_mondep_jrnlid='$jrnlId'
            WHERE girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_id ='$girviDepId'";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}//while 
/* * ******************************************************************************************* */
/*                        END CODE To Insert Deposit Money Journal Entry  @AUTHOR:PRIYA01March13     */
/* * ******************************************************************************************* */
?>