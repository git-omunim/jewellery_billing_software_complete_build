<?php
/*
 * *****************************************************************************
 * @tutorial: RECREATE JOURNAL ENTRIES FILE 
 * *****************************************************************************
 * 
 * Created on 16 Oct, 2017 12:21:22 PM
 *
 * @FileName: omusrtranjrnlprocess.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
// 
// START CODE TO GET VALUE OF SELL ACOUNTING ENTRY OPTION @AUTHOR:MADHUREE-29JULY2021
//
$querySellAccountingEntry = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellAccountingEntry'";
$resSellAccountingEntry = mysqli_query($conn, $querySellAccountingEntry);
$rowSellAccountingEntry = mysqli_fetch_array($resSellAccountingEntry);
$sellAccountingEntry = $rowSellAccountingEntry['omly_value'];
//
// END CODE TO GET VALUE OF SELL ACOUNTING ENTRY OPTION @AUTHOR:MADHUREE-29JULY2021
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START TO ADD CODE FOR TO RECREATE ADD STOCK PANEL - 
// (GOLD, SILVER AND STOCK & INVENTRORY ACCOUNTS) JOURNAL ENTRIES @AUTHOR-PRIYANKA-24JULY2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$queryStockAccountEntries = "SELECT * FROM stock_transaction WHERE sttr_item_ent_type IN ('AddInStock', 'purchaseOnCash') "
                          . "AND sttr_transaction_type IN ('EXISTING', 'PURONCASH') "
                          . "AND sttr_indicator NOT IN ('stockCrystal')"
                          . "AND sttr_status NOT IN ('Deleted', 'DELETED', 'NotDelFromStock') ORDER BY sttr_id ASC ";
//
//echo '$queryStockAccountEntries == ' . $queryStockAccountEntries . '<br />';
//
$resStockAccountEntries = mysqli_query($conn, $queryStockAccountEntries); // QUERY RESULT STORING IN VARIABLE @AUTHOR-PRIYANKA-24JULY2020
$noOfStockAccountEntriesAvailable = mysqli_num_rows($resStockAccountEntries);
//
if ($noOfStockAccountEntriesAvailable > 0) { // NO. OF PRODUCTS AVAILABLE @AUTHOR-PRIYANKA-24JULY2020
    //
    $accId = NULL;
    $jrtrStoneStockInvDesc = NULL;
    $jrtrStonePurchaseDesc = NULL;
    $puchaseSilverAccId = NULL;
    $puchaseGoldAccId = NULL;
    $puchaseStoneAccId = NULL;
    $paySilverAccId = NULL;
    $payGoldAccId = NULL;
    $payStoneAccId = NULL;
    $payStockInvAccId = NULL;
    $payTaxAccId = NULL;
    $payStoneCashAmt = 0;
    $payGoldCashAmt = 0;
    $payStockGoldCashAmt = 0;
    $paySilverCashAmt = 0;
    $payStockSilverCashAmt = 0;
    $payCashAmt = 0;
    $payTaxAmt = 0;
    //
    while ($rowStockAccountEntries = mysqli_fetch_array($resStockAccountEntries)) {
        //
        $operation = 'insert'; // OPERATION @AUTHOR-PRIYANKA-24JULY2020
        $stockId = $rowStockAccountEntries['sttr_id']; // MAIN STOCK ID @AUTHOR-PRIYANKA-24JULY2020
        $sttr_item_ent_type = $rowStockAccountEntries['sttr_item_ent_type']; // ENTRY TYPE @AUTHOR-PRIYANKA-24JULY2020
        $metalType = $rowStockAccountEntries['sttr_metal_type']; // STOCK TYPE @AUTHOR-PRIYANKA-24JULY2020
        $firmId = $rowStockAccountEntries['sttr_firm_id']; // FIRM ID @AUTHOR-PRIYANKA-24JULY2020
        $payAddDate = $rowStockAccountEntries['sttr_add_date']; // ADD DATE @AUTHOR-PRIYANKA-24JULY2020
        $stockProductCode = $rowStockAccountEntries['sttr_item_pre_id'] . $rowStockAccountEntries['sttr_item_id'];
        //
        //
        //echo '<br />$stockProductCode @==@ '.$stockProductCode.'<br />';
        //
        //
        // START CODE TO CALCULATE ALL STONE AMOUNT @AUTHOR:MADHUREE-07AUGUST2021
        //
        $selAllStoneEntries = "SELECT SUM(sttr_final_valuation) AS stoneValuation FROM stock_transaction "
                . "WHERE sttr_indicator='stockCrystal' AND sttr_sttr_id='$stockId'";

        $resSelAllStoneEntries = mysqli_query($conn, $selAllStoneEntries);
        $rowSelAllStoneEntries = mysqli_fetch_array($resSelAllStoneEntries);
        //
        // END CODE TO CALCULATE ALL STONE AMOUNT @AUTHOR:MADHUREE-07AUGUST2021
        //
        //
        //$payFinalPayableAmt = $rowStockAccountEntries['sttr_final_valuation'] - $rowSelAllStoneEntries['stoneValuation']; // PRODUCT VAL @AUTHOR-PRIYANKA-24JULY2020
        //
        //
        $payFinalPayableAmt = $rowStockAccountEntries['sttr_valuation']; // PRODUCT VAL @AUTHOR-PRIYANKA-24JULY2020
        //
        //
        if ($sttr_item_ent_type == 'purchaseOnCash') {
            $transType = $stoneTransactionType = 'PURONCASH';
        } else {
            $transType = $stoneTransactionType = 'EXISTING';
        }
        //
        if ($sttr_item_ent_type == 'AddInStock') { // FOR ADD STOCK ENTRIES @AUTHOR-PRIYANKA-24JULY2020
            //
            if ($metalType == 'Gold' || $metalType == 'GOLD') { // GOLD STOCK ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
                $accId = $acc_id;
            }
            //
            if ($metalType == 'Silver' || $metalType == 'SILVER') { // SILVER STOCK ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
                $accId = $acc_id;
            }
            //
            if (($metalType != 'Gold' && $metalType != 'GOLD') &&
                    ($metalType != 'Silver' && $metalType != 'SILVER')) {  // STOCK & INVENTORY ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock (Inventory)'"));
                $accId = $acc_id;
            }
            //
            $transApiType = $operation;
            $transactionType = $transType;
            //
            include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-24JULY2020
            //
            if ($operation == 'insert') { // INSERT OPERATION
                // Start Code Store Journal Id into Stock Transaction Table @AUTHOR-PRIYANKA-24JULY2020
                $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                        . "WHERE sttr_id = '$stockId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
                //
                if (!mysqli_query($conn, $query)) {
                    die('Error: ' . mysqli_error($conn));
                }
                // End Code Store Journal Id into Stock Transaction Table @AUTHOR-PRIYANKA-24JULY2020
            }
            //
            // ================================================================================================================================================ //
            // START CODE TO ADD CONDITION FOR STOCK CRYSTAL AMOUNT TO CALCULATE GOLD & STONE AMOUNT SEPERATELY FOR JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
            // ================================================================================================================================================ //
            //
            if ($rowSelAllStoneEntries['stoneValuation'] > 0) {

                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
                $accId = $acc_id;
                // 
                $payFinalPayableAmt = $rowSelAllStoneEntries['stoneValuation'];
                $transApiType = $operation;
                $transactionType = $stoneTransactionType;
                //
                include 'omusrtranjrnl.php';
                //
                if ($operation == 'insert') {
                    $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                            . "WHERE sttr_sttr_id = '$stockId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
                    //
                    if (!mysqli_query($conn, $query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
            }
            //
            // ============================================================================================================================================== //
            // END CODE TO ADD CONDITION FOR STOCK CRYSTAL AMOUNT TO CALCULATE GOLD & STONE AMOUNT SEPERATELY FOR JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
            // ============================================================================================================================================== //
            //
        } else if ($sttr_item_ent_type == 'purchaseOnCash') { // FOR ADD STOCK PURCHASE ON CASH ENTRIES @AUTHOR-PRIYANKA-24JULY2020
            //
            //
            if ($metalType == 'Gold' || $metalType == 'GOLD') {
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Purchase Gold'"));
                $puchaseGoldAccId = $acc_id;
                $puchaseSilverAccId = '';
                $payStockInvAccId = '';
                $puchaseStoneAccId = '';
                $jrtrStoneStockInvDesc = NULL;
                $jrtrStonePurchaseDesc = NULL;
                $payGoldCashAmt = $payFinalPayableAmt;
            }
            //
            if ($metalType == 'Silver' || $metalType == 'SILVER') {
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Purchase Silver'"));
                $puchaseSilverAccId = $acc_id;
                $puchaseGoldAccId = '';
                $payStockInvAccId = '';
                $puchaseStoneAccId = '';
                $jrtrStoneStockInvDesc = NULL;
                $jrtrStonePurchaseDesc = NULL;
                $paySilverCashAmt = $payFinalPayableAmt;
            }
            // 
            // CASH IN HAND ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' and "
                            . "acc_firm_id = '$firmId' and acc_user_acc = 'Cash in Hand'"));
            $payCashAccId = $acc_id;
            //
            $payCashAmt = $rowStockAccountEntries['sttr_final_valuation'];
            //
            if ($metalType == 'Gold' || $metalType == 'GOLD') { // GOLD STOCK ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
                $payGoldAccId = $acc_id;
                $paySilverAccId = '';
                $payStockInvAccId = '';
                $payStoneAccId = '';
            }
            //
            if ($metalType == 'Silver' || $metalType == 'SILVER') { // SILVER STOCK ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
                $paySilverAccId = $acc_id;
                $payGoldAccId = '';
                $payStockInvAccId = '';
                $payStoneAccId = '';
            }
            //
            if (($metalType != 'Gold' && $metalType != 'GOLD') &&
                    ($metalType != 'Silver' && $metalType != 'SILVER')) { // STOCK & INVENTORY ACCOUNT @AUTHOR-PRIYANKA-24JULY2020
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                . "acc_firm_id='$firmId' and acc_user_acc='Stock (Inventory)'"));
                $payStockInvAccId = $acc_id;
                //
                $jrtrStoneStockInvDesc = NULL;
                $jrtrStonePurchaseDesc = NULL;
                $puchaseSilverAccId = '';
                $puchaseGoldAccId = '';
                $puchaseStoneAccId = '';
                $paySilverAccId = '';
                $payGoldAccId = '';
                $payStoneAccId = '';
            }
            //
            $transApiType = $operation;
            $transactionType = $transType;
            //
            include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-24JULY2020
            //
            if ($operation == 'insert') { // INSERT OPERATION
                // 
                // Start Code Store Journal Id into Stock Transaction Table @AUTHOR-PRIYANKA-24JULY2020
                $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                        . "WHERE sttr_id = '$stockId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
                //
                if (!mysqli_query($conn, $query)) {
                    die('Error: ' . mysqli_error($conn));
                }
                // End Code Store Journal Id into Stock Transaction Table @AUTHOR-PRIYANKA-24JULY2020
            }
            //
            // ================================================================================================================================================ //
            // START CODE TO ADD CONDITION FOR STOCK CRYSTAL AMOUNT TO CALCULATE GOLD & STONE AMOUNT SEPERATELY FOR JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
            // ================================================================================================================================================ //
            //
            if ($rowSelAllStoneEntries['stoneValuation'] > 0) {
                $jrtrGoldSilverStockInvDesc = NULL;
                $jrtrGoldSilverPurchaseDesc = NULL;
                $payStockInvAccId = '';
                $puchaseGoldAccId = '';
                $puchaseSilverAccId = '';
                $payGoldAccId = '';
                $paySilverAccId = '';
                $payCashAccId = '';
                $payCashAmt = 0;
                $payFinalPayableAmt = $rowSelAllStoneEntries['stoneValuation'];
                $payStoneCashAmt = $rowSelAllStoneEntries['stoneValuation'];
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Purchase Stone'"));
                $puchaseStoneAccId = $acc_id;
                // 
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
                $payStoneAccId = $acc_id;
                //
                $transApiType = $operation;
                $transactionType = $stoneTransactionType;
                //
                include 'omusrtranjrnl.php';
                //
                if ($operation == 'insert') {
                    $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                            . "WHERE sttr_sttr_id = '$stockId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
                    //
                    if (!mysqli_query($conn, $query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                    //
                }
            }
//
            // ============================================================================================================================================== //
            // END CODE TO ADD CONDITION FOR STOCK CRYSTAL AMOUNT TO CALCULATE GOLD & STONE AMOUNT SEPERATELY FOR JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
            // ============================================================================================================================================== //
            //
        }
    }
}
//
//
$stockProductCode = NULL;
$payStockInvAccId = NULL;
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END OF ADD CODE FOR TO RECREATE ADD STOCK PANEL - 
// (GOLD, SILVER AND STOCK & INVENTRORY ACCOUNTS) JOURNAL ENTRIES @AUTHOR-PRIYANKA-24JULY2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
$query = "select * from user_transaction_invoice where utin_status!='Deleted' "
        . "and utin_type NOT IN ('OnPurchase','scheme') and (utin_other_info!='OPENING BALANCE' OR  utin_other_info IS NULL) "
        . "and (utin_transaction_type != null or utin_transaction_type != '') order by utin_id asc";
//
$resItemDetails = mysqli_query($conn, $query);
$noOfStockAvailable = mysqli_num_rows($resItemDetails);
if ($noOfStockAvailable > 0) {
    //
    while ($row = mysqli_fetch_array($resItemDetails)) {
        //
        $payRoundOffAmt = 0;
        $accId = NULL;
        $acc_id = NULL;
        $userAccId = NULL;
        $jrnlTransAccId = NULL;
        $jrnlTransDesc = NULL;
        $sundryDebAccId = NULL;
        $sundryDebAccName = NULL;
        $payGoldAccId = NULL;
        $paySilverAccId = NULL;
        $payStockInvAccId = NULL;
        $puchaseGoldAccId = NULL;
        $puchaseSilverAccId = NULL;
        $saleGoldAccId = NULL;
        $saleSilverAccId = NULL;
        $jrtrGoldSilverStockInvDesc = NULL;
        $jrtrGoldSilverPurchaseDesc = NULL;
        $jrtrGoldSilverSaleDesc = NULL;
        $payTaxAccId = NULL;
        $desc = '';
        //
        $payableCashCRDR = '';
        $utin_id = $row['utin_id'];
        $utin_utin_id = $row['utin_utin_id'];
        $firmId = $row['utin_firm_id'];
        $userId = $row['utin_user_id'];
        $payPreInvoiceNo = $row['utin_pre_invoice_no'];
        $payInvoiceNo = $row['utin_invoice_no'];
        $utinType = $row['utin_type'];
        $transactionType = $row['utin_transaction_type'];
        $paymentMode = $row['utin_payment_mode'];
        //
        $stockAccountEntry = ''; // CREATE MAIN JRNL ENTRY YES/NO 
        //
        $utin_dr_acc_id = $row['utin_dr_acc_id'];
        $utin_cr_acc_id = $row['utin_cr_acc_id'];
        //
        //PRIYANKA ADDED THIS
        if ($transactionType == 'ADV MONEY' || $transactionType == 'RECEIPT') {
            //
            $userAccId = $utin_dr_acc_id;
            $accId = $utin_cr_acc_id;
            //
        } else if ($transactionType == 'UDHAAR' || $transactionType == 'OnPurchase' ||
                   $transactionType == 'PAYMENT') {
            //
            $userAccId = $utin_cr_acc_id;
            $accId = $utin_dr_acc_id;
            //
            
        }
        //
        if (($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') && ($accId == '' || $accId == NULL)) {
            //
            $accIdQ = "SELECT acc_id FROM accounts where acc_own_id = '$_SESSION[sessionOwnerId]' "
                    . "and acc_user_acc IN ('Sales Accounts') "
                    . "and acc_firm_id = '$firmId' order by acc_user_acc asc";
            //
            $accIdR = mysqli_query($conn, $accIdQ);
            $rowIdRow = mysqli_fetch_array($accIdR);
            $accId = $rowIdRow['acc_id'];
            //
        }
        //
        if ($transactionType == 'PURBYSUPP' && ($accId == '' || $accId == NULL)) {
            //
            $accIdP = "SELECT acc_id FROM accounts where acc_own_id = '$_SESSION[sessionOwnerId]' "
                    . "and acc_user_acc IN ('Purchase Accounts') "
                    . "and acc_firm_id = '$firmId' order by acc_user_acc asc";
            //
            $accIdRP = mysqli_query($conn, $accIdP);
            $rowIdRowP = mysqli_fetch_array($accIdRP);
            $accId = $rowIdRowP['acc_id'];
            //
        }
        //   
        $utin_payment_mode = $row['utin_payment_mode'];
        //
        $payPrevTotAmt = $row['utin_prev_cash_bal'];
        //
        $payPrevCashBalCRDR = $row['utin_prev_amt_CRDR'];
        $payCRDR = $row['utin_CRDR'];
        $utin_cash_CRDR = $row['utin_cash_CRDR'];
        //
        $utin_total_amt_deposit = $row['utin_total_amt_deposit'];
        $utin_cash_balance = $row['utin_cash_balance'];
        $utin_total_amt = $row['utin_total_amt'];
        $utin_total_taxable_amt = $row['utin_total_taxable_amt'];
        //
        $payCashAccId = $row['utin_pay_cash_acc_id'];
        $payChequeAccId = $row['utin_pay_cheque_acc_id'];
        $payCardAccId = $row['utin_pay_card_acc_id'];
        //
        $payOnlinePayAccId = $row['utin_online_pay_acc_id'];
        $payDiscountAccId = $row['utin_pay_disc_acc_id'];
        $payAddtionalChargesAccId = $row['utin_additional_charges_acc_id'];
        $payCourierAccId = $row['utin_courier_acc_id'];
        $payTaxAccId = $row['utin_pay_tax_acc_id'];
        //
        $payCashAmt = $row['utin_cash_amt_rec'];
        $payChequeAmt = $row['utin_pay_cheque_amt'];
        $payAdditionalChargsAmt = $row['utin_additional_charges'];
        //
        $payCardAmt = $row['utin_pay_card_amt'];
        $payCardTransChgsAmt = $row['utin_pay_trans_chrg'];
        $payOnlinePayAmt = $row['utin_online_pay_amt'];
        //
        $payOnlinePayCommPaidAmt = $row['utin_pay_comm_paid'];
        $utin_discount_amt_discup = $row['utin_discount_amt_discup'];
        if ($utin_discount_amt_discup != '') {
            $payDiscountAmt = $utin_discount_amt_discup + $row['utin_discount_amt'];
        } else {
            $payDiscountAmt = $row['utin_discount_amt'];
        }
        $payCourierAmt = $row['utin_courier_chgs_amt'];
        //
        // ADDED THIS FOR LOYALTY POINTS @PRIYANKA-17APR18
        $lpRedeem = $row['utin_lp_redeem'];
        //
        $payAddDate = $row['utin_date'];
        //
        $payTotalAmntRec = $row['utin_tot_amt_rec'];
        $payCRDR = $row['utin_CRDR'];
        $payCashCRDR = $row['utin_cash_CRDR'];
        //
        $payCGSTAccId = $row['utin_pay_cgst_acc_id'];
        $paySGSTAccId = $row['utin_pay_sgst_acc_id'];
        $payIGSTAccId = $row['utin_pay_igst_acc_id'];
        //
        $payCGSTaxAmt = $row['utin_pay_cgst_amt'];
        $paySGSTaxAmt = $row['utin_pay_sgst_amt'];
        $payIGSTaxAmt = $row['utin_pay_igst_amt'];
        //
        $payTaxAmt = $row['utin_pay_tax_amt'];
        $payFinalPayableAmt = $row['utin_tot_payable_amt'];
        //
        $payFinalPayableAmtWOAbs = $row['utin_tot_payable_amt'];
        //
        $payTotOthChgs = $row['utin_oth_chgs_amt'];
        $payCrystalAmt = $row['utin_crystal_amt'];
        $totalPurchaseAmt = $row['utin_total_amt'];
        //
        //
        // ******************************************************************************************
        // START TO ADD CODE FOR HALLMARKING CHARGES @PRIYANKA-09JUNE2022
        // ******************************************************************************************
        //
        $payTotHallmarkChgs = $row['utin_hallmark_chrgs_amt'];
        //
        $payHallmarkCGSTAccId = $row['utin_pay_hallmark_cgst_acc_id'];
        $payHallmarkSGSTAccId = $row['utin_pay_hallmark_sgst_acc_id'];
        $payHallmarkIGSTAccId = $row['utin_pay_hallmark_igst_acc_id'];
        //
        $payHallmarkCGSTPercent = $row['utin_pay_hallmark_cgst_chrg'];
        $payHallmarkSGSTPercent = $row['utin_pay_hallmark_sgst_chrg'];
        $payHallmarkIGSTPercent = $row['utin_pay_hallmark_igst_chrg'];
        //
        $payHallmarkCGSTAmt = $row['utin_pay_hallmark_cgst_amt'];
        $payHallmarkSGSTAmt = $row['utin_pay_hallmark_sgst_amt'];
        $payHallmarkIGSTAmt = $row['utin_pay_hallmark_igst_amt'];
        //
        $payHallmarkCGSTOnAmt = $row['utin_pay_hallmark_cgst_tot_amt'];
        $payHallmarkSGSTOnAmt = $row['utin_pay_hallmark_sgst_tot_amt'];
        $payHallmarkIGSTOnAmt = $row['utin_pay_hallmark_igst_tot_amt'];
        //
        // ******************************************************************************************
        // END TO ADD CODE FOR HALLMARKING CHARGES @PRIYANKA-09JUNE2022
        // ******************************************************************************************
        //
        //
        //
        $payMkgCGSTAccId = $row['utin_pay_mkg_cgst_acc_id'];
        $payMkgSGSTAccId = $row['utin_pay_mkg_sgst_acc_id'];
        //
        $payMkgCGSTPercent = $row['utin_pay_mkg_cgst_chrg'];
        $payMkgSGSTPercent = $row['utin_pay_mkg_sgst_chrg'];
        $payMkgCGSTAmt = $row['utin_pay_mkg_cgst_amt'];
        $payMkgSGSTAmt = $row['utin_pay_mkg_sgst_amt'];
        //
        $payMkgCGSTOnAmt = $row['utin_pay_mkg_cgst_tot_amt'];
        $payMkgSGSTOnAmt = $row['utin_pay_mkg_sgst_tot_amt'];
        //
        $payRoundOffAmt = $row['utin_round_off_amt'];
        //
        //
        if ($transactionType == 'ADV MONEY' || $transactionType == 'UDHAAR') {

            // IT WILL FIX CASH ACC ID 
            if ($payCashAccId == $accId && $transactionType == 'ADV MONEY' && $payCashAmt == $payFinalPayableAmt) {
                $payCashAccId = $userAccId;
                parse_str(setTableValues("user_transaction_invoice", "utin_pay_cash_acc_id", "$userAccId", "utin_id=$utin_id"));
            }

            $totalActualPaidAmt = $payCashAmt + $payChequeAmt + $payCardAmt + $payOnlinePayAmt + $payDiscountAmt + $payCardTransChgsAmt - $payOnlinePayCommPaidAmt;

            if ($totalActualPaidAmt != $payFinalPayableAmt) {

                if ($totalActualPaidAmt == 0) {

                    $payCashAmt = $payFinalPayableAmt;

                    parse_str(setTableValues("user_transaction_invoice", "utin_cash_amt_rec", "$payFinalPayableAmtWOAbs", "utin_id=$utin_id"));
                    parse_str(setTableValues("user_transaction_invoice", "utin_pay_cash_acc_id", "$utin_cr_acc_id", "utin_id=$utin_id"));
                } else if ($payChequeAmt == 0 && $payCardAmt == 0 && $payOnlinePayAmt == 0) {

                    $payCashAmt = $payFinalPayableAmt;

                    parse_str(setTableValues("user_transaction_invoice", "utin_cash_amt_rec", "$payFinalPayableAmtWOAbs", "utin_id=$utin_id"));
                    parse_str(setTableValues("user_transaction_invoice", "utin_pay_cash_acc_id", "$utin_cr_acc_id", "utin_id=$utin_id"));
                }
            }

            $payCashAmt = abs($payCashAmt);
            $udhaarCashRecAmount = 0;
            $payTotalAmtBal = $utin_total_amt;
        } else {
            $udhaarCashRecAmount = $utin_total_amt_deposit;
            $payTotalAmtBal = $utin_cash_balance;
        }
        //
        //
        // TO PREVENT CASH IN HAND ENTRY @12JAN2018
        if ($transactionType == 'OnPurchase') {
            // $payCashAmt = 0;
            $udhaarCashRecAmount = 0;
            $payTotalAmtBal = $utin_total_amt;
        }

        // IT WILL REPAIR WRONG TAX ACCOUNT ID'S
        if ($utin_type == 'rawMetal') {
            // IT WILL CHECK WHETHER CGST ACCOUNT ID IS SAME TO OTHER TAX ACCOUNT ID
            if ($payCGSTAccId == $paySGSTAccId || $paySGSTAccId == $payIGSTAccId ||
                    $payCGSTAccId == $payMkgCGSTAccId ||
                    $payCGSTAccId == $payMkgSGSTAccId) {

                // IT WILL RETURN TAX ACCOUNT ID'S ACCORDIFNG TO FIRMS
                $accIdQuery = "SELECT acc_id,acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' "
                        . "and acc_main_acc IN ('Duties & Taxes') "
                        . "and acc_firm_id='$utin_firm_id' order by acc_user_acc asc";
                $accIdResult = mysqli_query($conn, $accIdQuery);

                // IT WILL UPDATE TAX ACCOUNT ID'S
                while ($acc = mysqli_fetch_array($accIdResult)) {
                    if ($acc['acc_user_acc'] == 'SGST')
                        $paySGSTAccId = $acc['acc_id'];
                    else if ($acc['acc_user_acc'] == 'IGST')
                        $payIGSTAccId = $acc['acc_id'];
                    else if ($acc['acc_user_acc'] == 'Making Charges')
                        $payMkgCGSTAccId = $payMkgSGSTAccId = $acc['acc_id'];
                    else if ($acc['acc_user_acc'] == 'CGST')
                        $payCGSTAccId = $acc['acc_id'];
                }

                // IT WILL UPDATE MAIN RAW METAL ENTRIES
                $updateRawMetal = "UPDATE user_transaction_invoice "
                        . "SET utin_pay_cgst_acc_id='$payCGSTAccId',"
                        . "utin_pay_sgst_acc_id='$paySGSTAccId',"
                        . "utin_pay_mkg_cgst_acc_id='$payMkgCGSTAccId',"
                        . "utin_pay_mkg_sgst_acc_id='$payMkgSGSTAccId',"
                        . "utin_pay_igst_acc_id='$payIGSTAccId' WHERE utin_id='$utin_id'";

                if (!mysqli_query($conn, $updateRawMetal)) {
                    die("QUERY :" . $updateRawMetal . "<BR> ERROR :" . mysqli_error($conn));
                }
            }
        }
        //
        //
        //echo '$accId #==# ' . $accId . '<br />';
        //
        $transApiType = "insert";
        //
        //if ($accId != NULL || $accId != '') {
        //
        include 'omusrtranjrnl.php';
        //
        // Start Code Store Journal Id into User Transaction Table
        $query = "UPDATE user_transaction_invoice SET utin_jrnl_id='$jrnlId' "
               . "WHERE utin_id='$utin_id' AND utin_owner_id='$_SESSION[sessionOwnerId]'";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //}
        //
        //
        // End Code Store Journal Id into User Transaction Table
        //
        //
        //
        if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || $transactionType == 'PURBYSUPP') {
            $accId = NULL;
        }
        // 
        //
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START TO ADD CODE FOR TO RECREATE (GOLD, SILVER AND STOCK & INVENTRORY ACCOUNTS) 
        // JOURNAL ENTRIES @AUTHOR-PRIYANKA-23JULY2020
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        //
        if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || 
            $transactionType == 'PURBYSUPP' || $transactionType == 'ItemReturn') {
            //
            //
            if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || $transactionType == 'ItemReturn') {
                $NewTransType = $transactionType;
            } else {
                if ($utinType == 'rawMetal' || $utinType == 'crystal') {
                    $NewTransType = 'PURBYSUPP';
                } else {
                    $NewTransType = 'PURCHASE';
                }
            }
            //
            //
            //echo '$payAddDate == ' . $payAddDate . '<br /><br />';
            //echo '$payPreInvoiceNo == ' . $payPreInvoiceNo . '<br />';
            //echo '$payInvoiceNo == ' . $payInvoiceNo . '<br />';
            //echo '$NewTransType == ' . $NewTransType . '<br />';
            //echo '$utin_id == ' . $utin_id . '<br />';
            //
            //
            // Added code for Date Str @AUTHOR:PRIYANKA-12AUG22
            $payAddDateStr = strtotime($payAddDate);
            //
            //
            //echo '$payAddDateStr == ' . $payAddDateStr . '<br />';
            //
            //
            $queryProducts = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "AND sttr_pre_invoice_no = '$payPreInvoiceNo' and sttr_invoice_no = '$payInvoiceNo' "
                           . "AND sttr_status NOT IN ('DELETED') "
                           . "AND sttr_transaction_type = '$NewTransType' AND sttr_utin_id = '$utin_id' "
                           . "AND UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) = '$payAddDateStr' ";
            //
            //echo '$queryProducts == ' . $queryProducts . '<br /><br />';
            //
            $productsResult = mysqli_query($conn, $queryProducts); // QUERY RESULT STORING IN VARIABLE @AUTHOR-PRIYANKA-23JULY2020
            //
            $purGoldVal = 0;
            $purSilverVal = 0;
            $payGoldCashAmt = 0;
            $payStockGoldCashAmt = 0;
            $paySilverCashAmt = 0;
            $payStockSilverCashAmt = 0;
            $stockGoldVal = 0;
            $stockSilverVal = 0;
            $purStockVal = 0;
            $sellStockVal = 0;
            $payCashAmt = 0;
            $payChequeAmt = 0;
            $payCardAmt = 0;
            $payCardTransChgsAmt = 0;
            $payOnlinePayAmt = 0;
            $payTotOthChgs = 0;
            $payTotHallmarkChgs = 0;
            $lpRedeem = 0;
            $payDiscountAmt = 0;
            $payAdditionalChargsAmt = 0;
            $payCourierAmt = 0;
            $payInterestAmt = 0;
            $payRoundOffAmt = 0;
            $payFinalPayableAmt = 0;
            $payTaxAmt = 0;
            //
            while ($productsRow = mysqli_fetch_array($productsResult, MYSQLI_ASSOC)) {
                //
                //
                //echo '$sellStockVal @== ' . $sellStockVal . '<br />';
                //echo '$purStockVal @== ' . $purStockVal . '<br />';
                //
                //
                //print_r($productsRow);
                //
                //
                $userId = $productsRow['sttr_user_id'];
                //
                $sttr_indicator = $productsRow['sttr_indicator'];
                //
                $metalType = $productsRow['sttr_metal_type'];
                //
                //
//                echo 'sttr_user_id @== ' . $productsRow['sttr_user_id'] . '<br />';
//                echo 'sttr_indicator @== ' . $productsRow['sttr_indicator'] . '<br />';
//                echo '$userId @== ' . $userId . '<br />';
//                echo '$sttr_indicator @== ' . $sttr_indicator . '<br />';
//                //
//                echo 'sttr_payment_mode @== ' .  $productsRow['sttr_payment_mode'] . '<br />';
//                echo 'sttr_metal_type @== ' .  $productsRow['sttr_metal_type'] . '<br />';
//                echo 'sttr_transaction_type @== ' . $productsRow['sttr_transaction_type'] . '<br />';
                //
                //
                if ($productsRow['sttr_transaction_type'] == 'sell' || 
                    $productsRow['sttr_transaction_type'] == 'ESTIMATESELL' ||
                    $productsRow['sttr_transaction_type'] == 'ItemReturn') { // FOR SELL ENTRIES
                    //
                    //
                    if ($productsRow['sttr_metal_type'] == 'imitation' || $_SESSION['sessionProdName'] == 'OMRETL') {
                        $sellStockVal += $productsRow['sttr_valuation'];
                    }
                    //
                    //
                    $sttr_metal_type = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_metal_type]));
                    $sttr_item_name = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_item_name]));
                    $sttr_item_category = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_item_category]));
                    $sttr_stock_type = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_stock_type]));
                    $sttr_firm_id = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_firm_id]));
                    $sttr_purity = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_purity]));
                    //
                    //
                    //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                        //
                        //echo '$st_pur_avg_rate @@==@@== ' . $st_pur_avg_rate . '<br />';
                        //
                        $st_metal_rate = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_metal_rate]));
                        $st_pur_avg_rate = mysqli_real_escape_string($conn, stripslashes($productsRow[sttr_metal_rate]));
                        //
                        //echo '$st_pur_avg_rate ##==##== ' . $st_pur_avg_rate . '<br />';
                        //
                    //}
                    //
                    //
                    parse_str(getTableValues("SELECT st_metal_rate, st_pur_avg_rate, st_gs_weight, "
                                           . "st_pur_avg_lab_chrgs, st_pur_avg_other_chrgs "
                                           . "FROM stock WHERE st_owner_id = '$sessionOwnerId' "
                                           . "AND st_metal_type = '$sttr_metal_type' "
                                           . "AND st_item_name = '$sttr_item_name' "
                                           . "AND st_item_category = '$sttr_item_category' "
                                           . "AND st_stock_type = '$sttr_stock_type' "
                                           . "AND st_firm_id = '$sttr_firm_id' "
                                           . "AND st_purity = '$sttr_purity'"));
                    //
                    //
                    //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                        //
                        //echo "SELECT st_metal_rate, st_pur_avg_rate, "
                        //   . "st_pur_avg_lab_chrgs, st_pur_avg_other_chrgs "
                        //   . "FROM stock WHERE st_owner_id = '$sessionOwnerId' "
                        //   . "AND st_metal_type = '$sttr_metal_type' "
                        //   . "AND st_item_name = '$sttr_item_name' "
                        //   . "AND st_item_category = '$sttr_item_category' "
                        //   . "AND st_stock_type = '$sttr_stock_type' "
                        //   . "AND st_firm_id = '$sttr_firm_id' "
                        //   . "AND st_purity = '$sttr_purity'" . '<br />';
                        //
                        //
                    $addStockEntryPurRate = NULL;
                    $addStockEntryFinalValBy = NULL;
                    $addStockEntryFinalFineWeight = NULL;
                    $addStockEntryGSWeight = NULL;
                    $addStockEntryNTWeight = NULL;
                    $addStockEntryType = NULL;
                    $productsRowSttrSttrId = NULL;
                    //
                    //
                    //
                    //
                    if ($productsRow['sttr_indicator'] == 'stock' && $productsRow['sttr_stock_type'] == 'retail') {
                        //
                        //
                        $productsRowSttrSttrId = $productsRow['sttr_sttr_id'];
                        //
                        //
                        if ($productsRow['sttr_transaction_type'] == 'ItemReturn' && 
                            $productsRow['sttr_indicator'] == 'ItemReturn' &&
                            $productsRow['sttr_stock_type'] == 'retail' &&
                           ($productsRow['sttr_metal_type'] == 'Gold' ||
                            $productsRow['sttr_metal_type'] == 'Silver')) {
                            //
                            parse_str(getTableValues("SELECT sttr_sttr_id AS productsRowSttrSttrId "
                                                   . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                                   . "AND sttr_metal_type = '$sttr_metal_type' "
                                                   . "AND sttr_stock_type = 'retail' "
                                                   . "AND sttr_id = '$productsRow[sttr_sttr_id]' "
                                                   . "AND sttr_indicator = 'stock' "
                                                   . "AND sttr_transaction_type IN ('sell', 'ESTIMATESELL')"));
                            //
                        }
                        //
                        //
                        //
                        //
                        parse_str(getTableValues("SELECT sttr_metal_rate AS addStockEntryPurRate, "
                                               . "sttr_final_valuation_by AS addStockEntryFinalValBy, "
                                               . "sttr_gs_weight AS addStockEntryGSWeight, "
                                               . "sttr_nt_weight AS addStockEntryNTWeight, "
                                               . "sttr_final_fine_weight AS addStockEntryFinalFineWeight, "
                                               . "sttr_item_ent_type AS addStockEntryType "
                                               . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                                               . "AND sttr_metal_type = '$sttr_metal_type' "
                                               . "AND sttr_stock_type = 'retail' "
                                               . "AND sttr_id = '$productsRowSttrSttrId' "
                                               . "AND sttr_indicator = 'stock' "
                                               . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL', 'ItemReturn')"));
                        //
                        //
                    }
                    //
                    //
                    if ($productsRow['sttr_metal_type'] == 'Gold' || 
                        $productsRow['sttr_metal_type'] == 'GOLD' ||
                        $productsRow['sttr_metal_type'] == 'gold') {
                        //
                        parse_str(getTableValues("SELECT met_rate_per_wt, met_rate_per_wt_tp FROM metal_rates "
                                               . "WHERE met_rate_metal_name = 'Gold' order by met_rate_ent_dat desc LIMIT 0, 1"));
                        //
                        //
                        //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                            //
                            //echo '$st_pur_avg_rate 1== ' . $st_pur_avg_rate . '<br />';
                            //echo '$met_rate_per_wt 1== ' . $met_rate_per_wt . '<br />';
                            //echo '$met_rate_per_wt_tp 1== ' . $met_rate_per_wt_tp . '<br />';
                            //
                        //}
                        //
                        //
                        if ($met_rate_per_wt != '' && $met_rate_per_wt_tp != '') {
                            if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '1') {
                                $st_pur_avg_rate = $st_pur_avg_rate * 10;
                            } else {
                                $st_pur_avg_rate = $st_pur_avg_rate;
                            }
                        }
                        //
                        //
                        //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                            //
                            //echo '$st_pur_avg_rate 2== ' . $st_pur_avg_rate . '<br />';
                            //
                            //echo '$st_metal_rate == ' . $st_metal_rate . '<br />';
                            //
                        //}
                        //
                        //
                        //
                        //
                        $stockGdMainEntryPurRateIntValue = intval($st_metal_rate);
                        $stockGdMainEntryPurRateIntValuelength = strlen((string) $stockGdMainEntryPurRateIntValue);
                        //
                        $stockGdAvgEntryPurRateIntValue = intval($st_pur_avg_rate);
                        $stockGdAvgEntryPurRateIntValuelength = strlen((string) $stockGdAvgEntryPurRateIntValue);
                        //
                        if ($st_pur_avg_rate != '' && $st_pur_avg_rate != NULL) {
                            if ($stockGdAvgEntryPurRateIntValuelength == 2 || $stockGdAvgEntryPurRateIntValuelength == 3 ||
                                $stockGdAvgEntryPurRateIntValuelength == 4) {
                                $purGoldMetalRate = ($st_pur_avg_rate);
                            } else {
                                $purGoldMetalRate = ($st_pur_avg_rate / 10);
                            }
                        } else {
                            if ($stockGdMainEntryPurRateIntValuelength == 2 || $stockGdMainEntryPurRateIntValuelength == 3 ||
                                $stockGdMainEntryPurRateIntValuelength == 4) {
                                $purGoldMetalRate = ($st_metal_rate);
                            } else {
                                $purGoldMetalRate = ($st_metal_rate / 10);
                            }
                        }
                        //
                        //
                        //
                        //
                        //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                            //
                            //echo '$stockGoldVal 1== ' . $stockGoldVal . '<br />';
                            //
                            //echo '$purGoldMetalRate == ' . $purGoldMetalRate . '<br />';
                            //echo 'sttr_fine_weight == ' . $productsRow[sttr_fine_weight] . '<br />';
                            //
                        //}
                        //
                        //
                        if ($purGoldMetalRate <= 0 || $st_gs_weight < 0) {
                            //
                            //
                            $stockGdEntryPurRateIntValue = intval($productsRow['sttr_metal_rate']);
                            $stockGdEntryPurRateIntValuelength = strlen((string) $stockGdEntryPurRateIntValue);
                            //   
                            //                                
                            if ($productsRow['sttr_metal_rate'] != '' && $productsRow['sttr_metal_rate'] != NULL) {
                                if ($stockGdEntryPurRateIntValuelength == 2) {
                                    $purGoldMetalRate = ($productsRow['sttr_metal_rate']);
                                } else if ($stockGdEntryPurRateIntValuelength == 3) {
                                    $purGoldMetalRate = ($productsRow['sttr_metal_rate']);
                                } else if ($stockGdEntryPurRateIntValuelength == 4) {
                                    $purGoldMetalRate = ($productsRow['sttr_metal_rate']);
                                } else if ($stockGdEntryPurRateIntValuelength == 5) {
                                    $purGoldMetalRate = ($productsRow['sttr_metal_rate'] / 10);
                                } else {
                                    $purGoldMetalRate = ($productsRow['sttr_metal_rate'] / 10);
                                }
                            }
                            //
                            //
                            if ($productsRow['sttr_metal_rate'] != '' && $productsRow['sttr_metal_rate'] != NULL) {
                                //
                                $met_rate_per_wt = NULL;
                                $met_rate_per_wt_tp = NULL;
                                //
                                parse_str(getTableValues("SELECT met_rate_value, met_rate_per_wt, met_rate_per_wt_tp FROM metal_rates "
                                                       . "WHERE met_rate_metal_name = 'Gold' "
                                                       . "AND met_rate_value = '$productsRow[sttr_metal_rate]' "
                                                       . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                //
                                if ($met_rate_per_wt != '' && $met_rate_per_wt_tp != '' &&
                                        $met_rate_per_wt != NULL && $met_rate_per_wt_tp != NULL) {
                                    if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '1') {
                                        $purGoldMetalRate = $productsRow['sttr_metal_rate'];
                                    } else if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '10') {
                                        $purGoldMetalRate = $productsRow['sttr_metal_rate'] / 10;
                                    }
                                }
                                //
                            }
                            //
                            //
                        }
                        //
                        //
                        $purGoldVal += ($purGoldMetalRate * $productsRow[sttr_fine_weight]);
                        //
                        //
                        //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                            //
                            //echo '$purGoldVal == ' . $purGoldVal . '<br />';
                            //echo 'sttr_gs_weight == ' . $productsRow[sttr_gs_weight] . '<br />';
                            //
                        //}
                        //
                        //
                        if ($sellAccountingEntry == 'byGrossWt') {
                            $stockGoldVal += ($purGoldMetalRate * $productsRow['sttr_gs_weight']);
                        } else {
                            $stockGoldVal = $purGoldVal;
                        }
                        //
                        //if ($productsRow['sttr_transaction_type'] == 'sell' && $userId == '10034') {
                            //
                            //echo '$stockGoldVal 2== ' . $stockGoldVal . '<br />';
                            //
                        //}
                        //
                        //
                        $payGoldCashAmt += $productsRow['sttr_valuation'];
                        //
                        if ($productsRow['sttr_transaction_type'] == 'ItemReturn') {
                            $payStockGoldCashAmt += $stockGoldVal;
                        }
                        //
                        //
                    }
                    //
                    //
                    //
                    //
                    if ($productsRow['sttr_metal_type'] == 'Silver' || 
                        $productsRow['sttr_metal_type'] == 'SILVER' ||
                        $productsRow['sttr_metal_type'] == 'silver') {
                        //
                        parse_str(getTableValues("SELECT met_rate_per_wt, met_rate_per_wt_tp FROM metal_rates "
                                               . "WHERE met_rate_metal_name = 'Silver' order by met_rate_ent_dat desc LIMIT 0, 1"));
                        //
                        if ($met_rate_per_wt != '' && $met_rate_per_wt_tp != '') {
                            if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '1') {
                                $st_pur_avg_rate = $st_pur_avg_rate * 1000;
                            } else if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '10') {
                                $st_pur_avg_rate = $st_pur_avg_rate * 100;
                            } else {
                                $st_pur_avg_rate = $st_pur_avg_rate;
                            }
                        }
                        //
                        //
                        //
                        //
                        $stockSlMainEntryPurRateIntValue = intval($st_metal_rate);
                        $stockSlMainEntryPurRateIntValuelength = strlen((string) $stockSlMainEntryPurRateIntValue);
                        //
                        $stockSlAvgEntryPurRateIntValue = intval($st_pur_avg_rate);
                        $stockSlAvgEntryPurRateIntValuelength = strlen((string) $stockSlAvgEntryPurRateIntValue);
                        //
                        if ($st_pur_avg_rate != '' && $st_pur_avg_rate != NULL) {
                            if ($stockSlAvgEntryPurRateIntValuelength == 2 || $stockSlAvgEntryPurRateIntValuelength == 3 ||
                                $stockSlAvgEntryPurRateIntValuelength == 4) {
                                $purSilverMetalRate = ($st_pur_avg_rate);
                            } else {
                                $purSilverMetalRate = ($st_pur_avg_rate / 1000);
                            }
                        } else {
                            if ($stockSlMainEntryPurRateIntValuelength == 2 || $stockSlMainEntryPurRateIntValuelength == 3 ||
                                $stockSlMainEntryPurRateIntValuelength == 4) {
                                $purSilverMetalRate = ($st_metal_rate);
                            } else {
                                $purSilverMetalRate = ($st_metal_rate / 1000);
                            }
                        }
                        //
                        //
                        //
                        //
                        if ($purSilverMetalRate <= 0 || $st_gs_weight < 0) {
                            //
                            //
                            $stockEntryPurRateIntValue = intval($productsRow['sttr_metal_rate']);
                            $stockEntryPurRateIntValuelength = strlen((string) $stockEntryPurRateIntValue);
                            //   
                            //                                
                            if ($productsRow['sttr_metal_rate'] != '' && $productsRow['sttr_metal_rate'] != NULL) {
                                if ($stockEntryPurRateIntValuelength == 2) {
                                    $purSilverMetalRate = ($productsRow['sttr_metal_rate']);
                                } else if ($stockEntryPurRateIntValuelength == 3) {
                                    $purSilverMetalRate = ($productsRow['sttr_metal_rate']);
                                } else if ($stockEntryPurRateIntValuelength == 4) {
                                    $purSilverMetalRate = ($productsRow['sttr_metal_rate']);
                                } else if ($stockEntryPurRateIntValuelength == 5) {
                                    $purSilverMetalRate = ($productsRow['sttr_metal_rate'] / 1000);
                                } else {
                                    $purSilverMetalRate = ($productsRow['sttr_metal_rate'] / 1000);
                                }
                            }
                            //
                            //
                            if ($productsRow['sttr_metal_rate'] != '' && $productsRow['sttr_metal_rate'] != NULL) {
                                //
                                $met_rate_per_wt = NULL;
                                $met_rate_per_wt_tp = NULL;
                                //
                                parse_str(getTableValues("SELECT met_rate_value, met_rate_per_wt, met_rate_per_wt_tp FROM metal_rates "
                                                       . "WHERE met_rate_metal_name = 'Silver' "
                                                       . "AND met_rate_value = '$productsRow[sttr_metal_rate]' "
                                                       . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                //
                                if ($met_rate_per_wt != '' && $met_rate_per_wt_tp != '') {
                                    if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '1') {
                                        $purSilverMetalRate = $productsRow['sttr_metal_rate'];
                                    } else if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '10') {
                                        $purSilverMetalRate = $productsRow['sttr_metal_rate'] / 10;
                                    } else if ($met_rate_per_wt_tp == 'KG' && $met_rate_per_wt == '1') {
                                        $purSilverMetalRate = $productsRow['sttr_metal_rate'] / 1000;
                                    }
                                }
                                //
                            }
                            //
                            //
                        }
                        //
                        //
                        $purSilverVal += ($purSilverMetalRate * $productsRow[sttr_fine_weight]);
                        //
                        //
                        if ($sellAccountingEntry == 'byGrossWt') {
                            $stockSilverVal += ($purSilverMetalRate * $productsRow['sttr_gs_weight']);
                        } else {
                            $stockSilverVal = $purSilverVal;
                        }
                        //
                        //
                        $paySilverCashAmt += $productsRow['sttr_valuation'];
                        //
                        //
                        if ($productsRow['sttr_transaction_type'] == 'ItemReturn') {
                            $payStockSilverCashAmt += $stockSilverVal;
                        }
                        //
                        //
                    }
                    //
                    if ($sttr_indicator == 'crystal') {
                        $stoneValuation += $productsRow['sttr_final_valuation'];
                    } else {
                        $stoneValuation += $productsRow['sttr_stone_valuation'];
                    }
                    //
                }
                //
                //
                //
                //
                if ($productsRow['sttr_transaction_type'] == 'PURCHASE') { // FOR PURCHASE ENTRIES
                    //
                    //
                    if ($productsRow['sttr_metal_type'] == 'imitation' || $_SESSION['sessionProdName'] == 'OMRETL') {
                        $purStockVal += $productsRow['sttr_valuation'];
                    }
                    //
                    //
                    if ($productsRow['sttr_metal_type'] == 'Gold' || $productsRow['sttr_metal_type'] == 'GOLD' ||
                        $productsRow['sttr_metal_type'] == 'gold') {
                        //
                        //
                        if ($transactionType == 'PURBYSUPP' && $utin_payment_mode == 'NoRateCut') {
                            $purStockVal += $productsRow['sttr_valuation'];
                            $purGoldVal += $productsRow['sttr_valuation'];
                            $payGoldCashAmt += $productsRow['sttr_valuation'];
                        } else {
                            $purGoldVal += $productsRow['sttr_valuation'];
                            $payGoldCashAmt += $productsRow['sttr_valuation'];
                        }
                        //
                        //
                    }
                    //
                    //
                    if ($productsRow['sttr_metal_type'] == 'Silver' || $productsRow['sttr_metal_type'] == 'SILVER' ||
                        $productsRow['sttr_metal_type'] == 'silver') {
                        //
                        //
                        if ($transactionType == 'PURBYSUPP' && $utin_payment_mode == 'NoRateCut') {
                            $purStockVal += $productsRow['sttr_valuation'];
                            $purSilverVal += $productsRow['sttr_valuation'];
                            $paySilverCashAmt += $productsRow['sttr_valuation'];
                        } else {
                            $purSilverVal += $productsRow['sttr_valuation'];
                            $paySilverCashAmt += $productsRow['sttr_valuation'];
                        }
                        //
                        //
                    }
                    //
                    //
                    $stoneValuation += $productsRow['sttr_stone_valuation'];
                    //
                    //
                } 
                else if ($productsRow['sttr_transaction_type'] == 'PURBYSUPP' && $sttr_indicator == 'rawMetal') { // FOR PURCHASE ENTRIES
                    //
                    if ($productsRow['sttr_metal_type'] == 'Gold' || $productsRow['sttr_metal_type'] == 'GOLD' ||
                        $productsRow['sttr_metal_type'] == 'gold') {
                        $purGoldVal += $productsRow['sttr_valuation'];
                        $payGoldCashAmt += $productsRow['sttr_valuation'];
                    }
                    //
                    if ($productsRow['sttr_metal_type'] == 'Silver' || $productsRow['sttr_metal_type'] == 'SILVER' ||
                        $productsRow['sttr_metal_type'] == 'silver') {
                        $purSilverVal += $productsRow['sttr_valuation'];
                        $paySilverCashAmt += $productsRow['sttr_valuation'];
                    }
                }
                //
                if ($productsRow['sttr_transaction_type'] == 'PURBYSUPP' && $sttr_indicator == 'crystal') { // FOR PURCHASE ENTRIES
                    //
                    $stoneValuation += $productsRow['sttr_final_valuation'];
                    //
                }
                //
            }
            // 
            // 
            // 
            // ADDED CODE FOR ASSIGNING GOLD SELL VALUE TO PURCHASE VALUE IF PURCHASE VALUE ID ZERO @AUTHOR:MADHUREE-24APRIL2021
            if (($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || $transactionType == 'ItemReturn') && $purGoldVal <= 0) {
                $purGoldVal = $payGoldCashAmt;
            }
            // 
            // ADDED CODE FOR ASSIGNING SILVER SELL VALUE TO PURCHASE VALUE IF PURCHASE VALUE ID ZERO @AUTHOR:MADHUREE-24APRIL2021         
            if (($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || $transactionType == 'ItemReturn') && $purSilverVal <= 0) {
                $purSilverVal = $paySilverCashAmt;
            }
            //
            //
            //
            //
//            echo 'utin_payment_mode == ' .  $utin_payment_mode . '<br />';
//            echo 'sttr_payment_mode == ' .  $productsRow['sttr_payment_mode'] . '<br />';
//            echo 'sttr_metal_type == ' .  $productsRow['sttr_metal_type'] . '<br />';
//            echo 'sttr_transaction_type == ' . $productsRow['sttr_transaction_type'] . '<br />';
//            echo '$transactionType == ' . $transactionType . '<br />';
//            echo '$purStockVal == ' . $purStockVal . '<br />';
//            echo '$purGoldVal == ' . $purGoldVal . '<br />';
//            echo '$purSilverVal == ' . $purSilverVal . '<br />';
//            echo '$stoneValuation == ' . $stoneValuation . '<br />';
//            echo '$sellStockVal == ' . $sellStockVal . '<br />';
            //
            //
            //
            //
            // PRODUCT GOLD, SILVER AND STOCK & INVENTORY ACCOUNT JOURNAL ENTRIES @AUTHOR-PRIYANKA-23JULY2020
            if ($purStockVal > 0 || $purGoldVal > 0 || $purSilverVal > 0 || $sellStockVal > 0 || 
               ($stoneValuation > 0 && $sttr_indicator == 'crystal')) {
                //
                //
                //
                // SET PREVIOUS ENTRY ACCOUNT ID'S TO NULL @AUTHOR-PRIYANKA-23JULY2020
                $payGoldAccId = NULL;
                $paySilverAccId = NULL;
                $puchaseGoldAccId = NULL;
                $puchaseSilverAccId = NULL;
                $saleGoldAccId = NULL;
                $saleSilverAccId = NULL;
                $payStockInvAccId = NULL;
                $payCashAccId = NULL;
                $payChequeAccId = NULL;
                $payCardAccId = NULL;
                $payOnlinePayAccId = NULL;
                $payDiscountAccId = NULL;
                $payAddtionalChargesAccId = NULL;
                $payCourierAccId = NULL;
                $payCGSTAccId = NULL;
                $paySGSTAccId = NULL;
                $payIGSTAccId = NULL;
                $payTaxAccId = NULL;
                $CGSTAccId = NULL;
                $SGSTAccId = NULL;
                $IGSTAccId = NULL;
                $CGSTAccName = NULL;
                $SGSTAccName = NULL;
                $IGSTAccName = NULL;
                $cashAccId = NULL;
                $cashAccName = NULL;
                $userAccId = NULL;
                $user_acc_id = NULL;
                $payTotOthChgs = 0;
                $payTotHallmarkChgs = 0;
                $udhaarCashRecAmount = 0;
                $payTotalAmtBal = 0;
                $payCashAmt = 0;
                $payChequeAmt = 0;
                $payCardAmt = 0;
                $payCardTransChgsAmt = 0;
                $payOnlinePayAmt = 0;
                $lpRedeem = 0;
                $payDiscountAmt = 0;
                $payAdditionalChargsAmt = 0;
                $payCourierAmt = 0;
                $payInterestAmt = 0;
                $payRoundOffAmt = 0;
                $payTaxAmt = 0;
                //
                //
                //
                // SET TAXES TO ZERO FOR SELL ENRIES @AUTHOR-PRIYANKA-23JULY2020
                if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || $transactionType == 'ItemReturn' || $transactionType == 'PURBYSUPP') { // FOR SELL ENTRIES @AUTHOR-PRIYANKA-23JULY2020                   
                    $payCGSTaxAmt = 0; // CGST
                    $paySGSTaxAmt = 0; // SGST
                    $payIGSTaxAmt = 0; // IGST
                }
                //
                //
                //
                // CALCULATE PRODUCT VALUATION FOR PURCHASE ENTRIES @AUTHOR-PRIYANKA-23JULY2020
                if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL' || $transactionType == 'ItemReturn' || $transactionType == 'PURBYSUPP') { // FOR PURCHASE ENTRIES @AUTHOR-PRIYANKA-23JULY2020
                    //
                    if ($purStockVal > 0) { // PURCHASE STOCK VALUATION @AUTHOR-PRIYANKA-23JULY2020
                        $purStockVal = $purStockVal + $payCGSTaxAmt + $paySGSTaxAmt + $payIGSTaxAmt;
                    }
                    //
                    if ($sellStockVal > 0) { // SELL STOCK VALUATION @AUTHOR-PRIYANKA-23JULY2020
                        $sellStockVal = $sellStockVal + $payCGSTaxAmt + $paySGSTaxAmt + $payIGSTaxAmt;
                    }
                    //
                    if ($purGoldVal > 0) { // GOLD PRODUCT VALUATION @AUTHOR-PRIYANKA-23JULY2020
                        $purGoldVal = $purGoldVal + $payCGSTaxAmt + $paySGSTaxAmt + $payIGSTaxAmt;
                    }
                    if ($purSilverVal > 0) { // SILVER PRODUCT VALUATION @AUTHOR-PRIYANKA-23JULY2020
                        $purSilverVal = $purSilverVal + $payCGSTaxAmt + $paySGSTaxAmt + $payIGSTaxAmt;
                    }
                    //
                }
                //
                //
                //echo '$purStockVal == ' . $purStockVal . '<br />';
                //echo '$sellStockVal == ' . $sellStockVal . '<br />';
                //echo '$purGoldVal == ' . $purGoldVal . '<br />';
                //echo '$purSilverVal == ' . $purSilverVal . '<br />';
                //
                //
                if ($purStockVal > 0 || $sellStockVal > 0) { // FOR STOCK & INVENTORY ACCOUNT JOURNAL ENTRIES @AUTHOR-PRIYANKA-29JAN2021
                    //
                    if ($utinType == 'imitation' || $_SESSION['sessionProdName'] == 'OMRETL') {
                        //
                        //echo '$transactionType == ' . $transactionType . '<br />';
                        //
                        $accId = NULL;
                        $acc_id = NULL;
                        //
                        //echo '$accId == ' . $accId . '<br />';
                        //
                        $metalType = 'Imitation'; // TYPE @AUTHOR-PRIYANKA-29JAN2021
                        //
                        if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
                            $payFinalPayableAmt = $payCashAmt = $sellStockVal; // SELL VALUATION @AUTHOR-PRIYANKA-29JAN2021
                        } else {
                            $payFinalPayableAmt = $payCashAmt = $purStockVal; // PURCHASE VALUATION @AUTHOR-PRIYANKA-29JAN2021
                        }
                        //
                        //echo  '$payFinalPayableAmt == ' . $payFinalPayableAmt . '<br />';
                        //echo  '$payCashAmt == ' . $payCashAmt . '<br />';
                        //
                        if ($transactionType == 'PURBYSUPP') {
                            //
                            $accId = NULL;
                            $acc_id = NULL;
                            $jrnlTransAccId = NULL;
                            $jrnlTransDesc = NULL;
                            $sundryDebAccId = NULL;
                            $sundryDebAccName = NULL;
                            //
                            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                            . "and acc_firm_id = '$firmId' and acc_user_acc = 'Purchase Accounts'"));
                            //
                            $accId = $acc_id;
                            //
                            //echo '$accId @=@=@ ' . $accId . '<br />';
                            //
                        } else if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
                            //
                            $accId = NULL;
                            $acc_id = NULL;
                            $jrnlTransAccId = NULL;
                            $jrnlTransDesc = NULL;
                            $sundryDebAccId = NULL;
                            $sundryDebAccName = NULL;
                            //
                            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                            . "and acc_firm_id = '$firmId' and acc_user_acc = 'Sales Accounts'"));
                            //
                            $accId = $acc_id;
                            //
                        } else {
                            //
                            $accId = NULL;
                            $acc_id = NULL;
                            //
                            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                            . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock (Inventory)'"));
                            //
                            $accId = $acc_id;
                            //                            
                        }
                        //
                        //echo '$accId @==@ ' . $accId . '<br />';
                        //    
                        $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @AUTHOR-PRIYANKA-29JAN2021
                        //
                        $transApiType = 'insert';
                        $transactionType = $transactionType;
                        include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-29JAN2021
                        //
                    } else {
                        //
                        //
                        //
                        //
//                        echo 'utin_payment_mode == ' .  $utin_payment_mode . '<br />';
//                        echo '$metalType == ' .  $metalType . '<br />';
//                        echo '$transactionType == ' . $transactionType . '<br />';
//                        echo '$purStockVal == ' . $purStockVal . '<br />';
//                        echo '$purGoldVal == ' . $purGoldVal . '<br />';
//                        echo '$purSilverVal == ' . $purSilverVal . '<br />';
//                        echo '$stoneValuation == ' . $stoneValuation . '<br />';
//                        echo '$sellStockVal == ' . $sellStockVal . '<br />';
                        //
                        //
                        //
                        //
                        $accId = NULL;
                        $acc_id = NULL;
                        //
                        //
                        if ($transactionType == 'PURBYSUPP' && $utin_payment_mode == 'NoRateCut') {
                            //
                            //
                            if ($metalType == 'Gold' || $metalType == 'GOLD' || $metalType == 'gold') {
                                //
                                //
                                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                                       . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock Gold'"));
                                //
                                $accId = $acc_id;
                                //
                                $userId = '';
                                $operation = 'insert';
                                $metalType = 'Gold';
                                $sttr_item_ent_type = 'AddInStock';
                                $operation = 'insert';
                                //
                                $mainProdTransType = $transactionType;
                                //
                                $transType = 'EXISTING';
                                $payFinalPayableAmt = $purGoldVal;
                                include 'omusrtranjrnlstockinvacc.php';
                                //
                                $purGoldVal = 0;
                                //
                                $transactionType = $mainProdTransType;
                                //
                                //
                            } else if ($metalType == 'Silver' || $metalType == 'SILVER' || $metalType == 'silver') {
                                //
                                //
                                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                                       . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock Silver'"));
                                //
                                $accId = $acc_id;
                                //
                                $userId = '';
                                $operation = 'insert';
                                $metalType = 'Silver';
                                $sttr_item_ent_type = 'AddInStock';
                                $operation = 'insert';
                                //
                                $mainProdTransType = $transactionType;
                                //
                                $transType = 'EXISTING';
                                $payFinalPayableAmt = $purSilverVal;
                                include 'omusrtranjrnlstockinvacc.php';
                                //
                                $purSilverVal = 0;
                                //
                                $transactionType = $mainProdTransType;
                                //
                                //
                            } else {
                                //
                                //
                                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                                       . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock (Inventory)'"));
                                //
                                $accId = $acc_id;
                                //
                                $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @AUTHOR-PRIYANKA-23JULY2020
                                $transApiType = 'insert';
                                $transactionType = $transactionType;
                                include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-23JULY2020
                                //
                                //
                            }
                            //
                            //
                        } else {
                            //
                            //
                            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                                   . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock (Inventory)'"));
                            // 
                            //
                            $accId = $acc_id;
                            //
                            $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @AUTHOR-PRIYANKA-23JULY2020
                            $transApiType = 'insert';
                            $transactionType = $transactionType;
                            include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-23JULY2020
                            //
                        }
                        //
                        //                        
                    }
                }
                //
                //
                //
                //
//                echo 'utin_payment_mode 2== ' .  $utin_payment_mode . '<br />';
//                echo 'sttr_payment_mode 2== ' .  $productsRow['sttr_payment_mode'] . '<br />';
//                echo 'sttr_metal_type 2== ' .  $productsRow['sttr_metal_type'] . '<br />';
//                echo 'sttr_transaction_type 2== ' . $productsRow['sttr_transaction_type'] . '<br />';
//                echo '$transactionType 2== ' . $transactionType . '<br />';
//                echo '$purStockVal 2== ' . $purStockVal . '<br />';
//                echo '$purGoldVal 2== ' . $purGoldVal . '<br />';
//                echo '$payStockGoldCashAmt 2== ' . $payStockGoldCashAmt . '<br />';               
//                echo '$purSilverVal 2== ' . $purSilverVal . '<br />';
//                echo '$payStockSilverCashAmt 2== ' . $payStockSilverCashAmt . '<br />';
//                echo '$stoneValuation 2== ' . $stoneValuation . '<br />';
//                echo '$sellStockVal 2== ' . $sellStockVal . '<br />';     
//                echo '============================================================= ' . '<br />';     
                //
                //
                //
                //
                if ($purGoldVal > 0) { // FOR GOLD STOCK ACCOUNT JOURNAL ENTRIES @AUTHOR-PRIYANKA-23JULY2020
                    //
                    $metalType = 'Gold'; // TYPE @AUTHOR-PRIYANKA-23JULY2020
                    $payFinalPayableAmt = $payCashAmt = $purGoldVal; // PRODUCT VALUATION @AUTHOR-PRIYANKA-23JULY2020
                    //
                    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                           . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock Gold'"));
                    $payGoldAccId = $acc_id;
                    //
                    // ========================================================================================================================== //
                    // START CODE TO GET GOLD SELL-PUCHASE ACCOUNT DETAIL FOR SELL-PURCHASE GOLD ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
                    // ========================================================================================================================== //
                    //
                    if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Sales Gold'"));
                        $saleGoldAccId = $acc_id;
                    } 
                    else if ($transactionType == 'ItemReturn') {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Sales Gold'"));
                        $puchaseGoldAccId = $acc_id;
                    }
                    else {
                        if ($sttr_indicator == 'rawMetal') {
                            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                                   . "acc_firm_id='$firmId' and acc_user_acc='Purchase RAW Gold'"));
                            $puchaseGoldAccId = $acc_id;
                        } else {
                            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                                   . "acc_firm_id='$firmId' and acc_user_acc='Purchase Gold'"));
                            $puchaseGoldAccId = $acc_id;
                        }
                    }
                    //
                    // ======================================================================================================================== //
                    // END CODE TO GET GOLD SELL-PUCHASE ACCOUNT DETAIL FOR SELL-PURCHASE GOLD ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
                    // ======================================================================================================================== //
                    //
                    $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @AUTHOR-PRIYANKA-23JULY2020
                    $transApiType = 'insert';
                    $transactionType = $transactionType;
                    include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-23JULY2020
                    //
                }
                //
                //
                if ($purSilverVal > 0) { // FOR SILVER STOCK ACCOUNT JOURNAL ENTRIES @AUTHOR-PRIYANKA-23JULY2020
                    //
                    $metalType = 'Silver'; // TYPE @AUTHOR-PRIYANKA-23JULY2020
                    $payFinalPayableAmt = $payCashAmt = $purSilverVal; // PRODUCT VALUATION @AUTHOR-PRIYANKA-23JULY2020
                    //
                    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' "
                                    . "and acc_firm_id = '$firmId' and acc_user_acc = 'Stock Silver'"));
                    $paySilverAccId = $acc_id;
                    //
                    // ============================================================================================================================== //
                    // START CODE TO GET SILVER SELL-PUCHASE ACCOUNT DETAIL FOR SELL-PURCHASE SILVER ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
                    // ============================================================================================================================== //
                    //
                    if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Sales Silver'"));
                        $saleSilverAccId = $acc_id;
                    } 
                    else if ($transactionType == 'ItemReturn') {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Sales Silver'"));
                        $puchaseSilverAccId = $acc_id;
                    }
                    else {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Purchase Silver'"));
                        $puchaseSilverAccId = $acc_id;
                    }
                    //
                    // ============================================================================================================================ //
                    // END CODE TO GET SILVER SELL-PUCHASE ACCOUNT DETAIL FOR SELL-PURCHASE SILVER ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
                    // ============================================================================================================================ //
                    //
                    $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @AUTHOR-PRIYANKA-23JULY2020
                    $transApiType = 'insert';
                    $transactionType = $transactionType;
                    include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-PRIYANKA-23JULY2020
                    //
                }
                //
                //
                //
                //
                // =================================================================================================== //
                // START CODE TO GET STONE ACCOUNT DETAILS FOR SALES STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
                // =================================================================================================== //
                //
                if ($stoneValuation > 0) {
                    //
                    $goldValuation = 0;
                    $sellGoldValuation = 0;
                    $silverValuation = 0;
                    $sellSilverValuation = 0;
                    //
                    $metalType = 'stockCrystal'; // METAL TYPE - GOLD @AUTHOR:MADHUREE-07AUGUST2021
                    $payFinalPayableAmt = $payCashAmt = $stoneValuation;
                    $payStoneCashAmt = $stoneValuation;
                    //
                    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                           . "acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
                    $payStoneAccId = $acc_id;
                    $payGoldAccId = '';
                    $paySilverAccId = '';
                    //
                    if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Sales Stone'"));
                        $saleStoneAccId = $acc_id;
                        $saleGoldAccId = '';
                        $saleSilverAccId = '';
                        $jrtrGoldSilverStockInvDesc = NULL;
                        $jrtrGoldSilverSaleDesc = NULL;
                    } 
                    else if ($transactionType == 'ItemReturn') {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Sales Stone'"));
                        $puchaseStoneAccId = $acc_id;
                        $puchaseGoldAccId = '';
                        $puchaseSilverAccId = '';
                        $jrtrGoldSilverStockInvDesc = NULL;
                        $jrtrGoldSilverPurchaseDesc = NULL;
                    }
                    else {
                        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                               . "acc_firm_id='$firmId' and acc_user_acc='Purchase Stone'"));
                        $puchaseStoneAccId = $acc_id;
                        $puchaseGoldAccId = '';
                        $puchaseSilverAccId = '';
                        $jrtrGoldSilverStockInvDesc = NULL;
                        $jrtrGoldSilverPurchaseDesc = NULL;
                    }
                    //
                    $stockAccountEntry = 'No';
                    $transApiType = 'insert';
                    $transactionType = $transactionType;
                    include 'omusrtranjrnl.php';
                    //
                }
                //
                // ================================================================================================= //
                // END CODE TO GET STONE ACCOUNT DETAILS FOR SALES STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
                // ================================================================================================= //
                //
            }
            //
            //
            //
            //
            // =================================================================================================== //
            // START CODE TO CREATE JOURNAL TRANS ENTRY FOR SETTLED AMT IN SELL INVOICE @AUTHOR:MADHUREE-28OCT2020 //
            // =================================================================================================== //
            //
            if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
                //
                $qSelUserTransSettledEntryDetails = "SELECT * FROM user_transaction_invoice WHERE utin_amt_settled_inv_id='$utin_id'";
                //
                $resSelUserTransSettledEntryDetails = mysqli_query($conn, $qSelUserTransSettledEntryDetails);
                while ($rowUserTransSettledEntryDetailsCount = mysqli_fetch_array($resSelUserTransSettledEntryDetails)) {
                    //
                    $payGoldAccId = NULL;
                    $paySilverAccId = NULL;
                    $puchaseGoldAccId = NULL;
                    $puchaseSilverAccId = NULL;
                    $saleGoldAccId = NULL;
                    $saleSilverAccId = NULL;
                    $payStockInvAccId = NULL;
                    $payCashAccId = NULL;
                    $payChequeAccId = NULL;
                    $payCardAccId = NULL;
                    $payOnlinePayAccId = NULL;
                    $payDiscountAccId = NULL;
                    $payAddtionalChargesAccId = NULL;
                    $payCourierAccId = NULL;
                    $payCGSTAccId = NULL;
                    $paySGSTAccId = NULL;
                    $payIGSTAccId = NULL;
                    $CGSTAccId = NULL;
                    $SGSTAccId = NULL;
                    $IGSTAccId = NULL;
                    $CGSTAccName = NULL;
                    $SGSTAccName = NULL;
                    $IGSTAccName = NULL;
                    $cashAccId = NULL;
                    $cashAccName = NULL;
                    $userAccId = NULL;
                    $user_acc_id = NULL;
                    $jrtrGoldSilverSaleDesc = NULL;
                    $jrtrGoldSilverPurchaseDesc = NULL;
                    $jrtrGoldSilverStockInvDesc = NULL;
                    $jrtrSettledEntryDesc = NULL;
                    $payTaxAccId = NULL;
                    $payTotOthChgs = 0;
                    $payTotHallmarkChgs = 0;
                    $udhaarCashRecAmount = 0;
                    $payTotalAmtBal = 0;
                    $payCashAmt = 0;
                    $payChequeAmt = 0;
                    $payCardAmt = 0;
                    $payCardTransChgsAmt = 0;
                    $payOnlinePayAmt = 0;
                    $lpRedeem = 0;
                    $payDiscountAmt = 0;
                    $payAdditionalChargsAmt = 0;
                    $payCourierAmt = 0;
                    $payInterestAmt = 0;
                    $payRoundOffAmt = 0;
                    $payTaxAmt = 0;
                    //
                    $utin_transaction_type = $rowUserTransSettledEntryDetailsCount['utin_transaction_type'];
                    $utin_type = $rowUserTransSettledEntryDetailsCount['utin_type'];
                    $utin_cash_balance = $rowUserTransSettledEntryDetailsCount['utin_cash_balance'];
                    //
                    if (($utin_cash_balance != 0) && ($utin_type == 'MONEY' || $utin_type == 'OnPurchase' || $utin_type == 'udhaar ') && ($utin_transaction_type == 'ADV MONEY' || $utin_transaction_type == 'DEPOSIT' || $utin_transaction_type == 'UDHAAR')) {
                        //
                        $paySettledAmt = abs($utin_cash_balance);
                        //
                        parse_str(getTableValues("SELECT user_fname,user_type FROM user WHERE user_owner_id='$sessionOwnerId' AND user_id='$userId'"));
                        //
                        if (($utin_type == 'MONEY' && $utin_transaction_type == 'ADV MONEY') || ($utin_type == 'OnPurchase' && $utin_transaction_type == 'DEPOSIT')) {
                            $paySettledCRDR = 'DR';
                            //
                            parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                                   . "acc_firm_id='$firmId' and acc_id='$utin_dr_acc_id'"));
                        } else if (($utin_type == 'udhaar ' && $utin_transaction_type == 'UDHAAR') || ($utin_type == 'OnPurchase' && $utin_transaction_type == 'UDHAAR')) {
                            $paySettledCRDR = 'CR';
                            //
                            parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                                   . "acc_firm_id='$firmId' and acc_id='$utin_cr_acc_id'"));
                        }
                        //
                        $paySettledAccId = $acc_id;
                        $paySettledAccDesc = $acc_user_acc . ' (' . $userName . ')';
                        if ($utin_type == 'MONEY' && $utin_transaction_type == 'ADV MONEY') {
                            $paySettledDesc = 'ADVANCE MONEY';
                        } else if ($utin_type == 'OnPurchase' && $utin_transaction_type == 'DEPOSIT') {
                            $paySettledDesc = 'SCHEME ADV MONEY';
                        } else if ($utin_type == 'udhaar ' && $utin_transaction_type == 'UDHAAR') {
                            $paySettledDesc = 'UDHAAR';
                        } else if ($utin_type == 'OnPurchase' && $utin_transaction_type == 'UDHAAR') {
                            $paySettledDesc = 'UDHAAR';
                        }
                        //
                        $stockAccountEntry = 'No';
                        $transApiType = 'insert';
                        $transactionType = 'sell';
                        //
                        include 'omusrtranjrnl.php'; // CREATE SETTLED AMT JRNL ENTRY @AUTHOR:MADHUREE-18OCT2020
                        //
                    }
                }
            }
            //
            // ================================================================================================= //
            // END CODE TO CREATE JOURNAL TRANS ENTRY FOR SETTLED AMT IN SELL INVOICE @AUTHOR:MADHUREE-28OCT2020 //
            // ================================================================================================= //
            //
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END OF ADD CODE FOR TO RECREATE (GOLD, SILVER AND STOCK & INVENTRORY ACCOUNTS) 
        // JOURNAL ENTRIES @AUTHOR-PRIYANKA-23JULY2020
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
    }
}
// ===================================================================================================================== //
// START CODE TO RECREATE THE SCHEME MONEY DEPOSITE JOURNAL ENTRIES ACCORDING TO PAYMENT MODE @AUTHOR:MADHUREE-27OCT2020 //
// ===================================================================================================================== //
//
$querySchemeDetails = "SELECT * FROM kitty_money_deposit WHERE kitty_mondep_own_id = '$sessionOwnerId' "
                    . "AND kitty_mondep_EMI_status = 'Paid' and kitty_paid_amt !=0 order by kitty_mondep_id ASC";
//
//echo '$querySchemeDetails == ' . $querySchemeDetails . '<br />';
//
$resSchemeDetails = mysqli_query($conn, $querySchemeDetails);
//
$noOfSchemeDetails = mysqli_num_rows($resSchemeDetails);
//
if ($noOfSchemeDetails > 0) {
    //
    $purGoldVal = 0;
    $purSilverVal = 0;
    $payGoldCashAmt = 0;
    $payStockGoldCashAmt = 0;
    $paySilverCashAmt = 0;
    $payStockSilverCashAmt = 0;
    $purStockVal = 0;
    $payFinalPayableAmt = 0;
    $payCashAmt = 0;
    $payChequeAmt = 0;
    $payTotOthChgs = 0;
    $payTotHallmarkChgs = 0;
    $payTotalAmtBal = 0;
    $payCardAmt = 0;
    $payCardTransChgsAmt = 0;
    $payOnlinePayAmt = 0;
    $lpRedeem = 0;
    $payDiscountAmt = 0;
    $payAdditionalChargsAmt = 0;
    $payCourierAmt = 0;
    $payInterestAmt = 0;
    $payRoundOffAmt = 0;
    $payTaxAmt = 0;
    $payGoldAccId = NULL;
    $paySilverAccId = NULL;
    $puchaseGoldAccId = NULL;
    $puchaseSilverAccId = NULL;
    $saleGoldAccId = NULL;
    $saleSilverAccId = NULL;
    $payStockInvAccId = NULL;
    $userAccId = NULL;
    $paySettledAccId = NULL;
    $payCashAccId = NULL;
    $payChequeAccId = NULL;
    $payCardAccId = NULL;
    $payOnlinePayAccId = NULL;
    $payDiscountAccId = NULL;
    $payAddtionalChargesAccId = NULL;
    $payCourierAccId = NULL;
    $payCGSTAccId = NULL;
    $paySGSTAccId = NULL;
    $payIGSTAccId = NULL;
    $CGSTAccId = NULL;
    $SGSTAccId = NULL;
    $IGSTAccId = NULL;
    $CGSTAccName = NULL;
    $SGSTAccName = NULL;
    $IGSTAccName = NULL;
    $cashAccId = NULL;
    $cashAccName = NULL;
    $accDRName = NULL;
    $accCRName = NULL;
    $utin_cr_acc_id = NULL;
    $utin_dr_acc_id = NULL;
    $acc_id = NULL;
    $payTaxAccId = NULL;
    $jrtrGoldSilverSaleDesc = NULL;
    $jrtrGoldSilverPurchaseDesc = NULL;
    $jrtrGoldSilverStockInvDesc = NULL;
    $jrtrSettledEntryDesc = NULL;
    //
    while ($rowSchemeDetails = mysqli_fetch_array($resSchemeDetails)) {
        //
        $schemeId = $rowSchemeDetails['kitty_mondep_id'];
        $schemePaymentMode = $rowSchemeDetails['kitty_pay_mode'];
        $schemeUtinId = $rowSchemeDetails['kitty_mondep_utin_id'];
        $schemeUserId = $rowSchemeDetails['kitty_mondep_cust_id'];
        $schemeFirmId = $rowSchemeDetails['kitty_mondep_firm_id'];
        $schemePaidAmt = $rowSchemeDetails['kitty_paid_amt'];
        //
        //$schemePaidDate = $rowSchemeDetails['kitty_mondep_date'];
        //
        // Added code for Scheme Deposit - EMI PAID DATE @AUTHOR:PRIYANKA-23FEB2023
        $schemePaidDate = $rowSchemeDetails['kitty_mondep_EMI_paid_date'];        
        //
        parse_str(getTableValues("SELECT * FROM user WHERE user_id='$schemeUserId'"));
        //
        //echo '$schemeId == ' . $schemeId . '<br />';
        //echo '$schemePaymentMode == ' . $schemePaymentMode . '<br />';
        //echo '$schemeUserId == ' . $schemeUserId . '<br />';
        //echo '$schemeFirmId == ' . $schemeFirmId . '<br />';
        //echo '$schemePaidAmt == ' . $schemePaidAmt . '<br />';
        //echo '$schemePaidDate == ' . $schemePaidDate . '<br />';
        //
        if ($schemePaymentMode != 'Cash' && $schemeUtinId != NULL && $schemeUtinId != '') {
            //
            parse_str(getTableValues("SELECT * FROM user_transaction_invoice WHERE utin_id='$schemeUtinId'"));
            //
            $payCashAccId = $utin_pay_cash_acc_id;
            $payChequeAccId = $utin_pay_cheque_acc_id;
            $payCardAccId = $utin_pay_card_acc_id;
            $payOnlinePayAccId = $utin_online_pay_acc_id;
            $payCashAmt = $utin_cash_amt_rec;
            $payChequeAmt = $utin_pay_cheque_amt;
            $payCardAmt = $utin_pay_card_amt;
            $payOnlinePayAmt = $utin_online_pay_amt;
            //
            $accCRName = 'Saving Scheme';
            //
            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$schemeFirmId' and acc_user_acc='$accCRName'"));
            //
            $utin_cr_acc_id = $acc_id;
            //  
            $accId = $acc_id;
            //
            $transApiType = 'insert';
            $transactionType = 'scheme';
            $utinType = 'scheme';
            $userId = $schemeUserId;
            $userType = $user_type;
            $userName = $user_fname . ' ' . $user_lname;
            $transId = $utin_id;
            $firmId = $schemeFirmId;
            $payFinalPayableAmt = $schemePaidAmt;
            $payAddDate = $schemePaidDate;
            //
        } else {
            //
            $accDRName = 'Cash in Hand';
            //
            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$schemeFirmId' and acc_user_acc='$accDRName'"));
            //
            $utin_dr_acc_id = $acc_id;
            //   
            $accCRName = 'Saving Scheme';
            //
            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$ownerId' and acc_firm_id='$schemeFirmId' and acc_user_acc='$accCRName'"));
            //
            $utin_cr_acc_id = $acc_id;
            //  
            $accId = $acc_id;
            //
            $transApiType = 'insert';
            $transactionType = 'scheme';
            $utinType = 'scheme';
            $userId = $schemeUserId;
            $userType = $user_type;
            $userName = $user_fname . ' ' . $user_lname;
            $transId = '';
            $firmId = $schemeFirmId;
            $payFinalPayableAmt = $schemePaidAmt;
            $payAddDate = $schemePaidDate;
            $payCashAmt = $schemePaidAmt;
            $payCashAccId = $utin_dr_acc_id;
            //
        }
        //
        include 'omusrtranjrnl.php'; // CREATE JOURNAL ENTRIES FILE @AUTHOR-MADHUREE-28OCT2020
        //
        if ($jrnlId != '' && $jrnlId != NULL) {
            //
            $newJrnlId = $jrnlId;
            //
            $qUpdateSchemeJrnlId = "UPDATE kitty_money_deposit SET kitty_mondep_jrnlid = '$newJrnlId' WHERE kitty_mondep_id = '$schemeId'";
            //
            //echo '$qUpdateSchemeJrnlId == ' . $qUpdateSchemeJrnlId . '<br />';
            //
            if (!mysqli_query($conn, $qUpdateSchemeJrnlId)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
    }
}
// =================================================================================================================== //
// END CODE TO RECREATE THE SCHEME MONEY DEPOSITE JOURNAL ENTRIES ACCORDING TO PAYMENT MODE @AUTHOR:MADHUREE-27OCT2020 //
// =================================================================================================================== //
//
// ===================================================================================================== //
// START CODE TO RECREATE THE THE CUSTOMER OPENING BALANCE JOURNAL ENTRIES @AUTHOR:MADHUREE-21AUGUST2020 //
// ===================================================================================================== //
//
$queryOpeningBalances = "SELECT * FROM user_transaction_invoice WHERE utin_status!='Deleted' "
        . "and utin_type IN ('udhaar','MONEY') and utin_other_info='OPENING BALANCE' "
        . "and utin_transaction_type IN ('UDHAAR','ADV MONEY') ORDER BY utin_id ASC";
//
$resOpeningBalances = mysqli_query($conn, $queryOpeningBalances);
//
$noOfOpeningBalances = mysqli_num_rows($resOpeningBalances);
if ($noOfOpeningBalances > 0) {
//
    $purGoldVal = 0;
    $purSilverVal = 0;
    $payGoldCashAmt = 0;
    $payStockGoldCashAmt = 0;
    $paySilverCashAmt = 0;
    $payStockSilverCashAmt = 0;
    $purStockVal = 0;
    $payFinalPayableAmt = 0;
    $payCashAmt = 0;
    $payChequeAmt = 0;
    $payTotOthChgs = 0;
    $payTotHallmarkChgs = 0;
    $payTotalAmtBal = 0;
    $payCardAmt = 0;
    $payTaxAmt = 0;
    $payCardTransChgsAmt = 0;
    $payOnlinePayAmt = 0;
    $lpRedeem = 0;
    $payDiscountAmt = 0;
    $payAdditionalChargsAmt = 0;
    $payCourierAmt = 0;
    $payInterestAmt = 0;
    $payRoundOffAmt = 0;
    $payGoldAccId = NULL;
    $paySilverAccId = NULL;
    $puchaseGoldAccId = NULL;
    $puchaseSilverAccId = NULL;
    $saleGoldAccId = NULL;
    $saleSilverAccId = NULL;
    $payStockInvAccId = NULL;
    $userAccId = NULL;
    $paySettledAccId = NULL;
    $payCashAccId = NULL;
    $payChequeAccId = NULL;
    $payCardAccId = NULL;
    $payOnlinePayAccId = NULL;
    $payDiscountAccId = NULL;
    $payAddtionalChargesAccId = NULL;
    $payCourierAccId = NULL;
    $payCGSTAccId = NULL;
    $paySGSTAccId = NULL;
    $payIGSTAccId = NULL;
    $CGSTAccId = NULL;
    $SGSTAccId = NULL;
    $IGSTAccId = NULL;
    $CGSTAccName = NULL;
    $SGSTAccName = NULL;
    $IGSTAccName = NULL;
    $cashAccId = NULL;
    $cashAccName = NULL;
    $accDRName = NULL;
    $accCRName = NULL;
    $utin_cr_acc_id = NULL;
    $utin_dr_acc_id = NULL;
    $acc_id = NULL;
    $jrtrGoldSilverSaleDesc = NULL;
    $jrtrGoldSilverPurchaseDesc = NULL;
    $jrtrGoldSilverStockInvDesc = NULL;
    $jrtrSettledEntryDesc = NULL;
    $payTaxAccId = NULL;
    //
    while ($rowOpeningBalances = mysqli_fetch_array($resOpeningBalances)) {
        $utin_id = $rowOpeningBalances['utin_id'];
        $utin_cr_acc_id = $rowOpeningBalances['utin_cr_acc_id'];
        $utin_dr_acc_id = $rowOpeningBalances['utin_dr_acc_id'];
        $utin_cash_CRDR = $rowOpeningBalances['utin_cash_CRDR'];
        $userId = $rowOpeningBalances['utin_user_id'];
        $firmId = $rowOpeningBalances['utin_firm_id'];
        $ownerId = $rowOpeningBalances['utin_owner_id'];
        $utin_cash_balance = $rowOpeningBalances['utin_cash_balance'];
        $openingDate = $rowOpeningBalances['utin_date'];
        //
        if ($utin_cash_balance <> 0 && $utin_cr_acc_id != '' && $utin_dr_acc_id != '' && $userId != '') {
            $payFinalPayableAmt = abs($utin_cash_balance);
            $payCashAmt = abs($utin_cash_balance);
            $payTotalAmtBal = 0;
            if ($utin_cash_CRDR == 'CR') {
                $userAccId = $utin_cr_acc_id;
                parse_str(getTableValues("SELECT acc_user_acc FROM accounts "
                                . "WHERE acc_own_id='$ownerId' and "
                                . "acc_firm_id='$firmId' and acc_id='$userAccId'"));
                //
                $jrnlTransDrAccId = '';
                $jrnlTransDrDesc = $acc_user_acc;
                $jrnlTransCrAccId = $userAccId;
                $jrnlTransCrDesc = $acc_user_acc;
            } else {
                $userAccId = $utin_dr_acc_id;
                parse_str(getTableValues("SELECT acc_user_acc FROM accounts "
                                . "WHERE acc_own_id='$ownerId' and "
                                . "acc_firm_id='$firmId' and acc_id='$userAccId'"));
                //
                $jrnlTransCrAccId = '';
                $jrnlTransCrDesc = $acc_user_acc;
                $jrnlTransDrAccId = $userAccId;
                $jrnlTransDrDesc = $acc_user_acc;
            }
            //
            $jrnlDrAmount = $jrnlCrAmount = $payCashAmt;
            //
            $transApiType = 'insert';
            //
            parse_str(getTableValues("SELECT user_fname, user_pid, user_uid FROM user "
                            . "WHERE user_owner_id='$ownerId' and "
                            . "user_id='$userId'"));
            //
            $transactionType = 'OPENING';
            $jrtrTransDesc = $jrnlTransDesc = $user_pid . $user_uid . ' - ' . $user_fname;
            //
            $jrnlOwnId = $ownerId;
            $jrnlUserId = $userId;
            $jrnlUserType = $userType;
            $jrnlTransId = $utin_id;
            $jrnlTransType = $transactionType;
            $jrnlFirmId = $firmId;
            $jrnlTTDr = $jrnlDrAmount;
            $jrnlDrAccId = $jrnlTransDrAccId;
            $jrnlDrDesc = $jrnlTransDrDesc;
            $jrnlTTCr = $jrnlCrAmount;
            $jrnlCrAccId = $jrnlTransCrAccId;
            $jrnlCrDesc = $jrnlTransCrDesc;
            $jrnlDesc = $jrnlTransDesc;
            $jrnlOthInfo = '';
            $jrnlDOB = $openingDate;
            $apiType = $transApiType;
            //
            include 'ommpjrnl.php';
            //
            if ($transApiType == 'insert') {
                $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$jrnlOwnId' "
                        . "order by jrnl_id desc LIMIT 0,1";
                $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
                $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
                $jrnlId = $rowJournalEntry['jrnl_id'];
            }
            //
            $jrtrMainTransCRDR = $utin_cash_CRDR;
            $jrtrTransDrAccId = $jrnlTransDrAccId;
            $jrtrTransDrDesc = $jrnlTransDrDesc;
            $jrtrTransCrAccId = $jrnlTransCrAccId;
            $jrtrTransCrDesc = $jrnlTransCrDesc;
            $jrtrMainDrAmount = $jrtrMainCrAmount = $payCashAmt;
            //
            $jrtrJId = '';
            $jrtrJrnlId = $jrnlId;
            $jrtrOwnId = $ownerId;
            $jrtrUserId = $userId;
            $jrtrUserType = $userType;
            $jrtrTransId = $utin_id;
            $jrtrTransType = $transactionType;
            $jrtrFirmId = $firmId;
            $jrtrTransCRDR = $jrtrMainTransCRDR;
            $jrtrDrAmt = $jrtrMainDrAmount;
            $jrtrDrAccId = $jrtrTransDrAccId;
            $jrtrDrDesc = $jrtrTransDrDesc;
            $jrtrCrAmt = $jrtrMainCrAmount;
            $jrtrCrAccId = $jrtrTransCrAccId;
            $jrtrCrDesc = $jrtrTransCrDesc;
            $jrtrDesc = $jrtrTransDesc;
            $jrtrOthInfo = '';
            $jrtrDOB = $openingDate;
            $custFirstName = '';
            $custLastName = '';
            $apiType = $transApiType;
            //
            include 'ommpjrtr.php';
        }
        //
        if ($jrnlId != '' && $jrnlId != NULL) {
            $qUpdateUtinJrnlId = "UPDATE user_transaction_invoice SET utin_jrnl_id = '$jrnlId' WHERE utin_id = '$utin_id'";
            //
            if (!mysqli_query($conn, $qUpdateUtinJrnlId)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
    }
}
//
// ===================================================================================================== //
// END CODE TO RECREATE THE THE CUSTOMER OPENING BALANCE JOURNAL ENTRIES @AUTHOR:MADHUREE-21AUGUST2020 //
// ===================================================================================================== //
//
?>
