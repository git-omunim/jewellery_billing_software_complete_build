<?php
/*
 * **************************************************************************************
 * @tutorial: All Udhaar List
 * **************************************************************************************
 *
 * Created on 19 Jan, 2018 03:17:57 PM
 *
 * @FileName: omuuault.php
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
    $udhar_start_date = "u.udhaar_other_lang_start_date";
    $udhar_end_date = "u.udhaar_other_lang_end_date";
      }else{
          $udhar_start_date = "u.udhaar_start_date";
    $udhar_end_date = "u.udhaar_end_date";
      }
$panelname = $_GET['panelName'];
if ($panelname == 'activeUdhaarListInt') {
    //
    ?>
    <div id="allUdhaarListIntDiv">
        <div id="udhharListIntDiv">
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="left" colspan="14">
                        <input type="hidden" id="girviPanelTrId" name="girviPanelTrId"/>
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">
                            <tr>
                                <td valign="middle" align="left">
                                    <div class="main_link_orange">UDHAAR ACTIVE LIST WITH INTEREST
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
            include 'omactiveUdhaarWithIntAmtView.php';
            // Data Table Main Columns
            include 'omdatatablesUnset.php';
            //
            // START TO ADD CODE FOR SON OF COLUMN @AUTHOR:SHRI20AUG19
            $dataTableColumnsFields = array(
                array('dt' => 'S.No.'), //ADDED FIRM NAME @AUTHOR SIMRAN:12DEC2022
                array('dt' => 'FIRM'),
                array('dt' => 'S.DATE'),
                array('dt' => 'E.DATE'),
                array('dt' => 'USER TYPE'),
                array('dt' => 'CUST. NAME'),
                array('dt' => 'CITY'),
                array('dt' => 'UDH. TYPE'),
                array('dt' => 'Trans Type'),
                array('dt' => 'UDH. AMT'),
                array('dt' => 'INTEREST'),
                array('dt' => 'LFT. AMT'),
                array('dt' => 'LFT AMT WITH INT'),
                array('dt' => 'CASH'),
                array('dt' => 'BANK'),
                array('dt' => 'CHEQUE'),
                array('dt' => 'ONLINE'),
                array('dt' => 'GOLD (GM)'),
                array('dt' => 'SILVER (GM)'),
                array('dt' => 'CRYSTAL (GM)'),
                array('dt' => 'S/C/W NAME'),
                array('dt' => 'OTHER INFO'),
                array('dt' => 'PAY OTHER INFO'),
                array('dt' => 'INV TYPE'),
                array('dt' => 'STAFF')
            );
            //
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            // Table Parameters
            $_SESSION['tableName'] = "temp_udhaar_amt_with_int_view as u"; // Table Name
            $_SESSION['tableNamePK'] = 'u.udhaar_id'; // Primary Key
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
                "CONCAT(u.udhaar_pre_invoice_no,' ',u.udhaar_invoice_no)",
                "u.udhaar_firm_name",
                "$udhar_start_date",
                "$udhar_end_date",
                "u.udhaar_user_type",
                "u.udhaar_user_fname",
                "u.udhaar_user_city",
                "IF(u.udhaar_utin_type IN ('MONEY'),UPPER('UDHAAR'),UPPER(u.udhaar_utin_type))",
                "IF(u.udhaar_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT'),UPPER('UDHAAR'),UPPER(u.udhaar_transaction_type))",
                "IF(u.udhaar_total_amt>0,abs(CAST(u.udhaar_total_amt AS DECIMAL(10,2))),0.00)",
                "u.udhaar_interest",
                "IF(u.udhaar_cash_balance>0,CAST(abs(u.udhaar_cash_balance) AS DECIMAL(10,2)),0.00)",
                "IF(u.udhaar_left_amt_with_int>0,CAST(abs(u.udhaar_left_amt_with_int) AS DECIMAL(10,2)),0.00)",
                "u.udhaar_cash_amt_rec",
                "u.udhaar_pay_card_amt",
                "u.udhaar_pay_cheque_amt",
                "u.udhaar_online_pay_amt",
                "IF(u.udhaar_gd_due_wt>0,CAST(abs(u.udhaar_gd_due_wt) AS DECIMAL(10,2)),0.00)",
                "IF(u.udhaar_sl_due_wt>0,CAST(abs(u.udhaar_sl_due_wt) AS DECIMAL(10,2)),0.00)",
                "IF(u.udhaar_st_due_wt>0,CAST(abs(u.udhaar_st_due_wt) AS DECIMAL(10,2)),0.00)",
                "SUBSTRING(u.udhaar_user_father_name, 2)",
                "u.udhaar_other_info",
                "u.udhaar_paym_oth_info",
                "u.udhaar_utin_type",
                "u.udhaar_user_login_id"
            );
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            $_SESSION['dtSumColumn'] = '9,10,11,12,13,14,15,16,17,18';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtSortColumn'] = '1,0';
            // Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "u.udhaar_id,u.udhaar_pre_invoice_no,u.udhaar_invoice_no,u.udhaar_utin_type,";
            //
            // END TO ADD CODE FOR SON OF COLUMN @AUTHOR:SHRI20AUG19
            // On Click Function Parameters
            $_SESSION['onclickColumnImage'] = "";
            $_SESSION['onclickColumn'] = "CONCAT(u.udhaar_pre_invoice_no,' ',u.udhaar_invoice_no)"; // On which column
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
            $_SESSION['deleteColumn'] = "udhaar_id"; // On which column
            $_SESSION['deleteColumnId'] = "udhaar_id";
            $_SESSION['deleteColumnValue'] = "udhaar_id";
            $_SESSION['deleteColumnFunction'] = "deleteCustUdhaarDetailsFromUdhaarPanel";
            $_SESSION['deleteColumnFunctionPara1'] = "";
            $_SESSION['deleteColumnFunctionPara2'] = "udhaar_id";
            $_SESSION['deleteColumnFunctionPara3'] = "DeleteFromUdhaarAllDetails";
            $_SESSION['deleteColumnFunctionPara4'] = "";
            $_SESSION['deleteColumnFunctionPara5'] = "CONCAT(udhaar_pre_invoice_no,udhaar_invoice_no)";
            $_SESSION['deleteColumnFunctionPara6'] = "";
            $_SESSION['deleteColumnFunctionPara7'] = "udhaar_total_amt";
            //
            // Data Table Main File
            include 'omdatatables.php';
            ?>
        </div>
    </div>  
    <?php } else { ?>
    <div id="girviPanelTrId"></div>
    <div id="allUdhaarListDiv">
        <div id="udhharListDiv">
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="left" colspan="14">
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">
                            <tr>
                                <td valign="middle" align="left">
                                    <div class="main_link_orange">UDHAAR ACTIVE LIST
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
            //
            // **********************************************************************************
            // START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
            // **********************************************************************************
            //
            $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
            $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
            $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
            $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
            //
            if ($nepaliDateIndicator == 'YES') {
                $utin_date_col = "STR_TO_DATE(u.utin_other_lang_date,'%d-%m-%Y')";
            } else {
                $utin_date_col = "STR_TO_DATE(u.utin_date,'%d %b %Y')";
            }
            //
            // ********************************************************************************
            // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
            // ********************************************************************************
            //
            // 
            // Start Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
            //
            /********** Start Code To GET Firm Details ********* */
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
            //
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
            /********** End Code To GET Firm Details ********* */
            // 
            // Data Table Main Columns
            include 'omdatatablesUnset.php';
            //
            // 
            // START TO ADD CODE FOR SON OF COLUMN @AUTHOR:SHRI20AUG19
            $dataTableColumnsFields = array(
                array('dt' => 'S.No.'),
                array('dt' => 'DATE'),
                array('dt' => 'FIRM'), //ADDED FIRM NAME @AUTHOR SIMRAN:12DEC2022
                array('dt' => 'MAIN INV NO'), //ADD MAIN INV NO @AUTHOR GANGADHAR-2022
                array('dt' => 'USER TYPE'),
                array('dt' => 'CUST. NAME'),
                array('dt' => 'MOB NO.'),
                array('dt' => 'VILLAGE'),         // ADDED USER VILLAGE@SIMRAN:07OCT2023
                array('dt' => 'CITY'),
                array('dt' => 'UDH. TYPE'),
                array('dt' => 'Trans Type'),
                array('dt' => 'UDH. AMT'),
                array('dt' => 'CASH'), //ADD CASH AMT @AUTHOR VINOD-07FEB2023
                array('dt' => 'BANK'), //ADD BANK AMT @AUTHOR VINOD-07FEB2023
                array('dt' => 'CHEQUE'), //ADD CHEQUE AMT @AUTHOR VINOD-07FEB2023
                array('dt' => 'ONLINE'), //ADD ONLINE AMT @AUTHOR VINOD-07FEB2023
                array('dt' => 'DEP. AMT'),
                array('dt' => 'LFT. AMT'),
                array('dt' => 'GOLD (GM)'),
                array('dt' => 'SILVER (GM)'),
                array('dt' => 'CRYSTAL (GM)'),
                array('dt' => 'S/C/W NAME'),
                array('dt' => 'OTHER INFO'), //ADD OTHER INFO @AUTHOR SIMRAN-27APR2022 
                array('dt' => 'PAY OTHER INFO'), //ADD PAYMENT OTHER INFO @AUTHOR SIMRAN-28APR2023
                array('dt' => 'INV TYPE'), //ADD INV TYPE @AUTHOR SIMRAN-13DEC2022
                array('dt' => 'STAFF')
            );
            //
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            // 
            // Table Parameters
            $_SESSION['tableName'] = "user_transaction_invoice as u"; // Table Name
            $_SESSION['tableNamePK'] = 'u.utin_id'; // Primary Key
            // 
            // DB Table Columns Parameters 
            if ($_SESSION['sessionIgenType'] == $globalOwnPass){
            $dbColumnsArray = array(
                "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)",
                "$utin_date_col",
                "f.firm_name",
                "IF(ut.utin_transaction_type IN('ESTIMATESELL'),' ',CONCAT(ut.utin_pre_invoice_no,' ',ut.utin_invoice_no))",
                "t.user_type",
                "if(t.user_lname!='',concat(t.user_fname,' ',SUBSTRING(t.user_father_name, 2),' ',t.user_lname),t.user_fname)", // Added Father Name @AUTHOR Prathamesh:06OCT2023
                "t.user_mobile",
                "t.user_village",
                "t.user_city",
                "IF(u.utin_type IN ('MONEY'),UPPER('UDHAAR'),UPPER(u.utin_type))",
                "IF(u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT'),UPPER('UDHAAR'),UPPER(u.utin_transaction_type))",
                "IF(c.utin_total_amt>0,abs(CAST(c.utin_total_amt AS DECIMAL(10,2))),0.00)",
                "u.utin_cash_amt_rec",
                "u.utin_pay_card_amt",
                "u.utin_pay_cheque_amt",
                "u.utin_online_pay_amt",
                "IF((c.utin_total_amt_deposit='' || c.utin_total_amt_deposit IS NULL) ,0.00,CAST(c.utin_total_amt_deposit AS DECIMAL(10,2)))",
                "IF(c.utin_cash_balance>0,CAST(abs(c.utin_cash_balance) AS DECIMAL(10,2)),0.00)",
                "IF(g.utin_gd_due_wt>0,CAST(abs(g.utin_gd_due_wt) AS DECIMAL(10,2)),0.00)",
                "IF(s.utin_sl_due_wt>0,CAST(abs(s.utin_sl_due_wt) AS DECIMAL(10,2)),0.00)",
                "IF(s.utin_st_due_wt>0,CAST(abs(s.utin_st_due_wt) AS DECIMAL(10,2)),0.00)",
                "SUBSTRING(t.user_father_name, 2)",
                "u.utin_other_info",
                "u.utin_paym_oth_info",
                "u.utin_type",
                "su.user_login_id"
            );
            }else{
                $dbColumnsArray = array(
                "CONCAT(u.utin_pre_invoice_no,' ',u.utin_invoice_no)",
                "$utin_date_col",
                "f.firm_name",
                "CONCAT(ut.utin_pre_invoice_no,' ',ut.utin_invoice_no)",
                "t.user_type",
                "concat(t.user_fname,' ',SUBSTRING(t.user_father_name, 2),' ',t.user_lname)", // Added Father Name @AUTHOR Prathamesh:06OCT2023
                "t.user_mobile",
                "t.user_village",
                "t.user_city",
                "IF(u.utin_type IN ('MONEY'),UPPER('UDHAAR'),UPPER(u.utin_type))",
                "IF(u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT'),UPPER('UDHAAR'),UPPER(u.utin_transaction_type))",
                "IF(c.utin_total_amt>0,abs(CAST(c.utin_total_amt AS DECIMAL(10,2))),0.00)",
                "u.utin_cash_amt_rec",
                "u.utin_pay_card_amt",
                "u.utin_pay_cheque_amt",
                "u.utin_online_pay_amt",
                "IF((c.utin_total_amt_deposit='' || c.utin_total_amt_deposit IS NULL) ,0.00,CAST(c.utin_total_amt_deposit AS DECIMAL(10,2)))",
                "IF(c.utin_cash_balance>0,CAST(abs(c.utin_cash_balance) AS DECIMAL(10,2)),0.00)",
                "IF(g.utin_gd_due_wt>0,CAST(abs(g.utin_gd_due_wt) AS DECIMAL(10,2)),0.00)",
                "IF(s.utin_sl_due_wt>0,CAST(abs(s.utin_sl_due_wt) AS DECIMAL(10,2)),0.00)",
                "IF(s.utin_st_due_wt>0,CAST(abs(s.utin_st_due_wt) AS DECIMAL(10,2)),0.00)",
                "SUBSTRING(t.user_father_name, 2)",
                "u.utin_other_info",
                "u.utin_paym_oth_info",
                "u.utin_type",
                "su.user_login_id"
            );
            }
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            $_SESSION['dtSumColumn'] = '9,10,11,12,13,14,15,16,17,18';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtSortColumn'] = '1,0';
            // Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "u.utin_id,u.utin_user_id as 'u.utin_user_id',ut.utin_pre_invoice_no,ut.utin_invoice_no,ut.utin_user_id,ut.utin_type,ut.utin_date,ut.utin_firm_id,ut.utin_id,";
            //
            //END TO ADD CODE FOR SON OF COLUMN @AUTHOR:SHRI20AUG19
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
            // popup  Function Parameters     //FOR ADD MAIN INV NO @AUTHOR GANGADHAR-2022
            $_SESSION['popupFunctionLink'] = "ogspinvo.php";
            if ($_SESSION['sessionIgenType'] == $globalOwnPass){
            $_SESSION['popupColumn'] = "IF(ut.utin_transaction_type IN('ESTIMATESELL'),' ',CONCAT(ut.utin_pre_invoice_no,' ',ut.utin_invoice_no))";
            }else{
                $_SESSION['popupColumn'] = "CONCAT(ut.utin_pre_invoice_no,' ',ut.utin_invoice_no)";
            }
            $_SESSION['popupFunctionWidth'] = "850";
            $_SESSION['popupFunctionHeight'] = "850";
             $_SESSION['popupFunctionPara1'] = "ut.utin_user_id"; // Panel Name
             $_SESSION['popupFunctionPara2'] = "ut.utin_pre_invoice_no";
             $_SESSION['popupFunctionPara3'] = "ut.utin_invoice_no";
            $_SESSION['popupFunctionPara4'] = "ut.utin_type";
            $_SESSION['popupFunctionPara5'] = "ut.utin_date";
            $_SESSION['popupFunctionPara6'] = "$invLay&labelType=SellPurchase";
            $_SESSION['popupFunctionPara7'] = "ut.utin_id";
            $_SESSION['popupFunctionPara8'] = "ut.utin_firm_id";
            
             
            // $_SESSION['popupFunctionPara6'] = "$invLay&labelType=estimateSell&customizationOption=$metalValOp";
            // 
            // Extra direct columns we need pass in SQL Query
                  $_SESSION['tableWhere'] = "u.utin_firm_id IN ($strFrmId) and "
                    . "(((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT')))"
                    . " OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) and (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0)))"
                    . "and (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') "
                    . "and (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked')))";
            // 
            // Table Joins
            //
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id "
                    . "LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
                    . "LEFT JOIN user AS su ON u.utin_staff_id=su.user_id "
                    . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                    . "LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) "
                    . "LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) "
                    . "LEFT JOIN user_transaction_invoice AS ut ON u.utin_utin_id= ut.utin_id ";
            // Data Table Main File
            include 'omdatatables.php';
            // END Code to add Datatable Implementation @AUTHOR:PRIYANKA-23JUNE17
            ?>
        </div>
    <?php } ?>