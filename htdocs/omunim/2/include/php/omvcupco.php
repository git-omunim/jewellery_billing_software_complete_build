<?php

/*
 * Created on May 25, 2011 11:59:20 PM
 *
 * @FileName: omvcupco.php
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
$countryId = trim($_POST['countryId']);
$countryName = trim($_POST['countryName']);
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

$qSelCountry = "SELECT country_name FROM country where country_name='$countryName' and country_own_id='$countryOwnerId' and country_id!='$countryId'";
$resCountry = mysqli_query($conn,$qSelCountry);

if ($rowCountry = mysqli_fetch_array($resCountry, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountryAlreadyExist');
} else {

    $query = "UPDATE country SET
		country_name='$countryName',country_currency='$countryCurrency',
		country_comm='$countryComments'
		WHERE country_own_id = '$countryOwnerId' and country_id = '$countryId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'COUNTRY UPDATED';
    $sslg_trans_comment = $countryName . ' COUNTRY UPDATED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountryUpdated');
}
require_once 'omssclin.php';
?>