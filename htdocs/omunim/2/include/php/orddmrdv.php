<?php

/*
 * **************************************************************************************
 * @tutorial: MoneyLender Loan rel div
 * **************************************************************************************
 * 
 * Created on Dec 10, 2013 3:35:56 PM
 *
 * @FileName: orddmrdv.php
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
include 'omfrpsck.php';
$panelDDDetClick = $_GET['panelDDDetClick'];
if ($ddpanelName == 'dayBeforePanel') {
    //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$todayStrDate";
    $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
    if ($acc_cash_opening_strtodate != '')
        if ($acc_cash_opening_strtodate == $todayFromStrDate)
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$todayStrDate";
        else
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
    else
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$todayStrDate";
} else {
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
}
//
if ($ddMainPanel == 'custAccLedger'){
    $accLedStrMLLoanRel = "and ml_lender_id = '$custId'";
} else {
    $accLedStrMLLoanRel = NULL;
}
//
$qSelTotMLLoanRel = "SELECT SUM(ml_paid_amt) as total_paid_amt, SUM(ml_discount_amt) as total_discount FROM ml_loan where 
    ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) 
    and ml_ln_cr_dr = 'DR' and ml_upd_sts IN ('Released') $mlCondition order by ml_ent_dat desc";
$resTotMLLoanRel = mysqli_query($conn,$qSelTotMLLoanRel);
$rowTotMLLoanRel = mysqli_fetch_array($resTotMLLoanRel);
$totTodayMLLoanRelPrincipal = $rowTotMLLoanRel['total_paid_amt'];
$totTodayMLLoanRelDiscount = $rowTotMLLoanRel['ml_discount_amt'];
//
//Cash Account
//
$cashAccId="SELECT acc_id as cash_acc_id from accounts where acc_main_acc = 'Cash in Hand' AND acc_firm_id IN ($strFrmId)";
    $resCashAccId = mysqli_query($conn, $cashAccId) or die("Error: " . mysqli_error($conn) . " with query " . $cashAccId);
    $cashAccIdAray=array();
    while ($rowCashAccId = mysqli_fetch_array($resCashAccId, MYSQLI_ASSOC)) {
        $cash_acc_id=$rowCashAccId['cash_acc_id'];
        array_push($cashAccIdAray,$cash_acc_id);
    }
    $cash_acc_id=implode("','",$cashAccIdAray);
    $cash_acc_id=" AND ml_id NOT IN ('$cash_acc_id') ";
//
//Bank Account
//
$bankAccId="SELECT acc_id as bank_acc_id from accounts where acc_main_acc = 'Bank Account' AND acc_firm_id IN ($strFrmId)";
    $resBankAccId = mysqli_query($conn, $bankAccId) or die("Error: " . mysqli_error($conn) . " with query " . $bankAccId);
    $bankAccIdAray=array();
    while ($rowBankAccId = mysqli_fetch_array($resBankAccId, MYSQLI_ASSOC)) {
        $bank_acc_id=$rowBankAccId['bank_acc_id'];
        array_push($bankAccIdAray,$bank_acc_id);
    }
    $bank_acc_id=implode("','",$bankAccIdAray);
    $bank_acc_id=" AND ml_id NOT IN ('$bank_acc_id') "; 
//
//Online Payment
//
$onlineAccId="SELECT acc_id as online_acc_id from accounts where acc_main_acc = 'Online Payment' AND acc_firm_id IN ($strFrmId)";
    $resOnlineAccId = mysqli_query($conn, $onlineAccId) or die("Error: " . mysqli_error($conn) . " with query " . $onlineAccId);
    $onlineAccIdAray=array();
    while ($rowOnlineAccId = mysqli_fetch_array($resOnlineAccId, MYSQLI_ASSOC)) {
        $online_acc_id=$rowOnlineAccId['online_acc_id'];
        array_push($onlineAccIdAray,$online_acc_id);
    }
    $online_acc_id=implode("','",$onlineAccIdAray);
    $online_acc_id=" AND ml_id NOT IN ('$online_acc_id') "; 
//
//Card Payment
//
$cardAccId="SELECT acc_id as card_acc_id from accounts where acc_main_acc = 'Card Payment' AND acc_firm_id IN ($strFrmId)";
    $resCardAccId = mysqli_query($conn, $cardAccId) or die("Error: " . mysqli_error($conn) . " with query " . $cardAccId);
    $cardAccIdAray=array();
    while ($rowCardAccId = mysqli_fetch_array($resCardAccId, MYSQLI_ASSOC)) {
        $card_acc_id=$rowCardAccId['card_acc_id'];
        array_push($cardAccIdAray,$card_acc_id);
    }
    $card_acc_id=implode("','",$cardAccIdAray);
    $card_acc_id=" AND ml_id NOT IN ('$card_acc_id') "; 
//
//
parse_str(getTableValues("SELECT SUM(ml_paid_amt) as total_ml_cash_amt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'"
        . " $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) $cash_acc_id "
        . "and ml_ln_cr_dr = 'CR' and ml_upd_sts IN ('Released') $mlCondition order by ml_ent_dat desc;"));
//

parse_str(getTableValues("SELECT SUM(ml_paid_amt) as total_ml_bank_amt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'"
        . " $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) $bank_acc_id "
        . "and ml_ln_cr_dr = 'CR' and ml_upd_sts IN ('Released') $mlCondition order by ml_ent_dat desc;"));
//
parse_str(getTableValues("SELECT SUM(ml_paid_amt) as total_ml_online_amt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'"
        . " $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) $online_acc_id "
        . "and ml_ln_cr_dr = 'CR' and ml_upd_sts IN ('Released') $mlCondition order by ml_ent_dat desc;"));
//
parse_str(getTableValues("SELECT SUM(ml_paid_amt) as total_ml_card_amt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'"
        . " $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) $card_acc_id "
        . "and ml_ln_cr_dr = 'CR' and ml_upd_sts IN ('Released') $mlCondition order by ml_ent_dat desc;"));
//
$qSelTotMLLoanRelCr = "SELECT SUM(ml_paid_amt) as total_paid_amt, SUM(ml_discount_amt) as total_discount FROM ml_loan where 
        ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) "
        . "and ml_ln_cr_dr = 'CR' and ml_upd_sts IN ('Released') $mlCondition order by ml_ent_dat desc";
$resTotMLLoanRelCr = mysqli_query($conn,$qSelTotMLLoanRelCr);
$rowTotMLLoanRelCr = mysqli_fetch_array($resTotMLLoanRelCr);
$totalTodayMLLoanRelPrincipalCr = $rowTotMLLoanRelCr['total_paid_amt'];
$totalTodayMLLoanRelDiscountCr = $rowTotMLLoanRelCr['ml_discount_amt'];
/* START CODE TO SHOW AMOUNT IN AND AMOUNT OUT,@AUTHOR:HEMA-29MAY2020 */
if ($ddpanelName == 'dayBeforePanel') {
    $open_out_utin_cash_amt_rec += $rowTotMLLoanRelCr['total_paid_amt'];
//    $open_out_utin_pay_disc_amt += $rowTotMLLoanRelCr['ml_discount_amt'];
} else {
    $today_out_utin_cash_amt_rec += $total_ml_cash_amt;
    $today_out_utin_pay_cheque_amt += $total_ml_bank_amt;
    $today_out_utin_pay_card_amt += $total_ml_card_amt;
    $today_out_utin_online_pay_amt += $total_ml_online_amt;
}
/* END CODE TO SHOW AMOUNT IN AND AMOUNT OUT,@AUTHOR:HEMA-29MAY2020 */
?>