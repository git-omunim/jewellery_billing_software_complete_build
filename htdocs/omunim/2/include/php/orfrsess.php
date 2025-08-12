<?php

/*
 * **************************************************************************************
 * @tutorial: Select Firm In Header.
 * **************************************************************************************
 * 
 * Created on Mar 12, 2013 4:06:27 PM
 *
 * @FileName: omfrsess.php
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

// Start code to set firm session variable @AUTHOR: SANDY8JUL13
$selectedFirm = $_GET['firmid'];
$_SESSION['setFirmSession'] = $selectedFirm;
// End code to set firm session variable @AUTHOR: SANDY8JUL13

header("Location: $documentRoot/include/php/omhpmnpn.php");
?>
