<?php /**
 * 
 * Created on Jul 27, 2020 11:57:06 AM
 *
 * @FileName: omTransUpdSubDiv.php
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
// GET ALL TRANSACTIONS COUNT
$qSelTotalSubTransCount = "SELECT transaction_id FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_trans_id='$transId'";
$resTotalSubTransCount = mysqli_query($conn, $qSelTotalSubTransCount) or die(mysqli_error($conn));
$noOfTransactions = mysqli_num_rows($resTotalSubTransCount);
//echo '$noOfTransactions:'.$noOfTransactions;
//
// SELECT FIRST SUB TRANSACTION ENTRY DETAILS
$qSelFirstTransactionsDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_trans_id='$transId' order by transaction_id ASC LIMIT 0,1";
$resFirstTransactionsDetails = mysqli_query($conn, $qSelFirstTransactionsDetails) or die(mysqli_error($conn));
$rowFirstTransactionsDetails = mysqli_fetch_array($resFirstTransactionsDetails, MYSQLI_ASSOC);
$firstTransId = $rowFirstTransactionsDetails['transaction_id'];


// SELECT SECOND SUB TRANSACTION ENTRY DETAILS
$qSelSecondTransactionsDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_trans_id='$transId' order by transaction_id ASC LIMIT 1,2";
$resSecondTransactionsDetails = mysqli_query($conn, $qSelSecondTransactionsDetails) or die(mysqli_error($conn));
$rowSecondTransactionsDetails = mysqli_fetch_array($resSecondTransactionsDetails, MYSQLI_ASSOC);
$secondTransId = $rowSecondTransactionsDetails['transaction_id'];

// SELECT ALL TRANSACTIONS FROM 3RD ENTRY
$qSelAllTransactionsDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_trans_id='$transId' order by transaction_id ASC LIMIT 2,10";
$resAllTransactionsDetails = mysqli_query($conn, $qSelAllTransactionsDetails) or die(mysqli_error($conn));
$noOfTransactionsAftSecondTrans = mysqli_num_rows($resAllTransactionsDetails);
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="left" width="23%" class="textBoxCurve1px backFFFFFF">
            <input type="hidden" id="noOfTransactions" name="noOfTransactions" value="<?php echo $noOfTransactions; ?>"/>
            <input type="hidden" id="del1" name="del1" value="1" />
            <input type="hidden" id="transId1" name="transId1" value="<?php echo $firstTransId; ?>" />
            <input type="hidden" id="panelName" name="panelName" value="UpdateTransaction" />
            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                <?php
                $prevFieldId = 'transFromMainAcc';
                $nextFieldId = 'transAmtDr1';
                $allAccountDivId = 'transToAcc1';
                if ($transDrMainAccountId != '') {
                    $accIdSelected = $transDrMainAccountId;
                } else {
                    $accIdSelected = $rowFirstTransactionsDetails['transaction_to_dr_acc_id'];
                }
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtDr1" style="padding-right:10px;width: 250px;"
                   name="transAmtDr1" spellcheck="false" type="text" placeholder="AMOUNT" value="<?php echo $rowFirstTransactionsDetails['transaction_dr_amt']; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transFromAcc1').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transToAcc1').focus();
                               return false;
                           }"
                   onblur="if (this.value == '') {
                               this.value = '<?php echo $rowFirstTransactionsDetails['transaction_dr_amt']; ?>';
                           }
                           appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td align="left" width="23%" class="textBoxCurve1px backFFFFFF">
            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                <?php
                $prevFieldId = 'transAmtDr1';
                $nextFieldId = 'transAmtCr1';
                $allAccountDivId = 'transFromAcc1';
                if ($transDrMainAccountId != '') {
                    $accIdSelected = $transCrMainAccountId;
                } else {
                    $accIdSelected = $rowFirstTransactionsDetails['transaction_from_cr_acc_id'];
                }
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtCr1" style="padding-right:10px;width: 250px;"
                   name="transAmtCr1" spellcheck="false" type="text" placeholder="AMOUNT" value="<?php echo $rowFirstTransactionsDetails['transaction_cr_amt']; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transToAcc2').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transFromAcc1').focus();
                               return false;
                           }"
                   onblur="if (this.value == '') {
                               this.value = '<?php echo $rowFirstTransactionsDetails['transaction_cr_amt']; ?>';
                           }
                           appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td width="2%" class="padLeft3">

        </td>
        <td width="2%" class="padLeft3">

        </td>

    </tr>
    <tr>

        <td align="left" width="23%" class="textBoxCurve1px backFFFFFF">
            <input type="hidden" id="del2" name="del2" value="2" />
            <input type="hidden" id="transId2" name="transId2" value="<?php echo $secondTransId; ?>" />
            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                <?php
                $prevFieldId = 'transAmtCr1';
                $nextFieldId = 'transAmtDr2';
                $allAccountDivId = 'transToAcc2';
                $accIdSelected = $rowSecondTransactionsDetails['transaction_to_dr_acc_id'];
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtDr2" style="padding-right:10px;width: 250px;"
                   name="transAmtDr2" spellcheck="false" type="text" placeholder="AMOUNT" value="<?php echo $rowSecondTransactionsDetails['transaction_dr_amt']; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transFromAcc2').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transToAcc2').focus();
                               return false;
                           }"
                   onblur="if (this.value == '') {
                               this.value = '<?php echo $rowSecondTransactionsDetails['transaction_dr_amt']; ?>';
                           }
                           appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td align="left"  width="23%" class="textBoxCurve1px backFFFFFF">
            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                <?php
                $prevFieldId = 'transAmtDr2';
                $nextFieldId = 'transAmtCr2';
                $allAccountDivId = 'transFromAcc2';
                $accIdSelected = $rowSecondTransactionsDetails['transaction_from_cr_acc_id'];
                $accNameSelected = '';
                $allAccountDivClass = 'textLabel14CalibriReq';
                $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                include 'omacpalt.php';
                ?>
            </div>
        </td>
        <td align="right" width="25%" class="textBoxCurve1px  backFFFFFF margin1pxAll">
            <input id="transAmtCr2" style="padding-right:10px;width: 250px;"
                   name="transAmtCr2" spellcheck="false" type="text" placeholder="AMOUNT" value="<?php echo $rowSecondTransactionsDetails['transaction_cr_amt']; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                   <?php if ($noOfTransactionsAftSecondTrans > 0) { ?>
                                   document.getElementById('transToAcc3').focus();
                   <?php } else { ?>
                                   document.getElementById('transSub').focus();
                   <?php } ?>
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transFromAcc2').focus();
                               return false;
                           }"
                   onblur="if (this.value == '') {
                               this.value = '<?php echo $rowSecondTransactionsDetails['transaction_cr_amt']; ?>';
                           }
                           appendDecimalsOnTransAmts();"
                   onkeyup="calcTotTransAmount();"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td class="padLeft3">

        </td>
        <td class="padLeft3">

        </td>
    </tr>
    <tr>
        <td colspan="6" width="100%">
            <?php include 'omTransUpdSubDiv_1.php'; ?>
        </td>
    </tr>
    <tr>
        <td width="23%" align="center" valign="middle" class="textLabel14CalibriBoldGreen">
            DR-TOTAL 
        </td>
        <td width="24%" align="right" valign="middle" class="textBoxCurve1px  backFFFFFF margin1pxAll textLabel12CalibriBrown">
            <input id="transAmtDrTotal" style="padding-right:10px;font-weight: bold;font-size:16px;width: 250px;"
                   name="transAmtDrTotal" spellcheck="false" type="text" placeholder="AMOUNT" readonly="readonly"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td width="23%" align="center" valign="middle" class="textLabel14CalibriBoldRed">
            CR-TOTAL
        </td>
        <td width="25%" align="right" valign="middle" class="textBoxCurve1px  backFFFFFF margin1pxAll textLabel12CalibriBrown">
            <input id="transAmtCrTotal" style="padding-right:10px;font-weight: bold;font-size:16px;width: 250px;"
                   name="transAmtCrTotal" spellcheck="false" type="text" placeholder="AMOUNT" readonly="readonly"
                   spellcheck="false" class="border-no inputBox14CalibriReqRight backFFFFFF" size="15" maxlength="20" />
        </td>
        <td class="padLeft3">

        </td>
        <td class="padLeft3">

        </td>
    </tr>
</table>
