<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'system/omsachsc.php';
//require_once 'system/omsgeagb.php';
//require_once 'system/omssopin.php';
//
//$exePath = strstr(dirname(__FILE__), 'htdocs', TRUE);
//
//$exePathSingleSlash = str_replace("\\", '/', $exePath);
//
//$exePathDoubleSlash = str_replace("\\", '//', $exePath);
//
//echo $exePathSingleSlash;
//
//echo '<br/>' . $exePathDoubleSlash;
$transType = 'UDHAAR';
if ($transType == "UDHAAR','OnPurchase")
    echo 'Output:' . $transType;
else
    echo 'Wrong';
?>
