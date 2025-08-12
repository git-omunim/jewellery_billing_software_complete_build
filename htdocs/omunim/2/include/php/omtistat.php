<?php
/*
 * Created on Apr 6, 2011 12:03:19 AM
 *
 * @FileName: omtistat.php
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

// All Indian State
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Andhra Pradesh','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Arunachal Pradesh','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Assam','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Bihar','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Chhattisgarh','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Goa','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Gujarat','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Haryana','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Himachal Pradesh','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Jammu and Kashmir','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Jharkhand','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Karnataka','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Kerala','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Madhya Pradesh','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Maharashtra','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Manipur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Meghalaya','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Mizoram','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Nagaland','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'New Delhi','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Orissa','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Punjab','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Rajasthan','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Sikkim','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Tamil Nadu','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
/***********Start code to add value Telangana in State table @Author:ANUJA10JUL15**************/
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Telangana','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
/***********End code to add value Telangana in State table @Author:ANUJA10JUL15**************/
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Tripura','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Uttar Pradesh','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Uttarakhand','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'West Bengal','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";
$qInsertState  = "insert into state(state_own_id,state_name,state_upd_sts,state_comm) values ('$ownerId', 'Other','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertState)){die('Error: ' . mysqli_error($conn));}
//echo "\nState Inserted Successfully.";

?>