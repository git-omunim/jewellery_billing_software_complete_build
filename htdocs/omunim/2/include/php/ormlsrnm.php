<?php

/*
 * **************************************************************************************
 * @tutorial: ML serial number
 * **************************************************************************************
 * 
 * Created on Jan 21, 2015 1:20:02 PM
 *
 * @FileName: ormlsrnm.php
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
include 'ommpdpmsg.php';
require_once 'system/omssopin.php';
?>
<?php

$firmId = $_GET['firmNo'];
$sessionOwnerId = $_SESSION[sessionOwnerId];

$qSelGirviPreSerialNo = "SELECT ml_pre_serial_num FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_firm_id='$firmId' order by ml_id desc LIMIT 0,1";
$resGirviPreSerialNo = mysqli_query($conn,$qSelGirviPreSerialNo) or die(mysqli_error($conn));
$rowGirviPreSerialNo = mysqli_fetch_array($resGirviPreSerialNo);
$girviPreSerialNo = $rowGirviPreSerialNo['ml_pre_serial_num'];
if ($girviPreSerialNo == NULL || $girviPreSerialNo == '') {
    $girviPreSerialNo = NULL;
    $qSelGirviSerialNo = "SELECT max(ml_serial_num) as girviSerialNo FROM ml_loan where ml_pre_serial_num is NULL and ml_own_id='$sessionOwnerId'";
    $resGirviSerialNo = mysqli_query($conn,$qSelGirviSerialNo);
    $rowGirviSerialNo = mysqli_fetch_array($resGirviSerialNo, MYSQLI_ASSOC);
} else {
    $qSelGirviSerialNo = "SELECT max(ml_serial_num) as girviSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_firm_id='$firmId' and "
            . " ml_pre_serial_num = '$girviPreSerialNo'";
    $resGirviSerialNo = mysqli_query($conn,$qSelGirviSerialNo);
    $rowGirviSerialNo = mysqli_fetch_array($resGirviSerialNo, MYSQLI_ASSOC);
}
$girviSerialNo = $rowGirviSerialNo['girviSerialNo'] + 1;

$qSelSerialNo = "SELECT ml_serial_num FROM ml_loan where ml_serial_num='$girviSerialNo' and ml_pre_serial_num='$girviPreSerialNo' and ml_own_id='$sessionOwnerId'";
$resSerialNo = mysqli_query($conn,$qSelSerialNo);
$rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
$gSerialNo = $rowSerialNo['ml_serial_num'];
if ($gSerialNo != '' || $gSerialNo != NULL) {
    $qSelGirviSerialNo = "SELECT max(ml_serial_num) as girviSerialNo FROM ml_loan where ml_pre_serial_num='$girviPreSerialNo' and ml_own_id='$sessionOwnerId'";
    $resGirviSerialNo = mysqli_query($conn,$qSelGirviSerialNo);
    $rowGirviSerialNo = mysqli_fetch_array($resGirviSerialNo, MYSQLI_ASSOC);
    $girviSerialNo = $rowGirviSerialNo['girviSerialNo'] + 1;
}
echo $girviPreSerialNo . '*' . $girviSerialNo;
?>