<?php
/*
 * **************************************************************************************
 * @tutorial:  Intrest Balance Sheet Details
 * **************************************************************************************
 * 
 * Created on Feb 18, 2014 3:35:20 PM
 *
 * @FileName: orbbinbd.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
include_once 'ommpfndv.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<div id="balanceSheetPrintDiv">
    <table border="0" cellspacing="0" cellpadding="0" width="100%"> 
        <tr id="headerTable">
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%" class="balanceSheetPrintDiv">
                    <tr>
                        <td align="center" valign="top" rowspan="2" class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="ff_calibri fs_13 fw_b brown">DATE</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">OPENING BALANCE</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">RECEIVED INTEREST</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">INTEREST PAID</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">FINAL TOTAL</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" id="exportexldiv">
        <tr id="headerTable" style="display:none">
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%" class="balanceSheetPrintDiv">
                    <tr>
                        <td align="center" valign="top" class="border-color-grey-rbu border-color-grey-left width_16mm">
                            <div class="ff_calibri fs_13 fw_b brown">DATE</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">OPENING BALANCE</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">RECEIVED INTEREST</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">INTEREST PAID</div>
                        </td>
                        <td align="center" class="border-color-grey-rbu width_46mm">
                            <div class="ff_calibri fs_13 fw_b brown ">FINAL TOTAL</div>
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
            $finStartDate = '16 JULY' . ' ' . $startyear;
        } else {
            $finStartDate = '01 APR' . ' ' . $finStartYear;
        }
        $finStartDate = strtotime($finStartDate);
        //echo '<br/>$finStartDate:' . $finStartDate;
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
        //END code to fix Month Counter
        $openingTotalGirviRecInt = 0;
        $openingTotalGirviPaidInt = 0;
        $openingGirviInt = 0;
        $totalGirviRecInt = 0;
        $totalGirviPaidInt = 0;
        $totalIntAmt = 0;
        $openingFinGirviInt = 0;
        $totalFinGirviRecInt = 0;
        $totalFinGirviPaidInt = 0;
        $totalFinIntAmt = 0;
        //Start Code To Select FirmId
//        if ($selFirmId != '') {
//            $strFrmId = $selFirmId;
//        } else {
//            $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
//        }
        include 'omfrpsck.php';
        //End Code To Select FirmId
        //Get Total Principal Amount from Girvi Table
        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
            $qSelect = "SELECT SUM(girv_paid_iint) as total_paid_int FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                  girv_upd_sts IN ('Released','Auctioned') and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))>=$finStartDate "
                    . "and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_firm_id IN ($strFrmId)"; //Auctioned status added @Author:PRIYA10APR15
        } else {
            $qSelect = "SELECT SUM(girv_paid_oint) as total_paid_int FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                  girv_upd_sts IN ('Released','Auctioned') and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))>=$finStartDate "
                    . "and UNIX_TIMESTAMP(STR_TO_DATE(girv_DOR,'%d %b %Y'))<$startDate and girv_firm_id IN ($strFrmId)";
        }
        $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
        $openingTotalGirviRecInt = $row['total_paid_int'];
        //echo 'OP:'.$qSelect;
        // Start Code to Get Total Principal Amount from Additional Pricipal Table
        $qSelect = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                 girv_prin_upd_sts!='Deleted' and girv_prin_upd_sts IN ('Released') and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))>=$finStartDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_prin_prin_DOR,'%d %b %Y'))<$startDate and girv_prin_firm_id IN ($strFrmId)";
        $qResult = mysqli_query($conn, $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
        $totalOpenPrinGirviInt = $row['total_prin_paid_int'];
        $openingTotalGirviRecInt += $totalOpenPrinGirviInt;
        // End Code to Get Total Principal Amount from Additional Pricipal Table

        $qSelect = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt,SUM(girv_mondep_oint_amt) as deposit_oint_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                girv_mondep_upd_sts!='Deleted' and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))>=$finStartDate and UNIX_TIMESTAMP(STR_TO_DATE(girv_mondep_date,'%d %b %Y'))<$startDate  and girv_mondep_firm_id IN ($strFrmId) ";
        $qResult = mysqli_query($conn, $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
        //
        if($_SESSION['sessionIgenType'] == $globalOwnIPass) {
           $totalOpenDepGirviInt = $row['deposit_int_amt'];
        } else{
           $totalOpenDepGirviInt = $row['deposit_oint_amt'];
        }
        $openingTotalGirviRecInt += $totalOpenDepGirviInt;
        
        $qSelect = "SELECT SUM(gtrans_paid_int) as total_trans_rel_int FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and 
        UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOR,'%d %b %Y'))>=$finStartDate and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOR,'%d %b %Y'))<$startDate and gtrans_firm_id IN ($strFrmId) and gtrans_exist_firm_id IN ($strTransFirmId) and"
                . " gtrans_upd_sts IN ('Released') and gtrans_firm_type IS NULL";
        $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
        $openingTotalGirviPaidInt = $row['total_trans_rel_int'];

        $qSelect = "SELECT SUM(ml_trans_mondep_int_amt) as ml_total_dep_int FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and
        UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))>=$finStartDate and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))<$startDate and ml_trans_mondep_firm_id IN ($strFrmId) and ml_trans_upd_sts!='Deleted'";
        $qResult = mysqli_query($conn, $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
        $openingTotalGirviPaidInt += $row['ml_total_dep_int'];

        $qSelect = "SELECT SUM(ml_paid_int) as ml_total_rel_int FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and
        UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))>=$finStartDate and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$startDate and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released')";
        $qResult = mysqli_query($conn, $qSelect);
        $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
        $openingTotalGirviPaidInt += $row['ml_total_rel_int'];

        $openingGirviInt = $openingTotalGirviRecInt - $openingTotalGirviPaidInt;

        if ($monthCounter == 1) {
            $openingFinGirviInt = $openingGirviInt;
        }

        while ($monthCounter <= $monthCounterLimit) {
            if ($monthCounter == 1) {
                $openingGirviInt = $openingGirviInt;
            } else {
                $openingGirviInt = $totalIntAmt;
            }
            if ($startDate > $todayDateNum) {
                $openingGirviInt = 0;
            }
            //Get Total Principal Amount from Girvi Table
            if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {     //Intilligent & Ordinary Password @AUTHOR:BAJRANG:2-JUL-18
                $qSelect = "SELECT SUM(girv_paid_iint) as total_paid_int FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                  girv_upd_sts IN ('Released','Auctioned') and girv_DOR='" . date('d M Y', $startDate) . "'  and girv_firm_id IN ($strFrmId)";
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
                $totalGirviRecInt = $row['total_paid_int'];
            } else {
                $qSelect = "SELECT SUM(girv_paid_oint) as total_paid_int FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                  girv_upd_sts IN ('Released','Auctioned') and girv_DOR='" . date('d M Y', $startDate) . "'  and girv_firm_id IN ($strFrmId)";
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
                $totalGirviRecInt = $row['total_paid_int'];
//                echo '$totalGirviRecInt22='.$totalGirviRecInt;
            }

            if ($totalGirviRecInt == '' || $totalGirviRecInt == NULL) {
                $qSelect = "SELECT SUM(girv_paid_int) as total_paid_int FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and 
                  girv_upd_sts IN ('Released','Auctioned') and girv_DOR='" . date('d M Y', $startDate) . "'  and girv_firm_id IN ($strFrmId)";
                $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
                $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
                $totalGirviRecInt = $row['total_paid_int'];
//                echo '$totalGirviRecInt22='.$totalGirviRecInt.'<br />';
            }

            //echo '<br/>$qSelect:' . $qSelect;
            // Start Code to Get Total Principal Amount from Additional Pricipal Table
            $qSelect = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int,SUM(girv_prin_paid_oint) as total_prin_paid_oint FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and 
                 girv_prin_upd_sts!='Deleted' and girv_prin_upd_sts IN ('Released') and girv_prin_prin_DOR='" . date('d M Y', $startDate) . "' and girv_prin_firm_id IN ($strFrmId)";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                $totalGirviRecInt += $row['total_prin_paid_int'];
            } else{
                $totalGirviRecInt += $row['total_prin_paid_oint'];
            }
            //   echo '<br/>totalGirviRecInt2:' . $totalGirviRecInt;
            //   echo '$totalGirviRecInt66==='.$totalGirviRecInt.'<br />';
            // End Code to Get Total Principal Amount from Additional Pricipal Table
            $qSelect = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt,SUM(girv_mondep_oint_amt) as deposit_oint_amt,SUM(girv_mondep_disc_amt) as deposit_disc_amt,"
                    . "SUM(girv_mondep_extra_amt) as deposit_extra_amt, SUM(girv_mondep_oextra_amt) as deposit_oextra_amt, SUM(girv_mondep_odisc_amt) as deposit_odisc_amt "
                    . "FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and 
                girv_mondep_upd_sts!='Deleted' and girv_mondep_date='" . date('d M Y', $startDate) . "' and girv_mondep_firm_id IN ($strFrmId) ";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            //
            if($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                $totalGirviRecInt += $row['deposit_int_amt'];
                $totalGirviRecInt = $totalGirviRecInt + $row['deposit_extra_amt'] - $row['deposit_disc_amt'];
            } else{
                $totalGirviRecInt += $row['deposit_oint_amt'];
                $totalGirviRecInt = $totalGirviRecInt + $row['deposit_oextra_amt'] - $row['deposit_odisc_amt'];
            }
//            echo '<br/>totalGirviRecInt3:' . $totalGirviRecInt;

            $qSelect = "SELECT SUM(gtrans_paid_int) as total_trans_rel_int FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and 
            gtrans_DOR='" . date('d M Y', $startDate) . "' and gtrans_firm_id IN ($strFrmId) and gtrans_exist_firm_id IN ($strTransFirmId) and"
                    . " gtrans_upd_sts IN ('Released') and gtrans_firm_type IS NULL";
            $qResult = mysqli_query($conn, $qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            $totalGirviPaidInt = $row['total_trans_rel_int'];

            $qSelect = "SELECT SUM(ml_trans_mondep_int_amt) as ml_total_dep_int FROM ml_transaction where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and
            ml_trans_mondep_date='" . date('d M Y', $startDate) . "' and ml_trans_mondep_firm_id IN ($strFrmId) and ml_trans_upd_sts!='Deleted'";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            $totalGirviPaidInt += $row['ml_total_dep_int'];

            $qSelect = "SELECT SUM(ml_paid_int) as ml_total_rel_int FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and
            ml_DOR='" . date('d M Y', $startDate) . "' and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released')";
            $qResult = mysqli_query($conn, $qSelect);
            $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
            $totalGirviPaidInt += $row['ml_total_rel_int'];

            $totalIntAmt = $openingGirviInt + $totalGirviRecInt - $totalGirviPaidInt;

            $totalFinGirviRecInt += $totalGirviRecInt;
            $totalFinGirviPaidInt += $totalGirviPaidInt;

            if (($startDate == $todayDateNum || $monthCounter == $monthCounterLimit) && $totalFinIntAmt == 0) {
                $totalFinIntAmt = $totalIntAmt;
            } else if ($startDate > $todayDateNum) {
                $totalIntAmt = 0;
            }
            ?>
            <tr>
                <td align="center" valign="top" class="border-color-grey-rb border-color-grey-left width_16mm">
                    <div class="ff_calibri fs_12 grey-back"><?php
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
                        }
                        ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightBlue width_46mm">
                    <div class="ff_calibri fs_12 blueFont spaceRight5"><?php echo formatInIndianStyle($openingGirviInt); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightOrange width_46mm" >
                    <div class="ff_calibri fs_12 reddish spaceRight5"><?php echo formatInIndianStyle($totalGirviRecInt); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightYellow width_46mm" >
                    <div class="ff_calibri fs_12 orange spaceRight5"><?php echo formatInIndianStyle($totalGirviPaidInt); ?></div>
                </td>
                <td align="right" class="border-color-grey-rb lightGreen width_46mm">
                    <div class="ff_calibri fs_12 green spaceRight5"><?php echo formatInIndianStyle($totalIntAmt); ?></div>
                </td>
            </tr>
            <?php
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
            <td align="center" valign="middle" class="border-color-grey-rb border-color-grey-left balanceSheetPrintDiv width_16mm">
                <div class="ff_calibri fs_13 fw_b brown spaceRight5">TOTAL -</div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_46mm">
                <div class="ff_calibri fs_13 fw_b brown spaceRight5"><?php echo formatInIndianStyle($openingFinGirviInt); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_46mm">
                <div class="ff_calibri fs_13 fw_b brown spaceRight5"><?php echo formatInIndianStyle($totalFinGirviRecInt); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_46mm">
                <div class="ff_calibri fs_13 fw_b brown spaceRight5"><?php echo formatInIndianStyle($totalFinGirviPaidInt); ?></div>
            </td>
            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_46mm">
                <div class="ff_calibri fs_13 fw_b  brown spaceRight5"><?php echo formatInIndianStyle($totalFinIntAmt); ?></div>
            </td>
        </tr>
    </table>
</div>