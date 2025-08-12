<?php
/*
 * **************************************************************************************
 * @tutorial: Get item for stock transfer @AUTHOR:MADHUREE-24OCT19
 * **************************************************************************************
 *
 * Created on 24 OCT 2019
 *
 * @FileName:omStockFirmTransfer.php
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
include_once 'ommpfndv.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
$itemId = $_POST['itemId'];
$firmId = $_POST['firmId'];
$preFirmId = $_POST['preFirmId'];
$preFirmNames = $_POST['preFirmNames'];
$stTransDate = $_POST['stTransDate'];

/* START TO CODE TO FETCH A STOCK DETAILS FROM STOCK TABLE BEFORE TRANSFER STOCK */
parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_item_code='$itemId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_transaction_type IN('EXISTING','PURONCASH','TAG','PURBYSUPP')"));
parse_str(getTableValues("SELECT * FROM stock where st_owner_id = '$_SESSION[sessionOwnerId]' and  st_metal_type = '$sttr_metal_type' and st_item_name = '$sttr_item_name' and st_item_category = '$sttr_item_category' and st_stock_type = '$sttr_stock_type' and st_purity = '$sttr_purity' and st_firm_id='$sttr_firm_id'"));
$stockNewQty = $st_quantity - $sttr_quantity;
$stockNewPktWT = $st_pkt_weight - $sttr_pkt_weight;
$stockNewGSW = $st_gs_weight - $sttr_gs_weight;
$stockNewNTW = $st_nt_weight - $sttr_nt_weight;
$stockNewLabChrgs = $st_lab_charges - $sttr_lab_charges;
$stockNewMkgChrgs = $st_making_charges - $sttr_making_charges;
$stockNewFineWt = $st_fine_weight - $sttr_fine_weight;
$stockNewFinalFineWt = $st_final_fine_weight - $sttr_final_fine_weight;
$stockNewTax = $st_tax - $sttr_tax;
$stockNewTotTax = $st_tot_tax - $sttr_tot_tax;
$stockNewVal = $st_valuation - $sttr_valuation;
$stockNewFinalVal = $st_final_valuation - $sttr_final_valuation;
/* END TO CODE TO FETCH A STOCK DETAILS FROM STOCK TABLE BEFORE TRANSFER STOCK */
/* START TO ADDING CODE FOR UPDATE ENTRIES IN STOCK AND STOCK_TRANSACTION TABLE FOR STOCK TRANSFER-@AUTHOR:MADHUREE-06NOV19 */
$query = "SELECT * FROM stock where st_owner_id = '$_SESSION[sessionOwnerId]' and st_metal_type = '$sttr_metal_type' and st_item_name = '$sttr_item_name' and st_item_category = '$sttr_item_category' and st_stock_type = '$sttr_stock_type' and st_purity = '$sttr_purity' and st_firm_id='$sttr_firm_id' and st_item_code='$sttr_item_code'";
$result = mysqli_query($conn, $query);
$rowCurrenstock = mysqli_fetch_array($result, MYSQLI_ASSOC);
$stId = $rowCurrenstock['st_id'];
$noOfStockAvailable = mysqli_num_rows($result);
if ($noOfStockAvailable > 0) {
    $updateQuery = "UPDATE stock SET st_firm_id='$firmId' WHERE st_id = '$stId' and st_owner_id='$_SESSION[sessionOwnerId]'";
    if (!mysqli_query($conn, $updateQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $qUpdatePreItem = "UPDATE stock SET st_quantity = '$stockNewQty',st_pkt_weight = '$stockNewPktWT',st_gs_weight = '$stockNewGSW',st_nt_weight = '$stockNewNTW',st_lab_charges = '$stockNewLabChrgs', st_making_charges = '$stockNewMkgChrgs',st_fine_weight = '$stockNewFineWt',st_final_fine_weight = '$stockNewFinalFineWt',st_tax = '$stockNewTax', st_tot_tax = '$stockNewTotTax',st_valuation = '$stockNewVal', st_final_valuation = '$stockNewFinalVal' WHERE st_id = '$st_id'";
    if (!mysqli_query($conn, $qUpdatePreItem)) {
        die('Error: ' . mysqli_error($conn));
    }
    $insertPreItem = "INSERT INTO stock (st_owner_id, st_firm_id, st_metal_type, st_item_code,"
            . "st_item_name, st_item_category, st_type, st_stock_type,"
            . "st_quantity, st_purity, st_wastage, st_final_purity, st_pkt_weight, st_gs_weight, st_gs_weight_type,"
            . "st_nt_weight, st_nt_weight_type, st_lab_charges, st_making_charges,"
            . "st_fine_weight, st_fine_weight_type, st_final_fine_weight, st_tax, st_tot_tax,"
            . "st_valuation, st_final_valuation) VALUES ('$sttr_owner_id', '$firmId', '$sttr_metal_type', '$sttr_item_code',"
            . "'$sttr_item_name', '$sttr_item_category', '$sttr_indicator', '$sttr_stock_type',"
            . "'$sttr_quantity', '$sttr_purity', '$sttr_wastage', '$sttr_final_purity', '$sttr_pkt_weight', '$sttr_gs_weight', '$sttr_gs_weight_type',"
            . "'$sttr_nt_weight', '$sttr_nt_weight_type', '$sttr_lab_charges', '$sttr_making_charges',"
            . "'$sttr_fine_weight', '$sttr_fine_weight_type', '$sttr_final_fine_weight', '$sttr_tax', '$sttr_tot_tax',"
            . "'$sttr_valuation', '$sttr_final_valuation')";

    if (!mysqli_query($conn, $insertPreItem)) {
        die('Error: ' . mysqli_error($conn));
    }
}
$updateSttrQuery = "UPDATE stock_transaction SET sttr_firm_id='$firmId',sttr_stock_trans_history='$preFirmNames',sttr_trans_date='$stTransDate' WHERE sttr_item_code = '$itemId' and sttr_owner_id='$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn, $updateSttrQuery)) {
    die('Error: ' . mysqli_error($conn));
}
header('Location: ' . $documentRoot . '/include/php/omStocktransfer.php?divPanel=OwnerHome&divMainMiddlePanel=stockTransfer&itemId=' . $itemId);

/* END TO ADDING CODE FOR UPDATE ENTRIES IN STOCK AND STOCK_TRANSACTION TABLE FOR STOCK TRANSFER-@AUTHOR:MADHUREE-06NOV19 */
?>
