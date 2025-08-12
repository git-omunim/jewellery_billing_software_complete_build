<?php
/*
 * **************************************************************************************
 * @tutorial: Stock Item Shortfall Report @AUTHOR: MADHUREE-28JUNE2020
 * **************************************************************************************
 * 
 * Created on June 28, 2020 11:00:58 AM
 *
 * @FileName: omstockshfreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<div id="purchaseDetails">
    <?php
    $sttr_firm_id = $_REQUEST['firmId'];
    $panel = 'StockLedger';
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
                            onchange="navigatationPanelByFileName('purchaseDetailsSubDiv', 'omstockshfreport', '', '', '', '', '', '', '', '', '', '', this.value)"
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
    include 'ogstshfview.php';
    ?>
    <div id="purchaseDetailsSubDiv">
        <table  class="width_203mm paddingTop10" border="0" cellspacing="0" cellpadding="0" align="center">
            <?php
            //Data Table Main Columns
            include 'omdatatablesUnset.php';
            //
            $dataTableColumnsFields = array(
                array('dt' => 'FIRM'),
                array('dt' => 'METAL'),
                array('dt' => 'CATEGORY'),
                array('dt' => 'PROD NAME'),
                array('dt' => 'PURCHASE'),
                array('dt' => 'STOCK IN'),
                array('dt' => 'TRANSFERRED IN'),
                array('dt' => 'SELL'),
                array('dt' => 'STOCK OUT'),
                array('dt' => 'AVAILABLE'),
                array('dt' => 'SHORTFALL')
            );
            //
            $dataTableColumnsFieldsInside = array(
                array('dt' => 'QTY'),
                array('dt' => 'GROSS WT'),
                array('dt' => 'NET WT'),
            );
            //
            $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
            $_SESSION['dataTableColumnsFieldsInside'] = $dataTableColumnsFieldsInside; // No Change
            //
            // Table Parameters
            $_SESSION['tableName'] = 'temp_view'; // Table Name
            $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
                "firm_name",
                "CONCAT(sttr_metal_type,' (',sttr_purity,') ')",
                "sttr_item_category",
                "sttr_item_name",
                "purchase_qty",
                "purchase_gswt",
                "purchase_ntwt",
                "open_qty",
                "open_gswt",
                "open_ntwt",
                "transfered_qty",
                "transfered_gswt",
                "transfered_ntwt",
                "sell_qty",
                "sell_gswt",
                "sell_ntwt",
                "out_qty",
                "out_gswt",
                "out_ntwt",
                "available_qty",
                "available_gswt",
                "available_ntwt",
                "shortfall_qty",
                "shortfall_gswt",
                "shortfall_ntwt"
            );
            //
            $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
            $_SESSION['multipleColCounter'] = 4;

            if ($_SESSION['sessionProdName'] == 'OMRETL') {
                $_SESSION['dtSumColumn'] = '1,2,3';
            } else {
                $_SESSION['dtSumColumn'] = '';
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