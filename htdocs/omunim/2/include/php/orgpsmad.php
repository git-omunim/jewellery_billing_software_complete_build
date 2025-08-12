<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 6, 2015 5:20:01 PM
 *
 * @FileName: orgpsmad.php
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
?>
<?php

$sessionOwnerId = $_SESSION['sessionOwnerId'];
$staffId = trim($_GET['empId']);
$checkboxId = trim($_GET['checkId']);
$accCheck = trim($_GET['accCheck']);
$accPanel = trim($_GET['accPanel']);

$query = "INSERT INTO access(acc_own_id,acc_emp_id,acc_panel,acc_name,acc_check_id,acc_access,acc_aplcatn) VALUES "
        . "('$sessionOwnerId','$staffId','$accPanel','$accName','$checkboxId','$accCheck','FirmAccess')";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
?>