<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgpregl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
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
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<!--ADDED CODE FOR PRINT BUTTON NOT WORKING ISSUE @AUTHOR:PRIYANKA-17FEB2023-->
<div id="girviReleasedLoansListPanelNewDiv">
<div id="girviPanelTrId"></div>
<?php
/************ Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
$ROI = 'girv_ROI';
$DISC = "girv_discount_amt";
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $ROI = 'girv_ROI';
    $INT = 'girv_paid_oint';
    $AMT = 'girv_paid_oamt';
    $DISC = 'girv_discount_oamt';
   
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    $ROI = 'girv_IROI';
    $INT = 'girv_paid_iint';
    $AMT = 'girv_paid_iamt';
    $DISC = 'girv_discount_iamt';
}
if ($INT == NULL || $INT == ''){
     $INT = 'girv_paid_int';
     $AMT = 'girv_paid_amt';
     $DISC = 'girv_discount_amt';
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $loan_date_col = "STR_TO_DATE(girv_other_lang_DOB, '%e-%c-%Y')";
    $loanReleasedate = "STR_TO_DATE(girv_DOR, '%e %c %Y')";
} else {
    $loan_date_col = "STR_TO_DATE(girv_DOB,'%d %b %Y')";
    $loanReleasedate = "STR_TO_DATE(girv_DOR,'%d %b %Y')";
}
/************ End Code To GET Firm Details ********* */
//Data Table Main Columns
include 'omdatatablesUnset.php';
//
$dataTableColumnsFields = array(
    array('dt' => 'S.NO.'),
    array('dt' => 'REL.NO.'),
    array('dt' => 'PRIN.AMT'),
    array('dt' => 'TOTAL PRIN'),
    array('dt' => 'ROI'),
    array('dt' => 'INTEREST.'),
    array('dt' => 'DISC'),
    array('dt' => 'TOTAL AMT'),
    array('dt' => 'CUSTOMER NAME'),
    array('dt' => 'MOB NO'),
    array('dt' => 'CITY'),
    array('dt' => 'EX.FIRM'),
    array('dt' => 'TR.FIRM'),
    array('dt' => 'S.DATE'),
    array('dt' => 'R.DATE')
);
//
//
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'girvi'; // Table Name
$_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
// DB Table Columns Parameters 
$dbColumnsArray = array(
    "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
    "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
    "girv_main_prin_amt",
    "CAST(girv_total_amt AS DECIMAL(20,2))",
    "$ROI",
    "CAST($INT AS DECIMAL(20,2))",
    "IFNULL($DISC,0)",
    "CAST($AMT AS DECIMAL(20,2))",
    "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
    "t.user_mobile",
    "girv_cust_city",
    "f.firm_name",
    "m.firm_name",
    "$loan_date_col",
    "$loanReleasedate"
);
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
if ($staffId != '') {
$_SESSION['dtSumColumn'] = '';
}else{
$_SESSION['dtSumColumn'] = '2,3,5,6,7';
}
$_SESSION['dtDeleteColumn'] = '';
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "girv_id, girv_cust_id,girv_transfer_ml_id,";
////start code to include all session@auth:ATHU29may17
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))"; // On which column
$_SESSION['onclickColumnId'] = "girv_id";
$_SESSION['onclickColumnValue'] = "girv_id";
$_SESSION['onclickColumnFunction'] = "getGirviInfoPopUp";
$_SESSION['onclickColumnFunctionPara1'] = "girv_cust_id";
$_SESSION['onclickColumnFunctionPara2'] = "girv_id";
$_SESSION['onclickColumnFunctionPara3'] = "";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";
//
// Delete Function Parameters
$_SESSION['deleteColumn'] = ""; // On which column
$_SESSION['deleteColumnId'] = "";
$_SESSION['deleteColumnValue'] = "";
$_SESSION['deleteColumnFunction'] = "";
$_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "";
$_SESSION['deleteColumnFunctionPara3'] = "";
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
// Where Clause Condition 
$_SESSION['tableWhere'] = "girv_upd_sts IN ('Released') and girv_firm_id IN ($strFrmId)";
// 
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
        . "LEFT JOIN user AS t ON girv_transfer_ml_id=t.user_id "
        . "LEFT JOIN firm AS m ON girv_trans_firm_id=m.firm_id ";
// 
// Data Table Main File
include 'omdatatables.php';
?>
</div>