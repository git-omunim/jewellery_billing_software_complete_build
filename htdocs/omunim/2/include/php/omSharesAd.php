<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 31 Jul, 2018 11:13:52 AM
 *
 * @FileName: omSharesAd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
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

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

//
//
parse_str(getTableValues("SELECT * FROM firm where firm_own_id='$sessionOwnerId'"));
if ($firmId == '')
    $firmId = $firm_id;
//
$userOwnerId = $_SESSION['sessionOwnerId'];
$DOBDay = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['DOBDay'])));
$DOBMonth = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['DOBMonth'])));
$DOBYear = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['DOBYear'])));
$sharesDesc = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sharesDesc'])));
$sharesQTY = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sharesQTY'])));
$sharesPrice = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sharesPrice'])));
$sharesTotalPrice = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sharesTotalPrice'])));
$utin_transaction_type = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['utin_transaction_type'])));
$custId = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['custId'])));
$date = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;
//
parse_str(getTableValues("SELECT SUM(utin_prod_qty) AS soldQty FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and "
                . "utin_user_id = '$custId' and utin_firm_id = '$firmId' "
                . "and utin_transaction_type = 'Sold' and utin_type = 'Shares'"));
//
parse_str(getTableValues("SELECT SUM(utin_prod_qty) AS purchaseQty FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and "
                . "utin_user_id = '$custId' and utin_firm_id = '$firmId' "
                . "and utin_transaction_type = 'Purchased' and utin_type = 'Shares'"));
//
$totalSoldQty = $soldQty + $sharesQTY;
//
if (($purchaseQty < $totalSoldQty ) && $utin_transaction_type == 'Sold') {
//    echo 'Hi';
    $message = "You Cannot Purchase/Sell This Share!";
    //echo'$message =='.$message;
    //
    header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome"
            . "&divMainMiddlePanel=CustHome&panel=AddShares&custId=$custId&message=" . $message);
} else {
//
    if ($sharesQTY != '') {
        $query = "INSERT INTO user_transaction_invoice (
    utin_firm_id,utin_owner_id,utin_prod_details,utin_prod_qty,utin_prod_unit_price,utin_total_amt,
    utin_type,utin_transaction_type,utin_date,utin_user_id) 
    VALUES ('$firmId','$userOwnerId','$sharesDesc','$sharesQTY','$sharesPrice','$sharesTotalPrice',"
                . "'Shares','$utin_transaction_type','$date','$custId')";
//    echo '$query =='.$query;
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
//
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO ) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome"
            . "&divMainMiddlePanel=CustHome&panel=AddShares&custId='$custId'");
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome"
            . "&divMainMiddlePanel=CustHome&panel=AddShares&custId='$custId'");
}
?>