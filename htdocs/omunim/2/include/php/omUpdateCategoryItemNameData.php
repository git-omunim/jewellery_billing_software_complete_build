<?php
/*
 * **************************************************************************************
 * @tutorial: UPDATE ITEM CATEGORY AND ITEM NAME
 * **************************************************************************************
 * 
 * Created on Feb 10, 2020 5:47:48 PM
 *
 * @FileName: omUpdateCategoryItemNameData.php
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
$itemCategory = $_REQUEST['itemCategory'];
$itemMetalType = $_REQUEST['itemMetalType'];
$newItemCategory = $_REQUEST['newItemCategory'];
$selItemCategory = $_REQUEST['selItemCategory'];
$selItemName = $_REQUEST['selItemName'];
$newitemName = $_REQUEST['newitemName'];

if (isset($_POST['updateCategoryButton'])) {
//UPDATE SELECTED CATEGORY
if(($newItemCategory != null || $newItemCategory != '')&&($itemCategory != null || $itemCategory != '')){
$updateCategoryQuery = "UPDATE stock_transaction,stock SET stock_transaction.sttr_item_category = '$newItemCategory',stock.st_item_category = '$newItemCategory'
          WHERE sttr_item_category = '$itemCategory' AND st_item_category = '$itemCategory' AND sttr_metal_type = '$itemMetalType' AND st_metal_type = '$itemMetalType' ;";
//echo '$updateCategoryQuery = '.$updateCategoryQuery.'</br>';
 if (!mysqli_query($conn, $updateCategoryQuery)) {
                die('Error: ' . mysqli_error($conn));
    }
 }
 // 
 $item_metal_type = $itemMetalType;
 $item_category = $newItemCategory;
 include 'omNewStockRecreateFileForSingleCategory.php';
 //
}if(isset($_POST['updateItemNameButton'])) {
  if(($selItemCategory != null || $selItemCategory != '')&&($selItemName != null || $selItemName != '')&&($selItemCategory != null || $selItemCategory != '')){  
  $updateNameQuery = "UPDATE stock_transaction,stock SET stock_transaction.sttr_item_name = '$newitemName',stock.st_item_name = '$newitemName'
          WHERE sttr_item_category = '$selItemCategory' AND st_item_category = '$selItemCategory' AND sttr_item_name='$selItemName' AND st_item_name='$selItemName'";
//echo '$updateCategoryQuery = '.$updateCategoryQuery.'</br>';
 if (!mysqli_query($conn, $updateNameQuery)) {
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
