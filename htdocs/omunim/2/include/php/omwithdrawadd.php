<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: omwithdrawadd.php
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

include 'omfrpsck.php';
if ($ddpanelName == 'dayBeforePanel') {
    //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
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
    $accLedStrDepAdd = "and utin_user_id = '$custId'";
} else {
    $accLedStrDepAdd = NULL;
}
//
$totalTodayNewUdhaarDeposit = 0;
/*****************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17************************/
$qSelect = "SELECT SUM(utin_tot_payable_amt) as total_udhadepo FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]'$dateStr $accLedStrDepAdd and "
        . "utin_status IN ('New') and utin_firm_id IN ($strFrmId) "
        . "and utin_type='udhaar' and  utin_transaction_type = 'UDHAAR' and utin_history = 'WITHDRAW'"; //EMI Status condition added @Author:SHRI29MAY15 //status deleted added @Author:PRIYA17OCT13
//echo '$qSelect =='.$qSelect;
$qResultdep = mysqli_query($conn,$qSelect);
$rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC); 
$todaysudhaarDeposit = $rowdep['total_udhadepo'];
//echo '$todaysudhaarDeposit =='.$todaysudhaarDeposit;

if ($panelName != 'TodaysUdhaarDeposit') {
    $qSelectTotalTillToday = "SELECT SUM(utin_tot_payable_amt) as total FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
            . "and utin_date<='$todayDate' and utin_status IN ('New')"
            . " and  utin_transaction_type = 'UDHAAR' and utin_history = 'WITHDRAW' and utin_firm_id IN ($strFrmId)"; //EMI Status condition added @Author:SHRI29MAY15 //status deleted added @Author:PRIYA17OCT13
    $qResultTotalTillToday = mysqli_query($conn,$qSelectTotalTillToday);
    $rowTotalTillToday = mysqli_fetch_array($qResultTotalTillToday, MYSQLI_ASSOC);
    $totalTillToday = $rowTotalTillToday['total'];
    echo formatInIndianStyle($totalTillToday);
}
?>