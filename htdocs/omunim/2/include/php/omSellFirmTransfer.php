<?php

/*
 * **********************************************************************************************************
 * @tutorial: sell item auto stock transfer when we change the firm at sell time @AUTHOR:MADHUREE-6AUGUST2020
 * **********************************************************************************************************
 *
 * Created on 6 AUGUST 2020 12:30:54 PM
 *
 * @FileName: omSellFirmTransfer.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
?>
<?php

parse_str(getTableValues("SELECT sttr_stock_trans_history AS prevFirmIdHistory,sttr_stock_trans_prev_id AS prevItemCodeHistory,sttr_trans_date AS prevDateHistory FROM stock_transaction WHERE sttr_id = '$request[slPrId]'"));
//
$currentDate = date("d/m/yy - h:i");
$currentDate = $prevDateHistory . '#' . $currentDate;
//
$prevItemCodeHistory = $prevItemCodeHistory . '#' . $request['sttr_item_pre_id'] . $request['sttr_item_id'];
//
parse_str(getTableValues("SELECT sttr_metal_type,sttr_item_category,sttr_item_name,sttr_purity FROM stock_transaction WHERE sttr_id = '$request[slPrId]'"));
//
$qGetTransferItemPreId = "SELECT MAX(CAST(sttr_item_id AS SIGNED)),sttr_item_pre_id FROM stock_transaction WHERE sttr_firm_id = '$firmId' AND sttr_metal_type = '$sttr_metal_type' "
        . "AND sttr_item_category='$sttr_item_category' AND sttr_item_name='$sttr_item_name' AND sttr_purity='$sttr_purity' AND sttr_stock_type IN ('retail') AND (sttr_sttr_id NOT IN ('$request[slPrId]') OR sttr_sttr_id IS NULL) "
        . "AND sttr_transaction_type NOT IN('CATALOGUE','newOrder') AND sttr_indicator = 'stock' AND sttr_status NOT IN ('DELETED')";

$resGetTransferItemPreId = mysqli_query($conn, $qGetTransferItemPreId);
$transferItemPreIdCount = mysqli_num_rows($resGetTransferItemPreId);
$rowTransferItemPreIdCount = mysqli_fetch_array($resGetTransferItemPreId);
//
if ($transferItemPreIdCount > 0 && $rowTransferItemPreIdCount['MAX(CAST(sttr_item_id AS SIGNED))'] != '' && $rowTransferItemPreIdCount['sttr_item_pre_id'] != '') {
    $item_id = $rowTransferItemPreIdCount['MAX(CAST(sttr_item_id AS SIGNED))'];
    $sttr_item_pre_id = $rowTransferItemPreIdCount['sttr_item_pre_id'];
    $sttr_item_id = $item_id + 1;
} else {
    $sttr_item_pre_id = $request['sttr_item_pre_id'];
    $sttr_item_id = 1;
}
$sttr_item_code = $sttr_item_pre_id . $sttr_item_id;
//
// START CODE TO GET PREVIOUS FIRM STOCK DETAIL TO LESS STOCK TRANSFER ENTRY @AUTHOR:MADHUREE-6AUGUST2020
if ($request['PreviousFirmId'] != '' && $request['PreviousFirmId'] != NULL) {
    //
    $prevFirmId = $request['PreviousFirmId'];
    $prevFirmIdHistory = $prevFirmIdHistory . '#' . $prevFirmId;
    //
    $qSelStockItemDetails = "SELECT * FROM stock where st_owner_id = '$sessionOwnerId' "
            . "and  st_metal_type = '$addItemMetalType' and st_item_name = '$addItemName' "
            . "and st_item_category = '$addItemCategory' and st_stock_type = '$stocType' and st_purity = '$addItemFormTunch' "
            . "and st_firm_id = '$prevFirmId'";
    $resStockItemDetails = mysqli_query($conn, $qSelStockItemDetails);
    $rowStockItemDetails = mysqli_fetch_array($resStockItemDetails);
    //
    $stId = $rowStockItemDetails['st_id'];
    $stMetal = $rowStockItemDetails['st_metal_type'];
    $stType = $rowStockItemDetails['st_type'];
    $stockTyp = $rowStockItemDetails['st_type'];
    $stockQty = $rowStockItemDetails['st_quantity'];
    $stockPurity = $rowStockItemDetails['st_purity'];
    $stockWastage = $rowStockItemDetails['st_wastage'];
    $stockPktWT = $rowStockItemDetails['st_pkt_weight'];
    $stockFinalPurity = decimalVal(($stockPurity + $stockWastage), 2);
    $stockGSW = getTotalWeight($rowStockItemDetails['st_gs_weight'], $rowStockItemDetails['st_gs_weight_type'], 'weight');
    $stockGSWT = $rowStockItemDetails['st_gs_weight_type'];
    $stockNTW = getTotalWeight($rowStockItemDetails['st_nt_weight'], $rowStockItemDetails['st_nt_weight_type'], 'weight');
    $stockNTWT = $rowStockItemDetails['st_nt_weight_type'];
    $stockFineWt = $rowStockItemDetails['st_fine_weight'];
    $stockFineWtType = $rowStockItemDetails['st_fine_weight_type'];
    $stockFinalFineWt = $rowStockItemDetails['st_final_fine_weight'];
    $stockMetalRate = $rowStockItemDetails['st_metal_rate'];
    $stockCustPrice = $rowStockItemDetails['st_cust_price'];
    $stockPrice = $rowStockItemDetails['st_price'];
    $stockCustItmCode = $rowStockItemDetails['st_cust_itmcode'];
    $stockCustItmNum = $rowStockItemDetails['st_cust_itmnum'];
    $stockSellRate = $rowStockItemDetails['st_sell_rate'];
    $stockSellRateType = $rowStockItemDetails['st_sell_rate_type'];
    $stockLabChrgs = $rowStockItemDetails['st_lab_charges'];
    $stockMkgChrgs = $rowStockItemDetails['st_making_charges'];
    $stockTax = $rowStockItemDetails['st_tax'];
    $stockTotTax = $rowStockItemDetails['st_tot_tax'];
    $stockVal = $rowStockItemDetails['st_valuation'];
    $stockFinalVal = $rowStockItemDetails['st_final_valuation'];
    $stItemCode = $rowStockItemDetails['st_item_code'];
    $stStockType = $rowStockItemDetails['st_stock_type'];
    //
    if ($operation == 'delete') {
        if ($stMetal == 'stock' || $addItemMetalType == 'stock') {
            if ($stockQty - $sttrQuantity > 0) {
                $stockAvgRate = (($stockPrice * ($stockQty)) - ($sttrQuantity * $sttrPrice)) / ($stockQty - $sttrQuantity);
                $stockMetalRate = $sttrPrice;
            }
        } else {
            if ($stockFineWt - $sttrFINEWT > 0)
                $stockAvgRate = (($stockMetalRate * ($stockFineWt)) - ($sttrFINEWT * $sttrMetalRate)) / ($stockFineWt - $sttrFINEWT);
        }
    }
    $stockAvgRate = decimalVal($stockAvgRate, 2);
    //Quantity
    $stQty = ($stockQty - $sttrQuantity);

    // Gross Weight
    $totalGSW = decimalVal(($stockGSW - $sttrGSWT), 3);
    $totalGSWT = 'GM';
    $stGSW = getTotalWeight($totalGSW, $totalGSWT, 'weight');
    $stGSWT = 'GM';

    // Net Weight
    $totalNTW = decimalVal(($stockNTW - $sttrNTWT), 3);
    $totalNTWT = 'GM';
    $stNTW = getTotalWeight($totalNTW, $totalNTWT, 'weight');
    $stNTWT = 'GM';

    // Packet Weight
    $stPKTWT = ($stockPktWT);

    // Purity
    $stTNCH = ($stockPurity);

    // Wastage
    $stWSTG = ($stockWastage);

    // Final Purity
    $stFTNCH = decimalVal(($stTNCH + $stWSTG), 2);

    // Fine Weight
    $stFNWT = decimalVal((($stTNCH * $stNTW) / 100), 3);
    $stFNWT = getTotalWeight($stFNWT, $stNTWT, 'weight');
    $stFNWTT = 'GM';

    // Final Fine Weight
    $stFFWT = decimalVal((($stFTNCH * $totalNTW) / 100), 3);
    $stFFWT = getTotalWeight($stFFWT, $totalNTWT, 'weight');
    $stFFWTT = 'GM';

    // Total Lab Charges
    $stLabChrgs = ($stockLabChrgs);

    // Total Making Charges
    $stMkgChrgs = ($stockMkgChrgs);

    // Price
    $stPrice = ($stockPrice);

    // Sell Price
    $stCustPrice = ($stockCustPrice);

    // Cust Item Code
    $stCustItmCode = ($stockCustItmCode);

    // Cust Item Num
    $stCustItmNum = ($stockCustItmNum);

    // Sell Rate
    $stSellRate = ($stockSellRate);

    // Sell Rate Type
    $stSellRateType = ($stockSellRateType);

    // Purchase Rate
    $stPurchaseRate = ($stockPurchaseRate);

    // Purchase Rate
    if ($stPurchaseRate == NULL) {
        $stPurchaseRate = $stockAvgRate;
    }

    // Purchase Rate Type
    $stPurchaseRateType = ($stockPurchaseRateType);

    // Tax
    $stTax = ($stockTax);

    // Total Tax
    $stTotTax = ($stockTotTax);

    // Valuation
    if ($stCustPrice != NULL) {
        $stVal = ($stQty * $stCustPrice);
    } else if ($stSellRate != NULL) {
        $stVal = ($stQty * $stSellRate);
    } else {
        $stVal = ($stockVal - $sttrVal);
    }

    // Final Valuation
    $stFinalVal = ($stockFinalVal - $sttrFinalVal);

    $stItemCategory = addslashes($stItemCategory);

    if ($request['sttr_transaction_type'] == 'sell') {
        $updateStockAvgRate = " ";
    } else {
        $updateStockAvgRate = " , st_metal_rate = '$stockMetalRate', st_pur_avg_rate = '$stockAvgRate' ";
    }
    //
}
// END CODE TO GET PREVIOUS FIRM STOCK DETAIL TO LESS STOCK TRANSFER ENTRY @AUTHOR:MADHUREE-6AUGUST2020
//
// START CODE TO UPDATE PREVIOUS FIRM ENTRY BY SUBTRACTING SELL STOCK DETIALS @AUTHOR:MADHUREE-6AUGUST2020
$updateQuery = "UPDATE stock SET st_quantity = '$stQty',st_wastage = '$stWSTG',st_final_purity = '$stFTNCH',st_pkt_weight = '$stPKTWT',st_gs_weight = '$stGSW',st_gs_weight_type = '$stGSWT',"
        . "st_nt_weight = '$stNTW',st_nt_weight_type = '$stNTWT',st_lab_charges = '$stLabChrgs', st_making_charges = '$stMkgChrgs', st_price = '$stPrice',"
        . "st_cust_itmcode = '$stCustItmCode', st_cust_itmnum = '$stCustItmNum', st_cust_price = '$stCustPrice',"
        . "st_purchase_rate = '$stPurchaseRate', st_purchase_rate_type = '$stPurchaseRateType', st_sell_rate = '$stSellRate', st_sell_rate_type = '$stSellRateType',"
        . "st_fine_weight = '$stFNWT',st_fine_weight_type = '$stFNWTT',st_final_fine_weight = '$stFFWT',st_tax = '$stTax', st_tot_tax = '$stTotTax',"
        . "st_valuation = '$stVal', st_final_valuation = '$stFinalVal' $updateStockAvgRate WHERE st_id = '$stId'";
//
if (!mysqli_query($conn, $updateQuery)) {
    die($updateQuery . 'Error: ' . mysqli_error($conn));
}
// END CODE TO UPDATE PREVIOUS FIRM ENTRY BY SUBTRACTING SELL STOCK DETIALS @AUTHOR:MADHUREE-6AUGUST2020
//
// START CODE TO INSERT NEW TRANSFERED EXISTING ENTRY INTO STOCK TRANSACTION TABLE TO MAP THE CURRENT SELL ENTRY @AUTHOR:MADHUREE-6AUGUST2020
parse_str(getTableValues("SELECT sttr_id AS mainSttrId,sttr_transaction_type,sttr_stock_type,sttr_quantity,sttr_pkt_weight ,sttr_gs_weight,sttr_gs_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_tot_tax,"
                . "sttr_valuation,sttr_final_valuation  FROM stock_transaction WHERE sttr_item_code='$addItemCode' AND sttr_firm_id = '$prevFirmId' AND sttr_transaction_type IN ('PURONCASH','PURBYSUPP','EXISTING','TAG') and sttr_status NOT IN('DELETED')"));
//
if ($sttr_transaction_type == 'PURBYSUPP' || $sttr_stock_type == 'wholesale') {
    //
    $transType = 'EXISTING';
    $sttrStatus = 'SOLDOUT';
    //
    parse_str(getTableValues("SELECT sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_metal_rate,sttr_product_purchase_rate,"
                    . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_total_making_charges,"
                    . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
                    . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
                    . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_owner_id,sttr_current_status FROM stock_transaction WHERE sttr_id='$sttrId'"));
    //
    $insertSttrQuery = "INSERT INTO stock_transaction (sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_quantity,sttr_metal_rate,sttr_product_purchase_rate,"
            . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_total_making_charges,"
            . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_final_valuation,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
            . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
            . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_firm_id,sttr_owner_id,sttr_item_code,sttr_current_status,sttr_status,sttr_stock_trans_history,sttr_stock_trans_prev_id,sttr_stock_trans_type,sttr_trans_date)VALUES "
            . "('$transType','$sttr_item_pre_id','$sttr_item_id','$sttr_metal_type','$sttr_stock_type','$sttr_item_category','$sttr_item_name','$sttr_indicator','$addItemFormQty','$sttr_metal_rate','$sttr_product_purchase_rate',"
            . "'$sttr_purity','$sttr_wastage','$sttr_final_purity','$sttr_cust_wastage','$sttr_cust_wastage_wt','$addItemFormGrossWeight','$sttr_gs_weight_type','$addItemFormPktWT','$sttr_pkt_weight_type','$addItemFormNetWeight','$sttr_nt_weight_type','$addItemFineWeight','$addItemFFineWeight','$sttr_total_making_charges',"
            . "'$sttr_making_charges_type','$sttr_other_charges_type','$sttr_tax','$sttr_tot_tax','$addItemFormVal','$addItemFormFinalVal','$sttr_mkg_cgst_per','$sttr_mkg_cgst_chrg','$sttr_mkg_sgst_per','$sttr_mkg_sgst_chrg','$sttr_mkg_igst_per','$sttr_mkg_igst_chrg','$sttr_tot_price_cgst_per','$sttr_tot_price_cgst_chrg',"
            . "'$sttr_tot_price_sgst_per','$sttr_tot_price_sgst_chrg','$sttr_tot_price_igst_chrg','$sttr_pre_invoice_no','$sttr_invoice_no','$sttr_mkg_charges_by','$sttr_final_val_by','$sttr_value_added','$sttr_price','$sttr_total_cust_price','$sttr_metal_amt','$sttr_total_making_amt','$sttr_metal_discount_per',"
            . "'$sttr_metal_discount_amt','$sttr_add_date','$sttr_mfg_date','$firmId','$sttr_owner_id','$sttr_item_code','$sttr_current_status','$sttrStatus','$prevFirmIdHistory','$prevItemCodeHistory','AUTOMATIC','$currentDate')";
    if (!mysqli_query($conn, $insertSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    parse_str(getTableValues("SELECT sttr_id AS new_sttr_sttr_id FROM stock_transaction ORDER BY sttr_id DESC LIMIT 0,1"));
    //
    $updateSttrQuery = "UPDATE stock_transaction SET sttr_sttr_id='$new_sttr_sttr_id',sttr_item_pre_id='$sttr_item_pre_id',sttr_item_id='$sttr_item_id',sttr_item_code='$sttr_item_code' WHERE sttr_id='$sttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell')";
    if (!mysqli_query($conn, $updateSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
} else if (($sttr_stock_type == 'retail') && ($sttr_quantity != $addItemFormQty || $sttr_gs_weight != $addItemFormGrossWeight || $sttr_nt_weight != $addItemFormNetWeight)) {
    //
    $finalSttrQty = ($sttr_quantity - $addItemFormQty);
    $finalSttrPktWT = ($sttr_pkt_weight - $addItemFormPktWT);
    $finalSttrGSWT = ($sttr_gs_weight - $addItemFormGrossWeight);
    $finalSttrGSWType = ($sttr_gs_weight_type);
    $finalSttrGSWT = getTotalWeight($finalSttrGSWT, $finalSttrGSWType, 'weight');
    $finalSttrNTWT = ($sttr_nt_weight - $addItemFormNetWeight);
    $finalSttrNTWType = ($sttr_nt_weight_type );
    $finalSttrNTWT = getTotalWeight($finalSttrNTWT, $finalSttrNTWType, 'weight');
    $finalSttrFNWT = ($sttr_fine_weight - $addItemFineWeight);
    $finalSttrFFWT = ($sttr_final_fine_weight - $addItemFFineWeight);
    $finalSttrTotTax = ($sttr_tot_tax - $addItemFormTotTax);
    $finalSttrVal = ($sttr_valuation - $addItemFormVal);
    $finalSttrFinalVal = ($sttr_final_valuation - $addItemFormFinalVal);
    //
    $updateMainSttrQuery = "UPDATE stock_transaction SET sttr_quantity = '$finalSttrQty',"
            . "sttr_pkt_weight = '$finalSttrPktWT',sttr_gs_weight = '$finalSttrGSWT',sttr_gs_weight_type = '$finalSttrGSWType',"
            . "sttr_nt_weight = '$finalSttrNTWT',sttr_nt_weight_type = '$finalSttrNTWType',"
            . "sttr_fine_weight = '$finalSttrFNWT',sttr_final_fine_weight = '$finalSttrFFWT',sttr_tot_tax = '$finalSttrTotTax',"
            . "sttr_valuation = '$finalSttrVal',sttr_final_valuation = '$finalSttrFinalVal',sttr_item_pre_id='$sttr_item_pre_id',sttr_item_id='$sttr_item_id'"
            . ",sttr_item_code='$sttr_item_code' WHERE sttr_firm_id = '$prevFirmId' and sttr_id='$mainSttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn, $updateMainSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    $transType = 'EXISTING';
    $sttrStatus = 'SOLDOUT';
    //
    parse_str(getTableValues("SELECT sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_metal_rate,sttr_product_purchase_rate,"
                    . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_total_making_charges,"
                    . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
                    . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
                    . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_owner_id,sttr_current_status FROM stock_transaction WHERE sttr_id='$sttrId'"));
    //
    $insertSttrQuery = "INSERT INTO stock_transaction (sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_quantity,sttr_metal_rate,sttr_product_purchase_rate,"
            . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_total_making_charges,"
            . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_final_valuation,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
            . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
            . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_firm_id,sttr_owner_id,sttr_item_code,sttr_current_status,sttr_status,sttr_stock_trans_history,sttr_stock_trans_prev_id,sttr_stock_trans_type,sttr_trans_date)VALUES "
            . "('$transType','$sttr_item_pre_id','$sttr_item_id','$sttr_metal_type','$sttr_stock_type','$sttr_item_category','$sttr_item_name','$sttr_indicator','$addItemFormQty','$sttr_metal_rate','$sttr_product_purchase_rate',"
            . "'$sttr_purity','$sttr_wastage','$sttr_final_purity','$sttr_cust_wastage','$sttr_cust_wastage_wt','$addItemFormGrossWeight','$sttr_gs_weight_type','$addItemFormPktWT','$sttr_pkt_weight_type','$addItemFormNetWeight','$sttr_nt_weight_type','$addItemFineWeight','$addItemFFineWeight','$sttr_total_making_charges',"
            . "'$sttr_making_charges_type','$sttr_other_charges_type','$sttr_tax','$sttr_tot_tax','$addItemFormVal','$addItemFormFinalVal','$sttr_mkg_cgst_per','$sttr_mkg_cgst_chrg','$sttr_mkg_sgst_per','$sttr_mkg_sgst_chrg','$sttr_mkg_igst_per','$sttr_mkg_igst_chrg','$sttr_tot_price_cgst_per','$sttr_tot_price_cgst_chrg',"
            . "'$sttr_tot_price_sgst_per','$sttr_tot_price_sgst_chrg','$sttr_tot_price_igst_chrg','$sttr_pre_invoice_no','$sttr_invoice_no','$sttr_mkg_charges_by','$sttr_final_val_by','$sttr_value_added','$sttr_price','$sttr_total_cust_price','$sttr_metal_amt','$sttr_total_making_amt','$sttr_metal_discount_per',"
            . "'$sttr_metal_discount_amt','$sttr_add_date','$sttr_mfg_date','$firmId','$sttr_owner_id','$sttr_item_code','$sttr_current_status','$sttrStatus','$prevFirmIdHistory','$prevItemCodeHistory','AUTOMATIC','$currentDate')";
    if (!mysqli_query($conn, $insertSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    parse_str(getTableValues("SELECT sttr_id AS new_sttr_sttr_id FROM stock_transaction ORDER BY sttr_id DESC LIMIT 0,1"));
    //
    $updateSttrQuery = "UPDATE stock_transaction SET sttr_sttr_id='$new_sttr_sttr_id',sttr_item_pre_id='$sttr_item_pre_id',sttr_item_id='$sttr_item_id',sttr_item_code='$sttr_item_code' WHERE sttr_id='$sttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell')";
    if (!mysqli_query($conn, $updateSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $updateSellSttrQuery = "UPDATE stock_transaction SET sttr_item_pre_id='$sttr_item_pre_id',sttr_item_id='$sttr_item_id',sttr_item_code='$sttr_item_code' WHERE sttr_sttr_id = '$mainSttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]'";
    if (!mysqli_query($conn, $updateSellSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }

    $updateSttrQuery = "UPDATE stock_transaction SET sttr_firm_id='$firmId',sttr_stock_trans_history='$prevFirmIdHistory',sttr_stock_trans_prev_id='$prevItemCodeHistory',sttr_stock_trans_type='AUTOMATIC',sttr_trans_date='$currentDate',sttr_item_pre_id='$sttr_item_pre_id',sttr_item_id='$sttr_item_id',sttr_item_code='$sttr_item_code'"
            . " WHERE sttr_id = '$mainSttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]'";
    if (!mysqli_query($conn, $updateSttrQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//
// END CODE TO INSERT NEW TRANSFERED EXISTING ENTRY INTO STOCK TRANSACTION TABLE TO MAP THE CURRENT SELL ENTRY @AUTHOR:MADHUREE-6AUGUST2020
//
?>