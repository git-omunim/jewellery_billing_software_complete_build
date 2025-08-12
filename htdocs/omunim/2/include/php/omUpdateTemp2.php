<?php
/*
 * ********************************************************************************************************************
 * @tutorial: DHANEJ CUSTOMER TEMP UPDATE FILE @AUTHOR:PRIYANKA-28MAR2022
 * ********************************************************************************************************************
 * 
 * Created on 28 MAR, 2022 06:30:56 PM
 *
 * @FileName:omUpdateTemp2.php
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
$updateStockEntryQuery1 = "UPDATE stock_transaction SET sttr_purity = '85'
                           WHERE sttr_item_name = 'GOL MANI'
                           AND sttr_item_category = 'GOL MANI'
                           AND sttr_purity = '9'
                           AND sttr_item_pre_id = 'GM' AND sttr_item_id = '1175' 
                           ORDER BY sttr_id ASC ";
//
//
//echo '$updateStockEntryQuery1 == ' . $updateStockEntryQuery1 . '<br /><br />';
//
//
if (!mysqli_query($conn, $updateStockEntryQuery1)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
$updateStockEntryQuery = "UPDATE stock_transaction SET sttr_recreate_status = 'YES' 
                          WHERE sttr_item_name = 'GOL MANI'
                          AND sttr_item_category = 'GOL MANI'
                          AND sttr_transaction_type = 'EXISTING' 
                          ORDER BY sttr_id ASC ";
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
$deleteStockEntryQuery = "DELETE FROM stock WHERE st_item_name = 'GOL MANI'
                          AND st_item_category = 'GOL MANI' ";
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