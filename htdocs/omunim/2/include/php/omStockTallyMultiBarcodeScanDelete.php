<?php
/*
 * **************************************************************************************
 * @tutorial: Stock Tally Multi Barcode Scan Delete @AUTHOR-PRIYANKA-15SEP23
 * **************************************************************************************
 * 
 * Created on 15 SEP, 2025 18:30:40 PM
 *
 * @FileName: omStockTallyMultiBarcodeScanDelete.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.280
 * @Copyright (c) 2023 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2023 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON:
 *
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
//
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
//
// Start Code for Firm String
include 'ommpfrmstr.php';
// End Code for Firm String
//
//
?>
<?php
//
//
//print_r($_REQUEST);
//
//
if ($_REQUEST['productCategory'] != '' && $_REQUEST['productCategory'] != NULL) {
//
//
// Update status in stock_transaction table @AUTHOR-PRIYANKA-15SEP23
$updateMultiBarcodeStock = "UPDATE stock_transaction s1
                            LEFT JOIN temp_view_multibarcode_stock s2
                            ON s1.sttr_item_code = s2.sttr_item_code
                            SET s1.sttr_status = 'DELETED'          
                            WHERE s1.sttr_status != 'SOLDOUT'
                            and s1.sttr_item_category = '$_REQUEST[productCategory]'
                            and s1.sttr_stock_type = 'retail'
                            and s1.sttr_transaction_type IN ('EXISTING','PURONCASH','TAG')
                            and s1.sttr_indicator IN ('stock')
                            and (s2.sttr_barcode_tally_status != 'Y' OR s2.sttr_barcode_tally_status IS NULL OR s2.sttr_barcode_tally_status = '')"; 
// 
//echo '<br />$updateMultiBarcodeStock == ' . $updateMultiBarcodeStock . '<br /><br />';
//
if (!mysqli_query($conn, $updateMultiBarcodeStock)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
// Move into stock_transaction_del table @AUTHOR-PRIYANKA-15SEP23
    $query = "INSERT INTO stock_transaction_del (sttr_id,sttr_st_id,sttr_sttrin_id,sttr_owner_id,sttr_jrnl_id,sttr_firm_id,sttr_user_id,sttr_account_id,sttr_utin_id,sttr_staff_id,sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_barcode_prefix,sttr_barcode,sttr_add_barcode_date,sttr_item_code,sttr_indicator,sttr_brand_id,sttr_bis_mark,sttr_image_id,sttr_add_date,sttr_bill_date,sttr_mfg_date,sttr_tally_date,sttr_hsn_no,sttr_size,sttr_shape,sttr_color,sttr_quantity,sttr_clarity,sttr_metal_rate,sttr_metal_rate_id,sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_making_charges,sttr_making_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_stone_valuation,sttr_final_valuation,sttr_status,sttr_current_status,sttr_sell_status,sttr_bc_print_status,sttr_stock_add,sttr_item_ent_type,sttr_other_info,sttr_item_other_info,sttr_pre_invoice_no,sttr_invoice_no,sttr_purchase_rate,sttr_purchase_rate_type,sttr_sell_rate,sttr_sell_rate_type,sttr_crystal_yn,sttr_other_charges_by,sttr_final_val_by,sttr_since,sttr_comments,sttr_value_added,sttr_item_safe_tray,sttr_cust_itmcalby,sttr_cust_itmcode,sttr_cust_itmnum,sttr_item_length,sttr_item_width,sttr_item_model_no,sttr_item_sales_pkg,sttr_price,sttr_cust_price,sttr_purchase_price,sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_wt_auto_less) "
           . "SELECT sttr_id,sttr_st_id,sttr_sttrin_id,sttr_owner_id,sttr_jrnl_id,sttr_firm_id,sttr_user_id,sttr_account_id,sttr_utin_id,sttr_staff_id,sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_barcode_prefix,sttr_barcode,sttr_add_barcode_date,sttr_item_code,sttr_indicator,sttr_brand_id,sttr_bis_mark,sttr_image_id,sttr_add_date,sttr_bill_date,sttr_mfg_date,sttr_tally_date,sttr_hsn_no,sttr_size,sttr_shape,sttr_color,sttr_quantity,sttr_clarity,sttr_metal_rate,sttr_metal_rate_id,sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_making_charges,sttr_making_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_stone_valuation,sttr_final_valuation,sttr_status,sttr_current_status,sttr_sell_status,sttr_bc_print_status,sttr_stock_add,sttr_item_ent_type,sttr_other_info,sttr_item_other_info,sttr_pre_invoice_no,sttr_invoice_no,sttr_purchase_rate,sttr_purchase_rate_type,sttr_sell_rate,sttr_sell_rate_type,sttr_crystal_yn,sttr_other_charges_by,sttr_final_val_by,sttr_since,sttr_comments,sttr_value_added,sttr_item_safe_tray,sttr_cust_itmcalby,sttr_cust_itmcode,sttr_cust_itmnum,sttr_item_length,sttr_item_width,sttr_item_model_no,sttr_item_sales_pkg,sttr_price,sttr_cust_price,sttr_purchase_price,sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_wt_auto_less "
           . "FROM stock_transaction WHERE sttr_status = 'DELETED'";
    //  
    //
    //echo '$query == ' . $query . '<br /><br />';
    //
    //
    if (!mysqli_query($conn, $query)) {
        die('Error (Line No - ' . __LINE__ . '): ' . mysqli_error($conn));
    }
    //
    // Show delete date into stock_transaction_del table @AUTHOR-PRIYANKA-15SEP23
    //
    $delDate = strtoupper(date('d M Y'));
    //
    // Show delete log @AUTHOR-PRIYANKA-15SEP23
    //
    $currentDate = date('Y-m-d H:i:s');
    $currentFile = 'omStockTallyMultiBarcodeScanDelete';
    $currentFunction = 'stock_transaction';
    $currentLine = __LINE__;
    //
    $sttr_del_log = $currentDate . ' ' . 'File: ' . $currentFile . ' ' . 'Function: ' . $currentFunction . ' ' . 'Line ' . $currentLine;
    //
    $deleted_sttr_id = $sttrId;
    //
    $upd_query = " UPDATE stock_transaction_del SET sttr_del_date = '$delDate', sttr_del_log = ' $sttr_del_log' "
               . " WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_id = '$deleted_sttr_id' ";
    //
    if (!mysqli_query($conn, $upd_query)) {
        die('Error (Line No - ' . __LINE__ . '): ' . mysqli_error($conn));
    }
//
//
// Delete stock from stock_transaction table @AUTHOR-PRIYANKA-15SEP23
$deleteMultibarcodeStock = "DELETE s1 FROM stock_transaction s1
                            LEFT JOIN temp_view_multibarcode_stock s2
                            ON s1.sttr_item_code = s2.sttr_item_code
                            WHERE s1.sttr_status != 'SOLDOUT'
                            and s1.sttr_item_category = '$_REQUEST[productCategory]'
                            and s1.sttr_stock_type = 'retail'
                            and s1.sttr_transaction_type IN ('EXISTING','PURONCASH','TAG')
                            and s1.sttr_indicator IN ('stock')
                            and (s2.sttr_barcode_tally_status != 'Y' OR s2.sttr_barcode_tally_status IS NULL OR s2.sttr_barcode_tally_status = '')"; 
// 
//echo '$deleteMultibarcodeStock == ' . $deleteMultibarcodeStock . '<br /><br />';
//
if (!mysqli_query($conn, $deleteMultibarcodeStock)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
//
// Delete stock from temp_view_multibarcode_stock table @AUTHOR-PRIYANKA-16SEP23
$deleteFromTempViewMultibarcodeStock = "DELETE FROM temp_view_multibarcode_stock 
                                        WHERE sttr_item_category = '$_REQUEST[productCategory]'
                                        AND sttr_status != 'SOLDOUT'
                                        AND sttr_stock_type = 'retail'
                                        AND sttr_transaction_type IN ('EXISTING','PURONCASH','TAG')
                                        AND sttr_indicator IN ('stock')
                                        AND (sttr_barcode_tally_status != 'Y' OR sttr_barcode_tally_status IS NULL OR sttr_barcode_tally_status = '')"; 
// 
//echo '$deleteFromTempViewMultibarcodeStock == ' . $deleteFromTempViewMultibarcodeStock . '<br /><br />';
//
if (!mysqli_query($conn, $deleteFromTempViewMultibarcodeStock)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
//
//
}
//
//
?>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="center" valign="middle">
            <div id="messDisplayDiv"></div>
            <div class="analysis_div_rows main_link_red_12">
                <div id="ajax_upated_div" style="visibility: visible; background:none; font-size: 14px;"> ~ Deleted Successfully ~ </div>
            </div>
        </td>
    </tr>
</table>
<?php
//
//
include 'ogtallyMultiBarcodeScanResult.php'; 
//
//
?>