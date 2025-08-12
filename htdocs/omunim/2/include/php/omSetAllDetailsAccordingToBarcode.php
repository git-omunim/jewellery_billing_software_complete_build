<?php
/*
 * ********************************************************************************************************
 * @tutorial: START CODE TO ADD FILE TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-PRIYANKA-21JUNE2020
 * ********************************************************************************************************
 * 
 * Created on JUNE 21, 2020 02:19:13 PM
 *
 * @FileName: omSetAllDetailsAccordingToBarcode.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL
 * @version 2.7.7
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-13JUNE2020
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
$currentFileName = basename(__FILE__);
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
include $_SESSION['documentRootIncludePhp'] . '/ommprspc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/ommpincr.php';
//
//
if ($documentRoot == '' || $documentRoot == NULL) {
    $documentRoot = $_REQUEST['documentRoot'];
}
//
//
if ($panelName == '' || $panelName == NULL) {
    $panelName = $_REQUEST['panelName'];
}
//
//
if ($prodBarcode == '' || $prodBarcode == NULL) {
    $prodBarcode = $_REQUEST['prodBarcode'];
}
//
//
$prodBarcodePrefix = substr($prodBarcode, 0, 1);
//
$prodBarcodeNumber = substr($prodBarcode, 1);
//
//
if ($prodCategory == '' || $prodCategory == NULL) {
    $prodCategory = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['prodCategory'])));
}
//
//
if ($prodName == '' || $prodName == NULL) {
    $prodName = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['prodName'])));
}
//
//
if ($prodPreId == '' || $prodPreId == NULL) {
    $prodPreId = $_REQUEST['prodPreId'];
}
//
//
if ($prodId == '' || $prodId == NULL) {
    $prodId = $_REQUEST['prodId'];
}
//
//
$prodCode = $prodPreId . $prodId;
//
//
if ($SetAllFormDetailsAccordingTo == '' || $SetAllFormDetailsAccordingTo == NULL) {
    $SetAllFormDetailsAccordingTo = $_REQUEST['SetAllFormDetailsAccordingTo'];
}
//
//
if ($SetAllFormDetailsAccordingTo == 'ByProdName') {
//
//
$resProductDet = mysqli_query($conn, "SELECT * FROM stock_transaction WHERE sttr_metal_type IN ('stock', 'imitation') "
                                   . "AND sttr_item_category = '$prodCategory' AND sttr_item_name = '$prodName' "
                                   . "AND sttr_indicator IN ('RetailStock', 'imitation', 'PURCHASE') "
                                   . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
                                   . "AND sttr_transaction_type IN ('PURONCASH', 'PURCHASE', 'EXISTING', 'TAG') "
                                   . "ORDER BY sttr_id DESC LIMIT 0,1");
//
$noOfProductAvailable = mysqli_num_rows($resProductDet);
//   
//   
//echo "<br/>";
//echo "noOfProductAvailable == " . $noOfProductAvailable;
//echo "<br/>";
//   
//
parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_metal_type IN ('stock', 'imitation') "
                       . "AND sttr_item_category = '$prodCategory' AND sttr_item_name = '$prodName' "
                       . "AND sttr_indicator IN ('RetailStock', 'imitation', 'PURCHASE') "
                       . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
                       . "AND sttr_transaction_type IN ('PURONCASH', 'PURCHASE', 'EXISTING', 'TAG') "
                       . "ORDER BY sttr_id DESC LIMIT 0,1"));
//
//
//echo "<br/>";
//echo "SELECT * FROM stock_transaction WHERE sttr_metal_type IN ('stock', 'imitation') "
//. "AND sttr_item_code = '$prodCode' "
//. "AND sttr_item_category = '$prodCategory' AND sttr_item_name = '$prodName' "
//. "AND sttr_indicator IN ('RetailStock', 'PURCHASE', 'imitation') "
//. "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
//. "AND sttr_transaction_type IN ('PURONCASH', 'PURCHASE', 'EXISTING', 'TAG') "
//. "ORDER BY sttr_id DESC LIMIT 0,1";
//echo "<br/>";
//
//
if ($prodId == '' || $prodId == NULL) {
    //
    $sttr_item_code = $sttr_item_pre_id;
    $sttr_item_id = '';
    //
} else {
    //
    parse_str(getTableValues("SELECT MAX(CAST(sttr_item_id AS SIGNED)) as item_id FROM stock_transaction "
                           . "WHERE sttr_item_pre_id = '$sttr_item_pre_id' "
                           . "AND sttr_transaction_type NOT IN ('sell') "
                           . "AND sttr_indicator IN ('RetailStock' , 'imitation')"));
    //
    $sttr_item_id = $item_id + 1;
    //
}
//
//
} else {
//  
//
parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_barcode_prefix = '$prodBarcodePrefix' "
                       . "AND sttr_barcode = '$prodBarcodeNumber' "
                       . "AND sttr_indicator IN ('RetailStock', 'imitation', 'PURCHASE') "
                       . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
                       . "AND sttr_transaction_type IN ('PURONCASH','PURCHASE','EXISTING','TAG') "
                       . "ORDER BY sttr_id DESC LIMIT 0,1"));
//
//
//echo "<br/>";
//echo "SELECT * FROM stock_transaction WHERE sttr_barcode_prefix = '$prodBarcodePrefix' "
//   . "AND sttr_barcode = '$prodBarcodeNumber' "
//   . "AND sttr_indicator IN ('RetailStock', 'imitation') "
//   . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
//   . "AND sttr_transaction_type IN ('PURONCASH','PURCHASE','EXISTING','TAG')";
//echo "<br/>";
//
//
$newProdBarcode = $sttr_barcode_prefix . $sttr_barcode;
//
//
//echo "<br/>";
//echo "prodBarcode == " . $prodBarcode;
//echo "<br/>";
//echo "newProdBarcode == " . $newProdBarcode;
//echo "<br/>";
//
//
    if ($prodBarcode != $newProdBarcode) {
    //
    //
    parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_barcode = '$prodBarcode' "
                           . "AND sttr_indicator IN ('RetailStock', 'imitation', 'PURCHASE') "
                           . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
                           . "AND sttr_transaction_type IN ('PURONCASH','PURCHASE','EXISTING','TAG') "
                           . "ORDER BY sttr_id DESC LIMIT 0,1"));
    //
    //
    //echo "<br/>";
    //echo "SELECT * FROM stock_transaction WHERE sttr_barcode = '$prodBarcode' "
    //   . "AND sttr_indicator IN ('RetailStock', 'imitation') "
    //   . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
    //   . "AND sttr_transaction_type IN ('PURONCASH','PURCHASE','EXISTING','TAG')";
    //echo "<br/>";
    //
    //
    //
    $resRecordDet = mysqli_query($conn, "SELECT * FROM stock_transaction WHERE sttr_barcode = '$prodBarcode' "
                                      . "AND sttr_indicator IN ('RetailStock', 'imitation', 'PURCHASE') "
                                      . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
                                      . "AND sttr_transaction_type IN ('PURONCASH','PURCHASE','EXISTING','TAG') "
                                      . "ORDER BY sttr_id DESC LIMIT 0,1");
    //
    $noOfRecordAvailable = mysqli_num_rows($resRecordDet);
    // 
    //
    } else {
    //
    //
    $resRecordDet = mysqli_query($conn, "SELECT * FROM stock_transaction WHERE "
                                      . "sttr_barcode_prefix = '$prodBarcodePrefix' "
                                      . "AND sttr_barcode = '$prodBarcodeNumber' "
                                      . "AND sttr_indicator IN ('RetailStock', 'imitation', 'PURCHASE') "
                                      . "AND sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
                                      . "AND sttr_transaction_type IN ('PURONCASH','PURCHASE','EXISTING','TAG') "
                                      . "ORDER BY sttr_id DESC LIMIT 0,1");
    //
    $noOfRecordAvailable = mysqli_num_rows($resRecordDet);
    //
    //
    }
//
//
parse_str(getTableValues("SELECT MAX(CAST(sttr_item_id AS SIGNED)) as item_id FROM stock_transaction "
                       . "WHERE sttr_item_pre_id = '$sttr_item_pre_id' "
                       . "AND sttr_transaction_type NOT IN ('sell') "
                       . "AND sttr_indicator IN ('RetailStock' , 'imitation')"));
//
$sttr_item_id = $item_id + 1;
//
//
//die;
//
}
//
//
if (($prodBarcode != '' && $prodBarcode != NULL && 
     $prodBarcode != 'undefined' && $prodBarcode != 'NaN' && 
     $noOfRecordAvailable > 0) || 
    ($SetAllFormDetailsAccordingTo == 'ByProdName' && $noOfProductAvailable > 0)) { ?>
<img src="<?php echo $documentRoot; ?>/images/spacer.gif" alt=""
     onload="allDetailsDisplayAccordingToBarcode('<?php echo $sttr_item_pre_id; ?>', '<?php echo $sttr_item_id; ?>',
                                                 '<?php echo $sttr_item_category; ?>', '<?php echo $sttr_item_name; ?>', 
                                                 '<?php echo $sttr_shape; ?>', '<?php echo $sttr_size; ?>', 
                                                 '<?php echo $sttr_hsn_no; ?>', 
                                                 '<?php echo $sttr_gender; ?>', '<?php echo $sttr_color; ?>', 
                                                 '<?php echo $sttr_item_length; ?>', '<?php echo $sttr_item_width; ?>', 
                                                 '<?php echo $sttr_item_other_info; ?>', 
                                                 '<?php echo $sttr_quantity; ?>', 
                                                 '<?php echo $sttr_gs_weight; ?>', '<?php echo $sttr_gs_weight_type; ?>',
                                                 '<?php echo $sttr_item_model_no; ?>', 
                                                 '<?php echo $sttr_item_sales_pkg; ?>',
                                                 '<?php echo $sttr_cust_itmpricecode; ?>', '<?php echo $sttr_cust_itmcode; ?>', 
                                                 '<?php echo $sttr_cust_itmcalby; ?>', '<?php echo $sttr_cust_itmnum; ?>',
                                                 '<?php echo $sttr_metal_rate; ?>', '<?php echo $sttr_price; ?>', 
                                                 '<?php echo $sttr_cust_price; ?>',
                                                 '<?php echo $sttr_period; ?>', '<?php echo $sttr_period_type; ?>',
                                                 '<?php echo $sttr_lab_charges; ?>', '<?php echo $sttr_lab_charges_type; ?>',
                                                 '<?php echo $sttr_making_charges; ?>', '<?php echo $sttr_making_charges_type; ?>', 
                                                 '<?php echo $sttr_valuation; ?>', 
                                                 '<?php echo $sttr_tot_price_cgst_per; ?>', '<?php echo $sttr_tot_price_cgst_chrg; ?>',
                                                 '<?php echo $sttr_tot_price_sgst_per; ?>', '<?php echo $sttr_tot_price_sgst_chrg; ?>',
                                                 '<?php echo $sttr_tot_price_igst_per; ?>', '<?php echo $sttr_tot_price_igst_chrg; ?>',
                                                 '<?php echo $sttr_tax; ?>', '<?php echo $sttr_tot_tax; ?>',
                                                 '<?php echo $sttr_barcode_serial_num; ?>', '<?php echo $sttr_brand_id; ?>',
                                                 '<?php echo $sttr_lab_charges_type; ?>', '<?php echo $sttr_cust_price; ?>',
                                                 '<?php echo $sttr_purches_discount_per; ?>', '<?php echo $sttr_purches_discount_amt; ?>',
                                                 '<?php echo $sttr_metal_discount_per; ?>', '<?php echo $sttr_metal_discount_amt; ?>',
                                                 '<?php echo $sttr_counter_name; ?>', '<?php echo $sttr_rfid_no; ?>',
                                                 '<?php echo $sttr_sell_rate; ?>', '<?php echo $sttr_lab_charges; ?>',
                                                 '<?php echo $sttr_final_valuation; ?>', '<?php echo $sttr_taxincl_checked; ?>',
                                                 '<?php echo $panelName; ?>', '<?php echo $formName; ?>', '<?php echo $sttr_tot_tax; ?>'" />
<?php } ?>