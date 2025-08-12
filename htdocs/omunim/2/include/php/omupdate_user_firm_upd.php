<?php

/*
 * **************************************************************************************
 * @tutorial: Update user_firm_id in user table if blank or null @AUTHOR: RANJEET KAMBLE
 * **************************************************************************************
 * 
 * Created on 22 Oct 2024
 *
 * @FileName: omupdate_user_firm_upd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */

include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';

// Get first firm_id
parse_str(getTableValues("select firm_id FROM firm limit 1"));

// Prepare query to update user_firm_id
$sql = "UPDATE user SET user_firm_id = $firm_id WHERE user_type='CUSTOMER' and user_priority='Online' and user_status IN ('Active', 'PendingOTP') and user_firm_id IS NULL OR user_firm_id = ''";
 if (!mysqli_query($conn, $sql)) {
        die('Error (Line No - ' . LINE . '): ' . mysqli_error($conn));
    }
 else{
     echo "success.";
 }

    
?>