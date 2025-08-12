<?php
/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: omuntddp.php
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
    $accLedStrUdhDep = "and utin_user_id = '$custId'";
} else {
    $accLedStrUdhDep = NULL;
}
//
if ($panelDDDetClick == 'ddDetClick') {
    $invId = $_GET['tableId'];
    $strFrmId = $_GET['firmId'];
    $todayFromStrDate = $_GET['fromDate'];
    $todayToStrDate = $_GET['toDate'];
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    $qSelTodayNewUdhaarDeposit = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_type = 'UDHAAR' and utin_transaction_type IN ('UDHAAR DEPOSIT') and utin_status IN ('New','Updated','Deleted','PAID')and utin_id = '$invId'";
} else {
    $qSelTodayNewUdhaarDeposit = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrNewOrder and utin_type = 'UDHAAR' and utin_transaction_type IN ('UDHAAR DEPOSIT') and utin_status IN ('New','Updated','Deleted','PAID') and utin_firm_id IN ($strFrmId) order by "
                               . "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy";
}
//
//
$resTodayNewUdhaarDeposit = mysqli_query($conn, $qSelTodayNewUdhaarDeposit);
//
//    
if ($resTodayNewUdhaarDeposit) {
//
$totalTodayNewUdhaarDeposit = mysqli_num_rows($resTodayNewUdhaarDeposit);
//
//
if ($totalTodayNewUdhaarDeposit > 0) {
//
//
//$totalTodayNewUdhaarDeposit = 0;
//      
//    
/*****************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17************************/
$qSelect = "SELECT SUM(utin_total_amt_deposit) as total, "
        . "SUM(utin_udhaar_int_amt) as total_int_rec, "
        . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
        . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
        . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
        . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
        . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
        . "SUM(utin_discount_amt) as utin_discount_amt "
        . "FROM user_transaction_invoice where "
        . "utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrUdhDep "
        . "and utin_status IN ('New','Updated','Deleted','PAID') and utin_firm_id IN ($strFrmId) "
        . "and utin_type='UDHAAR' and  utin_transaction_type = 'UDHAAR DEPOSIT' "
        . "and (utin_EMI_status  IN ('Paid') or utin_EMI_status IS NULL)"; //EMI Status condition added @Author:SHRI29MAY15 //status deleted added @Author:PRIYA17OCT13
//
$qResultdep = mysqli_query($conn,$qSelect);
$rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
//
$todaysudhaarDeposit = ($rowdep['total'] + $rowdep['total_int_rec'])-$rowdep['utin_discount_amt'];
//
//
if ($panelName != 'TodaysUdhaarDeposit') {
    //
    $qSelectTotalTillToday = "SELECT SUM(utin_total_amt_deposit) as total, "
        . "SUM(utin_udhaar_int_amt) as total_int_rec, "
        . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
        . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
        . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
        . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
        . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
        . "SUM(utin_discount_amt) as utin_discount_amt "
        . "FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
        . "and utin_date<='$todayDate' and utin_status IN ('New','Updated','Deleted','PAID') "
        . "and  utin_transaction_type = 'UDHAAR DEPOSIT' and utin_firm_id IN ($strFrmId) "
        . "and (utin_EMI_status  IN ('Paid') or utin_EMI_status IS NULL)"; //EMI Status condition added @Author:SHRI29MAY15 //status deleted added @Author:PRIYA17OCT13
    //
    $qResultTotalTillToday = mysqli_query($conn,$qSelectTotalTillToday);
    $rowTotalTillToday = mysqli_fetch_array($qResultTotalTillToday, MYSQLI_ASSOC);
    //
    $totalTillToday = ($rowTotalTillToday['total'] + $rowTotalTillToday['total_int_rec']);
    //
    echo formatInIndianStyle($totalTillToday);
    //
}
//
//
//
/**********START CODE TO ADD TOTAL UDHARR IN AMOUNT,@AUTHOR:HEMA-5MAY2020***************/
if ($ddpanelName == 'dayBeforePanel') {
    //
    $open_in_utin_cash_amt_rec += ($rowdep['utin_cash_amt_rec'] + $rowdep['total_int_rec']);
    $open_in_utin_pay_cheque_amt += $rowdep['utin_pay_cheque_amt'];
    $open_in_utin_pay_card_amt += $rowdep['utin_pay_card_amt'];
    $open_in_utin_online_pay_amt += $rowdep['utin_online_pay_amt'];
    $open_in_utin_pay_comm_paid += $rowdep['utin_pay_comm_paid'];
    $open_in_utin_pay_disc_amt += $rowdep['utin_discount_amt'];
    //
} else {
    //
    $today_in_utin_cash_amt_rec += ($rowdep['utin_cash_amt_rec'] + $rowdep['total_int_rec']);
    $today_in_utin_pay_cheque_amt += $rowdep['utin_pay_cheque_amt'];
    $today_in_utin_pay_card_amt += $rowdep['utin_pay_card_amt'];
    $today_in_utin_online_pay_amt += $rowdep['utin_online_pay_amt'];
    $today_in_utin_pay_comm_paid += $rowdep['utin_pay_comm_paid'];
    $today_in_utin_pay_disc_amt += $rowdep['utin_discount_amt'];
    //
    }
    //
    }
}
/**********END CODE TO ADD TOTAL UDHARR IN AMOUNT,@AUTHOR:HEMA-5MAY2020***************/
/*****************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17************************/
/* if ($_SESSION['sessionIgenType'] == $globalOwnPass) {

  if ($selFirmId != NULL) {
  $strFrmId = $selFirmId;
  } else {
  //Get Public Firms
  $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
  $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

  $strFrmId = '0';

  //Set String for Public Firms
  while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
  $strFrmId = $strFrmId . ",";
  $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
  }
  }
  /* $qSelectdep = "SELECT SUM(utin_total_amt) as total_udhadepo FROM udhaar_deposit where utin_owner_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE( utin_date,'%d %b %Y'))=$girviDORStrToTime and utin_status IN ('New','Updated') and utin_firm_id IN ($strFrmId)"; */
/* $qSelectdep = "SELECT SUM(utin_total_amt) as total_udhadepo FROM udhaar_deposit where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_date='$todayDate' and utin_status IN ('New','Updated') and utin_firm_id IN ($strFrmId)";
  $qResultdep = mysqli_query($conn,$qSelectdep);
  $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
  $todaysDeposit = $rowdep['total_udhadepo']; */

//     //Get Public Firms
//      $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
//      $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
//
//      $strFrmId = '0';
//
//      //Set String for Public Firms
//      while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
//      $strFrmId = $strFrmId . ",";
//      $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
//      }
//Get Total Principal Amount from udhadepo Table
/*   if ($firmIdSelected != NULL) {
  $qSelect = "SELECT SUM(utin_total_amt) as total_udhadepo FROM udhaar_deposit where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_date='$todayDate' and utin_status IN ('New','Updated') and utin_firm_id='$firmIdSelected'";
  } else {
  $qSelect = "SELECT SUM(utin_total_amt) as total_udhadepo FROM udhaar_deposit where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_date='$todayDate' and utin_status IN ('New','Updated') and utin_firm_id IN ($strFrmId)";
  }  //comment @AUTHOR: SANDY4JUL13
  } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

  //Get Total Principal Amount from udhadepo Table
  /* if ($selFirmId != NULL) {
  $qSelectdep = "SELECT SUM(utin_total_amt) as total_udhadepo FROM udhaar_deposit where utin_owner_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE( utin_date,'%d %b %Y'))=$girviDORStrToTime and utin_status IN ('New','Updated') and utin_firm_id IN ($selFirmId)";
  } else {
  $qSelectdep = "SELECT SUM(utin_total_amt) as total_udhadepo FROM udhaar_deposit where utin_owner_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE( utin_date,'%d %b %Y'))=$girviDORStrToTime and utin_status IN ('New','Updated')";
  }
  } */
?>