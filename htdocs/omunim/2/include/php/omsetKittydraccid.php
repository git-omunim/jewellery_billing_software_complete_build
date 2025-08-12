<?php
/*
 * **********************************************************************************************
 * @tutorial: GET SCHEME ACCOUNT ID @AUTHOR:SIMRAN:28APR2023
 * **********************************************************************************************
 * 
 * Created on 11 AUGUST 2021 04:55:56 PM
 *
 * @FileName: omsetKittycraccid.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
//
$firmId = $_REQUEST['firmId'];
//
$acc_id = '';
//
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_user_acc='Cash in Hand' AND acc_firm_id='$firmId'"));
//
echo $acc_id;
//
?>