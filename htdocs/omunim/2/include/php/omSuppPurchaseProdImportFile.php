<?php

/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for Supplier Purchase Entries @PRIYANKA-30APR19
 * **********************************************************************************************************************************
 *
 * Created on 30 APR, 2019
 * 
 * @FileName: omSuppPurchaseProdImportFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.100
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 * Copyright 2019 SoftwareGen, Inc
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
//print_r($_FILES['CVSFile']);
//die;
//
//echo 'Current PHP version: ' . phpversion();
//
// Start Code to Import Data From CSV File to Mysql Database for Supplier Purchase Entries @PRIYANKA-30APR19
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name
$importFile = $_FILES['CVSFile']['tmp_name'];
// 
$readImportFile = fopen($importFile, "r");
//
//
$rowsCounter = 0;
//
while (($purProdDetails = fgetcsv($readImportFile, 10000, ",")) !== false) {
    //
    if ($rowsCounter > 1) {
        $firmName = $purProdDetails[0];
        parse_str(getTableValues("SELECT firm_id FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and firm_name = '$firmName'"));
        $sttr_firm_id = $firm_id;
        //
        //echo '$sttr_firm_id == ' . $sttr_firm_id . '<br />';
        //
    $userName = $purProdDetails[1];
        parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                        . "and user_fname = '$userName' AND user_type = 'SUPPLIER'"));
        $sttr_user_id = $user_id;
        //
        $staffName = $purProdDetails[2];
        parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                        . "and user_fname = '$staffName' AND user_type = 'STAFF'"));
        $sttr_staff_id = $user_id;
        //
        $date = $purProdDetails[3];
        //
        //echo '$date == ' . $date . '<br />';
        //
    if ($date != '' && $date != NULL) {
            $arr = explode(' ', $date);
            $addDate = $arr[0];
        } else {
            $addDate = date("d M Y");
        }
        //
        //echo '$sttr_add_date == ' . $sttr_add_date . '<br />';
        //
    $arrAddDate = explode('-', $addDate);
        //
        $day = $arrAddDate[0];
        $month = strtoupper($arrAddDate[1]);
        $year = $arrAddDate[2];
        //
        $sttr_metal_type = $purProdDetails[4];
        $sttr_metal_rate = $purProdDetails[5];
        $sttr_item_code = $purProdDetails[6];
        $sttr_barcode = $purProdDetails[7];
        $sttr_item_category = $purProdDetails[8];
        $sttr_item_name = $purProdDetails[9];
        $sttr_hsn_no = $purProdDetails[10];
        $sttr_other_info = $purProdDetails[11];
        $sttr_quantity = $purProdDetails[12];
        $sttr_gs_weight = $purProdDetails[13];
        $sttr_gs_weight_type = $purProdDetails[14];
        $sttr_pkt_weight = $purProdDetails[15];
        $sttr_pkt_weight_type = $purProdDetails[16];
        $sttr_nt_weight = $purProdDetails[17];
        $sttr_nt_weight_type = $purProdDetails[18];
        $sttr_purity = $purProdDetails[19];
        $sttr_wastage = $purProdDetails[20];
        $sttr_final_purity = $purProdDetails[21];
        $sttr_cust_wastage = $purProdDetails[22];
        $sttr_cust_wastage_wt = $purProdDetails[23];
        $sttr_fine_weight = $purProdDetails[24];
        $sttr_final_fine_weight = $purProdDetails[25];
        $sttr_lab_charges = $purProdDetails[26];
        $sttr_lab_charges_type = $purProdDetails[27];
        $sttr_total_lab_charges = $purProdDetails[28];
        $sttr_mkg_cgst_per = $purProdDetails[29];
        $sttr_mkg_cgst_chrg = $purProdDetails[30];
        $sttr_mkg_sgst_per = $purProdDetails[31];
        $sttr_mkg_sgst_chrg = $purProdDetails[32];
        $sttr_mkg_igst_per = $purProdDetails[33];
        $sttr_mkg_igst_chrg = $purProdDetails[34];
        $sttr_tot_price_cgst_per = $purProdDetails[35];
        $sttr_tot_price_cgst_chrg = $purProdDetails[36];
        $sttr_tot_price_sgst_per = $purProdDetails[37];
        $sttr_tot_price_sgst_chrg = $purProdDetails[38];
        $sttr_tot_price_igst_per = $purProdDetails[39];
        $sttr_tot_price_igst_chrg = $purProdDetails[40];
        $sttr_tax = $purProdDetails[41];
        $sttr_tot_tax = $purProdDetails[42];
        $sttr_valuation = $purProdDetails[43];
        $sttr_stone_wt = $purProdDetails[44];
        $sttr_stone_wt_type = $purProdDetails[45];
        $sttr_stone_valuation = $purProdDetails[46];
        $sttr_final_valuation = $purProdDetails[47];
        //
        $invoiceNumber = getInvoiceNum($sttr_user_id, 'AddInvoice', 'PURBYSUPP');
        $invArr = explode('*', $invoiceNumber);
        $sttr_pre_invoice_no = $invArr[0];
        $sttr_invoice_no = $invArr[1];
        //
        $accName = 'Purchase Accounts';
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                        . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
        $sttr_account_id = $acc_id;
        //
        //
    $info = array('sttr_firm_id' => $sttr_firm_id, 'firmId' => $sttr_firm_id, 'sttr_user_id' => $sttr_user_id,
            'sttr_staff_id' => $sttr_staff_id, 'addItemDOBDay' => $day,
            'addItemDOBMonth' => $month, 'addItemDOBYear' => $year,
            'sttr_account_id' => $sttr_account_id, 'sttr_sttr_id' => NULL,
            'sttr_item_pre_id' => $sttr_item_code, 'sttr_barcode' => $sttr_barcode,
            'sttr_stock_type' => 'wholesale',
            'sttr_transaction_type' => 'PURBYSUPP', 'sttr_indicator' => 'AddInvoice',
            'sttr_pre_invoice_no' => $sttr_pre_invoice_no, 'sttr_invoice_no' => $sttr_invoice_no,
            'sttr_metal_type' => $sttr_metal_type, 'sttr_metal_rate' => $sttr_metal_rate,
            'sttr_item_category' => $sttr_item_category, 'sttr_item_name' => $sttr_item_name,
            'sttr_hsn_no' => $sttr_hsn_no, 'sttr_other_info' => $sttr_other_info,
            'sttr_quantity' => $sttr_quantity, 'sttr_gs_weight' => $sttr_gs_weight,
            'sttr_gs_weight_type' => $sttr_gs_weight_type,
            'sttr_pkt_weight' => $sttr_pkt_weight, 'sttr_pkt_weight_type' => $sttr_pkt_weight_type,
            'sttr_nt_weight' => $sttr_nt_weight, 'sttr_nt_weight_type' => $sttr_nt_weight_type,
            'sttr_purity' => $sttr_purity, 'sttr_wastage' => $sttr_wastage, 'sttr_final_purity' => $sttr_final_purity,
            'sttr_cust_wastage' => $sttr_cust_wastage, 'sttr_cust_wastage_wt' => $sttr_cust_wastage_wt,
            'sttr_fine_weight' => $sttr_fine_weight, 'sttr_final_fine_weight' => $sttr_final_fine_weight,
            'sttr_lab_charges' => $sttr_lab_charges, 'sttr_lab_charges_type' => $sttr_lab_charges_type,
            'sttr_total_lab_charges' => $sttr_total_lab_charges,
            'sttr_mkg_cgst_per' => $sttr_mkg_cgst_per, 'sttr_mkg_cgst_chrg' => $sttr_mkg_cgst_chrg,
            'sttr_mkg_sgst_per' => $sttr_mkg_sgst_per, 'sttr_mkg_sgst_chrg' => $sttr_mkg_sgst_chrg,
            'sttr_mkg_igst_per' => $sttr_mkg_igst_per, 'sttr_mkg_igst_chrg' => $sttr_mkg_igst_chrg,
            'sttr_tot_price_cgst_per' => $sttr_tot_price_cgst_per, 'sttr_tot_price_cgst_chrg' => $sttr_tot_price_cgst_chrg,
            'sttr_tot_price_sgst_per' => $sttr_tot_price_sgst_per, 'sttr_tot_price_sgst_chrg' => $sttr_tot_price_sgst_chrg,
            'sttr_tot_price_igst_per' => $sttr_tot_price_igst_per, 'sttr_tot_price_igst_chrg' => $sttr_tot_price_igst_chrg,
            'sttr_tax' => $sttr_tax, 'sttr_tot_tax' => $sttr_tot_tax,
            'sttr_valuation' => $sttr_valuation, 'sttr_stone_wt' => $sttr_stone_wt,
            'sttr_stone_wt_type' => $sttr_stone_wt_type, 'sttr_stone_valuation' => $sttr_stone_valuation,
            'sttr_final_valuation' => $sttr_final_valuation);
        //
        $_REQUEST = array_merge($_REQUEST, $info);
        //
        $sttrId = stock_transaction('insert', $_REQUEST);
        //
        //
    $type = array('sttr_transaction_type' => 'PURCHASE', 'sttr_indicator' => 'PURCHASE', 'sttr_sttr_id' => $sttrId);
        $_REQUEST = array_merge($_REQUEST, $type);
        // 
        stock_transaction('insert', $_REQUEST);
        //
        $showMess = $rowsCounter . ' Rows Processed. Data Imported Successfully!!!';
        //
    }
    $rowsCounter++;
}
// End Code to Import Data From CSV File to Mysql Database for Supplier Purchase Entries @PRIYANKA-30APR19
//
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&suppPanelOption=InvoicePayment&custId=' . $sttr_user_id .
            '&panelName=InvoicePayment&divSubPanel=' . $divSubPanel . '&accDrId=' . $sttr_account_id);
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&suppPanelOption=InvoicePayment&custId=' . $sttr_user_id .
            '&panelName=InvoicePayment&divSubPanel=' . $divSubPanel . '&accDrId=' . $sttr_account_id);
}
?>




