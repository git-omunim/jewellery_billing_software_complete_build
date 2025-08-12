<?php

/*
 * **************************************************************************************
 * @tutorial: Money lender Details to Delete
 * **************************************************************************************
 * 
 * Created on May 10, 2013 4:48:10 PM
 *
 * @FileName: ormldelt.php
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
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';

//Count Total ml transactions
$qSelTotalTransactionCount = "SELECT ml_id FROM ml_loan where ml_own_id='$suppOwnerId' and ml_lender_id='$mlId'";
$resTotalTransactionCount = mysqli_query($conn,$qSelTotalTransactionCount);
$totalTransactionCount = mysqli_num_rows($resTotalTransactionCount);


if ($totalTransactionCount > 0) {
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&suppStatus=suppNotDeleted' . '&panelOption=Update'); //CHANGE IN NAVIGATION @AUTHOR: SANDY27DEC13
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&suppStatus=suppNotDeleted' . '&panelOption=Update');
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&suppStatus=suppNotDeleted' . '&panelOption=Update');
    }
} else {
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    parse_str(getTableValues("SELECT user_fname,user_father_name,user_lname,user_firm_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$mlId'"));
    $sslg_trans_sub = 'MONEYLENDER DELETED';
    $sslg_trans_comment = $user_fname . ' ' . substr($user_father_name, 1) . ' ' . $user_lname . ' MONEYLENDER DELETED';
    $sslg_firm_id = $user_firm_id;
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    //Change in query to delete ml @AUTHOR: SANDY06JAN14
    $query = "DELETE FROM user where user_owner_id ='$suppOwnerId' and user_id ='$mlId'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
       $query = "DELETE FROM image where image_owner_id ='$suppOwnerId' and image_user_id ='$mlId'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustList&user=moneyLender&action=moneyLenderDeleted');
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustList&user=moneyLender&action=moneyLenderDeleted');
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustList&user=moneyLender&action=moneyLenderDeleted');
    }
}
