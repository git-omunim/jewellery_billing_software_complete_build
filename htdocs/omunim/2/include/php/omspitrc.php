<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK RATE CUT FILE
 * **************************************************************************************
 * 
 * Created on Feb 10, 2016 11:53:51 PM
 *
 * @FileName: omspitrc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
?>
<?php
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

//echo '$PaymentReceiptPanel 4== '.$PaymentReceiptPanel.'<br />';
//echo '$crystalPrevWeightType==2233==='.$crystalPrevWeightType;
?>
<table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
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
            <input type="hidden" id="PrevCashBalCRDR" name="PrevCashBalCRDR" value="<?php echo $prevCashBalCRDR; ?>" />
            <!--Gold previous weight -->
            <?php // echo '$payGoldWtPrevBal'.$payGoldWtPrevBal;?>
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBal; ?>" name = "<?php echo $payGoldWtPrevBal; ?>" value = "<?php echo $goldPrevWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBalTyp; ?>" name = "<?php echo $payGoldWtPrevBalTyp; ?>" value = "<?php echo $goldPrevWeightType; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBalCRAmt; ?>" name = "<?php echo $payGoldWtPrevBalCRAmt; ?>" value = "<?php echo $payGoldPrevCRWt; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtPrevBalDRAmt; ?>" name = "<?php echo $payGoldWtPrevBalDRAmt; ?>" value = "<?php echo $payGoldPrevDRWt; ?>" />

            <!--Silver previous weight -->
            <?php // echo '$paySilverWtPrevBal==' . $paySilverWtPrevBal; ?>
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBal; ?>" name = "<?php echo $paySilverWtPrevBal; ?>" value = "<?php echo $silverPrevWeight; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBalTyp; ?>" name = "<?php echo $paySilverWtPrevBalTyp; ?>" value = "<?php echo $silverPrevWeightType; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBalCRAmt; ?>" name = "<?php echo $paySilverWtPrevBalCRAmt; ?>" value = "<?php echo $paySilverPrevCRWt; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtPrevBalDRAmt; ?>" name = "<?php echo $paySilverWtPrevBalDRAmt; ?>" value = "<?php echo $paySilverPrevDRWt; ?>" />

            <!--Crystal previous weight -->
            <?php // echo '$payCrystalWtPrevBal='. $payCrystalWtPrevBal.'<br>';?>
            <?php // echo '$crystalPrevWeightType==@@=='.$crystalPrevWeightType;?>
            <input type = "hidden" id = "<?php echo $payCrystalWtPrevBal; ?>" name = "<?php echo $payCrystalWtPrevBal; ?>" value = "<?php echo $crystalPrevWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payCrystalWtPrevBalTyp; ?>" name = "<?php echo $payCrystalWtPrevBalTyp; ?>" value = "<?php echo $crystalPrevWeightType; ?>" />
            <input type = "hidden" id = "<?php echo $payCrystalWtPrevBalCRAmt; ?>" name = "<?php echo $payCrystalWtPrevBalCRAmt; ?>" value = "<?php echo $payCrystalPrevCRWt; ?>" />
            <?php // echo '$payCrystalPrevDRWt='.$payCrystalPrevDRWt;?>
            <input type = "hidden" id = "<?php echo $payCrystalWtPrevBalDRAmt; ?>" name = "<?php echo $payCrystalWtPrevBalDRAmt; ?>" value = "<?php echo $payCrystalPrevDRWt; ?>" />

            <!--Gold & Silver previous all purchase items amount -->
            <input type = "hidden" id = "<?php echo $payPrevPurchaseGoldAmt; ?>" name = "<?php echo $payPrevPurchaseGoldAmt; ?>" value = "<?php echo $prevPurchaseGoldAmt; ?>" />
            <input type = "hidden" id = "<?php echo $payPrevPurchaseSilverAmt; ?>" name = "<?php echo $payPrevPurchaseSilverAmt; ?>" value = "<?php echo $prevPurchaseSilverAmt; ?>" />
            <input type = "hidden" id = "<?php echo $payPrevPurchaseCrystalAmt; ?>" name = "<?php echo $payPrevPurchaseCrystalAmt; ?>" value = "<?php echo $prevPurchaseCrystalAmt; ?>" />

            <!--Gold Received Weight -->
            <input type = "hidden" id = "<?php echo $payGoldWtRecBal; ?>" name = "<?php echo $payGoldWtRecBal; ?>" value = "<?php echo $goldTotPaidWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtRecBalTyp; ?>" name = "<?php echo $payGoldWtRecBalTyp; ?>" value = "<?php echo $goldTotPaidWeightType; ?>" />

            <!--Silver Received Weight -->
            <input type = "hidden" id = "<?php echo $paySilverWtRecBal; ?>" name = "<?php echo $paySilverWtRecBal; ?>" value = "<?php echo $silverTotPaidWeight; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtRecBalTyp; ?>" name = "<?php echo $paySilverWtRecBalTyp; ?>" value = "<?php echo $silverTotPaidWeightType; ?>" />

            <!--Crystal Received Weight -->
            <input type = "hidden" id = "<?php echo $payCrystalWtRecBal; ?>" name = "<?php echo $payCrystalWtRecBal; ?>" value = "<?php echo $crystalTotPaidWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payCrystalWtRecBalTyp; ?>" name = "<?php echo $payCrystalWtRecBalTyp; ?>" value = "<?php echo $crystalTotPaidWeightType; ?>" />

            <!--Received Gold & Silver Weight Amounts -->
            <input type = "hidden" id = "<?php echo $payTotGoldAmtRecId; ?>" name = "<?php echo $payTotGoldAmtRecId; ?>" />
            <input type = "hidden" id = "<?php echo $payTotSilverAmtRecId; ?>" name = "<?php echo $payTotSilverAmtRecId; ?>" />
            <input type = "hidden" id = "<?php echo $payTotCrystalAmtRecId; ?>" name = "<?php echo $payTotCrystalAmtRecId; ?>" />

            <!--Gold Final Weight Balance -->
            <input type = "hidden" id = "<?php echo $payGoldWtFinBal; ?>" name = "<?php echo $payGoldWtFinBal; ?>" value = "<?php echo $goldTotFinalWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payGoldWtFinBalTyp; ?>" name = "<?php echo $payGoldWtFinBalTyp; ?>" value = "<?php echo $goldTotFinalWeightType; ?>" />

            <!--Silver Final Weight Balance -->
            <input type = "hidden" id = "<?php echo $paySilverWtFinBal; ?>" name = "<?php echo $paySilverWtFinBal; ?>" value = "<?php echo $silverTotFinalWeight; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverWtFinBalTyp; ?>" name = "<?php echo $paySilverWtFinBalTyp; ?>" value = "<?php echo $silverTotFinalWeightType; ?>" />

            <!--Crystal Final Weight Balance -->
            <input type = "hidden" id = "<?php echo $payCrystalWtFinBal; ?>" name = "<?php echo $payCrystalWtFinBal; ?>" value = "<?php echo $crystalTotFinalWeight; ?>" />
            <input type = "hidden" id = "<?php echo $payCrystalWtFinBalTyp; ?>" name = "<?php echo $payCrystalWtFinBalTyp; ?>" value = "<?php echo $crystalTotFinalWeightType; ?>" />

            <!--Gold & Silver previous metal rates -->
            <input type = "hidden" id = "<?php echo $payGoldPrevRateId; ?>" name = "<?php echo $payGoldPrevRateId; ?>" value = "<?php echo $goldPrevWtRate; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverPrevRateId; ?>" name = "<?php echo $paySilverPrevRateId; ?>" value = "<?php echo $silverPrevWtRate; ?>" />
            <input type = "hidden" id = "<?php echo $payCrystalPrevRateId; ?>" name = "<?php echo $payCrystalPrevRateId; ?>" value = "<?php echo $crystalPrevWtRate; ?>" />

            <!--Gold & Silver current purchase metal rates -->
            <input type = "hidden" id = "<?php echo $payGoldPurRateId; ?>" name = "<?php echo $payGoldPurRateId; ?>" value = "<?php echo $goldPurchaseAvgRate; ?>" />
            <input type = "hidden" id = "<?php echo $paySilverPurRateId; ?>" name = "<?php echo $paySilverPurRateId; ?>" value = "<?php echo $silverPurchaseAvgRate; ?>" />
            <input type = "hidden" id = "<?php echo $payCrystalPurRateId; ?>" name = "<?php echo $payCrystalPurRateId; ?>" value = "<?php echo $crystalPurchaseAvgRate; ?>" />

            <input type = "hidden" id = "paymentMode" name = "paymentMode" value = "<?php echo $paymentMode; ?>" />
            
            <!--<input type = "hidden" id = "utin_crystal_amt_temp" name = "utin_crystal_amt_temp" value = "<?php echo $utin_crystal_amt_temp; ?>" />-->

            <!-- START CODE TO ADD HIDDEN VARIABLE FOR HIDDEN PAYEMENT PANEL NAME @AUTHOR:MADHUREE-23JUNE2020 -->
            <input type = "hidden" id = "payPanelNameHidden" name = "payPanelNameHidden" value = "<?php echo $PaymentReceiptPanel; ?>" />
            <!-- END CODE TO ADD HIDDEN VARIABLE FOR HIDDEN PAYEMENT PANEL NAME @AUTHOR:MADHUREE-23JUNE2020 -->

            <!--Rate Cut Weight CR / DR - For Weights -->
            <?php if ($paymentMode != 'RateCut') {
                ?>
                <input type="hidden" id="<?php echo $payRtCtGdCRDR; ?>" name="<?php echo $payRtCtGdCRDR; ?>" />
                <input type="hidden" id="<?php echo $payRtCtSlCRDR; ?>" name="<?php echo $payRtCtSlCRDR; ?>" />
                <input type="hidden" id="<?php echo $payRtCtStCRDR; ?>" name="<?php echo $payRtCtStCRDR; ?>" />               
            <?php } ?>
            <input type="hidden" id="<?php echo $payRtCtCashCRDR; ?>" name="<?php echo $payRtCtCashCRDR; ?>" />
            
            <!-- START CODE TO ADD FIRM ID TO PASS IN NO RATE & RATE FUNCTION @AUTHOR:MADHUREE-13AUGUST2021 -->
            <input type="hidden" id="firmId" name="firmId" value="<?php echo $firmId; ?>"/>
            <!-- END CODE TO ADD FIRM ID TO PASS IN NO RATE & RATE FUNCTION @AUTHOR:MADHUREE-13AUGUST2021 -->
            <table width="80%" cellspacing="0" cellpaddig="0" align="right">
                <tr>
                    <?php
                    //echo 'sessionPayOptionStr6 == ' . $_SESSION['sessionPayOptionStr'][6] . '<br />';
                    //echo '$paymentMode == ' . $paymentMode . '<br />';

                    if ($_SESSION['sessionPayOptionStr'][6] != 'TRUE' && ($paymentMode != 'NoRateCut' &&
                            $paymentMode != 'RateCut')) {
                        ?>
                        <td align="left" width="50%">
                            <div id="cashPaymentDetailsDiv" style="visibility: <?php echo $cashPaymentDetailsDiv; ?>;">
                                <table border="0" cellpadding="0" cellspacing="2">
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold">
                                            <input id="<?php echo $payTotalFinalAmt; ?>" name="<?php echo $payTotalFinalAmt; ?>" type="text" placeholder="TOTAL AMT" value="<?php echo $totalFinalBalance; ?>" 
                                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                               document.getElementById('<?php echo $payTotalAmtRec; ?>').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" style="height:35px;"/>
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
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" style="height:35px;"/>

                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" >
                                            <input id="<?php echo $payTotalFinalAmt; ?>" name="<?php echo $payTotalFinalAmt; ?>" type="text" placeholder="TOTAL AMT BAL" value="<?php echo $totBalance; ?>" 
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" style="height:35px;"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    <?php } ?>
                <?php
                    if (($payPanelName != 'schemeCashPayment' || $payPanelName == 'schemeCashPayment') &&
                            $_REQUEST['metalType'] != 'CASH') {
                        ?>
                        <td align="right" width="50%"  valign="top">
                            <table border="0" cellpadding="0" cellspacing="2" valign="top">
                                <tr>
                                    <?php // if ($mainPanel != 'scheme') {          ?>
                                    <td align="center" class="blackCalibri13FontBold" 
                                        >
                                        <input type="text" value="NO RATE CUT" 
                                               class="form-control-req-height20New align_center cursor" 
                                               id="NoRateCut" size="10"  maxlength="30" 
                                               onclick="itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $crystalFinalWeight; ?>', '<?php echo $crystalFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $crystalPaidWeight; ?>', '<?php echo $crystalPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $crystalRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalCrystalBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');" 
                                               onkeydown = "if (event.ctrlKey && event.key === 'Enter') { 
                                                          document.getElementsByName('paySubButtPrint')[0].focus();   
                                                          }" style="background-color: #e7e7e7;padding: 5px;border-radius: 3px !important;border: 1px solid #c1c1c1;height: 32px;"/>
                                               
                                    </td>
                                    <td align="center" class="blackCalibri13FontBold">
                                        <input type="text" value="RATE CUT" 
                                               class="form-control-req-height20New align_center cursor" 
                                               id="RateCut" size="7"  maxlength="30" 
                                               onclick="resetChangeMetAmtCalcMetBal();
                                                       itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $crystalFinalWeight; ?>', '<?php echo $crystalFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $crystalPaidWeight; ?>', '<?php echo $crystalPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $crystalRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalCrystalBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');" 
                                                       onkeydown = "if (event.ctrlKey && event.key === 'Enter') { 
                                                          document.getElementsByName('paySubButtPrint').focus();     
                                                            }" style="background-color: #e7e7e7;padding: 5px;border-radius: 3px !important;border: 1px solid #c1c1c1;height: 32px;"/>
                                    </td> 
                                    <?php // } ?>
                                    <?php
                                    // if ($payPanelName != 'schemeMetalPayment' && $payPanelName != 'schemeMetalPayUp') {   
                                    //
                                    //echo '$paymentMode == ' . $paymentMode . '<br />';
                                    //echo '$setByDefaultPaymentMode == ' . $setByDefaultPaymentMode . '<br />';
                                    //
                                    if ($setByDefaultPaymentMode == 'NoRateCut' || $hideCashButtonOnPaymentPanel == 'YES') {
                                        ?>
                                        <td align="center" class="blackCalibri13FontBold">
                                            <input type="hidden" id="ByCash" value="CASH" readonly
                                                   class="form-control-req-height20New align_center cursor" style="background-color: #e7e7e7;padding: 5px;border-radius: 3px !important;border: 1px solid #c1c1c1;height: 32px;"
                                                   size="7"  maxlength="30"
                                                   onclick="itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $crystalFinalWeight; ?>', '<?php echo $crystalFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $crystalPaidWeight; ?>', '<?php echo $crystalPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $crystalRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalCrystalBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');"/>
                                        </td>
                                    <?php } else { ?>
                                        <td align="center" class="blackCalibri13FontBold">
                                            <input type="text" value="CASH" 
                                                   class="form-control-req-height20New align_center cursor" style="background-color: #e7e7e7;padding: 5px;border-radius: 3px !important;border: 1px solid #c1c1c1;height: 32px;"
                                                   id="ByCash" size="7"  maxlength="30" 
                                                   onclick="itemsaleRateCut(this.id, '<?php echo $goldFinalWeight; ?>', '<?php echo $goldFinalWeightType; ?>', '<?php echo $silverFinalWeight; ?>', '<?php echo $silverFinalWeightType; ?>', '<?php echo $crystalFinalWeight; ?>', '<?php echo $crystalFinalWeightType; ?>', '<?php echo $goldPaidWeight; ?>', '<?php echo $goldPaidWeightType; ?>', '<?php echo $silverPaidWeight; ?>', '<?php echo $silverPaidWeightType; ?>', '<?php echo $crystalPaidWeight; ?>', '<?php echo $crystalPaidWeightType; ?>', '<?php echo $goldRate; ?>', '<?php echo $silverRate; ?>', '<?php echo $crystalRate; ?>', '<?php echo $payPanelName; ?>', '<?php echo $userId; ?>', '<?php echo $payPreInvoiceNo; ?>', '<?php echo $payInvoiceNo; ?>', '<?php echo $utin_crystal_amt; ?>', 'payOpt', '<?php echo $utin_oth_chgs_amt; ?>', '<?php echo $utin_othr_chgs_by; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $totalGoldBalance; ?>', '<?php echo $totalSilverBalance; ?>', '<?php echo $totalCrystalBalance; ?>', '<?php echo $totalFinalBalance; ?>', '<?php echo $PaymentReceiptPanel; ?>', '<?php echo $utin_hallmark_chrgs_amt; ?>');" />
                                        </td>
                                        <?php
                                    }
                                    //
                                    //}
                                    ?>
                                </tr>
                            </table>
                        </td>
                    <?php } ?>
                         
                </tr>
            </table>
            <table border="0" cellspacing="2" cellpadding="2" align="left" width="100%">
                <tr>
                    <?php
                    if ($paymentMode == 'RateCut' || $paymentMode == 'NoRateCut') {
                        ?>
                        <td>
                            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                                <tr>
                                    <td colspan="6" width="75%">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr class="portlet grey-crusta box">
                                                <td width="5%">
                                                    &nbsp;
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> METAL BALANCE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> METAL RATE CUT </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>CURR RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> MET AMT  </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>MET BAL  </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>AVG RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>PROFIT/LOSS </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b>GOLD:</b>
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
                                                                       onblur="javascript:calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                            <!-- START CODE TO RESET METAL AMOUNT ACCORDING TO METAL BALANCE @PRIYANKA-23MAR18 -->
                                                            <td align="right">
                                                                <input id="<?php echo $payGoldRtCtWtBal; ?>" name="<?php echo $payGoldRtCtWtBal; ?>" type="text" placeholder="GOLD RATE CUT WT" value="<?php echo decimalVal($utin_gd_rtct_wt, 3); ?>" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('<?php echo $payGoldRtCtWtBalType; ?>').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   //                                                                   document.getElementById('<?php echo $paySilverBalType; ?>').focus();
                                                                                   return false;
                                                                               }"
                                                                       onchange="resetChangeMetAmtCalcMetBal();
                                                                               calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                               calcRawMetStock('<?php echo $prefix; ?>');
                                                                               calDiscountAmt('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                                            onchange="calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                                    calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                           onblur="resetChangeMetAmtCalcMetBal();
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"
                                                           onchange="resetChangeMetAmtCalcMetBal();
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"    
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="GOLD RATE"/>
                                                </td>
                                                <!-- END CODE TO RESET METAL AMOUNT ACCORDING TO METAL BALANCE @PRIYANKA-23MAR18 -->
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
                                                           onblur="
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"
                                                           onchange="
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
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

                                            <tr class="portlet grey-crusta box" >
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">

                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> PREV OPENING </b>
                                                </td>                      
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> CASH TO METAL </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                  <b>  CASH BAL </b>
                                                </td> 
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> PURITY </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b> MET BAL</b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">

                                                </td>                                   
                                            </tr>

                                            <tr>                                    
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b> GD CASH:</b>
                                                </td>  

                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="utin_prev_cash_opening" 
                                                                       name="utin_gd_prev_cash_opening" 
                                                                       value="<?php echo $utin_gd_prev_cash_opening; ?>" type="text"
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('utin_cash_to_metal').focus();
                                                                                   return false;
                                                                               }"                                     
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="utin_prev_cash_opening_CRDR" 
                                                                           name="utin_gd_prev_cash_opening_CRDR" 
                                                                           value="<?php echo $utin_gd_prev_cash_opening_CRDR; ?>"
                                                                           class="form-control-select20-font12" size="2" maxlength="4"  readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="right">
                                                    <input id="utin_cash_to_metal" name="utin_gd_cash_to_metal" 
                                                           value="<?php echo $utin_gd_cash_to_metal; ?>"
                                                           type="text" 
                                                           placeholder="CASH TO METAL" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_prev_cash_bal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_prev_cash_opening').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" />
                                                </td>
                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr> 
                                                            <td align="center" width="75%">
                                                                <input id="utin_prev_cash_bal"  
                                                                       name="utin_gd_prev_cash_balance"
                                                                       value="<?php echo $utin_gd_prev_cash_balance; ?>" type="text" 
                                                                       placeholder="PREV CASH BAL" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('utin_metal_rate').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('utin_cash_to_metal').focus();
                                                                                   return false;
                                                                               }"    
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="8" maxlength="10" title="PREV CASH BAL" readonly/>
                                                            </td>

                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="utin_prev_cash_bal_CRDR" 
                                                                           name="utin_gd_prev_cash_bal_CRDR" 
                                                                           value="<?php echo $utin_gd_prev_cash_bal_CRDR; ?>"  
                                                                           class="form-control-select20-font12" size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <input id="utin_metal_rate" name="utin_gd_cash_metal_rate" type="text" 
                                                           placeholder="METAL RATE" 
                                                           value="<?php echo $utin_gd_cash_metal_rate; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_purity').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_prev_cash_bal').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL RATE" />
                                                </td>

                                                <td align="right" width="10%">
                                                    <input id="utin_purity" name="utin_gd_cash_metal_purity" 
                                                           type="text" 
                                                           placeholder="METAL PURITY" 
                                                           value="<?php
                                                           if ($utin_gd_cash_metal_purity != '' || $utin_gd_cash_metal_purity != NULL) {
                                                               echo $utin_gd_cash_metal_purity;
                                                           } else {
                                                               echo '100';
                                                           }
                                                           ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_cash_to_metalwt').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_metal_rate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"   
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL PURITY"/>
                                                </td>

                                                <td align="center" width="10%">
                                                    <input id="utin_cash_to_metalwt" name="utin_gd_cash_to_metalwt" 
                                                           type="text" placeholder="METAL WT" 
                                                           value="<?php echo $utin_gd_cash_to_metalwt; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_cash_to_metalwt_CRDR').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_purity').focus();
                                                                       return false;
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL WT" readonly/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <div class="floatRight">
                                                        <input type="text" id="utin_cash_to_metalwt_CRDR" name="utin_gd_cash_to_metalwt_CRDR" 
                                                               value="<?php echo $utin_gd_cash_to_metalwt_CRDR; ?>"  
                                                               class="form-control-req-height20 align_center placeholderClass"  
                                                               size="10" maxlength="10"  readonly/>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>                                    
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b> GD CASH CR/DR:</b>
                                                </td>  

                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="" name="" type="text"
                                                                       value="0.00"
                                                                       onkeydown=""                                     
                                                                       spellcheck="false" 
                                                                       class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="" 
                                                                           name="" 
                                                                           class="form-control-select20-font12" 
                                                                           size="2" maxlength="4"  readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>


                                                <td align="right">
                                                    <input id="GdCashToMetal" name="utin_gd_cash_metal_rec_paid" 
                                                           type="text" placeholder="CASH TO METAL" 
                                                           value="<?php echo $utin_gd_cash_metal_rec_paid; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('PrevGdCashBal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" />
                                                </td>
                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>  
                                                            <td align="center" width="75%">
                                                                <input id="PrevGdCashBal"  name="utin_gd_prev_cash_metal_rec_paid" 
                                                                       type="text" placeholder="PREV CASH BAL" 
                                                                       value="<?php echo $utin_gd_prev_cash_metal_rec_paid; ?>" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('GdMetalRate').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('GdCashToMetal').focus();
                                                                                   return false;
                                                                               }"    
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="8" maxlength="10" title="PREV CASH BAL" readonly/>
                                                            </td>

                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="PrevGdCashBalCRDR" 
                                                                           name="utin_gd_prev_cash_metal_rec_paid_CRDR" 
                                                                           value="<?php echo $utin_gd_prev_cash_metal_rec_paid_CRDR; ?>"  
                                                                           class="form-control-select20-font12" 
                                                                           size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <input id="GdMetalRate" name="utin_gd_cash_metal_rec_paid_rate" 
                                                           type="text" placeholder="METAL RATE" 
                                                           value="<?php echo $utin_gd_cash_metal_rec_paid_rate; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('GdPurity').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('PrevGdCashBal').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL RATE" />
                                                </td>

                                                <td align="right" width="10%">
                                                    <input id="GdPurity" name="utin_gd_cash_metal_rec_paid_purity" 
                                                           type="text" placeholder="METAL PURITY" 
                                                           value="<?php
                                                           if ($utin_gd_cash_metal_rec_paid_purity != '' || $utin_gd_cash_metal_rec_paid_purity != NULL) {
                                                               echo $utin_gd_cash_metal_rec_paid_purity;
                                                           } else {
                                                               echo '100';
                                                           }
                                                           ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('CashToGdMetalWt').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('GdMetalRate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"   
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL PURITY"/>
                                                </td>

                                                <td align="center" width="10%">
                                                    <input id="CashToGdMetalWt" name="utin_gd_cash_metal_rec_paid_wt" 
                                                           type="text" placeholder="METAL WT" 
                                                           value="<?php echo $utin_gd_cash_metal_rec_paid_wt; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('GdPurity').focus();
                                                                       return false;
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL WT" readonly/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <div class="floatRight">
                                                        <input type="text" id="CashToGdMetalWtCRDR" 
                                                               name="utin_gd_cash_metal_rec_paid_wt_CRDR" 
                                                               value="<?php echo $utin_gd_cash_metal_rec_paid_wt_CRDR; ?>"  
                                                               class="form-control-req-height20 align_center placeholderClass"  
                                                               size="10" maxlength="10"  readonly/>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr class="portlet grey-crusta box" >
                                                <td align="center" class="darkBlueCalibri13Font" colspan="8">
                                                    <hr/>
                                                </td>
                                            </tr>

                                            <tr class="portlet grey-crusta box">
                                                <td width="5%">
                                                    &nbsp;
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>METAL BALANCE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>METAL RATE CUT </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>CURR RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>MET AMT  </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>MET BAL  </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>AVG RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>PROFIT/LOSS </b>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b> SILVER:</b>
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
                                                                       onblur="javascript:calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                <!-- START CODE TO RESET METAL AMOUNT ACCORDING TO METAL BALANCE @PRIYANKA-23MAR18 -->
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
                                                                       onchange="resetChangeMetAmtCalcMetBal();
                                                                               calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                               calcRawMetStock('<?php echo $prefix; ?>');
                                                                               calDiscountAmt('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                                            onchange="javascript:calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                                    calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                           onblur="resetChangeMetAmtCalcMetBal();
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"
                                                           onchange="resetChangeMetAmtCalcMetBal();
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"    
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="SILVER RATE"/>
                                                </td>
                                                <!-- END CODE TO RESET METAL AMOUNT ACCORDING TO METAL BALANCE @PRIYANKA-23MAR18 -->
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
                                                           onblur="changeMetAmtCalcMetBal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
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
                                                           onblur="calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"
                                                           onchange="calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
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

                                            <tr class="portlet grey-crusta box" >
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">

                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> PREV OPENING </b>
                                                </td>                      
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> CASH TO METAL </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>CASH BAL </b>
                                                </td> 
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>PURITY </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                   <b> MET BAL </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">

                                                </td>                                   
                                            </tr>

                                            <tr>                                    
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b> SL CASH:</b>
                                                </td>  

                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="utin_sl_prev_cash_opening" name="utin_sl_prev_cash_opening" 
                                                                       type="text"
                                                                       value="<?php echo $utin_sl_prev_cash_opening; ?>"  
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('utin_sl_cash_to_metal').focus();
                                                                                   return false;
                                                                               }"                                     
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="utin_sl_prev_cash_opening_CRDR" 
                                                                           name="utin_sl_prev_cash_opening_CRDR" 
                                                                           value="<?php echo $utin_sl_prev_cash_opening_CRDR; ?>" 
                                                                           class="form-control-select20-font12" size="2" maxlength="4"  readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>


                                                <td align="right">
                                                    <input id="utin_sl_cash_to_metal" name="utin_sl_cash_to_metal" 
                                                           placeholder="CASH TO METAL" type="text" 
                                                           value="<?php echo $utin_sl_cash_to_metal; ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_sl_prev_cash_bal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_sl_prev_cash_opening').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" />
                                                </td>



                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr> 
                                                            <td align="center" width="75%">
                                                                <input id="utin_sl_prev_cash_bal"  name="utin_sl_prev_cash_balance" 
                                                                       type="text" placeholder="PREV CASH BAL" 
                                                                       value="<?php echo $utin_sl_prev_cash_balance; ?>"  
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('utin_sl_cash_metal_rate').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('utin_sl_cash_to_metal').focus();
                                                                                   return false;
                                                                               }"    
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="8" maxlength="10" title="PREV CASH BAL" readonly/>
                                                            </td>

                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="utin_sl_prev_cash_bal_CRDR" 
                                                                           name="utin_sl_prev_cash_bal_CRDR" 
                                                                           value="<?php echo $utin_sl_prev_cash_bal_CRDR; ?>"  
                                                                           class="form-control-select20-font12" size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <input id="utin_sl_cash_metal_rate" name="utin_sl_cash_metal_rate" 
                                                           type="text" placeholder="METAL RATE" 
                                                           value="<?php echo $utin_sl_cash_metal_rate; ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_sl_cash_metal_purity').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_sl_prev_cash_bal').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL RATE" />
                                                </td>

                                                <td align="right" width="10%">
                                                    <input id="utin_sl_cash_metal_purity" name="utin_sl_cash_metal_purity" 
                                                           type="text" placeholder="METAL PURITY" 
                                                           value="<?php
                                                           if ($utin_sl_cash_metal_purity != '' || $utin_sl_cash_metal_purity != NULL) {
                                                               echo $utin_sl_cash_metal_purity;
                                                           } else {
                                                               echo '100';
                                                           }
                                                           ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_sl_cash_to_metalwt').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_sl_cash_metal_rate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"   
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL PURITY"/>
                                                </td>

                                                <td align="center" width="10%">
                                                    <input id="utin_sl_cash_to_metalwt" name="utin_sl_cash_to_metalwt" 
                                                           type="text" placeholder="METAL WT" 
                                                           value="<?php echo $utin_sl_cash_to_metalwt; ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_sl_cash_metal_purity').focus();
                                                                       return false;
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL WT" readonly/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <div class="floatRight">
                                                        <input type="text" id="utin_sl_cash_to_metalwt_CRDR" 
                                                               name="utin_sl_cash_to_metalwt_CRDR" 
                                                               value="<?php echo $utin_sl_cash_to_metalwt_CRDR; ?>" 
                                                               class="form-control-req-height20 align_center placeholderClass"  
                                                               size="10" maxlength="10"  readonly/>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>                                    
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b>SL CASH CR/DR:</b>
                                                </td>  

                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="" name="" type="text"
                                                                       value="0.00"
                                                                       onkeydown=""                                     
                                                                       spellcheck="false" 
                                                                       class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="" 
                                                                           name="" 
                                                                           class="form-control-select20-font12" 
                                                                           size="2" maxlength="4"  readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>


                                                <td align="right">
                                                    <input id="SlCashToMetal" name="utin_sl_cash_metal_rec_paid" 
                                                           type="text" placeholder="CASH TO METAL" 
                                                           value="<?php echo $utin_sl_cash_metal_rec_paid; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('PrevSlCashBal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" />
                                                </td>


                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>  
                                                            <td align="center" width="75%">
                                                                <input id="PrevSlCashBal"  name="utin_sl_prev_cash_metal_rec_paid" 
                                                                       type="text" placeholder="PREV CASH BAL" 
                                                                       value="<?php echo $utin_sl_prev_cash_metal_rec_paid; ?>" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('SlMetalRate').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('SlCashToMetal').focus();
                                                                                   return false;
                                                                               }"    
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="8" maxlength="10" title="PREV CASH BAL" readonly/>
                                                            </td>

                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="PrevSlCashBalCRDR" 
                                                                           name="utin_sl_prev_cash_metal_rec_paid_CRDR" 
                                                                           value="<?php echo $utin_sl_prev_cash_metal_rec_paid_CRDR; ?>" 
                                                                           class="form-control-select20-font12" 
                                                                           size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <input id="SlMetalRate" name="utin_sl_cash_metal_rec_paid_rate" 
                                                           type="text" placeholder="METAL RATE" 
                                                           value="<?php echo $utin_sl_cash_metal_rec_paid_rate; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('SlPurity').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('PrevSlCashBal').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL RATE" />
                                                </td>

                                                <td align="right" width="10%">
                                                    <input id="SlPurity" name="utin_sl_cash_metal_rec_paid_purity"
                                                           type="text" placeholder="METAL PURITY" 
                                                           value="<?php
                                                           if ($utin_sl_cash_metal_rec_paid_purity != '' || $utin_sl_cash_metal_rec_paid_purity != NULL) {
                                                               echo $utin_sl_cash_metal_rec_paid_purity;
                                                           } else {
                                                               echo '100';
                                                           }
                                                           ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('CashToSlMetalWt').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('SlMetalRate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"   
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL PURITY"/>
                                                </td>

                                                <td align="center" width="10%">
                                                    <input id="CashToSlMetalWt" name="utin_sl_cash_metal_rec_paid_wt" 
                                                           type="text" placeholder="METAL WT" 
                                                           value="<?php echo $utin_sl_cash_metal_rec_paid_wt; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('SlPurity').focus();
                                                                       return false;
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL WT" readonly/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <div class="floatRight">
                                                        <input type="text" id="CashToSlMetalWtCRDR" name="utin_sl_cash_metal_rec_paid_wt_CRDR" 
                                                               value="<?php echo $utin_sl_cash_metal_rec_paid_wt_CRDR; ?>"  
                                                               class="form-control-req-height20 align_center placeholderClass"  
                                                               size="10" maxlength="10"  readonly/>
                                                    </div>
                                                </td>

                                            </tr>
                                            <!--START CODE FOR CRYSTAL RATE CUT / NO RATE CUT TABLE : AUTHOR @DARSHANA 06 MAY 2021--> 
                                            <tr class="portlet grey-crusta box" >
                                                <td align="center" class="darkBlueCalibri13Font" colspan="8">
                                                    <hr/>
                                                </td>
                                            </tr>
                                            <tr class="portlet grey-crusta box">
                                                <td width="5%">
                                                    &nbsp;
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>STONE BALANCE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>STONE RATE CUT </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>CURR RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>STONE AMT  </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>STONE BAL  </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="10%">
                                                    <b>AVG RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>PROFIT/LOSS </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b>STONE:</b>
                                                </td>
                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="<?php echo $payCrystalWtBal; ?>" name="<?php echo $payCrystalWtBal; ?>" type="text" placeholder="STONE WT" value="<?php echo decimalVal($crystalTotFinPurchasWt, 3); ?>" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('metal2RtCtWtType').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('metal1Rate').focus();
                                                                                   return false;
                                                                               }"
                                                                       onblur="javascript:calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                               return false;"
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="<?php echo $payCrystalWtBalType; ?>" name="<?php echo $payCrystalWtBalType; ?>" value="<?php echo $crystalFinalWeightType; ?>" class="form-control-select20-font12" size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <!-- START CODE TO RESET METAL AMOUNT ACCORDING TO METAL BALANCE @PRIYANKA-23MAR18 -->
                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="<?php echo $payCrystalRtCtWtBal; ?>" name="<?php echo $payCrystalRtCtWtBal; ?>" type="text" placeholder="STONE RATE CUT WT" value="<?php echo decimalVal($utin_st_rtct_wt, 3); ?>" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('<?php echo $payCrystalRtCtWtBalType; ?>').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   return false;
                                                                               }"
                                                                       onchange="resetChangeMetAmtCalcMetBal();
                                                                               calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                               calcRawMetStock('<?php echo $prefix; ?>');
                                                                               calDiscountAmt('<?php echo $prefix; ?>');
                                                                               calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                               return false;"
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="10" maxlength="10" />
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <select id="<?php echo $payCrystalRtCtWtBalType; ?>" name="<?php echo $payCrystalRtCtWtBalType; ?>" 
                                                                            onkeydown="javascript:if (event.keyCode == 13) {
                                                                                        document.getElementById('<?php echo $payCrystalRateId; ?>').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('<?php echo $payCrystalRtCtWtBal; ?>').focus();
                                                                                        return false;
                                                                                    }"
                                                                            onchange="javascript:calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                                    calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                                    return false;"

                                                                            class="form-control-select20-font12" <?php if ($paymentMode == 'NoRateCut') { ?>disabled<?php } ?> >
                                                                                <?php
                                                                                if ($utin_st_rtct_wt_typ != '') {
                                                                                    $payPanelGdRecWT = array(KG, GM, MG, CT);
                                                                                    for ($i = 0; $i <= 3; $i++)
                                                                                        if ($payPanelGdRecWT[$i] == $utin_st_rtct_wt_typ)
                                                                                            $payPanelStRecWTSel[$i] = 'selected';
                                                                                } else {
                                                                                    $payPanelStRecWTSel[3] = 'selected';
                                                                                }
                                                                                ?>
                                                                        <option value="KG"<?php echo $payPanelStRecWTSel[0]; ?>>KG</option>
                                                                        <option value="GM"<?php echo $payPanelStRecWTSel[1]; ?>>GM</option>
                                                                        <option value="MG"<?php echo $payPanelStRecWTSel[2]; ?>>MG</option>
                                                                        <option value="CT"<?php echo $payPanelStRecWTSel[3]; ?>>CT</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                
                                                <td align="center" width="10%">
                                                    <input id="<?php echo $payCrystalRateId; ?>" name="<?php echo $payCrystalRateId; ?>" type="text" placeholder="STONE CURRENT RATE" value="<?php if ($crystalPurchaseAvgRate != '') echo $crystalPurchaseAvgRate; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('<?php echo $paySilverAvgRateId; ?>').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="resetChangeMetAmtCalcMetBal();
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"
                                                           onchange="resetChangeMetAmtCalcMetBal();
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"    
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="STONE RATE"/>
                                                </td>
                                                <!-- END CODE TO RESET METAL AMOUNT ACCORDING TO METAL BALANCE @PRIYANKA-23MAR18 -->
                                               
                                                <!-- START CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18 -->
                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <input id="<?php echo $payCrystalValuation; ?>" name="<?php echo $payCrystalValuation; ?>"
                                                           type="text" placeholder="VALUATION" value="0.00" 
                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                       document.getElementById('metal2WtBal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8) {
                                                                       document.getElementById('<?php echo $paySilverRateId; ?>').focus();
                                                                       return false;
                                                                   }"  
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="STONE METAL VALUATION"
                                                           onclick="this.value = '';"
                                                           onblur="changeMetAmtCalcMetBal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;" 
                                                           />
                                                </td>
                                                <!-- END CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18 -->
                                                
                                                <td align="center" width="10%">
                                                    <input id="metal3WtBal" name="metal3WtBal" type="text" placeholder="STONE FINAL WT" value="0.00" 
                                                           spellcheck="false" 
                                                           class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" readonly
                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                       document.getElementById('<?php echo $payCrystalAvgRateId; ?>').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8) {
                                                                       document.getElementById('<?php echo $payCrystalValuation; ?>').focus();
                                                                       return false;
                                                                   }"  />
                                                </td>
                                                
                                                <td align="center" width="10%">
                                                    <input id="<?php echo $payCrystalAvgRateId; ?>" name="<?php echo $payCrystalAvgRateId; ?>" type="text" placeholder="ST AVG RATE" value="<?php if ($crystalAvgRate != '') echo $crystalAvgRate; ?>" 
                                                           onblur="calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"
                                                           onchange="calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   return false;"    
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" size="8" maxlength="10" title="STONE AVERAGE RATE (<?php echo $silverPrevWtRate . '+' . $silverRate; ?>)"/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <input id="metal2WtPNL" name="metal3WtPNL" type="text" placeholder="PROFIT/LOSS" value="<?php echo decimalVal(abs($crystalWeightPNL), 2); ?>" 
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"     
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass redFont" style="color: <?php echo $sColor; ?>" size="10" maxlength="10" />
                                                </td>

                                            </tr>
                                            <tr class="portlet grey-crusta box" >
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">

                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>PREV OPENING </b>
                                                </td>                      
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>CASH TO STONE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>CASH BAL </b>
                                                </td> 
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>RATE </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>PURITY </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">
                                                    <b>STONE BAL </b>
                                                </td>
                                                <td align="center" class="darkBlueCalibri13Font" width="15%">

                                                </td>                                   
                                            </tr>
                                            <tr>                                    
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b> ST CASH:</b>
                                                </td>  

                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="utin_st_prev_cash_opening" name="utin_st_prev_cash_opening" 
                                                                       type="text"
                                                                       value="<?php echo $utin_st_prev_cash_opening; ?>"  
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('utin_st_cash_to_metal').focus();
                                                                                   return false;
                                                                               }"                                     
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="utin_st_prev_cash_opening_CRDR" 
                                                                           name="utin_st_prev_cash_opening_CRDR" 
                                                                           value="<?php echo $utin_st_prev_cash_opening_CRDR; ?>" 
                                                                           class="form-control-select20-font12" size="2" maxlength="4"  readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>


                                                <td align="right">
                                                    <input id="utin_st_cash_to_metal" name="utin_st_cash_to_metal" 
                                                           placeholder="CASH TO STONE" type="text" 
                                                           value="<?php echo $utin_st_cash_to_metal; ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_sl_prev_cash_bal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_sl_prev_cash_opening').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" />
                                                </td>

                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr> 
                                                            <td align="center" width="75%">
                                                                <input id="utin_st_prev_cash_bal"  name="utin_st_prev_cash_balance" 
                                                                       type="text" placeholder="PREV CASH BAL" 
                                                                       value="<?php echo $utin_st_prev_cash_balance; ?>"  
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('utin_st_cash_metal_rate').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('utin_st_cash_to_metal').focus();
                                                                                   return false;
                                                                               }"    
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="8" maxlength="10" title="PREV CASH BAL" readonly/>
                                                            </td>

                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="utin_st_prev_cash_bal_CRDR" 
                                                                           name="utin_st_prev_cash_bal_CRDR" 
                                                                           value="<?php echo $utin_st_prev_cash_bal_CRDR; ?>"  
                                                                           class="form-control-select20-font12" size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <?php // echo '$utin_st_cash_metal_rate'.$utin_st_cash_metal_rate;?>
                                                    <input id="utin_st_cash_metal_rate" name="utin_st_cash_metal_rate" 
                                                           type="text" placeholder="STONE RATE" 
                                                           value="<?php echo $utin_st_cash_metal_rate; ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_st_cash_metal_purity').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_st_prev_cash_bal').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="STONE RATE" />
                                                </td>

                                                <td align="right" width="10%">
                                                    <input id="utin_st_cash_metal_purity" name="utin_st_cash_metal_purity" 
                                                           type="text" placeholder="STONE PURITY" 
                                                           value="<?php
                                                           if ($utin_st_cash_metal_purity != '' || $utin_st_cash_metal_purity != NULL) {
                                                               echo $utin_st_cash_metal_purity;
                                                           } else {
                                                               echo '100';
                                                           }
                                                           ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('utin_sl_cash_to_metalwt').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_sl_cash_metal_rate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"   
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="STONE PURITY"/>
                                                </td>

                                                <td align="center" width="10%">
                                                    <input id="utin_st_cash_to_metalwt" name="utin_st_cash_to_metalwt" 
                                                           type="text" placeholder="STONE WT" 
                                                           value="<?php echo $utin_st_cash_to_metalwt; ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('utin_st_cash_metal_purity').focus();
                                                                       return false;
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="STONE WT" readonly/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <div class="floatRight">
                                                        <input type="text" id="utin_st_cash_to_metalwt_CRDR" 
                                                               name="utin_st_cash_to_metalwt_CRDR" 
                                                               value="<?php echo $utin_st_cash_to_metalwt_CRDR; ?>" 
                                                               class="form-control-req-height20 align_center placeholderClass"  
                                                               size="10" maxlength="10"  readonly/>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>                                    
                                                <td align="right" class="blackCalibri13FontBold" width="5%">
                                                    <b>ST CASH CR/DR:</b>
                                                </td>  

                                                <td align="right" class="blackCalibri13FontBold" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right">
                                                                <input id="" name="" type="text"
                                                                       value="0.00"
                                                                       onkeydown=""                                     
                                                                       spellcheck="false" 
                                                                       class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="10" maxlength="10" readonly/>
                                                            </td>
                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="" 
                                                                           name="" 
                                                                           class="form-control-select20-font12" 
                                                                           size="2" maxlength="4"  readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>


                                                <td align="right">
                                                    <input id="StCashToMetal" name="utin_st_cash_metal_rec_paid " 
                                                           type="text" placeholder="CASH TO STONE" 
                                                           value="<?php echo $utin_st_cash_metal_rec_paid; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('PrevSlCashBal').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" />
                                                </td>


                                                <td align="center" class="printVisibilityHidden" width="15%">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>  
                                                            <td align="center" width="75%">
                                                                <input id="PrevStCashBal"  name="utin_st_prev_cash_metal_rec_paid" 
                                                                       type="text" placeholder="PREV CASH BAL" 
                                                                       value="<?php echo $utin_st_prev_cash_metal_rec_paid; ?>" 
                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                   document.getElementById('SlMetalRate').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('SlCashToMetal').focus();
                                                                                   return false;
                                                                               }"    
                                                                       spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                                       size="8" maxlength="10" title="PREV CASH BAL" readonly/>
                                                            </td>

                                                            <td align="right">
                                                                <div class="floatRight">
                                                                    <input type="text" id="PrevStCashBalCRDR" 
                                                                           name="utin_st_prev_cash_metal_rec_paid_CRDR" 
                                                                           value="<?php echo $utin_st_prev_cash_metal_rec_paid_CRDR; ?>" 
                                                                           class="form-control-select20-font12" 
                                                                           size="2" maxlength="4" readonly/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td align="center" class="blackCalibri13FontBold" width="15%">
                                                    <input id="StMetalRate" name="utin_st_cash_metal_rec_paid_rate" 
                                                           type="text" placeholder="STONE RATE" 
                                                           value="<?php echo $utin_st_cash_metal_rec_paid_rate; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('SlPurity').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('PrevSlCashBal').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcPaymentCashBalance('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"  
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="STONE RATE" />
                                                </td>

                                                <td align="right" width="10%">
                                                    <input id="StPurity" name="utin_st_cash_metal_rec_paid_purity"
                                                           type="text" placeholder="STONE PURITY" 
                                                           value="<?php
                                                           if ($utin_st_cash_metal_rec_paid_purity != '' || $utin_st_cash_metal_rec_paid_purity != NULL) {
                                                               echo $utin_st_cash_metal_rec_paid_purity;
                                                           } else {
                                                               echo '100';
                                                           }
                                                           ?>"  
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('CashToSlMetalWt').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('SlMetalRate').focus();
                                                                       return false;
                                                                   }"
                                                           onblur="calcCashToMetal('<?php echo $prefix; ?>');
                                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');
                                                                   calcRawMetStock('<?php echo $prefix; ?>');"   
                                                           onclick="this.value = '';"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="STONE PURITY"/>
                                                </td>

                                                <td align="center" width="10%">
                                                    <input id="CashToStMetalWt" name="utin_st_cash_metal_rec_paid_wt" 
                                                           type="text" placeholder="STONE WT" 
                                                           value="<?php echo $utin_st_cash_metal_rec_paid_wt; ?>" 
                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                       document.getElementById('').focus();
                                                                       return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('SlPurity').focus();
                                                                       return false;
                                                                   }"
                                                           spellcheck="false" class="form-control-req-height20 align_center placeholderClass" 
                                                           size="10" maxlength="10" title="METAL WT" readonly/>
                                                </td>
                                                <td align="right" width="15%">
                                                    <div class="floatRight">
                                                        <input type="text" id="CashToStMetalWtCRDR" name="utin_st_cash_metal_rec_paid_wt_CRDR" 
                                                               value="<?php echo $utin_st_cash_metal_rec_paid_wt_CRDR; ?>"  
                                                               class="form-control-req-height20 align_center placeholderClass"  
                                                               size="10" maxlength="10"  readonly/>
                                                    </div>
                                                </td>

                                            </tr>
                                            <!--END CODE FOR CRYSTAL RATE CUT / NO RATE CUT TABLE : AUTHOR @DARSHANA 06 MAY 2021--> 
                                        </table>
                                    </td> 
                                </tr>                               
                            </table>
                        </td>
                    <?php } else { ?>
                        <input id="slPrCrystalValuation" name="slPrCrystalValuation" type="hidden" placeholder="CRYSTAL VALUATION" />
                    <?php } ?>
                    <?php
                    if ($paymentMode == 'RateCut') {
                        $cashPaymentDetailsDiv = 'hidden';
                    } else if ($paymentMode == 'ByCash') {
                        $cashPaymentDetailsDiv = 'visible';
                    }
                    ?>
                    <?php
                    //echo 'sessionPayOptionStr6 == ' . $_SESSION['sessionPayOptionStr'][6] . '<br />';
                    //echo '$paymentMode == ' . $paymentMode . '<br />';

//                    if ($_SESSION['sessionPayOptionStr'][6] != 'TRUE' && ($paymentMode != 'NoRateCut' &&
//                            $paymentMode != 'RateCut')) {
//                        ?>
<!--                        <td align="left">
                            <div id="cashPaymentDetailsDiv" style="visibility: //<?php echo $cashPaymentDetailsDiv; ?>;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:0px;">
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold">
                                            <input id="//<?php echo $payTotalFinalAmt; ?>" name="<?php echo $payTotalFinalAmt; ?>" type="text" placeholder="TOTAL AMT" value="<?php echo $totalFinalBalance; ?>" 
                                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                               document.getElementById('//<?php echo $payTotalAmtRec; ?>').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" >
                                            <input id="//<?php echo $payTotalAmtRec; ?>" name="<?php echo $payTotalAmtRec; ?>" type="text" placeholder="METAL AMT REC" value="<?php echo $invTotMetAmtRec; ?>" 
                                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                               document.getElementById('//<?php echo $paySilverWtBal; ?>').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('//<?php echo $paySilverBalType; ?>').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10"/>

                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" >
                                            <input id="//<?php echo $payTotalFinalAmt; ?>" name="<?php echo $payTotalFinalAmt; ?>" type="text" placeholder="TOTAL AMT BAL" value="<?php echo $totBalance; ?>" 
                                                   spellcheck="false" class="input_border_grey_center" size="20" maxlength="10" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>-->
                    <?php // } ?>
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
                    
                                </tr>
                            </table>

                        </td>
                </tr>
            

                <tr class="height28">
                <td colspan="14" >
            <table border="0" cellspacing="2" cellpadding="2" align="left" width="100%">
                <tr>
                    <td width="20%"></td>
                    <td width="80%" align="right">
                        <table border="0" cellpadding="1" cellspacing="1" width="100%" align="right" class="spaceRight10">
                            <tr>
                                <td align="right" class="blackCalibri13FontBold" width="10%">
                                    <b>GD PREV BAL:</b>
                                </td>
                                <td align="right" class="itemAddPnLabels12ArialLink" width="10%">
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
                                <td align="right" class="blackCalibri13FontBold" width="10%">
                                    <b>SL PREV BAL:</b>
                                </td>
                                <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
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

                                <?php
                                if ($crystalPrevWeightType == '' || $crystalPrevWeightType == NULL) {
                                    $crystalPrevWeightType = 'CT';
                                }
                                ?>
                                <!--START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                <td align="right" class="blackCalibri13FontBold" width="10%">
                                    <b>ST PREV BAL:</b>
                                </td>
                                <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="right" class="itemAddPnLabels12ArialLink">
                                                <input type="text" id="metal3WtPrevBal" name="metal3WtPrevBal" value="<?php echo decimalVal($crystalPrevWeight, 3) . ' ' . $crystalPrevWeightType; ?>"
                                                       spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                            </td>
                                            <td align="right" class="itemAddPnLabels12ArialLink">
                                                <?php // echo '$payCrystalWtPrevBalCRDR'.$payCrystalWtPrevBalCRDR;?>
                                                <input type="text" id="<?php echo $payCrystalWtPrevBalCRDR; ?>" name="<?php echo $payCrystalWtPrevBalCRDR; ?>" value="<?php echo $payCrystalPrevWtBalCRDR; ?>" 
                                                       class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <!--END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                            </tr>

                            <?php if ($paymentMode == 'RateCut' || $paymentMode == 'NoRateCut') { ?>
                                <!-- START @PRIYANKA-5APR18-->
                                <?php $utin_cash_gd_bal_type = 'GM'; ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold" width="10%">
                                        <b>CASH GD BAL:</b>
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="utin_cash_gd_bal" name="utin_cash_gd_bal" value="<?php echo decimalVal($utin_cash_gd_bal, 3) . ' ' . $utin_cash_gd_bal_type; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="utin_cash_gd_bal_CRDR" name="utin_cash_gd_bal_CRDR" value="<?php echo $utin_cash_gd_bal_CRDR; ?>" 
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td> 

                                    <?php $utin_cash_sl_bal_type = 'GM'; ?>
                                    <td align="right" class="blackCalibri13FontBold" width="10%">
                                        <b>CASH SL BAL:</b>
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="utin_cash_sl_bal" name="utin_cash_sl_bal" value="<?php echo decimalVal($utin_cash_sl_bal, 3) . ' ' . $utin_cash_sl_bal_type; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="utin_cash_sl_bal_CRDR" name="utin_cash_sl_bal_CRDR" value="<?php echo $utin_cash_sl_bal_CRDR; ?>" 
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!--START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                    <?php $utin_cash_st_bal_type = 'CT'; ?>
                                    <td align="right" class="blackCalibri13FontBold" width="10%">
                                        <b>CASH ST BAL:</b>
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="utin_cash_st_bal" name="utin_cash_st_bal" value="<?php echo decimalVal($utin_cash_st_bal, 3) . ' ' . $utin_cash_st_bal_type; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="utin_cash_st_bal_CRDR" name="utin_cash_st_bal_CRDR" value="<?php echo $utin_cash_st_bal_CRDR; ?>" 
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!--END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                </tr>
                                <!-- END @PRIYANKA-5APR18-->
                            <?php } ?>

                            <?php if ($paymentMode == 'RateCut' || $paymentMode == 'NoRateCut') { ?>
                                <!-- START @PRIYANKA-5APR18-->
                                <?php $CashToGdMetalWtType = 'GM'; ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold" width="10%">
                                        <b>CASH GD WT:</b>
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="CashMetalGdBal" name="CashMetalGdBal" value="<?php echo decimalVal($CashMetalGdBal, 3) . ' ' . $CashToGdMetalWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="CashMetalGdBalCRDR" name="CashMetalGdBalCRDR" value="<?php echo $CashMetalGdBalCRDR; ?>" 
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td> 

                                    <?php $CashToSlMetalWtType = 'GM'; ?>
                                    <td align="right" class="blackCalibri13FontBold" width="10%">
                                        <b>CASH SL WT:</b>
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="CashMetalSlBal" name="CashMetalSlBal" value="<?php echo decimalVal($CashMetalSlBal, 3) . ' ' . $CashToSlMetalWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="CashMetalSlBalCRDR" name="CashMetalSlBalCRDR" value="<?php echo $CashMetalSlBalCRDR; ?>" 
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td> 
                                    <?php $CashToStMetalWtType = 'CT'; ?>
                                    <!--START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                    <td align="right" class="blackCalibri13FontBold" width="10%">
                                        <b>CASH ST WT:</b>
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="CashMetalStBal" name="CashMetalStBal" value="<?php echo decimalVal($CashMetalStBal, 3) . ' ' . $CashToStMetalWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="CashMetalStBalCRDR" name="CashMetalStBalCRDR" value="<?php echo $CashMetalStBalCRDR; ?>" 
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td> 
                                    <!--END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                </tr>
                                <!-- END @PRIYANKA-5APR18-->
                            <?php } ?>   

                            <?php if ($paymentMode == 'RateCut' || $paymentMode == 'NoRateCut') { ?>
                                <?php if ($_SESSION['sessionPayOptionStr'][6] != 'TRUE') { ?>
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            GD <?php echo $PurVar; ?>:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%" style="padding-right: 26px;">
                                            <input type="text" id="metal1WtPurBal" name="metal1WtPurBal" value="<?php echo decimalVal($goldFinalWeight, 3) . ' ' . $goldFinalWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right darkblueFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            SL <?php echo $PurVar; ?>:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%" style="padding-right: 26px;">
                                            <input type="text" id="metal2WtPurBal" name="metal2WtPurBal" value="<?php echo decimalVal($silverFinalWeight, 3) . ' ' . $silverFinalWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right darkblueFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            ST <?php echo $PurVar; ?>:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%" style="padding-right: 26px;">
                                            <?php
                                            // echo '$crystalFinalWeight'.$crystalFinalWeight;
//                                            echo '$crystalFinalWeightType'.$crystalFinalWeightType;
                                            ?>
                                            <input type="text" id="metal3WtPurBal" name="metal3WtPurBal" value="<?php echo decimalVal($crystalFinalWeight, 3) . ' ' . $crystalFinalWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right darkblueFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            GD REC:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%" style="padding-right: 26px;">
                                            <input type="text" id="metal1WtRecBal" name="metal1WtRecBal" value="<?php echo decimalVal($goldPaidWeight, 3) . ' ' . $goldPaidWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            SL REC:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%" style="padding-right: 26px;">
                                            <input type="text" id="metal2WtRecBal" name="metal2WtRecBal" value="<?php echo decimalVal($silverPaidWeight, 3) . ' ' . $silverPaidWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <!--START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            ST REC:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%" style="padding-right: 26px;">
                                            <input type="text" id="metal3WtRecBal" name="metal3WtRecBal" value="<?php echo decimalVal($crystalPaidWeight, 3) . ' ' . $crystalPaidWeightType; ?>"
                                                   spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                        </td>
                                        <!--END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                    </tr>
                                <?php } if ($paymentMode == 'RateCut') { ?>
                                    <tr>
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            GD RATE CUT:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%">
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
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            SL RATE CUT:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%">
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
                                        <!--START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                        <td align="right" class="blackCalibri13FontBold" width="10%">
                                            ST RATE CUT:
                                        </td>
                                        <td align="right" class="itemAddPnLabels12ArialLink" width="10%">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="right" class="itemAddPnLabels12ArialLink">
                                                        <input type="text" id="metal3RtCtWtBal" name="metal3RtCtWtBal" value="<?php echo decimalVal($utin_st_rtct_wt, 3) . ' ' . $utin_st_rtct_wt_typ; ?>"
                                                               spellcheck="false" class="bgTransNoBorderArial12Right greenFont" size="10" maxlength="10" readonly="true" />
                                                    </td>
                                                    <td align="right" class="itemAddPnLabels12ArialLink">
                                                        <input type="text" id="<?php echo $payRtCtStCRDR; ?>" name="<?php echo $payRtCtStCRDR; ?>"
                                                               class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <!--END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td align="right" class="blackCalibri13FontBold border-color-grey-top border-color-grey-bottom" width="10%">
                                        GD BALANCE:
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink border-color-grey-top border-color-grey-bottom" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="metal1WtFinBal" name="metal1WtFinBal" value="<?php echo decimalVal($goldTotFinVal, 3) . ' ' . $goldTotFFineWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <?php // echo '$payFinalGdCRDR='.$payFinalGdCRDR;?>
                                                    <input type="text" id="<?php echo $payFinalGdCRDR; ?>" name="<?php echo $payFinalGdCRDR; ?>" value="<?php echo $utin_gd_CRDR; ?>"
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="right" class="blackCalibri13FontBold border-color-grey-top border-color-grey-bottom" width="10%">
                                        SL BALANCE:
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink border-color-grey-top border-color-grey-bottom" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="metal2WtFinBal" name="metal2WtFinBal" value="<?php echo decimalVal($silverTotFinVal, 3) . ' ' . $silverTotFFineWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="<?php echo $payFinalSlCRDR; ?>" name="<?php echo $payFinalSlCRDR; ?>" value="<?php echo $utin_sl_CRDR; ?>"
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                    <!--START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                    <td align="right" class="blackCalibri13FontBold border-color-grey-top border-color-grey-bottom" width="10%">
                                        ST BALANCE:
                                    </td>
                                    <td align="right" class="itemAddPnLabels12ArialLink border-color-grey-top border-color-grey-bottom" width="10%" >
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <input type="text" id="metal3WtFinBal" name="metal3WtFinBal" value="<?php echo decimalVal($crystalTotFinVal, 3) . ' ' . $crystalTotFFineWtType; ?>"
                                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="10" readonly="true" />
                                                </td>
                                                <td align="right" class="itemAddPnLabels12ArialLink">
                                                    <?php // echo '$payFinalStCRDR'.$payFinalStCRDR; ?>
                                                    <input type="text" id="<?php echo $payFinalStCRDR; ?>" name="<?php echo $payFinalStCRDR; ?>" value="<?php echo $utin_st_CRDR; ?>"
                                                           class="bgTransNoBorderArial12Right" size="2" maxlength="4" readonly="true" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!--END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021-->
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>