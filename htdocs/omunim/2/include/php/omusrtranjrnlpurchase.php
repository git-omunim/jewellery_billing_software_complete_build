<?php
/*
 * **************************************************************************************
 * @tutorial: PURCHASE JOURNAL ENTRIES FORM SUPPLIER @ PRIYANKA-18-SEP-17
 * **************************************************************************************
 * 
 * Created on 16 Sep, 2017 6:14:08 PM
 *
 * @FileName: omusrtranjrnlpurchase.php
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
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
//
//
if ($transactionType == 'PURBYSUPP') {
    $desc = 'Product Purchase';
    $transType = 'PURBYSUPP';
} else if ($transactionType == 'ItemReturn') {
    $desc = 'Item Return';
    $transType = 'ItemReturn';
} else if ($transactionType == 'EXISTING') {
    $desc = 'Product Added';
    $transType = 'STOCK';
}
//
//
//echo '<br />$transactionType ## == ## '.$transactionType.'<br />';
//
//
if ($transactionType == 'PURBYSUPP' || $transactionType == 'ItemReturn' || $transactionType == 'EXISTING') {
    //
    //
    $jrnlTransCrAccId = $sundryDebAccId;
    $jrnlTransCrDesc = $sundryDebAccName;
    //
    $jrnlTransDrAccId = $jrnlTransAccId;
    $jrnlTransDrDesc = $jrnlTransDesc;
    //
    //
    //echo '<br />$jrnlTransDrDesc ## == ## '.$jrnlTransDrDesc.'<br />';
    //
    //
    $jrnlTransDesc = $desc;
    //
    //
    //*********************************************************************************************************************************************
    //*******************************************************************************************************************************************
    // Start JRTR entry data @ PRIYANKA-18-SEP-17
    //**********************************************************************************************************************************************
    //******************************************************************************************************************************************** */
    //
    //
    // DR account details
    $jrtrMainTransCRDR = 'DR';
    //
    $jrtrMainCrAmount = 0;
    $jrtrTransCrAccId = ''; // $sundryDebAccId
    $jrtrTransCrDesc = $sundryDebAccName;
    //
    if ($lessGSTamtFromPayableAmt == 'NO') {
        $jrtrMainDrAmount = $jrnlDrAmount;
    } else {
        //
        if ($jrtrEntryIndicator != 'NO') {
        //
        if ($payRoundOffAmt > 0.5) {
            //
            // ADDED CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
            $jrtrMainDrAmount = ($jrnlDrAmount - $payTotOthChgs - $payTotHallmarkChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt - $payHallmarkCGSTAmt - $payHallmarkSGSTAmt - $payHallmarkIGSTAmt - $payCourierAmt) - (1 - $payRoundOffAmt);
        } else {
            //
            // ADDED CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
            $jrtrMainDrAmount = ($jrnlDrAmount - $payTotOthChgs - $payTotHallmarkChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt - $payHallmarkCGSTAmt - $payHallmarkSGSTAmt - $payHallmarkIGSTAmt - $payCourierAmt) + $payRoundOffAmt;
        }
        //
        }
        //
    }
    //
    //$jrtrMainDrAmount = $jrnlDrAmount - $payTotOthChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt;
    //
    $jrtrTransDrAccId = $jrnlTransAccId;
    $jrtrTransDrDesc = $jrnlTransDrDesc;
    $jrtrTransDesc = $jrnlTransDesc;
    //        
    //********************************************************************************************************************************************
    // START CODE FOR BANK TRANSACTIONS @ PRIYANKA-18-SEP-17
    //********************************************************************************************************************************************
    // Cash account
    // print_r($_REQUEST);
    if($PaymentReceiptPanel =='' || $PaymentReceiptPanel == NULL){
        $PaymentReceiptPanel = $_REQUEST['PaymentReceiptPanel'];
    }
    if($amountPaidReceiveOption =='' || $amountPaidReceiveOption == NULL){
        $amountPaidReceiveOption = $_REQUEST['amountPaidReceiveOption'];
    }
    //
 if($PaymentReceiptPanel == $PaymentReceiptPanel && $amountPaidReceiveOption == 'amountReceived' ){
    $jrtrCashCRDR = 'DR';
    //
    $jrtrCashCrAmount = 0;
    $jrtrCashCrAccId = '';
    $jrtrCashCrDesc = $jrnlTransDrDesc;
    //
    $jrtrCashDrAmount = $payCashAmt;
    $jrtrCashDrAccId = $cashAccId;
    $jrtrCashDrDesc = $cashAccName;
    $jrtrCashDesc = 'Cash Payment';
 }else{
    $jrtrCashCRDR = 'CR';
    //
    $jrtrCashCrAmount = $payCashAmt;
    $jrtrCashCrAccId = $cashAccId;
    $jrtrCashCrDesc = $cashAccName;
    //
    $jrtrCashDrAmount = 0;
    $jrtrCashDrAccId = '';
    $jrtrCashDrDesc = $jrnlTransDrDesc;
    $jrtrCashDesc = 'Cash Payment';
 }
 //
 if($PaymentReceiptPanel == $PaymentReceiptPanel && $amountPaidReceiveOption == 'amountReceived' ){
    $jrtrBankCRDR = 'DR';
    //
    $jrtrBankCrAmount = 0;
    $jrtrBankCrAccId = '';
    $jrtrBankCrDesc = $jrnlTransDrDesc;
    //
    $jrtrBankDrAmount = $payChequeAmt;
    $jrtrBankDrAccId = $bankAccId;
    $jrtrBankDrDesc = $bankAccName;
    $jrtrBankDesc = 'Bank NEFT/IMPS Payment';
 } else{
      $jrtrBankCRDR = 'CR';
    //
    $jrtrBankCrAmount = $payChequeAmt;
    $jrtrBankCrAccId = $bankAccId;
    $jrtrBankCrDesc = $bankAccName;
    //
    $jrtrBankDrAmount = 0;
    $jrtrBankDrAccId = '';
    $jrtrBankDrDesc = $jrnlTransDrDesc;
    $jrtrBankDesc = 'Bank NEFT/IMPS Payment';
 }
    //
  if($PaymentReceiptPanel == $PaymentReceiptPanel && $amountPaidReceiveOption == 'amountReceived' ){
    $jrtrCardCRDR = 'DR';
    // 
    $jrtrCardCrAmount = 0;
    $jrtrCardCrAccId = '';
    $jrtrCardCrDesc = $jrnlTransDrDesc;
    //
    $jrtrCardDrAmount = $payCardAmt;
    $jrtrCardDrAccId = $cardAccId;
    $jrtrCardDrDesc = $cardAccName;
    $jrtrCardDesc = 'Card Payment';
  } else {
     $jrtrCardCRDR = 'CR';
    // 
    $jrtrCardCrAmount = $payCardAmt;
    $jrtrCardCrAccId = $cardAccId;
    $jrtrCardCrDesc = $cardAccName;
    //
    $jrtrCardDrAmount = 0;
    $jrtrCardDrAccId = '';
    $jrtrCardDrDesc = $jrnlTransDrDesc;
    $jrtrCardDesc = 'Card Payment';
  }
    //
  if($PaymentReceiptPanel == $PaymentReceiptPanel && $amountPaidReceiveOption == 'amountReceived' ){
    $jrtrOnlinePayCRDR = 'DR';
    //
    $jrtrOnlinePayCrAmount = 0;
    $jrtrOnlinePayCrAccId = '';
    $jrtrOnlinePayCrDesc = $jrnlTransDrDesc;
    //
    $jrtrOnlinePayDrAmount = $payOnlinePayAmt;
    $jrtrOnlinePayDrAccId = $onlinePayAccId;
    $jrtrOnlinePayDrDesc = $onlinePayAccName;
    $jrtrOnlinePayDesc = 'Online Payment';
} else{
    $jrtrOnlinePayCRDR = 'CR';
    //
    $jrtrOnlinePayCrAmount = $payOnlinePayAmt;
    $jrtrOnlinePayCrAccId = $onlinePayAccId;
    $jrtrOnlinePayCrDesc = $onlinePayAccName;
    //
    $jrtrOnlinePayDrAmount = 0;
    $jrtrOnlinePayDrAccId = '';
    $jrtrOnlinePayDrDesc = $jrnlTransDrDesc;
    $jrtrOnlinePayDesc = 'Online Payment';
}
    //
    $jrtrDiscountCRDR = 'CR';
    //
    $jrtrDiscountCrAmount = $payDiscountAmt;
    $jrtrDiscountCrAccId = $discountAccId;
    $jrtrDiscountCrDesc = $discountAccName;
    //
    $jrtrDiscountDrAmount = 0;
    $jrtrDiscountDrAccId = '';
    $jrtrDiscountDrDesc = $jrnlTransDrDesc;
    $jrtrDiscountDesc = 'Discount Paid';
    //
    //******************************************************************************************************************************************
    // START CODE FOR CGST, SGST & IGST TAXES @ PRIYANKA-18-SEP-17
    //******************************************************************************************************************************************
    //
    $jrtrCGSTCRDR = 'DR';
    //
    $jrtrCGSTCrAmount = 0;
    $jrtrCGSTCrAccId = '';
    $jrtrCGSTCrDesc = $jrnlTransDrDesc;
    //
    $jrtrCGSTDrAmount = ($payCGSTaxAmt + $payMkgCGSTAmt + $payHallmarkCGSTAmt);
    $jrtrCGSTDrAccId = $CGSTAccId;
    $jrtrCGSTDrDesc = $CGSTAccName;
    $jrtrCGSTDesc = 'CGST TAX Rec.';
    //
    $jrtrSGSTCRDR = 'DR';
    //
    $jrtrSGSTCrAmount = 0;
    $jrtrSGSTCrAccId = '';
    $jrtrSGSTCrDesc = $jrnlTransDrDesc;
    //
    $jrtrSGSTDrAmount = ($paySGSTaxAmt + $payMkgSGSTAmt + $payHallmarkSGSTAmt);
    $jrtrSGSTDrAccId = $SGSTAccId;
    $jrtrSGSTDrDesc = $SGSTAccName;
    $jrtrSGSTDesc = 'SGST TAX Rec.';
    //
    $jrtrIGSTCRDR = 'DR';
    //
    $jrtrIGSTCrAmount = 0;
    $jrtrIGSTCrAccId = '';
    $jrtrIGSTCrDesc = $jrnlTransDrDesc;
    //
    $jrtrIGSTDrAmount = ($payIGSTaxAmt + $payHallmarkIGSTAmt);
    $jrtrIGSTDrAccId = $IGSTAccId;
    $jrtrIGSTDrDesc = $IGSTAccName;
    $jrtrIGSTDesc = 'IGST TAX Rec.';
    //
    //
    // ***************************************************
    // START CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
    // ***************************************************
    $jrtrTaxVatCRDR = 'DR';
    //
    $jrtrTaxVatCrAmount = 0;
    $jrtrTaxVatCrAccId = '';
    $jrtrTaxVatCrDesc = $jrnlTransDrDesc;
    //
    $jrtrTaxVatDrAmount = $payTaxAmt;
    $jrtrTaxVatDrAccId = $TaxVatAccId;
    $jrtrTaxVatDrDesc = $TaxVatAccName;
    $jrtrTaxVatDesc = 'TAX (VAT) Rec.';
    // ***************************************************
    // END CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
    // ***************************************************
    //
    //
    //
    //
    // ****************************************************************************************************
    // START CODE FOR MAKING CHARGES @PRIYANKA-14-DEC-17
    // ****************************************************************************************************
    $jrtrMKGCRDR = 'DR';
    //
    $jrtrMKGCrAmount = 0;
    $jrtrMKGCrAccId = '';
    $jrtrMKGCrDesc = $mkgChrgsAccName;
    //
    $jrtrMKGDrAmount = $payTotOthChgs;
    $jrtrMKGDrAccId = $mkgChrgsAccId;
    $jrtrMKGDrDesc = $mkgChrgsAccName;
    $jrtrMKGDesc = 'LABOUR CHARGES';
    // ****************************************************************************************************
    // END CODE FOR MAKING CHARGES @PRIYANKA-14-DEC-17
    // **************************************************************************************************** 
    //
    //
    //
    //
    // ****************************************************************************************************
    // START FOR HALLMARK CHARGES @PRIYANKA-27MAY2022
    // **************************************************************************************************** 
    $jrtrHallmarkCRDR = 'DR';
    //
    $jrtrHallmarkCrAmount = 0;
    $jrtrHallmarkCrAccId = '';
    $jrtrHallmarkCrDesc = $hallmarkChrgsAccName;
    //
    $jrtrHallmarkDrAmount = $payTotHallmarkChgs;
    $jrtrHallmarkDrAccId = $hallmarkChrgsAccId;
    $jrtrHallmarkDrDesc = $hallmarkChrgsAccName;
    $jrtrHallmarkDesc = 'HALLMARK CHARGES';
    // ****************************************************************************************************
    // END FOR HALLMARK CHARGES @PRIYANKA-27MAY2022
    // ****************************************************************************************************
    //
    //
    //
    // 
    // ****************************************************************************************************
    // START FOR TRANSACTION CHARGES @PRIYANKA-08AUG2019
    // ****************************************************************************************************
    //
    $jrtrCardTransChargsCRDR = 'CR';
    //
    $jrtrCardTransChargsCrAmount = $payCardTransChgsAmt;
    $jrtrCardTransChargsCrAccId = $CardTransChgsAmtAccId;
    $jrtrCardTransChargsCrDesc = $CardTransChgsAmtAccName;
    //
    $jrtrCardTransChargsDrAmount = 0;
    $jrtrCardTransChargsDrAccId = '';
    $jrtrCardTransChargsDrDesc = $jrnlTransDrDesc;
    //   
    $jrtrCardTransChargsDesc = 'CARD TRANSACTION CHARGES';
    //
    // ****************************************************************************************************
    // END FOR TRANSACTION CHARGES @PRIYANKA-08AUG2019
    // ****************************************************************************************************
    // 
    // ======================================================================================================= //
    // START CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
    // ======================================================================================================= //
    //
    $jrtrCourierChargsCRDR = 'DR';
    //
    $jrtrCourierChargsCrAmount = 0;
    $jrtrCourierChargsCrAccId = '';
    $jrtrCourierChargsCrDesc = $jrnlTransCrDesc;
    //
    $jrtrCourierChargsDrAmount = $payCourierAmt;
    $jrtrCourierChargsDrAccId = $courierAccId;
    $jrtrCourierChargsDrDesc = $courierAccName;
    //
    $jrtrCourierChargsDesc = 'COURIER CHARGES';
    // 
    // ===================================================================================================== //
    // END CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
    // ===================================================================================================== //
    //
      // ======================================================================================================= //
    // START CODE TO SET OTHER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:VINOD-26March2023 //
    // ======================================================================================================= //
    //
    $jrtrOtherChargsCRDR = 'CR';
    //
    $jrtrOtherChargsCrAmount = $payOtherAmt;
    $jrtrOtherChargsCrAccId = $otherAccId;
    $jrtrOtherChargsCrDesc = $otherAccName;
    //
    $jrtrOtherChargsDrAmount = 0;
    $jrtrOtherChargsDrAccId = '';
    $jrtrOtherChargsDrDesc = $jrnlTransCrDesc;
    //
    $jrtrOtherChargsDesc = 'OTHER CHARGES';
    // 
    // ===================================================================================================== //
    // END CODE TO SET OTHER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:VINOD-26March2023 //
    // ===================================================================================================== //
    //
    // ===================================================================================================================== //
    // START CODE  FOR ADDITIONAL CHARGES JOURNAL ENTRY AUTHOR:@DNYANESHWARI 23MARCH2024  //
    // ===================================================================================================================== //
    //
  if($additionalChargesPlusMinus == 'minus')  {
    $jrtrCourierChargsCRDR = 'CR';
    //
    $jrtrCourierChargsCrAmount = $payAdditionalChargsAmt;
    $jrtrCourierChargsCrAccId = $addtionalChargesAccId;
    $jrtrCourierChargsCrDesc = $addtionalChargesAccName;
    //
    $jrtrCourierChargsDrAmount = 0;
    $jrtrCourierChargsDrAccId = '';
    $jrtrCourierChargsDrDesc = $jrnlTransCrDesc;
    //
    $jrtrCourierChargsDesc = 'ADDITIONAL CHARGES';
    
} else {
    $jrtrCourierChargsCRDR = 'DR';
    //
    $jrtrCourierChargsCrAmount = 0;
    $jrtrCourierChargsCrAccId = '';
    $jrtrCourierChargsCrDesc = $jrnlTransCrDesc;
    //
    $jrtrCourierChargsDrAmount = $payAdditionalChargsAmt;
    $jrtrCourierChargsDrAccId = $addtionalChargesAccId;
    $jrtrCourierChargsDrDesc = $addtionalChargesAccName;
    //
    $jrtrCourierChargsDesc = 'ADDITIONAL CHARGES';
        
}
    //
    // =================================================================================================================== //
    // END CODE  FOR ADDITIONAL CHARGES JOURNAL ENTRY AUTHOR:@DNYANESHWARI 23MARCH2024  //
    // =================================================================================================================== //
    // ********************************************************************************************************************************************
    // START CODE FOR GOLD ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // Gold Account
    //
    if ($payGoldAccId != NULL && $payGoldAccId != '') {
        //
        $jrtrGoldSilverStockInvCRDR = 'DR';
        //       
        $jrtrGoldSilverStockInvCrAmount = 0;
        $jrtrGoldSilverStockInvCrAccId = '';
        $jrtrGoldSilverStockInvCrDesc = $jrnlTransDrDesc;
        //
        if ($payStockGoldCashAmt > 0) {
            $jrtrGoldSilverStockInvDrAmount = $payStockGoldCashAmt;
        } else {
           $jrtrGoldSilverStockInvDrAmount = $payGoldCashAmt;
        }
        //
        $jrtrGoldSilverStockInvDrAccId = $goldAccId;
        $jrtrGoldSilverStockInvDrDesc = $goldAccName;
        $jrtrGoldSilverStockInvDesc = 'Stock Inventory';
    }
    //
    // =================================================================================================== //
    // START CODE TO ADD ACCOUNT DETAIL FOR PURCHASE GOLD ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // =================================================================================================== //
    //
    if ($puchaseGoldAccId != NULL && $puchaseGoldAccId != '') {
        $jrtrGoldSilverPurchaseCRDR = 'DR';
        $jrtrGoldSilverPurchaseCrAmount = 0;
        $jrtrGoldSilverPurchaseCrAccId = '';
        $jrtrGoldSilverPurchaseCrDesc = '';
        $jrtrGoldSilverPurchaseDrAmount = $payGoldCashAmt;
        $jrtrGoldSilverPurchaseDrAccId = $puchaseGdAccId;
        $jrtrGoldSilverPurchaseDrDesc = $puchaseGdName;
        $jrtrGoldSilverPurchaseDesc = 'Gold Purchase';
    }
    //
    // ================================================================================================= //
    // END CODE TO ADD ACCOUNT DETAIL FOR PURCHASE GOLD ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // ================================================================================================= //
    //
    //
    // ********************************************************************************************************************************************
    // END CODE FOR GOLD ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // 
    // ********************************************************************************************************************************************
    // START CODE FOR SILVER ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // Silver Account
    //
    if ($paySilverAccId != NULL && $paySilverAccId != '') {
        $jrtrGoldSilverStockInvCRDR = 'DR';
        //
        $jrtrGoldSilverStockInvCrAmount = 0;
        $jrtrGoldSilverStockInvCrAccId = '';
        $jrtrGoldSilverStockInvCrDesc = '';
        //
        if ($payStockSilverCashAmt > 0) {
            $jrtrGoldSilverStockInvDrAmount = $payStockSilverCashAmt;
        } else {
            $jrtrGoldSilverStockInvDrAmount = $paySilverCashAmt;
        }
        //
        $jrtrGoldSilverStockInvDrAccId = $silverAccId;
        $jrtrGoldSilverStockInvDrDesc = $silverAccName;
        $jrtrGoldSilverStockInvDesc = 'Stock Inventory';
    }
    //
    // ===================================================================================================== //
    // START CODE TO ADD ACCOUNT DETAIL FOR PURCHASE SILVER ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // ===================================================================================================== //
    //
    if ($puchaseSilverAccId != NULL && $puchaseSilverAccId != '') {
        $jrtrGoldSilverPurchaseCRDR = 'DR';
        $jrtrGoldSilverPurchaseCrAmount = 0;
        $jrtrGoldSilverPurchaseCrAccId = '';
        $jrtrGoldSilverPurchaseCrDesc = '';
        $jrtrGoldSilverPurchaseDrAmount = $paySilverCashAmt;
        $jrtrGoldSilverPurchaseDrAccId = $puchaseSlAccId;
        $jrtrGoldSilverPurchaseDrDesc = $puchaseSlName;
        $jrtrGoldSilverPurchaseDesc = 'Silver Purchase';
    }
    //
    // =================================================================================================== //
    // END CODE TO ADD ACCOUNT DETAIL FOR PURCHASE SILVER ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // =================================================================================================== //
    //
    //
    // ==================================================================================================== //
    // START CODE TO ADD ACCOUNT DETAIL FOR PURCHASE STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
    // ==================================================================================================== //
    //
    if ($puchaseStAccId != NULL && $puchaseStAccId != '') {
        $jrtrStonePurchaseCRDR = 'DR';
        $jrtrStonePurchaseCrAmount = 0;
        $jrtrStonePurchaseCrAccId = '';
        $jrtrStonePurchaseCrDesc = '';
        $jrtrStonePurchaseDrAmount = $payStoneCashAmt;
        $jrtrStonePurchaseDrAccId = $puchaseStAccId;
        $jrtrStonePurchaseDrDesc = $puchaseStName;
        $jrtrStonePurchaseDesc = 'Stone Purchase';
    }
    //
    // ================================================================================================== //
    // END CODE TO ADD ACCOUNT DETAIL FOR PURCHASE STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
    // ================================================================================================== //
    //
    // ==================================================================================================== //
    // START CODE TO ADD ACCOUNT DETAIL FOR PURCHASE STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
    // ==================================================================================================== //
    //
    if ($payStoneAccId != NULL && $payStoneAccId != '') {
        $jrtrStoneStockInvCRDR = 'DR';
        //       
        $jrtrStoneStockInvCrAmount = 0;
        $jrtrStoneStockInvCrAccId = '';
        $jrtrStoneStockInvCrDesc = $jrnlTransDrDesc;
        //
        if($payStoneDrCashAmt>0){
            $payStoneCashAmt = $payStoneDrCashAmt;
        }
        $jrtrStoneStockInvDrAmount = $payStoneCashAmt;
        $jrtrStoneStockInvDrAccId = $stoneAccId;
        $jrtrStoneStockInvDrDesc = $stoneAccName;
        $jrtrStoneStockInvDesc = 'Stock Inventory';
        $payStoneDrCashAmt = '';
    }
    //
    // ================================================================================================== //
    // END CODE TO ADD ACCOUNT DETAIL FOR PURCHASE STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
    // ================================================================================================== //
    //
    // ********************************************************************************************************************************************
    // END CODE FOR SILVER ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // 
    // ********************************************************************************************************************************************
    // START CODE FOR STOCK & INVENTORY ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // Stock & Inventory Account
    //
    if ($payStockInvAccId != NULL && $payStockInvAccId != '') {
        $jrtrGoldSilverStockInvCRDR = 'DR';
        //     
        $jrtrGoldSilverStockInvCrAmount = 0;
        $jrtrGoldSilverStockInvCrAccId = '';
        $jrtrGoldSilverStockInvCrDesc = $jrnlTransDrDesc;
        //
        $jrtrGoldSilverStockInvDrAmount = $payCashAmt;
        $jrtrGoldSilverStockInvDrAccId = $stockInvAccId;
        $jrtrGoldSilverStockInvDrDesc = $stockInvAccName;
        $jrtrGoldSilverStockInvDesc = 'Stock Inventory';
    }
    //
    // ********************************************************************************************************************************************
    // END CODE FOR STOCK & INVENTORY ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // 
    //*********************************************************************************************************************************************
    // START CODE FOR UDHAAR OR DEPOSITE MONEY CASE @ PRIYANKA-18-SEP-17
    //*********************************************************************************************************************************************
    if ($payTotalAmtBal < 0) {
        //
        $jrtrAmtBalCRDR = 'CR';
        //
        $jrtrAmtBalCrAmount = $payTotalAmtBal;
        $jrtrAmtBalCrAccId = $totalAmtBalAccId;
        $jrtrAmtBalCrDesc = $totalAmtBalAccName;
        //
        $jrtrAmtBalDrAmount = 0;
        $jrtrAmtBalDrAccId = '';
        $jrtrAmtBalDrDesc = $jrnlTransDrDesc;
        $jrtrAmtBalDesc = 'On Purchase Balance Amt';
    }
    //
    if ($payTotalAmtBal > 0) {
        //
        $jrtrAmtBalCRDR = 'DR';
        //
        $jrtrAmtBalCrAmount = 0;
        $jrtrAmtBalCrAccId = '';
        $jrtrAmtBalCrDesc = $jrnlTransDrDesc;
        //
        $jrtrAmtBalDrAmount = $payTotalAmtBal;
        $jrtrAmtBalDrAccId = $totalAmtBalAccId;
        $jrtrAmtBalDrDesc = $totalAmtBalAccName;
        $jrtrAmtBalDesc = 'On Purchase Balance Amt';
        //
    }
}
?>