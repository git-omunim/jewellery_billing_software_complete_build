<?php
/*
 * **************************************************************************************
 * @tutorial: UNITS TABLE FILE
 * **************************************************************************************
 * 
 * Created on 29 Apr, 2018 5:02:56 PM
 *
 * @FileName: omtbunits.php
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
//
if ($ownerId == '') {
    $ownerId = $dgGUId;
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessionOwnerId'];
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessiondgGUId'];
}
//
$query = "CREATE TABLE IF NOT EXISTS units (
unit_id          INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
unit_own_id	 VARCHAR(16),
unit_category    VARCHAR(50),
unit_name	 VARCHAR(32),
unit_type	 VARCHAR(10),
unit_panel	 VARCHAR(10),
unit_info        VARCHAR(100),
unit_since 	 DATETIME,
unit_last_column VARCHAR(16))AUTO_INCREMENT=1";
//
if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
}
//
// To check new columns added into table or not 
include 'ommptbauprdwrfl.php';
//
//
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','gram','GM','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'GM' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','kilo gram','KG','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'KG' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','milli gram','MG','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'MG' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','carat ','CT','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'CT' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','ratti','RT','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'RT' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','per piece','PP','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'PP' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','percent','%','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = '%' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
$query = "INSERT INTO units (unit_own_id,unit_category,unit_name,unit_type,unit_panel,unit_info,unit_since)
          SELECT * FROM (SELECT '$ownerId','jewellery','fixed','FX','WT','',$currentDateTime) AS tmp
          WHERE NOT EXISTS (SELECT unit_type FROM units WHERE unit_type = 'FX' AND unit_category = 'jewellery') LIMIT 1";
//
if (!mysqli_query($conn, $query))
    die('Query:' . $query . '<br/>Error: ' . mysqli_error($conn));
//
//
//
//
?>