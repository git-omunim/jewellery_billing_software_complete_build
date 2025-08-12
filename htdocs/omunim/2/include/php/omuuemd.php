<?php

/*
 * **************************************************************************************
 * @tutorial: Update Udhaar EMI Amount
 * **************************************************************************************
 *
 * Created on 11 Jun, 2015 10:52:33 AM
 *
 * @FileName: omuuemd.php
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
?>
<?php

require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

$custId = $_POST['custId'];
$udhaarId = $_POST['udhaarId'];
$udhaDepId = $_POST['udhaDepId'];
$updateUdhaDepAmt = $_POST['updateUdhaDepAmt'];
//$udhaDepUId = $_POST['udhaDepUId'];
$uFirmId = $_POST['uFirmId'];
$uDOB = $_POST['uDOB'];
$uSerialNo = $_POST['uSerialNo'];
$totEMIAmt = $_POST['totEMIAmt'];
if ($udhaDepId == '') {
    $custId = $_GET['custId'];
    $udhaarId = $_GET['udhaarId'];
    $udhaDepId = $_GET['udhaDepId'];
    $updateUdhaDepAmt = $_GET['updateUdhaDepAmt'];
    $totEMIAmt = $_GET['totEMIAmt'];
}
?>
<?php

if ($udhaDepId == '' or $udhaDepId == NULL or $updateUdhaDepAmt == '' or $updateUdhaDepAmt == NULL) {
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

    $qSelUdhaDepEMIAmt = "SELECT udhadepo_EMI_total_amt,udhadepo_EMI_no FROM udhaar_deposit WHERE udhadepo_id='$udhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
    $resUdhaDepEMIAmt = mysqli_query($conn,$qSelUdhaDepEMIAmt);
    $rowUdhaDepEMIAmt = mysqli_fetch_array($resUdhaDepEMIAmt, MYSQLI_ASSOC);
    $prevUdhaDepAmt = $rowUdhaDepEMIAmt['udhadepo_EMI_total_amt'];
    $emiNo = $rowUdhaDepEMIAmt['udhadepo_EMI_no'];

    $qUpdateUdhaDepEMIAmt = "UPDATE udhaar_deposit SET
		udhadepo_EMI_total_amt='$updateUdhaDepAmt'
                WHERE udhadepo_id='$udhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";


    if (!mysqli_query($conn,$qUpdateUdhaDepEMIAmt)) {
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
    if ($prevUdhaDepAmt > $updateUdhaDepAmt) {
        $remUdhaDepAmt = $prevUdhaDepAmt - $updateUdhaDepAmt;
        $nextUdhaDepId = $udhaDepId + 1;
        $newEmiNo = $emiNo + 1;

        if ($emiNo <= $totEMI) {
            if ($emiNo != $totEMI) {
                parse_str(getTableValues("SELECT udhadepo_EMI_total_amt FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                $newUpdateUdhaAmt = $udhadepo_EMI_total_amt + $remUdhaDepAmt;
                $qUpdateNextUdhaDepEMIAmt = "UPDATE udhaar_deposit SET
		udhadepo_EMI_total_amt='$newUpdateUdhaAmt'
                WHERE udhadepo_id='$nextUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
                if (!mysqli_query($conn,$qUpdateNextUdhaDepEMIAmt)) {
                    die('Error: ' . mysqli_error($conn));
                }
            } else if ($emiNo == $totEMI) {
//                echo '<br>$emiNo==' . $emiNo;
//                echo '<br>$totEMI==' . $totEMI;
                $udhaarHistory = "$globalCurrency " . $remUdhaDepAmt . " amount left of udhaar deposite EMI <br/>";
                $query = "INSERT INTO udhaar (
		udhaar_cust_id, udhaar_own_id, udhaar_firm_id,
		udhaar_cust_fname, udhaar_cust_lname, udhaar_cust_Address, udhaar_cust_city,
		udhaar_amt, udhaar_comm, udhaar_DOB, udhaar_type,
		udhaar_upd_sts, udhaar_other_info, udhaar_history,
		udhaar_ent_dat) 
		VALUES ('$custId','$_SESSION[sessionOwnerId]','$uFirmId','$custFirstName','$custLastName','$custAddress','$custCity',"
                        . "'$remUdhaDepAmt','UDHAAR DEPOSIT EMI REMAINING AMT','$udhaar_DOB','$udhaar_type','$udhaar_upd_sts','','$udhaarHistory',$currentDateTime)";
                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        }
    } else if ($prevUdhaDepAmt < $updateUdhaDepAmt) {
        $totCnt = 0;
        $newEmiNo = $emiNo + 1;
        $advUdhaDepAmt = $prevUdhaDepAmt - $updateUdhaDepAmt;
        if ($emiNo <= $totEMI) {
            if ($emiNo != $totEMI) {
                $tEMI = $totEMI - $emiNo;

                $updateUdhaDepAmt = $totEMIAmt - $updateUdhaDepAmt;
                $prevUdhaDepId = $udhaDepId - 1;
                for ($i = $emiNo; $i > 1; $i--) {
                    parse_str(getTableValues("SELECT udhadepo_EMI_total_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$prevUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                    if ($udhadepo_EMI_status != 'Paid') {
                        $totCnt++;
                    }
                    $prevUdhaDepId--;
                }
                $nextUdhaDepId1 = $udhaDepId + 1;
                for ($i = $emiNo; $i < $totEMI; $i++) {
                    parse_str(getTableValues("SELECT udhadepo_EMI_total_amt,udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nextUdhaDepId1' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                    if ($udhadepo_EMI_status != 'Paid') {
                        $totCnt++;
                    }
                    $nextUdhaDepId1++;
                }

                $updateUdhaDepAmt = om_round(($updateUdhaDepAmt / $totCnt), 2);

                $pUdhaDepId = $udhaDepId - 1;
                if ($emiNo != 1) {
                    for ($i = $emiNo - 1; $i > 0; $i--) {
                        parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                        if ($udhadepo_EMI_status != 'Paid') {
                            $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_total_amt='$updateUdhaDepAmt'
                WHERE udhadepo_id='$pUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
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
                    parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'"));
                    if ($udhadepo_EMI_status != 'Paid') {
                        $query = "UPDATE udhaar_deposit SET
		udhadepo_EMI_total_amt='$updateUdhaDepAmt'
                WHERE udhadepo_id='$nUdhaDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId'";
//                        echo '<br>Next' . $query;
                        if (!mysqli_query($conn,$query)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
                    $nUdhaDepId++;
                }
            } else {
                $uSerialNoArr = explode(' ', $uSerialNo);
//                print_r($uSerialNoArr);
                $advMoneyOtherInfo = "$globalCurrency " . $updateUdhaDepAmt . " amount deposited of udhaar deposite EMI <br/>";
                if ($advUdhaDepAmt < 0) {
                    $advUdhaDepAmt = abs($advUdhaDepAmt);
                }
                $query = "INSERT INTO advance_money (
		admn_cust_id, admn_own_id, admn_firm_id,admn_pre_serial_num,admn_serial_num,
		admn_amt, admn_comm, admn_DOB, admn_upd_sts,admn_dr_acc_id, admn_cr_acc_id, admn_pay_other_info, 
		admn_other_info, admn_since) 
		VALUES (
		'$custId','$_SESSION[sessionOwnerId]','$uFirmId','$uSerialNoArr[0]','$uSerialNoArr[1]',
		'$advUdhaDepAmt','UDHAAR DEPOSIT EMI AMOUNT','$uDOB', 'New', '','',"
                        . "'','$advMoneyOtherInfo',$currentDateTime)";

                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        }
    }

    header("Location: $documentRoot/include/php/omuudetl.php?custId=$custId&firmId=$uFirmId"); //change in filename @AUTHOR: SANDY20NOV13
}
?>