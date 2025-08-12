<?php

/*
 * **************************************************************************************
 * @tutorial: Update Girvi Firm Id
 * **************************************************************************************
 * 
 * Created on Apr 2, 2013 3:58:37 PM
 *
 * @FileName: orgufrnm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
?>
<?php
$custId = $_POST['custId'];
$girviId = $_POST['girviId'];
$girviFirmId = $_POST['girviFirmId'];
?>
<?php
if ($girviId == '' or $girviId == NULL or $girviFirmId == '' or $girviFirmId == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    exit(0);
} else {

    $qUpdateGirvi = "UPDATE girvi SET
		girv_firm_id='$girviFirmId'
                WHERE girv_id='$girviId' and girv_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn,$qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }

    header("Location: $documentRoot/include/php/olgugvdt.php?custId=$custId&girviId=$girviId");//change in filename @AUTHOR: SANDY20NOV13
}
?>