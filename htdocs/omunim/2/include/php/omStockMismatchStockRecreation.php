<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK RECREATION @PRIYANKA-11FEB2022
 * **************************************************************************************
 * @FileName: omStockMismatchStockRecreation.php
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
<div id="stockRecreationDiv">
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
                    <div class="textLabelHeading">STOCK RECREATION</div>
                </a>                        
            </td>
            <?php if ($messageDisplay == 'StockRecreatedSuccessfully') { ?>
            <td class="portlet-title caption" >
                <div class="main_link_green18" 
                     style="margin-left: 10px;font-weight:bold;">
                    Stock Recreated Successfully!
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
    $dataTableColumnsFields = array(
            array('dt' => 'FIRM'),
            array('dt' => 'METAL'),
            array('dt' => 'CATEGORY'),
            array('dt' => 'NAME'),            
            array('dt' => 'PURITY'),
            array('dt' => 'TYPE')
    );
    //
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    //
    // Table Parameters @PRIYANKA-11FEB2022
    $_SESSION['tableName'] = 'stock_transaction'; // Table Name
    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
    //
    //
    $dbColumnsArray = array(
            "f.firm_name",
            "sttr_metal_type",
            "sttr_item_category",
            "sttr_item_name",
            "sttr_purity",
            "sttr_stock_type" 
    );
    //
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    //
    $_SESSION['sqlQueryColumns'] = "sttr_id,sttr_sttr_id,sttr_firm_id,sttr_metal_type,sttr_item_category,sttr_item_name,sttr_purity,"
                                 . "sttr_recreate_status,sttr_stock_type,sttr_indicator,sttr_transaction_type,";
    //
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
    //
    //
    // Start code to include all session @PRIYANKA-11FEB2022
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    //
    //
    // On Click Function Parameters @PRIYANKA-11FEB2022
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "sttr_item_category"; // On which column
    $_SESSION['onclickColumnId'] = "sttr_item_category";
    $_SESSION['onclickColumnValue'] = "sttr_item_category";
    $_SESSION['onclickColumnFunction'] = "stockMismatchStockRecreationFunc";
    $_SESSION['onclickColumnFunctionPara1'] = "sttr_id";
    $_SESSION['onclickColumnFunctionPara2'] = "sttr_firm_id";
    $_SESSION['onclickColumnFunctionPara3'] = "StockMismatchStockRecreation";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    //
    //
    // FOR STOCK RECREATION @PRIYANKA-11FEB2022
    //$_SESSION['onprintColumnImage'] = "active.png";
    //$_SESSION['onprintColumn'] = "sttr_item_category"; // On which column
    //$_SESSION['onprintColumnId'] = "sttr_item_category";
    //$_SESSION['onprintColumnValue'] = "sttr_item_category";
    //$_SESSION['onprintColumnFunction'] = "stockMismatchStockRecreationFunc";
    //$_SESSION['onprintColumnFunctionPara1'] = "sttr_id";
    //$_SESSION['onprintColumnFunctionPara2'] = "sttr_firm_id";
    //$_SESSION['onprintColumnFunctionPara3'] = "StockMismatchStockRecreation";
    //$_SESSION['onprintColumnFunctionPara4'] = "";
    //$_SESSION['onprintColumnFunctionPara5'] = "";
    //$_SESSION['onprintColumnFunctionPara6'] = "";
    //
    //
    //
    // FOR DELETE @PRIYANKA-11FEB2022
    $_SESSION['deleteColumn'] = ""; // On which column
    $_SESSION['deleteColumnId'] = "";
    $_SESSION['deleteColumnValue'] = "";
    $_SESSION['deleteColumnFunction'] = "";
    $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "";
    $_SESSION['deleteColumnFunctionPara3'] = "";
    $_SESSION['deleteColumnFunctionPara4'] = "";
    $_SESSION['deleteColumnFunctionPara5'] = "";
    $_SESSION['deleteColumnFunctionPara6'] = "";
    //
    //
    // Extra direct columns we need pass in SQL Query @PRIYANKA-11FEB2022
    $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) "
                            . "AND sttr_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') "
                            . "AND sttr_indicator NOT IN ('stockCrystal') "
                            . "AND sttr_recreate_status = 'YES' "
                            . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, "
                            . "sttr_metal_type, sttr_purity";
    //
    //
    // Table Joins @PRIYANKA-11FEB2022
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id";
    //
    //
    //
    // Data Table Main File @PRIYANKA-11FEB2022
    include 'omdatatables.php';
    //
    //
    ?>
</div>