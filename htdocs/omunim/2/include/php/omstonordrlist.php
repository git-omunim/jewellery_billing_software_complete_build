<?php
/*
 * **************************************************************************************
 * @tutorial: START CODE FOR STONE RE-ORDER LIST @DARSHANA 16 AUG 2021
 * **************************************************************************************
 * 
 * Created on Aug 16, 2021 3:00pm
 *
 * @FileName: omstonordrlist.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
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
                            <img src="<?php echo $documentRoot; ?>/images/addGold24.png" alt="Stock Purchase List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="200px">
                            <?php
                            if ($panelName == 'stock' && ($metalType == 'Gold' || $metalType == 'gold' || $metalType == 'GOLD')) {
                                $_SESSION['dtPrintTitle'] = "GOLD STOCK LIST";
                                ?>
                                <div class="textLabelHeading">GOLD RE-ORDER LIST </div>
                                <?php
                            } else if ($panelName == 'stock' && ($metalType == 'Silver' || $metalType == 'silver' || $metalType == 'SILVER')) {
                                $_SESSION['dtPrintTitle'] = "SILVER STOCK LIST";
                                ?>
                                <div class="textLabelHeading">SILVER RE-ORDER LIST </div>
                                <?php
                            } else {
                                $_SESSION['dtPrintTitle'] = "GOLD SILVER STOCK LIST";
                                ?>
                                <div class="textLabelHeading">STONE RE-ORDER LIST </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle" colspan="6" width="200px">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <!--START CODE FOR DISPLAY METAL WISE BUTTON @DARSHANA 16 AUG 2021-->
                        <td align="right" valign="middle" width="170px">
                            <div style="cursor: pointer; height: 21px; width: 166px; font-weight: bold; font-size: 12px; 
                                 padding-top: 0px; margin-top: 5px; margin-bottom: 5px; border-radius: 5px !important; 
                                 text-align: center; color: #AA6600; margin-left: 0px; background-color: #FFC469; "> 
                                <a onclick="showReOrderMetalWiseList('boxMovement', 'GoldSilverReorder');">
                                    <span style="color: #AA6600;"> GOLD-SILVER RE-ORDER LIST </span>
                                </a>
                            </div> 
                        </td>
                        <td align="right" valign="middle" width="150px">
                            <div style="cursor: pointer; height: 21px; width: 136px; font-weight: bold; font-size: 12px; 
                                 padding-top: 0px; margin-top: 5px; margin-bottom: 5px; border-radius: 5px !important; 
                                 text-align: center; color: #dc4499; margin-left: 0px; background-color: #ffc0cb; "> 
                                <a onclick="showReOrderMetalWiseList('boxMovement', 'StoneReorder');">
                                    <span style="color: #dc4499;"> STONE RE-ORDER LIST </span>
                                </a>
                            </div> 
                        </td>
                        <td align="right" valign="middle" width="170px">
                            <div style="cursor: pointer; height: 21px; width: 155px; font-weight: bold; font-size: 12px; 
                                 padding-top: 0px; margin-top: 5px; margin-bottom: 5px; border-radius: 5px !important; 
                                 text-align: center; color: #00008a; margin-left: 0px; background-color: #89b2ed; "> 
                                <a onclick="showReOrderMetalWiseList('boxMovement', 'ImitationReorder');">
                                    <span style="color: #00008a;"> IMITATION RE-ORDER LIST</span>
                                </a>
                            </div> 
                        </td>
                        <!--END CODE FOR DISPLAY METAL WISE BUTTON @DARSHANA 16 AUG 2021-->
                        <td align="right" valign="middle" >
                            <a style="cursor: pointer;" class="btn btn-xs default" onclick="navigateBackToStockPanel('<?php echo $documentRoot; ?>', 'retailJwelleryGold', '');">
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

    include 'omstreordrfview.php';
    /*     * ******** End Code To GET Firm Details ********* */
    //Data Table Main Columns
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    $dataTableColumnsFields = array(
        array('dt' => 'METAL TYPE'),
        array('dt' => 'P.CODE'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'ITEM NAME'),
        array('dt' => 'MIN.QTY'),
        array('dt' => 'MAX.QTY'),
        array('dt' => 'AVA.QTY'),
        array('dt' => 'MIN.WT'),
        array('dt' => 'MAX.WT'),
        array('dt' => 'AVA.WT')
    );
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'temp_view'; // Table Name
    $_SESSION['tableNamePK'] = 'ms_itm_id'; // Primary Key
    // DB Table Columns Parameters 
    $dbColumnsArray = array(
        "ms_itm_metal",
        "ms_itm_pre_id",
        "ms_itm_category",
        "ms_itm_name",
        "ms_itm_min_qty",
        "ms_itm_max_qty",
        "st_quantity",
        "ms_itm_from_wt",
        "ms_itm_to_wt",
        "st_gs_weight"
    );
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "ms_itm_id,";
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
    $_SESSION['onclickColumnFunctionPara7'] = "";
    //
    //// Delete Function Parameters
    $_SESSION['deleteColumn'] = ""; // On which column
    $_SESSION['deleteColumnId'] = "";
    $_SESSION['deleteColumnValue'] = "";
    $_SESSION['deleteColumnFunction'] = "";
    $_SESSION['deleteColumnFunctionPara1'] = "";
    $_SESSION['deleteColumnFunctionPara2'] = "";
    $_SESSION['deleteColumnFunctionPara3'] = "";
    $_SESSION['deleteColumnFunctionPara4'] = "";
    $_SESSION['deleteColumnFunctionPara5'] = "";
    $_SESSION['deleteColumnFunctionPara6'] = "";
    $_SESSION['deleteColumnFunctionPara7'] = "";
    //
    //codition change by@darshana 16 aug 2021
    $_SESSION['tableWhere'] = "";
    //
    //echo $_SESSION['tableWhere'];    exit(); OR ms_itm_from_wt>SUM(s.st_gs_weight)
    // 
    // Table Joins " INNER JOIN firm AS f ON st_firm_id=f.firm_id ".
    $_SESSION['tableJoin'] = "";
    //
    $_SESSION['tableGroupBy'] = "";
//            . "HAVING ms_itm_min_qty>SUM(s.st_quantity) OR ms_itm_from_wt>SUM(s.st_gs_weight) ";
    //
    // Data Table Main File
    include 'omdatatables.php';
    // END Code of Stone Re-order List @darshana 16 aug 2021
    ?>
</div>