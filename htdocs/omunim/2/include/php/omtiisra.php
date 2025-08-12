<?php

/*
 * Created on 01-Feb-2011 10:56:17 PM
 *
 * @FileName: omtiisra.php
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
$currentDateTime = date("Y-m-d");
if($ownerId == ''){
    $ownerId = $dgGUId;
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessiondgGUId'];
}
include 'omticiti.php';
include 'omvcinsc.php';
include 'omtiitnm.php';
include 'omtiittn.php';
include 'omtimtrt.php';
include 'omtiiroi.php';
include 'omvsinss.php';
include 'omtitroi.php';             // Modified By @Author: KHUSH23JAN13

?>