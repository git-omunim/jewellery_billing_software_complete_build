<?php

/*
 * **************************************************************************************
 * @tutorial: RECREATE STOCK CONSOLIDATION INTO STOCK TABLE FOR ALL CATEGORY @PRATHAMESH 05 SEPT
 * **************************************************************************************
 * 
 * Created on 05 SEPT, 2024 04:00:00 PM
 *
 * @FileName: omStockRecreateFinal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.274
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
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
include_once 'ommpfndv.php';
?>
<?php

include_once 'ommptbupd_stock_frm_id_null.php';
include_once 'ommptbupd_stock_fix.php';
// 
//
$qSelStockItemDetails1 = "SELECT sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity, sttr_indicator, sttr_transaction_type, sttr_st_id  "
        . "FROM stock_transaction "
        . "WHERE sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
        . "AND sttr_indicator NOT IN ('stockCrystal') "
        . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity "
        . "ORDER BY sttr_item_category, sttr_item_name ASC ";
//
$resStockItemDetails1 = mysqli_query($conn, $qSelStockItemDetails1);
//
$noOfStockAvailable1 = mysqli_num_rows($resStockItemDetails1);
//
//
while ($rowStockItemDetails1 = mysqli_fetch_array($resStockItemDetails1)) {
//
    $firm_id = $rowStockItemDetails1['sttr_firm_id'];
    $metal_type = $rowStockItemDetails1['sttr_metal_type'];
    $item_category = $rowStockItemDetails1['sttr_item_category'];
    $item_name = $rowStockItemDetails1['sttr_item_name'];
    $stock_type = $rowStockItemDetails1['sttr_stock_type'];
    $purity = $rowStockItemDetails1['sttr_purity'];
//
    $query = "UPDATE stock SET st_quantity='',st_avg_purity='',st_final_purity='',st_metal_rate='',st_gs_weight='',st_pkt_weight='',st_nt_weight='',st_fine_weight='',st_final_fine_weight='',
st_purchase_rate='',st_pur_avg_rate='',st_making_charges='',st_valuation='',st_final_valuation='',st_price='',st_price_without_tax='' 
where st_metal_type = '$metal_type' and st_item_category = '$item_category' and st_item_name = '$item_name' and st_firm_id = '$firm_id' and st_purity = '$purity' AND st_stock_type='$stock_type' ";
//
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }

    if ($rowStockItemDetails1['sttr_indicator'] == 'AddInvoice') {
        $sttr_indicator = 'stock';
    } else {
        $sttr_indicator = $rowStockItemDetails1['sttr_indicator'];
    }
//
    $noOfStockAvailable = 0;
    $noOfSellStockAvailable = 0;
//
    $qSelStockItemDetails = "SELECT sum(sttr_quantity) as sttr_quantity,"
            . "sum(case when sttr_gs_weight_type='KG' then sttr_gs_weight*1000  when sttr_gs_weight_type='MG' then sttr_gs_weight/1000 when sttr_gs_weight_type='CT' then sttr_gs_weight/5 else sttr_gs_weight end) as sttr_gs_weight, sttr_gs_weight_type,"
            . "sum(case when sttr_nt_weight_type='KG' then sttr_nt_weight*1000  when sttr_nt_weight_type='MG' then sttr_nt_weight/1000 when sttr_nt_weight_type='CT' then sttr_nt_weight/5 else sttr_nt_weight end) as sttr_nt_weight, sttr_nt_weight_type,"
            . "sum(case when sttr_pkt_weight_type='KG' then sttr_pkt_weight*1000  when sttr_pkt_weight_type='MG' then sttr_pkt_weight/1000 when sttr_pkt_weight_type='CT' then sttr_pkt_weight/5 else sttr_pkt_weight end) as sttr_pkt_weight, sttr_pkt_weight_type,"
            . "sum(sttr_fine_weight) as sttr_fine_weight,"
            . "sum(sttr_final_quantity) as sttr_final_quantity,"
            . "sum(sttr_final_gs_weight) as sttr_final_gs_weight,"
            . "sum(sttr_final_nt_weight) as sttr_final_nt_weight,"
            . "sum(sttr_final_fn_weight) as sttr_final_fn_weight,"
            . "sum(sttr_final_fine_weight) as sttr_final_fine_weight,"
            . "sum(sttr_lab_charges) as sttr_lab_charges, sttr_lab_charges_type,"
            . "sum(sttr_making_charges) as sttr_making_charges, sttr_making_charges_type,"
            . "sum(sttr_tax) as sttr_tax, sum(sttr_tot_tax) as sttr_tot_tax,"
            . "sum(sttr_valuation) as sttr_valuation, sum(sttr_final_valuation) as sttr_final_valuation,"
            . "sttr_owner_id, sttr_firm_id, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, sttr_item_model_no,"
            . "sttr_stock_type, sttr_indicator, sttr_item_code, sttr_item_pre_id, sttr_item_id, sttr_purity, sttr_wastage, sttr_final_purity,"
            . "sttr_price, sttr_cust_price, sttr_purchase_rate, sttr_purchase_rate_type, sttr_sell_rate, sttr_sell_rate_type,"
            . "sttr_cust_itmcalby, sttr_cust_itmcode, sttr_cust_itmnum, sttr_item_sales_pkg "
            . "FROM stock_transaction "
            . "WHERE sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
            . "AND sttr_status NOT IN ('Deleted','DELETED') "
            . "AND sttr_indicator NOT IN ('stockCrystal') "
            . "AND sttr_owner_id='$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id='$firm_id' "
            . "AND sttr_metal_type='$metal_type' "
            . "AND sttr_item_category='$item_category' "
            . "AND sttr_item_name='$item_name' "
            . "AND sttr_stock_type='$stock_type' "
            . "AND sttr_purity='$purity' ";
//
    $resStockItemDetails = mysqli_query($conn, $qSelStockItemDetails);
//
    $noOfStockAvailable = mysqli_num_rows($resStockItemDetails);
//
    $rowStockItemDetails = mysqli_fetch_array($resStockItemDetails);
//
    $sttr_main_prod_firm_id = $rowStockItemDetails['sttr_firm_id'];
    $sttr_main_prod_metal_type = $rowStockItemDetails['sttr_metal_type'];
    $sttr_main_prod_item_category = $rowStockItemDetails['sttr_item_category'];
    $sttr_main_prod_item_name = $rowStockItemDetails['sttr_item_name'];
    $sttr_main_prod_stock_type = $rowStockItemDetails['sttr_stock_type'];
    $sttr_main_prod_purity = $rowStockItemDetails['sttr_purity'];
//             
    $sttr_main_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
    $sttr_main_item_code = $rowStockItemDetails['sttr_item_code'];
    $sttr_main_indicator = $rowStockItemDetails['sttr_indicator'];
//
    $sttr_main_prod_quantity = $rowStockItemDetails['sttr_quantity'];
//
    if ($sttr_main_prod_quantity == '' || $sttr_main_prod_quantity == NULL) {
        $sttr_main_prod_quantity = 0;
    }
//
    $sttr_main_prod_gs_weight = om_round($rowStockItemDetails['sttr_gs_weight'], 3);
    $sttr_gs_weight_type = 'GM';
//
    $sttr_main_prod_pkt_weight = om_round($rowStockItemDetails['sttr_pkt_weight'], 3);
    $sttr_pkt_weight_type = 'GM';
//
    $sttr_main_prod_nt_weight = om_round($rowStockItemDetails['sttr_nt_weight'], 3);
    $sttr_nt_weight_type = 'GM';
//
    $sttr_main_prod_fine_weight = om_round($rowStockItemDetails['sttr_fine_weight'], 3);
    $sttr_main_prod_final_fine_weight = om_round($rowStockItemDetails['sttr_final_fine_weight'], 3);
//
    $sttr_main_prod_lab_charges = om_round($rowStockItemDetails['sttr_lab_charges'], 2);
    $sttr_main_prod_making_charges = om_round($rowStockItemDetails['sttr_making_charges'], 2);
//
    $sttr_main_prod_taxt = om_round($rowStockItemDetails['sttr_tax'], 2);
    $sttr_main_prod_tot_tax = om_round($rowStockItemDetails['sttr_tot_tax'], 2);
//
    $sttr_main_prod_valuation = om_round($rowStockItemDetails['sttr_valuation'], 2);
    $sttr_main_prod_final_valuation = om_round($rowStockItemDetails['sttr_final_valuation'], 2);
//
    if ((($rowStockItemDetails1['sttr_transaction_type'] == 'PURBYSUPP' ||
            $rowStockItemDetails1['sttr_transaction_type'] == 'PURONCASH' ||
            $rowStockItemDetails1['sttr_transaction_type'] == 'EXISTING') &&
            $rowStockItemDetails1['sttr_stock_type'] == 'wholesale')) {
//
        $whereStr = " sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
                . "((sttr_transaction_type = 'TAG' AND "
                . " sttr_st_id = '$rowStockItemDetails1[sttr_st_id]' AND "
                . " sttr_stock_type = 'retail') "
                . " OR "
                . "(sttr_firm_id='$firm_id' AND "
                . " sttr_metal_type='$metal_type' AND "
                . " sttr_item_category='$item_category' AND "
                . " sttr_item_name='$item_name' AND "
                . " sttr_stock_type='$stock_type' AND "
                . " sttr_purity='$purity' AND "
                . " sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') AND "
                . " sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') AND "
                . "(sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) AND "
                . " sttr_indicator NOT IN ('stockCrystal'))) ";
//
    } else {
//
        $whereStr = " sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
                . " sttr_firm_id='$firm_id' AND "
                . " sttr_metal_type='$metal_type' AND "
                . " sttr_item_category='$item_category' AND "
                . " sttr_item_name='$item_name' AND "
                . " sttr_stock_type='$stock_type' AND "
                . " sttr_purity='$purity' AND "
                . " sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') AND "
                . " sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') AND "
                . " (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) AND "
                . " sttr_indicator NOT IN ('stockCrystal') ";
//
    }
//
    $qSelSellStockItemDetails = "SELECT sum(sttr_quantity) as sttr_sell_quantity,"
            . "sum(case when sttr_gs_weight_type='KG' then sttr_gs_weight*1000  when sttr_gs_weight_type='MG' then sttr_gs_weight/1000 when sttr_gs_weight_type='CT' then sttr_gs_weight/5 else sttr_gs_weight end) as sttr_sell_gs_weight, sttr_gs_weight_type,"
            . "sum(case when sttr_nt_weight_type='KG' then sttr_nt_weight*1000  when sttr_nt_weight_type='MG' then sttr_nt_weight/1000 when sttr_nt_weight_type='CT' then sttr_nt_weight/5 else sttr_nt_weight end) as sttr_sell_nt_weight, sttr_nt_weight_type,"
            . "sum(case when sttr_pkt_weight_type='KG' then sttr_pkt_weight*1000  when sttr_pkt_weight_type='MG' then sttr_pkt_weight/1000 when sttr_pkt_weight_type='CT' then sttr_pkt_weight/5 else sttr_pkt_weight end) as sttr_sell_pkt_weight, sttr_pkt_weight_type,"
            . "sum(sttr_fine_weight) as sttr_sell_fine_weight,"
            . "sum(sttr_final_fine_weight) as sttr_sell_final_fine_weight,"
            . "sum(sttr_lab_charges) as sttr_sell_lab_charges, "
            . "sttr_lab_charges_type as sttr_sell_lab_charges_type,"
            . "sum(sttr_making_charges) as sttr_sell_making_charges, "
            . "sttr_making_charges_type as sttr_sell_making_charges_type,"
            . "sum(sttr_tax) as sttr_sell_tax, sum(sttr_tot_tax) as sttr_sell_tot_tax,"
            . "sum(sttr_valuation) as sttr_sell_valuation, sum(sttr_final_valuation) as sttr_sell_final_valuation,"
            . "sttr_owner_id, sttr_firm_id, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, sttr_item_model_no,"
            . "sttr_stock_type, sttr_indicator, sttr_item_code, sttr_item_pre_id, sttr_item_id, sttr_purity, sttr_wastage, sttr_final_purity,"
            . "sttr_price, sttr_cust_price, sttr_purchase_rate, sttr_purchase_rate_type, sttr_sell_rate, sttr_sell_rate_type,"
            . "sttr_cust_itmcalby, sttr_cust_itmcode, sttr_cust_itmnum, sttr_item_sales_pkg "
            . "FROM stock_transaction "
            . "WHERE $whereStr ";
//
    $resSellStockItemDetails = mysqli_query($conn, $qSelSellStockItemDetails);
//
    $noOfSellStockAvailable = mysqli_num_rows($resSellStockItemDetails);
//
    $rowSellStockItemDetails = mysqli_fetch_array($resSellStockItemDetails);
//
//START CODE TO MINUS MELTING ENTRIES
    $qSelSellStockItemMeltDetails = "SELECT sum(sttr_quantity) as sttr_melt_quantity, "
            . "sum(CASE WHEN sttr_gs_weight_type='KG' THEN sttr_gs_weight*1000 "
            . "WHEN sttr_gs_weight_type='MG' THEN sttr_gs_weight/1000 "
            . "WHEN sttr_gs_weight_type='CT' THEN sttr_gs_weight/5 ELSE sttr_gs_weight END) as sttr_melt_gs_weight, "
            . "sttr_gs_weight_type, "
            . "sum(CASE WHEN sttr_nt_weight_type='KG' THEN sttr_nt_weight*1000 "
            . "WHEN sttr_nt_weight_type='MG' THEN sttr_nt_weight/1000 "
            . "WHEN sttr_nt_weight_type='CT' THEN sttr_nt_weight/5 ELSE sttr_nt_weight END) as sttr_melt_nt_weight, "
            . "sttr_nt_weight_type, "
            . "sum(sttr_fine_weight) as sttr_melt_fine_weight, "
            . "sum(sttr_final_fine_weight) as sttr_melt_final_fine_weight, "
            . "sum(sttr_final_quantity) as melt_sttr_final_quantity, "
            . "sum(sttr_final_gs_weight) as melt_sttr_final_gs_weight, "
            . "sum(sttr_final_nt_weight) as melt_sttr_final_nt_weight, "
            . "sum(sttr_final_fn_weight) as melt_sttr_final_fn_weight "
            . "FROM stock_transaction "
            . "WHERE sttr_status IN ('EXISTING', 'TAG') AND "
            . "sttr_melting_status IN ('AFM', 'RFM', 'Y') AND "
            . "sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
            . "sttr_firm_id='$firm_id' AND "
            . "sttr_metal_type='$metal_type' AND "
            . "sttr_item_category='$item_category' AND "
            . "sttr_item_name='$item_name' AND "
            . "sttr_stock_type='$stock_type' AND "
            . "sttr_purity='$purity' AND "
            . "sttr_indicator NOT IN ('stockCrystal')";

//
    $resSellStockItemMeltDetails = mysqli_query($conn, $qSelSellStockItemMeltDetails);
//
    $noOfMeltStockAvailable = mysqli_num_rows($resSellStockItemMeltDetails);
//
    $rowMeltStockItemDetails = mysqli_fetch_array($resSellStockItemMeltDetails);
//
    $sttr_melt_quantity = $rowMeltStockItemDetails['sttr_melt_quantity'];
    $sttr_melt_gs_weight = $rowMeltStockItemDetails['sttr_melt_gs_weight'];
    $sttr_melt_nt_weight = $rowMeltStockItemDetails['sttr_melt_nt_weight'];
    $sttr_melt_fine_weight = $rowMeltStockItemDetails['sttr_melt_fine_weight'];
    $sttr_melt_final_fine_weight = $rowMeltStockItemDetails['sttr_melt_final_fine_weight'];
    $melt_sttr_final_quantity = $rowMeltStockItemDetails['melt_sttr_final_quantity'];
    $melt_sttr_final_gs_weight = $rowMeltStockItemDetails['melt_sttr_final_gs_weight'];
    $melt_sttr_final_nt_weight = $rowMeltStockItemDetails['melt_sttr_final_nt_weight'];
    $melt_sttr_final_fn_weight = $rowMeltStockItemDetails['melt_sttr_final_fn_weight'];
//
    if ($melt_sttr_final_gs_weight > 0) {
        $sttr_main_prod_gs_weight -= $melt_sttr_final_gs_weight;
    } else {
        $sttr_main_prod_gs_weight -= $sttr_melt_gs_weight;
    }
//
    if ($melt_sttr_final_nt_weight > 0) {
        $sttr_main_prod_nt_weight -= $melt_sttr_final_nt_weight;
    } else {
        $sttr_main_prod_nt_weight -= $sttr_melt_nt_weight;
    }
//
    if ($melt_sttr_final_quantity >= 0) {
        $sttr_main_prod_quantity -= $melt_sttr_final_quantity;
    } else {
        $sttr_main_prod_quantity -= $sttr_melt_quantity;
    }
//
    if ($melt_sttr_final_fn_weight > 0) {
        $sttr_main_prod_fine_weight -= $melt_sttr_final_fn_weight;
    } else {
        $sttr_main_prod_fine_weight -= $sttr_melt_fine_weight;
    }
//
    if ($melt_sttr_final_fn_weight > 0) {
        $sttr_main_prod_final_fine_weight -= $melt_sttr_final_fn_weight;
    } else {
        $sttr_main_prod_final_fine_weight -= $sttr_melt_final_fine_weight;
    }
//START CODE TO MINUS MELTING ENTRIES
    $sttr_sell_firm_id = $rowSellStockItemDetails['sttr_firm_id'];
    $sttr_sell_metal_type = $rowSellStockItemDetails['sttr_metal_type'];
    $sttr_sell_item_category = $rowSellStockItemDetails['sttr_item_category'];
    $sttr_sell_item_name = $rowSellStockItemDetails['sttr_item_name'];
    $sttr_sell_stock_type = $rowSellStockItemDetails['sttr_stock_type'];
    $sttr_sell_purity = $rowSellStockItemDetails['sttr_purity'];
//
//
    $sttr_sell_indicator = $rowSellStockItemDetails['sttr_indicator'];
    $sttr_sell_metal_rate = $rowSellStockItemDetails['sttr_metal_rate'];
    $sttr_sell_item_code = $rowSellStockItemDetails['sttr_item_code'];
//
    $sttr_sell_quantity = $rowSellStockItemDetails['sttr_sell_quantity'];
//
    if ($sttr_sell_quantity == '' || $sttr_sell_quantity == NULL) {
        $sttr_sell_quantity = 0;
    }
//
    $sttr_sell_gs_weight = om_round($rowSellStockItemDetails['sttr_sell_gs_weight'], 3);
    $sttr_sell_pkt_weight = om_round($rowSellStockItemDetails['sttr_sell_pkt_weight'], 3);
    $sttr_sell_nt_weight = om_round($rowSellStockItemDetails['sttr_sell_nt_weight'], 3);
//
    $sttr_sell_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_fine_weight'], 3);
    $sttr_sell_final_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_final_fine_weight'], 3);
//
    $sttr_sell_lab_charges = om_round($rowSellStockItemDetails['sttr_sell_lab_charges'], 2);
    $sttr_sell_making_charges = om_round($rowSellStockItemDetails['sttr_sell_making_charges'], 2);
//
    $sttr_sell_tax = om_round($rowSellStockItemDetails['sttr_sell_tax'], 2);
    $sttr_sell_tot_tax = om_round($rowSellStockItemDetails['sttr_sell_tot_tax'], 2);
//
    $sttr_sell_valuation = om_round($rowSellStockItemDetails['sttr_sell_valuation'], 2);
    $sttr_sell_final_valuation = om_round($rowSellStockItemDetails['sttr_sell_final_valuation'], 2);
//
    $sttr_calc_quantity = om_round($sttr_main_prod_quantity - $sttr_sell_quantity, 3);
//
    $sttr_calc_gs_weight = om_round($sttr_main_prod_gs_weight - $sttr_sell_gs_weight, 3);
    $sttr_gs_weight_type = 'GM';
//
    $sttr_calc_pkt_weight = om_round($sttr_main_prod_pkt_weight - $sttr_sell_pkt_weight, 3);
    $sttr_pkt_weight_type = 'GM';
//
    $sttr_calc_nt_weight = om_round($sttr_main_prod_nt_weight - $sttr_sell_nt_weight, 3);
    $sttr_nt_weight_type = 'GM';
//
    $sttr_calc_fine_weight = om_round($sttr_main_prod_fine_weight - $sttr_sell_fine_weight, 3);
    $sttr_calc_final_fine_weight = om_round($sttr_main_prod_final_fine_weight - $sttr_sell_final_fine_weight, 3);
//
    $sttr_calc_lab_charges = om_round($sttr_main_prod_lab_charges - $sttr_sell_lab_charges, 3);
    $sttr_calc_making_charges = om_round($sttr_main_prod_making_charges - $sttr_sell_making_charges, 3);
//
    $sttr_calc_taxt = om_round($sttr_main_prod_tax - $sttr_sell_tax, 3);
    $sttr_calc_tot_tax = om_round($sttr_main_prod_tot_tax - $sttr_sell_tot_tax, 3);
//
    $sttr_calc_valuation = om_round($sttr_main_prod_valuation - $sttr_sell_valuation, 3);
    $sttr_calc_final_valuation = om_round($sttr_main_prod_final_valuation - $sttr_sell_final_valuation, 3);
//
    if ($sttr_main_prod_gs_weight > 0) {
//
        if ($rowStockItemDetails['sttr_indicator'] == 'AddInvoice') {
            $sttr_indicator = 'stock';
        } else {
            $sttr_indicator = $rowStockItemDetails['sttr_indicator'];
        }
//
        $sttr_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
        $sttr_item_code = $rowStockItemDetails['sttr_item_code'];
//
        $sttr_wastage = $rowStockItemDetails['sttr_wastage'];
        $sttr_final_purity = $rowStockItemDetails['sttr_final_purity'];
//
        $sttr_item_model_no = $rowStockItemDetails['sttr_item_model_no'];
        $sttr_cust_itmcalby = $rowStockItemDetails['sttr_cust_itmcalby'];
        $sttr_cust_itmcode = $rowStockItemDetails['sttr_cust_itmcode'];
        $sttr_cust_itmnum = $rowStockItemDetails['sttr_cust_itmnum'];
        $sttr_price = $rowStockItemDetails['sttr_price'];
        $sttr_cust_price = $rowStockItemDetails['sttr_cust_price'];
        $sttr_item_sales_pkg = $rowStockItemDetails['sttr_item_sales_pkg'];
//
        $sttr_purchase_rate = $rowStockItemDetails['sttr_purchase_rate'];
        $sttr_purchase_rate_type = $rowStockItemDetails['sttr_purchase_rate_type'];
        $sttr_sell_rate = $rowStockItemDetails['sttr_sell_rate'];
        $sttr_sell_rate_type = $rowStockItemDetails['sttr_sell_rate_type'];
//
        $sttr_lab_charges = om_round($rowStockItemDetails['sttr_lab_charges'] - $sttr_sell_lab_charges, 2);
        $sttr_lab_charges_type = $rowStockItemDetails['sttr_lab_charges_type'];
        $sttr_making_charges = om_round($rowStockItemDetails['sttr_making_charges'] - $sttr_sell_making_charges, 2);
        $sttr_making_charges_type = $rowStockItemDetails['sttr_making_charges_type'];
//
        $sttr_tax = om_round($rowStockItemDetails['sttr_tax'] - $sttr_sell_tax, 2);
        $sttr_tot_tax = om_round($rowStockItemDetails['sttr_tot_tax'] - $sttr_sell_tot_tax, 2);
        $sttr_valuation = om_round($rowStockItemDetails['sttr_valuation'] - $sttr_sell_valuation, 2);
        $sttr_final_valuation = om_round($rowStockItemDetails['sttr_final_valuation'] - $sttr_sell_final_valuation, 2);
//
    } else {
//
        $sttr_indicator = $rowSellStockItemDetails['sttr_indicator'];
        $sttr_metal_rate = $rowSellStockItemDetails['sttr_metal_rate'];
        $sttr_item_code = $rowSellStockItemDetails['sttr_item_code'];
//
        if ($noOfStockAvailable == 0) {
            $sttr_item_code = $rowSellStockItemDetails['sttr_item_pre_id'] . $rowSellStockItemDetails['sttr_item_id'];
        }
//
        $sttr_wastage = $rowSellStockItemDetails['sttr_wastage'];
        $sttr_final_purity = $rowSellStockItemDetails['sttr_final_purity'];
//
        $sttr_item_model_no = $rowSellStockItemDetails['sttr_item_model_no'];
        $sttr_cust_itmcalby = $rowSellStockItemDetails['sttr_cust_itmcalby'];
        $sttr_cust_itmcode = $rowSellStockItemDetails['sttr_cust_itmcode'];
        $sttr_cust_itmnum = $rowSellStockItemDetails['sttr_cust_itmnum'];
        $sttr_price = $rowSellStockItemDetails['sttr_price'];
        $sttr_cust_price = $rowSellStockItemDetails['sttr_cust_price'];
        $sttr_item_sales_pkg = $rowSellStockItemDetails['sttr_item_sales_pkg'];
//
        $sttr_purchase_rate = $rowSellStockItemDetails['sttr_purchase_rate'];
        $sttr_purchase_rate_type = $rowSellStockItemDetails['sttr_purchase_rate_type'];
        $sttr_sell_rate = $rowSellStockItemDetails['sttr_sell_rate'];
        $sttr_sell_rate_type = $rowSellStockItemDetails['sttr_sell_rate_type'];
//
        $sttr_lab_charges = om_round($rowSellStockItemDetails['sttr_sell_lab_charges'], 2);
        $sttr_lab_charges_type = $rowSellStockItemDetails['sttr_sell_lab_charges_type'];
        $sttr_making_charges = om_round($rowSellStockItemDetails['sttr_sell_making_charges'], 2);
        $sttr_making_charges_type = $rowSellStockItemDetails['sttr_sell_making_charges_type'];
//
        $sttr_tax = om_round($rowSellStockItemDetails['sttr_sell_tax'], 2);
        $sttr_tot_tax = om_round($rowSellStockItemDetails['sttr_sell_tot_tax'], 2);
        $sttr_valuation = om_round($rowSellStockItemDetails['sttr_sell_valuation'], 2);
        $sttr_final_valuation = om_round($rowSellStockItemDetails['sttr_sell_final_valuation'], 2);
//
    }

    if ($stock_type == 'wholesale') {
        //
        $qSelStockToCheck = "SELECT st_id "
                . "FROM stock "
                . "WHERE st_metal_type = '$metal_type' and st_item_category = '$item_category' and st_item_name = '$item_name' and st_firm_id = '$firm_id' and st_purity = '$purity' AND st_stock_type='wholesale'";
        //
        $resSelStockToCheck = mysqli_query($conn, $qSelStockToCheck);
        //
        $noOfSelStockToCheck = mysqli_num_rows($resSelStockToCheck);

        if ($noOfSelStockToCheck > 0) {
            //
            $query = "UPDATE stock SET st_metal_rate='$sttr_metal_rate', 
             st_quantity='$sttr_calc_quantity', st_gs_weight='$sttr_calc_gs_weight', st_gs_weight_type='$sttr_gs_weight_type', "
                    . "st_pkt_weight='$sttr_calc_pkt_weight', st_pkt_weight_type='$sttr_pkt_weight_type',
             st_nt_weight='$sttr_calc_nt_weight', st_nt_weight_type='$sttr_nt_weight_type', st_fine_weight='$sttr_calc_fine_weight', st_final_fine_weight='$sttr_calc_final_fine_weight',
             st_purity='$purity', st_wastage='$sttr_wastage', st_final_purity='$sttr_final_purity',
             st_item_model_no='$sttr_item_model_no', st_cust_itmcalby='$sttr_cust_itmcalby', st_cust_itmnum='$sttr_cust_itmnum', st_cust_itmcode='$sttr_cust_itmcode', 
             st_price='$sttr_price', st_cust_price='$sttr_cust_price', st_item_sales_pkg='$sttr_item_sales_pkg',
             st_purchase_rate='$sttr_purchase_rate', st_purchase_rate_type='$sttr_purchase_rate_type', st_sell_rate='$sttr_sell_rate', st_sell_rate_type='$sttr_sell_rate_type',
             st_lab_charges='$sttr_calc_lab_charges', st_lab_charges_type='$sttr_lab_charges_type', st_making_charges='$sttr_calc_making_charges', st_making_charges_type='$sttr_making_charges_type',  
             st_tax='$sttr_calc_tax', st_tot_tax='$sttr_calc_tot_tax', st_valuation='$sttr_calc_valuation', st_final_valuation='$sttr_calc_final_valuation' 
              WHERE st_metal_type = '$metal_type' and st_item_category = '$item_category' and st_item_name = '$item_name' and st_firm_id = '$firm_id' and st_purity = '$purity' AND st_stock_type='wholesale'";
//
        } else {
            //
            $query = "INSERT INTO stock (st_owner_id, st_firm_id, st_metal_type, st_metal_rate, 
             st_item_category, st_item_name, st_item_code, st_type, st_stock_type,
             st_quantity, st_gs_weight, st_gs_weight_type, st_pkt_weight, st_pkt_weight_type,
             st_nt_weight, st_nt_weight_type, st_fine_weight, st_final_fine_weight,
             st_purity, st_wastage, st_final_purity,
             st_item_model_no, st_cust_itmcalby, st_cust_itmnum, st_cust_itmcode, 
             st_price, st_cust_price, st_item_sales_pkg,
             st_purchase_rate, st_purchase_rate_type, st_sell_rate, st_sell_rate_type,
             st_lab_charges, st_lab_charges_type, st_making_charges, st_making_charges_type,  
             st_tax, st_tot_tax, st_valuation, st_final_valuation) 
             VALUES ('$_SESSION[sessionOwnerId]', '$firm_id', '$metal_type', '$sttr_metal_rate',
             '$item_category', '$item_name', '$sttr_item_code', '$sttr_indicator', '$stock_type',
             '$sttr_calc_quantity', '$sttr_calc_gs_weight', '$sttr_gs_weight_type', '$sttr_calc_pkt_weight', '$sttr_pkt_weight_type',
             '$sttr_calc_nt_weight', '$sttr_nt_weight_type', '$sttr_calc_fine_weight', '$sttr_calc_final_fine_weight',
             '$purity', '$sttr_wastage', '$sttr_final_purity',              
             '$sttr_item_model_no', '$sttr_cust_itmcalby', '$sttr_cust_itmnum', '$sttr_cust_itmcode',
             '$sttr_price', '$sttr_cust_price', '$sttr_item_sales_pkg',
             '$sttr_purchase_rate', '$sttr_purchase_rate_type', '$sttr_sell_rate', '$sttr_sell_rate_type',    
             '$sttr_calc_lab_charges', '$sttr_lab_charges_type', '$sttr_calc_making_charges', '$sttr_making_charges_type',
             '$sttr_calc_tax', '$sttr_calc_tot_tax', '$sttr_calc_valuation', '$sttr_calc_final_valuation')";
        }

// 
//    
//        if ($item_name == 'BRACELATE')
//            echo '<br/><br/>queryWhole:' . $query;
        if (!mysqli_query($conn, $query)) {
            die("FileName:omNewStockRecreateFile.php<br/>Error:" . mysqli_error($conn));
        }
    }
    //
    $sttr_stock_type = $stock_type;
    $sttr_item_category = $item_category;
    $sttr_item_name = $item_name;
    $sttr_purity = $purity;
    $sttr_metal_type = $metal_type;
    //
    include 'omStockRecheckStock.php';
    //
}
?>
<?php

// Direct Sell Entries
//
$qSelStockItemDetails1 = "SELECT * FROM stock_transaction "
        . "WHERE sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
        . "AND sttr_indicator NOT IN ('stockCrystal') "
        . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity "
        . "ORDER BY sttr_item_category, sttr_item_name ASC ";
//
$resStockItemDetails1 = mysqli_query($conn, $qSelStockItemDetails1);
//
$noOfStockAvailable1 = mysqli_num_rows($resStockItemDetails1);
//
while ($rowStockItemDetails1 = mysqli_fetch_array($resStockItemDetails1)) {
//
    $firm_id = $rowStockItemDetails1['sttr_firm_id'];
    $metal_type = $rowStockItemDetails1['sttr_metal_type'];
    $item_category = $rowStockItemDetails1['sttr_item_category'];
    $item_name = $rowStockItemDetails1['sttr_item_name'];
    $stock_type = $rowStockItemDetails1['sttr_stock_type'];
    $purity = $rowStockItemDetails1['sttr_purity'];
    $type = $rowStockItemDetails1['sttr_indicator'];
//
    if ($type == 'stock' || $type == 'rawMetal' || $type == 'crystal' || $type == 'imitation') {
        $typeStr = " AND st_type = '$type' ";
    } else {
        $typeStr = "";
    }
//
    $qSelStock = " SELECT * FROM stock WHERE "
            . " st_firm_id='$firm_id' AND "
            . " st_metal_type='$metal_type' AND "
            . " st_item_category='$item_category' AND "
            . " st_item_name='$item_name' AND "
            . " st_stock_type='$stock_type' AND "
            . " st_purity='$purity' $typeStr ";
//
    $resStock = mysqli_query($conn, $qSelStock);
//
    $numStock = mysqli_num_rows($resStock);
//
    if ($numStock == 0) {
//
//
        if ($rowStockItemDetails1['sttr_indicator'] == 'AddInvoice') {
            $sttr_indicator = 'stock';
        } else {
            $sttr_indicator = $rowStockItemDetails1['sttr_indicator'];
        }
//
        $noOfStockAvailable = 0;
        $noOfSellStockAvailable = 0;
//
        $qSelStockItemDetails = "SELECT sum(sttr_quantity) as sttr_quantity,"
                . "sum(case when sttr_gs_weight_type='KG' then sttr_gs_weight*1000  when sttr_gs_weight_type='MG' then sttr_gs_weight/1000 when sttr_gs_weight_type='CT' then sttr_gs_weight/5 else sttr_gs_weight end) as sttr_gs_weight, sttr_gs_weight_type,"
                . "sum(case when sttr_nt_weight_type='KG' then sttr_nt_weight*1000  when sttr_nt_weight_type='MG' then sttr_nt_weight/1000 when sttr_nt_weight_type='CT' then sttr_nt_weight/5 else sttr_nt_weight end) as sttr_nt_weight, sttr_nt_weight_type,"
                . "sum(case when sttr_pkt_weight_type='KG' then sttr_pkt_weight*1000  when sttr_pkt_weight_type='MG' then sttr_pkt_weight/1000 when sttr_pkt_weight_type='CT' then sttr_pkt_weight/5 else sttr_pkt_weight end) as sttr_pkt_weight, sttr_pkt_weight_type,"
                . "sum(sttr_fine_weight) as sttr_fine_weight,"
                . "sum(sttr_final_quantity) as sttr_final_quantity,"
                . "sum(sttr_final_gs_weight) as sttr_final_gs_weight,"
                . "sum(sttr_final_nt_weight) as sttr_final_nt_weight,"
                . "sum(sttr_final_fn_weight) as sttr_final_fn_weight,"
                . "sum(sttr_final_fine_weight) as sttr_final_fine_weight,"
                . "sum(sttr_lab_charges) as sttr_lab_charges, sttr_lab_charges_type,"
                . "sum(sttr_making_charges) as sttr_making_charges, sttr_making_charges_type,"
                . "sum(sttr_tax) as sttr_tax, sum(sttr_tot_tax) as sttr_tot_tax,"
                . "sum(sttr_valuation) as sttr_valuation, sum(sttr_final_valuation) as sttr_final_valuation,"
                . "sttr_owner_id, sttr_firm_id, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, sttr_item_model_no,"
                . "sttr_stock_type, sttr_indicator, sttr_item_code, sttr_item_pre_id, sttr_item_id, sttr_purity, sttr_wastage, sttr_final_purity,"
                . "sttr_price, sttr_cust_price, sttr_purchase_rate, sttr_purchase_rate_type, sttr_sell_rate, sttr_sell_rate_type,"
                . "sttr_cust_itmcalby, sttr_cust_itmcode, sttr_cust_itmnum, sttr_item_sales_pkg "
                . "FROM stock_transaction "
                . "WHERE sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
                . "AND sttr_status NOT IN ('Deleted','DELETED') "
                . "AND sttr_indicator NOT IN ('stockCrystal') "
                . "AND sttr_owner_id='$_SESSION[sessionOwnerId]' "
                . "AND sttr_firm_id='$firm_id' "
                . "AND sttr_metal_type='$metal_type' "
                . "AND sttr_item_category='$item_category' "
                . "AND sttr_item_name='$item_name' "
                . "AND sttr_stock_type='$stock_type' "
                . "AND sttr_purity='$purity' ";
//
        $resStockItemDetails = mysqli_query($conn, $qSelStockItemDetails);
//
        $noOfStockAvailable = mysqli_num_rows($resStockItemDetails);
//
        $rowStockItemDetails = mysqli_fetch_array($resStockItemDetails);
//
        $sttr_main_prod_firm_id = $rowStockItemDetails['sttr_firm_id'];
        $sttr_main_prod_metal_type = $rowStockItemDetails['sttr_metal_type'];
        $sttr_main_prod_item_category = $rowStockItemDetails['sttr_item_category'];
        $sttr_main_prod_item_name = $rowStockItemDetails['sttr_item_name'];
        $sttr_main_prod_stock_type = $rowStockItemDetails['sttr_stock_type'];
        $sttr_main_prod_purity = $rowStockItemDetails['sttr_purity'];
//             
        $sttr_main_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
        $sttr_main_item_code = $rowStockItemDetails['sttr_item_code'];
        $sttr_main_indicator = $rowStockItemDetails['sttr_indicator'];
//
        $sttr_main_prod_quantity = $rowStockItemDetails['sttr_quantity'];
//
        if ($sttr_main_prod_quantity == '' || $sttr_main_prod_quantity == NULL) {
            $sttr_main_prod_quantity = 0;
        }
//
        $sttr_main_prod_gs_weight = om_round($rowStockItemDetails['sttr_gs_weight'], 3);
        $sttr_gs_weight_type = 'GM';
//
        $sttr_main_prod_pkt_weight = om_round($rowStockItemDetails['sttr_pkt_weight'], 3);
        $sttr_pkt_weight_type = 'GM';
//
        $sttr_main_prod_nt_weight = om_round($rowStockItemDetails['sttr_nt_weight'], 3);
        $sttr_nt_weight_type = 'GM';
//
        $sttr_main_prod_fine_weight = om_round($rowStockItemDetails['sttr_fine_weight'], 3);
        $sttr_main_prod_final_fine_weight = om_round($rowStockItemDetails['sttr_final_fine_weight'], 3);
//
        $sttr_main_prod_lab_charges = om_round($rowStockItemDetails['sttr_lab_charges'], 2);
        $sttr_main_prod_making_charges = om_round($rowStockItemDetails['sttr_making_charges'], 2);
//
        $sttr_main_prod_taxt = om_round($rowStockItemDetails['sttr_tax'], 2);
        $sttr_main_prod_tot_tax = om_round($rowStockItemDetails['sttr_tot_tax'], 2);
//
        $sttr_main_prod_valuation = om_round($rowStockItemDetails['sttr_valuation'], 2);
        $sttr_main_prod_final_valuation = om_round($rowStockItemDetails['sttr_final_valuation'], 2);
//
        if ((($rowStockItemDetails1['sttr_transaction_type'] == 'PURBYSUPP' ||
                $rowStockItemDetails1['sttr_transaction_type'] == 'PURONCASH' ||
                $rowStockItemDetails1['sttr_transaction_type'] == 'EXISTING') &&
                $rowStockItemDetails1['sttr_stock_type'] == 'wholesale')) {
//
            $whereStr = " sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
                    . "((sttr_transaction_type = 'TAG' AND "
                    . " sttr_st_id = '$rowStockItemDetails1[sttr_st_id]' AND "
                    . " sttr_stock_type = 'retail') "
                    . " OR "
                    . "(sttr_firm_id='$firm_id' AND "
                    . " sttr_metal_type='$metal_type' AND "
                    . " sttr_item_category='$item_category' AND "
                    . " sttr_item_name='$item_name' AND "
                    . " sttr_stock_type='$stock_type' AND "
                    . " sttr_purity='$purity' AND "
                    . " sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') AND "
                    . " sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') AND "
                    . "(sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) AND "
                    . " sttr_indicator NOT IN ('stockCrystal'))) ";
//
        } else {
//
            $whereStr = " sttr_owner_id='$_SESSION[sessionOwnerId]' AND "
                    . " sttr_firm_id='$firm_id' AND "
                    . " sttr_metal_type='$metal_type' AND "
                    . " sttr_item_category='$item_category' AND "
                    . " sttr_item_name='$item_name' AND "
                    . " sttr_stock_type='$stock_type' AND "
                    . " sttr_purity='$purity' AND "
                    . " sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') AND "
                    . " sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') AND "
                    . " (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) AND "
                    . " sttr_indicator NOT IN ('stockCrystal') ";
//
        }
//
        $qSelSellStockItemDetails = "SELECT sum(sttr_quantity) as sttr_sell_quantity,"
                . "sum(case when sttr_gs_weight_type='KG' then sttr_gs_weight*1000  when sttr_gs_weight_type='MG' then sttr_gs_weight/1000 when sttr_gs_weight_type='CT' then sttr_gs_weight/5 else sttr_gs_weight end) as sttr_sell_gs_weight, sttr_gs_weight_type,"
                . "sum(case when sttr_nt_weight_type='KG' then sttr_nt_weight*1000  when sttr_nt_weight_type='MG' then sttr_nt_weight/1000 when sttr_nt_weight_type='CT' then sttr_nt_weight/5 else sttr_nt_weight end) as sttr_sell_nt_weight, sttr_nt_weight_type,"
                . "sum(case when sttr_pkt_weight_type='KG' then sttr_pkt_weight*1000  when sttr_pkt_weight_type='MG' then sttr_pkt_weight/1000 when sttr_pkt_weight_type='CT' then sttr_pkt_weight/5 else sttr_pkt_weight end) as sttr_sell_pkt_weight, sttr_pkt_weight_type,"
                . "sum(sttr_fine_weight) as sttr_sell_fine_weight,"
                . "sum(sttr_final_fine_weight) as sttr_sell_final_fine_weight,"
                . "sum(sttr_lab_charges) as sttr_sell_lab_charges, "
                . "sttr_lab_charges_type as sttr_sell_lab_charges_type,"
                . "sum(sttr_making_charges) as sttr_sell_making_charges, "
                . "sttr_making_charges_type as sttr_sell_making_charges_type,"
                . "sum(sttr_tax) as sttr_sell_tax, sum(sttr_tot_tax) as sttr_sell_tot_tax,"
                . "sum(sttr_valuation) as sttr_sell_valuation, sum(sttr_final_valuation) as sttr_sell_final_valuation,"
                . "sttr_owner_id, sttr_firm_id, sttr_metal_type, sttr_metal_rate, sttr_item_category, sttr_item_name, sttr_item_model_no,"
                . "sttr_stock_type, sttr_indicator, sttr_item_code, sttr_item_pre_id, sttr_item_id, sttr_purity, sttr_wastage, sttr_final_purity,"
                . "sttr_price, sttr_cust_price, sttr_purchase_rate, sttr_purchase_rate_type, sttr_sell_rate, sttr_sell_rate_type,"
                . "sttr_cust_itmcalby, sttr_cust_itmcode, sttr_cust_itmnum, sttr_item_sales_pkg "
                . "FROM stock_transaction "
                . "WHERE $whereStr ";
//
        $resSellStockItemDetails = mysqli_query($conn, $qSelSellStockItemDetails);
//
        $noOfSellStockAvailable = mysqli_num_rows($resSellStockItemDetails);
//
        $rowSellStockItemDetails = mysqli_fetch_array($resSellStockItemDetails);
//
        $sttr_sell_firm_id = $rowSellStockItemDetails['sttr_firm_id'];
        $sttr_sell_metal_type = $rowSellStockItemDetails['sttr_metal_type'];
        $sttr_sell_item_category = $rowSellStockItemDetails['sttr_item_category'];
        $sttr_sell_item_name = $rowSellStockItemDetails['sttr_item_name'];
        $sttr_sell_stock_type = $rowSellStockItemDetails['sttr_stock_type'];
        $sttr_sell_purity = $rowSellStockItemDetails['sttr_purity'];
//
        $sttr_sell_indicator = $rowSellStockItemDetails['sttr_indicator'];
        $sttr_sell_metal_rate = $rowSellStockItemDetails['sttr_metal_rate'];
        $sttr_sell_item_code = $rowSellStockItemDetails['sttr_item_code'];
//
        $sttr_sell_quantity = $rowSellStockItemDetails['sttr_sell_quantity'];
//
        if ($sttr_sell_quantity == '' || $sttr_sell_quantity == NULL) {
            $sttr_sell_quantity = 0;
        }
//
        $sttr_sell_gs_weight = om_round($rowSellStockItemDetails['sttr_sell_gs_weight'], 3);
        $sttr_sell_pkt_weight = om_round($rowSellStockItemDetails['sttr_sell_pkt_weight'], 3);
        $sttr_sell_nt_weight = om_round($rowSellStockItemDetails['sttr_sell_nt_weight'], 3);
//
        $sttr_sell_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_fine_weight'], 3);
        $sttr_sell_final_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_final_fine_weight'], 3);
//
        $sttr_sell_lab_charges = om_round($rowSellStockItemDetails['sttr_sell_lab_charges'], 2);
        $sttr_sell_making_charges = om_round($rowSellStockItemDetails['sttr_sell_making_charges'], 2);
//
        $sttr_sell_tax = om_round($rowSellStockItemDetails['sttr_sell_tax'], 2);
        $sttr_sell_tot_tax = om_round($rowSellStockItemDetails['sttr_sell_tot_tax'], 2);
//
        $sttr_sell_valuation = om_round($rowSellStockItemDetails['sttr_sell_valuation'], 2);
        $sttr_sell_final_valuation = om_round($rowSellStockItemDetails['sttr_sell_final_valuation'], 2);
//
        $sttr_calc_quantity = om_round($sttr_main_prod_quantity - $sttr_sell_quantity, 3);
//
        $sttr_calc_gs_weight = om_round($sttr_main_prod_gs_weight - $sttr_sell_gs_weight, 3);
        $sttr_gs_weight_type = 'GM';
//
        $sttr_calc_pkt_weight = om_round($sttr_main_prod_pkt_weight - $sttr_sell_pkt_weight, 3);
        $sttr_pkt_weight_type = 'GM';
//
        $sttr_calc_nt_weight = om_round($sttr_main_prod_nt_weight - $sttr_sell_nt_weight, 3);
        $sttr_nt_weight_type = 'GM';
//
        $sttr_calc_fine_weight = om_round($sttr_main_prod_fine_weight - $sttr_sell_fine_weight, 3);
        $sttr_calc_final_fine_weight = om_round($sttr_main_prod_final_fine_weight - $sttr_sell_final_fine_weight, 3);
//
        $sttr_calc_lab_charges = om_round($sttr_main_prod_lab_charges - $sttr_sell_lab_charges, 3);
        $sttr_calc_making_charges = om_round($sttr_main_prod_making_charges - $sttr_sell_making_charges, 3);
//
        $sttr_calc_taxt = om_round($sttr_main_prod_tax - $sttr_sell_tax, 3);
        $sttr_calc_tot_tax = om_round($sttr_main_prod_tot_tax - $sttr_sell_tot_tax, 3);
//
        $sttr_calc_valuation = om_round($sttr_main_prod_valuation - $sttr_sell_valuation, 3);
        $sttr_calc_final_valuation = om_round($sttr_main_prod_final_valuation - $sttr_sell_final_valuation, 3);
//
        if ($sttr_main_prod_gs_weight > 0) {
//
//
            if ($rowStockItemDetails['sttr_indicator'] == 'AddInvoice') {
                $sttr_indicator = 'stock';
            } else {
                $sttr_indicator = $rowStockItemDetails['sttr_indicator'];
            }
//
            $sttr_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
            $sttr_item_code = $rowStockItemDetails['sttr_item_code'];
//
            $sttr_wastage = $rowStockItemDetails['sttr_wastage'];
            $sttr_final_purity = $rowStockItemDetails['sttr_final_purity'];
//
            $sttr_item_model_no = $rowStockItemDetails['sttr_item_model_no'];
            $sttr_cust_itmcalby = $rowStockItemDetails['sttr_cust_itmcalby'];
            $sttr_cust_itmcode = $rowStockItemDetails['sttr_cust_itmcode'];
            $sttr_cust_itmnum = $rowStockItemDetails['sttr_cust_itmnum'];
            $sttr_price = $rowStockItemDetails['sttr_price'];
            $sttr_cust_price = $rowStockItemDetails['sttr_cust_price'];
            $sttr_item_sales_pkg = $rowStockItemDetails['sttr_item_sales_pkg'];
//
            $sttr_purchase_rate = $rowStockItemDetails['sttr_purchase_rate'];
            $sttr_purchase_rate_type = $rowStockItemDetails['sttr_purchase_rate_type'];
            $sttr_sell_rate = $rowStockItemDetails['sttr_sell_rate'];
            $sttr_sell_rate_type = $rowStockItemDetails['sttr_sell_rate_type'];
//
            $sttr_lab_charges = om_round($rowStockItemDetails['sttr_lab_charges'] - $sttr_sell_lab_charges, 2);
            $sttr_lab_charges_type = $rowStockItemDetails['sttr_lab_charges_type'];
            $sttr_making_charges = om_round($rowStockItemDetails['sttr_making_charges'] - $sttr_sell_making_charges, 2);
            $sttr_making_charges_type = $rowStockItemDetails['sttr_making_charges_type'];
//
            $sttr_tax = om_round($rowStockItemDetails['sttr_tax'] - $sttr_sell_tax, 2);
            $sttr_tot_tax = om_round($rowStockItemDetails['sttr_tot_tax'] - $sttr_sell_tot_tax, 2);
            $sttr_valuation = om_round($rowStockItemDetails['sttr_valuation'] - $sttr_sell_valuation, 2);
            $sttr_final_valuation = om_round($rowStockItemDetails['sttr_final_valuation'] - $sttr_sell_final_valuation, 2);
//
        } else {
//
            $sttr_indicator = $rowSellStockItemDetails['sttr_indicator'];
            $sttr_metal_rate = $rowSellStockItemDetails['sttr_metal_rate'];
            $sttr_item_code = $rowSellStockItemDetails['sttr_item_code'];
//
            if ($noOfStockAvailable == 0) {
                $sttr_item_code = $rowSellStockItemDetails['sttr_item_pre_id'] . $rowSellStockItemDetails['sttr_item_id'];
            }
//
            $sttr_wastage = $rowSellStockItemDetails['sttr_wastage'];
            $sttr_final_purity = $rowSellStockItemDetails['sttr_final_purity'];
//
            $sttr_item_model_no = $rowSellStockItemDetails['sttr_item_model_no'];
            $sttr_cust_itmcalby = $rowSellStockItemDetails['sttr_cust_itmcalby'];
            $sttr_cust_itmcode = $rowSellStockItemDetails['sttr_cust_itmcode'];
            $sttr_cust_itmnum = $rowSellStockItemDetails['sttr_cust_itmnum'];
            $sttr_price = $rowSellStockItemDetails['sttr_price'];
            $sttr_cust_price = $rowSellStockItemDetails['sttr_cust_price'];
            $sttr_item_sales_pkg = $rowSellStockItemDetails['sttr_item_sales_pkg'];
//
            $sttr_purchase_rate = $rowSellStockItemDetails['sttr_purchase_rate'];
            $sttr_purchase_rate_type = $rowSellStockItemDetails['sttr_purchase_rate_type'];
            $sttr_sell_rate = $rowSellStockItemDetails['sttr_sell_rate'];
            $sttr_sell_rate_type = $rowSellStockItemDetails['sttr_sell_rate_type'];
//
            $sttr_lab_charges = om_round($rowSellStockItemDetails['sttr_sell_lab_charges'], 2);
            $sttr_lab_charges_type = $rowSellStockItemDetails['sttr_sell_lab_charges_type'];
            $sttr_making_charges = om_round($rowSellStockItemDetails['sttr_sell_making_charges'], 2);
            $sttr_making_charges_type = $rowSellStockItemDetails['sttr_sell_making_charges_type'];
//
            $sttr_tax = om_round($rowSellStockItemDetails['sttr_sell_tax'], 2);
            $sttr_tot_tax = om_round($rowSellStockItemDetails['sttr_sell_tot_tax'], 2);
            $sttr_valuation = om_round($rowSellStockItemDetails['sttr_sell_valuation'], 2);
            $sttr_final_valuation = om_round($rowSellStockItemDetails['sttr_sell_final_valuation'], 2);
//
        }
        if ($stock_type == 'wholesale') {
            $query = "INSERT INTO stock (st_owner_id, st_firm_id, st_metal_type, st_metal_rate, 
                 st_item_category, st_item_name, st_item_code, st_type, st_stock_type,
                 st_quantity, st_gs_weight, st_gs_weight_type, st_pkt_weight, st_pkt_weight_type,
                 st_nt_weight, st_nt_weight_type, st_fine_weight, st_final_fine_weight,
                 st_purity, st_wastage, st_final_purity,
                 st_item_model_no, st_cust_itmcalby, st_cust_itmnum, st_cust_itmcode, 
                 st_price, st_cust_price, st_item_sales_pkg,
                 st_purchase_rate, st_purchase_rate_type, st_sell_rate, st_sell_rate_type,
                 st_lab_charges, st_lab_charges_type, st_making_charges, st_making_charges_type,  
                 st_tax, st_tot_tax, st_valuation, st_final_valuation) 
                 VALUES ('$_SESSION[sessionOwnerId]', '$firm_id', '$metal_type', '$sttr_metal_rate',
                 '$item_category', '$item_name', '$sttr_item_code', '$sttr_indicator', '$stock_type',
                 '$sttr_calc_quantity', '$sttr_calc_gs_weight', '$sttr_gs_weight_type', '$sttr_calc_pkt_weight', '$sttr_pkt_weight_type',
                 '$sttr_calc_nt_weight', '$sttr_nt_weight_type', '$sttr_calc_fine_weight', '$sttr_calc_final_fine_weight',
                 '$purity', '$sttr_wastage', '$sttr_final_purity',              
                 '$sttr_item_model_no', '$sttr_cust_itmcalby', '$sttr_cust_itmnum', '$sttr_cust_itmcode',
                 '$sttr_price', '$sttr_cust_price', '$sttr_item_sales_pkg',
                 '$sttr_purchase_rate', '$sttr_purchase_rate_type', '$sttr_sell_rate', '$sttr_sell_rate_type',    
                 '$sttr_calc_lab_charges', '$sttr_lab_charges_type', '$sttr_calc_making_charges', '$sttr_making_charges_type',
                 '$sttr_calc_tax', '$sttr_calc_tot_tax', '$sttr_calc_valuation', '$sttr_calc_final_valuation')";
            //
//            echo '<br/><br/>query:' . $query;
            //
            if (!mysqli_query($conn, $query)) {
                die("FileName:omNewStockRecreateFileForSingleCategory.php<br/>Error:" . mysqli_error($conn));
            }
            //
            //
            $sttr_stock_type = $stock_type;
            $sttr_item_category = $item_category;
            $sttr_item_name = $item_name;
            $sttr_purity = $purity;
            //
            include 'omStockRecheckStock.php';
            //
        }
    }
}
//
?>