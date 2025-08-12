<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar Ledger Book Details
 * **************************************************************************************
 * 
 * Created on Jun 21, 2013 5:36:31 PM
 *
 * @FileName: orbbuubd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: Expression project.name is undefined on line 12, column 20 in Templates/Scripting/EmptyPHP.php.
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
include 'ommprspc.php';

require_once 'system/omssopin.php';
?>
<div id="balanceSheetPrintDiv">
    <table border="1" cellspacing="0" cellpadding="1" width="100%" class="border-color-grey balanceSheetPrintDiv">
        <tr id="headerOfUdharTable">
            <td align="center" valign="top" class="border-color-grey" width="100px">
                <div class="main_link_brown">Date</div>
            </td>
            <td align="center" class="border-color-grey" width="209px">
                <div class="main_link_brown">Opening Balance</div>
            </td>
            <td align="center" class="border-color-grey" width="238px">
                <div class="main_link_brown">Udhaar</div>
            </td>
            <td align="center" class="border-color-grey" width="171px">
                <div class="main_link_brown">Udhaar Deposit</div>
            </td>
            <td align="center" class="border-color-grey" width="239px">
                <div class="main_link_brown">Final Total</div>
            </td>
        </tr>
        <?php
        /* $getYear = $_GET['balanceSheetYear'];
          $getMonth = $_GET['balanceSheetMonth'];

          if ($getYear == '' && $getMonth == '') {
          $getYear = $_POST['balanceSheetYear'];
          $getMonth = $_POST['balanceSheetMonth'];
          } */
        $mainGetYear = $getYear;

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
        $openingUdhaarBal = 0;
        $udhaarAmount = 0;
        $udhaarDepAmount = 0;
        $closingUdhaarAmount = 0;
        $totalUdhaarAmount = 0;
        $totalUdhaarDepAmount = 0;
        $finTotalUdhaar = 0;
        //Start Code To Calculate Udhaar Bal
        //Sel Opening Udhaar Amount
        $qSelUdhaarDetails = "SELECT SUM(udhaar_amt) as total_udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(udhaar_DOB,'%d %b %Y'))<$startDate and udhaar_firm_id IN ($strFrmId)";
        $resUdhaarDetails = mysqli_query($conn,$qSelUdhaarDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDetails);
        $rowUdhaarDetails = mysqli_fetch_array($resUdhaarDetails);
        $udhaarOpAmount = $rowUdhaarDetails['total_udhaar_amt'];

        //Sel Opening Udhaar Deposit Amount
        $qSelUdhaarDepDetails = "SELECT SUM(udhadepo_amt) as total_udhaar_dep_amt FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]'and UNIX_TIMESTAMP(STR_TO_DATE(udhadepo_DOB,'%d %b %Y'))<$startDate and udhadepo_firm_id IN ($strFrmId) and (udhadepo_EMI_status  IN ('Paid') or udhadepo_EMI_status IS NULL)";//add NULL condition @Author:SHRI29MAY15
        $resUdhaarDepDetails = mysqli_query($conn,$qSelUdhaarDepDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDepDetails);
        $rowUdhaarDepDetails = mysqli_fetch_array($resUdhaarDepDetails);
        $udhaarOpDepAmount = $rowUdhaarDepDetails['total_udhaar_dep_amt'];

        //Opening Bal
        $openingUdhaarBal = $udhaarOpAmount - $udhaarOpDepAmount;

        if ($monthCounter == 1) {
            $intitialUdhaarBal = $openingUdhaarBal;
        }
        while ($monthCounter <= $monthCounterLimit) {
            if ($monthCounter == 1) {
                $openingUdhaarBal = $openingUdhaarBal;
            } else {
                $openingUdhaarBal = $finTotalUdhaar;
            }
            //Sel Udhaar Amount
            $qSelUdhaarDetails = "SELECT SUM(udhaar_amt) as total_udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_DOB='" . date('d M Y', $startDate) . "'  and udhaar_firm_id IN ($strFrmId)";
            $resUdhaarDetails = mysqli_query($conn,$qSelUdhaarDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDetails);
            $rowUdhaarDetails = mysqli_fetch_array($resUdhaarDetails);
            $udhaarAmount = $rowUdhaarDetails['total_udhaar_amt'];
            //Sel Udhaar Dep Amount
            $qSelUdhaarDepDetails = "SELECT SUM(udhadepo_amt) as total_udhaar_dep_amt FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]'and udhadepo_DOB='" . date('d M Y', $startDate) . "' and udhadepo_firm_id IN ($strFrmId) and (udhadepo_EMI_status  IN ('Paid') or udhadepo_EMI_status IS NULL)";//add NULL condition @Author:SHRI29MAY15
            $resUdhaarDepDetails = mysqli_query($conn,$qSelUdhaarDepDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUdhaarDepDetails);
            $rowUdhaarDepDetails = mysqli_fetch_array($resUdhaarDepDetails);
            $udhaarDepAmount = $rowUdhaarDepDetails['total_udhaar_dep_amt'];

            if ($startDate > $todayDateNum) {
                $openingUdhaarBal = '-';
                $udhaarAmount = '-';
                $udhaarDepAmount = '-';
                $finTotalUdhaar = '-';
            }
            //Final Total
            $finTotalUdhaar = $openingUdhaarBal + $udhaarAmount - $udhaarDepAmount;

            //Closing Udhaar
            if (($startDate == $todayDateNum || $monthCounter == $monthCounterLimit) && $closingUdhaarAmount == 0) {
                $closingUdhaarAmount = $finTotalUdhaar;
            }
            //total Udhaar
            $totalUdhaarAmount += $udhaarAmount;
            //Total Udhaar Deposit
            $totalUdhaarDepAmount += $udhaarDepAmount;
            ?>
            <tr>
                <td align="center" valign="top" class="border-color-grey" width="100px">
                    <div class="blackMess11ArialNormal grey-back"><?php echo date('d M y', $startDate); ?></div>
                </td>
                <td align="right" class="border-color-grey lightBlue" width="210px">
                    <div class="blackMess11ArialNormal spaceRight5"> <?php echo $openingUdhaarBal; ?></div>                   
                </td>
                <td align="right" class="border-color-grey lightOrange"  width="239px">
                    <div class="blackMess11ArialNormal spaceRight5"> <?php echo $udhaarAmount; ?></div>                   
                </td>
                <td align="right" class="border-color-grey lightYellow"  width="171px">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $udhaarDepAmount; ?></div>                                                    
                </td>
                <td align="right" class="border-color-grey lightGreen"  width="238px">
                    <div class="blackMess11ArialNormal spaceRight5"><?php echo $finTotalUdhaar; ?></div>                                                    
                </td>
            </tr>
            <?php
            $monthCounter++;
            $startDate = $startDate + 60 * 60 * 24;
        }
        ?>
        <tr>
            <td align="right" valign="middle" class="border-color-grey">
                <div class="blackMess14Arial-BalanceSheet spaceRight5">TOTAL -</div>
            </td>
            <td align="right" class="border-color-grey">
                <div class="brownMess13Arial spaceRight5"> <?php echo $intitialUdhaarBal; ?></div>                   
            </td>
            <td align="right" class="border-color-grey">
                <div class="brownMess13Arial spaceRight5"><?php echo $totalUdhaarAmount; ?></div>                                                    
            </td>
            <td align="right" class="border-color-grey">
                <div class="brownMess13Arial spaceRight5"><?php echo $totalUdhaarDepAmount; ?></div>                                                    
            </td>
            <td align="right" class="border-color-grey">
                <div class="brownMess13Arial spaceRight5"><?php echo $closingUdhaarAmount; ?></div>                                                    
            </td>
        </tr>
    </table>
</div>