<?php

/*
 * **********************************************************************************************
 * @tutorial: File to get records containing related firm records which you have to delete
 * **********************************************************************************************
 * 
 * Created on JUN 22, 2015 3:30:00 PM
 *
 * @FileName: ommpowup.php
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

$dbname = 'loveras1_101077';
$firmId = '3';

$conn = mysqli_connect($dbhost, 'root', 'omrolrsr') or die('Error connecting to mysql');
$db_selected = mysqli_select_db($dbname, $conn);

if (!$db_selected) {
    die("Can\'t use test_db : " . mysqli_error($conn));
}
?>
<?php
$tableNames='';
$resTableName = mysqli_query($conn,"show tables") or die(mysqli_error($conn));
/* * *********Start code to add OR command @Author:PRIYA24JUN14 *************** */
while ($tableName = mysqli_fetch_array($resTableName)) {
    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE 
        (column_name LIKE ('%firm_id')) AND 
        TABLE_SCHEMA='$dbname' AND 
        TABLE_NAME= '$tableName[0]'";
    $resQuery = mysqli_query($conn,$query) or die(mysqli_error($conn));

    $rowQuery = mysqli_fetch_array($resQuery);

    $colName = $rowQuery['COLUMN_NAME'];

    $query = "SELECT $colName FROM $tableName[0] WHERE $colName='$firmId'";
    $resSelQuery = mysqli_query($conn,$query);
    $numRowsQuery = mysqli_num_rows($resSelQuery);
    if ($numRowsQuery > 0){
        $tableNames=$tableName[0].','.$tableNames;
    }
//    if ($colName != '') {
//        mysqli_query($conn,"UPDATE $tableName[0] set $colName='$ownerId'") or die(mysqli_error($conn));
//    }
}
$tblNamesArr=explode(',',$tableNames);
/* * *********End code to add OR command @Author:PRIYA24JUN14 *************** */
?>