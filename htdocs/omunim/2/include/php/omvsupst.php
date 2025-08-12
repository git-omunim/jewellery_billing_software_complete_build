<?php

/*
 * Created on May 27, 2011 1:21:55 PM
 *
 * @FileName: omvsupst.php
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
?>
<?php

require_once 'system/omssopin.php';

$stateOwnerId = $_SESSION['sessionOwnerId'];
$stateId = trim($_POST['stateId']);
$stateName = trim($_POST['stateName']);
$stateComments = trim($_POST['stateComments']);

// Start To protect MySQL injection
$stateName = stripslashes($stateName);
$stateComments = stripslashes($stateComments);

$stateName = mysqli_real_escape_string($conn,$stateName);
$stateComments = mysqli_real_escape_string($conn,$stateComments);
// End To protect MySQL injection

$qSelState = "SELECT state_name FROM state where state_name='$stateName' and state_own_id='$stateOwnerId' and state_id!='$stateId'";
$resState = mysqli_query($conn,$qSelState);

if ($rowState = mysqli_fetch_array($resState, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateAlreadyExist');
} else {

    $query = "UPDATE state SET
		state_name='$stateName',
		state_comm='$stateComments'
		WHERE state_own_id = '$stateOwnerId' and state_id = '$stateId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'STATE UPDATED';
    $sslg_trans_comment = $stateName . ' STATE UPDATED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateUpdated');
}
require_once 'omssclin.php';
?>