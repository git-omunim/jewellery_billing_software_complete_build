<?php

/*
 * Created on May 24, 2011 12:35:45 PM
 *
 * @FileName: omvvupcc.php
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

require_once 'system/omssopin.php';

$cityOwnerId = $_SESSION['sessionOwnerId'];
$cityId = trim($_POST['cityId']);
$cityName = trim($_POST['cityName']);
$pinCode = trim($_POST['pinCode']);
$ecomDelivery = trim($_POST['ecomDelivery']);
$deliveryTime = trim($_POST['deliveryTime']);
$orderDeliveryTime = trim($_POST['orderDeliveryTime']);
$cityComments = trim($_POST['cityComments']);

// Start To protect MySQL injection
$cityName = stripslashes($cityName);
$cityComments = stripslashes($cityComments);

$cityName = mysqli_real_escape_string($conn,$cityName);
$cityComments = mysqli_real_escape_string($conn,$cityComments);
// End To protect MySQL injection

$qSelCity = "SELECT city_name FROM city where city_name='$cityName' and city_own_id='$cityOwnerId' and city_id!='$cityId'";
$resCity = mysqli_query($conn,$qSelCity);

if ($rowCity = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityAlreadyExist');
} else {

    $query = "UPDATE city SET
		city_name='$cityName',
                city_pincode='$pinCode',
                city_ecom_delivery='$ecomDelivery',
                city_delivery_time='$deliveryTime',
                city_order_delivery_time='$orderDeliveryTime',
		city_comm='$cityComments'
		WHERE city_own_id = '$cityOwnerId' and city_id = '$cityId'";//CODE ADDED TO UPDATE PINCODE, ECOM DELIVERY STATUS, DELIVERY TIME AND ORDER DELIVERY TIME,@AUTHOR:HEMA-10AUG2020

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'CITY UPDATED';
    $sslg_trans_comment = $cityName . ' CITY UPDATED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityUpdated');
}
require_once 'omssclin.php';
?>