<?php

/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: omuucpud.php
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
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$currentFileName = basename(__FILE__);
//include 'system/omsachsc.php';
//require_once 'system/omsgeagb.php';
include 'system/omsachsc.php';
require_once 'ommpincr.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';
?>
<?php

include_once 'ommpincr.php';
require_once 'system/omssopin.php';
?>
<?php

//
//print_r($_REQUEST);
//
if ($custId == '') {
    $custId = $_POST['custId'];
    $firmId = $_POST['firmId'];
}
//
if ($custId == '') {
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
}
//
// ADDED CODE FOR UDHAAR DEPOSIT REDIRECTION ISSUE @AUTHOR:PRIYANKA-08FEB2022 
if ($_REQUEST['udhaarDivMainMiddlePanel'] == 'Paid') {
    $_REQUEST['panelName'] = 'udhaarPaidDetails';
}
//
if ($_REQUEST['panelName'] == 'udhaarPaidDetails') {
    $displayTotalColumn = 'No';
}
//
if ($_REQUEST['displayTotalColumn'] == 'No') {
    $displayTotalColumn = 'No';
}
//
?>
<?php

/* * **************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
$udCounter = 1;
$qSelTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_user_id='$custId' AND utin_amt_pay_chk IN('checked') and utin_type IN ('OnPurchase','udhaar') and utin_transaction_type IN ('UDHAAR','UDHAAR DEPOSIT','OnPurchase') and utin_total_amt >0";
$resTotalUdhaarCount = mysqli_query($conn, $qSelTotalUdhaarCount);
$totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
//
//
$qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_user_id='$custId' AND utin_amt_pay_chk IN('checked') and utin_type IN ('OnPurchase','udhaar')and utin_transaction_type IN ('UDHAAR','UDHAAR DEPOSIT','OnPurchase') and utin_total_amt > 0 order by utin_since desc";
//
//echo $qSelAllUdhaar;
//
$resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar);
$totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
//
if ($totalUdhaar <= 0) {
    echo "<div class=" . "spaceLeft40" . "><h4> ~ Paid Udhaar Details not available ~ </h4></div>";
}
if ($totalNextUdhaar <= 0) {
    echo "<div class=" . "spaceLeft40" . "><h4> ~ No More Paid Udhaar Details are available. ~ </h4></div>";
}
$paidDiv = 'PaidDiv';
$udhaarPayChk = 'checked';
while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {
    //
    $utin_utin_id = $rowAllUdhaar['utin_id'];
    //    
    //echo $utin_utin_id."---------";
    //
    parse_str(getTableValues("SELECT utin_total_amt,utin_utin_id FROM user_transaction_invoice WHERE utin_id='$utin_utin_id'"));
    //
    $udhaarId = $rowAllUdhaar['utin_id'];
    $udhaarAmount = $rowAllUdhaar['utin_cash_balance'];
    $udhaarType = $rowAllUdhaar['utin_type'];
    $udhaarDOB = $rowAllUdhaar['utin_date'];
    $udhaarOtherInfo = $rowAllUdhaar['utin_other_info'];
    $udhaarComm = $rowAllUdhaar['utin_paym_oth_info'];
    $udhaarUpdStatus = $rowAllUdhaar['utin_status'];
    $udhaarPreSerialNum = $rowAllUdhaar['utin_pre_invoice_no'];
    $udhaarSerialNum = $rowAllUdhaar['utin_invoice_no'];
    $udhaarROI = $rowAllUdhaar['utin_ROI'];
    $udhaarEMIDays = $rowAllUdhaar['utin_EMI_days'];
    $udhaarEMIOccur = $rowAllUdhaar['utin_EMI_occurrences'];
    $udhaarMainAmt = $rowAllUdhaar['utin_total_amt'];
    //
//    echo '<br />$utin_total_amt :' . $utin_total_amt . '<br />';
//    echo '<br />utin_left_amount :' . $rowAllUdhaar['utin_left_amount'] . '<br />';
    //
    if ($rowAllUdhaar['utin_left_amount'] == '' || $rowAllUdhaar['utin_left_amount'] == NULL) {
        $udhaarAmt = $utin_total_amt;
    } else {
        $udhaarAmt = $rowAllUdhaar['utin_left_amount'];
    }
//    echo '<br />$udhaarAmt :' . $udhaarAmt . '<br />';
    //
    if ($_REQUEST['udhaarDivMainMiddlePanel'] == 'Paid' || $_REQUEST['panelName'] == 'udhaarPaidDetails') {
        $udhaarAmtLeftDeposit = $rowAllUdhaar['utin_cash_balance'];
    }
    //
    //$udhaarAmt = $utin_total_amt;
    if ($_REQUEST['udhaarDivMainMiddlePanel'] == 'Paid' || $_REQUEST['panelName'] == 'udhaarPaidDetails') {
        $udhaarAmtLeft = $udhaarAmtLeftDeposit;
    } else {
        $udhaarAmtLeft = $udhaarAmt;
    }
    //
    $udhaarSettled = $rowAllUdhaar['utin_amt_settled_inv_id'];
    $udhaarEMIStatus = $rowAllUdhaar['utin_EMI_status'];
    $delOption = $utin_utin_id;
    /*     * **************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
    //
    //
    $udhaarIntROI = $rowAllUdhaar['utin_udhaar_roi'];
    $udhaarIntType = $rowAllUdhaar['utin_udhaar_int_type'];
    $udhaarIntChk = $rowAllUdhaar['utin_udhaar_int_chk'];
    //
    //
    if ($udhaarEMIDays != '' || $udhaarEMIDays != NULL)
        include 'omuemdtl.php';
    else
        include 'omuudtdv.php';
    $udCounter++;
}
?>