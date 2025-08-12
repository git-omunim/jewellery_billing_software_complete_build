<?php
/*
 * **************************************************************************************
 * @tutorial: Update Number Of Rows
 * **************************************************************************************
 * 
 * Created on Jul 15, 2013 2:12:34 PM
 *
 * @FileName: orggnorw.php
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
require_once 'system/omssopin.php';
?>
<div id="girvNoOfRows">
    <?php
    $rowsPerPage = $_GET['rowsPerPage'];
    $query = "UPDATE omlayout SET
		omly_girv_nrows='$rowsPerPage'
                WHERE omly_own_id = '$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
    ?>
</div>