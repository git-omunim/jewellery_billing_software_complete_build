<?php
/*
 * **************************************************************************************
 * @tutorial: Advance Money List @PRIYANKA-04JUNE2020
 * **************************************************************************************
 *
 * Created on 04 JUNE, 2020 10:51:00 AM
 *
 * @FileName: omrtadmnlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL
 * @version 2.7.5
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
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
<div id="udhharListDiv">
    <div id="advMoneyList">                
        <div id="udhharListDiv">
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="left" colspan="14">
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">
                            <tr>
                                <td valign="middle" align="left">
                                    <div class="main_link_orange">ACTIVE ADVANCE LIST
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
            //Start Code to add Datatable Implementation @PRIYANKA-04JUNE2020
            /********** Start Code To GET Firm Details ********* */
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {
                //if not selected assign session firm 
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
            //
            //parse_str(getTableValues("SELECT utin_user_id FROM user_transaction_invoice WHERE utin_id='$utinId'"));
            // $u_user_id  = $utin_user_id;
            /********* End Code To GET Firm Details ********* */
            //
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
                array('dt' => 'LFT. AMT')
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
                "concat(t.user_fname,' ',SUBSTRING(t.user_father_name, 2),' ',t.user_lname)",// Added Father Name @AUTHOR Prathamesh:06OCT2023
                "t.user_mobile",
                "t.user_city",
                "UPPER(u.utin_type)",
                "UPPER(u.utin_transaction_type)",
                "CAST(abs(c.utin_total_amt) AS DECIMAL(10,2))",
                "IF((c.utin_total_amt_deposit='' || c.utin_total_amt_deposit IS NULL) ,0.00,CAST(abs(c.utin_total_amt_deposit) AS DECIMAL(10,2)))",
                "CAST(abs(c.utin_cash_balance) AS DECIMAL(10,2))"
            );
            //
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            $_SESSION['dtSumColumn'] = '8,9,10';
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
            //
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            // START TO CODE FOR CHECKING 'RECEIPT' TRANSACTION TYPE IN WHERE CONDITION FOR SHOWING RECEIPT ENTRIES IN ADV MONEY 
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            //
            // Extra direct columns we need pass in SQL Query
            $_SESSION['tableWhere'] = "u.utin_firm_id IN ($strFrmId) "
                    . "and c.utin_cash_balance<0 "
                    . "and u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT') "
                    . "and u.utin_status NOT IN ('deleted','Deleted','DELETED') "
                    . "and (u.utin_status NOT IN ('Paid') or u.utin_status IS NULL)";
            // Table Joins
            //
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            // START TO CODE FOR CHECKING 'RECEIPT' TRANSACTION TYPE IN WHERE CONDITION FOR SHOWING RECEIPT ENTRIES IN ADV MONEY 
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            //
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id "
                    . "LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
                    . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) ";
            //
            // Data Table Main File
                include 'omdatatables.php';
            // END Code to add Datatable Implementation @PRIYANKA-04JUNE2020
            ?>
        </div>
    </div>
</div>