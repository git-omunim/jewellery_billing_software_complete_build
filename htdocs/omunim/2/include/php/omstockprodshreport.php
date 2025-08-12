<?php
/*
 * ***************************************************************************
 * @Description: PRODUCT WISE SHORTFALL REPORT FILE @AUTHOR:MADHUREE-13NOV2020
 * ***************************************************************************
 *
 * Created on NOV 13, 2020 05:42:36 PM
 *
 * @FileName: omstockprodshreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 1.0.1
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
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
?>
<div id="shortfallItemList">
    <?php
    $sttr_firm_id = $_REQUEST['firmId'];
    $sessionOwnerId = $_SESSION[sessionOwnerId];
    //
    //Start Code To Select FirmId
    if ($sttr_firm_id == '' || $sttr_firm_id == NULL || $sttr_firm_id == 'undefined') {
        if (!isset($selFirmId)) {
            $firmIdSelected = $_SESSION['setFirmSession'];
            $selFirmId = $firmIdSelected;
        } else {
            $firmIdSelected = $selFirmId;
        }
        //End Code To Select FirmId
        if ($selFirmId == '' || $selFirmId == NULL) {
            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
        } else {
            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
        }
        $resultFirm = mysqli_query($conn, $qSelectFirm);
        $rowFirm = mysqli_fetch_array($resultFirm);
        //
        if ($selFirmId != NULL) {
            $strFrmId = $selFirmId;
        } else {
            $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
        }
    } else {
        $strFrmId = $sttr_firm_id;
        $firmIdSelected = $strFrmId;
    }
    ?>
    <table width="100%" border="0">
        <tr>
            <td width="90%" align="left">
                <h1>
                    STOCK SHORTFALL REPORT
                </h1>
            </td>
            <td width="10%" align="right">
                <div class="selectStyled floatLeft">
                    <select id="FirmId" name="FirmId" 
                            onchange="navigatationPanelByFileName('purchaseDetailsSubDiv', 'omstockprodshreport', '', '', '', '', '', '', '', '', '', '', this.value)"
                            class="input_border_red"  autocomplete="off" maxlength="30" style="width:100px;">
                        <OPTION  VALUE="" class="ff_calibri fs_13 fw_b brown">ALL FIRMS&nbsp;&nbsp;</OPTION>
                        <?php
                        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                            $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);

                            while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {

                                if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                                    $firmSelected = "selected";
                                }

                                if ($rowPerFirm['firm_type'] == "Public") {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                } else {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                }
                                $firmSelected = "";
                            }
                        } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                            $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);

                            while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {

                                if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                                    $firmSelected = "selected";
                                }

                                if ($rowPerFirm['firm_type'] == "Public") {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                } else {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                }
                                $firmSelected = "";
                            }
                        }
                        ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <div class="hrGrey" style="margin-top:2px;"></div>
            </td>
        </tr>
    </table>
    <?php
    //
    // View Table @AUTHOR:MADHUREE-13NOV2020
    //
    $createView = "CREATE TABLE IF NOT EXISTS temp_view (
    sttr_id                         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sttr_sttr_id                    VARCHAR(20),
    sttr_transaction_type           VARCHAR(20),
    sttr_st_id                      VARCHAR(20),
    sttr_item_pre_id                VARCHAR(50),
    sttr_item_id                    VARCHAR(50),
    firm_name                       VARCHAR(50),
    sttr_metal_type                 VARCHAR(20),
    sttr_purity                     VARCHAR(20),
    sttr_item_category              VARCHAR(50),
    sttr_item_name                  VARCHAR(50),
    sttr_stock_type                 VARCHAR(20),
    sttr_quantity                   VARCHAR(20),
    sttr_gs_weight                  VARCHAR(20),
    sttr_nt_weight                  VARCHAR(20),
    sttr_stone_wt                   VARCHAR(20),
    sttr_status                     VARCHAR(20))";
    //
    $sqlTable = 'DESC temp_view';
    mysqli_query($conn, $sqlTable);
    //
    if (!mysqli_errno($conn) == 1146) {
        $dropView = "DROP table temp_view";
        mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
        mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
    } else {
        mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
    }
    //
    $strFrmIdArray = explode(',', $strFrmId);
    //
    // View Table Where  @AUTHOR:MADHUREE-13NOV2020
    //
    if (sizeof($strFrmIdArray) > 1) {
        $viewWhere = " WHERE st.sttr_firm_id IN ($strFrmId) AND st.sttr_indicator IN ('stock') AND (sttr_stock_trans_history !='' AND sttr_stock_trans_history IS NOT NULL) AND (sttr_trans_date !='' AND sttr_trans_date IS NOT NULL) AND (sttr_stock_trans_prev_id !='' AND sttr_stock_trans_prev_id IS NOT NULL)";
    } else {
        $viewWhere = " WHERE st.sttr_firm_id NOT IN ($strFrmId) AND st.sttr_indicator IN ('stock') AND (sttr_stock_trans_history !='' AND sttr_stock_trans_history IS NOT NULL) AND (sttr_trans_date !='' AND sttr_trans_date IS NOT NULL) AND (sttr_stock_trans_prev_id !='' AND sttr_stock_trans_prev_id IS NOT NULL)";
    }
    //
    // View Table Joins @AUTHOR:MADHUREE-13NOV2020
    //
    $viewJoin = "";
    //
    // View Table Group By @AUTHOR:MADHUREE-13NOV2020
    //
    $viewGroupBy = "  group by st.sttr_id";
    //
    $queryForMissingItem = "SELECT st.sttr_id as 'sttr_id',"
            . "st.sttr_transaction_type as 'sttr_transaction_type',"
            . "st.sttr_stock_trans_history as 'sttr_stock_trans_history',"
            . "st.sttr_stock_trans_prev_id as 'sttr_stock_trans_prev_id',"
            . "st.sttr_st_id as 'sttr_st_id',"
            . "st.sttr_item_pre_id as 'sttr_item_pre_id',"
            . "st.sttr_metal_type as 'sttr_metal_type',"
            . "st.sttr_purity as 'sttr_purity',"
            . "st.sttr_item_category as 'sttr_item_category',"
            . "st.sttr_item_name as 'sttr_item_name',"
            . "st.sttr_stock_type as 'sttr_stock_type',"
            . "st.sttr_quantity as 'sttr_quantity',"
            . "st.sttr_gs_weight as 'sttr_gs_weight',"
            . "st.sttr_nt_weight as 'sttr_nt_weight',"
            . "st.sttr_stone_wt as 'sttr_stone_wt'"
            . " FROM stock_transaction as st "
            . " $viewJoin"
            . " $viewWhere" . "$viewGroupBy";
    //
    $resForMissingItem = mysqli_query($conn, $queryForMissingItem) or die(mysqli_error($conn));
    //    
    while ($rowForMissingItem = mysqli_fetch_array($resForMissingItem, MYSQLI_ASSOC)) {
        //
        $sttrId = $rowForMissingItem['sttr_id'];
        $sttr_transaction_type = $rowForMissingItem['sttr_transaction_type'];
        $sttr_st_id = $rowForMissingItem['sttr_st_id'];
        $sttr_stock_trans_history = $rowForMissingItem['sttr_stock_trans_history'];
        if ($sessionFirmId == '') {
            $firmIdArray = explode('#', $sttr_stock_trans_history);
            $firmId = end($firmIdArray);
        } else {
            
        }
        parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_id='$firmId'"));
        $sttr_stock_trans_prev_id = $rowForMissingItem['sttr_stock_trans_prev_id'];
        $itemIdArray = explode('#', $sttr_stock_trans_prev_id);
        $itemId = end($itemIdArray);
        $itemPreId = preg_replace('/[0-9]+/', '', $itemId);
        $itemPostId = preg_replace('/[a-zA-Z]/', '', $itemId);
        $sttr_item_pre_id = $itemPreId;
        $sttr_item_id = $itemPostId;
        $sttr_metal_type = $rowForMissingItem['sttr_metal_type'];
        $sttr_purity = $rowForMissingItem['sttr_purity'];
        $sttr_item_category = $rowForMissingItem['sttr_item_category'];
        $sttr_item_name = $rowForMissingItem['sttr_item_name'];
        $sttr_stock_type = $rowForMissingItem['sttr_stock_type'];
        $sttr_quantity = $rowForMissingItem['sttr_quantity'];
        $sttr_gs_weight = $rowForMissingItem['sttr_gs_weight'];
        $sttr_nt_weight = $rowForMissingItem['sttr_nt_weight'];
        $sttr_stone_wt = $rowForMissingItem['sttr_stone_wt'];
        $sttr_status = $rowForMissingItem['sttr_status'];
        //
        $InserIntoTempView = "INSERT into temp_view(
        sttr_sttr_id,sttr_transaction_type,sttr_st_id,sttr_item_pre_id,sttr_item_id,firm_name,sttr_metal_type,sttr_purity,sttr_item_category,sttr_item_name,sttr_stock_type,sttr_quantity,sttr_gs_weight,sttr_nt_weight,sttr_stone_wt,
        sttr_status)values(
        '$sttrId','$sttr_transaction_type','$sttr_st_id','$sttr_item_pre_id','$sttr_item_id','$firm_name','$sttr_metal_type','$sttr_purity','$sttr_item_category','$sttr_item_name','$sttr_stock_type','$sttr_quantity','$sttr_gs_weight','$sttr_nt_weight','$sttr_stone_wt',
        '$sttr_status')";
        //
        mysqli_query($conn, $InserIntoTempView) or die('<br/> ERROR:' . mysqli_error($conn));
        //
    }
    //
    //Data Table Main Columns
    //
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'PROD ID'),
        array('dt' => 'FIRM NAME'),
        array('dt' => 'METAL TYPE'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'PRODUCT NAME'),
        array('dt' => 'STOCK TYPE'),
        array('dt' => 'QTY'),
        array('dt' => 'GROSS WEIGHT'),
        array('dt' => 'NET WEIGHT'),
        array('dt' => 'PURITY'),
        array('dt' => 'STONE WEIGHT')
    );
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    // Table Parameters
    //
    $_SESSION['tableName'] = 'temp_view as st'; // Table Name
    $_SESSION['tableNamePK'] = 'st.sttr_id'; // Primary Key
    //
    // DB Table Columns Parameters 
    //
    $dbColumnsArray = array(
        "CONCAT(st.sttr_item_pre_id,CAST(st.sttr_item_id AS UNSIGNED))",
        "st.firm_name",
        "st.sttr_metal_type",
        "st.sttr_item_category",
        "st.sttr_item_name",
        "st.sttr_stock_type",
        "st.sttr_quantity",
        "st.sttr_gs_weight",
        "st.sttr_nt_weight",
        "CONCAT(st.sttr_purity,' ','%')",
        "st.sttr_stone_wt"
    );
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '7, 8, 9, 10';
    $_SESSION['dtDeleteColumn'] = '';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st.sttr_sttr_id,st.sttr_st_id,";
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
    $_SESSION['onprintColumnImage'] = "active.png";
    $_SESSION['onprintColumn'] = "st.sttr_st_id"; // On which column
    $_SESSION['onprintColumnId'] = "st.sttr_st_id";
    $_SESSION['onprintColumnValue'] = "st.sttr_st_id";
    $_SESSION['onprintColumnFunction'] = "addsoldoutDeletedItemToStock";
    $_SESSION['onprintColumnFunctionPara1'] = "st.sttr_sttr_id";
    $_SESSION['onprintColumnFunctionPara2'] = "";
    $_SESSION['onprintColumnFunctionPara3'] = "addDeletedSellStock";
    $_SESSION['onprintColumnFunctionPara4'] = "";
    $_SESSION['onprintColumnFunctionPara5'] = "";
    $_SESSION['onprintColumnFunctionPara6'] = "";
    //
    // On Delete Function Parameters
    //
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
    // Table Where
    //
    $_SESSION['tableWhere'] = "";
    //
    // Table Joins
    //
    $_SESSION['tableJoin'] = "";
    //
    // Data Table Main File
    //
    include 'omdatatables.php';
    ?>
</div>