<?php
/*
 * ********************************************************************************
 * @tutorial: SIMILAR STOCK PRODUCT ID SELECTION FILE @AUTHOR:MADHUREE-05AUGUST2022
 * ********************************************************************************
 *
 * Created on 05 AUG, 2022 01:40:00 PM
 * 
 * @FileName: omSelectSimProdId.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.166
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 * Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON: 
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$staffId = $_SESSION['sessionStaffId'];
?>
<?php
//
$prodIdSerachStr = trim($_REQUEST['prodIdSerachStr']);
$sttrId = trim($_REQUEST['sttrId']);
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
//echo '$prodIdSerachStr : ' . $prodIdSerachStr . '<br>';
//
if ($prodIdSerachStr != '') {
    //
    $qSelProdId = "SELECT sttr_id,sttr_item_code FROM stock_transaction where "
            . "sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_indicator IN ('stock','AddInvoice') "
            . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') and sttr_omecom_status='YES'"
            . "and sttr_gs_weight != 0 and sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') "
            . "and sttr_item_code LIKE '$prodIdSerachStr%' and sttr_id!='$sttrId' and sttr_firm_id IN ($strFrmId) order by sttr_id DESC";
    //
    $resSelProdId = mysqli_query($conn, $qSelProdId);
    $totalProduct = mysqli_num_rows($resSelProdId);
    //
} else {
    $totalProduct = 0;
}
//
if ($totalProduct > 0) {
    ?>
    <SELECT class="cityListDivToAddNewCustSelect" id="selItemId" name="selItemId" style="width:250px;margin-left:-125px;"
            onKeyDown="if (event.keyCode == 13) {
                        document.getElementById('smilarProductId').value = this.value;
                        document.getElementById('smilarProduct').value = this.options[this.selectedIndex].text;
                        googleSuggestionDropdownBlank('searchProductIdDiv');
                        document.getElementById('smilarProduct').focus();
                    }"
            onclick="document.getElementById('smilarProductId').value = this.value;
                    document.getElementById('smilarProduct').value = this.options[this.selectedIndex].text;
                    googleSuggestionDropdownBlank('searchProductIdDiv');
                    document.getElementById('smilarProduct').focus();"
            multiple="multiple" size="8">
                <?php
                while ($rowSelProdId = mysqli_fetch_array($resSelProdId, MYSQLI_ASSOC)) {
                    echo "<OPTION  VALUE=" . "\"{$rowSelProdId['sttr_id']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowSelProdId['sttr_item_code']}</OPTION>";
                }
                ?>
    </select>
<?php } ?>