<?php
/*
 * *************************************************************************************************
 * @tutorial: STOCK STATUS CHECK FILE FOR STOCK MANAGEMENT 
 * *************************************************************************************************
 * 
 * Created on 14 NOV, 2024 06:42:00 PM
 *
 * @FileName: omstockstatuscheckforstockmanagement.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-25NOV2021
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
$sttrPanelName = $_REQUEST['sttrPanelName'];
$sttrItemCode = $_REQUEST['sttrItemCode'];
//
//echo '$newProductPreId == '.$newProductPreId.'<br />';
//echo '$newProductPostId == '.$newProductPostId.'<br />';
//

//
$newProductCode = $newProductPreId . $newProductPostId;
//
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
                if ($newProductPostId != '' || ($newProductPostId == '' && $sttrPanelName == 'RETAIL_CAD_STOCK')) {
                  
                        //
                         $querySelStockProduct = "SELECT sttr_id, sttr_sttrin_id, sttr_status, "
                                              . "sttr_sell_status, sttr_panel_name FROM stock_transaction "
                                              . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                              . "AND ((sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId') OR (sttr_item_code = '$sttrItemCode' AND sttr_panel_name='RETAIL_CAD_STOCK')) "
                                              . "AND sttr_stock_type = 'retail' "
                                              . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                                              . "AND sttr_indicator != 'stockCrystal' ";
                    //
//                    echo '$querySelStockProduct == ' . $querySelStockProduct . '<br />';
                    //
                    $resStockProduct = mysqli_query($conn, $querySelStockProduct) or die("<br/>querySelStockProduct: $querySelStockProduct <br/>Error:" . mysqli_error($conn));
                    $stockAvailable = mysqli_num_rows($resStockProduct);
                    //
                    //
//                    echo '$stockAvailable == ' . $stockAvailable . '<br />';
                    
                    if ($stockAvailable > 0) {
                        //
                        $rowStockProduct = mysqli_fetch_array($resStockProduct, MYSQLI_ASSOC);
                        $productStatus = $rowStockProduct['sttr_status'];
//                        $sttr_id = $rowStockProduct['sttr_id'];
                       
                        if ($productStatus == 'SOLDOUT') { ?>
                            <div class="fs_14 ff_calibri orange fw_b" style="margin-left: -60px; margin-top: 41px;">
                                THIS PRODUCT IS ALREADY SOLD OUT
                            </div>
                        <?php
                        $stockAvailable = 0;
                        //
                        }
                        //
                    } 
                }
            } else {
                $stockAvailable = 0;
            }
            ?>
        </td>
    </tr>
</table>