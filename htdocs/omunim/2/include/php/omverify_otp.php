<?php

/*
 * **************************************************************************************
 * @tutorial: Labels
 * **************************************************************************************
 * 
 * Created on Jun 5, 2014 2:52:01 PM
 *
 * @FileName: omverify_otp.php
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
include_once 'ommpcmfc.php';
include_once 'ommpcmfcc.php';

// $user_id = isset($_GET['custId']) ? $_GET['custId'] : '';
$girviId = isset($_REQUEST['girviId']) ? $_REQUEST['girviId'] : '';
$pageNo = isset($_REQUEST['pageNo']) ? $_REQUEST['pageNo'] : '';
$dateCompare = isset($_REQUEST['dateCompare']) ? $_REQUEST['dateCompare'] : '';
$custId = isset($_REQUEST['custId']) ? $_REQUEST['custId'] : '';
$get_otp = isset($_REQUEST['otp']) ? $_REQUEST['otp'] : '';
$own_mobile = $firmId;

// print_r($_REQUEST);

if ($get_otp != '') {
    $hashed_otp = md5($get_otp);

    // Filter by user_id
    $queowner = "SELECT user_otp FROM user WHERE user_id = '$custId' LIMIT 1";
    $resowndetail = mysqli_query($conn, $queowner);

    if ($resowndetail && mysqli_num_rows($resowndetail) > 0) {
        $rowowndetail = mysqli_fetch_assoc($resowndetail);
        $own_otp = $rowowndetail['user_otp'];

        if ($own_otp === $hashed_otp) {
            echo 'YYYY';
        } else {

            // echo 'YYYY';
            echo 'Your Entered OTP is Invalid...<br>' . $girviId;
            // echo "Hashed OTP: $hashed_otp<br>";
            // echo "Stored OTP: $own_otp<br>";
            // echo "custId (firmId): $firmId<br>";
            // echo "own_mobile: $own_mobile<br>";
        }
    } else {
        echo "User not found in DB.<br>";
    }
}
?>
