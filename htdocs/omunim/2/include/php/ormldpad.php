<?php

/*
 * **************************************************************************************
 * @tutorial:DD Money Lender Dep ad
 * **************************************************************************************
 * 
 * Created on Dec 12, 2013 11:51:34 AM
 *
 * @FileName: ormldpad.php
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
?>
<?php
$totalDepositMLLoanMoney = 0;
if ($ddpanelName == 'dayBeforePanel') {
    //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))<$todayStrDate";
    $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
    if ($acc_cash_opening_strtodate != '')
        if ($acc_cash_opening_strtodate == $todayFromStrDate)
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))<$todayStrDate";
        else
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
    else
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y'))<$todayStrDate";
} else {
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
}
//
if ($ddMainPanel == 'custAccLedger') {
    $accLedStrMLLoanDep = "and ml_trans_mondep_lender_id = '$custId'";
} else {
    $accLedStrMLLoanDep = NULL;
}
//
$qSelectTotalMLLoanDep = "SELECT SUM(ml_trans_mondep_amt) as deposit_amt FROM ml_transaction 
where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanDep and ml_trans_upd_sts!='Deleted' 
and ml_trans_cr_dr = 'DR' and ml_trans_mondep_firm_id IN ($strFrmId)";
$qResultTotalMLLoanDep = mysqli_query($conn,$qSelectTotalMLLoanDep);
$rowTotalMLLoanDep = mysqli_fetch_array($qResultTotalMLLoanDep, MYSQLI_ASSOC);
$totalDepositMLLoanMoney = $rowTotalMLLoanDep['deposit_amt'];

$qSelectTotalMLLoanDepCr = "SELECT SUM(ml_trans_mondep_amt) as deposit_amt FROM ml_transaction 
where ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanDep and ml_trans_upd_sts!='Deleted' 
and ml_trans_cr_dr = 'CR' and ml_trans_mondep_firm_id IN ($strFrmId)";
$qResultTotalMLLoanDepCr = mysqli_query($conn,$qSelectTotalMLLoanDepCr);
$rowTotalMLLoanDepCr = mysqli_fetch_array($qResultTotalMLLoanDepCr, MYSQLI_ASSOC);
$totalDepositMLLoanMoneyCr = $rowTotalMLLoanDepCr['deposit_amt'];
/* START CODE TO SHOW AMOUNT IN AND AMOUNT OUT OF MONEYLENDER - MONEY DEPOSITE,@AUTHOR:HEMA-29MAY2020 */
if ($ddpanelName == 'dayBeforePanel') {
    $open_out_utin_cash_amt_rec += $rowTotalMLLoanDepCr['deposit_amt'];
} else {
    $today_out_utin_cash_amt_rec += $rowTotalMLLoanDepCr['deposit_amt'];
}
/* END CODE TO SHOW AMOUNT IN AND AMOUNT OUT OF MONEYLENDER - MONEY DEPOSITE,@AUTHOR:HEMA-29MAY2020 */
?>