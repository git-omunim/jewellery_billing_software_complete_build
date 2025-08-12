<?php
/*
 * *************************************************************************************************
 * @Description: SELL PANEL - SET BILL DISCOUNT FILE @AUTHOR-PRIYANKA-02NOV2020
 * *************************************************************************************************
 *
 * Created on NOV 02, 2020 03:30:00 PM 
 * *************************************************************************************************
 * @FileName: omSellSetBillDiscount.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.27
 * @version: OMUNIM 2.7.27
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-02NOV2020
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
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
//
//
//echo '$selFirmId == ' . $selFirmId . '<br />';
//echo 'firmId == ' . $firmId . '<br />';
//
// INVOICE TOTAL BILL AMOUNT @AUTHOR-PRIYANKA-10NOV2020
$invoiceTotalBillAmount = round($totalFinalBalance); 
//
//
//echo '$invoiceTotalBillAmount == ' . $invoiceTotalBillAmount . '<br />';
//
//
// TODAY DATE @AUTHOR-PRIYANKA-02NOV2020
$todayDateFormat = date("d-m-Y");
$todayDate = strtotime($todayDateFormat);
//
//
// DATE STR @AUTHOR-PRIYANKA-02NOV2020
$discDateStr = "AND (UNIX_TIMESTAMP(STR_TO_DATE(disc_start_date,'%d %b %Y')) <= '$todayDate') "
             . "AND ('$todayDate' <= UNIX_TIMESTAMP(STR_TO_DATE(disc_end_date,'%d %b %Y'))) ";
//
//
//echo '$discDateStr == ' . $discDateStr . '<br />';
//
//
// BILL AMOUNT STR @AUTHOR-PRIYANKA-02NOV2020
$totalBillAmountStr = "AND (disc_total_bill_amount_min <= $invoiceTotalBillAmount) "
                    . "AND (disc_total_bill_amount_max >= $invoiceTotalBillAmount) ";
//
//
//echo '$totalBillAmountStr == ' . $totalBillAmountStr . '<br />';
//
//
// TO CHECK BILL DISCOUNT OPTIONS @AUTHOR-PRIYANKA-02NOV2020
$selBillDiscountQuery = "SELECT * FROM discount WHERE disc_owner_id = '$_SESSION[sessionOwnerId]' "
                      . "AND disc_firm_id = '$firmId' "
                      . "AND disc_active = 'checked' "
                      . "AND disc_panel_name = 'BillDiscountPanel' "
                      . "$discDateStr $totalBillAmountStr "
                      . "ORDER BY disc_id DESC LIMIT 0,1";
//
//echo '$selBillDiscountQuery == ' . $selBillDiscountQuery . '<br />';
//
$resBillDiscountQuery = mysqli_query($conn, $selBillDiscountQuery);
$noOfBillDiscountRows = mysqli_num_rows($resBillDiscountQuery);
//
if ($noOfBillDiscountRows > 0) {
        //
        $rowBillDiscQueryDet = mysqli_fetch_array($resBillDiscountQuery);
        //
        // TOTAL BILL AMOUNT MIN @AUTHOR-PRIYANKA-02NOV2020
        $disc_total_bill_amount_min = $rowBillDiscQueryDet['disc_total_bill_amount_min'];
        //
        // TOTAL BILL AMOUNT MAX @AUTHOR-PRIYANKA-02NOV2020
        $disc_total_bill_amount_max = $rowBillDiscQueryDet['disc_total_bill_amount_max'];
        //
        // MAKING DISCOUNT @AUTHOR-PRIYANKA-02NOV2020
        $disc_bill_making_discount = $rowBillDiscQueryDet['disc_making_discount'];
        //
        // STONE DISCOUNT @AUTHOR-PRIYANKA-02NOV2020
        $disc_bill_stone_discount = $rowBillDiscQueryDet['disc_stone_discount'];
        //
        // TOTAL BILL AMOUNT DISCOUNT @AUTHOR-PRIYANKA-02NOV2020
        $disc_total_bill_amount_discount = $rowBillDiscQueryDet['disc_total_bill_amount_discount'];
        //
        // DISCOUNT START DATE AND END DATE @AUTHOR-PRIYANKA-02NOV2020
        $disc_start_date = $rowBillDiscQueryDet['disc_start_date'];
        $disc_end_date = $rowBillDiscQueryDet['disc_end_date'];
        //
        // DISCOUNT PRODUCT CHECK @AUTHOR-PRIYANKA-02NOV2020
        $disc_bill_product_check = $rowBillDiscQueryDet['disc_product_check'];
        //
        // DISCOUNT CHECK @AUTHOR-PRIYANKA-02NOV2020
        $disc_bill_discount_check = $rowBillDiscQueryDet['disc_discount_check'];
        //
        // DISCOUNT ADJUST @AUTHOR-PRIYANKA-02NOV2020
        $disc_bill_discount_adjust = $rowBillDiscQueryDet['disc_discount_adjust'];
        //
}
//
//
//echo '$disc_total_bill_amount_min == ' . $disc_total_bill_amount_min . '<br />';
//echo '$disc_total_bill_amount_max == ' . $disc_total_bill_amount_max . '<br />';
//echo '$disc_bill_making_discount == ' . $disc_bill_making_discount . '<br />';
//echo '$disc_bill_stone_discount == ' . $disc_bill_stone_discount . '<br />';
//echo '$disc_total_bill_amount_discount == ' . $disc_total_bill_amount_discount . '<br />';
//echo '$disc_bill_product_check == ' . $disc_bill_product_check . '<br />';
//echo '$disc_bill_discount_check == ' . $disc_bill_discount_check . '<br />';
//echo '$disc_bill_discount_adjust == ' . $disc_bill_discount_adjust . '<br />';
//
//
// SET DISCOUNT ON PAYMENT PANEL (DISCOUNT APPLIED ON WITHOUT GST AMOUNT) @AUTHOR-PRIYANKA-10NOV2020
if ($disc_total_bill_amount_discount > 0) {
    //
    // BILL DISCOUNT IN % @AUTHOR-PRIYANKA-10NOV2020
    $utin_discount_per_discup = $disc_total_bill_amount_discount;
    //
}
//
//echo '$utin_discount_per_discup == ' . $utin_discount_per_discup . '<br />';
//
?>
