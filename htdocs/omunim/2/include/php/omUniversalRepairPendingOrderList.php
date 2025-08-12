<?php
/*
 * ***************************************************************************************
 * @tutorial: UNIVERSAL REPAIR PENDING ORDER LIST @PRIYANKA-07APR2021
 * **************************************************************************************
 * Created on 07 APR, 2021 10:57:20 PM
 *
 * @FileName: omUniversalRepairPendingOrderList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 2.7.45
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-07APR2021
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<div id="universalAssignOrderDiv">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td valign="middle" align="left" width="18px">
            <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/repair32.png" alt="REPAIR ORDER" /></div>
        </td>
        <td valign="middle" align="left">
            <div class="main_link_orange16">REPAIR ORDER LIST<span class="textLabel14CalibriGreyMiddle">
                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                </span>
            </div>
        </td>
    </tr>
</table>
<?php
/************ Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @PRIYANKA-07APR2021
    $selFirmId = $_SESSION['setFirmSession'];
}
//
if ($custId == NULL || $custId == '')
    $custId = $_REQUEST['custId'];
//
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
//
include 'omdatatablesUnset.php';
//
//Data Table Main Columns
$dataTableColumnsFields = array(
    array('dt' => 'DATE'),
    array('dt' => 'CUSTOMER'),
    array('dt' => 'DETAILS'),
    array('dt' => 'QTY'),
    array('dt' => 'GS WT'),
    array('dt' => 'JOB WORK'),
    array('dt' => 'TYPE'),
    array('dt' => 'ADD-ON MET'),
    array('dt' => 'RATE'),
    array('dt' => 'AMT'),
    array('dt' => 'LAB CHRG'),
    array('dt' => 'STONE'),
    array('dt' => 'FINAL AMT')
);
//
//
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'stock_transaction st'; // Table Name
$_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
//
// DB Table Columns Parameters 
$dbColumnsArray = array(
    "sttr_add_date",
    "c.user_fname",
    "sttr_item_name",
    "sttr_quantity",
    "sttr_gs_weight",
    "sttr_other_info",
    "sttr_add_on_weight_product_type",
    "sttr_add_on_weight",
    "sttr_product_sell_rate",
    "sttr_valuation",
    "sttr_lab_charges",
    "sttr_stone_valuation",
    "sttr_final_valuation"
);
//
//
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
$_SESSION['dtSumColumn'] = '';
$_SESSION['dtDeleteColumn'] = '';
$_SESSION['dtSortColumn'] = '';
$_SESSION['dtASCDESC'] = '';
//
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "sttr_id,sttr_pre_invoice_no,sttr_invoice_no,";
//
//
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
//
//
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = ""; // On which column
$_SESSION['onclickColumnId'] = "";
$_SESSION['onclickColumnValue'] = "";
$_SESSION['onclickColumnFunction'] = "";
$_SESSION['onclickColumnFunctionPara1'] = "";
$_SESSION['onclickColumnFunctionPara2'] = "";
$_SESSION['onclickColumnFunctionPara3'] = "";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";
//
$_SESSION['assignOrder'] = "Yes";
//
//
// Delete Function Parameters
$_SESSION['deleteColumn'] = "sttr_id"; // On which column
$_SESSION['deleteColumnId'] = "sttr_id";
$_SESSION['deleteColumnValue'] = "sttr_id";
$_SESSION['deleteColumnFunction'] = "deleteUnivarsalPendOrderList";
$_SESSION['deleteColumnFunctionPara1'] = "deleteUnivarsalPendOrderList"; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
$_SESSION['deleteColumnFunctionPara3'] = "";  
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
// 
// 
// Where Clause Condition 
$_SESSION['tableWhere'] = "sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_firm_id IN ($strFrmId) "
                        . "AND sttr_stock_type = 'wholesale' AND sttr_indicator = 'stock' "
                        . "AND sttr_transaction_type = 'RepairItem' AND sttr_status IN ('PaymentDone') ";
// 
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                       . " LEFT JOIN user AS c ON sttr_user_id = c.user_id "
                       . " LEFT JOIN user AS u ON sttr_assign_user_id = u.user_id";
//
//
$dataTableFooter = 'N';
//
//echo '$panelName @== '.$panelName.'<br />';
//
//
if ($panelName == '' || $panelName == NULL) {
    $panelName = 'UniversalRepairOrderPanel';
}
//
// Data Table Main File
include 'omdatatables.php';
//
?>
</div>