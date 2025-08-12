<?php
/*
 * **************************************************************************************
 * @tutorial: system log api
 * **************************************************************************************
 * 
 * Created on Apr 9, 2014 2:51:25 PM
 *
 * @FileName: omslgapi.php
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
if ($globalProcess != 'YES') {
    $currentFileName = basename(__FILE__);
    include 'system/omsachsc.php';
    require_once 'system/omsgeagb.php';
    require_once 'system/omssopin.php';
    $staffId = $_SESSION['sessionStaffId'];
    include_once 'ommpfndv.php';
    include 'ommpsbac.php';
}
?>
<?php
//
//global $sslg_own_login_id, $userId, $firm_name, $sysLogTransType, $sysLogTransId, $sslg_trans_sub, $sslg_trans_comment, $currentDateTime;
//
if ($globalProcess != 'YES') {
    $ownerId = $_SESSION['sessionOwnerId'];
}
//
if ($staffId != '') {
    parse_str(getTableValues("SELECT user_login_id FROM user where user_owner_id='$ownerId' and user_id='$staffId'"));
    $sslg_own_login_id = $user_login_id;
} else {
    parse_str(getTableValues("SELECT own_userid FROM owner"));
    $sslg_own_login_id = $own_userid;
}
//
parse_str(getTableValues("SELECT firm_name FROM firm where firm_own_id='$ownerId' and firm_id='$sslg_firm_id'"));
//
$querySMS = "INSERT INTO sys_log (
	     sslg_own_id,sslg_own_login_id,sslg_cust_id,sslg_firm_name,sslg_trans_type,sslg_trans_Id,sslg_trans_sub,
             sslg_trans_comment,sslg_more_details,sslg_ent_date) 
             VALUES (
	    '$ownerId', '$sslg_own_login_id', '$custId', '$firm_name','$sysLogTransType','$sysLogTransId',"
         . "'$sslg_trans_sub', '$sslg_trans_comment','$sslg_more_details', now())";
//
if (!mysqli_query($conn, $querySMS)) {
    die('Error: ' . mysqli_error($conn));
}
//
//$readWritefile = fopen("ompprdwr.php", "a");
//fwrite($readWritefile, "\n query:" . $querySMS);
//fclose($readWritefile);
//
?>