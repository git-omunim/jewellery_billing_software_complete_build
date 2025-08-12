<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 29, 2020 10:09:46 PM
 *
 * @FileName:omstaffupdfile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.o
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
if (!isset($_SESSION)) {
    session_start();
}
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';



//echo '$ownerId'.$ownerId;
$query = "INSERT INTO omdata (omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_percentage,omdata_input_field) VALUES
     ('$ownerId','$user_id','SALARY','EMP_GROSS_SALARY','','','GROSS'),"
        . "('$ownerId','$user_id','SALARY','BASIC SALARY','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','HOUSE RENT ALLOWANCE','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','CONVEYANCES ALLOWANCE','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','SPECIAL ALLOWANCE','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','TRAVEL ALLOWANCE','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','MEDICAL ALLOWANCE','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','EXGRATIA/BONUS','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','VARIABLE PAY','','','EARNING'),"
        . "('$ownerId','$user_id','SALARY','INCOME TAX','','','DEDECTION'),"
        . "('$ownerId','$user_id','SALARY','OFFICE EXP','','','DEDECTION'),"
        . "('$ownerId','$user_id','SALARY','FUND','','','DEDECTION'),"
        . "('$ownerId','$user_id','SALARY','LOP','','','DEDECTION'),"
        . "('$ownerId','$user_id','SALARY','EARNING','','','TOTALEARNING'),"
        . "('$ownerId','$user_id','SALARY','DEDECTION','','','TOTALDEDECTION'),"
        . "('$ownerId','$user_id','SALARY','NETAMT','','','NETAMOUNT')";

 if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    