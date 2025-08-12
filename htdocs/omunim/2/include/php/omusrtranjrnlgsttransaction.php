<?php
/*
 * **************************************************************************************
 * @tutorial: JOURNAL ENTRIES FORM GST TRANSACTION @ SHUBHAM 12-OCT-18
 * **************************************************************************************
 * 
 * Created on 16 Sep, 2017 6:14:08 PM
 *
 * @FileName: omusrtranjrnlgsttransaction.php
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
if ($transactionType == 'TransPayment') {
    $desc = 'GST Transaction';
    $transType = 'TransPayment';
}

if ($transactionType == 'TransPayment') {
    $query = "SELECT * FROM transaction WHERE transaction_own_id = '$sessionOwnerId' "
            . "AND transaction_upd_sts = 'PaymentPending' "
            . "AND transaction_firm_id = '$firmId' AND transaction_pre_vch_id = '$payPreInvoiceNo' "
            . "AND transaction_post_vch_id = '$payInvoiceNo'";
    //echo '$query =='.$query;
    //
     $resQuery = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($resQuery)) {
        
    $jrtrMainDrAmount = $row['transaction_amt'];
    $jrtrTransDrAccId = $row['transaction_to_dr_acc_id'];
    $jrtrMainTransCRDR = 'DR';
    $jrtrTransDrDesc = $row['transaction_sub'];
    $jrtrTransDesc = 'GST Transaction';
    //echo '$jrtrMainDrAmount =='.$jrtrMainDrAmount.'<br />';
    //echo '$jrtrTransDrAccId =='.$jrtrTransDrAccId.'<br />';
//if (($jrtrMainCrAmount == 0 && ($jrtrMainDrAmount != 0 && $jrtrMainDrAmount != '' && $jrtrMainDrAmount != NULL)) ||
//        ($jrtrMainDrAmount == 0 && ($jrtrMainCrAmount != 0 && $jrtrMainCrAmount != '' && $jrtrMainCrAmount != NULL))) {
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
    $jrtrCrAmt = $jrtrMainCrAmount;
    $jrtrCrAccId = $jrtrTransCrAccId;
    $jrtrCrDesc = $jrtrTransCrDesc;
    $jrtrDesc = $jrtrTransDesc;
    $jrtrOthInfo = '';
    $jrtrDOB = $jrnlDate;
    $custFirstName = '';
    $custLastName = '';

    $apiType = $transApiType;
    include 'ommpjrtr.php';
    
    
//        }
    }
    //
    $jrnlTransCrAccId = $sundryDebAccId;
    $jrnlTransCrDesc = $sundryDebAccName;
    //
    $jrnlTransDrAccId = $jrnlTransAccId;
    $jrnlTransDrDesc = $jrnlTransDesc;
    //
    $jrnlTransDesc = $desc;
    //*********************************************************************************************************************************************
    /*********************************************************************************************************************************************
    // Start JRTR entry data @ PRIYANKA-18-SEP-17
    /**********************************************************************************************************************************************
    //******************************************************************************************************************************************** */
    //
    // DR account details
    $jrtrMainTransCRDR = 'DR';
    //
    $jrtrMainCrAmount = 0;
    //
    $jrtrTransCrAccId = ''; // $sundryDebAccId
    $jrtrTransCrDesc = $sundryDebAccName;
    //
    if ($payRoundOffAmt > 0.5) {       
        $jrtrMainDrAmount = ($jrnlDrAmount - $payTotOthChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt) - (1 - $payRoundOffAmt);
    } else {
        $jrtrMainDrAmount = ($jrnlDrAmount - $payTotOthChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt) + $payRoundOffAmt;
    }
    //
    //$jrtrMainDrAmount = $jrnlDrAmount - $payTotOthChgs - $payCGSTaxAmt - $paySGSTaxAmt - $payIGSTaxAmt - $payMkgCGSTAmt - $payMkgSGSTAmt;
    //
    $jrtrTransDrAccId = $jrnlTransAccId;
    $jrtrTransDrDesc = $jrnlTransDesc;
    //
    $jrtrTransDesc = $desc;
    //        
    //********************************************************************************************************************************************
    // START CODE FOR BANK TRANSACTIONS @ PRIYANKA-18-SEP-17
    //********************************************************************************************************************************************
    // Cash account
    //
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
    //
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
    //
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
    //
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
    $jrtrCGSTDrAmount = ($payCGSTaxAmt + $payMkgCGSTAmt);
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
    $jrtrSGSTDrAmount = ($paySGSTaxAmt + $payMkgSGSTAmt);
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
    $jrtrIGSTDrAmount = $payIGSTaxAmt;
    $jrtrIGSTDrAccId = $IGSTAccId;
    $jrtrIGSTDrDesc = $IGSTAccName;
    $jrtrIGSTDesc = 'IGST TAX Rec.';
    //
    // START CODE FOR MAKING CHARGES @PRIYANKA-14-DEC-17
    //
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
    //
    // END CODE FOR MAKING CHARGES @PRIYANKA-14-DEC-17
    // 
    // ********************************************************************************************************************************************
    // START CODE FOR GOLD ACCOUNT @PRIYANKA-06JUNE18
    // ********************************************************************************************************************************************
    // Gold Account
    //
    if ($payGoldAccId != NULL && $payGoldAccId != '') {
        $jrtrGoldSilverStockInvCRDR = 'DR';
        //       
        $jrtrGoldSilverStockInvCrAmount = 0;
        $jrtrGoldSilverStockInvCrAccId = '';
        $jrtrGoldSilverStockInvCrDesc = $jrnlTransDrDesc;
        //
        $jrtrGoldSilverStockInvDrAmount = $payCashAmt;
        $jrtrGoldSilverStockInvDrAccId = $goldAccId;
        $jrtrGoldSilverStockInvDrDesc = $goldAccName;
        $jrtrGoldSilverStockInvDesc = 'Gold';
    }
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
        $jrtrGoldSilverStockInvCrDesc = $jrnlTransDrDesc;
        //
        $jrtrGoldSilverStockInvDrAmount = $payCashAmt;
        $jrtrGoldSilverStockInvDrAccId = $silverAccId;
        $jrtrGoldSilverStockInvDrDesc = $silverAccName;
        $jrtrGoldSilverStockInvDesc = 'Silver';
    }
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
        $jrtrGoldSilverStockInvDesc = 'Stock & Inventory';
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