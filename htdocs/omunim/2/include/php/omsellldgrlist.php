<?php
/*
 * **************************************************************************************************
 * @Description: LEDGER SELL PURCHASE LIST @Author-PRIYANKA-03JULY2020
 * **************************************************************************************************
 *
 * Created on 03 July, 2020 06:00:58 PM 
 * **************************************************************************************
 * @FileName: omsellldgrlist.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL 
 * @version 2.7.9
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:03JULY2020
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.9
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
//
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
//
//
?>
<?php
//
//
if ($panel == '' || $panel == null)
    $panel = $_GET['panel'];
//
//
?> 
<div id="SellDetails">
    <div id="sellReportSubDiv">
        <table class="width_260mm" border="0" cellspacing="0" cellpadding="0" align="center">
            <td align="center" valign="" class="">
                <div class="" style="color: red;margin-right: 87%;"><b>SELL REPORT BY PRODUCT</b></div>
            </td>
            <tr>
                <td align="center" colspan="7" class="paddingTop4 padBott4">
                    <div class="hrGrey" style="width: 1097px;"></div>
                </td>
            </tr>
        </table>
        <div id="sellDetailsSubDiv">
            <?php
            /********* Start Code To GET Firm Details ********* */
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {
                // If not selected assign session firm 
                $selFirmId = $_SESSION['setFirmSession'];
            }
            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
            }
            if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
                $resFirmCount = mysqli_query($conn, $qSelFirmCount);
                $strFrmId = '0';
                // Set String for Public Firms
                while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                    $strFrmId = $strFrmId . ",";
                    $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                }
            } else {
                $strFrmId = $selFirmId;
            }
            /********** End Code To GET Firm Details ********* */
            //
            //
            include 'omdatatablesUnset.php';
            //
            // Data Table Main Columns
            $dataTableColumnsFields = array(
                array('dt' => 'INV'),
                array('dt' => 'NO'),
                array('dt' => 'DATE'),
                array('dt' => 'FIRM'),
                array('dt' => 'PRODUCT'),
                array('dt' => 'TYPE'),
                array('dt' => 'QTY'),
                array('dt' => 'PRICE'),
                array('dt' => 'OTH CHRG'),
                array('dt' => 'TOTAL PRICE'),
                array('dt' => 'GST'),
                array('dt' => 'FINAL PRICE'),
                array('dt' => 'CUST NAME'),
                array('dt' => 'GSTIN NO'),
                array('dt' => 'CITY'),
                array('dt' => 'STATE'),
                array('dt' => 'PIN'),
                array('dt' => 'HSN'),
                array('dt' => 'PROD CODE')
            );
            //
            //
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            //
            //
            // Table Parameters
            $_SESSION['tableName'] = 'stock_transaction'; // Table Name
            $_SESSION['tableNamePK'] = 'sttr_invoice_no'; // Primary Key
            //
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
                "sttr_pre_invoice_no",
                "CAST(sttr_invoice_no AS UNSIGNED)",
                "STR_TO_DATE(sttr_add_date ,'%d %b %Y')",
                "f.firm_name",
                "sttr_item_name",
                "sttr_metal_type",
                "sttr_quantity",
                "sttr_cust_price",
                "ifnull((sttr_total_making_charges),0)",
                "sttr_valuation",
                "sttr_tot_tax",
                "sttr_final_valuation",
                "CONCAT(u.user_fname, ' ', u.user_lname)",
                "u.user_cst_no",
                "u.user_city",
                "u.user_state",
                "u.user_pincode",
                "sttr_hsn_no",
                "sttr_item_code"
            );
            //
            //
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            //
            //
            $_SESSION['dtSumColumn'] = '6,7,8,9,10,11';
            //
            //
            $_SESSION['dtSortColumn'] = '2,1';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtASCDESC'] = 'desc,desc';
            //
            //
            // Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "sttr_id, sttr_user_id, sttr_pre_invoice_no, sttr_invoice_no,";
            //
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
            //
            // Where Clause Condition 
            $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_status NOT IN('Deleted') and "
                                    . "sttr_transaction_type = 'sell' and sttr_indicator NOT IN ('stockCrystal','PURCHASE')";
            //
            //
            // Table Joins
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id"
                                   . " LEFT JOIN user AS u ON sttr_user_id = u.user_id";
            //
            // Data Table Main File
            include 'omdatatables.php';
            //
            ?>
        </div>
    </div>
</div>