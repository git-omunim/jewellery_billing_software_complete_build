<?php

/*
 * **************************************************************************************
 * @tutorial: CHECK PROD CODE LAREADY PRESENT IN DATABASE @ SHREYA 28 NOV 2024
 * **************************************************************************************
 * 
 * Created on 28 NOV 2024
 *
 * @FileName: omsearchprodcodebycatname.php
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
$firmId = $_GET['firmId'];
$itemCode = $_GET['ItemCode'];
//echo '<pre>';
//print_r($_GET);
//echo '</pre>';
$query = "select sttr_item_pre_id from stock_transaction where sttr_stock_type = 'wholesale' and sttr_item_category = '$ItemCategory' "
        . "and sttr_item_name = '$ItemName' and sttr_metal_type = '$ItemMetalType'";
$resQuery = mysqli_query($conn,$query);
$noOfRows = mysqli_num_rows($resQuery);
$rowproductcode = mysqli_fetch_array($resQuery);
$sttr_preid = $rowproductcode['sttr_item_pre_id'];
$sttr_preid = str_replace("#", "", $sttr_preid);
if($noOfRows != 0){  
     echo $sttr_preid .'|YES';
}else{
 $query = "select sttr_item_pre_id from stock_transaction where sttr_stock_type = 'wholesale' and sttr_item_category = '$ItemCategory' "
        . "and sttr_item_name = '$ItemName' and sttr_metal_type = '$ItemMetalType' and sttr_item_pre_id = '$itemCode'";
$resQuery = mysqli_query($conn,$query);
$noOfRows = mysqli_num_rows($resQuery);
$rowproductcode = mysqli_fetch_array($resQuery);
$sttr_preid = $rowproductcode['sttr_item_pre_id'];
$sttr_preid = str_replace("#", "", $sttr_preid);
if($noOfRows != 0){  
    echo $sttr_preid.'|YES';
    
}else {
 $query = "select sttr_item_pre_id from stock_transaction where sttr_stock_type = 'wholesale' and sttr_metal_type = '$ItemMetalType' and sttr_item_pre_id = '$itemCode' and sttr_item_name != '$ItemName' and sttr_metal_type = '$ItemMetalType' and sttr_item_category != '$ItemCategory'";
$resQuery = mysqli_query($conn,$query);
$noOfRows = mysqli_num_rows($resQuery);
$rowproductcode = mysqli_fetch_array($resQuery);
$sttr_preid = $rowproductcode['sttr_item_pre_id'];
$sttr_preid = str_replace("#", "", $sttr_preid);
if($noOfRows != 0){  
    echo ' |NO';
}else{
$query = "select sttr_item_pre_id from stock_transaction where sttr_stock_type = 'wholesale' and sttr_metal_type = '$ItemMetalType'  and sttr_item_pre_id = '$itemCode'";
$resQuery = mysqli_query($conn,$query);
$noOfRows = mysqli_num_rows($resQuery);
$rowproductcode = mysqli_fetch_array($resQuery);
$sttr_preid = $rowproductcode['sttr_item_pre_id'];
$sttr_preid = str_replace("#", "", $sttr_preid);
if($noOfRows != 0){
    echo ' |NO';
    return;
}else{
    echo ' |YES';
    return;
}
}
}
}
//echo '$query-->'.$query.'<br>';
?>