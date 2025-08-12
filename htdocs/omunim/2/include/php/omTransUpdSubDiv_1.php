<?php /**
 * 
 * Created on Jul 28, 2020 11:57:06 AM
 *
 * @FileName: omTransUpdSubDiv_1.php
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
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}

if ($noOfTransactionsAftSecondTrans > 0) {
    $transactionEntryCount = 3;
}


while ($rowAllTransactionsDetails = mysqli_fetch_array($resAllTransactionsDetails, MYSQLI_ASSOC)) {
    $subTransId = $rowAllTransactionsDetails['transaction_id'];
    $mainTransId = $rowAllTransactionsDetails['transaction_trans_id'];
    ?>
    <div id="transactionEntryDiv<?php echo $transactionEntryCount; ?>" name="transactionEntryDiv<?php echo $transactionEntryCount; ?>">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left" width="23%" class="textBoxCurve1px backFFFFFF">
                    <input type="hidden" id="del<?php echo $transactionEntryCount; ?>" name="del<?php echo $transactionEntryCount; ?>" value="<?php echo $transactionEntryCount; ?>" />
                    <input type="hidden" id="transactionDiv<?php echo $transactionEntryCount; ?>" name="transactionDiv<?php echo $transactionEntryCount; ?>" />
                    <input type="hidden" id="addTransactionDivCount" name="addTransactionDivCount" value="<?php echo $transactionEntryCount; ?>"/>
                    <input type="hidden" id="panelName" name="panelName" value="updateTransaction"/>
                    <input type="hidden" id="transId<?php echo $transactionEntryCount; ?>" name="transId<?php echo $transactionEntryCount; ?>" value="<?php echo $subTransId; ?>" />
                    <div class="selectStyledBorderLess backFFFFFF floatLeft">
                        <?php
                        $prevFieldId = 'transAmtCr2';
                        $nextFieldId = 'transAmtDr' . $transactionEntryCount;
                        $allAccountDivId = 'transToAcc' . $transactionEntryCount;
                        $accIdSelected = $rowAllTransactionsDetails['transaction_to_dr_acc_id'];
                        $accNameSelected = '';
                        $allAccountDivClass = 'textLabel14CalibriReq';
                        $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                        include 'omacpalt.php';
                        ?>
                    </div>
                </td>
                <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
                    <input id="transAmtDr<?php echo $transactionEntryCount; ?>" style="padding-right:10px"
                           name="transAmtDr<?php echo $transactionEntryCount; ?>" spellcheck="false" type="text" placeholder="AMOUNT" value="<?php echo $rowAllTransactionsDetails['transaction_dr_amt']; ?>"
                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('transFromAcc'.$transactionEntryCount').focus();
                                               return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('transToAcc<?php echo $transactionEntryCount; ?>').focus();
                                       return false;
                                   }"
                           onblur="if (this.value == '') {
                                       this.value = '<?php echo $rowAllTransactionsDetails['transaction_dr_amt']; ?>';
                                   }
                                   appendDecimalsOnTransAmts();"
                           onkeyup="calcTotTransAmount();"
                           spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
                </td>
                <td align="left" width="23%" class="textBoxCurve1px backFFFFFF">
                    <div class="selectStyledBorderLess backFFFFFF floatLeft">
                        <?php
                        $prevFieldId = 'transAmtDr' . $transactionEntryCount;
                        $nextFieldId = 'transAmtCr' . $transactionEntryCount;
                        $allAccountDivId = 'transFromAcc' . $transactionEntryCount;
                        $accIdSelected = $rowAllTransactionsDetails['transaction_from_cr_acc_id'];
                        $accNameSelected = '';
                        $allAccountDivClass = 'textLabel14CalibriReq';
                        $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                        include 'omacpalt.php';
                        ?>
                    </div>
                </td>
                <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
                    <input id="transAmtCr<?php echo $transactionEntryCount; ?>" style="padding-right:10px"
                           name="transAmtCr<?php echo $transactionEntryCount; ?>" spellcheck="false" type="text" placeholder="AMOUNT" value="<?php echo $rowAllTransactionsDetails['transaction_cr_amt']; ?>"
                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('transSub').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('transFromAcc<?php echo $transactionEntryCount; ?>').focus();
                                       return false;
                                   }"
                           onblur="if (this.value == '') {
                                       this.value = '<?php echo $rowAllTransactionsDetails['transaction_cr_amt']; ?>';
                                   }
                                   appendDecimalsOnTransAmts();"
                           onkeyup="calcTotTransAmount();"
                           spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
                </td>
                <?php // if($transactionEntryCount < 10){ ?>
    <!--            <td align="center" class="padLeft3">
                    <a style="cursor: pointer;" 
                       onclick="if (document.getElementById('transactionDiv<?php echo $transactionEntryCount; ?>').value == '' || document.getElementById('transactionDiv<?php echo $transactionEntryCount; ?>').value == 'true')
                                   getTransDivFunc('<?php echo $transactionEntryCount + 1; ?>', 'transactionAddDiv', '<?php echo $transactionId; ?>', '<?php echo $trans_id; ?>', '', '<?php echo $documentRootBSlash; ?>', '<?php echo $selFirmId; ?>');">
                        <img src="<?php echo $documentRootBSlash; ?>/images/update16.png" alt="Click Here To New Trans Div" class="marginTop5"
                             onload="<?php if ($panelName != 'updateusergroup') { ?>
                                                               document.getElementById('LastDiscountPercent').focus();
                <?php } ?>"/>
                    </a>
                </td>-->
                <?php // } ?>
                <?php if ($transactionEntryCount != 3) { ?>
                    <td align="right" class="padLeft3">
                        <a style="cursor: pointer;" 
                           onclick ="closeTransFunc('<?php echo $transactionEntryCount; ?>', 'updateTransactions', '<?php echo $mainTransId; ?>', '<?php echo $subTransId; ?>', '<?php echo $documentRootBSlash; ?>');">
                            <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" alt="delete" class="marginTop5"/>
                        </a>
                    </td>
                <?php } else { ?>
                    <td align="right" class="padLeft3">
                    </td>
                <?php } ?>
            </tr>
        </table>
    </div>
    <?php
    $transactionEntryCount++;
}
?>
<div id = "transactionAddDiv<?php echo $transactionEntryCount + 1; ?>"></div>

