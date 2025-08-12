<?php

/*
 * Created on Mar 13, 2011 4:33:35 PM
 *
 * **************************************************************************************
 * @tutorial: Journal Trans API
 * **************************************************************************************
 * @FileName: ommpjrtr.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @AUTHOR:PRIYA29JAN13 
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
if ($transactionPanel == 'insert') {

    $queryUTrans = "INSERT INTO user_transaction (
        utrans_owner_id,utrans_firm_id,utrans_user_id,utrans_pre_invoice_no,utrans_invoice_no,utrans_unique_id,utrans_type,
        utrans_gd_gs_wt ,utrans_gd_gs_wt_type ,utrans_gd_nt_wt ,utrans_gd_nt_wt_type ,utrans_gd_fn_wt ,utrans_gd_fn_wt_type ,
        utrans_gd_ffn_wt ,utrans_gd_ffn_wt_type ,utrans_sl_gs_wt ,utrans_sl_gs_wt_type ,utrans_sl_nt_wt ,utrans_sl_nt_wt_type ,
        utrans_sl_fn_wt ,utrans_sl_fn_wt_type ,utrans_sl_ffn_wt ,utrans_sl_ffn_wt_type ,utrans_gd_paid_wt ,utrans_gd_paid_wt_typ ,
        utrans_sl_paid_wt ,utrans_sl_paid_wt_typ ,utrans_paym_acc_id ,utrans_pay_cheque_acc_id ,utrans_pay_card_acc_id ,
        utrans_pay_disc_acc_id ,utrans_pay_vat_acc_id ,utrans_cash_narratn ,utrans_cheque_no ,utrans_card_no ,utrans_disc_narratn ,
        utrans_cash_amt_rec ,utrans_pay_cheque_amt ,utrans_pay_card_amt ,utrans_discount_amt ,utrans_pay_vat_amt ,
        utrans_pay_tax_amt ,utrans_paym_oth_info ,utrans_date ,utrans_bal ,utrans_gd_rtct_wt ,utrans_gd_rtct_wt_typ ,
        utrans_sl_rtct_wt ,utrans_sl_rtct_wt_typ ,utrans_gd_bal_wt ,utrans_gd_bal_wt_typ ,utrans_panelName ,
        utrans_metal_val ,utrans_cash_rec ,utrans_item_desc ,utrans_utin_id ,utrans_jrnl_id ,utrans_vat_jrnl_id ,
        utrans_gd_rate ,utrans_sl_rate ,utrans_quantity ,utrans_tunch ,utrans_metal_type ,utrans_item_name ,
        utrans_final_fine_wt ,utrans_wastage ,utrans_lab_charges ,utrans_lab_charges_type ,utrans_valuation ,
        utrans_crdr_type ,utrans_transaction_type ,utrans_tot_amt_rec ,utrans_gd_bal_crdr ,utrans_sl_bal_crdr ,
        utrans_cash_bal_crdr ,utrans_sl_bal_wt ,utrans_sl_bal_wt_typ ,utrans_prev_metal_gd_rate ,utrans_prev_metal_sl_rate ,
        utrans_avg_gd_rate ,utrans_avg_sl_rate ,utrans_gd_PNL_amt ,utrans_sl_PNL_amt ,utrans_gold_amt ,utrans_silver_amt ,
        utrans_prev_gd_amt ,utrans_prev_sl_amt ,utrans_cash_balance ,utrans_status ,utrans_since ,utrans_other_info ,
        utrans_othr_chgs_by ,utrans_gd_othr_chgs_wt ,utrans_gd_othr_chgs_wt_typ ,utrans_sl_othr_chgs_wt ,
        utrans_sl_othr_chgs_wt_typ ,utrans_pay_opt ,utrans_oth_chgs_amt ,utrans_cry_chrg ,utrans_prev_cash_bal) VALUES (
    '$utransOwnerId','$utransFirmId','$utransUserId','$utransPreInvoiceNo','$utransInvoiceNo','$utransUniqueId','$utransType',
    '$utransGdGsWt' ,'$utransGdGsWtType' ,'$utransGdNtWt' ,'$utransGdNtWtType' ,'$utransGdFnWt' ,'$utransGdFnWtType' ,
    '$utransGdFfnWt' ,'$utransGdFfnWtType' ,'$utransSlGsWt' ,'$utransSlGsWtType' ,'$utransSlNtWt' ,'$utransSlNtWtType' ,
    '$utransSlFnWt' ,'$utransSlFnWtType' ,'$utransSlFfnWt' ,'$utransSlFfnWtType' ,'$utransGdPaidWt' ,'$utransGdPaidWtTyp' ,
    '$utransSlPaidWt' ,'$utransSlPaidWtTyp' ,'$utransPaymAccId' ,'$utransPayChequeAccId' ,'$utransPayCardAccId' ,
    '$utransPayDiscAccId' ,'$utransPayVatAccId' ,'$utransCashNarratn' ,'$utransChequeNo' ,'$utransCardNo' ,'$utransDiscNarratn' ,
    '$utransCashAmtRec' ,'$utransPayChequeAmt' ,'$utransPayCardAmt' ,'$utransDiscountAmt' ,'$utransPayVatAmt' ,
    '$utransPayTaxAmt' ,'$utransPaymOthInfo' ,'$utransDate' ,'$utransBal' ,'$utransGdRtCtWt' ,'$utransGdRtCtWtTyp' ,
    '$utransSlRtCtWt' , '$utransSlRtCtWtTyp' ,'$utransGdBalWt' ,'$utransGdBalWtTyp' ,'$utransPanelName' ,
    '$utransMetalVal' ,'$utransCashRec' ,'$utransItemDesc' ,'$utransUtinId' ,'$utransJrnlId' , '$utransVatJrnlId' ,
    '$utransGdRate' ,'$utransSlRate' ,'$utransQuantity' ,'$utransTunch' ,'$utransMetalType' ,'$utransItemName' ,
    '$utransFinalFineWt' , '$utransWastage' , '$utransLabCharges' ,'$utransLabChargesType' , '$utransValuation' ,
    '$utransCrDrType' , '$utransTransactionType' ,'$utransTotAmtRec' ,'$utransGdBalCrDr' ,'$utransSlBalCrDr' ,
    '$utransCashBalCrDr' ,'$utransSlBalWt' ,'$utransSlBalWtTyp' ,'$utransPrevMetalGdRate' ,'$utransPrevMetalSlRate' ,
    '$utransAvgGdRate' ,'$utransAvgSlRate' ,'$utransGdPNLAmt' ,'$utransSlPNLAmt' ,'$utransGoldAmt' ,'$utransSilverAmt' ,
    '$utransPrevGdAmt' ,'$utransPrevSlAmt' ,'$utransCashBalance' ,'$utransStatus' ,$currentDateTime ,'$utransOtherInfo' ,
    '$utransOthrChgsBy' ,'$utransGdOthrChgsWt' ,'$utransGdOthrChgsWtTyp' ,'$utransSlOthrChgsWt' ,
    '$utransSlOthrChgsWtTyp' , '$utransPayOpt' ,'$utransOthChgsAmt' ,'$utransCryChrg' ,'$utransPrevCashBal')";

    if (!mysqli_query($conn, $queryUTrans)) {
        die('Error: ' . mysqli_error($conn));
    }
} else if ($transactionPanel == 'delete') {
    //Delete Journal Entry
    $queryUTrans = "DELETE FROM user_transaction where utrans_id='$utransId'";
    if (!mysqli_query($conn, $queryUTrans)) {
        die('Error: ' . mysqli_error($conn));
    }
} else if ($transactionPanel == 'update') {
    $queryUTrans = "UPDATE user_transaction SET
               utrans_owner_id='$utransOwnerId',utrans_firm_id='$utransFirmId',utrans_user_id='$utransUserId',"
            . "utrans_pre_invoice_no='$utransPreInvoiceNo',utrans_invoice_no='$utransInvoiceNo',utrans_unique_id='$utransUniqueId',"
            . "utrans_type='$utransType',utrans_gd_gs_wt='$utransGdGsWt' ,utrans_gd_gs_wt_type='$utransGdGsWtType' ,"
            . "utrans_gd_nt_wt='$utransGdNtWt' ,utrans_gd_nt_wt_type='$utransGdNtWtType' ,utrans_gd_fn_wt='$utransGdFnWt' ,"
            . "utrans_gd_fn_wt_type='$utransGdFnWtType' ,utrans_gd_ffn_wt='$utransGdFfnWt' ,utrans_gd_ffn_wt_type='$utransGdFfnWtType' ,"
            . "utrans_sl_gs_wt='$utransSlGsWt' ,utrans_sl_gs_wt_type='$utransSlGsWtType' ,utrans_sl_nt_wt='$utransSlNtWt' ,"
            . "utrans_sl_nt_wt_type='$utransSlNtWtType' ,utrans_sl_fn_wt='$utransSlFnWt' ,utrans_sl_fn_wt_type='$utransSlFnWtType' ,"
            . "utrans_sl_ffn_wt='$utransSlFfnWt' ,utrans_sl_ffn_wt_type='$utransSlFfnWtType' ,utrans_gd_paid_wt='$utransGdPaidWt' ,"
            . "utrans_gd_paid_wt_typ='$utransGdPaidWtTyp' ,utrans_sl_paid_wt='$utransSlPaidWt' ,utrans_sl_paid_wt_typ='$utransSlPaidWtTyp' ,"
            . "utrans_paym_acc_id='$utransPaymAccId' ,utrans_pay_cheque_acc_id='$utransPayChequeAccId' ,utrans_pay_card_acc_id='$utransPayCardAccId' ,"
            . "utrans_pay_disc_acc_id='$utransPayDiscAccId' ,utrans_pay_vat_acc_id='$utransPayVatAccId' ,utrans_cash_narratn='$utransCashNarratn' ,"
            . "utrans_cheque_no='$utransChequeNo' ,utrans_card_no='$utransCardNo' ,utrans_disc_narratn='$utransDiscNarratn' ,"
            . "utrans_cash_amt_rec='$utransCashAmtRec' ,utrans_pay_cheque_amt='$utransPayChequeAmt' ,utrans_pay_card_amt='$utransPayCardAmt' ,"
            . "utrans_discount_amt='$utransDiscountAmt' ,utrans_pay_vat_amt='$utransPayVatAmt' ,utrans_pay_tax_amt='$utransPayTaxAmt' ,"
            . "utrans_paym_oth_info='$utransPaymOthInfo' ,utrans_date='$utransDate' ,utrans_bal='$utransBal' ,utrans_gd_rtct_wt='$utransGdRtCtWt' ,"
            . "utrans_gd_rtct_wt_typ='$utransGdRtCtWtTyp' ,utrans_sl_rtct_wt='$utransSlRtCtWt' , utrans_sl_rtct_wt_typ='$utransSlRtCtWtTyp' ,"
            . "utrans_gd_bal_wt='$utransGdBalWt' ,utrans_gd_bal_wt_typ='$utransGdBalWtTyp' ,utrans_panelName='$utransPanelName' ,"
            . "utrans_metal_val='$utransMetalVal' ,utrans_cash_rec='$utransCashRec' ,utrans_item_desc='$utransItemDesc' ,"
            . "utrans_utin_id='$utransUtinId' ,utrans_jrnl_id='$utransJrnlId' , utrans_vat_jrnl_id='$utransVatJrnlId' ,"
            . "utrans_gd_rate='$utransGdRate' ,utrans_sl_rate='$utransSlRate' ,utrans_quantity='$utransQuantity' ,utrans_tunch='$utransTunch' ,"
            . "utrans_metal_type='$utransMetalType' ,utrans_item_name='$utransItemName' ,utrans_final_fine_wt='$utransFinalFineWt' , "
            . "utrans_wastage='$utransWastage' , utrans_lab_charges='$utransLabCharges' ,utrans_lab_charges_type='$utransLabChargesType' , "
            . "utrans_valuation='$utransValuation' ,utrans_crdr_type='$utransCrDrType' , utrans_transaction_type='$utransTransactionType' ,"
            . "utrans_tot_amt_rec='$utransTotAmtRec' ,utrans_gd_bal_crdr='$utransGdBalCrDr' ,utrans_sl_bal_crdr='$utransSlBalCrDr' ,"
            . "utrans_cash_bal_crdr='$utransCashBalCrDr' ,utrans_sl_bal_wt='$utransSlBalWt' ,utrans_sl_bal_wt_typ='$utransSlBalWtTyp' ,"
            . "utrans_prev_metal_gd_rate='$utransPrevMetalGdRate' ,utrans_prev_metal_sl_rate='$utransPrevMetalSlRate' ,"
            . "utrans_avg_gd_rate='$utransAvgGdRate' ,utrans_avg_sl_rate='$utransAvgSlRate' ,utrans_gd_PNL_amt='$utransGdPNLAmt' ,"
            . "utrans_sl_PNL_amt='$utransSlPNLAmt' ,utrans_gold_amt='$utransGoldAmt' ,utrans_silver_amt='$utransSilverAmt' ,"
            . "utrans_prev_gd_amt='$utransPrevGdAmt' ,utrans_prev_sl_amt='$utransPrevSlAmt' ,utrans_cash_balance='$utransCashBalance' ,"
            . "utrans_status='$utransStatus' ,utrans_other_info='$utransOtherInfo' ,utrans_othr_chgs_by='$utransOthrChgsBy' ,"
            . "utrans_gd_othr_chgs_wt='$utransGdOthrChgsWt' ,utrans_gd_othr_chgs_wt_typ='$utransGdOthrChgsWtTyp' ,"
            . "utrans_sl_othr_chgs_wt='$utransSlOthrChgsWt' ,utrans_sl_othr_chgs_wt_typ='$utransSlOthrChgsWtTyp' , utrans_pay_opt='$utransPayOpt' ,"
            . "utrans_oth_chgs_amt='$utransOthChgsAmt' ,utrans_cry_chrg='$utransCryChrg' ,utrans_prev_cash_bal='$utransPrevCashBal' "
            . "WHERE utrans_id = '$utransId'";

    if (!mysqli_query($conn, $queryUTrans)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>