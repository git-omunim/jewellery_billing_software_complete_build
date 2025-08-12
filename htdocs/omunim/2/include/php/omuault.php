<?php
/*
 * **************************************************************************************
 * @tutorial: all advance money active list @OMKAR24JAN2024
 * **************************************************************************************
 * 
 * Created on JAN 24, 202024 18:00:00 
 *
 * @FileName: omalladvlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
//Start Code To Select FirmId
?>
<?php 
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

if($nepaliDateIndicator == 'YES'){
    $utin_date_col = "utin_other_lang_date";
}else{
    $utin_date_col = "STR_TO_DATE(u.utin_date,'%d %b %Y')";
}
?>
<div id="udhharListDiv">
    <div id="advMoneyList">
        <div id="udhharListDiv">
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="left" colspan="14">
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">
                            <tr>
                                <td valign="middle" align="left">
                                    <div class="main_link_orange">ACTIVE ADVANCE MONEY LIST
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
            //Start Code to add Datatable Implementation @AUTHOR:@PRIYANKA-24JAN18
            /*             * ******** Start Code To GET Firm Details ********* */
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {
                //if not selected assign session firm @AUTHOR: @PRIYANKA-24JAN18
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
            /*             * ********** End Code To GET Firm Details ********* */

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
                array('dt' => 'ADV. TYPE'),
                array('dt' => 'TRANS TYPE'),
                array('dt' => 'ADV. AMT'),
                array('dt' => 'RETURN. AMT'),
                array('dt' => 'LFT. AMT'),
                array('dt' => 'GOLD'),
                array('dt' => 'SILVER')
            );

            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            // Table Parameters
            $_SESSION['tableName'] = "user_transaction_invoice as u"; // Table Name
            $_SESSION['tableNamePK'] = 'u.utin_id'; // Primary Key
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
                "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)",
                "$utin_date_col",
                "t.user_type",
                "CONCAT(COALESCE(t.user_fname, ''), ' ', COALESCE(t.user_lname, ''))",
                "t.user_mobile",
                "t.user_city",
                "UPPER(u.utin_type)",
                "UPPER(u.utin_transaction_type)",
                "CAST(abs(u.utin_total_amt) AS DECIMAL(10,2))",
                "IF((u.utin_total_amt_deposit='' || u.utin_total_amt_deposit IS NULL) ,0.00,CAST(abs(u.utin_total_amt_deposit) AS DECIMAL(10,2)))",
                "CAST(abs(u.utin_cash_balance) AS DECIMAL(10,2))",
                "CONCAT(u.utin_gd_due_wt, ' ', u.utin_gd_due_wt_typ)",
                "CONCAT(u.utin_sl_due_wt, ' ', u.utin_sl_due_wt_typ)"
            );

            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            $_SESSION['dtSumColumn'] = '8,9,10';
            $_SESSION['dtDeleteColumn'] = '';

            // Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "u.utin_id,u.utin_user_id as 'u.utin_user_id',";

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
            $_SESSION['deleteColumnFunctionPara1'] = "";
            $_SESSION['deleteColumnFunctionPara2'] = "";
            $_SESSION['deleteColumnFunctionPara3'] = "";
            $_SESSION['deleteColumnFunctionPara4'] = "";
            $_SESSION['deleteColumnFunctionPara5'] = "";
            $_SESSION['deleteColumnFunctionPara6'] = "";
            $_SESSION['deleteColumnFunctionPara7'] = "";
            //
            //
            // Extra direct columns we need pass in SQL Query
            $_SESSION['tableWhere'] = "u.utin_firm_id IN ($strFrmId)  "
                    . "and u.utin_transaction_type IN ('ADV MONEY') "
                    . "and u.utin_status NOT IN ('deleted','Deleted','DELETED') ";
            // Table Joins
            //
            //
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON u.utin_firm_id = f.firm_id"
                    . " LEFT JOIN user AS t ON u.utin_user_id = t.user_id  ";

            // Data Table Main File
            include 'omdatatables.php';
            // END Code to add Datatable Implementation @AUTHOR:@PRIYANKA-24JAN18
            ?>
        </div>
    </div>
</div>