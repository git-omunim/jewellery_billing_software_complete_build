<?php
//
/*
 * **************************************************************************************
 * @tutorial: TEMP VIEW TABLE FOR STOCK TALLY BY RFID 
 * **************************************************************************************
 *
 * Created on 08 DEC 2022 02:07 pm
 *
 * @FileName: omStockTallyDataView.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @version 2.7
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
 *
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
?>
<?php
//
$sttr_item_category = $_REQUEST['productCategory'];
if ($productCategory != '' && $productCategory != NULL &&
        $productCategory != 'NotSelected' && $productCategory != 'undefined') {
    $strCategory = "AND sttr_item_category = '$productCategory' ";
} else {
    if ($panelName == 'StockTallyByRFID') {
        $strCategory = 'order by sttr_item_category asc LIMIT 0,1';
    } else {
        $strCategory = '';
    }
}
if ($productLocation != '' && $productLocation != NULL &&
        $productLocation != 'NotSelected' && $productLocation != 'undefined') {
    $strLocation = "AND sttr_location = '$productLocation' ";
} else {
    $strLocation = '';
}
// PRODUCT COUNTER NAME 
if ($productCounterName != '' && $productCounterName != NULL &&
        $productCounterName != 'NotSelected' && $productCounterName != 'undefined') {
    $strCounterName = "AND sttr_counter_name = '$productCounterName' ";
} else {
    $strCounterName = '';
}
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS//
///***************************START CODE TO CREATE TABLE FOR STOCK TALLY @RENUKA SHARMA-08/12/2022***************************
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE//
$createTempView = "CREATE TABLE IF NOT EXISTS temp_view_stock_tally(
sttr_id                                                        INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
sttr_owner_id                                                   VARCHAR(16),
sttr_st_id                                                      VARCHAR(16),
sttr_firm_id                                                    VARCHAR(16),
sttr_transaction_type                                           VARCHAR(20),
sttr_item_pre_id 						VARCHAR(20),
sttr_item_code                                                  VARCHAR(20),
sttr_add_date                                                   VARCHAR(20),
sttr_item_id 							VARCHAR(16),
sttr_stock_type                                                 VARCHAR(16),
sttr_item_category 						VARCHAR(80),
sttr_item_name 							VARCHAR(80),
sttr_status                                                     VARCHAR(20),
sttr_item_name_online                                           VARCHAR(80),
sttr_quantity                                                   VARCHAR(20),
sttr_fine_weight                                                VARCHAR(20),
sttr_metal_type                                                 VARCHAR(20),
sttr_purity                                                     VARCHAR(20),
sttr_gs_weight                                                  VARCHAR(20),
sttr_gs_weight_type                                             VARCHAR(20),
sttr_nt_weight                                                  VARCHAR(20), 
sttr_nt_weight_type                                             VARCHAR(20),
sttr_sell_status                                                VARCHAR(20),
sttr_rfid_no                                                    VARCHAR(64),
sttr_rfid_tally_profile                                         VARCHAR(24),
sttr_rfid_tally_status                                          VARCHAR(2),
sttr_rfid_tally_date                                            VARCHAR(20),
sttr_rfid_tally_time                                            VARCHAR(20), 
sttr_rfid_tally_open_report                                     VARCHAR(20),  
sttr_rfid_tally_close_report                                    VARCHAR(20),  
sttr_location                                                   VARCHAR(64),
sttr_barcode_prefix 						VARCHAR(4),
sttr_barcode 							VARCHAR(64),
sttr_barcode_tally_profile                                      VARCHAR(24),
sttr_barcode_tally_status                                       VARCHAR(2),  
sttr_barcode_tally_date                                         VARCHAR(20), 
sttr_barcode_tally_time                                         VARCHAR(20), 
sttr_add_barcode_date                                           VARCHAR(24),
sttr_indicator                                                  VARCHAR(30),
sttr_counter_name 						VARCHAR(30),
sttr_tally_status                                               VARCHAR(32),
sttr_tally_quantity 	                                        VARCHAR(20),
last_column                                                     VARCHAR(1))AUTO_INCREMENT=1";
//
$sqlTable = "DESC temp_view_stock_tally";
//
mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_view_stock_tally";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createTempView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createTempView) or die('<br/> ERROR:' . mysqli_error($conn));
}
$fetchStocksDetails = "SELECT sttr_id ,sttr_owner_id,sttr_st_id,sttr_firm_id,sttr_transaction_type,sttr_item_pre_id,sttr_item_code,sttr_add_date,sttr_item_id,sttr_stock_type,sttr_metal_type,sttr_fine_weight,sttr_purity,sttr_item_category,sttr_item_name,sttr_status,sttr_item_name_online,sttr_quantity, sttr_gs_weight, sttr_gs_weight_type, sttr_nt_weight, sttr_nt_weight_type,                                         
sttr_rfid_no,sttr_rfid_tally_profile,sttr_rfid_tally_status,sttr_rfid_tally_date,sttr_rfid_tally_time,sttr_rfid_tally_open_report,sttr_rfid_tally_close_report,sttr_sell_status,sttr_item_code,                                     
sttr_location,sttr_indicator,sttr_counter_name,sttr_tally_status,sttr_tally_quantity  from stock_transaction  where sttr_item_category='$sttr_item_category' and sttr_status !='SOLDOUT'and sttr_stock_type ='retail' "
        . "and sttr_rfid_no IS NOT NULL "
        . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG','ItemReturn' ,'ESTIMATE') "
        . "and sttr_indicator IN ('stock') $strLocation $strCounterName"
        . "and (sttr_rfid_tally_status!='Y' OR sttr_rfid_tally_status IS NULL)$strCategory ";
//
$resStocksDetails = mysqli_query($conn, $fetchStocksDetails) or die(mysqli_error($conn));
while ($rowStockDetails = mysqli_fetch_array($resStocksDetails, MYSQLI_ASSOC)) {
    $sttr_id = trim($rowStockDetails['sttr_id']);
    $sttr_owner_id = trim($rowStockDetails['sttr_owner_id']);
    $sttr_firm_id = trim($rowStockDetails['sttr_firm_id']);
    $sttr_transaction_type = trim($rowStockDetails['sttr_transaction_type']);
    $sttr_item_pre_id = trim($rowStockDetails['sttr_item_pre_id']);
    $sttr_item_id = trim($rowStockDetails['sttr_item_id']);
    $sttr_stock_type = trim($rowStockDetails['sttr_stock_type']);
    $sttr_item_category = trim($rowStockDetails['sttr_item_category']);
    $sttr_item_name = trim($rowStockDetails['sttr_item_name']);
    $sttr_status = trim($rowStockDetails['sttr_status']);
    $sttr_item_name_online = trim($rowStockDetails['sttr_item_name_online']);
    //
    $sttr_gs_weight = trim($rowStockDetails['sttr_gs_weight']);
    $sttr_gs_weight_type = trim($rowStockDetails['sttr_gs_weight_type']);
    $sttr_nt_weight = trim($rowStockDetails['sttr_nt_weight']);
    $sttr_nt_weight_type = trim($rowStockDetails['sttr_nt_weight_type']);
//
    $sttr_rfid_no = trim($rowStockDetails['sttr_rfid_no']);
    $sttr_rfid_tally_profile = trim($rowStockDetails['sttr_rfid_tally_profile']);
    $sttr_rfid_tally_status = trim($rowStockDetails['sttr_rfid_tally_status']);
    $sttr_rfid_tally_date = trim($rowStockDetails['sttr_rfid_tally_date']);
    $sttr_rfid_tally_time = trim($rowStockDetails['sttr_rfid_tally_time']);
    $sttr_rfid_tally_open_report = trim($rowStockDetails['sttr_rfid_tally_open_report']);
    $sttr_rfid_tally_close_report = trim($rowStockDetails['sttr_rfid_tally_close_report']);
    $sttr_location = trim($rowStockDetails['sttr_location']);
    $sttr_indicator = trim($rowStockDetails['sttr_indicator']);
    $sttr_counter_name = trim($rowStockDetails['sttr_counter_name']);
    $sttr_tally_status = trim($rowStockDetails['sttr_tally_status']);
    $sttr_tally_quantity = trim($rowStockDetails['sttr_tally_quantity']);
    $sttr_sell_status = trim($rowStockDetails['sttr_sell_status']);
    $sttr_item_code = trim($rowStockDetails['sttr_item_code']);
    $sttr_add_date = trim($rowStockDetails['sttr_add_date']);
    $sttr_fine_weight = trim($rowStockDetails['sttr_fine_weight']);
    $sttr_metal_type = trim($rowStockDetails['sttr_metal_type']);
    $sttr_purity = trim($rowStockDetails['sttr_purity']);
    $sttr_quantity= trim($rowStockDetails['sttr_quantity']);
    $insert = "INSERT into temp_view_stock_tally(sttr_id ,sttr_owner_id,sttr_st_id,sttr_firm_id,sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_status,sttr_item_name_online ,sttr_quantity , sttr_gs_weight, sttr_gs_weight_type, sttr_nt_weight, sttr_nt_weight_type,sttr_metal_type,sttr_fine_weight,sttr_purity,sttr_sell_status,sttr_item_code,sttr_add_date, sttr_rfid_no,sttr_rfid_tally_profile,sttr_rfid_tally_status,sttr_rfid_tally_date,sttr_rfid_tally_time,sttr_rfid_tally_open_report,sttr_rfid_tally_close_report,                                     
sttr_location,sttr_indicator,sttr_counter_name,sttr_tally_status,sttr_tally_quantity)"
            . "VALUES"
            . "( '$sttr_id' , '$sttr_owner_id' ,'$sttr_st_id', '$sttr_firm_id' , '$sttr_transaction_type' , '$sttr_item_pre_id' , '$sttr_item_id' , '$sttr_stock_type'
 , '$sttr_item_category' , '$sttr_item_name' ,'$sttr_status', '$sttr_item_name_online' ,'$sttr_quantity','$sttr_gs_weight','$sttr_gs_weight_type', '$sttr_nt_weight', '$sttr_nt_weight_type','$sttr_metal_type','$sttr_fine_weight','$sttr_purity','$sttr_sell_status','$sttr_item_code','$sttr_add_date','$sttr_rfid_no','$sttr_rfid_tally_profile','$sttr_rfid_tally_status','$sttr_rfid_tally_date','$sttr_rfid_tally_time','$sttr_rfid_tally_open_report', '$sttr_rfid_tally_close_report' ,'$sttr_location','$sttr_indicator','$sttr_counter_name','$sttr_tally_status' ,'$sttr_tally_quantity')";

    mysqli_query($conn, $insert) or die('<br/> ERROR:' . mysqli_error($conn));
}
?>
