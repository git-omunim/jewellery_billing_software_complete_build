<?php /**
 * 
 * Created on Jul 28, 2020 11:57:06 AM
 *
 * @FileName: omTransSubDiv_1.php
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
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
$selFirmId = NULL;
if (isset($_GET['firmId'])) {
    $selFirmId = $_GET['firmId'];
} else if (isset($_POST['firmId'])) {
    $selFirmId = $_POST['firmId'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}
//echo '$selFirmId:'.$selFirmId;

if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
    parse_str(getTableValues("SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_id asc"));
    $selFirmId = $firm_id;
}
if ($transactionEntryCount == '')
    $transactionEntryCount = $_REQUEST['transactionEntryCount'];

if ($transactionEntryCount == '')
    $transactionEntryCount = 3;

//echo '$transactionEntryCount:'.$transactionEntryCount;
?>
<div id="transactionEntryDiv<?php echo $transactionEntryCount; ?>" name="transactionEntryDiv<?php echo $transactionEntryCount; ?>">
    <table border="0" cellspacing="1" cellpadding="0" width="100%">
        <tr>
            <td align="left" width="23%" class="textBoxCurve1px backFFFFFF">
                <input type="hidden" id="del<?php echo $transactionEntryCount; ?>" name="del<?php echo $transactionEntryCount; ?>" value="<?php echo $transactionEntryCount; ?>" />
                <input type="hidden" id="transactionDiv<?php echo $transactionEntryCount; ?>" name="transactionDiv<?php echo $transactionEntryCount; ?>" />
                <input type="hidden" id="noOfTransactions" name="noOfTransactions" value="<?php echo $noOfTransactions; ?>"/>
                <input type="hidden" id="addTransactionDivCount" name="addTransactionDivCount" value="<?php echo $transactionEntryCount; ?>"/>
                <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
                <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                    <?php
                    $prevFieldId = 'transAmtCr2';
                    $nextFieldId = 'transAmtDr' . $transactionEntryCount;
                    $allAccountDivId = 'transToAcc' . $transactionEntryCount;
                    $accIdSelected = '';
                    $accNameSelected = '';
                    $allAccountDivClass = 'textLabel14CalibriReq';
                    $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                    include 'omacpalt.php';
                    ?>
                </div>
            </td>
            <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
                <input id="transAmtDr<?php echo $transactionEntryCount; ?>" style="padding-right: 10px;width: 250px;"
                       name="transAmtDr<?php echo $transactionEntryCount; ?>" spellcheck="false" type="text" placeholder="AMOUNT"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('transFromAcc<?php echo $transactionEntryCount; ?>').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('transToAcc<?php echo $transactionEntryCount; ?>').focus();
                                   return false;
                               }"
                       onblur="appendDecimalsOnTransAmts();"
                       onkeyup="calcTotTransAmount();"
                       spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
            </td>
            <td align="left" width="23%" class="textBoxCurve1px backFFFFFF" style="border:0">
                <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                    <?php
                    $prevFieldId = 'transAmtDr' . $transactionEntryCount;
                    $nextFieldId = 'transAmtCr' . $transactionEntryCount;
                    $allAccountDivId = 'transFromAcc' . $transactionEntryCount;
                    $accIdSelected = '';
                    $accNameSelected = '';
                    $allAccountDivClass = 'textLabel14CalibriReq';
                    $firmIdSelected = $selFirmId;
                    include 'omacpalt.php';
                    ?>
                </div>
            </td>
            <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
                <input id="transAmtCr<?php echo $transactionEntryCount; ?>" style="padding-right:10px;width: 250px;"
                       name="transAmtCr<?php echo $transactionEntryCount; ?>" spellcheck="false" type="text" placeholder="AMOUNT"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('transSub').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('transFromAcc<?php echo $transactionEntryCount; ?>').focus();
                                   return false;
                               }"
                       onblur="appendDecimalsOnTransAmts();"
                       onkeyup="calcTotTransAmount();"
                       spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="20" maxlength="20" />
            </td>
            <?php // if($transactionEntryCount < 10){ ?>
            <td align="center" class="padLeft3">
                <a style="cursor: pointer;" 
                   onclick="if (document.getElementById('transactionDiv<?php echo $transactionEntryCount; ?>').value == '' || document.getElementById('transactionDiv<?php echo $transactionEntryCount; ?>').value == 'true')
                               getTransDivFunc('<?php echo $transactionEntryCount + 1; ?>', 'transactionAddDiv', '<?php echo $transactionId; ?>', '<?php echo $trans_id; ?>', '', '<?php echo $documentRootBSlash; ?>', '<?php echo $selFirmId; ?>');">
                    <img src="<?php echo $documentRootBSlash; ?>/images/img/add.png" alt="Click Here To New Trans Div" class="marginTop5" height="18px"/>
                </a>
            </td>
            <?php // } ?>
            <?php if ($transactionEntryCount != 3) { ?>
                <td align="right" class="padLeft3">
                    <a style="cursor: pointer;" 
                       onclick ="closeTransFunc('<?php echo $transactionEntryCount; ?>', '<?php echo $panelName; ?>', '<?php echo $schemeBonusEMIId; ?>', '<?php echo $kitty_id; ?>', '<?php echo $documentRootBSlash; ?>');">
                        <img src="<?php echo $documentRootBSlash; ?>/images/img/trash.png" alt="delete" class="marginTop5" height="18px"/>
                    </a>
                </td>
            <?php } else { ?>
                <td align="right" class="padLeft3">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            <?php } ?>
        </tr>
    </table>
</div>
<div id = "transactionAddDiv<?php echo $transactionEntryCount + 1; ?>"></div>
