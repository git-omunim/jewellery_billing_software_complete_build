<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: ormlmrpr.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */ ?>
<?php
//change in file @AUTHOR: SANDY04JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
$mlId = $_GET['mlId'];
$loanNo = $_GET['loanId'];
$loanSerNo = $_GET['loanSerNo'];
$count = 1;
?>
<form name="add_more_prin_in_update" id="add_more_prin_in_update"
      action="javascript:addMorePrinInUpdate(document.getElementById('add_more_prin_in_update'));"
      onsubmit="return true;"
      method="post">
    <input type="hidden" id="mlIdField1" name="mlIdField1" value="<?php echo $mlId; ?>" />
    <input type="hidden" id="loanNoField1" name="loanNoField1" value="<?php echo $loanNo; ?>" />
    <input type="hidden" id="loanSerNoField1" name="loanSerNoField1" value="<?php echo $loanSerNo; ?>" />
    <div id="addMorePrinInUpdate">
        <table border="0" cellpadding="2" cellspacing="2" width="100%">
            <tr>
                <td align="left">
                    <input id="addPrinNo<?php echo $count ?>" name="addPrinNo<?php echo $count ?>" type="text"                     
                           onkeydown = "javascript: if (event.keyCode == 13) {
                               clearListDiv('addPrinNoList'+<?php echo $count; ?>,this.id);
                               searchMorePrinToTransfer(this.value,event.keyCode,'Update');
                               return false;
                           }
                           else if (event.keyCode == 8 && this.value == '') {
                               clearListDiv('addPrinNoList'+<?php echo $count; ?>,this.id);
                               return false;
                           }"
                           onclick="clearListDiv('addPrinNoList'+<?php echo $count; ?>,this.id);"
                           onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
                           searchMorePrinToTransfer(this.value, event.keyCode,'Update');
                       }else if(event.keyCode == 13){
                           getDetailsOfSelectedPrincipal(this.value,'<?php echo $count; ?>','Update');
                           return false;
                       }" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="25" maxlength="10"  placeholder="ADDITIONAL LOAN NO" autocomplete="off"
                           />
                    <div id ="addPrinNoList<?php echo $count; ?>" class="loanNoListDiv"></div>
                </td>
                <td align="center">
                    <input id="prinCustName<?php echo $count; ?>" name="prinCustName<?php echo $count; ?>" type="text"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="20" maxlength="10"  placeholder="CUSTOMER"/>
                </td>
                <td align="center">
                    <input id="prinAmt<?php echo $count; ?>" name="prinAmt<?php echo $count; ?>" type="text"  
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="20" maxlength="10"  placeholder="PRINCIPLE"/>
                </td>
                <td  align="center">
                    <input id="prinRoi<?php echo $count; ?>" name="prinRoi<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="10" maxlength="10" readonly="true" placeholder="ROI"/>
                </td>
                 <!-------Start code to add Packet NO  @Author:ANUJA30JUL15---------------------->
                 <td  align="center">
                    <input id="prinPacket<?php echo $count; ?>" name="prinPacket<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="10" maxlength="10"  placeholder="PACKET NO"/>
                </td>
                 <!-------End code to add Packet NO  @Author:ANUJA30JUL15---------------------->
                <td  align="center">
                    <input id="prinFirm<?php echo $count; ?>" name="prinFirm<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="FIRM"/>
                </td>
                <td  align="center">
                    <?php
                    include 'ormlprdt.php';
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <table width="100%">
        <tr>
            <td colspan="6" align="center">
                <div id="morePrinSubButtDiv">
                    <input id="subButt" name="subButt" type="submit" value="Submit"
                           spellcheck="false"  class="frm-btn" size="10" maxlength="10" /> 
                </div>
            </td>
        </tr>
    </table>
</form>


