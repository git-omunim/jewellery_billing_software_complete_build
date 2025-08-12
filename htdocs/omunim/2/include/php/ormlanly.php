<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: ormlanly.php
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

//for money lender analysis report
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

//change in file @AUTHOR: SANDY30DEC13
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
?>
<?php

$startDate = strtotime($girviDOR);
/* * ********Start code to add code @Author:PRIYA05MAR15********************* */
if ($selFirmId != NULL) {
    $strFrmId = $selFirmId;
} else {
    //Get Public Firms
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }
}
////////////////////////////Opening balance/////////////////////////////////
$totRel = 0;
$qSelectTotal = "SELECT SUM(ml_prin_amt) as total FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and "
        . "UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<'$startDate'";
$qResultTotal = mysqli_query($conn,$qSelectTotal);
$rowTotal = mysqli_fetch_array($qResultTotal, MYSQLI_ASSOC);
$totalMlLoans = $rowTotal['total'];

//total released till today
$qSelectTotRel = "SELECT SUM(ml_total_amt) as tot_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released')"
        . " and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<'$startDate'";
$qResultTotRel = mysqli_query($conn,$qSelectTotRel);
$rowTotRel = mysqli_fetch_array($qResultTotRel, MYSQLI_ASSOC);
$totRel = $rowTotRel ['tot_rel'];

//total deposit till today
$qSelectTotDep = "SELECT SUM(ml_trans_mondep_amt) as tot_dep FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_mondep_firm_id IN ($strFrmId)"
        . "and ml_trans_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))<'$startDate'";
$qResultTotDep = mysqli_query($conn,$qSelectTotDep);
$rowTotDep = mysqli_fetch_array($qResultTotDep, MYSQLI_ASSOC);
$totRel += $rowTotDep ['tot_dep'];
$totalLoanTillDate = $totalMlLoans - $totRel;

////////////////////////////New Loans/////////////////////////////////
$qSelect = "SELECT SUM(ml_prin_amt) as total_prin FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))='$startDate'";
$qResult = mysqli_query($conn,$qSelect);
$row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
$todaysMlLoans = $row['total_prin'];

////////////////////////////Loan Rel/////////////////////////////////
//for todays Deposit 
$qSelect = "SELECT SUM(ml_trans_mondep_amt) as money_dep FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_mondep_firm_id IN ($strFrmId)"
        . "and ml_trans_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))='$startDate'";
$qResultDep = mysqli_query($conn,$qSelect);
$rowTrDep = mysqli_fetch_array($qResultDep, MYSQLI_ASSOC);
$todaysMlLoanReleased = $rowTrDep['money_dep'];


//for todays released 
$qSelect = "SELECT SUM(ml_total_amt) as today_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') and"
        . " UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))='$startDate'";//total amount changed ml_total_amt
$qResultRel = mysqli_query($conn,$qSelect);
$rowTrRel = mysqli_fetch_array($qResultRel, MYSQLI_ASSOC);
$todaysMlLoanReleased += $rowTrRel['today_rel'];

/* * ********End code to add code @Author:PRIYA05MAR15********************* */
/* * ********Start code to comment @Author:PRIYA05MAR15********************* */
//if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
//    if ($selFirmId != NULL) {
//        $strFrmId = $selFirmId;
//    } else {
//        $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
//        $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
//        $strFrmId = '0';
//
//        while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
//            $strFrmId = $strFrmId . ",";
//            $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
//        }
//    }
//
//    $qSelect = "SELECT SUM(ml_prin_amt) as total_prin FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))='$startDate'";
//    $qSelectTotal = "SELECT SUM(ml_prin_amt) as total FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<'$startDate'";
//
//    $qResult = mysqli_query($conn,$qSelect);
//    $qResultTotal = mysqli_query($conn,$qSelectTotal);
//
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//    $rowTotal = mysqli_fetch_array($qResultTotal, MYSQLI_ASSOC);
//
//    $todaysMlLoans = $row['total_prin'];
//    $totalMlLoans = $rowTotal['total'];
//
//
//    //total released till today
//    $qSelectTotRel = "SELECT SUM(ml_prin_amt) as tot_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<'$startDate'";
//    $qResultTotRel = mysqli_query($conn,$qSelectTotRel);
//    $rowTotRel = mysqli_fetch_array($qResultTotRel, MYSQLI_ASSOC);
//    $totRel = $rowTotRel ['tot_rel'];
//
//    //for todays released 
//    $qSelect = "SELECT SUM(ml_prin_amt) as today_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))='$startDate'";
//    $qResultRel = mysqli_query($conn,$qSelect);
//    $rowTrRel = mysqli_fetch_array($qResultRel, MYSQLI_ASSOC);
//    $todaysMlLoanReleased = $rowTrRel['today_rel'];
//
//    $totalLoanTillDate = $totalMlLoans - $totRel;
//} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
//    if ($selFirmId != NULL) {
//        $qSelect = "SELECT SUM(ml_prin_amt) as total_prin FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($selFirmId) and ml_upd_sts IN ('New') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))='$startDate'";
//        $qSelectTotal = "SELECT SUM(ml_prin_amt) as total FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($selFirmId) and ml_upd_sts IN ('New') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<'$startDate'";
//        $qSelectTotRel = "SELECT SUM(ml_prin_amt) as tot_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($selFirmId) and ml_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<'$startDate'";
//        $qSelectTrRel = "SELECT SUM(ml_prin_amt) as today_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id IN ($selFirmId) and ml_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))='$startDate'";
//    } else {
//        $qSelect = "SELECT SUM(ml_prin_amt) as total_prin FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'  and ml_upd_sts IN ('New') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))='$startDate'";
//        $qSelectTotal = "SELECT SUM(ml_prin_amt) as total FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts IN ('New') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<'$startDate'";
//        $qSelectTotRel = "SELECT SUM(ml_prin_amt) as tot_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<'$startDate'";
//        $qSelectTrRel = "SELECT SUM(ml_prin_amt) as today_rel FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'  and ml_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))='$startDate'";
//    }
//
//    $qResult = mysqli_query($conn,$qSelect);
//    $qResultTotal = mysqli_query($conn,$qSelectTotal);
//
//    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//    $rowTotal = mysqli_fetch_array($qResultTotal, MYSQLI_ASSOC);
//
//    $todaysMlLoans = $row['total_prin'];
//    $totalMlLoans = $rowTotal['total'];
//
//
//    //total released till today
//
//    $qResultTotRel = mysqli_query($conn,$qSelectTotRel);
//    $rowTotRel = mysqli_fetch_array($qResultTotRel, MYSQLI_ASSOC);
//    $totRel = $rowTotRel ['tot_rel'];
//
//    //for todays released 
//
//    $qResultRel = mysqli_query($conn,$qSelectTrRel);
//    $rowTrRel = mysqli_fetch_array($qResultRel, MYSQLI_ASSOC);
//    $todaysMlLoanReleased = $rowTrRel['today_rel'];
//
//    $totalLoanTillDate = $totalMlLoans - $totRel;
//}
/* * ********End code to comment @Author:PRIYA05MAR15********************* */
?>


