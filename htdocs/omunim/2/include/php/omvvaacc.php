<?php

/*
 * Created on May 23, 2011 9:16:27 PM
 *
 * @FileName: omvvaacc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
?>
<?php
//print_r($_REQUEST);
require_once 'system/omssopin.php';
$cityOwnerId = $_SESSION['sessionOwnerId'];
$cityVillageValue = $_REQUEST['cityVillage'];
$cityName = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['cityName'])));
//START CODE ADDED TO GET PINCODE, ECOM DELIVERY STATUS, DELIVERY TIME AND ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020
$pinCode = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['pinCode'])));
$ecomDelivery = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['ecomDelivery'])));
$deliveryTime = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['deliveryTime'])));
$orderDeliveryTime = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['orderDeliveryTime'])));
//END CODE ADDED TO GET PINCODE, ECOM DELIVERY STATUS, DELIVERY TIME AND ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020
$cityComments = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['cityComments'])));
// End To protect MySQL injection

$qSelCity = "SELECT city_name FROM city where city_name='$cityName' and city_own_id='$cityOwnerId'";
$resCity = mysqli_query($conn,$qSelCity);

if ($rowCity = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityAlreadyExist');
} else if($cityVillageValue == '' || $cityVillageValue == 'City') {
    $query = "INSERT INTO city (
		city_own_id, city_name,
		city_comm, city_upd_sts, city_pincode, city_ecom_delivery, city_delivery_time, city_order_delivery_time, 
		city_ent_dat) 
		VALUES (
		'$cityOwnerId','$cityName',
		'$cityComments','User','$pinCode','$ecomDelivery','$deliveryTime','$orderDeliveryTime',
		$currentDateTime)";  //CODE ADDED TO ADD PINCODE, ECOM DELIVERY, DELIVERY TIME, ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    } 
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'NEW CITY ADDED';
    $sslg_trans_comment = $cityName . ' NEW CITY ADDED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityAdded');
}
if($cityVillageValue == 'Village'){
    $query = "INSERT INTO city (
		city_own_id, village_name,
		city_comm, city_upd_sts, city_pincode, city_ecom_delivery, city_delivery_time, city_order_delivery_time,
		village_ent_dat) 
		VALUES (
		'$cityOwnerId','$cityName',
		'$cityComments','User','$pinCode','$ecomDelivery','$deliveryTime','$orderDeliveryTime',
		$currentDateTime)";  //CODE ADDED TO ADD PINCODE, ECOM DELIVERY, DELIVERY TIME, ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityAdded');
}

$selectedq = "select city_id from city where city_selected='selected' and city_own_id='$cityOwnerId'";
$resSelctQuery = mysqli_query($conn, $selectedq);

if($rowDefalutCity = mysqli_fetch_array($resSelctQuery, MYSQLI_ASSOC)){
    $city_id = $rowDefalutCity['city_id'];
    
    $updateCitySelected = "UPDATE city SET city_selected='' WHERE city_own_id='$cityOwnerId' and city_id='$city_id'";
     if (!mysqli_query($conn,$updateCitySelected)) {
        die('Error: ' . mysqli_error($conn));
    }
}
$updateCitySelected1 = "UPDATE city SET city_selected='selected' WHERE city_own_id='$cityOwnerId' and city_name='$cityName'";
if (!mysqli_query($conn,$updateCitySelected1)) {
    die('Error: ' . mysqli_error($conn));
}
header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityUpdated');
require_once 'omssclin.php';
?>