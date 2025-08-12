<?php
/*
 * *************************************************************************************************
 * @Description: SELL PANEL - SET DISCOUNT - PRODUCT UPDATE FILE @AUTHOR-PRIYANKA-31OCT2020
 * *************************************************************************************************
 *
 * Created on OCT 31, 2020 05:42:00 PM 
 * *************************************************************************************************
 * @FileName: omSellSetDiscountProductUp.php
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
$stockTransTodayDateFormat = date("d-m-Y");
$stockTransTodayDate = strtotime($stockTransTodayDateFormat);
//
//
// GET DETAILS OF REMAINING PRODUCTS IN SAME INVOICE @PRIYANKA-31OCT2020
$selProductDetQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "AND sttr_user_id = '$custId' AND sttr_firm_id = '$itst_firm_id' "
                    . "AND sttr_metal_type = '$itst_metal_type' "
                    . "AND sttr_indicator = 'stock' "
                    . "AND sttr_purity = '$tunch' "
                    . "AND sttr_item_category = '$itst_item_category' "
                    . "AND sttr_item_name = '$itst_item_name' "
                    . "AND sttr_pre_invoice_no = '$slPrPreInvoiceNo' AND sttr_invoice_no = '$slPrInvoiceNo' "
                    . "ORDER BY sttr_id DESC";
//
//echo '$selProductDetQuery == ' . $selProductDetQuery . '<br />';
//
$resProductDetQuery = mysqli_query($conn, $selProductDetQuery);
$noOfProductDetRows = mysqli_num_rows($resProductDetQuery);
//
//
if ($noOfProductDetRows > 0) { // NO. OF PRODUCTS @PRIYANKA-31OCT2020
    //
    while($rowProdDet = mysqli_fetch_array($resProductDetQuery)) {
        //
        //
        //echo 'disc_making_discount == ' . $disc_making_discount . '<br />';
        //echo 'disc_stone_discount == ' . $disc_stone_discount . '<br />';
        //echo 'disc_product_discount == ' . $disc_product_discount . '<br />';
        //
        //
        // **************************************************************************************************
        // **************************************************************************************************
        // DATE STR @PRIYANKA-23NOV2020
        $discStockTransDateStr = "AND (UNIX_TIMESTAMP(STR_TO_DATE(sttr_disc_start_date,'%d %b %Y')) <= '$stockTransTodayDate') "
                               . "AND ('$stockTransTodayDate' <= UNIX_TIMESTAMP(STR_TO_DATE(sttr_disc_end_date,'%d %b %Y')))";
        //
        //
        parse_str(getTableValues("SELECT sttr_disc_making_discount as stockTransDiscMakingDiscount, "
                               . "sttr_disc_stone_discount as stockTransDiscStoneDiscount, "
                               . "sttr_disc_product_discount as stockTransDiscProductDiscount "
                               . "FROM stock_transaction "
                               . "WHERE sttr_id = '$rowProdDet[sttr_sttr_id]' AND sttr_indicator IN ('stock') "
                               . "AND sttr_transaction_type != 'sell' "
                               . "AND sttr_disc_active = 'checked'  $discStockTransDateStr"));
        //
        //
        //echo '<br />';
        //echo "SELECT sttr_disc_making_discount as stockTransDiscMakingDiscount, "
        //   . "sttr_disc_stone_discount as stockTransDiscStoneDiscount, "
        //   . "sttr_disc_product_discount as stockTransDiscProductDiscount "
        //   . "FROM stock_transaction  "
        //   . "WHERE sttr_id = '$rowProdDet[sttr_sttr_id]' AND sttr_indicator IN ('stock') "
        //   . "AND sttr_transaction_type != 'sell' "
        //   . "AND sttr_disc_active = 'checked'  $discStockTransDateStr" . '<br />';
        //
        //
        //echo 'stockTransDiscMakingDiscount == ' . $stockTransDiscMakingDiscount . '<br />';
        //echo 'stockTransDiscStoneDiscount == ' . $stockTransDiscStoneDiscount . '<br />';
        //echo 'stockTransDiscProductDiscount == ' . $stockTransDiscProductDiscount . '<br />';
        //
        // **************************************************************************************************
        // **************************************************************************************************
        // 
        // 
        // **************************************************************************************************
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        // **************************************************************************************************
        //
        //
        // GET DETAILS OF STONES IN PRODUCT @PRIYANKA-31OCT2020
        $querySelStoneDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "and sttr_sttr_id = '$rowProdDet[sttr_id]' "
                              . "and sttr_indicator IN ('stockCrystal') "
                              . "and sttr_transaction_type = 'sell' and sttr_current_status NOT IN ('Deleted')"; 
        //
        //
        $resultStoneDetails = mysqli_query($conn, $querySelStoneDetails);
        $numOfStoneRows = mysqli_num_rows($resultStoneDetails);
        //
        //echo '<br/>$querySelStoneDetails == ' . $querySelStoneDetails . '<br/>';
        //
        $totalStoneValuation = 0;
        //
        while($rowStoneDetails = mysqli_fetch_array($resultStoneDetails)) {
                //
                //
                $prevStoneAmt = $rowStoneDetails['sttr_stone_amt']; // STONE AMT @PRIYANKA-31OCT2020
                //
                // **************************************************************************************************
                // **************************************************************************************************
                if ($stockTransDiscStoneDiscount != NULL && $stockTransDiscMakingDiscount != NULL &&
                    $stockTransDiscProductDiscount != NULL) {
                    $prodStoneDisc = $stockTransDiscStoneDiscount; // STOCK TRANS STONE DISCOUNT @PRIYANKA-23NOV2020
                } else {
                    $prodStoneDisc = $disc_stone_discount; // STONE DISCOUNT @PRIYANKA-31OCT2020
                }
                // **************************************************************************************************
                // **************************************************************************************************
                //
                //
                $prevStoneCGSTPer = $rowStoneDetails['sttr_tot_price_cgst_per']; // STONE CGST % @PRIYANKA-31OCT2020
                $prevStoneSGSTPer = $rowStoneDetails['sttr_tot_price_sgst_per']; // STONE SGST % @PRIYANKA-31OCT2020
                $prevStoneIGSTPer = $rowStoneDetails['sttr_tot_price_igst_per']; // STONE IGST % @PRIYANKA-31OCT2020
                //
                //
                if ($prodStoneDisc > 0) { // STONE DISCOUNT @PRIYANKA-31OCT2020
                    //
                    // CALCULATE STONE DISCOUNT AMT @PRIYANKA-31OCT2020
                    $prodStoneDiscAmt = (($prevStoneAmt * $prodStoneDisc) / 100);
                    //
                    if ($prodStoneDiscAmt > 0) {
                        // STONE VAL AFTER DISCOUNT @PRIYANKA-31OCT2020
                        $newStoneAmount = ($prevStoneAmt - $prodStoneDiscAmt);      
                        //
                    } else {
                        // STONE VAL @PRIYANKA-31OCT2020
                        $newStoneAmount = $rowStoneDetails['sttr_valuation'];
                        //
                    }
                    //
                } else {
                    //
                    $prodStoneDisc = $rowStoneDetails['sttr_stone_discount_per']; // STONE DISCOUNT @PRIYANKA-31OCT2020
                    $prodStoneDiscAmt = $rowStoneDetails['sttr_stone_discount_amt']; // STONE DISC AMT @PRIYANKA-31OCT2020  
                    $newStoneAmount = $rowStoneDetails['sttr_valuation']; // STONE VAL @PRIYANKA-31OCT2020
                    //
                }
                //
                // CALCULATE STONE CGST AMT @PRIYANKA-31OCT2020
                if ($prevStoneCGSTPer > 0) {
                    $newStoneCGSTAmt = (($newStoneAmount * $prevStoneCGSTPer) / 100);
                } else {
                    $newStoneCGSTAmt = $rowStoneDetails['sttr_tot_price_cgst_chrg'];
                }
                //
                // CALCULATE STONE SGST AMT @PRIYANKA-31OCT2020
                if ($prevStoneSGSTPer > 0) {
                    $newStoneSGSTAmt = (($newStoneAmount * $prevStoneSGSTPer) / 100);
                } else {
                    $newStoneSGSTAmt = $rowStoneDetails['sttr_tot_price_sgst_chrg'];
                }
                //
                // CALCULATE STONE IGST AMT @PRIYANKA-31OCT2020
                if ($prevStoneIGSTPer > 0) {
                    $newStoneIGSTAmt = (($newStoneAmount * $prevStoneIGSTPer) / 100);
                } else {
                    $newStoneIGSTAmt = $rowStoneDetails['sttr_tot_price_igst_chrg'];
                }
                //
                //
                // TOTAL STONE GST AMT @PRIYANKA-31OCT2020
                $totalStoneGSTAmount = ($newStoneCGSTAmt + $newStoneSGSTAmt + $newStoneIGSTAmt);
                //
                // FINAL STONE VALUATION @PRIYANKA-31OCT2020
                $newFinalStoneVal = ($newStoneAmount + $totalStoneGSTAmount);
                //
                //
                if ($prodStoneDisc > 0) { // STONE DISCOUNT @PRIYANKA-31OCT2020
                    //
                    // UPDATE STONE ENTRY @PRIYANKA-31OCT2020
                    $updateStoneQuery = "UPDATE stock_transaction SET "
                                      . "sttr_stone_discount_per = '$prodStoneDisc', sttr_stone_discount_amt = '$prodStoneDiscAmt', "
                                      . "sttr_valuation = '$newStoneAmount', "
                                      . "sttr_tot_price_cgst_chrg = '$newStoneCGSTAmt', "
                                      . "sttr_tot_price_sgst_chrg = '$newStoneSGSTAmt', "
                                      . "sttr_tot_price_igst_chrg = '$newStoneIGSTAmt', "
                                      . "sttr_tot_tax = '$totalStoneGSTAmount', "
                                      . "sttr_final_valuation = '$newFinalStoneVal' "
                                      . "WHERE sttr_id = '$rowStoneDetails[sttr_id]' AND sttr_owner_id = '$sessionOwnerId' "
                                      . "AND sttr_indicator = 'stockCrystal' AND sttr_transaction_type = 'sell'";
                    //
                    if (!mysqli_query($conn, $updateStoneQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                    //
                    //
                }
                // 
                // SUM OF ALL FINAL STONE VALUATION @PRIYANKA-31OCT2020
                $totalStoneValuation += ($newFinalStoneVal);
                //
                //
        }
        //
        //
        // **************************************************************************************************
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        // **************************************************************************************************
        //
        //
        $prevTotalMakingAmt = $rowProdDet['sttr_total_making_amt']; // MAKING CHARGES @PRIYANKA-31OCT2020
        //
        // **************************************************************************************************
        // **************************************************************************************************
        if ($stockTransDiscStoneDiscount != NULL && $stockTransDiscMakingDiscount != NULL &&
            $stockTransDiscProductDiscount != NULL) {
            $prodMakingDisc = $stockTransDiscMakingDiscount; // STOCK TRANS MAKING DISCOUNT @PRIYANKA-23NOV2020    
        } else {
            $prodMakingDisc = $disc_making_discount; // MAKING DISCOUNT @PRIYANKA-31OCT2020    
        }   
        // **************************************************************************************************
        // **************************************************************************************************
        //
        //
        if ($prodMakingDisc > 0) { // MAKING DISCOUNT @PRIYANKA-31OCT2020 
            //
            // CALCULATE MKG DISCOUNT AMT @PRIYANKA-31OCT2020
            $prodMakingDiscAmt = (($prevTotalMakingAmt * $prodMakingDisc) / 100);
            //
            if ($prodMakingDiscAmt > 0) {
                // TOTAL MKG CHARGES AFTER DISCOUNT @PRIYANKA-31OCT2020
                $newTotalMakingCharges = round(($prevTotalMakingAmt - $prodMakingDiscAmt));      
                //
            } else {
                // TOTAL MKG CHARGES @PRIYANKA-31OCT2020
                $newTotalMakingCharges = $rowProdDet['sttr_total_making_charges'];      
                //
            }
            //
        } else {
            //
            $prodMakingDisc = $rowProdDet['sttr_mkg_discount_per']; // MAKING DISCOUNT @PRIYANKA-31OCT2020 
            $prodMakingDiscAmt = $rowProdDet['sttr_mkg_discount_amt']; // MAKING DISC AMT @PRIYANKA-31OCT2020 
            $newTotalMakingCharges = $rowProdDet['sttr_total_making_charges']; // TOT MKG CHRGS @PRIYANKA-31OCT2020 
            //
        }
        //
        //
        $prevMkgCGSTPer = $rowProdDet['sttr_mkg_cgst_per']; // MKG CGST % @PRIYANKA-31OCT2020
        $prevMkgSGSTPer = $rowProdDet['sttr_mkg_sgst_per']; // MKF SGST % @PRIYANKA-31OCT2020
        $prevMkgIGSTPer = $rowProdDet['sttr_mkg_igst_per']; // MKG IGST % @PRIYANKA-31OCT2020
        //
        //
        // CALCULATE MKG CGST AMT @PRIYANKA-31OCT2020
        if ($prevMkgCGSTPer > 0) {
            $newMkgCGSTAmt = (($newTotalMakingCharges * $prevMkgCGSTPer) / 100);
        } else {
            $newMkgCGSTAmt = $rowProdDet['sttr_mkg_cgst_chrg'];
        }
        //
        // CALCULATE MKG SGST AMT @PRIYANKA-31OCT2020
        if ($prevMkgSGSTPer > 0) {
            $newMkgSGSTAmt = (($newTotalMakingCharges * $prevMkgSGSTPer) / 100);
        } else {
            $newMkgSGSTAmt = $rowProdDet['sttr_mkg_sgst_chrg'];
        }
        //
        // CALCULATE MKG IGST AMT @PRIYANKA-31OCT2020
        if ($prevMkgIGSTPer > 0) {
            $newMkgIGSTAmt = (($newTotalMakingCharges * $prevMkgIGSTPer) / 100);
        } else {
            $newMkgIGSTAmt = $rowProdDet['sttr_mkg_igst_chrg'];
        }
        //
        // TOTAL MKG GST AMT @PRIYANKA-31OCT2020
        $totalMkgGSTAmount = ($newMkgCGSTAmt + $newMkgSGSTAmt + $newMkgIGSTAmt);
        //
        //
        // **************************************************************************************************
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        // **************************************************************************************************
        //
        //
        $prevMetalAmt = $rowProdDet['sttr_metal_amt']; // METAL AMOUNT @PRIYANKA-31OCT2020 
        //
        // **************************************************************************************************
        // **************************************************************************************************
        if ($stockTransDiscStoneDiscount != NULL && $stockTransDiscMakingDiscount != NULL &&
            $stockTransDiscProductDiscount != NULL) {
            $prodDisc = $stockTransDiscProductDiscount;  // STOCK TRANS PRODUCT DISCOUNT @PRIYANKA-23NOV2020 
        } else {
            $prodDisc = $disc_product_discount;  // PRODUCT DISCOUNT @PRIYANKA-31OCT2020 
        }
        // **************************************************************************************************
        // **************************************************************************************************
        //
        //
        //
        if ($prodDisc > 0) { // PRODUCT DISCOUNT @PRIYANKA-31OCT2020 
            //
            // CALCULATE METAL DISCOUNT AMT @PRIYANKA-31OCT2020
            $prodMetalDiscAmt = (($prevMetalAmt * $prodDisc) / 100);
            //
            if ($prodMetalDiscAmt > 0) {
                // PRODUCT VAL AFTER DISCOUNT @PRIYANKA-31OCT2020
                $newProdTotalAmount = round(($prevMetalAmt - $prodMetalDiscAmt));      
                //
            } else {
                // PRODUCT VAL @PRIYANKA-31OCT2020
                $newProdTotalAmount = $rowProdDet['sttr_valuation'];    
                //
            }
            //
        } else {
            //
            $prodDisc = $rowProdDet['sttr_metal_discount_per']; // PRODUCT DISCOUNT @PRIYANKA-31OCT2020 
            $prodMetalDiscAmt = $rowProdDet['sttr_metal_discount_amt']; // PROD DISC AMT @PRIYANKA-31OCT2020 
            $newProdTotalAmount = $rowProdDet['sttr_valuation']; // PRODUCT VAL @PRIYANKA-31OCT2020 
            //
        }
        //
        //
        $prevProdCGSTPer = $rowProdDet['sttr_tot_price_cgst_per']; // PROD CGST % @PRIYANKA-31OCT2020
        $prevProdSGSTPer = $rowProdDet['sttr_tot_price_sgst_per']; // PROD SGST % @PRIYANKA-31OCT2020
        $prevProdIGSTPer = $rowProdDet['sttr_tot_price_igst_per']; // PROD IGST % @PRIYANKA-31OCT2020
        //
        //
        // CALCULATE PROD CGST AMT @PRIYANKA-31OCT2020
        if ($prevProdCGSTPer > 0) {
            $newProdCGSTAmt = (($newProdTotalAmount * $prevProdCGSTPer) / 100);
        } else {
            $newProdCGSTAmt = $rowProdDet['sttr_tot_price_cgst_chrg'];
        }
        //
        // CALCULATE PROD SGST AMT @PRIYANKA-31OCT2020
        if ($prevProdSGSTPer > 0) {
            $newProdSGSTAmt = (($newProdTotalAmount * $prevProdSGSTPer) / 100);
        } else {
            $newProdSGSTAmt = $rowProdDet['sttr_tot_price_sgst_chrg'];
        }
        //
        // CALCULATE PROD IGST AMT @PRIYANKA-31OCT2020
        if ($prevProdIGSTPer > 0) {
            $newProdIGSTAmt = (($newProdTotalAmount * $prevProdIGSTPer) / 100);
        } else {
            $newProdIGSTAmt = $rowProdDet['sttr_tot_price_igst_chrg'];
        }
        //
        // TOTAL PROD CUST PRICE @PRIYANKA-31OCT2020
        $totalProdCustPrice = ($newProdTotalAmount + $newTotalMakingCharges);
        //
        // TOTAL PROD GST AMT @PRIYANKA-31OCT2020
        $totalProdGSTAmount = ($newProdCGSTAmt + $newProdSGSTAmt + $newProdIGSTAmt);
        //
        // TOTAL PRODUCT GST AMOUNT @PRIYANKA-31OCT2020
        $totalProductGSTAmount = ($totalProdGSTAmount + $totalMkgGSTAmount);
        //
        // PRODUCT FINAL VALUATION @PRIYANKA-31OCT2020
        $newProdFinalValuation = ($newProdTotalAmount + $newTotalMakingCharges + $totalStoneValuation + $totalProductGSTAmount);
        //
        //
        // **************************************************************************************************
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        // **************************************************************************************************
        // 
        //
        // IF PRODUCT / MAKING / STONE DISCOUNT APPLIED @PRIYANKA-31OCT2020
        if (($prodDisc > 0) || ($prodMakingDisc > 0) || ($prodStoneDisc > 0)) {
            //
            // UPDATE PRODUCT DISCOUNT QUERY @PRIYANKA-31OCT2020
            $updateProdDetQuery = "UPDATE stock_transaction SET "
                                . "sttr_mkg_discount_per = '$prodMakingDisc', sttr_mkg_discount_amt = '$prodMakingDiscAmt', "
                                . "sttr_total_making_charges = '$newTotalMakingCharges', "
                                . "sttr_metal_discount_per = '$prodDisc', sttr_metal_discount_amt = '$prodMetalDiscAmt', "
                                . "sttr_valuation = '$newProdTotalAmount', "
                                . "sttr_total_cust_price = '$totalProdCustPrice', "
                                . "sttr_mkg_cgst_chrg = '$newMkgCGSTAmt', "
                                . "sttr_mkg_sgst_chrg = '$newMkgSGSTAmt', "
                                . "sttr_mkg_igst_chrg = '$newMkgIGSTAmt', "
                                . "sttr_tot_price_cgst_chrg = '$newProdCGSTAmt', "
                                . "sttr_tot_price_sgst_chrg = '$newProdSGSTAmt', "
                                . "sttr_tot_price_igst_chrg = '$newProdIGSTAmt', "
                                . "sttr_tot_tax = '$totalProductGSTAmount', "
                                . "sttr_stone_valuation = '$totalStoneValuation', "
                                . "sttr_final_valuation = '$newProdFinalValuation' "
                                . "WHERE sttr_id = '$rowProdDet[sttr_id]' AND sttr_owner_id = '$sessionOwnerId' "
                                . "AND sttr_metal_type = '$itst_metal_type' "
                                . "AND sttr_indicator = 'stock' AND sttr_transaction_type = 'sell' "
                                . "AND sttr_pre_invoice_no = '$slPrPreInvoiceNo' AND sttr_invoice_no = '$slPrInvoiceNo'";
            //
            if (!mysqli_query($conn, $updateProdDetQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
        //
        //echo '$prodDisc == ' . $prodDisc . '<br />';
        //echo '$prodMakingDisc == ' . $prodMakingDisc . '<br />';
        //echo '$prodStoneDisc == ' . $prodStoneDisc . '<br />';
        //
        //
    }
}
//
//
// SET PRODUCT DISCOUNT TO SCANNED PRODUCT IN SELL FORM @PRIYANKA-10NOV2020
if ($finalProductValuation > $disc_product_amount) {
    // 
    // MAKING DISCOUNT @PRIYANKA-10NOV2020
    if ($disc_making_discount > 0) {
        $sttr_mkg_discount_per = $disc_making_discount;
    }
    //
    // PRODUCT DISCOUNT @PRIYANKA-10NOV2020
    if ($disc_product_discount > 0) {
        $sttr_metal_discount_per = $disc_product_discount;
    }
    //
}
//
//
?>