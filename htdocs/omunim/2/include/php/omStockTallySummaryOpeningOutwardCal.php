<?php
/*
 * **************************************************************************************************
 * @Description: STOCK STOCK TALLY CALCULATE OPENING OUTWARD FILE @AUTHOR:YUVRAJ-28OCT2022
 * **************************************************************************************************
 *
 * Created on DEC 07, 2021 01:20:12 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerSummaryOpeningOutwardCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:YUVRAJ-28OCT2022
 *  AUTHOR: 
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.102
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
//***********************************************************************************************************
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:YUVRAJ-28OCT2022
//***********************************************************************************************************
//
//
$OutwardQTYOp = 0;
$OutwardGsWeightOp = 0;
$OutwardNtWeightOp = 0;
$OutwardFnWeightOp = 0; 
//
$OutwardGsWeightOpMG = 0;
$OutwardNtWeightOpMG = 0;
$OutwardFnWeightOpMG = 0;
//
$OutwardGsWeightOpGM = 0;
$OutwardNtWeightOpGM = 0;
$OutwardFnWeightOpGM = 0;
//
$OutwardGsWeightOpKG = 0;
$OutwardNtWeightOpKG = 0;
$OutwardFnWeightOpKG = 0;
//
$OutwardGsWeightOpCT = 0;
$OutwardNtWeightOpCT = 0;
$OutwardFnWeightOpCT = 0;
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
//
// START CODE TO GET OUTWARD QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:YUVRAJ-28OCT2022
$outwardStockDetOp = "SELECT "
        . "OutwardQTYOp, "
        . "OutwardGsWeightOpMG, "
        . "OutwardGsWeightOpGM, "
        . "OutwardGsWeightOpKG, "
        . "OutwardGsWeightOpCT, "
        . "OutwardNtWeightOpMG, "
        . "OutwardNtWeightOpGM, "
        . "OutwardNtWeightOpKG, "
        . "OutwardNtWeightOpCT, "
        . "OutwardFnWeightOpMG, "
        . "OutwardFnWeightOpGM, "
        . "OutwardFnWeightOpKG, "
        . "OutwardFnWeightOpCT, "
        . "sttr_indicator "
        . "FROM TEMP_OPENING_OUTWARD_STOCK "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id = '$rowStockReportMainQuery[rfidtly_firm_id]' "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "  
        . "and sttr_transaction_type NOT IN ('SELL','sell') "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' ";
//
//echo '$outwardStockDetOp == ' . $outwardStockDetOp . '<br /><br />';
//
$resOutwardStockDetOp = mysqli_query($conn, $outwardStockDetOp);
$rowOutwardStockDetOp = mysqli_fetch_array($resOutwardStockDetOp);
//
$OutwardGsWeightOpMG = ($rowOutwardStockDetOp[OutwardGsWeightOpMG] / 1000);
$OutwardNtWeightOpMG = ($rowOutwardStockDetOp[OutwardNtWeightOpMG] / 1000);
$OutwardFnWeightOpMG = ($rowOutwardStockDetOp[OutwardFnWeightOpMG] / 1000);
//
$OutwardGsWeightOpGM = ($rowOutwardStockDetOp[OutwardGsWeightOpGM]);
$OutwardNtWeightOpGM = ($rowOutwardStockDetOp[OutwardNtWeightOpGM]);
$OutwardFnWeightOpGM = ($rowOutwardStockDetOp[OutwardFnWeightOpGM]);
//
$OutwardGsWeightOpKG = ($rowOutwardStockDetOp[OutwardGsWeightOpKG] * 1000);
$OutwardNtWeightOpKG = ($rowOutwardStockDetOp[OutwardNtWeightOpKG] * 1000);
$OutwardFnWeightOpKG = ($rowOutwardStockDetOp[OutwardFnWeightOpKG] * 1000);
//
$OutwardGsWeightOpCT = ($rowOutwardStockDetOp[OutwardGsWeightOpCT] / 5);
$OutwardNtWeightOpCT = ($rowOutwardStockDetOp[OutwardNtWeightOpCT] / 5);
$OutwardFnWeightOpCT = ($rowOutwardStockDetOp[OutwardFnWeightOpCT] / 5);
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//
//echo 'sttr_transaction_type == ' . $rowStockReportMainQuery['sttr_transaction_type'] . '<br />';
//
//
//
// IF TRANSACTION TYPE IS PURBYSUPP @AUTHOR:YUVRAJ-28OCT2022
if ((($rowStockReportMainQuery['sttr_transaction_type'] == 'PURBYSUPP' ||
      $rowStockReportMainQuery['sttr_transaction_type'] == 'PURONCASH' ||  
      $rowStockReportMainQuery['sttr_transaction_type'] == 'EXISTING') &&
      $rowStockReportMainQuery['sttr_stock_type'] == 'wholesale')) {
    //
    //
    // START CODE TO GET TAG QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:YUVRAJ-28OCT2022
    parse_str(getTableValues("SELECT SUM(sttr_quantity) AS SumOfOutwardTagQTYOp, "
                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightOpMG, "
                    . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightOpMG, "
                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightOpMG, "
                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightOpGM, "
                    . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightOpGM, "
                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightOpGM, "
                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightOpKG, "
                    . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightOpKG, "
                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightOpKG, "
                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS SumOfOutwardTagGsWeightOpCT, "
                    . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS SumOfOutwardTagNtWeightOpCT, "
                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS SumOfOutwardTagFnWeightOpCT "
                    . "FROM stock_transaction "
                    . "WHERE sttr_owner_id = '$sessionOwnerId' "
                    . "and sttr_firm_id = '$rowStockReportMainQuery[rfidtly_firm_id]' "
                    . "and sttr_st_id = '$rowStockReportMainQuery[rfidtly_st_id]' "
                    . "and sttr_transaction_type IN ('TAG') "
                    . "and sttr_stock_type IN ('retail') "
                    . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                    . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
                    . " $dateStrForOutwardssttr "));
    //
    //
    $TotalSumOfOutwardTagGsWeightOpMG = ($SumOfOutwardTagGsWeightOpMG / 1000);
    $TotalSumOfOutwardTagNtWeightOpMG = ($SumOfOutwardTagNtWeightOpMG / 1000);
    $TotalSumOfOutwardTagFnWeightOpMG = ($SumOfOutwardTagFnWeightOpMG / 1000);
    //
    $TotalSumOfOutwardTagGsWeightOpGM = $SumOfOutwardTagGsWeightOpGM;
    $TotalSumOfOutwardTagNtWeightOpGM = $SumOfOutwardTagNtWeightOpGM;
    $TotalSumOfOutwardTagFnWeightOpGM = $SumOfOutwardTagFnWeightOpGM;
    //
    $TotalSumOfOutwardTagGsWeightOpKG = ($SumOfOutwardTagGsWeightOpKG * 1000);
    $TotalSumOfOutwardTagNtWeightOpKG = ($SumOfOutwardTagNtWeightOpKG * 1000);
    $TotalSumOfOutwardTagFnWeightOpKG = ($SumOfOutwardTagFnWeightOpKG * 1000);
    //
    $TotalSumOfOutwardTagGsWeightOpCT = ($SumOfOutwardTagGsWeightOpCT / 5);
    $TotalSumOfOutwardTagNtWeightOpCT = ($SumOfOutwardTagNtWeightOpCT / 5);
    $TotalSumOfOutwardTagFnWeightOpCT = ($SumOfOutwardTagFnWeightOpCT / 5);
    //
    //
    $TotalSumOfOutwardTagQTYOp = ($SumOfOutwardTagQTYOp);
    $TotalSumOfOutwardTagGsWeightOp = ($TotalSumOfOutwardTagGsWeightOpMG + $TotalSumOfOutwardTagGsWeightOpGM + $TotalSumOfOutwardTagGsWeightOpKG + $TotalSumOfOutwardTagGsWeightOpCT);
    $TotalSumOfOutwardTagNtWeightOp = ($TotalSumOfOutwardTagNtWeightOpMG + $TotalSumOfOutwardTagNtWeightOpGM + $TotalSumOfOutwardTagNtWeightOpKG + $TotalSumOfOutwardTagNtWeightOpCT);
    $TotalSumOfOutwardTagFnWeightOp = ($TotalSumOfOutwardTagFnWeightOpMG + $TotalSumOfOutwardTagFnWeightOpGM + $TotalSumOfOutwardTagFnWeightOpKG + $TotalSumOfOutwardTagFnWeightOpCT);
    //
    //
}
//
//
//echo '$TotalSumOfOutwardTagQTYOp == ' . $TotalSumOfOutwardTagQTYOp . '<br />';
//echo '$TotalSumOfOutwardTagGsWeightOp == ' . $TotalSumOfOutwardTagGsWeightOp . '<br />';
//echo '$TotalSumOfOutwardTagNtWeightOp == ' . $TotalSumOfOutwardTagNtWeightOp . '<br />';
//echo '$TotalSumOfOutwardTagFnWeightOp == ' . $TotalSumOfOutwardTagFnWeightOp . '<br />';
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// OUTWARD QTY @AUTHOR:YUVRAJ-28OCT2022
$OutwardQTYOp = ($rowOutwardStockDetOp[OutwardQTYOp] + $TotalSumOfOutwardTagQTYOp);
//
//
if ($OutwardQTYOp == '' || $OutwardQTYOp == NULL) {
    $OutwardQTYOp = 0;
}
//
//
// OUTWARD GS WEIGHT @AUTHOR:YUVRAJ-28OCT2022
$OutwardGsWeightOp = (($OutwardGsWeightOpMG + $OutwardGsWeightOpGM + $OutwardGsWeightOpKG + $OutwardGsWeightOpCT) + $TotalSumOfOutwardTagGsWeightOp);
//
//
// OUTWARD NT WEIGHT @AUTHOR:YUVRAJ-28OCT2022
$OutwardNtWeightOp = (($OutwardNtWeightOpMG + $OutwardNtWeightOpGM + $OutwardNtWeightOpKG + $OutwardNtWeightOpCT) + $TotalSumOfOutwardTagNtWeightOp);
//
//
// OUTWARD FN WEIGHT @AUTHOR:YUVRAJ-28OCT2022
$OutwardFnWeightOp = (($OutwardFnWeightOpMG + $OutwardFnWeightOpGM + $OutwardFnWeightOpKG + $OutwardFnWeightOpCT) + $TotalSumOfOutwardTagFnWeightOp);
//
//
//echo '$OutwardQTYOp == ' . $OutwardQTYOp . '<br />';
//echo '$OutwardGsWeightOp == ' . $OutwardGsWeightOp . '<br />';
//echo '$OutwardNtWeightOp == ' . $OutwardNtWeightOp . '<br />'; 
//
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:YUVRAJ-28OCT2022
//***********************************************************************************************************
//
//
?>
