<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER UPDATE STOCK MISMATCH TRANSACTION MAIN FILE @AUTHOR:PRIYANKA-21JAN2022
 * **************************************************************************************
 * 
 * Created on JAN 21, 2022 06:17:00 PM
 *
 * @FileName: omUpdateStockMismatchTransactions.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.118
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-21JAN2022
 *  REASON:
 *
 */
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
//
$currentFileName = basename(__FILE__);
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
$size = '100%';
$font_size = '12px'; 
//
//echo '$documentRoot == ' . $documentRoot . '<br />';
//echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
//
?>
<?php
//
//
//print_r($_REQUEST);
//
//
$_GET['sttrId'] = $_REQUEST['sttrId'];
//
//
$_REQUEST['panelName'] = 'UpdateStock';
$_GET['panelName'] = 'UpdateStock';
//
$_REQUEST['stockPanelName'] = 'UpdateStock';
$_GET['stockPanelName'] = 'UpdateStock';
//
$_REQUEST['stockType'] = $_REQUEST['transStockType'];
$_GET['stockType'] = $_REQUEST['transStockType'];
//
//
if ($_REQUEST['stockType'] == '' || $_REQUEST['stockType'] == NULL) {
    $_REQUEST['stockType'] = 'retailStock';
}
//
//
$panelName = 'UpdateStock';
//
//
$stockPanelName = 'UpdateStock';
//
//
$sttrId = $_REQUEST['sttrId'];
//
//
$documentRoot = $_REQUEST['documentRoot'];
//
if ($documentRoot == 'undefined') {
    $documentRoot = $documentRootBSlash;
}
//
//
//echo '$sttrId == ' . $sttrId . '<br />';
//echo '$panelName == ' . $panelName . '<br />';
//echo '$stockPanelName == ' . $stockPanelName . '<br />';
//
//echo '$documentRoot == ' . $documentRoot . '<br />';
//echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
//die;
//
//
if ($startDate == '' || $startDate == NULL)
    $startDate = $_GET['startDate'];
//
//
if ($endDate == '' || $endDate == NULL)
    $endDate = $_GET['endDate'];
//
//
if ($transFirmId == '' || $transFirmId == NULL)
    $transFirmId = $_GET['transFirmId'];
//
//
if ($Category == '' || $Category == NULL)
    $Category = $_GET['transCategory'];
//
//
if ($transName == '' || $transName == NULL)
    $transName = $_GET['transName'];
//
//
if ($transStockType == '' || $transStockType == NULL)
    $transStockType = $_GET['transStockType'];
//
//
if ($transPurity == '' || $transPurity == NULL)
    $transPurity = $_GET['transPurity'];
//
//
if ($transPanelDetailsDisplay == '' || $transPanelDetailsDisplay == NULL)
    $transPanelDetailsDisplay = $_GET['transPanelDetailsDisplay'];
//
//
if ($stockLedgerPanelName == '' || $stockLedgerPanelName == NULL)
    $stockLedgerPanelName = $_GET['stockLedgerPanelName'];
//
//
//echo '$transPanelDetailsDisplay == ' . $transPanelDetailsDisplay . '<br />';
//echo '$stockLedgerPanelName == ' . $stockLedgerPanelName . '<br />';
//
//
parse_str(getTableValues("SELECT sttr_quantity, sttr_gs_weight, sttr_final_quantity, sttr_final_gs_weight, "
                       . "sttr_transaction_type "
                       . "FROM stock_transaction WHERE sttr_id = '$sttrId' "));
//
//
$qtyToUpdate = ($sttr_quantity + abs($sttr_final_quantity));
//
$gsWtToUpdate = decimalVal(($sttr_gs_weight + abs($sttr_final_gs_weight)),3);
//
//
if ($sttr_transaction_type != 'sell' && $sttr_transaction_type != 'ESTIMATESELL' && $sttr_transaction_type != 'APPROVAL') {
    //
    include $_SESSION['documentRootIncludePhp'] . 'ogadstoc.php';
    //
}
//
//
?>

