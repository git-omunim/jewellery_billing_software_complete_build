<?php
/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: omuntdnu.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
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
//
$totalTodayNewUdhaar = 0;
//
include 'omfrpsck.php';
//
if ($ddpanelName == 'dayBeforePanel') {
    //
    //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    //
    $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
    if ($acc_cash_opening_strtodate != '')
        if ($acc_cash_opening_strtodate == $todayFromStrDate)
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
        else
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
    else
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
} else {
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
}
//
if ($ddMainPanel == 'custAccLedger'){
    $accLedStrUdhAdd = "and utin_user_id = '$custId'";
} else {
    $accLedStrUdhAdd = NULL;
}
//
//
/*****************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-01JULY17************************/
//
// CHANGED CODE FOR OPENING BALANCE ISSUE @Author:PRIYANKA-06JUNE2023
$qSelectTodaysUdaar = "SELECT SUM(utin_total_amt) as total_udhaar, "
                    . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
                    . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
                    . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
                    . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
                    . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
                    . "SUM(utin_discount_amt) as utin_discount_amt "
                    . "FROM user_transaction_invoice "
                    . "where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrUdhAdd "
                    . "and utin_transaction_type IN('UDHAAR','OnPurchase') and utin_type = 'udhaar' "
                    . "and utin_other_info NOT LIKE '%OPENING BALANCE%' "
                    . "and utin_type NOT IN('OnPurchase') and utin_status IN ('New','Updated','Paid') "
                    . "and utin_firm_id IN ($strFrmId)";
//
$qResultTodaysUdaar = mysqli_query($conn,$qSelectTodaysUdaar);
$rowTodaysUdaar = mysqli_fetch_array($qResultTodaysUdaar, MYSQLI_ASSOC);
$totalTodayNewUdhaar = $rowTodaysUdaar['total_udhaar'];
//
//
/* START CODE TO ADD UDHAAR AMOUNT GIVEN BY VYCASH OPTION,@AUTHOR:HEMA-2JUL2020 */
$todaysCashRecevedByPaymentPanel = $rowTodaysUdaar['utin_cash_amt_rec'];
//
$todaysCashReceivedDireactly = $totalTodayNewUdhaar - $rowTodaysUdaar['utin_cash_amt_rec'] - $rowTodaysUdaar['utin_pay_cheque_amt']- $rowTodaysUdaar['utin_pay_card_amt']- $rowTodaysUdaar['utin_online_pay_amt'];
/* END CODE TO ADD UDHAAR AMOUNT GIVEN BY VYCASH OPTION,@AUTHOR:HEMA-2JUL2020 */
//
//
//if ($panelName != 'TodaysUdhaar') {
    //
    //
    // CHANGED CODE FOR OPENING BALANCE ISSUE @Author:PRIYANKA-06JUNE2023
    $qSelectTotalUdaar = "SELECT SUM(utin_total_amt) as total_udhaar, "
                       . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
                       . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
                       . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
                       . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
                       . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
                       . "SUM(utin_discount_amt) as utin_discount_amt "
                       . "FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
                       . "and utin_transaction_type IN ('UDHAAR','OnPurchase') $dateStr "
                       . "and utin_type NOT IN('OnPurchase') and utin_status IN ('New','Updated','Paid') "
                       . "and utin_other_info NOT LIKE '%OPENING BALANCE%' "
                       . "and utin_firm_id IN ($strFrmId)";
    //
    $qResultTotalUdaar = mysqli_query($conn,$qSelectTotalUdaar);
    $rowTotalUdaar = mysqli_fetch_array($qResultTotalUdaar, MYSQLI_ASSOC);
    $totalNewUdhaar = $rowTotalUdaar['total_udhaar'];
    //
    /* START CODE TO ADD UDHAAR AMOUNT GIVEN BY VYCASH OPTION,@AUTHOR:HEMA-2JUL2020 */
    $totalCashRecevedByPaymentPanel = $rowTotalUdaar['utin_cash_amt_rec'];
    //
    $totalCashReceivedDireactly = $totalNewUdhaar - $rowTotalUdaar['utin_cash_amt_rec'] - $rowTotalUdaar['utin_pay_cheque_amt']- $rowTotalUdaar['utin_pay_card_amt']- $rowTotalUdaar['utin_online_pay_amt'];
    /* END CODE TO ADD UDHAAR AMOUNT GIVEN BY VYCASH OPTION,@AUTHOR:HEMA-2JUL2020 */
    //
    //
    //echo formatInIndianStyle($totalNewUdhaar);
    //echo '<br/>$qSelectTotalUdaar=='.$qSelectTotalUdaar;
    //
    //
//}
//
//
//echo '<br/>$totalCashReceivedDireactly=='.$totalCashReceivedDireactly;
//
//    
/******************START CODE TO ADD TOTAL UDHARR OUT AMOUNT,@AUTHOR:HEMA-5MAY2020*******************************/
if ($ddpanelName == 'dayBeforePanel') {
    $open_out_utin_cash_amt_rec += $rowTodaysUdaar['utin_cash_amt_rec'] + $totalCashReceivedDireactly;
    $open_out_utin_pay_cheque_amt += $rowTodaysUdaar['utin_pay_cheque_amt'];
    $open_out_utin_pay_card_amt += $rowTodaysUdaar['utin_pay_card_amt'];
    $open_out_utin_online_pay_amt += $rowTodaysUdaar['utin_online_pay_amt'];
    $open_out_utin_pay_comm_paid += $rowTodaysUdaar['utin_pay_comm_paid'];
    $open_out_utin_pay_disc_amt += $rowTodaysUdaar['utin_discount_amt'];
//
} else {
    //
    $today_out_utin_cash_amt_rec += $rowTodaysUdaar['utin_cash_amt_rec'] + $todaysCashReceivedDireactly;
    $today_out_utin_pay_cheque_amt += $rowTodaysUdaar['utin_pay_cheque_amt'];
    $today_out_utin_pay_card_amt += $rowTodaysUdaar['utin_pay_card_amt'];
    $today_out_utin_online_pay_amt += $rowTodaysUdaar['utin_online_pay_amt'];
    $today_out_utin_pay_comm_paid += $rowTodaysUdaar['utin_pay_comm_paid'];
    $today_out_utin_pay_disc_amt += $rowTodaysUdaar['utin_discount_amt'];
}
?>