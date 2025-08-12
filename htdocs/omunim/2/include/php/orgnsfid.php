<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgnsfid.php
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
?>
<?php
$getYear = $_GET['year'];
$getMonth = $_GET['month'];
$firmId = $_GET['firmId'];

if ($getYear == '' && $getMonth == '') {
    $getYear = $_POST['year'];
    $getMonth = $_POST['month'];
    $firmId = $_GET['firmId'];
}

if (!$getMonth) {
    $getMonth = date(M);
}
if (!$getYear) {
    $getYear = date(Y);
}
if (!isset($_GET['firmId'])) {
    $firmId = $_SESSION['setFirmSession'];
}
?>
<?php
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

$startDate = '01 ' . $todayMonth . ' ' . $todayYear;//@AUTHOR: SANDY07JAN14

$startDate = strtotime($startDate);

$monthCounter = 1;
$monthCounterLimit = 0;

//START Code to fix counter for Month
$arrLeapYear = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$arrYear = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

if (($todayYear % 4) == 0) {
    $monthCounterLimit = $arrLeapYear[$todayMM - 1];
} else {
    $monthCounterLimit = $arrYear[$todayMM - 1];
}
//END code to fix Month Counter

while ($monthCounter <= $monthCounterLimit) {

    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    //$qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $resPubFirmCount = mysqli_query($conn,$qSelFirmCount);
    if ($firmId != NULL) {
        $strFrmId = $firmId;
    } else {
        $strFrmId = '0';

//Set String for Public Firms

        while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
        }
    }
////Interest Paid on Girvi On Given Date
    $qSelect = "SELECT SUM(girv_paid_int) as total_int_paid FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOR='" . date('d M Y', $startDate) . "' and girv_upd_sts IN ('Released','Auctioned')and "
            . "girv_firm_id IN ($strFrmId) ";//Auctioned status added @Author:PRIYA10APR15
    $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $totalIntPaid = $row['total_int_paid'];

//Get Total Principal Amount from Additional Pricipal Table
    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_paid_int) as total_prin_paid_int FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_prin_DOR IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_prin_upd_sts IN ('Released')and girv_prin_firm_id IN ($strFrmId)";
    $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
    $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

    $totalIntPaid += $rowTotalNewPrinGirvi['total_prin_paid_int'];

    $totalIntPaidOnAddPrin = $rowTotalNewPrinGirvi['total_prin_paid_int'];

//Get Total Int Paid Amount from Money Deposit Table
    $qSelectTotalGirviDep = "SELECT SUM(girv_mondep_int_amt) as deposit_int_amt FROM girvi_money_deposit where girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_date IN('" . date('d M Y', $startDate) . "','" . date('d M Y', $startDate) . "') and girv_mondep_firm_id IN ($strFrmId)"; //and girv_prin_firm_id IN ($strFrmId)
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
    //Start code to add data into PHP Chart Table
    if ($monthCounter == '1') {
        $queryItem = "DELETE FROM pchart";

        if (!mysqli_query($conn,$queryItem)) {
            die('Error: ' . mysqli_error($conn));
        }
    }

    $queryItem = "INSERT INTO pchart (
		pchart_xaxis, pchart_yaxis, pchart_counter, 
		pchart_xaxis_title, pchart_yaxis_title,
		pchart_series_desc, pchart_abscissa, pchart_comm,
		pchart_ent_dat) 
		VALUES (
		'$totalIntPaid','$monthCounter', '$monthCounter',
		'Interest','Months',
                'Months', 'Months', '',
		$currentDateTime)";

    if (!mysqli_query($conn,$queryItem)) {
        die('Error: ' . mysqli_error($conn));
    }
    //End code to add data into PHP Chart Table

    $monthCounter++;
    $startDate = $startDate + 60 * 60 * 24;
}
$pChartFileName = date("Y_m_d_H_i_s");
include 'ompcmain.php';
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td colspan="3"><br />
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center">
            <img src="<?php echo $documentRootBSlash; ?>/include/php/temp/<?php echo $pChartFileName; ?>.png" alt="Monthly Interest Analysis" />
        </td>
    </tr>
</table>