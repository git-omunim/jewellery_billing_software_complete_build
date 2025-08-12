<?php
/*
 * *****************************************************************************************************
 * @tutorial: FOR ADDED MAIN INV NO IN UDHAAR DEPOSITE REPORT LOGINID:- MURUGAN @SIMRAN:12JUN2023
 * *****************************************************************************************************
 * 
 * Created on AUG 26, 2019
 *
 * @FileName: omUdhaarMainInvNoUpdateUpd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.6.104
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
$selQuery = "SELECT utin_id,utin_pre_invoice_no,utin_invoice_no,utin_other_info FROM user_transaction_invoice "
        . "WHERE utin_transaction_type IN ('sell','ESTIMATESELL')";

$resQuery = mysqli_query($conn, $selQuery);
$noOfRows = mysqli_num_rows($resQuery);
//
//
if ($noOfRows > 0) {
     while ($rowSellDetails = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
         $mainInvNO = $rowSellDetails['utin_pre_invoice_no'].$rowSellDetails['utin_invoice_no'];
         $utin_id = $rowSellDetails['utin_id'];

    $query = "UPDATE user_transaction_invoice SET utin_main_inv_no = '$mainInvNO' "
            . "WHERE utin_type='onPurchase' AND utin_transaction_type='UDHAAR' AND utin_utin_id = '$utin_id' ";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
  }
}
//
//
$selQuery1 = "SELECT utin_main_inv_no,utin_id FROM user_transaction_invoice "
            . "WHERE utin_type='onPurchase' AND utin_transaction_type='UDHAAR' ";

$resQuery1 = mysqli_query($conn, $selQuery1);
$noOfRows1 = mysqli_num_rows($resQuery1);
//
//
if ($noOfRows1 > 0) {
     while ($rowSellDetails1 = mysqli_fetch_array($resQuery1, MYSQLI_ASSOC)) {
         $mainInvNo2 = $rowSellDetails1['utin_main_inv_no'];
         $utin_id1 = $rowSellDetails1['utin_id'];

    $query2 = "UPDATE user_transaction_invoice SET utin_main_inv_no = '$mainInvNo2' "
            . "WHERE utin_type='UDHAAR' AND utin_transaction_type='UDHAAR DEPOSIT' AND utin_utin_id = '$utin_id1' ";
    if (!mysqli_query($conn, $query2)) {
        die('Error: ' . mysqli_error($conn));
    }
  }
}
?>