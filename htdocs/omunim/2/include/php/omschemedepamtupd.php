<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';

//
$query = "SELECT * from kitty where kitty_metal_type = 'GOLD' or kitty_metal_type = 'SILVER'";
//
$resquery = mysqli_query($conn, $query);
//
while ($rowresquery = mysqli_fetch_array($resquery, MYSQLI_ASSOC)) {
    //
    $kittyId = $rowresquery['kitty_id'];
    //getting only those row which is paid;
    $qSelKittyMetalDep = "SELECT kitty_wt_amt FROM kitty_money_deposit "
            . "where kitty_mondep_own_id='$sessionOwnerId' "
            . "and kitty_mondep_EMI_status='Paid' and kitty_mondep_kitty_id='$kittyId'";
    //
    $resKiityMetaldep = mysqli_query($conn, $qSelKittyMetalDep);
    //
    $kitty_wt_amt = 0;
    while ($rowKittyOp = mysqli_fetch_array($resKiityMetaldep, MYSQLI_ASSOC)) {
        $kitty_wt_amt += $rowKittyOp['kitty_wt_amt'];
    }
    //update kitty table
    $queryKittyMetalDeposite = "UPDATE kitty SET kitty_dep_metal_wt = '$kitty_wt_amt' WHERE kitty_id = '$kittyId'";
    //
    if (!mysqli_query($conn, $queryKittyMetalDeposite)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//
?>