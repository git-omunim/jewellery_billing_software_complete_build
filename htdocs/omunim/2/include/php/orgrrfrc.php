<?php

/*
 * **************************************************************************************
 * @tutorial: Release Girvi from release cart
 * **************************************************************************************
 * 
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgrrfrc.php
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
 */
?>
<?php

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

$girviOwnerId = $_SESSION['sessionOwnerId'];
$girviIdArray = trim($_POST['girviIdArray']);

if ($girviIdArray == '' or $girviIdArray == NULL) {
    header("Location: " . $documentRoot . "/omLoginPage.php");
} else {
    
    $query = "UPDATE girvi SET 
    girv_upd_sts='Released'
    WHERE girv_id IN ($girviIdArray)";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    header("Location: " . $documentRoot . "/include/php/orgrrelc.php");
}
?>