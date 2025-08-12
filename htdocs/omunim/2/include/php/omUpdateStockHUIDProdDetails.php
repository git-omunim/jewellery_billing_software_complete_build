<?php
/*
 * **************************************************************************************
 * @tutorial: UPDATE STOCK HUID PROD DETAILS FILE @PRIYANKA-15NOV2021
 * **************************************************************************************
 * 
 * Created on NOV 15, 2021 19:12:00 PM
 *
 * @FileName: omUpdateStockHUIDProdDetails.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.96
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-15NOV2021
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
//
// Start Code To Select FirmId @PRIYANKA-15NOV2021
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
if ($stockPanelName == '') {
    $stockPanelName = $_GET['stockPanelName'];
}
//
if ($invPanel == '') {
    $invPanel = $_GET['invPanel'];
}
//
if ($otherChgsBy == '') {
    $otherChgsBy = $_GET['othChgsBy'];
}
//
if ($suppId == '') {
    $suppId = $_GET['suppId'];
}
//
if ($mainEntryId == '' || $mainEntryId == NULL) {
    $mainEntryId = $_GET['mainEntryId'];
}
//
//if ($panelName != 'SellValues') {
$panel = 'ItemStock';
//}
?>
<table border="0" cellspacing="0" cellpadding="3" width="100%" align="left">
    <?php
    //
    if ($stockPanelName == 'UpdateStock' || $stockPanelName == 'StockPayUp') {
        //
        $selItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                . "AND sttr_id = '$sttrId' AND sttr_status NOT IN ('DELETED') "
                . "AND sttr_hallmark_uid IS NOT NULL "
                . "AND sttr_indicator IN ('stock') order by sttr_id asc";
        //
        //echo '$selItemDetails == '.$selItemDetails.'<br />';
        //
        $resItemDetails = mysqli_query($conn, "$selItemDetails");
        //
    }
    //
    //echo '$selItemDetails == '.$selItemDetails.'<br />';
    //
    $tagNumOfEntries = mysqli_num_rows($resItemDetails);
    //
    //echo '$utransInvId == '.$utransInvId.'<br />';
    //echo '$mainEntryId == '.$mainEntryId.'<br />';
    //echo '$tagNumOfEntries == '.$tagNumOfEntries.'<br />';
    //
    //
    //echo '$selItemDetails == '.$selItemDetails.'<br />';
    //
    $counter = 1;
    $totalGoldQty = 0;
    $totalSilverQty = 0;
    $totalValuation = 0;
    $totalFinalBalance = 0;
    $totalCryVal = 0;
    $goldTotGrossWt = 0;
    $goldTotGrossWtType = 'GM';
    $goldTotNetWt = 0;
    $goldTotNetWtType = 'GM';
    $goldTotFFineWt = 0;
    $goldTotFFineWtType = 'GM';
    $silverTotGrossWt = 0;
    $silverTotGrossWtType = 'GM';
    $silverTotNetWt = 0;
    $silverTotNetWtType = 'GM';
    $silverTotFFineWt = 0;
    $gdVal = 0;
    $srVal = 0;
    $totalSilverVal = 0;
    $totalGoldVal = 0;
    $totalGoldItems = 0;
    $totalSilverItems = 0;
    $totalOthGdChgs = 0;
    $totalOthSlChgs = 0;
    $othChgsGdFnWt = 0;
    $othChgsSlFnWt = 0;
    $rateWithTaxVal = 0;
    $totalMetalVal = 0;
    $totFinSlWt = 0;
    $totFinGdWt = 0;
    $totFFineWt = 0;
    $totGrossWt = 0;
    // Variable for Total: Gold, Silver, Stone Qty.  @AMRUTA10JUNE2022
    $totalGoldQTY = 0;
    $totalSilverQTY = 0;
    $totalCrystalQTY = 0;
    $itemExist = false;
    while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {
        $sttrMainEntryId = $rowItemDetails['sttr_sttr_id'];
        $sttrId = $rowItemDetails['sttr_id'];
        $firmId = $rowItemDetails['sttr_firm_id'];
        $suppId = $rowItemDetails['sttr_brand_id'];
        $accId = $rowItemDetails['sttr_account_id'];
        $itemAddDate = $rowItemDetails['sttr_add_date'];
        $newPreInvoiceNo = $rowItemDetails['sttr_pre_invoice_no'];
        $newInvoiceNo = $rowItemDetails['sttr_invoice_no'];
        $newItemMetal = $rowItemDetails['sttr_metal_type'];
        $newItemName = $rowItemDetails['sttr_item_name'];
        $newItemCategory = $rowItemDetails['sttr_item_category'];
        $itemValuation = $rowItemDetails['sttr_valuation'];
        $itemMetalRate = $rowItemDetails['sttr_metal_rate'];
        $sttrTotalLabCharges = $rowItemDetails['sttr_total_lab_charges'];
        $totalValuation += $itemValuation;
        $totalFinalBalance += $rowItemDetails['sttr_final_valuation'];
        $totalAmnt = om_round($totalFinalBalance);
        $itemStatus = $rowItemDetails['sttr_status'];
        $stockType = $rowItemDetails['sttr_stock_type'];
        $resFFNW = $rowItemDetails['sttr_final_fine_weight'];
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
        $itemExist = true;
        //
        $sttrStoneValuation = $rowItemDetails['sttr_stone_valuation'];
        //
        //echo '$sttrStoneValuation == '.$sttrStoneValuation;
        //
        $itemTotLabChgs = 0;
        //
        $itemValuation = $itemValuation - $itemTotLabChgs;
        $payPreInvoiceNo = $newPreInvoiceNo;
        $payInvoiceNo = $newInvoiceNo;
        //
        if ($firmIdSelected == '') {
            $firmIdSelected = $firmId;
        }
        //
        // stock_transaction
        $qSelCrystalDet = " SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                . " and sttr_sttr_id='$sttrId' and sttr_indicator = 'stockCrystal'"
                . " order by sttr_since asc";
        //
        $resCrystalDet = mysqli_query($conn, $qSelCrystalDet);
        //
        $crystalFinalVal = 0;
        while ($rowCrystalDet = mysqli_fetch_array($resCrystalDet, MYSQLI_ASSOC)) {
            $crystalFinalVal += $rowCrystalDet['sttr_stone_valuation'];
        }
        //
        $totalCryVal += $crystalFinalVal;
        //
        $newItemTaxChrg = ($rowItemDetails['sttr_valuation'] * $rowItemDetails['sttr_tax']) / 100;
        //
        if ($newItemTaxChrg == '' || $newItemTaxChrg == NULL) {
            $newItemTaxChrg = 0;
        }
        //
        parse_str(getTableValues("SELECT DISTINCT met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' AND met_rate_value = '$itemMetalRate' AND met_rate_metal_name = '$rowItemDetails[sttr_metal_type]'"));
        if ($met_rate_tax_check == 'true') {
            $rateWithTaxVal = $rowItemDetails['sttr_valuation'] * ($met_rate_tax_percentage / 100);
            $newItemTaxChrg = $newItemTaxChrg - $rateWithTaxVal;
            $itemMetalRate = $met_rate_with_tax;
        }
        //
        $totalTax += $newItemTaxChrg;
        $totalMetalVal = $rowItemDetails['sttr_valuation'] + $newItemTaxChrg;
        $finalMetalVal += $totalMetalVal;
        $totalCharges = $newItemTaxChrg + $itemTotLabChgs;
        $crystalAmt = $totalCryVal;
        //
        if ($rowItemDetails['sttr_metal_type'] == 'Gold') {
            $goldTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
            $goldTotGrossWtType = 'GM';
            $goldTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
            $goldTotNetWtType = 'GM';
            $goldTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
            $goldTotFFineWtType = 'GM';
            $gdRate = $rowItemDetails['sttr_metal_rate'];
            $gdVal = $rowItemDetails['sttr_valuation'];
            $totalGoldVal += $rowItemDetails['sttr_final_valuation'];
            $otherGoldCharges = $newItemTaxChrg + $itemTotLabChgs;
            $totalOthGdChgs += $otherGoldCharges;
            $totalGoldQty += $rowItemDetails['sttr_quantity'];
        }
        //
        if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
            $silverTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
            $silverTotGrossWtType = 'GM';
            $silverTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
            $silverTotNetWtType = 'GM';
            $silverTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
            $silverTotFFineWtType = 'GM';
            $srRate = $rowItemDetails['sttr_metal_rate'];
            $srVal = $rowItemDetails['sttr_valuation'];
            $totalSilverVal += $rowItemDetails['sttr_final_valuation'];
            $otherSilverCharges = $newItemTaxChrg + $itemTotLabChgs;
            $totalOthSlChgs += $otherSilverCharges;
            $totalSilverQty += $rowItemDetails['sttr_quantity'];
        }
        //
        if ($itemMainPanel == 'addByItems') {
            $upPanelName = $itemMainPanel;
            if ($itemStatus == 'PaymentPending') {
                $payPanelName = 'StockPayment';
            } else if ($itemStatus == 'PaymentDone') {
                $payPanelName = 'StockPayUp';
            }
        } else {
            if ($itemStatus == 'PaymentPending') {
                $upPanelName = 'UpdateStock';
            } else if ($itemStatus == 'PaymentDone' || $itemStatus == 'existingItem') {
                $upPanelName = 'StockPayUp';
            }
        }
        //
        if ($itemStatus == 'PaymentPending') {
            $stockPanelName = 'StockPayment';
            $payPanelName = 'StockPayment';
        } else {
            $stockPanelName = 'StockPayUp';
            $payPanelName = 'StockPayUp';
        }
        //
        $class = 'border-color-grey-rb';
        //
        parse_str(getTableValues("SELECT met_rate_per_wt,met_rate_per_wt_tp FROM metal_rates "
                        . "where met_rate_own_id='$sessionOwnerId' and met_rate_value='$itemMetalRate' "
                        . "order by met_rate_id desc LIMIT 0, 1"));
        //
        if ($met_rate_per_wt == '') {
            if ($rowItemDetails['sttr_metal_type'] == 'Gold') {
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
        //
        if ($rowItemDetails['sttr_purity'] == 'NotSelected') {
            $rowItemDetails['sttr_purity'] = 0;
        }
        //
        if ($rowItemDetails['sttr_stock_type'] == 'wholesale') {
            $newStockType = 'Whole Sale';
        } else if ($rowItemDetails['sttr_stock_type'] == 'retail') {
            $newStockType = 'Retail';
        }
        //
        if ($counter == 1) {
            //
            parse_str(getTableValues("SELECT * FROM stock where st_owner_id='$sessionOwnerId' and st_id='$utransInvId'"));
            //
            $selQueryItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                    . "AND sttr_firm_id IN ($strFrmId) AND sttr_sttrin_id = '$utransInvId' "
                    . "AND sttr_transaction_type IN ('TAG') "
                    . "AND sttr_status IN ('TAG','SOLDOUT') AND sttr_stock_type IN ('retail') "
                    . "AND sttr_indicator IN ('stock')";
            //
            //echo '$selQueryItemDetails == ' . $selQueryItemDetails . '<br />';
            //
            $resultItemDetails = mysqli_query($conn, $selQueryItemDetails);
            //
            $totGrossWt = 0;
            $totFFineWt = 0;
            $totalVal = 0;
            //
            //$goldTotGrossWt = 0;
            //$goldTotGrossWtType = 'GM';
            //
            while ($rowDetails = mysqli_fetch_array($resultItemDetails, MYSQLI_ASSOC)) {
                //
                $totalQty += $rowDetails['sttr_quantity'];
                //
                //$goldTotGrossWt += getTotalWeight($rowDetails['sttr_gs_weight'], $rowDetails['sttr_gs_weight_type'], 'weight');
                //$goldTotGrossWtType = 'GM';
                //
                $totGrossWt += getTotalWeight($rowDetails['sttr_gs_weight'], $rowDetails['sttr_gs_weight_type'], 'weight');
                $totFFineWt += $totFFineWt + getTotalWeight($rowDetails['sttr_fine_weight'], $rowDetails['sttr_gs_weight_type'], 'weight');
                $totalVal += $rowDetails['sttr_final_valuation'];
                //
            }
            //
            //echo '$goldTotGrossWt == '.$goldTotGrossWt.'<br />';
            //echo '$st_gs_weight == '.$st_gs_weight.'<br />';
            //echo '$totGrossWt == '.$totGrossWt.'<br />';
            //
            if ($newItemMetal == 'Gold' || $newItemMetal == 'Silver') {
                $sttrQuantity = $st_quantity + $totalQty;
                $sttr_gs_weight = getTotalWeight($st_gs_weight, $st_gs_weight_type, 'weight');
                $sttrGSWeight = $st_gs_weight + $totGrossWt;
                $sttr_gs_weight = getTotalWeight($st_fine_weight, $st_gs_weight_type, 'weight');
                $sttrFineWeight = $st_fine_weight + $totFFineWt;
                $sttrFinalValuation = $st_final_valuation + $totalVal;
            }
            //
            //echo '$sttrQuantity:'.$sttrQuantity;
            //
            //echo '$sttrGSWeight == '.$sttrGSWeight;
            //
            ?>            
            <tr>
                <td align="center" class="itemAddPnLabels14" colspan="16">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM ID">
                    PID
                </td>
                <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL TYPE">
                    <div class="spaceLeft5">METAL</div>
                </td>
                <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="ITEM DETAILS">
                    <div class="spaceLeft5">PROD DETAILS</div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="QUANTITY">
                    QTY
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
                <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL FINE WEIGHT">
                    <div class="spaceRight5">FFN WT</div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="LABOUR CHARGES">
                    LBCRG
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION">
                    <div class="spaceRight5">VAL</div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX">
                    TAX + OTH CHGS
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TOTAL VALUATION">
                    <div class="spaceRight5">TOT VAL</div>
                </td>
                <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="CRYSTAL VALUATION">
                    STONE VAL
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION">
                    <div class="spaceRight5">FINAL VAL</div>
                </td>
                <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION">
                    <div class="spaceRight5">TYPE</div>
                </td>
                <!--<td align="center" class="brwnCalibri13Font border-color-grey-b" title="ITEM DELETE">
                    DEL
                </td>-->
            </tr>
            <?php
        } $counter = 2;
        ?>
        <tr>
            <td align="center" class="blackCalibri13Font <?php echo $class; ?>">
                <!--<a style="cursor: pointer;" title="Single click to view Item Details!"
                   onclick="showStockItemDetailsDiv('<?php echo $documentRoot; ?>', '<?php echo $sttrId; ?>', 'UpdateStock', '<?php echo $stockType; ?>', '', '<?php echo $invPanelName; ?>', '<?php echo $utransInvId; ?>');">
                    <div class="itemAddPnLabels11ArialLink"><?php echo $rowItemDetails['sttr_item_pre_id'] . $rowItemDetails['sttr_item_id']; ?></div>
                </a>-->
                <div class="itemAddPnLabels11ArialLink"><?php echo $rowItemDetails['sttr_item_pre_id'] . $rowItemDetails['sttr_item_id']; ?></div>
            </td>
            <td align="left" class="blackCalibri13Font <?php echo $class; ?>" title="RATE: <?php echo $rowItemDetails['sttr_metal_rate'] . $ratePerWt; ?>">
                <div class="spaceLeft5"><?php echo om_strtoupper($rowItemDetails['sttr_metal_type']) . '/' . $rowItemDetails['sttr_metal_rate']; ?></div>
            </td>
            <td align="left" class="blackCalibri13Font border-color-grey-rb" title="<?php echo $rowItemDetails['sttr_item_name']; ?>">
                <div class="spaceLeft5"><?php echo om_strtoupper($rowItemDetails['sttr_item_category'] . '/' . $rowItemDetails['sttr_item_name']); ?></div>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php echo $rowItemDetails['sttr_quantity']; ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $rowItemDetails['sttr_gs_weight'] . ' ' . $rowItemDetails['sttr_gs_weight_type']; ?></div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $rowItemDetails['sttr_nt_weight'] . ' ' . $rowItemDetails['sttr_nt_weight_type']; ?></div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb" title="TUNCH + WASTAGE">
                <div class="spaceRight5"><?php
                    if ($rowItemDetails['sttr_wastage'] != '' && $rowItemDetails['sttr_purity'] != '') {
                        echo $rowItemDetails['sttr_purity'] . ' + ' . $rowItemDetails['sttr_wastage'] . ' %';
                    } else if ($rowItemDetails['sttr_purity'] != '') {
                        echo $rowItemDetails['sttr_purity'] . ' %';
                    } else {
                        echo '-';
                    }
                    ?></div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $rowItemDetails['sttr_final_fine_weight'] . ' ' . $rowItemDetails['sttr_nt_weight_type']; ?></div>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['sttr_lab_charges'] != '')
                    echo $rowItemDetails['sttr_lab_charges'] . ' /' . $rowItemDetails['sttr_lab_charges_type'];
                else
                    echo '-';
                ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo formatInIndianStyle($itemValuation); ?></div>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($sttrTotalLabCharges != '')
                    echo formatInIndianStyle($sttrTotalLabCharges);
                else
                    echo '-';
                ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo formatInIndianStyle($totalMetalVal); ?></div>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($sttrStoneValuation != '')
                    echo formatInIndianStyle($sttrStoneValuation);
                else
                    echo '-';
                ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_final_valuation']); ?></div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $newStockType; ?></div>
            </td>

            <?php
            if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
                $stockDelete = 'Y';
            } else {
                $stockDelete = 'N';
            }
            ?>
        <input type="hidden" id="stockDelete" name="stockDelete" value="<?php echo $stockDelete; ?>" />
        <!--<td align="center" class="blackCalibri13Font border-color-grey-b">
            <a style="cursor: pointer;" onclick="deleteWhStockListItem('<?php echo $sttrId; ?>', 'ItemDelete', '<?php echo $invPanel; ?>',
                            '<?php echo $itemMainPanel; ?>', '<?php echo $sellPresent; ?>', '<?php echo $prevStockCount; ?>', '', '', '<?php echo $utransInvId; ?>');">
                <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" alt="" class="marginTop5" />
            </a>
        </td>-->
    </tr>
    <?php
    $cout++;
}
//
//include 'ogcmttwt.php';
//
if ($goldTotalWeight == '') {
    $goldTotalWeight = $goldTotFFineWt;
    $goldTotalWeightType = $goldTotFFineWtType;
}
//
if ($silverTotalWeight == '') {
    $silverTotalWeight = $silverTotFFineWt;
    $silverTotalWeightType = $silverTotFFineWtType;
}
?>
<?php
//
//echo '$goldTotGrossWt #$== '.$goldTotGrossWt.'<br />';
//echo '$goldTotGrossWtType #$== '.$goldTotGrossWtType.'<br />';
//
if ($itemExist) {
    $selItemDetails = "SELECT * FROM stock where st_owner_id='$sessionOwnerId' and st_id='$utransInvId'";
    $resRowItemDetails = mysqli_query($conn, $selItemDetails);
    $rowItemDetails = mysqli_fetch_array($resRowItemDetails);

    if ($rowItemDetails['st_metal_type'] == 'Gold') {
        $totalRemGoldFinalBalance = $rowItemDetails['st_final_valuation'];
        $invGoldQty = $rowItemDetails['st_quantity'];
        $invGoldGrossWeight = getTotalWeight($rowItemDetails['st_gs_weight'], $rowItemDetails['st_gs_weight_type'], 'weight');
        $invGoldGrossWeightTyp = 'GM';

        $invGoldFineWeight = getTotalWeight($rowItemDetails['st_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
        $invGoldFineWeightTyp = 'GM';
    }
    if ($rowItemDetails['st_metal_type'] == 'Silver') {
        $totalRemSilverFinalBalance = $rowItemDetails['st_final_valuation'];
        $invSilverQty = $rowItemDetails['st_quantity'];

        $total = $rowItemDetails['st_gs_weight'];
        $invSilverGrossWeight = getTotalWeight($rowItemDetails['st_gs_weight'], $rowItemDetails['st_gs_weight_type'], 'weight');
        $invSilverGrossWeightTyp = 'GM';

        $invSilverFineWeight = getTotalWeight($rowItemDetails['st_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
        $invSilverFineWeightTyp = 'GM';
    }
    //
    //echo '$goldTotGrossWt #== '.$goldTotGrossWt.'<br />';
    //echo '$goldTotGrossWtType #== '.$goldTotGrossWtType.'<br />';
    //
    ?>    
    <!--<tr>
        <td colspan="16" class="paddingTopBott5">
            <div class="hrGold"></div>
        </td>
    </tr>->
<?php } ?>
</table>