<?php

/*
 * **************************************************************************************
 * @tutorial:Update Loan Serial Number
 * **************************************************************************************
 *
 * Created on 10 Aug, 2012 12:15:53 AM
 *
 * @FileName: orgusrnm.php
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
$loanSerialNum = $_POST['loanSerialNum'];
$loanPreSerialNum = $_POST['loanPreSerialNum'];
$girviDOB = $_POST['loanDOB'];
$principalAmount = $_POST['prinAmt'];
$girviFirmId = $_POST['loanFirmId'];
$loanType = $_POST['loanType'];
if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
    $loanSerialNum = $_GET['loanSerialNum'];
    $loanPreSerialNum = $_GET['loanPreSerialNum'];
}
?>
<?php

if ($loanId == '' or $loanId == NULL or $loanSerialNum == '' or $loanSerialNum == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    exit(0);
} else {
    /*     * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
    $sslg_trans_sub = 'MONEYL SERIAL NO UPDATED';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $girviFirmId;
    $sysLogTransId = $loanPreSerialNum . $loanSerialNum;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Date: ' . $girviDOB . ', Amt: ' . formatInIndianStyle($principalAmount);
    include 'omslgapi.php';
    /*     * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */
    $qSelGirviSerialNo = "SELECT ml_pre_serial_num,ml_serial_num FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_pre_serial_num = '$loanPreSerialNum' and ml_serial_num ='$loanSerialNum'";
    $resGirviSerialNo = mysqli_query($conn,$qSelGirviSerialNo);
    $girviSerialNoCount = mysqli_num_rows($resGirviSerialNo);

    if ($girviSerialNoCount > 0) {
        echo 'SerialNumAlreadyExist';
        exit(0);
    } else {
        $qUpdateGirvi = "UPDATE ml_loan SET
		ml_pre_serial_num = '$loanPreSerialNum' , ml_serial_num='$loanSerialNum'
                WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";
        if (!mysqli_query($conn,$qUpdateGirvi)) {
            die('Error: ' . mysqli_error($conn));
        }
        if ($loanType == 'Linked') {
            $qUpdateTransGirvi = "UPDATE girvi_transfer SET
		global_gt_pre_serial_num='$loanPreSerialNum', global_gt_serial_num='$loanSerialNum'
                WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_trans_loan_id='$loanId'";
            if (!mysqli_query($conn,$qUpdateTransGirvi)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId");
    }
}
?>
