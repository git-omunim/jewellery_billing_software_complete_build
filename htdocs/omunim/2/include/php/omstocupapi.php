<?php
/*
 * **************************************************************************************
 * @tutorial: Update Stock Table & Stock Transaction Table API
 * **************************************************************************************
 * 
 * Created on MAY 31, 2017 12:52:53 PM
 *
 * @FileName: omstocupapi.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 * Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 * MODIFICATION DATE:
 * AUTHOR:
 * REASON:
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
/********************************************************************************************/
/************************* Start Code To Update Stock Transaction Entry *********************/
/********************************************************************************************/

/**********************  START CODE TO ADD STOCK TRANSACTION FUNCTION  **********************/

function updateStockTransaction($type,array $request) {
        $conn = $GLOBALS['conn'];
        if ($type == 'crystal') {
           include 'omupcrystoc.php';
        }  else if ($type == 'imitation') {
           include 'omupimitstoc.php';
        }  else {
           include 'omupstoc.php';
        }
        
        $query = "UPDATE stock_transaction SET	
        sttr_firm_id = '$itemFirmId', sttr_staff_id = '$staffId', sttr_brand_id = '$brandId', sttr_account_id = '$itemAccountId', sttr_bis_mark = '$itemBisMark',
        sttr_bill_date = '$itemBillDate', sttr_add_date = '$itemAddDate', sttr_add_barcode_date = '$barcodeDate', sttr_barcode = '$itemBarcode',
        sttr_item_pre_id = '$itemPreId', sttr_item_id = '$itemPostId', sttr_item_code = '$itemItemCode', sttr_metal_type = '$metalType', sttr_item_name = '$itemName',
        sttr_item_category = '$itemCategory', sttr_item_safe_tray = '$stockItemSafeTray', sttr_item_other_info = '$stockItemOtherInfo',
        sttr_quantity = '$itemQuantity', sttr_size = '$itemSize', sttr_shape = '$itemShape', sttr_item_length = '$itemLength', sttr_item_width = '$itemWidth', sttr_color = '$itemColor',
        sttr_clarity = '$itemClarity', sttr_gs_weight = '$itemGrossWt', sttr_pkt_weight = '$itemPacketWt', sttr_pkt_weight_type = '$itemPacketWtTyp',
        sttr_gs_weight_type = '$itemGrossWtTyp', sttr_nt_weight = '$itemNetWt', sttr_nt_weight_type = '$itemNetWtTyp', sttr_fine_weight = '$itemFineWt', sttr_final_fine_weight = '$itemFinalFineWt',
        sttr_purity = '$itemPurity', sttr_wastage = '$itemWastage',sttr_final_purity = '$itemFinalPurity', sttr_cust_wastage = '$itemCustWastage', sttr_metal_rate_id = '$metalRateId', 
        sttr_metal_rate = '$metalRate', sttr_lab_charges = '$itemLabCharges', sttr_lab_charges_type = '$itemLabChargesTyp', sttr_total_lab_charges = '$itemTotLabCharges',
        sttr_cust_itmnum = '$itemCustItmNum', sttr_cust_itmcalby = '$itemCustCalType', sttr_item_model_no = '$itemModelNo', sttr_item_sales_pkg = '$itemPackage', sttr_cust_itmcode = '$itemCustItmCode', 
        sttr_purchase_rate = '$itemPurRate', sttr_purchase_rate = '$itemPurRateType', sttr_sell_rate = '$itemSellRate', sttr_sell_rate = '$itemSellRateType',
        sttr_making_charges = '$itemCustCharges', sttr_making_charges_type = '$itemCustChargesTyp', sttr_tax = '$itemTax', sttr_tot_tax = '$itemTotTax', sttr_valuation = '$itemValuation', 
        sttr_stone_valuation = '$itemCryFinVal', sttr_final_valuation = '$itemFinalVal', sttr_final_val_by = '$itemWeightBy', 
        sttr_pkt_qty1 = '$pkt_qt1', sttr_pkt_qty2 = '$pkt_qt2', sttr_pkt_qty3 = '$pkt_qt3', sttr_pkt_qty4 = '$pkt_qt4', sttr_pkt_qty5 = '$pkt_qt5',
        sttr_pkt_weight1 = '$pkt_wt1', sttr_pkt_weight2 = '$pkt_wt2', sttr_pkt_weight3 = '$pkt_wt3', sttr_pkt_weight4 = '$pkt_wt4', sttr_pkt_weight5 = '$pkt_wt5',
        sttr_lab_chrg_qty1 = '$pkt_lbr_qt1', sttr_lab_chrg_qty2 = '$pkt_lbr_qt2', sttr_lab_chrg_qty3 = '$pkt_lbr_qt3', sttr_lab_chrg_qty4 = '$pkt_lbr_qt4', sttr_lab_chrg_qty5 = '$pkt_lbr_qt5', 
        sttr_lab_chrg_val1 = '$pkt_lbr_val1', sttr_lab_chrg_val2 = '$pkt_lbr_val2', sttr_lab_chrg_val3 = '$pkt_lbr_val3', sttr_lab_chrg_val4 = '$pkt_lbr_val4', sttr_lab_chrg_val5 = '$pkt_lbr_val5',
        sttr_lab_chrg_tot1 = '$pkt_lbr_tot1', sttr_lab_chrg_tot2 = '$pkt_lbr_tot2', sttr_lab_chrg_tot3 = '$pkt_lbr_tot3', sttr_lab_chrg_tot4 = '$pkt_lbr_tot4', sttr_lab_chrg_tot5 = '$pkt_lbr_tot5'
        WHERE sttr_owner_id = '$ownerId' and sttr_id = '$sttr_id'";
        
        //echo '$query:'.$query;
        //exit();
         if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
}

/************************  END CODE TO ADD STOCK TRANSACTION FUNCTION  **********************/

/********************************************************************************************/
/************************* End Code To Update Stock Transaction Entry ***********************/
/********************************************************************************************/

?>