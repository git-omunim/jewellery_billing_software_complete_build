<?php
/*
 * **************************************************************************************
 * @tutorial: Firm wise Voucher number
 * **************************************************************************************
 * 
 * Created on May 21, 2013 11:49:26 AM
 *
 * @FileName: omtatrvn.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpfndv.php';
?>
<?php
//change in file @AUTHOR: SANDY27JAN14
$sessionOwnerId = $_SESSION[sessionOwnerId];
$firmId = $_POST['firmNo'];

if ($firmId == '') {
    $firmId = $_GET['firmNo'];
}
if ($panel == '' || $panel == null)
    $panel = $_REQUEST['panel'];

$selDateMonth = $_POST['selectedMonth'];
$selDateYear = $_POST['selectedYear'];

//echo '$selDateMonth:' . $selDateMonth . ' $selDateYear:' . $selDateYear;
//echo '$panel == '.$panel.'<br />';
//
if ($panel == 'AddNewTransPayment') {
    $id = "transToAcc1" . $prodCount;
} else if ($panel == 'AddNewTransWithMultipleOpt' || $panel == 'updateTransaction' || $panel == 'AddNewTransDateChange') { // CONDITION ADDED @AUTHOR:SHRI14AUG20
    $id = "transactionCategory";
} else {
    $id = "transAmt";
}

/* * ****Start code to select firm name @Author:PRIYA10FEB14********** */
parse_str(getTableValues("SELECT firm_name FROM firm where firm_id=' $firmId'"));
$frm = om_strtoupper(substr($firm_name, 0, 1));
/* * ****End code to select firm name @Author:PRIYA10FEB14********** */
/* * *********************************Modified By Harshad********************************** */
/* * *******************Add Condition to Check Transaction Payment Panel Voucher no****************** */
if ($_REQUEST[panel] == 'transactionPayment') {

    $qSelPreVoucherNo = "SELECT utin_pre_invoice_no FROM user_transaction_invoice "
            . "WHERE utin_owner_id='$sessionOwnerId' "
            . "AND utin_firm_id='$firmId' "
            . "AND utin_type IN ('Transaction') "
            . "AND utin_transaction_type IN ('TransactionPayment')"
            . "ORDER BY utin_id DESC LIMIT 0,1 ";

    $resPreVoucherNo = mysqli_query($conn, $qSelPreVoucherNo) or die(mysqli_error($conn));
    $rowPreVoucherNo = mysqli_fetch_array($resPreVoucherNo, MYSQLI_ASSOC);
    $preVchNo = $rowPreVoucherNo['utin_pre_invoice_no'];

    if ($preVchNo == NULL || $preVchNo == '') {
        $preVchNo = 'V' . $frm;
        $qSelPostVoucherNo = "SELECT max(utin_invoice_no) AS nextVchNo FROM user_transaction_invoice "
                . "WHERE utin_owner_id='$sessionOwnerId' "
                . "AND utin_pre_invoice_no IS NULL "
                . "AND utin_firm_id='$firmId'"
                . "AND utin_type IN ('Transaction') "
                . "AND utin_transaction_type IN ('TransactionPayment')";
        $resPostVoucherNo = mysqli_query($conn, $qSelPostVoucherNo) or die(mysqli_error($conn));
        $rowPostVoucherNo = mysqli_fetch_array($resPostVoucherNo, MYSQLI_ASSOC);
    } else {
        $qSelPostVoucherNo = "SELECT max(utin_invoice_no) AS nextVchNo FROM user_transaction_invoice "
                . "WHERE utin_owner_id='$sessionOwnerId' "
                . "AND utin_pre_invoice_no='$preVchNo' "
                . "AND utin_firm_id='$firmId'"
                . "AND utin_type IN ('Transaction') "
                . "AND utin_transaction_type IN ('TransactionPayment')";
        $resPostVoucherNo = mysqli_query($conn, $qSelPostVoucherNo) or die(mysqli_error($conn));
        $rowPostVoucherNo = mysqli_fetch_array($resPostVoucherNo, MYSQLI_ASSOC);
    }

    $postVchNo = $rowPostVoucherNo['nextVchNo'] + 1;
} else {

    // GET PRE VOUCHER NUMBER BY FINANCIAL YEAR
    if ($panel == 'AddNewTransDateChange' || $panel == 'AddNewTransWithMultipleOpt' || $panel == 'AddNewTrans') {
        $selDateMonth = date('m', strtotime($selDateMonth)) - 1;
        if ($selDateMonth > 2) {
            $currentEndFinYear = $selDateYear + 1;
        } else {
            $currentEndFinYear = $selDateYear;
        }
    } else {
        $todayMMSel = date(n) - 1;
        if ($todayMMSel > 2) {
            $currentEndFinYear = date(Y) + 1;
        } else {
            $currentEndFinYear = date(Y);
        }
    }
    
    $currentStartFinYear = $currentEndFinYear - 1;
    $currentEndFinYearDateTimestamp = strtotime($currentEndFinYear . '-03' . '-31');
    $currentStartFinYearDateTimestamp = strtotime($currentStartFinYear . '-04' . '-01');

    $qSelPreVoucherNo = "SELECT transaction_pre_vch_id FROM transaction "
            . "where transaction_own_id='$sessionOwnerId' "
            . "and transaction_firm_id='$firmId' AND UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %M %Y')) BETWEEN '$currentStartFinYearDateTimestamp' AND '$currentEndFinYearDateTimestamp' "
            . "AND transaction_trans_id IS NULL "
            . "order by transaction_ent_dat desc LIMIT 0,1";
    $resPreVoucherNo = mysqli_query($conn, $qSelPreVoucherNo) or die(mysqli_error($conn));
    $rowPreVoucherNo = mysqli_fetch_array($resPreVoucherNo, MYSQLI_ASSOC);
    $preVchNo = $rowPreVoucherNo['transaction_pre_vch_id'];

    
    $qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' AND transaction_firm_id='$firmId' "
            . "AND UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %M %Y')) BETWEEN '$currentStartFinYearDateTimestamp' AND '$currentEndFinYearDateTimestamp' AND transaction_trans_id IS NULL";
    $resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
    $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);

    if ($preVchNo == NULL || $preVchNo == '' || $rowVoucherNo['transVoucherId'] < 1) {
        $preVchNo = 'V' . $frm; //pre Id added @Author:PRIYA10FEB14
        $qSelPostVoucherNo = "SELECT max(transaction_post_vch_id) AS nextVchNo FROM transaction "
                . "where transaction_own_id='$sessionOwnerId' AND UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %M %Y')) BETWEEN '$currentStartFinYearDateTimestamp' AND '$currentEndFinYearDateTimestamp' "
                . "and transaction_pre_vch_id IS NULL and transaction_firm_id='$firmId' AND transaction_trans_id IS NULL";
        $resPostVoucherNo = mysqli_query($conn, $qSelPostVoucherNo) or die(mysqli_error($conn));
        $rowPostVoucherNo = mysqli_fetch_array($resPostVoucherNo, MYSQLI_ASSOC);
    } else {
        $qSelPostVoucherNo = "SELECT max(transaction_post_vch_id) AS nextVchNo FROM transaction "
                . "where transaction_own_id='$sessionOwnerId' "
                . "and transaction_pre_vch_id='$preVchNo' "
                . "and transaction_firm_id='$firmId' AND transaction_trans_id IS NULL";
        $resPostVoucherNo = mysqli_query($conn, $qSelPostVoucherNo) or die(mysqli_error($conn));
        $rowPostVoucherNo = mysqli_fetch_array($resPostVoucherNo, MYSQLI_ASSOC);
    }
    $postVchNo = $rowPostVoucherNo['nextVchNo'] + 1;

    //Start Code to transaction id
    $qSelTrId = "SELECT transaction_post_vch_id FROM transaction "
            . "where transaction_post_vch_id='$postVchNo' "
            . "and transaction_pre_vch_id='$preVchNo' "
            . "and transaction_own_id='$sessionOwnerId'";
    $resSelTrId = mysqli_query($conn, $qSelTrId);
    $rowSelTrId = mysqli_fetch_array($resSelTrId, MYSQLI_ASSOC);

    $nextPostVchNo = $rowSelTrId['transaction_post_vch_id'];

    if ($nextPostVchNo != '' || $nextPostVchNo != NULL) {
        $qSelTrId = "SELECT max(transaction_post_vch_id) AS nextVchNo  FROM transaction  where transaction_pre_vch_id='$preVchNo' "
                  . "and transaction_own_id='$sessionOwnerId'";
        $resSelTrId = mysqli_query($conn, $qSelTrId);
        $rowSelTrId = mysqli_fetch_array($resSelTrId, MYSQLI_ASSOC);
        $postVchNo = $rowSelTrId['nextVchNo'] + 1;
    }
}
//echo '$postVchNo:'.$postVchNo;
//comment @AUTHOR: SANDY25JAN14*/
?>
<!---Change in class of input field @AUTHOR: SANDY06JAN14 --->
<table border="0" cellpadding="0" cellspacing="0" >
    <tr>
        <td><!---CHANGE @AUTHOR: SANDY03FEB14---->
            <input id="transPreVoucherNo" name="transPreVoucherNo" type="text" placeholder="VCH" value="<?php echo $preVchNo; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transPostVoucherNo').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transFirmId').focus();
                               return false;
                           }"
                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" /> 

            <input id="transFirmVoucherNo" name="transFirmVoucherNo" type="hidden" readonly="true" value="<?php echo $firmId; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transPostVoucherNo').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transPreVoucherNo').focus();
                               return false;
                           }"
                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" />
        </td>
        <td align="left"  class="inputBox14CalibriReqCenter">
            &minus;
        </td>
        <td>
            <input id="transPostVoucherNo" name="transPostVoucherNo" type="text" placeholder="Voucher No" value="<?php echo $postVchNo; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('<?php echo $id ?>').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transPreVoucherNo').focus();
                               return false;
                           }"
                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="5" maxlength="16" />
        </td>
    </tr>
</table>