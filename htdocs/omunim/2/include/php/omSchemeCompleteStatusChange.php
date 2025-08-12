<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME COMPLETE STATUS CHANGING POPUP FILE @AUTHOR: HEMA-25FEB2020
 * **************************************************************************************
 * 
 * Created on  Feb 25, 2020 12:54:56 PM
 *
 * @FileName: omSchemeCompleteStatusChange.php
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
include_once 'ommpfndv.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$delStatus = $_POST['selStatus'];
$kittyMondepId = $_POST['kittyMondepId'];
$kittyCompleteStatus = $_POST['kittyApproveStatus'];

if ($kittyMondepId == '') {
    $kittyMondepId = $_GET['kittyMondepId'];
}
if ($kittyCompleteStatus == '') {
    $kittyCompleteStatus = $_GET['kittyApproveStatus'];
}

//echo '$delStatus = '.$delStatus.'</br>';
//echo '$kittyMondepId = '.$kittyMondepId.'</br>';
//echo '$kittyCompleteStatus = '.$kittyCompleteStatus.'</br>';

$qUpdateDelStatusDetails = "UPDATE kitty_money_deposit SET kitty_mondep_admin_approve_status='$kittyCompleteStatus' WHERE kitty_mondep_id='$kittyMondepId' and kitty_mondep_approve_status = 'APPROVE' and kitty_mondep_own_id='$_SESSION[sessionOwnerId]'";
$resProductDetails = mysqli_query($conn, $qUpdateDelStatusDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qUpdateDelStatusDetails);
if($resProductDetails == 1) {
    ?>
    <div style="color: green;margin-top: 20px;margin-left: 10px;">
        <b> <?php echo 'COMPLETE SUCCESSFULLY!'; ?></b>
    </div>
<?php } ?>
