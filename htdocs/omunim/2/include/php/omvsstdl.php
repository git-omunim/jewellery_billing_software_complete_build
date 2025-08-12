<?php

/*
 * Created on May 27, 2011 1:22:18 PM
 *
 * @FileName: omvsstdl.php
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
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';

$stateOwnerId = $_SESSION['sessionOwnerId'];
$stateId = trim($_POST['stateId']);

$qSelState = "SELECT state_name FROM state where state_id = '$stateId' and state_own_id='$stateOwnerId' and state_upd_sts='Default'";
$resState = mysqli_query($conn,$qSelState);

if ($rowState = mysqli_fetch_array($resState, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateNotDeleted');
} else {
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    parse_str(getTableValues("SELECT state_name FROM state where state_own_id = '$stateOwnerId' and state_id = '$stateId'"));
    $sslg_trans_sub = 'STATE DELETED';
    $sslg_trans_comment = $state_name . ' STATE DELETED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    $query = "DELETE FROM state WHERE state_own_id = '$stateOwnerId' and state_id = '$stateId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    header('Location: ' . $documentRoot . '/include/php/omvsaasd.php?divMainMiddlePanel=StateDeleted');
}
require_once 'omssclin.php';
?>