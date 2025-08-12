<?php
/*
 * **************************************************************************************
 * @tutorial: Crystal Update Div @Author:PRIYANKA-14MAR19
 * **************************************************************************************
 * 
 * Created on MAR 14, 2019 11:38:55 AM
 *
 * @FileName: omrwcrydv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 3.0.0
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
//
//echo '$sttrId:'. $sttrId;
//
$crystalCount = $_POST['crystalDivCount'];
//
if ($crystalCount == '') {
    $crystalCount = $_GET['crystalDivCount'];
}
//
if ($crystalCount == '') {
    $crystalCount = 1;
}
//
$counter = 1;
//
// Add Code for Update Stone Functionality @Author:PRIYANKA-14MAR19
while ($rowCryDet = mysqli_fetch_array($resCryDet)) {
    //
    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
        //
        $stocCryId = $rowCryDet['sttr_id'];
        $cryId = $rowCryDet['sttr_item_category'];
        $cryName = $rowCryDet['sttr_item_name'];
        $cryQty = $rowCryDet['sttr_quantity'];
        $cryGSW = $rowCryDet['sttr_gs_weight'];
        $cryGSWT = $rowCryDet['sttr_gs_weight_type'];
        $cryRate = $rowCryDet['sttr_purchase_rate'];
        $cryRateType = $rowCryDet['sttr_purchase_rate_type'];
        $cryVal = $rowCryDet['sttr_valuation'];
        $cryClarity = $rowCryDet['sttr_clarity'];
        $cryColor = $rowCryDet['sttr_color'];
        $crySize = $rowCryDet['sttr_size'];
        $cryShape = $rowCryDet['sttr_shape'];
        $cryOtherInfo = $rowCryDet['sttr_other_info'];
        
        // $cryFinVal = $rowCryDet['sttr_final_valuation'];
        
        $cryAutoWTChk = $rowCryDet['sttr_wt_auto_less'];
        $cryGSWT = $rowCryDet['sttr_gs_weight_type']; //CRYSTAL GROSS WEIGHT TYPE  @Author:PRIYANKA-14MAR19
        $crystalCount = $stocCryId;
        
        // START CODE TO FOR ADDING VARIABLES FOR SELL RATE & GST TAX @Author:PRIYANKA-14MAR19
        // STONE WT LESS FROM GS WT/ NT WT @Author:PRIYANKA-14MAR19
        $sttr_stone_less_wt_by = $rowCryDet['sttr_stone_less_wt_by'];
        
        // SELL RATE VARIABLES @Author:PRIYANKA-14MAR19
        $sttr_sell_rate = $rowCryDet['sttr_sell_rate'];
        $sttr_sell_rate_type = $rowCryDet['sttr_sell_rate_type'];
        $sttr_final_valuation = $rowCryDet['sttr_final_valuation'];
        
        // GST TAX VARIABLES @Author:PRIYANKA-14MAR19
        $sttr_tot_price_cgst_per = $rowCryDet['sttr_tot_price_cgst_per'];
        $sttr_tot_price_sgst_per = $rowCryDet['sttr_tot_price_sgst_per'];
        $sttr_tot_price_igst_per = $rowCryDet['sttr_tot_price_igst_per'];
        $sttr_tot_price_cgst_chrg = $rowCryDet['sttr_tot_price_cgst_chrg'];
        $sttr_tot_price_sgst_chrg = $rowCryDet['sttr_tot_price_sgst_chrg'];
        $sttr_tot_price_igst_chrg = $rowCryDet['sttr_tot_price_igst_chrg'];
        
        // TOT TAX @Author:PRIYANKA-14MAR19
        $sttr_tot_tax = $rowCryDet['sttr_tot_tax'];
        // END CODE TO FOR ADDING VARIABLES FOR SELL RATE & GST TAX @Author:PRIYANKA-14MAR19
              
    }

    $crystalCount = $stocCryId;

    //echo 'panelSimilarDiv == '.$panelSimilarDiv.'<br />';

    if ($panelSimilarDiv == 'SimilarItem' || $payPanelName == 'InvoicePayment') {
        $crystalCount = $counter;
        $stocCryId = "";
        $cryGSW = "";
    } else {
        $crystalCount = $counter;
    }

    include 'omrwwacydv.php';
    
    $counter++;
}
?>