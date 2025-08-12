<?php
/*
 * **************************************************************************************
 * @tutorial: All Udhaar List
 * **************************************************************************************
 *
 * Created on 23 June, 2017 03:17:57 PM
 *
 * @FileName: omuualud.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
<div id="girviPanelTrId"></div>
<div id="allUdhaarListDiv">
    <div id="udhharListDiv">
        <table border="0" cellspacing="0" cellpadding="1" width="100%">
            <tr>
                <td align="left" colspan="14">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="middle" align="left">
                                <div class="main_link_orange"> UDHAAR  LIST
                                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />  
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center" valign="middle">
                    <div id="messDisplayDiv"></div>
                    <div class="analysis_div_rows main_link_red_12">
                        <?php if ($showDiv == 'Settled') { ?>
                            <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ This Transaction Is Settled, You Can Not Delete This Transaction ~ </div>
                        <?php } ?>

                    </div>
                </td>
            </tr>
        </table>
        <?php
        //Start Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
        /*         * ********* Start Code To GET Firm Details ********* */
        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            //if not selected assign session firm @AUTHOR: SANDY10JUL13
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
        //parse_str(getTableValues("SELECT utin_user_id FROM user_transaction_invoice WHERE utin_id='$utinId'"));
        // $u_user_id  = $utin_user_id;
        /*         * ********* End Code To GET Firm Details ********* */
        //Data Table Main Columns
        include 'omdatatablesUnset.php';
        //
        $dataTableColumnsFields = array(
            array('dt' => 'S.No.'),
            array('dt' => 'DATE'),
            array('dt' => 'USER TYPE'),
            array('dt' => 'CUST. NAME'),
            array('dt' => 'MOB NO.'),
            array('dt' => 'CITY'),
            array('dt' => 'UDH. TYPE'),
            array('dt' => 'Trans Type'),
            array('dt' => 'UDH. AMT'),
            array('dt' => 'DEP. AMT'),
            array('dt' => 'LFT. AMT'),
            array('dt' => 'GOLD'),
            array('dt' => 'SILVER')
        );
        //
        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
        // Table Parameters
        $_SESSION['tableName'] = "user_transaction_invoice as u"; // Table Name
        $_SESSION['tableNamePK'] = 'u.utin_id'; // Primary Key
        // DB Table Columns Parameters 
        $dbColumnsArray = array(
            "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)",
            "STR_TO_DATE(u.utin_date,'%d %b %Y')",
            "t.user_type",
            "CONCAT(COALESCE(t.user_fname, ''), ' ', COALESCE(t.user_lname, ''))",
            "t.user_mobile",
            "t.user_city",
            "UPPER(u.utin_type)",
            "UPPER(u.utin_transaction_type)",
            "CAST(c.utin_total_amt AS DECIMAL(10,2))",
            "IF((c.utin_total_amt_deposit='' || c.utin_total_amt_deposit IS NULL) ,0.00,CAST(c.utin_total_amt_deposit AS DECIMAL(10,2)))",
            "CAST(c.utin_cash_balance AS DECIMAL(10,2))",
            "CONCAT(g.utin_gd_due_wt, ' ', g.utin_gd_due_wt_typ)",
            "CONCAT(s.utin_sl_due_wt, ' ', s.utin_sl_due_wt_typ)"
        );
        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
        $_SESSION['dtSumColumn'] = '';
        $_SESSION['dtDeleteColumn'] = '';
        $_SESSION['dtSortColumn'] = '1,0';
        // Extra direct columns we need pass in SQL Query
        $_SESSION['sqlQueryColumns'] = "u.utin_id,u.utin_user_id as 'u.utin_user_id',";
        //
        // On Click Function Parameters
        $_SESSION['onclickColumnImage'] = "";
        $_SESSION['onclickColumn'] = "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)"; // On which column
        $_SESSION['onclickColumnId'] = "u.utin_id";
        $_SESSION['onclickColumnValue'] = "u.utin_id";
        $_SESSION['onclickColumnFunction'] = "showCustUdhaarDetails";
        $_SESSION['onclickColumnFunctionPara1'] = "u.utin_id";
        $_SESSION['onclickColumnFunctionPara2'] = "u.utin_user_id";
        $_SESSION['onclickColumnFunctionPara3'] = "";
        $_SESSION['onclickColumnFunctionPara4'] = "";
        $_SESSION['onclickColumnFunctionPara5'] = "";
        $_SESSION['onclickColumnFunctionPara6'] = "";
        //
        // Delete Function Parameters
        $_SESSION['deleteColumn'] = "u.utin_id"; // On which column
        $_SESSION['deleteColumnId'] = "u.utin_id";
        $_SESSION['deleteColumnValue'] = "u.utin_id";
        $_SESSION['deleteColumnFunction'] = "deleteCustUdhaarDetailsFromUdhaarPanel";
        $_SESSION['deleteColumnFunctionPara1'] = "u.utin_user_id";
        $_SESSION['deleteColumnFunctionPara2'] = "u.utin_id";
        $_SESSION['deleteColumnFunctionPara3'] = "DeleteFromUdhaarAllDetails";
        $_SESSION['deleteColumnFunctionPara4'] = "";
        $_SESSION['deleteColumnFunctionPara5'] = "CONCAT(u.utin_pre_invoice_no,u.utin_invoice_no)";
        $_SESSION['deleteColumnFunctionPara6'] = "u.utin_date";
        $_SESSION['deleteColumnFunctionPara7'] = "u.utin_total_amt";
        //
        // Extra direct columns we need pass in SQL Query
        $_SESSION['tableWhere'] = "u.utin_firm_id IN ($strFrmId) and "
                . " u.utin_transaction_type IN ('UDHAAR','OnPurchase','UDHAAR DEPOSIT') "
                . "and u.utin_status NOT IN ('deleted','Deleted','DELETED') "
                . "and u.utin_status NOT IN ('Paid')";
        // Table Joins
        //
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id "
                . "LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                . "LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) "
                . "LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) ";
        //
        // Data Table Main File
        include 'omdatatables.php';
        //END Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
        ?>
    </div>
