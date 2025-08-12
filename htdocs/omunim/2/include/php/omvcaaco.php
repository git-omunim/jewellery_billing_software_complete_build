<?php

/*
 * Created on May 25, 2011 11:14:43 AM
 *
 * @FileName: omvcaaco.php
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

$countryOwnerId = $_SESSION['sessionOwnerId'];
$countryName = om_ucfirst(trim($_POST['countryName'])); //om_ucfirst Function Added @AUTHOR:PRIYA11JUNE13 
$countryCurrency = trim($_POST['countryCurrency']);
$countryComments = trim($_POST['countryComments']);

// Start To protect MySQL injection
$countryName = stripslashes($countryName);
$countryCurrency = stripslashes($countryCurrency);
$countryComments = stripslashes($countryComments);

$countryName = mysqli_real_escape_string($conn,$countryName);
$countryCurrency = mysqli_real_escape_string($conn,$countryCurrency);
$countryComments = mysqli_real_escape_string($conn,$countryComments);
// End To protect MySQL injection

$qSelCountry = "SELECT country_name FROM country where country_name='$countryName' and country_own_id='$countryOwnerId'";
$resCountry = mysqli_query($conn,$qSelCountry);

if ($rowCountry = mysqli_fetch_array($resCountry, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountryAlreadyExist');
} else {
    $query = "INSERT INTO country (
		country_own_id, country_name,country_currency,
		country_comm, country_upd_sts, 
		country_ent_dat) 
		VALUES (
		'$countryOwnerId','$countryName','$countryCurrency',
		'$countryComments','User',
		$currentDateTime)";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'NEW COUNTRY ADDED';
    $sslg_trans_comment = $countryName . ' NEW COUNTRY ADDED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountryAdded');
}
require_once 'omssclin.php';
?>