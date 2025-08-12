<?php

/*
 * **************************************************************************************
 * @tutorial: LOYALTY CARD SCAN NUMBER
 * **************************************************************************************
 * 
 * Created on June 07,03:30 PM
 *
 * @FileName: omlypopup.php
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpcmfc.php';
?>
<?php

$userId = $_REQUEST['userId'];
$user_loyal_points = $_REQUEST['loyaltycard'];
$utin_lp_close = $_REQUEST['utin_lp_close'];
//
if ($user_loyal_points != '') {
    //
    $loyaltyPointExist = noOfRowsCheck("user_id", "user", "user_type='CUSTOMER' AND user_status='Active' AND user_loyal_points='$user_loyal_points' AND user_id!='$userId'");
    //
    if ($loyaltyPointExist > 0) {
        //
        $loayaltyExistForOtherCustomer = 'YES';
        $loayaltyExistForOtherCustomerStr = 'loyaltyExist=YES';
        //
    } else {
        //
        $loayaltyExistForOtherCustomer = 'NO';
        $loayaltyExistForOtherCustomerStr = 'loyaltyExist=NO';
        //
    }
    //
} else {
    //
    $loayaltyExistForOtherCustomer = 'NO';
    $loayaltyExistForOtherCustomerStr = 'loyaltyExist=NO';
    //
}
//
if ($loayaltyExistForOtherCustomer == 'NO') {
    $newloyaltycardUpdateQuery = "UPDATE user SET user_loyal_points = '$user_loyal_points' WHERE user_id = '$userId'";
    mysqli_query($conn, $newloyaltycardUpdateQuery);
}
//
header("Location: $documentRoot/include/php/omcheckloyalno.php?userId=$userId&loyaltycard=$user_loyal_points&utin_lp_close=$utin_lp_close&$loayaltyExistForOtherCustomerStr");
//
?>