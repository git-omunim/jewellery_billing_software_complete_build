<?php
/*
 * ********************************************************************************************************************
 * @tutorial: 
 * ********************************************************************************************************************
 * 
 * Created on Aug 17 , 2024 2:01:44 PM
 *
 * @FileName: omtaxquotpayinfo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
parse_str(getTableValues("SELECT * FROM user_transaction_invoice where utin_owner_id = '$sessionOwnerId' and "
                . "utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo' $utin_date_str and "
                . "utin_type IN ('APPROVAL', 'stock','rawMetal','ItemReturn','XRF','imitation','strsilver','RetailStock','PurchaseReturn','newOrder') "
                . "and utin_transaction_type IN ('sell','ESTIMATESELL','PURBYSUPP','ItemReturn','APPROVAL', 'PurchaseReturn','newOrder') and "
                . "utin_user_id = '$userId' and utin_firm_id IN ($strFrmId)"));
//
//echo '$strFrmId=111===='.$strFrmId.'<br>';
//$totalColumns = $totalColumns - 2;
//
//echo '$totalColumns==22===='.$totalColumns.'<br>';
//
$addchar = $utin_additional_charges;

$netTotal = $utin_tot_amt_rec + $utin_cash_amt_rec;
//
// Start Code for Other Charges @Author:PRIYANKA-12OCT2018
if ($totalOthChgs > 0) {
    $totOtherChags = ($utin_oth_chgs_amt - $totalOthChgs);
}
if ($utin_oth_chgs_amt > 0) {
    $making_charges = $utin_oth_chgs_amt - $totalOthChgs;
}
//else {
$totOtherChags = $utin_oth_chgs_amt;
//}
// End Code for Other Charges @Author:PRIYANKA-12OCT2018
//
$mkgChgsCGSTAmt = $utin_pay_mkg_cgst_amt;
$mkgChgsSGSTAmt = $utin_pay_mkg_sgst_amt;
$otherTaxAmt = $utin_pay_tax_amt;
//
//echo '$mkgChgsCGSTAmt == '.$mkgChgsCGSTAmt.'<br />';
//echo '$mkgChgsSGSTAmt == '.$mkgChgsSGSTAmt.'<br />';
//
$cgstChrg = $utin_pay_cgst_chrg;
$sgstChrg = $utin_pay_sgst_chrg;
$igstChrg = $utin_pay_igst_chrg;
//
$cgstAmt = $utin_pay_cgst_amt;
$sgstAmt = $utin_pay_sgst_amt;
$igstAmt = $utin_pay_igst_amt;
//
//echo '$cgstAmt == '.$cgstAmt.'<br />';
//echo '$sgstAmt == '.$sgstAmt.'<br />';
//echo '$igstAmt == '.$igstAmt.'<br />';
//
// ADDED CODE FOR HALLMARKING CHARGES TAX @SIMRAN:17APR2023
$hallmarkChgsCGSTAmt = $utin_pay_hallmark_cgst_amt;
$hallmarkChgsSGSTAmt = $utin_pay_hallmark_sgst_amt;
$hallmarkChgsIGSTAmt = $utin_pay_hallmark_igst_amt;
//
//echo $utin_hallmark_chrgs_amt;
//
$utin_hallmark_chrgs_amt = str_replace(',', '', $utin_hallmark_chrgs_amt);
//
//
?>
<?php
$qSelSlPrItemDetails = "SELECT SUM(sttr_valuation) AS cryTotal FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
        . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
        . "and sttr_indicator IN ('stockCrystal') $sttr_date_str "
        . "and sttr_transaction_type IN('STOCK', 'sell','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE','ESTIMATESELL', 'PurchaseReturn','newOrder') "
        . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC";
//
//echo $qSelSlPrItemDetails;
//
parse_str(getTableValues("select sttr_sttr_id as rwMetSttrId from stock_transaction where sttr_owner_id='$sessionOwnerId' "
                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                . "and sttr_indicator IN ('stockCrystal') $sttr_date_str "
                . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC"));
//
parse_str(getTableValues("select sttr_indicator as rwMetIndicator from stock_transaction where sttr_owner_id='$sessionOwnerId' "
                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_id = '$rwMetSttrId' "));
//
if ($rwMetIndicator == 'rawMetal') {
    $qSelSlPrItemDetails = "SELECT SUM(sttr_valuation) AS cryTotal FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
            . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
            . "and sttr_indicator IN ('stockCrystal') $sttr_date_str "
            . "and sttr_transaction_type IN('PURBYSUPP') "
            . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC";
}
$resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
$rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails);
$cryTotal = $rowSlPrItemDetails['cryTotal'];
$metalValuation = 0;
if ($goldTotFFineWtType == '') {
    $goldTotFFineWt = 0;
    $goldTotFFineWtType = 'GM';
}
if ($silverTotFFineWtType == '') {
    $silverTotFFineWt = 0;
    $silverTotFFineWtType = 'GM';
}
if ($crystalTotFFineWtType == '') {
    $crystalTotFFineWt = 0;
    $crystalTotFFineWtType = 'CT';
}
$totalSlRtCt = 0;
$totalGdRtCt = 0;
$totalStRtCt = 0;
if ($utin_othr_chgs_by == 'byWt') {
    $utin_gd_oth_chgs_wt = convertWt($goldTotFFineWtType, $othChgsGdFnWtTyp, $othChgsGdFnWt);
    $goldTotFFineWt1 += $utin_gd_oth_chgs_wt;
    $utin_sl_oth_chgs_wt = convertWt($silverTotFFineWtType, $othChgsSlFnWtTyp, $othChgsSlFnWt);
    $silverTotFFineWt1 += $utin_sl_oth_chgs_wt;
}
//
$totalGdPaid = convertWt($goldTotFFineWtType, $rwslGdTotFnWtTyp, $rwslGdTotFnWt);
$totalSlPaid = convertWt($silverTotFFineWtType, $rwslSlTotFnWtTyp, $rwslSlTotFnWt);
$totalStPaid = convertWt($crystalTotFFineWtType, $rwslStTotFnWtTyp, $rwslStTotFnWt);
//echo '$totalStPaid'.$totalStPaid;
if ($utin_payment_mode == 'RateCut') {
    $totalGdRtCt = convertWt($goldTotFFineWtType, $utin_gd_rtct_wt_typ, $utin_gd_rtct_wt);
    $totalSlRtCt = convertWt($silverTotFFineWtType, $utin_sl_rtct_wt_typ, $utin_sl_rtct_wt);
    $totalStRtCt = convertWt($crystalTotFFineWtType, $utin_st_rtct_wt_typ, $utin_st_rtct_wt);
    $totalGdMtRtCt = $utin_gd_rate;
    $totalSlMtRtCt = $utin_sl_rate;
    $totalStMtRtCt = $utin_st_rate;
    //echo '$totalGdMtRtCt::'.$totalGdMtRtCt;
    $totalGdBal = $utin_gd_due_wt;
    $totalSlBal = $utin_sl_due_wt;
    $totalStBal = $utin_st_due_wt;
} else if ($utin_payment_mode == 'NoRateCut') {
    $totalGdBal = $utin_gd_ffn_wt + $totFinGdWt - $totalGdPaid;
    $totalSlBal = $utin_sl_ffn_wt + $totFinSlWt - $totalSlPaid;
    $totalStBal = $utin_st_nt_wt + $totFinStWt - $totalStPaid;
}
//
//START TO ADD IF CONDITION @AUTHOR:HEMA26SEP19
if ($labelType == 'ROUGH_ESTIMATE' || $labelType == 'QuotationInv') {
    $totalTaxAmount = $otherTaxAmt + $mkgChgsCGSTAmt + $mkgChgsSGSTAmt;
    $utin_cash_balance = $utin_cash_balance - ($cgstAmt + $sgstAmt + $igstAmt); // THIS LINE ADDED @AUTHOR:SHRI26SEP19
} else {
    $totalTaxAmount = $cgstAmt + $sgstAmt + $igstAmt + $otherTaxAmt + $mkgChgsCGSTAmt + $mkgChgsSGSTAmt;
}
//END TO ADD IF CONDITION @AUTHOR:HEMA26SEP19
//
//echo '$totalTaxAmount ***== '.$totalTaxAmount.'<br/>';
//
if ($utin_payment_mode == 'NoRateCut') {
    $totalAmount = $utin_prev_cash_bal + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
} else {
    //
    // START CODE FOR PREV BAL SETTLED IN SELL/PURCHASE ENTRY @PRIYANKA-29JUNE18
    if ($utin_transaction_type == 'PURBYSUPP') {
        //
        if ($utin_prev_amt_CRDR == 'DR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal * -1;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt;
            } else {
                $totalAmount = $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $utin_crystal_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
            }
        }
        //
        if ($utin_prev_amt_CRDR == 'CR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt;
            } else {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
            }
        } else {

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt;
            } else {
                if ($utin_pay_tax_on_total_amt_chk == 'checked') {
                    $totalAmount = $utin_prev_cash_bal + om_round($utin_pay_cgst_tot_amt, 0) + $totalTaxAmount + $utin_courier_chgs_amt + $cryTotal + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
                } else {
                    $totalAmount = $utin_prev_cash_bal + $utin_pay_cgst_tot_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
                }
            }
        }
    } else {
        //
        if ($utin_prev_amt_CRDR == 'DR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_total_amt + $utin_oth_chgs_amt + $utin_crystal_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt;
            } else {
                $totalAmount = $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
            }
        }
        //
        if ($utin_prev_amt_CRDR == 'CR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal * -1;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt;
            } else {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
            }
        } else {

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt;
            } else {
                if ($utin_pay_tax_on_total_amt_chk == 'checked') {
                    $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $totalTaxAmount + $utin_courier_chgs_amt + $cryTotal + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup; // $utin_discount_amt_discup minus removed @AUTHOR:SHRI04OCT19
                    //- $utin_discount_amt_discup   
                } else {
                    $totalAmount = $utin_prev_cash_bal + $utin_pay_cgst_tot_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $utin_additional_charges + $utin_hallmark_chrgs_amt - $utin_discount_amt_discup;
                    //- $utin_discount_amt_discup   
                }
            }
        }
    }
    // END CODE FOR PREV BAL SETTLED IN SELL/PURCHASE ENTRY @PRIYANKA-29JUNE18
    // 
    // 
//    echo '$totalAmount 1== '.$totalAmount.'<br/>';
    //echo '$utin_round_off_amt 1== '.$utin_round_off_amt.'<br/>';
    //
    //
    if ($invName == 'ItemReturn') {
        $totalAmount = $utin_tot_payable_amt;
    }
    //
    //echo '$totalAmount 2== '.$totalAmount.'<br/>';
    //
}
$selUrdInvoiceOptionQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'UrdInvoiceOption'";
$resUrdInvoiceOption = mysqli_query($conn, $selUrdInvoiceOptionQuery);
$rowUrdInvoiceOption = mysqli_fetch_array($resUrdInvoiceOption);
$UrdInvoiceOption = $rowUrdInvoiceOption['omly_value'];
?>
<tr>
    <td width="100%" colspan="<?php echo $totalColumns; ?>" style="border-right: none !important;">
        <table width="100%">
            <?php
//            $fieldName = 'metalRec';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($metalRec_check == 'true') {
                if ($UrdInvoiceOption == 'byOldMetalInvoiceNo' || $UrdInvoiceOption == 'byPurchaseInvoiceNo') {
                     $qSelRawMetDet = "SELECT sttr_id,sttr_metal_type,sttr_metal_rate,sttr_item_name,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_purity,sttr_metal_rate,sttr_fine_weight,sttr_valuation,sttr_firm_id,sttr_item_name FROM stock_transaction where sttr_utin_id = '$utin_id' and sttr_transaction_type IN ('SellPurchase','RECEIVED','PAID') and sttr_indicator IN ('rawMetal','crystal') $sttr_date_str and sttr_user_id='$userId' order by sttr_id asc";
                } else {
                     $qSelRawMetDet = "SELECT sttr_id,sttr_metal_type,sttr_metal_rate,sttr_item_name,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_purity,sttr_metal_rate,sttr_fine_weight,sttr_valuation,sttr_firm_id,sttr_item_name FROM stock_transaction where sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_transaction_type IN ('SellPurchase','RECEIVED','PAID','ESTIMATE_RECEIVED') and sttr_indicator IN ('rawMetal','crystal') $sttr_date_str and sttr_user_id='$userId' order by sttr_id asc";
                }
                $resRawMetDet = mysqli_query($conn, $qSelRawMetDet);
                $noOfRawMet = mysqli_num_rows($resRawMetDet);
                while ($rowRawMetDet = mysqli_fetch_array($resRawMetDet)) {
                    $rawId = $rowRawMetDet['sttr_id'];
                    $rawMetType = $rowRawMetDet['sttr_metal_type'];
                    $metalRate = $rowRawMetDet['sttr_metal_rate'];
                    $metalName = $rowRawMetDet['sttr_item_name'];
                    $rwsl_rc_gt_wgt = $rowRawMetDet['sttr_gs_weight'];
                    $rwsl_rc_gt_wgt_typ = $rowRawMetDet['sttr_gs_weight_type'];
                    $rwsl_rc_lt_wgt = $rowRawMetDet['sttr_pkt_weight'];
                    $rwsl_rc_lt_wgt_typ = $rowRawMetDet['sttr_pkt_weight_type'];
                    $rwsl_rc_nt_wgt = $rowRawMetDet['sttr_nt_weight'];
                    $rwsl_rc_nt_wgt_typ = $rowRawMetDet['sttr_nt_weight_type'];
                    $rwsl_rc_tunch = $rowRawMetDet['sttr_purity'];
                    $rwsl_rc_rate = $rowRawMetDet['sttr_metal_rate'];
                    $rwsl_rc_fn_wgt = $rowRawMetDet['sttr_fine_weight'];
                    $rwsl_rc_val = $rowRawMetDet['sttr_valuation'];
                    $rwsl_firm_id = $rowRawMetDet['sttr_firm_id'];
                    $rwsl_rc_name = $rowRawMetDet['sttr_item_name'];

                    $totalFinalMetBal += $rwsl_rc_val;

                    if ($rawMetType == 'Gold') {
                        $metal = $goldShort;
                        $rwslGdTotFnWt += getTotalWeight($rwsl_rc_fn_wgt, $rwsl_rc_nt_wgt_typ, 'weight');
                        $rwslGdTotFnWtTyp = 'GM';
                        $newRwSlGdTotFnWt = convertWt($goldTotFFineWtType, $rwslGdTotFnWtTyp, $rwslGdTotFnWt);
                        $rwsl_wgt_bal = $totalGdWt - $newRwSlGdTotFnWt;
                        $rwsl_wgt_bal_typ = $goldTotFFineWtType;
                    }
                    if ($rawMetType == 'Silver') {
                        $metal = $silverShort;
                        $rwslSlTotFnWt += getTotalWeight($rwsl_rc_fn_wgt, $rwsl_rc_nt_wgt_typ, 'weight');
                        $rwslSlTotFnWtTyp = 'GM';
                        $newRwSlSrTotFnWt = convertWt($silverTotFFineWtType, $rwslSlTotFnWtTyp, $rwslSlTotFnWt);
                        $rwsl_wgt_bal = $totalSlWt - $newRwSlSrTotFnWt;
                        $rwsl_wgt_bal_typ = $silverTotFFineWtType;
                    }
                    if ($rawMetType == 'crystal') {
                        $metal = $crystalShort;
                        $rwslStTotFnWt += getTotalWeight($rwsl_rc_nt_wgt, $rwsl_rc_nt_wgt_typ, 'weight');
                        $rwslStTotFnWtTyp = 'CT';
                        $newRwSlStTotFnWt = convertWt($crystalTotFFineWtType, $rwslStTotFnWtTyp, $rwslStTotFnWt);
                        $rwsl_wgt_bal = $totalStWt - $newRwSlStTotFnWt;
                        $rwsl_wgt_bal_typ = $crystalTotFFineWtType;
                    }

//                    $fieldName = 'rawMetalWt';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <tr>
                        <td width=" 100%" colspan="<?php echo $totalColumns; ?>">
                            <table width=" 100%" vlaign="top" align="left">
                                <tr>
                                    <td align = "left">
                                        <div style="text-align: left;">
                                            <?php
                                            $fieldName = 'URDInvNoTitle';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,"
                                                            . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' "
                                                            . "and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                        echo '$label_field_check'.$label_field_check;
                                            if ($label_field_check == 'true') {
                                                ?>     
                                                <?php
                                                $showFinancialYrQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'showFinancialYr' and omly_own_id = '$sessionOwnerId'";
                                                $resShowFinancialYr = mysqli_query($conn, $showFinancialYrQuery);
                                                $rowShowFinancialYr = mysqli_fetch_array($resShowFinancialYr);
                                                $showFinancialYr = $rowShowFinancialYr['omly_value'];
                                                $fieldName = 'URDInvNoTitleLb';

                                                //
                                                parse_str(getTableValues("SELECT sttr_utin_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                                . "and sttr_indicator IN ('stock') and sttr_transaction_type IN ('sell') "
                                                                . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC"));
//                                  //
                                                $qSelSlPrReceivedItemDetails = "SELECT sttr_pre_invoice_no,sttr_invoice_no FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                        . "and sttr_indicator IN ('rawMetal') and sttr_transaction_type IN ('RECEIVED') "
                                                        . "and sttr_utin_id ='$sttr_utin_id' and sttr_status NOT IN('DELETED') order by sttr_id ASC";
                                                $resSelSlPrReceivedItemDetails = mysqli_query($conn, $qSelSlPrReceivedItemDetails);
                                                $rowSelSlPrReceivedItemDetails = mysqli_fetch_array($resSelSlPrReceivedItemDetails);
                                                $sttr_pre_invoice_no = $rowSelSlPrReceivedItemDetails['sttr_pre_invoice_no'];
                                                $sttr_invoice_no = $rowSelSlPrReceivedItemDetails['sttr_invoice_no'];
                                                ?>
                                                <?php
                                                $fieldName = 'URDInvNoTitleLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,"
                                                                . "label_field_font_color,label_field_check FROM labels "
                                                                . "WHERE label_own_id = '$sessionOwnerId' and "
                                                                . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>  
                                                                                            <!--<td align="right">-->
                                                <span  class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                                                       style="text-align:left!important;font-size:<?php echo $label_field_font_size; ?>px" 
                                                       onClick="this.contentEditable = 'true';">
                                                           <?php
                                                           if ($panelName == 'Estimate') {
                                                               echo "EST NO";
                                                           } else {
                                                               echo $label_field_content;
                                                           }
                                                           ?>:&nbsp;
                                                    <?php
                                                    $fieldName = 'URDInvNoTitle';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,"
                                                                    . "label_field_font_color,label_field_check FROM labels "
                                                                    . "WHERE label_own_id = '$sessionOwnerId' "
                                                                    . "and label_field_name = '$fieldName' "
                                                                    . "and label_type = '$labelType'"));
                                                    ?>  
                                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" 
                                                          style="font-size:<?php echo $label_field_font_size; ?>px">
                                                              <?php
                                                              $invFinMMStart = date('n', strtotime($invoiceDate));
                                                              if ($invFinMMStart <= 3) {
                                                                  $invFinYYStart = date('y', strtotime($invoiceDate)) - 1;
                                                                  $invFinYYEnd = date('y', strtotime($invoiceDate));
                                                              } else {
                                                                  $invFinYYStart = date('y', strtotime($invoiceDate));
                                                                  $invFinYYEnd = date('y', strtotime($invoiceDate)) + 1;
                                                              }
                                                              if ($showFinancialYr == 'YES') {
                                                                  echo $sttr_pre_invoice_no . '/' . $sttr_invoice_no . '/' . $invFinYYStart . '-' . $invFinYYEnd;
                                                              } else {
                                                                  echo $sttr_pre_invoice_no . '/' . $sttr_invoice_no;
                                                              }
                                                              ?>
                                                    </span>
                                                </span> 
                                            <?php }
                                            ?>
                                            <span style = "font-size:<?php echo $rawMetalWt_size; ?>px"
                                                  onClick = "this.contentEditable = 'true';">
                                                      <?php
                                                      if ($rawMetalWt_check == 'true') {
                                                          if ($rawMetalWt_content != '' && $rawMetalWt_content != NULL) {
                                                              echo $rawMetalWt_content;
                                                          } else {
                                                              echo $rwsl_rc_name;
                                                          }
                                                      }
                                                      ?>&nbsp; 
                                                <?php
//                                            $fieldName = 'rawMetalGsWt';
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($rawMetalGsWt_check == 'true') {
                                                    echo $rawMetalGsWt_content . " : " . $rwsl_rc_gt_wgt . ' ' . $rwsl_rc_gt_wgt_typ;
                                                    ?>&nbsp;
                                                    <?php
                                                }
//                                            $fieldName = 'rawMetalLessWt';
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($rawMetalLessWt_check == 'true') {
                                                    echo $rawMetalLessWt_content . " : " . $rwsl_rc_lt_wgt . ' ' . $rwsl_rc_lt_wgt_typ;
                                                    ?>&nbsp;
                                                    <?php
                                                }
//                                            $fieldName = 'rawMetalNetWt';
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($rawMetalNetWt_check == 'true') {
                                                    echo $rawMetalNetWt_content . " : " . $rwsl_rc_nt_wgt . ' ' . $rwsl_rc_nt_wgt_typ;
                                                    ?>&nbsp;
                                                    <?php
                                                }
//                                            $fieldName = 'rawMetalTnch';
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <?php if ($rawMetalTnch_check == 'true') { ?>
                                                                                                                                                                                                                    <!--(<?php // echo $label_field_content;                                                                                                                                              ?> :&nbsp;<?php // echo $rwsl_rc_tunch;                                                                                                                                              ?>%)-->
                                                    (<?php echo $rawMetalTnch_content .":". $rwsl_rc_tunch; ?>%)
                                                    <?php
                                                }
                                                // START CODE ADDED TO SHOW FN WT OF RAW METAL ON INVOICE @AUTHOR:HEMA26SEP19
                                                $fieldName = 'rawMetalFnWt';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($rawMetalFnWt_check == 'true') {
                                                    echo $label_field_content . " : " . $rwsl_rc_fn_wgt;
                                                }
                                                // END CODE ADDED TO SHOW FN WT OF RAW METAL ON INVOICE @AUTHOR:HEMA26SEP19
//                                            $fieldName = 'rawMetalRt';
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <?php if ($rawMetalRt_check == 'true') { ?>
                                                    (<?php echo $rawMetalRt_content; ?> :&nbsp;<?php echo $rwsl_rc_rate; ?>)
                                                <?php } ?>

                                                <?php
                                                echo "&nbsp";
//                                            $fieldName = 'Valuation';
//                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                //echo "SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                                                ?>
                                                <?php if ($Valuation_check == 'true') { ?>
                                                    <?php echo $Valuation_content; ?> :&nbsp;<?php echo $rwsl_rc_val; ?>
                                                <?php } ?> 
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td width="60%" align="left" valign="top" style="text-align: left; width: 50%;border-right: none !important; padding-left: unset;"> <!--************* YUVRAJ ADD THIS CSS FOR SET LAYOUT INVOICE @YUVRAJ 17082022 -->
                    <table width="100%" align="left" style="text-align: left; " valign="top">
                        <tr>
                            <?php
//
                            parse_str(getTableValues("SELECT utin_utin_id FROM user_transaction_invoice "
                                            . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' $utin_date_str AND utin_user_id = '$userId' "
                                            . "AND utin_firm_id IN ($strFrmId) AND (utin_gd_settled_inv_id = '$utin_id' "
                                            . "or utin_sl_settled_inv_id = '$utin_id' "
                                            . "or utin_amt_settled_inv_id = '$utin_id') AND utin_type IN ('OnPurchase')"));
//
                            $newOrderEntryQuery = "SELECT utin_utin_id FROM user_transaction_invoice "
                                    . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' $utin_date_str AND utin_user_id = '$userId' "
                                    . "AND utin_firm_id IN ($strFrmId) AND (utin_gd_settled_inv_id = '$utin_id' "
                                    . "or utin_sl_settled_inv_id = '$utin_id' or utin_st_settled_inv_id = '$utin_id' "
                                    . "or utin_amt_settled_inv_id = '$utin_id') AND utin_type IN ('newOrder') "
                                    . "AND utin_id = '$utin_utin_id'";
//
                            $resNewOrderEntry = mysqli_query($conn, $newOrderEntryQuery);
                            $noOfNewOrderEntry = mysqli_num_rows($resNewOrderEntry);
//
                            if ($noOfNewOrderEntry > 0) {
                                // FOR NEW ORDER ONPURCHASE DEPOSIT ENTRY SETTLE ISSUE @PRIYANKA-18DEC2018
                                $querysetteledinvoice = "SELECT * FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId' "
                                        //$utin_date_str // CODE COMMENTED @SIMRAN:22NOV2023
                                        . "and utin_type IN ('OnPurchase') and utin_user_id = '$userId' "
                                        . "and utin_firm_id IN ($strFrmId) and (utin_amt_settled_inv_id = '$utin_id' "
                                        . "OR utin_gd_settled_inv_id = '$utin_id' OR utin_sl_settled_inv_id = '$utin_id' OR utin_st_settled_inv_id = '$utin_id')";
                                //
//                            echo '$querysetteledinvoice=1='.$querysetteledinvoice.'<br>';
                                $resSetteledInvDetails = mysqli_query($conn, $querysetteledinvoice);
                                $noOfsetteledInv = mysqli_num_rows($resSetteledInvDetails);

                                //START CODE FOR TAKE COUNT OF GS WT, AMOUNT, CRYSTAL COUNT FOR SETTLE INVOICE : AUTHOR @DARSHANA 23 DEC 2021
                                $querysetteledinvoice = "SELECT * FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId'  "
                                        //$utin_date_str // CODE COMMENTED @SIMRAN:22NOV2023
                                        . " and utin_type NOT IN ('scheme','OnPurchase') and utin_user_id = '$userId' "
                                        . "and utin_firm_id IN ($strFrmId) and (utin_amt_settled_inv_id = '$utin_id' "
                                        . "OR utin_gd_settled_inv_id = '$utin_id' OR utin_sl_settled_inv_id = '$utin_id' OR utin_st_settled_inv_id = '$utin_id') ";
                                //
                                $resSetteledInvDetails = mysqli_query($conn, $querysetteledinvoice);
                                $noOfsetteledInv = mysqli_num_rows($resSetteledInvDetails);
                                //

                                $returnSettledInvCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_amt_settled_inv_id = '$utin_id' AND utin_type='ItemReturn'");
                                $itemGoldCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_gd_settled_inv_id = '$utin_id'");
//                            echo '$itemGoldCount=2='.$itemGoldCount;
                                $itemSilverCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_sl_settled_inv_id = '$utin_id'");
                                $itemCrystalCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_st_settled_inv_id = '$utin_id'");
                                $itemAmountCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_amt_settled_inv_id = '$utin_id'");
                                ////END CODE FOR TAKE COUNT OF GS WT, AMOUNT, CRYSTAL COUNT FOR SETTLE INVOICE : AUTHOR @DARSHANA 23 DEC 2021
                            } else {
                                $querySchemesetteledinvoice = "SELECT * FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId'  "
                                        //$utin_date_str // CODE COMMENTED @SIMRAN:22NOV2023
                                        . "and utin_type IN ('scheme') and utin_transaction_type IN ('DEPOSIT','scheme') and utin_user_id = '$userId' "
                                        . "and utin_firm_id IN ($strFrmId) and (utin_amt_settled_inv_id = '$utin_id' "
                                        . "OR utin_gd_settled_inv_id = '$utin_id' OR utin_sl_settled_inv_id = '$utin_id' OR utin_st_settled_inv_id = '$utin_id') ";
                                //
//                            echo '$querysetteledinvoice=2='.$querySchemesetteledinvoice.'<br>';
                                $resSchemeSetteledInvDetails = mysqli_query($conn, $querySchemesetteledinvoice);
                                $noOfSchemesetteledInv = mysqli_num_rows($resSchemeSetteledInvDetails);
                                // 
                                $querysetteledinvoice = "SELECT * FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId'  "
                                        //$utin_date_str // CODE COMMENTED @SIMRAN:22NOV2023
                                        . "and utin_type NOT IN ('scheme','OnPurchase') and utin_user_id = '$userId' "
                                        . "and utin_firm_id IN ($strFrmId) and (utin_amt_settled_inv_id = '$utin_id' "
                                        . "OR utin_gd_settled_inv_id = '$utin_id' OR utin_sl_settled_inv_id = '$utin_id' OR utin_st_settled_inv_id = '$utin_id') ";
                                //
                                $resSetteledInvDetails = mysqli_query($conn, $querysetteledinvoice);
                                $noOfsetteledInv = mysqli_num_rows($resSetteledInvDetails);
                                //
                                // start code to check count of gold wt, silver wt and cash balance Author : DIKSHA 08FEB2018
                                $returnSettledInvCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_amt_settled_inv_id = '$utin_id' AND utin_type='ItemReturn'");
                                $itemGoldCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_gd_settled_inv_id = '$utin_id'");
//                            echo '$itemGoldCount=2='.$itemGoldCount;
                                $itemSilverCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_sl_settled_inv_id = '$utin_id'");
                                $itemCrystalCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_st_settled_inv_id = '$utin_id'");
                                $itemAmountCount = noOfRowsCheck('utin_id', 'user_transaction_invoice', "utin_amt_settled_inv_id = '$utin_id'");
                                // End code to check count of gold wt, silver wt and cash balance Author : DIKSHA 08FEB2018


                                parse_str(getTableValues("SELECT utin_type as setteledInvType, utin_total_amt_deposit as schemePaidAmt FROM user_transaction_invoice "
                                                . "WHERE utin_owner_id = '$sessionOwnerId'  "
                                                . "and utin_type NOT IN ('OnPurchase','scheme') and utin_user_id = '$userId' "
                                                . "and utin_firm_id IN ($strFrmId) and (utin_amt_settled_inv_id = '$utin_id' "
                                                . "OR utin_gd_settled_inv_id = '$utin_id' OR utin_sl_settled_inv_id = '$utin_id' OR utin_st_settled_inv_id = '$utin_id')"));
                            }
                            $fieldName = 'settledSchemeInv';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check as settledSchemeInv_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($noOfSchemesetteledInv > 0 && $settledSchemeInv_check == true) {
                                ?>
                                <td>
                                    <table border="0" style="border-collapse: collapse;border:1px solid black;">                                    
                                        <tr style="background-color : #000080;">
                                            <?php
                                            $fieldName = 'schemeInvNo';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeInvNoLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 10%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>

                                            <?php
                                            $fieldName = 'schemeSrNo';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeSrNoLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 10%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>

                                            <?php
                                            $fieldName = 'schemeDate';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeDateLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 15%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>
                                            <?php
                                            $fieldName = 'schemeName';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeNameLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 19%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>
                                            <?php
                                            $fieldName = 'schemeDepAmt';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeDepAmtLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 13%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>  
                                            <?php
                                            $fieldName = 'schemeBonusDisc';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeBonusDiscLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 12%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>
                                            <?php
                                            $fieldName = 'schemePaidAmt';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemePaidAmtLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 11%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>
                                            <?php
                                            $fieldName = 'schemeRedeemAmt';
                                            $label_field_check = '';
                                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_check == true) {
                                                $fieldName = 'schemeRedeemAmtLb';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_font_color == 'black') {
                                                    $label_field_font_color = 'white';
                                                }
                                                ?>
                                                <th style="padding: 3px;width: 18%;font-size: <?php echo $label_field_font_size; ?>;color:<?php echo $label_field_font_color; ?>;">
                                                    <?php echo $label_field_content; ?>
                                                </th>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                        while ($rowSchemeSetteledInvDetails = mysqli_fetch_array($resSchemeSetteledInvDetails)) {

                                            //parse_str(getTableValues("SELECT * FROM kitty_money_deposit WHERE kitty_mondep_cust_id = '$userId' "
                                            //                       . "and kitty_mondep_utin_id = '$rowSetteledInvDetails[utin_id]'"));
                                            //echo "SELECT * FROM kitty_money_deposit WHERE kitty_mondep_cust_id = '$userId' "
                                            //   . "and kitty_mondep_utin_id = '$rowSetteledInvDetails[utin_id]'" . '<br />';

                                            parse_str(getTableValues("SELECT * FROM kitty WHERE kitty_cust_id = '$userId' "
                                                            . "and kitty_id = '$rowSchemeSetteledInvDetails[utin_utin_id]'"));

                                            $qSelKittyMonDepEMIEntries = "SELECT * FROM kitty_money_deposit WHERE kitty_mondep_EMI_status = 'Due' "
                                                    . "and kitty_mondep_kitty_id = '$kitty_id'";
                                            //
                                            if ($kitty_indicator == 'Interest Scheme') {
                                                $kitty_metal_type = 'CASH';
                                            }
                                            //echo '$qSelKittyMonDepEMIEntries == ' . $qSelKittyMonDepEMIEntries. '<br />';

                                            $resKittyMonDepEMIEntries = mysqli_query($conn, $qSelKittyMonDepEMIEntries);
                                            $noOfKittyMonDepEMIEntries = mysqli_num_rows($resKittyMonDepEMIEntries);
                                            //
                                            $rowSetInvDetails = mysqli_fetch_array($resSetteledInvDetails);
//                                    if ($kitty_indicator == 'Interest Scheme') {
//                                        $kitty_metal_type = "CASH";
//                                        $schemeWithInterestIndicator = 1;
//                                    }
                                            if ($kitty_metal_type == "GOLD") {
                                                $kitty_gold_wt = decimalVal($kitty_wt_amt + $kitty_bonus_metal_wt, 3);
                                            }
//                                if($rowSetInvDetails['utin_crystal_amt'] != "" || $rowSetInvDetails['utin_crystal_amt'] != null )
//                                {
//                                    $kitty_metal_bonus_amt = ($kitty_wt_amt * ($kitty_diamond_bonus_per/100));
//                                }
//                                else
//                                {
//                                    $kitty_metal_bonus_amt = ($kitty_wt_amt * ($kitty_gold_bonus_per/100));
//                                }
//                                //calculating bonus cash amount
//                                $kitty_cash_bonus = $kitty_EMI_amt * $kitty_EMI_occurrences * ($kitty_gold_bonus_per / 100);
                                            //echo '$noOfKittyMonDepEMIEntries == ' . $noOfKittyMonDepEMIEntries . '<br />';
                                            //echo "SELECT * FROM kitty WHERE kitty_cust_id = '$userId' "
                                            //   . "and kitty_id = '$rowSetteledInvDetails[utin_utin_id]'" . '<br />';
                                            ?>
                                            <tr>
                                                <?php
                                                $fieldName = 'schemeInvNo';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php $label_field_font_size; ?>;">
                                                        <a onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omSchemeAllDetails.php?kittyCustId=<?php echo "$kitty_cust_id"; ?>&kittyId=<?php echo "$kitty_id"; ?>&kittyNoOfEmi=<?php echo "$kitty_EMI_occurrences"; ?>&kittyFirmId=<?php echo $kitty_firm_id; ?>&kittystartdate=<?php echo $kitty_DOB; ?>&kittyenddate=<?php echo $kitty_end_DOB; ?>',
                                                                        '_blank', 'popup', 'width=700,height=1000,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');<?php ?>">   
                                                               <?php echo $rowSchemeSetteledInvDetails['utin_pre_invoice_no'] . $rowSchemeSetteledInvDetails['utin_invoice_no']; ?>
                                                        </a>
                                                    </td>
                                                <?php } ?>

                                                <?php
                                                $fieldName = 'schemeSrNo';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php $label_field_font_size; ?>;">
                                                        <a onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omSchemeAllDetails.php?kittyCustId=<?php echo "$kitty_cust_id"; ?>&kittyId=<?php echo "$kitty_id"; ?>&kittyNoOfEmi=<?php echo "$kitty_EMI_occurrences"; ?>&kittyFirmId=<?php echo $kitty_firm_id; ?>&kittystartdate=<?php echo $kitty_DOB; ?>&kittyenddate=<?php echo $kitty_end_DOB; ?>',
                                                                        '_blank', 'popup', 'width=700,height=1000,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');<?php ?>">   
            <?php echo $kitty_pre_serial_num . $kitty_serial_num; ?>
                                                        </a>
                                                    </td>
                                                <?php } ?>

                                                <?php
                                                $fieldName = 'schemeDate';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php echo $label_field_font_size; ?>px;"> 
                                                    <?php echo $rowSchemeSetteledInvDetails['utin_date']; ?> 
                                                    </td>
                                                <?php } ?>

                                                <?php
                                                $fieldName = 'schemeName';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php echo $label_field_font_size; ?>px;">
                                                            <?php if ($kitty_scheme != null || $kitty_scheme != '') { ?>
                                                            <span>
                                                            <?php echo $kitty_scheme; ?>
                                                            </span>
                                                            <?php
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </td>
                                                <?php } ?>

                                                <?php
                                                $fieldName = 'schemeDepAmt';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php echo $label_field_font_size; ?>px;">
                                                            <?php if ($kitty_paid_amt != null || $kitty_paid_amt != '') { ?>
                                                            <span>
                                                                <?php
                                                                if ($noOfKittyMonDepEMIEntries == 0) {
                                                                    echo ($kitty_paid_amt);
                                                                } else {
                                                                    echo ($kitty_paid_amt);
                                                                }
                                                                ?>
                                                            </span>
                                                            <?php
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </td>
                                                <?php } ?>

                                                <?php
                                                $fieldName = 'schemeBonusDisc';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php echo $label_field_font_size; ?>px;">
                                                            <?php
                                                            if ($kitty_metal_type != "GOLD") {
                                                                if ($kitty_paid_bonus_amt != null || $kitty_paid_bonus_amt != '') {
                                                                    ?>
                                                                <span>
                                                                    <?php
                                                                    if ($noOfKittyMonDepEMIEntries == 0) {
                                                                        echo $kitty_paid_bonus_amt;
                                                                    }
                                                                    ?>
                                                                </span>
                                                                <?php
                                                            } else {
                                                                echo "-";
                                                            }
                                                        } else {
                                                            //decimalVal($utin_gd_ffn_wt, 3)
                                                            if ($kitty_wt_amt != null || $kitty_wt_amt != '') {
                                                                ?>
                                                                <span>
                                                                    <?php
                                                                    if ($noOfKittyMonDepEMIEntries == 0) {
                                                                        echo decimalVal(doubleval($kitty_wt_amt + $kitty_bonus_metal_wt), 3) . " GM <br/>";
                                                                        if ($kitty_bonus_metal_wt != 0) {
                                                                            echo "( " . decimalVal(doubleval($kitty_wt_amt), 3) . "+" . decimalVal(doubleval($kitty_bonus_metal_wt), 3) . " GM )";
                                                                        }
                                                                    } else {
                                                                        echo '-';
                                                                    }
                                                                    ?>
                                                                </span>
                                                                <?php
                                                            } else {
                                                                echo "-";
                                                            }
                                                        }
                                                        ?>
                                                    </td> 
                                                <?php } ?>

                                                <?php
                                                $fieldName = 'schemePaidAmt';
                                                $label_field_check = '';
                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($label_field_check == true) {
                                                    ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php echo $label_field_font_size; ?>px;">
                                                            <?php
                                                            if ($rowSchemeSetteledInvDetails['utin_total_amt_deposit'] != null ||
                                                                    $rowSchemeSetteledInvDetails['utin_total_amt_deposit'] != '') {
                                                                ?>
                                                            <span>
                                                            <?php
                                                            echo $rowSchemeSetteledInvDetails['utin_total_amt_deposit'];
                                                            ?>
                                                            </span>
                                                        <?php
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                    </td>
                                                <?php } ?>

                                                    <?php
                                                    $fieldName = 'schemeRedeemAmt';
                                                    $label_field_check = '';
                                                    parse_str(getTableValues("SELECT label_field_check,label_field_font_color,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_check == true) {
                                                        ?>
                                                    <td align="center" style="padding: 2px;color:<?php echo $label_field_font_color; ?>;font-size:<?php echo $label_field_font_size; ?>px;">
                                                        <?php
                                                        if ($kitty_metal_type != "GOLD") {
                                                            if ($kitty_paid_amt != null || $kitty_paid_amt != '') {
                                                                ?>
                                                                <span>
                                                                <?php echo $kitty_paid_amt + $kitty_paid_bonus_amt - $rowSchemeSetteledInvDetails['utin_total_amt_deposit']; ?>
                                                                </span>
                                                                <?php
                                                            } else {
                                                                echo "-";
                                                            }
                                                        } else {
                                                            if ($noOfKittyMonDepEMIEntries == 0) {
                                                                echo decimalVal($kitty_wt_amt + $kitty_bonus_metal_wt, 3) . " GM <br/>";
                                                                if ($kitty_metal_bonus_amt != 0) {
                                                                    echo "( " . decimalVal($kitty_wt_amt, 3) . "+" . decimalVal($kitty_bonus_metal_wt, 3) . " GM )";
                                                                }
                                                            } else {
                                                                echo '-';
                                                            }
                                                        }
                                                        ?>
                                                    </td> 
                                    <?php } ?>
                                            </tr>                              
                                <?php } ?>                         
                                    </table>  
                                </td>
                                <?php
                                if ($kitty_gold_wt > 0) {
                                    parse_str(getTableValues("SELECT utin_scheme_gold_valuation FROM user_transaction_invoice WHERE utin_pre_invoice_no = '$slPrPreInvoiceNo' AND utin_invoice_no = '$slPrInvoiceNo' "));
                                    $kitty_Disc_amt = ($utin_scheme_gold_valuation / 10) * $kitty_gold_wt;
                                }
                            }
                            ?>
                        </tr> 
                        <!-- Adding this code for displaying making total amount / discount and applying charges -->
                                    <?php
                                    $fieldName = 'schemeMkg';
                                    parse_str(getTableValues("SELECT label_field_check as schemeMkg_Check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($noOfSchemesetteledInv > 0 && $schemeMkg_Check == 'true') {
                                        ?>
                            <tr>
                                <td valign="top" width: 90px;">
                                    <table>
                                        <?php
                                        $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                                . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                                . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                                                . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn', 'newOrder') $sttr_date_str "
                                                . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";

                                        $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                                        $noOf = mysqli_num_rows($resSlPrItemDetails);
                                        while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
//                                         echo "<pre>";
//                                         print_r($rowSlPrItemDetails);
                                            $slPrItemLabourChgsBy = $rowSlPrItemDetails['sttr_mkg_charges_by'];

                                            if ($slPrItemLabourChgsBy == 'mkgByNetWt') {
                                                $slPrItemFFNW = $rowSlPrItemDetails['sttr_nt_weight'];
                                            } else if ($slPrItemLabourChgsBy == 'mkgByGrossWt') {
                                                $slPrItemFFNW = $rowSlPrItemDetails['sttr_gs_weight'];
                                            } else {
                                                $slPrItemFFNW = $rowSlPrItemDetails['sttr_final_fine_weight'];
                                            }
                                            //
                                            $slPrItemMetal = $rowSlPrItemDetails['sttr_metal_type'];
                                            //Checking making charges type
                                            $sttr_making_charges = $rowSlPrItemDetails['sttr_making_charges'];
                                            if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'PP') {
                                                if ($sttr_making_charges != "" || $sttr_making_charges != null) {
                                                    $total_mak_ch = $sttr_making_charges * $rowSlPrItemDetails['sttr_quantity'];
                                                } else {
                                                    $total_mak_ch = $rowSlPrItemDetails['sttr_total_making_charges'];
                                                }
                                                //
                                                $total_mkg = $rowSlPrItemDetails['sttr_mkg_discount_amt'] * $rowSlPrItemDetails['sttr_quantity'];
                                                if ($total_mkg != "") {
                                                    $discount_ch = $total_mak_ch - $total_mkg;
                                                }
                                            } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'per') {

                                                if ($rowSlPrItemDetails['sttr_making_charges'] != "" || $rowSlPrItemDetails['sttr_making_charges'] != null) {
                                                    $gsWt = $slPrItemFFNW;
                                                    $gsWtTyp = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                                    $labNOthCharges = ($rowSlPrItemDetails['sttr_making_charges'] * $gsWt) / 100;
                                                    //
                                                    //
                                                    if ($slPrItemMetal == 'Gold') {
                                                        if ($gsWtTyp == 'KG') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) * 100);
                                                        } else if ($gsWtTyp == 'GM') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 10);
                                                        } else if ($gsWtTyp == 'MG') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (100 * 100));
                                                        }
                                                    } else if ($slPrItemMetal == 'Silver') {
                                                        if ($gsWtTyp == 'KG') {
                                                            $total_mak_ch = ($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']);
                                                        } else if ($gsWtTyp == 'GM') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 1000);
                                                        } else if ($gsWtTyp == 'MG') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (1000 * 1000) );
                                                        }
                                                    } else {
                                                        // START CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
                                                        if ($gsWtTyp == 'KG') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) * 100);
                                                        } else if ($gsWtTyp == 'GM') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 10);
                                                        } else if ($gsWtTyp == 'MG') {
                                                            $total_mak_ch = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (100 * 100));
                                                        }
                                                        // END CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
                                                    }
                                                } else {
                                                    $total_mak_ch = $rowSlPrItemDetails['sttr_total_making_charges'];
                                                }
                                                //
                                                if ($kitty_gold_wt != "" && $kitty_gold_wt != 0 && $kitty_gold_wt != null) {
                                                    $total_met_mkg = (($slPrItemFFNW - $kitty_gold_wt) / 10) * ($rowSlPrItemDetails['sttr_metal_rate'] * ($rowSlPrItemDetails['sttr_making_charges'] / 100));
                                                    $total_sch_mkg = $rowSlPrItemDetails['sttr_metal_rate'] * (($kitty_gold_wt / 10) * $rowSlPrItemDetails['sttr_mkg_discount_amt'] / 100);
                                                    $total_mkg = $total_met_mkg + $total_sch_mkg;
                                                    if ($total_mkg != "") {
                                                        $discount_ch = $total_mak_ch - $total_mkg;
                                                    }
                                                } else {

                                                    $total_mkg = $rowSlPrItemDetails['sttr_total_making_amt'];
                                                    //
                                                    if ($total_mkg != "") {
                                                        $discount_ch = $total_mak_ch - $total_mkg;
                                                    }
                                                }
                                            } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'Fixed' || $rowSlPrItemDetails['sttr_making_charges_type'] == 'FIXED') {
                                                $total_mak_ch = $rowSlPrItemDetails['sttr_total_making_charges'];
                                                //
                                                $total_mkg = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                                                if ($total_mkg != "") {
                                                    $discount_ch = $total_mak_ch - $total_mkg;
                                                }
                                            } else {
                                                if ($rowSlPrItemDetails['sttr_making_charges'] != "" || $rowSlPrItemDetails['sttr_making_charges'] != null) {
                                                    $total_mak_ch = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
                                                } else {
                                                    $total_mak_ch = $rowSlPrItemDetails['sttr_total_making_charges'];
                                                }
                                                //
                                                if ($kitty_gold_wt != "" && $kitty_gold_wt != 0 && $kitty_gold_wt != null) {
                                                    $kitty_sc_mkg_amt = $kitty_gold_wt * $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                                                    $remGd_wt_mkg_amt = ($slPrItemFFNW - $kitty_gold_wt) * $rowSlPrItemDetails['sttr_making_charges'];

                                                    if ($kitty_sc_mkg_amt != "" && $remGd_wt_mkg_amt != "") {
                                                        $total_mkg = $kitty_sc_mkg_amt + $remGd_wt_mkg_amt;
                                                    } else {
                                                        $total_mkg = $rowSlPrItemDetails['sttr_total_making_amt'];
                                                    }
                                                    if ($total_mak_ch > 0 && $total_mkg > 0) {
                                                        $discount_ch = $total_mak_ch - $total_mkg;
                                                    }
                                                } else {
                                                    $total_mkg = $rowSlPrItemDetails['sttr_total_making_amt'];
                                                    if (($total_mak_ch > 0) && $rowSlPrItemDetails['sttr_total_making_amt'] != "") {
                                                        $discount_ch = $total_mak_ch - $rowSlPrItemDetails['sttr_total_making_amt'];
                                                    }
                                                }
                                            }
                                            //                                                                    
                                            ?>
                                            <?php
                                            if ($rowSlPrItemDetails['sttr_indicator'] == "stock") {
                                                if ($total_mak_ch > 0) {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:left;"><span style="color:red;">TOTAL MKG CH</span></td>
                                                        <td style="text-align:left;"><span style="color:red;"><?php echo "₹. " . decimalVal(doubleval($total_mak_ch), 2); ?></span></td>
                                                    </tr>
            <?php } ?>
                                                <?php
                                                if ($discount_ch > 0) {
                                                    if ($rowSlPrItemDetails['sttr_total_making_amt'] > 0 && $total_mkg > 0) {
                                                        ?>
                                                        <tr>
                                                            <td style="text-align:left;"><span style="color:blue;">DISC. MKG CH</span></td>
                                                            <td style="text-align:left;"><span style="color:blue;"><?php echo "₹. " . decimalVal(doubleval($total_mkg), 2); ?></span></td>
                                                        </tr>
                <?php } else if ($rowSlPrItemDetails['sttr_total_making_amt'] > 0) { ?>
                                                        <tr>
                                                            <td style="text-align:left;"><span style="color:blue;">DISC. MKG CH</span></td>
                                                            <td style="text-align:left;"><span style="color:blue;"><?php echo "₹. " . decimalVal(doubleval($rowSlPrItemDetails['sttr_total_making_amt']), 2); ?></span></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($discount_ch > 0) { ?>
                                                        <tr>
                                                            <td style="text-align:left;"><span style="color:green;">DISCOUNT</span></td>
                                                            <td style="text-align:left;"><span style="color:green;"><?php echo "₹. " . decimalVal(doubleval($discount_ch), 2); ?></span>  </td>
                                                        </tr>
                    <?php
                }
            }
        }
    }
    ?>
                                    </table>
                                </td>
                            </tr> 
                        <?php } ?>
                        <?php
                        //
                        //START CODE FOR CHECK SETTLED OR NOT : AUTHOR @DARSHANA 8 JAN 2021
//                        $fieldName = 'settledInv';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $settledInv = $settledInv_check;
                        //
                        if ($noOfsetteledInv > 0 && $settledInv == 'true') {
                            ?>
                            <tr>
                                <td valign="top" style="border : solid 1px #aea7a7; width: 100px;"> <!--************* END YUVRAJ ADDTHIS CODE FOR SET LAYOUT INVOICE @YUVRAJ 17082022 -->
                                    <?php
//                                    $fieldName = 'settleAmt';
//                                    parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($settleAmt_check == 'true') {
//                                        $fieldName = 'settleAmtLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($settleAmtLb_size == 0) {
                                            $settleAmtLb_size = 12;
                                        }
                                    }
                                    ?>
                                    <table>
                                        <tr style="background-color : #000080; font-size: 10px;">
                                            <th style="padding: 10px;width: 100px;">SETTLED INV NO</th> <!--************* END YUVRAJ ADDTHIS CODE FOR SET LAYOUT INVOICE @YUVRAJ 17082022 -->
                                            <?php if ($returnSettledInvCount >= 1) { ?>
                                                <th style="padding: 10px;">RETURNED/PREV INV NO</th> 
                                            <?php } ?>
                                            <th style="padding: 10px;width: 100px;">INVOICE DATE</th> <!--************* END YUVRAJ ADDTHIS CODE FOR SET LAYOUT INVOICE @YUVRAJ 17082022 -->  <!--for add date column Author : DIKSHA 08FEB2019--> 
                                            <?php
                                            if ($itemGoldCount > 0) {
//                                    echo '$itemGoldCount=1=' . $itemGoldCount . '<br>';
                                                ?>
                                                <th style="padding: 10px;">GD WT</th>
                                            <?php } if ($itemSilverCount > 0) { ?>
                                                <th style="padding: 10px;">SL WT</th>
                                        <?php } if ($itemCrystalCount > 0) { ?> 
                                                <th style="padding: 10px;">ST WT</th>
                                        <?php } if ($itemAmountCount > 0) { ?>
                                                <th style="padding: 10px;">MOP</th>                                       
                                        <?php } if ($itemAmountCount > 0) { ?>
                                                <th style="padding: 10px;"> AMOUNT</th>
                                        <?php } ?>
                                        </tr>
                                        <?php
                                        $utin_left_amount = 0;
                                        $utin_cash_CRDR = '';
                                        while ($rowSetteledInvDetails = mysqli_fetch_array($resSetteledInvDetails)) {
                                            $prevSellInv = $rowSetteledInvDetails['utin_other_info'];
                                            $setteledInvType = $rowSetteledInvDetails['utin_type'];
                                            $utin_left_amount = $rowSetteledInvDetails['utin_left_amount'];
                                            if ($utin_left_amount == '') {
                                                $utin_left_amount = $rowSetteledInvDetails['utin_cash_balance'];
                                            }
                                            $utin_cash_CRDR = $rowSetteledInvDetails['utin_cash_CRDR'];
                                            $prevSellInv = explode("<br>", $prevSellInv);
                                            $prevSellInv = $prevSellInv[0];
                                            $prevSellInv = explode(":", $prevSellInv);
                                            $prevSellInv = $prevSellInv[1];
                                            $prevSellInv = str_replace(' ', '', $prevSellInv);
                                            ?>
                                            <tr>
                                                    <?php if ($returnSettledInvCount >= 1) { ?>
                                                    <td align="center">
            <?php
            if ($setteledInvType != 'ItemReturn') {
                echo $rowSetteledInvDetails['utin_pre_invoice_no'] . $rowSetteledInvDetails['utin_invoice_no'];
            } else {
                echo '-';
            }
            ?>
                                                    </td>
                                                    <td align="center">
                                                    <?php
                                                    if ($setteledInvType == 'ItemReturn') {
                                                        echo $rowSetteledInvDetails['utin_pre_invoice_no'] . $rowSetteledInvDetails['utin_invoice_no'] . ' / ' . $prevSellInv;
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td align="center">
                                                    <?php
                                                    echo $rowSetteledInvDetails['utin_pre_invoice_no'] . $rowSetteledInvDetails['utin_invoice_no'];
                                                    ?>
                                                    </td>
                                                    <?php } ?>
                                                <td align="center"> <!--for add date column Author : DIKSHA 08FEB2019-->
                                                    <?php echo $rowSetteledInvDetails['utin_date']; ?> 
                                                </td>
                                                    <?php if ($itemGoldCount > 0) { ?>
                                                    <td align="right">
                                                              <?php if ($rowSetteledInvDetails['utin_gd_settled_inv_id'] != null || $rowSetteledInvDetails['utin_gd_settled_inv_id'] != '') { ?>
                                                            <span style="color:<?php
                                                  if ($rowSetteledInvDetails['utin_gd_CRDR'] == 'CR') {
                                                      echo "green";
                                                  } else {
                                                      echo "red";
                                                  }
                                                                  ?>">
                                                        <?php echo abs($rowSetteledInvDetails['utin_gd_due_wt']) . " " . $rowSetteledInvDetails['utin_gd_due_wt_typ'] . " " . $rowSetteledInvDetails['utin_gd_crdr']; ?>
                                                            </span>
                                                            <?php
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php } if ($itemSilverCount > 0) { ?>
                                                    <td align="right">
                                                              <?php if ($rowSetteledInvDetails['utin_sl_settled_inv_id'] != null || $rowSetteledInvDetails['utin_sl_settled_inv_id'] != '') { ?>
                                                            <span style="color:<?php
                                                  if ($rowSetteledInvDetails['utin_sl_CRDR'] == 'CR') {
                                                      echo "green";
                                                  } else {
                                                      echo "red";
                                                  }
                                                                  ?>">
                                                        <?php echo abs($rowSetteledInvDetails['utin_sl_due_wt']) . " " . $rowSetteledInvDetails['utin_sl_due_wt_typ'] . " " . $rowSetteledInvDetails['utin_sl_crdr']; ?>
                                                            </span>
                                                        <?php
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                    </td>
                                                        <?php
                                                    } if ($itemCrystalCount > 0) {
                                                        //START CODE FOR STONE: AUTHOR @DARSHANA 19 JULY 2021
                                                        ?>
                                                    <td align="right">
                                                              <?php if ($rowSetteledInvDetails['utin_st_settled_inv_id'] != null || $rowSetteledInvDetails['utin_st_settled_inv_id'] != '') { ?>
                                                            <span style="color:<?php
                                                  if ($rowSetteledInvDetails['utin_st_CRDR'] == 'CR') {
                                                      echo "green";
                                                  } else {
                                                      echo "red";
                                                  }
                                                                  ?>">
                                                            <?php echo abs($rowSetteledInvDetails['utin_st_due_wt']) . " " . $rowSetteledInvDetails['utin_st_due_wt_typ'] . " " . $rowSetteledInvDetails['utin_sl_crdr']; ?>
                                                            </span>
                                                        <?php
                                                    } else {
                                                        echo "-";
                                                    }
                                                    //END CODE FOR STONE: AUTHOR @DARSHANA 19 JULY 2021
                                                    ?>
                                                    </td>
        <?php } if ($itemAmountCount > 0) { ?>
            <?php if ($setteledInvType != 'stock') { ?>
                                                        <td>
                                                            <table width="100%" align="center">
                <?php if ($rowSetteledInvDetails['utin_cash_amt_rec'] != '' || $rowSetteledInvDetails['utin_pay_cheque_amt'] != '' || $rowSetteledInvDetails['utin_pay_card_amt'] != '' || $rowSetteledInvDetails['utin_online_pay_amt'] != '') { ?>  
                    <?php if ($rowSetteledInvDetails['utin_cash_amt_rec'] !== '' && $rowSetteledInvDetails['utin_cash_amt_rec'] !== null && $rowSetteledInvDetails['utin_cash_amt_rec'] != 0) {
                        ?>
                                                                        <tr>
                                                                            <td align="right">
                                                                                <span>
                        <?php echo 'CASH: ' . abs($rowSetteledInvDetails['utin_cash_amt_rec']); ?>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                        <?php
                    } if ($rowSetteledInvDetails['utin_pay_cheque_amt'] !== '' && $rowSetteledInvDetails['utin_pay_cheque_amt'] !== null && $rowSetteledInvDetails['utin_pay_cheque_amt'] != 0) {
                        ?>
                                                                        <tr>
                                                                            <td align="right">
                                                                                <span>
                        <?php echo 'CHEQUE: ' . abs($rowSetteledInvDetails['utin_pay_cheque_amt']); ?>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                        <?php
                    } if ($rowSetteledInvDetails['utin_pay_card_amt'] != '' && $rowSetteledInvDetails['utin_pay_card_amt'] != null && $rowSetteledInvDetails['utin_pay_card_amt'] != 0) {  //START WORK ON SETTLED INVOICE AUTHOR@SIMRAN03DEC2021
                        ?>
                                                                        <tr>
                                                                            <td align="right">
                                                                                <span>
                        <?php echo 'CARD: ' . abs($rowSetteledInvDetails['utin_pay_card_amt']); ?>   
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                        <?php
                    } if ($rowSetteledInvDetails['utin_online_pay_amt'] != '' && $rowSetteledInvDetails['utin_online_pay_amt'] != null && $rowSetteledInvDetails['utin_online_pay_amt'] != 0) {   //START WORK ON SETTLED INVOICE AUTHOR@SIMRAN03DEC2021
                        ?>
                                                                        <tr>
                                                                            <td align="right">
                                                                                <span>
                        <?php echo 'ONLINE: ' . abs($rowSetteledInvDetails['utin_online_pay_amt']); ?>   
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                    <?php } ?>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td align="right">
                                                                            <span>
                                                            <?php echo 'CASH:' . abs($utin_left_amount); ?>   
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                <?php } ?>
                                                            </table>
                                                        </td>  
                                                                        <?php } else { ?>
                                                        <td>
                                                            <table width="100%" align="center" border="0">
                                                                <tr>
                                                                    <td align="right">
                                                                        <span>
                                                        <?php
                                                        echo 'OnPurchase';
                                                        ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
            <?php } ?>
                                                    <!-- START WORK ON SETTLED INVOICE AUTHOR@SIMRAN03DEC2021-->
                                                    <td align="center">
                                                        <span>
                                                <?php
                                                echo abs($utin_left_amount) . " " . $utin_cash_CRDR;
                                                ?>
                                                        </span>
                                                    </td>
                                                    <!-- END WORK ON SETTLED INVOICE AUTHOR@SIMRAN03DEC2021-->
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        <tr style="background-color: #ec9000;">
                                            <th> TOTAL</th>
                                                <?php if ($returnSettledInvCount >= 1) { ?>
                                                <th>&nbsp;</th>
                                                <?php } ?>
                                            <th>&nbsp;</th>

                                                <?php if ($itemGoldCount > 0) { ?>
                                                <th align="center" >
                                                    <?php
                                                    if ($utin_gs_prev_wt > 0) {

                                                        echo abs($utin_gs_prev_wt) . " " . $utin_gd_prev_wt_typ; //. " " . $utin_prev_gd_CRDR;
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                </th>
                                                <?php } if ($itemSilverCount > 0) { ?>
                                                <th  align="center">
                                                <?php
                                                if ($utin_sl_prev_wt > 0) {
                                                    echo abs($utin_sl_prev_wt) . " " . $utin_sl_prev_wt_typ; //." " . $utin_prev_sl_CRDR;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                                </th>
                                                    <?php
                                                } if ($itemCrystalCount > 0) {
                                                    //START CODE FOR STONE: AUHTOR@DARSHANA 19 JULY 2021
                                                    ?>
                                                <th  align="center">
                                                <?php
                                                if ($utin_st_prev_wt > 0) {
                                                    echo abs($utin_st_prev_wt) . " " . $utin_st_prev_wt_typ; //." " . $utin_prev_sl_CRDR;
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                                </th>
                                                    <?php
                                                    //END CODE FOR STONE: AUHTOR@DARSHANA 19 JULY 2021
                                                } if ($itemAmountCount > 0) {
                                                    ?>
                                                <th></th>
                                                <!-- START WORK ON SETTLED INVOICE AUTHOR@SIMRAN03DEC2021-->
                                                <th  align="center" >
        <?php
        echo abs($utin_prev_cash_bal) . " " . $utin_prev_amt_CRDR;
        ?>

                                                </th>
                                                <!-- END WORK ON SETTLED INVOICE AUTHOR@SIMRAN03DEC2021-->
                            <?php } ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
    <?php
}
if (($utin_payment_mode == 'NoRateCut' && ($utin_courier_chgs_amt != 0 || $utin_crystal_amt != 0)) || $utin_payment_mode != 'NoRateCut' || $utin_cash_amt_rec != 0) {
    ?>
                            <tr>
                                        <?php if ($sellInvSample != 'SellInvSampleTax' && $sellInvSample != 'SellInvSampleTaxWithPack') {
                                            ?>
                                    <td valign="bottom" style="float: left; text-align: left;">
                                        <table width="100%" align="left" style="text-align: left;">
                                            <?php
//                                            $fieldName = 'jRecCourierChgsAmt';
//                                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            $jRecCourierChgsAmtFont = $jRecCourierChgsAmt_size;
                                            if ($jRecCourierChgsAmt_check == 'true' && $utin_courier_chgs_amt != 0) {
//                                                $fieldName = 'jRecCourierChgsAmtLb';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($jRecCourierChgsAmtLb_size == 0) {
                                                    $jRecCourierChgsAmtLb_size = 12;
                                                }
//                                                echo '$label_field_font_size=='.$label_field_font_size.'<br>';
                                                ?>
                                                <tr>
                                                    <?php
                                                    if ($utin_courier_info != '') {
                                                        ?>
                                                        <td style="text-align:right; border-right: none !important; font-size: <?php echo $jRecCourierChgsAmtLb_size ?>px; " align="right">
                                                        <?php echo $utin_courier_info; ?> : 
                                                        </td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td style="text-align:right;border-right: none !important; font-size: <?php echo $jRecCourierChgsAmtLb_size ?>px; " align="right">
                                                            <?php echo $jRecCourierChgsAmtLb_content; ?> :
                                                        </td>
                                                    <?php
                                                }
                                                ?>

                                                    <td style="text-align:right;font-size:<?php echo $jRecCourierChgsAmtFont; ?>px;color:#000;" align="right">
                                                <?php echo formatInIndianStyle(om_round($utin_courier_chgs_amt)); ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            if ($utin_cash_amt_rec != '' && $utin_cash_amt_rec != 0 && $utin_cash_amt_rec > 0) {
//                                                $fieldName = 'jBankdetcash';
//                                                $label_field_font_size = '';
//                                                $label_field_font_color = '';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                $jBankdetcashCheck = $jBankdetcash_check;
                                                //if($label_field_check == 'true'){
                                                $cashqueary = "SELECT accounts.acc_user_acc FROM accounts WHERE acc_id = '$utin_pay_cash_acc_id'";
                                                $rescashqueary = mysqli_query($conn, $cashqueary) or die(mysqli_error($conn));
                                                $rowQuery = mysqli_fetch_array($rescashqueary);
                                                $acc_user_acc_cash = $rowQuery['acc_user_acc'];
                                                //}
                                                //START CODE FOR CASH NARRATION : AUTHOR @DARSHANA 23 DEC 2021
//                                                $fieldName = 'jRecCashNarration';
//                                                $label_field_font_size = '';
//                                                $label_field_font_color = '';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                $cashNarration = $jRecCashNarration_check;

                                                if ($label_field_check == 'true' && $cashNarration == 'true' && $utin_cash_narratn != '' && $utin_cash_narratn != NULL) {
                                                    $utinCashNarration = $utin_cash_narratn;
//                                                    echo '$utinCashNarration=' . $utinCashNarration;
                                                }
                                                //
                                                ?>  
                                                <?php
//                                                $fieldName = 'jRecCash';
//                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                $jRecCashFont = $jRecCash_size;
                                                if ($jRecCash_check == 'true') {
//                                                    $fieldName = 'jRecCashLb';
//                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    //***********************************************************************************************
                                                    //************ ADDED CONDITION FOR CASH PAID/RECEIVED FROM CUSTOMER @SIMRAN:18SEPT2023
                                                    //***********************************************************************************************
                                                    if ($utin_amt_return_status == 'YES') {
                                                        $cashReceived = 'CASH PAID';
                                                    } else {
                                                        $cashReceived = $jRecCashLb_content;
                                                    }
                                                    //***********************************************************************************************
                                                    //************ END CONDITION FOR CASH PAID/RECEIVED FROM CUSTOMER @SIMRAN:18SEPT2023
                                                    //***********************************************************************************************
                                                    if ($jRecCashLb_size == 0) {
                                                        $jRecCashLb_size = 12;
                                                    }
                                                    ?>
                                                    <tr>
                                                                    <?php
                                                                    if ($utin_cash_narratn != '' && $acc_user_acc_cash != '' && $jRecCashLb_check == 'true') {
                                                                        ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCashLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcash';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                             echo "label_field_check==".$label_field_check; 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?> 
                                                                            CASH PAY /  <?php echo $acc_user_acc_cash; ?>  / 
                                                                        <?php } ?>

                                                                        <?php
                                                                        $fieldName = 'jRecCashNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                        echo "label_field_check==".$label_field_check;
                                                                        ?>
                                                            <?php
                                                            if ($label_field_check == 'true') {
                                                                echo $utin_cash_narratn;
                                                                ?> /  
                                                                        <?php } ?>  
                                                                        <?php echo $cashReceived; ?> : </span></div>
                                                            </td>
                                                                    <?php } else if ($utin_cash_narratn != '' && $acc_user_acc_cash == '') {
                                                                        ?>
                                                            <td align="left"  style="font-size:<?php echo $jRecCashLb_size; ?>px; text-align: right; padding:1px;  border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcash';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                             echo "label_field_check==".$label_field_check; 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>   
                                                                            CASH PAY /  <?php } ?>
                                                                        <?php
                                                                        $fieldName = 'jRecCashNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                        echo "label_field_check==".$label_field_check;
                                                                        ?>
                                                            <?php
                                                            if ($label_field_check == 'true') {

                                                                echo $utin_cash_narratn;
                                                                ?> /
                                                                        <?php } ?>
                                                                        <?php echo $cashReceived; ?> :   </span></div>
                                                            </td>
                                                                    <?php } else if ($acc_user_acc_cash != '' && $jRecCashLb_check == 'true') { ?>
                                                            <td align="left"  style="font-size:<?php echo $jRecCashLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcash';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                             echo "label_field_check==".$label_field_check; 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?> 
                                                                            CASH PAY /  <?php echo $acc_user_acc_cash; ?> /
                                                                        <?php } ?>  
                                                                        <?php echo $cashReceived; ?> :   </span></div>
                                                            </td> 
                                                                    <?php } else if ($utin_cash_narratn != '') { ?>
                                                            <td align="left"  style="font-size:<?php echo $jRecCashLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jRecCashNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                        echo "label_field_check==".$label_field_check;
                                                                        ?>
                                                            <?php
                                                            if ($label_field_check == 'true') {
                                                                echo $utin_cash_narratn;
                                                                ?> /
                                                                        <?php } ?>
                                                                        <?php echo $cashReceived; ?> :   </span></div>
                                                            </td> 
                <?php } else {
                    ?>
                                                            <td align="left"  style="font-size:<?php echo $jRecCashLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="paddingRight5">
                                                                    <span>
                    <?php echo $cashReceived; ?> :  
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        <?php
                                                    }
                                                    ?>
                                                        <td align="right"  style="font-size:<?php echo $jRecCashFont; ?>px; text-align: right; padding:1px;">
                                                            <div class="spaceRight5"><?php echo formatInIndianStyle($utin_cash_amt_rec); ?></div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            if ($utin_pay_cheque_amt != '' && $utin_pay_cheque_amt != 0 && $utin_pay_cheque_amt > 0) {
//                                                $fieldName = 'jRecCheq';
//                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                $jRecCheqFont = $jRecCheq_size;
                                                if ($jRecCheq_check == 'true') {
//                                                    $fieldName = 'jRecCheqLb';
//                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($jRecCheqLb_size == 0) {
                                                        $jRecCheqLb_size = 12;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        //
//                                                        $fieldName = 'jBankdetcheck';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $jBankdetcheck = $jBankdetcheck_check;
                                                        //START CODE FOR DISPLAY CHECK NARRATION : AUTHOR @DARSHANA 23 DEC 2021
//                                                        $fieldName = 'jRecCheckNarration';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $checkNarration = $jRecCheckNarration_check;

                                                        //if($label_field_check == 'true'){
                                                        $cashqueary = "SELECT accounts.acc_user_acc FROM accounts WHERE acc_id = '$utin_pay_cheque_acc_id'";
                                                        $rescheckqueary = mysqli_query($conn, $cashqueary) or die(mysqli_error($conn));
                                                        $rowQuery = mysqli_fetch_array($rescheckqueary);
                                                        $acc_user_acc_check = $rowQuery['acc_user_acc'];
                                                        //
                                                        //
//                                                        $fieldName = 'jRecCheqLb';  // ADD SELECT QUERY FOR AMOUNT FONT-SIZE AND FONT-COLOR  AUTHOR: DIKSHA 03JAN2019
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

                                                        if ($utin_amt_return_status == 'YES') {
                                                            $chequeReceived = 'CHEQUE PAID';
                                                        } else {
                                                            $chequeReceived = $jRecCheqLb_content;
                                                        }
                                                        //
                                                        if ($jRecCheqLb_check == 'true' && $checkNarration == 'true' && $utin_cheque_no != '' && $utin_cheque_no != NULL) {
                                                            $utinCheckNarration = $utin_cheque_no;
//                                                    echo '$utinCashNarration=' . $utinCashNarration;
                                                        }
                                                        if ($utin_cheque_no != '' && $acc_user_acc_check != '' && $jRecCheqLb_check == 'true') {
                                                            ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCheqLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcheck';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>  

                                                                            BANK PAY /  <?php echo $acc_user_acc_check; ?>  /
                                                                        <?php } ?>
                                                                        <?php
                                                                        $fieldName = 'jRecCheckNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check check==".$label_field_check;
                                                                        ?>
                                                            <?php if ($label_field_check == 'true') { ?>

                        <?php echo $utin_cheque_no; ?> / <?php } ?>

                                                                        <?php echo $chequeReceived; ?> : </span>
                                                                </div>
                                                            </td>
                                                                    <?php } else if ($utin_cheque_no != '' && $acc_user_acc_check == '') {
                                                                        ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCheqLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcheck';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>   
                                                                            BANK PAY /  <?php } ?> 
                                                                        <?php
                                                                        $fieldName = 'jRecCheckNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check check==".$label_field_check;
                                                                        ?>
                                                                        <?php if ($label_field_check == 'true') { ?> <?php echo $utin_cheque_no; ?> /  <?php } ?>

                                                                        <?php echo $chequeReceived; ?> :   </span>
                                                                </div>
                                                            </td>
                                                                    <?php } else if ($acc_user_acc_check != '' && $jRecCheqLb_check == 'true') { ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCheqLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcheck';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            BANK PAY /  <?php echo $acc_user_acc_check; ?> / <?php } ?>

                                                                        <?php echo $chequeReceived; ?> :   </span></div>
                                                            </td>    
                                                                    <?php } else if ($utin_cheque_no != '') { ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCheqLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jRecCheckNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check check==".$label_field_check;
                                                                        ?>
                    <?php if ($label_field_check == 'true') { ?> 
                                                                            <?php echo $utin_cheque_no; ?> /  <?php } ?>

                    <?php echo $chequeReceived; ?> :   </span></div>
                                                            </td> 
                                                        <?php } else {
                                                            ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCheqLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="paddingRight5"><span>
                    <?php echo $chequeReceived; ?> :
                                                                    </span>
                                                                </div>
                                                            </td>
                                                    <?php } ?>
                                                        <td align="right" style="font-size:<?php echo $jRecCheqFont; ?>px; text-align: right; padding:1px; ">
                                                            <div class="spaceRight5"><?php echo formatInIndianStyle($utin_pay_cheque_amt); ?></div>
                                                        </td> 
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            if ($utin_pay_card_amt != '' && $utin_pay_card_amt != 0 && $utin_pay_card_amt > 0) {
//                                                $fieldName = 'jRecCard';
//                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                $jRecCardFont = $jRecCard_size;
                                                if ($jRecCard_check == 'true') {
//                                                    $fieldName = 'jRecCardLb';
//                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($jRecCardLb_font_size == 0) {
                                                        $jRecCardLb_size = 12;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <?php
                                                        //
//                                                        $fieldName = 'jBankdetcard';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $jBankdetcardcheck = $jBankdetcard_check;
                                                        //if ($label_field_check == 'true') {
                                                        $queartcard = "SELECT accounts.acc_user_acc FROM accounts WHERE acc_id = '$utin_pay_card_acc_id'";
                                                        $rescardqueary = mysqli_query($conn, $queartcard) or die(mysqli_error($conn));
                                                        $rowQuery = mysqli_fetch_array($rescardqueary);
                                                        $acc_user_acc_card = $rowQuery['acc_user_acc'];
//                                                 echo '$acc_user_acc_card'.$acc_user_acc_card;
                                                        //}
                                                        //
                                                        //START CODE FOR CARD NARRATION : AUTHOR @DARSHANA 23 DEC 2021
//                                                        $fieldName = 'jRecCardNarration';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $cardNarration = $jRecCardNarration_check;
                                                        //
//                                                        $fieldName = 'jRecCardLb';  // ADD SELECT QUERY FOR AMOUNT FONT-SIZE AND FONT-COLOR  AUTHOR: DIKSHA 03JAN2019
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($utin_amt_return_status == 'YES') {
                                                            $cardReceived = 'CARD PAID';
                                                        } else {
                                                            $cardReceived = $jRecCardLb_content;
                                                        }
                                                        //
                                                        //CEHCK CONDITION FOR CARD NARRATION : AUTHOR @DARSHANA 23 DEC 2021
                                                        if ($jRecCardLb_check == 'true' && $cardNarration == 'true' && $utin_card_no != '' && $utin_card_no != NULL) {
                                                            $utinCardNarration = $utin_card_no;
//                                                    echo '$utinCashNarration=' . $utinCashNarration;
                                                        }
                                                        if ($utin_card_no != '' && $acc_user_acc_card != '' && $jRecCardLb_check == 'true') {
                                                            ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCardLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcard';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                  
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            CARD PAY /  <?php echo $acc_user_acc_card; ?>  / 
                                                                        <?php } ?>
                                                                        <?php
                                                                        $fieldName = 'jRecCardNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check card==".$label_field_check;
                                                                        ?>
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            <?php echo $utin_card_no; ?> /   <?php } ?>

                                                                        <?php echo $cardReceived; ?> : </span></div>
                                                            </td>
                                                                    <?php } else if ($utin_card_no != '' && $acc_user_acc_card == '') { ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCardLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcard';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                  
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            CARD PAY /   <?php } ?>
                                                                        <?php
                                                                        $fieldName = 'jRecCardNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check card==".$label_field_check;
                                                                        ?>
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            <?php echo $utin_card_no; ?> / <?php } ?>
                                                                        <?php echo $cardReceived; ?> :   </span></div>
                                                            </td>
                                                                    <?php } else if ($acc_user_acc_card != '' && $jRecCardLb_check == 'true') { ?>
                                                            <td align="right" style="font-size:<?php echo $jRecCardLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetcard';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                  
                                                                        ?> 
                    <?php if ($label_field_check == 'true') { ?>   
                                                                            CARD PAY /  <?php echo $acc_user_acc_card; ?> /
                                                                        <?php } ?>
                                                                        <?php echo $cardReceived; ?> :   </span>
                                                                </div>
                                                            </td>    
                                                                    <?php } else if ($utin_card_no != '') { ?>
                                                            <td align="right" style="font-size:<?php echo $jRecCardLb_size; ?>px; text-align: right; padding:1px; border-right: unset; " align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jRecCardNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check card==".$label_field_check;
                                                                        ?>
                    <?php if ($label_field_check == 'true') { ?>  
                                                                            <?php echo $utin_card_no; ?> /  <?php } ?>

                    <?php echo $cardReceived; ?> :   </span></div>
                                                            </td> 
                                                        <?php } else {
                                                            ?>
                                                            <td align="left" style="font-size:<?php echo $jRecCardLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="paddingRight5"><span>
                                                        <?php echo $cardReceived; ?> :   
                                                                    </span></div>
                                                            </td>
                                                    <?php } ?>
                                                        <td align="right" style="font-size:<?php echo $jRecCardFont; ?>px; text-align: right; padding: 1px; ">
                                                            <div class="spaceRight5"><?php echo formatInIndianStyle(($utin_pay_card_amt + $utin_pay_trans_chrg)); ?></div>
                                                        </td>  
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            if ($utin_online_pay_amt != '' && $utin_online_pay_amt != 0 && $utin_online_pay_amt > 0) {
//                                                $fieldName = 'jRecOnlinePay';
//                                                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                $jRecOnlinePayFont = $jRecOnlinePay_size;
                                                if ($jRecOnlinePay_check == 'true') {
//                                                    $fieldName = 'jRecOnlinePayLb';
//                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($jRecOnlinePayLb_size == 0) {
                                                        $jRecOnlinePayLb_size = 12;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <?php
//                                                        $fieldName = 'jBankdetonline';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $jBankdetonline = $jBankdetonline_check;
                                                        //if ($label_field_check == 'true') {
                                                        $resultonline = "SELECT accounts.acc_user_acc FROM accounts WHERE acc_id = '$utin_online_pay_acc_id'";
                                                        $resonlinequeary = mysqli_query($conn, $resultonline) or die(mysqli_error($conn));
                                                        $rowQuery = mysqli_fetch_array($resonlinequeary);
                                                        $acc_user_acc_online = $rowQuery['acc_user_acc'];

                                                        //START CODE FOR ONLINE NARRATION : AUTHOR @DARSHANA 23 DEC 2021
//                                                        $fieldName = 'jRecOnlineNarration';
//                                                        $label_field_font_size = '';
//                                                        $label_field_font_color = '';
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        //$onlineNarration = $label_field_check;
                                                        //}
//                                                        $fieldName = 'jRecOnlinePayLb';  // ADD SELECT QUERY FOR AMOUNT FONT-SIZE AND FONT-COLOR  AUTHOR: DIKSHA 03JAN2019
//                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        //
                                                        if ($utin_paytm_pay_amt != 0) {
                                                            $OnlinePayReceived = "PAYTM PAYMENT";
                                                        } else {
                                                            $OnlinePayReceived = $jRecOnlinePayLb_content;
                                                        }
                                                        //
                                                        //CHECK CONDITION FOR ONLINE NARRATION : AUTHOR @DARSHANA 23 DEC 2021
                                                        if ($jRecOnlinePayLb_check == 'true' && $utin_online_pay_narratn != '' && $utin_online_pay_narratn != NULL) {
                                                            $onlineNarration = $utin_online_pay_narratn;
                                                        }
                                                        if ($utin_online_pay_narratn != '' && $acc_user_acc_online != '' && $jRecOnlinePayLb_check == 'true') {
                                                            ?>
                                                            <td align="left" style="font-size:<?php echo $jRecOnlinePayLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetonline';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            ONLINE PAY /  <?php echo $acc_user_acc_online; ?>  /  <?php } ?>
                                                                        <?php
                                                                        $fieldName = 'jRecOnlineNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check Online==".$label_field_check;
                                                                        ?>
                                                            <?php if ($label_field_check == 'true') { ?> 
                        <?php echo $utin_online_pay_narratn; ?> /
                                                                        <?php } ?>

                                                                        <?php echo $OnlinePayReceived; ?> : </span></div>
                                                            </td>
                                                                    <?php } else if ($utin_online_pay_narratn != '' && $acc_user_acc_card == '') {
                                                                        ?>
                                                            <td align="right" style="font-size:<?php echo $jRecOnlinePayLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetonline';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>   
                                                                            ONLINE PAY /  <?php } ?>
                                                                        <?php
                                                                        $fieldName = 'jRecOnlineNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                                        echo "label_field_check Online==".$label_field_check;
                                                                        ?>
                                                                        <?php if ($label_field_check == 'true') { ?>  <?php echo $utin_online_pay_narratn; ?> / <?php } ?>

                                                                        <?php echo $OnlinePayReceived; ?> :   </span></div>
                                                            </td>
                                                                    <?php } else if ($acc_user_acc_online != '' && $jRecOnlinePayLb_check == 'true') { ?>
                                                            <td align="left" style="font-size:<?php echo $jRecOnlinePayLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jBankdetonline';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //                                                 
                                                                        ?> 
                                                                        <?php if ($label_field_check == 'true') { ?>
                                                                            ONLINE PAY /  <?php echo $acc_user_acc_online; ?> /   <?php } ?>

                                                                        <?php echo $OnlinePayReceived; ?> :   </span></div>
                                                            </td>    
                                                                    <?php } else if ($utin_online_pay_narratn != '') { ?>
                                                            <td align="left" style="font-size:<?php echo $jRecOnlinePayLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="spaceRight5"><span>
                                                                        <?php
                                                                        $fieldName = 'jRecOnlineNarration';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                                          echo "label_field_check Online==".$label_field_check;
                                                                        ?>
                    <?php if ($label_field_check == 'true') { ?> 
                        <?php echo $utin_online_pay_narratn; ?> /  <?php } ?>

                                                                        <?php echo $OnlinePayReceived; ?> :   </span></div>
                                                            </td> 
                <?php } else {
                    ?>
                                                            <td align="left" style="font-size:<?php echo $jRecOnlinePayLb_size; ?>px; text-align: right; padding:1px; border-right: unset;" align="right">
                                                                <div class="paddingRight5"><span>

                    <?php echo $OnlinePayReceived; ?> :

                                                                    </span></div>
                                                            </td>
                                                    <?php } ?>
                                                        <td align="right" style="font-size:<?php echo $jRecOnlinePayFont; ?>px; text-align: right; padding:1px;">
                                                            <div class="spaceRight5"><?php echo formatInIndianStyle(($utin_online_pay_amt - $utin_pay_comm_paid)); ?></div>
                                                        </td>      
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            // START CODE FOR ADD PAYTM PAYMENT DETAILS @SIMRAN:20JAN2023
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            $jPaytmCardNoFont = $jPaytmCardNo_size;
                                            if ($jPaytmCardNo_check == 'true' && $utin_paytm_card_no != '') {
//                                                $fieldName = 'jLtPtsLB';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <tr>
                                                    <td style="text-align:left;padding:1px; border-right: none !important; font-size: <?php echo $jPaytmCardNoFont ?>px; padding:1px;" align="right">
                                                <?php echo $jPaytmCardNoLb_content; ?> : 
                                                    </td>
                                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jPaytmCardNoFont; ?>px; padding:1px; " align="right">
                                                <?php
                                                echo $utin_paytm_card_no;
                                                ?>
                                                    </td>  
                                                </tr>
                                                <?php
                                            }
                                            //
                                            $jPaytmPayMenthodFont = $jPaytmPayMenthod_size;
                                            if ($jPaytmPayMenthod_check == 'true' && $utin_paytm_pay_method != '') {
//                                                $fieldName = 'jLtPtsLB';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <tr>
                                                    <td style="text-align:left;padding:1px; border-right: none !important; font-size: <?php echo $jPaytmPayMenthodFont ?>px; padding:1px;" align="right">
                                                <?php echo $jPaytmPayMenthodLb_content; ?> : 
                                                    </td>
                                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jPaytmPayMenthodFont; ?>px; padding:1px; " align="right">
                                                <?php
                                                echo $utin_paytm_pay_method;
                                                ?>
                                                    </td> 
                                                </tr>
                                                <?php
                                            }
                                            //
                                            $jPaytmTransIdFont = $jPaytmTransId_size;
                                            if ($jPaytmTransId_check == 'true' && $utin_paytm_order_id != '') {
//                                                $fieldName = 'jLtPtsLB';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <tr>
                                                    <td style="text-align:left;padding:1px; border-right: none !important; font-size: <?php echo $jPaytmTransIdFont ?>px; padding:1px;" align="right">
                                                <?php echo $jPaytmTransIdLb_content; ?> :
                                                    </td>
                                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jPaytmTransIdFont; ?>px; padding:1px; " align="right">
                                                <?php
                                                echo $utin_paytm_order_id;
                                                ?>
                                                    </td>  
                                                </tr>
                                                <?php
                                            }
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            // END CODE FOR ADD PAYTM PAYMENT DETAILS @SIMRAN:20JAN2023
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//                                            $fieldName = 'jLtPts';
//                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            $jLtPtsFont = $jLtPts_size;
                                            if ($utin_lp_redeem != 0 && $jLtPts_check == 'true') {
//                                                $fieldName = 'jLtPtsLB';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jLtPtsLB_size ?>px; padding:1px;" align="right">
                                                    <b><?php echo $jLtPtsLB_content; ?> : </b>
                                                </td>
                                                <td style="text-align:right;padding:1px;font-size:<?php echo $jLtPtsFont; ?>px; padding:1px; " align="right">
                                                <?php
                                                if ($utin_payment_mode == 'RateCut' || $utin_payment_mode == 'NoRateCut') {
                                                    echo formatInIndianStyle($utin_total_amt);
                                                } else
                                                    echo formatInIndianStyle($slPrItemValforpaymentpanel);
                                                ?>
                                                </td>  
                                                <?php
                                            }
//                                            $fieldName = 'payInfo';
//                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            $payInfoFont = $payInfo_size;
                                            if ($utin_paym_oth_info != NULL && $payInfo_check == 'true') {
//                                                $fieldName = 'payInfoLb';
//                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $payInfoLb_size ?>px;  padding-left: 1px;" align="right">
                                                    <b><?php echo $payInfoLb_content; ?> : </b>
                                                </td>
                                                <td style="text-align:right;padding:1px;font-size:<?php echo $payInfoFont; ?>px; padding: 1px;" align="right">
                                        <?php echo $utin_paym_oth_info; ?>
                                                </td>  
                                        <?php
                                    }
                                    ?>
                                        </table>
                                    </td>
        <?php
    }
    ?>
                            </tr>
<?php } ?>
                        <!--START CODE FOR RATE CUT METAL DETAILS : AUTHOR @DARSHANA 11 MAY 2022-->
                        <tr>
                            <td>

                            </td>
                        </tr>
                    </table>
                </td>
                <td width="40%" align="right" style="text-align: right; width: 40%;border-right: none !important; padding-right: unset !important; ">
                    <table width="100%" align="right" style="text-align: right;border-right: none !important;">
                        <?php
//
//echo  '$sttrFixedPriceStatus == ' . $sttrFixedPriceStatus . '<br />';
//echo  '$utin_total_taxable_amt == ' . $utin_total_taxable_amt . '<br />';

                        if ($sttrFixedPriceStatus == 'TRUE') {
                            //
                            $slPrItemValforpaymentpanel = $sttr_cust_price;
                            //
                        } else {
                            $slPrItemValforpaymentpanel = $slPrItemValforpaymentpanel;
                        }
//
//                        $fieldName = 'amts';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtsFont = $amts_size;
                        if ($amts_check == 'true' && $slPrItemValforpaymentpanel != 0) {
//                            $fieldName = 'amtsLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr >
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $amtsLb_size ?>px; border-bottom: solid 1px #aea7a7;">
                                    <b><?php echo $amtsLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $amtsFont; ?>px;color:#000; border-bottom: solid 1px #aea7a7; ">
                                    <?php
                                    //

                                    echo formatInIndianStyle($slPrItemValforpaymentpanel);

                                    //
                                    ?>
                                </td> 
                            </tr>
                            <?php
                        }
                        //                        $fieldName = 'cry_val';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $crystalFont = $cry_val_size;
                        if ($totalSlPrCryValuation != 0 && $cry_val_check == 'true') {
//                            $fieldName = 'cry_lb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $cry_lb_size ?>px; ">
                                    <b><?php echo $cry_lb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $crystalFont; ?>px;color:#000;">
                            <?php echo formatInIndianStyle(om_round($totalSlPrCryValuation)); ?>
                                </td>
                            </tr>
                            <?php
                        }

                        //                        $fieldName = 'mkgChrg';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $mkgchrgFont = $mkgChrg_size;
                        if ($mkgChrg_check == 'true') {
//                            $fieldName = 'mkgChrgLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($mkgChrgLb_size == 0) {
                                $mkgChrgLb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $mkgChrgLb_size ?>px; ">
                                    <b><?php echo $mkgChrgLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $mkgchrgFont; ?>px;color:#000;">
                            <?php echo formatInIndianStyle(om_round($totalSlPrMkgChrg)); ?>
                                </td>
                            </tr>
                            <?php
                        }

//                        $fieldName = 'taxableamt';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $taxableamtfont = $taxableamt_size;
                        if ($taxableamt_check == 'true') {
//                            $fieldName = 'taxableamtLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $taxableamtLb_size ?>px; ">
                                    <b><?php echo $taxableamtLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $taxableamtfont; ?>px;color:#000;">
                            <?php
                            $taxableAmt = $slPrItemValforpaymentpanel + $totalSlPrCryValuation + $totalSlPrMkgChrg;
                            echo formatInIndianStyle($taxableAmt);
                            ?>
                                </td>
                            </tr>
                            <?php
                        }

                        //========START GST @DNYANESHWARI 19AUG2024
                        //
//                        $fieldName = 'gst';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                          //start code to show cgst and s gst sepratily Omkar kalbhor @26-09-2024
                           $showcgtsgstsepquotinvQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'showcgtsgstsepquotinv'";
                           $showcgtsgstsepquotinvOption = mysqli_query($conn, $showcgtsgstsepquotinvQuery);
                           $showcgtsgstsepquotinvrowOption = mysqli_fetch_array($showcgtsgstsepquotinvOption);
                           $showcgtsgstsepquotinv = $showcgtsgstsepquotinvrowOption['omly_value'];
                          $gstFont = $gst_size;
                        if ($gst_check == 'true' && $slPrItemValforpaymentpanel != 0) {
                            if($showcgtsgstsepquotinv!= 'YES'){
//                            $fieldName = 'gstLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr >
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $gstLb_size ?>px; border-bottom: solid 1px #aea7a7;">
                                    <b><?php echo $gstLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $gstFont; ?>px;color:#000; border-bottom: solid 1px #aea7a7; ">
                            <?php
//                                    echo formatInIndianStyle($slPrItemValforpaymentpanel);
                            $calculatedGst = ($taxableAmt * 3) / 100;
                            echo formatInIndianStyle($calculatedGst);
                            ?>
                                </td> 
                            </tr>
                            <?php
                        } else { ?>
                             <tr >
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $gstLb_size ?>px;">
                                    <b>CGST : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $gstFont; ?>px;color:#000; ">
                            <?php
//                                    echo formatInIndianStyle($slPrItemValforpaymentpanel);
                            $calculatedGst = ($taxableAmt * 3) / 100;
                            $calculatedCGst = ($taxableAmt * 1.5) / 100;
                            echo formatInIndianStyle($calculatedCGst);
                            ?>
                                </td> 
                            </tr>
                             <tr >
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $gstLb_size ?>px; border-bottom: solid 1px #aea7a7;">
                                    <b>SGST : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $gstFont; ?>px;color:#000; border-bottom: solid 1px #aea7a7; ">
                            <?php
//                                    echo formatInIndianStyle($slPrItemValforpaymentpanel);
                            $calculatedSGst = ($taxableAmt * 1.5) / 100;
                            echo formatInIndianStyle($calculatedSGst);
                            ?>
                                </td> 
                            </tr>
                        <?php } }
                        //========END cgst and sgst Omkar kalbhor 19AUG2024
                        //========END GST @DNYANESHWARI 19AUG2024
                        //========START PREV AMT @DNYANESHWARI 19AUG2024
                        //
                        $qSelUserPrevInvoices = "SELECT sttr_previous_invoices FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and "
                                . "sttr_invoice_no='$slPrInvoiceNo' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_transaction_type NOT IN ('ESTIMATE_RECEIVED') and sttr_indicator='stock'";
                        $resUserPrevInvoices = mysqli_query($conn, $qSelUserPrevInvoices);
                        $noOfRows = mysqli_num_rows($resUserPrevInvoices);
                         if($noOfRows > 0) {
                            $rowUserPrevInvoices = mysqli_fetch_assoc($resUserPrevInvoices);
                            $previousInvoices = $rowUserPrevInvoices['sttr_previous_invoices'];
                         }
                        $previousInvoices = explode('|', $previousInvoices);
                        $totPrevInv = count($previousInvoices);
                        //
                        parse_str(getTableValues("SELECT sttr_add_date,sttr_user_id,sttr_staff_id,sttr_metal_rate,sttr_user_id,sttr_firm_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and "
                                        . "sttr_invoice_no='$slPrInvoiceNo' and sttr_pre_invoice_no='$slPrPreInvoiceNo'"));
                        //
                        $prevTotAmount = 0;
                        //
                        for ($i = 0; $i < $totPrevInv; $i++) {
                            $utin_id = $previousInvoices[$i];
                            $queryPreviousTrans = "select utin_id,utin_cash_balance,utin_pre_invoice_no,utin_invoice_no,utin_cash_CRDR,utin_type,utin_transaction_type from user_transaction_invoice where utin_owner_id = '$sessionOwnerId' and utin_user_id = '$sttr_user_id' "
                                    . " and utin_firm_id IN ('$sttr_firm_id') and utin_type in ('OnPurchase','MONEY','udhaar','scheme') and utin_transaction_type in ('DEPOSIT','UDHAAR','ADV MONEY') "
                                    . " and (utin_cash_balance NOT IN ('',0) AND utin_amt_pay_chk IS NULL) and utin_status NOT IN ('Deleted','DELETED','deleted') AND utin_id = '$utin_id' order by utin_id desc";
                            $resPreviousTrans = mysqli_query($conn, $queryPreviousTrans);
                            $rowPreviousTrans = mysqli_fetch_assoc($resPreviousTrans);
                            //
                            $prevAmountCRDR = $rowPreviousTrans['utin_cash_CRDR'];
                            $prevAmount = $rowPreviousTrans['utin_cash_balance'];
                            $prevTotAmount += $prevAmount;
                        }
//                        $fieldName = 'prevAmpount';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $prevAmpountFont = $prevAmpount_size;
                        if ($prevAmpount_check == 'true' && $slPrItemValforpaymentpanel != 0) {
//                            $fieldName = 'prevAmpountLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr >
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $prevAmpountLb_size ?>px; border-bottom: solid 1px #aea7a7;">
                                    <b><?php echo $prevAmpountLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $prevAmpountFont; ?>px;color:#000; border-bottom: solid 1px #aea7a7; ">
                            <?php
//                                    echo formatInIndianStyle($slPrItemValforpaymentpanel);
                            echo formatInIndianStyle($prevTotAmount);
                            ?>
                                </td> 
                            </tr>
                            <?php
                        }
                        //========END PREV AMT @DNYANESHWARI 19AUG2024

                        if ($utin_tot_amt_rec != 0) {
//                            $fieldName = 'urdLessAmt';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $urdlessFont = $urdLessAmt_size;
                            if ($urdLessAmt_check == 'true') {
//                                $fieldName = 'urdLessLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($urdLessLb_size == 0) {
                                    $urdLessLb_size = 12;
                                }
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $urdLessLb_size ?>px; ">
                                        <b><?php echo $urdLessLb_content; ?> : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $urdlessFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle(om_round($utin_tot_amt_rec)); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }


//                        $fieldName = 'othChPay';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($othChPay_check == 'true' && $totalOthChgs > 0) {
//                            $fieldName = 'othChPayLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($othChPayLb_size == 0) {
                                $othChPayLb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $othChPayLb_size ?>px; ">
                                    <b><?php echo $othChPayLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $mkgchrgFont; ?>px;color:#000;">
                            <?php echo formatInIndianStyle(om_round($totalOthChgs)); ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'amtwithmkg';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtwithmkgFont = $amtwithmkg_size;
                        if ($amtwithmkg_check == 'true') {
//                            $fieldName = 'amtwithmkglb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($amtwithmkglb_size == 0) {
                                $amtwithmkglb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $amtwithmkglb_size ?>px; ">
                                    <b><?php echo $amtwithmkglb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $amtwithmkgFont; ?>px;color:#000;">
                                    <?php
                                    if ($totOtherChags != '0') {
                                        echo formatInIndianStyle(om_round($utin_total_amt) + $totOtherChags);
                                    } else {
                                        echo formatInIndianStyle(om_round($utin_total_amt));
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'amtwithmkg_cry';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtwithmkgcryfont = $amtwithmkg_cry_size;
                        if ($amtwithmkg_cry_check == 'true') {
//                            $fieldName = 'amtwithmkg_crylb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($amtwithmkg_crylb_size == 0) {
                                $amtwithmkg_crylb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $amtwithmkg_crylb_size ?>px; ">
                                    <b><?php echo $amtwithmkg_crylb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $amtwithmkgcryfont; ?>px;color:#000;">
                            <?php
                            echo formatInIndianStyle($utin_total_amt + $totOtherChags + $utin_crystal_amt);
                            ?>
                                </td>
                            </tr>
                            <?php
                        }
                        if ($utin_discount_amt_discup != '' || $utin_discount_amt_discup != null) {
//                            $fieldName = 'discwithouttax';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $discwithouttaxfont = $discwithouttax_size;
                            if ($discwithouttax_check == 'true') {
//                                $fieldName = 'discwithouttaxLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($discwithouttaxLb_size == 0) {
                                    $discwithouttaxLb_size = 12;
                                }
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $discwithouttaxLb_size ?>px; ">
                                        <b><?php echo $discwithouttaxLb_content; ?> : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $discwithouttaxfont; ?>px;color:#000;">
                                <?php
                                echo formatInIndianStyle($utin_discount_amt_discup);
                                ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        if ($utin_additional_charges != '' && $utin_additional_charges != null && $utin_additional_charges > 0) {
//                            $fieldName = 'additionalChrgs';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE "
//                                            . "label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
//                                            . "and label_type = '$labelType'"));
                            //
                            $additionalchrgFont = $additionalChrgs_size;
                            if ($additionalChrgs_check == 'true') {
//                                $fieldName = 'additionalChrgsLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,"
//                                                . "label_field_font_color FROM labels WHERE "
//                                                . "label_own_id = '$sessionOwnerId' and "
//                                                . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($additionalChrgsLb_size == 0) {
                                    $additionalChrgsLb_size = 12;
                                }
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $additionalChrgsLb_size ?>px; ">
                                        <b><?php echo $additionalChrgsLb_content; ?> : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $additionalchrgFont; ?>px;color:#000;">
                                <?php
                                echo formatInIndianStyle($utin_additional_charges);
                                ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        $fieldName = 'hallmarkChrgs';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtsFont = $label_field_font_size;
                        if ($label_field_check == 'true') {
                            $fieldName = 'hallmarkChrgsLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $amtsFont ?>px; ">
                                    <b><?php echo $label_field_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $amtsFont; ?>px;color:#000;">
                            <?php
                            echo $utin_hallmark_chrgs_amt;
                            ?>
                                </td>                                  
                            </tr>
                        <?php } ?>
                        <?php
//                        $fieldName = 'jCgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jCgstFont = $jCgst_size;
                        if ($jCgst_check == 'true') {
                            if ($cgstAmt > 0 && $labelType != 'ROUGH_ESTIMATE') {
//                                $fieldName = 'jCgstLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                                        
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jCgstLb_size ?>px; ">
                                        <b><?php echo $jCgstLb_content; ?>(<?php echo (round($cgstChrg, 2)) . '% '; ?>) : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jCgstFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle($cgstAmt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
//                        $fieldName = 'jSgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jSgstFont = $jSgst_size;
                        if ($jSgst_check == 'true') {
                            if ($sgstAmt > 0 && $labelType != 'ROUGH_ESTIMATE') {
//                                $fieldName = 'jSgstLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jSgstLb_size ?>px; ">
                                        <b><?php echo $jSgstLb_content; ?>(<?php echo (round($sgstChrg, 2)) . '% '; ?>) : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jSgstFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle($sgstAmt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
//                        $fieldName = 'jIgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($jIgst_check == 'true') {
                            if ($igstAmt > 0 && $labelType != 'ROUGH_ESTIMATE') {
//                                $fieldName = 'jIgstLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jIgstLb_size ?>px; ">
                                        <b><?php echo $jIgstLb_content; ?>(<?php echo (round($igstChrg, 2)) . '% '; ?>) : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jSgstFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle($igstAmt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        $fieldName = 'jVat';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jVatFont = $jVat_size;
                        if ($jVat_check == 'true') {
//                            if ($VatAmt > 0 && $labelType != 'ROUGH_ESTIMATE') {
//                                $fieldName = 'jVatLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jVatLb_size ?>px; ">
                                    <b><?php echo $jVatLb_content; ?>(<?php echo (round($utin_pay_tax_chrg, 2)) . '% '; ?>) : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jVatFont; ?>px;color:#000;">
                            <?php echo formatInIndianStyle($utin_pay_tax_amt); ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'jtotmkgCgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jtotmkgCgstFont = $jtotmkgCgst_size;
                        if ($jtotmkgCgst_check == 'true') {
                            if ($cgstAmt + $mkgChgsCGSTAmt > 0 && $labelType != 'ROUGH_ESTIMATE') {
//                                $fieldName = 'jtotmkgCgstLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jtotmkgCgstLb_size ?>px; ">
                                        <b><?php echo $jtotmkgCgstLb_content; ?>(<?php echo ($cgstChrg) . '% '; ?>) : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jtotmkgCgstFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle($cgstAmt + $mkgChgsCGSTAmt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
//                        $fieldName = 'jtotmkgSgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jtotmkgSgstFont = $jtotmkgSgst_size;
                        if ($jtotmkgSgst_check == 'true') {
//                            $fieldName = 'jtotmkgSgstLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

                            if (($sgstAmt + $mkgChgsSGSTAmt) > 0 && $labelType != 'ROUGH_ESTIMATE') {
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jtotmkgSgstLb_size ?>px; ">
                                        <b><?php echo $jtotmkgSgstLb_content; ?>(<?php echo ($sgstChrg) . '% '; ?>) : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $jtotmkgSgstFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle($sgstAmt + $mkgChgsCGSTAmt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
//                        $fieldName = 'jOtherTaxAmt';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jOtherTaxAmt = $jOtherTaxAmt_size;
                        if ($otherTaxAmt != 0 && $jOtherTaxAmt_check == 'true' && $labelType != 'ROUGH_ESTIMATE') {
//                            $fieldName = 'jOtherTaxAmtLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jOtherTaxAmtLb_size ?>px; ">
                                    <b><?php echo $jOtherTaxAmtLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jOtherTaxAmt; ?>px;color:#000;">
                            <?php echo formatInIndianStyle($otherTaxAmt); ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'jCourierChgsAmt';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jCourierChgsAmt = $jCourierChgsAmt_size;
                        if ($utin_courier_chgs_amt != 0 && $jCourierChgsAmt_check == 'true') {
//                            $fieldName = 'jCourierChgsAmtLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jCourierChgsAmtLb_size ?>px; ">
                                    <b><?php echo $jCourierChgsAmtLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jCourierChgsAmt; ?>px;color:#000;">
                            <?php echo formatInIndianStyle(om_round($utin_courier_chgs_amt)); ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'jMkgChrgCgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jMkgChrgCgst = $jMkgChrgCgst_size;
                        if ($mkgChgsCGSTAmt != 0 && $jMkgChrgCgst_check == 'true' && $labelType != 'ROUGH_ESTIMATE') {
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jMkgChrgCgst_size ?>px; ">
                                    <b><?php echo $jMkgChrgCgstLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jMkgChrgCgst; ?>px;color:#000;">
                            <?php echo formatInIndianStyle($mkgChgsCGSTAmt); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        $fieldName = 'jMkgChrgSgst';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jMkgChrgSgstFont = $label_field_font_size;
                        if ($mkgChgsSGSTAmt != 0 && $jMkgChrgSgst_check == 'true' && $labelType != 'ROUGH_ESTIMATE') {
//                            $fieldName = 'jMkgChrgSgstLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jMkgChrgSgstLb_size ?>px; ">
                                    <b><?php echo $jMkgChrgSgstLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jMkgChrgSgstFont; ?>px;color:#000;">
                            <?php echo formatInIndianStyle($mkgChgsSGSTAmt); ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'jTotalAmt';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jTotalAmtFont = $jTotalAmt_size;
                        if ($jTotalAmt_check == 'true') {
//                            $fieldName = 'jTotalAmt';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jTotalAmt_size ?>px; ">
                                    <b><?php echo $jTotalAmt_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jTotalAmtFont; ?>px;color:#000;">
                                    <?php
                                    if ($utin_pay_tax_on_total_amt_chk == 'checked') {
                                        echo formatInIndianStyle($utin_pay_tax_tot_amt + $cgstAmt + $sgstAmt + $igstAmt + $otherTaxAmt);
                                    } else {
                                        echo formatInIndianStyle($utin_pay_tax_tot_amt + $totOtherChags + $cgstAmt + $sgstAmt + $otherTaxAmt + $igstAmt + $mkgChgsCGSTAmt + $mkgChgsSGSTAmt);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
<?php
if ($utin_additional_charges != 0) {
    ?>

                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: 14px; ">
                                    <b>Additional Charges :</b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:14px ;color:#000;">
                            <?php echo $utin_additional_charges ?>                                  
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        <?php
//                        $fieldName = 'jRoundOff';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jRoundOffFont = $jRoundOff_size;
                        if ($jRoundOff_check == 'true' && $utin_round_off_amt != '' && $utin_round_off_amt != 0) {
//                            $fieldName = 'jRoundOffLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($jRoundOffLb_size == 0) {
                                $jRoundOffLb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jRoundOffLb_size ?>px; ">
                                    <b><?php echo $jRoundOffLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jRoundOffFont; ?>px;color:#000;">
                                    <?php
                                    $paidRoundOffAmount = floor($utin_total_amt_deposit);
                                    $utin_round_off_paid_amt = $utin_total_amt_deposit - $paidRoundOffAmount;
                                    $utin_round_off_paid_amt = formatInIndianStyle($utin_round_off_paid_amt);
                                    //echo $utin_round_off_paid_amt;
                                    if ($utin_round_off_paid_amt != '0.00') {
                                        $round = '0.00';
                                        echo'+ ' . $round;
                                    } else {
                                        if ($utin_round_off_amt >= 0.5) {
                                            $roundPlus = number_format(1 - $utin_round_off_amt, 2, '.', '');
                                            echo'+ ' . $roundPlus;
                                        } else {
                                            $roundMinus = number_format($utin_round_off_amt, 2, '.', '');
                                            echo'- ' . $roundMinus;
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
    <?php
}
if ($utin_prev_cash_bal != 0) {
    ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jRoundOffLb_size ?>px; ">
                                    <b><?php
                                        if ($utin_transaction_type == 'PURBYSUPP') {

                                            if ($utin_prev_cash_bal > 0) {
                                                echo 'ADVANCED CASH : ';
                                                $advCashClass = 'greenFont';
                                            } else {
                                                echo 'PRV. BALANCE : ';
                                                $advCashClass = 'redFont';
                                            }
                                        } else {

                                            if ($utin_prev_cash_bal > 0) {
                                                echo 'PRV. BALANCE : ';
                                                $advCashClass = 'redFont';
                                            } else {
                                                /* START CODE TO ADD OPTION TO SHOW USER ENTERD LABEL IF ADDED FOR ADVANCE CASH,@AUTHOR:HEMA-9SEP2020 */
//                                                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = 'jAdvanCashLb' and label_type = 'SellPurchase'"));
                                                if ($jAdvanCashLb_content != null || $jAdvanCashLb_content != '') {
                                                    echo $jAdvanCashLb_content . ' :';
                                                } else {
                                                    echo 'ADVANCED CASH : ';
                                                }
                                                /* END CODE TO ADD OPTION TO SHOW USER ENTERD LABEL IF ADDED FOR ADVANCE CASH,@AUTHOR:HEMA-9SEP2020 */
                                                $advCashClass = 'greenFont';
                                            }
                                        }
                                        ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jRoundOffFont; ?>px;color:#000;">
                            <?php
                            echo formatInIndianStyle(abs(om_round($utin_prev_cash_bal)), 2);
                            ?>
                                </td>
                            </tr>
                            <?php
                        }
//                        $fieldName = 'jTotAmt';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $jTotAmtFont = $jTotAmt_size;
//
                        if ($jTotAmt_check == 'true') {
//                            $fieldName = 'jTotAmtLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $jTotAmtLb_size ?>px; border-top: solid 1px #aea7a7; border-bottom: solid 1px #aea7a7;">
                                    <b><?php echo $jTotAmtLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $jTotAmtFont; ?>px;color:#000; border-top: solid 1px #aea7a7; border-bottom: solid 1px #aea7a7;">
                            <?php
                            $totalAmt = $taxableAmt + $calculatedGst + $prevTotAmount;
                            echo formatInIndianStyle($totalAmt);
                            ?>
                                </td>
                            </tr>
                            <?php
                        }
                      
//                            $fieldName = 'metalRecAmt';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $metalRecAmtFont = $metalRecAmt_size;
                            if ($metalRecAmt_check == 'true') {
//                                $fieldName = 'metalRecAmtLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($metalRecAmtLb_size == 0) {
                                    $metalRecAmtLb_size = 12;
                                }
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $metalRecAmtLb_size ?>px; ">
                                        <b><?php echo $metalRecAmtLb_content; ?> : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $metalRecAmtFont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle(abs($totalFinalMetBal)); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        

                        if ($utin_cash_amt_rec != 0 || $utin_pay_cheque_amt != 0 || $utin_pay_card_amt != 0) {
//                            $fieldName = 'cashPaid';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $cashPaidFont = $cashPaid_size;
                            if ($cashPaid_check == 'true') {
//                                $fieldName = 'cashPaidLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($cashPaidLb_size == 0) {
                                    $cashPaidLb_size = 12;
                                }
                                if (($utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid)) < 0) {
                                    ?>
                                    <tr>
                                        <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $cashPaidLb_size ?>px; ">
                                            <b><?php echo 'AMOUNT RETURN'; ?> : </b>
                                        </td>
                                        <td style="text-align:right;padding:1px;font-size:<?php echo $cashPaidFont; ?>px;color:#000;">
                                    <?php echo formatInIndianStyle(abs($utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid))); ?>
                                        </td>
                                    </tr>
            <?php
        } else {
            ?>
                                    <tr>
                                        <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $cashPaidLb_size ?>px; ">
                                            <b><?php echo $cashPaidLb_content; ?> : </b>
                                        </td>
                                        <td style="text-align:right;padding:1px;font-size:<?php echo $cashPaidFont; ?>px;color:#000;">
                                    <?php echo formatInIndianStyle($utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid)); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
//                        $fieldName = 'LtPts';
//                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $LtPtsFont = $LtPts_size;
                        if ($utin_lp_redeem != 0 && $LtPts_check == 'true') {
//                            $fieldName = 'LtPtsLB';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $LtPtsLB_size ?>px; ">
                                    <b><?php echo $LtPtsLB_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $LtPtsFont; ?>px;color:#000;">
                            <?php echo decimalVal($utin_lp_redeem, 2); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        if ($utin_discount_amt != 0) {
//                            $fieldName = 'disc';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $discfont = $disc_size;
                            if ($disc_check == 'true') {
//                                $fieldName = 'discLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($discLb_size == 0) {
                                    $discLb_size = 12;
                                }
                                ?>
                                <tr>
                                    <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $discLb_size ?>px; ">
                                        <b><?php echo $discLb_content; ?> : </b>
                                    </td>
                                    <td style="text-align:right;padding:1px;font-size:<?php echo $discfont; ?>px;color:#000;">
                                <?php echo formatInIndianStyle($utin_discount_amt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?> 
                        <?php
//                            $fieldName = 'tot';
//                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totfont = $afterDisctotAmt_size;
                        if ($afterDisctotAmt_check == 'true') {
//                                $fieldName = 'totLb';
//                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($afterDisctotAmtLb_size == 0) {
                                $afterDisctotAmtLb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $afterDisctotAmtLb_size ?>px; ">
                                    <b><?php echo 'Total'; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $totfont; ?>px;color:#000;">
                            <?php
                            echo formatInIndianStyle(round($totalFinalAmt - $utin_discount_amt));
                            ?>
                                </td>
                            </tr>  <?php }
                        ?> 
                        <!-- START TOTAL RECEIVABLE AMT @DNYANESHWARI 27AUG2024-->
                        <?php
//                        $fieldName = 'totalBal';
//                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $totalBalFont = $totalBal_size;
                        if ($totalBal_check == 'true') {
//                            $fieldName = 'totalBalLb';
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($totalBalLb_size == 0) {
                                $totalBalLb_size = 12;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;padding:1px; border-right: none !important; font-size: <?php echo $totalBalLb_size ?>px; ">
                                    <b><?php echo $totalBalLb_content; ?> : </b>
                                </td>
                                <td style="text-align:right;padding:1px;font-size:<?php echo $totalBalFont; ?>px;color:#000;">
                            <?php 
                                $totalReceivableamt = $totalAmt - $totalFinalMetBal;
                                echo formatInIndianStyle(abs($totalReceivableamt)); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        //  END TOTAL RECEIVABLE AMT @DNYANESHWARI 27AUG2024

                        ?>

                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
