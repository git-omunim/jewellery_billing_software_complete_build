<?php
/*
 * **************************************************************************************************
 * @Description: STOCK LEDGER SUMMARY CALCULATE TODAY OUTWARD FILE @AUTHOR:PRIYANKA-25OCT2021
 * **************************************************************************************************
 *
 * Created on OCT 25, 2021 01:20:12 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerSummaryOutwardCal.php
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
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
//***********************************************************************************************************
//
$OutwardQTY = 0;
$OutwardGsWeight = 0;
$OutwardNtWeight = 0;
$OutwardFnWeight = 0; 
//
$OutwardGsWeightMG = 0;
$OutwardNtWeightMG = 0;
$OutwardFnWeightMG = 0;
//
$OutwardGsWeightGM = 0;
$OutwardNtWeightGM = 0;
$OutwardFnWeightGM = 0;
//
$OutwardGsWeightKG = 0;
$OutwardNtWeightKG = 0;
$OutwardFnWeightKG = 0;
//
$OutwardGsWeightCT = 0;
$OutwardNtWeightCT = 0;
$OutwardFnWeightCT = 0;
//
$SumOfOutwardTagQTYMG = 0;
$SumOfOutwardTagGsWeightMG = 0;
$SumOfOutwardTagNtWeightMG = 0;
$SumOfOutwardTagFnWeightMG = 0;
//
$SumOfOutwardTagQTYGM = 0;
$SumOfOutwardTagGsWeightGM = 0;
$SumOfOutwardTagNtWeightGM = 0;
$SumOfOutwardTagFnWeightGM = 0;
//
$SumOfOutwardTagQTYKG = 0;
$SumOfOutwardTagGsWeightKG = 0;
$SumOfOutwardTagNtWeightKG = 0;
$SumOfOutwardTagFnWeightKG = 0;
//
$SumOfOutwardTagQTYCT = 0;
$SumOfOutwardTagGsWeightCT = 0;
$SumOfOutwardTagNtWeightCT = 0;
$SumOfOutwardTagFnWeightCT = 0;
//
$TotalSumOfOutwardTagGsWeightMG = 0;
$TotalSumOfOutwardTagNtWeightMG = 0;
$TotalSumOfOutwardTagFnWeightMG = 0;
//
$TotalSumOfOutwardTagGsWeightGM = 0;
$TotalSumOfOutwardTagNtWeightGM = 0;
$TotalSumOfOutwardTagFnWeightGM = 0;
//
$TotalSumOfOutwardTagGsWeightKG = 0;
$TotalSumOfOutwardTagNtWeightKG = 0;
$TotalSumOfOutwardTagFnWeightKG = 0;
//
$TotalSumOfOutwardTagGsWeightCT = 0;
$TotalSumOfOutwardTagNtWeightCT = 0;
$TotalSumOfOutwardTagFnWeightCT = 0;
//
$TotalSumOfOutwardTagQTY = 0;
$TotalSumOfOutwardTagGsWeight = 0;
$TotalSumOfOutwardTagNtWeight = 0;
$TotalSumOfOutwardTagFnWeight = 0;
//
//
//
// START CODE TO GET OUTWARD QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:PRIYANKA-18DEC2021
$outwardStockDet = "SELECT "
        . "OutwardQTY, "
        . "OutwardGsWeightMG, "
        . "OutwardGsWeightGM, "
        . "OutwardGsWeightKG, "
        . "OutwardGsWeightCT, "
        . "OutwardNtWeightMG, "
        . "OutwardNtWeightGM, "
        . "OutwardNtWeightKG, "
        . "OutwardNtWeightCT, "
        . "OutwardFnWeightMG, "
        . "OutwardFnWeightGM, "
        . "OutwardFnWeightKG, "
        . "OutwardFnWeightCT, "
        . "sttr_indicator "
        . "FROM TEMP_TODAY_OUTWARD_STOCK "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id = '$rowStockReportMainQuery[sttr_firm_id]' "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' ";
//
//echo '$outwardStockDet == ' . $outwardStockDet . '<br /><br />';
//
$resOutwardStockDet = mysqli_query($conn, $outwardStockDet);
$rowOutwardStockDet = mysqli_fetch_array($resOutwardStockDet);
//
$OutwardGsWeightMG = ($rowOutwardStockDet[OutwardGsWeightMG] / 1000);
$OutwardNtWeightMG = ($rowOutwardStockDet[OutwardNtWeightMG] / 1000);
$OutwardFnWeightMG = ($rowOutwardStockDet[OutwardFnWeightMG] / 1000);
//
$OutwardGsWeightGM = ($rowOutwardStockDet[OutwardGsWeightGM]);
$OutwardNtWeightGM = ($rowOutwardStockDet[OutwardNtWeightGM]);
$OutwardFnWeightGM = ($rowOutwardStockDet[OutwardFnWeightGM]);
//
$OutwardGsWeightKG = ($rowOutwardStockDet[OutwardGsWeightKG] * 1000);
$OutwardNtWeightKG = ($rowOutwardStockDet[OutwardNtWeightKG] * 1000);
$OutwardFnWeightKG = ($rowOutwardStockDet[OutwardFnWeightKG] * 1000);
//
$OutwardGsWeightCT = ($rowOutwardStockDet[OutwardGsWeightCT] / 5);
$OutwardNtWeightCT = ($rowOutwardStockDet[OutwardNtWeightCT] / 5);
$OutwardFnWeightCT = ($rowOutwardStockDet[OutwardFnWeightCT] / 5);
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//echo 'sttr_transaction_type == ' . $rowStockReportMainQuery['sttr_transaction_type'] . '<br />';
//
//
//if ($rowStockReportMainQuery['sttr_transaction_type'] == 'PURCHASE' ||
//    $rowStockReportMainQuery['sttr_stock_type'] == 'wholesale') {
//    //
//    //
//    // START CODE TO GET TAG QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:PRIYANKA-18DEC2021
//    parse_str(getTableValues("SELECT SUM(sttr_quantity) AS SumOfOutwardTagQTY, "
//                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightMG, "
//                    . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightMG, "
//                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightMG, "
//                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightGM, "
//                    . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightGM, "
//                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightGM, "
//                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightKG, "
//                    . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightKG, "
//                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightKG, "
//                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightCT, "
//                    . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightCT, "
//                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightCT "
//                    . "FROM stock_transaction "
//                    . "WHERE sttr_owner_id = '$sessionOwnerId' "
//                    . "and sttr_firm_id = '$rowStockReportMainQuery[sttr_firm_id]' "
//                    . "and sttr_st_id = '$rowStockReportMainQuery[sttr_st_id]' "
//                    . "and sttr_transaction_type IN ('TAG') "
//                    . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver') "
//                    . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
//                    . "$dateStrForOutwards "));
//    //
//    //
//    $TotalSumOfOutwardTagGsWeightMG = ($SumOfOutwardTagGsWeightMG / 1000);
//    $TotalSumOfOutwardTagNtWeightMG = ($SumOfOutwardTagNtWeightMG / 1000);
//    $TotalSumOfOutwardTagFnWeightMG = ($SumOfOutwardTagFnWeightMG / 1000);
//    //
//    $TotalSumOfOutwardTagGsWeightGM = $SumOfOutwardTagGsWeightGM;
//    $TotalSumOfOutwardTagNtWeightGM = $SumOfOutwardTagNtWeightGM;
//    $TotalSumOfOutwardTagFnWeightGM = $SumOfOutwardTagFnWeightGM;
//    //
//    $TotalSumOfOutwardTagGsWeightKG = ($SumOfOutwardTagGsWeightKG * 1000);
//    $TotalSumOfOutwardTagNtWeightKG = ($SumOfOutwardTagNtWeightKG * 1000);
//    $TotalSumOfOutwardTagFnWeightKG = ($SumOfOutwardTagFnWeightKG * 1000);
//    //
//    $TotalSumOfOutwardTagGsWeightCT = ($SumOfOutwardTagGsWeightCT / 5);
//    $TotalSumOfOutwardTagNtWeightCT = ($SumOfOutwardTagNtWeightCT / 5);
//    $TotalSumOfOutwardTagFnWeightCT = ($SumOfOutwardTagFnWeightCT / 5);
//    //
//    //
//    $TotalSumOfOutwardTagQTY = ($SumOfOutwardTagQTY);
//    $TotalSumOfOutwardTagGsWeight = ($TotalSumOfOutwardTagGsWeightMG + $TotalSumOfOutwardTagGsWeightGM + $TotalSumOfOutwardTagGsWeightKG + $TotalSumOfOutwardTagGsWeightCT);
//    $TotalSumOfOutwardTagNtWeight = ($TotalSumOfOutwardTagNtWeightMG + $TotalSumOfOutwardTagNtWeightGM + $TotalSumOfOutwardTagNtWeightKG + $TotalSumOfOutwardTagNtWeightCT);
//    $TotalSumOfOutwardTagFnWeight = ($TotalSumOfOutwardTagFnWeightMG + $TotalSumOfOutwardTagFnWeightGM + $TotalSumOfOutwardTagFnWeightKG + $TotalSumOfOutwardTagFnWeightCT);
//    //
//    //
//}
//
//
//echo '$TotalSumOfOutwardTagQTY == ' . $TotalSumOfOutwardTagQTY . '<br />';
//echo '$TotalSumOfOutwardTagGsWeight == ' . $TotalSumOfOutwardTagGsWeight . '<br />';
//echo '$TotalSumOfOutwardTagNtWeight == ' . $TotalSumOfOutwardTagNtWeight . '<br />';
//echo '$TotalSumOfOutwardTagFnWeight == ' . $TotalSumOfOutwardTagFnWeight . '<br />';
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// OUTWARD QTY @AUTHOR:PRIYANKA-18DEC2021
$OutwardQTY = $rowOutwardStockDet[OutwardQTY];
//
if ($OutwardQTY == '' || $OutwardQTY == NULL) {
    $OutwardQTY = 0;
}
//
//
// OUTWARD GS WEIGHT @AUTHOR:PRIYANKA-18DEC2021
$OutwardGsWeight = ($OutwardGsWeightMG + $OutwardGsWeightGM + $OutwardGsWeightKG + $OutwardGsWeightCT);
//
//
// OUTWARD NT WEIGHT @AUTHOR:PRIYANKA-18DEC2021
$OutwardNtWeight = ($OutwardNtWeightMG + $OutwardNtWeightGM + $OutwardNtWeightKG + $OutwardNtWeightCT);
//
//
// OUTWARD FN WEIGHT @AUTHOR:PRIYANKA-18DEC2021
$OutwardFnWeight = ($OutwardFnWeightMG + $OutwardFnWeightGM + $OutwardFnWeightKG + $OutwardFnWeightCT);
//
//
//echo '$OutwardQTY == ' . $OutwardQTY . '<br />';
//echo '$OutwardGsWeight == ' . $OutwardGsWeight . '<br />';
//echo '$OutwardNtWeight == ' . $OutwardNtWeight . '<br />'; 
//
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE TODAY OUTWARD @AUTHOR:PRIYANKA-18DEC2021
//***********************************************************************************************************
//
//
//***********************************************************************************************************
//***********************************************************************************************************                        
//
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE TOTAL OUTWARD @AUTHOR:PRIYANKA-18DEC2021
//***********************************************************************************************************
//
//
// ADDED CODE FOR ALL STOCK LEDGER REPORT @PRIYANKA-11JAN2022
if ($_REQUEST['subPanelName'] == 'AllStockList') {
    //
    //
    $totalOutwardQty += $OutwardQTY;
    //
    //
    $totalOutwardGsWt += $OutwardGsWeight;
    //
    //
    $totalOutwardNtWt += $OutwardNtWeight;
    //
    //
    $totalOutwardFnWt += $OutwardFnWeight;
    //
    //
} else {
    //
    //
    if ($OutwardGsWeight > 0 && $OutwardQTY > 0) {
        $totalOutwardQty += $OutwardQTY;
    }
    //
    //
    if ($OutwardGsWeight > 0) {
        $totalOutwardGsWt += $OutwardGsWeight;
    }
    //
    //
    if ($OutwardNtWeight > 0) {
        $totalOutwardNtWt += $OutwardNtWeight;
    }
    //
    //
    if ($OutwardFnWeight > 0) {
        $totalOutwardFnWt += $OutwardFnWeight;
    }
    //
    //
}
//
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE TOTAL OUTWARD @AUTHOR:PRIYANKA-18DEC2021
//***********************************************************************************************************
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
?>