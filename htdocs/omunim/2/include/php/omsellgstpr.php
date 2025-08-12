<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Report By GST Product
 * **************************************************************************************
 * 
 * Created on Jun 18, 2013 11:00:58 AM
 *
 * @FileName: omsellgstpr.php
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
<div id="SellDetails">
    <div id="sellReportSubDiv">
        <table  class="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="margin:5px 0;">
            <td align="center" valign="" class="">
                <div class="" style="color: red;font-size:18px;font-weight:600;margin-left:5px;"><b>GST SELL REPORT BY PRODUCT</b></div>
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
                $stock_date_col =  "STR_TO_DATE(sttr_other_lang_add_date,'%d-%m-%Y')";
            }else{
                 $stock_date_col =  "STR_TO_DATE(sttr_add_date,'%d %b %Y')";
            }
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
            /*             * ********* Start Code To GET Firm Details ********* */
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {

                $selFirmId = $_SESSION['setFirmSession'];
            }
            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                $icondition=" sttr_transaction_type IN ('sell')";  
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                $icondition="sttr_transaction_type IN ('sell','ESTIMATESELL')";                
            }
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
            /*             * ********* End Code To GET Firm Details ********* */
            include 'omdatatablesUnset.php';
            //
            //
            if ($TaxAndGstSettingValue == 'TAX') {
                //
                //
                //Data Table Main Columns
                $dataTableColumnsFields = array(
                    array('dt' => 'INV'),
                    array('dt' => 'NO'),
                    array('dt' => 'DATE'),
                    array('dt' => 'FIRM'),
                    array('dt' => 'PRODUCT'),
                    array('dt' => 'METAL'),
                    array('dt' => 'GS WT'),
                    array('dt' => 'NT WT'),
                    array('dt' => 'FFN WT'),
                    array('dt' => 'HSN'),
                    array('dt' => 'CUSTOMER NAME'),
                    array('dt' => 'TOTAL AMT'),
                    array('dt' => 'TAX (VAT)'),
                    array('dt' => 'PAYABLE AMT'),
                    array('dt' => 'GSTIN NO'),
                    array('dt' => 'CITY'),
                    array('dt' => 'MOBILE'),
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
                    array('dt' => 'PRODUCT'),
                    array('dt' => 'METAL'),
                    array('dt' => 'GS WT'),
                    array('dt' => 'NT WT'),
                    array('dt' => 'FFN WT'),
                    array('dt' => 'HSN'),
                    array('dt' => 'CUSTOMER NAME'),
                    array('dt' => 'TOTAL AMT'),
                    array('dt' => 'CGST'),
                    array('dt' => 'SGST'),
                    array('dt' => 'IGST'),
                    array('dt' => 'MKG VAL'),        //ADDED MKG VAL @AUTHOR SIMRAN-28OCT2022
                    array('dt' => 'PAYABLE AMT'),
                    array('dt' => 'HALLMARKING'),
                    array('dt' => 'OTH CHRG'),
                    array('dt' => 'GSTIN NO'),
                    array('dt' => 'CITY'),
                    array('dt' => 'MOBILE'),
                    array('dt' => 'STATE'),
                );
                //
            }
            //
            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dataTableColumnsFields, 8, 2);

            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            //
            // Table Parameters
            $_SESSION['tableName'] = 'stock_transaction'; // Table Name
            $_SESSION['tableNamePK'] = 'sttr_invoice_no'; // Primary Key
            //
            //
            if ($TaxAndGstSettingValue == 'TAX') {
                //
                // DB Table Columns Parameters 
                $dbColumnsArray = array(
                    "sttr_pre_invoice_no",
                    "CAST(sttr_invoice_no AS UNSIGNED)",
                    "$stock_date_col",
                    "f.firm_name",
                    "sttr_item_name",
                    "sttr_metal_type",
                    "CONCAT(sttr_gs_weight, ' ', sttr_gs_weight_type)",
                    "CONCAT(sttr_nt_weight, ' ', sttr_nt_weight_type)",
                    "CONCAT(sttr_final_fine_weight, ' ', sttr_gs_weight_type)",
                    "sttr_hsn_no",
                    "CONCAT(u.user_fname, ' ', u.user_lname)",
                    "ROUND(sttr_valuation + sttr_total_making_charges)",
                    "ROUND(sttr_tot_tax)",
                    "sttr_final_valuation",
                    "u.user_cst_no",
                    "u.user_city",
                    "u.user_mobile",
                    "u.user_state",
                );
                //
            } else {
                //
                // DB Table Columns Parameters 
                $dbColumnsArray = array(
                    "sttr_pre_invoice_no",
                    "CAST(sttr_invoice_no AS UNSIGNED)",
                    "$stock_date_col",
                    "f.firm_name",
                    "sttr_item_name",
                    "sttr_metal_type",
                    "CONCAT(sttr_gs_weight, ' ', sttr_gs_weight_type)",
                    "CONCAT(sttr_nt_weight, ' ', sttr_nt_weight_type)",
                    "CONCAT(sttr_final_fine_weight, ' ', sttr_gs_weight_type)",
                    "sttr_hsn_no",
                    "CONCAT(u.user_fname, ' ', u.user_lname)",
                    "ROUND((sttr_final_valuation),2)",
                    "ROUND(((sttr_final_valuation * p.utin_pay_cgst_chrg)/100),2)",
                    "ROUND(((sttr_final_valuation * p.utin_pay_sgst_chrg)/100),2)" ,
                    "ROUND(((sttr_final_valuation * p.utin_pay_igst_chrg)/100),2)",
                    "sttr_total_making_charges",
                    "IF(sttr_tot_tax=0 OR sttr_tot_tax IS NULL,ROUND(@CGST + @SGST + @IGST " . " + sttr_final_valuation,0),sttr_final_valuation   )",
                    "sttr_total_hallmark_charges",
                    "sttr_other_charges",
                    "u.user_cst_no",
                    "u.user_city",
                    "u.user_mobile",
                    "u.user_state",
                );
                //    
            }
            //
            //
            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dbColumnsArray, 8, 2);
            //
            //print_r($dbColumnsArray);
            //echo count($dbColumnsArray)."=".count($dataTableColumnsFields);die;
            //
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            //
            if ($_SESSION['sessionProdName'] == 'OMRETL') {
                $_SESSION['dtSumColumn'] = '8,9,10,11,12';
            } else {
                if ($TaxAndGstSettingValue == 'TAX') {
                    $_SESSION['dtSumColumn'] = '6,7,8,11,12,13';
                } else {
                    $_SESSION['dtSumColumn'] = '6,7,8,11,12,13,14,15,16';
                }
            }
            //
            $_SESSION['dtSortColumn'] = '2,1';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtASCDESC'] = 'desc,desc';
            //
            // Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "sttr_id, sttr_user_id, sttr_pre_invoice_no, sttr_invoice_no, @CGST := ((sttr_final_valuation * p.utin_pay_cgst_chrg)/100), @SGST := ((sttr_final_valuation * p.utin_pay_sgst_chrg)/100), @IGST := ((sttr_final_valuation * p.utin_pay_igst_chrg)/100), @MCGST := ((sttr_total_making_charges * p.utin_pay_cgst_chrg)/100), @MSGST := ((sttr_total_making_charges * p.utin_pay_sgst_chrg)/100), @MKGCGST := ((sttr_total_making_charges * p.utin_pay_mkg_cgst_chrg)/100), @MKGSGST := ((sttr_total_making_charges * p.utin_pay_mkg_sgst_chrg)/100),";
            //
            //
            //start code to include all session@auth:ATHU29may17
            //
            $_SESSION['colorfulColumn'] = "";
            $_SESSION['colorfulColumnCheck'] = '';
            $_SESSION['colorfulColumnTitle'] = '';
            //
            // On Click Function Parameters
            $_SESSION['onclickColumnImage'] = "";
            $_SESSION['onclickColumn'] = "sttr_pre_invoice_no"; // On which column
            $_SESSION['onclickColumnId'] = "sttr_id";
            $_SESSION['onclickColumnValue'] = "sttr_id";
            $_SESSION['onclickColumnFunction'] = "getSellPanel";
            $_SESSION['onclickColumnFunctionPara1'] = "sttr_user_id";
            $_SESSION['onclickColumnFunctionPara2'] = "SoldOutList";
            $_SESSION['onclickColumnFunctionPara3'] = "sellMainDiv";
            $_SESSION['onclickColumnFunctionPara4'] = "";
            $_SESSION['onclickColumnFunctionPara5'] = "";
            $_SESSION['onclickColumnFunctionPara6'] = "";
            //
            // Where Clause Condition 
            $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_status NOT IN('Deleted')  and sttr_indicator NOT IN ('stockCrystal','PURCHASE') and $icondition";
            //
            // Table Joins
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id=f.firm_id"
                    . " INNER JOIN user_transaction_invoice AS p ON sttr_utin_id=p.utin_id"
                    . " LEFT JOIN user AS u ON sttr_user_id = u.user_id";
            // Data Table Main File
            include 'omdatatables.php';
            ?>
        </div>
    </div>
</div>
<!-------- ******End code  @Author:BAJRANG8JAN18*********-->