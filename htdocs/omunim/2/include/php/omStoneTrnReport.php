<?php
/*
 *
 * Created on on 2 AUG 2021 : 5:30 PM
 * 
 * @FileName: omstonetrnreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.92
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 * Copyright 2018 SoftwareGen, Inc
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
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<?php
//
if ($suppPanelName == '')
    $suppPanelName = $_GET['panel'];
//
if ($suppPanelName == '')
    $suppPanelName = $_GET['panelName'];
//
$PanelLabelType = $_GET['indicator'];
//
$custId = $_GET['custId'];
//
$firmId = $_GET['firmId'];
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if($nepaliDateIndicator == 'YES'){
$stock_date_col = "stone_other_lang_date";
}else{
    $stock_date_col = "stone_date";
}

?>
<style>
    .thBorder .trBorder{
        border: 1px solid black; 
    }
</style>
<div class="card" style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff; margin-top: 10px;">
    <div class="card-body">
        <div class="card" style="padding: 10px;" style="border-radius: 5px !important;">
            <div class="card-header" style="border-radius: 5px;color:#E56717; font-size: 18px; font-weight:bold; background: #f1f1f1;">
                <table width="100%">
                    <tr>
                        <td align="left" width="50%">  STONE TRANSACTION REPORT </td>
                        <td align="right" style="float:right;" width="50%"> 
                            <button align="right" class="btn" style="padding:7px; border-radius: 4px !important; background-color: #add779; color:#fff;font-weight: bold;"
                                    onclick="openStoneConsReport('<?php echo $custId; ?>', '<?php echo $firmId ?>');">
                                STONE CONSOLIDATE
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class='card-body'>
                <?php
                include 'ogstonefview.php';
                ?>
                <div id="purchaseDetailsSubDiv">
                    <table  class="width_203mm paddingTop10" border="0" cellspacing="0" cellpadding="0" align="center">
                        <?php
                        //Data Table Main Columns
                        include 'omdatatablesUnset.php';
                        //
                        $dataTableColumnsFields = array(
                            array('dt' => 'DATE'),
                            array('dt' => 'CATEGORY'),
                            array('dt' => 'DETAILS'),
                            array('dt' => 'OPENING/[REV'),
                            array('dt' => 'IN'),
                            array('dt' => 'OUT'),
                            array('dt' => 'CLOSING')
                        );
                        //
//                        $dataTableColumnsFieldsInside = array(
//                            array('dt' => 'QTY'),
//                            array('dt' => 'GROSS WT'),
//                            array('dt' => 'NET WT'),
//                        );
                        //
                        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//                        $_SESSION['dataTableColumnsFieldsInside'] = $dataTableColumnsFieldsInside; // No Change
                        //
            // Table Parameters
                        $_SESSION['tableName'] = 'temp_view'; // Table Name
                        $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
                        // DB Table Columns Parameters 
                        $dbColumnsArray = array(
                            "$stock_date_col",
                            "sttr_item_category",
                            "sttr_item_name",
                            "abs(round(open_gswt,3))",
                            "abs(round(purchase_gswt,3))",
                            "abs(round(sell_gswt,3))",
                            "abs(round(available_gswt,3))" 
                        );
                        //
                        $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
                        $_SESSION['multipleColCounter'] = 4;

                        if ($_SESSION['sessionProdName'] == 'OMRETL') {
                            $_SESSION['dtSumColumn'] = '5,6,7';
                        } else {
                            $_SESSION['dtSumColumn'] = '3,4,5,6';
                        }
                        $_SESSION['dtSortColumn'] = '1,2';
                        $_SESSION['dtDeleteColumn'] = '';
                        $_SESSION['dtASCDESC'] = 'desc,desc';
                        //
                        // Extra direct columns we need pass in SQL Query
                        $_SESSION['sqlQueryColumns'] = "";
                        //
                        //
            //
            $_SESSION['colorfulColumn'] = "";
                        $_SESSION['colorfulColumnCheck'] = '';
                        $_SESSION['colorfulColumnTitle'] = '';
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
                        // Where Clause Condition 
                        $_SESSION['tableWhere'] = "";
                        // Table Joins
                        $_SESSION['tableJoin'] = "";
                        // Data Table Main File
                        include 'omdatatables.php';
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>