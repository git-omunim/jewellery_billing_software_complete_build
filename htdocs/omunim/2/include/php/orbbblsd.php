<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orbbblsd.php
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
//CHANGES IN FILE TO ADJUST COLUMN WIDTH @AUTHOR: SANDY12DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>

<?php
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
?>
<div id="balanceSheetPrintDiv">
    <table border="0" cellspacing="0" cellpadding="0" width="100%"> 
        <tr id="headerTable"><!----cHANGE IN ID @AUTHOR: SANDY10DEC13--------->
            <td>
                <table border="0" cellspacing="0" cellpadding="0" class="balanceSheetPrintDiv" width="100%">
                    <tr>
                        <td align="center" valign="top" rowspan="2"class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="main_link_brown12 ">DATE</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">OPENING BALANCE</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm" >
                            <div class="main_link_brown12">RECEIVED GIRVI</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">TOTAL</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">RELAESED GIRVI</div>
                        </td>
                        <td align="center" colspan="2"  class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">FINAL TOTAL</div>
                        </td>
                        <td align="center" rowspan="2"  class="border-color-grey-rbu width_21mm" >
                            <div class="main_link_brown12" >INTEREST</div>
                        </td>
                    </tr>
                    <tr>
                        <!----<td align="center"valign="top" width="60px" class="border-color-grey-rbu border-color-grey-left">
                            <div class="main_link_brown9"></div>
                        </td>--->
                        <td align="center"  class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_23mm" >
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm ">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm " >
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm ">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_23mm ">
                            <div class="main_link_brown9" >AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm ">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" id="exportexldiv"><!--Class Removed @Author:PRIYA23AUG13-->
         <tr style="display: none"><!----cHANGE IN ID @AUTHOR: SANDY10DEC13--------->
                        <td align="center" valign="top" rowspan="2"class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="main_link_brown12 ">DATE</div>
                        </td>
                        
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">OPENING BALANCE</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm" >
                            <div class="main_link_brown12">RECEIVED GIRVI</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">TOTAL</div>
                        </td>
                        <td align="center" colspan="2" class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">RELAESED GIRVI</div>
                        </td>
                        <td align="center" colspan="2"  class="border-color-grey-top border-color-grey-r width_30mm">
                            <div class="main_link_brown12">FINAL TOTAL</div>
                        </td>
                        <td align="center" rowspan="2"  class="border-color-grey-rbu width_21mm" >
                            <div class="main_link_brown12" >INTEREST</div>
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <!----<td align="center"valign="top" width="60px" class="border-color-grey-rbu border-color-grey-left">
                            <div class="main_link_brown9"></div>
                        </td>--->
                        <td align="center"  class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm">
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_23mm" >
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm ">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_23mm " >
                            <div class="main_link_brown9">AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm ">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_23mm ">
                            <div class="main_link_brown9" >AMOUNT</div>
                        </td>
                        <td align="center"  class="border-color-grey-rbu width_8mm ">
                            <div class="main_link_brown9">GIRVI</div>
                        </td>
                    </tr>
               
            
        </tr>
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
            $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
            $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
            $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
            $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
            //
            $selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
            $resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
            $rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
            $nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
            //
                 if ($nepaliDateIndicator == 'YES') {
                $getMonth = strtoupper($getMonth);
                if ($getYear != '') {
                    // echo '$syear:=' . $syear . '$smonth:' . $smonth . '$sday:=' . $sday;
                    $nepali_fromdate = new nepali_date();
                    $getDay = 1;
                    $english_fromdate = $nepali_fromdate->get_eng_date($getYear, $getMonth, $getDay);
                    $todayDate = trim($english_fromdate['d']) . ' ' . trim(strtoupper($english_fromdate['M'])) . ' ' . trim($english_fromdate['y']);
                    $getMonth =strtoupper($english_fromdate['M']);
                    $getYear = $english_fromdate['y'];

                }
            }
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
        //echo  $startDate . '   ';

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

        $accCashOpenBalDR = 0;
        $accCashOpenBalCR = 0;
        //Start Code To Add Frim Id @AUTHOR:PRIYA13MAR13
        //End Code To Add Frim Id @AUTHOR:PRIYA13MAR1
        if ($selFirmId != NULL) {
            $strFrmId = $selFirmId;
        } else {
            //Get Public Firms
            if ($_SESSION['sessionIgenType'] == $globalOwnPass)
                $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
            else
                $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
            $resPubFirmCount = mysqli_query($conn, $qSelPubFirmCount);

            $strFrmId = '0';

            //Set String for Public Firms
            while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                $strFrmId = $strFrmId . ",";
                $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
            }
        }
        if ($_SESSION['sessionIgenType'] == $globalOwnPass) {

            //Get Total Principal Amount from Girvi Table
            $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id IN ($strFrmId)";
            $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingTotalGirviPrincipal = $row['total_prin']; //echo '<br/>Total Girvi:' . $openingTotalGirviPrincipal;
            $openingTotalNoOfGirvi = $row['no_of_girvi'];

            // Start Code to Get Total Principal Amount from Additional Pricipal Table
            $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOB,'%d %b %Y'))<$startDate and girv_prin_firm_id IN ($strFrmId)";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalOpenAddGirviPrin = $row['total_prin'];

            $openingTotalGirviPrincipal += $totalOpenAddGirviPrin; //echo '<br/>Total Add Prin:' . $totalOpenAddGirviPrin;
            // End Code to Get Total Principal Amount from Additional Pricipal Table

            $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate 
                    and girv_upd_sts IN ('Released','Auctioned') and girv_firm_id IN ($strFrmId)"; //Auctioned status added @Author:PRIYA10APR15
            $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingReleasedGirviPrincipal = $row['total_prin']; //echo '<br/>Total Rel Girvi:' . $openingReleasedGirviPrincipal;
            $openingReleasedNoOfGirvi = $row['no_of_girvi'];

            // Start Code to Get Total Released Principal Amount from Additional Pricipal Table
            $qSelect = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                        girv_prin_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and 
                        girv_prin_upd_sts IN ('Released')";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalOpenAddGirviPrinRel = $row['total_prin_paid_amt'];

            $openingReleasedGirviPrincipal += $totalOpenAddGirviPrinRel;
            // End Code to Get Total Released Principal Amount from Additional Pricipal Table
            // 
            // Start Code To Get Total Released Principal Amount from Money Deposit Table
            $qSelect = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id IN ($strFrmId) and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalOpenDepPrincMoneyGirvi = $row['deposit_prn_amt'];

            $openingReleasedGirviPrincipal += $totalOpenDepPrincMoneyGirvi; //echo '<br/>Total Dep:' . $totalOpenDepPrincMoneyGirvi;
            // End Code To Get Total Released Principal Amount from Money Deposit Table

            /*             * *********Start code to add accounts secured loan bal @Author:PRIYA08MAY14****************** */
            $qSelectAcc = "SELECT sum(acc_cash_balance) as accCashOpenBalDR FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and "
                    . "UNIX_TIMESTAMP(STR_TO_DATE(acc_cash_balance_date,'%d %b %Y'))<'$startDate' and acc_main_acc='Secured Loans' 
                        and acc_cash_balance_crdr='DR' and acc_firm_id IN ($strFrmId)";
            $resultAcc = mysqli_query($conn, $qSelectAcc) or die(mysqli_error($conn));
            $rowAcc = mysqli_fetch_array($resultAcc);
            $accCashOpenBalDR = $rowAcc['accCashOpenBalDR'];

            $qSelectAcc = "SELECT sum(acc_cash_balance) as accCashOpenBalCR FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and "
                    . "UNIX_TIMESTAMP(STR_TO_DATE(acc_cash_balance_date,'%d %b %Y'))<'$startDate' and acc_main_acc='Secured Loans' and acc_cash_balance_crdr='CR' and acc_firm_id IN ($strFrmId)";
            $resultAcc = mysqli_query($conn, $qSelectAcc) or die(mysqli_error($conn));
            $rowAcc = mysqli_fetch_array($resultAcc);
            $accCashOpenBalCR = $rowAcc['accCashOpenBalCR'];
            /*             * *********End code to add accounts secured loan bal @Author:PRIYA08MAY14****************** */

            /*             * *************Start code to change opening bal to add $accCashOpenBalDR & $accCashOpenBalCR @Author:PRIYA08MAY14************* */
            $openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal + $accCashOpenBalDR - $accCashOpenBalCR;
            /*             * *************End code to change opening bal to add $accCashOpenBalDR & $accCashOpenBalCR @Author:PRIYA08MAY14************* */
            $openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;

            if ($monthCounter == 1) {
                $initialOpeningGirviPrincipal = $openingGirviPrincipal;
                $initialOpeningNoOfGirvi = $openingNoOfGirvi;
            }
        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

            //Get Total Principal Amount from Girvi Table
            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate";
            } else {
                $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and girv_firm_id='$selFirmId'";
            }
            $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingTotalGirviPrincipal = $row['total_prin']; //echo '<br/>Total Girvi:' . $openingTotalGirviPrincipal;
            $openingTotalNoOfGirvi = $row['no_of_girvi'];
            //echo '$openingTotalNoOfGirvi:' . $openingTotalNoOfGirvi;
            //
            //
            // Start Code to Get Total Principal Amount from Additional Pricipal Table
            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOB,'%d %b %Y'))<$startDate";
            } else {
                $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                girv_prin_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOB,'%d %b %Y'))<$startDate and girv_prin_firm_id='$selFirmId'";
            }
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalOpenAddGirviPrin = $row['total_prin'];

            $openingTotalGirviPrincipal += $totalOpenAddGirviPrin; //echo '<br/>Total Add Prin:' . $totalOpenAddGirviPrin;
            // End Code to Get Total Principal Amount from Additional Pricipal Table

            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released','Auctioned')";
            } else {
                $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                    UNIX_TIMESTAMP(STR_TO_DATE(girv_DOB,'%d %b %Y'))<$startDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_upd_sts IN ('Released','Auctioned') and girv_firm_id='$selFirmId'";
            }
            $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $openingReleasedGirviPrincipal = $row['total_prin']; //echo '<br/>Total Rel Girvi:' . $openingReleasedGirviPrincipal;
            $openingReleasedNoOfGirvi = $row['no_of_girvi'];

            // Start Code to Get Total Released Principal Amount from Additional Pricipal Table
            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                        UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and 
                        girv_prin_upd_sts IN ('Released')";
            } else {
                $qSelect = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                        girv_prin_firm_id='$selFirmId' and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and 
                        girv_prin_upd_sts IN ('Released')";
            }
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalOpenAddGirviPrinRel = $row['total_prin_paid_amt'];

            $openingReleasedGirviPrincipal += $totalOpenAddGirviPrinRel; //echo '<br/>Total Rel Prin:' . $totalOpenAddGirviPrinRel;
            // End Code to Get Total Released Principal Amount from Additional Pricipal Table
            // 
            // Start Code To Get Total Released Principal Amount from Money Deposit Table
            if ($selFirmId == '' || $selFirmId == NULL) {
                $qSelect = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                girv_mondep_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate";
            } else {
                $qSelect = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id='$selFirmId' and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate";
            }
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

            $totalOpenDepPrincMoneyGirvi = $row['deposit_prn_amt'];

            $openingReleasedGirviPrincipal += $totalOpenDepPrincMoneyGirvi; //echo '<br/>Total Dep:' . $totalOpenDepPrincMoneyGirvi; 
            // End Code To Get Total Released Principal Amount from Money Deposit Table

            /*             * *********Start code to add accounts secured loan bal @Author:PRIYA08MAY14****************** */
            $qSelectAcc = "SELECT sum(acc_cash_balance) as accCashOpenBalDR FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and "
                    . "UNIX_TIMESTAMP(STR_TO_DATE(acc_cash_balance_date,'%d %b %Y'))<'$startDate' and acc_main_acc='Secured Loans' and acc_cash_balance_crdr='DR' and acc_firm_id IN ($strFrmId)";
            $resultAcc = mysqli_query($conn, $qSelectAcc) or die(mysqli_error($conn));
            $rowAcc = mysqli_fetch_array($resultAcc);
            $accCashOpenBalDR = $rowAcc['accCashOpenBalDR'];

            $qSelectAcc = "SELECT sum(acc_cash_balance) as accCashOpenBalCR FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and "
                    . "UNIX_TIMESTAMP(STR_TO_DATE(acc_cash_balance_date,'%d %b %Y'))<'$startDate' and acc_main_acc='Secured Loans' and acc_cash_balance_crdr='CR' and acc_firm_id IN ($strFrmId)";
            $resultAcc = mysqli_query($conn, $qSelectAcc) or die(mysqli_error($conn));
            $rowAcc = mysqli_fetch_array($resultAcc);
            $accCashOpenBalCR = $rowAcc['accCashOpenBalCR'];
            /*             * *********End code to add accounts secured loan bal @Author:PRIYA08MAY14****************** */

            /*             * *************Start code to change opening bal to add $accCashOpenBalDR & $accCashOpenBalCR @Author:PRIYA08MAY14************* */
            $openingGirviPrincipal = $openingTotalGirviPrincipal - $openingReleasedGirviPrincipal + $accCashOpenBalDR - $accCashOpenBalCR;
            /*             * *************End code to change opening bal to add $accCashOpenBalDR & $accCashOpenBalCR @Author:PRIYA08MAY14************* */
            $openingNoOfGirvi = $openingTotalNoOfGirvi - $openingReleasedNoOfGirvi;

            if ($monthCounter == 1) {
                $initialOpeningGirviPrincipal = $openingGirviPrincipal;
                $initialOpeningNoOfGirvi = $openingNoOfGirvi;
            }
        }
        while ($monthCounter <= $monthCounterLimit) {
            if (date('d M Y', $startDate) > '26 Feb 2014') {
//                echo '<br/>date:' . date('d M Y', $startDate);
//                echo '<br/>$openingGirviPrincipal:' . $openingGirviPrincipal;
            }
            /*             * *********Start code to add accounts secured loan bal @Author:PRIYA08MAY14****************** */
            $qSelectAcc = "SELECT sum(acc_cash_balance) as accCashOpenBalDR FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and "
                    . "acc_cash_balance_date='" . date('d M Y', $startDate) . "' and acc_main_acc='Secured Loans' and acc_cash_balance_crdr='DR' and acc_firm_id IN ($strFrmId)";
            $resultAcc = mysqli_query($conn, $qSelectAcc);
            $rowAcc = mysqli_fetch_array($resultAcc);
            $accCashOpenBalDR = $rowAcc['accCashOpenBalDR'];

            $qSelectAcc = "SELECT sum(acc_cash_balance) as accCashOpenBalCR FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and "
                    . "acc_cash_balance_date='" . date('d M Y', $startDate) . "' and acc_main_acc='Secured Loans' and acc_cash_balance_crdr='CR' and acc_firm_id IN ($strFrmId)";
            $resultAcc = mysqli_query($conn, $qSelectAcc);
            $rowAcc = mysqli_fetch_array($resultAcc);
            $accCashOpenBalCR = $rowAcc['accCashOpenBalCR'];

            /*             * *********End code to add accounts secured loan bal @Author:PRIYA08MAY14****************** */

            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                if ($monthCounter == 1) {
                    $openingGirviPrincipal = $openingGirviPrincipal + $accCashOpenBalDR - $accCashOpenBalCR;
                    $openingNoOfGirvi = $openingNoOfGirvi;
                } else {
                    $openingGirviPrincipal = $totalAmtTillReleasedGirvi + $accCashOpenBalDR - $accCashOpenBalCR;
                    $openingNoOfGirvi = $totalNoOfGirviTillReleasedGirvi;
                }
                if (date('d M Y', $startDate) == '02 May 2014') {
                    //  echo '<br/>principal:' . $qSelectAcc;
//                    echo '<br/>totalAmtTillReleasedGirvi:' . $totalAmtTillReleasedGirvi;
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
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $receivedGirviPrincipal = $row['total_prin'];
                $receivedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Principal Amount from Additional Pricipal Table
                $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                    girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "' and girv_prin_firm_id IN ($strFrmId)";
                $qResultDDNewTotalAddedPrin = mysqli_query($conn, $qSelectDDNewTotalAddedPrin);
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
                $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and "
                        . "girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('Released','Auctioned')";
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $releasedGirviPrincipal = $row['total_prin'];
                $releasedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Released Principal Amount from Additional Pricipal Table
                $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                    girv_prin_upd_sts!='Deleted' and girv_prin_firm_id IN ($strFrmId) and 
                        girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and 
                            girv_prin_upd_sts IN ('Released')";
                $qResultDDNewTotalAddedPrin = mysqli_query($conn, $qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalAddGirviPrinRel = $rowTotalNewPrinGirvi['total_prin_paid_amt'];

                $releasedGirviPrincipal += $totalAddGirviPrinRel;

                //Get Total Released Principal Amount from Money Deposit Table
                $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id IN ($strFrmId) and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')"; //and girv_prin_firm_id IN ($strFrmId)
                $qResultTotalGirviDep = mysqli_query($conn, $qSelectTotalGirviDep);
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
                $qSelect = "SELECT SUM(girv_paid_oint) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' 
                    and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('Released','Auctioned')";
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $totalIntPaid = $row['total_int_paid'];

                if ($totalIntPaid == NULL || $totalIntPaid == '') {
                    $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' 
                    and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('Released','Auctioned')";
                    $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                    $totalIntPaid = $row['total_int_paid'];
                }

                //Get Total Interest Amount from Additional Pricipal Table
                $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int,SUM(girv_prin_paid_oint) as total_prin_paid_oint FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                    girv_prin_upd_sts!='Deleted' and girv_prin_firm_id IN ($strFrmId) and 
                        girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and 
                            girv_prin_upd_sts IN ('Released')";
                $qResultDDNewTotalAddedPrin = mysqli_query($conn, $qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                    $totalIntPaid += $rowTotalNewPrinGirvi['total_prin_paid_int'];
                } else{
                    $totalIntPaid += $rowTotalNewPrinGirvi['total_prin_paid_oint'];
                }

                $totalIntPaidOnAddPrin = $rowTotalNewPrinGirvi['total_prin_paid_int'];

                //Get Total Int Paid Amount from Money Deposit Table
                $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt,SUM(girv_mondep_oint_amt) as deposit_oint_amt,SUM(girv_mondep_oextra_amt) as deposit_oextra_amt, SUM(girv_mondep_odisc_amt) as deposit_odisc_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_firm_id IN ($strFrmId) and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')";
                $qResultTotalGirviDep = mysqli_query($conn, $qSelectTotalGirviDep);
                $rowTotalGirviDep = mysqli_fetch_array($qResultTotalGirviDep, MYSQLI_ASSOC);

                if($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                    $totalDepositIntMoneyGirvi = $rowTotalGirviDep['deposit_int_amt'];
                } else{
                    $totalDepositIntMoneyGirvi = $rowTotalGirviDep['deposit_oint_amt'] + $rowTotalGirviDep['deposit_oextra_amt'] - $rowTotalGirviDep['deposit_odisc_amt'];
                }

                $totalIntPaidOnAddPrin = $totalIntPaidOnAddPrin + $totalDepositIntMoneyGirvi;

                $totalIntPaid += $totalDepositIntMoneyGirvi;
                //
                if ($totalIntPaid == 0 || $totalIntPaid == NULL) {
                    $totalIntPaid = 0;
                }

                if ($startDate > $todayDateNum) {
                    $totalIntPaid = 0;
                }
//                if (date('d M Y', $startDate) == '29 Oct 1999') {
//                    echo '<br/>totalDepositPrincMoneyGirvi:' . $totalDepositPrincMoneyGirvi;
//                }
                //For Intelligent Password
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

                $qSelect = "SELECT SUM(girv_paid_iint) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' 
                    and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('Released','Auctioned')";
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//                echo '<br/>$qSelect=='.$qSelect;
                $totalIntPaid = $row['total_int_paid'];

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
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $receivedGirviPrincipal = $row['total_prin'];
                $receivedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Principal Amount from Additional Pricipal Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                        girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "'";
                } else {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                        girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "' and girv_prin_firm_id='$selFirmId'";
                }
                $qResultDDNewTotalAddedPrin = mysqli_query($conn, $qSelectDDNewTotalAddedPrin);
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
                    $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released','Auctioned')";
                } else {
                    $qSelect = "SELECT SUM(girv_total_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released','Auctioned') and girv_firm_id='$selFirmId'";
                }
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

                $releasedGirviPrincipal = $row['total_prin'];
                $releasedNoOfGirvi = $row['no_of_girvi'];

                //Get Total Released Principal Amount from Additional Pricipal Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' 
                        and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and 
                            girv_prin_upd_sts IN ('Released')";
                } else {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_total_amt) as total_prin_paid_amt FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' 
                        and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and 
                            girv_prin_upd_sts IN ('Released') and girv_prin_firm_id='$selFirmId'";
                }
                $qResultDDNewTotalAddedPrin = mysqli_query($conn, $qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalAddGirviPrinRel = $rowTotalNewPrinGirvi['total_prin_paid_amt'];

                $releasedGirviPrincipal += $totalAddGirviPrinRel;

                //Get Total Released Principal Amount from Money Deposit Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')"; //and girv_prin_firm_id IN ($strFrmId)
                } else {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_prin_amt) as deposit_prn_amt FROM girvi_money_deposit 
                        where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and 
                            girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_mondep_firm_id='$selFirmId'"; //and girv_prin_firm_id IN ($strFrmId)
                }
                $qResultTotalGirviDep = mysqli_query($conn, $qSelectTotalGirviDep);
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
//                if ($selFirmId == '' || $selFirmId == NULL) {
//                    $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released','Auctioned')";
//                } else {
//                    $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released','Auctioned') and girv_firm_id='$selFirmId'";
//                }
//                $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
//                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
//
//                $totalIntPaid = $row['total_int_paid'];
                //Get Total Principal Amount from Additional Pricipal Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' 
                        and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and 
                            girv_prin_upd_sts IN ('Released')";
                } else {
                    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' 
                        and girv_prin_upd_sts!='Deleted' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and 
                            girv_prin_upd_sts IN ('Released') and girv_prin_firm_id='$selFirmId'";
                }
                $qResultDDNewTotalAddedPrin = mysqli_query($conn, $qSelectDDNewTotalAddedPrin);
                $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

                $totalIntPaid += $rowTotalNewPrinGirvi['total_prin_paid_int'];

                $totalIntPaidOnAddPrin = $rowTotalNewPrinGirvi['total_prin_paid_int'];

                //Get Total Int Paid Amount from Money Deposit Table
                if ($selFirmId == '' || $selFirmId == NULL) {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt,SUM(girv_mondep_oint_amt) as deposit_oint_amt, SUM(girv_mondep_extra_amt) as deposit_extra_amt, SUM(girv_mondep_oextra_amt) as deposit_oextra_amt, SUM(girv_mondep_disc_amt) as deposit_disc_amt, SUM(girv_mondep_odisc_amt) as deposit_odisc_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "')"; //and girv_prin_firm_id IN ($strFrmId)
                } else {
                    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt,SUM(girv_mondep_oint_amt) as deposit_oint_amt, SUM(girv_mondep_extra_amt) as deposit_extra_amt, SUM(girv_mondep_oextra_amt) as deposit_oextra_amt, SUM(girv_mondep_disc_amt) as deposit_disc_amt, SUM(girv_mondep_odisc_amt) as deposit_odisc_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts!='Deleted' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_mondep_firm_id='$selFirmId'"; //and girv_prin_firm_id IN ($strFrmId)
                }
                $qResultTotalGirviDep = mysqli_query($conn, $qSelectTotalGirviDep);
                $rowTotalGirviDep = mysqli_fetch_array($qResultTotalGirviDep, MYSQLI_ASSOC);

                if($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                    $totalGirviRecInt += $rowTotalGirviDep['deposit_int_amt'];
                    $totalDepositIntMoneyGirvi = $totalGirviRecInt + $rowTotalGirviDep['deposit_extra_amt'] - $rowTotalGirviDep['deposit_disc_amt'];
                } else{
                    $totalGirviRecInt += $rowTotalGirviDep['deposit_oint_amt'];
                    $totalDepositIntMoneyGirvi = $totalGirviRecInt + $rowTotalGirviDep['deposit_oextra_amt'] - $rowTotalGirviDep['deposit_odisc_amt'];
                }

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
            <!--Start Code To Change Classes @Author:PRIYA19AUG13-->
            <!--Start Code To Change Width and classes @Author:PRIYA23AUG13-->
            <tr>
                <td align="center" valign="top" class="border-color-grey-rb border-color-grey-left width_16mm">
                    <div class="blackMess11ArialNormal grey-back"><?php 
                       if($nepaliDateIndicator == 'YES'){
                            $date = date('d m Y', $startDate);
                            $date_components = explode(' ', $date);

                                    $date_d = $date_components[0];
                                    $selMnth = $date_components[1];
                                    $date_y = $date_components[2];
                                    $date_ne = $nepali_date->get_nepali_date($date_y,$selMnth,$date_d);
                                    if($nepaliDateMonthFormat == 'displayInNumber'){
                                        echo $date_ne[d].' '.$date_ne[m].' '.$date_ne[y];
                                    }else{
                                         echo $date_ne[d].' '.$date_ne[m].' '.$date_ne[y];
                                    }
                                    
                        }else{
                    echo om_strtoupper(date('d M y', $startDate));
                        } ?></div><!--Year Changed Y to y @Author:PRIYA23AUG13-->
                </td>
                <td align="right" class="border-color-grey-rb lightBlue width_23mm">
                    <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo formatInIndianStyle($openingGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightBlue width_8mm">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $openingNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_23mm"  title="<?php echo 'Main Prin Rec: ' . ($receivedGirviPrincipal - $totalAdditionalGirviPrincipal) . '  Add Prin Rec: ' . $totalAdditionalGirviPrincipal; ?>">
                    <div class="blackMess11ArialNormal reddish spaceRight5"><?php echo formatInIndianStyle($receivedGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_8mm" >
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $receivedNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightYellow width_23mm" >
                    <div class="blackMess11ArialNormal orange spaceRight5"><?php echo formatInIndianStyle($totalAmtTillReceivedGirvi); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightYellow width_8mm">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $totalNoOfGirviTillReceivedGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightGreen width_23mm" title="<?php echo 'Main Prin Rel: ' . ($releasedGirviPrincipal - $totalAddGirviPrinRel) . '  Add Prin Rel: ' . $totalAddGirviPrinRel; ?>">
                    <div class="blackMess11ArialNormal green spaceRight5"><?php echo formatInIndianStyle($releasedGirviPrincipal); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightGreen width_8mm" >
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $releasedNoOfGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightVoilet width_23mm">
                    <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo formatInIndianStyle($totalAmtTillReleasedGirvi); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightVoilet width_8mm">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $totalNoOfGirviTillReleasedGirvi; ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_21mm"  title="<?php echo 'Main Int: ' . ($totalIntPaid - $totalIntPaidOnAddPrin) . '  Add Prin Int: ' . $totalIntPaidOnAddPrin; ?>">
                    <div class="blackMess11ArialNormal reddish spaceRight5"><?php echo formatInIndianStyle($totalIntPaid); ?></div>
                </td>
            </tr>

    <?php
    $totalFinalIntPaid = $totalFinalIntPaid + $totalIntPaid;
    $monthCounter++;
    $startDate = $startDate + 60 * 60 * 24;
}
?>
        <tr>
            <td align="center" valign="middle" class="border-color-grey-rb border-color-grey-left balanceSheetPrintDiv width_16mm">
                <div class="blackMess12Arial brown spaceRight5">TOTAL -</div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo formatInIndianStyle($initialOpeningGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo $initialOpeningNoOfGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo formatInIndianStyle($totalReceivedGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo $totalReceivedNoOfGirvi; ?></div>
            </td>
            <td align="right" valign="middle" class="border-color-grey-rb balanceSheetPrintDiv width_23mm"  colspan="2">
                <div class="blackMess12Arial brown spaceRight5"></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo formatInIndianStyle($totalReleasedGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo $totalReleasedNoOfGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_23mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo formatInIndianStyle($finalClosingGirviPrincipal); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_8mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo $finalClosingNoOfGirvi; ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_21mm">
                <div class="blackMess12Arial brown spaceRight5"><?php echo formatInIndianStyle($totalFinalIntPaid); ?></div>
            </td>
        </tr>
        <!--End Code To Change Width and classes @Author:PRIYA23AUG13-->
        <!--End Code To Change Classes @Author:PRIYA19AUG13-->
    </table>
</div>