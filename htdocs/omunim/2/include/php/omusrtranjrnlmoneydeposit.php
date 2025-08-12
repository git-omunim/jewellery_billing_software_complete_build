<?php

/*
 * *****************************************************************************
 * @tutorial: 
 * *****************************************************************************
 * 
 * Created on 17 Sep, 2017 12:50:35 PM
 *
 * @FileName: omusrtranjrnlmoneydeposit.php
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

//******************************************************************************
// THIS CODE WILL BE EXCEUTE WHEN BELOW CONDITION WILL BE SATISFIED :
// 1. TRANSACTION SHOULD BE ADVANCE MONEY
// 2. OR PARENT TRANSCATION OF UDHAAR DEPOSIT SHOULD NOT BE ONPURCHASE UDHAAR 
// *****************************************************************************
//

if ($mainTransType != 'OnPurchase') {

    if ($transactionType == 'UDHAAR DEPOSIT') {
        $desc = "MONEY DEPOSIT";
    } else if ($transactionType == 'ADV MONEY' || $transactionType == 'DEPOSIT') {
        $desc = "ADVANCE MONEY ADDED";
    } else if ($transactionType == 'RECEIPT') { // FOR RECEIPT ADDED BY @PRIYANKA-17MAY18
        $desc = "RECEIPT";
    }

    // START CODE TO ADD CONDITION FOR RECEIPT @PRIYANKA-17MAY18
    if (($transactionType == 'UDHAAR DEPOSIT') || $transactionType == 'ADV MONEY' ||
            $transactionType == 'RECEIPT' || $transactionType == 'DEPOSIT') {
        // END CODE TO ADD CONDITION FOR RECEIPT @PRIYANKA-17MAY18

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
            if($_REQUEST['paymentMode'] == 'ByCash' && $transactionType == 'UDHAAR DEPOSIT'){
            $jrtrMainCrAmount = abs($jrtrMainCrAmount);  
            }else{
            $jrtrMainCrAmount = abs($jrtrMainCrAmount + $payDiscountAmt);
            } //IF DISCOUNT IS GIVEN, ADD DISCOUNT TO CR AMOUNT@AUTHOR:MADHUREE-27APRIL2021
        }
        //
        $jrtrTransCrAccId = $jrnlTransCrAccId;
        $jrtrTransCrDesc = $jrnlTransCrDesc;
        $jrtrTransDesc = $jrnlTransDesc;

        // Cash account
        $jrtrCashCRDR = 'DR';
        //
        if ($payIntAmt != null || $payIntAmt != '') {
            $jrtrCashDrAmount = abs($payCashAmt + $payIntAmt); //CODE ADDED FRO INTEREST ON UDHAAR,@AUTHOR:HEMA-27OCT2020
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
        //

        $jrtrDiscountCRDR = 'DR';
        //
        $jrtrDiscountDrAmount = abs($payDiscountAmt);
        $jrtrDiscountDrAccId = $discountAccId;
        $jrtrDiscountDrDesc = 'Discount Paid';
        //
        $jrtrDiscountCrAmount = 0;
        $jrtrDiscountCrAccId = '';
        $jrtrDiscountCrDesc = $jrnlTransCrDesc;
        $jrtrDiscountDesc = $discountAccName;

        // ********************************************************************************************************************************************
        // START CODE FOR INTEREST REC ACCOUNT ENTRY @PRIYANKA-08MAR19
        // ********************************************************************************************************************************************
        $jrtrInterestCRDR = 'CR';
        //
        $jrtrInterestDrAmount = 0;
        $jrtrInterestDrAccId = '';
        $jrtrInterestDrDesc = $jrnlTransDrDesc;
        //
        $jrtrInterestCrAmount = abs($payInterestAmt);
        $jrtrInterestCrAccId = $interestRecAccId;
        $jrtrInterestCrDesc = 'Interest Rec.';
        //
        $jrtrInterestDesc = $interestRecAccName;
        // ********************************************************************************************************************************************
        // END CODE FOR INTEREST REC ACCOUNT ENTRY @PRIYANKA-08MAR19
        // ********************************************************************************************************************************************
        //
        $jrtrCGSTCRDR = 'CR';
        //
        $jrtrCGSTDrAmount = 0;
        $jrtrCGSTDrAccId = '';
        $jrtrCGSTDrDesc = $jrnlTransCrDesc;
        //
        $jrtrCGSTCrAmount = abs($payCGSTaxAmt);
        $jrtrCGSTCrAccId = $CGSTAccId;
        $jrtrCGSTCrDesc = $CGSTAccName;
        $jrtrCGSTDesc = 'CGST TAX Rec.';
        //
        //
        //
        $jrtrSGSTCRDR = 'CR';
        //
        $jrtrSGSTDrAmount = 0;
        $jrtrSGSTDrAccId = '';
        $jrtrSGSTDrDesc = $jrnlTransCrDesc;
        //
        $jrtrSGSTCrAmount = abs($paySGSTaxAmt);
        $jrtrSGSTCrAccId = $SGSTAccId;
        $jrtrSGSTCrDesc = $SGSTAccName;
        $jrtrSGSTDesc = 'SGST TAX Rec.';
        //
        //
        //
        $jrtrIGSTCRDR = 'CR';
        //
        $jrtrIGSTDrAmount = 0;
        $jrtrIGSTDrAccId = '';
        $jrtrIGSTDrDesc = $jrnlTransCrDesc;
        //
        $jrtrIGSTCrAmount = abs($payIGSTaxAmt);
        $jrtrIGSTCrAccId = $IGSTAccId;
        $jrtrIGSTCrDesc = $IGSTAccName;
        $jrtrIGSTDesc = 'IGST TAX Rec.';
        //
        //
        // *********************************************************************
        // ************************ END CODE FOR JRTR ENTRY ********************
        // *********************************************************************
        if ($payTotalAmtBal > 0) {
            die("MONEY DEPOST : AMOUNT BALANCE SHOULD BE ZERO");
        }
    }
}
?>
