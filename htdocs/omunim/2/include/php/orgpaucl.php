<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgpaucl.php
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
<div id="girviAuctionedLoansListPanelNewDiv">
<div id="girviPanelTrId"></div>
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
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $loan_date_col = "girv_other_lang_DOB";
    $loanReleasedate = "girv_DOR";
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
    array('dt' => 'PRIN.AMT'),
    array('dt' => 'CUST NAME.'),
    array('dt' => 'MOB NO'),
    array('dt' => 'CITY'),
    array('dt' => 'EX. FIRM'),
    array('dt' => 'TR.FIRM'),
    array('dt' => 'S.DATE'),
    array('dt' => 'REL.DATE'),
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'girvi'; // Table Name
$_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
// DB Table Columns Parameters 
$dbColumnsArray = array(
    "CONCAT(COALESCE(girv_pre_serial_num, ''), CONVERT(girv_serial_num, CHAR(12)))",
    "girv_prin_amt",
    "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
    "t.user_mobile",
    "girv_cust_city",
    "f.firm_name",
    "m.firm_name",
    "$loan_date_col",
    "$loanReleasedate",
);
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
if ($staffId != '') {
$_SESSION['dtSumColumn'] = '';
}else{
$_SESSION['dtSumColumn'] = '1';
}
$_SESSION['dtDeleteColumn'] = '';
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "girv_id, girv_cust_id,girv_transfer_ml_id,girv_trans_firm_id,";
////start code to include all session@auth:ATHU29may17
//
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
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
$_SESSION['onclickColumnFunctionPara5'] = "transaction_firm_id";
$_SESSION['onclickColumnFunctionPara6'] = "transaction_post_vch_id";
//
// Delete Function Parameters
$_SESSION['deleteColumn'] = ""; // On which column
$_SESSION['deleteColumnId'] = "";
$_SESSION['deleteColumnValue'] = "";
$_SESSION['deleteColumnFunction'] = "";
$_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "";
$_SESSION['deleteColumnFunctionPara3'] = "";  //stsl_itst_id
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
// 
// Where Clause Condition 
$_SESSION['tableWhere'] = "girv_upd_sts IN ('Auctioned') and girv_firm_id IN ($strFrmId)";
// 
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
        . "LEFT JOIN user AS t ON girv_transfer_ml_id=t.user_id "
        . "LEFT JOIN firm AS m ON girv_trans_firm_id=m.firm_id";
// 
// Data Table Main File
include 'omdatatables.php';
?>
<?php
$allNoticePrint = "SELECT girv_id  FROM girvi where girv_upd_sts IN ('Auctioned') and girv_firm_id IN ($strFrmId)";
$resallNoticePrint = mysqli_query($conn, $allNoticePrint);
$countallNoticePrint = mysqli_num_rows($resallNoticePrint);
$column = array();
$i = 0;
while ($result = mysqli_fetch_array($resallNoticePrint, MYSQLI_ASSOC)) {
    $column[$i] = intval($result['girv_id']);
    $i++;
}
?>
<table border="0" cellspacing="5" cellpadding="5" class="noPrint"> 
    <tr>
        <td align = "center" class = "noPrint">
            <div id="a4SheetsPrintButtonPrinting" style="visibility:hidden;"><h2>Printing....</h2></div>
            <div id="a4SheetsPrintButtonDiv">
                <a style = "cursor: pointer;"
                   onclick = "printDirectAllNotice('<?php echo json_encode($column); ?>')">
                    <img src = "images/printer32.png" alt = 'Print' title = 'Print'
                         width = "32px" height = "32px" />
                </a>
            </div>

        </td>
    </tr>
</table>
<div id="AllNoticeDivs" style="display:none;"></div>
<div>
    <h1>PRINT ALL AUCTION  NOTICE</h1>
</div>
<iframe id='ifrmPr' style="width:0px; height:0px; border: none; background:transparent"></iframe>
</div>