<?php
/*
 * **************************************************************************************
 * @tutorial: SEARCH STOCK STATUS CHECK FILE @PRIYANKA-20FEB2021
 * **************************************************************************************
 * 
 * Created on FEB 20, 2021 04:55:00 PM
 *
 * @FileName: omSearchStockStatusCheck.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-20FEB2021
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
//
//echo '$newProductPreId == '.$newProductPreId.'<br />';
//echo '$newProductPostId == '.$newProductPostId.'<br />';
//
$mainSearchString = $newProductPreId . $newProductPostId;
//
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
$newProductCode = $newProductPreId . $newProductPostId;
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
if ($newProductPreId == '' && $newProductPostId != '') {
    $productBarCodePreId = substr($newProductPostId, 0, 1);
    $productBarCode = substr($newProductPostId, 1);
}
//
//
//echo '$newProductPreId == ' . $newProductPreId . '<br />';
//echo '$newProductPostId == ' . $newProductPostId . '<br />';
//die;
//
//
$selStockStatusStr = " AND sttr_status IN ('PaymentDone', 'TAG', 'EXISTING', 'PURCHASE') "
                   . " AND sttr_transaction_type IN ('PURBYSUPP', 'TAG', 'PURONCASH') "
                   . " AND sttr_indicator IN ('stock', 'AddInvoice') ";
//
//
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%" align="center">
    <tr>
        <td align="center">
            <?php
            if ($newProductCode != '') {
                    //
                    if ($newProductPreId == '' && $newProductPostId != '') {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttr_id, sttr_sell_status, "
                                              . "sttr_status, sttr_panel_name, "
                                              . "sttr_indicator, sttr_transaction_type "
                                              . "FROM stock_transaction "
                                              . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                              . "AND sttr_barcode_prefix = '$productBarCodePreId' "
                                              . "AND sttr_barcode = '$productBarCode' "
                                              . " $selStockStatusStr ";
                        //
                    } else {
                        //
                        if ($newProductPreId != '' && $newProductPostId != '') {
                            //
                            $querySelStockProduct = "SELECT sttr_id, sttr_sttr_id, sttr_status, "
                                                  . "sttr_sell_status, sttr_panel_name, "
                                                  . "sttr_indicator, sttr_transaction_type "
                                                  . "FROM stock_transaction "
                                                  . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                                  . "AND sttr_item_pre_id = '$newProductPreId' "
                                                  . "AND sttr_item_id = '$newProductPostId' "
                                                  . " $selStockStatusStr ";
                            //
                        } else {
                            //
                            $querySelStockProduct = "SELECT sttr_id, sttr_sttr_id, sttr_status, "
                                                  . "sttr_sell_status, sttr_panel_name, "
                                                  . "sttr_indicator, sttr_transaction_type "
                                                  . "FROM stock_transaction "
                                                  . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                                  . "AND sttr_item_code = '$newProductCode' "
                                                  . " $selStockStatusStr ";
                            //
                        }
                    }
                    //
                    //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                    //
                    $resStockProduct = mysqli_query($conn, $querySelStockProduct) or 
                                       die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                    //
                    $stockAvailable = mysqli_num_rows($resStockProduct);
                    //
                    //
                    //echo '$stockAvailable 1== ' . $stockAvailable . '<br />';
                    //
                    // If Stock Available Count is Zero then check with RFID No. @PRIYANKA-20FEB2021
                    if ($stockAvailable == 0) {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttr_id, sttr_sell_status, "
                                              . "sttr_status, sttr_rfid_no, sttr_panel_name, "
                                              . "sttr_indicator, sttr_transaction_type "
                                              . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                              . "AND sttr_rfid_no = '$newProductCode' $selStockStatusStr ";
                        //
                        //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                        //
                        $resStockProduct = mysqli_query($conn, $querySelStockProduct) or 
                                           die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                        //
                        $stockAvailable = mysqli_num_rows($resStockProduct);
                        //
                        if ($stockAvailable > 0) {
                            $rowStockProduct = mysqli_fetch_array($resStockProduct, MYSQLI_ASSOC);
                            $productScanWithRFID = $rowStockProduct['sttr_rfid_no'];
                        }
                    }
                    //
                    //
                    //echo '$stockAvailable 2== ' . $stockAvailable . '<br />';
                    //
                    //
                    if ($stockAvailable > 0) {
                        //
                        $rowStockProduct = mysqli_fetch_array($resStockProduct, MYSQLI_ASSOC);
                        //
                        $productStatus = $rowStockProduct['sttr_status'];
                        $sttr_id = $rowStockProduct['sttr_id'];
                        $sttr_sttr_id = $rowStockProduct['sttr_sttr_id'];
                        $sttr_indicator = $rowStockProduct['sttr_indicator'];
                        $sttr_transaction_type = $rowStockProduct['sttr_transaction_type'];   
                        //
                        //echo '$sttr_sttr_id 1== ' . $sttr_sttr_id . '<br />';
                        //
                        $panelName = $rowStockProduct['sttr_panel_name'];
                        $mainPanelName = $rowStockProduct['sttr_panel_name'];
                        //
                        //
                    }                                            
                    //
                    //
                    //echo '$stockAvailable 3== ' . $stockAvailable . '<br />';
                    //
                    //
                    if ($transType == 'PurchaseReturn' && $stockAvailable == 0) {
                        //
                        $querySelStockProduct = "SELECT sttr_id, sttr_sttr_id, "
                                              . "sttr_panel_name, "
                                              . "sttr_indicator, sttr_transaction_type "
                                              . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                              . "AND sttr_item_pre_id = '$newProductPreId' "
                                              . "AND sttr_item_id = '$newProductPostId' "
                                              . " $selStockStatusStr ";
                        //
                        //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                        //
                        $resSellStockProduct = mysqli_query($conn, $querySelStockProduct) or 
                                               die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                        //
                        $stockAvailable = mysqli_num_rows($resSellStockProduct);
                        //
                        if ($stockAvailable > 0 && $transType == 'PurchaseReturn') {
                            //
                            $rowStockSellProduct = mysqli_fetch_array($resSellStockProduct, MYSQLI_ASSOC);
                            //
                            $productStatus = $rowStockSellProduct['sttr_status'];
                            $sttr_id = $rowStockSellProduct['sttr_id'];
                            $sttr_sttr_id = $rowStockSellProduct['sttr_sttr_id'];
                            $sttr_indicator = $rowStockSellProduct['sttr_indicator'];
                            $sttr_transaction_type = $rowStockSellProduct['sttr_transaction_type'];
                            //
                            //echo '$sttr_sttr_id 2== ' . $sttr_sttr_id . '<br />';
                            //
                            $panelName = $rowStockSellProduct['sttr_panel_name'];
                            $setupPanelName = $rowStockSellProduct['sttr_panel_name']; 
                            $mainPanelName = $rowStockSellProduct['sttr_panel_name']; 
                            //
                            //echo '$panelName == ' . $panelName . '<br />';
                            //echo '$setupPanelName == ' . $setupPanelName . '<br />';
                            //echo '$mainPanelName == ' . $mainPanelName . '<br />';
                            //
                        }
                        //
                        //
                        //
                        //
                        if ($stockAvailable == 0 && $transType == 'PurchaseReturn') {
                            //
                            $newProductItemCode = $newProductPreId . $newProductPostId;
                            //
                            $querySelStockProduct = "SELECT sttr_id, sttr_sttr_id, sttr_item_pre_id, sttr_item_id, sttr_item_code,"
                                                  . "sttr_panel_name, sttr_indicator, sttr_transaction_type "
                                                  . "FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                                  . "AND sttr_item_code = '$newProductItemCode' "
                                                  . " $selStockStatusStr ";
                            //
                            //echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                            //
                            $resSellStockProduct = mysqli_query($conn, $querySelStockProduct) or 
                                                   die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                            //
                            $stockAvailable = mysqli_num_rows($resSellStockProduct);
                            //
                            //
                            if ($stockAvailable > 0 && $transType == 'PurchaseReturn') {
                            //
                            //    
                            $rowStockSellProduct = mysqli_fetch_array($resSellStockProduct, MYSQLI_ASSOC);
                            //
                            //
                            $productStatus = $rowStockSellProduct['sttr_status'];
                            $sttr_id = $rowStockSellProduct['sttr_id'];
                            $sttr_sttr_id = $rowStockSellProduct['sttr_sttr_id'];
                            $sttr_item_pre_id = $rowStockSellProduct['sttr_item_pre_id'];
                            $sttr_item_id = $rowStockSellProduct['sttr_item_id'];
                            $sttr_item_code = $rowStockSellProduct['sttr_item_code'];
                            $sttr_indicator = $rowStockSellProduct['sttr_indicator'];
                            $sttr_transaction_type = $rowStockSellProduct['sttr_transaction_type'];
                            //
                            //echo '$sttr_sttr_id 2== ' . $sttr_sttr_id . '<br />';
                            //
                            $panelName = $rowStockSellProduct['sttr_panel_name'];
                            $setupPanelName = $rowStockSellProduct['sttr_panel_name']; 
                            $mainPanelName = $rowStockSellProduct['sttr_panel_name']; 
                            //
                            //
                            //echo '$panelName == ' . $panelName . '<br />';
                            //echo '$setupPanelName == ' . $setupPanelName . '<br />';
                            //echo '$mainPanelName == ' . $mainPanelName . '<br />';
                            //
                            //
                            }
                        }
                        //
                        //
                    }                    
                    //
                    //
                    //echo '$productStatus == '.$productStatus.'<br />';
                    //
                    //
                    if ($stockAvailable == 0) { 
                        $stockAvailable = 1;
                        ?>
                        <div class="fs_14 ff_calibri orange fw_b" style="margin-left: -50px; margin-top: 14px;">
                           STOCK NOT FOUND!
                        </div>
                    <?php } 
            } else {
                $stockAvailable = 0; ?>
            <?php } ?>
        </td>
    </tr>
</table>