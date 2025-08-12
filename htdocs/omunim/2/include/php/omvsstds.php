<?php /**
 * 
 * Created on Aug 27, 2011 10:56:07 AM
 *
 * @FileName: omvsstds.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
 */ ?>
<?php

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

$stateOwnerId = $_SESSION['sessionOwnerId'];
$stateName = trim($_POST['stateName']);

// Start To protect MySQL injection
$stateName = stripslashes($stateName);

$stateName = mysqli_real_escape_string($conn,$stateName);
// End To protect MySQL injection

$qSelState = "SELECT state_id FROM state where state_selected='selected' and state_own_id='$stateOwnerId'";
$resState = mysqli_query($conn,$qSelState);

if ($rowState = mysqli_fetch_array($resState, MYSQLI_ASSOC)) {

    $stateId = $rowState['state_id'];

    $query = "UPDATE state SET
		state_selected=''
		WHERE state_own_id = '$stateOwnerId' and state_id = '$stateId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}

$query = "UPDATE state SET
		state_selected='selected'
		WHERE state_own_id = '$stateOwnerId' and state_name = '$stateName'";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}

header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateSet');
?>