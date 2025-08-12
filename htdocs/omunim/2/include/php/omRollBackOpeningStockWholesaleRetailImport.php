<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Roll Back Import Data From CSV File for
 *             Opening Stock - Wholesale/Retail @AUTHOR:SANSKRUTI-10JULY2023
 * **********************************************************************************************************************************
 * @FileName: omRollBackOpeningStockWholesaleRetailImport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.148
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 * Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:SANSKRUTI
 *  REASON:
 *
 */
?>
<?php
//
if (!isset($_SESSION)) {
    session_start();
}
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
//
//print_r($_REQUEST);
//print_r($_FILES['CVSFile']);
//die;
//
//echo 'Current PHP version: ' . phpversion();
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm  @AUTHOR:PRIYANKA-07MAY2022
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//echo '$selFirmId == ' . $selFirmId . '</br>';
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr order by firm_since desc";
}
//
//
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
//echo '$selFirmId : ' . $selFirmId . '<br />';
//die;
//
//
if ($openingStockType == NULL || $openingStockType == '') {
    $openingStockType = $_REQUEST['openingStockType'];
}
//
//echo '$openingStockType : ' . $openingStockType . '<br />';
//die;
//
//
//
// Start Code to Import Data From CSV File to Mysql Database for Add Stock Opening Stock - Wholesale/Retail @AUTHOR:SANSKRUTI-10JULY2023
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name @AUTHOR:PRIYANKA-07MAY2022
$importFile = $_FILES['CVSFile']['tmp_name'];
// 
$readImportFile = fopen($importFile, "r");
//
//
$rowsCounter = 0;
//
//
while (($prodDetails = fgetcsv($readImportFile, 10000, ",")) !== false) {
    //
    //print_r($prodDetails);
    //echo '$prodDetails == ' . $prodDetails . '<br />';
    //       
    if ($rowsCounter == 0) {
        //
        $columnCounter = count($prodDetails);
        //echo 'selFirmId == ' . $selFirmId;
        //echo("<br/>");
        //die;
        //
        for ($i = 0; $i < $columnCounter; $i++) {
            //
            //echo '$i == ' . $i. '<br />';
            //echo '$prodDetails == ' . $prodDetails[$i] . '<br />';
            //
            if ($prodDetails[$i] == 'FIRM') {
                $json1 = '{"columnName":"FIRM", "position":' . $i . ',' . '"tableColumnName":"FIRM"}';
                $allData[] = json_decode($json1, true);
            }
            if ($prodDetails[$i] == 'PRE ID' || $prodDetails[$i] == 'Model No') {
                $json2 = '{"columnName":"PRE ID", "position":' . $i . ',' . '"tableColumnName":"PRE ID"}';
                $allData[] = json_decode($json2, true);
            }
            if ($prodDetails[$i] == 'POST ID') {
                $json3 = '{"columnName":"POST ID", "position":' . $i . ',' . '"tableColumnName":"POST ID"}';
                $allData[] = json_decode($json3, true);
            }
            if ($prodDetails[$i] == 'STOCK TYPE') {
                $json4 = '{"columnName":"STOCK TYPE", "position":' . $i . ',' . '"tableColumnName":"STOCK TYPE"}';
                $allData[] = json_decode($json4, true);
            }
        }
        $json_merge = ($allData);
//        echo '<pre>';
//        print_r($json_merge);
//        echo '</pre>';
    }
    //
    if ($rowsCounter > 0) {

        foreach ($json_merge as $headings) {
            //
            //echo '$headings'.$headings;
           //
            if ($headings['columnName'] == 'FIRM') {
                $firmName = $prodDetails[$headings['position']];
            }
            if ($headings['columnName'] == 'PRE ID' || $headings['columnName'] == 'Model No') {
                $sttr_item_pre_id = $prodDetails[$headings['position']];
            }
            //
            if ($headings['columnName'] == 'POST ID') {
                $sttr_item_id = $prodDetails[$headings['position']];
            }
            //
            if ($headings['columnName'] == 'STOCK TYPE') {
                $stockType = $prodDetails[$headings['position']];
            }
        }
        //
        //
        $sttr_firm_id = $selFirmId;
        //
        $sttr_stock_type = $openingStockType;
        //
        if ($sttr_firm_id != '' && $sttr_firm_id != NULL) {
            // 
            // 
//            print_r($prodDetails);
            //
            //
//            echo '$firmName 1== ' . $firmName . '<br />';
            //die;
            //
            if ($stockType != '' && $stockType != NULL) {
                $sttr_stock_type = $stockType;
            }
            //
            //
//            echo '$sttr_stock_type == ' . $sttr_stock_type;
//            echo("<br/>");
            //
            //
            // STOCK TYPE @AUTHOR:PRIYANKA-07MAY2022
            if ($sttr_stock_type == '' || $sttr_stock_type == NULL) {
                $sttr_stock_type = 'wholesale';
            }
            //
            //
//            echo '$sttr_stock_type == ' . $sttr_stock_type;
            //echo("<br/>");
            //
            //
            if ($sttr_stock_type == 'wholesale' || $sttr_stock_type == 'Wholesale' ||
                $sttr_stock_type == 'WHOLESALE' || $sttr_stock_type == 'W') {
                $sttr_stock_type = 'wholesale';
            }
            //
            //
            if ($sttr_stock_type == 'retail' || $sttr_stock_type == 'Retail' ||
                $sttr_stock_type == 'RETAIL' || $sttr_stock_type == 'R') {
                $sttr_stock_type = 'retail';
            }
            //
            //
            //
            $sttr_item_pre_id = strtoupper($sttr_item_pre_id);
            //
            if ($sttr_stock_type == 'wholesale') {
                $sttr_item_id = NULL;
            }
            //
            $sttr_item_code = ($sttr_item_pre_id . $sttr_item_id);
            //
            //
//            echo '$sttr_item_code == ' . $sttr_item_code;
            
            if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
                $stockDelete = 'Y';
            } else {
                $stockDelete = 'N';
            }
            //
           if ($stockDelete == 'N') {
                $delFromStock = 'yes';
            }
            $query = "SELECT sttr_item_code,sttr_id,sttr_st_id,sttr_jrnl_id from stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_item_code = '$sttr_item_code' "
                    . "AND sttr_stock_type = '$sttr_stock_type' AND sttr_firm_id = '$sttr_firm_id' ";
//            echo '$query'.$query;
            $resQuery = mysqli_query($conn, $query);
            while ($rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
                $sttr_id = $rowQuery['sttr_id'];
                $sttr_st_id = $rowQuery['sttr_st_id'];
                $sttr_jrnl_id = $rowQuery['sttr_jrnl_id'];
                 //
                stock_transaction('delete', array(), $sttr_id, '', $delFromStock);
                
                if ($sttr_jrnl_id != '') {

                    $apiType = 'delete';
                    $jrtrOwnId = $_SESSION[sessionOwnerId];
                    $jrnlId = $sttr_jrnl_id;
                    $jrtrJrnlId = $sttr_jrnl_id;
                    //
                    include 'ommpjrnl.php';
                    include 'ommpjrtr.php';
                    //
                }
            }
           //
            $deleteStockTransDelQuery = "DELETE FROM stock_transaction_del WHERE sttr_item_code = '$sttr_item_code' AND sttr_stock_type = '$sttr_stock_type' AND sttr_status = 'DELETED'";
            //
            if (!mysqli_query($conn, $deleteStockTransDelQuery)) {
                die('Error (Line No - ' . __LINE__ . '): ' . mysqli_error($conn));
            }
            
        }
           else {
          ?>
           <div class="fs_13 ff_calibri bold" style="color:red;">Issue has been detected with Firm. Please select Firm! </div>
           <?php
           die;
        }
    }
    //
    //
    $_REQUEST = array();
    $type = array();
    $sttr_item_pre_id = NULL;
    $sttr_item_id = NULL;
    $sttr_stock_type = NULL;
    //
    //
    $rowsCounter++;
    //  
    //
}
//
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
     $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/omHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');
} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/orHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');
} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/olHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    exit;
}
?>