<?php

/*
 * **************************************************************************************
 * @tutorial: RECREATE STOCK CONSOLIDATION INTO STOCK TABLE FOR ALL CATEGORY @PRATHAMESH 05 SEPT
 * **************************************************************************************
 * 
 * Created on 05 SEPT, 2024 04:00:00 PM
 *
 * @FileName: omStockRecheckStock.php
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

//SELECT st.sttr_id as 'sttr_id',
//            st.sttr_transaction_type as 'sttr_transaction_type',
//            st.sttr_sttr_id as 'sttr_sttr_id',
//            st.sttr_sttrin_id as 'sttr_sttrin_id',
//            st.sttr_item_pre_id as 'sttr_item_pre_id',
//            st.sttr_item_id as 'sttr_item_id',
//            f.firm_name as 'firm_name',
//            st.sttr_metal_type as 'sttr_metal_type',
//            st.sttr_purity as 'sttr_purity',
//            st.sttr_product_purchase_rate as 'sttr_product_purchase_rate',
//            st.sttr_item_model_no as 'sttr_item_model_no',
//            st.sttr_barcode_prefix as 'sttr_barcode_prefix',
//            st.sttr_barcode as 'sttr_barcode',
//            st.sttr_item_category as 'sttr_item_category',
//            st.sttr_item_name as 'sttr_item_name',
//            st.sttr_stock_type as 'sttr_stock_type',
//            (IFNULL(SUM(distinct(if((st.sttr_final_quantity IS NULL),st.sttr_quantity,st.sttr_final_quantity))), 0)) as 'sttr_quantity',
//            (IFNULL(ROUND(SUM(distinct(if((st.sttr_final_gs_weight IS NULL OR st.sttr_final_gs_weight = 0),
//            IF(st.sttr_gs_weight_type='KG',(ifnull(round(st.sttr_gs_weight,3),0)*1000),
//            IF(st.sttr_gs_weight_type='MG',(ifnull(round(st.sttr_gs_weight,3),0)*0.001),
//            (ifnull(round(st.sttr_gs_weight,3),0)*1))),
//            IF(st.sttr_gs_weight_type='KG',(ifnull(round(st.sttr_final_gs_weight,3),0)*1000),
//            IF(st.sttr_gs_weight_type='MG',(ifnull(round(st.sttr_final_gs_weight,3),0)*0.001),
//            (ifnull(round(st.sttr_final_gs_weight,3),0)*1)))))),3), 0)) as 'sttr_gs_weight',
//            .st.sttr_pkt_weight as 'sttr_pkt_weight',
//             .st.sttr_less_weight as 'sttr_less_weight',
//            (IFNULL(ROUND(SUM(distinct(if((st.sttr_final_nt_weight IS NULL OR st.sttr_final_nt_weight = 0),
//            IF(st.sttr_nt_weight_type='KG',(ifnull(round(st.sttr_nt_weight,3),0)*1000),
//            IF(st.sttr_nt_weight_type='MG',(ifnull(round(st.sttr_nt_weight,3),0)*0.001),
//            (ifnull(round(st.sttr_nt_weight,3),0)*1))),
//            IF(st.sttr_nt_weight_type='KG',(ifnull(round(st.sttr_final_nt_weight,3),0)*1000),
//            IF(st.sttr_nt_weight_type='MG',(ifnull(round(st.sttr_final_nt_weight,3),0)*0.001),
//            (ifnull(round(st.sttr_final_nt_weight,3),0)*1)))))),3), 0)) as 'sttr_nt_weight',
//            (IFNULL(SUM(distinct(if((st.sttr_final_tag_weight IS NULL),st.sttr_tag_weight,st.sttr_final_tag_weight))), 0)) as 'sttr_tag_weight', 
//            (IFNULL(SUM(CASE WHEN stnst.sttr_item_category != 'diamond' THEN stnst.sttr_quantity ELSE 0 END), 0)) as 'stone_quantity', 
//             (IFNULL(SUM(CASE WHEN stnst.sttr_item_category  = 'diamond' THEN stnst.sttr_quantity ELSE 0 END), 0)) as 'diamond_quantity', 
//			(IFNULL(SUM(CASE WHEN LOWER(stnst.sttr_item_category) != 'diamond' THEN 
//        IF(stnst.sttr_final_gs_weight IS NULL OR stnst.sttr_final_gs_weight = 0, 
//        CASE LOWER(stnst.sttr_gs_weight_type) 
//        WHEN 'kg' THEN (stnst.sttr_gs_weight * 1000) 
//        WHEN 'mg' THEN (stnst.sttr_gs_weight * 0.001) 
//        WHEN 'ct' THEN (stnst.sttr_gs_weight * 0.2) 
//        ELSE stnst.sttr_gs_weight END, 
//        CASE LOWER(stnst.sttr_gs_weight_type) 
//        WHEN 'kg' THEN (stnst.sttr_final_gs_weight * 1000) 
//        WHEN 'mg' THEN (stnst.sttr_final_gs_weight * 0.001) 
//        WHEN 'ct' THEN (stnst.sttr_final_gs_weight * 0.2) 
//        ELSE stnst.sttr_final_gs_weight END 
//        ) END), 0)) as 'stone_gs_weight', 
//		(IFNULL(SUM(CASE WHEN LOWER(stnst.sttr_item_category) = 'diamond' THEN 
//        IF(stnst.sttr_final_gs_weight IS NULL OR stnst.sttr_final_gs_weight = 0, 
//        CASE LOWER(stnst.sttr_gs_weight_type) 
//        WHEN 'kg' THEN (stnst.sttr_gs_weight * 1000) 
//        WHEN 'mg' THEN (stnst.sttr_gs_weight * 0.001) 
//        WHEN 'ct' THEN (stnst.sttr_gs_weight * 0.2) 
//        ELSE stnst.sttr_gs_weight END, 
//        CASE LOWER(stnst.sttr_gs_weight_type) 
//        WHEN 'kg' THEN (stnst.sttr_final_gs_weight * 1000) 
//        WHEN 'mg' THEN (stnst.sttr_final_gs_weight * 0.001) 
//        WHEN 'ct' THEN (stnst.sttr_final_gs_weight * 0.2) 
//        ELSE stnst.sttr_final_gs_weight END 
//        ) END), 0)) as 'diamond_gs_weight', 
//        st.sttr_stone_wt as 'sttr_stone_wt',
//            st.sttr_status as 'sttr_status',
//            st.sttr_st_id as 'sttr_st_id', 
//            st.sttr_hallmark_uid as 'sttr_hallmark_uid', 
//            st.sttr_hallmark_status as 'sttr_hallmark_status' 
//            FROM stock_transaction as st 
//             INNER JOIN firm AS f ON st.sttr_firm_id = f.firm_id
//             LEFT JOIN stock_transaction as stnst ON st.sttr_id = stnst.sttr_sttr_id 
//             WHERE 
//			 st.sttr_firm_id IN (1) and st.sttr_metal_type IN ('GOLD','gold','Gold') 
//                and st.sttr_status NOT IN ('SOLDOUT','DELETED','ItemReturn','ApprovalDone') 
//                and (st.sttr_melting_status IS NULL OR st.sttr_melting_status = '') 
//                and st.sttr_indicator IN ('stock', 'AddInvoice')
//                and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') 
//                and st.sttr_item_category = 'MANI' and st.sttr_stock_type = 'retail'
//                and st.sttr_item_name = 'MANI'
//                and st.sttr_purity = '92'
//                group by st.sttr_id;
//
// Input Parameters
if ($sttr_stock_type == '')
    $sttr_stock_type = $_REQUEST['sttr_stock_type'];
if ($sttr_item_category == '')
    $sttr_item_category = $_REQUEST['sttr_item_category'];
if ($sttr_item_name == '')
    $sttr_item_name = $_REQUEST['sttr_item_name'];
if ($sttr_purity == '')
    $sttr_purity = $_REQUEST['sttr_purity'];
if ($sttr_purity == '')
    $sttr_metal_type = $_REQUEST['sttr_metal_type'];

//
$qSelStockItemSumDetails = "SELECT
            (IFNULL(SUM((if((st.sttr_final_quantity IS NULL),st.sttr_quantity,st.sttr_final_quantity))), 0)) as 'sttr_quantity',
            
            (IFNULL(ROUND(SUM((if((st.sttr_final_gs_weight IS NULL OR st.sttr_final_gs_weight = 0),
            IF(st.sttr_gs_weight_type='KG',(ifnull(round(st.sttr_gs_weight,3),0)*1000),
            IF(st.sttr_gs_weight_type='MG',(ifnull(round(st.sttr_gs_weight,3),0)*0.001),
            (ifnull(round(st.sttr_gs_weight,3),0)*1))),
            IF(st.sttr_gs_weight_type='KG',(ifnull(round(st.sttr_final_gs_weight,3),0)*1000),
            IF(st.sttr_gs_weight_type='MG',(ifnull(round(st.sttr_final_gs_weight,3),0)*0.001),
            (ifnull(round(st.sttr_final_gs_weight,3),0)*1)))))),3), 0)) as 'sttr_gs_weight',
            
            (IFNULL(ROUND(SUM((if((st.sttr_final_nt_weight IS NULL OR st.sttr_final_nt_weight = 0),
            IF(st.sttr_nt_weight_type='KG',(ifnull(round(st.sttr_nt_weight,3),0)*1000),
            IF(st.sttr_nt_weight_type='MG',(ifnull(round(st.sttr_nt_weight,3),0)*0.001),
            (ifnull(round(st.sttr_nt_weight,3),0)*1))),
            IF(st.sttr_nt_weight_type='KG',(ifnull(round(st.sttr_final_nt_weight,3),0)*1000),
            IF(st.sttr_nt_weight_type='MG',(ifnull(round(st.sttr_final_nt_weight,3),0)*0.001),
            (ifnull(round(st.sttr_final_nt_weight,3),0)*1)))))),3), 0)) as 'sttr_nt_weight' 
            
            FROM stock_transaction as st 
             INNER JOIN firm AS f ON st.sttr_firm_id = f.firm_id

             WHERE st.sttr_firm_id IN ($firm_id)  
                and st.sttr_status NOT IN ('SOLDOUT','DELETED','ItemReturn','ApprovalDone') 
                and (st.sttr_melting_status IS NULL OR st.sttr_melting_status = '') 
                and st.sttr_indicator IN ('stock', 'AddInvoice')
                and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')
                and st.sttr_stock_type = 'retail'
                and st.sttr_item_category = '$sttr_item_category' 
                and st.sttr_item_name = '$sttr_item_name'
                and st.sttr_purity = '$sttr_purity'
                and st.sttr_metal_type = '$sttr_metal_type'
                group by st.sttr_stock_type,st.sttr_item_category,st.sttr_item_name,st.sttr_purity,st.sttr_metal_type";
//
//and st.sttr_metal_type IN ('GOLD','gold','Gold','SILVER','gold','Gold')  // REMOVE THIS TO CONSOLIDATE ALL METAL TYPE
//if ($sttr_item_name == 'BRACELATE')
//    echo '<br/><br/>$qSelStockItemSumDetails:' . $qSelStockItemSumDetails;
//
//LEFT JOIN stock_transaction as stnst ON st.sttr_id = stnst.sttr_sttr_id 
$resStockItemSumDetails = mysqli_query($conn, $qSelStockItemSumDetails);
//
$noOfStockSumAvailable = mysqli_num_rows($resStockItemSumDetails);
//
//
if ($noOfStockSumAvailable > 0) {
    while ($rowStockItemSumDetails = mysqli_fetch_array($resStockItemSumDetails)) {
//
        $sttr_quantity = $rowStockItemSumDetails['sttr_quantity'];
        $sttr_gs_weight = $rowStockItemSumDetails['sttr_gs_weight'];
        $sttr_nt_weight = $rowStockItemSumDetails['sttr_nt_weight'];

        if ($sttr_stock_type == 'retail') {
            //
            $qSelStockToCheckRetStck = "SELECT st_id "
                    . "FROM stock "
                    . "WHERE st_metal_type = '$sttr_metal_type' and st_item_category = '$sttr_item_category' and st_item_name = '$sttr_item_name' and st_firm_id = '$firm_id' and st_purity = '$purity' AND st_stock_type='retail'";
            //
            $resSelStockToCheckRetStck = mysqli_query($conn, $qSelStockToCheckRetStck);
            //
            $noOfSelStockToCheckRetStck = mysqli_num_rows($resSelStockToCheckRetStck);

            if ($noOfSelStockToCheckRetStck > 0) {
                //
                $queryRet = "UPDATE stock SET st_metal_rate='$sttr_metal_rate', 
             st_quantity='$sttr_quantity', st_gs_weight='$sttr_gs_weight', st_gs_weight_type='$sttr_gs_weight_type', "
                        . "st_pkt_weight='$sttr_calc_pkt_weight', st_pkt_weight_type='$sttr_pkt_weight_type',
             st_nt_weight='$sttr_nt_weight', st_nt_weight_type='$sttr_nt_weight_type', st_fine_weight='$sttr_calc_fine_weight', st_final_fine_weight='$sttr_calc_final_fine_weight',
             st_purity='$purity', st_wastage='$sttr_wastage', st_final_purity='$sttr_final_purity',
             st_item_model_no='$sttr_item_model_no', st_cust_itmcalby='$sttr_cust_itmcalby', st_cust_itmnum='$sttr_cust_itmnum', st_cust_itmcode='$sttr_cust_itmcode', 
             st_price='$sttr_price', st_cust_price='$sttr_cust_price', st_item_sales_pkg='$sttr_item_sales_pkg',
             st_purchase_rate='$sttr_purchase_rate', st_purchase_rate_type='$sttr_purchase_rate_type', st_sell_rate='$sttr_sell_rate', st_sell_rate_type='$sttr_sell_rate_type',
             st_lab_charges='$sttr_calc_lab_charges', st_lab_charges_type='$sttr_lab_charges_type', st_making_charges='$sttr_calc_making_charges', st_making_charges_type='$sttr_making_charges_type',  
             st_tax='$sttr_calc_tax', st_tot_tax='$sttr_calc_tot_tax', st_valuation='$sttr_calc_valuation', st_final_valuation='$sttr_calc_final_valuation' 
              WHERE st_metal_type = '$sttr_metal_type' and st_item_category = '$sttr_item_category' and st_item_name = '$sttr_item_name' and st_firm_id = '$firm_id' and st_purity = '$purity' AND st_stock_type='retail'";
//
            } else {
                //
                $queryRet = "INSERT INTO stock (st_owner_id, st_firm_id, st_metal_type, st_metal_rate, 
             st_item_category, st_item_name, st_item_code, st_type, st_stock_type,
             st_quantity, st_gs_weight, st_gs_weight_type, st_pkt_weight, st_pkt_weight_type,
             st_nt_weight, st_nt_weight_type, st_fine_weight, st_final_fine_weight,
             st_purity, st_wastage, st_final_purity,
             st_item_model_no, st_cust_itmcalby, st_cust_itmnum, st_cust_itmcode, 
             st_price, st_cust_price, st_item_sales_pkg,
             st_purchase_rate, st_purchase_rate_type, st_sell_rate, st_sell_rate_type,
             st_lab_charges, st_lab_charges_type, st_making_charges, st_making_charges_type,  
             st_tax, st_tot_tax, st_valuation, st_final_valuation) 
             VALUES ('$_SESSION[sessionOwnerId]', '$firm_id', '$sttr_metal_type', '$sttr_metal_rate',
             '$sttr_item_category', '$sttr_item_name', '$sttr_item_code', '$sttr_indicator', '$sttr_stock_type',
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
//            if ($sttr_item_name == 'BRACELATE')
//                echo '<br/><br/>$queryRet:' . $queryRet;
            //
            if (!mysqli_query($conn, $queryRet)) {
                die("FileName:omNewStockRecreateFile.php<br/>Error:" . mysqli_error($conn));
            }
        }
//
        //if ($sttr_calc_quantity != $sttr_quantity || round($sttr_calc_gs_weight,3) != $sttr_gs_weight || round($sttr_calc_nt_weight,3) != $sttr_nt_weight) {
        //
//        if (strtolower($sttr_metal_type) == 'gold' && strtolower($sttr_item_name) == 'antique bangles') {
////            echo '<br/><br/>Stock: ' . $firm_id . ' | ' . $sttr_metal_type . ' | ' . $sttr_item_category . ' | ' . $sttr_item_name . ' | ' . $sttr_purity
//            . ' | ' . $sttr_stock_type
//            . ' | ' . $sttr_calc_quantity . '/' . $sttr_quantity
//            . ' | ' . round($sttr_calc_gs_weight, 3) . '/' . $sttr_gs_weight
//            . ' | ' . round($sttr_calc_nt_weight, 3) . '/' . $sttr_nt_weight;
//
//            echo '<br/><br/>$queryRet:' . $queryRet;
//        }
        //}
    }
}
//
?>