<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK FIRM CHANGE @PRIYANKA-28FEB2022
 * **************************************************************************************
 * @FileName: omStockMismatchStockFirmChange.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.128
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<div id="stockFirmChangeDiv">
    <?php
    //
    $messageDisplay = $_REQUEST['messageDisplay'];
    //
    ?>
    <table width="100%" border="0">
        <tr></tr>
        <tr></tr>
        <tr>          
            <td valign="top" align="left" >
                <a class="links" onclick=""
                   style="cursor: pointer;" title="Click to refresh current page !">
                    <div class="textLabelHeading">STOCK WRONG FIRM</div>
                </a>                        
            </td>
            <?php if ($messageDisplay == 'StockFirmChangeSuccessfully') { ?>
            <td class="portlet-title caption" >
                <div class="main_link_green18" 
                     style="margin-left: 10px;font-weight:bold;">
                    Stock Firm Updated Successfully!
                </div>
            </td>
            <?php } ?>
        </tr>
    </table>
    <?php
    //
    /***** Start Code To GET Firm Details ********* */
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm
        $selFirmId = $_SESSION['setFirmSession'];
    }
    //
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    //
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
    /******* End Code To GET Firm Details ********* */
    //
    //
    include 'omdatatablesUnset.php';
    //
    //   
    $dataTableColumnsFields = array(
            array('dt' => 'ADD FIRM'),
            array('dt' => 'SELL FIRM'),
            array('dt' => 'PID'),
            array('dt' => 'METAL'),
            array('dt' => 'CATEGORY'),
            array('dt' => 'NAME'),    
            array('dt' => 'QTY'),
            array('dt' => 'GS WT'),
            array('dt' => 'NT WT'),
            array('dt' => 'PURITY'),
            array('dt' => 'FN WT'),
            array('dt' => 'TYPE'),
            array('dt' => 'DEL')
    );
    //
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    //
    // Table Parameters @PRIYANKA-28FEB2022
    $_SESSION['tableName'] = 'stock_transaction as sell'; // Table Name
    $_SESSION['tableNamePK'] = 'sell.sttr_id'; // Primary Key
    //
    //
    $dbColumnsArray = array(
            "f.firm_name",
            "s.firm_name",
            "CONCAT(sell.sttr_item_pre_id,'',sell.sttr_item_id)",
            "sell.sttr_metal_type",
            "sell.sttr_item_category",
            "sell.sttr_item_name",
            "sell.sttr_quantity",
            "sell.sttr_gs_weight",
            "sell.sttr_nt_weight",
            "sell.sttr_purity",
            "sell.sttr_fine_weight",
            "sell.sttr_stock_type",
            "sell.sttr_id"
    );
    //
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    //
    $_SESSION['sqlQueryColumns'] = "sell.sttr_id, sell.sttr_sttr_id, sell.sttr_firm_id, sell.sttr_metal_type,"
                                 . "sell.sttr_item_category, sell.sttr_item_name, sell.sttr_purity,"
                                 . "sell.sttr_recreate_status, sell.sttr_stock_type, sell.sttr_indicator, sell.sttr_transaction_type,";
    //
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
    //
    //
    // Start code to include all session @PRIYANKA-28FEB2022
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    //
    //
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
    // On Click Function Parameters @PRIYANKA-28FEB2022
    //$_SESSION['onclickColumnImage'] = "";
    //$_SESSION['onclickColumn'] = "sell.sttr_item_category"; // On which column
    //$_SESSION['onclickColumnId'] = "sell.sttr_item_category";
    //$_SESSION['onclickColumnValue'] = "sell.sttr_item_category";
    //$_SESSION['onclickColumnFunction'] = "stockMismatchStockFirmChangeFunc";
    //$_SESSION['onclickColumnFunctionPara1'] = "sell.sttr_id";
    //$_SESSION['onclickColumnFunctionPara2'] = "sell.sttr_firm_id";
    //$_SESSION['onclickColumnFunctionPara3'] = "StockMismatchStockFirmChange";
    //$_SESSION['onclickColumnFunctionPara4'] = "";
    //$_SESSION['onclickColumnFunctionPara5'] = "";
    //$_SESSION['onclickColumnFunctionPara6'] = "";
    //
    //
    // FOR STOCK RECREATION @PRIYANKA-28FEB2022
    //$_SESSION['onprintColumnImage'] = "active.png";
    //$_SESSION['onprintColumn'] = "sttr_item_category"; // On which column
    //$_SESSION['onprintColumnId'] = "sttr_item_category";
    //$_SESSION['onprintColumnValue'] = "sttr_item_category";
    //$_SESSION['onprintColumnFunction'] = "stockMismatchStockRecreationFunc";
    //$_SESSION['onprintColumnFunctionPara1'] = "sttr_id";
    //$_SESSION['onprintColumnFunctionPara2'] = "sttr_firm_id";
    //$_SESSION['onprintColumnFunctionPara3'] = "StockMismatchStockFirmChange";
    //$_SESSION['onprintColumnFunctionPara4'] = "";
    //$_SESSION['onprintColumnFunctionPara5'] = "";
    //$_SESSION['onprintColumnFunctionPara6'] = "";
    //
    //
    //
    if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
        $stockDelete = 'Y';
    } else {
        $stockDelete = 'N';
    }
    //
    //
    // FOR DELETE @PRIYANKA-02MAR2022
    $_SESSION['deleteColumn'] = "sell.sttr_id"; // On which column
    $_SESSION['deleteColumnId'] = "sell.sttr_id";
    $_SESSION['deleteColumnValue'] = "sell.sttr_id";
    $_SESSION['deleteColumnFunction'] = "deleteStockFirmChangeSellStock";
    $_SESSION['deleteColumnFunctionPara1'] = "StockFirmChangePanel"; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "sell.sttr_id";
    $_SESSION['deleteColumnFunctionPara3'] = "sell.sttr_user_id";
    $_SESSION['deleteColumnFunctionPara4'] = $stockDelete;
    $_SESSION['deleteColumnFunctionPara5'] = "sell.sttr_indicator";
    $_SESSION['deleteColumnFunctionPara6'] = "sell.sttr_transaction_type";
    //
    //
    // Extra direct columns we need pass in SQL Query @PRIYANKA-28FEB2022
    $_SESSION['tableWhere'] = " sell.sttr_firm_id != stock.sttr_firm_id
                                and stock.sttr_indicator NOT IN ('stockCrystal')
                                and stock.sttr_transaction_type IN ('PURONCASH', 'TAG', 'EXISTING')
                                and sell.sttr_indicator NOT IN ('stockCrystal')
                                and (sell.sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL')
                                and  sell.sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone')
                                and (sell.sttr_sell_status NOT IN ('RETURNED') OR sell.sttr_sell_status IS NULL)) ";
    //
    //
    // Table Joins @PRIYANKA-28FEB2022
    $_SESSION['tableJoin'] = " INNER JOIN firm AS s ON sell.sttr_firm_id = s.firm_id "
                           . " INNER JOIN stock_transaction stock ON sell.sttr_sttr_id = stock.sttr_id "
                           . " INNER JOIN firm AS f ON stock.sttr_firm_id = f.firm_id  ";
    //
    //
    //
    // Data Table Main File @PRIYANKA-28FEB2022
    include 'omdatatables.php';
    //
    //
    ?>
</div>