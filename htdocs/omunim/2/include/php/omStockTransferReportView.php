<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK TRANSFER REPORT VIEW @AUTHOR:PRIYANKA-04DEC2021
 * **************************************************************************************
 * 
 * Created on DEC 04, 2021 06:29:20 PM
 *
 * @FileName: omStockTransferReportView.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-04DEC2021
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
include_once 'conversions.php';
include_once 'ommpfndv.php';
?>
<?php
//
//
// Added Code To GET Firm Details @AUTHOR:PRIYANKA-04DEC2021
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
// Start Code To GET Firm Details @AUTHOR:PRIYANKA-04DEC2021
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR:PRIYANKA-04DEC2021
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
    //Set String for Public Firms @AUTHOR:PRIYANKA-04DEC2021
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
// End Code To GET Firm Details @AUTHOR:PRIYANKA-04DEC2021
//
//
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'strFrmId == ' . $strFrmId . '<br />';
//echo 'selFirmId == ' . $selFirmId . '<br />';
//
//
if ($selectedFirm != '' && $selectedFirm != NULL) {
    $strFrmId = $selectedFirm;
}
//
//
// START DATE @AUTHOR:PRIYANKA-04DEC2021
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
// END DATE @AUTHOR:PRIYANKA-04DEC2021
$ToDate = $_REQUEST['ToDate'];
//
$toDate = date("d M Y", strtotime($ToDate));
//
if ($ToDate == '' || $ToDate == NULL) {
    $ToDate = date("d-m-Y");
    $toDate = date("d M Y", strtotime($ToDate));
}
//
//
$todayDate = $fromDate;
//
//
$todayStrDate = strtotime($todayDate);
//
// START DATE STR @AUTHOR:PRIYANKA-04DEC2021
$todayFromStrDate = strtotime($fromDate);
// END DATE STR @AUTHOR:PRIYANKA-04DEC2021
//
$todayToStrDate = strtotime($toDate);
//
//
//print_r($_REQUEST);
//echo '<br />';
//echo '$todayFromStrDate == ' . $todayFromStrDate . '<br />';
//echo '$todayToStrDate == ' . $todayToStrDate . '<br />';
//
//
$startDate = $fromDate;
$endDate = $toDate;
//
//
//echo '$startDate == ' . $startDate . '<br />';
//echo '$endDate == ' . $endDate . '<br />';
//
//
//
//
$todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
$todayDateStr = strtotime($todayDate);
//
//
if ($todayFromStrDate == $todayToStrDate) {
    //
    $dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
    //
    $dateStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
    //
    // Code for DATE STR @AUTHOR:PRIYANKA-21FEB2022
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
    //
    $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))=$todayFromStrDate ";
    //
} else {
    //
    //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    //$dateRangeStrForOpening = "UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<=$todayFromStrDate ";
    //
    //
    //echo '$FromDate == ' . $FromDate . '<br />';
    //
    //
    $arrFromDate = explode('-', $FromDate);
    //
    $dayFromDate = $arrFromDate[0];
    $monthFromDate = strtoupper($arrFromDate[1]);
    $yearFromDate = $arrFromDate[2];
    //
    $newDayFromDate = ($dayFromDate - 1);
    //
    $newTodayFromDate = $newDayFromDate . '-' . $monthFromDate . '-' . $yearFromDate;
    //
    //
    //echo '$newTodayFromDate == ' . $newTodayFromDate . '<br />';
    //
    //
    $newFromDate = date("d M Y", strtotime($newTodayFromDate));
    $newTodayFromStrDate = strtotime($newFromDate);
    //
    //
    $dateRangeStrForOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate) ";
    //
    $dateStrForOpening = "(UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate) ";
    //
    // Code for DATE STR @AUTHOR:PRIYANKA-21FEB2022
    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
    // DATE STR FOR TODAY OUTWARD @AUTHOR:PRIYANKA-21FEB2022
    $dateStrForTodayOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate ";
    //
}
//
// 
// DATE STR FOR OPENING OUTWARD @AUTHOR:PRIYANKA-21FEB2022
$dateStrForOutwards = "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<$todayFromStrDate ";
//
//
//echo '$dateRangeStrForOpening == ' . $dateRangeStrForOpening . '<br />';
//echo '$dateStrForOpening == ' . $dateStrForOpening . '<br />';
//echo '$dateStr == ' . $dateStr . '<br />';
//echo '$dateStrForOutwards == ' . $dateStrForOutwards . '<br />';
//
//
//
//$stockTransferStatusStr = " and sttr_stock_transfer_status = 'COMPLETED' ";
//
$stockTransferStatusStr = "";
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR CREATE TEMP VIEW TABLE FOR STOCK TRANSFER REPORT @AUTHOR:PRIYANKA-04DEC2021        //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
$createView = "CREATE TABLE IF NOT EXISTS temp_view ("
            . "sttr_id                         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"            
            . "sttr_firm_id                    VARCHAR(50),"
            . "sttr_metal_type                 VARCHAR(50),"
            . "sttr_item_category              VARCHAR(100),"
            . "sttr_item_name                  VARCHAR(100),"
            . "sttr_stock_type                 VARCHAR(50),"
            . "sttr_purity                     VARCHAR(50),"        
            . "sttr_indicator                  VARCHAR(50),"
            . "sttr_staff_id                   VARCHAR(50),"
            . "sttr_counter_name               VARCHAR(50),"
            . "sttr_quantity_open              VARCHAR(50),"
            . "sttr_gs_weight_open             VARCHAR(50),"
            . "sttr_nt_weight_open             VARCHAR(50),"            
            . "sttr_fine_weight_open           VARCHAR(50),"
            . "sttr_quantity_in                VARCHAR(50),"
            . "sttr_gs_weight_in               VARCHAR(50),"
            . "sttr_nt_weight_in               VARCHAR(50),"            
            . "sttr_fine_weight_in             VARCHAR(50),"
            . "sttr_quantity_out               VARCHAR(50),"
            . "sttr_gs_weight_out              VARCHAR(50),"
            . "sttr_nt_weight_out              VARCHAR(50),"            
            . "sttr_fine_weight_out            VARCHAR(50),"
            . "sttr_quantity_close             VARCHAR(50),"
            . "sttr_gs_weight_close            VARCHAR(50),"
            . "sttr_nt_weight_close            VARCHAR(50),"            
            . "sttr_fine_weight_close          VARCHAR(50),"
            . "srNo                            VARCHAR(25))";
// 
$sqlTable = 'DESC temp_view';
//
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
//
//
//***********************************************************************************************************
// START CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
$openingStockDetView = "CREATE TABLE TEMP_OPENING_STOCK AS SELECT "
        . "SUM(sttr_quantity) AS OpeningQTYOp, "
        . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_gs_weight,0)) AS OpeningGsWeightMG, "
        . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_gs_weight,0)) AS OpeningGsWeightGM, "
        . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_gs_weight,0)) AS OpeningGsWeightKG, "
        . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_gs_weight,0)) AS OpeningGsWeightCT, "
        . "SUM(IF(sttr_nt_weight_type = 'MG', sttr_nt_weight,0)) AS OpeningNtWeightMG, "
        . "SUM(IF(sttr_nt_weight_type = 'GM', sttr_nt_weight,0)) AS OpeningNtWeightGM, "
        . "SUM(IF(sttr_nt_weight_type = 'KG', sttr_nt_weight,0)) AS OpeningNtWeightKG, "
        . "SUM(IF(sttr_nt_weight_type = 'CT', sttr_nt_weight,0)) AS OpeningNtWeightCT, "
        . "SUM(IF(sttr_gs_weight_type = 'MG', sttr_fine_weight,0)) AS OpeningFnWeightMG, "
        . "SUM(IF(sttr_gs_weight_type = 'GM', sttr_fine_weight,0)) AS OpeningFnWeightGM, "
        . "SUM(IF(sttr_gs_weight_type = 'KG', sttr_fine_weight,0)) AS OpeningFnWeightKG, "
        . "SUM(IF(sttr_gs_weight_type = 'CT', sttr_fine_weight,0)) AS OpeningFnWeightCT, "
        . "sttr_owner_id, sttr_indicator, sttr_item_category, sttr_item_name, "
        . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id, "
        . "sttr_staff_id, sttr_counter_name, sttr_stock_transfer_status "
        . "FROM stock_transaction "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id IN ($strFrmId) "
        . "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "                                                                                
        . "and sttr_transaction_type IN ('EXISTING', 'PURBYSUPP', 'PURONCASH', 'TAG') "
        . "and ( ($dateStrForOpening) or ($dateRangeStrForOpening) ) $stockTransferStatusStr $productCounterStr $selectedStaffStr "
        . "GROUP BY sttr_item_category, sttr_item_name, sttr_metal_type, sttr_stock_type, "
        . "sttr_purity, sttr_firm_id, sttr_staff_id, sttr_counter_name ";
//
//echo '$openingStockDetView == ' . $openingStockDetView . '<br />';
//
$resOpeningStockDetView = mysqli_query($conn, $openingStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-21FEB2022
//***********************************************************************************************************
//
//
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
        . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id, "
        . "sttr_staff_id, sttr_counter_name, sttr_stock_transfer_status "
        . "FROM stock_transaction "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id IN ($strFrmId) "
        . "and sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
        . "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
        . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "       
        . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
        . "$dateStrForOutwards "
        . "GROUP BY sttr_item_category, sttr_item_name, sttr_metal_type, sttr_stock_type, "
        . "sttr_purity, sttr_firm_id, sttr_staff_id, sttr_counter_name ";
//
//echo '$outwardStockDetView == ' . $outwardStockDetView . '<br /><br />';
//
$resOutwardStockDetView = mysqli_query($conn, $outwardStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER CALCULATE OPENING OUTWARD @AUTHOR:PRIYANKA-21FEB2022
//***********************************************************************************************************
//
//
//
//echo '$stockTransferStatusStr == ' . $stockTransferStatusStr . '<br />';
//echo '$productCounterStr == ' . $productCounterStr . '<br />';
//echo '$selectedStaffStr == ' . $selectedStaffStr . '<br />';
//
//
//***********************************************************************************************************
// START CODE FOR STOCK TRANSFER REPORT CALCULATE OUTWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
$outwardStockDetView = "CREATE TABLE TEMP_OUTWARD_STOCK AS SELECT "
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
        . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id, "
        . "sttr_staff_id, sttr_counter_name, sttr_stock_transfer_status "
        . "FROM stock_transaction "
        . "WHERE sttr_owner_id = '$sessionOwnerId'"
        . "and sttr_firm_id IN ($strFrmId) "
        . "and sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
        . "and (sttr_sell_status NOT IN ('RETURNED') OR sttr_sell_status IS NULL) "
        . "and sttr_status IN ('PaymentDone', 'PaymentPending', 'ApprovalDone') "
        . "and sttr_indicator IN ('stock', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal', 'APPROVAL') "
        . "$dateStrForTodayOutwards $stockTransferStatusStr $productCounterStr $selectedStaffStr "
        . "GROUP BY sttr_item_category, sttr_item_name, sttr_metal_type, sttr_stock_type, "
        . "sttr_purity, sttr_firm_id, sttr_staff_id, sttr_counter_name ";
//
//echo '$outwardStockDetView == ' . $outwardStockDetView . '<br />';die;
//
$resOutwardStockDetView = mysqli_query($conn, $outwardStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE OUTWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
//***********************************************************************************************************
// START CODE FOR STOCK TRANSFER REPORT CALCULATE INWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
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
        . "sttr_stock_type, sttr_purity, sttr_metal_type, sttr_firm_id, "
        . "sttr_staff_id, sttr_counter_name, sttr_stock_transfer_status "
        . "FROM stock_transaction "
        . "WHERE sttr_owner_id = '$sessionOwnerId' "
        . "and sttr_firm_id IN ($strFrmId) "
        . "and sttr_indicator IN ('stock', 'AddInvoice', 'imitation', 'RetailStock', 'crystal', 'strsilver', 'rawMetal') "
        . "and sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
        . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
        . "$dateStr $stockTransferStatusStr $productCounterStr $selectedStaffStr "
        . "GROUP BY sttr_item_category, sttr_item_name, sttr_metal_type, sttr_stock_type, "
        . "sttr_purity, sttr_firm_id, sttr_staff_id, sttr_counter_name ";
//
//echo '$inwardStockDetView == ' . $inwardStockDetView . '<br />';
//
$resInwardStockDetView = mysqli_query($conn, $inwardStockDetView);
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE INWARD @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
//
// Table where Condition @AUTHOR:PRIYANKA-04DEC2021
$viewWhere = " WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
           . " and sttr_firm_id IN ($strFrmId) "
           . " and sttr_indicator IN ('PURCHASE', 'stock', 'imitation', 'RetailStock', 'crystal', 'strsilver') "
           . " and sttr_status NOT IN ('DELETED', 'NotDelFromStock') "                              
           . " and sttr_transaction_type IN ('PURONCASH', 'PURCHASE', 'EXISTING', 'TAG') "
           . " $stockTransferStatusStr $productCounterStr $selectedStaffStr ";
//
//
// Table join @AUTHOR:PRIYANKA-04DEC2021
$viewJoin = "";
//
// Table column group by @AUTHOR:PRIYANKA-04DEC2021
$viewGroupBy = " GROUP BY sttr_item_category, sttr_item_name, sttr_metal_type, sttr_stock_type, "
             . " sttr_purity, sttr_firm_id, sttr_staff_id, sttr_counter_name ";
//
// Table order by @AUTHOR:PRIYANKA-04DEC2021
$viewOrderBy = " ORDER BY sttr_item_category, sttr_item_name  ASC ";
//
//
$selStockLedger = "SELECT * FROM stock_transaction $viewWhere $viewGroupBy $viewOrderBy ";
//
//echo '$selStockLedger == ' . $selStockLedger . '<br />';
//
$resStockReportMainQuery = mysqli_query($conn, $selStockLedger) or die(mysqli_error($conn));
//
//
//
// SR NO. @AUTHOR:PRIYANKA-04DEC2021
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
while ($rowStockReportMainQuery = mysqli_fetch_array($resStockReportMainQuery)) {
    //
    // CATEGORY @AUTHOR:PRIYANKA-04DEC2021
    $Category = $rowStockReportMainQuery['sttr_item_category'];
    //
    // NAME @AUTHOR:PRIYANKA-04DEC2021
    $Name = $rowStockReportMainQuery['sttr_item_name'];
    //
    // STOCK TYPE @AUTHOR:PRIYANKA-04DEC2021
    $StockType = $rowStockReportMainQuery['sttr_stock_type'];
    //
    // PURITY @AUTHOR:PRIYANKA-04DEC2021
    $Purity = $rowStockReportMainQuery['sttr_purity'];
    //
    // INDICATOR @AUTHOR:PRIYANKA-04DEC2021
    $Indicator = $rowStockReportMainQuery['sttr_indicator'];
    //
    // METAL TYPE @AUTHOR:PRIYANKA-04DEC2021
    $MetalType = $rowStockReportMainQuery['sttr_metal_type'];
    //
    // FIRM @AUTHOR:PRIYANKA-09DEC2021
    $Firm = $rowStockReportMainQuery['sttr_firm_id'];
    //
    // Staff @AUTHOR:PRIYANKA-09DEC2021
    $Staff = $rowStockReportMainQuery['sttr_staff_id'];
    //
    // Counter @AUTHOR:PRIYANKA-09DEC2021
    $Counter = $rowStockReportMainQuery['sttr_counter_name'];
    //
    //
    //echo '$Counter == ' . $Counter . '<br /><br />';
    //
    //
    //***********************************************************************************************************
    // START CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportOpeningCal.php';
    //
    //***********************************************************************************************************
    // END CODE FOR STOCK TRANSFER REPORT CALCULATE OPENING @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    //
    //***********************************************************************************************************
    // START CODE FOR STOCK TRANSFER REPORT CALCULATE INWARD @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportInwardCal.php';
    //
    //***********************************************************************************************************
    // END CODE FOR STOCK TRANSFER REPORT CALCULATE INWARD @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    //
    //***********************************************************************************************************
    // START CODE FOR STOCK TRANSFER REPORT CALCULATE OUTWARD @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportOutwardCal.php';
    //
    //***********************************************************************************************************
    // END CODE FOR STOCK TRANSFER REPORT CALCULATE OUTWARD @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    //
    //***********************************************************************************************************
    // START CODE FOR STOCK TRANSFER REPORT CALCULATE CLOSING @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportClosingCal.php';
    //
    //***********************************************************************************************************
    // END CODE FOR STOCK TRANSFER REPORT CALCULATE CLOSING @AUTHOR:PRIYANKA-04DEC2021
    //***********************************************************************************************************
    //
    //
    //echo '$srNo = ' . $srNo . '<br />';
    //echo '$Firm = ' . $Firm . '<br />';
    //echo '$MetalType = ' . $MetalType . '<br />';
    //echo '$Category = ' . $Category . '<br />';
    //echo '$Name = ' . $Name . '<br />';
    //echo '$StockType = ' . $StockType . '<br />';
    //echo '$Purity = ' . $Purity . '<br />';
    //echo '$Indicator = ' . $Indicator . '<br />';
    //echo '$Staff = ' . $Staff . '<br />';
    //echo '$Counter = ' . $Counter . '<br />';
    //
    //
    $InsertIntoTempView = "INSERT INTO temp_view (sttr_id, sttr_firm_id, sttr_metal_type,  "
                        . "sttr_item_category, sttr_item_name, "
                        . "sttr_stock_type, sttr_purity, sttr_indicator, "
                        . "sttr_staff_id, sttr_counter_name, "
                        . "sttr_quantity_open, sttr_gs_weight_open, sttr_nt_weight_open, sttr_fine_weight_open, "
                        . "sttr_quantity_in, sttr_gs_weight_in, sttr_nt_weight_in, sttr_fine_weight_in, "
                        . "sttr_quantity_out, sttr_gs_weight_out, sttr_nt_weight_out, sttr_fine_weight_out, "
                        . "sttr_quantity_close, sttr_gs_weight_close, sttr_nt_weight_close, sttr_fine_weight_close, srNo) "
                        . " VALUES "
                        . "('$rowStockReportMainQuery[sttr_id]', '$Firm', '$MetalType', "
                        . "'$Category', '$Name', "
                        . "'$StockType', '$Purity', '$Indicator', "
                        . "'$Staff', '$Counter', "
                        . "'$OpeningQTY', '$OpeningGsWeight', '$OpeningNtWeight', '$OpeningFnWeight', "
                        . "'$InwardQTY', '$InwardGsWeight', '$InwardNtWeight', '$InwardFnWeight', "
                        . "'$OutwardQTY', '$OutwardGsWeight', '$OutwardNtWeight', '$OutwardFnWeight', "
                        . "'$ClosingQTY', '$ClosingGsWeight', '$ClosingNtWeight', '$ClosingFnWeight', '$srNo')";
    //
    //echo '$InsertIntoTempView = ' . $InsertIntoTempView . '<br /><br /><br />';
    //
    mysqli_query($conn, $InsertIntoTempView) or die('<br/> ERROR:' . mysqli_error($conn));
    //
    //
    $srNo++;
    //
    //
}
//
//
//
// DROP TEMP_OPENING_STOCK TABLE @AUTHOR:PRIYANKA-09DEC2021
$dropTempOpStock = "DROP table TEMP_OPENING_STOCK";
mysqli_query($conn, $dropTempOpStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
// DROP TEMP_OPENING_OUTWARD_STOCK TABLE @AUTHOR:PRIYANKA-21FEB2022
$dropTempOpeningOutStock = "DROP table TEMP_OPENING_OUTWARD_STOCK";
mysqli_query($conn, $dropTempOpeningOutStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
// DROP TEMP_OUTWARD_STOCK TABLE @AUTHOR:PRIYANKA-09DEC2021
$dropTempOutStock = "DROP table TEMP_OUTWARD_STOCK";
mysqli_query($conn, $dropTempOutStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
// DROP TEMP_INWARD_STOCK TABLE @AUTHOR:PRIYANKA-09DEC2021
$dropTempInStock = "DROP table TEMP_INWARD_STOCK";
mysqli_query($conn, $dropTempInStock) or die('<br/> ERROR:' . mysqli_error($conn));
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR CREATE TEMP VIEW TABLE FOR STOCK TRANSFER REPORT @AUTHOR:PRIYANKA-04DEC2021            //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
?>