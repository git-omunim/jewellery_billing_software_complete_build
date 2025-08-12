<?php
/*
 * **************************************************************************************
 * @tutorial: DELETED STOCK LIST @PRIYANKA-07FEB2022
 * **************************************************************************************
 * @FileName: omStockMismatchDeletedStockList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.122
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
<div id="deletedStockListDiv">
    <table width="100%" border="0">
        <tr></tr>
        <tr></tr>
        <tr>          
            <td valign="top" align="left" >
                <a class="links" onclick=""
                   style="cursor: pointer;" title="Click to refresh current page !">
                    <div class="textLabelHeading">
                        DELETED STOCK LIST
                    </div>
                </a>                        
            </td>
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
    /******* End Code To GET Firm Details ********* */
    //
    //
    include 'omdatatablesUnset.php';
    //
    //
    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        //
        // Data Table Main Columns
        $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'NO'),
            array('dt' => 'DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'PROD TYPE'),
            array('dt' => 'SIZE'),
            array('dt' => 'COUNTER'),
            array('dt' => 'PROD DET'),
            array('dt' => 'QTY'),
            array('dt' => 'STOCK TYPE'),
            array('dt' => 'STATUS'),
            array('dt' => 'TAG'),
            array('dt' => 'DEL'),
            array('dt' => 'OTHER INFO'));
        //
    } else {
        //
        // Data Table Main Columns
        $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'DATE'),
            array('dt' => 'DEL DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'METAL'),
            array('dt' => 'SIZE'),
            array('dt' => 'WASTAGE'),
            array('dt' => 'ITEM DET'),
            array('dt' => 'QTY'),
            array('dt' => 'GS WT'),
            array('dt' => 'NT WT'),
            array('dt' => 'FN WT'),
            array('dt' => 'TYPE'),
            array('dt' => 'STATUS'),
            array('dt' => 'OTHER INFO'),
            array('dt' => 'DEL'),
            array('dt' => 'REACTIVE'),
        );
        //
    }
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    //
    // Table Parameters
    $_SESSION['tableName'] = 'stock_transaction_del'; // Table Name
    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
    //
    //
    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        //
        // DB Table Columns Parameters 
        $dbColumnsArray = array(
            "CONCAT(sttr_id)",
            "sttr_st_id",
            "sttr_add_date",
            "sttr_firm_id",
            "sttr_metal_type",
            "sttr_size",
            "sttr_quantity",
            "sttr_item_name",
            "sttr_status",
            "sttr_tax",
            "sttr_price",
            "sttr_stock_type",
            "sttr_id",
            "sttr_item_other_info"
        );
    } else {
        //
        // DB Table Columns Parameters 
        $dbColumnsArray = array(
            "CONCAT(sttr_item_pre_id,sttr_item_id)",
            "sttr_add_date",
            "sttr_del_date",
            "f.firm_name",
            "sttr_metal_type",
            "sttr_size",
            "sttr_wastage",
            "sttr_item_name",
            "sttr_quantity",
            "ROUND(sttr_gs_weight,3)", // CHANGE TO 3 DECIMAL POINT 
            "ROUND(sttr_nt_weight,3)", // CHANGE TO 3 DECIMAL POINT 
            "ROUND(sttr_fine_weight,3)", // CHANGE TO 3 DECIMAL POINT 
            "sttr_stock_type",
            "sttr_status",
            "sttr_item_other_info",
            "sttr_id", // ADD OPTION FOR DELETE OPTION 
            "sttr_sttr_id", // ADD OPTION FOR REACTIVE OPTION 
        );
    }
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    //
    $_SESSION['sqlQueryColumns'] = "sttr_id,";
    //
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
    //
    //
    // start code to include all session
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    //
    // On Click Function Parameters
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
    // FOR ADD REACTIVE DELETED STOCK LIST ITEM @PRIYANKA-07FEB2022
    //
    //
    $_SESSION['onprintColumnImage'] = "active.png";
    $_SESSION['onprintColumn'] = "sttr_sttr_id"; // On which column
    $_SESSION['onprintColumnId'] = "sttr_sttr_id";
    $_SESSION['onprintColumnValue'] = "sttr_sttr_id";
    $_SESSION['onprintColumnFunction'] = "addDeletedStockInToAvailableStock";
    $_SESSION['onprintColumnFunctionPara1'] = "sttr_id";
    $_SESSION['onprintColumnFunctionPara2'] = "";
    $_SESSION['onprintColumnFunctionPara3'] = "StockMismatchDeletedStockList";
    $_SESSION['onprintColumnFunctionPara4'] = "reactive";
    $_SESSION['onprintColumnFunctionPara5'] = "";
    $_SESSION['onprintColumnFunctionPara6'] = "";
    //
    //
    // FOR DELETE DELETED STOCK @PRIYANKA-07FEB2022
    $_SESSION['deleteColumn'] = "sttr_id"; // On which column
    $_SESSION['deleteColumnId'] = "sttr_id";
    $_SESSION['deleteColumnValue'] = "sttr_id";
    $_SESSION['deleteColumnFunction'] = "deletedStockListFunc";
    $_SESSION['deleteColumnFunctionPara1'] = "StockMismatchDeletedStockList "; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
    $_SESSION['deleteColumnFunctionPara3'] = "sttr_metal_type";
    $_SESSION['deleteColumnFunctionPara4'] = "sttr_item_name";
    $_SESSION['deleteColumnFunctionPara5'] = "delete";
    $_SESSION['deleteColumnFunctionPara6'] = "";
    //
    //
    // Extra direct columns we need pass in SQL Query @PRIYANKA-07FEB2022
    $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) "
                            . "and sttr_transaction_type IN ('PURONCASH','PURBYSUPP','EXISTING','TAG') "
                            . "and sttr_status IN ('DELETED','NotDelFromStock')";
    //
    //
    // Table Joins @PRIYANKA-07FEB2022
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id";
    //
    //
    //
    // Data Table Main File @PRIYANKA-07FEB2022
    include 'omdatatables.php';
    //
    //
    ?>
</div>