<?php 
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice Details
 * **************************************************************************************
 * 
 * Created on Dec 19, 2013 2:54:49 PM
 *
 * @FileName: omspinvnewtaxRetailWholesaleItemPayInfo.php
 * @Author: SIMRAN:05JAN2023
 * @AuthorEmailId:  info@softwaregen.com*/
?>
<?php
parse_str(getTableValues("SELECT * FROM user_transaction_invoice where utin_owner_id = '$sessionOwnerId' and "
                . "utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo' $utin_date_str and "
                . "utin_type IN ('APPROVAL', 'stock','rawMetal','ItemReturn','XRF','imitation','strsilver','RetailStock','PurchaseReturn') "
                . "and utin_transaction_type IN ('sell','ESTIMATESELL','PURBYSUPP','ItemReturn','APPROVAL', 'PurchaseReturn') and "
                . "utin_user_id = '$userId' and utin_firm_id IN ($strFrmId)"));

// echo '$totalColumns=111===='.$totalColumns.'<br>';
//$totalColumns = $totalColumns - 2;
//                echo '$totalColumns==22===='.$totalColumns.'<br>';

$netTotal = $utin_tot_amt_rec + $utin_cash_amt_rec;

// Start Code for Other Charges @Author:PRIYANKA-12OCT2018
if ($totalOthChgs > 0) {
        $totOtherChags = ($utin_oth_chgs_amt - $totalOthChgs);
} else {
    $totOtherChags = $utin_oth_chgs_amt;
}
// End Code for Other Charges @Author:PRIYANKA-12OCT2018

$taxAmt = $utin_pay_tax_amt;
//echo '$taxAmt=='.$taxAmt;
//echo '$cgstAmt == '.$cgstAmt.'<br />';
//echo '$sgstAmt == '.$sgstAmt.'<br />';
//echo '$igstAmt == '.$igstAmt.'<br />';
//
?>
<?php
$qSelSlPrItemDetails = "SELECT SUM(sttr_valuation) AS cryTotal FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
        . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
        . "and sttr_indicator IN ('stockCrystal') $sttr_date_str "
        . "and sttr_transaction_type IN('STOCK', 'sell','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE','ESTIMATESELL', 'PurchaseReturn') "
        . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') order by sttr_id ASC";
//
//echo $qSelSlPrItemDetails;
//
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
////START TO ADD IF CONDITION @AUTHOR:HEMA26SEP19
if ($labelType == 'ROUGH_ESTIMATE') {
    $totalTaxAmount = $otherTaxAmt + $mkgChgsCGSTAmt + $mkgChgsSGSTAmt;
    $utin_cash_balance = $utin_cash_balance - ($cgstAmt + $sgstAmt + $igstAmt); // THIS LINE ADDED @AUTHOR:SHRI26SEP19
} else {
    $totalTaxAmount = $cgstAmt + $sgstAmt + $igstAmt + $otherTaxAmt + $mkgChgsCGSTAmt + $mkgChgsSGSTAmt;
}
//END TO ADD IF CONDITION @AUTHOR:HEMA26SEP19
//
//echo '$totalTaxAmount ***== '.$utin_hallmark_chrgs_amt.'<br/>';
//
if ($utin_payment_mode == 'NoRateCut') {
    $totalAmount = $utin_prev_cash_bal + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt;
} else {
    //
    // START CODE FOR PREV BAL SETTLED IN SELL/PURCHASE ENTRY @PRIYANKA-29JUNE18
    if ($utin_transaction_type == 'PURBYSUPP') {
        //
        if ($utin_prev_amt_CRDR == 'DR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal * -1;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt;
            } else {
                $totalAmount = $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $utin_crystal_amt;
            }
        }
        //
        if ($utin_prev_amt_CRDR == 'CR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt;
            } else {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal;
            }
        } else {

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt;
            } else {
                if ($utin_pay_tax_on_total_amt_chk == 'checked') {
                    $totalAmount = $utin_prev_cash_bal + om_round($utin_pay_cgst_tot_amt, 0) + $totalTaxAmount + $utin_courier_chgs_amt + $cryTotal - $utin_discount_amt_discup;
                } else {
                    $totalAmount = $utin_prev_cash_bal + $utin_pay_cgst_tot_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal - $utin_discount_amt_discup;
                }
            }
        }
    } else {
        //
        if ($utin_prev_amt_CRDR == 'DR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_total_amt + $utin_oth_chgs_amt + $utin_crystal_amt + $totalTaxAmount + $utin_courier_chgs_amt;
            } else {
                $totalAmount = $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal;
            }
        }
        //
        if ($utin_prev_amt_CRDR == 'CR' && $utin_prev_cash_bal != 0) {

            $utin_prev_cash_bal = $utin_prev_cash_bal * -1;

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt;
            } else {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt + $cryTotal;
            }
        } else {

            if ($utin_discount_amt_discup == '' || $utin_discount_amt_discup == null || $utin_discount_amt_discup == 0) {
                $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $cryTotal + $totalTaxAmount + $utin_courier_chgs_amt;
            } else {
                if ($utin_pay_tax_on_total_amt_chk == 'checked') {
                    $totalAmount = $utin_prev_cash_bal + $utin_total_amt + $utin_oth_chgs_amt + $totalTaxAmount + $utin_courier_chgs_amt + $cryTotal - $utin_discount_amt_discup; // $utin_discount_amt_discup minus removed @AUTHOR:SHRI04OCT19
                } else {
                    $totalAmount = $utin_prev_cash_bal + $utin_pay_cgst_tot_amt + $totalTaxAmount + $utin_courier_chgs_amt + $utin_oth_chgs_amt;
                }
            }
        }
    }
    // END CODE FOR PREV BAL SETTLED IN SELL/PURCHASE ENTRY @PRIYANKA-29JUNE18
    // 
    // 
    //echo '$totalAmount 1== '.$totalAmount.'<br/>';
    //echo '$utin_round_off_amt 1== '.$utin_round_off_amt.'<br/>';
    //
    //
    if ($invName == 'ItemReturn') {
        $totalAmount = $utin_tot_payable_amt;
    }
   
}
            
?>

<tr>
                            <td colspan="12" class="customerDetails" style="border-bottom:1px solid #010000;border-right:0;">
                                    <?php
                           $fieldName = 'payableAmt';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'payableAmtLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>   
                        <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?>px;text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"> <?php echo $label_field_content; ?> : </b>                      
                    <?php } ?>
                    <?php
                        if ($payableAmt_check == 'true') {
                            ?>
                         <?php
                                    echo "$globalCurrency" . ' ' . ucwords(numToWords((abs($utin_cash_amt_rec) + 0))) . ' Only/-';
                               // echo "$globalCurrency" . ' ' . ucwords(numToWords((abs(($utin_tot_amt_rec + $utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid))) + 0))) . ' Only/-';
                                } else {
                                    echo "$globalCurrency" . ' ' . ucwords(numToWords((abs($utin_cash_amt_rec - $roundMinus) + 0))) . ' Only/-';
//                                echo "$globalCurrency" . ' ' . ucwords(numToWords((abs(($utin_tot_amt_rec + $utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid))) + 0))) . ' Only/-';
                                
                                ?>
                            
                    <?php } ?>
                        </p>
                                <?php
                            $fieldName = 'tnc';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true') {
                                $fieldName = 'tncLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                            <p style="color:#363636;font-size:<?php echo $label_field_font_size; ?> px;text-align:left;font-weight: 500;margin-bottom:5px;"><b style="color:#000;"> <?php echo $label_field_content; ?>: </b>
                                 <?php
                        $fieldName = 'tnc';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $noOfRows = substr_count($label_field_content, "\n") + 2;
                        $height = $noOfRows * ($label_field_font_size * 3);
                        ?>
                                <span id="tncLabel" spellcheck="false" name="tncLabel" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                              style="text-align:left;width:50%;height:<?php echo $height; ?>;font-size:<?php echo $label_field_font_size; ?>px;word-break: break; width:100%;">
                                <?php echo preg_replace('/\\\\/i', ' ', $label_field_content); ?> </span> </p>
                            <?php } ?>
                            </td>
                        </tr>
                        
                         <tr>
                         <?php
                       
                        $fieldName = 'amts';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtsFont = $label_field_font_size;
                        if ($label_field_check == 'true' && $slPrItemValforpaymentpanel != 0) {
                            $fieldName = 'amtsLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                        <td colspan="11" style="text-align:right;padding:5px 5px;font-size:<?php echo $amtsFont; ?>px;color:#000"><b> <?php echo $label_field_content; ?></b></td>
                        <?php } ?>
                        <td style="text-align:right;padding:2px 5px;font-size:<?php echo $amtsFont; ?>px;color:#000;border-right:0;">
                            <b>
                            <?php
                            //echo '$utin_payment_mode=='.$utin_payment_mode;
                                    //
                                    //
                                    if ($utin_payment_mode == 'RateCut' || $utin_payment_mode == 'NoRateCut') {
                                        echo formatInIndianStyle($utin_total_amt);
                                    } 
                                    else if ($sttrFixedPriceStatus == TRUE) {  
                                        //
                                        if ($utin_pay_cgst_tot_amt != NULL && $utin_pay_cgst_tot_amt != '') {
                                            echo formatInIndianStyle($utin_pay_cgst_tot_amt);
                                        } else {
                                            echo formatInIndianStyle($utin_pay_igst_tot_amt);
                                        }
                                        //
                                    }
                                    else {
                                        echo formatInIndianStyle($slPrItemValforpaymentpanel);
                                    }
                                    //
                                    //
                                    ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                       <?php              
                        $fieldName = 'othChPay';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtsFont = $label_field_font_size;
                        if ($label_field_check == 'true' && $slPrItemValforpaymentpanel != 0) {
                            $fieldName = 'othChPayLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                         <td colspan="11" style="text-align:right;padding:5px 5px;font-size:<?php echo $label_field_font_size; ?>px;color:#000"><b> <?php echo $label_field_content; ?></b></td>
                        
                         <td style="text-align:right;padding:2px 5px;font-size:<?php echo $amtsFont; ?>px;color:#000;border-right:0;">
                             <b>
                                 <?php echo formatInIndianStyle(om_round($totalOthChgs)); ?>
                             </b>
                    </td>

<?php } ?>                    </tr>
                     <?php              
                        $fieldName = 'mkgChrg';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtsFont = $label_field_font_size;
                        if ($label_field_check == 'true') {
                            $fieldName = 'mkgChrgLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                         <td colspan="11" style="text-align:right;padding:5px 5px;font-size:<?php echo $label_field_font_size; ?>px;color:#000"><b> <?php echo $label_field_content; ?></b></td>
                        
                         <td style="text-align:right;padding:2px 5px;font-size:<?php echo $amtsFont; ?>px;color:#000;border-right:0;">
                             <b>
                                 <?php
                        if ($sttr_total_making_charges != 0) {
                             echo formatInIndianStyle(om_round($totOtherChags));// Code for Other Charges @Author:PRIYANKA-12OCT2018
                        } else {
                            echo" ";
                        }
                        ?>
                             </b>
                    </td>

<?php } ?>                    </tr>
                     <?php              
                        $fieldName = 'hallmarkChrgs';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $amtsFont = $label_field_font_size;
                        if ($label_field_check == 'true' && $slPrItemValforpaymentpanel != 0) {
                            $fieldName = 'hallmarkChrgsLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                         <td colspan="11" style="text-align:right;padding:5px 5px;font-size:<?php echo $label_field_font_size; ?>px;color:#000"><b> <?php echo $label_field_content; ?></b></td>
                        
                         <td style="text-align:right;padding:2px 5px;font-size:<?php echo $amtsFont; ?>px;color:#000;border-right:0;">
                             <b>
                                 <?php echo formatInIndianStyle(om_round($utin_hallmark_chrgs_amt)); ?>
                             </b>
                    </td>

<?php } ?>                    </tr>
                    <tr>
                        <?php
                         $fieldName = 'jVat';
                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                           
                                $fieldName = 'jVatLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                           
                                ?>
                        <td colspan="11"  style="text-align:right;padding:5px;font-size:<?php echo $label_field_font_size; ?>px;color:#000"><b><?php echo $label_field_content; ?></b></td>
                            <?php } ?>
                        <td style="text-align:right;padding:5px;font-size:<?php echo $label_field_font_size; ?>px;color:#000;border-right:0;"><b> <?php echo formatInIndianStyle($taxAmt); ?></b></td>
                    </tr>
                    <tr>
                        <?php
                      if ($utin_cash_amt_rec != 0 || $utin_pay_cheque_amt != 0 || $utin_pay_card_amt != 0) {
                            $fieldName = 'cashPaid';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $cashPaidFont = $label_field_font_size;
                            if ($label_field_check == 'true') {
                                $fieldName = 'cashPaidLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($label_field_font_size == 0) {
                                    $label_field_font_size = 12;
                                }
                            }
                                ?>
                        <td colspan="11"  style="text-align:right;padding:5px;font-size:<?php echo $cashPaidFont ?>px;color:#000"><b><?php echo $label_field_content; ?></b></td>
                        <?php } ?>
                        <td style="text-align:right;padding:5px;font-size:<?php echo $cashPaidFont; ?>px;color:#000;border-right:0;">
                            <b>
                                <?php echo formatInIndianStyle($utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid)); ?>
                            </b>
                        </td>
                    </tr>
                    <tr class="gray-bottom">
                         <?php
                      if ($utin_cash_amt_rec != 0 || $utin_pay_cheque_amt != 0 || $utin_pay_card_amt != 0) {
                            $fieldName = 'cashPaid';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $cashPaidFont = $label_field_font_size;
                            if ($label_field_check == 'true') {
                                $fieldName = 'cashPaidLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($label_field_font_size == 0) {
                                    $label_field_font_size = 12;
                                }
                            }
                                ?>
                        <td colspan="2"><b><?php echo $label_field_content; ?> : </b></td>
                      <?php } ?>
                        <td colspan="11"><b><?php echo formatInIndianStyle($utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid)); ?></b></td>
                    </tr>
                    
                    <table class="invoicecenter" width="100%" style="border:0;">
        <tr>
            <td>
                <table width="100%" style="padding:10px 20px">
                 <tr>
            <td>
                <table width="100%" style="padding:10px 20px">
                    <tr >
                        <?php
                        $fieldName = 'forName';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($forName_check == 'true') {
                            $totalColumns++;
                            $fieldName = 'forNameLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <td>
                                <div class="termsDetailsCondition">
                                    <p style="margin-top:0px;margin-bottom:40px; font-size:<?php echo $label_field_font_size; ?>px;text-transform:uppercase;text-align:end;"><?php echo $label_field_content; ?>&nbsp;:&nbsp;&nbsp; <?php echo $firm_long_name; ?></p>
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                <tr>
                     <?php
                                $fieldName = 'authCustSignLb';
                                $qSelectCustSnap = "SELECT user_sign_snap FROM user WHERE user_id='$userId'";
                                $resCustSnap = mysqli_query($conn, "$qSelectCustSnap");
                                $rowCustSnap = mysqli_fetch_array($resCustSnap);
                                $custSnapFiletype = 'png';
                                $custSnap = $rowCustSnap['user_sign_snap'];
                                //header("Content-type: $custSnapFiletype"); 
                                ?>
                </tr>
                <tr style="display: flex;align-items:center;justify-content:space-between;margin:20px 0">
                    <?php
                    $fieldName = 'authCustSignLb';
//
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,"
                                    . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
//

                    if ($label_field_check == 'true') {
//                                    if ($custSnap != "") {
                        ?>
                        <td>
                            <table>
                                <tr>
                                    <td width="200px">
                                        <?php if ($custSnap != "") { ?>
                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omccsnim.php?cust_id=<?php echo "$userId"; ?>" 
                                                 id="sign" border="0" style="border-color: #B8860B;width:150px; height:75px;" alt=""/>
                                        </td>
                                    <?php } else {
                                        ?>
                                        <td style="height:45px;"></td>
                                    <?php }
                                    ?>
                                </tr>
                                <tr>
                                    <td style="font-size: <?php echo $label_field_font_size; ?>px; font-weight: bold;"><?php echo $label_field_content; ?></td>
                                </tr>                                        
                            </table>
                        </td>
                    <?php } ?>
<!--                    <td>
                        <div>
                            <p style="font-size:12px;text-align:center;font-weight:600;">
                                <span style="font-size:12px;font-weight:normal;">Amit Vasa</span><br><span>----------------</span><br>
                                Prepared By
                            </p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p style="font-size:12px;text-align:center;font-weight:600;">
                                <span style="font-size:12px;font-weight:normal;"></span><br><span>----------------</span><br>
                                Salesman
                            </p>
                        </div>
                    </td>-->
                    <td>
                        <?php
                        $fieldName = 'authSignLb';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>
                            <table>
                                <tr>
                                    <td style="height: 45px; text-align: right;">
                                        <?php if ($firm_owner_sign_ftype != NULL || $firm_owner_sign_ftype != '') {
                                            ?>
                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfowsi.php?firm_id=<?php echo $firm_id; ?>" 
                                                 alt="" style="width:45px; "/>
                                                 <?php
                                             }
                                             ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: <?php echo $label_field_font_size; ?>px; font-weight: bold;"><?php echo $label_field_content; ?></td>
                                </tr>
                            </table>
                        </td>
                    <?php } ?>
                </tr>  
                </table>
            </td>
        </tr>
   <table border="0" cellpadding="0" cellspacing="0" align="center" 
               <?php if ($panelName == 'PendingOrderInvoice') { ?>style="margin-top: 10px;"<?php } ?> >
               <?php
               if ($directPrintInvoice == 'YES') {
                   ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                     width="32px" height="32px" style="display: none;" onload="window.print();"/> 
                     <?php
                 }
                 ?>
            <tr>
                <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                    <a style="cursor: pointer;" 
                       onClick="window.print();">
                        <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                             width="32px" height="32px" /> 
                    </a>
                </td>
                <td align="center" class="noPrint">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                    <!-- <a style="cursor: pointer;" 
                       href='localexplorer:D:\lrearth\live\live\htdocs\omunim\2\include\php\bat\omprint.bat' > -->
                    <a style="cursor: pointer;" 
                       href='localexplorer:C:\COM\bat\omprint.bat' >
                        <img src="<?php echo $documentRootBSlash; ?>/images/printer_wifi_32.png" alt='Print' title='Print'
                             width="32px" height="32px" /> 
                    </a>
                </td>
                <td align="center" class="noPrint">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                </td>
                <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                    <!--                    <a style="cursor: pointer;" 
                                           href='localexplorer:D:\lrearth\live\live\htdocs\omunim\2\include\php\bat\omprint.bat' >-->
                    <a style="cursor: pointer;" onClick="var url = window.location.href;
                            url += '&emailStatus=Yes';
                            window.location.href = url;">
                        <img src="<?php echo $documentRootBSlash; ?>/images/email_48x48.png" alt='Email' title='Email'
                             width="32px" height="32px" /> 
                    </a>
                </td>
                <td align="center" class="noPrint">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                </td>
                <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                    <a style="cursor: pointer;" 
                      onClick="var url = window.location.href;
                            url += '&whatsappStatus=Yes';
                            window.location.href = url;"" >
                        <img src="<?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp'
                             width="32px" height="32px" /> 
                    </a>
                    <!--                    <a style="cursor: pointer;" 
                                           onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ominvoicepdf.php');" >
                                            <img src="<?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp'
                                                 width="32px" height="32px" /> 
                                        </a>-->
                </td>
            </tr>
        </table>
 </table>

