<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 18 FEB, 2018 03:40:35 PM
 *
 * @FileName: omusrtranjrnludhaaronpurchase.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  ratnakar@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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

//echo '<br/>$transactionType:' . $transactionType;
if ($transactionType == 'OnPurchase') {
    $desc = "ONPURCHASE UDHAAR ADDED";
} else if ($mainTransType == 'OnPurchase') {
    $desc = "MONEY DEPOSIT";
}

// If the below condition will true that mean - Its main udhaar entry for OnPurchase
// ... In this case no udhaar deposit entry will be enter this if condition
// we are processing money deposit entries in else condition
if ($transactionType == 'OnPurchase') {
    //
      $payTotalAmtBal = 0;
    $transType = $transactionType;

    // *************************************************************************
    // ************************ STRAT CODE FOR JRNL ENTRY **********************
    // *************************************************************************
    $jrnlTransCrAccId = $sundryDebAccId;
    $jrnlTransCrDesc = $sundryDebAccName;
    //
    $jrnlTransDrAccId = $jrnlTransAccId;
    $jrnlTransDrDesc = $jrnlTransDesc;
    //
    $jrnlTransDesc = $desc;

    // *************************************************************************
    // ************************* END CODE FOR JRNL ENTRY ***********************
    // *************************************************************************
    // *************************************************************************
    // ************************ STRAT CODE FOR JRTR ENTRY **********************
    // *************************************************************************

    $jrtrMainTransCRDR = 'DR'; // CR account details
    //

    $jrtrMainCrAmount = 0;
    $jrtrTransCrAccId = '';
    $jrtrTransCrDesc = $sundryDebAccName;
    //
    $jrtrMainDrAmount = $jrnlDrAmount;
    if ($payDiscountAmt != '') {
        $jrtrMainDrAmount = abs($jrtrMainDrAmount + $payDiscountAmt);//IF DISCOUNT IS GIVEN, ADD DISCOUNT TO DR AMOUNT@AUTHOR:@VINOD:14-03-2024
    }
    $jrtrTransDrAccId = $jrnlTransDrAccId;
    $jrtrTransDrDesc = $jrnlTransDrDesc;
    //
    $jrtrTransDesc = $jrnlTransDesc;

    // Cash account
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

    // ********************************************************************************************************************************************
    // START CODE FOR INTEREST PAID ACCOUNT ENTRY @VINOD:14-03-2024
    // ********************************************************************************************************************************************
    $jrtrInterestCRDR = 'DR';
    //
    $jrtrInterestDrAmount = abs($payInterestAmt);
    $jrtrInterestDrAccId = $interestPaidAccId;
    $jrtrInterestDrDesc = 'Interest Paid';
    //
    $jrtrInterestCrAmount = 0;
    $jrtrInterestCrAccId = '';
    $jrtrInterestCrDesc = $jrnlTransCrDesc;
    //
    $jrtrInterestDesc = $interestPaidAccName;
    // ********************************************************************************************************************************************
    // END CODE FOR INTEREST PAID ACCOUNT ENTRY @VINOD:14-03-2024
    // ********************************************************************************************************************************************
    //
    //**************************************************************************
    // START CODE FOR CGST, SGST & IGST TAXES @VINOD:14-03-2024
    //**************************************************************************
    //
    $jrtrCGSTCRDR = 'DR';
    //
    $jrtrCGSTCrAmount = 0;
    $jrtrCGSTCrAccId = '';
    $jrtrCGSTCrDesc = $jrnlTransDrDesc;
    //
    $jrtrCGSTDrAmount = $payCGSTaxAmt;
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
    $jrtrSGSTDrAmount = $paySGSTaxAmt;
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

    // *************************************************************************
    // ************************ END CODE FOR JRTR ENTRY ************************
    // *************************************************************************
    if ($payTotalAmtBal <> 0) {
        die("ONPURCHASE UDHAAR : AMOUNT BALANCE SHOULD BE ZERO");
    }
} 
// In the below else if we are processing deposit money entries for OnPurchase entries only 
else if ($mainTransType == 'OnPurchase') {
    
        $payTotalAmtBal = 0;
        $transType = $transactionType;

        // *********************************************************************
        // ************************ STRAT CODE FOR JRNL ENTRY ******************
        // *********************************************************************
        $jrnlTransCrAccId = $jrnlTransAccId;
        $jrnlTransCrDesc = $jrnlTransDesc;
        //
        $jrnlTransDrAccId = $sundryDebAccId;
        $jrnlTransDrDesc = $sundryDebAccName;
        //
        $jrnlTransDesc = $desc;

        // *********************************************************************
        // ************************ END CODE FOR JRNL ENTRY ********************
        // *********************************************************************
        //
        // *********************************************************************
        // ************************ STRAT CODE FOR JRTR ENTRY ******************
        // *********************************************************************

        $jrtrMainTransCRDR = 'CR';  // CR account details
        //
        $jrtrMainDrAmount = 0;
        $jrtrTransDrAccId = '';  // DR ACCOUNT ID WILL BE EMPTY FOR CASH UDHAAR AND ADVANCE RETUEN

        $jrtrTransDrDesc = $sundryDebAccName;
        //
        $jrtrMainCrAmount = abs($jrnlCrAmount);
        //
        if ($payDiscountAmt != '') {
            $jrtrMainCrAmount = abs($jrtrMainCrAmount + $payDiscountAmt);//IF DISCOUNT IS GIVEN, ADD DISCOUNT TO CR AMOUNT@AUTHOR:VINOD:14-03-2024
        }
        //
        $jrtrTransCrAccId = $jrnlTransCrAccId;
        $jrtrTransCrDesc = $jrnlTransCrDesc;
        $jrtrTransDesc = $jrnlTransDesc;

        // Cash account
        $jrtrCashCRDR = 'DR';
        //
        if ($payIntAmt != null || $payIntAmt != '') {
            $jrtrCashDrAmount = abs($payCashAmt + $payIntAmt); //CODE ADDED FRO INTEREST ON UDHAAR,@AUTHOR:VINOD:14-03-2024
        } else {
            $jrtrCashDrAmount = abs($payCashAmt);
        }
        //
        $jrtrCashDrAccId = $cashAccId;
        $jrtrCashDrDesc = $cashAccName;
        //
        $jrtrCashCrAmount = 0;
        $jrtrCashCrAccId = '';
        $jrtrCashCrDesc = $jrnlTransCrDesc;
        $jrtrCashDesc = 'Cash Payment';
        //

        $jrtrBankCRDR = 'DR';
        //
        $jrtrBankDrAmount = abs($payChequeAmt);
        $jrtrBankDrAccId = $bankAccId;
        $jrtrBankDrDesc = $bankAccName;
        //
        $jrtrBankCrAmount = 0;
        $jrtrBankCrAccId = '';
        $jrtrBankCrDesc = $jrnlTransCrDesc;
        $jrtrBankDesc = 'Bank NEFT/IMPS Payment';
        //
        //

        $jrtrCardCRDR = 'DR';
        //
        $jrtrCardDrAmount = abs($payCardAmt);
        $jrtrCardDrAccId = $cardAccId;
        $jrtrCardDrDesc = $cardAccName;
        //
        $jrtrCardCrAmount = 0;
        $jrtrCardCrAccId = '';
        $jrtrCardCrDesc = $jrnlTransCrDesc;
        $jrtrCardDesc = 'Card Payment';
        //
        //

        $jrtrOnlinePayCRDR = 'DR';
        //
        $jrtrOnlinePayDrAmount = abs($payOnlinePayAmt);
        $jrtrOnlinePayDrAccId = $onlinePayAccId;
        $jrtrOnlinePayDrDesc = $onlinePayAccName;
        //
        $jrtrOnlinePayCrAmount = 0;
        $jrtrOnlinePayCrAccId = '';
        $jrtrOnlinePayCrDesc = $jrnlTransCrDesc;
        $jrtrOnlinePayDesc = 'Online Payment';
        //
    
     $jrtrDiscountCRDR = 'DR';
    //
    $jrtrDiscountDrAmount = $payDiscountAmt;
    $jrtrDiscountDrAccId = $sundryDebAccId;
    $jrtrDiscountDrDesc = $sundryDebAccName;
    //
    $jrtrDiscountCrAmount = 0;
    $jrtrDiscountCrAccId = '';
    $jrtrDiscountCrDesc = $jrnlTransCrDesc;
    $jrtrDiscountDesc = 'ONPURCHASE UDHAAR DISCOUNT PAID';

//    echo $payCashAmt . "----" . $payDiscountAmt;

    if ($payTotalAmtBal <> 0) {
        die("ONPURCHASE UDHAAR DEPSOIT : AMOUNT BALANCE SHOULD BE ZERO");
    }
}
?>
