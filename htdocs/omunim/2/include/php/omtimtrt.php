<?php
/*
 * Created on Apr 14, 2011 9:37:06 PM
 *
 * @FileName: omtimtrt.php
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
if ($systemOnOrOff == 'ON') {
    $mcxURL = 'https://mapi.omunim.in/rates/mcx';
} else {
    $mcxURL = $_SERVER['HTTP_HOST'] . "/api/rates/mcx";
}

// $qInsertMetalRate  = "insert into metal_rates(met_rate_own_id,met_rate_metal_id,met_rate_metal_name,met_rate_value,met_rate_upd_sts,met_rate_comm,met_rate_per_wt,met_rate_per_wt_tp) values ('$ownerId','GOLD','Gold','31000','Default','Created By oMunim','10','GM')";
// if (!mysqli_query($conn,$qInsertMetalRate)){die('Error: ' . mysqli_error($conn));}
// //echo "\nMetal Rate Inserted Successfully.";
// $qInsertMetalRate  = "insert into metal_rates(met_rate_own_id,met_rate_metal_id,met_rate_metal_name,met_rate_value,met_rate_upd_sts,met_rate_comm,met_rate_per_wt,met_rate_per_wt_tp) values ('$ownerId','SILVER','Silver','41000','Default','Created By oMunim','1','KG')";
// if (!mysqli_query($conn,$qInsertMetalRate)){die('Error: ' . mysqli_error($conn));}
// //echo "\nMetal Rate Inserted Successfully.";
// $qInsertMetalRate  = "insert into metal_rates(met_rate_own_id,met_rate_metal_id,met_rate_metal_name,met_rate_value,met_rate_upd_sts,met_rate_comm,met_rate_per_wt,met_rate_per_wt_tp) values ('$ownerId','GOLD','Gold','30000','Default','Created By oMunim','10','GM')";
// if (!mysqli_query($conn,$qInsertMetalRate)){die('Error: ' . mysqli_error($conn));}
// //echo "\nMetal Rate Inserted Successfully.";
// $qInsertMetalRate  = "insert into metal_rates(met_rate_own_id,met_rate_metal_id,met_rate_metal_name,met_rate_value,met_rate_upd_sts,met_rate_comm,met_rate_per_wt,met_rate_per_wt_tp) values ('$ownerId','SILVER','Silver','40000','Default','Created By oMunim','1','KG')";
// if (!mysqli_query($conn,$qInsertMetalRate)){die('Error: ' . mysqli_error($conn));}
//echo "\nMetal Rate Inserted Successfully.";
//include '../php/emCloseDatabase.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $mcxURL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "23492384982390480");
    $result_stock = curl_exec($ch);
    //
    //echo '$mcxURL : ' . $mcxURL . '<br>';
    //echo '$result_stock : ' . $result_stock . '<br>';
    //
    $result_MCX_arr = json_decode($result_stock, true);
    curl_close($ch);
    //
    //
    $goldMCXrate = $result_MCX_arr['gold']['price'];
    $silverMCXrate = $result_MCX_arr['silver']['price'];
    $currentDateTime = $GLOBALS['currentDateTime'];
    //
$qInsertMetalRate  = "insert into metal_rates(met_rate_own_id,met_rate_metal_id,met_rate_metal_name,met_rate_value,met_rate_upd_sts,met_rate_comm,met_rate_per_wt,met_rate_per_wt_tp,met_rate_ent_dat) values ('$ownerId','GOLD','Gold','$goldMCXrate','Default','Created By oMunim','10','GM','$currentDateTime')";
if (!mysqli_query($conn,$qInsertMetalRate)){die('Error: ' . mysqli_error($conn));}
//echo "\nMetal Rate Inserted Successfully.";
$qInsertMetalRate  = "insert into metal_rates(met_rate_own_id,met_rate_metal_id,met_rate_metal_name,met_rate_value,met_rate_upd_sts,met_rate_comm,met_rate_per_wt,met_rate_per_wt_tp,met_rate_ent_dat) values ('$ownerId','SILVER','Silver','$silverMCXrate','Default','Created By oMunim','1','KG','$currentDateTime')";
if (!mysqli_query($conn,$qInsertMetalRate)){die('Error: ' . mysqli_error($conn));}
?>