<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER STOCK MISMATCH TRANSACTIONS REPORT @AUTHOR:PRIYANKA-20JAN2022
 * **************************************************************************************
 * 
 * Created on JAN 20, 2022 05:30:08 PM
 *
 * @FileName: omStockLedgerStockMismatchTransReport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.118
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-20JAN2022
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
if ($todayFromStrDate == $todayToStrDate) {
    //
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
} else {
    //
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
}
//
?>
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
                            <td align="left" width="50%">STOCK MISMATCH TRANSACTIONS</td>
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
                        // Set String for Public Firms @AUTHOR:PRIYANKA-20JAN2022
                        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                            $strFrmId = $strFrmId . ",";
                            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                        }
                    }
                    //
                    //
                    ?>
                    <div id="purchaseDetailsSubDiv">
                        <input type="hidden" id="sessionProVersion" name="sessionProVersion" 
                               value="<?php echo $_SESSION['sessionProdVer']; ?>" />
                        <input type="hidden" id="documentRootPath" name="documentRootPath" 
                               value="<?php echo $documentRootBSlash; ?>" />                            
                        <div id="myModalStockMismatch" class="modal"></div>
                        <?php
                        //
                        //
                        $dateStrForOp = "UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date,'%d %b %Y'))<$todayFromStrDate";
                        //
                        //                                              
                        //
                        // Data Table Main Columns @AUTHOR:PRIYANKA-20JAN2022
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
                            array('dt' => 'CATEGORY'),
                            array('dt' => 'NAME'),
                            array('dt' => 'TYPE'),
                            array('dt' => 'QTY'),
                            array('dt' => 'GS WT'),
                            array('dt' => 'ST WT'),
                            array('dt' => 'NT WT'),
                            array('dt' => 'PURITY'),
                            array('dt' => 'FN WT'),
                            array('dt' => 'FFN WT'),
                            array('dt' => 'PUR RATE'),
                            array('dt' => 'TYPE'),
                            array('dt' => 'STATUS'),
                            array('dt' => 'BC NO')
                        );
                        //
                        //
                        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
                        //
                        //
                        // Table Parameters @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['tableName'] = 'stock_transaction as stock'; // Table Name
                        $_SESSION['tableNamePK'] = 'stock.sttr_id'; // Primary Key
                        //
                        //
                        //
                        // DB Table Columns Parameters @AUTHOR:PRIYANKA-20JAN2022
                        $dbColumnsArray = array(
                            "stock.sttr_add_date",
                            "stock.sttr_item_pre_id",
                            "CAST(stock.sttr_item_id AS UNSIGNED)",
                            "f.firm_name",
                            "stock.sttr_metal_type",
                            "stock.sttr_hallmark_uid",
                            "stock.sttr_item_category",
                            "stock.sttr_item_name",
                            "stock.sttr_stock_type",
                            "if(stock.sttr_transaction_type IN ('sell'),(-1*stock.sttr_quantity),stock.sttr_quantity)",
                            "if(stock.sttr_transaction_type IN ('sell'),(-1*stock.sttr_gs_weight),stock.sttr_gs_weight)",
                            "stock.sttr_stone_wt",
                            "if(stock.sttr_transaction_type IN ('sell'),(-1*stock.sttr_nt_weight),stock.sttr_nt_weight)",
                            "CONCAT(stock.sttr_purity,' ','%')",
                            "if(stock.sttr_transaction_type IN ('sell'),(-1*stock.sttr_fine_weight),stock.sttr_fine_weight)",
                            "if(stock.sttr_transaction_type IN ('sell'),(-1*stock.sttr_final_fine_weight),stock.sttr_final_fine_weight)",
                            "stock.sttr_metal_rate",
                            "stock.sttr_transaction_type",
                            "stock.sttr_status",
                            "CONCAT(stock.sttr_barcode_prefix,'',stock.sttr_barcode)"
                        );
                        //
                        //
                        //
                        //
                        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change @AUTHOR:PRIYANKA-20JAN2022
                        //
                        //
                        //$_SESSION['multipleColCounter'] = '';
                        //
                        //
                        //if ($_SESSION['sessionProdName'] == 'OMRETL') {
                        //    $_SESSION['dtSumColumn'] = '';
                        //} else {
                            $_SESSION['dtSumColumn'] = '9,10,12,14,15';
                        //}
                        //
                        //
                        $_SESSION['dtSortColumn'] = '1,1';
                        $_SESSION['dtASCDESC'] = 'asc,asc';
                        //
                        //
                        //$_SESSION['dtDeleteColumn'] = '';
                        //
                        //
                        // Extra direct columns we need pass in SQL Query @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['sqlQueryColumns'] = "stock.sttr_id, stock.sttr_sttr_id, stock.sttr_add_date, stock.sttr_sttrin_id, "
                                                     . "stock.sttr_item_category, stock.sttr_item_name, stock.sttr_purity, stock.sttr_metal_type, "
                                                     . "stock.sttr_indicator, stock.sttr_transaction_type, stock.sttr_quantity,";
                        //
                        //
                        //
                        // On Click Function Parameters @AUTHOR-PRIYANKA-21JAN2022
                        $_SESSION['onclickColumnImage'] = "";
                        $_SESSION['onclickColumn'] = "stock.sttr_item_category"; // On which column @AUTHOR-PRIYANKA-21JAN2022
                        $_SESSION['onclickColumnId'] = "stock.sttr_id";
                        $_SESSION['onclickColumnValue'] = "stock.sttr_id";
                        $_SESSION['onclickColumnFunction'] = "updateStockMismatchTransactionsPopUp";
                        $_SESSION['onclickColumnFunctionPara1'] = "stock.sttr_id";
                        $_SESSION['onclickColumnFunctionPara2'] = "stock.sttr_stock_type";
                        $_SESSION['onclickColumnFunctionPara3'] = $strFrmId;
                        $_SESSION['onclickColumnFunctionPara4'] = "UpdateStockMismatchProductDetails"; // Panel Name @AUTHOR-PRIYANKA-21JAN2022
                        $_SESSION['onclickColumnFunctionPara5'] = "stock.sttr_item_category";
                        $_SESSION['onclickColumnFunctionPara6'] = "stock.sttr_item_name";
                        $_SESSION['onclickColumnFunctionPara7'] = "stock.sttr_purity";
                        $_SESSION['onclickColumnFunctionPara8'] = "stock.sttr_metal_type";
                        $_SESSION['onclickColumnFunctionPara9'] = "stock.sttr_indicator";
                        $_SESSION['onclickColumnFunctionPara10'] = $startDate;
                        $_SESSION['onclickColumnFunctionPara11'] = $endDate;
                        $_SESSION['onclickColumnFunctionPara12'] = $documentRoot;
                        $_SESSION['onclickColumnFunctionPara13'] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-21JAN2022
                        //
                        //
                        //
                        // Delete Function Parameters @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['deleteColumn'] = ""; // On which column @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['deleteColumnId'] = "";
                        $_SESSION['deleteColumnValue'] = "";
                        $_SESSION['deleteColumnFunction'] = "";
                        $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['deleteColumnFunctionPara2'] = "";
                        $_SESSION['deleteColumnFunctionPara3'] = "";
                        $_SESSION['deleteColumnFunctionPara4'] = "";
                        $_SESSION['deleteColumnFunctionPara5'] = "";
                        $_SESSION['deleteColumnFunctionPara6'] = "";
                        //
                        //
                        // Where Clause Condition @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['tableWhere'] = " (stock.sttr_id = '$sttrId' OR stock.sttr_sttr_id = '$sttrId') AND "
                                                . "  stock.sttr_indicator != 'stockCrystal' ";
                        //
                        //
                        //echo 'tableWhere ==  ' . $_SESSION['tableWhere'];
                        //
                        //
                        // Table Joins @AUTHOR:PRIYANKA-20JAN2022
                        $viewJoin = " INNER JOIN firm AS f ON stock.sttr_firm_id=f.firm_id ";
                        //
                        //
                        // Table Joins @AUTHOR:PRIYANKA-20JAN2022
                        $_SESSION['tableJoin'] = " $viewJoin ";
                        //
                        //
                        $dataTableFooter = 'N';
                        //
                        //
                        // Data Table Main File @AUTHOR:PRIYANKA-20JAN2022
                        include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
                        //
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>