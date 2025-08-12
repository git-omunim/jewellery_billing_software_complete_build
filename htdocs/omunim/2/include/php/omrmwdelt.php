<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 9 Oct, 2018 6:12:32 PM
 *
 * @FileName: omrmwdelt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
$sttrId = $_REQUEST['sttr_id'];
//echo '$sttrId=='.$sttrId;
stock('delete', array(), $sttrId, '');

?>