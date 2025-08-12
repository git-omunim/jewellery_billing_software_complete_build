<?php
/*
 * **************************************************************************************
 * @tutorial: Estimate Sub div
 * **************************************************************************************
 * 
 * Created on JUNE 07, 2018 03:24:44 PM
 *
 * @FileName: omspsbdv.php
 * @Author: SoftwareGen Developement Team (@PRIYANKA-07JUNE18)
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.76
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
$newItemPreId = $_GET['srchItemPreId'];
$newItemPostId = $_GET['srchItemPostId'];

if ($custId == '')                   
    $custId = $_GET['custId'];

$panelName = $_GET['panelName'];

$alphaFirstLetter = substr($newItemPreId, 0, 1);
$alphaId = substr($newItemPreId, 1);

if ($newItemPreId == '' && $newItemPostId != '') {
    $itemBarCodeId = substr($newItemPostId, 1);
}

$newProdCode = $newItemPreId . $newItemPostId;

//echo '$newProdCode **== '.$newProdCode.'<br />';die;

?>
<table border="0" cellspacing="0" cellpadding="1" width="100%" align="center">
    <tr>
        <td colspan="16" align="center">
            <?php
            if ($newProdCode != '') {
                
                if ($newItemPostId != '') {
                    
                    if ($newItemPreId == '' && $newItemPostId != '') {
                        $qSelStockItemId = "SELECT sttr_id,sttr_status,sttr_sell_status FROM "
                                . "stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_barcode = '$itemBarCodeId'";
                    } else {
                        $qSelStockItemId = "SELECT sttr_id,sttr_status,sttr_sell_status FROM "
                                . "stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
                                . "sttr_item_pre_id = '$newItemPreId' AND sttr_item_id = '$newItemPostId'";
                    }

                    $resStockItemId = mysqli_query($conn, $qSelStockItemId);

                    $stockAvail = mysqli_num_rows($resStockItemId);
                    
                    if ($stockAvail > 0) {
                        
                        $rowStockItemId = mysqli_fetch_array($resStockItemId, MYSQLI_ASSOC);
                        $sttr_status = $rowStockItemId['sttr_status'];

                        if ($sttr_status == 'SOLDOUT') {
                                
                                ?>
                                <div class="fs_14 ff_calibri orange fw_b">THIS ITEM IS ALREADY SOLD OUT</div>
                                <?php
                            
                        } 
                    } else {
                        $itemStockPresent = noOfRowsCheck('st_id', 'stock', "st_owner_id='$_SESSION[sessionOwnerId]' AND st_item_code='$newProdCode'");
                        $stockAvail = 1;
                    }
                } else {
                    $itemStockPresent = noOfRowsCheck('st_id', 'stock', "st_owner_id='$_SESSION[sessionOwnerId]' AND st_item_code='$newProdCode'");
                    $stockAvail = 1;
                }
            } else {
                $stockAvail = 0;
            }
            ?>
        </td>
    </tr>
</table>