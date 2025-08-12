<?php
/*
 * *************************************************************************************************
 * @tutorial: STOCK MANAGEMENT BY COUNTER DATATABLE FILE @AUTHOR:PRIYANKA-26NOV2021
 * *************************************************************************************************
 * 
 * Created on 26 NOV, 2021 12:23:00 PM
 *
 * @FileName: omStockManagementByCounterDatatable.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-26NOV2021
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
/******* Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm
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
/***** End Code To GET Firm Details ********* */
//
//
include $_SESSION['documentRootIncludePhp'] . 'omdatatablesUnset.php';
//
//
$dataTableColumnsFields = array(
        array('dt' => 'PID'),
        array('dt' => 'PNO'),
        array('dt' => 'VOUCHER'),
        array('dt' => 'FIRM'),
        array('dt' => 'PREV COUNTER'),
        array('dt' => 'NEW COUNTER'),
        array('dt' => 'STAFF'),
        array('dt' => 'METAL'),
        array('dt' => 'HUID'),
        array('dt' => 'CAT'),
        array('dt' => 'NAME'),
        array('dt' => 'TYPE'),
        array('dt' => 'QTY'),
        array('dt' => 'GS WT'),
        array('dt' => 'LESS WT'),
        array('dt' => 'NT WT'),
        array('dt' => 'PURITY'),
        array('dt' => 'FN WT'),   
        array('dt' => 'PUR. RATE'),
        array('dt' => 'BC NO')
);
//
//
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
//
// Table Parameters
$_SESSION['tableName'] = 'stock_transaction'; // Table Name
$_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
//
//
// DB Table Columns Parameters 
$dbColumnsArray = array(
        "sttr_item_pre_id",
        "sttr_item_id",
        "CONCAT(sttr_pre_voucher_no,'',sttr_voucher_no)",
        "f.firm_name",
        "SUBSTRING_INDEX(sttr_stock_trans_counter_history,'#',-1)", // For prev product counter @AUTHOR:PRIYANKA-30MAR2022
        "sttr_counter_name", // For new product counter @AUTHOR:PRIYANKA-30MAR2022
        "u.user_fname",
        "sttr_metal_type",
        "sttr_hallmark_uid",
        "sttr_item_category",
        "sttr_item_name",
        "sttr_stock_type",
        "sttr_quantity",
        "sttr_gs_weight",
        "sttr_pkt_weight",
        "sttr_nt_weight",
        "sttr_purity",
        "sttr_fine_weight",
        "sttr_metal_rate",
        "CONCAT(sttr_barcode_prefix,'',sttr_barcode)"
);
//
//
$_SESSION['dbColumnsArray'] = $dbColumnsArray;
$_SESSION['dtSumColumn'] = '12,13,14,15,17';
$_SESSION['dtDeleteColumn'] = '';
//
$_SESSION['sqlQueryColumns'] = "sttr_id,sttr_item_pre_id,sttr_stock_trans_counter_history,";
//
//
// Start code to include all session
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
// On Print Function Parameters
//
$_SESSION['onprintColumnImage'] = "tag16.png";
$_SESSION['onprintColumn'] = "sttr_st_id"; // On which column
$_SESSION['onprintColumnId'] = "sttr_id";
$_SESSION['onprintColumnValue'] = "sttr_id";
$_SESSION['onprintColumnFunction'] = "";
$_SESSION['onprintColumnFunctionPara1'] = "";
$_SESSION['onprintColumnFunctionPara2'] = "";
$_SESSION['onprintColumnFunctionPara3'] = "";
$_SESSION['onprintColumnFunctionPara4'] = "";
$_SESSION['onprintColumnFunctionPara5'] = "";
$_SESSION['onprintColumnFunctionPara6'] = "";
//
// Delete Function Parameters
//
$_SESSION['deleteColumn'] = "sttr_id"; // On which column
$_SESSION['deleteColumnId'] = "sttr_id";
$_SESSION['deleteColumnValue'] = "sttr_id";
$_SESSION['deleteColumnFunction'] = "deleteProductList";
$_SESSION['deleteColumnFunctionPara1'] = $panelName; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
$_SESSION['deleteColumnFunctionPara3'] = "sttr_stock_type";
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
//
//
//print_r($_REQUEST);
//
//
//echo '<br />$productSearchWithBarcode == ' . $productSearchWithBarcode . '<br />';
//echo '$productSearchWithRFID == ' . $productSearchWithRFID . '<br />';
//echo '$productSearchWithProdCode == ' . $productSearchWithProdCode . '<br />';
////
//echo '$productBarCodePreId == ' . $productBarCodePreId . '<br />';
//echo '$productBarCode == ' . $productBarCode . '<br />';
////
//echo '$newProductPreId == ' . $newProductPreId . '<br />';
//echo '$newProductPostId == ' . $newProductPostId . '<br />';
////
//echo '$newProdCode == ' . $newProdCode . '<br />';
////
//echo '$productCounter == ' . $productCounter . '<br />';
//echo '$selectedFirm == ' . $selectedFirm . '<br />';
//
//
if ($productSearchWithBarcode == 'YES') {
    $productSearchWithBarcodeStr = " AND sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode' ";
}
//
if ($productSearchWithProdCode == 'YES') {
    $productSearchWithProdCodeStr = " AND ((sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId') OR sttr_item_code = '$newProdCode') ";
}
//
if ($productSearchWithRFID == 'YES') {
    $productSearchWithRFIDStr = " AND sttr_rfid_no = '$newProdCode' ";
}
//
//
if ($productCounter != NULL && $productCounter != '' && $productCounter != 'NotSelected' && 
    $selectedFirm != NULL && $selectedFirm != '') {
//
// Table Where
$_SESSION['tableWhere'] = " (sttr_firm_id IN ($selectedFirm) AND sttr_counter_name = '$productCounter') "
                        . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice') "                        
                        . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
                        . " AND sttr_status NOT IN ('DELETED','NotDelFromStock') "
                        . " AND sttr_stock_transfer_status IN ('COMPLETED') $productSearchWithBarcodeStr $productSearchWithProdCodeStr $productSearchWithRFIDStr ";
                        //. " AND sttr_stock_transfer_status IN ('COMPLETED') "
                        //. " AND (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') ";
//
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                       . " LEFT JOIN user AS u ON sttr_staff_id = u.user_id ";
//
} else if ($productCounter != NULL && $productCounter != '' && $productCounter != 'NotSelected') {
//
// Table Where
$_SESSION['tableWhere'] = " (sttr_firm_id IN ($strFrmId) AND sttr_counter_name = '$productCounter') "
                        . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice') "                        
                        . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
                        . " AND sttr_status NOT IN ('DELETED','NotDelFromStock') "
                        . " AND sttr_stock_transfer_status IN ('COMPLETED') $productSearchWithBarcodeStr $productSearchWithProdCodeStr $productSearchWithRFIDStr ";
                        //. " AND sttr_stock_transfer_status IN ('COMPLETED') "
                        //. " AND (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') ";
//
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                       . " LEFT JOIN user AS u ON sttr_staff_id = u.user_id ";
//
} else if ($selectedFirm != NULL && $selectedFirm != '') {
//
// Table Where
$_SESSION['tableWhere'] = " sttr_firm_id IN ($selectedFirm) "
                        . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice') "                        
                        . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
                        . " AND sttr_status NOT IN ('DELETED','NotDelFromStock') "
                        . " AND sttr_stock_transfer_status IN ('COMPLETED') $productSearchWithBarcodeStr $productSearchWithProdCodeStr $productSearchWithRFIDStr ";
                        //. " AND sttr_stock_transfer_status IN ('COMPLETED') "
                        //. " AND (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') ";
//
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                       . " LEFT JOIN user AS u ON sttr_staff_id = u.user_id ";
//
} else {
//
// Table Where
$_SESSION['tableWhere'] = " sttr_firm_id IN ($strFrmId) "
                        . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice') "                        
                        . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
                        . " AND sttr_status NOT IN ('DELETED','NotDelFromStock') "
                        . " AND sttr_stock_transfer_status IN ('COMPLETED') $productSearchWithBarcodeStr $productSearchWithProdCodeStr $productSearchWithRFIDStr ";
                        //. " AND sttr_stock_transfer_status IN ('COMPLETED') "
                        //. " AND (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') ";
//
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                       . " LEFT JOIN user AS u ON sttr_staff_id = u.user_id ";
//
}
//
//
//echo '<br />tableWhere == ' . $_SESSION['tableWhere'] . '<br />';
// 
//
$dataTableFooter = 'N';
//
//
// Data Table Main File
include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
//
//
?>