<?php /**
 * 
 * Created on Jul 27, 2020 11:57:06 AM
 *
 * @FileName: omTransSubDiv.php
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
 *  AUTHOR:SHRI
 *  REASON:
 *
 */
?>
<table border="0" cellspacing="1" cellpadding="1" width="100%">
    <tr>
        <td align="left" width="23%" class="textBoxCurve1px backFFFFFF" style="border:0">
            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;">
                <?php
                $prevFieldId = 'transFromMainAcc';
                $nextFieldId = 'transAmtDr1';
                $allAccountDivId = 'transToAcc1';
                if ($transDrMainAccountId != '') {
                    $accIdSelected = $transDrMainAccountId;
                } else {
                    $accIdSelected = '';
                }
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtDr1" style="padding-right:10px;width:250px;"
                   name="transAmtDr1" spellcheck="false" type="text" placeholder="AMOUNT"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transFromAcc1').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transToAcc1').focus();
                               return false;
                           }"
                   onblur="appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="20" maxlength="20" />
        </td>
        <td align="left" width="23%" class="textBoxCurve1px backFFFFFF" style="border:0">
            <input type="hidden" id="del1" name="del1" value="1" />
            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                <?php
                $prevFieldId = 'transAmtDr1';
                $nextFieldId = 'transAmtCr1';
                $allAccountDivId = 'transFromAcc1';
                if ($transCrMainAccountId != '') {
                    $accIdSelected = $transCrMainAccountId;
                } else {
                    $accIdSelected = '';
                }
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtCr1" style="padding-right: 10px;width:250px;"
                   name="transAmtCr1" spellcheck="false" type="text" placeholder="AMOUNT"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transToAcc2').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transFromAcc1').focus();
                               return false;
                           }"
                   onblur="appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td width="2%" class="padLeft3">
            <!--            <a style="cursor: pointer;" 
                           onclick="if (document.getElementById('transactionDiv<?php echo $transactionEntryCount; ?>').value == '' || document.getElementById('transactionDiv<?php echo $transactionEntryCount; ?>').value == 'true')
                                       getTransDivFunc('<?php echo $transactionEntryCount + 1; ?>', 'transactionAddDiv', '<?php echo $transactionId; ?>', '<?php echo $trans_id; ?>', '', '<?php echo $documentRootBSlash; ?>');">
                            <img src="<?php echo $documentRootBSlash; ?>/images/update16.png" alt="Click Here To New Trans Div" class="marginTop5"
                                 onload="<?php if ($panelName != 'updateusergroup') { ?>
                                                                   document.getElementById('LastDiscountPercent').focus();
            <?php } ?>"/>
                        </a>-->
        </td>
        <td width="2%" class="padLeft3">
            <!--            <a style="cursor: pointer;" 
                           onclick ="closeTransFunc('<?php echo $transactionEntryCount; ?>', '<?php echo $panelName; ?>', '<?php echo $schemeBonusEMIId; ?>', '<?php echo $kitty_id; ?>', '<?php echo $documentRootBSlash; ?>');">
                            <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" alt="delete" class="marginTop5"/>
                        </a>-->
        </td>
    </tr>
    <tr>
        <td align="left" width="23%" class="textBoxCurve1px backFFFFFF" style="border:0">
            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                <?php
                $prevFieldId = 'transAmtCr1';
                $nextFieldId = 'transAmtDr2';
                $allAccountDivId = 'transToAcc2';
                $accIdSelected = '';
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtDr2" style="padding-right: 10px;width:100%;"
                   name="transAmtDr2" spellcheck="false" type="text" placeholder="AMOUNT"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transFromAcc2').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transToAcc2').focus();
                               return false;
                           }"
                   onblur="appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td align="left"  width="23%" class="textBoxCurve1px backFFFFFF" style="border:0">
            <input type="hidden" id="del2" name="del2" value="2" />
            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                <?php
                $prevFieldId = 'transAmtDr2';
                $nextFieldId = 'transAmtCr2';
                $allAccountDivId = 'transFromAcc2';
                $accIdSelected = '';
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtCr2" style="padding-right: 10px;;width: 250px;"
                   name="transAmtCr2" spellcheck="false" type="text" placeholder="AMOUNT"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               if (this.value == '' && document.getElementById('transAmtDr2').value == '') {
                                   document.getElementById('transSub').focus();
                               } else {
                                   document.getElementById('transToAcc3').focus();
                               }
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transFromAcc2').focus();
                               return false;
                           }"
                   onblur="appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td class="padLeft3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td class="padLeft3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="6" width="100%">
            <?php include 'omTransSubDiv_1.php'; ?>
        </td>
    </tr>
    <tr>
        <td width="23%" align="right" valign="middle" class="textLabel14CalibriBoldGreen">
            <div style="font-size:18px">DR-TOTAL</div> 
        </td>
        <td width="24%" align="right" valign="middle" class="textBoxCurve1px  backFFFFFF margin1pxAll textLabel12CalibriBrown">
            <input id="transAmtDrTotal" style="padding-right:10px;font-weight: bold;font-size:16px;width: 250px;"
                   name="transAmtDrTotal" spellcheck="false" type="text" placeholder="AMOUNT" readonly="readonly"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td width="23%" align="right" valign="middle" class="textLabel14CalibriBoldRed">
            <div style="font-size:18px">CR-TOTAL</div>
        </td>
        <td width="25%" align="right" valign="middle" class="textBoxCurve1px  backFFFFFF margin1pxAll textLabel12CalibriBrown">
            <input id="transAmtCrTotal" style="padding-right:10px;font-weight: bold;font-size:16px;width: 250px;"
                   name="transAmtCrTotal" spellcheck="false" type="text" placeholder="AMOUNT" readonly="readonly"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td class="padLeft3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        </td>
        <td class="padLeft3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        </td>
    </tr>
</table>
