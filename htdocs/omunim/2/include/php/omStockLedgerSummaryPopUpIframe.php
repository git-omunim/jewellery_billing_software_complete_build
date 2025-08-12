<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER SUMMARY POP UP IFRAME @AUTHOR:PRIYANKA-19OCT2021
 * **************************************************************************************
 * 
 * Created on OCT 19, 2021 04:36:00 PM
 *
 * @FileName: omStockLedgerSummaryPopUpIframe.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.92
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-19OCT2021
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
//$documentRoot = $_REQUEST['documentRoot'];
//
//echo '$documentRoot == ' . $documentRoot . '<br />';
//echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
//
//class = "modal-content"
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    if ($_REQUEST['firmId'] != NULL && $_REQUEST['firmId'] != '') {
        $selFirmId = $_REQUEST['firmId'];
    }
}
//
//
?>
<div class="col-sm-12 col-md- 12 col-lg-12 col-xl-12">
    <iframe height = "100%" width = "100%"            
    src = "<?php
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || 
         $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO ) &&
         $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        echo $documentRootBSlash . "/include/php/omStockLedgerSummaryPopUp.php?documentRoot=$documentRootBSlash";
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || 
                $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        echo $documentRootBSlash . "/include/php/omStockLedgerSummaryPopUp.php?documentRoot=$documentRootBSlash";
    } ?>" 
    style = "border: 0px solid black; z-index: 1;" > 
    </iframe>
</div>
