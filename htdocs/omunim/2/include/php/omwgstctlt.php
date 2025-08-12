<?php
/* 
 * ***************************************************************************************
 * @tutorial: CODE FOR DISPLAY CRYSTAL STOCK REPORT BY CARAT @ DARSHANA 13 AUG 2021
 * **************************************************************************************
 * Created on 13 AUG 2021 04:30:00 PM
 *
 * @FileName: omwgstctlt.php
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
//
$metalType = $_GET['metalType'];
$panelName = $_GET['divPanel'];
//
if ($panelName == '') {
    $panelName = $_GET['panelName'];
}
//
//echo '$panelName:'.$panelName;
//echo '$metalType:'.$metalType;
//
?>
<div id="jewelleryPanel">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="26px">
                            <img src="<?php echo $documentRoot; ?>/images/diamond-icon24.png" 
                                 alt="Crysatl Stock List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="650px">
                            <?php
                            if ($panelName == 'crystal') {
                                $_SESSION['dtPrintTitle'] = "CRYSTAL STOCK LIST";
                                ?>
                                <div class="textLabelHeading">CRYSTAL STOCK LIST BY CARAT </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td width="1px;"></td>
                        <td align="right" valign="middle">
                            <div style="cursor: pointer; height: 21px; width: 136px; font-weight: bold; font-size: 12px; 
                                        padding-top: 0px; margin-top: 5px; margin-bottom: 5px; border-radius: 5px !important; 
                                        text-align: center; color: #000080 !important; margin-left: 50px; 
                                        background-color: #89b2ed; margin-right: 0px !important;"> 
                            <a onclick="navigateToCrystalByGmWtPanel('crystal');">
                                 <span style="color: #000080;"> STONE STOCK BY GM </span>
                            </a>
                            </div> 
                        </td>
                         <td align="right" valign="middle">
                             <div style="cursor: pointer; height: 21px; width: 136px; font-weight: bold; font-size: 12px; 
                                         padding-top: 0px; margin-top: 5px; margin-bottom: 5px; border-radius: 5px !important; 
                                         text-align: center; color: #AA6600; margin-left: 0px; background-color: #FFC469; "> 
                             <a onclick="navigateToCrystalByCtWtPanel('crystal');">
                                <span style="color: #AA6600;"> STONE STOCK BY CT </span>
                            </a>
                            </div> 
                        </td>
                        
                         
                        <td align="right" valign="middle" style="width: 60px;">
                            <a style="cursor: pointer;" class="btn btn-xs default" 
                               onclick="navigateBackToStockPanel('<?php echo $documentRoot; ?>', 'stock', '');">
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
    /*     * ******** End Code To GET Firm Details ********* */
    //Data Table Main Columns
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'FIRM NAME'),
        array('dt' => 'STONE TYPE'),
        array('dt' => 'P.CODE'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'PROD. NAME'),
        array('dt' => 'QTY'),
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
    //
    // DB Table Columns Parameters 
    //
    $dbColumnsArray = array(
        "f.firm_name",
        "st_metal_type",
        "st_item_code",
        "st_item_category",
        "st_item_name",
        "SUM(st_quantity)",
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
    $_SESSION['dtSumColumn'] = '5,6,7,12,13';
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
    $_SESSION['tableWhere'] = "st_firm_id IN ($strFrmId) and st_type IN ('crystal') and st_gs_weight_type IN ('CT') "
                            . "GROUP BY st_item_name,st_item_category,st_firm_id";
    //
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON st_firm_id=f.firm_id ";
    //
    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>

