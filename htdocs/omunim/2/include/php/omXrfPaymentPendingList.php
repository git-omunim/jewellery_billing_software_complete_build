<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 30 Jul, 2018 11:00:57 PM
 *
 * @FileName: omXrfPaymentPendingList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
// *****************************************************************************************************************************************
// START CODE FOR GLOBAL FILES @PRIYANKA-09MAY18
// ******************************************************************************************/**********************************************
// MANDATORY FILES
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
//
// STAFF ACCESS FILE
$staffId = $_SESSION['sessionStaffId'];
//
if (isset($_GET['custId']))
    $custId = $_GET['custId'];
//
// CURRENT DATE
$currentDate = date("d-m-Y");
//
if ($panelName == '')
    $panelName = $_GET['panelName'];
//
if ($panelName == 'updatePayXRFEntries')
    $upPanelName = 'updatePayXRFEntries';
else 
    $upPanelName = 'updateXRFEntries';
//
// echo '$panelName == '.$panelName;
// ******************************************************************************************************************************************
// END CODE FOR GLOBAL FILES @PRIYANKA-09MAY18
// ******************************************************************************************************************************************
?>
<input type="hidden" id="documentRoot" name="documentRoot" value="<?php echo $documentRootBSlash; ?>" />
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
/* * ****** End Code To GET Firm Details ********* */

include 'omdatatablesUnset.php';

$dataTableColumnsFields = array(
    array('dt' => 'BILL NO'),
    array('dt' => 'FIRM'),
    array('dt' => 'DATE'),
    array('dt' => 'TRANSACTION'),
    array('dt' => 'PROD TYPE'),
    array('dt' => 'WEIGHT'),
    array('dt' => 'KARAT'),
    array('dt' => 'GOLD'),
    array('dt' => 'SILVER'),
    array('dt' => 'COPPER'),
    array('dt' => 'STATUS'),
    array('dt' => 'DEL'));

$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
// Table Parameters
$_SESSION['tableName'] = 'xrf_entries'; // Table Name
$_SESSION['tableNamePK'] = 'xrf_id'; // Primary Key
// DB Table Columns Parameters 

$dbColumnsArray = array(
    "CONCAT(COALESCE(xrf_pre_bill_no, ''),COALESCE(xrf_bill_no, ''))",
    "f.firm_name",
    "xrf_add_date",
    "xrf_transaction_type",
    "xrf_prod_name",
    "xrf_prod_gs_weight",
    "xrf_karat",
    "xrf_Gold",
    "xrf_Silver",
    "xrf_Copper",
    "xrf_status",
    "xrf_id");

$_SESSION['dbColumnsArray'] = $dbColumnsArray;

$_SESSION['dtSumColumn'] = '';
$_SESSION['dtDeleteColumn'] = '10';

// Extra direct columns we need pass in SQL Query

$_SESSION['sqlQueryColumns'] = "xrf_id,xrf_user_id,xrf_pre_invoice_no,xrf_invoice_no, ";

//start code to include all session
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';

// On Click Function Parameters

$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "CONCAT(COALESCE(xrf_pre_bill_no, ''),COALESCE(xrf_bill_no, ''))"; // On which column
$_SESSION['onclickColumnId'] = "xrf_id";
$_SESSION['onclickColumnValue'] = "xrf_id";
$_SESSION['onclickColumnFunction'] = "updateXRFEntries";
$_SESSION['onclickColumnFunctionPara1'] = "xrf_id";
$_SESSION['onclickColumnFunctionPara2'] = "xrf_user_id";
$_SESSION['onclickColumnFunctionPara3'] = "$upPanelName";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "xrf_pre_invoice_no";
$_SESSION['onclickColumnFunctionPara6'] = "xrf_invoice_no";

// On Print Function Parameters

$_SESSION['onprintColumnImage'] = "";
$_SESSION['onprintColumn'] = ""; // On which column
$_SESSION['onprintColumnId'] = "";
$_SESSION['onprintColumnValue'] = "";
$_SESSION['onprintColumnFunction'] = "";
$_SESSION['onprintColumnFunctionPara1'] = "";
$_SESSION['onprintColumnFunctionPara2'] = "";
$_SESSION['onprintColumnFunctionPara3'] = "";
$_SESSION['onprintColumnFunctionPara4'] = "";
$_SESSION['onprintColumnFunctionPara5'] = "";
$_SESSION['onprintColumnFunctionPara6'] = "";

// Delete Function Parameters

$_SESSION['deleteColumn'] = "xrf_id"; // On which column
$_SESSION['deleteColumnId'] = "xrf_id";
$_SESSION['deleteColumnValue'] = "xrf_id";
$_SESSION['deleteColumnFunction'] = "deleteXRFEntries";
$_SESSION['deleteColumnFunctionPara1'] = "deleteXRFEntries";
$_SESSION['deleteColumnFunctionPara2'] = "xrf_id";
$_SESSION['deleteColumnFunctionPara3'] = "xrf_user_id";
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";

if ($panelName == 'updatePayXRFEntries') {
    $_SESSION['tableWhere'] = "xrf_firm_id IN ($strFrmId) AND xrf_status IN ('PaymentDone') AND xrf_pre_invoice_no = '$utin_pre_invoice_no' "
                            . "AND xrf_invoice_no = '$utin_invoice_no' AND xrf_user_id = '$custId' ";
} else {
    $_SESSION['tableWhere'] = "xrf_firm_id IN ($strFrmId) AND xrf_status = 'PaymentPending' AND xrf_user_id = '$custId' ";
}

// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON xrf_firm_id = f.firm_id";

// Data Table Main FiINNERle
include 'omdatatables.php';
?>