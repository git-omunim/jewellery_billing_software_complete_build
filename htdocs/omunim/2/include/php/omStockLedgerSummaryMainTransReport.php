<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER SUMMARY MAIN TRANSACTIONS REPORT @AUTHOR:PRIYANKA-12OCT2021
 * **************************************************************************************
 * 
 * Created on OCT 12, 2021 06:55:08 PM
 *
 * @FileName: omStockLedgerSummaryMainTransReport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.84
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-12OCT2021
 *  REASON:
 *
 */
?>
<?php
//
if (!isset($_SESSION)) {
    session_start();
}
//
$currentFileName = basename(__FILE__);
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
//
//
//echo 'documentRootIncludePhp *==* ' . $_SESSION['documentRootIncludePhp'];
//
//
//print_r($_REQUEST);
//
//
if ($startDate == '' || $startDate == NULL)
    $startDate = $_GET['startDate'];
//
//
if ($endDate == '' || $endDate == NULL)
    $endDate = $_GET['endDate'];
//
//
if ($transFirmId == '' || $transFirmId == NULL)
    $transFirmId = $_GET['transFirmId'];
//
//
if ($transFirmId != '' && $transFirmId != NULL) {
    $sessionFirmStr = " and firm_id IN ($transFirmId) ";
}
//
//
if ($Category == '' || $Category == NULL)
    $Category = $_GET['transCategory'];
//
//
if ($transName == '' || $transName == NULL)
    $transName = $_GET['transName'];
//
//
if ($transStockType == '' || $transStockType == NULL)
    $transStockType = $_GET['transStockType'];
//
//
if ($transPurity == '' || $transPurity == NULL)
    $transPurity = $_GET['transPurity'];
//
//
if ($sttrId == '' || $sttrId == NULL)
    $sttrId = $_GET['sttrId'];
//
//
//echo '$sttrId == ' . $sttrId . '<br />';
//
//
parse_str(getTableValues("SELECT sttr_transaction_type AS prodTransType, sttr_st_id AS prodStockId, "
                       . "sttr_counter_name AS transCounter "
                       . "FROM stock_transaction "
                       . "WHERE sttr_owner_id = '$sessionOwnerId' "
                       . "and sttr_firm_id IN ($transFirmId) "
                       . "and sttr_id = '$sttrId'"));
//
//
//echo '$prodTransType == ' . $prodTransType . '<br />';
//echo '$prodStockId == ' . $prodStockId . '<br />';
//
//
if ($transPanelDetailsDisplay == '' || $transPanelDetailsDisplay == NULL)
    $transPanelDetailsDisplay = $_GET['transPanelDetailsDisplay'];
//
//
//echo '$startDate == ' . $startDate . '<br />';
//echo '$endDate == ' . $endDate . '<br />';
//echo '$transFirmId == ' . $transFirmId . '<br />';
//echo '$sessionFirmStr == ' . $sessionFirmStr . '<br />';
//echo '$Category == ' . $Category . '<br />';
//
//
$todayFromStrDate = strtotime($startDate);
$todayToStrDate = strtotime($endDate);
//
//
//echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
//echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
//
//
//
//
// Code for DATE RANGE STR @AUTHOR:PRIYANKA-18OCT2021
$todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
$todayDateStr = strtotime($todayDate);
//
//
if ($todayFromStrDate == $todayToStrDate) {
    //
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
    // Code for DATE STR @AUTHOR:PRIYANKA-19OCT2021
    $dateStr = "((UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate) OR (UNIX_TIMESTAMP(STR_TO_DATE(sttr_melting_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate))";
    //
} else {
    //
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
    // Code for DATE STR @AUTHOR:PRIYANKA-19OCT2021
    $dateStr = "((UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate) OR (UNIX_TIMESTAMP(STR_TO_DATE(sttr_melting_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate))";
    //
}
//
//
$dateStrForOutwards = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
//
//
//
//
// WHERE STR FOR OPENING @AUTHOR:PRIYANKA-12OCT2021
//if ($transPanelDetailsDisplay == 'OpeningDetails') {
//    //
//    $whereStr = " AND sttr_item_category = '$Category' "
//              . " AND sttr_item_name = '$transName' "
//              . " AND sttr_stock_type = '$transStockType' "
//              . " AND sttr_purity = '$transPurity' "
//              . " AND ((sttr_indicator IN ('PURCHASE') and sttr_transaction_type IN ('PURCHASE') "
//              . " AND (sttr_user_id IS NOT NULL or sttr_user_id != '')) "
//              . " OR (sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'ItemReturn') "                                                                                
//              . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'ItemReturn'))) "
//              . " AND ( ($dateStrForOpening) or ($dateRangeStrForOpening) ) ";
//    //
//}
//
//
//
//
if ($_GET['counterPanelName'] == 'StockCounterReportPanel') { 
    //
    $counterNameStrForInwardOutward = " AND sttr_counter_name = '$transCounter' ";
    //
} else {
    //
    $counterNameStrForInwardOutward = "";
    //
}
//
//
//
if ($prodTransType == 'PURCHASE') {
    //
    $whereStrForTag = " OR (sttr_st_id = '$prodStockId' AND sttr_transaction_type = 'TAG' AND $dateStrForOutwards) ";
    //
    //echo '$whereStrForTag == ' . $whereStrForTag . '<br />';
    //
}
//
//
//
// WHERE STR FOR INWARDS @AUTHOR:PRIYANKA-13OCT2021
if ($transPanelDetailsDisplay == 'InwardDetails') {
    //
    $whereStr = " AND sttr_item_category = '$Category' "
              . " AND sttr_item_name = '$transName' "
              . " AND sttr_stock_type = '$transStockType' "
              . " AND sttr_purity = '$transPurity' "
              . " $counterNameStrForInwardOutward "
              //. " AND sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'ItemReturn') "
              . " AND sttr_indicator IN ('stock', 'AddInvoice', 'RetailStock', 'ItemReturn') "
              . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP', 'ItemReturn') "
              . " AND sttr_status NOT IN ('DELETED','NotDelFromStock') "
              . " AND $dateStr ";
    //
}
//
//
// ADDED CODE FOR APPROVAL PANEL ENTRIES @AUTHOR:PRIYANKA-10AUG2022
// WHERE STR FOR OUTWARDS @AUTHOR:PRIYANKA-13OCT2021
if ($transPanelDetailsDisplay == 'OutwardDetails') {
    //
    $whereStr = " AND (sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL', 'PurchaseReturn') OR ((sttr_melting_status IN ('Y','RFM','AFM','N') OR sttr_melting_status IS NOT NULL) AND sttr_melting_status!='' AND (ROUND(sttr_gs_weight,3)=ROUND(sttr_final_gs_weight,3) ))) "
              . " AND sttr_item_category = '$Category' "
              . " AND sttr_item_name = '$transName' "
              //. " AND sttr_stock_type = '$transStockType' "
              //. " AND sttr_purity = '$transPurity' "
              //. " $counterNameStrForInwardOutward "
              . " AND $dateStr "
              //. " $whereStrForTag "
            . "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                           . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone', 'EXISTING','TAG') "
                           //. "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'APPROVAL', 'PurchaseReturn', 'rawMetal')" 
                           . "and sttr_indicator IN ('stock','RetailStock','APPROVAL', 'PurchaseReturn') ";
    //
}
//
//
//
// FOR CLOSING TRANSACTIONS @AUTHOR:PRIYANKA-11JAN2022
if ($transPanelDetailsDisplay == 'ClosingDetails') {
    //
    //
    if ($_GET['counterPanelName'] == 'StockCounterReportPanel') { 
        //
        // ADD CODE FOR STOCK COUNTER CLOSING ALL TRANSACTIONS REPORT @AUTHOR:PRIYANKA-21FEB2022
        include $_SESSION['documentRootIncludePhp'] . 'omStockCounterClosingAllTransReport.php';
        //
        //
    } else {
        //
        // ADD CODE FOR STOCK LEDGER SUMMARY CLOSING ALL TRANSACTIONS REPORT @AUTHOR:PRIYANKA-11JAN2022
        include $_SESSION['documentRootIncludePhp'] . 'omStockLedgerSummaryClosingAllTransReport.php';
        //
        //
    }
    //
    //
} else if ($transPanelDetailsDisplay == 'OpeningDetails') { 
    //
    //
    if ($_GET['counterPanelName'] == 'StockCounterReportPanel') { 
        //
        // ADD CODE FOR STOCK COUNTER OPENING ALL TRANSACTIONS REPORT @AUTHOR:PRIYANKA-21FEB2022
        include $_SESSION['documentRootIncludePhp'] . 'omStockCounterOpeningAllTransReport.php';
        //
        //
    } else {
        //
        // ADD CODE FOR STOCK LEDGER SUMMARY OPENING ALL TRANSACTIONS REPORT @AUTHOR:PRIYANKA-03JAN2022
        include $_SESSION['documentRootIncludePhp'] . 'omStockLedgerSummaryOpeningAllTransReport.php';
        //
        //
    }
    //
    //
} else if ($transPanelDetailsDisplay == 'ShowMismatchProductDetails') { 
    //
    //
    // ADD CODE FOR STOCK LEDGER STOCK MISMATCH PRODUCT REPORT @AUTHOR:PRIYANKA-20JAN2022
    include $_SESSION['documentRootIncludePhp'] . 'omStockLedgerStockMismatchTransReport.php';
    //
    //
} else if ($transPanelDetailsDisplay == 'StockMismatchStockPurityPanel') { 
    //
    //
    // ADD CODE FOR STOCK LEDGER STOCK MISMATCH UPDATE STOCK PURITY PANEL @AUTHOR:PRIYANKA-08FEB2022
    include $_SESSION['documentRootIncludePhp'] . 'omStockLedgerStockMismatchUpdateStockPurity.php';
    //
    //
} else { ?>
<style>
    .thBorder .trBorder{
        border: 1px solid black; 
    }
</style>
<div id="balanceSheetPrintDiv">
    <div style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); 
         background: #fff;">
        <div class="card-body">
            <div style="border-radius: 5px !important;">
                <div class="card-header" 
                     style="border-radius: 5px;color:#E56717; font-size: 18px; font-weight:bold; background: #f1f1f1;">
                    <table width="100%">
                        <tr id="headerTable">
                            <td align="left" width="50%">
                                <?php if ($transPanelDetailsDisplay == 'OutwardDetails') { ?>
                                OUTWARD STOCK TRANSACTIONS
                                <?php } else if ($transPanelDetailsDisplay == 'InwardDetails') { ?>
                                INWARD STOCK TRANSACTIONS
                                <?php } else { ?>
                                STOCK TRANSACTIONS
                                <?php } ?>
                            </td>
                            <!--<td align="right" style="float:right;" width="50%"> 
                                <button align="right" class="btn" 
                                        style="padding:7px; border-radius: 4px !important; background-color: #add779; 
                                        color:#fff;font-weight: bold;"
                                        onclick="getStockLedgerSummaryPanel();">
                                    STOCK SUMMARY
                                </button>
                            </td>-->
                        </tr>
                    </table>
                </div>
                <div class='card-body'>
                    <?php
                    //
                    //
                    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                    }
                    //
                    //
                    if ($selFirmId != NULL) {
                        $strFrmId = $selFirmId;
                    } else {
                        //
                        $resFirmCount = mysqli_query($conn, $qSelFirmCount);
                        //
                        $strFrmId = '0';
                        //
                        // Set String for Public Firms @AUTHOR:PRIYANKA-12OCT2021
                        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                            $strFrmId = $strFrmId . ",";
                            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                        }
                    }
                    //
                    //
                    ?>
                    <div id="purchaseDetailsSubDiv">
                        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />                            
                        <?php
                            //
                            //
                            // Data Table Main Columns @AUTHOR:PRIYANKA-12OCT2021
                            include $_SESSION['documentRootIncludePhp'] . 'omdatatablesUnset.php';
                            //
                            //
                            $dataTableColumnsFields = array(
                                array('dt' => 'DATE'),
                                array('dt' => 'PID'),
                                array('dt' => 'PNO'),
                                array('dt' => 'FIRM'),
                                array('dt' => 'METAL'),
                                array('dt' => 'HUID'),
                                array('dt' => 'COUNTER'),
                                array('dt' => 'CATEGORY'),
                                array('dt' => 'NAME'),
                                array('dt' => 'TYPE'),
                                array('dt' => 'QTY'),
                                array('dt' => 'GS WT'),
                                array('dt' => 'ST WT'),
                                array('dt' => 'NT WT'),
                                array('dt' => 'PURITY'),
                                array('dt' => 'FN WT'),
                                array('dt' => 'PUR RATE'),
                                array('dt' => 'BC NO'),
                                array('dt' => 'TYPE'),
                                array('dt' => 'STATUS'),
                                array('dt' => 'NAME')
                            );
                            //
                            //
                            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
                            //
                            //
                            // Table Parameters @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['tableName'] = 'stock_transaction'; // Table Name
                            $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
                            //
                            //
                            if ($transPanelDetailsDisplay == 'OutwardDetails') {
                            //
                            // DB Table Columns Parameters @AUTHOR:PRIYANKA-12OCT2021
                            $dbColumnsArray = array(
                                "sttr_add_date",
                                "sttr_item_pre_id",
                                "sttr_item_id",
                                "f.firm_name",
                                "sttr_metal_type",
                                "sttr_hallmark_uid",
                                "sttr_counter_name",
                                "sttr_item_category",
                                "sttr_item_name",
                                "sttr_stock_type",
                                "sttr_quantity",
                                "sttr_gs_weight",
                                "sttr_stone_wt",
                                "sttr_nt_weight",
                                "sttr_purity",
                                "sttr_fine_weight",
                                "sttr_metal_rate",
                                "CONCAT(sttr_barcode_prefix,'',sttr_barcode)",
                                "IF(sttr_transaction_type='sell','Sold Out',IF(sttr_transaction_type IN ('TAG','EXISTING'),IF(sttr_melting_status IN ('Y','RFM','AFM','N'),'Melted',sttr_transaction_type),sttr_transaction_type))",
                                "sttr_status",
                                "sttr_user_billing_name"
                            );
                            //
                            //
                            } else {
                            //
                            // DB Table Columns Parameters @AUTHOR:PRIYANKA-12OCT2021
                            $dbColumnsArray = array(
                                "sttr_add_date",
                                "sttr_item_pre_id",
                                "sttr_item_id",
                                "f.firm_name",
                                "sttr_metal_type",
                                "sttr_hallmark_uid",
                                "sttr_counter_name",
                                "sttr_item_category",
                                "sttr_item_name",
                                "sttr_stock_type",
                                "if(sttr_transaction_type IN ('sell'),(-1*sttr_quantity),sttr_quantity)",
                                "if(sttr_transaction_type IN ('sell'),(-1*sttr_gs_weight),sttr_gs_weight)",
                                "sttr_stone_wt",
                                "if(sttr_transaction_type IN ('sell'),(-1*sttr_nt_weight),sttr_nt_weight)",
                                "sttr_purity",
                                "if(sttr_transaction_type IN ('sell'),(-1*sttr_fine_weight),sttr_fine_weight)",
                                "sttr_metal_rate",
                                "CONCAT(sttr_barcode_prefix,'',sttr_barcode)",
                                "IF(sttr_transaction_type='sell','Sold Out',IF(sttr_transaction_type IN ('TAG','EXISTING'),IF(sttr_melting_status IN ('Y','RFM','AFM','N'),'Melted',sttr_transaction_type),sttr_transaction_type))",
                                "sttr_status",
                                "sttr_user_billing_name"
                            );
                            //
                            //
                            }
                            //
                            //
                            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['multipleColCounter'] = '';
                            //
                            //
                            if ($_SESSION['sessionProdName'] == 'OMRETL') {
                                $_SESSION['dtSumColumn'] = '10,11,12,13,15';
                            } else {
                                $_SESSION['dtSumColumn'] = '10,11,12,13,15';
                            }
                            //
                            //
                            $_SESSION['dtSortColumn'] = '1,1';                            
                            $_SESSION['dtASCDESC'] = 'asc,asc';
                            //
                            //
                            //$_SESSION['dtDeleteColumn'] = '';
                            //
                            //
                            // Extra direct columns we need pass in SQL Query @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['sqlQueryColumns'] = "sttr_id, sttr_quantity, sttr_counter_name, sttr_transaction_type,";
                            //
                            //
                            if ($transPanelDetailsDisplay != 'OutwardDetails') {
                                //
                                //
                                // Colorful column name
                                //$_SESSION['colorfulColumn'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_gs_weight),sttr_gs_weight)";
                                //$_SESSION['colorfulColumnCheck'] = 'sttr_gs_weight';
                                //$_SESSION['colorfulColumnTitle'] = 'GS WT';
                                //
                                //
                                $_SESSION['colorfulColumn4'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_quantity),sttr_quantity)"; // For Color Options Pass Column Name Here
                                $_SESSION['colorfulColumn41'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_gs_weight),sttr_gs_weight)"; // For Color Options Pass Column Name Here
                                $_SESSION['colorfulColumn42'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_nt_weight),sttr_nt_weight)"; // For Color Options Pass Column Name Here
                                $_SESSION['colorfulColumn43'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_fine_weight),sttr_fine_weight)"; // For Color Options Pass Column Name Here
                                $_SESSION['colorfulColumnCheck4'] = 'Y'; // Check this for Color + / - Value sh be 'Y'
                                $_SESSION['colorfulColumnTitle4'] = '';
                                $_SESSION['colorfulColumnCheck4Value'] = '';
                                $_SESSION['colorfulColumnCheck4Value1'] = '';
                                $_SESSION['colorfulColumnCheck4Value2'] = '';
                            }
                            //
                            //
                            // On Click Function Parameters @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['onclickColumnImage'] = "";
                            $_SESSION['onclickColumn'] = "sttr_item_category"; // On which column @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['onclickColumnId'] = "sttr_id";
                            $_SESSION['onclickColumnValue'] = "sttr_id";
                            $_SESSION['onclickColumnFunction'] = "sttr_item_category";
                            $_SESSION['onclickColumnFunctionPara1'] = "sttr_id";
                            $_SESSION['onclickColumnFunctionPara2'] = "";
                            $_SESSION['onclickColumnFunctionPara3'] = "";
                            $_SESSION['onclickColumnFunctionPara4'] = "";
                            $_SESSION['onclickColumnFunctionPara5'] = "";
                            $_SESSION['onclickColumnFunctionPara6'] = "";
                            //
                            //
                            // Delete Function Parameters @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['deleteColumn'] = ""; // On which column @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['deleteColumnId'] = "";
                            $_SESSION['deleteColumnValue'] = "";
                            $_SESSION['deleteColumnFunction'] = "";
                            $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['deleteColumnFunctionPara2'] = "";
                            $_SESSION['deleteColumnFunctionPara3'] = "";
                            $_SESSION['deleteColumnFunctionPara4'] = "";
                            $_SESSION['deleteColumnFunctionPara5'] = "";
                            $_SESSION['deleteColumnFunctionPara6'] = "";
                            //
                            //
                            // Where Clause Condition @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['tableWhere'] = " sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                                    . " AND sttr_firm_id IN ($strFrmId) "                                                                                                        
                                                    . " $whereStr ";
                            //
                            //
                            //echo 'tableWhere ==  ' . $_SESSION['tableWhere'];
                            //
                            //
                            // Table Joins @AUTHOR:PRIYANKA-12OCT2021
                            $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id ";
                            //
                            //
                            $dataTableFooter = 'N';
                            //
                            //
                            // Data Table Main File @AUTHOR:PRIYANKA-12OCT2021
                            include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
                            //
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>