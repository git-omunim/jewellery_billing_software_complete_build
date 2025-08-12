<?php
/*
 * **************************************************************************************
 * @Description: Offline SMS API
 * **************************************************************************************
 *
 * Created on 14 Jul, 2013 11:45:55 AM
 *
 * @FileName: omsmsapi.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
}
?>
<?php
//
$omSMSResult = '';
//
//echo '$globalProcess == ' . $globalProcess . '<br />';
//echo '$loginId == ' . $loginId . '<br />';
//echo 'sessionUserId == ' . $_SESSION['sessionUserId'] . '<br />';
//echo '$GLOBALS - systemOnOrOff == ' . $GLOBALS['systemOnOrOff'] . '<br />';
//echo '$systemOnOrOff == ' . $systemOnOrOff . '<br />';
//echo '$prodId == ' . $prodId . '<br />';
//echo 'sessionOwnHKey == ' . $_SESSION['sessionOwnHKey'] . '<br />';
//echo '$dgHWId == ' . $dgHWId . '<br />';
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
if ($systemOnOrOff == '' || $systemOnOrOff == NULL) {
    $systemOnOrOff = $GLOBALS['systemOnOrOff'];
}
//
if ($systemOnOrOff == 'ON' && $globalProcess != 'YES') {
    $hardwareId = $_SESSION['sessionOwnHKey'];
} else if ($globalProcess == 'YES') {
    $hardwareId = $prodId;
} else {
    // Start Code To Get Hardware Id 
    include 'ommpdgid.php';
    $hardwareId = $dgHWId;
    // End Code To Get Hardware Id 
}
//
//$readWritefile = fopen("om_temp.php", "a");
//fwrite($readWritefile, "\n hardwareId= " . "$hardwareId" . " No:" . $mobileNo . " ID:" . $ownUserId . " TYP:" . $messType . " SMS:" . $msgText);
//fclose($readWritefile);
//
// $msgText = nl2br($msgText);
// Start Code to protect MySQL injection
$hardwareId = trim($hardwareId);
$mobileNo = stripslashes($mobileNo);
$mobileNo = mysqli_real_escape_string($conn, $mobileNo);
//
$msgText = stripslashes($msgText);
$msgText = mysqli_real_escape_string($conn, $msgText);
// End Code to protect MySQL injection
//if ($messType != 'TSMS')
$msgTextMain = $msgText;
$msgText = urlencode($msgText);  //EN-CODE URL
//
if (true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.omunim.in/include/php/onsmsapi.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "productKey=$hardwareId&ownUserId=$ownUserId&smsTemplateId=$smsTemplateId&mobileNo=$mobileNo&messType=$messType&msgText=$msgText");
    $omSMSResult = curl_exec($ch);
//echo $omSMSResult;
    curl_close($ch);
} else {
    //echo "<script type='text/javascript' language='Javascript'>window.open('https://web.whatsapp.com/send?phone=" . $mobileNo . "&text=" . $msgTextMain . "'" .", 'whatsapp').focus();</script>";
    //https://wa.me/1XXXXXXXXXX?text=I'm%20interested%20in%20your%20car%20for%20sale
    //
    $mobileNo = '91' . $mobileNo;
    //$wa_com = 'start chrome "https://web.whatsapp.com/send?phone=' . $mobileNo . "&text=$msgTextMain" . '"';
    //$wa_com = 'start chrome "https://wa.me/' . $mobileNo . "?text=$msgTextMain&app_absent=1" . '"';
    $wa_com = 'start whatsapp://send?phone=' . $mobileNo . '^&text=' . $msgText;
    //
    exec($wa_com);
    exec('message\wa\wa.bat');
    sleep(5);
    $omSMSResult = "SUCCESS";
    //exec('taskkill /F /IM chrome.exe /T');        
}
?>