<?php
/*
 * **************************************************************************************
 * @tutorial: START CODE FOR TAX INVOICE ITEM TABLE TOTAL
 * **************************************************************************************
 * 
 * Created on 1ST OCT 2021
 *
 * @FileName: omspInvTaxTot.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 */
?>
<?php
//header start
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpnmwd.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<?php
//*******************************************************************************
//START CODE FOR TAX INVOICE ITEM TABLE TOTAL : AUTHOR @ DARSHANA 1 OCT 2021
//*******************************************************************************
if ($divIdClass == 'A4-size') {
    $fontSize = '14px';
} else if ($divIdClass == 'bodyClass') {
    $fontSize = '12px';
} else if ($divIdClass == 'sell_4InchInv_table') {
    $fontSize = '12px';
} else if ($divIdClass == 'sell_Inv_3Inch') {
    $fontSize = '12px';
}
?>
<tr>
    <?php
    $colspan = '';

    if ($indicator == 'crystalSoldOutInv') {
        if ($cryitemId == 'true') {
            $colspan += 1;
        }
        if ($crydesign == 'true' && $designpresent == 'yes') {
            $colspan += 1;
        }
        if ($cryitemDesc == 'true') {
            $colspan += 1;
        }
    } else {
        if ($itemSNoLb == 'true') {
            $colspan += 1;
        }
        if ($itemId == 'true') {
            $colspan += 1;
        }
        if ($design == 'true' && $designpresent == 'yes') {
            $colspan += 1;
        }
        if ($itemDescLb == 'true') {
            $colspan += 1;
        }
        if ($brandName == 'true' && $brand == 'yes') {
            $colspan += 1;
        }
        if ($hallMarkUid == 'true' && $hallMark == 'yes') {
            $colspan += 1;
        }
        if ($itemHsnLb == 'true') {
            $colspan += 1;
        }
        if ($OtherInfoLb == 'true' && $otherinfo == 'yes') {
            $colspan += 1;
        }
    }
    ?>
    <td colspan="<?php echo $colspan; ?>" style="font-size: <?php echo $fontSize; ?>;" align="center">
        <strong>TOTAL</strong>
    </td>

    <?php
    if ($indicator == 'crystalSoldOutInv') {
        if ($cryitemQty == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo $totQty; ?>
            </td> 
            <?php
        }
        if ($cryitemImtGsWt == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo $totGsWt . ' CT'; ?>
            </td> 
            <?php
        }
        if ($cryitemShape == 'true' && $sttr_shape != '' && $sttr_shape != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($cryitemSize == 'true' && $sttr_size != '' && $sttr_size != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($crystColor == 'true' && $stcolor != '' && $stcolor != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($crystClarity == 'true' && $stclarity != '' && $stclarity != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
       
        if ($cryitemOtherInfo == 'true' && $sttr_other_info != '' && $sttr_other_info != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($crymetalImtRate == 'true' && $slPrPurchaseRate != '' && $slPrPurchaseRate != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>   
            <?php
        }
        if ($cryVal == 'true' && $sttr_valuation != 0) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($crytax == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($cryValAddedAmt == 'true' && $slpr_value_added != '' && $slpr_value_added != NULL) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if ($crycgst == 'true' && $cgstpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if ($crysgst == 'true' && $sgstpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if ($cryigst == 'true' && $igstpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($cryamt == 'true' && $sttr_final_valuation != 0) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totFinalVal, 3); ?>
            </td>
            <?php
        }
    } else {
        if ($itemQtyLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo $totQty; ?>
            </td> 
            <?php
        }
        if ($unitPrice == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if ($itemGsWtLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totGsWt, 2) . ' ' . 'GM'; ?>
            </td>  
            <?php
        }
        if ($itemntLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totNetWt, 3) . ' ' . 'GM'; ?>
            </td>   
            <?php
        }
        if ($itempktLb == 'true' && $pkwtpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totPktWt, 3) . ' ' . 'GM'; ?>
            </td>   
            <?php
        }
        if ($itemProcessWt == 'true' && $processwtpresent == 'yes' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totProcessWt, 3) . ' ' . 'GM'; ?>
            </td>   
            <?php
        }
        if ($itemPurity == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($itemWSWt == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totWsWt, 3); ?>
            </td>  
            <?php
        }
        if ($itemFinalPurity == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($itemFinalPurityWtCsWs == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>   
            <?php
        }
     //<!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
        if ($valAdded == 'true' && $custwasatagepresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo '-'; ?>
            </td>  
            <?php
        }
    // <!--END CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
        if ($itemFfnWt == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totFineWt, 3) . ' ' . 'GM'; ?>
            </td>
            <?php
        }
        if ($diamondWtLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totStoneWt, 3) . ' ' . 'CT'; ?>
            </td>  
            <?php
        }
        if ($diamondValuationLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totStoneValue, 3); ?>
            </td> 
            <?php
        }
        //START CODE FOR ADDING STONE QUANTITY AND STONE RATE OPTION @RENUKA OCT2022
        if (($stQuantityLb == 'true') && ($qtytpresent == 'yes')) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo $totQuantity; ?>
            </td> 
            <?php
        }
        if (($stRateLb == 'true') && ($rtpresent == 'yes')) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo '-'; ?>
            </td> 
            <?php
        }
        //END CODE FOR ADDING STONE QUANTITY AND STONE RATE OPTION @RENUKA OCT2022
        if ($labour == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($totalmkgbfdisc == 'true' && ($sttr_metal_amt != 0 || $sttr_metal_amt != '' || $sttr_total_making_amt != '' && $sttr_total_making_amt != 0)) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if (($discountchargePer == 'true' || $discountchargeAmt == 'true') && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES'))) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($mkgAfterDisPer == 'true' && $mkgAfterDiscInPerPresent == 'YES') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if ($mkgAfterDisGm == 'true' && $mkgAfterDiscInGmPresent == 'YES') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($valLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totValuation, 3); ?>
            </td> 
            <?php
        }
        if ($labourVal == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($metal_val == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($itemMakingChrgValLb == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($othChrg == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totOtherChrg); ?>
            </td> 
            <?php
        }
        if ($TotalVa == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($total_valwithmkg == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($totalCrystal == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totCrystalValuation, 3); ?>
            </td>
            <?php
        }
        if ($cgstAmt == 'true' && $cgstpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>  
            <?php
        }
        if ($totcgstAmt == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($sgstAmt == 'true' && $sgstpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($totsgstAmt == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($igstAmt == 'true' && $igstpresent == 'yes') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td> 
            <?php
        }
        if ($totigstAmt == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($totgstAmt == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($MetalRate == 'true') {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo ' - '; ?>
            </td>
            <?php
        }
        if ($itemAmtLb == 'true' && $sttr_final_valuation != 0) {
            ?>
            <td align="center" style="font-size: <?php echo $fontSize; ?>;">
                <?php echo number_format($totFinalVal, 3); ?>
            </td>
            <?php
        }
    }
//*******************************************************************************
//END CODE FOR TAX INVOICE ITEM TABLE TOTAL : AUTHOR @ DARSHANA 1 OCT 2021
//*******************************************************************************
    ?>

</tr>


