<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for Sell Raw Metal Products @PRIYANKA-24SEP21
 * **********************************************************************************************************************************
 *
 * Created on 24 SEP, 2021 03.00.00 PM
 * 
 * @FileName: omSellRawMetalListImportFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.84
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-24SEP21
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
//print_r($_REQUEST);
//print_r($_FILES['CVSFile']);
//die;
//
//echo 'Current PHP version: ' . phpversion();
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
    //if not selected assign session firm  @PRIYANKA-24SEP21
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
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
//echo '$selFirmId : ' . $selFirmId . '<br />';
//die;
//
// Start Code to Import Data From CSV File to Mysql Database for Sell Raw Metal Products List @PRIYANKA-24SEP21
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name @PRIYANKA-24SEP21
$importFile = $_FILES['CVSFile']['tmp_name'];
// 
$readImportFile = fopen($importFile, "r");
//
//
$rowsCounter = 0;
//
//
while (($prodDetails = fgetcsv($readImportFile, 10000, ",")) !== false) {
        //
        //
        if ($rowsCounter == 0) {        
            //
            $columnCounter = count($prodDetails);
            //
            //
            //echo '$columnCounter == ' . $columnCounter . '<br />';
            //die;
            //
            //
            // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-24SEP21
            // Date	Type	Refno	Party Name	Item Name	Stamp	Tag.No.	
            // Pc	Gr.Wt.	Net.Wt.	HUID	Rate	Met.Value	
            // Dia.Wt.	Dia.Val.	Stn.Wt.	Stn.Val.	
            // Lamt	Total	Taxable Val.	GSTIN	Tax
            //
            //
            //$prodDetails[] = json_decode($json1,true);
            //$prodDetails[] = json_decode($json2,true);
            //$json_merge = json_encode($prodDetails);
            //
            //
            for ($i=0; $i<$columnCounter; $i++) {
                //
                //echo '$i == ' . $i. '<br />';
                //echo '$prodDetails == ' . $prodDetails[$i] . '<br />';
                //
                if ($prodDetails[$i] == 'Date') {
                    $json1 = '{"columnName":"Date", "position":' . $i . ',' . '"tableColumnName":"sttr_add_date"}';
                    $allData[] = json_decode($json1,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Type') {
                    $json2 = '{"columnName":"Type", "position":' . $i . ',' . '"tableColumnName":"Type"}';
                    $allData[] = json_decode($json2,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Refno') {
                    $json3 = '{"columnName":"Refno", "position":' . $i . ',' . '"tableColumnName":"sttr_pre_invoice_no"}';
                    $allData[] = json_decode($json3,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Party Name') {
                    $json4 = '{"columnName":"Party Name", "position":' . $i . ',' . '"tableColumnName":"sttr_user_id"}';
                    $allData[] = json_decode($json4,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Item Name') {
                    $json5 = '{"columnName":"Item Name", "position":' . $i . ',' . '"tableColumnName":"sttr_item_name"}';
                    $allData[] = json_decode($json5,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Stamp') {
                    $json6 = '{"columnName":"Stamp", "position":' . $i . ',' . '"tableColumnName":"sttr_purity"}';
                    $allData[] = json_decode($json6,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Tag.No.') {
                    $json7 = '{"columnName":"Tag.No.", "position":' . $i . ',' . '"tableColumnName":"sttr_barcode"}';
                    $allData[] = json_decode($json7,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Pc') {
                    $json8 = '{"columnName":"Pc", "position":' . $i . ',' . '"tableColumnName":"sttr_quantity"}';
                    $allData[] = json_decode($json8,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Gr.Wt.') {
                    $json9 = '{"columnName":"Gr.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_gs_weight"}';
                    $allData[] = json_decode($json9,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Net.Wt.') {
                    $json10 = '{"columnName":"Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_nt_weight"}';
                    $allData[] = json_decode($json10,true);
                }
                //
                //
                if ($prodDetails[$i] == 'HUID') {
                    $json11 = '{"columnName":"HUID", "position":' . $i . ',' . '"tableColumnName":"sttr_hallmark_uid"}';
                    $allData[] = json_decode($json11,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Rate') {
                    $json12 = '{"columnName":"Rate", "position":' . $i . ',' . '"tableColumnName":"sttr_metal_rate"}';
                    $allData[] = json_decode($json12,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Met.Value') {
                    $json13 = '{"columnName":"Met.Value", "position":' . $i . ',' . '"tableColumnName":"sttr_valuation"}';
                    $allData[] = json_decode($json13,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Dia.Wt.') {
                    $json14 = '{"columnName":"Dia.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_stone_wt"}';
                    $allData[] = json_decode($json14,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Dia.Val.') {
                    $json15 = '{"columnName":"Dia.Val.", "position":' . $i . ',' . '"tableColumnName":"sttr_stone_valuation"}';
                    $allData[] = json_decode($json15,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Stn.Wt.') {
                    $json16 = '{"columnName":"Stn.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_stone_wt"}';
                    $allData[] = json_decode($json16,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Stn.Val.') {
                    $json17 = '{"columnName":"Stn.Val.", "position":' . $i . ',' . '"tableColumnName":"sttr_stone_valuation"}';
                    $allData[] = json_decode($json17,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Lamt') {
                    $json18 = '{"columnName":"Lamt", "position":' . $i . ',' . '"tableColumnName":"sttr_total_lab_charges"}';
                    $allData[] = json_decode($json18,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Total') {
                    $json19 = '{"columnName":"Total", "position":' . $i . ',' . '"tableColumnName":"sttr_final_taxable_amt"}';
                    $allData[] = json_decode($json19,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Taxable Val.') {
                    $json20 = '{"columnName":"Taxable Val.", "position":' . $i . ',' . '"tableColumnName":"sttr_final_valuation"}';
                    $allData[] = json_decode($json20,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Tax') {
                    $json21 = '{"columnName":"Tax", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_tax"}';
                    $allData[] = json_decode($json21,true);
                }
            }
            //
            //
            //$json_merge = json_encode($allData);
            //
            //
            $json_merge = ($allData);
            //
            //
            //print_r($json_merge);
            //echo '<pre>';
            //echo("<br/>");
            //die;
            //
            //
            //foreach ($json_merge as $headings)  {
                    //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
                    //echo("<br/>");
            //}
            //
            //
        }
        //
        //
        //die;
        //
        //
        if ($rowsCounter > 0) {
            //
            //
            foreach ($json_merge as $headings)  {
                //
                //
                // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-24SEP21
                // Date	Type	Refno	Party Name	Item Name	Stamp	Tag.No.	
                // Pc	Gr.Wt.	Net.Wt.	HUID	Rate	Met.Value	
                // Dia.Wt.	Dia.Val.	Stn.Wt.	Stn.Val.	
                // Lamt	Total	Taxable Val.	GSTIN	Tax
                // 
                //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
                //echo("<br/>");
                //
                // DATE @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Date') {
                    $date = $prodDetails[$headings['position']];
                }
                //
                // TYPE (TO IDENTIFY PURCHASE ENTRIES) @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Type') {
                    $Type = $prodDetails[$headings['position']];
                }
                //
                // REF NO. @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Refno') {
                    $invoiceNo = $prodDetails[$headings['position']];
                }
                //
                // PARTY NAME (USER NAME) @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Party Name') {
                    $partyName = $prodDetails[$headings['position']];
                }
                //
                // ITEM NAME @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Item Name') {
                    $sttr_item_name = $prodDetails[$headings['position']];
                }
                //
                // STAMP (PURITY/TUNCH) @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Stamp') {
                    $stamp = $prodDetails[$headings['position']];
                }
                //
                // TAG NO @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Tag.No.') {
                    $TagNo = $prodDetails[$headings['position']];
                }
                //
                // PC (QUANTITY) @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Pc') {
                    $sttr_quantity = $prodDetails[$headings['position']];
                }
                //
                // GR.WT. (GROSS WEIGHT) @PRIYANKA-24SEP21             
                if ($headings['columnName'] == 'Gr.Wt.') {
                    $sttr_gs_weight = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // NET.WT. (NET WEIGHT) @PRIYANKA-24SEP21    
                if ($headings['columnName'] == 'Net.Wt.') {
                    $sttr_nt_weight = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // HUID @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'HUID') {
                    $sttr_hallmark_uid = $prodDetails[$headings['position']];
                }
                //
                // RATE @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Rate') {
                    $sttr_metal_rate = $prodDetails[$headings['position']];
                }
                //
                // MET VALUE (METAL VALUATION) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Met.Value') {
                    $sttr_valuation = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // DIA. WT (DIAMOND WEIGHT) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Dia.Wt.') {
                    $diamondWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // DIA. VAL (DIAMOND VALUATION) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Dia.Val.') {
                    $diamondVal = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // STN. WT (STONE WEIGHT) @PRIYANKA-24SEP21
                if ($headings['columnName'] == 'Stn.Wt.') {
                    $stoneWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // STN. VAL (STONE VALUATION) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Stn.Val.') {
                    $stoneVal = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // LAMT (TOTAL LAB CHARGES) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Lamt') {
                    $sttr_total_lab_charges = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TOTAL (METAL VALUATION + TOTAL LAB CHARGES = TOTAL AMOUNT) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Total') {
                    $sttr_final_taxable_amt = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TAXABLE VAL (TOTAL AMOUNT + TOTAL TAX AMOUNT = FINAL AMOUNT) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Taxable Val.') {
                    $sttr_final_valuation = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TAX (TOTAL TAX AMOUNT) @PRIYANKA-24SEP21 
                if ($headings['columnName'] == 'Tax') {
                    $sttr_tot_tax = decimalVal($prodDetails[$headings['position']],2);
                }
            }
            //
            //
            //echo 'selFirmId == ' . $selFirmId;
            //echo("<br/>");
            //die;
            //
            //
            // FIRM ID @PRIYANKA-24SEP21
            $sttr_firm_id = $selFirmId;
            //
            //
            //echo 'sttr_firm_id == ' . $sttr_firm_id;
            //echo("<br/>");
            //
            //
            // FOR FIRM MANDATORY @PRIYANKA-24SEP21
            if ($sttr_firm_id != '' && $sttr_firm_id != NULL) {
                // 
                // 
                //echo '$invoiceNo == ' . $invoiceNo;
                //echo("<br/>");
                //
                //
                // INVOICE NO. @PRIYANKA-24SEP21
                if ($invoiceNo != '' && $invoiceNo != NULL) {
                    $arrInv = explode('/', $invoiceNo);
                    $sttr_pre_invoice_no = $arrInv[0];
                    $sttr_invoice_no = $arrInv[1];
                }
                //
                //
                //echo '$sttr_pre_invoice_no == ' . $sttr_pre_invoice_no;
                //echo("<br/>");
                //echo '$sttr_invoice_no == ' . $sttr_invoice_no;
                //echo("<br/>");
                //die;
                // 
                //
                //
                // ONLY FOR PURCHASE ENTRIES @PRIYANKA-24SEP21
                if ($sttr_pre_invoice_no == 'SB') {                
                //
                //
                //echo '$sttr_item_name == ' . $sttr_item_name;
                //echo("<br/>");    
                //
                //
                // ITEM PRE ID, ITEM ID AND ITEM CODE @PRIYANKA-24SEP21
                $sttr_item_pre_id = NULL;
                $sttr_item_id = NULL;
                $sttr_item_code = NULL;                
                //
                //
                //echo '$sttr_item_pre_id == ' . $sttr_item_pre_id;
                //echo("<br/>");
                //echo '$sttr_item_code == ' . $sttr_item_code;
                //echo("<br/>");
                //
                //
                // HUID @PRIYANKA-24SEP21
                if ($sttr_hallmark_uid == '' || $sttr_hallmark_uid == NULL) {
                    $sttr_hallmark_uid = NULL;
                }
                //
                //
                // METAL/PRODUCT TYPE - GOLD @PRIYANKA-24SEP21
                if (strpos($sttr_item_name, 'GOLD') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                //
                if (strpos($sttr_item_name, 'GLD') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                //
                // METAL/PRODUCT TYPE - SILVER @PRIYANKA-24SEP21
                if (strpos($sttr_item_name, 'SILVER') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                //
                if (strpos($sttr_item_name, 'SIL') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                //
                if ($sttr_metal_type == '' || $sttr_metal_type == NULL) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                //
                //echo '$sttr_metal_type == ' . $sttr_metal_type;
                //echo("<br/>");
                //echo '$sttr_product_type == ' . $sttr_product_type;
                //echo("<br/>");
                //
                //
                // TRANSACTION TYPE @PRIYANKA-24SEP21
                if ($sttr_transaction_type == '' || $sttr_transaction_type == NULL) {
                    $sttr_transaction_type = 'RECEIVED';
                }
                //
                //
                //echo '$sttr_transaction_type == ' . $sttr_transaction_type;
                //echo("<br/>");
                //
                //
                //INDICATOR @PRIYANKA-24SEP21
                if ($sttr_indicator == '' || $sttr_indicator == NULL) {
                    $sttr_indicator = 'rawMetal';
                }
                //
                //
                //echo '$sttr_indicator == ' . $sttr_indicator;
                //echo("<br/>");
                //
                //
                // STOCK TYPE @PRIYANKA-24SEP21
                if ($sttr_stock_type == '' || $sttr_stock_type == NULL) {
                    $sttr_stock_type = 'retail';
                }
                //
                //
                //echo '$sttr_stock_type == ' . $sttr_stock_type;
                //echo("<br/>");
                //
                //
                // FOR USER DETAILS @PRIYANKA-24SEP21
                parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                       . "AND user_firm_id = '$sttr_firm_id' AND user_fname = '$partyName'"));
                //
                $sttr_user_id = $user_id;
                //
                //
                //echo '$sttr_user_id == ' . $sttr_user_id;
                //echo("<br/>");
                //
                //                
                if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
                    //
                    // FOR RAW SILVER ACCOUNT DETAILS @PRIYANKA-24SEP21
                    $accName = 'RAW Silver';
                    //
                    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                                           . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
                    //
                    $rawMetalAccId = $acc_id;
                    //
                    //
                } else {
                    //
                    // FOR RAW GOLD ACCOUNT DETAILS @PRIYANKA-24SEP21
                    $accName = 'RAW Gold';
                    //
                    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                                           . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
                    //
                    $rawMetalAccId = $acc_id;
                    //
                    //
                }
                //
                //
                // DATE @PRIYANKA-24SEP21
                if ($date != '' && $date != NULL) {
                    //
                    $sttr_add_date = date('d M Y', strtotime(str_replace('/', '-', $date)));
                    //
                } else {
                    $sttr_add_date = date("d M Y");
                    $addDate = date("d M Y");
                }
                //
                //
                $sttr_add_date = strtoupper($sttr_add_date);
                //
                $arrAddDate = explode(' ', $sttr_add_date);
                //
                $day = $arrAddDate[0];
                $month = strtoupper($arrAddDate[1]);
                $year = $arrAddDate[2];
                //
                //
                //echo '$sttr_add_date == ' . $sttr_add_date;
                //echo("<br/>");
                //die;
                //
                //
                if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
                    //
                    // ITEM CATEGORY @PRIYANKA-24SEP21
                    $sttr_item_category = 'OldSilver';
                    //
                    // ITEM NAME @PRIYANKA-24SEP21
                    $sttr_item_name = 'OLD SILVER';
                    //
                } else {
                    //
                    // ITEM CATEGORY @PRIYANKA-24SEP21
                    $sttr_item_category = 'OldGold';
                    //
                    // ITEM NAME @PRIYANKA-24SEP21
                    $sttr_item_name = 'OLD GOLD';
                    //
                }
                //
                //
                //echo '$sttr_item_category == ' . $sttr_item_category;
                //echo("<br/>");
                //
                //
                // QUANTITY @PRIYANKA-24SEP21
                //if ($sttr_quantity == '' || $sttr_quantity == NULL || $sttr_quantity == 0 || $sttr_quantity == '0') {
                //    $sttr_quantity = 1;
                //}
                //
                //
                //echo '$sttr_quantity == ' . $sttr_quantity;
                //echo("<br/>");
                //
                //
                // GS WT TYPE @PRIYANKA-24SEP21
                if ($sttr_gs_weight_type == '' || $sttr_gs_weight_type == NULL) {
                    $sttr_gs_weight_type = 'GM';
                }
                //
                //
                //echo '$sttr_gs_weight_type == ' . $sttr_gs_weight_type;
                //echo("<br/>");
                //
                //
                // NT WT TYPE @PRIYANKA-24SEP21
                if ($sttr_nt_weight_type == '' || $sttr_nt_weight_type == NULL) {
                    $sttr_nt_weight_type = 'GM';
                }
                //
                //
                //echo '$sttr_nt_weight_type == ' . $sttr_nt_weight_type;
                //echo("<br/>");
                //
                //
                // PKT WT TYPE @PRIYANKA-24SEP21
                if ($sttr_pkt_weight_type == '' || $sttr_pkt_weight_type == NULL) {
                    $sttr_pkt_weight_type = 'GM';
                }
                //
                //
                //echo '$sttr_pkt_weight_type == ' . $sttr_pkt_weight_type;
                //echo("<br/>");                
                //
                //
                // PURITY/TUNCH @PRIYANKA-24SEP21
                //if ($stamp == '' || $stamp == NULL) {
                    //if ($sttr_metal_type == 'gold' || $sttr_metal_type == 'GOLD' || $sttr_metal_type == 'Gold') {
                    //    $stamp = '24K';
                    //} else {
                    //    $stamp = '18K';
                    //}                    
                //}
                //
                //
                //echo '$stamp == ' . $stamp;
                //echo("<br/>");
                //
                //
                // PURITY/TUNCH @PRIYANKA-24SEP21
                if ($stamp != '' && $stamp != NULL) {
                    //
                    //
                    $arrStamp = explode('K', $stamp);
                    $sttr_purity_ct = $arrStamp[0];
                    //
                    //
                    // PURITY/TUNCH @PRIYANKA-24SEP21
                    $sttr_purity = decimalVal((($sttr_purity_ct / 24) * 100),2);
                    //
                    //
                    // FINAL PURITY/TUNCH @PRIYANKA-24SEP21
                    $sttr_final_purity = $sttr_purity;
                    //
                    //
                    // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-24SEP21
                    $sttr_fine_weight = decimalVal((($sttr_purity * $sttr_nt_weight) / 100),3);
                    $sttr_final_fine_weight = decimalVal($sttr_fine_weight,3);
                    //
                    //
                }
                //
                //
                //echo '$sttr_purity_ct == ' . $sttr_purity_ct;
                //echo("<br/>");
                //
                //
                //echo '$sttr_purity == ' . $sttr_purity;
                //echo("<br/>");
                //
                //
                // METAL RATE PER GM @PRIYANKA-27SEP21
                if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
                    $sttr_metal_rate_per_gm = ($sttr_metal_rate / 1000);
                } else {
                    $sttr_metal_rate_per_gm = ($sttr_metal_rate / 10);
                }
                //  
                //  
                if ($stamp == '' || $stamp == NULL) {
                    // 
                    //                                                           
                    // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-27SEP21
                    $sttr_fine_weight = decimalVal(($sttr_valuation / $sttr_metal_rate_per_gm),3);                               
                    $sttr_final_fine_weight = decimalVal($sttr_fine_weight,3);
                    //
                    //
                    // PURITY/TUNCH @PRIYANKA-27SEP21
                    if($sttr_nt_weight!=0){
                    $sttr_purity = decimalVal((($sttr_fine_weight * 100) / $sttr_nt_weight),2);
                    }else{
                        $sttr_purity=100;
                    }
                    //
                    //
                    // FINAL PURITY/TUNCH @PRIYANKA-27SEP21
                    $sttr_final_purity = $sttr_purity;
                    //
                    //
                    // PURITY/TUNCH IN KT @PRIYANKA-27SEP21
                    $sttr_purity_ct = decimalVal((($sttr_purity * 24) / 100),2);
                    //
                    //
                }
                //
                //
                // WASTAGE @PRIYANKA-24SEP21
                $sttr_wastage = 0;
                //
                //
                //
                //echo '$sttr_final_purity == ' . $sttr_final_purity;
                //echo("<br/>");
                //
                //
                //
                //echo '$sttr_fine_weight == ' . $sttr_fine_weight;
                //echo("<br/>");
                //echo '$sttr_final_fine_weight == ' . $sttr_final_fine_weight;
                //echo("<br/>");
                //
                //
                // CUST WASTG AND CUST WASTG WT @PRIYANKA-24SEP21
                $sttr_cust_wastage = 0;
                $sttr_cust_wastage_wt = 0;
                //
                //
                //
                //echo '$sttr_final_valuation_by == ' . $sttr_final_valuation_by;
                //echo("<br/>");
                //echo '$sttr_final_val_by == ' . $sttr_final_val_by;
                //echo("<br/>");
                //
                //
                //
                // METAL VALUATION @PRIYANKA-24SEP21
                $sttr_metal_amt = decimalVal($sttr_valuation,2);
                //
                //
                //echo '$sttr_metal_amt == ' . $sttr_metal_amt;
                //echo("<br/>");            
                //
                //
                // TOTAL TAX AMOUNT @PRIYANKA-24SEP21                    
                $sttr_tot_tax = '0.00';
                //
                $sttr_tax = '0.00';
                $tax = '0.00';
                $sttr_tot_price_cgst_per = '0.00';
                $sttr_tot_price_sgst_per = '0.00';
                $sttr_tot_price_igst_per = '0.00';
                //
                $sttr_tot_price_cgst_chrg = '0.00';
                $sttr_tot_price_sst_chrg = '0.00';
                $sttr_tot_price_igst_chrg = '0.00';
                //
                //
                // FINAL TAXABLE AMOUNT @PRIYANKA-24SEP21
                $sttr_final_taxable_amt = decimalVal($sttr_valuation,2); 
                //
                //
                // FINAL VALUATION @PRIYANKA-24SEP21
                $sttr_final_valuation = decimalVal($sttr_valuation,2);
                //                
                //
                // ARRAY REQUEST @PRIYANKA-24SEP21
                $info = array('sttr_firm_id' => $sttr_firm_id, 'firmId' => $sttr_firm_id, 'sttr_user_id' => $sttr_user_id,
                    'addItemDOBDay' => $day, 'addItemDOBMonth' => $month, 'addItemDOBYear' => $year,
                    'sttr_hallmark_uid' => $sttr_hallmark_uid,
                    'sttr_account_id' => $rawMetalAccId, 'sttr_sttr_id' => NULL,
                    'sttr_stock_type' => 'retail',
                    'sttr_transaction_type' => 'RECEIVED', 'sttr_indicator' => 'rawMetal', 'sttr_type' => 'rawMetal',
                    'sttr_payment_mode' => 'ByCash',
                    'sttr_pre_invoice_no' => $sttr_pre_invoice_no, 'sttr_invoice_no' => $sttr_invoice_no,
                    'sttr_metal_type' => $sttr_metal_type, 'sttr_metal_rate' => $sttr_metal_rate,
                    'sttr_item_category' => $sttr_item_category, 'sttr_item_name' => $sttr_item_name,
                    'sttr_quantity' => $sttr_quantity, 'sttr_gs_weight' => $sttr_gs_weight,
                    'sttr_gs_weight_type' => $sttr_gs_weight_type,
                    'sttr_pkt_weight' => $sttr_pkt_weight, 'sttr_pkt_weight_type' => $sttr_pkt_weight_type,
                    'sttr_nt_weight' => $sttr_nt_weight, 'sttr_nt_weight_type' => $sttr_nt_weight_type,
                    'sttr_purity' => $sttr_purity, 'sttr_purity_ct' => $sttr_purity_ct, 
                    'sttr_wastage' => $sttr_wastage, 'sttr_final_purity' => $sttr_final_purity,
                    'sttr_cust_wastage' => $sttr_cust_wastage, 'sttr_cust_wastage_wt' => $sttr_cust_wastage_wt,
                    'sttr_fine_weight' => $sttr_fine_weight, 'sttr_final_fine_weight' => $sttr_final_fine_weight,
                    'sttr_final_valuation_by' => $sttr_final_valuation_by, 'sttr_final_val_by' => $sttr_final_val_by,
                    'sttr_metal_amt' => $sttr_metal_amt,
                    'sttr_valuation' => $sttr_valuation,
                    'sttr_tot_price_cgst_per' => $sttr_tot_price_cgst_per, 'sttr_tot_price_cgst_chrg' => $sttr_tot_price_cgst_chrg,
                    'sttr_tot_price_sgst_per' => $sttr_tot_price_sgst_per, 'sttr_tot_price_sgst_chrg' => $sttr_tot_price_sgst_chrg,
                    'sttr_tot_price_igst_per' => $sttr_tot_price_igst_per, 'sttr_tot_price_igst_chrg' => $sttr_tot_price_igst_chrg,
                    'sttr_tax' => $sttr_tax, 'sttr_tot_tax' => $sttr_tot_tax,
                    'sttr_final_taxable_amt' => $sttr_final_taxable_amt, 
                    'sttr_final_valuation' => $sttr_final_valuation);
                //
                //
                // USER ID IS MANDATORY @PRIYANKA-24SEP21
                if ($sttr_user_id != '' && $sttr_user_id != NULL) {
                    //
                    //
                    if ($sttr_gs_weight > 0) {
                        //
                        //
                        $_REQUEST = array_merge($_REQUEST, $info);
                        //
                        //
                        // FOR SELL RAW METAL ENTRIES @PRIYANKA-24SEP21
                        stock_transaction('insert', $_REQUEST);
                        //
                        //
                    }
                    // 
                    //
                }
                //
                //echo '$rowsCounter == ' . $rowsCounter . '<br />';
                //
                }
            } else { ?>
            <div class="fs_13 ff_calibri bold" style="color:red;">Issue has been detected with Firm. Please select Firm! </div>
            <?php 
            die; }
    }
    //
    //
    $sttr_pre_invoice_no = NULL;
    $sttr_invoice_no = NULL;
    //
    //echo '$rowsCounter == ' . $rowsCounter . '<br />';
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
//$query = "DELETE FROM stock";
//
//echo '$query == ' . $query . '<br /><br />';
//
//if (!mysqli_query($conn, $query)) {
//    die('Error: ' . mysqli_error($conn));
//}
//
//
//
//
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
     $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/omHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/orHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/olHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    exit;
}
?>