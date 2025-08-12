<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer loan list in Money lenders Add Loan Panel @AUTHOR: SANDY12DEC13
 * **************************************************************************************
 *
 * Created on 13 NOV, 2013 11:04:23 AM
 *
 * @FileName: ormlgvdt.php
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
//change in file @AUTHOR: SANDY11JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
$count = $_GET['id'];
$loanNo = $_GET['loanNo'];
$panel = $_GET['panel'];
$loanPreId = preg_replace("/[^a-zA-Z]+/", "", $loanNo);
$loanPostId = preg_replace("/[^0-9]+/", "", $loanNo);
?>
<?php
$qSelLoan = "SELECT * FROM girvi WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_pre_serial_num='$loanPreId' and girv_serial_num='$loanPostId' and (girv_transfer_id IS NULL or girv_transfer_id=0)";
$resLoan = mysqli_query($conn,$qSelLoan);
$numLoan = mysqli_num_rows($resLoan);

$rowLoan = mysqli_fetch_array($resLoan, MYSQLI_ASSOC);
$roi = $rowLoan['girv_ROI'];
$firm = $rowLoan['girv_firm_id'];
$customer = $rowLoan['girv_cust_fname'];
$principle = $rowLoan['girv_prin_amt'];
$packetNo = $rowLoan['girv_packet_num'];
$otherInfo = $rowLoan['girv_pay_other_info'];
$selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$firm' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resSelFirmName = mysqli_query($conn,$selFirmName);
$rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
$firmName = $rowSelFirmName['firm_name'];
?>
<!-------------------------Start code to change file @Author:SHRI18MAY15----------------->
<?php if ($panel != 'Update') { ?>
    <table border = "0"  cellpadding="1" cellspacing="1" width ="100%" align="center">
        <tr>
            <td align="center" width="90px">
                <input id="mlLoanNo<?php echo $count ?>" name="mlLoanNo<?php echo $count ?>" type="text"                  
                       onkeydown = "javascript: if (event.keyCode == 13) {
                                   clearListDiv('mlLoanNoList' +<?php echo $count; ?>, this.id);
                                   searchLoanNoAndDet(this.value, '<?php echo $count; ?>', event.keyCode);
                                   return false;
                               }
                               else if (event.keyCode == 8 && this.value == '') {
                                   clearListDiv('mlLoanNoList' +<?php echo $count; ?>, this.id);
                                   return false;
                               }"
                       onclick="clearListDiv('mlLoanNoList' +<?php echo $count; ?>, this.id);"
                       onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchLoanNoAndDet(this.value, '<?php echo $count; ?>', event.keyCode);
                               } else if (event.keyCode == 13) {
                                   if (this.value != '') {
                                       getDetailsOfSelectedLoan(this.value, '<?php echo $count; ?>', '');
                                       return false;
                                   }
                               }" 
                       value="<?php echo $loanNo; ?>"
                       spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="5" maxlength="5"  placeholder="LOAN NO" autocomplete="off"
                       />
                <div id ="mlLoanNoList<?php echo $count; ?>" class="loanNoListDiv"></div>
            </td>
            <?php if ($numLoan != 0) { ?>
                <td align="center" width="105px">
                    <input id="mlCustName<?php echo $count; ?>" name="mlCustName<?php echo $count; ?>" type="text"  value="<?php echo $customer; ?>"
                           onkeydown = "javascript: if (event.keyCode == 13) {
                                       document.getElementById('mlPrinAmt<?php echo $count; ?>').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('mlLoanNo<?php echo $count ?>').focus();
                                       return false;
                                   }"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="10" maxlength="10" readonly="true" placeholder="CUSTOMER"/>
                </td>
                <td align="center"  style="width: 100px;">
                    <input id="mlPrinAmt<?php echo $count; ?>" name="mlPrinAmt<?php echo $count; ?>" type="text"   value="<?php echo number_format($principle, 2, '.', ''); ?>"
                           onblur="if (this.value != '') {
                                       getTotalPrinAmtTransffered();
                                       return false;
                                   }"
                           onkeydown = "javascript: if (event.keyCode == 13) {
                                       document.getElementById('mlRoi<?php echo $count; ?>').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('mlCustName<?php echo $count ?>').focus();
                                       return false;
                                   }"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad text_right" size="10" maxlength="10" placeholder="PRINCIPLE"/>
                </td>
                <td  align="center" >
                    <input id="mlRoi<?php echo $count; ?>" name="mlRoi<?php echo $count; ?>" type="text" value="<?php echo $roi; ?>"
                           onkeydown = "javascript: if (event.keyCode == 13) {
                                       document.getElementById('mlFirm<?php echo $count; ?>').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('mlPrinAmt<?php echo $count ?>').focus();
                                       return false;
                                   }"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad " size="10" maxlength="10"  placeholder="ROI" style="width: 70px;"/>
                </td>
                <td  align="center">
                    <input id="mlFirm<?php echo $count; ?>" name="mlFirm<?php echo $count; ?>" type="text" value="<?php echo $firmName; ?>"
                           onkeydown = "javascript: if (event.keyCode == 13) {
                                       document.getElementById('mlAddLnDOBDay<?php echo $count; ?>').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('mlRoi<?php echo $count ?>').focus();
                                       return false;
                                   }"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="10" maxlength="10" readonly="true" placeholder="FIRM"/>
                </td>
                <td  align="right">
                    <input id="mlPacketNo<?php echo $count; ?>" name="mlPacketNo<?php echo $count; ?>" type="text" value="<?php echo $packetNo; ?>"
                           onkeydown = "javascript: if (event.keyCode == 13) {
                                       document.getElementById('mlOtherInfo<?php echo $count; ?>').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('mlFirm<?php echo $count ?>').focus();
                                       return false;
                                   }"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="5" maxlength="5" placeholder="PKT NO." />
                </td>
                <td  align="right" >
                    <input id="mlOtherInfo<?php echo $count; ?>" name="mlOtherInfo<?php echo $count; ?>" type="text" value="<?php echo $otherInfo; ?>"
                           onkeydown = "javascript: if (event.keyCode == 13) {
                                       document.getElementById('mlAddLnDOBDay<?php echo $count; ?>').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('mlPacketNo<?php echo $count ?>').focus();
                                       return false;
                                   }"
                           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="20" maxlength="20" placeholder="OTHER INFO"/>
                </td>
                <td  align="center">
        <?php
        include 'ormldate.php';
        ?>
                </td>
                <td align="center">
                    <div id="moreLoanCloseDiv<?php echo $count; ?>">
                        <input type="submit" id="moreLoanClose<?php echo $count; ?>" name="moreLoanClose<?php echo $count; ?>" value="" 
                               onclick ="closeMoreLoanTrDiv('<?php echo $count; ?>');
                                       return false;"
                               onkeydown="javascript:if (event.keyCode == 8) {
                                           document.getElementById('mlAddLnDOBYear<?php echo $count; ?>').focus();
                                           return false;
                                       } else if (event.keyCode == 13) {
                                           closeMoreLoanTrDiv('<?php echo $count; ?>');
                                           return false;
                                       } else {
                                           document.getElementById('moreLoan<?php echo $count; ?>').focus();
                                           return false;
                                       }"
                               class="frm-btn-delete" 
                               title="Click here to delete this loan." />
                    </div>
                </td>
                <td>
                    <div id="moreLoanDiv<?php echo $count; ?>">
                        <input type="submit" id="moreLoan<?php echo $count; ?>" name="moreLoan<?php echo $count; ?>" value="" 
                               onclick ="getMoreLoanTrDiv('<?php echo $count; ?>');
                                       return false;"
                               onkeydown="javascript:if (event.keyCode == 8) {
                                           document.getElementById('moreLoanClose<?php echo $count; ?>').focus();
                                           return false;
                                       } else if (event.keyCode == 13) {
                                           getMoreLoanTrDiv('<?php echo $count; ?>');
                                           return false;
                                       } else {
                                           document.getElementById('principalId1').focus();
                                           return false;
                                       }"
                               class="frm-btn-update" 
                               title="Click here to add more loan." />
                    </div>
                </td>
                <td width="2px">
                    <img src="<?php echo $documentRoot; ?>/images/girvi24.png" width="0.001px" height="0.001px" onload="javascript:getTotalPrinAmtTransffered();
                            return false;"/>
                </td>
    <?php } else { ?>
                <td colspan="7" align="center">
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
            <td align="left">
                <input id="addLoanNo<?php echo $count ?>" name="addLoanNo<?php echo $count ?>" type="text"    value="<?php echo $loanNo; ?>"                 
                       onkeydown = "javascript: if (event.keyCode == 13) {
                                   clearListDiv('addLoanNoList' +<?php echo $count; ?>, this.id);
                                   searchMoreLoanToTransfer(this.value, event.keyCode, 'Update');
                                   return false;
                               }
                               else if (event.keyCode == 8 && this.value == '') {
                                   clearListDiv('addLoanNoList' +<?php echo $count; ?>, this.id);
                                   return false;
                               }"
                       onclick="clearListDiv('addLoanNoList' +<?php echo $count; ?>, this.id);"
                       onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchMoreLoanToTransfer(this.value, event.keyCode, 'Update');
                               } else if (event.keyCode == 13) {
                                   if (this.value != '') {
                                       getDetailsOfSelectedLoan(this.value, '1', 'Update');
                                       return false;
                                   }
                               }" 
                       spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10"  placeholder="LOAN NO" autocomplete="off"
                       />
                <div id ="addLoanNoList<?php echo $count; ?>" class="loanNoListDiv"></div>
            </td>
    <?php if ($numLoan != 0) { ?>
                <td align="center">
                    <input id="addCustName<?php echo $count; ?>" name="addCustName<?php echo $count; ?>" type="text" value="<?php echo $customer; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="20" maxlength="10" readonly="true" placeholder="CUSTOMER"/>
                </td>
                <td align="center">
                    <input id="addPrinAmt<?php echo $count; ?>" name="addPrinAmt<?php echo $count; ?>" type="text"   value="<?php echo number_format($principle, 2, '.', ''); ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="20" maxlength="10"  placeholder="PRINCIPLE"/>
                </td>
                <td  align="center">
                    <input id="addRoi<?php echo $count; ?>" name="addRoi<?php echo $count; ?>" type="text" value="<?php echo $roi; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF text_right" size="10" maxlength="10"  placeholder="ROI"/>
                </td>
                <td  align="center">
                    <input id="addFirm<?php echo $count; ?>" name="addFirm<?php echo $count; ?>" type="text" value="<?php echo $firmName; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="FIRM"/>
                </td>
                <td  align="center">
                    <input id="addPacketNo<?php echo $count; ?>" name="addPacketNo<?php echo $count; ?>" type="text" value="<?php echo $packetNo; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10"  placeholder="PACKET NO"/> <!--remove read only @Author:ANUJA01AUG15 -->
                </td>
                <td  align="center">
                    <input id="addOtherInfo<?php echo $count; ?>" name="addOtherInfo<?php echo $count; ?>" type="text" value="<?php echo $otherInfo; ?>"
                           spellcheck="false"  class="textBoxCurve1px margin2pxAll textLabel12Calibri backFFFFFF" size="10" maxlength="10" readonly="true" placeholder="OTHER INFO"/>
                </td>
                <td  align="center">
        <?php
        include 'ormldate.php';
        ?>
                </td>
    <?php } else { ?>
                <td colspan="8" align="center">
                    <div class="main_link_red16"> ~This loan is not available for transfer! Please Select other !!~</div>
                </td>

    <?php } ?>
        </tr>
    </table>
<?php } ?>
<!-------------------------End code to change file @Author:SHRI18MAY15----------------->

