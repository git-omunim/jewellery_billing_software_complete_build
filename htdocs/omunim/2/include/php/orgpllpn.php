<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgpllpn.php
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
<div id="girviActiveLoansListPanelNewDiv">
<div id="girviPanelTrId"></div>
<!--start code for implemting active loanlist @ATHU3MAY17-->
<table border="0" cellspacing="0" cellpadding="5" align="center" width="100%"><!------noPrint removed @Author:PRIYA29MAY14----------->
    <tr>
        <td valign="middle" align="left" width="18px">
            <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/active.png" alt=""  onLoad="setScrollIdFun('girviPanelTrId')"/></div>
        </td>
        <td valign="middle" align="left">
            <div class="main_link_green"><b>ACTIVE LOANS LIST</b></div><!--Change @AUTHOR: SANDY29DEC13---->
        </td>
    </tr>
</table>
<?php
/************ Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $INT = 'girv_pl_total_final_intrest';
    $AMT = 'girv_pl_total_amt';
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    $INT = 'girv_pl_total_final_iintrest';
    $AMT = 'girv_pl_total_iamt';
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
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $loan_date_col = "STR_TO_DATE(girv_other_lang_DOB,'%d-%m-%Y')";
} else {
    $loan_date_col = "STR_TO_DATE(girv_new_DOB,'%d %b %Y')";
}
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
include 'omdatatablesUnset.php';
//Data Table Main Columns
$dataTableColumnsFields = array(
    array('dt' => 'S.NO.'),
    array('dt' => 'S.DATE'),
    array('dt' => 'PRIN.AMT'),
    array('dt' => 'TOTAL PRIN'),
    array('dt' => 'INTEREST'),
    array('dt' => 'TOTAL AMT'),
    array('dt' => 'CUST NAME'),
    array('dt' => 'MOB NO'),
    array('dt' => 'CITY'),
    array('dt' => 'FIRM'),
    array('dt' => 'ALL LOAN'),
    array('dt' => 'OTH INFO'),//OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
    array('dt' => 'LOCATION'),//LOCATION INFORMATION COLUMN ADDED @AUTHOR:MARUTI-31MAY2022
    array('dt' => 'ML NAME'),
    array('dt' => 'TRANSFER AMT')
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'girvi'; // Table Name
$_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
// DB Table Columns Parameters 
if ($staffId != '') {
    $dbColumnsArray = array(
        "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
        "$loan_date_col",
        "CONCAT(SUBSTRING(CAST(girv_main_prin_amt AS CHAR), 1, 1),REPEAT('X', LENGTH(CAST(girv_main_prin_amt AS CHAR)) - 1))",
        "CONCAT(SUBSTRING(CAST(girv_pl_total_prin_amt AS CHAR), 1, 1),REPEAT('X', LENGTH(CAST(girv_pl_total_prin_amt AS CHAR)) - 1))",
        "CONCAT(SUBSTRING(CAST($INT AS CHAR), 1, 1),REPEAT('X', LENGTH(CAST($INT AS CHAR)) - 1))",
        "CONCAT(SUBSTRING(CAST($AMT AS CHAR), 1, 1),REPEAT('X', LENGTH(CAST($AMT AS CHAR)) - 1))",
        "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
        "CONCAT(SUBSTRING(CAST(t.user_mobile AS CHAR), 1, 2),REPEAT('X', LENGTH(CAST(t.user_mobile AS CHAR)) - 4),SUBSTRING(CAST(t.user_mobile AS CHAR), 9, 10))",
        "girv_cust_city",
        "f.firm_name",
        "girv_type",
        "girv_comm",//OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
        "girvi_location",  //LOCATION INFORMATION COLUMN ADDED @AUTHOR:MARUTI-31MAY2022
        "CONCAT(m.user_fname, ' ', m.user_lname)",
        "gt.gtrans_prin_amt",
    );
} else {
    $dbColumnsArray = array(
        "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
        "$loan_date_col",
        "girv_main_prin_amt",
        "girv_pl_total_prin_amt",
        "$INT",
        "$AMT",
            "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
        "t.user_mobile",
        "girv_cust_city",
        "f.firm_name",
        "girv_type",
        "girv_comm",//OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
        "girvi_location",  //LOCATION INFORMATION COLUMN ADDED @AUTHOR:MARUTI-31MAY2022
        "CONCAT(m.user_fname, ' ', m.user_lname)",
        "gt.gtrans_prin_amt",
    );
}
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
if ($staffId != '') {
$_SESSION['dtSumColumn'] = '';
}else{
    $_SESSION['dtSumColumn'] = '2,3,4,5';
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
// 
// Where Clause Condition 
$_SESSION['tableWhere'] = "girv_upd_sts IN ('New','Updated','ReleaseCart') and (girv_firm_id IN ($strFrmId) or girv_trans_firm_id IN($strFrmId)) ";
// girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId)
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
        . "LEFT JOIN user AS t ON t.user_id=girv_cust_id LEFT JOIN user AS m ON m.user_id=girv_transfer_ml_id  LEFT JOIN girvi_transfer AS gt ON gtrans_id=girv_transfer_id ";
// 
// Data Table Main File
include 'omdatatables.php';
?>
</div>