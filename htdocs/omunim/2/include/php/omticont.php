<?php
/*
 * Created on Apr 6, 2011 12:03:19 AM
 *
 * @FileName: omvcinsc.php
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

if($ownerId == ''){
    $ownerId = '1';
}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Other','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','India','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','United State','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','China','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Sri Lanka','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Pakistan','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Nepal','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Bangladesh','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Bhutan','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}
$qInsertCountry  = "insert into country(country_own_id,country_name,country_upd_sts,country_comm) values ('$ownerId','Australia','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCountry)){die('Error: ' . mysqli_error($conn));}

?>