<?php
/*
 * *************************************************************************************************
 * @Description: SELL PANEL - SET PRODUCT DISCOUNT FILE @AUTHOR-PRIYANKA-31OCT2020
 * *************************************************************************************************
 *
 * Created on OCT 31, 2020 11:57:00 AM 
 * *************************************************************************************************
 * @FileName: omSellSetDiscount.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.25
 * @version: OMUNIM 2.7.25
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-31OCT2020
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
// GET SCANNED PRODUCT FINAL VALUATION @PRIYANKA-31OCT2020
$scanProdValuation = getFinalProductVal($slPrId);
//
//
//echo '$scanProdValuation == ' . $scanProdValuation . '<br />';
//
// GET SUM OF FINAL VALUATION OF REMAINING PRODUCTS IN SAME INVOICE @PRIYANKA-31OCT2020
$selProductQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                 . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$itst_firm_id' "
                 . "AND sttr_metal_type = '$itst_metal_type' AND sttr_indicator = 'stock' "
                 . "AND sttr_purity = '$tunch' "
                 . "AND sttr_item_category = '$itst_item_category' "
                 . "AND sttr_item_name = '$itst_item_name' "
                 . "AND sttr_pre_invoice_no = '$slPrPreInvoiceNo' AND sttr_invoice_no = '$slPrInvoiceNo' "
                 . "AND sttr_status = 'PaymentPending' "
                 . "ORDER BY sttr_id DESC";
//
//echo '$selProductQuery == ' . $selProductQuery . '<br />';
//
$resProductQuery = mysqli_query($conn, $selProductQuery);
$noOfProductRows = mysqli_num_rows($resProductQuery);
//
//
if ($noOfProductRows > 0) {
    //
    $sumOfPrevProdValuation = 0;
    //
    while ($rowProductQueryDet = mysqli_fetch_array($resProductQuery)) {
          //
          // PRODUCT VALUATION @PRIYANKA-31OCT2020
          if ($noOfCry > 0 && ($rowProductQueryDet['sttr_stone_valuation'] > 0)) {
              $sumOfPrevProdValuation += $rowProductQueryDet['sttr_final_valuation'];
          }
          //
          if (($noOfCry == 0 || $noOfCry == '' || $noOfCry == NULL) && 
              ($rowProductQueryDet['sttr_stone_valuation'] == 0 || 
               $rowProductQueryDet['sttr_stone_valuation'] == NULL || 
               $rowProductQueryDet['sttr_stone_valuation'] == '')) {
               $sumOfPrevProdValuation += $rowProductQueryDet['sttr_final_valuation'];
          }
          //
    }
}
//
//
//echo '$sumOfPrevProdValuation == ' . $sumOfPrevProdValuation . '<br />';
//
//
// GET INVOICE FINAL VALUATION @PRIYANKA-06NOV2020
parse_str(getTableValues("SELECT sum(sttr_final_valuation) as finalInvoiceValuation "
                       . "FROM stock_transaction "
                       . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                       . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$itst_firm_id' "
                       . "AND sttr_indicator = 'stock' "
                       . "AND sttr_pre_invoice_no = '$slPrPreInvoiceNo' AND sttr_invoice_no = '$slPrInvoiceNo' "
                       . "AND sttr_status = 'PaymentPending'"));
//
//
//echo '$finalInvoiceValuation == ' . $finalInvoiceValuation . '<br />';
//
//
// SUM OF ALL SAME PRODUCT TYPE VALUATION IN SAME INVOICE @PRIYANKA-31OCT2020
$finalProductValuation = ($scanProdValuation + $sumOfPrevProdValuation);
//
//echo '$finalProductValuation == ' . $finalProductValuation . '<br />';
//
//
// GET STOCK ID @PRIYANKA-30OCT2020
parse_str(getTableValues("SELECT st_id as stockId FROM stock WHERE "
                       . "st_item_category = '$itst_item_category' AND st_item_name = '$itst_item_name' "
                       . "AND st_owner_id = '$_SESSION[sessionOwnerId]' AND st_firm_id = '$itst_firm_id' "
                       . "AND st_type = 'stock' AND st_metal_type = '$itst_metal_type' "
                       . "AND st_purity = '$slpr_tunch' "
                       . "AND ((st_quantity > 0) OR (st_gs_weight > 0)) ORDER BY st_id DESC LIMIT 0,1"));
//
//echo "SELECT st_id as stockId FROM stock WHERE "
//   . "st_item_category = '$itst_item_category' AND st_item_name = '$itst_item_name' "
//   . "AND st_owner_id = '$_SESSION[sessionOwnerId]' AND st_firm_id = '$itst_firm_id' "
//   . "AND st_type = 'stock' AND st_metal_type = '$itst_metal_type' "
//   . "AND st_purity = '$slpr_tunch' "
//   . "AND ((st_quantity > 0) OR (st_gs_weight > 0)) ORDER BY st_id DESC LIMIT 0,1" . '<br />';
//
//
// TODAY DATE @PRIYANKA-30OCT2020
$todayDateFormat = date("d-m-Y");
$todayDate = strtotime($todayDateFormat);
//
//
//echo '$todayDateFormat == ' . $todayDateFormat . '<br />';
//echo '$todayDate == ' . $todayDate . '<br />';
//
//
// DATE STR @PRIYANKA-30OCT2020
$discDateStr = "AND (UNIX_TIMESTAMP(STR_TO_DATE(disc_start_date,'%d %b %Y')) <= '$todayDate') "
             . "AND ('$todayDate' <= UNIX_TIMESTAMP(STR_TO_DATE(disc_end_date,'%d %b %Y')))";
//
//
//echo '$discDateStr == ' . $discDateStr . '<br />';
//
//
// TO CHECK DISCOUNT OPTIONS @PRIYANKA-30OCT2020
$selDiscountQuery = "SELECT * FROM discount WHERE disc_owner_id = '$_SESSION[sessionOwnerId]' "
                  . "AND disc_st_id = '$stockId' AND disc_firm_id = '$itst_firm_id' "
                  . "AND disc_active = 'checked' "
                  . "AND disc_panel_name = 'ProductDiscountPanel' $discDateStr "
                  . "ORDER BY disc_id DESC LIMIT 0,1";
//
//echo '$selDiscountQuery == ' . $selDiscountQuery . '<br />';
//
$resDiscountQuery = mysqli_query($conn, $selDiscountQuery);
$noOfDiscountRows = mysqli_num_rows($resDiscountQuery);
//
if ($noOfDiscountRows > 0) {
        //
        $rowDiscQueryDet = mysqli_fetch_array($resDiscountQuery);
        //
        // DISCOUNT PRODUCT AMOUNT @PRIYANKA-31OCT2020
        $disc_product_amount = $rowDiscQueryDet['disc_product_amount'];
        //
        // MAKING DISCOUNT @PRIYANKA-31OCT2020
        $disc_making_discount = $rowDiscQueryDet['disc_making_discount'];
        //
        // STONE DISCOUNT @PRIYANKA-31OCT2020
        $disc_stone_discount = $rowDiscQueryDet['disc_stone_discount'];
        //
        // PRODUCT DISCOUNT @PRIYANKA-31OCT2020
        $disc_product_discount = $rowDiscQueryDet['disc_product_discount'];
        //
        // DISCOUNT START DATE AND END DATE @PRIYANKA-31OCT2020
        $disc_start_date = $rowDiscQueryDet['disc_start_date'];
        $disc_end_date = $rowDiscQueryDet['disc_end_date'];
        //
        // DISCOUNT PRODUCT CHECK @PRIYANKA-31OCT2020
        $disc_product_check = $rowDiscQueryDet['disc_product_check'];
        //
        // DISCOUNT CHECK @PRIYANKA-31OCT2020
        $disc_discount_check = $rowDiscQueryDet['disc_discount_check'];
        //
        // DISCOUNT ADJUST @PRIYANKA-31OCT2020
        $disc_discount_adjust = $rowDiscQueryDet['disc_discount_adjust'];
        //
}
//
//
//echo '$disc_making_discount == ' . $disc_making_discount . '<br />';
//echo '$disc_stone_discount == ' . $disc_stone_discount . '<br />';
//echo '$disc_product_discount == ' . $disc_product_discount . '<br />';
//
//
//echo '$disc_start_date == ' . $disc_start_date . '<br />';
//echo '$disc_end_date == ' . $disc_end_date . '<br />';
//
//
//echo '$sttr_disc_start_date == ' . $sttr_disc_start_date . '<br />';
//echo '$sttr_disc_end_date == ' . $sttr_disc_end_date . '<br />';
//echo '$sttr_disc_product_amount == ' . $sttr_disc_product_amount . '<br />';
//echo '$sttr_disc_making_discount == ' . $sttr_disc_making_discount . '<br />';
//echo '$sttr_disc_stone_discount == ' . $sttr_disc_stone_discount . '<br />';
//echo '$sttr_disc_product_discount == ' . $sttr_disc_product_discount . '<br />';
//echo '$sttr_disc_active == ' . $sttr_disc_active . '<br />';
//
//      
// STOCK TRANS PRODUCT WISE DISCOUNTS (stock_transaction) @PRIYANKA-10NOV2020
if ($sttr_disc_active == 'checked') {
    //
    //
    //
    // SET STOCK TRANS DISCOUNTS @PRIYANKA-23NOV2020
    if ($sttr_disc_product_discount != NULL && $sttr_disc_making_discount != NULL &&
        $sttr_disc_stone_discount != NULL) {
        //
        $disc_product_amount = $sttr_disc_product_amount;
        //
        $disc_making_discount = $sttr_disc_making_discount;
        //
        $disc_stone_discount = $sttr_disc_stone_discount;
        //
        $disc_product_discount = $sttr_disc_product_discount;
        //
        $disc_start_date = $sttr_disc_start_date;
        //
        $disc_end_date = $sttr_disc_end_date;
        // 
        // MAKING DISCOUNT @PRIYANKA-05NOV2022
        if ($disc_making_discount > 0) {
            $sttr_mkg_discount_per = $disc_making_discount;
        }
        //
        // PRODUCT DISCOUNT @PRIYANKA-05NOV2022
        if ($disc_product_discount > 0) {
            $sttr_metal_discount_per = $disc_product_discount;
        }
        //
        // STONE DISCOUNT @PRIYANKA-05NOV2022
        if ($disc_stone_discount > 0) {
            $sttr_stone_discount_per = $disc_stone_discount;
        }
        //
        //
    }
    //
    //
    //
    // FOR PRODUCT DISCOUNT @PRIYANKA-05NOV2022
    if ($sttr_disc_product_discount != NULL) {
        //
        $disc_product_discount = $sttr_disc_product_discount;
        //
        $disc_start_date = $sttr_disc_start_date;
        //
        $disc_end_date = $sttr_disc_end_date;
        //
        // PRODUCT DISCOUNT @PRIYANKA-05NOV2022
        if ($disc_product_discount > 0) {
            $sttr_metal_discount_per = $disc_product_discount;
        }
        //
        //
    }
    //
    //
    //
    // FOR MAKING DISCOUNT @PRIYANKA-05NOV2022
    if ($sttr_disc_making_discount != NULL) {
        //
        $disc_making_discount = $sttr_disc_making_discount;
        //
        $disc_start_date = $sttr_disc_start_date;
        //
        $disc_end_date = $sttr_disc_end_date;
        //
        // 
        // MAKING DISCOUNT @PRIYANKA-05NOV2022 
        if ($disc_making_discount > 0) {
            $sttr_mkg_discount_per = $disc_making_discount;
        }
        //
        //
    }
    //
    //
    //
    // FOR STONE DISCOUNT @PRIYANKA-05NOV2022
    if ($sttr_disc_stone_discount != NULL) {
        //
        $disc_stone_discount = $sttr_disc_stone_discount;
        //
        $disc_start_date = $sttr_disc_start_date;
        //
        $disc_end_date = $sttr_disc_end_date;
        //
        // STONE DISCOUNT @PRIYANKA-05NOV2022 
        if ($disc_stone_discount > 0) {
            $sttr_stone_discount_per = $disc_stone_discount;
        }
        //
        //
    }
    //
    //
    //
    // FOR PRODUCT AMOUNT @PRIYANKA-05NOV2022
    if ($sttr_disc_product_amount != NULL) {
        //
        $disc_product_amount = $sttr_disc_product_amount;
        //        
        $disc_start_date = $sttr_disc_start_date;
        //
        $disc_end_date = $sttr_disc_end_date;
        //
        //
    }
    //
    //
    //
    //
    //echo '$disc_making_discount == ' . $disc_making_discount . '<br />';
    //echo '$disc_stone_discount == ' . $disc_stone_discount . '<br />';
    //echo '$disc_product_discount == ' . $disc_product_discount . '<br />';
    //
    //echo '$sttr_mkg_discount_per == ' . $sttr_mkg_discount_per . '<br />';
    //echo '$sttr_metal_discount_per == ' . $sttr_metal_discount_per . '<br />';
    //echo '$sttr_stone_discount_per == ' . $sttr_stone_discount_per . '<br />';
    //
    //
    //
    //
    $discStartDateStr = strtotime($disc_start_date);
    $discEndDateStr = strtotime($disc_end_date);
    //
    //
    //echo '$todayDate == ' . $todayDate . '<br />';
    //echo '$todayDateFormat == ' . $todayDateFormat . '<br />';
    //
    //echo '$disc_start_date == ' . $disc_start_date . '<br />';
    //echo '$disc_end_date == ' . $disc_end_date . '<br />';
    //
    //echo '$discStartDateStr == ' . $discStartDateStr . '<br />';
    //echo '$discEndDateStr == ' . $discEndDateStr . '<br />';
    //
    //
    if ($ProductDiscountOnOff == 'OFF') {
        //
        // PRODUCT DISCOUNT @PRIYANKA-05SEP2023
        $disc_product_discount = 0;
        $sttr_metal_discount_per = 0;
        //
        // STONE DISCOUNT @PRIYANKA-05SEP2023
        $disc_stone_discount = 0;
        $sttr_stone_discount_per = 0;
        //
        //
        $disc_product_amount = 0;
        $sttr_disc_product_amount = 0;
        //
    }
    //
    //
    if ($MkgDiscountOnOff == 'OFF') {
        //
        // MAKING DISCOUNT @PRIYANKA-05SEP2023
        $disc_making_discount = 0;
        $sttr_mkg_discount_per = 0;
        //
    }
    //
    //
    if ($discEndDateStr < $todayDate) {
        //
        // MAKING DISCOUNT @PRIYANKA-04SEP2023
        $disc_making_discount = 0;
        $sttr_mkg_discount_per = 0;
        //
        // STONE DISCOUNT @PRIYANKA-04SEP2023
        $disc_stone_discount = 0;
        $sttr_stone_discount_per = 0;
        //
        // PRODUCT DISCOUNT @PRIYANKA-04SEP2023
        $disc_product_discount = 0;
        $sttr_metal_discount_per = 0;
        //
        //
        $disc_product_amount = 0;
        $sttr_disc_product_amount = 0;
        //
    }
    //
    //
    //echo '$disc_making_discount == ' . $disc_making_discount . '<br />';
    //echo '$disc_stone_discount == ' . $disc_stone_discount . '<br />';
    //echo '$disc_product_discount == ' . $disc_product_discount . '<br />';
    //
    //echo '$sttr_mkg_discount_per == ' . $sttr_mkg_discount_per . '<br />';
    //echo '$sttr_metal_discount_per == ' . $sttr_metal_discount_per . '<br />';
    //echo '$sttr_stone_discount_per == ' . $sttr_stone_discount_per . '<br />';
    //
    //
}
?>
