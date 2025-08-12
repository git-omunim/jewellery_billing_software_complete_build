<?php
/*
 * **************************************************************************************
 * @tutorial: sell return form ad
 * **************************************************************************************
 * 
 * Created on Nov 24, 2023 2:25 PM
 *
 * @FileName: omsellreturninvfmad.php
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
include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
?>

<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
$divId = $_GET['divId'];
$cnt = $_GET['count'];
$display = $_GET['display'];
$labelId = $_GET['labelId'];
$labelType = $_GET['labelType'];
$inputWidth = $_GET['inputWidth'];
$fieldName = $_GET['fieldName'];
$fieldContent = $_GET['fieldValue'];
$fieldCheck = $_GET['fieldCheck'];
$fontSize = $_GET['fontSize'];
$fontColorVal = $_GET['fontColor'];
$divTopMargin = $_GET['topMargin'];
$divLeftMargin = $_GET['leftMargin'];
?>
<!--   <td align="left" colspan="5" class="posAbsolute" style="margin-top:<?php echo $divTopMargin; ?>px;margin-left: <?php echo $divLeftMargin; ?>px;">-->
<div class="posAbsolute" style="border: #c1c1c1 1px solid;padding:8px;background:#fff;width:190px;margin-top:<?php echo $divTopMargin; ?>px;">
    <!--margin-left: <?php // echo $divLeftMargin; ?>px;-->
    <form name="add_stock" id="add_stock"
          enctype="multipart/form-data" method="post"
          action="include/php/omcuSellReturnfoad.php"   
          onsubmit="return labelsFormSubmit(document.getElementById('fieldName').value,document.getElementById('fontSize<?php echo $cnt; ?>').value,'<?php echo $cnt; ?>');">
        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="middle" style="width:100%;border:0;" class="backF9F9F9 textBoxCurve1px">
            <tr>
            <input type="hidden" id="count" name="count" value="<?php echo $cnt; ?>"/>
            <input type="hidden" id="labelType" name="labelType" value="<?php echo $labelType; ?>"/>
            <?php
            if ($display == 'YES' && $divId != 'tncDiv') {
                if ($divId != 'authSignLbDiv' && $divId != 'invTitleDiv' && $divId != 'footerLbDiv') {
                    ?>
                    <input type="hidden" id="fontCheckId<?php echo $cnt; ?>" name="fontCheckId<?php echo $cnt; ?>"/>
                <?php } ?>
                <!--<td align="left" class="frm-lbl-lnk-grey" style="padding-left: 10px;width:120px;">-->
                    <input id="fieldValue<?php echo $cnt; ?>" name="fieldValue<?php echo $cnt; ?>" placeholder="<?php echo $labelId; ?>" 
                           value="<?php echo $fieldContent; ?>"
                           onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('fontSize<?php echo $cnt; ?>').focus();
                                           return false;
                                       }"
                           spellcheck="false" type="text"
                           class="input_border_grey"  style="width:100%;height:28px;"size="<?php echo $inputWidth; ?>" maxlength="100" />
                <!--</td>-->
            <?php } else if ($divId == 'tncDiv') { ?>
                <!--<td align="left" class="frm-lbl-lnk-grey" style="padding-left: 10px;" colspan="5">-->
                    <textarea id="fieldValue<?php echo $cnt; ?>"  name="fieldValue<?php echo $cnt; ?>" spellcheck="false" placeholder=" Terms and Conditions:"
                              onkeydown="javascript: if (event.keyCode == 8 && this.value == '') {
                                              document.getElementById('fieldValue<?php echo $cnt; ?>').focus();
                                              return false;
                                          }"
                              class="textarea" style="width:100%;height: 150px;"><?php echo $fieldContent; ?></textarea> 
                <!--</td>-->
                </tr>
            <?php } else { ?>
                <!--<td align="left" class="ff_calibri fs_14" style="padding-left: 10px;">-->
                <span style="text-align: left"><b><?php echo $labelId; ?>:</b></span>
                    <input id="fieldValue<?php echo $cnt; ?>" name="fieldValue<?php echo $cnt; ?>" type="hidden" value="<?php echo $fieldContent; ?>" style="width:100%;height:28px;margin-bottom: 5px"/>
                <!--</td>-->

                <?php
            }if ($fieldName != 'firmLeftLogoCheck' && $fieldName != 'firmRightLogoCheck' && $fieldName != 'design') {
                if ($fieldName == 'tncDiv') {
                    ?>
                    <tr>
                    <?php } ?>
                    <!--<td align="left" class="frm-lbl-lnk-grey" title="FONT SIZE" style="width:60px;padding-left: 10px;">-->
                        <input id="fieldName" name="fieldName" type="hidden" value="<?php echo $fieldName; ?>"/>
                        <input id="fontSize<?php echo $cnt; ?>" name="fontSize<?php echo $cnt; ?>" placeholder="Font size (PX):" value="<?php echo $fontSize; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('fontColor<?php echo $cnt; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('fieldValue<?php echo $cnt; ?>').focus();
                                               return false;
                                           }"
                               spellcheck="false" type="text"  onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey" size="5" maxlength="10" style="width:100%;height:28px;margin-bottom: 5px"/>
                    <!--</td>-->
                <?php }if ($fieldName != 'firmLeftLogoCheck' && $fieldName != 'firmRightLogoCheck' && $fieldName != 'design') { ?>
                    <!--<td align="left" class="frm-lbl-lnk-grey"  style="width:60px;padding-left: 10px;" title="FONT COLOR">-->
                        <div class="selectStyled" style="width: 100%;height:28px">
                            <select id="fontColor<?php echo $cnt; ?>" name="fontColor<?php echo $cnt; ?>"  style="width: 100%;height:28px"
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('fontCheckId<?php echo $cnt; ?>').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('fontSize<?php echo $cnt; ?>').focus();
                                                    return false;
                                                }"
                                    class="textLabel14CalibriReq">
                                        <?php
                                        $firmNameColor = array(black, blue, lightBlue, brightBlue, darkBlue, maroon, red, brown, green, orange, grey, white);
                                        for ($i = 0; $i <= 11; $i++)
                                            if ($firmNameColor[$i] == $fontColorVal)
                                                $optionHeaderLabelSel[$i] = 'selected';
                                        ?>
                                <option value="black" style="color: #000000;"<?php echo $optionHeaderLabelSel[0]; ?>>Black</option>
                                <option value="blue" style="color: #0000C8;"<?php echo $optionHeaderLabelSel[1]; ?>>Blue</option>
                                <option value="lightBlue" style="color: #059BD8;"<?php echo $optionHeaderLabelSel[2]; ?>>Light blue</option>
                                <option value="brightBlue" style="color: #2E64FE;"<?php echo $optionHeaderLabelSel[3]; ?>>Bright blue</option>
                                <option value="darkBlue" style="color: #003366;"<?php echo $optionHeaderLabelSel[4]; ?>>Dark blue</option>
                                <option value="maroon" style="color: #800000;"<?php echo $optionHeaderLabelSel[5]; ?>>Maroon</option>
                                <option value="red" style="color: #B80000;"<?php echo $optionHeaderLabelSel[6]; ?>>Red</option>
                                <option value="brown" style="color: #804000;"<?php echo $optionHeaderLabelSel[7]; ?>>Brown</option>
                                <option value="green" style="color: #00A000;"<?php echo $optionHeaderLabelSel[8]; ?>>Green</option>
                                <option value="orange" style="color: #D76B00;"<?php echo $optionHeaderLabelSel[9]; ?>>Orange</option>
                                <option value="grey" style="color: #444444;"<?php echo $optionHeaderLabelSel[10]; ?>>Grey</option>
                                <option value="white" style="color:#FFFFFF;"<?php echo $optionHeaderLabelSel[11]; ?>>White</option>
                            </select>
                        </div>
                    </td>
                    <!--START CODE FOR ADD CANCLE BUTTON @DNYANESHWARI:6-DEC-2023--> 
                <?php } ?>
            <?php  if (($fieldName == 'firmLeftLogoCheck' || $fieldName == 'firmRightLogoCheck' || $fieldName == 'design')) { ?>
                <input id="fieldName" name="fieldName" type="hidden" value="<?php echo $fieldName; ?>"/>
                <input id="fontSize<?php echo $cnt; ?>" name="fontSize<?php echo $cnt; ?>" type="hidden" value="<?php echo $fontSize; ?>" style="width: 100%;height:28px;border-radius: 3px !important;margin-bottom: 5px"/>
                <input id="fontColor<?php echo $cnt; ?>" name="fontColor<?php echo $cnt; ?>" type="hidden" value="<?php echo $fontColorVal; ?>" style="width: 100%;height:28px;border-radius: 3px !important;margin-bottom: 5px"/>
                <?php
            } if ($display == 'NO' || $divId == 'tncDiv' || $divId == 'authSignLbDiv' || $divId == 'invTitleDiv' ||
                    $divId == 'invPrefixDiv' || $divId == 'invDelDiv' || $divId == 'invSuffixDiv' || $divId == 'footerLbDiv' || $divId == 'metalRwGldDiv' ||
                    $divId == 'metalRwTnchDiv' || $divId == 'metalRwFnDiv' || $divId == 'metalRtDiv' ||
                    $divId == 'valuationDiv' || $divId == 'totalMetalLbDiv' || $divId == 'taxInvTitleDiv' || $divId == 'footerAdImgDiv' || $divId == 'headerInfoImgDiv' ||
                    $divId == 'rawMetalNetWtDiv' || $divId == 'rawMetalLessWtDiv' || $divId == 'rawMetalGsWtDiv' || $divId == 'tncPassDiv') {
                ?>
                <!--<td align="left" valign="middle" title="CLICK TO SELECT FORM HEADER LABEL !" style="padding-left: 10px;">-->
                    <input type="checkbox" id="fontCheckId<?php echo $cnt; ?>" name="fontCheckId<?php echo $cnt; ?>" class="checkbox" value="true" <?php
                    if ($fieldCheck == 'true')
                        echo 'checked';
                    else
                        echo '';
                    ?>
                           onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('customFormSub').focus();
                                           return false;
                                       } else if (event.keyCode == 8) {
                                           document.getElementById('fontColor<?php echo $cnt; ?>').focus();
                                           return false;
                                       }"
                           style='width:30px;height:16px;border-radius:5px;'/>
                <!--</td>-->
            <?php } ?>

            <!--<td align="right" class="ff_calibri fs_14 brown"  style="padding-left: 10px;">-->
                <div style="margin-top: -8px;margin-left: -5px;position: absolute;top: -10px;right: -12px;">
                    <a style="cursor: pointer;" onclick="closeLabel('<?php echo $divId; ?>');">
                        <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="" style="height:14px;"/>
                    </a>
                </div>
            <!--</td>-->
            <!--END CODE FOR ADD CANCEL BUTTON @DNYANESHWARI:6-DEC-2023--> 
            </tr>
            <tr align="center">
                 <td align="center" colspan="8" valign="middle" title="CLICK TO SET DETAILS!" style="margin-top:5px;">
    <!--            <input type="submit" value="SUBMIT" 
                       class="frm-btn" id="customFormSub" 
                       onclick="javascript:labelsForm('<?php echo $cnt; ?>', 'SellPurchase', '<?php echo $fieldName; ?>', document.getElementById('fieldValue<?php echo $cnt; ?>').value, document.getElementById('fontSize<?php echo $cnt; ?>').value, document.getElementById('fontColor<?php echo $cnt; ?>').value, '<?php echo $divId; ?>', '<?php echo $display; ?>');" 
                       maxlength
                       ="30" size="5" />             -->
                 <input type="submit" value="SUBMIT" 
                       class="frm-btn" id="customFormSub"
                       maxlength ="30" size="5" style="color: #000080;background: #BED8FD;width: 90px;border-radius: 3px !important;font-size: 14px;border: 1px solid #68a3f8;margin-top: 10px;"/>   
            </td>
            </tr>
        </table>
    </form>
</div>

