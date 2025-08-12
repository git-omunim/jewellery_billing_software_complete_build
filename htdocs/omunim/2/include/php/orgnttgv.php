<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: orgnttgv.php
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

//$startDate = strtotime($girviDOR);
$totalGirviPrincipal = 0;
$getYear = $dateYYYY;
$getMonth = $dateMMM;
$getDay = $dateDD;

$mainGetYear = $getYear;
$todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
$todayDateNum = strtotime($todayDate);

if ($getYear != '' && $getMonth != '') {

    $todayMM = date(n, strtotime($getDay . $getMonth . ' ' . $getYear));
    $todayMonth = $getMonth;
    $todayYear = $getYear;
} else {

    $todayMM = date(n);
    $todayMonth = date(M);
    $todayYear = date(Y);
}

$finYear = $todayYear;

//if ($todayMM <= 3) {
//    $finYear = $todayYear + 1;
//} else {
//    $finYear = $todayYear;
//}

if ($finYear > date(Y) && date(M) <= 3 && $mainGetYear == '') {
    $finYear = $finYear - 1;
}

if ($finYear != 0) {
    $startDate = $getDay . ' ' . $todayMonth . ' ' . $finYear;
}
$startDate = strtotime($startDate);
//echo  $startDate . '   '; exit();
if ($selFirmId == 'undefined') {
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($selFirmId != NULL) {
    $strFrmId = $selFirmId;
} else {
    //Get Public Firms
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    $resPubFirmCount = mysqli_query($conn, $qSelPubFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }
}
//if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
//Get Total Principal Amount from Girvi Table
$qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id IN ($strFrmId)";
$qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
$row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

$openingTotalGirviPrincipal = $row['total_prin'];
//echo '<br/>Total:' . $openingTotalGirviPrincipal;
$openingTotalNoOfGirvi = $row['no_of_girvi'];

// Start Code to Get Total Principal Amount from Additional Pricipal Table
$qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOB,'%d %b %Y'))<$startDate and girv_prin_firm_id IN ($strFrmId)";
$qResult = mysqli_query($conn, $qSelect);
$row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
$totalOpenAddGirviPrin = $row['total_prin'];
$openingTotalGirviPrincipal += $totalOpenAddGirviPrin;
//echo '<br/>Total Add Prin:' . $totalOpenAddGirviPrin;
// End Code to Get Total Principal Amount from Additional Pricipal Table

$qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate 
                    and girv_upd_sts IN ('Released','Auctioned') and girv_firm_id IN ($strFrmId)"; //Auctioned status added @Author:PRIYA10APR15
$qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
$row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

$openingReleasedGirviPrincipal = $row['total_prin'];
//echo '<br/>Total Rel Girvi:' . $openingReleasedGirviPrincipal;
$openingReleasedNoOfGirvi = $row['no_of_girvi'];

// Start Code to Get Total Released Principal Amount from Additional Pricipal Table
$qSelect = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                    girv_prin_upd_sts!='Deleted' and girv_prin_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and 
                        girv_prin_upd_sts IN ('FReleased','Released')"; //FRel Status added @Author:PRIYA05MAR14
$qResult = mysqli_query($conn, $qSelect);
$row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
$totalOpenAddGirviPrinRel = $row['total_prin_paid_amt'];
$openingReleasedGirviPrincipal += $totalOpenAddGirviPrinRel;
//echo '<br/>Total Rel Prin:' . $totalOpenAddGirviPrinRel;
// End Code to Get Total Released Principal Amount from Additional Pricipal Table
// 
// Start Code To Get Total Released Principal Amount from Money Deposit Table
$qSelect = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate";
$qResult = mysqli_query($conn, $qSelect);
$row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

$totalOpenDepPrincMoneyGirvi = $row['deposit_prn_amt'];
//echo '<br/>deposit_prn_amt:' . $row['deposit_prn_amt'];
$openingReleasedGirviPrincipal += $totalOpenDepPrincMoneyGirvi;
//echo '<br/>Total Dep:' . $totalOpenDepPrincMoneyGirvi;
// End Code To Get Total Released Principal Amount from Money Deposit Table

$openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal;
$openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;

echo formatInIndianStyle($openingGirviPrincipal);

/* * ************Start code to comment pass code @Author:PRIYA05MAR14********************* */
//} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
//
//    if ($startDate > $todayDateNum) {
//        $openingGirviPrincipal = 0;
//    }
//
//    //Get Total Principal Amount from Girvi Table
//    if ($selFirmId == '' || $selFirmId == NULL) {
//        $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
//                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate";
//    } else {
//        $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
//                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id='$selFirmId'";
//    }
//    $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//    $openingTotalGirviPrincipal = $row['total_prin']; //echo '<br/>Total Girvi:' . $openingTotalGirviPrincipal;
//    $openingTotalNoOfGirvi = $row['no_of_girvi'];
//    //echo '$openingTotalNoOfGirvi:' . $openingTotalNoOfGirvi;
//    //
//            //
//            // Start Code to Get Total Principal Amount from Additional Pricipal Table
//    if ($selFirmId == '' || $selFirmId == NULL) {
//        $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
//                girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOB,'%d %b %Y'))<$startDate";
//    } else {
//        $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
//                girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOB,'%d %b %Y'))<$startDate and girv_prin_firm_id='$selFirmId'";
//    }
//    $qResult = mysqli_query($conn,$qSelect);
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//    $totalOpenAddGirviPrin = $row['total_prin'];
//
//    $openingTotalGirviPrincipal += $totalOpenAddGirviPrin; //echo '<br/>Total Add Prin:' . $totalOpenAddGirviPrin;
//    // End Code to Get Total Principal Amount from Additional Pricipal Table
//
//    if ($selFirmId == '' || $selFirmId == NULL) {
//        $qSelect = "SELECT SUM(girv_paid_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
//                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released')";
//    } else {
//        $qSelect = "SELECT SUM(girv_paid_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
//                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released') and girv_firm_id='$selFirmId'";
//    }
//    $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//    $openingReleasedGirviPrincipal = $row['total_prin']; //echo '<br/>Total Rel Girvi:' . $openingReleasedGirviPrincipal;
//    $openingReleasedNoOfGirvi = $row['no_of_girvi'];
//
//    // Start Code to Get Total Released Principal Amount from Additional Pricipal Table
//    if ($selFirmId == '' || $selFirmId == NULL) {
//        $qSelect = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
//                    girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and 
//                        girv_prin_upd_sts IN ('Released')";
//    } else {
//        $qSelect = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
//                    girv_prin_upd_sts!='Deleted' and girv_prin_firm_id='$selFirmId' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and 
//                        girv_prin_upd_sts IN ('Released')";
//    }
//    $qResult = mysqli_query($conn,$qSelect);
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//    $totalOpenAddGirviPrinRel = $row['total_prin_paid_amt'];
//
//    $openingReleasedGirviPrincipal += $totalOpenAddGirviPrinRel; //echo '<br/>Total Rel Prin:' . $totalOpenAddGirviPrinRel;
//    // End Code to Get Total Released Principal Amount from Additional Pricipal Table
//    // 
//    // Start Code To Get Total Released Principal Amount from Money Deposit Table
//    if ($selFirmId == '' || $selFirmId == NULL) {
//        $qSelect = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
//                girv_mondep_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate";
//    } else {
//        $qSelect = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
//                girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id='$selFirmId' and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate";
//    }
//    $qResult = mysqli_query($conn,$qSelect);
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//    $totalOpenDepPrincMoneyGirvi = $row['deposit_prn_amt'];
//
//    $openingReleasedGirviPrincipal += $totalOpenDepPrincMoneyGirvi; //echo '<br/>Total Dep:' . $totalOpenDepPrincMoneyGirvi; 
//    // End Code To Get Total Released Principal Amount from Money Deposit Table
//
//    $openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal;
//    $openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;
//
//    echo formatInIndianStyle($openingGirviPrincipal);
//}
/* * ************End code to comment pass code @Author:PRIYA05MAR14********************* */
?>