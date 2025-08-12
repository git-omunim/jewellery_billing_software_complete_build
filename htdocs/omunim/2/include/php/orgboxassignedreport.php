<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgboxassignedreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<div id="girviActiveLoansListPanelNewDiv"></div>
<div id="girviPanelTrId"></div>
<div id="display_girvi_barcode_slip" 
     style="position: fixed;
     left: 70%;
     top: 50%;
     transform: translateX(-50%);
     background-color: white;
     text-align: left;
     border: 0px solid #000000;
     z-index: 99999;">
</div>
<!--start code for implemting active loanlist @ATHU3MAY17-->
<table border="0" cellspacing="0" cellpadding="5" align="center" width="100%"><!------noPrint removed @Author:PRIYA29MAY14----------->
    <tr>
        <td valign="middle" align="left" width="18px">
            <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/active.png" alt=""  onLoad="setScrollIdFun('girviPanelTrId')"/></div>
        </td>
        <td valign="middle" align="left">
            <div class="main_link_green"><b>LOAN PACKET BOX ASSIGNED REPORT</b></div><!--Change @AUTHOR: SANDY29DEC13---->
        </td>
        <td valign="middle" align="right">
            <div class="main_link_green">
                <?php
                $inputId = "getLoanBoxPanel";
                $inputType = 'submit';
                $inputFieldValue = '';
                $inputIdButton = "getLoanBoxPanel";
                $inputNameButton = 'getLoanBoxPanel';
                $inputTitle = '';

                $inputFieldClass = 'btn ' . $om_btn_style_nav;
                $inputStyle = " ";
                $inputLabel = 'BACK';

                $inputIconClass = '';
                $inputPlaceHolder = '';
                $spanPlaceHolderClass = '';
                $spanPlaceHolder = '';
                $inputOnChange = "";
                $inputOnClickFun = 'javascript:showAssignloanpackets();';
                $inputKeyUpFun = '';
                $inputDropDownCls = '';
                $inputselDropDownCls = '';
                $inputMainClassButton = '';

                // Include form input field file (no changes here)
                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                ?> 
            </div>
        </td>
    </tr>
</table>
<?php
//Start Staff loan panel Tag Print column access 
$staffTagPrintColAcc = "select acc_access from access where acc_emp_id = '$staffId' and acc_check_id='loanPanelTagPrintAccess' and acc_name='Tag Print'";
$resTagPrintColAcc = mysqli_query($conn, $staffTagPrintColAcc);
$rowTagPrintColAcc = mysqli_fetch_array($resTagPrintColAcc);
$getStaffTagPrintColAcc = $rowTagPrintColAcc['acc_access'];
/* * *********** Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $INT = 'girv_pl_total_final_intrest';
    $AMT = 'girv_pl_total_amt';
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    $INT = 'girv_pl_total_final_iintrest';
    $AMT = 'girv_pl_total_iamt';
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
/* * *********** End Code To GET Firm Details ********* */
$noOfMonths = $_POST['expMonths'];
if ($noOfMonths == '') {
    $noOfMonths = $_GET['expMonths'];
}
if ($noOfMonths == '') {
    $noOfMonths = 11;
}
include 'omdatatablesUnset.php';
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:SIMRAN:10MAR2023
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $loan_date_col = "STR_TO_DATE(girv_other_lang_DOB,'%d-%m-%Y')";
} else {
    $loan_date_col = "STR_TO_DATE(girv_new_DOB,'%d %b %Y')";
}
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:SIMRAN:10MAR2023
// ********************************************************************************
//
//Data Table Main Columns
$dataTableColumnsFields = array(
    array('dt' => 'S.NO.'),
    array('dt' => 'S.DATE'),
     array('dt' => 'O.DATE'),
    array('dt' => 'PRIN.AMT'),
    array('dt' => 'CUST NAME'),
    array('dt' => 'S/O D/O C/O'),
    array('dt' => 'MOB NO'),
    array('dt' => 'CITY'),
    array('dt' => 'FIRM'),
    array('dt' => 'ALL LOAN'),
    array('dt' => 'PKT BOX NAME'),
    array('dt' => 'PKT WT'),
    array('dt' => 'POUCH NO'),
    array('dt' => 'OTH INFO'), //OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
    array('dt' => 'PRINT')
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'girvi'; // Table Name
$_SESSION['tableNamePK'] = 'girv_id'; // Primary Key
// DB Table Columns Parameters 
$dbColumnsArray = array(
    "CONCAT(girv_pre_serial_num, CONVERT(girv_serial_num, CHAR(12)))",
    "$loan_date_col",
        "DATE_FORMAT(STR_TO_DATE(girvi.girv_DOB, '%d %b %Y'), '%Y-%m-%d')",
    "girv_main_prin_amt",
    "CONCAT(girv_cust_fname, ' ', girv_cust_lname)",
    "SUBSTR(user_father_name,2)",
//    "user_father_name",
    "t.user_mobile",
    "girv_cust_city",
    "f.firm_name",
    "girv_type",
    "girv_loan_box_name",
    "girv_loan_packet_wt",
    "girv_box_pouch_no",
    "girv_box_other_info", //OTHER INFORMATION COLUMN ADDED @AUTHOR:MADHUREE-24JULY2020
    "girv_id"
);
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
if ($staffId != '') {
    $_SESSION['dtSumColumn'] = '';
} else {
    $_SESSION['dtSumColumn'] = '2,4,5,10';
}
$_SESSION['dtDeleteColumn'] = '';
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "girv_id, girv_cust_id,girv_transfer_ml_id,";
////start code to include all session@auth:ATHU29may17
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "CONCAT(girv_pre_serial_num, CONVERT(girv_serial_num, CHAR(12)))"; // On which column
$_SESSION['onclickColumnId'] = "girv_id";
$_SESSION['onclickColumnValue'] = "girv_id";
$_SESSION['onclickColumnFunction'] = "getGirviInfoPopUp";
$_SESSION['onclickColumnFunctionPara1'] = "girv_cust_id";
$_SESSION['onclickColumnFunctionPara2'] = "girv_id";
$_SESSION['onclickColumnFunctionPara3'] = "";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";
// On Click Function Parameters
// Delete Function Parameters
if ($getStaffTagPrintColAcc == 'true' || ($getStaffTagPrintColAcc == '' && $staffId == '')) {
    $_SESSION['onclickColumnImage'] = "printer16.png";
    $_SESSION['onclickColumn'] = "girv_id"; // On which column
    $_SESSION['onclickColumnId'] = "girv_id";
    $_SESSION['onclickColumnValue'] = "girv_id";
    $_SESSION['onclickColumnFunction'] = "getGirviBarCodeSlip";
    $_SESSION['onclickColumnFunctionPara1'] = "girv_cust_id";
    $_SESSION['onclickColumnFunctionPara2'] = "girv_id";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
} else {
    $_SESSION['onclickColumnImage'] = "printer16.png";
    $_SESSION['onclickColumn'] = "girv_id"; // On which column
    $_SESSION['onclickColumnId'] = "girv_id";
    $_SESSION['onclickColumnValue'] = "girv_id";
    $_SESSION['onclickColumnFunction'] = "";
    $_SESSION['onclickColumnFunctionPara1'] = "";
    $_SESSION['onclickColumnFunctionPara2'] = "";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
}
//
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
$_SESSION['tableWhere'] = "girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) and girv_loan_box_name NOT IN ('') and girv_loan_packet_wt NOT IN ('')";
// girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId)
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON girv_firm_id=f.firm_id "
        . "LEFT JOIN user AS t ON user_id=girv_cust_id";
// 
// Data Table Main File
include 'omdatatables.php';
?>