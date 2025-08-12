<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Report By GST Invoice
 * **************************************************************************************
 * 
 * Created on Jun 8, 2018 11:00:58 AM
 *
 * @FileName: omsellgstinv.php
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
<?php ?> 
<div id="SellDetails">
    <div id="sellReportSubDiv">
        <table class="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:5px 0;">
            <td align="center" valign="" class="">
                <div class="" style="color: red;font-size:18px;font-weight:600;margin-left:5px;"><b>GST SELL REPORT BY INVOICE</b></div>
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

            if($nepaliDateIndicator == 'YES'){
                $utin_date_col =  "STR_TO_DATE(utin_other_lang_date,'%d-%m-%Y')";
            }else{
                 $utin_date_col =  "STR_TO_DATE(utin_date,'%d %b %Y')";
            }
            //
            // *************************************************************************************************************
            // START CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-17MAR2021
            // *************************************************************************************************************
            //
            $selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
            $resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
            $rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
            $TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
            //
            // *************************************************************************************************************
            // END CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-17MAR2021
            // *************************************************************************************************************
            //
            //
            /*             * ******** Start Code To GET Firm Details ********* */
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
            /*             * ******* End Code To GET Firm Details ********* */
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
                );
                //
            } else {
                //
                //Data Table Main Columns
                $dataTableColumnsFields = array(
                    array('dt' => 'INV'),
                    array('dt' => 'NO'),
                    array('dt' => 'DATE'),
                    array('dt' => 'FIRM'),
                    array('dt' => 'CUSTOMER NAME'),
                    array('dt' => 'TOTAL AMT'),
                    array('dt' => 'CGST'),
                    array('dt' => 'SGST'),
                    array('dt' => 'IGST'),
                    array('dt' => 'PAYABLE AMT'),
                    array('dt' => 'METAL AMT'),
                    array('dt' => 'DISC'),
                    array('dt' => 'AMT BY CASH'),
                    array('dt' => 'AMT BY CHEQUE'),
                    array('dt' => 'AMT BY CARD'),
                    array('dt' => 'ONLINE AMT'),
                    array('dt' => 'AMT BAL'),
                    array('dt' => 'GST NO'),
                    array('dt' => 'CITY'),
                    array('dt' => 'STATE'),
                );
                //    
            }

            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dataTableColumnsFields, 8, 2);

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
                    "ROUND((ifnull(utin_total_amt,0) + ifnull(utin_oth_chgs_amt,0) + ifnull(utin_crystal_amt,0)+  ifnull(utin_hallmark_chrgs_amt,0)- ifnull(utin_discount_amt_discup,0)),2)",
                    "ROUND((IF(utin_pay_tax_amt != 0,utin_pay_tax_amt,0)),2)",
                    "utin_tot_payable_amt",
                    "utin_cash_amt_rec",
                    "utin_pay_cheque_amt",
                    "utin_pay_card_amt",
                    "utin_online_pay_amt",
                    "u.user_cst_no",
                    "u.user_city",
                    "u.user_state",
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
                    "ROUND((ifnull(utin_total_amt,0) + ifnull(utin_oth_chgs_amt,0) + ifnull(utin_crystal_amt,0) + ifnull(utin_hallmark_chrgs_amt,0)- ifnull(utin_discount_amt_discup,0)),2)",
                    "ROUND((IF(utin_pay_cgst_amt != 0,utin_pay_cgst_amt + utin_pay_mkg_cgst_amt,0)),2)",
                    "ROUND((IF(utin_pay_sgst_amt != 0,utin_pay_sgst_amt + utin_pay_mkg_cgst_amt,0)),2)",
                    "utin_pay_igst_amt",
                    "utin_tot_payable_amt",
                    "utin_tot_amt_rec",
                    "utin_discount_amt",
                    "utin_cash_amt_rec",
                    "utin_pay_cheque_amt",
                    "utin_pay_card_amt",
                    "utin_online_pay_amt",
                    "ROUND(if((utin_amt_settled_inv_id IS NOT NULL AND utin_amt_settled_inv_id!=''),0,utin_left_amount),2)",
                    "u.user_cst_no",
                    "u.user_city",
                    "u.user_state",
                );
                //    
            }

            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dbColumnsArray, 8, 2);

            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change

            if ($_SESSION['sessionProdName'] == 'OMRETL') {
                $_SESSION['dtSumColumn'] = '5,6,7,8,9,10,11,12,13';
            } else {
                if ($TaxAndGstSettingValue == 'TAX') {
                    $_SESSION['dtSumColumn'] = '5,6,7,8,9,10,11';
                } else {
                    $_SESSION['dtSumColumn'] = '4,5,6,7,8,9,10,11,12,13,14,15';
                }
            }

            $_SESSION['dtSortColumn'] = '2,1';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtASCDESC'] = 'desc,desc';


// $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
// $_SESSION['dtSumColumn'] = '7,8,9,10,11,12,13,14,15,16,17';
// $_SESSION['dtSortColumn'] = '1,2';
// $_SESSION['dtDeleteColumn'] = '';
// $_SESSION['dtASCDESC'] = 'desc,desc';
//
// Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "utin_id, utin_user_id, utin_pre_invoice_no, utin_invoice_no,";

//
//
            $_SESSION['colorfulColumn'] = "";
            $_SESSION['colorfulColumnCheck'] = '';
            $_SESSION['colorfulColumnTitle'] = '';
// On Click Function Parameters
            $_SESSION['onclickColumnImage'] = "";

            $_SESSION['onclickColumn'] = "CAST(utin_invoice_no AS UNSIGNED)";
            $_SESSION['onclickColumnId'] = "utin_id";
            $_SESSION['onclickColumnValue'] = "utin_id";
            $_SESSION['onclickColumnFunction'] = "";   //showAllTransactionInvoiceDetails
            $_SESSION['onclickColumnFunctionPara1'] = "utin_id";
            $_SESSION['onclickColumnFunctionPara2'] = "utin_transaction_type";
            $_SESSION['onclickColumnFunctionPara3'] = "showAllTransactionInvoice";
            $_SESSION['onclickColumnFunctionPara4'] = "showAllTransactionInvoice";
            $_SESSION['onclickColumnFunctionPara5'] = "utin_type";
            $_SESSION['onclickColumnFunctionPara6'] = "utin_user_id";

// Where Clause Condition 
            $_SESSION['tableWhere'] = "utin_firm_id IN ($strFrmId) and utin_status NOT IN('Deleted') and utin_transaction_type = 'sell' ";

// Table Joins
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON utin_firm_id=f.firm_id"
                    . " LEFT JOIN user AS u ON utin_user_id = u.user_id";

// Data Table Main File
            include 'omdatatables.php';
            ?>
        </div>
    </div>
</div>
