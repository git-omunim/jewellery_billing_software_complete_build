<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Dec 10, 2013 12:04:46 PM
 *
 * @FileName: orddmlad.php
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
if ($ddpanelName == 'dayBeforePanel') {
    //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<$todayStrDate";
    $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
    if ($acc_cash_opening_strtodate != '')
        if ($acc_cash_opening_strtodate == $todayFromStrDate)
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<$todayStrDate";
        else
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
    else
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<$todayStrDate";
} else {
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
}
//
if ($ddMainPanel == 'custAccLedger') {
    $accLedStrMLLoan = "and ml_lender_id = '$custId'";
} else {
    $accLedStrMLLoan = NULL;
}
//
$qSeltTotalMLLoanAdd = "SELECT SUM(ml_main_prin_amt) as total_prin_amt FROM ml_loan where 
           ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoan and ml_firm_id IN ($strFrmId) "
        . "and ml_ln_cr_dr = 'DR' order by ml_ent_dat desc";
//echo "<br/>Add Str:". $qSeltTotalMLLoanAdd;
$resTotalMLLoanAdd = mysqli_query($conn, $qSeltTotalMLLoanAdd);
$rowTotalMLLoanAdd = mysqli_fetch_array($resTotalMLLoanAdd);
$totalTodayMLLoanPrincipal = $rowTotalMLLoanAdd['total_prin_amt'];

$qSeltTotalMLLoanAddCr = "SELECT SUM(ml_main_prin_amt) as total_prin_amt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoan and ml_firm_id IN ($strFrmId) "
        . "and ml_ln_cr_dr = 'CR' order by ml_ent_dat desc";
$resTotalMLLoanAddCr = mysqli_query($conn, $qSeltTotalMLLoanAddCr);
$rowTotalMLLoanAddCr = mysqli_fetch_array($resTotalMLLoanAddCr);
$totalTodayMLLoanPrincipalCr = $rowTotalMLLoanAddCr['total_prin_amt'];
//
/* START CODE TO SHOW AMOUNT IN AND AMOUNT OUT OF MONEYLENDER LOAN NEW,@AUTHOR:HEMA-29MAY2020 */
if ($ddpanelName == 'dayBeforePanel') {
    $open_in_utin_cash_amt_rec += $rowTotalMLLoanAddCr['total_prin_amt'];
} else {
    $today_in_utin_cash_amt_rec += $rowTotalMLLoanAddCr['total_prin_amt'];
}
/* END CODE TO SHOW AMOUNT IN AND AMOUNT OUT OF MONEYLENDER LOAN NEW,@AUTHOR:HEMA-29MAY2020 */
?>