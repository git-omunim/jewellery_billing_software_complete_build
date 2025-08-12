<?php
/*
 * **************************************************************************************
 * @tutorial: UPDATE ITEM CATEGORY AND ITEM NAME:PRATHAMESH-16APR2024
 * **************************************************************************************
 * 
 * Created on APR 16, 2024 12:00:00 PM
 *
 * @FileName: omupdatemkgbyitemcategory.php
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
$itemCategory = $_REQUEST['selItemCategoryToChangeMkg'];
$selItemName = $_REQUEST['selItemNameToChangeMkg'];
$sttr_making_charges = $_REQUEST['new_sttr_making_charges'];
$sttr_mkg_charges_by = $_REQUEST['sttr_mkg_charges_by'];
$sttr_making_charges_type = $_REQUEST['new_sttr_making_charges_type'];
$strFrmId = $_SESSION['setFirmSession'];
//
$mkgByStr = '';
if($sttr_mkg_charges_by != '' && $sttr_mkg_charges_by != null) {
    $mkgByStr = ", sttr_mkg_charges_by = '$sttr_mkg_charges_by'";
}
//
if (isset($_POST['updateItemMkgSubBtn'])) {

if($itemCategory != '' && $selItemName!= '') {
$updateMkgQuery = "UPDATE stock_transaction SET sttr_making_charges = '$sttr_making_charges',sttr_making_charges_type = '$sttr_making_charges_type' $mkgByStr "
                . "WHERE sttr_item_category = '$itemCategory' AND sttr_item_name = '$selItemName' AND sttr_firm_id = '$strFrmId' AND sttr_status = 'EXISTING' ";

    if (!mysqli_query($conn, $updateMkgQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
 } else if ($itemCategory != '') {
     $updateMkgQuery = "UPDATE stock_transaction SET sttr_making_charges = '$sttr_making_charges',sttr_making_charges_type = '$sttr_making_charges_type' $mkgByStr "
                     . "WHERE sttr_item_category = '$itemCategory' AND sttr_firm_id = '$strFrmId' AND sttr_status = 'EXISTING' ";

    if (!mysqli_query($conn, $updateMkgQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
 } else if ($selItemName!= '') {
     $updateMkgQuery = "UPDATE stock_transaction SET sttr_making_charges = '$sttr_making_charges',sttr_making_charges_type = '$sttr_making_charges_type' $mkgByStr "
                     . "WHERE sttr_item_name = '$selItemName' AND sttr_firm_id = '$strFrmId' AND sttr_status = 'EXISTING' ";

    if (!mysqli_query($conn, $updateMkgQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
 }
          
}
//
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
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    exit;
}
?>
