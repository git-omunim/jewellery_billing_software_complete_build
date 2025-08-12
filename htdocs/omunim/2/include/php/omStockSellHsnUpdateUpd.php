<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';

/*

Reasons : HSN No Not Updated

*/
$query1="UPDATE stock_transaction SET sttr_hsn_no = 7113 WHERE sttr_transaction_type IN ('sell') and sttr_indicator IN('stock','imitation') ;";
$query2="UPDATE stock_transaction SET sttr_hsn_no = 7108 WHERE sttr_transaction_type IN ('sell') where sttr_indicator IN('rawMetal') and sttr_metal_type='Gold';";
$query3="UPDATE stock_transaction SET sttr_hsn_no = 7104 WHERE sttr_transaction_type IN ('sell') where sttr_indicator IN('crystal');";
$query4="UPDATE stock_transaction SET sttr_hsn_no = 7106 WHERE sttr_transaction_type IN ('sell') where sttr_indicator IN('rawMetal') and sttr_metal_type='Silver';";
mysqli_query($conn, $query1);
mysqli_query($conn, $query2);
mysqli_query($conn, $query3);
mysqli_query($conn, $query4);
?>