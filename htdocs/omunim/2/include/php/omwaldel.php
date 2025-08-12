<?php
/*
 * **************************************************************************************
 * @tutorial:  XRF ENTRIES DELETE FILE @PRIYANKA-02AUG18
 * **************************************************************************************
 * 
 * Created on 02 AUG, 2018 17:06:00 PM
 *
 * @FileName: omwaldel.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.82
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
//Start Staff Access API 
$accFileName = $currentFileName;
include 'ommpemac.php';
require_once 'system/omssopin.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<?php
// 
$documentRoot = $_GET['documentRoot'];
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$xrfId = $_GET['xrfId'];
$panelName = $_GET['panelName'];
$custId = $_GET['custId'];
//
// print_r($_REQUEST);die;
//
// START CODE TO DELETE XRF ENTRIES FROM xrf_entries TABLES @Author:PRIYANKA-02AUG18
if ($panelName == 'deleteXRFEntries') {
    //
    // DELETE XRF ITEM ENTRIES FROM xrf_entries table @Author:PRIYANKA-02AUG18
    $query = "DELETE FROM xrf_entries WHERE xrf_id = '$xrfId'";
    //
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
// END CODE TO DELETE XRF ENTRIES FROM xrf_entries TABLES @Author:PRIYANKA-02AUG18
//
if ($panelName == 'deleteXRFEntries') {
    header("Location: $documentRoot/include/php/ogxrfdv.php?custId=$custId");
}
//
?>