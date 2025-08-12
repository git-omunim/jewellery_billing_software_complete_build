<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for Purchase Products @PRIYANKA-13SEP21
 * **********************************************************************************************************************************
 *
 * Created on 13 SEP, 2021 12.23.00 PM
 * 
 * @FileName: omSuppPurchaseListImportFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.82
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-13SEP21
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
    //if not selected assign session firm  @PRIYANKA-13SEP21
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
// Start Code to Import Data From CSV File to Mysql Database for Purchase Product List @PRIYANKA-13SEP21
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name @PRIYANKA-13SEP21
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
            // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-13SEP21
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
                // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-13SEP21
                // Date	Type	Refno	Party Name	Item Name	Stamp	Tag.No.	
                // Pc	Gr.Wt.	Net.Wt.	HUID	Rate	Met.Value	
                // Dia.Wt.	Dia.Val.	Stn.Wt.	Stn.Val.	
                // Lamt	Total	Taxable Val.	GSTIN	Tax
                // 
                //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
                //echo("<br/>");
                //
                // DATE @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Date') {
                    $date = $prodDetails[$headings['position']];
                }
                //
                // TYPE (TO IDENTIFY PURCHASE ENTRIES) @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Type') {
                    $Type = $prodDetails[$headings['position']];
                }
                //
                // REF NO. @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Refno') {
                    $invoiceNo = $prodDetails[$headings['position']];
                }
                //
                // PARTY NAME (USER NAME) @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Party Name') {
                    $partyName = $prodDetails[$headings['position']];
                }
                //
                // ITEM NAME @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Item Name') {
                    $sttr_item_name = $prodDetails[$headings['position']];
                }
                //
                // STAMP (PURITY/TUNCH) @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Stamp') {
                    $stamp = $prodDetails[$headings['position']];
                }
                //
                // TAG NO @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Tag.No.') {
                    $TagNo = $prodDetails[$headings['position']];
                }
                //
                // PC (QUANTITY) @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Pc') {
                    $sttr_quantity = $prodDetails[$headings['position']];
                }
                //
                // GR.WT. (GROSS WEIGHT) @PRIYANKA-13SEP21             
                if ($headings['columnName'] == 'Gr.Wt.') {
                    $sttr_gs_weight = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // NET.WT. (NET WEIGHT) @PRIYANKA-13SEP21    
                if ($headings['columnName'] == 'Net.Wt.') {
                    $sttr_nt_weight = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // HUID @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'HUID') {
                    $sttr_hallmark_uid = $prodDetails[$headings['position']];
                }
                //
                // RATE @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Rate') {
                    $sttr_metal_rate = $prodDetails[$headings['position']];
                }
                //
                // MET VALUE (METAL VALUATION) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Met.Value') {
                    $sttr_valuation = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // DIA. WT (DIAMOND WEIGHT) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Dia.Wt.') {
                    $diamondWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // DIA. VAL (DIAMOND VALUATION) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Dia.Val.') {
                    $diamondVal = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // STN. WT (STONE WEIGHT) @PRIYANKA-13SEP21
                if ($headings['columnName'] == 'Stn.Wt.') {
                    $stoneWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // STN. VAL (STONE VALUATION) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Stn.Val.') {
                    $stoneVal = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // LAMT (TOTAL LAB CHARGES) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Lamt') {
                    $sttr_total_lab_charges = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TOTAL (METAL VALUATION + TOTAL LAB CHARGES = TOTAL AMOUNT) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Total') {
                    $sttr_final_taxable_amt = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TAXABLE VAL (TOTAL AMOUNT + TOTAL TAX AMOUNT = FINAL AMOUNT) @PRIYANKA-13SEP21 
                if ($headings['columnName'] == 'Taxable Val.') {
                    $sttr_final_valuation = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TAX (TOTAL TAX AMOUNT) @PRIYANKA-13SEP21 
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
            // FIRM ID @PRIYANKA-13SEP21
            $sttr_firm_id = $selFirmId;
            //
            //echo 'sttr_firm_id == ' . $sttr_firm_id;
            //echo("<br/>");
            //
            // FOR FIRM MANDATORY @PRIYANKA-13SEP21
            if ($sttr_firm_id != '' && $sttr_firm_id != NULL) {
                // 
                // 
                //echo 'Type == ' . $Type;
                //echo("<br/>");
                //
                // ONLY FOR PURCHASE ENTRIES @PRIYANKA-13SEP21
                if ($Type == 'P') {                
                //
                //
                //echo '$sttr_item_name == ' . $sttr_item_name;
                //echo("<br/>");    
                //
                //
                // ITEM NAME @PRIYANKA-23SEP21
                if ($sttr_item_name == 'PEND..SET GOLD') {
                    $sttr_item_name = 'PENDENT SET GOLD';
                }
                //
                //
                if ($sttr_item_name == 'KIDS PEND.. GOLD') {
                    $sttr_item_name = 'KIDS PENDENT GOLD';
                }
                //
                //
                if ($sttr_item_name == 'FANCY ITEM SIL..') {
                    $sttr_item_name = 'FANCY ITEM SIL';
                }   
                //
                //
                if ($sttr_item_name == 'E RINGS/BALI,KUNDALGOLD') {
                    $sttr_item_name = 'E RINGS BALI KUNDAL GOLD';
                }
                //
                //
                $sttr_item_name = str_replace('"', '', $sttr_item_name);
                //
                //
                // ITEM PRE ID AND ITEM CODE @PRIYANKA-13SEP21
                $itemCode = explode(" ", "$sttr_item_name");
                $productCode = "";
                //
                foreach ($itemCode as $itemCodeStr) {
                         $productCode .= $itemCodeStr[0];
                }
                //
                //echo '$productCode == ' . strtoupper($productCode);
                //echo("<br/>");
                //
                // ITEM PRE ID AND ITEM CODE @PRIYANKA-13SEP21
                $sttr_item_pre_id = strtoupper($productCode);
                $sttr_item_code = strtoupper($productCode);                
                //
                //echo '$sttr_item_pre_id == ' . $sttr_item_pre_id;
                //echo("<br/>");
                //echo '$sttr_item_code == ' . $sttr_item_code;
                //echo("<br/>");
                //
                //
                // HUID @PRIYANKA-13SEP21
                if ($sttr_hallmark_uid == '' || $sttr_hallmark_uid == NULL) {
                    $sttr_hallmark_uid = NULL;
                }
                //
                //
                // METAL/PRODUCT TYPE - GOLD @PRIYANKA-13SEP21
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
                // METAL/PRODUCT TYPE - SILVER @PRIYANKA-13SEP21
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
                //echo '$sttr_metal_type == ' . $sttr_metal_type;
                //echo("<br/>");
                //echo '$sttr_product_type == ' . $sttr_product_type;
                //echo("<br/>");
                //
                //
                if ($sttr_metal_type == 'Gold' || $sttr_metal_type == 'Silver') {
                    //$sttr_barcode_prefix = '';
                    //$sttr_barcode = '';                    
                }
                //
                //echo '$sttr_barcode_prefix == ' . $sttr_barcode_prefix;
                //echo("<br/>");
                //
                //
                // TRANSACTION TYPE @PRIYANKA-13SEP21
                if ($sttr_transaction_type == '' || $sttr_transaction_type == NULL) {
                    $sttr_transaction_type = 'PURBYSUPP';
                }
                //
                //echo '$sttr_transaction_type == ' . $sttr_transaction_type;
                //echo("<br/>");
                //
                //
                //INDICATOR @PRIYANKA-13SEP21
                if ($sttr_indicator == '' || $sttr_indicator == NULL) {
                    $sttr_indicator = 'AddInvoice';
                }
                //
                //echo '$sttr_indicator == ' . $sttr_indicator;
                //echo("<br/>");
                //
                //
                // STOCK TYPE @PRIYANKA-13SEP21
                if ($sttr_stock_type == '' || $sttr_stock_type == NULL) {
                    $sttr_stock_type = 'wholesale';
                }
                //
                //echo '$sttr_stock_type == ' . $sttr_stock_type;
                //echo("<br/>");
                //
                //
                // FOR USER DETAILS @PRIYANKA-13SEP21
                parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                       . "AND user_firm_id = '$sttr_firm_id' AND user_fname = '$partyName'"));
                //
                $sttr_user_id = $user_id;
                //
                //echo '$sttr_user_id == ' . $sttr_user_id;
                //echo("<br/>");
                //
                //
                // FOR ACCOUNT DETAILS @PRIYANKA-13SEP21
                $accName = 'Purchase Accounts';
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
                //
                $sttr_account_id = $acc_id;
                //
                //echo '$sttr_account_id == ' . $sttr_account_id;
                //echo("<br/>");
                //
                //
                // DATE @PRIYANKA-13SEP21
                if ($date != '' && $date != NULL) {
//                    echo 'in if';
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
                //echo '$sttr_add_date == ' . $sttr_add_date;
                //echo("<br/>");
                //die;
                //
                //
                // INVOICE NO. @PRIYANKA-13SEP21
                if ($invoiceNo != '' && $invoiceNo != NULL) {
                    $arrInv = explode('/', $invoiceNo);
                    $sttr_pre_invoice_no = $arrInv[0];
                    $sttr_invoice_no = $arrInv[1];
                }
                //
                //echo '$sttr_pre_invoice_no == ' . $sttr_pre_invoice_no;
                //echo("<br/>");
                //echo '$sttr_invoice_no == ' . $sttr_invoice_no;
                //echo("<br/>");
                //die;
                // 
                //
                // ITEM CATEGORY @PRIYANKA-13SEP21
                $sttr_item_category = $sttr_item_name;
                //
                //echo '$sttr_item_category == ' . $sttr_item_category;
                //echo("<br/>");
                //
                // QUANTITY @PRIYANKA-13SEP21
                if ($sttr_quantity == '' || $sttr_quantity == NULL) {
                    $sttr_quantity = '';
                }
                //
                //echo '$sttr_quantity == ' . $sttr_quantity;
                //echo("<br/>");
                //
                //
                // GS WT TYPE @PRIYANKA-13SEP21
                if ($sttr_gs_weight_type == '' || $sttr_gs_weight_type == NULL) {
                    $sttr_gs_weight_type = 'GM';
                }
                //
                //echo '$sttr_gs_weight_type == ' . $sttr_gs_weight_type;
                //echo("<br/>");
                //
                //
                // NT WT TYPE @PRIYANKA-13SEP21
                if ($sttr_nt_weight_type == '' || $sttr_nt_weight_type == NULL) {
                    $sttr_nt_weight_type = 'GM';
                }
                //
                //echo '$sttr_nt_weight_type == ' . $sttr_nt_weight_type;
                //echo("<br/>");
                //
                //
                // PKT WT TYPE @PRIYANKA-13SEP21
                if ($sttr_pkt_weight_type == '' || $sttr_pkt_weight_type == NULL) {
                    $sttr_pkt_weight_type = 'GM';
                }
                //
                //
                //echo '$sttr_pkt_weight_type == ' . $sttr_pkt_weight_type;
                //echo("<br/>");                
                //
                //
                // PURITY/TUNCH @PRIYANKA-13SEP21
                if ($stamp == '' || $stamp == NULL) {
                    //
                    //$stamp = '18K';
                    //
                    $stamp = '24K';
                    //
                }
                //
                //echo '$stamp == ' . $stamp;
                //echo("<br/>");
                //
                //
                // PURITY/TUNCH @PRIYANKA-13SEP21
                if ($stamp != '' && $stamp != NULL) {
                    $arrStamp = explode('K', $stamp);
                    $sttr_purity_ct = $arrStamp[0];
                }
                //
                //echo '$sttr_purity_ct == ' . $sttr_purity_ct;
                //echo("<br/>");
                //
                //
                // PURITY/TUNCH @PRIYANKA-13SEP21
                $sttr_purity = decimalVal((($sttr_purity_ct / 24) * 100),2);
                //
                //echo '$sttr_purity == ' . $sttr_purity;
                //echo("<br/>");
                //
                //
                // WASTAGE @PRIYANKA-13SEP21
                $sttr_wastage = 0;
                //
                //
                // FINAL PURITY/TUNCH @PRIYANKA-13SEP21
                $sttr_final_purity = $sttr_purity;
                //
                //echo '$sttr_final_purity == ' . $sttr_final_purity;
                //echo("<br/>");
                //
                //
                // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-13SEP21
                $sttr_fine_weight = decimalVal((($sttr_purity * $sttr_nt_weight) / 100),3);
                $sttr_final_fine_weight = decimalVal((($sttr_final_purity * $sttr_nt_weight) / 100),3);
                //
                //echo '$sttr_fine_weight == ' . $sttr_fine_weight;
                //echo("<br/>");
                //echo '$sttr_final_fine_weight == ' . $sttr_final_fine_weight;
                //echo("<br/>");
                //
                //
                // CUST WASTG AND CUST WASTG WT @PRIYANKA-13SEP21
                $sttr_cust_wastage = 0;
                $sttr_cust_wastage_wt = 0;
                //
                //
                // FINAL VAL BY AND FINAL FINE WT BY @PRIYANKA-13SEP21
                $sttr_final_valuation_by = 'byNetWt';
                $sttr_final_val_by = 'byNetWt';
                //
                //echo '$sttr_final_valuation_by == ' . $sttr_final_valuation_by;
                //echo("<br/>");
                //echo '$sttr_final_val_by == ' . $sttr_final_val_by;
                //echo("<br/>");
                //
                //
                //
                if ($sttr_total_lab_charges == '' || $sttr_total_lab_charges == NULL || 
                    $sttr_total_lab_charges == '0.00' || $sttr_total_lab_charges == 0) {
                    $sttr_total_lab_charges = decimalVal((round($sttr_final_taxable_amt) - $sttr_valuation),2); 
                }
                //
                //
                //if ($sttr_total_lab_charges < 0) {
                //    $sttr_total_lab_charges = '0.00'; 
                //    $sttr_lab_charges = '0.00'; 
                //    $sttr_lab_charges_type = '';
                //    $sttr_total_lab_amt = '0.00'; 
                //}
                //
                //
                // LAB CHARGES @PRIYANKA-13SEP21
                //if ($sttr_total_lab_charges > 0) {
                    $sttr_lab_charges = decimalVal($sttr_total_lab_charges,2);
                    $sttr_lab_charges_type = 'Fixed';
                    $sttr_total_lab_amt = decimalVal($sttr_total_lab_charges,2);                    
                //}
                //
                //echo '$sttr_lab_charges == ' . $sttr_lab_charges;
                //echo("<br/>");    
                //echo '$sttr_total_lab_charges == ' . $sttr_total_lab_charges;
                //echo("<br/>");
                //
                //
                //if ($sttr_lab_charges_type == '' || $sttr_lab_charges_type == NULL) {
                //    $sttr_lab_charges_type = 'PP';
                //}
                //
                //echo '$sttr_lab_charges_type == ' . $sttr_lab_charges_type;
                //echo("<br/>");    
                //
                //
                // METAL VALUATION @PRIYANKA-13SEP21
                $sttr_metal_amt = decimalVal($sttr_valuation,2);
                //
                //echo '$sttr_metal_amt == ' . $sttr_metal_amt;
                //echo("<br/>");            
                //
                //
                // DIAMOND/STONE DETAILS - WT, WT TYPE AND VAL  @PRIYANKA-13SEP21
                if ($diamondWt > 0) {
                    $sttr_stone_wt = decimalVal($diamondWt,3);
                    $sttr_stone_wt_type = 'CT';
                    $sttr_stone_valuation = decimalVal($diamondVal,2);
                } else {
                    $sttr_stone_wt = decimalVal($stoneWt,3);
                    $sttr_stone_wt_type = 'GM';
                    $sttr_stone_valuation = decimalVal($stoneVal,2);
                }
                //
                //
                //$sttr_tot_tax = (($sttr_final_taxable_amt * $sttr_tax) / 100);
                //
                //
                //$sttr_tax = decimalVal((($sttr_tot_tax * 100) / $sttr_final_taxable_amt),4);
                //
                //
                //echo '$sttr_tax == ' . $sttr_tax;
                //echo("<br/>");
                //
                //
                // TAX @PRIYANKA-20SEP21
                $sttr_tax = '0.00';  
                //
                //
                // TOTAL TAX @PRIYANKA-13SEP21
                // $sttr_tot_tax = 0;                                
                //
                //
                //
                if ($sttr_final_valuation > $sttr_final_taxable_amt) {
                    $sttr_tot_tax = decimalVal(($sttr_final_valuation - $sttr_final_taxable_amt),2);
                }
                //
                //
                // TOTAL TAX AMOUNT @PRIYANKA-20SEP21
                if ($sttr_tot_tax > 0) {
                    //
                    //
                    // CALCULATE TAX IN % @PRIYANKA-20SEP21
                    $tax = decimalVal((($sttr_tot_tax * 100) / $sttr_final_taxable_amt),4);
                    //
                    //
                    //echo '$tax == ' . $tax;
                    //echo("<br/>");
                    //
                    //
                    if ($tax >= 3 && $tax < 4) {
                        $tax = 3;
                    }
                    //
                    //
                    if ($tax > 5 && $tax <= 6) {
                        $tax = 6;
                    }
                    //
                    //
                    if ($tax > 8 && $tax <= 9) {
                        $tax = 9;
                    }
                    //
                    //
                    if ($tax > 11 && $tax <= 12) {
                        $tax = 12;
                    }
                    //
                    //
                    if ($tax >= 18 && $tax < 19) {
                        $tax = 18;
                    }
                    //
                    //
                    // CGST % @PRIYANKA-20SEP21
                    $sttr_tot_price_cgst_per = decimalVal(($tax / 2),2);
                    //
                    //
                    // SGST % @PRIYANKA-20SEP21
                    $sttr_tot_price_sgst_per = decimalVal(($tax / 2),2);
                    //        
                    //
                    // IGST % @PRIYANKA-20SEP21
                    $sttr_tot_price_igst_per = '0.00';
                    //
                    //
                    // CGST CHARGES @PRIYANKA-20SEP21
                    $sttr_tot_price_cgst_chrg = decimalVal(($sttr_tot_tax / 2),2);
                    //
                    //
                    // SGST CHARGES @PRIYANKA-20SEP21
                    $sttr_tot_price_sgst_chrg = decimalVal(($sttr_tot_tax / 2),2);
                    //
                    //
                    // IGST CHARGES @PRIYANKA-20SEP21
                    $sttr_tot_price_igst_chrg = '0.00';
                    //
                    //
                } else {
                    //
                    // TOTAL TAX AMOUNT @PRIYANKA-20SEP21
                    $sttr_tot_tax = '0.00';
                    //
                    $tax = '0.00';
                    $sttr_tot_price_cgst_per = '0.00';
                    $sttr_tot_price_sgst_per = '0.00';
                    $sttr_tot_price_igst_per = '0.00';
                    //
                    $sttr_tot_price_cgst_chrg = '0.00';
                    $sttr_tot_price_sst_chrg = '0.00';
                    $sttr_tot_price_igst_chrg = '0.00';                    
                    //
                }
                //
                //
                // FINAL VALUATION @PRIYANKA-13SEP21
                $sttr_final_valuation = decimalVal($sttr_final_valuation,2);
                //                
                //
                // ARRAY REQUEST @PRIYANKA-13SEP21
                $info = array('sttr_firm_id' => $sttr_firm_id, 'firmId' => $sttr_firm_id, 'sttr_user_id' => $sttr_user_id,
                    'addItemDOBDay' => $day, 'addItemDOBMonth' => $month, 'addItemDOBYear' => $year,
                    'sttr_hallmark_uid' => $sttr_hallmark_uid,
                    'sttr_account_id' => $sttr_account_id, 'sttr_sttr_id' => NULL,
                    'sttr_item_pre_id' => $sttr_item_code, 'sttr_stock_type' => $sttr_stock_type,
                    'sttr_transaction_type' => 'PURBYSUPP', 'sttr_indicator' => 'AddInvoice',
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
                    'sttr_lab_charges' => $sttr_lab_charges, 'sttr_lab_charges_type' => $sttr_lab_charges_type,
                    'sttr_total_lab_amt' => $sttr_total_lab_amt,
                    'sttr_total_lab_charges' => $sttr_total_lab_charges,
                    'sttr_tot_price_cgst_per' => $sttr_tot_price_cgst_per, 'sttr_tot_price_cgst_chrg' => $sttr_tot_price_cgst_chrg,
                    'sttr_tot_price_sgst_per' => $sttr_tot_price_sgst_per, 'sttr_tot_price_sgst_chrg' => $sttr_tot_price_sgst_chrg,
                    'sttr_tot_price_igst_per' => $sttr_tot_price_igst_per, 'sttr_tot_price_igst_chrg' => $sttr_tot_price_igst_chrg,
                    'sttr_tax' => $sttr_tax, 'sttr_tot_tax' => $sttr_tot_tax,
                    'sttr_metal_amt' => $sttr_metal_amt,
                    'sttr_valuation' => $sttr_valuation,
                    'sttr_final_taxable_amt' => $sttr_final_taxable_amt, 
                    'sttr_stone_wt' => $sttr_stone_wt,
                    'sttr_stone_wt_type' => $sttr_stone_wt_type, 'sttr_stone_valuation' => $sttr_stone_valuation,
                    'sttr_final_valuation' => $sttr_final_valuation);
                //
                //
                // USER ID IS MANDATORY @PRIYANKA-13SEP21
                if ($sttr_user_id != '' && $sttr_user_id != NULL) {
                    //
                    // ONLY PURCHASE ENTRIES @PRIYANKA-16SEP21
                    if ($sttr_pre_invoice_no == 'PRD') {
                    //
                    $_REQUEST = array_merge($_REQUEST, $info);
                    //
                    //
                    // FOR PURBYSUPP ENTRIES @PRIYANKA-13SEP21
                    $sttrId = stock_transaction('insert', $_REQUEST);
                    //
                    //
                    $type = array('sttr_transaction_type' => 'PURCHASE', 'sttr_indicator' => 'PURCHASE', 
                                  'sttr_sttr_id' => $sttrId);
                    //
                    //
                    $_REQUEST = array_merge($_REQUEST, $type);
                    // 
                    //
                    // FOR PURCHASE ENTRIES @PRIYANKA-13SEP21
                    $mainWholesaleId = stock_transaction('insert', $_REQUEST);
                    //                    
                    //
                    // ADDED CODE TO STORE STOCK TABLE ENTRY ID IN PURCHASE ENTRY @PRIYANKA-18OCT21
                    parse_str(getTableValues("SELECT sttr_sttr_id AS purchaseStockId, "
                                           . "sttr_item_category, sttr_item_Name, "
                                           . "sttr_metal_type, sttr_firm_id, sttr_stock_type, "
                                           . "sttr_purity "
                                           . "FROM stock_transaction "
                                           . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                           . "AND sttr_id = '$mainWholesaleId' "
                                           . "AND sttr_indicator = 'PURCHASE' "
                                           . "AND sttr_transaction_type = 'PURCHASE' "
                                           . "AND sttr_status NOT IN ('DELETED') order by sttr_id desc LIMIT 0,1"));
                    //
                    //echo '<br/>$purchaseStockId == ' . $purchaseStockId . '<br/>';
                    //
                    $selQueryNew = "SELECT * FROM stock WHERE st_item_category = '$sttr_item_category' "
                                 . "AND st_item_Name = '$sttr_item_Name' "
                                 . "AND st_metal_type = '$sttr_metal_type' "
                                 . "AND st_firm_id = '$sttr_firm_id' "
                                 . "AND st_stock_type = '$sttr_stock_type' "
                                 . "AND st_purity = '$sttr_purity' "
                                 . "AND st_type = 'stock'";
                    //
                    //echo '<br/>$selQueryNew == ' . $selQueryNew . '<br/>';
                    //
                    $selQueryResultNew = mysqli_query($conn, $selQueryNew);
                    $totalNoOfStockEntries = mysqli_num_rows($selQueryResultNew);
                    //
                    //echo '<br/>$totalNoOfStockEntries == ' . $totalNoOfStockEntries . '<br/>';
                    //
                    if ($totalNoOfStockEntries > 0) {
                        //
                        $rowStockEntry = mysqli_fetch_array($selQueryResultNew, MYSQLI_ASSOC);
                        //
                        $stockIdForStockTrans = $rowStockEntry['st_id'];
                        //
                        //echo '<br/>$stockIdForStockTrans 1== ' . $stockIdForStockTrans . '<br/>';
                        //
                    } else {    
                        //
                        //
                        parse_str(getTableValues("SELECT st_id AS stockIdForStockTrans FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
                                               . "ORDER BY st_id DESC LIMIT 0,1"));   
                        //
                        //echo '<br/>$stockIdForStockTrans 2== ' . $stockIdForStockTrans . '<br/>';
                        //
                    }
                    //    
                    //
                    $queryUpdateStock = "UPDATE stock_transaction SET sttr_st_id = '$stockIdForStockTrans' "
                                      . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                      . "AND (sttr_id = '$purchaseStockId' OR sttr_sttr_id = '$purchaseStockId') "
                                      . "AND sttr_transaction_type IN ('EXISTING', 'PURCHASE')";
                    //
                    if (!mysqli_query($conn, $queryUpdateStock)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                    //
                    //
                    //echo '<br/>$queryUpdateStock == ' . $queryUpdateStock . '<br/>';
                    //
                    //
                    }
                }
                //
                //
                }
            } else { ?>
            <div class="fs_13 ff_calibri bold" style="color:red;">Issue has been detected with Firm. Please select Firm! </div>
            <?php 
            die; }
    }
    //
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
// ********************************************************************************************************************************
// START CODE TO FETCH PURCHASE ENTRY DETAILS FOR PAYMENT DETAILS @PRIYANKA-20-SEP-21
// ********************************************************************************************************************************
//
$queryPurchaseDetails = "SELECT sttr_user_id, sttr_firm_id, sttr_account_id, "
                      . "sttr_metal_type, sttr_metal_rate, "
                      . "sttr_pre_invoice_no, sttr_invoice_no, "
                      . "sttr_add_date, "
                      . "SUM(sttr_quantity) AS sttr_quantity, "
                      . "SUM(sttr_gs_weight) AS sttr_gs_weight, SUM(sttr_nt_weight) AS sttr_nt_weight, "
                      . "SUM(sttr_fine_weight) AS sttr_fine_weight, SUM(sttr_final_fine_weight) AS sttr_final_fine_weight, "
                      . "SUM(sttr_total_lab_charges) AS sttr_total_lab_charges, SUM(sttr_valuation) AS sttr_valuation, "
                      . "SUM(sttr_tot_tax) AS sttr_tot_tax, SUM(sttr_final_valuation) AS sttr_final_valuation  "
                      . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                      . "AND sttr_firm_id = '$selFirmId' "
                      . "AND sttr_transaction_type IN ('PURBYSUPP') AND sttr_indicator IN ('AddInvoice') "
                      . "AND sttr_status = 'PaymentPending' AND (sttr_utin_id IS NULL OR sttr_utin_id = '') "
                      . "GROUP BY sttr_pre_invoice_no, sttr_invoice_no ORDER BY sttr_id ASC ";
//
//
$purProductsResult = mysqli_query($conn, $queryPurchaseDetails); // QUERY RESULT STORING IN VARIABLE @PRIYANKA-20-SEP-21
//
//
while ($purProductsRow = mysqli_fetch_array($purProductsResult)) {
    //
    //
    $sttr_add_date = $purProductsRow['sttr_add_date'];
    //
    $arrAddDate = explode(' ', $sttr_add_date);
    //
    $day = $arrAddDate[0];
    $month = strtoupper($arrAddDate[1]);
    $year = $arrAddDate[2];
    //
    $sttr_user_id = $purProductsRow['sttr_user_id'];
    $sttr_firm_id = $purProductsRow['sttr_firm_id'];
    $sttr_account_id = $purProductsRow['sttr_account_id'];
    //
    $sttr_metal_type = $purProductsRow['sttr_metal_type'];
    $sttr_metal_rate = $purProductsRow['sttr_metal_rate'];
    //
    $sttr_pre_invoice_no = $purProductsRow['sttr_pre_invoice_no'];
    $sttr_invoice_no = $purProductsRow['sttr_invoice_no'];
    //
    // FOR GOLD ENTRIES @PRIYANKA-20-SEP-21
    if ($sttr_metal_type == 'Gold' || $sttr_metal_type == 'GOLD' || $sttr_metal_type == 'gold') {
        //
        $sttr_metal_rate_gd = $purProductsRow['sttr_metal_rate'];
        //
        $sttr_quantity_gd = $purProductsRow['sttr_quantity'];
        $sttr_gs_weight_gd = decimalVal($purProductsRow['sttr_gs_weight'],3);
        $sttr_nt_weight_gd = decimalVal($purProductsRow['sttr_nt_weight'],3);
        $sttr_fine_weight_gd = decimalVal($purProductsRow['sttr_fine_weight'],3);
        $sttr_final_fine_weight_gd = decimalVal($purProductsRow['sttr_final_fine_weight'],3);
        //
        $sttr_total_lab_charges_gd = decimalVal($purProductsRow['sttr_total_lab_charges'],2);
        $sttr_valuation_gd = decimalVal(($purProductsRow['sttr_final_valuation'] - $purProductsRow['sttr_total_lab_charges'] - $purProductsRow['sttr_tot_tax']),2);
        $sttr_tot_tax_gd = decimalVal($purProductsRow['sttr_tot_tax'],2);
        $sttr_final_valuation_gd = decimalVal($purProductsRow['sttr_final_valuation'],2);
        //
        //
    } 
    else {
        //
        // FOR SILVER ENTRIES @PRIYANKA-20-SEP-21
        //
        $sttr_metal_rate_sl = $purProductsRow['sttr_metal_rate'];
        //
        $sttr_quantity_sl = $purProductsRow['sttr_quantity'];
        $sttr_gs_weight_sl = decimalVal($purProductsRow['sttr_gs_weight'],3);
        $sttr_nt_weight_sl = decimalVal($purProductsRow['sttr_nt_weight'],3);
        $sttr_fine_weight_sl = decimalVal($purProductsRow['sttr_fine_weight'],3);
        $sttr_final_fine_weight_sl = decimalVal($purProductsRow['sttr_final_fine_weight'],3);
        //
        $sttr_total_lab_charges_sl = decimalVal($purProductsRow['sttr_total_lab_charges'],2);
        $sttr_valuation_sl = decimalVal(($purProductsRow['sttr_final_valuation'] - $purProductsRow['sttr_total_lab_charges'] - $purProductsRow['sttr_tot_tax']),2);      
        $sttr_tot_tax_sl = decimalVal($purProductsRow['sttr_tot_tax'],2);
        $sttr_final_valuation_sl = decimalVal($purProductsRow['sttr_final_valuation'],2);
        //
        //
    }
    //
    //
    $sttr_quantity = $purProductsRow['sttr_quantity'];
    $sttr_gs_weight = decimalVal($purProductsRow['sttr_gs_weight'],3);
    $sttr_nt_weight = decimalVal($purProductsRow['sttr_nt_weight'],3);
    $sttr_fine_weight = decimalVal($purProductsRow['sttr_fine_weight'],3);
    $sttr_final_fine_weight = decimalVal($purProductsRow['sttr_final_fine_weight'],3);
    $sttr_total_lab_charges = decimalVal($purProductsRow['sttr_total_lab_charges'],2);
    $sttr_valuation = decimalVal(($purProductsRow['sttr_final_valuation'] - $purProductsRow['sttr_total_lab_charges'] - $purProductsRow['sttr_tot_tax']),2); 
    $sttr_tot_tax = decimalVal($purProductsRow['sttr_tot_tax'],2);
    $sttr_tot_price_cgst_chrg = decimalVal(($sttr_tot_tax / 2),2);
    $sttr_tot_price_sgst_chrg = decimalVal(($sttr_tot_tax / 2),2);    
    $sttr_final_valuation = decimalVal($purProductsRow['sttr_final_valuation'],2);
    //
    //
    // ******************************************************************************************************************
    // START CODE TO CREATE REQUEST FOR PAYMENT DETAILS (For user_transaction_invoice table entries) @PRIYANKA-20-SEP-21
    // ******************************************************************************************************************
        //
        //
        include 'omSuppPurchaseListPaymentDetailsFile.php';
        //
        //
    // ******************************************************************************************************************
    // START CODE TO CREATE REQUEST FOR PAYMENT DETAILS (For user_transaction_invoice table entries) @PRIYANKA-20-SEP-21
    // ******************************************************************************************************************
    //
    //
    $sttr_quantity = '';
    $sttr_gs_weight = NULL;
    $sttr_nt_weight = NULL;
    $sttr_fine_weight = NULL;
    $sttr_final_fine_weight = NULL;
    //
    $sttr_total_lab_charges = NULL;
    $sttr_valuation = NULL;   
    $sttr_tot_tax = NULL;
    $sttr_final_valuation = NULL;    
    //
    //
    $sttr_quantity_gd = '';
    $sttr_gs_weight_gd = NULL;
    $sttr_nt_weight_gd = NULL;
    $sttr_fine_weight_gd = NULL;
    $sttr_final_fine_weight_gd = NULL;
    //
    $sttr_total_lab_charges_gd = NULL;
    $sttr_valuation_gd = NULL;   
    $sttr_tot_tax_gd = NULL;
    $sttr_final_valuation_gd = NULL;  
    //
    //
    $sttr_quantity_sl = '';
    $sttr_gs_weight_sl = NULL;
    $sttr_nt_weight_sl = NULL;
    $sttr_fine_weight_sl = NULL;
    $sttr_final_fine_weight_sl = NULL;
    //
    $sttr_total_lab_charges_sl = NULL;
    $sttr_valuation_sl = NULL;   
    $sttr_tot_tax_sl = NULL;
    $sttr_final_valuation_sl = NULL;
    //
    //
    $goldValuation = NULL;
    $silverValuation = NULL;
    $stoneValuation = NULL;
    //
    //
}
//
// ********************************************************************************************************************************
// END CODE TO FETCH PURCHASE ENTRY DETAILS FOR PAYMENT DETAILS @PRIYANKA-20-SEP-21
// ********************************************************************************************************************************
//
//
//
//
//if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
//     $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
//    header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&suppPanelOption=InvoicePayment&custId=' . $sttr_user_id .
//           '&panelName=InvoicePayment&divSubPanel=' . $divSubPanel . '&accDrId=' . $sttr_account_id);
//} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
//            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
//    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&suppPanelOption=InvoicePayment&custId=' . $sttr_user_id .
//            '&panelName=InvoicePayment&divSubPanel=' . $divSubPanel . '&accDrId=' . $sttr_account_id);
//}
//
//
//
//
//if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
//        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
//    header("Location: $documentRoot/omHomePage.php?divPanel=" . 'OwnerHome');
//} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
//        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
//    header("Location: $documentRoot/orHomePage.php?divPanel=" . 'OwnerHome');
//} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
//        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
//    header("Location: $documentRoot/olHomePage.php?divPanel=" . 'OwnerHome');
//} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
//        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
//    header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome');
//} else {
//    $showMess = 'Your session has expired. Please log in again!!!';
//    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
//    exit;
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