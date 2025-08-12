<?php
/*
 * **************************************************************************************************
 * @Description: SMS TEMPLATE UPDATE POPUP @Author-SARVESH-23JUNE2022
 * **************************************************************************************************
 *
 * Created on June 23, 2020 11:19:58 PM 
 * **************************************************************************************
 * @FileName: omSmsTemplateUpdatePopup.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL/OMUNIM 
 * @version 2.7.7
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * ******************************************************************************************
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.7
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
//
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';
?>
<?php
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR SMS UPDATE POPUP @AUTHOR:SARVESH-23 JUN 2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$templateId = $_REQUEST['templateId'];
$selSmsTempText = "SELECT smtp_sub,smtp_text,smtp_owner,smtp_type FROM sms_templates where smtp_own_id='$sessionOwnerId' and smtp_id = '$templateId'";
$resSmsTempText = mysqli_query($conn, $selSmsTempText);
$rowSmsTempText = mysqli_fetch_array($resSmsTempText, MYSQLI_ASSOC);
$smtp_sub = $rowSmsTempText['smtp_sub'];
$smsTempText = $rowSmsTempText['smtp_text'];
$smtp_owner = $rowSmsTempText['smtp_owner'];
$smtp_type = $rowSmsTempText['smtp_type'];
//
if ($smtp_type == 'TSMS')
    $optionTSMS = 'selected';
else
    $optionPSMS = 'selected';
?>
<div id="girviIframePopUp" class="grey-back" style="border: 1px #f39c12 solid;z-index:99999;background: #fcf3cf;position: relative;">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="right" valign="top">
                <div class="col-lg-12 row">
                    <div class=" col-lg-6 ff_calibri fs_14 orange" style="text-align: left;padding: 0;">SMS TEMPLATE UPDATE</div>
                    <div class="col-lg-6" style="padding: 0;">
                    <a class="links" style="cursor: pointer;margin-right: -25px;"
                       onclick="getGirviInfoPopUpHide('')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td align="left" width="500px">
                <input id="smsTempIdUpdate" name="smsTempIdUpdate" placeholder="TEMPLATE ID" value="<?php echo $smtp_sub; ?>" style="color:#6f6f6f;width:500px"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('smsTypeUpdate').focus();
                                   return false;
                               }"
                       type="text" spellcheck="false"  class="input_border_grey" size="35" maxlength="100" />
            </td>
        </tr>
        <tr>
            <td align="left" valign="top" class="padBott4" width="500px">
                <select id="smsTypeUpdate" name="smsTypeUpdate" class="input_border_grey" style="width:500px;color:#6f6f6f;"
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('smsTempTextUpdate').focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('smsTempIdUpdate').focus();
                                    return false;
                                }">
                    <option value="PSMS" <?php echo $optionPSMS; ?>>PROMOTIONAL SMS</option>
                    <option value="TSMS" <?php echo $optionTSMS; ?>>TRANSACTIONAL SMS</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <textarea id="smsTempTextUpdate"  name="smsTempTextUpdate" placeholder="SMS TEMPLATE" 
                          onkeydown="javascript: if (event.keyCode == 8 && this.value == '') {
                                      document.getElementById('smsTypeUpdate').focus();
                                      return false;
                                  }"
                          spellcheck="false" class="textarea ff_calibri" style="width: 500px;height: 240px;color:#6f6f6f;"><?php echo $smsTempText; ?></textarea>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table cellspacing="0" cellpadding="2" border="0">
                    <tr>
                        <td>
                            <input type="submit" id="smsTempUpdateButt" name="smsTempUpdateButt" 
                                   onclick="
                                           if (document.getElementById('smsTempIdUpdate').value == '' || document.getElementById('smsTempTextUpdate').value == '') {
                                               alert('Please Enter Template Id! OR Template');
                                           } else {
                                               javascript:getSmsTemplate('<?php echo $templateId; ?>', document.getElementById('smsTempIdUpdate').value, document.getElementById('smsTempTextUpdate').value, document.getElementById('smsTypeUpdate').value, 'smsTempUpdate', '', 'UPDATED');
                                           }"
                                   class="frm-btn" value="UPDATE" size="40"/>
                        </td>
                        <td>
                            <input type="submit" id="smsTempDeleteButt"  name="smsTempDeleteButt" 
                                   onclick="javascript:getSmsTemplate('<?php echo $templateId; ?>', '', '', '', 'smsTempDelete', '<?php echo $smtp_owner; ?>', 'DELETED');"
                                   class="frm-btn" value="DELETE" size="40"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<?php
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR SMS UPDATE POPUP @AUTHOR:SARVESH-23 JUN 2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
?>
