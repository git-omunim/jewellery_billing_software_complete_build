<?php
/*
 * **************************************************************************************
 * @Description: FINE STOCK ITEMS @Author:PRIYANKA-05-07-17
 * **************************************************************************************
 *
 * Created on JULY 05, 2017 06:29:36 PM
 *
 * @FileName: omstocitmlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMERP
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
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
//
$panelName = $_GET['panelName'];
$metalType = $_GET['metalType'];
$itemCategory = $_GET['itemCategory'];
$itemName = $_GET['itemName'];
$stockType = $_GET['stockType'];
$stockPurity = $_GET['stockPurity'];
//
//echo '$panelName @: ' . $panelName . '<br />';
//echo '$metalType @: ' . $metalType . '<br />';
//echo '$stockPurity @: ' . $stockPurity . '<br />';
//
?>
<div id="stockPanelSubDiv">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="26px">
                            <img src="<?php echo $documentRoot; ?>/images/addGold24.png" alt="Stock Purchase List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="200px">                            
                            <?php
                            if ($panelName == 'FineStock' && ($metalType == 'Gold' || $metalType == 'gold' ||
                                    $metalType == 'GOLD')) {
                                $_SESSION['dtPrintTitle'] = "GOLD STOCK LIST";
                                ?>
                                <div class="textLabelHeading">GOLD STOCK LIST </div>
                                <?php
                            } else if ($panelName == 'FineStock' && ($metalType == 'Silver' ||
                                    $metalType == 'silver' || $metalType == 'SILVER')) {
                                $_SESSION['dtPrintTitle'] = "SILVER STOCK LIST";
                                ?>
                                <div class="textLabelHeading">SILVER STOCK LIST </div>
                                <?php
                            } else {
                                $_SESSION['dtPrintTitle'] = "GOLD SILVER STOCK LIST";
                                ?>
                                <div class="textLabelHeading">ALL STOCK LIST </div>
                            <?php } ?>

                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td align="right" valign="middle" colspan="15">
                            <a style="cursor: pointer;" class="btn btn-xs default" onclick="navigateBackToStockItmPanel('<?php echo $documentRoot; ?>', 'stock', '', '', '<?php echo $metalType; ?>');">
                                <i class="fa fa-angle-double-left"></i> BACK
                            </a>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
    //
    // START CODE FOR LIST OF FINE STOCK ITEMS @Author:PRIYANKA-05-07-17
    //
    //
    $panelName = $_GET['panelName'];
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //
        $selFirmId = $_SESSION['setFirmSession'];
    }
    //
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and "
                . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where "
                . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
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
    /*     * ******** End Code To GET Firm Details ********* */
    //
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'FIRM NAME'),
        array('dt' => 'METAL TYPE'),
        array('dt' => 'P.CODE'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'PRODUCT NAME'),
        array('dt' => 'STOCK TYPE'),
        array('dt' => 'QTY'),
        array('dt' => 'GROSS WEIGHT'),
        array('dt' => 'LESS WEIGHT'),
        array('dt' => 'PACKET WEIGHT'),
        array('dt' => 'NET WEIGHT'),
        array('dt' => 'W.TAGWT'),
        array('dt' => 'KARAT %'),
        array('dt' => 'AVG PRTY %'),
        array('dt' => 'AVG RATE')
    );
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'stock'; // Table Name
    $_SESSION['tableNamePK'] = 'st_id'; // Primary Key
    // DB Table Columns Parameters 
    $dbColumnsArray = array(
        "f.firm_name",
        "st_metal_type",
        "st_item_code",
        "st_item_category",
        "st_item_name",
        "st_stock_type",
        "IF (st_quantity < 0,'',st_quantity)",
        "CAST(st_gs_weight as decimal(10,3))",
        "st_pkt_weight",
        "st_less_weight",
        "CAST(st_nt_weight as decimal(10,3))",
        "IF(st_stock_type IN ('retail'),IF(st_tag_weight Not IN ('NULL',0),CAST(st_tag_weight+st_gs_weight as decimal(10,3)),0),0)",
        "ROUND(st_purity * 24 / 100)",
        "CAST((st_purity + st_avg_wastage) as decimal(10,2))",
        "CAST(st_pur_avg_rate as decimal(10,2))"
    );
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '6,7,8,9,10';
    $_SESSION['dtDeleteColumn'] = '';
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st_id,st_purity,";
    //
    // On Click Function Parameters
    //
    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "st_item_category"; // On which column
    $_SESSION['onclickColumnId'] = "st_id";
    $_SESSION['onclickColumnValue'] = "st_id";
    $_SESSION['onclickColumnFunction'] = "showFineStockItemDetailsDiv";
    $_SESSION['onclickColumnFunctionPara1'] = "st_item_category";
    $_SESSION['onclickColumnFunctionPara2'] = "st_item_name";
    $_SESSION['onclickColumnFunctionPara3'] = "FineStockDetails";
    $_SESSION['onclickColumnFunctionPara4'] = "FineStockDetails";
    $_SESSION['onclickColumnFunctionPara5'] = "st_metal_type";
    $_SESSION['onclickColumnFunctionPara6'] = "st_stock_type";
    $_SESSION['onclickColumnFunctionPara7'] = "st_purity";
    //
    // Extra direct columns we need pass in SQL Query
    // 
    //
    if ($metalType == 'Gold' || $metalType == 'gold' || $metalType == 'GOLD') {
        $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('stock') "
                . "and st_metal_type IN ('GOLD','gold','Gold') "
                . "and (st_gs_weight > 0) and st_item_category = '$itemCategory' "
                . "and st_item_name = '$itemName' and st_purity = '$stockPurity' "
                . "GROUP BY st_item_name,st_item_category,st_stock_type,st_purity,f.firm_id";
    } else if ($metalType == 'Silver' || $metalType == 'silver' || $metalType == 'SILVER') {
        $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('stock') "
                . "and st_metal_type IN ('SILVER','silver','Silver') "
                . "and (st_gs_weight > 0) and st_item_category = '$itemCategory' "
                . "and st_item_name = '$itemName' and st_purity = '$stockPurity' "
                . "GROUP BY st_item_name,st_item_category,st_stock_type,st_purity,f.firm_id";
    }else if ($metalType == 'Platinum' || $metalType == 'platinum' || $metalType == 'PLATINUM') {
     $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('stock') "
                . "and st_metal_type IN ('PLATINUM','platinum','Platinum') "
                . "and (st_gs_weight > 0) and st_item_category = '$itemCategory' "
                . "and st_item_name = '$itemName' and st_purity = '$stockPurity' "
                . "GROUP BY st_item_name,st_item_category,st_stock_type,st_purity,f.firm_id";
} else {
        $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('stock') "
                . "and (st_gs_weight > 0) and st_item_category = '$itemCategory' "
                . "and st_item_name = '$itemName' and st_purity = '$stockPurity' "
                . "GROUP BY st_item_name,st_item_category,st_stock_type,st_purity,f.firm_id";
    }
    //
    //echo $_SESSION['tableWhere'];
    // 
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON st_firm_id=f.firm_id";
    //
    // Data Table Main File
    include 'omdatatables.php';
    // END CODE FOR LIST OF FINE STOCK ITEMS @Author:PRIYANKA-05-07-17
    ?>
</div>