<?php
/*
 * ***************************************************************************************************
 * @tutorial:Firm Delete By OTP
 * ***************************************************************************************************
 * Created on 10-MAY-2023
 *
 * @FileName:otpVerification.php
 * @Author: Vinod Tambe
 * @AuthorEmailId: 
 * 
 * 
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
?>
<?php
            $firmId=$_REQUEST['firmId'];
            $get_otp = $_REQUEST['otp'];
            if ($get_otp != '') {
                $own_mobile = $_GET['own_mobile'];
                $get_otp = md5($get_otp);
               // $get_otp = substr($get_otp, 0, 20);
                $queowner = "SELECT own_otp FROM owner";
                $resowndetail = mysqli_query($conn, $queowner);
                $rowowndetail = mysqli_fetch_array($resowndetail);               
                $own_otp = $rowowndetail['own_otp'];
                if ($own_otp == $get_otp) {
                    echo 'YYYY';
                }else{
                 echo 'Your Enter OTP Is Invalid...';  
                }
            }
?>
