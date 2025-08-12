<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER SUMMARY OPENING ALL TRANSACTIONS REPORT @AUTHOR:PRIYANKA-03JAN2022
 * **************************************************************************************
 * 
 * Created on JAN 03, 2022 01:30:08 PM
 *
 * @FileName: omStockLedgerSummaryOpeningAllTransReport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.110
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-03JAN2022
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
                            <td align="left" width="50%">OPENING STOCK TRANSACTIONS</td>
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
                        // Set String for Public Firms @AUTHOR:PRIYANKA-03JAN2022
                        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                            $strFrmId = $strFrmId . ",";
                            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                        }
                    }
                    //
                    //
                    ?>
                    <div id="purchaseDetailsSubDiv">
                        <input type="hidden" id="sessionProVersion" name="sessionProVersion" value="<?php echo $_SESSION['sessionProdVer']; ?>" />
                        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />                            
                        <?php
                        //
                        //
                        $dateStrForOp = "UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date,'%d %b %Y'))<$todayFromStrDate";
                        //
                        //
                        $tableJoin = " INNER JOIN firm AS f ON stock.sttr_firm_id=f.firm_id 
                            LEFT JOIN
    temp_view AS sold_transactions ON sold_transactions.sttr_sttr_id = stock.sttr_id
        AND sold_transactions.sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL')
        AND sold_transactions.sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone')
        AND sold_transactions.sttr_indicator IN ('stock', 'RetailStock', 'APPROVAL')
        AND UNIX_TIMESTAMP(STR_TO_DATE(sold_transactions.sttr_add_date, '%d %b %Y')) < $todayFromStrDate
        AND sold_transactions.sttr_item_category = '$Category'
        AND sold_transactions.sttr_item_name = '$transName'
        AND sold_transactions.sttr_purity = '$transPurity'
        AND sold_transactions.sttr_stock_type = 'retail'
LEFT JOIN
    temp_view AS soldout_original ON stock.sttr_transaction_type = 'ItemReturn'
        AND soldout_original.sttr_transaction_type = 'EXISTING'
        AND soldout_original.sttr_status = 'SOLDOUT'

        AND soldout_original.sttr_item_id = stock.sttr_item_id
        AND soldout_original.sttr_item_pre_id = stock.sttr_item_pre_id ";
                        //
                        // Table Where @AUTHOR:PRIYANKA-17JAN2022
                        $whereStr = " 
    stock.sttr_indicator IN ('stock', 'AddInvoice', 'RetailStock','ItemReturn')
    AND stock.sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'PURBYSUPP', 'TAG', 'ItemReturn')

    AND sold_transactions.sttr_id IS NULL
    AND soldout_original.sttr_id IS NULL ";
                        //
                        //
//                        echo '<br/>$tableJoin:' . $tableJoin;
//                        echo '<br/>$whereStr:' . $whereStr; die;
                        //
                        //
                        // Table Temp View Where @AUTHOR:PRIYANKA-03JAN2022
                        $tempViewWhere = " st.sttr_firm_id IN ($strFrmId) "
                                . "AND st.sttr_status NOT IN ('DELETED', 'ApprovalDone') "
                                . "AND ( $dateStrForOp ) "
                                . "AND st.sttr_item_category = '$Category' "
                                . "AND st.sttr_item_name = '$transName' "
                                . "AND st.sttr_purity = '$transPurity' "
                                . "AND st.sttr_stock_type = 'retail' ";
                        //
                        //
                        //echo '<br/>$viewWhere:' . $viewWhere; die;
                        //
                        //
                        // Table Joins @AUTHOR:PRIYANKA-03JAN2022
                        $viewJoin = " INNER JOIN firm AS f ON stock.sttr_firm_id=f.firm_id ";
                        //
                        //
                        //
                        //
                        $createView = "CREATE table temp_view AS "
                                . "SELECT st.sttr_id as 'sttr_id',"
                                . "st.sttr_transaction_type as 'sttr_transaction_type',"
                                . "st.sttr_sttr_id as 'sttr_sttr_id',"
                                . "st.sttr_firm_id as 'sttr_firm_id',"
                                . "st.sttr_sttrin_id as 'sttr_sttrin_id',"
                                . "st.sttr_add_date as 'sttr_add_date',"
                                . "st.sttr_item_pre_id as 'sttr_item_pre_id',"
                                . "st.sttr_item_id as 'sttr_item_id',"
                                . "st.sttr_barcode_prefix as 'sttr_barcode_prefix',"
                                . "st.sttr_barcode as 'sttr_barcode',"
                                . "st.sttr_metal_type as 'sttr_metal_type',"
                                . "st.sttr_metal_rate as 'sttr_metal_rate',"
                                . "st.sttr_purity as 'sttr_purity',"
                                . "st.sttr_product_purchase_rate as 'sttr_product_purchase_rate',"
                                . "st.sttr_item_model_no as 'sttr_item_model_no',"
                                . "st.sttr_item_category as 'sttr_item_category',"
                                . "st.sttr_item_name as 'sttr_item_name',"
                                . "st.sttr_stock_type as 'sttr_stock_type',"
                                . "st.sttr_melting_status as 'sttr_melting_status',"
                                . "st.sttr_melting_date as 'sttr_melting_date',"
                                . "st.sttr_indicator as 'sttr_indicator',"
                                //
                                /* START CODE TO ADD CONDITIONS FOR FINAL QTY, WEIGHT FOR RETAIL REMAINING STOCK @AUTHOR:PRIYANKA-11JAN2022 */
                                //
                                . "(if((st.sttr_final_quantity IS NULL),st.sttr_quantity,st.sttr_final_quantity)) as 'sttr_quantity',"
                                . "(ROUND(if((st.sttr_final_gs_weight IS NULL),st.sttr_gs_weight,st.sttr_final_gs_weight),3)) as 'sttr_gs_weight',"
                                . "(ROUND(if((st.sttr_final_nt_weight IS NULL),st.sttr_nt_weight,st.sttr_final_nt_weight),3)) as 'sttr_nt_weight',"
                                . "(ROUND(if((st.sttr_final_fn_weight IS NULL),st.sttr_fine_weight,st.sttr_final_fn_weight),3)) as 'sttr_fine_weight',"
                                //
                                /* END CODE TO ADD CONDITIONS FOR FINAL QTY, WEIGHT FOR RETAIL REMAINING STOCK @AUTHOR:PRIYANKA-11JAN2022 */
                                // 
                                . "st.sttr_stone_wt as 'sttr_stone_wt',"
                                . "st.sttr_status as 'sttr_status',"
                                . "st.sttr_st_id as 'sttr_st_id',"
                                . "st.sttr_hallmark_uid as 'sttr_hallmark_uid' "
                                . "FROM stock_transaction as st "
                                . " WHERE $tempViewWhere ";
                        //
                        //
                        //echo '<br/>'.$createView; exit();
                        //
                        //
                        $sqlTable = 'DESC temp_view;';
                        //
                        //
                        mysqli_query($conn, $sqlTable);
                        //
                        if (mysqli_errno($conn) == 1146) {
                            mysqli_query($conn, $createView) or die('Query:' . $createView . '<br/> ERROR:' . mysqli_error($conn));
                        } else {
                            $dropView = "TRUNCATE table temp_view";
                            mysqli_query($conn, $dropView) or die('Query:' . $dropView . '<br/> ERROR:' . mysqli_error($conn));
                            $dropView = "DROP table temp_view";
                            mysqli_query($conn, $dropView) or die('Query:' . $dropView . '<br/> ERROR:' . mysqli_error($conn));
                            mysqli_query($conn, $createView) or die('Query:' . $createView . '<br/> ERROR:' . mysqli_error($conn));
                        }
                        //
                        //
                        //
                        //
                        // Data Table Main Columns @AUTHOR:PRIYANKA-03JAN2022
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
                            array('dt' => 'PUR RATE'),
                            array('dt' => 'BC NO'),
                            array('dt' => 'TYPE'),
                            array('dt' => 'STATUS')
                        );
                        //
                        //
                        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
                        //
                        //
                        // Table Parameters @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['tableName'] = 'temp_view as stock'; // Table Name
                        $_SESSION['tableNamePK'] = 'stock.sttr_id'; // Primary Key
                        //
                        //
                        //
                        // DB Table Columns Parameters @AUTHOR:PRIYANKA-03JAN2022
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
                            "stock.sttr_quantity",
                            "stock.sttr_gs_weight",
                            "stock.sttr_stone_wt",
                            "stock.sttr_nt_weight",
                            "CONCAT(stock.sttr_purity,' ','%')",
                            "stock.sttr_fine_weight",
                            "stock.sttr_metal_rate",
                            "CONCAT(stock.sttr_barcode_prefix,'',stock.sttr_barcode)",
                            "IF(stock.sttr_transaction_type='sell','Sold Out',IF(stock.sttr_transaction_type IN ('TAG','EXISTING'),IF(stock.sttr_melting_status IN ('Y','RFM','AFM','N'),'Melted',stock.sttr_transaction_type),stock.sttr_transaction_type))",
                            "stock.sttr_status"
                        );
                        //
                        //
                        //
                        //
                        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change @AUTHOR:PRIYANKA-03JAN2022
                        //
                        //
                        //$_SESSION['multipleColCounter'] = '';
                        //
                        //
                        //if ($_SESSION['sessionProdName'] == 'OMRETL') {
                        //    $_SESSION['dtSumColumn'] = '';
                        //} else {
                        $_SESSION['dtSumColumn'] = '9,10,11,12,14';
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
                        // Extra direct columns we need pass in SQL Query @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['sqlQueryColumns'] = "stock.sttr_id, stock.sttr_sttr_id, stock.sttr_add_date, stock.sttr_sttrin_id, stock.sttr_transaction_type, stock.sttr_quantity,";
                        //
                        //
//                            if ($transPanelDetailsDisplay != 'OutwardDetails') {
//                                //
//                                // Colorful column name
//                                //$_SESSION['colorfulColumn'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_gs_weight),sttr_gs_weight)";
//                                //$_SESSION['colorfulColumnCheck'] = 'sttr_gs_weight';
//                                //$_SESSION['colorfulColumnTitle'] = 'GS WT';
//                                //
//                                //
//                                $_SESSION['colorfulColumn4'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_quantity),sttr_quantity)"; // For Color Options Pass Column Name Here
//                                $_SESSION['colorfulColumn41'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_gs_weight),sttr_gs_weight)"; // For Color Options Pass Column Name Here
//                                $_SESSION['colorfulColumn42'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_nt_weight),sttr_nt_weight)"; // For Color Options Pass Column Name Here
//                                $_SESSION['colorfulColumn43'] = "if(sttr_transaction_type IN ('sell'),(-1*sttr_fine_weight),sttr_fine_weight)"; // For Color Options Pass Column Name Here
//                                $_SESSION['colorfulColumnCheck4'] = 'Y'; // Check this for Color + / - Value sh be 'Y'
//                                $_SESSION['colorfulColumnTitle4'] = '';
//                                $_SESSION['colorfulColumnCheck4Value'] = '';
//                                $_SESSION['colorfulColumnCheck4Value1'] = '';
//                                $_SESSION['colorfulColumnCheck4Value2'] = '';
//                            }
                        //
                        //
                        // On Click Function Parameters @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['onclickColumnImage'] = "";
                        $_SESSION['onclickColumn'] = "stock.sttr_item_category"; // On which column @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['onclickColumnId'] = "stock.sttr_id";
                        $_SESSION['onclickColumnValue'] = "stock.sttr_id";
                        $_SESSION['onclickColumnFunction'] = "stock.sttr_item_category";
                        $_SESSION['onclickColumnFunctionPara1'] = "stock.sttr_id";
                        $_SESSION['onclickColumnFunctionPara2'] = "";
                        $_SESSION['onclickColumnFunctionPara3'] = "";
                        $_SESSION['onclickColumnFunctionPara4'] = "";
                        $_SESSION['onclickColumnFunctionPara5'] = "";
                        $_SESSION['onclickColumnFunctionPara6'] = "";
                        //
                        //
                        // Delete Function Parameters @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['deleteColumn'] = ""; // On which column @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['deleteColumnId'] = "";
                        $_SESSION['deleteColumnValue'] = "";
                        $_SESSION['deleteColumnFunction'] = "";
                        $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['deleteColumnFunctionPara2'] = "";
                        $_SESSION['deleteColumnFunctionPara3'] = "";
                        $_SESSION['deleteColumnFunctionPara4'] = "";
                        $_SESSION['deleteColumnFunctionPara5'] = "";
                        $_SESSION['deleteColumnFunctionPara6'] = "";
                        //
                        //
                        // Where Clause Condition @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['tableWhere'] = " $whereStr ";
                        //
                        //
                        //echo 'tableWhere ==  ' . $_SESSION['tableWhere'];
                        //
                        //
                        // Table Joins @AUTHOR:PRIYANKA-03JAN2022
                        $_SESSION['tableJoin'] = " $tableJoin ";
                        //
                        //
                        $dataTableFooter = 'N';
                        //
                        //
                        // Data Table Main File @AUTHOR:PRIYANKA-03JAN2022
                        include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
                        //
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>