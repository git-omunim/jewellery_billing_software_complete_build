<?php
/*
 * **************************************************************************************************
 * @Description: STOCK LEDGER STOCK MISMATCH => UPDATE STOCK PURITY PANEL FILE @AUTHOR:PRIYANKA:08FEB2022
 * **************************************************************************************************
 *
 * Created on FEB 08, 2022 07:00:00 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerStockMismatchUpdateStockPurity.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 
 * @version 2.7.122
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA:08FEB2022
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.122
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
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
$sttrId = $_REQUEST['sttrId'];
//
//
parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_id = '$sttrId' "));
//
//
if ($sttr_transaction_type == 'EXISTING' || $sttr_transaction_type == 'PURONCASH') {
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
include $_SESSION['documentRootIncludePhp'] . 'ogadstoc.php';
//
//
include_once '../../omCommonFunc.php';
//
//
}
//
//
?>

