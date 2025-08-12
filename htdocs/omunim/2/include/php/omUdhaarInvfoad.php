<?php

/*
 * **************************************************************************************
 * @tutorial: customized udhaar form ad @SIMRAN:15SEPT2023
 * **************************************************************************************
 * 
 * Created on 19 SEP 16
 *
 * @FileName: omUdhaarInvfoad.php
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
include_once 'ommpfndv.php';
include_once 'conversions.php';
?>
<?php

//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$panel = mysqli_real_escape_string($conn, stripslashes($_REQUEST['panel']));
//
if($panel == '' || $panel == NULL){
    //$panel = 'CustomizedUdhaarInvFormPanel';
}
if ($panel == 'CustomizedUdhaarInvFormPanel') {
    $count = mysqli_real_escape_string($conn, stripslashes(trim($_GET['count'])));
    $fieldName = mysqli_real_escape_string($conn, stripslashes($_GET['fieldName']));
    $fieldValue = mysqli_real_escape_string($conn, stripslashes($_GET['fieldValue']));
    $fieldFont = mysqli_real_escape_string($conn, stripslashes($_GET['fontSize']));
    $fieldColor = mysqli_real_escape_string($conn, stripslashes($_GET['fontColor']));
    $fontWeight = mysqli_real_escape_string($conn, stripslashes($_GET['fontWeight'])); // // YUVRAJ ADD IN $query THIS COLOM FONT WEIGHT @09082022
    $fieldCheck = mysqli_real_escape_string($conn, stripslashes($_GET['fieldCheck']));
    $labelType = mysqli_real_escape_string($conn, stripslashes($_GET['labelType']));
} else {
    $count = mysqli_real_escape_string($conn, stripslashes(trim($_POST['count'])));
    $labelType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['labelType'])));
    $fieldName = mysqli_real_escape_string($conn, stripslashes(trim($_POST['fieldName'])));
    $fieldValue = mysqli_real_escape_string($conn, stripslashes(trim($_POST['fieldValue' . $count])));
    $fieldFont = mysqli_real_escape_string($conn, stripslashes(trim($_POST['fontSize' . $count])));
    $fieldColor = mysqli_real_escape_string($conn, stripslashes(trim($_POST['fontColor' . $count])));
    $fontWeight = mysqli_real_escape_string($conn, stripslashes(trim($_POST['fontWeight' . $count])));
    $fieldCheck = mysqli_real_escape_string($conn, stripslashes(trim($_POST['fontCheckId' . $count])));
}
//echo 'asdasd=='.$fieldCheck;
//
parse_str(getTableValues("SELECT label_field_name FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                . "label_field_name = '$fieldName' and label_type = '$labelType'"));
//
if ($label_field_name == '' || $label_field_name == NULL) {
    //
    $query = "INSERT INTO labels(label_own_id, label_type, label_field_name, label_field_content,
                                 label_field_font_size,label_field_font_color,label_field_font_weight,label_field_check)
                         VALUES('$sessionOwnerId','$labelType','$fieldName','$fieldValue',"
            . "'$fieldFont','$fieldColor','$fontWeight','$fieldCheck')";
    //
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    // START CODE TO UPDATE ALL FIELD FONT SIZE IF WE SET ALL FONT SIZE FROM CUSTOMIZATION PANEL FOR RETAIL SOFTWARE @AUTHOR:MADHUREE-26JAN2020
    //
    if ($fieldName == 'fontSizeValue' && $_SESSION['sessionProdName'] == 'OMRETL') {
        $queryUpdateAllFontSize = "UPDATE labels SET label_field_font_size = '$fieldValue'"
                . " WHERE label_own_id = '$sessionOwnerId' and label_type = '$labelType'";
        //
        if (!mysqli_query($conn, $queryUpdateAllFontSize)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //
    // END CODE TO UPDATE ALL FIELD FONT SIZE IF WE SET ALL FONT SIZE FROM CUSTOMIZATION PANEL FOR RETAIL SOFTWARE @AUTHOR:MADHUREE-26JAN2020
    //
} else {
    //
    if ($fieldValue == '' || $fieldValue == NULL) {
        if ($label_field_name == 'authUdhaarInvSignLb') {
            $fieldValue = 'Authorized Signatory';
        } else if ($label_field_name == 'tncudhaarInvLb') {
            $fieldValue = 'Terms and Conditions';
        }
    }
    //
    $query = "UPDATE labels SET label_own_id = '$sessionOwnerId',label_type = '$labelType',"
            . "label_field_name = '$fieldName',label_field_content = '$fieldValue',"
            . "label_field_font_size = '$fieldFont',label_field_font_color = '$fieldColor',label_field_font_weight = '$fontWeight',"
            . "label_field_check = '$fieldCheck'"
            . "WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
    //
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    // START CODE TO UPDATE ALL FIELD FONT SIZE IF WE SET ALL FONT SIZE FROM CUSTOMIZATION PANEL FOR RETAIL SOFTWARE @AUTHOR:MADHUREE-26JAN2020
    //

    if ($fieldName == 'fontSizeValue' && $_SESSION['sessionProdName'] == 'OMRETL') {
        $queryUpdateAllFontSize = "UPDATE labels SET label_field_font_size = '$fieldValue'"
                . " WHERE label_own_id = '$sessionOwnerId' and label_type = '$labelType'";
        //
        if (!mysqli_query($conn, $queryUpdateAllFontSize)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //
    // END CODE TO UPDATE ALL FIELD FONT SIZE IF WE SET ALL FONT SIZE FROM CUSTOMIZATION PANEL FOR RETAIL SOFTWARE @AUTHOR:MADHUREE-26JAN2020
    //
}
//
if ($panel == 'CustomizedUdhaarInvFormPanel') {
    header("Location: $documentRoot/include/php/omUdhaarMonDepInvcufm.php");
} else {
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM ||
            $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SellPurchase&layoutPanel=customizedUdhaarInvoice');
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD ||
            $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SellPurchase&layoutPanel=customizedUdhaarInvoice');
    }
}
?>