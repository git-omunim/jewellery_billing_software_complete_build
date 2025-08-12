<?php
/*
 * **************************************************************************************
 * @Description: STOCK TABLE DETAILS WITH STOCK_TRANSACTION @PRATHAMESH-12MAR2024
 * **************************************************************************************
 *
 * Created on JULY 05, 2017 06:29:36 PM
 *
 * @FileName: omstockmeltingtempview.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMERP
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
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
require_once 'system/omssopin.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<?php
//
$createView = "CREATE TABLE IF NOT EXISTS temp_stock_sttr_view (
temp_st_id                                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
st_id                                           INTEGER,
st_owner_id                                     VARCHAR(16),
st_firm_id                                      VARCHAR(16),
st_metal_type 					VARCHAR(16),
st_product_type 			        VARCHAR(32),    
st_stock_type                                   VARCHAR(16),
st_item_name 					VARCHAR(80),
st_item_category 				VARCHAR(80),
st_barcode 					VARCHAR(10),
st_barcode_prefix                               VARCHAR(10), 
st_quantity 					VARCHAR(10),
st_purity 					VARCHAR(15),
st_wastage 					VARCHAR(15),
st_final_purity 				VARCHAR(16),
st_avg_wastage 					VARCHAR(15),
st_metal_rate 					VARCHAR(20),
st_pur_avg_rate                                 VARCHAR(20),
st_gs_weight 					VARCHAR(16),
st_gs_weight_type 				VARCHAR(10),
st_pkt_weight 					VARCHAR(16),
st_pkt_weight_type 				VARCHAR(10),
st_less_weight 					VARCHAR(16),
st_less_weight_type 				VARCHAR(10),
st_nt_weight 					VARCHAR(16),
st_nt_weight_type 				VARCHAR(10),
st_tag_weight 					VARCHAR(16),
st_fine_weight 					VARCHAR(16),
st_fine_weight_type 				VARCHAR(10),
st_final_fine_weight 				VARCHAR(16),
st_purchase_rate                                VARCHAR(16),
st_purchase_rate_type                           VARCHAR(10),
st_sell_rate                                    VARCHAR(16),
st_sell_rate_type                               VARCHAR(10),
st_lab_charges                                  VARCHAR(15),
st_lab_charges_type                             VARCHAR(10),
st_making_charges 				VARCHAR(15),
st_making_charges_type                          VARCHAR(10),
st_pur_avg_lab_chrgs                            VARCHAR(20),
st_pur_avg_other_chrgs                          VARCHAR(20),
st_tot_tax 					VARCHAR(16),
st_tax                                          VARCHAR(16),
st_valuation 					VARCHAR(50),
st_stone_valuation 				VARCHAR(50),
st_final_valuation 				VARCHAR(50),
st_since 					VARCHAR(50),
st_status 					VARCHAR(16),
st_item_code                                    VARCHAR(16),
st_type 					VARCHAR(16),          
st_disc_product_amount                          VARCHAR(16),
st_online_product_disc                          VARCHAR(16),
st_online_product_price_bounce                  VARCHAR(16),
st_disc_making_discount 			VARCHAR(16),
st_disc_stone_discount                          VARCHAR(16),
st_disc_product_discount 			VARCHAR(16),        
st_product_commission_amount 			VARCHAR(16),
st_disc_start_date                              VARCHAR(32),
st_disc_end_date                                VARCHAR(32),
st_price                                        VARCHAR(16),
st_price_without_tax                            VARCHAR(16),    
st_cust_itmpricecode                            VARCHAR(16),
st_cust_itmcode                                 VARCHAR(16),
st_cust_itmcalby                                VARCHAR(16),
st_cust_itmnum                                  VARCHAR(16),
st_item_model_no                                VARCHAR(16),         
st_period                                       VARCHAR(16),
st_period_type                                  VARCHAR(16),
st_cust_price                                   VARCHAR(16),     
st_shape                                        VARCHAR(16),
st_size                                         VARCHAR(16),
st_item_length                                  VARCHAR(16),
st_item_width                                   VARCHAR(16),
st_item_sales_pkg                               VARCHAR(16),
st_clarity                                      VARCHAR(16),
st_color                                        VARCHAR(16),
st_image_id                                     VARCHAR(10),
st_item_other_info                              VARCHAR(16))";
$sqlTable = 'DESC temp_stock_sttr_view';
mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_stock_sttr_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die(__LINE__.'<br/> ERROR:' . mysqli_error($conn));
}
//
$st_query = "SELECT * FROM stock where st_owner_id = '$_SESSION[sessionOwnerId]';";
$st_result = mysqli_query($conn,$st_query);
//
while($st = mysqli_fetch_assoc($st_result)){
    //
    $gdItemCat = $st['st_item_category'];
    $gdItemName = $st['st_item_name'];
    $gdGsWt = $st['st_gs_weight'];
    $gdNtWt = $st['st_nt_weight'];
    $gdQty = $st['st_quantity'];
    $st_id_temp = $st['st_id'];
    parse_str(getTableValues("select SUM(sttr_gs_weight) as gdGsWtSttr,SUM(sttr_quantity) as gdQtySttr,SUM(sttr_nt_weight) as gdNtWtSttr from stock_transaction where sttr_item_category = '$gdItemCat' AND sttr_item_name = '$gdItemName' AND sttr_transaction_type IN ('EXISTING') AND sttr_status IN ('EXISTING') AND sttr_melting_status = 'AFM'; "));
    $gdGsWt -= $gdGsWtSttr;
    $gdNtWt -= $gdNtWtSttr;
    $gdQty -= $gdQtySttr;
    //
    $inset_stock = "INSERT INTO temp_stock_sttr_view (st_id, st_owner_id, st_firm_id, st_metal_type, st_product_type, st_stock_type, st_item_name, st_item_category, st_barcode, st_barcode_prefix, st_quantity, st_purity, st_wastage, st_final_purity, st_avg_wastage, st_metal_rate, st_pur_avg_rate, st_gs_weight, st_gs_weight_type, st_pkt_weight, st_pkt_weight_type,st_less_weight, st_less_weight_type, st_nt_weight, st_nt_weight_type, st_tag_weight, st_fine_weight, st_fine_weight_type, st_final_fine_weight, st_purchase_rate, st_purchase_rate_type, st_sell_rate, st_sell_rate_type, st_lab_charges, st_lab_charges_type, st_making_charges, st_making_charges_type, st_pur_avg_lab_chrgs, st_pur_avg_other_chrgs, st_tot_tax, st_tax, st_valuation, st_stone_valuation, st_final_valuation, st_since, st_status, st_item_code, st_type, st_disc_product_amount, st_online_product_disc, st_online_product_price_bounce, st_disc_making_discount, st_disc_stone_discount, st_disc_product_discount, st_product_commission_amount, st_disc_start_date, st_disc_end_date, st_price, st_price_without_tax, st_cust_itmpricecode)"
                 . " SELECT st_id, st_owner_id, st_firm_id, st_metal_type, st_product_type, st_stock_type, st_item_name, st_item_category, st_barcode, st_barcode_prefix, '$gdQty', st_purity, st_wastage, st_final_purity, st_avg_wastage, st_metal_rate, st_pur_avg_rate, '$gdGsWt', st_gs_weight_type, st_pkt_weight, st_pkt_weight_type,st_less_weight, st_less_weight_type, $gdNtWt, st_nt_weight_type, st_tag_weight, st_fine_weight, st_fine_weight_type, st_final_fine_weight, st_purchase_rate, st_purchase_rate_type, st_sell_rate, st_sell_rate_type, st_lab_charges, st_lab_charges_type, st_making_charges, st_making_charges_type, st_pur_avg_lab_chrgs, st_pur_avg_other_chrgs, st_tot_tax, st_tax, st_valuation, st_stone_valuation, st_final_valuation, st_since, st_status, st_item_code, st_type, st_disc_product_amount, st_online_product_disc, st_online_product_price_bounce, st_disc_making_discount, st_disc_stone_discount, st_disc_product_discount, st_product_commission_amount, st_disc_start_date, st_disc_end_date, st_price, st_price_without_tax, st_cust_itmpricecode from stock where st_id = '$st_id_temp' ;";
    $result_inser_query = mysqli_query($conn, $inset_stock);
    $gdGsWt = 0;
    $gdNtWt = 0;
}
?>