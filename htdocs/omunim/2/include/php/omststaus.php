<?php

/*
 * **************************************************************************************
 * @tutorial: Staff Status File
 * **************************************************************************************
 * 
 * Created on Jul 2, 2013 5:35:47 PM
 *
 * @FileName: omststaus.php
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

//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

//require_once 'system/omssopin.php';
$staffId = $_GET['staffId'];
$StaffActiveStatus = $_GET['StaffActiveStatus'];
//echo '$staffId =' . $staffId . '<br>';
//echo 'StaffActiveStatus =' . $StaffActiveStatus;
//die;
//$selectquerry = "SELECT * FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$staffId'";
//if (!mysqli_query($conn,$selectquerry)) {
//        die('Error: ' . mysqli_error($conn));
//    }
$query = "UPDATE user SET user_status = '$StaffActiveStatus' WHERE user_id='$staffId'";
if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}
 header('Location: ' . $documentRoot . '/include/php/omeestlt.php?divMainMiddlePanel=StaffHome');