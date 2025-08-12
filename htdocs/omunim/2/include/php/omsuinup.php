<?php

/*
 * Created on Aug 12, 2016
 *
 * @FileName: omsuinup.php
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

//Start code to change headers @Author:PRIYA27DEC13
$schemeNameOwnerId = $_SESSION['sessionOwnerId'];
$schemeNameId = trim($_POST['schemeNameId']);
$updateScheme = trim($_POST['UpdateScheme']);
if ($updateScheme == 'Update') {
    $schemeName = om_ucfirst(trim($_POST['addSchemeName']));
    $schemeAmt = $_POST['addSchemeAmt'];
    $schemeAmtTyp = $_POST['addSchemeAmtTyp'];
    $schemePrdTyp = trim($_POST['addSchemePrdTyp']);
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

    $qSelItemName = "SELECT acit_desc FROM actionitem where acit_desc='$schemeName' and acit_owner_id='$schemeNameOwnerId' and acit_id!='$schemeNameId'";
    $resItemName = mysqli_query($conn,$qSelItemName);

    if ($rowItemName = mysqli_fetch_array($resItemName, MYSQLI_ASSOC)) {
        $message = 'SchemeNameAlreadyExist';
        $subDivName = 'UpdateNewScheme';
        //  header('Location: ' . $documentRoot . '/include/php/omiuindv.php?divMainMiddlePanel=ItemNameAlreadyExist&itemNameId=' . $itemNameId . '&itemName=' . $itemName);
    } else {
        //Added itm_nm_name_lang_typ ,itm_nm_name_lang @AUTHOR: GAUR20JUL16 
        $query = "UPDATE actionitem SET
		acit_desc ='$schemeName',
                acit_scheme_amt ='$schemeAmt',
                acit_scheme_amt_typ = '$schemeAmtTyp',
                acit_scheme_prd_typ='$schemePrdTyp',
                acit_scheme_prd = '$schemePrd'
		WHERE acit_owner_id = '$schemeNameOwnerId' and acit_id = '$schemeNameId'";
//echo $query;
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        $message = 'SchemeNameUpdated';
        $subDivName = 'UpdateNewScheme';
        //  header('Location: ' . $documentRoot . '/include/php/omiuindv.php?divMainMiddlePanel=ItemNameUpdated');
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'SCHEME UPDATED';
    $sslg_trans_comment = $schemeName . ' SCHEME UPDATED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=' . $subDivName . '&getMessage=' . $message . '&schemeNameId=' . $schemeNameId . '&schemeName=' . $schemeName . '&schemeAmt=' . $schemeAmt);
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=' . $subDivName . '&getMessage=' . $message . '&schemeNameId=' . $schemeNameId . '&schemeName=' . $schemeName . '&schemeAmt=' . $schemeAmt);
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=' . $subDivName . '&getMessage=' . $message . '&schemeNameId=' . $schemeNameId . '&schemeName=' . $schemeName . '&schemeAmt=' . $schemeAmt);
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=' . $subDivName . '&getMessage=' . $message . '&schemeNameId=' . $schemeNameId . '&schemeName=' . $schemeName . '&schemeAmt=' . $schemeAmt);
    }
    require_once 'omssclin.php';
} else if ($updateScheme == 'Delete') {
    $qSelItemName = "SELECT acit_desc FROM actionitem where acit_desc='$schemeName' and acit_owner_id='$schemeNameOwnerId'";
    $resItemName = mysqli_query($conn,$qSelItemName);
    if ($rowItemName = mysqli_fetch_array($resItemName, MYSQLI_ASSOC)) {
        $messeage = 'SchemeNameNotDeleted';
        // header('Location: ' . $documentRoot . '/include/php/omiaaind.php?divMainMiddlePanel=ItemNameNotDeleted');
    } else {
        /*         * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
        parse_str(getTableValues("SELECT acit_desc FROM actionitem where acit_desc='$schemeName' and acit_owner_id='$schemeNameOwnerId'"));
        $sslg_trans_sub = 'SCHEME DELETED';
        $sslg_trans_comment = $acit_desc . ' SCHEME DELETED';
        include 'omslgapi.php';
        /*         * *******eND code to add sys_log api @Author:PRIYA10APR14******************** */
        $query = "DELETE FROM actionitem WHERE acit_owner_id = '$schemeNameOwnerId' and acit_id = '$schemeNameId'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        $messeage = 'SchemeNameDeleted';
        // header('Location: ' . $documentRoot . '/include/php/omiaaind.php?divMainMiddlePanel=ItemNameDeleted');
    }
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=' . $messeage);
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=' . $messeage);
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=' . $messeage);
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddNewScheme&getMessage=' . $messeage);
    }
    require_once 'omssclin.php';
}
//End code to change headers @Author:PRIYA27DEC13
?>