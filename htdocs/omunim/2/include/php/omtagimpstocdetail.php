<?php
/*
 * **************************************************************************************
 * @Description: ADD FINE PURCHASE FOR SUPPLIER - MIDDLE DIVISION.
 * **************************************************************************************
 *
 * Created on Sep 28, 2016 11:24:58 AM 
 * **************************************************************************************
 * @FileName: omtagimpstocdetail.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:04JUN17
 *  AUTHOR: SANTOSH
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
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
?>
<!--<div id="purchastag">-->
<!--<table border="0" cellspacing="0" cellpadding="0" width="99%" align="center">-->
    <?php
    if ($sttr_pre_invoice_no == '') {
        $sttr_pre_invoice_no = $payPreInvoiceNo;
        $sttr_invoice_no = $payInvoiceNo;
    }
    //
    if ($UpPanel == '' || $UpPanel == NULL) {
        $UpPanel = $_GET['upPanel'];
    }
    //
    $accDrId = $_REQUEST['accDrId'];
    //
    if ($slprInfo == '')
        $slprInfo = $_GET['slprInfo'];
    //
    if ($sttr_invoice_no == '') {
        $sttr_pre_invoice_no = $_GET['preInvoiceNo'];
        $sttr_invoice_no = $_GET['postInvoiceNo'];
        $payPreInvoiceNo = $sttr_pre_invoice_no;
        $payInvoiceNo = $sttr_invoice_no;
        $otherChgsBy = $_GET['othChgsBy'];
    }
    //
     if($payPreInvoiceNo == '' && $payInvoiceNo == '' && ($_REQUEST['panel'] == 'showAllImportTag' || $_REQUEST['panel'] == 'showAllImportwholesale')){
        $payPreInvoiceNo =  $_REQUEST['preInvNum'];
        $payInvoiceNo = $_REQUEST['postInvNum'];
    }
    //
    if ($suppId == '') {
        $suppId = $_GET['suppId'];
    }
    //
    if ($payPanelName == '') {
        $payPanelName = $_GET['paymentPanelName'];
    }
    //
    if ($userPanelName == '') {
        $userPanelName = $_REQUEST['userPanelName']; // USER PANEL NAME - FOR NAVIGATION @PRIYANKA-28MAY18
    }
    //
    if ($userPanelName == '' && $mainPanel == 'CustHome') {
        $userPanelName = 'Customer';
    }
    //
    if($transDate == ''){
        $transDate = $_REQUEST['transDate'];
    }
    //
    if($sttrId == ''){
        $sttrId = $_REQUEST['sttrId'];
    }
    //
   if($transDate == '' || $transDate == NULL){
        parse_str(getTableValues("SELECT sttr_add_date as transDate FROM stock_transaction "
                                   . "where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id = '$sttrId'"));
   }
   //
    //echo '$mainPanel ' . " : " . $mainPanel;
//    echo '$userPanelName ' . " : " . $userPanelName.'<br>';
//    echo $payPreInvoiceNo . " : " . $payPanelName;
    //
    //
    if ($payPanelName == 'StockPayUp' || $payPanelName == 'UpdateItem') {

        $utin_id = $_GET['utinId'];

        if ($utin_id != '') {

            parse_str(getTableValues("SELECT utin_pre_invoice_no,utin_invoice_no FROM user_transaction_invoice "
                                   . "where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_id = '$utin_id' LIMIT 0,1"));
            
            $sttr_pre_invoice_no = $utin_pre_invoice_no;
            $sttr_invoice_no = $utin_invoice_no;
        }

        $selItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                        . "and sttr_pre_invoice_no = '$sttr_pre_invoice_no' and sttr_invoice_no = '$sttr_invoice_no' and sttr_add_date= '$transDate' "
                        . "and sttr_firm_id IN ($strFrmId) and sttr_user_id = '$suppId' and sttr_indicator = 'PURCHASE' and sttr_metal_type NOT IN('imitation','crystal','') "
                        . "and sttr_transaction_type = 'PURCHASE' and sttr_status NOT IN ('DELETED') order by sttr_id asc";

//        echo '$selItemDetails 1 == '.$selItemDetails;
        
    } else if ($payPanelName == "ItemApprovalRec" || $payPanelName == "ItemApprovalRecUp") {

        $selItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                        . "and sttr_pre_invoice_no = '$sttr_pre_invoice_no' and sttr_invoice_no = '$sttr_invoice_no' "
                        . "and sttr_firm_id IN ($strFrmId) and sttr_metal_type NOT IN('imitation','crystal','') "
                        . "and sttr_user_id = '$suppId' and sttr_stock_type = 'wholesale' and sttr_indicator = 'APPROVALREC' "
                        . "and sttr_transaction_type = 'APPROVALREC' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
    } else {
        if($_REQUEST['panel'] == 'showAllImportTag'){
           $selItemDetails = "SELECT sttr_st_id,sttr_id,sttr_sttr_id,sttr_firm_id,sttr_user_id,sttr_status,sttr_account_id,sttr_add_date,sttr_pre_invoice_no,sttr_invoice_no, sttr_valuation,
                       sttr_metal_rate,sttr_item_category,sttr_payment_mode,sttr_metal_type,sttr_quantity,sttr_final_valuation,sttr_stone_valuation,sttr_gs_weight,sttr_gs_weight_type,
                       sttr_nt_weight, sttr_nt_weight_type,sttr_final_fine_weight,sttr_tot_tax,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_utin_id,sttr_hallmark_charges,
                       sttr_hallmark_charges_type,sttr_total_hallmark_charges,sttr_hallmark_cgst_per,sttr_hallmark_sgst_per,sttr_hallmark_igst_per,sttr_hallmark_cgst_amt,
                       sttr_hallmark_sgst_amt,sttr_hallmark_igst_amt,sttr_item_name, sttr_purity,sttr_wastage,sttr_utin_id,sttr_stone_valuation FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                   . "and sttr_status In ('TAG','SOLDOUT') and sttr_firm_id IN ($strFrmId) and sttr_metal_type NOT IN('imitation','crystal','') "
                   . "and sttr_stock_type = 'retail' and sttr_indicator = 'stock' "
                   . "and sttr_transaction_type = 'TAG' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
        } else if($_REQUEST['panel'] == 'showAllImportwholesale'){
           $selItemDetails = "SELECT sttr_st_id,sttr_id,sttr_sttr_id,sttr_firm_id,sttr_user_id,sttr_status,sttr_account_id,sttr_add_date,sttr_pre_invoice_no,sttr_invoice_no, sttr_valuation,
                       sttr_metal_rate,sttr_item_category,sttr_payment_mode,sttr_metal_type,sttr_quantity,sttr_final_valuation,sttr_stone_valuation,sttr_gs_weight,sttr_gs_weight_type,
                       sttr_nt_weight, sttr_nt_weight_type,sttr_final_fine_weight,sttr_tot_tax,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_utin_id,sttr_hallmark_charges,
                       sttr_hallmark_charges_type,sttr_total_hallmark_charges,sttr_hallmark_cgst_per,sttr_hallmark_sgst_per,sttr_hallmark_igst_per,sttr_hallmark_cgst_amt,
                       sttr_hallmark_sgst_amt,sttr_hallmark_igst_amt,sttr_item_name, sttr_purity,sttr_wastage,sttr_utin_id,sttr_stone_valuation FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                   . "and sttr_firm_id IN ($strFrmId) and sttr_metal_type NOT IN('imitation','crystal','') "
                   . "and sttr_stock_type = 'wholesale' and sttr_indicator = 'PURCHASE' "
                   . "and sttr_transaction_type = 'PURCHASE' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
        } else{
           $selItemDetails = "SELECT sttr_st_id,sttr_id,sttr_sttr_id,sttr_firm_id,sttr_user_id,sttr_status,sttr_account_id,sttr_add_date,sttr_pre_invoice_no,sttr_invoice_no, sttr_valuation,
                            sttr_metal_rate,sttr_item_category,sttr_payment_mode,sttr_metal_type,sttr_quantity,sttr_final_valuation,sttr_stone_valuation,sttr_gs_weight,sttr_gs_weight_type,
                            sttr_nt_weight, sttr_nt_weight_type,sttr_final_fine_weight,sttr_tot_tax,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_utin_id,sttr_hallmark_charges,
                            sttr_hallmark_charges_type,sttr_total_hallmark_charges,sttr_hallmark_cgst_per,sttr_hallmark_sgst_per,sttr_hallmark_igst_per,sttr_hallmark_cgst_amt,
                            sttr_hallmark_sgst_amt,sttr_hallmark_igst_amt,sttr_item_name, sttr_purity,sttr_wastage,sttr_utin_id,sttr_stone_valuation FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                        . "and sttr_status = 'PaymentPending' and sttr_firm_id IN ($strFrmId) and sttr_metal_type NOT IN('imitation','crystal','') "
                        . "and sttr_user_id = '$suppId' and sttr_stock_type = 'wholesale' and sttr_indicator = 'PURCHASE' "
                        . "and sttr_transaction_type = 'PURCHASE' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
        }
    }
    //
//    echo '$selItemDetails == ' . $selItemDetails;
    //
    $resItemDetails = mysqli_query($conn, $selItemDetails);
    $totalCounter = mysqli_num_rows($resItemDetails);
    //
//    if ($totalCounter == 0) // COMMENTED - NAVIGATION ISSUE WHEN GLOBAL FIRM SELECTED AND MAKE ENTRY IN DIFFERENT FIRM @AUTHOR:SHRI12OCT19
//        exit ();
    $counter = 1;
    $totalGoldQty = 0;
    $totalSilverQty = 0;
    $totalValuation = 0;
    $totalFinalBalance = 0;
    $totalCryVal = 0;
    $totalFinalBalance = 0;
    $goldTotGrossWt = 0;
    $goldTotGrossWtType = 'GM';
    $goldTotNetWt = 0;
    $goldTotNetWtType = 'GM';
    $goldOthChagsWeightType = 'GM';
    $goldFinalWeightType = 'GM';
    $goldTotFFineWt = 0;
    $silverTotGrossWt = 0;
    $silverTotGrossWtType = 'GM';
    $silverOthChagsWeightType = 'GM';
    $silverFinalWeightType = 'GM';
    $silverTotNetWt = 0;
    $silverTotNetWtType = 'GM';
    $silverTotFFineWt = 0;
    $othChgsGdFnWtTyp = 'GM';
    $othChgsSlFnWtTyp = 'GM';
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
    $silverFinalWeight = 0;
    $strsilverFinalWeight = 0;
    $goldFinalWeight = 0;
    $totalGoldRate = 0;
    $totalSilverRate = 0;
    $goldItemCount = 0;
    $silverItemCount = 0;
    $strsilverItemCount = 0;
    $totalFinalBalDisplay = 0;
    //Rhushikesh 1AUG2024
    $strsilverTotGrossWt = 0;
    $strsilverTotGrossWtType = 'GM';
    $strsilverOthChagsWeightType = 'GM';
    $strsilverFinalWeightType = 'GM';
    $strsilverTotNetWt = 0;
    $strsilverTotNetWtType = 'GM';
    $strsilverTotFFineWt = 0;
    $strsilverFinalWeight = 0;
    $strsilverItemCount = 0;
    $strtotalSilverRate = 0;
    //
    // Variable for Total of Stone Qty.  @AMRUTA11JUNE2022
    $totalCrystalQTY = 0;
    //
    // FOR APPROVAL REC
    $makeInvoiceCount = 0;
    $submitApprovalCount = 0;
    $totalHallmarkCharges = 0;
    $totalHallmarkingCharges = 0;
    while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {
        //
        $utrId = $rowItemDetails['sttr_id'];
        $sttr_st_id=$rowItemDetails['sttr_st_id'];
        $sttr_sttr_id = $rowItemDetails['sttr_sttr_id'];
        $firmId = $rowItemDetails['sttr_firm_id'];
        $suppId = $rowItemDetails['sttr_user_id'];
        $itemStatus = $rowItemDetails['sttr_status'];
        $userId = $suppId;
        $accId = $rowItemDetails['sttr_account_id'];
        $itemAddDate = $rowItemDetails['sttr_add_date'];
        $newPreInvoiceNo = $rowItemDetails['sttr_pre_invoice_no'];
        $newInvoiceNo = $rowItemDetails['sttr_invoice_no'];
        $itemValuation = $rowItemDetails['sttr_valuation'];
        $itemMetalRate = $rowItemDetails['sttr_metal_rate'];
        $stockType = $rowItemDetails['sttr_item_category'];
        //
        //
        $sttr_payment_mode_new = $rowItemDetails['sttr_payment_mode'];
        //
        //$sttr_total_hallmark_charges = $rowItemDetails['sttr_total_hallmark_charges'];
        $totalValuation += $itemValuation;
        //
        //
        // CODE ADDED FOR GOLD, SILVER, STONE QTY. @AMRUTA-10JUNE2022
        if ($rowItemDetails['sttr_metal_type'] == 'Gold' || $rowItemDetails['sttr_metal_type'] == 'GOLD') {
            $slGdQTY = $rowItemDetails['sttr_quantity'];
            $totalGoldQty += $slGdQTY;
        } else if ($rowItemDetails['sttr_metal_type'] == 'Silver' || $rowItemDetails['sttr_metal_type'] == 'SILVER') {
            $slSlQTY = $rowItemDetails['sttr_quantity'];
            $totalSilverQty += $slSlQTY;
        } else if ($rowItemDetails['sttr_metal_type'] == 'StrSilver' || $rowItemDetails['sttr_metal_type'] == 'STRSILVER') {
            $slSlQTY = $rowItemDetails['sttr_quantity'];
            $totalSilverQty += $slSlQTY;
        }else if ($rowItemDetails['sttr_metal_type'] == 'Crystal' || $rowItemDetails['sttr_metal_type'] == 'CRYSTAL') {
            $slStQTY = $rowItemDetails['sttr_quantity'];
            $totalCrystalQTY += $slStQTY;
        } 
        //
        if (($payPanelName != "ItemApprovalRec" && $payPanelName != "ItemApprovalRecUp") || (($payPanelName == "ItemApprovalRec" || $payPanelName == "ItemApprovalRecUp") && ($itemStatus == 'ApprovalDone' || $itemStatus == 'PaymentPending'))) {
            $totalFinalBalance += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
            $totalCryCharg += $rowItemDetails['sttr_stone_valuation'];
            $totalFinalBalDisplay += $rowItemDetails['sttr_final_valuation'];
        }
        //
        $totalAmnt = $totalFinalBalance;
        $metalType = $rowItemDetails['sttr_metal_type'];
        $grossWt = $rowItemDetails['sttr_gs_weight'];
        $grossWtTyp = $rowItemDetails['sttr_gs_weight_type'];
        $netWt = $rowItemDetails['sttr_nt_weight'];
        $netWtTyp = $rowItemDetails['sttr_nt_weight_type'];
        $resFFNW = $rowItemDetails['sttr_final_fine_weight'];
        $newItemTaxChrg = $rowItemDetails['sttr_tot_tax'];
        $valueAdded = 0; // SET VALUE ADDED FOR SUPPLIER PAYMENT PANEL @PRIYANKA-21MAR18
        //
        // Added by PRIYANKA-24JAN18 => DATE ON PAYMENT PANEL
        $utin_date = $rowItemDetails['sttr_add_date'];
        $utin_other_lang_date = $rowItemDetails['sttr_other_lang_add_date'];

        $itemTotLabChgs = 0;
        if ($rowItemDetails['sttr_lab_charges'] != '') {
            if ($rowItemDetails['sttr_lab_charges_type'] == 'KG') {
                if ($rowItemDetails['sttr_nt_weight_type'] == 'KG')
                    $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * $resFFNW, 2);
                else if ($rowItemDetails['sttr_nt_weight_type'] == 'GM')
                    $itemTotLabChgs = decimalVal(($rowItemDetails['sttr_lab_charges'] / 1000) * $resFFNW
                            , 2);
                else
                    $itemTotLabChgs = decimalVal(($rowItemDetails['sttr_lab_charges'] / (1000 * 1000)) * $resFFNW, 2);
            } else if ($rowItemDetails['sttr_lab_charges_type'] == 'GM') {
                if ($rowItemDetails['sttr_nt_weight_type'] == 'KG')
                    $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * 1000 * $resFFNW, 2);
                else if ($rowItemDetails['sttr_nt_weight_type'] == 'GM')
                    $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * $resFFNW
                            , 2);
                else
                    $itemTotLabChgs = decimalVal(($rowItemDetails['sttr_lab_charges'] / 1000) * $resFFNW, 2);
            } else if ($rowItemDetails['sttr_lab_charges_type'] == 'MG') {
                if ($rowItemDetails['sttr_nt_weight_type'] == 'KG')
                    $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * 1000 * 1000 * $resFFNW, 2);
                else if ($rowItemDetails['sttr_nt_weight_type'] == 'GM')
                    $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * 1000 * $resFFNW
                            , 2);
                else
                    $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * $resFFNW, 2);
            } else if ($rowItemDetails['sttr_lab_charges_type'] == 'PP') {
                $itemTotLabChgs = decimalVal($rowItemDetails['sttr_lab_charges'] * $rowItemDetails['sttr_quantity'], 2);
            }
        }
        $itemValuation = $itemValuation - $itemTotLabChgs;
        if ($firmIdSelected == '') {
            $firmIdSelected = $firmId;
        }
        if ($newItemTaxChrg == '' || $newItemTaxChrg == NULL) {
            $newItemTaxChrg = 0;
        }
        parse_str(getTableValues("SELECT met_rate_tax_check, met_rate_tax_percentage, met_rate_with_tax FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' AND met_rate_value = '$itemMetalRate' AND met_rate_metal_name = '$rowItemDetails[stpr_metal_type]'"));
        if ($met_rate_tax_check == 'true') {
            $rateWithTaxVal = $itemValuation * ($met_rate_tax_percentage / 100);
            $itemMetalRate = $met_rate_with_tax;
            $newItemTaxChrg -= $rateWithTaxVal;
        }

        if (($payPanelName != "ItemApprovalRec" && $payPanelName != "ItemApprovalRecUp") || (($payPanelName == "ItemApprovalRec" || $payPanelName == "ItemApprovalRecUp") && ($itemStatus == 'ApprovalDone' || $itemStatus == 'PaymentPending'))) {
            $totalTax += $newItemTaxChrg;
            $totalMetalVal = $rowItemDetails['stpr_valuation'] + $newItemTaxChrg;
            $finalMetalVal += $totalMetalVal;
            $totalCharges = $newItemTaxChrg + $itemTotLabChgs;

            if ($rowItemDetails['sttr_metal_type'] == 'Gold') {
                //
                //start code for attach crystal : author @darshana 20 july 2021
                $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                                . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$utrId' LIMIT 0,20";
                
                //echo '$selStoneQuery1='.$selStoneQuery1;
                
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

                        //$crystalTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                        
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
                //
                $goldTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $goldTotGrossWtType = 'GM';
                $goldTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $goldTotNetWtType = 'GM';
                $goldTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $goldTotFFineWtType = 'GM';
                $gdRate = $rowItemDetails['sttr_metal_rate'];
                $gdVal = $rowItemDetails['sttr_valuation'];
                //
                // Commented By @PRIYANKA-09JUNE2022
                //$totalGoldBalance += $rowItemDetails['sttr_valuation'] + $rowItemDetails['sttr_total_hallmark_charges'];
                //
                $totalGoldBalance += $rowItemDetails['sttr_valuation'];
                //
                $totalGoldVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $otherGoldCharges = $rowItemDetails['sttr_total_lab_charges'];
                $totalOthGdChgs += $otherGoldCharges;
                $goldQty += $rowItemDetails['sttr_quantity'];
                $goldRate = $gdRate;
                $goldCrystalAmount += $rowItemDetails['sttr_stone_valuation'];
                $goldPurchaseAvgRate1 += ($goldRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                $goldPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }
            if ($rowItemDetails['sttr_metal_type'] == 'Silver') {

                //start code for attach crystal : author @darshana 20 july 2021
                $selStoneQuery1 = "SELECT * FROM stock_transaction where sttr_indicator = 'stockCrystal' "
                                . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$utrId' LIMIT 0,20";
                
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
                        
                        //$crystalTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                        
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
                //
                $silverTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $silverTotGrossWtType = 'GM';
                $silverTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $silverTotNetWtType = 'GM';
                $silverTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $silverTotFFineWtType = 'GM';
                $srRate = $rowItemDetails['sttr_metal_rate'];
                $srVal = $rowItemDetails['sttr_valuation'];
                //
                //
                // Commented By @PRIYANKA-09JUNE2022
                //$totalSilverBalance += $rowItemDetails['sttr_valuation'] + $rowItemDetails['sttr_total_hallmark_charges'];
                //
                $totalSilverBalance += $rowItemDetails['sttr_valuation'];
                // 
                $totalSilverVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $otherSilverCharges = $rowItemDetails['sttr_total_lab_charges'];
                $totalOthSlChgs += $otherSilverCharges;
                $silverQty += $rowItemDetails['sttr_quantity'];
                $slprInfo = $rowItemDetails['sttr_other_info'];
                $slprMetalRate = $rowItemDetails['sttr_metal_rate'];
                $silverCrystalAmount += $rowItemDetails['sttr_stone_valuation'];
                $silverRate = $srRate;
                $silverPurchaseAvgRate1 += ($silverRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; // / (getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10)), 2);
                $silverPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }
                        if ($rowItemDetails['sttr_metal_type'] == 'StrSilver') {

                $strsilverTotGrossWt += getTotalWeight($rowItemDetails['sttr_gs_weight'], $rowItemDetails['sttr_gs_weight_type'], 'weight');
                $strsilverTotGrossWtType = 'GM';
                $strsilverTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $strsilverTotNetWtType = 'GM';
                $strsilverTotFFineWt += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                $strsilverTotFFineWtType = 'GM';
                $srRate = $rowItemDetails['sttr_metal_rate'];
                $srVal = $rowItemDetails['sttr_valuation'];
                //
                //
                $totalSilverBalance += $rowItemDetails['sttr_valuation'];
                // 
                $totalSilverVal += $rowItemDetails['sttr_final_valuation'] - $rowItemDetails['sttr_stone_valuation'];
                $otherSilverCharges = $rowItemDetails['sttr_total_lab_charges'];
                $totalOthSlChgs += $otherSilverCharges;
                $silverQty += $rowItemDetails['sttr_quantity'];
                $slprInfo = $rowItemDetails['sttr_other_info'];
                $slprMetalRate = $rowItemDetails['sttr_metal_rate'];
                $silverCrystalAmount += $rowItemDetails['sttr_stone_valuation'];
                $silverRate = $srRate;
                $silverPurchaseAvgRate1 += ($silverRate * getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight')) / 100; // / (getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10)), 2);
                $silverPurchaseAvgRate2 += getTotalWeight($rowItemDetails['sttr_final_fine_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight') / 10;
            }
            // 
            // START CODE FOR METAL TYPE CRYSTAL: AUTHOR@DARSHANA 17 JULY 2021
            if ($rowItemDetails['sttr_metal_type'] == 'crystal' || $rowItemDetails['sttr_metal_type'] == 'Crystal' || $rowItemDetails['sttr_metal_type'] == 'CRYSTAL') {
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
                
                //$crystalTotNetWt += getTotalWeight($rowItemDetails['sttr_nt_weight'], $rowItemDetails['sttr_nt_weight_type'], 'weight');
                
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
        }
        if ($slprMetalRate == 0 || $slprMetalRate == '' || $slprMetalRate == NULL)
            $slprMetalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', $rowItemDetails['sttr_metal_type']);

        if ($otherChgsBy == 'byWt' && $slprMetalRate != 0) {
            if ($rowItemDetails['sttr_metal_type'] == 'Gold') {
                $goldOthChagsWeight = decimalVal((($totalOthGdChgs) * 10) / $slprMetalRate, 3);
                $othChgsGdFnWt = $goldOthChagsWeight;
            }
            if ($rowItemDetails['sttr_metal_type'] == 'Silver') {
                $silverOthChagsWeight = decimalVal((($totalOthSlChgs) * 1000) / $slprMetalRate, 3);
                $othChgsSlFnWt = $silverOthChagsWeight;
            }
            if ($rowItemDetails['sttr_metal_type'] == 'StrSilver') {
                $silverOthChagsWeight = decimalVal((($totalOthSlChgs) * 1000) / $slprMetalRate, 3);
                $othChgsSlFnWt = $silverOthChagsWeight;
            }
        }
        
        //echo '$payPanelName : ' . $payPanelName . '<br>';
        //echo '$itemStatus : ' . $itemStatus . '<br>';
        //echo 'sttr_utin_id : ' . $rowItemDetails['sttr_utin_id'] . '<br>';

        if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') {

            if ($itemStatus == 'PaymentPending') {
                $makeInvoiceCount++;
                $submitApprovalCount++;
            } else if ($itemStatus == 'ApprovalDone') {
                $makeInvoiceCount++;
            }
            
        } else {
            
            if ($itemStatus == 'PaymentPending') {
                $payPanelName = 'StockPayment';
                $transPanelName = 'PurchasePayment';
            } else if ($itemStatus == 'PaymentDone') {
                $payPanelName = 'StockPayUp';
                $transPanelName = 'PurchasePayUp';
            } else if ($_REQUEST['paymentPanelName'] == 'StockPayUp' && 
                      ($rowItemDetails['sttr_utin_id'] != '' && $rowItemDetails['sttr_utin_id'] != NULL)) {
                //
                $payPanelName = 'StockPayUp';
                $transPanelName = 'PurchasePayUp';
                //
                $upQuery = "UPDATE stock_transaction SET sttr_status = 'PaymentDone' "
                           . "WHERE sttr_owner_id = '$sessionOwnerId' "
                           . "AND sttr_pre_invoice_no = '$rowItemDetails[sttr_pre_invoice_no]' "
                           . "AND sttr_invoice_no = '$rowItemDetails[sttr_invoice_no]' "
                           . "AND sttr_user_id = '$rowItemDetails[sttr_user_id]' "
                           . "AND sttr_id = '$rowItemDetails[sttr_id]' "
                           . "AND sttr_utin_id = '$rowItemDetails[sttr_utin_id]' "
                           . "AND sttr_status IN ('EXISTING') "
                           . "AND sttr_current_status IN ('Updated')"
                           . "AND sttr_transaction_type IN ('PURCHASE','PURBYSUPP') "
                           . "AND sttr_indicator IN ('AddInvoice','PURCHASE') LIMIT 0,1";
                //
                //echo '$upQuery == ' . $upQuery . '<br />';
                //
                mysqli_query($conn, $upQuery);
                //
            }
        }
        //
        //
        // CODE ADDED FOR HALLMARKING CHARGES @PRIYANKA-08JUNE2022                
        $sttr_hallmark_charges = $rowItemDetails['sttr_hallmark_charges'];
        $sttr_hallmark_charges_type = $rowItemDetails['sttr_hallmark_charges_type'];
        $sttr_total_hallmark_charges = $rowItemDetails['sttr_total_hallmark_charges'];
        $sttr_hallmark_cgst_per = $rowItemDetails['sttr_hallmark_cgst_per'];
        $sttr_hallmark_sgst_per = $rowItemDetails['sttr_hallmark_sgst_per'];
        $sttr_hallmark_igst_per = $rowItemDetails['sttr_hallmark_igst_per'];
        $sttr_hallmark_cgst_amt = $rowItemDetails['sttr_hallmark_cgst_amt'];
        $sttr_hallmark_sgst_amt = $rowItemDetails['sttr_hallmark_sgst_amt'];
        $sttr_hallmark_igst_amt = $rowItemDetails['sttr_hallmark_igst_amt'];
        //
        //   
        // 
        //
        //echo '$sttr_total_hallmark_charges 1== '.$sttr_total_hallmark_charges.'<br />';   
        //       
        //
        if ($sttr_hallmark_cgst_amt > 0 && $sttr_hallmark_sgst_amt > 0) {
            //
            //$utin_pay_hallmark_tax_chk = 'checked';
            //
            $sttr_total_hallmark_charges = ($sttr_total_hallmark_charges - ($sttr_hallmark_cgst_amt + $sttr_hallmark_cgst_amt));
            //
            $totalHallmarkingCharges += $sttr_total_hallmark_charges;
            //
            $utin_pay_hallmark_cgst_chrg = $sttr_hallmark_cgst_per;
            $utin_pay_hallmark_sgst_chrg = $sttr_hallmark_sgst_per;
            $utin_pay_hallmark_igst_chrg = 0;
            //
            //$utin_pay_hallmark_cgst_amt = $sttr_hallmark_cgst_amt;
            //$utin_pay_hallmark_sgst_amt = $sttr_hallmark_sgst_amt;
            //$utin_pay_hallmark_igst_amt = 0;
            //
            //$utin_pay_hallmark_cgst_tot_amt = $totalHallmarkingCharges;
            //$utin_pay_hallmark_sgst_tot_amt = $totalHallmarkingCharges;
            //$utin_pay_hallmark_igst_tot_amt = $totalHallmarkingCharges;
            //
        } else if ($sttr_hallmark_igst_amt > 0) {
            //
            //$utin_pay_hallmark_tax_chk = 'checked'; 
            //
            $sttr_total_hallmark_charges = ($sttr_total_hallmark_charges - $sttr_hallmark_igst_amt);
            //
            $totalHallmarkingCharges += $sttr_total_hallmark_charges;
            //
            $utin_pay_hallmark_cgst_chrg = 0;
            $utin_pay_hallmark_sgst_chrg = 0;
            $utin_pay_hallmark_igst_chrg = $sttr_hallmark_igst_per;
            //
            //$utin_pay_hallmark_cgst_amt = 0;
            //$utin_pay_hallmark_sgst_amt = 0;
            //$utin_pay_hallmark_igst_amt = $sttr_hallmark_igst_amt;
            //
            //$utin_pay_hallmark_cgst_tot_amt = $totalHallmarkingCharges;
            //$utin_pay_hallmark_sgst_tot_amt = $totalHallmarkingCharges;
            //$utin_pay_hallmark_igst_tot_amt = $totalHallmarkingCharges;
            //
        } else {
            //
            $totalHallmarkingCharges += $sttr_total_hallmark_charges;
            //
            //$utin_pay_hallmark_cgst_tot_amt = $totalHallmarkingCharges;
            //$utin_pay_hallmark_sgst_tot_amt = $totalHallmarkingCharges;
            //$utin_pay_hallmark_igst_tot_amt = $totalHallmarkingCharges;
            //
        }
        //
        //
        //echo '$sttr_total_hallmark_charges 2== '.$sttr_total_hallmark_charges.'<br />';  
        //
        //
        $totalLabOrMkgCharges += decimalVal($itemTotLabChgs, 2);
        $totalTaxAmount += $newItemTaxChrg;
        //$totalHallmarkCharges += $sttr_total_hallmark_charges;
        $goldFinalWeight = decimalVal(($goldOthChagsWeight + $goldTotFFineWt), 3);
        $silverFinalWeight = decimalVal(($silverOthChagsWeight + $silverTotFFineWt), 3);
        $strsilverFinalWeight = decimalVal(($strsilverOthChagsWeight + $strsilverTotFFineWt), 3);
        $utin_crystal_amt = $totalCryCharg;
        //
        //
        //echo '$utin_crystal_amt == ' . $utin_crystal_amt . '<br />';
        //echo '$paymentMode == ' . $paymentMode . '<br />';
        //
        //
        $class = 'border-color-grey-rb';
        if ($counter == 1) { 
            $custId = $_REQUEST['custId'];
            //
            if($_REQUEST['paymentPanelName'] == 'StockPayUp'){
                $showpaymentbtn = '';
            }
            //
            ?>
            <tr>
                <td align="left" class="itemAddPnLabels14 paddingTop7" style="width: 20%; ">
                    <!-- Two buttons aligned to the left side -->
                    <button type="button" class="btn" style="display:inline;padding-left:2px;padding-right:2px;position:relative; "
                            id="myBtn" onclick="showImportTag('<?php echo $sttr_st_id; ?>', '<?php echo $documentRoot; ?>','showAllImportwholesale','<?php echo $payInvoiceNo;?>','<?php echo $payPreInvoiceNo;?>','','<?php echo $showpaymentbtn;?>');">
                        WHOLASALE REPORT
                    </button>
                    <button type="button" class="btn" style="display:inline;padding-left:2px;padding-right:2px;position:relative; "
                            id="myBtn" onclick="showImportTag('<?php echo $sttr_st_id; ?>', '<?php echo $documentRoot; ?>','showAllImportTag','<?php echo $payInvoiceNo;?>','<?php echo $payPreInvoiceNo;?>','<?php echo $custId;?>','<?php echo $showpaymentbtn;?>');">
                        ALL TAG REPORT
                    </button>
                </td>
                <td align="left" class="itemAddPnLabels14 paddingTop7" colspan="0" style="width: 25%;">
                    <!-- Centered Invoice Number -->
                    <span class="main_link_brown">INVOICE NO: </span>
                    <span class="fs_14 ff_calibri black"><?php echo $payPreInvoiceNo . '' . $payInvoiceNo; ?></span>
                </td>
            </tr>
            <?php if ($invPanel != 'InvoicePay') { ?>
                 <tr>
                    <td align="center" class="itemAddPnLabels14" colspan="16">
                        <table width="100%" align="center" cellpadding="0" cellspacing="0" class="brdrgry-dashed margtp10">    
                <tr class="height28 goldBack">
                    <?php if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') {
                        ?>
                        <td align="center" class="brwnCalibri12Font border-color-grey-rb" width="30px" title="checkbox">
                            <input type="checkbox" value="all" id="approvalItemId" name="approvalItemId">  
                        </td>
                    <?php } ?>
                    <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="METAL TYPE">
                        <div class="spaceLeft5">METAL</div>
                    </td>
                    <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="ITEM DETAILS">
                        <div class="spaceLeft5">ITEM DET</div>
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
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL FINE WEIGHT"><div class="spaceRight5">FFN WGT</div></td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="LABOUR CHARGES">
                        VAL
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION">
                        <div class="spaceRight5">LBCRG</div>
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION">
                        <div class="spaceRight5">CRYCHRG</div>
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TOTAL VALUATION">
                        <div class="spaceRight5">TAX</div>
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX">
                        TAX + OTH CHGS
                    </td>
                    <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX">
                        TOT HALLMARK
                    </td>
                    <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION">
                        <div class="spaceRight5">FINAL VAL</div>
                    </td>
                    <?php if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') { ?>
                        <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="TAX">
                            STATUS
                        </td>
                        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL VALUATION">
                            <div class="spaceRight5">RETURN</div>
                        </td>
                    <?php } ?>

                    <?php if($_REQUEST['panel'] != 'showAllImportTag'){ ?>
                    <td align="center" class="brwnCalibri13Font border-color-grey-b" title="ITEM DELETE">
                        DEL
                    </td>
                    <?php
                    }
                }
                ?>
            </tr>
            <?php
        } $counter = 2;
        if ($invPanel != 'InvoicePay') {
            ?>
            <tr>
                <?php
                if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') {
                    $checkboxStatus = '';
                    if ($itemStatus == 'RETURNED' || $itemStatus == 'SOLDOUT')
                        $checkboxStatus = 'disabled';
                    ?>
                    <td align="center" class="brwnCalibri12Font border-color-grey-rb" width="30px" title="checkbox">
                        <input type="checkbox" value="<?php echo $utrId;
                    ?>" id="approvalItemId<?php echo $cout + 1; ?>" name="approvalItemId<?php echo $cout + 1; ?>" <?php echo $checkboxStatus; ?>> 
                    </td>
                <?php } ?>
                <td valign="middle" align="left" class="blackCalibri13Font <?php echo $class; ?>" title="RATE: <?php echo $itemMetalRate . $ratePerWt; ?>">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">
                                <?php if (($itemStatus == 'RETURNED' || $itemStatus == 'PURCHASED') && ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp')) { ?>
                                    <div class="spaceLeft5"><?php echo om_strtoupper(substr($rowItemDetails['sttr_metal_type'], 0, 4)) . '/' . $itemMetalRate; ?></div>
                                    <?php
                                } else {
                                   if($_REQUEST['panel'] != 'showAllImportTag'){
                                    ?>
                                    <a style="cursor: pointer;" title="Single click to view Item Details!" 
                                       onclick="showInvoiceItemDetailsDiv('<?php echo $documentRoot; ?>', '<?php echo $utrId; ?>', '<?php
                                       if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') {
                                           echo "ItemApprovalRecUp";
                                       } else {
                                           echo "UpdateItem";
                                       }
                                       ?>', '<?php echo $rowItemDetails['sttr_metal_type']; ?>', '<?php echo $suppId; ?>', '<?php echo $rowItemDetails['sttr_pre_invoice_no']; ?>', '<?php echo $rowItemDetails['sttr_invoice_no']; ?>');">
                                        <div class="spaceLeft5"><?php echo om_strtoupper(substr($rowItemDetails['sttr_metal_type'], 0, 4)) . '/' . $itemMetalRate; ?></div>
                                    </a>
                                    <?php } else{ ?>
                                       <div class="spaceLeft5"><?php echo om_strtoupper(substr($rowItemDetails['sttr_metal_type'], 0, 4)) . '/' . $itemMetalRate; ?></div>
                                    <?php }?>
                                <?php }?>
                            </td>
                        </tr>
                    </table>
                </td>
            <input type="hidden" id="openLotItemDetDiv" name="openLotItemDetDiv"/>
            <input type="hidden" id="globSuppItemCount" name="globSuppItemCount"/>
            <input type="hidden" id="subPanel" name="subPanel" value="SuppPurByInv"/>
            <input type="hidden" id="addPanelInfo" name="addPanelInfo" value = ''/>
            <td align="left" class="blackCalibri13Font border-color-grey-rb" title="<?php echo $rowItemDetails['sttr_item_category'] . '/' . $rowItemDetails['sttr_item_name']; ?>">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <div class="spaceLeft5">
                                <?php echo om_strtoupper($rowItemDetails['sttr_item_category'] . '/' . $rowItemDetails['sttr_item_name']); ?>
                            </div>
                        </td>
                        <?php
                        if($_REQUEST['panel'] != 'showAllImportTag'){ ?>
                        <td>
                            <button type="button" class="btn" style="cursor: pointer;padding: 0.5px 0px;" 
                                    id="myBtn" onclick="openFineSupplierStockPopUp('<?php echo $sttr_sttr_id; ?>', '<?php echo $documentRoot; ?>','purchase');">
                                        <?php if ($addStockPanel != 'addStock') { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/plus_items_24.png" 
                                         height="16px" width="16px" alt="Click Here To Add Items Details!"/>
                                     <?php } else { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/plus_items_24.png" alt="Add Stock"  /> 
                                <?php } ?>
                            </button>
                        </td>
                        <?php }   ?>
                    </tr>
                </table>
            </td>
            <div id = "myModal<?php echo $sttr_sttr_id; ?>" class = "modal">
                Modal content 
                <div class = "modal-content" style = "overflow:hidden;">
                    <span class = "closeFinePopUp" 
                          onclick = "closeSupplierPopUp('<?php echo $sttr_sttr_id; ?>');">&times;
                    </span>
                    <iframe height = "500px" width = "1170px" 
                            src = "<?php
                            if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM ||
                                    $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO ) &&
                                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                echo $documentRoot . "/include/php/ogfinepop.php?invPanel=AddByInv&utransInvId=$sttr_sttr_id&utransUserId=$suppId&stockType=retailStock";
                            } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD ||
                                    $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                echo $documentRoot . "/include/php/ogfinepop.php?invPanel=AddByInv&utransInvId=$sttr_sttr_id&utransUserId=$suppId&stockType=retailStock";
                            }
                            ?>" 
                            style="border: 0px solid black;overflow:hidden;"> 
                    </iframe>
                </div>
            </div>

            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php echo $rowItemDetails['sttr_quantity']; ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $grossWt . ' ' . $grossWtTyp; ?></div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $netWt . ' ' . $netWtTyp; ?></div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb" title="TUNCH + WASTAGE">
                <div class="spaceRight5"><?php
                    if ($rowItemDetails['sttr_purity'] != '')
                        if ($rowItemDetails['sttr_wastage'] != '') {
                            echo $rowItemDetails['sttr_purity'] . ' + ' . $rowItemDetails['sttr_wastage'] . ' %';
                        } else {
                            echo $rowItemDetails['sttr_purity'] . ' %';
                        }
                    ?>
                </div>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo $resFFNW . ' ' . $netWtTyp; ?></div>
            </td>

            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_valuation']); ?></div>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['sttr_lab_charges'] != '')
                    echo $rowItemDetails['sttr_lab_charges'] . ' /' . $rowItemDetails['sttr_lab_charges_type'];
                else
                    echo '-';
                ?>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['sttr_stone_valuation'] != '')
                    echo $rowItemDetails['sttr_stone_valuation'];
                else
                    echo '-';
                ?>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['sttr_tot_tax'] != '')
                    echo $rowItemDetails['sttr_tot_tax'];
                else
                    echo '-';
                ?>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['sttr_total_lab_charges'] != '')
                    echo $rowItemDetails['sttr_total_lab_charges'];
                else
                    echo '-';
                ?>
            </td>
            <!-- ADDED CODE FOR TOTAL HALLMARKING CHARGES @PRIYANKA-08JUNE2022 -->
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['sttr_total_hallmark_charges'] > 0) {
                    echo formatInIndianStyle($rowItemDetails['sttr_total_hallmark_charges']);
                } else {
                    echo '-';
                }
                ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5"><?php echo formatInIndianStyle($rowItemDetails['sttr_final_valuation']); ?></div>
            </td>
            <?php
            if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') {
                ?> 
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <?php if ($itemStatus == 'ItemReturned' || $itemStatus == 'RETURNED') { ?>
                        RETURNED
                    <?php } else if ($itemStatus == 'PURCHASED') { ?>
                        PURCHASED
                    <?php } else { ?>
                        ACTIVE
                    <?php } ?>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <?php
                    if ($itemStatus == 'PURCHASED')
                        echo 'PURCHASED';
                    else if ($itemStatus == 'RETURNED') {
                        echo $itemStatus;
                        ?>

                    <?php } else { ?>
                        <input type="button" id="sellReturn" name="sellReturn" value="RETURN"
                               onclick=" deleteFineInvoiceItms('<?php echo $utrId; ?>', 'ItemReturn', '<?php echo $rowItemDetails['sttr_user_id']; ?>', '<?php echo $rowItemDetails['sttr_pre_invoice_no']; ?>', '<?php echo $rowItemDetails['sttr_invoice_no']; ?>', '<?php echo $payPanelName; ?>');"
                               autocomplete="off"  spellcheck="false" class="frm-btn" size="25" maxlength="80" />

                    <?php } ?>

                </td>

            <?php } 
            $query = "SELECT sttr_transaction_type FROM stock_transaction WHERE sttr_sttr_id = '$utrId'";
            $result = mysqli_query($conn, $query);
            //
            $rowDetails = mysqli_fetch_array($result);
                //
                $transType = $rowDetails['sttr_transaction_type'];
                //
            ?>
            <?php if($_REQUEST['panel'] != 'showAllImportTag'){?>                
            <td align="center" class="blackCalibri13Font border-color-grey-b">
                <a style="cursor: pointer;" onclick="
                <?php if ($payPanelName == 'ItemApprovalRec' || $payPanelName == 'ItemApprovalRecUp') { ?>
                                    deleteFineInvoiceItms('<?php echo $utrId; ?>', 'deleteFinePurchase', '<?php echo $rowItemDetails['sttr_user_id']; ?>', '<?php echo $rowItemDetails['sttr_pre_invoice_no']; ?>', '<?php echo $rowItemDetails['sttr_invoice_no']; ?>', '<?php echo $payPanelName; ?>');
                <?php } else { ?>
                                    deleteFineInvoiceItms('<?php echo $sttr_sttr_id; ?>', 'deleteFinePurchase', '<?php echo $rowItemDetails['sttr_user_id']; ?>', '<?php echo $rowItemDetails['sttr_pre_invoice_no']; ?>', '<?php echo $rowItemDetails['sttr_invoice_no']; ?>', '<?php echo $payPanelName; ?>','<?php echo $firmId; ?>','','<?php echo $transType; ?>');
                   <?php } ?>">

                    <img src="<?php echo $documentRoot; ?>/images/img/trash.png" alt="" class="marginTop5" style="height:14px;"/>
                </a>
            </td>
            <?php }?> 
        </tr>
        <?php
        $cout++;
    }
}
if ($otherChgsBy == 'byWt') {
    $totOtherChags = 0;
    $totalLabOrMkgCharges = 0;
} else {
    $totOtherChags = decimalVal($totalOthGdChgs + $totalOthSlChgs, 2);
    $totAmount = $totOtherChags;
}
//
//
$utin_oth_chgs_amt = $totOtherChags;
//
///
if ($goldPurchaseAvgRate1 != 0 && $goldPurchaseAvgRate2 != 0) {
    $goldPurchaseAvgRate = om_round(($goldPurchaseAvgRate1 / $goldPurchaseAvgRate2) * 10, 2);
}
if ($silverPurchaseAvgRate1 != 0 && $silverPurchaseAvgRate2 != 0) {
    $silverPurchaseAvgRate = om_round(($silverPurchaseAvgRate1 / $silverPurchaseAvgRate2) * 10, 2);
}
if ($crystalPurchaseAvgRate1 != 0 && $crystalPurchaseAvgRate2 != 0) {
    $crystalPurchaseAvgRate = om_round(($crystalPurchaseAvgRate1 / $crystalPurchaseAvgRate2) * 10, 2);
}
$goldOthChagsWeight = $othChgsGdFnWt;
$goldOthChagsWeightType = $goldFinalWeightType;
$silverOthChagsWeight = $othChgsSlFnWt;
$silverOthChagsWeightType = $silverFinalWeightType;
$invTotCrystalAmt = $totalCryCharg;
//
//include 'ogcmttwt.php';
//
$goldTotGrossWt = decimalVal($goldTotGrossWt, 3);
//
//
//
// ADD CODE FOR HALLMARK CHARGES / HALLMARK TAXABLE AMT @PRIYANKA-26MAY2022  
$utin_hallmark_chrgs_amt = $totalHallmarkingCharges;
$utin_pay_hallmark_cgst_tot_amt = $totalHallmarkingCharges;
$utin_pay_hallmark_sgst_tot_amt = $totalHallmarkingCharges;
$utin_pay_hallmark_igst_tot_amt = $totalHallmarkingCharges;
//
//
//
?>
<tr>
    <?php if ($invPanel != 'InvoicePay') { ?>
        <td colspan="3" valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%" class="spaceRight5">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font"  valign="top">
                            <b> GOLD STOCK:</b>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font"  valign="top">
                            <b> SILVER STOCK:</b>
                        </td>
                    </tr>
                <?php } ?>
                    <?php if ($strsilverTotFFineWt != '' && $strsilverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font"  valign="top">
                            <b> STERLING SILVER STOCK:</b>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td align="left" colspan="3" valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="center" class="blackCalibri13Font"  valign="top" width="30px">
                            <?php echo $goldQty; ?>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="60px" valign="top">
                            <b>GS WT:</b>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="100px" valign="top">
                            <div class="spaceRight5">  
                                <?php
                                echo decimalVal($goldTotGrossWt, 3) . ' ' . $goldTotGrossWtType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="center" class="blackCalibri13Font"  valign="top">
                            <?php echo $silverQty; ?>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="50px">
                            <b> GS WT:</b>
                        </td>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5"> <?php
                                echo decimalVal($silverTotGrossWt, 3) . ' ' . $silverTotGrossWtType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                    <?php if ($strsilverTotFFineWt != '' && $strsilverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="center" class="blackCalibri13Font"  valign="top">
                            <?php echo $silverQty; ?>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="50px">
                            <b> GS WT:</b>
                        </td>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5"> <?php
                                echo decimalVal($strsilverTotGrossWt, 3) . ' ' . $strsilverTotGrossWtType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td align="left" colspan="2" valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font" width="60px">
                            <b>FFN WT:</b>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="100px">
                            <div class="spaceRight5"> 
                                <?php
                                echo decimalVal($goldTotFFineWt, 3) . ' ' . $goldTotFFineWtType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font" width="50px">
                            <b>FFN WT:</b>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="100px">
                            <div class="spaceRight5"> <?php
                                echo decimalVal($silverTotFFineWt, 3) . ' ' . $silverTotFFineWtType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                    <?php if ($strsilverTotFFineWt != '' && $strsilverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font" width="50px">
                            <b>FFN WT:</b>
                        </td>
                        <td align="right" class="blackCalibri13Font" width="100px">
                            <div class="spaceRight5"> <?php
                                echo decimalVal($strsilverTotFFineWt, 3) . ' ' . $strsilverTotFFineWtType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <?php
    }
    $goldFinalWeight = decimalVal($goldFinalWeight, 3);
    $silverFinalWeight = decimalVal($silverFinalWeight, 3);
    $goldOthChagsWeight = convert($goldFinalWeightType, $goldOthChagsWeightType, $goldOthChagsWeight);
    $silverOthChagsWeight = convert($silverFinalWeightType, $silverOthChagsWeightType, $silverOthChagsWeight);
    $strsilverOthChagsWeight = convert($strsilverFinalWeightType, $strsilverOthChagsWeightType, $strsilverOthChagsWeight);
    $goldFinalVal = $totalGoldVal;
    $silverFinalVal = $totalSilverVal;
    $goldOthChagsWeightType = $goldFinalWeightType;
    $silverOthChagsWeightType = $silverFinalWeightType;
    $strsilverOthChagsWeightType = $strsilverFinalWeightType;
    $goldOthChagsWeight = decimalVal($goldOthChagsWeight, 3);
    $silverOthChagsWeight = decimalVal($silverOthChagsWeight, 3);
    $strsilverOthChagsWeight = decimalVal($strsilverOthChagsWeight, 3);
    $goldTotFFineWt = decimalVal($goldTotFFineWt, 3);
    $silverTotFFineWt = decimalVal($silverTotFFineWt, 3);
    $strsilverTotFFineWt = decimalVal($strsilverTotFFineWt, 3);
    // 
    // CRYSTAL TOTAL FIELDS
    $crystalQty = $totalCrystalQuant;
    $crystalFinalVal = $crystalTotVal;
    $crystalFinalWeight = decimalVal($crystalTotNetWt, 3);

    $crystalFinalWeightType = $crystalTotNetWtType;
    if ($invPanel != 'InvoicePay' && $totalCounter != 0) {
        ?>
        <td align="left" valign="top" colspan="3">
            <table border="0" cellspacing="0" cellpadding="0" align="left">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="left" class="blackCalibri13Font">
                            <div class="spaceRight5 orange">  <?php
                                if ($otherChgsBy == 'byWt' && $goldOthChagsWeight != '0')
                                    echo decimalVal($goldOthChagsWeight, 3) . ' ' . $goldFinalWeightType;
                                ?>
                            </div>
                        </td>
                        <td align="left" class="blackCalibri13Font" valign="top">
                            <div class="spaceRight10 darkblueFont"> <?php
                                echo decimalVal($goldFinalWeight, 3) . ' ' . $goldFinalWeightType;
                                ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="left" class="blackCalibri13Font">
                            <div class="spaceRight5 orange"> <?php
                                if ($otherChgsBy == 'byWt' && $silverOthChagsWeight != '0')
                                    echo decimalVal($silverOthChagsWeight, 3) . ' ' . $silverFinalWeightType;
                                ?>
                            </div>
                        </td>
                        <td align="left" class="blackCalibri13Font" valign="top">
                            <div class="spaceRight10 darkblueFont"><?php
                                echo decimalVal($silverFinalWeight, 3) . ' ' . $silverFinalWeightType;
                                ?>
                        </td>
                    </tr>
                <?php } ?>
                     <?php if ($strsilverTotFFineWt != '' && $strsilverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="left" class="blackCalibri13Font">
                            <div class="spaceRight5 orange"> <?php
                                if ($otherChgsBy == 'byWt' && $strsilverOthChagsWeight != '0')
                                    echo decimalVal($strsilverOthChagsWeight, 3) . ' ' . $strsilverFinalWeightType;
                                ?>
                            </div>
                        </td>
                        <td align="left" class="blackCalibri13Font" valign="top">
                            <div class="spaceRight10 darkblueFont"><?php
                                echo decimalVal($strsilverFinalWeight, 3) . ' ' . $strsilverFinalWeightType;
                                ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td align="left" colspan="5" valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font" colspan="5">
                            <div class="spaceRight5"><b> GOLD VALUATION :</b></div>
                        </td>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5"> <?php echo formatInIndianStyle($totalGoldVal); ?></div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font" colspan="5">
                            <div class="spaceRight5">  <b>SILVER VALUATION :</b></div>
                        </td>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5"> <?php echo formatInIndianStyle($totalSilverVal); ?> </div>
                        </td>
                    </tr>
                <?php } ?>
                     <?php if ($strsilverTotFFineWt != '' && $strsilverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font" colspan="5">
                            <div class="spaceRight5">  <b>STERLING SILVER VALUATION :</b></div>
                        </td>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5"> <?php echo formatInIndianStyle($totalStrSilverVal); ?> </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="11"></td>
        <td colspan="5">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <tr>
                    <td align="right" class="blackCalibri13FontBold" colspan="5">
                        <div class="spaceRight5"><b>TOTAL VALUATION  :</b></div>
                    </td>
                    <td align="right" class="blackCalibri13FontBold">
                        <div class="spaceRight5"> <?php echo formatInIndianStyle($totalFinalBalDisplay); ?> </div>
                    </td>
                </tr>
            </table>
        </td>
        <td></td>
        <?php
    }
    $totFinGdWt = $goldTotFFineWt;
    $totFinSlWt = $silverTotFFineWt;
    $totFinStrSlWt = $strsilverTotFFineWt;
    ?>
</tr>
<tr>
    <td colspan="16" >
        <?php $approvalItemCount = mysqli_num_rows($resItemDetails); ?>
        <input type="hidden" id="approvalItemCount" name="approvalItemCount" value="<?php echo $approvalItemCount; ?>" />
        <div style="text-align:center;">
            <?php
            if ($makeInvoiceCount > 0) {
                ?>
                <button class="btn" id="makeInvoice" onclick="makeInvoiceFunc('<?php echo $suppId; ?>', '<?php echo $sttr_pre_invoice_no; ?>', '<?php echo $sttr_invoice_no; ?>', '<?php echo $payPanelName; ?>', '', '')" >MAKE INVOICE</button>
                <button class="btn" id="selectedInvoice" onclick="makeInvoiceFunc('<?php echo $suppId; ?>', '<?php echo $sttr_pre_invoice_no; ?>', '<?php echo $sttr_invoice_no; ?>', '<?php echo $payPanelName; ?>', 'selectedInvoice', '')" >MAKE INVOICE OF SELECTED ITEM</button>
                <?php
            }
            //if ($submitApprovalflag && $makeInvoiceflag) {
            if ($submitApprovalCount > 0) {
                ?>

                <button class="btn" id="selectedInvoice" onclick="makeInvoiceFunc('<?php echo $suppId; ?>', '<?php echo $sttr_pre_invoice_no; ?>', '<?php echo $sttr_invoice_no; ?>', '<?php echo $payPanelName; ?>', '', 'ApprovalDone')" >SUBMIT APPROVAL</button>
                <?php
            }
            ?>
        </div>
    </td>
</tr>



</table>
  </td>
</tr>
<!--</table>-->