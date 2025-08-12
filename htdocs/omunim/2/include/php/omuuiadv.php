<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar Item add div
 * **************************************************************************************
 * 
 * Created on Mar 18, 2014 11:56:14 AM
 *
 * @FileName: omuuiadv.php
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
?>
<?php
if ($itemDivCount == '') {
    $itemDivCount = $_POST['udhaarItmCnt'];
}
if ($itemDivCount == '') {
    $itemDivCount = $_GET['udhaarItmCnt'];
}
if ($itemDivCount == '') {
    $itemDivCount = 1;
}
if ($udhaarItmPieces == '')
    $udhaarItmPieces = 1;
?>
<div id="udhaarItemDiv<?php echo $itemDivCount; ?>" name="udhaarItemDiv<?php echo $itemDivCount; ?>">
    <table border="0" cellpadding="2" cellspacing="2" align="center" width="100%" >
        <tr align="left">
            <td align="left" class="h414">
                <div id="itemTypeDiv" class="selectStyled">
                    <select id="udhaarItemType<?php echo $itemDivCount; ?>" name="udhaarItemType<?php echo $itemDivCount; ?>" 
                            onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('itemName<?php echo $itemDivCount; ?>').focus();
                                        return false;
                                    }
                                    else if (event.keyCode == 8) {
                                        document.getElementById('udhaarType').focus();
                                        return false;
                                    }" 
                            class="select_border_grey" onchange="changeItemTunchOption(this, '<?php echo $itemDivCount; ?>');">
                                <?php
                                if ($panelName == 'UpdateUdhaar') {
                                    $udhaarItemTyp = array(gold, silver, other);
                                    for ($i = 0; $i <= 2; $i++)
                                        if ($udhaarItemTyp[$i] == $metalType)
                                            $optionItemTypSel[$i] = 'selected';
                                }
                                ?>
                        <option value="gold" <?php echo $optionItemTypSel[0]; ?>>GOLD</option>
                        <option value="silver" <?php echo $optionItemTypSel[1]; ?>>SILVER</option>
                        <option value="other" <?php echo $optionItemTypSel[2]; ?>>OTHER</option>
                        <?php $optionItemTypSel = ''; ?>
                    </select>
                </div>
                <input id="udhaarItemId<?php echo $itemDivCount; ?>" name="udhaarItemId<?php echo $itemDivCount; ?>" type="hidden" value="<?php echo $udhaarItemId; ?>"/>
                <input id="udhaarItemDel<?php echo $itemDivCount; ?>" name="udhaarItemDel<?php echo $itemDivCount; ?>" type="hidden"/>
                <input id="udhaarItemVar<?php echo $itemDivCount; ?>" name="udhaarItemVar<?php echo $itemDivCount; ?>" type="hidden"/>
                <input id="udhaarItemDivCounter" name="udhaarItemDivCounter" value="<?php echo $itemDivCount; ?>" type="hidden" />
            </td>
            <td align="left" class="h414 padLeft10">
                <input id="itemName<?php echo $itemDivCount; ?>" name="itemName<?php echo $itemDivCount; ?>" type="text"
                       placeholder="ITEM NAME / DETAILS" value="<?php echo $udhaarItmName; ?>"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   searchItemForPanelBlank(<?php echo $itemDivCount; ?>);
                                   document.getElementById('udhaarItemPieces<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }
                               else if (event.keyCode == 8 && this.value == '') {
                                   searchItemForPanelBlank(<?php echo $itemDivCount; ?>);
                                   document.getElementById('udhaarItemType<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }"
                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchItemNames(document.getElementById('itemName<?php echo $itemDivCount; ?>').value, document.getElementById('udhaarItemType<?php echo $itemDivCount; ?>').value, '<?php echo $itemDivCount; ?>', event.keyCode);
                               }" 
                       onclick="searchItemForPanelBlank(<?php echo $itemDivCount; ?>);"
                       autocomplete="off" spellcheck="false" class="input_border_grey textBoxCurve1px6rad" size="25" maxlength="800" />
                <div id="itemListDivToAddGirvi<?php echo $itemDivCount; ?>" class="itemListDivToAddGirvi<?php echo $itemDivCount; ?>"></div>
            </td>
            <td align="left" class="h414 padLeft10">
                <input id="udhaarItemPieces<?php echo $itemDivCount; ?>" name="udhaarItemPieces<?php echo $itemDivCount; ?>" 
                       type="text" value="<?php echo $udhaarItmPieces; ?>"
                       onfocus="if (this.value == '1') {
                                   this.value = '';
                               }"
                       onblur="if (this.value == '') {
                                   this.value = '1';
                               }"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('udhaarItemWeight<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }
                               else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('itemName<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }"
                       spellcheck="false" class="textLabel14CalibriGreyMiddle textBoxCurve1px6rad" 
                       size="2" maxlength="10" />
            </td>
            <td align="left" class="h414 padLeft10">
                <input id="udhaarItemWeight<?php echo $itemDivCount; ?>" name="udhaarItemWeight<?php echo $itemDivCount; ?>" 
                       type="text"  value="<?php echo $udhaarGrossWeight; ?>"
                       onfocus="if (this.value == 'GS Weight') {
                                   this.value = '';
                               }"
                       onblur="if (this.value == '') {
                                   this.value = 'GS Weight';
                               }
                               if (this.value != '') {
                                   document.getElementById('itemWeight<?php echo $itemDivCount; ?>').value = this.value;
                               }"
                       placeholder="GS WT"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('udhaarItemWeightType<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }
                               else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('udhaarItemPieces<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }"
                       spellcheck="false" class="input_border_grey_center" size="7" maxlength="9" />
            </td>
            <td align="left">
                <div id="grossWeightTypeDiv" class="selectStyled">
                    <select id="udhaarItemWeightType<?php echo $itemDivCount; ?>" name="udhaarItemWeightType<?php echo $itemDivCount; ?>" 
                            onchange = "document.getElementById('weightType<?php echo $itemDivCount; ?>').value = this.value;"
                            onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('udhaarItemVal<?php echo $itemDivCount; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('udhaarItemWeight<?php echo $itemDivCount; ?>').focus();
                                        return false;
                                    }" 
                            class="select_border_grey">
                                <?php
                                if ($panelName == 'UpdateUdhaar') {
                                    $udhaarWtTyp = array(KG, GM, MG, CT);
                                    for ($i = 0; $i <= 3; $i++)
                                        if ($udhaarWtTyp[$i] == $udhaarGrossWeightType)
                                            $optionUdhaarWtTypSel[$i] = 'selected';
                                }else {
                                    $optionUdhaarWtTypSel[1] = 'selected';
                                }
                                ?>
                        <option value="KG"<?php echo $optionUdhaarWtTypSel[0]; ?>>KG</option>
                        <option value="GM"<?php echo $optionUdhaarWtTypSel[1]; ?>>GM</option>
                        <option value="MG"<?php echo $optionUdhaarWtTypSel[2]; ?>>MG</option>
                        <option value="CT"<?php echo $optionUdhaarWtTypSel[3]; ?>>CT</option>
                        <?php $optionUdhaarWtTypSel = ''; ?>
                    </select>
                </div>
            </td>
            <td align="left" class="h414 padLeft10">
                <input id="udhaarItemVal<?php echo $itemDivCount; ?>" name="udhaarItemVal<?php echo $itemDivCount; ?>" type="text" 
                       placeholder="ITEM VALUATION" value="<?php echo $udhaarVal; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('udhaarPayAccId').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('udhaarItemWeightType<?php echo $itemDivCount; ?>').focus();
                                   return false;
                               }"
                       spellcheck="false" class="input_border_grey_center" size="12" maxlength="30" title="For other items valuation is mandatory!" />
            </td>
            <?php // if ($panelName != 'UpdateUdhaar' || ($panelName == 'UpdateUdhaar' && $noOfItems == $itemDivCount )) { ?>
            <td align="center" class="padLeft10">
                <a style="cursor: pointer;" onclick="if (document.getElementById('udhaarItemVar<?php echo $itemDivCount; ?>').value == '' || document.getElementById('udhaarItemVar<?php echo $itemDivCount; ?>').value == 'true')
                            getMoreUdhaarItemDiv('<?php echo $itemDivCount + 1; ?>', 'UdhaarPanel')">
                    <img src="<?php echo $documentRoot; ?>/images/update16.png" alt="Click Here To Add Crystal" class="marginTop5" <?php if ($itemDivCount > 1) { ?>onload="document.getElementById('udhaarItemType<?php echo $itemDivCount; ?>').focus();" <?php } ?>/>
                </a>
            </td>
            <?php
            // }
//            if ($panelName != 'UpdateUdhaar') {
            ?>
            <td align="right"  width="20px">
                <?php if ($itemDivCount != 1 || $panelName == 'UpdateUdhaar') { ?>
                    <a style="cursor: pointer;" onclick ="
                    <?php if ($panelName == 'UpdateUdhaar') { ?>
                                    closeSellCrystalFunc('<?php echo $itemDivCount; ?>', '<?php echo $panelName; ?>', '<?php echo $udhaarItemId; ?>', '<?php echo $udhaarId; ?>', '<?php echo $itprId; ?>', '<?php echo $wtId; ?>', '<?php echo $wtTypeId; ?>', '<?php echo $panelName; ?>');
                    <?php } else { ?>
                                    closeUdhaarItemDiv('<?php echo $itemDivCount; ?>', 'UdhaarPanel');
                    <?php } ?>
                       " >
                        <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="marginTop5"/>
                    </a>
                <?php } ?>
            </td>
            <?php // } ?>
        </tr>
    </table>
</div>
<div id = "addUdhaarItemDiv<?php echo $itemDivCount + 1; ?>"></div>
