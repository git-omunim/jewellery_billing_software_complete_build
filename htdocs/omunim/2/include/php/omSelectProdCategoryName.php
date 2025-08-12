<?php
/*
 * *************************************************************************************
 * @tutorial: ALL STOCK CATEGORY AND NAME SUGGETION DIV FILE @AUTHOR:MADHUREE-16FEB2022
 * *************************************************************************************
 *
 * Created on 16 FEB, 2022 01:40:00 PM
 * 
 * @FileName: omSelectProdCategoryName.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.122
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
$searchBy = trim($_REQUEST['searchBy']);
$productMetal = trim($_REQUEST['productMetal']);
$prodCategory = trim($_REQUEST['prodCategory']);
$prodName = trim($_REQUEST['prodName']);
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
//echo '$productMetal : ' . $productMetal . '<br>';
//echo '$prodCategory : ' . $prodCategory . '<br>';
//echo '$prodName : ' . $prodName . '<br>';
//
if ($productMetal != 'NotSelected' && $productMetal != '') {
    //
    if ($productMetal == 'GOLD') {
        $stockMetalCondStr = " and sttr_metal_type IN ('GOLD','Gold','gold') ";
    } else if ($productMetal == 'SILVER') {
        $stockMetalCondStr = " and sttr_metal_type IN ('SILVER','Silver','silver') ";
    }
    //
    if ($searchBy == 'productCategory') {
        $qSelProdCategoryAndName = "SELECT DISTINCT sttr_item_category FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' "
                . "and sttr_indicator IN ('stock','AddInvoice') $stockMetalCondStr "
                . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                . "and sttr_gs_weight != 0 and sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') "
                . "and sttr_item_category LIKE '$prodCategory%' and sttr_firm_id IN ($strFrmId)order by sttr_id DESC";
    } else if ($searchBy == 'productName') {
        if ($prodCategory != '') {
            $qSelProdCategoryAndName = "SELECT DISTINCT sttr_item_name FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' "
                    . "and sttr_indicator IN ('stock','AddInvoice') $stockMetalCondStr "
                    . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                    . "and sttr_gs_weight != 0 and sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') "
                    . "and sttr_item_category='$prodCategory' and sttr_item_name LIKE '$prodName%' and sttr_firm_id IN ($strFrmId)order by sttr_id DESC";
        } else {
            $qSelProdCategoryAndName = "SELECT DISTINCT sttr_item_name FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' "
                    . "and sttr_indicator IN ('stock','AddInvoice') $stockMetalCondStr "
                    . "and sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                    . "and sttr_gs_weight != 0 and sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') "
                    . "and sttr_item_name LIKE '$prodName%' and sttr_firm_id IN ($strFrmId)order by sttr_id DESC";
        }
    }
    //
    $resSelProdCategoryAndName = mysqli_query($conn, $qSelProdCategoryAndName);
    $totalCategoryAndName = mysqli_num_rows($resSelProdCategoryAndName);
} else {
    $totalCategoryAndName = 0;
}
//
if ($totalCategoryAndName > 0) {
    ?>
    <SELECT class="cityListDivToAddNewCustSelect" id="selItemNameCategory" name="selItemNameCategory" style="width:250px;margin-left:-125px;"
            onKeyDown="if (event.keyCode == 13) {
            <?php if ($searchBy == 'productCategory') { ?>
                            document.getElementById('searchProductCategory').value = this.value;
                            googleSuggestionDropdownBlank('searchProductCategoryDiv');
                            document.getElementById('searchProductCategory').focus();
            <?php } else if ($searchBy == 'productName') { ?>
                            document.getElementById('searchProductName').value = this.value;
                            googleSuggestionDropdownBlank('searchProductNameDiv');
                            document.getElementById('searchProductName').focus();
            <?php } ?>
                    }"
            onclick="<?php if ($searchBy == 'productCategory') { ?>
                        document.getElementById('searchProductCategory').value = this.value;
                        googleSuggestionDropdownBlank('searchProductCategoryDiv');
                        document.getElementById('searchProductCategory').focus();
            <?php } else if ($searchBy == 'productName') { ?>
                        document.getElementById('searchProductName').value = this.value;
                        googleSuggestionDropdownBlank('searchProductNameDiv');
                        document.getElementById('searchProductName').focus();
            <?php } ?>"
            multiple="multiple" size="8">
                <?php
                if ($searchBy == 'productCategory') {
                    while ($rowSelProdCategoryAndName = mysqli_fetch_array($resSelProdCategoryAndName, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$rowSelProdCategoryAndName['sttr_item_category']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowSelProdCategoryAndName['sttr_item_category']}</OPTION>";
                    }
                } else if ($searchBy == 'productName') {
                    while ($rowSelProdCategoryAndName = mysqli_fetch_array($resSelProdCategoryAndName, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$rowSelProdCategoryAndName['sttr_item_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowSelProdCategoryAndName['sttr_item_name']}</OPTION>";
                    }
                }
                ?>
    </select>
<?php } ?>