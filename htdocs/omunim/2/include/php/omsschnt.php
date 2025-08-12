<?php

/*
 * **************************************************************************************
 * @tutorial: Check New Tables Status
 * **************************************************************************************
 *
 * Created on 17 Jun, 2012 6:29:40 PM
 *
 * @FileName: omsschnt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
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
require_once 'omsascdb.php'; // Please note this is the Auth file for DB operations only
require_once 'system/omsgeagb.php';
?>
<?php
//Start Code To Check BarCode Print Panel Table Status
$sql = 'DESC barcode_printpanel;';

mysqli_query($conn,$sql);

if (mysqli_errno($conn) == 1146) {
    include 'tables/omtbgbcp.php';
}
//End Code To Check BarCode Print Panel Table Status
//******************************************************************************************************
//Start Code To Check Girvi Transfer Table Status
$sql = 'DESC girvi_transfer;';
mysqli_query($conn,$sql);
if (mysqli_errno($conn) == 1146) {
    include 'tables/omtbgvtn.php'; //Girvi Transfer Table
}
//End Code To Check Girvi Transfer Table Status
?>