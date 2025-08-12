<?php

/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on 09 MAY,2019 5:15:33 PM
 *
 * @FileName: orgptpexglint.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 2.6.100
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
<?php

/* * *********** Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
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
/* * *********** End Code To GET Firm Details ********* */
$noOfMonths = $_POST['expMonths'];
if ($noOfMonths == '') {
    $noOfMonths = $_GET['expMonths'];
}
if ($noOfMonths == '') {
    $noOfMonths = 11;
}
$noOfMonthsTimeStamp = ((365 * $noOfMonths) / 12) * 24 * 60 * 60;
$todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
$todayDateNum = strtotime($todayDate);
$todayDateNum = $todayDateNum + 60 * 60 * 24;
$expiredDate = $todayDateNum - $noOfMonthsTimeStamp;
$queryString = "girv_time_period < ((($todayDateNum - UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y')))/(60 * 60 * 24))/30) and girv_time_period!='' and";//value changed @Author:PRIYA09JAN15
include 'omdatatablesUnset.php';
//Data Table Main Columns
$dataTableColumnsFields = array(
    array('dt' => 'S.NO.'),
    array('dt' => 'PRIN.AMT'),
    array('dt' => 'I PRIN.AMT'),
    array('dt' => 'CUSTOMER NAME'),
    array('dt' => 'MOB NO'),
    array('dt' => 'CITY'),
    array('dt' => 'EX.FIRM'),
    array('dt' => 'TIME PERIOD'),
    array('dt' => 'GIRVI DATE')
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'girvi'; // Table Name
$_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
// DB Table Columns Parameters 
$dbColumnsArray = array(
    "CONCAT(girv_pre_serial_num, CONVERT(girv_serial_num, CHAR(12)))",
    "girv_main_prin_amt",
    "girv_main_prin_amt_int",
    "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
    "t.user_mobile",
    "girv_cust_city",
    "f.firm_name",
    "girv_time_period",
    "STR_TO_DATE(girv_new_DOB,'%d %b %Y')"
);
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
$_SESSION['dtSumColumn'] = '1,2';
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
$_SESSION['onclickColumn'] = "CONCAT(girv_pre_serial_num, CONVERT(girv_serial_num, CHAR(12)))"; // On which column
$_SESSION['onclickColumnId'] = "girv_id";
$_SESSION['onclickColumnValue'] = "girv_id";
$_SESSION['onclickColumnFunction'] = "getGirviInfoPopUpInt";
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
// 
// Where Clause Condition 
$_SESSION['tableWhere'] = "$queryString girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId)";
//  order by STR_TO_DATE(girv_new_DOB,'%d %b %Y') desc,girv_serial_num desc LIMIT $perOffset, $rowsPerPage"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
                          . "LEFT JOIN user AS t ON girv_cust_id=t.user_id ";
// 
// Data Table Main File
include 'omdatatables.php';
?>