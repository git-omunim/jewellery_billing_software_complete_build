<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER UPDATE STOCK MISMATCH TRANSACTION POP UP IFRAME @AUTHOR:PRIYANKA-21JAN2022
 * **************************************************************************************
 * 
 * Created on JAN 21, 2022 03:00:00 PM
 *
 * @FileName: omStockMismatchTransactionsPopUpIframe.php
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
//
//print_r($_REQUEST);
//die;
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
//echo '$documentRoot == ' . $documentRoot . '<br />';
//echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
//die;
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
?>
<div class = "modal-content" style = "overflow:hidden; width: 1155px;">
    <span class = "closeFinePopUp" onclick = "closeStockMismatchTransactionsPopUp();">&times;</span>
    <iframe height = "500px" width = "1170px"            
    src = "<?php
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || 
         $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO ) &&
         $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        echo $documentRoot . "/include/php/omStockMismatchTransactionsPopUp.php?sttrId=$sttrId&startDate=$startDate"
                           . "&endDate=$endDate&transFirmId=$transFirmId&transCategory=$Category&transName=$transName"
                           . "&transStockType=$transStockType&transPurity=$transPurity"
                           . "&transPanelDetailsDisplay=$transPanelDetailsDisplay&documentRoot=$documentRoot";
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || 
                $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        echo $documentRoot . "/include/php/omStockMismatchTransactionsPopUp.php?sttrId=$sttrId&startDate=$startDate"
                           . "&endDate=$endDate&transFirmId=$transFirmId&transCategory=$Category&transName=$transName"
                           . "&transStockType=$transStockType&transPurity=$transPurity"
                           . "&transPanelDetailsDisplay=$transPanelDetailsDisplay&documentRoot=$documentRoot";
    } ?>" 
    style = "border: 0px solid black;overflow:hidden;"> 
    </iframe>
</div>