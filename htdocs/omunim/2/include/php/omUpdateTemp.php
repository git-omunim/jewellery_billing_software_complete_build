<?php
/*
 * ********************************************************************************************************************
 * @tutorial: DHANEJ CUSTOMER TEMP UPDATE FILE @AUTHOR:PRIYANKA-28MAR2022
 * ********************************************************************************************************************
 * 
 * Created on 28 MAR, 2022 06:30:56 PM
 *
 * @FileName:omUpdateTemp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@omunim.com
 * @ProjectName: omunim
 * @version 2.7.136
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: 
 *  AUTHOR: @AUTHOR:PRIYANKA-28MAR2022
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
$updateStockEntryQuery = "UPDATE stock_transaction SET sttr_recreate_status = 'YES' 
                          WHERE sttr_stock_type = 'wholesale'
                          AND sttr_item_name = 'KHATKA BALI'
                          AND sttr_item_category = 'KHATKA BALI'
                          AND sttr_transaction_type = 'EXISTING' ORDER BY sttr_id ASC ";
//
//
//echo '$updateStockEntryQuery == ' . $updateStockEntryQuery . '<br /><br />';
//
//
if (!mysqli_query($conn, $updateStockEntryQuery)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
$deleteStockEntryQuery = "DELETE FROM stock WHERE st_item_name = 'KHATKA BALI'
                          AND st_item_category = 'KHATKA BALI' 
                          AND (st_stock_type IS NULL OR st_stock_type = '') ";
//
//
//echo '$deleteStockEntryQuery 1== ' . $deleteStockEntryQuery . '<br /><br />';
//
//
if (!mysqli_query($conn, $deleteStockEntryQuery)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
?>

