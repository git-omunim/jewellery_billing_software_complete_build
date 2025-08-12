<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display Active Girvi List in Girvi Panel.
 * **************************************************************************************
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omttlisd.php
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
//$accFileName = $currentFileName;
//include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

$selexpenseInvoice = "SELECT omly_value FROM omlayout WHERE omly_option = 'expenseInvLay'";
$resexpenseInvoice = mysqli_query($conn, $selexpenseInvoice);
$rowexpenseInvoice = mysqli_fetch_array($resexpenseInvoice);
$expenseInvoice = $rowexpenseInvoice['omly_value'];
if ($expenseInvoice == 'expenseInvLayA4' || $expenseInvoice == '') {
    $width = '810';
}
if ($expenseInvoice == 'expenseInvLayA5') {
    $width = '580';
}
if ($expenseInvoice == 'expenseInvLayA6') {
    $width = '420';
}
if ($expenseInvoice == 'expenseInvLay80mm') {
    $width = '320';
}
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td valign="middle" align="left" width="18px">
            <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/transactions16.png" alt="" /></div>
        </td>
        <td valign="middle" align="left">
            <div class="main_link_orange16">Transaction List<span class="textLabel14CalibriGreyMiddle">
                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                </span>
            </div>
        </td>
    </tr>
</table>
<?php
/* * *********** Start Code To GET Firm Details ********* */
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
//
if ($custId != '') {
    $user_type = '';
    parse_str(getTableValues("SELECT user_type FROM user WHERE user_id='$custId'"));
}
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
    $trans_date_col = "STR_TO_DATE(transaction_other_lang_DOB,'%d-%m-%Y')";
} else {
    $trans_date_col = "STR_TO_DATE(transaction_DOB,'%d %b %Y')";
}
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
if (($custId != '' && $custId != NULL) && ($user_type == 'SUPPLIER')) {
    $dataTableColumnsFields = array(
        array('dt' => 'V.SR.'),
        array('dt' => 'V.NO.'),
        array('dt' => 'SUPPLIER V.NO.'),
        array('dt' => 'DATE'),
        array('dt' => 'CUST NAME'),
        array('dt' => 'AMOUNT'),
        array('dt' => 'SUBJECT'),
        array('dt' => 'TYPE'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'FIRM')
    );
} else {
    $dataTableColumnsFields = array(
        array('dt' => 'V.SR.'),
        array('dt' => 'V.NO.'),
        array('dt' => 'DATE'),
        array('dt' => 'CUST NAME'),
        array('dt' => 'AMOUNT'),
        array('dt' => 'SUBJECT'),
        array('dt' => 'TYPE'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'FIRM')
    );
}
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'transaction'; // Table Name
$_SESSION['tableNamePK'] = 'transaction_id'; // Primary Key
// DB Table Columns Parameters 
if (($custId != '' && $custId != NULL) && ($user_type == 'SUPPLIER')) {
    $dbColumnsArray = array(
        "transaction_pre_vch_id",
        "CAST(transaction_post_vch_id AS UNSIGNED)",
        "transaction_supp_vch_id",
        "$trans_date_col",
        "CONCAT(u.user_fname,' ',u.user_lname)",
        "transaction_amt",
        "transaction_sub",
        "transaction_type",
        "transaction_cat",
        "f.firm_name"
    );
} else {
    $dbColumnsArray = array(
        "transaction_pre_vch_id",
        "CAST(transaction_post_vch_id AS UNSIGNED)",
        "$trans_date_col",
        "CONCAT(u.user_fname,' ',u.user_lname)",
//        "transaction_amt",
        "transaction_amt",
        "transaction_sub",
        "transaction_type",
        "transaction_cat",
        "f.firm_name"
    );
}
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
if (($custId != '' && $custId != NULL) && ($user_type == 'SUPPLIER')) {
    $_SESSION['dtSumColumn'] = '4';
    $_SESSION['dtSortColumn'] = '3,1';
} else {
    $_SESSION['dtSumColumn'] = '4';
    $_SESSION['dtSortColumn'] = '2,1';
}
$_SESSION['dtDeleteColumn'] = '';

$_SESSION['dtASCDESC'] = 'desc,desc';
// file
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "transaction_id,transaction_pre_vch_id,transaction_firm_id,transaction_post_vch_id,transaction_panel,";
////start code to include all session@auth:ATHU29may17
//
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "CAST(transaction_post_vch_id AS UNSIGNED)"; // On which column
$_SESSION['onclickColumnId'] = "transaction_id";
$_SESSION['onclickColumnValue'] = "transaction_id";
$_SESSION['onclickColumnFunction'] = "showTransactionDetailsNew";
$_SESSION['onclickColumnFunctionPara1'] = "transaction_id";
$_SESSION['onclickColumnFunctionPara2'] = "transaction_pre_vch_id";
if ($custId != '') {
    $_SESSION['onclickColumnFunctionPara3'] = "updateWithUserId";
} else {
    $_SESSION['onclickColumnFunctionPara3'] = "";
}
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "transaction_firm_id";
$_SESSION['onclickColumnFunctionPara6'] = "transaction_post_vch_id";
$_SESSION['onclickColumnFunctionPara7'] = "transaction_panel";

//
// Delete Function Parameters
$_SESSION['deleteColumn'] = ""; // On which column
$_SESSION['deleteColumnId'] = "";
$_SESSION['deleteColumnValue'] = "";
$_SESSION['deleteColumnFunction'] = "";
$_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "";
$_SESSION['deleteColumnFunctionPara3'] = "";  //stsl_itst_id
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
//
$_SESSION['popupFunctionLink'] = "omtransinv.php";
$_SESSION['popupColumn'] = "$trans_date_col";
$_SESSION['popupFunctionWidth'] = "$width";
$_SESSION['popupFunctionHeight'] = "800";
$_SESSION['popupFunctionPara1'] = "transaction_user_id"; // Panel Name
$_SESSION['popupFunctionPara2'] = "transaction_pre_vch_id";
$_SESSION['popupFunctionPara3'] = "transaction_post_vch_id";
$_SESSION['popupFunctionPara4'] = "";
$_SESSION['popupFunctionPara5'] = "";
$_SESSION['popupFunctionPara6'] = "$expenseInvoice";
// 
// Where Clause Condition 
if ($custId != '') {
    $_SESSION['tableWhere'] = "transaction_upd_sts IN ('New','Updated') and transaction_user_id='$custId' and transaction_trans_id IS NULL and transaction_firm_id IN ($strFrmId) ";
} else {
    $_SESSION['tableWhere'] = "transaction_upd_sts IN ('New','Updated') and transaction_trans_id IS NULL and transaction_firm_id IN ($strFrmId) ";
}
// 
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON transaction_firm_id=f.firm_id "
        . "LEFT JOIN user AS u ON transaction_user_id=u.user_id";
// 
// Data Table Main File
include 'omdatatables.php';
?>