<?php

/*
 * **************************************************************************************
 * @tutorial: Note - Use this file to send only Online Munim System Messages Like Firm Delete or Password Reset
 * **************************************************************************************
 * 
 * Created on 23-Sep-2023 7:14:24 am
 *
 * @FileName: omSmsSystemMessages.php
 * @Author: Online Munim Developement Team
 * @AuthorEmailId:  info@omunim.com
 * @ProjectName: omunim_daily
 * @version 3.0.0
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
 *  Copyright 2022 OMUNIM SOFTWARE PVT LTD
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

include 'system/omsachsc.php';
include_once './ommpfndv.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
if ($globalProcess == 'YES') {
    //
    $ownUserId = $loginId;
    //
} else {
    //
    $ownUserId = $_SESSION['sessionUserId'];
    //
}
//
$otpCode = mt_rand(100000, 999999);
$otpCodeMD5 = md5($otpCode);
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$custId = $_REQUEST['user_id'];
$userMob = $_REQUEST['user_mobile'];
if ($userMob == '' || $userMob == null)
    $userMob = $_SESSION['sessionOwnerMobNo'];
//
$type = $_REQUEST['type'];
if ($type == 'OwenerOTP') {
    //echo '<br/>$systemOnOrOff' . $systemOnOrOff;
    if ($systemOnOrOff == 'ON') {
        //
        $qToCheckOwn = "SELECT own_id from owner";
        $resToCheckOwn = mysqli_query($conn, $qToCheckOwn);
        $noOfRowsToCheckOwn = mysqli_num_rows($resToCheckOwn);
        //
        //echo '<br/>$noOfRowsToCheckOwn' . $noOfRowsToCheckOwn;
        if ($noOfRowsToCheckOwn > 0) {
            //
            $qUpOtp = "UPDATE owner SET own_otp='$otpCodeMD5' WHERE own_id='$custId'";
            //echo '<br/>$qUpOtp' . $qUpOtp;
            if (!mysqli_query($conn, $qUpOtp)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
        } else {
            //
            $qUpOtp = "INSERT INTO owner (own_id, own_otp) VALUES ('$custId', '$otpCodeMD5');";
            //echo '<br/>$qUpOtp' . $qUpOtp;
            if (!mysqli_query($conn, $qUpOtp)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
    } else {
        $qUpOtp = "UPDATE owner SET own_otp='$otpCodeMD5' WHERE own_id='$custId'";
        if (!mysqli_query($conn, $qUpOtp)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
} else {
    $qUpOtp = "UPDATE user SET user_otp='$otpCodeMD5' WHERE user_id='$custId' and user_owner_id='$sessionOwnerId'";
    if (!mysqli_query($conn, $qUpOtp)) {
        die('Error: ' . mysqli_error($conn));
    }
}

//
$mobileNo = stripslashes($userMob);
//
$messType = 'TSMS';
$msgText = "Dear Customer,
Your OTP for Online Munim portal is $otpCode. Please do not share this OTP.

Regards,
Online Munim Software";
//
$msgText = urlencode($msgText);
//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://my.omunim.in/include/php/onsmsapi.php");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "productKey=101375&ownUserId=sgen&mobileNo=$mobileNo&messType=$messType&msgText=$msgText");
$omSMSResult = curl_exec($ch);
curl_close($ch);
//echo "productKey=101375&ownUserId=sgen&mobileNo=$mobileNo&messType=$messType&msgText=$msgText";
echo $omSMSResult;
// 
?>