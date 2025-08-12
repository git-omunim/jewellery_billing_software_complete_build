<?php
/*
 * **************************************************************************************************
 * @Description:  STOCK TALLY REPORT MAIN PAGE @AUTHOR:YUVRAJKAMBLE-28OCT2022
 * **************************************************************************************************
 *
 * Created on OCT 14, 2021 04:29:58 PM 
 * **************************************************************************************************
 * @FileName: omStockLedgerSummaryOpeningCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM  
 * @version 2.7.90
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:14OCT2021
 *  AUTHOR: YUVRAJ 
 *  REASON:
 *
 * * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: RENUKA SHARMA 
 *  REASON:
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.84
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
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
//
$OpeningQTY = 0;
$OpeningGsWeight = 0;
$OpeningNtWeight = 0;
$OpeningFnWeight = 0;
//
//
$OpeningQTYOp = 0;
$OpeningGsWeightOp = 0;
$OpeningNtWeightOp = 0;
$OpeningFnWeightOp = 0;
//
$OpeningGsWeightMG = 0;
$OpeningGsWeightGM = 0;
$OpeningGsWeightKG = 0;
$OpeningGsWeightCT = 0;
//
$OpeningNtWeightMG = 0;
$OpeningNtWeightGM = 0;
$OpeningNtWeightKG = 0;
$OpeningNtWeightCT = 0;
//
$OpeningFnWeightMG = 0;
$OpeningFnWeightGM = 0;
$OpeningFnWeightKG = 0;
$OpeningFnWeightCT = 0;
//
//
// START CODE TO GET OPENING QTY, GS WEIGHT, NET WEIGHT FOR TYPE MG, GM, KG, CT 
$openingStockDet = "SELECT "
        . "OpeningQTYOp, "
        . "OpeningGsWeightMG, "
        . "OpeningGsWeightGM, "
        . "OpeningGsWeightKG, "
        . "OpeningGsWeightCT, "
        . "OpeningNtWeightMG, "
        . "OpeningNtWeightGM, "
        . "OpeningNtWeightKG, "
        . "OpeningNtWeightCT, "
        . "OpeningFnWeightMG, "
        . "OpeningFnWeightGM, "
        . "OpeningFnWeightKG, "
        . "OpeningFnWeightCT, "
        . "rfidtly_indicator "
        . "FROM TEMP_OPENING_STOCK "
        . "WHERE rfidtly_owner_id = '$sessionOwnerId' "
        . "and rfidtly_firm_id = '$FirmName' "
        . "and rfidtly_product_category = '$Category' "
        . "and rfidtly_product_name = '$Name' "
        . "and rfidtly_stock_type = '$StockType' "
        . "and rfidtly_purity = '$Purity' "
        . "and rfidtly_reporting_preiod = '$rfidtlyReportingPreiod' "
        . "and rfidtly_metal_type = '$MetalType' ";
//
//echo '$openingStockDet == ' . $openingStockDet . '<br />';
//echo "Category 22 :- ".strtoupper($Category)."<br>"; 
//
$resOpeningStockDet = mysqli_query($conn, $openingStockDet);
$rowOpeningStockDet = mysqli_fetch_array($resOpeningStockDet, MYSQLI_ASSOC);
//
$OpeningGsWeightMG = ($rowOpeningStockDet[OpeningGsWeightMG] / 1000);
$OpeningNtWeightMG = ($rowOpeningStockDet[OpeningNtWeightMG] / 1000);
$OpeningFnWeightMG = ($rowOpeningStockDet[OpeningFnWeightMG] / 1000);
//
$OpeningGsWeightGM = ($rowOpeningStockDet[OpeningGsWeightGM]);
$OpeningNtWeightGM = ($rowOpeningStockDet[OpeningNtWeightGM]);
$OpeningFnWeightGM = ($rowOpeningStockDet[OpeningFnWeightGM]);
//
$OpeningGsWeightKG = ($rowOpeningStockDet[OpeningGsWeightKG] * 1000);
$OpeningNtWeightKG = ($rowOpeningStockDet[OpeningNtWeightKG] * 1000);
$OpeningFnWeightKG = ($rowOpeningStockDet[OpeningFnWeightKG] * 1000);
//
$OpeningGsWeightCT = ($rowOpeningStockDet[OpeningGsWeightCT] / 5);
$OpeningNtWeightCT = ($rowOpeningStockDet[OpeningNtWeightCT] / 5);
$OpeningFnWeightCT = ($rowOpeningStockDet[OpeningFnWeightCT] / 5);
//
//
//echo '$OpeningGsWeightGM == ' . $OpeningGsWeightGM . '<br />';
//echo '$OpeningNtWeightGM == ' . $OpeningNtWeightGM . '<br />';
//echo '$OpeningFnWeightGM == ' . $OpeningFnWeightGM . '<br />'; 
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// OPENING QTY @AUTHOR:YUVRAJ-28OCT2022
$OpeningQTYOp = $rowOpeningStockDet[OpeningQTYOp];
//
if ($OpeningQTYOp == '' || $OpeningQTYOp == NULL) {
    $OpeningQTYOp = 0;
}
//
//
// OPENING GS WEIGHT @AUTHOR:YUVRAJ-28OCT2022
$OpeningGsWeightOp = ($OpeningGsWeightMG + $OpeningGsWeightGM + $OpeningGsWeightKG + $OpeningGsWeightCT);
//
//
// OPENING NT WEIGHT @AUTHOR:YUVRAJ-28OCT2022
$OpeningNtWeightOp = ($OpeningNtWeightMG + $OpeningNtWeightGM + $OpeningNtWeightKG + $OpeningNtWeightCT);
//
//
// OPENING FN WEIGHT @AUTHOR:YUVRAJ-28OCT2022
$OpeningFnWeightOp = ($OpeningFnWeightMG + $OpeningFnWeightGM + $OpeningFnWeightKG + $OpeningFnWeightCT);
//
//  
//                                              
//
//echo '$OpeningQTYOp == ' . $OpeningQTYOp . '<br />';
//echo '$OpeningGsWeightOp == ' . $OpeningGsWeightOp . '<br />';
//echo '$OpeningNtWeightOp == ' . $OpeningNtWeightOp . '<br />'; 
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:YUVRAJ-28OCT2022
//***********************************************************************************************************
//
include 'omStockTallySummaryOpeningOutwardCal.php';
//include 'omStockLedgerSummaryOpeningOutwardCal.php';
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:YUVRAJ-28OCT2022
//***********************************************************************************************************
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//echo '$OpeningQTYOp == ' . $OpeningQTYOp . '<br />';
//echo '$OutwardQTYOp == ' . $OutwardQTYOp . '<br />';
//
//
//echo '$OpeningGsWeightOp == ' . $OpeningGsWeightOp . '<br />';
//echo '$OutwardGsWeightOp == ' . $OutwardGsWeightOp . '<br />';
//
//
$OpeningQTY = ($OpeningQTYOp - $OutwardQTYOp);
$OpeningGsWeight = ($OpeningGsWeightOp - $OutwardGsWeightOp);
$OpeningNtWeight = ($OpeningNtWeightOp - $OutwardNtWeightOp);
$OpeningFnWeight = ($OpeningFnWeightOp - $OutwardFnWeightOp);
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//echo '$OpeningQTY == ' . $OpeningQTY . '<br />';
//echo '$OpeningGsWeight == ' . $OpeningGsWeight . '<br />';
//echo '$OpeningNtWeight == ' . $OpeningNtWeight . '<br />'; 
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// ADDED CODE FOR ALL STOCK LEDGER REPORT @YUVRAJ-28OCT2022
if ($_REQUEST['subPanelName'] == 'AllStockList') {
    //
    //
    $totalOpeningQty += $OpeningQTY;
    //
    //
    $totalOpeningGsWt += $OpeningGsWeight;
    //
    //
    $totalOpeningNtWt += $OpeningNtWeight;
    //
    //
    $totalOpeningFnWt += $OpeningFnWeight;
    //
    //
} else {
    //
    //
    if ($OpeningGsWeight > 0 && $OpeningQTY > 0) {
        $totalOpeningQty += $OpeningQTY;
    }
    //
    //
    if ($OpeningGsWeight > 0) {
        $totalOpeningGsWt += $OpeningGsWeight;
    }
    //
    //
    if ($OpeningNtWeight > 0) {
        $totalOpeningNtWt += $OpeningNtWeight;
    }
    //
    //
    if ($OpeningFnWeight > 0) {
        $totalOpeningFnWt += $OpeningFnWeight;
    }
    //
    //
}
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
?>