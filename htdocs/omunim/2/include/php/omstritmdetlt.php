<?php
/*
 * **************************************************************************************
 * @Description: STRLLERING STOCK ITEMS AUTHOR : DIKSHA 15DEC,2018
 * **************************************************************************************
 *
 * Created on 15DEC,2018 3:20:00 PM
 *
 * @FileName: omstritmdetlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMERP
 * @version 2.6.94
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 * Copyright 2018 SoftwareGen, Inc
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
include 'ommprspc.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
$panelName = $_GET['panelName'];
$metalType = $_GET['metalType'];
$itemCategory = $_GET['itemCategory'];
$itemName = $_GET['itemName'];
$stockType = $_GET['stockType'];
//echo '$panelName:'.$panelName;
//echo '$metalType:'.$metalType;

if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
    $stockDelete = 'Y';
} else {
    $stockDelete = 'N';
}
?>

<input type="hidden" id="stockDelete" name="stockDelete" value="<?php echo $stockDelete; ?>" />

<div id="jewelleryPanel">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="26px">
                            <img src="<?php echo $documentRoot; ?>/images/diamond-icon24.png" alt="Strllering Stock List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="200px">
                            <?php if ($panelName == 'StrelleringSilverList') { $_SESSION['dtPrintTitle'] = "STERLING STOCK LIST"; ?>
                                <div class="textLabelHeading">STERLING STOCK LIST </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td align="right" valign="middle" colspan="15">
                            <a style="cursor: pointer;" class="btn btn-xs default" onclick="navigateBackToStockStrItmPanel('<?php echo $documentRoot; ?>', 'StrelleringStock', '<?php echo $itemCategory; ?>', '<?php echo $itemName; ?>', '<?php echo $metalType; ?>');">
                                <i class="fa fa-angle-double-left"></i> BACK
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <?php
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
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
        
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
    /********* End Code To GET Firm Details **********/
    //Data Table Main Columns
    //
    include 'omdatatablesUnset.php';
    //
        $dataTableColumnsFields = array(
            array('dt' => 'PID'),
            array('dt' => 'ITEM ID'),
            array('dt' => 'ITEM NAME'),
            array('dt' => 'QTY'),
            array('dt' => 'GS WT'),
            array('dt' => 'COLOUR'),
            array('dt' => 'SHAPE'),
            array('dt' => 'CLARITY'),
            array('dt' => 'SELL RATE'),
            array('dt' => 'PUR RATE'),
            array('dt' => 'TAX'),
            array('dt' => 'TOTAL'),
            array('dt' => 'STATUS'),
            array('dt' => 'BARCODE'),
            array('dt' => 'DEL')
        );
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'stock_transaction as st'; // Table Name
    $_SESSION['tableNamePK'] = 'st.sttr_id'; // Primary Key
    // DB Table Columns Parameters 
    //
        $dbColumnsArray = array(
            "CONCAT(st.sttr_item_pre_id,COALESCE(st.sttr_item_id, ''))",
            "st.sttr_item_category",
            "st.sttr_item_name",
            "(IFNULL(SUM(distinct(st.sttr_quantity)), 0) - IFNULL(SUM(s.sttr_quantity), 0))",
            "(IFNULL(SUM(distinct(st.sttr_gs_weight)), 0) - IFNULL(SUM(s.sttr_gs_weight), 0))",
            "st.sttr_color",
            "st.sttr_shape",
            "st.sttr_clarity",
            "st.sttr_sell_rate",
            "st.sttr_purchase_rate",
            "st.sttr_tax",
            "st.sttr_final_valuation",
            "st.sttr_status",
            "st.sttr_st_id",
            "st.sttr_id"
        );
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '3,4,10,11';
    $_SESSION['dtDeleteColumn'] = '14';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st.sttr_id,";
    //
    // On Click Function Parameters
    //
    //
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "CONCAT(st.sttr_item_pre_id,COALESCE(st.sttr_item_id, ''))"; // On which column
    $_SESSION['onclickColumnId'] = "st.sttr_id";
    $_SESSION['onclickColumnValue'] = "st.sttr_id";
    $_SESSION['onclickColumnFunction'] = "showStockItemDetailsGeneralDiv";
    $_SESSION['onclickColumnFunctionPara1'] = "st.sttr_id";
    $_SESSION['onclickColumnFunctionPara2'] = "st.sttr_stock_type";
    $_SESSION['onclickColumnFunctionPara3'] = "StrelleringSilverList";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    //
    // On Print Function Parameters
    //
    $_SESSION['onprintColumnImage'] = "tag16.png";
    $_SESSION['onprintColumn'] = "st.sttr_st_id"; // On which column
    $_SESSION['onprintColumnId'] = "st.sttr_id";
    $_SESSION['onprintColumnValue'] = "st.sttr_id";
    $_SESSION['onprintColumnFunction'] = "addImitationItemTag";
    $_SESSION['onprintColumnFunctionPara1'] = "";
    $_SESSION['onprintColumnFunctionPara2'] = "st.sttr_id";
    $_SESSION['onprintColumnFunctionPara3'] = "";
    $_SESSION['onprintColumnFunctionPara4'] = "";
    $_SESSION['onprintColumnFunctionPara5'] = "";
    $_SESSION['onprintColumnFunctionPara6'] = "";
    //
    // Delete Function Parameters
    $_SESSION['deleteColumn'] = "st.sttr_id"; // On which column
    $_SESSION['deleteColumnId'] = "st.sttr_id";
    $_SESSION['deleteColumnValue'] = "st.sttr_id";
    $_SESSION['deleteColumnFunction'] = "deleteCrystalStockList";
    $_SESSION['deleteColumnFunctionPara1'] = "StrelleringSilverList"; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "st.sttr_id";
    $_SESSION['deleteColumnFunctionPara3'] = "st.sttr_stock_type";  
    $_SESSION['deleteColumnFunctionPara4'] = "st.sttr_item_category";
    $_SESSION['deleteColumnFunctionPara5'] = "st.sttr_metal_type";
    $_SESSION['deleteColumnFunctionPara6'] = "st.sttr_item_name";
    //
    // Extra direct columns we need pass in SQL Query
    // 
    $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_status NOT IN ('DELETED','TAG') and st.sttr_indicator IN ('strsilver') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
    // 
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id=f.firm_id"
                           . " LEFT JOIN stock_transaction AS s ON s.sttr_sttr_id=st.sttr_id AND s.sttr_status='PaymentDone' AND s.sttr_transaction_type='sell'";
    //
    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>