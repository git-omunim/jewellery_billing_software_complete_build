<?php
/*
 * ************************************************************************************************
 * @Description: FINE SOLDOUT STOCK DELETED LIST TO ADD INTO STOCK AGAIN @AUTHOR:MADHUREE-13NOV2020
 * ************************************************************************************************
 *
 * Created on NOV 13, 2020 05:42:36 PM
 *
 * @FileName: omselldelitemlist.php
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
<div id="soldoutDeletedList">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td>
                            <?php
                            $_SESSION['dtPrintTitle'] = "SOLD OUT DELETED ITEM LIST";
                            ?>
                            <div class="main_link_orange">
                                SOLD OUT DELETED ITEM LIST
                            </div>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
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
        //
        $selFirmId = $_SESSION['setFirmSession'];
    }
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' "
                . "$sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' "
                . "$sessionFirmStr order by firm_since desc";
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
    // View Table Where  @AUTHOR:MADHUREE-13NOV2020
    //
    $viewWhere = " WHERE st.sttr_firm_id IN ($strFrmId) and st.sttr_status IN ('SOLDOUT') "
            . "and st.sttr_indicator IN ('stock') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') ";
    //
    // View Table Joins @AUTHOR:MADHUREE-13NOV2020
    //
    $viewJoin = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id";
    //
    // View Table Group By @AUTHOR:MADHUREE-13NOV2020
    //
    $viewGroupBy = "  group by st.sttr_id";
    //
    $queryForDeleteedSellItem = "SELECT st.sttr_id as 'sttr_id',f.firm_name as 'firm_name',"
            . "st.sttr_firm_id as 'sttr_firm_id',"
            . "st.sttr_transaction_type as 'sttr_transaction_type',"
            . "st.sttr_st_id as 'sttr_st_id',"
            . "st.sttr_item_pre_id as 'sttr_item_pre_id',"
            . "st.sttr_item_id as 'sttr_item_id',"
            . "st.sttr_metal_type as 'sttr_metal_type',"
            . "st.sttr_purity as 'sttr_purity',"
            . "st.sttr_item_category as 'sttr_item_category',"
            . "st.sttr_item_name as 'sttr_item_name',"
            . "st.sttr_stock_type as 'sttr_stock_type',"
            . "st.sttr_quantity as 'sttr_quantity',"
            . "st.sttr_gs_weight as 'sttr_gs_weight',"
            . "st.sttr_nt_weight as 'sttr_nt_weight',"
            . "st.sttr_stone_wt as 'sttr_stone_wt',"
            . "st.sttr_status as 'sttr_status'"
            . " FROM stock_transaction as st "
            . " $viewJoin"
            . " $viewWhere" . "$viewGroupBy" . " order by sttr_item_category";
    //
    $resForDeleteedSellItem = mysqli_query($conn, $queryForDeleteedSellItem) or die(mysqli_error($conn));
    //    
    while ($rowForDeleteedSellItem = mysqli_fetch_array($resForDeleteedSellItem, MYSQLI_ASSOC)) {
        //
        $sttrId = $rowForDeleteedSellItem['sttr_id'];
        $sttr_transaction_type = $rowForDeleteedSellItem['sttr_transaction_type'];
        $sttr_st_id = $rowForDeleteedSellItem['sttr_st_id'];
        $sttr_item_pre_id = $rowForDeleteedSellItem['sttr_item_pre_id'];
        $sttr_item_id = $rowForDeleteedSellItem['sttr_item_id'];
        $firm_name = $rowForDeleteedSellItem['firm_name'];
        $sttr_metal_type = $rowForDeleteedSellItem['sttr_metal_type'];
        $sttr_purity = $rowForDeleteedSellItem['sttr_purity'];
        $sttr_item_category = $rowForDeleteedSellItem['sttr_item_category'];
        $sttr_item_name = $rowForDeleteedSellItem['sttr_item_name'];
        $sttr_stock_type = $rowForDeleteedSellItem['sttr_stock_type'];
        $sttr_quantity = $rowForDeleteedSellItem['sttr_quantity'];
        $sttr_gs_weight = $rowForDeleteedSellItem['sttr_gs_weight'];
        $sttr_nt_weight = $rowForDeleteedSellItem['sttr_nt_weight'];
        $sttr_stone_wt = $rowForDeleteedSellItem['sttr_stone_wt'];
        $sttr_status = $rowForDeleteedSellItem['sttr_status'];
        //
        $sellEntryPresent = noOfRowsCheck('sttr_id', 'stock_transaction', "sttr_sttr_id='$sttrId' AND sttr_transaction_type IN ('sell','ESTIMATESELL','APPROVAL') AND sttr_indicator IN ('stock','APPROVAL')");
        //
        if ($sellEntryPresent == 0) {
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
        array('dt' => 'STONE WEIGHT'),
        array('dt' => 'STATUS'),
        array('dt' => 'REACTIVE')
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
        "st.sttr_stone_wt",
        "st.sttr_status",
        "st.sttr_st_id"
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