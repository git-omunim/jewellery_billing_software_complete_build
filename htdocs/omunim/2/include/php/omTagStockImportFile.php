<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for TAG entries @PRIYANKA-13DEC2021
 * **********************************************************************************************************************************
 *
 * Created on 13 DEC, 2021 04.04.00 PM
 * 
 * @FileName: omTagStockImportFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.106
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-13DEC2021
 *  REASON:
 *
 */
?>
<?php
//
if (!isset($_SESSION)) {
    session_start();
}
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
//
//
//print_r($_REQUEST);
//print_r($_FILES['CVSFile']);
//die;
//
//
//echo 'Current PHP version: ' . phpversion();
//
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //
    // if not selected assign session firm  @PRIYANKA-13DEC2021
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//echo '$selFirmId == ' . $selFirmId . '</br>';
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr order by firm_since desc";
}
//
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //
    // Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
//
//echo '$selFirmId : ' . $selFirmId . '<br />';
//die;
//
//
//
// Start Code to Import Data From CSV File to Mysql Database for TAG entries @PRIYANKA-13DEC2021
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name @PRIYANKA-13DEC2021
$importFile = $_FILES['CVSFile']['tmp_name'];
// 
$readImportFile = fopen($importFile, "r");
//
//
// FOR STOCK TABLE ID
$sttr_st_id = $_REQUEST['tag_st_id'];
//
//
$rowsCounter = 0;

while (($prodDetails = fgetcsv($readImportFile, 10000, ",")) !== false) {
    //    
    if ($rowsCounter > 0) {
        //
        //
        //echo 'selFirmId == ' . $selFirmId;
        //echo("<br/>");
        //die;
        //
        $stock_gross_weight = 0;
        $st_gs_weight = 0;
        $sttr_gs_weight = 0;
        //
        parse_str(getTableValues("SELECT st_purity, st_final_purity, st_gs_weight ,st_firm_id "
                        . "FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
                        . "AND st_id = '$sttr_st_id'"));
        //
        //echo '$sttr_st_id ==' . $sttr_st_id;
        //
        $stock_gross_weight = $st_gs_weight;
        //
        //
        // FIRM ID @PRIYANKA-13DEC2021
        $sttr_firm_id = $selFirmId;
        //
        //
        //echo 'sttr_firm_id == ' . $sttr_firm_id;
        //echo("<br/>");
        //
        //
        $sttr_stock_type = 'retail';
        //
        //
        // FOR FIRM MANDATORY @PRIYANKA-13DEC2021
        if ($sttr_firm_id != '' && $sttr_firm_id != NULL) {
            // 
            // 
            //print_r($prodDetails);
            //
            //
            $firmName = $prodDetails[0];
            //
            //echo '$firmName == ' . $firmName . '<br />';
            //die;
            //
            if ($firmName != '' && $firmName != NULL) {
                //
                parse_str(getTableValues("SELECT firm_id, firm_type FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' "
                                . "AND firm_name = '$firmName'"));
                //
                $sttr_firm_id = $firm_id;
                //
            }
            //
            //
            //echo '$sttr_firm_id == ' . $sttr_firm_id . '<br />';
            //
            // 
            $date = $prodDetails[1];
            //
            //
            //echo '$date 1== ' . $date . '<br />';
            //
            // FOR DATE
            $date = date("d M Y", strtotime("$date"));
            //
            //
            //echo '$date 2== ' . $date . '<br />';
            //
            //
            if ($date != '' && $date != NULL) {
                $addDate = strtoupper($date);
            } else {
                $addDate = date("d") . " " . date("M") . " " . date("Y");
            }
            //
            $sttr_add_date = strtoupper($addDate);
            //
            //echo '$sttr_add_date == ' . $sttr_add_date . '<br />';
            //
            $arrAddDate = explode(' ', $sttr_add_date);
            //
            $day = $arrAddDate[0];
            $month = strtoupper($arrAddDate[1]);
            $year = $arrAddDate[2];
            //
            //
            //echo '$day == ' . $day . '<br />';
            //echo '$month == ' . $month . '<br />';
            //echo '$year == ' . $year . '<br />';
            //
            //
            $sttr_metal_type = $prodDetails[2];
            $sttr_metal_rate = $prodDetails[3];
            //
            $sttr_item_pre_id = $prodDetails[4];
            $sttr_item_id = $prodDetails[5];
            $sttr_hallmark_uid = $prodDetails[6];
            $sttr_brand_name = $prodDetails[7];
            $sttr_barcode = $prodDetails[8];
            //
            $sttr_item_category = $prodDetails[9];
            $sttr_item_name = $prodDetails[10];
            $sttr_hsn_no = $prodDetails[11];
            $stockType = $prodDetails[12];
            //
            $sttr_quantity = $prodDetails[13];
            $sttr_gs_weight = $prodDetails[14];
            $sttr_gs_weight_type = $prodDetails[15];
            $sttr_pkt_weight = $prodDetails[16];
            $sttr_pkt_weight_type = $prodDetails[17];
            $sttr_nt_weight = $prodDetails[18];
            $sttr_nt_weight_type = $prodDetails[19];
            //
            $sttr_purity = $prodDetails[20];
            $sttr_wastage = $prodDetails[21];
            $sttr_final_purity = $prodDetails[22];
            $sttr_cust_wastage = $prodDetails[23];
            $sttr_cust_wastage_wt = $prodDetails[24];
            $sttr_fine_weight = $prodDetails[25];
            $sttr_final_fine_weight = $prodDetails[26];
            //
            $sttr_lab_charges = $prodDetails[27];
            $sttr_lab_charges_type = $prodDetails[28];
            $sttr_total_lab_charges = $prodDetails[29];
            //
            $sttr_mkg_cgst_per = $prodDetails[30];
            $sttr_mkg_cgst_chrg = $prodDetails[31];
            $sttr_mkg_sgst_per = $prodDetails[32];
            $sttr_mkg_sgst_chrg = $prodDetails[33];
            $sttr_mkg_igst_per = $prodDetails[34];
            $sttr_mkg_igst_chrg = $prodDetails[35];
            //
            $sttr_making_charges = $prodDetails[36];
            $sttr_making_charges_type = $prodDetails[37];
            //

            $sttr_hm_charges = $prodDetails[38];// FOR HOLLMARKING CHARGES 10-4-2025 @GANESH
            $sttr_hm_charges_type = $prodDetails[39];


            $sttr_other_charges = $prodDetails[40];
            $sttr_other_charges_type = $prodDetails[41];
            $sttr_total_other_charges = $prodDetails[42];
            //
            //
            //echo '$sttr_other_charges @== ' . $sttr_other_charges;
            //echo("<br/>");
            //echo '$sttr_other_charges_type @== ' . $sttr_other_charges_type;
            //echo("<br/>");
            //echo '$sttr_total_other_charges @== ' . $sttr_total_other_charges;
            //echo("<br/>");
            //
            //
            $sttr_tot_price_cgst_per = $prodDetails[43];
            $sttr_tot_price_cgst_chrg = $prodDetails[44];
            $sttr_tot_price_sgst_per = $prodDetails[45];
            $sttr_tot_price_sgst_chrg = $prodDetails[46];
            $sttr_tot_price_igst_per = $prodDetails[47];
            $sttr_tot_price_igst_chrg = $prodDetails[48];
            //
            $sttr_tax = $prodDetails[49];
            $sttr_tot_tax = $prodDetails[50];
            //
            $sttr_valuation = $prodDetails[51];
            //
            $sttr_stone_wt = $prodDetails[52];
            $sttr_stone_wt_type = $prodDetails[53];
            $sttr_stone_valuation = $prodDetails[54];
            //
            $sttr_final_valuation = $prodDetails[55];
            $sttr_cust_price = $prodDetails[56];
            $sttr_fixed_price_status = $prodDetails[57];
            //
            //
            //             
            //
            if ($stockType != '' && $stockType != NULL) {
                $sttr_stock_type = $stockType;
            }
            //
            //
            //echo '$sttr_stock_type == ' . $sttr_stock_type;
            //echo("<br/>");
            //
            //
            // STOCK TYPE @AUTHOR:PRIYANKA-08APR2022
            //if ($sttr_stock_type == '' || $sttr_stock_type == NULL) {
            //    $sttr_stock_type = 'wholesale';
            //}
            //
            //
            // STOCK TYPE @PRIYANKA-13DEC2021
            if ($sttr_stock_type == '' || $sttr_stock_type == NULL || $sttr_stock_type == 'RETAIL' ||
                    $sttr_stock_type == 'R' || $sttr_stock_type == 'r') {
                $sttr_stock_type = 'retail';
            }
            //
            //
            //echo '$sttr_stock_type == ' . $sttr_stock_type;
            //echo("<br/>");
            //
            //
            $sttr_item_pre_id = strtoupper($sttr_item_pre_id);
            //
            //
            // FOR PRE ID NULL CASE
            if ($sttr_item_pre_id == '' || $sttr_item_pre_id == NULL) {
                $sttr_item_pre_id = strtoupper($sttr_item_category);
            }
            //
            //
            if ($sttr_stock_type == 'wholesale') {
                $sttr_item_id = NULL;
            }
            //
            //
            $sttr_item_code = ($sttr_item_pre_id . $sttr_item_id);
            //
            //
            $sttr_item_code = str_replace(" ", "", $sttr_item_code);
            //
            //
            $rows = array();
            //
            $selQuery = "SELECT sttr_item_code FROM stock_transaction "
                    . "WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_firm_id = '$sttr_firm_id' "
                    . "AND sttr_transaction_type IN ('EXISTING', 'TAG', 'PURCHASE') ";
            //
            $selResQuery = mysqli_query($conn, $selQuery);
            while ($row = mysqli_fetch_array($selResQuery)) {
                $rows[] = $row;
            }
            $itemCodeArray = array_reduce($rows, 'array_merge', array());
            //
            //
//                echo '$itemCodeArray'.$itemCodeArray;
            //echo '$sttr_item_pre_id == ' . $sttr_item_pre_id;
            //echo("<br/>");
            //echo '$sttr_item_id == ' . $sttr_item_id;
            //echo("<br/>");
            //echo '$sttr_item_code == ' . $sttr_item_code;
            //echo("<br/>");
            //
            //
            // ITEM NAME @PRIYANKA-13DEC2021 
            $sttr_item_name = strtoupper($sttr_item_name);
            //
            //echo '$sttr_item_name == ' . $sttr_item_name;
            //echo("<br/>");    
            //
            //
            // ITEM CATEGORY @PRIYANKA-13DEC2021
            $sttr_item_category = strtoupper($sttr_item_category);
            //
            //echo '$sttr_item_category == ' . $sttr_item_category;
            //echo("<br/>");
            //
            //
            // METAL TYPE @PRIYANKA-13DEC2021
            if ($sttr_metal_type == 'gold' || $sttr_metal_type == 'GOLD' || $sttr_metal_type == 'GD') {
                $sttr_metal_type = 'Gold';
            }
            //
            if ($sttr_metal_type == 'silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'SL') {
                $sttr_metal_type = 'Silver';
            }
            //
            //
            // PRODUCT TYPE @PRIYANKA-13DEC2021
            $sttr_product_type = $sttr_metal_type;
            //
            //
            //echo '$sttr_metal_type 1== ' . $sttr_metal_type;
            //echo("<br/>");
            //echo '$sttr_product_type 1== ' . $sttr_product_type;
            //echo("<br/>");
            //
            //
            if ($sttr_metal_type == '' || $sttr_metal_type == NULL) {
                $sttr_metal_type = 'Gold';
                $sttr_product_type = 'Gold';
            }
            //
            //
            //echo '$sttr_metal_type 2== ' . $sttr_metal_type;
            //echo("<br/>");
            //echo("<br/>");
            //echo '$sttr_product_type 2== ' . $sttr_product_type;
            //echo("<br/>");
            //
            //
            //
            // HUID @PRIYANKA-13DEC2021
            if ($sttr_hallmark_uid == '' || $sttr_hallmark_uid == NULL) {
                $sttr_hallmark_uid = NULL;
            }
            //
            //
            //echo '$sttr_hallmark_uid == ' . $sttr_hallmark_uid;
            //echo("<br/>");
            //                              
            //
            // METAL RATE @PRIYANKA-13DEC2021
            //if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
            //    parse_str(getTableValues("SELECT met_rate_value, met_rate_metal_id FROM metal_rates where met_rate_own_id = '$_SESSION[sessionOwnerId]' "
            //                           . "and met_rate_metal_name = 'Silver' order by met_rate_ent_dat desc LIMIT 0, 1"));
            //} else {
            //    parse_str(getTableValues("SELECT met_rate_value, met_rate_metal_id FROM metal_rates where met_rate_own_id = '$_SESSION[sessionOwnerId]' "
            //                           . "and met_rate_metal_name = 'Gold' order by met_rate_ent_dat desc LIMIT 0, 1"));
            //}
            //
            //
            // METAL RATE / ID @PRIYANKA-13DEC2021
            //$sttr_metal_rate = $met_rate_value;
            //$sttr_metal_rate_id = $met_rate_metal_id;
            //
            //
            // METAL RATE PER GM @PRIYANKA-13DEC2021
            //if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
            //    $sttr_metal_rate_per_gm = ($sttr_metal_rate / 1000);
            //} else {
            //    $sttr_metal_rate_per_gm = ($sttr_metal_rate / 10);
            //}
            //  
            //
            //
            // TRANSACTION TYPE @PRIYANKA-13DEC2021
            if ($sttr_transaction_type == '' || $sttr_transaction_type == NULL) {
                $sttr_transaction_type = 'TAG';
            }
            //
            //
            //echo '$sttr_transaction_type == ' . $sttr_transaction_type;
            //echo("<br/>");
            //
            //
            //INDICATOR @PRIYANKA-13DEC2021
            if ($sttr_indicator == '' || $sttr_indicator == NULL) {
                $sttr_indicator = 'stock';
            }
            //
            //
            //echo '$sttr_indicator == ' . $sttr_indicator;
            //echo("<br/>");
            //
            //
            //
            $sttr_item_ent_type = 'AddInStock';
            //
            //
            if ($rawPanelName == '' || $rawPanelName == NULL) {
                $rawPanelName = NULL;
            }
            //
            if ($rawMetalpanel == '' || $rawMetalpanel == NULL) {
                $rawMetalpanel = NULL;
            }
            //
            if ($sttr_cust_wastg_by == '' || $sttr_cust_wastg_by == NULL) {
                $sttr_cust_wastg_by = NULL;
            }
            //
            //
            //echo '$sttr_item_category == ' . $sttr_item_category;
            //echo("<br/>");
            //
            //
            // QUANTITY @PRIYANKA-13DEC2021
            if ($sttr_quantity == '' || $sttr_quantity == 0 || $sttr_quantity == NULL) {
                $sttr_quantity = 1;
            }
            //
            //
            //echo '$sttr_quantity == ' . $sttr_quantity;
            //echo("<br/>");
            //
            //
            // GS WT / NT WT / PKT WT @PRIYANKA-13DEC2021                             
            //if ($sttr_gs_weight != $sttr_nt_weight) {
            //    //
            //    $sttr_pkt_weight = decimalVal(($sttr_gs_weight - $sttr_nt_weight),3);
            //    //
            //}
            //
            //
            $sttr_gs_weight = decimalVal($sttr_gs_weight, 3);
            $sttr_nt_weight = decimalVal($sttr_nt_weight, 3);
            $sttr_pkt_weight = decimalVal($sttr_pkt_weight, 3);
            //
            //
            // GS WT TYPE @PRIYANKA-13DEC2021
            if ($sttr_gs_weight_type == '' || $sttr_gs_weight_type == NULL) {
                $sttr_gs_weight_type = 'GM';
            }
            //
            //
            //echo '$sttr_gs_weight_type == ' . $sttr_gs_weight_type;
            //echo("<br/>");
            //
            //
            // NT WT TYPE @PRIYANKA-13DEC2021
            if ($sttr_nt_weight_type == '' || $sttr_nt_weight_type == NULL) {
                $sttr_nt_weight_type = 'GM';
            }
            //
            //
            //echo '$sttr_nt_weight_type == ' . $sttr_nt_weight_type;
            //echo("<br/>");
            //
            //
            // PKT WT TYPE @PRIYANKA-13DEC2021
            if ($sttr_pkt_weight_type == '' || $sttr_pkt_weight_type == NULL) {
                $sttr_pkt_weight_type = 'GM';
            }
            //
            //
            //echo '$sttr_pkt_weight_type == ' . $sttr_pkt_weight_type;
            //echo("<br/>");                
            //
            //
            $sttr_metal_rate_id = strtoupper($sttr_metal_type);
            //
            //
            //echo '$sttr_metal_rate == ' . $sttr_metal_rate;
            //echo("<br/>");
            //echo '$sttr_metal_rate_id == ' . $sttr_metal_rate_id;
            //echo("<br/>");
            //
            //
            //echo '$sttr_purity == ' . $sttr_purity;
            //echo("<br/>");
            //           
            //                   
            // PURITY/TUNCH @PRIYANKA-13DEC2021
            if ($sttr_purity != '' && $sttr_purity != NULL) {
                //
                //
                if (strpos($sttr_purity, "K") !== false) {
                    //
                    //
                    // PURITY/TUNCH IN CT @PRIYANKA-08APR2022
                    $sttr_purity_ct = str_replace("K", "", $sttr_purity);
                    //
                    //
                    // PURITY/TUNCH IN % @PRIYANKA-08APR2022
                    $sttr_purity_in_pre = decimalVal((($sttr_purity_ct * 100) / 24), 2);
                    //
                    //
                    $sttr_purity = decimalVal($sttr_purity_in_pre, 2);
                    //
                } else {
                    //
                    //
                    // PURITY/TUNCH IN CT @ PRIYANKA-08APR2022
                    $sttr_purity_ct = decimalVal((($sttr_purity * 24) / 100), 2);
                    //
                    //
                    // PURITY/TUNCH IN % @ PRIYANKA-08APR2022
                    $sttr_purity = decimalVal($sttr_purity, 2);
                    //
                }
                //
                //
                //echo '$sttr_purity 1== ' . $sttr_purity;
                //echo("<br/>");
                //
                //
            } else {
                //
                //
                // PURITY/TUNCH IN CT @PRIYANKA-08APR2022
                $sttr_purity_ct = decimalVal((($sttr_purity * 24) / 100), 2);
                //
                // PURITY/TUNCH IN % @PRIYANKA-08APR2022
                $sttr_purity = decimalVal($sttr_purity, 2);
                //
                //
            }
            //
            //
//            echo '$st_purity == ' . $st_purity;
//            echo '$sttr_purity'.$sttr_purity;
            //
            //   
            // WASTAGE @PRIYANKA-13DEC2021
            if ($sttr_wastage == '' || $sttr_wastage == NULL) {
                $sttr_wastage = 0;
            }
            //
            //
            //echo '$sttr_final_purity == ' . $sttr_final_purity;
            //echo("<br/>");
            //echo '$sttr_fine_weight == ' . $sttr_fine_weight;
            //echo("<br/>");
            //echo '$sttr_final_fine_weight == ' . $sttr_final_fine_weight;
            //echo("<br/>");
            //
            //
            // CUST WASTG AND CUST WASTG WT @PRIYANKA-13DEC2021
            if ($sttr_cust_wastage == '' || $sttr_cust_wastage == NULL) {
                $sttr_cust_wastage = 0;
            }
            //
            if ($sttr_cust_wastage_wt == '' || $sttr_cust_wastage_wt == NULL) {
                $sttr_cust_wastage_wt = 0;
            }
            //
            //
            if ($sttr_final_purity > 0) {
                //
                // PURITY/TUNCH @PRIYANKA-13DEC2021
                $sttr_final_purity = decimalVal($sttr_final_purity, 2);
                //
            } else {
                //
                // PURITY/TUNCH @PRIYANKA-13DEC2021
                $sttr_final_purity = decimalVal(($sttr_purity + $sttr_wastage), 2);
                //
            }
            //
            //
            if ($sttr_fine_weight > 0) {
                //
                // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-13DEC2021
                $sttr_fine_weight = decimalVal($sttr_fine_weight, 3);
                $sttr_final_fine_weight = decimalVal($sttr_final_fine_weight, 3);
                //
            } else {
                //
                // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-13DEC2021
                $sttr_fine_weight = decimalVal((($sttr_purity * $sttr_nt_weight) / 100), 3);
                $sttr_final_fine_weight = decimalVal((($sttr_final_purity * $sttr_nt_weight) / 100), 3);
                //
            }
            //
            //
            // FINAL VAL BY AND FINAL FINE WT BY @PRIYANKA-13DEC2021
            //$sttr_final_valuation_by = 'byNetWt';
            //$sttr_final_val_by = 'byNetWt';
            //
            //
            //echo '$sttr_final_valuation_by == ' . $sttr_final_valuation_by;
            //echo("<br/>");
            //echo '$sttr_final_val_by == ' . $sttr_final_val_by;
            //echo("<br/>");
            //
            //    
            // FOR LAB CHARGES @PRIYANKA-08APR2022
            if ($sttr_lab_charges == '' || $sttr_lab_charges == NULL) {
                $sttr_total_lab_charges = '0.00';
                $sttr_lab_charges = '0.00';
                $sttr_lab_charges_type = 'GM';
                $sttr_total_lab_amt = '0.00';
            }
            //
            //
            // FOR LAB CHARGES TYPE @PRIYANKA-08APR2022
            if ($sttr_lab_charges_type == 'FX' || $sttr_lab_charges_type == 'fx' ||
                    $sttr_lab_charges_type == 'Fixed' || $sttr_lab_charges_type == 'fixed') {
                $sttr_lab_charges_type = 'Fixed';
            }
            //
            //
            $sttr_lab_charges = decimalVal($sttr_lab_charges, 2);
            $sttr_total_lab_charges = decimalVal($sttr_total_lab_charges, 2);
            $sttr_total_lab_amt = decimalVal($sttr_total_lab_charges, 2);
            //
            //
            //echo '$sttr_other_charges == ' . $sttr_other_charges;
            //echo("<br/>");
            //echo '$sttr_other_charges_type == ' . $sttr_other_charges_type;
            //echo("<br/>");
            //echo '$sttr_total_other_charges == ' . $sttr_total_other_charges;
            //echo("<br/>");
            //
            //
            // FOR OTHER CHARGES @PRIYANKA-08APR2022
            if ($sttr_other_charges == '' || $sttr_other_charges == NULL) {
                $sttr_total_other_charges = '0.00';
                $sttr_other_charges = '0.00';
                $sttr_other_charges_type = 'GM';
            }
            //
            //
            // FOR OTHER CHARGES TYPE @PRIYANKA-08APR2022
            if ($sttr_other_charges_type == 'per' || $sttr_other_charges_type == 'PER' ||
                    $sttr_other_charges_type == '%') {
                $sttr_other_charges_type = 'per';
            }
            //
            //
            // FOR OTHER CHARGES TYPE @PRIYANKA-08APR2022
            if ($sttr_other_charges_type == 'FX' || $sttr_other_charges_type == 'fx' ||
                    $sttr_other_charges_type == 'Fixed' || $sttr_other_charges_type == 'fixed') {
                $sttr_other_charges_type = 'Fixed';
            }
            //
            //
            $sttr_other_charges = decimalVal($sttr_other_charges, 2);
            $sttr_total_other_charges = decimalVal($sttr_total_other_charges, 2);
            //  
            //                                                                                                                                                
            //echo '$sttr_other_charges == ' . $sttr_other_charges;
            //echo("<br/>");
            //echo '$sttr_other_charges_type == ' . $sttr_other_charges_type;
            //echo("<br/>");
            //echo '$sttr_total_other_charges == ' . $sttr_total_other_charges;
            //echo("<br/>");
            //                                                                                                                                                                                                                                                                                                                                                                                                                                            
            //
            //
            // FOR MAKING CHARGES TYPE @PRIYANKA-08APR2022
            if ($sttr_making_charges_type == 'per' || $sttr_making_charges_type == 'PER' ||
                    $sttr_making_charges_type == '%') {
                $sttr_making_charges_type = 'per';
            }
            //
            //
            // FOR MAKING CHARGES TYPE @PRIYANKA-08APR2022
            if ($sttr_making_charges_type == 'FX' || $sttr_making_charges_type == 'fx' ||
                    $sttr_making_charges_type == 'Fixed' || $sttr_making_charges_type == 'fixed') {
                $sttr_making_charges_type = 'Fixed';
            }
            //
            //
            //
            //
            // FOR FINAL VAL BY VALUES => byFFineWt / byFineWt / byNetWt / byGrossWt @PRIYANKA-08APR2022
            if ($sttr_final_val_by == '' || $sttr_final_val_by == NULL) {
                $sttr_final_val_by = "byFFineWt";
            }
            //
            //
            // FOR FINAL VALUATION BY VALUES => byFFineWt / byFineWt / byNetWt / byGrossWt @PRIYANKA-08APR2022
            if ($sttr_final_valuation_by == '' || $sttr_final_valuation_by == NULL) {
                $sttr_final_valuation_by = "byFFineWt";
            }
            //
            //
            // FOR LAB CHARGES BY VALUES => lbByFFineWt / lbByFineWt / lbByNetWt / lbByGrossWt @PRIYANKA-08APR2022
            if ($sttr_other_charges_by == '' || $sttr_other_charges_by == NULL) {
                $sttr_other_charges_by = "lbByGrossWt";
            }
            //
            //
            // FOR MKG CHARGES BY VALUES => mkgByFFineWt / mkgByFineWt / mkgByNetWt / mkgByGrossWt @PRIYANKA-08APR2022
            if ($sttr_mkg_charges_by == '' || $sttr_mkg_charges_by == NULL) {
                $sttr_mkg_charges_by = "mkgByGrossWt";
            }
            //
            //
            // FOR FINAL FINE WEIGHT BY VALUES => byDefault / byFFineWt / byFineWt / byNetWt / byGrossWt @PRIYANKA-08APR2022
            if ($sttr_final_fine_wt_by == '' || $sttr_final_fine_wt_by == NULL) {
                $sttr_final_fine_wt_by = "byFFineWt";
            }
            //
            //
            //
            //
            // VALUATION @PRIYANKA-13DEC2021
            if ($sttr_valuation > 0) {
                //
                // VALUATION @PRIYANKA-13DEC2021
                $sttr_metal_amt = decimalVal($sttr_valuation, 2);
                $sttr_valuation = decimalVal($sttr_valuation, 2);
                //
                // FINAL TAXABLE AMOUNT @PRIYANKA-13DEC2021
                $sttr_final_taxable_amt = decimalVal($sttr_valuation, 2);
                //
                //
            } else {
                //
                //
                // FOR METAL RATE IN INTEGER FORMAT @PRIYANKA-14DEC2021
                $sttr_metal_rate_Int_Val = intval($sttr_metal_rate);
                $sttr_metal_rate_Int_Val_Length = strlen((string) $sttr_metal_rate_Int_Val);
                //
                //
                // FOR METAL RATE @PRIYANKA-14DEC2021
                if ($sttr_metal_rate_Int_Val_Length == 4) {
                    //
                    // FOR METAL RATE PER GM @PRIYANKA-14DEC2021
                    $sttr_metal_rate_cal = $sttr_metal_rate;
                    //
                } else if ($sttr_metal_rate_Int_Val_Length == 5) {
                    //
                    if ($sttr_metal_type == 'Gold') {
                        //
                        // FOR METAL RATE PER GM @PRIYANKA-14DEC2021
                        $sttr_metal_rate_cal = ($sttr_metal_rate / 10);
                        //
                    } else {
                        //
                        // FOR METAL RATE PER KG @PRIYANKA-14DEC2021
                        $sttr_metal_rate_cal = ($sttr_metal_rate);
                        //
                    }
                }
                //
                //
                //echo '$sttr_metal_rate == ' . $sttr_metal_rate . '<br />';
                //echo '$sttr_metal_rate_cal == ' . $sttr_metal_rate_cal . '<br /><br />';
                //
                //
                if ($sttr_gs_weight_type == 'KG' && $sttr_metal_type == 'Gold') {
                    $sttr_metal_amt = decimalVal(($sttr_final_fine_weight * 1000 * $sttr_metal_rate_cal), 2);
                    $sttr_valuation = decimalVal(($sttr_final_fine_weight * 1000 * $sttr_metal_rate_cal), 2);
                } else if ($sttr_gs_weight_type == 'GM' && $sttr_metal_type == 'Gold') {
                    $sttr_metal_amt = decimalVal(($sttr_final_fine_weight * $sttr_metal_rate_cal), 2);
                    $sttr_valuation = decimalVal(($sttr_final_fine_weight * $sttr_metal_rate_cal), 2);
                } else if ($sttr_gs_weight_type == 'MG' && $sttr_metal_type == 'Gold') {
                    $sttr_metal_amt = decimalVal((($sttr_final_fine_weight / 1000) * $sttr_metal_rate_cal), 2);
                    $sttr_valuation = decimalVal((($sttr_final_fine_weight / 1000) * $sttr_metal_rate_cal), 2);
                } else if ($sttr_gs_weight_type == 'KG' && $sttr_metal_type == 'Silver') {
                    $sttr_metal_amt = decimalVal(($sttr_final_fine_weight * $sttr_metal_rate_cal), 2);
                    $sttr_valuation = decimalVal(($sttr_final_fine_weight * $sttr_metal_rate_cal), 2);
                } else if ($sttr_gs_weight_type == 'GM' && $sttr_metal_type == 'Silver') {
                    $sttr_metal_amt = decimalVal((($sttr_final_fine_weight / 1000) * $sttr_metal_rate_cal), 2);
                    $sttr_valuation = decimalVal((($sttr_final_fine_weight / 1000) * $sttr_metal_rate_cal), 2);
                } else {
                    $sttr_metal_amt = decimalVal(($sttr_final_fine_weight * $sttr_metal_rate_cal), 2);
                    $sttr_valuation = decimalVal(($sttr_final_fine_weight * $sttr_metal_rate_cal), 2);
                }
                //
                //
                // FINAL TAXABLE AMOUNT @PRIYANKA-13DEC2021
                $sttr_final_taxable_amt = decimalVal($sttr_valuation, 2);
                //
                //
            }
            //
            //
            if (($sttr_tot_price_cgst_per == '' || $sttr_tot_price_cgst_per == NULL) &&
                    ($sttr_tot_price_igst_per == '' || $sttr_tot_price_igst_per == NULL) &&
                    ($sttr_tax == '' || $sttr_tax == NULL)) {
                //
                //
                $sttr_tot_price_cgst_per = '0.00';
                $sttr_tot_price_sgst_per = '0.00';
                $sttr_tot_price_igst_per = '0.00';
                //
                $sttr_tot_price_cgst_chrg = '0.00';
                $sttr_tot_price_sst_chrg = '0.00';
                $sttr_tot_price_igst_chrg = '0.00';
                //                    
                $sttr_tax = '0.00';
                $tax = '0.00';
                //
                // TOTAL TAX AMOUNT @PRIYANKA-13DEC2021                    
                $sttr_tot_tax = '0.00';
                //
                //
            } else {
                //
                //
                if ($sttr_tot_price_cgst_per > 0) {
                    $sttr_tot_price_cgst_chrg = decimalVal((($sttr_valuation * $sttr_tot_price_cgst_per) / 100), 2);
                }
                //
                if ($sttr_tot_price_sgst_per > 0) {
                    $sttr_tot_price_sgst_chrg = decimalVal((($sttr_valuation * $sttr_tot_price_sgst_per) / 100), 2);
                }
                //
                if ($sttr_tot_price_igst_per > 0) {
                    $sttr_tot_price_igst_chrg = decimalVal((($sttr_valuation * $sttr_tot_price_igst_per) / 100), 2);
                }
                //
                if ($sttr_tax > 0) {
                    $sttr_tot_chrg = decimalVal((($sttr_valuation * $sttr_tax) / 100), 2);
                }
                //
                $sttr_tot_tax = decimalVal(($sttr_tot_price_cgst_chrg + $sttr_tot_price_sgst_chrg +
                        $sttr_tot_price_igst_chrg + $sttr_tot_chrg), 2);
                //
                //
            }
            //
            //
            // TOTAL TAX AMOUNT @PRIYANKA-13DEC2021                    
            $sttr_tot_tax = decimalVal($sttr_tot_tax, 2);
            //
            //
            // FINAL VALUATION @PRIYANKA-13DEC2021
            if ($sttr_final_valuation > 0) {
                //
                // FINAL VALUATION @PRIYANKA-13DEC2021
                $sttr_final_valuation = decimalVal($sttr_final_valuation, 2);
                //
            } else {
                //
                // FINAL VALUATION @PRIYANKA-13DEC2021
                $sttr_final_valuation = decimalVal(($sttr_valuation + $sttr_total_lab_charges + $sttr_total_other_charges + $sttr_tot_tax), 2);
                //
            }
            // 
            //
            //                
            //parse_str(getTableValues("SELECT firm_type FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' "
            //                       . "and firm_id = '$sttr_firm_id'"));                                              
            //
            //
            //$itemMFGDate = trim($request['addItemMDOBDay']) . ' ' . trim($request['addItemMDOBMonth']) . ' ' . trim($request['addItemMDOBYear']);
            //
            //
            //'sttr_final_valuation_by' => 'byFineWt', 'sttr_final_val_by' => 'byFineWt',
            //'sttr_other_charges_by' => 'lbByFFineWt', 'sttr_mkg_charges_by' => 'mkgByFFineWt', 
            //'sttr_final_fine_wt_by' => 'byFFineWt',
            //
            //
            // ARRAY REQUEST @PRIYANKA-13DEC2021
            $info = array('sttr_firm_id' => $sttr_firm_id, 'firmId' => $sttr_firm_id,
                'firmPublicPrivate' => $firm_type,
                'addItemDOBDay' => $day, 'addItemDOBMonth' => $month, 'addItemDOBYear' => $year, 'gbMonthId' => 0,
                'addItemMDOBDay' => $day, 'addItemMDOBMonth' => $month, 'addItemMDOBYear' => $year,
                'sttr_fixed_price_status' => FALSE, 'panelSimilarDiv' => 'NoSimilarItem',
                'panelExistinItem' => false, 'panelAddStockItem' => false, 'panelPurchOnCashItem' => false,
                'rawPanelName' => $rawPanelName, 'rawMetalpanel' => $rawMetalpanel,
                'addPanel' => 'AddStock', 'stockPanelName' => 'AddStock', 'upPanel' => 'AddPanel',
                'payButClickId' => false, 'mainPanel' => 'StockPanel', 'suppPanelName' => 'AddStock',
                'subPanel' => 'AddStock', 'panelName' => 'AddStock', 'stockType' => 'retailStock', 'sttr_sell_status' => 'No',
                'sttr_bc_print_status' => 'No', 'sttr_item_ent_type' => $sttr_item_ent_type, 'msItmType' => 'PRODUCT',
                'sttr_hallmark_uid' => $sttr_hallmark_uid, 'sttr_sttr_id' => NULL,
                'gmWtInGm' => 10, 'gmWtInKg' => 100, 'gmWtInMg' => 10000,
                'srGmWtInGm' => 1000, 'srGmWtInKg' => 1, 'srGmWtInMg' => 1000000,
                'othGmWtInGm' => 1, 'othGmWtInKg' => 1000, 'othGmWtInMg' => 1000,
                'cryWtInGm' => 0.2, 'cryWtInKg' => 0.0002,
                'cryWtInMg' => 200, 'cryWtInCt' => 1,
                'validateHUID' => 'NO',
                'sttr_barcode' => $sttr_barcode,
                'sttr_brand_name' => $sttr_brand_name,
                'sttr_stock_type' => $sttr_stock_type, 'sttr_type' => $sttr_indicator,
                'sttr_transaction_type' => $sttr_transaction_type, 'sttr_indicator' => $sttr_indicator,
                'sttr_metal_type' => $sttr_metal_type, 'addItemMetalChanged' => $sttr_metal_type,
                'sttr_product_type' => $sttr_metal_type, 'sttr_metal_rate_id' => $sttr_metal_rate_id,
                'sttr_metal_rate' => $sttr_metal_rate, 'metalRateCalculation' => $sttr_metal_rate,
                'addItemMetalRateChanged' => $sttr_metal_rate, 'sttr_product_purchase_rate' => $sttr_metal_rate,
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
                'sttr_cust_price' => $sttr_cust_price, 'sttr_fixed_price_status' => $sttr_fixed_price_status,
                'sttr_mkg_cgst_per' => $sttr_mkg_cgst_per, 'sttr_mkg_cgst_chrg' => $sttr_mkg_cgst_chrg,
                'sttr_mkg_sgst_per' => $sttr_mkg_sgst_per, 'sttr_mkg_sgst_chrg' => $sttr_mkg_sgst_chrg,
                'sttr_mkg_igst_per' => $sttr_mkg_igst_per, 'sttr_mkg_igst_chrg' => $sttr_mkg_igst_chrg,
                'sttr_tot_price_cgst_per' => $sttr_tot_price_cgst_per, 'sttr_tot_price_cgst_chrg' => $sttr_tot_price_cgst_chrg,
                'sttr_tot_price_sgst_per' => $sttr_tot_price_sgst_per, 'sttr_tot_price_sgst_chrg' => $sttr_tot_price_sgst_chrg,
                'sttr_tot_price_igst_per' => $sttr_tot_price_igst_per, 'sttr_tot_price_igst_chrg' => $sttr_tot_price_igst_chrg,
                'sttr_tax' => $sttr_tax, 'sttr_tot_tax' => $sttr_tot_tax,
                'sttr_final_taxable_amt' => $sttr_final_taxable_amt,
                'sttr_final_valuation' => $sttr_final_valuation,
                'sttr_hallmark_charges' => $sttr_hm_charges,
                'sttr_hallmark_charges_type' => $sttr_hm_charges_type,
            );
            //
            //
                $st_purity = decimalVal($st_purity,2); 
                
                if ($st_purity == "91.6" || $st_purity == "91.60") {
                    $st_purity = "91.67";
                }
                elseif ($st_purity == "83.3" || $st_purity == "83.30") {
                    $st_purity = "83.34";
                }
                elseif ($st_purity == "66.6" || $st_purity == "66.60") {
                    $st_purity = "66.67";
                }
                elseif ($st_purity == "58.3"|| $st_purity == "58.30") {
                    $st_purity = "58.33";
                }
                $st_final_purity = decimalVal($st_final_purity, 2);
            //
            //
//                echo '$st_purity == ' . $st_purity . '<br />';               
//                echo '$sttr_purity == ' . $sttr_purity . '<br />';
//                echo '$sttr_gs_weight == ' . $sttr_gs_weight . '<br />';
//                echo '$stock_gross_weight == ' . $stock_gross_weight . '<br />';
            //
            //
            // STOCK TYPE IS MANDATORY @PRIYANKA-13DEC2021
            if (($st_purity == $sttr_purity) && ($sttr_gs_weight > 0) && ($sttr_gs_weight <= $stock_gross_weight)) {
                //
                //
                if ($st_firm_id == $sttr_firm_id) {
                    //
                    if (!in_array($sttr_item_code, $itemCodeArray)) {
                        // ADDED CODE TO AVOID DUPLICATE PRODUCT CODE ENTRIES @PRIYANKA-08APR2022
                        $query = "SELECT * FROM stock_transaction "
                                . "WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_firm_id = '$sttr_firm_id' "
                                . "AND sttr_item_code = '$sttr_item_code' "
                                . "AND sttr_transaction_type IN ('EXISTING', 'TAG', 'PURONCASH') "
                                . "AND sttr_indicator = 'stock' AND sttr_stock_type = 'retail'";
                        //
                        //echo '$query == ' . $query . '<br />';
                        //
                        $resDetails = mysqli_query($conn, $query);
                        $rowDetails = mysqli_fetch_array($resDetails);
                        $numOfRows = mysqli_num_rows($resDetails);
                        //
                        //
                        //echo '$numOfRows == ' . $numOfRows . '<br /><br />';
                        //
                        //
                        $_REQUEST = array_merge($_REQUEST, $info);
                        //
                        //
                        $type = array('sttr_transaction_type' => 'TAG', 'sttr_indicator' => 'stock',
                            'payPanelName' => 'AddByInv',
                            'sttr_st_id' => $sttr_st_id);
                        //
                        //
                        $_REQUEST = array_merge($_REQUEST, $type);
                        //
                        //
                        //print_r($_REQUEST);
                        //echo '<br /><br />';
                        //
                        //
                        if ($numOfRows == 0) {
                            //
                            //
                            // FOR ADD TAG STOCK @PRIYANKA-13DEC2021
                            $sttrId = stock_transaction('insert', $_REQUEST);
                            // 
                            //
                            $updateSttrIdQuery = "UPDATE stock_transaction SET sttr_sttrin_id = '$sttrId' "
                                    . "WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_id = '$sttrId'";
                            //
                            if (!mysqli_query($conn, $updateSttrIdQuery)) {
                                die('Error: ' . mysqli_error($conn));
                            }
                            //
                            //
                            $date = $sttr_add_date;
                            $payAddDate = $sttr_add_date;
                            $payFinalPayableAmt = $sttr_final_valuation;
                            $firmId = $sttr_firm_id;
                            $stockId = $sttrId;
                            $metalType = $sttr_metal_type;
                            $operation = 'insert';
                            $transType = 'EXISTING';
                            include 'omusrtranjrnlstockinvacc.php';
                            //
                            //
                            stock('delete', $_REQUEST, $sttrId);
                            //                              
                            //
                        }
//                        else {
//                            //
//                            //
//                            //echo '$sttr_item_pre_id 1== ' . $sttr_item_pre_id . '<br />';
//                            //echo '$sttr_item_id 1== ' . $sttr_item_id . '<br />';
//                            //echo '$sttr_item_code 1== ' . $sttr_item_code . '<br />';
//                            //
//                            //
//                            // FOR LATEST PRODUCT CODE @PRIYANKA-08APR2022
//                            $query = "SELECT MAX(CAST(sttr_item_id AS UNSIGNED)) as sttrItemId "
//                                   . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
//                                   . "AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG') "
//                                   . "AND sttr_indicator = 'stock' "
//                                   . "AND sttr_item_pre_id = '$sttr_item_pre_id' "
//                                   . "AND sttr_stock_type = 'retail' "
//                                   . "AND sttr_status NOT IN ('DELETED') order by sttr_id desc";
//                            //
//                            //echo '$query 2== ' . $query . '<br />';
//                            //
//                            $result = mysqli_query($conn, $query);
//                            //
//                            $rowDetails = mysqli_fetch_array($result, MYSQLI_ASSOC);
//                            //
//                            //
//                            $sttr_item_id = ($rowDetails[sttrItemId] + 1);
//                            //
//                            //
//                            //echo '$sttr_item_pre_id 2== ' . $sttr_item_pre_id . '<br />';
//                            //echo '$sttr_item_id 2== ' . $sttr_item_id . '<br />';
//                            //
//                            //
//                            $sttr_item_code = ($sttr_item_pre_id . $sttr_item_id);
//                            //
//                            $sttr_item_code = str_replace(" ","",$sttr_item_code);
//                            //
//                            //
//                            //echo '$sttr_item_code 2== ' . $sttr_item_code . '<br /><br />';
//                            //
//                            //
//                            $_REQUEST = array_merge($_REQUEST, $info);
//                            //
//                            //
//                            $type = array('sttr_item_pre_id' => $sttr_item_pre_id, 'sttr_item_id' => $sttr_item_id);
//                            //
//                            //
//                            $_REQUEST = array_merge($_REQUEST, $type);
//                            //
//                            //
//                            //
//                            //
//                            // FOR ADD TAG STOCK @PRIYANKA-08APR2022
//                            $sttrId = stock_transaction('insert', $_REQUEST);
//                            // 
//                            //
//                            $updateSttrIdQuery = "UPDATE stock_transaction SET sttr_sttrin_id = '$sttrId' "
//                                               . "WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_id = '$sttrId'";
//                            //
//                            if (!mysqli_query($conn, $updateSttrIdQuery)) {
//                                die('Error: ' . mysqli_error($conn));
//                            }   
//                            //
//                            //
//                            $date = $sttr_add_date;
//                            $payAddDate = $sttr_add_date;
//                            $payFinalPayableAmt = $sttr_final_valuation;
//                            $firmId = $sttr_firm_id;
//                            $stockId = $sttrId;
//                            $metalType = $sttr_metal_type;
//                            $operation = 'insert';
//                            $transType = 'EXISTING';
//                            include 'omusrtranjrnlstockinvacc.php';
//                            //
//                            //
//                            stock('delete', $_REQUEST, $sttrId);
//                            //                              
//                            //
//                        }
                        //
                    } else {
                        ?>
                        <div class="fs_13 ff_calibri bold" style="color:red;">Product Code Already Exists!</div>
                        <?php
                        exit();
                    }
                } else {
                    ?>
                    <div class="fs_13 ff_calibri bold" style="color:red;">Please Check the Firm !</div>
                    <?php exit();
                }
            } else {
                ?>
                <div class="fs_13 ff_calibri bold" style="color:red;">Your gross weight is less Than Purchase weight!</div>

                <?php exit();
            }
        } else {
            ?>
            <div class="fs_13 ff_calibri bold" style="color:red;">Issue has been detected with Firm. Please select Firm! </div>
            <?php
            die;
        }
    }
    //
    //
    //echo '$rowsCounter == ' . $rowsCounter . '<br />';
    //
    //
    $_REQUEST = array();
    $type = array();
    $sttr_metal_type = NULL;
    $sttr_metal_rate = NULL;
    $sttr_item_name = NULL;
    $sttr_item_category = NULL;
    $sttr_item_pre_id = NULL;
    $sttr_item_id = NULL;
    $sttr_item_code = NULL;
    $numOfRows = NULL;
    $itemPreID = NULL;
    $itemID = NULL;
    $sttr_stock_type = NULL;
    $sttr_transaction_type = NULL;
    $sttr_indicator = NULL;
    $Stamp = NULL;
    $rawPanelName = NULL;
    $rawMetalpanel = NULL;
    $sttr_cust_price = NULL;
    $sttr_quantity = '';
    $sttr_barcode = '';
    //
    $rowsCounter++;
    //  
    //
}
//
//
//echo '$rowsCounter == ' . $rowsCounter . '<br />';
//
//
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/include/php/ogfinepop.php?invPanel=AddByInv&utransInvId=' . $sttr_st_id . '&mainEntryId=' . $sttr_st_id . '&stockType=retailStock&divSubPanel=DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/include/php/ogfinepop.php?invPanel=AddByInv&utransInvId=' . $sttr_st_id . '&mainEntryId=' . $sttr_st_id . '&stockType=retailStock&divSubPanel=DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    exit;
}
?>