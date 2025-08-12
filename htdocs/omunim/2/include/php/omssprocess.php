<?php

include_once 'system/omssxxfn.php';
$dataStrForProcess = $_POST['dataStrForProcess'];
$dataStrForProcess = mc_decrypt($dataStrForProcess, OM_ENCRYPT_KEY);
$dataStrForProcessArr = explode("|", $dataStrForProcess);
$currentDateTime = "NOW()";
//echo $dataStrForProcess;
//exit();
$globalProcess = 'YES';
$globalOwnPass = 'PUB3';
$globalOwnIPass = 'MYE3';
//
$prodId = $dataStrForProcessArr[0];
$loginId = $dataStrForProcessArr[1];
$ownerId = $dataStrForProcessArr[2];
$dbname = $dataStrForProcessArr[3];
$dbuser = $dataStrForProcessArr[4];
$dbPass = $dataStrForProcessArr[5];
$dbhost = $dataStrForProcessArr[6];
$dbPort = $dataStrForProcessArr[7];
$prodType = $dataStrForProcessArr[8];
$loginType = $dataStrForProcessArr[9];
$documentRootBSlash = $dataStrForProcessArr[10];
$globalOwnPassType = $dataStrForProcessArr[11];
//
//
//include 'omssprocessNotification.php';
//
include 'omssprocessSms.php';
//
?>