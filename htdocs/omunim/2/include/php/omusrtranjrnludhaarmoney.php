<?php

/*
 * *****************************************************************************
 * @tutorial: 
 * *****************************************************************************
 * 
 * Created on 10 Oct, 2017 12:48:35 AM
 *
 * @FileName: omusrtranjrnludhaarmoney.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  ratnakar@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
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

if ($transactionType == 'ADV RETURN') {
    $desc = "ADVANCE MONEY RETURNED";
} else if ($transactionType == 'SCHEME RETURN') {
    $desc = "SCHEME MONEY RETURNED";
} else if ($transactionType == 'UDHAAR') {
    $desc = "UDHAAR MONEY ADDED";
} else if ($transactionType == 'PAYMENT') { // FOR PAYMENT ADDED BY @PRIYANKA-17MAY18
    $desc = "PAYMENT";
}
// START CODE TO ADD CONDITION FOR PAYMENT @PRIYANKA-17MAY18
if ($transactionType == 'UDHAAR' || $transactionType == 'ADV RETURN' || $transactionType == 'PAYMENT' || $transactionType == 'SCHEME RETURN') {
// END CODE TO ADD CONDITION FOR PAYMENT @PRIYANKA-17MAY18

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
        $jrtrMainDrAmount = abs($jrtrMainDrAmount + $payDiscountAmt);//IF DISCOUNT IS GIVEN, ADD DISCOUNT TO DR AMOUNT@AUTHOR:MADHUREE-27APRIL2021
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
    // START CODE FOR INTEREST PAID ACCOUNT ENTRY @PRIYANKA-08MAR19
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
    // END CODE FOR INTEREST PAID ACCOUNT ENTRY @PRIYANKA-08MAR19
    // ********************************************************************************************************************************************
    //
    //**************************************************************************
    // START CODE FOR CGST, SGST & IGST TAXES @ PRIYANKA-18-SEP-17
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

    //
    // *************************************************************************
    // ************************* END CODE FOR JRTR ENTRY ***********************
    // *************************************************************************

    if ($payTotalAmtBal <> 0) {
        die("UDHAAR MONEY : AMOUNT BALANCE SHOULD BE ZERO");
    }
}
?>
