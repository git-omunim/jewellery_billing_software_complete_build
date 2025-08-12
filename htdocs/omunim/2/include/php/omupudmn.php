<?php

/*
 * **************************************************************************************
 * @tutorial: Update main Udhaar Money
 * **************************************************************************************
 *
 * Created on 25 Jul, 2012 2:01:56 AM
 *
 * @FileName: omupudmn.php
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
//Start Staff Access API @Author:PRIYA22JUL13
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @Author:PRIYA22JUL13

require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

$ownerId = $_SESSION['sessionOwnerId'];
$udhaarId = $_POST['udhaarId'];
$udhaarUpdtAmt = $_POST['updatedAmt'];
$custId = $_POST['custId'];
$firmId = $_POST['firmId'];
$udhaarJrnlId = $_POST['udhaarJrnlId']; //$udhaarJrnlId Added @Author:PRIYA18AUG13
$todayDate = date("d M Y");

if ($udhaarId == '') {
    $udhaarId = $_GET['udhaarId'];
    $udhaarUpdtAmt = $_GET['updatedAmt'];
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
    $udhaarJrnlId = $_GET['udhaarJrnlId']; //$udhaarJrnlId Added @Author:PRIYA18AUG13
}
if ($udhaarId == '' || $udhaarId == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {

    $qSelUdhaar = "SELECT udhaar_amt,udhaar_history FROM udhaar where udhaar_own_id='$ownerId' and udhaar_id='$udhaarId'";
    $resUdhaar = mysqli_query($conn,$qSelUdhaar);
    $rowUdhaar = mysqli_fetch_array($resUdhaar, MYSQLI_ASSOC);

    $udhaarPrevAmt = $rowUdhaar['udhaar_amt'];
    $udhaarHistory = $rowUdhaar['udhaar_history'];

    $udhaarHistory = $udhaarHistory . "<font color='blue'>Updated $udhaarPrevAmt with $udhaarUpdtAmt on $todayDate.</font><br/>";

    $udhaarHistory = stripslashes($udhaarHistory);
    $udhaarUpdtAmt = stripslashes($udhaarUpdtAmt);

    $udhaarHistory = mysqli_real_escape_string($conn,$udhaarHistory);
    $udhaarUpdtAmt = mysqli_real_escape_string($conn,$udhaarUpdtAmt);

    $query = "UPDATE udhaar SET udhaar_amt='$udhaarUpdtAmt',udhaar_history='$udhaarHistory'
          WHERE udhaar_own_id = '$ownerId' and udhaar_id = '$udhaarId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ******************************************************************************************* */
    /*                       START CODE To Add Journal Entry For Updated Udhaar Amount @AUTHOR:PRIYA18AUG13                            */
    /*     * ******************************************************************************************* */
    $jrnlTTDr = $udhaarUpdtAmt;
    $jrnlTTCr = $udhaarUpdtAmt;
    $jrnlOwnId = $ownerId;
    $jrnlId = $udhaarJrnlId;

    $apiType = 'updateTotalCRDR';
    include 'ommpjrnl.php';

    $jrtrOwnId = $ownerId;
    $jrtrJrnlId = $udhaarJrnlId;
    $jrtrDrAmt = $udhaarUpdtAmt;
    $jrtrCrAmt = $udhaarUpdtAmt;

    $apiType = 'updateCRDR';
    include 'ommpjrtr.php';
    /*     * ******************************************************************************************* */
    /*                       END CODE To Add Journal Entry For Updated Udhaar Amount @AUTHOR:PRIYA18AUG13                            */
    /*     * ******************************************************************************************* */
    header("Location: " . $documentRoot . "/include/php/omuudetl.php?custId=" . $custId . "&firmId=" . $firmId . "&divMainMiddlePanel=Updated");
}
?>