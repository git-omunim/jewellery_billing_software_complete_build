<?php

/*
 * **************************************************************************************
 * @tutorial: sell purchase STRELLERING customised form ad
 * **************************************************************************************
 * 
 * Created on 18 DEC, 2018
 *
 * @FileName: omstrfoad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 2.6.92
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
include_once 'conversions.php';
?>
<?php

$sessionOwnerId = $_SESSION['sessionOwnerId'];
$panel = mysqli_real_escape_string($conn,stripslashes($_GET['panel']));
if ($panel == 'CustomizedFormMainPanel') {
    $count = mysqli_real_escape_string($conn,stripslashes(trim($_GET['count'])));
    $fieldName = mysqli_real_escape_string($conn,stripslashes($_GET['fieldName']));
    $fieldValue = mysqli_real_escape_string($conn,stripslashes($_GET['fieldValue']));
    $fieldFont = mysqli_real_escape_string($conn,stripslashes($_GET['fontSize']));
    $fieldColor = mysqli_real_escape_string($conn,stripslashes($_GET['fontColor']));
    $fieldCheck = mysqli_real_escape_string($conn,stripslashes($_GET['fieldCheck']));
    $labelType = mysqli_real_escape_string($conn,stripslashes($_GET['labelType']));
} else {
    $count = mysqli_real_escape_string($conn,stripslashes(trim($_POST['count'])));
    $labelType = mysqli_real_escape_string($conn,stripslashes(trim($_POST['labelType'])));
    $fieldName = mysqli_real_escape_string($conn,stripslashes(trim($_POST['fieldName'])));
    $fieldValue = mysqli_real_escape_string($conn,stripslashes(trim($_POST['fieldValue' . $count])));
    $fieldFont = mysqli_real_escape_string($conn,stripslashes(trim($_POST['fontSize' . $count])));
    $fieldColor = mysqli_real_escape_string($conn,stripslashes(trim($_POST['fontColor' . $count])));
    $fieldCheck = mysqli_real_escape_string($conn,stripslashes(trim($_POST['fontCheckId' . $count])));
}

parse_str(getTableValues("SELECT label_field_name FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
if ($label_field_name == '' || $label_field_name == NULL) {
    $query = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
                   VALUES('$sessionOwnerId','$labelType','$fieldName','$fieldValue','$fieldFont','$fieldColor','$fieldCheck')";
    //echo 'Qruery : '.$query;
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    if ($fieldValue == '' || $fieldValue == NULL) {
        if ($label_field_name == 'authSignLb') {
            $fieldValue = 'Authorized Signatory';
        } else if ($label_field_name == 'tncLb') {
            $fieldValue = 'Terms and Conditions';
        }
    }
    $checkQuery = "SELECT label_field_name FROM labels WHERE  label_own_id = '$sessionOwnerId' and label_type = '$labelType' and label_field_name = '$fieldName';";
    $resStrDetailse = mysqli_query($conn, $checkQuery) or die(mysqli_error($conn));
    $totalStrCounter = mysqli_num_rows($resStrDetailse);
    $rowStrDetails = mysqli_fetch_array($resStrDetailse);
//
    if ($totalStrCounter == 0) {
        //
        $query = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId','$labelType','$fieldName','$fieldValue','$fieldFont','$fieldColor','$fieldCheck'),";
    }else{
    $query = "UPDATE labels SET 
            label_own_id = '$sessionOwnerId',label_type = '$labelType',label_field_name = '$fieldName',label_field_content = '$fieldValue',"
            . "label_field_font_size = '$fieldFont',label_field_font_color = '$fieldColor',label_field_check = '$fieldCheck'"
            . "WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
    //echo "Query : ".$query;
    }
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
if ($panel == 'CustomizedFormMainPanel') {
    header("Location: $documentRoot/include/php/omstrcufm.php?labelType=" . $labelType . "&panelYN=Y");
} else {
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
       //header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StrlleringSilver&layoutPanel=customizedStrInvoice');
       header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SellPurchase&layoutPanel=customizedStrInvoice&panel=customizedStrInvoice');
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) 
    {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SellPurchase&layoutPanel=customizedStrInvoice&panel=customizedStrInvoice');
    }
}
?>