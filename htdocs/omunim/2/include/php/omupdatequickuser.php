<?php
/*
 * **************************************************************************************
 * @tutorial: quick sell UPDATE USER PAGE 
 * **************************************************************************************
 * 
 * Created on 06102022  2:51:25 PM
 *
 * @FileName: style.css
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: YUVRAJ KAMBLE 06102022
 *  REASON:
 *
 */
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<?php
$custId = $_GET['custId'];
$custFirstNameForAddGirvi = $_GET['custFirstNameForAddGirvi'];
$mobileNoToAddGirvi = $_GET['mobileNoToAddGirvi'];
$select = "SELECT * FROM user WHERE user_mobile = '$mobileNoToAddGirvi'";
$querySelect = mysqli_query($conn, $select);
$resSelect = mysqli_fetch_array($querySelect);
if ($resSelect > 0) {
    echo '<p>Mobile Number Already Exist</p>';
} else {
    $updateQurty = "UPDATE user SET user_fname='$custFirstNameForAddGirvi',user_mobile='$mobileNoToAddGirvi' WHERE user_id='$custId'";
    $queryUpdate = mysqli_query($conn, $updateQurty);
    if ($queryUpdate) {
        echo '<p>Updated Sucessfully</p>';
    }
}
?>