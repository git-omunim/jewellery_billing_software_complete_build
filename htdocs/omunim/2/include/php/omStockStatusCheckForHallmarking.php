<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK STATUS CHECK FILE FOR HALLMARKING @AUTHOR:PRIYANKA-10NOV2021
 * **************************************************************************************
 * 
 * Created on 10 NOV, 2021 03:55:00 PM
 *
 * @FileName: omStockStatusCheckForHallmarking.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.94
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-10NOV2021
 *  AUTHOR:
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
include $_SESSION['documentRootIncludePhp'] . 'system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . 'system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . 'system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . 'ommpfndv.php';
//
// STAFF ACCESS FILE
$staffId = $_SESSION['sessionStaffId'];
//
?>
<?php
//
$newProductPreId = $_REQUEST['searchProductPreId'];
$newProductPostId = $_REQUEST['searchProductPostId'];
$prodCode = $_REQUEST['ItemCode']; //FOR EXCEL STOCK GET AND OPEN MODAL POPUP @YUVRAJ 17012023
//
//echo '$newProductPreId == '.$newProductPreId.'<br />';
//echo '$newProductPostId == '.$newProductPostId.'<br />';
//
if ($panelName == '' || $panelName == NULL)
    $panelName = $_REQUEST['panelName'];
//
if ($userId == '' || $userId == NULL)
    $userId = $_REQUEST['userId'];
//
$prodScanWithRFID = NULL;
//
$alphaFirstLetter = substr($newProductPreId, 0, 1);
$alphaId = substr($newProductPreId, 1);
//
if ($newProductPreId == '' && $newProductPostId != '') {
    $productBarCode = substr($newProductPostId, 1);
}
//
//FOR EXCEL STOCK GET AND OPEN MODAL POPUP @YUVRAJ 17012023
if ($prodCode != '') {
    $newProductCode = $prodCode;
} else {
    $newProductCode = $newProductPreId . $newProductPostId;
}
//
//echo '$productBarCode == '.$productBarCode.'<br />';
//echo '$newProductCode == '.$newProductCode.'<br />';
//
if (strstr($newProductPostId, '#')) {
    //
    $newProductPreId = $newProductPreId . '#';
    //
    $productPostId = strstr($newProductPostId, '#');
    //
    $newProductPostId = substr($productPostId, 1);
    //
}
//
//
if ($newProductPreId == '' && $newProductPostId != '') {
    $productBarCodePreId = substr($newProductPostId, 0, 1);
    $productBarCode = substr($newProductPostId, 1);
}
//
//echo '$newProductPreId == ' . $newProductPreId . '<br />';
//echo '$newProductPostId == ' . $newProductPostId . '<br />';
//die;
//
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%" align="center">
    <tr>
        <td align="center">
            <?php
            if ($newProductCode != '') {
                //
                if ($newProductPostId != '') {
                    //
                    if ($newProductPreId == '' && $newProductPostId != '') {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttrin_id, sttr_sell_status, "
                                . "sttr_status, sttr_panel_name FROM stock_transaction "
                                . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND sttr_barcode_prefix = '$productBarCodePreId' "
                                . "AND sttr_barcode = '$productBarCode' "
                                . "AND sttr_indicator != 'stockCrystal' ";
                        //
                    } else {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttrin_id, sttr_status, "
                                . "sttr_sell_status, sttr_panel_name FROM stock_transaction "
                                . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId' "
                                . "AND sttr_stock_type = 'retail' "
                                . "AND sttr_indicator != 'stockCrystal' ";
                        //
                    }
                    //
                    //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />'; die;
                    //
                    $resStockProduct = mysqli_query($conn, $querySelStockProduct) or die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                    $stockAvailable = mysqli_num_rows($resStockProduct);
                    //
                    // If Stock Available Count is Zero then check with RFID No.
                    if ($stockAvailable == 0) {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttrin_id, sttr_sell_status, "
                                . "sttr_status, sttr_rfid_no, sttr_panel_name "
                                . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND sttr_rfid_no = '$newProductCode' "
                                . "AND sttr_indicator != 'stockCrystal' ";
                        //
                        //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                        //
                        $resStockProduct = mysqli_query($conn, $querySelStockProduct) or die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                        $stockAvailable = mysqli_num_rows($resStockProduct);
                        //
                        if ($stockAvailable > 0) {
                            $rowStockProduct = mysqli_fetch_array($resStockProduct, MYSQLI_ASSOC);
                            $productScanWithRFID = $rowStockProduct['sttr_rfid_no'];
                        }
                    }
                    //
                    //
                    // Start Code if Stock Available Count is Zero then check with product code @PRIYANKA-19SEP2022
                    if ($stockAvailable == 0) {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttrin_id, sttr_sell_status, "
                                . "sttr_status, sttr_rfid_no, sttr_panel_name "
                                . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND sttr_item_code = '$newProductCode' "
                                . "AND sttr_stock_type = 'retail' "
                                . "AND sttr_indicator != 'stockCrystal' ";
                        //
                        //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                        //
                        $resStockProduct = mysqli_query($conn, $querySelStockProduct) or die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                        $stockAvailable = mysqli_num_rows($resStockProduct);
                        //
                    }
                    // End Code if Stock Available Count is Zero then check with product code @PRIYANKA-19SEP2022
                    //
                    //
                    //echo '$productStatus == '.$productStatus.'<br />';
                    //
                    //
                    if ($stockAvailable > 0) {
                        //
                        $rowStockProduct = mysqli_fetch_array($resStockProduct, MYSQLI_ASSOC);
                        $productStatus = $rowStockProduct['sttr_status'];
                        //
                        //echo '$productStatus == '.$productStatus.'<br />';
                        //
                        $sttr_id = $rowStockProduct['sttr_id'];
                        //
                        //$sttr_sttrin_id = $rowStockProduct['sttr_sttrin_id'];
                        //
                        $panelName = $rowStockProduct['sttr_panel_name'];
                        $mainPanelName = $rowStockProduct['sttr_panel_name'];
                        //
                        if ($productStatus == 'SOLDOUT') { ?>
                            <div class="fs_14 ff_calibri orange fw_b" style="margin-left: -60px; margin-top: 41px;">
                                THIS PRODUCT IS ALREADY SOLD OUT
                            </div>
                            <?php
                        } 
                        else if ($productStatus == 'PaymentPending') { ?>
                            <!--<div class="fs_14 ff_calibri orange fw_b" style="margin-left: -50px; margin-top: 41px;">
                                FIRST ADD PRODUCTS INTO AVAILABLE LIST FROM ADD STOCK PANEL
                            </div>-->
                            <?php
                        }
                    } else {
                        //
                        $stockPresent = noOfRowsCheck('st_id', 'stock', "st_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND st_item_code = '$newProductCode'");
                        //
                        if ($stockPresent > 0) {
                            $stockAvailable = 1;
                        } else {
                            $stockAvailable = 1; ?>
                            <div class="fs_14 ff_calibri orange fw_b" style="margin-left: -50px; margin-top: 41px;">
                                THIS PRODUCT IS NOT PRESENT INTO STOCK LIST
                            </div>
                            <?php
                        }
                    }
                } else {
                    //
                    $stockPresent = noOfRowsCheck('st_id', 'stock', "st_owner_id = '$_SESSION[sessionOwnerId]' "
                            . "AND st_item_code = '$newProductCode'");
                    //
                    //echo '$stockPresent : '.$stockPresent;die();
                    //
                    if ($stockPresent > 0) {
                        //
                        $stockAvailable = 1;
                        //
                        /* START CODE TO GETTING DETAILS OF WHOLESALE PRODUCT FROM STOCK TABLE IF PRODUCT POSTID IS EMPTY OR NULL @AUTHOR:PRIYANKA-10NOV2021 */
                        $qSelWholesaleProductDetails = "SELECT * FROM stock WHERE st_item_code = '$newProductCode' "
                                . "AND st_owner_id = '$_SESSION[sessionOwnerId]'";
                        //
                        $resWholesaleProductDetails = mysqli_query($conn, $qSelWholesaleProductDetails);
                        $rowWholesaleProductDetails = mysqli_fetch_array($resWholesaleProductDetails, MYSQLI_ASSOC);
                        //
                        $stItemCode = $rowWholesaleProductDetails['st_item_code'];
                        $stItemCategory = $rowWholesaleProductDetails['st_item_category'];
                        $stItemName = $rowWholesaleProductDetails['st_item_name'];
                        $stItemPurity = $rowWholesaleProductDetails['st_purity'];
                        $stItemFirmId = $rowWholesaleProductDetails['st_firm_id'];
                        //
                        //echo '$stItemCode : '.$stItemCode.'<br>';
                        //echo '$stItemCategory : '.$stItemCategory.'<br>';
                        //echo '$stItemName : '.$stItemName.'<br>';
                        //echo '$stItemPurity : '.$stItemPurity.'<br>';
                        //echo '$stItemFirmId : '.$stItemFirmId.'<br>';
                        //
                        $qSelSttrWholesaleProductDetails = "SELECT * FROM stock_transaction WHERE sttr_item_code = '$stItemCode' "
                                . "AND sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND sttr_item_category = '$stItemCategory' "
                                . "AND sttr_item_name = '$stItemName' "
                                . "AND sttr_purity = '$stItemPurity' "
                                . "AND sttr_firm_id = '$stItemFirmId' "
                                . "AND sttr_indicator != 'stockCrystal' ";
                        //
                        //echo '$qSelSttrWholesaleProductDetails : '.$qSelSttrWholesaleProductDetails;
                        //
                        $resSttrWholesaleProductDetails = mysqli_query($conn, $qSelSttrWholesaleProductDetails);
                        $rowSttrWholesaleProductDetails = mysqli_fetch_array($resSttrWholesaleProductDetails, MYSQLI_ASSOC);
                        //
                        $productStatus = $rowSttrWholesaleProductDetails['sttr_status'];
                        $sttr_id = $rowSttrWholesaleProductDetails['sttr_id'];
                        $sttr_sttrin_id = $rowSttrWholesaleProductDetails['sttr_sttrin_id'];
                        //
                        $panelName = $rowSttrWholesaleProductDetails['sttr_panel_name'];
                        $mainPanelName = $rowSttrWholesaleProductDetails['sttr_panel_name'];
                        //
                        /* END CODE TO GETTING DETAILS OF WHOLESALE PRODUCT FROM STOCK TABLE IF PRODUCT POSTID IS EMPTY OR NULL @AUTHOR:PRIYANKA-10NOV2021 */
                        //
                    } else {
                        $stockAvailable = 1; ?>
                        <div class="fs_14 ff_calibri orange fw_b" style="margin-left: -50px; margin-top: 41px;">
                            THIS PRODUCT IS NOT PRESENT INTO STOCK LIST
                        </div>
                        <?php
                    }
                }
            } else {
                $stockAvailable = 0;
            }
            ?>
        </td>
    </tr>
</table>