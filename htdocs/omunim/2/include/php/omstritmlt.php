<?php
/*
 * **************************************************************************************
 * @Description: STRLLERING STOCK ITEMS AUTHOR : DIKSHA 15DEC,2018
 * **************************************************************************************
 *
 * Created on 15DEC,2018 2:34:00 PM
 *
 * @FileName: omstritmlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMERP
 * @version 2.6.94
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
?>
<div id="jewelleryPanel">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="26px">
                            <img src="<?php echo $documentRoot; ?>/images/diamond-icon24.png" alt="Crysatl Stock List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="200px">
                            <?php if ($panelName == 'StrelleringStock') { $_SESSION['dtPrintTitle'] = "STERLING STOCK LIST"; ?>
                                <div class="textLabelHeading">STERLING STOCK LIST </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td align="right" valign="middle" colspan="15">
                            <a style="cursor: pointer;" class="btn btn-xs default" onclick="navigateBackToStockStrItmPanel('<?php echo $documentRoot; ?>', 'strsilver', '', '', '<?php echo $metalType; ?>');">
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
    $panelName = $_GET['panelName'];
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //
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
    /********** End Code To GET Firm Details **********/
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'FIRM NAME'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'ITEM NAME'),
        array('dt' => 'STOCK TYPE'),
        array('dt' => 'QTY'),
        array('dt' => 'GROSS WEIGHT(GM)')
        );
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'stock'; // Table Name
    $_SESSION['tableNamePK'] = 'st_id'; // Primary Key
    // DB Table Columns Parameters 
    $dbColumnsArray = array(
        "f.firm_name",
        "st_item_category",
        "st_item_name",
        "st_stock_type",
        "SUM(st_quantity)",
        "SUM(st_gs_weight)"
     );
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '4,5';
    $_SESSION['dtDeleteColumn'] = '';
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st_id,";
    //
    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "st_item_category"; // On which column
    $_SESSION['onclickColumnId'] = "st_id";
    $_SESSION['onclickColumnValue'] = "st_id";
    $_SESSION['onclickColumnFunction'] = "showStrlleringStockItemDetailsDiv";
    $_SESSION['onclickColumnFunctionPara1'] = "st_item_category";
    $_SESSION['onclickColumnFunctionPara2'] = "st_item_name";
    $_SESSION['onclickColumnFunctionPara3'] = "StrelleringSilverList";
    $_SESSION['onclickColumnFunctionPara4'] = "StrelleringSilverList";
    $_SESSION['onclickColumnFunctionPara5'] = "st_metal_type";
    $_SESSION['onclickColumnFunctionPara6'] = "st_stock_type";
    //
    $_SESSION['deleteColumn'] = ""; // On which column
    $_SESSION['deleteColumnId'] = "";
    $_SESSION['deleteColumnValue'] = "";
    $_SESSION['deleteColumnFunction'] = "";
    $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "";
    $_SESSION['deleteColumnFunctionPara3'] = "";  //stsl_itst_id
    $_SESSION['deleteColumnFunctionPara4'] = "";
    $_SESSION['deleteColumnFunctionPara5'] = "";
    $_SESSION['deleteColumnFunctionPara6'] = "";
    //
    // Extra direct columns we need pass in SQL Query
    // 
    //
    $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('strsilver') and st_quantity != 0 and st_item_category = '$itemCategory' and st_item_name = '$itemName' GROUP BY st_item_name,st_item_category,st_stock_type,f.firm_id";
    //echo $_SESSION['tableWhere'];
    // 
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON st_firm_id=f.firm_id";
    //
    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>