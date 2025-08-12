<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: omunttud.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
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
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';
require_once 'ommpincr.php';
?>
<?php
$girviDORStrToTime = strtotime($girviDOR);
$totalUdhaar = 0;
/*************Start Code To Add Udhaar Total Balance @Author:PRIYA30AUG13******************/
/*if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    if ($selFirmId != NULL) {
        $strFrmId = $selFirmId;
    } else {
        //Get Public Firms
        $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
        $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

        $strFrmId = '0';

        //Set String for Public Firms
        while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
        }
    }
    //Get Total Udhaar Amount from Udhaar Table
    $qSelect = "SELECT SUM(udhaar_amt) as total_udhaar FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_DOB='" . date('d M Y', $girviDORStrToTime) . "' and udhaar_firm_id IN ($strFrmId) and udhaar_upd_sts IN ('New','Updated')";
    $qResult = mysqli_query($conn,$qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $todaysUdhaar = $row['total_udhaar'];

    $qSelUdhaarDetails = "SELECT SUM(udhaar_amt) as total_udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(udhaar_DOB,'%d %b %Y'))<$girviDORStrToTime ";
    $resUdhaarDetails = mysqli_query($conn,$qSelUdhaarDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDetails);
    $rowUdhaarDetails = mysqli_fetch_array($resUdhaarDetails);
    $previousAmount = $rowUdhaarDetails['total_udhaar_amt'];

    //$totalUdhaar = $todaysUdhaar + $previousAmount;
    $qSelectdep = "SELECT SUM(udhadepo_amt) as total_udhadepo FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(udhadepo_DOB,'%d %b %Y'))<=$girviDORStrToTime and udhadepo_upd_sts IN ('New','Updated') and udhadepo_firm_id IN ($strFrmId)";
    $qResultdep = mysqli_query($conn,$qSelectdep);
    $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
    $todaysDeposit = $rowdep['total_udhadepo'];
    //$totaludhaaramount = $previousAmount - $todaysDeposit;
    $totalUdhaar = $todaysUdhaar + $previousAmount - $todaysDeposit;

    echo formatInIndianStyle($totalUdhaar);
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

    //Get Total Principal Amount from Udhaar Table
    if ($selFirmId == '' || $selFirmId == NULL) {
        $qSelectdep = "SELECT SUM(udhadepo_amt) as total_udhadepo FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE( udhadepo_DOB,'%d %b %Y'))<=$girviDORStrToTime and udhadepo_upd_sts IN ('New','Updated')";
        $qSelect = "SELECT SUM(udhaar_amt) as total_udhaar FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_DOB='" . date('d M Y', $girviDORStrToTime) . "' and udhaar_upd_sts IN ('New','Updated')";
    } else {
        $qSelect = "SELECT SUM(udhaar_amt) as total_udhaar FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_DOB='" . date('d M Y', $girviDORStrToTime) . "' and udhaar_upd_sts IN ('New','Updated') and udhaar_firm_id IN ($selFirmId)";
        $qSelectdep = "SELECT SUM(udhadepo_amt) as total_udhadepo FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE( udhadepo_DOB,'%d %b %Y'))<=$girviDORStrToTime and udhadepo_upd_sts IN ('New','Updated') and udhadepo_firm_id='$selFirmId'";
    }
    $qResult = mysqli_query($conn,$qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $todaysUdhaar = $row['total_udhaar'];
    $qResultdep = mysqli_query($conn,$qSelectdep);
    $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);


    $todaysDeposit = $rowdep['total_udhadepo'];


    if ($selFirmId == '' || $selFirmId == NULL) {

        $qSelUdhaarDetails = "SELECT SUM(udhaar_amt) as total_udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(udhaar_DOB,'%d %b %Y'))<$girviDORStrToTime";
    } else {
        $qSelUdhaarDetails = "SELECT SUM(udhaar_amt) as total_udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(udhaar_DOB,'%d %b %Y'))<$girviDORStrToTime and udhaar_firm_id IN ($selFirmId)";
    }
    $resUdhaarDetails = mysqli_query($conn,$qSelUdhaarDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDetails);
    $rowUdhaarDetails = mysqli_fetch_array($resUdhaarDetails);
    $previousAmount = $rowUdhaarDetails['total_udhaar_amt'];
    $totaludhaaramount = $previousAmount - $todaysDeposit;

    $totalUdhaar = $todaysUdhaar + $previousAmount - $todaysDeposit;
    echo formatInIndianStyle($totalUdhaar);
}*/
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId != NULL) {
    $strFrmId = $selFirmId;
} else {
    $resFirmCount = mysqli_query($conn,$qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
}

//Get Total Udhaar Amount from Udhaar Table
$qSelUdhaarDetails = "SELECT SUM(udhaar_amt) as total_udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(udhaar_DOB,'%d %b %Y'))<=$girviDORStrToTime and udhaar_upd_sts IN ('New','Updated')";
$resUdhaarDetails = mysqli_query($conn,$qSelUdhaarDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDetails);
$rowUdhaarDetails = mysqli_fetch_array($resUdhaarDetails);
$previousAmount = $rowUdhaarDetails['total_udhaar_amt'];

//Get Total Udhaar Dep Amount from Udhaar Dep Table
$qSelectdep = "SELECT SUM(udhadepo_amt) as total_udhadepo FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(udhadepo_DOB,'%d %b %Y'))<=$girviDORStrToTime and udhadepo_upd_sts IN ('New','Updated') and udhadepo_firm_id IN ($strFrmId) and (udhadepo_EMI_status  IN ('Paid') or udhadepo_EMI_status IS NULL)";//EMI status condition added @Author:SHRI29MAY15
$qResultdep = mysqli_query($conn,$qSelectdep);
$rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
$todaysDeposit = $rowdep['total_udhadepo'];

$totalUdhaar = $previousAmount - $todaysDeposit;
if ($totalUdhaar < 0) {
    $totalUdhaar = 0;
}
echo formatInIndianStyle($totalUdhaar);
/*************End Code To Add Udhaar Total Balance @Author:PRIYA30AUG13******************/
?>