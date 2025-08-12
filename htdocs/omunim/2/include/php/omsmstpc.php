<?php

/*
 * **************************************************************************************
 * @tutorial: sms template check
 * **************************************************************************************
 * 
 * Created on Feb 21, 2014 10:51:57 AM
 *
 * @FileName: omsmstpc.php
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
$accFileName = $currentFileName;
include 'ommpemac.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
?>
<?php
$smsTempId = $_GET['smsTempId'];
$selSmsTempText = "SELECT smtp_id FROM sms_templates where smtp_sub ='$smsTempId'";
$resSmsTempText = mysqli_query($conn,$selSmsTempText);
$subPresent = mysqli_num_rows($resSmsTempText);
if($subPresent == 0){
    echo 'SUCCESS';
}else{
    echo 'SUBPRESENT'; 
}
?>