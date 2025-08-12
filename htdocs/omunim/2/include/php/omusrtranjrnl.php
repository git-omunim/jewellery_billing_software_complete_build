<?php

/*
 * *****************************************************************************
 * @tutorial: JOURNAL ENTRY FILE
 * *****************************************************************************
 * 
 * Created on 15 Sep, 2017 12:21:22 PM
 *
 * @FileName: omusrtranjrnl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2017 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2017 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$sessionOwnerId = $_SESSION['sessionOwnerId'];
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php

//
//
//echo '$sttr_indicator == ' . $sttr_indicator . '<br />';
//echo '$transactionType == ' . $transactionType . '<br />';
//echo '$payOtherAccId == ' . $payOtherAccId . '<br />';
//echo '$payOtherAmt == ' . $payOtherAmt . '<br />';
//echo '$payGoldAccId ##== ' . $payGoldAccId . '<br />';
//echo '$paySilverAccId ##== ' . $paySilverAccId . '<br />';
//echo '$puchaseGoldAccId ##== ' . $puchaseGoldAccId . '<br />';
//echo '$puchaseSilverAccId ##== ' . $puchaseSilverAccId . '<br />';
//echo '$saleGoldAccId ##== ' . $saleGoldAccId . '<br />';
//echo '$saleSilverAccId ##== ' . $saleSilverAccId . '<br />';
//echo '$payStockInvAccId ##== ' . $payStockInvAccId . '<br />';
//echo '$payStockGoldCashAmt ==## ' . $payStockGoldCashAmt . '<br />';
//echo '$payGoldCashAmt ==## ' . $payGoldCashAmt . '<br />';
//echo '$payFinalPayableAmt ==## ' . $payFinalPayableAmt . '<br />';
//echo '$transApiType ==## ' . $transApiType . '<br />';
//echo '$stockAccountEntry ==## ' . $stockAccountEntry . '<br />';
//echo '$accId ==## ' . $accId . '<br />';
//echo '$paySettledAccId ==## ' . $paySettledAccId . '<br />';
//echo '%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ' . '<br />';  
//die;
//
//
//$transApiType // Already we are getting from ommpfndv file
//$userId; // Already we are getting from ommpfndv file
//$userAccId = $user_acc_id;
//$userType = $user_type;
//$userName = $user_fname . ' ' . $user_lname;
//$transId = $utin_id;
//$firmId = $firmId; // Already we are getting from ommpfndv file
//$payFinalPayableAmt
//$payAddDate
//$accId
//$payCashAmt
//$jrnlId  // We will get this id in case of update and delete
//
//
// ========================================================================================== //
// START CODE TO GET GOLBAL ROUND OFF FUNCTION SETTING DETAILS @AUTHOR:MADHUREE-27OCTOBER2020 //
// ========================================================================================== //
//
$selRoundOffFunction = "SELECT omly_value FROM omlayout WHERE omly_option = 'roundOffFunction'";
$resRoundOffFunction = mysqli_query($conn, $selRoundOffFunction);
$rowRoundOffFunction = mysqli_fetch_array($resRoundOffFunction);
$roundOffFunction = $rowRoundOffFunction['omly_value'];
//
// ========================================================================================== //
// END CODE TO GET GOLBAL ROUND OFF FUNCTION SETTING DETAILS @AUTHOR:MADHUREE-27OCTOBER2020 //
// ========================================================================================== //
//
//
//

if ($utin_payment_mode == '' || $utin_payment_mode == NULL) {
    $utin_payment_mode = $_REQUEST['paymentMode'];
}
if (($transactionType == 'sell' || $transactionType == 'PURBYSUPP') && $payAdditionalChargsAmt < 0) {
    $payAdditionalChargsAmt = abs($payAdditionalChargsAmt);
}
// START CODE TO ADD CONDITION FOR ADD STOCK PANEL @PRIYANKA-11JUNE18
// $transactionType != 'EXISTING' is check for stock and inventory entry from Add Stock Panel
if ($transactionType != 'EXISTING' && $transactionType != 'PURONCASH' && $transactionType != 'TAG') {
    //
    if ($userId != NULL && $userId != '') {
        //
        parse_str(getTableValues("SELECT user_acc_id,user_type,user_fname,user_lname "
                        . "FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' "
                        . "and user_id='$userId'"));
        //
    } else {
        //
        if ($utinType != 'Transaction' && $transactionType != 'TransPayment') {
            //    
            echo 'Error in payment panel Journal Entry, user id is not found !!!' . '<br />';
            //. ' user id = ' . $userId . ' is not found for transaction = ' . $transactionType  . 
            //  ' on date = ' . $payAddDate . ' and utin_id = ' . $utin_id . '<br />';
            //
        }
        //
    }
    //
}
// END CODE TO ADD CONDITION FOR ADD STOCK PANEL @PRIYANKA-11JUNE18
//
//
if ($transactionType == 'PURONCASH') {
    $transactionType = 'PURBYSUPP';
}
//
if ($transactionType != 'OnPurchase' && $stockAccountEntry != 'No')
    $userAccId = $user_acc_id;
//
//
//echo '$userAccId == ' . $userAccId . '<br />';
//
//
$userType = $user_type;
$userName = $user_fname . ' ' . $user_lname;
$transId = $utin_id;
//
//
//$firmId = $firmId; // Already we are getting from ommpfndv file
//
//
//echo '<br/>payFinalPayableAmt:' . $payFinalPayableAmt.'<br/>';
//
//
// START CODE TO ADD CONDITION FOR PAYMENT/RECEIPT @PRIYANKA-19MAY18
if ($transactionType == 'UDHAAR DEPOSIT' || $transactionType == 'ADV RETURN' || $transactionType == 'SCHEME RETURN' ||
        $transactionType == 'RECEIPT' || $transactionType == 'PAYMENT') {
    // END CODE TO ADD CONDITION FOR PAYMENT/RECEIPT @PRIYANKA-19MAY18
    // 
    // Total Payable Amount
    //
    //
    // START CODE TO GET UDHAAR INTEREST AMOUNT WHEN PAYMENT IS DONE PAYMENT PANEL,@AUTHOR:HEMA-28OCT2020
    if (($payIntAmt == null || $payIntAmt == '') && ($utin_udhaar_int_amt != null || $utin_udhaar_int_amt != '')) {
        $udhaarCashRecAmount = $udhaarCashRecAmount + $utin_udhaar_int_amt;
        $payIntAmt = $utin_udhaar_int_amt;
    }
    // END CODE TO GET UDHAAR INTEREST AMOUNT WHEN PAYMENT IS DONE PAYMENT PANEL,@AUTHOR:HEMA-28OCT2020
    //
    //
    if ($payIntAmt != null || $payIntAmt != '') {
        $jrnlDrAmount = $udhaarCashRecAmount - $payIntAmt; //CODE ADDED TO FOR INTREST ON UDHAAR,@AUTHOR:HEMA-27OCT2020
    } else {
        $jrnlDrAmount = $udhaarCashRecAmount - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt;
    }
    // 
    // Total Payable Amount
    if ($payIntAmt != null || $payIntAmt != '') {
        $jrnlCrAmount = $udhaarCashRecAmount - $payIntAmt; //CODE ADDED TO FOR INTREST ON UDHAAR,@AUTHOR:HEMA-27OCT2020
    } else {
        $jrnlCrAmount = $udhaarCashRecAmount - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt;
    }
    //
    if ($transactionType == 'UDHAAR DEPOSIT')
        $acc = 'utin_dr_acc_id';
    //
    if ($transactionType == 'ADV RETURN' || $transactionType == 'SCHEME RETURN')
        $acc = 'utin_cr_acc_id';
    //
    //
    //echo '<br/>$jrnlDrAmount:' . $jrnlDrAmount;
    //echo '<br/>$jrnlCrAmount:' . $jrnlCrAmount;
    //
    //
} else {
    //
    //
    // MINUS MKG/LAB CHRGS AMT & MKG/LAB CHRGS TAXE @PRIYANKA-14-DEC-17
    // We save this amount in jrnl main entry, and these amounts we will minus in sell file or purchase file
    $jrnlDrAmount = $payFinalPayableAmt; // Total Payable Amount // - ($payTotOthChgs + $payMkgCGSTAmt + $payMkgSGSTAmt)
    //
    //
    // MINUS MKG/LAB CHRGS AMT & MKG/LAB CHRGS TAXE @PRIYANKA-14-DEC-17
    $jrnlCrAmount = $payFinalPayableAmt; // Total Payable Amount // - ($payTotOthChgs + $payMkgCGSTAmt + $payMkgSGSTAmt)
    //
    //
}
//
//
if ($transactionType != 'RECEIPT' && $transactionType != 'PAYMENT') {
    //
    if ($payPrevTotAmt > 0) {
        //
        if ($payPrevCashBalCRDR != $payCRDR) {
            //
            if ($payableCashCRDR == '' && $utin_total_taxable_amt < $payPrevTotAmt && $utin_cash_balance != 0 &&
                    $utin_cash_balance != '0.00' && $utin_cash_balance != '') {
                $payableCashCRDR = $utin_cash_CRDR;
            }
            //
            if ($payableCashCRDR == 'CR') {
                $jrnlDrAmount = abs($payPrevTotAmt - $payFinalPayableAmt);
                $jrnlCrAmount = abs($payPrevTotAmt - $payFinalPayableAmt);
            } else {
                $jrnlDrAmount = ($payFinalPayableAmt + $payPrevTotAmt);
                $jrnlCrAmount = ($payFinalPayableAmt + $payPrevTotAmt);
            }
            //
        } else {
            //
            $jrnlDrAmount = ($payFinalPayableAmt - $payPrevTotAmt);
            $jrnlCrAmount = ($payFinalPayableAmt - $payPrevTotAmt);
            //
        }
    }
}
//
//
// Transaction Date
$jrnlDate = $payAddDate; // Transaction Date
//
// $payCashAmt // Cash Amount
//
/* * ********************************************************************** */
/* START CODE To Add Payment Panel Journal Entry @AUTHOR:LOVE15SEP2017    */
/* * ********************************************************************** */
//
//
//echo '$accId == '.$accId.'<br />';
//echo '$firmId == '.$firmId.'<br />';
//echo '$userName == '.$userName.'<br />';
//echo '$stockProductCode == '.$stockProductCode.'<br />';
//
//
// Main Transaction Id
// $accId got from omptamtid.php file
$jrtrEntryIndicator = NULL;
//
if ($_REQUEST['utin_transaction_type'] == 'PURBYSUPP' && $_REQUEST['utin_type'] == 'stock') {
    $TDSAmt = $payTaxAmt;
    $payTaxAmt = abs($payTaxAmt);
}
if ($accId != NULL && $accId != '') {
    //
    parse_str(getTableValues("SELECT acc_id, acc_user_acc FROM accounts "
                    . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                    . "and acc_id = '$accId' and acc_firm_id = '$firmId'"));
    //
    //
    //if ($userName === NULL || $userName === '') {
    //}
    //
    //
    if ($stockProductCode != NULL && $stockProductCode != '') {
        $jrnlTransAccId = $acc_id;
        $jrnlTransDesc = $acc_user_acc . ' (' . $stockProductCode . ')';
    } else {
        $jrnlTransAccId = $acc_id;
        $jrnlTransDesc = $acc_user_acc . ' (' . $userName . ')';
    }
    //
    //
    //Start Code Adding Raw Metal Purchase Journal Entry @Author:21-03-2024
    //
    if ($acc_user_acc == 'Purchase RAW Gold' && $transactionType == 'PURBYSUPP') {
        parse_str(getTableValues("SELECT acc_id as rawGoldAccId,acc_user_acc FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Stock Raw Gold' and acc_firm_id = '$firmId'"));
        $puchaseGoldAccId = $rawGoldAccId;
        $payGoldCashAmt = ($payFinalPayableAmt - $payTotOthChgs - $payTotHallmarkChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt - $payHallmarkCGSTAmt - $payHallmarkSGSTAmt - $payHallmarkIGSTAmt - $payCourierAmt - $payCrystalAmt) + $payRoundOffAmt;
        $puchaseGdName = $acc_user_acc . ' (' . $userName . ')';
        //
        parse_str(getTableValues("SELECT acc_id as rawStoneAccId,acc_user_acc FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Stock Raw Stone' and acc_firm_id = '$firmId'"));
        $puchaseStAccId = $rawStoneAccId;
        $payStoneCashAmt = $payCrystalAmt;
        $puchaseStName = $acc_user_acc . ' (' . $userName . ')';
    } else if ($acc_user_acc == 'Purchase RAW Silver' && $transactionType == 'PURBYSUPP') {
        parse_str(getTableValues("SELECT acc_id as rawSilverAccId,acc_user_acc FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Stock Raw Silver' and acc_firm_id = '$firmId'"));
        $puchaseSilverAccId = $puchaseSlAccId = $rawSilverAccId;
        $paySilverCashAmt = ($payFinalPayableAmt - - $payTotOthChgs - $payTotHallmarkChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt - $payHallmarkCGSTAmt - $payHallmarkSGSTAmt - $payHallmarkIGSTAmt - $payCourierAmt - $payCrystalAmt) + $payRoundOffAmt;
        $puchaseSlName = $acc_user_acc . ' (' . $userName . ')';
        //
        parse_str(getTableValues("SELECT acc_id as rawStoneAccId,acc_user_acc FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Stock Raw Stone' and acc_firm_id = '$firmId'"));
        $puchaseStAccId = $rawStoneAccId;
        $payStoneCashAmt = $payCrystalAmt;
        $puchaseStName = $acc_user_acc . ' (' . $userName . ')';
    }
    //
    //End Code Adding Raw Metal Purchase Journal Entry @Author:21-03-2024
    //
    //
    //echo '$jrnlTransAccId == ' . $jrnlTransAccId . '<br />';
    //echo '$jrnlTransDesc == ' . $jrnlTransDesc . '<br /><br />';
    //
    //
    if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
        //
        $jrtrEntryIndicator = 'NO';
        //
    }
    //
    if ($transactionType == 'ItemReturn') {
        //
        $jrtrEntryIndicator = 'NO';
        //
    }
    //
}
//
//
//
//
// || $transactionType == 'ADV RETURN' hitde this condition because if we return advance then wrong entry add in journal
//
if ($transactionType == 'UDHAAR DEPOSIT' || $transactionType == 'ADV RETURN' || $transactionType == 'SCHEME RETURN') {
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id=(SELECT $acc FROM user_transaction_invoice WHERE utin_id='$utin_utin_id') "
                    . "and acc_firm_id = '$firmId'"));
    $jrnlTransAccId = $acc_id;
    $jrnlTransDesc = $acc_user_acc . ' (' . $userName . ')';
} else if ($transactionType == 'SCHEME RETURN') {
    $accCRName = 'Saving Scheme'; //CHANGED ACCOUNT TO SAVING SCHEME @AUTHOR:MADHUREE-27OCT2020
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$firmId' and acc_user_acc='$accCRName'"));
    $jrnlTransAccId = $acc_id;
    $jrnlTransDesc = $acc_user_acc . ' (' . $userName . ')';
}
//
//
if ($userAccId != NULL && $userAccId != '') {
    // 
    // Sundry Debtors Account Id
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$userAccId' and acc_firm_id = '$firmId'"));
    //
    $sundryDebAccId = $acc_id;
    $sundryDebAccName = $acc_user_acc . ' (' . $userName . ')';
    //
    //echo '$sundryDebAccId == ' . $sundryDebAccId . '<br />';
    //echo '$sundryDebAccName == ' . $sundryDebAccName . '<br />';
    //
}
//
//
if ($transactionType == 'UDHAAR DEPOSIT' || $transactionType == 'ADV RETURN' || $transactionType == 'SCHEME RETURN') {

    parse_str(getTableValues("SELECT utin_transaction_type FROM user_transaction_invoice "
                    . "WHERE utin_id='$utin_utin_id'"));

    $mainTransType = $utin_transaction_type;
}
//
//
//
// ********************************************************************************************************************************************
// START CODE FOR INTEREST PAID ACCOUNT ID & NAME @PRIYANKA-08MAR19
// ********************************************************************************************************************************************
if (($payInterestPaidAccId != NULL && $payInterestPaidAccId != '') || $transApiType == 'update') {
    // 
    // Interest Paid Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payInterestPaidAccId' and acc_firm_id = '$firmId'"));
    //
    $interestPaidAccId = $acc_id;
    $interestPaidAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
// ********************************************************************************************************************************************
// END CODE FOR INTEREST PAID ACCOUNT ID & NAME @PRIYANKA-08MAR19
// ********************************************************************************************************************************************
//
//
// ********************************************************************************************************************************************
// START CODE FOR INTEREST RECEIVE ACCOUNT ID & NAME @PRIYANKA-08MAR19
// ********************************************************************************************************************************************
if (($payInterestRecAccId != NULL && $payInterestRecAccId != '') || $transApiType == 'update') {
    // 
    // Interest Receive Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payInterestRecAccId' and acc_firm_id = '$firmId'"));
    //
    $interestRecAccId = $acc_id;
    $interestRecAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
// ********************************************************************************************************************************************
// END CODE FOR INTEREST RECEIVE ACCOUNT ID & NAME @PRIYANKA-08MAR19
// ********************************************************************************************************************************************
//
//
// ********************************************************************************************************************************************
// START CODE FOR GOLD ACCOUNT ID & NAME @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
if (($payGoldAccId != NULL && $payGoldAccId != '') || $transApiType == 'update') {
    // 
    // Gold Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payGoldAccId' and acc_firm_id = '$firmId'"));
    //
    if ($stockProductCode != NULL && $stockProductCode != '') {
        $goldAccId = $acc_id;
        $goldAccName = $acc_user_acc . ' (' . $stockProductCode . ')';
    } else {
        $goldAccId = $acc_id;
        $goldAccName = $acc_user_acc . ' (' . $userName . ')';
    }
    //
}
// ********************************************************************************************************************************************
// END CODE FOR GOLD ACCOUNT ID & NAME @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
//
//
// ********************************************************************************************************************************************
// START CODE FOR SILVER ACCOUNT ID & NAME @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
if (($paySilverAccId != NULL && $paySilverAccId != '') || $transApiType == 'update') {
    // 
    // Silver Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$paySilverAccId' and acc_firm_id = '$firmId'"));
    //
    if ($stockProductCode != NULL && $stockProductCode != '') {
        $silverAccId = $acc_id;
        $silverAccName = $acc_user_acc . ' (' . $stockProductCode . ')';
    } else {
        $silverAccId = $acc_id;
        $silverAccName = $acc_user_acc . ' (' . $userName . ')';
    }
    //
}
// ********************************************************************************************************************************************
// END CODE FOR SILVER ACCOUNT ID & NAME @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
//
//
// ==================================================================================================== //
// START CODE TO ADD ACCOUNT DETAIL FOR PURCHASE STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
// ==================================================================================================== //
//
if (($payStoneAccId != NULL && $payStoneAccId != '') || $transApiType == 'update') {
    // 
    // Gold Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payStoneAccId' and acc_firm_id = '$firmId'"));
    //
    $stoneAccId = $acc_id;
    $stoneAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
//
// ================================================================================================== //
// END CODE TO ADD ACCOUNT DETAIL FOR PURCHASE STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
// ================================================================================================== //
//
//
// ********************************************************************************************************************************************
// START CODE FOR STOCK & INVENTORY ACCOUNT ID & NAME @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
if (($payStockInvAccId != NULL && $payStockInvAccId != '') || $transApiType == 'update') {
    // 
    // Stock & Inventory Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payStockInvAccId' and acc_firm_id = '$firmId'"));
    //
    if ($stockProductCode != NULL && $stockProductCode != '') {
        $stockInvAccId = $acc_id;
        $stockInvAccName = $acc_user_acc . ' (' . $stockProductCode . ')';
    } else {
        $stockInvAccId = $acc_id;
        $stockInvAccName = $acc_user_acc . ' (' . $userName . ')';
    }
    //
}
// ********************************************************************************************************************************************
// END CODE FOR STOCK & INVENTORY ACCOUNT ID & NAME @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
// 
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO GET DETAILS OF GOLD/SILVER PURCHASE ACCOUNT TO ADD PURCHASE GOLD/SILVER ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if (($puchaseGoldAccId != NULL && $puchaseGoldAccId != '') || $transApiType == 'update') {

    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$puchaseGoldAccId' and acc_firm_id = '$firmId'"));

    $puchaseGdAccId = $acc_id;
    $puchaseGdName = $acc_user_acc . ' (' . $userName . ')';
}
//
if (($puchaseSilverAccId != NULL && $puchaseSilverAccId != '') || $transApiType == 'update') {

    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$puchaseSilverAccId' and acc_firm_id = '$firmId'"));

    $puchaseSlAccId = $acc_id;
    $puchaseSlName = $acc_user_acc . ' (' . $userName . ')';
}
// START CODE TO ADD CONDITION FOR PURCHASE STONE ACCOUNT DETAILS @AUTHER:MADHUREE-07 AUGUTS2021
if (($puchaseStoneAccId != NULL && $puchaseStoneAccId != '') || $transApiType == 'update') {

    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$puchaseStoneAccId' and acc_firm_id = '$firmId'"));

    $puchaseStAccId = $acc_id;
    $puchaseStName = $acc_user_acc . ' (' . $userName . ')';
}
// END CODE TO ADD CONDITION FOR PURCHASE STONE ACCOUNT DETAILS @AUTHER:MADHUREE-07 AUGUTS2021
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO GET DETAILS OF GOLD/SILVER PURCHASE ACCOUNT TO ADD PURCHASE GOLD/SILVER ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO GET DETAILS OF GOLD/SILVER SALES ACCOUNT TO ADD SALE GOLD/SILVER ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if (($saleGoldAccId != NULL && $saleGoldAccId != '') || $transApiType == 'update') {

    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$saleGoldAccId' and acc_firm_id = '$firmId'"));

    $saleGdAccId = $acc_id;
    $saleGdName = $acc_user_acc . ' (' . $userName . ')';
}
//
if (($saleSilverAccId != NULL && $saleSilverAccId != '') || $transApiType == 'update') {

    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$saleSilverAccId' and acc_firm_id = '$firmId'"));

    $saleSlAccId = $acc_id;
    $saleSlName = $acc_user_acc . ' (' . $userName . ')';
}
//
if (($saleStoneAccId != NULL && $saleStoneAccId != '') || $transApiType == 'update') {

    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$saleStoneAccId' and acc_firm_id = '$firmId'"));

    $saleStAccId = $acc_id;
    $saleStName = $acc_user_acc . ' (' . $userName . ')';
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO GET DETAILS OF GOLD/SILVER SALES ACCOUNT TO ADD SALE GOLD/SILVER ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
if ($payCashAccId != NULL && $payCashAccId != '' && ($payCashAmt > 0 || $transApiType == 'update')) {
    // 
    // Cash in Hand Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCashAccId' and acc_firm_id = '$firmId'"));
    //
    if ($stockProductCode != NULL && $stockProductCode != '') {
        $cashAccId = $acc_id;
        $cashAccName = $acc_user_acc . ' (' . $stockProductCode . ')';
    } else {
        $cashAccId = $acc_id;
        $cashAccName = $acc_user_acc . ' (' . $userName . ')';
    }
    //
}
//If Paid To Customer => Cash In Hand Account Id @Author:Vinod:19-07-2023
if ($amountPaidReceiveOption == 'amountPaid' && ($panelName == 'SlPrPayment' || $panelName == 'SellPayUp') && ($payCashAccId != NULL && $payCashAccId != '' && ($payCashAmt < 0))) {
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCashAccId' and acc_firm_id = '$firmId'"));
    //
    if ($stockProductCode != NULL && $stockProductCode != '') {
        $cashAccId = $acc_id;
        $cashAccName = $acc_user_acc . ' (' . $stockProductCode . ')';
    } else {
        $cashAccId = $acc_id;
        $cashAccName = $acc_user_acc . ' (' . $userName . ')';
    }
}
//
//
//
if ($payChequeAccId != NULL && $payChequeAccId != '' && ($payChequeAmt > 0 || $transApiType == 'update')) {
    // 
    // Bank Cheque NEFT IMPS Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payChequeAccId' and acc_firm_id = '$firmId'"));
    //
    $bankAccId = $acc_id;
    $bankAccName = $acc_user_acc . ' (' . $userName . ')';
    //
    //
}

if ($amountPaidReceiveOption == 'amountPaid' && ($panelName == 'SlPrPayment' || $panelName == 'SellPayUp') && ($payChequeAccId != NULL && $payChequeAccId != '' && ($payChequeAmt < 0))) {
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payChequeAccId' and acc_firm_id = '$firmId'"));
    //
    $bankAccId = $acc_id;
    $bankAccName = $acc_user_acc . ' (' . $userName . ')';
}
//
//
if ($payCardAccId != NULL && $payCardAccId != '' && ($payCardAmt > 0 || $transApiType == 'update')) {
    // 
    // Card Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCardAccId' and acc_firm_id = '$firmId'"));
    //
    $cardAccId = $acc_id;
    $cardAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}

if ($amountPaidReceiveOption == 'amountPaid' && ($panelName == 'SlPrPayment' || $panelName == 'SellPayUp') && ($payCardAccId != NULL && $payCardAccId != '' && ($payCardAmt < 0))) {
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCardAccId' and acc_firm_id = '$firmId'"));
    //
    $cardAccId = $acc_id;
    $cardAccName = $acc_user_acc . ' (' . $userName . ')';
}
//
//
if ($payOnlinePayAccId != NULL && $payOnlinePayAccId != '' && ($payOnlinePayAmt > 0 || $transApiType == 'update')) {
    // 
    // Online Payment Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payOnlinePayAccId' and acc_firm_id = '$firmId'"));
    //
    $onlinePayAccId = $acc_id;
    $onlinePayAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}


if ($amountPaidReceiveOption == 'amountPaid' && ($panelName == 'SlPrPayment' || $panelName == 'SellPayUp') && ($payOnlinePayAccId != NULL && $payOnlinePayAccId != '' && ($payOnlinePayAmt < 0))) {
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payOnlinePayAccId' and acc_firm_id = '$firmId'"));
    //
    $onlinePayAccId = $acc_id;
    $onlinePayAccName = $acc_user_acc . ' (' . $userName . ')';
}
//
//
// ADDED REDEEM CONDITION FOR LOYALTY POINTS @PRIYANKA-17APR18
//
//echo '$payDiscountAccId : ' . $payDiscountAccId . '<br>';
//echo '$payDiscountAmt : ' . $payDiscountAmt . '<br>';
//
if (($payDiscountAccId != NULL && $payDiscountAccId != '') &&
        ($payDiscountAmt > 0 || $transApiType == 'update' || $lpRedeem > 0)) {
    // 
    // Discount Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payDiscountAccId' and acc_firm_id = '$firmId'"));
    //
    $discountAccId = $acc_id;
    $discountAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
//
//
//
// ======================================================================================================= //
// START CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
// ======================================================================================================= //
//
if (($payCourierAccId != NULL && $payCourierAccId != '') && ($payCourierAmt > 0 || $transApiType == 'update')) {
    // Discount Account Id
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCourierAccId' and acc_firm_id = '$firmId'"));
    //
    $courierAccId = $acc_id;
    $courierAccName = $acc_user_acc . ' (' . $userName . ')';
}
//
// ===================================================================================================== //
// END CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
// ===================================================================================================== //
//
// ======================================================================================================= //
// START CODE TO SET Other Charge JOURNAL ENTRY @AUTHOR:Vinod-26may2023 //
// ======================================================================================================= //
//
if (($payOtherAccId != NULL && $payOtherAccId != '') && ($payOtherAmt > 0 || $transApiType == 'update')) {
    // Discount Account Id
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payOtherAccId' and acc_firm_id = '$firmId'"));
    //
    $otherAccId = $acc_id;
    $otherAccName = $acc_user_acc . ' (' . $userName . ')';
}
//
// ===================================================================================================== //
// END CODE TO SET Other Charge JOURNAL ENTRY @AUTHOR:Vinod-26may2023 //
// ===================================================================================================== //
//
// ===================================================================================================================== //
// START CODE TO SET ADDITIONAL CHARGES ACCOUNT & AMOUNT FOR ADDITIONAL CHARGES JOURNAL ENTRY @AUTHOR:MADHUREE-19MAY2021 //
// ===================================================================================================================== //
//
if (($payAddtionalChargesAccId != NULL && $payAddtionalChargesAccId != '') && ($payAdditionalChargsAmt > 0 || $transApiType == 'update')) {
    // Additional Chrages Account Id
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payAddtionalChargesAccId' and acc_firm_id = '$firmId'"));
    //
    $addtionalChargesAccId = $acc_id;
    $addtionalChargesAccName = $acc_user_acc . ' (' . $userName . ')';
}
//
// =================================================================================================================== //
// END CODE TO SET ADDITIONAL CHARGES ACCOUNT & AMOUNT FOR ADDITIONAL CHARGES JOURNAL ENTRY @AUTHOR:MADHUREE-19MAY2021 //
// =================================================================================================================== //
//
//
//
if ($payCGSTAccId != NULL && $payCGSTAccId != '' && ($payCGSTaxAmt > 0 || $transApiType == 'update')) {
// CGST Account Id
//
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCGSTAccId' and acc_firm_id = '$firmId'"));
//
    $CGSTAccId = $acc_id;
    $CGSTAccName = $acc_user_acc . ' (' . $userName . ')';
//
}
//
//
if ($paySGSTAccId != NULL && $paySGSTAccId != '' && ($paySGSTaxAmt > 0 || $transApiType == 'update')) {
// SGST Account Id
//
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$paySGSTAccId' and acc_firm_id = '$firmId'"));
//
    $SGSTAccId = $acc_id;
    $SGSTAccName = $acc_user_acc . ' (' . $userName . ')';
//
}
//
//
if ($payIGSTAccId != NULL && $payIGSTAccId != '' && ($payIGSTaxAmt > 0 || $transApiType == 'update')) {
// IGST Account Id
//
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payIGSTAccId' and acc_firm_id = '$firmId'"));
//
    $IGSTAccId = $acc_id;
    $IGSTAccName = $acc_user_acc . ' (' . $userName . ')';
//
}
//
//
//
// ****************************************************************************
// START CODE FOR TAX (VAT) Account Id and Name @PRIYANKA-15MAR2021
// ****************************************************************************
if ($payTaxAccId != NULL && $payTaxAccId != '' && ($payTaxAmt > 0 || $transApiType == 'update')) {
    // 
    // TAX (VAT) Account Id
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                    . "and acc_id = '$payTaxAccId' and acc_firm_id = '$firmId'"));
    //
    $TaxVatAccId = $acc_id;
    $TaxVatAccUsrName = $acc_user_acc;
    $TaxVatAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
// ****************************************************************************
// END CODE FOR TAX (VAT) Account Id and Name @PRIYANKA-15MAR2021
// ****************************************************************************
//
//
//
//echo '$CGSTAccId == ' . $CGSTAccId . '<br />'; 
//echo '$CGSTAccName == ' . $CGSTAccName . '<br />'; 
//echo '$jrtrCGSTCrDesc == ' . $jrtrCGSTCrDesc . '<br />'; 
//echo '$jrtrCGSTDrDesc == ' . $jrtrCGSTDrDesc . '<br />'; 
//echo '$SGSTAccId == ' . $SGSTAccId . '<br />'; 
//echo '$SGSTAccName == ' . $SGSTAccName . '<br />';
//echo '$jrtrSGSTCrDesc == ' . $jrtrSGSTCrDesc . '<br />'; 
//echo '$jrtrSGSTDrDesc == ' . $jrtrSGSTDrDesc . '<br />'; 
//
//
// ****************************************************************************************************
// Start Code for Transactions Charges Account Id @PRIYANKA-08AUG2019
// ****************************************************************************************************
if ($payCardTransChgsAmtAccId != NULL && $payCardTransChgsAmtAccId != '' &&
        ($payCardTransChgsAmt > 0 || $transApiType == 'update')) {
    // 
    // Transactions Charges Account Id @PRIYANKA-08AUG2019
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$payCardTransChgsAmtAccId' and acc_firm_id = '$firmId'"));
    //
    $CardTransChgsAmtAccId = $acc_id;
    $CardTransChgsAmtAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
// ****************************************************************************************************
// End Code for Transactions Charges Account Id @PRIYANKA-08AUG2019
// ****************************************************************************************************
//
//
if ($payTotalAmtBal != 0) {
    // 
    // Unsecured Loans Account Id
    //
    parse_str(getTableValues("SELECT acc_user_acc FROM accounts "
                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                    . "and acc_id='$user_acc_id' and acc_firm_id = '$firmId'"));
    //
    $totalAmtBalAccId = $user_acc_id;
    $totalAmtBalAccName = $acc_user_acc . ' (' . $userName . ')';

    //
}
//
//
//echo '$totalAmtBalAccId == '.$totalAmtBalAccId.'<br/>'; 
//echo '$totalAmtBalAccName == '.$totalAmtBalAccName.'<br/>'; 
//
//
//if ($payTotalAmtBal < 0) {
// Advance Money Account Id
//
//    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
//                    . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
//                    . "and acc_user_acc='Advance Money' and acc_firm_id = '$firmId'"));
////
//    $totalAmtBalAccId = $acc_id;
//    $totalAmtBalAccName = $acc_user_acc . ' (' . $userName . ')';
//
//}
//
//
//
//
// ********************************************************************************************** 
// START CODE FOR HALLMARKING CHARGES ACC ID @PRIYANKA-28MAY2022
// **********************************************************************************************
if ($payTotHallmarkChgs > 0 || $transApiType == 'update') {
    //
    // HALLMARKING CHARGES ACC ID @PRIYANKA-27MAY2022
    //
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                    . "and acc_user_acc = 'Hallmarking Chrg' and acc_firm_id = '$firmId'"));
    //
    $hallmarkChrgsAccId = $acc_id;
    $hallmarkChrgsAccName = $acc_user_acc . ' (' . $userName . ')';
    //
}
// ********************************************************************************************** 
// END CODE FOR HALLMARKING CHARGES ACC ID @PRIYANKA-28MAY2022
// **********************************************************************************************
//
//
//
// ADDED CODE FOR ESTIMATESELL TRANS TYPE
if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
    //
    //
    // ********************************************************************************************** 
    // START CODE FOR LABOUR CHARGES ACC ID @PRIYANKA-15-DEC-17
    // ********************************************************************************************** 
    if ($payTotOthChgs > 0 || $transApiType == 'update') {
        //
        //
        parse_str(getTableValues("SELECT acc_id as mkgChrgsNewAccId, acc_user_acc as mkgChrgsNewAccName FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Making Charges' and acc_firm_id = '$firmId'"));
        //
        //
        $mkgChrgsAccId = $mkgChrgsNewAccId;
        $mkgChrgsAccName = $mkgChrgsNewAccName . ' (' . $userName . ')';
        //
        //
    }
    // ********************************************************************************************** 
    // END CODE FOR LABOUR CHARGES ACC ID @PRIYANKA-15-DEC-17
    // **********************************************************************************************  
    //
    //
    // 
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
    // START CODE TO ADD CONDITION MAKING CHARGES ACCOUNT ID FOR SELL-RETURN ENTRY @MADHUREE-03APRIL2020 //
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
} else if ($transactionType == 'ItemReturn') {
    //
    //
    if ($payTotOthChgs > 0 || $transApiType == 'update') {
        //
        //
        parse_str(getTableValues("SELECT acc_id as mkgChrgsNewAccId, acc_user_acc as mkgChrgsNewAccName FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Making Charges' and acc_firm_id = '$firmId'"));
        //
        //
        $mkgChrgsAccId = $mkgChrgsNewAccId;
        $mkgChrgsAccName = $mkgChrgsNewAccName . ' (' . $userName . ')';
        //
        //
    }
    //
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
    // END CODE TO ADD CONDITION MAKING CHARGES ACCOUNT ID FOR SELL-RETURN ENTRY @MADHUREE-03APRIL2020 //
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
    //
    //
    //
} else {
    //
    //
    //echo '<br/>$payTotOthChgs:' . $payTotOthChgs.'<br/>'; 
    //
    //
    // START CODE FOR MAKING CHARGES ACC ID @PRIYANKA-14-DEC-17
    //
    if ($payTotOthChgs > 0 || $transApiType == 'update') {
        //
        // Changed code for Labour Charges Account @PRIYANKA-12-AUG-22
        parse_str(getTableValues("SELECT acc_id as labAccountId, acc_user_acc as labUserAcc FROM accounts "
                        . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                        . "and acc_user_acc = 'Labour Charges' and acc_firm_id = '$firmId'"));
        //
        //
        $mkgChrgsAccId = $labAccountId;
        $mkgChrgsAccName = $labUserAcc . ' (' . $userName . ')';
        //
        //        
    }
    //
    //
    //echo '<br/>$mkgChrgsAccId:' . $mkgChrgsAccId.'<br/>'; 
    //echo '<br/>$mkgChrgsAccName:' . $mkgChrgsAccName.'<br/>'; 
    //
    //
    // END CODE FOR MAKING CHARGES ACC ID @PRIYANKA-14-DEC-17
    //
}
//
// *****************************************************************************
// Start Code for each transaction type
// *****************************************************************************
// 
// *****************************************************************************
// sell transaction journal entry file
// *****************************************************************************
if ($amountPaidReceiveOption == 'amountPaid' && ($panelName == 'SlPrPayment' || $panelName == 'SellPayUp')) {
    //Sell Time Paid To Customer @Author:Vinod:21-07-2023
    include 'ompaidcustusrtranjrnlsell.php';
} else {
    include 'omusrtranjrnlsell.php';
}
//
//
// *****************************************************************************
// Money panel transaction journal entry file @RATNAKAR 18FEB2018
// *****************************************************************************
//
include 'omusrtranjrnlmoney.php';
//
//
//*****************************************************************************
// Purchase transaction journal entry file @PRIYANKA-18-09-17
// *****************************************************************************
//
//echo '<br/>$jrnlTransAccId : ' . $jrnlTransAccId.'<br/>'; 
//
//echo '<br/>$jrnlTransDesc 1 : ' . $jrnlTransDesc.'<br/>'; 
//echo '<br />$jrnlTransDrDesc 1 == '.$jrnlTransDrDesc.'<br />';
//
if ($amountPaidReceiveOption == 'amountReceived' && ($panelName == 'SlPrPayment' || $panelName == 'SellPayUp' || $panelName == 'StockPayment')) {
    include 'omusrtranjrnlmoneypur.php';
} else {
    include 'omusrtranjrnlpurchase.php';
}
//
//echo '<br/>$jrnlTransDesc 2 : ' . $jrnlTransDesc.'<br/>'; 
//echo '<br />$jrnlTransDrDesc 2 == '.$jrnlTransDrDesc.'<br />';
//
include 'omusrtranjrnlgsttransaction.php';
//
//
// *****************************************************************************
// End Code for each transaction type
// *****************************************************************************
// 
////*****************************************************************************
// Scheme transaction journal entry file @BAJRANG-20-08-18
// *****************************************************************************
include 'omusrtranjrnlscheme.php';
//
//
// *****************************************************************************
// End Code for each transaction type
// *****************************************************************************
//
//echo '<br/>$jrnlDate:' . $jrnlDate.'<br/>'; 
//echo '<br/>$jrnlDrAmount:' . $jrnlDrAmount.'<br/>'; 
//echo '<br/>$jrnlCrAmount:' . $jrnlCrAmount.'<br/>'; 
//
//
//echo '<br />$jrnlTransDrDesc 3 == '.$jrnlTransDrDesc.'<br />';
//
if ($stockAccountEntry != 'No') { // Stock Account Entry (CASH CASE) @PRIYANKA-01FEB19
    //
    $jrnlOwnId = $sessionOwnerId;
    $jrnlJId = '';
    $jrnlUserId = $userId; // Already we are getting from ommpfndv file
    $jrnlUserType = $userType;
    $jrnlTransId = $transId; // Used to navigate
    $jrnlTransType = $transType; //Where we hv to navigate
    $jrnlFirmId = $firmId;
    $jrnlTTDr = $jrnlDrAmount;
    $jrnlDrAccId = $jrnlTransDrAccId;
    $jrnlDrDesc = $jrnlTransDrDesc;
    $jrnlTTCr = $jrnlCrAmount;
    $jrnlCrAccId = $jrnlTransCrAccId;
    $jrnlCrDesc = $jrnlTransCrDesc;
    $jrnlDesc = $jrnlTransDesc;
    $jrnlOthInfo = '';
    $jrnlDOB = $jrnlDate;
    //
    $apiType = $transApiType;
    include 'ommpjrnl.php';
    //
}
//
//
// Start Code to Get Last Journal Id
if ($transApiType == 'insert') {
    $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$sessionOwnerId' "
            . "order by jrnl_id desc LIMIT 0,1";
    $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
    $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
    $jrnlId = $rowJournalEntry['jrnl_id'];
}
//
// End Code to Get Last Journal Id
// 
// 
//echo 'sessionProdName == ' . $_SESSION['sessionProdName'] . '<br />'; 
//echo '$transactionType == ' . $transactionType . '<br />'; 
// 
//echo '$jrtrTransDesc == '.$jrtrTransDesc.'<br />';
//
//echo '<br />$transactionType == ' . $transactionType . '<br />';
//echo '<br />$jrtrMainCrAmount == ' . $jrtrMainCrAmount . '<br />';
//echo '<br />$jrtrMainDrAmount == ' . $jrtrMainDrAmount . '<br />';
//
// First Entry in Main transaction account like Sale or Udhaar or Purchase
// $jrnlTransCrAccId
$purchaseEntryIndicator = NULL;
//
if ($transactionType == "PURBYSUPP" && $sttr_indicator == 'stock') {
    $purchaseEntryIndicator = 'NO';
}
//
//echo '$purchaseEntryIndicator == ' . $purchaseEntryIndicator . '<br />';
//
if (($transactionType != "TransPayment" && $transactionType != "ItemReturn") && ($purchaseEntryIndicator != 'NO' || $_SESSION['sessionProdName'] == 'OMRETL')) {
    if (($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
            ($jrtrMainDrAmount == 0 && $jrtrTransCrAccId != '' && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) {
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $userId;
        $jrtrUserType = $userType;
        $jrtrTransId = $transId;
        $jrtrTransType = $transType;
        $jrtrFirmId = $firmId;

        $jrtrTransCRDR = $jrtrMainTransCRDR;
        $jrtrDrAmt = $jrtrMainDrAmount;
        $jrtrDrAccId = $jrtrTransDrAccId;
        $jrtrDrDesc = $jrtrTransDrDesc;
//        echo '$transactionType==>'.$transactionType.'<br>';
        if ($transactionType == "UDHAAR DEPOSIT") {
            $jrtrCrAmt = $jrtrMainCrAmount - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt;
        } else {
            $jrtrCrAmt = $jrtrMainCrAmount;
        }
        $jrtrCrAccId = $jrtrTransCrAccId;
        $jrtrCrDesc = $jrtrTransCrDesc;
        $jrtrDesc = $jrtrTransDesc;
        $jrtrOthInfo = '';
        $jrtrDOB = $jrnlDate;
        $custFirstName = '';
        $custLastName = '';

        $apiType = $transApiType;
        include 'ommpjrtr.php';
    }
}

//echo '$jrtrGoldSilverStockInvDesc == ' . $jrtrGoldSilverStockInvDesc . '<br />';
// ********************************************************************************************************************************************
// START CODE FOR GOLD/SILVER/STOCK&INVENTORY ACCOUNT ENTRY @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
if ((($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) &&
        ($jrtrGoldSilverStockInvDesc != '' && $jrtrGoldSilverStockInvDesc != NULL)) {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrGoldSilverStockInvCRDR;
    $jrtrDrAmt = $jrtrGoldSilverStockInvDrAmount;
    $jrtrDrAccId = $jrtrGoldSilverStockInvDrAccId;
    $jrtrDrDesc = $jrtrGoldSilverStockInvDrDesc;
    $jrtrCrAmt = $jrtrGoldSilverStockInvCrAmount;
    $jrtrCrAccId = $jrtrGoldSilverStockInvCrAccId;
    $jrtrCrDesc = $jrtrGoldSilverStockInvCrDesc;
    $jrtrDesc = $jrtrGoldSilverStockInvDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// ********************************************************************************************************************************************
// START CODE FOR GOLD/SILVER/STOCK&INVENTORY ACCOUNT ENTRY @PRIYANKA-06JUNE18
// ********************************************************************************************************************************************
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO GET DETAILS & INSERT ENTRY IN STONE STOCK ACCOUNT @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ((($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) &&
        ($jrtrStoneStockInvDesc != '' && $jrtrStoneStockInvDesc != NULL)) {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrStoneStockInvCRDR;
    $jrtrDrAmt = $jrtrStoneStockInvDrAmount;
    $jrtrDrAccId = $jrtrStoneStockInvDrAccId;
    $jrtrDrDesc = $jrtrStoneStockInvDrDesc;
    $jrtrCrAmt = $jrtrStoneStockInvCrAmount;
    $jrtrCrAccId = $jrtrStoneStockInvCrAccId;
    $jrtrCrDesc = $jrtrStoneStockInvCrDesc;
    $jrtrDesc = $jrtrStoneStockInvDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO GET DETAILS & INSERT ENTRY IN STONE STOCK ACCOUNT @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD ENTRY IN GOLD/SILVER PURCHASE ACCOUNT ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ((($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) &&
        ($jrtrGoldSilverPurchaseDesc != '' && $jrtrGoldSilverPurchaseDesc != NULL)) {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrGoldSilverPurchaseCRDR;
    $jrtrDrAmt = $jrtrGoldSilverPurchaseDrAmount;
    $jrtrDrAccId = $jrtrGoldSilverPurchaseDrAccId;
    $jrtrDrDesc = $jrtrGoldSilverPurchaseDrDesc;
    $jrtrCrAmt = $jrtrGoldSilverPurchaseCrAmount;
    $jrtrCrAccId = $jrtrGoldSilverPurchaseCrAccId;
    $jrtrCrDesc = $jrtrGoldSilverPurchaseCrDesc;
    $jrtrDesc = $jrtrGoldSilverPurchaseDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD ENTRY IN GOLD/SILVER PURCHASE ACCOUNT ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO GET DETAILS & INSERT ENTRY IN STONE PURCHASE ACCOUNT @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ((($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) &&
        ($jrtrStonePurchaseDesc != '' && $jrtrStonePurchaseDesc != NULL)) {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrStonePurchaseCRDR;
    $jrtrDrAmt = $jrtrStonePurchaseDrAmount;
    $jrtrDrAccId = $jrtrStonePurchaseDrAccId;
    $jrtrDrDesc = $jrtrStonePurchaseDrDesc;
    $jrtrCrAmt = $jrtrStonePurchaseCrAmount;
    $jrtrCrAccId = $jrtrStonePurchaseCrAccId;
    $jrtrCrDesc = $jrtrStonePurchaseCrDesc;
    $jrtrDesc = $jrtrStonePurchaseDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO GET DETAILS & INSERT ENTRY IN STONE PURCHASE ACCOUNT @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD DETAILS IN GOLD/SILVER SALES ACCOUNT ENTRY @AUTHOR:MADHUREE-08OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ((($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) &&
        ($jrtrGoldSilverSaleDesc != '' && $jrtrGoldSilverSaleDesc != NULL)) {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrGoldSilverSaleCRDR;
    $jrtrDrAmt = $jrtrGoldSilverSaleDrAmount;
    $jrtrDrAccId = $jrtrGoldSilverSaleDrAccId;
    $jrtrDrDesc = $jrtrGoldSilverSaleDrDesc;
    $jrtrCrAmt = $jrtrGoldSilverSaleCrAmount;
    $jrtrCrAccId = $jrtrGoldSilverSaleCrAccId;
    $jrtrCrDesc = $jrtrGoldSilverSaleCrDesc;
    $jrtrDesc = $jrtrGoldSilverSaleDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD DETAILS IN GOLD/SILVER SALES ACCOUNT ENTRY @AUTHOR:MADHUREE-08OCT2020  //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO GET DETAILS & INSERT ENTRY IN STONE SALES ACCOUNT @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ((($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) &&
        ($jrtrStoneSaleDesc != '' && $jrtrStoneSaleDesc != NULL)) {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    $jrtrTransCRDR = $jrtrStoneSaleCRDR;
    $jrtrDrAmt = $jrtrStoneSaleDrAmount;
    $jrtrDrAccId = $jrtrStoneSaleDrAccId;
    $jrtrDrDesc = $jrtrStoneSaleDrDesc;
    $jrtrCrAmt = $jrtrStoneSaleCrAmount;
    $jrtrCrAccId = $jrtrStoneSaleCrAccId;
    $jrtrCrDesc = $jrtrStoneSaleCrDesc;
    $jrtrDesc = $jrtrStoneSaleDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO GET DETAILS & INSERT ENTRY IN STONE SALES ACCOUNT @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD DETAILS IN SETTLED ADVANCE & SCHEME ACCOUNT ENTRY @AUTHOR:MADHUREE-28OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ($paySettledAmt != '' && $paySettledDesc != '' && $paySettledAmt > 0 && $paySettledCRDR != '') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrSettledEntryCRDR;
    $jrtrDrAmt = $jrtrSettledEntryDrAmount;
    $jrtrDrAccId = $jrtrSettledEntryDrAccId;
    $jrtrDrDesc = $jrtrSettledEntryDrDesc;
    $jrtrCrAmt = $jrtrSettledEntryCrAmount;
    $jrtrCrAccId = $jrtrSettledEntryCrAccId;
    $jrtrCrDesc = $jrtrSettledEntryCrDesc;
    $jrtrDesc = $jrtrSettledEntryDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD DETAILS IN SETTLED ADVANCE & SCHEME ACCOUNT ENTRY @AUTHOR:MADHUREE-28OCT2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// CGST Account Entry for JRTR Table
//
if ($payCGSTaxAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrCGSTCRDR;
    $jrtrDrAmt = $jrtrCGSTDrAmount;
    $jrtrDrAccId = $jrtrCGSTDrAccId;
    $jrtrDrDesc = $jrtrCGSTDrDesc;
    $jrtrCrAmt = $jrtrCGSTCrAmount;
    $jrtrCrAccId = $jrtrCGSTCrAccId;
    $jrtrCrDesc = $jrtrCGSTCrDesc;
    $jrtrDesc = $jrtrCGSTDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
if ($payMkgCGSTAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrCGSTCRDR;
    $jrtrDrAmt = $jrtrMkgCGSTDrAmount;
    $jrtrDrAccId = $jrtrMkgCGSTDrAccId;
    $jrtrDrDesc = $jrtrMkgCGSTDrDesc;
    $jrtrCrAmt = $jrtrMkgCGSTCrAmount;
    $jrtrCrAccId = $jrtrMkgCGSTCrAccId;
    $jrtrCrDesc = $jrtrMkgCGSTCrDesc;
    $jrtrDesc = $jrtrMkgCGSTDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// SGST Account Entry for JRTR Table
//
if ($paySGSTaxAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrSGSTCRDR;
    $jrtrDrAmt = $jrtrSGSTDrAmount;
    $jrtrDrAccId = $jrtrSGSTDrAccId;
    $jrtrDrDesc = $jrtrSGSTDrDesc;
    $jrtrCrAmt = $jrtrSGSTCrAmount;
    $jrtrCrAccId = $jrtrSGSTCrAccId;
    $jrtrCrDesc = $jrtrSGSTCrDesc;
    $jrtrDesc = $jrtrSGSTDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
if ($payMkgSGSTAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrSGSTCRDR;
    $jrtrDrAmt = $jrtrMkgSGSTDrAmount;
    $jrtrDrAccId = $jrtrMkgSGSTDrAccId;
    $jrtrDrDesc = $jrtrMkgSGSTDrDesc;
    $jrtrCrAmt = $jrtrMkgSGSTCrAmount;
    $jrtrCrAccId = $jrtrMkgSGSTCrAccId;
    $jrtrCrDesc = $jrtrMkgSGSTCrDesc;
    $jrtrDesc = $jrtrMkgSGSTDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// IGST Account Entry for JRTR Table
//
if ($payIGSTaxAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrIGSTCRDR;
    $jrtrDrAmt = $jrtrIGSTDrAmount;
    $jrtrDrAccId = $jrtrIGSTDrAccId;
    $jrtrDrDesc = $jrtrIGSTDrDesc;
    $jrtrCrAmt = $jrtrIGSTCrAmount;
    $jrtrCrAccId = $jrtrIGSTCrAccId;
    $jrtrCrDesc = $jrtrIGSTCrDesc;
    $jrtrDesc = $jrtrIGSTDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
if ($payMkgIGSTAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrIGSTCRDR;
    $jrtrDrAmt = $jrtrMkgIGSTDrAmount;
    $jrtrDrAccId = $jrtrIGSTDrAccId;
    $jrtrDrDesc = $jrtrIGSTDrDesc;
    $jrtrCrAmt = $jrtrMkgIGSTCrAmount;
    $jrtrCrAccId = $jrtrMkgIGSTCrAccId;
    $jrtrCrDesc = $jrtrMkgIGSTCrDesc;
    $jrtrDesc = $jrtrMkgIGSTDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// ****************************************************************************
// START CODE FOR TAX (VAT) Account Entry for JRTR Table @PRIYANKA-15MAR2021
// ****************************************************************************
if ($payTaxAmt > 0 || $transApiType == 'update') {
    //
    if ($_REQUEST['utin_transaction_type'] == 'PURBYSUPP' && $_REQUEST['utin_type'] == 'stock' && $TaxVatAccUsrName == 'TDS') {
        $jrtrJId = '';//
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $userId;
        $jrtrUserType = $userType;
        $jrtrTransId = $transId;
        $jrtrTransType = $transType;
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = 0;
        $jrtrDrAccId = '';
        $jrtrDrDesc = '';
        $jrtrCrAmt = $payTaxAmt;
        $jrtrCrAccId = $TaxVatAccId;
        $jrtrCrDesc = $TaxVatAccName;
        $jrtrDesc = $jrtrTaxVatDesc;
        $jrtrOthInfo = '';
        $jrtrDOB = $jrnlDate;
        $apiType = $transApiType;
        $jrtrTaxVatDrAmount = $payTaxAmt;
    } else {
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $userId;
        $jrtrUserType = $userType;
        $jrtrTransId = $transId;
        $jrtrTransType = $transType;
        $jrtrFirmId = $firmId;
        //
        $jrtrTransCRDR = $jrtrTaxVatCRDR;
        $jrtrDrAmt = $jrtrTaxVatDrAmount;
        $jrtrDrAccId = $jrtrTaxVatDrAccId;
        $jrtrDrDesc = $jrtrTaxVatDrDesc;
        $jrtrCrAmt = $jrtrTaxVatCrAmount;
        $jrtrCrAccId = $jrtrTaxVatCrAccId;
        $jrtrCrDesc = $jrtrTaxVatCrDesc;
        $jrtrDesc = $jrtrTaxVatDesc;
        $jrtrOthInfo = '';
        $jrtrDOB = $jrnlDate;
        //
        $apiType = $transApiType;
    }
    //
    include 'ommpjrtr.php';
    //
}
// ****************************************************************************
// END CODE FOR TAX (VAT) Account Entry for JRTR Table @PRIYANKA-15MAR2021
// ****************************************************************************
//
//
//
// Cash In Hand Account Entry for JRTR Table
//
if ($payCashAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrCashCRDR;
    $jrtrDrAmt = $jrtrCashDrAmount;
    $jrtrDrAccId = $jrtrCashDrAccId;
    $jrtrDrDesc = $jrtrCashDrDesc;
    //
    $jrtrCrAmt = $jrtrCashCrAmount;
    $jrtrCrAccId = $jrtrCashCrAccId;
    $jrtrCrDesc = $jrtrCashCrDesc;
    $jrtrDesc = $jrtrCashDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
//     echo '$queryJTrans == ' . $queryJTrans . '<br />';
}
//
//
// Bank Account Entry for JRTR Table
//
if ($payChequeAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrBankCRDR;
    $jrtrDrAmt = $jrtrBankDrAmount;
    $jrtrDrAccId = $jrtrBankDrAccId;
    $jrtrDrDesc = $jrtrBankDrDesc;
    $jrtrCrAmt = $jrtrBankCrAmount;
    $jrtrCrAccId = $jrtrBankCrAccId;
    $jrtrCrDesc = $jrtrBankCrDesc;
    $jrtrDesc = $jrtrBankDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
//
//
// Card Account Entry for JRTR Table
//
if ($payCardAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrCardCRDR;
    $jrtrDrAmt = $jrtrCardDrAmount;
    $jrtrDrAccId = $jrtrCardDrAccId;
    $jrtrDrDesc = $jrtrCardDrDesc;
    $jrtrCrAmt = $jrtrCardCrAmount;
    $jrtrCrAccId = $jrtrCardCrAccId;
    $jrtrCrDesc = $jrtrCardCrDesc;
    $jrtrDesc = $jrtrCardDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// ****************************************************************************************************
// Start Code for Card Transactional Charges Account Entry for JRTR Table @PRIYANKA-08AUG2019
// ****************************************************************************************************
if ($stockAccountEntry != 'No') {
    if ($payCardTransChgsAmt > 0 || $transApiType == 'update') {
        //
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $userId;
        $jrtrUserType = $userType;
        $jrtrTransId = $transId;
        $jrtrTransType = $transType;
        $jrtrFirmId = $firmId;
        //
        $jrtrTransCRDR = $jrtrCardTransChargsCRDR;
        $jrtrDrAmt = $jrtrCardTransChargsDrAmount;
        $jrtrDrAccId = $jrtrCardTransChargsDrAccId;
        $jrtrDrDesc = $jrtrCardTransChargsDrDesc;
        //
        $jrtrCrAmt = $jrtrCardTransChargsCrAmount;
        $jrtrCrAccId = $jrtrCardTransChargsCrAccId;
        $jrtrCrDesc = $jrtrCardTransChargsCrDesc;
        //
        $jrtrDesc = $jrtrCardTransChargsDesc;
        //
        $jrtrOthInfo = '';
        $jrtrDOB = $jrnlDate;
        //
        $apiType = $transApiType;
        //
        include 'ommpjrtr.php';
        //
    }
}
// ****************************************************************************************************
// End Code for Card Transactional Charges Account Entry for JRTR Table @PRIYANKA-08AUG2019
// ****************************************************************************************************
// 
// Online Pay Account Entry for JRTR Table
//
if ($payOnlinePayAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrOnlinePayCRDR;
    $jrtrDrAmt = $jrtrOnlinePayDrAmount;
    $jrtrDrAccId = $jrtrOnlinePayDrAccId;
    $jrtrDrDesc = $jrtrOnlinePayDrDesc;
    $jrtrCrAmt = $jrtrOnlinePayCrAmount;
    $jrtrCrAccId = $jrtrOnlinePayCrAccId;
    $jrtrCrDesc = $jrtrOnlinePayCrDesc;
    $jrtrDesc = $jrtrOnlinePayDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
//
//
//
// **********************************************************************************************
// START CODE FOR MAKING CHARGES ACCOUNT ENTRY for JRTR Table @PRIYANKA-14-DEC-17
// **********************************************************************************************
if ($payTotOthChgs > 0 || $transApiType == 'update') {

    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;

    $jrtrTransCRDR = $jrtrMKGCRDR;
    $jrtrDrAmt = $jrtrMKGDrAmount;
    $jrtrDrAccId = $jrtrMKGDrAccId;
    $jrtrDrDesc = $jrtrMKGDrDesc;
    $jrtrCrAmt = $jrtrMKGCrAmount;
    $jrtrCrAccId = $jrtrMKGCrAccId;
    $jrtrCrDesc = $jrtrMKGCrDesc;
    $jrtrDesc = $jrtrMKGDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// **********************************************************************************************
// END CODE FOR MAKING CHARGES ACCOUNT ENTRY for JRTR Table @PRIYANKA-14-DEC-17
// **********************************************************************************************
//
//
//
//
// **********************************************************************************************
// START CODE FOR HALLMARKING CHARGES ACCOUNT ENTRY for JRTR Table @PRIYANKA-27MAY2022
// **********************************************************************************************
if ($payTotHallmarkChgs > 0 || $transApiType == 'update') {
    //
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrHallmarkCRDR;
    $jrtrDrAmt = intval(str_replace(',', '', $jrtrHallmarkDrAmount));
    $jrtrDrAccId = $jrtrHallmarkDrAccId;
    $jrtrDrDesc = $jrtrHallmarkDrDesc;
    $jrtrCrAmt = intval(str_replace(',', '', $jrtrHallmarkCrAmount));
    $jrtrCrAccId = $jrtrHallmarkCrAccId;
    $jrtrCrDesc = $jrtrHallmarkCrDesc;
    $jrtrDesc = $jrtrHallmarkDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    //
    $apiType = $transApiType;
    //
    include 'ommpjrtr.php';
    //
}
// **********************************************************************************************
// END CODE FOR HALLMARKING CHARGES ACCOUNT ENTRY for JRTR Table @PRIYANKA-27MAY2022
// **********************************************************************************************
//
//
//
//
// START FOR LOYALTY POINTS @PRIYANKA-17APR18
if ($lpRedeem > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrLpRedeemCRDR;
    $jrtrDrAmt = $jrtrLpRedeemDrAmount;
    $jrtrDrAccId = $jrtrDiscountDrAccId;
    $jrtrDrDesc = $jrtrLpRedeemDrDesc;
    $jrtrCrAmt = $jrtrLpRedeemCrAmount;
    $jrtrCrAccId = $jrtrDiscountCrAccId;
    $jrtrCrDesc = $jrtrLpRedeemCrDesc;
    $jrtrDesc = $jrtrLpRedeemDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
// END FOR LOYALTY POINTS @PRIYANKA-17APR18
// 
// Discount Amount - Account Entry for JRTR Table
if ($payDiscountAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrDiscountCRDR;
    $jrtrDrAmt = $jrtrDiscountDrAmount;
    $jrtrDrAccId = $jrtrDiscountDrAccId;
    $jrtrDrDesc = $jrtrDiscountDrDesc;
    $jrtrCrAmt = $jrtrDiscountCrAmount;
    $jrtrCrAccId = $jrtrDiscountCrAccId;
    $jrtrCrDesc = $jrtrDiscountCrDesc;
    $jrtrDesc = $jrtrDiscountDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// ======================================================================================================= //
// START CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
// ======================================================================================================= //
//
if ($payCourierAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrCourierChargsCRDR;
    $jrtrDrAmt = $jrtrCourierChargsDrAmount;
    $jrtrDrAccId = $jrtrCourierChargsDrAccId;
    $jrtrDrDesc = $jrtrCourierChargsDrDesc;
    $jrtrCrAmt = $jrtrCourierChargsCrAmount;
    $jrtrCrAccId = $jrtrCourierChargsCrAccId;
    $jrtrCrDesc = $jrtrDiscountCrDesc;
    $jrtrDesc = $jrtrCourierChargsCrDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// ===================================================================================================== //
// END CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
// ===================================================================================================== //
//
// ======================================================================================================= //
// START CODE TO SET OTHER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
// ======================================================================================================= //
//
if ($payOtherAmt > 0 || $transApiType == 'update') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrOtherChargsCRDR;
    $jrtrDrAmt = $jrtrOtherChargsDrAmount;
    $jrtrDrAccId = $jrtrOtherChargsDrAccId;
    $jrtrDrDesc = $jrtrOtherChargsDrDesc;
    $jrtrCrAmt = $jrtrOtherChargsCrAmount;
    $jrtrCrAccId = $jrtrOtherChargsCrAccId;
    $jrtrCrDesc = $jrtrDiscountCrDesc;
    $jrtrDesc = $jrtrOtherChargsCrDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// ===================================================================================================== //
// END CODE TO SET OTHER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
// ===================================================================================================== //
//
// ===================================================================================================================== //
// START CODE TO SET ADDITIONAL CHARGES ACCOUNT & AMOUNT FOR ADDITIONAL CHARGES JOURNAL ENTRY @AUTHOR:MADHUREE-19MAY2021 //
// ===================================================================================================================== //
//
$utin_transaction_type = $_REQUEST['utin_transaction_type'];
if (($payAdditionalChargsAmt > 0 || $transApiType == 'update') && $utin_transaction_type != 'DEPOSIT') {
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrCourierChargsCRDR;
    $jrtrDrAmt = $jrtrCourierChargsDrAmount;
    $jrtrDrAccId = $jrtrCourierChargsDrAccId;
    $jrtrDrDesc = $jrtrCourierChargsDrDesc;
    $jrtrCrAmt = $jrtrCourierChargsCrAmount;
    $jrtrCrAccId = $jrtrCourierChargsCrAccId;
    $jrtrCrDesc = $jrtrDiscountCrDesc;
    $jrtrDesc = $jrtrCourierChargsCrDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
// =================================================================================================================== //
// END CODE TO SET ADDITIONAL CHARGES ACCOUNT & AMOUNT FOR ADDITIONAL CHARGES JOURNAL ENTRY @AUTHOR:MADHUREE-19MAY2021 //
// =================================================================================================================== //
//
// ********************************************************************************************************************************************
// START CODE FOR INTEREST PAID/REC ACCOUNT ENTRY @PRIYANKA-08MAR19
// ********************************************************************************************************************************************
// Interest Paid/Rec. - Account Entry for JRTR Table
if ($payInterestAmt > 0 || $transApiType == 'update') {
    //
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrInterestCRDR;
    //
    $jrtrDrAmt = $jrtrInterestDrAmount;
    $jrtrDrAccId = $jrtrInterestDrAccId;
    $jrtrDrDesc = $jrtrInterestDrDesc;
    //
    $jrtrCrAmt = $jrtrInterestCrAmount;
    $jrtrCrAccId = $jrtrInterestCrAccId;
    $jrtrCrDesc = $jrtrInterestCrDesc;
    //
    $jrtrDesc = $jrtrInterestDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    //
    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//
//START CODE TO ADD JOUNAL TRANSACTION ENTRY FOR INTEREST ON UDHAAR OPTION,@AUTHOR:HEMA-27OCT2020
//START CODE TO GET UDHAAR INTEREST AMOUNT IF PAYMENT DONE BY PAYMENT PANEL,@AUTHOR:HEMA-28OCT2020
if ($payIntAmt == null || $payIntAmt == '') {
    $payIntAmt = $utin_udhaar_int_amt;
}
//END CODE TO GET UDHAAR INTEREST AMOUNT IF PAYMENT DONE BY PAYMENT PANEL,@AUTHOR:HEMA-28OCT2020
if ($payIntAmt > 0 || $transApiType == 'update') {
    //
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    $jrtrTransCRDR = $jrtrInterestCRDR;
    //
    $jrtrDrAmt = 0;
    $jrtrDrAccId = '';
    $jrtrDrDesc = $interestPaidAccName;
    //
    $jrtrCrAmt = $payIntAmt;
    $jrtrCrAccId = $interestPaidAccId;
    $jrtrCrDesc = $interestPaidAccName;
    //
    $jrtrDesc = $jrtrInterestDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    //
    $apiType = $transApiType;
    include 'ommpjrtr.php';
}
//START CODE TO ADD JOUNAL TRANSACTION ENTRY FOR INTEREST ON UDHAAR OPTION,@AUTHOR:HEMA-27OCT2020
//
// ********************************************************************************************************************************************
// START CODE FOR INTEREST PAID/REC ACCOUNT ENTRY @PRIYANKA-08MAR19
// ********************************************************************************************************************************************
// 
// Round Off Amt - Account Entry for JRTR Table
if (($payRoundOffAmt > 0 || $transApiType == 'update') && $roundOffFunction == 'YES') {
    $acc_id = NULL;
    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts "
                    . "WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                    . "and acc_user_acc = 'Round Off' and acc_firm_id = '$firmId'"));
    //
    $jrtrJId = '';
    $jrtrJrnlId = $jrnlId;
    $jrtrOwnId = $sessionOwnerId;
    $jrtrUserId = $userId;
    $jrtrUserType = $userType;
    $jrtrTransId = $transId;
    $jrtrTransType = $transType;
    $jrtrFirmId = $firmId;
    //
    if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
        if ($payRoundOffAmt >= 0.5) {
            $jrtrTransCRDR = 'CR';
            $jrtrDrAmt = 0;
            $jrtrDrAccId = $acc_id;
            $jrtrDrDesc = $acc_user_acc;

            $jrtrCrAmt = 1 - $payRoundOffAmt;
            $jrtrCrAccId = $acc_id;
            $jrtrCrDesc = $acc_user_acc . ' (' . $userName . ')';
            $jrtrDesc = 'Round Off Amount CR';
        } else {
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = $payRoundOffAmt;
            $jrtrDrAccId = $acc_id;
            $jrtrDrDesc = $acc_user_acc . ' (' . $userName . ')';

            $jrtrCrAmt = 0;
            $jrtrCrAccId = $acc_id;
            $jrtrCrDesc = $acc_user_acc;
            $jrtrDesc = 'Round Off Amount DR';
            //echo '<br/>$payRoundOffAmt:' .$payRoundOffAmt;
        }
    } else {
        if ($payRoundOffAmt >= 0.5) {
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = 1 - $payRoundOffAmt;
            $jrtrDrAccId = $acc_id;
            $jrtrDrDesc = $acc_user_acc . ' (' . $userName . ')';

            $jrtrCrAmt = 0;
            $jrtrCrAccId = $acc_id;
            $jrtrCrDesc = $acc_user_acc;
            $jrtrDesc = 'Round Off Amount DR';
        } else {
            $jrtrTransCRDR = 'CR';
            $jrtrDrAmt = 0;
            $jrtrDrAccId = $acc_id;
            $jrtrDrDesc = $acc_user_acc;

            $jrtrCrAmt = $payRoundOffAmt;
            $jrtrCrAccId = $acc_id;
            $jrtrCrDesc = $acc_user_acc . ' (' . $userName . ')';
            $jrtrDesc = 'Round Off Amount CR';
        }
    }
    //
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;

    $apiType = $transApiType;
    include 'ommpjrtr.php';
    $acc_id = '';
}
//
//
//echo '$jrnlId ==@@ '.$jrnlId.'<br />';
//echo '$jrtrAmtBalCRDR ==@@ '.$jrtrAmtBalCRDR.'<br />';
//
//echo '$jrtrAmtBalDrAmount ==@@ '.$jrtrAmtBalDrAmount.'<br />';
//echo '$jrtrAmtBalDrAccId ==@@ '.$jrtrAmtBalDrAccId.'<br />';
//echo '$jrtrAmtBalDrDesc ==@@ '.$jrtrAmtBalDrDesc.'<br />';
//
//echo '$jrtrAmtBalCrAmount ==@@ '.$jrtrAmtBalCrAmount.'<br />';
//echo '$jrtrAmtBalCrAccId ==@@ '.$jrtrAmtBalCrAccId.'<br />';
//echo '$jrtrAmtBalCrDesc ==@@ '.$jrtrAmtBalCrDesc.'<br />';
//
//echo '$jrtrAmtBalDesc ==@@ '.$jrtrAmtBalDesc.'<br />';
//
//
// Balance Left Amount Account Entry for JRTR Table
//
//echo '$jrtrAmtBalCrAccId ==@@ ' . $jrtrAmtBalCrAccId . '<br />';
//echo '$jrtrAmtBalDrAccId ==@@ ' . $jrtrAmtBalDrAccId . '<br />';
if ($jrtrAmtBalCrAccId != '' || $jrtrAmtBalDrAccId != '') {
    if ($payTotalAmtBal > 0 || $payTotalAmtBal < 0 || $transApiType == 'update') {

        //echo '$payTotalAmtBal == '.$payTotalAmtBal;die;

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $userId;
        $jrtrUserType = $userType;
        $jrtrTransId = $transId;
        $jrtrTransType = $transType;
        $jrtrFirmId = $firmId;
        //
        $jrtrTransCRDR = $jrtrAmtBalCRDR;
        //
        $jrtrDrAmt = om_round(abs($jrtrAmtBalDrAmount));
        $jrtrDrAccId = $jrtrAmtBalDrAccId;
        $jrtrDrDesc = $jrtrAmtBalDrDesc;
        //
        $jrtrCrAmt = om_round(abs($jrtrAmtBalCrAmount));
        $jrtrCrAccId = $jrtrAmtBalCrAccId;
        $jrtrCrDesc = $jrtrAmtBalCrDesc;
        //
        $jrtrDesc = $jrtrAmtBalDesc;
        $jrtrOthInfo = '';
        $jrtrDOB = $jrnlDate;

        $apiType = $transApiType;
        include 'ommpjrtr.php';
    }
}
//
if ($transactionType != 'RECEIPT' && $transactionType != 'PAYMENT') {
    //
    if (($payPrevTotAmt > 0 || $payPrevTotAmt < 0 || $transApiType == 'update') && $jrtrAmtBalDrDesc != '' && $paySettledDesc != '') {
        //
        //echo '$payTotalAmtBal == '.$payTotalAmtBal;die;
        //
        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $sessionOwnerId;
        $jrtrUserId = $userId;
        $jrtrUserType = $userType;
        $jrtrTransId = $transId;
        $jrtrTransType = $transType;
        $jrtrFirmId = $firmId;
        //
        //$jrtrTransCRDR = $payPrevCashBalCRDR;
        //
        if ($payPrevCashBalCRDR == 'CR') {
            $jrtrTransCRDR = 'DR';
            $jrtrDrAmt = abs($payPrevTotAmt);
            $jrtrDrAccId = $user_acc_id;
        } else {
            $jrtrDrAmt = 0;
            $jrtrDrAccId = '';
        }
        $jrtrDrDesc = $jrtrAmtBalDrDesc;
        //
        //
        if ($payPrevCashBalCRDR == 'DR') {
            $jrtrTransCRDR = 'CR';
            $jrtrCrAmt = abs($payPrevTotAmt);
            $jrtrCrAccId = $user_acc_id;
        } else {
            $jrtrCrAmt = 0;
            $jrtrCrAccId = '';
        }
        //
        $jrtrCrDesc = $jrtrAmtBalCrDesc;
        //
        $jrtrDesc = 'Previous Amt Settle';
        $jrtrOthInfo = '';
        $jrtrDOB = $jrnlDate;
        //
        $apiType = $transApiType;
        include 'ommpjrtr.php';
    }
}
//
//
//
//*****************************************************************************
// Raw Metal RECEIVED/PAID  journal entry file @RATNAKAR 18-11-2017
// *****************************************************************************
// include 'omusrtranjrnlrawmetal.php';
//
//
// *****************************************************************************
// End Code for each transaction type
// *****************************************************************************
//
//
// Added code for date str  @PRIYANKA-12-AUG-22
$payAddDateStr = strtotime($payAddDate);
//
//
// THIS FILE WILL MANAGE JOURNAL ENTRIES OF RECEIVED/PAID METAL
// IT WILL MANAGE METAL ENTRIES FOR BOTH TRANSACTION(SELL/PURCHASE)
//
//
// Added code to create Raw Metal - Paid / Received Account Entries  @PRIYANKA-12-AUG-22
if (($transactionType == 'PURBYSUPP' || $transactionType == 'sell' || $transactionType == 'ESTIMATESELL')) { //Removed $utin_payment_mode != 'RateCut' && ($utin_payment_mode != 'NoRateCut') from here Prathamesh
    if ($stockAccountEntry != 'No') {

        $rawMetalQry = "SELECT * FROM stock_transaction WHERE "
                . "sttr_pre_invoice_no='$payPreInvoiceNo' "
                . "AND sttr_invoice_no='$payInvoiceNo' "
                . "AND UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) = '$payAddDateStr' "
                . "AND sttr_transaction_type IN ('RECEIVED','PAID')";

        $rawMetalResult = mysqli_query($conn, $rawMetalQry) or die(mysqli_error($conn));
        $rawMetalCount = mysqli_num_rows($rawMetalResult);

        if ($rawMetalCount > 0) {

            while ($row = mysqli_fetch_array($rawMetalResult)) {

                $sttr_account_id = $row['sttr_account_id'];
                $sttr_valuation = $row['sttr_valuation'];

                parse_str(getTableValues("SELECT acc_user_acc FROM accounts "
                                . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                                . "and acc_id='$sttr_account_id' and acc_firm_id = '$firmId'"));

                $jrnlTransMetalAccId = $sttr_account_id;
                $jrnlTransMetalDesc = $acc_user_acc;

                if ($transactionType == 'PURBYSUPP') {
                    $jrtrMetalCRDR = 'CR';
                    //
                    $jrtrMetalCrAmount = $sttr_valuation;
                    $jrtrMetalCrAccId = $jrnlTransMetalAccId;
                    $jrtrMetalCrDesc = $jrnlTransMetalDesc;
                    //
                    $jrtrMetalDrAmount = 0;
                    $jrtrMetalDrAccId = '';
                    $jrtrMetalDrDesc = $jrnlTransMetalDesc;
                    $jrtrMetalDesc = 'RAW METAL PAID';
                    $rawMetalType = "PAID";
                } else {
                    $jrtrMetalCRDR = 'DR';
                    //
                    $jrtrMetalDrAmount = $sttr_valuation;
                    $jrtrMetalDrAccId = $jrnlTransMetalAccId;
                    $jrtrMetalDrDesc = $jrnlTransMetalDesc;
                    //
                    $jrtrMetalCrAmount = 0;
                    $jrtrMetalCrAccId = '';
                    $jrtrMetalCrDesc = $jrnlTransMetalDesc;
                    $jrtrMetalDesc = 'RAW METAL RECEIVED';
                    $rawMetalType = "RECEIVED";
                    //
                }

                if ($sttr_valuation <> 0 || $transApiType == 'update') {

                    $jrtrJId = '';
                    $jrtrJrnlId = $jrnlId;
                    $jrtrOwnId = $sessionOwnerId;
                    $jrtrUserId = $userId;
                    $jrtrUserType = $userType;
                    $jrtrTransId = $transId;
                    $jrtrTransType = $transType;
                    $jrtrFirmId = $firmId;
                    //
                    $jrtrTransCRDR = $jrtrMetalCRDR;
                    //
                    $jrtrDrAmt = abs($jrtrMetalDrAmount);
                    $jrtrDrAccId = $jrtrMetalDrAccId;
                    $jrtrDrDesc = $jrtrMetalDrDesc;
                    //
                    $jrtrCrAmt = abs($jrtrMetalCrAmount);
                    $jrtrCrAccId = $jrtrMetalCrAccId;
                    $jrtrCrDesc = $jrtrMetalCrDesc;
                    //
                    $jrtrDesc = $jrtrMetalDesc;
                    $jrtrOthInfo = '';
                    $jrtrDOB = $jrnlDate;

                    $apiType = $transApiType;
                    include 'ommpjrtr.php';
                }
                if (($sttr_valuation <> 0 || $transApiType == 'update') && $utin_payment_mode == 'NoRateCut') {
                    if ($transactionType == 'PURBYSUPP') {
                        $jrtrNRCCRDR = 'DR';
                        //
                        $jrtrMetalNRCDrAmount = $sttr_valuation;
                        $jrtrMetalNRCDrAccId = $jrnlTransAccId;
                        $jrtrMetalNRCDrDesc = $jrnlTransDesc;
                        //
                        $jrtrMetalNRCCrAmount = 0;
                        $jrtrMetalNRCCrAccId = '';
                        $jrtrMetalNRCCrDesc = $jrnlTransMetalDesc;
                        $jrtrMetalNRCDesc = 'Product Purchase';
                        $rawMetalType = "PAID";
                    } else {
                        $jrtrNRCCRDR = 'CR';
                        //
                        $jrtrMetalNRCCrAmount = $sttr_valuation;
                        $jrtrMetalNRCCrAccId = $sundryDebAccId;
                        $jrtrMetalNRCCrDesc = $jrnlTransDesc;
                        //
                        $jrtrMetalNRCDrAmount = 0;
                        $jrtrMetalNRCDrAccId = '';
                        $jrtrMetalNRCDrDesc = $jrnlTransMetalDesc;
                        $jrtrMetalNRCDesc = 'Product sell';
                        $rawMetalType = "RECEIVED";
                    }

                    $jrtrJId = '';
                    $jrtrJrnlId = $jrnlId;
                    $jrtrOwnId = $sessionOwnerId;
                    $jrtrUserId = $userId;
                    $jrtrUserType = $userType;
                    $jrtrTransId = $transId;
                    $jrtrTransType = $transType;
                    $jrtrFirmId = $firmId;
                    //
                    $jrtrTransCRDR = $jrtrNRCCRDR;
                    //
                    $jrtrDrAmt = abs($jrtrMetalNRCDrAmount);
                    $jrtrDrAccId = $jrtrMetalNRCDrAccId;
                    $jrtrDrDesc = $jrtrMetalNRCDrDesc;
                    //
                    $jrtrCrAmt = abs($jrtrMetalNRCCrAmount);
                    $jrtrCrAccId = $jrtrMetalNRCCrAccId;
                    $jrtrCrDesc = $jrtrMetalNRCCrDesc;
                    //
                    $jrtrDesc = $jrtrMetalNRCDesc;
                    $jrtrOthInfo = '';
                    $jrtrDOB = $jrnlDate;

                    $apiType = $transApiType;
                    include 'ommpjrtr.php';
                }
            }
        }
    }
}
?>