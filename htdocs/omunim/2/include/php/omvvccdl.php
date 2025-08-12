<?php

/*
 * Created on May 25, 2011 10:12:09 AM
 *
 * @FileName: omvvccdl.php
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

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';

$cityOwnerId = $_SESSION['sessionOwnerId'];
$cityId = trim($_POST['cityId']);

$qSelCity = "SELECT city_name FROM city where city_id = '$cityId' and city_own_id='$cityOwnerId' and city_upd_sts='Default'";
$resCity = mysqli_query($conn,$qSelCity);

if ($rowCity = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityNotDeleted');
} else {
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    parse_str(getTableValues("SELECT city_name FROM city where city_own_id = '$cityOwnerId' and city_id = '$cityId'"));
    $sslg_trans_sub = 'CITY DELETED';
    $sslg_trans_comment = $city_name . ' CITY DELETED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    $query = "DELETE FROM city WHERE city_own_id = '$cityOwnerId' and city_id = '$cityId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    header('Location: ' . $documentRoot . '/include/php/omvvaacd.php?divMainMiddlePanel=CityDeleted');
}
require_once 'omssclin.php';
?>