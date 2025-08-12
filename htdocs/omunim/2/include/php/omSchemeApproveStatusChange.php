<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME APPROVE STATUS CHANGING POPUP FILE @AUTHOR: HEMA-25FEB2020
 * **************************************************************************************
 * 
 * Created on  Feb 25, 2020 12:54:56 PM
 *
 * @FileName: omSchemeApproveStatusChange.php
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
//$delStatus = $_POST['selStatus'];
$kittyMondepId = $_POST['kittyMondepId'];
$kittyApproveStatus = $_POST['kittyApproveStatus'];

if ($kittyMondepId == '') {
    $kittyMondepId = $_GET['kittyMondepId'];
}
if ($kittyApproveStatus == '') {
    $kittyApproveStatus = $_GET['kittyApproveStatus'];
}

//echo '$delStatus = '.$delStatus.'</br>';
//echo '$kittyMondepId = '.$kittyMondepId.'</br>';
//echo '$kittyApproveStatus = '.$kittyApproveStatus.'</br>';

$qUpdateDelStatusDetails = "UPDATE kitty_money_deposit SET kitty_mondep_approve_status='$kittyApproveStatus' WHERE kitty_mondep_id='$kittyMondepId' and kitty_mondep_own_id='$_SESSION[sessionOwnerId]'";
$resProductDetails = mysqli_query($conn, $qUpdateDelStatusDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qUpdateDelStatusDetails);
if($resProductDetails == 1) {
    ?>
    <div style="color: green;margin-top: 20px;margin-left: 10px;">
        <b> <?php echo 'APPROVED SUCCESSFULLY!'; ?></b>
    </div>
<?php } ?>
