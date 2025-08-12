<?php

/*
 * **************************************************************************************
 * @tutorial: Update Loan Other Information
 * **************************************************************************************
 *
 * Created on 2 Sep, 2012 6:47:19 PM
 *
 * @FileName: orguotin.php
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

require_once 'system/omssopin.php';
?>
<?php

$mlId = $_POST['mlId'];
$loanId = $_POST['loanId'];
$loanOtherInfo = $_POST['loanOtherInfo'];
$girviDOB = $_POST['girviDOB'];
$girviSerialNum = $_POST['girviSerialNum'];
$girviFirmId = $_POST['girviFirmId'];
?>
<?php
if ($loanId == '' or $loanId == NULL or $loanOtherInfo == '' or $loanOtherInfo == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    exit(0);
} else {
    /*     * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
    $sslg_trans_sub = 'MONEYL OTHER INFO UPDATED';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $girviFirmId;
    $sysLogTransId = $girviSerialNum;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Date: ' . $girviDOB . ', Other Info: ' . $loanOtherInfo;
    include 'omslgapi.php';
    /*     * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */
    $qGirviOtherInfoUpdate = "UPDATE ml_loan SET
		ml_comm='$loanOtherInfo'
                WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn,$qGirviOtherInfoUpdate)) {
        die('Error: ' . mysqli_error($conn));
    }
    header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId"); //change in header @AUTHOR: SANDY28NOV13
}
?>
