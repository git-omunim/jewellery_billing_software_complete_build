<?php
/*
 * **************************************************************************************
 * @tutorial: All Udhaar List
 * **************************************************************************************
 *
 * Created on 23 June, 2017 03:17:57 PM
 *
 * @FileName:omuddelt.php
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
<?php
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

if($nepaliDateIndicator == 'YES'){
    $utin_date_col = "u.utin_other_lang_date";
}else{
    $utin_date_col =  "STR_TO_DATE(u.utin_date,'%d %b %Y')";
}
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
                                <div class="main_link_orange">ALL UDHAAR DEPOSIT LIST
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
        include 'omdatatablesUnset.php';
        //Data Table Main Columns
        $dataTableColumnsFields = array(
            array('dt' => 'S.No.'),
            array('dt' => 'DATE'),
            array('dt' => 'FIRM'),        //ADDED FIRM NAME @AUTHOR SIMRAN:12DEC2022
            array('dt' => 'MAIN INV NO'), //ADD MAIN INV NO @SIMRAN:06JUN2023
            array('dt' => 'USER TYPE'),
            array('dt' => 'CUST. NAME'),
            array('dt' => 'MOB NO.'),
            array('dt' => 'VILLAGE'),
            array('dt' => 'CITY'),
            array('dt' => 'Trans Type'),
            array('dt' => 'UDH. AMT'),
            array('dt' => 'CASH'),  //ADD CASH AMT @AUTHOR VINOD-07FEB2023
            array('dt' => 'BANK'),  //ADD BANK AMT @AUTHOR VINOD-07FEB2023
            array('dt' => 'CHEQUE'),  //ADD CHEQUE AMT @AUTHOR VINOD-07FEB2023
            array('dt' => 'ONLINE'),  //ADD ONLINE AMT @AUTHOR VINOD-07FEB2023
            array('dt' => 'DEP. AMT'),
            array('dt' => 'LEFT. AMT'),
            array('dt' => 'UDHAAR INV'),
            array('dt' => 'INV TYPE'),   //ADD INV TYPE @AUTHOR SIMRAN-13DEC2022
            array('dt' => 'STAFF')
        );
        //
        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
        // Table Parameters
        $_SESSION['tableName'] = "user_transaction_invoice as u"; // Table Name
        $_SESSION['tableNamePK'] = 'u.utin_id'; // Primary Key
        // DB Table Columns Parameters 
         if ($_SESSION['sessionIgenType'] == $globalOwnPass){
        $dbColumnsArray = array(
            "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)",
            "$utin_date_col",
            "f.firm_name",
            "IF(uti.utin_transaction_type IN('ESTIMATESELL'),' ',CONCAT(uti.utin_pre_invoice_no,' ',uti.utin_invoice_no))",
            "t.user_type",
            "concat(t.user_fname,' ',SUBSTRING(t.user_father_name, 2),' ',t.user_lname)", // Added Father Name @AUTHOR Prathamesh:06OCT2023
            "t.user_mobile",
            "t.user_village",
            "t.user_city",
            "UPPER(u.utin_transaction_type)",
            "(SELECT utin_total_amt FROM user_transaction_invoice WHERE utin_id=u.utin_utin_id)",
            "u.utin_cash_amt_rec", 
            "u.utin_pay_card_amt",
            "u.utin_pay_cheque_amt",
            "u.utin_online_pay_amt", 
            "IF((u.utin_total_amt_deposit='' || u.utin_total_amt_deposit IS NULL) ,0.00,CAST(u.utin_total_amt_deposit AS DECIMAL(10,2)))",
            "CAST(u.utin_cash_balance AS DECIMAL(10,2))",
            "(SELECT CONCAT(utin_pre_invoice_no,' ',utin_invoice_no) FROM user_transaction_invoice WHERE utin_id=u.utin_utin_id)",
            "u.utin_type",
            "su.user_login_id"
        );
       }else{
         $dbColumnsArray = array(
            "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)",
            "$utin_date_col",
            "f.firm_name",
            "CONCAT(uti.utin_pre_invoice_no,' ',uti.utin_invoice_no)",
            "t.user_type",
            "concat(t.user_fname,' ',SUBSTRING(t.user_father_name, 2),' ',t.user_lname)", // Added Father Name @AUTHOR Prathamesh:06OCT2023
            "t.user_mobile",
            "t.user_village",
            "t.user_city",
            "UPPER(u.utin_transaction_type)",
            "(SELECT utin_total_amt FROM user_transaction_invoice WHERE utin_id=u.utin_utin_id)",
            "u.utin_cash_amt_rec", 
            "u.utin_pay_card_amt",
            "u.utin_pay_cheque_amt",
            "u.utin_online_pay_amt", 
            "IF((u.utin_total_amt_deposit='' || u.utin_total_amt_deposit IS NULL) ,0.00,CAST(u.utin_total_amt_deposit AS DECIMAL(10,2)))",
            "CAST(u.utin_cash_balance AS DECIMAL(10,2))",
            "(SELECT CONCAT(utin_pre_invoice_no,' ',utin_invoice_no) FROM user_transaction_invoice WHERE utin_id=u.utin_utin_id)",
            "u.utin_type",
            "su.user_login_id"
        );  
       }
        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
        $_SESSION['dtSumColumn'] = '10,11,12,13,14,15';
        $_SESSION['dtDeleteColumn'] = '';
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
                . " u.utin_transaction_type IN ('UDHAAR DEPOSIT') AND "
                . " u.utin_status NOT IN ('Deleted')";
        // Table Joins
        //
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id "
             . "LEFT JOIN user AS su ON u.utin_staff_id=su.user_id "
             . "LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
             . "LEFT JOIN user_transaction_invoice AS ut ON u.utin_utin_id= ut.utin_id "
            . "LEFT JOIN user_transaction_invoice AS uti ON ut.utin_utin_id= uti.utin_id ";
    
        //
        // Data Table Main File
        include 'omdatatables.php';
        //END Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
        ?>
    </div>
