<?php
/*
 * **************************************************************************************
 * @tutorial: RECREATE STOCK CONSOLIDATION INTO STOCK TABLE @PRIYANKA-11FEB2022
 * **************************************************************************************
 * 
 * Created on 11 FEB, 2022 06:54:00 PM
 *
 * @FileName: omStockMismatchStockRecreationMain.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.122
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-11FEB2022
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
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// START CODE FOR STOCK CONSOLIDATION INTO STOCK TABLE @PRIYANKA-11FEB2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//
//
$productId = $_REQUEST['productId'];
//
$transFirmId = $_REQUEST['transFirmId'];
//
$subPanelName = $_REQUEST['subPanelName'];
//
//
//echo '$productId == ' . $productId . '<br />';
//echo '$transFirmId == ' . $transFirmId . '<br />';
//echo '$subPanelName == ' . $subPanelName . '<br />';
//
//
parse_str(getTableValues("SELECT sttr_firm_id as prodFirmId, "
                       . "sttr_metal_type as prodMetalType, "
                       . "sttr_item_category as prodCategory, "
                       . "sttr_item_name as prodName, "
                       . "sttr_purity as prodPurity, "
                       . "sttr_stock_type as prodStockType, "
                       . "sttr_indicator as prodIndicator "
                       . "FROM stock_transaction "
                       . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_id = '$productId'"));
//
//
if ($prodIndicator == 'AddInvoice') {
    $prodIndicator = 'stock';
}
//
//
//echo '$prodFirmId == ' . $prodFirmId . '<br />';
//echo '$prodMetalType == ' . $prodMetalType . '<br />';
//echo '$prodCategory == ' . $prodCategory . '<br />';
//echo '$prodName == ' . $prodName . '<br />';
//echo '$prodPurity == ' . $prodPurity . '<br />';
//echo '$prodStockType == ' . $prodStockType . '<br />';
//echo '$prodIndicator == ' . $prodIndicator . '<br />';
//
//
$query = "DELETE FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
       . "AND st_firm_id = '$prodFirmId' AND st_metal_type = '$prodMetalType' "
       . "AND st_item_category = '$prodCategory' AND st_item_name = '$prodName' "
       . "AND st_purity = '$prodPurity' "
       . "AND st_stock_type = '$prodStockType' AND st_type = '$prodIndicator' ";
//
//echo '$query == ' . $query . '<br />';
//
if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
//
// ======================================================================================
// START CODE FOR STOCK CONSOLIDATION INTO STOCK TABLE @PRIYANKA-11FEB2022
// ======================================================================================
$qSelStockItemDetails1 = "SELECT * FROM stock_transaction WHERE sttr_id = '$productId'";
//
//echo '$qSelStockItemDetails1 : ' . $qSelStockItemDetails1 . '<br /><br />';
//
$resStockItemDetails1 = mysqli_query($conn, $qSelStockItemDetails1);
//
$noOfStockAvailable1 = mysqli_num_rows($resStockItemDetails1);
//
//
while ($rowStockItemDetails1 = mysqli_fetch_array($resStockItemDetails1)) {
    //
    //
    $firm_id = $rowStockItemDetails1['sttr_firm_id'];
    $metal_type = $rowStockItemDetails1['sttr_metal_type'];
    $item_category = $rowStockItemDetails1['sttr_item_category'];
    $item_name = $rowStockItemDetails1['sttr_item_name'];
    $stock_type = $rowStockItemDetails1['sttr_stock_type'];
    $purity = $rowStockItemDetails1['sttr_purity'];
    //
    //
    //echo '$firm_id : ' . $firm_id . '<br />';
    //echo '$metal_type : ' . $metal_type . '<br />';
    //echo '$item_category : ' . $item_category . '<br />';
    //echo '$item_name : ' . $item_name . '<br />';
    //echo '$stock_type : ' . $stock_type . '<br />';
    //echo '$purity : ' . $purity . '<br />';
    //
    //
    if ($rowStockItemDetails1['sttr_indicator'] == 'AddInvoice') {
        $sttr_indicator = 'stock';
    } else {
        $sttr_indicator = $rowStockItemDetails1['sttr_indicator'];
    }
    //
    //
    $noOfStockAvailable = 0;
    $noOfSellStockAvailable = 0;
    //
    //echo '$noOfStockAvailable !!:!! ' . $noOfStockAvailable . '<br />';
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
    //echo '$qSelStockItemDetails : ' . $qSelStockItemDetails . '<br /><br />';
    //
    $resStockItemDetails = mysqli_query($conn, $qSelStockItemDetails);
    //
    $noOfStockAvailable = mysqli_num_rows($resStockItemDetails);
    //
    $rowStockItemDetails = mysqli_fetch_array($resStockItemDetails);
    //
    //
    //if ($noOfStockAvailable) {
    //    echo '$noOfStockAvailable @@:@@ ' . $noOfStockAvailable . '<br /><br />';
    //}
    //
    //
    $sttr_main_prod_firm_id = $rowStockItemDetails['sttr_firm_id'];
    $sttr_main_prod_metal_type = $rowStockItemDetails['sttr_metal_type'];
    $sttr_main_prod_item_category = $rowStockItemDetails['sttr_item_category'];
    $sttr_main_prod_item_name = $rowStockItemDetails['sttr_item_name'];
    $sttr_main_prod_stock_type = $rowStockItemDetails['sttr_stock_type'];    
    $sttr_main_prod_purity = $rowStockItemDetails['sttr_purity'];
    //
    //             
    $sttr_main_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
    $sttr_main_item_code = $rowStockItemDetails['sttr_item_code'];
    $sttr_main_indicator = $rowStockItemDetails['sttr_indicator'];
    //
    //
    //echo '$sttr_main_metal_rate 1== ' . $sttr_main_metal_rate . '<br />';
    //echo '$sttr_main_item_code 1== ' . $sttr_main_item_code . '<br />';
    //echo '$sttr_main_indicator 1== ' . $sttr_main_indicator . '<br />';
    //
    //
    $sttr_main_prod_quantity = $rowStockItemDetails['sttr_quantity'];
    //
    if ($sttr_main_prod_quantity == '' || $sttr_main_prod_quantity == NULL) {
        $sttr_main_prod_quantity = 0;
    }
    //
    $sttr_main_prod_gs_weight = om_round($rowStockItemDetails['sttr_gs_weight'],3);
    $sttr_gs_weight_type = 'GM';
    //
    $sttr_main_prod_pkt_weight = om_round($rowStockItemDetails['sttr_pkt_weight'],3);
    $sttr_pkt_weight_type = 'GM';
    //
    $sttr_main_prod_nt_weight = om_round($rowStockItemDetails['sttr_nt_weight'],3);
    $sttr_nt_weight_type = 'GM';
    //
    $sttr_main_prod_fine_weight = om_round($rowStockItemDetails['sttr_fine_weight'],3);
    $sttr_main_prod_final_fine_weight = om_round($rowStockItemDetails['sttr_final_fine_weight'],3);
    //
    $sttr_main_prod_lab_charges = om_round($rowStockItemDetails['sttr_lab_charges'],2);
    $sttr_main_prod_making_charges = om_round($rowStockItemDetails['sttr_making_charges'],2);
    //
    $sttr_main_prod_taxt = om_round($rowStockItemDetails['sttr_tax'], 2);
    $sttr_main_prod_tot_tax = om_round($rowStockItemDetails['sttr_tot_tax'], 2);
    //
    $sttr_main_prod_valuation = om_round($rowStockItemDetails['sttr_valuation'], 2);
    $sttr_main_prod_final_valuation = om_round($rowStockItemDetails['sttr_final_valuation'], 2);
    //
    //
    //
    //
    // =============================================================================================================
    // START CODE TO LESS SELL ENTRIES FROM EXSITING RETAIL OR WHOLESALE ENTRY TO RECREATE STOCK @PRIYANKA-11FEB2022 
    // =============================================================================================================
    //
    //
    // . "GROUP BY sttr_firm_id, sttr_metal_type, sttr_item_category, sttr_item_name, sttr_purity, sttr_stock_type "
    // . "ORDER BY sttr_item_category"
    //
    //
    //echo 'sttr_transaction_type : ' . $rowStockItemDetails['sttr_transaction_type'] . '<br/>';
    //echo 'sttr_st_id : ' . $rowStockItemDetails[sttr_st_id] . '<br/>';
    //
    //
    //
    // IF TRANSACTION TYPE IS PURBYSUPP @AUTHOR:PRIYANKA-12JAN2022
    if (($rowStockItemDetails1['sttr_transaction_type'] == 'PURBYSUPP') || 
        ($rowStockItemDetails1['sttr_transaction_type'] == 'EXISTING' && 
         $rowStockItemDetails1['sttr_stock_type'] == 'wholesale')) {
        //
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
        //
    } else {
        //
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
        //
    }
    //
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
    //
    //echo '$qSelSellStockItemDetails : ' . $qSelSellStockItemDetails . '<br /><br />';
    //
    //
    $resSellStockItemDetails = mysqli_query($conn, $qSelSellStockItemDetails);
    //
    $noOfSellStockAvailable = mysqli_num_rows($resSellStockItemDetails);
    //
    //
    //echo '$noOfSellStockAvailable : ' . $noOfSellStockAvailable . '<br /><br />';
    //
    //
    //if ($noOfSellStockAvailable > 0) {
        //
        $rowSellStockItemDetails = mysqli_fetch_array($resSellStockItemDetails);
        //
        //
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
        //echo '$sttr_sell_item_code : ' . $sttr_sell_item_code . '<br />';
        //
        $sttr_sell_quantity = $rowSellStockItemDetails['sttr_sell_quantity'];
        //
        if ($sttr_sell_quantity == '' || $sttr_sell_quantity == NULL) {
            $sttr_sell_quantity = 0;
        }
        //
        $sttr_sell_gs_weight = om_round($rowSellStockItemDetails['sttr_sell_gs_weight'],3);
        $sttr_sell_pkt_weight = om_round($rowSellStockItemDetails['sttr_sell_pkt_weight'],3);
        $sttr_sell_nt_weight = om_round($rowSellStockItemDetails['sttr_sell_nt_weight'],3);
        //
        $sttr_sell_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_fine_weight'],3);
        $sttr_sell_final_fine_weight = om_round($rowSellStockItemDetails['sttr_sell_final_fine_weight'],3);
        //
        $sttr_sell_lab_charges = om_round($rowSellStockItemDetails['sttr_sell_lab_charges'],2);
        $sttr_sell_making_charges = om_round($rowSellStockItemDetails['sttr_sell_making_charges'],2);
        //
        $sttr_sell_tax = om_round($rowSellStockItemDetails['sttr_sell_tax'],2);
        $sttr_sell_tot_tax = om_round($rowSellStockItemDetails['sttr_sell_tot_tax'],2);
        //
        $sttr_sell_valuation = om_round($rowSellStockItemDetails['sttr_sell_valuation'],2);
        $sttr_sell_final_valuation = om_round($rowSellStockItemDetails['sttr_sell_final_valuation'],2);
        //
        //
        //
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
        //
        //
        //
//        echo 'sttr_category : ' . $rowStockItemDetails['sttr_item_category'] . '<br>';
//        echo 'sttr_item_name : ' . $rowStockItemDetails['sttr_item_name'] . '<br>';
//        //
//        echo 'sttr_main_prod_quantity : ' . $sttr_main_prod_quantity . '<br>';
//        echo 'sttr_sell_quantity : ' . $sttr_sell_quantity . '<br>';
//        echo 'sttr_calc_quantity : ' . $sttr_calc_quantity . '<br>';
//        echo 'sttr_final_quantity : ' . $rowStockItemDetails['sttr_final_quantity'] . '<br>';
//        echo '<br>';
//        //
//        echo 'sttr_main_prod_gs_weight : ' . $sttr_main_prod_gs_weight . '<br>';
//        echo 'sttr_sell_gs_weight : ' . $sttr_sell_gs_weight . '<br>';
//        echo 'sttr_calc_gs_weight : ' . $sttr_calc_gs_weight . '<br>';
//        echo 'sttr_final_gs_weight : ' . $rowStockItemDetails['sttr_final_gs_weight'] . '<br>';
//        echo '<br>';
//        //
//        echo 'sttr_nt_weight : ' . $rowStockItemDetails['sttr_nt_weight'] . '<br>';
//        echo 'sttr_sell_nt_weight : ' . $sttr_sell_nt_weight . '<br>';
//        echo 'sttr_calc_nt_weight : ' . $sttr_calc_nt_weight . '<br>';
//        echo 'sttr_final_nt_weight : ' . $rowStockItemDetails['sttr_final_nt_weight'] . '<br>';
//        echo '<br>';
//        //
//        echo 'sttr_fn_weight : ' . $rowStockItemDetails['sttr_fine_weight'] . '<br>';
//        echo 'sttr_sell_fn_weight : ' . $sttr_calc_fine_weight . '<br>';
//        echo 'sttr_calc_fn_weight : ' . $sttr_calc_fn_weight . '<br>';
//        echo '<br><br><br>';
        //
        //
        //
        //
    //}
    //
    //
    // ===========================================================================================================
    // END CODE TO LESS SELL ENTRIES FROM EXSITING RETAIL OR WHOLESAKE ENTRY TO RECREATE STOCK @PRIYANKA-11FEB2022 
    // ===========================================================================================================
    //
    //
    //
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
        //
        $sttr_metal_rate = $rowStockItemDetails['sttr_metal_rate'];
        $sttr_item_code = $rowStockItemDetails['sttr_item_code'];
        //
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
        //
    } else {
        //
        //
        $sttr_indicator = $rowSellStockItemDetails['sttr_indicator'];
        $sttr_metal_rate = $rowSellStockItemDetails['sttr_metal_rate'];
        $sttr_item_code = $rowSellStockItemDetails['sttr_item_code'];
        //
        //
        //echo '$sttr_item_code == ' . $sttr_item_code . '<br />';
        //
        //
        if ($noOfStockAvailable == 0) {
            $sttr_item_code = $rowSellStockItemDetails['sttr_item_pre_id'] . $rowSellStockItemDetails['sttr_item_id'];
        }
        //
        //
        //echo '$sttr_indicator 2== ' . $sttr_indicator . '<br />';
        //echo '$sttr_metal_rate 2== ' . $sttr_metal_rate . '<br />';
        //echo '$sttr_item_code 2== ' . $sttr_item_code . '<br />';
        //
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
        //
    }
    //
    //
    //echo '$sttr_indicator #== ' . $sttr_indicator . '<br />';
    //echo '$sttr_metal_rate #== ' . $sttr_metal_rate . '<br />';
    //echo '$sttr_item_code #== ' . $sttr_item_code . '<br />';
    //
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
    //
    //
    //echo '$query == ' . $query . '<br /><br />';
    //
    //
    if (!mysqli_query($conn, $query)) {
        die("FileName:omNewStockRecreateFile.php<br/>Error:" . mysqli_error($conn));
    }
    //
    //
    parse_str(getTableValues("SELECT st_id as stockId FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
                           . "AND st_firm_id = '$prodFirmId' AND st_metal_type = '$prodMetalType' "
                           . "AND st_item_category = '$prodCategory' AND st_item_name = '$prodName' "
                           . "AND st_purity = '$prodPurity' "
                           . "AND st_stock_type = '$prodStockType' "));
    //
    //
}
// =============================================================================
// END CODE FOR STOCK CONSOLIDATION INTO STOCK TABLE @PRIYANKA-11FEB2022
// =============================================================================
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// END CODE FOR STOCK CONSOLIDATION INTO STOCK TABLE @PRIYANKA-11FEB2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//
//
//
//
$query = "UPDATE stock_transaction SET sttr_recreate_status = 'StockRecreated', sttr_st_id = '$stockId' "
       . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
       . "AND sttr_firm_id = '$prodFirmId' AND sttr_metal_type = '$prodMetalType' "
       . "AND sttr_item_category = '$prodCategory' AND sttr_item_name = '$prodName' "
       . "AND sttr_purity = '$prodPurity' "
       . "AND sttr_stock_type = '$prodStockType' "
       . "AND sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'PURCHASE', 'EXISTING', 'TAG') ";
//
//echo '$query == ' . $query . '<br />';
//
if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
header("Location: $documentRoot/include/php/omStockMismatchStockRecreation.php?messageDisplay=StockRecreatedSuccessfully");
//
//
?>