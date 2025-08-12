<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for Purchase List Payment Details @PRIYANKA-20SEP21
 * **********************************************************************************************************************************
 *
 * Created on 20 SEP, 2021 11.15.00 AM
 * 
 * @FileName: omSuppPurchaseListPaymentDetailsImportFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.82
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-20SEP21
 *  REASON:
 *
 */
?>
<?php
//
if (!isset($_SESSION)) {
    session_start();
}
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
//
//
// print_r($_REQUEST);
//
//
// USER ID @PRIYANKA-20SEP21
$userId = $sttr_user_id;
//
//
// FIRM ID @PRIYANKA-20SEP21
$firmId = $sttr_firm_id;
//
//
parse_str(getTableValues("SELECT firm_type FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' and firm_id = '$firmId'"));
//
//
// INVOICE NUMBER @PRIYANKA-20SEP21
$payPreInvoiceNo = $sttr_pre_invoice_no;
$payInvoiceNo = $sttr_invoice_no;
//
//
// FOR CR ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Sundry Debtors';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$utin_cr_acc_id = $acc_id;
//
//
// FOR BANK ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Bank Account';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$bankAccId = $acc_id;
//
//
// FOR CASH IN HAND ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Cash in Hand';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$cashInHandAccId = $acc_id;
//
//
// FOR COURIER CHARGES ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Courier Charges';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$courierChargesAccId = $acc_id;
//
//
// FOR DUTIES AND TAXES ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Duties & Taxes';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$dutiesAndTaxesAccId = $acc_id;
//
//
// FOR LABOUR CHRGS ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Labour Charges';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$labChargesAccId = $acc_id;
//
//
// FOR IGST ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'IGST';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$igstAccId = $acc_id;
//
//
// FOR SGST ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'SGST';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$sgstAccId = $acc_id;
//
//
// FOR CGST ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'CGST';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$cgstAccId = $acc_id;
//
//
// FOR INDIRECT INCOME ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Indirect Incomes';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$indirectIncomeAccId = $acc_id;
//
//
// FOR DISCOUNT RECEIVED ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'Discount Rec';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$discountRecAccId = $acc_id;
//
//
// FOR RAW GOLD ACCOUNT DETAILS @PRIYANKA-20SEP21
$accName = 'RAW Gold';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$_SESSION[sessionOwnerId]' "
                       . "and acc_firm_id = '$sttr_firm_id' and acc_user_acc = '$accName'"));
//
$rawGoldAccId = $acc_id;
//
//
//echo '$sttr_final_valuation == ' . $sttr_final_valuation;
//echo("<br/>"); 
//
//
$whole = intval($sttr_final_valuation); 
$decimalAmount = decimalVal(($sttr_final_valuation - $whole),2);
//
//echo '$decimalAmount == ' . $decimalAmount;
//echo("<br/>"); 
//
//
$roundOffAmount = 0;
$rndOff = 0.5;
if ($decimalAmount > 0) {
    //
    //echo '$sttr_final_valuation == ' . $sttr_final_valuation;
    //echo("<br/>"); 
    //
    $roundOffAmount = $decimalAmount;
    //
    //echo '$roundOffAmount == ' . $roundOffAmount;
    //echo("<br/>"); 
    //
    if ($roundOffAmount > $rndOff) {
        //
        $rndOffAmount = (1 - $roundOffAmount);
        //
        // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-21-SEP-21
           $PayRoundOffDisplay = '+ ' . decimalVal($rndOffAmount,2);
        // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-21-SEP-21
        //
        $PayRoundOffDisp = decimalVal($rndOffAmount,2);
        $PayRoundOffAmt = decimalVal($roundOffAmount,2);
        //
        //
    } else {
        //
        // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-21-SEP-21
           $PayRoundOffDisplay =  '- ' . decimalVal($roundOffAmount,2);
        // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-21-SEP-21
        //
        $PayRoundOffDisp = decimalVal($roundOffAmount,2);
        $PayRoundOffAmt = decimalVal($roundOffAmount,2);
        //
        //
    }
    //
    //echo '$PayRoundOffDisplay == ' . $PayRoundOffDisplay;
    //echo("<br/>"); 
    //echo '$PayRoundOffDisp == ' . $PayRoundOffDisp;
    //echo("<br/>"); 
    //echo '$PayRoundOffAmt == ' . $PayRoundOffAmt;
    //echo("<br/>"); 
    //
    $sttr_final_valuation = decimalVal(round($sttr_final_valuation),2);
    //
    //echo '$sttr_final_valuation @==@ ' . $sttr_final_valuation;
    //echo("<br/>"); 
    //
} 
else if ($decimalAmount == 0 || $decimalAmount == '0.00') {
    ///
    // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-21-SEP-21
       $PayRoundOffDisplay = decimalVal($roundOffAmount,2);
    // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-21-SEP-21
    //
    // START CODE FOR ROUND OFF TOTAL AMT STORE IN DATABASE @PRIYANKA-21-SEP-21
       $PayRoundOffDisp = decimalVal($roundOffAmount,2);
       $PayRoundOffAmt = decimalVal($roundOffAmount,2);
    // END CODE FOR ROUND OFF TOTAL AMT STORE IN DATABASE @PRIYANKA-21-SEP-21
    //   
    //echo '$PayRoundOffDisplay 2== ' . $PayRoundOffDisplay;
    //echo("<br/>"); 
    //echo '$PayRoundOffDisp 2== ' . $PayRoundOffDisp;
    //echo("<br/>"); 
    //echo '$PayRoundOffAmt 2== ' . $PayRoundOffAmt;
    //echo("<br/>"); 
    //
}
//
//
//
//
// *********************************************************************************************************
// START CODE TO CREATE REQUEST FOR PAYMENT DETAILS @PRIYANKA-20-SEP-21
// *********************************************************************************************************
//
$paymentInfo = Array ('cgstPer' => 'checked', 
'sgstPer' => 'checked', 
'cgstChk' => 'checked', 
'sgstChk' => 'checked',
'utin_pay_tax_on_total_amt_chk' => 'on',
'stockGoldTotQty' => $sttr_quantity_gd, 
'stockGoldTotGrosssWt' => $sttr_gs_weight_gd, 
'stockGoldTotGrosssWtType' => 'GM', 
'stockGoldTotNetWt' => $sttr_nt_weight_gd, 
'stockGoldTotNetWtType' => 'GM', 
'stockGoldTotFFineWt' => $sttr_final_fine_weight_gd, 
'stockGoldTotFFineWtType' => 'GM', 
'stockGoldTotOthChgsWt' => 0.000, 
'stockGoldTotOthChgsWtType' => 'GM', 
'stockGoldTotFineWt' => $sttr_fine_weight_gd, 
'stockGoldTotFineWtType' => 'GM', 
'stockGoldTotFinalBalance' => $sttr_valuation_gd, 
'stockGoldCrystalAmt' => 0, 
'stockGoldTotPurValuation' => '', 
'stockSilverTotQty' => $sttr_quantity_sl, 
'stockSilverTotGrosssWt' => $sttr_gs_weight_sl, 
'stockSilverTotGrosssWtType' => 'GM', 
'stockSilverTotNetWt' => $sttr_nt_weight_sl, 
'stockSilverTotNetWtType' => 'GM', 
'stockSilverTotFFineWt' => $sttr_final_fine_weight_sl, 
'stockSilverTotFFineWtType' => 'GM', 
'stockSilverTotOthChgsWt' => 0.000, 
'stockSilverTotOthChgsWtType' => 'GM', 
'stockSilverTotFineWt' => $sttr_fine_weight_sl, 
'stockSilverTotFineWtType' => 'GM', 
'stockSilverTotFinalBalance' => $sttr_valuation_sl, 
'stockSilverCrystalAmt' => '', 
'stockSilverTotPurValuation' => '', 
'stockCrystalTotQty' => '', 
'stockCrystalTotGrosssWt' => '', 
'stockCrystalTotGrosssWtType' => 'CT', 
'stockCrystalTotNetWt' => '', 
'stockCrystalTotNetWtType' => 'CT', 
'stockCrystalTotFFineWt' => '', 
'stockCrystalTotFFineWtType' => 'CT', 
'stockCrystalTotOthChgsWt' => '', 
'stockCrystalTotOthChgsWtType' => '', 
'stockCrystalTotFineWt' => '', 
'stockCrystalTotFineWtType' => 'CT', 
'stockCrystalTotFinalBalance' => '', 
'stockCrystalTotPurValuation' => '', 
'stockTransCRDR' => 'CR', 
'stockAccId' => $sttr_account_id, 
'userPanelName' => 'Customer', 
'valueAdded' => 0, 
'goldValuationCashMode' => $sttr_final_valuation_gd, 
'silverValuationCashMode' => $sttr_final_valuation_sl, 
'crystalValuationCashMode' => '', 
'valuationCashMode' => '', 
'indicator' => '', 
'stockFirmId' => $sttr_firm_id, 
'stockDOBDay' => $day, 
'gbMonthId' => 0, 
'stockDOBMonth' => $month, 
'stockDOBYear' => $year, 
'gmWtInGm' => 10, 
'gmWtInKg' => 100, 
'gmWtInMg' => 10000, 
'srGmWtInGm' => 1000, 
'srGmWtInKg' => 1, 
'srGmWtInMg' => 1000000, 
'cryWtInGm' => 0.2, 
'cryWtInKg' => 0.0002, 
'cryWtInMg' => 200, 
'cryWtInCt' => 1, 
'noOfRawMet' => 1, 
'totMetal' => 1, 
'sttr_transaction_type1' => 'PAID', 
'sttr_pre_invoice_no' => $payPreInvoiceNo, 
'sttr_invoice_no' => $payInvoiceNo, 
'sttr_indicator1' => 'rawMetal', 
'sttr_user_id1' => $sttr_user_id, 
'sttr_stock_type1' => 'retail', 
'sttr_type1' => 'rawMetal', 
'metalDiv1' => '', 
'metalDel1' => 1, 
'rawId' => '', 
'metalPanel' => 'StockPayment', 
'metalCount' => 1, 
'totPrevMetal' => '', 
'sttr_metal_type1' => 'Gold', 
'sttr_item_pre_id1' => '', 
'sttr_item_id1' => '', 
'payRawMetalSelId1' => '', 
'firmId1' => $sttr_firm_id, 
'sttr_account_id1' => $rawGoldAccId, 
'sttr_item_category1' => 'RawGold', 
'sttr_item_name1' => 'RAW GOLD', 
'sttr_gs_weight_hidden1' => '', 
'sttr_gs_weight1' => '', 
'sttr_gs_weight_type1' => 'GM', 
'sttr_pkt_weight_hidden1' => '', 
'sttr_pkt_weight1' => '', 
'sttr_pkt_weight_type1' => 'GM', 
'sttr_nt_weight1' => '', 
'sttr_nt_weight_type1' => 'GM', 
'sttr_purity1' => '', 
'sttr_fine_weight1' => '', 
'lbrWtAddMinusValue1' => 'minus', 
'sttr_lab_charges1' => '', 
'sttr_final_fine_weight1' => '', 
'sttr_metal_rate1' => $sttr_metal_rate, 
'sttr_valuation1' => '', 
'PayMetal1AvgRate1' => $sttr_metal_rate, 
'PayMetal1Pnl1' => '', 
'PayMetal1Bal1' => 0, 
'PayMetalBal1Type1' => 'GM', 
'PaymentReceiptPanel' => 'PurchasePayment', 
'PrevCashBalCRDR' => '', 
'stockGoldWtPrevBal' => 0, 
'stockGoldWtPrevBalType' => 'GM', 
'stockGoldWtPrevBalCRAmt' => '', 
'stockGoldWtPrevBalDRAmt' => '', 
'stockSilverWtPrevBal' => 0, 
'stockSilverWtPrevBalType' => 'GM', 
'stockSilverWtPrevBalCRAmt' => '', 
'stockSilverWtPrevBalDRAmt' => '', 
'stockCrystalWtPrevBal' => 0, 
'stockCrystalWtPrevBalType' => 'CT', 
'stockCrystalWtPrevBalCRAmt' => '', 
'stockCrystalWtPrevBalDRAmt' => '', 
'stockGoldPrevAmount' => '', 
'stockSilverPrevAmount' => '', 
'stockCrystalPrevAmount' => '', 
'stockGoldWtRecBal' => '', 
'stockGoldWtRecBalType' => '', 
'stockSilverWtRecBal' => '', 
'stockSilverWtRecBalType' => '', 
'stockCrystalWtRecBal' => '', 
'stockCrystalWtRecBalType' => '', 
'stockPayTotGoldAmtRec' => '', 
'stockPayTotSilverAmtRec' => '', 
'stockPayTotCrystalAmtRec' => '', 
'stockGoldWtFinBal' => 0, 
'stockGoldWtFinBalType' => '', 
'stockSilverWtFinBal' => 0, 
'stockSilverWtFinBalType' => '', 
'stockCrystalWtFinBal' => 0, 
'stockCrystalWtFinBalType' => '', 
'stockGoldPrevRate' => $sttr_metal_rate_gd, 
'stockSilverPrevRate' => $sttr_metal_rate_sl, 
'stockCrystalPrevRate' => '', 
'stockGoldPurRate' => $sttr_metal_rate_gd, 
'stockSilverPurRate' => $sttr_metal_rate_sl, 
'stockCrystalPurRate' => '', 
'paymentMode' => 'ByCash', 
'utin_crystal_amt_temp' => '', 
'payPanelNameHidden' => 'PurchasePayment', 
'stockRtCtGdCRDR' => '', 
'stockRtCtSlCRDR' => '', 
'stockRtCtStCRDR' => '', 
'stockRtCtCashCRDR' => 'CR', 
'firmId' => $sttr_firm_id, 
'stockPayTotFinAmt' => '', 
'stockPayTotAmtRec' => 0, 
'metal1WtPrevBal' => '0.000 GM', 
'stockGoldWtPrevBalCRDR' => '', 
'metal2WtPrevBal' => '0.000 GM', 
'stockSilverWtPrevBalCRDR' => '', 
'metal3WtPrevBal' => '0.000 CT', 
'stockCrystalWtPrevBalCRDR' => '', 
'payPanelName' => 'StockPayment', 
'sellReverseCalculation' => '', 
'utin_reverse_cal_by' => '', 
'panDetailsPresentForValidation' => 'NO', 
'payCashAmtLimitForPanValidation' => 0, 
'returnOrderPanelName' => '', 
'assignPanelName' => '', 
'lpAmtValue' => 100, 
'lpCloseValue' => '', 
'mainPanelName' => 'stock', 
'transPanelName' => 'PurchasePayment', 
'prefix' => 'stock', 
'udhaar_deposit_amt' => $sttr_valuation, 
'stockPayPrevTotAmt' => 0, 
'stockPayCrystalAmt' => 0.00, 
'mainSalePreInvNo' => '', 
'mainSalePostInvNo' => '', 
'otherInfo' => '', 
'setByDefaultPaymentMode' => '', 
'sttr_panel_name' => '', 
'sttr_taxincl_checked' => '', 
'utin_cr_acc_id' => $utin_cr_acc_id, 
'utin_dr_acc_id' => $sttr_account_id, 
'utin_udhaar_type' => '', 
'utin_udhaar_int_amt' => '', 
'utin_pay_int_acc_id' => '', 
'stockPayTotOthChgs' => 0.00, 
'totMkngOrLabChgs' => 0, 
'stockPayTotAmt' => $sttr_valuation, 
'stockPayTotAmtAccess' => $sttr_valuation, 
'stockUserId' => $sttr_user_id, 
'stockPreInvoiceNo' => $sttr_pre_invoice_no, 
'stockPostInvoiceNo' => $sttr_invoice_no, 
'stockPayId' => '', 
'utin_utin_id' => '', 
'stockPayTotAmtBal' => $sttr_final_valuation, 
'stockPayRoundOffAmt' => $PayRoundOffAmt, 
'stockPayTotCashAmt' => ($sttr_final_valuation + $PayRoundOffAmt), 
'endDate' => '', 
'PrevTotOpeningAmt' => 0.00, 
'PrevTotOpeningAmtCRDR' => '', 
'reverseCalculation' => 'No',
'firmPublicPrivate' => $firm_type, 
'nonTaxableInvoiceSetting' => '', 
'HiddenFirmTransfer' => '', 
'HiddenEstimateSell' => '', 
'HiddenEstimateSellConvert' => '', 
'HiddenSellEstimateConvert' => '', 
'stockPayPrevCashBalCRAmt' => '', 
'stockPayPrevCashBalDRAmt' => '', 
'stockUdhaarId' => '', 
'stocktransactionMode' => '', 
'stockuserMainPanel' => '', 
'preOrdInvNo' => '', 
'postOrdInvNo' => '', 
'CGSTCheck' => 'on', 
'SGSTCheck' => 'on', 
'stockPayDiscAccId' => $discountRecAccId, 
'utin_disc_narratn_discup' => '', 
'utin_discount_per_discup' => '', 
'utin_discount_amt_discup' => '', 
'utin_additional_charges_acc_id' => $indirectIncomeAccId, 
'utin_additional_charges_narratn' => '', 
'utin_additional_charges' => '', 
'stockPayCGSTAccId' => $cgstAccId, 
'stockCGST' => 1.5, 
'taxOnCGSTTotAmt' => $sttr_valuation, 
'stockCGSTAmt' => $sttr_tot_price_cgst_chrg, 
'stockPaySGSTAccId' => $sgstAccId, 
'stockSGST' => 1.5, 
'taxOnSGSTTotAmt' => $sttr_valuation, 
'stockSGSTAmt' => $sttr_tot_price_sgst_chrg, 
'stockPayIGSTAccId' => $igstAccId, 
'stockIGST' => '', 
'taxOnIGSTTotAmt' => $sttr_valuation, 
'stockIGSTAmt' => 0.00, 
'stockPayMkgCGSTAccId' => $labChargesAccId, 
'stockMkgChrgCGST' => 0, 
'taxOnTotMkgCGSTChrg' => 0.00, 
'stockMkgChrgCGSTAmt' => 0.00, 
'stockPayMkgSGSTAccId' => $labChargesAccId, 
'stockMkgChrgSGST' => 0, 
'taxOnTotMkgSGSTChrg' => 0.00, 
'stockMkgChrgSGSTAmt' => 0.00, 
'stockPayTaxAccId' => $dutiesAndTaxesAccId, 
'stockTax' => '', 
'taxOnTotAmt' => $sttr_valuation, 
'stockTaxAmt' => 0.00, 
'stockPayCourierAccId' => $courierChargesAccId, 
'courierInfo' => '', 
'stockPayCourierAmt' => '', 
'stockPayAccId' => $cashInHandAccId, 
'cashNarration' => '', 
'stockPayCashAmtRec' => '', 
'stockPayChequeAccId' => $bankAccId, 
'chequeNo' => '', 
'stockPayChequeAmt' => '', 
'stockPayCardAccId' => $bankAccId, 
'cardNo' => '', 
'stockPayCardAmt' => '', 
'transChargesIncludeExclude' => '', 
'totalCardAmt' => 0, 
'stockPayTransChrgPer' => '', 
'stockPayTransChrgAmt' => '', 
'stockPayCardFinalAmt' => '', 
'stockPayOnlinePaymentAccId' => $bankAccId, 
'onlinePaymentNarration' => '', 
'stockPayOnlinePaymentAmt' => '', 
'totalOnlineAmt' => 0, 
'commPaidIncludeExclude' => '', 
'stockPayCommPayPer' => '', 
'stockPayCommPayAmt' => '', 
'stockPayOnlinePaymentFinalAmt' => '', 
'lpOpening' => 0.00, 
'lpClosing' => 0.00, 
'lpGain' => 0.00, 
'lpRedeem' => 0.00, 
'discNarration' => '', 
'utin_discount_per' => 0, 
'stockPayDiscount' => 0, 
'remSelect' => 'NotSelected', 
'stockPayOtherInfo' => '', 
'stockPayPrevAmtDisp' => 0.00, 
'stockPayPrevCashBalCRDR' => 'CR', 
'stockPayTotAmtExchangeDisp' => 0.00, 
'stockPayTotAmtBalDisp' => $sttr_valuation, 
'stockPayCrystalAmtDisp' => 0.00, 
'utin_othr_chgs_by' => '', 
'stockPayCashOthChgsDisp' => $sttr_total_lab_charges, 
'utin_total_taxable_amt' => $sttr_valuation, 
'discountAmtDisp' => 0.00, 
'utin_additional_charges_disp' => 0.00, 
'taxableAmount' => $sttr_valuation, 
'stockPayCGSTAmtDisp' => $sttr_tot_price_cgst_chrg, 
'stockPaySGSTAmtDisp' => $sttr_tot_price_sgst_chrg, 
'stockPayIGSTAmtDisp' => 0.00, 
'stockPayMkgCGSTAmtDisp' => 0.00, 
'stockPayMkgSGSTAmtDisp' => 0.00, 
'stockPayTaxAmtDisp' => 0.00, 
'stockPayCourierAmtDisp' => 0.00, 
'stockPayRoundOffDisplay' => $PayRoundOffDisplay, 
'stockPayTotCashAmtDisp' => $sttr_final_valuation, 
'stockPayableCashCRDR' => 'CR', 
'stockPayTotAmtRecDisp' => 0.00, 
'stockPayCashRecDisp' => 0.00, 
'lpRedeemDisp' => 0.00, 
'stockPayDiscountDisp' => 0.00, 
'stockPayRoundOffDisp' => $PayRoundOffDisp, 
'stockPayFinAmtBalDisp' => $sttr_final_valuation, 
'stockFinalCashCRDR' => 'CR',
'utin_transaction_type' => 'PURBYSUPP', 
'utin_type' => 'stock');
//
// *********************************************************************************************************
// END CODE TO CREATE REQUEST FOR PAYMENT DETAILS @PRIYANKA-20-SEP-21
// *********************************************************************************************************
//
//
//
//
// MERGE PAYMENT DETAILS INTO REQUEST @PRIYANKA-20-SEP-21
$_REQUEST = array_merge($_REQUEST, $paymentInfo);
//
//
// ALL INPUTS @PRIYANKA-20-SEP-21
$request = $_REQUEST;
//
//
// REQUEST VARIABLE FILE @PRIYANKA-20-SEP-21
include 'ompyamtid.php';
//
//
// INSERT OPERATION - user_transaction_invoice @PRIYANKA-20-SEP-21
user_transaction_invoice('insert', $_REQUEST);
//
//
// PAYMENT MODE @PRIYANKA-20-SEP-21
$paymentMode = $_REQUEST['paymentMode'];
//
//
// GET LAST ENTERED USER TRANSACTION INVOICE ID @PRIYANKA-20-SEP-21
parse_str(getTableValues("SELECT utin_id FROM user_transaction_invoice "
                       . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' AND utin_user_id = '$userId' "
                       . "AND utin_type = 'stock' AND utin_transaction_type IN ('PURBYSUPP') "
                       . "order by utin_id DESC LIMIT 0,1"));
//
//
// PURCHASE ENTRY STATUS @PRIYANKA-20-SEP-21
$query = "UPDATE stock_transaction SET 
                 sttr_status = 'PaymentDone', sttr_utin_id = '$utin_id'
                 WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_pre_invoice_no = '$payPreInvoiceNo' 
                 AND sttr_invoice_no = '$payInvoiceNo' 
                 AND sttr_user_id = '$userId' AND sttr_status NOT IN ('DELETED') 
                 AND sttr_transaction_type IN ('PURBYSUPP', 'PURCHASE') 
                 AND sttr_indicator IN ('AddInvoice', 'PURCHASE', 'stock')";
//
//echo '$query == ' . $query . '<br />'; die;
//
if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
//
//
// PREVIOUS INVOICE PAYMENT @PRIYANKA-20-SEP-21
include 'omprvinup.php';
//
//
$utinType = 'OnPurchase';
$transactionType = 'DEPOSIT';
//
//
$_REQUEST['utin_transaction_type'] = $transactionType;
$_REQUEST['utin_type'] = $utinType;
$_REQUEST['mainUtinId'] = $utin_id;
//
//
// INSERT - user_transaction_invoice @PRIYANKA-20-SEP-21
user_transaction_invoice('insert', $_REQUEST);
//
// 
// 
// 
// PAYMENT MODE @PRIYANKA-20-SEP-21
$paymentMode = $_REQUEST['paymentMode'];
//
//
// PREFIX @PRIYANKA-20-SEP-21
$prefix = $_REQUEST['prefix'];
//
//
//
//
// *********************************************************************************************************
// START CODE TO ADD CODE FOR SUPPLIER PURCHASE STOCK ACCOUNT JOURNAL ENTRIES @PRIYANKA-20-SEP-21
// *********************************************************************************************************
//
if ($paymentMode == 'RateCut' || $paymentMode == 'ByCash') { // PAYMENT MODE @PRIYANKA-20-SEP-21
    //       
    // 
    // FIRM ID @PRIYANKA-20-SEP-21
    $firmId = $_REQUEST[$prefix . 'FirmId']; // FIRM ID @PRIYANKA-20-SEP-21
    //
    //
    // USER ID @PRIYANKA-01FEB19
    $userId = $_REQUEST[$prefix . 'UserId']; // USER ID @PRIYANKA-20-SEP-21
    //
    //
    // DATE @PRIYANKA-01FEB19
    $date = trim($_REQUEST[$prefix . 'DOBDay']) . ' ' . trim($_REQUEST[$prefix . 'DOBMonth']) . ' ' . trim($_REQUEST[$prefix . 'DOBYear']);
    $payAddDate = mysqli_real_escape_string($conn, stripslashes($date)); // DATE @PRIYANKA-20-SEP-21
    //
    //
    //print_r($_REQUEST);
    //
    //
    // PAYMENT MODE @PRIYANKA-20-SEP-21
    if ($paymentMode == 'RateCut') { // RATE CUT CASE @PRIYANKA-20-SEP-21
        $goldValuation = $_REQUEST[$prefix . 'GoldValuation']; // GOLD METAL VALUATION @PRIYANKA-20-SEP-21
        $silverValuation = $_REQUEST[$prefix . 'SilverValuation']; // SILVER METAL VALUATION @PRIYANKA-20-SEP-21
        $stoneValuation = $_REQUEST[$prefix . 'PayCrystalAmt']; // STONE VALUATION @PRIYANKA-20-SEP-21
    } 
    else if ($paymentMode == 'ByCash') { // CASH CASE @PRIYANKA-20-SEP-21
        $goldValuation = $_REQUEST[$prefix . 'GoldTotFinalBalance']; // GOLD METAL VALUATION@PRIYANKA-20-SEP-21
        $silverValuation = $_REQUEST[$prefix . 'SilverTotFinalBalance']; // SILVER METAL VALUATION @PRIYANKA-20-SEP-21
        $stoneValuation = $_REQUEST[$prefix . 'PayCrystalAmt']; // STONE VALUATION @PRIYANKA-20-SEP-21
    }
    //
    //
    // UPDATE PURCHASE GOLD, SILVER AMOUNTS IN USER TRANSACTION INVOICE TABLE @PRIYANKA-20-SEP-21
    $updatePurAmtQuery = "UPDATE user_transaction_invoice "
                       . "SET utin_gd_pur_amt = '$goldValuation', utin_sl_pur_amt = '$silverValuation' "
                       . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' AND utin_user_id = '$userId' "
                       . "AND utin_type = 'stock' AND utin_transaction_type IN ('PURBYSUPP') "
                       . "AND utin_id = '$utin_id'";
    //
    if (!mysqli_query($conn, $updatePurAmtQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    //
    //
    // PREVIOUS ENTRY ACCOUNT ID SET TO NULL @PRIYANKA-20-SEP-21
            $accId = NULL;
            $payGoldAccId = NULL;
            $paySilverAccId = NULL;
            $puchaseGoldAccId = NULL;
            $puchaseSilverAccId = NULL;
            $payStoneAccId = NULL;
            $puchaseStoneAccId = NULL;
            $payStockInvAccId = NULL;
            $payCashAccId = NULL;
            $payCashAmt = 0;
            $payCardAmt = 0;
            $payChequeAccId = NULL;
            $payCardAccId = NULL;
            $payOnlinePayAccId = NULL;
            $payDiscountAccId = NULL;
            $payTaxAccId = NULL; // ADDED FOR TAX (VAT) @PRIYANKA-20-SEP-21
            $payCGSTAccId = NULL;
            $paySGSTAccId = NULL;
            $payIGSTAccId = NULL;
            $payRoundOffAmt = 0;
            $payTaxAmt = 0; // ADDED FOR TAX (VAT) @PRIYANKA-20-SEP-21
            $payCGSTaxAmt = 0;
            $paySGSTaxAmt = 0;
            $payIGSTaxAmt = 0;
            $payMkgCGSTAmt = 0;
            $payMkgSGSTAmt = 0;
            $userAccId = NULL;
            $user_acc_id = NULL;
            $payTotOthChgs = 0;
            $udhaarCashRecAmount = 0;
            $payTotalAmtBal = 0;
            $payGoldCashAmt = 0;
            $paySilverCashAmt = 0;
            $payStoneCashAmt = 0;
            $sttr_indicator = '';
            //
            //
            // GOLD METAL VALUATION @PRIYANKA-20-SEP-21
            if ($goldValuation > 0) {
                //
                $metalType = 'Gold'; // METAL TYPE - GOLD @PRIYANKA-20-SEP-21
                $payFinalPayableAmt = $goldValuation; // GOLD METAL VALUATION @PRIYANKA-20-SEP-21
                $payGoldCashAmt = $goldValuation;
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                       . "acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
                //
                $payGoldAccId = $acc_id;
                //
                // ================================================================================================================ //
                // START CODE TO GET GOLD PURCHASE ACCOUNT DETAIL FOR PURCHASE GOLD ACCOUNT ENTRY IN JRTR @PRIYANKA-20-SEP-21        //
                // ================================================================================================================ //
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                       . "acc_firm_id='$firmId' and acc_user_acc='Purchase Gold'"));
                //
                $puchaseGoldAccId = $acc_id;
                //
                // ============================================================================================================== //
                // END CODE TO GET GOLD PURCHASE ACCOUNT DETAIL FOR PURCHASE GOLD ACCOUNT ENTRY IN JRTR @PRIYANKA-20-SEP-21        //
                // ============================================================================================================== //
                //
                $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @PRIYANKA-20-SEP-21
                $transApiType = 'insert';
                $transactionType = 'PURBYSUPP';
                $sttr_indicator = 'stock';
                include 'omusrtranjrnl.php';
                //
            }
            //
            //
            //
            // SILVER METAL VALUATION @PRIYANKA-20-SEP-21
            if ($silverValuation > 0) {
                //
                $metalType = 'Silver'; // METAL TYPE - SILVER @PRIYANKA-20-SEP-21
                $payFinalPayableAmt = $silverValuation; // SILVER METAL VALUATION @PRIYANKA-20-SEP-21
                $paySilverCashAmt = $silverValuation;
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                       . "acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
                //
                $paySilverAccId = $acc_id;
                //
                // ==================================================================================================================== //
                // START CODE TO GET SILVER PURCHASE ACCOUNT DETAIL FOR PURCHASE SILVER ACCOUNT ENTRY IN JRTR @PRIYANKA-20-SEP-21        //
                // ==================================================================================================================== //
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                       . "acc_firm_id='$firmId' and acc_user_acc='Purchase Silver'"));
                //
                $puchaseSilverAccId = $acc_id;
                //
                // ================================================================================================================== //
                // END CODE TO GET SILVER PURCHASE ACCOUNT DETAIL FOR PURCHASE SILVER ACCOUNT ENTRY IN JRTR @PRIYANKA-20-SEP-21        //
                // ================================================================================================================== //
                //
                $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @PRIYANKA-20-SEP-21
                $transApiType = 'insert';
                $transactionType = 'PURBYSUPP';
                $sttr_indicator = 'stock';
                include 'omusrtranjrnl.php';
                //
            }
            //
            //
            // ============================================================================================= //
            // START CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @PRIYANKA-20-SEP-21           //
            // ============================================================================================= //
            //
            if ($stoneValuation > 0) {
                //
                $metalType = 'stockCrystal'; // METAL TYPE - GOLD @PRIYANKA-20-SEP-21
                $payFinalPayableAmt = $stoneValuation; // GOLD METAL VALUATION @PRIYANKA-20-SEP-21
                $payStoneCashAmt = $stoneValuation;
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                       . "acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
                //
                $payStoneAccId = $acc_id;
                $payGoldAccId = '';
                $paySilverAccId = '';
                //
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and "
                                       . "acc_firm_id='$firmId' and acc_user_acc='Purchase Stone'"));
                //
                $puchaseStoneAccId = $acc_id;
                $puchaseGoldAccId = '';
                $puchaseSilverAccId = '';
                //
                $jrtrGoldSilverStockInvDesc = NULL;
                $jrtrGoldSilverPurchaseDesc = NULL;
                //
                $stockAccountEntry = 'No'; // CREATE MAIN JRNL ENTRY YES/NO @PRIYANKA-20-SEP-21
                $transApiType = 'insert';
                $transactionType = 'PURBYSUPP';
                $sttr_indicator = 'stockCrystal';
                include 'omusrtranjrnl.php';
                //
                //
            }
            //
            // ============================================================================================= //
            // END CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @PRIYANKA-20-SEP-21             //
            // ============================================================================================= //
            //
            //
}
//
// *********************************************************************************************************
// END CODE TO ADD CODE FOR SUPPLIER PURCHASE STOCK ACCOUNT JOURNAL ENTRIES @PRIYANKA-20-SEP-21
// *********************************************************************************************************
//
?>