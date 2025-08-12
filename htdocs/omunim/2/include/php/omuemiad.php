<?php

/*
 * **************************************************************************************
 * @tutorial: EMI ad file
 * **************************************************************************************
 * 
 * Created on Nov 12, 2014 11:15:29 AM
 *
 * @FileName: omuemiad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php

$ownerId = $_SESSION['sessionOwnerId'];
$custId = trim($_POST['custId']);
$mainPanel = trim($_POST['mainPanel']);
$panelName = trim($_POST['panelName']);
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
$qSelCustDetails = "SELECT user_fname,user_lname,user_add,user_city,user_pincode,user_state,user_country,user_mobile,user_firm_id FROM user where user_owner_id='$ownerId' and user_id='$custId'";
$resCustDetails = mysqli_query($conn,$qSelCustDetails);
$rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);

$custFirstName = $rowCustDetails['user_fname'];
$custLastName = $rowCustDetails['user_lname'];
$custCity = $rowCustDetails['user_city'];
$custAddress = $rowCustDetails['user_add'] . ' ' . $rowCustDetails['user_city'] . ' ' . $rowCustDetails['user_pincode'] . ' ' . $rowCustDetails['user_state'] . ' ' . $rowCustDetails['user_country'] . ' ' . 'Mob. No: ' . $rowCustDetails['user_mobile'];
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
$udhaarMainAmount = trim($_POST['udhaarMainAmount']);
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);
$firmId = trim($_POST['udhharFirmId']);
$udhaarPreSerialNo = trim($_POST['udhaarPreSerialNo']);
$udhaarSerialNo = trim($_POST['udhaarSerialNo']);
$udhaarType = trim($_POST['udhaarType']);
$udhaarPayAccId = trim($_POST['udhaarPayAccId']);
$udhaarDrAccId = trim($_POST['udhaarDrAccId']);
$udhaarChequeNo = trim($_POST['udhaarChequeNo']);
$udhaarPayOtherInfo = trim($_POST['udhaarPayOtherInfo']);
$udhaarOtherInfo = trim($_POST['udhaarOtherInfo']);
$interestType = trim($_POST['interestType']);
$roiValue = trim($_POST['selROIValue']);
$roiId = trim($_POST['selROI']);
$udhaarEMINoOfDays = trim($_POST['udhaarEMINoOfDays']);
$udhaarEMIOccurrences = trim($_POST['udhaarEMIOccurrences']);
$smsTemplateId = trim($_POST['smsTemplateId']);
$noOfUdhaarItems = trim($_POST['noOfUdhaarItems']);

// Start To protect MySQL injection
$udhaarMainAmount = stripslashes($udhaarMainAmount);
$DOBDay = stripslashes($DOBDay);
$DOBMonth = stripslashes($DOBMonth);
$DOBYear = stripslashes($DOBYear);
$firmId = stripslashes($firmId);
$udhaarPreSerialNo = stripslashes($udhaarPreSerialNo);
$udhaarSerialNo = stripslashes($udhaarSerialNo);
$udhaarType = stripslashes($udhaarType);
$udhaarPayAccId = stripslashes($udhaarPayAccId);
$udhaarChequeNo = stripslashes($udhaarChequeNo);
$udhaarPayOtherInfo = stripslashes($udhaarPayOtherInfo);
$udhaarOtherInfo = stripslashes($udhaarOtherInfo);

$udhaarMainAmount = mysqli_real_escape_string($conn,$udhaarMainAmount);
$DOBDay = mysqli_real_escape_string($conn,$DOBDay);
$DOBMonth = mysqli_real_escape_string($conn,$DOBMonth);
$DOBYear = mysqli_real_escape_string($conn,$DOBYear);
$firmId = mysqli_real_escape_string($conn,$firmId);
$udhaarPreSerialNo = mysqli_real_escape_string($conn,$udhaarPreSerialNo);
$udhaarSerialNo = mysqli_real_escape_string($conn,$udhaarSerialNo);
$udhaarType = mysqli_real_escape_string($conn,$udhaarType);
$udhaarPayAccId = mysqli_real_escape_string($conn,$udhaarPayAccId);
$udhaarChequeNo = mysqli_real_escape_string($conn,$udhaarChequeNo);
$udhaarPayOtherInfo = mysqli_real_escape_string($conn,$udhaarPayOtherInfo);
$udhaarOtherInfo = mysqli_real_escape_string($conn,$udhaarOtherInfo);
$udhaarDOB = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;
/* * *******Start code to get om layout value of Udhaar option @OMMODTAG_SHRI02SEP15**************** */
$selUdhaEMIOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaEMIOpt'";
$resUdhaEMIOpt = mysqli_query($conn,$selUdhaEMIOpt);
$rowUdhaEMIOpt = mysqli_fetch_array($resUdhaEMIOpt);
$udhaEMIOpt = $rowUdhaEMIOpt['omly_value'];
/* * *******End code to get om layout value of Udhaar option @OMMODTAG_SHRI02SEP15**************** */
if ($udhaarMainAmount == '' or $udhaarMainAmount == NULL or $udhaarType == '' or $udhaarType == NULL or
        $udhaarDOB == '' or $udhaarDOB == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    if ($panelName == 'UpdateUdhaar') {
        $udhaarId = trim($_POST['udhaarId']);
        $query = "UPDATE udhaar SET
		udhaar_cust_id ='$custId',udhaar_own_id = '$ownerId',udhaar_firm_id = '$firmId',udhaar_pre_serial_num = '$udhaarPreSerialNo',udhaar_serial_num = '$udhaarSerialNo',
		udhaar_cust_fname = '$custFirstName',udhaar_cust_lname  = '$custLastName', udhaar_cust_Address = '$custAddress', udhaar_cust_city = '$custCity',
		udhaar_comm = '$udhaarComm',udhaar_DOB = '$udhaarDOB', udhaar_type = '$udhaarType',
		udhaar_pay_acc_id = '$udhaarPayAccId',udhaar_dr_acc_id = '$udhaarDrAccId',udhaar_pay_other_info = '$udhaarPayOtherInfo',udhaar_other_info = '$udhaarOtherInfo',
                udhaar_ent_dat =$currentDateTime,udhaar_ROI_Id ='$roiId',udhaar_ROI ='$roiValue',udhaar_ROI_typ ='$interestType',udhaar_EMI_days ='$udhaarEMINoOfDays',"
                . "udhaar_EMI_occurrences ='$udhaarEMIOccurrences',udhaar_sms_id ='$smsTemplateId',udhaar_prin_amt='$udhaarMainAmount'"
                . "WHERE udhaar_own_id = '$ownerId' and udhaar_id = '$udhaarId'";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        $qSelAllUdhaarDep = "SELECT udhadepo_EMI_no,udhadepo_id FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId' order by (udhadepo_EMI_no + udhadepo_id) asc";
        $resAllUdhaarDep = mysqli_query($conn,$qSelAllUdhaarDep);
        $udhaarTotalEMIAmt = 0;
        while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDep, MYSQLI_ASSOC)) {
            $i = $rowUdhaarDepMon['udhadepo_EMI_no'];
            $uDepId = $rowUdhaarDepMon['udhadepo_id'];
            if ($i == 1) {
                $emiStartDate = $udhaarDOB;
                $endDate = strtotime("+" . $udhaarEMINoOfDays . " days", strtotime($emiStartDate));
                $dueDate = om_strtoupper(date("d M Y", $endDate));
            }
            $intAmt = ($udhaarMainAmount * $roiValue * $udhaarEMIOccurrences) / 100;
            $totalAmt = $udhaarMainAmount + $intAmt;
            $totalEMIAmt = om_round(($totalAmt / $udhaarEMIOccurrences), 2);
            $emiInt = om_round(($intAmt / $udhaarEMIOccurrences), 2);
            $emiAmt = om_round(($totalEMIAmt - $emiInt), 2);
            $udhaarTotalEMIAmt = $udhaarTotalEMIAmt + $totalEMIAmt;

            $queryItem = "UPDATE udhaar_deposit SET
		udhadepo_firm_id = '$firmId',udhadepo_DOB = '$udhaarDOB',
                udhadepo_amt = '$emiAmt' ,udhadepo_EMI_start_DOB = '$emiStartDate',udhadepo_EMI_end_DOB = '$dueDate',"
                    . "udhadepo_EMI_amt = '$emiAmt',udhadepo_EMI_int_amt = '$emiInt',udhadepo_EMI_total_amt = '$totalEMIAmt',udhadepo_ent_dat = $currentDateTime
                WHERE udhadepo_id = '$uDepId' and udhadepo_EMI_no = '$i'";
            if (!mysqli_query($conn,$queryItem)) {
                die('Error: ' . mysqli_error($conn));
            }
            $emiStartDate = $dueDate;
            $endDate = strtotime("+" . $udhaarEMINoOfDays . " days", strtotime($emiStartDate));
            $dueDate = om_strtoupper(date("d M Y", $endDate));
        }
        $counter = 1;
        for ($i = 1; $i <= $noOfUdhaarItems; $i++) {
            $itemAvail = trim($_POST['udhaarItemDel' . $i]);
            if ($itemAvail != 'Deleted') {

                $udhaarItemId = trim($_POST['udhaarItemId' . $i]);
                $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
                $itemName = (trim($_POST['itemName' . $i]));
                $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
                $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
                $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
                $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));

                if ($udhaarItemId == '') {
                    $queryItem = "INSERT INTO udhaar_items (
		udhaar_itm_own_id, udhaar_itm_udhaar_id,udhaar_itm_cust_id, udhaar_itm_metal_type, 
		udhaar_itm_name, udhaar_itm_pieces, udhaar_itm_gross_weight, 
                udhaar_itm_gross_weight_type, udhaar_itm_valuation,udhaar_itm_since) 
		VALUES (
		'$ownerId','$udhaarId','$custId','$udhaarItemType',
		'$itemName','$udhaarItemPieces','$udhaarItemWeight',
                '$udhaarItemWeightType','$udhaarItemVal',$currentDateTime)";

                    if (!mysqli_query($conn,$queryItem)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                } else {
                    $query = "UPDATE udhaar_items SET
                udhaar_itm_own_id = '$ownerId',udhaar_itm_udhaar_id = '$udhaarId',udhaar_itm_cust_id = '$custId',udhaar_itm_metal_type = '$udhaarItemType',
		udhaar_itm_name = '$itemName',udhaar_itm_pieces = '$udhaarItemPieces',udhaar_itm_gross_weight = '$udhaarItemWeight',
                udhaar_itm_gross_weight_type = '$udhaarItemWeightType',udhaar_itm_valuation = '$udhaarItemVal',udhaar_itm_since = $currentDateTime
                WHERE udhaar_itm_id  = '$udhaarItemId'";

                    if (!mysqli_query($conn,$query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
            }
            $counter++;
        }
        if ($udhaarType == 'Cash') {
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " taken cash on " . $udhaarDOB . ".<br/>";
        } else {
            $historyItem = substr($historyItem, 2);
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " amount left on puchase of  item - " . $historyItem . ".<br/>";
        }
        $query = "UPDATE udhaar SET
		                udhaar_history = '$udhaarHistory',udhaar_amt='$udhaarTotalEMIAmt'
                                WHERE udhaar_own_id = '$ownerId' and udhaar_id = '$udhaarId'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        /*         * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
        $sysLogTransId = $udhaarPreSerialNo . $udhaarSerialNo;
        $sslg_trans_sub = 'UDHAAR UPDATED';
        $sysLogTransType = 'Udhaar';
        $sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar Date: ' . $udhaarDOB . ',Udhaar Amount: ' . formatInIndianStyle($udhaarMainAmount);
        /*         * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */
        // Start code to add column in udhaar table @Author:ANUJA11MAR16*************************
        $apiType = 'update';
        $payTotalAmtBal = $udhaarMainAmount;
        $itemAddDate = $udhaarDOB;
        include 'omudjrnl.php';
    } else {
        $query = "INSERT INTO udhaar (
		udhaar_cust_id, udhaar_own_id, udhaar_firm_id,udhaar_pre_serial_num,udhaar_serial_num,
		udhaar_cust_fname, udhaar_cust_lname, udhaar_cust_Address, udhaar_cust_city,
		udhaar_comm, udhaar_DOB, udhaar_type,
		udhaar_upd_sts,udhaar_pay_acc_id, udhaar_dr_acc_id, udhaar_pay_other_info, udhaar_other_info, 
		udhaar_ent_dat,udhaar_ROI_Id,udhaar_ROI,udhaar_ROI_typ,udhaar_EMI_days,udhaar_EMI_occurrences,udhaar_sms_id,udhaar_prin_amt,udhaar_EMI_opt,udhaar_tras_type) 
		VALUES (
		'$custId','$ownerId','$firmId','$udhaarPreSerialNo','$udhaarSerialNo',
		'$custFirstName','$custLastName', '$custAddress', '$custCity',
                '$udhaarComm','$udhaarDOB', '$udhaarType',
		'New','$udhaarPayAccId','$udhaarDrAccId','$udhaarPayOtherInfo','$udhaarOtherInfo',
		$currentDateTime,'$roiId','$roiValue','$interestType','$udhaarEMINoOfDays','$udhaarEMIOccurrences','$smsTemplateId','$udhaarMainAmount','$udhaEMIOpt','EMI Money')";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        // End code to add column in udhaar table @Author:ANUJA11MAR16*************************
        parse_str(getTableValues("SELECT udhaar_id FROM udhaar where udhaar_own_id='$sessionOwnerId' order by udhaar_id desc"));
        $udhaarTotalEMIAmt = 0;
        $intAmt = ($udhaarMainAmount * $roiValue * $udhaarEMIOccurrences) / 100;
        $totalAmt = $udhaarMainAmount + $intAmt;
        $totalEMIAmt = om_round(($totalAmt / $udhaarEMIOccurrences), 2);
        $emiInt = om_round(($intAmt / $udhaarEMIOccurrences), 2);
        $emiAmt = om_round(($totalEMIAmt - $emiInt), 2);

        for ($i = 1; $i <= $udhaarEMIOccurrences; $i++) {
            if ($i == 1) {
                $emiStartDate = $udhaarDOB;
                $endDate = strtotime("+" . $udhaarEMINoOfDays . " days", strtotime($emiStartDate));
                $dueDate = om_strtoupper(date("d M Y", $endDate));
            }
            $queryItem = "INSERT INTO udhaar_deposit (
		udhadepo_udhaar_id, udhadepo_cust_id, udhadepo_own_id, udhadepo_firm_id,
		udhadepo_amt,udhadepo_DOB,udhadepo_upd_sts, udhadepo_ent_dat,
		udhadepo_EMI_no,udhadepo_EMI_start_DOB,udhadepo_EMI_end_DOB,udhadepo_EMI_amt,udhadepo_EMI_int_amt,udhadepo_EMI_total_amt,udhadepo_EMI_status,udhadepo_amt_left) 
		VALUES (
		'$udhaar_id','$custId', '$ownerId', '$firmId',
		'$emiAmt','$udhaarDOB','EMI', $currentDateTime,
		'$i','$emiStartDate','$dueDate','$emiAmt','$emiInt','$totalEMIAmt','Due','$totalEMIAmt')";
            if (!mysqli_query($conn,$queryItem)) {
                die('Error: ' . mysqli_error($conn));
            }
            $emiStartDate = $dueDate;
            $endDate = strtotime("+" . $udhaarEMINoOfDays . " days", strtotime($emiStartDate));
            $dueDate = om_strtoupper(date("d M Y", $endDate));
            $udhaarTotalEMIAmt = $udhaarTotalEMIAmt + $totalEMIAmt;
        }
        $counter = 1;
        $historyItem = '';
        for ($i = 1; $i <= $noOfUdhaarItems; $i++) {
            $itemAvail = trim($_POST['udhaarItemDel' . $i]);
            if ($itemAvail != 'Deleted') {
                $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
                $itemName = (trim($_POST['itemName' . $i]));
                $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
                $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
                $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
                $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));

                $historyItem = $historyItem . ', ' . $udhaarItemType . ' ' . $itemName;
                $queryItem = "INSERT INTO udhaar_items (
		udhaar_itm_own_id, udhaar_itm_udhaar_id,udhaar_itm_cust_id, udhaar_itm_metal_type, 
		udhaar_itm_name, udhaar_itm_pieces, udhaar_itm_gross_weight, 
                udhaar_itm_gross_weight_type, udhaar_itm_valuation,udhaar_itm_since) 
		VALUES (
		'$ownerId','$udhaar_id','$custId','$udhaarItemType',
		'$itemName','$udhaarItemPieces','$udhaarItemWeight',
                '$udhaarItemWeightType','$udhaarItemVal',$currentDateTime)";

                if (!mysqli_query($conn,$queryItem)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
            $counter++;
        }
        if ($udhaarType == 'Cash') {
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " taken cash on " . $udhaarDOB . ".<br/>";
        } else {
            $historyItem = substr($historyItem, 2);
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " amount left on puchase of  item - " . $historyItem . ".<br/>";
        }
        $query = "UPDATE udhaar SET
		                udhaar_history = '$udhaarHistory',udhaar_amt='$udhaarTotalEMIAmt'
                                WHERE udhaar_own_id = '$ownerId' and udhaar_id = '$udhaar_id'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        $sslg_trans_sub = 'NEW UDHAAR ADDED';
        $sysLogTransType = 'Udhaar';
        $sysLogTransId = $udhaarPreSerialNo . $udhaarSerialNo;
        $sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar Date: ' . $udhaarDOB . ',Udhaar Amount: ' . formatInIndianStyle($udhaarMainAmount);

        $apiType = 'insert';
        $payTotalAmtBal = $udhaarMainAmount;
        $itemAddDate = $udhaarDOB;
        include 'omudjrnl.php';
    }
    /*     * *****************Start code to add proper redirect to money panel @Author:SANT2May16***************************** */
    header("Location: " . $documentRoot . "/include/php/omuudetl.php?custId=$custId&firmId=$firmId&divMainMiddlePanel=Added&showDivPanel=UdhaarEMI");
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar&panelName=SHOW&mainPanel=" . $mainPanel . "&showDivPanel=UdhaarEMI");
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar&mainPanel=" . $mainPanel . "&showDivPanel=UdhaarEMI");
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar&mainPanel=" . $mainPanel . "&showDivPanel=UdhaarEMI");
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar&mainPanel=" . $mainPanel . "&showDivPanel=UdhaarEMI");
    }
}
/* * *****************End code to add proper redirect to money panel @Author:SANT2May16***************************** */
?>