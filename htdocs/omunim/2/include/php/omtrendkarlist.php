<?php
/*
 * **************************************************************************************
 * @Description:  TRENDING KARIGAR LIST @Author:PRIYANKA-16OCT18
 * **************************************************************************************
 *
 * Created on OCT 16, 2018 03:21:00 PM
 *
 * @FileName: omtrendkarlist.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.6.90
 * @version 2.6.90
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-16OCT18
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
?>
<?php
// 
$panelName = $_GET['panelName'];
//
//echo '$panelName:'.$panelName;
//
?>
<div id="jewelleryPanel">
    <div id="addStockItemDetails">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="top" align="left" width="32px">
                                        <div class="analysis_div_rows">
                                            <img src="<?php echo $documentRoot; ?>/images/maleUser26.png" alt=""/>
                                        </div>
                                    </td>
                                    <td valign="top" align="left" width="300px">                             
                                        <div class="textLabelHeading">TRENDING KARIGAR LIST </div>
                                    </td>                                                                     
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" colspan="6" class="paddingTop2 padBott2">
                            <div class="hrGold"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top" colspan="15">
                            <a style="cursor: pointer;" class="btn btn-xs default" onclick="navigateBackToStockPanel('<?php echo $documentRoot; ?>', '<?php echo $panelName ?>', '');">
                                <i class="fa fa-angle-double-left"></i> BACK
                            </a>
                        </td>
                    </tr>
            <tr>
                <td align="right">
                    <div id="messDisplayDiv" class="analysis_div_rows">
                        <?php
                        $showMess = $_GET['messDiv'];
                        if ($showMess == "itemDeleted") {
                            echo "<div class=" . "fs_12 fs_calibri" . ">~ Deleted Successfully ~ </div>";
                        }
                        ?> 
                    </div>
                </td>
            </tr>
        </table>

<div id ="stockListSubDiv">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>" />
    <?php
    //
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
    /********* End Code To GET Firm Details ********* */
    //Data Table Main Columns
    //
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
    array('dt' => 'PROD ID'),
    array('dt' => 'KARIGAR'),
    array('dt' => 'FIRM'),
    array('dt' => 'METAL'),
    array('dt' => 'PROD CAT'),
    array('dt' => 'PROD NAME'),
    array('dt' => 'STOCK TYPE')
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
    "u.user_fname",
    "f.firm_name",
    "st.sttr_metal_type",
    "st.sttr_item_category",
    "st.sttr_item_name",
    "st.sttr_stock_type"
    );
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st.sttr_id,";
    //
    // On Click Function Parameters
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
    // On Print Function Parameters
    //
    $_SESSION['onprintColumnImage'] = "";
    $_SESSION['onprintColumn'] = ""; // On which column
    $_SESSION['onprintColumnId'] = "";
    $_SESSION['onprintColumnValue'] = "";
    $_SESSION['onprintColumnFunction'] = "";
    $_SESSION['onprintColumnFunctionPara1'] = "";
    $_SESSION['onprintColumnFunctionPara2'] = "";
    $_SESSION['onprintColumnFunctionPara3'] = "";
    $_SESSION['onprintColumnFunctionPara4'] = "";
    $_SESSION['onprintColumnFunctionPara5'] = "";
    $_SESSION['onprintColumnFunctionPara6'] = "";
    //
    // Delete Function Parameters
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
    // Extra direct columns we need pass in SQL Query
    // 
    $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_status NOT IN ('DELETED') and st.sttr_transaction_type = 'sell'";    
    // 
    // Table Joins
    $_SESSION['tableJoin'] = " LEFT JOIN stock_transaction AS t ON t.sttr_id=st.sttr_sttr_id AND t.sttr_transaction_type IN ('PURCHASE','TAG')"
                           . " LEFT JOIN stock_transaction AS s ON s.sttr_sttr_id=t.sttr_sttr_id AND s.sttr_transaction_type IN ('PURCHASE')"
                           . " INNER JOIN user AS u ON s.sttr_user_id=u.user_id"
                           . " INNER JOIN firm AS f ON s.sttr_firm_id=f.firm_id";
    //
    // Data Table Main File
    include 'omdatatables.php';
    //
    ?>
</div>