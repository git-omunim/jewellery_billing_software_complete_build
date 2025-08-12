<?php

/*
 * **************************************************************************************
 * @tutorial: Raw Metal Image Details File
 * **************************************************************************************
 * 
 * Created on May 27, 2013 12:02:48 PM
 *
 * @FileName: ogrwmtim.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
?>
<?php

require_once 'system/omssopin.php';
$rawMetalId = $_GET['itstId'];
$mlId = $_GET['mlId'];
//echo $mlId;
$panel = $_GET['panel'];
$imageOf = $_GET['imageOf']; //to check image @AUTHOR: SANDY9NOV13
 $selMetDetUpdate = "SELECT * FROM image where image_user_id='$mlId'";

//echo '$rawMetalId'.$rawMetalId;comment @AUTHOR: SANDY15DEC13
/* * ************Start to add code for Repair Item Panel @AUTHOR: SANDY9NOV13******************* */
if ($imageOf == 'RepairItem') {
    $selMetDetUpdate = "SELECT * FROM repair_item where repair_owner_id='$_SESSION[sessionOwnerId]' and repair_id='$rawMetalId'";
    $resMetDetUpdate = mysqli_query($conn,$selMetDetUpdate) or die(mysqli_error($conn));
    $rowMetDetUpdate = mysqli_fetch_array($resMetDetUpdate);
    $rawMetalSnapFiletype = $rowMetDetUpdate['repair_snap_ftype'];
    header("Content-type: $rawMetalSnapFiletype");
    if ($panel == 'snap') {
        echo $rowMetDetUpdate['repair_snap'];
    } else {
        echo $rowMetDetUpdate['repair_snap_thumb'];
    }
}
/* * ************End to add code for Repair Item Panel @AUTHOR: SANDY9NOV13************* */
/* * ************Start to add code for add raw metal from setting panel @AUTHOR: SANDY13DEC13******************* */ else if ($imageOf == 'MainRawMetalAddPanel') {
    $selMetDetUpdate = "SELECT * FROM raw_metals where raw_metal_own_id='$_SESSION[sessionOwnerId]' and raw_metal_id='$rawMetalId'";
    $resMetDetUpdate = mysqli_query($conn,$selMetDetUpdate) or die(mysqli_error($conn));
    $rowMetDetUpdate = mysqli_fetch_array($resMetDetUpdate);
    $rawMetalSnapFiletype = $rowMetDetUpdate['raw_metal_snap_ftype'];
    header("Content-type: $rawMetalSnapFiletype");
    if ($panel == 'snap') {
        echo $rowMetDetUpdate['raw_metal_snap'];
    } else {
        echo $rowMetDetUpdate['raw_metal_snap_thumb'];
    }
} 
/* * ************End to add code for add raw metal from setting panel @AUTHOR: SANDY13DEC13******************* */ 
/*********Start to add code for money lender image @AUTHOR: SANT25JAN16**************/
else if ($imageOf == 'MoneyLender') {
    $selMetDetUpdate = "SELECT * FROM image where image_user_id='$mlId'";

    $resMetDetUpdate = mysqli_query($conn,$selMetDetUpdate) or die(mysqli_error($conn));
    $rowMetDetUpdate = mysqli_fetch_array($resMetDetUpdate);
    $rawMetalSnapFiletype = $rowMetDetUpdate['image_snap_ftype'];
    header("Content-type: $rawMetalSnapFiletype");
    if ($panel == 'snap') {
        echo $rowMetDetUpdate['image_user'];
    } else {
        echo $rowMetDetUpdate['image_snap_thumb'];
    }
}
/*********END to add code for money lender image @AUTHOR: SANT25JAN16**************/

else {
    $selMetDetUpdate = "SELECT * FROM raw_stock_purchase where rwPr_own_id='$_SESSION[sessionOwnerId]' and rwPr_id='$rawMetalId'";
    $resMetDetUpdate = mysqli_query($conn,$selMetDetUpdate) or die(mysqli_error($conn));
    $rowMetDetUpdate = mysqli_fetch_array($resMetDetUpdate);
    $rawMetalSnapFiletype = $rowMetDetUpdate['rwPr_snap_ftype'];
    header("Content-type: $rawMetalSnapFiletype");
    if ($panel == 'snap') {
        echo $rowMetDetUpdate['rwPr_snap'];
    } else {
        echo $rowMetDetUpdate['rwPr_snap_thumb'];
    }
}
?>
