<?php

/*
 * **************************************************************
 * @tutorial: ECOM MCX RATE SETUP FILE @AUTHOR:MADHUREE-10SEP2022
 * **************************************************************
 * 
 *  Created on 10 SEPTEMBER 2022 12:03:12 PM
 *
 * @FileName: omSetEcomMCXRate.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omecom_mvc
 * @version 1.0.0
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
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
define("GB_OWNER_ID", "101287");
define("GB_DB_LOGIN_ID", "omunimdemo");
define("GB_DB_SERVER", 'localhost');
define("GB_DB_USER_NAME", 'root');
define("GB_DB_PASSWORD", 'omrolrsr');
define("GB_DB_NAME", 'loveras1_101287');
define("GB_DB_PORT", '7188');
//
$conn = new mysqli(GB_DB_SERVER, GB_DB_USER_NAME, GB_DB_PASSWORD, GB_DB_NAME, GB_DB_PORT);
if ($conn->connect_error) {
    die("Error in connecting with mysql : " . $conn->connect_error);
}
//
$mcxURL = 'https://xzyapi.omunim.in/rates/mcx';
//
$metalRateOwnerId = GB_OWNER_ID;
//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $mcxURL);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "23492384982390480");
$result_stock = curl_exec($ch);
$result_MCX_arr = json_decode($result_stock, true);
curl_close($ch);
//
$goldMCXrate = $result_MCX_arr['gold']['price'];
$silverMCXrate = $result_MCX_arr['silver']['price'];
//
$selLastGoldMCXrate = "SELECT met_rate_value FROM metal_rates WHERE met_rate_metal_name = 'Gold' AND met_rate_metal_id = 'Gold 24K' AND met_rate_upd_sts='ECOM' ORDER BY met_rate_id DESC LIMIT 0,1";
$resLastGoldMCXrate = mysqli_query($conn, $selLastGoldMCXrate);
$rowLastGoldMCXrate = mysqli_fetch_array($resLastGoldMCXrate);
$lastGoldMCXrate = $rowLastGoldMCXrate['met_rate_value'];
//
$selLastSilverMCXrate = "SELECT met_rate_value FROM metal_rates WHERE met_rate_metal_name = 'Silver' AND met_rate_metal_id = 'Silver 1KG' AND met_rate_upd_sts='ECOM' ORDER BY met_rate_id DESC LIMIT 0,1";
$resLastSilverMCXrate = mysqli_query($conn, $selLastSilverMCXrate);
$rowLastSilverMCXrate = mysqli_fetch_array($resLastSilverMCXrate);
$lastSilverMCXrate = $rowLastSilverMCXrate['met_rate_value'];
//
$selAdditionalRateAndRateDiff = "SELECT ecom_info,ecom_value FROM omecom WHERE ecom_option = 'mcxRateSetting'";
$resAdditionalRateAndRateDiff = mysqli_query($conn, $selAdditionalRateAndRateDiff);
$rowAdditionalRateAndRateDiff = mysqli_fetch_array($resAdditionalRateAndRateDiff);
$additionalRate = $rowAdditionalRateAndRateDiff['ecom_value'];
$rateDifference = $rowAdditionalRateAndRateDiff['ecom_info'];
//
if ($goldMCXrate != '' && $lastGoldMCXrate != '') {
    //
    $goldMCXrate = ($goldMCXrate + $additionalRate);
    //
    if (abs($goldMCXrate - $lastGoldMCXrate) >= $rateDifference) {
        //
        $query = "INSERT INTO metal_rates (
		met_rate_own_id,met_rate_value,met_rate_metal_name,met_rate_comm, met_rate_upd_sts,met_rate_ent_dat,met_rate_metal_id,met_rate_cust_percentage,met_rate_per_wt,met_rate_per_wt_tp,
                met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax,met_rate_tax_amt,met_rate_mkg_chrgs,met_rate_mkg_chrgs_type,met_rate_purity,met_rate_color,met_rate_since
                ) VALUES (
                '$metalRateOwnerId','$goldMCXrate','Gold','','ECOM',now(),'Gold 24K','','10','GM',
                '','','','','','','','', now())";
        // 
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
    }
    //
} else if ($goldMCXrate != '' && $lastGoldMCXrate == '') {
    //
    $query = "INSERT INTO metal_rates (
		met_rate_own_id,met_rate_value,met_rate_metal_name,met_rate_comm, met_rate_upd_sts,met_rate_ent_dat,met_rate_metal_id,met_rate_cust_percentage,met_rate_per_wt,met_rate_per_wt_tp,
                met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax,met_rate_tax_amt,met_rate_mkg_chrgs,met_rate_mkg_chrgs_type,met_rate_purity,met_rate_color,met_rate_since
                ) VALUES (
                '$metalRateOwnerId','$goldMCXrate','Gold','','ECOM',now(),'Gold 24K','','10','GM',
                '','','','','','','','', now())";
    // 
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
}
//
if ($silverMCXrate != '' && $lastSilverMCXrate != '') {
    //
    $silverMCXrate = ($silverMCXrate + $additionalRate);
    //
    if (abs($silverMCXrate - $lastSilverMCXrate) >= $rateDifference) {
        //
        $query = "INSERT INTO metal_rates (
		met_rate_own_id,met_rate_value,met_rate_metal_name,met_rate_comm, met_rate_upd_sts,met_rate_ent_dat,met_rate_metal_id,met_rate_cust_percentage,met_rate_per_wt,met_rate_per_wt_tp,
                met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax,met_rate_tax_amt,met_rate_mkg_chrgs,met_rate_mkg_chrgs_type,met_rate_purity,met_rate_color,met_rate_since
                ) VALUES (
                '$metalRateOwnerId','$silverMCXrate','Silver','','ECOM',now(),'Silver 1KG','','1','KG',
                '','','','','','','','', now())";
        // 
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
    }
    //
} else if ($silverMCXrate != '' && $lastSilverMCXrate == '') {
    //
    $query = "INSERT INTO metal_rates (
		met_rate_own_id,met_rate_value,met_rate_metal_name,met_rate_comm, met_rate_upd_sts,met_rate_ent_dat,met_rate_metal_id,met_rate_cust_percentage,met_rate_per_wt,met_rate_per_wt_tp,
                met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax,met_rate_tax_amt,met_rate_mkg_chrgs,met_rate_mkg_chrgs_type,met_rate_purity,met_rate_color,met_rate_since
                ) VALUES (
                '$metalRateOwnerId','$silverMCXrate','Silver','','ECOM',now(),'Silver 1KG','','1','KG',
                '','','','','','','','', now())";
    // 
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
}
//
?>