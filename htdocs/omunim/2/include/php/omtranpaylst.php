<?php
/*
 * **************************************************************************************
 * @tutorial: Transaction Payment List
 * **************************************************************************************
 * 
 * Created on FEB 08, 2018 5:32:05 PM
 *
 * @FileName: omtranpaylst.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
<div id="transactionPaymentListDiv">
              <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="left" colspan="14">
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">
                            <tr>
                                <td valign="middle" align="left">
                                    <div class="main_link_orange">PAYMENT LIST
                                        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />  
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <?php
            //Start Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
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
include 'omdatatablesUnset.php';
            //Data Table Main Columns
            $dataTableColumnsFields = array(
                array('dt' => 'VOUCHER'),
                array('dt' => 'NO.'),
                array('dt' => 'DATE'),
                array('dt' => 'PARTY NAME'),
                array('dt' => 'DESCRIPTION'),
                //array('dt' => 'TRANSACTION TYPE'),
                //array('dt' => 'TYPE'),
                array('dt' => 'AMOUNT'),
                array('dt' => 'SGST'),
                array('dt' => 'CGST'),
                array('dt' => 'IGST'),
                array('dt' => 'TOTAL AMOUNT'),
                array('dt' => 'INVOICE')
            );
            //
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            // Table Parameters
            $_SESSION['tableName'] = "user_transaction_invoice"; // Table Name
            $_SESSION['tableNamePK'] = 'utin_id'; // Primary Key
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
                //"CONCAT(utin_pre_invoice_no,' ',utin_invoice_no)",
                "utin_pre_invoice_no",
                "utin_invoice_no",
                "utin_date",
                "utin_user_name",
                "utin_other_info",
                //"utin_transaction_type",
                //"utin_type",
                "utin_total_amt",
                "utin_pay_sgst_amt",
                "utin_pay_cgst_amt",
                "utin_pay_igst_amt",
                "utin_tot_payable_amt",
                "utin_total_amt",
            );
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            $_SESSION['dtSumColumn'] = '';
            $_SESSION['dtDeleteColumn'] = '';
            // Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "utin_id,";
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
            //
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
            // Extra direct columns we need pass in SQL Query
            $_SESSION['tableWhere'] = "utin_firm_id IN ($strFrmId) and "
                    . " utin_transaction_type IN ('PAYMENT') AND utin_type IN ('Transaction') "
                    . " AND utin_status NOT IN ('Deleted') ";
            // Table Joins
            //
            $_SESSION['tableJoin'] = "";
            //
            // Data Table Main File
            include 'omdatatables.php';
            //END Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
            ?>
        </div>

    </div>