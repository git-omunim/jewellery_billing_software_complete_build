<?php

/*
 * Created on May 25, 2011 11:59:32 PM
 *
 * @FileName: omvccodl.php
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

include_once 'ommpfndv.php';
require_once 'system/omssopin.php';

$countryOwnerId = $_SESSION['sessionOwnerId'];
$countryId = trim($_POST['countryId']);

$qSelCountry = "SELECT country_name FROM country where country_id = '$countryId' and country_own_id='$countryOwnerId' and country_upd_sts='Default'";
$resCountry = mysqli_query($conn,$qSelCountry);

if ($rowCountry = mysqli_fetch_array($resCountry, MYSQLI_ASSOC)) {
    header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountryNotDeleted');
} else {
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    parse_str(getTableValues("SELECT country_name FROM country where country_own_id = '$countryOwnerId' and country_id = '$countryId'"));
    $sslg_trans_sub = 'COUNTRY DELETED';
    $sslg_trans_comment = $country_name . ' COUNTRY DELETED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    $query = "DELETE FROM country WHERE country_own_id = '$countryOwnerId' and country_id = '$countryId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    header('Location: ' . $documentRoot . '/include/php/omvcaacd.php?divMainMiddlePanel=CountryDeleted');
}
require_once 'omssclin.php';
?>