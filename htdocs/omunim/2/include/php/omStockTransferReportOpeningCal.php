<?php
/*
 * **************************************************************************************************
 * @Description: STOCK TRANSFER REPORT CALCULATE OPENING FILE @AUTHOR:PRIYANKA-09DEC2021
 * **************************************************************************************************
 *
 * Created on DEC 09, 2021 04:29:58 PM 
 * **************************************************************************************************
 * @FileName: omStockTransferReportOpeningCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:09DEC2021
 *  AUTHOR: PRIYANKA
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
// START CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
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
// START CODE TO GET OPENING QTY, GS WEIGHT, NET WEIGHT FOR TYPE MG, GM, KG, CT @AUTHOR:PRIYANKA-21FEB2022
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
        . "sttr_indicator "
        . "FROM TEMP_OPENING_STOCK "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id IN ($strFrmId) "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' "
        . "and sttr_counter_name = '$Counter' ";
//
//echo '$openingStockDet == ' . $openingStockDet . '<br />';die;
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
// OPENING QTY @AUTHOR:PRIYANKA-09DEC2021
$OpeningQTYOp = $rowOpeningStockDet[OpeningQTYOp];
//
if ($OpeningQTYOp == '' || $OpeningQTYOp == NULL) {
    $OpeningQTYOp = 0;
}
//
//
// OPENING GS WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$OpeningGsWeightOp = ($OpeningGsWeightMG + $OpeningGsWeightGM + $OpeningGsWeightKG + $OpeningGsWeightCT);
//
//
// OPENING NT WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$OpeningNtWeightOp = ($OpeningNtWeightMG + $OpeningNtWeightGM + $OpeningNtWeightKG + $OpeningNtWeightCT);
//
//
// OPENING FN WEIGHT @AUTHOR:PRIYANKA-09DEC2021
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
// START CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportOpeningOutwardCal.php';
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
//***********************************************************************************************************
//***********************************************************************************************************
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
$totalOpeningQty += $OpeningQTY;
$totalOpeningGsWt += $OpeningGsWeight;
$totalOpeningNtWt += $OpeningNtWeight;
$totalOpeningFnWt += $OpeningFnWeight;
//
//
//***********************************************************************************************************
//***********************************************************************************************************
//
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
?>