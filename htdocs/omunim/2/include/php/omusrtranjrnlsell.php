<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 16 Sep, 2017 6:14:08 PM
 *
 * @FileName: omusrtranjrnlsell.php
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
?>
<?php
//
if ($transactionType == 'sell' || $transactionType == 'ESTIMATESELL') {
    //
    $transType = 'sell';
    //
    $jrnlTransCrAccId = $jrnlTransAccId;
    $jrnlTransCrDesc = $jrnlTransDesc;
    //
    $jrnlTransDrAccId = $sundryDebAccId;
    $jrnlTransDrDesc = $sundryDebAccName;
    //
    if ($utinType == 'XRF')
        $jrnlTransDesc = 'XRF BILL';
    else
        $jrnlTransDesc = 'Product Sell';
    //
    //
    // Start JRTR entry data
    //
    // CR account details
    $jrtrMainTransCRDR = 'CR';
    //
    $jrtrMainDrAmount = 0;
    $jrtrTransDrAccId = ''; // $sundryDebAccId
    $jrtrTransDrDesc = $sundryDebAccName;
    //
    //echo '$jrtrEntryIndicator == '.$jrtrEntryIndicator.'<br />';
    //echo '$jrnlCrAmount == '.$jrnlCrAmount.'<br />';
    //
    if (($jrtrEntryIndicator != 'NO' && $sttr_indicator == 'stock' || $sttr_indicator == 'crystal' || $sttr_indicator=='rawMetal') ||
         $_SESSION['sessionProdName'] == 'OMRETL') {
        //
        if ($payRoundOffAmt > 0.5) {
            //
            // ADDED CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
            $jrtrMainCrAmount = ($jrnlCrAmount - $payTotOthChgs - $payTotHallmarkChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt - $payHallmarkCGSTAmt - $payHallmarkSGSTAmt - $payHallmarkIGSTAmt) - (1 - $payRoundOffAmt); // - $payMkgIGSTAmt;
            //
            //echo '<br/>$jrnlCrAmount @@ : ' . $jrnlCrAmount . ' ' . $payTotOthChgs . ' ' . $payCGSTaxAmt . ' ' . $paySGSTaxAmt . ' ' . $payIGSTaxAmt . ' ' . $payMkgCGSTAmt . ' ' . $payMkgSGSTAmt . ' ' . $payRoundOffAmt;
            //            
        } else {
            //
            // ADDED CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
            $jrtrMainCrAmount = ($jrnlCrAmount - $payTotOthChgs - $payTotHallmarkChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt - $payHallmarkCGSTAmt - $payHallmarkSGSTAmt - $payHallmarkIGSTAmt) + $payRoundOffAmt; // - $payMkgIGSTAmt;
            //
            //echo '<br/>$jrnlCrAmount %% : ' . $jrnlCrAmount . ' ' . $payTotOthChgs . ' ' . $payCGSTaxAmt . ' ' . $paySGSTaxAmt . ' ' . $payIGSTaxAmt . ' ' . $payMkgCGSTAmt . ' ' . $payMkgSGSTAmt . ' ' . $payRoundOffAmt;
            //            
        }
    }
    //
    //
    if ($sttr_indicator == 'stock') {
        $jrtrTransCrAccId = ''; //$jrnlTransCrAccId;
    } else {
        $jrtrTransCrAccId = $jrnlTransCrAccId;
    }
    //
    $jrtrTransCrDesc = $jrnlTransCrDesc;
    $jrtrTransDesc = $jrnlTransDesc;
    //
    //
    // Cash account
    $jrtrCashCRDR = 'DR';
    //
    $jrtrCashDrAmount = $payCashAmt;
    $jrtrCashDrAccId = $cashAccId;
    $jrtrCashDrDesc = $cashAccName;
    //
    $jrtrCashCrAmount = 0;
    $jrtrCashCrAccId = '';
    $jrtrCashCrDesc = $jrnlTransCrDesc;
    $jrtrCashDesc = 'Cash Payment';
    //
    //
    //
    $jrtrBankCRDR = 'DR';
    //
    $jrtrBankDrAmount = $payChequeAmt;
    $jrtrBankDrAccId = $bankAccId;
    $jrtrBankDrDesc = $bankAccName;
    //
    $jrtrBankCrAmount = 0;
    $jrtrBankCrAccId = '';
    $jrtrBankCrDesc = $jrnlTransCrDesc;
    $jrtrBankDesc = 'Bank NEFT/IMPS Payment';
    //
    //
    //
    $jrtrCardCRDR = 'DR';
    //
    $jrtrCardDrAmount = $payCardAmt;
    $jrtrCardDrAccId = $cardAccId;
    $jrtrCardDrDesc = $cardAccName;
    //
    $jrtrCardCrAmount = 0;
    $jrtrCardCrAccId = '';
    $jrtrCardCrDesc = $jrnlTransCrDesc;
    $jrtrCardDesc = 'Card Payment';
    //
    //
    //
    $jrtrOnlinePayCRDR = 'DR';
    //
    $jrtrOnlinePayDrAmount = $payOnlinePayAmt;
    $jrtrOnlinePayDrAccId = $onlinePayAccId;
    $jrtrOnlinePayDrDesc = $onlinePayAccName;
    //
    $jrtrOnlinePayCrAmount = 0;
    $jrtrOnlinePayCrAccId = '';
    $jrtrOnlinePayCrDesc = $jrnlTransCrDesc;
    $jrtrOnlinePayDesc = 'Online Payment';
    //
    //
    //
    $jrtrDiscountCRDR = 'DR';
    //
    $jrtrDiscountDrAmount = $payDiscountAmt;
    $jrtrDiscountDrAccId = $discountAccId;
    $jrtrDiscountDrDesc = $discountAccName;
    //
    $jrtrDiscountCrAmount = 0;
    $jrtrDiscountCrAccId = '';
    $jrtrDiscountCrDesc = $jrnlTransCrDesc;
    $jrtrDiscountDesc = 'Discount Paid';
    //
    // START FOR LOYALTY POINTS @PRIYANKA-17APR18
    $jrtrLpRedeemCRDR = 'DR';
    //
    $jrtrLpRedeemDrAmount = $lpRedeem;
    $jrtrDiscountDrAccId = $discountAccId;
    $jrtrLpRedeemDrDesc = $discountAccName;
    //
    $jrtrLpRedeemCrAmount = 0;
    $jrtrDiscountCrAccId = '';
    $jrtrLpRedeemCrDesc = $jrnlTransCrDesc;
    $jrtrLpRedeemDesc = 'Loyalty Points Redeemed';
    // END FOR LOYALTY POINTS @PRIYANKA-17APR18
    //
    $jrtrCGSTCRDR = 'CR';
    //
    $jrtrCGSTDrAmount = 0;
    $jrtrCGSTDrAccId = '';
    $jrtrCGSTDrDesc = $jrnlTransCrDesc;
    //
    $jrtrCGSTCrAmount = ($payCGSTaxAmt + $payHallmarkCGSTAmt);
    $jrtrCGSTCrAccId = $CGSTAccId;
    $jrtrCGSTCrDesc = $CGSTAccName;
    $jrtrCGSTDesc = 'CGST TAX Rec.';
    //
    $jrtrMkgCGSTCRDR = 'CR';
    //
    $jrtrMkgCGSTDrAmount = 0;
    $jrtrMkgCGSTDrAccId = '';
    $jrtrMkgCGSTDrDesc = $jrnlTransCrDesc;
    //
    $jrtrMkgCGSTCrAmount = $payMkgCGSTAmt;
    $jrtrMkgCGSTCrAccId = $CGSTAccId;
    $jrtrMkgCGSTCrDesc = $CGSTAccName;
    $jrtrMkgCGSTDesc = 'MKG CGST TAX Rec.';
    //
    $jrtrSGSTCRDR = 'CR';
    //
    $jrtrSGSTDrAmount = 0;
    $jrtrSGSTDrAccId = '';
    $jrtrSGSTDrDesc = $jrnlTransCrDesc;
    //
    $jrtrSGSTCrAmount = ($paySGSTaxAmt + $payHallmarkSGSTAmt);
    $jrtrSGSTCrAccId = $SGSTAccId;
    $jrtrSGSTCrDesc = $SGSTAccName;
    $jrtrSGSTDesc = 'SGST TAX Rec.';
    //
    $jrtrMkgSGSTCRDR = 'CR';
    //
    $jrtrMkgSGSTDrAmount = 0;
    $jrtrMkgSGSTDrAccId = '';
    $jrtrMkgSGSTDrDesc = $jrnlTransCrDesc;
    //
    $jrtrMkgSGSTCrAmount = $payMkgSGSTAmt;
    $jrtrMkgSGSTCrAccId = $SGSTAccId;
    $jrtrMkgSGSTCrDesc = $SGSTAccName;
    $jrtrMkgSGSTDesc = 'MKG SGST TAX Rec.';
    //
    $jrtrIGSTCRDR = 'CR';
    //
    $jrtrIGSTDrAmount = 0;
    $jrtrIGSTDrAccId = '';
    $jrtrIGSTDrDesc = $jrnlTransCrDesc;
    //
    $jrtrIGSTCrAmount = ($payIGSTaxAmt + $payHallmarkIGSTAmt);
    $jrtrIGSTCrAccId = $IGSTAccId;
    $jrtrIGSTCrDesc = $IGSTAccName;
    $jrtrIGSTDesc = 'IGST TAX Rec.';
    //
    $jrtrMkgIGSTCRDR = 'CR';
    //
    $jrtrMkgIGSTDrAmount = 0;
    $jrtrMkgIGSTDrAccId = '';
    $jrtrMkgIGSTDrDesc = $jrnlTransCrDesc;
    //
    $jrtrMkgIGSTCrAmount = $payMkgIGSTAmt;
    $jrtrMkgIGSTCrAccId = $IGSTAccId;
    $jrtrMkgIGSTCrDesc = $IGSTAccName;
    $jrtrMkgIGSTDesc = 'MKG IGST TAX Rec.';
    //
    // ***************************************************
    // START CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
    // ***************************************************
    $jrtrTaxVatCRDR = 'CR';
    //
    $jrtrTaxVatDrAmount = 0;
    $jrtrTaxVatDrAccId = '';
    $jrtrTaxVatDrDesc = $jrnlTransCrDesc;
    //
    $jrtrTaxVatCrAmount = $payTaxAmt;
    $jrtrTaxVatCrAccId = $TaxVatAccId;
    $jrtrTaxVatCrDesc = $TaxVatAccName;
    $jrtrTaxVatDesc = 'TAX (VAT) Rec.';
    // ***************************************************
    // END CODE FOR TAX (VAT) @PRIYANKA-15MAR2021
    // ***************************************************
    //
    //
    //
    // ****************************************************************************************************
    // START CODE FOR MAKING CHARGES @PRIYANKA-15-DEC-17
    // ****************************************************************************************************
    $jrtrMKGCRDR = 'CR';
    //
    $jrtrMKGDrAmount = 0;
    $jrtrMKGDrAccId = '';
    $jrtrMKGDrDesc = $mkgChrgsAccName;
    //
    $jrtrMKGCrAmount = $payTotOthChgs;
    $jrtrMKGCrAccId = $mkgChrgsAccId;
    $jrtrMKGCrDesc = $mkgChrgsAccName;
    $jrtrMKGDesc = 'MAKING CHARGES';
    // ****************************************************************************************************
    // END CODE FOR MAKING CHARGES @PRIYANKA-15-DEC-17
    // ****************************************************************************************************
    //
    //
    //
    // ****************************************************************************************************
    // START FOR HALLMARKING CHARGES @PRIYANKA-27MAY2022
    // ****************************************************************************************************
    // 
    $jrtrHallmarkCRDR = 'CR';
    //
    $jrtrHallmarkDrAmount = 0;
    $jrtrHallmarkDrAccId = '';
    $jrtrHallmarkDrDesc = $hallmarkChrgsAccName;
    //
    $jrtrHallmarkCrAmount = $payTotHallmarkChgs;
    $jrtrHallmarkCrAccId = $hallmarkChrgsAccId;
    $jrtrHallmarkCrDesc = $hallmarkChrgsAccName;
    $jrtrHallmarkDesc = 'HALLMARK CHARGES';
    // 
    // ****************************************************************************************************
    // END FOR HALLMARKING CHARGES @PRIYANKA-27MAY2022
    // ****************************************************************************************************
    // 
    // 
    // 
    // 
    // ****************************************************************************************************
    // START FOR TRANSACTION CHARGES @PRIYANKA-08AUG2019
    // ****************************************************************************************************
    //
    $jrtrCardTransChargsCRDR = 'DR';
    //
    $jrtrCardTransChargsDrAmount = $payCardTransChgsAmt;
    $jrtrCardTransChargsDrAccId = $CardTransChgsAmtAccId;
    $jrtrCardTransChargsDrDesc = $CardTransChgsAmtAccName;
    //
    $jrtrCardTransChargsCrAmount = 0;
    $jrtrCardTransChargsCrAccId = '';
    $jrtrCardTransChargsCrDesc = $jrnlTransCrDesc;
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
    $jrtrCourierChargsCRDR = 'CR';
    //
    $jrtrCourierChargsCrAmount = $payCourierAmt;
    $jrtrCourierChargsCrAccId = $courierAccId;
    $jrtrCourierChargsCrDesc = $courierAccName;
    //
    $jrtrCourierChargsDrAmount = 0;
    $jrtrCourierChargsDrAccId = '';
    $jrtrCourierChargsDrDesc = $jrnlTransCrDesc;
    //
    $jrtrCourierChargsDesc = 'COURIER CHARGES';
    // 
    // ===================================================================================================== //
    // END CODE TO SET COURIER CHARGES ACCOUNT & AMOUNT FOR COURIER JOURNAL ENTRY @AUTHOR:MADHUREE-18FEB2020 //
    // ===================================================================================================== //
    //
    // ======================================================================================================= //
    // START CODE TO SET OTHER CHARGES ACCOUNT JOURNAL ENTRY @AUTHOR:Vinod-26may2023 //
    // ======================================================================================================= //
    //
    $jrtrOtherChargsCRDR = 'DR';
    //
    $jrtrOtherChargsDrAmount = $payOtherAmt;
    $jrtrOtherChargsDrAccId = $otherAccId;
    $jrtrOtherChargsDrDesc = $otherAccName;
    //
    $jrtrOtherChargsCrAmount = 0;
    $jrtrOtherChargsCrAccId = '';
    $jrtrOtherChargsCrDesc = $jrnlTransCrDesc;
    //
    $jrtrOtherChargsDesc = 'OTHER CHARGES';
    // 
    // ===================================================================================================== //
    // END CODE TO SET OTHER CHARGES ACCOUNT JOURNAL ENTRY @AUTHOR:Vinod-26may2023 //
    // ===================================================================================================== //
    //
    // ===================================================================================================================== //
    // START CODE  FOR ADDITIONAL CHARGES JOURNAL ENTRY AUTHOR:@DNYANESHWARI 23MARCH2024  //
    // ===================================================================================================================== //
    //
 if($additionalChargesPlusMinus == 'minus')  {
//$payAdditionalChargsAmt=abs($payAdditionalChargsAmt);

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
} else {

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
}
    //
    // =================================================================================================================== //
    // END CODE FOR ADDITIONAL CHARGES JOURNAL ENTRY AUTHOR:@DNYANESHWARI 23MARCH2024//
    // =================================================================================================================== //
    //
    // ********************************************************************************************************************************************
    // START CODE FOR GOLD ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // Gold Account
    //
    if ($payGoldAccId != NULL && $payGoldAccId != '') {
        $jrtrGoldSilverStockInvCRDR = 'CR';
        //
        $jrtrGoldSilverStockInvCrAmount = $stockGoldVal;
        $jrtrGoldSilverStockInvCrAccId = $goldAccId;
        $jrtrGoldSilverStockInvCrDesc = $goldAccName;
        //
        $jrtrGoldSilverStockInvDrAmount = 0;
        $jrtrGoldSilverStockInvDrAccId = '';
        $jrtrGoldSilverStockInvDrDesc = $jrnlTransDrDesc;
        $jrtrGoldSilverStockInvDesc = 'Stock Inventory';
    }
    //
    // =============================================================================================== //
    // START CODE TO ADD ACCOUNT DETAIL FOR SALE GOLD ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // =============================================================================================== //
    //
    if ($saleGoldAccId != NULL && $saleGoldAccId != '') {
        $jrtrGoldSilverSaleCRDR = 'CR';
        $jrtrGoldSilverSaleDrAmount = 0;
        $jrtrGoldSilverSaleDrAccId = '';
        $jrtrGoldSilverSaleDrDesc = '';
        $jrtrGoldSilverSaleCrAmount = $payGoldCashAmt;
        $jrtrGoldSilverSaleCrAccId = $saleGdAccId;
        $jrtrGoldSilverSaleCrDesc = $saleGdName;
        $jrtrGoldSilverSaleDesc = 'Gold Sale';
    }
    //
    // ============================================================================================= //
    // END CODE TO ADD ACCOUNT DETAIL FOR SALE GOLD ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // ============================================================================================= //
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
        $jrtrGoldSilverStockInvCRDR = 'CR';
        //
        $jrtrGoldSilverStockInvCrAmount = $stockSilverVal;
        $jrtrGoldSilverStockInvCrAccId = $silverAccId;
        $jrtrGoldSilverStockInvCrDesc = $silverAccName;
        //
        $jrtrGoldSilverStockInvDrAmount = 0;
        $jrtrGoldSilverStockInvDrAccId = '';
        $jrtrGoldSilverStockInvDrDesc = $jrnlTransDrDesc;
        $jrtrGoldSilverStockInvDesc = 'Stock Inventory';
    }
    //
    // ================================================================================================= //
    // START CODE TO ADD ACCOUNT DETAIL FOR SALE SILEVR ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // ================================================================================================= //
    //
    if ($saleSilverAccId != NULL && $saleSilverAccId != '') {
        $jrtrGoldSilverSaleCRDR = 'CR';
        $jrtrGoldSilverSaleDrAmount = 0;
        $jrtrGoldSilverSaleDrAccId = '';
        $jrtrGoldSilverSaleDrDesc = '';
        $jrtrGoldSilverSaleCrAmount = $paySilverCashAmt;
        $jrtrGoldSilverSaleCrAccId = $saleSlAccId;
        $jrtrGoldSilverSaleCrDesc = $saleSlName;
        $jrtrGoldSilverSaleDesc = 'Silver Sale';
    }
    //
    // ================================================================================================ //
    // END CODE TO ADD ACCOUNT DETAIL FOR SALES SILVER ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-08OCT2020 //
    // ================================================================================================ //
    //
    // ============================================================================================================== //
    // START CODE TO ADD ACCOUNT DETAIL FOR SALE STONE & STOCK STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
    // ============================================================================================================== //
    //
    if ($saleStoneAccId != NULL && $saleStoneAccId != '') {
        $jrtrStoneSaleCRDR = 'CR';
        //
        $jrtrStoneSaleDrAmount = 0;
        $jrtrStoneSaleDrAccId = '';
        $jrtrStoneSaleDrDesc = '';
        //
        $jrtrStoneSaleCrAmount = $payStoneCashAmt;
        $jrtrStoneSaleCrAccId = $saleStAccId;
        $jrtrStoneSaleCrDesc = $saleStName;
        $jrtrStoneSaleDesc = 'Stone Sale';
    }
    //
    if ($payStoneAccId != NULL && $payStoneAccId != '') {
        $jrtrStoneStockInvCRDR = 'CR';
        //       
        $jrtrStoneStockInvCrAmount = $payStoneCrCashAmt;
        $jrtrStoneStockInvCrAccId = $stoneAccId;
        $jrtrStoneStockInvCrDesc = $stoneAccName;
        //
        $jrtrStoneStockInvDrAmount = 0;
        $jrtrStoneStockInvDrAccId = '';
        $jrtrStoneStockInvDrDesc = $jrnlTransDrDesc;
        $jrtrStoneStockInvDesc = 'Stock Inventory';
    }
    //
    // ============================================================================================================ //
    // END CODE TO ADD ACCOUNT DETAIL FOR SALE STONE & STOCK STONE ACCOUNT ENTRY IN JRTR @AUTHOR:MADHUREE-07AUG2021 //
    // ============================================================================================================ //
    //
    // ============================================================================================= //
    // START CODE TO ADD ACCOUNT DETAIL FOR SETTLED ADVANCE ENTRY IN JRTR @AUTHOR:MADHUREE-28OCT2020 //
    // ============================================================================================= //
    //
    if ($paySettledAccId != NULL && $paySettledAccId != '') {
        if ($paySettledCRDR == 'DR') {
            $jrtrSettledEntryCRDR = $paySettledCRDR;
            $jrtrSettledEntryDrAmount = $paySettledAmt;
            $jrtrSettledEntryDrAccId = $paySettledAccId;
            $jrtrSettledEntryDrDesc = $paySettledAccDesc;
            $jrtrSettledEntryCrAmount = 0;
            $jrtrSettledEntryCrAccId = '';
            $jrtrSettledEntryCrDesc = '';
            $jrtrSettledEntryDesc = $paySettledDesc;
        } else if ($paySettledCRDR == 'CR') {
            $jrtrSettledEntryCRDR = $paySettledCRDR;
            $jrtrSettledEntryDrAmount = 0;
            $jrtrSettledEntryDrAccId = '';
            $jrtrSettledEntryDrDesc = '';
            $jrtrSettledEntryCrAmount = $paySettledAmt;
            $jrtrSettledEntryCrAccId = $paySettledAccId;
            $jrtrSettledEntryCrDesc = $paySettledAccDesc;
            $jrtrSettledEntryDesc = $paySettledDesc;
        }
    }
    //
    // =========================================================================================== //
    // END CODE TO ADD ACCOUNT DETAIL FOR SETTLED ADVANCE ENTRY IN JRTR @AUTHOR:MADHUREE-28OCT2020 //
    // =========================================================================================== //
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
        $jrtrGoldSilverStockInvCRDR = 'CR';
        //
        $jrtrGoldSilverStockInvAmount = $payCashAmt;
        $jrtrGoldSilverStockInvCrAccId = $stockInvAccId;
        $jrtrGoldSilverStockInvCrDesc = $stockInvAccName;
        //
        $jrtrGoldSilverStockInvDrAmount = 0;
        $jrtrGoldSilverStockInvDrAccId = '';
        $jrtrGoldSilverStockInvDrDesc = $jrnlTransDrDesc;
        $jrtrGoldSilverStockInvDesc = 'Stock Inventory';
    }
    //
    // ********************************************************************************************************************************************
    // END CODE FOR STOCK & INVENTORY ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    //
    //echo '$payTotalAmtBal @==@ ' . $payTotalAmtBal . '<br />';
    //
    //
    if ($payTotalAmtBal > 0) {
        //
        $jrtrAmtBalCRDR = 'DR';
        //
        $jrtrAmtBalDrAmount = $payTotalAmtBal;
        $jrtrAmtBalDrAccId = $totalAmtBalAccId;
        $jrtrAmtBalDrDesc = $totalAmtBalAccName;
        //
        $jrtrAmtBalCrAmount = 0;
        $jrtrAmtBalCrAccId = '';
        $jrtrAmtBalCrDesc = $jrnlTransCrDesc;
        $jrtrAmtBalDesc = 'On Purchase Balance Amt';
    }
    //
    //
    if ($payTotalAmtBal < 0) {
        //
        $jrtrAmtBalCRDR = 'CR';
        //
        $jrtrAmtBalDrAmount = 0;
        $jrtrAmtBalDrAccId = '';
        $jrtrAmtBalDrDesc = $jrnlTransCrDesc;
        //
        $jrtrAmtBalCrAmount = $payTotalAmtBal;
        $jrtrAmtBalCrAccId = $totalAmtBalAccId;
        $jrtrAmtBalCrDesc = $totalAmtBalAccName;
        $jrtrAmtBalDesc = 'On Purchase Balance Amt';
    }
}
?>