<?php
/*
 * **************************************************************************************
 * @tutorial: ADD CRYSTAL DIV @Author:PRIYANKA-14MAR19
 * **************************************************************************************
 * 
 * Created on MAR 12, 2019 15:14:33 PM
 *
 * @FileName: omrwwacydv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
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
//<!--***************************************************************-->
//    <!-- FORM LAYOUT CHANGES: AUTHOR @DARSHANA 2 SEPT 2021-->
//    <!--***************************************************************-->
// Crystal Count @Author:PRIYANKA-14MAR19
if ($crystalCount == '')
    $crystalCount = $_REQUEST['crystalCount'];
//
if ($crystalCount == '')
    $crystalCount = 1;
//
// Crystal Quantity @Author:PRIYANKA-14MAR19
if ($cryQty == '')
    $cryQty = 1;
//
if ($commonPanel == '')
    $commonPanel = $_GET['commonPanel'];
//
if (($sttr_tot_price_cgst_per == '' || $sttr_tot_price_sgst_per == '') &&
        $sttr_tot_price_igst_per == '') {
    //$sttr_tot_price_cgst_per = 0.125;
    //$sttr_tot_price_sgst_per = 0.125;
}
//
// Weight And Weight Type @Author:PRIYANKA-14MAR19
$wtId = 'sttr_nt_weight';
$wtTypeId = 'sttr_nt_weight_type';
//
//
?>
<input id="del<?php echo $crystalCount; ?>" name="del<?php echo $crystalCount; ?>" 
       value="<?php echo $crystalCount; ?>" type="hidden" />

<div id="crystal<?php echo $crystalCount; ?>" name="crystal<?php echo $crystalCount; ?>">
    <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%" class="orangbg margtp10" style="border: 1px dashed #ff6e6e;border-bottom:0">
        <tr>
            <td class="padBott2" width="100%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" >
                    <tr>
                        <!-----------Start Crystal Id @Author:PRIYANKA-14MAR19------------------->
                        <td width="20%">
                            <table border="0" cellspacing="1" cellpadding="1" width="100%">
                                <tr>
                                    <td align="left" width="50%">
                                        <div name="box" id="category_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            CATEGORY
                                        </div>
                                        <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
                                        <input type="hidden" id="addItemCryCount" name="addItemCryCount" value="<?php echo $crystalCount; ?>"/>

                                        <!-------------- Start Code to Define New Hidden inputs @Author:PRIYANKA-14MAR19 ------------>
                                        <input id="sttr_indicator<?php echo $crystalCount; ?>" name="sttr_indicator<?php echo $crystalCount; ?>" value="stockCrystal" type="hidden" />
                                        <input type="hidden" id="sttr_bc_print_status" name="sttr_bc_print_status" value="No" />
                                        <input type="hidden" id="sttr_sell_status" name="sttr_sell_status" value="No" />

                                        <?php
                                        //
                                        //echo '$commonPanel ==  : ' . $commonPanel . '<br />';
                                        //
                                        if ($commonPanel == 'assignOrderPanel') {
                                            ?>
                                            <input type="hidden" id="sttr_assign_status<?php echo $crystalCount; ?>" 
                                                   name="sttr_assign_status<?php echo $crystalCount; ?>" value="ASSIGNED"/> 
                                               <?php } ?>

                                        <!-------------- End Code to Define New Hidden inputs @Author:PRIYANKA-14MAR19 ------------>                                                                        
                                        <input id="tableMainId<?php echo $crystalCount; ?>" name="tableMainId<?php echo $crystalCount; ?>" value="<?php echo $stocCryId; ?>" type="hidden" />
                                        <input id="itstCryId<?php echo $crystalCount; ?>" name="itstCryId<?php echo $crystalCount; ?>" value="<?php echo $itstCryId; ?>" type="hidden" />
                                        <input id="crystalDiv<?php echo $crystalCount; ?>" name="crystalDiv<?php echo $crystalCount; ?>" type="hidden"/>
                                        <input type="hidden" id="cryShorcut" name="cryShorcut" value="<?php echo $mainPanel; ?>"/>
                                        <input type="hidden" id="sttr_stone_less_wt_by" name="sttr_stone_less_wt_by" value="<?php echo $sttr_stone_less_wt_by; ?>"/>

                                        <input id="sttr_item_category<?php echo $crystalCount; ?>" name="sttr_item_category<?php echo $crystalCount; ?>" type="text" placeholder="CRYSTAL ID" value="<?php echo $cryId; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           crystalPanelBlank('cryIdSelectDiv<?php echo $crystalCount; ?>');
                                                           document.getElementById('sttr_item_name<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {<?php if ($crystalCount == 1) { ?>crystalPanelBlank('cryIdSelectDiv<?php echo $crystalCount; ?>');
                                                               document.getElementById('addStockCustItemLabChargesType').focus();
                                                               return false;<?php } else { ?>crystalPanelBlank('cryIdSelectDiv<?php echo $crystalCount; ?>');
                                                               document.getElementById('sttr_valuation<?php echo $crystalCount - 1; ?>').focus();
                                                               return false;<?php } ?>
                                                       }"
                                               onclick="this.value = '';
                                                       crystalPanelBlank('cryIdSelectDiv<?php echo $crystalCount; ?>');"
                                               onkeyup ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                           showCrystalList(this.value, event.keyCode, 'addItemCryId', '<?php echo $crystalCount; ?>', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>', 'CrystalPanel', '');
                                                       }"
                                               onblur="document.getElementById('category_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                       if (this.value == '')
                                                           this.value = '<?php echo $cryId; ?>'"
                                               onfocus="document.getElementById('category_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="18" maxlength="15" />
                                        <div id="cryIdSelectDiv<?php echo $crystalCount; ?>"></div>
                                    </td>

                                    <td align="left" class="padLeft5" width="50%">
                                        <div name="box" id="name_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            NAME
                                        </div>
                                        <input id="sttr_item_name<?php echo $crystalCount; ?>" name="sttr_item_name<?php echo $crystalCount; ?>" type="text" placeholder="CRYSTAL NAME" value="<?php echo $cryName; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           crystalPanelBlank('cryNameSelectDiv<?php echo $crystalCount; ?>');
                                                           document.getElementById('sttr_clarity<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           crystalPanelBlank('cryNameSelectDiv<?php echo $crystalCount; ?>');
                                                           document.getElementById('sttr_item_category<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onclick="this.value = '';
                                                       crystalPanelBlank('cryNameSelectDiv<?php echo $crystalCount; ?>');"
                                               onblur="document.getElementById('name_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                       if (this.value == '') {
                                                           this.value = '<?php echo $cryName; ?>';
                                                       }"
                                               onkeyup ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                           showCrystalList(this.value, event.keyCode, 'addItemCryName', '<?php echo $crystalCount; ?>', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>', 'CrystalPanel', document.getElementById('sttr_item_category<?php echo $crystalCount; ?>').value);
                                                       }"
                                               onfocus="document.getElementById('name_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="18" maxlength="25" />
                                        <div id="cryNameSelectDiv<?php echo $crystalCount; ?>"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-----------End Crystal Id @Author:PRIYANKA-14MAR19------------------->
                        
                        <td align="left" valign="top" width="80%">
                            <table border="0" cellspacing="1" cellpadding="1" width="100%">
                                <tr>
                                    <td align="left"  width="8%">
                                        <div name="box" id="clarity_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            CLARITY
                                        </div>
                                        <input id="sttr_clarity<?php echo $crystalCount; ?>" name="sttr_clarity<?php echo $crystalCount; ?>" type="text" placeholder="CLARITY" value="<?php echo $cryClarity; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_color<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_item_name<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="document.getElementById('clarity_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';"
                                               onfocus="document.getElementById('clarity_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="20" />
                                    </td>

                                    <td align="left"  width="8%">
                                        <div name="box" id="color_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            COLOR
                                        </div>
                                        <input id="sttr_color<?php echo $crystalCount; ?>" name="sttr_color<?php echo $crystalCount; ?>" type="text" placeholder="COLOR" value="<?php echo $cryColor; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_size<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_clarity<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="document.getElementById('color_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';"
                                               onfocus="document.getElementById('color_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="20" />
                                    </td>

                                    <td align="left"  width="8%">
                                        <div name="box" id="size_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            SIZE
                                        </div>
                                        <input id="sttr_size<?php echo $crystalCount; ?>" name="sttr_size<?php echo $crystalCount; ?>" type="text" placeholder="SIZE" value="<?php echo $crySize; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_shape<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_color<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="document.getElementById('size_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';"
                                               onfocus="document.getElementById('size_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="20" />
                                    </td>

                                    <td align="left"  width="8%">
                                        <div name="box" id="shape_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            SHAPE
                                        </div>
                                        <input id="sttr_shape<?php echo $crystalCount; ?>" name="sttr_shape<?php echo $crystalCount; ?>" type="text" placeholder="SHAPE" value="<?php echo $cryShape; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_other_info<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_size<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="document.getElementById('shape_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';"
                                               onfocus="document.getElementById('shape_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="20" />
                                    </td>

                                    <td align="left"  width="10%">
                                        <div name="box" id="other_info_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            OTHER INFO
                                        </div>
                                        <input id="sttr_other_info<?php echo $crystalCount; ?>" name="sttr_other_info<?php echo $crystalCount; ?>" type="text" placeholder="OTHER INFO" value="<?php echo $cryOtherInfo; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_quantity<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_shape<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="document.getElementById('other_info_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';"
                                               onfocus="document.getElementById('other_info_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="40" />
                                    </td>

                                    <td align="left"  width="5%">
                                        <div name="box" id="stone_qty_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            QTY
                                        </div>
                                        <input id="sttr_quantity<?php echo $crystalCount; ?>" name="sttr_quantity<?php echo $crystalCount; ?>" type="text" placeholder="QTY" value="<?php echo $cryQty; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_gs_weight_<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_other_info<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }"
                                               onblur="javascript:document.getElementById('stone_qty_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                       calcRawMetalCrystalVal();
                                                       return false;"    
                                               onkeypress="javascript:return valKeyPressedForNumber(event);"
                                               onfocus="document.getElementById('stone_qty_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="1" maxlength="15" />
                                    </td>

                                    <td width="15%" align="left">
                                        <div name="box" id="stone_gswt_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            GROSS WEIGHT
                                        </div>
                                        <div class="floatLeft padLeft3" style="margin-top:2px;width:50%">
                                            <input id="sttr_gs_weight_<?php echo $crystalCount; ?>" name="sttr_gs_weight<?php echo $crystalCount; ?>" type="text" placeholder="GS WT" value="<?php echo $cryGSW; ?>"
                                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                               document.getElementById('sttr_gs_weight_type<?php echo $crystalCount; ?>').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('sttr_quantity<?php echo $crystalCount; ?>').focus();
                                                               return false;
                                                           }"
                                                   onblur="javascript: document.getElementById('stone_gswt_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                           if (document.getElementById('sttr_gs_weight_<?php echo $crystalCount; ?>').value != '') {
                                                               calcRawMetalCrystalVal();
                                                               return false;
                                                           }"
                                                   onfocus="document.getElementById('stone_gswt_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                                   onchange="javascript:autoLessWeightStockCrystalFunc('<?php echo $crystalCount; ?>', document.getElementById('slPrAutoLessCryWt<?php echo $crystalCount; ?>').value, '<?php echo $wtId; ?>', '<?php echo $wtTypeId; ?>', '', 'AddStock');"
                                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"   
                                                   onkeyup="calcRawMetalCrystalVal();
                                                           calRawMetalFinVal();"   
                                                   autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="7" maxlength="15" />
                                        </div>

                                        <div class="floatLeft padLeft3" style="margin-top:2px;width:30%">  
                                            <select id="sttr_gs_weight_type<?php echo $crystalCount; ?>" name="sttr_gs_weight_type<?php echo $crystalCount; ?>" 
                                                    onkeydown="javascript:if (event.keyCode == 13) {
                                                                document.getElementById('slPrAutoLessCryWt<?php echo $crystalCount; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('sttr_gs_weight_<?php echo $crystalCount; ?>').focus();
                                                                return false;
                                                            }"
                                                    onchange="javascript:getCryRateTypByGsWt(document.getElementById('sttr_gs_weight_type<?php echo $crystalCount; ?>').value,
                                                                    '<?php echo $crystalCount; ?>', document.getElementById('sttr_purchase_rate<?php echo $crystalCount; ?>').value,
                                                                    document.getElementById('sttr_purchase_rate_type<?php echo $crystalCount; ?>').value, 'RawMetalPanel', '<?php echo $documentRootBSlash; ?>');
                                                            autoLessWeightStockCrystalFunc('<?php echo $crystalCount; ?>', document.getElementById('slPrAutoLessCryWt<?php echo $crystalCount; ?>').value, '<?php echo $wtId; ?>', '<?php echo $wtTypeId; ?>', '', 'AddStock');"
                                                    class="form-control text-center form-control-font13">
                                                        <?php
                                                        if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
                                                            $cryGsWtType = array('CT', 'KG', 'GM', 'MG');
                                                            for ($i = 0; $i <= 3; $i++)
                                                                if ($cryGsWtType[$i] == $cryGSWT)
                                                                    $cryGsWtTypeSel[$i] = 'selected';
                                                        } else {
                                                            $cryGsWtTypeSel[0] = 'selected';
                                                        }
                                                        ?>
                                                <option value="CT"<?php echo $cryGsWtTypeSel[0]; ?>>CT</option>
                                                <option value="KG"<?php echo $cryGsWtTypeSel[1]; ?>>KG</option>
                                                <option value="GM"<?php echo $cryGsWtTypeSel[2]; ?>>GM</option>
                                                <option value="MG"<?php echo $cryGsWtTypeSel[3]; ?>>MG</option>
                                                <?php $cryGsWtTypeSel = ""; ?>
                                            </select>
                                        </div>

                                        <div class="floatLeft padLeft3" width="20%">

                                            <?php if ($cryAutoWTChk == 'on') { ?>
                                                <input type="hidden" id="sttr_wt_auto_less<?php echo $crystalCount; ?>" name="sttr_wt_auto_less<?php echo $crystalCount; ?>" value="on" class="checkbox">
                                            <?php } else { ?>
                                                <input type="hidden" id="sttr_wt_auto_less<?php echo $crystalCount; ?>" name="sttr_wt_auto_less<?php echo $crystalCount; ?>" value="off" class="checkbox">
                                            <?php } ?>
                                            <?php
                                            //$checked = "";

                                            if ($cryAutoWTChk == 'on')
                                                $checked = "checked";
                                            else
                                                $checked = "unchecked";

                                            //echo '$cryAutoWTChk == '.$cryAutoWTChk.'<br />';
                                            //echo '$checked == '.$checked.'<br />';
                                            ?>

                                            <input type="checkbox" id="slPrAutoLessCryWt<?php echo $crystalCount; ?>" name="sttr_wt_auto_less<?php echo $crystalCount; ?>" class="checkbox" style="margin-top:8px;"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               document.getElementById('sttr_purchase_rate<?php echo $crystalCount; ?>').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8) {
                                                               document.getElementById('sttr_gs_weight_type<?php echo $crystalCount; ?>').focus();
                                                               return false;
                                                           }"
                                                   onchange="javascript:autoLessWeightStockCrystalFunc('<?php echo $crystalCount; ?>', this.checked, '<?php echo $wtId; ?>', '<?php echo $wtTypeId; ?>', '', 'AddStock');"
                                                   onclick="if (!this.checked) {
                                                               document.getElementById('sttr_wt_auto_less<?php echo $crystalCount; ?>').value = 'off';
                                                           } else {
                                                               document.getElementById('sttr_wt_auto_less<?php echo $crystalCount; ?>').value = 'on';
                                                           }"                                               
                                                   <?php
                                                   echo $cryAutoWTChk;
                                                   echo " " . $checked . " ";
                                                   ?> title="LESS CRYSTAL WT FROM GS WT"/>
                                        </div>
                                    </td>

                                    <td align="left" width="12%">
                                        <div name="box" id="pur_rate_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            PURCHASE RATE
                                        </div>
                                        <div id="addStockCryRateDiv<?php echo $crystalCount; ?>">
                                            <div class="floatLeft padLeft3" style="width:60%">
                                                <input id="sttr_purchase_rate<?php echo $crystalCount; ?>" name="sttr_purchase_rate<?php echo $crystalCount; ?>" type="text" placeholder="RATE" 
                                                       value="<?php echo $cryRate; ?>"
                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                   document.getElementById('sttr_purchase_rate_type<?php echo $crystalCount; ?>').focus();
                                                                   return false;
                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                   document.getElementById('slPrAutoLessCryWt<?php echo $crystalCount; ?>').focus();
                                                                   return false;
                                                               }"
                                                       onblur="document.getElementById('pur_rate_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                               calcRawMetalCrystalVal();
                                                               return false;" 
                                                       onfocus="document.getElementById('pur_rate_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                
                                                       autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="10" maxlength="20" />
                                            </div>

                                            <div class="floatLeft padLeft3" style="width:40%">
                                                <select id="sttr_purchase_rate_type<?php echo $crystalCount; ?>" name="sttr_purchase_rate_type<?php echo $crystalCount; ?>" 
                                                        onkeydown="javascript:if (event.keyCode == 13) {
                                                                    document.getElementById('sttr_sell_rate<?php echo $crystalCount; ?>').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('sttr_purchase_rate<?php echo $crystalCount; ?>').focus();
                                                                    document.getElementById('sttr_purchase_rate<?php echo $crystalCount; ?>').value = '';
                                                                    return false;
                                                                }"
                                                        onblur="calcRawMetalCrystalVal();
                                                                return false;"  
                                                        onchange="calcRawMetalCrystalVal();"
                                                        class="form-control text-center form-control-font13">
                                                            <?php
                                                            if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
                                                                $rateType = array('KG', 'GM', 'MG', 'CT', 'PP');
                                                                for ($i = 0; $i <= 4; $i++)
                                                                    if ($rateType[$i] == $cryRateType)
                                                                        $optCryRateTypeSel[$i] = 'selected';
                                                            } else {
                                                                $optCryRateTypeSel[3] = "selected";
                                                            }
                                                            ?>
                                                    <option value="KG" <?php echo $optCryRateTypeSel[0]; ?>>KG</option>
                                                    <option value="GM" <?php echo $optCryRateTypeSel[1]; ?>>GM</option>
                                                    <option value="MG" <?php echo $optCryRateTypeSel[2]; ?>>MG</option>
                                                    <option value="CT" <?php echo $optCryRateTypeSel[3]; ?>>CT</option>
                                                    <option value="PP" <?php echo $optCryRateTypeSel[4]; ?>>PP</option>
                                                    <?php $optCryRateTypeSel = ""; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                       <td align="left" width="12%">
                                        <div name="box" id="sell_rate_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            SELL RATE
                                        </div>
                                        <div id="addStockCryRateDiv<?php echo $crystalCount; ?>">
                                            <div class="floatLeft padLeft3" style="width:60%">
                                                <input id="sttr_sell_rate<?php echo $crystalCount; ?>" name="sttr_sell_rate<?php echo $crystalCount; ?>" type="text" 
                                                       placeholder="SELL RATE" value="<?php echo $sttr_sell_rate; ?>"
                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                   document.getElementById('sttr_sell_rate_type<?php echo $crystalCount; ?>').focus();
                                                                   return false;
                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                   document.getElementById('sttr_purchase_rate_type<?php echo $crystalCount; ?>').focus();
                                                                   return false;
                                                               }"  
                                                       onblur="document.getElementById('sell_rate_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                               calcRawMetalCrystalVal();
                                                               return false;"    
                                                       onfocus="document.getElementById('sell_rate_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                
                                                       autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="10" maxlength="20" />
                                            </div>

                                            <div class="floatLeft padLeft3" style="width:40%">
                                                <select id="sttr_sell_rate_type<?php echo $crystalCount; ?>" name="sttr_sell_rate_type<?php echo $crystalCount; ?>" 
                                                        onkeydown="javascript:if (event.keyCode == 13) {
                                                                    document.getElementById('sttr_valuation<?php echo $crystalCount; ?>').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('sttr_sell_rate<?php echo $crystalCount; ?>').focus();
                                                                    document.getElementById('sttr_sell_rate<?php echo $crystalCount; ?>').value = '';
                                                                    return false;
                                                                }"
                                                        class="form-control text-center form-control-font13">
                                                            <?php
                                                            if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
                                                                $sellRateType = array('KG', 'GM', 'MG', 'CT', 'PP');
                                                                for ($i = 0; $i <= 4; $i++)
                                                                    if ($sellRateType[$i] == $sttr_sell_rate_type)
                                                                        $sellOptCryRateTypeSel[$i] = 'selected';
                                                            } else {
                                                                $sellOptCryRateTypeSel[3] = "selected";
                                                            }
                                                            ?>
                                                    <option value="KG"<?php echo $sellOptCryRateTypeSel[0]; ?>>KG</option>
                                                    <option value="GM"<?php echo $sellOptCryRateTypeSel[1]; ?>>GM</option>
                                                    <option value="MG"<?php echo $sellOptCryRateTypeSel[2]; ?>>MG</option>
                                                    <option value="CT"<?php echo $sellOptCryRateTypeSel[3]; ?>>CT</option>
                                                    <option value="PP"<?php echo $sellOptCryRateTypeSel[4]; ?>>PP</option>
                                                    <?php $sellOptCryRateTypeSel = ""; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </td>

                                    <td align="left" class="padLeft3" width="20%">
                                        <div name="box" id="stone_val_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                                            VALUATION
                                        </div>
                                        <input id="sttr_valuation<?php echo $crystalCount; ?>" name="sttr_valuation<?php echo $crystalCount; ?>" type="text" placeholder="VALUATION" value="<?php echo $cryVal; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('sttr_tot_price_cgst_per<?php echo $crystalCount; ?>').focus();
                                                           document.getElementById('sttr_tot_price_cgst_per<?php echo $crystalCount; ?>').value = '';
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('sttr_sell_rate_type<?php echo $crystalCount; ?>').focus();
                                                           return false;
                                                       }" 
                                               onblur="document.getElementById('stone_val_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                                       calcRawMetalCrystalVal();
                                                       return false;" 
                                               onfocus="document.getElementById('stone_val_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                
                                               autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="14" maxlength="20" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                </table>
            </td>
        </tr>
    </table>

    <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%" class="orangbg" style="border: 1px dashed #ff6e6e;border-top:0">
        <tr>
            <td align="left" width="150px"></td>
            <td align="left" width="160px"></td>

            <td align="left" class="padLeft3" width="40px">
                <div name="box" id="stone_cgst_per_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    CGST %
                </div>
                <input  id = "sttr_tot_price_cgst_per<?php echo $crystalCount; ?>" name = "sttr_tot_price_cgst_per<?php echo $crystalCount; ?>" 
                        type="text" placeholder="CGST %" autocomplete="off" spellcheck="false" 
                        value="<?php echo $sttr_tot_price_cgst_per; ?>"
                        onkeydown="javascript:if (event.keyCode == 13) {
                                    document.getElementById('sttr_tot_price_cgst_chrg<?php echo $crystalCount; ?>').focus();
                                    return false;
                                } else if (event.keyCode == 8 && this.value == '') {
                                    document.getElementById('sttr_valuation<?php echo $crystalCount; ?>').focus();
                                    document.getElementById('sttr_valuation<?php echo $crystalCount; ?>').value = '';
                                    return false;
                                }"
                        onblur="javascript: document.getElementById('stone_cgst_per_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                                calcRawMetalCrystalVal();
                                return false;"    
                        onfocus="document.getElementById('stone_cgst_per_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                        onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                        class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="50px">
                <div name="box" id="stone_cgst_amt_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    CGST AMT
                </div>
                <input id = "sttr_tot_price_cgst_chrg<?php echo $crystalCount; ?>" name = "sttr_tot_price_cgst_chrg<?php echo $crystalCount; ?>" 
                       type="text" placeholder="CGST AMT" autocomplete="off" spellcheck="false"
                       value="<?php echo $sttr_tot_price_cgst_chrg; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('sttr_tot_price_sgst_per<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_sgst_per<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_price_cgst_per<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_cgst_per<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"
                       onblur="javascript: document.getElementById('stone_cgst_amt_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;" 
                       onfocus="document.getElementById('stone_cgst_amt_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="50px">
                <div name="box" id="stone_sgst_per_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    SGST %
                </div>
                <input id = "sttr_tot_price_sgst_per<?php echo $crystalCount; ?>" name = "sttr_tot_price_sgst_per<?php echo $crystalCount; ?>" 
                       type="text" placeholder="SGST %" autocomplete="off" spellcheck="false" 
                       value="<?php echo $sttr_tot_price_sgst_per; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('sttr_tot_price_sgst_chrg<?php echo $crystalCount; ?>').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_price_cgst_chrg<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_cgst_chrg<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"
                       onblur="javascript: document.getElementById('stone_sgst_per_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;" 
                       onfocus="document.getElementById('stone_sgst_per_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="50px">
                <div name="box" id="stone_sgst_amt_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    SGST AMT
                </div>
                <input id = "sttr_tot_price_sgst_chrg<?php echo $crystalCount; ?>" name = "sttr_tot_price_sgst_chrg<?php echo $crystalCount; ?>" 
                       type="text" placeholder="SGST AMT" autocomplete="off" spellcheck="false"
                       value="<?php echo $sttr_tot_price_sgst_chrg; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('sttr_tot_price_igst_per<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_igst_per<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_price_sgst_per<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_sgst_per<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"
                       onblur="javascript: document.getElementById('stone_sgst_amt_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;"  
                       onfocus="document.getElementById('stone_sgst_amt_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="50px">
                <div name="box" id="stone_igst_per_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    IGST %
                </div>
                <input id = "sttr_tot_price_igst_per<?php echo $crystalCount; ?>" name = "sttr_tot_price_igst_per<?php echo $crystalCount; ?>" 
                       type="text" placeholder="IGST %" autocomplete="off" spellcheck="false" 
                       value="<?php echo $sttr_tot_price_igst_per; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('sttr_tot_price_igst_chrg<?php echo $crystalCount; ?>').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_price_sgst_chrg<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_sgst_chrg<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"
                       onblur="javascript: document.getElementById('stone_igst_per_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;"   
                       onfocus="document.getElementById('stone_igst_per_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="50px">
                <div name="box" id="stone_igst_amt_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    IGST AMT
                </div>
                <input id = "sttr_tot_price_igst_chrg<?php echo $crystalCount; ?>" name = "sttr_tot_price_igst_chrg<?php echo $crystalCount; ?>" 
                       type="text" placeholder="IGST AMT" autocomplete="off" spellcheck="false"
                       value="<?php echo $sttr_tot_price_igst_chrg; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('sttr_tot_tax<?php echo $crystalCount; ?>').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_price_igst_per<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_igst_per<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"
                       onblur="javascript:document.getElementById('stone_igst_amt_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;"  
                       onfocus="document.getElementById('stone_igst_amt_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="50px">
                <div name="box" id="stone_tot_tax_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    TOTAL TAX
                </div>
                <input id = "sttr_tot_tax<?php echo $crystalCount; ?>" name = "sttr_tot_tax<?php echo $crystalCount; ?>" 
                       type="text" placeholder="TOT TAX" autocomplete="off" spellcheck="false"
                       value="<?php echo $sttr_tot_tax; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('sttr_final_valuation<?php echo $crystalCount; ?>').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_price_igst_chrg<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_price_igst_chrg<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"
                       onblur="javascript: document.getElementById('stone_tot_tax_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;"  
                       onfocus="document.getElementById('stone_tot_tax_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="left" class="padLeft3" width="100px">
                <div name="box" id="stone_final_val_label_box<?php echo $crystalCount; ?>" class="hidden_box" style="visibility:hidden;"> 
                    FINAL VALUATION
                </div>
                <input id = "sttr_final_valuation<?php echo $crystalCount; ?>" name = "sttr_final_valuation<?php echo $crystalCount; ?>" 
                       type="text" placeholder="FINAL VALUATION" autocomplete="off" spellcheck="false"
                       value="<?php echo $sttr_final_valuation; ?>"
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   document.getElementById('addStockItemCategory').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_tot_tax<?php echo $crystalCount; ?>').focus();
                                   document.getElementById('sttr_tot_tax<?php echo $crystalCount; ?>').value = '';
                                   return false;
                               }"   
                       onblur="javascript: document.getElementById('stone_final_val_label_box<?php echo $crystalCount; ?>').style.visibility = 'hidden';
                               calcRawMetalCrystalVal();
                               return false;"
                       onfocus="document.getElementById('stone_final_val_label_box<?php echo $crystalCount; ?>').style.visibility = 'visible';"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       class="form-control text-center form-control-font13" size="14" maxlength="20" />
            </td>

            <td align="center" width="10px" class="padLeft3">
                <a style="cursor: pointer;" 
                   onclick="if (document.getElementById('crystalDiv<?php echo $crystalCount; ?>').value == '' || document.getElementById('crystalDiv<?php echo $crystalCount; ?>').value == 'true') {
                               getStockCrystalDivFunc('<?php echo $crystalCount + 1; ?>', 'crystalAddDiv', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>');
                               return false;
                           }
                   ">
                    <img src="<?php echo $documentRootBSlash; ?>/images/img/add.png" style="height:15px;"
                         alt="Click Here To Add Crystal" class="marginTop5" />
                </a>
            </td>

            <td align="center" width="10px" class="padLeft3">
                <a style="cursor: pointer;" 
                   onclick ="closeStockCrystalDivFunc('<?php echo $crystalCount; ?>', '<?php echo $mainPanelDiv; ?>', '<?php echo $stocCryId; ?>', '<?php echo $itstCryId; ?>', '<?php echo $stocCryId; ?>', '<?php echo $wtId; ?>', '<?php echo $wtTypeId; ?>', '<?php echo $rawPanelName; ?>', '<?php echo $documentRootBSlash; ?>');
                             calcRawMetalCrystalVal();
                             calRawMetalFinVal();
                   ">
                    <img src="<?php echo $documentRootBSlash; ?>/images/img/trash.png" alt="delete" class="marginTop5" style="height:15px;"/>
                </a>
            </td>
        </tr>
    </table>
</div>

<div id = "crystalAddDiv<?php echo $crystalCount + 1; ?>"></div>
