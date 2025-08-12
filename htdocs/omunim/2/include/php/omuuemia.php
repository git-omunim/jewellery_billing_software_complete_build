<?php

/*
 * **************************************************************************************
 * @tutorial: Deposit Udhaar EMI Amount
 * **************************************************************************************
 *
 * Created on 11 Jun, 2015 10:52:33 AM
 *
 * @FileName: omuuemia.php
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

    $udhaarDepositHistory = '<b>Adjust Udhaar EMI prin Amount ' . $updateUdhaDepAmt . ' and Int Amount ' . $updateUdhaDepIntAmt . ' updated on ' . $emiPaidDate . '</b>.<br/>';
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
//                    echo $udhadepo_EMI_amt;
                    $newUpdateUdhaAmt = $udhadepo_EMI_amt + $remUdhaDepAmt;
                    $newUpdateUdhaTotAmt = $udhadepo_EMI_int_amt + $newUpdateUdhaAmt;
//                    echo $newUpdateUdhaAmt;
                    $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_amt='$newUpdateUdhaAmt',udhadepo_EMI_total_amt='$newUpdateUdhaTotAmt',udhadepo_amt_left='$newUpdateUdhaTotAmt'
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
                    $newUpdateUdhaAmt = $udhadepo_EMI_amt + $newUpdateUdhaIntAmt;
                    $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_int_amt='$newUpdateUdhaIntAmt',udhadepo_EMI_total_amt='$newUpdateUdhaAmt',udhadepo_amt_left='$newUpdateUdhaAmt'
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
            $remUdhaDepIntAmt = $updateUdhaDepIntAmt - $prevUdhaDepIntAmt;
            $nextUdhaDepId = $udhaDepId + 1;
            $newEmiNo = $emiNo + 1;

            if ($emiNo <= $totEMI) {
                if ($emiNo != $totEMI) {
                    parse_str(getTableValues("SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_status,udhadepo_EMI_no FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                    if ($remUdhaDepIntAmt > $udhadepo_EMI_int_amt) {
                        $qSelNextAllRow = "SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_udhaar_id='$udhaarId' AND udhadepo_id>='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
                        $resNextAllRow = mysqli_query($conn,$qSelNextAllRow);
                        $resNextAllRowCount = mysqli_num_rows($resNextAllRow);
                        $nextUdhaIntAmt = $remUdhaDepIntAmt;
                        $nextId = $udhaDepId + 1;
                        while ($resNextAllRowCount > 0) {

                            parse_str(getTableValues("SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_status,udhadepo_EMI_no FROM udhaar_deposit WHERE udhadepo_id='$nextId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                            if ($udhadepo_EMI_status != 'Paid' && $nextUdhaIntAmt > 0 && $chk != 1) {
                                if ($nextUdhaIntAmt > $udhadepo_EMI_int_amt) {
                                    $nextUdhaIntAmt = ($nextUdhaIntAmt - $udhadepo_EMI_int_amt);
                                    $totalAmount = $udhadepo_EMI_amt;
                                    $query = "UPDATE udhaar_deposit SET
                                        udhadepo_EMI_int_amt='0',udhadepo_amt_left='$totalAmount',udhadepo_EMI_total_amt='$totalAmount'
                                        WHERE udhadepo_id='$nextId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
//echo $query;
                                    if (!mysqli_query($conn,$query)) {
                                        die('Error: ' . mysqli_error($conn));
                                    }
                                    if ($udhadepo_EMI_no == $totEMI) {
                                        $intAmt = $nextUdhaIntAmt;
                                    }
                                } else {
                                    $chk = 1;
                                    $nextUdhaIntAmt = ($udhadepo_EMI_int_amt - $nextUdhaIntAmt);
                                    $totalAmount = $nextUdhaIntAmt + $udhadepo_EMI_amt;
                                    $query = "UPDATE udhaar_deposit SET
                                        udhadepo_EMI_int_amt='$nextUdhaIntAmt',udhadepo_amt_left='$totalAmount',udhadepo_EMI_total_amt='$totalAmount'
                                        WHERE udhadepo_id='$nextId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
                                    if (!mysqli_query($conn,$query)) {
                                        die('Error: ' . mysqli_error($conn));
                                    }
                                }
                            }
                            $nextId++;
                            $resNextAllRowCount--;
                        }
                    } else {
                        $newUpdateUdhaIntAmt = $udhadepo_EMI_int_amt - $remUdhaDepIntAmt;
                        $totalAmount = $newUpdateUdhaIntAmt + $udhadepo_EMI_amt;
//                        echo $newUpdateUdhaAmt;
                        $query = "UPDATE udhaar_deposit SET
                                udhadepo_EMI_int_amt='$newUpdateUdhaIntAmt',udhadepo_amt_left='$totalAmount',udhadepo_EMI_total_amt='$totalAmount'
                                WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//                        echo $query;
                        if (!mysqli_query($conn,$query)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
                } else if ($emiNo == $totEMI) {
                    $udhaIntAmt = $remUdhaDepIntAmt;
                }
            }
        }
//echo $prevUdhaDepAmt.' '.$updateUdhaDepAmt;
        if ($prevUdhaDepAmt < $updateUdhaDepAmt) {
            $remUdhaDepAmt = $updateUdhaDepAmt - $prevUdhaDepAmt;
//            echo '$remUdhaDepAmt==' . $remUdhaDepAmt;
            $nextUdhaDepId = $udhaDepId + 1;
            $newEmiNo = $emiNo + 1;

            if ($emiNo <= $totEMI) {
                if ($emiNo != $totEMI) {
                    parse_str(getTableValues("SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_status,udhadepo_EMI_no FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                    if ($remUdhaDepAmt > $udhadepo_EMI_amt) {
                        $qSelNextAllRow = "SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_udhaar_id='$udhaarId' AND udhadepo_id>='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'";
//echo $qSelNextAllRow;
                        $resNextAllRow = mysqli_query($conn,$qSelNextAllRow);
                        $resNextAllRowCount = mysqli_num_rows($resNextAllRow);
                        $nextUdhaAmt = $remUdhaDepAmt;
                        $nextId = $udhaDepId + 1;
                        while ($resNextAllRowCount > 0) {

                            parse_str(getTableValues("SELECT udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_status,udhadepo_EMI_no FROM udhaar_deposit WHERE udhadepo_id='$nextId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));

                            if ($udhadepo_EMI_status != 'Paid' && $nextUdhaAmt > 0 && $prinChk != 1) {
                                if ($nextUdhaAmt > $udhadepo_EMI_amt) {
                                    $nextUdhaAmt = ($nextUdhaAmt - $udhadepo_EMI_amt);
                                    $totalAmount = $udhadepo_EMI_int_amt;
                                    $query = "UPDATE udhaar_deposit SET
                                        udhadepo_EMI_amt='0',udhadepo_amt_left='$totalAmount',udhadepo_EMI_total_amt='$totalAmount'
                                        WHERE udhadepo_id='$nextId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
//echo $query;
                                    if (!mysqli_query($conn,$query)) {
                                        die('Error: ' . mysqli_error($conn));
                                    }
                                    if ($udhadepo_EMI_no == $totEMI) {
                                        $depAmt = $nextUdhaAmt;
                                    }
                                } else {
                                    $prinChk = 1;
                                    $nextUdhaAmt = ($udhadepo_EMI_amt - $nextUdhaAmt);
                                    $totalAmount = $nextUdhaAmt + $udhadepo_EMI_int_amt;
                                    $query = "UPDATE udhaar_deposit SET
                                        udhadepo_EMI_amt='$nextUdhaAmt',udhadepo_amt_left='$totalAmount',udhadepo_EMI_total_amt='$totalAmount'
                                        WHERE udhadepo_id='$nextId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
                                    if (!mysqli_query($conn,$query)) {
                                        die('Error: ' . mysqli_error($conn));
                                    }
                                }
                            }
                            $nextId++;
                            $resNextAllRowCount--;
                        }
                    }
//echo '$resNextAllRowCount=='.$resNextAllRowCount;
                    else {
                        $newUpdateUdhaAmt = $udhadepo_EMI_amt - $remUdhaDepAmt;
                        $totalAmount = $newUpdateUdhaAmt + $udhadepo_EMI_int_amt;
//                        echo $newUpdateUdhaAmt;
                        $query = "UPDATE udhaar_deposit SET
                                udhadepo_EMI_amt='$newUpdateUdhaAmt',udhadepo_amt_left='$totalAmount',udhadepo_EMI_total_amt='$totalAmount'
                                WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
//                        echo $query;
                        if (!mysqli_query($conn,$query)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
                } else if ($emiNo == $totEMI) {
                    $udhaDepAmt = $remUdhaDepAmt;
                }
            }
        }
    }
    $prevAmt = $prevUdhaDepAmt + $prevUdhaDepIntAmt;
    $totUdhaAmt = $totUdhaarEMIAmt;
    $udhaAmtLeft = $prevAmt - $totUdhaAmt;
    if ($udhaAmtLeft < 0) {
        $udhaAmtLeft = 0;
    }
    if ($totUdhaAmt != '') {
        $query = "UPDATE udhaar_deposit SET
		udhadepo_paid_amt='$totUdhaAmt',udhadepo_EMI_total_amt='$totUdhaAmt' ,udhadepo_amt_left='$udhaAmtLeft'
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