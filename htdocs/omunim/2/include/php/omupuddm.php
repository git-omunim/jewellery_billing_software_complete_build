<?php

/*
 * **************************************************************************************
 * @tutorial:Update Udhaar Deposit Money
 * **************************************************************************************
 *
 * Created on 25 Jul, 2012 3:13:49 AM
 *
 * @FileName: omupuddm.php
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

$ownerId = $_SESSION['sessionOwnerId'];
$udhaarDepId = $_POST['udhaarDepId'];
$udhaarUpdtAmt = $_POST['updatedAmt'];
$custId = $_POST['custId'];
$firmId = $_POST['firmId'];
$udhaarDepJrnlId = $_POST['udhaarDepJrnlId'];//$udhaarDepJrnlId Added @Author:PRIYA18AUG13
$todayDate = date("d M Y");

if ($udhaarDepId == '') {
    $udhaarDepId = $_GET['udhaarDepId'];
    $udhaarUpdtAmt = $_GET['updatedAmt'];
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
    $udhaarDepJrnlId = $_GET['udhaarDepJrnlId'];//$udhaarDepJrnlId Added @Author:PRIYA18AUG13
}

if ($udhaarDepId == '' || $udhaarDepId == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {

    $qSelUdhaarDep = "SELECT udhadepo_amt,udhadepo_history FROM udhaar_deposit where udhadepo_own_id='$ownerId' and udhadepo_id='$udhaarDepId' and (udhadepo_EMI_status  IN ('Paid') or udhadepo_EMI_status IS NULL)"; //EMI Status condition added @Author:SHRI29MAY15
    $resUdhaarDep = mysqli_query($conn,$qSelUdhaarDep);
    $rowUdhaarDep = mysqli_fetch_array($resUdhaarDep, MYSQLI_ASSOC);

    $udhaarDepPrevAmt = $rowUdhaarDep['udhadepo_amt'];
    $udhaarDepHistory = $rowUdhaarDep['udhadepo_history'];

    $udhaarDepHistory = $udhaarDepHistory . "<font color='blue'>Updated $udhaarDepPrevAmt with $udhaarUpdtAmt on $todayDate.</font><br/>";

    $udhaarDepHistory = stripslashes($udhaarDepHistory);
    $udhaarUpdtAmt = stripslashes($udhaarUpdtAmt);

    $udhaarDepHistory = mysqli_real_escape_string($conn,$udhaarDepHistory);
    $udhaarUpdtAmt = mysqli_real_escape_string($conn,$udhaarUpdtAmt);

    $query = "UPDATE udhaar_deposit SET udhadepo_amt='$udhaarUpdtAmt',udhadepo_history='$udhaarDepHistory'
          WHERE udhadepo_own_id = '$ownerId' and udhadepo_id = '$udhaarDepId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry For Updated Udhaar Dep Amount @AUTHOR:PRIYA18AUG13                            */
    /*     * ******************************************************************************************* */
    $jrnlTTDr = $udhaarUpdtAmt;
    $jrnlTTCr = $udhaarUpdtAmt;
    $jrnlOwnId = $ownerId;
    $jrnlId = $udhaarDepJrnlId;

    $apiType = 'updateTotalCRDR';
    include 'ommpjrnl.php';

    $jrtrOwnId = $ownerId;
    $jrtrJrnlId = $udhaarDepJrnlId;
    $jrtrDrAmt = $udhaarUpdtAmt;
    $jrtrCrAmt = $udhaarUpdtAmt;
      
    $apiType = 'updateCRDR';
    include 'ommpjrtr.php';
    /*     * ******************************************************************************************* */
    /*                       END CODE To Add Journal Entry For Updated Udhaar Dep Amount @AUTHOR:PRIYA18AUG13                            */
    /*     * ******************************************************************************************* */
    
    header("Location: " . $documentRoot . "/include/php/omuudetl.php?custId=" . $custId . "&firmId=" . $firmId . "&divMainMiddlePanel=Updated");
}
?>