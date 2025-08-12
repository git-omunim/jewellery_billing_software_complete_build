<?php

/*
 * Created on May 26, 2011 10:57:47 AM
 *
 * @FileName: omvsaast.php
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
$stateName = om_ucfirst(trim($_POST['stateName'])); //om_ucfirst Function Added @AUTHOR:PRIYA11JUNE13 
$stateComments = trim($_POST['stateComments']);

// Start To protect MySQL injection
$stateName = stripslashes($stateName);
$stateComments = stripslashes($stateComments);

$stateName = mysqli_real_escape_string($conn,$stateName);
$stateComments = mysqli_real_escape_string($conn,$stateComments);
// End To protect MySQL injection

$qSelState = "SELECT state_name FROM state where state_name='$stateName' and state_own_id='$stateOwnerId'";
$resState = mysqli_query($conn,$qSelState);

if ($rowState = mysqli_fetch_array($resState, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateAlreadyExist');
}
/* * *****Start Code To Add state_upd_sts=user @Author:PRIYA29AUG13********** */ else {
    $query = "INSERT INTO state (
		state_own_id, state_name,
		state_comm, state_upd_sts, 
		state_ent_dat) 
		VALUES (
		'$stateOwnerId','$stateName',
		'$stateComments','User',
		$currentDateTime)";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'NEW STATE ADDED';
    $sslg_trans_comment = $stateName . ' NEW STATE ADDED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateAdded');
}
/* * *****End Code To Add state_upd_sts=user @Author:PRIYA29AUG13********** */
require_once 'omssclin.php';
?>