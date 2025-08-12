<?php
/*
 * **************************************************************************************
 * @tutorial: STAFF SELL REPORT BY PRODUCT AT STAFF HOME@AUTHOR:MADHUREE-02MAR2020
 * **************************************************************************************
 * 
 * Created on MAR 02, 2020 01:20:58 PM
 *
 * @FileName: omstaffsellreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:10 JAN 17
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
<?php
$staffId = $_REQUEST['staffId'];
$reportType = $_REQUEST['reportType'];
$staffCommission = $_REQUEST['staffCommission'];
//echo '$staffCommission : ' . $staffCommission . '<br>';
//die();
if ($staffCommission != '') {
    $updateStaffCommition = "UPDATE user SET user_commission='$staffCommission' WHERE user_id='$staffId' AND user_type='STAFF'";
    //echo '$updateStaffCommition : ' . $updateStaffCommition . '<br>';
    if (!mysqli_query($conn, $updateStaffCommition)) {
        die('Error: ' . mysqli_error($conn));
    }
}
$StartDate = date("Y-m-01");
$EndDate = date("Y-m-t");
parse_str(getTableValues("SELECT user_commission FROM user WHERE user_id='$staffId'"));
?> 
<div id="SellDetails">
    <div id="sellReportSubDiv">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px;">
            <td align="left"  width="50%" style="color: red;margin-left: 15px;font-size: 15px;">
                <select class="" style="color: red;font-size: 15px;border-color: white;font-weight: bold;" onchange="getStaffSellReportDetails('<?php echo $staffId; ?>', this.value);">
                    <option value="MONTHLY_REPORT" class="" style="color: red;font-size: 15px;border-color: white;font-weight: bold;">  
                        MONTHLY SELL REPORT 
                    </option>
                    <option value="COMPLETE_REPORT" class="" style="color: red;font-size: 15px;border-color: white;font-weight: bold;" <?php if ($reportType == 'COMPLETE_REPORT') { ?>selected <?php } ?>>  
                        COMPLETE SELL REPORT 
                    </option>
                </select>
            </td>
            <td valign="bottom" align="right" valign="Middle" width="50%">
                <table  width="100%" align="right" style="margin-bottom: 5px;">
                    <tr>
                        <td></td>
                        <td class="noPrint" valign="middle" width="50%" align="right" >
                            <input id="enterCommition" name="enterCommition" class="border-no " placeholder="Enter Staff Commition" onkeydown="if (event.keyCode == 13) {
                                        document.getElementById('submitButt').focus;
                                    }" type="text" value="<?php echo $user_commission; ?>" style="width: 100%;height:36px;border: 1px solid #c1c1c1;font-size: 24px;font-weight: 600;box-shadow: 0 1px 3px rgba(0,0,0,0.2);">
                        </td>
                        <td width="20%" align="left">
                            <button type="submit" id="submitButt" name="submitButt" value="UPDATE" onclick="setStaffCommition('<?php echo $staffId; ?>');" class="btn om_btn_style_nav" style="margin-left:5px;">
                                UPDATE   </button>
                        </td>
                    </tr>
                </table>
            </td>
<!--            <tr>
                <td align="center" colspan="7" class="paddingTop4 padBott4">
                    <div class="hrGrey" style="width: 1080px;"></div>
                </td>
            </tr>-->
        </table>
        <div id="sellDetailsSubDiv">
            <?php
            if (isset($_GET['selFirmId'])) {
                $selFirmId = $_GET['selFirmId'];
            } else {

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
            //Data Table Main Columns
            include 'omdatatablesUnset.php';
//
//            mysqli_query($conn, "set @num:=0");
            $dataTableColumnsFields = array(
                array('dt' => 'S.NO.'),
                array('dt' => 'INV'),
                array('dt' => 'NO'),
                array('dt' => 'DATE'),
                array('dt' => 'FIRM'),
                array('dt' => 'STAFF'),
                array('dt' => 'PRODUCT'),
                array('dt' => 'CUSTOMER NAME'),
                array('dt' => 'CGST'),
                array('dt' => 'SGST'),
                array('dt' => 'IGST'),
                array('dt' => 'TOTAL AMT'),
                array('dt' => 'COMMISSION'),
                array('dt' => 'CITY'),
                array('dt' => 'STATE'),
            );
            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dataTableColumnsFields, 8, 2);
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
            $_SESSION['tableName'] = 'stock_transaction'; // Table Name
            $_SESSION['tableNamePK'] = 'sttr_invoice_no'; // Primary Key
// DB Table Columns Parameters 
            $dbColumnsArray = array(
                "@sno:=@sno+1",
                "sttr_pre_invoice_no",
                "CAST(sttr_invoice_no AS UNSIGNED)",
                "STR_TO_DATE(sttr_add_date ,'%d %b %Y')",
                "f.firm_name",
                "CONCAT(COALESCE(b.user_fname, ''), ' ', COALESCE(b.user_lname, ''))",
                "sttr_item_name",
                "CONCAT(u.user_fname, ' ', u.user_lname)",
                "ROUND(sttr_tot_price_cgst_chrg + sttr_mkg_cgst_chrg)",
                "ROUND(sttr_tot_price_sgst_chrg + sttr_mkg_sgst_chrg)",
                "ROUND(sttr_tot_price_igst_chrg)",
                "sttr_final_valuation",
                "(sttr_final_valuation * b.user_commission)/100",
                "u.user_city",
                "u.user_state",
            );
            if ($_SESSION['sessionProdName'] == 'OMRETL')
                array_splice($dbColumnsArray, 8, 2);
//    print_r($dbColumnsArray);
//   echo count($dbColumnsArray)."=".count($dataTableColumnsFields);die;
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change

            if ($_SESSION['sessionProdName'] == 'OMRETL') {
                $_SESSION['dtSumColumn'] = '9,10,11,12';
            } else {
                $_SESSION['dtSumColumn'] = '9,10,11,12';
            }
            $_SESSION['dtSortColumn'] = '2,1';
            $_SESSION['dtDeleteColumn'] = '';
            $_SESSION['dtASCDESC'] = 'desc,desc';

// Extra direct columns we need pass in SQL Query
            $_SESSION['sqlQueryColumns'] = "sttr_id, sttr_user_id, sttr_pre_invoice_no, sttr_invoice_no,";
//
////start code to include all session@auth:ATHU29may17
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
            //echo '$reportType : ' . $reportType . '<br>';
            if ($reportType == 'COMPLETE_REPORT') {
                $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_status NOT IN('Deleted') and sttr_transaction_type IN('sell','ESTIMATESELL') and sttr_indicator NOT IN ('stockCrystal','PURCHASE') and sttr_staff_id='$staffId'";
            } else {
                $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_status NOT IN('Deleted') and sttr_transaction_type IN('sell','ESTIMATESELL') and sttr_indicator NOT IN ('stockCrystal','PURCHASE') and sttr_staff_id='$staffId'";
            }
//            echo '$_SESSION[tableWhere] : ' . $_SESSION['tableWhere'] . '<br>';
// Table Joins
            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id=f.firm_id"
                    . " LEFT JOIN user AS u ON sttr_user_id = u.user_id"
                    . " LEFT JOIN user AS b ON sttr_staff_id = b.user_id";
//            echo ' $_SESSION[tableJoin]=='. $_SESSION['tableJoin'];
// Data Table Main File
            include 'omdatatables.php';
            ?>
        </div>
    </div>
</div>