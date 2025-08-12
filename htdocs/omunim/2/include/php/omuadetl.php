<?php

/*
 * Created on Mar 16, 2011 12:12:18 PM
 *
 * @FileName: omuadetl.php
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

//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
?>
<?php

//
//print_r($_REQUEST);
//die;
$ownerId = $_SESSION['sessionOwnerId'];
$custId = trim($_POST['custId']);
$panelName = trim($_POST['panelName']);
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
$qSelCustDetails = "SELECT user_fname,user_lname,user_add,user_city,user_pincode,user_state,user_country,user_mobile,user_firm_id FROM user where user_owner_id='$ownerId' and user_id='$custId'";
$resCustDetails = mysqli_query($conn, $qSelCustDetails);
$rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
//
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
$staffId = trim($_POST['udharStaffId']);
$udhaarPreSerialNo = trim($_POST['udhaarPreSerialNo']);
$udhaarSerialNo = trim($_POST['udhaarSerialNo']);
$udhaarType = trim($_POST['udhaarType']);
$udhaarPayAccId = trim($_POST['udhaarDrAccId']);
$udhaarDrAccId = trim($_POST['udhaarPayAccId']);
$udhaarChequeNo = trim($_POST['udhaarChequeNo']);
$udhaarPayOtherInfo = trim($_POST['udhaarPayOtherInfo']);
$udhaarOtherInfo = trim($_POST['udhaarOtherInfo']);
$noOfUdhaarItems = trim($_POST['noOfUdhaarItems']);
$endDOBDay = trim($_POST['endDOBDay']);
$endDOBMonth = trim($_POST['endDOBMonth']);
$endDOBYear = trim($_POST['endDOBYear']);
$udhaarROI = trim($_POST['selROIValue']);
$udhaarIntType = trim($_POST['udhaInterestType']);
$udhaarIntChk = trim($_POST['udhaarIntrestCheck']);
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
//start code to add End Date@Auth:ATHU14/1/17
$endDOBDay = stripslashes($endDOBDay);
$endDOBMonth = stripslashes($endDOBMonth);
$endDOBYear = stripslashes($endDOBYear);
$endDOBYear = trim($_POST['endDOBYear']);
$udhaarROI = trim($udhaarROI);
$udhaarIntType = trim($udhaarIntType);
$udhaarIntChk = trim($udhaarIntChk);
///end code
$udhaarMainAmount = mysqli_real_escape_string($conn, $udhaarMainAmount);
$DOBDay = mysqli_real_escape_string($conn, $DOBDay);
$DOBMonth = mysqli_real_escape_string($conn, $DOBMonth);
$DOBYear = mysqli_real_escape_string($conn, $DOBYear);
$staffId = mysqli_real_escape_string($conn, $staffId);
$firmId = mysqli_real_escape_string($conn, $firmId);
$udhaarPreSerialNo = mysqli_real_escape_string($conn, $udhaarPreSerialNo);
$udhaarSerialNo = mysqli_real_escape_string($conn, $udhaarSerialNo);
$udhaarType = mysqli_real_escape_string($conn, $udhaarType);
$udhaarPayAccId = mysqli_real_escape_string($conn, $udhaarPayAccId);
$udhaarChequeNo = mysqli_real_escape_string($conn, $udhaarChequeNo);
$udhaarPayOtherInfo = mysqli_real_escape_string($conn, $udhaarPayOtherInfo);
$udhaarOtherInfo = mysqli_real_escape_string($conn, $udhaarOtherInfo);
$udhaarOtherInfo .= ' ';
//start code to add end date @AUTH:ATHU14/1/17
$endDOBDay = mysqli_real_escape_string($conn, $endDOBDay);
$endDOBMonth = mysqli_real_escape_string($conn, $endDOBMonth);
$endDOBYear = mysqli_real_escape_string($conn, $endDOBYear);

$udhaarROI = mysqli_real_escape_string($conn, $udhaarROI);
$udhaarIntType = mysqli_real_escape_string($conn, $udhaarIntType);
$udhaarIntChk = mysqli_real_escape_string($conn, $udhaarIntChk);

if ($udhaarIntChk == 'on')
    $udhaarIntChk = 'true';

////End Code
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
$selNepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resNepaliDateMonthFormat = mysqli_query($conn, $selNepaliDateMonthFormat);
$rowNepaliDateMonthFormat = mysqli_fetch_array($resNepaliDateMonthFormat);
$nepaliDateMonthFormat = $rowNepaliDateMonthFormat['omly_value'];
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
if ($nepaliDateIndicator == 'YES') {
    if ($DOBDay != '' && $DOBMonth != '' && $DOBYear != '') {
        $udhaarOtherLangDOB = trim($DOBDay) . '-' . trim($DOBMonth) . '-' . trim($DOBYear);
        $nepali_date = new nepali_date();
        $english_date = $nepali_date->get_eng_date($DOBYear, $DOBMonth, $DOBDay);
        $udhaarDOB = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
    } else {
        $udhaarDOB = '';
    }
} else {
    $udhaarDOB = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;
    $udhaarOtherLangDOB = '';
}
//
if ($nepaliDateIndicator == 'YES') {
    if ($endDOBDay != '' && $endDOBMonth != '' && $endDOBYear != '') {
        $udhaarOtherLangEndDOB = trim($endDOBDay) . '-' . trim($endDOBMonth) . '-' . trim($endDOBYear);
        $nepali_date = new nepali_date();
        $english_date = $nepali_date->get_eng_date($endDOBYear, $endDOBMonth, $endDOBDay);
        $udhaarEndDOB = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
    } else {
        $udhaarEndDOB = '';
    }
} else {
    $udhaarEndDOB = $endDOBDay . ' ' . $endDOBMonth . ' ' . $endDOBYear;
    $udhaarOtherLangEndDOB = '';
}
///start code to add END DATE@AUTH:ATHU14/1/17
///End Code
//print_r($_REQUEST);
//die;
if ($udhaarMainAmount == '' or $udhaarMainAmount == NULL or $udhaarType == '' or $udhaarType == NULL or
        $udhaarDOB == '' or $udhaarDOB == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    $utin_type = 'udhaar ';
    // IT WILL FETCH CR ACCOUNT ID FOR UDHAAR TRANSACTION
    if ($udhaarType == 'udhaar') {
        $accCrName = 'Cash in Hand';
        $utin_transaction_type = 'UDHAAR';
    } else {
        $accCrName = 'Sundry Debtors';
        $utin_transaction_type = 'OnPurchase';
    }

//    echo '$udhaarPayAccId 11: ' . $udhaarPayAccId . '<br>';
//    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='$accCrName'"));
//    $udhaarPayAccId = $acc_id;
//    echo '$udhaarPayAccId 22: ' . $udhaarPayAccId . '<br>';
//    die;
    if ($panelName == 'UpdateUdhaar') {
        /*         * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */

        $noOfUdhaarItems = $_REQUEST['udhaarItemDivCounter'];
        $udhaarId = trim($_POST['udhaarId']);

        $query = "UPDATE user_transaction_invoice SET utin_user_id ='$custId',"
                . "utin_owner_id = '$ownerId',utin_firm_id = '$firmId',"
                . "utin_pre_invoice_no = '$udhaarPreSerialNo',utin_invoice_no = '$udhaarSerialNo',"
                . "utin_total_amt = '$udhaarMainAmount',utin_tot_payable_amt='$udhaarMainAmount',"
                . "utin_cash_balance='$udhaarMainAmount',utin_comm = '$udhaarComm',"
                . "utin_date = '$udhaarDOB', utin_other_lang_date = '$udhaarOtherLangDOB', utin_type = '$utin_type',"
                . "utin_transaction_type='$utin_transaction_type',utin_staff_id='$staffId',"
                . "utin_cr_acc_id = '$udhaarPayAccId',utin_due_date = '$udhaarEndDOB',utin_other_lang_due_date = '$udhaarOtherLangEndDOB',"
                . "utin_dr_acc_id = '$udhaarDrAccId',utin_paym_oth_info = '$udhaarPayOtherInfo',"
                . "utin_other_info = '$udhaarOtherInfo',utin_since =$currentDateTime,"
                . "utin_end_date='$udhaarEndDOB',utin_end_date='$udhaarEndDOB',utin_other_lang_end_date='$udhaarOtherLangEndDOB',utin_udhaar_roi='$udhaarROI',"
                . "utin_udhaar_int_type='$udhaarIntType',utin_udhaar_int_chk='$udhaarIntChk' "
                . "WHERE utin_owner_id = '$ownerId' and utin_id = '$udhaarId'";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }

        // it will update total deposit amount and cash balance
        update_deposit_money($utin_id, $udhaarId);
        /*         * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        $historyItem = "";
        if ($noOfUdhaarItems > 0) {
            $qSelItemId = "SELECT * FROM stock_transaction "
                    . "where sttr_owner_id = '$ownerId' and "
                    . "sttr_utin_id = '$udhaarId' order by sttr_id desc";
            $resItemId = mysqli_query($conn, $qSelItemId);
            $noOfItms = mysqli_num_rows($resItemId);

//            echo $noOfUdhaarItems . "<br>" . $noOfItms;
            for ($i = 1; $i <= $noOfUdhaarItems; $i++) {
//                echo $i . "<br>";
                // IT WILL INSERT ADDTIONAL ITEM WHICH ARE ADDED AT UPDATE UDHAAR
                if ($i > $noOfItms) {
                    $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
                    $itemName = (trim($_POST['itemName' . $i]));
                    $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
                    $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
                    $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
                    $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));

                    if ($udhaarItemPieces != '' && $itemName != '' && $udhaarItemWeight != '') {
                        $historyItem .= $itemName . ', ';

                        $query = "INSERT INTO stock_transaction ("
                                . "sttr_firm_id,sttr_owner_id,sttr_user_id,sttr_utin_id,"
                                . "sttr_staff_id,sttr_transaction_type,sttr_metal_type,"
                                . "sttr_stock_type,sttr_item_category,sttr_item_name,"
                                . "sttr_indicator,sttr_add_date,sttr_other_lang_add_date,sttr_quantity,sttr_gs_weight,"
                                . "sttr_gs_weight_type,sttr_final_fine_weight,sttr_status,"
                                . "sttr_valuation,sttr_pre_invoice_no, sttr_invoice_no) "
                                . "VALUES ("
                                . "'$firmId','$ownerId','$custId','$udhaarId',"
                                . "'$staffId','UDHAAR','$udhaarItemType',"
                                . "'retail','$udhaarItemType','$itemName',"
                                . "'stock','$udhaarDOB','$udhaarOtherLangDOB','$udhaarItemPieces','$udhaarItemWeight',"
                                . "'$udhaarItemWeightType','$udhaarItemWeight','PaymentDone',"
                                . "'$udhaarItemVal','$udhaarPreSerialNo','$udhaarSerialNo')";
                        if (!mysqli_query($conn, $query)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
//                    echo $query . "<br>";
                } else {
                    while ($rowItemId = mysqli_fetch_array($resItemId, MYSQLI_ASSOC)) {
                        $udharItemId = $rowItemId['sttr_id'];
                        $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
                        $itemName = (trim($_POST['itemName' . $i]));
                        $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
                        $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
                        $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
                        $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));
                        if ($udhaarItemPieces != '' && $itemName != '' && $udhaarItemWeight != '') {
                            $historyItem .= $itemName . ', ';

                            $query = "UPDATE stock_transaction "
                                    . "SET sttr_owner_id = '$ownerId',sttr_utin_id = '$udhaarId',"
                                    . "sttr_user_id = '$custId',sttr_staff_id = '$staffId',sttr_metal_type = '$udhaarItemType',"
                                    . "sttr_item_name = '$itemName',sttr_quantity = '$udhaarItemPieces',"
                                    . "sttr_gs_weight = '$udhaarItemWeight',sttr_final_fine_weight='$udhaarItemWeight',"
                                    . "sttr_gs_weight_type = '$udhaarItemWeightType',sttr_valuation = '$udhaarItemVal',"
                                    . "sttr_firm_id='$firmId',sttr_item_category='$udhaarItemType',"
                                    . "sttr_pre_invoice_no='$udhaarPreSerialNo',sttr_invoice_no='$udhaarSerialNo' "
                                    . "WHERE sttr_id  = '$udharItemId'";
//                        echo $query . "<br>" . $i;
                            if (!mysqli_query($conn, $query)) {
                                die('Error: ' . mysqli_error($conn));
                            }
                        }
                        $i++;
                    }
                    $i--;
                }
            }
        }

//            $counter = 1;
//            if ($noOfItms > 0) {
//                $historyItem = '';
//                while ($rowItemId = mysqli_fetch_array($resItemId, MYSQLI_ASSOC)) {
//                    $udharItemId = $rowItemId['sttr_id'];
//                    $i = $udharItemId;
//                      $itemAvail = trim($_POST['udhaarItemDel' . $i]);
//                      if ($itemAvail != 'Deleted') {
//                    $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
//                    $itemName = (trim($_POST['itemName' . $i]));
//                    $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
//                    $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
//                    $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
//                    $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));
//                    $historyItem = $historyItem . ', ' . $udhaarItemType . ' ' . $itemName;
//
//                    $query = "UPDATE stock_transaction "
//                            . "SET sttr_owner_id = '$ownerId',sttr_utin_id = '$udhaarId',"
//                            . "sttr_user_id = '$custId',sttr_metal_type = '$udhaarItemType',"
//                            . "sttr_item_name = '$itemName',sttr_quantity = '$udhaarItemPieces',"
//                            . "sttr_gs_weight = '$udhaarItemWeight',sttr_final_fine_weight='$udhaarItemWeight',"
//                            . "sttr_gs_weight_type = '$udhaarItemWeightType',sttr_valuation = '$udhaarItemVal',"
//                            . "sttr_firm_id='$firmId',sttr_item_category='$udhaarItemType',"
//                            . "sttr_pre_invoice_no='$udhaarPreSerialNo',sttr_invoice_no='$udhaarSerialNo',"
//                            . "WHERE sttr_id  = '$udharItemId'";
//
//                    if (!mysqli_query($conn, $query)) {
//                        die('Error: ' . mysqli_error($conn));
//                    }
////            }
//                    $counter++;
//                }
//            } else {
//                for ($i = $counter; $i <= $noOfUdhaarItems; $i++) {
////                    $itemAvail = trim($_POST['udhaarItemDel' . $i]);
////                    if ($itemAvail != 'Deleted') {
//                        $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
//                        $itemName = (trim($_POST['itemName' . $i]));
//                        $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
//                        $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
//                        $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
//                        $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));
//                        $historyItem = $historyItem . ', ' . $udhaarItemType . ' ' . $itemName;
//
//                        $OnpurchaseItemQuery = "INSERT INTO stock_transaction ("
//                                . "sttr_firm_id,sttr_owner_id,sttr_user_id,sttr_utin_id,"
//                                . "sttr_staff_id,sttr_transaction_type,sttr_metal_type,"
//                                . "sttr_stock_type,sttr_item_category,sttr_item_name,"
//                                . "sttr_indicator,sttr_add_date,sttr_quantity,sttr_gs_weight,"
//                                . "sttr_gs_weight_type,sttr_final_fine_weight,sttr_status,"
//                                . "sttr_valuation,sttr_pre_invoice_no, sttr_invoice_no) "
//                                . "VALUES ("
//                                . "'$firmId','$ownerId','$custId','$udhaarId',"
//                                . "'','UDHAAR','$udhaarItemType',"
//                                . "'retail','$udhaarItemType','$itemName',"
//                                . "'stock','$udhaarDOB','$udhaarItemPieces','$udhaarItemWeight',"
//                                . "'$udhaarItemWeightType','$udhaarItemWeight','PaymentDone',"
//                                . "'$udhaarItemVal','$udhaarPreSerialNo','$udhaarSerialNo')";
//
//                        if (!mysqli_query($conn, $OnpurchaseItemQuery)) {
//                            die('Error: ' . mysqli_error($conn));
//                        }
////                    }
////                    $counter++;
////                }
//            }
//        }
        if ($udhaarType == 'udhaar') {
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " taken cash on " . $udhaarDOB;
        } else {
            if ($historyItem == '')
                $historyItem = " No Item Added";
            else
                $historyItem = substr($historyItem, 0, strlen($historyItem) - 2);
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " amount left on purchase of  item - " . $historyItem;
        }

        /*         * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */

        $query = "UPDATE user_transaction_invoice SET
		                utin_history = ' $udhaarHistory '
                                WHERE utin_owner_id = '$ownerId' and utin_id = '$udhaarId'";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        /*         * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        /*         * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
        $sysLogTransId = $udhaarPreSerialNo . $udhaarSerialNo;
        $sslg_trans_sub = 'UDHAAR UPDATED';
        $sysLogTransType = 'Udhaar';
        $sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar Date: ' . $udhaarDOB . ',Udhaar Amount: ' . formatInIndianStyle($udhaarMainAmount);
        /*         * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */

        //**********START CODE TO FIX UDHAAR JOURNAL ENTRIES ISSUE****************
        $query = "DELETE jrtr FROM journal as jrnl "
                . "JOIN journal_trans as jrtr  ON  jrnl_id =jrtr_jrnl_id "
                . " WHERE jrnl_trans_id='$udhaarId'";

        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }

        //**********END CODE TO FIX UDHAAR JOURNAL ENTRIES ISSUE****************
        // Start code to add column in udhaar table @Author:ANUJA11MAR16*************************
        $apiType = 'update';
        $payTotalAmtBal = $udhaarMainAmount;
        $itemAddDate = $udhaarDOB;
        include 'omudjrnl.php';
    } else {
        /*         * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */

        if ($udhaarMainAmount > 0) {
            parse_str(getTableValues("SELECT acc_id AS cashACC FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Cash in Hand'"));
        }

        // START CODE FOR UDHAAR ENTRY TO CHANGE utin_CRDR, utin_cash_CRDR IN user_transaction_invoice TABLE @PRIYANKA-16MAY18
        $query = "INSERT INTO user_transaction_invoice(
		utin_user_id, utin_owner_id, utin_firm_id,utin_staff_id,utin_pre_invoice_no,utin_invoice_no,
		utin_total_amt,utin_tot_payable_amt, utin_cash_balance, utin_comm, utin_date, utin_other_lang_date, utin_type,
		utin_status,utin_cr_acc_id, utin_dr_acc_id, utin_paym_oth_info, utin_other_info, 
		utin_since,utin_transaction_type,utin_end_date,utin_other_lang_due_date,utin_other_lang_end_date,utin_cash_CRDR,utin_CRDR,utin_pay_cash_acc_id,
                utin_udhaar_roi,utin_udhaar_int_type,utin_udhaar_int_chk) 
		VALUES (
		'$custId','$ownerId','$firmId','$staffId','$udhaarPreSerialNo','$udhaarSerialNo',
		'$udhaarMainAmount','$udhaarMainAmount','$udhaarMainAmount','$udhaarComm','$udhaarDOB','$udhaarOtherLangDOB','$utin_type',
		'New','$udhaarPayAccId','$udhaarDrAccId','$udhaarPayOtherInfo','$udhaarOtherInfo',
		$currentDateTime,'$utin_transaction_type','$udhaarEndDOB','$udhaarOtherLangEndDOB','$udhaarOtherLangEndDOB','DR','DR','$cashACC',"
                . "'$udhaarROI','$udhaarIntType','$udhaarIntChk')";
        // END CODE FOR UDHAAR ENTRY TO CHANGE utin_CRDR, utin_cash_CRDR IN user_transaction_invoice TABLE @PRIYANKA-16MAY18

        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            $utin_id = mysqli_insert_id($conn);
        }

        $historyItem = "";
        $counter = 1;
        if ($noOfUdhaarItems > 0) {
            while ($counter <= $noOfUdhaarItems) {
                $sttr_indicator = "stock";
                $sttr_transaction_type = 'UDHAAR';
                $sttr_status = "PaymentDone";
                $sttr_metal_type = $_REQUEST['udhaarItemType' . $counter];
                $sttr_item_name = $_REQUEST['itemName' . $counter];
                $sttr_quantity = $_REQUEST['udhaarItemPieces' . $counter];
                $sttr_gs_weight = $_REQUEST['udhaarItemWeight' . $counter];
                $sttr_gs_weight_type = $_REQUEST['udhaarItemWeightType' . $counter];
                $sttr_valuation = $_REQUEST['udhaarItemVal' . $counter];

                if ($sttr_item_name != '' && $sttr_quantity != '' && $sttr_gs_weight != '') {
                    $historyItem .= $sttr_item_name . ",";
                    $OnpurchaseItemQuery = "INSERT INTO stock_transaction ("
                            . "sttr_firm_id,sttr_owner_id,sttr_user_id,sttr_utin_id,"
                            . "sttr_staff_id,sttr_transaction_type,sttr_metal_type,"
                            . "sttr_stock_type,sttr_item_category,sttr_item_name,"
                            . "sttr_indicator,sttr_add_date,sttr_other_lang_add_date,sttr_quantity,sttr_gs_weight,"
                            . "sttr_gs_weight_type,sttr_final_fine_weight,sttr_status,"
                            . "sttr_valuation,sttr_pre_invoice_no, sttr_invoice_no) "
                            . "VALUES ("
                            . "'$firmId','$ownerId','$custId','$utin_id',"
                            . "'$staffId','$sttr_transaction_type','$sttr_metal_type',"
                            . "'retail','$sttr_metal_type','$sttr_item_name',"
                            . "'$sttr_indicator','$udhaarDOB','$udhaarOtherLangDOB','$sttr_quantity','$sttr_gs_weight',"
                            . "'$sttr_gs_weight_type','$sttr_gs_weight','PaymentDone',"
                            . "'$sttr_valuation','$udhaarPreSerialNo','$udhaarSerialNo')";

                    if (!mysqli_query($conn, $OnpurchaseItemQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
                $counter++;
            }
        }


        // End code to add column in udhaar table @Author:ANUJA11MAR16*************************
//        parse_str(getTableValues("SELECT utin_id FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' order by utin_id desc"));
        /*         * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
//        $counter = 1;
//        $historyItem = '';
//        for ($i = 1; $i <= $noOfUdhaarItems; $i++) {
//            $itemAvail = trim($_POST['udhaarItemDel' . $i]);
//            if ($itemAvail != 'Deleted') {
//                $udhaarItemType = trim($_POST['udhaarItemType' . $i]);
//                $itemName = (trim($_POST['itemName' . $i]));
//                $udhaarItemPieces = (trim($_POST['udhaarItemPieces' . $i]));
//                $udhaarItemWeight = (trim($_POST['udhaarItemWeight' . $i]));
//                $udhaarItemWeightType = (trim($_POST['udhaarItemWeightType' . $i]));
//                $udhaarItemVal = (trim($_POST['udhaarItemVal' . $i]));
//
//                $historyItem = $historyItem . ', ' . $udhaarItemType . ' ' . $itemName;
//                $queryItem = "INSERT INTO udhaar_items (
//		udhaar_itm_own_id, udhaar_itm_udhaar_id,udhaar_itm_cust_id, udhaar_itm_metal_type, 
//		udhaar_itm_name, udhaar_itm_pieces, udhaar_itm_gross_weight, 
//                udhaar_itm_gross_weight_type, udhaar_itm_valuation,udhaar_itm_since) 
//		VALUES (
//		'$ownerId','$udhaar_id','$custId','$udhaarItemType',
//		'$itemName','$udhaarItemPieces','$udhaarItemWeight',
//                '$udhaarItemWeightType','$udhaarItemVal',$currentDateTime)";
//
//                if (!mysqli_query($conn,$queryItem)) {
//                    die('Error: ' . mysqli_error($conn));
//                }
////                $udhaarComm .= $counter . '. ' . '<font color=blue> Item: </font>' . $udhaarItemType . ' ' . $itemName . '<font color=blue> Qty: </font>' . $udhaarItemPieces . ' <font color=blue> Weight:</font> ' .
////                        $udhaarItemWeight . $udhaarItemWeightType . ' <font color=blue> Val:</font> ' . $udhaarItemVal . '<br/>';
//                //$udhaarComm .= $counter . '. ' . $udhaarItemType . ' ' . $itemName . $udhaarItemPieces . $udhaarItemWeight . $udhaarItemWeightType . $udhaarItemVal . '<br/>';
//            }
//            $counter++;
//        }
        if($nepaliDateIndicator == 'YES') {
//            echo '$udhaarDOB='.$udhaarDOB;
            $day_en = substr($udhaarDOB, 0, 2);
                        $selMnth = substr($udhaarDOB, 3, -5);
                        $year_en = substr($udhaarDOB, -4);
                        //
                        if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                            // Convert the month abbreviation to its numeric representation (zero-padded)
                            $selMnth = date('m', strtotime($selMnth));
                        }
//                        echo $year_en.' '.$selMnth.' '.$day_en.'<br>';
                        $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
//                        echo '$girviDOBDate='.$girviDOBDate;
                        if($girviDOBDate == '1'){
                            $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
                            
                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                $udhaarNepDate = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                            } else {
                                $udhaarNepDate = $date_ne[d] . '-' . $date_ne[M] . '-' . $date_ne[y];
                            }
                        }
        }
        if ($udhaarType == 'udhaar') {
            if($nepaliDateIndicator == 'YES') {
                $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " taken cash on " . $udhaarNepDate . ".<br/>";
            }else{
                $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " taken cash on " . $udhaarDOB . ".<br/>";
            }
            
        } else {
            if ($historyItem == '')
                $historyItem = " No Item Added";
            else
                $historyItem = substr($historyItem, 0, strlen($historyItem) - 1);
            $udhaarHistory = "$globalCurrency " . $udhaarMainAmount . " amount left on purchase of  item - " . $historyItem . ".<br/>";
        }
        /*         * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        $query = "UPDATE user_transaction_invoice SET
		                utin_history = '$udhaarHistory'
                                WHERE utin_owner_id = '$ownerId' and utin_id = '$utin_id'";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        /*         * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        $sslg_trans_sub = 'NEW UDHAAR MONEY ADDED';
        $sysLogTransType = 'Udhaar';
        $sysLogTransId = $udhaarPreSerialNo . $udhaarSerialNo;
        $sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar Date: ' . $udhaarDOB . ',Udhaar Amount: ' . formatInIndianStyle($udhaarMainAmount);
        /*         * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */
        $apiType = 'insert';
        $payTotalAmtBal = $udhaarMainAmount;
        $itemAddDate = $udhaarDOB;
        $udhaar_id = $utin_id;
        include 'omudjrnl.php';
    }
    /*     * *****************Start code to add proper redirect to money panel @Author:SANT2May16***************************** */
    header("Location: " . $documentRoot . "/include/php/omuudetl.php?custId=$custId&firmId=$firmId&divMainMiddlePanel=Added");
    /*     * ******Start code to add header for omgold @Author:PRIYA19DEC14*************** */
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar&panelName=SHOW");
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar");
    }//to add condition for omloan @AUTHOR: SANDY20NOV13
    else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar");
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location: " . $documentRoot . "/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custId=$custId&custPanelOption=CustUdhaar");
    }
    /*     * ******End code to add header for omgold @Author:PRIYA19DEC14*************** */
    /*     * *****************End code to add proper redirect to money panel @Author:SANT2May16***************************** */
}
//require_once 'omssclin.php';
?>