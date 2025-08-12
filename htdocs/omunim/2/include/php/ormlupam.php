<?php

/*
 * **************************************************************************************
 * @tutorial: Update Loan Principal Amount
 * **************************************************************************************
 *
 * Created on 8 Aug, 2012 12:19:39 AM
 *
 * @FileName: olgupnam.php
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'ommpincr.php';
require_once 'system/omssopin.php';
?>
<?php

$mlId = $_POST['mlId'];
$loanId = $_POST['loanId'];
$principalAmount = $_POST['principalAmount'];
$loanJrnlId = $_POST['loanJrnlId'];
$girviDOB = $_POST['girviDOB'];
$girviSerialNum = $_POST['girviSerialNum'];
$girviFirmId = $_POST['girviFirmId'];
if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
    $principalAmount = $_GET['principalAmount'];
    $loanJrnlId = $_GET['loanJrnlId'];
}
?>
<?php

if ($loanId == '' or $loanId == NULL or $principalAmount == '' or $principalAmount == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    /*     * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
    $sslg_trans_sub = 'MONEYL LOAN AMT UPDATED';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $girviFirmId;
    $sysLogTransId = $girviSerialNum;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Date: ' . $girviDOB . ', Updated Amount: ' . formatInIndianStyle($principalAmount);
    include 'omslgapi.php';
    $addSysLogInd = 'NO';
    /*     * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */
    $qUpdateGirvi = "UPDATE ml_loan SET
		ml_main_prin_amt='$principalAmount',ml_prin_amt='$principalAmount'
                WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn,$qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }


    $jrnlId = $loanJrnlId;
    $jrnlOwnId = $_SESSION[sessionOwnerId];
    $jrnlTTDr = $principalAmount;                       //Updated Principal
    $jrnlTTCr = $principalAmount;                       //Updated Principal

    $apiType = 'updateTotalCRDR';
    include 'ommpjrnl.php';

    $jrtrJrnlId = $loanJrnlId;
    $jrtrOwnId = $_SESSION[sessionOwnerId];
    $jrtrDrAmt = $principalAmount;                       //Updated Principal
    $jrtrCrAmt = $principalAmount;                       //Updated Principal

    $apiType = 'updateCRDR';
    include 'ommpjrtr.php';

    header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId"); //change in filename @AUTHOR: SANDY20NOV13
}
?>
