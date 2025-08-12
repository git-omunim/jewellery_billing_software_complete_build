<?php

/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormltrdl.php
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

//CHANGE IN FILE @AUTHOR: SANDY04JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php

$transId = trim($_POST['transid']);
$loanId = trim($_POST['loanId']);
$mlId = trim($_POST['mlId']);
$prinOrMainPrinId = trim($_POST['prinOrMainPrinId']);
$prinType = trim($_POST['prinType']);

//delete entry from girvi transfer table
$query = "DELETE FROM girvi_transfer WHERE gtrans_id='$transId' and gtrans_own_id='$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
//Update status in girvi table @AUTHOR: SANDY04JAN14
if ($prinType == 'PRN') {
    $upQuery = "UPDATE girvi SET girv_transfer_id=NULL,girv_trans_firm_id=NULL,girv_transfer_ml_id=NULL WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_id='$prinOrMainPrinId'";
    if (!mysqli_query($conn,$upQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $upQuery = "UPDATE girvi_principal SET girv_prin_transfer_id=NULL,girv_prin_trans_ml_id =NULL WHERE girv_prin_own_id ='$_SESSION[sessionOwnerId]' and girv_prin_id ='$prinOrMainPrinId'";
    if (!mysqli_query($conn,$upQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//Update status in girvi table @AUTHOR: SANDY04JAN14
header("Location: " . $documentRoot . "/include/php/ormlupln.php?loanId=$loanId&mlId=$mlId");
?>
