<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 12 May, 2018 12:42:45 PM
 *
 * @FileName: omStockFunFetchStock.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php

// Start code to check item present in stock table or not
if ($sttr_st_id != '') {
    $qSelStockItemDetails = "SELECT * FROM stock where st_id = '$sttr_st_id' ";
} else {
    $qSelStockItemDetails = "SELECT * FROM stock where st_owner_id = '$sessionOwnerId' "
            . "and  st_prod_type = '$addItemProdType' and st_item_name = '$addItemName' "
            . "and st_item_category = '$addItemCategory' and st_stock_type = '$stocType' "
            . "and st_firm_id = '$firmId'";
}
//
$resStockItemDetails = mysqli_query($conn, $qSelStockItemDetails);
$rowStockItemDetails = mysqli_fetch_array($resStockItemDetails);
$noOfStockAvailable = mysqli_num_rows($resStockItemDetails);
//
if ($noOfStockAvailable > 0) {
    //
    $stId = $rowStockItemDetails['st_id'];

    $stockQty = $rowStockItemDetails['st_quantity'];
    $stockPurity = $rowStockItemDetails['st_purity'];
    $stockWastage = $rowStockItemDetails['st_wastage'];
    $stockLSW = $rowStockItemDetails['st_pkt_weight'];
    $stockFinalPurity = decimalVal(($stockPurity + $stockWastage), 2);
    $stockGSW = getTotalWeight($rowStockItemDetails['st_gs_weight'], $rowStockItemDetails['st_gs_weight_type'], 'weight');
    $stockGSWT = $rowStockItemDetails['st_gs_weight_type'];
    $stockNTW = getTotalWeight($rowStockItemDetails['st_nt_weight'], $rowStockItemDetails['st_nt_weight_type'], 'weight');
    $stockNTWT = $rowStockItemDetails['st_nt_weight_type'];
    $stockFineWt = $rowStockItemDetails['st_fine_weight'];
    $stockFineWtType = $rowStockItemDetails['st_fine_weight_type'];
    $stockFinalFineWt = $rowStockItemDetails['st_final_fine_weight'];
    //
    if ($process == 'IN')
        $plusMinusOperation = "+";
    else if ($process == 'OUT')
        $plusMinusOperation = "-";
    //
    //
    // Total Quantity
    if ($inOrOutQty != NULL) {
        $newQty = eval('return ' . $stockQty . $plusMinusOperation . $inOrOutQty . ';');
    }
    // Total Gross Weight
    if ($inOrOutGrossWeight != NULL) {
        // Convert in or out wt into GM
        if ($inOrOutGrossWeightT != 'GM')
            $inOrOutGrossWeight = getTotalWeight($inOrOutGrossWeight, $inOrOutGrossWeightT, 'weight');
        //
        $newGSW = eval('return ' . $stockGSW . $plusMinusOperation . $inOrOutGrossWeight . ';');
        $newGSWT = 'GM';
    }
    // Total Net Weight
    if ($inOrOutNetWeight != NULL) {
        // Convert in or out wt into GM
        if ($inOrOutNetWeightT != 'GM')
            $inOrOutNetWeight = getTotalWeight($inOrOutNetWeight, $inOrOutNetWeightT, 'weight');
        //
        $newNTW = eval('return ' . $stockNTW . $plusMinusOperation . $inOrOutNetWeight . ';');
        $newNTWT = 'GM';
    }
    //
    if ($inOrOutFineWeight != NULL) {
        // Convert in or out wt into GM
        if ($inOrOutFineWeightT != 'GM')
            $inOrOutFineWeight = getTotalWeight($inOrOutFineWeight, $inOrOutFineWeightT, 'weight');
        //
        $newFNWT = eval('return ' . $stockFineWt . $plusMinusOperation . $inOrOutFineWeight . ';');
        $newFNWTT = 'GM';
    }
    //
    if ($inOrOutFinalFineWeight != NULL) {
        //
        $newFFWT = eval('return ' . $stockFinalFineWt . $plusMinusOperation . $inOrOutFinalFineWeight . ';');
        $newFFWTT = 'GM';
    }
    // Packet/Less Weight
    if ($inOrOutLessWeight != NULL) {
        // Convert in or out wt into GM
        if ($inOrOutLessWeightT != 'GM')
            $inOrOutLessWeight = getTotalWeight($inOrOutLessWeight, $inOrOutLessWeightT, 'weight');
        //
        $newLSW = eval('return ' . $stockLSW . $plusMinusOperation . $inOrOutLessWeight . ';');
        $newLSWT = 'GM';
    }
    // Purity
    if ($inOrOutPurity != NULL) {
        //if ($process == 'IN')
            $newPurity = decimalVal((($newFNWT / $newNTW) * 100), 2);
        //else
        //    $newPurity = decimalVal(($stockPurity * 1 - $inOrOutPurity) / (0 - 1), 2);
    }
    
    // Final Purity Purity
    if ($inOrOutFinalPurity != NULL) {
        $newFTNCH = decimalVal(($stTNCH + $stWSTG), 2);
        //if ($process == 'IN')
            $newFinalPurity = decimalVal((($newFFWT / $newNTW) * 100), 2);
        //else
        //    $newFinalPurity = decimalVal(($stockFinalPurity * 1 - $inOrOutFinalPurity) / (0 - 1), 2);
    }
    // Wastage
    if ($inOrOutWastage != NULL) {
        //
        //if ($process == 'IN')
            $newWastage = $newFinalPurity - $newPurity;
        //else
            //$newWastage = decimalVal(($stockWastage * 1 - $inOrOutWastage) / (0 - 1), 2);
    }
    
    // Fine Weight
//    if ($inOrOutPurity != NULL && $inOrOutNetWeight != NULL) {
//        $newFNWT = decimalVal((($newNTW * $newPurity) / 100), 3);
//        $newFNWTT = 'GM';
//    }
    // Final Fine Weight
//    if ($inOrOutPurity != NULL && $inOrOutNetWeight != NULL) {
//        $newFFWT = decimalVal((($newNTW * $newFinalPurity) / 100), 3);
//        $newFFWTT = 'GM';
//    }
}
//
?>