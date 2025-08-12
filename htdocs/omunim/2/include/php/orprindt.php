<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer Principal list in Money lenders Add Loan Panel
 * **************************************************************************************
 *
 * Created on 13 NOV, 2013 11:04:23 AM
 *
 * @FileName: orprindt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
//change in file @AUTHOR: SANDY11JAN14
require_once 'system/omssopin.php';
$count = $_GET['id'];
$prinNo = $_GET['prinNo'];
$panel = $_GET['panel'];
$prinPreId = preg_replace("/[^a-zA-Z]+/", "", $prinNo);
$prinPostId = preg_replace("/[^0-9]+/", "", $prinNo);
?>
<?php
$qSelLoan = "SELECT * FROM girvi_principal WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_pre_id='$prinPreId' and girv_prin_post_id='$prinPostId' and (girv_prin_transfer_id='' or girv_prin_transfer_id IS null)";
$resLoan = mysqli_query($conn,$qSelLoan);
$numLoan = mysqli_num_rows($resLoan);
$rowLoan = mysqli_fetch_array($resLoan, MYSQLI_ASSOC);
$roi = $rowLoan['girv_prin_prin_roi'];
$firm = $rowLoan['girv_prin_firm_id'];
$custId = $rowLoan['girv_prin_cust_id'];
$principle = $rowLoan['girv_prin_prin_amt'];
$selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$firm' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resSelFirmName = mysqli_query($conn,$selFirmName);
$rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
$firmName = $rowSelFirmName['firm_name'];
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
$selCustName = "SELECT user_fname FROM user WHERE user_id='$custId' AND user_owner_id='$_SESSION[sessionOwnerId]'";
$resSelCustName = mysqli_query($conn,$selCustName);
$rowSelCustName = mysqli_fetch_array($resSelCustName, MYSQLI_ASSOC);
$custName = $rowSelCustName['user_fname'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
?>
<?php if ($panel != 'Update') { ?>
    <table border = "0"  cellpadding="1" cellspacing="1" width ="100%" align="center">
        <tr>
            <td align="center"  width="170px">
                <input id="principalId<?php echo $count ?>" name="principalId<?php echo $count ?>" type="text"       
                       onkeydown = "javascript: if (event.keyCode == 13) {
                           clearListDiv('principalIdList'+<?php echo $count; ?>,this.id);
                           searchPrincipalIdAndDet(this.value,'<?php echo $count; ?>', event.keyCode);
                           return false;
                       }
                       else if (event.keyCode == 8 && this.value == '') {
                           clearListDiv('principalIdList'+<?php echo $count; ?>,this.id);
                           return false;
                       }"
                       onclick="clearListDiv('principalIdList'+<?php echo $count; ?>,this.id);"
                       onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
                       searchPrincipalIdAndDet(this.value,'<?php echo $count; ?>', event.keyCode);
                   }else if(event.keyCode == 13){
                       if(this.value!=''){
                           getDetailsOfSelectedPrincipal(this.value,'<?php echo $count; ?>','');return false;
                       }}" 
                       value="<?php echo $prinNo; ?>"
                       spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" 
                       size="20" maxlength="20"  placeholder="ADDITIONAL LOAN NO" autocomplete="off" />
                <div id ="principalIdList<?php echo $count; ?>" class="loanNoListDiv"></div>
            </td>
            <?php if ($numLoan != 0) { ?>
                <td align="center">
                    <input id="prinCustName<?php echo $count; ?>" name="prinCustName<?php echo $count; ?>" type="text"  value="<?php echo $custName; ?>"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="15" maxlength="20" readonly="true" placeholder="CUSTOMER"/>
                </td>
                <td align="center">
                    <input id="prinPrinAmt<?php echo $count; ?>" name="prinPrinAmt<?php echo $count; ?>" type="text"   value="<?php echo number_format($principle, 2, '.', '') ?>"
                           onblur="if(this.value!=''){getAddPrinAmtTransffered();return false;}"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad text_right" size="15" maxlength="20"  placeholder="PRINCIPLE"/>
                </td>
                <td  align="center">
                    <input id="prinRoi<?php echo $count; ?>" name="prinRoi<?php echo $count; ?>" type="text" value="<?php echo $roi; ?>"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad " size="15" maxlength="20" placeholder="ROI"/>
                </td>
                <td  align="center">
                    <input id="prinFirm<?php echo $count; ?>" name="prinFirm<?php echo $count; ?>" type="text" value="<?php echo $firmName; ?>"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="15" maxlength="20" readonly="true" placeholder="FIRM"/>
                </td>
                <td  align="center">
                    <?php
                    include 'ormlprdt.php';
                    ?>
                </td>
                <td align="center">
                    <div id="morePrinCloseDiv<?php echo $count; ?>">
                        <input type="submit" id="morePrinClose<?php echo $count; ?>" name="morePrinClose<?php echo $count; ?>" value="" 
                               onclick ="closeMorePrinToTrDiv('<?php echo $count; ?>');return false;"
                               onkeydown="javascript:if (event.keyCode == 8) {
                           document.getElementById('prinFirm<?php echo $count; ?>').focus();
                           return false;
                       }else if(event.keyCode ==13){
                           closeMorePrinToTrDiv('<?php echo $count; ?>');
                           return false;
                       }else{
                           document.getElementById('morePrin<?php echo $count; ?>').focus();
                           return false;
                       }"
                               class="frm-btn-delete" 
                               title="Click here to delete this loan." />
                    </div>
                </td>
                <td>
                    <div id="morePrinDiv<?php echo $count; ?>">
                        <input type="submit" id="morePrin<?php echo $count; ?>" name="morePrin<?php echo $count; ?>" value="" 
                               onclick ="getMorePrinToTrDiv('<?php echo $count; ?>');return false;"
                               onkeydown="javascript:if (event.keyCode == 8) {
                       document.getElementById('morePrinClose<?php echo $count; ?>').focus();
                       return false;
                   }else if(event.keyCode ==13){
                       getMorePrinToTrDiv('<?php echo $count; ?>');
                       return false;
                   }else{
                       document.getElementById('loanPaySelAccountId').focus();
                       return false;
                   }"
                               class="frm-btn-update" 
                               title="Click here to add more loan." />
                    </div>
                </td>
                <td>
                    <img src="<?php echo $documentRoot; ?>/images/girvi24.png" width="0.001px" height="0.001px" onload="javascript:getAddPrinAmtTransffered();return false;"/>
                </td>   
            <?php } else { ?>
                <td colspan="5">
                    <div class="main_link_red16"> ~This loan is not available for transfer! Please Select other !!~</div>
                </td>
            <?php } ?>
        </tr> 
    </table>
    <?php
} else {
    $count = 1;
    ?>
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr>
            <td align="left" width="170px">
                <input id="addPrinNo<?php echo $count ?>" name="addPrinNo<?php echo $count ?>" type="text"   value="<?php echo $prinNo; ?>"                    
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
       if(this.value!=''){
           getDetailsOfSelectedPrincipal(this.value,'<?php echo $count; ?>','Update');return false;
       }}" 
                       spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="25" maxlength="10"  placeholder="ADDITIONAL LOAN NO" autocomplete="off"
                       />
                <div id ="addPrinNoList<?php echo $count; ?>" class="loanNoListDiv"></div>
            </td>
            <?php if ($numLoan != 0) { ?>
                <td align="center">
                    <input id="prinCustName<?php echo $count; ?>" name="prinCustName<?php echo $count; ?>" type="text" value="<?php echo $custName; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="20" maxlength="10" readonly="true" placeholder="CUSTOMER"/>
                </td>
                <td align="center">
                    <input id="prinAmt<?php echo $count; ?>" name="prinAmt<?php echo $count; ?>" type="text"  value="<?php echo number_format($principle, 2, '.', '') ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="20" maxlength="10"  placeholder="PRINCIPLE"/>
                </td>
                <td  align="center">
                    <input id="prinRoi<?php echo $count; ?>" name="prinRoi<?php echo $count; ?>" type="text" value="<?php echo $roi; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="10" maxlength="10"  placeholder="ROI"/>
                </td>
                <td  align="center">
                    <input id="prinFirm<?php echo $count; ?>" name="prinFirm<?php echo $count; ?>" type="text" value="<?php echo $firmName; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="FIRM"/>
                </td>
                <td  align="center">
                    <?php
                    include 'ormlprdt.php';
                    ?>
                </td>
            <?php } else { ?>
                <td colspan="5">
                    <div class="main_link_red16"> ~This loan is not available for transfer! Please Select other !!~</div>
                </td>
            <?php } ?>
        </tr>
    </table>
<?php } ?>




