<?php
/*
 * **************************************************************************************
 * @tutorial: DROPDOWN OF SELL PRODUCT CODE @AUTHOR-PRIYANKA-12NOV2020
 * **************************************************************************************
 *
 * Created on 12 NOV, 2020 
 *
 * @FileName: omSearchProdByPreIdfashion.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.29
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-12NOV2020
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
//
$custItemId = trim($_REQUEST['itemPreId']);
//
$panelName = trim($_REQUEST['panelName']);
//
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type = 'Public' and "
                   . "firm_own_id = '$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where "
                   . "firm_own_id = '$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
//
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
//
// ***********************************************************************************************************************
// START CODE TO SET SELL STOCK SETTING @AUTHOR-PRIYANKA-09FEB2021
// ***********************************************************************************************************************
$selSellStockSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'SellStockSetting'";
$resSellStockSetting = mysqli_query($conn, $selSellStockSettingQuery);
$rowSellStockSetting = mysqli_fetch_array($resSellStockSetting);
$SellStockSetting = $rowSellStockSetting['omly_value'];
// ***********************************************************************************************************************
// END CODE TO SET SELL STOCK SETTING @AUTHOR-PRIYANKA-09FEB2021
// ***********************************************************************************************************************
//
//
if ($SellStockSetting == 'SellWithoutStock') {
    //
    $qSelPreId = "SELECT DISTINCT sttr_item_code FROM stock_transaction "
               . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
               . "and sttr_indicator IN ('fashionstock', 'imitation') "
               . "and sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'PURBYSUPP', 'TAG') "
               . "and sttr_status NOT IN ('DELETED', 'NotDelFromStock') "
               . "and sttr_item_code LIKE '$custItemId%' and sttr_firm_id IN ($strFrmId) order by sttr_id DESC";
    //
} else {
    //
    $qSelPreId = "SELECT DISTINCT sttr_item_code FROM stock_transaction "
               . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
               . "and sttr_indicator IN ('fashionstock', 'imitation') "
               . "and sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'PURBYSUPP', 'TAG') "
               . "and sttr_status NOT IN ('SOLDOUT', 'DELETED', 'NotDelFromStock') "
               . "and sttr_item_code LIKE '$custItemId%' and sttr_firm_id IN ($strFrmId) order by sttr_id DESC";
    //
      

}
//
//
//echo '$qSelPreId : ' . $qSelPreId;
//die;
//
$resPreId = mysqli_query($conn, $qSelPreId);
//
$totalPreId = mysqli_num_rows($resPreId);
//

if ($totalPreId > 0) { ?>
    <SELECT class="cityListDivToAddNewCustSelect SelectCss" 
            id="sellItemPreIdSelect" name="sellItemPreIdSelect" 
            onKeyDown="if (event.keyCode == 13) {
                           document.getElementById('srchItemfId').value = this.value;
                           searchSellProdPreIdForPanelBlank();
                           document.getElementById('srchItemId').focus();
                        }"
            onclick="document.getElementById('srchItemfId').value = this.value;
                     searchSellProdPreIdForPanelBlank();
                     document.getElementById('srchItemfId').focus();"
            multiple="multiple" size="8">
                <?php
                while ($row = mysqli_fetch_array($resPreId, MYSQLI_ASSOC)) {
                       echo "<OPTION  VALUE=" . "\"{$row['sttr_item_code']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['sttr_item_code']}</OPTION>";
                       
                } ?>
    </SELECT>
<?php } ?>