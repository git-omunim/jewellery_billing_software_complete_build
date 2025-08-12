<?php /**
 * 
 * Created on Jul 10, 2011 7:26:08 PM
 *
 * @FileName: orgudpmn.php
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

//Deposit Money into girvi_money_deposit Table

$query = "SELECT girv_firm_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_id='$girviId'";
    $resQuery = mysqli_query($conn,$query) or die("Error: " . mysqli_error($conn) . " with query " . $query);
    $rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC);

    $girviFirmId = $rowQuery['girv_firm_id'];
    
$queryItem = "INSERT INTO girvi_money_deposit (
		girv_mondep_girv_id, girv_mondep_cust_id, girv_mondep_own_id, 
		girv_mondep_amt, girv_mondep_date,
		girv_mondep_upd_sts, girv_mondep_comm, girv_mondep_firm_id,
		girv_mondep_ent_dat) 
		VALUES (
		'$girviId','$custId', '$girviOwnerId',
		'$girviDepositMainAmount','$girviDepositDate',
                '$girviMonDepStatus', '$girviMonDepComm', '$girviFirmId',
		$currentDateTime)";

if (!mysqli_query($conn,$queryItem)) {
    die('Error: ' . mysqli_error($conn));
}

//Deposit Money into girvi_money_deposit Table


$query = "INSERT INTO girvi_comments (
		girv_comm_girv_id, girv_comm_cust_id, girv_comm_own_id, 
		girv_comm_comm, girv_comm_upd_sts,
		girv_comm_ent_dat) 
		VALUES (
		'$girviId','$custId', '$girviOwnerId',
		'$girviComm','Added',
                $currentDateTime)";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}



if ($addMoreItem == "Add More Items") {
    header("Location: $documentRoot/include/php/olgugvdt.php?custId=$custId&girviId=$girviId");//change in filename @AUTHOR: SANDY20NOV13
} else {
    header("Location: $documentRoot/include/php/olgugvdt.php?custId=$custId&girviId=$girviId");//change in filename @AUTHOR: SANDY20NOV13
}

require_once 'omssclin.php';
?>