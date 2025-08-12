<?php

/*
 * Created on Apr 6, 2011 12:18:34 AM
 *
 * @FileName: omtiitnm.php
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
if ($ownStateName == 'Uttar Pradesh') {

    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','EarRing','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ring','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','EarRing Long','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','EarRing Short','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Chain','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Necklace','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Necklace Long','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Jhumar','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Teeka','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Kanthi','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bengals','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bengals 2','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bengals 4','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Kangan','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Belt','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Nose Ring','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ear Studs','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bracelet','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Armlet','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Hansli','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Khadue','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }

// Add Silver Items

    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Earring','Silver','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ring','Silver','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Jhale','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Jhumki','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Chain','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Chain & Pandel','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Necklace','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Haar','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Jhumar','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Teeka','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bengals','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bengals 2','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bengals 4','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Kangan','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Belt','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ear Studs','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Bracelet','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Pariband','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Payal','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Pouchi','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Hansli','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Khadue','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Kaundini','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Half Peti','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Toe ring','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Key Chain','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Juda Pin','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Armlet','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    } // **************************************** Tamil Nadu Item Names ****************************************
} else if ($ownStateName == 'Tamil Nadu') {
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','HARAM','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','HARAM SRON','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','NACKLECE','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','NACKLES STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BANGALES','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BANGALES STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TOPAS','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TOPAS STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TOPAS JIMAKI','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TOPAS JIMAKI STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BHARASLET','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BHARASLET STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','THONGAL','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','THONGAL STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KAMAL STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TALI','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TALI STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','DALLAR','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','DALLAR STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KALKAS','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','COIN','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TAYAT','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TAYAT STON','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','WASHAR','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','WASHAR STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MATHAL','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MATHAL STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','RING','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','RING STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','RING ENAMUDI','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BLACK MANI CHAIN','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MUTHU MALA','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','NANGOLA','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','NANGOLA WITH COPPAR','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','GUNDU','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','GUNDU COPPAR ARAK','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','SORAT COPPAR ARAK','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','SORAT COPPAR ARAK STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','EAR RING','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','EAR RING STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MUGATHI','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MUGATHI STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','D KAMAL','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','D KAMAL STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MOP','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MOP STON','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','CHAIN','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PAVALAM MALA','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PANJABI KAPU','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BANGALI KAPU','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','GULAS','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','ANNACOVER','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TALI KODI','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','AARATICALS','Gold','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }

// Add Silver Items

    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','J GULAS','Silver','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','MUTHU GULAS','Silver','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','F GULAS','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','GULAS STON','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TANDA','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','F PLATE','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','O PLATE','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','R PLATE','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','GLAS','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KAMACHI VALAK','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KUTHU VALAK','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','JODHI VALAK','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','DEEPAM','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KARAPURAM STAND','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KINAM','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','CHANDAN KINAM','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KUNKAM BOX','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BELL','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PALADA','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PANJAPATARM','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PANIR CHAMBU','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','CHAMBU','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','SALAI','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PULLIYAR MANE','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','METHI','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','F METHI','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TAYAR','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','BHARASLET','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','CHAIN','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','DALLAR','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','PANJABI KAPU','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','UDAVATHI STAND','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TAVALA','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TAT','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','NAM KUCHI','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','ANNACOVER','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KEY CHAIN','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','RING','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','KOKI','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','EAR RING','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','TALI KODI','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','AAYAPA MALA','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','AARATICALS','Silver','User','Created By User','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
   $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ear Ring','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ring','Gold','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    } 
    
    
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ear Ring','Silver','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    }
    $qInsertItemName = "insert into item_name(itm_nm_own_id,itm_nm_name,itm_nm_metal,itm_nm_upd_sts,itm_nm_comm,itm_nm_ent_dat) values ('$ownerId','Ring','Silver','Default','Created By oMunim','$currentDateTime')";
    if (!mysqli_query($conn,$qInsertItemName)) {
        die('Error: ' . mysqli_error($conn));
    } 
}
?>