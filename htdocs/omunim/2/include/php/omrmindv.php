<?php
/*
 * **************************************************************************************
 * @tutorial: Invoice Div @PRIYANKA-02JUNE2021
 * **************************************************************************************
 * 
 * Created on JUNE 02, 2021 04:11:45 PM
 *
 * @FileName: omrmindv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.53
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
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
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
if ($mainPanelDiv == '') {
    $mainPanelDiv = $_GET['mainPanel'];
}

//End Code To Select FirmId

if ($rawPanelName == '')
    $rawPanelName = $_GET['panelName'];

if ($sttr_invoice_no == '') {
    $sttr_pre_invoice_no = $_GET['preInvNo'];
    $sttr_invoice_no = $_GET['postInvNo'];
}

if ($payPanelName == '') {
    $payPanelName = $_GET['payPanelName'];
}

if ($payPanelName == '') {
    $payPanelName = $_GET['paymentPanelName'];
}

if ($invPanel == '')
    $invPanel = $_GET['invPanel'];

if ($otherChgsBy == '') {
    $otherChgsBy = $_GET['othChgsBy'];
}

if ($userId == '') {
    $userId = $_GET['userId'];
}

if ($metType == '') {
    $metType = $_GET['metType'];
}

//echo '$strFrmId == '.$strFrmId.'<br />';
//echo '$rwprId == '.$rwprId.'<br />';
//echo '$userId == '.$userId.'<br />';
//echo '$rawPanelName == '.$rawPanelName.'<br />';
//echo '$transactionPanel == '.$transactionPanel.'<br />';
//echo '$payPanelName == '.$payPanelName.'<br />';
//echo '$rawPanelName == '.$rawPanelName.'<br />';
//echo '$mainPanelDiv == '.$mainPanelDiv.'<br />';
//echo '$metType == '.$metType.'<br />';

if ($panelName != 'SellValues') {
    ?>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left" style="border: 1px solid #d0d0d0;background: #fff;margin-top: 10px;">
        <?php
    }
    if ($mainPanelDiv == 'Customer' || $mainPanelDiv == 'Supplier') {

        if ($mainPanelDiv == 'Supplier') {
            $stockType = 'AddSuppRawStock';
        } else {
            $stockType = 'AddCustRawStock';
        }

        if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $payPanelName == 'RawPayUp' || $panelName == 'SellValues') {
            if ($metType == 'SELL')
                $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator IN ('rawMetal','crystal') AND sttr_transaction_type = 'sell' AND sttr_pre_invoice_no='$sttr_pre_invoice_no' AND sttr_invoice_no='$sttr_invoice_no' AND sttr_user_id='$userId' and sttr_status NOT IN ('DELETED') ORDER BY sttr_id Desc";
            else
            if ($sttr_pre_invoice_no != '')
                $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator IN ('rawMetal','crystal') AND sttr_transaction_type = 'PURBYSUPP' AND sttr_pre_invoice_no='$sttr_pre_invoice_no' AND sttr_invoice_no='$sttr_invoice_no' AND sttr_user_id='$userId' and sttr_status NOT IN ('DELETED')  ORDER BY sttr_id Desc";
            else
                $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator IN ('rawMetal','crystal') AND sttr_transaction_type = 'PURBYSUPP' AND sttr_pre_invoice_no IS NULL AND sttr_invoice_no='$sttr_invoice_no' AND sttr_user_id='$userId' and sttr_status NOT IN ('DELETED') ORDER BY sttr_id Desc";


            $resItemDetails = mysqli_query($conn, "$selItemDetails");
        } else {
            if ($metType == 'SELL')
                $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator IN ('rawMetal','crystal') AND sttr_transaction_type = 'sell' and sttr_status='PaymentPending' AND sttr_user_id='$userId' and sttr_firm_id IN ($strFrmId) ORDER BY sttr_id Desc";
            else
                $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_indicator IN ('rawMetal','crystal') AND sttr_transaction_type = 'PURBYSUPP' and sttr_status='PaymentPending' AND sttr_user_id='$userId' and sttr_firm_id IN ($strFrmId)  ORDER BY sttr_id Desc";
            $resItemDetails = mysqli_query($conn, $selItemDetails);
        }
    } else {

        if ($payPanelName == 'RawPayment' || $rawPanelName == 'RawPayUp' || $payPanelName == 'RawPayUp' || $rawPanelName == 'RawDetUpPanel') {
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator IN ('rawMetal','crystal') AND sttr_transaction_type = 'PURBYSUPP' and sttr_id='$sttr_id' and sttr_status NOT IN ('DELETED')  ORDER BY sttr_id Desc";
            $resItemDetails = mysqli_query($conn, "$selItemDetails");
        } else {
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_transaction_type = 'PURBYSUPP' and sttr_status='PaymentPending' and sttr_firm_id IN ($strFrmId) and sttr_indicator IN ('rawMetal','crystal') and sttr_status NOT IN ('DELETED')  ORDER BY sttr_id Desc";
            $resItemDetails = mysqli_query($conn, $selItemDetails);
        }
    }
    
    $totalCounter = mysqli_num_rows($resItemDetails);

    //echo '$selItemDetails == '.$selItemDetails.'<br />';

    $counter = 1;
    $goldFinalVal = 0;
    $totalItemsQTY = 0;
    $totalGoldQuant = 0;
    $totalGoldVal = 0;
    $totDiscount = 0;
    $totalSilverVal = 0;
    $totalSilverQuant = 0;
    $totalValuation = 0;
    $totalFinalValuation = 0;
    $totalFinalBalance = 0;
    $totalCryVal = 0;
    $goldTotGrossWt = 0;
    $goldTotGrossWtType = 'GM';
    $goldTotFFineWt = 0;
    $goldTotFFineWtratecut=0;
    $goldTotFFineWtType = 'GM';
    $goldTotNetWt = 0;
    $goldTotNetWtType = 'GM';
    $silverTotGrossWt = 0;
    $silverTotGrossWtType = 'GM';
    $silverTotNetWt = 0;
    $silverTotNetWtType = 'GM';
    $silverTotFFineWt = 0;
    $silverTotFFineWtratecut=0;
    $silverTotFFineWtType = 'GM';
    $goldTotVal = 0;
    $silverTotVal = 0;
    $totAmtBal = 0;
    $totalTax = 0;
    $rateWithTaxVal = 0;
    $totalMetalAmnt = 0;
    $totMakingCharge = 0;
    $utin_oth_chgs_amt = 0;
    $utin_crystal_amt = 0;
    $totalCrystalVal = 0;
    $slPrCryValuation = 0;
    $crystalTotVal = 0;
    $crystalTotGrossWt = 0;
    $crystalTotGrossWtType = 'CT';
    $crystalTotNetWt = 0;
    $crystalTotNetWtType = 'CT';
    $crystalTotFFineWt = 0;
    $crystalTotFFineWtType = 'CT';
    $totalCrystalQuant = 0;
    $totalFinalBalDisplay = 0;
    if ($metType == 'SELL') {
        $utin_CRDR = 'DR'; // CHANGE CRDR FOR SELL ENTRY @PRIYANKA-26MAY18
        while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {

            $rwprId = $rowItemDetails['sttr_id'];
            $firmId = $rowItemDetails['sttr_firm_id'];
            $suppId = $rowItemDetails['sttr_user_id'];
            $suppName = $rowItemDetails['sttr_brand_id'];
            $accId = $rowItemDetails['sttr_account_id'];
            $itemAddDate = $rowItemDetails['sttr_add_date'];

            $sttr_barcode_prefix = $rowItemDetails['sttr_barcode_prefix'];
            $sttr_barcode = $rowItemDetails['sttr_barcode'];
            $sttr_rfid_no = $rowItemDetails['sttr_rfid_no'];
            $sttr_user_id = $rowItemDetails['sttr_user_id'];
            $sttr_firm_id = $rowItemDetails['sttr_firm_id'];
            $sttr_item_pre_id = $rowItemDetails['sttr_item_pre_id'];
            $sttr_item_id = $rowItemDetails['sttr_item_id'];
            $sttr_brand_id = $rowItemDetails['sttr_brand_id'];
            $sttr_counter_name = $rowItemDetails['sttr_counter_name'];
            $sttr_pre_invoice_no = $rowItemDetails['sttr_pre_invoice_no'];
            $sttr_invoice_no = $rowItemDetails['sttr_invoice_no'];
            $sttr_stock_type = $rowItemDetails['sttr_stock_type'];
            $sttr_location = $rowItemDetails['sttr_location'];
            $sttr_transaction_type = $rowItemDetails['sttr_transaction_type'];
            $utin_date = $rowItemDetails['sttr_add_date'];

            $metalType = $rowItemDetails['sttr_metal_type'];
            $newPreInvoiceNo = $rowItemDetails['sttr_pre_invoice_no'];
            $newInvoiceNo = $rowItemDetails['sttr_invoice_no'];
            $metalName = $rowItemDetails['sttr_item_name'];
            $totalItemsQTY += $rowItemDetails['sttr_quantity'];
            $totalValuation += $rowItemDetails['sttr_valuation'];
            $slPrCryValuation = $rowItemDetails['sttr_stone_valuation'];
            $totalFinalBalance += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
            $totalFinalBalDisplay += $rowItemDetails['sttr_final_valuation'];
            $totalFinalValuation += $rowItemDetails['sttr_final_valuation'];
            $rate = $rowItemDetails['sttr_metal_rate'];
            $itemTax = $rowItemDetails['sttr_tax'];
            $payPreInvoiceNo = $newPreInvoiceNo;
            $payInvoiceNo = $newInvoiceNo;
            $userId = $suppId;
            $totalAmnt = om_round($totalFinalBalance);
            $itemStatus = $rowItemDetails['sttr_status'];

            if ($firmIdSelected == '') {
                $firmIdSelected = $firmId;
            }

            $slPrItemFFNW = $rowItemDetails['sttr_final_fine_weight'];
            $wtType = $rowItemDetails['sttr_nt_weight_type'];
            $slPrTotItemLabChrg = 0;

            if ($rowItemDetails['sttr_lab_charges'] != '') {

                if ($rowItemDetails['sttr_lab_charges_type'] == 'KG') {

                    if ($wtType == 'KG')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                    else if ($wtType == 'GM')
                        $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / 1000) * $slPrItemFFNW;
                    else
                        $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / (1000 * 1000)) * $slPrItemFFNW;
                }
                else if ($rowItemDetails['sttr_lab_charges_type'] == 'GM') {

                    if ($wtType == 'KG')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * $slPrItemFFNW;
                    else if ($wtType == 'GM')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                    else
                        $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / 1000) * $slPrItemFFNW;
                }
                else if ($rowItemDetails['sttr_lab_charges_type'] == 'MG') {

                    if ($wtType == 'KG')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * 1000 * $slPrItemFFNW;
                    else if ($wtType == 'GM') {
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * $slPrItemFFNW;
                    } else
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                }
                else if ($rowItemDetails['sttr_lab_charges_type'] == 'PP') {

                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $rowItemDetails['sttr_quantity'];
                } else if ($rowItemDetails['sttr_lab_charges_type'] == 'CT') {

                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $rowItemDetails['sttr_nt_weight'];
                } else if ($rowItemDetails['sttr_lab_charges_type'] == 'per') {

                    $gsWt = $rowItemDetails['sttr_gs_weight'];
                    $gsWtTyp = $rowItemDetails['sttr_gs_weight_type'];
                    $labNOthCharges = ($rowItemDetails['sttr_lab_charges'] * $gsWt) / 100;

                    if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'Other') {
                        if ($gsWtTyp == 'KG') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) * 100);
                        } else if ($gsWtTyp == 'GM') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / 10);
                        } else if ($gsWtTyp == 'MG') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / (100 * 100));
                        }
                    } else if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                        if ($gsWtTyp == 'KG') {
                            $slPrTotItemLabChrg = ($labNOthCharges * $rowItemDetails['sttr_metal_rate']);
                        } else if ($gsWtTyp == 'GM') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / 1000);
                        } else if ($gsWtTyp == 'MG') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / (1000 * 1000) );
                        }
                    }
                }
            }

            // Start Code for Crystal Valuation @Author:PRIYANKA-15MAR19        
            $stockFinalStoneValuation = 0;
            $stockFinalStoneWt = 0;

            //echo '$slPrCryValuation @@== '.$slPrCryValuation.'<br />';

            $selStoneQuery1 = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stockCrystal' "
                    . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$rwprId'";

            $stoneResult1 = mysqli_query($conn, $selStoneQuery1);

            while ($stoneRowDetails1 = mysqli_fetch_array($stoneResult1, MYSQLI_ASSOC)) {
                
                $stockFinalStoneValuation += $stoneRowDetails1['sttr_valuation'];
                
                $cryGsWt = $stoneRowDetails1['sttr_gs_weight'];
                $cryGsWtType = $stoneRowDetails1['sttr_gs_weight_type'];
                
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
                
                $stockFinalStoneWt = $crystalTotGrossWt;
                $stoneWtType = 'CT';

                $stoneTransType = $stoneRowDetails1['sttr_transaction_type'];

                if ($stoneTransType == '' || $stoneTransType == NULL) {

                    $updateQueryStone = "UPDATE stock_transaction SET sttr_barcode_prefix = '$sttr_barcode_prefix', "
                            . "sttr_barcode = '$sttr_barcode', sttr_rfid_no = '$sttr_rfid_no', "
                            . "sttr_user_id = '$sttr_user_id', sttr_firm_id = '$sttr_firm_id', "
                            . "sttr_item_pre_id = '$sttr_item_pre_id', sttr_item_id = '$sttr_item_id', "
                            . "sttr_brand_id = '$sttr_brand_id', sttr_counter_name = '$sttr_counter_name', "
                            . "sttr_pre_invoice_no = '$sttr_pre_invoice_no', sttr_invoice_no = '$sttr_invoice_no', "
                            . "sttr_stock_type = '$sttr_stock_type', "
                            . "sttr_location = '$sttr_location', sttr_transaction_type = '$sttr_transaction_type' "
                            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_sttr_id = '$rwprId' "
                            . "AND sttr_indicator = 'stockCrystal'";

                    if (!mysqli_query($conn, $updateQueryStone)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
            }

            $updateQuery1 = "UPDATE stock_transaction SET sttr_stone_valuation = '$stockFinalStoneValuation', "
                    . "sttr_stone_wt = '$stockFinalStoneWt', sttr_stone_wt_type = '$stoneWtType' "
                    . "WHERE sttr_indicator IN ('rawMetal','crystal') "
                    . "and sttr_status NOT IN ('DELETED') and sttr_id = '$rwprId'";

            if (!mysqli_query($conn, $updateQuery1)) {
                die('Error: ' . mysqli_error($conn));
            }

            $slPrCryValuation = $stockFinalStoneValuation;

            //echo '$slPrCryValuation == '.$slPrCryValuation.'<br />';
            
            // End Code for Crystal Valuation @Author:PRIYANKA-15MAR19        

            $newItemTaxChrg = ($rowItemDetails['sttr_valuation'] * $itemTax / 100);

            if ($newItemTaxChrg == '' || $newItemTaxChrg == NULL) {
                $newItemTaxChrg = 0;
            }

            parse_str(getTableValues("SELECT DISTINCT met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' AND met_rate_value = '$rate' AND met_rate_metal_name = '$rowItemDetails[sttr_metal_type]'"));

            if ($met_rate_tax_check == 'true') {
                //$rateWithTaxVal = $totalValuation * ($met_rate_tax_percentage / 100);
                //$newItemTaxChrg = $newItemTaxChrg - $rateWithTaxVal;
                //$rate = $met_rate_with_tax;
            }

            $totalMetalVal = $rowItemDetails['sttr_valuation'] + $newItemTaxChrg;
            $finalMetalVal += $totalMetalVal;

            $utin_crystal_amt += $slPrCryValuation;
            $totalCrystalVal += $slPrCryValuation;

            //echo '$utin_crystal_amt == '.$utin_crystal_amt.'<br />';
            //echo '$totalCrystalVal == '.$totalCrystalVal.'<br />';

            if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'Other') {
                $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                        . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$rwprId'";
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
                        
                        $crystalTotNetWtType = 'CT';
                        $crystalTotFFineWt += getTotalWeight($resStoneDetails['sttr_final_fine_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight');
                        $crystalTotFFineWtType = 'CT';
                        $crystalRate = $resStoneDetails['sttr_metal_rate'];
                        $totalCrystalQuant += $resStoneDetails['sttr_quantity'];
                        $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                        $totalOthCryChgs += $totalCryTax;
                        //$totalCrystalBalance += $resStoneDetails['sttr_valuation'] - $slPrTotItemLabChrg;
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
                $goldTotVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $goldTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $goldTotGrossWtType = 'GM';
                $goldTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $goldTotNetWtType = 'GM';
                $goldTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byNetWt') {
                $goldTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                 } else if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byGsWt') {
                $goldTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                } else {
                $goldTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
               }
                $goldTotFFineWtType = 'GM';
                $goldRate = $rowItemDetails['sttr_metal_rate'];
                $totalGoldQuant += $rowItemDetails['sttr_quantity'];
                $totalGdTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                $totalOthGdChgs += $totalGdTax;
                $totalGoldBalance += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                $goldPurchaseAvgRate1 += ($goldRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                $goldPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }

            if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                //
                $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                        . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$rwprId'";
                
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

                        $crystalTotNetWtType = 'CT';
                        $crystalTotFFineWt += getTotalWeight($resStoneDetails['sttr_final_fine_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight');
                        $crystalTotFFineWtType = 'CT';
                        $crystalRate = $resStoneDetails['sttr_metal_rate'];
                        $totalCrystalQuant += $resStoneDetails['sttr_quantity'];
                        $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                        $totalOthCryChgs += $totalCryTax;
                        //$totalCrystalBalance += $resStoneDetails['sttr_valuation'] - $slPrTotItemLabChrg;
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
                //
                $silverTotVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $silverTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $silverTotGrossWtType = 'GM';
                $silverTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $silverTotNetWtType = 'GM';
                $silverTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byNetWt') {
                $silverTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                 } else if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byGsWt') {
                $silverTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                } else {
                $silverTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
               }
                $silverTotFFineWtType = 'GM';
                $silverRate = $rowItemDetails['sttr_metal_rate'];
                $totalSilverQuant += $rowItemDetails['sttr_quantity'];
                $totalSlTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                $totalOthSlChgs += $totalSlTax;
                $totalSilverBalance += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                $silverPurchaseAvgRate1 += ($silverRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; // / (getTotalWeight($rowItemDetails['utin_fine_wt'], $rowItemDetails['utin_nt_weight_type'], 'weight') / 10)), 2);
                $silverPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }

            if ($rowItemDetails['sttr_metal_type'] == 'crystal') {

                $crystalTotVal += $rowItemDetails['sttr_final_valuation'];
                $cryGsWt = $rowItemDetails['sttr_gs_weight'];
                $cryGsWtType = $rowItemDetails['sttr_gs_weight_type'];

                $readWritefile = fopen("ompprdwr.php", "a");
                fwrite($readWritefile, '$cryGsWt' . $cryGsWt);
                fwrite($readWritefile, '$cryGsWtType' . $cryGsWtType);
                fclose($readWritefile);

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
                $cryNetWt = $rowItemDetails['sttr_nt_weight'];
                $cryNetWtType = $rowItemDetails['sttr_nt_weight_type'];
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

                $crystalTotNetWtType = 'CT';
                $crystalTotFFineWt += $crystalNtWt;
                $crystalTotFFineWtType = 'CT';
                $crystalRate = $rowItemDetails['sttr_metal_rate'];
                $totalCrystalQuant += $rowItemDetails['sttr_quantity'];
                $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                $totalOthCryChgs += $totalCryTax;
                $totalCrystalBalance += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                $crystalPurchaseAvgRate1 += ($crystalRate * $crystalNtWt) / 100; 
                $crystalPurchaseAvgRate2 += $crystalNtWt;
            }

            $totalMetalAmnt += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
            $totalAmount += $rowItemDetails['sttr_final_valuation'];

            $totalLabOrMkgCharges += $slPrTotItemLabChrg;
            $totalTaxAmount += $newItemTaxChrg;

            if ($itemStatus == 'PaymentPending') {
                $payPanelName = 'RawPayment';
                $transPanelName = 'SellPayment';
            }

            if ($itemStatus == 'PaymentDone') {
                $payPanelName = 'RawPayUp';
                $transPanelName = 'SellPayUp';
            }

            parse_str(getTableValues("SELECT met_rate_per_wt,met_rate_per_wt_tp FROM metal_rates "
                            . "where met_rate_own_id='$sessionOwnerId' and met_rate_value='$itemMetalRate' order by met_rate_id desc LIMIT 0, 1"));

            if ($met_rate_per_wt == '') {
                if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'Other') {
                    $ratePerWt = '/' . 10 . 'GM';
                }
                if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                    $ratePerWt = '/' . 'KG';
                }
                if ($rowItemDetails['sttr_metal_type'] != 'Gold' && $rowItemDetails['sttr_metal_type'] != 'Silver') {
                    $ratePerWt = '';
                }
            } else {
                $ratePerWt = '/' . $met_rate_per_wt . $met_rate_per_wt_tp;
            }

            if ($panelName != 'SellValues') {
                if ($counter == 1) {
                    //if ($invPanel == 'RawInvoice') {
                    ?>
                    <tr>
                        <td colspan="18">
                            <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
                                <tr>
                                    <?php if ($mainPanelDiv == 'Customer' || $mainPanelDiv == 'Supplier') { ?>
                                        <td align="right" class="itemAddPnLabels14 paddingTop7" width="540px">
                                            <span class="main_link_brown">INVOICE NO: </span>
                                            <span class="fs_14 ff_calibri black">
                                                <?php echo $newPreInvoiceNo . '' . $newInvoiceNo; ?>
                                            </span>
                                        </td>
                                    <?php } ?>
                                    <td align="right" valign="middle" width="430px" class="paddingRight10">
                                        <div id="rawMessDisplay" class="analysis_div_rows">
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
                    <?php // } ?>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr style="background: #ffe2ab;">
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM NAME" >
                            ITEM NAME
                        </td>
                        <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL / RATE" >
                            <div class="spaceLeft5">METAL</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL TYPE" >
                            <div class="spaceLeft5">METAL TYPE</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="QUANTITY" >
                            QTY
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="GROSS WEIGHT" >
                            <div class="spaceRight5">GS WT</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="NET WEIGHT" >
                            <div class="spaceRight5">NT WT</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TUNCH/PURITY + WASTAGE">
                            <div class="spaceRight5">PURITY</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINE WEIGHT">
                            <div class="spaceRight5">FFN WGT</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="LABOUR CHARGES">
                            <div class="spaceRight5">LAB CHGS</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION" >
                            <div class="spaceRight5">VAL</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX" >
                            TAX
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION" >
                            <div class="spaceRight5">TOTAL VAL</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font border-color-grey-b" title="ITEM DELETE"  colspan="2">
                            DEL
                        </td>
                    </tr>
                <?php } $counter = 2; ?>
                <tr>
                    <td align="center" class="blackCalibri13Font border-color-grey-rb">
                        <a style="cursor: pointer;" title="Single click to view Item Details!"
                           onclick="showUserAssignOrdersDetailsDiv('<?php echo $documentRoot; ?>', '<?php echo $rwprId; ?>',
                                           'RawDetUpPanel', '', '<?php echo $mainPanelDiv; ?>', '<?php echo $transactionPanel; ?>', '', '<?php echo $newPreInvoiceNo . ';' . $newInvoiceNo; ?>', '<?php echo $metType; ?>');">
                            <div class="itemAddPnLabels11ArialLink"><?php echo om_strtoupper(substr($rowItemDetails['sttr_item_name'], 0, 13)); ?></div>
                        </a>
                    </td>
                    <td align="left" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceLeft5"><?php echo om_strtoupper($rowItemDetails['sttr_metal_type'] . "/" . $rowItemDetails['sttr_metal_rate']); ?></div>
                    </td>
                    <td align="left" class="blackCalibri13Font border-color-grey-rb" title="<?php echo $rowItemDetails['sttr_item_category']; ?>" >
                        <div class="spaceLeft5"><?php echo om_strtoupper($rowItemDetails['sttr_item_category']); ?></div>
                    </td>
                    <td align="center" class="blackCalibri13Font border-color-grey-rb">
                        <?php echo $rowItemDetails['sttr_quantity']; ?>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_gs_weight'], 3) . ' ' . $rowItemDetails['sttr_gs_weight_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_nt_weight'], 3) . ' ' . $rowItemDetails['sttr_nt_weight_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo $rowItemDetails['sttr_purity'] . ' + ' . $rowItemDetails['sttr_wastage'] . '%'; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_final_fine_weight'], 3) . ' ' . $rowItemDetails['sttr_nt_weight_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_lab_charges'], 3) . ' ' . $rowItemDetails['sttr_lab_charges_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb" title="<?php echo ($rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg) . ' - ' . $slPrTotItemLabChrg; ?>">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_valuation']); ?></div>
                    </td>
                    <td align="center" class="blackCalibri13Font border-color-grey-rb">
                        <?php
                        if ($newItemTaxChrg != '')
                            echo om_round($newItemTaxChrg);
                        else
                            echo '-';
                        ?>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_final_valuation']); ?></div>
                    </td>
                    <td colspan="2" align="center" class="blackCalibri13Font border-color-grey-only-bottom">
                        <a style="cursor: pointer;" onclick="deleteRawMetalToCashItem('<?php echo $rwprId; ?>', '', '<?php echo $rawPanelName; ?>', '<?php echo $payPanelName; ?>', '', '', '<?php echo $mainPanelDiv; ?>', 'SELL', '<?php echo $userId; ?>');">
                            <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="marginTop5" />
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
    } else {
        $utin_CRDR = 'CR'; // CHANGE CRDR FOR PURCHASE ENTRY @PRIYANKA-27MAY18        
        while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {

            $rwprId = $rowItemDetails['sttr_id'];
            $firmId = $rowItemDetails['sttr_firm_id'];
            $suppId = $rowItemDetails['sttr_user_id'];
            $suppName = $rowItemDetails['sttr_brand_id'];
            $accId = $rowItemDetails['sttr_account_id'];
            $itemAddDate = $rowItemDetails['sttr_add_date'];
            $metalType = $rowItemDetails['sttr_metal_type'];
            $newPreInvoiceNo = $rowItemDetails['sttr_pre_invoice_no'];
            $newInvoiceNo = $rowItemDetails['sttr_invoice_no'];
            $metalName = $rowItemDetails['sttr_item_name'];
            $totalItemsQTY += $rowItemDetails['sttr_quantity'];
            $totalValuation += $rowItemDetails['sttr_valuation'];
            $slPrCryValuation = $rowItemDetails['sttr_stone_valuation'];
            $totalFinalBalance += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
            $totalFinalBalDisplay += $rowItemDetails['sttr_final_valuation'];
            //echo '$totalFinalBalDisplay='.$totalFinalBalDisplay;
            $totalFinalValuation += $rowItemDetails['sttr_final_valuation'];
            $utin_date = $rowItemDetails['sttr_add_date'];

            $rate = $rowItemDetails['sttr_metal_rate'];
            $itemTax = $rowItemDetails['sttr_tax'];

            $payPreInvoiceNo = $newPreInvoiceNo;
            $payInvoiceNo = $newInvoiceNo;
            $userId = $suppId;
            $totalAmnt = om_round($totalFinalBalance);
            $itemStatus = $rowItemDetails['sttr_status'];

            if ($firmIdSelected == '') {
                $firmIdSelected = $firmId;
            }

            $slPrItemFFNW = $rowItemDetails['sttr_final_fine_weight'];
            $wtType = $rowItemDetails['sttr_nt_weight_type'];
            $slPrTotItemLabChrg = 0;

            if ($rowItemDetails['sttr_lab_charges'] != '') {
                if ($rowItemDetails['sttr_lab_charges_type'] == 'KG') {

                    if ($wtType == 'KG')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                    else if ($wtType == 'GM')
                        $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / 1000) * $slPrItemFFNW;
                    else
                        $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / (1000 * 1000)) * $slPrItemFFNW;
                }
                else if ($rowItemDetails['sttr_lab_charges_type'] == 'GM') {

                    if ($wtType == 'KG')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * $slPrItemFFNW;
                    else if ($wtType == 'GM')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                    else
                        $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / 1000) * $slPrItemFFNW;
                }
                else if ($rowItemDetails['sttr_lab_charges_type'] == 'MG') {

                    if ($wtType == 'KG')
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * 1000 * $slPrItemFFNW;
                    else if ($wtType == 'GM') {
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * $slPrItemFFNW;
                    } else
                        $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                }
                else if ($rowItemDetails['sttr_lab_charges_type'] == 'PP') {

                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $rowItemDetails['sttr_quantity'];
                } else if ($rowItemDetails['sttr_lab_charges_type'] == 'CT') {

                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $rowItemDetails['sttr_nt_weight'];
                } else if ($rowItemDetails['sttr_lab_charges_type'] == 'per') {

                    $gsWt = $rowItemDetails['sttr_gs_weight'];
                    $gsWtTyp = $rowItemDetails['sttr_gs_weight_type'];
                    $labNOthCharges = ($rowItemDetails['sttr_lab_charges'] * $gsWt) / 100;
                    if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'Othe') {
                        if ($gsWtTyp == 'KG') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) * 100);
                        } else if ($gsWtTyp == 'GM') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / 10);
                        } else if ($gsWtTyp == 'MG') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / (100 * 100));
                        }
                    } else if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                        if ($gsWtTyp == 'KG') {
                            $slPrTotItemLabChrg = ($labNOthCharges * $rowItemDetails['sttr_metal_rate']);
                        } else if ($gsWtTyp == 'GM') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / 1000);
                        } else if ($gsWtTyp == 'MG') {
                            $slPrTotItemLabChrg = (($labNOthCharges * $rowItemDetails['sttr_metal_rate']) / (1000 * 1000) );
                        }
                    }
                }
            }
            // Start Code for Crystal Valuation @Author:PRIYANKA-15MAR19            
            $stockFinalStoneValuation = 0;
            $stockFinalStoneWt = 0;

            //echo '$slPrCryValuation @@== '.$slPrCryValuation.'<br />';
            
            //if ($slPrCryValuation == '' || $slPrCryValuation == 0 || $slPrCryValuation == NULL) {

            $selStoneQuery1 = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stockCrystal' "
                    . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$rwprId'";

            $stoneResult1 = mysqli_query($conn, $selStoneQuery1);

            while ($stoneRowDetails1 = mysqli_fetch_array($stoneResult1, MYSQLI_ASSOC)) {
                $stockFinalStoneValuation += $stoneRowDetails1['sttr_valuation'];
                
                $cryGsWt = $stoneRowDetails1['sttr_gs_weight'];
                $cryGsWtType = $stoneRowDetails1['sttr_gs_weight_type'];
                
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
                
                $stockFinalStoneWt = $crystalTotGrossWt;
                $stoneWtType = 'CT';

                $stoneTransType = $stoneRowDetails1['sttr_transaction_type'];

                if ($stoneTransType == '' || $stoneTransType == NULL) {

                    $updateQueryStone = "UPDATE stock_transaction SET sttr_barcode_prefix = '$sttr_barcode_prefix', "
                            . "sttr_barcode = '$sttr_barcode', sttr_rfid_no = '$sttr_rfid_no', "
                            . "sttr_user_id = '$sttr_user_id', sttr_firm_id = '$sttr_firm_id', "
                            . "sttr_item_pre_id = '$sttr_item_pre_id', sttr_item_id = '$sttr_item_id', "
                            . "sttr_brand_id = '$sttr_brand_id', sttr_counter_name = '$sttr_counter_name', "
                            . "sttr_pre_invoice_no = '$sttr_pre_invoice_no', sttr_invoice_no = '$sttr_invoice_no', "
                            . "sttr_stock_type = '$sttr_stock_type', "
                            . "sttr_location = '$sttr_location', sttr_transaction_type = '$sttr_transaction_type' "
                            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_sttr_id = '$rwprId' "
                            . "AND sttr_indicator = 'stockCrystal'";

                    if (!mysqli_query($conn, $updateQueryStone)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
            }

            $updateQuery1 = "UPDATE stock_transaction SET sttr_stone_valuation = '$stockFinalStoneValuation', "
                    . "sttr_stone_wt = '$stockFinalStoneWt', sttr_stone_wt_type = '$stoneWtType' "
                    . "WHERE sttr_indicator IN ('rawMetal','crystal') "
                    . "and sttr_status NOT IN ('DELETED') and sttr_id = '$rwprId'";

            if (!mysqli_query($conn, $updateQuery1)) {
                die('Error: ' . mysqli_error($conn));
            }

            $slPrCryValuation = $stockFinalStoneValuation;

            //echo '$slPrCryValuation == '.$slPrCryValuation.'<br />';
            //}
            
            // End Code for Crystal Valuation @Author:PRIYANKA-15MAR19  

            $newItemTaxChrg = ($rowItemDetails['sttr_valuation'] * $itemTax / 100);

            if ($newItemTaxChrg == '' || $newItemTaxChrg == NULL) {
                $newItemTaxChrg = 0;
            }

            parse_str(getTableValues("SELECT DISTINCT met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax "
                            . "FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' "
                            . "AND met_rate_value = '$rate' "
                            . "AND met_rate_metal_name = '$rowItemDetails[sttr_metal_type]'"));

            if ($met_rate_tax_check == 'true') {
                //$rateWithTaxVal = $totalValuation * ($met_rate_tax_percentage / 100);
                //$newItemTaxChrg = $newItemTaxChrg - $rateWithTaxVal;
                //$rate = $met_rate_with_tax;
            }

            $totalMetalVal = $rowItemDetails['sttr_valuation'] + $newItemTaxChrg;
            $finalMetalVal += $totalMetalVal;

            $utin_crystal_amt += $slPrCryValuation;
            $totalCrystalVal += $slPrCryValuation;

            //echo '$utin_crystal_amt == '.$utin_crystal_amt.'<br />';
            //echo '$totalCrystalVal == '.$totalCrystalVal.'<br />';

            if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'Other') {
                //
                //
                $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                        . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$rwprId'";
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

                        $crystalTotNetWtType = 'CT';
                        $crystalTotFFineWt += getTotalWeight($resStoneDetails['sttr_final_fine_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight');
                        $crystalTotFFineWtType = 'CT';
                        $crystalRate = $resStoneDetails['sttr_metal_rate'];
                        $totalCrystalQuant += $resStoneDetails['sttr_quantity'];
                        $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                        $totalOthCryChgs += $totalCryTax;
                        //$totalCrystalBalance += $resStoneDetails['sttr_valuation'] - $slPrTotItemLabChrg;
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
                //
                $goldTotVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $goldTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $goldTotGrossWtType = 'GM';
                $goldTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $goldTotNetWtType = 'GM';
                $goldTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byNetWt') {
                $goldTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                 } else if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byGsWt') {
                $goldTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                } else {
                $goldTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
               }
                $goldTotFFineWtType = 'GM';
                $goldRate = $rowItemDetails['sttr_metal_rate'];
                $totalGoldQuant += $rowItemDetails['sttr_quantity'];
                $totalGoldVal += $rowItemDetails['sttr_final_valuation'];
                $totalOthGdChgs += $newItemTaxChrg + $slPrTotItemLabChrg;
                $totalGoldBalance += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                $goldPurchaseAvgRate1 += ($goldRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                $goldPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }

            if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                //
                //
                $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                        . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$rwprId'";
                
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

                        $crystalTotNetWtType = 'CT';
                        $crystalTotFFineWt += getTotalWeight($resStoneDetails['sttr_final_fine_weight'], $resStoneDetails['sttr_nt_weight_type'], 'weight');
                        $crystalTotFFineWtType = 'CT';
                        $crystalRate = $resStoneDetails['sttr_metal_rate'];
                        $totalCrystalQuant += $resStoneDetails['sttr_quantity'];
                        $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                        $totalOthCryChgs += $totalCryTax;
                        //$totalCrystalBalance += $resStoneDetails['sttr_valuation'] - $slPrTotItemLabChrg;
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
                //
                $silverTotVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $silverTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $silverTotGrossWtType = 'GM';
                $silverTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $silverTotNetWtType = 'GM';
                $silverTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byNetWt') {
                $silverTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                 } else if ($rowItemDetails['sttr_ratecut_norate_option'] == 'byGsWt') {
                $silverTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                } else {
                $silverTotFFineWtratecut += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
               }
                $silverTotFFineWtType = 'GM';
                $silverRate = $rowItemDetails['sttr_metal_rate'];
                $totalSilverQuant += $rowItemDetails['sttr_quantity'];
                $totalSilverVal += $rowItemDetails['sttr_final_valuation'];
                $totalOthSlChgs += $newItemTaxChrg + $slPrTotItemLabChrg;
                $totalSilverBalance += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                $silverPurchaseAvgRate1 += ($silverRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; // / (getTotalWeight($rowItemDetails['utin_fine_wt'], $rowItemDetails['utin_nt_weight_type'], 'weight') / 10)), 2);
                $silverPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }

            if ($rowItemDetails['sttr_metal_type'] == 'crystal') {
                $crystalTotVal += $rowItemDetails['sttr_final_valuation'];
                $cryGsWt = $rowItemDetails['sttr_gs_weight'];
                $cryGsWtType = $rowItemDetails['sttr_gs_weight_type'];

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

                $cryNetWt = $rowItemDetails['sttr_nt_weight'];
                $cryNetWtType = $rowItemDetails['sttr_nt_weight_type'];
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

                $crystalTotNetWtType = 'CT';
                $crystalTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $crystalTotFFineWtType = 'CT';
                $crystalRate = $rowItemDetails['sttr_metal_rate'];
                $totalCrystalQuant += $rowItemDetails['sttr_quantity'];
                $totalCryTax = $newItemTaxChrg + $slPrTotItemLabChrg;
                $totalOthCryChgs += $totalCryTax;
                $totalCrystalBalance += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
                $crystalPurchaseAvgRate1 += ($crystalRate * getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                $crystalPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }
            if($crystalTotGrossWtType == '' || $crystalTotGrossWtType == NULL){
                 $crystalTotGrossWtType = 'CT';
             }
             if($crystalTotNetWtType == '' || $crystalTotNetWtType == NULL){
                 $crystalTotNetWtType = 'CT';
             }
             if($crystalTotFFineWtType == '' || $crystalTotFFineWtType == NULL){
                 $crystalTotFFineWtType = 'CT';
             }
            $totalLabOrMkgCharges += $slPrTotItemLabChrg;
            $totalTaxAmount += $newItemTaxChrg;
            $totalMetalAmnt += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
            $totalAmount += $rowItemDetails['sttr_final_valuation'];

            if ($itemStatus == 'PaymentPending') {
                $payPanelName = 'RawPayment';
                $transPanelName = 'PurchasePayment';
            }
            if ($itemStatus == 'PaymentDone') {
                $payPanelName = 'RawPayUp';
                $transPanelName = 'PurchasePayUp';
            }

            parse_str(getTableValues("SELECT met_rate_per_wt,met_rate_per_wt_tp FROM metal_rates where met_rate_own_id='$sessionOwnerId' and met_rate_value='$itemMetalRate' order by met_rate_id desc LIMIT 0, 1"));

            if ($met_rate_per_wt == '') {
                if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'Other') {
                    $ratePerWt = '/' . 10 . 'GM';
                }
                if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                    $ratePerWt = '/' . 'KG';
                }
                if ($rowItemDetails['sttr_metal_type'] != 'Gold' && $rowItemDetails['sttr_metal_type'] != 'Silver' && $rowItemDetails['sttr_metal_type'] != 'crystal') {
                    $ratePerWt = '';
                }
            } else {
                $ratePerWt = '/' . $met_rate_per_wt . $met_rate_per_wt_tp;
            }

            parse_str(getTableValues("SELECT sttr_id FROM stock_transaction where "
                            . "sttr_item_pre_id = '$rowItemDetails[sttr_item_pre_id]' "
                            . "and sttr_item_id= '$rowItemDetails[sttr_item_id]'"));

            if ($panelName != 'SellValues') {
                if ($counter == 1) {
                    //if ($invPanel == 'RawInvoice') {
                    ?>
                    <tr>

                        <td colspan="18">
                            <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
                                <tr>
                                    <?php if ($mainPanelDiv == 'Customer' || $mainPanelDiv == 'Supplier') { ?>
                                        <td align="right" class="itemAddPnLabels14 paddingTop7" width="540px">
                                            <span class="main_link_brown">INVOICE NO: </span>
                                            <span class="fs_14 ff_calibri black">
                                                <?php echo $newPreInvoiceNo . '' . $newInvoiceNo; ?>
                                            </span>
                                        </td>
                                    <?php } ?>
                                    <td align="right" valign="middle" width="430px" class="paddingRight10">
                                        <div id="rawMessDisplay" class="analysis_div_rows">
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
                    <?php // } ?>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM NAME" >
                            ITEM NAME
                        </td>
                        <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL / RATE" >
                            <div class="spaceLeft5">METAL</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL TYPE" >
                            <div class="spaceLeft5">METAL TYPE</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="QUANTITY" >
                            QTY
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="GROSS WEIGHT" >
                            <div class="spaceRight5">GS WT</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="NET WEIGHT" >
                            <div class="spaceRight5">NT WT</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TUNCH/PURITY + WASTAGE">
                            <div class="spaceRight5">PURITY</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINE WEIGHT">
                            <div class="spaceRight5">FFN WGT</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="LABOUR CHARGES">
                            <div class="spaceRight5">LAB CHGS</div>
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION" >
                            <div class="spaceRight5">VAL</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX" >
                            TAX
                        </td>

                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION" >
                            <div class="spaceRight5">TOTAL VAL</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font border-color-grey-b" title="ITEM DELETE"  colspan="2">
                            DEL
                        </td>
                    </tr>
                <?php } $counter = 2; ?>
                <tr>
                    <td align="center" class="blackCalibri13Font border-color-grey-rb">
                        <a style="cursor: pointer;" title="Single click to view Item Details!"
                           onclick="showStockItemDetailsDiv('<?php echo $documentRoot; ?>', '<?php echo $rwprId; ?>', 'RawDetUpPanel', '', '<?php echo $mainPanelDiv; ?>', '<?php echo $transactionPanel; ?>', '', '<?php echo $newPreInvoiceNo . ';' . $newInvoiceNo; ?>', '<?php echo $metType; ?>');">
                            <div class="itemAddPnLabels11ArialLink"><?php echo om_strtoupper(substr($rowItemDetails['sttr_item_name'], 0, 13)); ?></div>
                        </a>
                    </td>
                    <td align="left" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceLeft5"><?php echo om_strtoupper($rowItemDetails['sttr_metal_type'] . '/' . $rowItemDetails['sttr_metal_rate']); ?></div>
                    </td>
                    <td align="left" class="blackCalibri13Font border-color-grey-rb" title="<?php echo $rowItemDetails['sttr_item_category']; ?>" >
                        <div class="spaceLeft5"><?php echo om_strtoupper($rowItemDetails['sttr_item_category']); ?></div>
                    </td>
                    <td align="center" class="blackCalibri13Font border-color-grey-rb">
                        <?php echo $rowItemDetails['sttr_quantity']; ?>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_gs_weight'], 3) . ' ' . $rowItemDetails['sttr_gs_weight_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_nt_weight'], 3) . ' ' . $rowItemDetails['sttr_nt_weight_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo $rowItemDetails['sttr_purity'] . ' + ' . $rowItemDetails['sttr_wastage'] . '%'; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_final_fine_weight'], 3) . ' ' . $rowItemDetails['sttr_nt_weight_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo om_round($rowItemDetails['sttr_lab_charges'], 3) . ' ' . $rowItemDetails['sttr_lab_charges_type']; ?></div>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_valuation']); ?></div>
                    </td>
                    <td align="center" class="blackCalibri13Font border-color-grey-rb">
                        <?php
                        if ($newItemTaxChrg != '')
                            echo om_round($newItemTaxChrg);
                        else
                            echo '-';
                        ?>
                    </td>
                    <td align="right" class="blackCalibri13Font border-color-grey-rb">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_final_valuation']); ?></div>
                    </td>
                    <td colspan="2" align="center" class="blackCalibri13Font border-color-grey-only-bottom">
                        <a style="cursor: pointer;" onclick="deleteRawMetalToCashItem('<?php echo $rwprId; ?>', '', '<?php echo $rawPanelName; ?>', '<?php echo $payPanelName; ?>', '', '', '<?php echo $mainPanelDiv; ?>', 'BUY', '<?php echo $userId; ?>');">
                            <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="marginTop5" />
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
    }

    $totOtherChags = $totalOthGdChgs + $totalOthSlChgs + $totalOthStChgs;
    $utin_oth_chgs_amt = $totOtherChags;
    $totMakingCharge = $totalLabOrMkgCharges;

    if ($goldPurchaseAvgRate1 != 0 && $goldPurchaseAvgRate2 != 0) {
        $goldPurchaseAvgRate = om_round(($goldPurchaseAvgRate1 / $goldPurchaseAvgRate2) * 10, 2);
    }

    if ($silverPurchaseAvgRate1 != 0 && $silverPurchaseAvgRate2 != 0) {
        $silverPurchaseAvgRate = om_round(($silverPurchaseAvgRate1 / $silverPurchaseAvgRate2) * 10, 2);
    }

    if ($crystalPurchaseAvgRate1 != 0 && $crystalPurchaseAvgRate2 != 0) {
        $crystalPurchaseAvgRate = om_round(($crystalPurchaseAvgRate1 / $crystalPurchaseAvgRate2) * 10, 2);
    }

    include 'ogcmttwt.php';

    // GOLD TOTAL FIELDS
    $goldQty = $totalGoldQuant;
    $goldFinalVal = $goldTotVal;
    $goldFinalWeight = decimalVal($goldTotFFineWtratecut, 3);
    $goldFinalWeightType = $goldTotFFineWtType;

    // SILVER TOTAL FIELDS
    $silverQty = $totalSilverQuant;
    $silverFinalWeight = decimalVal($silverTotFFineWtratecut, 3);
    $silverFinalWeightType = $silverTotFFineWtType;
    $silverFinalVal = $silverTotVal;

    //CRYSTAL TOTAL FIELDS
    $crystalQty = $totalCrystalQuant;
    $crystalFinalVal = $crystalTotVal;
    $crystalFinalWeight = decimalVal($crystalTotNetWt, 3);
    $crystalFinalWeightType = $crystalTotNetWtType;

    if ($panelName != 'SellValues') {
        if ($totalCounter > 0) {
            if ($goldTotVal != 0) {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="right" class="black fw_n">
                        <b> GOLD STOCK </b>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php echo $totalGoldQuant; ?>
                    </td>
                    <td align="right" class="black fw_n" >
                        <?php if ($goldTotGrossWt != '') { ?> GS WT : <?php }; ?>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php if ($goldTotGrossWt != '') { ?><?php
                            echo om_round($goldTotGrossWt, 3) . ' ' . $goldTotGrossWtType;
                        }
                        ?>
                    </td>
                    <td align="right" class="black fw_n" >
                        <?php if ($goldTotFFineWt != '') { ?> FFN WT : <?php }; ?>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php if ($goldTotFFineWt != '') { ?><?php
                            echo om_round($goldTotFFineWt, 3) . ' ' . $goldTotFFineWtType;
                        }
                        ?>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5 orange">  <?php
                            if ($othChgsGdFnWt != '' && $goldTotFFineWt != '') {
                                echo decimalVal($othChgsGdFnWt, 3) . ' ' . $goldTotFFineWtType;
                            }
                            ?>
                        </div>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5 darkblueFont">  <?php
                            if ($othChgsGdFnWt != '' && $goldTotFFineWt != '') {
                                echo decimalVal($totFinGdWt, 3) . ' ' . $goldTotFFineWtType;
                            }
                            ?>
                        </div>
                    </td>                                                                                                                   <!--<td colspan="1"></td>-->
                    <td align="right" class="black fw_n">
                        <b>GOLD VALUATION :</b>
                    </td>

                    <td align="right" class="black fw_n">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($goldTotVal); ?></div>
                    </td>
                </tr>
            <?php } if ($silverTotVal != 0) { ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="right" class="black fw_n">
                        <b>SILVER STOCK</b>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php echo $totalSilverQuant; ?>
                    </td>
                    <td align="right" class="black fw_n" >
                        <?php if ($silverTotGrossWt != '') { ?> GS WT : <?php }; ?>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php if ($silverTotGrossWt != '') { ?><?php
                            echo om_round($silverTotGrossWt, 3) . ' ' . $silverTotGrossWtType;
                        }
                        ?>
                    </td>
                    <td align="right" class="black fw_n" >
                        <?php if ($silverTotFFineWt != '') { ?> FFN WT : <?php }; ?>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php if ($silverTotFFineWt != '') { ?><?php
                            echo number_format($silverTotFFineWt, 3) . ' ' . $silverTotFFineWtType;
                        }
                        ?>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5 orange"> <?php
                            if ($othChgsSlFnWt != '' && $silverTotGrossWt != '') {
                                echo decimalVal($othChgsSlFnWt, 3) . ' ' . $silverTotFFineWtType;
                            }
                            ?>
                        </div>
                    </td>

                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5 darkblueFont"> <?php
                            if ($othChgsSlFnWt != '' && $silverTotGrossWt != '') {
                                echo decimalVal($totFinSlWt, 3) . ' ' . $silverTotFFineWtType;
                            }
                            ?>
                        </div>
                    </td>                                                                                       
                    <td align="right" class="black fw_n">
                        <b> SILVER VALUATION :</b>
                    </td>
                    <td align="right" class="black fw_n">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($silverTotVal); ?></div>
                    </td>
                    <td></td>
                </tr>
                <?php
            } if ($crystalTotVal != 0) {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="right" class="black fw_n">
                        <b>CRYSTAL STOCK</b> 
                    </td>
                    <td align="right" class="black fw_n">
                        <?php echo $totalCrystalQuant; ?>
                    </td>
                    <td align="right" class="black fw_n" >
                        <?php if ($crystalTotGrossWt != '') { ?> GS WT : <?php }; ?>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php if ($crystalTotGrossWt != '') { ?><?php
                            echo om_round($crystalTotGrossWt, 3) . ' ' . $crystalTotGrossWtType;
                        }
                        ?>
                    </td>
                    <td align="right" class="black fw_n" >
                        <?php if ($crystalTotFFineWt != '') { ?> FFN WT : <?php }; ?>
                    </td>
                    <td align="right" class="black fw_n">
                        <?php if ($crystalTotFFineWt != '') { ?><?php
                            echo om_round($crystalTotFFineWt, 3) . ' ' . $crystalTotFFineWtType;
                        }
                        ?>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5 orange">  <?php
                            if ($othChgsCryFnWt != '' && $crystalTotFFineWt != '') {
                                echo decimalVal($othChgsCryFnWt, 3) . ' ' . $crystalTotFFineWtType;
                            }
                            ?>
                        </div>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5 darkblueFont">  <?php
                            if ($othChgsCryFnWt != '' && $crystalTotFFineWt != '') {
                                echo decimalVal($totFinCryWt, 3) . ' ' . $crystalTotFFineWtType;
                            }
                            ?>
                        </div>
                    </td>                                                                                                                   <!--<td colspan="1"></td>-->
                    <td align="right" class="black fw_n">
                        <b>CRYSTAL VALUATION :</b>
                    </td>

                    <td align="right" class="black fw_n">
                        <div class="spaceRight5"><?php echo formatInIndianStyle($crystalTotVal); ?></div>
                    </td>
                </tr>
                <?php
            }
            // END CODE FOR CRYSTAL STOCK: AUTHOR @DARSHANA 10 JULY 2021
            ?>
            <tr>
                <td align="right" colspan="11" class="blackCalibri13FontBold">
                    TOTAL VALUATION :
                </td>
                <td align="right" class="blackCalibri13FontBold">
                    <div class="spaceRight5"><?php echo formatInIndianStyle($totalFinalBalDisplay); ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="16">
                    <div class="hrGold"></div>
                </td>
            </tr>
            <?php if ($totalCounter > 0) { ?>
                <tr>
                    <td align="right" colspan="16">
                        <?php
                        $mainPanel = 'rawMetal';
                        $assignPanelName = 'OrderAssignPanel';
                        include 'ompyamt.php';
                        ?>
                    </td>
                </tr>
                <?php
            } else if ($itemStatus != 'existingItem') {
                if ($rawPanelName != 'RawDetUpPanel') {
                    ?>
                    <tr>
                        <td align="right" colspan="16">
                            <input type="submit" value="Click Here To Reset List" class="frm-btn" id="addStockExistingItem" maxlength="30" size="15" 
                                   onclick="addRawStockExistingItemDiv('', '', 'existingItem');
                                           return false;" />
                        </td>
                    </tr>

                    <?php
                }
            }
        }
        //echo '$totalFinalBalance:'.$totalFinalBalance;
        ?>
    </table>
<?php } ?>