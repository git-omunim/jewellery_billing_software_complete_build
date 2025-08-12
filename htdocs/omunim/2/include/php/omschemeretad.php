<?php

/*
 * **************************************************************************************
 * @tutorial: SCHEME RETURN RETURN AMOUNT IN AND AMOUNT OUT FILE
 * **************************************************************************************
 * 
 * Created on july 2, 2020 12:23:34 PM
 *
 * @FileName: omschemeretad.php
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
require_once 'ommpincr.php';
?>
<?php

if ($todayDate == '' || $todayDate == NULL) {
    $todayDate = date("d M Y");
}
$todaysDeposit = 0;
include 'omfrpsck.php';
if ($ddpanelName == 'dayBeforePanel') {
    $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
    if ($acc_cash_opening_strtodate != '') {
        if ($acc_cash_opening_strtodate == $todayFromStrDate)
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
        else
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    }
} else {
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
}
//
if ($ddMainPanel == 'custAccLedger') {
    $accLedStrSell = "and utin_user_id = '$custId'";
} else {
    $accLedStrSell = NULL;
}
// change condition sum Author:GAUR25APR16
$qSelectTotalSchemeReturn = "SELECT SUM(utin_cash_amt_rec + utin_pay_cheque_amt + (utin_pay_card_amt + utin_pay_trans_chrg)+(utin_online_pay_amt - utin_pay_comm_paid)) as total_sell_cash_amt_rec, "
        . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
        . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
        . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
        . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
        . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
        . "SUM(utin_discount_amt) as utin_discount_amt "
        . "FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSell and utin_firm_id IN ($strFrmId) and  utin_transaction_type IN ('DEPOSIT','SCHEME RETURN') and utin_type='scheme' and utin_utin_id != ''";
$qResultTotalSchemeReturn = mysqli_query($conn, $qSelectTotalSchemeReturn);
$rowTotalSchemeReturn = mysqli_fetch_array($qResultTotalSchemeReturn, MYSQLI_ASSOC);
$totalTodaySchemeReturn = $rowTotalSchemeReturn['total_sell_cash_amt_rec'];
//
if ($ddpanelName == 'dayBeforePanel') {
    $open_out_utin_cash_amt_rec += $rowTotalSchemeReturn['utin_cash_amt_rec'];
    $open_out_utin_pay_cheque_amt += $rowTotalSchemeReturn['utin_pay_cheque_amt'];
    $open_out_utin_pay_card_amt += $rowTotalSchemeReturn['utin_pay_card_amt'];
    $open_out_utin_online_pay_amt += $rowTotalSchemeReturn['utin_online_pay_amt'];
    $open_out_utin_pay_comm_paid += $rowTotalSchemeReturn['utin_pay_comm_paid'];
    $open_out_utin_pay_disc_amt += $rowTotalSchemeReturn['utin_discount_amt'];
} else {
    $today_out_utin_cash_amt_rec += $rowTotalSchemeReturn['utin_cash_amt_rec'];
    $today_out_utin_pay_cheque_amt += $rowTotalSchemeReturn['utin_pay_cheque_amt'];
    $today_out_utin_pay_card_amt += $rowTotalSchemeReturn['utin_pay_card_amt'];
    $today_out_utin_online_pay_amt += $rowTotalSchemeReturn['utin_online_pay_amt'];
    $today_out_utin_pay_comm_paid += $rowTotalSchemeReturn['utin_pay_comm_paid'];
    $today_out_utin_pay_disc_amt += $rowTotalSchemeReturn['utin_discount_amt'];
}
?>