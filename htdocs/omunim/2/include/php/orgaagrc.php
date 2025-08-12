<?php /**
 * 
 * Created on Sep 7, 2011 12:36:35 AM
 *
 * @FileName: orgaagrc.php
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
$custId = trim($_POST['custId']);
$girviId = trim($_POST['girviId']);
$pageNo = trim($_POST['pageNo']);
$totalTime = trim($_POST['totalTime']);
$totalAmt = trim($_POST['totalAmt']);
$totalInt = trim($_POST['totalInt']);
$girvDOR = date(d) . ' ' . date(M) . ' ' .date(Y);

if($custId == '' or $custId == NULL or $girviId == '' or $girviId == NULL){
        //echo 'CID'.$custId.'GID'.$girviId.'PN'.$pageNo;
	header("Location: " . $documentRoot . "/omLoginPage.php");
}
else {
    //echo 'CID'.$custId.'GID'.$girviId.'PN'.$pageNo;
    
		$query="UPDATE girvi SET
		girv_upd_sts='ReleaseCart',
                girv_total_time='$totalTime',
                girv_total_amt='$totalAmt',
                girv_total_int='$totalInt',
		girv_DOR='$girvDOR'
		WHERE girv_own_id = '$girviOwnerId' and girv_cust_id = '$custId' and girv_id = '$girviId'";
		
		if (!mysqli_query($conn,$query))
		{
			die('Error: ' . mysqli_error($conn));
		}
                //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
		header( "Location: " . $documentRoot . "/include/php/olggcgdt.php?page=" . $pageNo . "&custId=" . $custId );
}
require_once 'omssclin.php';
?>