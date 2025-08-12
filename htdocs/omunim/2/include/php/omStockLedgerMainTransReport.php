<?php
/*
 * **************************************************************************************
 * @tutorial: RAW METAL GOLD TRANSACTION DETAILS @AUTHOR:PRIYANKA-31AUG2021
 * **************************************************************************************
 * 
 * Created on AUG 31, 2021 12:16:08 PM
 *
 * @FileName: omStockLedgerMainTransReport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-31AUG2021
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
<?php
//
// Added Code To GET Firm Details @AUTHOR:PRIYANKA-25OCT2021
$selFirmId = NULL;
//
$firmIdSelected = NULL;
//
$selFirmId = $_REQUEST['firmId'];
//
if (!isset($selFirmId)) {
    $firmIdSelected = $_SESSION['setFirmSession'];
    $selFirmId = $firmIdSelected;
} else {
    $firmIdSelected = $selFirmId;
}
//
//
//echo 'selFirmId == ' . $selFirmId . '<br />';
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'firmIdSelected == ' . $firmIdSelected . '<br />';
//echo 'setFirmSession == ' . $_SESSION['setFirmSession'] . '<br />';
//echo 'documentRoot == ' . $documentRoot . '<br />';
//
//
// Start Code To GET Firm Details @AUTHOR:PRIYANKA-25OCT2021
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR:PRIYANKA-25OCT2021
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'strFrmId == ' . $strFrmId . '<br />';
//echo 'selFirmId == ' . $selFirmId . '<br />';
//
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    if ($_REQUEST['firmId'] != NULL && $_REQUEST['firmId'] != '') {
        $selFirmId = $_REQUEST['firmId'];
    }
}
//
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    //
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type = 'Public' and firm_own_id = '$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr";
    //
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    //
    $qSelFirmCount = "SELECT firm_id, firm_name, firm_type FROM firm where firm_own_id = '$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr order by firm_since desc";
    //
}
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms @AUTHOR:PRIYANKA-25OCT2021
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
// End Code To GET Firm Details @AUTHOR:PRIYANKA-25OCT2021
//
//
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'strFrmId == ' . $strFrmId . '<br />';
//echo 'selFirmId == ' . $selFirmId . '<br />';
//
//
// To Get Owner Id @AUTHOR:PRIYANKA-25OCT2021
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//
//***********************************************************************************************************************
//*************************************START CODE TO ADD NEPALI DATE @RENUKA SHARMA NOV2022******************************//
//***********************************************************************************************************************
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
if ($nepaliDateIndicator == 'YES') {
    $FromDate = $_REQUEST['FromDate'];
    $ToDate = $_REQUEST['ToDate'];
    $startDateArr = explode('-', $FromDate);
    if (is_numeric($startDateArr[1]) || (preg_match('~[0-9]+~', $startDateArr[1]))) {
        $startDateDOB = trim($startDateArr[0]) . '-' . trim($startDateArr[1]) . '-' . trim($startDateArr[2]);
        $nepali_date = new nepali_date();
        $english_date = $nepali_date->get_eng_date($startDateArr[2], $startDateArr[1], $startDateArr[0]);
        $startDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
        $fromDate = date("d M Y", strtotime($startDate));
        $todayFromStrDate = strtotime($fromDate);
    }
    $endDateArr = explode('-', $ToDate);
    if (is_numeric($endDateArr[1]) || (preg_match('~[0-9]+~', $endDateArr[1]))) {
        $endDateDOB = trim($endDateArr[0]) . '-' . trim($endDateArr[1]) . '-' . trim($endDateArr[2]);
        $nepali_date = new nepali_date();
        $english_date = $nepali_date->get_eng_date($endDateArr[2], $endDateArr[1], $endDateArr[0]);
        $endDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
        $toDate = date("d M Y", strtotime($endDate));
        $todayToStrDate = strtotime($toDate);
    }
    if ($FromDate == '' || $FromDate == NULL) {
        $FromDate = date("d-m-Y");
        $fromDate = date("d M Y", strtotime($FromDate));
    }
    if ($ToDate == '' || $ToDate == NULL) {
        $ToDate = date("d-m-Y");
        $toDate = date("d M Y", strtotime($ToDate));
    }
    $todayDate = $fromDate;
    $todayStrDate = strtotime($todayDate);
    //
    //
} else {
    //
    //
    // START DATE @AUTHOR:PRIYANKA-25OCT2021
    $FromDate = $_REQUEST['FromDate'];
    //
    $DateCheck = $FromDate;
    //
    if ($FromDate != '') {
        $fromDate = date("d M Y", strtotime($FromDate));
    }
    //
    if ($FromDate == '' || $FromDate == NULL) {
        $FromDate = date("d-m-Y");
        $fromDate = date("d M Y", strtotime($FromDate));
    }
    //
    //
    // END DATE @AUTHOR:PRIYANKA-25OCT2021
    //
    //
    $ToDate = $_REQUEST['ToDate'];
    //
    $toDate = date("d M Y", strtotime($ToDate));
    //
    if ($ToDate == '' || $ToDate == NULL) {
        $ToDate = date("d-m-Y");
        $toDate = date("d M Y", strtotime($ToDate));
    }
    //
    $todayDate = $fromDate;
    //
    //
    $todayStrDate = strtotime($todayDate);
    //
    // START DATE STR @AUTHOR:PRIYANKA-25OCT2021
    $todayFromStrDate = strtotime($fromDate);
    // END DATE STR @AUTHOR:PRIYANKA-25OCT2021
    //
    $todayToStrDate = strtotime($toDate);
    //
}
// 
// 
// To Get Panel Name @AUTHOR:PRIYANKA-25OCT2021
if ($panelName == '' || $panelName == NULL)
    $panelName = $_REQUEST['panelName'];
//
//
//print_r($_REQUEST);
//echo '<br />';
//
//echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
//echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
//
//
$startDate = strtoupper($fromDate);
$endDate = strtoupper($toDate);
//
//
//echo '$startDate == ' . $startDate . '<br />';
//echo '$endDate == ' . $endDate . '<br />';
//echo '$panelName=='.$panelName.'<br>';
//echo '$selFirmId=='.$selFirmId;
//echo '$documentHttpRootPhp'.$documentRootBSlash;
//
//
?>
<div id="main_ajax_loading_div" style="visibility: hidden; "></div>
<div id="StockLedgerPanelMainDiv" style="padding: 5px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -4px;">
        <tr>
            <td valign="middle" align="left" width="32px">
                <div class="analysis_div_rows">
                    <img src="<?php echo $documentRoot; ?>/images/retail/stockPanel.png" alt=""
                         onload="document.getElementById('FirmName').focus();" />
                </div>
            </td>
            <td valign="middle" align="left" width="0">
                <a class="links" style="cursor: pointer;"
                   onclick="">
                    <!-- Code To Display Stock Ledger Panel Name @AUTHOR:PRIYANKA-25OCT2021-->
                    <div class="textLabelHeading">STOCK LEDGER</div>
                </a>
            </td>
        </tr>
    </table>

    <table id="stockSummaryHeaderTableId" border="0" cellspacing="0" cellpadding="0" align="center" 
           style="margin-top: 0px; margin-bottom: 20px; margin-left: 235px;">       
        <tr>
            <td align="center" valign="middle" width="150px">
                <!-- Code for Firm @AUTHOR:PRIYANKA-25OCT2021-->
                <div class="brown brownMess13Arial" style="margin-left: 70px;">FIRM</div>
            </td>

            <td align="center" width="210px" class="padLeft25">
                <!-- Code for Start Date @AUTHOR:PRIYANKA-25OCT2021-->
                <div class="brown brownMess13Arial" style="margin-right: 20px;">START DATE</div>
            </td>

            <td><div></div></td>

            <td align="center" width="210px">
                <!-- Code for End Date @AUTHOR:PRIYANKA-25OCT2021-->
                <div class="brown brownMess13Arial" style="margin-left: 4px;">END DATE</div>
            </td>
        </tr>

        <tr>
            <td align="left" valign="middle" width="150px">
                <table border="0" cellspacing="0" cellpadding="0" align="right" style="margin-left: 68px;">
                    <tr>
                        <td valign="middle" align="right" class="textBoxCurve1px margin2pxAll backFFFFFF">
                            <div id="selectFirmDiv" class="background_transparent">
                                <?php
                                // Start Code for FIRM @AUTHOR:PRIYANKA-25OCT2021
                                //
                                include 'omStockLedgerFirm.php';
                                //
                                // End Code for FIRM @AUTHOR:PRIYANKA-25OCT2021
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>          
            </td>
            <?php if ($nepaliDateIndicator == 'YES') { ?>
                <td align="center" class="padLeft25">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px; width:93%;">
                        <tr>
                            <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                <?php
                                $date_nepali = $startDateDOB;
                                include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliFromDate.php';
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>

                <td valign="middle" align="center" class="frm-lbl" width="0%">
                    <div align="right" style="margin-left: 12px"> 
                        -- 
                    </div>
                </td>

                <td align="center">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 15px; width:93%;">
                        <tr>
                            <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                <?php
                                $date_nepali = $endDateDOB;
                                include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliToDate.php';
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>

                <td align="center">
                    <!-- Start Code for GO Button @AUTHOR:PRIYANKA-25OCT2021-->
                    <input id="goButton" name="goButton" type="button" style="margin-left:2px;background:#DCEAFF;color:#0F118A;border:1px solid #7ab0fe;height: 32px;width: 60px;border-radius: 3px !important;"
                           onclick="javascript:
                                           searchStockLedgerDetailsNepali(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                   document.getElementById('addItemDOBFromDay'), document.getElementById('addItemDOBFromMonth'), document.getElementById('addItemDOBFromYear'),
                                                   document.getElementById('addItemDOBToDay'), document.getElementById('addItemDOBToMonth'), document.getElementById('addItemDOBToYear'),
                                                   '<?php echo $documentRootBSlash; ?>');
                           "
                           value="GO" class="frm-btn height_25" />
                    <!-- End Code for GO Button @AUTHOR:PRIYANKA-25OCT2021-->
                </td>
            <?php } else { ?>
                <td align="center" class="padLeft25">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px; width:93%;">
                        <tr>
                            <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                <?php
                                // Start Code for START DATE @AUTHOR:PRIYANKA-25OCT2021
                                //
                                $Day = 'FromDay';
                                $Month = 'FromMonth';
                                $Year = 'FromYear';
                                $date = $fromDate;
                                //
                                include 'omstocrptfromdate.php';
                                //
                                // End Code for START DATE @AUTHOR:PRIYANKA-25OCT2021
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>

                <td valign="middle" align="center" class="frm-lbl" width="0%">
                    <div align="right" style="margin-left: 12px"> 
                        -- 
                    </div>
                </td>

                <td align="center">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 15px; width:93%;">
                        <tr>
                            <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                <?php
                                // Start Code for END DATE @AUTHOR:PRIYANKA-25OCT2021
                                //
                                include 'omstocrpttodate.php';
                                //
                                // End Code for END DATE @AUTHOR:PRIYANKA-25OCT2021
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>

                <td align="center">
                    <!-- Start Code for GO Button @AUTHOR:PRIYANKA-25OCT2021-->
                    <input id="goButton" name="goButton" type="button" style="margin-left:2px;background:#DCEAFF;color:#0F118A;border:1px solid #7ab0fe;height: 32px;width: 60px;border-radius: 3px !important;"
                           onclick="javascript:
                                           searchStockLedgerSummaryDatatableReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                           document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                           document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                           '<?php echo $documentRootBSlash; ?>');"
                           value="GO" class="frm-btn height_25" />
                    <!-- End Code for GO Button @AUTHOR:PRIYANKA-25OCT2021-->
                </td>
            <?php } ?>

        </tr>
    </table>
    <?php
    //
    // Start Code for temp_view table @AUTHOR:PRIYANKA-25OCT2021       
    //
    include 'omStockLedgerSummaryMainTransReportView.php';
    //
    // End Code for temp_view table @AUTHOR:PRIYANKA-25OCT2021
    //
    ?>
    <table align="center"  width="100%" border="0" cellspacing="0" cellpadding="0" class="paddingTop10" style="padding: 5px;">
        <?php // echo '$documentRootPath==' .$documentRoot;?>
        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>">
        <div id="myModal" class="modal"></div>
        <?php
        //
        $panel = 'StockLedger';
        //
        //
        //Data Table Main Columns @AUTHOR-PRIYANKA-27OCT2021
        include 'omdatatablesUnset.php';
        //
        //
        //Data Table Main Columns @AUTHOR-PRIYANKA-27OCT2021
        $dataTableCounter = '';
        //
        $_SESSION['dataTableCounter'] = $dataTableCounter;
        //
        $_SESSION['dataTableDivId'] = 'dtTableDivId2';
        //
        //
        $dataTableColumnsFields = array(
            array('dt' . $dataTableCounter => 'FIRM'),
            array('dt' . $dataTableCounter => 'METAL'),
            array('dt' . $dataTableCounter => 'CATEGORY'),
            array('dt' . $dataTableCounter => 'NAME'),
            array('dt' . $dataTableCounter => 'TYPE'),
            array('dt' . $dataTableCounter => 'PURITY'),
            array('dt' . $dataTableCounter => 'OPENING'),
            array('dt' . $dataTableCounter => 'INWARD'),
            array('dt' . $dataTableCounter => 'OUTWARD'),
            array('dt' . $dataTableCounter => 'CLOSING'));
        //
        //
        $dataTableColumnsFieldsInside = array(
            array('dt' . $dataTableCounter => 'QTY'),
            array('dt' . $dataTableCounter => 'GROSS WT'),
            array('dt' . $dataTableCounter => 'NET WT'),
            array('dt' . $dataTableCounter => 'FINE WT'),
        );
        //
        //
        $_SESSION['dataTableColumnsFields' . $dataTableCounter] = $dataTableColumnsFields; // No Change
        $_SESSION['dataTableColumnsFieldsInside' . $dataTableCounter] = $dataTableColumnsFieldsInside; // No Change
        //
        //
        // Table Parameters @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['tableName' . $dataTableCounter] = 'temp_view'; // Table Name
        $_SESSION['tableNamePK' . $dataTableCounter] = 'sttr_id'; // Primary Key
        //
        //
        // DB Table Columns Parameters @AUTHOR-PRIYANKA-27OCT2021
        $dbColumnsArray = array(
            "f.firm_name",
            "IF(sttr_metal_type = 'Gold','GD',IF(sttr_metal_type = 'Silver','SL',sttr_metal_type))",
            "sttr_item_category",
            "sttr_item_name",
            "IF(sttr_stock_type = 'retail','R','W')",
            "sttr_purity",
            "IF(sttr_quantity_open < 0,'0',sttr_quantity_open)",
            "sttr_gs_weight_open",
            "sttr_nt_weight_open",
            "sttr_fine_weight_open",
            "sttr_quantity_in",
            "sttr_gs_weight_in",
            "sttr_nt_weight_in",
            "sttr_fine_weight_in",
            "sttr_quantity_out",
            "sttr_gs_weight_out",
            "sttr_nt_weight_out",
            "sttr_fine_weight_out",
            "sttr_quantity_close",
            "sttr_gs_weight_close",
            "sttr_nt_weight_close",
            "sttr_fine_weight_close");
        //
        //
        $_SESSION['dbColumnsArray' . $dataTableCounter] = $dbColumnsArray;  // No Change
        //
        //
        $_SESSION['multipleColCounter' . $dataTableCounter] = 6;
        //
        //
        if ($_SESSION['sessionProdName'] == 'OMRETL') {
            $_SESSION['dtSumColumn' . $dataTableCounter] = '6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21';
        } else {
            $_SESSION['dtSumColumn' . $dataTableCounter] = '6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21';
        }
        //
        //
        //
        $_SESSION['dtSortColumn'] = '';
        $_SESSION['dtASCDESC'] = '';
        $_SESSION['dtSortColumnName'] = "sttr_item_category,sttr_item_name";
        $_SESSION['dtASCDESCColumnName'] = 'asc,asc';
        //
        //
        // Extra direct columns we need pass in SQL Query @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['sqlQueryColumns' . $dataTableCounter] = "sttr_id, sttr_firm_id, sttr_metal_type, "
                . "sttr_item_category, sttr_item_name, sttr_stock_type, "
                . "sttr_purity, sttr_indicator,";
        //
        //
        //
        $_SESSION['colorfulColumn' . $dataTableCounter] = "";
        $_SESSION['colorfulColumnCheck' . $dataTableCounter] = '';
        $_SESSION['colorfulColumnTitle' . $dataTableCounter] = '';
        //
        //
        // On Click Function Parameters @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnImage' . $dataTableCounter] = "";
        $_SESSION['onclickColumn' . $dataTableCounter] = "sttr_gs_weight_open"; // On which column @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnId' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValue' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunction' . $dataTableCounter] = "getStockLedgerTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionPara4' . $dataTableCounter] = "OpeningDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnFunctionPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-27OCT2021
        //
        //
        // On Click Function Parameters @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnImageTwo' . $dataTableCounter] = "";
        $_SESSION['onclickColumnTwo' . $dataTableCounter] = "sttr_gs_weight_in"; // On which column @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnIdTwo' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValueTwo' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionTwo' . $dataTableCounter] = "getStockLedgerTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionTwoPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionTwoPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionTwoPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionTwoPara4' . $dataTableCounter] = "InwardDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnFunctionTwoPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionTwoPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionTwoPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionTwoPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionTwoPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionTwoPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionTwoPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionTwoPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionTwoPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-27OCT2021
        //
        //
        // On Click Function Parameters @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnImageThr' . $dataTableCounter] = "";
        $_SESSION['onclickColumnThr' . $dataTableCounter] = "sttr_gs_weight_out"; // On which column @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnIdThr' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnValueThr' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionThr' . $dataTableCounter] = "getStockLedgerTransactionsReportPopUp";
        $_SESSION['onclickColumnFunctionThrPara1' . $dataTableCounter] = "sttr_id";
        $_SESSION['onclickColumnFunctionThrPara2' . $dataTableCounter] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionThrPara3' . $dataTableCounter] = $strFrmId;
        $_SESSION['onclickColumnFunctionThrPara4' . $dataTableCounter] = "OutwardDetails"; // Panel Name - OPEN, IN, OUT, CLOSE @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['onclickColumnFunctionThrPara5' . $dataTableCounter] = "sttr_item_category";
        $_SESSION['onclickColumnFunctionThrPara6' . $dataTableCounter] = "sttr_item_name";
        $_SESSION['onclickColumnFunctionThrPara7' . $dataTableCounter] = "sttr_purity";
        $_SESSION['onclickColumnFunctionThrPara8' . $dataTableCounter] = "sttr_metal_type";
        $_SESSION['onclickColumnFunctionThrPara9' . $dataTableCounter] = "sttr_indicator";
        $_SESSION['onclickColumnFunctionThrPara10' . $dataTableCounter] = $startDate;
        $_SESSION['onclickColumnFunctionThrPara11' . $dataTableCounter] = $endDate;
        $_SESSION['onclickColumnFunctionThrPara12' . $dataTableCounter] = $documentRoot;
        $_SESSION['onclickColumnFunctionThrPara13' . $dataTableCounter] = "stockLedger"; // Main Panel Name @AUTHOR-PRIYANKA-27OCT2021
        //
        //
        //
        // Delete Function Parameters @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['deleteColumn' . $dataTableCounter] = ""; // On which column
        $_SESSION['deleteColumnId' . $dataTableCounter] = "";
        $_SESSION['deleteColumnValue' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunction' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara1' . $dataTableCounter] = ""; // Panel Name
        $_SESSION['deleteColumnFunctionPara2' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara3' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara4' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara5' . $dataTableCounter] = "";
        $_SESSION['deleteColumnFunctionPara6' . $dataTableCounter] = "";
        //
        //
        // Where Clause Condition @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['tableWhere' . $dataTableCounter] = " ((sttr_gs_weight_open > 0) || (sttr_gs_weight_in > 0) || "
                . "  (sttr_gs_weight_out > 0) || (sttr_gs_weight_close > 0)) ";
        //
        //
        // Table Joins @AUTHOR-PRIYANKA-27OCT2021
        $_SESSION['tableJoin' . $dataTableCounter] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id ";
        //
        //
        $_SESSION['mainPanelName'] = 'StockLedgerPanel';
        //
        // Data Table Main File @AUTHOR-PRIYANKA-27OCT2021
        include 'omdatatables.php';
        //
        //
        ?>
    </table>
</div>