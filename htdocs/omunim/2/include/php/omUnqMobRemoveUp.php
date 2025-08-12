<?php

/*
 * **************************************************************************************
 * @tutorial: File to remove mobile no unique key @SANSKRUTI
 * **************************************************************************************
 * 
 * Created on 21 July, 2023
 *
 * @FileName: omUnqMobRemoveUp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION[sessionOwnerId];
?>
<?php

    $query = "ALTER TABLE user
          DROP INDEX user_mobile";
    $resQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
 ?>
