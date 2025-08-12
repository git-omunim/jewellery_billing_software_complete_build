<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table border="0" cellspacing="0" cellpadding="0" width="99.6%" align="center">
    <tr>
        <td>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" class="brdrgry-dashed margtp10">
                <tr class="height28 goldBack">
                    <td align="center" class="textLabel14CalibriBrownBold" colspan="2" width="10%">
                        TYPE
                    </td>

                    <td  align="center" class="textLabel14CalibriBrownBold" width="10%">
                        NAME
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" width="5%">
                        HSN
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" width="5%">
                        QTY
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" colspan="2" width="10%">
                        GROSS WT
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold"  width="5%">
                        NET WT
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" width="5%">
                        PURITY
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" colspan="2" width="10%">
                        FINE WT
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" colspan="2" width="10%">
                        WSTG
                    </td>
                    <td align="center" class="textLabel14CalibriBrownBold" colspan="2" width="10%">
                        LAB CHRG
                    </td>                    

                    <td align="center" class="textLabel14CalibriBrownBold" width="10%">
                        TOT LAB CHRG
                    </td>
<!--                    <td align="center" class="textLabel14CalibriBrownBold">

                    </td>-->
                </tr>
                <tr>
                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemValueAdded" name="sttr_value_added" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_total_making_amt" name="sttr_total_making_amt" type="hidden" />
                <input <?php echo $mkgDiscPerStaffAccessStr; ?> id="sttr_mkg_discount_per" name="sttr_mkg_discount_per" type="hidden" />
                <input <?php echo $mkgDiscAmtStaffAccessReadOnlyStr; ?> id="sttr_mkg_discount_amt" name="sttr_mkg_discount_amt" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="slPrItemQtyMkgCgstPer" name="sttr_mkg_cgst_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemMkgCgstChrg" name="sttr_mkg_cgst_chrg" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="slPrItemMkgSgstPer" name="sttr_mkg_sgst_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemMkgSgstChrg" name="sttr_mkg_sgst_chrg" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="slPrItemMkgIgstPer" name="sttr_mkg_igst_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemMkgIgstChrg" name="sttr_mkg_igst_chrg" type="hidden" />

                <div id="metalRateDiv">
                    <input id="sttr_product_purchase_rate" name="sttr_product_purchase_rate" type="hidden" />
                    <input <?php echo $staffAccessStr; ?> id="slPrItemMetalRate" name="sttr_metal_rate" type="hidden" />
                    <div id="metalRateSelectDiv"></div>
                </div>

                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_metal_amt" name="sttr_metal_amt" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_metal_discount_per" name="sttr_metal_discount_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_metal_discount_amt" name="sttr_metal_discount_amt" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_valuation" name="sttr_valuation" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="sttr_tot_price_cgst_per" name="sttr_tot_price_cgst_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_tot_price_cgst_chrg" name="sttr_tot_price_cgst_chrg" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="sttr_tot_price_sgst_per" name="sttr_tot_price_sgst_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_tot_price_sgst_chrg" name="sttr_tot_price_sgst_chrg" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="sttr_tot_price_igst_per" name="sttr_tot_price_igst_per" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_tot_price_igst_chrg" name="sttr_tot_price_igst_chrg" type="hidden" />
                <input id="addItemOtherChrgsChanged" name="addItemOtherChrgsChanged" type="hidden" />
                <input type="hidden" id="sttr_final_valuation" name="sttr_final_valuation" />
                <input type="hidden" id="sttr_tot_tax" name="sttr_tot_tax" />
<!--                                                                <input <?php echo $staffAccessStr; ?> id="sttr_other_charges" name="sttr_other_charges" type="hidden" />
                <input <?php echo $staffAccessStr; ?> id="sttr_other_charges_type" name="sttr_other_charges_type" type="hidden" />-->
                <input <?php echo $staffAccessReadOnlyStr; ?> id="totalValuation" name="sttr_total_cust_price" type="hidden"  />
                <input <?php echo $staffAccessStr; ?> id="sttr_tax" name="sttr_tax" type="hidden" />
                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemTotTax" name="sttr_tot_tax" type="hidden"  />
                <input type="hidden" id="sttr_price" name="sttr_price" />
                <input type="hidden" id="reverseCal" name="reverseCal" value="No" />
                <input type="hidden" id="slPrItemFinalValHidden" name="slPrItemFinalValHidden" />
                <input type="hidden" <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemFinalVal" name="sttr_final_valuation" />
                <input type="hidden" id="sttr_pkt_weight" name="sttr_pkt_weight" />
                <input type="hidden" id="slPrCustWastage" name="slPrCustWastage" />
                <input type="hidden" id="slPrCustWastageWt" name="slPrCustWastageWt" />
                <input type="hidden" id="slPrItemLabCharges" name="slPrItemLabCharges" />
                <input type="hidden" id="addItemLbNOthCh" name="addItemLbNOthCh" />
                <input type="hidden" id="sttr_other_charges" name="sttr_other_charges" />
                <input type="hidden" id="sttr_total_other_charges" name="sttr_total_other_charges" />
                <input type="hidden" id="sttr_metal_rate" name="sttr_metal_rate" value="<?php echo $sttr_metal_rate; ?>">


                <td align="center" title="" width="8%">
                    <div id="itemTypeDiv">

                        <select id="sttr_metal_type" name="sttr_metal_type" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('sttr_item_category').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('sttr_account_id').focus();
                                            return false;
                                        }"
                               
                                class="form-control text-center form-control-font13">
                                    <?php
                                    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $rawPanelName == 'SimilarItem' || $rawPanelName == 'AddRawStock') {
                                        $metalType = array(Gold, Silver, Other);
                                        for ($i = 0; $i <= 2; $i++)
                                            if ($metalType[$i] == $sttr_metal_type)
                                                $optionMetalSel[$i] = 'selected';
                                    }
                                    ?>
                            <option value="Gold" <?php echo $optionMetalSel[0]; ?>>GOLD</option>
                            <option value="Silver" <?php echo $optionMetalSel[1]; ?>>SILVER</option>
                            <option value="Other" <?php echo $optionMetalSel[2]; ?>>OTHER</option>
                        </select>
                    </div>
                    <div id="SelectMetalDiv"></div>
                </td>

                <td align="center" title="" width="8%" class="padLeft3">
                    <div name="box" id="metal_desc_label_box" class="hidden_box" style="visibility:hidden;"> 
                        METAL DESCRIPTION
                    </div>
                    <div id="itemTypeDescDiv">
                        <select id="sttr_item_category" name="sttr_item_category" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('slPrItemName').focus();
                                            document.getElementById('slPrItemName').value = '';
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('slPrItemMetal').focus();
//                                            document.getElementById('slPrItemMetal').value = '';
                                            return false;
                                        }"
                                class="form-control text-center form-control-font13">
                                    <?php
                                    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $rawPanelName == 'AddRawStock' || $rawPanelName == 'SimilarItem') {
                                        $metalDesc = array(RawGold, RawSilver, OldGold, OldSilver);

                                        for ($i = 0; $i <= 3; $i++)
                                            if ($metalDesc[$i] == $sttr_item_category)
                                                $optionMetalDescSel[$i] = 'selected';
                                    }
                                    ?>
                                    <?php if ($listPanel == 'MeltingTransList' || $listPanel == 'MeltingTransListUp' || $listMetalPanel == 'MeltingTransListUp') { ?>
                                <option value="RawGold" <?php echo $optionMetalDescSel[0]; ?>>RAW GOLD</option>
                                <option value="RawSilver" <?php echo $optionMetalDescSel[1]; ?>>RAW SILVER</option>
                            <?php } else { ?>
                                <option value="RawGold" <?php echo $optionMetalDescSel[0]; ?>>RAW GOLD</option>
                                <option value="RawSilver" <?php echo $optionMetalDescSel[1]; ?>>RAW SILVER</option>
                                <option value="OldGold" <?php echo $optionMetalDescSel[2]; ?>>OLD GOLD</option>
                                <option value="OldSilver" <?php echo $optionMetalDescSel[3]; ?>>OLD SILVER</option>
                                <option value="Other" <?php echo $optionMetalDescSel[4]; ?>>OTHER</option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td align="center" title="" class="padLeft3" width="8%">
                    <div name="box" id="metal_name_label_box" class="hidden_box" style="visibility:hidden;"> 
                        METAL NAME
                    </div>
                    <input id="sttr_item_name" name="sttr_item_name" type="text" placeholder="METAL NAME" value="<?php
                    if ($listPanel == 'MeltingTransList' || $listPanel == 'MeltingTransListUp' || $listMetalPanel == 'MeltingTransListUp') {
                        echo $sttr_metal_type;
                    } else {
                        echo $sttr_item_name;
                    }
                    ?>"
                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       clearDivision('itemListDivToaddRawStock');
                                       document.getElementById('sttr_quantity').focus();
                                      
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {

                                       document.getElementById('sttr_item_category').focus();
                                       //document.getElementById('sttr_item_category').value = '';
                                       clearDivision('itemListDivToaddRawStock');
                                       return false;
                                   }"
                           onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                       document.getElementById('itemListDivToaddRawStock').focus();
//                                       searchRawItemNames(document.getElementById('sttr_item_name').value, document.getElementById('sttr_metal_type').value, 'RawStockItemName', document.getElementById('sttr_item_category').value, event.keyCode);
                                   }" 
                           onclick="this.value = '';"
                           onblur="document.getElementById('metal_name_label_box').style.visibility = 'hidden';
                                   if (this.value == '')
                                       this.value = '<?php echo $sttr_item_name; ?>';
                                   if (event.keyCode == 13) {
                                       clearDivision('itemListDivToaddRawStock');
                                   }"
                           onkeypress=""
                           onfocus="document.getElementById('metal_name_label_box').style.visibility = 'visible';"
                           autocomplete="off" spellcheck="false" 
                           class="form-control text-center form-control-font13" 
                           size="13" maxlength="80" /><!--description: START CODE TO Add customerStatement @Author: DISH08OCT16 i changed size 15 to 13-->
                    <div id="itemListDivToaddRawStock" class="itemListDivToAddStock" style="margin-left: -117px !important;"></div>
                </td>

                <td align="left" title="" class="paddingLeft2" width="5%">
                    <div name="box" id="hsn_label_box" class="hidden_box" style="visibility:hidden;"> 
                        ITEM HSN NUMBER
                    </div>
                    <input id="sttr_hsn_no" name="sttr_hsn_no" type="text" placeholder="HSN" 
                           value="<?php echo $sttr_hsn_no; ?>"
                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       document.getElementById('sttr_quantity').focus();
                                       
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_item_name').focus();
                                      
                                       return false;
                                   }"
                           onclick="this.value = '';"
                           onblur="document.getElementById('hsn_label_box').style.visibility = 'hidden';
                                   if (this.value == '') {
                                       this.value = '<?php echo $itst_item_size; ?>';
                                   }"
                           onfocus="document.getElementById('hsn_label_box').style.visibility = 'visible';"
                           autocomplete="off" spellcheck="false" 
                           class="form-control text-center form-control-font13" size="8" maxlength="15" />
                </td>

                <td align="right" title="" class="padLeft3" width="5%">
                    <div name="box" id="qty_label_box" class="hidden_box" style="visibility:hidden;"> 
                        ITEM QUANTITY
                    </div>
                    <input id="sttr_quantity" name="sttr_quantity" type="text" 
                           value="<?php
                           if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' ||
                                   $rawPanelName == 'SimilarItem' || $rawPanelName == 'AddRawStock') {
                               echo $sttr_quantity;
                           } else {
                               if ($sttr_quantity == '')
                                   echo '1';
                           }
                           ?>" 
                           placeholder="QTY"   
                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                           <?php if ($HSNOptionInForms == 'NO') { ?>
                                           document.getElementById('sttr_gs_weight').focus();
                           <?php } else { ?>
                                           document.getElementById('sttr_gs_weight').focus();
                           <?php } ?>
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('slPrItemName').focus();
                                       document.getElementById('slPrItemName').value = '';
                                       return false;
                                   }" 
                           onblur="calculateRawMetalIssue();
       document.getElementById('qty_label_box').style.visibility = 'hidden';"
                           onfocus="document.getElementById('qty_label_box').style.visibility = 'visible';"
                           spellcheck="false" class="form-control text-center form-control-font13" size="1" maxlength="10" />
                </td>
                <td width="10%" colspan="2">
                    <table cellspacing="0" cellpadding="0" width="100%" align="center">
                        <tr>
                            <td class="padLeft3" width="60%">
                                <div name="box" id="gswt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                    GROSS WT
                                </div>
                                <input id="sttr_gs_weight" name="sttr_gs_weight" 
                                       type="text" placeholder="GS WT" 
                                       <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_gs_weight; ?>" <?php } ?>
                                       <?php
                                       /* ------------------------------------------------------------------------------------------------------- */
                                       /* Start Code to Get Weight from Weighing Scale
                                         /* ------------------------------------------------------------------------------------------------------- */
                                       $selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_option = 'checkWSComPort'";
                                       $resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
                                       $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
                                       $checkWSComPortVal = $rowFormsLayoutDet['omly_value'];
                                       ?>
                                       <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>
                                           onfocus="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                                           onclick="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                                           <?php
                                       }
                                       /* ------------------------------------------------------------------------------------------------------- */
                                       /* End Code to Get Weight from Weighing Scale
                                         /* ------------------------------------------------------------------------------------------------------- */
                                       ?>    
                                       onblur="document.getElementById('gswt_label_box').style.visibility = 'hidden';
                                               if (this.value == '') {
                                                   this.value = '<?php echo $sttr_gs_weight; ?>';
                                               } else if (this.value != '' && this.value != null) {
//                                                   document.getElementById('sttr_pkt_weight').value = 0.00;
                                                   document.getElementById('sttr_nt_weight').value = this.value;
                                                   document.getElementById('netWeight').value = this.value;
                                               }
                                               calculateRawMetalIssue();
                                               return false;"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_gs_weight_type').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                       <?php if ($HSNOptionInForms == 'NO') { ?>
                                                       document.getElementById('slPrItemPieces').focus();
                                       <?php } else { ?>
                                                       document.getElementById('slPrItemPieces').focus();
                                       <?php } ?>
                                                   return false;
                                               }"
                                       onclick="this.value = '';"
                                       onfocus="document.getElementById('gswt_label_box').style.visibility = 'visible';"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="13" maxlength="20"  title=""/>
                            </td> 
                            <?php
                            if ($sttr_gs_weight_type == '') {
                                $sttr_gs_weight_type = 'GM';
                            }
                            $sttr_pkt_weight_type = $sttr_gs_weight_type;
                            $sttr_nt_weight_type = $sttr_gs_weight_type;
                            ?>
                            <td align="left" class="padLeft3" width="40%">
                                <select id="sttr_gs_weight_type" name="sttr_gs_weight_type" title=""
                                        onchange ="document.getElementById('sttr_nt_weight_type').value = this.value;
                                                document.getElementById('sttr_pkt_weight_type').value = this.value;
                                                document.getElementById('sttr_nt_weight_type').value = this.value;

                                                if ((document.getElementById('sttr_gs_weight').value) != '') {
                                                    return false;
                                                }"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('sttr_nt_weight').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('sttr_gs_weight').focus();
//                                                    document.getElementById('slPrItemGSW').value = '';
                                                    return false;
                                                }"
                                        class="form-control text-center form-control-font13" style="width:100%;">
                                            <?php
                                            if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
                                                $itemGsWtType = array(KG, GM, MG);
                                                for ($i = 0; $i <= 2; $i++) {
                                                    if ($itemGsWtType[$i] == $sttr_gs_weight_type)
                                                        $optionGSWTypeSel[$i] = 'selected';
                                                }
                                            } else {
                                                $optionGSWTypeSel[1] = 'selected';
                                            }
                                            ?>
                                    <option value="KG" <?php echo $optionGSWTypeSel[0]; ?>>KG</option>
                                    <option value="GM" <?php echo $optionGSWTypeSel[1]; ?>>GM</option>
                                    <option value="MG" <?php echo $optionGSWTypeSel[2]; ?>>MG</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>


                <td align="right" class="padLeft3" width="5%">
                    <div name="box" id="net_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                        NET WT
                    </div>
                    <!-- Add Code for Crystal Less Weight Functionality @Author:PRIYANKA-14MAR19 -->
                    <input type="hidden" id="totNetWeight" name="totNetWeight" value="<?php echo $sttr_nt_weight; ?>" />
                    <input type="hidden" id="netWeight" name="netWeight" value="<?php echo $sttr_nt_weight; ?>" />
                    <input id="sttr_nt_weight" name="sttr_nt_weight" type="text" placeholder="NT WT" 
                           <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_nt_weight; ?>" <?php } ?>
                           <?php
                           /* ------------------------------------------------------------------------------------------------------- */
                           /* Start Code to Get Weight from Weighing Scale
                             /* ------------------------------------------------------------------------------------------------------- */
                           ?>
                           <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>
                               onfocus="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                               onclick="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                               <?php
                           }
                           /* ------------------------------------------------------------------------------------------------------- */
                           /* End Code to Get Weight from Weighing Scale
                             /* ------------------------------------------------------------------------------------------------------- */
                           ?>   
                           onblur="document.getElementById('net_wt_label_box').style.visibility = 'hidden';
                                   if (this.value == '') {
                                       this.value = '<?php echo $sttr_nt_weight; ?>';
                                   }
                                  calculateRawMetalIssue();
                                   return false;"
                           onfocus="document.getElementById('net_wt_label_box').style.visibility = 'visible';"
                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('sttr_purity').focus();
                                       //document.getElementById('sttr_nt_weight_type').value = '';
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_gs_weight').focus();
                                       //document.getElementById('sttr_gs_weight_type').value = '';
                                       return false;
                                   }"
                           onclick="this.value = '';"        
                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                           autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="6" maxlength="20" title=""/>

                    <input type="hidden" id="sttr_nt_weight_type" name="sttr_nt_weight_type" title="NET WEIGHT TYPE"
                           value="<?php echo $sttr_nt_weight_type; ?>" onblur="document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;"
                           />
                </td>

                <td align = "left" title="" style="width: 5%;" class="padLeft3" >
                    <div name="box" id="purity_label_box" class="hidden_box" style="visibility:hidden;"> 
                        PURITY / TUNCH
                    </div>
                    <div id = "itemTunchDiv" style="position:relative;">
                        <?php
                        $tunchDivId = 'sttr_purity';
                        $nextFieldId = 'sttr_fine_weight';
                        $prevFieldId = 'sttr_nt_weight';
                        $netWeightFieldId = 'slPrItemNTW';
                        $fineWeightFieldId = 'slPrItemFineWeight';
                        $finalFineWeightFieldId = 'sttr_final_fine_weight';
                        $tunchDivClass = 'form-control text-center form-control-font13';
                        $metalType = $sttr_metal_type;
                        $itstItemTunch = $sttr_purity;
                        $itemDivCount = 'addRawMetalIssue';
                        $TunchValue = $sttr_purity;
                        include 'omiatndv.php';
                        ?>
                    </div>
                </td>
                <td width="10%" colspan="2" class="padLeft3">
                    <table cellpadding="1" cellspacing="0" width="100%" align="center">
                        <tr>
                            <td align="left" title="" class="" width="50%">
                                <div name="box" id="fine_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                    FINE WEIGHT
                                </div>
                                <input id="sttr_fine_weight" name="sttr_fine_weight" type="text" placeholder="FN WT" <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_fine_weight; ?>" <?php } ?>
                                       onkeypress="javascript:return valKeyPressedForNum
                                               NDot(event);"  readonly="true"
                                       spellcheck="false" class="form-control text-center form-control-font13" size="7" maxlength="20" 

                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_final_fine_weight').focus();
//                                                   document.getElementById('sttr_valuation').value = '';
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_purity').focus();
                                                   document.getElementById('sttr_purity').value = '';
                                                   return false;
                                               }"
                                       onblur="document.getElementById('fine_wt_label_box').style.visibility = 'hidden';"
                                       onfocus="document.getElementById('fine_wt_label_box').style.visibility = 'visible';"
                                       />
                            </td>
                            <td align="left" title="" class="" width="50%">
                                <div name="box" id="ffine_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                    FFN WEIGHT
                                </div>
                                <input id="sttr_final_fine_weight" name="sttr_final_fine_weight" type="text" placeholder="FFN WT" value="<?php echo $sttr_final_fine_weight; ?>"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"  readonly="true"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_wastage').focus();
//                                                   document.getElementById('sttr_valuation').value = '';
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_fine_weight').focus();
//                                                   document.getElementById('sttr_purity').value = '';
                                                   return false;
                                               }"
                                       onblur="document.getElementById('ffine_wt_label_box').style.visibility = 'hidden';"
                                       onfocus="document.getElementById('ffine_wt_label_box').style.visibility = 'visible';"
                                       spellcheck="false" class="form-control text-center form-control-font13" 
                                       size="5" maxlength="20" 
                                       <?php if ($TaxAndGstSettingValue == 'GST') { ?>  
                                           style="width:100%;" 
                                       <?php } else { ?>
                                           style="width:100%;"
                                       <?php } ?>  
                                       />
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center" width="10%" align="center" colspan="2" >
                    <table border="0" cellspacing="0" cellpadding="1" width="100%"
                    <?php if ($TaxAndGstSettingValue == 'TAX') { ?>
                               width="100%"
                           <?php } ?>
                           >
                        <tr>
                            <td align="left" title="" class="" width="50%">
                                <div name="box" id="wastage_label_box" class="hidden_box" style="visibility:hidden;"> 
                                    WASTAGE
                                </div>
                                <input type="hidden" id="addCustWastageWtInSpecifiedWt" name="addCustWastageWtInSpecifiedWt" />
                                <input id="addRawStockWastageChnged" name="addRawStockWastageChnged" type="hidden" value="<?php echo $sttr_wastage; ?>" />
                                <input id="sttr_wastage" name="sttr_wastage" type="text" placeholder="WASTAGE" value="<?php echo $sttr_wastage; ?>"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   if (this.value != '') {
                                                       document.getElementById('addRawStockWastageChnged').value = this.value;
                                                   }
                                                   document.getElementById('sttr_lab_charges').focus();
                                                   document.getElementById('sttr_lab_charges').value = ''
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_purity').focus();
                                                   //document.getElementById('sttr_purity').value = ''
                                                   return false;
                                               }"
                                       onblur="javascript:document.getElementById('wastage_label_box').style.visibility = 'hidden';
                                               if (this.value == '') {
                                                   this.value = document.getElementById('addRawStockWastageChnged').value;
                                               }
                                               if (document.getElementById('sttr_purity').value != 'NotSelected') {
                                                   if (document.getElementById('sttr_wastage').value == '') {
                                                       document.getElementById('sttr_wastage').value = 0;
                                                   }
                                                   document.getElementById('sttr_final_purity').value = (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value));
                                                   calculateRawMetalIssue();
                                               }"
                                       onclick="document.getElementById('sttr_wastage').value = this.value;
                                               this.value = '';"
                                       onfocus="document.getElementById('wastage_label_box').style.visibility = 'visible';"
                                       spellcheck="false" class="form-control text-center form-control-font13" size="5" maxlength="20"  />
                            </td>
                            <td align="left" title="" class="" width="50%">
                                <div name="box" id="final_tunch_label_box" class="hidden_box" style="visibility:hidden;"> 
                                    FINAL TUNCH
                                </div>
                                <input type="hidden" id="addItemFinalTunchChanged" name="addItemFinalTunchChanged" value="<?php echo $sttr_final_purity; ?>" />
                                <input id="sttr_final_purity" name="sttr_final_purity" type="text" placeholder="FN PR%" title=""
                                       readonly="true" value = "<?php echo $sttr_final_purity; ?>"
                                       onkeyup="calculateRawMetalIssue();
                                                return false;"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                       onblur="document.getElementById('final_tunch_label_box').style.visibility = 'hidden';"
                                       onfocus="document.getElementById('final_tunch_label_box').style.visibility = 'visible';"
                                       spellcheck="false" class="form-control text-center form-control-font13" size="5" maxlength="15" />
                                <?php 
                                $slffpurity = $_REQUEST['slffpurity'];
                                ?>
                                <input type="hidden" id="slffpurity" name="slffpurity" value="<?php echo $slffpurity;?>">
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="10%" colspan="2" align="left" <?php if ($TaxAndGstSettingValue == 'TAX') { ?> class="" <?php } ?>>
                    <table border="0" cellpadding="1" cellsapcing="0" width="100%"
                    <?php if ($TaxAndGstSettingValue == 'TAX') { ?>
                               cellpadding="1" cellsapcing="0" width="100%"
                           <?php } ?>
                           >
                        <tr>
                            <td align="right" title="" >
                                <div name="box" id="lab_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                                    LABOUR CHARGES
                                </div>
                                <input type="hidden" id="addItemLabChargesChanged" name="addItemLabChargesChanged" value="<?php echo $sttr_lab_charges; ?>" />
                                <input id="sttr_lab_charges" name="sttr_lab_charges" type="text" placeholder="LB CHRG" value="<?php echo $sttr_lab_charges; ?>"
                                       title="Double click to calculate labour charges in weight!"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   clearDivision('itemLabChrgsSelDiv');
                                                   document.getElementById('sttr_lab_charges_type').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   clearDivision('itemLabChrgsSelDiv');
                                                   document.getElementById('sttr_wastage').focus();
                                                   document.getElementById('sttr_wastage').value = '';
                                                   return false;
                                               }"
                                       onblur="javascript: document.getElementById('lab_chrg_label_box').style.visibility = 'hidden';
                                               if (this.value == '') {
                                                   this.value = document.getElementById('addItemLabChargesChanged').value;
                                               }
                                               calculateRawMetalIssue();"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                       <?php if ($metType != 'SELL') { ?>
                                           ondblclick ="getItemLabChrgsByWt('itemLabChrgsSelDiv', 'sttr_lab_charges', event.keyCode, 'rawPurchase');"
                                       <?php } ?>
                                       onfocus="document.getElementById('lab_chrg_label_box').style.visibility = 'visible';"
                                       autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="6" maxlength="10" title="LABOUR CHARGES"/>
                                <div id="itemLabChrgsSelDiv"></div>
                            </td>
                            <td align="left" <?php if ($TaxAndGstSettingValue == 'TAX') { ?>style="width: 2%;"<?php } ?>> 
                                <select id="sttr_lab_charges_type" name="sttr_lab_charges_type" 
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('sttr_total_lab_charges').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('sttr_lab_charges').focus();
                                                    document.getElementById('sttr_lab_charges').value = '';
                                                    return false;
                                                }"
                                        onchange="javascript: if (document.getElementById('sttr_lab_charges').value != '') {
                                                    return false;
                                                }"
                                        class="form-control text-center form-control-font13" title="">
                                            <?php
                                            //if ($simItem == 'SimilarItem' || $panelSimilarDiv == 'SimilarItem' || $UpPanel == 'UpPanel') {
                                            $itemLabChType = array(KG, GM, MG, PP);
                                            for ($i = 0; $i <= 3; $i++) {
                                                if ($itemLabChType[$i] == $sttr_lab_charges_type) {
                                                    $optionLbChTypeSel[$i] = 'selected';
                                                } else {
                                                    $optionLbChTypeSel[1] = 'selected';
                                                }
                                            }
                                            ?>
                                    <option value="KG" <?php echo $optionLbChTypeSel[0]; ?>>KG</option>
                                    <option value="GM" <?php echo $optionLbChTypeSel[1]; ?>>GM</option>
                                    <option value="MG" <?php echo $optionLbChTypeSel[2]; ?>>MG</option>
                                    <option value="PP" <?php echo $optionLbChTypeSel[3]; ?>>PP</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center" title="" class="">
                    <div name="box" id="tot_lab_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                        TOTAL OF LABOUR CHARGES
                    </div>
                    <input id="sttr_total_lab_charges" name="sttr_total_lab_charges" 
                           value="<?php echo $sttr_total_lab_charges; ?>" 
                           type="text" placeholder="TOT LAB CHRGS"                                
                           onkeydown="javascript:if (event.keyCode == 13) {
                                       document.getElementById('addRawStockSubButt').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_lab_charges_type').focus();
                                       return false;
                                   }"
                           onblur="javascript:document.getElementById('tot_lab_chrg_label_box').style.visibility = 'hidden';
                                   if (document.getElementById('sttr_gs_weight').value != '') {
                                       return false;
                                   }" 
                           style="width:100%;"
                           onfocus="document.getElementById('tot_lab_chrg_label_box').style.visibility = 'visible';"
                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                           spellcheck="false" class="form-control text-center form-control-font13" size="8" maxlength="30"  />
                </td>
                <!--<td colspan="3">-->
                    <?php if ($listPanel != 'MeltingTransList' && $listPanel != 'MeltingTransListUp' && $listMetalPanel != 'MeltingTransListUp') { ?>
<!--                        <a style="cursor: pointer;" 
                           onclick ="resetStockCrystalFunc();
                                       getStockCrystalRawMetalIssueDivFunc('', 'crystalAddDiv', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>');
                                       return false;">
                            <table border="0" cellspacing="2" cellpadding="0" width="100%" align="left">
                                <tr>    
                                    <td> 
                                        <img src="<?php echo $documentRootBSlash; ?>/images/diamond-icon16.png" alt="" 
                                             style="padding-top: 5px;margin-left: 10px;"
                                             onload="
                                             <?php if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') { ?>
                                                             calcRawMetalCrystalVal();
                                                             return false;
                                             <?php } else if ($NavPanelName == "AssignRepairOrderPanel") { ?>
                                                             document.getElementById('sttr_item_name').focus();
                                             <?php } else { ?>
                                                             document.getElementById('sttr_gs_weight').focus();
                                             <?php } ?>
                                             "/>
                                    </td>
                                    <td>
                                        STONE
                                    </td>                       
                                </tr>
                            </table>
                        </a>-->
                    <?php } ?>
                <!--</td>-->
    </tr>
</table>
</td>
</tr>
        <!--<tr>  
            <td colspan="12">
                <table>
                    <tr>
                        <td width="100%"></td>
                       
                    </tr>
                </table>
            </td>
        
        </tr>-->
<tr>
    <td>
        <div id="crystalAddDiv">
            <?php
//            echo '$noOfCry='.$noOfCry;
            if ($noOfCry > 0) {
//                    include 'omrwcrydv.php';
            }
            ?>
        </div>
    </td>
</tr>
<!--<tr>
    <td  class="paddingTop7 padBott4">
        <div class="hrGold"></div>
    </td>
</tr>-->
<tr>
    <td align="center" width="100%">
        <div id="addRawStockSubButtDiv">
            <input type="submit" value="<?php
            if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $listPanelUp == 'MeltingTransListUp' || $listPanel == 'MeltingTransListUp' || $listMetalPanel == 'MeltingTransListUp')
                echo 'UPDATE ITEM';
            else
                echo 'SUBMIT';
            ?>" 
                   class="btn btn1 btn1Hover" id="addRawStockSubButt" 
                   maxlength="30" size="20" style = "height:30px;width:120px;font-weight:bold;border: 1px solid #97ca97;border-radius:5px!important;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:#006400;background:#D8F6D8"
                   />
        </div>  
    </td>
</tr>
</table>
