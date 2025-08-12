<?php
/*
 * **************************************************************************************
 * @tutorial: UPDATE STICKER OPTION VALUES @PRIYANKA-30AUG2019
 * **************************************************************************************
 * 
 * Created on AUG 30, 2019 5:41:02 PM
 *
 * @FileName: omUpdateStickerOptionValue.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$option = $_GET['option'];
$value = $_GET['value'];
//
$selFormsLayoutDet = "SELECT omin_value FROM omindicators WHERE omin_own_id = '$sessionOwnerId' and omin_option = '$option'";
$resFormsLayoutDet = mysqli_query($conn,$selFormsLayoutDet);
$rowFormsLayoutDet = mysqli_num_rows($resFormsLayoutDet);
//
if ($rowFormsLayoutDet == 0) {
    $query = "INSERT INTO omindicators(omin_own_id,omin_option,omin_value)
              VALUES('$sessionOwnerId','$option','$value')";
    
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $query = "UPDATE omindicators SET omin_value = '$value'
              WHERE omin_own_id = '$sessionOwnerId' and omin_option = '$option'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
header('Location: ' . $documentRoot . '/include/php/omStickerPrintPanel.php');
?>