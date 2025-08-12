<?php
/* @Priyanka:11-JULY-2017
 * ***************************************************************************************
 * @tutorial: This segment used to display CRYSTAL STOCK LIST in STOCK Panel.
 * **************************************************************************************
 * Created on 11 JULY, 2017 05:59:00 PM
 *
 * @FileName: omwgstlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 1.0
 * @Copyright (c) 2017 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2017 SoftwareGen, Inc
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
                            <img src="<?php echo $documentRoot; ?>/images/diamond-icon24.png" alt="Crysatl Stock List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="650px">
                            <?php
                            if ($panelName == 'crystal') {
                                $_SESSION['dtPrintTitle'] = "CRYSTAL STOCK LIST";
                                ?>
                                <div class="textLabelHeading">CRYSTAL STOCK LIST </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td width="1px;"></td>
                        <td align="center" valign="middle" width="180px">
                            <div > 
                            <a onclick="navigateToCrystalByGmWtPanel('crystal');">
                                 <span style="cursor: pointer; height:30px; width: 136px; font-weight: 600; font-size: 14px; 
                                        padding-top: 0px;; border-radius: 5px !important;padding:5px 10px; 
                                        text-align: center; color:#0F118A !important; line-height:27px;
                                        background-color:#BED8FD; margin-right: 0px !important;"> STONE STOCK BY GM </span>
                            </a>
                            </div> 
                        </td>
                         <td align="center" valign="middle" width="180px">
                             <div>
                                <span style="cursor: pointer; height:30px; width: 136px; font-weight: 600; font-size: 14px; 
                                        padding-top: 0px;; border-radius: 5px !important;padding:5px 10px; 
                                        text-align: center; color:#0F118A !important; line-height:27px;
                                        background-color:#BED8FD; margin-right: 0px !important;"> STONE STOCK BY CT </span>
                            </a>
                            </div> 
                        </td>
                        <td align="right" valign="middle" style="width: 60px;">
                            <a style="cursor: pointer;background: #D8F6D8;color: #006400;border-radius: 5px !important;width: 70px;font-size: 14px;font-weight: 600;border: 0;padding: 5px 10px;height: 27px;" class="btn btn-xs default" onclick="navigateBackToStockPanel('<?php echo $documentRoot; ?>', 'stock', '');">
                                <i class="fa fa-angle-double-left"></i> BACK
                            </a>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
    // START Code of CRYSTAL STOCK LIST @Priyanka:11-JULY-2017
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm @AUTHOR: SANDY10JUL13
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
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
//    $dataTableColumnsFields = array(
//        array('dt' => 'FIRM NAME'),
//        array('dt' => 'CRY CATEGORY'),
//        array('dt' => 'CRY NAME'),
//        array('dt' => 'QTY'),
//        array('dt' => 'GS WT(CT)')
//    );
    $dataTableColumnsFields = array(
        array('dt' => 'FIRM NAME'),
        array('dt' => 'STONE TYPE'),
        array('dt' => 'P.CODE'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'PROD. NAME'),
        array('dt' => 'QTY'),
        array('dt' => 'GROSS WT(GM)'),
        array('dt' => 'GROSS WT(CT)'),
        array('dt' => 'NET WT'),
        array('dt' => 'COLOR'),
        array('dt' => 'CLARITY'),
        array('dt' => 'SHAPE'),
        array('dt' => 'SIZE'),
        array('dt' => 'PUR.RATE'),
        array('dt' => 'SELL.RATE')
    );
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'stock'; // Table Name
    $_SESSION['tableNamePK'] = 'st_id'; // Primary Key
    // DB Table Columns Parameters 
//    $dbColumnsArray = array(
//        "f.firm_name",
//        "st_item_category",
//        "st_item_name",
//        "SUM(st_quantity)",
//        "(SUM(st_gs_weight) * 5)"
//    );
    //
    $dbColumnsArray = array(
        "f.firm_name",
        "st_metal_type",
        "st_item_code",
        "st_item_category",
        "st_item_name",
        "SUM(st_quantity)",
        "IF(st_gs_weight_type='CT',CAST(SUM(st_gs_weight)/5 as decimal(10,3)),CAST(SUM(case when st_gs_weight_type='KG' then st_gs_weight*1000  when st_gs_weight_type='MG' then st_gs_weight/1000 else st_gs_weight end) as decimal(10,3)))",
        "IF(st_gs_weight_type='CT',CAST(SUM(st_gs_weight) as decimal(10,3)),CAST(SUM(case when st_gs_weight_type='KG' then st_gs_weight*5000  when st_gs_weight_type='MG' then st_gs_weight/5000 else st_gs_weight*5 end) as decimal(10,3)))",
        "CAST(SUM(st_nt_weight) as decimal(10,3))",
        "st_color",
        "st_clarity",
        "st_shape",
        "st_size",
        "st_purchase_rate",
        "st_sell_rate"
    );
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '5,6,7,8,13,14';
    $_SESSION['dtDeleteColumn'] = '';
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st_id,";
    //
    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "st_item_category"; // On which column
    $_SESSION['onclickColumnId'] = "st_id";
    $_SESSION['onclickColumnValue'] = "st_id";
    $_SESSION['onclickColumnFunction'] = "showCrystalStockItemDetailsDiv";
    $_SESSION['onclickColumnFunctionPara1'] = "st_item_category";
    $_SESSION['onclickColumnFunctionPara2'] = "st_item_name";
    $_SESSION['onclickColumnFunctionPara3'] = "CrystalStock";
    $_SESSION['onclickColumnFunctionPara4'] = "CrystalStock";
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
    $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and (st_gs_weight != 0 || st_quantity != 0) and st_type IN ('crystal') GROUP BY st_item_name,st_item_category,st_firm_id";
    //
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON st_firm_id=f.firm_id ";
    //
    // Data Table Main File
    include 'omdatatables.php';
    // END Code of CRYSTAL STOCK LIST @Priyanka:11-JULY-2017
    ?>
</div>

