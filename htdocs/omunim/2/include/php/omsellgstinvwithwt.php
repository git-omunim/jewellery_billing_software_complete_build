<?php
/*
 * ************************************************************************************
 * @tutorial: SELL  REPORT BY INVOICE WITH TOTAL WEIGHT FILE @AUTHOR:MADHUREE-18FEB2022
 * ************************************************************************************
 * 
 * Created on FEB 18, 2022 5:00:58 AM
 *
 * @FileName: omsellgstinvwithwt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:8 JAN 17
 *  AUTHOR:BAJRANG
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//echo 'hellloo';
?>
<div id="SellDetails">
    <div id="sellReportSubDiv">
        <table class="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="margin:5px 0;">
            <td align="left" colspan="7">
                <div class="" style="color: red;font-size:18px;font-weight:600;margin-left:5px;"><b>GST SELL REPORT BY
                        INVOICE WITH TOTAL METAL WEIGHT</b></div>
            </td>
            <!--            <tr>
                <td align="center" colspan="7" class="paddingTop4 padBott4">
                    <div class="hrGrey" style="width: 1097px;"></div>--Change in line @AUTHOR: SANDY12DEC13---
                </td>
            </tr>-->
        </table>
        <div id="sellDetailsSubDiv">
            <?php
            //
            $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
            $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
            $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
            $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

            $selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
            $resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
            $rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
            $nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];

            if ($nepaliDateIndicator == 'YES') {
                $utin_date_col = "STR_TO_DATE(utin_other_lang_date,'%d-%m-%Y')";
            } else {
                $utin_date_col = "STR_TO_DATE(utin_date,'%d %b %Y')";
            }
            //
            $selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
            $resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
            $rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
            $TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
            //
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {

                $selFirmId = $_SESSION['setFirmSession'];
            }
            //
            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
            }
            //
            if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
                $resFirmCount = mysqli_query($conn, $qSelFirmCount);
                $strFrmId = '0';
                //Set String for Public Firms
                while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                    $strFrmId = $strFrmId . ",";
                    $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                }
            } else {
                $strFrmId = $selFirmId;
            }
            //
            include 'omdatatablesUnset.php';
            //
            //
            if ($TaxAndGstSettingValue == 'TAX') {
                //
                //Data Table Main Columns
                $dataTableColumnsFields = array(
                    array('dt' => 'INV'),
                    array('dt' => 'NO'),
                    array('dt' => 'DATE'),
                    array('dt' => 'FIRM'),
                    array('dt' => 'CUSTOMER NAME'),
                    array('dt' => 'MOBILE'),
                    array('dt' => 'ADDRESS'),
                    array('dt' => 'TOT GD GS WT'),
                    array('dt' => 'TOT GD NT WT'),
                    array('dt' => 'TOT SL GS WT'),
                    array('dt' => 'TOT SL NT WT'),
                    array('dt' => 'TOTAL AMT'),
                    array('dt' => 'TAX (VAT)'),
                    array('dt' => 'PAYABLE AMT'),
                    array('dt' => 'AMT BY CASH'),
                    array('dt' => 'AMT BY CHEQUE'),
                    array('dt' => 'AMT BY CARD'),
                    array('dt' => 'ONLINE PAYMENT'),
                    array('dt' => 'GSTIN NO'),
                    array('dt' => 'CITY'),
                    array('dt' => 'STATE'),
                    array('dt' => 'INV TYPE'), //ADDED COL FOR INV TYPE @AUTHOR SIMRAN-11OCT2022
                );
                //
            } else {
                //
                //Data Table Main Columns
                $dataTableColumnsFields = array(
                    array('dt' => 'INV'),
                    array('dt' => 'NO'), //DIFFERENTIATE INVOICE PRE AND POST SERIAL NO @AUTHOR:MARUTI-31MAY2022
                    array('dt' => 'DATE'),
                    array('dt' => 'FIRM'),
                    array('dt' => 'CUSTOMER NAME'),
                    array('dt' => 'MOBILE'),
                    array('dt' => 'ADDRESS'),
                    array('dt' => 'TOT GD GS WT'),
                    array('dt' => 'TOT GD NT WT'),
                    array('dt' => 'TOT SL GS WT'),
                    array('dt' => 'TOT SL NT WT'),
                    array('dt' => 'GOLD AMT'), //ADDED COL FOR TOTAL GD AMT @AUTHOR SIMRAN-22JULY2022
                    array('dt' => 'SILVER AMT'), //ADDED COL FOR TOTAL SL AMT @AUTHOR SIMRAN-22JULY2022
                    array('dt' => 'ADDITIONAL CHARGES'),
                    array('dt' => 'BEFORE TAX DISC'),
                    array('dt' => 'TAXABLE AMT'),
                    array('dt' => 'CGST'),
                    array('dt' => 'SGST'),
                    array('dt' => 'IGST'),
                    array('dt' => 'TOTAL AMT'),
                    array('dt' => 'METAL AMT'),
                    array('dt' => 'GD FINAL AMT'), //ADDED COL FOR GD FINAL AMT @AUTHOR SIMRAN-12JUNE2023
                    array('dt' => 'SL FINAL AMT'), //ADDED COL FOR SL FINAL AMT @AUTHOR SIMRAN-12JUNE2023
                    array('dt' => 'CRYSTAL AMT'), //ADDED COL FOR CRYSTAL AMT @AUTHOR SIMRAN-12JUNE2023
                    array('dt' => 'PREV AMT'), //ADDED COL FOR PREV AMT @AUTHOR SIMRAN-12JUNE2023
                    array('dt' => 'DISC'),
                    array('dt' => 'AMT BY CASH'),
                    array('dt' => 'AMT BY CHEQUE'),
                    array('dt' => 'AMT BY CARD'),
                    array('dt' => 'ONLINE AMT'),
                    array('dt' => 'AMT BAL'),
                    array('dt' => 'GST NO'),
                    array('dt' => 'CITY'),
                    array('dt' => 'STATE'),
                    array('dt' => 'INV TYPE'),
                    array('dt' => 'SALES PERSON'),
                );
                //    
            }

            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            //
            // Table Parameters
            $_SESSION['tableName'] = 'user_transaction_invoice'; // Table Name
            $_SESSION['tableNamePK'] = 'utin_invoice_no'; // Primary Key
            //
            //
            if ($TaxAndGstSettingValue == 'TAX') {
                //
                // DB Table Columns Parameters 
                $dbColumnsArray = array(
                    "utin_pre_invoice_no",
                    "CAST(utin_invoice_no AS UNSIGNED)",
                    "$utin_date_col",
                    "f.firm_name",
                    "CONCAT(u.user_fname, ' ', u.user_lname)",
                    "u.user_mobile",
                    "u.user_add",
                    "CONCAT(CAST(utin_gd_gs_wt as decimal(10,3)), ' ', utin_gd_gs_wt_type)",
                    "CONCAT(CAST(utin_gd_nt_wt as decimal(10,3)), ' ', utin_gd_nt_wt_type)",
                    "CONCAT(CAST(utin_sl_gs_wt as decimal(10,3)), ' ', utin_sl_gs_wt_type)",
                    "CONCAT(CAST(utin_sl_nt_wt as decimal(10,3)), ' ', utin_sl_nt_wt_type)",
                    "ROUND((ifnull(utin_total_amt,0) + ifnull(utin_oth_chgs_amt,0) + ifnull(utin_crystal_amt,0)- ifnull(utin_discount_amt_discup,0)),2)",
                    "ROUND((IF(utin_pay_tax_amt != 0,utin_pay_tax_amt,0)),2)",
                    "utin_tot_payable_amt",
                    "IF(utin_cash_amt_rec='' OR utin_cash_amt_rec IS NULL,0.00,utin_cash_amt_rec)",
                    "IF(utin_pay_cheque_amt='' OR utin_pay_cheque_amt IS NULL,0.00,utin_pay_cheque_amt)",
                    "IF(utin_pay_card_amt='' OR utin_pay_card_amt IS NULL,0.00,utin_pay_card_amt)",
                    "IF(utin_online_pay_amt='' OR utin_online_pay_amt IS NULL,0.00,utin_online_pay_amt)",
                    "u.user_cst_no",
                    "u.user_city",
                    "u.user_state",
                    "utin_type",
                );
                //
            } else {
                //
                // DB Table Columns Parameters 
                $dbColumnsArray = array(
                    "utin_pre_invoice_no",
                    "CAST(utin_invoice_no AS UNSIGNED)",
                    "$utin_date_col",
                    "f.firm_name",
                    "CONCAT(u.user_fname, ' ', u.user_lname)",
                    "u.user_mobile",
                    "u.user_add",
                    "CONCAT(CAST(utin_gd_gs_wt as decimal(10,3)), ' ', utin_gd_gs_wt_type)",
                    "CONCAT(CAST(utin_gd_nt_wt as decimal(10,3)), ' ', utin_gd_nt_wt_type)",
                    "CONCAT(CAST(utin_sl_gs_wt as decimal(10,3)), ' ', utin_sl_gs_wt_type)",
                    "CONCAT(CAST(utin_sl_nt_wt as decimal(10,3)), ' ', utin_sl_nt_wt_type)",
                    "ROUND(utin_gold_amt,2)",
                    "ROUND(utin_silver_amt,2)",
//                    "ROUND(IF(utin_pay_tax_by_val_chk = 'checked',(utin_gold_amt + COALESCE(utin_gd_total_mkg,0)) - ((utin_gold_amt * 3)/103),(utin_gold_amt+COALESCE(utin_gd_total_mkg,0))),2)",
//                    "ROUND(IF(utin_pay_tax_by_val_chk = 'checked',(utin_silver_amt + COALESCE(utin_sl_total_mkg,0)) - ((utin_silver_amt * 3)/103),(utin_silver_amt+COALESCE(utin_sl_total_mkg,0))),2)",
                    "ROUND(utin_additional_charges)",
                    "ROUND(ifnull(utin_discount_amt_discup,0))",
//                    "ROUND((ifnull(utin_total_amt,0) + ifnull(utin_oth_chgs_amt,0) + ifnull(utin_additional_charges,0) +ifnull(utin_hallmark_chrgs_amt,0) + ifnull(utin_crystal_amt,0)- ifnull(utin_discount_amt_discup,0)))",
//                    "ROUND((COALESCE(utin_gold_amt,0)+ COALESCE(utin_silver_amt,0) + COALESCE(utin_hallmark_chrgs_amt,0) + COALESCE(utin_oth_chgs_amt,0) + IF(utin_pay_tax_by_val_chk = 'checked',0,COALESCE(utin_additional_charges ,0)) - COALESCE(utin_discount_amt_discup,0)),2)",
                    "ROUND(((COALESCE(utin_total_taxable_amt,0)+ COALESCE(utin_additional_charges ,0))  - COALESCE(utin_discount_amt_discup,0)),2)",
                    "IF(utin_pay_cgst_amt != 0,utin_pay_cgst_amt,0)",
                    "IF(utin_pay_sgst_amt != 0,utin_pay_sgst_amt,0)",
                    "utin_pay_igst_amt",
                    // "ROUND((ifnull(utin_total_amt,0) + ifnull(utin_oth_chgs_amt,0) + IF(utin_pay_tax_by_val_chk = 'checked',0,ifnull(utin_additional_charges ,0))+ ifnull(utin_pay_cgst_amt *2,0) + ifnull(utin_hallmark_chrgs_amt,0) - ifnull(utin_discount_amt_discup,0)))",
                    "ROUND(((COALESCE(utin_total_taxable_amt,0)+ COALESCE(utin_additional_charges ,0)+COALESCE(utin_pay_cgst_amt ,0)+COALESCE(utin_pay_sgst_amt ,0)+COALESCE(utin_pay_igst_amt ,0))  - COALESCE(utin_discount_amt_discup,0)),2)",
//                    "ROUND((utin_gold_amt+utin_silver_amt+utin_pay_cgst_amt+utin_pay_sgst_amt+utin_pay_igst_amt+utin_additional_charges+utin_hallmark_chrgs_amt - utin_discount_amt_discup),2)",
                    "utin_tot_amt_rec",
                    "ROUND(if((utin_gold_amt IS NULL OR utin_gold_amt = ''),0,utin_gold_amt+(utin_pay_cgst_amt*2)+utin_pay_igst_amt+utin_hallmark_chrgs_amt+utin_oth_chgs_amt+(utin_pay_mkg_cgst_amt*2)+utin_pay_hallmark_cgst_amt -utin_discount_amt_discup),2)",
                    "ROUND(if((utin_silver_amt IS NULL OR utin_silver_amt = ''),0,utin_silver_amt+utin_pay_cgst_amt+utin_pay_sgst_amt+utin_pay_igst_amt+utin_hallmark_chrgs_amt+utin_oth_chgs_amt+utin_pay_mkg_cgst_amt+utin_pay_mkg_sgst_amt+utin_pay_hallmark_cgst_amt -utin_discount_amt_discup),2)",
//                    "ROUND(if((utin_gold_amt IS NULL OR utin_gold_amt = ''),0,utin_tot_payable_amt),2)",
//                    "ROUND(if((utin_silver_amt IS NULL OR utin_silver_amt = ''),0,utin_tot_payable_amt),2)",
                    "utin_crystal_amt",
                    "utin_prev_cash_bal",
                    "utin_discount_amt",
                    "IF(utin_cash_amt_rec='' OR utin_cash_amt_rec IS NULL,0.00,utin_cash_amt_rec)",
                    "IF(utin_pay_cheque_amt='' OR utin_pay_cheque_amt IS NULL,0.00,utin_pay_cheque_amt)",
                    "IF(utin_pay_card_amt='' OR utin_pay_card_amt IS NULL,0.00,utin_pay_card_amt)",
                    "IF(utin_online_pay_amt='' OR utin_online_pay_amt IS NULL,0.00,utin_online_pay_amt)",
                    "ROUND(if((utin_amt_settled_inv_id IS NOT NULL AND utin_amt_settled_inv_id!=''),0,utin_left_amount),2)",
                    "u.user_cst_no",
                    "u.user_city",
                    "u.user_state",
                    "utin_type",
                    "utin_sales_person_name",
                );
                //    
            }
            //
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;
            //
            if ($TaxAndGstSettingValue == 'TAX') {
                // $_SESSION['dtSumColumn'] = '5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21';
            } else {
                $_SESSION['dtSumColumn'] = '7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32';
            }
            //
            $_SESSION['dtSortColumn'] = '2,1';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtASCDESC'] = 'desc,desc';
            $_SESSION['sqlQueryColumns'] = "utin_id, utin_user_id, utin_pre_invoice_no, utin_invoice_no,utin_oth_chgs_amt,";
            //
            $_SESSION['colorfulColumn'] = "";
            $_SESSION['colorfulColumnCheck'] = '';
            $_SESSION['colorfulColumnTitle'] = '';
            //
            $_SESSION['onclickColumnImage'] = "";
            if ($TaxAndGstSettingValue == 'TAX') {
                $_SESSION['onclickColumn'] = "CAST(utin_invoice_no AS UNSIGNED)"; // On which column
            } else {
                $_SESSION['onclickColumn'] = "CONCAT(utin_pre_invoice_no,CAST(utin_invoice_no AS UNSIGNED))";
            }
            $_SESSION['onclickColumnId'] = "utin_id";
            $_SESSION['onclickColumnValue'] = "utin_id";
            $_SESSION['onclickColumnFunction'] = "showAllTransactionInvoiceDetails";
            $_SESSION['onclickColumnFunctionPara1'] = "utin_id";
            $_SESSION['onclickColumnFunctionPara2'] = "utin_transaction_type";
            $_SESSION['onclickColumnFunctionPara3'] = "showAllTransactionInvoice";
            $_SESSION['onclickColumnFunctionPara4'] = "showAllTransactionInvoice";
            $_SESSION['onclickColumnFunctionPara5'] = "utin_type";
            $_SESSION['onclickColumnFunctionPara6'] = "utin_user_id";
            //
            // Where Clause Condition 
            $_SESSION['tableWhere'] = "utin_firm_id IN ($strFrmId) and utin_status NOT IN('Deleted') and utin_transaction_type = 'sell' ";
            //
            // Table Joins
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON utin_firm_id=f.firm_id"
                    . " LEFT JOIN user AS u ON utin_user_id = u.user_id";
            //
            // Data Table Main File
            include 'omdatatables.php';
            ?>
        </div>
    </div>
</div>