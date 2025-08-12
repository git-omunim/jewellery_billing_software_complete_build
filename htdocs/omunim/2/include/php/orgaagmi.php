<?php

/*
 * **************************************************************************************
 * @tutorial: Add Girvi Item
 * **************************************************************************************
 * 
 * Created on Mar 19, 2011 6:21:39 PM
 *
 * @FileName: orgaagmi.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
//require_once '../../omGlobal.php';
?>
<?php

require_once 'system/omssopin.php';

$girviOwnerId = $_SESSION['sessionOwnerId'];
$custId = trim($_POST['custId']);
 if ($gbLanguage == 'English') //Add Condition for hindi language Author:DIKSHA3SEPT2018 
$itemName = om_ucfirst(trim($_POST['itemName']));
 else
   $itemName = trim($_POST['itemName']);  
$itemType = trim($_POST['itemType']);
$itemPieces = trim($_POST['itemPieces']);
$grossItemWeight = trim($_POST['grossItemWeight']);
$grossWeightType = trim($_POST['grossWeightType']);
$itemWeight = trim($_POST['itemWeight']);
$weightType = trim($_POST['weightType']);
$itemTunch = trim($_POST['itemTunch']);
$addMoreItem = trim($_POST['addMoreItem']);

// Start To protect MySQL injection
$itemName = stripslashes($itemName);
$itemType = stripslashes($itemType);
$itemPieces = stripslashes($itemPieces);
$grossItemWeight = stripslashes($grossItemWeight);
$grossWeightType = stripslashes($grossWeightType);
$itemWeight = stripslashes($itemWeight);
$weightType = stripslashes($weightType);
$itemTunch = stripslashes($itemTunch);

$itemName = mysqli_real_escape_string($conn,$itemName);
$itemType = mysqli_real_escape_string($conn,$itemType);
$itemPieces = mysqli_real_escape_string($conn,$itemPieces);
$grossItemWeight = mysqli_real_escape_string($conn,$grossItemWeight);
$grossWeightType = mysqli_real_escape_string($conn,$grossWeightType);
$itemWeight = mysqli_real_escape_string($conn,$itemWeight);
$weightType = mysqli_real_escape_string($conn,$weightType);
$itemTunch = mysqli_real_escape_string($conn,$itemTunch);
// End To protect MySQL injection

if ($custId == '' or $custId == NULL or $itemName == '' or $itemName == NULL or $itemType == '' or $itemType == NULL or
        $itemPieces == '' or $itemPieces == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    if ($itemType != 'Other') {
        if ($itemWeight == '' or $itemWeight == NULL or $weightType == '' or $weightType == NULL or
                $grossItemWeight == '' or $grossItemWeight == NULL or $grossWeightType == '' or $grossWeightType == NULL or
                $itemTunch == '' or $itemTunch == NULL) {
            header("Location: " . $documentRoot . "/include/php/ommperrp.php");
            exit();
        }
    }

    /*     Item Table  */

    $qSelGirviId = "SELECT girv_id FROM girvi where girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]' order by girv_ent_dat desc";
    $resGirviId = mysqli_query($conn,$qSelGirviId);
    $rowGirviId = mysqli_fetch_array($resGirviId, MYSQLI_ASSOC);
    $girviItemGriviId = $rowGirviId['girv_id'];

    $queryItem = "INSERT INTO girvi_items (
		girv_itm_girv_id, girv_itm_cust_id, girv_itm_own_id, 
		girv_itm_metal_type, girv_itm_name, girv_itm_pieces, girv_itm_weight, girv_itm_weight_type, girv_itm_gross_weight, girv_itm_gross_weight_type,
		girv_itm_tunch_id, girv_itm_DOB, girv_itm_DOR,
		girv_itm_upd_sts, girv_itm_comm,
		girv_itm_ent_dat) 
		VALUES (
		'$girviItemGriviId','$custId','$girviOwnerId',
		'$itemType','$itemName','$itemPieces','$itemWeight','$weightType','$grossItemWeight','$grossWeightType',
		'$itemTunch','', '',
		'','', 
		$currentDateTime)";

    if (!mysqli_query($conn,$queryItem)) {
        die('Error: ' . mysqli_error($conn));
    }

    if ($addMoreItem == "Add More Items") {
        header("Location: $documentRoot/include/php/orgagmit.php?custId=$custId");
    } else {
        header("Location: $documentRoot/include/php/olggcgdt.php?custId=$custId");//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }
}
require_once 'omssclin.php';
?>