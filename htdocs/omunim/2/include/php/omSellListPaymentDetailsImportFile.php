<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for Sell List Payment Details @PRIYANKA-21SEP21
 * **********************************************************************************************************************************
 *
 * Created on 21 SEP, 2021 08.00.00 PM
 * 
 * @FileName: omSellListPaymentDetailsImportFile.php
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
// Start Code to Import Data From CSV File to Mysql Database for Sell List Payment Details @PRIYANKA-22SEP21
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
            // Date	Refno	Lnarr	Party Name	Sale Amt.	Discount	
            // Tax	SGST	CGST	IGST	Bill Amount	Cash	Card	Adjust	
            // Balance	State	Particulars	Other	
            // Gold Amt	REf BY	Sil Wt	Gold Wt	Sal Wt	SR Wt	Pur Wt	
            // Ins Rec	Sil.Amount	Mem Id	M.Points	C.Amount	
            // Coupon	S.Pur Wt	Sale Gwt	Amount+Tax	Inst.No.	
            // Old Pur.	Dia.Wt.	Stn.Wt.	Gr.Wt.	City	Net.Wt.	TIN	
            // Gold Fine	Sil.Fine	Grosswt1	Grosswt2	
            // Dis.%	Mem.No.	Lamt	Site To	Site From	Discount	Item Discount	
            // Header1	Header1	Header1	Header1	Header1	Install.	
            // Group	Sundry1	Sundry2	Sundry3	Sundry4	Sundry5	
            // GSTIN No.	DOB	DOA	Cheque
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
                    $json1 = '{"columnName":"Date", "position":' . $i . ',' . '"tableColumnName":"Date"}';
                    $allData[] = json_decode($json1,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Refno') {
                    $json2 = '{"columnName":"Refno", "position":' . $i . ',' . '"tableColumnName":"Refno"}';
                    $allData[] = json_decode($json2,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Lnarr') {
                    $json3 = '{"columnName":"Lnarr", "position":' . $i . ',' . '"tableColumnName":"Lnarr"}';
                    $allData[] = json_decode($json3,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Party Name') {
                    $json4 = '{"columnName":"Party Name", "position":' . $i . ',' . '"tableColumnName":"Party Name"}';
                    $allData[] = json_decode($json4,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sale Amt.') {
                    $json5 = '{"columnName":"Sale Amt.", "position":' . $i . ',' . '"tableColumnName":"Sale Amt."}';
                    $allData[] = json_decode($json5,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Discount') {
                    $json6 = '{"columnName":"Discount", "position":' . $i . ',' . '"tableColumnName":"Discount"}';
                    $allData[] = json_decode($json6,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Bill Amount') {
                    $json7 = '{"columnName":"Bill Amount", "position":' . $i . ',' . '"tableColumnName":"Bill Amount"}';
                    $allData[] = json_decode($json7,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Cash') {
                    $json8 = '{"columnName":"Cash", "position":' . $i . ',' . '"tableColumnName":"Cash"}';
                    $allData[] = json_decode($json8,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Card') {
                    $json9 = '{"columnName":"Card", "position":' . $i . ',' . '"tableColumnName":"Card"}';
                    $allData[] = json_decode($json9,true);
                }
                if ($prodDetails[$i] == 'upi') {
                    $json69 = '{"columnName":"upi", "position":' . $i . ',' . '"tableColumnName":"upi"}';
                    $allData[] = json_decode($json69,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Adjust') {
                    $json10 = '{"columnName":"Adjust", "position":' . $i . ',' . '"tableColumnName":"Adjust"}';
                    $allData[] = json_decode($json10,true);
                }                
                //
                //
                if ($prodDetails[$i] == 'State') {
                    $json11 = '{"columnName":"State", "position":' . $i . ',' . '"tableColumnName":"State"}';
                    $allData[] = json_decode($json11,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Particulars') {
                    $json12 = '{"columnName":"Particulars", "position":' . $i . ',' . '"tableColumnName":"Particulars"}';
                    $allData[] = json_decode($json12,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Other') {
                    $json13 = '{"columnName":"Other", "position":' . $i . ',' . '"tableColumnName":"Other"}';
                    $allData[] = json_decode($json13,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Gold Amt') {
                    $json14 = '{"columnName":"Gold Amt", "position":' . $i . ',' . '"tableColumnName":"Gold Amt"}';
                    $allData[] = json_decode($json14,true);
                }
                //
                //
                if ($prodDetails[$i] == 'REf BY') {
                    $json15 = '{"columnName":"REf BY", "position":' . $i . ',' . '"tableColumnName":"REf BY"}';
                    $allData[] = json_decode($json15,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sil Wt') {
                    $json16 = '{"columnName":"Sil Wt", "position":' . $i . ',' . '"tableColumnName":"Sil Wt"}';
                    $allData[] = json_decode($json16,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Gold Wt') {
                    $json17 = '{"columnName":"Gold Wt", "position":' . $i . ',' . '"tableColumnName":"Gold Wt"}';
                    $allData[] = json_decode($json17,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sal Wt') {
                    $json18 = '{"columnName":"Sal Wt", "position":' . $i . ',' . '"tableColumnName":"Sal Wt"}';
                    $allData[] = json_decode($json18,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Tax') {
                    $json19 = '{"columnName":"Tax", "position":' . $i . ',' . '"tableColumnName":"Tax"}';
                    $allData[] = json_decode($json19,true);
                }
                //
                //
                if ($prodDetails[$i] == 'IGST') {
                    $json20 = '{"columnName":"IGST", "position":' . $i . ',' . '"tableColumnName":"IGST"}';
                    $allData[] = json_decode($json20,true);
                }
                //
                //
                if ($prodDetails[$i] == 'CGST') {
                    $json21 = '{"columnName":"CGST", "position":' . $i . ',' . '"tableColumnName":"CGST"}';
                    $allData[] = json_decode($json21,true);
                }
                //
                //
                if ($prodDetails[$i] == 'SGST') {
                    $json22 = '{"columnName":"SGST", "position":' . $i . ',' . '"tableColumnName":"SGST"}';
                    $allData[] = json_decode($json22,true);
                }
                //
                //
                if ($prodDetails[$i] == 'SR Wt') {
                    $json23 = '{"columnName":"SR Wt", "position":' . $i . ',' . '"tableColumnName":"SR Wt"}';
                    $allData[] = json_decode($json23,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Pur Wt') {
                    $json24 = '{"columnName":"Pur Wt", "position":' . $i . ',' . '"tableColumnName":"Pur Wt"}';
                    $allData[] = json_decode($json24,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Ins Rec') {
                    $json25 = '{"columnName":"Ins Rec", "position":' . $i . ',' . '"tableColumnName":"Ins Rec"}';
                    $allData[] = json_decode($json25,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sil.Amount') {
                    $json26 = '{"columnName":"Sil.Amount", "position":' . $i . ',' . '"tableColumnName":"Sil.Amount"}';
                    $allData[] = json_decode($json26,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Mem Id') {
                    $json27 = '{"columnName":"Mem Id", "position":' . $i . ',' . '"tableColumnName":"Mem Id"}';
                    $allData[] = json_decode($json27,true);
                }                
                //
                //
                if ($prodDetails[$i] == 'M.Points') {
                    $json28 = '{"columnName":"M.Points", "position":' . $i . ',' . '"tableColumnName":"M.Points"}';
                    $allData[] = json_decode($json28,true);
                }
                //
                //
                if ($prodDetails[$i] == 'C.Amount') {
                    $json29 = '{"columnName":"C.Amount", "position":' . $i . ',' . '"tableColumnName":"C.Amount"}';
                    $allData[] = json_decode($json29,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Coupon') {
                    $json30 = '{"columnName":"Coupon", "position":' . $i . ',' . '"tableColumnName":"Coupon"}';
                    $allData[] = json_decode($json30,true);
                }
                //
                //
                if ($prodDetails[$i] == 'S.Pur Wt') {
                    $json31 = '{"columnName":"S.Pur Wt", "position":' . $i . ',' . '"tableColumnName":"S.Pur Wt"}';
                    $allData[] = json_decode($json31,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sale Gwt') {
                    $json32 = '{"columnName":"Sale Gwt", "position":' . $i . ',' . '"tableColumnName":"Sale Gwt"}';
                    $allData[] = json_decode($json32,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Amount+Tax') {
                    $json33 = '{"columnName":"Amount+Tax", "position":' . $i . ',' . '"tableColumnName":"Amount+Tax"}';
                    $allData[] = json_decode($json33,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Inst.No.') {
                    $json34 = '{"columnName":"Inst.No.", "position":' . $i . ',' . '"tableColumnName":"Inst.No."}';
                    $allData[] = json_decode($json34,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Old Pur.') {
                    $json35 = '{"columnName":"Old Pur.", "position":' . $i . ',' . '"tableColumnName":"Old Pur."}';
                    $allData[] = json_decode($json35,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Dia.Wt.') {
                    $json36 = '{"columnName":"Dia.Wt.", "position":' . $i . ',' . '"tableColumnName":"Dia.Wt."}';
                    $allData[] = json_decode($json36,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Stn.Wt.') {
                    $json37 = '{"columnName":"Stn.Wt.", "position":' . $i . ',' . '"tableColumnName":"Stn.Wt."}';
                    $allData[] = json_decode($json37,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Gr.Wt.') {
                    $json38 = '{"columnName":"Gr.Wt.", "position":' . $i . ',' . '"tableColumnName":"Gr.Wt."}';
                    $allData[] = json_decode($json38,true);
                }
                //
                //
                if ($prodDetails[$i] == 'City') {
                    $json39 = '{"columnName":"City", "position":' . $i . ',' . '"tableColumnName":"City"}';
                    $allData[] = json_decode($json39,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Net.Wt.') {
                    $json40 = '{"columnName":"Net.Wt.", "position":' . $i . ',' . '"tableColumnName":"Net.Wt."}';
                    $allData[] = json_decode($json40,true);
                }                
                //
                //
                if ($prodDetails[$i] == 'TIN') {
                    $json41 = '{"columnName":"TIN", "position":' . $i . ',' . '"tableColumnName":"TIN"}';
                    $allData[] = json_decode($json41,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sundry1') {
                    $json42 = '{"columnName":"Sundry1", "position":' . $i . ',' . '"tableColumnName":"Sundry1"}';
                    $allData[] = json_decode($json42,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sundry2') {
                    $json43 = '{"columnName":"Sundry2", "position":' . $i . ',' . '"tableColumnName":"Sundry2"}';
                    $allData[] = json_decode($json43,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sundry3') {
                    $json44 = '{"columnName":"Sundry3", "position":' . $i . ',' . '"tableColumnName":"Sundry3"}';
                    $allData[] = json_decode($json44,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sundry4') {
                    $json45 = '{"columnName":"Sundry4", "position":' . $i . ',' . '"tableColumnName":"Sundry4"}';
                    $allData[] = json_decode($json45,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sundry5') {
                    $json46 = '{"columnName":"Sundry5", "position":' . $i . ',' . '"tableColumnName":"Sundry5"}';
                    $allData[] = json_decode($json46,true);
                }
                //
                //
                if ($prodDetails[$i] == 'GSTIN No.') {
                    $json47 = '{"columnName":"GSTIN No.", "position":' . $i . ',' . '"tableColumnName":"GSTIN No."}';
                    $allData[] = json_decode($json47,true);
                }
                //
                //
                if ($prodDetails[$i] == 'DOB') {
                    $json48 = '{"columnName":"DOB", "position":' . $i . ',' . '"tableColumnName":"DOB"}';
                    $allData[] = json_decode($json48,true);
                }
                //
                //
                if ($prodDetails[$i] == 'DOA') {
                    $json49 = '{"columnName":"DOA", "position":' . $i . ',' . '"tableColumnName":"DOA"}';
                    $allData[] = json_decode($json49,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Cheque') {
                    $json50 = '{"columnName":"Cheque", "position":' . $i . ',' . '"tableColumnName":"Cheque"}';
                    $allData[] = json_decode($json50,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Group') {
                    $json51 = '{"columnName":"Group", "position":' . $i . ',' . '"tableColumnName":"Group"}';
                    $allData[] = json_decode($json51,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Install.') {
                    $json52 = '{"columnName":"Install.", "position":' . $i . ',' . '"tableColumnName":"Install."}';
                    $allData[] = json_decode($json52,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Header1') {
                    $json53 = '{"columnName":"Header1", "position":' . $i . ',' . '"tableColumnName":"Header1"}';
                    $allData[] = json_decode($json53,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Item Discount') {
                    $json54 = '{"columnName":"Item Discount", "position":' . $i . ',' . '"tableColumnName":"Item Discount"}';
                    $allData[] = json_decode($json54,true);
                }
                //
                //
                //if ($prodDetails[$i] == 'Discount') {
                //    $json55 = '{"columnName":"Discount", "position":' . $i . ',' . '"tableColumnName":"Discount"}';
                //    $allData[] = json_decode($json55,true);
                //}
                //
                //
                if ($prodDetails[$i] == 'Site To') {
                    $json56 = '{"columnName":"Site To", "position":' . $i . ',' . '"tableColumnName":"Site To"}';
                    $allData[] = json_decode($json56,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Site From') {
                    $json57 = '{"columnName":"Site From", "position":' . $i . ',' . '"tableColumnName":"Site From"}';
                    $allData[] = json_decode($json57,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Lamt') {
                    $json58 = '{"columnName":"Lamt", "position":' . $i . ',' . '"tableColumnName":"Lamt"}';
                    $allData[] = json_decode($json58,true);
                }                
                //
                //               
                if ($prodDetails[$i] == 'Mem.No.') {
                    $json59 = '{"columnName":"Mem.No.", "position":' . $i . ',' . '"tableColumnName":"Mem.No."}';
                    $allData[] = json_decode($json59,true);
                }                
                //
                //
                if ($prodDetails[$i] == 'Dis.%') {
                    $json60 = '{"columnName":"Dis.%", "position":' . $i . ',' . '"tableColumnName":"Dis.%"}';
                    $allData[] = json_decode($json60,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Gold Fine') {
                    $json61 = '{"columnName":"Gold Fine", "position":' . $i . ',' . '"tableColumnName":"Gold Fine"}';
                    $allData[] = json_decode($json61,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Sil.Fine') {
                    $json62 = '{"columnName":"Sil.Fine", "position":' . $i . ',' . '"tableColumnName":"Sil.Fine"}';
                    $allData[] = json_decode($json62,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Grosswt1') {
                    $json63 = '{"columnName":"Grosswt1", "position":' . $i . ',' . '"tableColumnName":"Grosswt1"}';
                    $allData[] = json_decode($json63,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Grosswt2') {
                    $json64 = '{"columnName":"Grosswt2", "position":' . $i . ',' . '"tableColumnName":"Grosswt2"}';
                    $allData[] = json_decode($json64,true);
                }
                //
                //
                if ($prodDetails[$i] == 'Balance') {
                    $json65 = '{"columnName":"Balance", "position":' . $i . ',' . '"tableColumnName":"Balance"}';
                    $allData[] = json_decode($json65,true);
                }
                 if ($prodDetails[$i] == 'bank acc') {
                    $json66 = '{"columnName":"bank acc", "position":' . $i . ',' . '"tableColumnName":"bank acc"}';
                    $allData[] = json_decode($json66,true);
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
        if ($rowsCounter > 0) {
            //
            //
            foreach ($json_merge as $headings)  {
                //
                //
                // CSV FILE COLUMN HEADINGS (For Reference) @PRIYANKA-22SEP21
                // Date	Refno	Lnarr	Party Name	Sale Amt.	Discount	
                // Tax	SGST	CGST	IGST	Bill Amount	Cash	Card	Adjust	
                // Balance	State	Particulars	Other	
                // Gold Amt	REf BY	Sil Wt	Gold Wt	Sal Wt	SR Wt	Pur Wt	
                // Ins Rec	Sil.Amount	Mem Id	M.Points	C.Amount	
                // Coupon	S.Pur Wt	Sale Gwt	Amount+Tax	Inst.No.	
                // Old Pur.	Dia.Wt.	Stn.Wt.	Gr.Wt.	City	Net.Wt.	TIN	
                // Gold Fine	Sil.Fine	Grosswt1	Grosswt2	
                // Dis.%	Mem.No.	Lamt	Site To	Site From	Discount	Item Discount	
                // Header1	Header1	Header1	Header1	Header1	Install.	
                // Group	Sundry1	Sundry2	Sundry3	Sundry4	Sundry5	
                // GSTIN No.	DOB	DOA	Cheque
                // 
                // 
                //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
                //echo("<br/>");
                //
                //
                // DATE @PRIYANKA-22SEP21
                if ($headings['columnName'] == 'Date') {
                    $date = $prodDetails[$headings['position']];
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
                // BILLING USER NAME @PRIYANKA-22SEP21
                if ($headings['columnName'] == 'Lnarr') {
                    $user_billing_name = $prodDetails[$headings['position']];
                } 
                //                
                // GROSSS WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Gr.Wt.') {
                    $GrWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // NET WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Net.Wt.') {
                    $NetWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // GOLD WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Gold Wt') {
                    $GoldWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // SILVER WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Sil Wt') {
                    $SilWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // GS WT 1 @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Grosswt1') {
                    $Grosswt1 = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // GS WT 2 @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Grosswt2') {
                    $Grosswt2 = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // GOLD FINE @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Gold Fine') {
                    $GoldFine = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // SILVER FINE @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Sil.Fine') {
                    $SilFine = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // DIAMOND WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Dia.Wt.') {
                    $DiaWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // STONE WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Stn.Wt.') {
                    $StnWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // SAL WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Sal Wt') {
                    $SalWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // SR WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'SR Wt') {
                    $SRWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // PUR WT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Pur Wt') {
                    $PurWt = decimalVal($prodDetails[$headings['position']],3);
                }
                //
                // S.Pur Wt @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'S.Pur Wt') {
                    $SPurWt = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // SALE GWT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Sale Gwt') {
                    $SaleGwt = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // OLD PUR @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Old Pur.') {
                    $OldPur = decimalVal($prodDetails[$headings['position']],2);
                }
                // GOLD AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Gold Amt') {
                    $GoldAmt = decimalVal($prodDetails[$headings['position']],2);
                }
                // SILVER AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Sil.Amount') {
                    $SilAmount = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // SALE AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Sale Amt.') {
                    $SaleAmt = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // AMOUNT + TAX @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Amount+Tax') {
                    $AmountTax = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // OTHER @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Other') {
                    $Other = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // ADJUST @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Adjust') {
                    $Adjust = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // BILL AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Bill Amount') {
                    $BillAmount = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // CASH AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Cash') {
                    $Cash = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // CARD AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Card') {
                    $Card = decimalVal($prodDetails[$headings['position']],2);
                }
                if ($headings['columnName'] == 'upi') {
                    $upi = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // CHEQUE AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Cheque') {
                    $Cheque = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // DISCOUNT PERCENTAGE @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Dis.%') {
                    $DisPer = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // DISCOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Discount') {
                    $Discount = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // ITEM DISCOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Item Discount') {
                    $ItemDiscount = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // COUPON @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Coupon') {
                    $Coupon = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // CHARGES @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Lamt') {
                    $Lamt = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // BALANCE AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Balance') {
                    $Balance = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // CGST AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'CGST') {
                    $CGST = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // SGST AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'SGST') {
                    $SGST = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // IGST AMOUNT @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'IGST') {
                    $IGST = decimalVal($prodDetails[$headings['position']],2);
                }
                //
                // TAX (TOTAL TAX AMOUNT) @PRIYANKA-22SEP21 
                if ($headings['columnName'] == 'Tax') {
                    $Tax = decimalVal($prodDetails[$headings['position']],2);
                }
                if ($headings['columnName'] == 'bank acc') {
                    $bank_acc_name = ($prodDetails[$headings['position']]);
                }
                //
                //
            }
            //
            //
            //echo 'selFirmId == ' . $selFirmId;
            //echo("<br/>");
            //die;
            //
            //
            // FIRM ID @PRIYANKA-22SEP21
            $firm_id = $selFirmId;
            //
            //
            // FIRM ID @PRIYANKA-22SEP21
            $firmId = $selFirmId;
            //
            //echo '$firm_id == ' . $firm_id;
            //echo("<br/>");
            //
            //
            $Type = 'S';
            //
            //
            // FOR FIRM MANDATORY @PRIYANKA-22SEP21
            if ($firm_id != '' && $firm_id != NULL) {
                // 
                // 
                //echo 'Type == ' . $Type;
                //echo("<br/>");
                //
                // ONLY FOR SELL ENTRIES @PRIYANKA-22SEP21
                if ($Type == 'S') {                
                //
                //              
                //
                // TRANSACTION TYPE @PRIYANKA-22SEP21
                if ($transaction_type == '' || $transaction_type == NULL) {
                    $transaction_type = 'sell';
                }
                //
                //echo '$transaction_type == ' . $transaction_type;
                //echo("<br/>");
                //
                //
                //INDICATOR @PRIYANKA-22SEP21
                if ($indicator == '' || $indicator == NULL) {
                    $indicator = 'stock';
                }
                //
                //echo '$indicator == ' . $indicator;
                //echo("<br/>");
                //
                //
                // FOR USER DETAILS @PRIYANKA-22SEP21
                parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                       . "AND user_firm_id = '$firm_id' AND user_fname = '$partyName'"));
                //
                $user_id = $user_id;
                //
                //
                $userId = $user_id;
                //
                //
                //echo '$user_id == ' . $user_id;
                //echo("<br/>");
                //
                //
                // FOR ACCOUNT DETAILS @PRIYANKA-22SEP21
                $accName = 'Sales Accounts';
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                                       . "and acc_firm_id = '$firm_id' and acc_user_acc = '$accName'"));
                //
                $account_id = $acc_id;
                //
                //echo '$account_id == ' . $account_id;
                //echo("<br/>");
                //
                //
                // DATE @PRIYANKA-22SEP21
                if ($date != '' && $date != NULL) {
                    //
//                    $add_date = date("d M Y", strtotime($date));
                    $add_date = date('d M Y', strtotime(str_replace('/', '-', $date)));
                    //
                } else {
                    $add_date = date("d M Y");
                    $addDate = date("d M Y");
                }
                //
                //
                $add_date = strtoupper($add_date);
                //
                $arrAddDate = explode(' ', $add_date);
                //
                $day = $arrAddDate[0];
                $month = strtoupper($arrAddDate[1]);
                $year = $arrAddDate[2];
                //
                //echo '$add_date == ' . $add_date;
                //echo("<br/>");
                //die;
                //
                //
                // INVOICE NO. @PRIYANKA-22SEP21
                if ($invoiceNo != '' && $invoiceNo != NULL) {
                    $arrInv = explode('/', $invoiceNo);
                    $payPreInvoiceNo = $arrInv[0];
                    $payInvoiceNo = $arrInv[1];
                }
                //
                //
                //echo '$payPreInvoiceNo == ' . $payPreInvoiceNo;
                //echo("<br/>");
                //echo '$payInvoiceNo == ' . $payInvoiceNo;
                //echo("<br/>");
                //die;
                // 
                // 
                //$CGSTPer = 1.5; 
                //$SGSTPer = 1.5; 
                //$IGSTPer = NULL;
                //
                //
                //echo '$GoldWt == ' . $GoldWt;
                //echo("<br/>"); 
                //
                //
                //echo '$SilWt == ' . $SilWt;
                //echo("<br/>"); 
                //
                //
                //
                // ********************************************************************************************************************************
                // START CODE TO FETCH SELL ENTRY DETAILS FOR PAYMENT DETAILS @PRIYANKA-22-SEP-21
                // ********************************************************************************************************************************
                //
                //
                if ($GoldWt > 0) {
                    //
                    //
                    parse_str(getTableValues("SELECT sttr_metal_rate AS metal_rate_gd, "
                                           . "SUM(sttr_quantity) AS quantity_gd, "
                                           . "SUM(sttr_gs_weight) AS gs_weight_gd, "
                                           . "SUM(sttr_nt_weight) AS nt_weight_gd, "
                                           . "SUM(sttr_fine_weight) AS fine_weight_gd, "
                                           . "SUM(sttr_final_fine_weight) AS final_fine_weight_gd, "
                                           . "SUM(sttr_total_making_charges) AS total_making_charges_gd, "
                                           . "SUM(sttr_valuation) AS valuation_gd, "
                                           . "SUM(sttr_tot_tax) AS tot_tax_gd, "
                                           . "SUM(sttr_final_valuation) AS final_valuation_gd  "
                                           . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                           . "AND sttr_metal_type IN ('Gold', 'GOLD', 'gold') "
                                           . "AND sttr_user_id = '$userId' "
                                           . "AND sttr_firm_id = '$firmId' "
                                           . "AND sttr_pre_invoice_no = '$payPreInvoiceNo' "
                                           . "AND sttr_invoice_no = '$payInvoiceNo' "
                                           . "AND sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stock') "
                                           . "AND sttr_status = 'PaymentPending' AND (sttr_utin_id IS NULL OR sttr_utin_id = '') "
                                           . "ORDER BY sttr_id ASC "));
                    //
                    $metal_rate = $metal_rate_gd;
                    //
                }
                //
                //
                if ($SilWt > 0) {
                    //
                    //    
                    parse_str(getTableValues("SELECT sttr_metal_rate AS metal_rate_sl, "
                                           . "SUM(sttr_quantity) AS quantity_sl, "
                                           . "SUM(sttr_gs_weight) AS gs_weight_sl, "
                                           . "SUM(sttr_nt_weight) AS nt_weight_sl, "
                                           . "SUM(sttr_fine_weight) AS fine_weight_sl, "
                                           . "SUM(sttr_final_fine_weight) AS final_fine_weight_sl, "
                                           . "SUM(sttr_total_making_charges) AS total_making_charges_sl, "
                                           . "SUM(sttr_valuation) AS valuation_sl, "
                                           . "SUM(sttr_tot_tax) AS tot_tax_sl, "
                                           . "SUM(sttr_final_valuation) AS final_valuation_sl  "
                                           . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                           . "AND sttr_metal_type IN ('Silver', 'SILVER', 'silver') "
                                           . "AND sttr_user_id = '$userId' "
                                           . "AND sttr_firm_id = '$firmId' "
                                           . "AND sttr_pre_invoice_no = '$payPreInvoiceNo' "
                                           . "AND sttr_invoice_no = '$payInvoiceNo' "
                                           . "AND sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stock') "
                                           . "AND sttr_status = 'PaymentPending' AND (sttr_utin_id IS NULL OR sttr_utin_id = '') "
                                           . "ORDER BY sttr_id ASC "));
                    //
                    $metal_rate = $metal_rate_sl;
                    //
                }
                //
                //
                parse_str(getTableValues("SELECT SUM(sttr_total_making_charges) AS utin_oth_chgs_amt, "
                                       . "SUM(sttr_valuation) AS valuation, "
                                       . "sttr_tot_price_cgst_per AS tot_price_cgst_per, "
                                       . "sttr_tot_price_sgst_per AS tot_price_sgst_per, "
                                       . "sttr_tot_price_igst_per AS tot_price_igst_per, "
                                       . "SUM(sttr_tot_price_cgst_chrg) AS tot_price_cgst_chrg, "
                                       . "SUM(sttr_tot_price_sgst_chrg) AS tot_price_sgst_chrg, "
                                       . "SUM(sttr_tot_price_igst_chrg) AS tot_price_igst_chrg, "
                                       . "SUM(sttr_tot_tax) AS tot_tax, "
                                       . "SUM(sttr_final_valuation) AS final_valuation  "
                                       . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                       . "AND sttr_user_id = '$userId' "
                                       . "AND sttr_firm_id = '$firmId' "
                                       . "AND sttr_pre_invoice_no = '$payPreInvoiceNo' "
                                       . "AND sttr_invoice_no = '$payInvoiceNo' "
                                       . "AND sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stock') "
                                       . "AND sttr_status = 'PaymentPending' AND (sttr_utin_id IS NULL OR sttr_utin_id = '') "
                                       . "ORDER BY sttr_id ASC "));
                //
                //
                // ********************************************************************************************************************************
                // END CODE TO FETCH SELL ENTRY DETAILS FOR PAYMENT DETAILS @PRIYANKA-22-SEP-21
                // ********************************************************************************************************************************
                //
                //
                parse_str(getTableValues("SELECT SUM(sttr_gs_weight) AS raw_metal_gs_weight_gd, "
                                       . "SUM(sttr_valuation) AS raw_metal_valuation_gd "
                                       . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                       . "AND sttr_user_id = '$userId' "
                                       . "AND sttr_firm_id = '$firmId' "
                                       . "AND sttr_pre_invoice_no = '$payPreInvoiceNo' "
                                       . "AND sttr_invoice_no = '$payInvoiceNo' "
                                       . "AND sttr_transaction_type IN ('RECEIVED') AND sttr_indicator IN ('rawMetal') "
                                       . "AND sttr_metal_type IN ('Gold', 'GOLD', 'gold') "
                                       . "AND sttr_status = 'PaymentPending' AND (sttr_utin_id IS NULL OR sttr_utin_id = '') "
                                       . "ORDER BY sttr_id ASC "));
                //
                //
                parse_str(getTableValues("SELECT SUM(sttr_gs_weight) AS raw_metal_gs_weight_sl, "
                                       . "SUM(sttr_valuation) AS raw_metal_valuation_sl "
                                       . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                       . "AND sttr_user_id = '$userId' "
                                       . "AND sttr_firm_id = '$firmId' "
                                       . "AND sttr_pre_invoice_no = '$payPreInvoiceNo' "
                                       . "AND sttr_invoice_no = '$payInvoiceNo' "
                                       . "AND sttr_transaction_type IN ('RECEIVED') AND sttr_indicator IN ('rawMetal') "
                                       . "AND sttr_metal_type IN ('Silver', 'SILVER', 'silver') "
                                       . "AND sttr_status = 'PaymentPending' AND (sttr_utin_id IS NULL OR sttr_utin_id = '') "
                                       . "ORDER BY sttr_id ASC "));
                //
                //
                $raw_metal_valuation = decimalVal(($raw_metal_valuation_gd + $raw_metal_valuation_sl),2);
                //
                //
                //[slPrGoldWtRecBal] => 1.380 
                //[slPrGoldWtRecBalType] => GM 
                //[slPrSilverWtRecBal] => 0.000 
                //[slPrSilverWtRecBalType] => 
                //[slPrPayTotGoldAmtRec] => 6279.00 
                //[slPrPayTotSilverAmtRec] => 0.00 
                //
                //[slPrPayTotAmtRec] => 6279.00 
                //[slPrPayTotAmtExchangeDisp] => 6279.00 
                //[slPrPayTotAmtRecDisp] => 6279.00 
                //
                //
                // (GOLD + SILVER) => TOTAL VARIABLES @PRIYANKA-22-SEP-21
                $utin_oth_chgs_amt = decimalVal($utin_oth_chgs_amt,2);    
                //$valuation = decimalVal($valuation,2);
                $CGSTPer = decimalVal($tot_price_cgst_per,2);
                $SGSTPer = decimalVal($tot_price_sgst_per,2); 
                $IGSTPer = decimalVal($tot_price_igst_per,2);
                $tot_price_cgst_chrg = decimalVal($tot_price_cgst_chrg,2);
                $tot_price_sgst_chrg = decimalVal($tot_price_sgst_chrg,2);
                $tot_price_igst_chrg = decimalVal($tot_price_igst_chrg,2);
                $tot_tax = decimalVal($tot_tax,2);
                $final_valuation = decimalVal($final_valuation,2);
                $valuation = decimalVal(($final_valuation - $utin_oth_chgs_amt - $tot_tax),2);
                //
                //
                // VARIABLES FOR GOLD @PRIYANKA-22-SEP-21
                $gs_weight_gd = decimalVal($gs_weight_gd,3);
                $nt_weight_gd = decimalVal($nt_weight_gd,3);
                $fine_weight_gd = decimalVal($fine_weight_gd,3);
                $final_fine_weight_gd = decimalVal($final_fine_weight_gd,3);
                //
                $total_making_charges_gd = decimalVal($total_making_charges_gd,2);
                //$valuation_gd = decimalVal($valuation_gd,2);
                $tot_tax_gd = decimalVal($tot_tax_gd,2);
                $final_valuation_gd = decimalVal($final_valuation_gd,2);
                $valuation_gd = decimalVal(($final_valuation_gd - $total_making_charges_gd - $tot_tax_gd),2);
                //
                //
                // VARIABLES FOR SILVER @PRIYANKA-22-SEP-21
                $gs_weight_sl = decimalVal($gs_weight_sl,3);
                $nt_weight_sl = decimalVal($nt_weight_sl,3);
                $fine_weight_sl = decimalVal($fine_weight_sl,3);
                $final_fine_weight_sl = decimalVal($final_fine_weight_sl,3);
                //
                $total_making_charges_sl = decimalVal($total_making_charges_sl,2);
                //$valuation_sl = decimalVal($valuation_sl,2);
                $tot_tax_sl = decimalVal($tot_tax_sl,2);
                $final_valuation_sl = decimalVal($final_valuation_sl,2);
                $valuation_sl = decimalVal(($final_valuation_sl - $total_making_charges_sl - $tot_tax_sl),2);
                //  
                //
                // PAYMENT VARIABLES @PRIYANKA-22-SEP-21 
                $Cash = decimalVal($Cash ,2);
                $Card = decimalVal($Card,2);
                $Cheque = decimalVal($Cheque,2);
                $upi = decimalVal($upi,2);
                $totalAmountRec = decimalVal(($Cash + $Card + $Cheque+$upi),2);                
                $utin_cash_balance = decimalVal($Balance,2);
                //
                //
                if ($ItemDiscount > 0) {
                    //
                    $payDiscountAmt = decimalVal($ItemDiscount, 2);
                    //
                }
                //
                //
                // CALCULATE DISCOUNT IF CASH BALANCE IS ZERO @PRIYANKA-22-SEP-21
                if ($utin_cash_balance == 0 || $utin_cash_balance == '0.00') {
                    //
                    //
                    if ($totalAmountRec > 0 || $raw_metal_valuation > 0) {
                        //
                        //if ($ItemDiscount == 0 || $ItemDiscount == '0.00') {
                            //
                            $amountDifference = decimalVal((round($final_valuation) - ($totalAmountRec + $raw_metal_valuation)), 2);
                            //
                            if ($amountDifference > 50) {
                                $utin_cash_balance = decimalVal(($amountDifference + $ItemDiscount), 2);
                            } else {
                                if ($ItemDiscount == 0 || $ItemDiscount == '0.00') {
                                    $payDiscountAmt = decimalVal($amountDifference,2);
                                }
                            }                                                        
                            //
                        //} 
                        //
                    }                    
                }
                //
                //
                if ($payDiscountAmt < 0) {
                    $payDiscountAmt = NULL;
                }
                //
                //
                // CALCULATE CASH BALANCE @PRIYANKA-22-SEP-21
                if ($totalAmountRec == 0 || $totalAmountRec == '0.00') {
                    //
                    if ($ItemDiscount > 0) {
                        $utin_cash_balance = decimalVal((round($final_valuation) - $ItemDiscount),2);
                    }
                    //
                }
                //  
                //                                                    
                //echo '$utin_cash_balance == ' . $utin_cash_balance;
                //echo("<br/>");     
                //
                //echo '$final_valuation == ' . $final_valuation;
                //echo("<br/>");                                                                                                                                                
                //
                //echo '$totalAmountRec == ' . $totalAmountRec;
                //echo("<br/>");
                //
                //echo '$payDiscountAmt == ' . $payDiscountAmt;
                //echo("<br/>");   
                //echo("<br/>");   
                //die;
                //
                //
                // FINAL CASH CRDR @PRIYANKA-22-SEP-21
                if ($utin_cash_balance < 0) {
                    $FinalCashCRDR = 'CR';
                } else {
                    $FinalCashCRDR = 'DR';
                }
                //
                //
                if ($payPreInvoiceNo != '' && $payPreInvoiceNo != NULL &&
                    $payInvoiceNo != '' && $payInvoiceNo != NULL) {
                //
                //
                // ******************************************************************************************************************
                // START CODE TO CREATE REQUEST FOR PAYMENT DETAILS (For user_transaction_invoice table entries) @PRIYANKA-22-SEP-21
                // ******************************************************************************************************************
                    //
                    if ($userId != '' && $userId != NULL) {
                        //
                        include 'omMainSellListPaymentDetailsImportFile.php';
                        //
                    }
                    //
                // ******************************************************************************************************************
                // END CODE TO CREATE REQUEST FOR PAYMENT DETAILS (For user_transaction_invoice table entries) @PRIYANKA-22-SEP-21
                // ******************************************************************************************************************
                //
                //
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
    $raw_metal_valuation = NULL;
    $raw_metal_gs_weight_gd = NULL;
    $raw_metal_valuation_gd = NULL;
    $raw_metal_gs_weight_sl = NULL;
    $raw_metal_valuation_sl = NULL;
    //
    //
    // (GOLD + SILVER) => TOTAL VARIABLES @PRIYANKA-22-SEP-21
    $utin_oth_chgs_amt = NULL;
    $valuation = NULL;
    $CGSTPer = NULL;
    $SGSTPer = NULL;
    $IGSTPer = NULL;
    $tot_price_cgst_chrg = NULL;
    $tot_price_sgst_chrg = NULL;
    $tot_price_igst_chrg = NULL;
    $tot_tax = NULL;
    $final_valuation = NULL;
    //
    //
    // VARIABLES FOR GOLD @PRIYANKA-22-SEP-21
    $gs_weight_gd = NULL;
    $nt_weight_gd = NULL;
    $fine_weight_gd = NULL;
    $final_fine_weight_gd = NULL;
    //
    $total_making_charges_gd = NULL;
    $valuation_gd = NULL;
    $tot_tax_gd = NULL;
    $final_valuation_gd = NULL;
    //
    //
    // VARIABLES FOR SILVER @PRIYANKA-22-SEP-21
    $gs_weight_sl = NULL;
    $nt_weight_sl = NULL;
    $fine_weight_sl = NULL;
    $final_fine_weight_sl = NULL;
    //
    $total_making_charges_sl = NULL;
    $valuation_sl = NULL;
    $tot_tax_sl = NULL;
    $final_valuation_sl = NULL;
    //  
    //
    // PAYMENT VARIABLES @PRIYANKA-22-SEP-21 
    $Cash = NULL;
    $Card = NULL;
    $Cheque = NULL;
    $totalAmountRec = NULL;
    $utin_cash_balance = NULL;
    $payDiscountAmt = NULL;
    $amountDifference = NULL;
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
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START TO ADD CODE FOR TO RECREATE JOURNAL ENTRIES @PRIYANKA-23SEP21
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//   include 'ommptbupjrnl.php';
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END TO ADD CODE FOR TO RECREATE JOURNAL ENTRIES @PRIYANKA-23SEP21
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
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