<?php

/*
 * **************************************************************************************
 * @tutorial: TO ADD GIRVI TO TALLY LOAN FROM ACTIVE LOAN
 * **************************************************************************************
 *
 * Created on 6 SEP, 2013 11:46:44 PM
 *
 * @FileName: orgrvtly.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
$preId = $_GET['preId'];
$postId = $_GET['postId'];
$panel = $_GET['panel'];
$panel = urldecode($panel);
$today = date('Y-m-d H:i:s');
$today = strtotime($today);
$noOfGirvi = $_GET['num'];
$type = $_GET['type'];
$fromDatew = isset($_GET['fromDate']) ? $_GET['fromDate'] : '';
$toDatew = isset($_GET['toDate']) ? $_GET['toDate'] : '';
// If either is missing, assign today's date
if (empty($fromDatew)) {
    $fromDate = date('Y-m-d');
}
if (empty($toDatew)) {
    $toDate = date('Y-m-d');
}
if (!isset($preId) && !isset($postId)) {
    $qSelectResetDate = "SELECT * FROM omindicators WHERE omin_own_id='$_SESSION[sessionOwnerId]' and omin_option='resetgirvitally'";
    $resResetDate = mysqli_query($conn,$qSelectResetDate);

    if (mysqli_num_rows($resResetDate) == 0) {
        $qInsertResetDate = "INSERT INTO omindicators(omin_own_id, omin_option ,omin_value) VALUES('$_SESSION[sessionOwnerId]','resetgirvitally','$today')";
        $resInsertResetDate = mysqli_query($conn,$qInsertResetDate);
    } else {
        $qUpdateResetDate = "UPDATE omindicators SET omin_value='$today' WHERE omin_own_id='$_SESSION[sessionOwnerId]' AND  omin_option='resetgirvitally'";
        $resUpdateResetDate = mysqli_query($conn,$qUpdateResetDate);
    }
    $qUpdateGirviTallyDate = "UPDATE girvi SET girv_tally_date='$today' where girv_own_id='$_SESSION[sessionOwnerId]' and girv_tally_date IS NOT NULL";
    $resUpdateGirviTallyDate = mysqli_query($conn,$qUpdateGirviTallyDate);
} else {
    $qSelectResetDate = "SELECT * FROM omindicators WHERE omin_own_id='$_SESSION[sessionOwnerId]' and omin_option='resetgirvitally'";
    $resResetDate = mysqli_query($conn,$qSelectResetDate);
    $row = mysqli_fetch_array($resResetDate, MYSQLI_ASSOC);
    $resetDate = $row['omin_value'];
    /****************Start code to change query @Author:PRIYA03APR14****************/
    if ($panel == 'NON TALLY' && $type !='MULTIPLE') {
        $qSelect = "UPDATE girvi SET girv_tally_date='$today' where girv_own_id='$_SESSION[sessionOwnerId]' and (girv_pre_serial_num = '$preId' OR girv_pre_serial_num IS NULL) and girv_serial_num = '$postId' and (girv_tally_date='$resetDate' OR girv_tally_date IS NULL)";
        $res = mysqli_query($conn,$qSelect);
    }else if ($panel == 'NON TALLY' && $type =='MULTIPLE') {
        $postId = preg_replace('/\D/', '', $postId);
        $today = date('Y-m-d H:i:s');
        $today = strtotime($today);
        $qSelect = "UPDATE girvi SET girv_tally_date='$today' where girv_own_id='$_SESSION[sessionOwnerId]' and girv_id='$postId'";
        $res = mysqli_query($conn,$qSelect);
    }  else {
//        $qSelect = "UPDATE girvi SET girv_tally_date='$resetDate' where girv_own_id='$_SESSION[sessionOwnerId]' and girv_pre_serial_num = '$preId' and girv_serial_num = '$postId' ";
        $qSelect = "UPDATE girvi SET girv_tally_date='$resetDate' where girv_own_id='$_SESSION[sessionOwnerId]' and (girv_pre_serial_num = '$preId' OR girv_pre_serial_num IS NULL) and girv_serial_num = '$postId' ";
        $res = mysqli_query($conn,$qSelect);
    }
     /****************End code to change query @Author:PRIYA03APR14****************/
}

header("Location: " . $documentRoot . "/include/php/orgpgtly.php?num=$noOfGirvi&fromDatew=$fromDatew&toDatew=$toDatew");
?>