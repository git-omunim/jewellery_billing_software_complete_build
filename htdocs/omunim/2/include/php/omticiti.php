<?php
/*
 * Created on Apr 5, 2011 11:41:33 PM
 *
 * @FileName: omticiti.php
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
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Other','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','New Delhi','Default','Created By oMunim')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Mumbai','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Chennai','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Bangalore','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Hyderabad','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Kolkata','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}


/*

$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Bisauli','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Budaun','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Bareilly','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Chandausi','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Moradabad','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}

// Cities Near by Bisauli
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Ahmed Ganj','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Adupura','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Asafpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Ajnawar','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Angthara','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Apgana / Parvejnagar','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Banjaria','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Basai','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Behta Pathak','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Bhanpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Bhatpura','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Chandpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Chani','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Dabtori','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Dharmpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Disauli Ganj','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Dhilwari','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Daulatpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Faizganj Behta','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Fatehpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Firozpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Gahora','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Gadgaon','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Guladiya','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Hatsa','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Harraipur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Husainpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Kaloopur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Karanpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Karkheri','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Khajuria','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Kot','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Kudhauli','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Kuwan Daire','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Madanjudi','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Maithra','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Manakpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Maujampur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Maukampur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Mithamai','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Mundia','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Nagpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Nasrol','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Bhikampur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Panaudi','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Parauli','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Pivari','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Pindara','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Raipur Kalan','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Ranet','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Ratanpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Sahanpur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Sarera','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Sarva','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Saidaula','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Siddh Baraulia','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Sichauli','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Siddhpur Kaithauli','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Svaroop Pur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Tarapur','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
$qInsertCity  = "insert into city(city_own_id,city_name,city_upd_sts,city_comm) values ('$ownerId','Wazirganj','owner','Created By owner')";
if (!mysqli_query($conn,$qInsertCity)){die('Error: ' . mysqli_error($conn));}
*/
?>