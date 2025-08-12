<?php /**
 * 
 * Created on Aug 27, 2011 10:56:07 AM
 *
 * @FileName: omvcstdc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
 */ ?>
<?php

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

$countryOwnerId = $_SESSION['sessionOwnerId'];
$countryName = trim($_POST['countryName']);

// Start To protect MySQL injection
$countryName = stripslashes($countryName);

$countryName = mysqli_real_escape_string($conn,$countryName);
// End To protect MySQL injection

$qSelCountry = "SELECT country_id FROM country where country_selected='selected' and country_own_id='$countryOwnerId'";
$resCountry = mysqli_query($conn,$qSelCountry);

if ($rowCountry = mysqli_fetch_array($resCountry, MYSQLI_ASSOC)) {

    $countryId = $rowCountry['country_id'];

    $query = "UPDATE country SET
		country_selected=''
		WHERE country_own_id = '$countryOwnerId' and country_id = '$countryId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}

$query = "UPDATE country SET
		country_selected='selected'
		WHERE country_own_id = '$countryOwnerId' and country_name = '$countryName'";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}

header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountrySet');
?>