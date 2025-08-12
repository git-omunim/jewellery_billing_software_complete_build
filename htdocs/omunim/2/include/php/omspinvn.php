<?php
/*
 * **************************************************************************************
 * @tutorial: SELL METAL FORM B2 - PRODUCT DETAILS DIV FILE @PRIYANKA-08MAR2021
 * **************************************************************************************
 * 
 * Created on MARCH 08, 2021 02:30:00 PM
 *
 * @FileName: omspinvn.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-08MAR2021
 *  REASON:
 *
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
?>
<?php
//
if ($panelName != 'SellValues') {
    $panel = 'ItemSell';
}
//
if ($utin_othr_chgs_by == '') {
    $utin_othr_chgs_by = $_GET['otherChgsBy'];
}
//
if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'SellPayUp' ||
        $sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp' ||
        $sellPanelName == 'finalOrderUp') {
    //
    parse_str(getTableValues("SELECT utin_othr_chgs_by,utin_id FROM user_transaction_invoice "
                    . "WHERE utin_pre_invoice_no='$slPrPreInvoiceNo' AND utin_invoice_no='$slPrInvoiceNo'"));
    //
    if ($utin_othr_chgs_by == '')
        $utin_othr_chgs_by = $utin_othr_chgs_by;
    //
}
//
$makeInvoiceflag = false;
$submitApprovalflag = true;
//
$makeInvoiceCount = 0;
$submitApprovalCount = 0;
//
$counter = 1;
$totalItemsQTY = 0;
$totalValuation = 0;
$totalFinalBalance = 0;
$goldTotGrossWt = 0;
$goldTotGrossWtType = 'GM';
$goldTotNetWt = 0;
$goldTotNetWtType = 'GM';
$goldTotFFineWt = 0;
$silverTotGrossWt = 0;
$silverTotGrossWtType = 'GM';
$silverTotNetWt = 0;
$silverTotNetWtType = 'GM';
$silverTotFFineWt = 0;
$totalCrystalVal = 0;
$itemReturnVal = 0;
$totalAmnt = 0;
$totalMetalAmnt = 0;
$totaltax = 0;
$goldFinalVal = 0;
$silverFinalVal = 0;
$goldQty = 0;
$silverQty = 0;
$goldOthChagsWeightType = 'GM';
$silverOthChagsWeightType = 'GM';
$silverTotFFineWtType = 'GM';
$goldTotFFineWtType = 'GM';
$goldOthChagsWeight = 0;
$silverOthChagsWeight = 0;
$totalOthGdChgs = 0;
$totalOthSlChgs = 0;
$slPrProfitNLossAmt = 0;
$totalPurPrice = 0;
$goldItemCount = 0;
$silverItemCount = 0;
$payGoldTotFinalBalance = 0;
$paySilverTotFinalBalance = 0;
$payTotalOtherCharges = 0;
$payTotalTaxAmt = 0;
$totalLabOrMkgCharges = 0;
$totalTaxAmount = 0;
$payGoldCrystalAmt = 0;
$paySilverCrystalAmt = 0;
$totalGoldPurPrice = 0;
$totalSilverPurPrice = 0;
$totMakingCharge = 0;
$utin_oth_chgs_amt = 0;
$totalMakingCharges = 0;
$valueAdded = 0;
// Variable for Total: Gold, Silver, Stone Qty.  @AMRUTA10JUNE2022
$totalGoldQTY = 0;
$totalSilverQTY = 0;
$totalCrystalQTY = 0;
//
$slPrIdStr = "";
$slPrItemNameStr = "";
while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
    //
    $slPrId = $rowSlPrItemDetails['sttr_id'];
    $custId = $rowSlPrItemDetails['sttr_user_id'];
    $slPrItemPreId = $rowSlPrItemDetails['sttr_item_pre_id'];
    $slPrItemPostId = $rowSlPrItemDetails['sttr_item_id'];
    $slPrPreInvoiceNo = $rowSlPrItemDetails['sttr_pre_invoice_no'];
    $slPrInvoiceNo = $rowSlPrItemDetails['sttr_invoice_no'];
    $firmId = $rowSlPrItemDetails['sttr_firm_id'];
    $slPrItemMetal = $rowSlPrItemDetails['sttr_metal_type'];
    $slPrItemName = $rowSlPrItemDetails['sttr_item_name'];
    $slPrItemCryName = $rowSlPrItemDetails['stsl_crystal_name'];
    $slPrItemQTY = $rowSlPrItemDetails['sttr_quantity'];
    $slPrItemGSW = $rowSlPrItemDetails['sttr_gs_weight'];
    $slPrItemGSWT = $rowSlPrItemDetails['sttr_gs_weight_type'];
    $slPrItemNTW = $rowSlPrItemDetails['sttr_nt_weight'];
    $slPrItemNTWT = $rowSlPrItemDetails['sttr_nt_weight_type'];
    $slPrItemTunch = $rowSlPrItemDetails['sttr_purity'];
    $slPrItemWastage = $rowSlPrItemDetails['sttr_wastage'];
    $slPrItemFinTunch = $rowSlPrItemDetails['sttr_final_purity'];
    $sttr_cust_wastage = $rowSlPrItemDetails['sttr_cust_wastage'];
    $slPrItemFinWt = $rowSlPrItemDetails['sttr_fine_weight'];
    $slPrItemFFineWt = $rowSlPrItemDetails['sttr_final_fine_weight'];
    $slPrItemMetalRate = $rowSlPrItemDetails['sttr_metal_rate'];
    $slPrItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'];
    $slPrItemLabChrgType = $rowSlPrItemDetails['sttr_making_charges_type'];
    // CODE ADDED FOR GOLD, SILVER, STONE QTY. @AMRUTA-10JUNE2022
    if ($rowSlPrItemDetails['sttr_metal_type'] == 'Gold' || $rowSlPrItemDetails['sttr_metal_type'] == 'GOLD') {
        $slGdQTY = $rowSlPrItemDetails['sttr_quantity'];
        $totalGoldQTY += $slGdQTY;
//        echo 'slGdQTY:' . "" . $slGdQTY;
//        echo '<br>';
    } else if ($rowSlPrItemDetails['sttr_metal_type'] == 'Silver' || $rowSlPrItemDetails['sttr_metal_type'] == 'SILVER') {
        $slSlQTY = $rowSlPrItemDetails['sttr_quantity'];
        $totalSilverQTY += $slSlQTY;
//        echo 'slSlQTY:' . "" . $slSlQTY;
//        echo '<br>';
    } else if ($rowSlPrItemDetails['sttr_metal_type'] == 'Crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'CRYSTAL') {
        $slStQTY = $rowSlPrItemDetails['sttr_quantity'];
        $totalCrystalQTY += $slStQTY;
//        echo 'slStQTY:' . "" . $slStQTY;
//        echo '<br>';
    }
    // CODE ADDED FOR OTHER CHARGES @PRIYANKA-12OCT2018
    $sttr_other_charges = $rowSlPrItemDetails['sttr_other_charges'];
    $sttr_other_charges_type = $rowSlPrItemDetails['sttr_other_charges_type'];
    //
    $slPrItemTotTax = $rowSlPrItemDetails['sttr_tot_tax'];
    $slPrItemValuation = $rowSlPrItemDetails['sttr_valuation'];
    $sttr_tot_tax = $rowSlPrItemDetails['sttr_tot_tax']; // TOTAL TAX 
    $sttr_transaction_type = $rowSlPrItemDetails['sttr_transaction_type'];

    $sttr_metal_amt = $rowSlPrItemDetails['sttr_metal_amt'];
    $sttr_metal_discount_amt = $rowSlPrItemDetails['sttr_metal_discount_amt'];
    $sttr_mkg_discount_amt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];

    //echo '$sttr_transaction_type **== '.$sttr_transaction_type;

    if ($slPrItemValuation > 0) {
        $slPrItemValuation = ($slPrItemValuation);
    }

    $sttr_status = $rowSlPrItemDetails['sttr_status'];
    $slPrCryValuation = $rowSlPrItemDetails['sttr_stone_valuation'];

    // Added by PRIYANKA-24JAN18 => DATE ON PAYMENT PANEL
    $utin_date = $rowSlPrItemDetails['sttr_add_date'];
    $sttr_tot_price_igst_chrg = $rowSlPrItemDetails['sttr_tot_price_igst_chrg'];
    $sttr_tot_price_igst_per = $rowSlPrItemDetails['sttr_tot_price_igst_per'];
    $sttr_tot_price_cgst_chrg = $rowSlPrItemDetails['sttr_tot_price_cgst_chrg'];
    $sttr_tot_price_cgst_per = $rowSlPrItemDetails['sttr_tot_price_cgst_per'];
    $totalMakingCharges += $rowSlPrItemDetails['sttr_total_making_charges'];
    $utin_oth_chgs_amt += $rowSlPrItemDetails['sttr_total_other_charges'];
    $sttr_total_making_charges = $rowSlPrItemDetails['sttr_total_making_charges'];
    $sttr_value_added = $rowSlPrItemDetails['sttr_value_added'];
    //
    if ($sttr_value_added > 0) {
        $sttr_value_added = om_round($sttr_value_added);
    }
    //
    $valueAdded += $rowSlPrItemDetails['sttr_value_added'];
    //
    if ($valueAdded > 0) {
        $valueAdded = om_round($valueAdded);
    }
    //
    $stockFinalStoneValuation = 0;
    //
    if ($sttr_status == 'PaymentPending') {
        $makeInvoiceCount++;
        $submitApprovalCount++;
    } else if ($sttr_status == 'ApprovalDone') {
        $makeInvoiceCount++;
    }
    //
    if (($sttr_status == 'PaymentPending' || $sttr_status == 'ApprovalDone') && $makeInvoiceflag == false)
        $makeInvoiceflag = true;
    //
    if ($sttr_status == 'ApprovalDone' && $submitApprovalflag == true)
        $submitApprovalflag = false;
    //
    if ($sellPanelName == 'ItemApprovalUp') {
        if ($sttr_status == 'PaymentPending' && $submitApprovalflag == false)
            $submitApprovalflag = true;
    }
    //
    if ($slPrCryValuation == '' || $slPrCryValuation == 0 || $slPrCryValuation == NULL) {
        //
        $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$slPrId'";
        //
        $stoneResult1 = mysqli_query($conn, $selStoneQuery1);
        //
        while ($stoneRowDetails1 = mysqli_fetch_array($stoneResult1, MYSQLI_ASSOC)) {
            $stockFinalStoneValuation += $stoneRowDetails1['sttr_valuation'];
            $stockFinalStoneWt += $stoneRowDetails1['sttr_gs_weight'];
            $stoneWtType = $stoneRowDetails1['sttr_gs_weight_type'];
        }
        //
        $updateQuery1 = "UPDATE stock_transaction SET sttr_stone_valuation = '$stockFinalStoneValuation', "
                . "sttr_stone_wt = '$stockFinalStoneWt', sttr_stone_wt_type = '$stoneWtType' "
                . "where sttr_indicator = 'stock' and sttr_transaction_type = 'sell' "
                . "and sttr_status NOT IN ('DELETED') and sttr_id = '$slPrId'";
        //
        if (!mysqli_query($conn, $updateQuery1)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        $slPrCryValuation = $stockFinalStoneValuation;
        //
    }

    $itemAddDate = $rowSlPrItemDetails['sttr_add_date'];
    $accId = $rowSlPrItemDetails['sttr_account_id'];
    $itemStatus = $rowSlPrItemDetails['sttr_status'];
    $slPrItemFinalVal = $rowSlPrItemDetails['sttr_final_valuation'] - $rowSlPrItemDetails['sttr_stone_valuation'];
    $totalFinalBalDisplay += $rowSlPrItemDetails['sttr_final_valuation'];
    $slPrItemVATCharges = $rowSlPrItemDetails['sttr_tax'];
    $slPrItemLabNOthChrg = $rowSlPrItemDetails['sttr_total_lab_charges'];
    $slpr_value_added = $rowSlPrItemDetails['stsl_value_added'];
    $slPrItemLabourChgsBy = $rowSlPrItemDetails['sttr_making_charges_type'];
    $slPrItemWtBy = $rowSlPrItemDetails['sttr_final_valuation_by'];
    $slPrInfo = $rowSlPrItemDetails['sttr_other_info'];

    if ($itemStatus == 'ItemReturned') {
        $itemReturnVal += $slPrItemFinalVal;
    }

    if ($slPrCryValuation == NULL || $slPrCryValuation == '') {
        $slPrCryValuation = 0;
    }

    if ($slPrItemVATCharges == '') {
        $slPrItemVATCharges = 0;
    }

    if ($slPrItemWtBy == 'byGrossWt') {
        $wt = $rowSlPrItemDetails['sttr_gs_weight'];
        $wtType = $rowSlPrItemDetails['sttr_gs_weight_type'];
    } else {
        $wt = $rowSlPrItemDetails['sttr_nt_weight'];
        $wtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
    }

    if ($slPrItemLabourChgsBy == 'lbByNetWt') {
        $slPrItemFFNW = $rowSlPrItemDetails['sttr_nt_weight'];
    } else if ($slPrItemLabourChgsBy == 'lbByGrossWt') {
        $slPrItemFFNW = $rowSlPrItemDetails['sttr_gs_weight'];
    } else {
        $slPrItemFFNW = $slPrItemFFineWt;
    }

    if ($slPrItemLabNOthChrg != '') {
        $slPrTotItemLabChrg = $slPrItemLabNOthChrg;
    } else {
        $slPrTotItemLabChrg = 0;
        if ($rowSlPrItemDetails['sttr_making_charges'] != '') {
            if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'KG') {
                if ($wtType == 'KG')
                    $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
                else if ($wtType == 'GM')
                    $slPrTotItemLabChrg = ($rowSlPrItemDetails['sttr_making_charges'] / 1000) * $slPrItemFFNW;
                else
                    $slPrTotItemLabChrg = ($rowSlPrItemDetails['sttr_making_charges'] / (1000 * 1000)) * $slPrItemFFNW;
            } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'GM') {
                if ($wtType == 'KG')
                    $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * 1000 * $slPrItemFFNW;
                else if ($wtType == 'GM')
                    $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
                else
                    $slPrTotItemLabChrg = ($rowSlPrItemDetails['sttr_making_charges'] / 1000) * $slPrItemFFNW;
            } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'MG') {
                if ($wtType == 'KG')
                    $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * 1000 * 1000 * $slPrItemFFNW;
                else if ($wtType == 'GM') {
                    $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * 1000 * $slPrItemFFNW;
                } else
                    $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $slPrItemFFNW;
            } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'PP') {

                $slPrTotItemLabChrg = $rowSlPrItemDetails['sttr_making_charges'] * $rowSlPrItemDetails['sttr_quantity'];
            } else if ($rowSlPrItemDetails['sttr_making_charges_type'] == 'per') {

                $gsWt = $rowSlPrItemDetails['sttr_gs_weight'];
                $gsWtTyp = $rowSlPrItemDetails['sttr_gs_weight_type'];
                $labNOthCharges = ($rowSlPrItemDetails['sttr_making_charges'] * $gsWt) / 100;

                if ($slPrItemMetal == 'Gold') {
                    if ($gsWtTyp == 'KG') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) * 100);
                    } else if ($gsWtTyp == 'GM') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 10);
                    } else if ($gsWtTyp == 'MG') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (100 * 100));
                    }
                } else if ($slPrItemMetal == 'Silver') {
                    if ($gsWtTyp == 'KG') {
                        $slPrTotItemLabChrg = ($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']);
                    } else if ($gsWtTyp == 'GM') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 1000);
                    } else if ($gsWtTyp == 'MG') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (1000 * 1000) );
                    }
                } else {
                    // START CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
                    if ($gsWtTyp == 'KG') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) * 100);
                    } else if ($gsWtTyp == 'GM') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / 10);
                    } else if ($gsWtTyp == 'MG') {
                        $slPrTotItemLabChrg = (($labNOthCharges * $rowSlPrItemDetails['sttr_metal_rate']) / (100 * 100));
                    }
                    // END CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
                }
            }
        }
    }

    if ($itemStatus != 'RETURNED') {

        $totMakingCharge += $slPrTotItemLabChrg;
        $itemValValueAdded = $slPrItemValuation + $slPrTotItemLabChrg + $slpr_value_added;
        $newItemValuation = ($slPrItemValuation + $slPrCryValuation) - $slPrTotItemLabChrg;
        $slPrItemTotalTaxChrg = ($itemValValueAdded * $slPrItemVATCharges / 100);
        $totalItemsQTY += $slPrItemQTY;
        $totalValuation += ($slPrItemValuation);
        $totalFinalBalance += $slPrItemFinalVal;

        if ($totalFinalBalance > 0) {
            $totalFinalBalance = $totalFinalBalance;
        }

        $totalCrystalVal += $slPrCryValuation;
        $totaltax += $slPrItemTotalTaxChrg;
        $totalAmnt = $totalFinalBalance;
        $totalMetalAmnt += $totalValuation;
        $otherCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
        $utin_crystal_amt = $totalCrystalVal;

        if ($rowSlPrItemDetails['sttr_metal_type'] == 'Gold' || $rowSlPrItemDetails['sttr_metal_type'] == 'GOLD') {

            //start code for attach crystal : author @darshana 20 july 2021
            $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                    . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$slPrId'";
            $stoneResult1 = mysqli_query($conn, $selStoneQuery1);
            $rowStone = mysqli_num_rows($stoneResult1);

            if ($rowStone > 0) {
                while ($resStoneDetails = mysqli_fetch_array($stoneResult1, MYSQLI_ASSOC)) {
                    $crystalTotVal += $resStoneDetails['sttr_final_valuation'];
                    $cryGsWt = $resStoneDetails['sttr_gs_weight'];
                    $cryGsWtType = $resStoneDetails['sttr_gs_weight_type'];

                    if ($cryGsWtType == 'KG') {
                        $crystalGsWt = ($cryGsWt * 5000);
                        $crystalTotGrossWt += $crystalGsWt;
                    } else if ($cryGsWtType == 'GM') {
                        $crystalGsWt = ($cryGsWt * 5);
                        $crystalTotGrossWt += $crystalGsWt;
                    } else if ($cryGsWtType == 'MG') {
                        $crystalGsWt = ($cryGsWt * 0.005);
                        $crystalTotGrossWt += $crystalGsWt;
                    } else if ($cryGsWtType == 'CT') {
                        $crystalTotGrossWt += $cryGsWt;
                    }
                    $crystalTotGrossWtType = 'CT';

                    $cryNetWt = $resStoneDetails['sttr_nt_weight'];
                    $cryNetWtType = $resStoneDetails['sttr_nt_weight_type'];
                    if ($cryNetWt == 0 || $cryNetWt == '' || $cryNetWt == NULL) {
                        $cryNetWt = $cryGsWt;
                        $cryNetWtType = $cryGsWtType;
                    }

                    if ($cryNetWtType == 'KG') {
                        $crystalNtWt = ($cryNetWt * 5000);
                        $crystalTotNetWt += $crystalNtWt;
                    } else if ($cryNetWtType == 'GM') {
                        $crystalNtWt = ($cryNetWt * 5);
                        $crystalTotNetWt += $crystalNtWt;
                    } else if ($cryNetWtType == 'MG') {
                        $crystalNtWt = ($cryNetWt * 0.005);
                        $crystalTotNetWt += $crystalNtWt;
                    } else if ($cryNetWtType == 'CT') {
                        $crystalTotNetWt += $cryNetWt;
                    }
//                    echo '$crystalTotNetWt==1=='.$crystalTotNetWt.'<br>';
//                $crystalTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                    $crystalTotNetWtType = 'CT';
                    $crystalTotFFineWt += getTotalWeight($resStoneDetails['sttr_final_fine_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight');
                    $crystalTotFFineWtType = 'CT';
                    $crystalRate = $resStoneDetails['sttr_metal_rate'];
                    $totalCrystalQuant += $resStoneDetails['sttr_quantity'];
                    $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                    $totalOthCryChgs += $totalCryTax;
//                    $totalCrystalBalance += $resStoneDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                    $crystalPurchaseAvgRate1 += ($crystalRate * getTotalWeight($resStoneDetails['sttr_nt_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                    $crystalPurchaseAvgRate2 += getTotalWeight($resStoneDetails['sttr_nt_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight') / 10;
                }
                if ($crystalTotGrossWtType == '' || $crystalTotGrossWtType == NULL) {
                    $crystalTotGrossWtType = 'CT';
                }
                if ($crystalTotNetWtType == '' || $crystalTotNetWtType == NULL) {
                    $crystalTotNetWtType = 'CT';
                }
                if ($crystalTotFFineWtType == '' || $crystalTotFFineWtType == NULL) {
                    $crystalTotFFineWtType = 'CT';
                }
            }
            //end code for attach crystal : author @darshana 20 july 2021

            $goldTotGrossWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
            $goldTotGrossWtType = 'GM';
            $goldTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $goldTotNetWtType = 'GM';
            $goldTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $goldTotFFineWtType = 'GM';

            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
            // START CODE TO ADD TOTAL PURCHASE VALUATION FOR GOLD FOR SELL ENTRY 
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            $goldTotPurValuation += $rowSlPrItemDetails['sttr_price'];
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
            // END CODE TO ADD TOTAL PURCHASE VALUATION FOR GOLD FOR SELL ENTRY 
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //

            $totalGoldBalance += ($slPrItemValuation);
            $goldFinalVal += $rowSlPrItemDetails['sttr_final_valuation'];
            $slPrItemGoldFinWt += $rowSlPrItemDetails['sttr_fine_weight'] - $rowSlPrItemDetails['sttr_stone_valuation'];
            $otherGoldCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
            $totalOthGdChgs += $otherGoldCharges;
            $payGoldTotFinalBalance += $rowSlPrItemDetails['sttr_valuation'];
            $payGoldCrystalAmt += $rowSlPrItemDetails['sttr_stone_valuation'];

            $totalGoldPurPrice += $rowSlPrItemDetails['stsl_pur_price'];

            $gdRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $goldRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $goldQty += $rowSlPrItemDetails['sttr_quantity'];
            $goldPurchaseAvgRate1 += ($goldRate * getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
            $goldPurchaseAvgRate2 += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight') / 10;
        }

        if ($rowSlPrItemDetails['sttr_metal_type'] == 'Silver' || $rowSlPrItemDetails['sttr_metal_type'] == 'SILVER') {

            //start code for attach crystal : author @darshana 20 july 2021
            $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                    . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$slPrId'";
            $stoneResult1 = mysqli_query($conn, $selStoneQuery1);
            $rowStone = mysqli_num_rows($stoneResult1);

            if ($rowStone > 0) {
                while ($resStoneDetails = mysqli_fetch_array($stoneResult1, MYSQLI_ASSOC)) {
                    $crystalTotVal += $resStoneDetails['sttr_final_valuation'];
                    $cryGsWt = $resStoneDetails['sttr_gs_weight'];
                    $cryGsWtType = $resStoneDetails['sttr_gs_weight_type'];

                    if ($cryGsWtType == 'KG') {
                        $crystalGsWt = ($cryGsWt * 5000);
                        $crystalTotGrossWt += $crystalGsWt;
                    } else if ($cryGsWtType == 'GM') {
                        $crystalGsWt = ($cryGsWt * 5);
                        $crystalTotGrossWt += $crystalGsWt;
                    } else if ($cryGsWtType == 'MG') {
                        $crystalGsWt = ($cryGsWt * 0.005);
                        $crystalTotGrossWt += $crystalGsWt;
                    } else if ($cryGsWtType == 'CT') {
                        $crystalTotGrossWt += $cryGsWt;
                    }
                    $crystalTotGrossWtType = 'CT';

                    $cryNetWt = $resStoneDetails['sttr_nt_weight'];
                    $cryNetWtType = $resStoneDetails['sttr_nt_weight_type'];
                    if ($cryNetWt == 0 || $cryNetWt == '' || $cryNetWt == NULL) {
                        $cryNetWt = $cryGsWt;
                        $cryNetWtType = $cryGsWtType;
                    }

                    if ($cryNetWtType == 'KG') {
                        $crystalNtWt = ($cryNetWt * 5000);
                        $crystalTotNetWt += $crystalNtWt;
                    } else if ($cryNetWtType == 'GM') {
                        $crystalNtWt = ($cryNetWt * 5);
                        $crystalTotNetWt += $crystalNtWt;
                    } else if ($cryNetWtType == 'MG') {
                        $crystalNtWt = ($cryNetWt * 0.005);
                        $crystalTotNetWt += $crystalNtWt;
                    } else if ($cryNetWtType == 'CT') {
                        $crystalTotNetWt += $cryNetWt;
                    }
//                    echo '$crystalTotNetWt==1=='.$crystalTotNetWt.'<br>';
//                $crystalTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                    $crystalTotNetWtType = 'CT';
                    $crystalTotFFineWt += getTotalWeight($resStoneDetails['sttr_final_fine_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight');
                    $crystalTotFFineWtType = 'CT';
                    $crystalRate = $resStoneDetails['sttr_metal_rate'];
                    $totalCrystalQuant += $resStoneDetails['sttr_quantity'];
                    $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                    $totalOthCryChgs += $totalCryTax;
//                    $totalCrystalBalance += $resStoneDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                    $crystalPurchaseAvgRate1 += ($crystalRate * getTotalWeight($resStoneDetails['sttr_nt_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                    $crystalPurchaseAvgRate2 += getTotalWeight($resStoneDetails['sttr_nt_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight') / 10;
                }
                if ($crystalTotGrossWtType == '' || $crystalTotGrossWtType == NULL) {
                    $crystalTotGrossWtType = 'CT';
                }
                if ($crystalTotNetWtType == '' || $crystalTotNetWtType == NULL) {
                    $crystalTotNetWtType = 'CT';
                }
                if ($crystalTotFFineWtType == '' || $crystalTotFFineWtType == NULL) {
                    $crystalTotFFineWtType = 'CT';
                }
            }
            //end code for attach crystal : author @darshana 20 july 2021

            $silverTotGrossWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
            $silverTotGrossWtType = 'GM';
            $silverTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $silverTotNetWtType = 'GM';
            $silverTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $silverTotFFineWtType = 'GM';

            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
            // START CODE TO ADD TOTAL PURCHASE VALUATION FOR SILVER FOR SELL ENTRY 
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            $silverTotPurValuation += $rowSlPrItemDetails['sttr_price'];
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
            // END CODE TO ADD TOTAL PURCHASE VALUATION FOR SILVER FOR SELL ENTRY 
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //

            $totalSilverBalance += ($slPrItemValuation);
            $silverFinalVal += $rowSlPrItemDetails['sttr_final_valuation'] - $rowSlPrItemDetails['sttr_stone_valuation'];
            $slPrItemSilverFinWt += $rowSlPrItemDetails['sttr_fine_weight'];
            $otherSilverCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
            $totalOthSlChgs += $otherSilverCharges;

            $paySilverTotFinalBalance += om_round($rowSlPrItemDetails['sttr_valuation']);
            $paySilverCrystalAmt += $rowSlPrItemDetails['sttr_stone_valuation'];

            $totalSilverPurPrice += $rowSlPrItemDetails['stsl_pur_price'];

            $silverQty += $rowSlPrItemDetails['sttr_quantity'];
            $srRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $silverRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $silverPurchaseAvgRate1 += ($silverRate * getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight')) / 100; // / (getTotalWeight($rowSlPrItemDetails['utin_fine_wt'], $rowSlPrItemDetails['utin_nt_weight_type'], 'weight') / 10)), 2);
            $silverPurchaseAvgRate2 += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight') / 10;
        }
        //            START CODE FOR METAL TYPE CRYSTAL: AUTHOR@DARSHANA 17 JULY 2021
        if ($rowSlPrItemDetails['sttr_metal_type'] == 'crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'Crystal' || $rowSlPrItemDetails['sttr_metal_type'] == 'CRYSTAL') {
            $crystalTotVal += $rowSlPrItemDetails['sttr_final_valuation'];
            $cryGsWt = $rowSlPrItemDetails['sttr_gs_weight'];
            $cryGsWtType = $rowSlPrItemDetails['sttr_gs_weight_type'];

            if ($cryGsWtType == 'KG') {
                $crystalGsWt = ($cryGsWt * 5000);
                $crystalTotGrossWt += $crystalGsWt;
            } else if ($cryGsWtType == 'GM') {
                $crystalGsWt = ($cryGsWt * 5);
                $crystalTotGrossWt += $crystalGsWt;
            } else if ($cryGsWtType == 'MG') {
                $crystalGsWt = ($cryGsWt * 0.005);
                $crystalTotGrossWt += $crystalGsWt;
            } else if ($cryGsWtType == 'CT') {
                $crystalTotGrossWt += $cryGsWt;
            }
            $crystalTotGrossWtType = 'CT';

            $cryNetWt = $rowSlPrItemDetails['sttr_nt_weight'];
            $cryNetWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
            if ($cryNetWtType == 'KG') {
                $crystalNtWt = ($cryNetWt * 5000);
                $crystalTotNetWt += $crystalGsWt;
            } else if ($cryNetWtType == 'GM') {
                $crystalNtWt = ($cryNetWt * 5);
                $crystalTotNetWt += $crystalGsWt;
            } else if ($cryNetWtType == 'MG') {
                $crystalNtWt = ($cryNetWt * 0.005);
                $crystalTotNetWt += $crystalGsWt;
            } else if ($cryNetWtType == 'CT') {
                $crystalTotNetWt += $cryNetWt;
            }
//                $crystalTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
            $crystalTotNetWtType = 'CT';
            $crystalTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $crystalTotFFineWtType = 'CT';
            $crystalRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $totalCrystalQuant += $rowSlPrItemDetails['sttr_quantity'];
            $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
            $totalOthCryChgs += $totalCryTax;
            $totalCrystalBalance += $rowSlPrItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
            $crystalPurchaseAvgRate1 += ($crystalRate * getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
            $crystalPurchaseAvgRate2 += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight') / 10;
        }
        //
        //
        if ($crystalTotGrossWtType == '' || $crystalTotGrossWtType == NULL) {
            $crystalTotGrossWtType = 'CT';
        }
        if ($crystalTotNetWtType == '' || $crystalTotNetWtType == NULL) {
            $crystalTotNetWtType = 'CT';
        }
        if ($crystalTotFFineWtType == '' || $crystalTotFFineWtType == NULL) {
            $crystalTotFFineWtType = 'CT';
        }
//        echo '$crystalTotGrossWtType=' . $crystalTotGrossWtType . '<br>';
//        echo '$crystalTotNetWtType=' . $crystalTotNetWtType . '<br>';
//        echo '$crystalTotFFineWtType=' . $crystalTotFFineWtType . '<br>';
        //
        //END  CODE FOR METAL TYPE CRYSTAL: AUTHOR@DARSHANA 17 JULY 2021
        // START CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
        if ($rowSlPrItemDetails['sttr_metal_type'] != 'Gold' && $rowSlPrItemDetails['sttr_metal_type'] != 'GOLD' &&
                $rowSlPrItemDetails['sttr_metal_type'] != 'Silver' && $rowSlPrItemDetails['sttr_metal_type'] != 'SILVER') {

            $goldTotGrossWt += getTotalWeight($rowSlPrItemDetails['sttr_gs_weight'], $rowSlPrItemDetails['sttr_gs_weight_type'], 'weight');
            $goldTotGrossWtType = 'GM';
            $goldTotNetWt += getTotalWeight($rowSlPrItemDetails['sttr_nt_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $goldTotNetWtType = 'GM';
            $goldTotFFineWt += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight');
            $goldTotFFineWtType = 'GM';
            $totalGoldBalance += ($slPrItemValuation);
            $goldFinalVal += $rowSlPrItemDetails['sttr_final_valuation'];
            $slPrItemGoldFinWt += $rowSlPrItemDetails['sttr_fine_weight'];
            $otherGoldCharges = $slPrItemTotalTaxChrg + $slPrTotItemLabChrg + $slpr_value_added;
            $totalOthGdChgs += $otherGoldCharges;
            $payGoldTotFinalBalance += om_round($rowSlPrItemDetails['sttr_valuation']);
            $payGoldCrystalAmt += $rowSlPrItemDetails['sttr_stone_valuation'];
            $totalGoldPurPrice += $rowSlPrItemDetails['stsl_pur_price'];
            $gdRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $goldRate = $rowSlPrItemDetails['sttr_metal_rate'];
            $goldQty += $rowSlPrItemDetails['sttr_quantity'];
            $goldPurchaseAvgRate1 += ($goldRate * getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
            $goldPurchaseAvgRate2 += getTotalWeight($rowSlPrItemDetails['sttr_final_fine_weight'], $rowSlPrItemDetails['sttr_nt_weight_type'], 'weight') / 10;
        }
        // END CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
    }

    if ($sellPanelName != 'SellItemReturn' && $sellPanelName != 'SellItemReturnUp') {
        if ($itemStatus == 'PaymentPending' && $sellPanelName != 'ItemApproval' && $sellPanelName != 'ItemApprovalUp') {
            $sellPanelName = 'SlPrPayment';
            $transPanelName = 'SellPayment';
        } else if ($itemStatus == 'PaymentDone') {
            if ($sellPanelName == 'finalOrderUp')
                $sellPanelName = 'finalOrderUp';
            else
                $sellPanelName = 'SellPayUp';
            $transPanelName = 'SellPayUp';
        }
    }

    $itemMetalRate = $rowSlPrItemDetails['sttr_metal_rate'];
    $itemMetalType = $rowSlPrItemDetails['sttr_metal_type'];

    //echo '$itemMetalRate == ' . $itemMetalRate . '<br />';

    if ($itemMetalRate == 0 || $itemMetalRate == '' || $itemMetalRate == NULL || $itemMetalRate === NULL) {
        $itemMetalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', $itemMetalType);
    }

    //echo '$itemMetalRate == ' . $itemMetalRate . '<br />';
    //echo '$itemMetalType == ' . $itemMetalType . '<br />';

    if ($utin_othr_chgs_by == 'byWt' && $itemMetalRate != 0) {

        if ($rowSlPrItemDetails['sttr_metal_type'] == 'Gold' || $rowSlPrItemDetails['sttr_metal_type'] == 'GOLD') {
            if ($goldTotFFineWtType == 'KG') {
                $goldOthChagsWeight = ($totalOthGdChgs * 100) / ($itemMetalRate);
            } else if ($goldTotFFineWtType == 'GM') {
                $goldOthChagsWeight = (($totalOthGdChgs) * 10) / $itemMetalRate;
            } else if ($goldTotFFineWtType == 'MG') {
                $goldOthChagsWeight = (($totalOthGdChgs) * 10000) / $itemMetalRate;
            }
        }

        if ($rowSlPrItemDetails['sttr_metal_type'] == 'Silver' || $rowSlPrItemDetails['sttr_metal_type'] == 'SILVER') {
            if ($silverTotFFineWtType == 'KG') {
                $silverOthChagsWeight = ($totalOthSlChgs) / ($itemMetalRate);
            } else if ($silverTotFFineWtType == 'GM') {
                $silverOthChagsWeight = (($totalOthSlChgs) * 1000) / $itemMetalRate;
            } else if ($silverTotFFineWtType == 'MG') {
                $silverOthChagsWeight = (($totalOthSlChgs) * (1000 * 1000)) / $itemMetalRate;
            }
        }

        // START CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
        if ($rowSlPrItemDetails['sttr_metal_type'] != 'Gold' && $rowSlPrItemDetails['sttr_metal_type'] != 'GOLD' &&
                $rowSlPrItemDetails['sttr_metal_type'] != 'Silver' && $rowSlPrItemDetails['sttr_metal_type'] != 'SILVER') {

            if ($goldTotFFineWtType == 'KG') {
                $goldOthChagsWeight = ($totalOthGdChgs * 100) / ($itemMetalRate);
            } else if ($goldTotFFineWtType == 'GM') {
                $goldOthChagsWeight = (($totalOthGdChgs) * 10) / $itemMetalRate;
            } else if ($goldTotFFineWtType == 'MG') {
                $goldOthChagsWeight = (($totalOthGdChgs) * 10000) / $itemMetalRate;
            }
        }
        // END CODE TO ADD CODE FOR OTHER METAL OPTION @PRIYANKA-06JUNE18
    }

    $totalLabOrMkgCharges += $slPrTotItemLabChrg;
    $payTotalOtherCharges = $totalLabOrMkgCharges;

    $totalTaxAmount += $slPrItemTotalTaxChrg;
    $payTotalTaxAmt = $totalTaxAmount;
    $goldFinalWeight = om_round(($goldOthChagsWeight + $goldTotFFineWt), 3);
    $silverFinalWeight = om_round(($silverOthChagsWeight + $silverTotFFineWt), 3);

    $sellPrice = $slPrItemFinalVal;
    $purchasePrice = om_round($rowSlPrItemDetails['stsl_pur_price']);
    $totalPurPrice += $purchasePrice;

    $slPrProfitNLossAmt += $sellPrice - $purchasePrice;
    $goldCrystalAmount = $payGoldCrystalAmt;
    $silverCrystalAmount = $paySilverCrystalAmt;

    //CRYSTAL TOTAL FIELDS
    $crystalQty = $totalCrystalQuant;
    $crystalFinalVal = $crystalTotVal;
    $crystalFinalWeight = decimalVal($crystalTotNetWt, 3);
    $crystalFinalWeightType = $crystalTotNetWtType;
//    echo '$crystalFinalWeightType' . $crystalFinalWeightType . '<br>';

    if (($sttr_tot_price_igst_chrg != '0.00' && $sttr_tot_price_igst_chrg != '') && ($sttr_tot_price_igst_per != '0.00' && $sttr_tot_price_igst_per != '')) {
        $utin_pay_igst_chk = 'checked';
        $utin_pay_cgst_chk = 'unchecked';
        $utin_pay_sgst_chk = 'unchecked';
    }
    //
    if (($sttr_tot_price_cgst_chrg != '0.00' && $sttr_tot_price_cgst_chrg != '') && ($sttr_tot_price_cgst_per != '0.00' && $sttr_tot_price_cgst_per != '')) {
        $utin_pay_igst_chk = 'unchecked';
    }
    //
    // START CODE FOR BEFORE GST TAX ENTRIES @PRIYANKA-29MAR18
    if ($slPrItemVATCharges > 0) {
        $utin_pay_tax_chrg = $slPrItemVATCharges;
        $utin_pay_tax_chk = 'checked';
        $utin_pay_cgst_chk = 'unchecked';
        $utin_pay_sgst_chk = 'unchecked';
    }
    // END CODE FOR BEFORE GST TAX ENTRIES @PRIYANKA-29MAR18
    // 
    // echo '$utin_pay_tax_chk == '.$utin_pay_tax_chk;
    //
//
// START CODE FOR Gaurav Requirement : TAX ON TOT AMT by default check on Payment Panel @PRIYANKA-05NOV18
    parse_str(getTableValues("SELECT utin_pay_tax_on_total_amt_chk FROM user_transaction_invoice "
                    . "WHERE utin_transaction_type = 'sell' and utin_type = 'stock' "
                    . "and utin_firm_id = '$firmId' order by utin_id desc LIMIT 0,1"));
// END CODE FOR Gaurav Requirement : TAX ON TOT AMT by default check on Payment Panel @PRIYANKA-05NOV18
//
// echo 'utin_pay_tax_on_total_amt_chk == '.$utin_pay_tax_on_total_amt_chk.'<br />';
// 
    //
    $utin_pay_tax_on_total_amt_chk = 'checked';
    //   
    $i = 1;
    $slPrIdStr .= $slPrId . ","; // sttr_id STRING CREATED FOR INSURANCE FIELD UPDATE IN stock_transaction 
    $slPrItemNameStr .= $slPrItemName . ","; // ITEM NAMES STRING CREATED TO DISPLAY IN INSURANCE CERT.  
    if ($panelName != 'SellValues') {
        if ($counter == 1) {
            if ($payPanelName == 'SlPrPayment' || $sellPanelName == 'SellPayUp' ||
                    $sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp' ||
                    $sellPanelName == 'ItemApproval' || $sellPanelName == 'ItemApprovalUp') {
                ?>
                <tr>
                    <td colspan="16">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
                            <tr>
                                <?php if ($returnPanel != 'itemReturnPanel') { ?>
                                    <td align="right" class="itemAddPnLabels14 paddingTop5" width="550px">
                                        <span class="main_link_brown">CUSTOMER INVOICE NO: </span>
                                        <span class="ff_arial fw_b fs_12 black"><?php echo $slPrPreInvoiceNo . '' . $slPrInvoiceNo; ?></span>
                                    </td>
                                <?php } ?>
                                <td align="right" valign="middle" width="430px">
                                    <div id="sellMessDisplayDiv" class="analysis_div_rows">
                                        <?php
                                        $showMess = $_GET['messDiv'];
                                        if ($showMess == "itemDeleted") {
                                            echo "<div class=" . "fs_12 fs_calibri" . ">Deleted Successfully</div>";
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php if ($sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp') { ?>
                    <tr>
                        <td align="left" class="itemAddPnLabels14 paddingTop5" colspan="16" width="700px">
                            <span class="main_link_brown"><?php echo $listName; ?></span>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td align="center" class="itemAddPnLabels14">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="16">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%"  class="brdrgry-dashed">
                        <tr class="height28" style="background:#f9f7a2;">
                            <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="TYPE">
                                <div class="spaceLeft5">TYPE</div>
                            </td>
                            <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="PID">
                                <div class="spaceLeft5">PID</div>
                            </td>
                            <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="PROD DETAILS">
                                <div class="spaceLeft5">PROD DETAILS</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="QUANTITY">
                                <div class="spaceRight5">QTY</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="GROSS WEIGHT">
                                <div class="spaceRight5">GS WT</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="NET WEIGHT">
                                <div class="spaceRight5">NT WT</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TUNCH/PURITY">
                                <div class="spaceRight5">PURITY</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="WASTAGE">
                                <div class="spaceRight5">WSTG</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL PURITY">
                                <div class="spaceRight5">F.PURITY</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="CUSTOMER WASTAGE">
                                <div class="spaceRight5">CUST WSTG</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL FINE WEIGHT">
                                <div class="spaceRight5">FFN WT</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="MAKING CHARGES">
                                <div class="spaceRight5">MKG CHRG</div>
                            </td>
                            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TOTAL MAKING CHARGES">
                                <div class="spaceRight5">TOT MKG CHRG</div>
                            </td>
                            <td align="center" class="brwnCalibri12Font border-color-grey-b" title="DELETE">
                                <div class="spaceLeft5">DEL</div>
                            </td>
                        </tr>
                        <?php
                    } $counter = 2;
                    if ($sellPanelName == 'ItemApproval' || $sellPanelName == 'ItemApprovalUp') {
                        $upPanel = 'ItemApprovalUp';
                    } else {
                        $upPanel = 'SellDetUpPanel';
                        if ($DefaultFormOption == 'fineb2') {
                            $fineDefaultFormPanel = 'fineb2';
                        } else {
                            $fineDefaultFormPanel = '';
                        }
                    }
                    ?>
                    <tr <?php if ($slprdelStatus != '' || $slprdelStatus != NULL) { ?>class="portlet yellow-gold box" <?php } ?>>

                        <?php
                        if ($sellPanelName == 'ItemApproval' || $sellPanelName == 'ItemApprovalUp') {
                            $checkboxStatus = '';
                            if ($itemStatus == 'RETURNED' || $itemStatus == 'SOLDOUT')
                                $checkboxStatus = 'disabled';
                            ?>
                            <td align="center" class="brwnCalibri12Font border-color-grey-rb" width="50px" title="checkbox">
                                <input type="checkbox" value="<?php echo $slPrId; ?>" id="approvalItemId<?php echo $cout + 1; ?>" name="approvalItemId<?php echo $cout + 1; ?>" <?php echo $checkboxStatus; ?>> 
                            </td>
                        <?php } ?>

                        <td align="left" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceLeft5"><?php
                                if ($slPrItemMetal != '') {
                                    echo om_strtoupper($slPrItemMetal);
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="left" class="blackCalibri12Font border-color-grey-rb">
                            <?php if ($itemStatus != 'RETURNED') { ?>
                                <a style="cursor: pointer;" title="Single click to view Item Details!"
                                   onclick="javascript: if ('<?php echo $slPrItemPreId; ?>' == 'A' || '<?php echo $slPrItemPreId; ?>' == 'a') {
                                               showSellMetalFormB2UpdatePanel('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $slPrId; ?>', '<?php echo $upPanel; ?>', '<?php echo $slPrPreInvoiceNo . ' ' . $slPrInvoiceNo; ?>', '');
                                           } else {
                                               showSellMetalFormB2UpdatePanel('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $slPrId; ?>', '<?php echo $upPanel; ?>', '<?php echo $slPrPreInvoiceNo . ' ' . $slPrInvoiceNo; ?>', '');
                                           }">
                                    <div class="itemAddPnLabels11ArialLink spaceLeft5"><?php echo $slPrItemPreId . $slPrItemPostId; ?></div>
                                </a>
                            <?php } else { ?>
                                <div style="color:#888888"class="itemAddPnLabels11ArialLink spaceLeft5" ><?php echo $slPrItemPreId . $slPrItemPostId; ?></div>
                            <?php } ?>
                        </td>

                        <td align="left" class="blackCalibri12Font border-color-grey-rb" title="<?php echo $slPrItemName; ?>">
                            <div class="spaceLeft5"><?php echo om_strtoupper(substr($slPrItemName, 0, 13)); ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5"><?php echo $slPrItemQTY; ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb" width="80px">
                            <div class="spaceRight5"><?php
                                if ($slPrItemGSW != '') {
                                    echo $slPrItemGSW . ' ' . $slPrItemGSWT;
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb" width="80px">
                            <div class="spaceRight5"><?php
                                if ($slPrItemNTW != '') {
                                    echo $slPrItemNTW . ' ' . $slPrItemNTWT;
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5"><?php
                                if ($rowSlPrItemDetails['sttr_purity'] != '') {
                                    echo $rowSlPrItemDetails['sttr_purity'] . ' %';
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5"><?php
                                if ($rowSlPrItemDetails['sttr_wastage'] != '') {
                                    echo $rowSlPrItemDetails['sttr_wastage'] . ' %';
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5"><?php
                                if ($rowSlPrItemDetails['sttr_final_purity'] != '') {
                                    echo $rowSlPrItemDetails['sttr_final_purity'] . ' %';
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5"><?php
                                if ($rowSlPrItemDetails['sttr_cust_wastage'] != '') {
                                    echo $rowSlPrItemDetails['sttr_cust_wastage'] . ' %';
                                } else {
                                    echo '-';
                                }
                                ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5"><?php echo $rowSlPrItemDetails['sttr_final_fine_weight'] . ' ' . $rowSlPrItemDetails['sttr_nt_weight_type']; ?></div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5">
                                <?php
                                if ($slPrItemLabChrg != '' && $slPrItemLabChrgType != '') {
                                    if ($slPrItemLabChrgType == 'per')
                                        echo $slPrItemLabChrg . ' %';
                                    else
                                        echo $slPrItemLabChrg . ' /' . $slPrItemLabChrgType;
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </td>

                        <td align="right" class="blackCalibri12Font border-color-grey-rb">
                            <div class="spaceRight5">
                                <?php
                                if ($sttr_total_making_charges > 0) {
                                    echo formatInIndianStyle($sttr_total_making_charges);
                                } else {
                                    echo '-';
                                }
                                ?>
                            </div>
                        </td>

                        <?php
                        if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
                            $stockDelete = 'Y';
                        } else {
                            $stockDelete = 'N';
                        }
                        ?>

                    <input type="hidden" id="stockDelete" name="stockDelete" value="<?php echo $stockDelete; ?>" />

                    <?php if (($sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp') && $itemStatus != 'ItemReturned') { ?>
                        <td align="center" class="blackCalibri12Font border-color-grey-b">
                            <input type="button" id="sellReturn" name="sellReturn" value="RETURN"
                                   onclick="deleteSellItem('<?php echo $custId; ?>', '<?php echo $slPrId; ?>', 'ItemReturn', '<?php echo $sellPanelName; ?>', '', '<?php echo $slPrInfo; ?>');"
                                   autocomplete="off"  spellcheck="false" class="frm-btn" size="25" maxlength="80" />

                        </td>
                        <?php
                    } else {
                        if (($sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp') && $returnPanel == 'itemReturnPanel') {
                            ?>
                            <td align="center" class="blackCalibri12Font border-color-grey-b">
                                <input type="button" id="sellReturn" name="sellReturn" value="ACTIVE"
                                       onclick="deleteSellItem('<?php echo $custId; ?>', '<?php echo $slPrId; ?>', 'ItemActive', '<?php echo $sellPanelName; ?>', '');"
                                       autocomplete="off"  spellcheck="false" class="frm-btn" size="25" maxlength="80" />
                            </td>
                            <?php
                        } else {
                            ?>
                            <td align="center" class="blackCalibri12Font border-color-grey-b">
                                <input type="hidden" id="upPanel" name="upPanel"/>
                                <?php if ($staffId == '' || ($staffId && $array['sellDeleteCartItem'] == 'true')) { ?>
                                    <a style="cursor: pointer;" 
                                       onclick="deleteSellItem('<?php echo $custId; ?>', '<?php echo $slPrId; ?>', '<?php
                                       if ($PanelName == 'orderPickStock')
                                           echo $PanelName;
                                       else
                                           echo $payPanelName;
                                       ?>', '<?php echo $sellPanelName; ?>', 'ItemPurchase', '<?php echo $slPrInfo; ?>', '');">
                                        <img src="<?php echo $documentRoot; ?>/images/img/trash.png" alt="" class="marginTop5" style="height:14px;"/>
                                    </a>
                                <?php } ?>
                            </td>
                            <?php
                        }
                    }
                    ?>
        </tr>
        <?php
    }
    $cout++;
    $i++; // FOR SELECTED INVOICE CHECKBOX COUNT
}

//if ($utin_othr_chgs_by == 'byWt') {
//    $utin_oth_chgs_amt = 0;
//} else {
//    $utin_oth_chgs_amt = decimalVal($totalOthGdChgs + $totalOthSlChgs, 2);
//    $totAmount = $utin_oth_chgs_amt;
//}
$totalNewOtherChargAmt = $utin_oth_chgs_amt;
if ($goldPurchaseAvgRate1 != 0 && $goldPurchaseAvgRate2 != 0) {
    $goldPurchaseAvgRate = om_round(($goldPurchaseAvgRate1 / $goldPurchaseAvgRate2) * 10, 2);
}

if ($silverPurchaseAvgRate1 != 0 && $silverPurchaseAvgRate2 != 0) {
    $silverPurchaseAvgRate = om_round(($silverPurchaseAvgRate1 / $silverPurchaseAvgRate2) * 10, 2);
}

if ($crystalPurchaseAvgRate1 != 0 && $crystalPurchaseAvgRate2 != 0) {
    $crystalPurchaseAvgRate = om_round(($crystalPurchaseAvgRate1 / $crystalPurchaseAvgRate2) * 10, 2);
}

$totalAmount = $totalValuation;

$goldTotGrossWt = decimalVal($goldTotGrossWt, 3);

if ($totalMakingCharges > 0) {
    $totalMakingCharges = ($totalMakingCharges);
}

$utin_oth_chgs_amt = $utin_oth_chgs_amt + $totalMakingCharges;
$totalLabOrMkgCharges = $totalMakingCharges;

if ($strFrmId == '') {
    $strFrmId = $_GET['strFrmId'];
}

//echo '$totalFinalBalance == ' . $totalFinalBalance . '<br />';

if (($custId != '' || $sellPanelName == 'SellPayUp' || $sellPanelName == 'SellItemReturn' ||
        $sellPanelName == 'SellItemReturnUp') &&
        ($totalFinalBalance != 0 || $goldTotFFineWt != 0 || $silverTotFFineWt != 0)) {
    if ($panelName != 'SellValues') {
        ?>
        <tr>
            <?php
            if ($silverTotGrossWt > 0 && $goldTotGrossWt > 0) {
                $totalGsWt += getTotalWeight($silverTotGrossWt, 'GM', 'weight');
                $totalGsWt += getTotalWeight($goldTotGrossWt, 'GM', 'weight');
            } else if ($silverTotGrossWt > 0) {
                $totalGsWt = $silverTotGrossWt;
            } else if ($goldTotGrossWt > 0) {
                $totalGsWt = $goldTotGrossWt;
            }

            if ($silverTotFFineWt > 0 && $goldTotFFineWt > 0) {
                $totalFFNWt += getTotalWeight($silverTotFFineWt, 'GM', 'weight');
                $totalFFNWt += getTotalWeight($goldTotFFineWt, 'GM', 'weight');
            } else if ($silverTotFFineWt > 0) {
                $totalFFNWt = $silverTotFFineWt;
            } else if ($goldTotFFineWt > 0) {
                $totalFFNWt = $goldTotFFineWt;
            }
            ?>
            <?php $approvalItemCount = mysqli_num_rows($resSlPrItemDetails); ?>
        <tr>
            <?php
            if ($sellPanelName != 'ItemApproval' && $sellPanelName != 'ItemApprovalUp') {
                ?>
                <td colspan="4" valign="middle" align="right" height="10px">
                    <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%">
                        <tr>
                            <td align="right" class="blackCalibri13FontBold"  valign="middle" width="30px">
                                <select id="stocOthrChgsBy" name="stocOthrChgsBy" title="OTHER CHARGES BY WT/CASH"
                                        onchange ="changeStockOtherChgsOpt(this.value, '<?php echo $sellPanelName; ?>', '', '<?php echo $slPrPreInvoiceNo; ?>', '<?php echo $slPrInvoiceNo; ?>', '<?php echo $payPanelName; ?>', '', '', '<?php echo $custId; ?>');"
                                        class="form-control-select20-font12 placeholderClass orange" <?php if ($sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp') { ?> disabled <?php } ?> >
                                            <?php
                                            if ($utin_othr_chgs_by != '') {
                                                $stocChgsBy = array(byWt, byCash);
                                                for ($i = 0; $i < 2; $i++)
                                                    if ($stocChgsBy[$i] == $utin_othr_chgs_by)
                                                        $optionStocChgsBySel[$i] = 'selected';
                                            } else {
                                                $optionStocChgsBySel[1] = 'selected';
                                            }
                                            ?>
                                    <option value="byWt" <?php echo $optionStocChgsBySel[0]; ?> class="orange" >OTHER CHRG+TAX IN WT</option>
                                    <option value="byCash" <?php echo $optionStocChgsBySel[1]; ?> class="orange" >OTHER CHRG+TAX IN CASH</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            <?php } else {
                ?>
                <td colspan="4" valign="middle" align="right" height="10px"></td>
            <?php } ?>
            <td colspan="12"></td>
        </tr>
        <tr>
            <td align="center">
                &nbsp;
            </td>
           
        </tr>
        <tr>
            <td colspan="3" valign="top">
                <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                    <?php if ($goldTotGrossWt != '' && $goldTotGrossWt != 0) { ?>
                        <tr>
                            <td align="right" class="blackCalibri13Font"  valign="top">
                                <b> GOLD STOCK:</b>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ($silverTotGrossWt != '' && $silverTotGrossWt != 0) { ?>
                        <tr>
                            <td align="right" class="blackCalibri13Font"  valign="top">
                                <b>SILVER STOCK:</b>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
            <td align="left" colspan="3" valign="top">
                <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                    <?php if ($goldTotGrossWt != '' && $goldTotGrossWt != 0) { ?>
                        <tr>
                            <td align="center" class="blackCalibri13Font"  valign="top" width="30px">
                                <?php echo $goldQty; ?>
                            </td>
                            <td align="right" class="blackCalibri13Font" >
                                <b>GS WT:</b>
                            </td>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5">  <?php
                                    if ($goldTotGrossWt != '') {
                                        echo decimalVal($goldTotGrossWt, 3) . ' ' . $goldTotGrossWtType;
                                    }
                                    ?></div>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ($silverTotGrossWt != '' && $silverTotGrossWt != 0) { ?>
                        <tr>
                            <td align="center" class="blackCalibri13Font"  valign="top">
                                <?php echo $silverQty; ?>
                            </td>
                            <td align="right" class="blackCalibri13Font">
                                SL WT:
                            </td>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5"> <?php
                                    echo decimalVal($silverTotGrossWt, 3) . ' ' . $silverTotGrossWtType;
                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
            <?php
            $goldFinalWeightType = $goldTotFFineWtType;
            $silverFinalWeightType = $silverTotFFineWtType;
            $goldOthChagsWeight = om_round(convert($goldTotFFineWtType, $goldOthChagsWeightType, $goldOthChagsWeight), 3);
            $silverOthChagsWeight = om_round(convert($silverTotFFineWtType, $silverOthChagsWeightType, $silverOthChagsWeight), 3);
            ?>
            <td colspan="6" align="left" valign="top">
                <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                    <?php if ($goldTotGrossWt != '' && $goldTotGrossWt != 0) { ?>
                        <tr>
                            <td align="right" class="blackCalibri13Font" >
                                <b>FFN WT :&nbsp;&nbsp;</b>
                            </td>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5">  <?php
                                    echo decimalVal($goldTotFFineWt, 3) . ' ' . $goldTotFFineWtType;
                                    ?>
                                </div>
                            </td>
                            <td align="left" class="blackCalibri13Font" title="GOLD TAX + MK CHGS + VALUE ADDED">
                                <div class="spaceRight5 orange">  <?php
                                    if ($goldTotFFineWt != '' && $utin_othr_chgs_by == 'byWt') {
                                        echo decimalVal($goldOthChagsWeight, 3) . ' ' . $goldTotFFineWtType;
                                    }
                                    ?>
                                </div>
                            </td>
                            <td align="left" class="blackCalibri13Font">
                                <div class="spaceRight5 darkblueFont"> <?php
                                    echo decimalVal($goldFinalWeight, 3) . ' ' . $goldTotFFineWtType;
                                    ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ($silverTotGrossWt != '' && $silverTotGrossWt != 0) { ?>
                        <tr>

                            <td align="right" class="blackCalibri13Font">
                                <b> FFN WT :&nbsp;&nbsp;</b>
                            </td>
                            <td align="right" class="blackCalibri13Font">
                                <div class="spaceRight5">  <?php
                                    echo decimalVal($silverTotFFineWt, 3) . ' ' . $silverTotFFineWtType;
                                    ?>
                                </div>
                            </td>
                            <td align="left" class="blackCalibri13Font" title="SILVER TAX + MK CHGS + VALUE ADDED">
                                <div class="spaceRight5 orange"> <?php
                                    if ($silverTotGrossWt != '' && $utin_othr_chgs_by == 'byWt') {
                                        echo decimalVal($silverOthChagsWeight, 3) . ' ' . $silverTotFFineWtType;
                                    }
                                    ?>
                                </div>
                            </td>
                            <td align="left" class="blackCalibri13Font">
                                <div class="spaceRight5 darkblueFont"> <?php
                                    if ($silverFinalWeight != '') {
                                        echo number_format($silverFinalWeight, 3) . ' ' . $silverTotFFineWtType;
                                    }
                                    ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
            <td align="left" colspan="4" valign="top">
                <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                    <?php if ($goldTotGrossWt != '' && $goldTotGrossWt != 0) { ?>
                                                    <!--                        <tr>
                                                                        <td align="right" class="blackCalibri13Font" colspan="3">
                                                                            <div class="spaceRight5"> GOLD VALUATION :</div>
                                                                        </td>
                                                                        <td align="right" class="blackCalibri13Font">
                                                                            <div class="spaceRight5"> <?php echo formatInIndianStyle($goldFinalVal); ?></div>
                                                                        </td>
                                                                    </tr>-->
                    <?php } ?>
                    <?php if ($silverTotGrossWt != '' && $silverTotGrossWt != 0) { ?>
                                                    <!--                        <tr>
                                                                        <td align="right" class="blackCalibri13Font" colspan="3">
                                                                            <div class="spaceRight5">  SILVER VALUATION :</div>
                                                                        </td>
                                                                        <td align="right" class="blackCalibri13Font">
                                                                            <div class="spaceRight5"> <?php echo formatInIndianStyle($silverFinalVal); ?> </div>
                                                                        </td>
                                                                    </tr>-->
                    <?php } ?>
                </table>

            </td>
            
        </tr>
         </tr>
         </table>
</td>
        <?php if ($totalFinalBalDisplay != '') { ?>
            <tr>
                <td colspan="12"></td>
                <td colspan="4">
                    <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                        <tr>
                            <td align="right" class="blackCalibri13FontBold" colspan="3">
                                <div class="spaceRight5"> <b>TOTAL VALUATION  :</b></div>
                            </td>
                            <td align="right" class="blackCalibri13FontBold">
                                <div class="spaceRight5"> <?php echo formatInIndianStyle($totalFinalBalDisplay); ?> </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <?php
        }
        ?>
        <?php if ($sellPanelName == 'ItemApproval' || $sellPanelName == 'ItemApprovalUp') { ?>
            <tr>
                <td align="left" colspan="26" class="paddingTop4 padBott4">
                    <div class="hrGold"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="approvalItemCount" name="approvalItemCount" value="<?php echo $approvalItemCount; ?>" />
                    <div style="text-align: center; padding: 10px;margin-left:18%; position: absolute">                        
                    </div>
                </td>
            </tr>                
            <?php
        }
    }
}
?>
