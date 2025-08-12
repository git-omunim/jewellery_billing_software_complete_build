<?php

/*
 *  Created on Aug 12, 2016
 *
 * @FileName: omsaadin.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

$schemeNameOwnerId = $_SESSION['sessionOwnerId'];
$schemeName = om_ucfirst(trim($_POST['addSchemeName']));
$schemeAmt = $_POST['addSchemeAmt'];
$schemeAmtTyp = $_POST['addSchemeAmtTyp'];
$schemePrdTyp = $_POST['addSchemePrdTyp'];
$schemePrd = $_POST['addSchemePrd'];


// Start To protect MySQL injection
$schemeName = stripslashes($schemeName);
$schemeAmt = stripslashes($schemeAmt);
$schemeAmtTyp = stripslashes($schemeAmtTyp);
$schemePrdTyp = stripslashes($schemePrdTyp);
$schemePrd = stripslashes($schemePrd);

$schemeName = mysqli_real_escape_string($conn,$schemeName);
$schemeAmt = mysqli_real_escape_string($conn,$schemeAmt);
$schemeAmtTyp = mysqli_real_escape_string($conn,$schemeAmtTyp);
$schemePrdTyp = mysqli_real_escape_string($conn,$schemePrdTyp);
$schemePrd = mysqli_real_escape_string($conn,$schemePrd);
// End To protect MySQL injection

$qSelItemName = "SELECT acit_desc FROM actionitem where acit_desc='$schemeName' and acit_owner_id='$schemeNameOwnerId'";
$resItemName = mysqli_query($conn,$qSelItemName);

if ($rowItemName = mysqli_fetch_array($resItemName, MYSQLI_ASSOC)) {
    // header('Location: ' . $documentRoot . '/include/php/omiaaind.php?divMainMiddlePanel=ItemNameAlreadyExist');
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=SchemeNameAlreadyExist');
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=SchemeNameAlreadyExist');
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=SchemeNameAlreadyExist');
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=SchemeNameAlreadyExist');
    }
} else {
    $query = "INSERT INTO actionitem (
      acit_owner_id, acit_desc, acit_scheme_amt, acit_scheme_amt_typ, acit_scheme_prd_typ, acit_scheme_prd)
      VALUES (
      '$schemeNameOwnerId','$schemeName','$schemeAmt', '$schemeAmtTyp' ,'$schemePrdTyp','$schemePrd')";

//echo $query;
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'NEW SCHEME ADDED';
    $sslg_trans_comment = $schemeName . ' NEW SCHEME ADDED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    //START Code to navigate to correct page @AUTHOR: SANDY15DEC13
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme');
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme');
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme');
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme');
    }
    //End Code to navigate to correct page @AUTHOR: SANDY15DEC13
}
require_once 'omssclin.php';
?>