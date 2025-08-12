<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK RFID TALLY SUMMARY OPENING ALL TRANSACTIONS REPORT @AUTHOR:YUVRAJ KAMBLE-25NOV2022
 * **************************************************************************************
 * 
 * Created on JAN 03, 2022 01:30:08 PM
 *
 * @FileName: C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockRfidTallySummaryOpeningAllTransReport.php
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
 *  AUTHOR: @AUTHOR:YUVRAJ KAMBLE-25NOV2022
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
//    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    $dateStrForOpenings = " UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
} else {
    //
    $dateStrForOpenings = " UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
//    $dateRangeStrForOpenings = " UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
//    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate ";
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
                            <td align="left" width="50%">OPENING RFID TALLY STOCK TRANSACTIONS</td> 
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
                        // Set String for Public Firms @AUTHOR:YUVRAJ KAMBLE-25NOV2022
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
//                        $dateStrForOp = "UNIX_TIMESTAMP(STR_TO_DATE(st.rfidtly_scan_date,'%d %b %Y'))<$todayFromStrDate";
                        //
                        $whereStr = " stock.rfidtly_status IN ('T') "
                        . " AND stock.rfidtly_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
//                        . " AND UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate "
//                        . " AND UNIX_TIMESTAMP(STR_TO_DATE(stock.rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate "
                        . " AND stock.rfidtly_product_category = '$Category' "
                        . " AND $dateStrForOpenings "
                        . " AND stock.rfidtly_product_name = '$transName' "
                        . " AND stock.rfidtly_stock_type IN ('retail') "
                        . " AND stock.rfidtly_reporting_preiod IN ('DONE') "
                        . " AND stock.rfidtly_open_report IN ('Y') "
                        . " AND stock.rfidtly_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'ItemReturn') "
                        . " AND stock.rfidtly_transaction_type IN ('EXISTING', 'PURONCASH', 'PURBYSUPP', 'TAG', 'ItemReturn')";
                        //
//                        echo $whereStr;
                        // Data Table Main Columns @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        include $_SESSION['documentRootIncludePhp'] . 'omdatatablesUnset.php';
                        //
                        //
                        $dataTableColumnsFields = array(
                            array('dt' => 'DATE'),
                            array('dt' => 'P CODE'),
                            array('dt' => 'FIRM'),
                            array('dt' => 'METAL'),
                            array('dt' => 'CATEGORY'),
                            array('dt' => 'NAME'),
                            array('dt' => 'TYPE'),
                            array('dt' => 'QTY'),
                            array('dt' => 'GS WT'),
                            array('dt' => 'NT WT'),
                            array('dt' => 'PURITY'),
                            array('dt' => 'FN WT')
                        );
                        //
                        //
                        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
                        //
                        //
                        // Table Parameters @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['tableName'] = 'rfid_tally as stock'; // Table Name
                        $_SESSION['tableNamePK'] = 'stock.rfidtly_id'; // Primary Key
                        //
                        //
                        //
                        // DB Table Columns Parameters @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $dbColumnsArray = array(
                            "stock.rfidtly_scan_date",
                            "stock.rfidtly_product_code",
                            "stock.rfidtly_firm_id",
                            "stock.rfidtly_metal_type",
                            "stock.rfidtly_product_category",
                            "stock.rfidtly_product_name",
                            "stock.rfidtly_stock_type",
                            "stock.rfidtly_quantity",
                            "stock.rfidtly_gs_weight",
                            "stock.rfidtly_nt_weight",
                            "stock.rfidtly_purity",
                            "stock.rfidtly_fine_weight"
                        );
                        //
                        //
                        //
                        //
                        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        //
                       
                        $_SESSION['dtSumColumn'] = '';
                      
                        $_SESSION['dtSortColumn'] = '';
                        $_SESSION['dtASCDESC'] = '';
                        //
                        //
                        //$_SESSION['dtDeleteColumn'] = '';
                        //
                        //
                        // Extra direct columns we need pass in SQL Query @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['sqlQueryColumns'] = "stock.rfidtly_id, stock.rfidtly_transaction_type, ";
                        //
                        //
                        // On Click Function Parameters @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['onclickColumnImage'] = "";
                        $_SESSION['onclickColumn'] = ""; // On which column @AUTHOR:YUVRAJ KAMBLE-25NOV2022
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
                        // Delete Function Parameters @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['deleteColumn'] = ""; // On which column @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['deleteColumnId'] = "";
                        $_SESSION['deleteColumnValue'] = "";
                        $_SESSION['deleteColumnFunction'] = "";
                        $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['deleteColumnFunctionPara2'] = "";
                        $_SESSION['deleteColumnFunctionPara3'] = "";
                        $_SESSION['deleteColumnFunctionPara4'] = "";
                        $_SESSION['deleteColumnFunctionPara5'] = "";
                        $_SESSION['deleteColumnFunctionPara6'] = "";
                        //
                        //
                        // Where Clause Condition @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        $_SESSION['tableWhere'] = " $whereStr ";
                        //
                        //
//                        echo 'tableWhere ==  ' . $_SESSION['tableWhere'];
                        //
                        //
                        // Table Joins @AUTHOR:YUVRAJ KAMBLE-25NOV2022
//                        $_SESSION['tableJoin'] = " $viewJoin ";
                        //
                        //
                        $dataTableFooter = 'N';
                        //
                        //
                        // Data Table Main File @AUTHOR:YUVRAJ KAMBLE-25NOV2022
                        include $_SESSION['documentRootIncludePhp'] . 'omdatatables.php';
                        //
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>