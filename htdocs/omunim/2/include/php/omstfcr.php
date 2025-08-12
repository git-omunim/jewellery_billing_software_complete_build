<?php

/*
 * **************************************************************************************
 * @tutorial: Sample File to create firm id ----- For customer(ayush jain)'s staff issue
 * **************************************************************************************
 * 
 * Created on JUN 22, 2015 3:30:00 PM
 *
 * @FileName: omstfcr.php
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
?>
<?php

$query = "INSERT INTO firm (firm_id,firm_own_id,firm_name,firm_reg_no,firm_long_name,
                firm_desc,firm_type,firm_owner,firm_form_header,firm_form_footer,firm_since)
                VALUES('3','$_SESSION[sessionOwnerId]','Test','1234','Test','Firm added for test','Public','Self',"
        . "'SHUBH LABH','NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL',"
        . "$currentDateTime)";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}

$firmId = '3';
include 'omtipacc.php';
?>