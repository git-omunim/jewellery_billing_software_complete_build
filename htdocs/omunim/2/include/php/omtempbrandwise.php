<?php
/*
 * **************************************************************************************
 * @tutorial: Temp Table file for brand wise report
 * **************************************************************************************
 * 
 * Created on 19 Nov, 2024 6:20:14 PM
 *
 * @FileName: omtempbrandwise.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:SHREYA 
 *  REASON: FOR ALL SCHEME SHOW 
 *
 */
?>
<?php
if($panelName == 'FineJewelleryBrandGsWtProducts'){
    $createView = "CREATE TABLE IF NOT EXISTS temp_brandwise_trend_item_view (
    sttr_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sttr_firm_id VARCHAR(5),
    sttr_brand_id VARCHAR(20),
    sttr_item_category VARCHAR(50),
    sttr_quantity VARCHAR(16),
    sttr_total_gswt_by_brand  VARCHAR(16), -- Total quantity for the same brand across all categories
    sttr_transaction_type VARCHAR(16),
    sttr_indicator VARCHAR(16),
    sttr_metal_type VARCHAR(16),
    sttr_gs_weight VARCHAR(16)
)
";



$sqlTable = 'DESC temp_brandwise_trend_item_view';

mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_brandwise_trend_item_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
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

$queryItemDetails = "INSERT INTO temp_brandwise_trend_item_view (sttr_firm_id, sttr_brand_id, sttr_item_category, sttr_quantity,"
        . " sttr_total_gswt_by_brand, sttr_transaction_type, sttr_indicator,sttr_metal_type,sttr_gs_weight)"
        . " SELECT st.sttr_firm_id, st.sttr_brand_id, sttr_item_category, SUM(st.sttr_quantity) AS sttr_quantity,"
        . " (SELECT SUM(sttr_gs_weight) FROM stock_transaction stt WHERE sttr_firm_id IN ($strFrmId) AND stt.sttr_brand_id = st.sttr_brand_id AND "
        . "stt.sttr_transaction_type IN ('sell', 'ESTIMATESELL') AND stt.sttr_status = 'PaymentDone' AND"
        . " stt.sttr_item_category != 'Diamond' AND UNIX_TIMESTAMP(STR_TO_DATE(stt.sttr_add_date, '%d %b %Y'))"
        . " BETWEEN $fromDateTime AND $toDateTime) AS sttr_total_gswt_by_brand, st.sttr_transaction_type, "
        . "st.sttr_indicator,st.sttr_metal_type,sum(st.sttr_gs_weight) FROM stock_transaction st "
        . "WHERE sttr_firm_id IN ($strFrmId) AND st.sttr_transaction_type IN ('sell', 'ESTIMATESELL') AND st.sttr_status = 'PaymentDone' "
        . "AND st.sttr_item_category != 'Diamond' AND UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date, '%d %b %Y'))"
        . " BETWEEN $fromDateTime AND $toDateTime and sttr_brand_id is not null and sttr_indicator NOT IN ('stockCrystal')  GROUP BY  st.sttr_brand_id, st.sttr_item_category";
//echo '$queryItemDetails==>'.$queryItemDetails.'<br>';
$resItemDetails = mysqli_query($conn, $queryItemDetails) or die(mysqli_error($conn));
}else{
$createView = "CREATE TABLE IF NOT EXISTS temp_brandwise_trend_item_view (
    sttr_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sttr_firm_id VARCHAR(5),
    sttr_brand_id VARCHAR(20),
    sttr_item_category VARCHAR(50),
    sttr_quantity VARCHAR(16),
    sttr_total_quantity_by_brand  VARCHAR(16), -- Total quantity for the same brand across all categories
    sttr_transaction_type VARCHAR(16),
    sttr_indicator VARCHAR(16),
    sttr_metal_type VARCHAR(16),
    sttr_gs_weight VARCHAR(16)
)
";



$sqlTable = 'DESC temp_brandwise_trend_item_view';

mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_brandwise_trend_item_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
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

$queryItemDetails = "INSERT INTO temp_brandwise_trend_item_view (sttr_firm_id, sttr_brand_id, sttr_item_category, sttr_quantity,"
        . " sttr_total_quantity_by_brand, sttr_transaction_type, sttr_indicator,sttr_metal_type,sttr_gs_weight)"
        . " SELECT st.sttr_firm_id, st.sttr_brand_id, sttr_item_category, SUM(st.sttr_quantity) AS sttr_quantity,"
        . " (SELECT SUM(sttr_quantity) FROM stock_transaction stt WHERE sttr_firm_id IN ($strFrmId) AND stt.sttr_brand_id = st.sttr_brand_id AND "
        . "stt.sttr_transaction_type IN ('sell', 'ESTIMATESELL') AND stt.sttr_status = 'PaymentDone' AND"
        . " stt.sttr_item_category != 'Diamond' AND UNIX_TIMESTAMP(STR_TO_DATE(stt.sttr_add_date, '%d %b %Y'))"
        . " BETWEEN $fromDateTime AND $toDateTime) AS sttr_total_quantity_by_brand, st.sttr_transaction_type, "
        . "st.sttr_indicator,st.sttr_metal_type,sum(st.sttr_gs_weight) FROM stock_transaction st "
        . "WHERE sttr_firm_id IN ($strFrmId) AND st.sttr_transaction_type IN ('sell', 'ESTIMATESELL') AND st.sttr_status = 'PaymentDone' "
        . "AND st.sttr_item_category != 'Diamond' AND UNIX_TIMESTAMP(STR_TO_DATE(st.sttr_add_date, '%d %b %Y'))"
        . " BETWEEN $fromDateTime AND $toDateTime and sttr_brand_id is not null and sttr_indicator NOT IN ('stockCrystal') GROUP BY  st.sttr_brand_id, st.sttr_item_category";
//echo '$queryItemDetails==>'.$queryItemDetails.'<br>';
$resItemDetails = mysqli_query($conn, $queryItemDetails) or die(mysqli_error($conn));
}
//
// mysqli_query($conn, $queryItemDetails) or die('<br/> ERROR:' . mysqli_error($conn));
