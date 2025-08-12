<?php
/*
 * *************************************************************************************************
 * @Description: STOCK TRANSFER LIST @Author:PRIYANKA-23JUNE2022
 * *************************************************************************************************
 *
 * Created on JUNE 23, 2022 01:33:00 PM 
 * **************************************************************************************
 * @FileName: omTagStockTransferList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.164
 * @version: OMUNIM 2.7.164
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @Author:PRIYANKA-23JUNE2022
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software OMUNIM 2.7.164
 * Version: OMUNIM 2.7.164
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<div id="tagStockTransferStockListDiv">
<?php
//
//
// **********************************************************************************************
// START TO ADD CODE FOR STOCK TRANSFER LIST @Author:PRIYANKA-23JUNE2022
// **********************************************************************************************
//
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
//
if ($_GET['divSubPanel'] != '' && $_GET['divSubPanel'] != NULL) {
    $showDiv = $_GET['divSubPanel'];
}
//
//
//class="border-color-grey-b"
//
//
if ($_REQUEST['sttrId'] != '' && $_REQUEST['sttrId'] != NULL) {
    $sttrId = $_REQUEST['sttrId'];
}
//
if ($_REQUEST['transPanelName'] != '' && $_REQUEST['transPanelName'] != NULL) {
    $transPanelName = $_REQUEST['transPanelName'];
}
//
if ($_REQUEST['mainPanelName'] != '' && $_REQUEST['mainPanelName'] != NULL) {
    $mainPanelName = $_REQUEST['mainPanelName'];
}
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

if($nepaliDateIndicator == 'YES'){
   $stock_date_col =  "sttr_other_lang_add_date";
}else{
     $stock_date_col =  "sttr_add_date";
}
//print_r($_REQUEST);
//echo '</br>';
//echo 'panel == ' . $panel . '</br>';
//echo 'formName == ' . $formName . '</br>';
//echo "REQUEST panelName == " . $_REQUEST['panelName'] . '</br>';
//echo 'panelName == ' . $panelName . '</br>'; 
//echo 'sttr_panel_name == ' . $sttr_panel_name . '</br>'; 
//echo 'navPanelName == ' . $navPanelName . '</br>';
//
//
//echo 'panel == ' . $panel . '</br>';
//echo 'panelName == ' . $panelName . '</br>';
//echo 'mainPanelName == ' . $mainPanelName . '</br>';
//echo 'transPanelName == ' . $transPanelName . '</br>';
//echo 'sttrId == ' . $sttrId . '</br>';
//
//
?>
<!--<table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
    <tr>
        <td valign="top" align="left" width="32px" colspan="1">
            <div class="analysis_div_rows">
                <img src="<?php //echo $documentRoot; ?>/images/ring32.png" alt=""/>
            </div>
        </td>
        <td valign="top" align="left" colspan="15">
            <a class="links" onclick=""
               style="cursor: pointer;" title="STOCK TRANSFER LIST!">
                <div class="textLabelHeading" style="margin-left: 10px;">
                    STOCK TRANSFER LIST
                </div>
            </a>
        </td>
        <?php
        //
        // Start Code for Message Display @Author:PRIYANKA-23JUNE2022
        //
        ?>
        <td align="center" valign="middle" class="border-color-grey-b">
            <div id="messDisplayDiv"></div>
            <div <?php //if ($showDiv == 'StockTransferSuccessfully') { ?>
                    class="analysis_div_rows main_link_green12"
                <?php //} else { ?>
                    class="analysis_div_rows main_link_red_12"
                <?php //} ?> >
                    <?php //if ($showDiv == 'StockTransferSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Transfer Successfully ~ </div>
                <?php //} ?>  
            </div>
        </td>
        <?php
        //
        // End Code for Message Display @Author:PRIYANKA-23JUNE2022
        //
        ?>
        <td valign="middle" align="left" width="15%">
                <div id="stockTransferListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER LIST @PRIYANKA-22JULY2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferListButt';
//                    $inputNameButton = 'stockTransferListButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:136px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center;color:#AA6600;margin-left:27px;background-color: #FFC469;';
//                    //
//                    $inputLabel = 'STOCK TRANSFER LIST'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER LIST';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    $inputOnClickFun = 'showAddWhStockPanel("tagStockTransferList");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER LIST @PRIYANKA-22JULY2022
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
             <td valign="middle" align="left" width="22%">
                <div id="stockTransferPendingApprovalListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //*START CODE FOR STOCK TRANSFER - PENDING APPROVAL LIST @PRIYANKA-22JULY2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferPendingApprovalListButt';
//                    $inputNameButton = 'stockTransferPendingApprovalListButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:230px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center;color:#dc143c;margin-left:6px;background-color: #ffc0cb';
//                    //
//                    $inputLabel = 'STOCK TRANSFER - PENDING APPROVAL LIST'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER - PENDING APPROVAL LIST';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    $inputOnClickFun = 'showAddWhStockPanel("tagStockApprovalPendingStockList");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER - PENDING APPROVAL LIST @PRIYANKA-22JULY2022
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="18%">
                <div id="stockTransferApprovedListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER - APPROVED LIST @PRIYANKA-22JULY2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferApprovedListButt';
//                    $inputNameButton = 'stockTransferApprovedListButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:180px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center;color:#000080;margin-left:8px;background-color: #89B2ED;';
//                    //
//                    $inputLabel = 'STOCK TRANSFER - APPROVED LIST'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER - APPROVED LIST';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    $inputOnClickFun = 'showAddWhStockPanel("tagStockApprovedStockList");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER - APPROVED LIST @PRIYANKA-22JULY2022
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
            
            <td valign="middle" align="left" width="15%">
                <div id="stockTransferReturnListButtDiv"> 
                    <?php
                    //
                    //* ************************************************************************************************
                    //* START CODE FOR STOCK TRANSFER - RETURN LIST @PRIYANKA-22JULY2022
                    //* ************************************************************************************************
                    // 
                    // // This is the main division class for input filed
                    // 
                    //
                    // Input Box Type and Ids
//                    $inputType = 'submit';
//                    $inputIdButton = 'stockTransferReturnListButt';
//                    $inputNameButton = 'stockTransferReturnListButt';
//                    //
//                    //
//                    // This is the main class for input flied
//                    $inputFieldClass = 'btn btn-primary';
//                    //
//                    $inputStyle = 'height:22px;width:170px;font-weight:bold;font-size:12px;'
//                                . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                                . 'text-align:center;margin-right:6px;background-color:#6EE36E;color:#0C3C03;';
//                    //
//                    $inputLabel = 'STOCK TRANSFER - RETURN LIST'; // Display Label 
//                    //
//                    //
//                    // This class is for Pencil Icon                                                           
//                    $inputIconClass = 'fa fa-inr';
//                    // 
//                    // Place Holder inside input box
//                    $inputPlaceHolder = 'STOCK TRANSFER - RETURN LIST';
//                    //
//                    // Place Holder in span outside input box
//                    $spanPlaceHolderClass = '';
//                    $spanPlaceHolder = '';
//                    // 
//                    // Event Options
//                    //
//                    // On Change Function
//                    $inputOnChange = "";
//                    $inputKeyUpFun = '';
//                    //
//                    //
//                    $inputOnClickFun = 'showAddWhStockPanel("tagStockReturnStockList");';
//                    //
//                    $inputDropDownCls = '';               // This is the main division class for drop down 
//                    $inputselDropDownCls = '';            // This is class for selection in drop down
//                    $inputMainClassButton = '';           // This is the main division for Button
//                    // 
//                    //* **************************************************************************************
//                    //* END CODE FOR STOCK TRANSFER - RETURN LIST @PRIYANKA-22JULY2022
//                    //* **************************************************************************************
//                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    //}
                    ?>
                </div>
            </td>
        </tr>
    </table>-->
    <?php
    //
    // ADDED CODE FOR PANEL HEADING @Author:PRIYANKA-29JULY2022
    $headingNameForPanel = 'STOCK TRANSFER LIST';
    //
    // ADDED CODE FOR STOCK TRANSFER REPORT ALL BUTTONS @Author:PRIYANKA-29JULY2022
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportAllButtons.php';
    //
    //
    ?>
    <?php
    // 
    // Start Code To GET Firm Details @Author:PRIYANKA-23JUNE2022
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        // If not selected assign session firm @Author:PRIYANKA-23JUNE2022
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
        // Set String for Public Firms @Author:PRIYANKA-23JUNE2022
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
    // End Code To GET Firm Details @Author:PRIYANKA-23JUNE2022
    //
    //
    include 'omdatatablesUnset.php';
    //
    //
    if ($staffId != '' && $staffId != NULL) {
    //
    //
    // Data Table Main Columns @Author:PRIYANKA-23JUNE2022
    $dataTableColumnsFields = array(
        array('dt' => 'PROD ID'),
        array('dt' => 'DATE'),
        array('dt' => 'STAFF NAME'),
        array('dt' => 'PREV FIRM'),
        array('dt' => 'FIRM'),
        array('dt' => 'TYPE'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'NAME'),
        array('dt' => 'HSN'),
        array('dt' => 'QTY'),
        array('dt' => 'GS WT'),
        array('dt' => 'NT WT'),
        array('dt' => 'PURITY'),
        array('dt' => 'FN WT'),
        array('dt' => 'FFN WT'),
        array('dt' => 'STATUS'));
        //array('dt' => 'DEL'));
    //
    //
    } else {
    //
    //
    // Data Table Main Columns @Author:PRIYANKA-23JUNE2022
    $dataTableColumnsFields = array(
        array('dt' => 'PROD ID'),
        array('dt' => 'DATE'),
        array('dt' => 'PREV FIRM'),
        array('dt' => 'FIRM'),
        array('dt' => 'TYPE'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'NAME'),
        array('dt' => 'HSN'),
        array('dt' => 'QTY'),
        array('dt' => 'GS WT'),
        array('dt' => 'NT WT'),
        array('dt' => 'PURITY'),
        array('dt' => 'FN WT'),
        array('dt' => 'FFN WT'),
        array('dt' => 'STATUS'));
        //array('dt' => 'DEL'));
    //
    //    
    }
    //
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // 
    // 
    // Table Parameters @Author:PRIYANKA-23JUNE2022
    $_SESSION['tableName'] = 'stock_transaction'; // Table Name
    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
    //
    //
    if ($staffId != '' && $staffId != NULL) {
    // 
    // DB Table Columns Parameters  @Author:PRIYANKA-23JUNE2022
    $dbColumnsArray = array(
    "CONCAT(sttr_item_pre_id,COALESCE(sttr_item_id, ''))",
    "$stock_date_col",
    "CONCAT(s.user_fname,' ',s.user_lname)",    
    "p.firm_name",
    "f.firm_name",
    "sttr_metal_type",
    "sttr_item_category",
    "sttr_item_name",
    "sttr_hsn_no",        
    "if((sttr_final_quantity IS NULL),sttr_quantity,sttr_final_quantity)",
    "ROUND(if((sttr_final_gs_weight IS NULL),sttr_gs_weight,sttr_final_gs_weight),3)",
    "ROUND(if((sttr_final_nt_weight IS NULL),sttr_nt_weight,sttr_final_nt_weight),3)",
    "CONCAT(sttr_purity,' ','%')", 
    "ROUND(if((sttr_final_fn_weight IS NULL),sttr_fine_weight,sttr_final_fn_weight),3)",
    "ROUND(sttr_final_fine_weight,3)",
    "if((sttr_stock_transfer_approval_status='StockTransferApprovedStock'),'APPROVED',
     if((sttr_stock_transfer_approval_status='StockTransferReturnedStock'),'RETURNED',
     if((sttr_status='TAG'),'TRANSFERRED',sttr_status)))"   
    //"sttr_id"
    );
    //
    //
    $_SESSION['dtSumColumn'] = '9,10,11,13,14';
    //
    //
    } else {
    // 
    // DB Table Columns Parameters  @Author:PRIYANKA-23JUNE2022
    $dbColumnsArray = array(
    "CONCAT(sttr_item_pre_id,COALESCE(sttr_item_id, ''))",
    "$stock_date_col",   
    "p.firm_name",
    "f.firm_name",
    "sttr_metal_type",
    "sttr_item_category",
    "sttr_item_name",
    "sttr_hsn_no",        
    "if((sttr_final_quantity IS NULL),sttr_quantity,sttr_final_quantity)",
    "ROUND(if((sttr_final_gs_weight IS NULL),sttr_gs_weight,sttr_final_gs_weight),3)",
    "ROUND(if((sttr_final_nt_weight IS NULL),sttr_nt_weight,sttr_final_nt_weight),3)",
    "CONCAT(sttr_purity,' ','%')", 
    "ROUND(if((sttr_final_fn_weight IS NULL),sttr_fine_weight,sttr_final_fn_weight),3)",
    "ROUND(sttr_final_fine_weight,3)",
    "if((sttr_stock_transfer_approval_status='StockTransferApprovedStock'),'APPROVED',
     if((sttr_stock_transfer_approval_status='StockTransferReturnedStock'),'RETURNED',
     if((sttr_status='TAG'),'PENDING',sttr_status)))"    
    //"sttr_id"
    );
    //
    //
    $_SESSION['dtSumColumn'] = '8,9,10,12,13';    
    //
    //    
    }
    //
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    //
    //
    $_SESSION['sqlQueryColumns'] = "sttr_id, sttr_metal_type, sttr_transaction_type, sttr_indicator, sttr_status, "
                                 . "sttr_stock_transfer_previous_firm_id, sttr_stock_transfer_approval_status, sttr_staff_id,";
    //
    //   
    //$_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
    //
    //
    // Start code to include all session @Author:PRIYANKA-23JUNE2022
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    //
    // On Click Function Parameters @Author:PRIYANKA-23JUNE2022
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
    //
    //
    // FOR ROLLBACK TO PREVIOUS STOCK FIRM @Author:PRIYANKA-23JUNE2022
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
    //
    //
    //
    //
    // FOR DELETE DELETED STOCK @Author:PRIYANKA-23JUNE2022
//    $_SESSION['deleteColumn'] = "sttr_id"; // On which column
//    $_SESSION['deleteColumnId'] = "sttr_id";
//    $_SESSION['deleteColumnValue'] = "sttr_id";
//    //
//    if (($staffId != '' && $array['deleteTransactionForAllPanel'] == 'false')){
//        $_SESSION['deleteColumnFunction'] = "";
//    } else{
//        $_SESSION['deleteColumnFunction'] = "tagStockApprovalPendingRollback";
//    }
//    //
//    $_SESSION['deleteColumnFunctionPara1'] = "tagStockApprovalPendingRollback "; // Panel Name
//    $_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
//    $_SESSION['deleteColumnFunctionPara3'] = "sttr_metal_type";
//    $_SESSION['deleteColumnFunctionPara4'] = "";
//    $_SESSION['deleteColumnFunctionPara5'] = "tagStockApprovalPendingRollback";
//    $_SESSION['deleteColumnFunctionPara6'] = "";
    //
    //
    //
    //
    if ($staffId != '' && $staffId != NULL) {
    //
    // Extra direct columns we need pass in SQL Query @Author:PRIYANKA-23JUNE2022
    $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) "
                            . "and sttr_staff_id = '$staffId' "
                            //. "and sttr_transaction_type IN ('TAG') "
                            . "and sttr_stock_transfer_approval_status IN ('StockTransferApprovalPendingStock', 'StockTransferApprovedStock', 'StockTransferReturnedStock') "
                            . "and sttr_status NOT IN ('DELETED','NotDelFromStock')";
    // 
    // Table Joins @Author:PRIYANKA-23JUNE2022
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id " 
                           . " INNER JOIN firm AS p ON sttr_stock_transfer_previous_firm_id = p.firm_id "
                           . " INNER JOIN user AS s ON sttr_staff_id = s.user_id ";
    //
    } else {
    //
    // Extra direct columns we need pass in SQL Query @Author:PRIYANKA-23JUNE2022
    // Commented Code of transaction type @Author:PRIYANKA-05AUG2022
    $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) "
                            //. "and sttr_transaction_type IN ('TAG') "
                            . "and sttr_stock_transfer_approval_status IN ('StockTransferApprovalPendingStock', 'StockTransferApprovedStock', 'StockTransferReturnedStock') "
                            . "and sttr_status NOT IN ('DELETED','NotDelFromStock')";
    //  
    // Table Joins @Author:PRIYANKA-23JUNE2022
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id " 
                           . " INNER JOIN firm AS p ON sttr_stock_transfer_previous_firm_id = p.firm_id ";
    //
    }
    // 
    // 
    //echo '$_SESSION[tableWhere] == ' . $_SESSION['tableWhere'] . '<br />';
    // 
    // 
    // Data Table Main File @Author:PRIYANKA-23JUNE2022
    include 'omdatatables.php';
    //
    //
    // **********************************************************************************************
    // END TO ADD CODE FOR STOCK TRANSFER LIST @Author:PRIYANKA-23JUNE2022
    // **********************************************************************************************
    //
    //
    ?>
</div>