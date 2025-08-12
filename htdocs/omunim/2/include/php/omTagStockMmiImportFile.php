<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import MMI stock Data From CSV File to Mysql Database for TAG entries @SIMRAN:17APR2023
 * **********************************************************************************************************************************
 *
 * Created on 13 DEC, 2021 04.04.00 PM
 * 
 * @FileName: omTagStockMmiImportFile.php
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
 *  AUTHOR: @SIMRAN:17APR2023
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
parse_str(getTableValues("SELECT st_purity, st_final_purity, st_firm_id FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
                . "AND st_id = '$sttr_st_id'"));
//
//
$rowsCounter = 0;
//
//
while (($prodDetails = fgetcsv($readImportFile, 10000, ",")) !== false) {
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
            // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-16OCT21
        // CERT	PROD	PUIRTY	PC	
        // G WT	NET WT	GOLD	GOLD + MKG	TOTAL
        //
            //
            // CSV FILE COLUMN HEADINGS (For Reference) - (MIX) @PRIYANKA-16OCT21
        // D.WT 1     T DWT	     CS TYPE	  CS VALUE      D RATE 1	D VALUE
        //
            //
            //$prodDetails[] = json_decode($json1,true);
        //$prodDetails[] = json_decode($json2,true);
        //$json_merge = json_encode($prodDetails);
        //
            //
            for ($i = 0; $i < $columnCounter; $i++) {
            //
            //echo '<br />';
            //echo '$i == ' . $i. '<br />';
            //echo '$prodDetails == ' . $prodDetails[$i] . '<br />';
            //
                if ($prodDetails[$i] == 'Tgno' || $prodDetails[$i] == 'Tag.No.') {
                $json1 = '{"columnName":"Tgno", "position":' . $i . ',' . '"tableColumnName":"Tgno"}';
                $allData[] = json_decode($json1, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Stamp') {
                $json2 = '{"columnName":"Stamp", "position":' . $i . ',' . '"tableColumnName":"Stamp"}';
                $allData[] = json_decode($json2, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Date') {
                $json3 = '{"columnName":"Date", "position":' . $i . ',' . '"tableColumnName":"Date"}';
                $allData[] = json_decode($json3, true);
            }
            //
            //
                if ($prodDetails[$i] == 'PC' || $prodDetails[$i] == 'Pc') {
                $json4 = '{"columnName":"PC", "position":' . $i . ',' . '"tableColumnName":"PC"}';
                $allData[] = json_decode($json4, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Gwt' || $prodDetails[$i] == 'Gr.Wt.') {
                $json5 = '{"columnName":"Gr.Wt.", "position":' . $i . ',' . '"tableColumnName":"Gr.Wt."}';
                $allData[] = json_decode($json5, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Wt' || $prodDetails[$i] == 'Net.Wt.') {
                $json6 = '{"columnName":"Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"Net.Wt."}';
                $allData[] = json_decode($json6, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Dia.Wt.') {
                $json7 = '{"columnName":"Dia.Wt.", "position":' . $i . ',' . '"tableColumnName":"Dia.Wt."}';
                $allData[] = json_decode($json7, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Stn.Wt.') {
                $json8 = '{"columnName":"Stn.Wt.", "position":' . $i . ',' . '"tableColumnName":"Stn.Wt."}';
                $allData[] = json_decode($json8, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Goldwt') {
                $json9 = '{"columnName":"Goldwt", "position":' . $i . ',' . '"tableColumnName":"Goldwt"}';
                $allData[] = json_decode($json9, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S/Lbr.Wt.' || $prodDetails[$i] == 'S.Lbr Wt') {
                $json10 = '{"columnName":"S/Lbr.Wt.", "position":' . $i . ',' . '"tableColumnName":"S/Lbr.Wt."}';
                $allData[] = json_decode($json19, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S/Lbr.Rs.' || $prodDetails[$i] == 'S.Lbr Rs') {
                $json11 = '{"columnName":"S/Lbr.Rs.", "position":' . $i . ',' . '"tableColumnName":"S/Lbr.Rs."}';
                $allData[] = json_decode($json11, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Supplier') {
                $json12 = '{"columnName":"Supplier", "position":' . $i . ',' . '"tableColumnName":"Supplier"}';
                $allData[] = json_decode($json12, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Other info' || $prodDetails[$i] == 'Remarks') {
                $json13 = '{"columnName":"Other info", "position":' . $i . ',' . '"tableColumnName":"Other info"}';
                $allData[] = json_decode($json13, true);
            }
            //
            //
                if ($prodDetails[$i] == 'H/M') {
                $json14 = '{"columnName":"H/M", "position":' . $i . ',' . '"tableColumnName":"H/M"}';
                $allData[] = json_decode($json14, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Cert.No.') {
                $json15 = '{"columnName":"Cert.No.", "position":' . $i . ',' . '"tableColumnName":"Cert.No."}';
                $allData[] = json_decode($json15, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Colour') {
                $json16 = '{"columnName":"Colour", "position":' . $i . ',' . '"tableColumnName":"Colour"}';
                $allData[] = json_decode($json16, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Clarity') {
                $json17 = '{"columnName":"Clarity", "position":' . $i . ',' . '"tableColumnName":"Clarity"}';
                $allData[] = json_decode($json17, true);
            }
            //
            //
                    if ($prodDetails[$i] == 'Design') {
                $json18 = '{"columnName":"Design", "position":' . $i . ',' . '"tableColumnName":"Design"}';
                $allData[] = json_decode($json18, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Size') {
                $json19 = '{"columnName":"Size", "position":' . $i . ',' . '"tableColumnName":"Size"}';
                $allData[] = json_decode($json19, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Costing') {
                $json20 = '{"columnName":"Costing", "position":' . $i . ',' . '"tableColumnName":"Costing"}';
                $allData[] = json_decode($json20, true);
            }
            //
            //
                if ($prodDetails[$i] == 'M.R.P.') {
                $json21 = '{"columnName":"M.R.P.", "position":' . $i . ',' . '"tableColumnName":"M.R.P."}';
                $allData[] = json_decode($json21, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Item Name') {
                $json22 = '{"columnName":"Item Name", "position":' . $i . ',' . '"tableColumnName":"Item Name"}';
                $allData[] = json_decode($json22, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Tunch') {
                $json23 = '{"columnName":"Tunch", "position":' . $i . ',' . '"tableColumnName":"Tunch"}';
                $allData[] = json_decode($json23, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Wstg') {
                $json24 = '{"columnName":"Wstg", "position":' . $i . ',' . '"tableColumnName":"Wstg"}';
                $allData[] = json_decode($json24, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Wstg.%') {
                $json25 = '{"columnName":"Wstg%", "position":' . $i . ',' . '"tableColumnName":"Wstg%"}';
                $allData[] = json_decode($json25, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Category') {
                $json26 = '{"columnName":"Category", "position":' . $i . ',' . '"tableColumnName":"Category"}';
                $allData[] = json_decode($json26, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Dia pc') {
                $json27 = '{"columnName":"Dia pc", "position":' . $i . ',' . '"tableColumnName":"Dia pc"}';
                $allData[] = json_decode($json27, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Stn Pc') {
                $json28 = '{"columnName":"Stn Pc", "position":' . $i . ',' . '"tableColumnName":"Stn Pc"}';
                $allData[] = json_decode($json28, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Stnpc') {
                $json29 = '{"columnName":"Stnpc", "position":' . $i . ',' . '"tableColumnName":"Stnpc"}';
                $allData[] = json_decode($json29, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S/Lbr.%') {
                $json30 = '{"columnName":"S/Lbr.%", "position":' . $i . ',' . '"tableColumnName":"S/Lbr.%"}';
                $allData[] = json_decode($json30, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Lamt') {
                $json31 = '{"columnName":"Lamt", "position":' . $i . ',' . '"tableColumnName":"Lamt"}';
                $allData[] = json_decode($json31, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Rate') {
                $json32 = '{"columnName":"Rate", "position":' . $i . ',' . '"tableColumnName":"Rate"}';
                $allData[] = json_decode($json32, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Other') {
                $json33 = '{"columnName":"Other", "position":' . $i . ',' . '"tableColumnName":"Other"}';
                $allData[] = json_decode($json33, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Dia.Val.') {
                $json34 = '{"columnName":"Dia.Val.", "position":' . $i . ',' . '"tableColumnName":"Dia.Val."}';
                $allData[] = json_decode($json34, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Stn.Val.') {
                $json35 = '{"columnName":"Stn.Val.", "position":' . $i . ',' . '"tableColumnName":"Stn.Val."}';
                $allData[] = json_decode($json35, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S. Met.Value') {
                $json36 = '{"columnName":"S. Met.Value", "position":' . $i . ',' . '"tableColumnName":"S. Met.Value"}';
                $allData[] = json_decode($json36, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S. Lamt') {
                $json37 = '{"columnName":"S. Lamt", "position":' . $i . ',' . '"tableColumnName":"S. Lamt"}';
                $allData[] = json_decode($json37, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S. Dia.Val.') {
                $json38 = '{"columnName":"S. Dia.Val.", "position":' . $i . ',' . '"tableColumnName":"S. Dia.Val."}';
                $allData[] = json_decode($json38, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S. Stn.Val.') {
                $json39 = '{"columnName":"S. Stn.Val.", "position":' . $i . ',' . '"tableColumnName":"S. Stn.Val."}';
                $allData[] = json_decode($json39, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S/Others') {
                $json40 = '{"columnName":"S/Others", "position":' . $i . ',' . '"tableColumnName":"S/Others"}';
                $allData[] = json_decode($json40, true);
            }
            //
            //
                if ($prodDetails[$i] == 'S/M.Rate') {
                $json41 = '{"columnName":"S/M.Rate", "position":' . $i . ',' . '"tableColumnName":"S/M.Rate"}';
                $allData[] = json_decode($json41, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Cur Mrp') {
                $json42 = '{"columnName":"Cur Mrp", "position":' . $i . ',' . '"tableColumnName":"Cur Mrp"}';
                $allData[] = json_decode($json42, true);
            }
            //
            //
                if ($prodDetails[$i] == 'Metal Amt') {
                $json43 = '{"columnName":"Metal Amt", "position":' . $i . ',' . '"tableColumnName":"Metal Amt"}';
                $allData[] = json_decode($json43, true);
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
    if ($rowsCounter > 0) {
        //
        foreach ($json_merge as $headings) {
            //
            //
                // CSV FILE COLUMN HEADINGS (For Reference) - (22 K / 18K / NA) @PRIYANKA-16OCT21
            // CERT	PROD	PUIRTY	PC	
            // G WT	NET WT	GOLD	GOLD + MKG	TOTAL
            // 
            // 
            // CSV FILE COLUMN HEADINGS (For Reference) - (MIX) @PRIYANKA-16OCT21
            // D.WT 1     T DWT	     CS TYPE	  CS VALUE      D RATE 1	D VALUE
            // 
            // 
            //echo("<br/>");
            //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
            //echo("<br/>");
            //
                //
                // PRODUCT NAME @PRIYANKA-16OCT21
            if ($headings['columnName'] == 'Tgno' || $headings['columnName'] == 'Tag.No.') {
                $sttr_item_code = $prodDetails[$headings['position']];
            }
            //
            // STAMP (PURITY/TUNCH) @PRIYANKA-16OCT21
            if ($headings['columnName'] == 'Stamp') {
                $Stamp = $prodDetails[$headings['position']];
            }
            //
            // DATE @SIMRAN-12APR23
            if ($headings['columnName'] == 'Date') {
                $OpDate = $prodDetails[$headings['position']];
            }
            //
            // PC - QTY @PRIYANKA-16OCT21
            if ($headings['columnName'] == 'PC' || $headings['columnName'] == 'Pc') {
                $OpPc = $prodDetails[$headings['position']];
            }
            //
            // GS WEIGHT @PRIYANKA-16OCT21
            if ($headings['columnName'] == 'Gwt' || $headings['columnName'] == 'Gr.Wt.') {
                $OpGrWt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // NET WT @PRIYANKA-16OCT21
            if ($headings['columnName'] == 'Wt' || $headings['columnName'] == 'Net.Wt.') {
                $OpNtWt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
            if ($headings['columnName'] == 'Dia.Wt.' || $headings['columnName'] == 'Dia.Wt. ') {
                $sttr_dia_wt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // 
            if ($headings['columnName'] == 'Stn.Wt.' || $headings['columnName'] == 'Stn.Wt. ') {
                $sttr_stn_wt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // TOTAL @PRIYANKA-16OCT21             
            if ($headings['columnName'] == 'Goldwt') {
                $sttr_gd_wt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // CERT @PRIYANKA-16OCT21    
            if ($headings['columnName'] == 'S/Lbr.Wt.' || $headings['columnName'] == 'S.Lbr Wt') {
                $sttr_lbr_wt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                // D.WT 1     T DWT	     CS TYPE	  CS VALUE      D RATE 1	D VALUE
            //
                //
                if ($headings['columnName'] == 'S/Lbr.Rs.' || $headings['columnName'] == 'S.Lbr Rs') {
                $sttr_lbt_amt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Supplier') {
                $sttr_brand_id = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Other info' || $headings['columnName'] == 'Remarks') {
                $sttr_other_info = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'H/M') {
                $hallMark_present = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Cert.No.') {
                $certificateNo = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Colour') {
                $sttr_color = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Clarity') {
                $sttr_clarity = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Design') {
                $design = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Size') {
                $sttr_size = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Costing') {
                $costing = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'M.R.P.') {
                $Sttr_cust_price = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Item Name') {
                $sttr_item_name = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Tunch') {
                $sttr_purity = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Wstg') {
                $wastage = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Wstg.%') {
                $sttr_wastage = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Category') {
                $sttr_item_category = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Dia pc') {
                $sttr_dia_qty = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Stn pc') {
                $sttr_stn_qty = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'Stnpc') {
                $sttr_stone_qty = $prodDetails[$headings['position']];
            }
            //
            //
                if ($headings['columnName'] == 'S/Lbr.%') {
                $sttr_stone_lbr_percent = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Lamt') {
                $sttr_stn_lbr_amt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Rate') {
                $sttr_metal_rate = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Other') {
                $sttr_other_charges = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Dia.Val.') {
                $sttr_dia_val = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Stn.Val.') {
                $sttr_stn_val = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'S. Met.Value') {
                $sttr_stn_metal_val = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'S. Lamt') {
                $sttr_lbr_amt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'S. Dia.Val.') {
                $sttr_diamond_sell_rate = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'S. Stn.Val.') {
                $sttr_stone_sell_rate = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'S/Others') {
                $sttr_stn_other_chrg = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'S/M.Rate') {
                $sttr_stone_metal_rate = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Cur Mrp') {
                $sttr_purchase_rate = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            //
                if ($headings['columnName'] == 'Metal Amt') {
                $sttr_valuation = decimalVal($prodDetails[$headings['position']], 3);
            }
        }
        //echo 'selFirmId == ' . $selFirmId;
        //echo("<br/>");
        //die;
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
               //echo '$sttr_firm_id == ' . $sttr_firm_id;
            //echo("<br/>");    
            if (is_numeric($sttr_item_name) != 1 && $sttr_item_name != '' && $sttr_item_name != NULL) {
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
                //echo '$sttr_item_name 1== ' . $sttr_item_name . '<br />';
                //
                //
                $sttr_item_name = str_replace('"', '', $sttr_item_name);
                //
                //
                //echo '$sttr_item_name 2== ' . $sttr_item_name . '<br />';
                //
                
                // ITEM CATEGORY @PRIYANKA-16OCT21
                $sttr_item_category = $sttr_item_name;
                //
                // FOR ITEM PRE ID AND ITEM ID @SIMRAN:14APR2023
                preg_match("#([a-zA-Z]+)(\d+)#", $sttr_item_code, $matches);
                $sttr_item_pre_id = $matches[1];
                $sttr_item_id = $matches[2];
                //print_r($matches);
//                echo '$sttr_item_pre_id == ' . $sttr_item_pre_id . '<br />';
//                echo '$sttr_item_id == ' . $sttr_item_id . '<br />';
                //
                 
                 if ($date == '' || $date == NULL){
                     $date = "01 APR " .  date("Y");
                 }else {
                     $date = date('d M Y');
                 }
                $sttr_add_date = strtoupper($date);
                //
                $arrAddDate = explode(' ', $sttr_add_date);
                //
                $day = $arrAddDate[0];
                $month = strtoupper($arrAddDate[1]);
                $year = $arrAddDate[2];
                //             
                //
                 
                     if ($Stamp == 'NA') {
                    $Stamp = '24K';
                }
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
                if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
                    parse_str(getTableValues("SELECT met_rate_value, met_rate_metal_id FROM metal_rates where met_rate_own_id = '$_SESSION[sessionOwnerId]' "
                                           . "and met_rate_metal_name = 'Silver' order by met_rate_ent_dat desc LIMIT 0, 1"));
                } else {
                    parse_str(getTableValues("SELECT met_rate_value, met_rate_metal_id FROM metal_rates where met_rate_own_id = '$_SESSION[sessionOwnerId]' "
                                           . "and met_rate_metal_name = 'Gold' order by met_rate_ent_dat desc LIMIT 0, 1"));
                }
                
                
                // METAL RATE / ID @PRIYANKA-13DEC2021
                $sttr_metal_rate = $met_rate_value;
                $sttr_metal_rate_id = $met_rate_metal_id;
                
                
                // METAL RATE PER GM @PRIYANKA-13DEC2021
                if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
                    $sttr_metal_rate_per_gm = ($sttr_metal_rate / 1000);
                } else {
                    $sttr_metal_rate_per_gm = ($sttr_metal_rate / 10);
                }
                  
                
                
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
                if ($sttr_item_name == 'OLD SILVER') {
                    //
                    // ITEM CATEGORY @PRIYANKA-16OCT21
                    $sttr_item_category = 'OldSilver';
                    //
                    // ITEM NAME @PRIYANKA-16OCT21
                    $sttr_item_name = 'OLD SILVER';
                    //
                    $sttr_transaction_type = 'PURBYSUPP';
                    //
                    $sttr_indicator = 'rawMetal';
                    //
                    $sttr_stock_type = 'retail';
                    //
                    $rawPanelName = 'AddRawStock';
                    //
                    $rawMetalpanel = 'RawMetalPanel';
                    //
                    $sttr_cust_wastg_by = 'custWastgByNetWt';
                    //
                    if ($Stamp == '' || $Stamp == NULL) {
                        $Stamp = '24K';
                    }
                    //
                }
                //
                //
                if ($sttr_item_name == 'OLD GOLD') {
                    //
                    // ITEM CATEGORY @PRIYANKA-16OCT21
                    $sttr_item_category = 'OldGold';
                    //
                    // ITEM NAME @PRIYANKA-16OCT21
                    $sttr_item_name = 'OLD GOLD';
                    //
                    $sttr_transaction_type = 'PURBYSUPP';
                    //
                    $sttr_indicator = 'rawMetal';
                    //
                    $sttr_stock_type = 'retail';
                    //
                    $rawPanelName = 'AddRawStock';
                    //
                    $rawMetalpanel = 'RawMetalPanel';
                    //
                    $sttr_cust_wastg_by = 'custWastgByNetWt';
                    //
                    if ($Stamp == '' || $Stamp == NULL) {

                        $Stamp = '24K';
                    }
                    //
                }
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
                // PURITY/TUNCH @PRIYANKA-16OCT21
                if ($Stamp == '' || $Stamp == NULL) {
                    if ($sttr_metal_type == 'gold' || $sttr_metal_type == 'GOLD' || $sttr_metal_type == 'Gold') {
                        if ($sttr_purity != null && $sttr_purity != '') {
                            $Stamp = $sttr_purity;
                        } else {
                            $Stamp = '24K';
                        }
                    } else {

                        if ($sttr_purity != null && $sttr_purity != '') {
                            $Stamp = $sttr_purity;
                        } else {
                            $Stamp = '24K';
                        }
                    }
                }
                //
                //
                //
                // PURITY/TUNCH @PRIYANKA-16OCT21
//                if ($Stamp != '' && $Stamp != NULL) {
//                    //
//                    //
//                    $arrStamp = explode('K', $Stamp);
//                    $sttr_purity_ct = $arrStamp[0];
//                    //
//                    //
//                    // PURITY/TUNCH @PRIYANKA-16OCT21
//                    $sttr_purity = decimalVal((($sttr_purity_ct / 24) * 100), 2);
//                    //
//                    //
//                    // FINAL PURITY/TUNCH @PRIYANKA-16OCT21
//                    $sttr_final_purity = $sttr_purity;
//                    //
//                    //
//                    // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-16OCT21
//                    $sttr_fine_weight = decimalVal((($sttr_purity * $sttr_nt_weight) / 100), 3);
//                    $sttr_final_fine_weight = decimalVal($sttr_fine_weight, 3);
//                    //
//                //
//                }
                //
                //
                //
                // QUANTITY @PRIYANKA-16OCT21
                if ($OpPc > 0) {
                    $sttr_quantity = $OpPc;
                } else {
                    $sttr_quantity = '';
                }
                //
                //
                // QUANTITY @PRIYANKA-13DEC2021
                if ($sttr_quantity == '' || $sttr_quantity == 0 || $sttr_quantity == NULL) {
                    $sttr_quantity = 1;
                }
                //
                //
                //echo '$OpGrWt == ' . $OpGrWt;
                //echo("<br/>");
                //
                // GS WT / NT WT / PKT WT @PRIYANKA-16OCT21
                if ($OpGrWt > 0) {
                    $sttr_gs_weight = decimalVal($OpGrWt, 3);
                } else {
                    if ($TDWT > 0 && $CSTYPE == 'DIAMOND') {
                        $sttr_gs_weight = decimalVal($TDWT, 3);
                    } else {
                        $sttr_gs_weight = 0;
                    }
                }
                //
                //
                if ($OpNtWt > 0) {
                    $sttr_nt_weight = decimalVal($OpNtWt, 3);
                } else {
                    if ($TDWT > 0 && $CSTYPE == 'DIAMOND') {
                        $sttr_nt_weight = decimalVal($TDWT, 3);
                    } else {
                        $sttr_nt_weight = 0;
                    }
                }
                //
                //
//                if ($sttr_gs_weight != $sttr_nt_weight) {
//                    //
//                    $sttr_pkt_weight = decimalVal(($sttr_gs_weight - $sttr_nt_weight), 3);
//                    //
//                } else {
//                    //
//                    $sttr_pkt_weight = 0;
//                    //
//                }
                //
                //
                // GS WT TYPE @PRIYANKA-16OCT21
                if ($sttr_gs_weight_type == '' || $sttr_gs_weight_type == NULL) {
                    $sttr_gs_weight_type = 'GM';
                }
                //
                //
                //echo '$sttr_gs_weight_type == ' . $sttr_gs_weight_type;
                //echo("<br/>");
                //
                //
                // NT WT TYPE @PRIYANKA-16OCT21
                if ($sttr_nt_weight_type == '' || $sttr_nt_weight_type == NULL) {
                    $sttr_nt_weight_type = 'GM';
                }
                //
                //
                //          
                $sttr_metal_rate_id = strtoupper($sttr_metal_type);
                //
                //
                    //
                //
                if ($sttr_valuation > 0 && $sttr_quantity > 0 && $sttr_gs_weight == 0 && $sttr_nt_weight == 0) {
                    $sttr_gs_weight = $sttr_quantity;
                    $sttr_nt_weight = $sttr_gs_weight;
                    $sttr_pkt_weight = 0;
                }
                //
                //
//                 if ($sttr_metal_type == 'Silver') {
//                //
//                $qSelGoldRate = "SELECT * FROM metal_rates where met_rate_own_id = '$_SESSION[sessionOwnerId]' "
//                              . "and met_rate_metal_name = 'Silver' order by met_rate_ent_dat desc LIMIT 0, 1";
//                //
//            } else {
//                //
//                $qSelGoldRate = "SELECT * FROM metal_rates where met_rate_own_id = '$_SESSION[sessionOwnerId]' "
//                              . "and met_rate_metal_name = 'Gold' order by met_rate_ent_dat desc LIMIT 0, 1";
//                //
//            }
//            //
//            //
//            $resGoldRate = mysqli_query($conn, $qSelGoldRate);
//            //
//            $rowGoldRate = mysqli_fetch_array($resGoldRate, MYSQLI_ASSOC);
//            //
//            $goldRate = $rowGoldRate['met_rate_value'];
//            $goldRatePerWt = $rowGoldRate['met_rate_per_wt'];
//            $goldRatePerWtType = $rowGoldRate['met_rate_per_wt_tp']; 
//            //
//            $goldRate = trim($goldRate);
//            //
//            if ($sttr_metal_rate == '' || $sttr_metal_rate == NULL){
//                $sttr_metal_rate = $goldRate;
//            }
                //                                                     
                // PURITY/TUNCH @PRIYANKA-13DEC2021
//                if ($sttr_purity != '' && $sttr_purity != NULL) {
//                    //
//                    //
//                    if (strpos($sttr_purity, "K") !== false) {
//                        //
//                        //
//                        // PURITY/TUNCH IN CT @PRIYANKA-08APR2022
//                        $sttr_purity_ct = str_replace("K", "", $sttr_purity);
//                        //
//                        //
//                        // PURITY/TUNCH IN % @PRIYANKA-08APR2022
//                        $sttr_purity_in_pre = decimalVal((($sttr_purity_ct * 100) / 24), 2);
//                        //
//                        //
//                        $sttr_purity = decimalVal($sttr_purity_in_pre, 2);
//                        //
//                    //
//                    } else {
//                        //
//                        //
//                        // PURITY/TUNCH IN CT @ PRIYANKA-08APR2022
//                        $sttr_purity_ct = decimalVal((($sttr_purity * 24) / 100), 2);
//                        //
//                        //
//                        // PURITY/TUNCH IN % @ PRIYANKA-08APR2022
//                        $sttr_purity = decimalVal($sttr_purity, 2);
//                        //
//                    //
//                    }
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
                //echo '$sttr_purity_ct == ' . $sttr_purity_ct;
                //echo("<br/>");
                //
                //   
                // WASTAGE @PRIYANKA-13DEC2021                
                if ($sttr_wastage == '' || $sttr_wastage == NULL) {
                    $sttr_wastage = 0;
                }
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
                //
                //    
                // FOR LAB CHARGES @PRIYANKA-08APR2022
                if ($sttr_lab_charges == '' || $sttr_lab_charges == NULL) {
                    $sttr_total_lab_charges = '0.00';
                    $sttr_lab_charges = '0.00';
                    $sttr_lab_charges_type = 'GM';
                    $sttr_total_lab_amt = '0.00';
                }
                if ($sttr_lbr_wt > 0) {
                    $sttr_total_lab_charges = '0.00';
                    $sttr_lab_charges = $sttr_lbr_wt;
                    $sttr_lab_charges_type = 'GM';
                    $sttr_total_lab_amt = '0.00';
                }
                 if ($sttr_lbr_amt > 0) {
                    $sttr_total_lab_charges = $sttr_lbr_amt;
                    $sttr_lab_charges = $sttr_lbr_amt;
                    $sttr_lab_charges_type = 'Fixed';
                    $sttr_total_lab_amt = $sttr_lbr_amt;
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
                    'sttr_barcode' => $sttr_item_code,
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
                    'netWeight' => $sttr_nt_weight, 'sttr_other_info' => $sttr_other_info,
                    'sttr_purity' => $sttr_purity, 'sttr_purity_ct' => $Stamp,
                    'sttr_wastage' => $sttr_wastage, 'sttr_final_purity' => $sttr_final_purity,
                    'sttr_cust_wastage' => $sttr_cust_wastage, 'sttr_cust_wastage_wt' => $sttr_cust_wastage_wt,
                    'sttr_fine_weight' => $sttr_fine_weight, 'sttr_final_fine_weight' => $sttr_final_fine_weight, 'sttr_other_charges' => $sttr_other_charges,
                    'sttr_final_valuation_by' => $sttr_final_valuation_by, 'sttr_final_val_by' => $sttr_final_val_by,
                    'sttr_other_charges_by' => $sttr_other_charges_by, 'sttr_mkg_charges_by' => $sttr_mkg_charges_by,
                    'sttr_final_fine_wt_by' => $sttr_final_fine_wt_by,
                    'sttr_cust_wastg_by' => $sttr_cust_wastg_by, 'sttr_cust_price' => $Sttr_cust_price,
                    'sttr_total_lab_charges' => $sttr_total_lab_charges,
                    'sttr_lab_charges' => $sttr_lab_charges, 'sttr_lab_charges_type' => $sttr_lab_charges_type,
                    'sttr_total_lab_amt' => $sttr_total_lab_amt,
                    'sttr_making_charges' => $sttr_making_charges,
                    'sttr_making_charges_type' => $sttr_making_charges_type,
                    'sttr_other_charges' => $sttr_other_charges, 'sttr_other_charges_type' => $sttr_other_charges_type,
                    'sttr_total_other_charges' => $sttr_total_other_charges,
                    'sttr_metal_amt' => $sttr_metal_amt, 'sttr_valuation' => $sttr_valuation, 'sttr_brand_id' => $sttr_brand_id,
                    'sttr_stone_wt' => $sttr_stone_wt, 'sttr_color' => $sttr_color, 'sttr_clarity' => $sttr_clarity,
                    'sttr_stone_wt_type' => $sttr_stone_wt_type, 'sttr_stone_valuation' => $sttr_stone_valuation, 'sttr_size' => $sttr_size,
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
                $st_purity = decimalVal($st_purity, 2);
                $st_final_purity = decimalVal($st_final_purity, 2);
                //
                //
//                echo '<pre>';
//                print_r($info);
//                echo '</pre>';
                //echo '$st_final_purity == ' . $st_final_purity . '<br />';
//                echo '$sttr_purity == ' . $sttr_purity . '<br />';
//                echo '$sttr_gs_weight == ' . $sttr_gs_weight . '<br />';
                //
                //
                // STOCK TYPE IS MANDATORY @PRIYANKA-13DEC2021
                if ($sttr_purity && $sttr_gs_weight > 0) {
                    //
                    //
                //    if ($st_firm_id == $sttr_firm_id) {
                    //
                        //
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
                        if ($numOfRows == 0) {
                        //
                        //
                        // FOR ADD TAG STOCK @PRIYANKA-13DEC2021
                        $sttrId = stock_transaction('insert', $_REQUEST);
                        // 
                        //echo '$sttrId=='.$sttrId;
                        //
                        parse_str(getTableValues("SELECT sttr_barcode_prefix, sttr_barcode,  "
                                . "sttr_clarity AS sttr_clarity_stone, sttr_color AS sttr_color_stone, "
                                . "sttr_certificate_no AS sttr_certificate_no_stone, "
                                . "sttr_size AS sttr_size_stone "
                                . "FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' "
                                . "AND sttr_id = '$sttrId' AND sttr_indicator = 'stock' "
                                . "AND sttr_status NOT IN ('DELETED') ORDER BY sttr_id DESC LIMIT 0,1"));
                        //
                        //
                        $updateSttrIdQuery = "UPDATE stock_transaction SET sttr_sttrin_id = '$sttrId', "
                                           . "sttr_clarity = '', sttr_color = '', sttr_certificate_no = '', "
                                           . "sttr_size = '' "
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
                        if ($sttr_dia_qty > 0) {
                            $sttr_diamond_quantity = $sttr_dia_qty;
                        } 
                        
                        if ($sttr_stn_qty > 0) {
                            $sttr_stn_quantity = $sttr_stn_qty;
                        } 
                        
                        if ($sttr_stone_qty > 0){
                            $sttr_stn_quantity = $sttr_stone_qty;
                        }
                        //                                                                                                                                                                                          
                        //FOR DIAMOND/CRYSTAL WEIGHT @SIMRAN: 14APR2023 
                        if ($sttr_dia_wt > 0) {
                            $sttr_diamond_weight = $sttr_dia_wt;
                            $cryCounter =1;
                        }
                        
                        if ($sttr_stn_wt > 0) {
                            $sttr_stone_weight = $sttr_stn_wt;
                            $cryCounter =1;
                        } 
                        
                        if ($sttr_dia_wt > 0 && $sttr_stn_wt > 0) {
                            $cryCounter = 2;
                        }
                        
                        //
                        //FOR DIAMOND/CRYSTAL SELL RATE @SIMRAN: 14APR2023 
                        if ($sttr_diamond_sell_rate > 0) {
                            $sttr_sell_rate = $sttr_diamond_sell_rate;
                        } 
                        
                        if ($sttr_stone_sell_rate > 0) {
                            $sttr_sell_rate = $sttr_stone_sell_rate;
                        } 
                        //
                        //
                        // [sttr_indicator1] => stockCrystal [sttr_item_category1] => DD [sttr_item_name1] => DDD 
                        // [sttr_clarity1] => [sttr_color1] => [sttr_certificate_no1] =>
                        // [sttr_size1] => [sttr_shape1] => [sttr_other_info1] => [sttr_quantity1] => 1 
                        // [sttr_gs_weight1] => 2 [sttr_gs_weight_type1] => CT [sttr_wt_auto_less1] => off 
                        // [sttr_purchase_rate1] => 100 [sttr_purchase_rate_type1] => CT 
                        // [sttr_sell_rate1] => 200 [sttr_sell_rate_type1] => CT 
                        // [sttr_valuation1] => 200.00 
                        // [sttr_final_valuation1] => 200.00 
                        // 
                        // [del2] => 2 [sttr_indicator2] => stockCrystal [tableMainId2] => [itstCryId2] => 
                        // [crystalDiv2] => [sttr_image_id2] => [sttr_item_category2] => SS 
                        // [sttr_item_name2] => SS [sttr_clarity2] => [sttr_color2] => 
                        // [sttr_certificate_no2] => [sttr_laboratory2] => [sttr_size2] => 
                        // [sttr_shape2] => [sttr_other_info2] => [sttr_quantity2] => 1 
                        // [sttr_gs_weight2] => 4 [sttr_gs_weight_type2] => CT 
                        // [sttr_wt_auto_less2] => off [sttr_purchase_rate2] => 500 
                        // [sttr_purchase_rate_type2] => CT [sttr_sell_rate2] => 600 
                        // [sttr_sell_rate_type2] => CT [sttr_valuation2] => 2000.00 
                        // [sttr_tot_price_cgst_per2] => 0 
                        // [sttr_tot_price_cgst_chrg2] => 0.00 
                        // [sttr_tot_price_sgst_per2] => 0 
                        // [sttr_tot_price_sgst_chrg2] => 0.00 
                        // [sttr_tot_price_igst_per2] => 0 
                        // [sttr_tot_price_igst_chrg2] => 0.00 
                        // [sttr_tot_tax2] => 0.00 [sttr_final_valuation2] => 2000.0
                        //
                        //

                    if ($sttr_dia_wt > 0) {
                        
                        $info1 = array('sttr_indicator1' => 'stockCrystal','sttr_item_category1' => 'Diamond',
                          'sttr_barcode1' => $sttr_barcode, 'sttr_barcode_prefix1' => $sttr_barcode_prefix,
                          'sttr_item_pre_id1' => $sttr_item_pre_id, 'sttr_item_id1' => $sttr_item_id,
                          'sttr_stock_type1' => $sttr_stock_type,  
                          'sttr_item_name1' => 'Diamond', 'sttr_clarity1' => $sttr_clarity_stone, 
                          'sttr_color1' => $sttr_color_stone,
                          'sttr_certificate_no1' => $sttr_certificate_no_stone, 
                          'sttr_size1' => $sttr_size_stone, 'sttr_quantity1' => $sttr_diamond_quantity, 
                          'sttr_gs_weight1' =>  $sttr_dia_wt, 
                          'sttr_gs_weight_type1' => $sttr_gs_weight_type, 'sttr_wt_auto_less1' => 'off', 
                          'sttr_sell_rate1' => $sttr_sell_rate, 'sttr_valuation1' => $sttr_valuation);
                      
                        $_REQUEST = array_merge($_REQUEST, $info1);
                    }
                 

                    if ($sttr_stn_wt > 0) {
                       
                        $info2 = array('sttr_indicator2' => 'stockCrystal','sttr_item_category2' => 'Stone',
                          'sttr_barcode2' => $sttr_barcode, 'sttr_barcode_prefix2' => $sttr_barcode_prefix,
                          'sttr_item_pre_id2' => $sttr_item_pre_id, 'sttr_item_id2' => $sttr_item_id,
                          'sttr_stock_type2' => $sttr_stock_type,
                          'sttr_item_name2' => 'Stone', 'sttr_clarity2' => $sttr_clarity_stone, 
                          'sttr_color2' => $sttr_color_stone, 
                          '$sttr_certificate_no2' => $sttr_certificate_no_stone, 
                          'sttr_size2' => $sttr_size_stone, 'sttr_quantity2' => $sttr_stn_quantity, 
                          'sttr_gs_weight2' =>  $sttr_stn_wt, 
                          'sttr_gs_weight_type2' => $sttr_gs_weight_type, 'sttr_wt_auto_less2' => 'off', 
                          'sttr_sell_rate2' => $sttr_sell_rate, 'sttr_valuation2' => $sttr_valuation);
                      
                       $_REQUEST = array_merge($_REQUEST, $info2);
                    }
                
                
                    $addItemCryCount = array('addItemCryCount' => $cryCounter);

                    $_REQUEST = array_merge($_REQUEST, $addItemCryCount);
                        
                    if ($cryCounter > 0) {
                            for ($j = 1; $j <= $cryCounter; $j++) {
                                stock_transaction('insert', $_REQUEST, $sttrId, $j);
                            }
                        }
                    }
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
    $CSTYPE = NULL;
    $rawPanelName = NULL;
    $rawMetalpanel = NULL;
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
    header('Location: ' . $documentRoot . '/include/php/ogfinepop.php?invPanel=AddByInv&utransInvId=' . $sttr_st_id . '&mainEntryId=' . $sttr_st_id . '&stockType=retailStock&divSubPanel=DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/include/php/ogfinepop.php?invPanel=AddByInv&utransInvId=' . $sttr_st_id . '&mainEntryId=' . $sttr_st_id . '&stockType=retailStock&divSubPanel=DataImportedSuccessfully');
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    exit;
}
?>