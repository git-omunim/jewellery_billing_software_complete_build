<?php
/*
 * **************************************************************************************************
 * @Description:  BOOK STOCK CALCULATE FOR RFID TAG OPENING FILE @AUTHOR:RENUKA SHARMA
 * **************************************************************************************************
  * @FileName: omStocktallySummarybookstockCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@omunim.com
 * @ProjectName: OMUNIM 
 * @version 2.7.90
 * @Copyright (c) 2021 www.omunim.com
 * @All rights reserved
 *  Copyright 2023 omunim pvt ltd
  */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
//
$OpeningBookQTY = 0;
$OpeningBookGsWeight = 0;
$OpeningBookNtWeight = 0;
$OpeningBookFnWeight = 0;
//
//
$OpeningBookQTYOp = 0;
$OpeningBookGsWeightOp = 0;
$OpeningBookNtWeightOp = 0;
$OpeningBookFnWeightOp = 0;
//
$OpeningBookGsWeightMG = 0;
$OpeningBookGsWeightGM = 0;
$OpeningBookGsWeightKG = 0;
$OpeningBookGsWeightCT = 0;
//
$OpeningBookNtWeightMG = 0;
$OpeningBookNtWeightGM = 0;
$OpeningBookNtWeightKG = 0;
$OpeningBookNtWeightCT = 0;
//
$OpeningBookFnWeightMG = 0;
$OpeningBookFnWeightGM = 0;
$OpeningBookFnWeightKG = 0;
$OpeningBookFnWeightCT = 0;
//
//
// START CODE TO GET OPENING QTY, GS WEIGHT, NET WEIGHT FOR TYPE MG, GM, KG, CT 
$openingStockDet = "SELECT "
        . "OpeningBookQTYOp, "
        . "OpeningBookGsWeightMG, "
        . "OpeningBookGsWeightGM, "
        . "OpeningBookGsWeightKG, "
        . "OpeningBookGsWeightCT, "
        . "OpeningBookNtWeightMG, "
        . "OpeningBookNtWeightGM, "
        . "OpeningBookNtWeightKG, "
        . "OpeningBookNtWeightCT, "
        . "OpeningBookFnWeightMG, "
        . "OpeningBookFnWeightGM, "
        . "OpeningBookFnWeightKG, "
        . "OpeningBookFnWeightCT, "
        . "sttr_indicator "
        . "FROM TEMP_OPENING_BOOK_STOCK "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id = '$rowStockReportMainQuery[rfidtly_firm_id]' "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' ";
//
//echo '$openingStockDet == ' . $openingStockDet . '<br />';
//
$resOpeningBookStockDet = mysqli_query($conn, $openingStockDet);
$rowOpeningBookStockDet = mysqli_fetch_array($resOpeningBookStockDet, MYSQLI_ASSOC);
//
$OpeningBookGsWeightMG = ($rowOpeningBookStockDet[OpeningBookGsWeightMG] / 1000);
$OpeningBookNtWeightMG = ($rowOpeningBookStockDet[OpeningBookNtWeightMG] / 1000);
$OpeningBookFnWeightMG = ($rowOpeningBookStockDet[OpeningBookFnWeightMG] / 1000);
//
$OpeningBookGsWeightGM = ($rowOpeningBookStockDet[OpeningBookGsWeightGM]);
$OpeningBookNtWeightGM = ($rowOpeningBookStockDet[OpeningBookNtWeightGM]);
$OpeningBookFnWeightGM = ($rowOpeningBookStockDet[OpeningBookFnWeightGM]);
//
$OpeningBookGsWeightKG = ($rowOpeningBookStockDet[OpeningBookGsWeightKG] * 1000);
$OpeningBookNtWeightKG = ($rowOpeningBookStockDet[OpeningBookNtWeightKG] * 1000);
$OpeningBookFnWeightKG = ($rowOpeningBookStockDet[OpeningBookFnWeightKG] * 1000);
//
$OpeningBookGsWeightCT = ($rowOpeningBookStockDet[OpeningBookGsWeightCT] / 5);
$OpeningBookNtWeightCT = ($rowOpeningBookStockDet[OpeningBookNtWeightCT] / 5);
$OpeningBookFnWeightCT = ($rowOpeningBookStockDet[OpeningBookFnWeightCT] / 5);
//
//
//echo '$OpeningBookGsWeightGM == ' . $OpeningBookGsWeightGM . '<br />';
//echo '$OpeningBookNtWeightGM == ' . $OpeningBookNtWeightGM . '<br />';
//echo '$OpeningBookFnWeightGM == ' . $OpeningBookFnWeightGM . '<br />'; 
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// OPENING QTY
$OpeningBookQTYOp = $rowOpeningBookStockDet[OpeningBookQTYOp];
//
if ($OpeningBookQTYOp == '' || $OpeningBookQTYOp == NULL) {
    $OpeningBookQTYOp = 0;
}
//
//
// OPENING GS WEIGHT
$OpeningBookGsWeightOp = ($OpeningBookGsWeightMG + $OpeningBookGsWeightGM + $OpeningBookGsWeightKG + $OpeningBookGsWeightCT);
//
//
// OPENING NT WEIGHT
$OpeningBookNtWeightOp = ($OpeningBookNtWeightMG + $OpeningBookNtWeightGM + $OpeningBookNtWeightKG + $OpeningBookNtWeightCT);
//
//
// OPENING FN WEIGHT 
$OpeningBookFnWeightOp = ($OpeningBookFnWeightMG + $OpeningBookFnWeightGM + $OpeningBookFnWeightKG + $OpeningBookFnWeightCT);
//
//  
//                                              
//
//echo '$OpeningBookQTYOp == ' . $OpeningBookQTYOp . '<br />';
//echo '$OpeningBookGsWeightOp == ' . $OpeningBookGsWeightOp . '<br />';
//echo '$OpeningBookNtWeightOp == ' . $OpeningBookNtWeightOp . '<br />'; 
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//***********************************************************************************************************
// START CODE FOR STOCK  TALLY FOR RFID TAG CALCULATE OPENING OUTWARD 
//***********************************************************************************************************
//
include 'omStockTallySummaryOpeningBookOutwardCal.php';
//***********************************************************************************************************
// END CODE FOR STOCK TALLY FOR RFID TAG CALCULATE OPENING OUTWARD
//***********************************************************************************************************
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
////
//echo '$OpeningBookQTYOp == ' . $OpeningBookQTYOp . '<br />';
//echo '$OutwardBookQTYOp == ' . $OutwardBookQTYOp . '<br />';
//
//
//echo '$OpeningBookGsWeightOp == ' . $OpeningBookGsWeightOp . '<br />';
//echo '$OutwardBookGsWeightOp == ' . $OutwardBookGsWeightOp . '<br />';
//
//
$OpeningBookQTY = ($OpeningBookQTYOp - $OutwardBookQTYOp);
$OpeningBookGsWeight = ($OpeningBookGsWeightOp - $OutwardBookGsWeightOp);
$OpeningBookNtWeight = ($OpeningBookNtWeightOp - $OutwardBookNtWeightOp);
$OpeningBookFnWeight = ($OpeningBookFnWeightOp - $OutwardBookFnWeightOp);
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//echo '$OpeningBookQTY == ' . $OpeningBookQTY . '<br />';
//echo '$OpeningBookGsWeight == ' . $OpeningBookGsWeight . '<br />';
//echo '$OpeningBookNtWeight == ' . $OpeningBookNtWeight . '<br />'; 
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// ADDED CODE FOR ALL STOCK LEDGER REPORT @PRIYANKA-11JAN2022
if ($_REQUEST['subPanelName'] == 'AllStockList') {
    //
    //
    $totalOpeningBookQty += $OpeningBookQTY;
    //
    //
    $totalOpeningBookGsWt += $OpeningBookGsWeight;
    //
    //
    $totalOpeningBookNtWt += $OpeningBookNtWeight;
    //
    //
    $totalOpeningBookFnWt += $OpeningBookFnWeight;
    //
    //
} else {
    //
    //
    if ($OpeningBookQTY > 0) {
        $totalOpeningBookQty += $OpeningBookQTY;
    }
    //
    //
    if ($OpeningBookGsWeight > 0) {
        $totalOpeningBookGsWt += $OpeningBookGsWeight;
    }
    //
    //
    if ($OpeningBookNtWeight > 0) {
        $totalOpeningBookNtWt += $OpeningBookNtWeight;
    }
    //
    //
    if ($OpeningBookFnWeight > 0) {
        $totalOpeningBookFnWt += $OpeningBookFnWeight;
    }
    //
    //
}
//echo '$totalOpeningBookQty'.$totalOpeningBookQty;
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
?>