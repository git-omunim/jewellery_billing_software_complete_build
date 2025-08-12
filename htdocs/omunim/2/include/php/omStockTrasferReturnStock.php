<?php
/*
 * ************************************************************************************** ***********************
 * @Description: STOCK TRANSFER - RETURN STOCK @Author:PRIYANKA-23JUNE2022
 * **************************************************************************************************************
 *
 * Created on JUNE 23, 2022 07:46:00 PM
 *
 * @FileName: omStockTrasferApprovalPending.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.164
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 * Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 * MODIFICATION DATE: @Author:PRIYANKA-23JUNE2022
 * AUTHOR:
 * REASON:
 *
 * Project Name: Online Munim ERP Accounting Software 2.7.164
 * Version: 2.7.164
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
//
// *****************************************************************************************************
// START TO ADD CODE FOR STOCK TRANSFER - RETURN STOCK @Author:PRIYANKA-23JUNE2022
// *****************************************************************************************************
//
parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and sttr_id = '$sttrId'"));
//
//
parse_str(getTableValues("SELECT firm_type FROM firm WHERE firm_id = '$sttr_stock_transfer_previous_firm_id'"));
//
//
$arrAddDate = explode(' ', $sttr_add_date);
//
$day = $arrAddDate[0];
$month = strtoupper($arrAddDate[1]);
$year = $arrAddDate[2];
//
//
// STOCK TRANSFERRED FIRM ID @Author:PRIYANKA-23JUNE2022
$mainPrevEntryFirmId = $sttr_firm_id;
//
//
// MAIN STOCK RETURN FIRM ID @Author:PRIYANKA-23JUNE2022
$sttr_firm_id = $sttr_stock_transfer_previous_firm_id;
//
//
// ARRAY REQUEST @Author:PRIYANKA-23JUNE2022
$info = array('firmId' => $sttr_firm_id,
    'firmPublicPrivate' => $firm_type, 'importPanelName' => 'AddStockImportPanel',
    'addItemDOBDay' => $day, 'addItemDOBMonth' => $month, 'addItemDOBYear' => $year, 'gbMonthId' => 0,
    'addItemMDOBDay' => $day, 'addItemMDOBMonth' => $month, 'addItemMDOBYear' => $year,
    'sttr_fixed_price_status' => FALSE, 'panelSimilarDiv' => 'NoSimilarItem',
    'panelExistinItem' => false, 'panelAddStockItem' => false, 'panelPurchOnCashItem' => false,
    'addPanel' => 'AddStock', 'stockPanelName' => 'AddStock', 'upPanel' => 'AddPanel',
    'payButClickId' => false, 'mainPanel' => 'StockPanel', 'suppPanelName' => 'AddStock',
    'subPanel' => 'AddStock', 'panelName' => 'AddStock', 'stockType' => 'wholeSaleStock', 'sttr_sell_status' => 'No',
    'sttr_bc_print_status' => 'No', 'sttr_item_ent_type' => $sttr_item_ent_type, 'msItmType' => 'PRODUCT',
    'sttr_hallmark_uid' => $sttr_hallmark_uid, 'sttr_sttr_id' => $sttr_sttr_id,
    'gmWtInGm' => 10, 'gmWtInKg' => 100, 'gmWtInMg' => 10000,
    'srGmWtInGm' => 1000, 'srGmWtInKg' => 1, 'srGmWtInMg' => 1000000,
    'othGmWtInGm' => 1, 'othGmWtInKg' => 1000, 'othGmWtInMg' => 1000,
    'cryWtInGm' => 0.2, 'cryWtInKg' => 0.0002,
    'cryWtInMg' => 200, 'cryWtInCt' => 1,
    'validateHUID' => 'NO',
    'sttr_barcode_prefix' => $sttr_barcode_prefix,
    'sttr_barcode' => $sttr_barcode,
    'sttr_brand_name' => $sttr_brand_name,
    'sttr_stock_type' => $sttr_stock_type, 'sttr_type' => $sttr_type,
    'sttr_transaction_type' => $sttr_transaction_type, 'sttr_indicator' => $sttr_indicator,
    'sttr_metal_type' => $sttr_metal_type, 'addItemMetalChanged' => $sttr_metal_type,
    'sttr_product_type' => $sttr_metal_type, 'sttr_metal_rate_id' => $sttr_metal_rate_id,
    'sttr_metal_rate' => $sttr_metal_rate, 'metalRateCalculation' => $sttr_metal_rate,
    'addItemMetalRateChanged' => $sttr_metal_rate, 'sttr_product_purchase_rate' => $sttr_metal_rate,
    'sttr_purchase_rate' => $sttr_purchase_rate, 'sttr_purchase_rate_type' => $sttr_purchase_rate_type,
    'sttr_sell_rate' => $sttr_sell_rate, 'sttr_sell_rate_type' => $sttr_sell_rate_type,
    'sttr_item_pre_id' => $sttr_item_pre_id, 'sttr_item_id' => $sttr_item_id,
    'sttr_item_category' => $sttr_item_category, 'sttr_item_name' => $sttr_item_name,
    'addItemCategoryChanged' => $sttr_item_category, 'addItemNameChanged' => $sttr_item_name,
    'sttr_quantity' => $sttr_quantity,
    'sttr_gs_weight' => $sttr_gs_weight, 'sttr_gs_weight_type' => $sttr_gs_weight_type,
    'sttr_pkt_weight' => $sttr_pkt_weight, 'sttr_pkt_weight_type' => $sttr_pkt_weight_type,
    'sttr_nt_weight' => $sttr_nt_weight, 'sttr_nt_weight_type' => $sttr_nt_weight_type,
    'netWeight' => $sttr_nt_weight,
    'sttr_purity' => $sttr_purity, 'sttr_purity_ct' => $sttr_purity_ct,
    'sttr_wastage' => $sttr_wastage, 'sttr_final_purity' => $sttr_final_purity,
    'sttr_cust_wastage' => $sttr_cust_wastage, 'sttr_cust_wastage_wt' => $sttr_cust_wastage_wt,
    'sttr_value_added' => $sttr_value_added,
    'sttr_fine_weight' => $sttr_fine_weight, 'sttr_final_fine_weight' => $sttr_final_fine_weight,
    'sttr_final_valuation_by' => $sttr_final_valuation_by, 'sttr_final_val_by' => $sttr_final_val_by,
    'sttr_other_charges_by' => $sttr_other_charges_by, 'sttr_mkg_charges_by' => $sttr_mkg_charges_by,
    'sttr_final_fine_wt_by' => $sttr_final_fine_wt_by,
    'sttr_cust_wastg_by' => $sttr_cust_wastg_by,
    'sttr_total_lab_charges' => $sttr_total_lab_charges,
    'sttr_lab_charges' => $sttr_lab_charges, 'sttr_lab_charges_type' => $sttr_lab_charges_type,
    'sttr_total_lab_amt' => $sttr_total_lab_amt,
    'sttr_making_charges' => $sttr_making_charges,
    'sttr_making_charges_type' => $sttr_making_charges_type,
    'sttr_other_charges' => $sttr_other_charges, 'sttr_other_charges_type' => $sttr_other_charges_type,
    'sttr_total_other_charges' => $sttr_total_other_charges,
    'sttr_metal_amt' => $sttr_metal_amt, 'sttr_valuation' => $sttr_valuation,
    'sttr_stone_wt' => $sttr_stone_wt,
    'sttr_stone_wt_type' => $sttr_stone_wt_type, 'sttr_stone_valuation' => $sttr_stone_valuation,
    'sttr_mkg_cgst_per' => $sttr_mkg_cgst_per, 'sttr_mkg_cgst_chrg' => $sttr_mkg_cgst_chrg,
    'sttr_mkg_sgst_per' => $sttr_mkg_sgst_per, 'sttr_mkg_sgst_chrg' => $sttr_mkg_sgst_chrg,
    'sttr_mkg_igst_per' => $sttr_mkg_igst_per, 'sttr_mkg_igst_chrg' => $sttr_mkg_igst_chrg,
    'sttr_tot_price_cgst_per' => $sttr_tot_price_cgst_per, 'sttr_tot_price_cgst_chrg' => $sttr_tot_price_cgst_chrg,
    'sttr_tot_price_sgst_per' => $sttr_tot_price_sgst_per, 'sttr_tot_price_sgst_chrg' => $sttr_tot_price_sgst_chrg,
    'sttr_tot_price_igst_per' => $sttr_tot_price_igst_per, 'sttr_tot_price_igst_chrg' => $sttr_tot_price_igst_chrg,
    'sttr_tax' => $sttr_tax, 'sttr_tot_tax' => $sttr_tot_tax,
    'sttr_final_taxable_amt' => $sttr_final_taxable_amt,
    'sttr_final_valuation' => $sttr_final_valuation);
//
//
$_REQUEST = array_merge($_REQUEST, $info);
//
//
// ADDED CODE TO ADD STOCK IN STOCK TABLE AFTER RETURN STOCK TO RETURNED LIST @Author:PRIYANKA-23JUNE2022
stock('insert', $_REQUEST, $sttrId);
//
//
//
// ADDED CODE TO UPDATE STATUS AFTER RETURN STOCK TO RETURNED LIST @Author:PRIYANKA-23JUNE2022
$query = "UPDATE stock_transaction SET sttr_firm_id = '$sttr_stock_transfer_previous_firm_id', "
       . "sttr_stock_transfer_return_firm_id = '$mainPrevEntryFirmId', "
       . "sttr_stock_transfer_approval_status = 'StockTransferReturnedStock' "
       . "WHERE sttr_owner_id = '$sessionOwnerId' "
       . "AND (sttr_id = '$sttrId' OR sttr_sttr_id = '$sttrId') ";
//
//echo '$query == ' . $query . '<br /><br />';
//
if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
//START JOURNAL ENTRY FOR STOCK TRANSFER
$firmId = $sttr_firm_id;
//   START MAIN STOCK JOURNAL
if (0 < $sttr_valuation) {

    $metalType = $sttr_metal_type;
    if ($metalType == 'Gold' || $metalType == 'GOLD') {
        parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
        $accId = $acc_id;
    }
    if ($metalType == 'Silver' || $metalType == 'SILVER') {
        parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
        $accId = $acc_id;
    }
    $payFinalPayableAmt = $sttr_valuation;
    $jrnlOwnId = $sessionOwnerId;
    $jrnlJId = '';
    $jrnlUserId = '';
    $jrnlUserType = '';
    $jrnlTransId = '';
    $jrnlTransType = 'STOCK';
    $jrnlFirmId = $firmId;
    $jrnlTTDr = $payFinalPayableAmt;
    $jrnlTTCr = $payFinalPayableAmt;
    $jrnlDrAccId = $accId;
    $jrnlDrDesc = "$acc_user_acc(Stock Tranfer-Return)";
    $jrnlDesc = 'Stock Transfer-Return';
    $jrnlOthInfo = '';
    $jrnlDOB = date('d M Y');
    $apiType = 'insert';
    include 'ommpjrnl.php';
    //
    $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$sessionOwnerId' order by jrnl_id desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
    //
    if ($payFinalPayableAmt > 0) {
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = '';
        $jrtrUserType = '';
        $jrtrTransId = '';
        $jrtrTransType = 'STOCK';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $payFinalPayableAmt;
        $jrtrDrAccId = $accId;
        $jrtrDrDesc = "$acc_user_acc(Stock Tranfer-Return)";
        $jrtrCrAmt = '';
        $jrtrCrAccId = '';
        $jrtrCrDesc = '';
        $jrtrDesc = 'Stock Transfer-Return';
        $jrtrOthInfo = '';
        $jrtrDOB = date('d M Y');
        //    
        $apiType = 'insert';
        include 'ommpjrtr.php';
    }
}
//   END MAIN STOCK JOURNAL
    //        UPDATE STOCK TRANSACTION JOURNAL ID COLUMN 
    $qUpdateJournalEntry = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' where sttr_owner_id = '$_SESSION[sessionOwnerId]' and (sttr_id = '$sttrId' OR sttr_sttr_id = '$sttrId')";
    //
    if (!mysqli_query($conn, $qUpdateJournalEntry)) {
        die('Error: ' . mysqli_error($conn));
    }
//  START STOCK STONE JOURNAL
if (0 < $sttr_stone_valuation) {
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
    $accId = $acc_id;
    //
    //
    if ($sttr_stone_valuation > 0) {
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = '';
        $jrtrUserType = '';
        $jrtrTransId = '';
        $jrtrTransType = 'STOCK';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $sttr_stone_valuation;
        $jrtrDrAccId = $accId;
        $jrtrDrDesc = "$acc_user_acc(Stock Tranfer-Return)";
        $jrtrCrAmt = '';
        $jrtrCrAccId = '';
        $jrtrCrDesc = '';
        $jrtrDesc = 'Stock Transfer-Return';
        $jrtrOthInfo = '';
        $jrtrDOB = date('d M Y');
        //    
        $apiType = 'insert';
        include 'ommpjrtr.php';
    }
}
//  END STOCK STONE JOURNAL
//END JOURNAL ENTRY FOR STOCK TRANSFER
//
//
//
$sttrId = $sttr_id;
$itemDOBDay = $sttr_add_date;
$itemPreId = $sttr_item_pre_id;
$itemPostId = $sttr_item_id;
$metalType = $sttr_metal_type;
$itemName = $sttr_item_name;
$itemCategory = $sttr_item_category;
$itemFirmId = $sttr_firm_id;
$firmId = $sttr_firm_id;
$itemQuantity = $sttr_quantity;
$itemGrossWt = $sttr_gs_weight;
$itemGrossWtTyp = $sttr_gs_weight_type;
$itemNetWt = $sttr_nt_weight;
$itemNetWtTyp = $sttr_nt_weight_type;
$itemFinalVal = $sttr_final_valuation;
//
//
$sslg_trans_sub = 'STOCK TRANSFER - STOCK RETURNED';
$sysLogTransType = 'Stock';
$sslg_firm_id = $itemFirmId;
$custId = $sttr_user_id;
$sslg_trans_comment = $metalType . ' Item Id: ' . $itemPreId . $itemPostId . ', Date: ' . $itemDOBDay . ', Valuation: ' . formatInIndianStyle($itemFinalVal);
include 'omslgapi.php';
//
//
//print_r($_REQUEST);
//
//
$showDiv = 'StockReturnedSuccessfully';
//
//
// *****************************************************************************************************
// END TO ADD CODE FOR STOCK TRANSFER - RETURN STOCK @Author:PRIYANKA-23JUNE2022
// *****************************************************************************************************
//
//
?>