<?php
/*
 * **************************************************************************************
 * @tutorial: Purchase Item list @AUTHOR: AMOL22Sept2017
 * **************************************************************************************
 * 
 * Created on Sept 22, 2017 11:00:58 AM
 *
 * @FileName: orbbblsd_2.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//change in file @AUTHOR: AMOL22Sept2017
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include 'conversions.php';
include_once 'ommpfndv.php';
?>
<?php ?>
<div id="hsnDetails">
    <div id="hsnReportSubDiv">
        <table class="" width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top: 8px">
            <tr>

                <td valign="middle" align="center"> <!---Change in line @AUTHOR: AMOL22Sept2017--->
                    <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td>
                <td valign="middle" align="left" width="10px"><!---Change in setScrollIdFun parameter ID @AUTHOR: SANDY10DEC13------>
                    <img src="<?php echo $documentRoot; ?>/images/girvi24.png" height="15px"  alt="" onLoad="setScrollIdFun('headerTable')"/><!--Id changed @Author:PRIYA24OCT13--><!-- to add image and chanes in width of tables @AUTHOR: SANDY30JUL13 -->
                </td>
                <td>
                    <!--<div class="itemAddPnLabels12">TRANSACTION LEDGER</div>-->
                    <div class="main_link_brown16" style="margin-right: 606px;">USER TRANSACTION LEDGER (लेनदेन विवरण)</div>
                </td>
                <td align="center" valign="" class="noPrint">
                    <input type="submit" id="usercustomer" name="usercustomer" class="frm-btn" value="CUSTOMER" onclick="usercustomer();"/>
                </td>
            <tr>
                <td align="center" colspan="6"class="paddingTop4 padBott4" >
                    <div class="hrGrey"></div>
                </td>
            </tr>
        </table>
        
        <div id="hsnDetailsSubDiv">
            <table  class="width_203mm paddingTop10" border="0" cellspacing="0" cellpadding="0" align="center">


                <!----START CODE @AUTHOR:AMOL24AUG17----->
                <?php
                /*                 * *********** Start Code To GET Firm Details ********* */
                if (isset($_GET['selFirmId'])) {
                    $selFirmId = $_GET['selFirmId'];
                } else {
                    //if not selected assign session firm @AUTHOR: AMOL22Sept2017
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
                    //Set String for Public Firms
                    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                        $strFrmId = $strFrmId . ",";
                        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                    }
                } else {
                    $strFrmId = $selFirmId;
                }
include 'omdatatablesUnset.php';
//Data Table Main Columns
                $dataTableColumnsFields = array(
                    array('dt' => 'NAME'),
                    array('dt' => 'TYPE'),
                    array('dt' => 'AMT BAL'),
                    array('dt' => 'AMT DEPOSITE'),
                    array('dt' => 'AMT LEFT'),
                    array('dt' => 'GOLD(BL)'),
                    array('dt' => 'GOLD(DE)'),
                    array('dt' => 'GOLD LEFT'),
                    array('dt' => 'SILVER(BL)'),
                    array('dt' => 'SILVER(DE)'),
                    array('dt' => 'SILVER LEFT'),
                    array('dt' => 'FIRM'),
                );
                $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
// Table Parameters
                $_SESSION['tableName'] = 'user_transaction_invoice'; // Table Name
                $_SESSION['tableNamePK'] = 'utin_id'; // Primary Key
                $dtcolor = 'color';
//                $_SESSION['color'];
//                echo '$dtcolor='.$dtcolor;
// DB Table Columns Parameters 
                $dbColumnsArray = array(
                    "CONCAT(u.user_fname,' ',u.user_lname)",
                    "u.user_type",
                    "ROUND((SELECT SUM(abs(utin_cash_balance)) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase' and utin_transaction_type='UDHAAR'and (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk!='checked')),2)",
                    "ROUND((SELECT SUM((utin_cash_balance)) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase' and utin_transaction_type='DEPOSIT'and (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk!='checked')),2)",
                    "ROUND((ifnull((SELECT SUM((utin_cash_balance)) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase'and (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk!='checked')),0)),2)",
                    "ROUND((SELECT SUM(utin_gd_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase' and utin_transaction_type='UDHAAR' and (utin_gd_pay_chk IS NULL OR utin_gd_pay_chk!='checked')),2)",
                    "ROUND((SELECT SUM(utin_gd_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type ='OnPurchase' and utin_transaction_type ='DEPOSIT' and (utin_gd_pay_chk IS NULL OR utin_gd_pay_chk!='checked')),2)",
//                    "ROUND((SELECT SUM(utin_gd_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase'),2)",
                    "ROUND((ifnull((SELECT SUM(utin_gd_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase' and (utin_gd_pay_chk IS NULL OR utin_gd_pay_chk!='checked')),0)),2)",
                    "ROUND((SELECT SUM(utin_sl_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase' and utin_transaction_type='UDHAAR'and (utin_sl_pay_chk IS NULL OR utin_sl_pay_chk!='checked')),2)",
                    "ROUND((SELECT SUM(utin_sl_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type ='OnPurchase' and utin_transaction_type ='DEPOSIT'and (utin_sl_pay_chk IS NULL OR utin_sl_pay_chk!='checked')),2)",
                    "ROUND((ifnull((SELECT SUM(utin_sl_due_wt) FROM user_transaction_invoice WHERE utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_type='OnPurchase' and (utin_sl_pay_chk IS NULL OR utin_sl_pay_chk!='checked')),0)),2)",
                    "f.firm_name"
                );
                $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
                $_SESSION['dtSumColumn'] = '';
                $_SESSION['dtSortColumn'] = '';
                $_SESSION['dtDeleteColumn'] = '';
                $_SESSION['dtASCDESC'] = '';
//
// Extra direct columns we need pass in SQL Query
                $_SESSION['sqlQueryColumns'] = "utin_id, utin_user_id, utin_pre_invoice_no, utin_invoice_no,";

//
////start code to include all session@auth:ATHU29may17
//
                $_SESSION['colorfulColumn'] = "";
                $_SESSION['colorfulColumnCheck'] = '';
                $_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
                $_SESSION['onclickColumnImage'] = "";
                $_SESSION['onclickColumn'] = ""; // On which column
                $_SESSION['onclickColumnId'] = "";
                $_SESSION['onclickColumnValue'] = "";
                $_SESSION['onclickColumnFunction'] = "";
                $_SESSION['onclickColumnFunctionPara1'] = "";
                $_SESSION['onclickColumnFunctionPara2'] = "";
                $_SESSION['onclickColumnFunctionPara3'] = "";
                $_SESSION['onclickColumnFunctionPara4'] = "";
                $_SESSION['onclickColumnFunctionPara5'] = "";
                $_SESSION['onclickColumnFunctionPara6'] = "";

// Delete Function Parameters
                $_SESSION['deleteColumn'] = ""; // On which column
                $_SESSION['deleteColumnId'] = "";
                $_SESSION['deleteColumnValue'] = "";
                $_SESSION['deleteColumnFunction'] = "";
                $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
                $_SESSION['deleteColumnFunctionPara2'] = "";
                $_SESSION['deleteColumnFunctionPara3'] = "";
                $_SESSION['deleteColumnFunctionPara4'] = "";
                $_SESSION['deleteColumnFunctionPara5'] = "";
                $_SESSION['deleteColumnFunctionPara6'] = "";
                //
// Where Clause Condition 
                $_SESSION['tableWhere'] = "utin_user_id = u.user_id and u.user_type='SUPPLIER' and utin_firm_id IN ($strFrmId) and (utin_status NOT IN ('Deleted') OR utin_status IS NULL) and utin_type = 'OnPurchase' GROUP BY utin_user_id";
// Table Joins
                $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON utin_firm_id=f.firm_id"
                        . " LEFT JOIN user AS u ON utin_user_id = u.user_id and u.user_type='SUPPLIER'";
//                echo $_SESSION['tableJoin'];
// Data Table Main File
                include 'omdatatables.php';
                ?>

        </div>


