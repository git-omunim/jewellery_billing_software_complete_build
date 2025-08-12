<?php
/*
 * **************************************************************************************
 * @tutorial: File to search and add new supplier division @MADHUREE-31AUG2019
 * **************************************************************************************
 *
 * Created on 31 AUG, 2019 11:34:08 AM
 *
 * @FileName: omsuppdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
require_once 'system/omssopin.php';
?>
<?php
//Start to get access values for subfields in form @AUTHOR: MADHUREE-31AUG2019
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//End to get access values for subfields in form @AUTHOR: MADHUREE-31AUG2019
/*****************Start code to add gender code @Author:MADHUREE-31AUG19************************/
if ($staffId && $array['addSupplierAccess'] != 'true') { //check whether staff has access or not @AUTHOR: MADHUREE-31AUG2019
    include 'omsuppsr.php';
} else {
    include 'omsuppsr.php';
}
?>
