<?php

/*
 * **************************************************************************************
 * @tutorial: START CODE TO UPDATE FIXED MRP PRODUCT PRICE : AUTHOR @DARSHANA 7 DEC 2021 
 * **************************************************************************************
 * 
 * Created on 06 DEC 2021
 *
 * @FileName: omupdmrpprodprice.php
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
$staffId = $_SESSION['sessionStaffId'];
$ownerId = $_SESSION['sessionOwnerId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
//
//
$sttr_id = $_GET['sttr_id'];
$updatedMrp = $_GET['updatedMrp'];
$panelName = $_GET['panelName'];
$mrpPer = $_GET['mrpPer'];
$firmId = $_GET['firmId'];

if ($panelName == 'sellPanel') {
    if ($sttr_id != '' && $sttr_id != NULL) {

        $updateSellMrp = "UPDATE stock_transaction SET sttr_cust_price='$updatedMrp' WHERE sttr_id='$sttr_id' AND sttr_owner_id='$ownerId'";
        mysqli_query($conn, $updateSellMrp);
        
        $selectUpdatedMrp = "SELECT sttr_cust_price FROM stock_transaction WHERE sttr_id='$sttr_id'";
        $queryUpdatedMrp = mysqli_query($conn, $selectUpdatedMrp);
        $resUpdatedMrp = mysqli_fetch_array($queryUpdatedMrp);
        
        $sttr_cust_price = $resUpdatedMrp['sttr_cust_price'];
        
       echo $sttr_cust_price;
    }
}
//
//
if ($panelName == 'AvailableStock') {
    //
    if ($firmId == '' || $firmId == NULL) {
        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            // If not selected assign session firm
            $selFirmId = $_SESSION['setFirmSession'];
        }
        //
        //
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
            $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and "
                    . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
            $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where "
                    . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
        }
        //
        //
    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
            $resFirmCount = mysqli_query($conn, $qSelFirmCount);
            $strFrmId = '0';
            // Set String for Public Firms
            while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                $strFrmId = $strFrmId . ",";
                $strFrmId = $strFrmId . "$rowFirm[firm_id]";
            }
        } else {
            $strFrmId = $selFirmId;
        }
        
        $firmId = $strFrmId;
    }
    $selectFixedPriceStock = "SELECT * FROM stock_transaction WHERE sttr_firm_id IN ($firmId) and sttr_indicator IN ('stock') "
            . "and sttr_status NOT IN ('DELETED','NotDelFromStock') "
            . "and sttr_stock_type = 'retail' and sttr_panel_name NOT IN ('SERVICE_FORM', 'SUBSCRIPTION_FORM') "
            . "and sttr_transaction_type IN ('PURONCASH', 'EXISTING', 'TAG') and sttr_fixed_price_status='TRUE'";

    $queryFixedPriceStock = mysqli_query($conn, $selectFixedPriceStock);

    while ($resFixedPriceStock = mysqli_fetch_array($queryFixedPriceStock, MYSQLI_ASSOC)) {
        $sttr_id = $resFixedPriceStock['sttr_id'];
        $sttr_cust_price = $resFixedPriceStock['sttr_cust_price'];

        $prodCalAmtOnPer = ($sttr_cust_price * $mrpPer) / 100;
        $updatedMrpPrice = $sttr_cust_price + $prodCalAmtOnPer;

        $updateFixedMrpOfStock = "UPDATE stock_transaction SET sttr_cust_price='$updatedMrpPrice' WHERE sttr_id='$sttr_id'";
        mysqli_query($conn, $updateFixedMrpOfStock);
    }
    header("Location: $documentRoot/include/php/omavalblstkwimrp.php?panelName=AvailStockListWithFixedMrp");
}
?>