<?php
/*
 * **************************************************************************************************
 * @Description: STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD FILE @AUTHOR:PRIYANKA-07DEC2021
 * **************************************************************************************************
 *
 * Created on DEC 07, 2021 01:20:12 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerSummaryOpeningOutwardBookCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:PRIYANKA-07DEC2021
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
// START CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
$OutwardBookQTYOp = 0;
$OutwardBookGsWeightOp = 0;
$OutwardBookNtWeightOp = 0;
$OutwardBookFnWeightOp = 0; 
//
$OutwardBookGsWeightOpMG = 0;
$OutwardBookNtWeightOpMG = 0;
$OutwardBookFnWeightOpMG = 0;
//
$OutwardBookGsWeightOpGM = 0;
$OutwardBookNtWeightOpGM = 0;
$OutwardBookFnWeightOpGM = 0;
//
$OutwardBookGsWeightOpKG = 0;
$OutwardBookNtWeightOpKG = 0;
$OutwardBookFnWeightOpKG = 0;
//
$OutwardBookGsWeightOpCT = 0;
$OutwardBookNtWeightOpCT = 0;
$OutwardBookFnWeightOpCT = 0;
//
$SumOfOutwardBookTagQTYOpMG = 0;
$SumOfOutwardBookTagGsWeightOpMG = 0;
$SumOfOutwardBookTagNtWeightOpMG = 0;
$SumOfOutwardBookTagFnWeightOpMG = 0;
//
$SumOfOutwardBookTagQTYOpGM = 0;
$SumOfOutwardBookTagGsWeightOpGM = 0;
$SumOfOutwardBookTagNtWeightOpGM = 0;
$SumOfOutwardBookTagFnWeightOpGM = 0;
//
$SumOfOutwardBookTagQTYOpKG = 0;
$SumOfOutwardBookTagGsWeightOpKG = 0;
$SumOfOutwardBookTagNtWeightOpKG = 0;
$SumOfOutwardBookTagFnWeightOpKG = 0;
//
$SumOfOutwardBookTagQTYOpCT = 0;
$SumOfOutwardBookTagGsWeightOpCT = 0;
$SumOfOutwardBookTagNtWeightOpCT = 0;
$SumOfOutwardBookTagFnWeightOpCT = 0;
//
$TotalSumOfOutwardBookTagGsWeightOpMG = 0;
$TotalSumOfOutwardBookTagNtWeightOpMG = 0;
$TotalSumOfOutwardBookTagFnWeightOpMG = 0;
//
$TotalSumOfOutwardBookTagGsWeightOpGM = 0;
$TotalSumOfOutwardBookTagNtWeightOpGM = 0;
$TotalSumOfOutwardBookTagFnWeightOpGM = 0;
//
$TotalSumOfOutwardBookTagGsWeightOpKG = 0;
$TotalSumOfOutwardBookTagNtWeightOpKG = 0;
$TotalSumOfOutwardBookTagFnWeightOpKG = 0;
//
$TotalSumOfOutwardBookTagGsWeightOpCT = 0;
$TotalSumOfOutwardBookTagNtWeightOpCT = 0;
$TotalSumOfOutwardBookTagFnWeightOpCT = 0;
//
$TotalSumOfOutwardBookTagQTYOp = 0;
$TotalSumOfOutwardBookTagGsWeightOp = 0;
$TotalSumOfOutwardBookTagNtWeightOp = 0;
$TotalSumOfOutwardBookTagFnWeightOp = 0;
//
//
//
// START CODE TO GET OUTWARD QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:PRIYANKA-07DEC2021
$outwardBookStockDetOp = "SELECT "
        . "OutwardBookQTYOp, "
        . "OutwardBookGsWeightOpMG, "
        . "OutwardBookGsWeightOpGM, "
        . "OutwardBookGsWeightOpKG, "
        . "OutwardBookGsWeightOpCT, "
        . "OutwardBookNtWeightOpMG, "
        . "OutwardBookNtWeightOpGM, "
        . "OutwardBookNtWeightOpKG, "
        . "OutwardBookNtWeightOpCT, "
        . "OutwardBookFnWeightOpMG, "
        . "OutwardBookFnWeightOpGM, "
        . "OutwardBookFnWeightOpKG, "
        . "OutwardBookFnWeightOpCT, "
        . "sttr_indicator "
        . "FROM TEMP_OPENING_BOOK_OUTWARD_STOCK "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id = '$rowStockReportMainQuery[multi_barcode_firm_id]' "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' ";
//
//echo '$outwardStockDetOp == ' . $outwardStockDetOp . '<br /><br />';
//
$resOutwardBookStockDetOp = mysqli_query($conn, $outwardBookStockDetOp);
$rowOutwardBookStockDetOp = mysqli_fetch_array($resOutwardBookStockDetOp);
//
$OutwardBookGsWeightOpMG = ($rowOutwardBookStockDetOp[OutwardBookGsWeightOpMG] / 1000);
$OutwardBookNtWeightOpMG = ($rowOutwardBookStockDetOp[OutwardBookNtWeightOpMG] / 1000);
$OutwardBookFnWeightOpMG = ($rowOutwardBookStockDetOp[OutwardBookFnWeightOpMG] / 1000);
//
$OutwardBookGsWeightOpGM = ($rowOutwardBookStockDetOp[OutwardBookGsWeightOpGM]);
$OutwardBookNtWeightOpGM = ($rowOutwardBookStockDetOp[OutwardBookNtWeightOpGM]);
$OutwardBookFnWeightOpGM = ($rowOutwardBookStockDetOp[OutwardBookFnWeightOpGM]);
//
$OutwardBookGsWeightOpKG = ($rowOutwardBookStockDetOp[OutwardBookGsWeightOpKG] * 1000);
$OutwardBookNtWeightOpKG = ($rowOutwardBookStockDetOp[OutwardBookNtWeightOpKG] * 1000);
$OutwardBookFnWeightOpKG = ($rowOutwardBookStockDetOp[OutwardBookFnWeightOpKG] * 1000);
//
$OutwardBookGsWeightOpCT = ($rowOutwardBookStockDetOp[OutwardBookGsWeightOpCT] / 5);
$OutwardBookNtWeightOpCT = ($rowOutwardBookStockDetOp[OutwardBookNtWeightOpCT] / 5);
$OutwardBookFnWeightOpCT = ($rowOutwardBookStockDetOp[OutwardBookFnWeightOpCT] / 5);
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
// IF TRANSACTION TYPE IS PURBYSUPP @AUTHOR:PRIYANKA-12JAN2022
if ((($rowStockReportMainQuery['multi_barcode_transaction_type'] == 'PURBYSUPP' ||
      $rowStockReportMainQuery['multi_barcode_transaction_type'] == 'PURONCASH' ||  
      $rowStockReportMainQuery['multi_barcode_transaction_type'] == 'EXISTING') &&
      $rowStockReportMainQuery['multi_barcode_stock_type'] == 'wholesale')) {
    //
    //
    // START CODE TO GET TAG QTY, GS WEIGHT, NET WEIGHT FOR MG, GM, KG, CT @AUTHOR:PRIYANKA-12JAN2022
    parse_str(getTableValues("SELECT SUM(sttr_quantity) AS SumOfOutwardBookTagQTYOp, "
                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS SumOfOutwardBookTagGsWeightOpMG, "
                    . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS SumOfOutwardBookTagNtWeightOpMG, "
                    . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS SumOfOutwardBookTagFnWeightOpMG, "
                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS SumOfOutwardBookTagGsWeightOpGM, "
                    . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS SumOfOutwardBookTagNtWeightOpGM, "
                    . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS SumOfOutwardBookTagFnWeightOpGM, "
                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS SumOfOutwardBookTagGsWeightOpKG, "
                    . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS SumOfOutwardBookTagNtWeightOpKG, "
                    . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS SumOfOutwardBookTagFnWeightOpKG, "
                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS SumOfOutwardBookTagGsWeightOpCT, "
                    . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS SumOfOutwardBookTagNtWeightOpCT, "
                    . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS SumOfOutwardBookTagFnWeightOpCT "
                    . "FROM stock_transaction "
                    . "WHERE sttr_owner_id = '$sessionOwnerId' "
                    . "and sttr_firm_id = '$rowStockReportMainQuery[multi_barcode_firm_id]' "
                    . "and sttr_st_id = '$rowStockReportMainQuery[multi_barcode_st_id]' "
                    . "and sttr_transaction_type IN ('TAG') "
                    . "and sttr_stock_type IN ('retail') "
                    . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                    . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
                    . " $dateStrForOutwardBooks "));
    //
    //
    $TotalSumOfOutwardBookTagGsWeightOpMG = ($SumOfOutwardBookTagGsWeightOpMG / 1000);
    $TotalSumOfOutwardBookTagNtWeightOpMG = ($SumOfOutwardBookTagNtWeightOpMG / 1000);
    $TotalSumOfOutwardBookTagFnWeightOpMG = ($SumOfOutwardBookTagFnWeightOpMG / 1000);
    //
    $TotalSumOfOutwardBookTagGsWeightOpGM = $SumOfOutwardBookTagGsWeightOpGM;
    $TotalSumOfOutwardBookTagNtWeightOpGM = $SumOfOutwardBookTagNtWeightOpGM;
    $TotalSumOfOutwardBookTagFnWeightOpGM = $SumOfOutwardBookTagFnWeightOpGM;
    //
    $TotalSumOfOutwardBookTagGsWeightOpKG = ($SumOfOutwardBookTagGsWeightOpKG * 1000);
    $TotalSumOfOutwardBookTagNtWeightOpKG = ($SumOfOutwardBookTagNtWeightOpKG * 1000);
    $TotalSumOfOutwardBookTagFnWeightOpKG = ($SumOfOutwardBookTagFnWeightOpKG * 1000);
    //
    $TotalSumOfOutwardBookTagGsWeightOpCT = ($SumOfOutwardBookTagGsWeightOpCT / 5);
    $TotalSumOfOutwardBookTagNtWeightOpCT = ($SumOfOutwardBookTagNtWeightOpCT / 5);
    $TotalSumOfOutwardBookTagFnWeightOpCT = ($SumOfOutwardBookTagFnWeightOpCT / 5);
    //
    //
    $TotalSumOfOutwardBookTagQTYOp = ($SumOfOutwardBookTagQTYOp);
    $TotalSumOfOutwardBookTagGsWeightOp = ($TotalSumOfOutwardBookTagGsWeightOpMG + $TotalSumOfOutwardBookTagGsWeightOpGM + $TotalSumOfOutwardBookTagGsWeightOpKG + $TotalSumOfOutwardBookTagGsWeightOpCT);
    $TotalSumOfOutwardBookTagNtWeightOp = ($TotalSumOfOutwardBookTagNtWeightOpMG + $TotalSumOfOutwardBookTagNtWeightOpGM + $TotalSumOfOutwardBookTagNtWeightOpKG + $TotalSumOfOutwardBookTagNtWeightOpCT);
    $TotalSumOfOutwardBookTagFnWeightOp = ($TotalSumOfOutwardBookTagFnWeightOpMG + $TotalSumOfOutwardBookTagFnWeightOpGM + $TotalSumOfOutwardBookTagFnWeightOpKG + $TotalSumOfOutwardBookTagFnWeightOpCT);
    //
    //
}
//
//
//echo '$TotalSumOfOutwardBookTagQTYOp == ' . $TotalSumOfOutwardBookTagQTYOp . '<br />';
//echo '$TotalSumOfOutwardBookTagGsWeightOp == ' . $TotalSumOfOutwardBookTagGsWeightOp . '<br />';
//echo '$TotalSumOfOutwardBookTagNtWeightOp == ' . $TotalSumOfOutwardBookTagNtWeightOp . '<br />';
//echo '$TotalSumOfOutwardBookTagFnWeightOp == ' . $TotalSumOfOutwardBookTagFnWeightOp . '<br />';
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
// OUTWARD QTY @AUTHOR:PRIYANKA-14OCT2021
$OutwardBookQTYOp = ($rowOutwardBookStockDetOp[OutwardBookQTYOp] + $TotalSumOfOutwardBookTagQTYOp);
//
//
if ($OutwardBookQTYOp == '' || $OutwardBookQTYOp == NULL) {
    $OutwardBookQTYOp = 0;
}
//
//
// OUTWARD GS WEIGHT @AUTHOR:PRIYANKA-14OCT2021
$OutwardBookGsWeightOp = (($OutwardBookGsWeightOpMG + $OutwardBookGsWeightOpGM + $OutwardBookGsWeightOpKG + $OutwardBookGsWeightOpCT) + $TotalSumOfOutwardBookTagGsWeightOp);
//
//
// OUTWARD NT WEIGHT @AUTHOR:PRIYANKA-14OCT2021
$OutwardBookNtWeightOp = (($OutwardBookNtWeightOpMG + $OutwardBookNtWeightOpGM + $OutwardBookNtWeightOpKG + $OutwardBookNtWeightOpCT) + $TotalSumOfOutwardBookTagNtWeightOp);
//
//
// OUTWARD FN WEIGHT @AUTHOR:PRIYANKA-14OCT2021
$OutwardBookFnWeightOp = (($OutwardBookFnWeightOpMG + $OutwardBookFnWeightOpGM + $OutwardBookFnWeightOpKG + $OutwardBookFnWeightOpCT) + $TotalSumOfOutwardBookTagFnWeightOp);
//
//
//echo '$OutwardBookQTYOp == ' . $OutwardBookQTYOp . '<br />';
//echo '$OutwardBookGsWeightOp == ' . $OutwardBookGsWeightOp . '<br />';
//echo '$OutwardBookNtWeightOp == ' . $OutwardBookNtWeightOp . '<br />'; 
//
//
//***********************************************************************************************************
// END CODE FOR STOCK LEDGER SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-07DEC2021
//***********************************************************************************************************
//
//
?>
