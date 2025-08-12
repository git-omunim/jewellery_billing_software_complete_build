<?php /**
 * 
 * Created on Jul 10, 2011 7:50:03 PM
 *
 * @FileName: orgggtda.php
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
 */ ?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';
?>
<?php

$mlId = $_POST['mlId'];
$loanId = $_POST['loanId'];
$depJrnlId = $_POST['depositjrnlId'];
$depId = $_POST['depositMoneyId'];

//delete this transaction from ml_transaction 
$delQuery = "DELETE FROM ml_transaction WHERE ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_id='$depId'";
if (!mysqli_query($conn,$delQuery)) {
    die('Error: ' . mysqli_error($conn));
}
//delete comments from ml_comment
$delQuery = "DELETE FROM ml_comments WHERE ml_comm_own_id='$_SESSION[sessionOwnerId]' and ml_comm_ml_dep_id='$depId'";
if (!mysqli_query($conn,$delQuery)) {
    die('Error: ' . mysqli_error($conn));
}
//delete entry from journal table
$delQuery = "DELETE FROM journal WHERE jrnl_own_id= '$_SESSION[sessionOwnerId]' and jrnl_id='$depJrnlId'";
if (!mysqli_query($conn,$delQuery)) {
    die('Error: ' . mysqli_error($conn));
}
//delete entry from jr_tr table
$delQuery = "DELETE FROM journal_trans WHERE jrtr_own_id='$_SESSION[sessionOwnerId]' and jrtr_jrnl_id='$depJrnlId'";
if (!mysqli_query($conn,$delQuery)) {
    die('Error: ' . mysqli_error($conn));
}

header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId");
?>
