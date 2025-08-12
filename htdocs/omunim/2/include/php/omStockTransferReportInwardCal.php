<?php
/*
 * **************************************************************************************************
 * @Description: STOCK TRANSFER REPORT CALCULATE INWARD FILE @AUTHOR:PRIYANKA-09DEC2021
 * **************************************************************************************************
 *
 * Created on DEC 09, 2021 05:00:58 PM 
 * **************************************************************************************
 * @FileName: omStockTransferReportInwardCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
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
// START CODE FOR STOCK TRANSFER REPORT CALCULATE INWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
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
//
// START CODE TO GET INWARD QTY, GS WEIGHT, NET WEIGHT, INDICATOR FOR TYPE MG, GM, KG, CT @AUTHOR:PRIYANKA-21FEB2022
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
        . "and sttr_firm_id IN ($strFrmId) "
        . "and sttr_item_category = '$Category' "
        . "and sttr_item_name = '$Name' "
        . "and sttr_stock_type = '$StockType' "
        . "and sttr_purity = '$Purity' "
        . "and sttr_metal_type = '$MetalType' "
        . "and sttr_counter_name = '$Counter' ";
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
// INWARD QTY @AUTHOR:PRIYANKA-09DEC2021
$InwardQTY = $rowInwardStockDet[SumOfInwardQTY];
//
if ($InwardQTY == '' || $InwardQTY == NULL) {
    $InwardQTY = 0;
}
//
//
// INWARD GS WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$InwardGsWeight = ($InwardGsWeightMG + $InwardGsWeightGM + $InwardGsWeightKG + $InwardGsWeightCT);
//
//
// INWARD NT WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$InwardNtWeight = ($InwardNtWeightMG + $InwardNtWeightGM + $InwardNtWeightKG + $InwardNtWeightCT);
//
//
// INWARD FN WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$InwardFnWeight = ($InwardFnWeightMG + $InwardFnWeightGM + $InwardFnWeightKG + $InwardFnWeightCT);
//
//                        
//
//echo '$InwardQTY == ' . $InwardQTY . '<br />';
//echo '$InwardGsWeight == ' . $InwardGsWeight . '<br />';
//echo '$InwardNtWeight == ' . $InwardNtWeight . '<br />'; 
//
//
$totalInwardQty += $InwardQTY;
$totalInwardGsWt += $InwardGsWeight;
$totalInwardNtWt += $InwardNtWeight;
$totalInwardFnWt += $InwardFnWeight;
//
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE INWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
?>