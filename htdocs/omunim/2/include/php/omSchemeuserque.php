<?php
/*
 * **************************************************************************************
 * @Description:FILE FOR SEARCH SCHEME CUSTOMER @SWAPNIL-24DEC2019
 * **************************************************************************************
 *
 * Created on 24 DEC, 2019 04:25: PM
 *
 * @FileName: omSchemeuserque.php
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
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
/***********Start to add condition for supplier @MADHURI 04SEP2019****************/
$staffId = $_SESSION['sessionStaffId'];
if ($staffId != '') {
    parse_str(getTableValues("SELECT acc_panel FROM access WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id='$staffId' and acc_check_id='staffTransAccess'"));
    if ($acc_panel == 'staffAllTrans' || $acc_panel == 'staffAllTransReadOnly') {
        $userLoginString = '';
    } else {
        $userLoginString = " and user_login_id= '$staffId'";
    }
} else {
    $userLoginString = '';
}
//
$qSelPubCustomerCount = "SELECT user_id FROM user 
                            where user_owner_id='$_SESSION[sessionOwnerId]' and user_status!='Released' and user_type='CUSTOMER' $searchStr $ownOIPassStr $userLoginString LIMIT $perOffset, $doubleLimit";
//echo '$qselpubCustomerCount'.$qSelPubCustomerCount;
$resPubCustomerCount = mysqli_query($conn,$qSelPubCustomerCount) or die(mysqli_error($conn));
$totalCustomer += mysqli_num_rows($resPubCustomerCount);
//
// ****************** Searching Customer **********************
$qSelPubCustomer = "SELECT user_id,user_block_status,user_category,user_firm_id,
                    user_fname,user_lname,user_father_name,user_city,
                    user_village,user_state,user_mobile,user_add,user_login_id,user_staff_id
                    FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' 
                    and user_status!='Released' 
                    and user_type='CUSTOMER' $searchStr $ownOIPassStr $userLoginString 
                    order by user_fname asc LIMIT $perOffset, $perRowsPerPage";
//
$resPubCustomer = mysqli_query($conn,$qSelPubCustomer) or die(mysqli_error($conn));
$totalNextCustomer = mysqli_num_rows($resPubCustomer);
//

//
while ($rowCustomer = mysqli_fetch_array($resPubCustomer, MYSQLI_ASSOC)) {
    //
    include 'omSchemeuser_row.php';
    //
}
?>