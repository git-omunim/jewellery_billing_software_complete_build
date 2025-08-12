<?php
/*
 * **************************************************************************************
 * @tutorial: Transferred Girvi Ledger Content
 * **************************************************************************************
 * 
 * Created on Jun 8, 2013 11:59:25 AM
 *
 * @FileName: orbbtrgd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//CHANGES IN FILE TO ADJUST COLUMN WIDTH @AUTHOR: SANDY12DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<div id="balanceSheetPrintDiv">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr id="headerTable"><!----cHANGE IN ID @AUTHOR: SANDY9DEC13--->
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%" class="balanceSheetPrintDiv">
                    <tr>
                        <td align="center" valign="top" rowspan="2"class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="main_link_brown12">DATE</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">OPENING BALANCE</div>
                        </td>
                        <td align="center" colspan="2"class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">TRANSFERRED GIRVI</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">TOTAL</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">RELAESED GIRVI</div>
                        </td>
                        <td align="center" colspan="2"class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">FINAL TOTAL</div>
                        </td>
                        <td align="center" rowspan="2"  class="border-color-grey-rbu width_21mm">
                            <div class="main_link_brown12">INTEREST</div>
                        </td>
                    </tr>
                    <tr>
                        <!----<td align="center" class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="main_link_brown10"></div>
                        </td>--->
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9" >AMOUNT</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" id="exportexldiv">
        <tr id="headerTable" style="display:none"><!----cHANGE IN ID @AUTHOR: SANDY9DEC13--->
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%" class="balanceSheetPrintDiv">
                    <tr>
                        <td align="center" valign="top" rowspan="2"class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="main_link_brown12">DATE</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">OPENING BALANCE</div>
                        </td>
                        <td align="center" colspan="2"class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">TRANSFERRED GIRVI</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">TOTAL</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">RELAESED GIRVI</div>
                        </td>
                        <td align="center" colspan="2"class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">FINAL TOTAL</div>
                        </td>
                        <td align="center" rowspan="2"  class="border-color-grey-rbu width_21mm">
                            <div class="main_link_brown12">INTEREST</div>
                        </td>
                    </tr>
                    <tr>
                        <!----<td align="center" class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="main_link_brown10"></div>
                        </td>--->
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9" >AMOUNT</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php
        $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
        $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
        $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
        $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
        //
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
                if ($nepaliDateIndicator == 'YES') {
                 $year_en = date("Y", time());
                    $month_en = date("m", time());
                    $day_en = date("d", time());
                    $date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);
                    $todayMonth = $date_ne['m'];
                    $todayYear = $date_ne['y'];
            }else{

            $todayMM = date(n);
            $todayMonth = date(M);
            $todayYear = date(Y);
            }
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
                if ($nepaliDateIndicator == 'YES') {
                //
                if($todayMonth == '' || $todayMonth == NULL){
                    //    $selDOBDay = $date_ne['d'];
                    $todayMM = $date_ne['m'];
                    $selDOBYear = $date_ne['y'];
                    $startDate = '01 ' . $todayMM . ' ' . $selDOBYear;
                    
                }else{
                   $startDate = '01 ' . $todayMonth . ' ' . $todayYear; 
                }
                 $startDay = '1';
            } else {
            $startDate = '01 ' . $todayMonth . ' ' . $finYear;
            }
        }
           if ($nepaliDateIndicator == 'YES') {
            $startDateComp = explode(' ', $startDate);
            $dd = $startDateComp[0];
            $mm = $startDateComp[1];
            $yy = $startDateComp[2];
            $checkEng = $nepali_date->validate_en($yy, $mm, $dd);
            if ($checkEng != '1') {
                $engDate = $nepali_date->get_eng_date($yy, $mm, $dd);
                $startDate = $engDate['d'] . '-' . $engDate['m'] . '-' . $engDate['y'];
            }
        }
        $startDate = strtotime($startDate);
        $monthCounter = 1;
        $monthCounterLimit = 0;

//START Code to fix counter for Month
        if ($nepaliDateIndicator == 'YES') {
        $nepaliDaysInMonth = $nepali_date->get_nepali_month_days($selDOBYear, $todayMM);
        } else {
        $arrLeapYear = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $arrYear = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        }
         if ($nepaliDateIndicator == 'YES') {
            $monthCounterLimit = $nepaliDaysInMonth;
        } else {
        if (($finYear % 4) == 0) {
            $monthCounterLimit = $arrLeapYear[$todayMM - 1];
        } else {
            $monthCounterLimit = $arrYear[$todayMM - 1];
        }
        }
//echo '  $startDate'.  $monthCounterLimit;
        $initialOpeningTransGirviPrincipal = 0;
        $initialOpeningNoOfTransGirvi = 0;

        $totalTransferredGirviPrincipal = 0;
        $totalNoOfTransferredGirvi = 0;

        $totalReleasedTransGirviPrincipal = 0;
        $totalReleasedNoOfTransGirvi = 0;

        $finalClosingTransGirviPrincipal = 0;
        $finalClosingNoOfTransGirvi = 0;



        $openingTransGirviPrincipal = 0;
        $openingNoOfTransGirvi = 0;

        $openingTotalTransGirviPrincipal = 0;
        $openingTotalNoOfTransGirvi = 0;


        $openingReleasedTransGirviPrincipal = 0;
        $openingReleasedNoOfTransGirvi = 0;

        $TransferredGirviPrincipal = 0;
        $TransferredNoOfGirvi = 0;


        $totalAmtTillTransferredGirvi = 0;
        $totalNoOfTransGirviTillTransferred = 0;


        $releasedTransGirviPrincipal = 0;
        $releasedNoOfTransGirvi = 0;

        $totalAmtTillReleasedTransGirvi = 0;
        $totalNoOfTransGirviTillReleased = 0;

        include 'omfrpsck.php';

//Get Total Transferred Principal Amount from Girvi Table @AUTHOR: SANDY8AUG13
        // $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin, COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer  where gtrans_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))<$startDate and gtrans_firm_id IN ($strFrmId)";
        $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin,COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and 
        UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))<$startDate and gtrans_firm_id IN ($strFrmId) and gtrans_exist_firm_id IN ($strTransFirmId) and "
                . "gtrans_firm_type IS NULL";
        $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

        $openingTotalTransGirviPrincipal = $row['total_prin'];
        $openingTotalNoOfTransGirvi = $row['no_of_girvi'];
//echo $openingTotalTransGirviPrincipal . '' . $openingTotalNoOfTransGirvi . $qSelect;
        //  $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin, COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer  where gtrans_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOR,'%d %b %Y'))<$startDate and gtrans_upd_sts IN ('Released') and gtrans_firm_id IN ($strFrmId)";
        $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin,COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and 
        UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOR,'%d %b %Y'))<$startDate and gtrans_firm_id IN ($strFrmId) and gtrans_exist_firm_id IN ($strTransFirmId) and"
                . " gtrans_upd_sts IN ('Released') and gtrans_firm_type IS NULL";
        $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

        $openingReleasedTransGirviPrincipal = $row['total_prin'];
        $openingReleasedNoOfTransGirvi = $row['no_of_girvi'];

        $totalTransLoanOp = $openingTotalTransGirviPrincipal - $openingReleasedTransGirviPrincipal;
        $openingNoOfTrans = $openingTotalNoOfTransGirvi - $openingReleasedNoOfTransGirvi;

//echo $openingReleasedTransGirviPrincipal . '' . $openingReleasedNoOfTransGirvi . $qSelect;
        if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
            $qSelMLLoanAddOp = "SELECT SUM(ml_main_prin_amt) as ml_total_prin_add,COUNT(ml_id) as no_of_mlGirvi FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and
        UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<$startDate and ml_firm_id IN ($strFrmId)";
            $resMLLoanAddOp = mysqli_query($conn,$qSelMLLoanAddOp) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanAddOp);
            $rowMLLoanAddOp = mysqli_fetch_array($resMLLoanAddOp, MYSQLI_ASSOC);
            $totalMLLoanAddOp = $rowMLLoanAddOp['ml_total_prin_add'];
            $opMLNoOfGirvi = $rowMLLoanAddOp['no_of_mlGirvi'];

            $qSelectMLLoanDepOp = "SELECT SUM(ml_trans_mondep_prin_amt) as ml_total_dep_prin_amt,SUM(ml_trans_mondep_int_amt) as ml_total_dep_int FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and
        UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))<$startDate and ml_trans_mondep_firm_id IN ($strFrmId) and ml_trans_upd_sts!='Deleted'";
            $qResultMLLoanDepOp = mysqli_query($conn,$qSelectMLLoanDepOp);
            $qRowMLLoanDepOp = mysqli_fetch_array($qResultMLLoanDepOp, MYSQLI_ASSOC);
            $totalMLLoanDep = $qRowMLLoanDepOp['ml_total_dep_prin_amt'];
            $totalMLLoanDepCrOp = $totalMLLoanDep;
            $totalMLLoanDepInt += $qRowMLLoanDepOp['ml_total_dep_int'];
            $openingTotalGirviPaidInt += $totalMLLoanDepInt;

            $qSelMLLoanRelOp = "SELECT SUM(ml_total_amt) as ml_total_rel_amt,COUNT(ml_id) as no_of_mlGirvi FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and
        UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$startDate and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released')";
            $qResultMLLoanRelOp = mysqli_query($conn,$qSelMLLoanRelOp);
            $qRowMLLoanRelOp = mysqli_fetch_array($qResultMLLoanRelOp, MYSQLI_ASSOC);
            $totalMLLoanRelCrOp = $qRowMLLoanRelOp['ml_total_rel_amt'];
            $totalMLLoanDepCrOp += $totalMLLoanRelCrOp;
            $opMLNoOfRelGirvi = $qRowMLLoanRelOp['no_of_mlGirvi'];
            /*             * ***************************$totalMLOp********************* */
            //  $totalMLOp = $totalMLLoanDepCrOp - $totalMLLoanAddOp;
            $totalMLOp = $totalMLLoanAddOp - $totalMLLoanDepCrOp;
            $openingNoOfMLGirvi = $opMLNoOfGirvi - $opMLNoOfRelGirvi;

            /*             * ***************************$totalMLOp********************* */
        }
        $openingTransGirviPrincipal = $totalTransLoanOp + $totalMLOp;
        $openingNoOfTransGirvi = $openingNoOfTrans + $openingNoOfMLGirvi;
        if ($monthCounter == 1) {
            $initialOpeningTransGirviPrincipal = $openingTransGirviPrincipal;
            $initialOpeningNoOfTransGirvi = $openingNoOfTransGirvi;
        }
        while ($monthCounter <= $monthCounterLimit) {
            if ($monthCounter == 1) {
                $openingTransGirviPrincipal = $openingTransGirviPrincipal;
                $openingNoOfTransGirvi = $openingNoOfTransGirvi;
            } else {

                $openingTransGirviPrincipal = $totalAmtTillReleasedTransGirvi;
                $openingNoOfTransGirvi = $totalNoOfTransGirviTillReleased;
            }
            if ($openingNoOfTransGirvi == 0) {
                $openingNoOfTransGirvi = '-';
            }
            if ($startDate > $todayDateNum) {
                $openingTransGirviPrincipal = 0;
                $openingNoOfTransGirvi = '-';
            }

            //Transferred Girvi On Given Date
            // $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin, COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_DOB='" . date('d M Y', $startDate) . "' and gtrans_firm_id IN ($strFrmId)";
            $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin, COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_DOB = '" . date('d M Y', $startDate) . "' and "
                    . "gtrans_firm_id IN ($strFrmId) and gtrans_exist_firm_id IN ($strTransFirmId) and gtrans_upd_sts IN ('Transferred','Released') and gtrans_firm_type IS NULL order by gtrans_DOB asc";
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            $TransferredGirviPrincipal = $row['total_prin'];
            $TransferredNoOfGirvi = $row['no_of_girvi'];

            //Released Girvi On Given Date
            //   $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin, COUNT(gtrans_id) as no_of_girvi FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_DOR='" . date('d M Y', $startDate) . "' and gtrans_firm_id IN ($strFrmId) and gtrans_upd_sts IN ('Released')";
            $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin, SUM(gtrans_paid_int) as total_trans_rel_int, COUNT(gtrans_id) as no_of_transGirvi FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and 
                   UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOR,'%d %b %Y'))=$startDate and gtrans_firm_id IN ($strFrmId) and gtrans_exist_firm_id IN ($strTransFirmId) and"
                    . " gtrans_upd_sts IN ('Released') and gtrans_firm_type IS NULL";
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            $releasedTransGirviPrincipal = $row['total_prin'];
            $releasedNoOfTransGirvi = $row['no_of_girvi'];
            if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                //ML Add
                $qSelMLLoanAdd = "SELECT SUM(ml_main_prin_amt) as total_prin, COUNT(ml_id) as no_of_transGirvi FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_DOB = '" . date('d M Y', $startDate) . "'  and ml_firm_id IN ($strFrmId) order by ml_DOB asc";
                $resMLLoanAdd = mysqli_query($conn,$qSelMLLoanAdd) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanAdd);
                $rowMLLoanAdd = mysqli_fetch_array($resMLLoanAdd);
                $receivedMLGirviPrincipal = $rowMLLoanAdd['total_prin'];
                $TransferredGirviPrincipal += $receivedMLGirviPrincipal;
                $receivedNoOfMLGirvi = $rowMLLoanAdd['no_of_transGirvi'];
                $TransferredNoOfGirvi += $receivedNoOfMLGirvi;
                //  echo '$receivedMLGirviPrincipal: ' . $receivedMLGirviPrincipal . '<br/>';
                //ML Dep
                $qSelectMLLoanDep = "SELECT SUM(ml_trans_mondep_prin_amt) as total_prin, SUM(ml_trans_mondep_int_amt) as total_int FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                    ml_trans_mondep_date = '" . date('d M Y', $startDate) . "' and ml_trans_mondep_firm_id IN ($strFrmId) and ml_trans_upd_sts!='Deleted' order by ml_trans_mondep_date asc";
                $qResultMLLoanDep = mysqli_query($conn,$qSelectMLLoanDep);
                $rowMLLoanDep = mysqli_fetch_array($qResultMLLoanDep);
                $relMLGirviDepPrincipal = $rowMLLoanDep['total_prin'];
                $relMLGirviDepInt = $rowMLLoanDep['total_int'];
                $releasedTransGirviPrincipal += $relMLGirviDepPrincipal;
                //ML Rel
                $qSelMLLoanRel = "SELECT SUM(ml_total_amt) as total_prin,COUNT(ml_id) as no_of_transGirvi FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and 
                    ml_DOR = '" . date('d M Y', $startDate) . "' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') order by ml_DOR asc";//ml_total_amt changed @Author:PRIYA05MAR15
                $resMLLoanRel = mysqli_query($conn,$qSelMLLoanRel) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanRel);
                $rowMLLoanRel = mysqli_fetch_array($resMLLoanRel);
                $relMLGirviPrincipal = $rowMLLoanRel['total_prin'];
                $releasedTransGirviPrincipal += $relMLGirviPrincipal;
                $relNoOfMLGirvi = $rowMLLoanRel['no_of_transGirvi'];
                $releasedNoOfTransGirvi += $relNoOfMLGirvi;
            }
            $totalTransferredGirviPrincipal += $TransferredGirviPrincipal;
            $totalNoOfTransferredGirvi += $TransferredNoOfGirvi;
            //total transferred till today
            $totalAmtTillTransferredGirvi = $TransferredGirviPrincipal + $openingTransGirviPrincipal;
            $totalNoOfTransGirviTillTransferred = $openingNoOfTransGirvi + $TransferredNoOfGirvi;
            if ($startDate > $todayDateNum) {
                $totalAmtTillTransferredGirvi = 0;
                $totalNoOfTransGirviTillTransferred = '-';
            }

            $totalReleasedTransGirviPrincipal += $releasedTransGirviPrincipal;
            $totalReleasedNoOfTransGirvi +=$releasedNoOfTransGirvi;

            $totalAmtTillReleasedTransGirvi = $totalAmtTillTransferredGirvi - $releasedTransGirviPrincipal;
            $totalNoOfTransGirviTillReleased = $totalNoOfTransGirviTillTransferred - $releasedNoOfTransGirvi;

            if (($startDate == $todayDateNum || $monthCounter == $monthCounterLimit) && $finalClosingNoOfTransGirvi == 0) {
                $finalClosingTransGirviPrincipal = $totalAmtTillReleasedTransGirvi;
                $finalClosingNoOfTransGirvi = $totalNoOfTransGirviTillReleased;
            }
            if ($startDate > $todayDateNum) {
                $totalAmtTillReleasedTransGirvi = 0;
                $totalNoOfTransGirviTillReleased = '-';
            }

            $qSelect = "SELECT SUM(gtrans_paid_int) as total_int_paid FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and 
                gtrans_DOR='" . date('d M Y', $startDate) . "' and gtrans_firm_id IN ($strFrmId) and gtrans_upd_sts IN ('Released') and gtrans_firm_type IS NULL";
            $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalIntPaid = $relMLGirviDepInt + $row['total_int_paid'];

            //ML Rel
            $qSelMLLoanRel = "SELECT SUM(ml_paid_int) as ml_total_rel_int FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and 
                ml_DOR = '" . date('d M Y', $startDate) . "' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') order by ml_DOR asc";
            $resMLLoanRel = mysqli_query($conn,$qSelMLLoanRel) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanRel);
            $rowMLLoanRel = mysqli_fetch_array($resMLLoanRel);
            $totalIntPaid += $rowMLLoanRel['ml_total_rel_int'];

            if ($totalIntPaid == 0 || $totalIntPaid == NULL) {
                $totalIntPaid = 0;
            }
            if ($startDate > $todayDateNum) {
                $totalIntPaid = 0;
            }
            //exit();
            ?>
            <!--Start Code To Change Classes @Author:PRIYA19AUG13-->
            <!--Start Code To Change Width and classes @Author:PRIYA23AUG13-->
            <tr>
                <td align="center" valign="top" class="border-color-grey-rb border-color-grey-left width_16mm" > <!-- changes in width @AUTHOR: SANDY5AUG13 -->
                    <div class="blackMess11ArialNormal grey-back"><?php
                        if ($nepaliDateIndicator == 'YES') {
                            $startDate = om_strtoupper(date('d-m-Y', $startDate));
                            $date_comp = explode('-', $startDate);
                            $dd = $date_comp[0];
                            $mm = $date_comp[1];
                            $yy = $date_comp[2];
                            //
                            $checkEng1 = $nepali_date->validate_en($yy, $mm, $dd);
                            if ($checkEng1 == '1') {
                                $engDate1 = $nepali_date->get_nepali_date($yy, $mm, $dd);
                                $startDate2 = $engDate1['d'] . '-' . $engDate1['m'] . '-' . $engDate1['y'];
                            }
//                        $date_ne = $nepali_date->get_nepali_date($yy,$mm,$dd);
                            echo $startDate2;
                        } else {
                    echo om_strtoupper(date('d M y', $startDate)); 
                        } ?></div><!--Year Changed Y to y @Author:PRIYA23AUG13-->
                </td>
                <td align="right" class="border-color-grey-rb lightBlue width_23mm"  >
                    <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo formatInIndianStyle($openingTransGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightBlue width_8mm" >
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $openingNoOfTransGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_23mm">
                    <div class="blackMess11ArialNormal reddish spaceRight5"><?php echo formatInIndianStyle($TransferredGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_8mm">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $TransferredNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightYellow width_23mm">
                    <div class="blackMess11ArialNormal orange spaceRight5"><?php echo formatInIndianStyle($totalAmtTillTransferredGirvi); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightYellow width_8mm">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $totalNoOfTransGirviTillTransferred; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightGreen width_23mm" >
                    <div class="blackMess11ArialNormal green spaceRight5"><?php echo formatInIndianStyle($releasedTransGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightGreen width_8mm" >
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $releasedNoOfTransGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightVoilet width_23mm">
                    <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo formatInIndianStyle($totalAmtTillReleasedTransGirvi); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightVoilet width_8mm">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $totalNoOfTransGirviTillReleased; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_21mm">
                    <div class="blackMess11ArialNormal reddish spaceRight5"><?php echo formatInIndianStyle($totalIntPaid); ?></div>
                </td>
            </tr>
            <?php
            $totalFinalIntPaid = $totalFinalIntPaid + $totalIntPaid;
            $monthCounter++;
                if ($nepaliDateIndicator == 'YES') {
                $date_comp = explode('-', $startDate2);
                $dd = $date_comp[0];
                $mm = $date_comp[1];
                $yy = $date_comp[2];
                $checkEng1 = $nepali_date->validate_en($yy, $mm, $dd);
                if ($checkEng1 != '1') {
                    $engDate1 = $nepali_date->get_eng_date($yy, $mm, $dd);
                    $startDate = $engDate1['d'] . '-' . $engDate1['m'] . '-' . $engDate1['y'];
                }
                $startDate = strtotime($startDate);
            }
            $startDate = $startDate + 60 * 60 * 24;
        }
        ?>
        <tr>
            <td align="center" valign="middle" class="border-color-grey-rb  border-color-grey-left  balanceSheetPrintDiv width_16mm">
                <div class="blackMess12Arial spaceRight5">TOTAL -</div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo formatInIndianStyle($initialOpeningTransGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo $initialOpeningNoOfTransGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo formatInIndianStyle($totalTransferredGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo $totalNoOfTransferredGirvi; ?></div>
            </td>
            <td align="right" valign="middle" class="border-color-grey-rb balanceSheetPrintDiv width_23mm" colspan="2">
                <div class="blackMess12Arial reddish spaceRight5"></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo formatInIndianStyle($totalReleasedTransGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo $totalReleasedNoOfTransGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo formatInIndianStyle($finalClosingTransGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo $finalClosingNoOfTransGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_21mm">
                <div class="blackMess12Arial reddish spaceRight5"><?php echo formatInIndianStyle($totalFinalIntPaid); ?></div>
            </td>
        </tr>
        <!--End Code To Change Width and classes @Author:PRIYA23AUG13-->
        <!--End Code To Change Classes @Author:PRIYA19AUG13-->
    </table>
</div>
