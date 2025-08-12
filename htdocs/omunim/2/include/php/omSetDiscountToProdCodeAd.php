<?php
/*
 * *************************************************************************************************
 * @Description: DATABASE FILE - SET DISCOUNT TO PRODUCT CODE @AUTHOR-PRIYANKA-09NOV2020
 * *************************************************************************************************
 *
 * Created on NOV 09, 2020 12:20:00 PM 
 * *************************************************************************************************
 * @FileName: omSetDiscountToProdCodeAd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.29
 * @version: OMUNIM 2.7.29
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-09NOV2020
 *  REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
//
//print_r($_REQUEST);
//
// PANEL NAME @AUTHOR-PRIYANKA-09NOV2020
if($panelName == '' || $panelName ==  NULL) {
   $panelName = $_REQUEST['panelName'];
}
//
// UPDATE PANEL NAME @AUTHOR-PRIYANKA-09NOV2020
if($UpdatePanelName == '' || $UpdatePanelName ==  NULL) {
   $UpdatePanelName = $_REQUEST['UpdatePanelName'];
}
//
// DISCOUNT COUNT @AUTHOR-PRIYANKA-09NOV2020
if($discountCount == '' || $discountCount ==  NULL) {
   $discountCount = $_REQUEST['discountCount'];
}
//
// NO. OF DISCOUNTS @AUTHOR-PRIYANKA-09NOV2020
if($noOfDiscount == '' || $noOfDiscount ==  NULL) {
   $noOfDiscount = $_REQUEST['noOfDiscount'];
}
//
//
// COUNT @AUTHOR-PRIYANKA-09NOV2020
if($count == '' || $count ==  NULL) {
   $count = $_REQUEST['count'];
}
//
// MAIN STOCK ID @AUTHOR-PRIYANKA-09NOV2020
if($main_st_id == '' || $main_st_id ==  NULL) {
   $main_st_id = $_REQUEST['main_st_id'];
}
//
// MAIN STOCK METAL TYPE @AUTHOR-PRIYANKA-23NOV2020
if($main_st_metal_type == '' || $main_st_metal_type ==  NULL) {
   $main_st_metal_type = $_REQUEST['main_st_metal_type'];
}
//
// MAIN STOCK CATEGORY @AUTHOR-PRIYANKA-09NOV2020
if($main_st_item_category == '' || $main_st_item_category ==  NULL) {
   $main_st_item_category = $_REQUEST['main_st_item_category'];
}
//
// MAIN STOCK PURITY @AUTHOR-PRIYANKA-09NOV2020
if($main_st_purity == '' || $main_st_purity ==  NULL) {
   $main_st_purity = $_REQUEST['main_st_purity'];
}
//
// FIRM @AUTHOR-PRIYANKA-10NOV2020
if($firmName == '' || $firmName ==  NULL) {
   $firmName = $_REQUEST['firmName'];
}
//
// 
if ($count > 0) {
    $noOfDiscount = $count;
}
//
for ($i = 1; $i <= $noOfDiscount; $i++) {
        //
        // Start Code To Add Discount Table @AUTHOR-PRIYANKA-09NOV2020
        //
        // START DATE DAY @AUTHOR-PRIYANKA-09NOV2020
        if ($StartDateDay == '' || $StartDateDay == NULL) {
            $StartDateDay = $_REQUEST['discountDOBDay'. $i];
        }
        // START DATE MONTH @AUTHOR-PRIYANKA-09NOV2020
        if ($StartDateMonth == '' || $StartDateMonth == NULL) {
            $StartDateMonth = $_REQUEST['discountDOBMonth' . $i];
        }
        // START DATE YEAR @AUTHOR-PRIYANKA-09NOV2020
        if ($StartDateYear == '' || $StartDateYear == NULL) {
            $StartDateYear = $_REQUEST['discountDOBYear' . $i];
        }
        //
        // START DATE @AUTHOR-PRIYANKA-09NOV2020
        $StartDate = $StartDateDay . " " . $StartDateMonth . " " . $StartDateYear;
        //
        //
        // END DATE DAY @AUTHOR-PRIYANKA-09NOV2020
        if ($EndDateDay == '' || $EndDateDay == NULL) {
            $EndDateDay = $_REQUEST['discountEDOBDay' . $i];
        }
        // END DATE MONTH @AUTHOR-PRIYANKA-09NOV2020
        if ($EndDateMonth == '' || $EndDateMonth == NULL) {
            $EndDateMonth = $_REQUEST['discountEDOBMonth' . $i];
        }
        // END DATE YEAR @AUTHOR-PRIYANKA-09NOV2020
        if ($EndDateYear == '' || $EndDateYear == NULL) {
            $EndDateYear = $_REQUEST['discountEDOBYear' . $i];
        }
        //
        // END DATE @AUTHOR-PRIYANKA-09NOV2020
        $EndDate = $EndDateDay . " " . $EndDateMonth . " " . $EndDateYear;
        //
        //
        $sttrId = trim($_REQUEST['sttr_id' . $i]);
        $disc_product_amount = trim($_REQUEST['disc_product_amount' . $i]);
        $disc_making_discount = trim($_REQUEST['disc_making_discount' . $i]);
        $disc_stone_discount = trim($_REQUEST['disc_stone_discount' . $i]);
        $disc_product_discount = trim($_REQUEST['disc_product_discount' . $i]);
        //
        if ($_REQUEST['disc_discount_checked' . $i] == 'checked' || 
            $_REQUEST['disc_discount_checked' . $i] == 'on') {
            $disc_active = 'checked';
        } else {
            $disc_active = 'unchecked';
        }
        // 
        //
        $updateQuery = "UPDATE stock_transaction SET "
                     . "sttr_disc_start_date = '$StartDate', "
                     . "sttr_disc_end_date = '$EndDate', " 
                     . "sttr_disc_product_amount = '$disc_product_amount', "
                     . "sttr_disc_making_discount = '$disc_making_discount', "
                     . "sttr_disc_stone_discount = '$disc_stone_discount', "
                     . "sttr_disc_product_discount = '$disc_product_discount', "
                     . "sttr_disc_active = '$disc_active' "
                     . "WHERE sttr_id = '$sttrId'";
        //
        //echo '$updateQuery == ' . $updateQuery . '<br >';
        //
        if (!mysqli_query($conn, $updateQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        // End Code To Add Discount Table @AUTHOR-PRIYANKA-09NOV2020
        //
        //
        // MESSAGE DISPLAY VARIABLE @AUTHOR-PRIYANKA-10NOV2020
        $updateMsg = "ProdUpdateMsg";
        //
        //
}
header('Location: ' . $documentRoot . '/include/php/omDiscountPopUp.php?discountSubPanel=setProductDiscount&st_id=' . $main_st_id . '&st_item_category=' . $main_st_item_category . '&st_purity=' . $main_st_purity . '&st_metal_type=' . $main_st_metal_type . '&panelName=' . $panelName . '&noOfDiscount=' . $noOfDiscount . '&firmName=' . $firmName . '&updateMsg=' . $updateMsg);
?>