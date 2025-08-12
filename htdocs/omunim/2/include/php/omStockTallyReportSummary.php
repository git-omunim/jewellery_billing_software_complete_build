<?php
/*
 * **************************************************************************************************
 * @Description: STOCK TALLY REPORT MAIN PAGE @AUTHOR:YUVRAJKAMBLE-18OCT2022
 * **************************************************************************************************
 *
 * Created on 18OCT2022  06:05:58 PM 
 * **************************************************************************************
 * @FileName: omStockTallyReportSummary.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 
 * @version
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:@AUTHOR:YUVRAJKAMBLE-18OCT2022
 *  AUTHOR: YUVRAJ
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
?>
<div id="StockTallyReportPanelMainDiv">
    <?php
//
//
// FOR ALL STOCK LIST @AUTHOR:YUVRAJKAMBLE-11JAN2022
    if ($_REQUEST['subPanelName'] == 'AllStockList') {
        //
    } else if ($_REQUEST['subPanelName'] == 'StockMismatchPanel') {
        //
        // FOR STOCK MISMATCH PANEL @AUTHOR:YUVRAJKAMBLE-20JAN2022
        include 'omStockTallyStockMismatch.php';
    } else {
//
//
// FOR AVAILABLE STOCK LIST @AUTHOR:YUVRAJKAMBLE-11JAN2022
// 
// Added Code To GET Firm Details @AUTHOR:YUVRAJKAMBLE-11OCT2022
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
// Start Code To GET Firm Details @AUTHOR:YUVRAJKAMBLE-11OCT2022
        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            //if not selected assign session firm @AUTHOR:YUVRAJKAMBLE-11OCT2022
            $selFirmId = $_SESSION['setFirmSession'];
        }
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
            //Set String for Public Firms @AUTHOR:YUVRAJKAMBLE-11OCT2022
            while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                $strFrmId = $strFrmId . ",";
                $strFrmId = $strFrmId . "$rowFirm[firm_id]";
            }
        } else {
            $strFrmId = $selFirmId;
        }
// End Code To GET Firm Details @AUTHOR:YUVRAJKAMBLE-11OCT2022
//
//
// To Get Owner Id @AUTHOR:YUVRAJKAMBLE-11OCT2022
        $sessionOwnerId = $_SESSION['sessionOwnerId'];
//
//
// START DATE @AUTHOR:YUVRAJKAMBLE-11OCT2022
        $FromDate = $_REQUEST['FromDate'];
//
        $DateCheck = $FromDate;
//
        if ($FromDate != '') {
            $fromDate = date("d M Y", strtotime($FromDate));
        }
//
        if ($FromDate == '' || $FromDate == NULL) {
            $FromDate = strtoupper(date("d M Y"));
            $fromDate = strtoupper(date("d M Y", strtotime($FromDate)));
        }
//
//
// END DATE @AUTHOR:YUVRAJKAMBLE-11OCT2022
        $ToDate = $_REQUEST['ToDate'];
//
        $toDate = date("d M Y", strtotime($ToDate));
//
        if ($ToDate == '' || $ToDate == NULL) {
            $ToDate = strtoupper(date("d M Y"));
            $toDate = strtoupper(date("d M Y", strtotime($ToDate)));
        }
//
        $todayDate = $fromDate;
//
//
        $todayStrDate = strtotime($todayDate);
//
// START DATE STR @AUTHOR:YUVRAJKAMBLE-11OCT2022
        $todayFromStrDate = strtotime($fromDate);
// END DATE STR @AUTHOR:YUVRAJKAMBLE-11OCT2022
//
        $todayToStrDate = strtotime($toDate);
//
//
// To Get Panel Name @AUTHOR:YUVRAJKAMBLE-11OCT2022
        if ($panelName == '' || $panelName == NULL)
            $panelName = $_REQUEST['panelName'];
//
// Panel Name @AUTHOR:YUVRAJKAMBLE-11OCT2022
        if ($panelName == '' || $panelName == NULL)
            $panelName = 'StockSummaryPanelByCategory';
//
//
//
        $startDate = $fromDate;
        $endDate = $toDate;
//
//
//
//
        $searchColumnMetal = NULL;
        $searchValueMetal = NULL;
        $searchColumnCategory = NULL;
        $searchValueCategory = NULL;
        $searchColumnName = NULL;
        $searchValueName = NULL;
//
        if (isset($_GET['searchColumnMetal'])) {
            $searchColumnMetal = $_GET['searchColumnMetal'];
        }
//
        if (isset($_GET['searchValueMetal'])) {
            $searchValueMetal = $_GET['searchValueMetal'];
        }
//
        if (isset($_GET['searchColumnCategory'])) {
            $searchColumnCategory = $_GET['searchColumnCategory'];
        }
//
        if (isset($_GET['searchValueCategory'])) {
            $searchValueCategory = $_GET['searchValueCategory'];
        }
//
        if (isset($_GET['searchColumnName'])) {
            $searchColumnName = $_GET['searchColumnName'];
        }
//
        if (isset($_GET['searchValueName'])) {
            $searchValueName = $_GET['searchValueName'];
        }
//
//
        ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -12px;position: absolute;">
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
                        <!-- Code To Display Stock Summary Panel Name @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                        <div class="textLabelHeading">STOCK TALLY REPORT </div>
                    </a>
                </td>
            </tr>
        </table>
        <table id="stockSummaryHeaderTableId" border="0" cellspacing="0" cellpadding="0" align="center" 
               style="margin-top: 2px;">       
            <tr>
                <td align="center" valign="middle" width="150px">
                    <!-- Code for Firm @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <div class="brown brownMess13Arial" style="margin-left: 70px;">FIRM</div>
                </td>

                <td align="center" width="210px" class="padLeft25">
                    <!-- Code for Start Date @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <div class="brown brownMess13Arial" style="margin-right: 20px;">START DATE</div>
                </td>

                <td><div></div></td>

                <!--                <td align="center" width="210px">
                     Code for End Date @AUTHOR:YUVRAJKAMBLE-11OCT2022
                    <div class="brown brownMess13Arial" style="margin-left: 4px;">END DATE</div>
                </td>-->
            </tr>

            <tr>
                <td align="left" valign="middle" width="150px">
                    <table border="0" cellspacing="0" cellpadding="0" align="right" style="margin-left: 68px;">
                        <tr>
                            <td valign="middle" align="right" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                <div id="selectFirmDiv" class="background_transparent">
                                    <SELECT class="form-control-select-borderless" 
                                            id="FirmName" name="FirmName" 
                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('FromDay').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('FirmName').focus();
                                                            return false;
                                                        }"
                                            onchange="searchStockTallyReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));">
                                        <OPTION  VALUE="" class="textLabel14CalibriGrey">ALL FIRMS</OPTION>
                                        <?php
                                        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                                            //
                                            $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where "
                                                    . "firm_own_id = '$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                                            //
                                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                            //
                                            while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                                                //
                                                if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                                                    $firmSelected = "selected";
                                                }
                                                //
                                                if ($rowPerFirm['firm_type'] == "Public") {
                                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                                } else {
                                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                                }
                                                //
                                                $firmSelected = "";
                                                //
                                            }
                                        } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                            //
                                            $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type = 'Public' and "
                                                    . "firm_own_id = '$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                                            //
                                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                            //
                                            while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                                                //
                                                if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                                                    $firmSelected = "selected";
                                                }
                                                //
                                                if ($rowPerFirm['firm_type'] == "Public") {
                                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                                } else {
                                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                                                }
                                                //
                                                $firmSelected = "";
                                                //
                                            }
                                        }
                                        ?>
                                    </SELECT>
                                </div>
                            </td>
                        </tr>
                    </table>          
                </td>

                <td align="center" class="padLeft25">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-right: 15px; width:93%;">
                        <tr>
                            <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                <?php
                                // Start Code for START DATE @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                //
                                $Day = 'FromDay';
                                $Month = 'FromMonth';
                                $Year = 'FromYear';
                                $date = $fromDate;
                                //
                                include 'omstocrptfromdateTally.php';
                                //
                                // End Code for START DATE @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- <td valign="middle" align="center" class="frm-lbl" width="0%">
                    <div align="right" style="margin-left: 12px"> 
                        -- 
                    </div>
                </td> -->

                <!-- <td align="center">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 15px; width:93%;">
                        <tr>
                            <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10">
                                <?php
                                // Start Code for END DATE @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                //
                                //include 'omstocrpttodateTally.php';
                                //
                                // End Code for END DATE @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                ?>
                            </td>
                        </tr>
                    </table>
                </td> -->

                <td align="center">
                    <!-- Start Code for GO Button @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <input id="goButton" name="goButton" type="button" style="margin-left: 16px;"
                           onclick="javascript:searchStockTallyRFIDNewSummaryReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                               document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                               document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));
                                       return false;"
                           value="GO" class="frm-btn height_25" />
                    <!-- End Code for GO Button @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                </td>

            </tr>
        </table>
        <table id="stockSummaryMainTableId" align="center" border="0" cellspacing="1" cellpadding="2" width="100%" 
               style="table-layout: fixed;width: 99%;margin: 15px auto;border: 1px dashed #6c6c6c;border-top-color: rgb(108, 108, 108);border-top: 0;" >
                   <?php
                   //
                   //
                   $todayDate = date(d) . ' ' . strtoupper(date(M)) . ' ' . date(Y);
                   $todayDateStr = strtotime($todayDate);
                   //
                   //
                   if ($todayFromStrDate == $todayToStrDate) {
//            echo "todayFromStrDate:- ".$todayFromStrDate.'<br>'; // todayFromStrDate:- 1668796200 X 
                       $dateStrsttr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
                       //
                       $dateRangeStrForOpeningsttr = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
                       $dateStrForOpeningsttr = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
                       $dateStrForTodayOutwardssttr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
                       //===========================================================================================================
                       $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))=$todayFromStrDate ";
                       $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))=$todayFromStrDate ";
                       //
                       $dateRangeStrForBookOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
                       //
                       $dateStrForBookOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";

                       //
                       $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate ";
                       $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate ";
                         $dateStrForTodayOutwardrfid = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
                   } else {
                       $arrFromDate = explode('-', $FromDate);
                       $dayFromDate = $arrFromDate[0];
                       $monthFromDate = strtoupper($arrFromDate[1]);
                       $yearFromDate = $arrFromDate[2];
                       $newDayFromDate = ($dayFromDate - 1);
                       $newTodayFromDate = $newDayFromDate . '-' . $monthFromDate . '-' . $yearFromDate;
                       $newFromDate = date("d M Y", strtotime($newTodayFromDate));
                       $newTodayFromStrDate = strtotime($newFromDate);
                       //
                       $dateRangeStrForOpeningsttr = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate) ";
                       $dateStrForOpeningsttr = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate) ";
                       $dateStrsttr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       $dateStrForTodayOutwardssttr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       //
                       $dateRangeStrForOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate) ";
//            $dateStrForOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate) ";
                       $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                       //
                       $dateRangeStrForBookOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate) ";
                       //
                       $dateStrForBookOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate) ";
                          $dateStrForTodayOutwardrfid = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
                   }
                   //
                   //
                   // DATE STR FOR OPENING OUTWARD @AUTHOR:YUVRAJKAMBLE-12JAN2022
                   $dateStrForOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(rfidtly_scan_date,'%d %b %Y'))<=$todayFromStrDate ";
                   $dateStrForOutwardssttr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
                   $dateStrForBookOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
                   //
                   //echo '$searchValueMetal == ' . $searchValueMetal . '<br />';
                   //
                   // SEARCH BY METAL STR @AUTHOR:YUVRAJKAMBLE-21OCT2022
                   if ($searchValueMetal != 'METAL' && $searchValueMetal != '' && $searchValueMetal != NULL) {
                       $searchByColumnMetalStr = " and rfidtly_metal_type LIKE '$searchValueMetal%' ";
                   } else {
                       $searchByColumnMetalStr = NULL;
                   }
                   //
                   //echo '$searchByColumnMetalStr == ' . $searchByColumnMetalStr . '<br />';
                   //
                   //
                   // SEARCH BY CATEGORY STR @AUTHOR:YUVRAJKAMBLE-21OCT2022
                   if ($searchValueCategory != 'CATEGORY' && $searchValueCategory != '' && $searchValueCategory != NULL) {
                       $searchByColumnCategoryStr = " and rfidtly_product_category LIKE '$searchValueCategory%' ";
                   } else {
                       $searchByColumnCategoryStr = NULL;
                   }
                   //
                   //echo '$searchByColumnCategoryStr == ' . $searchByColumnCategoryStr . '<br />';
                   //
                   //
                   // SEARCH BY NAME STR @AUTHOR:YUVRAJKAMBLE-21OCT2022
                   if ($searchValueName != 'NAME' && $searchValueName != '' && $searchValueName != NULL) {
                       $searchByColumnNameStr = " and rfidtly_product_name LIKE '$searchValueName%' ";
                   } else {
                       $searchByColumnNameStr = NULL;
                   }
                   //
                   //echo '$searchByColumnNameStr == ' . $searchByColumnNameStr . '<br />';
                   //
                   //
                   // SEARCH BY METAL, CATEGORY AND NAME STR @AUTHOR:YUVRAJKAMBLE-21OCT2022
                   $finalSearchByColumnStr = " $searchByColumnMetalStr $searchByColumnCategoryStr $searchByColumnNameStr ";
                   //
                   //echo '$finalSearchByColumnStr == ' . $finalSearchByColumnStr . '<br />';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//***********************************************************************************************************
// START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY BOOK STOCK 
//***********************************************************************************************************
                   $openingBookStockDetView = "CREATE TABLE TEMP_OPENING_BOOK_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OpeningBookQTYOp, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OpeningBookGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OpeningBookGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OpeningBookGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OpeningBookGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OpeningBookNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OpeningBookNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OpeningBookNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OpeningBookNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OpeningBookFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OpeningBookFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OpeningBookFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OpeningBookFnWeightCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                           . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG','ItemReturn' ,'ESTIMATE')"
                           . "and ( ($dateStrForBookOpening) or ($dateRangeStrForBookOpening) ) "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$openingStockDetView == ' . $openingBookStockDetView . '<br /><br />';
//
                   $resOpeningStockBookDetView = mysqli_query($conn, $openingBookStockDetView);
//***********************************************************************************************************
// START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING BOOK OUTWARD @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
                   $outwardStockBookDetView = "CREATE TABLE TEMP_OPENING_BOOK_OUTWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OutwardBookQTYOp, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OutwardBookGsWeightOpMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OutwardBookGsWeightOpGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OutwardBookGsWeightOpKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OutwardBookGsWeightOpCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OutwardBookNtWeightOpMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OutwardBookNtWeightOpGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OutwardBookNtWeightOpKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OutwardBookNtWeightOpCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OutwardBookFnWeightOpMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OutwardBookFnWeightOpGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OutwardBookFnWeightOpKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OutwardBookFnWeightOpCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id, sttr_transaction_type "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                           . "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                           . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "
                           . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
                           . "$dateStrForBookOutwards "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//                   echo '$closingoutwardStockDetView == ' . $outwardStockBookDetView . '<br /><br />';
//
                   $resoutwardStockBookDetView = mysqli_query($conn, $outwardStockBookDetView);
                   
                   //echo '$sessionOwnerId == ' . $sessionOwnerId . '<br />';
                   //echo '$strFrmId == ' . $strFrmId . '<br />';
                   //echo '$dateStrForOpening == ' . $dateStrForOpening . '<br />';
                   //echo '$dateRangeStrForOpening == ' . $dateRangeStrForOpening . '<br />';die;
//
//***********************************************************************************************************
// END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING BOOK OUTWARD @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
//***********************************************************************************************************
// START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
                   $openingStockDetView = "CREATE TABLE TEMP_OPENING_STOCK AS SELECT "
                           . "SUM(rfidtly_quantity) AS OpeningQTYOp, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'MG', rfidtly_gs_weight,0)) AS OpeningGsWeightMG, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'GM', rfidtly_gs_weight,0)) AS OpeningGsWeightGM, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'KG', rfidtly_gs_weight,0)) AS OpeningGsWeightKG, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'CT', rfidtly_gs_weight,0)) AS OpeningGsWeightCT, "
                           . "SUM(IF(rfidtly_nt_weight_type = 'MG', rfidtly_nt_weight,0)) AS OpeningNtWeightMG, "
                           . "SUM(IF(rfidtly_nt_weight_type = 'GM', rfidtly_nt_weight,0)) AS OpeningNtWeightGM, "
                           . "SUM(IF(rfidtly_nt_weight_type = 'KG', rfidtly_nt_weight,0)) AS OpeningNtWeightKG, "
                           . "SUM(IF(rfidtly_nt_weight_type = 'CT', rfidtly_nt_weight,0)) AS OpeningNtWeightCT, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'MG', rfidtly_fine_weight,0)) AS OpeningFnWeightMG, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'GM', rfidtly_fine_weight,0)) AS OpeningFnWeightGM, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'KG', rfidtly_fine_weight,0)) AS OpeningFnWeightKG, "
                           . "SUM(IF(rfidtly_gs_weight_type = 'CT', rfidtly_fine_weight,0)) AS OpeningFnWeightCT, "
                           . "rfidtly_owner_id, rfidtly_indicator, rfidtly_product_category, rfidtly_product_name, "
                           . "rfidtly_stock_type, rfidtly_purity, rfidtly_metal_type, rfidtly_firm_id , rfidtly_reporting_preiod "
                           . "FROM rfid_tally "
                           . "WHERE rfidtly_owner_id = '$sessionOwnerId' "
                           . "and rfidtly_firm_id IN ($strFrmId) "
                           . "and rfidtly_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                           . "and rfidtly_transaction_type IN ('EXISTING', 'PURBYSUPP', 'PURONCASH', 'TAG') "
                           . "and rfidtly_reporting_preiod IN ('DONE') "
                           . "and rfidtly_open_report IN ('Y') "
                           . "and ( ($dateStrForOpening) or ($dateRangeStrForOpening) )"
                           . " "
                           . "GROUP BY rfidtly_firm_id, rfidtly_product_category, rfidtly_product_name, rfidtly_stock_type, rfidtly_metal_type, rfidtly_purity ";
//
//echo '$openingStockDetView == ' . $openingStockDetView . '<br /><br />';
//
                   $resOpeningStockDetView = mysqli_query($conn, $openingStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING @AUTHOR:YUVRAJKAMBLE-07DEC2022 
//***********************************************************************************************************
//***********************************************************************************************************
// START CODE FOR CODE FOR STOCK RFID STOCK TALLY  SUMMARY CALCULATE closing stock 
//***********************************************************************************************************
                   $closingStockDetView = "CREATE TABLE TEMP_CLOSING_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS ClosingStQTYOp, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS ClosingStGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS ClosingStGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS ClosingStGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS ClosingStGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS ClosingStNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS ClosingStNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS ClosingStNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS ClosingStNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS ClosingStFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS ClosingStFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS ClosingStFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS ClosingStFnWeightCT, "
                           . " sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id  "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id='$sessionOwnerId'"
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                           . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG','ItemReturn' ,'ESTIMATE')"
                           . "and ( ($dateStrForBookOpening) or ($dateRangeStrForBookOpening) ) "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$closingStockDetView == ' . $closingStockDetView . '<br /><br />';
//
                   $resClosingStockDetView = mysqli_query($conn, $closingStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK RFID STOCK TALLY  SUMMARY CALCULATE closing stock 
//***********************************************************************************************************
//
//***********************************************************************************************************
// START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
                   $outwardStockDetView = "CREATE TABLE TEMP_OPENING_OUTWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OutwardQTYOp, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OutwardGsWeightOpMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OutwardGsWeightOpGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OutwardGsWeightOpKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OutwardGsWeightOpCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OutwardNtWeightOpMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OutwardNtWeightOpGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OutwardNtWeightOpKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OutwardNtWeightOpCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OutwardFnWeightOpMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OutwardFnWeightOpGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OutwardFnWeightOpKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OutwardFnWeightOpCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id, sttr_transaction_type "
                           . "FROM stock_transaction "
                            . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                           . "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                           . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "
                           . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
                           . "$dateStrForOutwardssttr "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
                          //
//echo '$outwardStockDetView == ' . $outwardStockDetView . '<br /><br />';
//
                   $resOutwardStockDetView = mysqli_query($conn, $outwardStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING OUTWARD @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
//
//
//
//
//***********************************************************************************************************
// START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE TODAY OUTWARD @AUTHOR:YUVRAJKAMBLE-18DEC2022
//***********************************************************************************************************
                  $todayOutwardStockDetView = "CREATE TABLE TEMP_TODAY_OUTWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS OutwardQTY, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OutwardGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OutwardGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OutwardGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OutwardGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OutwardNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OutwardNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OutwardNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OutwardNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OutwardFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OutwardFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OutwardFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OutwardFnWeightCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           . "and sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                           . "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
                           . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "
                           . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
                           . "$dateStrForTodayOutwardrfid "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$todayOutwardStockDetView == ' . $todayOutwardStockDetView . '<br /><br />';
//
                   $resTodayOutwardStockDetView = mysqli_query($conn, $todayOutwardStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE TODAY OUTWARD @AUTHOR:YUVRAJKAMBLE-18DEC2022
//***********************************************************************************************************
//
 $inwardStockDetView = "CREATE TABLE TEMP_INWARD_STOCK AS SELECT "
                           . "SUM(sttr_quantity) AS SumOfInwardQTY, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS SumOfInwardGsWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS SumOfInwardGsWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS SumOfInwardGsWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS SumOfInwardGsWeightCT, "
                           . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS SumOfInwardNtWeightMG, "
                           . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS SumOfInwardNtWeightGM, "
                           . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS SumOfInwardNtWeightKG, "
                           . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS SumOfInwardNtWeightCT, "
                           . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS SumOfInwardFnWeightMG, "
                           . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS SumOfInwardFnWeightGM, "
                           . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS SumOfInwardFnWeightKG, "
                           . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS SumOfInwardFnWeightCT, "
                           . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
                           . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id "
                           . "FROM stock_transaction "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "and sttr_firm_id IN ($strFrmId) "
                           //. "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
                           //. "and sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
                           . "and sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP', 'ItemReturn') "
                           . "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'ItemReturn') "
                           . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
                           . "$dateStrsttr "
                           . "GROUP BY sttr_firm_id, sttr_item_category, sttr_item_name, sttr_stock_type, sttr_metal_type, sttr_purity ";
//
//echo '$inwardStockDetView == ' . $inwardStockDetView . '<br />';
//
                   $resInwardStockDetView = mysqli_query($conn, $inwardStockDetView);
//
//***********************************************************************************************************
// START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE INWARD @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
                 
//***********************************************************************************************************
// END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE INWARD @AUTHOR:YUVRAJKAMBLE-07DEC2022
//***********************************************************************************************************
                   // Start Code To Fetch All Records - Group By rfidtly_product_category @AUTHOR:YUVRAJKAMBLE-11OCT2022
                   $stockReportMainQuery = "SELECT * FROM rfid_tally WHERE rfidtly_owner_id = '$sessionOwnerId' "
                           . "and rfidtly_firm_id IN ($strFrmId) "
                           . "and rfidtly_indicator IN ('AddInvoice', 'stock', 'imitation', 'RetailStock', 'crystal' , 'strsilver') "
                           . "and rfidtly_status NOT IN ('DELETED','NotDelFromStock') "
                           . "and rfidtly_transaction_type IN ('PURONCASH', 'PURBYSUPP', 'EXISTING', 'TAG') and rfidtly_reporting_preiod = 'DONE' and rfidtly_open_report = 'Y' "
                           . " $finalSearchByColumnStr "
                           . "GROUP BY rfidtly_firm_id, rfidtly_product_category, rfidtly_product_name, rfidtly_stock_type, rfidtly_metal_type, rfidtly_purity "
                           . "ORDER BY rfidtly_product_category, rfidtly_product_name ASC ";
                   //
//        echo '$stockReportMainQuery == ' . $stockReportMainQuery . '<br />';
                   //
                   $resStockReportMainQuery = mysqli_query($conn, $stockReportMainQuery);
                   // 
                   // 
                   // Number of Records @AUTHOR:YUVRAJKAMBLE-11OCT2022
                   $noOfRecordsAvailable = mysqli_num_rows($resStockReportMainQuery);
//          echo 'noOfRecordsAvailable == ' . $noOfRecordsAvailable . '<br />';
                   // 
                   //
                   if ($noOfRecordsAvailable == 0) {
                       ?>
                <tr>
                    <td valign="middle" align="center">
                        <div class="textLabelHeading" style="font-size: 12px;">~ NO RECORDS FOUND ~</div>
                    </td>
                </tr>
                <?php
            }
            //
            // COUNTER @AUTHOR:YUVRAJKAMBLE-11OCT2022
            $counter = 1;
            $srNo = 1;
            //
            $totalOpeningQty = 0;
            $totalOpeningGsWt = 0;
            $totalOpeningNtWt = 0;
            $totalOpeningFnWt = 0;
            $totalInwardQty = 0;
            $totalInwardGsWt = 0;
            $totalInwardNtWt = 0;
            $totalInwardFnWt = 0;
            $totalOutwardQty = 0;
            $totalOutwardGsWt = 0;
            $totalOutwardNtWt = 0;
            $totalOutwardFnWt = 0;
            $totalClosingQty = 0;
            $totalClosingGsWt = 0;
            $totalClosingNtWt = 0;
            $totalClosingFnWt = 0;
            $totstquantity = 0;
            //
            $totalOpeningBookQty = 0;
            $totalOpeningBookGsWt = 0;
            $totalOpeningBookNtWt = 0;
            $totalOpeningBookFnWt = 0;
            //$totalClosingStQty
            $totalClosingStQty = 0;
            $totalClosingStGsWt = 0;
            $totalClosingStNtWt = 0;
            $totalClosingStFnWt = 0;
            $totalClosingBookQty = 0;
            //
            $totalClosingScanQty = 0;
            $totalClosingScanGsWt = 0;
            $totalClosingScanNtWt = 0;
            $totalClosingScanFnWt = 0;
            //
            //
            while ($rowStockReportMainQuery = mysqli_fetch_array($resStockReportMainQuery)) {
                //
                // CATEGORY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                $Category = $rowStockReportMainQuery['rfidtly_product_category'];
                //
                // NAME @AUTHOR:YUVRAJKAMBLE-11OCT2022
                $Name = $rowStockReportMainQuery['rfidtly_product_name'];
                $FirmName = $rowStockReportMainQuery['rfidtly_firm_id'];
                //
                // STOCK TYPE @AUTHOR:YUVRAJKAMBLE-11OCT2022
                $StockType = $rowStockReportMainQuery['rfidtly_stock_type'];
                $rfidtly_scan_status = $rowStockReportMainQuery['rfidtly_scan_status'];
                //
                // PURITY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                $Purity = $rowStockReportMainQuery['rfidtly_purity'];
                //
                // INDICATOR @AUTHOR:YUVRAJKAMBLE-11OCT2022
                $Indicator = $rowStockReportMainQuery['rfidtly_indicator'];
                //
                // METAL TYPE @AUTHOR:YUVRAJKAMBLE-11OCT2022
                $MetalType = $rowStockReportMainQuery['rfidtly_metal_type'];
                // rfidtly_reporting_preiod @AUTHOR:YUVRAJKAMBLE-17112022
                $rfidtlyReportingPreiod = $rowStockReportMainQuery['rfidtly_reporting_preiod'];
                $rfidtly_scan_date = $rowStockReportMainQuery['rfidtly_scan_date'];
                //
                //
                //echo '$searchColumnMetal == ' . $searchColumnMetal . '<br />';
                //echo '$searchValueMetal == ' . $searchValueMetal . '<br />';
                //
                //
                if ($counter == 1) {
                    ?>
                    <tr class="bc_grey">
                        <td align="left" style="background-color: rgb(255, 227, 145) !important; width: 5%; border-top: 1px dashed #ce7300; border-bottom: 1px dashed #ce7300;">
                            <div class="brown brownMess13Arial" style="font-size: 12px; margin-left: 5px;">SNO.</div>
                        </td>

                        <td align="left" style="background-color: rgb(255, 227, 145) !important; width: 6%; border-top: 1px dashed #ce7300; border-bottom: 1px dashed #ce7300;  ">
                            <div class="brown brownMess13Arial" style="font-size: 12px; margin-left: 5px;">
                                <input id="metalType" type="text" name="metalType" 
                                       placeholder="METAL" style="font-size: 12px;"
                                       value = "<?php
                                       if ($searchColumnMetal == 'rfidtly_metal_type')
                                           echo $searchValueMetal;
                                       else
                                           echo 'METAL';
                                       ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                                   if (document.getElementById('metalType').value != '') {
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('metalType').value = '<?php
                                       if ($searchValueMetal == 'rfidtly_metal_type')
                                           echo $searchValueMetal;
                                       else
                                           echo 'METAL';
                                       ?>';
                                                           }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('metalType').value != '') {
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           }"
                                       size = "4" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                            </div>
                        </td>

                        <!-- Start Code for CATEGORY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                        <td align="left" style="background-color: rgb(255, 227, 145) !important;  border-top: 1px dashed #ce7300; border-bottom: 1px dashed #ce7300; width: 10%; ">
                            <div class="brown brownMess13Arial" style="font-size: 12px; margin-left: 5px;">
                                <input id="itemCategory" type="text" name="itemCategory" 
                                       placeholder="CATEGORY" style="font-size: 12px;"
                                       value = "<?php
                                       if ($searchColumnCategory == 'rfidtly_product_category')
                                           echo $searchValueCategory;
                                       else
                                           echo 'CATEGORY';
                                       ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                                   if (document.getElementById('itemCategory').value != '') {
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('itemCategory').value = '<?php
                                       if ($searchValueCategory == 'rfidtly_product_category')
                                           echo $searchValueCategory;
                                       else
                                           echo 'CATEGORY';
                                       ?>';
                                                           }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('itemCategory').value != '') {
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           }"
                                       size = "8" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                            </div>
                        </td>
                        <!-- End Code for CATEGORY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->

                        <td align="left" style="background-color: rgb(255, 227, 145) !important; width: 3%; border-top: 1px dashed #ce7300; border-bottom: 1px dashed #ce7300; width: 10%; ">
                            <div class="brown brownMess13Arial" style="font-size: 12px; margin-left: 5px;">
                                <input id="itemName" type="text" name="itemName" 
                                       placeholder="NAME" style="font-size: 12px;"
                                       value = "<?php
                                       if ($searchColumnName == 'rfidtly_product_name')
                                           echo $searchValueName;
                                       else
                                           echo 'NAME';
                                       ?>"
                                       onclick = "javascript:this.value = '';"
                                       onblur = "javascript:
                                                                   if (document.getElementById('itemName').value != '') {
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           } else {
                                                               document.getElementById('itemName').value = '<?php
                                       if ($searchValueName == 'rfidtly_product_name')
                                           echo $searchValueName;
                                       else
                                           echo 'NAME';
                                       ?>';
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           }"
                                       onkeyup = "if (event.keyCode == 13 && document.getElementById('itemName').value != '') {
                                                               searchStockTallySummaryReportDetailsByColumn(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                                                       document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                                       document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'),
                                                                       'rfidtly_metal_type', document.getElementById('metalType').value,
                                                                       'rfidtly_product_category', document.getElementById('itemCategory').value,
                                                                       'rfidtly_product_name', document.getElementById('itemName').value);
                                                               return false;
                                                           }"
                                       size = "4" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial"/>
                            </div>
                        </td>

                        <td align="left" style="background-color: rgb(255, 227, 145) !important; width: 6%; border-top: 1px dashed #ce7300; border-bottom: 1px dashed #ce7300;">
                            <div class="brown brownMess13Arial" style="font-size: 12px; margin-left: 5px;">PURITY</div>
                        </td>


                        <!-- Start Code for OPENING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                        <td colspan="6" align="center"  style="background-color: rgb(223, 223, 223) !important; width: 40%; border-top: 1px dashed #8a8a8a; border-bottom: 1px dashed #8a8a8a; width: 40%;">
                            <div class="brown brownMess13Arial" style="font-size: 14px;">OPENING</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;" titletooltipScanedQty="BOOKS QUANTITY" id="tooltipScanedQty">
                                        <!-- OPENING QUANTITY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">BQTY</div>
                                    </td>
                                    <td align="center" style="width: 22%;" titletooltipScanedQty="SCAN QUANTITY" id="tooltipScanedQty">
                                        <!-- OPENING QUANTITY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">SQTY</div>
                                    </td>
                                    <td align="center" style="width: 40%;">
                                        <!-- OPENING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- OPENING NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- OPENING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">FN WT</div>
                                    </td>
                                    <td align="center" style="width: 40%;">
                                        <!-- CLOSING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">STATUS</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- End Code for OPENING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->

                        <!-- Start Code for INWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                        <td colspan="6" align="center" style="background-color: rgb(194, 247, 163) !important;width: 40%;border-top: 1px dashed #669947;border-bottom: 1px dashed #669947; width: 40%;">
                            <div class="brown brownMess13Arial" style="font-size: 14px;">IN</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;">
                                        <!-- INWARD QUANTITY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">QTY</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- INWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- INWARD NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- INWARD FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">FN WT</div>
                                    </td>

                                </tr>
                            </table>
                        </td>
                        <!-- End Code for INWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->

                        <!-- Start Code for OUTWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                        <td colspan="6" align="center" style="background-color: rgb(255, 200, 94) !important; width: 40%; border-top: 1px dashed #dd6b0a; border-bottom: 1px dashed #dd6b0a; width: 40%; width: 1px dashed #dd6b0a; width: 1px dashed #dd6b0a; width: 40%; width: 1px dashed #dd6b0a; width: 1px dashed #dd6b0a; width: 40%;">
                            <div class="brown brownMess13Arial" style="font-size: 14px;">OUT</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;">
                                        <!-- OUTWARD QUANTITY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">QTY</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- OUTWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- OUTWARD NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- OUTWARD FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">FN WT</div>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- Start Code for CLOSING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                        <td colspan="6" align="center" style="background-color: rgb(191, 225, 255) !important; width: 40%; border-top: 1px dashed #1b7fd5; border-bottom: 1px dashed #0f76ce; width: 40%;">
                            <div class="brown brownMess13Arial" style="font-size: 14px;">CLOSING</div>
                            <table align="center" border="1" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 5px; table-layout: fixed; width: 100%;">
                                <tr>
                                    <td align="center" style="width: 22%;" titletooltipScanedQty="BOOKS QUANTITY" id="tooltipScanedQty">
                                        <!-- OPENING QUANTITY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">BQTY</div>
                                    </td>
                                    <td align="center" style="width: 22%;" titletooltipScanedQty="SCAN QUANTITY" id="tooltipScanedQty">
                                        <!-- OPENING QUANTITY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">SQTY</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- CLOSING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">GS WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- CLOSING NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">NT WT</div>
                                    </td>

                                    <td align="center" style="width: 40%;">
                                        <!-- CLOSING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">FN WT</div>
                                    </td>
                                    <td align="center" style="width: 40%;">
                                        <!-- CLOSING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                                        <div class="brown brownMess13Arial" style="font-size: 12px;">STATUS</div>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- End Code for CLOSING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    </tr>
                    <?php
                } $counter = 2;
                //
                //
                //echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
                //echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
                //echo '$startDate == ' . $startDate . '<br />';
                //echo '$endDate == ' . $endDate . '<br />';
                //
                //
                ////***********************************************************************************************************
                // START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY BOOK STOCK CALCULATION
                // ********************************************************************************************************
                // 
                include 'omStocktallySummarybookstockCal.php';
                //***********************************************************************************************************
                // START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING @AUTHOR:YUVRAJKAMBLE-29DEC2022
                //***********************************************************************************************************
                //
                include 'omStocktallySummaryOpeningCal.php';
                //
                //***********************************************************************************************************
                // END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OPENING @AUTHOR:YUVRAJKAMBLE-29DEC2022
                //***********************************************************************************************************
                //
                //
                //
                //
                //***********************************************************************************************************
                // START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE INWARD @AUTHOR:YUVRAJKAMBLE-12JAN2022
                //***********************************************************************************************************
                //
//        include 'omStockLedgerSummaryInwardCal.php';
                include 'omStocktallySummaryInwardCal.php';
                //                                               
                //***********************************************************************************************************
                // END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE INWARD @AUTHOR:YUVRAJKAMBLE-12JAN2022
                //***********************************************************************************************************
                //
                //
                //
                //
                //***********************************************************************************************************
                // START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OUTWARD @AUTHOR:YUVRAJKAMBLE-12JAN2022
                //***********************************************************************************************************
                //
//        include 'omStockLedgerSummaryOutwardCal.php';
                include 'omStocktallySummaryOutwardCal.php';
                //
                //***********************************************************************************************************
                // END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE OUTWARD @AUTHOR:YUVRAJKAMBLE-12JAN2022
                //***********************************************************************************************************
                //
                //
                // //***********************************************************************************************************
                // START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE FOR CLOSE STOCK
                //***********************************************************************************************************
                //
//                    include 'omStockLedgerSummaryClosingCal.php';
//                  include 'omStockTallySummaryClosingStockCal.php';
                //
                //***********************************************************************************************************
                // END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE  FOR CLOSE STOCK
                //***********************************************************************************************************
                //echo '$OpeningGsWeight == ' . $OpeningGsWeight . '<br />';
                //echo '$InwardGsWeight == ' . $InwardGsWeight . '<br />';
                //echo '$OutwardGsWeight == ' . $OutwardGsWeight . '<br />';
                //
                if ($OpeningGsWeight > 0 || $InwardGsWeight > 0 || $OutwardGsWeight > 0) {
                    ?>
                    <tr>
                    <div id = "myModal<?php echo $rowStockReportMainQuery['rfidtly_rfid_id']; ?>" class = "modal"></div>

                    <td align="left" style="background-color: rgb(255, 206, 79); width: 5%; ">
                        <div style="font-size: 11px;font-weight: bold;margin-left: 2px;color:#000;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($srNo); ?>
                            </a>-->
                            <?php echo strtoupper($srNo); ?>
                        </div>
                    </td>

                    <td align="left" style="background-color: rgb(255, 206, 79); width: 6%; ">
                        <div style="font-size: 11px;font-weight: bold;margin-left: 2px;color:#000;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($MetalType); ?>
                            </a>-->
                            <?php echo strtoupper($MetalType); ?>
                        </div>
                    </td>

                    <!-- Start Code for CATEGORY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <td align="left" style="background-color: rgb(255, 206, 79); width: 15%; ">
                        <div style="font-size: 11px;font-weight: bold;margin-left: 2px;color:#000;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($Category); ?>
                            </a>-->
                            <?php echo strtoupper($Category); ?>
                        </div>
                    </td>
                    <!-- End Code for CATEGORY @AUTHOR:YUVRAJKAMBLE-11OCT2022-->

                    <td align="left" style="background-color: rgb(255, 206, 79); width: 15%;">
                        <div style="font-size: 11px;font-weight: bold;margin-left: 2px;color:#000;">
                            <!--<a style="cursor: pointer;">
                            <?php echo strtoupper($Name); ?>
                            </a>-->
                            <?php echo strtoupper($Name); ?>
                        </div>
                    </td>

                    <td align="center" style="background-color: rgb(255, 206, 79); width: 10%;">
                        <div style="font-size: 11px;font-weight: bold;color:#000;">
                            <?php echo strtoupper($Purity); ?>
                        </div>
                    </td>



                    <!-- Start Code for OPENING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <td colspan="6" align="center" style="font-size: 13px;background-color: rgb(221, 221, 221); width: 40%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">

                            <tr>
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <div id = "myModal" class = "modal" style="display: none;"></div>
                                        <a style="cursor: pointer;" 
                                           onclick="OpenRFIDReportModal('<?php echo 'OPEN STOCK'; ?>', '<?php echo $Category; ?>');
                                                               return false" > <?php
                                               if ($OpeningBookQTY == 0 || $OpeningBookQTY < 0) {
                                                   echo '-';
                                               } else {
                                                   echo $OpeningBookQTY;
                                               }
                                               ?>
                                        </a>
                                    </div>
                                </td>
                                <!-------------CODE FOR SCAN STOCK--------------------------->
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // OPENING QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($OpeningQTY == 0 || $OpeningQTY < 0 ) {
                                            echo '-';
                                        } else {
                                            echo $OpeningQTY;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <!-------------CODE FOR SCAN STOCK--------------------------->
                                <?php
                                //
                                //echo 'rfidtly_id #==# ' . $rowStockReportMainQuery['rfidtly_id']; 
                                //
                                ?>

                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php if ($OpeningBookGsWeight > 0) { ?>
                                            <a style="cursor: pointer;" 
                                               onclick="getStockSummaryTransactionsReportPopUpRfidTally('<?php echo $rowStockReportMainQuery[rfidtly_rfid_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'OpeningDetails', '<?php echo $documentRoot; ?>', 'StockReportRfidPanel', '<?php echo $rowStockReportMainQuery[rfidtly_product_code]; ?>');">
                                                   <?php
                                                   // OPENING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                                   if ($OpeningBookGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($OpeningBookGsWeight > 0) {
                                                           echo decimalVal($OpeningBookGsWeight, 2) . '/' . decimalVal($OpeningGsWeight, 2);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <!--<a 
                                            <?php if ($OpeningBookGsWeight > 0 && $StockType != 'wholesale') { ?>
                                                                                                    style="cursor: pointer;" 
                                                                                                    onclick="getStockSummaryTransactionsReportPopUpRfidTally('<?php echo $rowStockReportMainQuery[rfidtly_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'OpeningDetails', '<?php echo $documentRoot; ?>','StockReportRfidPanel');"
                                            <?php } ?> >
                                            <?php
                                            // OPENING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022 $OpeningBookNtWeight
                                            if ($OpeningBookGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($OpeningBookGsWeight > 0) {
                                                    echo decimalVal($OpeningBookGsWeight, 2) . '/' . decimalVal($OpeningGsWeight, 2);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                            </a>-->
                                            <?php
                                            // OPENING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                            if ($OpeningBookGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($OpeningBookGsWeight > 0) {
                                                    echo decimalVal($OpeningBookGsWeight, 2) . '/' . decimalVal($OpeningGsWeight, 2);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>                               
                                        <?php } ?>
                                    </div>
                                </td>

                                <?php
                                //echo 'rfidtly_id *==* ' . $rowStockReportMainQuery['rfidtly_id']; 
                                ?>

                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php
                                        // OPENING NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($OpeningNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OpeningNtWeight > 0) {
                                                echo decimalVal($OpeningNtWeight, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php
                                        // OPENING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($OpeningFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OpeningFnWeight > 0) {
                                                echo decimalVal($OpeningFnWeight, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                                <?php if ($OpeningBookQTY == $OpeningQTY) {
                                    ?>  <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:green;width:10px;height:10px;"></div>
                                        </div>
                                    </td>

                                <?php } else { ?>
                                    <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:red;width:10px;height:10px; "></div>
                                        </div>
                                    </td>

                                <?php }  // } else{        ?>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for OPENING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->

                    <!-- Start Code for INWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(213, 249, 191) !important; width: 40%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">                    

                            <tr>
                                <td align="center" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // INWARD QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($InwardQTY == 0 || $InwardQTY < 0) {
                                            echo '-';
                                        } else {
                                            echo $InwardQTY;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php if ($InwardGsWeight > 0 && $StockType != 'wholesale') { ?>
                                            <a style="cursor: pointer;" 
                                               onclick="getStockSummaryTransactionsReportPopUpRfidTally('<?php echo $rowStockReportMainQuery[rfidtly_rfid_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'InwardDetails', '<?php echo $documentRoot; ?>', 'StockReportRfidPanel', '<?php echo $rowStockReportMainQuery[rfidtly_product_code]; ?>');">
                                                   <?php
                                                   // INWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                                   if ($InwardGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($InwardGsWeight > 0) {
                                                           echo decimalVal($InwardGsWeight, 2);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <?php
                                            // INWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                            if ($InwardGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($InwardGsWeight > 0) {
                                                    echo decimalVal($InwardGsWeight, 2);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                        <?php } ?>    
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php
                                        // INWARD NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($InwardNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($InwardNtWeight > 0) {
                                                echo decimalVal($InwardNtWeight, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php
                                        // INWARD FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($InwardFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($InwardFnWeight > 0) {
                                                echo decimalVal($InwardFnWeight, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                            </tr>
                        </table>
                    </td>
                    <!------------------------------End Code for INWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022------------------------------->
                    <!------------------------------Start Code for OUTWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022---------------------------->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(255, 228, 177) !important; width: 40%; " 
                        >
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">

                            <tr>
                                <td align="center" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // OUTWARD QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($OutwardQTY == 0 || $OutwardQTY < 0) {
                                            echo '-';
                                        } else {
                                            echo $OutwardQTY;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php if ($OutwardGsWeight > 0) { ?>
                                            <a style="cursor: pointer;" 
                                               onclick="getStockSummaryTransactionsReportPopUpRfidTally('<?php echo $rowStockReportMainQuery[rfidtly_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'OutwardDetails', '<?php echo $documentRoot; ?>', 'StockReportRfidPanel');">
                                                   <?php
                                                   // OUTWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                                   if ($OutwardGsWeight == 0) {
                                                       echo '-';
                                                   } else {
                                                       if ($OutwardGsWeight > 0) {
                                                           echo decimalVal($OutwardGsWeight, 2);
                                                       } else {
                                                           echo '-';
                                                       }
                                                   }
                                                   ?>
                                            </a>
                                        <?php } else { ?>
                                            <?php
                                            // OUTWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                            if ($OutwardGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($OutwardGsWeight > 0) {
                                                    echo decimalVal($OutwardGsWeight, 2);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                        <?php } ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php
                                        // OUTWARD NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($OutwardNtWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OutwardNtWeight > 0) {
                                                echo decimalVal($OutwardNtWeight, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php
                                        // OUTWARD FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($OutwardFnWeight == 0) {
                                            echo '-';
                                        } else {
                                            if ($OutwardFnWeight > 0) {
                                                echo decimalVal($OutwardFnWeight, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for OUTWARDS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->

                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(209, 234, 255) !important; width: 40%;" 
                        >
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                                   <?php
                                   //
                                   //
                                   //***********************************************************************************************************
                                   // START CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE CLOSING @AUTHOR:YUVRAJKAMBLE-25OCT2022
                                   //***********************************************************************************************************
                                   //
//                    include 'omStockLedgerSummaryClosingCal.php';
//                                   include 'omStockTallySummaryClosingCal.php';
                                   include 'omStockTallySummaryClosingBookCal.php';
                                   //
                                   //
                                   //***********************************************************************************************************
                                   // END CODE FOR STOCK RFID STOCKM TALLY  SUMMARY CALCULATE CLOSING @AUTHOR:YUVRAJKAMBLE-25OCT2022
                                   //***********************************************************************************************************
                                   //
                                   //$ClosingStQTYOp
                                   ?>
                                   <?php
                                  
                                   // Start Code To Fetch All Records - Group By RFID TALLY TABLE  @AUTHOR:YUVRAJ-05112022
                                   $stockReportMainQueryLast = "SELECT "
                                           . "SUM(rfidtly_quantity) AS ClosingRfidTallyQTYOp, "
                                           . "SUM(rfidtly_gs_weight) AS ClosingRfidTallyTotalGsWeight, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'MG', rfidtly_gs_weight,0)) AS ClosingRfidTallyGsWeightMG, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'GM', rfidtly_gs_weight,0)) AS ClosingRfidTallyGsWeightGM, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'KG', rfidtly_gs_weight,0)) AS ClosingRfidTallyGsWeightKG, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'CT', rfidtly_gs_weight,0)) AS ClosingRfidTallyGsWeightCT, "
                                           . "SUM(IF(rfidtly_nt_weight_type = 'MG', rfidtly_nt_weight,0)) AS ClosingRfidTallyNtWeightMG, "
                                           . "SUM(IF(rfidtly_nt_weight_type = 'GM', rfidtly_nt_weight,0)) AS ClosingRfidTallyNtWeightGM, "
                                           . "SUM(IF(rfidtly_nt_weight_type = 'KG', rfidtly_nt_weight,0)) AS ClosingRfidTallyNtWeightKG, "
                                           . "SUM(IF(rfidtly_nt_weight_type = 'CT', rfidtly_nt_weight,0)) AS ClosingRfidTallyNtWeightCT, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'MG', rfidtly_fine_weight,0)) AS ClosingRfidTallyFnWeightMG, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'GM', rfidtly_fine_weight,0)) AS ClosingRfidTallyFnWeightGM, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'KG', rfidtly_fine_weight,0)) AS ClosingRfidTallyFnWeightKG, "
                                           . "SUM(IF(rfidtly_gs_weight_type = 'CT', rfidtly_fine_weight,0)) AS ClosingRfidTallyFnWeightCT "
                                           . "FROM rfid_tally "
                                           . "WHERE rfidtly_owner_id = '$sessionOwnerId' "
                                           . "and rfidtly_firm_id = '$FirmName' "
                                           . "and rfidtly_product_category = '$Category' "
                                           . "and rfidtly_product_name = '$Name' "
                                           . "and rfidtly_stock_type = '$StockType' "
                                           . "and rfidtly_purity = '$Purity' "
                                           . "and rfidtly_reporting_preiod = 'DONE' "
                                           . "and rfidtly_close_report = 'Y' "
                                           . "and rfidtly_metal_type = '$MetalType' ";
                                   //
//                                   echo '$stockReportMainQueryLast'.$stockReportMainQueryLast;
                                   $resStockReportMainQueryLast = mysqli_query($conn, $stockReportMainQueryLast);
                                   //
                                   $noOfRecordsAvailableLast = mysqli_num_rows($resStockReportMainQueryLast);
                                   $rowStockReportMainQueryLast = mysqli_fetch_array($resStockReportMainQueryLast)
                                   //
//        echo $stockReportMainQueryLast;
//        echo $noOfRecordsAvailableLast;
                                   ?>
                            <tr>

                                <?php
                                // while ($rowStockReportMainQueryLast = mysqli_fetch_array($resStockReportMainQueryLast)) {
                                $ClosingRfidTallyScanQTYOp = $rowStockReportMainQueryLast['ClosingRfidTallyQTYOp'];
                                $ClosingRfidTallyTotalGsWeight = $rowStockReportMainQueryLast['ClosingRfidTallyTotalGsWeight'];
                                //
                                $ClosingRfidTallyGsWeightMG = $rowStockReportMainQueryLast['ClosingRfidTallyGsWeightMG'];
                                $ClosingRfidTallyGsWeightGM = $rowStockReportMainQueryLast['ClosingRfidTallyGsWeightGM'];
                                $ClosingRfidTallyGsWeightKG = $rowStockReportMainQueryLast['ClosingRfidTallyGsWeightKG'];
                                $ClosingRfidTallyGsWeightCT = $rowStockReportMainQueryLast['ClosingRfidTallyGsWeightCT'];
                                //
                                $totalGswt = $ClosingRfidTallyGsWeightMG + $ClosingRfidTallyGsWeightGM + $ClosingRfidTallyGsWeightKG + $ClosingRfidTallyGsWeightCT;
                                $totalGswt = decimalVal($totalGswt, 2);
                                //
                                $ClosingRfidTallyNtWeightMG = $rowStockReportMainQueryLast['ClosingRfidTallyNtWeightMG'];
                                $ClosingRfidTallyNtWeightGM = $rowStockReportMainQueryLast['ClosingRfidTallyNtWeightGM'];
                                $ClosingRfidTallyNtWeightKG = $rowStockReportMainQueryLast['ClosingRfidTallyNtWeightKG'];
                                $ClosingRfidTallyNtWeightCT = $rowStockReportMainQueryLast['ClosingRfidTallyNtWeightCT'];
                                //
                                $totalNtwt = $ClosingRfidTallyNtWeightMG + $ClosingRfidTallyNtWeightGM + $ClosingRfidTallyNtWeightKG + $ClosingRfidTallyNtWeightCT;
                                $totalNtwt = decimalVal($totalNtwt, 2);
                                //
                                $ClosingRfidTallyFnWeightMG = $rowStockReportMainQueryLast['ClosingRfidTallyFnWeightMG'];
                                $ClosingRfidTallyFnWeightGM = $rowStockReportMainQueryLast['ClosingRfidTallyFnWeightGM'];
                                $ClosingRfidTallyFnWeightKG = $rowStockReportMainQueryLast['ClosingRfidTallyFnWeightKG'];
                                $ClosingRfidTallyFnWeightCT = $rowStockReportMainQueryLast['ClosingRfidTallyFnWeightCT'];
                                //
                                $totalFnwt = $ClosingRfidTallyFnWeightMG + $ClosingRfidTallyFnWeightGM + $ClosingRfidTallyFnWeightKG + $ClosingRfidTallyFnWeightCT;
                                $totalFnwt = decimalVal($totalNtwt, 2);
                                //
                                $ClosingGsWeightTally = decimalVal($ClosingGsWeight, 2);
                                $totalClosingScanQty += $ClosingRfidTallyScanQTYOp;
                                $totalClosingScanGsWt += $totalGswt;
                                $totalClosingScanNtWt += $totalNtwt;
                                $totalClosingScanFnWt += $totalFnwt;

                                //
                                // }
                                ?>
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        if ($ClosingBookQTY   == 0 || $ClosingBookQTY   < 0) {
                                            echo '-';
                                        } else {
                                            echo $ClosingBookQTY ;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <!-------------CODE FOR SCAN STOCK--------------------------->
                                <td align="left" style="padding-left: 4px; width: 22%;">
                                    <div>
                                        <?php
                                        // CLOSING QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($ClosingRfidTallyScanQTYOp == 0 || $ClosingRfidTallyScanQTYOp < 0) {
                                            echo '-';
                                        } else {
                                            echo $ClosingRfidTallyScanQTYOp;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <!-------------CODE FOR SCAN STOCK--------------------------->
                                <td align="left" style="padding-right: 5px; width: 40%;">
                                    <div>
                                        <?php if ($ClosingBookGsWeight > 0 && $StockType != 'wholesale') { ?>
                                            <!--                                <a style="cursor: pointer;" 
                                                                               onclick="
                                                                   //getStockSummaryTransactionsReportPopUpRfidTally('<?php echo $rowStockReportMainQuery[rfidtly_id]; ?>', '<?php echo $todayFromStrDate; ?>', '<?php echo $todayToStrDate; ?>', '<?php echo strtoupper($startDate); ?>', '<?php echo strtoupper($endDate); ?>', '<?php echo $strFrmId; ?>', '<?php echo $Category; ?>', '<?php echo $Name; ?>', '<?php echo $StockType; ?>', '<?php echo $Purity; ?>', 'ClosingDetails', '<?php echo $documentRoot; ?>','StockReportRfidPanel');
                                                                                                         ">-->
                                            <?php
                                            // CLOSING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                            if ($ClosingBookGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($ClosingBookGsWeight > 0) {
                                                    echo decimalVal($ClosingBookGsWeight, 2) . '/' . decimalVal($totalGswt, 2);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            ?>
                                            <!--</a>-->
                                        <?php } else { ?>
                                            <?php
                                            //
                                            // CLOSING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                            if ($ClosingBookGsWeight == 0) {
                                                echo '-';
                                            } else {
                                                if ($ClosingBookGsWeight > 0) {
                                                    echo decimalVal($ClosingBookGsWeight, 2) . '/' . decimalVal($totalGswt, 2);
                                                } else {
                                                    echo '-';
                                                }
                                            }
                                            //
                                            ?>
                                        <?php } ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 0px; width: 40%;">
                                    <div>
                                        <?php
                                        // CLOSING NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalNtwt == 0) {
                                            echo '-';
                                        } else {
                                            if ($totalNtwt > 0) {
                                                echo decimalVal($totalNtwt, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="left" style="padding-right: 5px; width: 26%;">
                                    <div>
                                        <?php
                                        // CLOSING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalFnwt == 0) {
                                            echo '-';
                                        } else {
                                            if ($totalFnwt > 0) {
                                                echo decimalVal($totalFnwt, 2);
                                            } else {
                                                echo '-';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                                <?php if ($ClosingRfidTallyScanQTYOp == $ClosingBookQTY) {
                                    ?>  <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:green;width:10px;height:10px;"></div>
                                        </div>
                                    </td>

                                <?php } else { ?>
                                    <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:red;width:10px;height:10px; "></div>
                                        </div>
                                    </td>

                                <?php }  // } else{        ?>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for CLOSING BALANCE @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <!-- Start Code for CLOSING BALANCE MACTHED TO RFID TALLY TABLE @AUTHOR:YUVRAJ -05112022-->
                    <td colspan="6" align="center" style="font-size: 13px; background-color: rgb(255, 214, 214) !important; width: 40%;" >
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">

                            </tr>
                        </table>
                    </td>
                    <!-- End Code for CLOSING BALANCE MACTHED TO RFID TALLY TABLE @AUTHOR:YUVRAJ -05112022-->
                    </tr>
                    <?php
                    //
                    $srNo++;
                    //
                }
            }
            //
            // End Code To Fetch All Records - Group By rfidtly_product_category @AUTHOR:YUVRAJKAMBLE-11OCT2022 
            //
            ?>

            <?php if ($noOfRecordsAvailable > 0) { ?>
                <tr>
                    <td colspan="28" style='display:none;'>
                        <div class="hrGrey" style="width: 100%; margin-top: 1px; margin-bottom: 0px;"></div>
                    </td>
                </tr>

                <tr>
                    <!-- Start Code for TOTALS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <td colspan="5" align="left" width="12%" style="border: 1px dashed #dba10b;background: #ffe391;padding: 5px;">
                        <div class="brown brownMess13Arial" 
                             style="font-size: 12px;font-weight: bold;margin-left: 5px;">TOTAL : </div>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(223, 223, 223) !important;width: 40%;border: 1px dashed #666060;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOpeningQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalOpeningBookQty;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOpeningQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalOpeningQty;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022 $totalOpeningBookNtWt
                                        if ($totalOpeningGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOpeningBookGsWt, 2) . '/' . decimalVal($totalOpeningGsWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOpeningNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOpeningNtWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OPENING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOpeningFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOpeningFnWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>
                                <?php if ($totalOpeningBookQty == $totalOpeningQty) {
                                    ?>  <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:green;width:10px;height:10px;"></div>
                                        </div>
                                    </td>

                                <?php } else { ?>
                                    <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:red;width:10px;height:10px; "></div>
                                        </div>
                                    </td>

                                <?php }  // } else{        ?>
                            </tr>
                        </table>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(198, 249, 169) !important; width: 40%; border: 1px dashed #649348;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="center" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalInwardQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalInwardQty;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalInwardGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalInwardGsWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalInwardNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalInwardNtWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL INWARD FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalInwardFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalInwardFnWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td colspan="6" align="center" style="background-color: rgb(255, 200, 94) !important;width: 40%;border: 1px dashed #b57804;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="center" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOutwardQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalOutwardQty;
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOutwardGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOutwardGsWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOutwardNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOutwardNtWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL OUTWARD FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalOutwardFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalOutwardFnWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td colspan="6" align="center"  style="background-color: rgb(164, 211, 255) !important;width: 40%;border: 1px dashed #2c7dc8;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" 
                               style="margin-top: 5px; font-size: 14px ! important; table-layout: fixed; width: 100%;">
                            <tr>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        
                                        // TOTAL CLOSING QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalClosingBookQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalClosingBookQty;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td align="left" style="padding-left: 4px; padding-right: 3px; width: 22%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING QTY @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalClosingScanQty == 0) {
                                            echo '-';
                                        } else {
                                            echo $totalClosingScanQty;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td align="right" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING GS WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalClosingBookGsWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalClosingBookGsWt,2).'/'.decimalVal($totalClosingScanGsWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 40%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING NT WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalClosingScanNtWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalClosingScanNtWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td align="center" style="padding-right: 5px; width: 26%;">
                                    <div class="brown brownMess13Arial" style="font-size: 13px !important;">
                                        <?php
                                        // TOTAL CLOSING FN WT @AUTHOR:YUVRAJKAMBLE-11OCT2022
                                        if ($totalClosingScanFnWt == 0) {
                                            echo '-';
                                        } else {
                                            echo decimalVal($totalClosingScanFnWt, 2);
                                        }
                                        ?>
                                    </div>
                                </td>
                                <?php if ($totalClosingScanQty == $totalClosingBookQty) {
                                    ?>  <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:green;width:10px;height:10px;"></div>
                                        </div>
                                    </td>

                                <?php } else { ?>
                                    <td align="center" style="padding-right: 5px; width: 40%;">
                                        <div>
                                            <div style="background-color:red;width:10px;height:10px; "></div>
                                        </div>
                                    </td>

                                <?php }  // } else{        ?>
                            </tr>
                        </table>
                    </td>
                    <!-- End Code for TOTALS @AUTHOR:YUVRAJKAMBLE-11OCT2022-->
                    <td colspan="6" align="center"  style="background-color: rgb(255, 200, 200) !important;width: 40%;border: 1px dashed #2c7dc8;">

                    </td>
                </tr>

                <tr>
                    <td colspan="28" style='display:none;'>
                        <div class="hrGrey" style="width: 100%; margin-top: 1px; margin-bottom: 0px;"></div>
                    </td>
                </tr>              
                <?php
            }
            //
            //
            // DROP TEMP_OPENING_STOCK TABLE @AUTHOR:YUVRAJKAMBLE-07DEC2022
            $dropTempOpStock = "DROP table TEMP_OPENING_STOCK";
            mysqli_query($conn, $dropTempOpStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            // DROP TEMP_OPENING_OUTWARD_STOCK TABLE @AUTHOR:YUVRAJKAMBLE-07DEC2022
            $dropTempOpeningOutStock = "DROP table TEMP_OPENING_OUTWARD_STOCK";
            mysqli_query($conn, $dropTempOpeningOutStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            // DROP TEMP_TODAY_OUTWARD_STOCK TABLE @AUTHOR:YUVRAJKAMBLE-07DEC2022
            $dropTempTodayOutStock = "DROP table TEMP_TODAY_OUTWARD_STOCK";
            mysqli_query($conn, $dropTempTodayOutStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            // DROP TEMP_INWARD_STOCK TABLE @AUTHOR:YUVRAJKAMBLE-07DEC2022
            $dropTempInStock = "DROP table TEMP_INWARD_STOCK";
            mysqli_query($conn, $dropTempInStock) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            $dropTempInStockBook = "DROP table TEMP_OPENING_BOOK_STOCK";
            mysqli_query($conn, $dropTempInStockBook) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            $dropTempInStockoutwardBook = "DROP table TEMP_OPENING_BOOK_OUTWARD_STOCK";
            mysqli_query($conn, $dropTempInStockoutwardBook) or die('<br/> ERROR:' . mysqli_error($conn));
            //
            //
            //
            $dropClosingStockBook = "DROP table TEMP_CLOSING_STOCK";
            mysqli_query($conn, $dropClosingStockBook) or die('<br/> ERROR:' . mysqli_error($conn));
            // TEMP_CLOSING_STOCK
            ?>
        </table>
    <?php } ?>
</div>