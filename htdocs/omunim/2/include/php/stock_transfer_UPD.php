<?php
include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';

$query1= " update stock_transfer set sttrans_status = 'transfered' where sttrans_status = 'readyToTransfer' " ;

if (!mysqli_query($conn,$query1)) {
    die('Error1: ' . mysqli_error($conn));
}

?>