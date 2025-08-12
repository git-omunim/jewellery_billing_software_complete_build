<?php
/*
 * **************************************************************************************
 * @tutorial: Raw ISSUE Invoice Div
 * **************************************************************************************
 * 
 * Created on  5 OCT 2021
 *
 * @FileName: omrwmetisindv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
    <table border="0" cellspacing="0" cellpadding="0" width="99.6%" align="center" class="brdrgry-dashed">
        <?php
    }

    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $payPanelName == 'RawPayUp' || $panelName == 'SellValues') {
        if ($metType == 'SELL')
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator='rawMetal' AND sttr_panel_name='rawMetalIssue' AND sttr_transaction_type = 'sell' AND sttr_pre_invoice_no='$sttr_pre_invoice_no' AND sttr_invoice_no='$sttr_invoice_no' AND sttr_user_id='$userId' and sttr_status NOT IN ('DELETED') ORDER BY sttr_id Desc";
        else
        if ($sttr_pre_invoice_no != '')
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator='rawMetal' AND sttr_panel_name='rawMetalIssue' AND sttr_transaction_type = 'PURBYSUPP' AND sttr_pre_invoice_no='$sttr_pre_invoice_no' AND sttr_invoice_no='$sttr_invoice_no' AND sttr_user_id='$userId' and sttr_status NOT IN ('DELETED')  ORDER BY sttr_id Desc";
        else
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator='rawMetal' AND sttr_panel_name='rawMetalIssue' AND sttr_transaction_type = 'PURBYSUPP' AND sttr_pre_invoice_no IS NULL AND sttr_invoice_no='$sttr_invoice_no' AND sttr_user_id='$userId' and sttr_status NOT IN ('DELETED') ORDER BY sttr_id Desc";
        $resItemDetails = mysqli_query($conn, "$selItemDetails");
    } else {
        if ($metType == 'SELL')
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' AND sttr_indicator='rawMetal' AND sttr_panel_name='rawMetalIssue' AND sttr_transaction_type = 'sell' and sttr_status='PaymentPending' AND sttr_user_id='$userId' and sttr_firm_id IN ($strFrmId) ORDER BY sttr_id Desc";
        else
            $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_indicator='rawMetal' AND sttr_panel_name='rawMetalIssue' AND sttr_transaction_type = 'PURBYSUPP' and sttr_status='PaymentPending' AND sttr_user_id='$userId' and sttr_firm_id IN ($strFrmId)  ORDER BY sttr_id Desc";
        $resItemDetails = mysqli_query($conn, $selItemDetails);
    }


//    echo '$selItemDetails == '.$selItemDetails.'<br />';

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
    $totalFinalBalDisplay = 0;
    // Variable for Total: Gold, Silver, Stone Qty.  @AMRUTA10JUNE2022
    $totalGoldQTY = 0;
    $totalSilverQTY = 0;
    $totalCrystalQTY = 0;

//    echo '$metType='.$metType;
//    if ($metType == 'SELL') {
    //$utin_CRDR = 'CR';
    $utin_CRDR = 'DR';
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
        $totalFinalValuation += $rowItemDetails['sttr_final_valuation'];
        $totalFinalBalDisplay += $rowItemDetails['sttr_final_valuation'];
        $rate = $rowItemDetails['sttr_metal_rate'];
        $itemTax = $rowItemDetails['sttr_tax'];
        $payPreInvoiceNo = $newPreInvoiceNo;
        $payInvoiceNo = $newInvoiceNo;
        $userId = $suppId;
        $totalAmnt = om_round($totalFinalBalance);
        $utin_total_amt = om_round($totalFinalBalance);
        $itemStatus = $rowItemDetails['sttr_status'];

        // CODE ADDED FOR GOLD, SILVER, STONE QTY. @AMRUTA-10JUNE2022
        if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'GOLD') {
            $slGdQTY = $rowItemDetails['sttr_quantity'];
            $totalGoldQTY += $slGdQTY;
//        echo 'slGdQTY:' . "" . $slGdQTY;
//        echo '<br>';
        } else if ($rowItemDetails['sttr_metal_type'] == 'Silver' || $rowItemDetails['sttr_metal_type'] == 'SILVER') {
            $slSlQTY = $rowItemDetails['sttr_quantity'];
            $totalSilverQTY += $slSlQTY;
//        echo 'slSlQTY:' . "" . $slSlQTY;
//        echo '<br>';
        } else if ($rowItemDetails['sttr_metal_type'] == 'Crystal' || $rowItemDetails['sttr_metal_type'] == 'CRYSTAL') {
            $slStQTY = $rowItemDetails['sttr_quantity'];
            $totalCrystalQTY += $slStQTY;
//        echo 'slStQTY:' . "" . $slStQTY;
//        echo '<br>';
        }

        if ($firmIdSelected == '') {
            $firmIdSelected = $firmId;
        }

        $slPrItemFFNW = $rowItemDetails['sttr_final_fine_weight'];
        $wtType = $rowItemDetails['sttr_nt_weight_type'];
        $slPrTotItemLabChrg = 0;

        if ($rowItemDetails['sttr_lab_charges'] != '' && $rowItemDetails['sttr_other_charges_by'] != 'lbInWt') {

            if ($rowItemDetails['sttr_lab_charges_type'] == 'KG') {

                if ($wtType == 'KG')
                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                else if ($wtType == 'GM')
                    $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / 1000) * $slPrItemFFNW;
                else
                    $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / (1000 * 1000)) * $slPrItemFFNW;
            } else if ($rowItemDetails['sttr_lab_charges_type'] == 'GM') {

                if ($wtType == 'KG')
                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * $slPrItemFFNW;
                else if ($wtType == 'GM')
                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
                else
                    $slPrTotItemLabChrg = ($rowItemDetails['sttr_lab_charges'] / 1000) * $slPrItemFFNW;
            } else if ($rowItemDetails['sttr_lab_charges_type'] == 'MG') {

                if ($wtType == 'KG')
                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * 1000 * $slPrItemFFNW;
                else if ($wtType == 'GM') {
                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * 1000 * $slPrItemFFNW;
                } else
                    $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $slPrItemFFNW;
            } else if ($rowItemDetails['sttr_lab_charges_type'] == 'PP') {

                $slPrTotItemLabChrg = $rowItemDetails['sttr_lab_charges'] * $rowItemDetails['sttr_quantity'];
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
        } else {
            $slPrTotItemLabChrg = 0;
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
                . "WHERE sttr_indicator = 'rawMetal' "
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
            //
            //start code for attach crystal : author @darshana 20 july 2021
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
            //end code for attach crystal : author @darshana 20 july 2021

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
        //
        if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
            //
            //start code for attach crystal : author @darshana 20 july 2021
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
            //end code for attach crystal : author @darshana 20 july 2021

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

        //START CODE FOR METAL TYPE CRYSTAL: AUTHOR@DARSHANA 17 JULY 2021
        if ($rowItemDetails['sttr_metal_type'] == 'crystal' ||
                $rowItemDetails['sttr_metal_type'] == 'Crystal' ||
                $rowItemDetails['sttr_metal_type'] == 'CRYSTAL') {
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
        //
        //END  CODE FOR METAL TYPE CRYSTAL: AUTHOR@DARSHANA 17 JULY 2021
        $totalMetalAmnt += $rowItemDetails['sttr_valuation'] - $slPrTotItemLabChrg;
        $totalAmount += $rowItemDetails['sttr_final_valuation'];

        $totalLabOrMkgCharges += $slPrTotItemLabChrg;
        $totalTaxAmount += $newItemTaxChrg;

        if ($itemStatus == 'PaymentPending') {
            $payPanelName = 'RawPayment';
            $transPanelName = 'SellPayment';
            $payIndicator = 'RawMetalIssue';
        }

        if ($itemStatus == 'PaymentDone') {
            $payPanelName = 'RawPayUp';
            $transPanelName = 'SellPayUp';
            $payIndicator = 'RawMetalIssue';
        }

        parse_str(getTableValues("SELECT met_rate_per_wt,met_rate_per_wt_tp FROM metal_rates where met_rate_own_id='$sessionOwnerId' and met_rate_value='$itemMetalRate' order by met_rate_id desc LIMIT 0, 1"));

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
//echo '$counter='.$counter;
        if ($panelName != 'SellValues') {
            if ($counter == 1) {
                //if ($invPanel == 'RawInvoice') {
                ?>
                <tr>
                    <td colspan="18">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" width="99.6%">
                            <tr>
                                <td align="right" class="itemAddPnLabels14 paddingTop7" width="540px">
                                    <span class="main_link_brown">INVOICE NO: </span>
                                    <span class="fs_14 ff_calibri black">
                                        <?php echo $newPreInvoiceNo . '' . $newInvoiceNo; ?>
                                    </span>
                                </td>
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
                <?php // }  ?>
<!--                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>-->
                <tr class="height28" style="background:#f9f7a2">
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM NAME" style="border-top:1px dashed #acacac;">
                        ITEM NAME
                    </td>
                    <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL / RATE" style="border-top:1px dashed #acacac;">
                        <div class="spaceLeft5">METAL</div>
                    </td>
                    <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL TYPE" style="border-top:1px dashed #acacac;">
                        <div class="spaceLeft5">METAL TYPE</div>
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="QUANTITY" style="border-top:1px dashed #acacac;">
                        QTY
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="GROSS WEIGHT" style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">GS WT</div>
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="NET WEIGHT" style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">NT WT</div>
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TUNCH/PURITY + WASTAGE" style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">PURITY</div>
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINE WEIGHT" style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">FFN WGT</div>
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="LABOUR CHARGES" style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">LAB CHGS</div>
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION"  style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">VAL</div>
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX"  style="border-top:1px dashed #acacac;">
                        TAX
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION"  style="border-top:1px dashed #acacac;">
                        <div class="spaceRight5">TOTAL VAL</div>
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-b" title="ITEM DELETE"  colspan="2" style="border-top:1px dashed #acacac;">
                        DEL
                    </td>
                </tr>
            <?php } $counter = 2; ?>
            <tr>
                <td align="center" class="blackCalibri13Font border-color-grey-rb">
                    <a style="cursor: pointer;" title="Single click to view Item Details!"
                       onclick="showRawMetalItemDetailsDiv('<?php echo $documentRoot; ?>', '<?php echo $rwprId; ?>',
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
                        <img src="<?php echo $documentRoot; ?>/images/img/trash.png" alt="" class="marginTop5" style="height:14px;"/>
                    </a>
                </td>
            </tr>
            <?php
        }
    }


    $totOtherChags = $totalOthGdChgs + $totalOthSlChgs;
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

//echo '$crystalFinalWeight@@@=='.$crystalFinalWeight;

    if ($panelName != 'SellValues') {
//        if ($totalFinalBalance != NULL || ($totalFinalBalance == 0 && $metalType == 'Other')) {
        if ($goldTotVal != 0) {
            $TotWt = $goldTotGrossWt;
            ?>
            <tr>
                <td></td>
                <td></td>
                <td align="right" class="black fw_n">
                    GOLD STOCK 
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
                    GOLD VALUATION :
                </td>

                <td align="right" class="black fw_n">
                    <div class="spaceRight5"><?php echo formatInIndianStyle($goldTotVal); ?></div>
                </td>
            </tr>
            <?php
        } if ($silverTotVal != 0) {
            $TotWt = $silverTotGrossWt;
            ?>
            <tr>
                <td></td>
                <td></td>
                <td align="right" class="black fw_n">
                    SILVER STOCK
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
                    SILVER VALUATION :
                </td>
                <td align="right" class="black fw_n">
                    <div class="spaceRight5"><?php echo formatInIndianStyle($silverTotVal); ?></div>
                </td>
                <td></td>
            </tr>
        <?php } ?>
    <!--            <tr>
    <td align="right" colspan="11" class="blackCalibri13FontBold">
    TOTAL VALUATION :
    </td>
    <td align="right" class="blackCalibri13FontBold">
    <div class="spaceRight5"><?php echo formatInIndianStyle($totalFinalBalDisplay); ?></div>
    </td>
    </tr>-->
        <tr>
            <td colspan="16">
                <div class="hrGold"></div>
            </td>
        </tr>
        <?php
        //
        //
        //echo '<br /><br />';
        //echo '$utin_oth_chgs_amt @@##== ' . $utin_oth_chgs_amt . '<br />';
        //echo '$totalMakingCharges @@##== ' . $totalMakingCharges . '<br />';
        //echo '$totalFinalBalance @@##== ' . $totalFinalBalance . '<br />';
        //echo '$goldFinalVal @@##== ' . $goldFinalVal . '<br />';
        //echo '$silverFinalVal @@##== ' . $silverFinalVal . '<br />';
        //echo '$totalLabOrMkgCharges @@##== ' . $totalLabOrMkgCharges . '<br />';
        //echo '$slPrItemFinalVal @@##== ' . $slPrItemFinalVal . '<br />';
        //echo '$slPrCryValuation @@##== ' . $slPrCryValuation . '<br />';
        //echo '$slPrItemValuation @@##== ' . $slPrItemValuation . '<br />';
        //echo '$sttr_metal_amt @@##== ' . $sttr_metal_amt . '<br />';
        //echo '$sttr_total_making_charges @@##== ' . $sttr_total_making_charges . '<br />';
        //echo '$totalSilverBalance @@##== ' . $totalSilverBalance . '<br />';
        //echo '$totalGoldBalance @@##== ' . $totalGoldBalance . '<br />';
        //echo '$utin_total_amt @@##== ' . $utin_total_amt . '<br />';
        //echo '$totalValuation @@##== ' . $totalValuation . '<br />';
        //
        //echo '$panelName @==@ ' . $panelName . '<br />';
        //echo '$mainPanel @==@ ' . $mainPanel . '<br />';
        //echo '$transPanelName @==@ ' . $transPanelName . '<br />';
        //echo '$payPanelName @==@ ' . $payPanelName . '<br />';
        //die;
        //
        //
        if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                $sellPanelName != 'SellItemReturnUp' && $sellPanelName != 'finalOrderUp') {
            //
            $paymentMode = 'NoRateCut';
            $setByDefaultPaymentMode = 'NoRateCut';
            //
        } else {
            $hideCashButtonOnPaymentPanel = 'YES';
        }
//                    echo '$goldFinalWeight='.$goldFinalWeight;
        if ($goldFinalWeight != 0 || $silverFinalWeight != 0 || $crystalFinalWeight != 0) {
            ?>
            <tr>
                <td align="right" colspan="16">
                    <?php
                    $mainPanel = 'rawMetal';
                    include 'ompyamt.php';
                    ?>
                </td>
            </tr>
            <?php
        }
        //echo '$totalFinalBalance:'.$totalFinalBalance;
        ?>
    </table>
<?php } ?>