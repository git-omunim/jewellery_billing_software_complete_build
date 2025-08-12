<?php

/*
 * **************************************************************************************
 * @tutorial: UNIVERSAL MASTER ITEM PRODUCT CODE LIST @ DARSHANA 6 SEPT 2021 
 * **************************************************************************************
 * 
 * Created on 6 SEPT 2021
 *
 * @FileName: omSerchPcodByName.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';

$ItemCategory = $_GET['ItemCategory'];
$ItemName = $_GET['ItemName'];
$ItemMetalType = $_GET['ItemMetalType'];

$selectProductCode = "SELECT ms_itm_pre_id FROM master_item WHERE ms_itm_category='$ItemCategory'AND ms_itm_name='$ItemName'"
        . " AND ms_itm_metal='$ItemMetalType' order by ms_itm_id desc LIMIT 0,1";

$queryProductCode = mysqli_query($conn, $selectProductCode) or die("Error: " . mysqli_error($conn) . " with query " . $selectProductCode);
$totPCodeNumRow = mysqli_num_rows($queryProductCode);

if ($totPCodeNumRow > 0) {

    $rowPcode = mysqli_fetch_array($queryProductCode, MYSQLI_ASSOC);
    $ProductCode = $rowPcode['ms_itm_pre_id'];
    $ProductCode = str_replace("#", "", $ProductCode);
     echo $ProductCode;
}
?>