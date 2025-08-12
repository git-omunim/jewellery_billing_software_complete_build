<?php

/*
 * **************************************************************************************
 * @tutorial: Deposit Udhaar EMI Amount
 * **************************************************************************************
 *
 * Created on 11 Jun, 2015 10:52:33 AM
 *
 * @FileName: omuuemid.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
?>
<?php

$custId = $_POST['custId'];
$udhaarId = $_POST['udhaarId'];
$udhaDepId = $_POST['udhaDepId'];
$updateUdhaDepAmt = $_POST['updateUdhaDepAmt'];
$updateUdhaDepIntAmt = $_POST['updateUdhaDepIntAmt'];
//$udhaDepUId = $_POST['udhaDepUId'];
$uFirmId = $_POST['uFirmId'];
$uDOB = $_POST['uDOB'];
$uSerialNo = $_POST['uSerialNo'];
$totEMIAmt = $_POST['totEMIAmt'];
$totEMIIntAmt = $_POST['totEMIIntAmt'];
$emiPaidDate = trim($_POST['emiPaidDate']);
//echo $emiPaidDate;
if ($udhaDepId == '') {
    $custId = $_GET['custId'];
    $udhaarId = $_GET['udhaarId'];
    $udhaDepId = $_GET['udhaDepId'];
    $updateUdhaDepAmt = $_GET['updateUdhaDepAmt'];
    $updateUdhaDepIntAmt = $_POST['updateUdhaDepIntAmt'];
    $totEMIAmt = $_GET['totEMIAmt'];
    $totEMIIntAmt = $_GET['totEMIIntAmt'];
    $emiPaidDate = trim($_GET['emiPaidDate']);
}
//echo $emiPaidDate;
?>
<?php

if ($udhaDepId == '' or $udhaDepId == NULL or $updateUdhaDepAmt == '' or $updateUdhaDepAmt == NULL or $updateUdhaDepIntAmt == '' or $updateUdhaDepIntAmt == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    exit(0);
} else {
    /*     * ****************Start code to add sys log var @Author:PRIYA14APR14********************** */
    $sslg_trans_sub = 'UDHAAR EMI AMT UPDATED';
    $sysLogTransType = 'Udhaar';
    $sysLogTransId = $uSerialNo;
    $sslg_firm_id = $uFirmId;
    $custId = $custId;
    $sslg_trans_comment = 'Udhaar S.No: ' . $uSerialNo . ', Udhaar Dep EMI Amount Date: ' . $uDOB . ',Updated Udhaar Dep Amt: ' . $updateUdhaDepAmt;
    include 'omslgapi.php';
    /*     * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */
    $qSelUdhaDet = "SELECT udhaar_EMI_occurrences,udhaar_type,udhaar_DOB,udhaar_upd_sts FROM udhaar WHERE udhaar_id='$udhaarId' and udhaar_own_id='$_SESSION[sessionOwnerId]'";
    $resUdhaDet = mysqli_query($conn,$qSelUdhaDet);
    $rowUdhaDet = mysqli_fetch_array($resUdhaDet, MYSQLI_ASSOC);
    $totEMI = $rowUdhaDet['udhaar_EMI_occurrences'];
    $udhaar_type = $rowUdhaDet['udhaar_type'];
    $udhaar_DOB = $rowUdhaDet['udhaar_DOB'];
    $udhaar_upd_sts = $rowUdhaDet['udhaar_upd_sts'];

    $qSelUdhaDepEMIAmt = "SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_no FROM udhaar_deposit WHERE udhadepo_id='$udhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
    $resUdhaDepEMIAmt = mysqli_query($conn,$qSelUdhaDepEMIAmt);
    $rowUdhaDepEMIAmt = mysqli_fetch_array($resUdhaDepEMIAmt, MYSQLI_ASSOC);
    $prevUdhaDepAmt = $rowUdhaDepEMIAmt['udhadepo_EMI_amt'];
    $prevUdhaDepIntAmt = $rowUdhaDepEMIAmt['udhadepo_EMI_int_amt'];
    $emiNo = $rowUdhaDepEMIAmt['udhadepo_EMI_no'];
    $totUdhaarEMIAmt = $updateUdhaDepAmt + $updateUdhaDepIntAmt;

    $udhaarDepositHistory = '<b>Divide Udhaar EMI prin Amount ' . $updateUdhaDepAmt . ' and Int Amount ' . $updateUdhaDepIntAmt . ' updated on ' . $emiPaidDate . '</b>.<br/>';
    $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_amt='$updateUdhaDepAmt',udhadepo_EMI_int_amt='$updateUdhaDepIntAmt',udhadepo_history =  '$udhaarDepositHistory'
                WHERE udhadepo_id='$udhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";


    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
    $qSelCustomer = "SELECT * FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
    $resCustomer = mysqli_query($conn,$qSelCustomer);
    $rowCustomer = mysqli_fetch_array($resCustomer, MYSQLI_ASSOC);
    $custFirstName = $rowCustomer['user_fname'];
    $custLastName = $rowCustomer['user_lname'];
    $custAddress = $rowCustomer['user_add'] . ' ' . $rowCustomer['user_city'] . ' ' . $rowCustomer['user_pincode'] . ' ' . $rowCustomer['user_state'] . ' ' . $rowCustomer['user_country'] . ' ' . 'Mob. No: ' . $rowCustomer['user_mobile'];
    $custCity = $rowCustomer['user_city'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->            
    /*     * ********Start code to udhaar deposit amount @Author:SHRI15JUL15********************* */
    if (($prevUdhaDepAmt >= $updateUdhaDepAmt) || ($prevUdhaDepIntAmt >= $updateUdhaDepIntAmt)) {
        if ($prevUdhaDepAmt >= $updateUdhaDepAmt) {
            $remUdhaDepAmt = $prevUdhaDepAmt - $updateUdhaDepAmt;
            $nextUdhaDepId = $udhaDepId + 1;
            $newEmiNo = $emiNo + 1;

            if ($emiNo <= $totEMI) {
                if ($emiNo != $totEMI) {
                    parse_str(getTableValues("SELECT udhadepo_EMI_amt FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                    $newUpdateUdhaAmt = $udhadepo_EMI_amt + $remUdhaDepAmt;
                    $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_amt='$newUpdateUdhaAmt'
                WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
                    if (!mysqli_query($conn,$query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                } else if ($emiNo == $totEMI) {
                    $udhaDepAmt = $remUdhaDepAmt;
                }
            }
        }
        if ($prevUdhaDepIntAmt >= $updateUdhaDepIntAmt) {
            $remUdhaDepIntAmt = $prevUdhaDepIntAmt - $updateUdhaDepIntAmt;
            $nextUdhaDepId = $udhaDepId + 1;
            $newEmiNo = $emiNo + 1;

            if ($emiNo <= $totEMI) {
                if ($emiNo != $totEMI) {
                    parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                    $newUpdateUdhaIntAmt = $udhadepo_EMI_int_amt + $remUdhaDepIntAmt;
                    $newUpdateUdhaAmt = $udhadepo_EMI_amt + $remUdhaDepAmt;
                    $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_int_amt='$newUpdateUdhaIntAmt'
                WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
                    if (!mysqli_query($conn,$query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                    if ($newUpdateUdhaIntAmt != '' && $newUpdateUdhaAmt != '') {
                        $totEMIAmount = $newUpdateUdhaIntAmt + $newUpdateUdhaAmt;
                        $query = "UPDATE udhaar_deposit SET
		udhadepo_amt_left='$totEMIAmount',udhadepo_EMI_total_amt='$totEMIAmount'
                WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                        if (!mysqli_query($conn,$query)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
                } else if ($emiNo == $totEMI) {
                    $udhaIntAmt = $remUdhaDepIntAmt;
                }
            }
        }
    }
    if (($prevUdhaDepAmt < $updateUdhaDepAmt) || ($prevUdhaDepIntAmt < $updateUdhaDepIntAmt)) {
        /*         * ********End code to udhaar deposit amount @Author:SHRI15JUL15********************* */
        /*         * ********Start code to udhaar deposit interest amount @Author:SHRI15JUL15********************* */

        if ($prevUdhaDepIntAmt < $updateUdhaDepIntAmt) {
            $totCnt = 0;
            $newEmiNo = $emiNo + 1;
            $advUdhaDepIntAmt = $updateUdhaDepIntAmt - $prevUdhaDepIntAmt;
            if ($emiNo <= $totEMI) {
                if ($emiNo != $totEMI) {
                    $tEMI = $totEMI - $emiNo;

                    $updateUdhaDepIntAmt = $totEMIIntAmt - $updateUdhaDepIntAmt;
                    $prevUdhaDepId = $udhaDepId - 1;
                    for ($i = $emiNo; $i > 1; $i--) {
                        parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$prevUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                        if ($udhadepo_EMI_status != 'Paid') {
                            $totCnt++;
                        }
                        $prevUdhaDepId--;
                    }
                    $nextUdhaDepId1 = $udhaDepId + 1;
                    for ($i = $emiNo; $i < $totEMI; $i++) {
                        parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId1' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                        if ($udhadepo_EMI_status != 'Paid') {
                            $totCnt++;
                        }
                        $nextUdhaDepId1++;
                    }

                    $updateUdhaDepIntAmt = om_round(($advUdhaDepIntAmt / $totCnt), 2);

                    $pUdhaDepId = $udhaDepId - 1;
                    if ($emiNo != 1) {
                        for ($i = $emiNo - 1; $i > 0; $i--) {
                            parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                            $newUpdateUdhaIntAmt = $udhadepo_EMI_int_amt - $updateUdhaDepIntAmt;
                            $newUpdateUdhaAmt = $udhadepo_EMI_amt + $updateUdhaDepAmt;
                            if ($udhadepo_EMI_status != 'Paid') {
                                $query = "UPDATE udhaar_deposit SET
                                        udhadepo_EMI_int_amt='$newUpdateUdhaIntAmt'
                                        WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                                if (!mysqli_query($conn,$query)) {
                                    die('Error: ' . mysqli_error($conn));
                                }
                                parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                                $totEMIAmount = $udhadepo_EMI_int_amt + $udhadepo_EMI_amt;
                                $query = "UPDATE udhaar_deposit SET
                                            udhadepo_amt_left='$totEMIAmount',udhadepo_EMI_total_amt='$totEMIAmount'
                                            WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                                if (!mysqli_query($conn,$query)) {
                                    die('Error: ' . mysqli_error($conn));
                                }
//                            }
                            }
                            $pUdhaDepId--;
                        }
                    }
                    $nUdhaDepId = $udhaDepId + 1;
                    for ($i = $emiNo; $i < $totEMI; $i++) { //echo '<br>$nUdhaDepId=='.$nUdhaDepId;
                        parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                        $newUpdateUdhaIntAmt = $udhadepo_EMI_int_amt - $updateUdhaDepIntAmt;
                        $newUpdateUdhaAmt = $udhadepo_EMI_amt + $updateUdhaDepAmt;

                        if ($udhadepo_EMI_status != 'Paid') {
                            $query = "UPDATE udhaar_deposit SET
                                    udhadepo_EMI_int_amt='$newUpdateUdhaIntAmt'
                                    WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                        echo '<br>Next' . $query;
                            if (!mysqli_query($conn,$query)) {
                                die('Error: ' . mysqli_error($conn));
                            }

//                    if ($newUpdateUdhaIntAmt != '' && $newUpdateUdhaAmt != '') {
                            parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                            $totEMIAmount = $udhadepo_EMI_int_amt + $udhadepo_EMI_amt;
                            $query = "UPDATE udhaar_deposit SET
                                            udhadepo_amt_left='$totEMIAmount',udhadepo_EMI_total_amt='$totEMIAmount'
                                            WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                            if (!mysqli_query($conn,$query)) {
                                die('Error: ' . mysqli_error($conn));
                            }
//                    }           
                        }
                        $nUdhaDepId++;
                    }
                } else {
                    $intAmt = $advUdhaDepIntAmt;
                }
            }
        }
        if ($prevUdhaDepAmt < $updateUdhaDepAmt) {
//            echo $updateUdhaDepAmt;
            $totCnt = 0;
            $newEmiNo = $emiNo + 1;
            $advUdhaDepAmt = $updateUdhaDepAmt - $prevUdhaDepAmt;
            if ($emiNo <= $totEMI) {
                if ($emiNo != $totEMI) {
                    $tEMI = $totEMI - $emiNo;

                    $updateUdhaDepAmt = $totEMIAmt - $updateUdhaDepAmt;
                    $prevUdhaDepId = $udhaDepId - 1;
                    for ($i = $emiNo; $i > 1; $i--) {
                        parse_str(getTableValues("SELECT udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$prevUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL"));
                        if ($udhadepo_EMI_status != 'Paid') {
                            $totCnt++;
                        }
                        $prevUdhaDepId--;
                    }
                    $nextUdhaDepId1 = $udhaDepId + 1;
                    for ($i = $emiNo; $i < $totEMI; $i++) {
                        parse_str(getTableValues("SELECT udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId1' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL"));
                        if ($udhadepo_EMI_status != 'Paid') {
                            $totCnt++;
                        }
                        $nextUdhaDepId1++;
                    }

                    $updateUdhaDepAmt = om_round(($updateUdhaDepAmt / $totCnt), 2);
//echo $updateUdhaDepAmt;
                    $pUdhaDepId = $udhaDepId - 1;
                    if ($emiNo != 1) {
                        for ($i = $emiNo - 1; $i > 0; $i--) {
                            $qSelNextAllRow = "SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' ";
                            $resNextAllRow = mysqli_query($conn,$qSelNextAllRow);
                            $resNextAllRowCount = mysqli_num_rows($resNextAllRow);
//                            parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL"));
                            if ($resNextAllRowCount > 0) {
                                $query = "UPDATE udhaar_deposit SET
                                        udhadepo_EMI_amt='$updateUdhaDepAmt'
                                        WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                                if (!mysqli_query($conn,$query)) {
                                    die('Error: ' . mysqli_error($conn));
                                }

                                parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL"));
                                $totEMIAmount = $udhadepo_EMI_int_amt + $udhadepo_EMI_amt;
                                $query = "UPDATE udhaar_deposit SET
                                            udhadepo_amt_left='$totEMIAmount',udhadepo_EMI_total_amt='$totEMIAmount'
                                            WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                                if (!mysqli_query($conn,$query)) {
                                    die('Error: ' . mysqli_error($conn));
                                }
                            }
                            $pUdhaDepId--;
                        }
                    }
                    $nUdhaDepId = $udhaDepId + 1;
                    for ($i = $emiNo; $i < $totEMI; $i++) { //echo '<br>$nUdhaDepId=='.$nUdhaDepId;
                        $qSelNextAllRow = "SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL";
                        $resNextAllRow = mysqli_query($conn,$qSelNextAllRow);
                        $resNextAllRowCount = mysqli_num_rows($resNextAllRow);
//                        parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL"));
                        if ($resNextAllRowCount > 0) {
                            $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_amt='$updateUdhaDepAmt'
                WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                        echo '<br>Next' . $query;
                            if (!mysqli_query($conn,$query)) {
                                die('Error: ' . mysqli_error($conn));
                            }

                            parse_str(getTableValues("SELECT udhadepo_EMI_int_amt,udhadepo_EMI_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_paid_amt IS NULL"));
                            $totEMIAmount = $udhadepo_EMI_int_amt + $udhadepo_EMI_amt;
                            $query = "UPDATE udhaar_deposit SET
                                            udhadepo_amt_left='$totEMIAmount',udhadepo_EMI_total_amt='$totEMIAmount' 
                                            WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                            echo '<br>Prev' . $query;
                            if (!mysqli_query($conn,$query)) {
                                die('Error: ' . mysqli_error($conn));
                            }
                        }
                        $nUdhaDepId++;
                    }
                } else {
                    $depAmt = $advUdhaDepAmt;
                }
            }
        }
    }
    $prevAmt = $prevUdhaDepAmt + $prevUdhaDepIntAmt;
    $totUdhaAmt = $totUdhaarEMIAmt;
    if ($prevAmt > $totUdhaAmt) {
        $udhaAmtLeft = $prevAmt - $totUdhaAmt;
    } else {
        $udhaAmtLeft = $totUdhaAmt - $prevAmt;
    }
    if ($totUdhaAmt != '') {
        $query = "UPDATE udhaar_deposit SET
		udhadepo_paid_amt='$totUdhaAmt', udhadepo_EMI_total_amt='$totUdhaAmt' ,udhadepo_amt_left='$udhaAmtLeft'
                WHERE udhadepo_id='$udhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    /*     * ********End code to udhaar deposit interest amount @Author:SHRI15JUL15********************* */

    if ($intAmt != '' || $depAmt != '') {
        $totAdvAmt = $intAmt + $depAmt;
        $uSerialNoArr = explode(' ', $uSerialNo);
//                print_r($uSerialNoArr);
        $advMoneyOtherInfo = "$globalCurrency " . $totAdvAmt . " amount deposited of udhaar deposite EMI <br/>";
        $query = "INSERT INTO advance_money (
		admn_cust_id, admn_own_id, admn_firm_id,admn_pre_serial_num,admn_serial_num,
		admn_amt, admn_comm, admn_DOB, admn_upd_sts,admn_dr_acc_id, admn_cr_acc_id, admn_pay_other_info, 
		admn_other_info, admn_since) 
		VALUES (
		'$custId','$_SESSION[sessionOwnerId]','$uFirmId','$uSerialNoArr[0]','$uSerialNoArr[1]',
		'$totAdvAmt','UDHAAR DEPOSIT EMI AMOUNT','$uDOB', 'New', '','',"
                . "'','$advMoneyOtherInfo',$currentDateTime)";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    if ($udhaIntAmt != '' || $udhaDepAmt != '') {
        $totUdhaAmt = $udhaIntAmt + $udhaDepAmt;
        $udhaarHistory = "$globalCurrency " . $totUdhaAmt . " amount left of udhaar deposite EMI <br/>";
        $query = "INSERT INTO udhaar (
		udhaar_cust_id, udhaar_own_id, udhaar_firm_id,
		udhaar_cust_fname, udhaar_cust_lname, udhaar_cust_Address, udhaar_cust_city,
		udhaar_amt, udhaar_comm, udhaar_DOB, udhaar_type,
		udhaar_upd_sts, udhaar_other_info, udhaar_history,
		udhaar_ent_dat) 
		VALUES ('$custId','$_SESSION[sessionOwnerId]','$uFirmId','$custFirstName','$custLastName','$custAddress','$custCity',"
                . "'$totUdhaAmt','UDHAAR DEPOSIT EMI REMAINING AMT','$udhaar_DOB','$udhaar_type','$udhaar_upd_sts','','$udhaarHistory',$currentDateTime)";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    header("Location: $documentRoot/include/php/omuudetl.php?custId=$custId&firmId=$uFirmId"); //change in filename @AUTHOR: SANDY20NOV13
}
?>
