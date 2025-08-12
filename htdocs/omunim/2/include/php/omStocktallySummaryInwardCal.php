<?php

/*
 * **************************************************************************************************
 * @Description: STOCK TALLY INWARD STOCK FORRFID TAG CALCULATE INWARD FILE @AUTHOR:PRIYANKA-25OCT2021
 * **************************************************************************************************
 *
 * Created on OCT 25, 2021 12:30:58 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerSummaryInwardCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.92
 * @version 2.7.92
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:25OCT2021
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 *  @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: RENUKA SHARMA
 *  REASON:
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.92
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
$InwardQTY = 0;
$InwardGsWeight = 0;
$InwardNtWeight = 0;
$InwardFnWeight = 0;
//
//
$InwardGsWeightMG = 0;
$InwardNtWeightMG = 0;
$InwardFnWeightMG = 0;
//
$InwardGsWeightGM = 0;
$InwardNtWeightGM = 0;
$InwardFnWeightGM = 0;
//
$InwardGsWeightKG = 0;
$InwardNtWeightKG = 0;
$InwardFnWeightKG = 0;
//
$InwardGsWeightCT = 0;
$InwardNtWeightCT = 0;
$InwardFnWeightCT = 0;
//
//
//
$SumOfOutwardTagQTYOpMG = 0;
$SumOfOutwardTagGsWeightOpMG = 0;
$SumOfOutwardTagNtWeightOpMG = 0;
$SumOfOutwardTagFnWeightOpMG = 0;
//
$SumOfOutwardTagQTYOpGM = 0;
$SumOfOutwardTagGsWeightOpGM = 0;
$SumOfOutwardTagNtWeightOpGM = 0;
$SumOfOutwardTagFnWeightOpGM = 0;
//
$SumOfOutwardTagQTYOpKG = 0;
$SumOfOutwardTagGsWeightOpKG = 0;
$SumOfOutwardTagNtWeightOpKG = 0;
$SumOfOutwardTagFnWeightOpKG = 0;
//
$SumOfOutwardTagQTYOpCT = 0;
$SumOfOutwardTagGsWeightOpCT = 0;
$SumOfOutwardTagNtWeightOpCT = 0;
$SumOfOutwardTagFnWeightOpCT = 0;
//
$TotalSumOfOutwardTagGsWeightOpMG = 0;
$TotalSumOfOutwardTagNtWeightOpMG = 0;
$TotalSumOfOutwardTagFnWeightOpMG = 0;
//
$TotalSumOfOutwardTagGsWeightOpGM = 0;
$TotalSumOfOutwardTagNtWeightOpGM = 0;
$TotalSumOfOutwardTagFnWeightOpGM = 0;
//
$TotalSumOfOutwardTagGsWeightOpKG = 0;
$TotalSumOfOutwardTagNtWeightOpKG = 0;
$TotalSumOfOutwardTagFnWeightOpKG = 0;
//
$TotalSumOfOutwardTagGsWeightOpCT = 0;
$TotalSumOfOutwardTagNtWeightOpCT = 0;
$TotalSumOfOutwardTagFnWeightOpCT = 0;
//
$TotalSumOfOutwardTagQTYOp = 0;
$TotalSumOfOutwardTagGsWeightOp = 0;
$TotalSumOfOutwardTagNtWeightOp = 0;
$TotalSumOfOutwardTagFnWeightOp = 0;
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//
//
//echo 'sttr_transaction_type == ' . $rowStockReportMainQuery['sttr_transaction_type'] . '<br />';
//
//
// IF TRANSACTION TYPE IS PURBYSUPP @AUTHOR:PRIYANKA-12JAN2022
if ($rowStockReportMainQuery['rfidtly_transaction_type'] == 'PURBYSUPP' ||
        $rowStockReportMainQuery['rfidtly_stock_type'] == 'wholesale') {
    //
    //
    // START CODE TO GET TAG QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:PRIYANKA-12JAN2022
    parse_str(getTableValues("SELECT SUM(sttr_quantity) AS SumOfOutwardTagQTY, "
                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightMG, "
                    . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightMG, "
                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightMG, "
                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightGM, "
                    . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightGM, "
                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightGM, "
                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightKG, "
                    . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightKG, "
                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightKG, "
                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightCT, "
                    . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightCT, "
                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightCT "
                    . "FROM stock_transaction "
                    . "WHERE sttr_owner_id = '$sessionOwnerId' "
                    . "and sttr_firm_id = '$rowStockReportMainQuery[rfidtly_firm_id]' "
                    . "and sttr_st_id = '$rowStockReportMainQuery[rfidtly_st_id]' "
                    . "and sttr_transaction_type IN ('TAG') "
                    . "and sttr_stock_type = 'retail' "
                    . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                    . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
                    . "$dateStrsttr "));
    //
    //
    $TotalSumOfOutwardTagGsWeightMG = ($SumOfOutwardTagGsWeightMG / 1000);
    $TotalSumOfOutwardTagNtWeightMG = ($SumOfOutwardTagNtWeightMG / 1000);
    $TotalSumOfOutwardTagFnWeightMG = ($SumOfOutwardTagFnWeightMG / 1000);
    //
    $TotalSumOfOutwardTagGsWeightGM = $SumOfOutwardTagGsWeightGM;
    $TotalSumOfOutwardTagNtWeightGM = $SumOfOutwardTagNtWeightGM;
    $TotalSumOfOutwardTagFnWeightGM = $SumOfOutwardTagFnWeightGM;
    //
    $TotalSumOfOutwardTagGsWeightKG = ($SumOfOutwardTagGsWeightKG * 1000);
    $TotalSumOfOutwardTagNtWeightKG = ($SumOfOutwardTagNtWeightKG * 1000);
    $TotalSumOfOutwardTagFnWeightKG = ($SumOfOutwardTagFnWeightKG * 1000);
    //
    $TotalSumOfOutwardTagGsWeightCT = ($SumOfOutwardTagGsWeightCT / 5);
    $TotalSumOfOutwardTagNtWeightCT = ($SumOfOutwardTagNtWeightCT / 5);
    $TotalSumOfOutwardTagFnWeightCT = ($SumOfOutwardTagFnWeightCT / 5);
    //
    //
    $TotalSumOfOutwardTagQTY = ($SumOfOutwardTagQTY);
    $TotalSumOfOutwardTagGsWeight = ($TotalSumOfOutwardTagGsWeightMG + $TotalSumOfOutwardTagGsWeightGM + $TotalSumOfOutwardTagGsWeightKG + $TotalSumOfOutwardTagGsWeightCT);
    $TotalSumOfOutwardTagNtWeight = ($TotalSumOfOutwardTagNtWeightMG + $TotalSumOfOutwardTagNtWeightGM + $TotalSumOfOutwardTagNtWeightKG + $TotalSumOfOutwardTagNtWeightCT);
    $TotalSumOfOutwardTagFnWeight = ($TotalSumOfOutwardTagFnWeightMG + $TotalSumOfOutwardTagFnWeightGM + $TotalSumOfOutwardTagFnWeightKG + $TotalSumOfOutwardTagFnWeightCT);
    //
    //
}
//
//
//echo '$TotalSumOfOutwardTagQTY == ' . $TotalSumOfOutwardTagQTY . '<br />';
//echo '$TotalSumOfOutwardTagGsWeight == ' . $TotalSumOfOutwardTagGsWeight . '<br />';
//echo '$TotalSumOfOutwardTagNtWeight == ' . $TotalSumOfOutwardTagNtWeight . '<br />';
//echo '$TotalSumOfOutwardTagFnWeight == ' . $TotalSumOfOutwardTagFnWeight . '<br />';
//
//
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//
//
// START CODE TO GET INWARD QTY, GS WEIGHT, NET WEIGHT, INDICATOR FOR TYPE MG, GM, KG, CT @AUTHOR:PRIYANKA-07DEC2021
$inwardStockDet = "SELECT "
        . "SumOfInwardQTY, "
        . "SumOfInwardGsWeightMG, "
        . "SumOfInwardGsWeightGM, "
        . "SumOfInwardGsWeightKG, "
        . "SumOfInwardGsWeightCT, "
        . "SumOfInwardNtWeightMG, "
        . "SumOfInwardNtWeightGM, "
        . "SumOfInwardNtWeightKG, "
        . "SumOfInwardNtWeightCT, "
        . "SumOfInwardFnWeightMG, "
        . "SumOfInwardFnWeightGM, "
        . "SumOfInwardFnWeightKG, "
        . "SumOfInwardFnWeightCT, "
        . "sttr_indicator "
        . "FROM TEMP_INWARD_STOCK "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id = '$rowStockReportMainQuery[rfidtly_firm_id]' "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' ";
//
//echo '$inwardStockDet == ' . $inwardStockDet . '<br />';
//
$resInwardStockDet = mysqli_query($conn, $inwardStockDet);
$rowInwardStockDet = mysqli_fetch_array($resInwardStockDet);
//
//
$InwardGsWeightMG = ($rowInwardStockDet[SumOfInwardGsWeightMG] / 1000);
$InwardNtWeightMG = ($rowInwardStockDet[SumOfInwardNtWeightMG] / 1000);
$InwardFnWeightMG = ($rowInwardStockDet[SumOfInwardFnWeightMG] / 1000);
//
$InwardGsWeightGM = ($rowInwardStockDet[SumOfInwardGsWeightGM]);
$InwardNtWeightGM = ($rowInwardStockDet[SumOfInwardNtWeightGM]);
$InwardFnWeightGM = ($rowInwardStockDet[SumOfInwardFnWeightGM]);
//
$InwardGsWeightKG = ($rowInwardStockDet[SumOfInwardGsWeightKG] * 1000);
$InwardNtWeightKG = ($rowInwardStockDet[SumOfInwardNtWeightKG] * 1000);
$InwardFnWeightKG = ($rowInwardStockDet[SumOfInwardFnWeightKG] * 1000);
//
$InwardGsWeightCT = ($rowInwardStockDet[SumOfInwardGsWeightCT] / 5);
$InwardNtWeightCT = ($rowInwardStockDet[SumOfInwardNtWeightCT] / 5);
$InwardFnWeightCT = ($rowInwardStockDet[SumOfInwardFnWeightCT] / 5);
//
//
// INWARD QTY @AUTHOR:PRIYANKA-07DEC2021
$InwardQTY = (($rowInwardStockDet[SumOfInwardQTY]) - $TotalSumOfOutwardTagQTY);
//
if ($InwardQTY == '' || $InwardQTY == NULL) {
    $InwardQTY = 0;
}
//
//
// INWARD GS WEIGHT @AUTHOR:PRIYANKA-07DEC2021
$InwardGsWeight = (($InwardGsWeightMG + $InwardGsWeightGM + $InwardGsWeightKG + $InwardGsWeightCT) - $TotalSumOfOutwardTagGsWeight);
//
//
// INWARD NT WEIGHT @AUTHOR:PRIYANKA-07DEC2021
$InwardNtWeight = (($InwardNtWeightMG + $InwardNtWeightGM + $InwardNtWeightKG + $InwardNtWeightCT) - $TotalSumOfOutwardTagNtWeight);
//
//
// INWARD FN WEIGHT @AUTHOR:PRIYANKA-07DEC2021
$InwardFnWeight = (($InwardFnWeightMG + $InwardFnWeightGM + $InwardFnWeightKG + $InwardFnWeightCT) - $TotalSumOfOutwardTagFnWeight);
//
//                        
//
//echo '$InwardQTY == ' . $InwardQTY . '<br />';
//echo '$InwardGsWeight == ' . $InwardGsWeight . '<br />';
//echo '$InwardNtWeight == ' . $InwardNtWeight . '<br />'; 
//
//
// ADDED CODE FOR ALL STOCK LEDGER REPORT @PRIYANKA-11JAN2022
if ($_REQUEST['subPanelName'] == 'AllStockList') {
    //
    //
    $totalInwardQty += $InwardQTY;
    //
    //
    $totalInwardGsWt += $InwardGsWeight;
    //
    //
    $totalInwardNtWt += $InwardNtWeight;
    //
    //
    $totalInwardFnWt += $InwardFnWeight;
    //
    //
} else {
    //
    //
    if ($InwardGsWeight > 0 && $InwardQTY > 0) {
        $totalInwardQty += $InwardQTY;
    }
    //
    //
    if ($InwardGsWeight > 0) {
        $totalInwardGsWt += $InwardGsWeight;
    }
    //
    //
    if ($InwardNtWeight > 0) {
        $totalInwardNtWt += $InwardNtWeight;
    }
    //
    //
    if ($InwardFnWeight > 0) {
        $totalInwardFnWt += $InwardFnWeight;
    }
    //
    //
}
//
//
?>