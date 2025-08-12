<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK RATE CUT FILE @PRIYANKA-28FEB18
 * **************************************************************************************
 * 
 * Created on FEB 28, 2018 12:20:50 PM
 *
 * @FileName: omspitrc_discup.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: // For new entries from 25 FEB 2018 - 'utin_inv_disc_option' store 'discUp' 
                       // Old payment panel now this utin_inv_disc_option value is null but in future utin_inv_disc_option value will be
                       // 'discDown' and we will provide customer to choose payment panel option @PRIYANKA-28FEB18
 *  AUTHOR: @PRIYANKA-28FEB18
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
?>
<?PHP
//**********************************************************************************
//*********************** INPUT PARAMETERS *****************************************
//**********************************************************************************
//  $payGoldWtPrevBal         => $goldPrevWeight           => PREV. GOLD WEIGHT
//  $payGoldWtPrevBalTyp      => $goldPrevWeightType       => PREV. GOLD WEIGHT TYPE
//  $payGoldWtPrevBalCRAmt    => $payGoldPrevCRWt          => PREV. GOLD CR AMOUNT
//  $payGoldWtPrevBalDRAmt    => $payGoldPrevDRWt          => PREV. GOLD DR AMOUNT
//  $paySilverWtPrevBal       => $silverPrevWeight         => PREV. SILVER WEIGHT 
//  $paySilverWtPrevBalTyp    => $silverPrevWeightType     => PREV. SILVER WEIGHT TYPE
//  $paySilverWtPrevBalCRAmt  => $paySilverPrevCRWt        => PREV. SILVER CR AMOUNT
//  $paySilverWtPrevBalDRAmt  => $paySilverPrevDRWt        => PREV. SILVER DR AMOUNT
//  $payPrevPurchaseGoldAmt   => $prevPurchaseGoldAmt      => PREV. GOLD PURCHASE AMOUNT
//  $payPrevPurchaseSilverAmt => $prevPurchaseSilverAmt    => PREV. SILVER PURCHASE AMOUNT
//  $payGoldWtRecBal          => $goldTotPaidWeight        => PREV. PAID GOLD WEIGHT
//  $payGoldWtRecBalTyp       => $goldTotPaidWeightType    => PREV. PAID GOLD WEIGHT TYPE
//  $paySilverWtRecBal        => $silverTotPaidWeight      => PREV. PAID SILVER WEIGHT
//  $paySilverWtRecBalTyp     => $silverTotPaidWeightType  => PREV. PAID SILVER WEIGHT TYPE
//  $payTotGoldAmtRecId       => $payTotGoldAmtRecId       => PREV. GOLD RATE
//  $payTotSilverAmtRecId     => $payTotSilverAmtRecId     => PREV. SILVER RATE
//  $payGoldWtFinBal          => $goldTotFinalWeight       => PREV. GOLD FINAL FINE WEIGHT
//  $payGoldWtFinBalTyp       => $goldTotFinalWeightType   => PREV. GOLD FINAL FINE WEIGHT TYPE
//  $paySilverWtFinBal        => $silverTotFinalWeight     => PREV. SILVER FINAL FINE WEIGHT
//  $paySilverWtFinBalTyp     => $silverTotFinalWeightType => PREV. SILVER FINAL FINE WEIGHT TYPE
//  $payGoldPrevRateId        => $goldPrevWtRate           => PREV. GOLD FINAL VALUVATION AMT
//  $paySilverPrevRateId      => $silverPrevWtRate         => PREV. SILVER FINAL VALUVATION AMT
//  $payGoldPurRateId         => $goldPurchaseAvgRate      => GOLD CURRENT RATE
//  $paySilverPurRateId       => $silverPurchaseAvgRate    => SILVER CURRENT RATE
//
// CONDITIONAL :
// CASH & NO RATE CUT :
//  $payRtCtGdCRDR            => $payRtCtGdCRDR            => RATE CUT GOLD CRDR
//  $payRtCtSlCRDR            => $payRtCtSlCRDR            => RATE CUT SILVER CRDR
//
// RATE CUT :
//  $payRtCtCashCRDR          => $payRtCtCashCRDR          => RATE CUT CASH CRDR
//
//
//**********************************************************************************
//*********************** FUNCTION NAME & PARAMETERS *******************************
//**********************************************************************************
// FUNCTION LIST :
// 1. calcWholeSaleRateCut(PREFIX NAME) :
//      JS FILE          : OMPAYFUNCTION.JS
//      PARAMETER        : PREFIX NAME
//      FUNCTIONALITY    : IT WILL CALCULATE METAL BALANCE IN ALL CASE (RATE CUT,
//                         NO RATE CUT, CASH)
//      NESTED FUNCTIONS : calcRawMetStock(prefix);
//                         calcPaymentCashBalance(prefix);
//                         
// 2. calcPaymentCashBalance(PREFIX NAME) :
//      JS FILE          : OMPAYFUNCTION.JS
//      PARAMETER        : PREFIX NAME
//      FUNCTIONALITY    : IT WILL CALCULATE TOTAL PAYABLE/RECIEVED AMOUNT(RATE CUT,
//                         NO RATE CUT, CASH)
//      NESTED FUNCTIONS : calcCashNdChequeAmt(prefix);
//                         calcCardAmt(prefix);
//                         calcOnlinePayAmt(prefix);
//                         discountAmt(prefix);
//                         calcByCashTotalPayableAmount(prefix);
//                         
// 3. valKeyPressedForNumNDot(EVENT) :
//      JS FILE          : OGNAVFUNCTION.JS
//      PARAMETER        : EVENT CODE
//      FUNCTIONALITY    : IT WILL PREVENT TO INPUT DECIMAL NUMBER
//      NESTED FUNCTIONS : 
//      
// 4. itemsaleRateCut()  :23 PARAMETERS
//      JS FILE          : OMPAYFUNCTION.JS
//      PARAMETER        : this.id                => ID OF INPUT FIELD
//                         $goldFinalWeight       => FINAL GOLD WEIGHT
//                         $goldFinalWeightType   => FINAL GOLD WEIGHT TYPE
//                         $silverFinalWeight     => FINAL SILVER WEIGHT
//                         $silverFinalWeightType => FINAL SILVER WEIGHT TYPE
//                         $goldPaidWeight        => PAID GOLD WEIGHT
//                         $goldPaidWeightType    => PAID GOLD WEIGHT TYPE
//                         $silverPaidWeight      => PAID SILVER WEIGHT
//                         $silverPaidWeightType  => PAID SILVER WEIGHT TYPE
//                         $goldRate              => GOLD CURRENT RATE
//                         $silverRate            => SILVER CURRENT RATE
//                         $payPanelName          => PAYMENT PANEL NAME
//                         $userId                => USER ID
//                         $payPreInvoiceNo       => TRANSACTION PRE INVOICE NO
//                         $payInvoiceNo          => TRANSACTION  INVOICE NO
//                         $utin_crystal_amt      => CRYSTAL AMOUNT
//                         payOpt                 => DEFAULT VALUE
//                         $utin_oth_chgs_amt     => OTHER CHARGES AMOUNT
//                         $utin_othr_chgs_by     => OTHER CHARGES AMOUNT
//                         $totalFinalBalance     => TOTAL FINAL BALANCE OF TRANS
//                         $totalGoldBalance      => TOTAL GOLD VALUATION
//                         $totalSilverBalance    => TOTAL SILVER VALUATION
//                         $totalFinalBalance     => TOTAL FINAL BALANCE OF TRANS
//      FUNCTIONALITY    : IT WILL MODIFIED DATA ACCORDING TO RATE CUT,
//                         NO RATE CUT AND CASH
//      NESTED FUNCTIONS : 
//**********************************************************************************
//**********************************************************************************
//
//
// Start Coding
if ($rtctTot != '') {
    $goldFinalWeight = $rtctTot;
}
?>
<table border="0" cellspacing="2" cellpadding="2" align="left" width="100%">
    <tr>
        <td>
            <?php
            if ($paymentMode == '') {
                $paymentMode = 'ByCash';
            }
            ?>
            <?php
            //**********************************************************************************
            //***********************INPUT FILEDS/HIDDEN FIELDS*********************************
            //**********************************************************************************
            ?>
            <!--Gold previous weight -->
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBal; ?>" name = "<?php echo $payGoldWtPrevBal; ?>" value = "<?php echo $goldPrevWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBalTyp; ?>" name = "<?php echo $payGoldWtPrevBalTyp; ?>" value = "<?php echo $goldPrevWeightType; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBalCRAmt; ?>" name = "<?php echo $payGoldWtPrevBalCRAmt; ?>" value = "<?php echo $payGoldPrevCRWt; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBalDRAmt; ?>" name = "<?php echo $payGoldWtPrevBalDRAmt; ?>" value = "<?php echo $payGoldPrevDRWt; ?>" />

            <!--Silver previous weight -->
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBal; ?>" name = "<?php echo $paySilverWtPrevBal; ?>" value = "<?php echo $silverPrevWeight; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBalTyp; ?>" name = "<?php echo $paySilverWtPrevBalTyp; ?>" value = "<?php echo $silverPrevWeightType; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBalCRAmt; ?>" name = "<?php echo $paySilverWtPrevBalCRAmt; ?>" value = "<?php echo $paySilverPrevCRWt; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBalDRAmt; ?>" name = "<?php echo $paySilverWtPrevBalDRAmt; ?>" value = "<?php echo $paySilverPrevDRWt; ?>" />

            <!--Gold & Silver previous all purchase items amount -->
            <input type = "hidden" id = "<?php echo $payPrevPurchaseGoldAmt; ?>" name = "<?php echo $payPrevPurchaseGoldAmt; ?>" value = "<?php echo $prevPurchaseGoldAmt; ?>" />
            <input type = "hidden" id = "<?php echo $payPrevPurchaseSilverAmt; ?>" name = "<?php echo $payPrevPurchaseSilverAmt; ?>" value = "<?php echo $prevPurchaseSilverAmt; ?>" />

            <!--Gold Received Weight -->
            <input type = "hidden" id = "<?php echo $payGoldWtRecBal; ?>" name = "<?php echo $payGoldWtRecBal; ?>" value = "<?php echo $goldTotPaidWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtRecBalTyp; ?>" name = "<?php echo $payGoldWtRecBalTyp; ?>" value = "<?php echo $goldTotPaidWeightType; ?>" />

            <!--Silver Received Weight -->
            <input type = "hidden" id = "<?php echo $paySilverWtRecBal; ?>" name = "<?php echo $paySilverWtRecBal; ?>" value = "<?php echo $silverTotPaidWeight; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtRecBalTyp; ?>" name = "<?php echo $paySilverWtRecBalTyp; ?>" value = "<?php echo $silverTotPaidWeightType; ?>" />

            <!--Received Gold & Silver Weight Amounts -->
            <input type = "hidden" id = "<?php echo $payTotGoldAmtRecId; ?>" name = "<?php echo $payTotGoldAmtRecId; ?>" />
            <input type = "hidden" id = "<?php echo $payTotSilverAmtRecId; ?>" name = "<?php echo $payTotSilverAmtRecId; ?>" />

            <!--Gold Final Weight Balance -->
            <input type = "hidden" id = "<?php echo $payGoldWtFinBal; ?>" name = "<?php echo $payGoldWtFinBal; ?>" value = "<?php echo $goldTotFinalWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtFinBalTyp; ?>" name = "<?php echo $payGoldWtFinBalTyp; ?>" value = "<?php echo $goldTotFinalWeightType; ?>" />

            <!--Silver Final Weight Balance -->
            <input type = "hidden" id = "<?php echo $paySilverWtFinBal; ?>" name = "<?php echo $paySilverWtFinBal; ?>" value = "<?php echo $silverTotFinalWeight; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtFinBalTyp; ?>" name = "<?php echo $paySilverWtFinBalTyp; ?>" value = "<?php echo $silverTotFinalWeightType; ?>" />

            <!--Gold & Silver previous metal rates -->
            <input type = "hidden" id = "<?php echo $payGoldPrevRateId; ?>" name = "<?php echo $payGoldPrevRateId; ?>" value = "<?php echo $goldPrevWtRate; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverPrevRateId; ?>" name = "<?php echo $paySilverPrevRateId; ?>" value = "<?php echo $silverPrevWtRate; ?>" />

            <!--Gold & Silver current purchase metal rates -->
            <input type = "hidden" id = "<?php echo $payGoldPurRateId; ?>" name = "<?php echo $payGoldPurRateId; ?>" value = "<?php echo $goldPurchaseAvgRate; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverPurRateId; ?>" name = "<?php echo $paySilverPurRateId; ?>" value = "<?php echo $silverPurchaseAvgRate; ?>" />

            <!--Rate Cut Weight CR / DR - For Weights -->
            <?php if ($paymentMode != 'RateCut') {
                ?>
                <input type="hidden" id="<?php echo $payRtCtGdCRDR; ?>" name="<?php echo $payRtCtGdCRDR; ?>" />
                <input type="hidden" id="<?php echo $payRtCtSlCRDR; ?>" name="<?php echo $payRtCtSlCRDR; ?>" />
            <?php } ?>
            <input type="hidden" id="<?php echo $payRtCtCashCRDR; ?>" name="<?php echo $payRtCtCashCRDR; ?>" />
            <table border="0" cellspacing="2" cellpadding="2" align="left" width="100%">
                <tr>
                    <?php
                    if ($paymentMode == 'RateCut' || $paymentMode == 'NoRateCut') {
                        ?>
                        <td colspan="6" width="75%">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr class="portlet grey-crusta box">
                                    <td width="5%">
                                        &nbsp;
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="15%">
                                        METAL BALANCE
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="15%">
                                        METAL RATE CUT
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="10%">
                                        CURR RATE
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="15%">
                                        MET AMT 
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="10%">
                                        MET BAL 
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="10%">
                                        AVG RATE
                                    </td>
                                    <td align="center" class="darkBlueCalibri13Font" width="15%">
                                        PROFIT/LOSS
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold" width="5%">
                                        GOLD:
                                    </td>
                                    <td align="right" class="blackCalibri13FontBold" width="15%">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="right">
                                                    <input id="<?php echo $payGoldWtBal; ?>" name="<?php echo $payGoldWtBal; ?>" type="text" placeholder="GOLD WT" value="<?php echo decimalVal($goldTotFinPurchasWt, 3); ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('metal1RtCtWtType').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('RateCut').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="javascript:calDiscountAmt('<?php echo $prefix; ?>');  
                                                                              calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                              calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                                              return false;"
                                                           onchange="javascript:if (event.keyCode == 13) {
                                                                       if (this.value != '<?php echo $totFinGdWt; ?>') {
                                                                           document.getElementById('stockPurPriceCut').value = 'RateCut';
                                                                       }
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="10" maxlength="10" readonly/>
                                                </td>
                                                <td align="right">
                                                    <div class="floatRight">
                                                        <input type="text" id="<?php echo $payGoldWtBalType; ?>" name="<?php echo $payGoldWtBalType; ?>" value="<?php echo $goldFinalWeightType; ?>" class="form-control-select20-font12" size="2" maxlength="4" readonly/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" class="printVisibilityHidden" width="15%">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="right">
                                                    <input id="<?php echo $payGoldRtCtWtBal; ?>" name="<?php echo $payGoldRtCtWtBal; ?>" type="text" placeholder="GOLD RATE CUT WT" value="<?php echo decimalVal($utin_gd_rtct_wt, 3); ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('<?php echo $payGoldRtCtWtBalType; ?>').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       //                                                                   document.getElementById('<?php echo $paySilverBalType; ?>').focus();
                                                                       return false;
                                                                   }"
                                                           onchange="calDiscountAmt('<?php echo $prefix; ?>');  
                                                                     calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                     calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                                     return false;"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"   
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="10" maxlength="10" />
                                                </td>
                                                <td align="right">
                                                    <div class="floatRight">
                                                        <select id="<?php echo $payGoldRtCtWtBalType; ?>" name="<?php echo $payGoldRtCtWtBalType; ?>" class="form-control-select20-font12" 

                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('<?php echo $payGoldRateId; ?>').focus();
                                                                            return false;
                                                                        } else if (event.keyCode == 8) {
                                                                            document.getElementById('<?php echo $payGoldRtCtWtBal; ?>').focus();
                                                                        }"
                                                                onchange="calDiscountAmt('<?php echo $prefix; ?>');  
                                                                          calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                          calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                                          return false;"
                                                                <?php if ($paymentMode == 'NoRateCut') { ?>disabled<?php } ?> >
                                                                <?php
                                                                    if ($utin_gd_rtct_wt_typ != '') {
                                                                        $payPanelGdRecWT = array(KG, GM, MG);
                                                                        for ($i = 0; $i <= 2; $i++)
                                                                            if ($payPanelGdRecWT[$i] == $utin_gd_rtct_wt_typ)
                                                                                $payPanelGdRecWTSel[$i] = 'selected';
                                                                    } else {
                                                                        $payPanelGdRecWTSel[1] = 'selected';
                                                                    }
                                                                    ?>
                                                            <option value="KG"<?php echo $payPanelGdRecWTSel[0]; ?>>KG</option>
                                                            <option value="GM"<?php echo $payPanelGdRecWTSel[1]; ?>>GM</option>
                                                            <option value="MG"<?php echo $payPanelGdRecWTSel[2]; ?>>MG</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" width="10%">
                                        <input id="<?php echo $payGoldRateId; ?>" name="<?php echo $payGoldRateId; ?>" type="text" placeholder="GOLD CURRENT RATE" value="<?php if ($goldPurchaseAvgRate != '') echo $goldPurchaseAvgRate; ?>" 
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payGoldAvgRateId; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           return false;
                                                       }"
                                               onblur="calDiscountAmt('<?php echo $prefix; ?>');  
                                                       calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                       calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                       return false;"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>');  
                                                         calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                         calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                         return false;"    
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="GOLD RATE"/>
                                    </td>
                                    <!-- START CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18 -->
                                    <td align="center" class="blackCalibri13FontBold" width="15%">
                                        <input id="<?php echo $payGoldValuation ?>" name="<?php echo $payGoldValuation; ?>" 
                                               type="text" placeholder="VALUATION" value="0.00" spellcheck="false" 
                                               class="form-control-req-height20 align_center placeholderClass" 
                                               size="10" maxlength="10" title="GOLD METAL VALUATION" 
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('metal1WtBal').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8) {
                                                           document.getElementById('<?php echo $payGoldRateId; ?>').focus();
                                                           return false;
                                                       }"                      
                                               onclick="this.value = '';"
                                               onblur="changeMetAmtCalcMetBal('<?php echo $prefix; ?>');
                                                       calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                       calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                       return false;"
                                               />
                                    </td>
                                    <!-- END CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18 -->
                                    <td align="right" width="10%">
                                        <input id="metal1WtBal" name="metal1WtBal" type="text" placeholder="GOLD FINAL WT" value="0.00" 
                                               spellcheck="false" 
                                               class="form-control-req-height20 align_center placeholderClass" 
                                               size="10" maxlength="10" readonly
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                              document.getElementById('<?php echo $payGoldAvgRateId; ?>').focus();
                                                              return false;
                                                          } else if (event.keyCode == 8) {
                                                              document.getElementById('<?php echo $payGoldValuation; ?>').focus();
                                                              return false;
                                                          }"
                                        />
                                    </td>
                                    <td align="center" width="10%">
                                        <input id="<?php echo $payGoldAvgRateId; ?>" name="<?php echo $payGoldAvgRateId; ?>" type="text" placeholder="GD AVG RATE" value="<?php if ($goldAvgRate != '') echo $goldAvgRate; ?>" 
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payGoldValuation; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="calDiscountAmt('<?php echo $prefix; ?>');  
                                                       calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                       calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                       return false;"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>');  
                                                         calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                         calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                         return false;"    
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="GOLD AVERAGE RATE (<?php echo $goldPrevWtRate . '+' . $goldRate; ?>)"/>
                                    </td>
                                    <td align="right" width="15%">
                                        <input id="metal1WtPNL" name="metal1WtPNL" type="text" placeholder="PROFIT/LOSS" value="<?php echo decimalVal(abs($goldWeightPNL), 2); ?>" 
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass" style="color: <?php echo $gColor; ?>" size="10" maxlength="10" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold" width="5%">
                                        SILVER:
                                    </td>
                                    <td align="right" class="blackCalibri13FontBold" width="15%">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="right">
                                                    <input id="<?php echo $paySilverWtBal; ?>" name="<?php echo $paySilverWtBal; ?>" type="text" placeholder="SILVER WT" value="<?php echo decimalVal($silverTotFinPurchasWt, 3); ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('metal2RtCtWtType').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('metal1Rate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="javascript:calDiscountAmt('<?php echo $prefix; ?>');  
                                                                              calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                              calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                                              return false;"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="10" maxlength="10" readonly/>
                                                </td>
                                                <td align="right">
                                                    <div class="floatRight">
                                                        <input type="text" id="<?php echo $paySilverWtBalType; ?>" name="<?php echo $paySilverWtBalType; ?>" value="<?php echo $silverFinalWeightType; ?>" class="form-control-select20-font12" size="2" maxlength="4" readonly/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" class="printVisibilityHidden" width="15%">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="right">
                                                    <input id="<?php echo $paySilverRtCtWtBal; ?>" name="<?php echo $paySilverRtCtWtBal; ?>" type="text" placeholder="SILVER RATE CUT WT" value="<?php echo decimalVal($utin_sl_rtct_wt, 3); ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('<?php echo $paySilverRtCtWtBalType; ?>').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       return false;
                                                                   }"
                                                           onchange="calDiscountAmt('<?php echo $prefix; ?>');  
                                                                     calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                     calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                                     return false;"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="10" maxlength="10" />
                                                </td>
                                                <td align="right">
                                                    <div class="floatRight">
                                                        <select id="<?php echo $paySilverRtCtWtBalType; ?>" name="<?php echo $paySilverRtCtWtBalType; ?>" 
                                                                onkeydown="javascript:if (event.keyCode == 13) {
                                                                            document.getElementById('<?php echo $paySilverRateId; ?>').focus();
                                                                            return false;
                                                                        } else if (event.keyCode == 8) {
                                                                            document.getElementById('<?php echo $paySilverRtCtWtBal; ?>').focus();
                                                                            return false;
                                                                        }"
                                                                onchange="javascript:calDiscountAmt('<?php echo $prefix; ?>');  
                                                                                     calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                                     calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                                                     return false;"

                                                                class="form-control-select20-font12" <?php if ($paymentMode == 'NoRateCut') { ?>disabled<?php } ?> >
                                                                    <?php
                                                                    if ($utin_sl_rtct_wt_typ != '') {
                                                                        $payPanelGdRecWT = array(KG, GM, MG);
                                                                        for ($i = 0; $i <= 2; $i++)
                                                                            if ($payPanelGdRecWT[$i] == $utin_sl_rtct_wt_typ)
                                                                                $payPanelSlRecWTSel[$i] = 'selected';
                                                                    } else {
                                                                        $payPanelSlRecWTSel[1] = 'selected';
                                                                    }
                                                                    ?>
                                                            <option value="KG"<?php echo $payPanelSlRecWTSel[0]; ?>>KG</option>
                                                            <option value="GM"<?php echo $payPanelSlRecWTSel[1]; ?>>GM</option>
                                                            <option value="MG"<?php echo $payPanelSlRecWTSel[2]; ?>>MG</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" width="10%">
                                        <input id="<?php echo $paySilverRateId; ?>" name="<?php echo $paySilverRateId; ?>" type="text" placeholder="SILVER CURRENT RATE" value="<?php if ($silverPurchaseAvgRate != '') echo $silverPurchaseAvgRate; ?>" 
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $paySilverAvgRateId; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="calDiscountAmt('<?php echo $prefix; ?>');  
                                                       calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                       calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                       return false;"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>');  
                                                         calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                         calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                         return false;"    
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="SILVER RATE"/>
                                    </td>
                                    <!-- START CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18 -->
                                    <td align="center" class="blackCalibri13FontBold" width="15%">
                                        <input id="<?php echo $paySilverValuation; ?>" name="<?php echo $paySilverValuation; ?>"
                                               type="text" placeholder="VALUATION" value="0.00" 
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('metal2WtBal').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8) {
                                                           document.getElementById('<?php echo $paySilverRateId; ?>').focus();
                                                           return false;
                                                       }"  
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                               size="10" maxlength="10" title="SILVER METAL VALUATION"
                                               onclick="this.value = '';"
                                               onblur="calDiscountAmt('<?php echo $prefix; ?>'); 
                                                       changeMetAmtCalcMetBal('<?php echo $prefix; ?>');
                                                       calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                       calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                       return false;" 
                                               />
                                    </td>
                                    <!-- END CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18 -->
                                    <td align="center" width="10%">
                                        <input id="metal2WtBal" name="metal2WtBal" type="text" placeholder="SILVER FINAL WT" value="0.00" 
                                               spellcheck="false" 
                                               class="form-control-req-height20 align_center placeholderClass" 
                                               size="10" maxlength="10" readonly
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $paySilverAvgRateId; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8) {
                                                           document.getElementById('<?php echo $paySilverValuation; ?>').focus();
                                                           return false;
                                                       }"  />
                                    </td>
                                    <td align="center" width="10%">
                                        <input id="<?php echo $paySilverAvgRateId; ?>" name="<?php echo $paySilverAvgRateId; ?>" type="text" placeholder="SL AVG RATE" value="<?php if ($silverAvgRate != '') echo $silverAvgRate; ?>" 
                                               onblur="calDiscountAmt('<?php echo $prefix; ?>'); 
                                                       calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                       calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                       return false;"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>'); 
                                                         calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                         calcPaymentCashBalance_discup('<?php echo $prefix; ?>');
                                                         return false;"    
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="SILVER AVERAGE RATE (<?php echo $silverPrevWtRate . '+' . $silverRate; ?>)"/>
                                    </td>
                                    <td align="right" width="15%">
                                        <input id="metal2WtPNL" name="metal2WtPNL" type="text" placeholder="PROFIT/LOSS" value="<?php echo decimalVal(abs($silverWeightPNL), 2); ?>" 
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"     
                                               spellcheck="false" class="form-control-req-height20 align_center placeholderClass redFont" style="color: <?php echo $sColor; ?>" size="10" maxlength="10" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <?php
                    }
                    if ($paymentMode == 'RateCut') {
                        $cashPaymentDetailsDiv = 'hidden';
                    } else if ($paymentMode == 'ByCash') {
                        $cashPaymentDetailsDiv = 'visible';
                    }
                    ?>
                    <?php
                    if ($_SESSION['sessionPayOptionStr'][6] != 'TRUE' && $paymentMode != 'NoRateCut') {
                        ?>
                        <td align="left">
                            <div id="cashPaymentDetailsDiv" style="visibility: <?php echo $cashPaymentDetailsDiv; ?>; position: absolute;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:-10px;">
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold">
                                            <input id="<?php echo $payTotalFinalAmt; ?>" name="<?php echo $payTotalFinalAmt; ?>" type="text" placeholder="TOTAL AMT" value="<?php echo $totalFinalBalance; ?>" 
                                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                               document.getElementById('<?php echo $payTotalAmtRec; ?>').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" >
                                            <input id="<?php echo $payTotalAmtRec; ?>" name="<?php echo $payTotalAmtRec; ?>" type="text" placeholder="METAL AMT REC" value="<?php echo $invTotMetAmtRec; ?>" 
                                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                               document.getElementById('<?php echo $paySilverWtBal; ?>').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('<?php echo $paySilverBalType; ?>').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10"/>

                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" >
                                            <input id="<?php echo $payTotalFinalAmt; ?>" name="<?php echo $payTotalFinalAmt; ?>" type="text" placeholder="TOTAL AMT BAL" value="<?php echo $totBalance; ?>" 
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    <?php } ?>
                    <?php
                    //}
                    //
//                    print_r($_REQUEST);
//                    echo '<br /><br />$advanceMoneyNumRows @== ' . $advanceMoneyNumRows . '<br />';
//                    echo '$panelName @== ' . $panelName . '<br />';
//                    echo '$mainPanel @== ' . $mainPanel . '<br />';
//                    echo '$payPanelName @@== ' . $_REQUEST['payPanelName'] . '<br />';
//                    echo '$transPanelName @@== ' . $_REQUEST['transPanelName'] . '<br />';
//                    echo '$payPanelName @== ' . $payPanelName . '<br />';
//                    echo '$transPanelName @== ' . $transPanelName . '<br />';
//                    echo '$paymentMode @== ' . $paymentMode . '<br />';
//                    echo '$prefix @== ' . $prefix . '<br />';
                    //
                    ?>
                    <?php if (($payPanelName != 'schemeCashPayment' || $payPanelName == 'schemeCashPayment') && $_REQUEST['metalType'] != 'CASH') { ?>
                        <td align="right" width="25%" colspan="3" valign="top">
                            <table border="0" cellpadding="0" cellspacing="1" valign="top">
                                <tr>
                                    <?php // if ($mainPanel != 'scheme') {     ?>
                                    <td align="center" class="blackCalibri13FontBold" style="background-color: #999999">
                                        <input type="text" value="NO RATE CUT" class="form-control-req-height20New align_center cursor" id="NoRateCut" 
                                               size="10"  maxlength="30" onclick="itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');" />
                                    </td>
                                    <td align="center" class="blackCalibri13FontBold" style="background-color: #999999">
                                        <input type="text" value="RATE CUT" class="form-control-req-height20New align_center cursor" id="RateCut" 
                                               size="7"  maxlength="30" onclick="itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');" />
                                    </td> 
                                    <?php // }    ?>
                                    <?php // if ($payPanelName != 'schemeMetalPayment' && $payPanelName != 'schemeMetalPayUp') {  ?>
                                    <td align="center" class="blackCalibri13FontBold" style="background-color: #999999">
                                        <input type="text" value="CASH" class="form-control-req-height20New align_center cursor" id="ByCash" 
                                               size="7"  maxlength="30" onclick="itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');" />
                                    </td><?php
//                                    }
                                    ?>
                                </tr>
                            </table>
                        </td>
                    <?php } ?>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="16">
            <div class="hrGrey"></div>
        </td>
    </tr>
    <tr>
        <td colspan="16">
            <table border="0" cellspacing="2" cellpadding="2" align="left" width="100%">
                <tr>
                    <td colspan="3"></td>
                    <td width="40%">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" class="spaceRight20">
                            <tr>
                                <td align="right" class="blackCalibri13FontBold" width="45%">
                                    GD PREV BAL:
                                </td>
                                <td align="right" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="right" class="itemAddPnLabels12ArialLink">
                                                <input type="text" id="metal1WtPrevBal" name="metal1WtPrevBal" value="<?php echo decimalVal($goldPrevWeight, 3) . ' ' . $goldPrevWeightType; ?>"
                                                       spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                            </td>
                                            <td align="right" class="itemAddPnLabels12ArialLink">
                                                <input type="text" id="<?php echo $payGoldWtPrevBalCRDR; ?>" name="<?php echo $payGoldWtPrevBalCRDR; ?>" value="<?php echo $payGoldPrevWtBalCRDR; ?>" 
                                                       class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td align="right" class="blackCalibri13FontBold" width="45%">
                                    SL PREV BAL:
                                </td>
                                <td align="right" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="right" class="itemAddPnLabels12ArialLink">
                                                <input type="text" id="metal2WtPrevBal" name="metal2WtPrevBal" value="<?php echo decimalVal($silverPrevWeight, 3) . ' ' . $silverPrevWeightType; ?>"
                                                       spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                            </td>
                                            <td align="right" class="itemAddPnLabels12ArialLink">
                                                <input type="text" id="<?php echo $paySilverWtPrevBalCRDR; ?>" name="<?php echo $paySilverWtPrevBalCRDR; ?>" value="<?php echo $paySilverPrevWtBalCRDR; ?>" 
                                                       class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php if ($paymentMode == 'RateCut' || $paymentMode == 'NoRateCut') { ?>
                                <?php if ($_SESSION['sessionPayOptionStr'][6] != 'TRUE') { ?>
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold" width="45%">
                                            GD <?php echo $PurVar; ?>:
                                        </td>
                                        <td align="left" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                            <input type="text" id="metal1WtPurBal" name="metal1WtPurBal" value="<?php echo decimalVal($goldFinalWeight, 3) . ' ' . $goldFinalWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right darkblueFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" width="45%">
                                            SL <?php echo $PurVar; ?>:
                                        </td>
                                        <td align="left" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                            <input type="text" id="metal2WtPurBal" name="metal2WtPurBal" value="<?php echo decimalVal($silverFinalWeight, 3) . ' ' . $silverFinalWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right darkblueFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold" width="45%">
                                            GD REC:
                                        </td>
                                        <td align="left" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                            <input type="text" id="metal1WtRecBal" name="metal1WtRecBal" value="<?php echo decimalVal($goldPaidWeight, 3) . ' ' . $goldPaidWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" width="45%">
                                            SL REC:
                                        </td>
                                        <td align="left" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                            <input type="text" id="metal2WtRecBal" name="metal2WtRecBal" value="<?php echo decimalVal($silverPaidWeight, 3) . ' ' . $silverPaidWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                    </tr>
                                <?php } if ($paymentMode == 'RateCut') { ?>
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold" width="45%">
                                            GD RATE CUT:
                                        </td>
                                        <td align="left" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="right" class="itemAddPnLabels12ArialLink">
                                                        <input type="text" id="metal1RtCtWtBal" name="metal1RtCtWtBal" value="<?php echo decimalVal($utin_gd_rtct_wt, 3) . ' ' . $utin_gd_rtct_wt_typ; ?>"
                                                               spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                                    </td>
                                                    <td align="right" class="itemAddPnLabels12ArialLink">
                                                        <input type="text" id="<?php echo $payRtCtGdCRDR; ?>" name="<?php echo $payRtCtGdCRDR; ?>" 
                                                               class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" width="45%">
                                            SL RATE CUT:
                                        </td>
                                        <td align="left" class="itemAddPnLabels12ArialLink" width="15%" colspan="2">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="right" class="itemAddPnLabels12ArialLink">
                                                        <input type="text" id="metal2RtCtWtBal" name="metal2RtCtWtBal" value="<?php echo decimalVal($utin_sl_rtct_wt, 3) . ' ' . $utin_sl_rtct_wt_typ; ?>"
                                                               spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                                    </td>
                                                    <td align="right" class="itemAddPnLabels12ArialLink">
                                                        <input type="text" id="<?php echo $payRtCtSlCRDR; ?>" name="<?php echo $payRtCtSlCRDR; ?>"
                                                               class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold border-color-grey-top border-color-grey-bottom" width="45%">
                                        GD BALANCE:
                                    </td>
                                    <td align="left" class="itemAddPnLabels12ArialLink border-color-grey-top border-color-grey-bottom" width="15%" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="metal1WtFinBal" name="metal1WtFinBal" value="<?php echo decimalVal($goldTotFinVal, 3) . ' ' . $goldTotFFineWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right redFont" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="<?php echo $payFinalGdCRDR; ?>" name="<?php echo $payFinalGdCRDR; ?>" value="<?php echo $utin_gd_CRDR; ?>"
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="right" class="blackCalibri13FontBold border-color-grey-top border-color-grey-bottom" width="45%">
                                        SL BALANCE:
                                    </td>
                                    <td align="left" class="itemAddPnLabels12ArialLink border-color-grey-top border-color-grey-bottom" width="15%" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="metal2WtFinBal" name="metal2WtFinBal" value="<?php echo decimalVal($silverTotFinVal, 3) . ' ' . $silverTotFFineWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right redFont" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="<?php echo $payFinalSlCRDR; ?>" name="<?php echo $payFinalSlCRDR; ?>" value="<?php echo $utin_sl_CRDR; ?>"
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>