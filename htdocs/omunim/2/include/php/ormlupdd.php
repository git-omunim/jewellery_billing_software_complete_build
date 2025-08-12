<?php

/*
 * **************************************************************************************
 * @tutorial: Update LOAN Date
 * **************************************************************************************
 *
 * Created on 9 Aug, 2012 1:16:56 AM
 *
 * @FileName: olgugvdd.php
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
$loanDOBDay = $_POST['loanDOBDay'];
$loanDOBMonth = $_POST['loanDOBMonth'];
$loanDOBYear = $_POST['loanDOBYear'];
$loanJrnlId = $_POST['jrnlId'];
$girviDOB = $_POST['girviDOB'];
$girviSerialNum = $_POST['girviSerialNum'];
$girviFirmId = $_POST['girviFirmId'];

if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
    $loanDOBDay = $_GET['loanDOBDay'];
    $loanDOBMonth = $_GET['loanDOBMonth'];
    $loanDOBYear = $_GET['loanDOBYear'];
    $loanJrnlId = $_GET['jrnlId'];
}
?>
<?php

$loanDOB = $loanDOBDay . ' ' . $loanDOBMonth . ' ' . $loanDOBYear;

if ($loanId == '' or $loanId == NULL or $loanDOBDay == '' or $loanDOBDay == NULL or $loanDOBMonth == '' or $loanDOBMonth == NULL or $loanDOBYear == '' or $loanDOBYear == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    /*     * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
    $sslg_trans_sub = 'MONEYL LOAN DATE UPDATED';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $girviFirmId;
    $sysLogTransId = $girviSerialNum;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Updated Date: ' . $girviDOB . ', Loan Amount: ' . formatInIndianStyle($principalAmount);
    include 'omslgapi.php';
    $addSysLogInd = 'NO';
    /*     * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */
    $qSelGirviDate = "SELECT ml_DOB,ml_new_DOB,ml_loan_type FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_id='$loanId'";
    $resGirviDate = mysqli_query($conn,$qSelGirviDate);
    $rowGirviDate = mysqli_fetch_array($resGirviDate, MYSQLI_ASSOC);


    if ($rowGirviDate['ml_DOB'] == $rowGirviDate['ml_new_DOB']) {
        $qUpdateGirvi = "UPDATE ml_loan SET
		ml_DOB='$loanDOB',ml_new_DOB='$loanDOB'
                WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";
    } else {
        $qUpdateGirvi = "UPDATE ml_loan SET
		ml_new_DOB='$loanDOB'
                WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";
    }
    if (!mysqli_query($conn,$qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * **Start to add new code @AUTHOR: SANDY20JAN14*********************** */
    if ($rowGirviDate['ml_loan_type'] == 'Linked') {
        $updateGTransEntry = "UPDATE girvi_transfer SET gtrans_DOB='$loanDOB' WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_trans_loan_id='$loanId' and gtrans_trans_type='Linked'";
        if (!mysqli_query($conn,$updateGTransEntry)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    /*     * ***End to add new code @AUTHOR: SANDY20JAN14*********************** */
    //to update transferred girvi transfer date as per new changed date @AUTHOR: SANDY27NOV13
    //to update transfer loan if it is linked to this loan


    /*     * ******************************************************************************************* */
    /*                START CODE To Update DR and CR Jounal Entry @AUTHOR: SANDY5AUG13                   */
    /*     * ******************************************************************************************* */

    $jrnlId = $loanJrnlId;
    $jrnlOwnId = $_SESSION[sessionOwnerId];
    $jrnlDob = $loanDOB;                       //Updated Date


    $apiType = 'updateDOB';
    include 'ommpjrnl.php';

    $jrtrJrnlId = $loanJrnlId;
    $jrtrOwnId = $_SESSION[sessionOwnerId];
    $jrnlDob = $loanDOB;                       //Updated Date

    $apiType = 'updateDOB';
    include 'ommpjrtr.php';

    /*     * ******************************************************************************************* */
    /*                   END CODE To Update DR and CR Jounal Entry @AUTHOR: SANDY5AUG13                */
    /*     * ******************************************************************************************* */
    header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId"); //change in filename @AUTHOR: SANDY20NOV13
}
/* * *********End code to Add Trans Girvi Panel @Author:PRIYA06SEP13****************** */
?>
