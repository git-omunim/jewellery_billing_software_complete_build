<?php /**
 * 
 * Created on Sep 7, 2011 12:36:35 AM
 *
 * @FileName: orgrrmrc.php
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

$girviOwnerId = $_SESSION['sessionOwnerId'];
$girviId = trim($_POST['girviId']);

if($girviId == '' or $girviId == NULL){
   
	header("Location: " . $documentRoot . "/omLoginPage.php");
}
else {
        
		$query="UPDATE girvi SET
		girv_upd_sts='Updated'
                WHERE girv_own_id = '$girviOwnerId' and girv_id = '$girviId'";
		
		if (!mysqli_query($conn,$query))
		{
			die('Error: ' . mysqli_error($conn));
		}
		header( "Location: " . $documentRoot . "/include/php/orgrrelc.php");
}
require_once 'omssclin.php';
?>