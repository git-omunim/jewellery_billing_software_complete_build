<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 16 Sep, 2017 6:14:08 PM
 *
 * @FileName: omusrtranjrnlscheme.php
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
if ($transactionType == 'scheme') {
    //
      //Start Scheme Paid To Customer @Author:Vinod02/May/2023
    if($_REQUEST['transType']=='paidToCust')
    {
        $transType = 'scheme';
    //
    $jrnlTransDrAccId = $jrnlTransAccId;
    $jrnlTransDrDesc = $jrnlTransDesc;
    //
    $jrnlTransCrAccId = $sundryDebAccId;
    $jrnlTransCrDesc = $sundryDebAccName;
    //
    if ($utinType == 'scheme')
        $jrnlTransDesc = 'scheme';
    else
        $jrnlTransDesc = 'scheme Sell';
    //
    //
       // Start JRTR entry data
    //
    // CR account details
         $jrtrMainTransCRDR = 'DR';  // DR account details
        //
        $jrtrMainCrAmount = 0;
        $jrtrTransCrAccId = '';  // DR ACCOUNT ID WILL BE EMPTY FOR CASH UDHAAR AND ADVANCE RETUEN

        $jrtrTransDrDesc = $sundryDebAccName;
        //
        $jrtrMainDrAmount = abs($jrnlDrAmount);
        $jrtrTransDrAccId = $jrnlTransDrAccId;
        $jrtrTransDrDesc = $jrnlTransDrDesc;
        $jrtrTransDesc = $jrnlTransDesc;
        
        // Cash account
         $jrtrCashCRDR = 'CR';
        //
        $jrtrCashCrAmount = abs($payCashAmt);
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
        $jrtrBankCrAmount = abs($payChequeAmt);
        $jrtrBankCrAccId = $bankAccId;
        $jrtrBankCrDesc = $bankAccName;
        //
        $jrtrBankDrAmount = 0;
        $jrtrBankDrAccId = '';
        $jrtrBankDrDesc = $jrnlTransDrDesc;
        $jrtrBankDesc = 'Bank NEFT/IMPS Payment';
        //
        //
       $jrtrCardCRDR = 'CR'; 
        //
        $jrtrCardCrAmount = abs($payCardAmt);
        $jrtrCardCrAccId = $cardAccId;
        $jrtrCardCrDesc = $cardAccName;
        //
        $jrtrCardDrAmount = 0;
        $jrtrCardDrAccId = '';
        $jrtrCardDrDesc = $jrnlTransDrDesc;
        $jrtrCardDesc = 'Card Payment';
        //
        //
        $jrtrOnlinePayCRDR = 'CR';
        //
        $jrtrOnlinePayCrAmount = abs($payOnlinePayAmt);
        $jrtrOnlinePayCrAccId = $onlinePayAccId;
        $jrtrOnlinePayCrDesc = $onlinePayAccName;
        //
        $jrtrOnlinePayDrAmount = 0;
        $jrtrOnlinePayDrAccId = '';
        $jrtrOnlinePayDrDesc = $jrnlTransDrDesc;
        $jrtrOnlinePayDesc = 'Online Payment';
        //
        //   
        $jrtrDiscountCRDR = 'CR';
        //
        $jrtrDiscountCrAmount = abs($payDiscountAmt);
        $jrtrDiscountCrAccId = $discountAccId;
        $jrtrDiscountCrDesc = 'Discount Paid';
        //
        $jrtrDiscountDrAmount = 0;
        $jrtrDiscountDrAccId = '';
        $jrtrDiscountDrDesc = $jrnlTransDrDesc;
        $jrtrDiscountDesc = $discountAccName;
        //
        //
        $jrtrCGSTCRDR = 'DR';
        //
        $jrtrCGSTCrAmount = 0;
        $jrtrCGSTCrAccId = '';
        $jrtrCGSTCrDesc = $jrnlTransDrDesc;
        //
        $jrtrCGSTDrAmount = abs($payCGSTaxAmt);
        $jrtrCGSTDrAccId = $CGSTAccId;
        $jrtrCGSTDrDesc = $CGSTAccName;
        $jrtrCGSTDesc = 'CGST TAX Rec.';
        //
        //
        //
        $jrtrSGSTCRDR = 'DR';
        //
        $jrtrSGSTCrAmount = 0;
        $jrtrSGSTCrAccId = '';
        $jrtrSGSTCrDesc = $jrnlTransDrDesc;
        //
        $jrtrSGSTDrAmount = abs($paySGSTaxAmt);
        $jrtrSGSTDrAccId = $SGSTAccId;
        $jrtrSGSTDrDesc = $SGSTAccName;
        $jrtrSGSTDesc = 'SGST TAX Rec.';
        //
        //
        //
        $jrtrIGSTCRDR = 'DR';
        //
        $jrtrIGSTCrAmount = 0;
        $jrtrIGSTCrAccId = '';
        $jrtrIGSTCrDesc = $jrnlTransDrDesc;
        //
        $jrtrIGSTDrAmount = abs($payIGSTaxAmt);
        $jrtrIGSTDrAccId = $IGSTAccId;
        $jrtrIGSTDrDesc = $IGSTAccName;
        $jrtrIGSTDesc = 'IGST TAX Rec.';
        //
        //
        // *********************************************************************
        // ************************ END CODE FOR JRTR ENTRY ********************
        // *********************************************************************   
            //End Scheme Paid To Customer  @Author:Vinod02/May/2023
    }else{
    // Start JRTR entry data
    //
          $transType = 'scheme';
    //
    $jrnlTransCrAccId = $jrnlTransAccId;
    $jrnlTransCrDesc = $jrnlTransDesc;
    //
    $jrnlTransDrAccId = $sundryDebAccId;
    $jrnlTransDrDesc = $sundryDebAccName;
    //
    if ($utinType == 'scheme')
        $jrnlTransDesc = 'scheme';
    else
        $jrnlTransDesc = 'scheme Sell';
    //
    // CR account details
         $jrtrMainTransCRDR = 'CR';  // CR account details
        //
        $jrtrMainDrAmount = 0;
        $jrtrTransDrAccId = '';  // DR ACCOUNT ID WILL BE EMPTY FOR CASH UDHAAR AND ADVANCE RETUEN

        $jrtrTransDrDesc = $sundryDebAccName;
        //
        $jrtrMainCrAmount = abs($jrnlCrAmount);
        $jrtrTransCrAccId = $jrnlTransCrAccId;
        $jrtrTransCrDesc = $jrnlTransCrDesc;
        $jrtrTransDesc = $jrnlTransDesc;
        
        // Cash account
         $jrtrCashCRDR = 'DR';
        //
        $jrtrCashDrAmount = abs($payCashAmt);
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
        //
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
}}
?>