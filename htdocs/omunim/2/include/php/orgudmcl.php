<?php /**
 * 
 * Created on Jul 13, 2011 11:16:17 AM
 *
 * @FileName: orgudmcl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */ ?>
<?php

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

$qSelPricipal = "SELECT girv_prin_id,girv_prin_prin_amt,girv_prin_comm FROM girvi_principal where girv_prin_girv_id='$girviId' and girv_prin_cust_id='$custId' and girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts IN ('New','Updated') order by girv_prin_ent_dat desc";
$resPrincipal = mysqli_query($conn,$qSelPricipal);
$totalPrincipalAmounts = mysqli_num_rows($resPrincipal); //Total Number of Principal Amounts
//echo 'Total Principal Amounts:'.$totalPrincipalAmounts;

$temGirviDepositAmount = $girviDepositAmount;

$girviDepositAmount = $girviDepositAmount - $totalInterestAmount;

$depositCounter = 0;

while ($rowPrincipal = mysqli_fetch_array($resPrincipal, MYSQLI_ASSOC)) {

    if ($girviDepositAmount != 0 && $depositCounter == 0) {
        $principalAmountComm = $principalAmountComm . 'Total Deposit Money = <b>'. $globalCurrency.' ' . $temGirviDepositAmount . '</b> till date:' . $girviDepositDate . '.' . '<br />';
        $principalAmountComm = $principalAmountComm . 'Total Interest = <b>'. $globalCurrency.' ' . $totalInterestAmount . '</b> till date:' . $girviDepositDate . '.' . '<br />';
        $tempGirviDepositAmount = $temGirviDepositAmount - $totalInterestAmount;
        $principalAmountComm = $principalAmountComm . 'Total Deposite Money Left (' . $temGirviDepositAmount . ' - ' . $totalInterestAmount . ') = <b>'. $globalCurrency.' '. $tempGirviDepositAmount . '</b>.' . '<br /><br />';
    }

    $principalId = $rowPrincipal['girv_prin_id'];
    $principalAmountInDB = $rowPrincipal['girv_prin_prin_amt'];

    if ($girviDepositAmount <= $principalAmountInDB && $girviDepositAmount != 0) {

        $newPrincipalAmount = $principalAmountInDB - $girviDepositAmount;

        $principalAmountComm = $principalAmountComm . '<b>'. $globalCurrency.' ' . $girviDepositAmount . '</b> Money has been Adjusted into Principal Amount (' . $principalAmountInDB . ') on ' . $girviDepositDate . '.' . '<br />';
        $principalAmountComm = $principalAmountComm . 'Now New Principal Amount is (' . $principalAmountInDB . ' - ' . $girviDepositAmount . ') = <b>'. $globalCurrency.' ' . $newPrincipalAmount . '</b>.' . '<br />';
        $principalAmountComm = $principalAmountComm . '---------------------------------------------------------------------------------------------------------------------------------------<br /><br />';

        $principalAmountStatus = 'Updated';

        $qUpdateGirviPrincipal = "UPDATE girvi_principal SET
		girv_prin_prin_amt='$newPrincipalAmount',
		girv_prin_prin_DOB='$girviDepositDate',
                girv_prin_upd_sts='$principalAmountStatus'
		WHERE girv_prin_id='$principalId' and girv_prin_girv_id='$girviId' and girv_prin_cust_id='$custId' and girv_prin_own_id='$_SESSION[sessionOwnerId]'";
//girv_prin_comm='$principalAmountComm',

        if (!mysqli_query($conn,$qUpdateGirviPrincipal)) {
            die('Error: ' . mysqli_error($conn));
        }
        $girviDepositAmount = 0;
        $depositCounter++;
    } else if ($girviDepositAmount > $principalAmountInDB && $girviDepositAmount != 0) {

        $newPrincipalAmount = 0;

        $girviDepositAmount = $girviDepositAmount - $principalAmountInDB;

        $principalAmountComm = $principalAmountComm . '<b>'. $globalCurrency.' ' . $principalAmountInDB . '</b> Money has been paid for Principal Amount (' . $principalAmountInDB . ') on ' . $girviDepositDate . '.' . '<br />';
        $principalAmountComm = $principalAmountComm . 'Now Deposit Money Left: <b>'. $globalCurrency.' ' . $girviDepositAmount . '</b>.' . '<br />';
        $principalAmountComm = $principalAmountComm . '---------------------------------------------------------------------------------------------------------------------------------------<br /><br />';
        $principalAmountStatus = 'Released';

        $qUpdateGirviPrincipal = "UPDATE girvi_principal SET
		girv_prin_prin_amt='$newPrincipalAmount',
		girv_prin_prin_DOR='$girviDepositDate',
                girv_prin_upd_sts='$principalAmountStatus'
		WHERE girv_prin_id='$principalId' and girv_prin_girv_id='$girviId' and girv_prin_cust_id='$custId' and girv_prin_own_id='$_SESSION[sessionOwnerId]'";
//girv_prin_comm='$principalAmountComm',

        if (!mysqli_query($conn,$qUpdateGirviPrincipal)) {
            die('Error: ' . mysqli_error($conn));
        }
        $depositCounter++;
    }
}

//Now Check Main Principal Amount

$qSelMainPricipal = "SELECT girv_main_prin_amt,girv_prin_amt,girv_comm,girv_DOB FROM girvi where girv_id='$girviId' and girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]'";
$resMainPrincipal = mysqli_query($conn,$qSelMainPricipal);

while ($rowMainPrincipal = mysqli_fetch_array($resMainPrincipal, MYSQLI_ASSOC)) {

    $mainStablePrincipalAmountInDB = $rowMainPrincipal['girv_main_prin_amt'];
    $mainPrincipalAmountInDB = $rowMainPrincipal['girv_prin_amt'];
    $girviMainDate = $rowMainPrincipal['girv_DOB'];



    if ($girviDepositAmount <= $mainPrincipalAmountInDB && $girviDepositAmount != 0) {

        $newMainPrincipalAmount = $mainPrincipalAmountInDB - $girviDepositAmount;

        $mainPrincipalAmountComm = '<b>'. $globalCurrency.' ' . $girviDepositAmount . '</b> Money has been adjusted into Principal Amount (' . $mainPrincipalAmountInDB . ') on ' . $girviDepositDate . '.' . '<br />';
        $mainPrincipalAmountComm = $mainPrincipalAmountComm . 'Now New Principal Amount is (' . $mainPrincipalAmountInDB . ' - ' . $girviDepositAmount . ') = <b>'. $globalCurrency.' ' . $newMainPrincipalAmount . '</b>.' . '<br />';
        $mainPrincipalAmountComm = $mainPrincipalAmountComm . '---------------------------------------------------------------------------------------------------------------------------------------<br /><br />';


        $mainPrincipalAmountStatus = 'Updated';

        $qUpdateGirviMainPrincipal = "UPDATE girvi SET
		girv_prin_amt='$newMainPrincipalAmount',
		girv_upd_sts='$mainPrincipalAmountStatus'
		WHERE girv_id='$girviId' and girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]'";

        if (!mysqli_query($conn,$qUpdateGirviMainPrincipal)) {
            die('Error: ' . mysqli_error($conn));
        }
        $girviDepositAmount = 0;
    } else if ($girviDepositAmount > $mainPrincipalAmountInDB && $girviDepositAmount != 0) {

        echo 'Error';
    }

    $mainPrincipalAmountComm =  $mainPrincipalAmountComm . '<b>Main Principal:' . $mainStablePrincipalAmountInDB . '</b>.' . '<br />' .
                                '<b>Girvi Date:' . $girviMainDate . '</b>.' . '<br />' .
                                '<b>New Girvi Date:' . $girviDepositDate . '</b>.' . '<br />';
    $mainPrincipalAmountComm = $mainPrincipalAmountComm . '============================================================================<br />';
    $mainPrincipalAmountComm = $mainPrincipalAmountComm . '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br />';
    $mainPrincipalAmountComm = $mainPrincipalAmountComm . '============================================================================<br /><br />';

    $qUpdateGirvi = "UPDATE girvi SET
		girv_DOB='$girviDepositDate'
                WHERE girv_id='$girviId' and girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]'";
//girv_comm='$mainPrincipalAmountComm'

    if (!mysqli_query($conn,$qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>