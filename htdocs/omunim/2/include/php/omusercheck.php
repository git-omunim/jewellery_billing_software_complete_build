<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpfndv.php';
?>
<?php
$mobilenum = $_REQUEST['userMobile'];
$emailId = $_REQUEST['userEmail'];
$loginId = $_REQUEST['userLoginId'];
$userId = $_REQUEST['userId'];
$firmIdSelected = $_SESSION['setFirmSession'];
//
if ($userId != '' && $userId != NULL) {
    $userIdConditionStr = " AND user_id != '$userId'";
} else {
    $userIdConditionStr = "";
}

$queryDupPhnNo = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'duplicateMobileNo'";
$resQueryDupPhnNo = mysqli_query($conn, $queryDupPhnNo);
$rowQueryDupPhnNo = mysqli_fetch_array($resQueryDupPhnNo);
$DupPhnNo = $rowQueryDupPhnNo['omly_value'];

$queryDupEmail = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'duplicateEmailId'";
$resQueryDupEmail = mysqli_query($conn, $queryDupEmail);
$rowQueryDupEmail = mysqli_fetch_array($resQueryDupEmail);
$DupEmail = $rowQueryDupEmail['omly_value'];
//

if ($mobilenum != '' && $mobilenum != NULL) {
    $Mobilenumqueary = "SELECT * FROM  user WHERE user_mobile = '$mobilenum'$userIdConditionStr";
    $resquery1 = mysqli_query($conn, $Mobilenumqueary);
    $Mobilnumcount = mysqli_num_rows($resquery1);

    if ($Mobilnumcount > 0) {
        if ($DupPhnNo == 'YES') {
            if ($Mobilnumcount > 4) {
                echo 'Duplicate Mobile No ! Please Enter Different Mobile No !';
            } else {
                echo 'success';
            }
        } else {
            if ($Mobilnumcount > 0) {
                echo 'Duplicate Mobile No ! Please Enter Different Mobile No !';
            } else {
                echo 'success';
            }
        }
    } else {
        echo 'success';
    }
}
if ($emailId != '' && $emailId != NULL) {
    $Mailidqueary = "SELECT * FROM  user WHERE user_email = '$emailId'$userIdConditionStr";
    $resquery1 = mysqli_query($conn, $Mailidqueary);
    $Mailidcount = mysqli_num_rows($resquery1);
    if ($DupEmail == 'YES') {
        if ($Mailidcount > 4) {
            echo 'Duplicate E-Mail ID ! Please Enter Different E-Mail ID !';
        } else {
            echo 'success';
        }
    } else
    if ($Mailidcount > 0) {
        echo 'Duplicate E-Mail ID ! Please Enter Different E-Mail ID !';
    } else {
        echo 'success';
    }
}
if ($loginId != '' && $loginId != NULL) {
    $LoginIdqueary = "SELECT * FROM  user WHERE user_login_id = '$loginId'$userIdConditionStr";
    $resquery1 = mysqli_query($conn, $LoginIdqueary);
    $LoginIdcount = mysqli_num_rows($resquery1);

    if ($LoginIdcount > 0) {
        echo 'Duplicate Login ID ! Please Enter Different Login ID !';
    } else {
        echo 'success';
    }
}
?>