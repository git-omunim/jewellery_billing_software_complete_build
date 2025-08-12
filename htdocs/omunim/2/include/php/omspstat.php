<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on JUNE 07, 2018 02:56:27 PM
 *
 * @FileName: omspstat.php
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

$newDelItemPreId = $_GET['srchdelItemPreId'];
$newDelItemPostId = $_GET['srchdelItemPostId'];

$custId = $_GET['custId'];
$panelName = $_GET['panelName'];

if ($newItemPreId == '' && $newItemPostId != '') {
    $itemBarCodeId = substr($newItemPostId, 1);
} else if ($newDelItemPreId == '' && $newDelItemPostId != '') {
    $itemBarCodeId = substr($newDelItemPostId, 1);
}
if ($newItemPostId != '' || $newDelItemPostId != '') {

    if ($newItemPostId != '') {
        if ($newItemPreId == '' && $newItemPostId != '') {
            $qSelStockItemId = "SELECT sttr_id,sttr_sell_status,sttr_status FROM stock_transaction "
                    . "where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id = '$itemBarCodeId'";
        } else {
            $qSelStockItemId = "SELECT sttr_id,sttr_sell_status,sttr_status FROM stock_transaction "
                    . "where sttr_owner_id='$_SESSION[sessionOwnerId]' "
                    . "and sttr_item_pre_id = '$newItemPreId' and sttr_item_id = '$newItemPostId'";
        }
    } else if ($newDelItemPostId != '') {
        if ($newDelItemPreId == '' && $newDelItemPostId != '') {
            $qSelStockItemId = "SELECT sttr_id,sttr_sell_status,sttr_status FROM stock_transaction "
                    . "where sttr_owner_id='$_SESSION[sessionOwnerId]' "
                    . "and sttr_id = '$itemBarCodeId' and "
                    . "sttr_transaction_type IN ('sell') and "
                    . "sttr_status IN ('SOLDOUT')";
        } else {
            $qSelStockItemId = "SELECT sttr_id,sttr_sell_status,sttr_status FROM stock_transaction "
                    . "where sttr_owner_id='$_SESSION[sessionOwnerId]' "
                    . "and sttr_item_pre_id = '$newDelItemPreId' "
                    . "and sttr_item_id = '$newDelItemPostId' and "
                    . "sttr_transaction_type IN ('sell') and "
                    . "sttr_status IN ('SOLDOUT')";
        }
    }

    $resStockItemId = mysqli_query($conn, $qSelStockItemId);
    $stockAvail = mysqli_num_rows($resStockItemId);
    $rowStockItemId = mysqli_fetch_array($resStockItemId, MYSQLI_ASSOC);
    $sttr_status = $rowStockItemId['sttr_status'];
    
    if ($stockAvail == 0) {
        echo 'THIS ITEM IS NOT EXIST INTO STOCK';
    } else if ($sttr_status == 'SOLDOUT') {
        echo 'THIS ITEM IS ALREADY SOLD OUT';
    } 
}
?>