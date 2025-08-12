<?php

/*
 * **************************************************************************************
 * @Description: Linked loan No @AUTHOR: SANDY13JAN14
 * **************************************************************************************
 *
 * Created on 29 Dec, 2012 11:41:07 AM
 *
 * @FileName: ormllkln.php
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php

$mlId = $_GET['mlId'];
$sessionOwnerId = $_SESSION[sessionOwnerId];
//query to get serial number
$qSelLoanPreSerialNo = "SELECT ml_pre_serial_num FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_lender_id='$mlId' order by UNIX_TIMESTAMP(ml_ent_dat) desc LIMIT 0,1";
$resLoanPreSerialNo = mysqli_query($conn,$qSelLoanPreSerialNo) or die(mysqli_error($conn));
$rowLoanPreSerialNo = mysqli_fetch_array($resLoanPreSerialNo);

$newLoanPreSerialNo = $rowLoanPreSerialNo['ml_pre_serial_num'];

if ($newLoanPreSerialNo == NULL || $newLoanPreSerialNo == '') {
    $newLoanPreSerialNo = NULL;
    $qSelLoanSerialNo = "SELECT max(ml_serial_num) as mliSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_pre_serial_num IS NULL and  ml_lender_id='$mlId'";
    $resLoanSerialNo = mysqli_query($conn,$qSelLoanSerialNo);
    $rowLoanSerialNo = mysqli_fetch_array($resLoanSerialNo, MYSQLI_ASSOC);
} else {
    $qSelLoanSerialNo = "SELECT max(ml_serial_num) as mliSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_pre_serial_num='$newLoanPreSerialNo' and  ml_lender_id='$mlId' ";
    $resLoanSerialNo = mysqli_query($conn,$qSelLoanSerialNo);
    $rowLoanSerialNo = mysqli_fetch_array($resLoanSerialNo, MYSQLI_ASSOC);
}
$newLoanSerialNo = $rowLoanSerialNo['mliSerialNo']+1;


//Start Code to Check Serial Number
$qSelSerialNo = "SELECT ml_serial_num FROM ml_loan where ml_serial_num='$newLoanSerialNo' and ml_pre_serial_num='$newLoanPreSerialNo' and ml_own_id='$sessionOwnerId'";
$resSerialNo = mysqli_query($conn,$qSelSerialNo);
$rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);

$lSerialNo = $rowSerialNo['ml_serial_num'];

if ($lSerialNo != '' || $lSerialNo != NULL) {
    $qSelLoanSerialNo = "SELECT max(ml_serial_num) as loanSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_pre_serial_num='$newLoanPreSerialNo'";
    $resLoanSerialNo = mysqli_query($conn,$qSelLoanSerialNo);
    $rowLoanSerialNo = mysqli_fetch_array($resLoanSerialNo, MYSQLI_ASSOC);

    $newLoanSerialNo = $rowLoanSerialNo['loanSerialNo']+1;
}
echo $newLoanPreSerialNo . ' - ' .$newLoanSerialNo;
?>
