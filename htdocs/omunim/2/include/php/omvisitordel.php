<?php
/*
 * *****************************************************************************************************************************
 * @tutorial: UPDATE STAFF TEAM 
 * *****************************************************************************************************************************
 * 
 * Created on 16 NOV 2022 12:32:00 PM
 *
 * @FileName:omvisitordel.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  
 * @ProjectName: omunim
 * @version 2.7
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php'; 
?>
<?php
$visitorId = $_REQUEST['visitorId'];
$qdeleteVisitor= "delete from visitor where visitor_id='$visitorId'";
if (!mysqli_query($conn, $qdeleteVisitor)) {
    die('Error: ' . mysqli_error($conn));
}else{
    header("Location: $documentRoot/include/php/omleads.php?para=duplicate");
}
?>