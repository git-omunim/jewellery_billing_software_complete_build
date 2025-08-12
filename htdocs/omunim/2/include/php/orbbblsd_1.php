<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orbbblsd_1.php
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
<div id="balanceSheetPrintDiv" class="balanceSheetPrintDiv">
    <table border="1" cellspacing="0" cellpadding="1" width="100%" class="border-color-grey balanceSheetPrintDiv">
        <tr id="headerTableNext">
            <td colspan="12">
                <table border="1" cellspacing="0" cellpadding="1" width="100%" >
            <td align="center" width="96px" valign="top" class="border-color-grey">
                <div class="main_link_brown">Date</div>
            </td>
            <td align="center" width="155px" colspan="2" class="border-color-grey">
                <div class="main_link_brown">Opening Balance</div>
            </td>
            <td align="center" colspan="2" width="172px"class="border-color-grey">
                <div class="main_link_brown">Received Girvi</div>
            </td>
            <td align="center" colspan="2" width="155px" class="border-color-grey">
                <div class="main_link_brown">Total</div>
            </td>
            <td align="center" colspan="2" width="130px"class="border-color-grey">
                <div class="main_link_brown">Release Girvi</div>
            </td>
            <td align="center" colspan="2" width="172px"class="border-color-grey">
                <div class="main_link_brown">Final Total</div>
            </td>
            <td align="center" rowspan="2" width="62px" class="border-color-grey">
                <div class="main_link_brown" >Interest</div>
            </td>
        </tr>
        <tr>
            <td align="center" class="border-color-grey" >
                <div class="main_link_brown"></div>
            </td>
            <td align="center" class="border-color-grey" width="100px">
                <div class="main_link_brown">Amount</div>
            </td>
            <td align="center" class="border-color-grey" width="32px" >
                <div class="main_link_brown">Girvi</div>
            </td>
            <td align="center" class="border-color-grey"width="100px">
                <div class="main_link_brown">Amount</div>
            </td>
            <td align="center" class="border-color-grey"width="31px">
                <div class="main_link_brown">Girvi</div>
            </td>
            <td align="center" class="border-color-grey"width="100px">
                <div class="main_link_brown">Amount</div>
            </td>
            <td align="center"  class="border-color-grey"width="25px">
                <div class="main_link_brown">Girvi</div>
            </td>
            <td align="center"  class="border-color-grey" width="90px">
                <div class="main_link_brown">Amount</div>
            </td>
            <td align="center"  class="border-color-grey" width="26px">
                <div class="main_link_brown">Girvi</div>
            </td>
            <td align="center" class="border-color-grey"width="123px">
                <div class="main_link_brown" >Amount</div>
            </td>
            <td align="center" class="border-color-grey"width="">
                <div class="main_link_brown">Girvi</div>
            </td>
        </tr>
    </table></td></tr>

        <?php
        /*         * *******Start Code To Hide Year & Month & Firm coz selected in prev file @Author:PRIYA24JUL13********** */
        /* $getYear = $_GET['balanceSheetYear'];
          $getMonth = $_GET['balanceSheetMonth'];

          if ($getYear == '' && $getMonth == '') {
          $getYear = $_POST['balanceSheetYear'];
          $getMonth = $_POST['balanceSheetMonth'];
          }
          if ($selFirmId == '' || $selFirmId == NULL) {
          $selFirmId = $_GET['firmId'];
          } */
        /*         * *******End Code To Hide Year & Month coz selected in prev file @Author:PRIYA24JUL13********** */
        $mainGetYear = $getYear;

        $totalFinalIntPaid = 0;
        //echo  "Today date:  " . date("l dS \of F Y h:i:s A") . "  ";
        $todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
        $todayDateNum = strtotime($todayDate);

        if ($getYear != '' && $getMonth != '') {

            $todayMM = date(n, strtotime('01 ' . $getMonth . ' ' . $getYear));
            $todayMonth = $getMonth;
            $todayYear = $getYear;
        } else {

            $todayMM = date(n);
            $todayMonth = date(M);
            $todayYear = date(Y);
        }

        $finYear = 0;

        if ($todayMM <= 3) {
            $finYear = $todayYear + 1;
        } else {
            $finYear = $todayYear;
        }

        if ($finYear > date(Y) && date(M) <= 3 && $mainGetYear == '') {
            $finYear = $finYear - 1;
        }

        if ($finYear != 0) {
            $startDate = '01 ' . $todayMonth . ' ' . $finYear;
        }
        $startDate = strtotime($startDate);
        $monthCounter = 1;
        $monthCounterLimit = 0;

        //START Code to fix counter for Month
        $arrLeapYear = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $arrYear = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        if (($finYear % 4) == 0) {
            $monthCounterLimit = $arrLeapYear[$todayMM - 1];
        } else {
            $monthCounterLimit = $arrYear[$todayMM - 1];
        }

        //END code to fix Month Counter

        $initialOpeningGirviPrincipal = 0;
        $initialOpeningNoOfGirvi = 0;

        $totalReceivedGirviPrincipal = 0;
        $totalReceivedNoOfGirvi = 0;

        $totalReleasedGirviPrincipal = 0;
        $totalReleasedNoOfGirvi = 0;

        $finalClosingGirviPrincipal = 0;
        $finalClosingNoOfGirvi = 0;



        $openingGirviPrincipal = 0;
        $openingNoOfGirvi = 0;

        $openingTotalGirviPrincipal = 0;
        $openingTotalNoOfGirvi = 0;
        $totalAdditionalGirviPrincipal = 0;

        $openingReleasedGirviPrincipal = 0;
        $openingReleasedNoOfGirvi = 0;

        $receivedGirviPrincipal = 0;
        $receivedNoOfGirvi = 0;
        $totalAddGirviPrinRel = 0;

        $totalAmtTillReceivedGirvi = 0;
        $totalNoOfGirviTillReceivedGirvi = 0;
        $totalDepositPrincMoneyGirvi = 0;

        $releasedGirviPrincipal = 0;
        $releasedNoOfGirvi = 0;

        $totalAmtTillReleasedGirvi = 0;
        $totalNoOfGirviTillReleasedGirvi = 0;
        //Start Code To Add Frim Id @AUTHOR:PRIYA13MAR13
        //End Code To Add Frim Id @AUTHOR:PRIYA13MAR1
        if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
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

            //Get Total Principal Amount from Girvi Table
            $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id IN ($strFrmId)";
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingTotalGirviPrincipal = $row['total_prin'];
            $openingTotalNoOfGirvi = $row['no_of_girvi'];

            $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released') and girv_firm_id IN ($strFrmId)";
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingReleasedGirviPrincipal = $row['total_prin'];
            $openingReleasedNoOfGirvi = $row['no_of_girvi'];
            //echo '$openingReleasedGirviPrincipal:' . $openingReleasedGirviPrincipal;

            $openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal;
            $openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;

            if ($monthCounter == 1) {
                $initialOpeningGirviPrincipal = $openingGirviPrincipal;
                $initialOpeningNoOfGirvi = $openingNoOfGirvi;
            }
        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

            //Get Total Principal Amount from Girvi Table
            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate";
            } else {
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id='$selFirmId'";
            }
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingTotalGirviPrincipal = $row['total_prin'];
            $openingTotalNoOfGirvi = $row['no_of_girvi'];
            //echo '$openingTotalNoOfGirvi:' . $openingTotalNoOfGirvi;

            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released')";
            } else {
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released') and girv_firm_id='$selFirmId'";
            }
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingReleasedGirviPrincipal = $row['total_prin'];
            $openingReleasedNoOfGirvi = $row['no_of_girvi'];
            //echo '   $openingReleasedNoOfGirvi:' . $openingReleasedNoOfGirvi;
            $openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal;
            $openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;

            if ($monthCounter == 1) {
                $initialOpeningGirviPrincipal = $openingGirviPrincipal;
                $initialOpeningNoOfGirvi = $openingNoOfGirvi;
            }
        }
        while ($monthCounter <= $monthCounterLimit) {
            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {

                if ($monthCounter == 1) {
                    $openingGirviPrincipal = $openingGirviPrincipal;
                    $openingNoOfGirvi = $openingNoOfGirvi;
                } else {

                    $openingGirviPrincipal = $totalAmtTillReleasedGirvi;
                    $openingNoOfGirvi = $totalNoOfGirviTillReleasedGirvi;
                }

                if ($openingNoOfGirvi == 0) {
                    $openingNoOfGirvi = '-';
                }
                if ($startDate > $todayDateNum) {
                    $openingGirviPrincipal = 0;
                    $openingNoOfGirvi = '-';
                }
                //Recieved Girvi On Given Date
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOB='" . date('d M Y', $startDate) . "' and girv_firm_id IN ($strFrmId)";
                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $receivedGirviPrincipal = $row['total_prin'];
                $receivedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Principal Amount from Additional Pricipal Table
                $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "' and girv_prin_firm_id IN ($strFrmId)";
                $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalAdditionalGirviPrincipal = $rowTotalNewPrinGirvi['total_prin'];

                $receivedGirviPrincipal += $totalAdditionalGirviPrincipal;

                //
                $totalReceivedGirviPrincipal += $receivedGirviPrincipal;
                $totalReceivedNoOfGirvi += $receivedNoOfGirvi;

                if ($receivedNoOfGirvi == 0) {
                    $receivedNoOfGirvi = '-';
                }

                //
                $totalAmtTillReceivedGirvi = $openingGirviPrincipal + $receivedGirviPrincipal;
                $totalNoOfGirviTillReceivedGirvi = $openingNoOfGirvi + $receivedNoOfGirvi;

                if ($startDate > $todayDateNum) {
                    $totalAmtTillReceivedGirvi = 0;
                    $totalNoOfGirviTillReceivedGirvi = '-';
                }
                //
                //
                                //
                //Released Girvi On Given Date
                $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('Released')";
                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $releasedGirviPrincipal = $row['total_prin'];
                $releasedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Released Principal Amount from Additional Pricipal Table
                $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_firm_id IN ($strFrmId) and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released')";
                $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalAddGirviPrinRel = $rowTotalNewPrinGirvi['total_prin_paid_amt'];

                $releasedGirviPrincipal += $totalAddGirviPrinRel;

                //Get Total Released Principal Amount from Money Deposit Table
                $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id IN ($strFrmId) and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')"; //and girv_prin_firm_id IN ($strFrmId)
                $qResultTotalGirviDep = mysqli_query($conn,$qSelectTotalGirviDep);
                $rowTotalGirviDep = mysqli_fetch_array($qResultTotalGirviDep, MYSQLI_ASSOC);

                $totalDepositPrincMoneyGirvi = $rowTotalGirviDep['deposit_prn_amt'];

                $totalAddGirviPrinRel += $totalDepositPrincMoneyGirvi;

                $releasedGirviPrincipal += $totalDepositPrincMoneyGirvi;
                //

                $totalReleasedGirviPrincipal += $releasedGirviPrincipal;
                $totalReleasedNoOfGirvi += $releasedNoOfGirvi;

                if ($releasedNoOfGirvi == 0) {
                    $releasedNoOfGirvi = '-';
                }
                //
                $totalAmtTillReleasedGirvi = $totalAmtTillReceivedGirvi - $releasedGirviPrincipal;
                $totalNoOfGirviTillReleasedGirvi = $totalNoOfGirviTillReceivedGirvi - $releasedNoOfGirvi;

                if (($startDate == $todayDateNum || $monthCounter == $monthCounterLimit) && $finalClosingNoOfGirvi == 0) {
                    $finalClosingGirviPrincipal = $totalAmtTillReleasedGirvi;
                    $finalClosingNoOfGirvi = $totalNoOfGirviTillReleasedGirvi;
                }
                if ($startDate > $todayDateNum) {
                    $totalAmtTillReleasedGirvi = 0;
                    $totalNoOfGirviTillReleasedGirvi = '-';
                }
                //
                //
                    //
                    ////Interest Paid on Girvi On Given Date
                $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('Released')";
                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $totalIntPaid = $row['total_int_paid'];

                //Get Total Interest Amount from Additional Pricipal Table
                $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_firm_id IN ($strFrmId) and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released')";
                $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalIntPaid += $rowTotalNewPrinGirvi['total_prin_paid_int'];

                $totalIntPaidOnAddPrin = $rowTotalNewPrinGirvi['total_prin_paid_int'];

                //Get Total Int Paid Amount from Money Deposit Table
                $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id IN ($strFrmId) and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')";
                $qResultTotalGirviDep = mysqli_query($conn,$qSelectTotalGirviDep);
                $rowTotalGirviDep = mysqli_fetch_array($qResultTotalGirviDep, MYSQLI_ASSOC);

                $totalDepositIntMoneyGirvi = $rowTotalGirviDep['deposit_int_amt'];

                $totalIntPaidOnAddPrin = $totalIntPaidOnAddPrin + $totalDepositIntMoneyGirvi;

                $totalIntPaid += $totalDepositIntMoneyGirvi;
                //

                if ($totalIntPaid == 0 || $totalIntPaid == NULL) {
                    $totalIntPaid = 0;
                }

                if ($startDate > $todayDateNum) {
                    $totalIntPaid = 0;
                }
                //For Intelligent Password
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

//                //Get Total Principal Amount from Girvi Table
//                if ($selFirmId == '' || $selFirmId == NULL) {
//                    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate";
//                } else {
//                    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id='$selFirmId'";
//                }
//                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
//                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//                $openingTotalGirviPrincipal = $row['total_prin'];
//                $openingTotalNoOfGirvi = $row['no_of_girvi'];
//                //echo '$openingTotalNoOfGirvi:' . $openingTotalNoOfGirvi;
//
//                if ($selFirmId == '' || $selFirmId == NULL) {
//                    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released')";
//                } else {
//                    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released') and girv_firm_id='$selFirmId'";
//                }
//                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
//                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//                $openingReleasedGirviPrincipal = $row['total_prin'];
//                $openingReleasedNoOfGirvi = $row['no_of_girvi'];
//                //echo '   $openingReleasedNoOfGirvi:' . $openingReleasedNoOfGirvi;
//                $openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal;
//                $openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;
//
                if ($monthCounter == 1) {
                    $openingGirviPrincipal = $openingGirviPrincipal;
                    $openingNoOfGirvi = $openingNoOfGirvi;
                } else {

                    $openingGirviPrincipal = $totalAmtTillReleasedGirvi;
                    $openingNoOfGirvi = $totalNoOfGirviTillReleasedGirvi;
                }
                if ($openingNoOfGirvi == 0) {
                    $openingNoOfGirvi = '-';
                }

                if ($startDate > $todayDateNum) {
                    $openingGirviPrincipal = 0;
                    $openingNoOfGirvi = '-';
                }

                //Recieved Girvi On Given Date
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOB='" . date('d M Y', $startDate) . "'";
                } else {
                    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOB='" . date('d M Y', $startDate) . "' and girv_firm_id='$selFirmId'";
                }
                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $receivedGirviPrincipal = $row['total_prin'];
                $receivedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Principal Amount from Additional Pricipal Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "'";
                } else {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "' and girv_prin_firm_id='$selFirmId'";
                }
                $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalAdditionalGirviPrincipal = $rowTotalNewPrinGirvi['total_prin'];

                $receivedGirviPrincipal += $totalAdditionalGirviPrincipal;

                //
                $totalReceivedGirviPrincipal += $receivedGirviPrincipal;
                $totalReceivedNoOfGirvi += $receivedNoOfGirvi;

                if ($receivedNoOfGirvi == 0) {
                    $receivedNoOfGirvi = '-';
                }

                //
                $totalAmtTillReceivedGirvi = $openingGirviPrincipal + $receivedGirviPrincipal;
                $totalNoOfGirviTillReceivedGirvi = $openingNoOfGirvi + $receivedNoOfGirvi;

                if ($startDate > $todayDateNum) {
                    $totalAmtTillReceivedGirvi = 0;
                    $totalNoOfGirviTillReceivedGirvi = '-';
                }

                //
                //Released Girvi On Given Date
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released')";
                } else {
                    $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released') and girv_firm_id='$selFirmId'";
                }
                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $releasedGirviPrincipal = $row['total_prin'];
                $releasedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Released Principal Amount from Additional Pricipal Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released')";
                } else {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released') and girv_prin_firm_id='$selFirmId'";
                }
                $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalAddGirviPrinRel = $rowTotalNewPrinGirvi['total_prin_paid_amt'];

                $releasedGirviPrincipal += $totalAddGirviPrinRel;

                //Get Total Released Principal Amount from Money Deposit Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')"; //and girv_prin_firm_id IN ($strFrmId)
                } else {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_mondep_firm_id='$selFirmId'"; //and girv_prin_firm_id IN ($strFrmId)
                }
                $qResultTotalGirviDep = mysqli_query($conn,$qSelectTotalGirviDep);
                $rowTotalGirviDep = mysqli_fetch_array($qResultTotalGirviDep, MYSQLI_ASSOC);

                $totalDepositPrincMoneyGirvi = $rowTotalGirviDep['deposit_prn_amt'];

                $totalAddGirviPrinRel += $totalDepositPrincMoneyGirvi;

                $releasedGirviPrincipal += $totalDepositPrincMoneyGirvi;
                //
                //
                $totalReleasedGirviPrincipal += $releasedGirviPrincipal;
                $totalReleasedNoOfGirvi += $releasedNoOfGirvi;

                if ($releasedNoOfGirvi == 0) {
                    $releasedNoOfGirvi = '-';
                }

                //
                $totalAmtTillReleasedGirvi = $totalAmtTillReceivedGirvi - $releasedGirviPrincipal;
                $totalNoOfGirviTillReleasedGirvi = $totalNoOfGirviTillReceivedGirvi - $releasedNoOfGirvi;

                if (($startDate == $todayDateNum || $monthCounter == $monthCounterLimit) && $finalClosingNoOfGirvi == 0) {
                    $finalClosingGirviPrincipal = $totalAmtTillReleasedGirvi;
                    $finalClosingNoOfGirvi = $totalNoOfGirviTillReleasedGirvi;
                }
                if ($startDate > $todayDateNum) {
                    $totalAmtTillReleasedGirvi = 0;
                    $totalNoOfGirviTillReleasedGirvi = '-';
                }

                //
                ////Interest Paid on Girvi On Given Date
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released')";
                } else {
                    $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released') and girv_firm_id='$selFirmId'";
                }
                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $totalIntPaid = $row['total_int_paid'];

                //Get Total Principal Amount from Additional Pricipal Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released')";
                } else {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released') and girv_prin_firm_id='$selFirmId'";
                }
                $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalIntPaid += $rowTotalNewPrinGirvi['total_prin_paid_int'];

                $totalIntPaidOnAddPrin = $rowTotalNewPrinGirvi['total_prin_paid_int'];

                //Get Total Int Paid Amount from Money Deposit Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')"; //and girv_prin_firm_id IN ($strFrmId)
                } else {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_mondep_firm_id='$selFirmId'"; //and girv_prin_firm_id IN ($strFrmId)
                }
                $qResultTotalGirviDep = mysqli_query($conn,$qSelectTotalGirviDep);
                $rowTotalGirviDep = mysqli_fetch_array($qResultTotalGirviDep, MYSQLI_ASSOC);

                $totalDepositIntMoneyGirvi = $rowTotalGirviDep['deposit_int_amt'];

                $totalIntPaidOnAddPrin = $totalIntPaidOnAddPrin + $totalDepositIntMoneyGirvi;

                $totalIntPaid += $totalDepositIntMoneyGirvi;
                //

                if ($totalIntPaid == 0 || $totalIntPaid == NULL) {
                    $totalIntPaid = 0;
                }

                if ($startDate > $todayDateNum) {
                    $totalIntPaid = 0;
                }
                //
            //
                    }
            //else closed Of Firm Id Selected
            ?>
            <tr>
                <td align="center" valign="top" class="border-color-grey" width="99px">
                    <div class="blackMess13Arial grey-back"><?php echo date('d M Y', $startDate); ?></div>
                </td>
                <td align="right" class="border-color-grey lightYellow" >
                    <div class="brownMess13Arial spaceRight5"><?php echo formatInIndianStyle($openingGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey lightGreen">
                    <div class="brownMess13Arial spaceRight5"><?php echo $openingNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey lightYellow" title="<?php echo 'Main Prin Rec: ' . ($receivedGirviPrincipal - $totalAdditionalGirviPrincipal) . '  Add Prin Rec: ' . $totalAdditionalGirviPrincipal; ?>">
                    <div class="greenMess13Arial spaceRight5"><?php echo formatInIndianStyle($receivedGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey lightGreen">
                    <div class="greenMess13Arial spaceRight5"><?php echo $receivedNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey lightYellow">
                    <div class="greyMess13Arial spaceRight5"><?php echo formatInIndianStyle($totalAmtTillReceivedGirvi); ?></div>
                </td>
                <td align="right" class="border-color-grey lightGreen">
                    <div class="greyMess13Arial spaceRight5"><?php echo $totalNoOfGirviTillReceivedGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey lightYellow" title="<?php echo 'Main Prin Rel: ' . ($releasedGirviPrincipal - $totalAddGirviPrinRel) . '  Add Prin Rel: ' . $totalAddGirviPrinRel; ?>" width="90px">
                    <div class="redMess13Arial spaceRight5"><?php echo formatInIndianStyle($releasedGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey lightGreen"  width="36px">
                    <div class="redMess13Arial spaceRight5"><?php echo $releasedNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey lightYellow">
                    <div class="blackMess13Arial spaceRight5"><?php echo formatInIndianStyle($totalAmtTillReleasedGirvi); ?></div>
                </td>
                <td align="right" class="border-color-grey lightGreen">
                    <div class="blackMess13Arial spaceRight5"><?php echo $totalNoOfGirviTillReleasedGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey lightOrange" title="<?php echo 'Main Int: ' . ($totalIntPaid - $totalIntPaidOnAddPrin) . '  Add Prin Int: ' . $totalIntPaidOnAddPrin; ?>">
                    <div class="blueMess13Arial spaceRight5"><?php echo formatInIndianStyle($totalIntPaid); ?></div>
                </td>
            </tr>
            <?php
            $totalFinalIntPaid = $totalFinalIntPaid + $totalIntPaid;
            $monthCounter++;
            $startDate = $startDate + 60 * 60 * 24;
        }
        ?>
        <tr>
            <td align="right" valign="middle" class="border-color-grey">
                <div class="blackMess14Arial-BalanceSheet spaceRight5">TOTAL -</div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="brownMess14Arial-BalanceSheet spaceRight5"><?php echo formatInIndianStyle($initialOpeningGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="brownMess14Arial-BalanceSheet spaceRight5"><?php echo $initialOpeningNoOfGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="greenMess14Arial spaceRight5"><?php echo formatInIndianStyle($totalReceivedGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="greenMess14Arial spaceRight5"><?php echo $totalReceivedNoOfGirvi; ?></div>
            </td>
            <td align="right" valign="middle" class="border-color-grey" colspan="2">
                <div class="blackMess14Arial-BalanceSheet spaceRight5"></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="redMess14Arial spaceRight5"><?php echo formatInIndianStyle($totalReleasedGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="redMess14Arial spaceRight5"><?php echo $totalReleasedNoOfGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="blackMess14Arial-BalanceSheet spaceRight5"><?php echo formatInIndianStyle($finalClosingGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="blackMess14Arial-BalanceSheet spaceRight5"><?php echo $finalClosingNoOfGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey" width="65px">
                <div class="blueMess14Arial spaceRight5"><?php echo formatInIndianStyle($totalFinalIntPaid); ?></div>
            </td>
        </tr>
    </table>
</div>
