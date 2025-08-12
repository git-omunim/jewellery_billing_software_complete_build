<?php
/*
 * ********************************************************************************************************
 * @tutorial: STOCK RFID STOCK TALLY SUMMARY OPENING ALL TRANSACTIONS REPORT @AUTHOR:YUVRAJKAMBLE-25NOV2022
 * ********************************************************************************************************
 * 
 * Created on JAN 03, 2022 01:30:08 PM
 *
 * @FileName: C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockTallyRfidSummaryOpeningAllTransReport.php
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
 *  AUTHOR: @AUTHOR:YUVRAJKAMBLE-25NOV2022
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
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.rfidtly_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.rfidtly_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
} else {
    //
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.rfidtly_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(st.rfidtly_add_date,'%d %b %Y'))<=$todayFromStrDate ";
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
                            <td align="left" width="50%">OPENING STOCK TRANSACTIONS RFID TALLY REPORT</td>
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
                        // Set String for Public Firms @AUTHOR:YUVRAJKAMBLE-25NOV2022
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
                        $dateStrForOp = "UNIX_TIMESTAMP(STR_TO_DATE(st.rfidtly_add_date,'%d %b %Y'))<$todayFromStrDate";
                        //
                        //
                        // Table Where @AUTHOR:YUVRAJKAMBLE-17JAN2022
                        $whereStr =  " stock.rfidtly_id NOT IN "
                                   . "(SELECT sttr.rfidtly_id FROM temp_view as sttr "
                                   . " WHERE sttr.rfidtly_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
//                                   . " AND sttr.rfidtly_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "
                                   . " AND sttr.rfidtly_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
                                   . " AND UNIX_TIMESTAMP(STR_TO_DATE(sttr.rfidtly_add_date,'%d %b %Y'))<$todayFromStrDate "
                                   . " AND sttr.rfidtly_product_category = '$Category' "
                                   . " AND sttr.rfidtly_product_name = '$transName' "
                                   . " AND sttr.rfidtly_purity = '$transPurity' "
                                   . " AND sttr.rfidtly_stock_type = 'retail') "
                                   . " AND stock.rfidtly_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'ItemReturn') "
                                   . " AND stock.rfidtly_transaction_type IN ('EXISTING', 'PURONCASH', 'PURBYSUPP', 'TAG', 'ItemReturn') ";
                        //
                        //
                        //echo '<br/>$whereStr:' . $whereStr; die;
                        //
                        //
                        // Table Temp View Where @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $tempViewWhere = " st.rfidtly_firm_id IN ($strFrmId) "
//                                    . "AND st.rfidtly_status NOT IN ('DELETED', 'ApprovalDone') "
                                    . "AND ( $dateStrForOp ) "                                
                                    . "AND st.rfidtly_product_category = '$Category' "
                                    . "AND st.rfidtly_product_name = '$transName' "
                                    . "AND st.rfidtly_purity = '$transPurity' "
                                    . "AND st.rfidtly_stock_type = 'retail' ";
                        //
                        //
                        //echo '<br/>$viewWhere:' . $viewWhere; die;
                        //
                        //
                        // Table Joins @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $viewJoin = " INNER JOIN firm AS f ON stock.rfidtly_firm_id=f.firm_id ";
                        //
                        //
                        //
                        //
                        $createView = "CREATE table temp_view AS "
                                . "SELECT st.rfidtly_id as 'rfidtly_id',"
                                . "st.rfidtly_transaction_type as 'rfidtly_transaction_type',"
//                                . "st.rfidtly_id as 'rfidtly_id',"
                                . "st.rfidtly_firm_id as 'rfidtly_firm_id',"
//                                . "st.rfidtly_sttrin_id as 'rfidtly_sttrin_id',"
                                . "st.rfidtly_add_date as 'rfidtly_add_date',"
//                                . "st.rfidtly_item_pre_id as 'rfidtly_item_pre_id',"
//                                . "st.rfidtly_item_id as 'rfidtly_item_id',"
//                                . "st.rfidtly_barcode_prefix as 'rfidtly_barcode_prefix',"
//                                . "st.rfidtly_barcode as 'rfidtly_barcode',"
                                . "st.rfidtly_metal_type as 'rfidtly_metal_type',"
//                                . "st.rfidtly_metal_rate as 'rfidtly_metal_rate',"
                                . "st.rfidtly_purity as 'rfidtly_purity',"
//                                . "st.rfidtly_product_purchase_rate as 'rfidtly_product_purchase_rate',"
//                                . "st.rfidtly_item_model_no as 'rfidtly_item_model_no',"
                                . "st.rfidtly_product_category as 'rfidtly_product_category',"
                                . "st.rfidtly_product_name as 'rfidtly_product_name',"
                                . "st.rfidtly_stock_type as 'rfidtly_stock_type',"
                                . "st.rfidtly_indicator as 'rfidtly_indicator' "
                                //
                                /* START CODE TO ADD CONDITIONS FOR FINAL QTY, WEIGHT FOR RETAIL REMAINING STOCK @AUTHOR:YUVRAJKAMBLE-11JAN2022 */
                                . "FROM rfid_tally as st "
                                . " WHERE $tempViewWhere ";
                        //
                        //
                        //echo $createView; exit();
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
                        // Data Table Main Columns @AUTHOR:YUVRAJKAMBLE-25NOV2022
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
                            array('dt' => 'BC NO')
                        );
                        //
                        //
                        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
                        //
                        //
                        // Table Parameters @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['tableName'] = 'temp_view as stock'; // Table Name
                        $_SESSION['tableNamePK'] = 'stock.rfidtly_id'; // Primary Key
                        //
                        //
                        //
                        // DB Table Columns Parameters @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $dbColumnsArray = array(
                            "stock.rfidtly_add_date",
                            "stock.rfidtly_item_pre_id",
                            "CAST(stock.rfidtly_item_id AS UNSIGNED)",
                            "f.firm_name",
                            "stock.rfidtly_metal_type",
//                            "stock.rfidtly_hallmark_uid",
                            "stock.rfidtly_product_category",
                            "stock.rfidtly_product_name",
                            "stock.rfidtly_stock_type",
                            "stock.rfidtly_quantity",
                            "stock.rfidtly_gs_weight",
//                            "stock.rfidtly_stone_wt",
                            "stock.rfidtly_nt_weight",
//                            "CONCAT(stock.rfidtly_purity,' ','%')",
                            "stock.rfidtly_fine_weight",
                            "stock.rfidtly_metal_rate"
//                            "CONCAT(stock.rfidtly_barcode_prefix,'',stock.rfidtly_barcode"
                            . ")"
                        );
                        //
                        //
                        //
                        //
                        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change @AUTHOR:YUVRAJKAMBLE-25NOV2022
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
                        // Extra direct columns we need pass in SQL Query @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['sqlQueryColumns'] = "stock.rfidtly_id, stock.rfidtly_id, stock.rfidtly_add_date, stock.rfidtly_transaction_type, stock.rfidtly_quantity,";
                        //
                        //
                        // On Click Function Parameters @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['onclickColumnImage'] = "";
                        $_SESSION['onclickColumn'] = "stock.rfidtly_product_category"; // On which column @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['onclickColumnId'] = "stock.rfidtly_id";
                        $_SESSION['onclickColumnValue'] = "stock.rfidtly_id";
                        $_SESSION['onclickColumnFunction'] = "stock.rfidtly_product_category";
                        $_SESSION['onclickColumnFunctionPara1'] = "stock.rfidtly_id";
                        $_SESSION['onclickColumnFunctionPara2'] = "";
                        $_SESSION['onclickColumnFunctionPara3'] = "";
                        $_SESSION['onclickColumnFunctionPara4'] = "";
                        $_SESSION['onclickColumnFunctionPara5'] = "";
                        $_SESSION['onclickColumnFunctionPara6'] = "";
                        //
                        //
                        // Delete Function Parameters @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['deleteColumn'] = ""; // On which column @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['deleteColumnId'] = "";
                        $_SESSION['deleteColumnValue'] = "";
                        $_SESSION['deleteColumnFunction'] = "";
                        $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['deleteColumnFunctionPara2'] = "";
                        $_SESSION['deleteColumnFunctionPara3'] = "";
                        $_SESSION['deleteColumnFunctionPara4'] = "";
                        $_SESSION['deleteColumnFunctionPara5'] = "";
                        $_SESSION['deleteColumnFunctionPara6'] = "";
                        //
                        //
                        // Where Clause Condition @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        //$_SESSION['tableWhere'] = " $whereStr ";
                        //
                        //
                        //echo 'tableWhere ==  ' . $_SESSION['tableWhere'];
                        //
                        //
                        // Table Joins @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        $_SESSION['tableJoin'] = " $viewJoin ";
                        //
                        //
                        $dataTableFooter = 'N';
                        //
                        //
                        // Data Table Main File @AUTHOR:YUVRAJKAMBLE-25NOV2022
                        include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
                        //
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>