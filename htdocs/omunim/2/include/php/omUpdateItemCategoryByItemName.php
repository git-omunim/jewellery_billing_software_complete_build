<?php
/*
 * **************************************************************************************
 * @tutorial: UPDATE ITEM CATEGORY BY ITEM NAME
 * **************************************************************************************
 * 
 * Created on Feb 10, 2020 5:47:48 PM
 *
 * @FileName: omUpdateItemCategoryByItemName.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
require_once 'system/omssopin.php';
?>
<?php
$selItemNameToChange = $_REQUEST['selItemNameToChange'];
$selItemCategoryToChange = $_REQUEST['selItemCategoryToChange'];
$newItemCategoryToChange = $_REQUEST['newItemCategoryToChange'];

//echo '$selItemNameToChange = '.$selItemNameToChange.'</br>';
//echo '$selItemCategoryToChange = '.$selItemCategoryToChange.'</br>';
//echo '$newItemCategoryToChange = '.$newItemCategoryToChange.'</br>';

if (isset($_POST['updateItemNameSubButton'])) {
//UPDATE ITEM CATEGORY BY ITEM NAME
if(($newItemCategoryToChange != null || $newItemCategoryToChange != '')&&($newItemCategoryToChange != null || $newItemCategoryToChange != '')){
$updateItemCategoryQuery = "UPDATE stock_transaction,stock SET stock_transaction.sttr_item_category = '$newItemCategoryToChange', stock.st_item_category = '$newItemCategoryToChange'"
                           . " WHERE stock_transaction.sttr_item_name = '$selItemNameToChange' and stock.st_item_name = '$selItemNameToChange' and "
                               . "stock_transaction.sttr_item_category = '$selItemCategoryToChange' and stock.st_item_category = '$selItemCategoryToChange'";
//echo '$updateItemCategoryQuery = '.$updateItemCategoryQuery.'</br>';
 if (!mysqli_query($conn, $updateItemCategoryQuery)) {
                die('Error: ' . mysqli_error($conn));
    }
 }
          
}

/* * ******START CODE TO ADD TO NAVIGATE PROPERLY @AUTHOR: HEMA1OFEB20 ******************** */

if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=AddStock&panelName=UPDATE_CATEGORY");
} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/orHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'AddStock' . "&panelName=" . 'UPDATE_CATEGORY');
} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/olHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'AddStock' . "&panelName=" . 'UPDATE_CATEGORY');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'AddStock' . "&panelName=" . 'UPDATE_CATEGORY');
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    //$showMess = 'Your product expired for update, Please renew your product or dongle!<br/>आपके उत्पाद को अपडेट करने की सीमा समाप्त हो गयी है, कृपया अपना उत्पाद या डोंगल रिन्यू कीजिए!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    //include 'omppsbdv.php';
    exit;
}
?>
