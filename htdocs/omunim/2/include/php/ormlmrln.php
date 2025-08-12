<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: ormlmrln.php
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
//changes in file @AUTHOR: SANDY04JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
$mlId = $_GET['mlId'];
$loanId = $_GET['loanId'];
$loanSerNo = $_GET['loanSerNo'];
$count = 1;
?>
<!-------------------------Start code to change file @Author:SHRI18MAY15----------------->
<form name="add_more_loan_in_update" id="add_more_loan_in_update"
      action="javascript:addMoreLoanInUpdate(document.getElementById('add_more_loan_in_update'));"
      onsubmit="return true;"
      method="post">
    <input type="hidden" id="mlIdField1" name="mlIdField1" value="<?php echo $mlId; ?>" />
    <input type="hidden" id="loanIdField1" name="loanIdField1" value="<?php echo $loanId; ?>" />
    <input type="hidden" id="loanSerNo1" name="loanSerNo1" value="<?php echo $loanSerNo; ?>" />
    <div id="addMoreLoanInUpdateDiv">
        <table border="0" cellpadding="2" cellspacing="2" width="100%">
            <tr>
                <td align="left">
                    <input id="addLoanNo<?php echo $count ?>" name="addLoanNo<?php echo $count ?>" type="text"                     
                           onkeydown = "javascript: if (event.keyCode == 13) {
                               clearListDiv('addLoanNoList'+<?php echo $count; ?>,this.id);
                               searchMoreLoanToTransfer(this.value, event.keyCode,'Update');
                               return false;
                           }
                           else if (event.keyCode == 8 && this.value == '') {
                               clearListDiv('addLoanNoList'+<?php echo $count; ?>,this.id);
                               return false;
                           }"
                           onclick="clearListDiv('addLoanNoList'+<?php echo $count; ?>,this.id);"
                           onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
                           searchMoreLoanToTransfer(this.value, event.keyCode,'Update');
                       }else if(event.keyCode == 13){
                           getDetailsOfSelectedLoan(this.value,'1','Update');
                           return false;
                       }" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10"  placeholder="LOAN NO" autocomplete="off"
                           />
                    <div id ="addLoanNoList<?php echo $count; ?>" class="loanNoListDiv"></div>
                </td>
                <td align="center">
                    <input id="addCustName<?php echo $count; ?>" name="addCustName<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="20" maxlength="10" readonly="true" placeholder="CUSTOMER"/>
                </td>
                <td align="center">
                    <input id="addPrinAmt<?php echo $count; ?>" name="addPrinAmt<?php echo $count; ?>" type="text"  
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="20" maxlength="10"  placeholder="PRINCIPLE"/>
                </td>
                <td  align="center">
                    <input id="addRoi<?php echo $count; ?>" name="addRoi<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="10" maxlength="10"  placeholder="ROI"/>
                </td>
                <td  align="center">
                    <input id="addFirm<?php echo $count; ?>" name="addFirm<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="FIRM"/>
                </td>
                <td  align="center">
                    <input id="addPacketNo<?php echo $count; ?>" name="addPacketNo<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="PACKET NO"/>
                </td>
                <td  align="center">
                    <input id="addOtherInfo<?php echo $count; ?>" name="addOtherInfo<?php echo $count; ?>" type="text" 
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="OTHER INFO"/>
                </td>
                <td  align="center">
                    <?php
                    include 'ormldate.php';
                    ?>
                </td>
            </tr>

        </table>
    </div>
    <table width="100%">
        <tr>
            <td align="center">
                <div id="moreLoanSubButtDiv">
                    <input id="subButt" name="subButt" type="submit" value="Submit"
                           spellcheck="false"  class="frm-btn" size="10" maxlength="10" /> 
                </div>
            </td>
        </tr>
    </table>
</form>

<!-------------------------End code to change file @Author:SHRI18MAY15----------------->