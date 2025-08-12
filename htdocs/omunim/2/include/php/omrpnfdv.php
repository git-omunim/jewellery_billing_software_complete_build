<?php
/*
 * **************************************************************************************
 * @tutorial: ADD WHOLEASLE STOCK CRYSTAL DIV
 * **************************************************************************************
 * 
 * Created on Jan 20, 2016 2:53:33 PM
 *
 * @FileName: omrpnfdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
?>
<?php
if ($crystalCount == '')
    $crystalCount = $_REQUEST['crystalCount'];

if ($crystalCount == '' || $crystalCount == NULL)
    $crystalCount = 1;

if ($cryQty == '')
    $cryQty = 1;

if ($commonPanel == '')
    $commonPanel = $_GET['commonPanel'];
?>
<input id="del<?php echo $crystalCount; ?>" name="del<?php echo $crystalCount; ?>" 
       value="<?php echo $crystalCount; ?>" type="hidden" />
<div id="crystal<?php echo $crystalCount; ?>" name="crystal<?php echo $crystalCount; ?>">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" class="paddingTopBott5" colspan="18">
                <!--<div class="hrGrey"></div>-->
            </td>
        </tr>
        <tr>
        <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
        <input type="hidden" id="addItemCryCount" name="addItemCryCount" value="<?php echo $crystalCount; ?>"/>

        <!-------------- Start Code to Define New Hidden inputs ------------>
        <input id="sttr_indicator<?php echo $crystalCount; ?>" name="sttr_indicator<?php echo $crystalCount; ?>" value="stockCrystal" type="hidden" />
        <input type="hidden" id="sttr_bc_print_status" name="sttr_bc_print_status" value="No" />
        <input type="hidden" id="sttr_sell_status" name="sttr_sell_status" value="No" />                                       
        <!-------------- End Code to Define New Hidden inputs ------------>                                                                        

        <input id="tableMainId<?php echo $crystalCount; ?>" name="tableMainId<?php echo $crystalCount; ?>" value="<?php echo $stocCryId; ?>" type="hidden" />
        <input id="itstCryId<?php echo $crystalCount; ?>" name="itstCryId<?php echo $crystalCount; ?>" value="<?php echo $itstCryId; ?>" type="hidden" />
        <input id="crystalDiv<?php echo $crystalCount; ?>" name="crystalDiv<?php echo $crystalCount; ?>" type="hidden"/>
        <input type="hidden" id="cryShorcut" name="cryShorcut" value="<?php echo $mainPanel; ?>"/>                                        

        <td align="left" title="METAL" class="textLabel12CalibriBrown">
            <div id="itemTypeDiv">
                <input id="sttr_metal_type" name="sttr_metal_type" type="text" 
                       placeholder="METAL TYPE" style="text-align: center;"
                       value="<?php
                       if ($sttr_metal_type != '')
                           echo $sttr_metal_type;
                       else
                           echo 'Gold';
                       ?>"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   clearDivision('metalSelectDiv');
                                   document.getElementById('sttr_item_category').value = '';
                                   document.getElementById('sttr_item_category').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   clearDivision('metalSelectDiv');
                                   document.getElementById('firmId').focus();
                                   return false;
                               }"
                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   getMetalType('metalSelectDiv', 'sttr_metal_type', event.keyCode, 'RepairPanel', '<?php echo $custId; ?>', 'RepairPanel');
                               }"
                       onclick="this.value = '';"
                       onblur="if (this.value == '') {
                                   this.value = '<?php echo $sttr_metal_type; ?>';
                               }"
                       autocomplete="off" spellcheck="false" class="form-control-height20 placeholderClass" 
                       size="5" maxlength="80" />
                <div id="metalSelectDiv" class="itemListDivToAddStock placeholderClass"></div>
            </div>
        </td>

        <td align="left" title="CATEGORY" class="textLabel12CalibriBrown">
            <input id="sttr_item_category" name="sttr_item_category"  
                   value="<?php echo $sttr_item_category; ?>"
                   type="text" placeholder="CATEGORY" 
                   onkeyup="javascript: if (event.keyCode != 9 && event.keyCode != 13) {
                               searchCategoryForPanel(document.getElementById('sttr_item_category').value, event.keyCode, 'addItemInvCryName ');
                           }" 
                   onkeydown="javascript:if (event.keyCode == 13) {
                               searchCatForPanelBlank('cryNameInvSelectDiv');
                               document.getElementById('sttr_item_name').focus();
                               document.getElementById('sttr_item_name').value = '';
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               searchCatForPanelBlank('cryNameInvSelectDiv');
                               document.getElementById('sttr_metal_type').focus();
                               return false;
                           }"
                   onclick="this.value = '';
                           searchCatForPanelBlank('cryNameInvSelectDiv');"
                   onblur="if (this.value == '') {
                               this.value = '<?php echo $sttr_item_category; ?>';
                           }"                      
                   onkeypress="return AvoidSpace(event);" 
                   style="text-align: center;width: 100%;"
                   autocomplete="off" spellcheck="false" 
                   class="form-control-height20 placeholderClass" size="8" maxlength="15"  />
            <div id="cryNameInvSelectDiv"></div>
        </td>

        <td align="left" title="NAME" class="textLabel12CalibriBrown">
            <div>
                <?php
                //
                $userId = $suppId;
                $prodMergedCount = '';
                $inputId = 'sttr_item_name';
                $inputName = 'sttr_item_name';
                $inputFieldColumnName = 'sttr_item_name';
                $inputFieldValue = $sttr_item_name;
                $inputFieldPrevId = 'sttr_item_category';
                $inputFieldNextId = 'sttr_quantity';
                $inputPlaceHolder = "NAME";
                $inputLabelDivText = 'N';
                $requiredField = 'N';
                $inputFieldClass = 'form-control-height20 placeholderClass';
                //
                $inputStyle = 'text-align: center;height: 20px;';
                //
                $inputOnBlurFun = 'googleSuggestionDropdownBlank("sttr_item_name_google_div"); ';
                //
                $inputOnChange = "googleSuggestionDropdownBlank('sttr_item_name_google_div'); ";
                //
                //
                        include $_SESSION['documentRootIncludePhp'] . '/stock/stock_transaction/om_sttr_item_item_name.php';
                //
                //
                        ?>
            </div>
        </td>

        <td align="left" title="QTY" class="textLabel12CalibriBrown">
            <input id="sttr_quantity" name="sttr_quantity" type="text" 
                   value="<?php echo $sttr_quantity; ?>" 
                   placeholder="QTY"
                   onblur="if (this.value == '') {
                               this.value = '1';
                           }
                           return false;"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('sttr_gs_weight').value = '';
                               document.getElementById('sttr_gs_weight').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('sttr_item_name').focus();
                               return false;
                           }"    
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   ondblclick="this.value = '';"
                   spellcheck="false" class="form-control-height20 align_center placeholderClass" 
                   size="3" maxlength="10" 
                   style="text-align: center;"/>
        </td>

        <td align="left" title="WT" class="textLabel12CalibriBrown">
            <input id="sttr_gs_weight" name="sttr_gs_weight" type="text" 
                   value="<?php echo $sttr_gs_weight; ?>" 
                   placeholder="WT"
                   onblur="if (this.value == '') {
                               this.value = '<?php echo $sttr_gs_weight; ?>';
                           }
                           return false;"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('sttr_gs_weight').value = '';
                               document.getElementById('sttr_gs_weight').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('sttr_quantity').focus();
                               return false;
                           }"    
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   ondblclick="this.value = '';"
                   spellcheck="false" class="form-control-height20 align_center placeholderClass" 
                   size="3" maxlength="10" 
                   style="text-align: center; "/>
        </td>

        <td>
            <select id="sttr_gs_weight_type" 
                    name="sttr_gs_weight_type" style="text-align: center; "
                    onkeydown="javascript:if (event.keyCode == 13) {
                                document.getElementById('sttr_gs_weight_type').focus();
                                return false;
                            } else if (event.keyCode == 8) {
                                document.getElementById('sttr_gs_weight').focus();
                                return false;
                            }"
                    class="form-control-height20 placeholderClass">
                        <?php
                        if ($payPanelName == 'AddRepairItem' || $payPanelName == 'RepairItemPayUp' ||
                                $payPanelName == 'UpdateRepairItem') {
                            $cryGsWtType = array('GM', 'KG', 'MG', 'CT');
                            for ($i = 0; $i <= 3; $i++)
                                if ($cryGsWtType[$i] == $cryGSWT)
                                    $cryGsWtTypeSel[$i] = 'selected';
                        } else {
                            $cryGsWtTypeSel[0] = 'selected';
                        }
                        ?>
                <option value="GM"<?php echo $cryGsWtTypeSel[0]; ?>>GM</option>
                <option value="KG"<?php echo $cryGsWtTypeSel[1]; ?>>KG</option>
                <option value="MG"<?php echo $cryGsWtTypeSel[2]; ?>>MG</option>
                <option value="CT"<?php echo $cryGsWtTypeSel[3]; ?>>CT</option>
                <?php $cryGsWtTypeSel = ""; ?>
            </select>
        </td>


        <td align="right" class="padLeft3">
            <a style="cursor: pointer;" 
               onclick="if (document.getElementById('crystalDiv<?php echo $crystalCount; ?>').value == '' || document.getElementById('crystalDiv<?php echo $crystalCount; ?>').value == 'true')
                           getRepairFormDivFunc('<?php echo $crystalCount + 1; ?>', 'crystalAddDiv', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>');
               ">
                <img src="<?php echo $documentRootBSlash; ?>/images/update16.png" alt="Click Here To Add Crystal" class="marginTop5"
                     onload="<?php if ($simItem != 'SimilarItem' && $itemSubPanel != 'addByItemsUp' && $itemSubPanel != 'itemsAddUp' && $payPanelName != 'SuppOrderUp' && $panelSimilarDiv != 'SimilarItem' && $UpPanel != 'UpPanel') { ?>
                           document.getElementById('sttr_item_category<?php echo $crystalCount; ?>').focus();
                     <?php } ?>
                       document.getElementById('simItemPanel').value = 'SimilarItem';"/>
            </a>
        </td>

        <td align="left" class="padLeft3">
            <a style="cursor: pointer;" 
               onclick ="closeRepairFormDivFunc('<?php echo $crystalCount; ?>', '<?php echo $commonPanel; ?>', '<?php echo $sttrId; ?>', '<?php echo $sttrId; ?>', '<?php echo $sttrId; ?>', '<?php echo $documentRootBSlash; ?>');
               ">
                <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" alt="delete" class="marginTop5"/>
            </a>
        </td>

        </tr>
    </table>

</div>
<!-------------------------------------------END CODE TO ADD GST--------------------------------------------->
<div id = "crystalAddDiv<?php echo $crystalCount + 1; ?>"></div>
