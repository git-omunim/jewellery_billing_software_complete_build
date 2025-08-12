<?php

/*
 * **************************************************************************************
 * @tutorial: Add New Action Item Process
 * **************************************************************************************
 *
 * Created on 24 Dec, 2012 11:53:25 PM
 *
 * @FileName: omuiacad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

$actionItemOwnerId = $_SESSION['sessionOwnerId'];
$actionItemID = trim($_POST['action_id']);
$omgupTaskDescrpn = trim($_POST['omgupTaskDescrpn']);
$upActionItemStartDOB = $_POST['omgupStartDOBDay'] . ' ' . $_POST['omgupStartDOBMonth'] . ' ' . $_POST['omgupStartDOBYear'];
$upActionItemEndDOB = $_POST['omgupEndDOBDay'] . ' ' . $_POST['omgupEndDOBMonth'] . ' ' . $_POST['omgupEndDOBYear'];
$omgtaskRepeat = trim($_POST['omgtaskRepeat']);
$omgselectFirmId = trim($_POST['omgselectFirmId']);
$actionItemStatus = 'Active';

// Start To protect MySQL injection
$actionItemID = stripslashes($actionItemID);
$omgupTaskDescrpn = stripslashes($omgupTaskDescrpn);
$upActionItemStartDOB = stripslashes($upActionItemStartDOB);
$upActionItemEndDOB = stripslashes($upActionItemEndDOB);
$omgtaskRepeat = stripslashes($omgtaskRepeat);
$omgselectFirmId = stripslashes($omgselectFirmId);

$actionItemID = mysqli_real_escape_string($conn,$actionItemID);
$omgupTaskDescrpn = mysqli_real_escape_string($conn,$omgupTaskDescrpn);
$upActionItemStartDOB = mysqli_real_escape_string($conn,$upActionItemStartDOB);
$upActionItemEndDOB = mysqli_real_escape_string($conn,$upActionItemEndDOB);
$omgtaskRepeat = mysqli_real_escape_string($conn,$omgtaskRepeat);
$omgselectFirmId = mysqli_real_escape_string($conn,$omgselectFirmId);
// End To protect MySQL injection

/*     Item Table  */
if ($omgupTaskDescrpn == '' or $omgupTaskDescrpn == NULL or $upActionItemStartDOB == '' or $upActionItemStartDOB == NULL or $upActionItemEndDOB == '' or $upActionItemEndDOB == NULL or $omgtaskRepeat == '' or $omgtaskRepeat == NULL or
        $omgselectFirmId == '' or $omgselectFirmId == NULL
) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
}
$queryItem = "UPDATE actionitem SET
		acit_owner_id='$actionItemOwnerId',acit_action_id='$actionItemID',acit_FirmId='$omgselectFirmId',acit_subject='$omgupTaskDescrpn',acit_start_DOB='$upActionItemStartDOB',
                acit_end_DOB='$upActionItemEndDOB',acit_TaskRepeat='$omgtaskRepeat'
                WHERE acit_owner_id = '$actionItemOwnerId' and acit_action_id ='$actionItemID'";


if (!mysqli_query($conn,$queryItem)) {
    die('Error: ' . mysqli_error($conn));
}

header("Location: $documentRoot/include/php/omaiatlt.php");
?>