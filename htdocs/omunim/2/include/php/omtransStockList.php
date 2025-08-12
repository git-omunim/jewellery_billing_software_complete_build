<?php
/*
 * ************************************************************************************************
 * @Description: FINE SOLDOUT STOCK DELETED LIST TO ADD INTO STOCK AGAIN @AUTHOR:MADHUREE-25NOV2020
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
                            $_SESSION['dtPrintTitle'] = "TRANSFERRED STOCK LIST";
                            ?>
                            <div class="main_link_orange">
                                TRANSFERRED STOCK LIST
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
    // View Table @AUTHOR:MADHUREE-25NOV2020
    //
    $createView = "CREATE TABLE IF NOT EXISTS temp_view (
    sttr_id                         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sttr_sttr_id                    VARCHAR(20),
    sttr_transaction_type           VARCHAR(20),
    sttr_st_id                      VARCHAR(20),
    sttr_prev_item_code             VARCHAR(50),
    sttr_item_code                  VARCHAR(50),
    sttr_transfer_date              VARCHAR(50),
    sttr_transfer_time              VARCHAR(20),
    previous_firm_name              VARCHAR(50),
    firm_name                       VARCHAR(50),
    sttr_metal_type                 VARCHAR(20),
    sttr_purity                     VARCHAR(20),
    sttr_item_category              VARCHAR(50),
    sttr_stock_trans_type           VARCHAR(20),
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
    // View Table Where  @AUTHOR:MADHUREE-25NOV2020
    //
    $viewWhere = " WHERE st.sttr_firm_id IN ($strFrmId) and (st.sttr_stock_trans_history!='' AND st.sttr_stock_trans_history IS NOT NULL)"
            . " and (st.sttr_trans_date!='' AND st.sttr_trans_date IS NOT NULL) "//and (st.sttr_stock_trans_prev_id!='' AND st.sttr_stock_trans_prev_id IS NOT NULL)"
            . " and st.sttr_indicator IN ('stock') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') ";
    //
    // View Table Joins @AUTHOR:MADHUREE-25NOV2020
    //
    $viewJoin = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id";
    //
    // View Table Group By @AUTHOR:MADHUREE-25NOV2020
    //
    $viewGroupBy = " group by st.sttr_id";
    //
    $queryForTransferredItem = "SELECT st.sttr_id as 'sttr_id',f.firm_name as 'firm_name',"
            . "st.sttr_firm_id as 'sttr_firm_id',"
            . "st.sttr_transaction_type as 'sttr_transaction_type',"
            . "st.sttr_st_id as 'sttr_st_id',"
            . "st.sttr_item_code as 'sttr_item_code',"
            . "st.sttr_metal_type as 'sttr_metal_type',"
            . "st.sttr_purity as 'sttr_purity',"
            . "st.sttr_item_category as 'sttr_item_category',"
            . "st.sttr_stock_trans_type as 'sttr_stock_trans_type',"
            . "st.sttr_quantity as 'sttr_quantity',"
            . "st.sttr_gs_weight as 'sttr_gs_weight',"
            . "st.sttr_nt_weight as 'sttr_nt_weight',"
            . "st.sttr_stone_wt as 'sttr_stone_wt',"
            . "st.sttr_status as 'sttr_status',"
            . "st.sttr_stock_trans_history as 'sttr_stock_trans_history',"
            . "st.sttr_stock_trans_prev_id as 'sttr_stock_trans_prev_id',"
            . "st.sttr_trans_date as 'sttr_trans_date'"
            . " FROM stock_transaction as st "
            . " $viewJoin"
            . " $viewWhere" . "$viewGroupBy" . " order by sttr_item_category";
    //
    $resForTransferredItem = mysqli_query($conn, $queryForTransferredItem) or die(mysqli_error($conn));
    //    
    while ($rowForForTransferredItem = mysqli_fetch_array($resForTransferredItem, MYSQLI_ASSOC)) {
        //
        $sttrId = $rowForForTransferredItem['sttr_id'];
        $sttr_transaction_type = $rowForForTransferredItem['sttr_transaction_type'];
        $sttr_st_id = $rowForForTransferredItem['sttr_st_id'];
        $sttr_item_code = $rowForForTransferredItem['sttr_item_code'];
        $firm_name = $rowForForTransferredItem['firm_name'];
        $sttr_metal_type = $rowForForTransferredItem['sttr_metal_type'];
        $sttr_purity = $rowForForTransferredItem['sttr_purity'];
        $sttr_item_category = $rowForForTransferredItem['sttr_item_category'];
        $sttr_stock_trans_type = $rowForForTransferredItem['sttr_stock_trans_type'];
        $sttr_quantity = $rowForForTransferredItem['sttr_quantity'];
        $sttr_gs_weight = $rowForForTransferredItem['sttr_gs_weight'];
        $sttr_nt_weight = $rowForForTransferredItem['sttr_nt_weight'];
        $sttr_stone_wt = $rowForForTransferredItem['sttr_stone_wt'];
        $sttr_status = $rowForForTransferredItem['sttr_status'];
        //
        $sttr_prev_item_code_string = $rowForForTransferredItem['sttr_stock_trans_prev_id'];
        $sttr_prev_item_code_array = explode('#', $sttr_prev_item_code_string);
        //
        $previous_firm_name_string = $rowForForTransferredItem['sttr_stock_trans_history'];
        $previous_firm_name_array = explode('#', $previous_firm_name_string);
        //
        $sttr_transfer_date_string = $rowForForTransferredItem['sttr_trans_date'];
        $sttr_transfer_date_array = explode('#', $sttr_transfer_date_string);
        //
        for ($stockTransferCounter = 1; $stockTransferCounter < sizeof($previous_firm_name_array); $stockTransferCounter++) {
            //
            //
            $sttr_transfer_date_time = $sttr_transfer_date_array[$stockTransferCounter];
            $sttr_transfer_date_time_array = explode('-', $sttr_transfer_date_time);
            $sttr_date = trim($sttr_transfer_date_time_array[0]);
            $sttr_transfer_time = $sttr_transfer_date_time_array[1];
            $sttr_transfer_date = strtoupper(date_format(date_create_from_format('d/m/yy', "$sttr_date"), 'd M Y'));
            //
            $previous_firm_id = $previous_firm_name_array[$stockTransferCounter];
            $previous_firm_name = '';
            parse_str(getTableValues("SELECT firm_name AS previous_firm_name FROM firm WHERE firm_id='$previous_firm_id'"));
            //
            $sttr_prev_item_code = $sttr_prev_item_code_array[$stockTransferCounter];
            //
            if ($stockTransferCounter < (sizeof($previous_firm_name_array) - 1)) {
                $firm_id = $previous_firm_name_array[(sizeof($previous_firm_name_array) - 1)];
                $prod_code = $sttr_prev_item_code_array[(sizeof($sttr_prev_item_code_array) - 1)];
                //
                parse_str(getTableValues("SELECT firm_name AS current_firm_name FROM firm WHERE firm_id='$firm_id'"));
            } else {
                $current_firm_name = $firm_name;
                $prod_code = $sttr_item_code;
            }
            //
            $InserIntoTempView = "INSERT into temp_view(
                sttr_sttr_id,sttr_transaction_type,sttr_st_id,sttr_item_code,sttr_prev_item_code,firm_name,previous_firm_name,sttr_metal_type,sttr_purity,sttr_item_category,sttr_stock_trans_type,sttr_quantity,sttr_gs_weight,sttr_nt_weight,sttr_stone_wt,sttr_transfer_date,sttr_transfer_time,
                sttr_status)values(
                '$sttrId','$sttr_transaction_type','$sttr_st_id','$prod_code','$sttr_prev_item_code','$current_firm_name','$previous_firm_name','$sttr_metal_type','$sttr_purity','$sttr_item_category','$sttr_stock_trans_type','$sttr_quantity','$sttr_gs_weight','$sttr_nt_weight','$sttr_stone_wt','$sttr_transfer_date','$sttr_transfer_time',
                '$sttr_status')";
            //
            mysqli_query($conn, $InserIntoTempView) or die('<br/> ERROR:' . mysqli_error($conn));
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
        array('dt' => 'PREV PROD ID'),
        array('dt' => 'CURRENT FIRM'),
        array('dt' => 'PREV FIRM'),
        array('dt' => 'TRANSFER DATE'),
        array('dt' => 'TIME'),
        array('dt' => 'TRANSFER TYPE'),
        array('dt' => 'METAL TYPE'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'QTY'),
        array('dt' => 'GS WEIGHT'),
        array('dt' => 'NT WEIGHT'),
        array('dt' => 'STONE WEIGHT'),
        array('dt' => 'PURITY'),
        array('dt' => 'STATUS')
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
        "st.sttr_item_code",
        "st.sttr_prev_item_code",
        "st.firm_name",
        "st.previous_firm_name",
        "st.sttr_transfer_date",
        "st.sttr_transfer_time",
        "st.sttr_stock_trans_type",
        "st.sttr_metal_type",
        "st.sttr_item_category",
        "st.sttr_quantity",
        "st.sttr_gs_weight",
        "st.sttr_nt_weight",
        "st.sttr_stone_wt",
        "CONCAT(st.sttr_purity,' ','%')",
        "st.sttr_status"
    );
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '9,10,11';
    $_SESSION['dtDeleteColumn'] = '';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "";
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