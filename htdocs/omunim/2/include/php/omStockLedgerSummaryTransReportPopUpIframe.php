<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER SUMMARY TRANSACTION REPORT @AUTHOR:PRIYANKA-13OCT2021
 * **************************************************************************************
 * 
 * Created on OCT 13, 2021 11:30:00 AM
 *
 * @FileName: omStockLedgerSummaryTransReportPopUpIframe.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.84
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-13OCT2021
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
// STOCK COUNTER NAME @AUTHOR:PRIYANKA-21FEB2022
if ($counterPanelName == '' || $counterPanelName == NULL)
    $counterPanelName = $_GET['counterPanelName'];
//
// STOCK TALLY RFID @AUTHOR:YUVRAJ-25112022
if ($panelNameStockTally == '' || $panelNameStockTally == NULL)
    $panelNameStockTally = $_GET['panelNameStockTally'];
// STOCK TALLY RFID @AUTHOR:YUVRAJ-25112022
if ($panelNameStockTally == '' || $panelNameStockTally == NULL)
    $panelNameStockTally = $_GET['panelNameStockTally'];
//
?>
<div class = "modal-content" style = "overflow:hidden;">
    <span class = "closeFinePopUp" 
          <?php if ($stockLedgerPanelName == 'stockLedger') { ?>
          onclick = "closeStockLedgerTransactionsReportPopUp();"
          <?php } else { ?>
          onclick = "closeStockSummaryTransactionsReportPopUp('<?php echo $sttrId; ?>');"
          <?php } ?>>&times;
    </span>
    <iframe height = "520px" width = "100%"            
    src = "<?php
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || 
         $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO ) &&
         $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        echo $documentRoot . "/include/php/omStockLedgerSummaryTransReportPopUp.php?sttrId=$sttrId&startDate=$startDate"
                           . "&endDate=$endDate&transFirmId=$transFirmId&transCategory=$Category&transName=$transName"
                           . "&transStockType=$transStockType&transPurity=$transPurity&counterPanelName=$counterPanelName"
                           . "&transPanelDetailsDisplay=$transPanelDetailsDisplay&documentRoot=$documentRoot&panelNameStockTally=$panelNameStockTally";
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || 
                $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        echo $documentRoot . "/include/php/omStockLedgerSummaryTransReportPopUp.php?sttrId=$sttrId&startDate=$startDate"
                           . "&endDate=$endDate&transFirmId=$transFirmId&transCategory=$Category&transName=$transName"
                           . "&transStockType=$transStockType&transPurity=$transPurity&counterPanelName=$counterPanelName"
                           . "&transPanelDetailsDisplay=$transPanelDetailsDisplay&documentRoot=$documentRoot&panelNameStockTally=$panelNameStockTally";
    } ?>" 
    style = "border: 0px solid black;overflow:hidden;"> 
    </iframe>
</div>