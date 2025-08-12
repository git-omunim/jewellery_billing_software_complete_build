<?php
/*
 * ***************************************************************************************
 * @tutorial: This segment used to display STRLLERING STOCK LIST in STOCK Panel.
 * **************************************************************************************
 * Created on 15 DEC,2018 1:05:00 PM
 *
 * @FileName: omstrgstlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 2.6.94
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$metalType = $_GET['metalType'];
$panelName = $_GET['divPanel'];
if ($panelName == '') {
    $panelName = $_GET['panelName'];
}
//echo '$panelName:'.$panelName;
//echo '$metalType:'.$metalType;
?>
<div id="jewelleryPanel">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="26px">
                            <img src="<?php echo $documentRoot; ?>/images/diamond-icon24.png" alt="Strllering Stock List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="200px">
                            <?php if ($panelName == 'strsilver') {
                                $_SESSION['dtPrintTitle'] = "STERLING STOCK LIST"; ?>
                                <div class="textLabelHeading">STERLING STOCK LIST </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td align="right" valign="middle" colspan="15">
                            <a style="cursor: pointer;" class="btn btn-xs default" onclick="navigateBackToStockPanel('<?php echo $documentRoot; ?>', 'stockStrelling', '');">
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
        //Set String for Public Firms
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
    /*     * ******** End Code To GET Firm Details ********* */
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'FIRM NAME'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'ITEM NAME'),
        array('dt' => 'QTY'),
        array('dt' => 'GROSS WEIGHT(GM)')
    );
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'stock'; // Table Name
    $_SESSION['tableNamePK'] = 'st_id'; // Primary Key
    // DB Table Columns Parameters 
    $dbColumnsArray = array(
        "f.firm_name",
        "st_item_category",
        "st_item_name",
        "SUM(st_quantity)",
        "SUM(st_gs_weight)"
    );
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '3,4';
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
    $_SESSION['onclickColumnFunctionPara3'] = "StrelleringStock";
    $_SESSION['onclickColumnFunctionPara4'] = "StrelleringStock";
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
    $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('strsilver') and st_quantity != 0 GROUP BY st_item_name,st_item_category,st_firm_id";
    //
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON st_firm_id=f.firm_id ";
    //
    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>

