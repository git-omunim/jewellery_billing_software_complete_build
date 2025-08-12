<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 31 Jul, 2018 11:13:52 AM
 *
 * @FileName: omStockMasterSetupAd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
//
if ($panelName == ''){
$panelName = $_GET['panelName'];
}
//echo '$panelName =='.$panelName;
?>
<?php
//
$userOwnerId = $_SESSION['sessionOwnerId'];
$masterProdID = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['masterProdID'])));
$metalTypeDiv = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['metalTypeDiv'])));
$prodTypeDiv = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['prodTypeDiv'])));
$masterCategory = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['masterCategory'])));
$masterName = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['masterName'])));
//
if ($masterName != '') {
    $query = "INSERT INTO item_name (
    itm_nm_own_id,itm_nm_code,itm_nm_metal,itm_nm_prod_type,itm_nm_category,itm_nm_name) 
    VALUES ('$userOwnerId','$masterProdID','$metalTypeDiv','$prodTypeDiv','$masterCategory','$masterName')";
    //echo '$query =='.$query;
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>
