<?php
/*
 * **************************************************************************************
 * @Description: PPREVIOUS INVOICE DETAILS DISPLAY DIVISION FOR SCHEME.
 * **************************************************************************************
 *
 * Created on May 29, 2017 6:32:50 PM
 *
 * @FileName: ogprvindv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMGOLD
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 */


//**********************************************************************************
//*********************** INPUT PARAMETERS *****************************************
//**********************************************************************************
//                            => $count                    => TO COUNT NO OF INVOICE
//  $invCount                 => $invCount                 => PREV. GOLD WEIGHT TYPE
//                            => $invPreInvoiceId          => PREV. PRE INVOICE NO
//                            => $invPostInvoiceId         => PREV. POST INVOICE NO
//                            => $invGoldWeight            => PREV. INVOICE GOLD WEIGHT
// goldWeight+ $invCount      => $invGoldWeight            => PREV. INV GOLD WEIGHT
//                            
//**********************************************************************************
//***********************END INPUT PARAMETERS **************************************
//**********************************************************************************
//***********************************************************************************************
?>
<?php
if ($_REQUEST['panelName'] != "" || $_REQUEST['panelName'] != null) {
    $panelName = $_REQUEST['panelName'];
}
// This we can remove also, but for reference we left this, prev it was working only for scheme
if (1) {
    if ($count == 0) {
        ?>

        <tr class="height28 trbggry">
            <td align="center" class="darkBlueCalibri13Font" width="120px">
                <div style="color:#000;"><b>INVOICE NO</b></div>
            </td>
            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                <td colspan="2" align="right">
                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="darkBlueCalibri13Font" >
                                <div style="color:#000;"><b>GOLD WT</b></div>
                            </td>                        
                        </tr>
                    </table>
                </td>
                <td colspan="2" align="right">
                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="darkBlueCalibri13Font" >
                                <div style="color:#000;"><b>SILVER WT</b></div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="2" align="right">
                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="darkBlueCalibri13Font" >
                                <div style="color:#000;"><b>STONE WT</b></div>
                            </td>
                        </tr>
                    </table>
                </td>
            <?php } ?>
            <td colspan="2" align="right">
                <table border="0" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right" class="darkBlueCalibri13Font" >
                            <div style="color:#000;"><b>CASH BALANCE</b></div>
                        </td>                    
                    </tr>
                </table>
            </td>
        <!--        <td align="right" class="darkBlueCalibri13Font">
                <div class="spaceRight5"> TRANS TYPE </div>
            </td>-->
            <td colspan="2" width="80px">
            </td>
        </tr>
    <?php }$count = 1; ?>
    <input type="hidden" id="invId<?php echo $invCount; ?>" name="invId<?php echo $invCount; ?>" value="<?php echo $invId; ?>" />
    <input type="hidden" id="scheme_deposit_check<?php echo $invCount; ?>" name="scheme_deposit_check<?php echo $invCount; ?>" />       
    <input type="hidden" id="utin_utin_id<?php echo $invCount; ?>" name="utin_utin_id<?php echo $invCount; ?>" value="<?php echo $utin_utin_id; ?>" />
    <input type="hidden" id="invoice_post_id_str" name="invoice_post_id_str" />
    <input type="hidden" id="invoice_pre_id_str" name="invoice_pre_id_str" />
    <input type="hidden" id="utin_utin_id_str" name="utin_utin_id_str" />
    <input type="hidden" id="checkbox_id_str" name="checkbox_id_str" />
    <input type="hidden" id="paySchemeTyp_id_str" name="paySchemeTyp_id_str" />
    <?php
    if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invGoldWeight != '' && $invGoldWeight != 0)) {
        $dispaySchemeTyp_id_str = "GOLD-SCHEME";
    } else if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invCashBalance != "" && $invCashBalance != 0)) {
        $dispaySchemeTyp_id_str = "CASH-SCHEME";
    }
    ?>
     <?php 
     $querySettleMultipleScheme = "SELECT omly_value FROM omlayout WHERE omly_option = 'settleMultipleScheme'";
     $resSettleMultipleScheme = mysqli_query($conn, $querySettleMultipleScheme);
     $rowSettleMultipleScheme = mysqli_fetch_array($resSettleMultipleScheme);
     $settleMultipleScheme = $rowSettleMultipleScheme['omly_value'];
     ?>
    <input type="hidden" id="total_sc_inv_cnt" name="total_sc_inv_cnt"  value="<?php echo $tot_inv; ?>" /> 
    <input type="hidden" id="total_invoice_cnt" name="total_invoice_cnt" value="<?php echo $total_inv_no; ?>" />
    <?php ?>
    <tr>
        <td align="center" class="darkBlueCalibri13Font">        
            <input type="hidden" name="scheme_indicator<?php echo $invCount; ?>" id="scheme_indicator<?php echo $invCount; ?>" value="<?php echo $invSchemeDeposit; ?>" />
            <div class="spaceRight5"> <?php echo $invPreInvoiceId . ' ' . $invPostInvoiceId; ?></div>

        </td>
        <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
            <td colspan="2" width="50px">
                <table border="0" cellspacing="0" cellpadding="0" align="right">
                    <input type="hidden" id="invPreInvoiceId<?php echo $invCount; ?>" name="invPreInvoiceId<?php echo $invCount; ?>" value="<?php echo $invPreInvoiceId; ?>" />
                    <input type="hidden" id="invPostInvoiceId<?php echo $invCount; ?>" name="invPostInvoiceId<?php echo $invCount; ?>" value="<?php echo $invPostInvoiceId; ?>" /> 
                    <input type="hidden" id="checkboxidchekced<?php echo $invCount; ?>" name="checkboxidchekced<?php echo $invCount; ?>" />  
                    <input type="hidden" id="paymentTypSc<?php echo $invCount; ?>" name="paymentTypSc<?php echo $invCount; ?>" value="<?php echo $dispaySchemeTyp_id_str; ?>" /> 
                    <tr>
                        <td align="right" >
                            <div class="spaceRight5">
                                <?php if ($invGoldWeight != '' && $invGoldWeight != 0) { ?>
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <?php if ($invSchemeDeposit == "SCHEME_DEPOSIT") { ?>
                                                <td> <p style="color:green;font-size:15px;font-weight:bold;">SCHEME GOLD DEPOSIT</p> </td>                                            
                                            <?php } ?>
                                            <td>
                                                <input type="text" id="goldWeight<?php echo $invCount; ?>" 
                                                       name="goldWeight<?php echo $invCount; ?>" value="<?php echo abs($invGoldWeight); ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invGdWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invGdWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;font-weight:bold;" <?php } ?> 
                                                       class="darkBlueCalibri13Font" size="10" maxlength="20" readonly="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="goldWeightType<?php echo $invCount; ?>" 
                                                       name="goldWeightType<?php echo $invCount; ?>" value="<?php echo $invGoldWeightTyp; ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invGdWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invGdWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;font-size:16px;font-weight:bold;" <?php } ?> 
                                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="gdWtTransType<?php echo $invCount; ?>" 
                                                       name="gdWtTransType<?php echo $invCount; ?>" value="<?php echo $invGdWtCRDR; ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invGdWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invGdWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;font-size:16px;font-weight:bold;" <?php } ?> 
                                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                                            </td>                                        
                                        </tr>
                                    </table>
                                    <?php
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </td>
                        <td align="left" width="30px">
                            <div id="goldMetalDiv<?php echo $invCount; ?>"></div>
                            <input type="hidden" id="prefix" name="prefix" value="<?php echo $prefix; ?>" />
                            <?php
                            if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invGoldWeight != "" && $invGoldWeight != 0)) {
                                ?>  
                                <input id="GoldschemeCheck<?php echo $invCount; ?>" name="GoldschemeCheck<?php echo $invCount; ?>" type="hidden" value="GOLD_SCHEME_CHECK" />
                            <?php } ?>                                                
                            <?php
                            $inGoldch = "";
                            if ($invGoldPayChk == 'checked') {
                                $inGoldch = 'checked';
                            } else {
                                $inGoldch = 'unchecked';
                            }
                            ?><!-- disabled="true" --> 
                            <?php if ($invGoldPayChk == 'checked') { ?>
                                <INPUT id="selPayGold<?php echo $invCount; ?>" type="hidden" name="selPayGold<?php echo $invCount; ?>" value="checked" />
                            <?php } else { ?>
                                <INPUT id="selPayGold<?php echo $invCount; ?>" type="hidden" name="selPayGold<?php echo $invCount; ?>" value="unchecked" />
                            <?php } ?>    

                            <?php
                            if ($panelName == 'SellPayUp' && ($invGoldPayChk == 'checked')) {
                                if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invGoldWeight != '' && $invGoldWeight != 0)) {
                                    ?>
                                    <img src="<?php echo $documentRoot; ?>/images/abx-t.png" alt="" height="0.01px" style="display:none;"
                                         onload="setTimeout(function () {
                                                                     onloadSchemeMakAmt(this.checked, '<?php echo $invCount; ?>', 'GOLD-SCHEME', this.id)
                                                                 }, 200);"/> 
                                         <?php
                                     }
                                 }
                                 ?>    
                            <INPUT id="selPayGoldTr<?php echo $invCount; ?>" style="<?php echo $enabledGDW; ?>"
                                   TYPE="checkbox" NAME="selPayGold<?php echo $invCount; ?>" class="lgn-field-without-order"
                                   <?php echo $inGoldch;
                                   if($invGoldPayChk == 'checked'){
                                   ?>
                                   disabled="true"
                                   <?php
                                    }
                                   ?>
                                   <?php if ($invSchemeDeposit == "SCHEME_DEPOSIT") { ?>
                                       onclick="
                                                           if (!this.checked) {
                                                               document.getElementById('selPayGold<?php echo $invCount; ?>').value = 'unchecked';
                                                           } else {
                                                               document.getElementById('selPayGold<?php echo $invCount; ?>').value = 'checked';
                                                           }
                                                           document.getElementById('checkboxidchekced<?php echo $invCount; ?>').value = this.id;
                                                           document.getElementById('paymentTypSc<?php echo $invCount; ?>').value = 'GOLD-SCHEME';
                                                           document.getElementById('scheme_deposit_check<?php echo $invCount; ?>').value = 'SCHEME_DEPOSIT_CHECKED';
                                                           calculateSchemeMkgAmt(this.checked, '<?php echo $invCount; ?>', 'GOLD-SCHEME', this.id);"  
                                   <?php } else { ?>
                                       onclick="
                                                           if (!this.checked) {
                                                               document.getElementById('selPayGold<?php echo $invCount; ?>').value = 'unchecked';
                                                           } else {
                                                               document.getElementById('selPayGold<?php echo $invCount; ?>').value = 'checked';
                                                           }
                                                           calcGoldWeightforrawetal(this.checked, '<?php echo $invCount; ?>','<?php echo $invGoldWeight;?>','<?php echo $invId;?>','Gold','selPayGoldTr<?php echo $invCount; ?>');
                                                           "  
                                   <?php } ?> 
                                   />
                                   <?php ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td colspan="2" width="50px">
                <table border="0" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right">
                            <div class="spaceRight5">
                                <?php if ($invSilverWeight != '' && $invSilverWeight != 0) { ?>
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td>
                                                <input type="text" id="silverWeight<?php echo $invCount; ?>" name="silverWeight<?php echo $invCount; ?>" value="<?php echo abs($invSilverWeight); ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invSlWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invSlWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;" <?php } ?>
                                                       class="darkBlueCalibri13Font" size="10" 
                                                       maxlength="20" readonly="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="silverWeightType<?php echo $invCount; ?>" 
                                                       name="silverWeightType<?php echo $invCount; ?>" value="<?php echo $invSilverWeightTyp; ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invSlWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invSlWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;" <?php } ?>
                                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="slWtTransType<?php echo $invCount; ?>" 
                                                       name="slWtTransType<?php echo $invCount; ?>" value="<?php echo $invSlWtCRDR; ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invSlWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invSlWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;" <?php } ?> 
                                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </td>
                        <td align="left" width="30px">
                            <?php if ($invSilverPayChk == 'checked') { ?>
                                <INPUT id="selPaySilver<?php echo $invCount; ?>" type="hidden" name="selPaySilver<?php echo $invCount; ?>" value="<?php echo $invSilverPayChk; ?>" />
                                <INPUT id="selPaySilver" style="<?php echo $enabledSLW; ?>"
                                       TYPE="checkbox" NAME="selPaySilver" class="lgn-field-without-order"
                                       <?php echo $invSilverPayChk; ?> disabled="true" /> 
                                   <?php } else { ?>
                                <INPUT id="selPaySilver<?php echo $invCount; ?>" style="<?php echo $enabledSLW; ?>"
                                       TYPE="checkbox" NAME="selPaySilver<?php echo $invCount; ?>" class="lgn-field-without-order"
                                       onclick="calcGoldWeightforrawetal(this.checked, '<?php echo $invCount; ?>','<?php echo $invSilverWeight;?>','<?php echo $invId;?>','Silver','selPaySilver<?php echo $invCount; ?>');" />
                                   <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <!--***************************************************************************************-->
            <!--START CODE FOR CRYSTAL PREVIOUS BALANCE SETTLE : AUTHOR @DARSHANA 13 JULY 2021-->
            <!--***************************************************************************************-->
            <td colspan="2" width="50px">
                <table border="0" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right">
                            <div class="spaceRight5">
                                <?php if ($invCrystalWeight != '' && $invCrystalWeight != 0) { ?>
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td>
                                                <input type="text" id="crystalWeight<?php echo $invCount; ?>" name="crystalWeight<?php echo $invCount; ?>" value="<?php echo abs($invCrystalWeight); ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invStWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invStWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;" <?php } ?>
                                                       class="darkBlueCalibri13Font" size="10" 
                                                       maxlength="20" readonly="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="crystalWeightType<?php echo $invCount; ?>" 
                                                       name="crystalWeightType<?php echo $invCount; ?>" value="<?php echo $invCrystalWeightTyp; ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invStWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invStWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;" <?php } ?>
                                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="stWtTransType<?php echo $invCount; ?>" 
                                                       name="stWtTransType<?php echo $invCount; ?>" value="<?php echo $invStWtCRDR; ?>"
                                                       spellcheck="false" 
                                                       <?php if ($invStWtCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;" 
                                                       <?php } else if ($invStWtCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;" <?php } ?> 
                                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </td>
                        <td align="left" width="30px">
                            <?php if ($invCrystalPayChk == 'checked') { ?>
                                <INPUT id="selPayCrystal<?php echo $invCount; ?>" type="hidden" name="selPayCrystal<?php echo $invCount; ?>" value="<?php echo $invCrystalPayChk; ?>" />
                                <INPUT id="selPayCrystal" style="<?php echo $enabledSTW; ?>"
                                       TYPE="checkbox" NAME="selPayCrystal" class="lgn-field-without-order"
                                       <?php echo $invCrystalPayChk; ?> disabled="true" /> 
                                   <?php } else { ?>
                                <INPUT id="selPayCrystal<?php echo $invCount; ?>" style="<?php echo $enabledSTW; ?>"
                                       TYPE="checkbox" NAME="selPayCrystal<?php echo $invCount; ?>" class="lgn-field-without-order"
                                       onclick="calcCrystalWeight(this.checked, '<?php echo $invCount; ?>');
                                                           calcWholeSaleRateCut('<?php echo $prefix; ?>');" />
                                   <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <!--***************************************************************************************-->
            <!--END CODE FOR CRYSTAL PREVIOUS BALANCE SETTLE : AUTHOR @DARSHANA 13 JULY 2021-->
            <!--***************************************************************************************-->
        <?php } ?>
        <td colspan="2" width="50px">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
                <tr>
                    <?php if ($invCashBalance != "" && $invCashBalance != 0) { ?>
                        <!--Prathamesh-->
                        <?php if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invCashBalance != "" && $invCashBalance != 0)) { ?>
                            <td> 
                                <p style="color:green;font-size:15px;font-weight: bold">SCHEME DEPOSIT</p> 
                            </td>                                            
                        <?php } ?>
                        <td align="right" class="darkBlueCalibri13Font">
                            <div class="spaceRight2">
                                <input type="hidden" name="oldCashPayAmt<?php echo $invCount; ?>" id="oldCashPayAmt<?php echo $invCount; ?>" />
                                <input type="hidden" name="scLastBonusPayAmt<?php echo $invCount; ?>" id="scLastBonusPayAmt<?php echo $invCount; ?>" />
                                <input type="text" id="cashAmount<?php echo $invCount; ?>" 
                                       name="cashAmount<?php echo $invCount; ?>" value="<?php echo abs($invCashBalance); ?>"
                                       spellcheck="false" 
                                       <?php if ($invCashBalCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;font-weight: bold;" 
                                       <?php } else if ($invCashBalCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;font-weight: bold;" <?php } ?>
                                       class="darkBlueCalibri13Font" size="10" 
                                       maxlength="20" readonly="true"/>
                            </div>
                        </td>
                        <td>
                            <div class="spaceRight5">
                                <input type="text" id="cashTransType<?php echo $invCount; ?>" name="cashTransType<?php echo $invCount; ?>" 
                                       value="<?php echo $invCashBalCRDR; ?>"
                                       spellcheck="false"
                                       <?php if ($invCashBalCRDR == 'DR') { ?> style="border:none;text-align: right;color:red;font-weight: bold;" 
                                       <?php } else if ($invCashBalCRDR == 'CR') { ?> style="border:none;text-align: right;color:green;font-weight: bold;" <?php } ?>
                                       class="darkBlueCalibri13Font" size="2" maxlength="4" readonly="true"/>
                            </div>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="spaceRight5">
                                <?php
                                echo '-';
                                ?>
                            </div>
                        </td>
                        <?php
                       
                    }
                    ?>
                    <td align="left" width="30px">
                        <div id="cashMetalDiv<?php echo $invCount; ?>"></div><!-- disabled="true"-->
                        <?php
                        $invAmtCh = "";
                        if ($invAmtPayChk == 'checked') {
                            $invAmtCh = 'checked';
                        } else {
                            $invAmtCh = 'unchecked';
                        }
                        ?>
                        <?php
                        if ($invAmtPayChk == 'checked') {
                            ?>
                            <INPUT id="selPayCash<?php echo $invCount; ?>" type="hidden" name="selPayCash<?php echo $invCount; ?>" value="on" />
                        <?php } else { ?>
                            <INPUT id="selPayCash<?php echo $invCount; ?>" type="hidden" name="selPayCash<?php echo $invCount; ?>" value="off" />
                        <?php } ?>
                        <?php
                        if ($panelName == 'SellPayUp' && ($invAmtPayChk == 'checked') && ($invCashBalance != "" && $invCashBalance != 0)) {
                            if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invCashBalance != "" && $invCashBalance != 0) && $settleMultipleScheme != 'YES') {
                                ?>
                                <img src="<?php echo $documentRoot; ?>/images/abx-t.png" alt="" height="0.01px" style="display:none;"
                                     onload="setTimeout(function () {
                                                             onloadSchemeMakAmt(this.checked, '<?php echo $invCount; ?>', 'CASH-SCHEME', this.id)
                                                         }, 300);" /> 
                                     <?php
                                 }
                             }
                             ?>
                             <?php
                             if ($invSchemeDeposit == "SCHEME_DEPOSIT" && ($invCashBalance != "" && $invCashBalance != 0)) {
                                 if ($panelName == 'SellPayUp' && ($invAmtPayChk == 'checked') && ($invCashBalance != "" && $invCashBalance != 0) && $settleMultipleScheme == 'YES') {
                                     ?>
                                     <input id="schemeDepCh<?php echo $invCount; ?>" name="schemeDepCh<?php echo $invCount; ?>" type="hidden" value="NOSCHEME_DEPOSIT_CHECKED" />    
                                     <?php
                                 } else { ?>
                                    <input id="schemeDepCh<?php echo $invCount; ?>" name="schemeDepCh<?php echo $invCount; ?>" type="hidden" value="SCHEME_DEPOSIT_CHECKED" />
                             <?php  }
                              } else { ?>
                            <input id="schemeDepCh<?php echo $invCount; ?>" name="schemeDepCh<?php echo $invCount; ?>" type="hidden" value="NOSCHEME_DEPOSIT_CHECKED" />
                        <?php } ?>
                        <INPUT id="selPayCash<?php echo $invCount; ?>" style="<?php echo $enabledAMT; ?>"
                               TYPE="checkbox" NAME="selPayCash<?php echo $invCount; ?>" class="lgn-field-without-order" <?php echo $invAmtCh; 
                               if($invAmtPayChk == 'checked'){
                                   ?>
                                   disabled="true" 
                                   <?php
                               }
                               ?>                                 
                               <?php if ($invSchemeDeposit == "SCHEME_DEPOSIT" && $settleMultipleScheme != 'YES' && $panelName != 'PAYMENT') { ?>
                                   onclick="
                                                   if (!this.checked) {
                                                       document.getElementById('selPayCash<?php echo $invCount; ?>').value = 'unchecked';
                                                   } else {
                                                       document.getElementById('selPayCash<?php echo $invCount; ?>').value = 'checked';
                                                   }
                                                   document.getElementById('checkboxidchekced<?php echo $invCount; ?>').value = this.id;
                                                   document.getElementById('paymentTypSc<?php echo $invCount; ?>').value = 'CASH-SCHEME';
                                                   document.getElementById('scheme_deposit_check<?php echo $invCount; ?>').value = 'SCHEME_DEPOSIT_CHECKED';
                                                   calculateSchemeMkgAmt(this.checked, '<?php echo $invCount; ?>', 'CASH-SCHEME', this.id);" 

                               <?php } else { ?>
                                   onclick="
                                                   if (!this.checked) {
                                                       document.getElementById('selPayCash<?php echo $invCount; ?>').value = 'unchecked';
                                                   } else {
                                                       document.getElementById('selPayCash<?php echo $invCount; ?>').value = 'checked';
                                                   }
                                                   calcCashAmount(this.checked, '<?php echo $invCount; ?>');
                                                   calcWholeSaleRateCut('<?php echo $prefix; ?>');"
                               <?php } ?> />                                     
                    </td>                  
                </tr>
            </table>
        </td>
    <!--    <td align="right" class="darkBlueCalibri13Font" width="80px">
            <div class="spaceRight5">
                <input type="text" id="transType<?php echo $invCount; ?>" name="transType<?php echo $invCount; ?>" 
                       value="<?php
//    if ($invCRDR != '' && $invCRDR != NULL) {
//        echo $invCRDR;
//    } else {
//        echo '-';
//    }
                               ?>"
                       spellcheck="false" style="border:none;text-align: right;" class="darkBlueCalibri13Font" size="10" maxlength="20" readonly="true"/>
            </div>
        </td>-->
        <td colspan="2" width="80px">
        </td>
    </tr> 
<?php } ?>
