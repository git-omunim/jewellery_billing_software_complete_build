<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for Sell List @PRIYANKA-21SEP21
 * **********************************************************************************************************************************
 *
 * Created on 21 SEP, 2021 04.22.00 PM
 * 
 * @FileName: omSellListImportFile.php
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
 *  AUTHOR: @PRIYANKA-21SEP21
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
    //if not selected assign session firm  @PRIYANKA-22SEP21
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
// Start Code to Import Data From CSV File to Mysql Database for Sell List @PRIYANKA-22SEP21
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name @PRIYANKA-22SEP21
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
        // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-22SEP21
        // Date	Type	Refno	Party Name	Item Name	
        // Stamp	HUID	Tag.No.	
        // Pc	Gr.Wt.	Rate	
        // Stn.Val.	Total	Item Name	
        // Batch	Design	Taxable Val.	GSTIN	
        // Tax	IGST	CGST	SGST	Stn.Pc	Gold Std.	
        // Wstg.%	Add.Wt.	Tunch	Wstg	Less	Lbr.	Dia.Pc	
        // Gold Gr.Wt.	Sil. Gr.Wt.	Sil. Net.Wt.	Net.Wt.	
        // Gold Met.Value	Sil. Met.Value	Actual Wt.	
        // Lnarr	Dia.Rate	
        // Sundry1	Sundry2	Sundry3	Sundry4	Sundry5	
        // op1	op2	op3	op4	Order No	
        // Costtotal	Series	Mobile	Address	Lamt	
        // Stn.Wt.	Dia.Val.	Dia.Wt.	Met.Value	Net.Wt.
        //
        //
        //$prodDetails[] = json_decode($json1,true);
        //$prodDetails[] = json_decode($json2,true);
        //$json_merge = json_encode($prodDetails);
        //
        //
        for ($i = 0; $i < $columnCounter; $i++) {
            //
            //echo '$i == ' . $i. '<br />';
            //echo '$prodDetails == ' . $prodDetails[$i] . '<br />';
            //
            if ($prodDetails[$i] == 'Date') {
                $json1 = '{"columnName":"Date", "position":' . $i . ',' . '"tableColumnName":"sttr_add_date"}';
                $allData[] = json_decode($json1, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Type') {
                $json2 = '{"columnName":"Type", "position":' . $i . ',' . '"tableColumnName":"Type"}';
                $allData[] = json_decode($json2, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Refno') {
                $json3 = '{"columnName":"Refno", "position":' . $i . ',' . '"tableColumnName":"sttr_pre_invoice_no"}';
                $allData[] = json_decode($json3, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Party Name') {
                $json4 = '{"columnName":"Party Name", "position":' . $i . ',' . '"tableColumnName":"sttr_user_id"}';
                $allData[] = json_decode($json4, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Item Name') {
                $json5 = '{"columnName":"Item Name", "position":' . $i . ',' . '"tableColumnName":"sttr_item_name"}';
                $allData[] = json_decode($json5, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Stamp') {
                $json6 = '{"columnName":"Stamp", "position":' . $i . ',' . '"tableColumnName":"sttr_purity"}';
                $allData[] = json_decode($json6, true);
            }
            //
            //
            if ($prodDetails[$i] == 'HUID') {
                $json7 = '{"columnName":"HUID", "position":' . $i . ',' . '"tableColumnName":"sttr_hallmark_uid"}';
                $allData[] = json_decode($json7, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Tag.No.') {
                $json8 = '{"columnName":"Tag.No.", "position":' . $i . ',' . '"tableColumnName":"sttr_barcode"}';
                $allData[] = json_decode($json8, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Pc') {
                $json9 = '{"columnName":"Pc", "position":' . $i . ',' . '"tableColumnName":"sttr_quantity"}';
                $allData[] = json_decode($json9, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Gr.Wt.') {
                $json10 = '{"columnName":"Gr.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_gs_weight"}';
                $allData[] = json_decode($json10, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Net.Wt.') {
                $json36 = '{"columnName":"Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_nt_weight"}';
                $allData[] = json_decode($json36, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Rate') {
                $json11 = '{"columnName":"Rate", "position":' . $i . ',' . '"tableColumnName":"sttr_metal_rate"}';
                $allData[] = json_decode($json11, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Stn.Val.') {
            //    $json12 = '{"columnName":"Stn.Val.", "position":' . $i . ',' . '"tableColumnName":"Stn.Val."}';
            //    $allData[] = json_decode($json12,true);
            //}
            //
            //
            //if ($prodDetails[$i] == 'Total') {
            //    $json13 = '{"columnName":"Total", "position":' . $i . ',' . '"tableColumnName":"sttr_final_taxable_amt"}';
            //    $allData[] = json_decode($json13,true);
            //}
            //
            //
            //if ($prodDetails[$i] == 'Item Name') {
            //    $json14 = '{"columnName":"Item Name", "position":' . $i . ',' . '"tableColumnName":"sttr_item_name"}';
            //    $allData[] = json_decode($json14,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Batch') {
                $json15 = '{"columnName":"Batch", "position":' . $i . ',' . '"tableColumnName":"sttr_other_info"}';
                $allData[] = json_decode($json15, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Design') {
                $json16 = '{"columnName":"Design", "position":' . $i . ',' . '"tableColumnName":"sttr_item_other_info"}';
                $allData[] = json_decode($json16, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Taxable Val.') {
            //    $json17 = '{"columnName":"Taxable Val.", "position":' . $i . ',' . '"tableColumnName":"sttr_final_valuation"}';
            //    $allData[] = json_decode($json17,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'GSTIN') {
                $json18 = '{"columnName":"GSTIN", "position":' . $i . ',' . '"tableColumnName":"GSTIN"}';
                $allData[] = json_decode($json18, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Tax') {
            //    $json19 = '{"columnName":"Tax", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_tax"}';
            //    $allData[] = json_decode($json19,true);
            //}
            //
            //
            //if ($prodDetails[$i] == 'IGST') {
            //    $json20 = '{"columnName":"IGST", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_price_igst_chrg"}';
            //    $allData[] = json_decode($json20,true);
            //}
            //
            //
            //if ($prodDetails[$i] == 'CGST') {
            //    $json21 = '{"columnName":"CGST", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_price_cgst_chrg"}';
            //    $allData[] = json_decode($json21,true);
            //}
            //
            //
            //if ($prodDetails[$i] == 'SGST') {
            //    $json22 = '{"columnName":"SGST", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_price_sgst_chrg"}';
            //    $allData[] = json_decode($json22,true);
            //}
            //
            //
            //if ($prodDetails[$i] == 'Stn.Pc') {
            //    $json23 = '{"columnName":"Stn.Pc", "position":' . $i . ',' . '"tableColumnName":"Stn.Pc"}';
            //    $allData[] = json_decode($json23,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Gold Std.') {
                $json24 = '{"columnName":"Gold Std.", "position":' . $i . ',' . '"tableColumnName":"Gold Std."}';
                $allData[] = json_decode($json24, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Wstg.%') {
                $json25 = '{"columnName":"Wstg.%", "position":' . $i . ',' . '"tableColumnName":"sttr_wastage"}';
                $allData[] = json_decode($json25, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Wstg.%') {
            //    $json26 = '{"columnName":"Wstg.%", "position":' . $i . ',' . '"tableColumnName":"sttr_wastage"}';
            //    $allData[] = json_decode($json26,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Add.Wt.') {
                $json27 = '{"columnName":"Add.Wt.", "position":' . $i . ',' . '"tableColumnName":"Add.Wt."}';
                $allData[] = json_decode($json27, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Tunch') {
                $json28 = '{"columnName":"Tunch", "position":' . $i . ',' . '"tableColumnName":"sttr_purity"}';
                $allData[] = json_decode($json28, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Wstg') {
                $json29 = '{"columnName":"Wstg", "position":' . $i . ',' . '"tableColumnName":"Wstg"}';
                $allData[] = json_decode($json29, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Less') {
                $json30 = '{"columnName":"Less", "position":' . $i . ',' . '"tableColumnName":"Less"}';
                $allData[] = json_decode($json30, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Lbr.') {
                $json31 = '{"columnName":"Lbr.", "position":' . $i . ',' . '"tableColumnName":"Lbr."}';
                $allData[] = json_decode($json31, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Dia.Pc') {
            //    $json32 = '{"columnName":"Dia.Pc", "position":' . $i . ',' . '"tableColumnName":"Dia.Pc"}';
            //    $allData[] = json_decode($json32,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Gold Gr.Wt.') {
                $json33 = '{"columnName":"Gold Gr.Wt.", "position":' . $i . ',' . '"tableColumnName":"Gold Gr.Wt."}';
                $allData[] = json_decode($json33, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sil. Gr.Wt.') {
                $json34 = '{"columnName":"Sil. Gr.Wt.", "position":' . $i . ',' . '"tableColumnName":"Sil. Gr.Wt."}';
                $allData[] = json_decode($json34, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sil. Net.Wt.') {
                $json35 = '{"columnName":"Sil. Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"Sil. Net.Wt."}';
                $allData[] = json_decode($json35, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Net.Wt.') {
            //    $json36 = '{"columnName":"Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_nt_weight"}';
            //    $allData[] = json_decode($json36,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Gold Met.Value') {
                $json37 = '{"columnName":"Gold Met.Value", "position":' . $i . ',' . '"tableColumnName":"Gold Met.Value"}';
                $allData[] = json_decode($json37, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sil. Met.Value') {
                $json38 = '{"columnName":"Sil. Met.Value", "position":' . $i . ',' . '"tableColumnName":"Sil. Met.Value"}';
                $allData[] = json_decode($json38, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Actual Wt.') {
                $json39 = '{"columnName":"Actual Wt.", "position":' . $i . ',' . '"tableColumnName":"Actual Wt."}';
                $allData[] = json_decode($json39, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Lnarr') {
                $json40 = '{"columnName":"Lnarr", "position":' . $i . ',' . '"tableColumnName":"Lnarr"}';
                $allData[] = json_decode($json40, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Dia.Rate') {
            //    $json41 = '{"columnName":"Dia.Rate", "position":' . $i . ',' . '"tableColumnName":"Dia.Rate"}';
            //    $allData[] = json_decode($json41,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Sundry1') {
                $json42 = '{"columnName":"Sundry1", "position":' . $i . ',' . '"tableColumnName":"Sundry1"}';
                $allData[] = json_decode($json42, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sundry2') {
                $json43 = '{"columnName":"Sundry2", "position":' . $i . ',' . '"tableColumnName":"Sundry2"}';
                $allData[] = json_decode($json43, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sundry3') {
                $json44 = '{"columnName":"Sundry3", "position":' . $i . ',' . '"tableColumnName":"Sundry3"}';
                $allData[] = json_decode($json44, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sundry4') {
                $json45 = '{"columnName":"Sundry4", "position":' . $i . ',' . '"tableColumnName":"Sundry4"}';
                $allData[] = json_decode($json45, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Sundry5') {
                $json46 = '{"columnName":"Sundry5", "position":' . $i . ',' . '"tableColumnName":"Sundry5"}';
                $allData[] = json_decode($json46, true);
            }
            //
            //
            if ($prodDetails[$i] == 'op1') {
                $json47 = '{"columnName":"op1", "position":' . $i . ',' . '"tableColumnName":"op1"}';
                $allData[] = json_decode($json47, true);
            }
            //
            //
            if ($prodDetails[$i] == 'op2') {
                $json48 = '{"columnName":"op2", "position":' . $i . ',' . '"tableColumnName":"op2"}';
                $allData[] = json_decode($json48, true);
            }
            //
            //
            if ($prodDetails[$i] == 'op3') {
                $json49 = '{"columnName":"op3", "position":' . $i . ',' . '"tableColumnName":"op3"}';
                $allData[] = json_decode($json49, true);
            }
            //
            //
            if ($prodDetails[$i] == 'op4') {
                $json50 = '{"columnName":"op4", "position":' . $i . ',' . '"tableColumnName":"op4"}';
                $allData[] = json_decode($json50, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Order No') {
                $json51 = '{"columnName":"Order No", "position":' . $i . ',' . '"tableColumnName":"Order No"}';
                $allData[] = json_decode($json51, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Costtotal') {
                $json52 = '{"columnName":"Costtotal", "position":' . $i . ',' . '"tableColumnName":"Costtotal"}';
                $allData[] = json_decode($json52, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Series') {
                $json53 = '{"columnName":"Series", "position":' . $i . ',' . '"tableColumnName":"Series"}';
                $allData[] = json_decode($json53, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Mobile') {
                $json54 = '{"columnName":"Mobile", "position":' . $i . ',' . '"tableColumnName":"Mobile"}';
                $allData[] = json_decode($json54, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Address') {
                $json55 = '{"columnName":"Address", "position":' . $i . ',' . '"tableColumnName":"Address"}';
                $allData[] = json_decode($json55, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Lamt') {
            //    $json56 = '{"columnName":"Lamt", "position":' . $i . ',' . '"tableColumnName":"sttr_total_making_charges"}';
            //    $allData[] = json_decode($json56,true);
            //}
            //
            //
            if ($prodDetails[$i] == 'Stn.Pc') {
                $json23 = '{"columnName":"Stn.Pc", "position":' . $i . ',' . '"tableColumnName":"Stn.Pc"}';
                $allData[] = json_decode($json23, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Stn.Wt.') {
                $json57 = '{"columnName":"Stn.Wt.", "position":' . $i . ',' . '"tableColumnName":"Stn.Wt."}';
                $allData[] = json_decode($json57, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Stn.Val.') {
                $json12 = '{"columnName":"Stn.Val.", "position":' . $i . ',' . '"tableColumnName":"Stn.Val."}';
                $allData[] = json_decode($json12, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Dia.Rate') {
                $json41 = '{"columnName":"Dia.Rate", "position":' . $i . ',' . '"tableColumnName":"Dia.Rate"}';
                $allData[] = json_decode($json41, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Dia.Pc') {
                $json32 = '{"columnName":"Dia.Pc", "position":' . $i . ',' . '"tableColumnName":"Dia.Pc"}';
                $allData[] = json_decode($json32, true);
            }
            //
            //               
            if ($prodDetails[$i] == 'Dia.Wt.') {
                $json59 = '{"columnName":"Dia.Wt.", "position":' . $i . ',' . '"tableColumnName":"Dia.Wt."}';
                $allData[] = json_decode($json59, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Dia.Val.') {
                $json58 = '{"columnName":"Dia.Val.", "position":' . $i . ',' . '"tableColumnName":"Dia.Val."}';
                $allData[] = json_decode($json58, true);
            }
            //
            //               
            //if ($prodDetails[$i] == 'Dia.Wt.') {
            //    $json59 = '{"columnName":"Dia.Wt.", "position":' . $i . ',' . '"tableColumnName":"Dia.Wt."}';
            //    $allData[] = json_decode($json59,true);
            //}                
            //
            //
            if ($prodDetails[$i] == 'Met.Value') {
                $json60 = '{"columnName":"Met.Value", "position":' . $i . ',' . '"tableColumnName":"sttr_valuation"}';
                $allData[] = json_decode($json60, true);
            }
            //
            //
            //if ($prodDetails[$i] == 'Net.Wt.') {
            //    $json61 = '{"columnName":"Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"sttr_nt_weight"}';
            //    $allData[] = json_decode($json61,true);
            //}
            //
            // 
            if ($prodDetails[$i] == 'Lamt') {
                $json56 = '{"columnName":"Lamt", "position":' . $i . ',' . '"tableColumnName":"sttr_total_making_charges"}';
                $allData[] = json_decode($json56, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Total') {
                $json13 = '{"columnName":"Total", "position":' . $i . ',' . '"tableColumnName":"sttr_final_taxable_amt"}';
                $allData[] = json_decode($json13, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Tax') {
                $json19 = '{"columnName":"Tax", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_tax"}';
                $allData[] = json_decode($json19, true);
            }
            //
            //
            if ($prodDetails[$i] == 'IGST') {
                $json20 = '{"columnName":"IGST", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_price_igst_chrg"}';
                $allData[] = json_decode($json20, true);
            }
            //
            //
            if ($prodDetails[$i] == 'CGST') {
                $json21 = '{"columnName":"CGST", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_price_cgst_chrg"}';
                $allData[] = json_decode($json21, true);
            }
            //
            //
            if ($prodDetails[$i] == 'SGST') {
                $json22 = '{"columnName":"SGST", "position":' . $i . ',' . '"tableColumnName":"sttr_tot_price_sgst_chrg"}';
                $allData[] = json_decode($json22, true);
            }
            //
            //
            if ($prodDetails[$i] == 'Taxable Val.') {
                $json17 = '{"columnName":"Taxable Val.", "position":' . $i . ',' . '"tableColumnName":"sttr_final_valuation"}';
                $allData[] = json_decode($json17, true);
            }
            //
            //
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
    //
    $diamondSubEntry = NULL;
    $stoneSubEntry = NULL;
    //
    if ($rowsCounter > 0) {
        //
        //
        foreach ($json_merge as $headings) {
            //
            //
            // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-22SEP21
            // Date	Type	Refno	Party Name	Item Name	
            // Stamp	HUID	Tag.No.	
            // Pc	Gr.Wt.	Rate	
            // Stn.Val.	Total	Item Name	
            // Batch	Design	Taxable Val.	GSTIN	
            // Tax	IGST	CGST	SGST	Stn.Pc	Gold Std.	
            // Wstg.%	Add.Wt.	Tunch	Wstg	Less	Lbr.	Dia.Pc	
            // Gold Gr.Wt.	Sil. Gr.Wt.	Sil. Net.Wt.	Net.Wt.	
            // Gold Met.Value	Sil. Met.Value	Actual Wt.	
            // Lnarr	Dia.Rate	
            // Sundry1	Sundry2	Sundry3	Sundry4	Sundry5	
            // op1	op2	op3	op4	Order No	
            // Costtotal	Series	Mobile	Address	Lamt	
            // Stn.Wt.	Dia.Val.	Dia.Wt.	Met.Value	Net.Wt.
            // 
            //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
            //echo("<br/>");
            //
            // DATE @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Date') {
                $date = $prodDetails[$headings['position']];
            }
            //
            // TYPE (TO IDENTIFY PURCHASE ENTRIES) @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Type') {
                $Type = $prodDetails[$headings['position']];
            }
            //
            // REF NO. @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Refno') {
                $invoiceNo = $prodDetails[$headings['position']];
            }
            //
            // PARTY NAME (USER NAME) @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Party Name') {
                $partyName = $prodDetails[$headings['position']];
            }
            //
            //
            if ($headings['columnName'] == 'Lnarr') {
                $sttr_user_billing_name = $prodDetails[$headings['position']];
            }
            //
            // ITEM NAME @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Item Name') {
                $sttr_item_name = $prodDetails[$headings['position']];
            }
            //
            // STAMP (PURITY/TUNCH) @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Stamp') {
                $stamp = $prodDetails[$headings['position']];
            }
            //
            // WASTAGE @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Wstg') {
                $sttr_wastage = $prodDetails[$headings['position']];
            }
            //
            // TUNCH @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Tunch') {
                $Tunch = $prodDetails[$headings['position']];
            }
            //
            // WASTAGE % @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Wstg.%') {
                $WstgPer = $prodDetails[$headings['position']];
            }
            //
            // ADD WT @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Add.Wt.') {
                $AddWt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // TAG NO @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Tag.No.') {
                $TagNo = $prodDetails[$headings['position']];
            }
            //
            // PC (QUANTITY) @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Pc') {
                $sttr_quantity = $prodDetails[$headings['position']];
//                echo("<br/>");
//                echo '  $sttr_hallmark_uid == ' . $sttr_hallmark_uid;
                //
                if ($sttr_quantity < 0)
                    $sttr_quantity = 1;
                if ($sttr_hallmark_uid != '') {
                    $sttr_hallmark_charges = 45;
                    $sttr_hallmark_charges_type = 'PP';
                    $sttr_total_hallmark_charges = (int) $sttr_quantity * (int) $sttr_hallmark_charges;
                }
//                echo '  $sttr_quantity4 == ' . $sttr_quantity;
//                echo '  $sttr_total_hallmark_charges == ' . $sttr_total_hallmark_charges;
            }
            //echo("<br/>");
            //echo '  $sttr_quantity0 == ' . $sttr_quantity;
            //
            // GR.WT. (GROSS WEIGHT) @PRIYANKA-22SEP21             
            if ($headings['columnName'] == 'Gr.Wt.') {
                $sttr_gs_weight = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // NET.WT. (NET WEIGHT) @PRIYANKA-22SEP21    
            if ($headings['columnName'] == 'Net.Wt.') {
                $sttr_nt_weight = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // GOLD GR.WT. (GOLD GROSS WEIGHT) @PRIYANKA-22SEP21             
            if ($headings['columnName'] == 'Gold Gr.Wt.') {
                $sttr_gs_weight_gold = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // SILVER GR.WT. (SILVER GROSS WEIGHT) @PRIYANKA-22SEP21             
            if ($headings['columnName'] == 'Sil. Gr.Wt.') {
                $sttr_gs_weight_silver = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // LESS @PRIYANKA-22SEP21             
            if ($headings['columnName'] == 'Less') {
                $sttr_pkt_weight = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // HUID @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'HUID') {
                //
                $sttr_hallmark_uid = $prodDetails[$headings['position']];
                //
            }
            //
            // GOLD MET VALUE (GOLD METAL VALUATION) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Gold Met.Value') {
                $GoldMetValue = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // SILVER MET VALUE (SILVER METAL VALUATION) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Sil. Met.Value') {
                $SilMetValue = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // RATE @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Rate') {
                $sttr_metal_rate = $prodDetails[$headings['position']];
            }
            //
            // MET VALUE (METAL VALUATION) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Met.Value') {
                $sttr_valuation = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // DIA. PC (DIAMOND QTY) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Dia.Pc') {
                $diamondPc = $prodDetails[$headings['position']];
            }
            //
            // DIA. WT (DIAMOND WEIGHT) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Dia.Wt.') {
                $diamondWt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // DIA. VAL (DIAMOND VALUATION) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Dia.Val.') {
                $diamondVal = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // STN. PC (STONE QTY) @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Stn.Pc') {
                $stonePc = $prodDetails[$headings['position']];
            }
            //
            // STN. WT (STONE WEIGHT) @PRIYANKA-22SEP21
            if ($headings['columnName'] == 'Stn.Wt.') {
                $stoneWt = decimalVal($prodDetails[$headings['position']], 3);
            }
            //
            // STN. VAL (STONE VALUATION) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Stn.Val.') {
                $stoneVal = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // LAMT (TOTAL MKG CHARGES) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Lamt') {
                $sttr_total_making_charges = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // TOTAL (METAL VALUATION + TOTAL MKG CHARGES = TOTAL AMOUNT) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Total') {
                $sttr_final_taxable_amt = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // CGST AMOUNT @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'CGST') {
                $sttr_tot_price_cgst_chrg = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // SGST AMOUNT @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'SGST') {
                $sttr_tot_price_sgst_chrg = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // IGST AMOUNT @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'IGST') {
                $sttr_tot_price_igst_chrg = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // TAX (TOTAL TAX AMOUNT) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Tax') {
                $sttr_tot_tax = decimalVal($prodDetails[$headings['position']], 2);
            }
            //
            // TAXABLE VAL (TOTAL AMOUNT + TOTAL TAX AMOUNT = FINAL AMOUNT) @PRIYANKA-22SEP21 
            if ($headings['columnName'] == 'Taxable Val.') {
                $sttr_final_valuation = decimalVal($prodDetails[$headings['position']], 2);
            }
        }
        //
        //
        //echo 'selFirmId == ' . $selFirmId;
        //echo("<br/>");
        //die;
        //
        //
        // FIRM ID @PRIYANKA-22SEP21
        $sttr_firm_id = $selFirmId;
        //
        //echo 'sttr_firm_id == ' . $sttr_firm_id;
        //echo("<br/>");
        //
        // FOR FIRM MANDATORY @PRIYANKA-22SEP21
        if ($sttr_firm_id != '' && $sttr_firm_id != NULL) {
            // 
            // 
            //echo 'Type == ' . $Type;
            //echo("<br/>");
            //
            // ONLY FOR SELL ENTRIES @PRIYANKA-22SEP21
            if ($Type == 'S') {
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
                //echo '$sttr_item_name 1== ' . $sttr_item_name . '<br />';
                //
                //
                $sttr_item_name = str_replace('"', '', $sttr_item_name);
                //
                //
                //echo '$sttr_item_name 2== ' . $sttr_item_name . '<br />';
                //
                //     
                // ITEM NAME @PRIYANKA-22SEP21
                $sttr_item_name = strtoupper($sttr_item_name);
                //
                //
                // ITEM CATEGORY @PRIYANKA-22SEP21
                $sttr_item_category = $sttr_item_name;
                //   
                //
                //
                // ITEM PRE ID AND ITEM CODE @PRIYANKA-22SEP21
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
                // ITEM PRE ID AND ITEM CODE @PRIYANKA-22SEP21
                $sttr_item_pre_id = strtoupper($productCode);
                $sttr_item_code = strtoupper($productCode);
                //
                //echo '$sttr_item_pre_id == ' . $sttr_item_pre_id;
                //echo("<br/>");
                //echo '$sttr_item_code == ' . $sttr_item_code;
                //echo("<br/>");
                //
                //
                // HUID @PRIYANKA-22SEP21
                if ($sttr_hallmark_uid == '' || $sttr_hallmark_uid == NULL) {
                    $sttr_hallmark_uid = NULL;
                }
                //
                //
                // METAL/PRODUCT TYPE - GOLD @PRIYANKA-22SEP21
                if ($sttr_gs_weight > 0 && $sttr_gs_weight_gold > 0) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                    //$sttr_valuation_gd = decimalVal($GoldMetValue,2);
                }
                //
                //
                // METAL/PRODUCT TYPE - SILVER @PRIYANKA-22SEP21
                if ($sttr_gs_weight > 0 && $sttr_gs_weight_silver > 0) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                    //$sttr_valuation_sl = decimalVal($SilMetValue,2);
                }
                //
                //
                // METAL/PRODUCT TYPE - GOLD @PRIYANKA-23OCT21
                if (strpos($sttr_item_name, 'GOLD') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                if (strpos($sttr_item_name, 'GLD') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                if (strpos($sttr_item_name, 'DIA') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                if (strpos($sttr_item_name, 'PEARLS') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //               
                if (strpos($sttr_item_name, 'NOSEPIN') !== false) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                }
                //
                //
                // METAL/PRODUCT TYPE - SILVER @PRIYANKA-23OCT21
                if (strpos($sttr_item_name, 'SILVER') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                if (strpos($sttr_item_name, 'SIL') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                if (strpos($sttr_item_name, 'SL') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                if (strpos($sttr_item_name, 'SLV') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                if (strpos($sttr_item_name, 'PYL') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                if (strpos($sttr_item_name, 'PAYAL') !== false) {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                if ($sttr_item_name == 'STERLING JEWELLERY' ||
                        $sttr_item_name == 'BICHIYA M' || $sttr_item_name == 'H.PETI M' ||
                        $sttr_item_name == 'HATHFOOL M') {
                    $sttr_metal_type = 'Silver';
                    $sttr_product_type = 'Silver';
                }
                //
                //
                if ($sttr_metal_type == '' || $sttr_metal_type == NULL) {
                    $sttr_metal_type = 'Gold';
                    $sttr_product_type = 'Gold';
                    //$sttr_valuation_gd = decimalVal($GoldMetValue,2);
                }
                //
                //
                //echo '$sttr_metal_type == ' . $sttr_metal_type;
                //echo("<br/>");
                //echo '$sttr_product_type == ' . $sttr_product_type;
                //echo("<br/>");
                //
                //
                //if ($sttr_metal_type == 'Gold' || $sttr_metal_type == 'Silver') {
                //$sttr_barcode_prefix = '';
                //$sttr_barcode = '';                    
                //}
                //
                //echo '$sttr_barcode_prefix == ' . $sttr_barcode_prefix;
                //echo("<br/>");
                //
                //
                // TRANSACTION TYPE @PRIYANKA-22SEP21
                //if ($sttr_transaction_type == '' || $sttr_transaction_type == NULL) {
                $sttr_transaction_type = 'sell';
                //}
                //
                //echo '$sttr_transaction_type == ' . $sttr_transaction_type;
                //echo("<br/>");
                //
                //
                //INDICATOR @PRIYANKA-22SEP21
                //if ($sttr_indicator == '' || $sttr_indicator == NULL) {
                $sttr_indicator = 'stock';
                //}
                //
                //echo '$sttr_indicator == ' . $sttr_indicator;
                //echo("<br/>");
                //
                //
                // STOCK TYPE @PRIYANKA-22SEP21
                if ($sttr_stock_type == '' || $sttr_stock_type == NULL) {
                    $sttr_stock_type = 'wholesale';
                }
                //
                //echo '$sttr_stock_type == ' . $sttr_stock_type;
                //echo("<br/>");
                //
                //
                // FOR USER DETAILS @PRIYANKA-22SEP21
                parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "AND user_firm_id = '$sttr_firm_id' AND user_fname = '$partyName'"));
                //
                $sttr_user_id = $user_id;
                //
                //echo '$sttr_user_id == ' . $sttr_user_id;
                //echo("<br/>");
                //
                //
                // FOR ACCOUNT DETAILS @PRIYANKA-22SEP21
                $accName = 'Sales Accounts';
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
                // DATE @PRIYANKA-22SEP21
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
                //echo '$sttr_add_date == ' . $sttr_add_date;
                //echo("<br/>");
                //die;
                //
                //
                // INVOICE NO. @PRIYANKA-22SEP21
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
                // ITEM CATEGORY @PRIYANKA-22SEP21
                //$sttr_item_category = $sttr_item_name;
                //
                //echo '$sttr_item_category == ' . $sttr_item_category;
                //echo("<br/>");
                //
                // QUANTITY @PRIYANKA-22SEP21
                if ($sttr_quantity == '' || $sttr_quantity == NULL) {
                    $sttr_quantity = '';
                }
                //
                echo '$sttr_quantity56 == ' . $sttr_quantity;
                //echo("<br/>");
                //
                //
                // GS WT TYPE @PRIYANKA-22SEP21
                if ($sttr_gs_weight_type == '' || $sttr_gs_weight_type == NULL) {
                    $sttr_gs_weight_type = 'GM';
                }
                //
                //echo '$sttr_gs_weight_type == ' . $sttr_gs_weight_type;
                //echo("<br/>");
                //
                //
                // NT WT TYPE @PRIYANKA-22SEP21
                if ($sttr_nt_weight_type == '' || $sttr_nt_weight_type == NULL) {
                    $sttr_nt_weight_type = 'GM';
                }
                //
                //echo '$sttr_nt_weight_type == ' . $sttr_nt_weight_type;
                //echo("<br/>");
                //
                //
                // PKT WT TYPE @PRIYANKA-22SEP21
                if ($sttr_pkt_weight_type == '' || $sttr_pkt_weight_type == NULL) {
                    $sttr_pkt_weight_type = 'GM';
                }
                //
                //echo '$sttr_pkt_weight_type == ' . $sttr_pkt_weight_type;
                //echo("<br/>");                
                //
                //
                // PURITY/TUNCH @PRIYANKA-22SEP21
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
                // PURITY/TUNCH @PRIYANKA-22SEP21
                if ($stamp != '' && $stamp != NULL) {
                    $arrStamp = explode('K', $stamp);
                    $sttr_purity_ct = $arrStamp[0];
                }
                //
                //echo '$sttr_purity_ct == ' . $sttr_purity_ct;
                //echo("<br/>");
                //
                //
                // PURITY/TUNCH @PRIYANKA-22SEP21
                $sttr_purity = decimalVal((($sttr_purity_ct / 24) * 100), 2);
                //
                //echo '$sttr_purity == ' . $sttr_purity;
                //echo("<br/>");
                //
                //
                //if ($sttr_purity > 91 && $sttr_purity < 92) {
                //    $sttr_purity = 92;
                //}
                //
                //
                // WASTAGE @PRIYANKA-22SEP21
                // $sttr_wastage = 0;
                //
                //
                // FINAL PURITY/TUNCH @PRIYANKA-22SEP21
                $sttr_final_purity = ($sttr_purity + $sttr_wastage);
                //
                //echo '$sttr_final_purity == ' . $sttr_final_purity;
                //echo("<br/>");
                //
                //
                // FINE WEIGHT / FINAL FINE WEIGHT @PRIYANKA-22SEP21
                $sttr_fine_weight = decimalVal((($sttr_purity * $sttr_nt_weight) / 100), 3);
                $sttr_final_fine_weight = decimalVal((($sttr_final_purity * $sttr_nt_weight) / 100), 3);
                //
                //echo '$sttr_fine_weight == ' . $sttr_fine_weight;
                //echo("<br/>");
                //echo '$sttr_final_fine_weight == ' . $sttr_final_fine_weight;
                //echo("<br/>");
                //
                //
                // CUST WASTG AND CUST WASTG WT @PRIYANKA-22SEP21
                $sttr_cust_wastage = 0;
                $sttr_cust_wastage_wt = 0;
                //
                //
                // FINAL VAL BY AND FINAL FINE WT BY @PRIYANKA-22SEP21
                $sttr_final_valuation_by = 'byNetWt';
                $sttr_final_val_by = 'byNetWt';
                //
//                echo 'sttr_pre_invoice_no: ' . $sttr_pre_invoice_no . ' sttr_invoice_no:' . $sttr_invoice_no;
//                echo '$sttr_final_taxable_amt == ' . $sttr_final_taxable_amt;
//                //echo("<br/>");
//                echo '  $sttr_valuation == ' . $sttr_valuation;
//                //echo("<br/>");
//                echo '  $sttr_total_hallmark_charges == ' . $sttr_total_hallmark_charges;
//                echo("<br/>");
                //
                //
                // MKG CHARGES @PRIYANKA-22SEP21
                if ($sttr_total_making_charges == '' || $sttr_total_making_charges == NULL ||
                        $sttr_total_making_charges == '0.00' || $sttr_total_making_charges == 0) {
                    $sttr_total_making_charges = decimalVal((round($sttr_final_taxable_amt) - $sttr_valuation - $sttr_total_hallmark_charges), 2);
                }
                //
                //
                //if ($sttr_total_making_charges != '' && $sttr_total_making_charges != NULL) {
                $sttr_making_charges = decimalVal($sttr_total_making_charges, 2);
                $sttr_making_charges_type = 'Fixed';
                $sttr_total_making_amt = decimalVal($sttr_total_making_charges, 2);
                //}
                //
                //
                //echo '$sttr_making_charges == ' . $sttr_making_charges;
                //echo("<br/>");    
                //echo '$sttr_total_making_charges == ' . $sttr_total_making_charges;
                //echo("<br/>");
                //
                //
                //if ($sttr_making_charges_type == '' || $sttr_making_charges_type == NULL) {
                //    $sttr_making_charges_type = 'Fixed';
                //}
                //
                //echo '$sttr_making_charges_type == ' . $sttr_making_charges_type;
                //echo("<br/>");    
                //
                //
                // METAL VALUATION @PRIYANKA-22SEP21
                $sttr_metal_amt = decimalVal($sttr_valuation, 2);
                //
                //echo '$sttr_metal_amt == ' . $sttr_metal_amt;
                //echo("<br/>");            
                //
                //
                // DIAMOND/STONE DETAILS - WT, WT TYPE AND VAL  @PRIYANKA-22SEP21
                if ($diamondWt > 0) {
                    //
                    //$sttr_stone_qty = $diamondPc;
                    //$sttr_stone_wt = decimalVal($diamondWt,3);
                    //$sttr_stone_wt_type = 'CT';
                    //$sttr_stone_valuation = decimalVal($diamondVal,2);
                    //
                    //$diamondSubEntry = 'NO';
                    //
                }
                //
                //
                if ($stoneWt > 0) {
                    //
                    //$sttr_stone_qty = $stonePc;
                    //$sttr_stone_wt = decimalVal($stoneWt,3);
                    //$sttr_stone_wt_type = 'GM';
                    //$sttr_stone_valuation = decimalVal($stoneVal,2);
                    //
                    //$stoneSubEntry = 'NO';
                    //
                }
                //
                //
                //
                // TOTAL TAX AMOUNT @PRIYANKA-22SEP21
                if ($sttr_tot_tax == '' || $sttr_tot_tax == NULL || $sttr_tot_tax == 0 || $sttr_tot_tax == '0.00') {
                    $sttr_tot_tax = decimalVal(($sttr_tot_price_cgst_chrg + $sttr_tot_price_sgst_chrg + $sttr_tot_price_igst_chrg), 2);
                }
                //
                //
                // CALCULATE TAX IN % @PRIYANKA-22SEP21
                if ($sttr_final_valuation > $sttr_final_taxable_amt) {
                    $sttr_tot_tax = decimalVal(($sttr_final_valuation - $sttr_final_taxable_amt), 2);
                }
                //
                //
                // TOTAL TAX AMOUNT @PRIYANKA-20SEP21
                if ($sttr_tot_tax > 0) {
                    //
                    //
                    // CALCULATE TAX IN % @PRIYANKA-20SEP21
                    $tax = decimalVal((($sttr_tot_tax * 100) / $sttr_final_taxable_amt), 4);
                    //
                    //
                    //echo '$tax == ' . $tax;
                    //echo("<br/>");
                    //
                    //
                    if ($tax > 0 && $tax < 0.5) {
                        $tax = 0.25;
                    }
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
                    $sttr_tot_price_cgst_per = decimalVal(($tax / 2), 2);
                    //
                    //
                    // SGST % @PRIYANKA-20SEP21
                    $sttr_tot_price_sgst_per = decimalVal(($tax / 2), 2);
                    //        
                    //
                    // IGST % @PRIYANKA-20SEP21
                    $sttr_tot_price_igst_per = '0.00';
                    //
                    //
                    // CGST CHARGES @PRIYANKA-20SEP21
                    $sttr_tot_price_cgst_chrg = decimalVal(($sttr_tot_tax / 2), 2);
                    //
                    //
                    // SGST CHARGES @PRIYANKA-20SEP21
                    $sttr_tot_price_sgst_chrg = decimalVal(($sttr_tot_tax / 2), 2);
                    //
                    //
                    // IGST CHARGES @PRIYANKA-20SEP21
                    $sttr_tot_price_igst_chrg = '0.00';
                    //
                    //
                    $sttr_mkg_cgst_per = $sttr_tot_price_cgst_per;
                    $sttr_mkg_sgst_per = $sttr_tot_price_sgst_per;
                    $sttr_mkg_igst_per = $sttr_tot_price_igst_per;
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
                    $sttr_mkg_cgst_per = $sttr_tot_price_cgst_per;
                    $sttr_mkg_sgst_per = $sttr_tot_price_sgst_per;
                    $sttr_mkg_igst_per = $sttr_tot_price_igst_per;
                    //
                    //
                }
                //
                //
                // TAX @PRIYANKA-22SEP21
                $sttr_tax = 0;
                //
                //
                // FINAL VALUATION @PRIYANKA-22SEP21
                $sttr_final_valuation = decimalVal($sttr_final_valuation, 2);
                //    
                //              
                // GOLD ARRAY
                //$goldPurchaseStock = array ('GOLD ORNAMENTS', 'TOPS GOLD', 'BANGLE GOLD', 'CHAIN GOLD', 
                //                            'BAALI GOLD', 'PENDENT GOLD', 'LADIES RING GLD', 'TIKA GOLD', 'LADIES RING GLD', 'GOLD MATEL FINE');
                //
                // SILVER ARRAY
                //$silverPurchaseStock = array ('SILVER ORNAMENTS');
                //  
                //                      
                //
                //if ($sttr_metal_type == 'Gold' || $sttr_metal_type == 'GOLD' || $sttr_metal_type == 'gold') {        
                //    //   
                //    if (in_array($sttr_item_name, $goldPurchaseStock)) {
                //        $sttr_item_name_new = $sttr_item_name;
                //    } else {
                //        $sttr_item_name_new = 'GOLD ORNAMENTS';
                //    }
                //    //
                //}
                //
                //
                //
                //if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER' || $sttr_metal_type == 'silver') {
                //    //
                //    if (in_array($sttr_item_name, $silverPurchaseStock)) {
                //        $sttr_item_name_new = $sttr_item_name;
                //    } else {
                //        $sttr_item_name_new = 'SILVER ORNAMENTS';
                //    }
                //    //
                //}
                //
                //                                                                                    
                // ITEM CATEGORY @PRIYANKA-22SEP21
                //$sttr_item_category_new = $sttr_item_name_new;                                                                                                                                                                                                                                                          
                //
                //
                //echo '$sttr_item_category_new == ' . $sttr_item_category_new . '<br />';
                //echo '$sttr_item_name_new == ' . $sttr_item_name_new . '<br />';
                //
//                if ($sttr_pre_invoice_no == 'SB' && $sttr_invoice_no == '8')
//                    die;
                //
                // ARRAY REQUEST @PRIYANKA-22SEP21
                $info = array('sttr_firm_id' => $sttr_firm_id, 'firmId' => $sttr_firm_id, 'sttr_user_id' => $sttr_user_id,
                    'addItemDOBDay' => $day, 'addItemDOBMonth' => $month, 'addItemDOBYear' => $year,
                    'sttr_hallmark_uid' => NULL,
                    'sttr_user_billing_name' => $sttr_user_billing_name,
                    'sttr_account_id' => $sttr_account_id, 'sttr_sttr_id' => NULL,
                    'sttr_item_pre_id' => $sttr_item_code, 'sttr_stock_type' => $sttr_stock_type,
                    'sttr_transaction_type' => $sttr_transaction_type, 'sttr_indicator' => $sttr_indicator,
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
                    'sttr_making_charges' => $sttr_making_charges, 'sttr_making_charges_type' => $sttr_making_charges_type,
                    'sttr_total_making_amt' => $sttr_total_making_amt,
                    'sttr_total_making_charges' => $sttr_total_making_charges,
                    'sttr_hallmark_charges' => $sttr_hallmark_charges,
                    'sttr_hallmark_charges_type' => $sttr_hallmark_charges_type,
                    'sttr_total_hallmark_charges' => $sttr_total_hallmark_charges,
                    'sttr_mkg_cgst_per' => $sttr_mkg_cgst_per, 'sttr_mkg_cgst_chrg' => $sttr_mkg_cgst_chrg,
                    'sttr_mkg_sgst_per' => $sttr_mkg_sgst_per, 'sttr_mkg_sgst_chrg' => $sttr_mkg_sgst_chrg,
                    'sttr_mkg_igst_per' => $sttr_mkg_igst_per, 'sttr_mkg_igst_chrg' => $sttr_mkg_igst_chrg,
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
                // USER ID IS MANDATORY @PRIYANKA-22SEP21
                if ($sttr_user_id != '' && $sttr_user_id != NULL) {
                    //
                    //if ($diamondSubEntry != 'NO' && $stoneSubEntry != 'NO') {
                    //
                    $_REQUEST = array_merge($_REQUEST, $info);
                    //
                    // FOR SELL ENTRIES @PRIYANKA-22SEP21
                    $sttrId = stock_transaction('insert', $_REQUEST);
                    //
                    //
                    //$query = "UPDATE stock_transaction SET sttr_item_name = '$sttr_item_name', 
                    //          sttr_item_category = '$sttr_item_category'                                 
                    //          WHERE sttr_owner_id = '$sessionOwnerId' 
                    //          AND sttr_id = '$sttrId'
                    //          AND sttr_pre_invoice_no = '$sttr_pre_invoice_no' 
                    //          AND sttr_invoice_no = '$sttr_invoice_no' 
                    //          AND sttr_user_id = '$sttr_user_id' 
                    //          AND sttr_firm_id = '$sttr_firm_id'     
                    //          AND sttr_status IN ('PaymentPending') 
                    //          AND sttr_transaction_type IN ('sell') 
                    //          AND sttr_indicator IN ('stock')";
                    //
                    //echo '$query == ' . $query . '<br /><br />';
                    //
                    //if (!mysqli_query($conn, $query)) {
                    //    die('Error: ' . mysqli_error($conn));
                    //}
                    //  
                    //}
                    //
                }
                //
                $diamondSubEntry = NULL;
                $stoneSubEntry = NULL;
                //
                //$sttr_item_category = NULL;
                //$sttr_item_name = NULL; 
                //$sttr_item_category_new = NULL;
                //$sttr_item_name_new = NULL; 
                //
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