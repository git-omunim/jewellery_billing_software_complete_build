<?php

/*
 * **************************************************************************************
 * @tutorial: Add Raw Assign Stock Items 
 * **************************************************************************************
 *
 * Created on JAN 10, 2019 11:18:24 AM
 *
 * @FileName: omrwmtlad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:@Author:PRIYA18JAN14
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
include_once 'conversions.php';
require_once 'ommpincr.php';
include 'ogiamtrts.php';
?>
<?php

$listPanel = $_REQUEST['listPanel'];
$listPanelUp = $_REQUEST['listPanelUp'];
$listMetalPanel = $_REQUEST['listMetalPanel'];
$sttrId = $_REQUEST['sttrId'];
$name = $_REQUEST['name'];
$preno = $_REQUEST['preno'];
$no = $_REQUEST['no'];
//      echo '$name=='.$name;die;
//
//print_r($_REQUEST);
//
// Start Code to Check Demo Mode
$qSelItemCount = "SELECT sttr_id FROM stock_transaction where sttr_item_category IN ('RawGold', 'RawSilver','OldGold','OldSilver')";
$resItemCount = mysqli_query($conn, $qSelItemCount);
$totalItem = mysqli_num_rows($resItemCount);
if (($_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem >= 20) {
    $message = "In Demo, You can not add more than five Items!";
    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=False&message=' . $message);
} else if ($_SESSION['sessionDongleStatus'] != NULL &&
        ((($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $totalItem < 5) ||
        (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD) &&
        $_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {

    if ($_POST['addItemDOBMonth'] == 'NotSelected' || $_POST['addItemDOBDay'] == 'NotSelected' || $_POST['addItemDOBYear'] == 'NotSelected') {
        $rawMetalAddDob = 'N/A';
    } else {
        $rawMetalAddDob = $_POST['addItemDOBDay'] . ' ' . $_POST['addItemDOBMonth'] . ' ' . $_POST['addItemDOBYear'];
    }

    $rawOwnerId = $_SESSION['sessionOwnerId'];

    include 'ogadrwids.php';
    

    if ($listPanelUp == 'MeltingTransListUp' || $listMetalPanel == 'MeltingTransListUp') {
        //
        parse_str(getTableValues("SELECT * FROM stock_transaction WHERE "
                        . "sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_id='$rwprId'"));


        //
        stock_transaction('update', $_REQUEST, '');
        //
    } else if (($rawPanelName == 'AddRawStock') || ($rawPanelName == 'RawPayment') || ($rawPanelName == 'SimilarItem')) {
        //
        $rwprId = stock_transaction('insert', $_REQUEST, '');
//
//      Before Melt        
        parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_status IN ('AssignForMelting','Melted') "
                        . "and sttr_id = '$sttrId'"));
        $Amount = $sttr_valuation;
//    
//      After Melt
        parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_transaction_type = 'PURBYSUPP' and sttr_indicator = 'rawMetal'"
                        . " and sttr_id = '$rwprId'"));
        $MeltAmount = $sttr_valuation;
        //
        $FinalAmount = $Amount - $MeltAmount;
//        echo '$FinalAmount=='.$FinalAmount;
        //
        $query = "UPDATE stock_transaction SET sttr_status = 'PaymentDone', sttr_melt_valuation = '$FinalAmount', "
                . "sttr_item_melt_info = '$name',sttr_pre_invoice_no = '$preno' ,sttr_invoice_no = '$no',sttr_ref_invoice_no = '$preno$no' WHERE  "
                . "sttr_owner_id = '$rawOwnerId' AND sttr_id='$rwprId' AND sttr_indicator = 'rawMetal'";
//        echo '$query=='.$query;
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }

        $meltquery = "UPDATE stock_transaction SET sttr_status = 'Melted' WHERE  "
                . "sttr_owner_id = '$rawOwnerId' AND sttr_id='$sttrId' AND sttr_indicator = 'METAL'";
//       echo '$meltquery=='.$meltquery;
        //
        if (!mysqli_query($conn, $meltquery)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    if($listPanelUp == 'MeltingTransListUp' || $listPanel == 'MeltingTransList'){
    header("Location: $documentRoot/include/php/ogmetalpop.php?listPanel=' . $listPanel" . "&listPanelUp=MeltingTransListUp&sttrId=" . $sttrId);
}
else{
    header("Location: $documentRoot/include/php/ogmetalpop.php?listMetalPanel=MeltingTransListUp&sttrId=" . $sttrId);
}
        }
?>
