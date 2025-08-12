<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgnsfnla.php
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
if ($getYear == '' && $getMonth == '' && $firmId = ' ') {
    $getYear = $_POST['year'];
    $getMonth = $_POST['month'];
    $firmId = $_POST['firmId'];
}
//echo '$firmId'.$firmId;
if (!$getMonth) {
    $getMonth = date(M);
}
if (!$getYear) {
    $getYear = date(Y);
}
if (!isset($_GET['firmId'])) {
    $firmId = $_SESSION['setFirmSession'];
}
//echo '$firmId'.$firmId;
?>
<?php
$mainGetYear = $getYear;
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

/*$finYear = 0;

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
}comment @AUTHOR: SANDY07JAN14*/

$startDate = '01 ' . $todayMonth . ' ' . $todayYear;//@AUTHOR: SANDY07JAN14

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

while ($monthCounter <= $monthCounterLimit) {

    $totalReceivedGirviPrincipal = 0;
    $receivedGirviPrincipal = 0;
    $receivedNoOfGirvi = 0;


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

//Recieved Girvi On Given Date
    $qSelect = "SELECT SUM(girv_main_prin_amt) as total_prin, COUNT(girv_id) as no_of_girvi FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_DOB='" . date('d M Y', $startDate) . "' and girv_firm_id IN ($strFrmId)";
    $qResult = mysqli_query($conn,$qSelect) or die("Error: " . mysqli_error($conn) . " with query " . $qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $receivedGirviPrincipal = $row['total_prin'];
    $receivedNoOfGirvi = $row['no_of_girvi'];

    //Get Total Principal Amount from Additional Pricipal Table
    $qSelectDDNewTotalAddedPrin = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_prin_DOB='" . date('d M Y', $startDate) . "' and girv_prin_firm_id IN ($strFrmId)";
    $qResultDDNewTotalAddedPrin = mysqli_query($conn,$qSelectDDNewTotalAddedPrin);
    $rowTotalNewPrinGirvi = mysqli_fetch_array($qResultDDNewTotalAddedPrin, MYSQLI_ASSOC);

    $totalAdditionalGirviPrincipal = $rowTotalNewPrinGirvi['total_prin'];

    $receivedGirviPrincipal += $totalAdditionalGirviPrincipal;

    //
    $totalReceivedGirviPrincipal += $receivedGirviPrincipal;
    $totalReceivedNoOfGirvi += $receivedNoOfGirvi;
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
		'$totalReceivedGirviPrincipal','$monthCounter', '$monthCounter',
		'Girvi Received','GirviReceived',
                'GirviReceived', 'GirviReceived', '',
		$currentDateTime)";

    if (!mysqli_query($conn,$queryItem)) {
        die('Error: ' . mysqli_error($conn));
    }
    //End code to add data into PHP Chart Table
    $monthCounter++;
    $startDate = $startDate + 60 * 60 * 24;
}
$pChartFileName = date("Y_m_d_H_i_s");
//include 'ompcmain.php';
include 'ompcmain.php';
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td colspan="3"><br />
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center">
            <img src="<?php echo $documentRootBSlash; ?>/include/php/temp/<?php echo $pChartFileName; ?>.png" alt="New Loans Analysis" />
        </td>
    </tr>
</table>