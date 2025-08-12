<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 20 Jan, 2019 12:08:34 PM
 *
 * @FileName: omStockManagementByCounterMultiBarcode.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-12SEP2023
 *  AUTHOR: @AUTHOR:PRIYANKA-12SEP2023
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
//
//print_r($_REQUEST);
//
//
$barcodeTagsData = trim($_REQUEST['barcodeTagsData']);
//
$productCounter = $_REQUEST['productCounter'];
//
//echo '<br />$barcodeTagsData == ' . $barcodeTagsData . '<br />';
//echo '$productCounter == ' . $productCounter . '<br />';
//
if ($barcodeTagsData != '' && $barcodeTagsData != NULL && $productCounter != '' && $productCounter != NULL) {
    //
    //$barcodePrefix = substr($barcodeTagsData, 0, 1);
    //$barcodePostfix = substr($barcodeTagsData, 1);
    //
    //echo '$barcodeTagsData == ' . $barcodeTagsData . '<br />';
    //echo '$barcodePrefix == ' . $barcodePrefix . '<br />';
    //echo '$barcodePostfix == ' . $barcodePostfix . '<br />';
    //
    // ADDED CODE FOR BARCODE @AUTHOR:PRIYANKA-12SEP2023
    $prodBarcodePrefix = substr($barcodeTagsData, 0, 1);
    $prodBarcode = substr($barcodeTagsData, 1);
    //
    //
    //echo '<br />$prodBarcodePrefix == ' . $prodBarcodePrefix . '<br />';
    //echo '$prodBarcode == ' . $prodBarcode . '<br />';
    //
    //
    // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
    $updateProductCounterQuery = "UPDATE stock_transaction "
                               . "SET sttr_counter_name = '$productCounter' "
                               . "WHERE sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP', 'PURCHASE') "
                               . "AND sttr_indicator IN ('stock', 'AddInvoice') "
                               . "AND sttr_stock_type = 'retail' "
                               . " AND "
                               . "((sttr_barcode_prefix = '$prodBarcodePrefix' and sttr_barcode = '$prodBarcode') "
                               . " OR "
                               . "((sttr_barcode_prefix IS NULL OR sttr_barcode_prefix = '') and sttr_barcode = '$barcodeTagsData')) ";
    //
    //
    //echo '$updateProductCounterQuery == ' . $updateProductCounterQuery . '<br />';
    //
    //
    if (!mysqli_query($conn, $updateProductCounterQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    //
}
//
?>