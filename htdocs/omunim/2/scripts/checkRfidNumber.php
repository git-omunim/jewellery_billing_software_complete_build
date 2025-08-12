<?php
/*
 * ********************************************************************************************************
 * @tutorial: START CODE TO ADD FILE TO CHECK SERIAL NUMBER @AUTHOR-SHRIKANT-08MARCH2023
 * ********************************************************************************************************
 * 
 * Created on MARCH 08, 2023 02:19:13 PM
 *
 * @FileName: checkRfidNumber.php
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
 *  AUTHOR: @SHRIKANT-08032023
 *  REASON:IN RETAIL TO SEARCH THE PRODUCT ON BARCOEDE 
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
if ($prodSerialNum == '' || $prodSerialNum == NULL) {
    $prodSerialNum = $_REQUEST['prodSerialNum'];
}
//
if ($prodId == '' || $prodId == NULL) {
    $prodId = $_REQUEST['prodId'];
}

if ($prodRfid == '' || $prodRfid == NULL) {
    $prodRfid = $_REQUEST['prodRfid'];
}
//
$resRecordDet = mysqli_query($conn, "SELECT * FROM stock_transaction WHERE "
                                      . "sttr_barcode = '$prodBarcode' "
                                      . "AND sttr_item_pre_id ='$prodId' "
                                      . "AND sttr_barcode_serial_num ='$prodSerialNum' "
                                      . "AND sttr_rfid_no ='$prodRfid' "
                                      . "ORDER BY sttr_id DESC");
    //
    $noOfRecordAvailable = mysqli_num_rows($resRecordDet);
if (($prodBarcode != '' && $prodBarcode != NULL && 
     $prodBarcode != 'undefined' && $prodBarcode != 'NaN' && 
     $noOfRecordAvailable > 0) || 
    ($SetAllFormDetailsAccordingTo == 'ByProdName' && $noOfProductAvailable > 0)) { ?>
<img src="<?php echo $documentRoot; ?>/images/spacer.gif" alt=""
     onload="checkRfidNumber('<?php echo $noOfRecordAvailable; ?>','<?php echo $prodRfid; ?>');" />
<?php } ?>