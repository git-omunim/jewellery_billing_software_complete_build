<?php
/*
 * **************************************************************************************
 * @tutorial: SUPPLIER STOCK PURCHASE SUB FORM FILE @PRIYANKA-02MAR2021
 * **************************************************************************************
 * 
 * Created on MARCH 02, 2021 01:15:00 PM
 *
 * @FileName: omwsinadv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-02MAR2021
 *  REASON:
 *
 */
?>
<?php
//******include file for conversion according to type
include 'ogiartdv.php';
$suppSimilarItem[$suppItemCount] = $_GET['suppSimItemPanel'];
if ($suppItemCount == '')
    $suppItemCount = 1;
if ($payPanelName == 'InvoicePayment') {
    $sttr_gs_weight = '';
    $sttr_stone_valuation = '';
    $sttr_pkt_weight = '';
    $sttr_lab_charges = '';
    $sttr_final_valuation = '';
    $sttr_nt_weight = '';
}
//echo 'stock_transaction:' . $sttr_transaction_type;
if ($payPanelName == 'UpdateItem' || $payPanelName == 'InvoicePayUp') {
    if ($sttr_transaction_type == 'PURCHASE')
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_sttr_id = '$sttr_id' and sttr_transaction_type= 'PURCHASE' "
                . "and sttr_indicator = 'stockCrystal' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
    else
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_sttr_id = '$sttr_id' and sttr_indicator = 'stockCrystal' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
    $resCryDet = mysqli_query($conn, $qSelCryDet);
    $noOfCry = mysqli_num_rows($resCryDet);
}
?>
<div id="stockMiddleDiv">
    <table align="center" border="0" cellspacing="0" cellpadding="1" width="99.6%" class="brdrgry-dashed margtp10">
        <tr class="height28 goldBack">
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="8%">
                <div class="text-center font-dark">
                    <strong>
                        TYPE
                    </strong>
                </div>
            </td>
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="10%">
                <div class="text-center font-dark">
                    <strong>
                        PROD CAT
                    </strong>
                </div>
            </td>
            <td <?php if ($HSNOptionInForms == 'NO') { ?>colspan="2"<?php } ?>
                                                         align="center" title="" class="textLabel14CalibriBrownBold" width="10%">
                <div class="text-center font-dark">
                    <strong>
                        NAME
                    </strong>
                </div>
            </td>
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="5%">
                <div class="text-center font-dark">
                    <strong>
                        P.CODE
                    </strong>
                </div>
            </td>
            <?php if ($HSNOptionInForms != 'NO') { ?>
                <td align="center" title="" class="textLabel14CalibriBrownBold" width="5%">
                    <div class="text-center font-dark">
                        <strong>
                            HSN
                        </strong>
                    </div>
                </td>
            <?php } ?>
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="5%">
                <div class="text-center font-dark">
                    <strong>
                        QTY
                    </strong>
                </div>
            </td>
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="10%">
                <div class="text-center font-dark">
                    <strong>
                        GS WT
                    </strong>
                </div>
            </td>
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="10%">
                <div class="text-center font-dark">
                    <strong>
                        PKT WT
                    </strong>
                </div>
            </td>
            <td align="center" title="" class="textLabel14CalibriBrownBold" width="10%">
                <div class="text-center font-dark">
                    <strong>
                        NT WT
                    </strong>
                </div>
            </td>
            <td align="left" title="" class="textLabel14CalibriBrownBold" width="5%">
                <div class="text-center font-dark">
                    <strong>
                        PURITY
                    </strong>
                </div>
            </td>
            <td align="left" title="" class="textLabel14CalibriBrownBold" width="5%">
                <div class="text-center font-dark">
                    <strong>
                        WSTG
                    </strong>
                </div>
            </td>
            <td align="left" title="" class="textLabel14CalibriBrownBold" width="8%">
                <div class="text-center font-dark">
                    <strong>
                        F. PURITY
                    </strong>
                </div>
            </td>
            <td align="left" title="" class="textLabel14CalibriBrownBold" width="8%">
                <div class="text-center font-dark">
                    <strong>
                        FFN WT
                    </strong>
                </div>
            </td>
            <td align="center" title="" class="textLabel14CalibriBrownBold" colspan="2" width="15%">
                <div class="text-center font-dark">
                    <strong>
                        CUSTOMER WS / WT
                    </strong>
                </div>
            </td>
<!--            <td align="center" title="FINE WEIGHT" class="textLabel12CalibriBrown">
                FN WT
            </td>-->
<!--            <td align="center" title="LABOUR CHARGES" class="textLabel14CalibriBrownBold">
                <div class="text-center font-dark">
                    <strong>
                        LAB CHRG
                    </strong>
                </div>
            </td>
            <td align="center" title="TOTAL LABOUR CHARGES" class="textLabel14CalibriBrownBold">
                <div class="text-center font-dark">
                    <strong>
                        TOT. LAB 
                    </strong>
                </div>
            </td>-->
            <td align="" title="" class="textLabel14CalibriBrownBold"></td>

        </tr>
        <tr>
        <input type="hidden" id="metalType" name="metalType" value="<?php echo $sttr_metal_type; ?>"/>
        <input type="hidden" id="commonPanel" name="commonPanel" value="<?php echo $commonPanel; ?>" />
        <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
        <input type="hidden" id="addItemCryCount" name="addItemCryCount"/>
        <input type="hidden" id="addItemCryFinVal" name="addItemCryFinVal"/>
        <input type="hidden" id="itemDivCnt" name="itemDivCnt" value="" />
        <input type="hidden" id="itemTotalCrystalVal" name="itemTotalCrystalVal"/>
        <input type="hidden" id="sttr_stone_wt" name="sttr_stone_wt"/>
        <input type="hidden" id="sttr_stone_wt_type" name="sttr_stone_wt_type"/>
        <input type="hidden" id="suppPanelName" name="suppPanelName" value='AddSuppStock'/>
        <input type="hidden" id="openLotItemDetDiv" name="openLotItemDetDiv"/>
        <input type="hidden" id="globSuppItemCount" name="globSuppItemCount"/>
        <input type="hidden" id="addItemValuation" name="addItemValuation"  />   <!-- FUNCTION REQUIRED-->
        <input type="hidden" id="subPanel" name="subPanel" value="SuppPurByInv"/>
        <input type="hidden" id="metalRateCalculation" name="metalRateCalculation" value="<?php echo $sttr_metal_rate; ?>" />  <!--  ADDED TO MANAGE METAL RATE --> 
        <input type="hidden" id="addPanelInfo" name="addPanelInfo" value = ''/>

        <?php if ($payPanelName == "ItemApprovalRec") { ?>
            <input type="hidden" id="sttr_indicator" name="sttr_indicator" value = 'APPROVALREC'/>
            <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value = 'APPROVALREC'/>
        <?php } else { ?>
            <input type="hidden" id="sttr_indicator" name="sttr_indicator" value = 'AddInvoice'/>
            <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value = 'PURBYSUPP'/>
        <?php } ?>

        <input type="hidden" id="sttr_sell_status" name="sttr_sell_status" value = 'No'/>
        <input type="hidden" id="sttr_final_val_by" name="sttr_final_val_by" value="<?php echo $sttr_final_val_by; ?>"/><!-- change value of field @OMMODTAG SHRI_19NOV15 -->
        <input type="hidden" id="sttr_other_charges_by" name="sttr_other_charges_by" value="<?php echo $sttr_other_charges_by; ?>"/>

        <input type="hidden" id="sttr_user_id" name="sttr_user_id" value = '<?php echo $suppId; ?>'/>

        <input type="hidden" id="ms_sub_itm_from_wt" name="ms_sub_itm_from_wt" />
        <input type="hidden" id="ms_sub_itm_to_wt" name="ms_sub_itm_to_wt"  />
        <input type="hidden" id="ms_sub_itm_wstg_max" name="ms_sub_itm_wstg_max" />
        <input type="hidden" id="ms_sub_itm_wstg_min" name="ms_sub_itm_wstg_min"/>
        <input type="hidden" id="ms_sub_itm_wstg_max_per" name="ms_sub_itm_wstg_max_per" />
        <input type="hidden" id="ms_sub_itm_wstg_min_per" name="ms_sub_itm_wstg_min_per" />       
        <input type="hidden" id="ms_sub_itm_mkg_max" name="ms_sub_itm_mkg_max" />
        <input type="hidden" id="ms_sub_itm_mkg_min" name="ms_sub_itm_mkg_min" />
        <input type="hidden" id="ms_sub_itm_mkg_max_pp" name="ms_sub_itm_mkg_max_pp" />
        <input type="hidden" id="ms_sub_itm_mkg_min_pp" name="ms_sub_itm_mkg_min_pp" />
        <input type="hidden" id="ms_sub_itm_mkg_max_fx" name="ms_sub_itm_mkg_max_fx" />
        <input type="hidden" id="ms_sub_itm_mkg_min_fx" name="ms_sub_itm_mkg_min_fx" />
        <input type="hidden" id="ms_sub_itm_disc_max_gm" name="ms_sub_itm_disc_max_gm" />
        <input type="hidden" id="ms_sub_itm_disc_min_gm" name="ms_sub_itm_disc_min_gm" />
        <input type="hidden" id="ms_sub_itm_disc_max_pp" name="ms_sub_itm_disc_max_pp" />
        <input type="hidden" id="ms_sub_itm_disc_min_pp" name="ms_sub_itm_disc_min_pp" />
        <input type="hidden" id="ms_sub_itm_disc_mkg_max_fx" name="ms_sub_itm_disc_mkg_max_fx" />
        <input type="hidden" id="ms_sub_itm_disc_mkg_min_fx" name="ms_sub_itm_disc_mkg_min_fx" />

        <input type="hidden" id="sttr_tax" name="sttr_tax" />
        <input type="hidden" id="sttr_tot_tax" name="sttr_tot_tax" />
        <input type="hidden" id="sttr_valuation" name="sttr_valuation" />
        <input type="hidden" id="sttr_stone_valuation" name="sttr_stone_valuation" />
        <input type="hidden" id="sttr_final_valuation" name="sttr_final_valuation" />

        <input type="hidden" id="sttr_item_model_no" name="sttr_item_model_no" />

        <input type="hidden" id="sttr_cust_wastg_by" name="sttr_cust_wastg_by" value='<?php echo $sttr_cust_wastg_by; ?>'/>
        <input type="hidden" id="sttr_value_added" name="sttr_value_added" value='<?php echo $sttr_value_added; ?>'/>

        <div id="metalRateDiv">
            <input type="hidden" id="sttr_metal_rate" name="sttr_metal_rate" value="" />
            <div id="metalIdSelectDiv"></div>
        </div>

        <div id="display_supp_pur_div"></div>
        <td align="left" class="" title="" width ="8% !important">
            <div id="itemTypeDiv">
                <input type="hidden" id="suppItemTotVal" name="suppItemTotVal"/>
                <select id="sttr_metal_type" name="sttr_metal_type"
                        <?php if ($supp_idt_id != '') { ?>disabled ="disabled"<?php } ?>
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('sttr_item_category').focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                        <?php if ($suppItemCount > 1) { ?>
                                        document.getElementById('sttr_final_valuation<?php echo $suppItemCount - 1; ?>').focus();
                                        return false;
                        <?php } else { ?>document.getElementById('sttr_account_id').focus();
                                        return false;<?php } ?>
                                }"
                        class="form-control form-control-font13 text-center font-dark input-focus"
                        onchange="//document.getElementById('sttr_item_category').value = this.value + 'Stock';
                                //document.getElementById('sttr_item_name').value = this.value + 'Stock';
                                javascript: //if (this.value == 'Gold') {
                                        //document.getElementById('sttr_item_pre_id').value = 'GWHS';
                                        //} else {
                                        //document.getElementById('sttr_item_pre_id').value = 'SWHS';
                                        //}
                                        getSuppPurMetalRate(this.value, 'sttr_metal_rate');
                                changeItemTunchOption(this, 'AddInvoice');">
                            <?php
                            $metalType = array(Gold, Silver, Other);
                            for ($i = 0; $i <= 2; $i++)
                                if ($metalType[$i] == $sttr_metal_type)
                                    $optionMetalSel[$i] = 'selected';
                            ?>
                    <option value="Gold" <?php echo $optionMetalSel[0]; ?>>GD</option>
                    <option value="Silver" <?php echo $optionMetalSel[1]; ?>>SL</option>
                    <option value="Other" <?php echo $optionMetalSel[2]; ?>>OT</option>
                    <?php $optionMetalSel = ''; ?>
                </select>
            </div>
        </td>

        <?php if ($payPanelName == 'UpdateItem') { ?>  


            <!-- START CODE FOR MASTER ITEM DETAILS FUNCTIONALITY @PRIYANKA-20MAR18 -->
            <td valign="middle" align="left" title="" class="" width ="10%!important">
                <input id="sttr_item_category" name="sttr_item_category" 
                       type="text"  disabled placeholder="CATEGORY" 
                       value="<?php
                       if ($sttr_item_category != '')
                           echo $sttr_item_category;
                       else
                           echo 'GoldStock';
                       ?>"
                       onclick="this.value = '';
                               clearDivision('itemListDivToAddStock');"
                       onblur ="if (this.value == '') {
                       <?php if ($sttr_item_category == '') { ?>
                                       document.getElementById('sttr_item_category').value = document.getElementById('sttr_metal_type').value + 'Stock';
                       <?php } else { ?>
                                       this.value = '<?php echo $sttr_item_category; ?>';
                       <?php } ?>
                           validateInput(this);
                               }
                               if (event.keyCode == 13) {
                                   clearDivision('itemListDivToAddStock');
                               }
                               document.getElementById('category_label_box').style.visibility = 'hidden';"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   clearDivision('itemListDivToAddStock');
                                   document.getElementById('sttr_item_name').focus();
                                   document.getElementById('sttr_item_name').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   clearDivision('itemListDivToAddStock');
                                   document.getElementById('sttr_metal_type').focus();
                                   return false;
                               }"
                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchAddStockItemNames(document.getElementById('sttr_item_category').value, document.getElementById('sttr_metal_type').value, 'sttr_item_category', event.keyCode, '<?php echo $documentRootBSlash; ?>', 'JewelleryPanel');
                               }
                               validateInput(this);"

                       autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="7" maxlength="80">
                <div id="itemCategoryListDivToAddStock" class="itemListDivToAddStock placeholderClass"></div>
            </td> 
            <td <?php if ($HSNOptionInForms == 'NO') { ?>colspan="2"<?php } ?>
                                                         valign="middle" align="left" title="" class="" width ="10% !important">

                <input id="sttr_item_name" name="sttr_item_name" disabled 
                       type="text" placeholder="NAME" 
                       value="<?php
                       if ($sttr_item_name != '')
                           echo $sttr_item_name;
                       else
                           echo 'GoldStock';
                       ?>"
                       onclick="clearDivision('itemListDivToAddStockItem');
                               this.value = '';"
                       onblur ="if (this.value == '') {
                       <?php if ($sttr_item_name == '') { ?>
                                       document.getElementById('sttr_item_name').value = document.getElementById('sttr_metal_type').value + 'Stock';
                       <?php } else { ?>
                                       this.value = '<?php echo $sttr_item_name; ?>';
                       <?php } ?>
                           validateInput(this);
                               }
                               clearDivision('itemListDivToAddStockItem');
                               getProductCodeByName(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_metal_type').value);
                               document.getElementById('name_label_box').style.visibility = 'hidden';"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   clearDivision('itemListDivToAddStockItem');
                                   document.getElementById('sttr_item_pre_id').focus();
                                   document.getElementById('sttr_item_pre_id').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   clearDivision('itemListDivToAddStockItem');
                                   document.getElementById('sttr_item_category').focus();
                                   document.getElementById('sttr_item_category').value = '';
                                   return false;
                               }"
                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchStockItemNames(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_metal_type').value, 'sttr_item_name', event.keyCode, '', '', '<?php echo $documentRootBSlash; ?>', 'JewelleryPanel');
                               }
                               validateInput(this);"
                       onfocus="document.getElementById('name_label_box').style.visibility = 'visible';"
                       autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="7" maxlength="80">
                <div id="itemListDivToAddStockItem"></div>
            </td> 
            <td valign="middle" align="left" title="" class="" width="8%">
                <input id="sttr_item_pre_id" name="sttr_item_pre_id" disabled 
                       type="text" placeholder="PROD CODE" 
                       value="<?php
                       if ($sttr_item_pre_id != '') {
                           echo $sttr_item_pre_id;
                       } else {
                           if ($met_rate_value != '') {
                               echo 'GWHS';
                           } else {
                               echo 'SWHS';
                           }
                       }
                       ?>"
                       onclick="this.value = '';"
                       onblur ="if (this.value == '') {
                       <?php if ($sttr_item_pre_id == '') { ?>
                                       document.getElementById('sttr_item_pre_id').value = document.getElementById('sttr_item_pre_id').value + 'GWHS';
                       <?php } else { ?>
                                       this.value = '<?php echo $sttr_item_pre_id; ?>';
                       <?php } ?>
                               }
                               validateInput(this);"
                       onkeyup ="validateInput(this);"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   clearDivision('metalIdSelectDiv');
                       <?php if ($HSNOptionInForms == 'NO') { ?>
                                       document.getElementById('sttr_quantity').focus();
                                       document.getElementById('sttr_quantity').value = '';
                       <?php } else { ?>
                                       document.getElementById('sttr_hsn_no').focus();
                                       document.getElementById('sttr_hsn_no').value = '';
                       <?php } ?>
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   clearDivision('metalIdSelectDiv');
                                   document.getElementById('sttr_item_name').focus();
                                   document.getElementById('sttr_item_name').value = '';
                                   return false;
                               }"
                       autocomplete="off" spellcheck="false" class="form-control-req-height20 placeholderClass" size="7" maxlength="15">

            </td> 
            <!-- END CODE FOR MASTER ITEM DETAILS FUNCTIONALITY @PRIYANKA-20MAR18 -->
        <?php } else { ?>


            <!-- START CODE FOR MASTER ITEM DETAILS FUNCTIONALITY @PRIYANKA-20MAR18 -->
            <td valign="middle" align="left" title="" class="" width ="8% !important">
                <div name="box" id="category_label_box" class="hidden_box" style="visibility:hidden;"> 
                    PRODUCT CATEGORY
                </div>
                <input id="sttr_item_category" name="sttr_item_category" 
                       type="text" placeholder="CATEGORY" 
                       value="<?php
                       if ($sttr_item_category != '')
                           echo $sttr_item_category;
                       else
                           echo 'GoldStock';
                       ?>"
                       onclick="this.value = '';
                               clearDivision('itemListDivToAddStock');"
                       onblur ="document.getElementById('category_label_box').style.visibility = 'hidden';
                               if (this.value == '') {
                       <?php if ($sttr_item_category == '') { ?>
                                       document.getElementById('sttr_item_category').value = document.getElementById('sttr_metal_type').value + 'Stock';
                       <?php } else { ?>
                                       this.value = '<?php echo $sttr_item_category; ?>';
                       <?php } ?>
                           validateInput(this);
                               }
                               if (event.keyCode == 13) {
                                   clearDivision('itemListDivToAddStock');
                               }
                               checkProdMasterToGetPrice(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_item_pre_id').value, '<?php echo $suppId; ?>');

                               /*setPurityAccUserItmCode(document.getElementById('sttr_item_pre_id').value,'<?php echo $suppId; ?>');*/"

                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {

                                   document.getElementById('sttr_item_name').focus();
                                   document.getElementById('sttr_item_name').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
    //                                   clearDivision('itemListDivToAddStock');
                                   document.getElementById('sttr_metal_type').focus();
                                   return false;
                               }
                               clearDivision('itemListDivToAddStock');"

                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchAddStockItemNames(document.getElementById('sttr_item_category').value, document.getElementById('sttr_metal_type').value, '', 'sttr_item_category', event.keyCode, '<?php echo $documentRootBSlash; ?>', 'JewelleryPanel');
                               }
                               validateInput(this);"
                       onfocus="document.getElementById('category_label_box').style.visibility = 'visible';"
                       autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="7" maxlength="80">
                <div id="itemCategoryListDivToAddStock" class="itemListDivToAddStock placeholderClass" style="position:relative;"></div>
            </td> 
            <td <?php if ($HSNOptionInForms == 'NO') { ?>colspan="2"<?php } ?>
                                                         valign="middle" align="left" title="" class="" width ="10% !important">
                <div name="box" id="name_label_box" class="hidden_box" style="visibility:hidden;"> 
                    PRODUCT NAME
                </div>
                <input id="sttr_item_name" name="sttr_item_name" 
                       type="text" placeholder="NAME" 
                       value="<?php
                       if ($sttr_item_name != '')
                           echo $sttr_item_name;
                       else
                           echo 'GoldStock';
                       ?>"
                       onclick="clearDivision('itemListDivToAddStockItem');
                               this.value = '';"
                       onblur ="if (this.value == '') {
                       <?php if ($sttr_item_name == '') { ?>
                                       document.getElementById('sttr_item_name').value = document.getElementById('sttr_metal_type').value + 'Stock';
                       <?php } else { ?>
                                       this.value = '<?php echo $sttr_item_name; ?>';
                       <?php } ?>
                           validateInput(this);
                               }
                               document.getElementById('name_label_box').style.visibility = 'hidden';
                               checkProdMasterToGetPrice(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_item_pre_id').value, '<?php echo $suppId; ?>');
                               getProductCodeByName(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_metal_type').value);

                               //setPurityAccUserItmCode(document.getElementById('sttr_item_pre_id').value,'<?php echo $suppId; ?>');
                               //setStockMasterUserDetails(document.getElementById('sttr_item_category').value, this.value, '<?php echo $suppId; ?>');"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   clearDivision('itemListDivToAddStockItem');
                                   document.getElementById('sttr_item_pre_id').focus();
                                   document.getElementById('sttr_item_pre_id').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   clearDivision('itemListDivToAddStockItem');
                                   document.getElementById('sttr_item_category').focus();
                                   document.getElementById('sttr_item_category').value = '';
                                   return false;
                               }"
                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchStockItemNames(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_metal_type').value, 'sttr_item_name', event.keyCode, '', '', '<?php echo $documentRootBSlash; ?>', 'JewelleryPanel');
                               }
                               validateInput(this);"
                       onfocus="document.getElementById('name_label_box').style.visibility = 'visible';"
                       autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="7" maxlength="80">
                <div id="itemListDivToAddStockItem" style="position:relative;"></div>
            </td>
            <td valign="middle" align="left" title="" class="" width="5%">
                <div name="box" id="prod_code_label_box" class="hidden_box" style="visibility:hidden;"> 
                    PRODUCT CODE
                </div>
                <input id="sttr_item_pre_id" name="sttr_item_pre_id" 
                       type="text" placeholder="PROD CODE" 
                       value="<?php
                       if ($sttr_item_pre_id != '')
                           echo $sttr_item_pre_id;
                       else
                           echo 'GWHS';
                       ?>"
                       onclick="this.value = '';
                               clearDivision('searchSuppProductCodeDiv');"
                       onblur ="if (this.value == '') {
                       <?php if ($sttr_item_pre_id == '') { ?>
                                       document.getElementById('sttr_item_pre_id').value = document.getElementById('sttr_item_pre_id').value + 'GWHS';
                       <?php } else { ?>
                                       this.value = '<?php echo $sttr_item_pre_id; ?>';
                       <?php } ?>
                           validateInput(this);
                               }
                               if (event.keyCode == 13) {
                                   clearDivision('searchSuppProductCodeDiv');
                               }
                               document.getElementById('prod_code_label_box').style.visibility = 'hidden';
                               checkProdMasterToGetPrice(document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, document.getElementById('sttr_item_pre_id').value, '<?php echo $suppId; ?>');
                               //setPurityAccUserItmCode(this.value,'<?php echo $suppId; ?>');"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   clearDivision('searchSuppProductCodeDiv');
                       <?php if ($HSNOptionInForms == 'NO') { ?>
                                       document.getElementById('sttr_quantity').focus();
                                       document.getElementById('sttr_quantity').value = '';
                       <?php } else { ?>
                                       document.getElementById('sttr_hsn_no').focus();
                                       document.getElementById('sttr_hsn_no').value = '';
                       <?php } ?>
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   clearDivision('searchSuppProductCodeDiv');
                                   document.getElementById('sttr_item_name').focus();
                                   document.getElementById('sttr_item_name').value = '';
                                   return false;
                               }"
                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchSuppProductCode(this.value, '<?php echo $suppId; ?>', document.getElementById('sttr_metal_type').value, document.getElementById('sttr_item_category').value, document.getElementById('sttr_item_name').value, 'sttr_item_pre_id', event.keyCode, '<?php echo $documentRootBSlash; ?>', 'suppJewelleryPanel');
                               }
                               validateInput(this);"  
                       onfocus="document.getElementById('prod_code_label_box').style.visibility = 'visible';"
                       autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" 
                       size="7" maxlength="15">
                <div id="searchSuppProductCodeDiv" class="searchSuppProductCodeDiv placeholderClass"></div>
            </td>
        <?php } ?>
        <!-- END CODE FOR MASTER ITEM DETAILS FUNCTIONALITY @PRIYANKA-20MAR18 -->

        <?php if ($HSNOptionInForms != 'NO') { ?>
            <td valign="middle" title="" align="left" class="" width ="5% !important">
                <div name="box" id="hsn_label_box" class="hidden_box" style="visibility:hidden;"> 
                    HSN
                </div>
                <input id="sttr_hsn_no" name="sttr_hsn_no" type="text" placeholder="HSN NO."
                       value="<?php
                       if ($sttr_hsn_no == '') {
                           $sttr_hsn_no = '';
                       } echo $sttr_hsn_no;
                       ?>"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   document.getElementById('sttr_quantity').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_item_pre_id').focus();
                                   document.getElementById('sttr_item_pre_id').value = '';
                                   return false;
                               }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);" 
                       onblur="document.getElementById('hsn_label_box').style.visibility = 'hidden';"
                       onfocus="document.getElementById('hsn_label_box').style.visibility = 'visible';"
                       spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="2" maxlength="10" />
            </td>
        <?php } ?>

        <td valign="middle" title="" align="left" class="" width="5%">
            <div name="box" id="quantity_label_box" class="hidden_box" style="visibility:hidden;"> 
                PRODUCT QUANTITY
            </div>
            <input id="sttr_quantity" name="sttr_quantity" type="text" placeholder="QTY"
                   value="<?php
                   if ($sttr_quantity != '') {
                       echo $sttr_quantity;
                   } else {
                       echo '';
                   }
                   ?>"
                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                               document.getElementById('sttr_gs_weight').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                   <?php if ($HSNOptionInForms == 'NO') { ?>
                                   document.getElementById('sttr_item_pre_id').focus();
                   <?php } else { ?>
                                   document.getElementById('sttr_hsn_no').focus();
                   <?php } ?>
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"    
                   onblur="//setPurityAccUserItmCode(document.getElementById('sttr_item_pre_id').value,'<?php echo $suppId; ?>');
                           document.getElementById('quantity_label_box').style.visibility = 'hidden';
                           purFormB2CalFunc();" 
                   onfocus="document.getElementById('quantity_label_box').style.visibility = 'visible';"
                   spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="2" maxlength="10" />
        </td>
        <td align="left" title="" width="10%">
            <table border="0" cellspacing="1" cellpadding="0" align="left" width="100%">  
                <tr>
                    <td align="left" width="60%">
                        <div name="box" id="gs_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                            PRODUCT GROSS WT
                        </div>
                        <input id="sttr_gs_weight" name="sttr_gs_weight" 
                               type="text" placeholder="GS WT" 
                               value="<?php echo $sttr_gs_weight; ?>" 
                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                           document.getElementById('sttr_gs_weight_type').focus();
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('sttr_quantity').focus();
                                           document.getElementById('sttr_quantity').value = '';
                                           return false;
                                       }
                                       purFormB2CalFunc();"
                               onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                           searchSuppPurWtType(this.value, event.keyCode, 'suppGswtTypeListDiv', 'sttr_gs_weight_type', '');
                                       }"
                               onblur="document.getElementById('gs_wt_label_box').style.visibility = 'hidden';
                                       if (this.value != '') {
                                           document.getElementById('sttr_nt_weight').value = this.value - document.getElementById('sttr_pkt_weight').value;
                                           document.getElementById('netWeight').value = this.value;
                                       }
                                       //setPurityAccUserItmCode(document.getElementById('sttr_item_pre_id').value,'<?php echo $suppId; ?>');
                                       purFormB2CalFunc();
                                       document.getElementById('suppGswtTypeListDiv').innerHTML = '';
                               " 

                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               onfocus="document.getElementById('gs_wt_label_box').style.visibility = 'visible';"
                               autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="6" maxlength="20" title=""/>
                    </td>
                    <td align="right" title="" width="40%">
                        <select id="sttr_gs_weight_type" name="sttr_gs_weight_type" style="width:100%" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('sttr_pkt_weight').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('sttr_gs_weight').focus();
                                            return false;
                                        }"
                                onblur="if (this.value != '') {
                                            document.getElementById('sttr_nt_weight_type').value = this.value;
                                            document.getElementById('utransFinalWeightTyp').value = this.value;
                                        }"
                                onchange="javascript:
                                                if (document.getElementById('sttr_gs_weight').value != '') {
                                            purFormB2CalFunc();
                                        }"
                                class="form-control form-control-font13 text-center font-dark input-focus">
                                    <?php
                                    $itemGsWtType = array(GM, KG, MG);
                                    for ($i = 0; $i <= 2; $i++)
                                        if ($itemGsWtType[$i] == $sttr_gs_weight_type)
                                            $optionGSWTypeSel[$i] = 'selected';
                                    ?>
                            <option value="GM" <?php echo $optionGSWTypeSel[0]; ?>>GM</option>
                            <option value="KG" <?php echo $optionGSWTypeSel[1]; ?>>KG</option>
                            <option value="MG" <?php echo $optionGSWTypeSel[2]; ?>>MG</option>
                        </select> 
                    </td>
                </tr>
            </table>
        </td>
        <td align="left" title="" width="10%">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">  
                <tr>
                    <td align="left" width="60%">
                        <div name="box" id="pkt_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                            PRODUCT PKT WT
                        </div>
                        <input id="sttr_pkt_weight" name="sttr_pkt_weight" 
                               type="text" placeholder="PKT WT" value="<?php echo $sttr_pkt_weight; ?>"
                               <?php if ($staffId && $array['addStockAccessAutoWtRdOnly'] == 'true') { ?>readonly="true"<?php } ?>
                               onblur="
                                       if (this.value == '')
                                           this.value = '<?php echo $sttr_pkt_weight; ?>';
                                       if (this.value != '') {
                                           changeNetWeightByPktWt();
                                           purFormB2CalFunc();
                                       }
                                       document.getElementById('pkt_wt_label_box').style.visibility = 'hidden';
                                       return false;"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('sttr_pkt_weight_type').focus();
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('sttr_gs_weight_type').focus();
                                           return false;
                                       }
                                       purFormB2CalFunc();"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                               onfocus="document.getElementById('pkt_wt_label_box').style.visibility = 'visible';"
                               autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="10" maxlength="20"  title=""/>
                    </td>
                    <input type="hidden" id="sttr_less_weight"/>
                    <input type="hidden" id="sttr_less_weight_type" />
                    <td align="left" title="" width="40%" class="paddingLeft2">
                        <select id="sttr_pkt_weight_type" name="sttr_pkt_weight_type" title=""
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('sttr_nt_weight').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('sttr_pkt_weight').focus();
                                            document.getElementById('sttr_pkt_weight').value = '';
                                            return false;
                                        }"
                                onchange="javascript:
                                                if (document.getElementById('sttr_gs_weight').value != '') {
                                            changeNetWeightByPktWt();
                                        }"
                                class="form-control form-control-font13 text-center" style="width:100%;">
                                    <?php
                                    $itemPktWtType = array(GM, KG, MG);
                                    for ($i = 0; $i <= 2; $i++)
                                        if ($itemPktWtType[$i] == $sttr_pkt_weight_type)
                                            $optionPKTWTypeSel[$i] = 'selected';
                                    ?>
                            <option value="GM" <?php echo $optionPKTWTypeSel[0]; ?>>GM</option>
                            <option value="KG" <?php echo $optionPKTWTypeSel[1]; ?>>KG</option>
                            <option value="MG" <?php echo $optionPKTWTypeSel[2]; ?>>MG</option>
                        </select> 
                    </td>
                </tr>
            </table>
        </td>
        <td align="left" title="" width="10%">
            <table border="0" cellspacing="1" cellpadding="0" align="left" width="100%">  
                <tr>
                    <td align="left" title="" width="60%">
                        <div name="box" id="net_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                            PRODUCT NET WT
                        </div>
                        <input type="hidden" id="netWeight" name="netWeight" value="<?php echo $sttr_nt_weight; ?>" />
                        <input id="sttr_nt_weight" name="sttr_nt_weight" 
                               type="text" placeholder="NT WT" 
                               value="<?php echo $sttr_nt_weight; ?>" 
                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                           document.getElementById('sttr_nt_weight_type').focus();
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('sttr_pkt_weight_type').focus();
                                           return false;
                                           purFormB2CalFunc();
                                       }"
                               onblur="document.getElementById('net_wt_label_box').style.visibility = 'hidden';
                                        if (this.value != '') {
                                           document.getElementById('suppGdNetWeight').value = this.value;
                                       }
                                       purFormB2CalFunc();"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               onfocus="document.getElementById('net_wt_label_box').style.visibility = 'visible';"
                               autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="10" maxlength="20" title=""/>
                    </td>
                    <td align="right" title="" width="40%">
                        <select id="sttr_nt_weight_type" name="sttr_nt_weight_type" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('sttr_purity').focus();
                                            document.getElementById('sttr_purity').value = '';
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('sttr_nt_weight').focus();
                                            return false;
                                        }"
                                class="form-control form-control-font13 text-center" style="width:100%;">
                                    <?php
                                    $itemNtWtType = array(GM, KG, MG);
                                    for ($i = 0; $i <= 2; $i++)
                                        if ($itemNtWtType[$i] == $sttr_nt_weight_type)
                                            $optionNtWTypeSel[$i] = 'selected';
                                    ?>
                            <option value="GM" <?php echo $optionNtWTypeSel[0]; ?>>GM</option>
                            <option value="KG" <?php echo $optionNtWTypeSel[1]; ?>>KG</option>
                            <option value="MG" <?php echo $optionNtWTypeSel[2]; ?>>MG</option>
                        </select> 
                    </td>
                </tr>
            </table>
        </td>
        <td valign="middle" title="" align="left" width="5%" style="position:relative">
            <div name="box" id="purity_label_box" class="hidden_box" style="visibility:hidden;"> 
                PRODUCT PURITY
            </div>
            <div id = "itemFineTunchDiv">
                <?php
                $tunchDivId = 'sttr_purity';
                $nextFieldId = 'sttr_wastage';
                $prevFieldId = 'sttr_nt_weight_type';
                $netWeightFieldId = 'sttr_nt_weight';
                $fineWeightFieldId = 'utransFinalWeightTyp';
                $tunchDivClass = 'form-control form-control-font13 text-center font-dark input-focus';
                $metalType = $metalTyp;
                $TunchValue = $sttr_purity;
                $itemDivCount = 'AddInvoice';
                include 'ogiatnch.php';
                ?>
            </div>
        </td>
        <td valign="middle" align="left" title="" width="5%">
            <div name="box" id="wastage_label_box" class="hidden_box" style="visibility:hidden;"> 
                PRODUCT WASTAGE
            </div>
            <input type="hidden" id="addItemWastageChanged" name="addItemWastageChanged" value="<?php echo $sttr_wastage; ?>" />
            <input type="hidden" id="sttr_fine_weight" name="sttr_fine_weight" value="<?php echo $sttr_fine_weight; ?>"/>
            <input id="sttr_wastage" name="sttr_wastage" 
                   type="text" placeholder="WSTG"
                   value="<?php echo $sttr_wastage; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('sttr_cust_wastage').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('sttr_purity').focus();
                               return false;
                           }"
                   onclick="this.value = '';"
                   onblur=" javascript:  document.getElementById('wastage_label_box').style.visibility = 'hidden';
                           if (document.getElementById('sttr_wastage').value == '') {
                               document.getElementById('sttr_wastage').value = document.getElementById('addItemWastageChanged').value;
                           }
                           if (this.value == '' || this.value == null) {
                               this.value = 0;
                               document.getElementById('sttr_final_purity').value = (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value)); //added @Author:SHRI24FEB17
                           }
                           if (document.getElementById('sttr_purity').value != '') {
                               document.getElementById('sttr_final_purity').value = (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value));
                   <?php if ($payPanelName != 'UpdateItem' && $payPanelName != 'InvoicePayUp') { ?>
                                   document.getElementById('sttr_cust_wastage').value = parseFloat(100 - (parseFloat(parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value)))).toFixed(2);
                   <?php } ?>
                               calculateAddCustWastageWt();
                               purFormB2CalFunc();
                           }
                           return false;"  
                   onfocus="document.getElementById('wastage_label_box').style.visibility = 'visible';"
                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                   spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="2" />
        </td>

        <td align="left" title="" width="5%">
            <div name="box" id="final_tunch_label_box" class="hidden_box" style="visibility:hidden;"> 
                FINAL TUNCH
            </div>
            <input id="sttr_final_purity" name="sttr_final_purity" 
                   type="text" placeholder="FINAL TUNCH" title=""
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('sttr_cust_wastage').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('sttr_wastage').focus();
                               return false;
                           }"
                   readonly="true" value = "<?php echo $sttr_final_purity; ?>"
                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                   onfocus="document.getElementById('final_tunch_label_box').style.visibility = 'visible';"
                   onblur="document.getElementById('final_tunch_label_box').style.visibility = 'hidden';"
                   spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="6" maxlength="15" />
        </td>
        <td align="left" title="" class="" width="8%">
            <table border="0" cellspacing="0" cellpadding="0" align="left">  
                <tr>
                    <td align="left">
                        <div name="box" id="ffn_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                            FINAL FINE WEIGHT
                        </div>
                        <input id="sttr_final_fine_weight" name="sttr_final_fine_weight" 
                               type="text" placeholder="FFN WT" 
                               value="<?php echo $sttr_final_fine_weight; ?>" 
                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                           document.getElementById('utransFinalWeightTyp').focus();
                                           return false;
                                       } else if (event.keyCode == 8) {
                                           document.getElementById('sttr_cust_wastage_wt').focus();
                                           return false;
                                       }"
                               onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                           searchSuppPurWtType(this.value, event.keyCode, 'suppFnWtTypeListDiv', 'utransFinalWeightTyp', '');
                                       }"
                               onblur="document.getElementById('ffn_wt_label_box').style.visibility = 'hidden';
                                       purFormB2CalFunc();
                                       document.getElementById('ffn_wt_label_box').value = this.value;"
                               onfocus="document.getElementById('size_lebgth_label_box').style.visibility = 'visible';"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               autocomplete="off" spellcheck="false" readonly 
                               style="width: 102%;"
                               class="form-control form-control-font13 text-center font-dark input-focus" 
                               size="10" maxlength="20" title=""/>
                    </td>
                <input type="hidden" id="utransFinalWeightTyp" name="utransFinalWeightTyp" value="<?php echo $sttr_nt_weight_type; ?>">

                </tr>
            </table>
        </td>
        <td align="left" title="" width="10%">
            <div name="box" id="cust_wastage_per_label_box" class="hidden_box" style="visibility:hidden;"> 
                CUSTOMER WASTAGE %
            </div>
            <input type="hidden" id="sttr_cust_wastg_by" name="sttr_cust_wastg_by" 
                   value="<?php echo $sttr_cust_wastg_by; ?>"/>
            <input type="hidden" id="addItemCustWastageChng" name="addItemCustWastageChng" 
                   value="<?php echo $sttr_cust_wastage; ?>" />
            <input id="sttr_cust_wastage" name="sttr_cust_wastage" type="text" 
                   placeholder="C. WSTG" title=""
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('sttr_cust_wastage_wt').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('sttr_wastage').focus();
                               return false;
                           }"
                   value="<?php echo $sttr_cust_wastage; ?>"
                   onblur="javascript: document.getElementById('cust_wastage_per_label_box').style.visibility = 'hidden';
                           if (this.value == '') {
                               this.value = document.getElementById('addItemCustWastageChng').value;
                           }
                           if (document.getElementById('sttr_nt_weight').value > 0) {
                               calculateAddCustWastageWt();
                               purFormB2CalFunc();
                               return false;
                           }
                           if (document.getElementById('sttr_cust_wastage_wt').value == 'NaN') {
                               document.getElementById('sttr_cust_wastage_wt').value = 0;
                           }
                           if (document.getElementById('sttr_value_added').value == 'NaN') {
                               document.getElementById('sttr_value_added').value = 0;
                           }"  
                   ondblclick="if (event.keyCode != 8 && event.keyCode != 13) {
                               custWastageByWt('custWastageSelDiv', 'sttr_cust_wastage', event.keyCode, 'AddStock');
                           }"
                   onfocus="document.getElementById('cust_wastage_per_label_box').style.visibility = 'visible';"
                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                   spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" 
                   size="8" maxlength="15" style="width:60px;"/> 
            <div id="custWastageSelDiv" style="margin-left:-45px"></div>
        </td>

        <td align="left" title="" width="10%">
            <div name="box" id="cust_wastage_wt_label_box" class="hidden_box" style="visibility:hidden;"> 
                CUSTOMER WASTAGE WT
            </div>
            <input id="sttr_cust_wastage_wt" name="sttr_cust_wastage_wt" type="text" 
                   placeholder="C. WSTG WT" title=""
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('sttr_lab_charges').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('sttr_cust_wastage').focus();
                               return false;
                           }"
                   value="<?php echo $sttr_cust_wastage_wt; ?>"
                   onblur="javascript: document.getElementById('cust_wastage_wt_label_box').style.visibility = 'hidden';
                           if (document.getElementById('sttr_gs_weight').value > 0) {
                               calStockItemCustWastage(this.value);
                               calculateAddCustWastageWt();
                               purFormB2CalFunc();
                               return false;
                           }
                           if (document.getElementById('sttr_cust_wastage_wt').value == 'NaN') {
                               document.getElementById('sttr_cust_wastage_wt').value = 0;
                           }"                                 
                   onchange="javascript:
                                   if (document.getElementById('sttr_gs_weight').value > 0) {
                               purFormB2CalFunc();
                               return false;
                           }"
                   onfocus="document.getElementById('cust_wastage_wt_label_box').style.visibility = 'visible';"
                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                   spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" 
                   size="8" maxlength="15" />  
        </td>

<!--        <td align="left" title="ITEM FINE WEIGHT" class="">
    <table border="0" cellspacing="0" cellpadding="0" align="left">  
        <tr>
            <td align="left">
                <input id="sttr_final_fine_weight" name="sttr_final_fine_weight" 
                       type="text" placeholder="FFN WT" 
                       value="<?php echo $sttr_final_fine_weight; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   document.getElementById('utransFinalWeightTyp').focus();
                                   return false;
                               } else if (event.keyCode == 8) {
                                   document.getElementById('sttr_wastage').focus();
                                   return false;
                               }"
                       onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                   searchSuppPurWtType(this.value, event.keyCode, 'suppFnWtTypeListDiv', 'utransFinalWeightTyp', '');
                               }"
                       onblur="purFormB2CalFunc();
                               document.getElementById('sttr_fine_weight').value = this.value;"

                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       autocomplete="off" spellcheck="false" readonly class="form-control-req-height20 bold placeholderClass" size="7" maxlength="20" title="FULL FINAL WEIGHT"/>
            </td>
            <td align="right" title="FINE WEIGHT TYPE">
                <select id="utransFinalWeightTyp" name="utransFinalWeightTyp" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('sttr_lab_charges').focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('sttr_final_fine_weight').focus();
                                    return false;
                                }"
                        class="form-control-height20 placeholderClass">
        <?php
        $itemFnWtType = array(GM, KG, MG);
        for ($i = 0; $i <= 2; $i++)
            if ($itemFnWtType[$i] == $sttr_nt_weight_type)
                $optionFnWTypeSel[$i] = 'selected';
        ?>
                    <option value="GM" <?php echo $optionFnWTypeSel[0]; ?>>GM</option>
                    <option value="KG" <?php echo $optionFnWTypeSel[1]; ?>>KG</option>
                    <option value="MG" <?php echo $optionFnWTypeSel[2]; ?>>MG</option>
                </select> 
            </td>
        </tr>
    </table>
</td>-->

        </tr>

        <tr>

            <td align="left" title="" colspan="3">
                <div name="box" id="other_info_label_box" class="hidden_box" style="visibility:hidden;"> 
                    OTHER INFO
                </div>
                <input id="sttr_other_info" name="sttr_other_info" 
                       type="text" placeholder="OTHER INFO" title=""
                       value = "<?php echo $sttr_other_info; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('addInvItemSubButt').focus();
                                   return false;
                               } else if (event.keyCode == 8) {
                                   document.getElementById('sttr_total_lab_charges').focus();
                                   return false;
                               }"
                       spellcheck="false" 
                       onblur="document.getElementById('other_info_label_box').style.visibility = 'hidden';"
                       onfocus="document.getElementById('other_info_label_box').style.visibility = 'visible';"
                       class="form-control form-control-font13 text-center font-dark input-focus" 
                       size="15" maxlength="30" />
            </td>
            <td colspan="" align="left" title="">
                <div name="box" id="size_lebgth_label_box" class="hidden_box" style="visibility:hidden;"> 
                    ITEM SIZE / LENGTH
                </div>
                <input id="sttr_size" name="sttr_size" 
                       type="text" placeholder="SIZE / LENGTH" 
                       value="<?php echo $sttr_size; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_fine_weight').focus();
                                   clearDivision('itemListDivToAddStockItem');
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_item_other_info').focus();
                                   clearDivision('itemListDivToAddStockItem');
                                   return false;
                               }"
                       onclick="clearDivision('itemListDivToAddStockItem');
                               this.value = '';"
                       onblur="document.getElementById('size_lebgth_label_box').style.visibility = 'hidden';"
                       onfocus="document.getElementById('size_lebgth_label_box').style.visibility = 'visible';"
                       autocomplete="off" spellcheck="false" 
                       class="form-control form-control-font13 text-center font-dark input-focus" maxlength="15" />
            </td>
            <!--
                        <td colspan="3"></td>-->
            <td align="left" title="" colspan="2" class="">
                <table border="0" cellspacing="1" cellpadding="0" align="left" width="100%">  
                    <tr>
                        <td align="left"  width="60%">
                            <div name="box" id="lab_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                                LABOUR CHARGES
                            </div>
                            <input id="addItemFfnWtBy" name="addItemFfnWtBy" type="hidden" value="<?php echo $sttr_lab_charges; ?>" />
                            <input id="sttr_lab_charges" name="sttr_lab_charges" 
                                   type="text" placeholder="LAB.CHRG" 
                                   value="<?php echo $sttr_lab_charges; ?>" 
                                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                               clearDivision('itemLabChrgsSelDiv');
                                               document.getElementById('sttr_lab_charges_type').focus();
                                               return false;
                                           } else if ( this.value == '' && event.keyCode == 8) {
                                               document.getElementById('sttr_cust_wastage_wt').focus();
                                               return false;
                                           }"
                                   onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                               clearDivision('itemLabChrgsSelDiv');
                                               searchSuppPurWtType(this.value, event.keyCode, 'suppLabTypeListDiv', 'sttr_lab_charges_type', '');
                                           }"
                                   ondblclick ="if (event.keyCode != 8 && event.keyCode != 13) {
                                               getItemLabChrgsByWt('itemLabChrgsSelDiv', 'sttr_lab_charges', event.keyCode, 'AddInvoice');
                                           }"
                                   onblur="document.getElementById('lab_chrg_label_box').style.visibility = 'hidden';
                                           purFormB2CalFunc();"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   onfocus="document.getElementById('lab_chrg_label_box').style.visibility = 'visible';"
                                   autocomplete="off" spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="4" maxlength="20" title="" style="width:100%;"/>
                            <div id="itemLabChrgsSelDiv"></div>
                        </td>
                        <td align="right" width="40%">
                            <select id="sttr_lab_charges_type" name="sttr_lab_charges_type" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_total_lab_charges').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('sttr_lab_charges').focus();
                                                return false;
                                            }"
                                    onchange="purFormB2CalFunc();"
                                    class="form-control form-control-font13 text-center" style="width:100%;">
                                        <?php
                                        if ($sttr_lab_charges_type != '') {
                                            $itemLabChargesType = array(GM, KG, MG, PP);
                                            for ($i = 0; $i <= 3; $i++)
                                                if ($itemLabChargesType[$i] == $sttr_lab_charges_type)
                                                    $optionLbChTypeSel[$i] = 'selected';
                                        } else {
                                            $optionLbChTypeSel[3] = 'selected';
                                        }
                                        ?>
                                <option value="GM" <?php echo $optionLbChTypeSel[0]; ?>>GM</option>
                                <option value="KG" <?php echo $optionLbChTypeSel[1]; ?>>KG</option>
                                <option value="MG" <?php echo $optionLbChTypeSel[2]; ?>>MG</option>
                                <option value="PP" <?php echo $optionLbChTypeSel[3]; ?>>PP</option>
                            </select> 
                        </td>
                    </tr>
                </table>
            </td>

            <td valign="middle" align="left" title="" class="paddingRight2" width="8%">
                <div name="box" id="lab_chrg_val_label_box" class="hidden_box" style="visibility:hidden;"> 
                    LABOUR CHARGES VALUATION
                </div>
                <input id="sttr_total_lab_charges" name="sttr_total_lab_charges" 
                       type="text" placeholder="TOT.LAB"
                       value="<?php echo $sttr_total_lab_charges; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_making_charges').focus();
                                   return false;
                               } else if (event.keyCode == 8) {
                                   document.getElementById('sttr_lab_charges_type').focus();
                                   return false;
                               }"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                       onblur="document.getElementById('lab_chrg_val_label_box').style.visibility = 'hidden';
                               purFormB2CalFunc();" 
                       onfocus="document.getElementById('lab_chrg_val_label_box').style.visibility = 'visible';"
                       spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" size="8" maxlength="15"/>
            </td>
            <td colspan="" aling="left">
                <table border="0" cellspacing="1" cellpadding="0" align="left" width="100%">
                    <tr>
                        <td title="" width="60%">
                            <div name="box" id="mkg_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                                MAKING CHARGES
                            </div>
                            <input  id="sttr_making_charges" name="sttr_making_charges" 
                                    type="text" placeholder="MK CHRG" 
                                    value="<?php echo $sttr_making_charges; ?>"
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_making_charges_type').focus();
                                                return false;
                                            } else if (event.keyCode == 8 && this.value == '') {
                                                document.getElementById('sttr_total_lab_charges').focus();
                                                document.getElementById('sttr_total_lab_charges').setSelectionRange(document.getElementById('sttr_total_lab_charges').value.length,document.getElementById('sttr_total_lab_charges').value.length);
                                                return false;
                                            }"
                                    onblur="//javascript: document.getElementById('mkg_chrg_label_box').style.visibility = 'hidden';
//                                            if (document.getElementById('slPrItemGSW').value != '') {
//
//                                                return false;
//                                            }
                                    purFormB2MakFunc();return false;"
                                    ondblclick ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                getItemMkgChrgsByWt('itemMkgChrgsSelDiv', 'SellPanel', event.keyCode);
                                            }"
                                    onchange="<?php if ($staffId && ($array['sellMakgingIncreaseCharges'] == 'true')) { ?>
                                                if (this.value < <?php echo $itst_item_cust_lbcrg; ?>) {
                                                    this.value = '<?php echo $itst_item_cust_lbcrg; ?>';
                                                    return false;
                                                }
                                    <?php } ?>"
                                    onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                    onfocus="document.getElementById('mkg_chrg_label_box').style.visibility = 'visible';"
                                    spellcheck="false" autocomplete="off" 
                                    class="form-control form-control-font13 text-center font-dark input-focus" 
                                    size="8" maxlength="10" title=""/>
                            <!-- END CODE for Making Charges apply on GS WT, NT WT or FFine WT @PRIYANKA-28MAR18 -->
                            <div id="itemMkgChrgsSelDiv"></div> 
                        </td>
                        <td class="" width="40%">
                            <select id="sttr_making_charges_type" name="sttr_making_charges_type" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_total_making_charges').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('sttr_making_charges').focus();
                                                return false;
                                            }
                                            purFormB2MakFunc();"
                                    onchange="//javascript: if (document.getElementById('slPrItemLabCharges').value != '') {
//                                                calculateSellPrice();
//                                                return false;
//                                            }
                                             purFormB2MakFunc(); return false; "
                                    class="form-control form-control-font13 text-center " title="" style="width:100%;">
                                        <?php
                                        if ($sttr_making_charges_type != '') {
                                            $itemCustMakChType = array(PP, GM, MG, KG, per, Fixed);
                                            for ($i = 0; $i <= 5; $i++)
                                                if ($itemMkgChType[$i] == $sttr_making_charges_type)
                                                    $optionMkgChTypeSel[$i] = 'selected';
                                        } else {
                                            $optionCustMakChTypeSel[2] = 'selected';
                                        }
                                        ?>
                                <option value="PP" <?php echo $optionMkgChTypeSel[0]; ?>>PP</option>
                                <option value="GM" <?php echo $optionMkgChTypeSel[1]; ?>>GM</option>
                                <option value="MG" <?php echo $optionMkgChTypeSel[2]; ?>>MG</option>                                                                
                                <option value="KG" <?php echo $optionMkgChTypeSel[3]; ?>>KG</option>
                                <option value="per" <?php echo $optionMkgChTypeSel[4]; ?>>%</option>
                                <option value="Fixed" <?php echo $optionMkgChTypeSel[5]; ?>>FX</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <div name="box" id="tot_mkg_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                    TOT MAKING CHARGES
                </div>
                <input id="sttr_total_making_charges" name="sttr_total_making_charges" 
                       type="text" placeholder="TOT MKG CH" 
                       value="<?php echo $sttr_total_making_charges; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_other_charges').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_making_charges_type').focus();
                                   return false;
                               }
                               document.getElementById('valueAdd').value = 'false';"
                       onblur="document.getElementById('tot_mkg_chrg_label_box').style.visibility = 'hidden';"
                       onfocus="document.getElementById('tot_mkg_chrg_label_box').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                    
                       spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" 
                       size="2" maxlength="20" />
            </td>
            <td align="left" title="" class="" colspan="2">
                <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                    <tr>
                        <td title="" align="left">
                            <div name="box" id="oth_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                                OTHER CHARGES
                            </div>
                            <input type="hidden" id="addItemOtherChrgsChanged" name="addItemOtherChrgsChanged" 
                                   value="<?php echo $sttr_other_charges; ?>" />
                            <input id="sttr_other_charges" name="sttr_other_charges" type="text" placeholder="OTH CHRGS" 
                                   value="<?php echo $sttr_other_charges; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('sttr_other_charges_type').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('sttr_total_making_charges').focus();
                                               return false;
                                           }"
                                   onblur="document.getElementById('oth_chrg_label_box').style.visibility = 'hidden';
                                           if (this.value == '') {
                                               this.value = document.getElementById('addItemOtherChrgsChanged').value;
                                           }
                                           if (document.getElementById('sttr_gs_weight').value != '') {
                                               calStockItemPrice();
                                               return false;
                                           }"
                                   onfocus="document.getElementById('oth_chrg_label_box').style.visibility = 'visible';"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"                       
                                   spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus"
                                   maxlength="10" title="" style="width: 107px;"/>
                        </td>
                        <td title="" align="left" class="padLeft3">
                            <select id="sttr_other_charges_type" name="sttr_other_charges_type" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_total_other_charges').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('sttr_other_charges').focus();
                                                document.getElementById('sttr_other_charges').value = '';
                                                return false;
                                            }"
                                    onchange="javascript: if (document.getElementById('sttr_other_charges').value != '') {
                                                calStockItemPrice();
                                                return false;
                                            }"
                                    class="form-control form-control-font13 text-center" title="" style="width:42px;">
                                        <?php
                                        if ($sttr_other_charges_type != '' && $sttr_other_charges_type != null) {
                                            if ($itemSubPanel == 'addByItemsUp' || $itemSubPanel == 'itemsAddUp' || $simItem == 'SimilarItem' ||
                                                    $payPanelName == 'SuppOrderUp' ||
                                                    $panelSimilarDiv == 'SimilarItem' || $UpPanel == 'UpPanel' || $AddItemPanel == 'AddItem') {
                                                $itemOtherChrgsType = array(GM, KG, MG, PP, per, Fixed);
                                                for ($i = 0; $i <= 5; $i++)
                                                    if ($itemOtherChrgsType[$i] == $sttr_other_charges_type)
                                                        $optionOtherChargesTypeSel[$i] = 'selected';
                                            }
                                        } else {
                                            $optionOtherChargesTypeSel[0] = 'selected';
                                        }
                                        ?>
                                <option value="GM" <?php echo $optionOtherChargesTypeSel[0]; ?>>GM</option>
                                <option value="KG" <?php echo $optionOtherChargesTypeSel[1]; ?>>KG</option>
                                <option value="MG" <?php echo $optionOtherChargesTypeSel[2]; ?>>MG</option>
                                <option value="PP" <?php echo $optionOtherChargesTypeSel[3]; ?>>PP</option>
                                <option value="per" <?php echo $optionOtherChargesTypeSel[4]; ?>>%</option>
                                <option value="Fixed" <?php echo $optionOtherChargesTypeSel[5]; ?>>FX</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="left" title="" width="90px;" colspan="2">
                <div name="box" id="tot_oth_chrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                    TOT OTH CHRGS
                </div>
                <input id="sttr_total_other_charges" name="sttr_total_other_charges" 
                       type="text" value="<?php echo $sttr_total_cust_price; ?>" 
                       placeholder="TOT OTH CHRG" 
                       onkeydown="// document.getElementById('valueAdd').value = 'false';
                               javascript: if(event.ctrlKey && event.keyCode == 13){
                                   document.getElementById('add_item').submit(); 
                                   return false;
                               } else if (event.keyCode == 13) {
                                   document.getElementById('addInvItemSubButt').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_other_charges_type').focus();
                                   return false;
                               }"
                       onblur="javascript: document.getElementById('tot_oth_chrg_label_box').style.visibility = 'hidden';
                               if (document.getElementById('sttr_gs_weight').value != '') {
                                   calStockItemPrice();
                                   return false;
                               }
                               disableField1();"
                       onfocus="document.getElementById('tot_oth_chrg_label_box').style.visibility = 'visible'"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                    
                       spellcheck="false" class="form-control form-control-font13 text-center font-dark input-focus" 
                       size="10" maxlength="30" />
            </td>
            <td colspan="1"></td>
            <td>
                <a style="cursor: pointer;" 
                   onclick ="getStockCrystalFunc('', 'crystalAddDiv', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>','');">
                    <table border="0" cellspacing="2" cellpadding="0" width="100%" align="left">
                        <tr>
                            <?php //if($payPanelName != 'UpdateItem' && $payPanelName != 'InvoicePayUp') {   ?>
                            <td valign="middle" align="right">
                                <img src="<?php echo $documentRootBSlash; ?>/images/img/diamond-icon.png" 
                                     alt="" style="padding-top: 5px;"
                                     onload="<?php if ($payPanelName == 'UpdateItem' || $payPanelName != 'InvoicePayUp') { ?>
                               purFormB2CalFunc();
                               calcItemCryPrice();
                               return false;
                                         <?php //}  ?>"/>
                                </td>
                                <td>
                                    <b>STONE</b>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="16">
                <div id="crystalAddDiv">
                    <?php
                    if ($payPanelName == 'InvoicePayment' || $payPanelName == 'UpdateItem' ||
                            $payPanelName == 'InvoicePayUp') {

                        if ($noOfCry > 0) {

                            include 'ogwhcrdv.php';
                        }
                    }
                    ?>
                </div>
            </td>
        </tr>
<!--        <tr>
            <td align="left" class="paddingTopBott10" colspan="16">
                <div class="hrGrey"></div>
            </td>
        </tr>-->
        <tr>
            <td align="center" colspan="16">
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                        <td align="right" width="48%">
                            <div id="addItemSimButtDiv" title="Shortcut Key(+ key) !">

                            </div>
                            <div id="addItemExItButtDiv" title="Shortcut Key(+ key) !">

                            </div>
                        </td>
                        <td align="left" width="20px" title="Shortcut Key(Ctrl + Enter) !">
                            <div id="addItemSubButtDiv">
                                <input type="submit" value="<?php
                                if ($payPanelName == 'UpdateItem' || $payPanelName == 'InvoicePayUp' ||
                                        $payPanelName == 'ItemApprovalRecUp')
                                    echo 'UPDATE ITEM';
                                else
                                    echo 'SUBMIT';
                                ?>" 
                                       class="btn btn-info" id="addInvItemSubButt" 
                                       maxlength="30" size="15" 
                                       style="height:30px;width:150px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color: #006400;background: #D8F6D8;border: 1px solid #76c176;border-radius:5px!important; "
                                       onclick="getCRDRAccountID('<?php echo $custId; ?>', document.getElementById('firmId').value, '', document.getElementById('sttr_account_id').value);" 
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_item_category1').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('sttr_total_other_charges').focus();
                                                  return false;
                                            }"/>
                            </div>  
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div id="SetPurityMainDiv"></div>