<?php
/*
 * **************************************************************************************
 * @Description: UPDATE USER LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
 * **************************************************************************************
 *
 * Created on MAR 09, 2022 01:00:21 PM
 *
 * @FileName: omUserUpdateClosingLoyaltyPoints.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.7.130
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-09MAR2022
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.130
 * Version: 2.7.130
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
//
// **************************************************************************************
// START TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
// **************************************************************************************
//
$queryForAllUser = "SELECT * FROM user";
//
//echo '$queryForAllUser == ' . $queryForAllUser . '<br />';
//
$resultUser = mysqli_query($conn, $queryForAllUser);
//
$counter = 1;
//
while ($rowUser = mysqli_fetch_array($resultUser, MYSQLI_ASSOC)) {
    //
    //
    //echo '<br />user_id == ' . $rowUser[user_id] . '<br />';
    //
    //
    $queryLoyaltyPoints = "SELECT * FROM user_transaction_invoice  "
                        . "WHERE utin_user_id = '$rowUser[user_id]' "
                        . "AND utin_transaction_type NOT IN ('UDHAAR') "
                        . "AND utin_type NOT IN ('OnPurchase') "
                        . "AND (utin_lp_close IS NOT NULL AND utin_lp_close != '') "
                        . "ORDER BY utin_id DESC LIMIT 0,1 ";
    //
    //echo '$queryLoyaltyPoints == ' . $queryLoyaltyPoints . '<br />';
    //
    $resultLoyaltyPoints = mysqli_query($conn, $queryLoyaltyPoints);
    //
    $rowLoyaltyPoints = mysqli_fetch_array($resultLoyaltyPoints);
    //
    //
    //echo 'utin_user_id == ' . $rowLoyaltyPoints['utin_user_id'] . '<br />';
    //echo 'utin_lp_close == ' . $rowLoyaltyPoints['utin_lp_close'] . '<br />';
    //
    //
    if ($rowLoyaltyPoints['utin_user_id'] != '' && $rowLoyaltyPoints['utin_user_id'] != NULL && 
        $rowLoyaltyPoints['utin_lp_close'] != '' && $rowLoyaltyPoints['utin_lp_close'] != NULL) {
        //
        $prodUserQuery = "UPDATE user SET user_lty_no = '$rowLoyaltyPoints[utin_lp_close]' "
                       . "WHERE user_id = '$rowLoyaltyPoints[utin_user_id]'";
        //
        //echo '$prodUserQuery == ' . $prodUserQuery . '<br /><br />';
        //
        mysqli_query($conn, $prodUserQuery);
        //
    }
    //
    //
    //echo '$counter == ' . $counter . '<br /><br />';
    //
    $counter++;
    //
    //
}
//
$displayMsg = "SuccessfullyUpdated";
//
// **************************************************************************************
// END TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
// **************************************************************************************
?>