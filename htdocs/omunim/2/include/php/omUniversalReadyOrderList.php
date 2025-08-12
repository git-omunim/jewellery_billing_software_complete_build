<?php
/*
 * ***************************************************************************************
 * @tutorial: UNIVERSAL PENDING ORDER LIST @PRIYANKA-06DEC2018
 * **************************************************************************************
 * Created on 06 DEC, 2018 18:16:20 PM
 *
 * @FileName: omUniversalReadyOrderList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 2.6.94
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
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

if ($nepaliDateIndicator == 'YES') {
    $stock_date_col = "sttr_other_lang_add_date";
} else {
    $stock_date_col = "sttr_add_date";
}
?>
<div id="universalAssignOrderDiv">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td valign="middle" align="left" width="18px">
                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/newOrder32.png" alt="NEW ORDER" /></div>
            </td>
            <td valign="middle" align="left" width="50%">
                <div class="main_link_orange16" style="color:#000080 !important;">READY ORDER LIST<span class="textLabel14CalibriGreyMiddle">
                        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                    </span>
                </div>
            </td>
            
            <td valign="middle" align="right" width="15%">
                <div id="newOrderListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR NEW ORDER LIST @PRIYANKA-06AUG2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    $orderPanelName = 'universalNewOrderPanel';
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'newOrderListButt';
                    $inputNameButton = 'newOrderListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn1 btn1Hover';
                    //
                    $inputStyle = 'padding:3px 10px;width:140px;font-weight:bold;font-size:15px;'
                                . 'margin-bottom:5px;margin-top:5px;border-radius:5px!important;'
                                . 'text-align:center;color:#AA6600;background-color: #FFC469;margin-right: 5px;';
                    //
                    $inputLabel = 'NEW ORDER LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'NEW ORDER LIST';
                    //
                    // Place Holder in span outside input box
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    // 
                    // Event Options
                    //
                    // On Change Function
                    $inputOnChange = "";
                    $inputKeyUpFun = '';
                    //
                    //
                    $inputOnClickFun = 'universalOrderListFunc("' . $orderPanelName . '");';
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR NEW ORDER LIST @PRIYANKA-06AUG2021
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="10%">
                <div id="newOrderListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //*START CODE FOR PENDING NEW ORDER : AUTHOR @DARSHANA 12 AUG 2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    $orderPanelName = 'universalPendingNewOrderPanel';
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'pendingOrderListButt';
                    $inputNameButton = 'pendingOrderListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn1 btn1Hover';
                    //
                    $inputStyle = 'padding:3px 10px;font-weight:bold;font-size:15px;width:160px;'
                                . 'margin-top:5px;margin-bottom:5px;border-radius:5px!important;'
                                . 'text-align:center;color:#dc143c;background-color: #ffc0cb;margin-right: 5px;';
                    //
                    $inputLabel = 'PENDING ORDER LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'PENDING ORDER LIST';
                    //
                    // Place Holder in span outside input box
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    // 
                    // Event Options
                    //
                    // On Change Function
                    $inputOnChange = "";
                    $inputKeyUpFun = '';
                    //
                    //
                    $inputOnClickFun = 'universalOrderListFunc("' . $orderPanelName . '");';
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR PENDING NEW ORDER : AUTHOR @DARSHANA 12 AUG 2021
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="10%">
                <div id="readyOrderListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR READY ORDER LIST @PRIYANKA-05AUG2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    $orderPanelName = 'universalReadyOrderPanel';
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'readyOrderListButt';
                    $inputNameButton = 'readyOrderListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn1 btn1Hover';
                    //
                    $inputStyle = 'padding:3px 10px;font-weight:bold;font-size:15px;width:140px;'
                                . 'margin-top:5px;margin-bottom:5px;border-radius:5px!important;'
                                . 'text-align:center;color:#000080;background-color: #89B2ED;margin-right: 5px;';
                    //
                    $inputLabel = 'READY ORDER LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'READY ORDER LIST';
                    //
                    // Place Holder in span outside input box
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    // 
                    // Event Options
                    //
                    // On Change Function
                    $inputOnChange = "";
                    $inputKeyUpFun = '';
                    //
                    //
                    $inputOnClickFun = 'universalOrderListFunc("' . $orderPanelName . '");';
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR READY ORDER LIST @PRIYANKA-05AUG2021
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="15%">
                <div id="deliveredOrderListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR DELIVERED ORDER LIST @PRIYANKA-05AUG2021
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    $orderPanelName = 'universalDeliveredOrderPanel';
                    //
                    // Input Box Type and Ids
                    $inputType = 'submit';
                    $inputIdButton = 'deliveredOrderListButt';
                    $inputNameButton = 'deliveredOrderListButt';
                    //
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn btn1 btn1Hover';
                    //
                    $inputStyle = 'padding:3px 10px;font-weight:bold;font-size:15px;width:180px;'
                                . 'margin-top:5px;margin-bottom:5px;border-radius:5px!important;'
                                . 'text-align:center;background-color:#6EE36E;color:#0C3C03;margin-right: 5px;';
                    //
                    $inputLabel = 'DELIVERED ORDER LIST'; // Display Label 
                    //
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = 'fa fa-inr';
                    // 
                    // Place Holder inside input box
                    $inputPlaceHolder = 'DELIVERED ORDER LIST';
                    //
                    // Place Holder in span outside input box
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    // 
                    // Event Options
                    //
                    // On Change Function
                    $inputOnChange = "";
                    $inputKeyUpFun = '';
                    //
                    //
                    $inputOnClickFun = 'universalOrderListFunc("' . $orderPanelName . '");';
                    //
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    //* **************************************************************************************
                    //* END CODE FOR DELIVERED ORDER LIST @PRIYANKA-05AUG2021
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
        </tr>
</table>
<?php
/************ Start Code To GET Firm Details ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
//
if ($custId == NULL || $custId == '')
    $custId = $_REQUEST['custId'];
//
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
    array('dt' => 'DATE'),
    array('dt' => 'FIRM'),
    array('dt' => 'USER'),
    array('dt' => 'CODE'),
    array('dt' => 'INV'),
    array('dt' => 'PROD DET'),
    array('dt' => 'GS WT'),
    array('dt' => 'NT WT'),
    array('dt' => 'PURITY'),
    array('dt' => 'FFN WT'),
    array('dt' => 'AMT'),
    array('dt' => 'OTH CHRG'),
    array('dt' => 'STONE'),
    array('dt' => 'GST'),
    array('dt' => 'FINAL AMT'),
    array('dt' => 'ASSIGNED USER')
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
$_SESSION['tableName'] = 'stock_transaction st'; // Table Name
$_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
// DB Table Columns Parameters 
$dbColumnsArray = array(
    "$stock_date_col",
    "f.firm_name",
    "a.user_fname",
    "CONCAT(sttr_item_pre_id,COALESCE(sttr_item_id, ''))",
    "CONCAT(sttr_pre_invoice_no,COALESCE(sttr_invoice_no, ''))",
    "sttr_item_name",
    "sttr_gs_weight",
    "sttr_nt_weight",
    "sttr_purity",
    "sttr_final_fine_weight",
    "sttr_valuation",
    "sttr_total_making_charges",
    "sttr_stone_valuation",
    "sttr_tot_tax",
    "sttr_final_valuation",
    "u.user_fname"
);
//;
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
$_SESSION['dtSumColumn'] = '';
$_SESSION['dtDeleteColumn'] = '';
$_SESSION['dtSortColumn'] = '';
$_SESSION['dtASCDESC'] = '';
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "sttr_id,sttr_user_id,sttr_assign_user_id,sttr_item_pre_id,sttr_item_id,sttr_pre_invoice_no,sttr_invoice_no,";
//
//
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
//
//
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "u.user_fname"; // On which column
$_SESSION['onclickColumnId'] = "sttr_id";
$_SESSION['onclickColumnValue'] = "sttr_id";
$_SESSION['onclickColumnFunction'] = "userAllOrderListNavFunc";
$_SESSION['onclickColumnFunctionPara1'] = "sttr_id";
$_SESSION['onclickColumnFunctionPara2'] = "sttr_user_id";
$_SESSION['onclickColumnFunctionPara3'] = "invDetails";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";
//
//
// On Click Function Two Parameters @Author:PRIYANKA-03MAY2022
$_SESSION['onclickColumnImageTwo'] = "";
$_SESSION['onclickColumnTwo'] = "a.user_fname"; // On which column
$_SESSION['onclickColumnIdTwo'] = "sttr_id";
$_SESSION['onclickColumnValueTwo'] = "sttr_id";
$_SESSION['onclickColumnFunctionTwo'] = "userAllOrderListNavFunc";
$_SESSION['onclickColumnFunctionTwoPara1'] = "sttr_id";
$_SESSION['onclickColumnFunctionTwoPara2'] = "sttr_assign_user_id";
$_SESSION['onclickColumnFunctionTwoPara3'] = "invDetails";
$_SESSION['onclickColumnFunctionTwoPara4'] = "";
$_SESSION['onclickColumnFunctionTwoPara5'] = "";
$_SESSION['onclickColumnFunctionTwoPara6'] = "";
//
//
$_SESSION['assignOrder'] = "Yes";
//
//
// Delete Function Parameters
$_SESSION['deleteColumn'] = "sttr_id"; // On which column
$_SESSION['deleteColumnId'] = "sttr_id";
$_SESSION['deleteColumnValue'] = "sttr_id";
$_SESSION['deleteColumnFunction'] = "";
$_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "";
$_SESSION['deleteColumnFunctionPara3'] = "";  
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
// 
// 
// Where Clause Condition 
$_SESSION['tableWhere'] = "sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_firm_id IN ($strFrmId) "
                        . "AND sttr_stock_type = 'retail' AND sttr_indicator IN ('stock', 'AddInvoice', 'PURCHASE') "
                        . "AND sttr_return_status IN ('RETURNED') "
                        . "AND (sttr_delivery_status NOT IN ('DELIVERED') OR (sttr_delivery_status IS NULL) OR (sttr_delivery_status = '')) "
                        . "AND sttr_transaction_type = 'PURCHASE' "
                        . "AND sttr_status IN ('PaymentDone') ";
// 
// 
//echo 'tableWhere == ' . $_SESSION['tableWhere'] . '<br />';
// 
// 
// Table Joins
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id "
                       . " LEFT JOIN user AS u ON sttr_user_id = u.user_id "
                       . " LEFT JOIN user AS a ON sttr_assign_user_id = a.user_id ";
// 
// Data Table Main File
include 'omdatatables.php';
?>
</div>